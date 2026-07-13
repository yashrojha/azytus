<?php

use Egns\Helper\Egns_Helper; ?>
<li class="single-job wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
    <?php $icon_image = Egns\Helper\Egns_Helper::egns_career_value('career_icon');
    if (!empty($icon_image['url'])) : ?>
        <div class="number-and-icon-area">
            <div class="icon">
                <?php
                if (!empty($icon_image['url'])) {
                    $file_url = $icon_image['url'];
                    $file_ext = strtolower(pathinfo($file_url, PATHINFO_EXTENSION));

                    // For SVGs – output the inline SVG code safely
                    if ($file_ext === 'svg') {
                        $svg_path = get_attached_file($icon_image['id']);
                        if (file_exists($svg_path)) {
                            $svg_code = file_get_contents($svg_path);

                            // Define allowed tags and attributes for SVGs
                            $allowed_svg_tags = [
                                'svg' => [
                                    'xmlns'       => true,
                                    'width'       => true,
                                    'height'      => true,
                                    'viewBox'     => true,
                                    'fill'        => true,
                                    'stroke'      => true,
                                    'class'       => true,
                                    'aria-hidden' => true,
                                    'role'        => true,
                                    'focusable'   => true,
                                ],
                                'path' => [
                                    'd'            => true,
                                    'fill'         => true,
                                    'stroke'       => true,
                                    'stroke-width' => true,
                                ],
                                'g'     => ['fill' => true],
                                'title' => [],
                                'desc'  => [],
                                'use'   => [
                                    'xlink:href' => true,
                                ],
                            ];

                            echo wp_kses($svg_code, $allowed_svg_tags);
                        } else {
                            echo '<!-- SVG file not found -->';
                        }
                    } else {
                        echo '<img src="' . esc_url($file_url) . '" alt="' . esc_attr($icon_image['alt'] ?? '') . '" width="' . esc_attr($icon_image['width']) . '" height="' . esc_attr($icon_image['height']) . '">';
                    }
                }
                ?>
            </div>
        </div>
    <?php endif; ?>
    <h2><?php the_title(); ?></h2>
    <?php if (!empty(Egns\Helper\Egns_Helper::egns_career_value('career_info_text'))) : ?>
        <span><?php echo esc_html(Egns\Helper\Egns_Helper::egns_career_value('career_info_text')); ?></span>
    <?php endif; ?>
    <a href="<?php the_permalink(); ?>" class="details-btn">
        <span><?php echo esc_html__('View Details', 'matrik'); ?> </span>
        <div class="icon">
            <svg width="24" height="23" viewBox="0 0 24 23" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path
                        d="M12.056 0.0560084L23.3137 11.3137L21.2063 13.4211L2.81473 13.4419L2.79385 9.20615L15.2782 9.26771L9.00578 3.10624L12.056 0.0560084Z" />
                    <path d="M11.9999 22.6272L19.0987 15.5285L13.0794 15.4988L8.9755 19.6027L11.9999 22.6272Z" />
                </g>
            </svg>
        </div>
    </a>
</li>