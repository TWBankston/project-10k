<?php
/**
 * Template part for displaying project cards
 *
 * @package TBDesigned
 */

$project = isset($project) ? $project : get_post();
?>

<article class="project-card">
    <?php if (has_post_thumbnail($project->ID)) : ?>
        <a href="<?php echo get_permalink($project->ID); ?>" class="project-card__image">
            <?php echo get_the_post_thumbnail($project->ID, 'tbdesigned-card'); ?>
        </a>
    <?php endif; ?>

    <div class="project-card__overlay">
        <h3 class="project-card__title">
            <a href="<?php echo get_permalink($project->ID); ?>">
                <?php echo get_the_title($project->ID); ?>
            </a>
        </h3>

        <?php
        $terms = get_the_terms($project->ID, 'project_category');
        if ($terms && !is_wp_error($terms)) :
        ?>
            <div class="project-card__category">
                <?php echo esc_html($terms[0]->name); ?>
            </div>
        <?php endif; ?>
    </div>
</article>
