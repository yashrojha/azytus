<?php

use Egns\Helper\Egns_Helper;

?>

<div class="project-details-page sec-mar" id="scroll-section">
    <div class="container">
        <div class="row g-lg-4 gy-5 mb-80">
            <div class="col-lg-8">
                <div class="details-content-wrapper">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="project-details-sidebar">
                    <div class="project-info-wrap mb-35">
                        <ul class="project-info">
                            <?php $project_data = Egns_Helper::egns_project_value('project_info_list'); ?>
                            <?php foreach ($project_data as $data) : ?>
                                <li>
                                    <?php if (!empty($data['project_icon'])) : ?>
                                        <div class="icon">
                                            <?php
                                            $icon = $data['project_icon'];

                                            if (!empty($icon['url'])) {
                                                $file_url = esc_url($icon['url']);
                                                $file_path = get_attached_file($icon['id']);

                                                if (str_ends_with($file_url, '.svg') && file_exists($file_path)) {

                                                    echo file_get_contents($file_path);
                                                } else { ?>

                                                    <img src="<?php echo esc_url($file_url); ?>" alt="<?php echo esc_attr__('project-icon', 'matrik'); ?>" />
                                            <?php    }
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if (!empty($data['project_label_text'])) : ?>
                                            <span><?php echo esc_html($data['project_label_text']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($data['project_content_text'])) : ?>
                                            <h5><?php echo esc_html($data['project_content_text']); ?></h5>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="sidebar-banner">
                        <?php $banner_image = Egns\Helper\Egns_Helper::egns_get_theme_option('project_banner_image'); ?>
                        <img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik'); ?>">
                        <div class="banner-content-wrap">
                            <div class="banner-content">
                                <?php if (!empty(Egns\Helper\Egns_Helper::egns_get_theme_option('project_banner_title'))) : ?>
                                    <h2><?php echo wp_kses(Egns\Helper\Egns_Helper::egns_get_theme_option('project_banner_title'), wp_kses_allowed_html('post')); ?></h2>
                                <?php endif; ?>
                                <?php $button_text = Egns\Helper\Egns_Helper::egns_get_theme_option('project_banner_button_text');
                                $button_url = Egns\Helper\Egns_Helper::egns_get_theme_option('project_banner_button_text_url');
                                ?>
                                <?php if (!empty($button_text)) : ?>
                                    <a class="primary-btn1 white-bg" href="<?php echo esc_url($button_url['url']); ?>">
                                        <span><?php echo esc_html($button_text); ?>
                                        </span>
                                        <span><?php echo esc_html($button_text); ?>
                                        </span>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
        $prev = get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);
        ?>
        <?php if (!empty($prev) || !empty($next)): ?>
            <div class="details-navigation">
                <div class="single-navigation" <?php echo empty($prev) ? 'invisible' : ''; ?>>
                    <?php if (!empty($prev)): ?>
                        <a href="<?php echo get_permalink($prev->ID); ?>" class="nav-btn">
                            <svg width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M-4.97701e-09 22.8859L-1.00536e-06 -0.000118256L4.28425 -0.000118443L22.9997 18.673L18.7154 22.9998L6.08815 10.2474L6.20089 22.8859L-4.97701e-09 22.8859Z" />
                                    <path d="M23.0015 -4.35462e-05L8.57031 -4.29153e-05L14.6585 6.14844L23.0015 6.14844L23.0015 -4.35462e-05Z" />
                                </g>
                            </svg>
                            <?php echo esc_html__('Previous Project', 'matrik'); ?>
                        </a>
                        <div class="navigation-content-wrap">
                            <div class="navigation-img">
                                <?php echo get_the_post_thumbnail($prev->ID, 'thumbnail'); ?>
                            </div>
                            <h6><a href="<?php echo get_permalink($prev->ID); ?>"><?php echo get_the_title($prev->ID); ?></a></h6>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="single-navigation two <?php echo empty($next) ? 'invisible' : ''; ?>">
                    <?php if (!empty($next)): ?>
                        <a href="<?php echo get_permalink($next->ID); ?>" class="nav-btn">
                            <?php echo esc_html__('NEXT Project', 'matrik'); ?>
                            <svg width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                    <path d="M23 22.9998V8.5686L16.8516 14.6568V22.9998H23Z" />
                                </g>
                            </svg>
                        </a>
                        <div class="navigation-content-wrap">
                            <h6><a href="<?php echo get_permalink($next->ID); ?>"><?php echo get_the_title($next->ID); ?></a></h6>
                            <div class="navigation-img">
                                <?php echo get_the_post_thumbnail($next->ID, 'thumbnail'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>