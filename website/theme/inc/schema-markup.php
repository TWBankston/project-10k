<?php
/**
 * Schema Markup / Structured Data
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Output organization schema on homepage
 */
function tbdesigned_organization_schema() {
    if (!is_front_page()) {
        return;
    }

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Organization',
        'name'        => get_bloginfo('name'),
        'url'         => home_url(),
        'logo'        => has_custom_logo() ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : '',
        'description' => get_bloginfo('description'),
        'address'     => array(
            '@type'           => 'PostalAddress',
            'addressLocality' => get_theme_mod('contact_address', 'Asheville, NC'),
        ),
        'contactPoint' => array(
            '@type'       => 'ContactPoint',
            'contactType' => 'customer service',
            'email'       => get_theme_mod('contact_email', 'hello@tbdesigned.io'),
        ),
    );

    // Add social profiles
    $social_links = array_filter(tbdesigned_get_social_links());
    if (!empty($social_links)) {
        $schema['sameAs'] = array_values($social_links);
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'tbdesigned_organization_schema');

/**
 * Output LocalBusiness schema
 */
function tbdesigned_local_business_schema() {
    if (!is_front_page()) {
        return;
    }

    $schema = array(
        '@context'         => 'https://schema.org',
        '@type'            => 'ProfessionalService',
        'name'             => get_bloginfo('name'),
        'url'              => home_url(),
        'logo'             => has_custom_logo() ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : '',
        'description'      => get_bloginfo('description'),
        'priceRange'       => '$$',
        'telephone'        => get_theme_mod('contact_phone', ''),
        'email'            => get_theme_mod('contact_email', 'hello@tbdesigned.io'),
        'address'          => array(
            '@type'           => 'PostalAddress',
            'addressLocality' => 'Asheville',
            'addressRegion'   => 'NC',
            'addressCountry'  => 'US',
        ),
        'geo' => array(
            '@type'     => 'GeoCoordinates',
            'latitude'  => '35.5951',
            'longitude' => '-82.5515',
        ),
        'areaServed' => array(
            array(
                '@type' => 'City',
                'name'  => 'Asheville',
            ),
            array(
                '@type' => 'State',
                'name'  => 'North Carolina',
            ),
            array(
                '@type' => 'Country',
                'name'  => 'United States',
            ),
        ),
        'hasOfferCatalog' => array(
            '@type'            => 'OfferCatalog',
            'name'             => 'Services',
            'itemListElement'  => array(
                array(
                    '@type' => 'Offer',
                    'itemOffered' => array(
                        '@type' => 'Service',
                        'name'  => 'Web Development',
                    ),
                ),
                array(
                    '@type' => 'Offer',
                    'itemOffered' => array(
                        '@type' => 'Service',
                        'name'  => 'Web Design',
                    ),
                ),
                array(
                    '@type' => 'Offer',
                    'itemOffered' => array(
                        '@type' => 'Service',
                        'name'  => 'Digital Marketing',
                    ),
                ),
            ),
        ),
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'tbdesigned_local_business_schema');

/**
 * Output article schema for blog posts
 */
function tbdesigned_article_schema() {
    if (!is_single() || get_post_type() !== 'post') {
        return;
    }

    global $post;

    $schema = array(
        '@context'      => 'https://schema.org',
        '@type'         => 'BlogPosting',
        'headline'      => get_the_title(),
        'description'   => get_the_excerpt(),
        'datePublished' => get_the_date('c'),
        'dateModified'  => get_the_modified_date('c'),
        'author'        => array(
            '@type' => 'Person',
            'name'  => get_the_author(),
            'url'   => get_author_posts_url(get_the_author_meta('ID')),
        ),
        'publisher' => array(
            '@type' => 'Organization',
            'name'  => get_bloginfo('name'),
            'logo'  => array(
                '@type' => 'ImageObject',
                'url'   => has_custom_logo() ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : '',
            ),
        ),
        'mainEntityOfPage' => array(
            '@type' => 'WebPage',
            '@id'   => get_permalink(),
        ),
    );

    // Add featured image
    if (has_post_thumbnail()) {
        $image_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src($image_id, 'full');
        
        $schema['image'] = array(
            '@type'  => 'ImageObject',
            'url'    => $image[0],
            'width'  => $image[1],
            'height' => $image[2],
        );
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'tbdesigned_article_schema');

/**
 * Output breadcrumb schema
 */
function tbdesigned_breadcrumb_schema() {
    if (is_front_page()) {
        return;
    }

    $items = array();
    $position = 1;

    // Home
    $items[] = array(
        '@type'    => 'ListItem',
        'position' => $position++,
        'name'     => __('Home', 'tbdesigned'),
        'item'     => home_url(),
    );

    // Archive
    if (is_archive()) {
        $items[] = array(
            '@type'    => 'ListItem',
            'position' => $position++,
            'name'     => get_the_archive_title(),
            'item'     => get_post_type_archive_link(get_post_type()),
        );
    }

    // Single post/page
    if (is_single() || is_page()) {
        // Add post type archive if not a page
        if (!is_page() && get_post_type() !== 'post') {
            $post_type_object = get_post_type_object(get_post_type());
            if ($post_type_object->has_archive) {
                $items[] = array(
                    '@type'    => 'ListItem',
                    'position' => $position++,
                    'name'     => $post_type_object->labels->name,
                    'item'     => get_post_type_archive_link(get_post_type()),
                );
            }
        }

        // Current page
        $items[] = array(
            '@type'    => 'ListItem',
            'position' => $position++,
            'name'     => get_the_title(),
            'item'     => get_permalink(),
        );
    }

    if (empty($items)) {
        return;
    }

    $schema = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $items,
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'tbdesigned_breadcrumb_schema');

/**
 * Output website search schema
 */
function tbdesigned_website_search_schema() {
    if (!is_front_page()) {
        return;
    }

    $schema = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'WebSite',
        'url'             => home_url(),
        'potentialAction' => array(
            '@type'       => 'SearchAction',
            'target'      => array(
                '@type'       => 'EntryPoint',
                'urlTemplate' => home_url('/?s={search_term_string}'),
            ),
            'query-input' => 'required name=search_term_string',
        ),
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'tbdesigned_website_search_schema');

/**
 * Output FAQ schema (for FAQ pages)
 */
function tbdesigned_faq_schema() {
    // Only output on specific pages with FAQ content
    if (!is_page(array('faq', 'faqs', 'frequently-asked-questions'))) {
        return;
    }

    // Example FAQs - would typically come from custom fields or post content
    $faqs = array(
        array(
            'question' => 'How long does a typical web project take?',
            'answer'   => 'Most projects take 4-8 weeks from start to launch, depending on complexity and scope.',
        ),
        array(
            'question' => 'Do you offer maintenance plans?',
            'answer'   => 'Yes, we offer monthly maintenance plans that include updates, backups, security monitoring, and support.',
        ),
        array(
            'question' => 'What platforms do you work with?',
            'answer'   => 'We specialize in WordPress, Shopify, and custom web applications. We choose the best platform for your specific needs.',
        ),
    );

    $questions = array();
    foreach ($faqs as $faq) {
        $questions[] = array(
            '@type'          => 'Question',
            'name'           => $faq['question'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text'  => $faq['answer'],
            ),
        );
    }

    $schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $questions,
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
add_action('wp_head', 'tbdesigned_faq_schema');

/**
 * Output review/rating schema
 */
function tbdesigned_aggregate_rating_schema() {
    if (!is_front_page()) {
        return;
    }

    // Example - would typically come from actual reviews
    $schema = array(
        '@context'        => 'https://schema.org',
        '@type'           => 'Organization',
        'name'            => get_bloginfo('name'),
        'aggregateRating' => array(
            '@type'       => 'AggregateRating',
            'ratingValue' => '4.9',
            'reviewCount' => '47',
            'bestRating'  => '5',
            'worstRating' => '1',
        ),
    );

    // Only output if we have real reviews
    // Uncomment when you have actual review data
    // echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}
// add_action('wp_head', 'tbdesigned_aggregate_rating_schema');
