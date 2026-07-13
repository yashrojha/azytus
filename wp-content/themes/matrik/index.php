<?php

get_header();

if (is_home()) {
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');
}

// Include content template
Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/standard', '', ['style' => 'standard']);


// Include footer top template
Egns\Helper\Egns_Helper::egns_template_part('common', 'templates/footer-top');

get_footer();
