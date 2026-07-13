<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;  // Exit if accessed directly

use Elementor\core\Schemes;
use Egns_Core\Egns_Helper;

class Matrik_Hero_Banner_Four_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'matrik_hero_banner_four';
    }

    public function get_title()
    {
        return esc_html__('EG Hero Banner Four', 'matrik-core');
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
            'matrik_hero_banner_four_genaral',
            [
                'label' => esc_html__('General', 'matrik-core')
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_genaral_title',
            [
                'label'       => esc_html__('Title', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Metal INDUSTRY', 'matrik-core'),
                'placeholder' => esc_html__('write your title here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_genaral_video_area',
            [
                'label'     => esc_html__('Video Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_genaral_video_area_select_area',
            [
                'label'   => esc_html__('Select Type', 'matrik-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'upload' => esc_html__('Upload', 'matrik-core'),
                    'url' => esc_html__('URL', 'matrik-core'),
                ],
                'default' => 'url',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_genaral_video_area_upload',
            [
                'label' => esc_html__('Choose Video File', 'matrik-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_types' => ['video'],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'matrik_hero_banner_four_genaral_video_area_select_area' => ['upload'],
                ]
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_genaral_video_area_link',
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
                    'matrik_hero_banner_four_genaral_video_area_select_area' => ['url'],
                ]
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_genaral_circular_text_area',
            [
                'label'     => esc_html__('Circular Text Area', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_genaral_circular_text_area_show',
            [
                'label' => esc_html__("Show Circular Area?", 'matrik-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Enable', 'matrik-core'),
                'label_off' => esc_html__('Disable', 'matrik-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_genaral_circular_text_area_text',
            [
                'label'       => esc_html__('Circular Text', 'matrik-core'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('INDUSTRY . SECTOR . SERVE .', 'matrik-core'),
                'placeholder' => esc_html__('write your button text here', 'matrik-core'),
                'label_block' => true,
            ]
        );

        $this->end_controls_section();


        //style start

        $this->start_controls_section(
            'matrik_hero_banner_four_style_genaral',
            [
                'label'     => esc_html__('Styles', 'matrik-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_style_genaral_title',
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
                'name'     => 'matrik_hero_banner_four_style_genaral_title_typ',
                'selector' => '{{WRAPPER}} .home4-banner-section h1',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_style_genaral_title_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .home4-banner-section h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_style_general_circular_text',
            [
                'label'     => esc_html__('Circular Text', 'matrik-core'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'    => esc_html__('Typography', 'matrik-core'),
                'name'     => 'matrik_hero_banner_four_style_general_circular_text_typ',
                'selector' => '{{WRAPPER}} .home4-banner-section .banner-video-area .video-wrapper .circular-text2 .text span',

            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_style_general_circular_text_color',
            [
                'label'     => esc_html__('Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home4-banner-section .banner-video-area .video-wrapper .circular-text2 .text span' => 'color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_style_general_circular_text_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home4-banner-section .banner-video-area .video-wrapper .circular-text2 .play-btn svg' => 'fill: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_style_general_circular_text_sec_bg_color',
            [
                'label'     => esc_html__('Outside Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home4-banner-section .banner-video-area .video-wrapper .circular-text2' => 'background-color: {{VALUE}};',

                ],
            ]
        );

        $this->add_control(
            'matrik_hero_banner_four_style_general_circular_text_inside_bg_color',
            [
                'label'     => esc_html__('Inside Background Color', 'matrik-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .home4-banner-section .banner-video-area .video-wrapper .circular-text2 .play-btn' => 'background-color: {{VALUE}};',

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
                const video = document.querySelector(".video-area video");
                const playBtn = document.querySelector(".play-btn");

                if (video && playBtn) {
                    // Ensure both elements exist
                    playBtn.addEventListener("click", function(event) {
                        event.preventDefault(); // Prevent unwanted link behavior

                        if (video.paused) {
                            video.play();
                            playBtn.classList.add("active"); // Add active class
                        } else {
                            video.pause();
                            playBtn.classList.remove("active"); // Remove active class
                        }
                    });
                };
            </script>
        <?php endif; ?>

        <div class="home4-banner-section">
            <?php if (!empty($settings['matrik_hero_banner_four_genaral_title'])) : ?>
                <h1><?php echo esc_html($settings['matrik_hero_banner_four_genaral_title']); ?></h1>
            <?php endif; ?>
            <div class="banner-video-area">
                <div class="video-area">
                    <video autoplay="" loop="" muted="" playsinline="" src="<?php if ($settings['matrik_hero_banner_four_genaral_video_area_select_area'] == 'upload') : ?><?php echo esc_url($settings['matrik_hero_banner_four_genaral_video_area_upload']['url']); ?><?php elseif ($settings['matrik_hero_banner_four_genaral_video_area_select_area'] == 'url') : ?><?php echo esc_url($settings['matrik_hero_banner_four_genaral_video_area_link']['url']); ?><?php endif; ?>"></video>
                </div>
                <div class="video-wrapper">
                    <?php if ($settings['matrik_hero_banner_four_genaral_circular_text_area_show'] == 'yes') : ?>
                        <div class="circular-text2">
                            <a href="#" class="play-btn active">
                                <svg class="play-icon" width="24" height="27" viewBox="0 0 24 27" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.3787 9.99987L4.82154 0.433939C4.34825 0.153923 3.80926 0.00420458 3.25936 0C2.39492 0 1.56589 0.343396 0.954645 0.954644C0.343396 1.56589 0 2.39492 0 3.25936V23.7895C0.000109938 24.3631 0.153886 24.9263 0.445339 25.4203C0.736791 25.9144 1.15528 26.3214 1.65729 26.599C2.1593 26.8766 2.72651 27.0146 3.29994 26.9988C3.87336 26.9829 4.43207 26.8137 4.91797 26.5088L21.4944 16.0364C22.0098 15.7139 22.4329 15.2633 22.7224 14.7286C23.0119 14.1939 23.1579 13.5933 23.1463 12.9854C23.1346 12.3775 22.9657 11.7829 22.6559 11.2597C22.3461 10.7365 21.9061 10.3024 21.3787 9.99987Z" />
                                </svg>
                                <svg class="pause-icon" width="21" height="27" viewBox="0 0 21 27" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.125 3.375C7.125 1.51104 5.61396 0 3.75 0C1.88604 0 0.375 1.51104 0.375 3.375V23.625C0.375 25.489 1.88604 27 3.75 27C5.61396 27 7.125 25.489 7.125 23.625V3.375Z" />
                                    <path d="M20.625 3.375C20.625 1.51104 19.114 0 17.25 0C15.386 0 13.875 1.51104 13.875 3.375V23.625C13.875 25.489 15.386 27 17.25 27C19.114 27 20.625 25.489 20.625 23.625V3.375Z" />
                                </svg>
                            </a>
                            <?php if (!empty($settings['matrik_hero_banner_four_genaral_circular_text_area_text'])) : ?>
                                <div class="text">
                                    <span>
                                        <?php echo esc_html($settings['matrik_hero_banner_four_genaral_circular_text_area_text']); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php

    }
}

Plugin::instance()->widgets_manager->register(new Matrik_Hero_Banner_Four_Widget());
