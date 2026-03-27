<?php
/**
 * Single Post Template
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/BlogPosting">
    <?php // Hero/Header Section ?>
    <header class="post-header section section--dark">
        <div class="container container--narrow">
            <div class="post-header__content">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) :
                ?>
                    <div class="post-header__categories">
                        <?php foreach ($categories as $category) : ?>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="post-category">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <h1 class="post-header__title" itemprop="headline"><?php the_title(); ?></h1>
                
                <div class="post-meta">
                    <span class="post-meta__author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                        <?php esc_html_e('By', 'tbdesigned'); ?>
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" itemprop="url">
                            <span itemprop="name"><?php the_author(); ?></span>
                        </a>
                    </span>
                    
                    <span class="post-meta__date">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>" itemprop="datePublished">
                            <?php echo esc_html(get_the_date()); ?>
                        </time>
                    </span>
                    
                    <span class="post-meta__reading-time">
                        <?php
                        $content = get_the_content();
                        $word_count = str_word_count(strip_tags($content));
                        $reading_time = ceil($word_count / 200);
                        printf(
                            esc_html(_n('%d min read', '%d min read', $reading_time, 'tbdesigned')),
                            $reading_time
                        );
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </header>
    
    <?php // Featured Image ?>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-featured-image">
            <div class="container">
                <figure>
                    <?php the_post_thumbnail('tbdesigned-hero', array('itemprop' => 'image')); ?>
                    
                    <?php
                    $caption = get_the_post_thumbnail_caption();
                    if ($caption) :
                    ?>
                        <figcaption><?php echo esc_html($caption); ?></figcaption>
                    <?php endif; ?>
                </figure>
            </div>
        </div>
    <?php endif; ?>
    
    <?php // Post Content ?>
    <section class="section">
        <div class="container container--narrow">
            <div class="post-content" itemprop="articleBody">
                <?php the_content(); ?>
                
                <?php
                // Pagination for multi-page posts
                wp_link_pages(array(
                    'before'      => '<nav class="post-pages" aria-label="' . esc_attr__('Page navigation', 'tbdesigned') . '"><span class="post-pages__title">' . esc_html__('Pages:', 'tbdesigned') . '</span>',
                    'after'       => '</nav>',
                    'link_before' => '<span class="post-pages__link">',
                    'link_after'  => '</span>',
                ));
                ?>
            </div>
            
            <?php // Tags ?>
            <?php
            $tags = get_the_tags();
            if (!empty($tags)) :
            ?>
                <footer class="post-footer">
                    <div class="post-tags">
                        <span class="post-tags__label"><?php esc_html_e('Tags:', 'tbdesigned'); ?></span>
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="post-tag">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </footer>
            <?php endif; ?>
        </div>
    </section>
    
    <?php // Author Bio ?>
    <section class="section section--alt" aria-labelledby="author-heading">
        <div class="container container--narrow">
            <div class="author-box">
                <div class="author-box__avatar">
                    <?php echo get_avatar(get_the_author_meta('ID'), 96, '', get_the_author(), array('class' => 'author-avatar')); ?>
                </div>
                <div class="author-box__content">
                    <h2 id="author-heading" class="author-box__name">
                        <?php esc_html_e('Written by', 'tbdesigned'); ?>
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                            <?php the_author(); ?>
                        </a>
                    </h2>
                    <p class="author-box__bio"><?php echo esc_html(get_the_author_meta('description')); ?></p>
                </div>
            </div>
        </div>
    </section>
    
    <?php // Post Navigation ?>
    <section class="section">
        <div class="container container--narrow">
            <nav class="post-navigation" aria-label="<?php esc_attr_e('Post navigation', 'tbdesigned'); ?>">
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                ?>
                
                <?php if ($prev_post) : ?>
                    <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" class="post-nav-link post-nav-link--prev">
                        <span class="post-nav-link__label">
                            ← <?php esc_html_e('Previous Post', 'tbdesigned'); ?>
                        </span>
                        <span class="post-nav-link__title"><?php echo esc_html($prev_post->post_title); ?></span>
                    </a>
                <?php endif; ?>
                
                <?php if ($next_post) : ?>
                    <a href="<?php echo esc_url(get_permalink($next_post)); ?>" class="post-nav-link post-nav-link--next">
                        <span class="post-nav-link__label">
                            <?php esc_html_e('Next Post', 'tbdesigned'); ?> →
                        </span>
                        <span class="post-nav-link__title"><?php echo esc_html($next_post->post_title); ?></span>
                    </a>
                <?php endif; ?>
            </nav>
        </div>
    </section>
    
    <?php // Related Posts ?>
    <?php
    $related_args = array(
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post__not_in'   => array(get_the_ID()),
        'orderby'        => 'rand',
    );
    
    // Get posts from same category
    if (!empty($categories)) {
        $related_args['cat'] = $categories[0]->term_id;
    }
    
    $related_posts = new WP_Query($related_args);
    
    if ($related_posts->have_posts()) :
    ?>
        <section class="section section--alt" aria-labelledby="related-heading">
            <div class="container">
                <h2 id="related-heading" class="section__title"><?php esc_html_e('Related Posts', 'tbdesigned'); ?></h2>
                
                <div class="grid grid--3 posts-grid">
                    <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                        <article class="card">
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
                                <p class="card__text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    
    <?php // Comments ?>
    <?php if (comments_open() || get_comments_number()) : ?>
        <section class="section" aria-labelledby="comments-heading">
            <div class="container container--narrow">
                <?php comments_template(); ?>
            </div>
        </section>
    <?php endif; ?>
</article>

<?php // Schema.org Article Markup ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php the_permalink(); ?>"
    },
    "headline": "<?php echo esc_js(get_the_title()); ?>",
    "description": "<?php echo esc_js(get_the_excerpt()); ?>",
    <?php if (has_post_thumbnail()) : ?>
    "image": "<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>",
    <?php endif; ?>
    "author": {
        "@type": "Person",
        "name": "<?php echo esc_js(get_the_author()); ?>",
        "url": "<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
    },
    "publisher": {
        "@type": "Organization",
        "name": "<?php bloginfo('name'); ?>",
        "logo": {
            "@type": "ImageObject",
            "url": "<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>"
        }
    },
    "datePublished": "<?php echo esc_attr(get_the_date('c')); ?>",
    "dateModified": "<?php echo esc_attr(get_the_modified_date('c')); ?>"
}
</script>

<?php
get_footer();
