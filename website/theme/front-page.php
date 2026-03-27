<?php
/**
 * Template: Front Page (Homepage)
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<?php // Hero Section ?>
<?php
get_template_part('template-parts/hero', null, array(
    'title'              => 'Your Website Should Book Jobs, Not Just Look Pretty',
    'subtitle'           => 'Professional websites for landscaping, cleaning, and home service businesses — built to turn visitors into paying customers.',
    'cta_primary_text'   => 'Book a Free Call',
    'cta_primary_url'    => home_url('/contact/'),
    'cta_secondary_text' => 'See Our Work',
    'cta_secondary_url'  => home_url('/portfolio/'),
    'size'               => 'full',
    'style'              => 'dark',
));
?>

<?php // Problem Section ?>
<section class="section section--alt" aria-labelledby="problem-heading">
    <div class="container container--narrow">
        <span class="section__eyebrow"><?php esc_html_e('The Problem', 'tbdesigned'); ?></span>
        <h2 id="problem-heading" class="section__title">You're Losing Jobs to Competitors With Better Websites</h2>
        
        <div class="content-block">
            <p>Let's be honest — when someone searches "landscaper near me" or "cleaning service in [City]," they click the first few results.</p>
            
            <p>And if your website looks outdated, loads slowly, or doesn't have your phone number front and center?</p>
            
            <p><strong>They hit the back button and call your competitor instead.</strong></p>
            
            <p>The worst part? You never even knew they existed.</p>
            
            <p>You're great at what you do. Your customers love you. But your website isn't telling that story — and it's costing you money every single day.</p>
        </div>
    </div>
</section>

<?php // Solution Section ?>
<section class="section" aria-labelledby="solution-heading">
    <div class="container">
        <span class="section__eyebrow"><?php esc_html_e('Our Approach', 'tbdesigned'); ?></span>
        <h2 id="solution-heading" class="section__title">A Website That Actually Works For Your Business</h2>
        <p class="section__subtitle">We build websites specifically for home service businesses like yours. Not generic templates. Not DIY drag-and-drop disasters. Real websites designed to convert visitors into customers.</p>
        
        <div class="grid grid--4">
            <div class="service-card">
                <div class="service-card__icon">📍</div>
                <h3 class="service-card__title">Show Up When People Search</h3>
                <p class="service-card__description">Professional SEO so you rank on Google Maps and local search results.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">📞</div>
                <h3 class="service-card__title">Dead Simple to Contact</h3>
                <p class="service-card__description">Click-to-call buttons, contact forms, and your info everywhere it needs to be.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">⭐</div>
                <h3 class="service-card__title">Build Trust Instantly</h3>
                <p class="service-card__description">Reviews, photos of your work, and professional design that says "we're legit."</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">📱</div>
                <h3 class="service-card__title">Perfect on Every Device</h3>
                <p class="service-card__description">Most customers search on their phones — your site looks perfect there.</p>
            </div>
        </div>
    </div>
</section>

<?php // Industries Section ?>
<section class="section section--alt" aria-labelledby="industries-heading">
    <div class="container">
        <span class="section__eyebrow"><?php esc_html_e('Who We Serve', 'tbdesigned'); ?></span>
        <h2 id="industries-heading" class="section__title">Built For Home Service Pros</h2>
        
        <div class="grid grid--3">
            <div class="service-card">
                <div class="service-card__icon">🌿</div>
                <h3 class="service-card__title">Landscaping & Lawn Care</h3>
                <p class="service-card__description">Showcase your work, list your services, book more recurring maintenance contracts.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🧹</div>
                <h3 class="service-card__title">Cleaning Services</h3>
                <p class="service-card__description">Build trust for customers letting you into their homes. Reviews and credentials front and center.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🐜</div>
                <h3 class="service-card__title">Pest Control</h3>
                <p class="service-card__description">Professional presence that wins both residential and commercial accounts.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">💦</div>
                <h3 class="service-card__title">Pressure Washing</h3>
                <p class="service-card__description">Before/after galleries that sell the job before you even show up.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🏊</div>
                <h3 class="service-card__title">Pool Service</h3>
                <p class="service-card__description">Seasonal and year-round service packages displayed clearly.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🔧</div>
                <h3 class="service-card__title">And More...</h3>
                <p class="service-card__description">Junk removal, handyman services, painting, HVAC — if you serve homes, we build for you.</p>
            </div>
        </div>
        
        <div class="section__cta">
            <a href="<?php echo esc_url(home_url('/portfolio/')); ?>" class="btn btn--secondary">
                <?php esc_html_e('See Example Sites', 'tbdesigned'); ?>
                <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
            </a>
        </div>
    </div>
</section>

<?php // How It Works Section ?>
<section class="section" aria-labelledby="process-heading">
    <div class="container">
        <span class="section__eyebrow"><?php esc_html_e('The Process', 'tbdesigned'); ?></span>
        <h2 id="process-heading" class="section__title">Live in 2 Weeks, Not 2 Months</h2>
        
        <div class="process-steps">
            <div class="process-step">
                <div class="process-step__number">1</div>
                <h3 class="process-step__title">Quick Call (15 min)</h3>
                <p class="process-step__description">Tell us about your business, your services, and what makes you different. We handle the rest.</p>
            </div>
            
            <div class="process-step">
                <div class="process-step__number">2</div>
                <h3 class="process-step__title">We Build It</h3>
                <p class="process-step__description">Our team creates your site using proven designs for home service businesses. You review and request changes.</p>
            </div>
            
            <div class="process-step">
                <div class="process-step__number">3</div>
                <h3 class="process-step__title">Launch & Grow</h3>
                <p class="process-step__description">Your site goes live. We handle hosting, updates, and security. You focus on running your business.</p>
            </div>
        </div>
    </div>
</section>

<?php // Pricing Section ?>
<section class="section section--alt" id="pricing" aria-labelledby="pricing-heading">
    <div class="container">
        <span class="section__eyebrow"><?php esc_html_e('Transparent Pricing', 'tbdesigned'); ?></span>
        <h2 id="pricing-heading" class="section__title">Simple Pricing. No Surprises.</h2>
        
        <div class="grid grid--3 pricing-grid">
            <?php // Starter Package ?>
            <?php
            get_template_part('template-parts/pricing-card', null, array(
                'name'        => 'Starter',
                'price'       => '$297',
                'period'      => '/month',
                'setup_fee'   => '$995',
                'description' => 'Perfect for new businesses or replacing a DIY site',
                'features'    => array(
                    '5-page professional website',
                    'Mobile-optimized design',
                    'Click-to-call & contact forms',
                    'Google Business Profile setup',
                    'Basic SEO optimization',
                    'Monthly hosting & security',
                    '1 content update per month',
                ),
                'cta_text'    => 'Get Started',
                'cta_url'     => home_url('/contact/?package=starter'),
                'featured'    => false,
            ));
            ?>
            
            <?php // Growth Package (Featured) ?>
            <?php
            get_template_part('template-parts/pricing-card', null, array(
                'name'        => 'Growth',
                'price'       => '$397',
                'period'      => '/month',
                'setup_fee'   => '$1,995',
                'description' => 'For established businesses ready to grow',
                'features'    => array(
                    'Up to 10 pages',
                    'Service area pages (rank in multiple cities)',
                    'Review integration (Google, Yelp, Facebook)',
                    'Photo gallery / portfolio',
                    '2 content updates per month',
                    'Monthly performance report',
                    'Everything in Starter',
                ),
                'cta_text'    => 'Get Started',
                'cta_url'     => home_url('/contact/?package=growth'),
                'featured'    => true,
                'badge'       => '⭐ Most Popular',
            ));
            ?>
            
            <?php // Professional Package ?>
            <?php
            get_template_part('template-parts/pricing-card', null, array(
                'name'        => 'Professional',
                'price'       => '$497',
                'period'      => '/month',
                'setup_fee'   => '$3,500',
                'description' => 'For businesses ready to dominate their market',
                'features'    => array(
                    'Unlimited pages',
                    'Advanced SEO & local citations',
                    'Lead capture & follow-up forms',
                    'Competitor analysis',
                    '4 content updates per month',
                    'Priority support',
                    'Quarterly strategy call',
                ),
                'cta_text'    => 'Get Started',
                'cta_url'     => home_url('/contact/?package=professional'),
                'featured'    => false,
            ));
            ?>
        </div>
        
        <p class="pricing-note">
            <em><?php esc_html_e('All plans include hosting, SSL security, daily backups, and email support.', 'tbdesigned'); ?></em>
        </p>
        
        <div class="section__cta">
            <a href="<?php echo esc_url(home_url('/services/#comparison')); ?>" class="btn btn--ghost">
                <?php esc_html_e('Compare All Features', 'tbdesigned'); ?>
                <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
            </a>
        </div>
    </div>
</section>

<?php // Testimonials Section ?>
<section class="section" aria-labelledby="testimonials-heading">
    <div class="container">
        <span class="section__eyebrow"><?php esc_html_e('Client Results', 'tbdesigned'); ?></span>
        <h2 id="testimonials-heading" class="section__title">Trusted by Home Service Pros</h2>
        
        <div class="grid grid--3 testimonials-grid">
            <?php
            get_template_part('template-parts/testimonial', null, array(
                'quote'   => 'Before TBDesigned, we were getting maybe 2-3 calls a week from our website. Now it\'s 2-3 calls a day. Best investment we\'ve made in our business.',
                'name'    => 'Mike R.',
                'company' => 'GreenScape Landscaping',
                'role'    => 'Landscaping | Asheville, NC',
                'rating'  => 5,
            ));
            ?>
            
            <?php
            get_template_part('template-parts/testimonial', null, array(
                'quote'   => 'They made the whole process painless. I just answered some questions, and two weeks later I had a website I\'m actually proud to share.',
                'name'    => 'Sarah T.',
                'company' => 'Sparkle Clean Co',
                'role'    => 'Cleaning Services | Charlotte, NC',
                'rating'  => 5,
            ));
            ?>
            
            <?php
            get_template_part('template-parts/testimonial', null, array(
                'quote'   => 'Our Google ranking went from page 3 to the top 5 within 2 months. We\'re booked out 3 weeks now.',
                'name'    => 'James P.',
                'company' => 'PressureMax Pro',
                'role'    => 'Pressure Washing | Raleigh, NC',
                'rating'  => 5,
            ));
            ?>
        </div>
    </div>
</section>

<?php // FAQ Section ?>
<section class="section section--alt" aria-labelledby="faq-heading">
    <div class="container container--narrow">
        <span class="section__eyebrow"><?php esc_html_e('Questions & Answers', 'tbdesigned'); ?></span>
        <h2 id="faq-heading" class="section__title">Got Questions? We've Got Answers.</h2>
        
        <div class="faq-list" itemscope itemtype="https://schema.org/FAQPage">
            <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="faq-item__question" aria-expanded="false">
                    <span itemprop="name">Do I need to provide content for my website?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <p>Nope. We'll ask you some questions about your business and handle the writing. If you have photos of your work, great — send them over. If not, we can work with stock photos to start.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="faq-item__question" aria-expanded="false">
                    <span itemprop="name">How long does it take to build my site?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <p>Most sites launch within 2 weeks of our kickoff call. Complex sites with lots of pages might take 3 weeks.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="faq-item__question" aria-expanded="false">
                    <span itemprop="name">What if I already have a website?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <p>No problem. We can rebuild it from scratch or migrate your existing content to a better design. Your old site stays live until the new one is ready.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="faq-item__question" aria-expanded="false">
                    <span itemprop="name">Can I make changes after launch?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <p>Yes! Your package includes monthly content updates. Need something changed? Just email us and we'll handle it within 48 hours.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="faq-item__question" aria-expanded="false">
                    <span itemprop="name">What happens if I want to cancel?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <p>We require a 12-month commitment (you're investing in your business growth). After that, you can cancel anytime with 30 days notice. Your site files are yours to keep.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <button class="faq-item__question" aria-expanded="false">
                    <span itemprop="name">Do you help with Google Ads or social media?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <div itemprop="text">
                        <p>Not right now — we're focused on building great websites. But we can recommend partners if you need ads or social management.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section__cta">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--secondary">
                <?php esc_html_e('Have another question? Contact us', 'tbdesigned'); ?>
                <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
