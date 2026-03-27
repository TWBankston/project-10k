<?php
/**
 * ACF Field Groups Configuration
 * 
 * Requires Advanced Custom Fields (free or Pro)
 * These are programmatic field group definitions
 * Can also be exported as JSON to /acf-json/ folder
 *
 * @package TBDesigned
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('acf_add_local_field_group')) {
    return;
}

/**
 * Project Details Field Group
 */
acf_add_local_field_group(array(
    'key' => 'group_project_details',
    'title' => 'Project Details',
    'fields' => array(
        array(
            'key' => 'field_project_client',
            'label' => 'Client Name',
            'name' => 'project_client',
            'type' => 'text',
            'instructions' => 'Name of the client or company',
            'required' => 0,
        ),
        array(
            'key' => 'field_project_url',
            'label' => 'Project URL',
            'name' => 'project_url',
            'type' => 'url',
            'instructions' => 'Live website URL',
            'required' => 0,
        ),
        array(
            'key' => 'field_project_date',
            'label' => 'Completion Date',
            'name' => 'project_date',
            'type' => 'date_picker',
            'display_format' => 'F Y',
            'return_format' => 'Y-m-d',
            'required' => 0,
        ),
        array(
            'key' => 'field_project_services',
            'label' => 'Services Provided',
            'name' => 'project_services',
            'type' => 'checkbox',
            'choices' => array(
                'web-design' => 'Web Design',
                'web-development' => 'Web Development',
                'branding' => 'Branding',
                'seo' => 'SEO',
                'content-writing' => 'Content Writing',
                'maintenance' => 'Maintenance',
                'ecommerce' => 'E-Commerce',
                'custom-development' => 'Custom Development',
            ),
            'layout' => 'vertical',
        ),
        array(
            'key' => 'field_project_technologies',
            'label' => 'Technologies Used',
            'name' => 'project_technologies',
            'type' => 'text',
            'instructions' => 'Comma-separated list (e.g., WordPress, React, Node.js)',
            'required' => 0,
        ),
        array(
            'key' => 'field_project_featured',
            'label' => 'Featured Project',
            'name' => 'project_featured',
            'type' => 'true_false',
            'instructions' => 'Display prominently on portfolio page',
            'default_value' => 0,
            'ui' => 1,
        ),
        array(
            'key' => 'field_project_gallery',
            'label' => 'Project Gallery',
            'name' => 'project_gallery',
            'type' => 'gallery',
            'instructions' => 'Additional project images',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'tbdesigned_project',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
));

/**
 * Testimonial Details Field Group
 */
acf_add_local_field_group(array(
    'key' => 'group_testimonial_details',
    'title' => 'Testimonial Details',
    'fields' => array(
        array(
            'key' => 'field_testimonial_author',
            'label' => 'Author Name',
            'name' => 'testimonial_author',
            'type' => 'text',
            'instructions' => 'Full name of person giving testimonial',
            'required' => 1,
        ),
        array(
            'key' => 'field_testimonial_role',
            'label' => 'Author Role',
            'name' => 'testimonial_role',
            'type' => 'text',
            'instructions' => 'Job title or role',
            'required' => 0,
        ),
        array(
            'key' => 'field_testimonial_company',
            'label' => 'Company',
            'name' => 'testimonial_company',
            'type' => 'text',
            'instructions' => 'Company or organization name',
            'required' => 0,
        ),
        array(
            'key' => 'field_testimonial_rating',
            'label' => 'Rating',
            'name' => 'testimonial_rating',
            'type' => 'number',
            'instructions' => 'Star rating (1-5)',
            'min' => 1,
            'max' => 5,
            'step' => 1,
            'default_value' => 5,
            'required' => 0,
        ),
        array(
            'key' => 'field_testimonial_project',
            'label' => 'Related Project',
            'name' => 'testimonial_project',
            'type' => 'post_object',
            'instructions' => 'Link to the project this testimonial is about',
            'post_type' => array('tbdesigned_project'),
            'allow_null' => 1,
            'required' => 0,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'tbdesigned_testimonial',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
));

/**
 * Homepage Hero Field Group
 */
acf_add_local_field_group(array(
    'key' => 'group_homepage_hero',
    'title' => 'Homepage Hero Section',
    'fields' => array(
        array(
            'key' => 'field_hero_badge',
            'label' => 'Hero Badge Text',
            'name' => 'hero_badge',
            'type' => 'text',
            'instructions' => 'Small text above main headline',
            'default_value' => 'Creative Web Solutions',
            'required' => 0,
        ),
        array(
            'key' => 'field_hero_title',
            'label' => 'Hero Title',
            'name' => 'hero_title',
            'type' => 'text',
            'instructions' => 'Main headline',
            'default_value' => 'Build Your Digital Presence',
            'required' => 0,
        ),
        array(
            'key' => 'field_hero_subtitle',
            'label' => 'Hero Subtitle',
            'name' => 'hero_subtitle',
            'type' => 'textarea',
            'instructions' => 'Supporting text below headline',
            'rows' => 3,
            'required' => 0,
        ),
        array(
            'key' => 'field_hero_cta_primary',
            'label' => 'Primary CTA Button',
            'name' => 'hero_cta_primary',
            'type' => 'link',
            'instructions' => 'Main call-to-action button',
            'return_format' => 'array',
            'required' => 0,
        ),
        array(
            'key' => 'field_hero_cta_secondary',
            'label' => 'Secondary CTA Button',
            'name' => 'hero_cta_secondary',
            'type' => 'link',
            'instructions' => 'Optional second button',
            'return_format' => 'array',
            'required' => 0,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
));

/**
 * Service Details Field Group
 */
acf_add_local_field_group(array(
    'key' => 'group_service_details',
    'title' => 'Service Details',
    'fields' => array(
        array(
            'key' => 'field_service_icon',
            'label' => 'Service Icon',
            'name' => 'service_icon',
            'type' => 'select',
            'instructions' => 'Choose an icon for this service',
            'choices' => array(
                'code' => 'Code',
                'design' => 'Design',
                'rocket' => 'Rocket',
                'chart' => 'Chart',
                'shield' => 'Shield',
                'tool' => 'Tool',
            ),
            'default_value' => 'code',
            'required' => 0,
        ),
        array(
            'key' => 'field_service_features',
            'label' => 'Service Features',
            'name' => 'service_features',
            'type' => 'repeater',
            'instructions' => 'List of features included in this service',
            'layout' => 'table',
            'button_label' => 'Add Feature',
            'sub_fields' => array(
                array(
                    'key' => 'field_feature_text',
                    'label' => 'Feature',
                    'name' => 'feature_text',
                    'type' => 'text',
                    'required' => 1,
                ),
            ),
        ),
        array(
            'key' => 'field_service_price',
            'label' => 'Starting Price',
            'name' => 'service_price',
            'type' => 'text',
            'instructions' => 'e.g., $2,500',
            'required' => 0,
        ),
        array(
            'key' => 'field_service_cta_text',
            'label' => 'CTA Button Text',
            'name' => 'service_cta_text',
            'type' => 'text',
            'default_value' => 'Get Started',
            'required' => 0,
        ),
        array(
            'key' => 'field_service_cta_url',
            'label' => 'CTA Button URL',
            'name' => 'service_cta_url',
            'type' => 'url',
            'default_value' => '/contact/',
            'required' => 0,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-services.php',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
));

/**
 * Client Portal Field Group
 */
acf_add_local_field_group(array(
    'key' => 'group_client_project_details',
    'title' => 'Client Project Information',
    'fields' => array(
        array(
            'key' => 'field_client_project_notes',
            'label' => 'Internal Notes',
            'name' => 'client_project_notes',
            'type' => 'textarea',
            'instructions' => 'Private notes (visible only to admins)',
            'rows' => 4,
            'required' => 0,
        ),
        array(
            'key' => 'field_client_project_deliverables',
            'label' => 'Deliverables',
            'name' => 'client_project_deliverables',
            'type' => 'repeater',
            'instructions' => 'List of project deliverables',
            'layout' => 'table',
            'button_label' => 'Add Deliverable',
            'sub_fields' => array(
                array(
                    'key' => 'field_deliverable_name',
                    'label' => 'Deliverable',
                    'name' => 'deliverable_name',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_deliverable_status',
                    'label' => 'Status',
                    'name' => 'deliverable_status',
                    'type' => 'select',
                    'choices' => array(
                        'pending' => 'Pending',
                        'in-progress' => 'In Progress',
                        'completed' => 'Completed',
                    ),
                    'default_value' => 'pending',
                ),
            ),
        ),
        array(
            'key' => 'field_client_project_milestones',
            'label' => 'Milestones',
            'name' => 'client_project_milestones',
            'type' => 'repeater',
            'instructions' => 'Key project milestones',
            'layout' => 'table',
            'button_label' => 'Add Milestone',
            'sub_fields' => array(
                array(
                    'key' => 'field_milestone_name',
                    'label' => 'Milestone',
                    'name' => 'milestone_name',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_milestone_date',
                    'label' => 'Date',
                    'name' => 'milestone_date',
                    'type' => 'date_picker',
                    'display_format' => 'm/d/Y',
                    'return_format' => 'Y-m-d',
                ),
                array(
                    'key' => 'field_milestone_completed',
                    'label' => 'Completed',
                    'name' => 'milestone_completed',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'tbdesigned_client_project',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
));

/**
 * Helper function to get ACF field with fallback
 */
function tbdesigned_get_field($field_name, $post_id = null, $default = '') {
    if (!function_exists('get_field')) {
        return $default;
    }

    $value = get_field($field_name, $post_id);
    
    return $value !== false && $value !== null ? $value : $default;
}

/**
 * Create ACF JSON folder for field sync
 */
function tbdesigned_acf_json_save_point($path) {
    return TBDESIGNED_DIR . '/acf-json';
}
add_filter('acf/settings/save_json', 'tbdesigned_acf_json_save_point');

function tbdesigned_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = TBDESIGNED_DIR . '/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', 'tbdesigned_acf_json_load_point');
