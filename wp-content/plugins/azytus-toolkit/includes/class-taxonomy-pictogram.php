<?php
/**
 * Pictogram taxonomy (title + required image) for products.
 */

if (!defined('ABSPATH')) {
    exit;
}

class Azytus_Taxonomy_Pictogram {

    const TAXONOMY = 'pictogram';
    const META_IMAGE = '_azytus_pictogram_image';

    /**
     * Initialize hooks.
     */
    public static function init() {
        add_action('init', array(__CLASS__, 'register_taxonomy'));

        add_action(self::TAXONOMY . '_add_form_fields', array(__CLASS__, 'render_add_image_field'));
        add_action(self::TAXONOMY . '_edit_form_fields', array(__CLASS__, 'render_edit_image_field'), 10, 1);
        add_action('created_' . self::TAXONOMY, array(__CLASS__, 'save_image_meta'));
        add_action('edited_' . self::TAXONOMY, array(__CLASS__, 'save_image_meta'));
        add_filter('pre_insert_term', array(__CLASS__, 'validate_image_on_create'), 10, 2);
        add_action('admin_notices', array(__CLASS__, 'maybe_show_image_required_notice'));

        add_filter('manage_edit-' . self::TAXONOMY . '_columns', array(__CLASS__, 'add_image_column'));
        add_filter('manage_' . self::TAXONOMY . '_custom_column', array(__CLASS__, 'render_image_column'), 10, 3);
    }

    /**
     * Register pictogram taxonomy for products.
     */
    public static function register_taxonomy() {
        $labels = array(
            'name' => _x('Pictograms', 'Taxonomy General Name', 'azytus-toolkit'),
            'singular_name' => _x('Pictogram', 'Taxonomy Singular Name', 'azytus-toolkit'),
            'menu_name' => __('Pictograms', 'azytus-toolkit'),
            'all_items' => __('All Pictograms', 'azytus-toolkit'),
            'edit_item' => __('Edit Pictogram', 'azytus-toolkit'),
            'view_item' => __('View Pictogram', 'azytus-toolkit'),
            'update_item' => __('Update Pictogram', 'azytus-toolkit'),
            'add_new_item' => __('Add New Pictogram', 'azytus-toolkit'),
            'new_item_name' => __('New Pictogram Name', 'azytus-toolkit'),
            'search_items' => __('Search Pictograms', 'azytus-toolkit'),
            'popular_items' => __('Popular Pictograms', 'azytus-toolkit'),
            'not_found' => __('No pictograms found.', 'azytus-toolkit'),
            'back_to_items' => __('← Back to Pictograms', 'azytus-toolkit'),
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => false,
            'public' => false,
            'publicly_queryable' => false,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => false,
            'show_in_menu' => true,
            'show_tagcloud' => false,
            'show_in_rest' => true,
            'meta_box_cb' => false,
            'rewrite' => false,
            'query_var' => false,
        );

        register_taxonomy(self::TAXONOMY, array(Azytus_Post_Types::POST_TYPE_PRODUCTS), $args);
    }

    /**
     * Image field on Add Pictogram screen.
     */
    public static function render_add_image_field() {
        ?>
        <div class="form-field term-image-wrap azytus-pictogram-image-field">
            <label for="azytus_pictogram_image"><?php esc_html_e('Image', 'azytus-toolkit'); ?> <span class="required">*</span></label>
            <div class="azytus-file-upload azytus-image-upload">
                <input type="hidden" id="azytus_pictogram_image" name="azytus_pictogram_image" value="" />
                <button type="button" class="button azytus-upload-button azytus-image-upload-button" data-field="azytus_pictogram_image" data-file-type="image">
                    <?php esc_html_e('Upload / Select Image', 'azytus-toolkit'); ?>
                </button>
                <button type="button" class="button azytus-remove-button" data-field="azytus_pictogram_image" style="display:none;">
                    <?php esc_html_e('Remove', 'azytus-toolkit'); ?>
                </button>
                <div class="azytus-file-preview"></div>
            </div>
            <p><?php esc_html_e('Required. Shown on product pages at 65×65px.', 'azytus-toolkit'); ?></p>
        </div>
        <?php
    }

    /**
     * Image field on Edit Pictogram screen.
     *
     * @param WP_Term $term Term object.
     */
    public static function render_edit_image_field($term) {
        $image_id = self::get_term_image_id($term->term_id);
        $preview = '';
        if ($image_id) {
            $preview = wp_get_attachment_image($image_id, 'thumbnail', false, array(
                'style' => 'max-width:120px;height:auto;',
            ));
        }
        ?>
        <tr class="form-field term-image-wrap azytus-pictogram-image-field">
            <th scope="row">
                <label for="azytus_pictogram_image"><?php esc_html_e('Image', 'azytus-toolkit'); ?> <span class="required">*</span></label>
            </th>
            <td>
                <div class="azytus-file-upload azytus-image-upload">
                    <input type="hidden" id="azytus_pictogram_image" name="azytus_pictogram_image" value="<?php echo esc_attr($image_id); ?>" />
                    <button type="button" class="button azytus-upload-button azytus-image-upload-button" data-field="azytus_pictogram_image" data-file-type="image">
                        <?php esc_html_e('Upload / Select Image', 'azytus-toolkit'); ?>
                    </button>
                    <button type="button" class="button azytus-remove-button" data-field="azytus_pictogram_image" style="<?php echo $image_id ? '' : 'display:none;'; ?>">
                        <?php esc_html_e('Remove', 'azytus-toolkit'); ?>
                    </button>
                    <div class="azytus-file-preview"><?php echo $preview; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
                </div>
                <p class="description"><?php esc_html_e('Required. Shown on product pages at 65×65px.', 'azytus-toolkit'); ?></p>
            </td>
        </tr>
        <?php
    }

