<?php
/**
 * Custom Post Types and Taxonomies
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Types
 */
function tbdesigned_register_post_types() {
    
    // Projects CPT
    $project_labels = array(
        'name'                  => _x('Projects', 'Post type general name', 'tbdesigned'),
        'singular_name'         => _x('Project', 'Post type singular name', 'tbdesigned'),
        'menu_name'             => _x('Projects', 'Admin Menu text', 'tbdesigned'),
        'name_admin_bar'        => _x('Project', 'Add New on Toolbar', 'tbdesigned'),
        'add_new'               => __('Add New', 'tbdesigned'),
        'add_new_item'          => __('Add New Project', 'tbdesigned'),
        'new_item'              => __('New Project', 'tbdesigned'),
        'edit_item'             => __('Edit Project', 'tbdesigned'),
        'view_item'             => __('View Project', 'tbdesigned'),
        'all_items'             => __('All Projects', 'tbdesigned'),
        'search_items'          => __('Search Projects', 'tbdesigned'),
        'parent_item_colon'     => __('Parent Projects:', 'tbdesigned'),
        'not_found'             => __('No projects found.', 'tbdesigned'),
        'not_found_in_trash'    => __('No projects found in Trash.', 'tbdesigned'),
        'featured_image'        => _x('Project Cover Image', 'Overrides the "Featured Image" phrase', 'tbdesigned'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase', 'tbdesigned'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase', 'tbdesigned'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase', 'tbdesigned'),
        'archives'              => _x('Project archives', 'The post type archive label', 'tbdesigned'),
        'insert_into_item'      => _x('Insert into project', 'Overrides the "Insert into post" phrase', 'tbdesigned'),
        'uploaded_to_this_item' => _x('Uploaded to this project', 'Overrides the "Uploaded to this post" phrase', 'tbdesigned'),
        'filter_items_list'     => _x('Filter projects list', 'Screen reader text', 'tbdesigned'),
        'items_list_navigation' => _x('Projects list navigation', 'Screen reader text', 'tbdesigned'),
        'items_list'            => _x('Projects list', 'Screen reader text', 'tbdesigned'),
    );

    $project_args = array(
        'labels'             => $project_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projects', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    );

    register_post_type('tbdesigned_project', $project_args);

    // Testimonials CPT
    $testimonial_labels = array(
        'name'                  => _x('Testimonials', 'Post type general name', 'tbdesigned'),
        'singular_name'         => _x('Testimonial', 'Post type singular name', 'tbdesigned'),
        'menu_name'             => _x('Testimonials', 'Admin Menu text', 'tbdesigned'),
        'name_admin_bar'        => _x('Testimonial', 'Add New on Toolbar', 'tbdesigned'),
        'add_new'               => __('Add New', 'tbdesigned'),
        'add_new_item'          => __('Add New Testimonial', 'tbdesigned'),
        'new_item'              => __('New Testimonial', 'tbdesigned'),
        'edit_item'             => __('Edit Testimonial', 'tbdesigned'),
        'view_item'             => __('View Testimonial', 'tbdesigned'),
        'all_items'             => __('All Testimonials', 'tbdesigned'),
        'search_items'          => __('Search Testimonials', 'tbdesigned'),
        'not_found'             => __('No testimonials found.', 'tbdesigned'),
        'not_found_in_trash'    => __('No testimonials found in Trash.', 'tbdesigned'),
    );

    $testimonial_args = array(
        'labels'             => $testimonial_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
    );

    register_post_type('tbdesigned_testimonial', $testimonial_args);

    // Client Projects CPT (for client portal)
    $client_project_labels = array(
        'name'                  => _x('Client Projects', 'Post type general name', 'tbdesigned'),
        'singular_name'         => _x('Client Project', 'Post type singular name', 'tbdesigned'),
        'menu_name'             => _x('Client Projects', 'Admin Menu text', 'tbdesigned'),
        'add_new'               => __('Add New', 'tbdesigned'),
        'add_new_item'          => __('Add New Client Project', 'tbdesigned'),
        'edit_item'             => __('Edit Client Project', 'tbdesigned'),
        'view_item'             => __('View Client Project', 'tbdesigned'),
        'all_items'             => __('All Client Projects', 'tbdesigned'),
        'search_items'          => __('Search Client Projects', 'tbdesigned'),
        'not_found'             => __('No client projects found.', 'tbdesigned'),
        'not_found_in_trash'    => __('No client projects found in Trash.', 'tbdesigned'),
    );

    $client_project_args = array(
        'labels'             => $client_project_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array('title', 'editor', 'custom-fields'),
    );

    register_post_type('tbdesigned_client_project', $client_project_args);
}
add_action('init', 'tbdesigned_register_post_types');

/**
 * Register Custom Taxonomies
 */
function tbdesigned_register_taxonomies() {
    
    // Project Categories
    $project_cat_labels = array(
        'name'              => _x('Project Categories', 'taxonomy general name', 'tbdesigned'),
        'singular_name'     => _x('Project Category', 'taxonomy singular name', 'tbdesigned'),
        'search_items'      => __('Search Categories', 'tbdesigned'),
        'all_items'         => __('All Categories', 'tbdesigned'),
        'parent_item'       => __('Parent Category', 'tbdesigned'),
        'parent_item_colon' => __('Parent Category:', 'tbdesigned'),
        'edit_item'         => __('Edit Category', 'tbdesigned'),
        'update_item'       => __('Update Category', 'tbdesigned'),
        'add_new_item'      => __('Add New Category', 'tbdesigned'),
        'new_item_name'     => __('New Category Name', 'tbdesigned'),
        'menu_name'         => __('Categories', 'tbdesigned'),
    );

    register_taxonomy('project_category', array('tbdesigned_project'), array(
        'hierarchical'      => true,
        'labels'            => $project_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category'),
    ));

    // Project Tags
    $project_tag_labels = array(
        'name'                       => _x('Project Tags', 'taxonomy general name', 'tbdesigned'),
        'singular_name'              => _x('Project Tag', 'taxonomy singular name', 'tbdesigned'),
        'search_items'               => __('Search Tags', 'tbdesigned'),
        'popular_items'              => __('Popular Tags', 'tbdesigned'),
        'all_items'                  => __('All Tags', 'tbdesigned'),
        'edit_item'                  => __('Edit Tag', 'tbdesigned'),
        'update_item'                => __('Update Tag', 'tbdesigned'),
        'add_new_item'               => __('Add New Tag', 'tbdesigned'),
        'new_item_name'              => __('New Tag Name', 'tbdesigned'),
        'separate_items_with_commas' => __('Separate tags with commas', 'tbdesigned'),
        'add_or_remove_items'        => __('Add or remove tags', 'tbdesigned'),
        'choose_from_most_used'      => __('Choose from the most used tags', 'tbdesigned'),
        'not_found'                  => __('No tags found.', 'tbdesigned'),
        'menu_name'                  => __('Tags', 'tbdesigned'),
    );

    register_taxonomy('project_tag', array('tbdesigned_project'), array(
        'hierarchical'          => false,
        'labels'                => $project_tag_labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array('slug' => 'project-tag'),
    ));
}
add_action('init', 'tbdesigned_register_taxonomies');

/**
 * Flush rewrite rules on theme activation
 */
function tbdesigned_rewrite_flush() {
    tbdesigned_register_post_types();
    tbdesigned_register_taxonomies();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'tbdesigned_rewrite_flush');

/**
 * Add custom columns to Projects admin list
 */
function tbdesigned_project_columns($columns) {
    $new_columns = array();
    
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        
        if ($key === 'title') {
            $new_columns['project_thumbnail'] = __('Image', 'tbdesigned');
        }
    }
    
    $new_columns['project_category'] = __('Category', 'tbdesigned');
    
    return $new_columns;
}
add_filter('manage_tbdesigned_project_posts_columns', 'tbdesigned_project_columns');

/**
 * Populate custom columns in Projects admin list
 */
function tbdesigned_project_custom_column($column, $post_id) {
    switch ($column) {
        case 'project_thumbnail':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(60, 60));
            } else {
                echo '—';
            }
            break;
            
        case 'project_category':
            $terms = get_the_terms($post_id, 'project_category');
            if ($terms && !is_wp_error($terms)) {
                $term_names = wp_list_pluck($terms, 'name');
                echo esc_html(implode(', ', $term_names));
            } else {
                echo '—';
            }
            break;
    }
}
add_action('manage_tbdesigned_project_posts_custom_column', 'tbdesigned_project_custom_column', 10, 2);

