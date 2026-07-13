<?php

/**
 * The Single Material template file
 *
 *
 * @link https:   //developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package matrik
 * @since 1.0.0
 * 
 */

get_header();

if (!is_front_page()):
    // Include breadcrumb template
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-single');
endif;

?>
<?php

if (have_posts()) : the_post();
?>
    <!-- Product Details Page Start-->
    <div class="product-details-top-area pt-120 mb-120" id="scroll-section">
        <?php the_content(); ?>
    </div>
<?php endif; ?>
<!-- Product Details Page End-->




<?php get_footer(); ?>