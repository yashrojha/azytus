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

        // Admin AJAX - Check batch number uniqueness
        add_action('wp_ajax_azytus_check_batch_no', array(__CLASS__, 'check_batch_no'));
        
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
        $grade_id = isset($_POST['grade_id']) ? intval($_POST['grade_id']) : 0;
        
        $results = array();

        // AND mode: when both filters are present, both must match (no grade-only / term-only results)
        $require_both = ($grade_id && $search_term !== '');
        
        // Load products and match in PHP so "Acetone DRYSOLV" (title + grade) works
        $product_args = array(
            'post_type' => 'products',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        );
        
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
                $grade_category_id = isset($grade['grade_category_id']) ? intval($grade['grade_category_id']) : 0;
                $product_code = isset($grade['product_code']) ? $grade['product_code'] : '';
                $grade_name = isset($grade['grade_name']) ? $grade['grade_name'] : '';

                // Grade filter (required when grade_id is set)
                $grade_matched = !$grade_id || ($grade_category_id === $grade_id);
                if (!$grade_matched) {
                    continue;
                }

                $term_matched = self::product_grade_matches_search(
                    $product->post_title,
                    $cas,
                    $hsn,
                    $formula,
                    $product_code,
                    $grade_name,
                    $search_term
                );

                if ($search_term && !$term_matched) {
                    continue;
                }

                // Strict AND: both must match when both were provided
                if ($require_both && (!$grade_matched || !$term_matched)) {
                    continue;
                }
                
                $pack_size_list = array();
                if (isset($grade['pack_sizes']) && is_array($grade['pack_sizes'])) {
                    foreach ($grade['pack_sizes'] as $pack_size) {
                        $pack_size_list[] = $pack_size['pack_size'];
                    }
                }

                $product_url = get_permalink($product->ID);
                if ($grade_name !== '') {
                    $product_url = add_query_arg('grade', sanitize_title($grade_name), $product_url);
                }
                
                $results[] = array(
                    'product_name' => trim($product->post_title . ($grade_name !== '' ? ' ' . $grade_name : '')),
                    'product_url' => $product_url,
                    'cas' => $cas,
                    'hsn' => $hsn,
                    'molecular_formula' => $formula,
                    'molecular_weight' => $weight,
                    'product_code' => $product_code,
                    'grade' => $grade_name,
                    'pack_sizes' => implode(', ', $pack_size_list),
                    'msds_url' => $msds_id ? wp_get_attachment_url($msds_id) : '',
                    'has_msds' => !empty($msds_id)
                );
            }
        }
        
        wp_send_json_success($results);
    }

    /**
     * Match a product+grade row against a free-text search.
     *
     * Supports:
     * - Full phrase against title, grade, combined "Title Grade", code, CAS, HSN, formula
     * - Multi-word AND across those fields (e.g. "Acetone DRYSOLV")
     */
    private static function product_grade_matches_search($product_title, $cas, $hsn, $formula, $product_code, $grade_name, $search_term) {
        $search_term = trim((string) $search_term);
        if ($search_term === '') {
            return true;
        }

        $display_name = trim($product_title . ($grade_name !== '' ? ' ' . $grade_name : ''));
        $haystacks = array(
            (string) $product_title,
            (string) $grade_name,
            $display_name,
            (string) $product_code,
            (string) $cas,
            (string) $hsn,
            (string) $formula,
        );

        foreach ($haystacks as $haystack) {
            if ($haystack !== '' && stripos($haystack, $search_term) !== false) {
                return true;
            }
        }

        $tokens = preg_split('/\s+/', $search_term, -1, PREG_SPLIT_NO_EMPTY);
        if (count($tokens) < 2) {
            return false;
        }

        $combined = strtolower(implode(' ', array_filter($haystacks)));
        foreach ($tokens as $token) {
            if ($token === '' || stripos($combined, $token) === false) {
                return false;
            }
        }

        return true;
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
     * Check if a batch number already exists on the site
     */
    public static function check_batch_no() {
        check_ajax_referer('azytus_admin_nonce', 'nonce');

        if (!current_user_can('edit_posts')) {
            wp_send_json_error(array('message' => __('Permission denied', 'azytus-toolkit')));
        }

        $batch_no = isset($_POST['batch_no']) ? sanitize_text_field(wp_unslash($_POST['batch_no'])) : '';
        $exclude_post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

        if ($batch_no === '') {
            wp_send_json_success(array('exists' => false));
        }

        $match = self::find_existing_batch_no($batch_no, $exclude_post_id);

        if ($match) {
            wp_send_json_success(array(
                'exists' => true,
                'post_id' => $match['post_id'],
                'post_title' => $match['post_title'],
                'edit_url' => $match['edit_url'],
                'message' => sprintf(
                    /* translators: 1: batch number, 2: COA/Batch post title */
                    __('Batch number "%1$s" already exists in "%2$s".', 'azytus-toolkit'),
                    $batch_no,
                    $match['post_title']
                ),
            ));
        }

        wp_send_json_success(array('exists' => false));
    }

    /**
     * Find an existing batch number across all COA/Batch posts
     *
     * @param string $batch_no
     * @param int    $exclude_post_id Current post ID to skip
     * @return array|null
     */
    public static function find_existing_batch_no($batch_no, $exclude_post_id = 0) {
        $needle = strtolower(trim($batch_no));

        if ($needle === '') {
            return null;
        }

        $records = get_posts(array(
            'post_type' => 'batches',
            'posts_per_page' => -1,
            'post_status' => array('publish', 'draft', 'pending', 'private', 'future'),
            'fields' => 'ids',
            'no_found_rows' => true,
            'update_post_meta_cache' => true,
            'update_post_term_cache' => false,
        ));

        foreach ($records as $record_id) {
            $record_id = (int) $record_id;

            if ($exclude_post_id && $record_id === $exclude_post_id) {
                continue;
            }

            $batches = get_post_meta($record_id, '_azytus_batches', true);

            if (!is_array($batches)) {
                continue;
            }

            foreach ($batches as $batch) {
                $existing = isset($batch['batch_no']) ? strtolower(trim((string) $batch['batch_no'])) : '';

                if ($existing !== '' && $existing === $needle) {
                    $title = get_the_title($record_id);

                    return array(
                        'post_id' => $record_id,
                        'post_title' => $title !== '' ? $title : sprintf(__('COA/Batch #%d', 'azytus-toolkit'), $record_id),
                        'edit_url' => get_edit_post_link($record_id, 'raw'),
                    );
                }
            }
        }

        return null;
    }

    /**
     * COA Search
     * Returns: Batch No., Code, Pack Size, Product Name with grade, COA, MSDS
     */
    public static function search_coa() {
        check_ajax_referer('azytus_frontend_nonce', 'nonce');
        
        $search_term = isset($_POST['search_term']) ? sanitize_text_field($_POST['search_term']) : '';
        $grade_id = isset($_POST['grade_id']) ? intval($_POST['grade_id']) : 0;

        // AND mode: when both are provided, both must match
        $require_both = ($grade_id && $search_term !== '');
        
        if (empty($search_term) && !$grade_id) {
            wp_send_json_error(array('message' => __('Please enter a batch number, or select a grade', 'azytus-toolkit')));
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
            $grade_category_id = isset($grade['grade_category_id']) ? intval($grade['grade_category_id']) : 0;
            
            // Grade must match when grade_id is provided
            $grade_matched = !$grade_id || ($grade_category_id === $grade_id);
            if (!$grade_matched) {
                continue;
            }
            
            // Get pack size
            $pack_size = '';
            if (isset($grade['pack_sizes'][$pack_size_index]['pack_size'])) {
                $pack_size = $grade['pack_sizes'][$pack_size_index]['pack_size'];
            }
            
            // Get MSDS from product
            $msds_id = get_post_meta($product_id, '_azytus_msds', true);
            
            // Product name + grade concatenated
            $product_name_with_grade = $product->post_title;
            if ($grade_name) {
                $product_name_with_grade .= ' - ' . $grade_name;
            }
            
            // Check each batch in this record
            foreach ($batches as $batch) {
                $batch_no = isset($batch['batch_no']) ? $batch['batch_no'] : '';
                
                // COA search: batch number only (not product name/code — competitor protection)
                $term_matched = !$search_term || (
                    stripos($batch_no, $search_term) !== false
                );

                if (!$term_matched) {
                    continue;
                }

                // Strict AND when both filters were provided
                if ($require_both && (!$grade_matched || !$term_matched)) {
                    continue;
                }
                
                $coa_id = isset($batch['coa']) ? $batch['coa'] : 0;
                
                $results[] = array(
                    'batch_no' => $batch_no,
                    'code' => $product_code,
                    'pack_size' => $pack_size,
                    'product_name_with_grade' => $product_name_with_grade,
                    'product_url' => get_permalink($product_id),
                    'mfg_date' => isset($batch['mfg_date']) ? $batch['mfg_date'] : '',
                    'expiry_date' => isset($batch['expiry_date']) ? $batch['expiry_date'] : '',
                    'coa_url' => $coa_id ? wp_get_attachment_url($coa_id) : '',
                    'has_coa' => !empty($coa_id),
                    'msds_url' => $msds_id ? wp_get_attachment_url($msds_id) : '',
                    'has_msds' => !empty($msds_id)
                );
            }
        }
        
        if (empty($results)) {
            wp_send_json_error(array('message' => __('No results found', 'azytus-toolkit')));
        }
        
        wp_send_json_success($results);
    }
}
