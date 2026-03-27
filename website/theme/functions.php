<?php
/**
 * TBDesigned Theme Functions
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme version
define('TBDESIGNED_VERSION', '1.0.0');
define('TBDESIGNED_DIR', get_template_directory());
define('TBDESIGNED_URI', get_template_directory_uri());

/**
 * Include theme files
 */
require_once TBDESIGNED_DIR . '/inc/theme-setup.php';
require_once TBDESIGNED_DIR . '/inc/enqueue.php';
require_once TBDESIGNED_DIR . '/inc/custom-post-types.php';
require_once TBDESIGNED_DIR . '/inc/schema-markup.php';
require_once TBDESIGNED_DIR . '/inc/ajax-handlers.php';
require_once TBDESIGNED_DIR . '/inc/client-portal.php';

// ACF fields config (only if ACF is active)
if (class_exists('ACF')) {
    require_once TBDESIGNED_DIR . '/inc/acf-fields.php';
}

/**
 * Theme Setup
 */
function tbdesigned_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');

    // Custom image sizes
    add_image_size('tbdesigned-card', 600, 400, true);
    add_image_size('tbdesigned-hero', 1920, 1080, true);
    add_image_size('tbdesigned-thumbnail', 300, 200, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary'   => __('Primary Menu', 'tbdesigned'),
        'footer'    => __('Footer Menu', 'tbdesigned'),
        'mobile'    => __('Mobile Menu', 'tbdesigned'),
    ));

    // Load text domain
    load_theme_textdomain('tbdesigned', TBDESIGNED_DIR . '/languages');
}
add_action('after_setup_theme', 'tbdesigned_setup');

/**
 * Register widget areas
 */
function tbdesigned_widgets_init() {
    register_sidebar(array(
        'name'          => __('Blog Sidebar', 'tbdesigned'),
        'id'            => 'sidebar-blog',
        'description'   => __('Widgets for blog pages.', 'tbdesigned'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 1', 'tbdesigned'),
        'id'            => 'footer-1',
        'description'   => __('First footer widget area.', 'tbdesigned'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 2', 'tbdesigned'),
        'id'            => 'footer-2',
        'description'   => __('Second footer widget area.', 'tbdesigned'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Column 3', 'tbdesigned'),
        'id'            => 'footer-3',
        'description'   => __('Third footer widget area.', 'tbdesigned'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'tbdesigned_widgets_init');

/**
 * Custom excerpt length
 */
function tbdesigned_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'tbdesigned_excerpt_length');

/**
 * Custom excerpt more
 */
function tbdesigned_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'tbdesigned_excerpt_more');

/**
 * Add custom body classes
 */
function tbdesigned_body_classes($classes) {
    // Add page slug as class
    if (is_singular()) {
        global $post;
        $classes[] = 'page-' . $post->post_name;
    }

    // Add class if no sidebar
    if (!is_active_sidebar('sidebar-blog') || is_page()) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'tbdesigned_body_classes');

/**
 * Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Disable XML-RPC (security)
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove query strings from static resources
 */
function tbdesigned_remove_script_version($src) {
    $parts = explode('?ver', $src);
    return $parts[0];
}
add_filter('script_loader_src', 'tbdesigned_remove_script_version', 15, 1);
add_filter('style_loader_src', 'tbdesigned_remove_script_version', 15, 1);

/**
 * Defer non-critical JavaScript
 */
function tbdesigned_defer_scripts($tag, $handle, $src) {
    $defer_scripts = array('tbdesigned-navigation', 'tbdesigned-forms');
    
    if (in_array($handle, $defer_scripts)) {
        return '<script src="' . esc_url($src) . '" defer></script>' . "\n";
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'tbdesigned_defer_scripts', 10, 3);

/**
 * Add preload for critical resources
 */
function tbdesigned_preload_resources() {
    // Preload main CSS
    echo '<link rel="preload" href="' . TBDESIGNED_URI . '/assets/css/main.css" as="style">' . "\n";
}
add_action('wp_head', 'tbdesigned_preload_resources', 1);

/**
 * SVG icon helper
 */
function tbdesigned_icon($name, $class = '') {
    $icons = array(
        'menu' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>',
        'close' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
        'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
        'check' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>',
        'mail' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
        'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',
        'twitter' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>',
        'file' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>',
        'download' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>',
    );

    if (isset($icons[$name])) {
        $class_attr = $class ? ' class="' . esc_attr($class) . '"' : '';
        return str_replace('<svg', '<svg' . $class_attr, $icons[$name]);
    }

    return '';
}

/**
 * Get social links (configurable via Customizer or options)
 */
function tbdesigned_get_social_links() {
    return array(
        'linkedin'  => get_theme_mod('social_linkedin', ''),
        'twitter'   => get_theme_mod('social_twitter', ''),
        'instagram' => get_theme_mod('social_instagram', ''),
    );
}

/**
 * Customizer settings
 */
function tbdesigned_customize_register($wp_customize) {
    // Social Links Section
    $wp_customize->add_section('tbdesigned_social', array(
        'title'    => __('Social Links', 'tbdesigned'),
        'priority' => 130,
    ));

    $social_networks = array('linkedin', 'twitter', 'instagram');
    
    foreach ($social_networks as $network) {
        $wp_customize->add_setting('social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control('social_' . $network, array(
            'label'   => ucfirst($network) . ' URL',
            'section' => 'tbdesigned_social',
            'type'    => 'url',
        ));
    }

    // Contact Info Section
    $wp_customize->add_section('tbdesigned_contact', array(
        'title'    => __('Contact Information', 'tbdesigned'),
        'priority' => 131,
    ));

    $wp_customize->add_setting('contact_email', array(
        'default'           => 'hello@tbdesigned.io',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label'   => 'Email Address',
        'section' => 'tbdesigned_contact',
        'type'    => 'email',
    ));

    $wp_customize->add_setting('contact_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label'   => 'Phone Number',
        'section' => 'tbdesigned_contact',
        'type'    => 'tel',
    ));

    $wp_customize->add_setting('contact_address', array(
        'default'           => 'Asheville, NC',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_address', array(
        'label'   => 'Address',
        'section' => 'tbdesigned_contact',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'tbdesigned_customize_register');

/**
 * Custom walker for primary navigation (adds aria attributes)
 */
class TBDesigned_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        
        // Add aria-current for current page
        if (in_array('current-menu-item', $classes)) {
            $atts['aria-current'] = 'page';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
