<?php
/**
 * Register Custom Post Types
 */

if (!defined('ABSPATH')) {
    exit;
}

class Azytus_Post_Types {

    const POST_TYPE_PRODUCTS = 'products';
    const POST_TYPE_GRADES = 'grades';
    const POST_TYPE_BATCHES = 'batches';
    
    /**
     * Initialize
     */
    public static function init() {
        add_action('init', array(__CLASS__, 'maybe_migrate_legacy_post_types'), 5);
        add_action('init', array(__CLASS__, 'register_post_types'));
    }

    /**
     * Run legacy post type migration once after upgrade.
     */
    public static function maybe_migrate_legacy_post_types() {
        if (get_option('azytus_toolkit_migrated_v12')) {
            return;
        }

        self::migrate_legacy_post_types();
        update_option('azytus_toolkit_migrated_v12', '1');
        flush_rewrite_rules();
    }
    
    /**
     * Register all custom post types
     */
    public static function register_post_types() {
        self::register_products();
        self::register_grades();
        self::register_batches();
    }
    
    /**
     * Register Products Post Type
     */
    private static function register_products() {
        $labels = array(
            'name' => _x('Products', 'Post Type General Name', 'azytus-toolkit'),
            'singular_name' => _x('Product', 'Post Type Singular Name', 'azytus-toolkit'),
            'menu_name' => __('Products', 'azytus-toolkit'),
            'name_admin_bar' => __('Product', 'azytus-toolkit'),
            'archives' => __('Product Archives', 'azytus-toolkit'),
            'attributes' => __('Product Attributes', 'azytus-toolkit'),
            'parent_item_colon' => __('Parent Product:', 'azytus-toolkit'),
            'all_items' => __('All Products', 'azytus-toolkit'),
            'add_new_item' => __('Add New Product', 'azytus-toolkit'),
            'add_new' => __('Add New', 'azytus-toolkit'),
            'new_item' => __('New Product', 'azytus-toolkit'),
            'edit_item' => __('Edit Product', 'azytus-toolkit'),
            'update_item' => __('Update Product', 'azytus-toolkit'),
            'view_item' => __('View Product', 'azytus-toolkit'),
            'view_items' => __('View Products', 'azytus-toolkit'),
            'search_items' => __('Search Products', 'azytus-toolkit'),
            'not_found' => __('Not found', 'azytus-toolkit'),
            'not_found_in_trash' => __('Not found in Trash', 'azytus-toolkit'),
        );
        
        $args = array(
            'label' => __('Product', 'azytus-toolkit'),
            'description' => __('Chemical products with grades and pack sizes', 'azytus-toolkit'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-shield',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'products'),
        );
        
        register_post_type(self::POST_TYPE_PRODUCTS, $args);
    }
    
    /**
     * Register Grades Post Type (Grade Categories)
     */
    private static function register_grades() {
        $labels = array(
            'name' => _x('Grade Categories', 'Post Type General Name', 'azytus-toolkit'),
            'singular_name' => _x('Grade Category', 'Post Type Singular Name', 'azytus-toolkit'),
            'menu_name' => __('Grade Categories', 'azytus-toolkit'),
            'name_admin_bar' => __('Grade Category', 'azytus-toolkit'),
            'archives' => __('Grade Category Archives', 'azytus-toolkit'),
            'attributes' => __('Grade Category Attributes', 'azytus-toolkit'),
            'parent_item_colon' => __('Parent Grade Category:', 'azytus-toolkit'),
            'all_items' => __('All Grade Categories', 'azytus-toolkit'),
            'add_new_item' => __('Add New Grade Category', 'azytus-toolkit'),
            'add_new' => __('Add New', 'azytus-toolkit'),
            'new_item' => __('New Grade Category', 'azytus-toolkit'),
            'edit_item' => __('Edit Grade Category', 'azytus-toolkit'),
            'update_item' => __('Update Grade Category', 'azytus-toolkit'),
            'view_item' => __('View Grade Category', 'azytus-toolkit'),
            'view_items' => __('View Grade Categories', 'azytus-toolkit'),
            'search_items' => __('Search Grade Categories', 'azytus-toolkit'),
            'not_found' => __('Not found', 'azytus-toolkit'),
            'not_found_in_trash' => __('Not found in Trash', 'azytus-toolkit'),
        );
        
        $args = array(
            'label' => __('Grade Category', 'azytus-toolkit'),
            'description' => __('Product grade categories such as Dry Solvents, HPLC grades, etc.', 'azytus-toolkit'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => 'edit.php?post_type=' . self::POST_TYPE_PRODUCTS,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'grades'),
        );
        
        register_post_type(self::POST_TYPE_GRADES, $args);
    }
    
    /**
     * Register Batches Post Type (COA/Batch)
     */
    private static function register_batches() {
        $labels = array(
            'name' => _x('COA/Batch Records', 'Post Type General Name', 'azytus-toolkit'),
            'singular_name' => _x('COA/Batch', 'Post Type Singular Name', 'azytus-toolkit'),
            'menu_name' => __('COA/Batch', 'azytus-toolkit'),
            'name_admin_bar' => __('COA/Batch', 'azytus-toolkit'),
            'archives' => __('COA/Batch Archives', 'azytus-toolkit'),
            'attributes' => __('COA/Batch Attributes', 'azytus-toolkit'),
            'parent_item_colon' => __('Parent COA/Batch:', 'azytus-toolkit'),
            'all_items' => __('All COA/Batch Records', 'azytus-toolkit'),
            'add_new_item' => __('Add New COA/Batch', 'azytus-toolkit'),
            'add_new' => __('Add New', 'azytus-toolkit'),
            'new_item' => __('New COA/Batch', 'azytus-toolkit'),
            'edit_item' => __('Edit COA/Batch', 'azytus-toolkit'),
            'update_item' => __('Update COA/Batch', 'azytus-toolkit'),
            'view_item' => __('View COA/Batch', 'azytus-toolkit'),
            'view_items' => __('View COA/Batch Records', 'azytus-toolkit'),
            'search_items' => __('Search COA/Batch', 'azytus-toolkit'),
            'not_found' => __('Not found', 'azytus-toolkit'),
            'not_found_in_trash' => __('Not found in Trash', 'azytus-toolkit'),
        );
        
        $args = array(
            'label' => __('COA/Batch', 'azytus-toolkit'),
            'description' => __('Certificate of Analysis and Batch records', 'azytus-toolkit'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'revisions'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 21,
            'menu_icon' => 'dashicons-media-document',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'show_in_rest' => true,
            'rewrite' => array('slug' => 'batches'),
        );
        
        register_post_type(self::POST_TYPE_BATCHES, $args);
    }

    /**
     * Migrate legacy post type slugs to the new handles.
     */
    public static function migrate_legacy_post_types() {
        global $wpdb;

        $map = array(
            'azytus_product' => self::POST_TYPE_PRODUCTS,
            'azytus_grade_category' => self::POST_TYPE_GRADES,
            'azytus_coa_batch' => self::POST_TYPE_BATCHES,
        );

        foreach ($map as $from => $to) {
            $wpdb->update(
                $wpdb->posts,
                array('post_type' => $to),
                array('post_type' => $from)
            );
        }
    }
}
