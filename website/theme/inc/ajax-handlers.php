<?php
/**
 * AJAX Handlers
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handle contact form submission
 */
function tbdesigned_handle_contact_form() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'tbdesigned_form_nonce')) {
        wp_send_json_error(array('message' => __('Security check failed.', 'tbdesigned')));
    }

    // Rate limiting - simple check
    $ip = $_SERVER['REMOTE_ADDR'];
    $transient_key = 'tbdesigned_form_' . md5($ip);
    $submissions = get_transient($transient_key);
    
    if ($submissions && $submissions >= 5) {
        wp_send_json_error(array('message' => __('Too many submissions. Please try again later.', 'tbdesigned')));
    }

    // Validate required fields
    $required_fields = array('name', 'email', 'message');
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            wp_send_json_error(array('message' => sprintf(__('Please fill in the %s field.', 'tbdesigned'), $field)));
        }
    }

    // Sanitize inputs
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $company = isset($_POST['company']) ? sanitize_text_field($_POST['company']) : '';
    $service = isset($_POST['service']) ? sanitize_text_field($_POST['service']) : '';
    $budget = isset($_POST['budget']) ? sanitize_text_field($_POST['budget']) : '';
    $message = sanitize_textarea_field($_POST['message']);

    // Validate email
    if (!is_email($email)) {
        wp_send_json_error(array('message' => __('Please enter a valid email address.', 'tbdesigned')));
    }

    // Honeypot check
    if (!empty($_POST['website'])) {
        // Bot detected, fail silently
        wp_send_json_success(array('message' => __('Thank you! We\'ll be in touch soon.', 'tbdesigned')));
    }

    // Build email
    $to = get_theme_mod('contact_email', get_option('admin_email'));
    $subject = sprintf(__('[%s] New Contact Form Submission', 'tbdesigned'), get_bloginfo('name'));
    
    $body = sprintf(__("New contact form submission:\n\n", 'tbdesigned'));
    $body .= sprintf(__("Name: %s\n", 'tbdesigned'), $name);
    $body .= sprintf(__("Email: %s\n", 'tbdesigned'), $email);
    
    if ($phone) {
        $body .= sprintf(__("Phone: %s\n", 'tbdesigned'), $phone);
    }
    if ($company) {
        $body .= sprintf(__("Company: %s\n", 'tbdesigned'), $company);
    }
    if ($service) {
        $body .= sprintf(__("Service Interest: %s\n", 'tbdesigned'), $service);
    }
    if ($budget) {
        $body .= sprintf(__("Budget: %s\n", 'tbdesigned'), $budget);
    }
    
    $body .= sprintf(__("\nMessage:\n%s\n", 'tbdesigned'), $message);
    $body .= sprintf(__("\n---\nSubmitted from: %s\nIP: %s\n", 'tbdesigned'), home_url(), $ip);

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );

    // Send email
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        // Update rate limit
        $submissions = $submissions ? $submissions + 1 : 1;
        set_transient($transient_key, $submissions, HOUR_IN_SECONDS);

        // Optional: Store in database
        tbdesigned_store_contact_submission(array(
            'name'    => $name,
            'email'   => $email,
            'phone'   => $phone,
            'company' => $company,
            'service' => $service,
            'budget'  => $budget,
            'message' => $message,
        ));

        wp_send_json_success(array('message' => __('Thank you! We\'ll be in touch within 24 hours.', 'tbdesigned')));
    } else {
        wp_send_json_error(array('message' => __('Something went wrong. Please try again or email us directly.', 'tbdesigned')));
    }
}
add_action('wp_ajax_tbdesigned_contact_form', 'tbdesigned_handle_contact_form');
add_action('wp_ajax_nopriv_tbdesigned_contact_form', 'tbdesigned_handle_contact_form');

/**
 * Store contact submission in options
 */
function tbdesigned_store_contact_submission($data) {
    $submissions = get_option('tbdesigned_contact_submissions', array());
    
    $submissions[] = array_merge($data, array(
        'submitted_at' => current_time('mysql'),
        'ip'           => $_SERVER['REMOTE_ADDR'],
    ));

    // Keep last 100 submissions
    if (count($submissions) > 100) {
        $submissions = array_slice($submissions, -100);
    }

    update_option('tbdesigned_contact_submissions', $submissions);
}

