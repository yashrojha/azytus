<?php
/**
 * Plugin Name: Azytus Toolkit
 * Plugin URI: https://yashrojha.com
 * Description: Custom plugin for Azytus chemical product management with categories, grades, variations, and batch tracking
 * Version: 1.2.1
 * Author: Yash Ojha
 * Author URI: https://yashrojha.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: azytus-toolkit
 * Domain Path: /languages
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('AZYTUS_TOOLKIT_VERSION', '1.2.1');
define('AZYTUS_TOOLKIT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AZYTUS_TOOLKIT_PLUGIN_URL', plugin_dir_url(__FILE__));
define('AZYTUS_TOOLKIT_PLUGIN_FILE', __FILE__);

/**
 * Main Azytus Toolkit Class
 */
class Azytus_Toolkit {
    
    /**
     * Instance of this class
     */
    private static $instance = null;
    
    /**
     * Get instance of this class
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     */
    private function __construct() {
        $this->includes();
        $this->init_hooks();
    }
    
    /**
     * Include required files
     */
    private function includes() {
        require_once AZYTUS_TOOLKIT_PLUGIN_DIR . 'includes/class-post-types.php';
        require_once AZYTUS_TOOLKIT_PLUGIN_DIR . 'includes/class-meta-boxes.php';
        require_once AZYTUS_TOOLKIT_PLUGIN_DIR . 'includes/class-ajax-handler.php';
        require_once AZYTUS_TOOLKIT_PLUGIN_DIR . 'includes/class-frontend.php';
        require_once AZYTUS_TOOLKIT_PLUGIN_DIR . 'includes/class-admin-columns.php';
    }
    
    /**
     * Initialize hooks
     */
    private function init_hooks() {
        add_action('plugins_loaded', array($this, 'load_textdomain'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_assets'));
        add_filter('single_template', array($this, 'load_single_template'));
        
        // Initialize classes
        Azytus_Post_Types::init();
        Azytus_Meta_Boxes::init();
        Azytus_Ajax_Handler::init();
        Azytus_Frontend::init();
        Azytus_Admin_Columns::init();
    }
    
    /**
     * Load custom single templates for our post types
     */
    public function load_single_template($template) {
        global $post;
        
        if (!$post) {
            return $template;
        }
        
        // Check if it's one of our post types
        $post_types = array('products', 'batches', 'grades');
        
        if (in_array($post->post_type, $post_types)) {
            $plugin_template = AZYTUS_TOOLKIT_PLUGIN_DIR . 'templates/single-' . $post->post_type . '.php';
            
            if (file_exists($plugin_template)) {
                return $plugin_template;
            }
        }
        
        return $template;
    }
    
    /**
     * Load plugin textdomain
     */
    public function load_textdomain() {
        load_plugin_textdomain('azytus-toolkit', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
    
    /**
     * Enqueue admin assets
     */
    public function enqueue_admin_assets($hook) {
        global $post_type;
        
        $azytus_post_types = array('products', 'batches', 'grades');
        
        if (in_array($post_type, $azytus_post_types)) {
            wp_enqueue_media();
            
            // Select2 for better dropdowns
            wp_enqueue_style('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), '4.1.0');
            wp_enqueue_script('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), '4.1.0', true);
            
            // Custom admin styles
            wp_enqueue_style('azytus-admin', AZYTUS_TOOLKIT_PLUGIN_URL . 'assets/css/admin.css', array(), AZYTUS_TOOLKIT_VERSION);
            
            // Custom admin scripts (with jQuery UI Sortable)
            wp_enqueue_script('azytus-admin', AZYTUS_TOOLKIT_PLUGIN_URL . 'assets/js/admin.js', array('jquery', 'jquery-ui-sortable', 'select2'), AZYTUS_TOOLKIT_VERSION, true);
            
            wp_localize_script('azytus-admin', 'azytusAdmin', array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('azytus_admin_nonce'),
            ));
        }
    }
    
    /**
     * Enqueue frontend assets
     */
    public function enqueue_frontend_assets() {
        // Select2 for frontend
        wp_enqueue_style('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), '4.1.0');
        wp_enqueue_script('select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array('jquery'), '4.1.0', true);
        
        wp_enqueue_style('azytus-frontend', AZYTUS_TOOLKIT_PLUGIN_URL . 'assets/css/frontend.css', array('select2'), AZYTUS_TOOLKIT_VERSION);
        wp_enqueue_script('azytus-frontend', AZYTUS_TOOLKIT_PLUGIN_URL . 'assets/js/frontend.js', array('jquery', 'select2'), AZYTUS_TOOLKIT_VERSION, true);
        
        wp_localize_script('azytus-frontend', 'azytusFrontend', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('azytus_frontend_nonce'),
        ));
    }
}

/**
 * Initialize the plugin
 */
function azytus_toolkit_init() {
    return Azytus_Toolkit::get_instance();
}

// Start the plugin
add_action('plugins_loaded', 'azytus_toolkit_init');

/**
 * Activation hook
 */
function azytus_toolkit_activate() {
    // Include the post types class
    require_once AZYTUS_TOOLKIT_PLUGIN_DIR . 'includes/class-post-types.php';
    
    // Migrate legacy post type handles
    Azytus_Post_Types::migrate_legacy_post_types();
    
    // Register post types
    Azytus_Post_Types::register_post_types();
    
    // Flush rewrite rules
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'azytus_toolkit_activate');

/**
 * Deactivation hook
 */
function azytus_toolkit_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'azytus_toolkit_deactivate');
