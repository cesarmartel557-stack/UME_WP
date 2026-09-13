<?php

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'BPHC_VERSION', '1.0.0' );
define( 'BPHC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BPHC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


add_action('plugins_loaded',function(){
    
        
    #echo "<h1>Expansion</h1>";
    
    #echo "<h1>.........." . BPHC_PLUGIN_DIR . "...........</h1>";
    #echo "<h1>.........." . BPHC_PLUGIN_URL . "...........</h1>";
    
    if( file_exists( BPHC_PLUGIN_DIR . 'includes/TABLAS.php' ) ){
        include_once BPHC_PLUGIN_DIR . 'includes/TABLAS.php';
    }
    
    
},-100);





/**
require_once BPHC_PLUGIN_DIR . 'includes/class-hc-booking-plugin.php';
require_once BPHC_PLUGIN_DIR . 'includes/bp_hc_histories_bd.php';


add_action('plugins_loaded', function(){
    global $hc_BookingPress_Plugin;
    $hc_BookingPress_Plugin = new HC_BookingPress_Plugin( );
}, -10);

*/