/**
 * Handle file upload for client portal
 */
function tbdesigned_handle_file_upload() {
    // Check nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'tbdesigned_portal_nonce')) {
        wp_send_json_error(array('message' => __('Security check failed.', 'tbdesigned')));
    }

    // Check if user is logged in
    if (!is_user_logged_in()) {
        wp_send_json_error(array('message' => __('You must be logged in to upload files.', 'tbdesigned')));
    }

    // Check project ID
    if (!isset($_POST['project_id']) || !$_POST['project_id']) {
        wp_send_json_error(array('message' => __('Project ID is required.', 'tbdesigned')));
    }

    $project_id = absint($_POST['project_id']);

    // Check access
    if (!tbdesigned_can_access_project($project_id)) {
        wp_send_json_error(array('message' => __('You do not have permission to upload to this project.', 'tbdesigned')));
    }

    // Check if file was uploaded
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        wp_send_json_error(array('message' => __('No file uploaded or upload error occurred.', 'tbdesigned')));
    }

    // Allowed file types
    $allowed_types = array(
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp',
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'text/plain',
        'application/zip',
    );

    $file = $_FILES['file'];
    $file_type = wp_check_filetype($file['name']);
    
    if (!in_array($file['type'], $allowed_types) && !in_array($file_type['type'], $allowed_types)) {
        wp_send_json_error(array('message' => __('This file type is not allowed.', 'tbdesigned')));
    }

    // Max file size (10MB)
    $max_size = 10 * 1024 * 1024;
    if ($file['size'] > $max_size) {
        wp_send_json_error(array('message' => __('File is too large. Maximum size is 10MB.', 'tbdesigned')));
    }

    // Handle upload using WordPress functions
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    // Upload to project-specific folder
    add_filter('upload_dir', function($dirs) use ($project_id) {
        $dirs['subdir'] = '/client-projects/' . $project_id;
        $dirs['path'] = $dirs['basedir'] . $dirs['subdir'];
        $dirs['url'] = $dirs['baseurl'] . $dirs['subdir'];
        return $dirs;
    });

    $uploaded = wp_handle_upload($file, array('test_form' => false));

    // Remove filter
    remove_all_filters('upload_dir');

    if (isset($uploaded['error'])) {
        wp_send_json_error(array('message' => $uploaded['error']));
    }

    // Add file to project
    $file_id = tbdesigned_add_project_file($project_id, array(
        'name' => $file['name'],
        'url'  => $uploaded['url'],
        'size' => $file['size'],
        'type' => $file['type'],
    ));

    wp_send_json_success(array(
        'message' => __('File uploaded successfully.', 'tbdesigned'),
        'file_id' => $file_id,
        'file'    => array(
            'name' => $file['name'],
            'url'  => $uploaded['url'],
            'size' => size_format($file['size']),
        ),
    ));
}
add_action('wp_ajax_tbdesigned_upload_file', 'tbdesigned_handle_file_upload');

/**
 * Handle file deletion
 */
function tbdesigned_handle_file_delete() {
    // Check nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'tbdesigned_portal_nonce')) {
        wp_send_json_error(array('message' => __('Security check failed.', 'tbdesigned')));
    }

    // Check if user is logged in
    if (!is_user_logged_in()) {
        wp_send_json_error(array('message' => __('You must be logged in.', 'tbdesigned')));
    }

    $project_id = isset($_POST['project_id']) ? absint($_POST['project_id']) : 0;
    $file_id = isset($_POST['file_id']) ? sanitize_text_field($_POST['file_id']) : '';

    if (!$project_id || !$file_id) {
        wp_send_json_error(array('message' => __('Invalid request.', 'tbdesigned')));
    }

    // Check access - only admins can delete files
    if (!current_user_can('manage_options')) {
        wp_send_json_error(array('message' => __('You do not have permission to delete files.', 'tbdesigned')));
    }

    $result = tbdesigned_delete_project_file($project_id, $file_id);

    if (is_wp_error($result)) {
        wp_send_json_error(array('message' => $result->get_error_message()));
    }

    wp_send_json_success(array('message' => __('File deleted successfully.', 'tbdesigned')));
}
add_action('wp_ajax_tbdesigned_delete_file', 'tbdesigned_handle_file_delete');

