<?php
/**
 * Admin Columns Customization
 */

if (!defined('ABSPATH')) {
    exit;
}

class Azytus_Admin_Columns {
    
    /**
     * Initialize
     */
    public static function init() {
        // Product columns
        add_filter('manage_products_posts_columns', array(__CLASS__, 'product_columns'));
        add_action('manage_products_posts_custom_column', array(__CLASS__, 'product_column_content'), 10, 2);
        
        // COA/Batch columns
        add_filter('manage_batches_posts_columns', array(__CLASS__, 'coa_batch_columns'));
        add_action('manage_batches_posts_custom_column', array(__CLASS__, 'coa_batch_column_content'), 10, 2);
        
        // Grade Category columns
        add_filter('manage_grades_posts_columns', array(__CLASS__, 'grade_category_columns'));
        add_action('manage_grades_posts_custom_column', array(__CLASS__, 'grade_category_column_content'), 10, 2);
    }
    
    /**
     * Product columns
     */
    public static function product_columns($columns) {
        $new_columns = array();
        $new_columns['cb'] = $columns['cb'];
        $new_columns['title'] = __('Product Name', 'azytus-toolkit');
        $new_columns['cas'] = __('CAS Number', 'azytus-toolkit');
        $new_columns['hsn'] = __('HSN Code', 'azytus-toolkit');
        $new_columns['molecular_formula'] = __('Molecular Formula', 'azytus-toolkit');
        $new_columns['molecular_weight'] = __('Molecular Weight', 'azytus-toolkit');
        $new_columns['grades_count'] = __('Grades', 'azytus-toolkit');
        $new_columns['msds'] = __('MSDS', 'azytus-toolkit');
        $new_columns['date'] = $columns['date'];
        
        return $new_columns;
    }
    
    /**
     * Product column content
     */
    public static function product_column_content($column, $post_id) {
        switch ($column) {
            case 'cas':
                echo esc_html(get_post_meta($post_id, '_azytus_cas', true));
                break;
            case 'hsn':
                echo esc_html(get_post_meta($post_id, '_azytus_hsn', true));
                break;
            case 'molecular_formula':
                echo esc_html(get_post_meta($post_id, '_azytus_molecular_formula', true));
                break;
            case 'molecular_weight':
                $weight = get_post_meta($post_id, '_azytus_molecular_weight', true);
                echo $weight ? esc_html($weight . ' g/mol') : '-';
                break;
            case 'grades_count':
                $grades = get_post_meta($post_id, '_azytus_grades', true);
                $count = is_array($grades) ? count($grades) : 0;
                echo esc_html($count . ' grade' . ($count !== 1 ? 's' : ''));
                break;
            case 'msds':
                $msds_id = get_post_meta($post_id, '_azytus_msds', true);
                if ($msds_id) {
                    $msds_url = wp_get_attachment_url($msds_id);
                    echo '<a href="' . esc_url($msds_url) . '" target="_blank" class="button button-small">' . __('View MSDS', 'azytus-toolkit') . '</a>';
                } else {
                    echo '<span style="color: #999;">' . __('Not uploaded', 'azytus-toolkit') . '</span>';
                }
                break;
        }
    }
    
    /**
     * COA/Batch columns
     */
    public static function coa_batch_columns($columns) {
        $new_columns = array();
        $new_columns['cb'] = $columns['cb'];
        $new_columns['title'] = __('COA/Batch Name', 'azytus-toolkit');
        $new_columns['product'] = __('Product', 'azytus-toolkit');
        $new_columns['grade'] = __('Grade', 'azytus-toolkit');
        $new_columns['pack_size'] = __('Pack Size', 'azytus-toolkit');
        $new_columns['batches_count'] = __('Batches', 'azytus-toolkit');
        $new_columns['date'] = $columns['date'];
        
        return $new_columns;
    }
    
