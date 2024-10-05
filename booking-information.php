<?php
// Load WordPress environment to use database functions
define('WP_USE_THEMES', false);
require('wp-load.php'); // Adjust path if necessary

global $wpdb;

// Start session to get the logged-in user's username
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please log in to proceed with the booking.'); window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/13-2/';</script>";
    exit;
}

$username = $_SESSION['username']; // Get the logged-in user's username

// Get hotel_name, room_type, price, and availability from the URL
$hotel_name = isset($_GET['hotel_name']) ? urldecode($_GET['hotel_name']) : null;
$room_type = isset($_GET['room_type']) ? sanitize_text_field($_GET['room_type']) : null;
$price = isset($_GET['price']) ? floatval($_GET['price']) : null;
$available = isset($_GET['available']) ? intval($_GET['available']) : null;

if ($hotel_name && $room_type && $price !== null && $available !== null) {
    // Display booking information
    echo "<h1>Booking Information</h1>";
    echo "<p>Hotel: " . esc_html($hotel_name) . "</p>";
    echo "<p>Room Type: " . esc_html($room_type) . "</p>";
    echo "<p>Price: $" . esc_html($price) . " per night</p>";
    echo "<p>Available: " . esc_html($available) . "</p>";

    // Booking form for customer details, including hold/book option and date selection
    echo '<form method="post">';
    echo '<h2>Customer Details</h2>';
    echo '<label>Name: <input type="text" name="customer_name" required></label><br>';
    echo '<label>Age: <input type="number" name="customer_age" required></label><br>';
    echo '<label>Email: <input type="email" name="customer_email" required></label><br>';
    echo '<label>Shipping Address: <input type="text" name="shipping_address" required></label><br>';
    echo '<label>Billing Address: <input type="text" name="billing_address" required></label><br>';
    echo '<label>Primary Contact Number: <input type="text" name="primary_contact_number" required></label><br>';
    echo '<label>Secondary Contact Number: <input type="text" name="secondary_contact_number"></label><br>';
    echo '<label>Passport Number: <input type="text" name="passport_number" required></label><br>';
    echo '<label>Start Date: <input type="date" name="start_date" required></label><br>';
    echo '<label>End Date: <input type="date" name="end_date" required></label><br>';
    echo '<label><input type="radio" name="book_or_hold" value="booked" required> Book</label>';
    echo '<label><input type="radio" name="book_or_hold" value="hold" required> Hold</label><br>';
    echo '<input type="hidden" name="hotel_name" value="' . esc_attr($hotel_name) . '">';
    echo '<input type="hidden" name="room_type" value="' . esc_attr($room_type) . '">';
    echo '<input type="hidden" name="price" value="' . esc_attr($price) . '">';
    echo '<input type="hidden" name="available" value="' . esc_attr($available) . '">';
    echo '<button type="submit" name="confirm_booking">Confirm</button>';
    echo '</form>';

    // Add a Cancel button to go back to hotel list
    echo '<form method="get" action="https://9940-194-127-105-70.ngrok-free.app/hotel-list/">';
    echo '<button type="submit">Cancel</button>';
    echo '</form>';
}

// Handle form submission for booking or hold
if (isset($_POST['confirm_booking'])) {
    // Get customer details
    $customer_name = sanitize_text_field($_POST['customer_name']);
    $customer_age = intval($_POST['customer_age']);
    $customer_email = sanitize_email($_POST['customer_email']);
    $shipping_address = sanitize_text_field($_POST['shipping_address']);
    $billing_address = sanitize_text_field($_POST['billing_address']);
    $primary_contact_number = sanitize_text_field($_POST['primary_contact_number']);
    $secondary_contact_number = sanitize_text_field($_POST['secondary_contact_number']);
    $passport_number = sanitize_text_field($_POST['passport_number']);

    // Get booking details from hidden inputs
    $hotel_name = sanitize_text_field($_POST['hotel_name']);
    $room_type = sanitize_text_field($_POST['room_type']);
    $price = floatval($_POST['price']);
    $available = intval($_POST['available']);
    $book_or_hold = sanitize_text_field($_POST['book_or_hold']);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Check that the end date is at least one day after the start date
    if (strtotime($end_date) <= strtotime($start_date) || (strtotime($end_date) - strtotime($start_date)) < 86400) {
        echo "<script>alert('End date must be at least one day after the start date.'); window.location.href = window.location.href;</script>";
        exit;
    }

    // Calculate total price based on number of nights
    $nights = (strtotime($end_date) - strtotime($start_date)) / 86400;
    $total_price = $nights * $price;

    if ($book_or_hold === 'booked' && $available > 0) {
        // Reduce room availability in the database for bookings
        switch ($room_type) {
            case 'standard':
                $wpdb->query($wpdb->prepare("UPDATE hotels SET room_standard_available = room_standard_available - 1 WHERE hotel_name = %s", $hotel_name));
                break;
            case 'deluxe':
                $wpdb->query($wpdb->prepare("UPDATE hotels SET room_deluxe_available = room_deluxe_available - 1 WHERE hotel_name = %s", $hotel_name));
                break;
            case 'premium':
                $wpdb->query($wpdb->prepare("UPDATE hotels SET room_premium_available = room_premium_available - 1 WHERE hotel_name = %s", $hotel_name));
                break;
        }

        // Send confirmation email for bookings
        $subject = 'Booking Confirmation: ' . $hotel_name;
        $message = "Hi " . $customer_name . ",\n\nYou have successfully booked a " . $room_type . " at " . $hotel_name . " from " . $start_date . " to " . $end_date . ".\n\nTotal Price: $" . $total_price . "\n\nThank you for choosing us!";
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($customer_email, $subject, nl2br($message), $headers);

        echo "<script>alert('Booking confirmed! An email has been sent to your address.'); window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/hotel-list/';</script>";
    } elseif ($book_or_hold === 'hold') {
        // Hold without reducing availability
        echo "<script>alert('Room is held successfully.'); window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/hotel-list/';</script>";
    }

    // Insert booking or hold information into the user_booking_list table
    $wpdb->insert(
        'user_booking_list',
        array(
            'username' => $username,
            'hotel_name' => $hotel_name,
            'room_type' => $room_type,
            'price' => $total_price,
            'book_or_hold' => $book_or_hold,
            'start_date' => $start_date,
            'end_date' => $end_date
        ),
        array('%s', '%s', '%s', '%f', '%s', '%s', '%s')
    );
}
?>
