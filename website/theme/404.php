<?php
/**
 * 404 Error Page Template
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<section class="error-page">
    <div class="container">
        <div class="error-page__content">
            <span class="error-page__code" aria-hidden="true">404</span>
            
            <h1 class="error-page__title"><?php esc_html_e('Page Not Found', 'tbdesigned'); ?></h1>
            
            <p class="error-page__text">
                <?php esc_html_e('Oops! The page you\'re looking for doesn\'t exist or has been moved. Let\'s get you back on track.', 'tbdesigned'); ?>
            </p>
            
            <div class="error-page__actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary btn--lg">
                    <?php echo tbdesigned_icon('arrow-right', 'icon icon--flip'); ?>
                    <?php esc_html_e('Back to Homepage', 'tbdesigned'); ?>
                </a>
            </div>
            
            <?php // Helpful Links ?>
            <div class="error-page__links">
                <h2><?php esc_html_e('Helpful Links', 'tbdesigned'); ?></h2>
                <ul>
                    <li>
                        <a href="<?php echo esc_url(home_url('/services/')); ?>">
                            <?php esc_html_e('Our Services', 'tbdesigned'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/portfolio/')); ?>">
                            <?php esc_html_e('Portfolio', 'tbdesigned'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/about/')); ?>">
                            <?php esc_html_e('About Us', 'tbdesigned'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>">
                            <?php esc_html_e('Contact', 'tbdesigned'); ?>
                        </a>
                    </li>
                </ul>
            </div>
            
            <?php // Search Form ?>
            <div class="error-page__search">
                <h2><?php esc_html_e('Or try a search:', 'tbdesigned'); ?></h2>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</section>

<?php // Still need help CTA ?>
<section class="section section--alt" aria-labelledby="help-heading">
    <div class="container container--narrow">
        <div class="cta-box">
            <h2 id="help-heading"><?php esc_html_e('Still Need Help?', 'tbdesigned'); ?></h2>
            <p><?php esc_html_e('Can\'t find what you\'re looking for? We\'re here to help. Contact us and we\'ll point you in the right direction.', 'tbdesigned'); ?></p>
            
            <div class="cta-box__actions">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary">
                    <?php esc_html_e('Contact Us', 'tbdesigned'); ?>
                    <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
                </a>
                
                <?php $phone = get_theme_mod('contact_phone', ''); ?>
                <?php if ($phone) : ?>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="btn btn--secondary">
                        <?php echo tbdesigned_icon('phone', 'icon'); ?>
                        <?php echo esc_html($phone); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
