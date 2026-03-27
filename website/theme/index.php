<?php
/**
 * The main template file
 *
 * @package TBDesigned
 * @since 1.0.0
 */

get_header();
?>

<div class="container">
    <div class="section">
        <?php if (have_posts()) : ?>

            <header class="page-header">
                <?php if (is_home() && !is_front_page()) : ?>
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                <?php elseif (is_archive()) : ?>
                    <h1 class="page-title"><?php the_archive_title(); ?></h1>
                    <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
                <?php elseif (is_search()) : ?>
                    <h1 class="page-title">
                        <?php
                        printf(
                            /* translators: %s: search query */
                            esc_html__('Search Results for: %s', 'tbdesigned'),
                            '<span>' . get_search_query() . '</span>'
                        );
                        ?>
                    </h1>
                <?php endif; ?>
            </header>

            <div class="grid grid--3">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('&larr; Previous', 'tbdesigned'),
                'next_text' => __('Next &rarr;', 'tbdesigned'),
            ));
            ?>

        <?php else : ?>

            <?php get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
