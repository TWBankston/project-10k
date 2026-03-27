<?php
/**
 * Single Post Template
 *
 * @package TBDesigned
 * @since 1.0.0
 */

get_header();
?>

<div class="container">
    <div class="section">
        <?php
        while (have_posts()) :
            the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="post-header">
                <h1 class="post-title"><?php the_title(); ?></h1>

                <div class="post-meta">
                    <span class="post-date">
                        <?php echo get_the_date(); ?>
                    </span>
                    <span class="post-author">
                        <?php
                        printf(
                            esc_html__('By %s', 'tbdesigned'),
                            '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
                        );
                        ?>
                    </span>
                    <span class="post-reading-time">
                        <?php
                        printf(
                            esc_html__('%s min read', 'tbdesigned'),
                            tbdesigned_reading_time()
                        );
                        ?>
                    </span>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
            </header>

            <div class="post-content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'tbdesigned'),
                    'after'  => '</div>',
                ));
                ?>
            </div>

            <footer class="post-footer">
                <?php
                $tags = get_the_tags();
                if ($tags) :
                ?>
                    <div class="post-tags">
                        <strong><?php esc_html_e('Tags:', 'tbdesigned'); ?></strong>
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php
                // Post navigation
                the_post_navigation(array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'tbdesigned') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'tbdesigned') . '</span> <span class="nav-title">%title</span>',
                ));
                ?>
            </footer>
        </article>

        <?php
        // Comments
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

        endwhile;
        ?>
    </div>
</div>

<?php
get_footer();
