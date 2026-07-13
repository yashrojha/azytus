<?php
/**
 * The main template file
 *
 * Template Name: Project InfoFlow Template
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
    Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');
endif;
$posts_per_option = Egns\Helper\Egns_Helper::egns_get_theme_option('posts_per_page_option_project_infoflow');
?>


<div class="project-info-flow-page sec-mar" id="scroll-section">
    <div class="container-fluid">
        <div class="row gx-xxl-5 gx-xl-4 gx-lg-3 g-4 gy-xl-5" id="project-archive-infoflow">
            <?php
            $args = array(
                'post_type'      => 'project',
                'post_status'    => 'publish',
                'posts_per_page' => $posts_per_option,
                'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1
            );
            $wp_query = new WP_Query($args);
            $num      = 0;

            if ($wp_query->have_posts()) {

                while ($wp_query->have_posts()):
                    $num++;
                    $wp_query->the_post();

                    echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('project', 'content/archive-infoflow'));

                endwhile;  // End of the loop.

            } else {
                // Include global posts not found
                Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
            }
            ?>
        </div>
        <div class="row bounce_up">
            <div class="col-lg-12 d-flex justify-content-center">
                <div id="archive-load-more-project-infoflow" class="load-more-for-project-btn mt-70">
                    <a class="primary-btn1 black-bg load-btn" href="#">
                        <span class="load-text">
                            <?php echo esc_html__('Load More', 'matrik'); ?>
                            <span class="spinner" style="display: none;"></span>
                        </span>
                        <span class="load-text">
                            <?php echo esc_html__('Load More', 'matrik'); ?>
                            <span class="spinner" style="display: none;"></span>
                        </span>
                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer top template
Egns\Helper\Egns_Helper::egns_template_part('common', 'templates/footer-top');
?>

<?php get_footer(); ?>