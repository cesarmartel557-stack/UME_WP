<?php

if ( class_exists('bookingpress_customers') ) {
    
    class mod_bookingpress_customers extends bookingpress_customers
    {
        function __construct()
        {
            add_action('wp_ajax_bookingpress_get_customers', array( $this, 'bookingpress_get_customer_details' ), 8);
            add_action('wp_ajax_bookingpress_add_customer', array( $this, 'bookingpress_add_customer' ), 8);
            /*
            add_action('wp_ajax_bookingpress_get_customers', array( $this, 'bookingpress_get_customer_details' ), 10);
            add_action('wp_ajax_bookingpress_add_customer', array( $this, 'bookingpress_add_customer' ), 10);
            add_action('wp_ajax_bookingpress_get_edit_user', array( $this, 'bookingpress_get_edit_user_details' ), 10);
            add_action('wp_ajax_bookingpress_delete_customer', array( $this, 'bookingpress_delete_customer' ), 10);
            add_action('wp_ajax_bookingpress_bulk_customer', array( $this, 'bookingpress_bulk_action' ), 10);

            add_action('bookingpress_customers_dynamic_vue_methods', array( $this, 'bookingpress_customer_dynamic_vue_methods_func' ), 10);
            add_action('bookingpress_customers_dynamic_on_load_methods', array( $this, 'bookingpress_customer_dynamic_on_load_methods_func' ), 10);
            add_action('bookingpress_customers_dynamic_data_fields', array( $this, 'bookingpress_customer_dynamic_data_fields_func' ), 10);
            add_action('bookingpress_customers_dynamic_helper_vars', array( $this, 'bookingpress_customer_dynamic_helper_vars_func' ), 10);
            add_action('bookingpress_customers_dynamic_view_load', array( $this, 'bookingpress_dynamic_load_customers_view_func' ), 10);
            add_action('wp_ajax_bookingpress_get_wpuser', array( $this, 'bookingpress_get_wpuser' ));

            add_action('wp_ajax_bookingpress_upload_customer_avatar', array( $this, 'bookingpress_upload_customer_avatar_func' ), 10);
            add_action('wp_ajax_bookingpress_get_existing_users_details', array( $this, 'bookingpress_get_existing_user_details' ), 10);

            add_action( 'admin_init', array( $this, 'bookingpress_customer_vue_data_fields') );
            add_action('user_register', array($this,'bookingpress_add_capabilities_to_new_user'));

            add_action( 'wp_ajax_bookingpress_remove_customer_avatar', array( $this, 'bookingpress_remove_customer_avatar_func'));
        */
        }
        
        function bpa_check_authentication_helper($a, $b, $c){
            $bpa_check_authorization = "";
            $bpa_check_authorization = $this->bpa_check_authentication( $a, $b, $c );
            return $bpa_check_authorization;
        } 
        
        function get_customer_id_by_dni( $dni_value = 0, $tipo_doc = '' ){
            $paciente_id = 0;
            $customer_dni_result = array();
            $dni_key = 'text_C6kufq';
            
            if( empty($dni_value) ) $dni_value = !empty($_POST['appointment_data']['form_fields'][$dni_key])? sanitize_text_field($_POST['appointment_data']['form_fields'][$dni_key]):0;
            if( empty($dni_value) ) $dni_value = !empty($_REQUEST['appointment_data']['form_fields'][$dni_key])? sanitize_text_field($_REQUEST['appointment_data']['form_fields'][$dni_key]):0;
            //bpa_customer_field[text_C6kufq]
            if( empty($dni_value) ) $dni_value = !empty($_REQUEST['bpa_customer_field'][$dni_key])? sanitize_text_field($_REQUEST['bpa_customer_field'][$dni_key]):0;
            
            if( empty($tipo_doc) ) $tipo_doc = !empty($_REQUEST['appointment_data']['form_fields']['tipo_doc'])? sanitize_text_field($_REQUEST['appointment_data']['form_fields']['tipo_doc']):'';
            if( empty($tipo_doc) ) $tipo_doc = !empty($_REQUEST['bpa_customer_field']['tipo_doc'])? sanitize_text_field($_REQUEST['bpa_customer_field']['tipo_doc']):'';
            
            if( !empty($dni_value) ){
                    
                    $customer_dni_result = get_dni_customers( $dni_value, $dni_key, false, '=', $tipo_doc );
                    if( !empty($customer_dni_result['id']) ){
                        $paciente_id = (int) $customer_dni_result['id'];
                    }
                    
            }
        
            return $paciente_id;
        }
                
        function add_customer_dni_column() {
            $is_add = get_option('expansion_is_add_customer_dni_column', 0);
            if( !$is_add ){
                global $wpdb, $tbl_bookingpress_customers;
                $exist_column = $alter = 0;
                $exist_column = @$wpdb->get_var(" SHOW COLUMNS FROM '$tbl_bookingpress_customers' LIKE 'customer_dni'; ") == 'customer_dni';
                if( !$exist_column ){
                    $sql = "ALTER TABLE {$tbl_bookingpress_customers} ADD COLUMN customer_dni VARCHAR(255) NOT NULL"; //,ADD CONSTRAINT unique_dni UNIQUE (dni);
                    $alter = @$wpdb->query( $sql );
                }
                if( $alter || $exist_column ){
                    $is_add = 1;
                    update_option('expansion_is_add_customer_dni_column', 1);                    
                }
            }
            return $is_add;
        }
        
        function add_customer_tipo_doc_column() {
            $is_add = get_option('expansion_is_add_customer_tipo_doc_column', 0);
            if( !$is_add ){
                global $wpdb, $tbl_bookingpress_customers;
                $exist_column = $alter = 0;
                $exist_column = @$wpdb->get_var(" SHOW COLUMNS FROM '$tbl_bookingpress_customers' LIKE 'tipo_doc'; ") == 'tipo_doc';
                if( !$exist_column ){
                    $sql = "ALTER TABLE {$tbl_bookingpress_customers} ADD COLUMN tipo_doc VARCHAR(255) NOT NULL"; //,ADD CONSTRAINT unique_dni UNIQUE (dni);
                    $alter = @$wpdb->query( $sql );
                }
                if( $alter || $exist_column ){
                    $is_add = 1;
                    update_option('expansion_is_add_customer_tipo_doc_column', 1);                    
                }
            }
            return $is_add;
        }
        
        
  		/**
         * OVERRIDE bookingpress_create_customer
         * 
		 * BookingPress core function for create customer in BookingPress
		 *
		 * @param  mixed $bookingpress_customer_data      Customer details
		 * @param  mixed $bookingpress_existing_user_id   If wordpress user already exists then pass user id
		 * @param  mixed $is_front                        1 or 2. If customer created from front or not. 1 = front and 2 = backend
		 * @param  mixed $is_customer                     Is already BookingPress Customer
		 * @param  mixed $bookingpress_customer_timezone  Created customer timezone
		 * @return void
		 */
		function bookingpress_create_customer($bookingpress_customer_data, $bookingpress_existing_user_id = 0, $is_front = 2, $is_customer = 0, $bookingpress_customer_timezone = "")
        {
			$this->add_customer_dni_column();
            $this->add_customer_tipo_doc_column();
            //if the is_front parameter value is 1 then appointment booked at front side else 2 then appointment is booked at backend.
			//if the is_customer create parameter value is  1 then customer is create at the backend.
            global $wpdb, $dni_key, $BookingPress, $tbl_bookingpress_appointment_bookings, $tbl_bookingpress_customers, $tbl_bookingpress_entries, $bookingpress_email_notifications, $bookingpress_debug_payment_log_id, $bookingpress_global_options;
            $bookingpress_customer_id = $bookingpress_wpuser_id = 0;
            $bookingpress_user_pass   = '';
            
#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);

            $bookingpress_terms_conditions = !empty($_POST['appointment_data']['appointment_terms_conditions'][0]) ? sanitize_text_field($_POST['appointment_data']['appointment_terms_conditions'][0] ) : ''; //phpcs:ignore

            if( empty( $bookingpress_terms_conditions ) ){
                $bookingpress_terms_conditions = !empty($_POST['appointment_data']['form_fields']['appointment_terms_conditions'][0]) ? sanitize_text_field($_POST['appointment_data']['form_fields']['appointment_terms_conditions'][0] ) : ''; //phpcs:ignore
            }

            if(empty($bookingpress_customer_timezone)){
                $bookingpress_customer_timezone = $bookingpress_global_options->bookingpress_get_site_timezone_offset();
            }
            $bookingpress_is_customer_create = 0;
            if (! empty($bookingpress_customer_data) ) {

                $bookingpress_customer_name      = ! empty($bookingpress_customer_data['bookingpress_customer_name']) ? $bookingpress_customer_data['bookingpress_customer_name'] : '';
                $bookingpress_username          = ! empty($bookingpress_customer_data['bookingpress_username']) ? $bookingpress_customer_data['bookingpress_username'] : '';
                $bookingpress_customer_phone     = ! empty($bookingpress_customer_data['bookingpress_customer_phone']) ? $bookingpress_customer_data['bookingpress_customer_phone'] : '';
                $bookingpress_customer_firstname = ! empty($bookingpress_customer_data['bookingpress_customer_firstname']) ? $bookingpress_customer_data['bookingpress_customer_firstname'] : '';
                $bookingpress_customer_lastname  = ! empty($bookingpress_customer_data['bookingpress_customer_lastname']) ? $bookingpress_customer_data['bookingpress_customer_lastname'] : '';
                $bookingpress_customer_country   = ! empty($bookingpress_customer_data['bookingpress_customer_country']) ? $bookingpress_customer_data['bookingpress_customer_country'] : '';
                $bookingpress_customer_email     = ! empty($bookingpress_customer_data['bookingpress_customer_email']) ? $bookingpress_customer_data['bookingpress_customer_email'] : '';
                $bookingpress_customer_dial_code = !empty($bookingpress_customer_data['bookingpress_customer_phone_dial_code']) ? $bookingpress_customer_data['bookingpress_customer_phone_dial_code'] : '';

                $bookingpress_customer_email = trim( $bookingpress_customer_email );
                
                $bookingpress_user_name = '';                
                
                if((empty($bookingpress_customer_name) && empty( $bookingpress_username))  && !empty($bookingpress_customer_email) ){
                    $bookingpress_user_name = $bookingpress_customer_email;
                }
                
                if( !empty($bookingpress_username) && empty($bookingpress_customer_name)){
                    $bookingpress_user_name = $bookingpress_username;
                }

                if( empty($bookingpress_username) && !empty($bookingpress_customer_name)){
                    $bookingpress_user_name = $bookingpress_customer_name;
                }

                if(!empty($bookingpress_customer_name) && !empty($bookingpress_username)){
                    $bookingpress_user_name = $bookingpress_username;
                }
                
                
                /** NEWWWWW **/
                //2025-11-20 SE MOVIO CODIGO PARA AQUI 
                
                /** 
                 * TOMAR ENTRY ID CAPTURAR APOINTMENT META DATA QUE YA DEBERIA ESTAR GENERADA. 
                 * BOOKINGPRESS GUARDA ANTES LA BOOKING META QUE EL BOOKING ID VINCULADO MEDIANTE LA ENTRY ID
                 
                 $bookingpress_db_fields = array(
					'bookingpress_entry_id' => $entry_id,
					'bookingpress_appointment_id' => 0,
					'bookingpress_appointment_meta_key' => 'appointment_service_data',
					'bookingpress_appointment_meta_value' => wp_json_encode($bookingpress_appointment_service_data),
				);
				$wpdb->insert($tbl_bookingpress_appointment_meta, $bookingpress_db_fields);
                 
                 
                 */
                
/*

                $customer_tipo_doc = ! empty($_REQUEST['tipo_doc']) ? trim(sanitize_text_field($_REQUEST['tipo_doc'])) : '';
                if( empty($customer_tipo_doc) ) {
                    $customer_tipo_doc = !empty($customer_metadata['tipo_doc'])? trim(sanitize_text_field($customer_metadata['tipo_doc'])): '';
                }
                $customer_tipo_doc = in_array(strtoupper($customer_tipo_doc),['DU','LC','LE','CI','PASS'])? strtoupper($customer_tipo_doc) : '';
                
*/
                global $tbl_bookingpress_appointment_meta;
                
                $dni_value = !empty($bookingpress_customer_data['customer_dni'])? $bookingpress_customer_data['customer_dni']:'';
                if( empty($dni_value) ) $dni_value = !empty($bookingpress_customer_data[$dni_key])? $bookingpress_customer_data[$dni_key]:0;
                
                $customer_tipo_doc = !empty($bookingpress_customer_data['tipo_doc']) ? trim(sanitize_text_field($bookingpress_customer_data['tipo_doc'])) : '';
                
                if( (empty( $dni_value ) || empty( $customer_tipo_doc )) && !empty($bookingpress_customer_data['bookingpress_entry_id']) ){
                    $entry_id = absint($bookingpress_customer_data['bookingpress_entry_id']);
                    if( $entry_id ){
                        $appointment_form_fields = $wpdb->get_row( $wpdb->prepare( "SELECT bookingpress_appointment_meta_value FROM {$tbl_bookingpress_appointment_meta} WHERE bookingpress_appointment_meta_key = %s AND bookingpress_entry_id = %d", 'appointment_form_fields_data', $entry_id ) );//phpcs:ignore
                        
                        $f = fopen(__DIR__ . '/'.'testUserEntry'.'.txt', 'a');
                        if( $f ){
                            fwrite($f, "\n".print_r([$bookingpress_customer_data, $appointment_form_fields], true)."\n\n");
                            fclose($f);
                            chmod( __DIR__ . '/'.'testUserEntry'.'.txt', 0600 );
                        }
                        
                        if( !empty($appointment_form_fields) ){
                            $appointment_form_fields = json_decode( $appointment_form_fields->bookingpress_appointment_meta_value, true );
                            if( empty($dni_value) ) $dni_value = !empty($appointment_form_fields['form_fields']) && !empty($appointment_form_fields['form_fields'][$dni_key])? $appointment_form_fields['form_fields'][$dni_key] : 0;
                            if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($appointment_form_fields['form_fields']) && !empty($appointment_form_fields['form_fields']['tipo_doc'])? $appointment_form_fields['form_fields']['tipo_doc'] : '';
                        }
                    }
                }
                
                
                if( empty($dni_value) ) $dni_value = !empty($_POST['appointment_data']['form_fields'][$dni_key])? sanitize_text_field($_POST['appointment_data']['form_fields'][$dni_key]):0;
                if( empty($dni_value) ) $dni_value = !empty($_REQUEST['appointment_data']['form_fields'][$dni_key])? sanitize_text_field($_REQUEST['appointment_data']['form_fields'][$dni_key]):0;
                if( empty($dni_value) ) $dni_value = !empty($_REQUEST['bpa_customer_field'][$dni_key])? sanitize_text_field($_REQUEST['bpa_customer_field'][$dni_key]):0;//bpa_customer_field[text_C6kufq]
                
                if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_POST['appointment_data']['form_fields']['tipo_doc'])? sanitize_text_field($_POST['appointment_data']['form_fields']['tipo_doc']):'';
                if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_REQUEST['appointment_data']['form_fields']['tipo_doc'])? sanitize_text_field($_REQUEST['appointment_data']['form_fields']['tipo_doc']):'';
                if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_REQUEST['bpa_customer_field']['tipo_doc'])? sanitize_text_field($_REQUEST['bpa_customer_field']['tipo_doc']):'';
                
                $dni_value = trim( $dni_value );
                $customer_tipo_doc = in_array(strtoupper($customer_tipo_doc),['DU','LC','LE','CI','PASS'])? strtoupper($customer_tipo_doc) : '';
                
                $bookingpress_user_name = !empty($customer_dni)? "{$customer_tipo_doc}-{$dni_value}" : $bookingpress_username;
                
                $paciente_id = $this->get_customer_id_by_dni( $dni_value, $customer_tipo_doc );
                if( $paciente_id ){
                    $bookingpress_existing_user_id = @$wpdb->get_var($wpdb->prepare("SELECT bookingpress_wpuser_id FROM {$tbl_bookingpress_customers} WHERE bookingpress_customer_id = %d AND bookingpress_user_type = 2", absint($paciente_id) ));                                        
                }
                
                if (empty($bookingpress_existing_user_id) ) {
                    $bookingpress_allow_customer_create = $BookingPress->bookingpress_get_settings('allow_wp_user_create', 'customer_setting');
                    $bookingpress_allow_customer_create = ! empty($bookingpress_allow_customer_create) ? $bookingpress_allow_customer_create : 'false';
                    
                    //2025-11-20 SE MOVIO CODIGO DE AQUI 
                    
                    if( !empty($paciente_id) && $is_front == 2 ){
                        $bookingpress_customer_id = $paciente_id;
                            //echo "----paciente---".$paciente_id;
                            //exit();
                                       
                    }elseif ($bookingpress_allow_customer_create == 'false' || $is_front == 2 ) {
                        // If user create switch turned off then this condition executes.
                        $customer_details = array(
                            'bookingpress_wpuser_id'      => ( $bookingpress_wpuser_id != 1? $bookingpress_wpuser_id : 0 ),
                            'bookingpress_user_login'     => $bookingpress_user_name,//!empty($bookingpress_customer_email)? $bookingpress_customer_email : $bookingpress_user_name,
                            'bookingpress_user_status'    => 1,
                            'bookingpress_user_type'      => 2,
                            'bookingpress_user_email'     => !empty($bookingpress_customer_email)? $bookingpress_customer_email : "{$customer_tipo_doc}-{$dni_value}@no-email.invalid",
                            'bookingpress_user_name'      => $bookingpress_user_name,
                            'bookingpress_customer_full_name'  => $bookingpress_customer_name,
                            'bookingpress_user_firstname' => $bookingpress_customer_firstname,
                            'bookingpress_user_lastname'  => $bookingpress_customer_lastname,
                            'bookingpress_user_phone'     => $bookingpress_customer_phone,
                            'bookingpress_user_country_phone' => $bookingpress_customer_country,
                            'bookingpress_user_country_dial_code' => $bookingpress_customer_dial_code,
                            'bookingpress_user_timezone'  => $bookingpress_customer_timezone,
                            'bookingpress_user_created'   => current_time('mysql'),
                            'bookingpress_created_at'     => $is_front,
                            'bookingpress_created_by'     => ( is_user_logged_in() ) ? get_current_user_id() : '',
                            'customer_dni'                => sanitize_text_field($dni_value),
                            'tipo_doc'                  => $customer_tipo_doc
                        );
                        
                        $wpdb->insert($tbl_bookingpress_customers, $customer_details);
                        $bookingpress_customer_id = $wpdb->insert_id;
                        $bookingpress_is_customer_create = 1;
                        
                        if( empty($dni_value) ) $dni_value = !empty($bookingpress_customer_data[$dni_key])? $bookingpress_customer_data[$dni_key]:0;
                        
                        if( empty($dni_value) ) $dni_value = !empty($_POST['appointment_data']['form_fields'][$dni_key])? sanitize_text_field($_POST['appointment_data']['form_fields'][$dni_key]):0;
                        if( empty($dni_value) ) $dni_value = !empty($_REQUEST['appointment_data']['form_fields'][$dni_key])? sanitize_text_field($_REQUEST['appointment_data']['form_fields'][$dni_key]):0;
                        //bpa_customer_field[text_C6kufq]
                        if( empty($dni_value) ) $dni_value = !empty($_REQUEST['bpa_customer_field'][$dni_key])? sanitize_text_field($_REQUEST['bpa_customer_field'][$dni_key]):0;
                                                
                        if( !empty($dni_value) ){
                        $BookingPress->update_bookingpress_customersmeta( $bookingpress_customer_id, $dni_key, $dni_value );
                        }
                        
                        if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_POST['appointment_data']['form_fields']['tipo_doc'])? sanitize_text_field($_POST['appointment_data']['form_fields']['tipo_doc']):'';
                        if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_REQUEST['appointment_data']['form_fields']['tipo_doc'])? sanitize_text_field($_REQUEST['appointment_data']['form_fields']['tipo_doc']):'';
                        if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_REQUEST['bpa_customer_field']['tipo_doc'])? sanitize_text_field($_REQUEST['bpa_customer_field']['tipo_doc']):'';
                        
                        $customer_tipo_doc = in_array(strtoupper($customer_tipo_doc),['DU','LC','LE','CI','PASS'])? strtoupper($customer_tipo_doc) : '';
                        if( !empty($customer_tipo_doc) ){
                        $BookingPress->update_bookingpress_customersmeta( $bookingpress_customer_id, 'tipo_doc', $customer_tipo_doc );
                        }
                        
                        do_action( 'bookingpress_after_create_customer', $bookingpress_customer_id );
                    } elseif ($bookingpress_allow_customer_create == 'true' ) {
                        //2025-11-20 updates
                        $bookingpress_customer_email = trim($bookingpress_customer_email);
                        //if( !empty( $bookingpress_customer_email ) ) $bookingpress_is_wp_user_exist = (!empty($bookingpress_customer_email) || !empty($dni_value))? get_user_by('email', (!empty($bookingpress_customer_email)? $bookingpress_customer_email : "{$dni_value}@no-email.invalid") ) : 0;
                        $bookingpress_is_wp_user_exist = !empty($dni_value) ? get_user_by('email', "{$customer_tipo_doc}-{$dni_value}@no-email.invalid" ) : 0;
                        if( empty( $bookingpress_is_wp_user_exist ) ) $bookingpress_is_wp_user_exist = get_user_by('login', $bookingpress_user_name);
                        
                        if (empty($bookingpress_is_wp_user_exist) ) {
                            // If WordPress user not exists
                            
                            $bpa_send_new_user_notication = 0;
                            $bookingpress_user_pass = apply_filters('bookingpress_user_password_change_filter', '', $bookingpress_customer_data);

                            $update_pass = true;
                            if( empty( $bookingpress_user_pass )){
                                $bookingpress_user_pass = wp_generate_password(12, false);
                                $bpa_send_new_user_notication = 1;
                                $update_pass = false;
                            }

                            
                            
                            $f = fopen(__DIR__ . '/admin_crete_user.txt', 'a');
                            if($f){
                                fwrite($f, " PARTEEE2222222222 ".print_r([compact('bookingpress_existing_user_id','bookingpress_user_name','bookingpress_email','bookingpress_password',''),$_REQUEST],true));
                                fclose( $f );
                            }
                            
                            $bookingpress_wpuser_id = 0;
                            if(!empty($bookingpress_customer_email) || !empty($dni_value) ) {
                                $bookingpress_wpuser_id = wp_create_user($bookingpress_user_name, $bookingpress_user_pass, (!empty($bookingpress_customer_email) && !get_user_by('email', $bookingpress_customer_email ) ? $bookingpress_customer_email : "{$customer_tipo_doc}-{$dni_value}@no-email.invalid") );

                                if( true == $update_pass ){       
                                    $wpdb->update(
                                        $wpdb->users,
                                        array(
                                            'user_pass' => $bookingpress_user_pass,
                                        ),
                                        array(
                                            'ID' => $bookingpress_wpuser_id
                                        )
                                    );
                                }
   
                            }
                            if(!empty($bookingpress_customer_email) && $bpa_send_new_user_notication == 1 ) {
                                wp_send_new_user_notifications($bookingpress_wpuser_id);
                            }
                            $bookingpress_user_pass = md5($bookingpress_user_pass);
                        } elseif (! empty($bookingpress_is_wp_user_exist->ID) ) {
                            $bookingpress_wpuser_id = $bookingpress_is_wp_user_exist->ID;
                            $bookingpress_user_pass = ! empty($bookingpress_is_wp_user_exist->data->user_pass) ? $bookingpress_is_wp_user_exist->data->user_pass : '';
                        }
                        /* Update WordPress user firstname and lastname */
                        $booking_user_update_meta_details['first_name'] = $bookingpress_customer_firstname;
                        $booking_user_update_meta_details['last_name'] = $bookingpress_customer_lastname;
                        if ( ! empty( $bookingpress_wpuser_id ) ) {
                            do_action( 'bookingpress_user_update_meta', $bookingpress_wpuser_id, $booking_user_update_meta_details );
                        }
                        /* Update WordPress user firstname and lastname */

                        //$bookingpress_is_customer_exist = $wpdb->get_var($wpdb->prepare("SELECT COUNT(bookingpress_customer_id) as total FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2", $bookingpress_customer_email)); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                        $paciente_id = $this->get_customer_id_by_dni( $dni_value, $customer_tipo_doc );
                        
                        if ($paciente_id == 0 || empty($bookingpress_customer_email)) {
                            
                            $paciente_id = $this->get_customer_id_by_dni( $dni_value, $customer_tipo_doc );
                            
                            if( !empty($paciente_id) ){
                                $bookingpress_customer_id = $paciente_id;
                            }else{
                            
                            // If customer not exists then create bookingpress customer
                            $customer_details = array(
                            'bookingpress_wpuser_id'   => $bookingpress_wpuser_id,
                            'bookingpress_user_login'  => $bookingpress_user_name,//!empty($bookingpress_customer_email)? $bookingpress_customer_email : $bookingpress_user_name,
                            'bookingpress_user_status' => 1,
                            'bookingpress_user_type'   => 2,
                            'bookingpress_user_email'  => !empty($bookingpress_customer_email)? $bookingpress_customer_email : "{$customer_tipo_doc}-{$dni_value}@no-email.invalid",
                            'bookingpress_user_name'   => $dni_value,
                            'bookingpress_customer_full_name'  => $bookingpress_customer_name,
                            'bookingpress_user_firstname' => $bookingpress_customer_firstname,
                            'bookingpress_user_lastname' => $bookingpress_customer_lastname,
                            'bookingpress_user_phone'  => $bookingpress_customer_phone,
                            'bookingpress_user_country_phone' => $bookingpress_customer_country,
                            'bookingpress_user_country_dial_code' => $bookingpress_customer_dial_code,
                            'bookingpress_user_timezone' => $bookingpress_customer_timezone,
                            'bookingpress_user_created' => current_time('mysql'),
                            'bookingpress_created_at'  => $is_front,
                            'bookingpress_created_by'  => ( is_user_logged_in() ) ? get_current_user_id() : '',
                            'customer_dni'                => sanitize_text_field($dni_value)
                            );

                            $wpdb->insert($tbl_bookingpress_customers, $customer_details);
                            $bookingpress_customer_id = $wpdb->insert_id;
                            $bookingpress_is_customer_create = 1;
                            
                            if( empty($dni_value) ) $dni_value = !empty($bookingpress_customer_data[$dni_key])? $bookingpress_customer_data[$dni_key]:0;
                        
                            if( empty($dni_value) ) $dni_value = !empty($_POST['appointment_data']['form_fields'][$dni_key])? sanitize_text_field($_POST['appointment_data']['form_fields'][$dni_key]):0;
                            if( empty($dni_value) ) $dni_value = !empty($_REQUEST['appointment_data']['form_fields'][$dni_key])? sanitize_text_field($_REQUEST['appointment_data']['form_fields'][$dni_key]):0;
                            //bpa_customer_field[text_C6kufq]
                            if( empty($dni_value) ) $dni_value = !empty($_REQUEST['bpa_customer_field'][$dni_key])? sanitize_text_field($_REQUEST['bpa_customer_field'][$dni_key]):0;
                
                            if( !empty($dni_value)){
                            $BookingPress->update_bookingpress_customersmeta( $bookingpress_customer_id, $dni_key, $dni_value );
                            }
                            
                            if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_POST['appointment_data']['form_fields']['tipo_doc'])? sanitize_text_field($_POST['appointment_data']['form_fields']['tipo_doc']):'';
                            if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_REQUEST['appointment_data']['form_fields']['tipo_doc'])? sanitize_text_field($_REQUEST['appointment_data']['form_fields']['tipo_doc']):'';
                            if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_REQUEST['bpa_customer_field']['tipo_doc'])? sanitize_text_field($_REQUEST['bpa_customer_field']['tipo_doc']):'';
                            
                            $customer_tipo_doc = in_array(strtoupper($customer_tipo_doc),['DU','LC','LE','CI','PASS'])? strtoupper($customer_tipo_doc) : '';
                            if( !empty($customer_tipo_doc) ){
                            $BookingPress->update_bookingpress_customersmeta( $bookingpress_customer_id, 'tipo_doc', $customer_tipo_doc );
                            }
                            
                            do_action( 'bookingpress_after_create_customer', $bookingpress_customer_id );
                            
                            }//else paciente_id
                            
                        } elseif ($paciente_id > 0 ) {
                            // Get latest customer details
                            // // //$bookingpress_customer_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2 ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_email), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                            
                            $bookingpress_customer_id = $paciente_id;
                            $bookingpress_customer_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_customer_id = %d  ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_id), ARRAY_A);
                            
                            $bookingpress_customer_id      = $bookingpress_customer_details['bookingpress_customer_id'];

                            $customer_update_details = array(
                            'bookingpress_wpuser_id'   => $bookingpress_wpuser_id,
                            'bookingpress_user_status' => 1,
                            );

                            $customer_update_where_condition = array(
                            'bookingpress_user_email' => $bookingpress_customer_email,
                            'bookingpress_user_type'  => 2,
                            );

                            $wpdb->update($tbl_bookingpress_customers, $customer_update_details, $customer_update_where_condition);

                            // Get all customer ids with same email address and update new customer id with all customers in appointment booking table.
                            //$bookingpress_customer_details = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2 ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_email), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                            
                            $bookingpress_customer_details = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_customer_id = %d AND bookingpress_user_type = 2 ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_id), ARRAY_A);
                            
                            if (! empty($bookingpress_customer_details) ) {
                                $bookingpress_customer_ids_arr = array();

                                foreach ( $bookingpress_customer_details as $customer_key => $customer_val ) {
                                    array_push($bookingpress_customer_ids_arr, $customer_val['bookingpress_customer_id']);
                                }

                                if (! empty($bookingpress_customer_ids_arr) ) {
                                    foreach ( $bookingpress_customer_ids_arr as $customer_id_key => $customer_id_val ) {
                                        $wpdb->update($tbl_bookingpress_appointment_bookings, array( 'bookingpress_customer_id' => $bookingpress_customer_id ), array( 'bookingpress_customer_id' => $customer_id_val ));
                                    }
                                }
                            }
                        }
                    }
                } else {
					$bookingpress_customer_id = 0;
                    $bookingpress_wpuser_id = $bookingpress_existing_user_id; 

                    $bookingpress_is_wp_user_exist = get_user_by('ID', $bookingpress_wpuser_id);
                    $bookingpress_user_pass        = ! empty($bookingpress_is_wp_user_exist->data->user_pass) ? $bookingpress_is_wp_user_exist->data->user_pass : '';

                    $bookingpress_is_customer_exist = @$wpdb->get_var($wpdb->prepare("SELECT COUNT(bookingpress_customer_id) as total FROM {$tbl_bookingpress_customers} WHERE customer_dni = %s AND bookingpress_user_type = 2", sanitize_text_field($dni_value) )); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                    $bookingpress_is_customer_exist = $paciente_id = $this->get_customer_id_by_dni( $dni_value, $customer_tipo_doc );

                    if ($bookingpress_is_customer_exist == 0 ) {
                        $customer_details = array(
                         'bookingpress_wpuser_id'      => $bookingpress_wpuser_id,
                         'bookingpress_user_login'     => $bookingpress_user_name,//!empty($bookingpress_customer_email)? $bookingpress_customer_email : $bookingpress_user_name,
                         'bookingpress_user_status'    => 1,
                         'bookingpress_user_type'      => 2,
                         'bookingpress_user_email'     => !empty($bookingpress_customer_email)? $bookingpress_customer_email : "{$customer_tipo_doc}-{$dni_value}@no-email.invalid",
                         'bookingpress_user_name'   => $bookingpress_user_name,
                         'bookingpress_customer_full_name'  => $bookingpress_customer_name,
                         'bookingpress_user_firstname' => $bookingpress_customer_firstname,
                         'bookingpress_user_lastname'  => $bookingpress_customer_lastname,
                         'bookingpress_user_phone'     => $bookingpress_customer_phone,
                         'bookingpress_user_country_phone' => $bookingpress_customer_country,
                         'bookingpress_user_country_dial_code' => $bookingpress_customer_dial_code,
                         'bookingpress_user_timezone' => $bookingpress_customer_timezone,
                         'bookingpress_user_created'   => current_time('mysql'),
                         'bookingpress_created_at'     => $is_front,
                         'bookingpress_created_by'     => ( is_user_logged_in() ) ? get_current_user_id() : '',
                         'customer_dni'                => sanitize_text_field($dni_value),
                         'tipo_doc'                 => $customer_tipo_doc

                        );
                        $wpdb->insert($tbl_bookingpress_customers, $customer_details);
                        $bookingpress_customer_id = $wpdb->insert_id;
                        $bookingpress_is_customer_create = 1;
                        
                        if( empty($dni_value) ) $dni_value = !empty($bookingpress_customer_data[$dni_key])? $bookingpress_customer_data[$dni_key]:0;
                        
                        if( empty($dni_value) ) $dni_value = !empty($_POST['appointment_data']['form_fields'][$dni_key])? sanitize_text_field($_POST['appointment_data']['form_fields'][$dni_key]):0;
                        if( empty($dni_value) ) $dni_value = !empty($_REQUEST['appointment_data']['form_fields'][$dni_key])? sanitize_text_field($_REQUEST['appointment_data']['form_fields'][$dni_key]):0;
                        //bpa_customer_field[text_C6kufq]
                        if( empty($dni_value) ) $dni_value = !empty($_REQUEST['bpa_customer_field'][$dni_key])? sanitize_text_field($_REQUEST['bpa_customer_field'][$dni_key]):0;
            
                        if( !empty($dni_value)){
                        $BookingPress->update_bookingpress_customersmeta( $bookingpress_customer_id, $dni_key, $dni_value );
                        }
                        
                        if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_POST['appointment_data']['form_fields']['tipo_doc'])? sanitize_text_field($_POST['appointment_data']['form_fields']['tipo_doc']):'';
                        if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_REQUEST['appointment_data']['form_fields']['tipo_doc'])? sanitize_text_field($_REQUEST['appointment_data']['form_fields']['tipo_doc']):'';
                        if( empty($customer_tipo_doc) ) $customer_tipo_doc = !empty($_REQUEST['bpa_customer_field']['tipo_doc'])? sanitize_text_field($_REQUEST['bpa_customer_field']['tipo_doc']):'';
                        
                        $customer_tipo_doc = in_array(strtoupper($customer_tipo_doc),['DU','LC','LE','CI','PASS'])? strtoupper($customer_tipo_doc) : '';
                        if( !empty($customer_tipo_doc) ){
                        $BookingPress->update_bookingpress_customersmeta( $bookingpress_customer_id, 'tipo_doc', $customer_tipo_doc );
                        }
                        
                        do_action( 'bookingpress_after_create_customer', $bookingpress_customer_id );
					}else if(($bookingpress_is_customer_exist > 0 && $is_front != 2) || $is_customer == 1 ){
                        // Get latest customer details
                        //$bookingpress_customer_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2 ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_email), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                        $bookingpress_customer_id = $paciente_id;
                        $bookingpress_customer_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_customer_id = %d  ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_id), ARRAY_A);
                            

                        $bookingpress_customer_id = $bookingpress_customer_details['bookingpress_customer_id'];

                        $customer_update_details = array(
                        'bookingpress_wpuser_id'   => $bookingpress_wpuser_id,
                        'bookingpress_user_status' => 1,
                        );

                        $customer_update_where_condition = array(
                        'bookingpress_customer_id' => $bookingpress_customer_id,
                        'bookingpress_user_type'  => 2,
                        );

                        $wpdb->update($tbl_bookingpress_customers, $customer_update_details, $customer_update_where_condition);

                        // Get all customer ids with same email address and update new customer id with all customers in appointment booking table.
                        //$bookingpress_customer_details = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2 ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_email), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                        
                        $bookingpress_customer_details = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_customer_id = %d AND bookingpress_user_type = 2 ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_id), ARRAY_A);
                            
                        if (! empty($bookingpress_customer_details) ) {
                            $bookingpress_customer_ids_arr = array();

                            foreach ( $bookingpress_customer_details as $customer_key => $customer_val ) {
                                array_push($bookingpress_customer_ids_arr, $customer_val['bookingpress_customer_id']);
                            }

                            if (! empty($bookingpress_customer_ids_arr) ) {
                                foreach ( $bookingpress_customer_ids_arr as $customer_id_key => $customer_id_val ) {
                                    $wpdb->update($tbl_bookingpress_appointment_bookings, array( 'bookingpress_customer_id' => $bookingpress_customer_id ), array( 'bookingpress_customer_id' => $customer_id_val ));
                                }
                            }
                        }
                    }
                }

				if ( ! empty( $bookingpress_customer_id ) ) {
					$bookingpress_customer_note = ! empty( $bookingpress_customer_data['bookingpress_customer_note'] ) ? $bookingpress_customer_data['bookingpress_customer_note'] : '';
					$BookingPress->update_bookingpress_customersmeta( $bookingpress_customer_id, 'customer_note', $bookingpress_customer_note );

                    $bookingpress_terms_conditions_val = !empty( $bookingpress_terms_conditions ) ? $bookingpress_terms_conditions : '';
                    $BookingPress->update_bookingpress_customersmeta( $bookingpress_customer_id, 'term_and_conditions', $bookingpress_terms_conditions_val );
				}
				

                if (! empty($bookingpress_wpuser_id) ) {
                    // Assign Bookingpress customer role to wpuser
                    $booking_user_update_meta_details          = array();
                    $booking_user_update_meta_details['roles'] = array( 'bookingpress-customer' );

                    $user = new WP_User($bookingpress_wpuser_id);
                    $user->add_role('bookingpress-customer');
                }
            }

