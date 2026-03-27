<?php
/**
 * Client Portal Functionality
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Client role
 */
function tbdesigned_add_client_role() {
    add_role('tbdesigned_client', __('Client', 'tbdesigned'), array(
        'read' => true,
    ));
}
add_action('after_switch_theme', 'tbdesigned_add_client_role');

/**
 * Create client user
 */
function tbdesigned_create_client($email, $first_name, $last_name, $company = '') {
    // Check if user exists
    $existing_user = get_user_by('email', $email);
    if ($existing_user) {
        return new WP_Error('user_exists', __('A user with this email already exists.', 'tbdesigned'));
    }

    // Generate username from email
    $username = sanitize_user(current(explode('@', $email)), true);
    
    // Make username unique
    $base_username = $username;
    $counter = 1;
    while (username_exists($username)) {
        $username = $base_username . $counter;
        $counter++;
    }

    // Generate password
    $password = wp_generate_password(12, true, true);

    // Create user
    $user_id = wp_create_user($username, $password, $email);
    
    if (is_wp_error($user_id)) {
        return $user_id;
    }

    // Update user meta
    wp_update_user(array(
        'ID'           => $user_id,
        'first_name'   => $first_name,
        'last_name'    => $last_name,
        'display_name' => $first_name . ' ' . $last_name,
        'role'         => 'tbdesigned_client',
    ));

    if ($company) {
        update_user_meta($user_id, 'company', sanitize_text_field($company));
    }

    // Send welcome email
    tbdesigned_send_client_welcome_email($user_id, $password);

    return $user_id;
}

/**
 * Send welcome email to new client
 */
function tbdesigned_send_client_welcome_email($user_id, $password) {
    $user = get_user_by('id', $user_id);
    
    if (!$user) {
        return false;
    }

    $portal_url = home_url('/client-portal/');
    $login_url = wp_login_url($portal_url);

    $subject = sprintf(__('Welcome to %s Client Portal', 'tbdesigned'), get_bloginfo('name'));
    
    $message = sprintf(
        __("Hello %s,\n\nWelcome to the TBDesigned client portal! Your account has been created.\n\nYou can access your portal at:\n%s\n\nYour login details:\nEmail: %s\nPassword: %s\n\nPlease change your password after your first login.\n\nBest regards,\nThe TBDesigned Team", 'tbdesigned'),
        $user->first_name,
        $portal_url,
        $user->user_email,
        $password
    );

    return wp_mail($user->user_email, $subject, $message);
}

/**
 * Create client project
 */
function tbdesigned_create_client_project($data) {
    $defaults = array(
        'title'       => '',
        'description' => '',
        'client_id'   => 0,
        'status'      => 'pending',
        'start_date'  => current_time('Y-m-d'),
        'due_date'    => '',
    );

    $data = wp_parse_args($data, $defaults);

    if (empty($data['title']) || empty($data['client_id'])) {
        return new WP_Error('missing_data', __('Title and client are required.', 'tbdesigned'));
    }

    // Create the project
    $project_id = wp_insert_post(array(
        'post_type'    => 'tbdesigned_client_project',
        'post_title'   => sanitize_text_field($data['title']),
        'post_content' => wp_kses_post($data['description']),
        'post_status'  => 'publish',
    ));

    if (is_wp_error($project_id)) {
        return $project_id;
    }

    // Add meta
    update_post_meta($project_id, '_client_user_id', absint($data['client_id']));
    update_post_meta($project_id, '_project_status', sanitize_key($data['status']));
    update_post_meta($project_id, '_start_date', sanitize_text_field($data['start_date']));
    
    if (!empty($data['due_date'])) {
        update_post_meta($project_id, '_due_date', sanitize_text_field($data['due_date']));
    }

    return $project_id;
}

/**
 * Update project status
 */
