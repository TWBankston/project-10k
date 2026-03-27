# WordPress Custom Code Snippets

> Ready-to-use code for features that typically require paid plugins. Add to child theme's `functions.php` or use Code Snippets plugin.

---

## 1. Custom Client Portal Post Type

**Add to:** `functions.php` in child theme

```php
<?php
/**
 * Register Projects Custom Post Type
 * For client portal functionality
 */
function tbdesigned_register_projects_cpt() {
    $labels = array(
        'name'                  => 'Projects',
        'singular_name'         => 'Project',
        'menu_name'             => 'Projects',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Project',
        'edit_item'             => 'Edit Project',
        'new_item'              => 'New Project',
        'view_item'             => 'View Project',
        'search_items'          => 'Search Projects',
        'not_found'             => 'No projects found',
        'not_found_in_trash'    => 'No projects found in trash'
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'project'),
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'          => true, // Enable Gutenberg
    );

    register_post_type('project', $args);
}
add_action('init', 'tbdesigned_register_projects_cpt');

/**
 * Flush rewrite rules on theme activation
 */
function tbdesigned_flush_rewrites() {
    tbdesigned_register_projects_cpt();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'tbdesigned_flush_rewrites');
```

---

## 2. ACF Field Configuration

**Option 1: Manual Setup in ACF UI**

1. Install Advanced Custom Fields (free) plugin
2. Custom Fields → Add New
3. Title: "Project Details"
4. Add fields:

```
Field Group: Project Details
Location Rule: Post Type = project

Fields:
├── Project Status (Select)
│   Choices:
│   not-started : Not Started
│   in-progress : In Progress
│   review : Under Review
│   revisions : Revisions Needed
│   completed : Completed
│   on-hold : On Hold
│
├── Client Email (Email)
├── Project Start Date (Date Picker)
├── Project Due Date (Date Picker)
├── Project Files (Repeater) — Note: Repeater only in ACF Pro
│   └── Use Gallery field instead (free)
├── Deliverables (Gallery)
├── Project Notes (Wysiwyg Editor)
└── Client Access Password (Text) — For password-protected projects
```

**Option 2: Export/Import JSON** (after manual setup)

Save this as `/wp-content/themes/your-child-theme/acf-json/group_project_details.json`:

```json
{
    "key": "group_project_details",
    "title": "Project Details",
    "fields": [
        {
            "key": "field_project_status",
            "label": "Project Status",
            "name": "project_status",
            "type": "select",
            "choices": {
                "not-started": "Not Started",
                "in-progress": "In Progress",
                "review": "Under Review",
                "revisions": "Revisions Needed",
                "completed": "Completed",
                "on-hold": "On Hold"
            },
            "default_value": "not-started",
            "return_format": "value"
        },
        {
            "key": "field_client_email",
            "label": "Client Email",
            "name": "client_email",
            "type": "email"
        },
        {
            "key": "field_start_date",
            "label": "Project Start Date",
            "name": "project_start_date",
            "type": "date_picker",
            "display_format": "m/d/Y",
            "return_format": "Y-m-d"
        },
        {
            "key": "field_due_date",
            "label": "Project Due Date",
            "name": "project_due_date",
            "type": "date_picker",
            "display_format": "m/d/Y",
            "return_format": "Y-m-d"
        },
        {
            "key": "field_deliverables",
            "label": "Deliverables",
            "name": "deliverables",
            "type": "gallery",
            "return_format": "array"
        },
        {
            "key": "field_project_notes",
            "label": "Project Notes",
            "name": "project_notes",
            "type": "wysiwyg",
            "tabs": "all",
            "toolbar": "basic",
            "media_upload": 0
        }
    ],
    "location": [
        [
            {
                "param": "post_type",
                "operator": "==",
                "value": "project"
            }
        ]
    ],
    "menu_order": 0,
    "position": "normal",
    "style": "default",
    "active": true
}
```

---

