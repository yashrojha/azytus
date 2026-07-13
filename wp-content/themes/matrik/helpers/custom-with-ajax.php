<?php

//load more portfolio
function load_more_project()

{
    $paged                 = sanitize_text_field($_POST['page']);
    $posts_per_page_option = Egns\Helper\Egns_Helper::egns_get_theme_option('posts_per_page_option_project');

    // Check if the posts_per_page_option is 6, then set it to 7
    if ($posts_per_page_option == 9) {
        $posts_per_page_option = 9;
    }

    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => $posts_per_page_option,
        'paged'          => $paged,
    );
    $wp_query = new WP_Query($args);
    $num      = 0;
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()):
            $num++;
            $wp_query->the_post();
?>
            <?php
            echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('project', '/content/archive-content')); ?>

        <?php
        endwhile;
    } else {
        echo esc_html('No data');
    }
    wp_reset_postdata();

    wp_die();
}

add_action('wp_ajax_load_more_project', 'load_more_project');
add_action('wp_ajax_nopriv_load_more_project', 'load_more_project');


//load more infoflow
function load_more_project_infoflow()

{
    $posts_per_page_option = Egns\Helper\Egns_Helper::egns_get_theme_option('posts_per_page_option_project');
    $paged                 = sanitize_text_field($_POST['page']);

    // Check if the posts_per_page_option is 6, then set it to 7
    if ($posts_per_page_option == 12) {
        $posts_per_page_option = 12;
    }

    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => $posts_per_page_option,
        'paged'          => $paged,
    );
    $wp_query = new WP_Query($args);
    $num      = 0;
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()):
            $num++;
            $wp_query->the_post();
        ?>
            <?php
            echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('project', '/content/archive-infoflow')); ?>

        <?php
        endwhile;
    } else {
        echo esc_html('No data');
    }
    wp_reset_postdata();

    wp_die();
}

add_action('wp_ajax_load_more_project_infoflow', 'load_more_project_infoflow');
add_action('wp_ajax_nopriv_load_more_project_infoflow', 'load_more_project_infoflow');


//load more infoflow
function load_more_project_text_down()

{
    $posts_per_page_option = Egns\Helper\Egns_Helper::egns_get_theme_option('posts_per_page_option_project_text_down');
    $paged                 = sanitize_text_field($_POST['page']);

    // Check if the posts_per_page_option is 6, then set it to 7
    if ($posts_per_page_option == 8) {
        $posts_per_page_option = 8;
    }

    $args = array(
        'post_type'      => 'project',
        'posts_per_page' => $posts_per_page_option,
        'paged'          => $paged,
    );
    $wp_query = new WP_Query($args);
    $num      = 0;
    if ($wp_query->have_posts()) {
        $index       = 0;
        $classes     = array('col-xl-4 col-lg-4 col-md-6', 'col-xl-3 col-lg-4 col-md-6', 'col-xl-5 col-lg-4 col-md-6', 'col-lg-8 col-md-6', 'col-lg-4 col-md-6', 'col-xl-4 col-lg-4 col-md-6', 'col-xl-3 col-lg-4 col-md-6', 'col-xl-5 col-lg-4 col-md-6');
        $class_count = count($classes);
        while ($wp_query->have_posts()):
            $num++;
            $wp_query->the_post();
            $class = $classes[$index % $class_count];
            $index++;  // Increment the index counter after each loop
        ?>
            <div class="<?php echo esc_attr($class); ?> wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                <?php
                echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('project', '/content/archive-text-down')); ?>
            </div>
        <?php
        endwhile;
    } else {
        echo esc_html('No data');
    }
    wp_reset_postdata();

    wp_die();
}

add_action('wp_ajax_load_more_project_text_down', 'load_more_project_text_down');
add_action('wp_ajax_nopriv_load_more_project_text_down', 'load_more_project_text_down');


//load more infoflow
function load_more_materials()

{
    $posts_per_page_option = Egns\Helper\Egns_Helper::egns_get_theme_option('posts_per_page_option_material');
    $paged                 = sanitize_text_field($_POST['page']);

    // Check if the posts_per_page_option is 6, then set it to 7
    if ($posts_per_page_option == 8) {
        $posts_per_page_option = 8;
    }

    $args = array(
        'post_type'      => 'materials',
        'posts_per_page' => $posts_per_page_option,
        'paged'          => $paged,
    );
    $wp_query = new WP_Query($args);
    $num      = 0;
    if ($wp_query->have_posts()) {

        while ($wp_query->have_posts()):
            $num++;
            $wp_query->the_post();
        ?>
            <?php
            echo apply_filters('egns_filter_blog_single_template', Egns\Helper\Egns_Helper::egns_get_template_part('materials', 'content/archive-content')); ?>
<?php
        endwhile;
    } else {
        echo esc_html('No data');
    }
    wp_reset_postdata();

    wp_die();
}

add_action('wp_ajax_load_more_materials', 'load_more_materials');
add_action('wp_ajax_nopriv_load_more_materials', 'load_more_materials');




// Function to add a search query to recent searches
function add_recent_search($query)
{
    // Trim the search query to remove leading and trailing spaces
    $query = trim($query);

    // Check if the query is not empty
    if (!empty($query)) {
        $recent_searches = get_option('recent_searches', array());

        // Remove any existing occurrences of the query
        $recent_searches = array_diff($recent_searches, array($query));

        // Add the query to the beginning of the array
        array_unshift($recent_searches, $query);

        // Limit the number of recent searches, adjust as needed
        $max_recent_searches = 10;

        // Trim the array to the maximum allowed size
        $recent_searches = array_slice($recent_searches, 0, $max_recent_searches);

        // Update the option
        update_option('recent_searches', $recent_searches);
    }
}

// Function to get recent searches
function get_recent_searches()
{
    return get_option('recent_searches', array());
}

// Call add_recent_search whenever a search is performed
if (isset($_GET['s'])) {
    $search_query = sanitize_text_field($_GET['s']);
    add_recent_search($search_query);
}

// AJAX handler to clear search history
function clear_search_history()
{
    delete_option('recent_searches');
    wp_send_json_success();
}
add_action('wp_ajax_clear_search_history', 'clear_search_history');
