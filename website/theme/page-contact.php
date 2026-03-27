<?php
/**
 * Template Name: Contact
 * 
 * Contact page template
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Get contact info
$phone = get_theme_mod('contact_phone', '(828) 555-XXXX');
$email = get_theme_mod('contact_email', 'hello@tbdesigned.io');
$address = get_theme_mod('contact_address', 'Asheville, NC');

// Get selected package from URL parameter
$selected_package = isset($_GET['package']) ? sanitize_text_field($_GET['package']) : '';
?>

<?php // Hero Section ?>
<?php
get_template_part('template-parts/hero', null, array(
    'badge'              => 'Get in Touch',
    'title'              => 'Let\'s Talk About Your Website',
    'subtitle'           => 'Book a free 15-minute call, or reach out directly. We typically respond within a few hours.',
    'cta_primary_text'   => '',
    'cta_secondary_text' => '',
    'size'               => 'small',
    'style'              => 'dark',
));
?>

<?php // Main Contact Section ?>
<section class="section" aria-labelledby="contact-heading">
    <div class="container">
        <div class="contact-grid">
            <?php // Left Column: Calendly ?>
            <div class="contact-calendly">
                <h2 id="contact-heading">Book a Free Call</h2>
                <p>Pick a time that works for you. In 15 minutes, we'll:</p>
                <ul class="contact-benefits">
                    <li>
                        <?php echo tbdesigned_icon('check', 'icon'); ?>
                        Review your current website (or lack thereof)
                    </li>
                    <li>
                        <?php echo tbdesigned_icon('check', 'icon'); ?>
                        Discuss your business goals
                    </li>
                    <li>
                        <?php echo tbdesigned_icon('check', 'icon'); ?>
                        Recommend the best approach
                    </li>
                    <li>
                        <?php echo tbdesigned_icon('check', 'icon'); ?>
                        Answer any questions
                    </li>
                </ul>
                <p class="contact-note">No pressure, no hard sell — just an honest conversation.</p>
                
                <?php // Calendly Embed Placeholder ?>
                <div class="calendly-embed" data-url="https://calendly.com/tbdesigned/discovery">
                    <!-- Calendly inline widget begin -->
                    <div class="calendly-inline-widget" data-url="https://calendly.com/tbdesigned/discovery" style="min-width:320px;height:630px;"></div>
                    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                    <!-- Calendly inline widget end -->
                    
                    <?php // Fallback for when Calendly isn't loaded ?>
                    <noscript>
                        <div class="calendly-fallback">
                            <p>Please enable JavaScript to view the scheduling widget, or <a href="https://calendly.com/tbdesigned/discovery" target="_blank" rel="noopener noreferrer">click here to schedule directly</a>.</p>
                        </div>
                    </noscript>
                </div>
            </div>
            
            <?php // Right Column: Contact Info & Form ?>
            <div class="contact-info-form">
                <h2>Other Ways to Reach Us</h2>
                
                <div class="contact-methods">
                    <?php if ($phone) : ?>
                        <div class="contact-method">
                            <div class="contact-method__icon">
                                <?php echo tbdesigned_icon('phone'); ?>
                            </div>
                            <div class="contact-method__content">
                                <h3>Phone</h3>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>">
                                    <?php echo esc_html($phone); ?>
                                </a>
                                <p class="contact-method__note">Mon-Fri, 9am-6pm ET</p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($email) : ?>
                        <div class="contact-method">
                            <div class="contact-method__icon">
                                <?php echo tbdesigned_icon('mail'); ?>
                            </div>
                            <div class="contact-method__content">
                                <h3>Email</h3>
                                <a href="mailto:<?php echo esc_attr($email); ?>">
                                    <?php echo esc_html($email); ?>
                                </a>
                                <p class="contact-method__note">We respond within 4 hours</p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($address) : ?>
                        <div class="contact-method">
                            <div class="contact-method__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </div>
                            <div class="contact-method__content">
                                <h3>Location</h3>
                                <p><?php echo esc_html($address); ?></p>
                                <p class="contact-method__note">Serving home service businesses nationwide</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
                <?php // Social Links ?>
                <?php $social_links = tbdesigned_get_social_links(); ?>
                <?php $has_social = array_filter($social_links); ?>
                <?php if (!empty($has_social)) : ?>
                    <div class="contact-social">
                        <h3>Follow Us</h3>
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
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php // Contact Form Section ?>
<section class="section section--alt" aria-labelledby="form-heading">
    <div class="container container--narrow">
        <h2 id="form-heading" class="section__title">Send Us a Message</h2>
        
        <?php 
        // Check for Contact Form 7
        if (shortcode_exists('contact-form-7')) {
            // Replace with your actual CF7 form ID
            echo do_shortcode('[contact-form-7 id="contact-form" title="Contact Form"]');
        } else {
            // Fallback form
            ?>
            <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <?php wp_nonce_field('tbdesigned_contact_form', 'tbdesigned_nonce'); ?>
                <input type="hidden" name="action" value="tbdesigned_contact_form">
                
                <div class="form-row form-row--2">
                    <div class="form-group">
                        <label for="contact_name" class="form-label">Your Name <span class="required">*</span></label>
                        <input type="text" id="contact_name" name="contact_name" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_email" class="form-label">Email Address <span class="required">*</span></label>
                        <input type="email" id="contact_email" name="contact_email" class="form-input" required>
                    </div>
                </div>
                
                <div class="form-row form-row--2">
                    <div class="form-group">
                        <label for="contact_phone" class="form-label">Phone Number</label>
                        <input type="tel" id="contact_phone" name="contact_phone" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_website" class="form-label">Your Website (if you have one)</label>
                        <input type="url" id="contact_website" name="contact_website" class="form-input" placeholder="https://">
                    </div>
                </div>
                
                <div class="form-row form-row--2">
                    <div class="form-group">
                        <label for="business_type" class="form-label">What type of business do you have? <span class="required">*</span></label>
                        <select id="business_type" name="business_type" class="form-select" required>
                            <option value="">Select one...</option>
                            <option value="landscaping">Landscaping / Lawn Care</option>
                            <option value="cleaning">Cleaning Services</option>
                            <option value="pest">Pest Control</option>
                            <option value="pressure">Pressure Washing</option>
                            <option value="pool">Pool Service</option>
                            <option value="hvac">HVAC</option>
                            <option value="handyman">Handyman / General Contractor</option>
                            <option value="other">Other Home Services</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="looking_for" class="form-label">What are you looking for? <span class="required">*</span></label>
                        <select id="looking_for" name="looking_for" class="form-select" required>
                            <option value="">Select one...</option>
                            <option value="new">New website (don't have one currently)</option>
                            <option value="rebuild">Replace/rebuild existing website</option>
                            <option value="improve">Improve current website</option>
                            <option value="exploring">Just exploring options</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                
                <?php if ($selected_package) : ?>
                    <input type="hidden" name="selected_package" value="<?php echo esc_attr($selected_package); ?>">
                    <div class="form-group">
                        <p class="package-selected">
                            <strong>Interested in:</strong> 
                            <?php echo esc_html(ucfirst($selected_package)); ?> Package
                        </p>
                    </div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="message" class="form-label">Tell us about your business</label>
                    <textarea id="message" name="message" class="form-textarea" rows="5" placeholder="What services do you offer? What makes you different? What are your goals?"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="how_heard" class="form-label">How did you hear about us?</label>
                    <select id="how_heard" name="how_heard" class="form-select">
                        <option value="">Select one...</option>
                        <option value="google">Google Search</option>
                        <option value="referral">Referral</option>
                        <option value="social">Social Media</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="form-group form-group--submit">
                    <button type="submit" class="btn btn--primary btn--lg">
                        Send Message
                        <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
                    </button>
                    <p class="form-privacy">We respect your privacy. Your information will never be shared or sold.</p>
                </div>
            </form>
            <?php
        }
        ?>
    </div>
</section>

<?php // Quick FAQ ?>
<section class="section" aria-labelledby="quick-faq-heading">
    <div class="container container--narrow">
        <h2 id="quick-faq-heading" class="section__title">Quick Answers</h2>
        
        <div class="faq-list">
            <div class="faq-item">
                <button class="faq-item__question" aria-expanded="false">
                    <span>What happens on the call?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer">
                    <p>It's a casual 15-minute conversation. We'll ask about your business, look at your current website (if you have one), and discuss whether we're a good fit. No pressure.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-item__question" aria-expanded="false">
                    <span>Do I need to prepare anything?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer">
                    <p>Nope! Just have an idea of what you're looking for. If you have competitors you admire or websites you like, feel free to share.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-item__question" aria-expanded="false">
                    <span>How fast can you build my site?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer">
                    <p>Most sites launch within 2 weeks of kickoff. Complex projects might take 3 weeks.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-item__question" aria-expanded="false">
                    <span>What's your pricing?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer">
                    <p>Our packages start at $297/month + a one-time setup fee. <a href="<?php echo esc_url(home_url('/services/#pricing')); ?>">See full pricing →</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php // Existing Client Support ?>
<section class="section section--alt" aria-labelledby="support-heading">
    <div class="container container--narrow">
        <div class="support-box">
            <h2 id="support-heading">Existing Client?</h2>
            <p>If you're an existing client with an urgent issue (site down, security problem, etc.), call us directly:</p>
            
            <?php if ($phone) : ?>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="btn btn--secondary btn--lg">
                    <?php echo tbdesigned_icon('phone', 'icon'); ?>
                    <?php echo esc_html($phone); ?>
                </a>
            <?php endif; ?>
            
            <p class="support-note">For routine support requests, email <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>.</p>
        </div>
    </div>
</section>

<?php
get_footer();
