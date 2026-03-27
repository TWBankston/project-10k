<?php
/**
 * Template Name: Services
 * 
 * Services page template
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
    'badge'              => 'Our Services',
    'title'              => 'Websites Built to Book More Jobs',
    'subtitle'           => 'Everything you need to look professional online and convert visitors into customers — all in one monthly package.',
    'cta_primary_text'   => 'See Pricing',
    'cta_primary_url'    => '#pricing',
    'cta_secondary_text' => 'Book a Call',
    'cta_secondary_url'  => home_url('/contact/'),
    'size'               => 'medium',
    'style'              => 'dark',
));
?>

<?php // What's Included Section ?>
<section class="section" aria-labelledby="included-heading">
    <div class="container">
        <h2 id="included-heading" class="section__title">What's Included With Every Website</h2>
        
        <div class="grid grid--3">
            <div class="service-card">
                <div class="service-card__icon">🎨</div>
                <h3 class="service-card__title">Custom Design</h3>
                <p class="service-card__description">No cookie-cutter templates. Your site is designed specifically for your business, your brand, and your customers.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">📱</div>
                <h3 class="service-card__title">Mobile-First Build</h3>
                <p class="service-card__description">Over 70% of your customers search on their phones. Your site will look and work perfectly on every device.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">⚡</div>
                <h3 class="service-card__title">Speed Optimized</h3>
                <p class="service-card__description">Slow sites lose customers. We optimize for fast load times that keep visitors engaged.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🔍</div>
                <h3 class="service-card__title">SEO Foundation</h3>
                <p class="service-card__description">Built with Google in mind. Proper structure, meta tags, and content that helps you rank locally.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🖥️</div>
                <h3 class="service-card__title">Managed Hosting</h3>
                <p class="service-card__description">Fast, secure hosting included. We handle the technical stuff so you don't have to.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🛠️</div>
                <h3 class="service-card__title">Ongoing Support</h3>
                <p class="service-card__description">Updates, changes, and fixes — we've got you covered. Just email us what you need.</p>
            </div>
        </div>
    </div>
</section>

<?php // Pricing Section ?>
<section class="section section--alt" id="pricing" aria-labelledby="pricing-heading">
    <div class="container">
        <h2 id="pricing-heading" class="section__title">Choose Your Package</h2>
        
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
    </div>
</section>

<?php // Feature Comparison Table ?>
<section class="section" id="comparison" aria-labelledby="comparison-heading">
    <div class="container">
        <h2 id="comparison-heading" class="section__title">Compare All Features</h2>
        
        <div class="comparison-table-wrapper">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th scope="col">Feature</th>
                        <th scope="col">Starter</th>
                        <th scope="col" class="featured">Growth</th>
                        <th scope="col">Professional</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Monthly Price</strong></td>
                        <td>$297</td>
                        <td class="featured">$397</td>
                        <td>$497</td>
                    </tr>
                    <tr>
                        <td><strong>Setup Fee</strong></td>
                        <td>$995</td>
                        <td class="featured">$1,995</td>
                        <td>$3,500</td>
                    </tr>
                    <tr>
                        <td>Pages</td>
                        <td>5</td>
                        <td class="featured">10</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <td>Mobile Responsive</td>
                        <td>✓</td>
                        <td class="featured">✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Contact Forms</td>
                        <td>✓</td>
                        <td class="featured">✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Click-to-Call</td>
                        <td>✓</td>
                        <td class="featured">✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Google Business Setup</td>
                        <td>✓</td>
                        <td class="featured">✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Basic SEO</td>
                        <td>✓</td>
                        <td class="featured">✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>SSL Security</td>
                        <td>✓</td>
                        <td class="featured">✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Daily Backups</td>
                        <td>✓</td>
                        <td class="featured">✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Service Area Pages</td>
                        <td>—</td>
                        <td class="featured">✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Review Integration</td>
                        <td>—</td>
                        <td class="featured">✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Photo Gallery</td>
                        <td>—</td>
                        <td class="featured">✓</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Performance Reports</td>
                        <td>—</td>
                        <td class="featured">Monthly</td>
                        <td>Monthly</td>
                    </tr>
                    <tr>
                        <td>Content Updates</td>
                        <td>1/month</td>
                        <td class="featured">2/month</td>
                        <td>4/month</td>
                    </tr>
                    <tr>
                        <td>Advanced SEO</td>
                        <td>—</td>
                        <td class="featured">—</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Local Citations</td>
                        <td>—</td>
                        <td class="featured">—</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Lead Capture Forms</td>
                        <td>—</td>
                        <td class="featured">—</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Competitor Analysis</td>
                        <td>—</td>
                        <td class="featured">—</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Priority Support</td>
                        <td>—</td>
                        <td class="featured">—</td>
                        <td>✓</td>
                    </tr>
                    <tr>
                        <td>Strategy Calls</td>
                        <td>—</td>
                        <td class="featured">—</td>
                        <td>Quarterly</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php // Industry Specializations ?>
<section class="section section--alt" aria-labelledby="industries-heading">
    <div class="container">
        <h2 id="industries-heading" class="section__title">Designed for Home Service Pros</h2>
        <p class="section__subtitle">We don't build websites for everyone. We specialize in home service businesses because we understand your customers, your competition, and what it takes to win in your market.</p>
        
        <div class="grid grid--3">
            <div class="service-card">
                <div class="service-card__icon">🌿</div>
                <h3 class="service-card__title">Landscaping & Lawn Care</h3>
                <p class="service-card__description">Seasonal services, maintenance contracts, design portfolios. We know how to showcase outdoor transformations.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🧹</div>
                <h3 class="service-card__title">Residential Cleaning</h3>
                <p class="service-card__description">Trust signals are everything. We highlight your reliability, background checks, and happy customer reviews.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🐜</div>
                <h3 class="service-card__title">Pest Control</h3>
                <p class="service-card__description">Professional credibility that wins both residential and commercial accounts. License numbers and certifications front and center.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">💦</div>
                <h3 class="service-card__title">Pressure Washing</h3>
                <p class="service-card__description">Before/after galleries that sell the job. Service packages clearly displayed with pricing guidance.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🏊</div>
                <h3 class="service-card__title">Pool Service</h3>
                <p class="service-card__description">Weekly maintenance, seasonal services, equipment sales. We organize it all for easy customer navigation.</p>
            </div>
            
            <div class="service-card">
                <div class="service-card__icon">🔧</div>
                <h3 class="service-card__title">General Home Services</h3>
                <p class="service-card__description">HVAC, plumbing, electrical, handyman — we've built sites across the home services spectrum.</p>
            </div>
        </div>
    </div>
</section>

<?php // Our Process ?>
<section class="section" aria-labelledby="process-heading">
    <div class="container">
        <h2 id="process-heading" class="section__title">How We Work</h2>
        
        <div class="process-timeline">
            <div class="process-timeline__item">
                <div class="process-timeline__marker">Week 1</div>
                <div class="process-timeline__content">
                    <h3>Discovery & Strategy</h3>
                    <ul>
                        <li>15-minute kickoff call</li>
                        <li>Business questionnaire</li>
                        <li>Competitor review</li>
                        <li>Site structure planning</li>
                        <li>Content gathering</li>
                    </ul>
                </div>
            </div>
            
            <div class="process-timeline__item">
                <div class="process-timeline__marker">Week 2</div>
                <div class="process-timeline__content">
                    <h3>Design & Build</h3>
                    <ul>
                        <li>Custom design mockup</li>
                        <li>Your feedback & revisions</li>
                        <li>Full site development</li>
                        <li>Content population</li>
                        <li>SEO setup</li>
                    </ul>
                </div>
            </div>
            
            <div class="process-timeline__item">
                <div class="process-timeline__marker">Week 2-3</div>
                <div class="process-timeline__content">
                    <h3>Review & Launch</h3>
                    <ul>
                        <li>Full site review with you</li>
                        <li>Final revisions</li>
                        <li>Technical testing</li>
                        <li>DNS switch</li>
                        <li>Site goes live!</li>
                    </ul>
                </div>
            </div>
            
            <div class="process-timeline__item">
                <div class="process-timeline__marker">Ongoing</div>
                <div class="process-timeline__content">
                    <h3>Support & Growth</h3>
                    <ul>
                        <li>Monthly updates</li>
                        <li>Performance monitoring</li>
                        <li>Continuous improvements</li>
                        <li>Always available support</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php // Add-On Services ?>
<section class="section section--alt" aria-labelledby="addons-heading">
    <div class="container container--narrow">
        <h2 id="addons-heading" class="section__title">Additional Services</h2>
        
        <div class="addons-table-wrapper">
            <table class="addons-table">
                <thead>
                    <tr>
                        <th scope="col">Service</th>
                        <th scope="col">Description</th>
                        <th scope="col">Pricing</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Logo Design</strong></td>
                        <td>Professional logo + brand kit</td>
                        <td>$500</td>
                    </tr>
                    <tr>
                        <td><strong>Additional Pages</strong></td>
                        <td>Beyond package limits</td>
                        <td>$200/page</td>
                    </tr>
                    <tr>
                        <td><strong>Rush Delivery</strong></td>
                        <td>1-week turnaround</td>
                        <td>+50% setup</td>
                    </tr>
                    <tr>
                        <td><strong>Content Writing</strong></td>
                        <td>Professional copywriting</td>
                        <td>$150/page</td>
                    </tr>
                    <tr>
                        <td><strong>Photography</strong></td>
                        <td>Professional photo session</td>
                        <td>Custom quote</td>
                    </tr>
                    <tr>
                        <td><strong>Video</strong></td>
                        <td>Promo video production</td>
                        <td>Custom quote</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php // Guarantee Section ?>
<section class="section" aria-labelledby="guarantee-heading">
    <div class="container container--narrow">
        <div class="guarantee-box">
            <h2 id="guarantee-heading">Our Promise</h2>
            <p>We stand behind our work. If you're not happy with your website within the first 30 days, we'll keep working until you are — or refund your setup fee completely.</p>
            <p><strong>No fine print. No hassle. Just good work or your money back.</strong></p>
        </div>
    </div>
</section>

<?php // Service FAQ ?>
<section class="section section--alt" aria-labelledby="faq-heading">
    <div class="container container--narrow">
        <h2 id="faq-heading" class="section__title">Service Questions</h2>
        
        <div class="faq-list">
            <div class="faq-item">
                <button class="faq-item__question" aria-expanded="false">
                    <span>What's included in "content updates"?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer">
                    <p>Text changes, image swaps, adding new services, updating pricing, adding team members — basically any content changes to your existing site. Major redesigns or new page builds are separate.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-item__question" aria-expanded="false">
                    <span>Do I own my website?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer">
                    <p>Yes. If you ever cancel, you keep all your website files. We'll provide everything you need to move your site elsewhere.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-item__question" aria-expanded="false">
                    <span>What about my domain name?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer">
                    <p>You keep ownership of your domain. If you don't have one, we'll help you purchase it (domain fees are separate, usually $15/year).</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-item__question" aria-expanded="false">
                    <span>Can I see examples of your work?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer">
                    <p>Absolutely! Check out our <a href="<?php echo esc_url(home_url('/portfolio/')); ?>">Portfolio</a> to see sites we've built for other home service businesses.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-item__question" aria-expanded="false">
                    <span>What if I need more than what's in my package?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer">
                    <p>We can always add more pages, features, or services. We'll quote any additions before starting.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-item__question" aria-expanded="false">
                    <span>Do you offer payment plans for setup fees?</span>
                    <span class="faq-item__icon" aria-hidden="true">+</span>
                </button>
                <div class="faq-item__answer">
                    <p>Yes, for Growth and Professional packages we can split setup fees over 2-3 months. Just ask.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
