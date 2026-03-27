<?php
/**
 * Template part for displaying testimonials
 *
 * @package TBDesigned
 */

$testimonial = isset($testimonial) ? $testimonial : get_post();
$author = get_post_meta($testimonial->ID, 'testimonial_author', true);
$role = get_post_meta($testimonial->ID, 'testimonial_role', true);
$company = get_post_meta($testimonial->ID, 'testimonial_company', true);
$rating = get_post_meta($testimonial->ID, 'testimonial_rating', true);
?>

<article class="testimonial">
    <blockquote class="testimonial__quote">
        <?php echo wp_kses_post($testimonial->post_content); ?>
    </blockquote>

    <div class="testimonial__author">
        <?php if (has_post_thumbnail($testimonial->ID)) : ?>
            <div class="testimonial__avatar">
                <?php echo get_the_post_thumbnail($testimonial->ID, 'thumbnail'); ?>
            </div>
        <?php endif; ?>

        <div class="testimonial__info">
            <div class="testimonial__name"><?php echo esc_html($author); ?></div>
            <div class="testimonial__role">
                <?php
                if ($role && $company) {
                    echo esc_html($role . ' at ' . $company);
                } elseif ($role) {
                    echo esc_html($role);
                } elseif ($company) {
                    echo esc_html($company);
                }
                ?>
            </div>
        </div>
    </div>
</article>
