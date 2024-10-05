<?php
// Include WordPress to use database functions
define('WP_USE_THEMES', false);
require('wp-load.php');  // Ensure this path is correct based on your file location

global $wpdb;

// Get hotel ID and room type from the AJAX request
$hotel_id = intval($_POST['hotel_id']);
$room_type = sanitize_text_field($_POST['room_type']);

// Check the availability based on room type
switch ($room_type) {
    case 'standard':
        $available_rooms = $wpdb->get_var("SELECT room_standard_available FROM hotels WHERE id = $hotel_id");
        break;
    case 'deluxe':
        $available_rooms = $wpdb->get_var("SELECT room_deluxe_available FROM hotels WHERE id = $hotel_id");
        break;
    case 'premium':
        $available_rooms = $wpdb->get_var("SELECT room_premium_available FROM hotels WHERE id = $hotel_id");
        break;
    default:
        $available_rooms = 0;
        break;
}

// Return result based on availability
if ($available_rooms > 0) {
    echo "available";
} else {
    echo "unavailable";
}

exit;
