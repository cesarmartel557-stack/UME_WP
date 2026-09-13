<?php
/**
 * @package DoctorAppointmentBooking
 */

/**
 * Plugin Name: Doctor Appointment Booking
 * Plugin URI: http://codecanyon.net/user/creativeitem
 * Description: This plugin manages doctor's chamber with patient appointment booking, prescription & billing. It supports multiple chambers for a single doctor.
 * Version: 1.0.0
 * Author: Creativeitem
 * Author URI: http://creativeitem.com
 * License: GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */

// If this file is called directly, abort!!!
defined( 'ABSPATH' ) or die( 'You can not access the file directly' );

// Require once the composer autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Method runs during plugin activation
function activate_ctmdcd() {
	Ctmdcd\base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_ctmdcd' );

// Method runs during plugin deactivation
function deactivate_ctmdcd() {
	Ctmdcd\base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_ctmdcd' );

// Initialize all the core classes of the plugin with all the necessary hooks that are needed to be registered
if ( class_exists( 'Ctmdcd\\Init' ) ) {
	Ctmdcd\Init::register_services();
}