/**
 * Get project updates (for polling)
 */
function tbdesigned_get_project_updates() {
    // Check nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'tbdesigned_portal_nonce')) {
        wp_send_json_error(array('message' => __('Security check failed.', 'tbdesigned')));
    }

    if (!is_user_logged_in()) {
        wp_send_json_error(array('message' => __('You must be logged in.', 'tbdesigned')));
    }

    $project_id = isset($_POST['project_id']) ? absint($_POST['project_id']) : 0;
    $last_check = isset($_POST['last_check']) ? sanitize_text_field($_POST['last_check']) : '';

    if (!$project_id) {
        wp_send_json_error(array('message' => __('Invalid request.', 'tbdesigned')));
    }

    if (!tbdesigned_can_access_project($project_id)) {
        wp_send_json_error(array('message' => __('Access denied.', 'tbdesigned')));
    }

    $project = get_post($project_id);
    $activities = tbdesigned_get_project_activities($project_id, 5);
    $files = tbdesigned_get_project_files($project_id);
    $status = get_post_meta($project_id, '_project_status', true);

    wp_send_json_success(array(
        'status'     => $status,
        'activities' => $activities,
        'file_count' => count($files),
        'modified'   => $project->post_modified,
    ));
}
add_action('wp_ajax_tbdesigned_get_project_updates', 'tbdesigned_get_project_updates');

/**
 * Newsletter signup handler
 */
function tbdesigned_newsletter_signup() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'tbdesigned_form_nonce')) {
        wp_send_json_error(array('message' => __('Security check failed.', 'tbdesigned')));
    }

    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';

    if (!$email || !is_email($email)) {
        wp_send_json_error(array('message' => __('Please enter a valid email address.', 'tbdesigned')));
    }

    // Honeypot
    if (!empty($_POST['website'])) {
        wp_send_json_success(array('message' => __('Thanks for subscribing!', 'tbdesigned')));
    }

    // Store subscriber
    $subscribers = get_option('tbdesigned_newsletter_subscribers', array());
    
    // Check if already subscribed
    if (in_array($email, array_column($subscribers, 'email'))) {
        wp_send_json_error(array('message' => __('You\'re already subscribed!', 'tbdesigned')));
    }

    $subscribers[] = array(
        'email'         => $email,
        'subscribed_at' => current_time('mysql'),
        'ip'            => $_SERVER['REMOTE_ADDR'],
    );

    update_option('tbdesigned_newsletter_subscribers', $subscribers);

    // Optional: Send to external service (Mailchimp, ConvertKit, etc.)
    // tbdesigned_add_to_mailchimp($email);

    wp_send_json_success(array('message' => __('Thanks for subscribing! Check your inbox for a confirmation.', 'tbdesigned')));
}
add_action('wp_ajax_tbdesigned_newsletter_signup', 'tbdesigned_newsletter_signup');
add_action('wp_ajax_nopriv_tbdesigned_newsletter_signup', 'tbdesigned_newsletter_signup');

/**
 * Portfolio filter handler (if using AJAX filtering)
 */
function tbdesigned_filter_portfolio() {
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    
    $args = array(
        'post_type'      => 'tbdesigned_project',
        'posts_per_page' => 12,
    );

    if ($category && $category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'project_category',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        );
    }

    $projects = new WP_Query($args);

    ob_start();
    
    if ($projects->have_posts()) {
        while ($projects->have_posts()) {
            $projects->the_post();
            get_template_part('template-parts/project-card');
        }
    } else {
        echo '<p class="no-projects">' . __('No projects found.', 'tbdesigned') . '</p>';
    }

    wp_reset_postdata();

    wp_send_json_success(array('html' => ob_get_clean()));
}
add_action('wp_ajax_tbdesigned_filter_portfolio', 'tbdesigned_filter_portfolio');
add_action('wp_ajax_nopriv_tbdesigned_filter_portfolio', 'tbdesigned_filter_portfolio');
