<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_About_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_about';
    }

    public function get_title()
    {
        return esc_html__('EG About', 'matrik-core');
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
            'matrik_about_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_about_genaral_style_selection',
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
            'matrik_about_genaral_show_counter_area',
            [
                'label' => esc_html__("Show Counter Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_show_partner_logo_area',
            [
                'label' => esc_html__("Show Partner Logo Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_subtitle',
            [
                'label'       => esc_html__('Header Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('About Our Story', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one', 'style_two', 'style_four', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_title',
            [
                'label'       => esc_html__('Header Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Our Story of Manufacturing Excellence Built on.', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_header_description',
            [
                'label'       => esc_html__('Header Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus conguese.Fusen fringilla est libero, sed tempus urna feugiat eu. Curabitur eu feugiat ligu Suspendisse nectoraba porttitor velit go this week and more about.', 'matrik-core'),
                'placeholder' => esc_html__('write your description here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_two', 'style_three', 'style_four', 'style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_header_experience_year',
            [
                'label'       => esc_html__('Experiece Year', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('05', 'matrik-core'),
                'placeholder' => esc_html__('write your experiece year here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_header_experience_year_text',
            [
                'label'       => esc_html__('Experiece Year Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Years Of Experience', 'matrik-core'),
                'placeholder' => esc_html__('write your experiece year text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_header_magnatic_item_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('About Us More', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_header_magnatic_item_link',
            [
                'label'       => esc_html__('URL', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'default'     => [
                    'url'     => '#',
                ],
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_header_magnatic_item_image',
            [
                'label'       => esc_html__('Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_six'],
                ]
            ],

        );
        $this->add_control(
            'matrik_about_genaral_five_banner_image_two',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_header_magnatic_item_desc',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('We understand your needs and deliver digital marketing through unique selling One proposi. Our team of experts is passionate about helping yot SEO company. Foi Choose experience the difference!', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $counter_repeater = new \Elementor\Repeater();

        $counter_repeater->add_control(
            'matrik_about_header_genaral_counter_number',
            [
                'label'       => esc_html__('Counter Number', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('18', 'matrik-core'),
                'placeholder' => esc_html__('write your number here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $counter_repeater->add_control(
            'matrik_about_header_genaral_counter_number_letter',
            [
                'label'       => esc_html__('Counter Letter', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('write your letter here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $counter_repeater->add_control(
            'matrik_about_header_genaral_counter_text',
            [
                'label'       => esc_html__('Counter Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Green Spaces', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_about_genaral_header_counter_content_list',
            [
                'label'         => esc_html__('Counter Content List', 'matrik-core'),
                'type'          => \Elementor\Controls_Manager::REPEATER,
                'fields'        => $counter_repeater->get_controls(),
                'default'       => [
                    [
                        'matrik_about_header_genaral_counter_number' => esc_html('18'),
                        'matrik_about_header_genaral_counter_number_letter' => esc_html('+'),
                        'matrik_about_header_genaral_counter_text'   => esc_html('Green Spaces'),
                    ],
                    [
                        'matrik_about_header_genaral_counter_number' => esc_html('6'),
                        'matrik_about_header_genaral_counter_text'   => esc_html('Skilled Professinals')
                    ],
                    [
                        'matrik_about_header_genaral_counter_number' => esc_html('1'),
                        'matrik_about_header_genaral_counter_number_letter' => esc_html('K'),
                        'matrik_about_header_genaral_counter_text'   => esc_html('Happy Clients')
                    ],
                    [
                        'matrik_about_header_genaral_counter_number' => esc_html('1'),
                        'matrik_about_header_genaral_counter_number_letter' => esc_html('K'),
                        'matrik_about_header_genaral_counter_text'   => esc_html('Successful Projects')
                    ],
                ],
                'title_field'   => '{{{ matrik_about_header_genaral_counter_text }}}',
                'condition'     => [
                    'matrik_about_genaral_style_selection' => ['style_six'],
                ],
            ]
        );

        $this->add_control(
            'matrik_about_genaral_header_button',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Start A Project', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_header_button_url',
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
                    'matrik_about_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_video_area',
            [
                'label'     => esc_html__('Video Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_video_area_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus conguese.Fusen fringilla est libero, sed tempus urna feugiat eu. Curabitur eu feugiat ligu Suspendisse nectoraba porttitor velit go this week and more about.', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_video_area_select_type',
            [
                'label'   => esc_html__('Select Type', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload' => esc_html__('Upload', 'matrik-core'),
                    'url' => esc_html__('URL', 'matrik-core'),
                ],
                'default' => 'url',
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_video_area_upload',
            [
                'label' => esc_html__('Choose Video File', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'matrik_about_genaral_video_area_select_type' => ['upload'],
                    'matrik_about_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_video_area_link',
            [
                'label'   => esc_html__('Video URL/Link', 'matrik-core'),
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
                    'matrik_about_genaral_video_area_select_type' => ['url'],
                    'matrik_about_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_content_area',
            [
                'label'     => esc_html__('Content Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_content_area_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('WHO WE ARE', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_content_area_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sit amet, finibus conguese. Fusen fringilla est libero, sed tempus urna feugiat eu. Curabitur eu feugiat ligu Suspendisse nectoraba porttitor velit go this week and more about. Garden Studios is a proud B Corp™ certified company - only the second sound stage campus in the world to achieve.', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_about_genaral_content_area_content_title',
            [
                'label'       => esc_html__('Content Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('WHO WE ARE', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'matrik_about_genaral_content_area_content_description',
            [
                'label'       => esc_html__('Content Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,

            ]
        );


        $this->add_control(
            'matrik_about_genaral_content_area_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_about_genaral_content_area_content_title' => esc_html('WHO WE ARE'),
                        'matrik_about_genaral_content_area_content_description' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],
                    [
                        'matrik_about_genaral_content_area_content_title' => esc_html('OUR MISSION'),
                        'matrik_about_genaral_content_area_content_description' => esc_html('Sed nisl eros, condimentum nec risussit amet finibus cons sem fusce. Advantage of thes limited-time offers & start.'),

                    ],

                ],
                'title_field' => '{{{ matrik_about_genaral_content_area_content_title }}}',
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one', 'style_three', 'style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_founder_area',
            [
                'label'     => esc_html__('Founder Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_founder_area_background_image',
            [
                'label' => esc_html__('Founder Area Background Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_founder_area_description',
            [
                'label'       => esc_html__('Founder Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('“Sed nis eros, condmentum nec rus sit amet, finibusc Fusen fringilla libero, sed tempus urna feugiat eu Cur eu feugiat ligu Suspendisse porttitor”.', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_founder_area_name',
            [
                'label'       => esc_html__('Founder Name', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Paisleys Genesis', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_founder_area_designation',
            [
                'label'       => esc_html__('Founder Designation', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__("Founder at, Matrik", 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_founder_area_image',
            [
                'label' => esc_html__('Founder Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_founder_area_contact_button',
            [
                'label'       => esc_html__('Contact Button', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Contact Now', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_founder_area_contact_button_url',
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
                    'matrik_about_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_content_area_banner_image_area',
            [
                'label'     => esc_html__('Banner Image Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_content_area_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'media_types' => ['image'],
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one', 'style_two', 'style_three', 'style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_three_about_us_button',
            [
                'label'       => esc_html__('Button', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('About Us More', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_genaral_three_about_us_button_url',
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
                    'matrik_about_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'matrik_about_counter_genaral',
            [
                'label' => esc_html__('Counter Section', 'matrik-core'),
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_about_counter_genaral_counter_number',
            [
                'label'       => esc_html__('Counter Number', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('130', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_about_counter_genaral_counter_sign',
            [
                'label'       => esc_html__('Counter Sign', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('M', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_about_counter_genaral_counter_title',
            [
                'label'       => esc_html__('Counter Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Green Spaces', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_about_counter_genaral_counter_list',
            [
                'label' => esc_html__('Counter List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_about_counter_genaral_counter_number' => esc_html('130'),
                        'matrik_about_counter_genaral_counter_title' => esc_html('Project Completed'),
                        'matrik_about_counter_genaral_counter_sign' => esc_html(''),

                    ],
                    [
                        'matrik_about_counter_genaral_counter_number' => esc_html('5'),
                        'matrik_about_counter_genaral_counter_title' => esc_html('Winning Award'),
                        'matrik_about_counter_genaral_counter_sign' => esc_html(''),

                    ],
                    [
                        'matrik_about_counter_genaral_counter_number' => esc_html('1'),
                        'matrik_about_counter_genaral_counter_title' => esc_html('Awesome Client'),
                        'matrik_about_counter_genaral_counter_sign' => esc_html('K'),
                    ],


                ],
                'title_field' => '{{{ matrik_about_counter_genaral_counter_title }}}',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'matrik_about_partner_logo_genaral',
            [
                'label' => esc_html__('Partner Section', 'matrik-core'),
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_partner_logo_genaral_title',
            [
                'label'       => esc_html__('Partner Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('A partner, Not A Vendor:', 'matrik-core'),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_about_partner_logo_genaral_logo',
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
            'matrik_about_partner_logo_genaral_logo_url',
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
            'matrik_about_partner_logo_genaral_list',
            [
                'label' => esc_html__('Logo List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_about_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'matrik_about_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'matrik_about_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'matrik_about_partner_logo_genaral_logo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],

                ],
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_about_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_subtitle',
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
                'name'     => 'matrik_about_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_title',
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
                'name'     => 'matrik_about_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_header_button',
            [
                'label'     => esc_html__('Header Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        // Tabs
        $this->start_controls_tabs(
            'matrik_about_style_genaral_header_button_tabs'
        );

        $this->start_controls_tab(
            'matrik_about_style_genaral_header_button_tabs_normal_tab',
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
                'name'     => 'matrik_about_style_genaral_header_button_tabs_normal_tab_typ',
                'selector' => '{{WRAPPER}} .home1-about-section .about-top-area .about-btn-area .about-btn',

            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_header_button_tabs_normal_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-top-area .about-btn-area .about-btn' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_header_button_tabs_normal_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-top-area .about-btn-area .about-btn::after' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_header_button_tabs_normal_tab_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-about-section .about-top-area .about-btn-area .bg svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_header_button_tabs_normal_tab_border_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-about-section .about-top-area .about-btn-area .bg svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_about_style_genaral_header_button_tabs_normal_tab_margin',
            [
                'label' => esc_html__(
                    'Margin',
                    'matrik-core'
                ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-top-area .about-btn-area .about-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'matrik_about_style_genaral_header_button_tabs_normal_tab_padding',
            [
                'label'      => esc_html__(
                    'Padding',
                    'matrik-core'
                ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .home1-about-section .about-top-area .about-btn-area .about-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_tab();

        // Hover start
        $this->start_controls_tab(
            'matrik_about_style_genaral_header_button_tabs_hover_tab',
            [
                'label' => esc_html__('Hover', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_header_button_tabs_hover_tab_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-about-section .about-top-area .about-btn-area:hover .about-btn' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_header_button_tabs_hover_tab_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-about-section .about-top-area .about-btn-area:hover .about-btn svg' => 'stroke: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_header_button_tabs_hover_tab_icon_after_color',
            [
                'label'     => esc_html__('Icon After Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home1-about-section .about-top-area .about-btn-area:hover .about-btn::after' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_header_button_tabs_hover_tab_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-top-area .about-btn-area:hover .bg svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_header_button_tabs_hover_tab_background_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-top-area .about-btn-area:hover .bg svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();


        $this->add_control(
            'matrik_about_style_genaral_video_icon',
            [
                'label'     => esc_html__('Video Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_genaral_video_icon_typ',
                'selector' => '{{WRAPPER}} .home1-about-section .about-top-area .about-title-area .video-and-content .video-area .icon .play-icon',

            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_video_icon_outside_color',
            [
                'label'     => esc_html__('Outside Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-top-area .about-title-area .video-and-content .video-area .icon .video-circle' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_video_icon_inside_color',
            [
                'label'     => esc_html__('Inside Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-top-area .about-title-area .video-and-content .video-area .icon .play-icon' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_description',
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
                'name'     => 'matrik_about_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home1-about-section .about-top-area .about-title-area .video-and-content .content p',

            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-top-area .about-title-area .video-and-content .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_description_before_color',
            [
                'label'     => esc_html__('Before Image Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-top-area .about-title-area .video-and-content .content p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_content_title',
            [
                'label'     => esc_html__('Content Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home1-about-section .about-content ul li h6',

            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content ul li h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_description_two',
            [
                'label'     => esc_html__('Content Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_genaral_description_two_typ',
                'selector' => '{{WRAPPER}} .home1-about-section .about-content p',

            ]
        );

        $this->add_control(
            'matrik_about_style_genaral_description_two_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-about-section .about-content p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


        //style start three

        $this->start_controls_section(
            'matrik_about_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_title',
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
                'name'     => 'matrik_about_style_three_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_description',
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
                'name'     => 'matrik_about_style_three_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-content-wrap .section-title p',

            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content-wrap .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_description_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content-wrap .section-title p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_content_title',
            [
                'label'     => esc_html__('Content Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_three_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-content-wrap ul li .single-content h6',

            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content-wrap ul li .single-content h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_content_description',
            [
                'label'     => esc_html__('Content Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_three_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .home3-about-section .about-content-wrap ul li .single-content p',

            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-about-section .about-content-wrap ul li .single-content p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_about_style_three_genaral_button',
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
                'name'     => 'matrik_about_style_three_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn3',

            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3 .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3:hover .arrow' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_three_genaral_button_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn3::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_about_style_four_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_subtitle',
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
                'name'     => 'matrik_about_style_four_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-title-area > span',

            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-title-area > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_title',
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
                'name'     => 'matrik_about_style_four_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-title-area h2',

            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-title-area h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_title_second_color',
            [
                'label'     => esc_html__('Second Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-title-area h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_description',
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
                'name'     => 'matrik_about_style_four_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-content p',

            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_description_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_content_title',
            [
                'label'     => esc_html__('Content Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_four_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-content ul li h6',

            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content ul li h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_content_description',
            [
                'label'     => esc_html__('Content Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_four_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .home4-about-section .about-content p',

            ]
        );

        $this->add_control(
            'matrik_about_style_four_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-about-section .about-content p' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //style start three

        $this->start_controls_section(
            'matrik_about_style_five_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_title',
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
                'name'     => 'matrik_about_style_five_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.four.white h2',

            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_description',
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
                'name'     => 'matrik_about_style_five_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .about-content-wrap p',

            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content-wrap p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_description_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .about-content-wrap p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_counter_list_border_number',
            [
                'label'     => esc_html__('Counter List Border', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_counter_list_border_number_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .counter-list .single-counter ' => 'border-bottom: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_counter_number',
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
                'name'     => 'matrik_about_style_five_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .counter-list .single-counter .number h2',

            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_counter_number_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .counter-list .single-counter .number h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_counter_sign',
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
                'name'     => 'matrik_about_style_five_genaral_counter_sign_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .counter-list .single-counter .number span',

            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .counter-list .single-counter .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_counter_title',
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
                'name'     => 'matrik_about_style_five_genaral_counter_title_typ',
                'selector' => '{{WRAPPER}} .home5-about-section .counter-list .single-counter .content p',

            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_counter_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-about-section .counter-list .single-counter .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_partner_title',
            [
                'label'     => esc_html__('Partner Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_five_genaral_partner_title_typ',
                'selector' => '{{WRAPPER}} .logo-section .logo-wrap .logo-title h6',

            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_partner_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section .logo-wrap .logo-title h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_five_genaral_partner_title_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .logo-section .logo-wrap .logo-title' => 'border-right: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //Style Six Start
        $this->start_controls_section(
            'matrik_about_style_six_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_subtitle',
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
                'name'     => 'matrik_about_style_six_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.five > span',

            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_about_style_six_genaral_title',
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
                'name'     => 'matrik_about_style_six_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Span Text Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_six_genaral_title_span_typ',
                'selector' => '{{WRAPPER}} .section-title.five h2 span',

            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_title_span_color',
            [
                'label'     => esc_html__('Span Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.five h2 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_description',
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
                'name'     => 'matrik_about_style_six_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-content .section-title p',
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-content .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_experience_year',
            [
                'label'     => esc_html__('Experience Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Year Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_six_genaral_experience_year_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-content .experience-area h2',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Text Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_six_genaral_experience_text_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-content .experience-area span',
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_experience_text_color',
            [
                'label'     => esc_html__('Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-content .experience-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_magnetic_section',
            [
                'label'     => esc_html__('Magnetic Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Title Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_six_genaral_magnetic_title_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-img-wrap .about-img .about-btn',
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_magnetic_title_color',
            [
                'label'     => esc_html__('Title Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-img-wrap .about-img .about-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_magnetic_title_hover_color',
            [
                'label'     => esc_html__('Title Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-img-wrap .about-img .about-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_magnetic_title_bg_color',
            [
                'label'     => esc_html__('Title BG Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-img-wrap .about-img .about-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_magnetic_title_hover_bg_color',
            [
                'label'     => esc_html__('Hover Title BG Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-img-wrap .about-img .about-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Description Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_six_genaral_magnetic_desc_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .about-img-wrap p',
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_magnetic_desc_color',
            [
                'label'     => esc_html__('Description Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .about-img-wrap p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_counter_section',
            [
                'label'     => esc_html__('Counter Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Number Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_six_genaral_counter_number_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .counter-wrap .single-countdown .number h2',
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_counter_number_color',
            [
                'label'     => esc_html__('Number Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .counter-wrap .single-countdown .number h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Span Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_six_genaral_counter_number_span_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .counter-wrap .single-countdown .number span',
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_counter_number_span_color',
            [
                'label'     => esc_html__('Span Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .counter-wrap .single-countdown .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Counter Text Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_six_genaral_counter_desc_typ',
                'selector' => '{{WRAPPER}} .home6-about-section .counter-wrap .single-countdown .number h2',
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_counter_desc_color',
            [
                'label'     => esc_html__('Counter Text Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .counter-wrap .single-countdown .number h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_six_genaral_counter_number_seperator_color',
            [
                'label'     => esc_html__('Separator Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-about-section .counter-wrap .divider::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_about_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_about_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_subtitle',
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
                'name'     => 'matrik_about_style_two_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.two span',

            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_subtitle_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.two span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_title',
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
                'name'     => 'matrik_about_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_description',
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
                'name'     => 'matrik_about_style_two_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-title-area .content p',

            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-title-area .content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_description_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-title-area .content p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_button',
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
                'name'     => 'matrik_about_style_two_genaral_button_typ',
                'selector' => '{{WRAPPER}} .primary-btn2',

            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_about_style_two_genaral_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-btn-area:hover .primary-btn2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_about_style_two_genaral_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-btn-area:hover .primary-btn2 svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_about_style_two_genaral_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-btn-area .bg svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_button_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-btn-area:hover .bg svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-btn-area .bg svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-btn-area:hover .bg svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_content_title',
            [
                'label'     => esc_html__('Content Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_two_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-content-wrapper .about-content h5',

            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content-wrapper .about-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_content_description',
            [
                'label'     => esc_html__('Content Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_two_genaral_content_description_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-content-wrapper .about-content p',

            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_content_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content-wrapper .about-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_area',
            [
                'label'     => esc_html__('Founder Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_description',
            [
                'label'     => esc_html__('Founder Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_two_genaral_founder_description_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area p',

            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_name',
            [
                'label'     => esc_html__('Founder Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_two_genaral_founder_name_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area .founder-profile .profile-content h6',

            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area .founder-profile .profile-content h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_designation',
            [
                'label'     => esc_html__('Founder Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_two_genaral_founder_designation_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area .founder-profile .profile-content span',

            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_designation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area .founder-profile .profile-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_contact_button',
            [
                'label'     => esc_html__('Contact Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_about_style_two_genaral_founder_contact_button_typ',
                'selector' => '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area .contact-btn a',

            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_contact_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area .contact-btn a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_contact_button_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area .contact-btn a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_contact_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area .contact-btn a:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_about_style_two_genaral_founder_contact_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-about-section .about-content-wrapper .founder-area .contact-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['matrik_about_genaral_style_selection'] == 'style_one') : ?>
            <div class="home1-about-section" id="scroll-section">
                <div class="container">
                    <div class="about-top-area mb-50">
                        <div class="row g-4 align-items-center justify-content-between">
                            <div class="col-xl-8 col-lg-9 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="about-title-area">
                                    <div class="section-title">
                                        <?php if (!empty($settings['matrik_about_genaral_subtitle'])) : ?>
                                            <span><?php echo esc_html($settings['matrik_about_genaral_subtitle']); ?></span>
                                        <?php endif; ?>
                                        <?php if (!empty($settings['matrik_about_genaral_title'])) : ?>
                                            <h2><?php echo esc_html($settings['matrik_about_genaral_title']); ?></h2>
                                        <?php endif; ?>
                                    </div>
                                    <div class="video-and-content">
                                        <a data-fancybox="video-player" href="<?php if ($settings['matrik_about_genaral_video_area_select_type'] == 'upload') : ?><?php echo esc_url($settings['matrik_about_genaral_video_area_upload']['url']); ?><?php elseif ($settings['matrik_about_genaral_video_area_select_type'] == 'url') : ?><?php echo esc_url($settings['matrik_about_genaral_video_area_link']['url']); ?><?php endif; ?>" class="video-area">
                                            <div class="icon">
                                                <svg class="video-circle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    x="0px" y="0px" width="77px" viewBox="0 0 206 206" style="enable-background:new 0 0 206 206;" xml:space="preserve">
                                                    <circle class="circle" stroke-miterlimit="10" cx="103" cy="103" r="100"></circle>
                                                    <path class="circle-half top-half" stroke-width="4" stroke-miterlimit="10"
                                                        d="M16.4,53C44,5.2,105.2-11.2,153,16.4s64.2,88.8,36.6,136.6"></path>
                                                    <path class="circle-half bottom-half" stroke-width="4" stroke-miterlimit="10"
                                                        d="M189.6,153C162,200.8,100.8,217.2,53,189.6S-11.2,100.8,16.4,53"></path>
                                                </svg>
                                                <svg class="play-icon" width="23" height="28" viewBox="0 0 23 28" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M22.8424 14.2559C22.8424 13.4843 22.4449 12.7737 21.7784 12.3539L3.78608 1.03446C3.05833 0.577358 2.17083 0.543963 1.40902 0.947257C0.649591 1.35033 0.195312 2.09429 0.195312 2.93663V25.5738C0.195312 26.4162 0.649555 27.1599 1.41018 27.5632C1.76475 27.7501 2.14507 27.8431 2.52543 27.8431C2.96275 27.8431 3.39718 27.7197 3.78584 27.476L21.7782 16.1583C22.4449 15.7383 22.8424 15.0277 22.8424 14.2561V14.2559ZM21.1289 15.177L3.13659 26.4947C2.78345 26.7165 2.35329 26.7315 1.98441 26.5376C1.61553 26.3424 1.39473 25.9822 1.39473 25.5736V2.93642C1.39473 2.52778 1.61553 2.16621 1.98441 1.97237C2.15681 1.88239 2.34185 1.83669 2.52569 1.83669C2.73791 1.83669 2.9487 1.8963 3.13685 2.0155L21.1292 13.335C21.4568 13.5414 21.6447 13.8781 21.6447 14.2575C21.6444 14.6356 21.4565 14.9707 21.1289 15.177Z" />
                                                </svg>
                                            </div>
                                        </a>
                                        <?php if (!empty($settings['matrik_about_genaral_video_area_description'])) : ?>
                                            <div class="content">
                                                <p><?php echo esc_html($settings['matrik_about_genaral_video_area_description']); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <?php if (!empty($settings['matrik_about_genaral_header_button'])) : ?>
                                <div class="col-xl-2 col-lg-2 d-flex justify-content-lg-end">
                                    <a href="<?php echo esc_url($settings['matrik_about_genaral_header_button_url']['url']); ?>" class="about-btn-area btn_wrapper">
                                        <div class="bg">
                                            <svg width="170" height="170" viewBox="0 0 170 170" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M77.3692 2.27213C82.1102 -0.382126 87.8898 -0.382126 92.6308 2.27213C95.8749 4.08835 99.6604 4.68792 103.307 3.96307C108.636 2.90377 114.133 4.68978 117.822 8.67916C120.346 11.409 123.761 13.149 127.453 13.5865C132.848 14.2258 137.524 17.623 139.8 22.557C141.357 25.9332 144.067 28.6434 147.443 30.2003C152.377 32.4757 155.774 37.1516 156.414 42.5472C156.851 46.2393 158.591 49.6543 161.321 52.1784C165.31 55.8671 167.096 61.3638 166.037 66.693C165.312 70.3396 165.912 74.1251 167.728 77.3692C170.382 82.1102 170.382 87.8898 167.728 92.6308C165.912 95.8749 165.312 99.6604 166.037 103.307C167.096 108.636 165.31 114.133 161.321 117.822C158.591 120.346 156.851 123.761 156.414 127.453C155.774 132.848 152.377 137.524 147.443 139.8C144.067 141.357 141.357 144.067 139.8 147.443C137.524 152.377 132.848 155.774 127.453 156.414C123.761 156.851 120.346 158.591 117.822 161.321C114.133 165.31 108.636 167.096 103.307 166.037C99.6604 165.312 95.8749 165.912 92.6308 167.728C87.8898 170.382 82.1102 170.382 77.3692 167.728C74.1251 165.912 70.3396 165.312 66.693 166.037C61.3638 167.096 55.8671 165.31 52.1784 161.321C49.6543 158.591 46.2393 156.851 42.5472 156.414C37.1516 155.774 32.4757 152.377 30.2003 147.443C28.6434 144.067 25.9332 141.357 22.557 139.8C17.623 137.524 14.2258 132.848 13.5865 127.453C13.149 123.761 11.409 120.346 8.67916 117.822C4.68978 114.133 2.90377 108.636 3.96307 103.307C4.68792 99.6604 4.08835 95.8749 2.27213 92.6308C-0.382126 87.8898 -0.382126 82.1102 2.27213 77.3692C4.08835 74.1251 4.68792 70.3396 3.96307 66.693C2.90377 61.3638 4.68977 55.8671 8.67916 52.1784C11.409 49.6543 13.149 46.2393 13.5865 42.5472C14.2258 37.1516 17.623 32.4757 22.557 30.2003C25.9332 28.6434 28.6434 25.9332 30.2003 22.557C32.4757 17.623 37.1516 14.2258 42.5472 13.5865C46.2393 13.149 49.6543 11.409 52.1784 8.67916C55.8671 4.68977 61.3638 2.90377 66.693 3.96307C70.3396 4.68792 74.1251 4.08835 77.3692 2.27213Z" />
                                                <path
                                                    d="M77.6135 2.70841C82.2027 0.139114 87.7973 0.139114 92.3865 2.70841C95.7345 4.58277 99.6412 5.20153 103.404 4.45348C108.563 3.42808 113.884 5.15692 117.455 9.01861C120.059 11.8358 123.584 13.6315 127.394 14.083C132.617 14.7019 137.143 17.9903 139.346 22.7664C140.952 26.2507 143.749 29.0476 147.234 30.6544C152.01 32.8569 155.298 37.3831 155.917 42.6061C156.368 46.4163 158.164 49.9406 160.981 52.5455C164.843 56.1161 166.572 61.437 165.547 66.5955C164.798 70.3588 165.417 74.2655 167.292 77.6135C169.861 82.2027 169.861 87.7973 167.292 92.3865C165.417 95.7345 164.798 99.6412 165.547 103.404C166.572 108.563 164.843 113.884 160.981 117.455C158.164 120.059 156.368 123.584 155.917 127.394C155.298 132.617 152.01 137.143 147.234 139.346C143.749 140.952 140.952 143.749 139.346 147.234C137.143 152.01 132.617 155.298 127.394 155.917C123.584 156.368 120.059 158.164 117.455 160.981C113.884 164.843 108.563 166.572 103.404 165.547C99.6412 164.798 95.7345 165.417 92.3865 167.292C87.7973 169.861 82.2027 169.861 77.6135 167.292C74.2655 165.417 70.3588 164.798 66.5955 165.547C61.437 166.572 56.1161 164.843 52.5455 160.981C49.9406 158.164 46.4163 156.368 42.6061 155.917C37.3831 155.298 32.8569 152.01 30.6544 147.234C29.0476 143.749 26.2507 140.952 22.7664 139.346C17.9903 137.143 14.7019 132.617 14.083 127.394C13.6315 123.584 11.8358 120.059 9.01861 117.455C5.15692 113.884 3.42808 108.563 4.45348 103.404C5.20153 99.6412 4.58277 95.7345 2.70841 92.3865C0.139114 87.7973 0.139114 82.2027 2.70841 77.6135C4.58277 74.2655 5.20153 70.3588 4.45348 66.5955C3.42808 61.437 5.15692 56.1161 9.01861 52.5455C11.8358 49.9406 13.6315 46.4163 14.083 42.606C14.7019 37.3831 17.9903 32.8569 22.7664 30.6544C26.2507 29.0476 29.0476 26.2507 30.6544 22.7664C32.8569 17.9903 37.3831 14.7019 42.606 14.083C46.4163 13.6315 49.9406 11.8358 52.5455 9.01861C56.1161 5.15692 61.437 3.42808 66.5955 4.45348C70.3588 5.20153 74.2655 4.58277 77.6135 2.70841Z" stroke-opacity="0.1" />
                                            </svg>
                                        </div>
                                        <div class="about-btn">
                                            <?php echo esc_html($settings['matrik_about_genaral_header_button']); ?>
                                            <svg viewBox="0 0 13 20">
                                                <polyline points="0.5 19.5 3 19.5 12.5 10 3 0.5"></polyline>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="row gy-md-5 gy-4">
                        <div class="col-lg-5 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-content">
                                <?php if (!empty($settings['matrik_about_genaral_content_area_description'])) : ?>
                                    <p><?php echo esc_html($settings['matrik_about_genaral_content_area_description']); ?></p>
                                <?php endif; ?>
                                <ul>

                                    <?php foreach ($settings['matrik_about_genaral_content_area_content_list'] as $data) : ?>
                                        <li>
                                            <?php if (!empty($data['matrik_about_genaral_content_area_content_title'])) : ?>
                                                <h6><?php echo esc_html($data['matrik_about_genaral_content_area_content_title']); ?></h6>
                                            <?php endif; ?>
                                            <?php if (!empty($data['matrik_about_genaral_content_area_content_description'])) : ?>
                                                <p><?php echo esc_html($data['matrik_about_genaral_content_area_content_description']); ?></p>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_about_genaral_content_area_banner_image']['url'])) : ?>
                            <div class="col-lg-7 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="about-img magnetic-item">
                                    <img src="<?php echo esc_url($settings['matrik_about_genaral_content_area_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_about_genaral_style_selection'] == 'style_two') : ?>
            <div class="home2-about-section">
                <div class="container">
                    <div class="row g-4 align-items-center justify-content-between mb-50">
                        <div class="col-xl-8 col-lg-9 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-title-area">
                                <div class="section-title two">
                                    <?php if (!empty($settings['matrik_about_genaral_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_about_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_about_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_about_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['matrik_about_genaral_header_description'])) : ?>
                                    <div class="content">
                                        <p><?php echo esc_html($settings['matrik_about_genaral_header_description']); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_about_genaral_header_button'])) : ?>
                            <div class="col-lg-3 d-flex justify-content-lg-end">
                                <a href="<?php echo esc_url($settings['matrik_about_genaral_header_button_url']['url']); ?>" class="about-btn-area btn_wrapper">
                                    <div class="bg">
                                        <svg width="214" height="214" viewBox="0 0 214 214" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M99.1061 2.41945C104.011 -0.326338 109.989 -0.326337 114.894 2.41945L117.658 3.96699C121.014 5.84584 124.93 6.46609 128.702 5.71624L131.81 5.09862C137.323 4.00279 143.009 5.85038 146.825 9.97734L148.975 12.3033C151.587 15.1273 155.119 16.9273 158.939 17.3799L162.085 17.7526C167.666 18.414 172.503 21.9283 174.857 27.0325L176.184 29.9092C177.795 33.4018 180.598 36.2054 184.091 37.8161L186.967 39.1428C192.072 41.4966 195.586 46.3337 196.247 51.9154L196.62 55.0613C197.073 58.8807 198.873 62.4135 201.697 65.0246L204.023 67.1753C208.15 70.9912 209.997 76.6775 208.901 82.1904L208.284 85.2975C207.534 89.0698 208.154 92.9859 210.033 96.3419L211.581 99.1061C214.326 104.011 214.326 109.989 211.581 114.894L210.033 117.658C208.154 121.014 207.534 124.93 208.284 128.702L208.901 131.81C209.997 137.323 208.15 143.009 204.023 146.825L201.697 148.975C198.873 151.587 197.073 155.119 196.62 158.939L196.247 162.085C195.586 167.666 192.072 172.503 186.967 174.857L184.091 176.184C180.598 177.795 177.795 180.598 176.184 184.091L174.857 186.967C172.503 192.072 167.666 195.586 162.085 196.247L158.939 196.62C155.119 197.073 151.587 198.873 148.975 201.697L146.825 204.023C143.009 208.15 137.323 209.997 131.81 208.901L128.702 208.284C124.93 207.534 121.014 208.154 117.658 210.033L114.894 211.581C109.989 214.326 104.011 214.326 99.1061 211.581L96.3419 210.033C92.9859 208.154 89.0698 207.534 85.2975 208.284L82.1904 208.901C76.6775 209.997 70.9912 208.15 67.1753 204.023L65.0246 201.697C62.4135 198.873 58.8807 197.073 55.0613 196.62L51.9154 196.247C46.3337 195.586 41.4966 192.072 39.1428 186.968L37.8161 184.091C36.2054 180.598 33.4018 177.795 29.9092 176.184L27.0325 174.857C21.9283 172.503 18.414 167.666 17.7526 162.085L17.3799 158.939C16.9273 155.119 15.1273 151.587 12.3033 148.975L9.97734 146.825C5.85038 143.009 4.00279 137.323 5.09862 131.81L5.71624 128.702C6.46609 124.93 5.84584 121.014 3.96699 117.658L2.41945 114.894C-0.326338 109.989 -0.326337 104.011 2.41945 99.1061L3.96699 96.3419C5.84584 92.9859 6.46609 89.0698 5.71624 85.2975L5.09862 82.1904C4.00279 76.6775 5.85038 70.9912 9.97734 67.1753L12.3033 65.0246C15.1273 62.4135 16.9273 58.8807 17.3799 55.0613L17.7526 51.9154C18.414 46.3337 21.9283 41.4966 27.0325 39.1428L29.9092 37.8161C33.4018 36.2054 36.2054 33.4018 37.8161 29.9092L39.1428 27.0325C41.4966 21.9283 46.3337 18.414 51.9154 17.7526L55.0613 17.3799C58.8807 16.9273 62.4135 15.1273 65.0246 12.3033L67.1753 9.97734C70.9912 5.85038 76.6775 4.00279 82.1904 5.09862L85.2975 5.71624C89.0698 6.46609 92.9859 5.84584 96.3419 3.96699L99.1061 2.41945Z" />
                                            <path
                                                d="M99.3503 2.85573C104.103 0.194902 109.897 0.194903 114.65 2.85573L117.414 4.40327C120.874 6.34026 124.911 6.97969 128.8 6.20665L131.907 5.58903C137.249 4.5271 142.76 6.31753 146.458 10.3168L148.608 12.6428C151.3 15.5541 154.942 17.4098 158.88 17.8764L162.026 18.2491C167.435 18.8901 172.122 22.2957 174.403 27.2419L175.73 30.1186C177.39 33.7193 180.281 36.6097 183.881 38.2702L186.758 39.5968C191.704 41.8778 195.11 46.5652 195.751 51.9743L196.124 55.1201C196.59 59.0577 198.446 62.6998 201.357 65.3917L203.683 67.5424C207.682 71.2402 209.473 76.7506 208.411 82.0929L207.793 85.2001C207.02 89.0891 207.66 93.1263 209.597 96.5861L211.144 99.3503C213.805 104.103 213.805 109.897 211.144 114.65L209.597 117.414C207.66 120.874 207.02 124.911 207.793 128.8L208.411 131.907C209.473 137.249 207.682 142.76 203.683 146.458L201.357 148.608C198.446 151.3 196.59 154.942 196.124 158.88L195.751 162.026C195.11 167.435 191.704 172.122 186.758 174.403L183.881 175.73C180.281 177.39 177.39 180.281 175.73 183.881L174.403 186.758C172.122 191.704 167.435 195.11 162.026 195.751L158.88 196.124C154.942 196.59 151.3 198.446 148.608 201.357L146.458 203.683C142.76 207.682 137.249 209.473 131.907 208.411L128.8 207.793C124.911 207.02 120.874 207.66 117.414 209.597L114.65 211.144C109.897 213.805 104.103 213.805 99.3503 211.144L96.5861 209.597C93.1263 207.66 89.0891 207.02 85.2001 207.793L82.0929 208.411C76.7506 209.473 71.2402 207.682 67.5424 203.683L65.3917 201.357C62.6998 198.446 59.0577 196.59 55.1201 196.124L51.9743 195.751C46.5652 195.11 41.8778 191.704 39.5968 186.758L38.2702 183.881C36.6097 180.281 33.7193 177.39 30.1186 175.73L27.2419 174.403C22.2957 172.122 18.8901 167.435 18.2491 162.026L17.8764 158.88C17.4098 154.942 15.5541 151.3 12.6428 148.608L10.3168 146.458C6.31753 142.76 4.5271 137.249 5.58903 131.907L6.20665 128.8C6.97969 124.911 6.34026 120.874 4.40327 117.414L2.85573 114.65C0.194902 109.897 0.194903 104.103 2.85573 99.3503L4.40327 96.5861C6.34026 93.1263 6.97969 89.0891 6.20665 85.2L5.58903 82.0929C4.5271 76.7506 6.31753 71.2402 10.3168 67.5424L12.6428 65.3917C15.5541 62.6998 17.4098 59.0577 17.8764 55.1201L18.2491 51.9742C18.8901 46.5652 22.2957 41.8778 27.2419 39.5968L30.1186 38.2702C33.7193 36.6097 36.6097 33.7193 38.2702 30.1186L39.5968 27.2419C41.8778 22.2957 46.5652 18.8901 51.9742 18.2491L55.1201 17.8764C59.0577 17.4098 62.6998 15.5541 65.3917 12.6428L67.5424 10.3168C71.2402 6.31753 76.7506 4.5271 82.0929 5.58903L85.2 6.20665C89.0891 6.97969 93.1263 6.34026 96.5861 4.40327L99.3503 2.85573Z" />
                                        </svg>
                                    </div>
                                    <div class="primary-btn2">
                                        <span><?php echo esc_html($settings['matrik_about_genaral_header_button']); ?></span>
                                        <svg class="arrow" width="23" height="23" viewBox="0 0 23 23" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path d="M0.113861 0H22.9999V4.28425L4.32671 22.9997L0 18.7154L12.7524 6.08815L0.113861 6.20089V0Z"></path>
                                                <path d="M23 22.9996V8.56848L16.8516 14.6566V22.9996H23Z"></path>
                                            </g>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-content-wrapper">
                                <div class="about-content">
                                    <?php if (!empty($settings['matrik_about_genaral_content_area_title'])) : ?>
                                        <h5><?php echo esc_html($settings['matrik_about_genaral_content_area_title']); ?></h5>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_about_genaral_content_area_description'])) : ?>
                                        <p><?php echo esc_html($settings['matrik_about_genaral_content_area_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="founder-area">
                                    <?php if (!empty($settings['matrik_about_genaral_founder_area_description'])) : ?>
                                        <p><?php echo esc_html($settings['matrik_about_genaral_founder_area_description']); ?></p>
                                    <?php endif; ?>
                                    <div class="founder-profile">
                                        <?php if (!empty($settings['matrik_about_genaral_founder_area_image']['url'])) : ?>
                                            <div class="profile-img">
                                                <img src="<?php echo esc_url($settings['matrik_about_genaral_founder_area_image']['url']); ?>" alt="<?php echo esc_attr__('founder-image', 'matrik-core'); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <div class="profile-content">
                                            <?php if (!empty($settings['matrik_about_genaral_founder_area_name'])) : ?>
                                                <h6><?php echo esc_html($settings['matrik_about_genaral_founder_area_name']); ?></h6>
                                            <?php endif; ?>
                                            <?php if (!empty($settings['matrik_about_genaral_founder_area_designation'])) : ?>
                                                <span><?php echo esc_html($settings['matrik_about_genaral_founder_area_designation']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($settings['matrik_about_genaral_founder_area_contact_button'])) : ?>
                                        <div class="contact-btn">
                                            <a href="<?php echo esc_url($settings['matrik_about_genaral_founder_area_contact_button_url']['url']); ?>">
                                                <?php echo esc_html($settings['matrik_about_genaral_founder_area_contact_button']); ?>
                                                <svg width="17" height="17" viewBox="0 0 17 17" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M8.59212 0.0420781L16.9993 8.49978L15.4255 10.0831L1.69076 10.0987L1.67516 6.91643L10.9984 6.96267L6.31422 2.33367L8.59212 0.0420781Z" />
                                                        <path d="M8.55207 16.9994L13.8534 11.6663L9.35824 11.644L6.29342 14.7272L8.55207 16.9994Z" />
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_about_genaral_founder_area_background_image']['url'])) : ?>
                                        <img src="<?php echo esc_url($settings['matrik_about_genaral_founder_area_background_image']['url']); ?>" alt="<?php echo esc_attr__('background-image', 'matrik-core'); ?>" class="bg-vector">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_about_genaral_content_area_banner_image']['url'])) : ?>
                            <div class="col-lg-6 d-lg-block d-none wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="about-img">
                                    <img src="<?php echo esc_url($settings['matrik_about_genaral_content_area_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_about_genaral_style_selection'] == 'style_three') : ?>
            <div class="home3-about-section">
                <div class="container">
                    <div class="row gy-4 align-items-center">
                        <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-content-wrap">
                                <div class="section-title two">
                                    <?php if (!empty($settings['matrik_about_genaral_title'])) : ?>
                                        <h2><?php echo esc_html($settings['matrik_about_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_about_genaral_header_description'])) : ?>
                                        <p><?php echo esc_html($settings['matrik_about_genaral_header_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <ul>
                                    <?php
                                    $index = 0;
                                    foreach ($settings['matrik_about_genaral_content_area_content_list'] as $data) : ?>
                                        <li>
                                            <?php if ($index !== 0) : ?>
                                                <svg width="100" height="74" viewBox="0 0 100 74" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.8338 3.5C3.8338 4.97276 5.02771 6.16667 6.50046 6.16667C7.97322 6.16667 9.16713 4.97276 9.16713 3.5C9.16713 2.02724 7.97322 0.833333 6.50046 0.833333C5.02771 0.833333 3.8338 2.02724 3.8338 3.5ZM15.0001 53L14.9241 53.4942L15.0001 53ZM98.4667 73.4989C98.7423 73.5173 98.9805 73.3088 98.9989 73.0333L99.2982 68.5432C99.3166 68.2677 99.1081 68.0294 98.8326 68.0111C98.557 67.9927 98.3188 68.2012 98.3004 68.4767L98.0344 72.4678L94.0432 72.2018C93.7677 72.1834 93.5294 72.3919 93.5111 72.6674C93.4927 72.943 93.7012 73.1812 93.9767 73.1996L98.4667 73.4989ZM6.0559 3.27118C3.09924 9.01554 0.00693369 20.6738 0.262935 31.312C0.391006 36.6341 1.35778 41.7518 3.64242 45.7571C5.93936 49.7839 9.56135 52.6692 14.9241 53.4942L15.0761 52.5058C10.0389 51.7309 6.66924 49.0452 4.51104 45.2616C2.34055 41.4565 1.38865 36.5243 1.26265 31.288C1.01049 20.8095 4.06836 9.31779 6.94503 3.72882L6.0559 3.27118ZM14.9241 53.4942C21.4708 54.5014 28.4469 54.4999 35.5791 54.3749C42.7244 54.2497 50.0243 54.0007 57.2782 54.4988C71.7615 55.4934 85.9903 59.4625 98.1237 73.3293L98.8763 72.6707C86.5096 58.5375 71.9884 54.5066 57.3468 53.5012C50.0382 52.9993 42.682 53.2503 35.5616 53.3751C28.4283 53.5001 21.5294 53.4986 15.0761 52.5058L14.9241 53.4942Z" />
                                                </svg>
                                            <?php endif; ?>
                                            <div class="single-content">
                                                <?php if (!empty($data['matrik_about_genaral_content_area_content_title'])) : ?>
                                                    <h6><?php echo esc_html($data['matrik_about_genaral_content_area_content_title']); ?></h6>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_about_genaral_content_area_content_description'])) : ?>
                                                    <p><?php echo esc_html($data['matrik_about_genaral_content_area_content_description']); ?></p>
                                                <?php endif; ?>
                                            </div>

                                        </li>
                                    <?php
                                        $index++;
                                    endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-img-wrap">
                                <?php if (!empty($settings['matrik_about_genaral_content_area_banner_image']['url'])) : ?>
                                    <div class="about-img">
                                        <img src="<?php echo esc_url($settings['matrik_about_genaral_content_area_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_about_genaral_three_about_us_button'])) : ?>
                                    <div class="about-btn">
                                        <a class="primary-btn3" href="<?php echo esc_url($settings['matrik_about_genaral_three_about_us_button_url']['url']); ?>">
                                            <span><?php echo esc_html($settings['matrik_about_genaral_three_about_us_button']); ?>
                                            </span>
                                            <span><?php echo esc_html($settings['matrik_about_genaral_three_about_us_button']); ?>
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
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['matrik_about_genaral_style_selection'] == 'style_four') : ?>
            <div class="home4-about-section">
                <div class="container">
                    <div class="about-title-area wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <?php if (!empty($settings['matrik_about_genaral_subtitle'])) : ?>
                            <span><?php echo esc_html($settings['matrik_about_genaral_subtitle']); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($settings['matrik_about_genaral_title'])) : ?>
                            <h2><?php echo wp_kses($settings['matrik_about_genaral_title'], wp_kses_allowed_html('post'));  ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="row gy-lg-5 gy-4">
                        <?php if (!empty($settings['matrik_about_genaral_content_area_banner_image']['url'])) : ?>
                            <div class="col-lg-6 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="about-img magnetic-item">
                                    <img src="<?php echo esc_url($settings['matrik_about_genaral_content_area_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-6 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-content">
                                <?php if (!empty($settings['matrik_about_genaral_header_description'])) : ?>
                                    <p><?php echo esc_html($settings['matrik_about_genaral_header_description']); ?></p>
                                <?php endif; ?>
                                <ul>
                                    <?php foreach ($settings['matrik_about_genaral_content_area_content_list'] as $data) : ?>
                                        <li>
                                            <?php if ($data['matrik_about_genaral_content_area_content_title']) : ?>
                                                <h6><?php echo esc_html($data['matrik_about_genaral_content_area_content_title']); ?></h6>
                                            <?php endif; ?>
                                            <?php if (!empty($data['matrik_about_genaral_content_area_content_description'])) : ?>
                                                <p><?php echo esc_html($data['matrik_about_genaral_content_area_content_description']); ?></p>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_about_genaral_style_selection'] == 'style_five') : ?>
            <div class="home5-about-section">
                <div class="container">
                    <div class="row gy-sm-5 gy-4 mb-70">
                        <div class="col-lg-10 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="about-content-wrap">
                                <?php if (!empty($settings['matrik_about_genaral_title'])) : ?>
                                    <div class="section-title four white">
                                        <h2><?php echo esc_html($settings['matrik_about_genaral_title']); ?></h2>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_about_genaral_header_description'])) : ?>
                                    <p><?php echo esc_html($settings['matrik_about_genaral_header_description']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_about_genaral_five_banner_image_two']['url'])) : ?>
                                    <img src="<?php echo esc_url($settings['matrik_about_genaral_five_banner_image_two']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($settings['matrik_about_genaral_show_counter_area'] == 'yes') : ?>
                            <div class="col-lg-2 wow animate fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <ul class="counter-list">
                                    <?php foreach ($settings['matrik_about_counter_genaral_counter_list'] as $data) : ?>
                                        <li class="single-counter">
                                            <div class="number">
                                                <?php if (!empty($data['matrik_about_counter_genaral_counter_number'])) : ?>
                                                    <h2 class="counter"><?php echo esc_html($data['matrik_about_counter_genaral_counter_number']); ?></h2>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_about_counter_genaral_counter_sign'])) : ?>
                                                    <span><?php echo esc_html($data['matrik_about_counter_genaral_counter_sign']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($data['matrik_about_counter_genaral_counter_title'])) : ?>
                                                <div class="content">
                                                    <p><?php echo esc_html($data['matrik_about_counter_genaral_counter_title']); ?></p>
                                                </div>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($settings['matrik_about_genaral_show_partner_logo_area'] == 'yes') : ?>
                        <div class="logo-section four">
                            <div class="logo-wrap">
                                <?php if (!empty($settings['matrik_about_partner_logo_genaral_title'])) : ?>
                                    <div class="logo-title">
                                        <h6><?php echo esc_html($settings['matrik_about_partner_logo_genaral_title']); ?></h6>
                                    </div>
                                <?php endif; ?>
                                <div class="marquee">
                                    <div class="marquee__group">
                                        <?php foreach ($settings['matrik_about_partner_logo_genaral_list'] as $data) : ?>
                                            <a href="<?php echo esc_url($data['matrik_about_partner_logo_genaral_logo_url']['url']); ?>"><img src="<?php echo esc_url($data['matrik_about_partner_logo_genaral_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>"></a>
                                        <?php endforeach; ?>
                                    </div>
                                    <div aria-hidden="true" class="marquee__group">
                                        <?php foreach ($settings['matrik_about_partner_logo_genaral_list'] as $data) : ?>
                                            <a href="<?php echo esc_url($data['matrik_about_partner_logo_genaral_logo_url']['url']); ?>"><img src="<?php echo esc_url($data['matrik_about_partner_logo_genaral_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>"></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['matrik_about_genaral_style_selection'] == 'style_six') : ?>
            <div class="home6-about-section" id="scroll-section">
                <div class="container">
                    <div class="row gy-md-5 gy-4 mb-90">
                        <div class="col-lg-7 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms;">
                            <div class="about-content">
                                <div class="section-title five">
                                    <?php if (!empty($settings['matrik_about_genaral_subtitle'])) : ?>
                                        <span><?php echo esc_html($settings['matrik_about_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_about_genaral_title'])): ?>
                                        <h2><?php echo wp_kses($settings['matrik_about_genaral_title'], wp_kses_allowed_html('post')); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_about_genaral_header_description'])): ?>
                                        <p><?php echo esc_html($settings['matrik_about_genaral_header_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($settings['matrik_about_genaral_header_experience_year'])): ?>
                                    <div class="experience-area">
                                        <h2><?php echo esc_html($settings['matrik_about_genaral_header_experience_year']); ?></h2>
                                        <span><?php echo esc_html($settings['matrik_about_genaral_header_experience_year_text']); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="magnetic-wrap">
                                <div class="about-img-wrap magnetic-item">
                                    <div class="about-img">
                                        <?php if (!empty($settings['matrik_about_genaral_header_magnatic_item_image']['url'])): ?>
                                            <img src="<?php echo esc_url($settings['matrik_about_genaral_header_magnatic_item_image']['url']); ?>" alt="<?php echo esc_html__('about-us-image', 'matrik-core'); ?>">
                                        <?php endif; ?>
                                        <?php if (!empty($settings['matrik_about_genaral_header_magnatic_item_title'])): ?>
                                            <a class="about-btn" href="<?php echo esc_url($settings['matrik_about_genaral_header_magnatic_item_link']['url']); ?>"><?php echo esc_html($settings['matrik_about_genaral_header_magnatic_item_title']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($settings['matrik_about_genaral_header_magnatic_item_desc'])) : ?>
                                        <p><?php echo esc_html($settings['matrik_about_genaral_header_magnatic_item_desc']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row wow animate fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 200ms;">
                        <div class="col-xl-10">
                            <div class="counter-wrap">
                                <div class="row gy-sm-5 gy-4">
                                    <?php foreach ($settings['matrik_about_genaral_header_counter_content_list'] as $counter): ?>
                                        <?php if (!empty($counter['matrik_about_header_genaral_counter_number'])): ?>
                                            <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center divider">
                                                <div class="single-countdown">
                                                    <div class="number">
                                                        <h2 class="counter"><?php echo esc_html($counter['matrik_about_header_genaral_counter_number']); ?></h2>
                                                        <?php if (!empty($counter['matrik_about_header_genaral_counter_number_letter'])) : ?>
                                                            <span><?php echo esc_html($counter['matrik_about_header_genaral_counter_number_letter']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if (!empty($counter['matrik_about_header_genaral_counter_text'])) : ?>
                                                        <span><?php echo esc_html($counter['matrik_about_header_genaral_counter_text']); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                    <?php endif;
                                    endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_About_Widget());
