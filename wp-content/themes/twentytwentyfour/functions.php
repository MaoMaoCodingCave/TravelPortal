<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );


// Function to display hotel list with search and filter functionality including room type selection and booking
function display_hotels_with_booking_and_filter() {
    global $wpdb;


    // Start the session to get the logged-in user's name
    session_start();
    if (!isset($_SESSION['username'])) {
        // echo "<script>alert('Please log in to access this page.'); window.location.href = 'http://localhost/wordpress/13-2/';</script>";
        echo "<script>alert('Please log in to access this page.'); window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/13-2/';</script>";
        exit;
    }

    // Initialize output variable
    $output = '';

    // Get the search and filter inputs from the form
    $hotel_name = isset($_POST['hotel_name']) ? sanitize_text_field($_POST['hotel_name']) : '';
    $city = isset($_POST['city']) ? sanitize_text_field($_POST['city']) : '';
    $star_rating = isset($_POST['star_rating']) ? intval($_POST['star_rating']) : '';

    // Build the SQL query based on the filters
    $query = "SELECT * FROM hotels WHERE 1=1";
    
    if (!empty($hotel_name)) {
        $query .= $wpdb->prepare(" AND hotel_name LIKE %s", '%' . $hotel_name . '%');
    }
    if (!empty($city)) {
        $query .= $wpdb->prepare(" AND address LIKE %s", '%' . $city . '%');
    }
    if (!empty($star_rating)) {
        $query .= $wpdb->prepare(" AND star_rating = %d", $star_rating);
    }

    // Execute the query and get the results
    $results = $wpdb->get_results($query);

    // Display the search and filter form
    $output .= '
    <form method="post">
        <label for="hotel_name">Hotel Name:</label>
        <input type="text" name="hotel_name" value="' . esc_attr($hotel_name) . '">

        <label for="city">City:</label>
        <input type="text" name="city" value="' . esc_attr($city) . '">

        <label for="star_rating">Star Rating:</label>
        <select name="star_rating">
            <option value="">Any</option>
            <option value="3" ' . selected($star_rating, 3, false) . '>3 Stars</option>
            <option value="4" ' . selected($star_rating, 4, false) . '>4 Stars</option>
            <option value="5" ' . selected($star_rating, 5, false) . '>5 Stars</option>
        </select>

        <button type="submit">Search</button>
    </form>
    ';

    // Display the filtered hotel list with room type selection
    if ($results) {
        $output .= '<div class="hotel-list">';
        foreach ($results as $hotel) {
            $output .= '<div class="hotel">';
            $output .= '<h2>' . esc_html($hotel->hotel_name) . '</h2>';
            $output .= '<p>Address: ' . esc_html($hotel->address) . '</p>';
            $output .= '<p>Star Rating: ' . esc_html($hotel->star_rating) . ' stars</p>';

            // Room type selection for each room
            $output .= '<form method="post">';
            $output .= '<label><input type="radio" name="room_type" value="standard" data-hotel="' . esc_attr($hotel->hotel_name) . '" data-price="' . esc_html($hotel->room_standard_price) . '" data-available="' . esc_html($hotel->room_standard_available) . '"> Standard Room: $' . esc_html($hotel->room_standard_price) . ' - Available: ' . esc_html($hotel->room_standard_available) . '</label><br>';
            $output .= '<label><input type="radio" name="room_type" value="deluxe" data-hotel="' . esc_attr($hotel->hotel_name) . '" data-price="' . esc_html($hotel->room_deluxe_price) . '" data-available="' . esc_html($hotel->room_deluxe_available) . '"> Deluxe Room: $' . esc_html($hotel->room_deluxe_price) . ' - Available: ' . esc_html($hotel->room_deluxe_available) . '</label><br>';
            $output .= '<label><input type="radio" name="room_type" value="premium" data-hotel="' . esc_attr($hotel->hotel_name) . '" data-price="' . esc_html($hotel->room_premium_price) . '" data-available="' . esc_html($hotel->room_premium_available) . '"> Premium Room: $' . esc_html($hotel->room_premium_price) . ' - Available: ' . esc_html($hotel->room_premium_available) . '</label><br>';
            $output .= '</form>';
            $output .= '</div>';
        }
        $output .= '</div>';

        // Add JavaScript to handle room type selection and Book Now button
        $output .= '
        <script>
            var selectedHotel = null;
            var selectedRoomType = null;
            var selectedPrice = null;
            var selectedAvailable = null;

            // Ensure only one room type can be selected across all hotels
            document.querySelectorAll("input[name=\'room_type\']").forEach(function(el) {
                el.addEventListener("change", function() {
                    selectedHotel = this.getAttribute("data-hotel");
                    selectedRoomType = this.value;
                    selectedPrice = this.getAttribute("data-price");
                    selectedAvailable = this.getAttribute("data-available");

                    document.querySelectorAll("input[name=\'room_type\']").forEach(function(otherEl) {
                        if (otherEl !== el) {
                            otherEl.checked = false;
                        }
                    });
                });
            });

            function bookNow() {
                if (!selectedRoomType || !selectedHotel) {
                    alert("Please select a room type.");
                    return;
                }
                
                window.location.href = "https://9940-194-127-105-70.ngrok-free.app/booking-information.php?hotel_name=" + encodeURIComponent(selectedHotel) + "&room_type=" + encodeURIComponent(selectedRoomType) + "&price=" + selectedPrice + "&available=" + selectedAvailable;
            }
        </script>';

        // Add Book Now button
        $output .= '<div style="text-align: center; margin-top: 20px;">';
        $output .= '<button type="button" onclick="bookNow()">Book Now</button>';
        $output .= '</div>';
    } else {
        $output .= '<p>No hotels found matching your criteria.</p>';
    }

    return $output;
}

