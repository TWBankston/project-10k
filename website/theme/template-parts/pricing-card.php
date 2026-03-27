<?php
/**
 * Template Part: Pricing Card
 *
 * @package TBDesigned
 * @since 1.0.0
 * 
 * Usage: get_template_part('template-parts/pricing-card', null, $args);
 * 
 * Args:
 * - name (string): Package name
 * - price (string): Monthly price (e.g., "$297")
 * - period (string): Billing period (e.g., "/month")
 * - setup_fee (string): One-time setup fee (e.g., "$995")
 * - description (string): Package description
 * - features (array): Array of features (strings, prefix with - for "not included")
 * - cta_text (string): Button text
 * - cta_url (string): Button URL
 * - featured (bool): Is this the popular/featured option?
 * - badge (string): Badge text (e.g., "Most Popular")
 */

if (!defined('ABSPATH')) {
    exit;
}

// Default arguments
$defaults = array(
    'name'        => 'Package',
    'price'       => '$297',
    'period'      => '/month',
    'setup_fee'   => '',
    'description' => '',
    'features'    => array(),
    'cta_text'    => 'Get Started',
    'cta_url'     => home_url('/contact/'),
    'featured'    => false,
    'badge'       => '',
);

$args = wp_parse_args($args, $defaults);

$card_classes = 'pricing-card service-card';
if ($args['featured']) {
    $card_classes .= ' pricing-card--featured';
}
?>

<div class="<?php echo esc_attr($card_classes); ?>">
    <?php if (!empty($args['badge'])) : ?>
        <span class="pricing-card__badge"><?php echo esc_html($args['badge']); ?></span>
    <?php endif; ?>
    
    <h3 class="service-card__title"><?php echo esc_html($args['name']); ?></h3>
    
    <div class="pricing-card__price">
        <?php echo esc_html($args['price']); ?>
        <span><?php echo esc_html($args['period']); ?></span>
    </div>
    
    <?php if (!empty($args['setup_fee'])) : ?>
        <p class="pricing-card__setup">
            <?php printf(esc_html__('One-time setup: %s', 'tbdesigned'), '<strong>' . esc_html($args['setup_fee']) . '</strong>'); ?>
        </p>
    <?php endif; ?>
    
    <?php if (!empty($args['description'])) : ?>
        <p class="service-card__description"><?php echo esc_html($args['description']); ?></p>
    <?php endif; ?>
    
    <?php if (!empty($args['features'])) : ?>
        <ul class="service-card__features">
            <?php foreach ($args['features'] as $feature) : ?>
                <?php 
                $is_included = true;
                $feature_text = $feature;
                
                // Check if feature starts with - (not included)
                if (strpos($feature, '- ') === 0) {
                    $is_included = false;
                    $feature_text = ltrim($feature, '- ');
                } elseif (strpos($feature, '✓ ') === 0) {
                    $feature_text = ltrim($feature, '✓ ');
                }
                ?>
                <li class="<?php echo $is_included ? 'included' : 'not-included'; ?>">
                    <?php if ($is_included) : ?>
                        <span class="feature-check" aria-hidden="true">✓</span>
                    <?php else : ?>
                        <span class="feature-x" aria-hidden="true">—</span>
                    <?php endif; ?>
                    <?php echo esc_html($feature_text); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    
    <a href="<?php echo esc_url($args['cta_url']); ?>" class="btn <?php echo $args['featured'] ? 'btn--primary' : 'btn--secondary'; ?> btn--full">
        <?php echo esc_html($args['cta_text']); ?>
        <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
    </a>
</div>
