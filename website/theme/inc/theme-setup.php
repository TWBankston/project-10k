<?php
/**
 * Theme Setup Functions
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add editor styles
 */
function tbdesigned_editor_styles() {
    add_editor_style('assets/css/editor-style.css');
}
add_action('admin_init', 'tbdesigned_editor_styles');

/**
 * Set content width
 */
function tbdesigned_content_width() {
    $GLOBALS['content_width'] = apply_filters('tbdesigned_content_width', 1200);
}
add_action('after_setup_theme', 'tbdesigned_content_width', 0);

/**
 * Add async/defer support for scripts
 */
function tbdesigned_script_loader_tag($tag, $handle) {
    if (is_admin()) {
        return $tag;
    }

    // Scripts to load async
    $async_scripts = array();
    
    // Scripts to defer
    $defer_scripts = array('tbdesigned-navigation', 'tbdesigned-forms');

    if (in_array($handle, $async_scripts)) {
        return str_replace(' src', ' async src', $tag);
    }

    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'tbdesigned_script_loader_tag', 10, 2);

/**
 * Add custom classes to menu items
 */
function tbdesigned_nav_menu_classes($classes, $item, $args) {
    // Add active class
    if (in_array('current-menu-item', $classes) || in_array('current-page-ancestor', $classes)) {
        $classes[] = 'active';
    }
    
    return $classes;
}
add_filter('nav_menu_css_class', 'tbdesigned_nav_menu_classes', 10, 3);

/**
 * Remove unnecessary dashboard widgets
 */
function tbdesigned_remove_dashboard_widgets() {
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
}
add_action('wp_dashboard_setup', 'tbdesigned_remove_dashboard_widgets');

/**
 * Custom login page styling
 */
function tbdesigned_login_styles() {
    ?>
    <style type="text/css">
        #login h1 a {
            background-image: url(<?php echo TBDESIGNED_URI; ?>/assets/images/logo.svg);
            background-size: contain;
            width: 200px;
            height: 60px;
        }
        body.login {
            background-color: #f9fafb;
        }
        .login form {
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .wp-core-ui .button-primary {
            background: #2563eb;
            border-color: #2563eb;
            border-radius: 6px;
        }
        .wp-core-ui .button-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'tbdesigned_login_styles');

/**
 * Change login logo URL
 */
function tbdesigned_login_url() {
    return home_url();
}
add_filter('login_headerurl', 'tbdesigned_login_url');

/**
 * Change login logo title
 */
function tbdesigned_login_title() {
    return get_bloginfo('name');
}
add_filter('login_headertext', 'tbdesigned_login_title');

/**
 * Disable emojis for performance
 */
function tbdesigned_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'tbdesigned_disable_emojis');

/**
 * Remove oEmbed discovery links
 */
function tbdesigned_disable_oembed() {
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'tbdesigned_disable_oembed');

/**
 * Limit post revisions
 */
if (!defined('WP_POST_REVISIONS')) {
    define('WP_POST_REVISIONS', 5);
}

/**
 * Add admin bar styles for logged-in users
 */
function tbdesigned_admin_bar_styles() {
    if (is_admin_bar_showing()) {
        echo '<style>.site-header { top: 32px; } @media screen and (max-width: 782px) { .site-header { top: 46px; } }</style>';
    }
}
add_action('wp_head', 'tbdesigned_admin_bar_styles');

/**
 * Custom excerpt for specific post types
 */
function tbdesigned_custom_excerpt($post_id = null) {
    $post = get_post($post_id);
    
    if (!$post) {
        return '';
    }

    if (has_excerpt($post)) {
        return get_the_excerpt($post);
    }

    $content = strip_shortcodes($post->post_content);
    $content = wp_strip_all_tags($content);
    $content = substr($content, 0, 150);
    
    return trim($content) . '...';
}

/**
 * Format phone number for tel: links
 */
function tbdesigned_format_phone($phone) {
    return preg_replace('/[^0-9+]/', '', $phone);
}

/**
 * Check if current page is a specific template
 */
function tbdesigned_is_template($template) {
    return is_page_template('page-' . $template . '.php');
}

/**
 * Get reading time estimate
 */
function tbdesigned_reading_time($post_id = null) {
    $post = get_post($post_id);
    
    if (!$post) {
        return 0;
    }

    $content = strip_shortcodes($post->post_content);
    $word_count = str_word_count(wp_strip_all_tags($content));
    $reading_time = ceil($word_count / 200); // Average 200 wpm
    
    return max(1, $reading_time);
}