// Shortcode to display the hotel list with booking, filtering, and room type selection
add_shortcode('hotel_list_with_booking_and_filter', 'display_hotels_with_booking_and_filter');



// window.location.href = "http://localhost/wordpress/booking-information.php?hotel_name=" + encodeURIComponent(hotelName) + "&room_type=" + encodeURIComponent(roomTypeValue) + "&price=" + roomPrice + "&available=" + availableRooms;


// Function to handle CSV upload and update hotel database
function update_hotel_page() {
    global $wpdb;
    $output = '';

    // Start session to get the logged-in user's username
    session_start();
    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in to access this page.'); window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/13-2/';</script>";
        exit;
    }

    // Get the logged-in user's username from session
    $username = $_SESSION['username'];

    // Get the is_admin status from the users table based on the logged-in username
    $user_info = $wpdb->get_row($wpdb->prepare("SELECT is_admin FROM users WHERE name = %s", $username));

    // If the user is not an admin, show an alert and redirect to login page
    if ($user_info && $user_info->is_admin == 0) {
        echo "<script>alert('You do not have permission to access this page.'); window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/13-2/';</script>";
        exit;
    }

    // Handle file upload
    if (isset($_POST['upload_csv'])) {
        if (!empty($_FILES['csv_file']['tmp_name'])) {
            $csv_file = fopen($_FILES['csv_file']['tmp_name'], 'r');
            
            // Skip the first row (header)
            fgetcsv($csv_file);

            // Process the CSV file row by row
            while (($row = fgetcsv($csv_file)) !== FALSE) {
                // Check if the row has the correct number of columns
                if (isset($row[0]) && isset($row[1]) && isset($row[2]) && isset($row[3]) && isset($row[4]) && isset($row[5]) && isset($row[6]) && isset($row[7]) && isset($row[8]) && isset($row[9]) && isset($row[10]) && isset($row[11]) && isset($row[12]) && isset($row[13]) && isset($row[14]) && isset($row[15]) && isset($row[16])) {
                    
                    // Prepare data to update or insert
                    $data = [
                        'hotel_name' => sanitize_text_field($row[0]),
                        'address' => sanitize_text_field($row[1]),
                        'star_rating' => floatval($row[2]),
                        'supplier_contact_name' => sanitize_text_field($row[3]),
                        'contact_email' => sanitize_email($row[4]),
                        'contact_phone_number' => sanitize_text_field($row[5]),
                        'business_registration_number' => sanitize_text_field($row[6]),
                        'hotel_website_url' => esc_url($row[7]),
                        'room_standard_price' => floatval($row[8]),
                        'room_standard_meal_plan' => sanitize_text_field($row[9]),
                        'room_standard_available' => intval($row[10]),
                        'room_deluxe_price' => floatval($row[11]),
                        'room_deluxe_meal_plan' => sanitize_text_field($row[12]),
                        'room_deluxe_available' => intval($row[13]),
                        'room_premium_price' => floatval($row[14]),
                        'room_premium_meal_plan' => sanitize_text_field($row[15]),
                        'room_premium_available' => intval($row[16])
                    ];

                    // Check if hotel already exists in the database
                    $existing_hotel = $wpdb->get_row($wpdb->prepare("SELECT id FROM hotels WHERE hotel_name = %s", $data['hotel_name']));

                    if ($existing_hotel) {
                        // Update existing hotel
                        $wpdb->update('hotels', $data, ['id' => $existing_hotel->id]);
                    } else {
                        // Insert new hotel
                        $wpdb->insert('hotels', $data);
                    }
                }
            }
            fclose($csv_file);
            $output .= '<p>Database updated successfully.</p>';
        } else {
            $output .= '<p>Please upload a valid CSV file.</p>';
        }
    }

    // Display the upload form
    $output .= '
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="csv_file" accept=".csv" required>
        <button type="submit" name="upload_csv">Upload and Update</button>
    </form>';

    return $output;
}