function tbdesigned_update_project_status($project_id, $status) {
    $valid_statuses = array_keys(tbdesigned_get_project_statuses());
    
    if (!in_array($status, $valid_statuses)) {
        return new WP_Error('invalid_status', __('Invalid project status.', 'tbdesigned'));
    }

    update_post_meta($project_id, '_project_status', $status);
    
    // Log status change
    tbdesigned_add_project_activity($project_id, sprintf(
        __('Status changed to %s', 'tbdesigned'),
        tbdesigned_get_project_statuses()[$status]
    ));

    return true;
}

/**
 * Add project activity log entry
 */
function tbdesigned_add_project_activity($project_id, $message, $user_id = null) {
    if (!$user_id) {
        $user_id = get_current_user_id();
    }

    $activities = get_post_meta($project_id, '_project_activities', true);
    
    if (!is_array($activities)) {
        $activities = array();
    }

    $activities[] = array(
        'user_id'   => $user_id,
        'message'   => sanitize_text_field($message),
        'timestamp' => current_time('mysql'),
    );

    // Keep last 50 activities
    if (count($activities) > 50) {
        $activities = array_slice($activities, -50);
    }

    update_post_meta($project_id, '_project_activities', $activities);

    return true;
}

/**
 * Get project activities
 */
function tbdesigned_get_project_activities($project_id, $limit = 10) {
    $activities = get_post_meta($project_id, '_project_activities', true);
    
    if (!is_array($activities)) {
        return array();
    }

    // Return latest activities
    return array_slice(array_reverse($activities), 0, $limit);
}

/**
 * Add file to project
 */
function tbdesigned_add_project_file($project_id, $file_data) {
    $files = get_post_meta($project_id, '_project_files', true);
    
    if (!is_array($files)) {
        $files = array();
    }

    $file_id = uniqid('file_');
    
    $files[$file_id] = array(
        'name'        => sanitize_file_name($file_data['name']),
        'url'         => esc_url_raw($file_data['url']),
        'size'        => absint($file_data['size']),
        'type'        => sanitize_mime_type($file_data['type']),
        'uploaded_by' => get_current_user_id(),
        'uploaded_at' => current_time('mysql'),
    );

    update_post_meta($project_id, '_project_files', $files);

    // Log activity
    tbdesigned_add_project_activity($project_id, sprintf(
        __('File uploaded: %s', 'tbdesigned'),
        $file_data['name']
    ));

    return $file_id;
}

/**
 * Get project files
 */
function tbdesigned_get_project_files($project_id) {
    $files = get_post_meta($project_id, '_project_files', true);
    return is_array($files) ? $files : array();
}

/**
 * Delete project file
 */
function tbdesigned_delete_project_file($project_id, $file_id) {
    $files = tbdesigned_get_project_files($project_id);
    
    if (!isset($files[$file_id])) {
        return new WP_Error('file_not_found', __('File not found.', 'tbdesigned'));
    }

    $file_name = $files[$file_id]['name'];
    unset($files[$file_id]);
    
    update_post_meta($project_id, '_project_files', $files);

    // Log activity
    tbdesigned_add_project_activity($project_id, sprintf(
        __('File deleted: %s', 'tbdesigned'),
        $file_name
    ));

    return true;
}

/**
 * Check if user can access project
 */
function tbdesigned_can_access_project($project_id, $user_id = null) {
    if (!$user_id) {
        $user_id = get_current_user_id();
    }

    if (!$user_id) {
        return false;
    }

    // Admins can access all projects
    if (user_can($user_id, 'manage_options')) {
        return true;
    }

    // Check if user is assigned to project
    $client_id = get_post_meta($project_id, '_client_user_id', true);
    
    return absint($client_id) === absint($user_id);
}

/**
 * Get client dashboard data
 */
