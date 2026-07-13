<?php
/**
 * AJAX Handler
 */

if (!defined('ABSPATH')) {
    exit;
}

class Azytus_Ajax_Handler {
    
    /**
     * Initialize
     */
    public static function init() {
        // Admin AJAX - Get product grades
        add_action('wp_ajax_azytus_get_product_grades', array(__CLASS__, 'get_product_grades'));
        
        // Admin AJAX - Get grade pack sizes
        add_action('wp_ajax_azytus_get_grade_pack_sizes', array(__CLASS__, 'get_grade_pack_sizes'));
        
        // Frontend AJAX - Search products
        add_action('wp_ajax_azytus_search_products', array(__CLASS__, 'search_products'));
        add_action('wp_ajax_nopriv_azytus_search_products', array(__CLASS__, 'search_products'));
        
        // Frontend AJAX - Get pack sizes
        add_action('wp_ajax_azytus_get_pack_sizes', array(__CLASS__, 'get_pack_sizes'));
        add_action('wp_ajax_nopriv_azytus_get_pack_sizes', array(__CLASS__, 'get_pack_sizes'));
        
        // Frontend AJAX - Search COA
        add_action('wp_ajax_azytus_search_coa', array(__CLASS__, 'search_coa'));
        add_action('wp_ajax_nopriv_azytus_search_coa', array(__CLASS__, 'search_coa'));
    }
    
    /**
     * Get product grades by product ID
     */
    public static function get_product_grades() {
        check_ajax_referer('azytus_admin_nonce', 'nonce');
        
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
        
        if (!$product_id) {
            wp_send_json_error(array('message' => __('Invalid product ID', 'azytus-toolkit')));
        }
        
        $grades = get_post_meta($product_id, '_azytus_grades', true);
        
        if (!is_array($grades)) {
            $grades = array();
        }
        
        $results = array();
        foreach ($grades as $index => $grade) {
            $results[] = array(
                'index' => $index,
                'text' => $grade['grade_name'] . ' (' . $grade['product_code'] . ')'
            );
        }
        
        wp_send_json_success($results);
    }
    
    /**
     * Get pack sizes by product ID and grade index
     */
    public static function get_grade_pack_sizes() {
        check_ajax_referer('azytus_admin_nonce', 'nonce');
        
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
        $grade_index = isset($_POST['grade_index']) ? intval($_POST['grade_index']) : null;
        
        if (!$product_id || $grade_index === null) {
            wp_send_json_error(array('message' => __('Invalid parameters', 'azytus-toolkit')));
        }
        
        $grades = get_post_meta($product_id, '_azytus_grades', true);
        
        if (!is_array($grades) || !isset($grades[$grade_index])) {
            wp_send_json_error(array('message' => __('Grade not found', 'azytus-toolkit')));
        }
        
        $pack_sizes = isset($grades[$grade_index]['pack_sizes']) ? $grades[$grade_index]['pack_sizes'] : array();
        
        $results = array();
        foreach ($pack_sizes as $index => $pack_size) {
            $results[] = array(
                'index' => $index,
                'text' => $pack_size['pack_size']
            );
        }
        
        wp_send_json_success($results);
    }
    
    /**
     * Search products (frontend)
     * Returns: Product Name, CAS Number, HSN Code, Molecular Formula, 
     * Molecular Weight, Product Code(s), Grade, Pack Size(s), MSDS
     */
    public static function search_products() {
        check_ajax_referer('azytus_frontend_nonce', 'nonce');
        
        $search_term = isset($_POST['search_term']) ? sanitize_text_field($_POST['search_term']) : '';
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
        
        $results = array();
        
        // Search in products
        $product_args = array(
            'post_type' => 'products',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        );
        
        if ($search_term) {
            $product_args['s'] = $search_term;
        }
        
        if ($product_id) {
            $product_args['post__in'] = array($product_id);
        }
        
        $products = get_posts($product_args);
        
        foreach ($products as $product) {
            // Get product meta data
            $cas = get_post_meta($product->ID, '_azytus_cas', true);
            $hsn = get_post_meta($product->ID, '_azytus_hsn', true);
            $formula = get_post_meta($product->ID, '_azytus_molecular_formula', true);
            $weight = get_post_meta($product->ID, '_azytus_molecular_weight', true);
            $msds_id = get_post_meta($product->ID, '_azytus_msds', true);
            
            // Get grades
            $grades = get_post_meta($product->ID, '_azytus_grades', true);
            if (!is_array($grades)) {
                $grades = array();
            }
            
            foreach ($grades as $grade) {
                $pack_size_list = array();
                if (isset($grade['pack_sizes']) && is_array($grade['pack_sizes'])) {
                    foreach ($grade['pack_sizes'] as $pack_size) {
                        $pack_size_list[] = $pack_size['pack_size'];
                    }
                }
                
                $results[] = array(
                    'product_name' => $product->post_title,
                    'cas' => $cas,
                    'hsn' => $hsn,
                    'molecular_formula' => $formula,
                    'molecular_weight' => $weight,
                    'product_code' => isset($grade['product_code']) ? $grade['product_code'] : '',
                    'grade' => isset($grade['grade_name']) ? $grade['grade_name'] : '',
                    'pack_sizes' => implode(', ', $pack_size_list),
                    'msds_url' => $msds_id ? wp_get_attachment_url($msds_id) : '',
                    'has_msds' => !empty($msds_id)
                );
            }
        }
        
        wp_send_json_success($results);
    }
    
