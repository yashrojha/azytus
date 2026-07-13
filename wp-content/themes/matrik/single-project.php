<?php


get_header();

if (!is_front_page()) :
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-single');
endif;
?>

<?php
// Include project template
Egns\Helper\Egns_Helper::egns_template_part('project', 'content/single-project');
?>

<?php
// Include footer top template
Egns\Helper\Egns_Helper::egns_template_part('common', 'templates/footer-top');
?>

<?php get_footer() ?>