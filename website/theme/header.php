<?php
/**
 * Header Template
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <?php // DNS prefetch for external resources ?>
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <?php // Preconnect for faster font loading ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <?php // Favicon ?>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(TBDESIGNED_URI . '/assets/images/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(TBDESIGNED_URI . '/assets/images/favicon-16x16.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(TBDESIGNED_URI . '/assets/images/apple-touch-icon.png'); ?>">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">
    <?php esc_html_e('Skip to content', 'tbdesigned'); ?>
</a>

<header class="site-header" id="masthead" role="banner" itemscope itemtype="https://schema.org/WPHeader">
    <div class="container">
        <div class="header-inner">
            <?php // Logo ?>
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home" itemprop="url">
                    <?php if (has_custom_logo()) : ?>
                        <?php 
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                        if ($logo) : ?>
                            <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name'); ?>" itemprop="logo">
                        <?php endif; ?>
                    <?php else : ?>
                        <span itemprop="name"><?php bloginfo('name'); ?></span>
                    <?php endif; ?>
                </a>
            </div>

            <?php // Desktop Navigation ?>
            <nav class="main-nav" id="site-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary navigation', 'tbdesigned'); ?>" itemscope itemtype="https://schema.org/SiteNavigationElement">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'depth'          => 2,
                        'walker'         => new TBDesigned_Nav_Walker(),
                        'fallback_cb'    => false,
                    ));
                }
                ?>
                
                <?php // Header CTA Button ?>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary header-cta">
                    <?php esc_html_e('Book a Call', 'tbdesigned'); ?>
                </a>
            </nav>

            <?php // Phone number (optional - shown on larger screens) ?>
            <?php $phone = get_theme_mod('contact_phone', ''); ?>
            <?php if ($phone) : ?>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="header-phone" aria-label="<?php esc_attr_e('Call us', 'tbdesigned'); ?>">
                    <?php echo tbdesigned_icon('phone', 'icon'); ?>
                    <span><?php echo esc_html($phone); ?></span>
                </a>
            <?php endif; ?>

            <?php // Mobile Menu Toggle ?>
            <button class="nav-toggle" id="nav-toggle" aria-label="<?php esc_attr_e('Toggle navigation menu', 'tbdesigned'); ?>" aria-expanded="false" aria-controls="mobile-navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <?php // Mobile Navigation ?>
    <nav id="mobile-navigation" class="mobile-nav" role="navigation" aria-label="<?php esc_attr_e('Mobile navigation', 'tbdesigned'); ?>" aria-hidden="true">
        <?php
        if (has_nav_menu('mobile')) {
            wp_nav_menu(array(
                'theme_location' => 'mobile',
                'menu_id'        => 'mobile-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'depth'          => 2,
                'walker'         => new TBDesigned_Nav_Walker(),
                'fallback_cb'    => false,
            ));
        } elseif (has_nav_menu('primary')) {
            // Fallback to primary menu
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'mobile-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'depth'          => 2,
                'walker'         => new TBDesigned_Nav_Walker(),
                'fallback_cb'    => false,
            ));
        }
        ?>
        
        <?php // Mobile CTA ?>
        <div class="mobile-nav__cta">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--full">
                <?php esc_html_e('Book a Call', 'tbdesigned'); ?>
            </a>
            
            <?php if ($phone) : ?>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="btn btn--secondary btn--full">
                    <?php echo tbdesigned_icon('phone', 'icon'); ?>
                    <?php echo esc_html($phone); ?>
                </a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<main id="main-content" class="site-main" role="main">
