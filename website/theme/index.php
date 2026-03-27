<?php
/**
 * Main Template File
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme.
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<section class="section" aria-labelledby="posts-heading">
    <div class="container">
        <?php if (is_home() && !is_front_page()) : ?>
            <header class="page-header">
                <h1 id="posts-heading" class="page-header__title"><?php single_post_title(); ?></h1>
            </header>
        <?php else : ?>
            <h1 id="posts-heading" class="screen-reader-text"><?php esc_html_e('Latest Posts', 'tbdesigned'); ?></h1>
        <?php endif; ?>
        
        <?php if (have_posts()) : ?>
            <div class="grid grid--3 posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> itemscope itemtype="https://schema.org/BlogPosting">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="card__image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('tbdesigned-card', array('itemprop' => 'image')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card__content">
                            <header class="card__header">
                                <div class="card__meta">
                                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" itemprop="datePublished">
                                        <?php echo esc_html(get_the_date()); ?>
                                    </time>
                                    
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) :
                                    ?>
                                        <span class="card__category">
                                            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                                                <?php echo esc_html($categories[0]->name); ?>
                                            </a>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
                                <h2 class="card__title" itemprop="headline">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                            </header>
                            
                            <div class="card__text" itemprop="description">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <footer class="card__footer">
                                <a href="<?php the_permalink(); ?>" class="btn btn--ghost btn--sm">
                                    <?php esc_html_e('Read More', 'tbdesigned'); ?>
                                    <?php echo tbdesigned_icon('arrow-right', 'icon'); ?>
                                </a>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php // Pagination ?>
            <nav class="pagination" aria-label="<?php esc_attr_e('Posts navigation', 'tbdesigned'); ?>">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '← ' . __('Newer', 'tbdesigned'),
                    'next_text' => __('Older', 'tbdesigned') . ' →',
                ));
                ?>
            </nav>
            
        <?php else : ?>
            <div class="no-content">
                <h2><?php esc_html_e('No Posts Found', 'tbdesigned'); ?></h2>
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'tbdesigned'); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
