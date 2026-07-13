<?php

use Egns\Inc\Header_Helper;
use Egns\Helper\Egns_Helper;

$enable_breadcrumb_by_theme = Egns_Helper::egns_get_theme_option('breadcrumb_enable');
$breadcrumb_enable_by_page  = Egns_Helper::egns_page_option_value('breadcrumb_enable_page');

$term = get_queried_object();

?>

<?php if (Egns\Helper\Egns_Helper::is_enabled($enable_breadcrumb_by_theme, $breadcrumb_enable_by_page)): ?>
    <div class="breadcrumb-section">
        <div class="breadcrumb-content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-10">
                        <div class="breadcrumb-content">
                            <?php echo egns_breadcrumb() ?>
                            <h1>
                                <?php
                                $page_values = Egns\Helper\Egns_Helper::egns_page_option_value('page_breadcrumb_scroll_button_text');
                                $theme_values = Egns\Helper\Egns_Helper::egns_get_theme_option('breadcrumb_title_text');

                                if (!empty($page_values)) {
                                    echo esc_html($page_values);
                                } elseif (!empty($theme_values)) {
                                    echo esc_html($theme_values);
                                } elseif (is_category()) {
                                    echo esc_html__('Category: ', 'matrik');
                                    single_cat_title();
                                } elseif (is_tag()) {
                                    echo esc_html__('Tag: ', 'matrik');
                                    single_tag_title();
                                } elseif (is_author()) {
                                    echo esc_html__('Author: ', 'matrik');
                                    the_author();
                                } elseif (is_date()) {
                                    echo esc_html__('Date: ', 'matrik');
                                    if (is_day()) {
                                        echo get_the_time('F j, Y');
                                    } elseif (is_month()) {
                                        echo get_the_time('F, Y');
                                    } elseif (is_year()) {
                                        echo get_the_time('Y');
                                    }
                                } elseif (is_home()) {
                                    Egns\Helper\Egns_Helper::egns_translate('Blog');
                                } elseif (is_post_type_archive('product')) {
                                    Egns\Helper\Egns_Helper::egns_translate('Market Trend & Analyst Behind The Scene of Industry.');
                                } elseif (is_post_type_archive('material')) {
                                    Egns\Helper\Egns_Helper::egns_translate_with_escape_('Materials');
                                } elseif (is_post_type_archive('career')) {
                                    Egns\Helper\Egns_Helper::egns_translate_with_escape_('Career');
                                } elseif (is_post_type_archive('team')) {
                                    Egns\Helper\Egns_Helper::egns_translate_with_escape_('Team');
                                } elseif (is_post_type_archive('project')) {
                                    Egns\Helper\Egns_Helper::egns_translate_with_escape_('Projects');
                                } elseif (is_tax() && isset($term)) {
                                    echo esc_html($term->taxonomy . ': ' . $term->name);
                                } else {
                                    the_title();
                                }
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (class_exists('CSF')) : ?>
                <div class="circular-text btn_wrapper">
                    <a href="#" class="center-icon" id="scroll-btn">
                        <svg width="16" height="31" viewBox="0 0 16 31" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.66667 6C2.66667 8.94552 5.05448 11.3333 8 11.3333C10.9455 11.3333 13.3333 8.94552 13.3333 6C13.3333 3.05448 10.9455 0.666666 8 0.666667C5.05448 0.666667 2.66667 3.05448 2.66667 6ZM7.29289 30.7071C7.68342 31.0976 8.31658 31.0976 8.70711 30.7071L15.0711 24.3431C15.4616 23.9526 15.4616 23.3195 15.0711 22.9289C14.6805 22.5384 14.0474 22.5384 13.6569 22.9289L8 28.5858L2.34315 22.9289C1.95262 22.5384 1.31946 22.5384 0.928933 22.9289C0.538409 23.3195 0.538409 23.9526 0.928933 24.3431L7.29289 30.7071ZM7 6L7 30L9 30L9 6L7 6Z" />
                        </svg>
                    </a>
                    <div class="text">
                        <span>
                            <?php
                            $scroll_button_text = Egns_Helper::egns_page_option_value('page_breadcrumb_scroll_button_text');

                            if (!empty($scroll_button_text)) {
                                echo esc_html($scroll_button_text);
                            } else {
                                echo esc_html(Egns_Helper::egns_get_theme_option('breadcrumb_scroll_button_text'));
                            }
                            ?>
                        </span>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            $vector_image_url = get_template_directory_uri() . '/assets/img/innerpages/breadcrumb-section-vector.svg';
            $vector_image_alt = esc_attr__('Vector image', 'matrik');
            ?>
            <img src="<?php echo esc_url($vector_image_url); ?>" alt="<?php echo esc_attr($vector_image_alt); ?>" class="vector">
        </div>


        <?php if (class_exists('CSF')) { ?>
            <div class="breadcrumb-img">
                <?php $bread_image = Egns_Helper::egns_get_theme_option('breadcrumb_bg_image');
                $bread_page_image = Egns_Helper::egns_page_option_value('breadcrumb_page_bg_image');
                ?>
                <?php if (!empty($bread_page_image['url'])) { ?>
                    <img src="<?php echo esc_url($bread_page_image['url']); ?>" alt="<?php echo esc_attr__('breadcrumb-image', 'matrik'); ?>" />
                <?php } else { ?>
                    <img src="<?php echo esc_url($bread_image['url']); ?>" alt="<?php echo esc_attr__('breadcrumb-image', 'matrik'); ?>" />
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php endif; ?>