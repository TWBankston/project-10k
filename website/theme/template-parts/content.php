<?php
/**
 * Template part for displaying posts
 *
 * @package TBDesigned
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="card__image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('tbdesigned-card'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="card__content">
        <h3 class="card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="card__meta">
            <span><?php echo get_the_date(); ?></span>
            <span><?php echo tbdesigned_reading_time() . ' min read'; ?></span>
        </div>

        <div class="card__text">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="btn btn--ghost">
            <?php esc_html_e('Read More', 'tbdesigned'); ?> →
        </a>
    </div>
</article>
