<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Partner_Logo_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_partner_logo';
    }

    public function get_title()
    {
        return esc_html__('EG Partner Logo', 'matrik-core');
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
            'matrik_partner_logo_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_partner_logo_genaral_style_selection',
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

        $this->add_control(
            'matrik_partner_logo_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('A partner, Not A Vendor:', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_partner_logo_genaral_logo',
            [
                'label' => esc_html__('Logo', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater->add_control(
            'matrik_partner_logo_genaral_logo_url',
            [
                'label' => esc_html__('Logo URL', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'matrik-core'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,

            ]
        );

        $this->add_control(
            'matrik_partner_logo_genaral_logo_list',
            [
                'label' => esc_html__('Logo List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'matrik_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'matrik_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'matrik_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],

                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_partner_logo_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_partner_logo_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_partner_logo_style_genaral_global',
            [
                'label'     => esc_html__('Global Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_partner_logo_style_genaral_global_section_bg_color',
            [
                'label'     => esc_html__('Section Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section.two' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_partner_logo_style_genaral_title',
            [
                'label'     => esc_html__('Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_partner_logo_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .logo-section.two .logo-wrap .logo-title h6',

            ]
        );

        $this->add_control(
            'matrik_partner_logo_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section.two .logo-wrap .logo-title h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_partner_logo_style_genaral_title_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section.two .logo-wrap .logo-title' => 'border-right: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_partner_logo_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_partner_logo_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_partner_logo_style_two_genaral_global',
            [
                'label'     => esc_html__('Global Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_partner_logo_style_two_genaral_bg_color',
            [
                'label'     => esc_html__('Section Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section.three' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_partner_logo_style_two_genaral_title',
            [
                'label'     => esc_html__('Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_partner_logo_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .logo-section.three .logo-wrap .logo-title h6',

            ]
        );

        $this->add_control(
            'matrik_partner_logo_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section.three .logo-wrap .logo-title h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_partner_logo_style_two_genaral_title_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section.three .logo-wrap .logo-title' => 'border-right: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['matrik_partner_logo_genaral_style_selection'] == 'style_one') : ?>
            <div class="logo-section two">
                <div class="container-fluid">
                    <div class="logo-wrap">
                        <?php if (!empty($settings['matrik_partner_logo_genaral_title'])) : ?>
                            <div class="logo-title">
                                <h6><?php echo esc_html($settings['matrik_partner_logo_genaral_title']); ?></h6>
                            </div>
                        <?php endif; ?>
                        <div class="marquee">
                            <div class="marquee__group">
                                <?php foreach ($settings['matrik_partner_logo_genaral_logo_list'] as $data) : ?>
                                    <a href="<?php echo esc_url($data['matrik_partner_logo_genaral_logo_url']['url']); ?>"><img src="<?php echo esc_url($data['matrik_partner_logo_genaral_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>"></a>
                                <?php endforeach; ?>

                            </div>
                            <div aria-hidden="true" class="marquee__group">
                                <?php foreach ($settings['matrik_partner_logo_genaral_logo_list'] as $data) : ?>
                                    <a href="<?php echo esc_url($data['matrik_partner_logo_genaral_logo_url']['url']); ?>"><img src="<?php echo esc_url($data['matrik_partner_logo_genaral_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>"></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_partner_logo_genaral_style_selection'] == 'style_two') : ?>
            <div class="logo-section three">
                <div class="container-fluid">
                    <div class="logo-wrap">
                        <?php if (!empty($settings['matrik_partner_logo_genaral_title'])) : ?>
                            <div class="logo-title">
                                <h6><?php echo esc_html($settings['matrik_partner_logo_genaral_title']); ?></h6>
                            </div>
                        <?php endif; ?>
                        <div class="marquee">
                            <div class="marquee__group">
                                <?php foreach ($settings['matrik_partner_logo_genaral_logo_list'] as $data) : ?>
                                    <a href="<?php echo esc_url($data['matrik_partner_logo_genaral_logo_url']['url']); ?>"><img src="<?php echo esc_url($data['matrik_partner_logo_genaral_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>"></a>
                                <?php endforeach; ?>

                            </div>
                            <div aria-hidden="true" class="marquee__group">
                                <?php foreach ($settings['matrik_partner_logo_genaral_logo_list'] as $data) : ?>
                                    <a href="<?php echo esc_url($data['matrik_partner_logo_genaral_logo_url']['url']); ?>"><img src="<?php echo esc_url($data['matrik_partner_logo_genaral_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>"></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Partner_Logo_Widget());