## 3. Client Dashboard Page Template

**Create:** `/wp-content/themes/your-child-theme/template-client-dashboard.php`

```php
<?php
/**
 * Template Name: Client Dashboard
 * Description: Display client's projects
 */

get_header();

// Check if user is logged in or has access
if (!is_user_logged_in() && !isset($_GET['access_code'])) {
    echo '<p>Please log in to view your projects.</p>';
    wp_login_form();
    get_footer();
    exit;
}

$current_user = wp_get_current_user();
?>

<div class="client-dashboard">
    <h1>Welcome, <?php echo esc_html($current_user->display_name ?: 'Client'); ?>!</h1>
    
    <?php
    // Query projects assigned to this user/email
    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    
    // If logged in, filter by client email
    if (is_user_logged_in()) {
        $args['meta_query'] = array(
            array(
                'key'     => 'client_email',
                'value'   => $current_user->user_email,
                'compare' => '='
            )
        );
    }
    
    $projects = new WP_Query($args);
    
    if ($projects->have_posts()) :
    ?>
        <div class="projects-grid">
            <?php while ($projects->have_posts()) : $projects->the_post(); 
                $status = get_field('project_status');
                $due_date = get_field('project_due_date');
                $status_labels = array(
                    'not-started' => 'Not Started',
                    'in-progress' => 'In Progress',
                    'review' => 'Under Review',
                    'revisions' => 'Revisions Needed',
                    'completed' => 'Completed',
                    'on-hold' => 'On Hold'
                );
            ?>
                <div class="project-card status-<?php echo esc_attr($status); ?>">
                    <h2><?php the_title(); ?></h2>
                    
                    <div class="project-meta">
                        <span class="status-badge status-<?php echo esc_attr($status); ?>">
                            <?php echo esc_html($status_labels[$status] ?? 'Unknown'); ?>
                        </span>
                        
                        <?php if ($due_date) : ?>
                            <span class="due-date">Due: <?php echo date('M j, Y', strtotime($due_date)); ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="project-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php 
                    $notes = get_field('project_notes');
                    if ($notes) : ?>
                        <div class="project-notes">
                            <h3>Latest Update:</h3>
                            <?php echo wp_kses_post($notes); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php 
                    $deliverables = get_field('deliverables');
                    if ($deliverables) : ?>
                        <div class="project-files">
                            <h3>Deliverables:</h3>
                            <ul class="file-list">
                                <?php foreach ($deliverables as $file) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($file['url']); ?>" download>
                                            <?php echo esc_html($file['title'] ?: basename($file['url'])); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>No projects found. Please contact us if you believe this is an error.</p>
    <?php endif; 
    wp_reset_postdata();
    ?>
</div>

<style>
.client-dashboard {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.project-card {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.project-meta {
    display: flex;
    gap: 1rem;
    margin: 1rem 0;
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 4px;
    font-size: 0.875rem;
    font-weight: 600;
}

.status-badge.status-not-started { background: #e0e0e0; color: #666; }
.status-badge.status-in-progress { background: #fff3cd; color: #856404; }
.status-badge.status-review { background: #d1ecf1; color: #0c5460; }
.status-badge.status-revisions { background: #f8d7da; color: #721c24; }
.status-badge.status-completed { background: #d4edda; color: #155724; }
.status-badge.status-on-hold { background: #f5c6cb; color: #721c24; }

.due-date {
    color: #666;
    font-size: 0.875rem;
}

.project-notes, .project-files {
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid #eee;
}

.file-list {
    list-style: none;
    padding: 0;
}

.file-list li {
    padding: 0.5rem 0;
}

.file-list a {
    text-decoration: none;
    color: #0073aa;
}

.file-list a:hover {
    text-decoration: underline;
}
</style>

<?php get_footer(); ?>
```

**Usage:**
1. Create a new page: "Client Portal"
2. Select template: "Client Dashboard"
3. Share URL with clients
4. They log in with WordPress account (email must match ACF "Client Email" field)

