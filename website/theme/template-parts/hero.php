<?php
/**
 * Template Part: Hero Section
 *
 * @package TBDesigned
 * @since 1.0.0
 * 
 * Usage: get_template_part('template-parts/hero', null, $args);
 * 
 * Args:
 * - badge (string): Eyebrow text
 * - title (string): Main headline
 * - subtitle (string): Subheadline
 * - cta_primary_text (string): Primary button text
 * - cta_primary_url (string): Primary button URL
 * - cta_secondary_text (string): Secondary button text
 * - cta_secondary_url (string): Secondary button URL
 * - size (string): 'full' (80vh), 'medium' (60vh), 'small' (auto)
 * - style (string): 'dark' (default), 'light', 'gradient'
 * - background_image (string): Background image URL
 */

if (!defined('ABSPATH')) {
    exit;
}

// Default arguments
$defaults = array(
    'badge'             => '',
    'title'             => '',
    'subtitle'          => '',
    'cta_primary_text'  => 'Book a Free Call',
    'cta_primary_url'   => home_url('/contact/'),
    'cta_secondary_text' => '',
    'cta_secondary_url'  => '',
    'size'              => 'full',
    'style'             => 'dark',
    'background_image'  => '',
);

$args = wp_parse_args($args, $defaults);

// Size classes
$size_class = '';
switch ($args['size']) {
    case 'full':
        $size_class = 'hero--full';
        break;
    case 'medium':
        $size_class = 'hero--medium';
        break;
    case 'small':
        $size_class = 'hero--small';
        break;
}

// Style classes
$style_class = 'hero--' . esc_attr($args['style']);

// Background image style
$bg_style = '';
if (!empty($args['background_image'])) {
    $bg_style = 'background-image: url(' . esc_url($args['background_image']) . ');';
}
?>

<section class="hero <?php echo esc_attr($size_class . ' ' . $style_class); ?>" <?php if ($bg_style) echo 'style="' . esc_attr($bg_style) . '"'; ?>>
    <div class="hero__bg" aria-hidden="true"></div>
    
    <div class="container">
        <div class="hero__content">
            <?php if (!empty($args['badge'])) : ?>
                <span class="hero__badge"><?php echo esc_html($args['badge']); ?></span>
            <?php endif; ?>
            
            <?php if (!empty($args['title'])) : ?>
                <h1 class="hero__title"><?php echo wp_kses_post($args['title']); ?></h1>
            <?php endif; ?>
            
            <?php if (!empty($args['subtitle'])) : ?>
                <p class="hero__subtitle"><?php echo wp_kses_post($args['subtitle']); ?></p>
            <?php endif; ?>
            
            <?php if (!empty($args['cta_primary_text']) || !empty($args['cta_secondary_text'])) : ?>
                <div class="hero__actions">
                    <?php if (!empty($args['cta_primary_text'])) : ?>
                        <a href="<?php echo esc_url($args['cta_primary_url']); ?>" class="btn btn--primary btn--lg">
                            <?php echo esc_html($args['cta_primary_text']); ?>
                            <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php if (!empty($args['cta_secondary_text'])) : ?>
                        <a href="<?php echo esc_url($args['cta_secondary_url']); ?>" class="btn btn--secondary btn--lg">
                            <?php echo esc_html($args['cta_secondary_text']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
