<?php
/**
 * 404 Error Page Template
 *
 * @package TBDesigned
 * @since 1.0.0
 */

get_header();
?>

<div class="container">
    <div class="error-page">
        <div class="error-page__code">404</div>
        <h1 class="error-page__title"><?php esc_html_e('Page Not Found', 'tbdesigned'); ?></h1>
        <p class="error-page__text">
            <?php esc_html_e('Sorry, the page you\'re looking for doesn\'t exist or has been moved.', 'tbdesigned'); ?>
        </p>

        <div class="error-page__actions">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn--primary">
                <?php esc_html_e('Go Home', 'tbdesigned'); ?>
            </a>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--secondary">
                <?php esc_html_e('Contact Us', 'tbdesigned'); ?>
            </a>
        </div>

        <?php get_search_form(); ?>
    </div>
</div>

<?php
get_footer();