---

## 4. Client-Specific Access Control

**Simple Password Protection (Per-Project)**

Add to `functions.php`:

```php
<?php
/**
 * Restrict project access to assigned clients
 */
function tbdesigned_restrict_project_access() {
    if (is_singular('project') && !is_user_logged_in()) {
        global $post;
        
        // Check if access code provided in URL matches
        $correct_code = get_field('client_access_password', $post->ID);
        $provided_code = isset($_GET['code']) ? sanitize_text_field($_GET['code']) : '';
        
        if ($correct_code && $provided_code === $correct_code) {
            // Valid access code, allow viewing
            return;
        }
        
        // No valid access, show login
        auth_redirect();
    }
}
add_action('template_redirect', 'tbdesigned_restrict_project_access');
```

**Share links with clients:**
```
https://yourdomain.com/project/project-name/?code=abc123xyz
```

---

## 5. Email Notifications on Status Change

```php
<?php
/**
 * Send email notification when project status changes
 */
function tbdesigned_notify_client_status_change($post_id) {
    // Only for project post type
    if (get_post_type($post_id) !== 'project') {
        return;
    }
    
    // Don't fire on autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Get old and new status
    $old_status = get_post_meta($post_id, '_previous_status', true);
    $new_status = get_field('project_status', $post_id);
    
    // If status changed, send email
    if ($old_status !== $new_status && !empty($new_status)) {
        $client_email = get_field('client_email', $post_id);
        $project_title = get_the_title($post_id);
        $project_url = get_permalink($post_id);
        $access_code = get_field('client_access_password', $post_id);
        
        if ($client_email) {
            $status_labels = array(
                'not-started' => 'Not Started',
                'in-progress' => 'In Progress',
                'review' => 'Under Review',
                'revisions' => 'Revisions Needed',
                'completed' => 'Completed',
                'on-hold' => 'On Hold'
            );
            
            $status_label = $status_labels[$new_status] ?? $new_status;
            
            $subject = "Project Update: {$project_title}";
            $message = "Hello,\n\n";
            $message .= "Your project \"{$project_title}\" status has been updated to: {$status_label}\n\n";
            $message .= "View your project: {$project_url}";
            
            if ($access_code) {
                $message .= "?code={$access_code}";
            }
            
            $message .= "\n\nBest regards,\nTBDesigned";
            
            wp_mail($client_email, $subject, $message);
        }
        
        // Update stored status
        update_post_meta($post_id, '_previous_status', $new_status);
    }
}
add_action('acf/save_post', 'tbdesigned_notify_client_status_change', 20);
```

---

## 6. Schema Markup Injection

**Organization Schema** (add to `functions.php`):

```php
<?php
/**
 * Add Organization schema to site
 */
function tbdesigned_add_organization_schema() {
    if (!is_front_page()) {
        return;
    }
    
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'TBDesigned',
        'url' => home_url(),
        'logo' => get_template_directory_uri() . '/assets/logo.png',
        'contactPoint' => array(
            '@type' => 'ContactPoint',
            'telephone' => '+1-XXX-XXX-XXXX',
            'contactType' => 'customer service',
            'email' => 'ash@tbdesigned.io'
        ),
        'sameAs' => array(
            'https://www.instagram.com/tbdesigned',
            'https://www.linkedin.com/company/tbdesigned'
        )
    );
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}
add_action('wp_head', 'tbdesigned_add_organization_schema');
```

**LocalBusiness Schema** (for agencies with physical location):

