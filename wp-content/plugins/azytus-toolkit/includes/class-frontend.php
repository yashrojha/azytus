<?php
/**
 * Frontend Functionality
 */

if (!defined('ABSPATH')) {
    exit;
}

class Azytus_Frontend {
    
    /**
     * Initialize
     */
    public static function init() {
        // Shortcodes
        add_shortcode('azytus_product_search', array(__CLASS__, 'product_search_shortcode'));
        add_shortcode('azytus_coa_lookup', array(__CLASS__, 'coa_lookup_shortcode'));
        add_shortcode('azytus_product_display', array(__CLASS__, 'product_display_shortcode'));
        
        // Custom single templates
        add_filter('single_template', array(__CLASS__, 'custom_single_template'));
        
        // Header grade search popup
        add_action('wp_footer', array(__CLASS__, 'render_header_search_popup'));
    }
    
    /**
     * Product search shortcode
     * Displays: Product Name, CAS Number, HSN Code, Molecular Formula, 
     * Molecular Weight, Product Code(s), Grade, Pack Size(s), MSDS
     */
    public static function product_search_shortcode($atts) {
        $atts = shortcode_atts(array(
            'show_filters' => 'yes',
        ), $atts, 'azytus_product_search');
        
        ob_start();
        ?>
        <div class="azytus-product-search">
            <?php if ($atts['show_filters'] === 'yes'): ?>
            <div class="azytus-search-filters">
                <div class="azytus-filter-group">
                    <label for="azytus-search-term"><?php _e('Search', 'azytus-toolkit'); ?></label>
                    <input type="text" id="azytus-search-term" placeholder="<?php _e('Product name, CAS, HSN, Formula...', 'azytus-toolkit'); ?>" />
                </div>
                
                <div class="azytus-filter-group">
                    <label for="azytus-filter-category"><?php _e('Product Name', 'azytus-toolkit'); ?></label>
                    <select id="azytus-filter-category" class="azytus-select2-frontend">
                        <option value=""><?php _e('All Products', 'azytus-toolkit'); ?></option>
                        <?php
                        $categories = get_posts(array(
                            'post_type' => 'azytus_category',
                            'posts_per_page' => -1,
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'post_status' => 'publish'
                        ));
                        foreach ($categories as $category):
                        ?>
                            <option value="<?php echo esc_attr($category->ID); ?>"><?php echo esc_html($category->post_title); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="azytus-filter-group">
                    <label for="azytus-filter-grade"><?php _e('Grade', 'azytus-toolkit'); ?></label>
                    <select id="azytus-filter-grade" class="azytus-select2-frontend">
                        <option value=""><?php _e('All Grades', 'azytus-toolkit'); ?></option>
                    </select>
                </div>
                
                <div class="azytus-filter-group">
                    <label for="azytus-filter-pack-size"><?php _e('Pack Size', 'azytus-toolkit'); ?></label>
                    <select id="azytus-filter-pack-size" class="azytus-select2-frontend">
                        <option value=""><?php _e('All Pack Sizes', 'azytus-toolkit'); ?></option>
                    </select>
                </div>
                
                <div class="azytus-filter-group">
                    <button type="button" id="azytus-search-btn" class="button"><?php _e('Search Products', 'azytus-toolkit'); ?></button>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="azytus-search-results">
                <div class="azytus-loader" style="display: none;"><?php _e('Loading...', 'azytus-toolkit'); ?></div>
                <div class="azytus-results-table"></div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * COA lookup shortcode
     * Displays: Batch No., Code, Pack Size, Product Name with grade, COA, MSDS
     */
    public static function coa_lookup_shortcode($atts) {
        ob_start();
        ?>
        <div class="azytus-coa-lookup">
            <div class="azytus-coa-form">
                <h3><?php _e('COA Search', 'azytus-toolkit'); ?></h3>
                <label for="azytus-batch-lookup"><?php _e('Enter Batch Number or Product Code', 'azytus-toolkit'); ?></label>
                <div class="azytus-coa-input-group">
                    <input type="text" id="azytus-batch-lookup" placeholder="<?php _e('Batch number or product code...', 'azytus-toolkit'); ?>" />
                    <button type="button" id="azytus-coa-lookup-btn" class="button"><?php _e('Search', 'azytus-toolkit'); ?></button>
                </div>
            </div>
            
            <div class="azytus-coa-results" style="display: none;">
                <h4><?php _e('Search Results', 'azytus-toolkit'); ?></h4>
                <div class="azytus-coa-results-table"></div>
            </div>
            
            <div class="azytus-coa-error" style="display: none;">
                <p class="azytus-error-message"><?php _e('No results found. Please check the batch number or product code.', 'azytus-toolkit'); ?></p>
            </div>
            
            <div class="azytus-coa-loader" style="display: none;">
                <p><?php _e('Searching...', 'azytus-toolkit'); ?></p>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    
    /**
     * Product display shortcode
     */
    public static function product_display_shortcode($atts) {
        $atts = shortcode_atts(array(
            'id' => 0,
            'type' => 'category', // category, subcategory, variation, subvariation
        ), $atts, 'azytus_product_display');
        
        $post_id = intval($atts['id']);
        if (!$post_id) {
            return '<p>' . __('Invalid product ID', 'azytus-toolkit') . '</p>';
        }
        
        $post_type_map = array(
            'category' => 'azytus_category',
            'subcategory' => 'azytus_subcategory',
            'variation' => 'azytus_variation',
            'subvariation' => 'azytus_subvariation',
        );
        
        $post_type = isset($post_type_map[$atts['type']]) ? $post_type_map[$atts['type']] : 'azytus_category';
        $post = get_post($post_id);
        
        if (!$post || $post->post_type !== $post_type) {
            return '<p>' . __('Product not found', 'azytus-toolkit') . '</p>';
        }
        
        ob_start();
        
        switch ($post_type) {
            case 'azytus_category':
                self::render_category_display($post);
                break;
            case 'azytus_subcategory':
                self::render_subcategory_display($post);
                break;
            case 'azytus_variation':
                self::render_variation_display($post);
                break;
            case 'azytus_subvariation':
                self::render_subvariation_display($post);
                break;
        }
        
        return ob_get_clean();
    }
    
    /**
     * Render category display
     */
    private static function render_category_display($post) {
        $cas = get_post_meta($post->ID, '_azytus_cas', true);
        $hsn = get_post_meta($post->ID, '_azytus_hsn', true);
        $molecular_formula = get_post_meta($post->ID, '_azytus_molecular_formula', true);
        $molecular_weight = get_post_meta($post->ID, '_azytus_molecular_weight', true);
        $msds_id = get_post_meta($post->ID, '_azytus_msds', true);
        
        ?>
        <div class="azytus-product-category">
            <h2><?php echo esc_html($post->post_title); ?></h2>
            
            <div class="azytus-product-details">
                <table class="azytus-details-table">
                    <tr>
                        <th><?php _e('CAS Number', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($cas); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e('HSN Code', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($hsn); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e('Molecular Formula', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($molecular_formula); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e('Molecular Weight', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($molecular_weight . ' g/mol'); ?></td>
                    </tr>
                    <?php if ($msds_id): ?>
                    <tr>
                        <th><?php _e('MSDS', 'azytus-toolkit'); ?></th>
                        <td>
                            <a href="<?php echo esc_url(wp_get_attachment_url($msds_id)); ?>" target="_blank" class="button">
                                <?php _e('Download MSDS', 'azytus-toolkit'); ?>
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
            
            <?php if ($post->post_content): ?>
            <div class="azytus-product-description">
                <?php echo wpautop($post->post_content); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php
    }
    
    /**
     * Render subcategory display
     */
    private static function render_subcategory_display($post) {
        $category_id = get_post_meta($post->ID, '_azytus_category_id', true);
        $grade = get_post_meta($post->ID, '_azytus_grade', true);
        $product_code = get_post_meta($post->ID, '_azytus_product_code', true);
        $category = get_post($category_id);
        
        ?>
        <div class="azytus-product-subcategory">
            <h2><?php echo esc_html($post->post_title); ?></h2>
            
            <div class="azytus-product-details">
                <table class="azytus-details-table">
                    <?php if ($category): ?>
                    <tr>
                        <th><?php _e('Chemical Category', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($category->post_title); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th><?php _e('Grade', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($grade); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e('Product Code', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($product_code); ?></td>
                    </tr>
                </table>
            </div>
            
            <?php if ($post->post_content): ?>
            <div class="azytus-product-description">
                <?php echo wpautop($post->post_content); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php
    }
    
    /**
     * Render variation display
     */
    private static function render_variation_display($post) {
        $category_id = get_post_meta($post->ID, '_azytus_category_id', true);
        $subcategory_id = get_post_meta($post->ID, '_azytus_subcategory_id', true);
        $pack_size = get_post_meta($post->ID, '_azytus_pack_size', true);
        
        $category = get_post($category_id);
        $subcategory = get_post($subcategory_id);
        
        ?>
        <div class="azytus-product-variation">
            <h2><?php echo esc_html($post->post_title); ?></h2>
            
            <div class="azytus-product-details">
                <table class="azytus-details-table">
                    <?php if ($category): ?>
                    <tr>
                        <th><?php _e('Chemical Category', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($category->post_title); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($subcategory): ?>
                    <tr>
                        <th><?php _e('Product Grade', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($subcategory->post_title); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th><?php _e('Pack Size', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($pack_size); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <?php
    }
    
    /**
     * Render subvariation display
     */
    private static function render_subvariation_display($post) {
        $category_id = get_post_meta($post->ID, '_azytus_category_id', true);
        $subcategory_id = get_post_meta($post->ID, '_azytus_subcategory_id', true);
        $variation_id = get_post_meta($post->ID, '_azytus_variation_id', true);
        $batch_no = get_post_meta($post->ID, '_azytus_batch_no', true);
        $coa_id = get_post_meta($post->ID, '_azytus_coa', true);
        
        $category = get_post($category_id);
        $subcategory = get_post($subcategory_id);
        $variation = get_post($variation_id);
        
        ?>
        <div class="azytus-product-subvariation">
            <h2><?php echo esc_html($post->post_title); ?></h2>
            
            <div class="azytus-product-details">
                <table class="azytus-details-table">
                    <?php if ($category): ?>
                    <tr>
                        <th><?php _e('Chemical Category', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($category->post_title); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($subcategory): ?>
                    <tr>
                        <th><?php _e('Product Grade', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($subcategory->post_title); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if ($variation): ?>
                    <tr>
                        <th><?php _e('Pack Size', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($variation->post_title); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th><?php _e('Batch Number', 'azytus-toolkit'); ?></th>
                        <td><?php echo esc_html($batch_no); ?></td>
                    </tr>
                    <?php if ($coa_id): ?>
                    <tr>
                        <th><?php _e('COA', 'azytus-toolkit'); ?></th>
                        <td>
                            <a href="<?php echo esc_url(wp_get_attachment_url($coa_id)); ?>" target="_blank" class="button">
                                <?php _e('Download COA', 'azytus-toolkit'); ?>
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
        <?php
    }
    
    /**
     * Get all product grades assigned to a grade category
     *
     * @param int $category_id Grade category post ID
     * @return array List of grade rows with product info
     */
    public static function get_grades_for_category($category_id) {
        $category_id = intval($category_id);
        if (!$category_id) {
            return array();
        }
        
        $products = get_posts(array(
            'post_type' => 'products',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC',
        ));
        
        $items = array();
        
        foreach ($products as $product) {
            $grades = get_post_meta($product->ID, '_azytus_grades', true);
            if (!is_array($grades)) {
                continue;
            }
            
            foreach ($grades as $grade) {
                $grade_category_id = isset($grade['grade_category_id']) ? intval($grade['grade_category_id']) : 0;
                if ($grade_category_id !== $category_id) {
                    continue;
                }
                
                $pack_sizes = array();
                if (!empty($grade['pack_sizes']) && is_array($grade['pack_sizes'])) {
                    foreach ($grade['pack_sizes'] as $pack) {
                        if (!empty($pack['pack_size'])) {
                            $pack_sizes[] = $pack['pack_size'];
                        }
                    }
                }
                
                $items[] = array(
                    'product_id' => $product->ID,
                    'product_name' => $product->post_title,
                    'product_url' => get_permalink($product->ID),
                    'grade_name' => isset($grade['grade_name']) ? $grade['grade_name'] : '',
                    'product_code' => isset($grade['product_code']) ? $grade['product_code'] : '',
                    'pack_sizes' => $pack_sizes,
                    'pack_sizes_display' => implode(', ', $pack_sizes),
                );
            }
        }
        
        usort($items, function ($a, $b) {
            return strnatcasecmp($a['product_name'], $b['product_name']);
        });
        
        return $items;
    }
    
    /**
     * Header search button + popup markup
     * Button is injected into .nav-right as the first element via JS.
     */
    public static function render_header_search_popup() {
        ?>
        <!-- Azytus header search trigger (moved into .nav-right by JS) -->
        <template id="azytus-header-search-btn-template">
            <button type="button" class="azytus-header-search-btn contact-area" aria-label="<?php esc_attr_e('Search products and COA', 'azytus-toolkit'); ?>" aria-haspopup="dialog" aria-controls="azytus-header-search-popup">
                <span class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
                        <path d="M20 20L16.5 16.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </span>
            </button>
        </template>

        <div id="azytus-header-search-popup" class="azytus-header-search-popup" hidden aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="azytus-header-search-title">
            <div class="azytus-header-search-overlay" data-azytus-search-close></div>
            <div class="azytus-header-search-dialog">
                <div class="azytus-header-search-dialog-inner">
                    <div class="azytus-header-search-dialog-head">
                        <h3 id="azytus-header-search-title"><?php esc_html_e('Search Products & COA', 'azytus-toolkit'); ?></h3>
                        <button type="button" class="azytus-header-search-close" data-azytus-search-close aria-label="<?php esc_attr_e('Close search', 'azytus-toolkit'); ?>">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>

                    <form class="azytus-header-search-form" id="azytus-header-search-form" autocomplete="off" onsubmit="return false;">
                        <div class="azytus-header-search-pill" role="search">
                            <div class="azytus-header-search-query">
                                <label for="azytus-header-product-input" class="screen-reader-text"><?php esc_html_e('Search term', 'azytus-toolkit'); ?></label>
                                <input
                                    type="search"
                                    id="azytus-header-product-input"
                                    class="azytus-header-product-input"
                                    name="search_term"
                                    placeholder="<?php esc_attr_e('Search by chemistry, function, application and more', 'azytus-toolkit'); ?>"
                                    autocomplete="off"
                                />
                                <button type="button" id="azytus-header-search-clear" class="azytus-header-search-clear" hidden title="<?php esc_attr_e('Clear search', 'azytus-toolkit'); ?>" aria-label="<?php esc_attr_e('Clear search', 'azytus-toolkit'); ?>">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </div>

                            <button type="button" id="azytus-header-product-btn" class="azytus-header-action-btn azytus-header-product-btn" title="<?php esc_attr_e('Search Products', 'azytus-toolkit'); ?>" aria-label="<?php esc_attr_e('Search Products', 'azytus-toolkit'); ?>">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
                                    <path d="M20 20L16.5 16.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                <span><?php esc_html_e('Search Products', 'azytus-toolkit'); ?></span>
                            </button>

                            <button type="button" id="azytus-header-coa-btn" class="azytus-header-action-btn azytus-header-coa-btn" title="<?php esc_attr_e('Search COA', 'azytus-toolkit'); ?>" aria-label="<?php esc_attr_e('Search COA', 'azytus-toolkit'); ?>">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14 2V8H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 13H16M8 17H13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                <span><?php esc_html_e('Search COA', 'azytus-toolkit'); ?></span>
                            </button>
                        </div>
                    </form>

                    <div class="azytus-header-search-status" id="azytus-header-search-status" hidden></div>
                    <div class="azytus-header-search-results" id="azytus-header-search-results"></div>
                </div>
            </div>
        </div>
        <?php
    }
    
    /**
     * Custom single template
     */
    public static function custom_single_template($single_template) {
        global $post;
        
        $azytus_post_types = array('azytus_category', 'azytus_subcategory', 'azytus_variation', 'azytus_subvariation');
        
        if (in_array($post->post_type, $azytus_post_types)) {
            $template_file = AZYTUS_TOOLKIT_PLUGIN_DIR . 'templates/single-' . $post->post_type . '.php';
            if (file_exists($template_file)) {
                return $template_file;
            }
        }
        
        return $single_template;
    }
}
