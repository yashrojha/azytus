<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Scroll_Text_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_scroll_text';
    }

    public function get_title()
    {
        return esc_html__('EG Scroll Text', 'matrik-core');
    }

    public function get_icon()
    {
        return 'egns-widget-icon';
    }

    public function get_categories()
    {
        return ['matrik_widgets'];
    }

    protected function register_controls()
    {

        //=====================General=======================//

        $this->start_controls_section(
            'matrik_scroll_text_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_scroll_text_genaral_select_style',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'matrik-core'),
                    'style_two' => esc_html__('Style Two', 'matrik-core'),

                ],
                'default' => 'style_one',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_scroll_text_genaral_scroll_text_icon_image',
            [
                'label' => esc_html__('Icon Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $repeater->add_control(
            'matrik_scroll_text_genaral_scroll_text_title',
            [
                'label'       => esc_html__('Scroll Text Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Quality Construction, Timely Delivery', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_scroll_text_genaral_scroll_text_list',
            [
                'label' => esc_html__('Scroll Text List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_scroll_text_genaral_scroll_text_title' => esc_html('Quality Construction, Timely Delivery'),
                    ],
                    [
                        'matrik_scroll_text_genaral_scroll_text_title' => esc_html('Transforming Visions into Reality'),

                    ],
                    [
                        'matrik_scroll_text_genaral_scroll_text_title' => esc_html('Building a Better Tomorrow, Today'),
                    ],

                ],
                'title_field' => '{{{ matrik_scroll_text_genaral_scroll_text_title }}}',
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_scroll_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_scroll_style_genaral_scroll_text_title',
            [
                'label'     => esc_html__('Scroll Text Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_scroll_style_genaral_scroll_text_title_typ',
                'selector' => '{{WRAPPER}} .scroll-text-section .scroll-text h6',

            ]
        );

        $this->add_control(
            'matrik_scroll_style_genaral_scroll_text_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll-text-section .scroll-text h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_scroll_style_genaral_scroll_text_title_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .scroll-text-section.two' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['matrik_scroll_text_genaral_select_style'] == 'style_one') : ?>
            <div class="scroll-text-section">
                <div class="scroll-text">
                    <?php foreach ($settings['matrik_scroll_text_genaral_scroll_text_list'] as $data) : ?>

                        <?php
                        $image = $data['matrik_scroll_text_genaral_scroll_text_icon_image'];

                        if (!empty($image['url'])) {
                            $file_url  = esc_url($image['url']);
                            $file_path = isset($image['id']) ? get_attached_file($image['id']) : '';

                            if ($file_path && strtolower(pathinfo($file_path, PATHINFO_EXTENSION)) === 'svg') {
                                $svg_content = file_get_contents($file_path);

                                if ($svg_content) {
                                    // Allow only safe SVG elements and attributes
                                    $allowed_svg_tags = [
                                        'svg'      => [
                                            'class' => true,
                                            'xmlns' => true,
                                            'width' => true,
                                            'height' => true,
                                            'viewBox' => true,
                                            'fill' => true,
                                        ],
                                        'g'        => ['fill' => true, 'stroke' => true],
                                        'path'     => ['d' => true, 'fill' => true, 'stroke' => true],
                                        'circle'   => ['cx' => true, 'cy' => true, 'r' => true, 'fill' => true],
                                        'rect'     => ['x' => true, 'y' => true, 'width' => true, 'height' => true, 'fill' => true],
                                        'use'      => ['xlink:href' => true],
                                    ];

                                    echo wp_kses($svg_content, $allowed_svg_tags);
                                }
                            } else {
                        ?>
                                <img src="<?php echo esc_url($file_url); ?>" alt="<?php echo esc_attr__('icon-image', 'matrik-core'); ?>" />
                        <?php
                            }
                        }
                        ?>

                        <?php if (!empty($data['matrik_scroll_text_genaral_scroll_text_title'])) : ?>
                            <h6><?php echo esc_html($data['matrik_scroll_text_genaral_scroll_text_title']); ?></h6>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </div>
                <div aria-hidden="true" class="scroll-text">
                    <?php foreach ($settings['matrik_scroll_text_genaral_scroll_text_list'] as $data) : ?>
                        <?php
                        $image = $data['matrik_scroll_text_genaral_scroll_text_icon_image'];

                        if (!empty($image['url'])) {
                            $file_url  = esc_url($image['url']);
                            $file_path = isset($image['id']) ? get_attached_file($image['id']) : '';

                            if ($file_path && strtolower(pathinfo($file_path, PATHINFO_EXTENSION)) === 'svg') {
                                $svg_content = file_get_contents($file_path);

                                if ($svg_content) {
                                    // Define allowed SVG tags and attributes
                                    $allowed_svg_tags = [
                                        'svg' => [
                                            'xmlns' => true,
                                            'width' => true,
                                            'height' => true,
                                            'viewBox' => true,
                                            'fill' => true,
                                            'aria-hidden' => true,
                                            'role' => true,
                                            'focusable' => true,
                                            'class' => true,
                                        ],
                                        'g' => [
                                            'fill' => true,
                                            'stroke' => true,
                                            'transform' => true,
                                        ],
                                        'path' => [
                                            'd' => true,
                                            'fill' => true,
                                            'stroke' => true,
                                            'stroke-width' => true,
                                        ],
                                        'circle' => [
                                            'cx' => true,
                                            'cy' => true,
                                            'r' => true,
                                            'fill' => true,
                                        ],
                                        'rect' => [
                                            'x' => true,
                                            'y' => true,
                                            'width' => true,
                                            'height' => true,
                                            'fill' => true,
                                        ],
                                        'use' => [
                                            'xlink:href' => true,
                                            'href' => true,
                                        ],
                                    ];

                                    echo wp_kses($svg_content, $allowed_svg_tags);
                                }
                            } else {
                        ?>
                                <img src="<?php echo esc_url($file_url); ?>" alt="<?php echo esc_attr__('icon-image', 'matrik-core'); ?>" />
                        <?php
                            }
                        }
                        ?>
                        <?php if (!empty($data['matrik_scroll_text_genaral_scroll_text_title'])) : ?>
                            <h6><?php echo esc_html($data['matrik_scroll_text_genaral_scroll_text_title']); ?></h6>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_scroll_text_genaral_select_style'] == 'style_two') : ?>
            <div class="scroll-text-section two">
                <div class="scroll-text">
                    <?php foreach ($settings['matrik_scroll_text_genaral_scroll_text_list'] as $data) : ?>

                        <?php
                        $image = $data['matrik_scroll_text_genaral_scroll_text_icon_image'];

                        if (!empty($image['url'])) {
                            $file_url = esc_url($image['url']);
                            $file_path = get_attached_file($image['id']);

                            if (strtolower(pathinfo($file_path, PATHINFO_EXTENSION)) === 'svg') {
                                $svg_content = file_get_contents($file_path);
                                if ($svg_content) {
                                    echo $svg_content;
                                }
                            } else { ?>
                                <img src="<?php echo $file_url; ?>" alt="<?php echo esc_attr__('icon-image', 'matrik-core'); ?>">
                        <?php   }
                        }
                        ?>
                        <?php if (!empty($data['matrik_scroll_text_genaral_scroll_text_title'])) : ?>
                            <h6><?php echo esc_html($data['matrik_scroll_text_genaral_scroll_text_title']); ?></h6>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </div>
                <div aria-hidden="true" class="scroll-text">
                    <?php foreach ($settings['matrik_scroll_text_genaral_scroll_text_list'] as $data) : ?>
                        <?php
                        $image = $data['matrik_scroll_text_genaral_scroll_text_icon_image'];

                        if (!empty($image['url'])) {
                            $file_url = esc_url($image['url']);
                            $file_path = get_attached_file($image['id']);

                            if (strtolower(pathinfo($file_path, PATHINFO_EXTENSION)) === 'svg') {
                                $svg_content = file_get_contents($file_path);
                                if ($svg_content) {
                                    echo $svg_content;
                                }
                            } else { ?>
                                <img src="<?php echo $file_url; ?>" alt="<?php echo esc_attr__('icon-image', 'matrik-core'); ?>">
                        <?php   }
                        }
                        ?>
                        <?php if (!empty($data['matrik_scroll_text_genaral_scroll_text_title'])) : ?>
                            <h6><?php echo esc_html($data['matrik_scroll_text_genaral_scroll_text_title']); ?></h6>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Scroll_Text_Widget());
