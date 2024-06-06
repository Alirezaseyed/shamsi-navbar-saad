<?php
/*
Plugin Name: تاریخ شمسی در نوار ابزار
Description: این پلاگین تاریخ را به فرمت شمسی تبدیل کرده و در نوار ابزار وردپرس نمایش می‌دهد.
Version: 1.0
Author: شما
*/

// Include the jdf.php library
include_once( plugin_dir_path( __FILE__ ) . 'jdf.php' );

// Function to display Jalali date in the WordPress toolbar
function display_jalali_date_in_toolbar() {
    // Get the current timestamp
    $current_timestamp = current_time( 'timestamp' );

    // Convert the timestamp to Jalali (Shamsi) date using the jdf() function from the included library
    $jalali_date = jdate( 'j F Y', $current_timestamp );

    // Display the Jalali date in the WordPress toolbar
    global $wp_admin_bar;
    $wp_admin_bar->add_menu( array(
        'id'    => 'jalali_date_menu',
        'title' => 'تاریخ شمسی: ' . $jalali_date,
        'meta'  => array( 'class' => 'jalali-date-display' )
    ) );
}

// Hook the function to the WordPress admin bar
add_action( 'admin_bar_menu', 'display_jalali_date_in_toolbar', 999 );