    /**
     * Get pack sizes by product ID and grade index
     */
    public static function get_pack_sizes() {
        check_ajax_referer('azytus_frontend_nonce', 'nonce');
        
        $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
        $grade_index = isset($_POST['grade_index']) ? intval($_POST['grade_index']) : null;
        
        if (!$product_id || $grade_index === null) {
            wp_send_json_error(array('message' => __('Invalid parameters', 'azytus-toolkit')));
        }
        
        $grades = get_post_meta($product_id, '_azytus_grades', true);
        
        if (!is_array($grades) || !isset($grades[$grade_index])) {
            wp_send_json_error(array('message' => __('Grade not found', 'azytus-toolkit')));
        }
        
        $pack_sizes = isset($grades[$grade_index]['pack_sizes']) ? $grades[$grade_index]['pack_sizes'] : array();
        
        $results = array();
        foreach ($pack_sizes as $index => $pack_size) {
            $results[] = array(
                'id' => $index,
                'text' => $pack_size['pack_size']
            );
        }
        
        wp_send_json_success($results);
    }
    
    /**
     * COA Search
     * Returns: Batch No., Code, Pack Size, Product Name with grade, COA, MSDS
     */
    public static function search_coa() {
        check_ajax_referer('azytus_frontend_nonce', 'nonce');
        
        $search_term = isset($_POST['search_term']) ? sanitize_text_field($_POST['search_term']) : '';
        
        if (empty($search_term)) {
            wp_send_json_error(array('message' => __('Please enter a batch number or product code', 'azytus-toolkit')));
        }
        
        $results = array();
        
        // Get all COA/Batch records
        $coa_batch_records = get_posts(array(
            'post_type' => 'batches',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));
        
        foreach ($coa_batch_records as $coa_batch_record) {
            $product_id = get_post_meta($coa_batch_record->ID, '_azytus_product_id', true);
            $grade_index = get_post_meta($coa_batch_record->ID, '_azytus_grade_index', true);
            $pack_size_index = get_post_meta($coa_batch_record->ID, '_azytus_pack_size_index', true);
            $batches = get_post_meta($coa_batch_record->ID, '_azytus_batches', true);
            
            if (!is_array($batches)) {
                continue;
            }
            
            $product = get_post($product_id);
            if (!$product) {
                continue;
            }
            
            // Get grades from product
            $grades = get_post_meta($product_id, '_azytus_grades', true);
            if (!is_array($grades) || !isset($grades[$grade_index])) {
                continue;
            }
            
            $grade = $grades[$grade_index];
            $product_code = isset($grade['product_code']) ? $grade['product_code'] : '';
            $grade_name = isset($grade['grade_name']) ? $grade['grade_name'] : '';
            
            // Get pack size
            $pack_size = '';
            if (isset($grade['pack_sizes'][$pack_size_index]['pack_size'])) {
                $pack_size = $grade['pack_sizes'][$pack_size_index]['pack_size'];
            }
            
            // Get MSDS from product
            $msds_id = get_post_meta($product_id, '_azytus_msds', true);
            
            // Product Name with grade
            $product_name_with_grade = $product->post_title;
            if ($grade_name) {
                $product_name_with_grade .= ' - ' . $grade_name;
            }
            
            // Check each batch in this record
            foreach ($batches as $batch) {
                $batch_no = isset($batch['batch_no']) ? $batch['batch_no'] : '';
                
                // Check if search term matches batch number or product code
                if (stripos($batch_no, $search_term) !== false || stripos($product_code, $search_term) !== false) {
                    $coa_id = isset($batch['coa']) ? $batch['coa'] : 0;
                    
                    $results[] = array(
                        'batch_no' => $batch_no,
                        'code' => $product_code,
                        'pack_size' => $pack_size,
                        'product_name_with_grade' => $product_name_with_grade,
                        'mfg_date' => isset($batch['mfg_date']) ? $batch['mfg_date'] : '',
                        'expiry_date' => isset($batch['expiry_date']) ? $batch['expiry_date'] : '',
                        'coa_url' => $coa_id ? wp_get_attachment_url($coa_id) : '',
                        'has_coa' => !empty($coa_id),
                        'msds_url' => $msds_id ? wp_get_attachment_url($msds_id) : '',
                        'has_msds' => !empty($msds_id)
                    );
                }
            }
        }
        
        if (empty($results)) {
            wp_send_json_error(array('message' => __('No results found', 'azytus-toolkit')));
        }
        
        wp_send_json_success($results);
    }
}
