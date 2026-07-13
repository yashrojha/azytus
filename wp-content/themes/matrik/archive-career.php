<?php
/**
 * The template for displaying archive pages
 *
 * @link https: //developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package matrik
 */

get_header();

// Include breadcrumb template
Egns\Helper\Egns_Helper::egns_template_part('breadcrumb', 'templates/breadcrumb-archive');

$posts_per_option = Egns\Helper\Egns_Helper::egns_get_theme_option('posts_per_page_option_career');
?>

<div class="job-post-section sec-mar">
    <div class="container">
        <ul class="job-post-list">
            <?php
            $args = array(
                'post_type'      => 'career',
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

                    echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('career', 'content/archive-content'));

                endwhile;  // End of the loop.

            } else {
                // Include global posts not found
                Egns\Helper\Egns_Helper::egns_template_part('content', 'templates/posts-not-found');
            }
            ?>
        </ul>
        <?php
        global $wp_query;
        // Get the total number of pages.
        $total_pages = $wp_query->max_num_pages;
        // Only paginate if there are multiple pages.
        if ($total_pages > 1) {
            $current_page = max(1, get_query_var('paged'));
        ?>
            <div class="row wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="innerpage-pagination-area dark mt-120">
                        <ul class="paginations">
                            <?php if ($current_page > 1): ?>
                                <li class="page-item paginations-button">
                                    <a href="<?php echo esc_url(get_pagenum_link($current_page - 1)); ?>">
                                        <svg width="14" height="12" viewBox="0 0 14 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.98 5.66372C13.9099 5.4729 13.7497 5.26524 13.5995 5.16983C13.4493 5.08003 13.0538 5.07442 8.23285 5.04636L3.02639 5.01829L4.91373 3.22795C6.14025 2.06619 6.83111 1.37026 6.88117 1.2524C7.05138 0.848309 6.89619 0.30391 6.55577 0.101865C6.36053 -0.0216073 5.98506 -0.0328321 5.81986 0.0681905C5.75978 0.107477 4.46318 1.31975 2.93128 2.76774C1.05896 4.54124 0.127801 5.46167 0.0727325 5.57953C-0.0774537 5.94433 0.00765182 6.34281 0.303018 6.6571C0.798632 7.17344 5.8549 11.8598 5.99007 11.9271C6.20534 12.0337 6.39057 12.0225 6.63587 11.8991C7.03136 11.697 7.20157 11.0909 6.9863 10.6812C6.93624 10.5858 6.03012 9.699 4.97381 8.71684C3.92251 7.72907 3.05643 6.90966 3.05643 6.88721C3.05143 6.85915 5.38932 6.84231 8.25287 6.84231L13.4493 6.84231L13.6145 6.71884C13.8648 6.52241 13.975 6.32036 13.995 6.0173C14.005 5.87137 14 5.70862 13.98 5.66372Z" />
                                        </svg>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php
                            for ($i = 1; $i <= $total_pages; $i++) :
                                $active = ($i == $current_page) ? 'active' : '';
                            ?>
                                <li class="page-item <?php echo esc_attr($active); ?>">
                                    <a href="<?php echo esc_url(get_pagenum_link($i)); ?>">
                                        <?php echo esc_html(sprintf('%02d', $i)); ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                            <?php if ($current_page < $total_pages): ?>
                                <li class="page-item paginations-button">
                                    <a href="<?php echo esc_url(get_pagenum_link($current_page + 1)); ?>">
                                        <svg width="14" height="12" viewBox="0 0 14 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.020025 6.33628C0.0901115 6.5271 0.25031 6.73476 0.400496 6.83017C0.550683 6.91997 0.946172 6.92558 5.76715 6.95364L10.9736 6.98171L9.08627 8.77205C7.85974 9.93381 7.16889 10.6297 7.11883 10.7476C6.94862 11.1517 7.10381 11.6961 7.44423 11.8981C7.63947 12.0216 8.01494 12.0328 8.18014 11.9318C8.24022 11.8925 9.53682 10.6803 11.0687 9.23226C12.941 7.45876 13.8722 6.53833 13.9273 6.42047C14.0775 6.05567 13.9923 5.65719 13.697 5.3429C13.2014 4.82656 8.1451 0.140237 8.00993 0.0728886C7.79466 -0.0337464 7.60943 -0.0225217 7.36413 0.100951C6.96864 0.302995 6.79843 0.909129 7.0137 1.31883C7.06376 1.41424 7.96988 2.301 9.02619 3.28316C10.0775 4.27093 10.9436 5.09034 10.9436 5.11279C10.9486 5.14085 8.61068 5.15769 5.74713 5.15769L0.550683 5.15769L0.385478 5.28116C0.135167 5.47759 0.0250308 5.67964 0.00500557 5.98271C-0.00500609 6.12863 -2.49531e-07 6.29139 0.020025 6.33628Z" />
                                        </svg>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>


</div>



<?php get_footer(); ?>