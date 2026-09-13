<?php

if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'BPHC_VERSION', '1.0.0' );
define( 'BPHC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BPHC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

//echo "<h1>.........." . BPHC__PLUGIN_DIR . "...........</h1>";

/*
require_once BPHC_PLUGIN_DIR . 'includes/class-hc-booking-plugin.php';
require_once BPHC_PLUGIN_DIR . 'includes/bp_hc_histories_bd.php';



add_action('plugins_loaded', function(){
    global $hc_BookingPress_Plugin;
    $hc_BookingPress_Plugin = new HC_BookingPress_Plugin( );
}, -10);

*/


