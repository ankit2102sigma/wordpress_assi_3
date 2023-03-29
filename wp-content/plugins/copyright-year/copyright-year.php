<?php
/**
 * Plugin Name: Copyright Year
 * Plugin URI: https://www.sigmainfo.net/
 * Description: Plugin that adds a dynamic year to the copyright text in the footer of your website.
 * Version: 1.0
 * Author: Ankit Arora
 * Author URI: https://www.sigmainfo.net/
 */

function dynamic_year_shortcode() {
    $start_year = 2021; // Change this to the year your website was created
    $current_year = date('Y');
    if ($current_year > $start_year) {
        return "Copyright@". $current_year;
    } else {
        return "Copyright@".$start_year;
    }
}
add_shortcode('dynamic_year', 'dynamic_year_shortcode');
?>
