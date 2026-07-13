<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Service_Details_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_service_details';
    }

    public function get_title()
    {
        return esc_html__('EG Service Details', 'matrik-core');
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
            'matrik_service_details_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_service_details_genaral_style_selection',
            [
                'label'   => esc_html__('Select Style', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_one' => esc_html__('Style One', 'matrik-core'),
                    'style_two' => esc_html__('Style Two', 'matrik-core'),
                    'style_three' => esc_html__('Style Three', 'matrik-core'),
                ],
                'default' => 'style_one',
            ]
        );

        $this->add_control(
            'matrik_service_details_genaral_banner_image',
            [
                'label' => esc_html__('Banner Image', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_one', 'style_three']
                ]
            ]
        );

        $this->add_control(
            'matrik_service_details_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Steel Sheets & Plates', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_one']
                ]
            ]
        );


        $this->add_control(
            'matrik_service_details_genaral_style_two_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('We Combine Our Passion', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_two']
                ]
            ]
        );

        $this->add_control(
            'matrik_service_details_genaral_description_one',
            [
                'label'       => esc_html__('Description One', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Urna Aenean onewaryzo eleifend vitae tellus a facilisis. Nunc posuere at augue eget porta. Inei odio tellus, dignissim fermentumara purus nec, consequat dapibus metus.Vivamus urna worlda mauris, faucibus at egestas quis, fermentum egetonav neque. Duis pharetra lectus nec risusonl pellentesque, vitae aliquet nisi dapibus. Sed volutpat mi velit, ateng maximus est eleifend accui Fusce porttitor ex arcu. Phasellus viverra lorem a nibh placerat tincidunt.bolgotai Aliquam andit rutrum elementum urna, vel fringilla tellus varius ut. Morbi non velit odio.', 'matrik-core'),
                'placeholder' => esc_html__('write your description one here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_one']
                ]
            ]
        );

        $this->add_control(
            'matrik_service_details_genaral_style_two_description',
            [
                'label'       => esc_html__('Description', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('Where innovation meets passion in a journey that started with a simple idea and a shared dream. Founded in recent year we embarked on a mission to bring the new innovation and introduce the technology. From humble beginnings to our current aspirations, every step has been fueled by a relentless commitment ', 'matrik-core'),
                'placeholder' => esc_html__('write your description one here', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_two']
                ]
            ]
        );

        $this->add_control(
            'matrik_service_details_genaral_description_two',
            [
                'label'       => esc_html__('Description Two', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => esc_html__('urna Aenean onewaryzo eleifend vitae tellus a facilisis. Nunc posuere at augue eget porta. Inei odio tellus, dignissim fermentumara purus nec, consequat dapibus metus.Vivamus urna worlda mauris, faucibus at egestas quis, fermentum egetonav neque. Duis pharetra lectus nec risusonl pellentesque, ', 'matrik-core'),
                'label_block' => true,
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_one']
                ]
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_service_details_style_two_list_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('Custom Software ', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('write your text here', 'matrik-core'),
                'label_block' => true,
            ]
        );


        $this->add_control(
            'matrik_service_details_style_two_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('Custom Software ', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('Enterprise Software ', wp_kses_allowed_html('post')),

                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('API Integration ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('Mobile Application ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('Maintenance and Support ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('E-commerce Platform ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('Software Consulting ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('UI/UX Design ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('SaaS Product', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('Web Application ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('Cloud-Based Solutions ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_style_two_list_title' => wp_kses('DevOps Automation ', wp_kses_allowed_html('post')),
                    ],

                ],
                'title_field' => '{{{ matrik_service_details_style_two_list_title }}}',
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_two']
                ]
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        // accordion title
        $repeater->add_control(
            'matrik_service_details_genaral_style_three_faq_question',
            [
                'label' => esc_html__('Question', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('01. Do you provide design and Industry services?', 'matrik-core'),
                'label_block' => true,
            ]
        );

        // accordion Description
        $repeater->add_control(
            'matrik_service_details_genaral_style_three_faq_answer',
            [
                'label' => esc_html__('Answer', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => wp_kses('Yes, we provide comprehensive design and industry services tailored to meet your needs.', 'matrik-core'),
            ]
        );

        $this->add_control(
            'matrik_service_details_genaral_style_three_faq_list',
            [
                'label' => esc_html__('FAQ List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_service_details_genaral_style_three_faq_question' => esc_html('01. Do you provide design and Industry services?'),
                        'matrik_service_details_genaral_style_three_faq_answer' => wp_kses('Yes, we provide comprehensive design and industry services tailored to meet your needs.', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_genaral_style_three_faq_question' => esc_html('02. Is Matrik suitable for my business?'),
                        'matrik_service_details_genaral_style_three_faq_answer' => wp_kses('Discover if Matrik is the right fit for your business by exploring its tailored solutions for various industries and unique needs. ', wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_genaral_style_three_faq_question' => esc_html('03. What is your typical project timeline?'),
                        'matrik_service_details_genaral_style_three_faq_answer' => wp_kses("Discover the typical project timeline for our construction services, outlining each phase from planning to completion, ensuring timely and efficient project delivery.", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_genaral_style_three_faq_question' => esc_html('04. How do you handle permits and inspections?'),
                        'matrik_service_details_genaral_style_three_faq_answer' => wp_kses("WDiscover the typical project timeline for our construction services, outlining each phase from planning to completion, ensuring timely and efficient project delivery. ", wp_kses_allowed_html('post')),
                    ],
                    [
                        'matrik_service_details_genaral_style_three_faq_question' => esc_html('05. How do you handle waste disposal and recycling?'),
                        'matrik_service_details_genaral_style_three_faq_answer' => wp_kses("At our construction sites, we prioritize responsible waste disposal and recycling by adhering to local regulations, implementing sustainable practices, and partnering with certified waste management services to minimize environmental impact.", wp_kses_allowed_html('post')),
                    ],
                ],
                'title_field' => '{{{ matrik_service_details_genaral_style_three_faq_question }}}',
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_three']
                ]
            ]
        );


        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_service_details_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_one']
                ]
            ]
        );

        $this->add_control(
            'matrik_service_details_style_genaral_title',
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
                'name'     => 'matrik_service_details_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .service-details-page-wrap .service-details-content h2',

            ]
        );

        $this->add_control(
            'matrik_service_details_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details-page-wrap .service-details-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_details_style_genaral_description',
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
                'name'     => 'matrik_service_details_style_genaral_description_typ',
                'selector' => '{{WRAPPER}} .service-details-page-wrap .service-details-content p',

            ]
        );

        $this->add_control(
            'matrik_service_details_style_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details-page-wrap .service-details-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_service_details_style_style_two_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_two']
                ]
            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_two_genaral_title',
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
                'name'     => 'matrik_service_details_style_style_two_genaral_title_typ',
                'selector' => '{{WRAPPER}} .service-details-page-wrap .service-details-content h2',

            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_two_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details-page-wrap .service-details-content h2' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'matrik_service_details_style_style_two_genaral_description',
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
                'name'     => 'matrik_service_details_style_style_two_genaral_description_typ',
                'selector' => '{{WRAPPER}} .service-details-page-wrap .service-details-content .title-area p',

            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_two_genaral_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details-page-wrap .service-details-content .title-area p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_two_genaral_content_title',
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
                'name'     => 'matrik_service_details_style_style_two_genaral_content_title_typ',
                'selector' => '{{WRAPPER}} .service-details-page-wrap .service-details-content ul li',

            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_two_genaral_content_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details-page-wrap .service-details-content ul li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_two_genaral_content_title_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details-page-wrap .service-details-content ul li svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
        //style start

        $this->start_controls_section(
            'matrik_service_details_style_style_three_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'matrik_service_details_genaral_style_selection' => ['style_three']
                ]
            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_three_genaral_faq_section',
            [
                'label'     => esc_html__('FAQ Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_three_genaral_faq_section_bg_color',
            [
                'label'     => esc_html__('Section Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details-thumb-area .service-details-faq-area' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_three_genaral_faq_title',
            [
                'label'     => esc_html__('FAQ Title', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_details_style_style_three_genaral_faq_title_typ',
                'selector' => '{{WRAPPER}} .service-details-thumb-area .service-details-faq-area .faq-wrap .accordion .accordion-item .accordion-header .accordion-button',

            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_three_genaral_faq_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details-thumb-area .service-details-faq-area .faq-wrap .accordion .accordion-item .accordion-header .accordion-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_three_genaral_faq_description',
            [
                'label'     => esc_html__('FAQ Description', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_service_details_style_style_three_genaral_faq_description_typ',
                'selector' => '{{WRAPPER}} .service-details-thumb-area .service-details-faq-area .faq-wrap .accordion .accordion-item .accordion-body',

            ]
        );

        $this->add_control(
            'matrik_service_details_style_style_three_genaral_faq_description_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details-thumb-area .service-details-faq-area .faq-wrap .accordion .accordion-item .accordion-body' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <?php if ($settings['matrik_service_details_genaral_style_selection'] == 'style_one') : ?>
            <div class="service-details-page-wrap" id="scroll-section">
                <div class="container">
                    <div class="row gy-md-5 gy-4">
                        <div class="col-lg-8">
                            <div class="service-details-content">
                                <?php if (!empty($settings['matrik_service_details_genaral_title'])) : ?>
                                    <h2><?php echo esc_html($settings['matrik_service_details_genaral_title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_service_details_genaral_description_one'])) : ?>
                                    <p><?php echo esc_html($settings['matrik_service_details_genaral_description_one']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($settings['matrik_service_details_genaral_description_two'])) : ?>
                                    <p><?php echo esc_html($settings['matrik_service_details_genaral_description_two']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($settings['matrik_service_details_genaral_banner_image']['url'])) : ?>
                            <div class="col-lg-4">
                                <div class="service-details-img">
                                    <img src="<?php echo esc_url($settings['matrik_service_details_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_service_details_genaral_style_selection'] == 'style_two') : ?>
            <div class="service-details-page-wrap">
                <div class="container">
                    <div class="service-details-content">
                        <div class="title-area">
                            <?php if (!empty($settings['matrik_service_details_genaral_style_two_title'])) : ?>
                                <h2><?php echo esc_html($settings['matrik_service_details_genaral_style_two_title']); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['matrik_service_details_genaral_style_two_description'])) : ?>
                                <p><?php echo esc_html($settings['matrik_service_details_genaral_style_two_description']); ?></p>
                            <?php endif; ?>
                        </div>
                        <ul>
                            <?php foreach ($settings['matrik_service_details_style_two_content_list'] as $data) : ?>
                                <?php if (!empty($data['matrik_service_details_style_two_list_title'])) : ?>
                                    <li>
                                        <svg width="15" height="15" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.376831 8.16821C-0.247095 8.54593 -0.0579659 9.49862 0.662688 9.60837C1.24211 9.69666 1.52052 10.3701 1.17304 10.8431C0.740845 11.4312 1.27942 12.2389 1.98713 12.0639C2.55609 11.9231 3.07065 12.4387 2.9302 13.0088C2.75556 13.718 3.56158 14.2577 4.14855 13.8246C4.62054 13.4764 5.29275 13.7554 5.38073 14.336C5.49024 15.0581 6.44099 15.2476 6.81798 14.6224C7.12107 14.1198 7.84864 14.1198 8.15171 14.6224C8.52867 15.2476 9.47943 15.0581 9.58896 14.336C9.67707 13.7554 10.3492 13.4764 10.8211 13.8246C11.4081 14.2577 12.2142 13.718 12.0395 13.0088C11.899 12.4387 12.4136 11.9231 12.9826 12.0639C13.6903 12.2389 14.2289 11.4312 13.7967 10.8431C13.4492 10.3701 13.7276 9.69653 14.307 9.60837C15.0276 9.49864 15.2168 8.54597 14.5929 8.16821C14.0912 7.86452 14.0912 7.13547 14.5929 6.83178C15.2168 6.45407 15.0277 5.50138 14.307 5.39162C13.7276 5.30334 13.4492 4.62989 13.7967 4.15695C14.2289 3.56879 13.6903 2.76112 12.9826 2.93613C12.4136 3.07687 11.8991 2.5613 12.0395 1.99115C12.2141 1.28199 11.4081 0.742345 10.8211 1.17541C10.3492 1.52356 9.67695 1.2446 9.58896 0.664029C9.47945 -0.0580599 8.5287 -0.247606 8.15171 0.377594C7.84863 0.880237 7.12106 0.880237 6.81798 0.377594C6.44103 -0.247596 5.49027 -0.0580833 5.38073 0.664029C5.29263 1.24462 4.62054 1.5236 4.14855 1.17541C3.56158 0.742345 2.75554 1.28201 2.9302 1.99115C3.07065 2.56126 2.55612 3.07686 1.98713 2.93613C1.2794 2.76113 0.740845 3.56879 1.17304 4.15695C1.52049 4.62989 1.24209 5.30346 0.662688 5.39162C-0.0579425 5.50136 -0.247105 6.45403 0.376831 6.83178C0.878459 7.13548 0.878459 7.86453 0.376831 8.16821Z" />
                                        </svg>
                                        <?php echo esc_html($data['matrik_service_details_style_two_list_title']); ?>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($settings['matrik_service_details_genaral_style_selection'] == 'style_three') : ?>
            <div class="service-details-thumb-area">
                <div class="container">
                    <?php if (!empty($settings['matrik_service_details_genaral_banner_image']['url'])) : ?>
                        <div class="service-details-thumb-img">
                            <img src="<?php echo esc_url($settings['matrik_service_details_genaral_banner_image']['url']); ?>" alt="<?php echo esc_attr__('banner-image', 'matrik-core'); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="service-details-faq-area">
                        <div class="faq-wrap">
                            <div class="accordion" id="accordionExample">
                                <?php foreach ($settings['matrik_service_details_genaral_style_three_faq_list'] as $index => $data) :
                                    $heading_id  = 'heading_' . $index;
                                    $collapse_id = 'collapse_' . $index;
                                    $is_first    = $index === 0;
                                ?>
                                    <div class="accordion-item wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                                        <?php if (!empty($data['matrik_service_details_genaral_style_three_faq_question'])) : ?>
                                            <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
                                                <button
                                                    class="accordion-button <?php echo $is_first ? '' : 'collapsed'; ?>"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                                                    aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>"
                                                    aria-controls="<?php echo esc_attr($collapse_id); ?>">
                                                    <?php echo esc_html($data['matrik_service_details_genaral_style_three_faq_question']); ?>
                                                </button>
                                            </h2>
                                        <?php endif; ?>

                                        <?php if (!empty($data['matrik_service_details_genaral_style_three_faq_answer'])) : ?>
                                            <div
                                                id="<?php echo esc_attr($collapse_id); ?>"
                                                class="accordion-collapse collapse <?php echo $is_first ? 'show' : ''; ?>"
                                                aria-labelledby="<?php echo esc_attr($heading_id); ?>"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <?php echo esc_html($data['matrik_service_details_genaral_style_three_faq_answer']); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
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

Plugin::instance()->widgets_manager->register(new Matrik_Service_Details_Widget());
