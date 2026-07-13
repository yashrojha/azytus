<?php


get_header();

if (!is_front_page()) :
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-single');
endif;
?>

<?php
// Include casestudy template
Egns\Helper\Egns_Helper::egns_template_part('career', 'content/single-career');
?>

<?php
// Include footer top template
Egns\Helper\Egns_Helper::egns_template_part('common', 'templates/footer-top');
?>

<?php get_footer() ?>