// Shortcode to display the update hotel page
add_shortcode('update_hotel', 'update_hotel_page');




// Function to handle user registration and send OTP
function register_user_shortcode() {
    global $wpdb;

    // Check if OTP is submitted
    if (isset($_POST['verify_otp'])) {
        $entered_otp = sanitize_text_field($_POST['otp']);
        session_start();
        
        // Verify if OTP matches
        if ($_SESSION['otp'] == $entered_otp) {
            // OTP is correct, insert user into the database
            $username = $_SESSION['username'];
            $password = wp_hash_password($_SESSION['password']);
            $email = $_SESSION['email'];
            $age = $_SESSION['age'];
            $address = $_SESSION['address'];
            $contact_number = $_SESSION['contact_number'];
            $business_registration_number = $_SESSION['business_registration_number'];
            $identifying_document = $_SESSION['identifying_document'];

            // Insert user into the database only after OTP verification
            $wpdb->insert(
                'users',
                array(
                    'name' => $username,
                    'age' => $age,
                    'email' => $email,
                    'address' => $address,
                    'contact_number' => $contact_number,
                    'business_registration_number' => $business_registration_number,
                    'identifying_document' => $identifying_document,
                    'is_admin' => 0,
                    'password' => $password
                ),
                array('%s', '%d', '%s', '%s', '%s', '%s', '%s', '%d', '%s')
            );

            // Insert into customer_information table
            $wpdb->insert(
                'customer_information',
                array(
                    'name' => $username,
                    'age' => $age,
                    'email' => $email,
                    'shipping_address' => '',
                    'billing_address' => '',
                    'primary_contact_number' => $contact_number,
                    'secondary_contact_number' => '',
                    'passport_number' => $identifying_document
                ),
                array('%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s')
            );

            echo "<script>alert('Registration successful!'); window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/13-2/';</script>";
            exit;
        } else {
            echo "<script>alert('Invalid OTP. Please try again.');</script>";
        }
    }

    // Check if form is submitted for user registration
    if (isset($_POST['register_user'])) {
        // Get form data
        $username = sanitize_text_field($_POST['username']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = sanitize_email($_POST['email']);
        $age = intval($_POST['age']);
        $address = sanitize_text_field($_POST['address']);
        $contact_number = sanitize_text_field($_POST['contact_number']);
        $business_registration_number = sanitize_text_field($_POST['business_registration_number']);
        $identifying_document = sanitize_text_field($_POST['identifying_document']);

        // Check if passwords match
        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match.');</script>";
            return;
        }

        // Check if email is valid
        if (!is_email($email)) {
            echo "<script>alert('Invalid email address.');</script>";
            return;
        }

        // Check if username or identifying document already exists
        $existing_user = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM users WHERE name = %s", $username));
        $existing_document = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM users WHERE identifying_document = %s", $identifying_document));

        if ($existing_user > 0 || $existing_document > 0) {
            echo "<script>alert('Username or Identifying document already exists.');</script>";
            return;
        }

        // Generate OTP
        $otp = rand(100000, 999999); // 6-digit OTP
        session_start();
        $_SESSION['otp'] = $otp;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['age'] = $age;
        $_SESSION['address'] = $address;
        $_SESSION['contact_number'] = $contact_number;
        $_SESSION['business_registration_number'] = $business_registration_number;
        $_SESSION['identifying_document'] = $identifying_document;

        // Send OTP email
        $subject = 'Your OTP for registration';
        $message = "Hi $username,\n\nYour OTP for registration is: $otp\n\nPlease enter this OTP to complete your registration.";
        $headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail($email, $subject, nl2br($message), $headers);

        echo "<script>alert('OTP sent to your email. Please check your inbox.');</script>";
    }

    // Display registration or OTP verification form
    ob_start();
    if (isset($_SESSION['otp'])) {
        // OTP verification form
        ?>
        <form method="post" action="">
            <div class="input-field">
                <label for="otp">Enter OTP</label>
                <input type="text" id="otp" name="otp" placeholder="Enter OTP" required>
            </div>
            <button type="submit" class="register-btn" name="verify_otp">Verify OTP</button>
        </form>
        <?php
    } else {
        // Registration form
        ?>
        <form method="post" action="">
            <div class="input-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="input-field">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
            </div>
            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="input-field">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" placeholder="Enter your age" required>
            </div>
            <div class="input-field">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter your address" required>
            </div>
            <div class="input-field">
                <label for="contact_number">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" placeholder="Enter your contact number" required>
            </div>
            <div class="input-field">
                <label for="business_registration_number">Business Registration Number</label>
                <input type="text" id="business_registration_number" name="business_registration_number" placeholder="Enter your Business Registration Number" required>
            </div>
            <div class="input-field">
                <label for="identifying_document">Identifying Document</label>
                <input type="text" id="identifying_document" name="identifying_document" placeholder="Enter your identifying document (e.g., national ID)" required>
            </div>
            <button type="submit" class="register-btn" name="register_user">Register</button>
        </form>
        <?php
    }

    return ob_get_clean();
}