    /**
     * Require an image when creating a pictogram term.
     *
     * @param string|WP_Error $term     Term name or error.
     * @param string          $taxonomy Taxonomy slug.
     * @return string|WP_Error
     */
    public static function validate_image_on_create($term, $taxonomy) {
        if ($taxonomy !== self::TAXONOMY || is_wp_error($term)) {
            return $term;
        }

        $image_id = isset($_POST['azytus_pictogram_image']) ? absint($_POST['azytus_pictogram_image']) : 0;
        if (!$image_id) {
            return new WP_Error(
                'azytus_pictogram_image_required',
                __('A pictogram image is required.', 'azytus-toolkit')
            );
        }

        return $term;
    }

    /**
     * Save or enforce image meta on create/edit.
     *
     * @param int $term_id Term ID.
     */
    public static function save_image_meta($term_id) {
        if (!isset($_POST['azytus_pictogram_image'])) {
            return;
        }

        if (!current_user_can('edit_term', $term_id)) {
            return;
        }

        $image_id = absint($_POST['azytus_pictogram_image']);

        if (!$image_id) {
            // Keep existing image if present; otherwise flag for notice.
            $existing = self::get_term_image_id($term_id);
            if ($existing) {
                return;
            }
            set_transient('azytus_pictogram_image_required_' . get_current_user_id(), 1, 45);
            return;
        }

        update_term_meta($term_id, self::META_IMAGE, $image_id);
    }

    /**
     * Admin notice when image was cleared/missing on edit.
     */
    public static function maybe_show_image_required_notice() {
        $key = 'azytus_pictogram_image_required_' . get_current_user_id();
        if (!get_transient($key)) {
            return;
        }
        delete_transient($key);
        ?>
        <div class="notice notice-error is-dismissible">
            <p><?php esc_html_e('A pictogram image is required. Please upload an image.', 'azytus-toolkit'); ?></p>
        </div>
        <?php
    }

    /**
     * Add Image column to term list.
     *
     * @param array $columns Columns.
     * @return array
     */
    public static function add_image_column($columns) {
        $new = array();
        foreach ($columns as $key => $label) {
            if ($key === 'name') {
                $new['azytus_image'] = __('Image', 'azytus-toolkit');
            }
            $new[$key] = $label;
        }
        return $new;
    }

    /**
     * Render Image column.
     *
     * @param string $content     Column content.
     * @param string $column_name Column name.
     * @param int    $term_id     Term ID.
     * @return string
     */
    public static function render_image_column($content, $column_name, $term_id) {
        if ($column_name !== 'azytus_image') {
            return $content;
        }

        $image_id = self::get_term_image_id($term_id);
        if (!$image_id) {
            return '—';
        }

        return wp_get_attachment_image($image_id, array(40, 40), false, array(
            'style' => 'width:40px;height:40px;object-fit:contain;',
        ));
    }

    /**
     * Get image attachment ID for a term.
     *
     * @param int $term_id Term ID.
     * @return int
     */
    public static function get_term_image_id($term_id) {
        return absint(get_term_meta($term_id, self::META_IMAGE, true));
    }

    /**
     * Get image URL for a term.
     *
     * @param int    $term_id Term ID.
     * @param string $size    Image size.
     * @return string
     */
    public static function get_term_image_url($term_id, $size = 'thumbnail') {
        $image_id = self::get_term_image_id($term_id);
        if (!$image_id) {
            return '';
        }
        $url = wp_get_attachment_image_url($image_id, $size);
        return $url ? $url : '';
    }

    /**
     * All pictogram terms with image data for dropdowns.
     *
     * @return array<int, array{id:int,name:string,image_id:int,image_url:string}>
     */
    public static function get_pictograms_for_dropdown() {
        $terms = get_terms(array(
            'taxonomy' => self::TAXONOMY,
            'hide_empty' => false,
            'orderby' => 'name',
            'order' => 'ASC',
        ));

        if (is_wp_error($terms) || empty($terms)) {
            return array();
        }

        $items = array();
        foreach ($terms as $term) {
            $image_id = self::get_term_image_id($term->term_id);
            $items[] = array(
                'id' => (int) $term->term_id,
                'name' => $term->name,
                'image_id' => $image_id,
                'image_url' => $image_id ? (string) wp_get_attachment_image_url($image_id, 'thumbnail') : '',
            );
        }

        return $items;
    }

    /**
     * Pictograms assigned to a product (with images).
     *
     * @param int $product_id Product post ID.
     * @return array<int, array{id:int,name:string,image_id:int,image_html:string}>
     */
    public static function get_product_pictograms($product_id) {
        $terms = get_the_terms($product_id, self::TAXONOMY);
        if (!$terms || is_wp_error($terms)) {
            return array();
        }

        $items = array();
        foreach ($terms as $term) {
            $image_id = self::get_term_image_id($term->term_id);
            if (!$image_id) {
                continue;
            }
            $items[] = array(
                'id' => (int) $term->term_id,
                'name' => $term->name,
                'image_id' => $image_id,
                'image_html' => wp_get_attachment_image($image_id, array(65, 65), false, array(
                    'class' => 'azytus-pp-pictogram__img',
                    'alt' => $term->name,
                    'width' => 65,
                    'height' => 65,
                )),
            );
        }

        return $items;
    }
}
