<?php
/**
 * Custom Post Type
 * Author EgensLab
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
	exit();  //exit if access directly
}
if (!class_exists('Matrik_Custom_Post_Type')) {
	class Matrik_Custom_Post_Type
	{

		//$instance variable
		private static $instance;

		public function __construct()
		{
			//register post type
			add_action('init', array($this, 'register_custom_post_type'));
		}

		/**
		 * get Instance
		 * @since  2.0.0
		 * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Register Custom Post Type
		 * @since  2.0.0
		 * */
		public function register_custom_post_type()
		{
			$all_post_type = array(

				// Custom Post Materials [Products for construction]
				[
					'post_type' => 'materials',
					'args'      => array(
						'label'       => esc_html__('Materials', 'matrik-core'),
						'description' => esc_html__('Materials', 'matrik-core'),
						'menu_icon'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/matrik-icon.svg'),
						'labels'      => array(
							'name'               => esc_html_x('Materials', 'Post Type General Name', 'matrik-core'),
							'singular_name'      => esc_html_x('Material', 'Post Type Singular Name', 'matrik-core'),
							'menu_name'          => esc_html__('Materials', 'matrik-core'),
							'all_items'          => esc_html__('All Materials', 'matrik-core'),
							'view_item'          => esc_html__('View Material', 'matrik-core'),
							'add_new_item'       => esc_html__('Add New Material', 'matrik-core'),
							'add_new'            => esc_html__('Add New Material', 'matrik-core'),
							'edit_item'          => esc_html__('Edit Material', 'matrik-core'),
							'update_item'        => esc_html__('Update Material', 'matrik-core'),
							'search_items'       => esc_html__('Search Material', 'matrik-core'),
							'not_found'          => esc_html__('Not Found', 'matrik-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'matrik-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'material', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
						'menu_position'       => 37,
					)
				],

				// Custom Post Project
				[
					'post_type' => 'project',
					'args'      => array(
						'label'       => esc_html__('Project', 'matrik-core'),
						'description' => esc_html__('Project', 'matrik-core'),
						'menu_icon'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/matrik-icon.svg'),
						'labels'      => array(
							'name'               => esc_html_x('Project', 'Post Type General Name', 'matrik-core'),
							'singular_name'      => esc_html_x('Project', 'Post Type Singular Name', 'matrik-core'),
							'menu_name'          => esc_html__('Project', 'matrik-core'),
							'all_items'          => esc_html__('All Project', 'matrik-core'),
							'view_item'          => esc_html__('View Project', 'matrik-core'),
							'add_new_item'       => esc_html__('Add New Project', 'matrik-core'),
							'add_new'            => esc_html__('Add New Project', 'matrik-core'),
							'edit_item'          => esc_html__('Edit Project', 'matrik-core'),
							'update_item'        => esc_html__('Update Project', 'matrik-core'),
							'search_items'       => esc_html__('Search Project', 'matrik-core'),
							'not_found'          => esc_html__('Not Found', 'matrik-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'matrik-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => true,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'project', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
						'menu_position'       => 36,
					)
				],

				// Custom Post Career Study
				[
					'post_type' => 'career',
					'args'      => array(
						'label'       => esc_html__('Career', 'matrik-core'),
						'description' => esc_html__('Career', 'matrik-core'),
						'menu_icon'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/matrik-icon.svg'),
						'labels'      => array(
							'name'               => esc_html_x('Career', 'Post Type General Name', 'matrik-core'),
							'singular_name'      => esc_html_x('Career', 'Post Type Singular Name', 'matrik-core'),
							'menu_name'          => esc_html__('Career', 'matrik-core'),
							'all_items'          => esc_html__('All Career', 'matrik-core'),
							'view_item'          => esc_html__('View Career', 'matrik-core'),
							'add_new_item'       => esc_html__('Add New Career', 'matrik-core'),
							'add_new'            => esc_html__('Add New Career', 'matrik-core'),
							'edit_item'          => esc_html__('Edit Career', 'matrik-core'),
							'update_item'        => esc_html__('Update Career', 'matrik-core'),
							'search_items'       => esc_html__('Search Career', 'matrik-core'),
							'not_found'          => esc_html__('Not Found', 'matrik-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'matrik-core'),
						),
						'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => false,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'careers', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
						'menu_position'       => 35,
					)
				],

				// Custom post Mega Menu
				[
					'post_type' => 'mega-menu',
					'args'      => array(
						'label'       => esc_html__('Mega Menu', 'matrik-core'),
						'description' => esc_html__('Mega Menu', 'matrik-core'),
						'menu_icon'   => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/matrik-icon.svg'),
						'labels'      => array(
							'name'               => esc_html_x('Mega Menus', 'Post Type General Name', 'matrik-core'),
							'singular_name'      => esc_html_x('Mega Menu', 'Post Type Singular Name', 'matrik-core'),
							'menu_name'          => esc_html__('Mega Menu', 'matrik-core'),
							'all_items'          => esc_html__('All Mega Menu', 'matrik-core'),
							'view_item'          => esc_html__('View', 'matrik-core'),
							'add_new_item'       => esc_html__('Add New', 'matrik-core'),
							'add_new'            => esc_html__('Add New', 'matrik-core'),
							'edit_item'          => esc_html__('Edit', 'matrik-core'),
							'update_item'        => esc_html__('Update', 'matrik-core'),
							'search_items'       => esc_html__('Search', 'matrik-core'),
							'not_found'          => esc_html__('Not Found', 'matrik-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'matrik-core'),
						),
						'supports'            => array('title', 'editor'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => false,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'mega-menu', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => false,
						'menu_position'       => 38,
					)
				],

				// Custom Footer Block
				[
					'post_type' => 'footer-blocks',
					'args'      => array(
						'label'         => esc_html__('Footer Templates Matrik', 'matrik-core'),
						'description'   => esc_html__('Add matrik footer block here', 'matrik-core'),
						'menu_icon'     => esc_url(EGNS_CORE_THEME_OPTIONS_IMAGES . '/matrik-icon.svg'),
						"menu_position" => 60,
						'labels'        => array(
							'name'               => esc_html_x('Matrik Templates', 'Post Type General Name', 'matrik-core'),
							'singular_name'      => esc_html_x('Footer Template', 'Post Type Singular Name', 'matrik-core'),
							'menu_name'          => esc_html__('Footer Template', 'matrik-core'),
							'all_items'          => esc_html__('All Footer Templates', 'matrik-core'),
							'view_item'          => esc_html__('View Footer', 'matrik-core'),
							'add_new_item'       => esc_html__('Add Footer', 'matrik-core'),
							'add_new'            => esc_html__('Add Footer', 'matrik-core'),
							'edit_item'          => esc_html__('Edit Footer', 'matrik-core'),
							'update_item'        => esc_html__('Update Footer', 'matrik-core'),
							'search_items'       => esc_html__('Search Footer', 'matrik-core'),
							'not_found'          => esc_html__('Not Found', 'matrik-core'),
							'not_found_in_trash' => esc_html__('Not found in Trash', 'matrik-core'),
						),
						'supports'            => array('title', 'editor'),
						'hierarchical'        => true,
						'public'              => true,
						'has_archive'         => false,
						"publicly_queryable"  => true,
						'show_ui'             => true,
						"rewrite"             => array('slug' => 'footer-blocks', 'with_front' => true),
						'exclude_from_search' => false,
						'can_export'          => true,
						'capability_type'     => 'post',
						'query_var'           => true,
						"show_in_rest"        => true,
						'menu_position'       => 38,
					)
				],


			);

			if (!empty($all_post_type) && is_array($all_post_type)) {
				foreach ($all_post_type as $post_type) {
					call_user_func_array('register_post_type', $post_type);
				}
			}

			/**
			 * Custom Taxonomy Register
			 */
			$all_custom_taxonmy = array(


				//project category
				array(
					'taxonomy'    => 'project-category',
					'object_type' => 'project',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Categories", 'matrik-core'),
							"singular_name" => esc_html__("Categories", 'matrik-core'),
							"menu_name"     => esc_html__("Categories", 'matrik-core'),
							"all_items"     => esc_html__("All Project Categories", 'matrik-core'),
							"add_new_item"  => esc_html__("Add New Category", 'matrik-core')
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'project-category', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				//career category
				array(
					'taxonomy'    => 'career-category',
					'object_type' => 'career',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Categories", 'matrik-core'),
							"singular_name" => esc_html__("Categories", 'matrik-core'),
							"menu_name"     => esc_html__("Categories", 'matrik-core'),
							"all_items"     => esc_html__("All Career Categories", 'matrik-core'),
							"add_new_item"  => esc_html__("Add New Category", 'matrik-core')
						),
						"public"             => true,
						"hierarchical"       => true,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'career-category', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
					)
				),

				// Tag for project post
				array(
					'taxonomy'    => 'project-tag',
					'object_type' => 'project',
					'args'        => array(
						"labels"  => array(
							"name"          => esc_html__("Tags", 'matrik-core'),
							"singular_name" => esc_html__("Tags", 'matrik-core'),
							"menu_name"     => esc_html__("Tags", 'matrik-core'),
							"all_items"     => esc_html__("All Tags", 'matrik-core'),
							"add_new_item"  => esc_html__("Add New Tags", 'matrik-core')
						),
						"public"             => true,
						"hierarchical"       => false,
						'has_archive'        => true,
						"show_ui"            => true,
						"show_in_menu"       => true,
						"show_in_nav_menus"  => true,
						"rewrite"            => array('slug' => 'project', 'with_front' => true),
						"query_var"          => true,
						"show_admin_column"  => true,
						"show_in_rest"       => true,
						"show_in_quick_edit" => true,
						'meta_box_cb'        => 'post_tags_meta_box',
					)
				),
			);
			if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)) {
				foreach ($all_custom_taxonmy as $taxonomy) {
					call_user_func_array('register_taxonomy', $taxonomy);
				}
			}

			flush_rewrite_rules();
		}
	} //end class

	if (class_exists('Matrik_Custom_Post_Type')) {
		Matrik_Custom_Post_Type::getInstance();
	}
}
