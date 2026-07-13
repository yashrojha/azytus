<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Material_Documents_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_material_documents';
    }

    public function get_title()
    {
        return esc_html__('EG Material Documents', 'matrik-core');
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
            'matrik_material_document_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );
        
        $this->add_control(
            'matrik_material_documents_general_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('[Advance R&D]', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        // Repeater
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'matrik_material_document_content_title',
            [
                'label' => esc_html__('Content Title', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Integrated Report', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'matrik_material_documents_content_button',
            [
                'label' => esc_html__('Button Text', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('DOWNLOAD', wp_kses_allowed_html('post')),
                'placeholder' => esc_html__('Type your button text here', 'matrik-core'),
            ]
        );

        $repeater->add_control(
            'matrik_material_document_content_type',
            [
                'label'   => esc_html__('Select Type', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload' => esc_html__('Upload', 'matrik-core'),
                    'link' => esc_html__('Link', 'matrik-core'),

                ],
                'default' => 'upload',
            ]
        );

        $repeater->add_control(
            'matrik_material_genaral_document_content_upload',
            [
                'label' => esc_html__('Choose PDF', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['application/pdf'],
                'condition' => [
                    'matrik_material_document_content_type' => ['upload'],
                ]
            ]
        );

        $repeater->add_control(
            'matrik_material_document_content_url',
            [
                'label'   => esc_html__('URL/Link', 'matrik-core'),
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
                    'matrik_material_document_content_type' => ['link'],
                ]
            ]
        );

        $this->add_control(
            'matrik_material_documents_content_list',
            [
                'label' => esc_html__('Content List', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'matrik_material_document_content_title' => esc_html('Matrik Metal Company Profile'),

                    ],
                    [
                        'matrik_material_document_content_title' => esc_html('Integrated Report'),

                    ],
                    [
                        'matrik_material_document_content_title' => esc_html('Sustainbility Report'),

                    ],

                ],
                'title_field' => '{{{ matrik_material_document_content_title }}}',
            ]
        );

        $this->add_control(
            'matrik_material_document_area_bottom_text',
            [
                'label' => esc_html__('Bottom Text', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => wp_kses('See Your Near Location &amp; <a href="/contact">Contact</a> With Us Any Time!', wp_kses_allowed_html('post')),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        //style start

        $this->start_controls_section(
            'matrik_material_style_general_document_area',
            [
                'label'     => esc_html__('Documents Style', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_material_documents_general_area',
            [
                'label'     => esc_html__('General', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_document_general_title_typ',
                'selector' => '{{WRAPPER}} .section-title.three h2',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title.three h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_section',
            [
                'label'     => esc_html__('Document Section', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_section_bg_color',
            [
                'label'     => esc_html__('Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_section_hover_bg_color',
            [
                'label'     => esc_html__('Hover Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_title',
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
                'name'     => 'matrik_material_style_general_document_area_title_typ',
                'selector' => '{{WRAPPER}} .home4-product-section .document-area .document-list li h6',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_title_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li:hover h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_icon',
            [
                'label'     => esc_html__('Button Icon', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_icon_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li .download-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_hover_icon_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li:hover .download-btn svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_text',
            [
                'label'     => esc_html__('Button Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_general_document_area_button_text_typ',
                'selector' => '{{WRAPPER}} .home4-product-section .document-area .document-list li .download-btn span',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li .download-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_button_text_hover_color',
            [
                'label'     => esc_html__('Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .document-list li:hover .download-btn span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_bottom_title_text',
            [
                'label'     => esc_html__('Bottom Title Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_material_style_general_document_area_bottom_title_text_typ',
                'selector' => '{{WRAPPER}} .home4-product-section .document-area .contact-area h6',

            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_bottom_title_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .contact-area h6' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_bottom_title_text_span_color',
            [
                'label'     => esc_html__('Span Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .contact-area h6 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_material_style_general_document_area_bottom_title_text_span_hover_color',
            [
                'label'     => esc_html__('Span Hover Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-product-section .document-area .contact-area h6 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

?>

        <div class="home4-product-section">
            <div class="container">
                <div class="document-area">
                    <?php if (!empty($settings['matrik_material_documents_general_title'])) : ?>
                        <div class="section-title three mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h2><?php echo esc_html($settings['matrik_material_documents_general_title']); ?></h2>
                        </div>
                    <?php endif; ?>
                    <ul class="document-list">
                        <?php foreach ($settings['matrik_material_documents_content_list'] as $data) : ?>
                            <li>
                                <?php if (!empty($data['matrik_material_document_content_title'])) : ?>
                                    <h6><?php echo esc_html($data['matrik_material_document_content_title']); ?></h6>
                                <?php endif; ?>
                                <?php if (!empty($data['matrik_material_documents_content_button'])) : ?>
                                    <a href="<?php if ($data['matrik_material_document_content_type'] == 'upload') : ?><?php echo esc_url($data['matrik_material_genaral_document_content_upload']['url']); ?><?php elseif ($data['matrik_material_document_content_type'] == 'link') : ?><?php echo esc_url($data['matrik_material_document_content_url']['url']); ?><?php endif; ?>" download="Matrik Metal Company Profile.pdf" class="download-btn">
                                        <svg width="16" height="17" viewBox="0 0 16 17" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="M7.58515 12.917C7.63953 12.9717 7.70419 13.0151 7.77541 13.0447C7.84662 13.0743 7.92299 13.0896 8.00011 13.0896C8.07724 13.0896 8.1536 13.0743 8.22482 13.0447C8.29603 13.0151 8.36069 12.9717 8.41508 12.917L12.8442 8.48825C12.9003 8.43408 12.945 8.36929 12.9758 8.29764C13.0066 8.226 13.0228 8.14895 13.0235 8.07098C13.0242 7.99301 13.0093 7.91568 12.9798 7.84352C12.9502 7.77135 12.9066 7.70579 12.8515 7.65065C12.7964 7.59552 12.7308 7.55192 12.6586 7.52239C12.5865 7.49286 12.5092 7.47801 12.4312 7.47868C12.3532 7.47936 12.2762 7.49556 12.2045 7.52633C12.1329 7.55711 12.0681 7.60185 12.0139 7.65793L8.58732 11.0845V0.639948C8.58732 0.484209 8.52546 0.334849 8.41533 0.224725C8.30521 0.114602 8.15585 0.0527344 8.00011 0.0527344C7.84437 0.0527344 7.69501 0.114602 7.58489 0.224725C7.47476 0.334849 7.4129 0.484209 7.4129 0.639948V11.0845L3.98631 7.65793C3.93239 7.6009 3.86758 7.55525 3.79572 7.52369C3.72385 7.49213 3.64639 7.4753 3.56791 7.47419C3.48943 7.47308 3.41152 7.48772 3.3388 7.51723C3.26607 7.54674 3.2 7.59054 3.14448 7.64603C3.08897 7.70151 3.04515 7.76756 3.0156 7.84028C2.98605 7.91299 2.97138 7.99089 2.97245 8.06937C2.97352 8.14785 2.99032 8.22532 3.02184 8.2972C3.05337 8.36908 3.09898 8.43391 3.15599 8.48786L7.58515 12.917ZM14.6552 14.8783H1.34503C1.18929 14.8783 1.03993 14.9402 0.929803 15.0503C0.819679 15.1604 0.757813 15.3098 0.757812 15.4655C0.757813 15.6213 0.819679 15.7706 0.929803 15.8807C1.03993 15.9909 1.18929 16.0527 1.34503 16.0527H14.6552C14.8109 16.0527 14.9603 15.9909 15.0704 15.8807C15.1805 15.7706 15.2424 15.6213 15.2424 15.4655C15.2424 15.3098 15.1805 15.1604 15.0704 15.0503C14.9603 14.9402 14.8109 14.8783 14.6552 14.8783Z" />
                                            </g>
                                        </svg>
                                        <span><?php echo esc_html($data['matrik_material_documents_content_button']); ?></span>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php if ($settings['matrik_material_document_area_bottom_text']) : ?>
                        <div class="contact-area pt-50 wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <h6><?php echo wp_kses($settings['matrik_material_document_area_bottom_text'], wp_kses_allowed_html('post'))  ?></h6>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Material_Documents_Widget());
