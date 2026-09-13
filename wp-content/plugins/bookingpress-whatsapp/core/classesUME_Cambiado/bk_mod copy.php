<?php
/**
 * 
 * @version 1.0.001
 */

global $dni_key;
$dni_key = 'text_C6kufq';

class BookingMOD_appointment{
    public $price = 0;
    
    function change_app_data( $mod_appointment_data ){
        $is_particular = 0;
        if(  is_array($mod_appointment_data['form_fields']['is_particular']) ){
                    if( in_array("particular", $mod_appointment_data['form_fields']['is_particular']) ){
                        $is_particular = 1;
                    }
                }else{
                    if( $mod_appointment_data['form_fields']['is_particular'] == "particular"){
                        $is_particular = 1;
                    }
                }
                
                if( $is_particular ){
				    //if( empty($mod_appointment_data['form_fields']['text_oO9f1B']) ) $mod_appointment_data['form_fields']['text_oO9f1B'] = "_";
                    if( empty($mod_appointment_data['form_fields']['text_o9q4Cr']) ) $mod_appointment_data['form_fields']['text_o9q4Cr'] = "_";
                    
                    $this->price = $mod_appointment_data['total_payable_amount'];
                    //$this->price = 6;
                    //$mod_appointment_data['form_fields']['text_o9q4Cr']
                    
                }else{
                    #if( $mod_appointment_data['form_fields']['text_oO9f1B'] == 'PAMI' ){
                        #$this->price = $mod_appointment_data['total_payable_amount'];
                        //$this->price = 5;
                    #}
                    #else{
                        $this->price = $mod_appointment_data['total_payable_amount'];
                        //$this->price = 7;
                    #}
                }
                
                global $current_new_appointment_price;
                    $current_new_appointment_price = $this->price;
                    $GLOBALS['current_new_appointment_price'] = $this->price;
                    $price = $this->price? $this->price : 0;
                    
                    $mod_appointment_data['total_payable_amount'] = $price;
                    $mod_appointment_data['total_payable_amount_with_currency'] = "$".$price.".00";
                    $mod_appointment_data['selected_service_price'] = "$".$price.".00";
                    $mod_appointment_data['service_price_without_currency'] = $price;
                    
                    
                #maxidata( ' mod data REQUEST ', $mod_appointment_data );
                
                $_REQUEST['appointment_data'] = json_encode( $mod_appointment_data );
                
                
        return $mod_appointment_data;
    }
}
$BookingMOD_appointment = new BookingMOD_appointment();

$GLOBALS["bookingmod_app"] = $BookingMOD_appointment;



#$multiple_day_response = apply_filters( 'bookingpress_get_multiple_days_disable_dates', $multiple_day_response, $bookingpress_selected_date, $bookingpress_selected_service, $bookingpress_appointment_data );


/*
add_filter( 'bookingpress_get_multiple_days_disable_dates', 'bk_mod_add_staff_data',100, 4);

    function bk_mod_add_staff_data( $multiple_day_response, $bookingpress_selected_date, $bookingpress_selected_service, $bookingpress_appointment_data ){
        
        
        
        
        return $multiple_day_response;
    }
    
    //####LINEA 2656 add_action('wp_footer', 'bookingpress_mod_form_control',20);
    //####LINEA 3384 add_action('plugins_loaded', [$this, 'change_actions'],10 );
    //####LINEA 3849 add_action( 'plugins_loaded', [$this, 'change_actions'],10 );
    ####LINEA 4289 COMENTED

*/
add_action('wp_ajax_bk_mod_medic_condition','bk_mod_medic_condition');
add_action('wp_ajax_nopriv_bk_mod_medic_condition','bk_mod_medic_condition');

function bk_mod_medic_condition(){
    $medic_condition = array();
    $request = $_REQUEST;
    $medic_condition['solo_particular'] = false;
    /*
    if( isset($request['staffmember_id']) ){
        $staff_id = (int) $request['staffmember_id'];
    }
    $medic_condition['solo_particular'] = true;
    if($staff_id == 4){
        $medic_condition['solo_particular'] = false;
    }
    if($staff_id == 4){
        $medic_condition['solo_particular'] = false;
    }
    */
    echo json_encode($medic_condition);
    exit;
}

add_action('bookingpress_after_book_appointment', 'save_obs_after_appointment', 12, 1);
add_action('bookingpress_after_update_appointment', 'save_obs_after_appointment',12,1 );

        function save_obs_after_appointment( $appointment_id=0 ){
			global $wpdb, $tbl_bookingpress_appointment_meta, $tbl_bookingpress_appointment_bookings;
            if(!$appointment_id) return;
            $obs_field = "";
            $bookingpress_appointment_meta = $existe_obs_meta = array();
            $obra_social_field_key = 'text_oO9f1B';
            
            //echo "corriendo save obs<br />"; 
            
            $bookingpress_appointment_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_booking_id = %d", $appointment_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm 
            //if(empty($bookingpress_appointment_data)) return;
            $existe_obs_meta = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_appointment_meta} WHERE bookingpress_appointment_id = %d AND bookingpress_appointment_meta_key = 'obra_soc_art' ", $appointment_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
            //print_r($existe_obs_meta);
            //echo "---------- $tbl_bookingpress_appointment_meta <br />";
            //$bookingpress_appointment_meta = $wpdb->get_row($wpdb->prepare("SELECT * FROM `{$tbl_bookingpress_appointment_meta}` WHERE `bookingpress_appointment_booking_id` = '%d' AND `bookingpress_appointment_meta_key` = 'appointment_form_fields_data' ", $appointment_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
            
            $bookingpress_appointment_meta = $wpdb->get_row($wpdb->prepare("SELECT * FROM `{$tbl_bookingpress_appointment_meta}` WHERE `bookingpress_appointment_id` = %d AND `bookingpress_appointment_meta_key` = 'appointment_form_fields_data' ", $appointment_id), ARRAY_A);
            
             //echo "+++++++++<br />";
             //print_r(json_encode($bookingpress_appointment_meta) );
            if(empty($bookingpress_appointment_meta)) return;
            $appointment_fields = is_array($bookingpress_appointment_meta['bookingpress_appointment_meta_value'])? $bookingpress_appointment_meta['bookingpress_appointment_meta_value']:json_decode($bookingpress_appointment_meta['bookingpress_appointment_meta_value'], true);
            
            if( isset( $appointment_fields['form_fields'][$obra_social_field_key] ) ){
                $obs_field = $appointment_fields['form_fields'][$obra_social_field_key];
            }
            if( isset( $appointment_fields['form_fields']['obra_soc_seguros'] ) ){
                $obs_field = $appointment_fields['form_fields']['obra_soc_seguros'];
            }
            if($appointment_fields['form_fields']['is_particular'] == 'particular'){
                $obs_field = 'particular';
            }
                        
            if( !empty($obs_field) ){
                $bookingpress_appointment_meta['bookingpress_appointment_meta_key'] = 'obra_soc_art';
                $bookingpress_appointment_meta['bookingpress_appointment_meta_value'] = $obs_field;
                
                if($appointment_fields['form_fields']['is_particular'] == 'particular'){
                    //COMENTADO 
                    //$bookingpress_appointment_meta['bookingpress_appointment_meta_value'] = 'particular';
                }
                /*
    			$bookingpress_appointment_form_fields_data = array(
    				'form_fields' => !empty($bookingpress_appointment_data['bookingpress_appointment_meta_fields_value']) ? $bookingpress_appointment_data['bookingpress_appointment_meta_fields_value'] : array(),
    				'bookingpress_front_field_data' => !empty($bookingpress_appointment_data['bookingpress_appointment_meta_fields_value']) ? $bookingpress_appointment_data['bookingpress_appointment_meta_fields_value'] : array(),
    			);
                */
                
    			$bookingpress_db_fields = $bookingpress_appointment_meta;
                unset($bookingpress_db_fields['bookingpress_appointment_meta_id']);
    
    			if( empty($existe_obs_meta) ){
                    $wpdb->insert($tbl_bookingpress_appointment_meta, $bookingpress_db_fields);
                    //echo "<br /> insert ";
                }else{
                    $wpdb->update($tbl_bookingpress_appointment_meta, $bookingpress_db_fields, $existe_obs_meta );
                    //echo "<br /> update ";
                }
                
                
                $servicio_particular = 0;
                $form_fields = !empty($appointment_fields['form_fields'])? $appointment_fields['form_fields']: array();
            
            
                if( !empty($bookingpress_appointment_data) ){
                    
                    if( !empty($form_fields['obra_soc_seguros']) ){
                        if('particular' == strtolower($form_fields['obra_soc_seguros']) ) $servicio_particular = 1;
                    }
                    if( !empty($form_fields['is_particular']) ){
                        if('particular' == strtolower($form_fields['is_particular']) ) $servicio_particular = 1;
                    }
                    
                    if( !$servicio_particular )
                    {
                    // Insert data into entries table. Modify
        				$modify_entry_details = array(
        					'bookingpress_deposit_amount'                 => 0,
        					'bookingpress_staff_member_price'             => 0,
        					'bookingpress_paid_amount'                    => 0,
        					'bookingpress_due_amount'                     => 0,
        					'bookingpress_total_amount'                   => 0
        				);
                        
                        if( !empty($bookingpress_appointment_data['bookingpress_staff_member_details']) ){
                            
                            $bookingpress_staffmember_details = json_decode($bookingpress_appointment_data['bookingpress_staff_member_details'], true);
                            $bookingpress_staffmember_details["bookingpress_service_price"] = 0;
                            $modify_entry_details['bookingpress_staff_member_details'] = wp_json_encode($bookingpress_staffmember_details);
                        }
                        
                        $bookingpress_appointment_data = array_merge($bookingpress_appointment_data, $modify_entry_details);
                        $wpdb->update($tbl_bookingpress_appointment_bookings , $bookingpress_appointment_data, array('bookingpress_booking_id'=> $appointment_id) );
                
                    }else{//fin if !particular
                        
                        //bookingpress_change_payment_status
                            global $tbl_bookingpress_payment_logs;
                            if( $bookingpress_appointment_data['bookingpress_complete_payment_url_selection'] == 'do_nothing')
                            {
                                
                                $bookingpress_payment_log_id = $bookingpress_appointment_data['bookingpress_payment_id'];
                                
                                if( !empty($bookingpress_payment_log_id)  ){
                                    $bookingpress_payment_log_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_payment_logs} WHERE bookingpress_payment_log_id = %d  ", $bookingpress_payment_log_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
                                    
                                    if( $bookingpress_payment_log_data['bookingpress_payment_gateway'] == 'manual' ){
                                        $bookingpress_payment_status = 2;
                				        $wpdb->update($tbl_bookingpress_payment_logs, array('bookingpress_payment_status' => $bookingpress_payment_status), array('bookingpress_payment_log_id' => $bookingpress_payment_log_id));
                                    }
                                        
                                }
                            }
                    }
                
                }//fin IF bookingpress_appointment_data
                
                
                if(isset($appointment_booking_field) ){
                    return $appointment_booking_field;
                }
                
                //print_r($bookingpress_db_fields);
            }
		}//fin save obs
        
        
        
        