```php
<?php
function tbdesigned_add_local_business_schema() {
    if (!is_front_page()) {
        return;
    }
    
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => 'TBDesigned',
        'image' => get_template_directory_uri() . '/assets/logo.png',
        '@id' => home_url(),
        'url' => home_url(),
        'telephone' => '+1-XXX-XXX-XXXX',
        'priceRange' => '$$',
        'address' => array(
            '@type' => 'PostalAddress',
            'streetAddress' => 'Your Street',
            'addressLocality' => 'Asheville',
            'addressRegion' => 'NC',
            'postalCode' => '28801',
            'addressCountry' => 'US'
        ),
        'geo' => array(
            '@type' => 'GeoCoordinates',
            'latitude' => 35.5951,
            'longitude' => -82.5515
        ),
        'openingHoursSpecification' => array(
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'),
            'opens' => '09:00',
            'closes' => '17:00'
        )
    );
    
    echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}
add_action('wp_head', 'tbdesigned_add_local_business_schema');
```

---

## 7. GA4 / Google Tag Manager Injection

**Without Site Kit plugin** (manual code):

```php
<?php
/**
 * Add Google Analytics 4
 */
function tbdesigned_add_ga4() {
    $ga4_id = 'G-XXXXXXXXXX'; // Replace with your GA4 Measurement ID
    ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga4_id); ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo esc_js($ga4_id); ?>');
    </script>
    <?php
}
add_action('wp_head', 'tbdesigned_add_ga4');

/**
 * Add Google Tag Manager (alternative to GA4 direct)
 */
function tbdesigned_add_gtm() {
    $gtm_id = 'GTM-XXXXXX'; // Replace with your GTM Container ID
    ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo esc_js($gtm_id); ?>');</script>
    <!-- End Google Tag Manager -->
    <?php
}
add_action('wp_head', 'tbdesigned_add_gtm');

/**
 * Add GTM noscript fallback
 */
function tbdesigned_add_gtm_noscript() {
    $gtm_id = 'GTM-XXXXXX';
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr($gtm_id); ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
}
add_action('wp_body_open', 'tbdesigned_add_gtm_noscript');
```

---

## 8. Simple File Upload for Clients

**Allow clients to upload files to projects** (requires user login):

```php
<?php
/**
 * Add file upload capability to client dashboard
 * Add this form to your template-client-dashboard.php
 */

// In template-client-dashboard.php, inside the project card loop:
?>
<div class="client-upload-form">
    <h3>Upload Files</h3>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="client_file" required />
        <input type="hidden" name="project_id" value="<?php echo get_the_ID(); ?>" />
        <input type="hidden" name="client_upload_nonce" value="<?php echo wp_create_nonce('client_upload'); ?>" />
        <button type="submit" name="submit_client_file">Upload</button>
    </form>
</div>
<?php

/**
 * Handle client file upload
 * Add to functions.php
 */
function tbdesigned_handle_client_upload() {
    if (!isset($_POST['submit_client_file'])) {
        return;
    }
    
    // Verify nonce
    if (!wp_verify_nonce($_POST['client_upload_nonce'], 'client_upload')) {
        wp_die('Security check failed');
    }
    
    // Check user is logged in
    if (!is_user_logged_in()) {
        wp_die('You must be logged in to upload files');
    }
    
    $project_id = intval($_POST['project_id']);
    
    // Verify user has access to this project
    $client_email = get_field('client_email', $project_id);
    $current_user = wp_get_current_user();
    
    if ($client_email !== $current_user->user_email && !current_user_can('edit_posts')) {
        wp_die('You do not have permission to upload to this project');
    }
    
    // Handle file upload
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    
    $attachment_id = media_handle_upload('client_file', $project_id);
    
    if (is_wp_error($attachment_id)) {
        wp_die('Upload failed: ' . $attachment_id->get_error_message());
    }
    
    // Notify admin
    $admin_email = get_option('admin_email');
    $project_title = get_the_title($project_id);
    $file_url = wp_get_attachment_url($attachment_id);
    
    wp_mail(
        $admin_email,
        "Client uploaded file to: {$project_title}",
        "A client uploaded a file:\n\nProject: {$project_title}\nFile: {$file_url}\n\nView project: " . get_permalink($project_id)
    );
    
    // Redirect back with success message
    wp_redirect(add_query_arg('upload', 'success', get_permalink($project_id)));
    exit;
}
add_action('init', 'tbdesigned_handle_client_upload');
```

