<?php
/**
 * Template for displaying single Grade Category (grades post type)
 */

get_header();

// Matrik theme breadcrumb hero (same as project/single pages).
// Skipped when an Elementor Theme Builder Single with content is handling the page.
if (!is_front_page() && class_exists('\Egns\Helper\Egns_Helper')) {
    \Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-single');
}

while (have_posts()) :
    the_post();
    $category_id = get_the_ID();
    include AZYTUS_TOOLKIT_PLUGIN_DIR . 'templates/parts/grade-category-content.php';
endwhile;

if (class_exists('\Egns\Helper\Egns_Helper')) {
    \Egns\Helper\Egns_Helper::egns_template_part('common', 'templates/footer-top');
}

get_footer();
