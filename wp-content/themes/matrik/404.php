<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package matrik
 */

get_header();

?>

<div class="error-page-wrapper">
    <?php if (class_exists('CSF')) : ?>
        <div class="error-wrapper pt-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="error-content text-center">
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('404_image', 'url'))) : ?>
                                <img src="<?php echo esc_url(Egns\Helper\Egns_Helper::egns_get_theme_option('404_image', 'url')) ?>" alt="<?php echo esc_attr__('image', 'matrik') ?>">
                            <?php endif; ?>
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('404_title'))) : ?>
                                <h2><?php echo wp_kses(Egns\Helper\Egns_Helper::egns_get_theme_option('404_title'), wp_kses_allowed_html('post')) ?></h2>
                            <?php endif; ?>
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('404_content'))) : ?>
                                <p><?php echo wp_kses(Egns\Helper\Egns_Helper::egns_get_theme_option('404_content'), wp_kses_allowed_html('post')) ?></p>
                            <?php endif; ?>
                            <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('404_button_text'))) : ?>
                                <a class="primary-btn1" href="<?php echo esc_url(home_url('/')); ?>">
                                    <span><?php echo Egns\Helper\Egns_Helper::egns_get_theme_option('404_button_text') ?>
                                    </span>
                                    <span><?php echo Egns\Helper\Egns_Helper::egns_get_theme_option('404_button_text') ?>

                                    </span>
                                    <svg class="arrow" width="23" height="23" viewBox="0 0 23 23"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                            <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                        </g>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="error-wrapper pt-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="error-content text-center">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/image/error/404.png') ?>" alt="<?php echo esc_attr__('image', 'matrik') ?>">
                            <h2><?php echo esc_html__("Sorry! Page Not Found.", "matrik"); ?></h2>
                            <p><?php echo esc_html__("The page you are looking for was moved, removed, renamed or never existed. we are open
                                for this constructions & architecture.", "matrik"); ?></p>
                            <a class="primary-btn1" href="<?php echo esc_url(home_url('/')); ?>">
                                <span><?php echo esc_html__('Take Me Home', 'matrik') ?>
                                </span>
                                <span><?php echo esc_html__('Take Me Home', 'matrik') ?>
                                </span>
                                <svg class="arrow" width="23" height="23" viewBox="0 0 23 23"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                        <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>

<?php
// Include footer top template
Egns\Helper\Egns_Helper::egns_template_part('common', 'templates/footer-top');
?>

<?php
get_footer();
