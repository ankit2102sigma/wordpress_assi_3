<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'astra-theme-css' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

function social_media_button_shortcode($atts) {
    $a = shortcode_atts( array(
        'platform' => '',
    ), $atts );

    if ($a['platform'] == 'twitter') {
        return '<a href="https://twitter.com/share" class="twitter-share-button"><button>Share on Twitter</button></a>';
    } elseif ($a['platform'] == 'facebook') {
        return '<div class="fb-share-button" data-href="' . get_permalink() . '" data-layout="button" data-size="small"><button>Share on Facebook</button></div>';
    } else {
        return '';
    }
}
add_shortcode('social_media_button', 'social_media_button_shortcode');

function popup_on_homepage() {
    if (is_home()) {
        add_action('wp_footer', 'show_popup');
    }
}
add_action('wp', 'popup_on_homepage');


// END ENQUEUE PARENT ACTION