// Register the shortcode for the registration form
add_shortcode('register_user_form', 'register_user_shortcode');



// Function to handle user login
function login_user_shortcode() {
    global $wpdb;

    // Check if form is submitted
    if (isset($_POST['login_user'])) {
        $username = sanitize_text_field($_POST['username']);
        $password = $_POST['password'];

        // Log out any previous session
        if (is_user_logged_in()) {
            wp_logout();  // Log out any currently logged-in user
        }

        // Check if user exists in the database
        $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM users WHERE name = %s", $username));

        if ($user) {
            // Verify the password
            if (wp_check_password($password, $user->password)) {
                // Log the user in using WordPress authentication
                wp_clear_auth_cookie(); // Clear any existing cookies
                wp_set_current_user($user->id); // Set the current user
                wp_set_auth_cookie($user->id); // Set the login cookie

                // Start session and set custom session variables if needed
                session_start();
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->name;

                // Get the current time
                $current_time = date('Y-m-d H:i:s');

                // Send login notification email
                $subject = 'Login Notification: Your Account Was Accessed';
                $message = "Hi " . $user->name . ",\n\nYour account was logged into on " . $current_time . ".\n\nIf this wasn't you, please update your password immediately.\n\nBest regards,\nThe Team";
                $headers = array('Content-Type: text/html; charset=UTF-8');
                wp_mail($user->email, $subject, nl2br($message), $headers);

                // Redirect to hotel list page
                echo "<script>window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/hotel-list/';</script>";
                exit;
            } else {
                // Password incorrect
                echo "<script>alert('Incorrect password. Please try again.');</script>";
            }
        } else {
            // User not found
            echo "<script>alert('User not found. Please register.');</script>";
        }
    }

    // Output the login form
    ob_start();
    ?>
    <form method="post" action="">
        <div class="input-field">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="input-field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit" class="login-btn" name="login_user">Login</button>
    </form>
    <?php
    return ob_get_clean();
}

