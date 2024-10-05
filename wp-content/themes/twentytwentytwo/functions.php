<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );
	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';


function display_hotels() {
    global $wpdb;
    
    $results = $wpdb->get_results("SELECT * FROM hotels");

    $output = '<div class="hotel-list">';

    foreach ($results as $hotel) {
        $output .= '<div class="hotel">';
        $output .= '<h2>' . esc_html($hotel->hotel_name) . '</h2>';
        $output .= '<p>Standard Room: $' . esc_html($hotel->room_standard_price) . '</p>';
        $output .= '<p>Deluxe Room: $' . esc_html($hotel->room_deluxe_price) . '</p>';
        $output .= '<p>Premium Room: $' . esc_html($hotel->room_premium_price) . '</p>';
        $output .= '<p>Address: ' . esc_html($hotel->address) . '</p>';
        $output .= '<p>Contact: ' . esc_html($hotel->contact_info) . '</p>';
        $output .= '</div>';
    }

    $output .= '</div>';

    return $output;
}
add_shortcode('hotel_list', 'display_hotels');