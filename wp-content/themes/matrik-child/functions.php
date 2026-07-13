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
