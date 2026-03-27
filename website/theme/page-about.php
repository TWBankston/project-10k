<?php
/**
 * Template Name: About
 * 
 * About page template
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
    'badge'              => 'About Us',
    'title'              => 'We Build Websites That Work',
    'subtitle'           => 'A small team obsessed with helping home service businesses look professional and book more jobs.',
    'cta_primary_text'   => '',
    'cta_secondary_text' => '',
    'size'               => 'small',
    'style'              => 'dark',
));
?>

<?php // Mission Section ?>
<section class="section" aria-labelledby="mission-heading">
    <div class="container container--narrow">
        <h2 id="mission-heading" class="section__title">Our Mission</h2>
        
        <div class="content-block content-block--large">
            <p class="lead">Every home service professional deserves a website that works as hard as they do.</p>
            
            <p>You shouldn't need to hire an expensive agency. You shouldn't have to learn to code. You shouldn't have to worry about hosting, security, or updates.</p>
            
            <p>You should have a professional website that makes you proud, helps you get found online, and converts visitors into customers.</p>
            
            <p><strong>That's what we build.</strong></p>
        </div>
    </div>
</section>

<?php // Story Section ?>
<section class="section section--alt" aria-labelledby="story-heading">
    <div class="container container--narrow">
        <h2 id="story-heading" class="section__title">The Story</h2>
        
        <div class="content-block">
            <p><strong>TBDesigned was born from a simple observation:</strong> Most home service businesses have terrible websites, and it's costing them thousands in lost jobs.</p>
            
            <p>I've spent years building websites for agencies and businesses of all sizes. I've seen what works, what doesn't, and how much money companies waste on websites that don't perform.</p>
            
            <p>When I looked at the home services industry, I saw an opportunity: <strong>hardworking professionals who are great at what they do, but struggling to look professional online.</strong></p>
            
            <p>The big agencies charge $10,000+ and take months to deliver. The DIY builders leave you with something that screams "I made this myself." And the cheap freelancers... well, you get what you pay for.</p>
            
            <p><strong>TBDesigned is the middle ground.</strong> Professional quality, reasonable pricing, fast turnaround. Everything you need in one monthly package.</p>
            
            <p>No massive upfront costs. No technical headaches. No wondering if your website is actually helping your business.</p>
            
            <p>Just a website that works, backed by a team that cares.</p>
        </div>
    </div>
</section>

<?php // Founder Section ?>
<section class="section" aria-labelledby="founder-heading">
    <div class="container">
        <div class="founder-card">
            <div class="founder-card__image">
                <?php 
                // Check for featured image or use placeholder
                $founder_image = get_theme_mod('founder_image', '');
                if ($founder_image) : ?>
                    <img src="<?php echo esc_url($founder_image); ?>" alt="Tyler Bankston - Founder of TBDesigned" loading="lazy">
                <?php else : ?>
                    <div class="founder-card__placeholder" aria-hidden="true">
                        <span>TB</span>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="founder-card__content">
                <h2 id="founder-heading">Meet the Founder</h2>
                <h3>Tyler Bankston</h3>
                <p class="founder-card__role">Founder & Lead Designer</p>
                
                <p>Tyler is a web developer and designer with experience at digital agencies serving clients from startups to enterprise brands. He specializes in WordPress, modern web technologies, and building systems that scale.</p>
                
                <p>After years of watching home service businesses struggle with their online presence, he founded TBDesigned to bring agency-quality websites to small businesses at prices that make sense.</p>
                
                <p>Based in Asheville, NC, Tyler works with home service pros across the country to build websites that actually book jobs.</p>
                
                <div class="founder-card__social">
                    <?php $linkedin = get_theme_mod('social_linkedin', ''); ?>
                    <?php if ($linkedin) : ?>
                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--secondary btn--sm">
                            <?php echo tbdesigned_icon('linkedin', 'icon'); ?>
                            Connect on LinkedIn
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php // Values Section ?>
<section class="section section--alt" aria-labelledby="values-heading">
    <div class="container">
        <h2 id="values-heading" class="section__title">What We Stand For</h2>
        
        <div class="grid grid--3">
            <div class="value-card">
                <div class="value-card__icon">🎯</div>
                <h3 class="value-card__title">Results Over Pretty</h3>
                <p class="value-card__description">A beautiful website means nothing if it doesn't help you book jobs. We optimize for conversions, not just looks.</p>
            </div>
            
            <div class="value-card">
                <div class="value-card__icon">⚡</div>
                <h3 class="value-card__title">Speed Matters</h3>
                <p class="value-card__description">You're busy running a business. We respect your time with fast turnarounds and responsive communication.</p>
            </div>
            
            <div class="value-card">
                <div class="value-card__icon">🤝</div>
                <h3 class="value-card__title">Partnership, Not Projects</h3>
                <p class="value-card__description">We're not just building you a website and disappearing. We're here for the long haul, helping you grow.</p>
            </div>
            
            <div class="value-card">
                <div class="value-card__icon">💬</div>
                <h3 class="value-card__title">Straight Talk</h3>
                <p class="value-card__description">No jargon. No upsells. No runaround. We tell you what you need and deliver what we promise.</p>
            </div>
            
            <div class="value-card">
                <div class="value-card__icon">🛠️</div>
                <h3 class="value-card__title">We Handle It</h3>
                <p class="value-card__description">Hosting, updates, security — we take care of the technical stuff so you don't have to think about it.</p>
            </div>
            
            <div class="value-card">
                <div class="value-card__icon">📈</div>
                <h3 class="value-card__title">Always Improving</h3>
                <p class="value-card__description">Your website isn't static. We continuously optimize based on what's working and what's not.</p>
            </div>
        </div>
    </div>
</section>

<?php // Why Home Services Section ?>
<section class="section" aria-labelledby="why-heading">
    <div class="container container--narrow">
        <h2 id="why-heading" class="section__title">Why We Focus on Home Services</h2>
        
        <div class="content-block">
            <p>We could build websites for anyone. But we choose to focus on home service businesses for a few reasons:</p>
            
            <div class="reasons-list">
                <div class="reason-item">
                    <h3>1. You're underserved</h3>
                    <p>Most web designers don't understand your industry. They don't know what your customers are looking for or how to convert them.</p>
                </div>
                
                <div class="reason-item">
                    <h3>2. You deserve better</h3>
                    <p>You work hard. You take care of people's homes. You should have a website that reflects the quality of your work.</p>
                </div>
                
                <div class="reason-item">
                    <h3>3. We can make a real difference</h3>
                    <p>A good website isn't a luxury for you — it's a growth tool. When we help you look more professional online, you book more jobs. That's real impact.</p>
                </div>
                
                <div class="reason-item">
                    <h3>4. We understand your customers</h3>
                    <p>Homeowners searching for services have specific needs. They want trust, speed, and clear information. We design for that.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php // Process Section ?>
<section class="section section--alt" aria-labelledby="process-heading">
    <div class="container">
        <h2 id="process-heading" class="section__title">How We Work</h2>
        
        <div class="process-steps process-steps--horizontal">
            <div class="process-step">
                <div class="process-step__number">1</div>
                <h3 class="process-step__title">Listen First</h3>
                <p class="process-step__description">Every project starts with understanding your business, your customers, and your goals.</p>
            </div>
            
            <div class="process-step">
                <div class="process-step__number">2</div>
                <h3 class="process-step__title">Build Smart</h3>
                <p class="process-step__description">We use proven designs and systems, customized for your specific needs. No reinventing the wheel.</p>
            </div>
            
            <div class="process-step">
                <div class="process-step__number">3</div>
                <h3 class="process-step__title">Launch Fast</h3>
                <p class="process-step__description">Two weeks from kickoff to launch. We move quickly without cutting corners.</p>
            </div>
            
            <div class="process-step">
                <div class="process-step__number">4</div>
                <h3 class="process-step__title">Support Always</h3>
                <p class="process-step__description">After launch, we're still here. Updates, changes, questions — we've got you covered.</p>
            </div>
        </div>
    </div>
</section>

<?php // CTA Section ?>
<section class="section" aria-labelledby="cta-about-heading">
    <div class="container container--narrow">
        <div class="cta-box">
            <h2 id="cta-about-heading">Let's Build Something Together</h2>
            <p>Ready to see what a professional website can do for your business? Book a free call and let's talk about your goals.</p>
            <div class="cta-box__actions">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--lg">
                    Book Your Free Call
                    <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
                </a>
            </div>
            <p class="cta-box__alt">Or email us: <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'hello@tbdesigned.io')); ?>"><?php echo esc_html(get_theme_mod('contact_email', 'hello@tbdesigned.io')); ?></a></p>
        </div>
    </div>
</section>

<?php
get_footer();