#$bookingpress_is_wp_user_exist = get_user_by('email', $bookingpress_customer_email);
#$TEST_wpuser_id = wp_create_user('999999999801', 'XXXAAA', $bookingpress_customer_email);
#var_dump( $bookingpress_is_wp_user_exist, $bookingpress_wpuser_id, $TEST_wpuser_id ); exit;
            
            
            return array(
                'bookingpress_customer_id' => $bookingpress_customer_id,
                'bookingpress_wpuser_id'   => $bookingpress_wpuser_id,
                'bookingpress_is_customer_create' => $bookingpress_is_customer_create,
            );
        }
        
        /**
         * Get all customers details for customer module
         *
         * @return void
         */
        function bookingpress_get_customer_details()
        {
            $this->add_customer_dni_column();
            $this->add_customer_tipo_doc_column();
            global $wpdb, $dni_key, $tbl_bookingpress_customers, $tbl_bookingpress_appointment_bookings,$BookingPress,$bookingpress_global_options;
            $response              = array();
            $dni_key = !empty($dni_key)? $dni_key : 'text_C6kufq';

            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_customers', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            $perpage     = isset($_POST['perpage']) ? intval($_POST['perpage']) : 10; // phpcs:ignore WordPress.Security.NonceVerification
            $currentpage = isset($_POST['currentpage']) ? intval($_POST['currentpage']) : 1; // phpcs:ignore WordPress.Security.NonceVerification
            $offset      = ( ! empty($currentpage) && $currentpage > 1 ) ? ( ( $currentpage - 1 ) * $perpage ) : 0;
         // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['search_data'] contains mixed array and it's been sanitized properly using 'appointment_sanatize_field' function
            $bookingpress_search_data  = ! empty($_REQUEST['search_data']) ? array_map(array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['search_data']) : array(); // phpcs:ignore
            $bookingpress_search_query = $bookingpress_search_query_join = '';

            if (! empty($bookingpress_search_data['search_name']) ) {
                $bookingpress_search_customer_name = explode(' ', $bookingpress_search_data['search_name']);
                $bookingpress_search_query        .= ' AND (';
                $search_loop_counter               = 1;
                foreach ( $bookingpress_search_customer_name as $bookingpress_search_customer_key => $bookingpress_search_customer_val ) {
                    if ($search_loop_counter > 1 ) {
                        $bookingpress_search_query .= ' OR';
                    }
                    $add_customer_dni_query = "OR customer_dni LIKE '%{$bookingpress_search_customer_val}%'";
                    $bookingpress_search_query .= " (bookingpress_user_login LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_email LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_customer_full_name LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_firstname LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_lastname LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_phone LIKE '%{$bookingpress_search_customer_val}%' {$add_customer_dni_query} )";

                    $search_loop_counter++;
                }
                $bookingpress_search_query .= ' )';
            }
            if (! empty($bookingpress_search_data['selected_date_range']) ) {
                $bookingpress_search_date         = $bookingpress_search_data['selected_date_range'];
                $start_date                       = date('Y-m-d', strtotime($bookingpress_search_date[0]));
                $end_date                         = date('Y-m-d', strtotime($bookingpress_search_date[1]));
                $bookingpress_search_query .= " AND (bookingpress_user_created BETWEEN '".$start_date." 00:00:00' AND '".$end_date." 23:59:59')";
            }

            $bookingpress_search_query_join = apply_filters('bookingpress_customer_view_join_add_filter', $bookingpress_search_query_join);

            $bookingpress_search_query = apply_filters('bookingpress_customer_view_add_filter', $bookingpress_search_query);

            $total_customers = $wpdb->get_results("SELECT cs.bookingpress_customer_id FROM {$tbl_bookingpress_customers} as cs {$bookingpress_search_query_join} WHERE cs.bookingpress_user_type = 2 AND cs.bookingpress_user_status = 1 {$bookingpress_search_query} ",ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_customers is a table name. false alarm

            $get_customers = $wpdb->get_results("SELECT cs.* FROM {$tbl_bookingpress_customers} as cs {$bookingpress_search_query_join} WHERE cs.bookingpress_user_type = 2 AND cs.bookingpress_user_status = 1 {$bookingpress_search_query} order by bookingpress_customer_id DESC LIMIT {$offset} , {$perpage}", ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_customers is a table name. false alarm
            
            if( empty( $get_customers ) ){
                if (! empty($bookingpress_search_data['search_name']) ){
                    $posible_dni = (string) $bookingpress_search_data['search_name'];
                    $get_customers = get_dni_customers( $posible_dni, $dni_key, $db_results = true );
                    $total_customers = array();
                    if( is_array($get_customers) ){
                        $total_customers = array_keys($get_customers);
                    }
                }
                
            }
            

            $bookingpress_global_options_arr       = $bookingpress_global_options->bookingpress_global_options();
            $bookingpress_default_date_format = $bookingpress_global_options_arr['wp_default_date_format'];
            $bookingpress_default_time_format = $bookingpress_global_options_arr['wp_default_time_format'];
            $bookingpress_default_date_time_format = $bookingpress_default_date_format . ' ' . $bookingpress_default_time_format;
            
            $bookingpress_customers = array();
            if (! empty($get_customers) ) {
                $counter = 1;
                foreach ( $get_customers as $customer ) {

                    $bookingpress_avatar_url              = get_avatar_url($customer['bookingpress_wpuser_id']);
                    $bookingpress_get_existing_avatar_url = $BookingPress->get_bookingpress_customersmeta($customer['bookingpress_customer_id'], 'customer_avatar_details');
                    $bookingpress_get_existing_avatar_url = ! empty($bookingpress_get_existing_avatar_url) ? maybe_unserialize($bookingpress_get_existing_avatar_url) : array();
                    if (! empty($bookingpress_get_existing_avatar_url[0]['url']) ) {
                        $bookingpress_avatar_url = $bookingpress_get_existing_avatar_url[0]['url'];
                    } else {
                        $bookingpress_avatar_url = BOOKINGPRESS_IMAGES_URL . '/default-avatar.jpg';
                    }
                    $bookingpress_customer_tmp_details                       = array();
                    $bookingpress_customer_tmp_details['id']                 = $counter;
                    $bookingpress_customer_tmp_details['customer_id']        = intval($customer['bookingpress_customer_id']);
                    $bookingpress_customer_tmp_details['customer_avatar']    = esc_url($bookingpress_avatar_url);
                    $bookingpress_customer_tmp_details['customer_username'] = stripslashes_deep($customer['bookingpress_user_name']);
                    $bookingpress_customer_tmp_details['customer_fullname'] = (!empty($customer['bookingpress_customer_full_name']) && !is_null($customer['bookingpress_customer_full_name']))?stripslashes_deep($customer['bookingpress_customer_full_name']):'';
                    $bookingpress_customer_tmp_details['customer_firstname'] = stripslashes_deep($customer['bookingpress_user_firstname']);
                    $bookingpress_customer_tmp_details['customer_lastname']  = stripslashes_deep($customer['bookingpress_user_lastname']);
                    $bookingpress_customer_tmp_details['customer_email']     = stripslashes_deep($customer['bookingpress_user_email']);
                    $bookingpress_customer_tmp_details['customer_phone']     = esc_html($customer['bookingpress_user_phone']);
                    
                    $bookingpress_customer_tmp_details['dni']                = !empty($customer['customer_dni'])? stripslashes_deep($customer['customer_dni']) : '';
                                        
                    if( empty($bookingpress_customer_tmp_details['dni']) ){
                    $bookingpress_customer_tmp_details['dni']                = (!empty($customer['bookingpress_customersmeta_value']) && !is_null($customer['bookingpress_customersmeta_value']))?stripslashes_deep($customer['bookingpress_customersmeta_value']):'';
                    }
                    
                    if( empty($bookingpress_customer_tmp_details['dni']) ){
                    $bookingpress_customer_tmp_details['dni'] = $BookingPress->get_bookingpress_customersmeta( intval($customer['bookingpress_customer_id']), $dni_key );
                    }
                                        
                    $bookingpress_customer_tmp_details['tipo_doc']          = !empty($customer['tipo_doc'])? stripslashes_deep($customer['tipo_doc']) : '';
                    if( empty($bookingpress_customer_tmp_details['tipo_doc']) ){
                    $bookingpress_customer_tmp_details['tipo_doc']                = $BookingPress->get_bookingpress_customersmeta( intval($customer['bookingpress_customer_id']), 'tipo_doc' );
                    }

                    // Fetch last appointment
                    $last_appointment_data            = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_customer_id = %d ORDER BY bookingpress_appointment_booking_id DESC LIMIT 1", $customer['bookingpress_customer_id']), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_appointment_bookings is table name defined globally. False Positive alarm
                    $default_date_time_format         = get_option('date_format') . ' ' . get_option('time_format');
                    $last_appointment_booked_datetime = ! empty($last_appointment_data['bookingpress_created_at']) ? date_i18n($bookingpress_default_date_time_format, strtotime($last_appointment_data['bookingpress_created_at'])) : '-';

                    // Count total appointment
                    $total_appointments = $wpdb->get_var($wpdb->prepare("SELECT COUNT(bookingpress_appointment_booking_id) FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_customer_id = %d", $customer['bookingpress_customer_id'])); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_appointment_bookings is table name defined globally. False Positive alarm

                    $bookingpress_customer_tmp_details['customer_last_appointment']  = $last_appointment_booked_datetime;
                    $bookingpress_customer_tmp_details['customer_total_appointment'] = $total_appointments;

                    $bookingpress_customers[] = $bookingpress_customer_tmp_details;
                    $counter++;
                }
            }
            $data['items'] = $bookingpress_customers;
            $data['total'] = count($total_customers);
            wp_send_json($data);
            die();
        }
        /**
         * get_dni_customers( $dni_value, $dni_key='text_C6kufq', $db_results = true); 
        */
        
        
        /**
         * Ajax request for get edit customer details
         *
         * @return void
         */
        function bookingpress_get_edit_user_details()
        {
            global $wpdb, $tbl_bookingpress_customers, $BookingPress;

            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_customers', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            $response['variant']   = 'error';
            $response['title']     = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']       = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            $response['edit_data'] = array();
            
            //AGREGAR EDIT ID OBTENIDO POR DNI O EDIT ID RECIBIDO.
            
            
            
            if (! empty($_POST['edit_id']) ) { // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_edit_id               = intval($_POST['edit_id']); // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_edit_customer_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_customer_id = %d ORDER BY bookingpress_customer_id DESC", $bookingpress_edit_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                if (! empty($bookingpress_edit_customer_details) ) {
                    $bookingpress_wpuser_id = $bookingpress_edit_customer_details['bookingpress_wpuser_id'];
                    if (! empty($bookingpress_wpuser_id) ) {
                        $bookingpress_edit_customer_details['bookingpress_wpuser_id'] = $data = ! empty(get_user_by('ID', $bookingpress_wpuser_id)) ? $bookingpress_wpuser_id : '';
                    } else {
                        $bookingpress_edit_customer_details['bookingpress_wpuser_id'] = '';
                    }
                    $bookingpress_edit_customer_details['bookingpress_user_name'] = stripslashes_deep($bookingpress_edit_customer_details['bookingpress_user_name']);
                    $bookingpress_edit_customer_details['bookingpress_user_firstname'] = stripslashes_deep($bookingpress_edit_customer_details['bookingpress_user_firstname']);
                    $bookingpress_edit_customer_details['bookingpress_user_lastname'] = stripslashes_deep($bookingpress_edit_customer_details['bookingpress_user_lastname']);
                    $bookingpress_edit_customer_details['bookingpress_user_email'] = stripslashes_deep($bookingpress_edit_customer_details['bookingpress_user_email']); 

                    // Get customers meta details
                    // $bookingpress_customer_gender    = get_user_meta( $bookingpress_wpuser_id, 'gender', true );
                    // $bookingpress_customer_birthdate = get_user_meta( $bookingpress_wpuser_id, 'birthdate', true );

                    $bookingpress_customer_note_data                   = $BookingPress->get_bookingpress_customersmeta($bookingpress_edit_id, 'customer_note');
                    $bookingpress_edit_customer_details['note']        = stripslashes_deep($bookingpress_customer_note_data);
                    $bookingpress_get_existing_avatar_list             = $BookingPress->get_bookingpress_customersmeta($bookingpress_edit_id, 'customer_avatar_details');

                    //$bookingpress_edit_customer_details['avatar_list'] = $bookingpress_get_existing_avatar_list;

                    $bookingpress_get_existing_avatar_list             = ! empty($bookingpress_get_existing_avatar_list) ? maybe_unserialize($bookingpress_get_existing_avatar_list) : array();
                    $bookingpress_edit_customer_details['avatar_name'] = ! empty($bookingpress_get_existing_avatar_list[0]['name']) ? $bookingpress_get_existing_avatar_list[0]['name'] : '';
                    $bookingpress_edit_customer_details['avatar_url']  = ! empty($bookingpress_get_existing_avatar_list[0]['url']) ? $bookingpress_get_existing_avatar_list[0]['url'] : '';

                    // $bookingpress_edit_customer_details['gender']    = ! empty( $bookingpress_customer_gender ) ? $bookingpress_customer_gender : '';
                    // $bookingpress_edit_customer_details['birthdate'] = ! empty( $bookingpress_customer_birthdate ) ? $bookingpress_customer_birthdate : '';
                    if(!empty($bookingpress_wpuser_id)) {
                        $user_data = '';                    
                        $user_data = get_userdata($bookingpress_wpuser_id);                    
                        if(!empty($user_data)) {                        
                            $bookingpress_existing_user_data[] = array(
                                'category' => __('Select Existing User','bookingpress-appointment-booking'),
                                'wp_user_data' => array(
                                    array(
                                        'value' => $user_data->ID,				
                                        'label' => $user_data->user_login,
                                    )
                                ),
                            );
                            $bookingpress_edit_customer_details['wp_user_list'] = $bookingpress_existing_user_data;                    
                        }
                    }    
                    $bookingpress_edit_customer_details['bpa_wp_nonce'] = wp_create_nonce('bpa_wp_nonce');
                    $bookingpress_edit_customer_details = apply_filters( 'bookingpress_modify_edit_customer_details', $bookingpress_edit_customer_details, $bookingpress_edit_id );

                    $response['edit_data'] = $bookingpress_edit_customer_details;
                    $response['msg']       = esc_html__('Edit data retrieved successfully', 'bookingpress-appointment-booking');
                    $response['variant']   = 'success';
                    $response['title']     = esc_html__('Success', 'bookingpress-appointment-booking');

                }
            }

            echo wp_json_encode($response);
            exit();
        }
        
        
        function bookingpress_add_customer()
        {
            $is_customer_dni_column = $this->add_customer_dni_column();
            $this->add_customer_tipo_doc_column();
            
            global $wpdb, $BookingPress, $tbl_bookingpress_customers;
            $response                = array();

            $response['customer_id'] = '';
            $response['wpuser_id']   = '';
            $response['variant']     = 'error';
            $response['title']       = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']         = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            
            $bpa_check_authorization = $this->bpa_check_authentication( 'add_customer', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            if (! empty($_REQUEST) ) {
                //updates 2026
                //$add_msg = ' no';
                
                $customer_metadata = $_REQUEST['bpa_customer_field'];
                $customer_metadata = is_array($customer_metadata)? $customer_metadata : [];
                
                $customer_dni = ! empty($_REQUEST['customer_dni']) ? trim(sanitize_text_field($_REQUEST['customer_dni'])) : '';
                if( empty($customer_dni) ) {
                    //$customer_metadata = !empty( $_POST['bpa_customer_field'] ) ? array_map( array( $BookingPress, 'appointment_sanatize_field' ), $_POST['bpa_customer_field'] ) : array();  // phpcs:ignore
                    
                    $customer_dni = !empty($customer_metadata['text_C6kufq'])? trim(sanitize_text_field($customer_metadata['text_C6kufq'])): '';
                    //$add_msg = print_r( [ (is_array($customer_metadata)?' sippp ':' noppp ') ,$customer_metadata], true);//['text_C6kufq']
                }
                
                $customer_tipo_doc = ! empty($_REQUEST['tipo_doc']) ? trim(sanitize_text_field($_REQUEST['tipo_doc'])) : '';
                if( empty($customer_tipo_doc) ) {
                    $customer_tipo_doc = !empty($customer_metadata['tipo_doc'])? trim(sanitize_text_field($customer_metadata['tipo_doc'])): '';
                }
                $customer_tipo_doc = in_array(strtoupper($customer_tipo_doc),['DU','LC','LE','CI','PASS'])? strtoupper($customer_tipo_doc) : '';
                
                $bookingpress_existing_user_id = ! empty($_REQUEST['wp_user']) ? trim(sanitize_text_field($_REQUEST['wp_user'])) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                $bookingpress_username         = ! empty($_REQUEST['username']) ? sanitize_text_field($_REQUEST['username']) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                $bookingpress_firstname        = ! empty($_REQUEST['firstname']) ? trim(sanitize_text_field($_REQUEST['firstname'])) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                $bookingpress_lastname         = ! empty($_REQUEST['lastname']) ? trim(sanitize_text_field($_REQUEST['lastname'])) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                $bookingpress_email            = ! empty($_REQUEST['email']) ? sanitize_email($_REQUEST['email']) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                $bookingpress_user_pass        = wp_generate_password(12, false);
             // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['search_data'] contains password and will be hashed using wp_create_user function. 
                $bookingpress_password = ! empty($_REQUEST['password']) ? $_REQUEST['password'] : $bookingpress_user_pass;

                if( empty($customer_dni) ) {
                    $response['msg'] = esc_html__('Campo DNI es requerido...', 'bookingpress-appointment-booking');
                    //$response['msg'] .= ' ' . $add_msg;
                    wp_send_json($response);
                    die();                    
                }
                
                if( empty($customer_tipo_doc) ) {
                    $response['msg'] = esc_html__('Campo Tipo documento es requerido...', 'bookingpress-appointment-booking');
                    //$response['msg'] .= ' ' . $add_msg;
                    wp_send_json($response);
                    die();                    
                }
                
                $bookingpress_email = !empty($bookingpress_email)? $bookingpress_email : "{$customer_tipo_doc}-{$customer_dni}@no-email.invalid";
                
                if (strlen($bookingpress_firstname) > 255 ) {
                    $response['msg'] = esc_html__('Firstname is too long...', 'bookingpress-appointment-booking');
                    wp_send_json($response);
                    die();
                }

                if (strlen($bookingpress_lastname) > 255 ) {
                    $response['msg'] = esc_html__('Lastname is too long...', 'bookingpress-appointment-booking');
                    wp_send_json($response);
                    die();
                }

                if (strlen($bookingpress_email) > 255 ) {
                    $response['msg'] = esc_html__('Email address is too long...', 'bookingpress-appointment-booking');
                    wp_send_json($response);
                    die();
                }

                $bookingpress_allow_customer_create = $BookingPress->bookingpress_get_settings('allow_wp_user_create', 'customer_setting');
                $bookingpress_allow_customer_create = ! empty($bookingpress_allow_customer_create) ? $bookingpress_allow_customer_create : 'false';

                if (! empty($bookingpress_existing_user_id) && $bookingpress_existing_user_id == 'add_new' && email_exists($bookingpress_email) ) {
                    $response['msg'] = esc_html__('Email address is already exists', 'bookingpress-appointment-booking');
                    wp_send_json($response);
                    die();
                }
                
                if( !empty($bookingpress_username )){
                    $bookingpress_user_name = $bookingpress_username;
                } else {
                    //$bookingpress_user_name = ! empty($bookingpress_firstname) ? $bookingpress_firstname : $bookingpress_email;
                    
                }
                
                $bookingpress_user_name = !empty($customer_dni)? "{$customer_tipo_doc}-{$customer_dni}":$bookingpress_username;
                                

                if (! empty($bookingpress_existing_user_id) && $bookingpress_existing_user_id == 'add_new' && ! empty($bookingpress_password) && !empty($bookingpress_user_name)) {
                    $f = fopen(__DIR__ . '/admin_crete_user.txt', 'a');
                    if($f){
                        fwrite($f, print_r([compact('bookingpress_existing_user_id','bookingpress_user_name','bookingpress_email','bookingpress_password',''),$_REQUEST],true));
                        fclose( $f );
                    }
                    $wp_create_wp_user_id          = wp_create_user($bookingpress_user_name, $bookingpress_password, (!empty($bookingpress_customer_email) && !get_user_by('email', $bookingpress_customer_email ) ? $bookingpress_customer_email : "{$bookingpress_user_name}@no-email.invalid") );
                    $bookingpress_existing_user_id = $wp_create_wp_user_id;
                }
                $bookingpress_phone         = ! empty($_REQUEST['phone']) ? trim(sanitize_text_field($_REQUEST['phone'])) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                $bookingpress_country_phone = ! empty($_REQUEST['customer_phone_country']) ? trim(sanitize_text_field($_REQUEST['customer_phone_country'])) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                $bookingpress_country_dial_code = !empty($_REQUEST['customer_phone_dial_code']) ? trim(sanitize_text_field($_REQUEST['customer_phone_dial_code'])) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                $bookingpress_note          = ! empty($_REQUEST['note']) ? trim(sanitize_textarea_field($_REQUEST['note'])) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                $bookingpress_update_id     = ! empty($_REQUEST['update_id']) ? ( intval($_REQUEST['update_id']) ) : 0;

                if( !empty($bookingpress_phone) && !empty( $bookingpress_country_dial_code) ){

                    $customer_phone_pattern = '/(^\+'.$bookingpress_country_dial_code.')/';
                    if( preg_match($customer_phone_pattern, $bookingpress_phone) ){
                        $bookingpress_phone = preg_replace( $customer_phone_pattern, '', $bookingpress_phone) ;
                    }
                }

                $booking_user_update_meta_details['first_name'] = $bookingpress_firstname;
                $booking_user_update_meta_details['last_name']  = $bookingpress_lastname;

                if (empty($bookingpress_update_id) ) {
                    $bookingpress_customer_details = array(
                    'bookingpress_customer_name'      => $bookingpress_user_name,
                    'bookingpress_customer_phone'     => $bookingpress_phone,
                    'bookingpress_customer_firstname' => $bookingpress_firstname,
                    'bookingpress_customer_lastname'  => $bookingpress_lastname,
                    'bookingpress_customer_country'   => $bookingpress_country_phone,
                    'bookingpress_customer_email'     => $bookingpress_email,
                    'bookingpress_customer_note'      => $bookingpress_note,
                    'bookingpress_customer_phone_dial_code' => $bookingpress_country_dial_code 
                    );
                    
                    $bookingpress_customer_details['customer_dni'] = sanitize_text_field($customer_dni);
                    $bookingpress_customer_details['tipo_doc'] = sanitize_text_field($customer_tipo_doc);
                    

                    if (! empty($bookingpress_existing_user_id) ) {
                        do_action('bookingpress_user_update_meta', $bookingpress_existing_user_id, $booking_user_update_meta_details);
                    }
                    
			        $bookingpress_customer_details = $this->bookingpress_create_customer($bookingpress_customer_details, $bookingpress_existing_user_id,2,1);

                    if (is_array($bookingpress_customer_details) && isset($bookingpress_customer_details['bookingpress_customer_id']) && isset($bookingpress_customer_details['bookingpress_wpuser_id']) ) {
                        $bookingpress_update_id        = $bookingpress_customer_details['bookingpress_customer_id'];
                        $bookingpress_existing_user_id = $bookingpress_customer_details['bookingpress_wpuser_id'];

                        do_action('bookingpress_after_update_customer', $bookingpress_update_id);
                        do_action('bookingpress_after_create_new_customer', $bookingpress_update_id);                        

                        $response['customer_id'] = $bookingpress_update_id;
                        $response['wpuser_id']   = $bookingpress_existing_user_id;
                        $response['variant']     = 'success';
                        $response['title']       = esc_html__('Success', 'bookingpress-appointment-booking');
                        $response['msg']         = esc_html__('Customer has been added succsssfully.', 'bookingpress-appointment-booking');
                    }
                } else {
                    $bookingpress_existing_customer_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_customer_id = %d", $bookingpress_update_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                    $bookingpress_existing_wp_user_id = !empty($bookingpress_existing_customer_details['bookingpress_wpuser_id']) ? $bookingpress_existing_customer_details['bookingpress_wpuser_id'] : '';
                    if (! empty($bookingpress_existing_customer_details) ) {
                        $bookingpress_existing_user_id       = empty($bookingpress_existing_user_id) ? $bookingpress_existing_customer_details['bookingpress_wpuser_id'] : $bookingpress_existing_user_id;
                        $bookingpress_existing_users_details = get_userdata($bookingpress_existing_user_id);
                        if($bookingpress_existing_user_id != $bookingpress_existing_wp_user_id ) {
                            $userObj = new WP_User( $bookingpress_existing_wp_user_id );                   
                            $userObj->remove_role('bookingpress-customer');
                        }
                        if (! empty($bookingpress_existing_users_details->roles) && is_array($bookingpress_existing_users_details->roles) ) {
                               $bookingpress_user_roles = $bookingpress_existing_users_details->roles;
                               array_push($bookingpress_user_roles, 'bookingpress-customer');
                               $booking_user_update_meta_details['roles'] = $bookingpress_user_roles;
                        }
                        do_action('bookingpress_user_update_meta', $bookingpress_existing_user_id, $booking_user_update_meta_details);

                        $bookingpress_update_fields = array(
                            'bookingpress_user_name'      => $bookingpress_user_name,
                            'bookingpress_user_firstname' => $bookingpress_firstname,
                            'bookingpress_user_lastname'  => $bookingpress_lastname,
                            'bookingpress_user_email'     => $bookingpress_email,
                            'bookingpress_user_phone'     => $bookingpress_phone,
                            'bookingpress_user_country_phone' => $bookingpress_country_phone,
                            'bookingpress_wpuser_id'      => $bookingpress_existing_user_id,
                            'bookingpress_user_country_dial_code' => $bookingpress_country_dial_code,
                        );
                        $bookingpress_update_fields['customer_dni'] = sanitize_text_field($customer_dni);
                        $bookingpress_update_fields['tipo_doc'] = sanitize_text_field($customer_tipo_doc);

                        $bookingpress_update_where_condition = array(
                        'bookingpress_customer_id' => $bookingpress_update_id,
                        );

                        $wpdb->update($tbl_bookingpress_customers, $bookingpress_update_fields, $bookingpress_update_where_condition);

                        $BookingPress->update_bookingpress_customersmeta($bookingpress_update_id, 'customer_note', $bookingpress_note);

                        do_action('bookingpress_after_update_customer', $bookingpress_update_id);

                        do_action('bookingpress_after_update_bookingpress_customer', $bookingpress_update_id); 
                        
                        
                        $response['customer_id'] = $bookingpress_update_id;
                        $response['wpuser_id']   = $bookingpress_existing_user_id;
                        $response['variant']     = 'success';
                        $response['title']       = esc_html__('Success', 'bookingpress-appointment-booking');
                        $response['msg']         = esc_html__('Customer has been updated succsssfully.', 'bookingpress-appointment-booking');
                    }
                }

                $user_image_details = array();
                if (! empty($_REQUEST['avatar_name']) && ! empty($_REQUEST['avatar_url']) ) {
                    $user_img_url  = esc_url_raw($_REQUEST['avatar_url']); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                    $user_img_name = sanitize_file_name($_REQUEST['avatar_name']); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash

                    $bookingpress_get_existing_avatar_details = $BookingPress->get_bookingpress_customersmeta($bookingpress_update_id, 'customer_avatar_details');
                    $bookingpress_get_existing_avatar_details = ! empty($bookingpress_get_existing_avatar_details) ? maybe_unserialize($bookingpress_get_existing_avatar_details) : array();
                    $bookingpress_get_existing_avatar_url     = ! empty($bookingpress_get_existing_avatar_details[0]['url']) ? $bookingpress_get_existing_avatar_details[0]['url'] : '';

                    if ($user_img_url != $bookingpress_get_existing_avatar_url ) {
                        global $BookingPress;
                        $upload_dir                 = BOOKINGPRESS_UPLOAD_DIR . '/';
                        $bookingpress_new_file_name = current_time('timestamp') . '_' . $user_img_name;
                        $upload_path                = $upload_dir . $bookingpress_new_file_name;
                        /* $bookingpress_upload_res    = $BookingPress->bookingpress_file_upload_function($user_img_url, $upload_path); */

                        $bookingpress_upload_res = new bookingpress_fileupload_class( $user_img_url, true );
                        $bookingpress_upload_res->check_cap          = true;
                        $bookingpress_upload_res->check_nonce        = true;
                        $bookingpress_upload_res->nonce_data         = isset($_REQUEST['_wpnonce']) ? sanitize_text_field($_REQUEST['_wpnonce']) : '';
                        $bookingpress_upload_res->nonce_action       = 'bpa_wp_nonce';
                        $bookingpress_upload_res->check_only_image   = true;
                        $bookingpress_upload_res->check_specific_ext = false;
                        $bookingpress_upload_res->allowed_ext        = array();
                        $upload_response = $bookingpress_upload_res->bookingpress_process_upload( $upload_path );

                        if( true == $upload_response ){

                            $user_image_new_url   = BOOKINGPRESS_UPLOAD_URL . '/' . $bookingpress_new_file_name;
                            $user_image_details[] = array(
                            'name' => $bookingpress_new_file_name,
                            'url'  => $user_image_new_url,
                            );

                            $BookingPress->update_bookingpress_customersmeta($bookingpress_update_id, 'customer_avatar_details', maybe_serialize($user_image_details));

                            $bookingpress_file_name_arr = explode('/', $user_img_url);
                            $bookingpress_file_name     = $bookingpress_file_name_arr[ count($bookingpress_file_name_arr) - 1 ];
                            if( file_exists( BOOKINGPRESS_TMP_IMAGES_DIR . '/' . $bookingpress_file_name ) ){
                                @unlink(BOOKINGPRESS_TMP_IMAGES_DIR . '/' . $bookingpress_file_name);
                            }

                            if (! empty($bookingpress_get_existing_avatar_url) ) {
                                // Remove old image and upload new image
                                $bookingpress_file_name_arr = explode('/', $bookingpress_get_existing_avatar_url);
                                $bookingpress_file_name     = $bookingpress_file_name_arr[ count($bookingpress_file_name_arr) - 1 ];
                                if( file_exists( BOOKINGPRESS_UPLOAD_DIR . '/' . $bookingpress_file_name ) ){   
                                    @unlink(BOOKINGPRESS_UPLOAD_DIR . '/' . $bookingpress_file_name);
                                }
                            }
                        }
                    }
                } else {
                    $BookingPress->update_bookingpress_customersmeta($bookingpress_update_id, 'customer_avatar_details', maybe_serialize($user_image_details));
                }
            }

            wp_send_json($response);
            die();
        }
        
        
        
    }//fin class
    
//add_action('plugins_loaded',function(){

global $bookingpress_customers;
    if( !empty($bookingpress_customers) ){
        //remove_action('wp_ajax_bookingpress_get_customers', array( $bookingpress_customers, 'bookingpress_get_customer_details' ) );
        $bookingpress_customers     = new mod_bookingpress_customers();
    }

//},10);

}//fin class customers exists



