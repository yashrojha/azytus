<?php
/**
 * Template for displaying single Grade Category (grades post type)
 *
 * Breadcrumb is forced after header via Azytus_Frontend::render_grades_breadcrumb()
 * so it also shows when Elementor Theme Builder owns the page.
 */

get_header();

while (have_posts()) :
    the_post();
    $category_id = get_the_ID();
    include AZYTUS_TOOLKIT_PLUGIN_DIR . 'templates/parts/grade-category-content.php';
endwhile;

if (class_exists('\Egns\Helper\Egns_Helper')) {
    \Egns\Helper\Egns_Helper::egns_template_part('common', 'templates/footer-top');
}

get_footer();
