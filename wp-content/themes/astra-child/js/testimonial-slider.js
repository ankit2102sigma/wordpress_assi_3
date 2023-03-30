function my_scripts() {
    wp_enqueue_script('testimonial-slider', get_template_directory_uri() . '/js/testimonial-slider.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_scripts');
