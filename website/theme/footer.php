<?php
/**
 * Footer Template
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get contact info
$phone = get_theme_mod('contact_phone', '(828) 555-XXXX');
$email = get_theme_mod('contact_email', 'hello@tbdesigned.io');
$address = get_theme_mod('contact_address', 'Asheville, NC');
$social_links = tbdesigned_get_social_links();
?>

</main><?php // Close main from header.php ?>

<?php // Pre-footer CTA Section ?>
<section class="cta-section" aria-labelledby="cta-heading">
    <div class="container">
        <h2 id="cta-heading">Ready to Stop Losing Jobs to Bad Websites?</h2>
        <p>Book a 15-minute call. We'll look at your current situation and show you exactly how a professional website can help you book more jobs.</p>
        <div class="cta-section__actions">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--lg" style="background-color: var(--color-white); color: var(--color-primary);">
                Book Your Free Call
                <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
            </a>
            <?php if ($phone) : ?>
                <span class="cta-section__phone">
                    Or call us: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                </span>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php // Trust Badges ?>
<div class="trust-badges">
    <div class="container">
        <div class="trust-badges__grid">
            <div class="trust-badge">
                <span class="trust-badge__icon">🔒</span>
                <span class="trust-badge__text">SSL Secured</span>
            </div>
            <div class="trust-badge">
                <span class="trust-badge__icon">⚡</span>
                <span class="trust-badge__text">99.9% Uptime</span>
            </div>
            <div class="trust-badge">
                <span class="trust-badge__icon">🇺🇸</span>
                <span class="trust-badge__text">US-Based Support</span>
            </div>
            <div class="trust-badge">
                <span class="trust-badge__icon">💰</span>
                <span class="trust-badge__text">30-Day Guarantee</span>
            </div>
        </div>
    </div>
</div>

<footer class="site-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
    <div class="container">
        <div class="footer-grid">
            <?php // Brand Column ?>
            <div class="footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <?php bloginfo('name'); ?>
                    <?php endif; ?>
                </a>
                <p><?php esc_html_e('Professional websites for home service businesses. Built to book more jobs.', 'tbdesigned'); ?></p>
            </div>

            <?php // Quick Links ?>
            <div class="footer-column">
                <h4 class="footer-title"><?php esc_html_e('Quick Links', 'tbdesigned'); ?></h4>
                <?php
                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-links',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                } else {
                    // Default links
                    ?>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url(home_url('/services/')); ?>"><?php esc_html_e('Services', 'tbdesigned'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/portfolio/')); ?>"><?php esc_html_e('Portfolio', 'tbdesigned'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About', 'tbdesigned'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact', 'tbdesigned'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>"><?php esc_html_e('Blog', 'tbdesigned'); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <?php // Legal Links ?>
            <div class="footer-column">
                <h4 class="footer-title"><?php esc_html_e('Legal', 'tbdesigned'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'tbdesigned'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/terms-of-service/')); ?>"><?php esc_html_e('Terms of Service', 'tbdesigned'); ?></a></li>
                </ul>
            </div>

            <?php // Contact Info ?>
            <div class="footer-column" itemscope itemtype="https://schema.org/LocalBusiness">
                <meta itemprop="name" content="<?php bloginfo('name'); ?>">
                <h4 class="footer-title"><?php esc_html_e('Contact', 'tbdesigned'); ?></h4>
                <ul class="footer-links footer-contact">
                    <?php if ($phone) : ?>
                        <li>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" itemprop="telephone">
                                <?php echo tbdesigned_icon('phone', 'icon'); ?>
                                <?php echo esc_html($phone); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php if ($email) : ?>
                        <li>
                            <a href="mailto:<?php echo esc_attr($email); ?>" itemprop="email">
                                <?php echo tbdesigned_icon('mail', 'icon'); ?>
                                <?php echo esc_html($email); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php if ($address) : ?>
                        <li itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                            <span itemprop="addressLocality"><?php echo esc_html($address); ?></span>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <?php // Footer Bottom ?>
        <div class="footer-bottom">
            <p class="footer-copyright">
                &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. 
                <?php esc_html_e('All rights reserved.', 'tbdesigned'); ?>
            </p>

            <?php // Social Links ?>
            <div class="social-links">
                <?php foreach ($social_links as $network => $url) : ?>
                    <?php if (!empty($url)) : ?>
                        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr(ucfirst($network)); ?>">
                            <?php echo tbdesigned_icon($network); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer>

<?php // Floating Mobile CTA ?>
<div class="floating-cta" aria-hidden="true">
    <?php if ($phone) : ?>
        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="floating-cta__btn" aria-label="<?php esc_attr_e('Call Now', 'tbdesigned'); ?>">
            <?php echo tbdesigned_icon('phone'); ?>
            <span><?php esc_html_e('Call Now', 'tbdesigned'); ?></span>
        </a>
    <?php endif; ?>
</div>

<?php // Schema.org LocalBusiness Markup ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "<?php bloginfo('name'); ?>",
    "description": "<?php bloginfo('description'); ?>",
    "url": "<?php echo esc_url(home_url('/')); ?>",
    <?php if ($phone) : ?>
    "telephone": "<?php echo esc_js($phone); ?>",
    <?php endif; ?>
    <?php if ($email) : ?>
    "email": "<?php echo esc_js($email); ?>",
    <?php endif; ?>
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Asheville",
        "addressRegion": "NC",
        "addressCountry": "US"
    },
    "areaServed": {
        "@type": "Country",
        "name": "United States"
    },
    "priceRange": "$$",
    "serviceType": ["Web Design", "Web Development", "SEO"],
    "sameAs": [
        <?php 
        $same_as = array();
        foreach ($social_links as $url) {
            if (!empty($url)) {
                $same_as[] = '"' . esc_url($url) . '"';
            }
        }
        echo implode(',', $same_as);
        ?>
    ]
}
</script>

<?php wp_footer(); ?>

</body>
</html>