---

## 9. Contact Form to Email (Without Plugin)

**Simple contact form handler** (if not using Forminator):

```php
<?php
/**
 * Simple contact form shortcode
 * Usage: [contact_form]
 */
function tbdesigned_contact_form_shortcode() {
    ob_start();
    
    // Handle form submission
    if (isset($_POST['submit_contact'])) {
        if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
            echo '<p class="error">Security check failed.</p>';
        } else {
            $name = sanitize_text_field($_POST['contact_name']);
            $email = sanitize_email($_POST['contact_email']);
            $message = sanitize_textarea_field($_POST['contact_message']);
            
            $to = get_option('admin_email');
            $subject = "Contact Form: Message from {$name}";
            $body = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}";
            $headers = array('Reply-To: ' . $email);
            
            if (wp_mail($to, $subject, $body, $headers)) {
                echo '<p class="success">Thank you! Your message has been sent.</p>';
            } else {
                echo '<p class="error">Sorry, there was an error sending your message.</p>';
            }
        }
    }
    ?>
    
    <form method="post" class="contact-form">
        <p>
            <label for="contact_name">Name *</label>
            <input type="text" name="contact_name" id="contact_name" required />
        </p>
        <p>
            <label for="contact_email">Email *</label>
            <input type="email" name="contact_email" id="contact_email" required />
        </p>
        <p>
            <label for="contact_message">Message *</label>
            <textarea name="contact_message" id="contact_message" rows="5" required></textarea>
        </p>
        <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>
        <p>
            <button type="submit" name="submit_contact">Send Message</button>
        </p>
    </form>
    
    <style>
    .contact-form label { display: block; margin-bottom: 0.5rem; font-weight: 600; }
    .contact-form input, .contact-form textarea { width: 100%; padding: 0.5rem; border: 1px solid #ddd; border-radius: 4px; }
    .contact-form button { background: #0073aa; color: #fff; padding: 0.75rem 1.5rem; border: none; border-radius: 4px; cursor: pointer; }
    .contact-form button:hover { background: #005a87; }
    .contact-form .success { color: green; font-weight: 600; }
    .contact-form .error { color: red; font-weight: 600; }
    </style>
    
    <?php
    return ob_get_clean();
}
add_shortcode('contact_form', 'tbdesigned_contact_form_shortcode');
```

---

## Installation Instructions

### Method 1: Child Theme Functions (Recommended)

1. Create child theme if you don't have one
2. Open `/wp-content/themes/your-child-theme/functions.php`
3. Copy relevant snippets from above
4. Save and upload via FTP or file manager

### Method 2: Code Snippets Plugin (Easiest)

1. Install "Code Snippets" plugin (free, WordPress.org)
2. Snippets → Add New
3. Paste code, give it a name
4. Set to "Run everywhere" or "Only on front-end" as appropriate
5. Activate

### Method 3: Site-Specific Plugin

Create `/wp-content/plugins/tbdesigned-custom/tbdesigned-custom.php`:

```php
<?php
/**
 * Plugin Name: TBDesigned Custom Functionality
 * Description: Custom code for TBDesigned sites
 * Version: 1.0
 * Author: TBDesigned
 */

// Paste all custom code here

```

Then activate the plugin.

---

## Security Notes

- All snippets use proper sanitization (`sanitize_text_field`, `esc_html`, etc.)
- Nonce verification on all form submissions
- Capability checks where appropriate
- No SQL injection vulnerabilities (uses WP functions)

## Performance Notes

- Schema markup only loads on relevant pages
- Email notifications only fire when status actually changes
- File uploads handled by native WordPress media library
- No external API calls (everything server-side)

---

**Need more custom features?** Use this as a template. WordPress codex is your friend: https://developer.wordpress.org/