function tbdesigned_get_client_dashboard_data($user_id) {
    $projects = tbdesigned_get_client_projects($user_id);
    
    $stats = array(
        'total'       => 0,
        'pending'     => 0,
        'in_progress' => 0,
        'review'      => 0,
        'completed'   => 0,
    );

    foreach ($projects as $project) {
        $stats['total']++;
        $status = get_post_meta($project->ID, '_project_status', true);
        
        switch ($status) {
            case 'pending':
                $stats['pending']++;
                break;
            case 'in-progress':
                $stats['in_progress']++;
                break;
            case 'review':
                $stats['review']++;
                break;
            case 'completed':
                $stats['completed']++;
                break;
        }
    }

    return array(
        'projects' => $projects,
        'stats'    => $stats,
    );
}

/**
 * Redirect clients away from wp-admin
 */
function tbdesigned_redirect_clients() {
    if (is_admin() && !defined('DOING_AJAX') && current_user_can('tbdesigned_client') && !current_user_can('edit_posts')) {
        wp_redirect(home_url('/client-portal/'));
        exit;
    }
}
add_action('admin_init', 'tbdesigned_redirect_clients');

/**
 * Remove admin bar for clients
 */
function tbdesigned_remove_admin_bar_for_clients() {
    if (current_user_can('tbdesigned_client') && !current_user_can('edit_posts')) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'tbdesigned_remove_admin_bar_for_clients');

/**
 * Add project meta box
 */
