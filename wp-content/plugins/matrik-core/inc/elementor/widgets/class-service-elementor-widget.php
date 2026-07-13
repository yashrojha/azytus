<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Service_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_service';
    }

    public function get_title()
    {
        return esc_html__('EG Service', 'matrik-core');
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
            'matrik_service_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_service_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'matrik-core'),
                    'style_two' => esc_html__('Style Two', 'matrik-core'),
                    'style_three' => esc_html__('Style Three', 'matrik-core'),
                    'style_four' => esc_html__('Style Four', 'matrik-core'),
                    'style_five' => esc_html__('Style Five', 'matrik-core'),
                    'style_six' => esc_html__('Style Six', 'matrik-core'),

                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'matrik_service_genaral_header_switcher',
            [
                'label' => esc_html__("Show Header Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_genaral_background_image',
            [
                'label' => esc_html__('Background Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_one', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_genaral_header_style',
            [
                'label'   => esc_html__('Header Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'matrik-core'),
                    'style_two' => esc_html__('Style Two', 'matrik-core'),
                ],
                'default' => 'style_one',
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_genaral_header_area',
            [
                'label'     => esc_html__('Header Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_genaral_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Our Factory Services', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_service_genaral_header_switcher' => ['yes'],
                    'matrik_service_genaral_style_selection' => ['style_one', 'style_two', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Innovative Factory Solutions', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_service_genaral_header_switcher' => ['yes'],
                    'matrik_service_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_genaral_desc',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus conguese.Fusen fringilla est libero sed tempus urna feugiat eu. Curabitur eu feugiat ligu Suspendisse.', 'matrik-core'),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_genaral_header_button',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Services', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_service_genaral_header_switcher' => ['yes'],
                    'matrik_service_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_genaral_header_button_url',
            [
                'label'   => esc_html__('Button URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
                'condition' => [
                    'matrik_service_genaral_header_switcher' => ['yes'],
                    'matrik_service_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_five', 'style_six'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_service_genaral_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'matrik_service_genaral_contenet_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Metal Work', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_genaral_contenet_title_url',
            [
                'label'   => esc_html__('Title URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_service_genaral_contenet_title' => wp_kses('Metal Work', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_genaral_contenet_title' => wp_kses('Robotic Assembly', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_genaral_contenet_title' => wp_kses('Product Packaging', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_genaral_contenet_title' => wp_kses('Fabrication', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_genaral_contenet_title' => wp_kses('Supply Chain', wp_kses_allowed_html('post')),
                    ],

                ],


                'title_field' => '{{{ matrik_service_genaral_contenet_title }}}',
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $ss_repeater = new \Elementor\Repeater();

        $ss_repeater->add_control(
            'matrik_service_genaral_banner_six_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $ss_repeater->add_control(
            'matrik_service_genaral_baner_six_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Precision Engineering Solution', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $ss_repeater->add_control(
            'matrik_service_genaral_baner_six_content_url',
            [
                'label'   => esc_html__('Title URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );

        $ss_repeater->add_control(
            'matrik_service_genaral_baner_six_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View details', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $ss_repeater->add_control(
            'matrik_service_genaral_baner_six_button_text_url',
            [
                'label'   => esc_html__('Button URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_feature_genaral_baner_six_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $ss_repeater->get_controls(),
                'default' => [
                    [
                        'matrik_service_genaral_baner_six_content_title' => wp_kses('Workforce Training &amp; Control', wp_kses_allowed_html('post')),
                        'matrik_service_genaral_contenet_button_text' => esc_html('View details'),
                    ],
                    [
                        'matrik_service_genaral_baner_six_content_title' => wp_kses('Precision Engineering Solution', wp_kses_allowed_html('post')),
                        'matrik_service_genaral_contenet_button_text' => esc_html('View details'),
                    ],
                    [
                        'matrik_service_genaral_baner_six_content_title' => wp_kses('Bespoke Engineering Solutions', wp_kses_allowed_html('post')),
                        'matrik_service_genaral_contenet_button_text' => esc_html('View details'),
                    ],
                    [
                        'matrik_service_genaral_baner_six_content_title' => wp_kses('Custom Engineering Support', wp_kses_allowed_html('post')),
                        'matrik_service_genaral_contenet_button_text' => esc_html('View details'),
                    ],
                    [
                        'matrik_service_genaral_baner_six_content_title' => wp_kses('Precision Process Services', wp_kses_allowed_html('post')),
                        'matrik_service_genaral_contenet_button_text' => esc_html('View details'),
                    ],
                    [
                        'matrik_service_genaral_baner_six_content_title' => wp_kses('Smart Engineering Support', wp_kses_allowed_html('post')),
                        'matrik_service_genaral_contenet_button_text' => esc_html('View details'),
                    ],
                    [
                        'matrik_service_genaral_baner_six_content_title' => wp_kses('Custom Tech Solutions', wp_kses_allowed_html('post')),
                        'matrik_service_genaral_contenet_button_text' => esc_html('View details'),
                    ],

                ],


                'title_field' => '{{{ matrik_service_genaral_baner_six_content_title }}}',
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        //style five service list

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_service_five_genaral_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'matrik_service_five_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Textile Selection', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_five_genaral_content_description',
            [
                'label'       => esc_html__('Content Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('These services cover a broad range of textile, helping you choose the right materials that match your design goals.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_five_genaral_content_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View Details', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_five_genaral_content_button_text_url',
            [
                'label'   => esc_html__('Button URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_feature_five_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_service_five_genaral_content_title' => wp_kses('Textile Selection', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_five_genaral_content_title' => wp_kses('Fabric Embossing', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_five_genaral_content_title' => wp_kses('Garment Manufacturing', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_five_genaral_content_title' => wp_kses('Dyeing and Printing', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_five_genaral_content_title' => wp_kses('Textile Consultancy', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_five_genaral_content_title' => wp_kses('Stock Management', wp_kses_allowed_html('post')),
                    ],

                ],


                'title_field' => '{{{ matrik_service_five_genaral_content_title }}}',
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        //style two pagination

        $this->add_control(
            'matrik_service_style_two_genaral_show_pagination',
            [
                'label' => esc_html__("Show Pagination?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        //style two repeater

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_service_style_two_genaral_thumb_image',
            [
                'label' => esc_html__('Thumbnail Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'matrik_service_style_two_genaral_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Logistics <br> Management', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_style_two_genaral_contenet_description',
            [
                'label'       => esc_html__('Content Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('We provide end-to-end product development services, from ideation to launch.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_style_two_genaral_content_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View Details', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_style_two_genaral_content_button_url',
            [
                'label'   => esc_html__('Button URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_service__style_two_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_service_style_two_genaral_content_title' => wp_kses('Workforce Training & Control', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_service_style_two_genaral_content_title' => wp_kses('Metal Work &amp; <br> Compliance Train', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_style_two_genaral_content_title' => wp_kses('Solar Panel Wind Installation', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_style_two_genaral_content_title' => wp_kses('Exploration and <br> Drilling', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_style_two_genaral_content_title' => wp_kses('Warehousing and Distribution', wp_kses_allowed_html('post')),
                    ],

                ],

                'title_field' => '{{{ matrik_service_style_two_genaral_content_title }}}',
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_two'],
                ]
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_service_three_genaral_content_service_icon',
            [
                'label' => esc_html__('Service Icon (SVG)', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image', 'svg'],
            ]
        );

        $repeater->add_control(
            'matrik_service_three_genaral_content_coun_number',
            [
                'label'       => esc_html__('Counter Number', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('01', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_three_genaral_content_service_title',
            [
                'label'       => esc_html__('Service Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Refinery Maintenance & Upgrades', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_three_genaral_content_service_image',
            [
                'label' => esc_html__('Service Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'matrik_service_three_genaral_content_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View Details', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_three_genaral_content_button_text_url',
            [
                'label'   => esc_html__('Button URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_service_three_genaral_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_service_three_genaral_content_coun_number' => wp_kses('01', wp_kses_allowed_html('post')),


                    ],
                    [
                        'matrik_service_three_genaral_content_coun_number' => wp_kses('02', wp_kses_allowed_html('post')),


                    ],
                    [
                        'matrik_service_three_genaral_content_coun_number' => wp_kses('03', wp_kses_allowed_html('post')),


                    ],
                    [
                        'matrik_service_three_genaral_content_coun_number' => wp_kses('04', wp_kses_allowed_html('post')),


                    ],
                    [
                        'matrik_service_three_genaral_content_coun_number' => wp_kses('05', wp_kses_allowed_html('post')),


                    ],

                ],
                'title_field' => '{{{ matrik_service_three_genaral_content_coun_number }}}',
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_service_four_genaral_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
            ]
        );

        $repeater->add_control(
            'matrik_service_four_genaral_contenet_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Metal Work', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_four_genaral_contenet_title_url',
            [
                'label'   => esc_html__('Title URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_four_genaral_contenet_tags',
            [
                'label'       => esc_html__('Content Tags', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('<li><a href="/service">Metal</a></li>
 <li><a href="/service">Chemical</a></li>
<li><a href="/service">Automotive</a></li>', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_four_genaral_contenet_description',
            [
                'label'       => esc_html__('Content Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus congi. Fusen fringilla est libero, sed tempus urna feugiat eu. Curabit eu feugiat ligu Suspendisse nectoraba.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_four_genaral_content_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View Details', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_service_four_genaral_content_button_text_url',
            [
                'label'   => esc_html__('Button URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_service_four_genaral_contenet_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_service_four_genaral_contenet_title' => wp_kses('Workforce Training & Control', wp_kses_allowed_html('post')),


                    ],
                    [
                        'matrik_service_four_genaral_contenet_title' => wp_kses('Metal Casting and Foundry', wp_kses_allowed_html('post')),


                    ],
                    [
                        'matrik_service_four_genaral_contenet_title' => wp_kses('Metal Fabrication and Welding Assen', wp_kses_allowed_html('post')),


                    ],
                ],
                'title_field' => '{{{ matrik_service_four_genaral_contenet_title }}}',
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_four_genaral_content_bottom_button_text',
            [
                'label'       => esc_html__('Bottom Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('View All Services', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_four_genaral_content_bottom_button_text_url',
            [
                'label'   => esc_html__('Button URL/Link', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_service_style_one_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_subtitle',
            [
                'label'     => esc_html__('Subtitle', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_one_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_title',
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
                'name'     => 'matrik_service_style_one_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_header_button',
            [
                'label'     => esc_html__('Header Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'matrik_service_style_one_genaral_header_button_tabs'
        );

        $this->start_controls_tab(
            'matrik_service_style_one_genaral_header_button_tabs_normal_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'matrik-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_one_genaral_header_button_tabs_normal_tab_typ',
                'selector' => '{{WRAPPER}} .primary-btn1.transparent',

            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_header_button_tabs_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_header_button_tabs_normal_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1 .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_header_button_tabs_normal_tab_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'border: 1px solid {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_header_button_tabs_normal_tab_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1.transparent' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_service_style_one_genaral_header_button_tabs_normal_tab_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'matrik-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_service_style_one_genaral_header_button_tabs_normal_tab_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'matrik-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn1.transparent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'matrik_service_style_one_genaral_header_button_tabs_hover_tab',
            [
                'label' => esc_html__('Hover', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_header_button_tabs_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1.transparent:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_header_button_tabs_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn1.transparent:hover .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_header_button_tabs_hover_tab_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent:hover' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_header_button_tabs_hover_tab_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn1.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'matrik_service_style_one_genaral_service_title',
            [
                'label'     => esc_html__('Service Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_one_genaral_service_title_typ',
                'selector' => '{{WRAPPER}} .home1-service-section .service-wrap .service-list li a',

            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_service_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-service-section .service-wrap .service-list li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_service_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-service-section .service-wrap .service-list li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_service_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-service-section .service-wrap .service-list li a svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_one_genaral_service_title_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-service-section .service-wrap .service-list li a:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start three

        $this->start_controls_section(
            'matrik_service_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_section',
            [
                'label'     => esc_html__('Service Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_title',
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
                'name'     => 'matrik_service_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.white h2',

            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_button',
            [
                'label'     => esc_html__('Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_three_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.white-bg',

            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.white-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.white-bg:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.white-bg .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.white-bg:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_button_bg_olor',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.white-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_button_hover_bg_olor',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.white-bg::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_counter_number',
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
                'name'     => 'matrik_service_style_three_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .number-and-icon-area span',

            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_counter_number_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .number-and-icon-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_icon',
            [
                'label'     => esc_html__('Service Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_three_genaral_service_icon_typ',
                'selector' => '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .number-and-icon-area .icon svg',

            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .number-and-icon-area .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_title',
            [
                'label'     => esc_html__('Service Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_three_genaral_service_title_typ',
                'selector' => '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .content p',

            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button',
            [
                'label'     => esc_html__('Service Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_three_genaral_service_button_typ',
                'selector' => '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .details-btn span',

            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .details-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services:hover .details-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_service_style_three_genaral_service_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .details-btn span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .details-btn span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services:hover .details-btn span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button_icon',
            [
                'label'     => esc_html__('Service Button Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_three_genaral_service_button_icon_typ',
                'selector' => '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .details-btn .icon svg',

            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .details-btn .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services:hover .details-btn .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button_icon_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .details-btn .icon' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services .details-btn .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_three_genaral_service_button_icon_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-service-section .sevices-wrap .single-services:hover .details-btn .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_service_style_four_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_section_global',
            [
                'label'     => esc_html__('Global Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_section_global_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_section_global_card',
            [
                'label'     => esc_html__('Card Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_section_global_card_bg_color',
            [
                'label'     => esc_html__('Card Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_section_global_card_hover_bg_color',
            [
                'label'     => esc_html__('Hover Card Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_title',
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
                'name'     => 'matrik_service_style_four_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.white h2',

            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_tags',
            [
                'label'     => esc_html__('Service Tags', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_four_genaral_service_tags_typ',
                'selector' => '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-img-and-title-area .title-area ul li a',

            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_tags_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-img-and-title-area .title-area ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_hover_tags_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover .service-img-and-title-area .title-area ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_tags_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-img-and-title-area .title-area ul li a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_tags_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover .service-img-and-title-area .title-area ul li a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_tags_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-img-and-title-area .title-area ul li a' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_tags_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover .service-img-and-title-area .title-area ul li a' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_title',
            [
                'label'     => esc_html__('Service Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_four_genaral_service_title_typ',
                'selector' => '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-img-and-title-area .title-area h2 a',

            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-img-and-title-area .title-area h2 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover .service-img-and-title-area .title-area h2 a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_service_style_four_genaral_service_description',
            [
                'label'     => esc_html__('Service Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_four_genaral_service_description_typ',
                'selector' => '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-content p',

            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_description_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover .service-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_button',
            [
                'label'     => esc_html__('Service Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_four_genaral_service_button_typ',
                'selector' => '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-content .details-btn span',

            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-content .details-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover .service-content .details-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_service_style_four_genaral_service_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-content .details-btn span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_button_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover .service-content .details-btn span' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover .service-content .details-btn .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_button_icon',
            [
                'label'     => esc_html__('Service Button Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_four_genaral_service_button_icon_typ',
                'selector' => '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-content .details-btn .icon svg',

            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_button_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-content .details-btn .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_button_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover .service-content .details-btn .icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_button_icon_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service .service-content .details-btn .icon' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_service_button_icon_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-service-section .service-wrapper .single-service:hover .service-content .details-btn .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_bottom_button',
            [
                'label'     => esc_html__('Bottom Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_four_genaral_bottom_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn2.two.white',

            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_bottom_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_bottom_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_bottom_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_four_genaral_bottom_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2.two.white:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_service_style_five_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_subtitle',
            [
                'label'     => esc_html__('Subtitle', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_five_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.four span',

            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_title',
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
                'name'     => 'matrik_service_style_five_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.four h2',

            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button',
            [
                'label'     => esc_html__('Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'matrik_service_style_five_genaral_button_tabs'
        );

        $this->start_controls_tab(
            'matrik_service_style_five_genaral_button_tabs_normal_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'matrik-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_five_genaral_button_tabs_normal_tab_typ',
                'selector' => '{{WRAPPER}} .primary-btn5',

            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button_tabs_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button_tabs_normal_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button_tabs_normal_tab_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn5' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_service_style_five_genaral_button_tabs_normal_tab_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'matrik-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_service_style_five_genaral_button_tabs_normal_tab_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'matrik-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'matrik_service_style_five_genaral_button_tabs_hover_tab',
            [
                'label' => esc_html__('Hover', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button_tabs_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button_tabs_hover_tab_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'matrik_service_style_five_genaral_service_title',
            [
                'label'     => esc_html__('Service Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_five_genaral_service_title_typ',
                'selector' => '{{WRAPPER}} .home5-service-section .service-list li',

            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_service_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-service-section .service-list li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_service_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-service-section .service-list li:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_service_title_active_color',
            [
                'label'     => esc_html__('Active Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-service-section .service-list li.active' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_service_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-service-section .service-list li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_service_title_bg_active_color',
            [
                'label'     => esc_html__('Background Color (Active)', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-service-section .service-list li.active' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_service_title_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-service-section .service-list li:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_service_description',
            [
                'label'     => esc_html__('Service Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_five_genaral_service_description_typ',
                'selector' => '{{WRAPPER}} .home5-service-section .service-card-wrap li .service-card2 .service-content p',

            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_service_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-service-section .service-card-wrap li .service-card2 .service-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_service_content_section',
            [
                'label'     => esc_html__('Service Content Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_service_content_section_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-service-section .service-card-wrap li .service-card2 .service-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_service_style_five_genaral_service_button',
            [
                'label'     => esc_html__('Service Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'matrik_service_style_five_genaral_button_service_tabs'
        );

        $this->start_controls_tab(
            'matrik_service_style_five_genaral_button_tabs_normal_service_tab',
            [
                'label' => esc_html__(
                    'Normal',
                    'matrik-core'
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_five_genaral_button_tabs_normal_service_tab_typ',
                'selector' => '{{WRAPPER}} .primary-btn5',

            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button_tabs_normal_service_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button_tabs_normal_service_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 .arrow' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button_tabs_service_normal_tab_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .primary-btn5' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_service_style_five_genaral_button_tabs_service_normal_tab_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'matrik-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_service_style_five_genaral_button_tabs_service_normal_tab_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'matrik-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .primary-btn5' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'matrik_service_style_five_genaral_button_tabs_hover_service_tab',
            [
                'label' => esc_html__('Hover', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button_tabs_hover_tab_service_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5:hover' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_five_genaral_button_tabs_hover_tab_bg_service_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn5 > span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_service_style_six_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_subtitle',
            [
                'label'     => esc_html__('Subtitle', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_six_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.five > span',

            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_title',
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
                'name'     => 'matrik_service_style_six_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.white h2',

            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_desc',
            [
                'label'     => esc_html__('Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_six_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .section-title.five p',

            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_slider_card',
            [
                'label'     => esc_html__('Slider Content', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_six_slider_title_typ',
                'selector' => '{{WRAPPER}} .service-card3 .service-content h4 a',

            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_title_color',
            [
                'label'     => esc_html__('Title Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3 .service-content h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_title_hover_color',
            [
                'label'     => esc_html__('Hover Title Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3 .service-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Button Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_six_slider_btn_typ',
                'selector' => '{{WRAPPER}} .service-card3 .service-content .details-btn',

            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_btn_color',
            [
                'label'     => esc_html__('Button Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3 .service-content .details-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_btn_hover_color',
            [
                'label'     => esc_html__('Hover Button Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3 .service-content h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_btn_icon_color',
            [
                'label'     => esc_html__('Button Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3 .service-content .details-btn .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_btn_icon_hover_color',
            [
                'label'     => esc_html__('Button Icon Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3 .service-content .details-btn:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_pagination_bg_color',
            [
                'label'     => esc_html__('Slider Pagination BG Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.four.white .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_pagination_border_color',
            [
                'label'     => esc_html__('Slider Pagination Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.four.white .slider-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Slider Pagination Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.four.white .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_pagination_icon_color',
            [
                'label'     => esc_html__('Slider Pagination Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.four.white .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_slider_pagination_hover_icon_color',
            [
                'label'     => esc_html__('Slider Pagination Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.four.white .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_section_button',
            [
                'label'     => esc_html__('Section Bottom Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_six_section_btn_typ',
                'selector' => '{{WRAPPER}} .primary-btn6.white-bg',

            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_section_btn_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6.white-bg' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_section_btn_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6.white-bg svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_section_btn_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6.white-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_genaral_section_btn_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn6:hover::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_six_section_slider_item_border',
            [
                'label'     => esc_html__('Slider Item Border', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_service_style_six_section_slider_item_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card3' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_service_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_global_section',
            [
                'label'     => esc_html__('Global Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_global_section_card_arrow_icon_color',
            [
                'label'     => esc_html__('Card Arrow Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card .arrow-vector' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_global_section_card_border_color',
            [
                'label'     => esc_html__('Card Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_global_section_card_bg_color',
            [
                'label'     => esc_html__('Card Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_subtitle',
            [
                'label'     => esc_html__('Subtitle', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_two_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.two span',

            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_title',
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
                'name'     => 'matrik_service_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_header_button',
            [
                'label'     => esc_html__('Header Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_two_genaral_header_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.transparent',

            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_header_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_header_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_header_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3 .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_header_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_header_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_header_button_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent:hover' => 'border-color:  {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_header_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_header_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_title',
            [
                'label'     => esc_html__('Service Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_two_genaral_service_title_typ',
                'selector' => '{{WRAPPER}} .service-card h4 a',

            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card h4 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card h4 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_description',
            [
                'label'     => esc_html__('Service Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_two_genaral_service_description_typ',
                'selector' => '{{WRAPPER}} .service-card p',

            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_button',
            [
                'label'     => esc_html__('Service Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_two_genaral_service_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3.transparent',

            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3 .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3.transparent::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_pagination',
            [
                'label'     => esc_html__('Service Pagination', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_style_two_genaral_service_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp .slider-btn i',

            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_style_two_genaral_service_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if (is_admin()) : ?>
            <script>
                jQuery(".service-list li").on("mouseenter", function(e) {
                    // // Get the index of the hovered content list item
                    var index = jQuery(this).index();
                    // Remove the 'active' class from all image list items
                    jQuery(".service-img-list li").removeClass("active");
                    // Add the 'active' class to the corresponding image list item
                    jQuery(".service-img-list li:eq(" + index + ")").addClass("active");
                });
                var swiper = new Swiper(".home2-service-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".service-slider-next",
                        prevEl: ".service-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 2,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 3,
                        },
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 4,
                        },
                    },
                });

                // Initial setup and on resize
                setupProcessImageInteraction();
                jQuery(window).on("resize", setupProcessImageInteraction);

                // Hover effect for service-list
                jQuery(".service-list li").on("mouseenter", function() {
                    var index = jQuery(this).index();

                    // Add active class to the corresponding image
                    jQuery(".service-card-wrap li").removeClass("show");
                    jQuery(".service-card-wrap li").eq(index).addClass("show");

                    // Manage .prev class
                    jQuery(".service-list li").removeClass("prev");
                    if (index > 0) {
                        jQuery(".service-list li")
                            .eq(index - 1)
                            .addClass("prev");
                    }
                });

                jQuery(".service-list li").on("mouseleave", function() {
                    // Remove active class from all images when mouse leaves
                    jQuery(".service-card-wrap li").removeClass("show");
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['matrik_service_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-service-section" <?php if (!empty($settings['matrik_service_genaral_background_image']['url'])) : ?>style="background-image: url(<?php echo esc_url($settings['matrik_service_genaral_background_image']['url']); ?>), linear-gradient(180deg, #D8E7EF 0%, #D8E7EF 100%)" <?php endif; ?>>
                <div class="container">
                    <?php if ($settings['matrik_service_genaral_header_switcher'] == 'yes') : ?>
                        <div class="row g-4 align-items-center justify-content-between mb-70">
                            <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="section-title">
                                    <?php if (!empty($settings['matrik_service_genaral_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_service_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_service_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_service_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if (!empty($settings['matrik_service_genaral_header_button'])) : ?>
                                <div class="col-lg-3 d-flex justify-content-lg-end btn_wrapper">
                                    <a class="primary-btn1 transparent" href="<?php echo esc_url($settings['matrik_service_genaral_header_button_url']['url']); ?>">
                                        <span><?php echo esc_html($settings['matrik_service_genaral_header_button']); ?>
                                        </span>
                                        <span><?php echo esc_html($settings['matrik_service_genaral_header_button']); ?>
                                        </span>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="service-wrap">
                        <ul class="service-img-list">
                            <?php foreach ($settings['matrik_feature_genaral_content_list'] as $data) : ?>
                                <?php if (!empty($data['matrik_service_genaral_banner_image']['url'])) : ?>
                                    <li class="active">
                                        <div class="service-img">
                                            <img src="<?php echo esc_url($data['matrik_service_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('service-image', 'matrik-core'); ?>">
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <ul class="service-list">
                            <?php foreach ($settings['matrik_feature_genaral_content_list'] as $data) : ?>
                                <li>
                                    <?php if (!empty($data['matrik_service_genaral_contenet_title'])) : ?>
                                        <a href="<?php echo esc_url($data['matrik_service_genaral_contenet_title_url']['url']); ?>">
                                            <?php echo esc_html($data['matrik_service_genaral_contenet_title']); ?>
                                            <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path d="M0.0742581 0H15.0001V2.79412L2.82181 15L0 12.2059L8.3169 3.97059L0.0742581 4.04412V0Z" />
                                                    <path d="M15.0002 14.9999V5.58813L10.9902 9.55872V14.9999H15.0002Z" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_service_genaral_style_selection'] == 'style_two') : ?>
            <div class="home2-service-section">
                <div class="container">
                    <div class="row g-4 align-items-center justify-content-between mb-70">
                        <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="section-title two">
                                <?php if (!empty($settings['matrik_service_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_service_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_service_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_service_genaral_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_service_genaral_header_button'])) : ?>
                            <div class="col-lg-3 d-flex justify-content-lg-end btn_wrapper">
                                <a class="primary-btn3 transparent" href="<?php echo esc_url($settings['matrik_service_genaral_header_button_url']['url']); ?>">
                                    <span><?php echo esc_html($settings['matrik_service_genaral_header_button']); ?>
                                    </span>
                                    <span><?php echo esc_html($settings['matrik_service_genaral_header_button']); ?>
                                    </span>
                                    <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                            <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="home2-service-slider-area">
                        <div class="row mb-50">
                            <div class="col-lg-12">
                                <div class="swiper home2-service-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['matrik_service__style_two_genaral_content_list'] as $data) : ?>
                                            <div class="swiper-slide">
                                                <div class="service-card">
                                                    <h4><a href="<?php echo esc_url($data['matrik_service_style_two_genaral_content_button_url']['url']); ?>"><?php echo wp_kses($data['matrik_service_style_two_genaral_content_title'], wp_kses_allowed_html('post'))  ?></a></h4>
                                                    <?php if (!empty($data['matrik_service_style_two_genaral_thumb_image']['url'])) : ?>
                                                        <a href="<?php echo esc_url($data['matrik_service_style_two_genaral_content_button_url']['url']); ?>" class="service-img">
                                                            <img src="<?php echo esc_url($data['matrik_service_style_two_genaral_thumb_image']['url']); ?>" alt="<?php echo esc_attr__('thumbnail-image', 'matrik-core'); ?>">
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['matrik_service_style_two_genaral_contenet_description'])) : ?>
                                                        <p><?php echo esc_html($data['matrik_service_style_two_genaral_contenet_description']); ?></p>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['matrik_service_style_two_genaral_content_button_text'])) : ?>
                                                        <a class="primary-btn3 transparent" href="<?php echo esc_url($data['matrik_service_style_two_genaral_content_button_url']['url']); ?>">
                                                            <span><?php echo esc_html($data['matrik_service_style_two_genaral_content_button_text']); ?>
                                                            </span>
                                                            <span><?php echo esc_html($data['matrik_service_style_two_genaral_content_button_text']); ?>
                                                            </span>
                                                            <svg class="arrow" width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                                                <g>
                                                                    <path d="M0.0836709 0H16.9997V3.16667L3.19756 17L-0.000488281 13.8333L9.42534 4.5L0.0836709 4.58333V0Z" />
                                                                    <path d="M16.9997 17V6.33337L12.4551 10.8334V17H16.9997Z" />
                                                                </g>
                                                            </svg>
                                                        </a>
                                                    <?php endif; ?>
                                                    <svg class="arrow-vector" width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.247529 0H50.0008V9.31379L9.40609 50.0004L0 40.6866L27.7232 13.2354L0.247529 13.4805V0Z" />
                                                        <path d="M50.0013 50.0006V18.6278L36.6348 31.8632V50.0006H50.0013Z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($settings['matrik_service_style_two_genaral_show_pagination'] == 'yes') : ?>
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="slider-btn-grp two">
                                        <div class="slider-btn service-slider-prev">
                                            <i class="bi bi-arrow-left"></i>
                                        </div>
                                        <div class="slider-btn service-slider-next">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_service_genaral_style_selection'] == 'style_three') : ?>
            <div class="home3-service-section">
                <div class="container">
                    <?php if ($settings['matrik_service_genaral_header_style'] == 'style_one') : ?>
                        <?php if ($settings['matrik_service_genaral_header_switcher'] == 'yes') : ?>
                            <div class="row gy-md-5 gy-4 align-items-center justify-content-between mb-70">
                                <?php if (!empty($settings['matrik_service_genaral_title'])) : ?>
                                    <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <div class="section-title two white">
                                            <h2><?php echo esc_html($settings['matrik_service_genaral_title']); ?></h2>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_service_genaral_header_button'])) : ?>
                                    <div class="col-lg-3 d-flex justify-content-lg-end btn_wrapper">
                                        <a class="primary-btn3 white-bg" href="<?php echo esc_url($settings['matrik_service_genaral_header_button_url']['url']); ?>">
                                            <span><?php echo esc_html($settings['matrik_service_genaral_header_button']); ?>
                                            </span>
                                            <span><?php echo esc_html($settings['matrik_service_genaral_header_button']); ?>
                                            </span>
                                            <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                                    <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php elseif ($settings['matrik_service_genaral_header_style'] == 'style_two') : ?>
                        <?php if (!empty($settings['matrik_service_genaral_title'])) : ?>
                            <div class="row justify-content-center mb-70">
                                <div class="col-lg-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms;">
                                    <div class="section-title two white text-center">
                                        <h2><?php echo esc_html($settings['matrik_service_genaral_title']); ?></h2>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <ul class="sevices-wrap">
                        <?php foreach ($settings['matrik_service_three_genaral_content_list'] as $data) : ?>
                            <li class="single-services wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="number-and-icon-area">
                                    <?php if (!empty($data['matrik_service_three_genaral_content_coun_number'])) : ?>
                                        <span><?php echo esc_html($data['matrik_service_three_genaral_content_coun_number']); ?></span>
                                    <?php endif; ?>
                                    <div class="icon">
                                        <?php
                                        $image = $data['matrik_service_three_genaral_content_service_icon'];

                                        if (!empty($image['url'])) {
                                            $file_url  = esc_url($image['url']);
                                            $file_path = isset($image['id']) ? get_attached_file($image['id']) : '';

                                            if ($file_path && strtolower(pathinfo($file_path, PATHINFO_EXTENSION)) === 'svg') {
                                                $svg_content = file_get_contents($file_path);

                                                if ($svg_content) {
                                                    $allowed_svg_tags = [
                                                        'svg'    => [
                                                            'xmlns'       => true,
                                                            'width'       => true,
                                                            'height'      => true,
                                                            'viewBox'     => true,
                                                            'fill'        => true,
                                                            'aria-hidden' => true,
                                                            'role'        => true,
                                                            'focusable'   => true,
                                                            'class'       => true,
                                                        ],
                                                        'g'      => [
                                                            'fill'      => true,
                                                            'stroke'    => true,
                                                            'transform' => true,
                                                        ],
                                                        'path'   => [
                                                            'd'            => true,
                                                            'fill'         => true,
                                                            'stroke'       => true,
                                                            'stroke-width' => true,
                                                        ],
                                                        'circle' => [
                                                            'cx'   => true,
                                                            'cy'   => true,
                                                            'r'    => true,
                                                            'fill' => true,
                                                        ],
                                                        'rect'   => [
                                                            'x'      => true,
                                                            'y'      => true,
                                                            'width'  => true,
                                                            'height' => true,
                                                            'fill'   => true,
                                                        ],
                                                        'use'    => [
                                                            'xlink:href' => true,
                                                            'href'       => true,
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

                                    </div>
                                </div>
                                <?php if (!empty($data['matrik_service_three_genaral_content_service_image']['url'])) : ?>
                                    <div class="services-img">
                                        <img src="<?php echo esc_url($data['matrik_service_three_genaral_content_service_image']['url']); ?>" alt="<?php echo esc_attr__('service-image', 'matrik-core'); ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($data['matrik_service_three_genaral_content_service_title'])) : ?>
                                    <div class="content">
                                        <p><?php echo esc_html($data['matrik_service_three_genaral_content_service_title']); ?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($data['matrik_service_three_genaral_content_button_text'])) : ?>
                                    <a href="<?php echo esc_url($data['matrik_service_three_genaral_content_button_text_url']['url']); ?>" class="details-btn">
                                        <span><?php echo esc_html($data['matrik_service_three_genaral_content_button_text']); ?></span>
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
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_service_genaral_style_selection'] == 'style_four') : ?>
            <div class="home4-service-section">
                <div class="container-fluid">
                    <?php if ($settings['matrik_service_genaral_title']) : ?>
                        <div class="section-title three text-center white mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h2><?php echo esc_html($settings['matrik_service_genaral_title']); ?></h2>
                        </div>
                    <?php endif; ?>
                    <ul class="service-wrapper">
                        <?php foreach ($settings['matrik_service_four_genaral_contenet_list'] as $data) : ?>
                            <li class="single-service wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="service-img-and-title-area">
                                    <?php if (!empty($data['matrik_service_four_genaral_banner_image']['url'])) : ?>
                                        <div class="service-img">
                                            <img src="<?php echo esc_url($data['matrik_service_four_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="title-area">
                                        <ul>
                                            <?php
                                            $raw_content = $data['matrik_service_four_genaral_contenet_tags'] ?? '';

                                            $lines = explode("\n", $raw_content);

                                            foreach ($lines as $line) {
                                                echo '<li>' . $line . '</li>';
                                            }
                                            ?>
                                        </ul>
                                        <?php if (!empty($data['matrik_service_four_genaral_contenet_title'])) : ?>
                                            <h2><a href="<?php echo esc_url($data['matrik_service_four_genaral_contenet_title_url']['url']); ?>"><?php echo esc_html($data['matrik_service_four_genaral_contenet_title']); ?></a></h2>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="service-content">
                                    <?php if (!empty($data['matrik_service_four_genaral_contenet_description'])) : ?>
                                        <p><?php echo esc_html($data['matrik_service_four_genaral_contenet_description']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($data['matrik_service_four_genaral_content_button_text'])) : ?>
                                        <a href="<?php echo esc_url($data['matrik_service_four_genaral_content_button_text_url']['url']); ?>" class="details-btn">
                                            <span><?php echo esc_html($data['matrik_service_four_genaral_content_button_text']); ?></span>
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
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php if (!empty($settings['matrik_service_four_genaral_content_bottom_button_text'])) : ?>
                        <div class="row pt-50 bounce_up">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <a class="primary-btn2 two white" href="<?php echo esc_url($settings['matrik_service_four_genaral_content_bottom_button_text_url']['url']); ?>">
                                    <span><?php echo esc_html($settings['matrik_service_four_genaral_content_bottom_button_text']); ?></span>
                                    <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z" />
                                            <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_service_genaral_style_selection'] == 'style_five') : ?>
            <div class="home5-service-section" id="scroll-section">
                <div class="container">
                    <?php if ($settings['matrik_service_genaral_header_switcher'] == 'yes') : ?>
                        <div class="row gy-md-5 gy-4 align-items-center justify-content-between mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="col-lg-5">
                                <div class="section-title four">
                                    <?php if (!empty($settings['matrik_service_genaral_subtitle'])) : ?>
                                        <span>
                                            <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.0594065 0H12.0001V2.2353L2.25745 12L0 9.76471L6.65353 3.17647L0.0594065 3.2353V0Z" />
                                                <path d="M11.9999 11.9999V4.47046L8.79199 7.64693V11.9999H11.9999Z" />
                                            </svg>
                                            <?php echo esc_html($settings['matrik_service_genaral_subtitle']); ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_service_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_service_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if (!empty($settings['matrik_service_genaral_header_button'])) : ?>
                                <div class="col-lg-3 d-flex justify-content-lg-end">
                                    <a class="primary-btn5 btn-hover" href="<?php echo esc_url($settings['matrik_service_genaral_header_button_url']['url']); ?>">
                                        <?php echo esc_html($settings['matrik_service_genaral_header_button']); ?>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                            </g>
                                        </svg>
                                        <span></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="row gy-5">
                        <div class="col-lg-5">
                            <ul class="service-list">
                                <?php foreach ($settings['matrik_feature_five_genaral_content_list'] as $index => $data) : ?>
                                    <?php if (!empty($data['matrik_service_five_genaral_content_title'])) : ?>
                                        <li class="<?php echo $index === 0 ? 'active' : ''; ?> wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                            <span><?php echo esc_html($data['matrik_service_five_genaral_content_title']); ?></span>
                                            <svg width="136" height="16" viewBox="0 0 136 16" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0.333333 9.60199C0.333333 11.0747 1.52724 12.2687 3 12.2687C4.47276 12.2687 5.66667 11.0747 5.66667 9.60199C5.66667 8.12923 4.47276 6.93532 3 6.93532C1.52724 6.93532 0.333333 8.12923 0.333333 9.60199ZM60.7859 9.60199L60.6342 9.12557L60.7859 9.60199ZM135.231 10.0455C135.476 9.9181 135.571 9.61619 135.444 9.37122L133.367 5.37919C133.239 5.13422 132.937 5.03895 132.692 5.16641C132.447 5.29386 132.352 5.59577 132.479 5.84074L134.326 9.3892L130.777 11.2354C130.532 11.3628 130.437 11.6647 130.564 11.9097C130.692 12.1547 130.994 12.25 131.239 12.1225L135.231 10.0455ZM2.78333 10.0526C3.78362 10.5336 4.9232 11.0367 6.20513 11.5346L6.56716 10.6024C5.31082 10.1145 4.19502 9.62181 3.21667 9.15138L2.78333 10.0526ZM13.3261 13.7387C15.5326 14.2635 17.9758 14.71 20.6619 15.0221L20.7773 14.0288C18.1309 13.7213 15.7265 13.2817 13.5575 12.7658L13.3261 13.7387ZM28.0868 15.493C30.4253 15.5242 32.9041 15.4522 35.526 15.253L35.4502 14.2559C32.8577 14.4528 30.4086 14.5239 28.1002 14.4931L28.0868 15.493ZM42.9002 14.3974C45.2364 14.036 47.6682 13.577 50.197 13.0077L49.9773 12.0321C47.4702 12.5966 45.0607 13.0513 42.7474 13.4091L42.9002 14.3974ZM57.3797 11.159C58.5473 10.8218 59.7333 10.462 60.9377 10.0784L60.6342 9.12557C59.4384 9.50641 58.2611 9.86364 57.1022 10.1983L57.3797 11.159ZM60.9377 10.0784C62.192 9.67895 63.4072 9.29423 64.5857 8.92408L64.2861 7.97003C63.106 8.34065 61.8895 8.72578 60.6342 9.12557L60.9377 10.0784ZM71.9052 6.67673C74.5403 5.8913 76.9683 5.19956 79.2301 4.59854L78.9733 3.63208C76.6994 4.23631 74.2615 4.93094 71.6196 5.7184L71.9052 6.67673ZM86.6465 2.83756C89.3421 2.29154 91.8029 1.91748 94.1409 1.70664L94.0511 0.710683C91.6701 0.925399 89.1725 1.3056 86.448 1.85746L86.6465 2.83756ZM101.702 1.60101C104.141 1.76092 106.589 2.10952 109.198 2.63843L109.396 1.65837C106.752 1.12213 104.258 0.766481 101.767 0.603153L101.702 1.60101ZM116.592 4.45696C118.845 5.08626 121.26 5.81185 123.902 6.63013L124.197 5.67489C121.551 4.85532 119.126 4.1267 116.861 3.49384L116.592 4.45696ZM131.19 8.92166C132.368 9.29443 133.586 9.68025 134.85 10.0788L135.15 9.12517C133.888 8.72677 132.67 8.34109 131.492 7.96829L131.19 8.92166Z" />
                                            </svg>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="col-lg-7">
                            <ul class="service-card-wrap">
                                <?php foreach ($settings['matrik_feature_five_genaral_content_list'] as $index => $data) : ?>
                                    <li class="<?php echo $index === 0 ? 'active' : ''; ?>">
                                        <div class="service-card2">
                                            <img src="<?php echo esc_url($data['matrik_service_five_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                            <div class="service-content">
                                                <?php if (!empty($data['matrik_service_five_genaral_content_description'])) : ?>
                                                    <p><?php echo esc_html($data['matrik_service_five_genaral_content_description']); ?></p>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_service_five_genaral_content_button_text'])) : ?>
                                                    <a class="primary-btn5 two btn-hover" href="<?php echo esc_url($data['matrik_service_five_genaral_content_button_text_url']['url']); ?>">
                                                        <?php echo esc_html($data['matrik_service_five_genaral_content_button_text']); ?>
                                                        <svg class="arrow" width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <path d="M0.0841592 0H17.0002V3.16667L3.19805 17L0 13.8333L9.42583 4.5L0.0841592 4.58333V0Z" />
                                                                <path d="M17.0016 17V6.33337L12.457 10.8334V17H17.0016Z" />
                                                            </g>
                                                        </svg>
                                                        <span></span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Style Six -->
        <?php if ($settings['matrik_service_genaral_style_selection'] == 'style_six') : ?>
            <div class="home6-service-section" <?php if (!empty($settings['matrik_service_genaral_background_image']['url'])) : ?>style="background-image: url(<?php echo esc_url($settings['matrik_service_genaral_background_image']['url']); ?>), linear-gradient(180deg, #0B0B1D 0%, #0B0B1D 100%);" <?php endif; ?>>
                <div class="container">
                    <div class="row g-4 align-items-lg-end justify-content-between mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms; animation-name: fadeInDown;">
                        <div class="col-lg-7">
                            <div class="section-title five white">
                                <?php if (!empty($settings['matrik_service_genaral_subtitle'])) : ?>
                                    <span><?php echo esc_html($settings['matrik_service_genaral_subtitle']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_service_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_service_genaral_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_service_genaral_desc'])) : ?>
                                    <p><?php echo esc_html($settings['matrik_service_genaral_desc']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex justify-content-lg-end">
                            <div class="slider-btn-grp four white">
                                <div class="slider-btn service-slider-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-55e9949c33093423" aria-disabled="false">
                                    <i class="bi bi-arrow-left"></i>
                                </div>
                                <div class="slider-btn service-slider-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-55e9949c33093423" aria-disabled="false">
                                    <i class="bi bi-arrow-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-60">
                        <div class="col-lg-12">
                            <div class="swiper home6-service-slider swiper-initialized swiper-horizontal swiper-backface-hidden">
                                <div class="swiper-wrapper" id="swiper-wrapper-55e9949c33093423" aria-live="off" style="transition-duration: 0ms; transform: translate3d(-324px, 0px, 0px); transition-delay: 0ms;">
                                    <?php foreach ($settings['matrik_feature_genaral_baner_six_content_list'] as $index => $item):
                                        $index = 1;
                                    ?>
                                        <div class="swiper-slide swiper-slide-prev" style="width: 324px;" role="group" aria-label="<?php echo $index; ?> / 7">
                                            <div class="service-card3">
                                                <?php if (!empty($item['matrik_service_genaral_banner_six_image']['url'])) : ?>
                                                    <div class="service-img">
                                                        <img src="<?php echo esc_url($item['matrik_service_genaral_banner_six_image']['url']); ?>" alt="<?php echo esc_attr__('slide-image', 'matrik-core'); ?>">
                                                    </div>
                                                <?php endif; ?>
                                                <div class="service-content">
                                                    <h4><a href="<?php echo esc_url($item['matrik_service_genaral_baner_six_content_url']['url']); ?>"><?php echo wp_kses($item['matrik_service_genaral_baner_six_content_title'], wp_kses_allowed_html('post')); ?></a></h4>
                                                    <a class="details-btn" href="<?php echo esc_url($item['matrik_service_genaral_baner_six_button_text_url']['url']); ?>"><?php echo esc_html($item['matrik_service_genaral_baner_six_button_text']); ?>
                                                        <svg class="arrow" width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <path d="M0.0841592 0H17.0002V3.16667L3.19805 17L0 13.8333L9.42583 4.5L0.0841592 4.58333V0Z"></path>
                                                                <path d="M16.9997 16.9999V6.33325L12.4551 10.8333V16.9999H16.9997Z"></path>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $index++;
                                    endforeach; ?>
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($settings['matrik_service_genaral_header_button'])) : ?>
                        <div class="btn-area d-flex justify-content-center bounce_up" style="translate: none; rotate: none; scale: none; transform: translate(0px); opacity: 1;">
                            <a class="primary-btn6 white-bg" href="<?php echo esc_url($settings['matrik_service_genaral_header_button_url']['url']); ?>">
                                <?php echo esc_html($settings['matrik_service_genaral_header_button']); ?>
                                <svg width="28" height="28" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path d="M14.1952 0.936056L27.5226 14.2634L25.0277 16.7583L3.25495 16.7829L3.23022 11.7684L18.0098 11.8413L10.5842 4.54707L14.1952 0.936056Z"></path>
                                        <path d="M14.1298 27.657L22.5336 19.2532L15.4078 19.218L10.5493 24.0765L14.1298 27.657Z"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Service_Widget());
