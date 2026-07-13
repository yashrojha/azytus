<?php
/**
 * Meta Boxes Handler
 */

if (!defined('ABSPATH')) {
    exit;
}

class Azytus_Meta_Boxes {
    
    /**
     * Initialize
     */
    public static function init() {
        add_action('add_meta_boxes', array(__CLASS__, 'add_meta_boxes'));
        add_action('save_post', array(__CLASS__, 'save_meta_boxes'), 10, 2);
    }
    
    /**
     * Add meta boxes
     */
    public static function add_meta_boxes() {
        // Product Meta Boxes
        add_meta_box(
            'azytus_product_details',
            __('Product Details', 'azytus-toolkit'),
            array(__CLASS__, 'render_product_meta_box'),
            'products',
            'normal',
            'high'
        );
        
        add_meta_box(
            'azytus_product_grades',
            __('Product Grades & Pack Sizes', 'azytus-toolkit'),
            array(__CLASS__, 'render_product_grades_meta_box'),
            'products',
            'normal',
            'high'
        );
        
        add_meta_box(
            'azytus_product_additional',
            __('Additional Information (Optional)', 'azytus-toolkit'),
            array(__CLASS__, 'render_product_additional_meta_box'),
            'products',
            'normal',
            'low'
        );
        
        // COA/Batch Meta Boxes
        add_meta_box(
            'azytus_coa_batch_details',
            __('COA/Batch Records', 'azytus-toolkit'),
            array(__CLASS__, 'render_coa_batch_meta_box'),
            'batches',
            'normal',
            'high'
        );
        
        // Grade Category Meta Boxes
        add_meta_box(
            'azytus_grade_category_details',
            __('Grade Category Details', 'azytus-toolkit'),
            array(__CLASS__, 'render_grade_category_meta_box'),
            'grades',
            'normal',
            'high'
        );
    }
    
    /**
     * Get all published grade categories for dropdowns
     */
    private static function get_grade_categories() {
        return get_posts(array(
            'post_type' => 'grades',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
            'post_status' => 'publish',
        ));
    }
    
