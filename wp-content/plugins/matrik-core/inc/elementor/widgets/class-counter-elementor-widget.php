<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Counter_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_counter';
    }

    public function get_title()
    {
        return esc_html__('EG Counter', 'matrik-core');
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
            'matrik_counter_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_counter_genaral_style_selection',
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
            'matrik_counter_genaral_counter_number',
            [
                'label'       => esc_html__('Counter Number', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('45', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_counter_genaral_counter_sign',
            [
                'label'       => esc_html__('Counter Sign', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('+', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_counter_genaral_counter_title',
            [
                'label'       => esc_html__('Counter Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Green Spaces', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_counter_genaral_counter_list',
            [
                'label' => esc_html__('Counter List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_counter_genaral_counter_number' => esc_html('45'),
                        'matrik_counter_genaral_counter_title' => esc_html('Green Spaces'),
                        'matrik_counter_genaral_counter_sign' => esc_html('+'),
                    ],
                    [
                        'matrik_counter_genaral_counter_number' => esc_html('15'),
                        'matrik_counter_genaral_counter_title' => esc_html('Skilled Professionals'),

                    ],
                    [
                        'matrik_counter_genaral_counter_number' => esc_html('10'),
                        'matrik_counter_genaral_counter_title' => esc_html('Years of Experience'),
                    ],
                    [
                        'matrik_counter_genaral_counter_number' => esc_html('2'),
                        'matrik_counter_genaral_counter_title' => esc_html('Square Meters'),
                        'matrik_counter_genaral_counter_sign' => esc_html('M'),
                    ],

                ],
                'title_field' => '{{{ matrik_counter_genaral_counter_title }}}',
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_counter_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_counter_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_counter_style_one_genaral_counter_number',
            [
                'label'     => esc_html__('Counter Number', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_counter_style_one_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .home1-counter-section .counter-wrap .single-countdown .number h2',

            ]
        );

        $this->add_control(
            'matrik_counter_style_one_genaral_counter_number_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-counter-section .counter-wrap .single-countdown .number h2' => '-webkit-text-stroke: 1px {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_counter_style_one_genaral_counter_sign',
            [
                'label'     => esc_html__('Counter Sign', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_counter_style_one_genaral_counter_sign_typ',
                'selector' => '{{WRAPPER}} .home1-counter-section .counter-wrap .single-countdown .number h2',

            ]
        );

        $this->add_control(
            'matrik_counter_style_one_genaral_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-counter-section .counter-wrap .single-countdown .number span' => '-webkit-text-stroke: 1px {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_counter_style_one_genaral_counter_title',
            [
                'label'     => esc_html__('Counter Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_counter_style_one_genaral_counter_title_typ',
                'selector' => '{{WRAPPER}} .home1-counter-section .counter-wrap .single-countdown span',

            ]
        );

        $this->add_control(
            'matrik_counter_style_one_genaral_counter_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-counter-section .counter-wrap .single-countdown span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_counter_style_one_genaral_counter_divider_color',
            [
                'label'     => esc_html__('Divider Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-counter-section .counter-wrap .divider::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_counter_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_counter_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_counter_style_two_genaral_counter_number',
            [
                'label'     => esc_html__('Counter Number', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_counter_style_two_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .home4-counter-section .counter-wrap .single-countdown .number h2',

            ]
        );

        $this->add_control(
            'matrik_counter_style_two_genaral_counter_number_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrap .single-countdown .number h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_counter_style_two_genaral_counter_sign',
            [
                'label'     => esc_html__('Counter Sign', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_counter_style_two_genaral_counter_sign_typ',
                'selector' => '{{WRAPPER}} .home4-counter-section .counter-wrap .single-countdown .number span',

            ]
        );

        $this->add_control(
            'matrik_counter_style_two_genaral_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrap .single-countdown .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_counter_style_two_genaral_counter_title',
            [
                'label'     => esc_html__('Counter Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_counter_style_two_genaral_counter_title_typ',
                'selector' => '{{WRAPPER}} .home4-counter-section .counter-wrap .single-countdown span',

            ]
        );

        $this->add_control(
            'matrik_counter_style_two_genaral_counter_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrap .single-countdown span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_counter_style_two_genaral_counter_devider',
            [
                'label'     => esc_html__('Counter Divider', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_counter_style_two_genaral_counter_devider_typ',
                'selector' => '{{WRAPPER}} .home4-counter-section .counter-wrap .divider::before',

            ]
        );

        $this->add_control(
            'matrik_counter_style_two_genaral_counter_devider_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-counter-section .counter-wrap .divider::before' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['matrik_counter_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-counter-section">
                <div class="container">
                    <div class="counter-wrap">
                        <div class="row gy-4">
                            <?php $classes = array('divider', 'd-flex justify-content-lg-center divider', 'd-flex justify-content-lg-center justify-content-md-end divider', 'd-flex justify-content-lg-center');
                            $class_count = count($classes);
                            foreach ($settings['matrik_counter_genaral_counter_list'] as $index => $data) :
                                $class = $classes[$index % $class_count];
                            ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 <?php echo esc_attr($class); ?>">
                                    <div class="single-countdown">
                                        <div class="number">
                                            <?php if (!empty($data['matrik_counter_genaral_counter_number'])) : ?>
                                                <h2 class="counter"><?php echo esc_html($data['matrik_counter_genaral_counter_number']); ?></h2>
                                            <?php endif; ?>
                                            <?php if (!empty($data['matrik_counter_genaral_counter_sign'])) : ?>
                                                <span><?php echo esc_html($data['matrik_counter_genaral_counter_sign']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($data['matrik_counter_genaral_counter_title'])) : ?>
                                            <span><?php echo esc_html($data['matrik_counter_genaral_counter_title']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_counter_genaral_style_selection'] == 'style_two') : ?>
            <div class="home4-counter-section">
                <div class="container">
                    <div class="counter-wrap">
                        <div class="row gy-sm-5 gy-4">
                            <?php $classes = array('justify-content-center divider', 'justify-content-center divider', 'justify-content-lg-center justify-content-md-end justify-content-center divider', 'justify-content-center');
                            $class_count = count($classes);
                            foreach ($settings['matrik_counter_genaral_counter_list'] as $index => $data) :
                                $class = $classes[$index % $class_count];
                            ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 d-flex <?php echo esc_attr($class); ?>">
                                    <div class="single-countdown">
                                        <div class="number">
                                            <?php if (!empty($data['matrik_counter_genaral_counter_number'])) : ?>
                                                <h2 class="counter"><?php echo esc_html($data['matrik_counter_genaral_counter_number']); ?></h2>
                                            <?php endif; ?>
                                            <?php if (!empty($data['matrik_counter_genaral_counter_sign'])) : ?>
                                                <span><?php echo esc_html($data['matrik_counter_genaral_counter_sign']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($data['matrik_counter_genaral_counter_title'])) : ?>
                                            <span><?php echo esc_html($data['matrik_counter_genaral_counter_title']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Counter_Widget());
