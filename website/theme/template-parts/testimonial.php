<?php
/**
 * Template Part: Testimonial
 *
 * @package TBDesigned
 * @since 1.0.0
 * 
 * Usage: get_template_part('template-parts/testimonial', null, $args);
 * 
 * Args:
 * - quote (string): The testimonial text
 * - name (string): Client name
 * - company (string): Company name
 * - role (string): Role/Industry (e.g., "Landscaping | Asheville")
 * - avatar (string): Avatar image URL (optional)
 * - rating (int): Star rating 1-5 (optional)
 * 
 * OR: Pass a WP_Post object or post ID as $testimonial to pull from CPT
 */

if (!defined('ABSPATH')) {
    exit;
}

// Check if we're receiving args array (new method) or post object (legacy method)
if (!empty($args) && is_array($args) && isset($args['quote'])) {
    // New method: using passed arguments
    $defaults = array(
        'quote'   => '',
        'name'    => '',
        'company' => '',
        'role'    => '',
        'avatar'  => '',
        'rating'  => 5,
    );
    
    $args = wp_parse_args($args, $defaults);
    $quote = $args['quote'];
    $name = $args['name'];
    $company = $args['company'];
    $role = $args['role'];
    $avatar = $args['avatar'];
    $rating = $args['rating'];
    $has_avatar = !empty($avatar);
    $avatar_url = $avatar;
} else {
    // Legacy method: using post object
    $testimonial = isset($testimonial) ? $testimonial : get_post();
    
    if (!$testimonial) {
        return;
    }
    
    $quote = $testimonial->post_content;
    $name = get_post_meta($testimonial->ID, 'testimonial_author', true);
    $company = get_post_meta($testimonial->ID, 'testimonial_company', true);
    $role = get_post_meta($testimonial->ID, 'testimonial_role', true);
    $rating = get_post_meta($testimonial->ID, 'testimonial_rating', true);
    $has_avatar = has_post_thumbnail($testimonial->ID);
    $avatar_url = $has_avatar ? get_the_post_thumbnail_url($testimonial->ID, 'thumbnail') : '';
}

// Ensure rating is numeric
$rating = is_numeric($rating) ? intval($rating) : 5;
?>

<div class="testimonial" itemscope itemtype="https://schema.org/Review">
    <?php if (!empty($rating) && $rating > 0) : ?>
        <div class="testimonial__rating" aria-label="<?php printf(esc_attr__('%d out of 5 stars', 'tbdesigned'), $rating); ?>">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <span class="star <?php echo $i <= $rating ? 'star--filled' : ''; ?>" aria-hidden="true">★</span>
            <?php endfor; ?>
            <meta itemprop="reviewRating" content="<?php echo esc_attr($rating); ?>">
        </div>
    <?php endif; ?>
    
    <?php if (!empty($quote)) : ?>
        <blockquote class="testimonial__quote" itemprop="reviewBody">
            <?php echo wp_kses_post($quote); ?>
        </blockquote>
    <?php endif; ?>
    
    <div class="testimonial__author" itemprop="author" itemscope itemtype="https://schema.org/Person">
        <?php if ($has_avatar && !empty($avatar_url)) : ?>
            <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo esc_attr($name); ?>" class="testimonial__avatar" loading="lazy">
        <?php elseif (!empty($name)) : ?>
            <div class="testimonial__avatar testimonial__avatar--placeholder" aria-hidden="true">
                <?php echo esc_html(strtoupper(substr($name, 0, 1))); ?>
            </div>
        <?php endif; ?>
        
        <div class="testimonial__info">
            <?php if (!empty($name)) : ?>
                <cite class="testimonial__name" itemprop="name"><?php echo esc_html($name); ?></cite>
            <?php endif; ?>
            
            <?php if (!empty($company)) : ?>
                <span class="testimonial__company"><?php echo esc_html($company); ?></span>
            <?php endif; ?>
            
            <?php if (!empty($role)) : ?>
                <span class="testimonial__role"><?php echo esc_html($role); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>
