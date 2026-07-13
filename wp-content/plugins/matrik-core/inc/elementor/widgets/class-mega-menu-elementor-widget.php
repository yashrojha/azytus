<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Mega_Menu_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_mega_menu';
    }

    public function get_title()
    {
        return esc_html__('EG Mega Menu', 'matrik-core');
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
            'matrik_mega_menu_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_mega_menu_genaral_image',
            [
                'label' => esc_html__('Menu Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );


        $repeater->add_control(
            'matrik_mega_menu_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('get to know <span>our faq’s</span>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_mega_menu_genaral_title_link',
            [
                'label'   => esc_html__('Menu URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
            ]
        );

        $this->add_control(
            'matrik_mega_menu_genaral_menu_list',
            [
                'label' => esc_html__('Menu List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_mega_menu_genaral_title' => wp_kses('Factory', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_mega_menu_genaral_title' => wp_kses('Industry', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_mega_menu_genaral_title' => wp_kses('Oil & Gas', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_mega_menu_genaral_title' => wp_kses('Metal Industry', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_mega_menu_genaral_title' => wp_kses('Textile', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_mega_menu_genaral_title' => wp_kses('Engineering', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_mega_menu_genaral_title' => wp_kses('Furniture <span>Coming Soon</span>', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_mega_menu_genaral_title' => wp_kses('Renewable Energy <span>Coming Soon</span>', wp_kses_allowed_html('post')),

                    ],

                ],
                'title_field' => '{{{ matrik_mega_menu_genaral_title }}}',
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_mega_menu_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_mega_menu_style_genaral_title',
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
                'name'     => 'matrik_mega_menu_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} header.style-1 .main-menu > ul > li .mega-menu .single-menu-item h5 a',

            ]
        );

        $this->add_control(
            'matrik_mega_menu_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} header.style-1 .main-menu > ul > li .mega-menu .single-menu-item h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_mega_menu_style_genaral_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} header.style-1.engineering-header .main-menu > ul > li .mega-menu .single-menu-item:hover h5 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="mega-menu-wrap">
            <div class="container">
                <div class="row gy-lg-5">
                    <?php foreach ($settings['matrik_mega_menu_genaral_menu_list'] as $mega_menu_data) : ?>
                        <div class="col-lg-3">
                            <div class="single-menu-item">
                                <?php if (!empty($mega_menu_data['matrik_mega_menu_genaral_image']['url'])) : ?>
                                    <a href="<?php echo esc_url($mega_menu_data['matrik_mega_menu_genaral_title_link']['url']); ?>" class="home-img">
                                        <img src="<?php echo esc_url($mega_menu_data['matrik_mega_menu_genaral_image']['url']); ?>" alt="<?php echo esc_attr__('mega-menu-image', 'matrik-core'); ?>">
                                    </a>
                                <?php endif; ?>
                                <?php if (!empty($mega_menu_data['matrik_mega_menu_genaral_title'])) : ?>
                                    <h5><a href="<?php echo esc_url($mega_menu_data['matrik_mega_menu_genaral_title_link']['url']); ?>"><?php echo wp_kses($mega_menu_data['matrik_mega_menu_genaral_title'], wp_kses_allowed_html('post'))  ?></a></h5>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Mega_Menu_Widget());
