<?php
/**
 *@version 1.0.001
 *@author Foatconcept - Maximiliano Suarez
 * AGREGADO NUEVOS ESTADOS A STATUS BOOKED
 * definidos en bk_mod filter bookingpress_add_global_option_data
 * [ "value"  => '7', "text"  => "EN ESPERA"]
 * [ "value"  => '9', "text"  => "EN ATENCIÓN"]
 * [ "value"  => '8', "text"  => "PAMI REPROG"]
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
        
        $new_where_clause = $wpdb->prepare( ' AND bookingpress_appointment_status IN(%s,%s,%s,%s)', '1', '2','7','8','9' );
        
        $query = str_replace($where_clause, $new_where_clause, $query, $cont);
        
        
        
        return $query;
    }
