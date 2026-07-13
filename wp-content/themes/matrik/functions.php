<?php

use Egns\Helper\Egns_Helper;

if (!class_exists('Egns_Handler')) {

	/**
	 * Main theme class with configuration
	 */

	class Egns_Handler
	{

		/**
		 * Initializes a singleton instance
		 *
		 * @return \Egns_Handler
		 */
		private static $instance;


		public static function get_instance()
		{
			if (is_null(self::$instance)) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Main Class Constructor
		 */
		public function __construct()
		{

			// Include all require files
			require_once get_template_directory() . '/helpers/constants.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/theme_setup.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/assets.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/helper.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/breadcrumb.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/comments.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/woo-hooks-mutated.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/custom-with-ajax.php';
			require_once EGNS_HELPERS_ROOT_DIR . '/nav-walker.php';
			require_once EGNS_INC_ROOT_DIR . '/plugins/tgma/activation.php';

			// Instantiation helper classes
			new Egns\Helper\Egns_Assets();
			new Egns\Helper\Egns_Theme_Setup();
			new Egns\Helper\Egns_Helper();
		}
	}

	Egns_Handler::get_instance();
}


/**
 * Remove p tag from contact form 7
 */
add_filter('wpcf7_autop_or_not', '__return_false');


/**
 * Change the number of related products output
 */
function matrik_move_comment_field($fields)
{
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter('comment_form_fields', 'matrik_move_comment_field', 10, 3);


/**
 *Codestar Fontawesome 5 
 */
if (! function_exists('egns_fontawesome_enqueue_fa5')) {
	function egns_fontawesome_enqueue_fa5()
	{
		wp_enqueue_style('fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all');
		wp_enqueue_style('fa5-v4-shims', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array(), '5.13.0', 'all');
	}
	add_action('wp_enqueue_scripts', 'egns_fontawesome_enqueue_fa5');
}

/**
 *Codestar custom icon 5 
 */
if (! function_exists('my_custom_icons')) {
	function my_custom_icons($icons)
	{
		// Adding new icons
		$icons[]  = array(
			'title' => 'My Custom Icons',
			'icons' => array(
				'egns-icon-twitter'
			)
		);

		// Move custom icons to top of the list.
		$icons = array_reverse($icons);

		return $icons;
	}
	add_filter('csf_field_icon_add_icons', 'my_custom_icons');
}

/**
 * Output Custom CSS and JS in Frontend Get From Theme Option Panel
 */

function matrik_opt_custom_css()
{
	$custom_css = Egns_Helper::egns_get_theme_option('custom_css');
	if (!empty($custom_css)) {
		echo '<style>' . $custom_css . '</style>';
	}
}
add_action('wp_head', 'matrik_opt_custom_css', 100);


function matrik_opt_custom_js()
{
	$custom_js = Egns_Helper::egns_get_theme_option('custom_javascript');
	if (! empty($custom_js)) {
		echo '<script>' . $custom_js . '</script>';
	}
}
add_action('wp_footer', 'matrik_opt_custom_js', 100);
