<?php

namespace Egns_Core;

/**
 * All Elementor widget init
 * 
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit();  // exit if access directly
}

if (!class_exists('Egns_Helper')) {

	class Egns_Helper
	{


		/**
		 * Helper Class constructor
		 */
		function __construct()
		{
			// call only public function here 
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
					$menu_names[$menu->slug] = $menu->name;
				}
			}

			// Return the array of menu names
			return $menu_names;
		}

		/**
		 * Get all Elementor setting default value
		 * After that merge with custom value
		 *
		 * @since   1.0.0
		 */
		public static function return_defaul_elementor_settings(...$custom_value)
		{
			// Get default value, ensure it's an array
			$elementor = get_option('elementor_cpt_support');
			$elementor = is_array($elementor) ? $elementor : [];

			// Merge and remove duplicates
			$merged = array_unique(array_merge($elementor, $custom_value));

			// Update the option
			update_option('elementor_cpt_support', $merged);
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
		 * Get any post list with ID
		 *
		 * $post_type post type name
		 * 
		 * @return array
		 */
		public static function get_list_by_post_type($post_type)
		{

			$post_lists = get_posts(array(
				'post_type'      => $post_type,
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			));

			$options = array();
			foreach ($post_lists as $post) {
				$options[$post->ID] = $post->post_title;
			}

			return $options;
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

		public static function get_post_list_by_post_type($post_type)
		{
			$return_val = [];
			$args       = array(
				'post_type'      => $post_type,
				'posts_per_page' => -1,
				'post_status'    => 'publish',

			);
			$all_post = new \WP_Query($args);

			while ($all_post->have_posts()) {
				$all_post->the_post();
				$return_val[get_the_ID()] = get_the_title();
			}
			wp_reset_query();
			return $return_val;
		}

		public static function get_all_post_key($post_type)
		{
			$return_val = [];
			$args       = array(
				'post_type'      => $post_type,
				'posts_per_page' => 6,
				'post_status'    => 'publish',

			);
			$all_post = new \WP_Query($args);

			while ($all_post->have_posts()) {
				$all_post->the_post();
				$return_val[] = get_the_ID();
			}
			wp_reset_query();
			return $return_val;
		}


		/**
		 * Get WooCommerce product categories
		 *
		 * @return array|WP_Error
		 */
		public static function get_woocommerce_product_categories()
		{
			// Get product categories
			$product_categories = get_terms('product_cat', array('hide_empty' => true));

			// Check if there are no categories
			if (empty($product_categories)) {
				// Handle the case where there are no categories (return a default value, show a message, etc.)
				return [];  // or return some default value
			}

			// Initialize an empty array to store category options
			$category_options = [];

			// Loop through each category
			foreach ($product_categories as $category) {
				// Build the associative array with term ID as key and category name as value
				$category_options[$category->slug] = $category->name;
			}

			// Return the category options array
			return $category_options;
		}

		public static function get_blog_categories()
		{
			$categories       = get_categories();  // Get all categories.
			$category_options = [];
			foreach ($categories as $category) {
				$category_options[$category->slug] = $category->name;
			}

			return $category_options;
		}

		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_blog_post_options()
		{
			$posts   = get_posts(['post_type' => 'post', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_project_post_options()
		{
			$posts   = get_posts(['post_type' => 'project', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_materials_post_options()
		{
			$posts   = get_posts(['post_type' => 'materials', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		/**
		 * filtering posts by title
		 *
		 * @return void
		 */
		public static function get_career_post_options()
		{
			$posts   = get_posts(['post_type' => 'career', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}


		/**
		 * Get all project categories as options
		 *
		 * @return array
		 */
		public static function get_project_category_options()
		{
			$terms = get_terms([
				'taxonomy'   => 'project-category',
				'hide_empty' => false,
			]);

			$options = [];

			if (!is_wp_error($terms) && !empty($terms)) {
				foreach ($terms as $term) {
					$options[$term->term_id] = $term->name;
				}
			}

			return $options;
		}

		/**
		 * Filtering posts by title and multiple categories
		 *
		 * @param array|null $selected_category_ids Optional. Array of Category IDs to filter posts. Default is null (no filter).
		 * @return array Associative array of post IDs and their titles.
		 */
		public static function get_blog_post_cat_options($selected_category_ids = null)
		{
			// Initialize query arguments
			$query_args = [
				'post_type'      => 'post',
				'posts_per_page' => -1,
			];

			// If category IDs are provided, add them to the query arguments
			if (!empty($selected_category_ids)) {
				$query_args['category__in'] = $selected_category_ids;
			}

			// Get posts based on the query arguments
			$posts   = get_posts($query_args);
			$options = [];

			// Loop through posts and build options array
			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
		}




		/**
		 * Return taxonomy name with link.
		 *
		 * @since 1.0.0
		 *
		 * @param string $taxonomy . give your taxonomy.
		 * 
		 * @param string $icon_class . give your icon class here.
		 * 
		 * @return mixed return taxonomy name with link.
		 */
		public static function term_with_link($icon_class, $taxonomy)
		{

			$terms = wp_get_object_terms(get_the_ID(), $taxonomy);
			if ($terms ?? ''):

				foreach ((array) $terms as $term): ?>
					<a href="<?php echo get_term_link($term->slug, $taxonomy) ?>"><i class="<?php echo $icon_class ?>"></i>
						<?php echo $term->name ?>
					</a>
				<?php endforeach;

			endif;
		}

		/**
		 * Return taxonomy name with link.
		 *
		 * @since 1.0.0
		 *
		 * @param string $taxonomy . give your taxonomy.
		 * 
		 * @param string $icon_class . give your icon class here.
		 * 
		 * @return mixed return taxonomy name with link.
		 */
		public static function term_without_link($icon_class, $taxonomy)
		{

			$terms = wp_get_object_terms(get_the_ID(), $taxonomy);
			if ($terms ?? ''):
				?>

				<span><i class="<?php echo $icon_class ?>"></i>
					<?php
					foreach ((array) $terms as $term):
						echo $term->name;
					endforeach;
					?>
				</span>
			<?php
			endif;
		}

		/**
		 * Return term link value.
		 *
		 * @since 1.0.0
		 * 
		 * @return mixed Post type option value.
		 */
		public static function get_any_term_link($taxonomy)
		{
			$term = get_the_terms(get_the_ID(), $taxonomy);
			$link = get_term_link($term[0]->slug, $taxonomy);
			return $link;
		}

		/**
		 * filtering product by title
		 *
		 * @return void
		 */
		public static function get_product_lists()
		{
			$posts   = get_posts(['post_type' => 'product', 'posts_per_page' => -1]);
			$options = [];

			foreach ($posts as $post) {
				$options[$post->ID] = get_the_title($post->ID);
			}

			return $options;
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
		 * Return Elementor header footer plugin post list
		 *
		 * @return data
		 */
		public static function get_custom_footer_list()
		{
			$args = array(
				'post_type'   => 'footer-blocks',
				'order'       => 'asc',
				'numberposts' => 999,
			);

			$latest_books = get_posts($args);
			$array        = [];
			foreach ($latest_books as $value) {
				$array[$value->post_name] = $value->post_title;
			}
			return $array;
		}

		/**
		 * Return Elementor header footer post ID or default footer area
		 *
		 * @param string $slug The slug of the header/footer.
		 * @return string The shortcode for the header/footer or default footer area.
		 */
		public static function get_footer_data($slug)
		{
			$post = get_page_by_path($slug, OBJECT, 'footer-blocks');

			if ($post) {
				// Check if the post is built with Elementor
				$document = \Elementor\Plugin::$instance->documents->get($post->ID);
				if ($document && $document->is_built_with_elementor()) {
					// Render Elementor content
					return \Elementor\Plugin::$instance->frontend->get_builder_content_for_display($post->ID);
				} else {
					// Return default WordPress content (from the editor)
					return apply_filters('the_content', $post->post_content);
				}
			} else {
				// If no post is found, return a default fallback
				return self::default_footer_area_sec();
			}
		}



		/**
		 * Generate the HTML for the default footer area
		 *
		 * @return string The HTML for the default footer area.
		 */
		public static function default_footer_area_sec()
		{
			ob_start();  // Start output buffering
			?>

			<footer class="footer-section">
				<div class="footer-bottom-wrap">
					<div class="container">
						<div class="footer-bottom justify-content-center">
							<div class="copyright-area ">
								<p><?php echo esc_html__('Copyright ', 'matrik-core') ?> <?php echo the_date('Y') ?> <a href="<?php echo esc_url('https://www.egenslab.com/') ?>"><?php echo esc_html__(' Egens Lab', 'matrik-core') ?></a> | <?php echo esc_html__('All Right Reserved.', 'matrik-core') ?></p>
							</div>
						</div>
					</div>
				</div>
			</footer>

<?php
			$output = ob_get_clean();  // Get and clean the buffered output
			return $output;
		}


		/**
		 * calculating reading times
		 *
		 * @return void
		 */
		public static function calculate_reading_time($content)
		{
			// Count the number of words in the content.
			$word_count = str_word_count(strip_tags($content));
			// Minimum reading time is 1 minute.
			$reading_time = max(1, round($word_count / 100));
			return $reading_time;
		}


		/**
		 * Get post tags for select
		 *
		 * @return array
		 */
		public static function get_tags_for_select()
		{
			$tags    = get_tags();
			$options = [];
			foreach ($tags as $tag) {
				$options[$tag->term_id] = $tag->name;
			}
			return $options;
		}


		/**
		 * filtering posts by authors
		 *
		 * @return void
		 */
		public static function get_blog_authors()
		{
			// Define an array of roles you want to include
			$roles_to_include = ['author', 'administrator', 'subscriber', 'contributor', 'editor'];

			// Retrieve users based on the defined roles
			$users          = get_users(['role__in' => $roles_to_include]);
			$author_options = ['all' => esc_html__('All Authors', 'matrik-core')];

			foreach ($users as $user) {
				$author_options[$user->ID] = $user->display_name;
			}

			return $author_options;
		}


		/**
		 * get post categories for select
		 *
		 * @return void 
		 */

		public static function get_categories_for_select()
		{
			$categories = get_categories();
			$options    = [];
			foreach ($categories as $category) {
				$options[$category->term_id] = $category->name;
			}
			return $options;
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
		 * Check if the podcast is enabled for the post.
		 *
		 * @return bool True if podcast is enabled, false otherwise.
		 */
		public static function egns_is_podcast_enabled()
		{
			return (bool) get_post_meta(get_the_ID(), 'egns_podcast', true);
		}

		/**
		 * Get the podcast audio URL.
		 *
		 * @return string The podcast audio URL.
		 */
		public static function egns_get_podcast_audio_url()
		{
			return esc_url(get_post_meta(get_the_ID(), 'egns_podcast_audio_url', true));
		}

		/**
		 * Get the podcast audio URL.
		 *
		 * @return string The podcast audio URL.
		 */
		public static function egns_get_podcast_audio__main_url()
		{
			return esc_url(get_post_meta(get_the_ID(), 'egns_audio_url', true));
		}


		/**
		 * Get the podcast video URL.
		 *
		 * @return string The podcast audio URL.
		 */
		public static function egns_get_podcast_video_url()
		{
			return esc_url(get_post_meta(get_the_ID(), 'egns_video_url', true));
		}



		/**
		 * Get the podcast platform list.
		 *
		 * @return array The list of podcast platforms.
		 */
		public static function egns_get_podcast_platform_list()
		{
			$platforms = get_post_meta(get_the_ID(), 'egns_podcast_platform', true);
			return is_array($platforms) ? $platforms : array();
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
			echo '<a href="' . get_the_permalink() . '"><img src="' . $image['url'] . '" alt="' . esc_attr("image") . ' "class="img-fluid wp-post-image"></a>';
		}

		/**
		 * @return [quote] text for quote post
		 */
		public static function egns_quote_content()
		{
			$text = get_post_meta(get_the_ID(), 'egns_quote_text', 1);
			if (!empty($text)) {
				return sprintf(esc_attr__("%s", 'matrik-core'), $text);
			}
		}
	} //End Main Class


}//end if
