<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">
    <?php esc_html_e('Skip to content', 'tbdesigned'); ?>
</a>

<header class="site-header" id="masthead" role="banner">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Desktop Navigation -->
            <nav class="main-nav" id="site-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'tbdesigned'); ?>">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'walker'         => new TBDesigned_Nav_Walker(),
                    ));
                }
                ?>

                <!-- CTA Button -->
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary">
                    <?php esc_html_e('Get Started', 'tbdesigned'); ?>
                </a>
            </nav>

            <!-- Mobile Menu Toggle -->
            <button class="nav-toggle" id="nav-toggle" aria-label="<?php esc_attr_e('Toggle navigation', 'tbdesigned'); ?>" aria-expanded="false" aria-controls="mobile-navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobile-navigation">
        <?php
        if (has_nav_menu('mobile')) {
            wp_nav_menu(array(
                'theme_location' => 'mobile',
                'menu_id'        => 'mobile-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
            ));
        } elseif (has_nav_menu('primary')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'mobile-menu',
                'menu_class'     => 'nav-menu',
                'container'      => false,
            ));
        }
        ?>

        <div class="mobile-nav__cta">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--full">
                <?php esc_html_e('Get Started', 'tbdesigned'); ?>
            </a>
        </div>
    </div>
</header>

<main id="main-content" class="site-main" role="main">
