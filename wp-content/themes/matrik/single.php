<?php

get_header();

if (!is_front_page()) {

    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-single');
}
// Include content template

Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/single-sidebar');

?>

<?php
// Include footer top template
Egns\Helper\Egns_Helper::egns_template_part('common', 'templates/footer-top');
?>

<?php

get_footer();