function tbdesigned_add_project_meta_boxes() {
    add_meta_box(
        'tbdesigned_project_details',
        __('Project Details', 'tbdesigned'),
        'tbdesigned_project_details_meta_box',
        'tbdesigned_client_project',
        'side',
        'high'
    );

    add_meta_box(
        'tbdesigned_project_files',
        __('Project Files', 'tbdesigned'),
        'tbdesigned_project_files_meta_box',
        'tbdesigned_client_project',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'tbdesigned_add_project_meta_boxes');

/**
 * Project details meta box callback
 */
function tbdesigned_project_details_meta_box($post) {
    wp_nonce_field('tbdesigned_project_details', 'tbdesigned_project_details_nonce');

    $client_id = get_post_meta($post->ID, '_client_user_id', true);
    $status = get_post_meta($post->ID, '_project_status', true);
    $start_date = get_post_meta($post->ID, '_start_date', true);
    $due_date = get_post_meta($post->ID, '_due_date', true);

    // Get all clients
    $clients = get_users(array('role' => 'tbdesigned_client'));
    ?>
    <p>
        <label for="client_user_id"><strong><?php _e('Client', 'tbdesigned'); ?></strong></label><br>
        <select name="client_user_id" id="client_user_id" class="widefat">
            <option value=""><?php _e('Select Client', 'tbdesigned'); ?></option>
            <?php foreach ($clients as $client) : ?>
                <option value="<?php echo esc_attr($client->ID); ?>" <?php selected($client_id, $client->ID); ?>>
                    <?php echo esc_html($client->display_name); ?> (<?php echo esc_html($client->user_email); ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="project_status"><strong><?php _e('Status', 'tbdesigned'); ?></strong></label><br>
        <select name="project_status" id="project_status" class="widefat">
            <?php foreach (tbdesigned_get_project_statuses() as $key => $label) : ?>
                <option value="<?php echo esc_attr($key); ?>" <?php selected($status, $key); ?>>
                    <?php echo esc_html($label); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="start_date"><strong><?php _e('Start Date', 'tbdesigned'); ?></strong></label><br>
        <input type="date" name="start_date" id="start_date" class="widefat" value="<?php echo esc_attr($start_date); ?>">
    </p>
    <p>
        <label for="due_date"><strong><?php _e('Due Date', 'tbdesigned'); ?></strong></label><br>
        <input type="date" name="due_date" id="due_date" class="widefat" value="<?php echo esc_attr($due_date); ?>">
    </p>
    <?php
}

/**
 * Project files meta box callback
 */
function tbdesigned_project_files_meta_box($post) {
    $files = tbdesigned_get_project_files($post->ID);
    ?>
    <div class="tbdesigned-files-list">
        <?php if (empty($files)) : ?>
            <p><?php _e('No files uploaded yet.', 'tbdesigned'); ?></p>
        <?php else : ?>
            <table class="widefat">
                <thead>
                    <tr>
                        <th><?php _e('File', 'tbdesigned'); ?></th>
                        <th><?php _e('Size', 'tbdesigned'); ?></th>
                        <th><?php _e('Uploaded', 'tbdesigned'); ?></th>
                        <th><?php _e('Actions', 'tbdesigned'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($files as $file_id => $file) : ?>
                        <tr>
                            <td>
                                <a href="<?php echo esc_url($file['url']); ?>" target="_blank">
                                    <?php echo esc_html($file['name']); ?>
                                </a>
                            </td>
                            <td><?php echo size_format($file['size']); ?></td>
                            <td><?php echo esc_html(date_i18n(get_option('date_format'), strtotime($file['uploaded_at']))); ?></td>
                            <td>
                                <a href="<?php echo esc_url($file['url']); ?>" target="_blank" class="button button-small">
                                    <?php _e('View', 'tbdesigned'); ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Save project meta
 */
function tbdesigned_save_project_meta($post_id) {
    // Check nonce
    if (!isset($_POST['tbdesigned_project_details_nonce']) || 
        !wp_verify_nonce($_POST['tbdesigned_project_details_nonce'], 'tbdesigned_project_details')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save meta
    if (isset($_POST['client_user_id'])) {
        update_post_meta($post_id, '_client_user_id', absint($_POST['client_user_id']));
    }

    if (isset($_POST['project_status'])) {
        update_post_meta($post_id, '_project_status', sanitize_key($_POST['project_status']));
    }

    if (isset($_POST['start_date'])) {
        update_post_meta($post_id, '_start_date', sanitize_text_field($_POST['start_date']));
    }

    if (isset($_POST['due_date'])) {
        update_post_meta($post_id, '_due_date', sanitize_text_field($_POST['due_date']));
    }
}
add_action('save_post_tbdesigned_client_project', 'tbdesigned_save_project_meta');

/**
 * Get client portal URL
 */
function tbdesigned_get_portal_url($path = '') {
    $portal_url = home_url('/client-portal/');
    
    if ($path) {
        $portal_url = trailingslashit($portal_url) . ltrim($path, '/');
    }

    return $portal_url;
}

/**
 * Shortcode: Client Login Form
 */
function tbdesigned_login_form_shortcode($atts) {
    if (is_user_logged_in()) {
        $current_user = wp_get_current_user();
        ob_start();
        ?>
        <div class="tbdesigned-logged-in">
            <p><?php printf(__('Welcome back, %s!', 'tbdesigned'), esc_html($current_user->display_name)); ?></p>
            <p>
                <a href="<?php echo esc_url(tbdesigned_get_portal_url()); ?>" class="btn btn--primary">
                    <?php _e('Go to Dashboard', 'tbdesigned'); ?>
                </a>
                <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="btn btn--secondary">
                    <?php _e('Log Out', 'tbdesigned'); ?>
                </a>
            </p>
        </div>
        <?php
        return ob_get_clean();
    }

    $args = shortcode_atts(array(
        'redirect' => tbdesigned_get_portal_url(),
    ), $atts);

    return wp_login_form(array(
        'echo'           => false,
        'redirect'       => esc_url($args['redirect']),
        'form_id'        => 'tbdesigned-login-form',
        'label_username' => __('Email Address', 'tbdesigned'),
        'label_password' => __('Password', 'tbdesigned'),
        'label_remember' => __('Remember Me', 'tbdesigned'),
        'label_log_in'   => __('Log In', 'tbdesigned'),
    ));
}
add_shortcode('tbdesigned_login', 'tbdesigned_login_form_shortcode');
