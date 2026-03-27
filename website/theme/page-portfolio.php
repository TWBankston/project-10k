<?php
/**
 * Template Name: Portfolio
 * 
 * Portfolio page template - displays Projects CPT
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Get filter from URL
$current_filter = isset($_GET['industry']) ? sanitize_text_field($_GET['industry']) : '';

// Get all industries for filter
$industries = get_terms(array(
    'taxonomy'   => 'project_industry',
    'hide_empty' => true,
));
?>

<?php // Hero Section ?>
<?php
get_template_part('template-parts/hero', null, array(
    'badge'              => 'Portfolio',
    'title'              => 'Websites That Book Jobs',
    'subtitle'           => 'Real examples of sites we\'ve built for home service professionals like you.',
    'cta_primary_text'   => 'Start Your Project',
    'cta_primary_url'    => home_url('/contact/'),
    'cta_secondary_text' => '',
    'size'               => 'small',
    'style'              => 'dark',
));
?>

<?php // Filter Bar ?>
<?php if (!empty($industries) && !is_wp_error($industries)) : ?>
<section class="portfolio-filter" aria-label="<?php esc_attr_e('Filter projects by industry', 'tbdesigned'); ?>">
    <div class="container">
        <div class="filter-bar">
            <a href="<?php echo esc_url(get_permalink()); ?>" class="filter-btn <?php echo empty($current_filter) ? 'filter-btn--active' : ''; ?>">
                <?php esc_html_e('All', 'tbdesigned'); ?>
            </a>
            
            <?php foreach ($industries as $industry) : ?>
                <a href="<?php echo esc_url(add_query_arg('industry', $industry->slug, get_permalink())); ?>" 
                   class="filter-btn <?php echo ($current_filter === $industry->slug) ? 'filter-btn--active' : ''; ?>">
                    <?php echo esc_html($industry->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php // Portfolio Grid ?>
<section class="section" aria-labelledby="portfolio-heading">
    <div class="container">
        <h2 id="portfolio-heading" class="screen-reader-text"><?php esc_html_e('Our Projects', 'tbdesigned'); ?></h2>
        
        <?php
        // Query projects
        $args = array(
            'post_type'      => 'project',
            'posts_per_page' => 12,
            'orderby'        => 'menu_order date',
            'order'          => 'ASC',
        );
        
        // Add taxonomy filter if set
        if (!empty($current_filter)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'project_industry',
                    'field'    => 'slug',
                    'terms'    => $current_filter,
                ),
            );
        }
        
        $projects = new WP_Query($args);
        
        if ($projects->have_posts()) :
        ?>
            <div class="grid grid--3 portfolio-grid">
                <?php while ($projects->have_posts()) : $projects->the_post(); ?>
                    <?php
                    // Get project meta
                    $client_name = get_post_meta(get_the_ID(), '_project_client_name', true);
                    $project_url = get_post_meta(get_the_ID(), '_project_url', true);
                    $package_type = get_post_meta(get_the_ID(), '_project_package', true);
                    
                    // Get industry terms
                    $project_industries = get_the_terms(get_the_ID(), 'project_industry');
                    $industry_name = $project_industries ? $project_industries[0]->name : '';
                    ?>
                    
                    <article class="project-card" itemscope itemtype="https://schema.org/CreativeWork">
                        <a href="<?php the_permalink(); ?>" class="project-card__link">
                            <div class="project-card__image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('tbdesigned-card', array('itemprop' => 'image')); ?>
                                <?php else : ?>
                                    <div class="project-card__placeholder" aria-hidden="true">
                                        <span><?php echo esc_html(substr(get_the_title(), 0, 2)); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="project-card__overlay">
                                <h3 class="project-card__title" itemprop="name"><?php the_title(); ?></h3>
                                
                                <?php if ($industry_name) : ?>
                                    <span class="project-card__category"><?php echo esc_html($industry_name); ?></span>
                                <?php endif; ?>
                                
                                <?php if ($package_type) : ?>
                                    <span class="project-card__package"><?php echo esc_html(ucfirst($package_type)); ?> Package</span>
                                <?php endif; ?>
                            </div>
                        </a>
                        
                        <?php if ($project_url) : ?>
                            <a href="<?php echo esc_url($project_url); ?>" class="project-card__external" target="_blank" rel="noopener noreferrer" aria-label="<?php printf(esc_attr__('Visit %s website (opens in new tab)', 'tbdesigned'), get_the_title()); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php // Pagination ?>
            <?php if ($projects->max_num_pages > 1) : ?>
                <nav class="pagination" aria-label="<?php esc_attr_e('Portfolio pagination', 'tbdesigned'); ?>">
                    <?php
                    echo paginate_links(array(
                        'total'     => $projects->max_num_pages,
                        'current'   => max(1, get_query_var('paged')),
                        'prev_text' => '← ' . __('Previous', 'tbdesigned'),
                        'next_text' => __('Next', 'tbdesigned') . ' →',
                    ));
                    ?>
                </nav>
            <?php endif; ?>
            
        <?php else : ?>
            <?php // No projects found ?>
            <div class="no-projects">
                <div class="no-projects__content">
                    <h3><?php esc_html_e('Coming Soon', 'tbdesigned'); ?></h3>
                    <p><?php esc_html_e('We\'re currently building our portfolio. Check back soon to see examples of our work, or book a call to discuss your project.', 'tbdesigned'); ?></p>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary">
                        <?php esc_html_e('Book a Call', 'tbdesigned'); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<?php // Results Section ?>
<section class="section section--alt" aria-labelledby="results-heading">
    <div class="container">
        <h2 id="results-heading" class="section__title">Results That Matter</h2>
        
        <div class="stats-grid grid grid--4">
            <div class="stat-card">
                <span class="stat-card__number">25+</span>
                <span class="stat-card__label">Websites Launched</span>
            </div>
            
            <div class="stat-card">
                <span class="stat-card__number">150%</span>
                <span class="stat-card__label">Average Traffic Increase</span>
            </div>
            
            <div class="stat-card">
                <span class="stat-card__number">< 2s</span>
                <span class="stat-card__label">Average Page Load</span>
            </div>
            
            <div class="stat-card">
                <span class="stat-card__number">100%</span>
                <span class="stat-card__label">Mobile Responsive</span>
            </div>
        </div>
    </div>
</section>

<?php // Testimonials Section ?>
<section class="section" aria-labelledby="testimonials-heading">
    <div class="container">
        <h2 id="testimonials-heading" class="section__title">What Our Clients Say</h2>
        
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

<?php // Industries Section ?>
<section class="section section--alt" aria-labelledby="industries-heading">
    <div class="container">
        <h2 id="industries-heading" class="section__title">Specialized in Home Services</h2>
        
        <div class="industries-list">
            <span class="industry-tag">🌿 Landscaping & Lawn Care</span>
            <span class="industry-tag">🧹 Cleaning Services</span>
            <span class="industry-tag">🐜 Pest Control</span>
            <span class="industry-tag">💦 Pressure Washing</span>
            <span class="industry-tag">🏊 Pool Service</span>
            <span class="industry-tag">❄️ HVAC</span>
            <span class="industry-tag">🔧 Handyman Services</span>
            <span class="industry-tag">🪟 Window Cleaning</span>
            <span class="industry-tag">🏠 Junk Removal</span>
            <span class="industry-tag">🎨 Painting</span>
        </div>
        
        <p class="industries-note">
            Don't see your industry? We work with all home service businesses. 
            <a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact us →</a>
        </p>
    </div>
</section>

<?php // CTA Section ?>
<section class="section" aria-labelledby="cta-portfolio-heading">
    <div class="container container--narrow">
        <div class="cta-box">
            <h2 id="cta-portfolio-heading">Ready for a Website Like These?</h2>
            <p>Book a free 15-minute call. We'll show you exactly how we'd approach your project.</p>
            <div class="cta-box__actions">
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn--primary btn--lg">
                    Book Your Free Call
                    <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
                </a>
            </div>
            <?php $phone = get_theme_mod('contact_phone', '(828) 555-XXXX'); ?>
            <?php if ($phone) : ?>
                <p class="cta-box__alt">Or call us: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
