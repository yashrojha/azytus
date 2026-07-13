<?php

use Egns\Inc\Header_Helper;
use Egns\Helper\Egns_Helper;

$enable_breadcrumb_by_theme = Egns_Helper::egns_get_theme_option('breadcrumb_enable');
$breadcrumb_enable_by_page  = Egns_Helper::egns_page_option_value('breadcrumb_enable_page');

if (Egns\Helper\Egns_Helper::is_enabled($enable_breadcrumb_by_theme, $breadcrumb_enable_by_page)) :
    // Prepare variables
    $scroll_button_text = Egns_Helper::egns_page_option_value('page_breadcrumb_scroll_button_text');
    if (empty($scroll_button_text)) {
        $scroll_button_text = Egns_Helper::egns_get_theme_option('breadcrumb_scroll_button_text');
    }

    // Background image handling
    $bread_image = Egns_Helper::egns_get_theme_option('breadcrumb_bg_image');
    $bread_page_image = Egns_Helper::egns_page_option_value('breadcrumb_page_bg_image');
    $background_image_url = !empty($bread_page_image['url']) ? $bread_page_image['url'] : ($bread_image['url'] ?? '');
    $background_image_alt = esc_attr__('breadcrumb-image', 'matrik');

    // Vector image
    $vector_image_url = get_template_directory_uri() . '/assets/img/innerpages/breadcrumb-section-vector.svg';
    $vector_image_alt = esc_attr__('Vector image', 'matrik');
?>

    <div class="breadcrumb-section">
        <div class="breadcrumb-content-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-10">
                        <div class="breadcrumb-content">
                            <ul class="breadcrumb-list">
                                <li>
                                    <a href="<?php echo esc_url(home_url()); ?>">
                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.0594065 0H12.0001V2.2353L2.25745 12L0 9.76471L6.65353 3.17647L0.0594065 3.2353V0Z" />
                                            <path d="M12.0009 12.0001V4.4707L8.79297 7.64718V12.0001H12.0009Z" />
                                        </svg>
                                        <?php echo esc_html__('Home', 'matrik'); ?>
                                    </a>
                                </li>
                                <li>
                                    <?php
                                    printf(
                                        esc_html__('Search: %s', 'matrik'),
                                        '<span>' . esc_html(get_search_query()) . '</span>'
                                    );
                                    ?>
                                </li>
                            </ul>
                            <h1>
                                <?php
                                printf(
                                    esc_html__('Looking For: %s', 'matrik'),
                                    '<span>' . esc_html(get_search_query()) . '</span>'
                                );
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
                            <path d="M2.66667 6C2.66667 8.94552 5.05448 11.3333 8 11.3333C10.9455 11.3333 13.3333 8.94552 13.3333 6C13.3333 3.05448 10.9455 0.666666 8 0.666667C5.05448 0.666667 2.66667 3.05448 2.66667 6ZM7.29289 30.7071C7.68342 31.0976 8.31658 31.0976 8.70711 30.7071L15.0711 24.3431C15.4616 23.9526 15.4616 23.3195 15.0711 22.9289C14.6805 22.5384 14.0474 22.5384 13.6569 22.9289L8 28.5858L2.34315 22.9289C1.95262 22.5384 1.31946 22.5384 0.928933 22.9289C0.538409 23.3195 0.538409 23.9526 0.928933 24.3431L7.29289 30.7071ZM7 6L7 30L9 30L9 6L7 6Z" />
                        </svg>
                    </a>
                    <div class="text">
                        <span><?php echo esc_html($scroll_button_text); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <img src="<?php echo esc_url($vector_image_url); ?>" alt="<?php echo esc_attr($vector_image_alt); ?>" class="vector">
        </div>

        <?php if (class_exists('CSF') && !empty($background_image_url)) : ?>
            <div class="breadcrumb-img">
                <img src="<?php echo esc_url($background_image_url); ?>" alt="<?php echo esc_attr($background_image_alt); ?>" />
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>