    /**
     * Render Grade Category Meta Box
     */
    public static function render_grade_category_meta_box($post) {
        wp_nonce_field('azytus_grade_category_meta_box', 'azytus_grade_category_meta_box_nonce');
        
        $products_image_id = get_post_meta($post->ID, '_azytus_products_image', true);
        
        ?>
        <div class="azytus-meta-box">
            <p class="description" style="margin-bottom: 15px;">
                <?php _e('Use the post title for the category name, the main editor for the description/features, and the Featured Image (right sidebar) for the banner image.', 'azytus-toolkit'); ?>
            </p>
            <table class="form-table">
                <tr>
                    <th><label for="azytus_products_image"><?php _e('Products Image', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <div class="azytus-file-upload azytus-image-upload">
                            <input type="hidden" id="azytus_products_image" name="azytus_products_image" value="<?php echo esc_attr($products_image_id); ?>" />
                            <button type="button" class="button azytus-upload-button azytus-image-upload-button" data-field="azytus_products_image" data-file-type="image">
                                <?php _e('Select/Upload Products Image', 'azytus-toolkit'); ?>
                            </button>
                            <button type="button" class="button azytus-remove-button" data-field="azytus_products_image" style="<?php echo $products_image_id ? '' : 'display:none;'; ?>">
                                <?php _e('Remove', 'azytus-toolkit'); ?>
                            </button>
                            <div class="azytus-file-preview azytus-image-preview">
                                <?php if ($products_image_id): ?>
                                    <?php echo wp_get_attachment_image($products_image_id, 'medium'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="description"><?php _e('Image displayed alongside the description on the category page (e.g., product bottles).', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
            </table>
        </div>
        <?php
    }
    
    /**
     * Render Product Meta Box (Basic Details)
     */
    public static function render_product_meta_box($post) {
        wp_nonce_field('azytus_product_meta_box', 'azytus_product_meta_box_nonce');
        
        // Get saved values
        $cas = get_post_meta($post->ID, '_azytus_cas', true);
        $hsn = get_post_meta($post->ID, '_azytus_hsn', true);
        $molecular_formula = get_post_meta($post->ID, '_azytus_molecular_formula', true);
        $molecular_weight = get_post_meta($post->ID, '_azytus_molecular_weight', true);
        $msds_id = get_post_meta($post->ID, '_azytus_msds', true);
        
        ?>
        <div class="azytus-meta-box">
            <table class="form-table">
                <tr>
                    <th><label for="azytus_cas"><?php _e('CAS Number', 'azytus-toolkit'); ?> <span class="required">*</span></label></th>
                    <td>
                        <input type="text" id="azytus_cas" name="azytus_cas" value="<?php echo esc_attr($cas); ?>" class="regular-text" required />
                        <p class="description"><?php _e('Chemical Abstracts Service registry number', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_hsn"><?php _e('HSN Code', 'azytus-toolkit'); ?> <span class="required">*</span></label></th>
                    <td>
                        <input type="text" id="azytus_hsn" name="azytus_hsn" value="<?php echo esc_attr($hsn); ?>" class="regular-text" required />
                        <p class="description"><?php _e('Harmonized System of Nomenclature code', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_molecular_formula"><?php _e('Molecular Formula', 'azytus-toolkit'); ?> <span class="required">*</span></label></th>
                    <td>
                        <input type="text" id="azytus_molecular_formula" name="azytus_molecular_formula" value="<?php echo esc_attr($molecular_formula); ?>" class="regular-text" required />
                        <p class="description"><?php _e('e.g., CH3COOH, C2H6O', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_molecular_weight"><?php _e('Molecular Weight', 'azytus-toolkit'); ?> <span class="required">*</span></label></th>
                    <td>
                        <input type="text" id="azytus_molecular_weight" name="azytus_molecular_weight" value="<?php echo esc_attr($molecular_weight); ?>" class="regular-text" required />
                        <p class="description"><?php _e('In g/mol (e.g., 58.08)', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_msds"><?php _e('MSDS (Material Safety Data Sheet)', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <div class="azytus-file-upload">
                            <input type="hidden" id="azytus_msds" name="azytus_msds" value="<?php echo esc_attr($msds_id); ?>" />
                            <button type="button" class="button azytus-upload-button" data-field="azytus_msds">
                                <?php _e('Select/Upload MSDS PDF', 'azytus-toolkit'); ?>
                            </button>
                            <button type="button" class="button azytus-remove-button" data-field="azytus_msds" style="<?php echo $msds_id ? '' : 'display:none;'; ?>">
                                <?php _e('Remove', 'azytus-toolkit'); ?>
                            </button>
                            <div class="azytus-file-preview">
                                <?php if ($msds_id): ?>
                                    <?php $msds_url = wp_get_attachment_url($msds_id); ?>
                                    <?php $msds_filename = basename(get_attached_file($msds_id)); ?>
                                    <a href="<?php echo esc_url($msds_url); ?>" target="_blank" class="azytus-file-link">
                                        <span class="dashicons dashicons-media-document"></span>
                                        <?php echo esc_html($msds_filename); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="description"><?php _e('Upload or select a PDF file containing Material Safety Data Sheet', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
            </table>
        </div>
        <?php
    }
    
    /**
     * Render Product Additional Information Meta Box (Optional Fields)
     */
    public static function render_product_additional_meta_box($post) {
        wp_nonce_field('azytus_product_additional_meta_box', 'azytus_product_additional_meta_box_nonce');
        
        // Get additional fields
        $pictograms_ghs = get_post_meta($post->ID, '_azytus_pictograms_ghs', true);
        $signal_words = get_post_meta($post->ID, '_azytus_signal_words', true);
        $un_number = get_post_meta($post->ID, '_azytus_un_number', true);
        $transport_info = get_post_meta($post->ID, '_azytus_transport_info', true);
        $transport_hazard_class = get_post_meta($post->ID, '_azytus_transport_hazard_class', true);
        $packing_group = get_post_meta($post->ID, '_azytus_packing_group', true);
        $product_specification = get_post_meta($post->ID, '_azytus_product_specification', true);
        
        ?>
        <div class="azytus-meta-box">
            <table class="form-table">
                <tr>
                    <th><label for="azytus_pictograms_ghs"><?php _e('Pictograms/GHS Symbols', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <input type="text" id="azytus_pictograms_ghs" name="azytus_pictograms_ghs" value="<?php echo esc_attr($pictograms_ghs); ?>" class="large-text" />
                        <p class="description"><?php _e('e.g., GHS02, GHS07, GHS08', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_signal_words"><?php _e('Signal Words', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <select id="azytus_signal_words" name="azytus_signal_words" class="regular-text">
                            <option value=""><?php _e('-- Select --', 'azytus-toolkit'); ?></option>
                            <option value="Danger" <?php selected($signal_words, 'Danger'); ?>><?php _e('Danger', 'azytus-toolkit'); ?></option>
                            <option value="Warning" <?php selected($signal_words, 'Warning'); ?>><?php _e('Warning', 'azytus-toolkit'); ?></option>
                        </select>
                        <p class="description"><?php _e('GHS signal words', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_un_number"><?php _e('UN Number', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <input type="text" id="azytus_un_number" name="azytus_un_number" value="<?php echo esc_attr($un_number); ?>" class="regular-text" />
                        <p class="description"><?php _e('e.g., UN1090, UN1230', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_transport_info"><?php _e('Transport Information', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <textarea id="azytus_transport_info" name="azytus_transport_info" class="large-text" rows="3"><?php echo esc_textarea($transport_info); ?></textarea>
                        <p class="description"><?php _e('Additional transport information', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_transport_hazard_class"><?php _e('Transport Hazard Class', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <input type="text" id="azytus_transport_hazard_class" name="azytus_transport_hazard_class" value="<?php echo esc_attr($transport_hazard_class); ?>" class="regular-text" />
                        <p class="description"><?php _e('e.g., Class 3 (Flammable liquids)', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_packing_group"><?php _e('Packing Group', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <select id="azytus_packing_group" name="azytus_packing_group" class="regular-text">
                            <option value=""><?php _e('-- Select --', 'azytus-toolkit'); ?></option>
                            <option value="I" <?php selected($packing_group, 'I'); ?>><?php _e('Packing Group I', 'azytus-toolkit'); ?></option>
                            <option value="II" <?php selected($packing_group, 'II'); ?>><?php _e('Packing Group II', 'azytus-toolkit'); ?></option>
                            <option value="III" <?php selected($packing_group, 'III'); ?>><?php _e('Packing Group III', 'azytus-toolkit'); ?></option>
                        </select>
                        <p class="description"><?php _e('Transport packing group', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_product_specification"><?php _e('Product Specification', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <textarea id="azytus_product_specification" name="azytus_product_specification" class="large-text" rows="8"><?php echo esc_textarea($product_specification); ?></textarea>
                        <p class="description"><?php _e('Long text box for detailed product specification', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
            </table>
        </div>
        <?php
    }
    
    /**
     * Render Product Grades Meta Box (Repeatable Fields)
     */
    public static function render_product_grades_meta_box($post) {
        wp_nonce_field('azytus_product_grades_meta_box', 'azytus_product_grades_meta_box_nonce');
        
        // Get saved grades
        $grades = get_post_meta($post->ID, '_azytus_grades', true);
        if (!is_array($grades)) {
            $grades = array();
        }
        
        ?>
        <div class="azytus-repeatable-wrap">
            <div id="azytus-grades-container">
                <?php if (!empty($grades)): ?>
                    <?php foreach ($grades as $index => $grade): ?>
                        <?php self::render_grade_row($index, $grade); ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php self::render_grade_row(0, array()); ?>
                <?php endif; ?>
            </div>
            
            <button type="button" class="button button-primary azytus-add-grade">
                <?php _e('+ Add Grade', 'azytus-toolkit'); ?>
            </button>
        </div>
        
        <script type="text/html" id="azytus-grade-template">
            <?php 
            // Output template without calculations
            ob_start();
            self::render_grade_row('{{INDEX}}', array(), true);
            echo ob_get_clean();
            ?>
        </script>
        
        <script type="text/html" id="azytus-pack-size-template">
            <?php 
            // Output template without calculations
            ob_start();
            self::render_pack_size_row('{{GRADE_INDEX}}', '{{PACK_INDEX}}', array(), true);
            echo ob_get_clean();
            ?>
        </script>
        <?php
    }
    
    /**
     * Render single grade row
     */
    private static function render_grade_row($index, $data, $is_template = false) {
        $grade_name = isset($data['grade_name']) ? $data['grade_name'] : '';
        $product_code = isset($data['product_code']) ? $data['product_code'] : '';
        $grade_category_id = isset($data['grade_category_id']) ? $data['grade_category_id'] : '';
        $pack_sizes = isset($data['pack_sizes']) && is_array($data['pack_sizes']) ? $data['pack_sizes'] : array();
        $grade_categories = $is_template ? array() : self::get_grade_categories();
        
        // For templates, don't calculate index + 1
        $display_number = $is_template ? '{{INDEX_PLUS_1}}' : ($index + 1);
        
        ?>
        <div class="azytus-grade-row" data-index="<?php echo esc_attr($index); ?>">
            <div class="azytus-grade-header">
                <div class="azytus-grade-drag-handle">
                    <span class="dashicons dashicons-menu"></span>
                    <h4 style="margin: 0;"><?php _e('Grade', 'azytus-toolkit'); ?> #<span class="grade-number"><?php echo $is_template ? '{{INDEX_PLUS_1}}' : esc_html($index + 1); ?></span></h4>
                </div>
                <button type="button" class="button azytus-remove-grade"><?php _e('Remove Grade', 'azytus-toolkit'); ?></button>
            </div>
            
            <table class="form-table">
                <tr>
                    <th><label><?php _e('Grade Name', 'azytus-toolkit'); ?> <span class="required">*</span></label></th>
                    <td>
                        <input type="text" name="azytus_grades[<?php echo esc_attr($index); ?>][grade_name]" value="<?php echo esc_attr($grade_name); ?>" class="regular-text" placeholder="e.g., HPLC, AR/ACS, DRYSOLV" required />
                        <p class="description"><?php _e('Enter the grade name (e.g., HPLC, AR/ACS, LR)', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label><?php _e('Product Code', 'azytus-toolkit'); ?> <span class="required">*</span></label></th>
                    <td>
                        <input type="text" name="azytus_grades[<?php echo esc_attr($index); ?>][product_code]" value="<?php echo esc_attr($product_code); ?>" class="regular-text" placeholder="e.g., 10050, 10046" required />
                        <p class="description"><?php _e('Unique product code for this grade', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label><?php _e('Grade Category', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <select name="azytus_grades[<?php echo esc_attr($index); ?>][grade_category_id]" class="azytus-select2 azytus-grade-category-select" style="width: 100%;">
                            <option value=""><?php _e('Select a grade category...', 'azytus-toolkit'); ?></option>
                            <?php if ($is_template): ?>
                                <?php foreach (self::get_grade_categories() as $category): ?>
                                    <option value="<?php echo esc_attr($category->ID); ?>">
                                        <?php echo esc_html($category->post_title); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php foreach ($grade_categories as $category): ?>
                                    <option value="<?php echo esc_attr($category->ID); ?>" <?php selected($grade_category_id, $category->ID); ?>>
                                        <?php echo esc_html($category->post_title); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <p class="description"><?php _e('Assign this grade to a category (e.g., Dry Solvents). Used on the Grade Category page.', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
            </table>
            
            <div class="azytus-pack-sizes-section">
                <h4><?php _e('Pack Sizes', 'azytus-toolkit'); ?></h4>
                <div class="azytus-pack-sizes-wrap">
                    <div class="azytus-pack-sizes-container" data-grade-index="<?php echo esc_attr($index); ?>">
                        <?php if (!$is_template && !empty($pack_sizes)): ?>
                            <?php foreach ($pack_sizes as $pack_index => $pack_size): ?>
                                <?php self::render_pack_size_row($index, $pack_index, $pack_size, false); ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php self::render_pack_size_row($index, 0, array(), $is_template); ?>
                        <?php endif; ?>
                        <div class="azytus-add-pack-button" data-grade-index="<?php echo esc_attr($index); ?>">
                            + <?php _e('Add Pack', 'azytus-toolkit'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    
    /**
     * Render single pack size row
     */
    private static function render_pack_size_row($grade_index, $pack_index, $data, $is_template = false) {
        $pack_size = isset($data['pack_size']) ? $data['pack_size'] : '';
        ?>
        <div class="azytus-pack-size-row" data-pack-index="<?php echo esc_attr($pack_index); ?>">
            <div class="azytus-pack-size-controls">
                <button type="button" class="azytus-pack-control-btn drag-handle" title="Drag to reorder">
                    <span class="dashicons dashicons-move"></span>
                </button>
                <button type="button" class="azytus-pack-control-btn remove-btn azytus-remove-pack-size" title="Remove">
                    <span class="dashicons dashicons-minus"></span>
                </button>
                <button type="button" class="azytus-pack-control-btn add-btn azytus-add-pack-inline" data-grade-index="<?php echo esc_attr($grade_index); ?>" title="Add new pack size">
                    <span class="dashicons dashicons-plus"></span>
                </button>
            </div>
            <input type="text" 
                   name="azytus_grades[<?php echo esc_attr($grade_index); ?>][pack_sizes][<?php echo esc_attr($pack_index); ?>][pack_size]" 
                   value="<?php echo esc_attr($pack_size); ?>" 
                   placeholder="e.g., 500ml, 1L" />
        </div>
        <?php
    }
    
    /**
     * Render COA/Batch Meta Box (Repeatable Batches)
     */
    public static function render_coa_batch_meta_box($post) {
        wp_nonce_field('azytus_coa_batch_meta_box', 'azytus_coa_batch_meta_box_nonce');
        
        // Get saved values
        $product_id = get_post_meta($post->ID, '_azytus_product_id', true);
        $grade_index = get_post_meta($post->ID, '_azytus_grade_index', true);
        $pack_size_index = get_post_meta($post->ID, '_azytus_pack_size_index', true);
        $batches = get_post_meta($post->ID, '_azytus_batches', true);
        
        if (!is_array($batches)) {
            $batches = array();
        }
        
        // Get all products
        $products = get_posts(array(
            'post_type' => 'products',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
            'post_status' => 'publish'
        ));
        
        // Get selected product's grades and pack sizes
        $product_grades = array();
        $pack_sizes = array();
        if ($product_id) {
            $product_grades = get_post_meta($product_id, '_azytus_grades', true);
            if (!is_array($product_grades)) {
                $product_grades = array();
            }
            
            if ($grade_index !== '' && isset($product_grades[$grade_index]['pack_sizes'])) {
                $pack_sizes = $product_grades[$grade_index]['pack_sizes'];
            }
        }
        
        ?>
        <div class="azytus-meta-box">
            <table class="form-table">
                <tr>
                    <th><label for="azytus_product_id"><?php _e('Product', 'azytus-toolkit'); ?> <span class="required">*</span></label></th>
                    <td>
                        <select id="azytus_product_id" name="azytus_product_id" class="azytus-select2 azytus-coa-product-select" required style="width: 100%;">
                            <option value=""><?php _e('Select a product...', 'azytus-toolkit'); ?></option>
                            <?php foreach ($products as $product): ?>
                                <option value="<?php echo esc_attr($product->ID); ?>" <?php selected($product_id, $product->ID); ?>>
                                    <?php echo esc_html($product->post_title); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="description"><?php _e('Select the product for these batch records', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_grade_index"><?php _e('Grade', 'azytus-toolkit'); ?> <span class="required">*</span></label></th>
                    <td>
                        <select id="azytus_grade_index" name="azytus_grade_index" class="azytus-select2 azytus-coa-grade-select" required style="width: 100%;">
                            <option value=""><?php _e('Select a grade...', 'azytus-toolkit'); ?></option>
                            <?php foreach ($product_grades as $idx => $grade): ?>
                                <option value="<?php echo esc_attr($idx); ?>" <?php selected($grade_index, $idx); ?>>
                                    <?php echo esc_html($grade['grade_name']); ?> (<?php echo esc_html($grade['product_code']); ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="description"><?php _e('Select the grade for these batches', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label for="azytus_pack_size_index"><?php _e('Pack Size', 'azytus-toolkit'); ?> <span class="required">*</span></label></th>
                    <td>
                        <select id="azytus_pack_size_index" name="azytus_pack_size_index" class="azytus-select2 azytus-coa-pack-size-select" required style="width: 100%;">
                            <option value=""><?php _e('Select a pack size...', 'azytus-toolkit'); ?></option>
                            <?php foreach ($pack_sizes as $idx => $pack_size): ?>
                                <option value="<?php echo esc_attr($idx); ?>" <?php selected($pack_size_index, $idx); ?>>
                                    <?php echo esc_html($pack_size['pack_size']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <p class="description"><?php _e('Select the pack size for these batches', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
            </table>
            
            <hr />
            
            <div class="azytus-repeatable-wrap">
                <h4><?php _e('Batch Records', 'azytus-toolkit'); ?></h4>
                <div id="azytus-batches-container">
                    <?php if (!empty($batches)): ?>
                        <?php foreach ($batches as $index => $batch): ?>
                            <?php self::render_batch_row($index, $batch); ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php self::render_batch_row(0, array()); ?>
                    <?php endif; ?>
                </div>
                
                <button type="button" class="button button-primary azytus-add-batch">
                    <?php _e('+ Add Batch', 'azytus-toolkit'); ?>
                </button>
            </div>
        </div>
        
        <script type="text/html" id="azytus-batch-template">
            <?php 
            // Output template without calculations
            ob_start();
            self::render_batch_row('{{INDEX}}', array(), true);
            echo ob_get_clean();
            ?>
        </script>
        <?php
    }
    
    /**
     * Render single batch row
     */
    private static function render_batch_row($index, $data, $is_template = false) {
        $batch_no = isset($data['batch_no']) ? $data['batch_no'] : '';
        $coa_id = isset($data['coa']) ? $data['coa'] : '';
        $mfg_date = isset($data['mfg_date']) ? $data['mfg_date'] : '';
        $expiry_date = isset($data['expiry_date']) ? $data['expiry_date'] : '';
        
        ?>
        <div class="azytus-batch-row" data-index="<?php echo esc_attr($index); ?>">
            <div class="azytus-batch-header">
                <div class="azytus-batch-drag-handle">
                    <span class="dashicons dashicons-menu"></span>
                    <h4 style="margin: 0;"><?php _e('Batch', 'azytus-toolkit'); ?> #<span class="batch-number"><?php echo $is_template ? '{{INDEX_PLUS_1}}' : esc_html($index + 1); ?></span></h4>
                </div>
                <button type="button" class="button azytus-remove-batch"><?php _e('Remove Batch', 'azytus-toolkit'); ?></button>
            </div>
            
            <table class="form-table">
                <tr>
                    <th><label><?php _e('Batch Number', 'azytus-toolkit'); ?> <span class="required">*</span></label></th>
                    <td>
                        <input type="text" name="azytus_batches[<?php echo esc_attr($index); ?>][batch_no]" value="<?php echo esc_attr($batch_no); ?>" class="regular-text" placeholder="e.g., BATCH-2024-001" required />
                        <p class="description"><?php _e('Unique batch/lot number', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
                
                <tr>
                    <th><label><?php _e('Manufacturing Date', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <input type="date" name="azytus_batches[<?php echo esc_attr($index); ?>][mfg_date]" value="<?php echo esc_attr($mfg_date); ?>" class="regular-text" />
                    </td>
                </tr>
                
                <tr>
                    <th><label><?php _e('Expiry Date', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <input type="date" name="azytus_batches[<?php echo esc_attr($index); ?>][expiry_date]" value="<?php echo esc_attr($expiry_date); ?>" class="regular-text" />
                    </td>
                </tr>
                
                <tr>
                    <th><label><?php _e('COA (Certificate of Analysis)', 'azytus-toolkit'); ?></label></th>
                    <td>
                        <div class="azytus-file-upload">
                            <input type="hidden" name="azytus_batches[<?php echo esc_attr($index); ?>][coa]" value="<?php echo esc_attr($coa_id); ?>" class="azytus-coa-field" />
                            <button type="button" class="button azytus-upload-button" data-field="azytus_batches[<?php echo esc_attr($index); ?>][coa]">
                                <?php _e('Select/Upload COA PDF', 'azytus-toolkit'); ?>
                            </button>
                            <button type="button" class="button azytus-remove-button" data-field="azytus_batches[<?php echo esc_attr($index); ?>][coa]" style="<?php echo $coa_id ? '' : 'display:none;'; ?>">
                                <?php _e('Remove', 'azytus-toolkit'); ?>
                            </button>
                            <div class="azytus-file-preview">
                                <?php if ($coa_id): ?>
                                    <?php $coa_url = wp_get_attachment_url($coa_id); ?>
                                    <?php $coa_filename = basename(get_attached_file($coa_id)); ?>
                                    <a href="<?php echo esc_url($coa_url); ?>" target="_blank" class="azytus-file-link">
                                        <span class="dashicons dashicons-media-document"></span>
                                        <?php echo esc_html($coa_filename); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="description"><?php _e('Upload or select a PDF file containing Certificate of Analysis', 'azytus-toolkit'); ?></p>
                    </td>
                </tr>
            </table>
        </div>
        <?php
    }
    
    /**
     * Save meta boxes
     */
    public static function save_meta_boxes($post_id, $post) {
        // Check if it's an autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        
        // Check post type
        if (!in_array($post->post_type, array('products', 'batches', 'grades'))) {
            return;
        }
        
        // Check permissions
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        
        // Save based on post type
        switch ($post->post_type) {
            case 'products':
                self::save_product_meta($post_id);
                self::save_product_grades_meta($post_id);
                self::save_product_additional_meta($post_id);
                break;
            case 'batches':
                self::save_coa_batch_meta($post_id);
                break;
            case 'grades':
                self::save_grade_category_meta($post_id);
                break;
        }
    }
    
    /**
     * Save grade category meta
     */
    private static function save_grade_category_meta($post_id) {
        if (!isset($_POST['azytus_grade_category_meta_box_nonce']) || !wp_verify_nonce($_POST['azytus_grade_category_meta_box_nonce'], 'azytus_grade_category_meta_box')) {
            return;
        }
        
        if (isset($_POST['azytus_products_image'])) {
            update_post_meta($post_id, '_azytus_products_image', intval($_POST['azytus_products_image']));
        }
    }
    
    /**
     * Save product meta (basic details)
     */
    private static function save_product_meta($post_id) {
        if (!isset($_POST['azytus_product_meta_box_nonce']) || !wp_verify_nonce($_POST['azytus_product_meta_box_nonce'], 'azytus_product_meta_box')) {
            return;
        }
        
        // Required fields
        $fields = array('cas', 'hsn', 'molecular_formula', 'molecular_weight', 'msds');
        
        foreach ($fields as $field) {
            $key = 'azytus_' . $field;
            if (isset($_POST[$key])) {
                update_post_meta($post_id, '_' . $key, sanitize_text_field($_POST[$key]));
            }
        }
    }
    
    /**
     * Save product additional meta (not displayed on frontend)
     */
    private static function save_product_additional_meta($post_id) {
        if (!isset($_POST['azytus_product_additional_meta_box_nonce']) || !wp_verify_nonce($_POST['azytus_product_additional_meta_box_nonce'], 'azytus_product_additional_meta_box')) {
            return;
        }
        
        // Additional fields (not displayed)
        $fields = array(
            'pictograms_ghs',
            'signal_words',
            'un_number',
            'transport_info',
            'transport_hazard_class',
            'packing_group',
            'product_specification'
        );
        
        foreach ($fields as $field) {
            $key = 'azytus_' . $field;
            if (isset($_POST[$key])) {
                $value = in_array($field, array('transport_info', 'product_specification')) 
                    ? sanitize_textarea_field($_POST[$key]) 
                    : sanitize_text_field($_POST[$key]);
                update_post_meta($post_id, '_' . $key, $value);
            }
        }
    }
    
    /**
     * Save product grades meta (repeatable fields)
     */
    private static function save_product_grades_meta($post_id) {
        if (!isset($_POST['azytus_product_grades_meta_box_nonce']) || !wp_verify_nonce($_POST['azytus_product_grades_meta_box_nonce'], 'azytus_product_grades_meta_box')) {
            return;
        }
        
        $grades = array();
        
        if (isset($_POST['azytus_grades']) && is_array($_POST['azytus_grades'])) {
            foreach ($_POST['azytus_grades'] as $grade_data) {
                $grade = array(
                    'grade_name' => isset($grade_data['grade_name']) ? sanitize_text_field($grade_data['grade_name']) : '',
                    'product_code' => isset($grade_data['product_code']) ? sanitize_text_field($grade_data['product_code']) : '',
                    'grade_category_id' => isset($grade_data['grade_category_id']) ? intval($grade_data['grade_category_id']) : 0,
                    'pack_sizes' => array()
                );
                
                if (isset($grade_data['pack_sizes']) && is_array($grade_data['pack_sizes'])) {
                    foreach ($grade_data['pack_sizes'] as $pack_size_data) {
                        if (isset($pack_size_data['pack_size']) && !empty($pack_size_data['pack_size'])) {
                            $grade['pack_sizes'][] = array(
                                'pack_size' => sanitize_text_field($pack_size_data['pack_size'])
                            );
                        }
                    }
                }
                
                // Only add grade if it has required fields
                if (!empty($grade['grade_name']) && !empty($grade['product_code'])) {
                    $grades[] = $grade;
                }
            }
        }
        
        update_post_meta($post_id, '_azytus_grades', $grades);
    }
    
    /**
     * Save COA/Batch meta
     */
    private static function save_coa_batch_meta($post_id) {
        if (!isset($_POST['azytus_coa_batch_meta_box_nonce']) || !wp_verify_nonce($_POST['azytus_coa_batch_meta_box_nonce'], 'azytus_coa_batch_meta_box')) {
            return;
        }
        
        // Save product, grade, and pack size selection
        if (isset($_POST['azytus_product_id'])) {
            update_post_meta($post_id, '_azytus_product_id', intval($_POST['azytus_product_id']));
        }
        
        if (isset($_POST['azytus_grade_index'])) {
            update_post_meta($post_id, '_azytus_grade_index', intval($_POST['azytus_grade_index']));
        }
        
        if (isset($_POST['azytus_pack_size_index'])) {
            update_post_meta($post_id, '_azytus_pack_size_index', intval($_POST['azytus_pack_size_index']));
        }
        
        // Save batches
        $batches = array();
        
        if (isset($_POST['azytus_batches']) && is_array($_POST['azytus_batches'])) {
            foreach ($_POST['azytus_batches'] as $batch_data) {
                $batch = array(
                    'batch_no' => isset($batch_data['batch_no']) ? sanitize_text_field($batch_data['batch_no']) : '',
                    'mfg_date' => isset($batch_data['mfg_date']) ? sanitize_text_field($batch_data['mfg_date']) : '',
                    'expiry_date' => isset($batch_data['expiry_date']) ? sanitize_text_field($batch_data['expiry_date']) : '',
                    'coa' => isset($batch_data['coa']) ? intval($batch_data['coa']) : 0
                );
                
                // Only add batch if it has required fields
                if (!empty($batch['batch_no'])) {
                    $batches[] = $batch;
                }
            }
        }
        
        update_post_meta($post_id, '_azytus_batches', $batches);
    }
}
