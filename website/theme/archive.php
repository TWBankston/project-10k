<?php
/**
 * Archive Template
 *
 * Used for author, category, tag, and date archives.
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<?php // Archive Header ?>
<header class="archive-header section section--dark" aria-labelledby="archive-title">
    <div class="container">
        <?php
        // Eyebrow text based on archive type
        $eyebrow = '';
        if (is_category()) {
            $eyebrow = __('Category', 'tbdesigned');
        } elseif (is_tag()) {
            $eyebrow = __('Tag', 'tbdesigned');
        } elseif (is_author()) {
            $eyebrow = __('Author', 'tbdesigned');
        } elseif (is_date()) {
            if (is_year()) {
                $eyebrow = __('Year', 'tbdesigned');
            } elseif (is_month()) {
                $eyebrow = __('Month', 'tbdesigned');
            } elseif (is_day()) {
                $eyebrow = __('Day', 'tbdesigned');
            }
        } elseif (is_post_type_archive()) {
            $eyebrow = post_type_archive_title('', false);
        }
        ?>
        
        <?php if ($eyebrow) : ?>
            <span class="archive-header__eyebrow"><?php echo esc_html($eyebrow); ?></span>
        <?php endif; ?>
        
        <h1 id="archive-title" class="archive-header__title">
            <?php
            if (is_category()) {
                single_cat_title();
            } elseif (is_tag()) {
                single_tag_title();
            } elseif (is_author()) {
                the_post();
                echo esc_html(get_the_author());
                rewind_posts();
            } elseif (is_date()) {
                if (is_year()) {
                    echo esc_html(get_the_date('Y'));
                } elseif (is_month()) {
                    echo esc_html(get_the_date('F Y'));
                } elseif (is_day()) {
                    echo esc_html(get_the_date());
                }
            } elseif (is_post_type_archive()) {
                post_type_archive_title();
            } else {
                esc_html_e('Archives', 'tbdesigned');
            }
            ?>
        </h1>
        
        <?php
        // Archive description
        $description = '';
        if (is_category() || is_tag()) {
            $description = term_description();
        } elseif (is_author()) {
            $description = get_the_author_meta('description');
        }
        
        if (!empty($description)) :
        ?>
            <div class="archive-header__description">
                <?php echo wp_kses_post($description); ?>
            </div>
        <?php endif; ?>
        
        <?php // Post count ?>
        <p class="archive-header__count">
            <?php
            global $wp_query;
            printf(
                esc_html(_n('%d post', '%d posts', $wp_query->found_posts, 'tbdesigned')),
                $wp_query->found_posts
            );
            ?>
        </p>
    </div>
</header>

<?php // Archive Content ?>
<section class="section" aria-label="<?php esc_attr_e('Archive posts', 'tbdesigned'); ?>">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="grid grid--3 posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="card__image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('tbdesigned-card'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card__content">
                            <header class="card__header">
                                <div class="card__meta">
                                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                        <?php echo esc_html(get_the_date()); ?>
                                    </time>
                                </div>
                                
                                <h2 class="card__title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                            </header>
                            
                            <div class="card__text">
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
                <p><?php esc_html_e('It looks like nothing was found in this archive. Try browsing our other content.', 'tbdesigned'); ?></p>
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn--primary">
                    <?php esc_html_e('View All Posts', 'tbdesigned'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