    /**
     * COA/Batch column content
     */
    public static function coa_batch_column_content($column, $post_id) {
        switch ($column) {
            case 'product':
                $product_id = get_post_meta($post_id, '_azytus_product_id', true);
                if ($product_id) {
                    $product = get_post($product_id);
                    if ($product) {
                        echo '<a href="' . get_edit_post_link($product_id) . '">' . esc_html($product->post_title) . '</a>';
                    }
                } else {
                    echo '<span style="color: #999;">' . __('Not linked', 'azytus-toolkit') . '</span>';
                }
                break;
            case 'grade':
                $product_id = get_post_meta($post_id, '_azytus_product_id', true);
                $grade_index = get_post_meta($post_id, '_azytus_grade_index', true);
                
                if ($product_id && $grade_index !== '') {
                    $grades = get_post_meta($product_id, '_azytus_grades', true);
                    if (is_array($grades) && isset($grades[$grade_index])) {
                        echo esc_html($grades[$grade_index]['grade_name']);
                    } else {
                        echo '<span style="color: #999;">' . __('Not found', 'azytus-toolkit') . '</span>';
                    }
                } else {
                    echo '<span style="color: #999;">' . __('Not set', 'azytus-toolkit') . '</span>';
                }
                break;
            case 'pack_size':
                $product_id = get_post_meta($post_id, '_azytus_product_id', true);
                $grade_index = get_post_meta($post_id, '_azytus_grade_index', true);
                $pack_size_index = get_post_meta($post_id, '_azytus_pack_size_index', true);
                
                if ($product_id && $grade_index !== '' && $pack_size_index !== '') {
                    $grades = get_post_meta($product_id, '_azytus_grades', true);
                    if (is_array($grades) && isset($grades[$grade_index]['pack_sizes'][$pack_size_index])) {
                        echo esc_html($grades[$grade_index]['pack_sizes'][$pack_size_index]['pack_size']);
                    } else {
                        echo '<span style="color: #999;">' . __('Not found', 'azytus-toolkit') . '</span>';
                    }
                } else {
                    echo '<span style="color: #999;">' . __('Not set', 'azytus-toolkit') . '</span>';
                }
                break;
            case 'batches_count':
                $batches = get_post_meta($post_id, '_azytus_batches', true);
                $count = is_array($batches) ? count($batches) : 0;
                echo esc_html($count . ' batch' . ($count !== 1 ? 'es' : ''));
                break;
        }
    }
    
    /**
     * Grade Category columns
     */
    public static function grade_category_columns($columns) {
        $new_columns = array();
        $new_columns['cb'] = $columns['cb'];
        $new_columns['title'] = __('Category Name', 'azytus-toolkit');
        $new_columns['featured_image'] = __('Banner Image', 'azytus-toolkit');
        $new_columns['products_image'] = __('Products Image', 'azytus-toolkit');
        $new_columns['products_count'] = __('Linked Products', 'azytus-toolkit');
        $new_columns['date'] = $columns['date'];
        
        return $new_columns;
    }
    
    /**
     * Grade Category column content
     */
    public static function grade_category_column_content($column, $post_id) {
        switch ($column) {
            case 'featured_image':
                if (has_post_thumbnail($post_id)) {
                    echo get_the_post_thumbnail($post_id, array(60, 60));
                } else {
                    echo '<span style="color: #999;">' . __('Not set', 'azytus-toolkit') . '</span>';
                }
                break;
            case 'products_image':
                $image_id = get_post_meta($post_id, '_azytus_products_image', true);
                if ($image_id) {
                    echo wp_get_attachment_image($image_id, array(60, 60));
                } else {
                    echo '<span style="color: #999;">' . __('Not set', 'azytus-toolkit') . '</span>';
                }
                break;
            case 'products_count':
                $items = Azytus_Frontend::get_grades_for_category($post_id);
                $count = count($items);
                echo esc_html($count . ' grade' . ($count !== 1 ? 's' : ''));
                break;
        }
    }
}
