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
    #global $bookingpress_pro_staff_members;

    
},-100);


/*

			$sql_table = "CREATE TABLE IF NOT EXISTS `{$tbl_expansion_staff_member_workhours}`(
				`bookingpress_staffmember_workhours_id` bigint(11) NOT NULL AUTO_INCREMENT,
				`bookingpress_staffmember_id` smallint(6) NOT NULL ,
                `service_id` smallint(6) DEFAULT 0,
				`bookingpress_staffmember_workday_key` varchar(11) NOT NULL,
				`bookingpress_staffmember_workhours_start_time` time DEFAULT NULL,
				`bookingpress_staffmember_workhours_end_time` time DEFAULT NULL,
				`bookingpress_staffmember_workhours_is_break` TINYINT(1) DEFAULT 0,
				`bookingpress_staffmember_workhours_created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (`bookingpress_staffmember_workhours_id`)
			) {$charset_collate}";
			$bookingpress_dbtbl_create[ $tbl_expansion_staff_member_workhours ] = dbDelta( $sql_table );
*/




/**
require_once BPHC_PLUGIN_DIR . 'includes/class-hc-booking-plugin.php';
require_once BPHC_PLUGIN_DIR . 'includes/bp_hc_histories_bd.php';


add_action('plugins_loaded', function(){
    global $hc_BookingPress_Plugin;
    $hc_BookingPress_Plugin = new HC_BookingPress_Plugin( );
}, -10);

*/



