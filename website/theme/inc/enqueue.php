<?php
/**
 * Enqueue Scripts and Styles
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue frontend styles and scripts
 */
function tbdesigned_enqueue_assets() {
    // CSS Variables
    wp_enqueue_style(
        'tbdesigned-variables',
        TBDESIGNED_URI . '/assets/css/variables.css',
        array(),
        TBDESIGNED_VERSION
    );

    // Main stylesheet (theme's style.css)
    wp_enqueue_style(
        'tbdesigned-style',
        get_stylesheet_uri(),
        array('tbdesigned-variables'),
        TBDESIGNED_VERSION
    );

    // Main CSS
    wp_enqueue_style(
        'tbdesigned-main',
        TBDESIGNED_URI . '/assets/css/main.css',
        array('tbdesigned-style'),
        TBDESIGNED_VERSION
    );

    // Utilities CSS
    wp_enqueue_style(
        'tbdesigned-utilities',
        TBDESIGNED_URI . '/assets/css/utilities.css',
        array('tbdesigned-main'),
        TBDESIGNED_VERSION
    );

    // Main JavaScript
    wp_enqueue_script(
        'tbdesigned-main',
        TBDESIGNED_URI . '/assets/js/main.js',
        array(),
        TBDESIGNED_VERSION,
        true
    );

    // Navigation JavaScript
    wp_enqueue_script(
        'tbdesigned-navigation',
        TBDESIGNED_URI . '/assets/js/navigation.js',
        array(),
        TBDESIGNED_VERSION,
        true
    );

    // Forms JavaScript (only on pages with forms)
    if (is_page('contact') || is_page_template('page-contact.php')) {
        wp_enqueue_script(
            'tbdesigned-forms',
            TBDESIGNED_URI . '/assets/js/forms.js',
            array(),
            TBDESIGNED_VERSION,
            true
        );

        // Localize AJAX URL and nonce
        wp_localize_script('tbdesigned-forms', 'tbdesigned_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('tbdesigned_form_nonce'),
        ));
    }

    // Client Portal assets (only for logged-in users on portal pages)
    if (is_user_logged_in() && is_page_template('page-client-portal.php')) {
        wp_enqueue_script(
            'tbdesigned-portal',
            TBDESIGNED_URI . '/assets/js/portal.js',
            array(),
            TBDESIGNED_VERSION,
            true
        );

        wp_localize_script('tbdesigned-portal', 'tbdesigned_portal', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('tbdesigned_portal_nonce'),
            'user_id'  => get_current_user_id(),
        ));
    }

    // Comment reply script (only when needed)
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // Remove block library CSS if not using Gutenberg blocks on frontend
    // Uncomment if you're not using any Gutenberg blocks
    // wp_dequeue_style('wp-block-library');
    // wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'tbdesigned_enqueue_assets');

/**
 * Enqueue admin styles
 */
function tbdesigned_admin_enqueue($hook) {
    // Only load on specific admin pages
    $allowed_pages = array('post.php', 'post-new.php', 'edit.php');
    
    if (!in_array($hook, $allowed_pages)) {
        return;
    }

    wp_enqueue_style(
        'tbdesigned-admin',
        TBDESIGNED_URI . '/assets/css/admin.css',
        array(),
        TBDESIGNED_VERSION
    );
}
add_action('admin_enqueue_scripts', 'tbdesigned_admin_enqueue');

/**
 * Add resource hints for performance
 */
function tbdesigned_resource_hints($hints, $relation_type) {
    // DNS prefetch for external resources
    if ('dns-prefetch' === $relation_type) {
        $hints[] = '//www.google-analytics.com';
        $hints[] = '//www.googletagmanager.com';
    }

    // Preconnect to critical resources
    if ('preconnect' === $relation_type) {
        // Add any critical third-party origins here
    }

    return $hints;
}
add_filter('wp_resource_hints', 'tbdesigned_resource_hints', 10, 2);

/**
 * Add inline critical CSS
 */
function tbdesigned_critical_css() {
    // Minimal critical CSS for above-the-fold content
    ?>
    <style id="tbdesigned-critical">
        /* Critical CSS - prevents FOUC */
        body { opacity: 0; transition: opacity 0.3s; }
        body.loaded { opacity: 1; }
        .site-header { position: sticky; top: 0; z-index: 100; background: #fff; }
        .container { max-width: 1280px; margin: 0 auto; padding: 0 1rem; }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('loaded');
        });
    </script>
    <?php
}
add_action('wp_head', 'tbdesigned_critical_css', 2);

/**
 * Remove jQuery migrate (if not needed)
 */
function tbdesigned_remove_jquery_migrate($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            $script->deps = array_diff($script->deps, array('jquery-migrate'));
        }
    }
}
add_action('wp_default_scripts', 'tbdesigned_remove_jquery_migrate');

/**
 * Move scripts to footer
 */
function tbdesigned_move_scripts_to_footer() {
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
}
// Uncomment if you want all scripts in footer
// add_action('wp_enqueue_scripts', 'tbdesigned_move_scripts_to_footer');
