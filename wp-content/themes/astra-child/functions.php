<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('child_theme_configurator_css')) :
    function child_theme_configurator_css()
    {
        wp_enqueue_style('chld_thm_cfg_child', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', array('astra-theme-css'));
    }
endif;
add_action('wp_enqueue_scripts', 'child_theme_configurator_css', 10);

function social_media_button_shortcode($atts)
{
    $a = shortcode_atts(array(
        'platform' => '',
    ), $atts);

    if ($a['platform'] == 'twitter') {
        return '<a href="https://twitter.com/share" class="twitter-share-button"><button>Share on Twitter</button></a>';
    } elseif ($a['platform'] == 'facebook') {
        return '<div class="fb-share-button" data-href="' . get_permalink() . '" data-layout="button" data-size="small"><button>Share on Facebook</button></div>';
    } else {
        return '';
    }
}
add_shortcode('social_media_button', 'social_media_button_shortcode');

function popup_on_homepage()
{
    if (is_home()) {
        add_action('wp_footer', 'show_popup');
    }
}
add_action('wp', 'popup_on_homepage');

//@testimonial

function create_testimonial_post_type()
{
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonials',
        'not_found' =>  'No Testimonials found',
        'not_found_in_trash' => 'No Testimonials in the trash',
        'parent_item_colon' => '',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'create_testimonial_post_type');

function testimonials_meta_boxes()
{
    add_meta_box('testimonials_details', 'Testimonial Details', 'testimonials_details_callback', 'testimonials', 'normal', 'high');
}

function testimonials_details_callback($post)
{
    wp_nonce_field('testimonials_save_meta', 'testimonials_meta_nonce');

    $testimonial_name = get_post_meta($post->ID, '_testimonial_name', true);
    $testimonial_company = get_post_meta($post->ID, '_testimonial_company', true);
    $testimonial_url = get_post_meta($post->ID, '_testimonial_url', true);
?>

    <p>
        <label for="testimonial_name">Name:</label>
        <input type="text" name="testimonial_name" id="testimonial_name" value="<?php echo esc_attr($testimonial_name); ?>" />
    </p>

    <p>
        <label for="testimonial_company">Company:</label>
        <input type="text" name="testimonial_company" id="testimonial_company" value="<?php echo esc_attr($testimonial_company); ?>" />
    </p>

    <p>
        <label for="testimonial_url">URL:</label>
        <input type="text" name="testimonial_url" id="testimonial_url" value="<?php echo esc_url($testimonial_url); ?>" />
    </p>

<?php
}

function testimonials_save_meta($post_id)
{
    if (!isset($_POST['testimonials_meta_nonce']) || !wp_verify_nonce($_POST['testimonials_meta_nonce'], 'testimonials_save_meta')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $testimonial_name = isset($_POST['testimonial_name']) ? sanitize_text_field($_POST['testimonial_name']) : '';
    $testimonial_company = isset($_POST['testimonial_company']) ? sanitize_text_field($_POST['testimonial_company']) : '';
    $testimonial_url = isset($_POST['testimonial_url']) ? esc_url_raw($_POST['testimonial_url']) : '';

    update_post_meta($post_id, '_testimonial_name', $testimonial_name);
    update_post_meta($post_id, '_testimonial_company', $testimonial_company);
    update_post_meta($post_id, '_testimonial_url', $testimonial_url);
}

add_action('add_meta_boxes', 'testimonials_meta_boxes');
add_action('save_post', 'testimonials_save_meta');

//@testimonial side bar 

function testimonials_slider_shortcode()
{
    $query = new WP_Query(array(
        'post_type' => 'testimonial',
        'posts_per_page' => -1,
    ));

    $output = '<div class="testimonial-slider">';

    while ($query->have_posts()) {
        $query->the_post();
        $output .= '<div class="testimonial-slide">';
        $output .= '<blockquote>';
        $output .= get_the_content();
        $output .= '<cite>' . get_the_title() . '</cite>';
        $output .= '</blockquote>';
        $output .= '</div>';
    }

    $output .= '</div>';

    wp_reset_postdata();

    return $output;
}
add_shortcode('testimonials-slider', 'testimonials_slider_shortcode');


// @Calling testimonial-slider.js

function enqueue_testimonial_slider_script()
{
    wp_enqueue_script('testimonial-slider', get_stylesheet_directory_uri() . '/js/testimonial-slider.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_testimonial_slider_script');


// @MOVIES

function create_movie_post_type()
{
    $labels = array(
        'name' => __('Movies'),
        'singular_name' => __('Movie'),
        'menu_name' => __('Movies'),
        'all_items' => __('All Movies'),
        'add_new_item' => __('Add New Movie'),
        'edit_item' => __('Edit Movie'),
        'new_item' => __('New Movie'),
        'view_item' => __('View Movie'),
        'search_items' => __('Search Movies'),
        'not_found' => __('No movies found'),
        'not_found_in_trash' => __('No movies found in trash'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' => array('movie_category'),
    );

    register_post_type('movie', $args);
}
add_action('init', 'create_movie_post_type');

function create_movie_category_taxonomy()
{
    $labels = array(
        'name' => __('Movie Categories'),
        'singular_name' => __('Movie Category'),
        'menu_name' => __('Categories'),
        'all_items' => __('All Categories'),
        'edit_item' => __('Edit Category'),
        'view_item' => __('View Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'search_items' => __('Search Categories'),
        'popular_items' => __('Popular Categories'),
        'not_found' => __('No categories found'),
        'no_terms' => __('No categories'),
        'items_list' => __('Categories list'),
        'items_list_navigation' => __('Categories list navigation'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'movie-category'),
    );

    register_taxonomy('movie_category', array('movie'), $args);
}
add_action('init', 'create_movie_category_taxonomy', 0);