/**
 * Add custom columns to Client Projects admin list
 */
function tbdesigned_client_project_columns($columns) {
    $new_columns = array();
    
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        
        if ($key === 'title') {
            $new_columns['client'] = __('Client', 'tbdesigned');
            $new_columns['status'] = __('Status', 'tbdesigned');
        }
    }
    
    return $new_columns;
}
add_filter('manage_tbdesigned_client_project_posts_columns', 'tbdesigned_client_project_columns');

/**
 * Populate custom columns in Client Projects admin list
 */
function tbdesigned_client_project_custom_column($column, $post_id) {
    switch ($column) {
        case 'client':
            $client_id = get_post_meta($post_id, '_client_user_id', true);
            if ($client_id) {
                $user = get_user_by('id', $client_id);
                if ($user) {
                    echo esc_html($user->display_name);
                } else {
                    echo '—';
                }
            } else {
                echo '—';
            }
            break;
            
        case 'status':
            $status = get_post_meta($post_id, '_project_status', true);
            $statuses = array(
                'pending'     => __('Pending', 'tbdesigned'),
                'in-progress' => __('In Progress', 'tbdesigned'),
                'review'      => __('Under Review', 'tbdesigned'),
                'completed'   => __('Completed', 'tbdesigned'),
            );
            echo isset($statuses[$status]) ? esc_html($statuses[$status]) : '—';
            break;
    }
}
add_action('manage_tbdesigned_client_project_posts_custom_column', 'tbdesigned_client_project_custom_column', 10, 2);

/**
 * Get project statuses
 */
function tbdesigned_get_project_statuses() {
    return array(
        'pending'     => __('Pending', 'tbdesigned'),
        'in-progress' => __('In Progress', 'tbdesigned'),
        'review'      => __('Under Review', 'tbdesigned'),
        'completed'   => __('Completed', 'tbdesigned'),
    );
}

/**
 * Get projects for a specific client
 */
function tbdesigned_get_client_projects($user_id) {
    return get_posts(array(
        'post_type'      => 'tbdesigned_client_project',
        'posts_per_page' => -1,
        'meta_query'     => array(
            array(
                'key'   => '_client_user_id',
                'value' => $user_id,
            ),
        ),
        'orderby'        => 'modified',
        'order'          => 'DESC',
    ));
}

/**
 * Get testimonials
 */
function tbdesigned_get_testimonials($count = 3) {
    return get_posts(array(
        'post_type'      => 'tbdesigned_testimonial',
        'posts_per_page' => $count,
        'orderby'        => 'rand',
    ));
}

/**
 * Get portfolio projects
 */
function tbdesigned_get_portfolio_projects($args = array()) {
    $defaults = array(
        'post_type'      => 'tbdesigned_project',
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $args = wp_parse_args($args, $defaults);
    
    return get_posts($args);
}