function get_bookings_day( $medico = 0, $date = "2024-01-01", $hora="", $solo_config=false ){
    global $wpdb, $BookingPress, $tbl_bookingpress_services,$tbl_bookingpress_appointment_bookings, $tbl_bookingpress_appointment_meta, $tbl_bookingpress_payment_logs,$tbl_bookingpress_customers,$bookingpress_global_options,$tbl_bookingpress_form_fields;
    $response = array();
    
    if( empty($medico) || empty($date) ){
        print_r(" faltan datos.");
        return " faltan datos.";
    }
    
    $medico_id= $medico;
    $config_medico = array();
                $obras_medico = get_option('medico_opt_obras_'.$medico_id, [] );
                $obras_medico = is_array($obras_medico)? $obras_medico: json_decode($obras_medico, true );
                
                $config_medico = get_option('medico_opt_config_'.$medico_id, []);
    if( !empty($config_medico) && $solo_config == false ) {
        $obras_medico = array_filter($obras_medico, function($o){ return $o['active'];});
        $config_medico['obras_sociales'] = $obras_medico;
        
        $seguros_medico = get_option('medico_opt_seguros_'.$medico_id, [] );
        $config_medico['seguros_convenio'] = array_filter($seguros_medico, function($o){ return $o['active'];});
    }
    
    if( empty($config_medico) ){
    $config_medico = array(
    "obras_sociales"=>[ ],
    "seguros_convenio"=> [ ],
    "particular_habilitado"=>true,
    "solo_particular"=>true,
    "regla_particular"=> [
        'rango_fechas' => [ ],
        'days' => [ ],
        'rango_horas' => [ ],
        'days_horas_conjunto'=> false,
        'max_obra_soc_x_dia'=>0
    ],
    "total_obras_day_cont"=>0
    );
    
    include __DIR__ . '/config_medicos.php';
    
    }
    
    
    $config_medico_original = $config_medico;
    if( $solo_config ) return $config_medico;
    
    $where = " WHERE bookingpress_staff_member_id='{$medico}' AND bookingpress_appointment_date='{$date}' AND bookingpress_appointment_meta_key='obra_soc_art' ";
    
    $select_fields= "bookingpress_staff_member_id medico, bookingpress_appointment_date date, bookingpress_appointment_time hora, bookingpress_appointment_meta_value obra_soc_art";
    
    $res = $wpdb->get_results("SELECT $select_fields FROM {$tbl_bookingpress_appointment_bookings} join {$tbl_bookingpress_appointment_meta} meta ON bookingpress_appointment_booking_id = meta.bookingpress_appointment_id {$where} ", ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
    
    $obra_count = array();
    foreach($res as $turnos){
        if( isset($obra_count[ $turnos['obra_soc_art'] ]) ){
            $obra_count[ $turnos['obra_soc_art'] ]++;
        }else{
            $obra_count[ $turnos['obra_soc_art'] ] = 1;
        }
    }
    
    #echo "<br />OBRA COUNT: ";
    #print_r($obra_count);
    #echo "<br /> xxxxx <br /><br />";
    $config_medico['total_obras_day_cont']=0;
    $total_obras_day_cont = 0;
    
    $cupo_x_ob = [];
    foreach( $obra_count as $ob_red => $count){
        $obra_val="";
        $obra_val = trim( explode('-', $ob_red)[0] );
        $cupo_x_ob[$obra_val] += $count;
    }
    
    if( !empty($config_medico['obras_sociales']) ){
        foreach($config_medico['obras_sociales'] as $k=> $opcion ){
            $cupos=0;$obra_val="";
            
            if($opcion["limitado"]){
                if( !empty($opcion["cupo_x_obra"]) ){
                    $obra_val = trim( explode('-', $opcion["value"])[0] );
                    if( !empty( $cupo_x_ob[$obra_val] ) ){
                       $cupos = (int) $config_medico['obras_sociales'][$k]['cupos'];
                       $cupos = $cupos - (int) $cupo_x_ob[$obra_val];
                       $cupos = $cupos<1? 0: $cupos;
                       $config_medico['obras_sociales'][$k]['cupos'] = $cupos;
                    }
                }else{
                    if( !empty( $obra_count[ $opcion["value"] ] ) ){
                        $cupos = (int) $config_medico['obras_sociales'][$k]['cupos'];
                        $cupos = $cupos - (int) $obra_count[ $opcion["value"] ];
                        $cupos = $cupos<1? 0: $cupos;
                        $config_medico['obras_sociales'][$k]['cupos'] = $cupos;
                    }
                }
            }
            
            if( !empty( $obra_count[ $opcion["value"] ] ) ){
                $total_obras_day_cont += (int) $obra_count[ $opcion["value"] ];
            }
            $limitados[$k] = $opcion['limitado'];
            $labels[$k] = $opcion['label'];
        }
        $config_medico['total_obras_day_cont'] = $total_obras_day_cont;
        #echo " <br /><br /> TOTAL DE OBRAS EN EL DIA $total_obras_day_cont <br /><br />original: ";
        
        #print_r($config_medico_original);
        //2024-07-19 AGREGADO ORDEN MULTIPLE -- PRIMEROS CON LIMITE LUEGO ORDEN TITULO ALFABETICO
        array_multisort($limitados, SORT_DESC, $labels, SORT_ASC, $config_medico['obras_sociales']);
        #echo "<br />actualizado: ";
        #print_r($config_medico);
    }
    $merge_init = array();
    if( $config_medico['particular_habilitado'] ){
        $merge_init[] = array('label'=>"particular",'value'=>"particular",'limitado'=>false,'cupos'=>0, "grupo"=>false);
    }
    if( !empty($config_medico['obras_sociales']) ) $merge_init[] = array("grupo"=>"Obras Sociales","label"=>"Obras Sociales", "value"=>" ","limitado"=>false,"\$isDisabled"=>true,"isDisabled"=>true);
    $config_medico['obras_sociales'] = array_merge( $merge_init , $config_medico['obras_sociales'] );
    
    if( !empty($config_medico['seguros_convenio']) ){
        $config_medico['obras_sociales'] = array_merge(
            $config_medico['obras_sociales'],
            [array("grupo"=>"ART y Seguros con Convenio","label"=>"ART y Seguros con Convenio", "value"=>"  ","limitado"=>false,"\$isDisabled"=>true,"isDisabled"=>true)],
            $config_medico['seguros_convenio']
         );
    }
    
    return $config_medico;
    
    #echo "<br /><br />RESPUESTA BASE DE DATOS: <br />";
    #print_r($res);
}
        
        
        
        
        
        
/** ####################### AJAX GET BOOK DAYS ################################### */
        
        
        
        
        function ajax_get_bookings_day(){
            $config_medico=array();
            $medico = 3;//example lo reescribe con appont_data
            $date = "2024-07-18";//example lo reescribe con appoint_data
            $hora="";
            if(!empty($_REQUEST['appoint_data']) ){
                $appoint_data = is_array($_REQUEST['appoint_data'])? $_REQUEST['appoint_data']: json_decode($_REQUEST['appoint_data'], true);
                extract($appoint_data);
            }
            
            ob_start();
            $config_medico = get_bookings_day( $medico, $date, $hora );
            ob_get_clean();
            
            echo json_encode($config_medico);
            
            exit;
            
            
        }
add_action('wp_ajax_get_bookings_day','ajax_get_bookings_day');
add_action('wp_ajax_nopriv_get_bookings_day','ajax_get_bookings_day');
        
        
//solo usuarios
add_action('wp_ajax_get_customer_by_dni','ajax_get_customer_by_dni');        
        function ajax_get_customer_by_dni(){
            $appoint_data = array();
            $pacientes = array();
            $dni_key='text_C6kufq';
            $dni_value='';
            
            if(!empty($_REQUEST['appoint_data']) ){
                $appoint_data = is_array($_REQUEST['appoint_data'])? $_REQUEST['appoint_data']: json_decode($_REQUEST['appoint_data'], true);
                extract($appoint_data);
            }
            ob_start();
            $pacientes = get_dni_customers( $dni_value, $dni_key );
            ob_get_clean();
            
            echo json_encode($pacientes);
            exit;
            
        }
        
        function get_dni_customers( $dni_value, $dni_key='text_C6kufq', $db_results = false, $comparacion='like'){
            global $wpdb, $BookingPress, $tbl_bookingpress_services,$tbl_bookingpress_appointment_bookings, $tbl_bookingpress_appointment_meta, $tbl_bookingpress_payment_logs,$tbl_bookingpress_customers, $tbl_bookingpress_customers_meta,$bookingpress_global_options,$tbl_bookingpress_form_fields;
            $response = array();
            $msg = "success";
            $tmp_key = $dni_key;
            global $dni_key;
            if( empty($dni_key) ){
                $dni_key = $tmp_key;
                if( empty($dni_key) ){
                    $dni_key='text_C6kufq';
                }
            }
            
            if( strlen($dni_value) > 2 ){
                $porciento="%";
                if($comparacion != 'like') $porciento="";
            
            $where = " WHERE `bookingpress_customersmeta_key`= '{$dni_key}' AND `bookingpress_customersmeta_value` {$comparacion} '{$dni_value}{$porciento}' ";
            $select = "m.bookingpress_customer_id value, m.bookingpress_customersmeta_value dni, bookingpress_user_firstname firstname, bookingpress_user_lastname lastname";
            if( $db_results ) $select = "*";
            $query = "SELECT {$select} FROM {$tbl_bookingpress_customers_meta} m join {$tbl_bookingpress_customers} c on m.bookingpress_customer_id = c.bookingpress_customer_id  {$where} ";
                
            $res = $wpdb->get_results($query, ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
            if( $db_results ) return $res;
            
            }else{
                if( $db_results ) return array();
                return array('msg'=>$msg="error el dni es muy corto.", 'result'=>[], "dni"=>$dni_value,"key"=>$dni_key);
            }
            
            $id = isset( $res[0]['value'] )? $res[0]['value']:0;
            foreach($res as $i=>$row ){
                $txt ="";
                $txt = ( !empty( $row['dni'])? "DNI:".$row['dni'].", ":"").( isset( $row['firstname'])? "".$row['firstname']." ":"").( isset( $row['lastname'])? "".$row['lastname']."":"");
                $res[$i]["text"] = $txt;
            }
            
            $response = array('msg'=>$msg, 'result'=>$res, "dni_value"=>$dni_value,"key"=>$dni_key,  'id'=>"$id" );
            return $response;
            //bookingpress_retrieve_custom_field_values
        }
        
        
##### OBRAS Y CONFIGURACION DE MEDICOS ########
        /**
         * get_all_obras
         *  option("todas_las_obras", [])
         * @return array
         */
        function get_all_obras(){
            $all_obras_opt = [];
            
            if( function_exists("get_option") ){
                
                $all_obras_opt = get_option("todas_las_obras", []);
                
                if( !empty($all_obras_opt) ){
                    //echo "/* de opciones*/";
                    //echo json_encode( $all_obras_opt );
                    return $all_obras_opt;
                }
            }
            
            ob_start();
            $all_obras_opt = include( __DIR__ . '/all_obras.php');
            ob_get_clean();
            
            return $all_obras_opt;
        }
        
        /**
         * get_all_obras
         *  option("todos_los_seguros", [])
         * @return array
         */
        function get_all_seguros(){
            $all_seguros_opt = get_option("todos_los_seguros", []);
            if( is_array($all_seguros_opt) ){
                //$ob_col_id = array_column($all_seguros, 'id');
                //sort($ob_col_id, SORT_ASC);
                //$last_id = !empty(end($ob_col_id))? end($ob_col_id): count($all_seguros);
                //update_option("ultima_seguros_id", $last_id);
            }
            
            return $all_seguros_opt;
        }
        function save_new_seguros($nuevos_seguros = []){
            $todas_new = array();
            ob_start();
                $all_seguros = get_all_seguros();
                $ob_col_id = array_column($all_seguros, 'id');
                sort($ob_col_id, SORT_ASC);
                $last_id = !empty(end($ob_col_id))? end($ob_col_id): count($all_seguros);
                $last_id = (int) get_option("ultima_seguros_id", $last_id);
                
                $all_con_keys = array_column($all_seguros, 'value', 'value');
                
                foreach($nuevos_seguros as $obra){
                    if( !isset($all_con_keys[$obra['value']]) && !empty($obra['add_new']) ){
                        $last_id++;
                        $obra['id'] = $last_id; $obra['cupos'] = 0;
                        $obra['tipo'] = "seguros";
                        $obra['active'] = $obra['limitado'] = $obra['grupo'] = false;
                        if( !empty($obra['add_new']) ) unset( $obra['add_new'] );
                        $all_seguros[] = $obra;
                    }
                }
                update_option("ultima_seguros_id", $last_id);
                update_option("todos_los_seguros", $all_seguros);
            ob_get_clean();
            
        }
        
        //-------------------------------------
        
        add_action('wp_ajax_get_config_medico', 'ajax_get_admin_config_medico',10);
        
        function ajax_get_admin_config_medico(){
            $appoint_data = array();
            $medico_id = 0;
            if(!empty($_REQUEST['appoint_data']) ){
                $appoint_data = is_array($_REQUEST['appoint_data'])? $_REQUEST['appoint_data']: json_decode($_REQUEST['appoint_data'], true);
                extract($appoint_data);
            }
            if( $medico_id ){
                //ob_start();
                $descripcion = get_option('medico_opt_descripcion_'.$medico_id, "");
                
                $mpago = get_option('medico_opt_mpago_'.$medico_id, array( "pub_key"=>"","token"=>"","secret"=>"" ) );
                
                $config_medico = get_admin_config_medico($medico_id);//get_bookings_day( $medico_id, "2024-01-01", "", true );
                
                
                //echo ob_get_clean();
                echo json_encode( array(
                'success'       => 'success',
                'medico_id'     => $medico_id,
                'descripcion'   => $descripcion,
                'mpago'     => $mpago,
                'config'    => $config_medico,
                )
                );
            }else{
                echo "sin id de medico.";
            }
            
            exit;
        }
        
        function get_admin_config_medico($medico_id){
        //delete_option('medico_opt_obras_'.$medico_id);
        //delete_option('medico_opt_config_'.$medico_id);
                $all_obras = array();
                $all_seguros = array();
                $obras_medico = get_option('medico_opt_obras_'.$medico_id, [] );
                $obras_medico = is_array($obras_medico)? $obras_medico: json_decode($obras_medico, true );
                $seguros_medico = get_option('medico_opt_seguros_'.$medico_id, [] );
                $seguros_medico = is_array($seguros_medico)? $seguros_medico: json_decode($seguros_medico, true );
                $config_medico = array();
                $config_medico = get_option('medico_opt_config_'.$medico_id, []);
        /*
                if( !empty($config_medico) ){
                    $config_medico = is_array($config_medico)? $config_medico: json_decode($config_medico, true );
                    $config_medico['obras_sociales'] = array_merge($all_obras, $obras_medico);
                    return $config_medico;
                }
*/
                ob_start();
                $all_obras = get_all_obras();
                $all_seguros = get_all_seguros();
                
                if( empty($config_medico) ) $config_medico = get_bookings_day( $medico_id, "1000-01-01", "", true );
                ob_get_clean();
                
                if(!empty($obras_medico)) $config_medico['obras_sociales'] = $obras_medico;
                if(!empty($seguros_medico)) $config_medico['seguros_convenio'] = $seguros_medico;
                
                $config_medico['count_obras_total'] = count($all_obras);
                $config_medico['count_obras_prev'] = count($config_medico['obras_sociales']);
                $config_medico['count_obras_activas'] = $config_medico['count_seguros_activos'] = 0;
                $config_medico['obras_perdidas'] = [];
                $config_medico['tiene_obras']= "no";
                
                //return $config_medico;
        /**
         * merge all obras - obras medico
         * merge all seguros - seguros medico
         */
                if( !empty( $config_medico['obras_sociales'] ) ){
                    $config_medico['tiene_obras']= "si";
                    $obras_sociales = array_column($config_medico['obras_sociales'], null, 'value');
                    
                    $all_con_keys = array();
                    $all_con_keys = array_column($all_obras, 'value', 'value');
                
                    $config_medico['obras_perdidas'] = array_diff( array_keys($obras_sociales), array_keys($all_con_keys) );
                    
                    foreach( $all_obras as $k => $obra ){
                        $active = false;
                        if( !empty($obras_sociales[$obra['value']]) ){
                            unset($obras_sociales[$obra['value']]['label']);
                            $all_obras[$k] = array_merge($all_obras[$k], $obras_sociales[$obra['value']] );
                            
                            if( !isset($obras_sociales[$obra['value']]['active']) ){
                            $all_obras[$k]['active'] = true;
                            } 
                            if( !empty($all_obras[$k]['add_new']) ) unset( $all_obras[$k]['add_new'] );
                            $all_obras[$k]['active'] = boolval($all_obras[$k]['active']);
                            $all_obras[$k]['limitado'] = boolval($all_obras[$k]['limitado']);
                            
                            if($all_obras[$k]['active']) $config_medico['count_obras_activas']++;
                        }
                    }//fin foreach
                    
                    unset($obras_sociales, $all_con_keys);
                }//fin no empty obras
                //array_multisort($limitados, SORT_DESC, $labels, SORT_ASC, $config_medico['obras_sociales']);
                
                $all_values = array_column($all_obras, 'value');
                $all_values = array_map('strtoupper',$all_values);
                
                array_multisort($all_values, SORT_ASC, SORT_STRING, $all_obras);
                
                $config_medico['obras_sociales'] = $all_obras;
                unset($all_obras, $obras_medico, $all_values);
        /** fin merge all obras - obras medico */
        
        /**
         * 
         * merge all seguros - seguros medico
         */
                if( !empty( $config_medico['seguros_convenio'] ) ){
                    
                    $seguros_medico_value_key = array_column($config_medico['seguros_convenio'], null, 'value');
                    
                    $seguros_all_value_key = array();
                    $seguros_all_value_key = array_column($all_seguros, null, 'value');
                    
                    //$temp_all_seguros = array_intersect_key($seguros_medico_value_key, $seguros_all_value_key);
                    //$all_seguros = array_merge($all_seguros, $temp_all_seguros);
                    $all_seguros = array_merge($seguros_all_value_key, $seguros_medico_value_key);
                    $all_seguros = array_map(function( $val ) use( $config_medico ) {
                        $val['tipo'] = "seguros";
                        if($val['active']) $config_medico['count_seguros_activos']++;
                        if( !empty($val['add_new']) ) unset( $val['add_new'] );
                        return $val;
                    },$all_seguros);
                    
                    $all_seguros = array_values($all_seguros);
                    
                    unset($seguros_all_value_key, $seguros_medico_value_key);
                    /**
                    foreach( $all_obras as $k => $obra ){
                        $active = false;
                        if( !empty($obras_sociales[$obra['value']]) ){
                            unset($obras_sociales[$obra['value']]['label']);
                            $all_obras[$k] = array_merge($all_obras[$k], $obras_sociales[$obra['value']] );
                            
                            if( !isset($obras_sociales[$obra['value']]['active']) ){
                            $all_obras[$k]['active'] = true;
                            } 
                            if( !empty($all_obras[$k]['add_new']) ) unset( $all_obras[$k]['add_new'] );
                            $all_obras[$k]['active'] = boolval($all_obras[$k]['active']);
                            $all_obras[$k]['limitado'] = boolval($all_obras[$k]['limitado']);
                            
                            if($all_obras[$k]['active']) $config_medico['count_seguros_activas']++;
                        }
                    }//fin foreach
                    */
                    
                }//fin no empty seguros
                
                $all_values = array_column($all_seguros, 'value');
                $all_values = array_map('strtoupper',$all_values);
                
                array_multisort($all_values, SORT_ASC, SORT_STRING, $all_seguros);
                
                $config_medico['seguros_convenio'] = $all_seguros;
        /** fin merge all seguros - seguros medico */
                
                //$config_medico['a_ver']= $all_values;
                $config_medico["regla_particular"] = array_merge(
                    [
                        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
                        'days' => [ ],//[ "mier" ,"mar"] los mier y martes particular
                        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
                        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
                        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
                    ],
                    $config_medico["regla_particular"]
                );
                
                $config_medico = array_merge( array(
                    "obras_sociales"=>[],
                    "seguros_convenio"=>[],
                    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
                    "solo_particular"=>false,
                    "regla_particular"=> [
                        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
                        'days' => [ ],//[ "mier" ,"mar"] los mier y martes particular
                        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
                        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
                        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
                    ],
                    "total_obras_day_cont"=>0
                    ),
                    $config_medico
                );
                //$config_medico["solo_particular"] = "false";
                $config_medico["particular_habilitado"] = boolval( $config_medico["particular_habilitado"]);
                $config_medico["solo_particular"] = boolval( $config_medico["solo_particular"]);
                $config_medico["regla_particular"]["days_horas_conjunto"] = boolval( $config_medico["regla_particular"]["days_horas_conjunto"]);
                
                
                return $config_medico;
        }
        
        
        add_action('wp_ajax_save_config_medico', 'ajax_save_admin_config_medico',10);
        function ajax_save_admin_config_medico(){
            $appoint_data = array();
            $medico_id = 0;
            $descripcion = "";
            $mpago = array();
            $config = array();
            $obras = array();  
            //print_r(rawurldecode(file_get_contents('php://input')),true)
            $post_json = json_decode( file_get_contents('php://input'), true);
            
            
            //$f = fopen(__DIR__ .'/save_data.txt','w');
        //fwrite($f, print_r($post_json, true)."\n\n---------\n###########\n".ini_get('max_input_vars') );
        //fclose($f);
        
            if( empty($post_json) && !empty($_REQUEST['appoint_data']) ){
                                
                $appoint_data = is_array($_REQUEST['appoint_data'])? $_REQUEST['appoint_data']: json_decode(stripcslashes($_REQUEST['appoint_data']), true);  
                
                extract($appoint_data);
                $obras = is_array($_REQUEST['obras'])? $_REQUEST['obras']: json_decode(stripcslashes($_REQUEST['obras']), true);
            }else{
                
                $appoint_data = is_array($post_json['appoint_data'])? $post_json['appoint_data']: json_decode($post_json['appoint_data'], true);
                $temporal_descripcion = str_replace("\n","",$appoint_data['descripcion']);
                
                $appoint_data = is_array($post_json['appoint_data'])? $post_json['appoint_data']: json_decode(stripcslashes($post_json['appoint_data']), true);
                
                $obras = is_array($post_json['obras'])? $post_json['obras']: json_decode(stripcslashes($post_json['obras']), true); 
                
                $seguros = is_array($post_json['seguros'])? $post_json['seguros']: json_decode(stripcslashes($post_json['seguros']), true);                
                extract($appoint_data);
                
                $descripcion = $temporal_descripcion;
            }
            $ob_col_id = array_column($obras, 'id');
            sort($ob_col_id, SORT_ASC);
            $last_id = !empty(end($ob_col_id))? end($ob_col_id): count($obras);
            $nuevas_obras = [];
                foreach($obras as $k=>$obra){
                    //$obras[$k]['label']="";
                    $obras[$k]['active'] = empty($obras[$k]['active'])? false: boolval( $obras[$k]['active']);
                    $obras[$k]['limitado'] = empty($obras[$k]['limitado'])? false: boolval( $obras[$k]['limitado']);
                    $obras[$k]['grupo'] = false;
                    if( !isset($obras[$k]['id']) && !empty($obras[$k]['add_new']) ){
                        $nuevas_obras[] = $obras[$k];
                        unset($obras[$k]['add_new']);
                    }
                }
                if( !empty($nuevas_obras) ) save_new_obras($nuevas_obras);
                
                $nuevos_seguros = [];
                if(!empty($seguros)){
                    $nuevos_seguros = array_filter($seguros, function($o){ return !isset($o['id']) && !empty($o['add_new']);});
                    $seguros = array_map(function($o){ if(!empty($o['add_new'])) unset($o['add_new']); $o['tipo'] = "seguros"; return $o;},$seguros);
                }
                
                if( !empty($nuevos_seguros) ) save_new_seguros($nuevos_seguros);
            
            if( $medico_id ){
                $medicos_con_config_opt = get_option('todos_los_medicos_con_config', []);
                $medicos_con_config_opt["$medico_id"] = $medico_id;
                update_option('todos_los_medicos_con_config', $medicos_con_config_opt);
                
                $up_1 = update_option('medico_opt_descripcion_'.$medico_id, $descripcion);
                
                unset($config['count_obras_activas'],$config['count_seguros_activos'],$config['count_obras_prev'],$config['count_obras_total'],$config['obras_perdidas']);
                
                
                
                $config["regla_particular"] = array_merge(
                    [
                        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
                        'days' => [ ],//[ "mier" ,"mar"] los mier y martes particular
                        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
                        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
                        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
                    ],
                    $config["regla_particular"]
                );
                
                $config = array_merge(array(
                    "seguros_convenio"=>[],
                    "particular_habilitado"=>false,//agrega particular a la lista de seleccion
                    "solo_particular"=>false,
                    "regla_particular"=> [
                        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
                        'days' => [ ],//[ "mier" ,"mar"] los mier y martes particular
                        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
                        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
                        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
                    ],
                    "total_obras_day_cont"=>0,
                    "obras_sociales"=>[]
                    ), $config );
                    
                    //$config['obras_sociales'] = $obras;
                    $seguros = !empty($seguros)? $seguros: [] ;
                
                $up_2 = update_option('medico_opt_config_'.$medico_id, $config );
                
                
                $up_3 = update_option('medico_opt_mpago_'.$medico_id, $mpago);
                
                $up_4 = update_option('medico_opt_obras_'.$medico_id, $obras );
                
                $up_5 = update_option('medico_opt_seguros_'.$medico_id, $seguros );
                
                $up_3 = 0;
                
                echo json_encode( array("success"=> " Ajustes guardados ".($up_1?" [descripcion actializada] ":"").($up_2?" [configuracion actializada] ":"").($up_3?" [mp actializado] ":"").($up_4?" [obras actializadas] ":"").($up_5?" [seguros actializados] ":"")." " ) );
                //ob_start();
                //$config_medico = get_admin_config_medico($medico_id);//get_bookings_day( $medico_id, "2024-01-01", "", true );
                //echo ob_get_clean(); 
                //echo json_encode($config);
            }else{
                echo json_encode( array("error"=>"Hubo un problema, No se recibio ID de medico.") );
            }
            
            exit;
        }
        
        
        function save_new_obras($nuevas_obras = []){
            $todas_new = array();
            ob_start();
                $all_obras = get_all_obras();
                $ob_col_id = array_column($all_obras, 'id');
                sort($ob_col_id, SORT_ASC);
                $last_id = !empty(end($ob_col_id))? end($ob_col_id): count($all_obras);
                $last_id = (int) get_option("ultima_obras_id", $last_id);
                
                $all_con_keys = array_column($all_obras, 'value', 'value');
                
                foreach($nuevas_obras as $obra){
                    if( !isset($all_con_keys[$obra['value']]) ){
                        $last_id++;
                        $obra['id'] = $last_id; $obra['cupos'] = 0;
                        $obra['active'] = $obra['limitado'] = $obra['grupo'] = false;
                        if( !empty($obra['add_new']) ) unset( $obra['add_new'] );
                        $all_obras[] = $obra;
                    }
                }
                update_option("ultima_obras_id", $last_id);
                update_option("todas_las_obras", $all_obras);
            ob_get_clean();
            
        }
        ###########FIN NEW#################


if( isset($_GET['maxtest']) ){
    
    add_action("init", function(){
        
        $bookingpress_mercadopago_payment_id = $_GET['id'];
        
        
        $bookingpress_payment_verification_url = "https://api.mercadopago.com/v1/payments/".$bookingpress_mercadopago_payment_id;
        
        $bookingpress_payment_verification_url = "https://api.mercadopago.com/merchant_orders/".$bookingpress_mercadopago_payment_id;
        
        
                    $bookingpress_payment_verify_header_params = array(
                        'Authorization' => 'Bearer '."APP_USR-769632546500164-062114-7fe67fe4eed875737e1bb5400192d2ba-1567323850",
                    );

                    $bookingpress_verified_payment_body_params = array(
                        'method' => 'GET',
                        'headers' => $bookingpress_payment_verify_header_params,
                        'timeout' => 5000,
                    );

                    //do_action( 'bookingpress_payment_log_entry', 'mercadopago', 'Mercado Pago verfify payments params body Data', 'bookingpress pro', $bookingpress_verified_payment_body_params, $bookingpress_debug_payment_log_id );

                    $bookingpress_verified_payment_res = wp_remote_request($bookingpress_payment_verification_url, $bookingpress_verified_payment_body_params);

        var_dump($bookingpress_verified_payment_res);
        
        exit;
        
    },10);
    
    
}




if( isset($_GET['is_success']) ){
    
    add_action('wp_head',function(){
        
        ?>
<style>

div:has(> h1.wp-block-post-title){
    display: none;
}

</style>
        
        <?php
        
    },100);
    
}


add_action( 'wp_footer', function(){
    
    //if(isset($_GET['obs'])) echo "<scrip>alert('Hola')</script>";
    
    /*
    if(!class_exists('\Snoopy')) include "Snoopy.class.php";
	$snoopy = new \Snoopy;
    $submit_url = "https://prestadores.pami.org.ar/result.php";
    //$snoopy->_submit_method = "POST";
    $snoopy->fetch($submit_url, array('c'=>'6-2','vm'=>2));
    //$snoopy->submit( $submit_url, array('tipoDocumento'=>'DNI','nroDocumento'=> 5086264)  );
    //$anses=wp_remote_get("https://servicioswww.anses.gob.ar/ooss2/");
    
    ob_start();
    echo '<div id="ansess">';
    
	print $snoopy->results;
    echo "</div>";
    echo ob_get_clean();
    */
    ?>
    
    
    
    <?php
},1);

/**
add_filter('bookingpress_validate_submitted_form', 'mod_bookingpress_validate_submitted_form_func', 8, 2);//'bookingpress_validate_submitted_form_func'

        function mod_bookingpress_validate_submitted_form_func( $payment_gateway, $posted_data ){
            // phpcs:ignore WordPress.Security.NonceVerification
            global $BookingPress, $wpdb, $tbl_bookingpress_entries,$bookingpress_debug_payment_log_id, $bookingpress_global_options;
            $return_data = array(
            'service_data'     => array(),
            'payable_amount'   => 0,
            'customer_details' => array(),
            'currency'         => '',
            );

            $bookingpress_appointment_data = $posted_data;
            $return_data                   = apply_filters('bookingpress_before_modify_validate_submit_form_data', $return_data);

            if (! empty($posted_data) && ! empty($payment_gateway) ) {
                $bookingpress_selected_service_id     = sanitize_text_field($bookingpress_appointment_data['selected_service']);
                $bookingpress_appointment_booked_date = sanitize_text_field($bookingpress_appointment_data['selected_date']);
                $bookingpress_selected_start_time     = sanitize_text_field($bookingpress_appointment_data['selected_start_time']);
                $bookingpress_selected_end_time       = sanitize_text_field($bookingpress_appointment_data['selected_end_time']);
                $bookingpress_internal_note           = ! empty($bookingpress_appointment_data['appointment_note']) ? sanitize_textarea_field($bookingpress_appointment_data['appointment_note']) : '';
                $service_data                         = $BookingPress->get_service_by_id($bookingpress_selected_service_id);
                $service_duration_vals                = $BookingPress->bookingpress_get_service_end_time($bookingpress_selected_service_id, $bookingpress_selected_start_time);
                $service_data['service_start_time']   = sanitize_text_field($service_duration_vals['service_start_time']);
                $service_data['service_end_time']     = sanitize_text_field($service_duration_vals['service_end_time']);
                $return_data['service_data']          = $service_data;

                $bookingpress_currency_name = $BookingPress->bookingpress_get_settings('payment_default_currency', 'payment_setting');
                $return_data['currency']    = $bookingpress_currency_name;

                $bookingpress_decimal_points = $BookingPress->bookingpress_get_settings('price_number_of_decimals', 'payment_setting');
                $__payable_amount            = $service_data['bookingpress_service_price'];
                if ($bookingpress_decimal_points == '0' ) {
                    $__payable_amount = round($__payable_amount);
                }
                $return_data['payable_amount'] = (float) $__payable_amount;

                if ($return_data['payable_amount'] == 0 ) {
                    $payment_gateway = ' - ';
                }

                $customer_email     = $bookingpress_appointment_data['customer_email'];
                $customer_username  = ! empty($bookingpress_appointment_data['customer_username']) ? sanitize_text_field($bookingpress_appointment_data['customer_username']) : ''; 
                $customer_full_name  = ! empty($bookingpress_appointment_data['customer_name']) ? sanitize_text_field($bookingpress_appointment_data['customer_name']) : '';   
                $customer_firstname = ! empty($bookingpress_appointment_data['customer_firstname']) ? sanitize_text_field($bookingpress_appointment_data['customer_firstname']) : '';
                $customer_lastname  = ! empty($bookingpress_appointment_data['customer_lastname']) ? sanitize_text_field($bookingpress_appointment_data['customer_lastname']) : '';
                $customer_phone     = ! empty($bookingpress_appointment_data['customer_phone']) ? sanitize_text_field($bookingpress_appointment_data['customer_phone']) : '';
                $customer_country   = ! empty($bookingpress_appointment_data['customer_phone_country']) ? sanitize_text_field($bookingpress_appointment_data['customer_phone_country']) : '';
                $customer_phone_dial_code = !empty($bookingpress_appointment_data['customer_phone_dial_code']) ? $bookingpress_appointment_data['customer_phone_dial_code'] : '';
                $bookingpress_terms_conditions = !empty( $bookingpress_appointment_data['appointment_terms_conditions']) ? sanitize_text_field($bookingpress_appointment_data['appointment_terms_conditions']) : '';

                if( !empty($customer_phone) && !empty( $customer_phone_dial_code) ){

                    $customer_phone_pattern = '/(^\+'.$customer_phone_dial_code.')/';
                    if( preg_match($customer_phone_pattern, $customer_phone) ){
                        $customer_phone = preg_replace( $customer_phone_pattern, '', $customer_phone) ;
                    }
                }

                if( !empty($bookingpress_appointment_data['bookingpress_customer_timezone']) ) {
                    $timezone_minutes = $bookingpress_appointment_data['bookingpress_customer_timezone'];
                    $client_timezone_offset = -1 * ( $timezone_minutes / 60 );
                    
                    $offset_minute = fmod( $client_timezone_offset, 1);
                    $offset_minute = abs($offset_minute);

                    $hours = $client_timezone_offset - $offset_minute;
                    

                    $offset_minute = $offset_minute * 60;

                    if( $hours < 0 ){

                    } else {
                        if( strlen( $hours ) === 1 ){
                            $hours = '+0' . $hours;
                        } else {
                            $hours = '+' . $hours;
                        }
                    }

                    if( strlen( $offset_minute ) == 1 ){
                        $offset_minute = '0' . $offset_minute;
                    }
                    
                    $timezone_offset = $hours.':' . $offset_minute;

                    $customer_timezone = $timezone_offset;
                    
                } else {
                    $customer_timezone = $bookingpress_global_options->bookingpress_get_site_timezone_offset();    
                }

                $return_data['customer_details'] = array(
                'customer_email'    => $customer_email,
                'customer_username' => $customer_username,
                'customer_phone'    => $customer_phone,
                );

                $bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('appointment_status', 'general_setting');

                if ($payment_gateway == 'on-site' ) {
                    $bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('onsite_appointment_status', 'general_setting');
                }

                $bookingpress_customer_id = get_current_user_id();

                // Insert data into entries table.
                $bookingpress_entry_details = array(
                'bookingpress_customer_id'           => $bookingpress_customer_id,
                'bookingpress_customer_name'         => $customer_full_name,
                'bookingpress_username'              => $customer_username,
                'bookingpress_customer_phone'        => $customer_phone,
                'bookingpress_customer_firstname'    => $customer_firstname,
                'bookingpress_customer_lastname'     => $customer_lastname,
                'bookingpress_customer_country'      => $customer_country,
                'bookingpress_customer_phone_dial_code' => $customer_phone_dial_code,
                'bookingpress_customer_email'        => $customer_email,
                'bookingpress_customer_timezone'     => $customer_timezone,
                'bookingpress_service_id'            => $bookingpress_selected_service_id,
                'bookingpress_service_name'          => $service_data['bookingpress_service_name'],
                'bookingpress_service_price'         => $__payable_amount,
                'bookingpress_service_currency'      => $bookingpress_currency_name,
                'bookingpress_service_duration_val'  => $service_data['bookingpress_service_duration_val'],
                'bookingpress_service_duration_unit' => $service_data['bookingpress_service_duration_unit'],
                'bookingpress_payment_gateway'       => $payment_gateway,
                'bookingpress_appointment_date'      => $bookingpress_appointment_booked_date,
                'bookingpress_appointment_time'      => $bookingpress_selected_start_time,
                'bookingpress_appointment_end_time'  => $bookingpress_selected_end_time,
                'bookingpress_appointment_internal_note' => $bookingpress_internal_note,
                'bookingpress_appointment_send_notifications' => 1,
                'bookingpress_appointment_status'    => $bookingpress_appointment_status,
                'bookingpress_paid_amount'           =>   $__payable_amount,
                'bookingpress_created_at'            => current_time('mysql'),
                );

                do_action('bookingpress_payment_log_entry', $payment_gateway, 'submit appointment form front', 'bookingpress', $bookingpress_entry_details, $bookingpress_debug_payment_log_id);

                $wpdb->insert($tbl_bookingpress_entries, $bookingpress_entry_details);
                $entry_id = $wpdb->insert_id;

                $return_data['entry_id'] = $entry_id;
                $bookingpress_entry_hash = md5($entry_id);

                $bookingpress_after_approved_payment_page_id = $BookingPress->bookingpress_get_customize_settings('after_booking_redirection', 'booking_form');
                $bookingpress_after_approved_payment_url     = get_permalink($bookingpress_after_approved_payment_page_id);
                $bookingpress_after_approved_payment_url     = ! empty($bookingpress_after_approved_payment_url) ? $bookingpress_after_approved_payment_url : BOOKINGPRESS_HOME_URL;
                $bookingpress_after_approved_payment_url    = add_query_arg('appointment_id', base64_encode($entry_id), $bookingpress_after_approved_payment_url);
                $bookingpress_after_approved_payment_url = add_query_arg( 'bp_tp_nonce', wp_create_nonce( 'bpa_nonce_url-'.$bookingpress_entry_hash ), $bookingpress_after_approved_payment_url );

                $bookingpress_after_canceled_payment_page_id = $BookingPress->bookingpress_get_customize_settings('after_cancelled_appointment_redirection', 'booking_my_booking');
                $bookingpress_after_canceled_payment_url     = get_permalink($bookingpress_after_canceled_payment_page_id);
                $bookingpress_after_canceled_payment_url     = ! empty($bookingpress_after_canceled_payment_url) ? $bookingpress_after_canceled_payment_url : BOOKINGPRESS_HOME_URL;
                $bookingpress_after_canceled_payment_url     = add_query_arg('appointment_id', base64_encode($entry_id), $bookingpress_after_canceled_payment_url);
                $bookingpress_after_canceled_payment_url = add_query_arg( 'bp_tp_nonce', wp_create_nonce( 'bpa_nonce_url-'.$bookingpress_entry_hash ), $bookingpress_after_canceled_payment_url );

                $return_data['approved_appointment_url'] = $bookingpress_after_approved_payment_url;
                $return_data['pending_appointment_url']  = $bookingpress_after_approved_payment_url;
                $return_data['canceled_appointment_url'] = $bookingpress_after_canceled_payment_url;

                $bookingpress_notify_url   = BOOKINGPRESS_HOME_URL . '/?bookingpress-listener=bpa_' . $payment_gateway . '_url';
                $return_data['notify_url'] = $bookingpress_notify_url;
            }

            $return_data = apply_filters('bookingpress_after_modify_validate_submit_form_data', $return_data);

            return $return_data;
        }

*/


###add_filter('bookingpress_modify_appointment_booking_fields', 'mod_staffmember_price_data', 25, 3);
//add_action( 'bookingpress_payment_log_entry', 'mod_staff_price_data');//bookingpress_modify_entry_data_before_insert
    
    function mod_staffmember_price_data($appointment_booking_field, $entry_data, $bookingpress_appointment_data=array() ){
        $servicio_particular = 0;
        $form_fields = array();
                
        //global $bookingpress_entry_details, $posted_data;
        if( empty($bookingpress_appointment_data) ){
            $bookingpress_appointment_data = !empty($_REQUEST['appointment_data'])? $_REQUEST['appointment_data']: array();
        }
        
        if( !empty($appointment_booking_field) && !empty($bookingpress_appointment_data) ){
        
        $form_fields = !empty($bookingpress_appointment_data['bookingpress_appointment_meta_fields_value']) ? $bookingpress_appointment_data['bookingpress_appointment_meta_fields_value'] : array('kaka');
        //$form_fields = !empty($posted_data['form_fields']) ? $posted_data['form_fields'] : array();
        
        if( !empty($form_fields['obra_soc_seguros']) ){
            if('particular' == strtolower($form_fields['obra_soc_seguros']) ) $servicio_particular = 1;
        }
        if( !empty($form_fields['is_particular']) ){
            if('particular' == strtolower($form_fields['is_particular']) ) $servicio_particular = 1;
        }
        
        if( !$servicio_particular )
        {
        // Insert data into entries table.
				$modify_entry_details = array(
					'bookingpress_deposit_amount'                 => 0,
					'bookingpress_staff_member_price'             => 0,
					'bookingpress_paid_amount'                    => 0,
					'bookingpress_due_amount'                     => 0,
					'bookingpress_total_amount'                   => 0
				);
                
                if( !empty($appointment_booking_field['bookingpress_staff_member_details']) ){
                    
                    $bookingpress_staffmember_details = json_decode($appointment_booking_field['bookingpress_staff_member_details'], true);
                    $bookingpress_staffmember_details["bookingpress_service_price"] = 0;
                    $modify_entry_details['bookingpress_staff_member_details'] = wp_json_encode($bookingpress_staffmember_details);
                }
                
                $appointment_booking_field = array_merge($appointment_booking_field, $modify_entry_details);
        }//fin if !particular
        
        }
        
        $f = fopen(__DIR__ .'/mod_staff.txt','a');
        fwrite($f, "servicioo $servicio_particular \n".print_r( array($form_fields, $appointment_booking_field), true) );
        fclose($f);
               
            return $appointment_booking_field;
        }//fin mod_staff_price

//if( !isset($_GET['obs']) ) return;

add_action('admin_footer', function(){
    ob_start();
    $tds_obras = get_all_obras();
    $tds_seguros = get_all_seguros();
     ob_get_clean();
?>
<script id="tds_las_obras">
var todos_los_seguros = <?php echo json_encode($tds_seguros); ?>;
var todas_las_obras = <?php echo json_encode($tds_obras); ?>;

var all_obras_y_seguros = [];
function init_merge_obras_seg(){
    //console.log("solicitud");
    return [{"grupo":"ART y Seguros con Convenio","label":"ART y Seguros con Convenio", "value":"  ","limitado":false,"\$isDisabled":true,"isDisabled":true}].concat(todos_los_seguros).concat([{"grupo":"Obras Sociales","label":"Obras Sociales", "value":" ","limitado":false,"\$isDisabled":true,"isDisabled":true}]).concat(todas_las_obras);
}
all_obras_y_seguros = init_merge_obras_seg();
</script>

<?php

?>
<style>
.bookingpress_page_bookingpress_calendar .bpa-hw-right-btn-group {
    display: none !important;
    /* opacity: 0; */
}
.bookingpress_page_bookingpress_calendar .bpa-fsc__sticky-add-btn {
    display: none !important;
}
.bpa-full-calendar-container .bpa-fsc__sticky-add-btn {
    display: none !important;
}

.el-select-dropdown__wrap.el-scrollbar__wrap {
    padding-bottom: 10px;
}

.el-tooltip.material-icons-round.bpa-rescheduled-appointment-icon {
    font-size: 25px;
    color: darkorange;
}
.cell:has(span.el-tooltip.material-icons-round.bpa-rescheduled-appointment-icon):after {
    content: " reprogramado ";
    color: blue !important;
    word-break: normal;
    
}

.no_admite_obs_sel {
    position: relative;
    /* right: 30px; */
    top: 34px;
    /* padding: 30px; */
    text-align: center;
    color: #dd1414e8;
    white-space: break-spaces;
    word-break: break-word;
}
.no_obs_sel {
    color: #780694d4;
}
.bpa-fbr--customer .el-col:has(>.el-form-item>label[for=wp_user]) {
    display: none;
}

.el-select.bpa-form-control.turno_en_espera .el-input{
    //width: 100%;
    //min-width: 120px;
    
    //border-radius: 5px;
    //padding: 2px;
}
.turno_en_espera input {
    //line-height: 20px;
    //line-height: inherit;
    //background: lightskyblue;
    
    background: var(--bpa-pt-main-green);
    color: white;
}
.bpa-form-control input {
    //border-radius: 2px;
}
</style>
<?php
},10);


###$global_data = apply_filters('bookingpress_add_global_option_data', $global_data);

add_filter('bookingpress_add_global_option_data', function($global_data ){
    /**    
    $global_data['appointment_status'][] = array(
                        'value' => '7',
                        'text'  => 'EN ESPERA',
                    );
        $global_data['appointment_status'][] = array(
                        'value' => '8',
                        'text'  => 'PAMI REPROG',
                    );
      */
      
        $status_complete;
        
        $keys_value = array_column($global_data['appointment_status'], 'value');
        $keys_value = array_flip($keys_value);
        if( isset( $keys_value[6] ) ){
            $complete_indx=$keys_value[6];
            $status_complete = $global_data['appointment_status'][$complete_indx];
            
            unset( $global_data['appointment_status'][$complete_indx] );
        }
        
        
        $new = array();
        $new[] = array( "value"  => '7', "text"  => "EN ESPERA");
        if( !empty($status_complete)) $new[] = $status_complete;
        $new[] = array( "value"  => '8', "text"  => "PAMI REPROG");
        
        $new = array_merge($new, $global_data['appointment_status']);              
        
        $global_data['appointment_status'] = $new;
    
    return $global_data;
},100,1);


//if( !isset($_GET['page']) && $_GET['page'] != 'bookingpress_appointments' ) return;

if( is_admin()  && isset($_GET['page']) && $_GET['page'] == 'bookingpress_appointments' ) include_once __DIR__ . '/obra_soc_mod.php';
if( is_admin()  && isset($_GET['page']) && $_GET['page'] == 'bookingpress_staff_members' ) include_once __DIR__ . '/admin_medicos.php';

add_filter('bookingpress_modify_appointment_view_file_path', function($bookingpress_load_file_name){
    if( strpos( $bookingpress_load_file_name, 'manage_appointment.php') && is_admin() ){
        $bookingpress_load_file_name = __DIR__ . '/mod_manage_appointment.php';
    }
    
    return $bookingpress_load_file_name;
},200,1);

if( is_admin()  && isset($_GET['page']) ){
    if($_GET['page'] == 'bookingpress_customers' ){
        
        add_action('bookingpress_customer_add_dynamic_on_load_method',function(){
            ?>
            console.log("customers montado");
            if(this.rules.email[0].required !=null){
                this.rules.email[0].required = false;
            }
            if(this.rules.username[0].required !=null){
                this.rules.username[0].required = false;
            }
            <?php
        },10);
        
    }
    
}


#apply_filters('bookingpress_modify_customer_view_file_path', $bookingpress_load_file_name);
add_filter('bookingpress_modify_customer_view_file_path', function($bookingpress_load_file_name){
    if( strpos( $bookingpress_load_file_name, 'manage_customers.php') && is_admin() ){
        $bookingpress_load_file_name = __DIR__ . '/mod_manage_customers.php';
    }
    
    return $bookingpress_load_file_name;
}, 30, 1);

include_once __DIR__ . '/mod_customers.php';


        /**
		 * Ajax request for get search customer list
		 *
		 * @return void
		 */
         function bk_mod_get_search_customer_list_func() {

			global $wpdb, $BookingPress, $BookingPressPro, $bookingpress_customers;
			$response                       = array();
            $bpa_check_authorization='';
            $bpa_check_authorization = $bookingpress_customers->bpa_check_authentication_helper( 'search_customer', true, 'bpa_wp_nonce' );
            
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
            $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']     = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            $search_user_str = ! empty( $_REQUEST['search_user_str'] ) ? ( sanitize_text_field($_REQUEST['search_user_str'] )) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                   
			if(!empty($search_user_str)) {
                $response['variant'] = 'success';
                $response['title'] = esc_html__('Success', 'bookingpress-appointment-booking');
                $response['msg'] = esc_html__('Data retrieved successfully', 'bookingpress-appointment-booking');
                $response['appointment_customers_details'] = array();
                $bookingpress_appointment_customers_details = $BookingPress->bookingpress_get_search_customer_list($search_user_str);						
                $response['appointment_customers_details'] = $bookingpress_appointment_customers_details;
                
                $dni_customers = get_dni_customers( $search_user_str );
                if( !empty($dni_customers['result']) ){
                    $response['appointment_customers_details'] = array_merge($response['appointment_customers_details'], $dni_customers['result']);
                }
            }

			echo wp_json_encode($response);
			exit;
		}
        
        //global $bookingpress_calendar;
        //remove_action('wp_ajax_bookingpress_get_search_customer_list',array($bookingpress_calendar,'bookingpress_get_search_customer_list_func'));
        #add_action('wp_ajax_bookingpress_get_search_customer_list',array($this,'bookingpress_get_search_customer_list_func'));
        add_action('wp_ajax_bookingpress_get_search_customer_list', 'bk_mod_get_search_customer_list_func', -1);



            #do_action( 'bookingpress_other_debug_log_entry', 'appointment_debug_logs', 'Backend add/update appointment posted data', 'bookingpress_admin_add_update_appointment', $_POST, $bookingpress_other_debug_log_id ); // phpcs:ignore WordPress.Security.NonceVerification
            add_action('bookingpress_other_debug_log_entry', function( $debg_log_str="", $detalle_desc="", $tipo_accion="", $data = array() ){
                if( !empty($_REQUEST['action']) && sanitize_text_field($_REQUEST['action']) == 'bookingpress_save_appointment_booking' ){
                    if( $tipo_accion == 'bookingpress_admin_add_update_appointment'){
                        
                            do_action('bk_mod_validate_booking_form_from_backend', $data, false, 'bakend');
                        
                    }
                }
            },10,4);
            
            /**
             * bk_mod_validate_config_medico
             * hook bookingpress_validate_booking_form (front_booking before_booking))
             * Valida particular y obras
             */            
                        
            ###do_action('bookingpress_validate_booking_form', $_POST);
            //add_action('bookingpress_validate_booking_form','bk_mod_validate_config_medico',10,1);
            //add_action('bk_mod_validate_booking_form_from_backend','bk_mod_validate_config_medico',10,3);
            
            function bk_mod_validate_config_medico( $post_data=array(), $retorno=FALSE, $backend="" ){
                if( empty($post_data) && !empty($_POST) ) $post_data = $_POST; //No utilice post_data que es igual a $_POST pero enviado mediante el hook
                if( empty($post_data['appointment_data']) && !empty($_REQUEST['appointment_data']) ){
                    $post_data['appointment_data'] = is_array( $_REQUEST['appointment_data'] )?$_REQUEST['appointment_data']:json_decode( stripslashes_deep( $_REQUEST['appointment_data'] ), true ); //phpcs:ignore
                } 
                $is_valid = 1;
                $msg = "";
                $is_particular = 0;
                $obra_soc_seguros = "";
                
                    if( empty($backend) ){
                        $medico_id = !empty($post_data['appointment_data']['selected_staff_member_id'])? absint($post_data['appointment_data']['selected_staff_member_id']) : 0;
                        $date = date('Y-m-d', strtotime(sanitize_text_field($post_data['appointment_data']['selected_date'])));
                        $start_time    = date('H:i', strtotime(sanitize_text_field($post_data['appointment_data']['selected_start_time'])));
                        
                        $form_fields = !empty($post_data['appointment_data']['form_fields'])? $post_data['appointment_data']['form_fields'] : array();
                        
                    }else{
                        $medico_id = !empty($post_data['appointment_data']['selected_staffmember'])? absint($post_data['appointment_data']['selected_staffmember']) : 0;
                        $date = date('Y-m-d', strtotime(sanitize_text_field($post_data['appointment_data']['appointment_booked_date'])));
                        $start_time    = date('H:i', strtotime(sanitize_text_field($post_data['appointment_data']['appointment_booked_time'])));
                        
                        $form_fields = !empty($post_data['appointment_data']['bookingpress_appointment_meta_fields_value'])? $post_data['appointment_data']['bookingpress_appointment_meta_fields_value'] : array();
                        
                    }
                
                if( !empty($form_fields['is_particular']) )
                $is_particular = (strtolower($form_fields['is_particular']) == 'particular')? 1 : 0;
                
                if( !$is_particular )
                {
                    $obra_soc_seguros = !empty($form_fields['obra_soc_seguros'])? sanitize_text_field($form_fields['obra_soc_seguros']):"";
                    //TEST $obra_soc_seguros = "chuminga";
                    if( empty($obra_soc_seguros) ){
                        $is_valid = 0;
                        $msg = esc_html__("Algo salió mal! información de Obra social/Seguro o Particular perdida.", "bookingpress-appointment-booking");;
                    }
                    else
                    {
                         
                        if($medico_id && !empty($date) && !empty($start_time) ){
                            /**
                             * validacion de confinguracion de medico y obras en lado servidor
                             * Aumenta Seguridad
                             */
                             $prev_obs = "";
                             if( !empty($backend)){
                                $appointment_update_id = !empty($post_data['appointment_data']['appointment_update_id'])? absint($post_data['appointment_data']['appointment_update_id']):0;
                                if( $appointment_update_id ){//Si el obra_soc_seguros es el mismo habilita el cupo
                                    global $tbl_bookingpress_appointment_meta;
                                    $existe_obs_meta = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_appointment_meta} WHERE bookingpress_appointment_id = %d AND bookingpress_appointment_meta_key = 'obra_soc_art' ", $appointment_update_id), ARRAY_A);
                                    $existe_obs_meta = reset($existe_obs_meta);
                                    
                                    if( !empty($existe_obs_meta['bookingpress_appointment_date']) ){
                                        if($date == $existe_obs_meta['bookingpress_appointment_date'] ){
                                        $prev_obs = !empty($existe_obs_meta['bookingpress_appointment_meta_value'])? (string) $existe_obs_meta['bookingpress_appointment_meta_value']:"";
                                        }
                                    }
                                    
                                }
                             }
                             
                             
                            $selected_item = [];
                            $medico_booking_day = get_bookings_day($medico_id, $date, $start_time);
                            if( empty($medico_booking_day['seguros_convenio']) ) $medico_booking_day['seguros_convenio'] = array();
                            //if( empty($medico_booking_day) ) return;
                            
                            $seguros_medico = array_column($medico_booking_day['seguros_convenio'], null, 'value');
                    
                            
                            if( !empty($seguros_medico[ $obra_soc_seguros ]) ){
              //Si el obra_soc_seguros es el mismo habilita el cupo
                                    $selected_item = $seguros_medico[ $obra_soc_seguros ];
                                    if( $prev_obs == $obra_soc_seguros ){
                                        $selected_item['cupos'] = !empty($selected_item['cupos'])? 1+ (int) $selected_item['cupos']:1;
                                        //$selected_item['cupos'] = (int) $selected_item['cupos'] +1;
                                    }
                                            
                                    if( empty($selected_item['active']) || ( !empty($selected_item['limitado']) && (int) $selected_item['cupos'] < 1 ) ){
                                        $is_valid = 0;
                                        $msg = esc_html__("El ART seguro con convenio no es valido o no esta disponible", "bookingpress-appointment-booking");
                                    }else{
                                        #$is_valid = 1;
                                    }
                            }else{/** si no es un seguro... */
                                    
                                    $obras_medico = array_column($medico_booking_day['obras_sociales'], null, 'value');
                                    if( !empty($obras_medico[ $obra_soc_seguros ]) ){
             //Si el obra_soc_seguros es el mismo habilita el cupo
                                            $selected_item = $obras_medico[ $obra_soc_seguros ];
                                            if( $prev_obs == $obra_soc_seguros ){
                                                $selected_item['cupos'] = !empty($selected_item['cupos'])? 1+ (int) $selected_item['cupos']:1;
                                                //$selected_item['cupos'] = (int) $selected_item['cupos'] +1;
                                            }
                    /**                        
                    $response = array();
                    $response['variant']              = 'error';
                    $response['title']                = 'Error';
                    $response['msg'] = print_r($selected_item, true);
                    
                    echo json_encode($response);
                    exit;
                    */
                                            //TEST $selected_item['limitado'] = true;
                                            //TEST $selected_item['cupos'] = 0;
                                            if( empty($selected_item['active']) || ( !empty($selected_item['limitado']) && (int) $selected_item['cupos'] < 1 ) ){
                                                $is_valid = 0;
                                                $msg = esc_html__("La obra social no es valida o no esta disponible", "bookingpress-appointment-booking");
                                            }else{
                                                #$is_valid = 1;
                                            }
                                            
                                    }else{//fin si es obra social
                                    
                                        if("particular" != strtolower($obra_soc_seguros)){
                                            $is_valid = 0;
                                            $msg = sprintf( esc_html__("La obra social o seguro `%s`,  no es valido o no esta disponible", "bookingpress-appointment-booking"), $obra_soc_seguros);
                                        }
                                    }
                                    
                            }
                            /** fin seguro y obra... */
                            
                            if( $is_valid || empty($msg) ){
                                $reglas = bk_mod_particular_rules_checker( $medico_booking_day, $date, $start_time );
                                $is_valid = $reglas['is_valid'];
                                $msg      = $reglas['msg'];
                            }
                            
                            
                            
                        }else{//si no estan definidos medico fecha y hora
                            $is_valid = 0;
                            $msg = "Fallo información de medico, día y hora perdida.";
                        }//--------------
                        
                    }//fin else empty ob_soc_seg
                    
                }else{ /** is particular */
                    #$is_valid = 1;
                }
                
                if( !$is_valid || !empty($msg) ){
                    $response = array();
                    $response['variant']              = 'error';
                    $response['title']                = 'Error';
                    $default_msg                      = esc_html__("No puedes realizar esta reserva. Seleccione particular u otro metodo.", "bookingpress-appointment-booking");
                    $response['msg']                  = !empty($msg)? $msg : $default_msg;
                    if($retorno){
                        return $response;
                    }
                    echo json_encode($response);
                    exit;
                }
                if($retorno){
                return array('variant' => 'success', 'title' => 'success', 'msg'=>'Correcto');
                }
            }//fin func
            
            
            
            function bk_mod_particular_rules_checker( $config_medico, $date="", $start_time="" ){
                $result = array(
                    'is_valid'  => 1,
                    'msg'       => ""//No valido por x motivo
                );
                $days_result_msg  = "";
                $horas_result_msg = "";
                    
                $total_obras_day = !empty($config_medico['total_obras_day_cont'])? (int) $config_medico['total_obras_day_cont'] : 0;
                
                $regla_particular = array_merge(
                    array(
                    'rango_fechas' => [ ],
                    'days' => [ ],
                    'rango_horas' => [ ],
                    'days_horas_conjunto'=> false,
                    'max_obra_soc_x_dia'=>0
                    ),
                    $config_medico['regla_particular']
                );
                //Rango de fechas-----------------
                if( !empty($regla_particular['rango_fechas']) && empty($result['msg']) ){
                    if( is_array($regla_particular['rango_fechas']) ){
                        $max_dia_mes = (int) date('t', strtotime( $date ));
                        $desde = absint($regla_particular['rango_fechas'][0]);
                        $hasta = !empty($regla_particular['rango_fechas'][1])? absint($regla_particular['rango_fechas'][1]) : $max_dia_mes;
                        $hasta_msg = !empty($regla_particular['rango_fechas'][1])? "al ".($hasta<$max_dia_mes?$hasta:$max_dia_mes): "";
                        
                        $dia_num = date('d', strtotime( $date ));
                        if( $dia_num >= $desde && $dia_num <= $hasta ){
                            $result['is_valid'] = 0;
                            $result['msg'] = sprintf( esc_html__("El medico acepta solo Particular desde el día %s %s del mes.", "bookingpress-appointment-booking"), $desde, $hasta_msg );//" --- $desde $hasta_msg del mes.";
                        }
                    }
                }
                
                //Rango horas
                if( !empty($regla_particular['rango_horas']) && empty($result['msg']) ){
                    if( is_array($regla_particular['rango_horas']) ){
                        $desde = strtotime($regla_particular['rango_horas'][0]);
                        $hasta = !empty($regla_particular['rango_horas'][1])? strtotime($regla_particular['rango_horas'][1]) : strtotime("23:59");
                        $hasta_msg = !empty($regla_particular['rango_horas'][1])? "hasta las {$regla_particular['rango_horas'][1]}": "";
                        
                        $hora = strtotime($start_time);
                        
                        if( $hora >= $desde && $hora <= $hasta ){
                            $horas_result_msg = sprintf( esc_html__("El medico acepta solo Particular a partir de las %s %s hrs.", "bookingpress-appointment-booking"), $regla_particular['rango_horas'][0], $hasta_msg );//" {$regla_particular['rango_horas'][0]} $hasta_msg hrs. ";
                        }
                        
                    }
                }
                
                //Days
                if( !empty($regla_particular['days']) && empty($result['msg']) ){
                    $dias_list = array(
                        'Sun' => 'dom', 'Mon' => 'lun', 'Tue' => 'mar', 'Wed' => 'mier',
                        'Thu' => 'jue', 'Fri' => 'vier', 'Sat' => 'sab',
                    );
                    $dia_en = date('D', strtotime( $date ));
                    $dia = !empty($dias_list[$dia_en])? $dias_list[$dia_en]: "";
                    
                    if( in_array($dia, $regla_particular['days']) ){
                        $days_result_msg = esc_html__("El medico acepta solo Particular el día de la semana elegido.", "bookingpress-appointment-booking");
                    }
                    
                }
                
                //days_horas_conjunto----------------------------------
                if( empty($result['msg']) ){
                    if( !empty($regla_particular['days_horas_conjunto']) ){
                        if( !empty($horas_result_msg) && !empty($days_result_msg) ){
                            $result['is_valid'] = 0;
                            $result['msg'] = esc_html__("El medico acepta solo Particular en el horario del día de la semana elegido.", "bookingpress-appointment-booking");
                        }
                        
                    }else{
                            if( !empty($horas_result_msg) ){
                                $result['is_valid'] = 0;
                                $result['msg'] .= $horas_result_msg;
                            }
                            if( !empty($days_result_msg) ){
                                $result['is_valid'] = 0;
                                $result['msg'] .= " ".$days_result_msg;
                            }
                    }
                }
                
                //Total obras X dia-----------------------
                if( absint($regla_particular['max_obra_soc_x_dia']) && empty($result['msg']) ){
                    if( $total_obras_day >= absint($regla_particular['max_obra_soc_x_dia']) ){
                        $result['is_valid'] = 0;
                        $result['msg'] = esc_html__("El medico alcanzo su limite de reservas de obras sociales para la fecha seleccionada. Puede solicitar Particular", "bookingpress-appointment-booking");
                    }
                }
                
                
        $f = fopen(__DIR__ .'/validacion.txt','w');
        fwrite($f, "+++++++++++++++++++++++++++++\n++++++++++++++++++++++++++++\n\n".print_r( array($result, $regla_particular), true) );
        fclose($f);
                
                return $result;
            }


//if( isset($_GET['histo']) ) 
    include_once __DIR__ . '/mod_historias.php';
    
    
    if(!defined('BKMOD_DIR') ) define('BKMOD_DIR', __DIR__);
    
    add_action('init', function(){
        //echo "plugloaddddddddddd";
        if( !isset($_GET['max_imp2'])) return;
        global $bookingpress_global_options;
        
        print_r( $bookingpress_global_options->bookingpress_global_options()['appointment_status'] );
        
        //include_once __DIR__ .'/a/save_booking.php';
        exit("<br /><br />---------FINNNNNNNNNNNNNNNNNNNN--------<br />");
    },50);
    

add_filter( 'bookingpress_get_email_notiication_reply_to_data', function($reply_to_data_arr=array(),$appointment_id=0){
    $reply_to_data_arr = array(
                    'bookingpress_email_reply_to_name' => " ", 
                    'bookingpress_email_reply_to_email'=> " "
                );
    return $reply_to_data_arr;
}, 20, 2); 

include_once __DIR__ . '/front_get_timings.php';