// Register the shortcode for the login form
add_shortcode('login_user_form', 'login_user_shortcode');





// Function to display and update customer information with "edit" and "logout" feature
function display_customer_information() {
    global $wpdb;

    // Start the session to get the logged-in user's name
    session_start();
    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in to access this page.'); window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/13-2/';</script>";
        exit;
    }

    $username = $_SESSION['username'];

    // Handle logout action
    if (isset($_POST['logout_user'])) {
        wp_logout(); // Log out all users
        session_destroy(); // Destroy the session
        echo "<script>alert('You have been logged out.'); window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/13-2/';</script>";
        exit;
    }

    // Get customer information from the database
    $customer = $wpdb->get_row($wpdb->prepare("SELECT * FROM customer_information WHERE name = %s", $username));

    // Variable to check if user is in edit mode
    $edit_mode = isset($_POST['edit_mode']) && $_POST['edit_mode'] === 'true';

    // Handle form submission to update customer information
    if (isset($_POST['update_customer'])) {
        $age = intval($_POST['age']);
        $email = sanitize_email($_POST['email']);
        $shipping_address = sanitize_textarea_field($_POST['shipping_address']);
        $billing_address = sanitize_textarea_field($_POST['billing_address']);
        $primary_contact = sanitize_text_field($_POST['primary_contact_number']);
        $secondary_contact = sanitize_text_field($_POST['secondary_contact_number']);
        $passport_number = sanitize_text_field($_POST['passport_number']);

        // Update customer information in the database
        $wpdb->update(
            'customer_information',
            array(
                'age' => $age,
                'email' => $email,
                'shipping_address' => $shipping_address,
                'billing_address' => $billing_address,
                'primary_contact_number' => $primary_contact,
                'secondary_contact_number' => $secondary_contact,
                'passport_number' => $passport_number
            ),
            array('name' => $username),
            array('%d', '%s', '%s', '%s', '%s', '%s', '%s'),
            array('%s')
        );

        // After saving, return to view mode
        $edit_mode = false;
        echo "<script>alert('Customer information updated successfully!');</script>";

        // Refresh the customer data
        $customer = $wpdb->get_row($wpdb->prepare("SELECT * FROM customer_information WHERE name = %s", $username));
    }

    // Output the form with current customer information
    ob_start();

    if (!$edit_mode) {
        // Display the information (View mode)
        ?>
        <p><strong>Age:</strong> <?php echo esc_html($customer->age); ?></p>
        <p><strong>Email:</strong> <?php echo esc_html($customer->email); ?></p>
        <p><strong>Shipping Address:</strong> <?php echo esc_html($customer->shipping_address); ?></p>
        <p><strong>Billing Address:</strong> <?php echo esc_html($customer->billing_address); ?></p>
        <p><strong>Primary Contact Number:</strong> <?php echo esc_html($customer->primary_contact_number); ?></p>
        <p><strong>Secondary Contact Number:</strong> <?php echo esc_html($customer->secondary_contact_number); ?></p>
        <p><strong>Passport Number:</strong> <?php echo esc_html($customer->passport_number); ?></p>

        <form method="post">
            <input type="hidden" name="edit_mode" value="true">
            <button type="submit">Edit</button>
        </form>
        <form method="post">
            <button type="submit" name="logout_user">Logout</button> <!-- Logout Button -->
        </form>
        <?php
    } else {
        // Display editable form (Edit mode)
        ?>
        <form method="post">
            <label for="age">Age:</label>
            <input type="number" name="age" value="<?php echo esc_attr($customer->age); ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo esc_attr($customer->email); ?>" required><br>

            <label for="shipping_address">Shipping Address:</label>
            <textarea name="shipping_address" required><?php echo esc_textarea($customer->shipping_address); ?></textarea><br>

            <label for="billing_address">Billing Address:</label>
            <textarea name="billing_address" required><?php echo esc_textarea($customer->billing_address); ?></textarea><br>

            <label for="primary_contact_number">Primary Contact Number:</label>
            <input type="text" name="primary_contact_number" value="<?php echo esc_attr($customer->primary_contact_number); ?>" required><br>

            <label for="secondary_contact_number">Secondary Contact Number:</label>
            <input type="text" name="secondary_contact_number" value="<?php echo esc_attr($customer->secondary_contact_number); ?>"><br>

            <label for="passport_number">Passport Number:</label>
            <input type="text" name="passport_number" value="<?php echo esc_attr($customer->passport_number); ?>" required><br>

            <button type="submit" name="update_customer">Save</button>
        </form>
        <?php
    }

    return ob_get_clean();
}

