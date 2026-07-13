<?php

namespace Egns\Helper;

use Egns_Helpers as GlobalEgns_Helpers;
use Elementor\Plugin;

if (!class_exists('Egns_Helper')) {

	/**
	 * Helper handlers class
	 */
	class Egns_Helper
	{

		/**
		 * Helper Class constructor
		 */
		function __construct()
		{
			// Before, After page load
			$this->actions();

			// Fire hook to include main header template
			add_action('egns_action_page_header_template', array($this, 'egns_load_page_header'));

			// Fire hook to include main footer template
			add_action('egns_action_page_footer_template', array($this, 'egns_load_page_footer'));
		}

		public function egns_load_page_header()
		{
			// Include header template
			echo apply_filters('egns_filter_header_template', self::egns_header_template());
		}


		public function egns_load_page_footer()
		{
			// Include Footer template
			echo apply_filters('egns_filter_footer_template', self::egns_footer_template());
		}


		/**
		 * Method that echo module template part.
		 *
		 * @param string $module name of the module from inc folder
		 * @param string $template full path of the template to load
		 * @param string $slug
		 * @param array  $params array of parameters to pass to template
		 */
		public static function egns_template_part($module, $template, $slug = '', $params = array())
		{
			echo self::egns_get_template_part($module, $template, $slug, $params);
		}

		/**
		 * Method that load module template part.
		 *
		 * @param string $module name of the module from inc folder
		 * @param string $template full path of the template to load
		 * @param string $slug
		 * @param array  $params array of parameters to pass to template
		 *
		 * @return string - string containing html of template
		 */
		public static function egns_get_template_part($module, $template, $slug = '', $params = array())
		{

			//HTML Content from template
			$html          = '';
			$template_path = EGNS_INC_ROOT_DIR . '/' . $module;

			$temp = $template_path . '/' . $template;
			if (is_array($params) && count($params)) {
				extract($params);
			}

			$template = '';

			if (!empty($temp)) {
				if (!empty($slug)) {
					$template = "{$temp}-{$slug}.php";

					if (!file_exists($template)) {
						$template = $temp . '.php';
					}
				} else {
					$template = $temp . '.php';
				}
			}

			if ($template) {
				ob_start();
				include($template);
				$html = ob_get_clean();
			}

			return $html;
		}

		/**
		 * Method that check file exists or not.
		 *
		 * @param string $module name of the module from inc folder
		 * @param string $template full path of the template to load
		 * @param string $slug
		 *
		 * @return boolean - if exists then return true or false
		 */
		public static function egns_check_template_part($module, $template, $slug = '', $params = array())
		{

			//HTML Content from template
			$html          = '';
			$template_path = EGNS_INC_ROOT_DIR . '/' . $module;

			$temp = $template_path . '/' . $template;
			if (is_array($params) && count($params)) {
				extract($params);
			}

			$template = '';

			if (!empty($temp)) {
				if (!empty($slug)) {
					$template = "{$temp}-{$slug}.php";

					if (!file_exists($template)) {
						return false;
					} else {
						return true;
					}
				} else {
					$template = $temp . '.php';
					if (!file_exists($template)) {
						return false;
					} else {
						return true;
					}
				}
			}
		}

		public static function get_industries_post_option()
		{
			$posts = get_posts(['post_type' => 'industries', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}

		public static function get_portfolio_post_option()
		{
			$posts = get_posts(['post_type' => 'portfolio', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		public static function get_case_study_post_option()
		{
			$posts = get_posts(['post_type' => 'case-study', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		public static function get_career_post_option()
		{
			$posts = get_posts(['post_type' => 'career', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		public static function get_portfolio_category_options()
		{
			$terms = get_terms([
				'taxonomy' => 'portfolio-category',
				'hide_empty' => false,
			]);

			$options = [];

			if (!is_wp_error($terms)) {
				foreach ($terms as $term) {
					$options[$term->term_id] = $term->name;
				}
			}

			return $options; // Just ID => Name
		}




		/**
		 * Method that checks if forward plugin installed
		 *
		 * @param string $plugin - plugin name
		 *
		 * @return bool
		 */
		public static function egns_is_installed($plugin)
		{

			switch ($plugin) {
				case 'egns-core';
					return class_exists('Egns_Core');
					break;
				case 'woocommerce';
					return class_exists('WooCommerce');
					break;
				default:
					return false;
			}
		}


		/**
		 * Overwrite the theme option when page option is available.
		 *
		 * @param mixed theme option value.
		 * @param mixed page option value.
		 * @since   1.0.0
		 * @return bool 
		 */
		public static function is_enabled($theme_option, $page_option)
		{

			if (class_exists('CSF')) {

				if ($theme_option == 1) {

					if ($page_option == 1) {
						return true;
					} elseif (is_singular('product') || is_singular('portfolio') ||  is_singular('post') || is_single('post') || self::matrik_is_blog_pages() || is_404()) {
						return true;
					} elseif ($theme_option == 1 && empty($page_option) && $page_option != 0) {
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return true;
			}
		}
		/**
		 * Get all created menus with ID
		 *
		 * @since   1.0.0
		 */
		public static function list_all_menus()
		{
			// Get all registered menus
			$menus = get_terms('nav_menu', array('hide_empty' => true));

			// Initialize an empty array to store menu names with ID
			$menu_names = array();

			// Check if there are any menus
			if (!empty($menus)) {
				// Loop through each menu and add its name to the array
				foreach ($menus as $menu) {
					$menu_names[$menu->term_id] = $menu->name;
				}
			}

			// Return the array of menu names
			return $menu_names;
		}


		public static function display_related_posts_by_category($post_id)
		{
			$categories = wp_get_post_categories($post_id);

			if ($categories) {
				$args = array(
					'category__in'   => $categories,
					'post__not_in'   => array($post_id),
					'posts_per_page' => 4, // Number of related posts to display
					'orderby'        => 'rand' // Random order
				);

				$related_posts = new \WP_Query($args);

				if ($related_posts->have_posts()) { ?>
					<div class="blog-post-area pt-90">
						<h6><?php echo esc_html__('You May Also Like', 'matrik') ?></h6>
						<span class="line-break3"></span>
						<span class="line-break"></span>
						<div class="row gy-5">
							<?php while ($related_posts->have_posts()) {
								$related_posts->the_post();
							?>
								<div class="col-md-6">
									<div class="blog-card2 two">
										<?php
										self::egns_template_part('blog', 'templates/common/grid/thumbnail');
										self::egns_template_part('blog', 'templates/common/content');
										?>
									</div>
								</div>
							<?php
							}
							wp_reset_postdata();
							?>

						</div>
					</div>
				<?php
				}
			}
		}


		public static function  egns_project_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_PROJECT_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}


		public static function  egns_career_value($key1, $key2 = '', $key3 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'EGNS_CAREER_META_ID', true);

			if (isset($page_options[$key1][$key2][$key3])) {
				return $page_options[$key1][$key2][$key3];
			} elseif (isset($page_options[$key1][$key2])) {
				return $page_options[$key1][$key2];
			} elseif (isset($page_options[$key1])) {
				return $page_options[$key1];
			} else {
				return $default;
			}
		}

		/**
		 * clean special chars, spaces with hyphens
		 *
		 * @since   1.0.0
		 */
		public static function clean($string)
		{
			$string = str_replace(' ', '', $string);                  // Replaces all spaces with hyphens.
			$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);  // Removes special chars.

			return preg_replace('/-+/', '', $string);  // Replaces multiple hyphens with single one.
		}

		/**
		 * Get first category with link
		 *
		 * @since   1.0.0
		 */
		public static function the_first_category()
		{
			$categories = get_the_category();
			if (!empty($categories)) {
				echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
			}
		}

		/**
		 * Option Dynamic Styles (Header)
		 *
		 * @since   1.0.0
		 */
		public function egns_header_template()
		{
			$egns_scrolltop = self::egns_get_theme_option('header_scroll_enable');

			if (1 == $egns_scrolltop) {
				get_template_part('inc/common/templates/scroll-top');
			}

			$get_header_style        = self::egns_get_theme_option('header_menu_style');
			$get_page_header_style   = self::egns_page_option_value('page_header_menu_style');
			$page_main_header_enable = self::egns_page_option_value('page_main_header_enable');

			// Get page header layout
			if (!empty($page_main_header_enable) && ($page_main_header_enable == 'disable') && class_exists('CSF')) {
				$get_header_style = 'no_header';
			} else {
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_one' && class_exists('CSF')) {
					$get_header_style = 'header_one';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_two' && class_exists('CSF')) {
					$get_header_style = 'header_two';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_three' && class_exists('CSF')) {
					$get_header_style = 'header_three';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_four' && class_exists('CSF')) {
					$get_header_style = 'header_four';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_five' && class_exists('CSF')) {
					$get_header_style = 'header_five';
				}
				if (!empty($get_page_header_style) && $get_page_header_style == 'header_six' && class_exists('CSF')) {
					$get_header_style = 'header_six';
				}
			}

			switch ($get_header_style) {
				case 'header_one':
					get_template_part('inc/header/templates/parts/header_one');
					break;
				case 'header_two':
					get_template_part('inc/header/templates/parts/header_two');
					break;
				case 'header_three':
					get_template_part('inc/header/templates/parts/header_three');
					break;
				case 'header_four':
					get_template_part('inc/header/templates/parts/header_four');
					break;
				case 'header_five':
					get_template_part('inc/header/templates/parts/header_five');
					break;
				case 'header_six':
					get_template_part('inc/header/templates/parts/header_six');
					break;
				case 'no_header':
					break;
				default:
					get_template_part('inc/header/templates/parts/header_one');
					break;
			}
		}



		/**
		 * Option Dynamic Styles (Footer)
		 *
		 * @since   1.2.0
		 */
		public function egns_footer_template()
		{
			$get_footer_style 	  	 	= self::egns_get_theme_option('footer_layout_style');
			$get_page_footer_style 		= self::egns_page_option_value('page_footer_layout');
			$page_main_footer_enable 	= self::egns_page_option_value('page_main_footer_enable');

			// Page Header Layout
			if (!empty($page_main_footer_enable) && ($page_main_footer_enable == 'disable') && class_exists('CSF')) {
				$get_footer_style = 'no_footer';
			} else {
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_one' && class_exists('CSF')) {
					$get_footer_style = 'footer_one';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_two' && class_exists('CSF')) {
					$get_footer_style = 'footer_two';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_three' && class_exists('CSF')) {
					$get_footer_style = 'footer_three';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_four' && class_exists('CSF')) {
					$get_footer_style = 'footer_four';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_five' && class_exists('CSF')) {
					$get_footer_style = 'footer_five';
				}
				if (!empty($get_page_footer_style) && $get_page_footer_style == 'footer_six' && class_exists('CSF')) {
					$get_footer_style = 'footer_six';
				}
			}

			switch ($get_footer_style) {
				case 'footer_one':
					get_template_part('inc/footer/templates/parts/footer_one');
					break;
				case 'footer_two':
					get_template_part('inc/footer/templates/parts/footer_two');
					break;
				case 'footer_three':
					get_template_part('inc/footer/templates/parts/footer_three');
					break;
				case 'footer_four':
					get_template_part('inc/footer/templates/parts/footer_four');
					break;
				case 'footer_five':
					get_template_part('inc/footer/templates/parts/footer_five');
					break;
				case 'footer_six':
					get_template_part('inc/footer/templates/parts/footer_six');
					break;
				case 'no_footer':
					break;
				default:
					get_template_part('inc/footer/templates/parts/footer_one');
					break;
			}
		}


		/**
		 * Is Pages
		 *
		 * @since   1.0.0
		 */
		public static function egns_is_blog_pages()
		{
			return ((((is_search()) || (is_404()) || is_archive()) || (is_single()) || (is_singular())  ||  (is_author()) || (is_category()) || (is_home()) || (is_tag()))) ? true : false;
		}

		/**
		 * Is Blog Pages
		 *
		 * @since   1.2.0
		 */
		public static function matrik_is_blog_pages()
		{
			return ((((is_search()) || is_archive()) ||  (is_author()) || (is_category()) || (is_home())  || (is_tag()))) ? true : false;
		}

		/**
		 * Get theme options.
		 *
		 * @param string $opts Required. Option name.
		 * @param string $key Required. Option key.
		 * @param string $default Optional. Default value.
		 * @since   1.0.0
		 */

		public static function egns_get_theme_option($key, $key2 = '', $default = '')
		{
			$egns_theme_options = get_option('egns_theme_options');

			if (!empty($key2)) {
				return isset($egns_theme_options[$key][$key2]) ? $egns_theme_options[$key][$key2] : $default;
			} else {
				return isset($egns_theme_options[$key]) ? $egns_theme_options[$key] : $default;
			}
		}

		/**
		 * Css Minifier.
		 * @param $css get css
		 * @since   1.0.0
		 */
		public static function cssminifier($css)
		{
			$css = str_replace(
				["\r\n", "\r", "\n", "\t", '    '],
				'',
				preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', trim($css))
			);
			return str_replace(
				['{ ', ' }', ' {', '} ', ' screen and '],
				['{', '}', '{', '}', ''],
				$css
			);
		}

		/**
		 * Return Page Option Value Based on Given Page Option ID.
		 *
		 * @since 1.0.0
		 *
		 * @param string $page_option_key Optional. Page Option id. By Default It will return all value.
		 * 
		 * @return mixed Page Option Value.
		 */
		public static function  egns_page_option_value($key1, $key2 = '', $default = '')
		{

			$page_options = get_post_meta(get_the_ID(), 'egns_page_options', true);

			if (isset($page_options[$key1][$key2])) {

				return $page_options[$key1][$key2];
			} else {
				if (isset($page_options[$key1])) {

					return  $page_options[$key1];
				} else {
					return $default;
				}
			}
		}


		/**
		 * Get Blog layout
		 *
		 * @since   1.0.0
		 */
		public static function egns_post_layout()
		{
			$egns_theme_options = get_option('egns_theme_options');

			$blog_layout = !empty($egns_theme_options['blog_layout_options']) ? $egns_theme_options['blog_layout_options'] : 'default';

			return $blog_layout;
		}

		/**
		 * Escape any String with Translation
		 *
		 * @since   1.0.0
		 */

		public static function egns_translate($value)
		{
			echo sprintf(__('%s', 'matrik'), $value);
		}
		/**
		 * Escape any String with Translation
		 *
		 * @since   1.0.0
		 */

		public static function egns_translate_with_escape_($value)
		{
			$value = esc_html($value);
			echo sprintf(__('%s', 'matrik'), $value);
		}

		/**
		 * Dynamic blog layout for post archive pages.
		 *
		 * @since   1.0.0
		 */
		public static function egns_dynamic_blog_layout()
		{
			$blog_layout = self::egns_post_layout();
			if (!empty($blog_layout)) {
				if ('default' == $blog_layout) {
					get_template_part('template-parts/blog/blog-standard');
				} elseif ($blog_layout == 'layout-01') {
					get_template_part('template-parts/blog/blog-grid-sidebar');
				}
			} else {
				get_template_part('template-parts/blog/blog-standard');
			}
		}

		/**
		 * 
		 * @return [string] audio url for audio post
		 */
		public static function egns_embeded_audio($width, $height)
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_audio_url', 1));
			if (!empty($url)) {
				return '<div class="post-media">' . wp_oembed_get($url, array('width' => $width, 'height' => $height)) . '</div>';
			}
		}

		/**
		 * @return [string] Checks For Embed Audio In The Post.
		 */
		public static function egns_has_embeded_audio()
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_audio_url', 1));
			if (!empty($url)) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Post Meta Box Key Information
		 *
		 * @param  String $meta_key
		 */

		public static function egns_post_meta_box_value($meta_key, $meta_key_value)
		{
			return get_post_meta(get_the_ID(), $meta_key, true)[$meta_key_value];
		}

		/**
		 * Find Related Project
		 *
		 * @param  int $post_id
		 * @param  String $post_type
		 * @param  String $custom_post_taxonomy
		 * 
		 */

		public static function egns_find_related_project($post_id, $post_type, $custom_post_taxonomy)
		{
			//get the taxonomy terms of custom post type
			$customTaxonomyTerms = wp_get_object_terms($post_id, $custom_post_taxonomy, array('fields' => 'ids'));

			//query arguments
			$args = array(
				'post_type'      => $post_type,
				'post_status'    => 'publish',
				'posts_per_page' => 5,
				'orderby'        => 'rand',
				'tax_query'      => array(
					array(
						'taxonomy' => $custom_post_taxonomy,
						'field'    => 'id',
						'terms'    => $customTaxonomyTerms
					)
				),
				'post__not_in' => array($post_id),
			);
			return $args;
		}


		/**
		 * @return [string] Embed gallery for the post.
		 */
		public static function egns_gallery_images()
		{
			$images = get_post_meta(get_the_ID(), 'egns_gallery_images', 1);

			$images = explode(',', $images);
			if ($images && count($images) > 1) {
				$gallery_slide  = '<div class="swiper blog-archive-slider">';
				$gallery_slide .= '<div class="swiper-wrapper">';
				foreach ($images as $image) {
					$gallery_slide .= '<div class="swiper-slide"><a href="' . get_the_permalink() . '"><img src="' . wp_get_attachment_image_url($image, 'full') . '" alt="' . esc_attr(get_the_title()) . '"></a></div>';
				}
				$gallery_slide .= '</div>';
				$gallery_slide .= '</div>';

				$gallery_slide .= '<div class="slider-arrows arrows-style-2 sibling-3 text-center d-flex flex-row justify-content-between align-items-center w-100">';
				$gallery_slide .= '<div class="blog1-prev swiper-prev-arrow" tabindex="0" role="button" aria-label="' . esc_html('Previous slide') . '"> <i class="bi bi-arrow-left"></i> </div>';

				$gallery_slide .= '<div class="blog1-next swiper-next-arrow" tabindex="0" role="button" aria-label="' . esc_html('Next slide') . '"><i class="bi bi-arrow-right"></i></div>';
				$gallery_slide .= '</div>';

				return $gallery_slide;
			}
		}

		/**
		 * @return [string] Has Gallery for Gallery post.
		 */
		public static function has_egns_gallery()
		{
			$images = get_post_meta(get_the_ID(), 'egns_gallery_images', 1);
			if (!empty($images)) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * @return string get the attachment image.
		 */
		public static function egns_thumb_image()
		{
			$image = get_post_meta(get_the_ID(), 'egns_thumb_images', 1);
			echo '<a href="' . get_the_permalink() . '"><img src="' . isset($image['url']) . '" alt="' . esc_attr(get_the_title()) . ' "class="img-fluid wp-post-image"></a>';
		}

		/**
		 * @return [quote] text for quote post
		 */
		public static function egns_quote_content()
		{
			$text = get_post_meta(get_the_ID(), 'egns_quote_text', 1);
			if (!empty($text)) {
				return sprintf(esc_attr__("%s", 'matrik'), $text);
			}
		}

		/**
		 * @return [string] video url for video post
		 */
		public static function egns_embeded_video($width = '', $height = '')
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_video_url', 1));
			if (!empty($url)) {
				return wp_oembed_get($url, array('width' => $width, 'height' => $height));
			}
		}

		/**
		 * @return [string] Has embed video for video post.
		 */
		public static function has_egns_embeded_video()
		{
			$url = esc_url(get_post_meta(get_the_ID(), 'egns_video_url', 1));
			if (!empty($url)) {
				return true;
			} else {
				return false;
			}
		}


		public static function get_theme_logo($logo_url, $echo = true)
		{
			if (has_custom_logo()):
				the_custom_logo();

			elseif (!empty($logo_url)):
				?>
				<?php if (!empty($logo_url)): ?>
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<img class="img-fluid" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
					</a>
				<?php endif ?>

				<?php
			else : {
				?>
					<div class="site-title">
						<h3><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html(get_bloginfo('name')); ?></a></h3>
					</div>

				<?php
				}
			endif;
		}


		public static function get_copyright_theme_logo($logo_url, $echo = true)
		{
			if (has_custom_logo()):
				the_custom_logo();
			elseif (!empty($logo_url)):
				?>
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
					<?php if (!empty($logo_url)): ?>
						<img class="img-fluid" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></a>
			<?php endif ?>
			<?php
			endif;
		}

		/**
		 * Menu links.
		 *
		 * @param   string $theme_location menu type.
		 * @param   string $container_class main class.
		 * @param   string $after icon tag.
		 * @param   string $menu_class .
		 * @param   string $depth.
		 * @since   1.0.0
		 */
		public static function egns_get_theme_menu($theme_location = 'primary-menu', $container_class = '', $link_after = '', $after = '<i class="bi bi-plus dropdown-icon"></i>', $menu_class = 'menu-list', $depth = 3, $echo = true)
		{
			if (has_nav_menu('primary-menu')) {
				wp_nav_menu(
					array(
						'theme_location'  => $theme_location,
						'container'       => false, // This will prevent any container div from being added
						'container_class' => $container_class,
						'link_before'     => '<span>', // Add opening span tag
						'link_after'      => '</span>' . $link_after, // Add closing span tag
						'after'           => $after,
						'container_id'    => '',
						'menu_class'      => $menu_class,
						'fallback_cb'     => '',
						'menu_id'         => '',
						'depth'           => $depth,
						// Conditionally add the walker
						'walker'          => class_exists('CSF') ? new \Egns_Menu_Walker() : null,
					)
				);
			} else {
				if (is_user_logged_in()) { ?>
				<div class="set-menu">
					<h4>
						<a href="<?php echo admin_url(); ?>nav-menus.php">
							<?php echo esc_html('Set Menu Here...', 'matrik'); ?>
						</a>
					</h4>
				</div>
			<?php }
			}
		}


		/**
		 * Menu links.
		 *
		 * @param   string $theme_location menu type.
		 * @param   string $container_class main class.
		 * @param   string $after icon a tag.
		 * @param   string $after icon tag.
		 * @param   string $menu_class .
		 * @param   string $depth.
		 * @since   1.0.0
		 */
		public static function egns_get_theme_side_menu($theme_location = 'side-menu', $container_class = '', $link_after = '', $after = '<i class="bi bi-plus dropdown-icon"></i>', $menu_class = 'menu-list', $depth = 3, $echo = true)
		{
			if (has_nav_menu('side-menu')) {
				wp_nav_menu(
					array(
						'theme_location'  => $theme_location,
						'container'       => false,              // This will prevent any container div from being added
						'container_class' => $container_class,
						'link_before'     => '',
						'link_after'      => $link_after,
						'after'           => $after,
						'container_id'    => '',
						'menu_class'      => $menu_class,
						'fallback_cb'     => '',
						'menu_id'         => '',
						'depth'           => $depth,
					)
				);
			} else {
				if (is_user_logged_in()) { ?>
				<div class="set-menu">
					<h4>
						<a href="<?php echo admin_url(); ?>nav-menus.php">
							<?php echo esc_html('Set Menu Here...', 'vernex'); ?>
						</a>
					</h4>
				</div>
			<?php }
			}
		}

		/**
		 * Output WordPress theme menu with custom parameters.
		 *
		 * @param string $theme_location  Menu location slug (registered in theme).
		 * @param string $container_class Class for the container.
		 * @param string $link_after      HTML to add after each menu link.
		 * @param string $after           HTML to add after each menu item.
		 * @param string $menu_class      Class for the <ul> element.
		 * @param int    $depth           Depth of menu levels.
		 * @param bool   $echo            Whether to echo the menu.
		 *
		 * @since 1.0.0
		 */
		public static function egns_get_theme_menu_two(
			$theme_location = 'primary-menu',
			$container_class = '',
			$link_after = '',
			$after = '<span class="dropdown-icon2"><i class="bi bi-plus"></i></span>',
			$menu_class = 'main-menu',
			$depth = 3,
			$echo = true
		) {
			if (has_nav_menu($theme_location)) {
				$args = array(
					'theme_location'  => $theme_location,
					'container'       => false,
					'container_class' => $container_class,
					'link_before'     => '',
					'link_after'      => $link_after,
					'after'           => $after,
					'container_id'    => '',
					'menu_class'      => $menu_class,
					'fallback_cb'     => '',
					'menu_id'         => '',
					'depth'           => $depth,
					'walker'          => class_exists('CSF') ? new \Egns_Menu_Walker() : null,
					'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
					'echo'            => $echo,
				);
				wp_nav_menu($args);
			} else {
				if (is_user_logged_in() && $echo) {
					echo '<div class="set-menu">';
					echo '<h4><a href="' . esc_url(admin_url('nav-menus.php')) . '">';
					echo esc_html__('Set Menu Here...', 'matrik');
					echo '</a></h4>';
					echo '</div>';
				}
			}
		}


		/**

		 * Displays SVG content.

		 * This function retrieves SVG content from a file URL and displays it. If a filesystem object

		 * is provided, it uses it to fetch the file contents. Otherwise, it uses WordPress functions

		 * to fetch the contents remotely. The SVG content is then echoed directly.

		 * @since 1.0.0

		 * @param string $file_url The URL of the SVG file.

		 * @param object $filesystem Optional. The filesystem object. Defaults to null.
		 */

		public static function display_svg($file_url, $filesystem = null)
		{
			if (is_null($filesystem) && function_exists('WP_Filesystem')) {
				global $wp_filesystem;
				$filesystem = $wp_filesystem;
			} elseif (is_null($filesystem)) {
				include_once ABSPATH . 'wp-admin/includes/file.php';
			}

			$file_contents = '';
			if ($filesystem) {
				$file_contents = $filesystem->get_contents($file_url);
			} else {
				$response = wp_remote_get($file_url);
				if (!is_wp_error($response) && $response['response']['code'] === 200) {
					$file_contents = wp_remote_retrieve_body($response);
				}
			}

			if (!empty($file_contents)) {
				echo sprintf('%s', $file_contents);
			}
		}

		/**
		 * Post Details Pagination
		 * @since   1.0.0
		 */

		public static function egns_get_post_pagination()
		{
			wp_link_pages(
				array(
					'before'         => '<ul class="page-paginations d-flex justify-content-center align-items-center">' . esc_html__('Pages: ', 'matrik') . '<li class="page-item">',
					'after'          => '</li></ul>',
					'link_before'    => '',
					'link_after'     => '',
					'next_or_number' => 'number',
					'separator'      => '</li><li>',
					'pagelink'       => '%',
					'echo'           => 1
				)
			);
		}


		public static function egns_get_archive_pagination($custom_query = null)
		{
			if (is_null($custom_query)) {
				global $wp_query;
				$custom_query = $wp_query;
			}

			$big = 999999999; // dummy value for pagination base replacement
			$current_page = max(1, get_query_var('paged'));

			$pagination_links = paginate_links(array(
				'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format'    => '?paged=%#%',
				'current'   => $current_page,
				'total'     => $custom_query->max_num_pages,
				'type'      => 'array',
				'prev_text' => '',
				'next_text' => '',
			));

			if ($pagination_links) {
				echo '<div class="paginations-button">';

				if ($current_page > 1) {
					echo '<a href="' . esc_url(get_pagenum_link($current_page - 1)) . '">';
			?>
				<svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
					<g>
						<path d="M7.86133 9.28516C7.14704 7.49944 3.57561 5.71373 1.43276 4.99944C3.57561 4.28516 6.7899 3.21373 7.86133 0.713728" stroke-width="1.5" stroke-linecap="round"></path>
					</g>
				</svg>
			<?php
					echo esc_html__('Prev', 'matrik');
					echo '</a>';
				}

				echo '</div>';

				echo '<ul class="paginations">';
				foreach ($pagination_links as $link) {
					if (strpos($link, 'prev') !== false || strpos($link, 'next') !== false) {
						continue;
					}
					echo '<li class="page-item' . (strpos($link, 'current') !== false ? ' active' : '') . '">';
					echo sprintf('%s', $link); // OUTPUT FIXED HERE
					echo '</li>';
				}
				echo '</ul>';

				echo '<div class="paginations-button">';

				if ($current_page < $custom_query->max_num_pages) {
					echo '<a href="' . esc_url(get_pagenum_link($current_page + 1)) . '">';
					echo esc_html__('Next', 'matrik');
			?>
				<svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
					<g>
						<path d="M1.42969 9.28613C2.14397 7.50042 5.7154 5.7147 7.85826 5.00042C5.7154 4.28613 2.50112 3.21471 1.42969 0.714705" stroke-width="1.5" stroke-linecap="round"></path>
					</g>
				</svg>
			<?php
					echo '</a>';
				}

				echo '</div>';
			}
		}





		/**
		 * Option Dynamic Styles.
		 *
		 * @since   1.0.0
		 */
		public function egns_enqueue_scripts()
		{
			$objects = array(
				'sticky_header_enable' => self::sticky_header_enable(),
				'animation_enable'     => self::animation_enable(),
				'is_egns_core_enable'  => class_exists('CSF') ? true : false,
			);
			wp_localize_script('custom-main', 'theme_options', $objects);
		}

		public static function sticky_header_enable()
		{
			$sticky_header      = Egns_Helper::egns_get_theme_option('header_sticky_enable');
			$page_sticky_option = Egns_Helper::egns_page_option_value('sticky_header_enable');

			if (Egns_Helper::is_enabled($sticky_header, $page_sticky_option)) {
				return true;
			} else {
				return false;
			}
		}

		public static function animation_enable()
		{
			$animation_enable = Egns_Helper::egns_get_theme_option('animation_enable');

			if ($animation_enable == 1) {
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Get Page Options Value
		 *
		 * @since   1.0.0
		 */

		public static function egns_get_options_value($theme_option, $page_option)
		{
			if (!empty($page_option)) {
				return $page_option;
			} else {
				return $theme_option;
			}
		}



		/**
		 * Post layout for post formet.
		 *
		 * @since   1.0.0
		 */
		public static function dynamic_post_format()
		{
			$format = get_post_format(get_the_ID());

			switch ($format) {
				case 'video';
					self::egns_template_part('post-thumb', 'video');
					break;
				case 'audio';
					self::egns_template_part('post-thumb', 'audio');
					break;
				case 'gallery';
					self::egns_template_part('post-thumb', 'gallery');
					break;
				case 'quote';
					self::egns_template_part('post-thumb', 'quote');
					break;
				case 'image';
					self::egns_template_part('post-thumb', 'image');
					break;
				default:
					break;
			}
		}


		/**
		 * Define the core functionality of the.
		 *
		 * @since   1.0.0
		 */
		public function actions()
		{
			add_action('egns_page_before', array($this, 'open_container'));
			add_action('egns_page_after', array($this, 'close_container'));
			add_action('egns_post_before', array($this, 'post_open_container'));
			add_action('egns_post_after', array($this, 'post_close_container'));
			add_action('egns_header_template', array($this, 'egns_header_template'));
		}


		/**
		 * Is elementor.
		 *
		 * @since   1.0.0
		 */
		public static function is_elementor()
		{
			if (self::matrik_is_blog_pages()) {
				return false;
			}

			if (did_action('elementor/loaded')) {
				return Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor();
			} else {
				return false;
			}
		}

		/**
		 * Open Page Container.
		 *
		 * @since   1.0.0
		 */
		public function open_container()
		{
			if (!self::is_elementor()): ?>
			<div class="container">
			<?php
			endif;
		}

		/**
		 * Close Page Container.
		 *
		 * @since   1.0.0
		 */
		public function close_container()
		{
			if (!self::is_elementor()):
			?>
			</div> <!-- End Main Content Area  -->
		<?php endif;
		}

		/**
		 * Post Open Container.
		 *
		 * @since   1.0.0
		 */
		public function post_open_container()
		{
			if (is_single()) {
		?>
			<div class="blog-details">
			<?php
			} else {
			?>
				<div>
				<?php
			}
		}

		/**
		 * Post Close Container.
		 *
		 * @since   1.0.0
		 */
		public function post_close_container()
		{
				?>
				</div>
	<?php
		}
	} // end Main Egns Helper class






}
