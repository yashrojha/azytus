<?php

namespace Egns_Core;

/**
 * All Elementor widget init
 * 
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit(); // exit if access directly
}

if (!class_exists('Egns_Elementor')) {

	class Egns_Elementor
	{

		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;



		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct()
		{
			//elementor widget category registered
			add_action('elementor/elements/categories_registered', array($this, '_widget_categories'));

			//elementor widget registered
			add_action('elementor/widgets/register', array($this, '_widget_registered'));

			// Enqueue stylesheets in editor page and frontend
			add_action('elementor/editor/before_enqueue_styles', array($this, 'matrik_enqueue_style'));
			add_action('elementor/frontend/before_enqueue_styles', array($this, 'matrik_enqueue_style'));
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		// Custom widgets css 
		public function matrik_enqueue_style()
		{
			wp_enqueue_style('wp-blocks-library', includes_url('css/dist/block-library/style.min.css'));
			wp_enqueue_style('matrik-widgets', EGNS_CORE_THEME_CSS . '/el-widgets.css', null, filemtime(get_template_directory() . '/assets/css/el-widgets.css'));
		}

		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager)
		{
			$elements_manager->add_category(
				'matrik_widgets',
				[
					'title' => esc_html__('Matrik Widgets', 'matrik-core'),
					'icon'  => 'fa fa-plug',
				]
			);
		}


		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered()
		{

			if (!class_exists('Elementor\Widget_Base')) {
				return;
			}

			$elementor_widgets = array(
				//Elementor Widgets
				'footer-one',
				'footer-two',
				'footer-three',
				'footer-four',
				'footer-five',
				'footer-six',
				'hero-banner-one',
				'about',
				'feature',
				'team',
				'video',
				'counter',
				'process',
				'testimonial',
				'faq',
				'map',
				'blog',
				'footer-top-banner',
				'service',
				'heading',
				//home two
				'hero-banner-two',
				'benefit',
				'why-choose-us',
				'contact',
				'certification',
				//home three
				'hero-banner-three',
				'scroll',
				'industry-location',
				'company-info',
				'partner-logo',
				//home four
				'hero-banner-four',
				//home five
				'hero-banner-five',
				//home Six
				'hero-banner-six',
				'hero-banner-six-social',
				'subscription',

				//inner page
				'project-metro',
				'project-horizontal',
				'project-single-slider',
				'project',
				'feature-inner',
				'career-gallery',
				'career',
				'process-inner',
				'client',
				'service-inner',
				'service-details',
				'material',
				'mega-menu',


				//Material Details page
				'material-detail',
				'material-documents',
			);

			$elementor_widgets = apply_filters('matrik_widgets', $elementor_widgets);

			if (is_array($elementor_widgets) && !empty($elementor_widgets)) {

				foreach ($elementor_widgets as $widget) {

					if (file_exists(EGNS_CORE_INC . '/elementor/widgets/class-' . $widget . '-elementor-widget.php')) {
						require_once EGNS_CORE_INC . '/elementor/widgets/class-' . $widget . '-elementor-widget.php';
					}
				}
			}
		} // End _widget_registered



	}
	if (class_exists('Egns_Elementor')) {
		Egns_Elementor::getInstance();
	}
} //end if