// Register the shortcode for customer information
add_shortcode('customer_information_form', 'display_customer_information');


// Function to display the navigation bar based on login status and user role
// function display_dynamic_navigation_bar() {
//     global $wpdb;

//     // Start the session to check if the user is logged in
//     session_start();

//     if (isset($_SESSION['username'])) {
//         // Get the username and check if the user is an admin
//         $username = $_SESSION['username'];
//         $user = $wpdb->get_row($wpdb->prepare("SELECT is_admin FROM users WHERE name = %s", $username));

//         if ($user && $user->is_admin) {
//             // Display admin navigation
//             echo '
//             <nav>
//                 <ul>
//                     <li><a href="#">Home</a></li>
//                     <li><a href="#">Customer Information</a></li>
//                     <li><a href="#">Hotel List</a></li>
//                     <li><a href="#">Update Hotel</a></li>
//                     <li><a href="#">About Us</a></li>
//                 </ul>
//             </nav>
//             ';
//         } else {
//             // Display regular user navigation
//             echo '
//             <nav>
//                 <ul>
//                     <li><a href="#">Home</a></li>
//                     <li><a href="#">Customer Information</a></li>
//                     <li><a href="#">Hotel List</a></li>
//                     <li><a href="#">About Us</a></li>
//                 </ul>
//             </nav>
//             ';
//         }
//     } else {
//         // Display navigation for non-logged-in users
//         echo '
//         <nav>
//             <ul>
//                 <li><a href="#">Home</a></li>
//                 <li><a href="#">Login</a></li>
//                 <li><a href="#">About Us</a></li>
//             </ul>
//         </nav>
//         ';
//     }
// }

// // Register the shortcode for the dynamic navigation bar
// add_shortcode('dynamic_navigation_bar', 'display_dynamic_navigation_bar');


// Function to display booking list and manage hold/booked options
function display_booking_list_shortcode() {
    global $wpdb;

    // Check if user is logged in
    session_start();
    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Please log in to access your booking list.'); window.location.href = 'https://9940-194-127-105-70.ngrok-free.app/13-2/';</script>";
        exit;
    }

    $username = $_SESSION['username'];

    // Check if the user is an admin
    $is_admin = $wpdb->get_var($wpdb->prepare("SELECT is_admin FROM users WHERE name = %s", $username));

    // If user is not admin, show only their bookings, otherwise show all bookings
    $query = ($is_admin == 1) ? "SELECT * FROM user_booking_list" : $wpdb->prepare("SELECT * FROM user_booking_list WHERE username = %s", $username);

    // Get bookings
    $bookings = $wpdb->get_results($query);

    // Split bookings into 'hold' and 'booked'
    $hold_bookings = [];
    $booked_bookings = [];
    foreach ($bookings as $booking) {
        if ($booking->book_or_hold === 'hold') {
            $hold_bookings[] = $booking;
        } elseif ($booking->book_or_hold === 'booked') {
            $booked_bookings[] = $booking;
        }
    }

    // Output the booking list form
    ob_start();
    ?>
    <h1>Your Booking List</h1>

    <!-- Hold Section -->
    <h2>Hold Bookings</h2>
    <?php if (count($hold_bookings) > 0): ?>
        <form method="post">
            <?php foreach ($hold_bookings as $booking): ?>
                <div class="booking-entry">
                    <p><strong>Hotel:</strong> <?php echo esc_html($booking->hotel_name); ?></p>
                    <p><strong>Room Type:</strong> <?php echo esc_html($booking->room_type); ?></p>
                    <p><strong>Price:</strong> $<?php echo esc_html($booking->price); ?></p>
                    <p><strong>Start Date:</strong> <?php echo esc_html($booking->start_date); ?></p>
                    <p><strong>End Date:</strong> <?php echo esc_html($booking->end_date); ?></p>
                    <button type="submit" name="book_hold" value="<?php echo esc_attr($booking->id); ?>">Book</button>
                    <button type="submit" name="cancel_booking" value="<?php echo esc_attr($booking->id); ?>">Cancel</button>
                </div>
            <?php endforeach; ?>
        </form>
    <?php else: ?>
        <p>No hold bookings found.</p>
    <?php endif; ?>

    <!-- Booked Section -->
    <h2>Booked Bookings</h2>
    <?php if (count($booked_bookings) > 0): ?>
        <form method="post">
            <?php foreach ($booked_bookings as $booking): ?>
                <div class="booking-entry">
                    <p><strong>Hotel:</strong> <?php echo esc_html($booking->hotel_name); ?></p>
                    <p><strong>Room Type:</strong> <?php echo esc_html($booking->room_type); ?></p>
                    <p><strong>Price:</strong> $<?php echo esc_html($booking->price); ?></p>
                    <p><strong>Start Date:</strong> <?php echo esc_html($booking->start_date); ?></p>
                    <p><strong>End Date:</strong> <?php echo esc_html($booking->end_date); ?></p>
                    <button type="submit" name="cancel_booking" value="<?php echo esc_attr($booking->id); ?>">Cancel</button>
                </div>
            <?php endforeach; ?>
        </form>
    <?php else: ?>
        <p>No booked bookings found.</p>
    <?php endif; ?>

    <?php
    return ob_get_clean();
}