if( !class_exists( 'bookingpress_Expansion_staff_members' ) && class_exists( 'bookingpress_pro_staff_members' ) )
{
    class bookingpress_Expansion_staff_members Extends bookingpress_pro_staff_members {
        public function __construct(){
            global $bookingpress_pro_staff_members;            
                   #print_r( get_parent_class($this) ); 
            
            #extra
            add_action( 'bookingpress_save_staff_member', array( $this, 'add_data_to_save_staff_member_vue_method' ), 10 );
            #extra
            add_action( 'bookingpress_staff_member_external_vue_methods', array( $this, 'add_staff_manage_methods' ), 10);
            #extra
            add_action( 'bookingpress_staff_work_hour_content_outside', array($this, 'add_staff_manage_content'), 10);
            #$bookingpress_staff_member_vue_data_fields = apply_filters('bookingpress_modify_staffmember_data_fields', $bookingpress_staff_member_vue_data_fields);
                        
            
            remove_action( 'wp_ajax_bookingpress_retrieve_staffmember_shift_managment_data', array( $bookingpress_pro_staff_members, 'bookingpress_retrieve_staffmember_shift_managment_data_func' ) );
                   add_action( 'wp_ajax_bookingpress_retrieve_staffmember_shift_managment_data', array( $this, 'bookingpress_retrieve_staffmember_shift_managment_data_func' ), 10 );
                   
            remove_action( 'wp_ajax_bookingpress_add_staff_member', array( $bookingpress_pro_staff_members, 'bookingpress_add_staff_member_func' ) );
                   add_action( 'wp_ajax_bookingpress_add_staff_member', array( $this, 'bookingpress_add_staff_member_func' ), 10 );
                                      
            remove_filter( 'bookingpress_retrieve_pro_modules_timeslots', array( $bookingpress_pro_staff_members, 'bookingpress_retrieve_staffmember_timings' ) );
                   add_filter( 'bookingpress_retrieve_pro_modules_timeslots', array( $this, 'bookingpress_retrieve_staffmember_timings' ), 10, 6 );
            
            #extra
            add_action( 'wp_ajax_bpexp_update_specifict_workhour_before_Edit', array($this, 'update_specifict_workhour_before_Edit'), 10);
            
        }
        
        function bookingpress_retrieve_staffmember_timings( $service_timings_data, $selected_service_id, $selected_date, $minimum_time_required, $service_max_capacity, $bookingpress_show_time_as_per_service_duration ){
			#exit('SALIENDO');
			if( !empty( $service_timings_data['service_timings'] ) || true == $service_timings_data['is_daysoff'] || empty( $selected_service_id ) ){
				return $service_timings_data;
			}

            global $tbl_expansion_staff_member_workhours;//THE WORKHORS NEW TABLE STAFFid Y SERVICEid
            global $wpdb, $BookingPress, $BookingPressPro, $tbl_bookingpress_staff_member_workhours, $tbl_bookingpress_staffmembers_meta, $tbl_bookingpress_appointment_bookings, $tbl_bookingpress_staffmembers_daysoff, $tbl_bookingpress_services;

			$bpa_current_date = date('Y-m-d', current_time('timestamp'));

			$bookingpress_selected_staffmember_id = !empty( $_POST['staffmember_id'] ) ? intval( $_POST['staffmember_id'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Missing --Reason Nonce already verified from the caller function.
			
			
			if( empty( $bookingpress_selected_staffmember_id ) ){
				$bookingpress_selected_staffmember_id = !empty( $_POST['bookingpress_selected_staffmember']['selected_staff_member_id'] ) ? intval( $_POST['bookingpress_selected_staffmember']['selected_staff_member_id'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Missing --Reason Nonce already verified from the caller function.
				
				if( empty( $bookingpress_selected_staffmember_id ) ){

					if( empty( $_POST['appointment_data_obj'] ) ){ // phpcs:ignore WordPress.Security.NonceVerification.Missing --Reason Nonce already verified from the caller function.
						$_POST['appointment_data_obj'] = !empty( $_POST['appointment_data'] ) ? array_map( array($BookingPress, 'appointment_sanatize_field'), $_POST['appointment_data'] ) : array();  // phpcs:ignore
					}
					$bookingpress_selected_staffmember_id = !empty( $_POST['appointment_data_obj']['bookingpress_selected_staff_member_details']['selected_staff_member_id'] ) ? intval( $_POST['appointment_data_obj']['bookingpress_selected_staff_member_details']['selected_staff_member_id'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Missing --Reason Nonce already verified from the caller function.
					if( empty( $bookingpress_selected_staffmember_id ) ){

						return $service_timings_data;
					}
				}
			}

			$display_slots_in_client_timezone = false;

			$bookingpress_timezone = isset($_POST['client_timezone_offset']) ? sanitize_text_field( $_POST['client_timezone_offset'] ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Missing --Reason Nonce already verified from the caller function.
			
			$bookingpress_timeslot_display_in_client_timezone = $BookingPress->bookingpress_get_settings( 'show_bookingslots_in_client_timezone', 'general_setting' );

			$store_current_date = date('Y-m-d', current_time('timestamp' ) );
			$store_current_time = date('H:i', current_time('timestamp' ) );
			
			// 04May 2023 Changes
			$client_timezone_string = !empty( $_COOKIE['bookingpress_client_timezone'] ) ? sanitize_text_field($_COOKIE['bookingpress_client_timezone']) : '';
            if( 'true' == $bookingpress_timeslot_display_in_client_timezone && !empty( $client_timezone_string ) ){
                $client_timezone_offset = $BookingPress->bookingpress_convert_timezone_to_offset( $client_timezone_string, $bookingpress_timezone );
                $wordpress_timezone_offset = $BookingPress->bookingpress_convert_timezone_to_offset( wp_timezone_string() );                
                if( $client_timezone_offset  == $wordpress_timezone_offset ){
                    $bookingpress_timeslot_display_in_client_timezone = 'false';
                }
            }
			// 04May 2023 Changes

			if( isset($bookingpress_timezone) && '' !== $bookingpress_timezone && !empty($bookingpress_timeslot_display_in_client_timezone) && ($bookingpress_timeslot_display_in_client_timezone == 'true')){
				$display_slots_in_client_timezone = true;
			}

			if( strtotime( $bpa_current_date ) > strtotime( $selected_date ) && false == $display_slots_in_client_timezone ){
                return $service_timings_data;
            }

			/** Check if the selected date is holiday for staff member */
			
			
			$bookingpress_current_time = date( 'H:i',current_time('timestamp'));
			$bpa_current_datetime = date( 'Y-m-d H:i:s',current_time('timestamp'));

			$bookingpress_hide_already_booked_slot = $BookingPress->bookingpress_get_customize_settings( 'hide_already_booked_slot', 'booking_form' );
			$bookingpress_hide_already_booked_slot = ( $bookingpress_hide_already_booked_slot == 'true' ) ? 1 : 0;

			$current_day  = ! empty( $selected_date ) ? ucfirst( date( 'l', strtotime( $selected_date ) ) ) : ucfirst( date( 'l', current_time( 'timestamp' ) ) );
			$current_date = ! empty($selected_date) ? date('Y-m-d', strtotime($selected_date)) : date('Y-m-d', current_time('timestamp'));

			$bpa_current_time = date( 'H:i',current_time('timestamp'));

			$change_store_date = ( !empty( $_POST['bpa_change_store_date'] ) && 'true' == $_POST['bpa_change_store_date'] ) ? true : false; //phpcs:ignore

			$service_time_duration     = $BookingPress->bookingpress_get_default_timeslot_data();
			$service_step_duration_val = $service_time_duration['default_timeslot'];
			
			if (! empty($selected_service_id) ) {
				$service_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_services} WHERE bookingpress_service_id = %d", $selected_service_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason $tbl_bookingpress_services is a table name
				if (! empty($service_data) ) {
					$service_time_duration      = esc_html($service_data['bookingpress_service_duration_val']);
					$service_time_duration_unit = esc_html($service_data['bookingpress_service_duration_unit']);
					if ($service_time_duration_unit == 'h' ) {
						$service_time_duration = $service_time_duration * 60;
					} elseif($service_time_duration_unit == 'd') {           
						$service_time_duration = $service_time_duration * 24 * 60;
					}
					$default_timeslot_step = $service_step_duration_val = $service_time_duration;
				}
			}
			
			$bpa_fetch_updated_slots = false;
            if( isset( $_POST['bpa_fetch_data'] ) && 'true' == $_POST['bpa_fetch_data'] ){ //phpcs:ignore
                $bpa_fetch_updated_slots = true;
            }
			$service_step_duration_val = apply_filters( 'bookingpress_modify_service_timeslot', $service_step_duration_val, $selected_service_id, $service_time_duration_unit, $bpa_fetch_updated_slots );

			$bookingpress_show_time_as_per_service_duration = $BookingPress->bookingpress_get_settings( 'show_time_as_per_service_duration', 'general_setting' );
            if ( ! empty( $bookingpress_show_time_as_per_service_duration ) && $bookingpress_show_time_as_per_service_duration == 'false' ) {
                $bookingpress_default_time_slot = $BookingPress->bookingpress_get_settings( 'default_time_slot', 'general_setting' );
                $default_timeslot_step      = $bookingpress_default_time_slot;
            } else {
				$default_timeslot_step      = $service_step_duration_val;
			}

			/** Check for staff member holiday */
			$bpa_get_staff_holiday = $wpdb->get_results( $wpdb->prepare( "SELECT bookingpress_staffmember_id, bookingpress_staffmember_daysoff_date, bookingpress_staffmember_daysoff_repeat FROM {$tbl_bookingpress_staffmembers_daysoff} WHERE ( bookingpress_staffmember_daysoff_date = %s OR bookingpress_staffmember_daysoff_repeat = %d )AND bookingpress_staffmember_id = %d", $selected_date, 1, $bookingpress_selected_staffmember_id ) ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staffmembers_daysoff is a table name.


			$is_holiday = false;
			if( !empty( $bpa_get_staff_holiday ) ){
				foreach( $bpa_get_staff_holiday as $staff_holiday_data ){
					$hsf_id = $staff_holiday_data->bookingpress_staffmember_id;
					$hsf_date = $staff_holiday_data->bookingpress_staffmember_daysoff_date;
					$hsf_is_repeat = $staff_holiday_data->bookingpress_staffmember_daysoff_repeat;

					if( 1 == $hsf_is_repeat ){
						/** Check if the holiday is repeated and placed in the selected date */
						$current_date_without_year = date('m-d', strtotime( $selected_date ) );
						$holiday_date_without_year = date('m-d', strtotime( $hsf_date ) );
						if( $holiday_date_without_year == $current_date_without_year ){
							if( empty( $workhour_data ) ){
								$service_timings_data['is_daysoff'] = true;
								$is_holiday = true;
								break;
							}
						}
					} else {
						if( empty( $workhour_data ) ){
							$service_timings_data['is_daysoff'] = true;
							$is_holiday = true;
							break;
						}
					}
				}
			}
			if( true == $is_holiday ){
				return $service_timings_data;
			}


			$workhour_data = array();

			/** Check for Staff Member Special Days */
			$bookingpress_staffmember__special_day_details = $BookingPressPro->bookingpress_get_staffmember_special_days(  $bookingpress_selected_staffmember_id, $selected_service_id, $selected_date );
			
			if( !empty( $bookingpress_staffmember__special_day_details ) ){
				
				$staffmember_current_time = $service_start_time = apply_filters( 'bookingpress_modify_service_start_time', date('H:i', strtotime($bookingpress_staffmember__special_day_details['special_day_start_time'])), $selected_service_id );
				
				$staffmember_end_time     = apply_filters( 'bookingpress_modify_service_end_time', date('H:i', strtotime($bookingpress_staffmember__special_day_details['special_day_end_time'])), $selected_service_id );

				if( '00:00' == $staffmember_end_time ){
					$staffmember_end_time = '24:00';
				}
				$staff_special_day_id = $bookingpress_staffmember__special_day_details['special_day_id'];

				$staff_special_day_break_data = $this->bookingpress_get_staffmember_special_days_break( $staff_special_day_id );

				if ($service_start_time != null && $staffmember_end_time != null ) {
					while ( $staffmember_current_time <= $staffmember_end_time ) {
						if ($staffmember_current_time > $staffmember_end_time ) {
							break;
						}

						$service_tmp_date_time = $selected_date .' '.$staffmember_current_time;
						$service_tmp_end_time = date( 'Y-m-d', ( strtotime($selected_date. ' ' . $staffmember_current_time ) + ( $service_step_duration_val * 60 ) ) );

						if( $service_tmp_end_time > $selected_date  ){
							if( 1440 < $service_step_duration_val && $service_time_duration_unit != 'd' ){
								break;
							}
						}

						$service_tmp_current_time = $staffmember_current_time;

						if ($staffmember_current_time == '00:00' ) {
							$staffmember_current_time = date('H:i', strtotime($staffmember_current_time) + ( $service_step_duration_val * 60 ));
						} else {
							$service_tmp_time_obj = new DateTime($selected_date . ' ' . $staffmember_current_time);
							$service_tmp_time_obj->add(new DateInterval('PT' . $service_step_duration_val . 'M'));
							$staffmember_current_time = $service_tmp_time_obj->format('H:i');

							$service_current_date = $service_tmp_time_obj->format('Y-m-d');
                            if( $service_current_date > $selected_date ){
								if( $staffmember_end_time == '24:00' && strtotime($service_current_date.' '.$staffmember_current_time) > strtotime( $service_current_date . ' 00:00' ) ){
                                    break;
                                }
							}
						}

						$break_start_time      = '';
						$break_end_time        = '';

						if ($staffmember_current_time < $service_start_time || $staffmember_current_time == $service_start_time ) {
							$staffmember_current_time = $staffmember_end_time;
						}

						$bookingpress_timediff_in_minutes = round(abs(strtotime($staffmember_current_time) - strtotime($service_tmp_current_time)) / 60, 2);
						$is_already_booked = 0;
						$is_booked_for_minimum = false;
						if( 'disabled' != $minimum_time_required ){
							$bookingpress_slot_start_datetime       = $selected_date . ' ' . $service_tmp_current_time . ':00';
							$bookingpress_slot_start_time_timestamp = strtotime( $bookingpress_slot_start_datetime );
							$bookingpress_time_diff = round( abs( current_time('timestamp') - $bookingpress_slot_start_time_timestamp ) / 60, 2 );
							
							if( $bookingpress_time_diff <= $minimum_time_required ){
								$is_booked_for_minimum = true;
							}
						}
						
						if ($is_already_booked == 1 && $bookingpress_hide_already_booked_slot == 1 ) {
							continue;
						} else {
							if ($break_start_time != $service_tmp_current_time && $bookingpress_timediff_in_minutes >= $service_step_duration_val && $staffmember_current_time <= $staffmember_end_time ) {
								if ( $bpa_current_date == $selected_date ) {
									if ($service_tmp_current_time > $bpa_current_time && !$is_booked_for_minimum ) {

										$service_timing_arr = array(
											'start_time' => $service_tmp_current_time,
											'end_time'   => $staffmember_current_time,
											'break_start_time' => $break_start_time,
											'break_end_time' => $break_end_time,
											'store_start_time' => $service_tmp_current_time,
											'store_end_time' => $staffmember_current_time,
											'store_service_date' => $selected_date,
											'is_booked'  => $is_already_booked,
											'max_capacity' => $service_max_capacity,
											'total_booked' => 0
										);

										if( !empty( $staff_special_day_break_data ) ){
											$service_timing_arr = apply_filters( 'bpa_calculate_staff_breakhours_data', $service_timing_arr, $staff_special_day_break_data );
										}

										if( !empty( $service_timing_arr['is_blocked'] ) && true == $service_timing_arr['is_blocked'] ){
											$staffmember_current_time = $service_timing_arr['break_end_time'];
											continue;
										}

										if( $display_slots_in_client_timezone ){

											$booking_timeslot_start = $selected_date.' '.$service_tmp_current_time.':00';
											$booking_timeslot_end = $selected_date .' '.$staffmember_current_time.':00';
											
											
											$booking_timeslot_start = apply_filters( 'bookingpress_appointment_change_to_client_timezone', $booking_timeslot_start, $bookingpress_timezone);	
											$booking_timeslot_end = apply_filters( 'bookingpress_appointment_change_to_client_timezone', $booking_timeslot_end, $bookingpress_timezone);
											
											$service_timing_arr['start_time'] = date('H:i', strtotime($booking_timeslot_start) );
											$service_timing_arr['end_time'] = date('H:i', strtotime( $booking_timeslot_end ) );

											$booking_timeslot_start_date = date('Y-m-d', strtotime( $booking_timeslot_start ) );

											if( $change_store_date ) {

												$store_selected_date = apply_filters( 'bookingpress_appointment_change_date_to_store_timezone', $selected_date, $service_timing_arr['start_time'], $bookingpress_timezone );
												
												$service_timing_arr['store_service_date'] = $store_selected_date;
												
												$store_selection_datetime = $store_selected_date . ' ' . $service_tmp_current_time;
												if( strtotime( $store_selection_datetime ) < current_time('timestamp' ) || $store_selected_date != $selected_date ){
													continue;
												}
											}
											if( $selected_date < $booking_timeslot_start_date){
												break;
											}
										}
										$workhour_data[] = $service_timing_arr;
									} else {
										$service_timings_data['is_daysoff'] = true;
									}
								} else {
									if( !$is_booked_for_minimum ){
										$service_timing_arr = array(
											'start_time' => $service_tmp_current_time,
											'end_time'   => $staffmember_current_time,
											'break_start_time' => $break_start_time,
											'break_end_time' => $break_end_time,
											'store_start_time' => $service_tmp_current_time,
											'store_end_time' => $staffmember_current_time,
											'store_service_date' => $selected_date,
											'is_booked'  => $is_already_booked,
											'max_capacity' => $service_max_capacity,
											'total_booked' => 0
										);

										if( !empty( $staff_special_day_break_data ) ){
											$service_timing_arr = apply_filters( 'bpa_calculate_staff_breakhours_data', $service_timing_arr, $staff_special_day_break_data );
										}

										if( !empty( $service_timing_arr['is_blocked'] ) && true == $service_timing_arr['is_blocked'] ){
											$staffmember_current_time = $service_timing_arr['break_end_time'];
											continue;
										}

										if( $display_slots_in_client_timezone ){

											$booking_timeslot_start = $selected_date.' '.$service_tmp_current_time.':00';
											$booking_timeslot_end = $selected_date .' '.$staffmember_current_time.':00';
											
											
											$booking_timeslot_start = apply_filters( 'bookingpress_appointment_change_to_client_timezone', $booking_timeslot_start, $bookingpress_timezone);	
											$booking_timeslot_end = apply_filters( 'bookingpress_appointment_change_to_client_timezone', $booking_timeslot_end, $bookingpress_timezone);
											
											$service_timing_arr['start_time'] = date('H:i', strtotime($booking_timeslot_start) );
											$service_timing_arr['end_time'] = date('H:i', strtotime( $booking_timeslot_end ) );

											$booking_timeslot_start_date = date('Y-m-d', strtotime( $booking_timeslot_start ) );

											if( $change_store_date ) {

												$store_selected_date = apply_filters( 'bookingpress_appointment_change_date_to_store_timezone', $selected_date, $service_timing_arr['start_time'], $bookingpress_timezone );
												
												$service_timing_arr['store_service_date'] = $store_selected_date;
												
												$store_selection_datetime = $store_selected_date . ' ' . $service_tmp_current_time;
												if( strtotime( $store_selection_datetime ) < current_time('timestamp' ) || $store_selected_date != $selected_date ){
													continue;
												}
											}
											if( $selected_date < $booking_timeslot_start_date){
												break;
											}
										}
										$workhour_data[] = $service_timing_arr;
									}else {
										$service_timings_data['is_daysoff'] = true;
									}
								}
							} else {
								if($staffmember_current_time >= $staffmember_end_time){
                                    break;
                                }
							}
						}

						if (! empty($break_end_time) ) {
							$staffmember_current_time = $break_end_time;
						}
		
						if ($staffmember_current_time == $staffmember_end_time ) {
							break;
						}
						
						if(!empty($default_timeslot_step) && $default_timeslot_step != $service_step_duration_val && empty($break_start_time)){
							$service_tmp_time_obj = new DateTime($selected_date . ' ' . $service_tmp_current_time);
							$service_tmp_time_obj->add(new DateInterval('PT' . $default_timeslot_step . 'M'));
							$staffmember_current_time = $service_tmp_time_obj->format('H:i');
							
							$service_current_date = $service_tmp_time_obj->format('Y-m-d');
							if( $service_current_date > $selected_date ){
								break;
							}
						}
					}
					if( empty( $workhour_data ) ){
						$service_timings_data['is_daysoff'] = true;
					}
					$service_timings_data['service_timings'] = $workhour_data;
					//die;
					return $service_timings_data;
				}
			}

			$is_staffmember_workhour_enable = $this->get_bookingpress_staffmembersmeta($bookingpress_selected_staffmember_id, 'bookingpress_configure_specific_workhour');

			if( "true" == $is_staffmember_workhour_enable ){
			     global $tbl_expansion_staff_member_workhours;
			     $new_service_check = absint($selected_service_id)? absint($selected_service_id) : 0;
                 $and_service_check_where = " AND service_id = {$new_service_check} ";
             
				$bookingpress_staffmember_workhours = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_expansion_staff_member_workhours} WHERE bookingpress_staffmember_id = %d {$and_service_check_where} AND bookingpress_staffmember_workhours_is_break = 0 AND bookingpress_staffmember_workhours_start_time IS NOT NULL AND bookingpress_staffmember_workday_key = %s", $bookingpress_selected_staffmember_id, ucfirst($current_day)), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_expansion_staff_member_workhours is a table name. false alarm

				$bpa_staff_workhour_breaks = array();

				//$staff_workhours_breaks
				$staff_workhours_breaks = $wpdb->get_results( $wpdb->prepare( "SELECT bookingpress_staffmember_workhours_start_time as bpa_staff_start_time, bookingpress_staffmember_workhours_end_time as bpa_staff_end_time FROM {$tbl_expansion_staff_member_workhours} WHERE bookingpress_staffmember_workhours_is_break = %d {$and_service_check_where} AND bookingpress_staffmember_workhours_start_time IS NOT NULL AND bookingpress_staffmember_workday_key = %s AND bookingpress_staffmember_id = %d", 1, ucfirst( $current_day ), $bookingpress_selected_staffmember_id ) ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_expansion_staff_member_workhours is a table name.

				if( !empty( $staff_workhours_breaks ) ){
					foreach( $staff_workhours_breaks as $staff_break_workhour_data ){
						$sf_break_start_time = $staff_break_workhour_data->bpa_staff_start_time;
						$sf_break_end_time = $staff_break_workhour_data->bpa_staff_end_time;

						$bpa_staff_workhour_breaks[] = array(
							'start_time' => date('H:i', strtotime( $sf_break_start_time ) ),
							'end_time' => date('H:i', strtotime( $sf_break_end_time ) ),
						);
					}
				}

				if( !empty( $bookingpress_staffmember_workhours ) ){
					$staffmember_current_time = $service_start_time = apply_filters( 'bookingpress_modify_service_start_time', date('H:i', strtotime($bookingpress_staffmember_workhours['bookingpress_staffmember_workhours_start_time'])), $selected_service_id );
					$staffmember_end_time     = apply_filters( 'bookingpress_modify_service_end_time', date('H:i', strtotime($bookingpress_staffmember_workhours['bookingpress_staffmember_workhours_end_time'])), $selected_service_id );

					if( '00:00' == $staffmember_end_time ){
						$staffmember_end_time = '24:00';
					}
					if ($service_start_time != null && $staffmember_end_time != null ) {
						
						while ( $staffmember_current_time <= $staffmember_end_time ) {
							if ($staffmember_current_time > $staffmember_end_time ) {
								break;
							}

							$service_tmp_date_time = $selected_date .' '.$staffmember_current_time;
							$service_tmp_end_time = date( 'Y-m-d', ( strtotime($selected_date. ' ' . $staffmember_current_time ) + ( $service_step_duration_val * 60 ) ) );

							if( $service_tmp_end_time > $selected_date  ){
								if( 1440 < $service_step_duration_val && $service_time_duration_unit != 'd' ){
									break;
								}
							}

							$service_tmp_current_time = $staffmember_current_time;
							
							if ($staffmember_current_time == '00:00' ) {
								$staffmember_current_time = date('H:i', strtotime($staffmember_current_time) + ( $service_step_duration_val * 60 ));
							} else {
								$service_tmp_time_obj = new DateTime($selected_date .' ' . $staffmember_current_time);
								$service_tmp_time_obj->add(new DateInterval('PT' . $service_step_duration_val . 'M'));
								$staffmember_current_time = $service_tmp_time_obj->format('H:i');
								$service_current_date = $service_tmp_time_obj->format('Y-m-d');
								if( $service_current_date > $selected_date ){
									if( $staffmember_end_time == '24:00' && strtotime($service_current_date.' '.$staffmember_current_time) > strtotime( $service_current_date . ' 00:00' ) ){
										break;
									}
								}
							}
	
							if ($staffmember_current_time < $service_start_time || $staffmember_current_time == $service_start_time ) {
								$staffmember_current_time = $staffmember_end_time;
							}

							$break_start_time = '';
							$break_end_time = '';
							/** Staff member work hour break time logic start */

							/* $staffmember_workhour_breaks_data = $wpdb->get_row( $wpdb->prepare( "SELECT bookingpress_staffmember_workhours_start_time, bookingpress_staffmember_workhours_end_time FROM {$tbl_bookingpress_staff_member_workhours} WHERE bookingpress_staffmember_workday_key = %s AND bookingpress_staffmember_workhours_is_break = %d AND bookingpress_staffmember_id = %d AND bookingpress_staffmember_workhours_start_time BETWEEN %s AND %s", ucfirst($current_day), 1, $bookingpress_selected_staffmember_id, $service_tmp_current_time, $staffmember_current_time)); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staff_member_workhours is table name.

							if( !empty( $staffmember_workhour_breaks_data ) ){
								$break_start_time = date('H:i', strtotime( $staffmember_workhour_breaks_data->bookingpress_staffmember_workhours_start_time ) );
								$break_end_time = date('H:i', strtotime( $staffmember_workhour_breaks_data->bookingpress_staffmember_workhours_end_time ) );
								$staffmember_current_time = $break_start_time;
							} */

							/** Staff member work hour break time logic end */

							$bookingpress_timediff_in_minutes = round(abs(strtotime($staffmember_current_time) - strtotime($service_tmp_current_time)) / 60, 2);
							$is_booked_for_minimum = false;
							if( 'disabled' != $minimum_time_required ){
								$bookingpress_slot_start_datetime       = $selected_date . ' ' . $service_tmp_current_time . ':00';
								$bookingpress_slot_start_time_timestamp = strtotime( $bookingpress_slot_start_datetime );
								$bookingpress_time_diff = round( abs( current_time('timestamp') - $bookingpress_slot_start_time_timestamp ) / 60, 2 );
								
								if( $bookingpress_time_diff <= $minimum_time_required ){
									$is_booked_for_minimum = true;
								}
							}
							
							if ($break_start_time != $service_tmp_current_time && $bookingpress_timediff_in_minutes >= $service_step_duration_val && $staffmember_current_time <= $staffmember_end_time ) {
								if ($bpa_current_date == $selected_date ) {
									if ($service_tmp_current_time > $bpa_current_time && !$is_booked_for_minimum ) {

										$service_timing_arr = array(
											'start_time' => $service_tmp_current_time,
											'end_time'   => $staffmember_current_time,
											'break_start_time' => $break_start_time,
											'break_end_time' => $break_end_time,
											'store_start_time' => $service_tmp_current_time,
											'store_end_time' => $staffmember_current_time,
											'is_booked' => 0,
											'store_service_date' => $selected_date,
											'max_capacity' => $service_max_capacity,
											'total_booked' => 0
										);

										if( !empty( $bpa_staff_workhour_breaks ) ){
											$service_timing_arr = apply_filters( 'bpa_calculate_staff_breakhours_data', $service_timing_arr, $bpa_staff_workhour_breaks );
										}

										if( !empty( $service_timing_arr['is_blocked'] ) && true == $service_timing_arr['is_blocked'] ){
											$staffmember_current_time = $service_timing_arr['break_end_time'];
											continue;
										}
										
										//$service_timing_arr = apply_filters( 'bookingpress_calculate_time_with_client_timezone', $service_timing_arr, $selected_date );

										/** timeslot in client timezone */
										if( $display_slots_in_client_timezone ){

											$booking_timeslot_start = $selected_date.' '.$service_tmp_current_time.':00';
											$booking_timeslot_end = $selected_date .' '.$staffmember_current_time.':00';
											
											
											$booking_timeslot_start = apply_filters( 'bookingpress_appointment_change_to_client_timezone', $booking_timeslot_start, $bookingpress_timezone);	
											$booking_timeslot_end = apply_filters( 'bookingpress_appointment_change_to_client_timezone', $booking_timeslot_end, $bookingpress_timezone);
											
											$service_timing_arr['start_time'] = date('H:i', strtotime($booking_timeslot_start) );
											$service_timing_arr['end_time'] = date('H:i', strtotime( $booking_timeslot_end ) );

											$booking_timeslot_start_date = date('Y-m-d', strtotime( $booking_timeslot_start ) );

											if( $change_store_date ) {

												$store_selected_date = apply_filters( 'bookingpress_appointment_change_date_to_store_timezone', $selected_date, $service_timing_arr['start_time'], $bookingpress_timezone );
												
												$service_timing_arr['store_service_date'] = $store_selected_date;
												
												$store_selection_datetime = $store_selected_date . ' ' . $service_tmp_current_time;
												if( strtotime( $store_selection_datetime ) < current_time('timestamp' ) || $store_selected_date != $selected_date ){
													continue;
												}
											}
											if( $selected_date < $booking_timeslot_start_date){
												break;
											}
										}
										$workhour_data[] = $service_timing_arr;
									}else {
										$service_timings_data['is_daysoff'] = true;
									}
								} else {
									if( !$is_booked_for_minimum ){
										$service_timing_arr = array(
											'start_time' => $service_tmp_current_time,
											'end_time'   => $staffmember_current_time,
											'break_start_time' => $break_start_time,
											'break_end_time' => $break_end_time,
											'store_start_time' => $service_tmp_current_time,
											'store_end_time' => $staffmember_current_time,
											'store_service_date' => $selected_date,
											'is_booked' => 0,
											'max_capacity' => $service_max_capacity,
											'total_booked' => 0
										);
										
										if( !empty( $bpa_staff_workhour_breaks ) ){
											$service_timing_arr = apply_filters( 'bpa_calculate_staff_breakhours_data', $service_timing_arr, $bpa_staff_workhour_breaks );
										}

										if( !empty( $service_timing_arr['is_blocked'] ) && true == $service_timing_arr['is_blocked'] ){
											$staffmember_current_time = $service_timing_arr['break_end_time'];
											continue;
										}

										if( $display_slots_in_client_timezone ){
	
											$booking_timeslot_start = $selected_date.' '.$service_tmp_current_time.':00';
											$booking_timeslot_end = $selected_date .' '.$staffmember_current_time.':00';
											
											
											$booking_timeslot_start = apply_filters( 'bookingpress_appointment_change_to_client_timezone', $booking_timeslot_start, $bookingpress_timezone);	
											$booking_timeslot_end = apply_filters( 'bookingpress_appointment_change_to_client_timezone', $booking_timeslot_end, $bookingpress_timezone);
											
											$service_timing_arr['start_time'] = date('H:i', strtotime($booking_timeslot_start) );
											$service_timing_arr['end_time'] = date('H:i', strtotime( $booking_timeslot_end ) );
	
											$booking_timeslot_start_date = date('Y-m-d', strtotime( $booking_timeslot_start ) );

											if( $change_store_date ) {

												$store_selected_date = apply_filters( 'bookingpress_appointment_change_date_to_store_timezone', $selected_date, $service_timing_arr['start_time'], $bookingpress_timezone );
												
												$service_timing_arr['store_service_date'] = $store_selected_date;
												
												$store_selection_datetime = $store_selected_date . ' ' . $service_tmp_current_time;
												if( strtotime( $store_selection_datetime ) < current_time('timestamp' ) || $store_selected_date != $selected_date ){
													continue;
												}
											}
											if( $selected_date < $booking_timeslot_start_date){
												break;
											}
										}
										$workhour_data[] = $service_timing_arr;
									}
								}
							} else {
								if($staffmember_current_time >= $staffmember_end_time){
									break;
								}
							}

							if (! empty($break_end_time) ) {
								$staffmember_current_time = $break_end_time;
							}
			
							if ($staffmember_current_time == $staffmember_end_time ) {
								break;
							}

							if(!empty($default_timeslot_step) && $default_timeslot_step != $service_step_duration_val && empty($break_start_time)){

								$service_tmp_time_obj = new DateTime($selected_date . ' ' . $service_tmp_current_time);
								$service_tmp_time_obj->add(new DateInterval('PT' . $default_timeslot_step . 'M'));
								$staffmember_current_time = $service_tmp_time_obj->format('H:i');
								
								$service_current_date = $service_tmp_time_obj->format('Y-m-d');
								if( $service_current_date > $selected_date ){
									break;
								}
							}
						}
						if( empty( $workhour_data ) ){
							$service_timings_data['is_daysoff'] = true;
						}
						$service_timings_data['service_timings'] = $workhour_data;

						return $service_timings_data;
					}
				} else {
					$service_timings_data['is_daysoff'] = true;
				}

			}
			#####print_r($service_timings_data );
			return $service_timings_data;
		}
        
        
        function update_specifict_workhour_before_Edit(){
            global $BookingPressPro;
            $updt = 0;
            $response = [
            'variant' => 'error',
            'msg' => 'fallo al actualizar',
            'title' => 'Fallo'
            ];
            
            
            $bookingpress_update_id     = ! empty( $_REQUEST['update_id'] ) ? ( intval( $_REQUEST['update_id'] ) ) : 0;
            
            if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_workhours' ) ) {
    			$bookingpress_configure_specific_workhour = ! empty( $_REQUEST['bookingpress_configure_specific_workhour'] ) ? sanitize_text_field( $_REQUEST['bookingpress_configure_specific_workhour'] ) : 'false';
    			$updt = $this->update_bookingpress_staffmembersmeta( $bookingpress_update_id, 'bookingpress_configure_specific_workhour', $bookingpress_configure_specific_workhour );
                
            }
            if( $updt ){
                $response = [
                'variant' => 'success',
                'msg' => 'Actualizada configuracion especifica',
                'title' => 'Exito'
                ];
            }
            
            wp_send_json( $response );
            die;
        }

        function bookingpress_add_staff_member_func(){
			global $wpdb, $BookingPress,$tbl_bookingpress_staffmembers,$tbl_bookingpress_staff_member_workhours,$tbl_bookingpress_staffmembers_daysoff,$bookingpress_global_options,$BookingPressPro,$tbl_bookingpress_staffmembers_services,$tbl_bookingpress_staffmembers_special_day,$tbl_bookingpress_staffmembers_special_day_breaks,$tbl_bookingpress_services,$bookingpress_services;

			$response                   = array();

			$bpa_check_authorization = $this->bpa_check_authentication( 'add_staffmembers_details', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }
			
			$response['variant'] = 'error';
			$response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
			$response['msg'] = '';

			$response['staffmember_id'] = '';
			$response['wpuser_id']      = '';

			if ( ! empty( $_REQUEST ) ) {

				$bookingpress_action  = ! empty( $_REQUEST['bookingpress_action'] ) ? ( sanitize_text_field( $_REQUEST['bookingpress_action'] ) ) : '';
				$bookingpress_existing_user_id = ! empty( $_REQUEST['wp_user'] ) ? trim( sanitize_text_field( $_REQUEST['wp_user'] ) ) : '';
				$bookingpress_firstname        = ! empty( $_REQUEST['firstname'] ) ? trim( stripslashes_deep(sanitize_text_field( $_REQUEST['firstname'] )) ) : '';
				$bookingpress_lastname         = ! empty( $_REQUEST['lastname'] ) ? trim( stripslashes_deep( sanitize_text_field( $_REQUEST['lastname'] )) ) : '';
				$bookingpress_email            = ! empty( $_REQUEST['email'] ) ? sanitize_email( $_REQUEST['email'] ) : '';
				$bookingpress_password         = ! empty( $_REQUEST['password'] ) ? $_REQUEST['password'] : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_PEQUEST contains password

				
				if($bookingpress_action == 'bookingpress_edit_staffmember') {
					$is_service_exist = 0;
					$bookingpress_services_list = $wpdb->get_results( 'SELECT bookingpress_service_id FROM ' . $tbl_bookingpress_services,ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared --Reason: 
					if(!empty($bookingpress_services_list))  {
						foreach($bookingpress_services_list as $key => $val) {					
							$bookingpress_service_id = $val['bookingpress_service_id'];
							$show_service_on_site = $bookingpress_services->bookingpress_get_service_meta($bookingpress_service_id, 'show_service_on_site');					
							if($show_service_on_site == true ) {
								$is_service_exist = $is_service_exist + 1;
							}
						}
					}				
					if(empty($_REQUEST['service_details']['assigned_service_list']) && $is_service_exist > 0 ) {					
						$response['msg'] = esc_html__( 'Please assign service to Staff member', 'bookingpress-appointment-booking' );
						echo wp_json_encode( $response );
						die();
					}
				}

				if ( strlen( $bookingpress_firstname ) > 255 ) {
					$response['msg'] = esc_html__( 'Firstname is too long...', 'bookingpress-appointment-booking' );
					echo wp_json_encode( $response );
					die();
				}

				if ( strlen( $bookingpress_lastname ) > 255 ) {
					$response['msg'] = esc_html__( 'Lastname is too long...', 'bookingpress-appointment-booking' );
					echo wp_json_encode( $response );
					die();
				}

				if ( strlen( $bookingpress_email ) > 255 ) {
					$response['msg'] = esc_html__( 'Email address is too long...', 'bookingpress-appointment-booking' );
					echo wp_json_encode( $response );
					die();
				}
				if ( $bookingpress_existing_user_id == 'add_new' && email_exists( $bookingpress_email ) ) {
					$response['msg'] = esc_html__( 'Email address is already exists', 'bookingpress-appointment-booking' );
					echo wp_json_encode( $response );
					die();
				}
				if ( $bookingpress_existing_user_id == 'add_new' && ! empty( $bookingpress_password ) ) {
					$wp_create_wp_user_id          = wp_create_user( $bookingpress_email, $bookingpress_password, $bookingpress_email );
					$bookingpress_existing_user_id = $wp_create_wp_user_id;
				}

				$bookingpress_phone         = ! empty( $_REQUEST['phone'] ) ? trim( sanitize_text_field( $_REQUEST['phone'] ) ) : '';
				$bookingpress_country_phone = ! empty( $_REQUEST['staff_member_phone_country'] ) ? trim( sanitize_text_field( $_REQUEST['staff_member_phone_country'] ) ) : '';
				$bookingpress_phone_dial_code = !empty($_REQUEST['staff_member_dial_code']) ? trim(sanitize_text_field($_REQUEST['staff_member_dial_code'])) : '';
				$bookingpress_note          = ! empty( $_REQUEST['note'] ) ? trim( sanitize_textarea_field( $_REQUEST['note'] ) ) : '';
				
				$bookingpress_update_id     = ! empty( $_REQUEST['update_id'] ) ? ( intval( $_REQUEST['update_id'] ) ) : 0;

				$bookingpress_status        = ! empty( $_REQUEST['status'] ) && $_REQUEST['status'] == 'false' && $bookingpress_update_id != 0 ? 0 : 1;
 
				$bookingpress_visibility    = ! empty( $_REQUEST['visibility'] ) ? sanitize_textarea_field( $_REQUEST['visibility'] )  : 'public';

				if( !empty($bookingpress_phone) && !empty( $bookingpress_phone_dial_code) ){

                    $customer_phone_pattern = '/(^\+'.$bookingpress_phone_dial_code.')/';
                    if( preg_match($customer_phone_pattern, $bookingpress_phone) ){
                        $bookingpress_phone = preg_replace( $customer_phone_pattern, '', $bookingpress_phone) ;
                    }
                }

				$booking_user_update_meta_details['first_name'] = $bookingpress_firstname;
				$booking_user_update_meta_details['last_name']  = $bookingpress_lastname;
				$booking_user_update_meta_details['staff_email'] = $bookingpress_email;

				if($bookingpress_action == 'bookingpress_edit_staffmember' ) {
					if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_basic_details' ) ) {
						if ( empty( $bookingpress_update_id ) ) {
							$staffmember_pos_data          = $wpdb->get_row('SELECT bookingpress_staffmember_position FROM ' . $tbl_bookingpress_staffmembers . ' ORDER BY bookingpress_staffmember_position DESC LIMIT 1', ARRAY_A);// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared -- Reason: $tbl_bookingpress_services is table name defined globally. False Positive alarm
							$staffmember_position = 0;						
							if (!empty($staffmember_pos_data) ) {
								$staffmember_position = $staffmember_pos_data['bookingpress_staffmember_position'] + 1;
							}					
							$bookingpress_staffmember_details = array(
								'bookingpress_staffmember_name' => ! empty( $bookingpress_firstname ) ? stripslashes_deep($bookingpress_firstname) : $bookingpress_email,
								'bookingpress_staffmember_firstname' => stripslashes_deep($bookingpress_firstname),
								'bookingpress_staffmember_lastname' => stripslashes_deep($bookingpress_lastname),
								'bookingpress_staffmember_phone' => $bookingpress_phone,
								'bookingpress_staffmember_country' => $bookingpress_country_phone,
								'bookingpress_staffmember_email' => $bookingpress_email,
								'bookingpress_staffmember_note' => stripslashes_deep($bookingpress_note),
								'bookingpress_staffmember_position' => $staffmember_position,
								'bookingpress_staffmember_status' => $bookingpress_status,
								'bookingpress_staffmember_visibility' => $bookingpress_visibility,
								'bookingpress_staffmember_country_dial_code' => $bookingpress_phone_dial_code,
							);

							$bookingpress_staffmember_details = $this->bookingpress_create_staffmember( $bookingpress_staffmember_details, $bookingpress_existing_user_id );

							if ( ! empty( $bookingpress_existing_user_id ) ) {
								do_action( 'bookingpress_user_update_meta', $bookingpress_existing_user_id, $booking_user_update_meta_details );
							}
							$userObj = new WP_User( $bookingpress_existing_user_id );
							$userObj->add_role( 'bookingpress-staffmember' );
							$this->bookingpress_staffmember_assign_capability( $bookingpress_existing_user_id );
							if ( is_array( $bookingpress_staffmember_details ) && isset( $bookingpress_staffmember_details['bookingpress_staffmember_id'] ) && isset( $bookingpress_staffmember_details['bookingpress_wpuser_id'] ) ) {

								$bookingpress_update_id        = $bookingpress_staffmember_details['bookingpress_staffmember_id'];
								$bookingpress_existing_user_id = $bookingpress_staffmember_details['bookingpress_wpuser_id'];
							}
						} else {
							$bookingpress_existing_staffmember_details = $wpdb->get_row( $wpdb->prepare( "SELECT bookingpress_wpuser_id FROM {$tbl_bookingpress_staffmembers} WHERE bookingpress_staffmember_id = %d", $bookingpress_update_id ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staffmembers is a table name. false alarm

							if ( ! empty( $bookingpress_existing_staffmember_details ) && ! empty( $bookingpress_existing_user_id ) ) {
								$bookingpress_existing_wp_user_id = ! empty( $bookingpress_existing_staffmember_details['bookingpress_wpuser_id'] ) ? $bookingpress_existing_staffmember_details['bookingpress_wpuser_id'] : '';
								if ( $bookingpress_existing_wp_user_id != $bookingpress_existing_user_id ) {
									$userObj = new WP_User( $bookingpress_existing_wp_user_id );
									if ( $BookingPressPro->bookingpress_check_user_role( 'bookingpress-staffmember', $bookingpress_existing_wp_user_id ) ) {
										$userObj->remove_role( 'bookingpress-staffmember' );
										$staffmembers_default_cap = $bookingpress_global_options->bookingpress_global_options();
										$staffmembers_default_cap = ! empty( $staffmembers_default_cap['staffmember_default_cap'] ) ? $staffmembers_default_cap['staffmember_default_cap'] : array();
										foreach ( $staffmembers_default_cap as $staffmembers_default_cap_key => $staffmembers_default_cap_val ) {
											if ( $userObj->has_cap( $staffmembers_default_cap_val ) ) {
												$userObj->remove_cap( $staffmembers_default_cap_val );
											}
										}
									}
								}
								if ( ! empty( $bookingpress_password ) ) {
									$update_data = array(
										'ID'        => $bookingpress_existing_user_id,
										'user_pass' => $bookingpress_password,
									);
									$user_ID     = wp_update_user( $update_data );
								}
								$userObj = new WP_User( $bookingpress_existing_user_id );
								if ( ! $BookingPressPro->bookingpress_check_user_role( 'bookingpress-staffmember', $bookingpress_existing_user_id ) ) {
									$userObj->add_role( 'bookingpress-staffmember' );
								}
								$this->bookingpress_staffmember_assign_capability( $bookingpress_existing_user_id );

								do_action( 'bookingpress_user_update_meta', $bookingpress_existing_user_id, $booking_user_update_meta_details );
								$bookingpress_update_fields          = array(
									'bookingpress_staffmember_login' => $bookingpress_email,
									'bookingpress_staffmember_firstname' => $bookingpress_firstname,
									'bookingpress_staffmember_lastname' => $bookingpress_lastname,
									'bookingpress_staffmember_email' => $bookingpress_email,
									'bookingpress_staffmember_phone' => $bookingpress_phone,
									'bookingpress_staffmember_country_phone' => $bookingpress_country_phone,
									'bookingpress_staffmember_status' => $bookingpress_status,
									'bookingpress_staffmember_country_dial_code' => $bookingpress_phone_dial_code,
									'bookingpress_wpuser_id' => $bookingpress_existing_user_id,
								);
								$bookingpress_update_where_condition = array(
									'bookingpress_staffmember_id' => $bookingpress_update_id,
								);
								$wpdb->update( $tbl_bookingpress_staffmembers, $bookingpress_update_fields, $bookingpress_update_where_condition );
								$this->update_bookingpress_staffmembersmeta( $bookingpress_update_id, 'staffmember_note', $bookingpress_note );
								$this->update_bookingpress_staffmembersmeta( $bookingpress_update_id, 'staffmember_visibility', $bookingpress_visibility );								
							}
						}

						$user_image_details = array();
						if ( ! empty( $_REQUEST['avatar_name'] ) && ! empty( $_REQUEST['avatar_url'] ) ) {
							$staffmember_img_url  = esc_url_raw( $_REQUEST['avatar_url'] );
							$staffmember_img_name = sanitize_file_name( $_REQUEST['avatar_name'] );

							$bookingpress_get_existing_avatar_details = $this->get_bookingpress_staffmembersmeta( $bookingpress_update_id, 'staffmember_avatar_details' );
							$bookingpress_get_existing_avatar_details = ! empty( $bookingpress_get_existing_avatar_details ) ? maybe_unserialize( $bookingpress_get_existing_avatar_details ) : array();
							$bookingpress_get_existing_avatar_url     = ! empty( $bookingpress_get_existing_avatar_details[0]['url'] ) ? $bookingpress_get_existing_avatar_details[0]['url'] : '';

							if ( $staffmember_img_url != $bookingpress_get_existing_avatar_url ) {
								global $BookingPress;
								$upload_dir                 = BOOKINGPRESS_UPLOAD_DIR . '/';
								$bookingpress_new_file_name = current_time( 'timestamp' ) . '_' . $staffmember_img_name;
								$upload_path                = $upload_dir . $bookingpress_new_file_name;
								$bookingpress_upload_res = new bookingpress_fileupload_class( $staffmember_img_url, true );
								$bookingpress_upload_res->check_cap          = true;
								$bookingpress_upload_res->check_nonce        = true;
								$bookingpress_upload_res->nonce_data         = isset($_REQUEST['_wpnonce']) ? sanitize_text_field($_REQUEST['_wpnonce']) : '';
								$bookingpress_upload_res->nonce_action       = 'bpa_wp_nonce';
								$bookingpress_upload_res->check_only_image   = true;
								$bookingpress_upload_res->check_specific_ext = false;
								$bookingpress_upload_res->allowed_ext        = array();
                                $upload_response = $bookingpress_upload_res->bookingpress_process_upload( $upload_path );
								//$bookingpress_upload_res    = $BookingPress->bookingpress_file_upload_function( $staffmember_img_url, $upload_path );

								if( true == $upload_response ){
									$user_image_new_url   = BOOKINGPRESS_UPLOAD_URL . '/' . $bookingpress_new_file_name;
									$user_image_details[] = array(
										'name' => $bookingpress_new_file_name,
										'url'  => $user_image_new_url,
									);

									$this->update_bookingpress_staffmembersmeta( $bookingpress_update_id, 'staffmember_avatar_details', maybe_serialize( $user_image_details ) );

									$bookingpress_file_name_arr = explode( '/', $staffmember_img_url );
									$bookingpress_file_name     = $bookingpress_file_name_arr[ count( $bookingpress_file_name_arr ) - 1 ];
									if( file_exists( BOOKINGPRESS_TMP_IMAGES_DIR . '/' . $bookingpress_file_name ) ){
										@unlink( BOOKINGPRESS_TMP_IMAGES_DIR . '/' . $bookingpress_file_name );
									}
									if ( ! empty( $bookingpress_get_existing_avatar_url ) ) {
										// Remove old image and upload new image
										$bookingpress_file_name_arr = explode( '/', $bookingpress_get_existing_avatar_url );
										$bookingpress_file_name     = $bookingpress_file_name_arr[ count( $bookingpress_file_name_arr ) - 1 ];
										if( file_exists( BOOKINGPRESS_UPLOAD_DIR . '/' . $bookingpress_file_name ) ){
											@unlink( BOOKINGPRESS_UPLOAD_DIR . '/' . $bookingpress_file_name );
										}
									}
								}

							}
						} else {
							$this->update_bookingpress_staffmembersmeta( $bookingpress_update_id, 'staffmember_avatar_details', maybe_serialize( $user_image_details ) );
						}
					}
				
					// save services setails

					if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_services' ) ) {
						$wpdb->delete( $tbl_bookingpress_staffmembers_services, array( 'bookingpress_staffmember_id' => $bookingpress_update_id ) );

						if ( ! empty( $_REQUEST['service_details']['assigned_service_list'] ) ) {
							$bookingpress_assigned_service_list = ! empty( $_REQUEST['service_details']['assigned_service_list'] ) ? array_map( array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['service_details']['assigned_service_list'] ) : array();// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_POST contains mixed array and will be sanitized using 'appointment_sanatize_field' function
							foreach ( $bookingpress_assigned_service_list as $bookingpress_service_key => $bookingpress_service_val ) {

								$bookingpress_db_fields = array(
									'bookingpress_staffmember_id' => intval( $bookingpress_update_id ),
									'bookingpress_service_id' => intval( $bookingpress_service_val['assign_service_id'] ),
									'bookingpress_service_price' => floatval( $bookingpress_service_val['assign_service_price'] ),
									'bookingpress_service_capacity' => intval($bookingpress_service_val['assign_service_capacity']),
									'bookingpress_service_min_capacity' => intval($bookingpress_service_val['assign_service_min_capacity']),
									'bookingpress_created_date' => current_time( 'mysql' ),
								);

								$wpdb->insert( $tbl_bookingpress_staffmembers_services, $bookingpress_db_fields );
							}
						}
					}	
				}	

				if( $bookingpress_action == 'bookingpress_shift_managment') {
					// Save workhours details
					if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_workhours' ) ) {
						$bookingpress_configure_specific_workhour = ! empty( $_REQUEST['bookingpress_configure_specific_workhour'] ) ? sanitize_text_field( $_REQUEST['bookingpress_configure_specific_workhour'] ) : 'false';
						$this->update_bookingpress_staffmembersmeta( $bookingpress_update_id, 'bookingpress_configure_specific_workhour', $bookingpress_configure_specific_workhour );
                        
                        global $tbl_expansion_staff_member_workhours;
                        $selected_staff_service = !empty($_POST['workhours_selected_service_id']) ? intval($_POST['workhours_selected_service_id']) : 0; // phpcs:ignore
                        $delete_all_workHours = !empty($_POST['workhours_manage_delete_all']) ? intval($_POST['workhours_manage_delete_all']) : 0; // phpcs:ignore

						$bookingpress_delete_staff_workhours_where_condition = array(
							'bookingpress_staffmember_id' => $bookingpress_update_id,
							'bookingpress_staffmember_workhours_is_break' => 0,
						);
                        if(!$delete_all_workHours) $bookingpress_delete_staff_workhours_where_condition['service_id'] = $selected_staff_service;
                        
                        
						$bookingpress_delete_staff_workhours_where_condition = apply_filters('bookingpress_delete_staff_workhours_where_condition_filter', $bookingpress_delete_staff_workhours_where_condition, $_REQUEST);
						$wpdb->delete( $tbl_expansion_staff_member_workhours, $bookingpress_delete_staff_workhours_where_condition );

						$bookingpress_delete_staff_workhours_break_where_condition = array(
							'bookingpress_staffmember_id' => $bookingpress_update_id,
							'bookingpress_staffmember_workhours_is_break' => 1,
						);
                        if(!$delete_all_workHours) $bookingpress_delete_staff_workhours_break_where_condition['service_id'] = $selected_staff_service;
                        
						$bookingpress_delete_staff_workhours_break_where_condition = apply_filters('bookingpress_delete_staff_workhours_break_where_condition_filter', $bookingpress_delete_staff_workhours_break_where_condition, $_REQUEST);
						$wpdb->delete( $tbl_expansion_staff_member_workhours, $bookingpress_delete_staff_workhours_break_where_condition );
						

						if ( ! empty( $bookingpress_configure_specific_workhour ) && $bookingpress_configure_specific_workhour == 'true' ) {

							$_REQUEST['workhours_details'] = !empty($_REQUEST['workhours_details']) ? json_decode( stripslashes_deep( $_REQUEST['workhours_details'] ), true ) : array(); //phpcs:ignore

							$bookingpress_workhour_days = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' );
							foreach ( $bookingpress_workhour_days as $workhour_key => $workhour_val ) {
								$workhour_start_time = ! empty( $_REQUEST['workhours_details'][ $workhour_val ]['start_time'] ) ? sanitize_text_field( $_REQUEST['workhours_details'][ $workhour_val ]['start_time'] ) : '09:00:00';
								$workhour_end_time   = ! empty( $_REQUEST['workhours_details'][ $workhour_val ]['end_time'] ) ? sanitize_text_field( $_REQUEST['workhours_details'][ $workhour_val ]['end_time'] ) : '17:00:00';

								if ( $workhour_start_time == 'Off' ) {
									$workhour_start_time = null;
								}
								if ( $workhour_end_time == 'Off' ) {
									$workhour_end_time = null;
								}
								$bookingpress_db_fields = array(
									'bookingpress_staffmember_id' => $bookingpress_update_id,
                                    'service_id'    => $selected_staff_service,
									'bookingpress_staffmember_workday_key' => $workhour_val,
									'bookingpress_staffmember_workhours_start_time' => $workhour_start_time,
									'bookingpress_staffmember_workhours_end_time' => $workhour_end_time,
								);
								$bookingpress_db_fields = apply_filters('bookingpress_modify_staff_workhours_details', $bookingpress_db_fields, $_REQUEST);
								$wpdb->insert( $tbl_expansion_staff_member_workhours, $bookingpress_db_fields );
							}

							$_REQUEST['break_details'] = !empty($_REQUEST['break_details']) ? json_decode( stripslashes_deep( $_REQUEST['break_details'] ), true ) : array(); //phpcs:ignore

							$bookingpress_break_days = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' );
							foreach ( $bookingpress_break_days as $break_key => $break_val ) {
								$bookingpress_day_break_details = ! empty( $_REQUEST['break_details'][ $break_val ] ) ? array_map( array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['break_details'][ $break_val ] ) : array();// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_POST contains mixed array and will be sanitized using 'appointment_sanatize_field' function
								if ( ! empty( $bookingpress_day_break_details ) ) {
									foreach ( $bookingpress_day_break_details as $break_day_arr_key => $break_day_arr_val ) {
										$break_start_time       = $break_day_arr_val['start_time'];
										$break_end_time         = $break_day_arr_val['end_time'];
										$bookingpress_db_fields = array(
											'bookingpress_staffmember_id' => $bookingpress_update_id,
                                            'service_id'    => $selected_staff_service,
											'bookingpress_staffmember_workday_key' => $break_val,
											'bookingpress_staffmember_workhours_start_time' => $break_start_time,
											'bookingpress_staffmember_workhours_end_time' => $break_end_time,
											'bookingpress_staffmember_workhours_is_break' => 1,
										);
										$bookingpress_db_fields = apply_filters('bookingpress_modify_staff_workhours_details', $bookingpress_db_fields, $_REQUEST);
										$wpdb->insert( $tbl_expansion_staff_member_workhours, $bookingpress_db_fields );
									}
								}
							}
						}
					}

					/* save Staffmember day off*/
					if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_daysoffs' ) ) {
						$wpdb->delete( $tbl_bookingpress_staffmembers_daysoff, array( 'bookingpress_staffmember_id' => $bookingpress_update_id ) );
						if ( ! empty( $_REQUEST['dayoff_details'] ) ) {

							$_REQUEST['dayoff_details'] = !empty( $_REQUEST['dayoff_details']) ? json_decode( stripslashes_deep( $_REQUEST['dayoff_details'] ), true ) : array(); //phpcs:ignore

							$bpa_daysoff_opts = array_map( array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['dayoff_details'] ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_REQUEST contains mixed array and will be sanitized using 'appointment_sanatize_field' function
							
							foreach ( $bpa_daysoff_opts as $daysoff ) {
								$daysoff_date  = ! empty( $daysoff['dayoff_date'] ) ? $daysoff['dayoff_date'] : '';
								$dayoff_date_end  = ! empty( $daysoff['dayoff_date_end'] ) ? $daysoff['dayoff_date_end'] : '';
								$dayoff_name   = ! empty( $daysoff['dayoff_name'] ) ? $daysoff['dayoff_name'] : '';
								$dayoff_repeat = ( ! empty( $daysoff['dayoff_repeat'] ) && $daysoff['dayoff_repeat'] == true ) ? 1 : 0;

								if($dayoff_date_end == null || $dayoff_date_end == 'null' || empty($dayoff_date_end)){
									$dayoff_date_end = $daysoff_date;
								}

								$daysoff_repeat_frequency = !empty( $daysoff['repeat_frequency'] ) ? intval( $daysoff['repeat_frequency'] ) : 1;
								$daysoff_repeat_frequency_type = !empty( $daysoff['repeat_frequency_type'] ) ? sanitize_text_field( $daysoff['repeat_frequency_type'] ) : 'year';
								$daysoff_repeat_duration = !empty( $daysoff['repeat_duration'] ) ? sanitize_text_field( $daysoff['repeat_duration'] ) : 'forever';
								$daysoff_repeat_times	 = !empty( $daysoff['repeat_times'] ) ? intval( $daysoff['repeat_times'] ) : 1;
								$daysoff_repeat_date	 = !empty( $daysoff['repeat_date'] ) ? sanitize_text_field( $daysoff['repeat_date'] ) : date('Y-m-d', strtotime( '+1 year' ) );

								$args = array(
									'bookingpress_staffmember_id' => $bookingpress_update_id,
									'bookingpress_staffmember_daysoff_name' => $dayoff_name,
									'bookingpress_staffmember_daysoff_date' => $daysoff_date,
									'bookingpress_staffmember_daysoff_enddate' => $dayoff_date_end,
									'bookingpress_staffmember_daysoff_repeat' => $dayoff_repeat,
									'bookingpress_staffmember_daysoff_repeat_frequency' => $daysoff_repeat_frequency,
									'bookingpress_staffmember_daysoff_repeat_frequency_type' => $daysoff_repeat_frequency_type,
									'bookingpress_staffmember_daysoff_repeat_duration' => $daysoff_repeat_duration,
									'bookingpress_staffmember_daysoff_repeat_times' => $daysoff_repeat_times,
									'bookingpress_staffmember_daysoff_repeat_date' => $daysoff_repeat_date,
									'bookingpress_staffmember_daysoff_created' => current_time( 'mysql' ),
								);

								$wpdb->insert( $tbl_bookingpress_staffmembers_daysoff, $args );

								$bookingpress_child_holiday_dates = array();
								if($daysoff_date != $dayoff_date_end){                    									
									$startDate = strtotime($daysoff_date)+86400;
									$endDate = strtotime($dayoff_date_end);                 
									for ($currentDate = $startDate; $currentDate <= $endDate; $currentDate += (86400)) {
										$date = date('Y-m-d', $currentDate);
										$bookingpress_child_holiday_dates[] = $date;
									}                    
								} 
								if(!empty($bookingpress_child_holiday_dates)){
									$dayoff_parent_id = $wpdb->insert_id;
									foreach($bookingpress_child_holiday_dates as $holiday_date){
										$args          = array(
											'bookingpress_staffmember_id' => $bookingpress_update_id,
											'bookingpress_staffmember_daysoff_name' => $dayoff_name,
											'bookingpress_staffmember_daysoff_date' => $holiday_date,
											'bookingpress_staffmember_daysoff_enddate' => $dayoff_date_end,
											'bookingpress_staffmember_daysoff_parent' => $dayoff_parent_id,
											'bookingpress_staffmember_daysoff_repeat' => $dayoff_repeat,
											'bookingpress_staffmember_daysoff_repeat_frequency' => $daysoff_repeat_frequency,
											'bookingpress_staffmember_daysoff_repeat_frequency_type' => $daysoff_repeat_frequency_type,
											'bookingpress_staffmember_daysoff_repeat_duration' => $daysoff_repeat_duration,
											'bookingpress_staffmember_daysoff_repeat_times' => $daysoff_repeat_times,
											'bookingpress_staffmember_daysoff_repeat_date' => $daysoff_repeat_date,
											'bookingpress_staffmember_daysoff_created' => current_time( 'mysql' ),
										);
										$wpdb->insert( $tbl_bookingpress_staffmembers_daysoff, $args );										
									}
								}
							}
						}
					}

					/* save Staffmember special day*/

					if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_edit_special_days' ) ) {
						$bookingpress_special_day_data = $wpdb->get_results( $wpdb->prepare( 'SELECT bookingpress_staffmember_special_day_id FROM ' . $tbl_bookingpress_staffmembers_special_day . ' WHERE bookingpress_staffmember_id = %d', $bookingpress_update_id ), ARRAY_A );   // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared --Reason: $tbl_bookingpress_staffmembers_special_days is a table name. false alarm
						$wpdb->delete( $tbl_bookingpress_staffmembers_special_day, array( 'bookingpress_staffmember_id' => $bookingpress_update_id ) );

						if ( ! empty( $bookingpress_special_day_data ) ) {
							foreach ( $bookingpress_special_day_data as $bookingpress_special_day_data_key => $bookingpress_special_day_data_value ) {
								$bookingpress_special_day_id = ! empty( $bookingpress_special_day_data_value['bookingpress_staffmember_special_day_id'] ) ? intval( $bookingpress_special_day_data_value['bookingpress_staffmember_special_day_id'] ) : 0;
								$wpdb->delete( $tbl_bookingpress_staffmembers_special_day_breaks, array( 'bookingpress_special_day_id' => $bookingpress_special_day_id ) );
							}
						}

						$_REQUEST['special_day_details'] = !empty( $_REQUEST['special_day_details']) ? json_decode( stripslashes_deep( $_REQUEST['special_day_details'] ), true ) : array(); //phpcs:ignore

						if ( ! empty( $_REQUEST['special_day_details'] ) && is_array( $_REQUEST['special_day_details'] ) ) {
							foreach ( $_REQUEST['special_day_details'] as $special_day ) { //phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason data is sanitized further
								$bookingpress_special_day_start_date = ! empty( $special_day['special_day_start_date'] ) ? sanitize_text_field( $special_day['special_day_start_date'] ) : '';
								$bookingpress_special_day_end_date   = ! empty( $special_day['special_day_end_date'] ) ? sanitize_text_field( $special_day['special_day_end_date'] ) : '';
								$special_day_selected_service        = ( ! empty( $special_day['special_day_service'] ) && is_array( $special_day['special_day_service'] ) ) ? implode( ',', $special_day['special_day_service'] ) : '';
								$special_day_workhour_arr            = ! empty( $special_day['special_day_workhour'] ) ? ( $special_day['special_day_workhour'] ) : array();
								$start_time                          = ! empty( $special_day['start_time'] ) ? sanitize_text_field( $special_day['start_time'] ) : '';
								$end_time                            = ! empty( $special_day['end_time'] ) ? sanitize_text_field( $special_day['end_time'] ) : '';
								$args_special_day                    = array(
									'bookingpress_staffmember_id' => $bookingpress_update_id,
									'bookingpress_special_day_start_date' => $bookingpress_special_day_start_date,
									'bookingpress_special_day_end_date' => $bookingpress_special_day_end_date,
									'bookingpress_special_day_start_time' => $start_time,
									'bookingpress_special_day_end_time' => $end_time,
									'bookingpress_special_day_service_id' => $special_day_selected_service,
									'bookingpress_created_at' => current_time( 'mysql' ),
								);
								$wpdb->insert( $tbl_bookingpress_staffmembers_special_day, $args_special_day );
								$bookingpress_special_day_reference_id = $wpdb->insert_id;

								if ( ! empty( $special_day_workhour_arr ) ) {
									foreach ( $special_day_workhour_arr as $special_day_workhour_key => $special_day_workhour_val ) {
										$start_time         = ! empty( $special_day_workhour_val['start_time'] ) ? sanitize_text_field( $special_day_workhour_val['start_time'] ) : '';
										$end_time           = ! empty( $special_day_workhour_val['end_time'] ) ? sanitize_text_field( $special_day_workhour_val['end_time'] ) : '';
										$args_extra_details = array(
											'bookingpress_special_day_id' => $bookingpress_special_day_reference_id,
											'bookingpress_special_day_break_start_time' => $start_time,
											'bookingpress_special_day_break_end_time' => $end_time,
											'bookingpress_created_at'                   => current_time( 'mysql' ),
										);
										$wpdb->insert( $tbl_bookingpress_staffmembers_special_day_breaks, $args_extra_details );
									}
								}
							}
						}
					}
					$response['wpuser_id']      = $bookingpress_existing_user_id;
					$response['staffmember_id'] = $bookingpress_update_id;
					$response['variant']        = 'success';
					$response['title']          = esc_html__( 'Success', 'bookingpress-appointment-booking' );
					$response['msg']            = esc_html__( 'Shift management data updated successfully.', 'bookingpress-appointment-booking' );					
				} else{ 					
					if ( ! empty( $_REQUEST['update_id'] ) ) {
						$response['wpuser_id']      = $bookingpress_existing_user_id;
						$response['staffmember_id'] = $bookingpress_update_id;
						$response['variant']        = 'success';
						$response['title']          = esc_html__( 'Success', 'bookingpress-appointment-booking' );
						$response['msg']            = esc_html__( 'Staff member has been updated succsssfully.', 'bookingpress-appointment-booking' );
					} else {
						$response['staffmember_id'] = $bookingpress_update_id;
						$response['wpuser_id']      = $bookingpress_existing_user_id;
						$response['variant']        = 'success';
						$response['title']          = esc_html__( 'Success', 'bookingpress-appointment-booking' );
						$response['msg']            = esc_html__( 'Staff member has been added succsssfully.', 'bookingpress-appointment-booking' );
					}		
				}

				$response = apply_filters( 'bookingpress_staff_members_save_external_details', $response );
			}
			echo wp_json_encode( $response );
			die();
		}
        
            
            #[Override]
        function bookingpress_retrieve_staffmember_shift_managment_data_func(){
			global $wpdb, $tbl_bookingpress_staffmembers,$tbl_bookingpress_staff_member_workhours, $tbl_bookingpress_staffmembers_daysoff,$BookingPressPro,$bookingpress_global_options,$tbl_bookingpress_staffmembers_special_day,$bookingpress_settings,$tbl_bookingpress_staffmembers_special_day_breaks;
            
            #echo " /* xxxxxxxxxxxxxxxxxxxxxxxxxxxx */ ";
            #print_r( $_REQUEST ); exit();
            

			$response                    = array();			
			$bpa_check_authorization = $this->bpa_check_authentication( 'get_staffmember_shift_managment', true, 'bpa_wp_nonce' );           
			if( preg_match( '/error/', $bpa_check_authorization ) ){
				$bpa_auth_error = explode( '^|^', $bpa_check_authorization );
				$bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');
				$response['variant'] = 'error';
				$response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
				$response['msg'] = $bpa_error_msg;

				wp_send_json( $response );
				die;
			}

			$response['workhours'] 	   = array();
			$response['workhour_data'] = array();
			$response['daysoff_data'] = array();
			$response['special_day_data'] = array();
			$response['disabled_special_day_data'] = array();
			$response['data']                = array();
			$response['selected_workhours']  = array();
			$response['default_break_times'] = array();

			$bookingpress_staffmember_id = !empty($_POST['staffmember_id']) ? intval($_POST['staffmember_id']) : 0; // phpcs:ignore
			$is_configure_specific_workhour = ! empty( $_REQUEST['is_configure_specific_workhour'] ) ? sanitize_text_field( $_REQUEST['is_configure_specific_workhour']) : '';
			$bookingpress_options  = $bookingpress_global_options->bookingpress_global_options();			
			if ( ! empty( $bookingpress_staffmember_id ) ) { // phpcs:ignore

				// Get workhours details								
				$bookingpress_staff_member_workhours = $bookingpress_workhours_data = array();

				if($is_configure_specific_workhour == 'true') {
//ADD CODE
                    global $tbl_expansion_staff_member_workhours;
                    
                    
                    $staffmember_assign_services = $this->bookingpress_get_staffmember_service($bookingpress_staffmember_id);
    				if(empty($staffmember_assign_services)){
    					$staffmember_assign_services = array();
    				}
                    $selected_staff_service = !empty($_POST['workhours_selected_service_id']) ? intval($_POST['workhours_selected_service_id']) : 0; // phpcs:ignore
                    $return_service = "$selected_staff_service";
                    #$selected_staff_service = $staffmember_assign_services[1];//Service 55
                    
                    $where_service = "  AND service_id = $selected_staff_service ";
                    //intentamos OTRA MANERA. LUEGO DE OBTENER TODO FILTRAMOS LO DE SERVICIO ID
                    $where_service = "";
					
						$where_clause = $wpdb->prepare( 'bookingpress_staffmember_id = %d AND bookingpress_staffmember_workhours_is_break = 0', $bookingpress_staffmember_id );
                        $where_clause = $where_clause . $where_service;//AGREGAMOS CONDICION DE SERVICIO
                        
						$where_clause = apply_filters('bookingpress_modify_get_staff_workhour_where_clause', $where_clause, $_POST, $bookingpress_staffmember_id); // phpcs:ignore WordPress.Security.NonceVerification.Missing --Reason Nonce already verified from the caller function.
						$bookingpress_staff_member_workhours_details = $wpdb->get_results( "SELECT * FROM {$tbl_expansion_staff_member_workhours} WHERE $where_clause",ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staff_member_workhours is a table name. false alarm
						
                        $temp_staff_member_workhours_details = array_filter($bookingpress_staff_member_workhours_details, 
                        function($val, $key)use($selected_staff_service){
                            #print_r($val['service_id'] ." = " . $selected_staff_service. " x \r\n");
                            return $val['service_id'] == $selected_staff_service; 
                            } , ARRAY_FILTER_USE_BOTH);
                            
                        if( empty($temp_staff_member_workhours_details) ){
                            #print_r( " --- EMPTY ---- ");
                            $temp_staff_member_workhours_details = array_filter($bookingpress_staff_member_workhours_details, function($val, $key){
                                
                                return $val['service_id'] == 0; 
                                }, ARRAY_FILTER_USE_BOTH);
                                $return_service = "0";
                        }
                        $bookingpress_staff_member_workhours_details = $temp_staff_member_workhours_details;
                        $response['return_service'] = $return_service;
                        					
						if ( ! empty( $bookingpress_staff_member_workhours_details ) ) {
							foreach ( $bookingpress_staff_member_workhours_details as $bookingpress_staff_member_workhour_key => $bookingpress_staff_member_workhour_val ) {
								$selected_start_time = $bookingpress_staff_member_workhour_val['bookingpress_staffmember_workhours_start_time'];
								$selected_end_time   = $bookingpress_staff_member_workhour_val['bookingpress_staffmember_workhours_end_time'];
								if ( $selected_start_time == null ) {
									$selected_start_time = 'Off';
								}
								if ( $selected_end_time == null ) {
									$selected_end_time = 'Off';
								}
								$bookingpress_staff_member_workhours[ $bookingpress_staff_member_workhour_val['bookingpress_staffmember_workday_key'] ] = array(
									'start_time' => $selected_start_time,
									'end_time'   => $selected_end_time,
								);
							}
							$bookingpress_break_time_details = array();
							$bookingpress_days_arr = array( 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' );
							foreach ( $bookingpress_days_arr as $days_key => $days_val ) {
								$bookingpress_breaks_arr = array(); 
								$staff_break_where_clause = $wpdb->prepare( 'bookingpress_staffmember_workday_key = %s AND bookingpress_staffmember_workhours_is_break = 1 AND  bookingpress_staffmember_id = %d ', $days_val, $bookingpress_staffmember_id );
								$staff_break_where_clause.= " AND service_id = $return_service ";
                                $staff_break_where_clause = apply_filters('bookingpress_modify_get_staff_break_workhour_where_clause', $staff_break_where_clause, $_POST, $bookingpress_staffmember_id, $days_val); // phpcs:ignore WordPress.Security.NonceVerification.Missing --Reason Nonce already verified from the caller function.
								$bookingpress_break_time_details = $wpdb->get_results( 'SELECT bookingpress_staffmember_workhours_start_time,bookingpress_staffmember_workhours_end_time FROM ' . $tbl_expansion_staff_member_workhours . ' WHERE '.$staff_break_where_clause, ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared --Reason: $tbl_bookingpress_staff_member_workhours is table name.
								if ( !empty($bookingpress_break_time_details)) {
									foreach($bookingpress_break_time_details as $key => $value) {
										$bookingpress_breaks_arr[] = array(
											'start_time' => $value['bookingpress_staffmember_workhours_start_time'],
											'formatted_start_time' => date( $bookingpress_options['wp_default_time_format'], strtotime( $value['bookingpress_staffmember_workhours_start_time'] ) ),
											'end_time'   => $value['bookingpress_staffmember_workhours_end_time'],
											'formatted_end_time'   => date( $bookingpress_options['wp_default_time_format'], strtotime( $value['bookingpress_staffmember_workhours_end_time'] ) ),								
										);
									}
								}
								$bookingpress_workhours_data[] = array(
									'day_name'    => ucfirst( $days_val ),
									'break_times' => $bookingpress_breaks_arr,
								);
							}
						}
						$bookingpress_configure_specific_workhour = $this->get_bookingpress_staffmembersmeta( $bookingpress_staffmember_id, 'bookingpress_configure_specific_workhour' );						
						$response['bookingpress_configure_specific_workhour'] = !empty($bookingpress_configure_specific_workhour) &&  $bookingpress_configure_specific_workhour == 'true' ? true : false;
										
					$response['workhours']      = $bookingpress_staff_member_workhours;
					$response['workhour_data']  = $bookingpress_workhours_data;
				} else  {
					$bookingpress_default_workhour_data = $bookingpress_settings->bookingpress_get_default_work_hours();
					$response['data']                = $bookingpress_default_workhour_data['data'];
					$response['selected_workhours']  = $bookingpress_default_workhour_data['selected_workhours'];
					$response['default_break_times'] = $bookingpress_default_workhour_data['default_break_times'];
				}

				// Get Daysoff detais
				$bookingpress_staff_member_id = ! empty( $_REQUEST['staffmember_id'] ) ? intval( $_REQUEST['staffmember_id'] ) : 0;
				$bookingpress_selected_year   = ! empty( $_REQUEST['selected_year'] ) ? sanitize_text_field( $_REQUEST['selected_year'] ) : date( 'Y' );
				$bookingpress_daysoff         = array();
				$bookingpress_date_format     = $bookingpress_options['wp_default_date_format'];
				$bookingpress_time_format     = $bookingpress_options['wp_default_time_format'];
				$bookingpress_staffmember_daysoff_details = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$tbl_bookingpress_staffmembers_daysoff} WHERE bookingpress_staffmember_id = %d AND bookingpress_staffmember_daysoff_parent = %d", $bookingpress_staff_member_id,0 ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staffmembers_daysoff is a table name. false alarm

				if ( ! empty( $bookingpress_staffmember_daysoff_details ) ) {
					foreach ( $bookingpress_staffmember_daysoff_details as $day_off ) {

						$bookingpress_staffmember_daysoff_enddate = esc_html($day_off['bookingpress_staffmember_daysoff_enddate']);
						if($bookingpress_staffmember_daysoff_enddate == null || $bookingpress_staffmember_daysoff_enddate == 'null'){
							$bookingpress_staffmember_daysoff_enddate = esc_html($day_off['bookingpress_staffmember_daysoff_date']);
						}
												
						$day_off_arr                  = array();
						$day_off_arr['id']            = intval( $day_off['bookingpress_staffmember_daysoff_id'] );
						$day_off_arr['dayoff_name']   = sanitize_text_field( $day_off['bookingpress_staffmember_daysoff_name'] );
						$day_off_arr['dayoff_date']   = sanitize_text_field( $day_off['bookingpress_staffmember_daysoff_date'] );
						$day_off_arr['dayoff_date_end']   = $bookingpress_staffmember_daysoff_enddate;
						$day_off_arr['dayoff_formatted_date']   = date($bookingpress_date_format,strtotime($day_off['bookingpress_staffmember_daysoff_date']));
						$day_off_arr['dayoff_repeat'] = ! empty( $day_off['bookingpress_staffmember_daysoff_repeat'] ) ? true : false;

						$dayoff_label = esc_html__( 'Once Off', 'bookingpress-appointment-booking' );
						$day_off_arr['dayoff_repeat_label'] = $dayoff_label;
						if( true == $day_off_arr['dayoff_repeat'] ){
							$dayoff_label = esc_html__( 'Repeat Yearly', 'bookingpress-appointment-booking' );
							$repeat_frequency = $day_off['bookingpress_staffmember_daysoff_repeat_frequency'];
							$repeat_frequency_type = $day_off['bookingpress_staffmember_daysoff_repeat_frequency_type'];
							$repeat_duration = $day_off['bookingpress_staffmember_daysoff_repeat_duration'];
							$repeat_times = $day_off['bookingpress_staffmember_daysoff_repeat_times'];
							$repeat_date = $day_off['bookingpress_staffmember_daysoff_repeat_date'];
							$day_off_arr['dayoff_repeat_label'] = $BookingPressPro->bookingpress_retrieve_daysoff_repeat_label( $repeat_duration, $repeat_frequency, $repeat_frequency_type, $repeat_times, $repeat_date );
							$day_off_arr['repeat_frequency'] = $repeat_frequency;
							$day_off_arr['repeat_frequency_type'] = $repeat_frequency_type;
							$day_off_arr['repeat_duration'] = $repeat_duration;
							$day_off_arr['repeat_times'] = $repeat_times;
							$day_off_arr['repeat_date'] = $repeat_date;
						}
						

						$bookingpress_daysoff[]       = $day_off_arr;
					}
				}

				$response['daysoff_data'] = $bookingpress_daysoff;

				// Get Special Days details
				$bookingpress_special_day     = array();
				$bookingpress_special_day_data = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $tbl_bookingpress_staffmembers_special_day . ' WHERE bookingpress_staffmember_id = %d ', $bookingpress_staff_member_id ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared --Reason: $tbl_bookingpress_staffmembers_special_day is a table name. false alarm
				if ( ! empty( $bookingpress_special_day_data ) ) {
					foreach ( $bookingpress_special_day_data as $special_day_key => $special_day ) {
						$special_day_arr                                     = $special_days_breaks = array();
						$special_day_start_date                              = ! empty( $special_day['bookingpress_special_day_start_date'] ) ? sanitize_text_field( $special_day['bookingpress_special_day_start_date'] ) : '';
						$special_day_end_date                                = ! empty( $special_day['bookingpress_special_day_end_date'] ) ? sanitize_text_field( $special_day['bookingpress_special_day_end_date'] ) : '';
						$special_day_service_id                              = ! empty( $special_day['bookingpress_special_day_service_id'] ) ? explode( ',', $special_day['bookingpress_special_day_service_id'] ) : '';
						$special_day_id                                      = ! empty( $special_day['bookingpress_staffmember_special_day_id'] ) ? intval( $special_day['bookingpress_staffmember_special_day_id'] ) : '';
						$special_day_arr['id']                               = $special_day_id;
						$special_day_arr['special_day_start_date']           = date('Y-m-d',strtotime($special_day_start_date));
						$special_day_arr['special_day_formatted_start_date'] = date( $bookingpress_date_format, strtotime( $special_day_start_date ) );
						$special_day_arr['special_day_end_date']             = date('Y-m-d',strtotime($special_day_end_date));

						$special_day_arr['special_day_formatted_end_date'] = date( $bookingpress_date_format, strtotime( $special_day_end_date ) );
						$special_day_arr['start_time']                     = $special_day['bookingpress_special_day_start_time'];
						$special_day_arr['formatted_start_time']           = date( $bookingpress_time_format, strtotime( sanitize_text_field( $special_day['bookingpress_special_day_start_time'] ) ) );
						$special_day_arr['end_time']                       = $special_day['bookingpress_special_day_end_time'];
						$special_day_arr['formatted_end_time']             = date( $bookingpress_time_format, strtotime( sanitize_text_field( $special_day['bookingpress_special_day_end_time'] ) ) )." ".($special_day['bookingpress_special_day_end_time'] == "24:00:00" ? esc_html__('Next Day', 'bookingpress-appointment-booking') : '' );
						$special_day_arr['special_day_service']            = $special_day_service_id;

						// Fetch all breaks associated with special day
						$bookingpress_special_days_break = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM ' . $tbl_bookingpress_staffmembers_special_day_breaks . ' WHERE bookingpress_special_day_id = %d ', $special_day_id ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared --Reason: $tbl_bookingpress_staffmembers_special_day_breaks is a table name. false alarm
						if ( ! empty( $bookingpress_special_days_break ) && is_array( $bookingpress_special_days_break ) ) {
							foreach ( $bookingpress_special_days_break as $k3 => $v3 ) {
								$break_start_time                      = ! empty( $v3['bookingpress_special_day_break_start_time'] ) ? sanitize_text_field( $v3['bookingpress_special_day_break_start_time'] ) : '';
								$break_end_time                        = ! empty( $v3['bookingpress_special_day_break_end_time'] ) ? sanitize_text_field( $v3['bookingpress_special_day_break_end_time'] ) : '';
								$special_days_break_data               = array();
								$i                                     = 1;
								$special_days_break_data['id']         = $i;
								$special_days_break_data['start_time'] = $break_start_time;
								$special_days_break_data['end_time']   = $break_end_time;
								$special_days_break_data['formatted_start_time'] = date( $bookingpress_time_format, strtotime( $break_start_time ) );
								$special_days_break_data['formatted_end_time']   = date( $bookingpress_time_format, strtotime( $break_end_time ) );
								$i++;
								$special_days_breaks[] = $special_days_break_data;
							}
						}
						$special_day_arr['special_day_workhour'] = $special_days_breaks;
						$bookingpress_special_day[]              = $special_day_arr;
					}
				}

				$disabled_special_day_data             = $this->bookingpress_get_staffmember_special_days_dates();
				$response['special_day_data']          = $bookingpress_special_day;
				$response['disabled_special_day_data'] = $disabled_special_day_data;
				$response['msg']            = esc_html__( 'Staffmember shift managment data retrieved successfully', 'bookingpress-appointment-booking' );
				$response['variant']        = 'success';
				$response['title']          = esc_html__( 'Success', 'bookingpress-appointment-booking' );

				$staffmember_assign_services = $this->bookingpress_get_staffmember_service($bookingpress_staffmember_id);
				if(empty($staffmember_assign_services)){
					$staffmember_assign_services = array();
				}
				$response['staffmember_assign_service_ids']  = $staffmember_assign_services;
				$response['bookingpress_staff_assign_services_list'] = '';
				if(!empty($staffmember_assign_services)){
					$bookingpress_staff_assign_services_list = $this->get_bookingpress_service_data_group_with_category_for_staff($staffmember_assign_services);				
					$response['bookingpress_staff_assign_services_list'] = $bookingpress_staff_assign_services_list;
				}				
			}
			$response = apply_filters( 'bookingpress_modify_staff_shift_managment_data', $response );

			echo wp_json_encode($response);
			die;
        }
        
        public function add_manage_scripts_and_styles(){
            ?>
            <style>
            .bpa-sm__wh-items {
                display: none;
            }
            .bp-exp-gestion-sel-serv .bpa-sm__wh-items {
                display: block;
            }
            
            .bp-exp-gestion-sel-serv {
                
            }
            .shift_consideration {
                padding: 12px;
                background-color: #fff5e9;
                margin: 20px;
                word-break: auto-phrase;
                border-radius: 2px;
                font-size: 14px;
                color: dimgray;
            }
            
            #adminmenuwrap {
                //display: none !important;
            }
            </style>
            <script>
            
            function bpExp_selector_pos(){
                console.log('change pos.....');
                const workhoursAreaBody = document.querySelector('.bpa-sm__wh-body-row');//.bpa-sm__wh-items .bpa-sm__wh-body-row
                const bpExp_sel_services = document.querySelector('.bp-exp-gestion-sel-serv');
                if( bpExp_sel_services != null){
                    console.log('change pos...22222..');
                workhoursAreaBody.before(bpExp_sel_services);
                }
            }
            
            
            
            
            
            window.addEventListener('DOMContentLoaded', function() {
            
            });         
                        
            </script>
            <?php
        }
        
        public function add_staff_manage_content(){
            add_action('admin_footer', array($this, 'add_manage_scripts_and_styles'),100);
            ?>
            <div class="bp-exp-gestion-sel-serv" v-if="bookingpress_configure_specific_workhour == true && display_staff_working_hours == true">
                <div class="warning shift_consideration" style=""> 
                    Consideraciones: <br>
                    *Cada vez que seleccionas un servicio y ajustas los horarios, se debe presionar [guardar]; seleccionas otra especialidad, configuras, [guardar], sucesivamente.<br>
                    *Cuidado! Tus horarios de servcios sin configurar toman el horario (General). Revisa todos tus servicios asignados.
                </div>
                <div style="padding: 20px;">
                    <span class="bpa-form-label"><?php esc_html_e( 'Service', 'bookingpress-appointment-booking' ); ?></span>
        			<el-select @change="bpExp_reload_currentStaff_shift_modal" class="bpa-form-control bpa-from-select-tab" v-model="gestionWorkH_selected_service_id" filterable collapse-tags  placeholder="<?php esc_html_e( 'Select Service', 'bookingpress-appointment-booking' ); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
        			   <el-option key="0" value="0" label="General (Para todos mis servicios)"></el-option>
                       <el-option-group v-for="service_cat_data in bookingpress_staff_assign_services_list" :key="service_cat_data.category_name" :label="service_cat_data.category_name">
        					<el-option v-for="(service_data, indx) in service_cat_data.category_services" :key="service_data.service_id" :label="service_data.service_name" :value="service_data.service_id" :extradata="`{'service_id':`+service_data.service_id+`,'service_name':`+service_data.service_name+`}`"></el-option>
        				</el-option-group>
        			</el-select>
                </div>
                
                    <div class="bpa-sm__wh-items" v-if="bookingpress_configure_specific_workhour == true && display_staff_working_hours == true">
									<div class="bpa-sm__wh-body-row" v-for="work_hours_day in work_hours_days_arr">
										<el-row class="bpa-sm__wh-item-row" :gutter="24" :id="'weekday_'+work_hours_day.day_key">
											<el-col :xs="24" :sm="24" :md="18" :lg="20" :xl="22">
												<el-row type="flex" class="bpa-sm__wh-body-left">
													<el-col :xs="24" :sm="24" :md="6" :lg="6" :xl="2">
														<span class="bpa-form-label" v-if="work_hours_day.day_name == 'Monday'"><?php esc_html_e('Monday', 'bookingpress-appointment-booking'); ?></span>
														<span class="bpa-form-label" v-else-if="work_hours_day.day_name == 'Tuesday'"><?php esc_html_e('Tuesday', 'bookingpress-appointment-booking'); ?></span>
														<span class="bpa-form-label" v-else-if="work_hours_day.day_name == 'Wednesday'"><?php esc_html_e('Wednesday', 'bookingpress-appointment-booking'); ?></span>
														<span class="bpa-form-label" v-else-if="work_hours_day.day_name == 'Thursday'"><?php esc_html_e('Thursday', 'bookingpress-appointment-booking'); ?></span>
														<span class="bpa-form-label" v-else-if="work_hours_day.day_name == 'Friday'"><?php esc_html_e('Friday', 'bookingpress-appointment-booking'); ?></span>
														<span class="bpa-form-label" v-else-if="work_hours_day.day_name == 'Saturday'"><?php esc_html_e('Saturday', 'bookingpress-appointment-booking'); ?></span>
														<span class="bpa-form-label" v-else-if="work_hours_day.day_name == 'Sunday'"><?php esc_html_e('Sunday', 'bookingpress-appointment-booking'); ?></span>
														<span v-else>{{ work_hours_day.day_name }}</span>
													</el-col>
													<el-col :xs="24" :sm="24" :md="18" :lg="18" :xl="22">
														<el-row :gutter="24">
															<el-col :xs="8" :sm="8" :md="12" :lg="12" :xl="12">												
																<el-select v-model="workhours_timings[work_hours_day.day_name].start_time" class="bpa-form-control bpa-form-control__left-icon" placeholder="<?php esc_html_e( 'Start Time', 'bookingpress-appointment-booking' ); ?>"
																	@change="bookingpress_set_workhour_value($event,work_hours_day.day_name)" filterable>
																	<span slot="prefix" class="material-icons-round">access_time</span>
																	<el-option v-for="work_timings in work_hours_day.worktimes" :label="work_timings.formatted_start_time" :value="work_timings.start_time" v-if="work_timings.start_time != workhours_timings[work_hours_day.day_name].end_time || workhours_timings[work_hours_day.day_name].end_time == 'Off'"></el-option>
																</el-select>
															</el-col>
															<el-col :xs="8" :sm="8" :md="12" :lg="12" :xl="12" v-if="workhours_timings[work_hours_day.day_name].start_time != 'Off'">
																<el-select v-model="workhours_timings[work_hours_day.day_name].end_time" class="bpa-form-control bpa-form-control__left-icon" 
																	placeholder="<?php esc_html_e( 'End Time', 'bookingpress-appointment-booking' ); ?>"
																	@change="bookingpress_check_workhour_value($event,work_hours_day.day_name)"  filterable>
																	<span slot="prefix" class="material-icons-round">access_time</span>
																	<el-option v-for="work_timings in work_hours_day.worktimes" :label="work_timings.formatted_end_time" :value="work_timings.end_time" v-if="(work_timings.end_time > workhours_timings[work_hours_day.day_name].start_time ||  work_timings.end_time == '24:00:00')"></el-option>				
																</el-select>
															</el-col>
														</el-row>
														<el-row  v-if="selected_break_timings[work_hours_day.day_name].length > 0 && workhours_timings[work_hours_day.day_name].start_time != 'Off'">
															<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
																<div class="bpa-break-hours-wrapper">
																	<h4><?php esc_html_e( 'Breaks', 'bookingpress-appointment-booking' ); ?></h4>
																	<div class="bpa-bh--items">
																		<div class="bpa-bh__item" v-for="(break_data,index) in work_hours_day.break_times">
																			<p @click="edit_workhour_data(event,break_data.start_time, break_data.end_time, work_hours_day.day_name,index)">{{ break_data.formatted_start_time }} to {{ break_data.formatted_end_time }}</p>
																			<span class="material-icons-round" slot="reference" @click="bookingpress_remove_workhour(break_data.start_time, break_data.end_time, work_hours_day.day_name)">close</span>
																		</div>
																	</div>
																</div>
															</el-col>
														</el-row>
													</el-col>
												</el-row>
											</el-col>
											<el-col :xs="24" :sm="24" :md="6" :lg="4" :xl="2" v-if="workhours_timings[work_hours_day.day_name].start_time != 'Off'">
												<el-button class="bpa-btn bpa-btn__medium bpa-btn--full-width" :class="(break_selected_day == work_hours_day.day_name && open_add_break_modal == true) ? 'bpa-btn--primary' : ''" @click="open_add_break_modal_func(event, work_hours_day.day_name)">
													<?php esc_html_e( 'Add Break', 'bookingpress-appointment-booking' ); ?>
												</el-button>
											</el-col>
										</el-row>
									</div>
								</div>
                
                
            </div>
            <?php
        }
        
        public function add_data_to_save_staff_member_vue_method(){
            ?>
            postdata.workhours_selected_service_id = vm2.gestionWorkH_selected_service_id;
            postdata.workhours_manage_delete_all = vm2.workhours_manage_delete_all;
            <?php
        }
        
        public function add_staff_manage_methods(){
            
            ?>
            bpExp_updateWorkhursBeforeEdit(edit_id, conf_spec_wh){
                const vm = this;
                
                var bpExp_postdata = {};
                bpExp_postdata.action = 'bpexp_update_specifict_workhour_before_Edit';
                bpExp_postdata.update_id = edit_id;
                bpExp_postdata.bookingpress_configure_specific_workhour = vm.bookingpress_configure_specific_workhour;
                bpExp_postdata._wpnonce = '<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce' ) ); ?>';
                
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( bpExp_postdata ) )
					.then(function(response){
					   if(response.data.variant != undefined && response.data.variant == 'success'){
					       
                           vm.bpExp_reload_currentStaff_shift_modal();
                           vm.$forceUpdate();
                           vm.readConfgWH();
                       }else{
                        //Error silencioso
                        console.log(response.data.msg);
                       }
					});
            },
            bpExp_reload_currentStaff_shift_modal(){
                const vm = this;
                vm.is_display_loader = 1;
                let edit_id = this.currentStaff_temp_vars.edit_id;
                let is_configure_specific_workhour = this.currentStaff_temp_vars.is_configure_specific_workhour;
                setTimeout(()=>{
                    vm.bookingpress_open_shift_management_modal( edit_id, is_configure_specific_workhour, 'from_bpexp_reload');
                    console.log('llamado open shift fin__');
                },10);
                
                
            },
            
            bookingpress_open_shift_management_modal(edit_id, is_configure_specific_workhour = false, from_bpexp=''){
					const vm = this;
                    this.workhours_manage_delete_all = 0;
                    vm.is_display_loader = 1;
                                        
                    console.log('llamado open shift');
                    
                                        
                    //bpExp_selector_pos();
                    
					vm.items.forEach(function(currentValue, index, arr){
						if(currentValue.staffmember_id == edit_id){
							vm.shift_mgmt_staff_name = currentValue.staffmember_firstname+" "+currentValue.staffmember_lastname;
						}
					});
                    
                    
                    if(this.currentStaff_temp_vars != null){
                        if(edit_id != this.currentStaff_temp_vars.edit_id){
                            this.gestionWorkH_selected_service_id="0";
                            //vm.open_shift_management_modal_func();//ahora lo llama con Distinto--from_bpexp--
                        }
                    }
                    if( from_bpexp=='' ){
                        vm.open_shift_management_modal_func();
                    }
                    this.currentStaff_temp_vars = {
                        'is_configure_specific_workhour' : is_configure_specific_workhour,
                        'edit_id' : edit_id,
                        'service_id' : this.gestionWorkH_selected_service_id,
                    };
                    
                    if( Number(edit_id) && vm.bookingpress_configure_specific_workhour == false){
                        console.log('need watch.....');
                        vm.readConfgWH = vm.$watch('bookingpress_configure_specific_workhour', function(newval, oldval){
                             if( newval == true){
                             this.bpExp_updateWorkhursBeforeEdit(edit_id, newval);
                             }
                        });
                        //vm2.bookingpress_configure_specific_workhour
                        //bpexp_update_specifict_workhour_before_Edit
                    }
					
					vm.staff_members.update_id = edit_id;
					var selected_year = '';
					var selected_year_obj = (selected_year != '') ? new Date(selected_year) : new Date();
					var bookingpress_selected_year = selected_year_obj.getFullYear();
					var postdata = {}
					postdata.action = 'bookingpress_retrieve_staffmember_shift_managment_data'
					postdata.selected_year = bookingpress_selected_year
					postdata.is_configure_specific_workhour = is_configure_specific_workhour
					postdata.staffmember_id = vm.staff_members.update_id
                    postdata.workhours_selected_service_id = vm.gestionWorkH_selected_service_id
					postdata._wpnonce = '<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce' ) ); ?>';
					<?php do_action( 'bookingpress_staff_shift_management_modify_xhr_postdata'); ?>
					axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
					.then(function(response){
						if(response.data.variant != undefined && response.data.variant == 'success'){
							/* Staffmember working hour data */
							if(is_configure_specific_workhour == 'true') {
								vm.bookingpress_configure_specific_workhour = response.data.bookingpress_configure_specific_workhour;
								if(response.data.workhours !== undefined && response.data.workhours != '') {
									vm.workhours_timings = response.data.workhours;									
									response.data.workhour_data.forEach(function(currentValue, index, arr){
										vm.work_hours_days_arr.forEach(function(currentValue2, index2, arr2){										
											if(currentValue2.day_name == currentValue.day_name) {											
												vm.work_hours_days_arr[index2]['break_times'] = currentValue.break_times							
											}
										});	
										vm.selected_break_timings[currentValue.day_name] = currentValue.break_times							
									});		
								}
							} else {
								vm.work_hours_days_arr = response.data.data		
								response.data.data.forEach(function(currentValue, index, arr){
									vm.selected_break_timings[currentValue.day_name] = currentValue.break_times							
								});
								vm.workhours_timings = response.data.selected_workhours
								vm.default_break_timings = response.data.default_break_times
							}
							/* Staffmember daysoff data */
							vm.staffmember_dayoff_arr = response.data.daysoff_data

							/* Staffmember specialday data */
							vm.staffmember_special_day_arr = response.data.special_day_data;
							if(typeof response.data.bookingpress_staff_assign_services_list != 'undefined' && response.data.bookingpress_staff_assign_services_list != ''){
								vm.bookingpress_staff_assign_services_list = response.data.bookingpress_staff_assign_services_list;
							}																
							<?php do_action( 'bookingpress_modify_staff_shift_management_xhr_response' ); ?>

						}else{
							vm.$notify({
								title: response.data.title,
								message: response.data.msg,
								type: 'error_notification',
							});	
						}
                        vm.$forceUpdate();
                        setTimeout(()=>{ vm.is_display_loader = 0 }, 300);
                        
					}).catch(function(error){
						this.is_display_loader = 0;
                        console.log(error);
						vm.$notify({
							title: '<?php esc_html_e( 'Error', 'bookingpress-appointment-booking' ); ?>',
							message: '<?php esc_html_e( 'Something went wrong..', 'bookingpress-appointment-booking' ); ?>',
							type: 'error_notification',
						});
					});
                    
				},
            <?php
        }
        

    }//Fin class

global $wpdb, $tbl_expansion_staff_member_workhours;
$tbl_expansion_staff_member_workhours = $wpdb->prefix.'expansion_staff_member_workhours';

global $bookingpress_pro_staff_members,$tbl_bookingpress_staff_member_workhours, $bookingpress_expansion_staff_members;
#unset($GLOBALS['bookingpress_pro_staff_members']);

$bookingpress_pro_staff_members = new bookingpress_Expansion_staff_members();

global $bookingpress_staff_member_vue_data_fields;

$bookingpress_staff_member_vue_data_fields['gestionWorkH_selected_service_id'] = "0";
$bookingpress_staff_member_vue_data_fields['workhours_manage_delete_all'] = "0";

#$bookingpress_pro_staff_members->bookingpress_retrieve_staffmember_shift_managment_data_func() = $bookingpress_exp_staff_members->bookingpress_retrieve_staffmember_shift_managment_data_func();



//ALTER TABLE `wp_expansion_staff_member_workhours` CHANGE `service_id` `service_id` SMALLINT(6) NOT NULL;
 
//INSERT INTO `wp_expansion_staff_member_workhours` (`bookingpress_staffmember_workhours_id`, `bookingpress_staffmember_id`, `service_id`, `bookingpress_staffmember_workday_key`, `bookingpress_staffmember_workhours_start_time`, `bookingpress_staffmember_workhours_end_time`, `bookingpress_staffmember_workhours_is_break`, `bookingpress_staffmember_workhours_created_at`) VALUES (NULL, '97', '55', 'Tuesday', '17:00:00', '19:00:00', '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Sunday', NULL, NULL, '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Thursday', '12:00:00', '14:00:00', '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Monday', '07:00:00', '19:00:00', '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Wednesday', '07:00:00', '19:00:00', '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Saturday', NULL, NULL, '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Friday', '07:00:00', '19:00:00', '0', '2025-09-12 00:19:48');

}//Fin if

