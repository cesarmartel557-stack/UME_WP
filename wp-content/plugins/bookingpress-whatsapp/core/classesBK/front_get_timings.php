<?php
/**
 *@version 1.0.000
 *
 */

            //add_action('wp_ajax_bookingpress_front_get_timings', array( $this, 'bookingpress_retrieve_timeslots' ), 8);
            //add_action('wp_ajax_nopriv_bookingpress_front_get_timings', array( $this, 'bookingpress_retrieve_timeslots' ), 8);
    /**
    add_filter( 'bookingpress_change_hide_already_booked_slot_for_service', function($bookingpress_hide_already_booked_slot, $selected_service_id){
        
        add_filter('query', 'bk_mod_front_get_timings_query_filter', 100);
        
        return $bookingpress_hide_already_booked_slot;
    },1,2);
    */
    
    
    add_filter('query', 'bk_mod_front_get_timings_query_filter', 100);
    /**
     * Creado Originalmente para los timings slot
     * Aplicado a todos las queries de appointments status booked
     * ya que el plugin originalmente no provee un metodo y filtro de estados considerados como reservado
     */
    function bk_mod_front_get_timings_query_filter($query=""){
        global $wpdb;
        $cont=0;
        $where_clause = array( 
            $wpdb->prepare( ' AND (bookingpress_appointment_status = %s OR bookingpress_appointment_status = %s)', '1', '2' ),
            $wpdb->prepare( ' AND (bookingpress_appointment_status = %s OR bookingpress_appointment_status = %s)', '2', '1' )
        );
        
        $new_where_clause = $wpdb->prepare( ' AND bookingpress_appointment_status IN(%s,%s,%s,%s)', '1', '2','7','8' );
        
        $query = str_replace($where_clause, $new_where_clause, $query, $cont);
        if(!empty($cont)){
        $f = fopen(__DIR__ .'/timing.txt','a');
        if($f){
        fwrite($f, print_r($query, true)."\n\n---------\n###########\n" );
        fclose($f);
        }
        }
        return $query;
    }