// Process form actions (book hold and cancel booking)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['book_hold'])) {
        $booking_id = intval($_POST['book_hold']);
        
        // Get booking details
        $booking = $wpdb->get_row($wpdb->prepare("SELECT * FROM user_booking_list WHERE id = %d", $booking_id));
        
        if ($booking) {
            // Update room availability in the hotels table
            switch ($booking->room_type) {
                case 'standard':
                    $wpdb->query($wpdb->prepare("UPDATE hotels SET room_standard_available = room_standard_available - 1 WHERE hotel_name = %s", $booking->hotel_name));
                    break;
                case 'deluxe':
                    $wpdb->query($wpdb->prepare("UPDATE hotels SET room_deluxe_available = room_deluxe_available - 1 WHERE hotel_name = %s", $booking->hotel_name));
                    break;
                case 'premium':
                    $wpdb->query($wpdb->prepare("UPDATE hotels SET room_premium_available = room_premium_available - 1 WHERE hotel_name = %s", $booking->hotel_name));
                    break;
            }

            // Update the booking list to change 'hold' to 'booked'
            $wpdb->update(
                'user_booking_list',
                array('book_or_hold' => 'booked'),
                array('id' => $booking_id),
                array('%s'),
                array('%d')
            );

            // Get the user's email from the 'users' table using their username
            $user_email = $wpdb->get_var($wpdb->prepare("SELECT email FROM users WHERE name = %s", $booking->username));

            if ($user_email) {
                // Send confirmation email
                $subject = 'Booking Confirmation';
                $message = "Hi " . $booking->username . ",\n\nYou have successfully booked the " . $booking->room_type . " at " . $booking->hotel_name . ".\n\nThank you!";
                $headers = array('Content-Type: text/html; charset=UTF-8');
                wp_mail($user_email, $subject, nl2br($message), $headers);

                echo "<script>alert('Booking confirmed! An email has been sent.'); window.location.href = window.location.href;</script>";
            } else {
                echo "<script>alert('Error: Could not find user email.'); window.location.href = window.location.href;</script>";
            }
        }
    }

    // Cancel booking (for both hold and booked)
    if (isset($_POST['cancel_booking'])) {
        $booking_id = intval($_POST['cancel_booking']);
        
        // Delete the booking from the database
        $wpdb->delete('user_booking_list', array('id' => $booking_id), array('%d'));
        
        echo "<script>alert('Booking canceled.'); window.location.href = window.location.href;</script>";
    }
}

// Register the shortcode to display the booking list
add_shortcode('booking_list_form', 'display_booking_list_shortcode');
