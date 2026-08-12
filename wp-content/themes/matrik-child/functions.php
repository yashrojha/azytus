<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;


function matrik_child_enqueue_styles()
{

    // enqueue parent styles
    wp_enqueue_style('matrik-styles', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('matrik-default-styles', get_template_directory_uri() . '/style.css');

    // enqueue child styles
    wp_enqueue_style(
        'matrik-child-styles', get_stylesheet_directory_uri() . '/style.css', array('matrik-default-styles'), wp_get_theme()->get('Version')
    );

    // enqueue RTL styles
    if (is_rtl()) {
        wp_enqueue_style('matrik-child-rtl-styles',  get_template_directory_uri() . '/rtl.css', array('matrik-styles'), wp_get_theme()->get('Version'));
    }
}
add_action('wp_enqueue_scripts', 'matrik_child_enqueue_styles', 99);

/**
 * Disable Matrik Materials and Project post types (and related taxonomies).
 */
function matrik_child_disable_unused_post_types() {
    if (post_type_exists('materials')) {
        unregister_post_type('materials');
    }

    if (post_type_exists('project')) {
        unregister_post_type('project');
    }

    if (taxonomy_exists('project-category')) {
        unregister_taxonomy('project-category');
    }

    if (taxonomy_exists('project-tag')) {
        unregister_taxonomy('project-tag');
    }

    // Flush rewrites once after this change.
    if (!get_option('matrik_child_disabled_matrik_cpts_v1')) {
        flush_rewrite_rules(false);
        update_option('matrik_child_disabled_matrik_cpts_v1', '1');
    }
}
add_action('init', 'matrik_child_disable_unused_post_types', 20);

/**
 * Limit front-end site search (?s=) to Posts only.
 *
 * @param WP_Query $query Query.
 */
function matrik_child_limit_search_to_posts($query) {
    if (is_admin() || !$query->is_main_query() || !$query->is_search()) {
        return;
    }

    $query->set('post_type', 'post');
}
add_action('pre_get_posts', 'matrik_child_limit_search_to_posts');
