<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Testimonial_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_testimonial';
    }

    public function get_title()
    {
        return esc_html__('EG Testimonial', 'matrik-core');
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
            'matrik_testimonial_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_testimonial_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one'   => esc_html__('Style One', 'matrik-core'),
                    'style_two'   => esc_html__('Style Two', 'matrik-core'),
                    'style_three' => esc_html__('Style Three', 'matrik-core'),
                    'style_four'  => esc_html__('Style Four', 'matrik-core'),
                    'style_five'  => esc_html__('Style Five', 'matrik-core'),
                    'style_six'   => esc_html__('Style Six', 'matrik-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'matrik_testimonial_section_genaral_counter_section',
            [
                'label'        => esc_html__("Show Counter Section?", 'matrik-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'matrik-core'),
                'label_off'    => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'matrik_testimonial_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_section_genaral_testimonial_section',
            [
                'label'        => esc_html__("Show Testimonial Section?", 'matrik-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'matrik-core'),
                'label_off'    => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'matrik_testimonial_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_section_genaral_header_section',
            [
                'label'        => esc_html__("Show Header Section?", 'matrik-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'matrik-core'),
                'label_off'    => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'matrik_testimonial_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_section_genaral_pagination_section',
            [
                'label'        => esc_html__("Show Pagination Section?", 'matrik-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'matrik-core'),
                'label_off'    => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'matrik_testimonial_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_genaral_header_area',
            [
                'label'     => esc_html__('Header Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_genaral_subtitle',
            [
                'label'       => esc_html__('Subtitle', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Our Client Testimonial', 'matrik-core'),
                'placeholder' => esc_html__('write your subtitle here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_testimonial_genaral_style_selection' => ['style_one', 'style_two', 'style_five'],
                ]

            ]
        );

        $this->add_control(
            'matrik_testimonial_genaral_three_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Feedback From The Experts', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_testimonial_genaral_style_selection' => ['style_three', 'style_four', 'style_five'],
                ]

            ]
        );

        $this->add_control(
            'matrik_testimonial_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Trusted by Our Partners.', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_testimonial_genaral_style_selection' => ['style_one', 'style_two'],
                ]

            ]
        );

        $this->add_control(
            'matrik_testimonial_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Sed nisl eros, condimentum nec risus sitamet, finibus congu. Fusen fringilla est libero, sed tempus urna feugiat eu. Curabit eu feugiat ligu Suspendisse nectoraba.', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_testimonial_genaral_style_selection' => ['style_one', 'style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_banner_image',
            [
                'label'   => esc_html__('Banner Image', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'matrik_testimonial_genaral_style_selection' => ['style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_genaral_review_area',
            [
                'label'     => esc_html__('Review Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_testimonial_genaral_style_selection' => ['style_one', 'style_two', 'style_five', 'style_six'],
                ]
            ]
        );

        //style four repeater testimonial

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_testimonial_section_four_genaral_author_image',
            [
                'label'   => esc_html__('Author Image', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_four_genaral_author_name',
            [
                'label'       => esc_html__('Author Name', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Jhon Abraham', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_four_genaral_author_designation',
            [
                'label'       => esc_html__('Author Designation', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Software Engineer', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_four_genaral_author_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Great Metal Industry!', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'matrik_testimonial_section_four_genaral_author_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('“Feel free to customize the key features based on thena helps potential clients understand the specific valueles theyll receive at each pricing tier.”', 'matrik-core'),
                'placeholder' => esc_html__('Type your Titlte here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_four_genaral_author_social_icon',
            [
                'label'   => esc_html__('Icon', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_four_genaral_author_social_icon_url',
            [
                'label'       => esc_html__('Social Link/URL', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'matrik-core'),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,

            ]
        );

        $this->add_control(
            'matrik_testimonial_section_four_testimonial_list',
            [
                'label'   => esc_html__('Testimonial List', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_testimonial_section_four_genaral_author_name'        => esc_html__('Mr. Daniel Scoot', 'matrik-core'),
                        'matrik_testimonial_section_four_genaral_author_social_icon' => [
                            'value'   => 'bx bxl-linkedin',
                            'library' => 'boxicons',
                        ],
                    ],
                    [
                        'matrik_testimonial_section_four_genaral_author_name'        => esc_html__('Mr. Jeams Torbak', 'matrik-core'),
                        'matrik_testimonial_section_four_genaral_author_social_icon' => [
                            'value'   => 'bi bi-twitter-x',
                            'library' => 'boxicons',
                        ],
                    ],
                    [
                        'matrik_testimonial_section_four_genaral_author_name'        => esc_html__('Matthew Julian', 'matrik-core'),
                        'matrik_testimonial_section_four_genaral_author_social_icon' => [
                            'value'   => 'bx bxl-instagram',
                            'library' => 'boxicons',
                        ],
                    ],
                    [
                        'matrik_testimonial_section_four_genaral_author_name'        => esc_html__('Olivern James', 'matrik-core'),
                        'matrik_testimonial_section_four_genaral_author_social_icon' => [
                            'value'   => 'bx bxl-facebook',
                            'library' => 'boxicons',
                        ],
                    ],


                ],
                'title_field' => '{{{ matrik_testimonial_section_four_genaral_author_name  }}}',
                'condition'   => [
                    'matrik_testimonial_genaral_style_selection' => ['style_four', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_service_genaral_contact_title_text',
            [
                'label'       => esc_html__('Contact Title Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => wp_kses('Hey Creative People <a href="/contact">Become a Client</a> Of Our Family!', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_testimonial_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_testimonial_genaral_review_area_review_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Review On', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_genaral_review_area_review_logo',
            [
                'label'       => esc_html__('Logo', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater->add_control(
            'matrik_hero_banner_one_genaral_button_style',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'google' => esc_html__('Google', 'matrik-core'),
                    'others' => esc_html__('Others', 'matrik-core'),
                ],
                'default' => 'others',
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_genaral_review_area_review_rating',
            [
                'label'   => esc_html__('Rating', 'matrik-core'),
                'type'    => Controls_Manager::NUMBER,
                'min'     => 0,
                'max'     => 5,
                'step'    => 1,
                'default' => 5,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_genaral_review_area_review_total_review',
            [
                'label'       => esc_html__('Total Review', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('(50 Reviews)', 'matrik-core'),
                'placeholder' => esc_html__('write your total review here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_genaral_review_area_review_link',
            [
                'label'   => esc_html__('Review URL/Link', 'matrik-core'),
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
            'matrik_testimonial_genaral_review_area_review_list',
            [
                'label'   => esc_html__('Review List', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_testimonial_genaral_review_area_review_title' => esc_html('Review On'),

                    ],
                    [
                        'matrik_testimonial_genaral_review_area_review_title' => esc_html('Review On'),


                    ],

                ],
                'title_field' => '{{{ matrik_testimonial_genaral_review_area_review_title }}}',
                'condition'   => [
                    'matrik_testimonial_genaral_style_selection' => ['style_one', 'style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_contact_area',
            [
                'label'     => esc_html__('Contact Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'matrik_testimonial_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_contact_area_expert_gallery',
            [
                'label'      => esc_html__('Add Expert Images', 'matrik-core'),
                'type'       => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default'    => [],
                'condition'  => [
                    'matrik_testimonial_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_contact_area_button_text',
            [
                'label'       => esc_html__('Button Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Connect With Us', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
                'condition'   => [
                    'matrik_testimonial_genaral_style_selection' => ['style_five', 'style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_contact_area_button_text_url',
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
                'condition'   => [
                    'matrik_testimonial_genaral_style_selection' => ['style_five', 'style_six'],
                ]
            ]
        );


        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_testimonial_two_genaral_review_area_review_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Review On', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_two_genaral_review_area_review_logo',
            [
                'label'       => esc_html__('Logo', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['svg', 'image'],
                'default'     => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater->add_control(
            'matrik_testimonial_two_genaral_review_area_review_rating_text',
            [
                'label'       => esc_html__('Review Rating Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('4.9 Rating', 'matrik-core'),
                'placeholder' => esc_html__('write your total review here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_two_genaral_review_area_review_rating_text_link',
            [
                'label'   => esc_html__('Review URL/Link', 'matrik-core'),
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
            'matrik_testimonial_two_genaral_review_area_review_list',
            [
                'label'   => esc_html__('Review List', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_testimonial_two_genaral_review_area_review_title' => esc_html('Review On'),

                    ],
                    [
                        'matrik_testimonial_two_genaral_review_area_review_title' => esc_html('Review On'),


                    ],

                ],
                'title_field' => '{{{ matrik_testimonial_two_genaral_review_area_review_title }}}',
                'condition'   => [
                    'matrik_testimonial_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->end_controls_section();


        //testimonial section
        $this->start_controls_section(
            'matrik_testimonial_section_genaral',
            [
                'label'     => esc_html__('Testimonials', 'matrik-core'),
                'condition' => [
                    'matrik_testimonial_genaral_style_selection' => ['style_one', 'style_two', 'style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_section_genaral_pagination',
            [
                'label'        => esc_html__("Show Slider Pagination?", 'matrik-core'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Enable', 'matrik-core'),
                'label_off'    => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_testimonial_section_genaral_author_image',
            [
                'label'   => esc_html__('Author Image', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_genaral_author_name',
            [
                'label'       => esc_html__('Author Name', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Jhon Abraham', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_genaral_author_designation',
            [
                'label'       => esc_html__('Author Designation', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Software Engineer', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_genaral_author_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Excellent quality production!', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'matrik_testimonial_section_genaral_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('“You are welcome to modify the key feature according to the services you provide for each plan. This breakdown offers several potential Meet the social media team that oversees top businesses.where clients are essential the Gong”.', 'matrik-core'),
                'placeholder' => esc_html__('Type your Titlte here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_testimonial_section_genaral_testimonial_list',
            [
                'label'   => esc_html__('Testimonial List', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_testimonial_section_genaral_author_name' => esc_html__('Mr. Daniel Scoot', 'matrik-core'),
                    ],
                    [
                        'matrik_testimonial_section_genaral_author_name' => esc_html__('Mr. Jeams Torbak', 'matrik-core'),
                    ],
                    [
                        'matrik_testimonial_section_genaral_author_name' => esc_html__('Matthew Julian', 'matrik-core'),
                    ],
                    [
                        'matrik_testimonial_section_genaral_author_name' => esc_html__('Olivern James', 'matrik-core'),
                    ],

                ],
                'title_field' => '{{{ matrik_testimonial_section_genaral_author_name  }}}',
            ]
        );


        $this->end_controls_section();

        //testimonial section
        $this->start_controls_section(
            'matrik_testimonial_counter_section_three_genaral',
            [
                'label'     => esc_html__('Counter Section', 'matrik-core'),
                'condition' => [
                    'matrik_testimonial_genaral_style_selection'         => ['style_three'],
                    'matrik_testimonial_section_genaral_counter_section' => 'yes',
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_testimonial_counter_section_three_genaral_counter_number',
            [
                'label'       => esc_html__('Counter Number', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('45', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_counter_section_three_genaral_counter_sign',
            [
                'label'       => esc_html__('Counter Sign', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('+', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_counter_section_three_genaral_counter_title',
            [
                'label'       => esc_html__('Counter Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Green Spaces', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_testimonial_counter_section_three_genaral_counter_list',
            [
                'label'   => esc_html__('Counter List', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_testimonial_counter_section_three_genaral_counter_number' => 45,
                        'matrik_testimonial_counter_section_three_genaral_counter_sign'   => '+',
                        'matrik_testimonial_counter_section_three_genaral_counter_title'  => esc_html__('Green Spaces', 'matrik-core'),
                    ],
                    [
                        'matrik_testimonial_counter_section_three_genaral_counter_number' => 15,
                        'matrik_testimonial_counter_section_three_genaral_counter_sign'   => '',
                        'matrik_testimonial_counter_section_three_genaral_counter_title'  => esc_html__('Skilled Professionals', 'matrik-core'),
                    ],
                    [
                        'matrik_testimonial_counter_section_three_genaral_counter_number' => 5,
                        'matrik_testimonial_counter_section_three_genaral_counter_sign'   => '',
                        'matrik_testimonial_counter_section_three_genaral_counter_title'  => esc_html__('Years of Experience', 'matrik-core'),
                    ],
                    [
                        'matrik_testimonial_counter_section_three_genaral_counter_number' => 2,
                        'matrik_testimonial_counter_section_three_genaral_counter_sign'   => esc_html__('M', 'matrik-core'),
                        'matrik_testimonial_counter_section_three_genaral_counter_title'  => esc_html__('Square Meters', 'matrik-core'),
                    ],

                ],
                'title_field' => '{{{ matrik_testimonial_counter_section_three_genaral_counter_number  }}}',
            ]
        );

        $this->end_controls_section();


        //testimonial section
        $this->start_controls_section(
            'matrik_testimonial_section_three_genaral',
            [
                'label'     => esc_html__('Testimonials', 'matrik-core'),
                'condition' => [
                    'matrik_testimonial_genaral_style_selection'             => ['style_three'],
                    'matrik_testimonial_section_genaral_testimonial_section' => 'yes',
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_testimonial_section_three_genaral_author_image',
            [
                'label'   => esc_html__('Author Image', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_three_genaral_testimonial_banner_image',
            [
                'label'   => esc_html__('Testimonial Banner Image', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_three_genaral_author_name',
            [
                'label'       => esc_html__('Author Name', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Jhon Abraham', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_three_genaral_author_designation',
            [
                'label'       => esc_html__('Author Designation', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Software Engineer', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_three_genaral_author_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Excellent quality production!', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'matrik_testimonial_section_three_genaral_author_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('“You are welcome to modify the key feature according to the services you provide for each plan. This breakdown offers several potential Meet the social media team that oversees top businesses.where clients are essential the Gong”.', 'matrik-core'),
                'placeholder' => esc_html__('Type your Titlte here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_three_genaral_author_social_icon',
            [
                'label'   => esc_html__('Icon', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-circle',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                    'fa-regular' => [
                        'circle',
                        'dot-circle',
                        'square-full',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'matrik_testimonial_section_three_genaral_author_social_icon_url',
            [
                'label'       => esc_html__('Social Link/URL', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'matrik-core'),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '#',
                    'is_external' => true,
                    'nofollow'    => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,

            ]
        );

        $this->add_control(
            'matrik_testimonial_section_three_testimonial_list',
            [
                'label'   => esc_html__('Testimonial List', 'matrik-core'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_testimonial_section_three_genaral_author_name'        => esc_html__('Mr. Daniel Scoot', 'matrik-core'),
                        'matrik_testimonial_section_three_genaral_author_social_icon' => [
                            'value'   => 'bx bxl-linkedin',
                            'library' => 'boxicons',
                        ],
                    ],
                    [
                        'matrik_testimonial_section_three_genaral_author_name'        => esc_html__('Mr. Jeams Torbak', 'matrik-core'),
                        'matrik_testimonial_section_three_genaral_author_social_icon' => [
                            'value'   => 'bx bxl-linkedin',
                            'library' => 'boxicons',
                        ],
                    ],
                    [
                        'matrik_testimonial_section_three_genaral_author_name'        => esc_html__('Matthew Julian', 'matrik-core'),
                        'matrik_testimonial_section_three_genaral_author_social_icon' => [
                            'value'   => 'bx bxl-linkedin',
                            'library' => 'boxicons',
                        ],
                    ],
                    [
                        'matrik_testimonial_section_three_genaral_author_name'        => esc_html__('Olivern James', 'matrik-core'),
                        'matrik_testimonial_section_three_genaral_author_social_icon' => [
                            'value'   => 'bx bxl-linkedin',
                            'library' => 'boxicons',
                        ],
                    ],

                ],
                'title_field' => '{{{ matrik_testimonial_section_three_genaral_author_name  }}}',
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_testimonial_one_section_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_testimonial_genaral_style_selection' => ['style_one'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_subtitle',
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
                'name'     => 'matrik_testimonial_one_section_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_title',
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
                'name'     => 'matrik_testimonial_one_section_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_description',
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
                'name'     => 'matrik_testimonial_one_section_genaral_description_typ',
                'selector' => '{{WRAPPER}} .section-title p',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_review_title',
            [
                'label'     => esc_html__('Review Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_one_section_genaral_review_title_typ',
                'selector' => '{{WRAPPER}} .home1-testimonial-section .testimonial-title-area .rating-list li .single-rating .review span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_review_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-testimonial-section .testimonial-title-area .rating-list li .single-rating .review span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_rating_star',
            [
                'label'     => esc_html__('Rating Star', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_one_section_genaral_rating_star_typ',
                'selector' => '{{WRAPPER}} .home1-testimonial-section .testimonial-title-area .rating-list li .single-rating .rating .star li i',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_rating_star_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-testimonial-section .testimonial-title-area .rating-list li .single-rating .rating .star li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_rating_star_second_color',
            [
                'label'     => esc_html__('Second Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-testimonial-section .testimonial-title-area .rating-list li .single-rating.google .rating .star li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_rating_count',
            [
                'label'     => esc_html__('Rating Counter', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_one_section_genaral_rating_count_typ',
                'selector' => '{{WRAPPER}} .home1-testimonial-section .testimonial-title-area .rating-list li .single-rating .rating span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_rating_count_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home1-testimonial-section .testimonial-title-area .rating-list li .single-rating .rating span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_quote',
            [
                'label'     => esc_html__('Quote Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_one_section_genaral_quote_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .quote',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_quote_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .quote' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_author_text',
            [
                'label'     => esc_html__('Author Text Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_one_section_genaral_author_text_typ',
                'selector' => '{{WRAPPER}} .testimonial-card > span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_author_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_author_name1',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_one_section_genaral_author_name1_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-content span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_author_name1_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_author_name',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_one_section_genaral_author_name_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-content h5',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_one_section_genaral_author_designation_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-content span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_author_designation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_card',
            [
                'label'     => esc_html__('Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_card_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_pagination',
            [
                'label'     => esc_html__('Pagination', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_one_section_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_testimonial_three_section_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_testimonial_genaral_style_selection' => ['style_three'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_global',
            [
                'label'     => esc_html__('Global Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_global_section_bg',
            [
                'label'     => esc_html__('Section Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_title',
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
                'name'     => 'matrik_testimonial_three_section_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.white h2',

            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.white h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_quote_icon',
            [
                'label'     => esc_html__('Quote Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_three_section_genaral_quote_icon_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .quote',

            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_quote_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .quote' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area',
            [
                'label'     => esc_html__('Testimonial Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_title',
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
                'name'     => 'matrik_testimonial_three_section_genaral_testimonial_area_title_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content > span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_description',
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
                'name'     => 'matrik_testimonial_three_section_genaral_testimonial_area_description_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content p',

            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_description_left_icon_color',
            [
                'label'     => esc_html__('Left Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-career-opportunity-section .career-opportunity-title-area p::before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_author_name',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_three_section_genaral_testimonial_area_author_name_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .author-and-social-area .author-area .author-content h5',

            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .author-and-social-area .author-area .author-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_three_section_genaral_testimonial_area_author_designation_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .author-and-social-area .author-area .author-content span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_author_designation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .author-and-social-area .author-area .author-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_author_social_icon',
            [
                'label'     => esc_html__('Author Social Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_three_section_genaral_testimonial_area_author_social_icon_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .author-and-social-area .social-area a i',

            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_author_social_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .author-and-social-area .social-area a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_author_social_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .author-and-social-area .social-area a:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_author_social_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .author-and-social-area .social-area a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_testimonial_area_author_social_icon_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .testimonial-card2 .testimonial-content .author-and-social-area .social-area a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_counter_title1',
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
                'name'     => 'matrik_testimonial_three_section_genaral_counter_title1_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .counter-wrap .single-countdown .number h2',

            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_counter_title1_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .counter-wrap .single-countdown .number h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_counter_sign',
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
                'name'     => 'matrik_testimonial_three_section_genaral_counter_sign_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .counter-wrap .single-countdown .number span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_counter_sign_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .counter-wrap .single-countdown .number span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_counter_title',
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
                'name'     => 'matrik_testimonial_three_section_genaral_counter_title_typ',
                'selector' => '{{WRAPPER}} .home3-testimonial-section .counter-wrap .single-countdown span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_three_section_genaral_counter_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home3-testimonial-section .counter-wrap .single-countdown span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_testimonial_four_section_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_testimonial_genaral_style_selection' => ['style_four'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_card',
            [
                'label'     => esc_html__('Testimonial Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_color_card',
            [
                'label'     => esc_html__('Card Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.three' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_color_border_card',
            [
                'label'     => esc_html__('Card Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.three' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_title',
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
                'name'     => 'matrik_testimonial_four_section_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial',
            [
                'label'     => esc_html__('Testimonial', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_title',
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
                'name'     => 'matrik_testimonial_four_section_style_genaral_testimonial_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-card.three > span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.three > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_description',
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
                'name'     => 'matrik_testimonial_four_section_style_genaral_testimonial_description_typ',
                'selector' => '{{WRAPPER}} .testimonial-card p',

            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_author_name',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_four_section_style_genaral_testimonial_author_name_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-content h5',

            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_four_section_style_genaral_testimonial_author_designation_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-content span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_author_designation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-content span' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_social_icon',
            [
                'label'     => esc_html__('Author Social Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_four_section_style_genaral_testimonial_social_icon_typ',
                'selector' => '{{WRAPPER}} .testimonial-card.three .author-and-social-area .social-area a i',

            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_social_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.three .author-and-social-area .social-area a i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_social_icon_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.three .author-and-social-area .social-area a:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_social_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.three .author-and-social-area .social-area a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_social_icon_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.three .author-and-social-area .social-area a:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_list_border',
            [
                'label'     => esc_html__('Testimonial List Border', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_list_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.three .author-and-social-area' => 'border-top: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_contact',
            [
                'label'     => esc_html__('Bottom Contact Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_four_section_style_genaral_testimonial_bottom_contact_typ',
                'selector' => '{{WRAPPER}} .home4-testimonial-section .slider-btn-grp h6',

            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_contact_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-testimonial-section .slider-btn-grp h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_contact_link_color',
            [
                'label'     => esc_html__('Link Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-testimonial-section .slider-btn-grp h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_contact_hover_link_color',
            [
                'label'     => esc_html__('Hover Link Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-testimonial-section .slider-btn-grp h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_pagination',
            [
                'label'     => esc_html__('Pagination', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_four_section_style_genaral_testimonial_bottom_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp .slider-btn i',

            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_pagination_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_four_section_style_genaral_testimonial_bottom_pagination_bg_hover_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_testimonial_five_section_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_testimonial_genaral_style_selection' => ['style_five'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_subtitle',
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
                'name'     => 'matrik_testimonial_five_section_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title.four span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four span svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_title',
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
                'name'     => 'matrik_testimonial_five_section_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .section-title.four h2',

            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.four h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area',
            [
                'label'     => esc_html__('Testimonial Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_title',
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
                'name'     => 'matrik_testimonial_five_section_style_genaral_testimonial_area_title_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .testimonial-card3 span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .testimonial-card3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_description',
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
                'name'     => 'matrik_testimonial_five_section_style_genaral_testimonial_area_description_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .testimonial-card3 p',

            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .testimonial-card3 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_author_name',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_five_section_style_genaral_testimonial_area_author_name_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .testimonial-card3 .author-area h5',

            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .testimonial-card3 .author-area h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_five_section_style_genaral_testimonial_area_author_designation_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .testimonial-card3 .author-area span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_author_designation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .testimonial-card3 .author-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_contact_button',
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
                'name'     => 'matrik_testimonial_five_section_style_genaral_testimonial_area_contact_button_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .contact-btn-area .contact-btn',

            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_contact_button_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .contact-btn-area .contact-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_contact_button_after_color',
            [
                'label'     => esc_html__('After Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .contact-btn-area .contact-btn::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_contact_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .contact-btn-area .contact-btn svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_pagination',
            [
                'label'     => esc_html__('Pagination', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_five_section_style_genaral_testimonial_area_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp .slider-btn i',

            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_pagination_border_hover_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.three .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_testimonial_area_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.three .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_review_area',
            [
                'label'     => esc_html__('Review Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_review_area_title',
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
                'name'     => 'matrik_testimonial_five_section_style_genaral_review_area_title_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .rating-and-btn-area .rating-list li .single-rating .review span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_review_area_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .rating-and-btn-area .rating-list li .single-rating .review span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_review_area_rating_icon',
            [
                'label'     => esc_html__('Rating Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_review_area_rating_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .rating-and-btn-area .rating-list li .single-rating .rating .star li i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_review_area_rating_counter_text',
            [
                'label'     => esc_html__('Rating Counter Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_five_section_style_genaral_review_area_rating_counter_text_typ',
                'selector' => '{{WRAPPER}} .home5-testimonial-section .rating-and-btn-area .rating-list li .single-rating .rating span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_review_area_rating_counter_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .rating-and-btn-area .rating-list li .single-rating .rating span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_review_area_review_section',
            [
                'label'     => esc_html__('Review Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_review_area_review_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .rating-and-btn-area .rating-list li .single-rating' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_five_section_style_genaral_review_area_review_section_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home5-testimonial-section .rating-and-btn-area .rating-list li .single-rating' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //Style Six Start
        $this->start_controls_section(
            'matrik_testimonial_six_section_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_testimonial_genaral_style_selection' => ['style_six'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_title',
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
                'name'     => 'matrik_testimonial_six_section_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home6-testimonial-section .testimonial-card4 span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-card4 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_desc',
            [
                'label'     => esc_html__('Testimoni', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_six_section_style_genaral_desc_typ',
                'selector' => '{{WRAPPER}} .home6-testimonial-section .testimonial-card4 p',

            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_desc_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-card4 p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_author',
            [
                'label'     => esc_html__('Author', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Author Name Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_six_section_style_genaral_author_name_typ',
                'selector' => '{{WRAPPER}} .home6-testimonial-section .testimonial-card4 .author-area h5',

            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_author_name_color',
            [
                'label'     => esc_html__('Name Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-card4 .author-area h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Author Designation Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_six_section_style_genaral_author_designation_typ',
                'selector' => '{{WRAPPER}} .home6-testimonial-section .testimonial-card4 .author-area span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_author_designation_color',
            [
                'label'     => esc_html__('Designation Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .testimonial-card4 .author-area span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_slider_button',
            [
                'label'     => esc_html__('Slider Button', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_slider_button_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .slider-btn-grp.four.white .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_slider_button_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .slider-btn-grp.four.white .slider-btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_slider_button_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .slider-btn-grp.four.white .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_slider_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .slider-btn-grp.four.white .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_slider_button_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .slider-btn-grp.four.white .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_slider_button_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .slider-btn-grp.four.white .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_contact_area',
            [
                'label'     => esc_html__('Contact Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_six_section_style_genaral_contact_typ',
                'selector' => '{{WRAPPER}} .home6-testimonial-section .contact-btn-area .contact-btn',

            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_contact_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .contact-btn-area .contact-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_contact_area_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .contact-btn-area .contact-btn::after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_six_section_style_genaral_contact_area_hover_icon_color',
            [
                'label'     => esc_html__('Hover Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home6-testimonial-section .contact-btn-area .contact-btn svg' => 'stroke: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_testimonial_two_section_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_testimonial_genaral_style_selection' => ['style_two'],
                ]
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_card',
            [
                'label'     => esc_html__('Testimonial Card', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_card_color',
            [
                'label'     => esc_html__('Card Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_subtitle',
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
                'name'     => 'matrik_testimonial_two_section_style_genaral_subtitle_typ',
                'selector' => '{{WRAPPER}} .section-title > span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_subtitle_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_subtitle_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title > span::after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_title',
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
                'name'     => 'matrik_testimonial_two_section_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .section-title h2',

            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_description',
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
                'name'     => 'matrik_testimonial_two_section_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .section-title p',

            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_description_down_arrow_color',
            [
                'label'     => esc_html__('Down Arrow Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.two .arrow-down' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_rating_bg_section',
            [
                'label'     => esc_html__('Rating Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_rating_bg_section_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .rating-list li .single-rating' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_rating_title',
            [
                'label'     => esc_html__('Rating Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_two_section_style_genaral_rating_title_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .rating-list li .single-rating h6',

            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_rating_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .rating-list li .single-rating h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_rating_area',
            [
                'label'     => esc_html__('Rating Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_two_section_style_genaral_rating_area_typ',
                'selector' => '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .rating-list li .single-rating .review span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_rating_area_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .rating-list li .single-rating .review span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_rating_area_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .rating-list li .single-rating .review' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_rating_area_logo_bg_color',
            [
                'label'     => esc_html__('Logo Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .rating-list li .single-rating .review .logo' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_rating_area_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home2-testimonial-section .testimonial-title-area .rating-list li .single-rating' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_quote_icon',
            [
                'label'     => esc_html__('Quote Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_quote_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .quote' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_title',
            [
                'label'     => esc_html__('Testimonial Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_two_section_style_genaral_testimonial_title_typ',
                'selector' => '{{WRAPPER}} .testimonial-card.two > span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card.two > span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_description',
            [
                'label'     => esc_html__('Testimonial Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_two_section_style_genaral_testimonial_description_typ',
                'selector' => '{{WRAPPER}} .testimonial-card p',

            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_author_name',
            [
                'label'     => esc_html__('Author Name', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_two_section_style_genaral_testimonial_author_name_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-content h5',

            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_author_name_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-content h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_author_designation',
            [
                'label'     => esc_html__('Author Designation', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_two_section_style_genaral_testimonial_author_designation_typ',
                'selector' => '{{WRAPPER}} .testimonial-card .author-area .author-content span',

            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_testimonial_author_designation_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-card .author-area .author-content span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_pagination',
            [
                'label'     => esc_html__('Pagination', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_testimonial_two_section_style_genaral_pagination_typ',
                'selector' => '{{WRAPPER}} .slider-btn-grp .slider-btn i',

            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_pagination_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_pagination_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_pagination_border_color',
            [
                'label'     => esc_html__('Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'border: 1px solid {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_pagination_hover_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_pagination_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp .slider-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_testimonial_two_section_style_genaral_pagination_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-btn-grp.two .slider-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();
    }


    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>
        <?php if (is_admin()): ?>
            <script>
                var swiper = new Swiper(".home1-testimonial-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 35,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".testimonial-slider-next",
                        prevEl: ".testimonial-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 2,
                        },
                        1200: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 2,
                        },
                    },
                });
                var swiper = new Swiper(".home2-testimonial-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 35,
                    effect: "fade", // Use the fade effect
                    fadeEffect: {
                        crossFade: true, // Enable cross-fade transition
                    },
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".testimonial-slider-next",
                        prevEl: ".testimonial-slider-prev",
                    },
                });
                // Home3 Blog Slider
                var swiper = new Swiper(".home3-blog-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".blog-slider-next",
                        prevEl: ".blog-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        1200: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 2,
                        },
                    },
                });
                var swiper = new Swiper(".home3-testimonial-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 24,
                    effect: "fade", // Use the fade effect
                    fadeEffect: {
                        crossFade: true, // Enable cross-fade transition
                    },
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".testimonial-slider-next",
                        prevEl: ".testimonial-slider-prev",
                    },
                });
                // Home3 Team Slider
                var swiper = new Swiper(".home3-team-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 0,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: ".swiper-pagination1",
                        clickable: true,
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                            spaceBetween: 24,
                        },
                        386: {
                            slidesPerView: 1,
                            spaceBetween: 24,
                        },
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 24,
                        },
                        768: {
                            slidesPerView: 3,
                        },
                        992: {
                            slidesPerView: 4,
                        },
                        1200: {
                            slidesPerView: 5,
                        },
                        1400: {
                            slidesPerView: 5,
                        },
                    },
                });

                var swiper = new Swiper(".home4-testimonial-slider", {
                    slidesPerView: 1,
                    speed: 1500,
                    spaceBetween: 35,
                    autoplay: {
                        delay: 2500, // Autoplay duration in milliseconds
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".testimonial-slider-next",
                        prevEl: ".testimonial-slider-prev",
                    },
                    breakpoints: {
                        280: {
                            slidesPerView: 1,
                        },
                        386: {
                            slidesPerView: 1,
                        },
                        576: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: 2,
                        },
                        992: {
                            slidesPerView: 2,
                        },
                        1200: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                        },
                        1400: {
                            slidesPerView: 3,
                        },
                    },
                });
            </script>
        <?php endif; ?>

        <?php if ($settings['matrik_testimonial_genaral_style_selection'] == 'style_one'): ?>
            <div class="home1-testimonial-section">
                <div class="container-fluid">
                    <div class="row gy-5">
                        <div class="col-xl-4">
                            <div class="testimonial-title-area wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="section-title">
                                    <?php if (!empty($settings['matrik_testimonial_genaral_subtitle'])): ?>
                                        <span><?php echo esc_html($settings['matrik_testimonial_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_testimonial_genaral_title'])): ?>
                                        <h2><?php echo esc_html($settings['matrik_testimonial_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_testimonial_genaral_description'])): ?>
                                        <p><?php echo esc_html($settings['matrik_testimonial_genaral_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <ul class="rating-list">

                                    <?php foreach ($settings['matrik_testimonial_genaral_review_area_review_list'] as $data): ?>
                                        <li>
                                            <a href="<?php echo esc_url($data['matrik_testimonial_genaral_review_area_review_link']['url']); ?>" class="single-rating <?php if ($data['matrik_hero_banner_one_genaral_button_style'] == 'google') : ?>google<?php else: ?><?php endif; ?> ">
                                                <div class="review">
                                                    <?php if (!empty($data['matrik_testimonial_genaral_review_area_review_title'])): ?>
                                                        <span><?php echo esc_html($data['matrik_testimonial_genaral_review_area_review_title']); ?></span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['matrik_testimonial_genaral_review_area_review_logo']['url'])): ?>
                                                        <img src="<?php echo esc_url($data['matrik_testimonial_genaral_review_area_review_logo']['url']); ?>" alt="<?php echo esc_attr__('company-logo', 'matrik-core'); ?>">
                                                    <?php endif; ?>
                                                </div>
                                                <div class="rating">
                                                    <ul class="star">
                                                        <?php $rank_counter = intval($data['matrik_testimonial_genaral_review_area_review_rating']);
                                                        $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                                            <?php if ($i <= $rank_counter) : ?>
                                                                <li><i class="bi bi-star-fill"></i></li>
                                                            <?php endif ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                    <?php if (!empty($data['matrik_testimonial_genaral_review_area_review_total_review'])): ?>
                                                        <span><?php echo esc_html($data['matrik_testimonial_genaral_review_area_review_total_review']); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="swiper home1-testimonial-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['matrik_testimonial_section_genaral_testimonial_list'] as $data): ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card">
                                                <svg class="quote" width="46" height="42" viewBox="0 0 46 42" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M19.3074 22.4375C19.0109 24.7824 18.4898 27.0555 17.9059 28.5469C15.8664 33.7848 11.2574 38.277 5.21094 40.9184C4.07891 41.4125 3.00977 41.2418 2.37188 40.4691C2.22813 40.2895 1.64415 39.1754 1.07813 38.0074L1.07111 37.9928C0.0628121 35.8959 0.0449269 35.8587 0.0449268 35.2402C0.0539122 34.0902 0.413287 33.668 2.06641 32.8773C5.27383 31.332 7.16055 29.5801 8.40039 26.9746C8.98438 25.7438 9.28086 24.8543 9.55938 23.4707C9.73907 22.5723 9.97266 20.5867 9.97266 19.9129C9.97266 19.7422 9.87383 19.7422 6.21719 19.7422L2.46172 19.7422L1.99454 19.5086C1.73399 19.3828 1.40157 19.1313 1.25782 18.9516C1.18695 18.8658 1.12525 18.7941 1.07158 18.7167C0.703361 18.1862 0.713199 17.3932 0.736722 10.0301L0.73675 10.0223C0.763674 2.37538 0.763737 2.3573 0.952347 1.99805C1.22188 1.50391 1.58125 1.15352 2.06641 0.928908C2.47071 0.740236 2.5336 0.740236 10.2871 0.740235L18.1035 0.740235L18.4719 0.937891C18.948 1.18945 19.3344 1.57578 19.55 2.01602C19.7117 2.33945 19.7207 2.68086 19.7207 10.2188C19.7207 18.3945 19.6848 19.4996 19.3074 22.4375ZM17.8522 1.74023L10.2871 1.74024C6.40188 1.74024 4.46426 1.74031 3.44357 1.76356C2.92494 1.77537 2.69152 1.79262 2.57391 1.80958C2.54369 1.81394 2.53418 1.81503 2.52538 1.81814C2.51753 1.82092 2.51024 1.82531 2.4893 1.8351L2.48653 1.83637C2.2145 1.96232 2.00802 2.15202 1.83171 2.47421C1.83173 2.47587 1.83148 2.47868 1.83077 2.48319C1.81501 2.58363 1.79708 2.79935 1.78353 3.3051C1.75698 4.29626 1.75022 6.19753 1.73672 10.0336L1.73564 10.3707C1.72277 14.3836 1.71656 16.3201 1.77656 17.3432C1.80775 17.8752 1.85318 18.0523 1.87579 18.1135C1.87661 18.1157 1.87712 18.1175 1.87761 18.1192C1.8816 18.1328 1.88332 18.1387 2.02856 18.3144L2.03367 18.3206L2.03672 18.3244C2.03678 18.3244 2.04731 18.3363 2.07257 18.3595C2.10178 18.3863 2.14029 18.4185 2.18559 18.4527C2.28143 18.5252 2.3731 18.5809 2.42928 18.608L2.69779 18.7422L6.28558 18.7422C8.05331 18.7422 9.00638 18.7422 9.51041 18.7645C9.72208 18.7739 10.0056 18.789 10.2401 18.8738C10.3866 18.9267 10.6434 19.0511 10.8178 19.3404C10.9744 19.6004 10.973 19.8548 10.9727 19.9079C10.9727 19.9098 10.9727 19.9115 10.9727 19.9129C10.9727 20.6739 10.7276 22.7288 10.54 23.6668L10.5397 23.668C10.2453 25.1304 9.92333 26.0976 9.30386 27.4033L9.30337 27.4043C7.94366 30.2617 5.86228 32.1585 2.50046 33.7782L2.49787 33.7795C1.66324 34.1787 1.34343 34.4051 1.19924 34.5738C1.1208 34.6656 1.04893 34.7815 1.04493 35.2443C1.04497 35.4018 1.04745 35.4529 1.05366 35.4966C1.05826 35.529 1.06907 35.5852 1.11714 35.7134C1.22831 36.0099 1.45872 36.4913 1.97867 37.5726C2.25755 38.1481 2.53993 38.7083 2.76871 39.144C2.88347 39.3625 2.98221 39.5449 3.0588 39.6801C3.12413 39.7954 3.15556 39.8442 3.16026 39.8528C3.44126 40.1748 3.98101 40.364 4.81062 40.002C10.659 37.4471 15.0477 33.1312 16.974 28.184L16.9747 28.1823C17.5179 26.7949 18.0248 24.6102 18.3153 22.3121L18.3156 22.3101C18.6836 19.445 18.7207 18.4017 18.7207 10.2188C18.7207 6.44338 18.7184 4.48759 18.6962 3.43299C18.685 2.89883 18.6691 2.63484 18.6521 2.49403C18.6492 2.46982 18.6466 2.45272 18.6447 2.4414C18.5291 2.21446 18.3069 1.98169 18.0048 1.82208L17.8522 1.74023Z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M45.3074 22.4375C45.0109 24.7824 44.4898 27.0555 43.9059 28.5469C41.8664 33.7848 37.2574 38.277 31.2109 40.9184C30.0789 41.4125 29.0098 41.2418 28.3719 40.4691C28.2281 40.2895 27.6441 39.1754 27.0781 38.0074L27.0711 37.9928C26.0628 35.8959 26.0449 35.8587 26.0449 35.2402C26.0539 34.0902 26.4133 33.668 28.0664 32.8773C31.2738 31.332 33.1606 29.5801 34.4004 26.9746C34.9844 25.7438 35.2809 24.8543 35.5594 23.4707C35.7391 22.5723 35.9727 20.5867 35.9727 19.9129C35.9727 19.7422 35.8738 19.7422 32.2172 19.7422L28.4617 19.7422L27.9945 19.5086C27.734 19.3828 27.4016 19.1313 27.2578 18.9516C27.187 18.8658 27.1253 18.7941 27.0716 18.7167C26.7034 18.1862 26.7132 17.3932 26.7367 10.0301L26.7368 10.0223C26.7637 2.37538 26.7637 2.3573 26.9523 1.99805C27.2219 1.50391 27.5813 1.15352 28.0664 0.928908C28.4707 0.740236 28.5336 0.740236 36.2871 0.740235L44.1035 0.740235L44.4719 0.937891C44.948 1.18945 45.3344 1.57578 45.55 2.01602C45.7117 2.33945 45.7207 2.68086 45.7207 10.2188C45.7207 18.3945 45.6848 19.4996 45.3074 22.4375ZM43.8522 1.74023L36.2871 1.74024C32.4019 1.74024 30.4643 1.74031 29.4436 1.76356C28.9249 1.77537 28.6915 1.79262 28.5739 1.80958C28.5437 1.81394 28.5342 1.81503 28.5254 1.81814C28.5175 1.82092 28.5102 1.82531 28.4893 1.8351L28.4865 1.83637C28.2145 1.96232 28.008 2.15202 27.8317 2.47421C27.8317 2.47587 27.8315 2.47868 27.8308 2.48319C27.815 2.58363 27.7971 2.79935 27.7835 3.3051C27.757 4.29626 27.7502 6.19753 27.7367 10.0336L27.7356 10.3707C27.7228 14.3836 27.7166 16.3201 27.7766 17.3432C27.8078 17.8752 27.8532 18.0523 27.8758 18.1135C27.8766 18.1157 27.8771 18.1175 27.8776 18.1192C27.8816 18.1328 27.8833 18.1387 28.0286 18.3144L28.0337 18.3206L28.0367 18.3244C28.0368 18.3244 28.0473 18.3363 28.0726 18.3595C28.1018 18.3863 28.1403 18.4185 28.1856 18.4527C28.2814 18.5252 28.3731 18.5809 28.4293 18.608L28.6978 18.7422L32.2856 18.7422C34.0533 18.7422 35.0064 18.7422 35.5104 18.7645C35.7221 18.7739 36.0056 18.789 36.2401 18.8738C36.3866 18.9267 36.6434 19.0511 36.8178 19.3404C36.9744 19.6004 36.973 19.8548 36.9727 19.9079C36.9727 19.9098 36.9727 19.9115 36.9727 19.9129C36.9727 20.6739 36.7276 22.7288 36.54 23.6668L36.5397 23.668C36.2453 25.1304 35.9233 26.0976 35.3039 27.4033L35.3034 27.4043C33.9437 30.2617 31.8623 32.1585 28.5005 33.7782L28.4979 33.7795C27.6632 34.1787 27.3434 34.4051 27.1992 34.5738C27.1208 34.6656 27.0489 34.7815 27.0449 35.2443C27.045 35.4018 27.0475 35.4529 27.0537 35.4966C27.0583 35.529 27.0691 35.5852 27.1171 35.7134C27.2283 36.0099 27.4587 36.4913 27.9787 37.5726C28.2575 38.1481 28.5399 38.7083 28.7687 39.144C28.8835 39.3625 28.9822 39.5449 29.0588 39.6801C29.1241 39.7954 29.1556 39.8442 29.1603 39.8528C29.4413 40.1748 29.981 40.364 30.8106 40.002C36.659 37.4471 41.0477 33.1312 42.974 28.184L42.9747 28.1823C43.5179 26.7949 44.0248 24.6102 44.3153 22.3121L44.3156 22.3101C44.6836 19.445 44.7207 18.4017 44.7207 10.2188C44.7207 6.44338 44.7184 4.48759 44.6962 3.43299C44.685 2.89883 44.6691 2.63484 44.6521 2.49403C44.6492 2.46982 44.6466 2.45272 44.6447 2.4414C44.5291 2.21446 44.3069 1.98169 44.0048 1.82208L43.8522 1.74023Z" />
                                                </svg>
                                                <?php if (!empty($data['matrik_testimonial_section_genaral_author_title'])): ?>
                                                    <span><?php echo esc_html($data['matrik_testimonial_section_genaral_author_title']); ?></span>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_testimonial_section_genaral_description'])): ?>
                                                    <p><?php echo esc_html($data['matrik_testimonial_section_genaral_description']); ?></p>
                                                <?php endif; ?>
                                                <div class="author-area">
                                                    <?php if (!empty($data['matrik_testimonial_section_genaral_author_image']['url'])): ?>
                                                        <div class="author-img">
                                                            <img src="<?php echo esc_url($data['matrik_testimonial_section_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'matrik-core'); ?>">
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="author-content">
                                                        <?php if (!empty($data['matrik_testimonial_section_genaral_author_name'])): ?>
                                                            <h5><?php echo esc_html($data['matrik_testimonial_section_genaral_author_name']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($data['matrik_testimonial_section_genaral_author_designation'])): ?>
                                                            <span><?php echo esc_html($data['matrik_testimonial_section_genaral_author_designation']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php if ($settings['matrik_testimonial_section_genaral_pagination'] == 'yes'): ?>
                                <div class="slider-btn-grp">
                                    <div class="slider-btn testimonial-slider-prev">
                                        <i class="bi bi-arrow-left"></i>
                                    </div>
                                    <div class="slider-btn testimonial-slider-next">
                                        <i class="bi bi-arrow-right"></i>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_testimonial_genaral_style_selection'] == 'style_two'): ?>
            <div class="home2-testimonial-section">
                <div class="container">
                    <div class="row gy-5 align-items-center justify-content-between">
                        <div class="col-xl-5 col-lg-6">
                            <div class="testimonial-title-area wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="section-title">
                                    <?php if (!empty($settings['matrik_testimonial_genaral_subtitle'])): ?>
                                        <span><?php echo esc_html($settings['matrik_testimonial_genaral_subtitle']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_testimonial_genaral_title'])): ?>
                                        <h2><?php echo esc_html($settings['matrik_testimonial_genaral_title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($settings['matrik_testimonial_genaral_description'])): ?>
                                        <p><?php echo esc_html($settings['matrik_testimonial_genaral_description']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <ul class="rating-list">
                                    <?php foreach ($settings['matrik_testimonial_two_genaral_review_area_review_list'] as $data): ?>
                                        <li>
                                            <a href="<?php echo esc_url($data['matrik_testimonial_two_genaral_review_area_review_rating_text_link']['url']); ?>" class="single-rating">
                                                <?php if (!empty($data['matrik_testimonial_two_genaral_review_area_review_rating_text'])): ?>
                                                    <h6><?php echo esc_html($data['matrik_testimonial_two_genaral_review_area_review_rating_text']); ?></h6>
                                                <?php endif; ?>
                                                <div class="review">
                                                    <?php if (!empty($data['matrik_testimonial_two_genaral_review_area_review_logo']['url'])): ?>
                                                        <div class="logo"><img src="<?php echo esc_url($data['matrik_testimonial_two_genaral_review_area_review_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>"></div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['matrik_testimonial_two_genaral_review_area_review_title'])): ?>
                                                        <span><?php echo esc_html($data['matrik_testimonial_two_genaral_review_area_review_title']); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="swiper home2-testimonial-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['matrik_testimonial_section_genaral_testimonial_list'] as $data): ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card two">
                                                <?php if (!empty($data['matrik_testimonial_section_genaral_author_title'])): ?>
                                                    <svg class="quote" width="46" height="42" viewBox="0 0 46 42" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M19.3074 22.4375C19.0109 24.7824 18.4898 27.0555 17.9059 28.5469C15.8664 33.7848 11.2574 38.277 5.21094 40.9184C4.07891 41.4125 3.00977 41.2418 2.37188 40.4691C2.22813 40.2895 1.64415 39.1754 1.07813 38.0074L1.07111 37.9928C0.0628121 35.8959 0.0449269 35.8587 0.0449268 35.2402C0.0539122 34.0902 0.413287 33.668 2.06641 32.8773C5.27383 31.332 7.16055 29.5801 8.40039 26.9746C8.98438 25.7438 9.28086 24.8543 9.55938 23.4707C9.73907 22.5723 9.97266 20.5867 9.97266 19.9129C9.97266 19.7422 9.87383 19.7422 6.21719 19.7422L2.46172 19.7422L1.99454 19.5086C1.73399 19.3828 1.40157 19.1313 1.25782 18.9516C1.18695 18.8658 1.12525 18.7941 1.07158 18.7167C0.703361 18.1862 0.713199 17.3932 0.736722 10.0301L0.73675 10.0223C0.763674 2.37538 0.763737 2.3573 0.952347 1.99805C1.22188 1.50391 1.58125 1.15352 2.06641 0.928908C2.47071 0.740236 2.5336 0.740236 10.2871 0.740235L18.1035 0.740235L18.4719 0.937891C18.948 1.18945 19.3344 1.57578 19.55 2.01602C19.7117 2.33945 19.7207 2.68086 19.7207 10.2188C19.7207 18.3945 19.6848 19.4996 19.3074 22.4375ZM17.8522 1.74023L10.2871 1.74024C6.40188 1.74024 4.46426 1.74031 3.44357 1.76356C2.92494 1.77537 2.69152 1.79262 2.57391 1.80958C2.54369 1.81394 2.53418 1.81503 2.52538 1.81814C2.51753 1.82092 2.51024 1.82531 2.4893 1.8351L2.48653 1.83637C2.2145 1.96232 2.00802 2.15202 1.83171 2.47421C1.83173 2.47587 1.83148 2.47868 1.83077 2.48319C1.81501 2.58363 1.79708 2.79935 1.78353 3.3051C1.75698 4.29626 1.75022 6.19753 1.73672 10.0336L1.73564 10.3707C1.72277 14.3836 1.71656 16.3201 1.77656 17.3432C1.80775 17.8752 1.85318 18.0523 1.87579 18.1135C1.87661 18.1157 1.87712 18.1175 1.87761 18.1192C1.8816 18.1328 1.88332 18.1387 2.02856 18.3144L2.03367 18.3206L2.03672 18.3244C2.03678 18.3244 2.04731 18.3363 2.07257 18.3595C2.10178 18.3863 2.14029 18.4185 2.18559 18.4527C2.28143 18.5252 2.3731 18.5809 2.42928 18.608L2.69779 18.7422L6.28558 18.7422C8.05331 18.7422 9.00638 18.7422 9.51041 18.7645C9.72208 18.7739 10.0056 18.789 10.2401 18.8738C10.3866 18.9267 10.6434 19.0511 10.8178 19.3404C10.9744 19.6004 10.973 19.8548 10.9727 19.9079C10.9727 19.9098 10.9727 19.9115 10.9727 19.9129C10.9727 20.6739 10.7276 22.7288 10.54 23.6668L10.5397 23.668C10.2453 25.1304 9.92333 26.0976 9.30386 27.4033L9.30337 27.4043C7.94366 30.2617 5.86228 32.1585 2.50046 33.7782L2.49787 33.7795C1.66324 34.1787 1.34343 34.4051 1.19924 34.5738C1.1208 34.6656 1.04893 34.7815 1.04493 35.2443C1.04497 35.4018 1.04745 35.4529 1.05366 35.4966C1.05826 35.529 1.06907 35.5852 1.11714 35.7134C1.22831 36.0099 1.45872 36.4913 1.97867 37.5726C2.25755 38.1481 2.53993 38.7083 2.76871 39.144C2.88347 39.3625 2.98221 39.5449 3.0588 39.6801C3.12413 39.7954 3.15556 39.8442 3.16026 39.8528C3.44126 40.1748 3.98101 40.364 4.81062 40.002C10.659 37.4471 15.0477 33.1312 16.974 28.184L16.9747 28.1823C17.5179 26.7949 18.0248 24.6102 18.3153 22.3121L18.3156 22.3101C18.6836 19.445 18.7207 18.4017 18.7207 10.2188C18.7207 6.44338 18.7184 4.48759 18.6962 3.43299C18.685 2.89883 18.6691 2.63484 18.6521 2.49403C18.6492 2.46982 18.6466 2.45272 18.6447 2.4414C18.5291 2.21446 18.3069 1.98169 18.0048 1.82208L17.8522 1.74023Z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M45.3074 22.4375C45.0109 24.7824 44.4898 27.0555 43.9059 28.5469C41.8664 33.7848 37.2574 38.277 31.2109 40.9184C30.0789 41.4125 29.0098 41.2418 28.3719 40.4691C28.2281 40.2895 27.6441 39.1754 27.0781 38.0074L27.0711 37.9928C26.0628 35.8959 26.0449 35.8587 26.0449 35.2402C26.0539 34.0902 26.4133 33.668 28.0664 32.8773C31.2738 31.332 33.1606 29.5801 34.4004 26.9746C34.9844 25.7438 35.2809 24.8543 35.5594 23.4707C35.7391 22.5723 35.9727 20.5867 35.9727 19.9129C35.9727 19.7422 35.8738 19.7422 32.2172 19.7422L28.4617 19.7422L27.9945 19.5086C27.734 19.3828 27.4016 19.1313 27.2578 18.9516C27.187 18.8658 27.1253 18.7941 27.0716 18.7167C26.7034 18.1862 26.7132 17.3932 26.7367 10.0301L26.7368 10.0223C26.7637 2.37538 26.7637 2.3573 26.9523 1.99805C27.2219 1.50391 27.5813 1.15352 28.0664 0.928908C28.4707 0.740236 28.5336 0.740236 36.2871 0.740235L44.1035 0.740235L44.4719 0.937891C44.948 1.18945 45.3344 1.57578 45.55 2.01602C45.7117 2.33945 45.7207 2.68086 45.7207 10.2188C45.7207 18.3945 45.6848 19.4996 45.3074 22.4375ZM43.8522 1.74023L36.2871 1.74024C32.4019 1.74024 30.4643 1.74031 29.4436 1.76356C28.9249 1.77537 28.6915 1.79262 28.5739 1.80958C28.5437 1.81394 28.5342 1.81503 28.5254 1.81814C28.5175 1.82092 28.5102 1.82531 28.4893 1.8351L28.4865 1.83637C28.2145 1.96232 28.008 2.15202 27.8317 2.47421C27.8317 2.47587 27.8315 2.47868 27.8308 2.48319C27.815 2.58363 27.7971 2.79935 27.7835 3.3051C27.757 4.29626 27.7502 6.19753 27.7367 10.0336L27.7356 10.3707C27.7228 14.3836 27.7166 16.3201 27.7766 17.3432C27.8078 17.8752 27.8532 18.0523 27.8758 18.1135C27.8766 18.1157 27.8771 18.1175 27.8776 18.1192C27.8816 18.1328 27.8833 18.1387 28.0286 18.3144L28.0337 18.3206L28.0367 18.3244C28.0368 18.3244 28.0473 18.3363 28.0726 18.3595C28.1018 18.3863 28.1403 18.4185 28.1856 18.4527C28.2814 18.5252 28.3731 18.5809 28.4293 18.608L28.6978 18.7422L32.2856 18.7422C34.0533 18.7422 35.0064 18.7422 35.5104 18.7645C35.7221 18.7739 36.0056 18.789 36.2401 18.8738C36.3866 18.9267 36.6434 19.0511 36.8178 19.3404C36.9744 19.6004 36.973 19.8548 36.9727 19.9079C36.9727 19.9098 36.9727 19.9115 36.9727 19.9129C36.9727 20.6739 36.7276 22.7288 36.54 23.6668L36.5397 23.668C36.2453 25.1304 35.9233 26.0976 35.3039 27.4033L35.3034 27.4043C33.9437 30.2617 31.8623 32.1585 28.5005 33.7782L28.4979 33.7795C27.6632 34.1787 27.3434 34.4051 27.1992 34.5738C27.1208 34.6656 27.0489 34.7815 27.0449 35.2443C27.045 35.4018 27.0475 35.4529 27.0537 35.4966C27.0583 35.529 27.0691 35.5852 27.1171 35.7134C27.2283 36.0099 27.4587 36.4913 27.9787 37.5726C28.2575 38.1481 28.5399 38.7083 28.7687 39.144C28.8835 39.3625 28.9822 39.5449 29.0588 39.6801C29.1241 39.7954 29.1556 39.8442 29.1603 39.8528C29.4413 40.1748 29.981 40.364 30.8106 40.002C36.659 37.4471 41.0477 33.1312 42.974 28.184L42.9747 28.1823C43.5179 26.7949 44.0248 24.6102 44.3153 22.3121L44.3156 22.3101C44.6836 19.445 44.7207 18.4017 44.7207 10.2188C44.7207 6.44338 44.7184 4.48759 44.6962 3.43299C44.685 2.89883 44.6691 2.63484 44.6521 2.49403C44.6492 2.46982 44.6466 2.45272 44.6447 2.4414C44.5291 2.21446 44.3069 1.98169 44.0048 1.82208L43.8522 1.74023Z" />
                                                    </svg>
                                                    <span><?php echo esc_html($data['matrik_testimonial_section_genaral_author_title']); ?></span>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_testimonial_section_genaral_description'])): ?>
                                                    <p><?php echo esc_html($data['matrik_testimonial_section_genaral_description']); ?></p>
                                                <?php endif; ?>
                                                <svg class="arrow-down" width="6" height="67" viewBox="0 0 6 67" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0.333333 3C0.333333 4.47276 1.52724 5.66667 3 5.66667C4.47276 5.66667 5.66667 4.47276 5.66667 3C5.66667 1.52724 4.47276 0.333333 3 0.333333C1.52724 0.333333 0.333333 1.52724 0.333333 3ZM3 67L5.88675 62H0.113249L3 67ZM2.5 3V62.5H3.5V3H2.5Z" />
                                                </svg>
                                                <div class="author-area">
                                                    <?php if (!empty($data['matrik_testimonial_section_genaral_author_image']['url'])): ?>
                                                        <div class="author-img">
                                                            <img src="<?php echo esc_url($data['matrik_testimonial_section_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'matrik-core'); ?>">
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="author-content">
                                                        <?php if (!empty($data['matrik_testimonial_section_genaral_author_name'])): ?>
                                                            <h5><?php echo esc_html($data['matrik_testimonial_section_genaral_author_name']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($data['matrik_testimonial_section_genaral_author_designation'])): ?>
                                                            <span><?php echo esc_html($data['matrik_testimonial_section_genaral_author_designation']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php if ($settings['matrik_testimonial_section_genaral_pagination'] == 'yes'): ?>
                                <div class="slider-btn-grp two">
                                    <div class="slider-btn testimonial-slider-prev">
                                        <i class="bi bi-arrow-left"></i>
                                    </div>
                                    <div class="slider-btn testimonial-slider-next">
                                        <i class="bi bi-arrow-right"></i>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($settings['matrik_testimonial_genaral_style_selection'] == 'style_three'): ?>
            <div class="home3-testimonial-section">
                <div class="container">
                    <?php if ($settings['matrik_testimonial_section_genaral_header_section'] == 'yes'): ?>
                        <div class="row g-4 align-items-end justify-content-between mb-60 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <?php if (!empty($settings['matrik_testimonial_genaral_three_title'])): ?>
                                <div class="col-lg-5">
                                    <div class="section-title two white">
                                        <h2><?php echo esc_html($settings['matrik_testimonial_genaral_three_title']); ?></h2>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ($settings['matrik_testimonial_section_genaral_pagination_section'] == 'yes'): ?>
                                <div class="col-lg-3 d-flex justify-content-lg-end">
                                    <div class="slider-btn-grp two">
                                        <div class="slider-btn testimonial-slider-prev">
                                            <i class="bi bi-arrow-left"></i>
                                        </div>
                                        <div class="slider-btn testimonial-slider-next">
                                            <i class="bi bi-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>

                    <?php if ($settings['matrik_testimonial_section_genaral_testimonial_section'] == 'yes'): ?>
                        <div class="row <?php if ($settings['matrik_testimonial_section_genaral_counter_section'] == 'yes') : ?>mb-100<?php else : ?><?php endif; ?>">
                            <div class="col-lg-12">
                                <div class="swiper home3-testimonial-slider">
                                    <div class="swiper-wrapper">

                                        <?php foreach ($settings['matrik_testimonial_section_three_testimonial_list'] as $data): ?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-card2">
                                                    <div class="row gy-md-5 gy-4 align-items-center justify-content-between">
                                                        <?php if ($data['matrik_testimonial_section_three_genaral_testimonial_banner_image']['url']): ?>
                                                            <div class="col-lg-5">
                                                                <div class="testimonial-img">
                                                                    <img src="<?php echo esc_url($data['matrik_testimonial_section_three_genaral_testimonial_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="col-lg-7">
                                                            <div class="testimonial-content">
                                                                <svg class="quote" width="46" height="42" viewBox="0 0 46 42" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M19.3074 22.4375C19.0109 24.7824 18.4898 27.0555 17.9059 28.5469C15.8664 33.7848 11.2574 38.277 5.21094 40.9184C4.07891 41.4125 3.00977 41.2418 2.37188 40.4691C2.22813 40.2895 1.64415 39.1754 1.07813 38.0074L1.07111 37.9928C0.0628121 35.8959 0.0449269 35.8587 0.0449268 35.2402C0.0539122 34.0902 0.413287 33.668 2.06641 32.8773C5.27383 31.332 7.16055 29.5801 8.40039 26.9746C8.98438 25.7438 9.28086 24.8543 9.55938 23.4707C9.73907 22.5723 9.97266 20.5867 9.97266 19.9129C9.97266 19.7422 9.87383 19.7422 6.21719 19.7422L2.46172 19.7422L1.99454 19.5086C1.73399 19.3828 1.40157 19.1313 1.25782 18.9516C1.18695 18.8658 1.12525 18.7941 1.07158 18.7167C0.703361 18.1862 0.713199 17.3932 0.736722 10.0301L0.73675 10.0223C0.763674 2.37538 0.763737 2.3573 0.952347 1.99805C1.22188 1.50391 1.58125 1.15352 2.06641 0.928908C2.47071 0.740236 2.5336 0.740236 10.2871 0.740235L18.1035 0.740235L18.4719 0.937891C18.948 1.18945 19.3344 1.57578 19.55 2.01602C19.7117 2.33945 19.7207 2.68086 19.7207 10.2188C19.7207 18.3945 19.6848 19.4996 19.3074 22.4375ZM17.8522 1.74023L10.2871 1.74024C6.40188 1.74024 4.46426 1.74031 3.44357 1.76356C2.92494 1.77537 2.69152 1.79262 2.57391 1.80958C2.54369 1.81394 2.53418 1.81503 2.52538 1.81814C2.51753 1.82092 2.51024 1.82531 2.4893 1.8351L2.48653 1.83637C2.2145 1.96232 2.00802 2.15202 1.83171 2.47421C1.83173 2.47587 1.83148 2.47868 1.83077 2.48319C1.81501 2.58363 1.79708 2.79935 1.78353 3.3051C1.75698 4.29626 1.75022 6.19753 1.73672 10.0336L1.73564 10.3707C1.72277 14.3836 1.71656 16.3201 1.77656 17.3432C1.80775 17.8752 1.85318 18.0523 1.87579 18.1135C1.87661 18.1157 1.87712 18.1175 1.87761 18.1192C1.8816 18.1328 1.88332 18.1387 2.02856 18.3144L2.03367 18.3206L2.03672 18.3244C2.03678 18.3244 2.04731 18.3363 2.07257 18.3595C2.10178 18.3863 2.14029 18.4185 2.18559 18.4527C2.28143 18.5252 2.3731 18.5809 2.42928 18.608L2.69779 18.7422L6.28558 18.7422C8.05331 18.7422 9.00638 18.7422 9.51041 18.7645C9.72208 18.7739 10.0056 18.789 10.2401 18.8738C10.3866 18.9267 10.6434 19.0511 10.8178 19.3404C10.9744 19.6004 10.973 19.8548 10.9727 19.9079C10.9727 19.9098 10.9727 19.9115 10.9727 19.9129C10.9727 20.6739 10.7276 22.7288 10.54 23.6668L10.5397 23.668C10.2453 25.1304 9.92333 26.0976 9.30386 27.4033L9.30337 27.4043C7.94366 30.2617 5.86228 32.1585 2.50046 33.7782L2.49787 33.7795C1.66324 34.1787 1.34343 34.4051 1.19924 34.5738C1.1208 34.6656 1.04893 34.7815 1.04493 35.2443C1.04497 35.4018 1.04745 35.4529 1.05366 35.4966C1.05826 35.529 1.06907 35.5852 1.11714 35.7134C1.22831 36.0099 1.45872 36.4913 1.97867 37.5726C2.25755 38.1481 2.53993 38.7083 2.76871 39.144C2.88347 39.3625 2.98221 39.5449 3.0588 39.6801C3.12413 39.7954 3.15556 39.8442 3.16026 39.8528C3.44126 40.1748 3.98101 40.364 4.81062 40.002C10.659 37.4471 15.0477 33.1312 16.974 28.184L16.9747 28.1823C17.5179 26.7949 18.0248 24.6102 18.3153 22.3121L18.3156 22.3101C18.6836 19.445 18.7207 18.4017 18.7207 10.2188C18.7207 6.44338 18.7184 4.48759 18.6962 3.43299C18.685 2.89883 18.6691 2.63484 18.6521 2.49403C18.6492 2.46982 18.6466 2.45272 18.6447 2.4414C18.5291 2.21446 18.3069 1.98169 18.0048 1.82208L17.8522 1.74023Z" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M45.3074 22.4375C45.0109 24.7824 44.4898 27.0555 43.9059 28.5469C41.8664 33.7848 37.2574 38.277 31.2109 40.9184C30.0789 41.4125 29.0098 41.2418 28.3719 40.4691C28.2281 40.2895 27.6441 39.1754 27.0781 38.0074L27.0711 37.9928C26.0628 35.8959 26.0449 35.8587 26.0449 35.2402C26.0539 34.0902 26.4133 33.668 28.0664 32.8773C31.2738 31.332 33.1606 29.5801 34.4004 26.9746C34.9844 25.7438 35.2809 24.8543 35.5594 23.4707C35.7391 22.5723 35.9727 20.5867 35.9727 19.9129C35.9727 19.7422 35.8738 19.7422 32.2172 19.7422L28.4617 19.7422L27.9945 19.5086C27.734 19.3828 27.4016 19.1313 27.2578 18.9516C27.187 18.8658 27.1253 18.7941 27.0716 18.7167C26.7034 18.1862 26.7132 17.3932 26.7367 10.0301L26.7368 10.0223C26.7637 2.37538 26.7637 2.3573 26.9523 1.99805C27.2219 1.50391 27.5813 1.15352 28.0664 0.928908C28.4707 0.740236 28.5336 0.740236 36.2871 0.740235L44.1035 0.740235L44.4719 0.937891C44.948 1.18945 45.3344 1.57578 45.55 2.01602C45.7117 2.33945 45.7207 2.68086 45.7207 10.2188C45.7207 18.3945 45.6848 19.4996 45.3074 22.4375ZM43.8522 1.74023L36.2871 1.74024C32.4019 1.74024 30.4643 1.74031 29.4436 1.76356C28.9249 1.77537 28.6915 1.79262 28.5739 1.80958C28.5437 1.81394 28.5342 1.81503 28.5254 1.81814C28.5175 1.82092 28.5102 1.82531 28.4893 1.8351L28.4865 1.83637C28.2145 1.96232 28.008 2.15202 27.8317 2.47421C27.8317 2.47587 27.8315 2.47868 27.8308 2.48319C27.815 2.58363 27.7971 2.79935 27.7835 3.3051C27.757 4.29626 27.7502 6.19753 27.7367 10.0336L27.7356 10.3707C27.7228 14.3836 27.7166 16.3201 27.7766 17.3432C27.8078 17.8752 27.8532 18.0523 27.8758 18.1135C27.8766 18.1157 27.8771 18.1175 27.8776 18.1192C27.8816 18.1328 27.8833 18.1387 28.0286 18.3144L28.0337 18.3206L28.0367 18.3244C28.0368 18.3244 28.0473 18.3363 28.0726 18.3595C28.1018 18.3863 28.1403 18.4185 28.1856 18.4527C28.2814 18.5252 28.3731 18.5809 28.4293 18.608L28.6978 18.7422L32.2856 18.7422C34.0533 18.7422 35.0064 18.7422 35.5104 18.7645C35.7221 18.7739 36.0056 18.789 36.2401 18.8738C36.3866 18.9267 36.6434 19.0511 36.8178 19.3404C36.9744 19.6004 36.973 19.8548 36.9727 19.9079C36.9727 19.9098 36.9727 19.9115 36.9727 19.9129C36.9727 20.6739 36.7276 22.7288 36.54 23.6668L36.5397 23.668C36.2453 25.1304 35.9233 26.0976 35.3039 27.4033L35.3034 27.4043C33.9437 30.2617 31.8623 32.1585 28.5005 33.7782L28.4979 33.7795C27.6632 34.1787 27.3434 34.4051 27.1992 34.5738C27.1208 34.6656 27.0489 34.7815 27.0449 35.2443C27.045 35.4018 27.0475 35.4529 27.0537 35.4966C27.0583 35.529 27.0691 35.5852 27.1171 35.7134C27.2283 36.0099 27.4587 36.4913 27.9787 37.5726C28.2575 38.1481 28.5399 38.7083 28.7687 39.144C28.8835 39.3625 28.9822 39.5449 29.0588 39.6801C29.1241 39.7954 29.1556 39.8442 29.1603 39.8528C29.4413 40.1748 29.981 40.364 30.8106 40.002C36.659 37.4471 41.0477 33.1312 42.974 28.184L42.9747 28.1823C43.5179 26.7949 44.0248 24.6102 44.3153 22.3121L44.3156 22.3101C44.6836 19.445 44.7207 18.4017 44.7207 10.2188C44.7207 6.44338 44.7184 4.48759 44.6962 3.43299C44.685 2.89883 44.6691 2.63484 44.6521 2.49403C44.6492 2.46982 44.6466 2.45272 44.6447 2.4414C44.5291 2.21446 44.3069 1.98169 44.0048 1.82208L43.8522 1.74023Z" />
                                                                </svg>
                                                                <?php if (!empty($data['matrik_testimonial_section_three_genaral_author_title'])): ?>
                                                                    <span><?php echo esc_html($data['matrik_testimonial_section_three_genaral_author_title']); ?></span>
                                                                <?php endif; ?>
                                                                <?php if (!empty($data['matrik_testimonial_section_three_genaral_author_description'])): ?>
                                                                    <p><?php echo esc_html($data['matrik_testimonial_section_three_genaral_author_description']); ?></p>
                                                                <?php endif; ?>
                                                                <div class="author-and-social-area">
                                                                    <div class="author-area">
                                                                        <?php if (!empty($data['matrik_testimonial_section_three_genaral_author_image']['url'])): ?>
                                                                            <div class="author-img">
                                                                                <img src="<?php echo esc_url($data['matrik_testimonial_section_three_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'matrik-core'); ?>">
                                                                            </div>
                                                                        <?php endif; ?>
                                                                        <div class="author-content">
                                                                            <?php if (!empty($data['matrik_testimonial_section_three_genaral_author_name'])): ?>
                                                                                <h5><?php echo esc_html($data['matrik_testimonial_section_three_genaral_author_name']); ?></h5>
                                                                            <?php endif; ?>
                                                                            <?php if ($data['matrik_testimonial_section_three_genaral_author_designation']): ?>
                                                                                <span><?php echo esc_html($data['matrik_testimonial_section_three_genaral_author_designation']); ?></span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php $icon = $data['matrik_testimonial_section_three_genaral_author_social_icon']; ?>
                                                                    <div class="social-area">
                                                                        <a href="<?php echo esc_url($data['matrik_testimonial_section_three_genaral_author_social_icon_url']['url']); ?>">
                                                                            <?php if (!empty($icon['value'])): ?>
                                                                                <i class="<?php echo esc_attr($icon['value']); ?>"></i>
                                                                            <?php endif; ?>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <?php if ($settings['matrik_testimonial_section_genaral_counter_section'] == 'yes'): ?>
                        <div class="counter-wrap">
                            <div class="row gy-sm-5 gy-4">
                                <?php
                                $classes     = array('justify-content-center divider', 'justify-content-center divider', 'justify-content-lg-center justify-content-md-end justify-content-center divider', 'justify-content-center');
                                $class_count = count($classes);
                                foreach ($settings['matrik_testimonial_counter_section_three_genaral_counter_list'] as $index => $data):
                                    $class = $classes[$index % $class_count];
                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 d-flex <?php echo esc_attr($class); ?>">
                                        <div class="single-countdown">
                                            <div class="number">
                                                <?php if (!empty($data['matrik_testimonial_counter_section_three_genaral_counter_number'])): ?>
                                                    <h2 class="counter"><?php echo esc_html($data['matrik_testimonial_counter_section_three_genaral_counter_number']); ?></h2>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_testimonial_counter_section_three_genaral_counter_sign'])): ?>
                                                    <span><?php echo esc_html($data['matrik_testimonial_counter_section_three_genaral_counter_sign']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($data['matrik_testimonial_counter_section_three_genaral_counter_title'])): ?>
                                                <span><?php echo esc_html($data['matrik_testimonial_counter_section_three_genaral_counter_title']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_testimonial_genaral_style_selection'] == 'style_four'): ?>
            <div class="home4-testimonial-section">
                <div class="container-fluid">
                    <?php if (!empty($settings['matrik_testimonial_genaral_three_title'])): ?>
                        <div class="section-title three text-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h2><?php echo esc_html($settings['matrik_testimonial_genaral_three_title']); ?></h2>
                        </div>
                    <?php endif; ?>
                    <div class="row mb-50">
                        <div class="col-lg-12">
                            <div class="swiper home4-testimonial-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($settings['matrik_testimonial_section_four_testimonial_list'] as $data): ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card three">
                                                <svg class="quote" width="54" height="49" viewBox="0 0 54 49" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M36.1231 48.6592C36.8825 48.4766 40.3102 46.6611 41.7657 45.6729C43.6536 44.3945 44.7188 43.5244 46.3114 41.9023C51.4688 36.6816 53.42 31.1924 53.8946 20.5791C53.9684 19.0537 54 14.7891 53.9789 10.1055C53.9473 2.76855 53.9367 2.17773 53.7575 1.82324C53.5043 1.31836 53.0086 0.802734 52.4813 0.512695L52.0489 0.276367L42.9258 0.276368C35.4692 0.276369 33.7289 0.308596 33.3914 0.42676C32.8746 0.609377 32.2207 1.21094 31.9254 1.76953L31.6934 2.20996L31.6618 11.3838C31.6301 21.4707 31.6196 21.2451 32.2735 22.0508C32.4422 22.2656 32.8325 22.5664 33.1383 22.7168L33.6868 22.9961L38.0426 22.9961L42.3985 22.9961L42.3985 23.7803C42.3985 25.499 41.9871 27.916 41.3965 29.7207C40.0571 33.8027 37.7262 36.3809 33.3282 38.626C32.4739 39.0664 31.6407 39.5605 31.4508 39.7647C30.9657 40.2695 30.7653 40.8926 30.818 41.709C30.8602 42.3105 31.0079 42.6973 32.1153 45.0498C33.4125 47.8105 33.6551 48.1865 34.425 48.5088C34.8996 48.7129 35.6379 48.7773 36.1231 48.6592Z" />
                                                    <path
                                                        d="M6.11719 48.3154C13.2152 45.1572 18.6258 39.7861 21.0199 33.5234C21.7055 31.7402 22.3172 29.0225 22.6652 26.2188C23.1082 22.7061 23.1504 21.3848 23.1504 11.6094C23.1504 2.59668 23.1398 2.18848 22.95 1.80176C22.6969 1.27539 22.2434 0.813477 21.6844 0.512695L21.252 0.276367L12.0762 0.276368C2.97422 0.276369 2.90039 0.276369 2.42578 0.501955C1.85625 0.77051 1.43438 1.18946 1.11797 1.78028C0.896486 2.20996 0.896486 2.23145 0.864846 11.3838C0.833206 21.4707 0.82266 21.2451 1.47657 22.0508C1.64532 22.2656 2.03555 22.5664 2.34141 22.7168L2.88985 22.9961L7.29844 22.9961C11.591 22.9961 11.707 22.9961 11.707 23.2002C11.707 24.0059 11.4328 26.3799 11.2219 27.4541C10.8949 29.1084 10.5469 30.1719 9.86133 31.6436C8.40586 34.7588 6.19102 36.8535 2.42579 38.7012C0.48516 39.6465 0.0632855 40.1514 0.0527399 41.5264C0.05274 42.2676 0.0738333 42.3106 1.26563 44.835C1.93008 46.2315 2.61563 47.5635 2.78438 47.7783C3.53321 48.7022 4.78829 48.9063 6.11719 48.3154Z" />
                                                </svg>
                                                <?php if (!empty($data['matrik_testimonial_section_four_genaral_author_title'])): ?>
                                                    <span><?php echo esc_html($data['matrik_testimonial_section_four_genaral_author_title']); ?></span>
                                                <?php endif; ?>
                                                <?php if (!empty($data['matrik_testimonial_section_four_genaral_author_description'])): ?>
                                                    <p><?php echo esc_html($data['matrik_testimonial_section_four_genaral_author_description']); ?></p>
                                                <?php endif; ?>
                                                <div class="author-and-social-area">
                                                    <div class="author-area">
                                                        <?php if (!empty($data['matrik_testimonial_section_four_genaral_author_image']['url'])): ?>
                                                            <div class="author-img">
                                                                <img src="<?php echo esc_url($data['matrik_testimonial_section_four_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'matrik-core'); ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="author-content">
                                                            <?php if (!empty($data['matrik_testimonial_section_four_genaral_author_name'])): ?>
                                                                <h5><?php echo esc_html($data['matrik_testimonial_section_four_genaral_author_name']); ?></h5>
                                                            <?php endif; ?>
                                                            <?php if (!empty($data['matrik_testimonial_section_four_genaral_author_designation'])): ?>
                                                                <span><?php echo esc_html($data['matrik_testimonial_section_four_genaral_author_designation']); ?></span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <?php $icon = $data['matrik_testimonial_section_four_genaral_author_social_icon']; ?>
                                                    <div class="social-area">
                                                        <a href="<?php echo esc_url($data['matrik_testimonial_section_four_genaral_author_social_icon_url']['url']); ?>">
                                                            <?php if (!empty($icon['value'])): ?>
                                                                <i class="<?php echo esc_attr($icon['value']); ?>"></i>
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="slider-btn-grp two wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="slider-btn testimonial-slider-prev">
                            <i class="bi bi-arrow-left"></i>
                        </div>
                        <?php if ($settings['matrik_service_genaral_contact_title_text']): ?>
                            <h6><?php echo wp_kses($settings['matrik_service_genaral_contact_title_text'], wp_kses_allowed_html('post')); ?></h6>
                        <?php endif; ?>
                        <div class="slider-btn testimonial-slider-next">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_testimonial_genaral_style_selection'] == 'style_five'): ?>
            <div class="home5-testimonial-section">
                <div class="container">
                    <div class="row justify-content-center mb-70 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="col-lg-6">
                            <div class="section-title four">
                                <?php if (!empty($settings['matrik_testimonial_genaral_subtitle'])): ?>
                                    <span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.0594065 0H12.0001V2.2353L2.25745 12L0 9.76471L6.65353 3.17647L0.0594065 3.2353V0Z" />
                                            <path d="M11.9999 11.9999V4.47046L8.79199 7.64693V11.9999H11.9999Z" />
                                        </svg>
                                        <?php echo esc_html($settings['matrik_testimonial_genaral_subtitle']); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_testimonial_genaral_three_title'])): ?>
                                    <h2><?php echo esc_html($settings['matrik_testimonial_genaral_three_title']); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-60">
                        <?php if (!empty($settings['matrik_testimonial_five_banner_image']['url'])): ?>
                            <div class="col-lg-5 d-lg-block d-none wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                                <div class="testimonial-img">
                                    <img src="<?php echo esc_url($settings['matrik_testimonial_five_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-7">
                            <div class="testimonial-slider-area">
                                <div class="swiper home3-testimonial-slider">
                                    <div class="swiper-wrapper">

                                        <?php foreach ($settings['matrik_testimonial_section_genaral_testimonial_list'] as $data): ?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-card3">
                                                    <?php if (!empty($data['matrik_testimonial_section_genaral_author_image']['url'])): ?>
                                                        <div class="author-img">
                                                            <img src="<?php echo esc_url($data['matrik_testimonial_section_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'matrik-core'); ?>">
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['matrik_testimonial_section_genaral_author_title'])): ?>
                                                        <span><?php echo esc_html($data['matrik_testimonial_section_genaral_author_title']); ?></span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['matrik_testimonial_section_genaral_description'])): ?>
                                                        <p><?php echo esc_html($data['matrik_testimonial_section_genaral_description']); ?></p>
                                                    <?php endif; ?>
                                                    <div class="author-area">
                                                        <?php if (!empty($data['matrik_testimonial_section_genaral_author_name'])): ?>
                                                            <h5><?php echo esc_html($data['matrik_testimonial_section_genaral_author_name']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($data['matrik_testimonial_section_genaral_author_designation'])): ?>
                                                            <span><?php echo esc_html($data['matrik_testimonial_section_genaral_author_designation']); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="contact-btn-area">
                                    <ul class="img-grp">
                                        <?php foreach ($settings['matrik_testimonial_five_contact_area_expert_gallery'] as $image): ?>
                                            <li><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr__('expert-image', 'matrik-core'); ?>"></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php if (!empty($settings['matrik_testimonial_five_contact_area_button_text'])): ?>
                                        <a class="contact-btn" href="<?php echo esc_url($settings['matrik_testimonial_five_contact_area_button_text_url']['url']); ?>">
                                            <?php echo esc_html($settings['matrik_testimonial_five_contact_area_button_text']); ?>
                                            <svg viewBox="0 0 13 20">
                                                <polyline points="0.5 19.5 3 19.5 12.5 10 3 0.5"></polyline>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rating-and-btn-area">
                        <ul class="rating-list">
                            <?php foreach ($settings['matrik_testimonial_genaral_review_area_review_list'] as $data): ?>
                                <li>
                                    <a href="<?php echo esc_url($data['matrik_testimonial_genaral_review_area_review_link']['url']); ?>" class="single-rating <?php if ($data['matrik_hero_banner_one_genaral_button_style'] == 'google') : ?>google<?php endif; ?>">
                                        <div class="review">
                                            <?php if (!empty($data['matrik_testimonial_genaral_review_area_review_title'])): ?>
                                                <span><?php echo esc_html($data['matrik_testimonial_genaral_review_area_review_title']); ?></span>
                                            <?php endif; ?>
                                            <?php if (!empty($data['matrik_testimonial_genaral_review_area_review_logo']['url'])): ?>
                                                <img src="<?php echo esc_url($data['matrik_testimonial_genaral_review_area_review_logo']['url']); ?>" alt="<?php echo esc_attr__('logo-image', 'matrik-core'); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="rating">
                                            <ul class="star">
                                                <?php $rank_counter = intval($data['matrik_testimonial_genaral_review_area_review_rating']);
                                                $rank_counter = max(0, min(5, $rank_counter)); ?>
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <?php if ($i <= $rank_counter) : ?>
                                                        <li><i class="bi bi-star-fill"></i></li>
                                                    <?php endif ?>
                                                <?php endfor; ?>
                                            </ul>
                                            <?php if (!empty($data['matrik_testimonial_genaral_review_area_review_total_review'])): ?>
                                                <span><?php echo esc_html($data['matrik_testimonial_genaral_review_area_review_total_review']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>
                        <div class="slider-btn-grp three">
                            <div class="slider-btn testimonial-slider-prev">
                                <i class="bi bi-arrow-left"></i>
                            </div>
                            <div class="slider-btn testimonial-slider-next">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_testimonial_genaral_style_selection'] == 'style_six') : ?>
            <div class="home6-testimonial-section" <?php if (!empty($settings['matrik_testimonial_five_banner_image']['url'])): ?>style="background-image: url(<?php echo esc_url($settings['matrik_testimonial_five_banner_image']['url']); ?>), linear-gradient(180deg, #0B0B1D 0%, #0B0B1D 100%)" <?php endif; ?>>
                <div class="container">
                    <div class="testimonial-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-10">
                                <div class="swiper home3-testimonial-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($settings['matrik_testimonial_section_four_testimonial_list'] as $data): ?>
                                            <div class="swiper-slide">
                                                <div class="testimonial-card4">
                                                    <svg class="quote" width="88" height="79" viewBox="0 0 88 79" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M69.9512 0.801759C63.8754 0.801761 60.1328 0.814709 57.8408 0.851565C56.694 0.87001 55.9163 0.894679 55.3945 0.925784C54.8491 0.958311 54.6392 0.996363 54.5781 1.01758L54.5781 1.0166C54.243 1.1345 53.8239 1.4064 53.4209 1.77344C53.0207 2.13798 52.6743 2.5633 52.4668 2.95313L52.4668 2.95215L52.1475 3.55469L52.0957 18.2773C52.0699 26.4499 52.0526 30.4165 52.1738 32.5088C52.2347 33.558 52.3285 34.0831 52.4492 34.4141C52.5341 34.6465 52.6335 34.7925 52.7949 34.9941L52.9795 35.2207L52.9844 35.2266C53.1757 35.4684 53.6369 35.8382 54.0488 36.0732L54.2207 36.165L54.2275 36.168L55.0147 36.5664L69.5918 36.5664L69.5918 38.335C69.5918 40.9979 68.9941 44.6486 68.1143 47.5371L67.9346 48.1045C66.8248 51.4627 65.2969 54.2218 63.124 56.6045C60.9539 58.984 58.1581 60.968 54.5391 62.8027L54.5391 62.8037C53.8507 63.1561 53.1728 63.529 52.6318 63.8525C52.3612 64.0144 52.129 64.1617 51.9482 64.2861C51.853 64.3517 51.779 64.4054 51.7246 64.4482L51.6162 64.543L51.6113 64.5488C50.9785 65.2028 50.6791 66.0003 50.709 67.0928L50.7197 67.3145C50.7729 68.0632 50.9215 68.5621 52.1768 71.2461L52.7861 72.5391C53.8489 74.7848 54.4596 76.015 54.9541 76.7529C55.1957 77.1134 55.3971 77.3364 55.5938 77.4961C55.7402 77.615 55.8961 77.7087 56.0869 77.7988L56.29 77.8887L56.2949 77.8906C56.6205 78.0297 57.0603 78.1297 57.5195 78.1699C57.8644 78.2001 58.1986 78.1942 58.4824 78.1563L58.7481 78.1084L58.75 78.1074L58.9912 78.0332C59.2832 77.9308 59.724 77.7442 60.2803 77.4854C61.0055 77.1478 61.8867 76.7067 62.8057 76.2236C64.4177 75.3762 66.128 74.4101 67.3096 73.6563L67.7813 73.3467L67.7822 73.3467C70.452 71.5517 72.0948 70.2653 74.1856 68.2305L75.1133 67.3086L75.1143 67.3076L75.8789 66.5225C79.625 62.5902 82.2445 58.5229 84.0391 53.5117C85.8373 48.4903 86.815 42.5004 87.248 34.7139L87.3272 33.1328L87.3272 33.1309L87.3691 32.0107C87.4459 29.3837 87.4825 24.5251 87.4727 19.0127L87.4639 16.209C87.4381 10.2698 87.4211 7.07001 87.374 5.28223C87.3318 3.67967 87.2625 3.28475 87.1895 3.10059L87.1572 3.03223L87.1572 3.03027C86.7921 2.30712 86.0588 1.54555 85.2861 1.12305L85.2852 1.12402L84.6914 0.801758L69.9512 0.801759Z"></path>
                                                        <path d="M19.6777 0.801759C12.257 0.80176 8.52711 0.802201 6.55371 0.847659C5.56283 0.870484 5.039 0.903754 4.7207 0.950198C4.50492 0.981702 4.39254 1.01693 4.28027 1.06543L4.16504 1.11914L4.16309 1.11914C3.44452 1.45559 2.88647 1.95519 2.44336 2.65821L2.25977 2.97266C2.1871 3.11254 2.14437 3.19409 2.10449 3.45117C2.05844 3.74835 2.02288 4.25128 1.99707 5.22559C1.97139 6.19529 1.95525 7.6059 1.94238 9.7002L1.90723 18.2773C1.88141 26.45 1.86505 30.4165 1.98633 32.5088C2.04717 33.558 2.14098 34.0831 2.26172 34.4141C2.34659 34.6465 2.44597 34.7924 2.60742 34.9941L2.79102 35.2207L2.79688 35.2266C2.9882 35.4683 3.44864 35.8383 3.86035 36.0732L4.03321 36.165L4.03907 36.168L4.82618 36.5664L11.8916 36.5664C15.3808 36.5664 17.1937 36.5665 18.1299 36.6084C18.5759 36.6284 18.8976 36.6589 19.1094 36.7363C19.2305 36.7807 19.3842 36.8642 19.4844 37.0322C19.5777 37.1893 19.5762 37.3464 19.5762 37.3965C19.5762 38.575 19.2297 41.69 18.9102 43.6279L18.7764 44.377L18.7764 44.3779C18.3034 46.7543 17.8003 48.3985 16.9219 50.3926L16.5215 51.2715L16.5205 51.2725C14.1655 56.2775 10.6142 59.6838 4.74512 62.6445L4.16993 62.9297L4.16895 62.9307C2.58407 63.6973 1.71272 64.2449 1.21973 64.8281C0.816228 65.3056 0.638356 65.8424 0.594732 66.6787L0.58399 67.0557C0.584015 67.356 0.587347 67.5512 0.61524 67.75C0.642468 67.9439 0.695537 68.1572 0.812506 68.4727C0.933266 68.7983 1.11412 69.2142 1.38672 69.8057L2.51173 72.1895C3.05117 73.3152 3.59876 74.4141 4.04493 75.2734C4.26816 75.7034 4.46433 76.0716 4.6211 76.3516C4.78442 76.6432 4.88755 76.8051 4.92774 76.8564C5.90289 78.0467 7.52649 78.4248 9.38868 77.7334L9.76466 77.5801C20.8734 72.6721 29.3929 64.4459 33.4111 54.8545L33.7861 53.9219L33.7861 53.9209L33.9912 53.3721C34.9384 50.7308 35.7879 46.9908 36.3272 43.0635L36.4375 42.2188L36.6777 40.2324C37.1715 35.8289 37.2246 32.4848 37.2246 18.6406C37.2246 11.3455 37.2206 7.54121 37.1777 5.48145C37.1396 3.6464 37.0669 3.26457 36.9854 3.06836L36.9502 2.99219L36.9482 2.98828C36.6313 2.33387 36.0864 1.73677 35.4014 1.30176L35.0996 1.125L35.0967 1.12402L34.5039 0.801758L19.6777 0.801759Z"></path>
                                                    </svg>
                                                    <?php if (!empty($data['matrik_testimonial_section_four_genaral_author_title'])): ?>
                                                        <span><?php echo esc_html($data['matrik_testimonial_section_four_genaral_author_title']); ?></span>
                                                    <?php endif; ?>
                                                    <?php if (!empty($data['matrik_testimonial_section_four_genaral_author_description'])): ?>
                                                        <p><?php echo esc_html($data['matrik_testimonial_section_four_genaral_author_description']); ?></p>
                                                    <?php endif; ?>
                                                    <div class="author-area">
                                                        <?php if (!empty($data['matrik_testimonial_section_four_genaral_author_name'])): ?>
                                                            <h5><?php echo esc_html($data['matrik_testimonial_section_four_genaral_author_name']); ?></h5>
                                                        <?php endif; ?>
                                                        <?php if (!empty($data['matrik_testimonial_section_four_genaral_author_designation'])): ?>
                                                            <span><?php echo esc_html($data['matrik_testimonial_section_four_genaral_author_designation']); ?></span>
                                                        <?php endif; ?>
                                                        <ul class="img-grp" style="display: none;">
                                                            <?php foreach ($settings['matrik_testimonial_section_four_testimonial_list'] as $image): ?>
                                                                <li class="author-img"><img src="<?php echo esc_url($image['matrik_testimonial_section_four_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'matrik-core'); ?>"></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="contact-btn-area">
                                    <ul class="img-grp">
                                        <?php foreach ($settings['matrik_testimonial_section_four_testimonial_list'] as $image): ?>
                                            <li><img src="<?php echo esc_url($image['matrik_testimonial_section_four_genaral_author_image']['url']); ?>" alt="<?php echo esc_attr__('author-image', 'matrik-core'); ?>"></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php if (!empty($settings['matrik_testimonial_five_contact_area_button_text'])): ?>
                                        <a class="contact-btn" href="<?php echo esc_url($settings['matrik_testimonial_five_contact_area_button_text_url']['url']); ?>">
                                            <?php echo esc_html($settings['matrik_testimonial_five_contact_area_button_text']); ?>
                                            <svg viewBox="0 0 13 20">
                                                <polyline points="0.5 19.5 3 19.5 12.5 10 3 0.5"></polyline>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="slider-btn-grp four white">
                            <div class="slider-btn testimonial-slider-prev">
                                <i class="bi bi-arrow-left"></i>
                            </div>
                            <div class="slider-btn testimonial-slider-next">
                                <i class="bi bi-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Testimonial_Widget());
