<?php
//2026 updates staff_only_particular
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'BPHC_VERSION', '1.0.0' );
define( 'BPHC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'BPHC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if( !defined('EXPANSION_INFO_EMPRESA') ) define( 'EXPANSION_INFO_EMPRESA', array(
    'DIRECCION_EMPRESA'     =>  'Comandante Fernandez Nº 755, Presidencia Roque Sáenz Peña, Argentina, 3700',//DIRECCION_UME
    'TELEFONO_EMPRESA'    =>  '+54 3644506061',//TELEFONO_UME
    'EMAIL_EMPRESA'       =>  'infoume@uncaus.edu.ar',//EMAIL_UME));
));
/**
add_filter('bookingpress_modify_disable_dates', 'maxiii_disable_dates_func', 2, 4);
function maxiii_disable_dates_func($a, $b, $c, $d){
    print_r($a);exit("saliendo");
    return $a;
}
*/

function expansion_JWT_encode($payload='', $secret='', $header =''){
    if( in_array('',[$payload, $secret]) ) return false;
    // Helper functions for base64url encoding/decoding
    function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
    
    function base64url_decode($data) {
        return base64_decode(strtr($data, '-_', '+/') . str_repeat('=', 3 - (strlen($data) % 4)));
    }
    
    // Ejemplo: payload
    /*
    $payload = json_encode([
        'iss' => 'http://example.org',
        'aud' => 'http://example.com',
        'iat' => 1356999524,
        'nbf' => 1357000000
    ]);
    */
    
    // Ejemplo: header
    $header = !empty($header)? $header : json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $header = is_scalar( $header )? $header : json_encode($header);
    $payload = is_scalar( $payload )? $payload : json_encode($payload);
    
        //$o = new stdClass;
        //$o->nro_turno = 3283013108;
    
    // biobox Testing Secrets
    #$secret = "f9TLSrlKtlC4hTa99eLzxTMuTKepwYB0HstWncH1IuAKs";
    #$secret = "1GlAMdWWJTfRFbAmVULfduraerJnfUzXTvwaq3VPHecbk";
    #$secret = "mlAMQ8lFABnyjKm2BWXRRyv3HkaHdEQwfDt2Od2ym1TJf";
    
    //$token = JWT::encode($o,$secret);
        
    //$payload = json_encode( (array) $o);
    /*
    $payload = '{
    "nro_turno": "3283013108",
    "descripcion": "Ecografía de Hombro",
    "modalidad": "US",
    "destino": "ECO2",
    "pac_id": "12345678",
    "pac_apellido": "Saavedra",
    "pac_nombre": "Angel",
    "pac_sexo": "M",
    "pac_email": "nombre@gmail.com",
    "pac_telefono": "1112345678",
    "pac_fecha_nacimiento": "2000-12-31",
    "obra_social_id": "AB123",
    "obra_social_nombre": "OSEP",
    "sol_id": "AB123",
    "sol_nombre": "Carolina Sanchez",
    "sol_matricula": "23123",
    "med_id": "AB123",
    "med_nombre": "Carolina Sanchez",
    "med_matricula": "423123",
    "prioridad": "3",
    "alertas_medicas": "",
    "alergia_contraste": "",
    "necesidades_especiales": "",
    "especialidad_nombre": "",
    "tipoAtencion": "ambulatorio",
    "empresa": "AB123", 
    "practicas":[
    {
    "fecha_inicio": "20170113",
    "dias_validez": "15",
    "modalidad": "US",
    "codigo_practica": "AB123",
    "descripcion": "Ecografía de Hombro"
    }
    ]
    }';
    */
    
    //$secret = 'your_secret_key';
    
    $base64UrlHeader = base64url_encode($header);
    $base64UrlPayload = base64url_encode($payload);
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
    $base64UrlSignature = base64url_encode($signature);
    
    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    
    //echo '<div style="margin:auto;width:400px;heigt:600px;border:4px solid red;overflow:auto;word-break:break-all">' . $jwt . "</div>";
    
    return $jwt;
}


function expansion_encode_file_helper( $dir_encode_file = '' ){
    $resultado = false;
        // servidor.php
        $nuevo_archivo = $dir_encode_file . '.gz'; //'datos.json.gz';
        if( file_exists($dir_encode_file) ){
            $f = fopen( $nuevo_archivo, 'w' );
            if( $f ){
                fwrite($f, gzencode( file_get_contents($dir_encode_file) ) );
                fclose($f);
                $resultado = $nuevo_archivo;
            }
            
        }
    return $resultado;
}

if( isset($_GET['expansion_encode_file_helper']) )
{
        $dir_encode_file = $_GET['absolute_file'];
        if( expansion_encode_file_helper($dir_encode_file) ){
            echo "sucess";
        }else{
            echo "error";
        }
    exit;
}


    //$service_step_duration_val = apply_filters( 'bookingpress_modify_service_timeslot', $service_step_duration_val, $selected_service_id, $service_time_duration_unit, $bpa_fetch_updated_slots );
    add_filter('bookingpress_modify_service_timeslot', function( $service_step_duration_val = 5, $selected_service_id = 0, $service_time_duration_unit = 'm', $bpa_fetch_updated_slots = [], $bookingpress_selected_staffmember_id = 0){
            global $bookingpress_pro_staff_members;
            
            if( empty($selected_service_id) ) return $service_step_duration_val;
            
            if( empty( $bookingpress_selected_staffmember_id ) ) $bookingpress_selected_staffmember_id = !empty( $_POST['staffmember_id'] ) ? intval( $_POST['staffmember_id'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Missing --Reason Nonce already verified from the caller function.
        	
        	
        	if( empty( $bookingpress_selected_staffmember_id ) ){
        		$bookingpress_selected_staffmember_id = !empty( $_POST['bookingpress_selected_staffmember']['selected_staff_member_id'] ) ? intval( $_POST['bookingpress_selected_staffmember']['selected_staff_member_id'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Missing --Reason Nonce already verified from the caller function.
                
                if( empty( $bookingpress_selected_staffmember_id ) ) $bookingpress_selected_staffmember_id = !empty( $_POST['appointment_data_obj']['bookingpress_selected_staff_member_details']['selected_staff_member_id'] ) ? intval( $_POST['appointment_data_obj']['bookingpress_selected_staff_member_details']['selected_staff_member_id'] ) : 0; // phpcs:ignore WordPress.Security.NonceVerification.Missing --Reason Nonce already verified from the caller function.
                				
        		if( empty( $bookingpress_selected_staffmember_id ) ){
        		    $appointment_data = !empty( $_POST['appointment_data'] ) ? array_map( array($BookingPress, 'appointment_sanatize_field'), $_POST['appointment_data'] ) : array();  // phpcs:ignore
                    $bookingpress_selected_staffmember_id = !empty( $appointment_data['bookingpress_selected_staff_member_details']['selected_staff_member_id'] ) ? intval( $appointment_data['bookingpress_selected_staff_member_details']['selected_staff_member_id'] ) : 0;
        		}
        	}
            
            //Staffmember vacio retorna
            if( empty( $bookingpress_selected_staffmember_id ) ){
                return $service_step_duration_val;
        	}
                        
            //Staffmember_id No esta vacio si continua
            
            //Adaptavion dservicios asignados
            $default_staff_service_duration = array(
                'active' => 0,
                'services' => [
                    array(
                        's_id' => '',
                        'd_val' => 5,
                        'd_unit' => 'm', //"m|h|d"
                        'active' => 0
                    )
                ]
            );
            
            $custom_staff_service_duration = $bookingpress_pro_staff_members->get_bookingpress_staffmembersmeta( $bookingpress_selected_staffmember_id, $metakey = 'expansion_staff_service_duration' );
            $custom_staff_service_duration = !empty($custom_staff_service_duration)? ( is_array($custom_staff_service_duration)? $custom_staff_service_duration : json_decode($custom_staff_service_duration, true) ) : $default_staff_service_duration;
            $custom_staff_service_duration = is_array($custom_staff_service_duration)? $custom_staff_service_duration : $default_staff_service_duration;
            
            if( ! (bool) $custom_staff_service_duration['active'] ) return $service_step_duration_val;
            
            $custom_duration_by_service = is_array($custom_staff_service_duration)? array_column($custom_staff_service_duration['services'], null, 's_id') : [];
                
            $staff_duration_data = [];
            //$staff_duration_data = array(
                //'s_id' => '',
                //'d_val' => 5,
                //'d_unit' => 'm', //"m|h|d"
                //'active' => 0
            //);
            
            if( !empty($custom_duration_by_service[ $selected_service_id ]) ){
                $staff_duration_data = $custom_duration_by_service[ $selected_service_id ];
                //if( $selected_service_id == 65 && $bookingpress_selected_staffmember_id == 102 ){
                    $service_step_duration_val  = intval( $staff_duration_data['d_val'] );
                    $service_time_duration_unit = $staff_duration_data['d_unit'];
                    
                    if( $service_time_duration_unit == 'h' ){
                        $service_step_duration_val = $service_step_duration_val * 60;
                    }
                    if( $service_time_duration_unit == 'd' ){
                        $service_step_duration_val = $service_step_duration_val * 60 * 24;
                    }
                    
                //}
                
            }
            
            //Fin de adaptacion
            
            return $service_step_duration_val;
    },20, 4);
    
    //$service_data = apply_filters('bookignpress_get_assigned_service_data_filter',$service_data, $staffmember_id);
    
    add_filter('bookignpress_get_assigned_service_data_filter', function( $service_data = [], $staffmember_id = 0 ){
        global $bookingpress_pro_staff_members, $expansion_extend_fields_services;
        //$service_data['assign_service_id']
        //$staff_service_particular = $bookingpress_pro_staff_members->get_bookingpress_staffmembersmeta( $staffmember_id, 'expansion_staff_serv_particular' );
        $serv_id = $service_data['assign_service_id'];
        $service_is_only_particular = $expansion_extend_fields_services->get_service_is_only_particular( $serv_id );
        $service_data['service_is_only_particular'] = $service_is_only_particular;
        //$staff_service_particular = false;
        $service_data['staff_only_particular'] = $bookingpress_pro_staff_members->get_bookingpress_staffmembersmeta( $staffmember_id, 'expansion_staff_service_particular_'.$serv_id )?? '0';
                
        $default_staff_service_duration = array(
            'active' => 0,
            'services' => [
                array(
                    's_id' => '',
                    'd_val' => 5,
                    'd_unit' => 'm', //"m|h|d"
                    'active' => 0
                )
            ]
        );
        //$custom_staff_service_duration = get_option( 'expansion_staff_service_duration_' . $staffmember_id, $custom_staff_service_duration );
        // staff->update_bookingpress_staffmembersmeta( $staff_id, $metakey='expansion_staff_service_duration', $metavalue);
        $custom_staff_service_duration = $bookingpress_pro_staff_members->get_bookingpress_staffmembersmeta( $staffmember_id, $metakey = 'expansion_staff_service_duration' );
        $custom_staff_service_duration = !empty($custom_staff_service_duration)? ( is_array($custom_staff_service_duration)? $custom_staff_service_duration : json_decode($custom_staff_service_duration, true) ) : $default_staff_service_duration;
        
        $custom_duration_by_service = is_array($custom_staff_service_duration)? array_column($custom_staff_service_duration['services'], null, 's_id') : [];
        //print_r($custom_duration_by_service);
        //foreach( $service_data as $k => $s_data ){
           $staff_duration_data = array(
                    's_id' => $service_data['assign_service_id'],
                    'd_val' => 5,
                    'd_unit' => 'm', //"m|h|d"
                    'active' => 0
                );
            //$assign_service_id = !empty($s_data['assign_service_id'])? $s_data['assign_service_id'] : 0;
            
            if( !empty($custom_duration_by_service[ $service_data['assign_service_id'] ]) ){
                $staff_duration_data = $custom_duration_by_service[ $service_data['assign_service_id'] ];
                $staff_duration_data['active'] = intval($staff_duration_data['active']);
            }
            
            $service_data['staff_duration_data'] = $staff_duration_data;
        //}
        
        //print_r($service_data);
        return $service_data;
    }, 10, 2);
    
    
    //$bookingpress_assign_service_list = apply_filters( 'bookingpress_modify_staff_assign_service_list', $bookingpress_assign_service_list );
    //$bookingpress_update_id     = ! empty( $_REQUEST['update_id'] ) ? ( intval( $_REQUEST['update_id'] ) ) : 0;
    //$bookingpress_action  = ! empty( $_REQUEST['bookingpress_action'] ) ? ( sanitize_text_field( $_REQUEST['bookingpress_action'] ) ) : '';
    //if($bookingpress_action == 'bookingpress_edit_staffmember') {}
    //$response = apply_filters( 'bookingpress_staff_members_save_external_details', $response );
    add_filter( 'bookingpress_staff_members_save_external_details', function( $response=[] ){
        global $BookingPress, $bookingpress_pro_staff_members;
        if ( !empty( $_REQUEST ) && !empty($response['variant']) && $response['variant'] == 'success' ) {
            
            $bookingpress_action  = ! empty( $_REQUEST['bookingpress_action'] ) ? ( sanitize_text_field( $_REQUEST['bookingpress_action'] ) ) : '';
            if($bookingpress_action == 'bookingpress_edit_staffmember') {
                $response['x3x'] = 'locoooo';
                $bookingpress_update_id = !empty($response['staffmember_id'])? intval($response['staffmember_id']) : 0;
                if(empty( $bookingpress_update_id )) $bookingpress_update_id = !empty( $_REQUEST['update_id'] ) ? ( intval( $_REQUEST['update_id'] ) ) : 0;
                                
                if($bookingpress_update_id){
                    $response['x4x'] = $_REQUEST['service_details']['assigned_service_list'];
                    $custom_staff_service_duration = array(
                    'active' => 0,
                    'services' => []
                    );
                    
                    if ( ! empty( $_REQUEST['service_details']['assigned_service_list'] ) ) {
					   $bookingpress_assigned_service_list = ! empty( $_REQUEST['service_details']['assigned_service_list'] ) ? array_map( array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['service_details']['assigned_service_list'] ) : array();// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_POST contains mixed array and will be sanitized using 'appointment_sanatize_field' function
					   foreach ( $bookingpress_assigned_service_list as $bookingpress_service_key => $bookingpress_service_val ) {
					       if( isset( $bookingpress_service_val['staff_only_particular'] ) ) $bookingpress_pro_staff_members->update_bookingpress_staffmembersmeta( $bookingpress_update_id, 'expansion_staff_service_particular_' . $bookingpress_service_val['assign_service_id'], $bookingpress_service_val['staff_only_particular'] );
                           
					       if( !empty($bookingpress_service_val['staff_duration_data']) ){
					           if( !empty($bookingpress_service_val['staff_duration_data']['active']) && (bool) $bookingpress_service_val['staff_duration_data']['active'] ){
					               //$bookingpress_service_val['staff_duration_data']['s_id'] = $bookingpress_service_val['assign_service_id'];
					               //$custom_staff_service_duration['services'][] = $bookingpress_service_val['staff_duration_data'];
                                   $custom_staff_service_duration['active'] = 1;
					           }
                               $bookingpress_service_val['staff_duration_data']['s_id'] = $bookingpress_service_val['assign_service_id'];
	                           $custom_staff_service_duration['services'][] = $bookingpress_service_val['staff_duration_data'];
					       }
					   }
                       
                       $response['staff_duration_active'] = $custom_staff_service_duration['active'];
                       $response['staff_duration_data'] = $custom_staff_service_duration;
                       
                       $staff_duration_up = $bookingpress_pro_staff_members->update_bookingpress_staffmembersmeta( $bookingpress_update_id, $metakey = 'expansion_staff_service_duration', $metavalue = json_encode( $custom_staff_service_duration ) );
                       $response['staff_duration_update'] = $staff_duration_up;
                       
                    }
                }
            }
        }
        
        return $response;
    }, 10, 1);
    
    add_filter( 'bookingpress_modify_staff_assign_service_list', function( $bookingpress_assign_service_list = [] ){
        foreach($bookingpress_assign_service_list as $assign_service_list_key => $assign_service_list_val){
			$staff_duration_data = [];
            if(!empty($assign_service_list_val['staff_duration_data'])) {
                $staff_duration_data = $assign_service_list_val['staff_duration_data'];
                //foreach( ['active',''] as $sd_key){ $staff_duration_data[$sd_key] = intval($staff_duration_data[$sd_key]); }
                $staff_duration_data['active'] = intval($staff_duration_data['active']);
                                
				$bookingpress_assign_service_list[$assign_service_list_key]['staff_duration_data'] = $staff_duration_data;
			}
		}
        
        return $bookingpress_assign_service_list;
    }, 10, 1);
    
    add_filter( 'bookingpress_modify_staffmember_data_fields',function($bookingpress_staff_member_vue_data_fields = [] ){
        
        $bookingpress_staff_member_vue_data_fields['assign_service_form']['staff_duration_data'] = array(
            's_id'     => '',
            'd_val'  => 5,
            'd_unit' => 'm',
            'active' => 0
        );
        
        return $bookingpress_staff_member_vue_data_fields;
    }, 10, 1);
    
    
    
    class Expansion_FromFields {
        public function __construct() {
            //echo " **************************************************new ";
            #add_action('bookingpress_add_appointment_field_section',array($this,'bookingpress_add_appointment_field_section_func'),10);
            
            //add_filter('bookingpress_frontend_package_order_form_add_dynamic_data', array($this, 'bookingpress_frontend_whatsapp_form_add_dynamic_data_func'), 10);
            //add_filter( 'bookingpress_modify_appointment_data_fields', array( $this, 'bookingpress_modify_appointment_data_fields_func' ), 10 );
            
            add_filter( 'bookingpress_modify_field_data_before_prepare', array( $this, 'add_appointment_data_fields_func' ), 200 );
            
            #add_action('bookingpress_front_appointments_dynamic_vue_methods', array( $this, 'front_appointment_add_vue_methods' ), 20 );
            add_filter( 'bookingpress_add_pro_booking_form_methods', array( $this, 'front_appointment_add_vue_methods_filter' ), 20 );
            
            
            add_action('bookingpress_after_book_appointment', [$this, 'write_confirmar_datos_log_appointment'], 200 );
            
/**


function on_dni_blur(){
console.log("DNI blur 4")
}
//app.$on
app.$refs.text_C6kufq[0].$on("el.form.blur", on_dni_blur);

console.log( app.$refs.text_C6kufq[0]._events )

app.$refs.text_C6kufq[0]._events['el.form.blur'].includes(on_dni_blur)

//app.$refs.text_C6kufq[0].$on("el.form.blur", on_dni_blur);

*/
            
            
        }
        
                
        function add_appointment_data_fields_func( $bookingpress_form_fields ){
            //print_r( $bookingpress_form_fields /* array_column($bookingpress_form_fields, 'bookingpress_form_field_name' )*/ );
            
            $field_names = array_column( $bookingpress_form_fields, 'bookingpress_field_meta_key' );
            if( empty($field_names) ) $field_names = array_column( $bookingpress_form_fields, 'meta_key' );
            if( empty($field_names) ) $field_names = array_column( $bookingpress_form_fields, 'bookingpress_form_field_name' );
            
            if( empty($field_names) ) $field_names = array_column( $bookingpress_form_fields, 'field_name' );
            //if( in_array('tipo_doc', $field_names) ) echo " ya eciteee";
            
            #print_r( $bookingpress_form_fields );exit;
            
            if( !in_array('tipo_doc', $field_names) ){
                
                $add_field = Array
                (
                    'bookingpress_form_field_id' => 46,
                    'bookingpress_form_field_name' => 'tipo_doc',
                    'bookingpress_field_required' => '1',
                    'bookingpress_field_label' => 'Tipo documento',
                    'bookingpress_field_placeholder' => 'Seleccione tipo documento',
                    'bookingpress_field_error_message' => 'Por favor, seleccione su tipo documento',
                    'bookingpress_field_is_hide' => '0',
                    'bookingpress_field_position' => '3',
                    'bookingpress_field_is_default' => '0',
                    'bookingpress_created_at' => '2026-02-13 22:24:29',
                    'bookingpress_is_customer_field' => '0',
                    'bookingpress_field_type' => 'dropdown',
                    'bookingpress_field_options' => '{"layout":"1col","used_for_user_information":true,"separate_value":true,"visibility":"always","minimum":0,"maximum":0,"selected_services":[],"is_customer_field":"false","attach_with_email":false}',
                    'bookingpress_field_values' => '[{"value":"DU","label":"Documento \u00danico (DNI)"},{"value":"LC","label":"Libreta C\u00edvica (LC)"},{"value":"LE","label":"Libreta de Enrolamiento (LE)"}]',
                    'bookingpress_field_meta_key' => 'tipo_doc',
                'bookingpress_field_css_class' => 'expansion-tipo-doc',
                );
                
                
                $bookingpress_form_fields[] = $add_field;
            }
            
            if( !in_array('dni', $field_names) && !in_array('text_C6kufq', $field_names) ){
                $add_field = Array
                (
                    'bookingpress_form_field_id' => '20',
                    'bookingpress_form_field_name' => 'dni',
                    'bookingpress_field_required' => '1',
                    'bookingpress_field_label' => 'Nro. Documento',
                    'bookingpress_field_placeholder' => 'Introduzca su numero de Documento',
                    'bookingpress_field_error_message' => 'Por favor, ingrese su documento.',
                    'bookingpress_field_is_hide' => '0',
                    'bookingpress_field_position' => '4',
                    'bookingpress_field_is_default' => '0',
                    'bookingpress_created_at' => '2024-06-03 17:11:58',
                    'bookingpress_is_customer_field' => '0',
                    'bookingpress_field_type' => 'text',
                    'bookingpress_field_options' => '{"layout":"1col","inner_class":"1col","visibility":"always","is_customer_field":"true","selected_services":[],"customer_field_id":"11","minimum":0,"maximum":0,"separate_value":false,"attach_with_email":false,"used_for_user_information":false}',
                    'bookingpress_field_values' => '[]',
                    'bookingpress_field_meta_key' => 'dni',//'dni',//'text_C6kufq'
                    'bookingpress_field_css_class' => 'persona_dni',
                );
                $bookingpress_form_fields[] = $add_field;
            }
            
            if( !in_array('persona_fecha', $field_names) ){
                $add_field = Array
                (
                    'bookingpress_form_field_id' => '36',
                    'bookingpress_form_field_name' => 'Datepicker',
                    'bookingpress_field_required' => '0',
                    'bookingpress_field_label' => 'Fecha de nacimiento',
                    'bookingpress_field_placeholder' => 'Fecha de nacimiento',
                    'bookingpress_field_error_message' => 'Ingrese fecha',
                    'bookingpress_field_is_hide' => '1',
                    'bookingpress_field_position' => '5',
                    'bookingpress_field_is_default' => '0',
                    'bookingpress_created_at' => '2025-09-06 15:33:19',
                    'bookingpress_is_customer_field' => '0',
                    'bookingpress_field_type' => 'date',
                    'bookingpress_field_options' => '{"layout":"1col","inner_class":"1col","visibility":"hidden","is_customer_field":"false","selected_services":[],"enable_timepicker":"false","minimum":"","maximum":"","separate_value":false,"attach_with_email":false,"used_for_user_information":false}',
                    'bookingpress_field_values' => '[]',
                    'bookingpress_field_meta_key' => 'persona_fecha',
                    'bookingpress_field_css_class' => 'persona_fecha',
                );
                $bookingpress_form_fields[] = $add_field;
            }
            
            if( !in_array('persona_genero', $field_names) ){
                $add_field = Array
                (
                    'bookingpress_form_field_id' => '39',
                    'bookingpress_form_field_name' => 'Dropdown',
                    'bookingpress_field_required' => '0',
                    'bookingpress_field_label' => 'Género',
                    'bookingpress_field_placeholder' => 'Género',
                    'bookingpress_field_error_message' => 'Ingrese Género',
                    'bookingpress_field_is_hide' => '1',
                    'bookingpress_field_position' => '6',
                    'bookingpress_field_is_default' => '0',
                    'bookingpress_created_at' => '2025-09-06 15:33:19',
                    'bookingpress_is_customer_field' => '0',
                    'bookingpress_field_type' => 'dropdown',
                    'bookingpress_field_options' => '{"layout":"1col","inner_class":"1col","visibility":"hidden","is_customer_field":"false","selected_services":[],"minimum":"","maximum":"","separate_value":true,"attach_with_email":false,"used_for_user_information":false}',
                    'bookingpress_field_values' => '[{"value":"Masculino","label":"Masculino"},{"value":"Femenino","label":"Femenino"},{"label":"Otro","value":"Otro"}]',
                    'bookingpress_field_meta_key' => 'persona_genero',
                    'bookingpress_field_css_class' => 'persona_genero',
                );
                $bookingpress_form_fields[] = $add_field;
            }
            
            if( !in_array('is_particular', $field_names) ){
                $add_field = Array
                (
                    'bookingpress_form_field_id' => '25',
                    'bookingpress_form_field_name' => 'Radio',
                    'bookingpress_field_required' => '0',
                    'bookingpress_field_label' => 'Obra Social o Particular',
                    'bookingpress_field_placeholder' => '',
                    'bookingpress_field_error_message' => 'Selecciona para solicitar un servicio particular o obra social',
                    'bookingpress_field_is_hide' => '0',
                    'bookingpress_field_position' => '7',
                    'bookingpress_field_is_default' => '0',
                    'bookingpress_created_at' => '2024-06-19 16:55:07',
                    'bookingpress_is_customer_field' => '0',
                    'bookingpress_field_type' => 'radio',
                    'bookingpress_field_options' => '{"layout":"1col","inner_class":"1col","visibility":"always","is_customer_field":"false","selected_services":[],"minimum":"","maximum":"","separate_value":true,"attach_with_email":false,"used_for_user_information":false}',
                    'bookingpress_field_values' => '[{"label":"Obra Social\/Seguro con convenio","value":"obra social"},{"label":"Particular","value":"particular"}]',
                    'bookingpress_field_meta_key' => 'is_particular',
                    'bookingpress_field_css_class' => 'is_particular',
                );
                $bookingpress_form_fields[] = $add_field;
            }
            
            if( !in_array('obra_soc_seguros', $field_names) ){
                $add_field = Array
                (
                    'bookingpress_form_field_id' => '26',
                    'bookingpress_form_field_name' => 'Dropdown',
                    'bookingpress_field_required' => '0',
                    'bookingpress_field_label' => 'Obra Social convenio',
                    'bookingpress_field_placeholder' => 'Obra Social convenio',
                    'bookingpress_field_error_message' => 'Obra social convenio es requerido',
                    'bookingpress_field_is_hide' => '0',
                    'bookingpress_field_position' => '9',
                    'bookingpress_field_is_default' => '0',
                    'bookingpress_created_at' => '2024-07-09 18:17:44',
                    'bookingpress_is_customer_field' => '0',
                    'bookingpress_field_type' => 'dropdown',
                    'bookingpress_field_options' => '{"layout":"1col","inner_class":"1col","visibility":"always","is_customer_field":"false","selected_services":[],"minimum":"","maximum":"","separate_value":true,"attach_with_email":false,"used_for_user_information":false}',
                    'bookingpress_field_values' => '[]',//'[{"value":"Option 1","label":"Option 1"},{"value":"Option 2","label":"Option 2"}]'
                    'bookingpress_field_meta_key' => 'obra_soc_seguros',
                    'bookingpress_field_css_class' => 'obra_soc_seguros',
                );
                $bookingpress_form_fields[] = $add_field;
            }
            
            if( !in_array('plan_obra_soc', $field_names) && !in_array('text_o9q4Cr', $field_names) ){
                $add_field = Array
                (
                    'bookingpress_form_field_id' => '22',
                    'bookingpress_form_field_name' => 'plan_obra_social',
                    'bookingpress_field_required' => '0',
                    'bookingpress_field_label' => 'Plan de Obra Social',
                    'bookingpress_field_placeholder' => 'Plan',
                    'bookingpress_field_error_message' => 'ingrese el Plan de Obra social',
                    'bookingpress_field_is_hide' => '0',
                    'bookingpress_field_position' => '10',
                    'bookingpress_field_is_default' => '0',
                    'bookingpress_created_at' => '2024-06-03 17:11:58',
                    'bookingpress_is_customer_field' => '0',
                    'bookingpress_field_type' => 'text',
                    'bookingpress_field_options' => '{"layout":"1col","inner_class":"1col","visibility":"always","is_customer_field":"true","selected_services":[],"customer_field_id":"13","minimum":0,"maximum":0,"separate_value":false,"attach_with_email":false,"used_for_user_information":false}',
                    'bookingpress_field_values' => '[]',
                    'bookingpress_field_meta_key' => 'plan_obra_soc',//'text_o9q4Cr'
                    'bookingpress_field_css_class' => 'plan_obra_social',
                );
                $bookingpress_form_fields[] = $add_field;
            }
            
            
            return $bookingpress_form_fields;
        }

/**
        function add_appointment_data_fields_func( $bookingpress_form_fields ){
            //print_r( $bookingpress_form_fields  ); //array_column($bookingpress_form_fields, 'bookingpress_form_field_name' )
            
            $field_names = array_column( $bookingpress_form_fields, 'bookingpress_field_meta_key' );
            if( empty($field_names) ) $field_names = array_column( $bookingpress_form_fields, 'meta_key' );
            if( empty($field_names) ) $field_names = array_column( $bookingpress_form_fields, 'bookingpress_form_field_name' );
            
            if( empty($field_names) ) $field_names = array_column( $bookingpress_form_fields, 'field_name' );
            //if( in_array('tipo_doc', $field_names) ) echo " ya eciteee";
            //exit;"Dropdown"
            
            if( in_array('tipo_doc', $field_names) ) return $bookingpress_form_fields;
                #print_r( $bookingpress_form_fields );exit;
            
            $add_field = Array
            (
                'bookingpress_form_field_id' => 46,
                'bookingpress_form_field_name' => 'tipo_doc',
                'bookingpress_field_required' => '1',
                'bookingpress_field_label' => 'Tipo documento',
                'bookingpress_field_placeholder' => 'Seleccione tipo documento',
                'bookingpress_field_error_message' => 'Por favor, seleccione su tipo documento',
                'bookingpress_field_is_hide' => '0',
                'bookingpress_field_position' => '3',
                'bookingpress_field_is_default' => '0',
                'bookingpress_created_at' => '2026-02-13 22:24:29',
                'bookingpress_is_customer_field' => '0',
                'bookingpress_field_type' => 'dropdown',
                'bookingpress_field_options' => '{"layout":"1col","used_for_user_information":true,"separate_value":true,"visibility":"always","minimum":0,"maximum":0,"selected_services":[],"is_customer_field":"false","attach_with_email":false}',
                'bookingpress_field_values' => '[{"value":"DU","label":"Documento \u00danico (DNI)"},{"value":"LC","label":"Libreta C\u00edvica (LC)"},{"value":"LE","label":"Libreta de Enrolamiento (LE)"}]',
                'bookingpress_field_meta_key' => 'tipo_doc',
            'bookingpress_field_css_class' => 'expansion-tipo-doc',
            );
            
            
            $bookingpress_form_fields[] = $add_field;
            return $bookingpress_form_fields;
        }
        
*/

        function bookingpress_modify_appointment_data_fields_func($bookingpress_appointment_vue_data_fields){
            $bookingpress_appointment_vue_data_fields['appointment_step_form_data']['form_fields']['tipo_doc'] = 'DU';//DU|LC|LE
            return $bookingpress_appointment_vue_data_fields;
        }
        /*
        function bookingpress_frontend_whatsapp_form_add_dynamic_data_func($bookingpress_front_vue_data_fields){
            //$bookingpress_front_vue_data_fields['send_whatsapp_notification_label'] = stripslashes_deep($send_whatsapp_notification_label);
            $bookingpress_front_vue_data_fields['appointment_step_form_data']['form_fields']['tipo_doc'] = 'DU';//DU|LC|LE
            return $bookingpress_front_vue_data_fields;
        }
        */
        function bookingpress_add_appointment_field_section_func() {
            /**
            ?>
            <el-col :xs="24" :sm="24" :md="24" :lg="08" :xl="08">
                <el-form-item>
                    <label class="bpa-form-label bpa-custom-checkbox--is-label"> 
                    <el-checkbox v-model="appointment_formdata.bookingpress_appointment_meta_fields_value.send_whatsapp_notification"></el-checkbox> <?php esc_html_e( 'Send Whatsapp Notification', 'bookingpress-whatsapp' ); ?></label>
                </el-form-item>
            </el-col>
            <?php
            */
            ?>
            <el-col :xs="24" :sm="24" :md="24" :lg="08" :xl="08">
                <el-form-item>
                    <label class="bpa-form-label ">Tipo Documento</label>
                    <el-select>
                        <el-option value="DU"></el-option>
                        <el-option value="LC"></el-option>
                        <el-option value="LE"></el-option>
                    </el-select>
                </el-form-item>
            </el-col>
            <?php
        }
        
        function front_appointment_add_vue_methods_filter( $bookingpress_vue_methods_data = '' ){
            ob_start();
                $this->front_appointment_add_vue_methods();
            return $bookingpress_vue_methods_data . ob_get_clean();
        }
        
        
        function front_appointment_add_vue_methods(){
            //print_r("METHOOODSSS");exit;
            ?>
                        bookingpress_selectpicker_set_position(flag) {
                            const vm = this;
                            if (true == flag) {
                                let is_admin_bar_visible = (document.getElementById("wpadminbar") != null && document.getElementById("wpadminbar").getBoundingClientRect().width > 0 && document.getElementById("wpadminbar").getBoundingClientRect().height > 0) ? true : false;
                                if (document.querySelector(".bpa-focused-select") != null && is_admin_bar_visible) {
                                    setTimeout(function() {
                                        let top_pos = document.querySelector(".bpa-focused-select").style.top;
                                        top_pos = parseInt(top_pos.replace("px", ""));
                                        document.querySelector(".bpa-focused-select").style.top = (top_pos + 32) + "px";
                                    }, 10);
                                }

                                if (document.querySelector(".bpa-focused-select") != null) {

                                    setTimeout(function() {
                                        const allselectcontainer = document.querySelectorAll(".bpa-bd-fields--sel-container");
                                        if (typeof allselectcontainer != "undefined") {
                                            var has_added = false;
                                            allselectcontainer.forEach( (selcontItem) => {
                                                var questyle = selcontItem.querySelector(".bpa-focused-select");
                                                if (typeof questyle != "undefined" && questyle ) {
                                                    const display = window.getComputedStyle(questyle).display;
                                                    if (display != "none" && !has_added) {
                                                        selcontItem.classList.add("bpa-sel--focus");
                                                        has_added = true;
                                                    }
                                                }
                                            }
                                            );
                                        }
                                    }, 100);

                                }
                            }
                            if (false == flag) {
                                if (document.querySelector(".bpa-bd-fields--sel-container") != null) {
                                    let elm = document.querySelector(".bpa-bd-fields--sel-container")
                                    const range_inputs = document.querySelectorAll(".bpa-bd-fields--sel-container");
                                    for (const range_input of range_inputs) {
                                        range_input.classList.remove("bpa-sel--focus");
                                    }
                                }
                            }

                        },
                        expansion_verifyDialogClose(){
                            this.expansion_verify_data.dialog_open = false;
                        },
                        expansion_confirmar_mis_Datos(){
                            //se evita generar una request, se asigna el dato entre los fromfields.
                            this.appointment_step_form_data.form_fields.confirmar_mis_datos = 1;
                            this.expansion_verifyDialogClose()
                        },
                        async expansion_utilizar_obra(  ){
                            let obsData = this.expansion_verify_data.obs_data;
                            if(obsData && obsData.nombre == this.expansion_verify_data.obs){
                                console.log("consolidado, buscar obra en lista y asignar si esta disponible y con cupos disponibles");
                                
                                let cupos_disponibles = 0;
                                
                                let rnasOption = await this.expansion_get_optionByRnas( obsData.RNAS );
                                if( rnasOption ){
                                     // solo sin limite o hay cupos
                                     cupos_disponibles = (!rnasOption.cupos && rnasOption.limitado) || rnasOption.$isDisabled? 0 : rnasOption.cupos;                                     
                                }
                                
                                if( cupos_disponibles ){
                                    
                                    //Si Hay cupos disponibles, asegurar que no este en Particular
                                    app.appointment_step_form_data['form_fields'].is_particular='obra social';//utilizamos '' o 'obra social';
                                    if(( select_option = obs_seg_select.querySelector(`[data-rnas="${rnasOption.rnas}"]`) )){
                                        // Always Trigger Click - Siempre detonamos el evento Click, si esta deshabilitado no surte efecto
                                        select_option.click();
                                        if( select_option.closest('.multiselect__option--disabled') ){
                                            document.querySelector('[particular="true"]').click()
                                        }
                                    }else{
                                        setTimeout(() => {
                                            // Repetimos la secuencia Para casos en que no se actualize el DOM a tiempo
                                            obs_seg_select.querySelector(`[data-rnas="${rnasOption.rnas}"]`).click();
                                            if( select_option.closest('.multiselect__option--disabled') ){
                                                document.querySelector('[particular="true"]').click()
                                            }
                                        }, 50); //50 miliseg
                                    }
                                    
                                }else{
                                // de lo contrario asignamos Particular
                                app.appointment_step_form_data['form_fields'].obra_soc_seguros='';
                                app.appointment_step_form_data['form_fields'].is_particular='particular';
                                }
                                                                
                            }
                            this.expansion_verifyDialogClose()
                        },
                        expansion_get_optionByRnas( rnas_code ){
                            if( !Number(rnas_code) ) return null;
                            let rnasOption = configuracion_medico.obras_sociales.find( itemList => itemList.rnas == rnas_code );
                            return rnasOption;
                        },
            <?php
        }
        
        function write_confirmar_datos_log_appointment(){
            //Nada por ahora error_log()
        }
    }
    global $expansionFromFields;
    if( empty($expansionFromFields) ){
        $expansionFromFields = new Expansion_FromFields();
    }


if( !function_exists('expansion_verify_entry_hash') ){
    function expansion_verify_entry_hash( $data = []){
        $str = json_encode($data);
        return hash_hmac('sha256', $str, 'expansion_verify_entry_hash');
    }
}

//bookingpress_add_field_after_appointment_booking_form
//do_action('bookingpress_add_front_side_sidebar_step_content', $bookingpress_goback_btn_text, $bookingpress_next_btn_text, $bookingpress_third_tab_name);
add_action('bookingpress_add_front_side_sidebar_step_content', function(){
    /*
    'is' => '',//doc_fail|obs_result|limit_fail
    'msg' => '',
    'doc' => '',
    'obs' => '',
    'obs_data'=>[]
    */
    ?>
    <div class="expansion-verify-box-container">
        
        <!--:before-close=""  :close-on-press-escape="true"    bpa--is-page-non-scrollable-mob  style="position:absolute;" -->
        <el-dialog v-if="expansion_verify_data"  :visible.sync="expansion_verify_data.dialog_open"  id="expansion_verify_box" :fullscreen="false" :modal-append-to-body="true" custom-class="bpa-dialog expansion-verify-box" :lock-scroll="false" >
            <div class="expansion-verify-box-inner" style="">
                <!--<span style="display: none;" v-if="expansion_verify_data.computed_tab"> {{expansion_verify_data.computed_tab}} </span>-->
                <div v-if="expansion_verify_data.is=='obs_result'">
                    <strong>Nuestros sistemas indican que su obra social es</strong><br>
                    <strong class="exp-verif-result">{{expansion_verify_data.obs}}</strong><br>
                    
                    <div style="display: flex; justify-content: space-around; gap: 10px;">
                        <el-button v-if="expansion_verify_data.obs_data && expansion_verify_data.obs_data.rnasOption && expansion_verify_data.obs_data.rnasOption.limite && expansion_verify_data.obs_data.rnasOption.cupos" @click.native.prevent="expansion_utilizar_obra(expansion_verify_data.obs_data.rnasOption.rnas)">
                            <span>Hay {{expansion_verify_data.obs_data.rnasOption.cupos}} cupos disponibles!</span>
                        </el-button>
                        <el-button v-if="expansion_verify_data.obs_data && expansion_verify_data.obs_data.rnasOption && !expansion_verify_data.obs_data.rnasOption.limite" @click.native.prevent="expansion_utilizar_obra(expansion_verify_data.obs_data.rnasOption.rnas)">
                            <span>Obra Social disponible</span>
                        </el-button>
                        
                        <el-button v-if="expansion_verify_data.obs_data && expansion_verify_data.obs_data.rnasOption" @click.native.prevent=" app.appointment_step_form_data['form_fields'].is_particular='particular' ">
                            <span>Deseo atencion Particular!</span>
                        </el-button>
                                                               
                        <el-button class="bpa-front-btn bpa-front-btn__medium bpa-front-btn--primary" style="justify-self: center;" @keydown.enter.prevent="if(expansion_verify_data.obs_data) expansion_utilizar_obra(expansion_verify_data.obs_data.RNAS)" @click.native.prevent="if(expansion_verify_data.obs_data) expansion_utilizar_obra(expansion_verify_data.obs_data.RNAS)">
                            <span>Gracias</span>
                            <!--utilizar si esta disponible-->
                        </el-button>
                    </div>
                </div>
                <div v-else-if="expansion_verify_data.is=='limit_fail'">
                    <strong v-if="expansion_verify_data.msg!=''">{{expansion_verify_data.msg}}</strong>
                    <strong v-else>Demasiados ingresos. Intente más tarde.</strong>
                    <br>
                    <span>
                        Si los datos ingresados son correctos<br>informanos presionando aquí <br>
                        <el-button class="bpa-front-btn bpa-front-btn__medium bpa-front-btn--primary" style="justify-self: center;" @click="expansion_confirmar_mis_Datos()">confirmar</el-button>
                        <div>
                            <span>y<br>continua con el formulario normalmente.</span>
                        </div>
                    </span>
                </div>
                <div v-else>
                    <!--<strong v-if="expansion_verify_data.msg!=''">{{expansion_verify_data.msg}}</strong>-->
                    <strong >Verifique que el documento ingresado es correcto.</strong>
                    <br>
                    <strong class="exp-verif-result">
                        <!--<el-input v-model="appointment_step_form_data.form_fields.text_C6kufq"></el-input>-->
                        {{expansion_verify_data.doc}}
                    </strong><br>
                    <el-button class="bpa-front-btn bpa-front-btn__medium bpa-front-btn--primary" style="justify-self: center;" @click="expansion_verifyDialogClose()">
                        <span>Gracias</span>
                    </el-button>
                    
                </div>
            </div>
        </el-dialog>
    </div>
    <?php
}, 100);

//ADMIN ? action 'bookingpress_front_appointments_dynamic_helper_vars'
//fron filter add_filter( 'bookingpress_front_booking_dynamic_helper_vars'
add_action( 'wp_print_scripts', 'expansion_Anses_required_scripts',10);
###add_action( 'admin_print_footer_scripts', 'expansion_Anses_required_scripts',10);
function expansion_Anses_required_scripts( $bookingpress_front_booking_dynamic_helper_vars = '' ){
    if( !session_id() ) session_start();
    
    $data_to_hash = ['consulta'=> 1, 'maxconsultas'=> 5, 'session_id' => (!empty(session_id())? session_id() : (!empty($_COOKIE['PHPSESSID'])? $_COOKIE['PHPSESSID']:'') ) ];
    if( is_admin() ) $data_to_hash['expansion_is_admin'] = 1;
    $start_hash = expansion_verify_entry_hash($data_to_hash);
    
    $var_expansion_verify_req = array(
        'maxconsultas' => 5,
        'timestamp' => 0,
        'consulta'  =>1,
        'hash'  => $start_hash
    );
    ?>
<script>
var expansion_verify_req = <?php echo json_encode($var_expansion_verify_req);?>;
//delfina 6607780

/*var expansion_verify_data = {
    dialog_open: false,
};*/


window.expansion_get_requiredFormData = ()=>{
    let required_fields = {
        'text_C6kufq':'',
        'tipo_doc':'',
        'customer_firstname':'',
        'customer_lastname':'',
    };
    for( x in required_fields){
        required_fields[x] = app.appointment_step_form_data.form_fields[x];
    }
    required_fields.doc = required_fields.text_C6kufq;
    //console.log('req fields', required_fields);
    return required_fields;    
};

function expansionTakeFormDataAndVerify(){
    let required_completed_fields = window.expansion_get_requiredFormData()
    expansion_verify_data_func(required_completed_fields);
}

//app.$refs.tipo_doc[0].onFieldBlur = ()=>{ console.log('lalala')};

window.onDniBlur = function on_dni_blur(val){
    //app.$refs.text_C6kufq[0].resetField();
    let dni_error_msg = 'Introduzca un documento valido, solo numeros (sin puntos, espacios y guiones)';
    let pattern = /^(\d{6,8})$/;
    limit_len = 8;
    if( ['PAS'].includes(app.appointment_step_form_data.form_fields['tipo_doc'])  ){
        pattern = /^([A-Za-z]{3})([0-9]{6})$/;
        dni_error_msg = 'Introduzca un documento valido (sin puntos, espacios y guiones)';
        limit_len = 9;
        if(val) val = val.toUpperCase();
    }else{
    if(Number(val)> 100000 && val.length==6) val = '00'+val;
    if(Number(val)> 100000 && val.length==7) val = '0'+val;
    }
    if(val) app.appointment_step_form_data.form_fields.text_C6kufq = val;
    app.$refs.text_C6kufq[0].validateMessage = dni_error_msg;

    if(!pattern.test(val) ){
    //if(!pattern.test(val) || (val.length < limit_len) || (val.length > limit_len) ){
        //if(val!='') dni_error_msg = 'Documento invalido';
        app.$refs.text_C6kufq[0].validateMessage = dni_error_msg;
        setTimeout(()=>{ app.$refs.text_C6kufq[0].validateState ="error"; },10);
        console.log("Documento invalido");
        
        //app.$refs.text_C6kufq[0].onFieldChange()
        //app.$refs.text_C6kufq[0].validate()
        //return ;
    }else{
        console.log("ok");
        setTimeout(()=>{ app.$refs.text_C6kufq[0].validateState ="success"; },10);
            //window.expansion_completionForm['doc'] = app.appointment_step_form_data.form_fields['text_C6kufq'];
            //console.log("DNI blur 1", val, window.expansion_completionForm );
        
        expansionTakeFormDataAndVerify()
        //let required_completed_fields = window.expansion_get_requiredFormData()
        //expansion_verify_data_func(required_completed_fields);
    }
    
    console.log(pattern)
    app.$refs.text_C6kufq[0].validate()
}
window.onTipoDocChange = function on_tipo_doc_change(val){
            //window.expansion_completionForm['tipo'] = val;
    //Automaticamente al cambiar tipo verificamos nro doc
    window.onDniBlur(app.appointment_step_form_data.form_fields.text_C6kufq);
        //console.log("tipo blur 2", val, window.expansion_completionForm );
}

//app.$on
//add EVENT HANDLER ON BASIC TABLE
function expansion_handleBookingFormEvents(){
    
    if(!app.$refs.text_C6kufq[0]._events['el.form.blur'] || !app.$refs.text_C6kufq[0]._events['el.form.blur'].includes(window.onDniBlur) ){
        app.$refs.text_C6kufq[0].$on("el.form.blur", window.onDniBlur);
    } 
    if(!app.$refs.tipo_doc[0]._events['el.form.change'] || !app.$refs.tipo_doc[0]._events['el.form.change'].includes(window.onTipoDocChange) ){
        app.$refs.tipo_doc[0].$on("el.form.change", window.onTipoDocChange);
    } 
    console.log( app.$refs.tipo_doc[0]._events )
    console.log( app.$refs.text_C6kufq[0]._events )
        
}

function expansion_dialog_doc_open(is,msg, doc, obsname, obs_data){
    if( app.expansion_verify_data.doc != doc ){
        app.expansion_verify_data.obs_data = null;
        app.expansion_verify_data.obs = '';
    }
    app.expansion_verify_data.msg = msg;
    app.expansion_verify_data.is = is;
    app.expansion_verify_data.doc = doc;
    app.expansion_verify_data.obs = obsname;
    app.expansion_verify_data.obs_data = obs_data;
    app.expansion_verify_data.dialog_open = true;
    console.log(msg, doc, obsname);
}

async function expansion_verify_data_func( custom_fields ){
    const vm = app;
    if( Object.values(custom_fields).includes("") ) return;
    <?php //Ocultamos estos comentarios del Front
    //TEMPORAL CONSULTA 1
    //expansion_verify_req.consulta = 1
    ?>
    //console.log( 'expansion_verify_req', expansion_verify_req );
    
    custom_fields.expansion_verify_req = {...expansion_verify_req};
    if(Date.now() < expansion_verify_req.timestamp + 3000) return console.log('Muy pronto, espera.');
    expansion_verify_req.timestamp = Date.now();
    
    const postdata = {
        action: 'expansion_verify_entry_customer_data',
        required_fields: btoa(JSON.stringify(custom_fields)),
    };
    let el_wpnonce = document.getElementById("_wpnonce");
    let wpnonce_value = el_wpnonce && el_wpnonce.value? el_wpnonce.value: null;
    if( wpnonce_value ) postdata._wpnonce = wpnonce_value;
    return new Promise( (resolve, reject) => {
        //const postdata = new URLSearchParams();
        //postdata.append('action', 'expansion_verify_entry_customer_data')
        axios.post(appoint_ajax_obj.ajax_url+'?time='+Date.now(), Qs.stringify(postdata)).then( async (response) => {
            expansion_verify_req.consulta++;
            //console.log(response.data);
            if(response.data.expansion_verify_req){
                expansion_verify_req.hash = response.data.expansion_verify_req.hash;
            }
            
            if(response.data.variant == 'error'){
                if(! response.data.error_limit ){
                    mensaje = "Asegúrese de que el documento ingresado es correcto.";
                    expansion_dialog_doc_open('doc_fail', mensaje, custom_fields.doc, '',null);
                }else{
                    mensaje = response.data.msg;
                    expansion_dialog_doc_open('limit_fail', mensaje, '', '', null);
                }
            }
            if(response.data.variant == 'success'){
                mensaje='Obra social relacionada. ';
                let obsname = '';
                let obs_data = null;
                if( response.data.obs ){
                    obs_data = await obtenerEntidadPorRNAS( response.data.obs );                    
                }
                if( obs_data ){
                    obsname = obs_data.nombre
                    let rnasOption = await app.expansion_get_optionByRnas( obs_data.RNAS );
                    obs_data.rnasOption = rnasOption;
                }
                expansion_dialog_doc_open('obs_result',mensaje, custom_fields.doc, obsname, {...obs_data} );
            }
            resolve(response.data);
        })
                
    }).catch(function(requesterror){
            console.log(requesterror);
            reject(requesterror);
        });
};

async function obtenerEntidadPorRNAS(rnasId) {
  try {
      //let url = new URLSearchParams();
      //url.append('expansion_json_data', 'rnas_obras.json');//'https://turnos2.clinicaume.com.ar/?expansion_json_data=rnas_obras.json'
      
      let url = new URL(location.href/*appoint_ajax_obj.ajax_url*/);
      url.search = new URLSearchParams({'expansion_json_data': 'rnas_obras.json'});
            
    // El navegador negocia Gzip automáticamente con el servidor
    //console.log( url );
    const response = await fetch( url );
    
    if (!response.ok) throw new Error('Error al cargar el JSON');

    const data = await response.json(); // Aquí ya está descomprimido por el navegador

    // Buscamos el objeto que coincida con el RNAS proporcionado
    const resultado = data.find(item => item.RNAS == rnasId);

    if (resultado) {
      console.log("Nombre encontrado:", resultado.nombre);
      return resultado;
    } else {
      console.warn("No se encontró ninguna entidad con RNAS:", rnasId);
    }
  } catch (error) {
    console.error("Error en la petición:", error);
  }
}

// Ejemplo de uso para el RNAS 208
//obtenerEntidadPorRNAS(208);



</script>
<style>
.expansion-verify-box-inner{
padding: 50px 20px 20px;text-align: center;font-size: 17px;width: 500px;max-width: 100%;margin: auto;box-sizing: border-box;word-break: keep-all;
}
.exp-verif-result {
    color: dodgerblue;
}
.expansion-verify-box-container {
    /* display: none; */
    position: absolute;
    right: 0;
    z-index: 2050;/* mayor a v-modal class */
    width: max( calc( 100% - 300px), 350px );
    margin: auto;
    height: 100%;
    pointer-events: none;
}
div#expansion_verify_box {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    position: absolute;
    pointer-events: all;
    z-index: 2050;
    /*width: 100%;*/
    /*width: calc( 100% - 300px);*/
}
#expansion_verify_box>.el-dialog {
    width: 80%;
}
.bpa-front-tabs--panel-body{
    z-index: 3;
}


.expansion-verify-box-container {
    position: fixed;
    top: 0;
}

@media (max-width: 768px) {
    #expansion_verify_box>.el-dialog {
        position: fixed;
        top: 0;
    }
}

</style>
    <?php
    #var_dump($data_to_hash, $start_hash,session_id(), $_COOKIE['PHPSESSID']);
    //$bookingpress_front_booking_dynamic_helper_vars.= 'var expansion_verify_req = ' . json_encode($var_expansion_verify_req) . ';';
    //return $bookingpress_front_booking_dynamic_helper_vars;
}

//'bookingpress_front_booking_dynamic_data_fields' ya en formato json
add_filter( 'bookingpress_frontend_apointment_form_add_dynamic_data', function( $bookingpress_front_vue_data_fields = [] ){
    $bookingpress_front_vue_data_fields['expansion_verify_data'] = [
    'dialog_open' => false,
    'computed_tab' => false,
    'handleBookingFormEvents' => 0,
    'is' => '',//doc_fail|obs_result
    'msg' => '',
    'doc' => '',
    'obs' => '',
    'obs_data' => [],
];
    return $bookingpress_front_vue_data_fields;
} );

/**
 * expansion_booking_form_on_mount
 * eventos y datos asignados al montar la app
 */
function expansion_booking_form_on_mount(){
    ?>
    if(!app) app = this;
    
    //app.$on('change_step_tab', (e)=>{ console.log("channggeee step",e)});

    app.$watch('bookingpress_current_tab', (nval, oldval) => {
        if(nval != oldval){
            app.$emit('change_step_tab', nval);
            //console.log("change tabbb",nval, app.bookingpress_current_tab);
        }
        app.expansion_verify_data.computed_tab = app.bookingpress_current_tab;
    });
    
    
    app.$on('change_step_tab', (tabname) => {
        if(tabname == 'basic_details' && !app.expansion_verify_data.handleBookingFormEvents){
             app.expansion_verify_data.handleBookingFormEvents = 1;
            expansion_handleBookingFormEvents()
        }
        // Ajuste mensaje de error de obra sociales
        app.ajuste_ob_err_msg = 0;
        if(!app.ajuste_ob_err_msg && app.$refs.obra_soc_seguros && app.$refs.obra_soc_seguros[0].form.rules){
            let def_msg = "Obra Social convenio se requiere";
            let rule_ok = app.$refs.obra_soc_seguros[0].form.rules.obra_soc_seguros.find( rule => rule.message);
            def_msg = ( rule_ok )? rule_ok.message : def_msg;
            app.$refs.obra_soc_seguros[0].form.rules.obra_soc_seguros.map(rule => rule.message = def_msg );
            app.ajuste_ob_err_msg = 1;
        }
        
    });
    
    <?php
}

add_filter( 'bookingpress_add_appointment_booking_on_load_methods', function( $bookingpress_dynamic_on_load_methods_data = '' ){
    ob_start();
        //LLAMADA A METODOS REQUERIDOS AL MONTAR LA APP DEL FORMULARIO
        expansion_booking_form_on_mount();
    $bookingpress_dynamic_on_load_methods_data .= ob_get_clean();
    
    return $bookingpress_dynamic_on_load_methods_data;
}, 20 );


add_action( 'init', function(){
    //expansion_verify_entry_customer_data
    
    if( isset($_GET['expansion_json_data']) )
    {
        $dir_expansion_json = BPHC_PLUGIN_DIR . 'src/json/';
        if( $_GET['expansion_json_data'] == 'rnas_obras.json' ){
            // servidor.php
            $archivo = $dir_expansion_json . 'obras_rnas_siglas_001.json.gz'; //'datos.json.gz';
                    
            if (file_exists($archivo)) {
                // Cabeceras críticas
                header('Content-Type: application/json');
                header('Content-Encoding: gzip'); // Avisa al navegador que el archivo ya viene comprimido
                header('Content-Length: ' . filesize($archivo));
                
                // Leer y enviar el archivo binario directamente
                readfile($archivo);
                exit;
            }
        }
        
        exit;
    }
    
    
    if (isset($_POST['action']) && $_POST['action'] == 'expansion_verify_entry_customer_data' ) {
        if( !session_id() ) session_start();
        
        $respuesta = ['variant'=>'error', 'type'=>'error', 'msg'=> "", 'obs' => ''];
        
        $is_expansion_admin_request = 0;
        
        $postdata = $_POST;
        $postdata_fields = !empty( $postdata['required_fields'] )? base64_decode($postdata['required_fields']): '';
        $postdata_fields = !empty( $postdata_fields )? json_decode( $postdata_fields, true): [];
        
        $expansion_verify_req = !empty( $postdata_fields['expansion_verify_req'] )? $postdata_fields['expansion_verify_req']: [];
        if( empty( $expansion_verify_req ) ){
            wp_send_json(['variant'=> 'error', 'type'=> 'error', 'error_seguridad'=> 1, 'msg'=> 'registro de ataque.']);
            exit;
        }
        
        $data_to_hash = ['consulta'=> $expansion_verify_req['consulta'], 'maxconsultas'=> $expansion_verify_req['maxconsultas'], 'session_id' => (!empty(session_id())? session_id() : (!empty($_COOKIE['PHPSESSID'])? $_COOKIE['PHPSESSID']:'') ) ];
        #print_r( [expansion_verify_entry_hash($data_to_hash),$expansion_verify_req['hash'], $data_to_hash] );
        
        $verificar_hash = !empty( $expansion_verify_req['hash'] )? $expansion_verify_req['hash'] == expansion_verify_entry_hash($data_to_hash) : false;
        //Verificar hash paso 2 para peticiones desde el admin, aportando una referencia mas segura
        if( !$verificar_hash ){
            $data_to_hash['expansion_is_admin'] = 1;
            $verificar_hash = !empty( $expansion_verify_req['hash'] )? $expansion_verify_req['hash'] == expansion_verify_entry_hash($data_to_hash) : false;
            //si verificar hash sigue siendo false eliminamos el elemento is admin
            if( !$verificar_hash ){
                unset($data_to_hash['expansion_is_admin']);
            }else{
                $is_expansion_admin_request = 1;
            }
        }
        
        if( intval($expansion_verify_req['consulta']) >= intval($expansion_verify_req['maxconsultas']) ){
            wp_send_json(['variant'=> 'error', 'type'=> 'error', 'error_limit'=> 1, 'msg'=> "Máximo de consultas alcanzado, intente más tarde."]);
            exit;
        }
        
        if( !$verificar_hash ){
            $consulta_limit = !empty($_COOKIE['expansion_consulta_l'])? (int) $_COOKIE['expansion_consulta_l']: 5;
            $consulta_limit = $consulta_limit -1;
            setcookie( 'expansion_consulta_l', $consulta_limit, time()+300 );
            wp_send_json(['variant'=> 'error', 'type'=> 'error', 'error_seguridad'=> 1, 'msg'=> "Fallo verificacion de seguridad, tienes {$consulta_limit} intentos."]);
            exit;
        }
        
        
        if( !$is_expansion_admin_request ) (int) $data_to_hash['consulta']++;
        $expansion_verify_req['consulta'] = $data_to_hash['consulta'];
        $expansion_verify_req['hash'] = expansion_verify_entry_hash($data_to_hash);
        $respuesta['expansion_verify_req'] = $expansion_verify_req;
        #var_dump($postdata_fields);
     //if (isset($_GET['consulta_anses'])) {
        //if( file_exists(BPHC_PLUGIN_DIR . "includes/anses-consultas.php")) include_once BPHC_PLUGIN_DIR . "includes/anses-consultas.php";
        if( file_exists(BPHC_PLUGIN_DIR . "includes/class.consulta-anses-html.php")) include_once BPHC_PLUGIN_DIR . "includes/class.consulta-anses-html.php";
        if( class_exists("Consulta_Anses_HTML") ){
            
            if( empty($postdata_fields['doc']) ){
                wp_send_json($respuesta);
                exit;
            }
            
            $documento = $postdata_fields['doc'];
            $search_name = trim( ( !empty($postdata_fields['customer_lastname'])? trim($postdata_fields['customer_lastname']) : '' ) . ' ' . ( !empty($postdata_fields['customer_firstname'])? trim($postdata_fields['customer_firstname']) : '' ) );//customer_firstname
            //$search_name_tmp = explode(' ', $search_name,4);
            //$search_name = implode(' ', $search_name_tmp);
            
            //var_dump( [$documento, $search_name, $postdata_fields] );exit;
            
            $Consulta_Anses = new Consulta_Anses_HTML($documento, $search_name);
            
            $Consulta_Anses->return_data = true;
            $Consulta_Anses->show_response = false;
            
            #$Consulta_Anses->table_data['busqueda_criterio']['margen_error'] = 5;
            #$Consulta_Anses->set_margen_error( 4 );
            $resultado_anses = $Consulta_Anses->get_results();
            #var_dump( $resultado_anses );
            if( $is_expansion_admin_request ){
                //if( empty($resultado_anses['error']) ) 
                $respuesta['type'] = $respuesta['variant'] = 'success';
                $respuesta['msg'] = $resultado_anses['msg'];
                $respuesta['admin_data'] = $resultado_anses['data'];
                wp_send_json($respuesta);
                exit;
            }
            
            if( !empty($resultado_anses['error']) || (!empty($resultado_anses['busqueda_criterio']['busqueda_confianza']) && $resultado_anses['busqueda_criterio']['busqueda_confianza'] == 'riesgo_alto') ){
                $respuesta['type'] = $respuesta['variant'] = 'error';
                $respuesta['msg'] = 'registro de ataque. ' . $resultado_anses['msg'];
                wp_send_json($respuesta);
                exit;
            }
            
            
            
            if( !empty($resultado_anses['data']['coincidencia']) ) {
                if(!empty($resultado_anses['data']['obras_sociales'])){
                    $respuesta['obs'] = reset($resultado_anses['data']['obras_sociales'])['Código'];
                }
                //$respuesta['obs_detail'] = $resultado_anses['data']['obras_sociales'];
                //$respuesta['p_detail'] = !empty($resultado_anses['data']['coincidencia']['result'])? $resultado_anses['data']['coincidencia']['persona'] : [];
                
                foreach( (array)$resultado_anses['data']['personas_encontradas'] as $persona ){
                    foreach( explode(' ', $persona['Apellido y Nombre']) as $nomb_apel ){
                        
                        if( str_contains(strtoupper($search_name), strtoupper(trim($nomb_apel)) ) ){
                            if( $persona['Tipo Doc.'] == 'DU' ){
                                $respuesta['Tipo_doc'] = $persona['Tipo Doc.'];
                                $respuesta['Nro_doc'] = $persona['Nro. Doc.'];
                            }
                        }
                    }
                }
                
                $respuesta['type'] = $respuesta['variant'] = 'success';
            }
            
                        
            wp_send_json($respuesta);
            exit;
            exit( "<br><h2>SI llega aqui no hubo exit! respuesta:</h2><br>" .print_r( $resultado_anses, true ). "<br>" );            
        }
        
     }
 
}, 1);
    
    //ESTILO TEMPORAL - previsto hasta actualizacion de footer.css en produccion
                            add_action('admin_footer', function(){
/**
 * JWT TEST
 * 
 */

/*
if( isset($_GET['jwt'])){
// Helper functions for base64url encoding/decoding
function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64url_decode($data) {
    return base64_decode(strtr($data, '-_', '+/') . str_repeat('=', 3 - (strlen($data) % 4)));
}

// Example: Create a JWT
$header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
$payload = json_encode([
    'iss' => 'http://example.org',
    'aud' => 'http://example.com',
    'iat' => 1356999524,
    'nbf' => 1357000000
]);

$o = new stdClass;
$o->nro_turno = 3283013108;
// aquí se construye el objeto según la estructura antes mencionada
$secret = "f9TLSrlKtlC4hTa99eLzxTMuTKepwYB0HstWncH1IuAKs";
$secret = "1GlAMdWWJTfRFbAmVULfduraerJnfUzXTvwaq3VPHecbk";
$secret = "mlAMQ8lFABnyjKm2BWXRRyv3HkaHdEQwfDt2Od2ym1TJf";
//$token = JWT::encode($o,$secret);


//$payload = json_encode( (array) $o);

$payload = '{
"nro_turno": "3283013108",
"descripcion": "Ecografía de Hombro",
"modalidad": "US",
"destino": "ECO2",
"pac_id": "12345678",
"pac_apellido": "Saavedra",
"pac_nombre": "Angel",
"pac_sexo": "M",
"pac_email": "nombre@gmail.com",
"pac_telefono": "1112345678",
"pac_fecha_nacimiento": "2000-12-31",
"obra_social_id": "AB123",
"obra_social_nombre": "OSEP",
"sol_id": "AB123",
"sol_nombre": "Carolina Sanchez",
"sol_matricula": "23123",
"med_id": "AB123",
"med_nombre": "Carolina Sanchez",
"med_matricula": "423123",
"prioridad": "3",
"alertas_medicas": "",
"alergia_contraste": "",
"necesidades_especiales": "",
"especialidad_nombre": "",
"tipoAtencion": "ambulatorio",
"empresa": "AB123", 
"practicas":[
{
"fecha_inicio": "20170113",
"dias_validez": "15",
"modalidad": "US",
"codigo_practica": "AB123",
"descripcion": "Ecografía de Hombro"
}
]
}';


//$secret = 'your_secret_key';

$base64UrlHeader = base64url_encode($header);
$base64UrlPayload = base64url_encode($payload);
$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
$base64UrlSignature = base64url_encode($signature);

$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

echo '<div style="margin:auto;width:400px;heigt:600px;border:4px solid red;overflow:auto;word-break:break-all">' . $jwt . "</div>";

exit();

}

FIN JWT TEST */


/**
 * CONSULTA DE OBRA SOCIAL Y NOMBRE POR DNI A ANSES
 * EJEMPLO URL: "https://turnos2.clinicaume.com.ar/wp-admin/admin.php?page=bookingpress_appointments&com&doc=28154971" 
 * 
 * SEGUIDO FUERA DEL GET "com" CONTINUAN LOS ESTILOS DE STAFFMEMBERS
 */
 
if( FALSE && isset($_GET['com'])){
                                
                                
/**
 * CONSULTA DE OBRA SOCIAL Y NOMBRE POR DNI A ANSES
 * EJEMPLO URL: "https://turnos2.clinicaume.com.ar/wp-admin/admin.php?page=bookingpress_appointments&com&doc=28154971" 
 * 
 * 
 */
   
$table_data = $new_table_data = [];
$all_table_data = '';
/**
$xmlfile = file_get_contents( __DIR__ .'/anses-res/respuestaX_1770333364.txt');

$det_encod = mb_detect_encoding($xmlfile, 'UTF-8, ISO-8859-1, windows-1251', true );
if( $det_encod && $det_encod !== 'UTF-8' ){
    //$xmlfile = mb_convert_encoding($xmlfile, 'UTF-8', $det_encod );
}

$xmlfile = substr( $xmlfile, strpos( $xmlfile, '[3] =>')+6 );
$xmlfile = substr( $xmlfile, 0, strpos( $xmlfile, '</html>')+7 );
$xmlfile = '<html><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><<body><table ' . $xmlfile;
//echo  $xmlfile;

//echo " dommmm <br>";

//$xmlMAX = simplexml_load_string($xmlfile);
*/

function anses_response_to_Array( $xmlString = '' ){
$table_data = $new_table_data = [];
$all_table_data = '';

$dom = new DOMDocument('1.0','UTF-8');

@$dom->loadHTML($xmlString);

$rows = $dom->getElementsByTagName('td');
//print_r( $rows->item(0) );
if( !empty( $rows ) && $rows->length > 0 ){
    
    $cells = $dom->getElementsByTagName('td');
    
    if( $cells->length > 0 ){
        foreach( $cells as $cell ){
            $all_table_data = trim( $cell->nodeValue );
            
            foreach( $cell->childNodes as $child ){
                $tmpVal = '';
                $tmpVal = trim( $child->textContent );
                if( !empty($tmpVal) ) $table_data[] = $tmpVal;
                
                //echo "<br><br>" . trim( $child->nodeValue );
            }
        }
    }
    //echo "<br><br>xxxxxxxxxxxxxxxxxxxxxxxxxxxx<br><br>";
    
    $next_indx = ''; $tabl2 = 1; $new_table_data = [];
    foreach( $table_data as $tabd ){
        if( $next_indx != ''){
            $new_table_data[ $next_indx ] = $tabd;
        }
        
        switch( $tabd )
        {
            case 'CUIL N°:': $next_indx = 'CUIL_N'; break; 
            case 'Apellido y Nombre:': $next_indx = 'apel_nomb'; break; 
            case 'Tipo y Número de Documento:': $next_indx = 'tipo_doc'; $tabl2 = 1; break;
            default: $next_indx = '';
        }
        if( empty($next_indx) && $tabl2 ){
            
            if( $tabl2 == 2 ) $next_indx = 'os_desc';
            if( $tabl2 == 3 ) $next_indx = 'os_cond';
            if( $tabl2 == 4 ) $next_indx = 'os_Situacion';
            
            if( $tabl2 > 1 ) $tabl2++;
            
            if( $tabd == 'CODEM' ){
                $next_indx = 'os_cod';
                $tabl2 = 2;
            }            
            
        }
    }
    
    //print_r($table_data);
    
    //echo "<br><br>----------------------<br>";
    //print_r($new_table_data);
    
}
return $new_table_data;
}
/**
$table_data = anses_response_to_Array( $xmlfile );

echo '<pre>' . json_encode( $table_data, JSON_PRETTY_PRINT) . '</pre>';
*/

$table_data = [];
//exit;
                                    
                                         
                                         $url="https://servicioswww.anses.gob.ar/ooss2/";
                                         //$url="https://google.com";
                                         $command = 'curl -s "https://servicioswww.anses.gob.ar/ooss2/" -H "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7"  ';
                                         //-H "accept-language: es-419,es;q=0.9,en;q=0.8"  -H "cache-control: no-cache"  -b "persist_servwww=expres04; visid_incap_2267344=JyK3idSSTIuj6rWUt1lbMmFScmkAAAAAQUIPAAAAAAAKw4DkZztzQruTAmbPCFRa; Cookie_session_OOSS2=nm55hgcgwjif2gcztwl3akxf; visid_incap_2267324=Sa1E+t6WSviuI4t8C7REKdzNcmkAAAAAQUIPAAAAAABX1v93YmMSD6g+0eLomk0U; visid_incap_2778330=Q6OqZ0FCR/ue4miVmgVY3d3NcmkAAAAAQUIPAAAAAACeMYEqmJEgf4Ir29OskXfD; incap_ses_1215_2267324=UOBkfD+1dT0daFkhgozcEPDcg2kAAAAAIYavMNDTKLfVZDeZ044igQ==; incap_ses_1215_2778330=YFeSQAl9jzHhaVkhgozcEPncg2kAAAAAGfCWzwa22ajutKzBLRyZeQ==; incap_ses_1215_2267344=6kr+A1rHAinUxlkhgozcEIneg2kAAAAAYd1mGi4S2NaqtZkzEaZfpA==; incap_ses_109_2267324=Ov4+XgOGiHhdQzerNj+DAZADhGkAAAAAIoGi8QLILbuiUUlE1PoEMg==; incap_ses_109_2778330=8slcB3omAE8gRTerNj+DAZgDhGkAAAAATniO6jvvl+UzHXk2DTUY+Q==; incap_ses_109_2267344=nj+ad2WBe28Gj2KrNj+DAeTPhGkAAAAAEQgrxpR1kIit6mzjPP36bA=="  -H "pragma: no-cache"  -H "priority: u=0, i"   -H "sec-ch-ua:  \ "Not(A:Brand \ ";v= \ "8 \ ",  \ "Chromium \ ";v= \ "144 \ ",  \ "Google Chrome \ ";v= \ "144 \ " "   -H "sec-ch-ua-mobile: ?0 "   -H "sec-ch-ua-platform:  \ "Windows \ " "   -H "sec-fetch-dest: document "   -H "sec-fetch-mode: navigate "   -H "sec-fetch-site: none "   -H "sec-fetch-user: ?1 "   -H "upgrade-insecure-requests: 1 "   -H "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 "  ';
                                         echo '<div style="border:4px solid red;"> salida : <div>';
                                         //passthru( $command);
                                         
                                         
$cookieMax_file_name='cookieMAXCURL7.txt';
$timeOut = 30;

$proxy = "";
$proxyAuth = "";
//$proxy = "131.161.236.45:8082";//HTTP
//$proxy = "170.233.30.33:4153";//SOCKS5
//$proxy = "181.209.125.186:999";//HTTP
//$proxy = "147.75.34.105:443";//HTTPS
//$proxyAuth = "usuario:pass";
                                         
                                         
$userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36';
//$userAgent = 'Mozilla/5.0 (Linux; Android 14) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Mobile Safari/537.36';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, !empty($timeOut)?$timeOut:30);
if( !empty($proxy) ){
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
    if( !empty($proxyAuth) ) curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth);
}
// Set the User-Agent
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
// Follow redirects, as a browser would
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// Handle cookies, which many sites use for session management
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieMax_file_name);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieMax_file_name);
// Set other browser-like headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    "sec-ch-ua: \"Not(A:Brand\";v=\"8\", \"Chromium\";v=\"144\", \"Google Chrome\";v=\"144\"",
    'Accept-Encoding: gzip, deflate, br'
]);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

$response = curl_exec($ch);

curl_close($ch);
//print_r( htmlentities($response) );
$res2 = htmlentities($response);
$f = fopen( __DIR__ .'/anses-res/respuesta_'.time().'.txt','w');
if($f){
    fwrite($f, $response);
    fclose($f);
}
//$res2 = str_replace('script','sss', htmlentities($res2));
$tempRes = [];
$tempRes = explode('<body',$response,2);
$res2 = !empty($tempRes[1])? $tempRes[1] : $res2;
//$res2 = str_replace('action=','action="'.$url.'." ', $res2);

//echo $res2;

function captar_Value($cadena='',$prev_text='',$end_text=''){
    $valor='';
    
    $tempval = explode($prev_text, $cadena, 2);
    
    if( !empty($tempval) && count($tempval) ){
        $tempval = explode($end_text, $tempval[1],2);
        //print_r(['tempval: ', reset($tempval) ]);
        $valor = !empty($tempval)? reset($tempval) : '';
    }
    
    return $valor;
}


$viewstate = captar_Value($res2, 'name="__VIEWSTATE" id="__VIEWSTATE" value="','"');
$viewstategenerator = captar_Value($res2, 'name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="','"');
$eventvalidation = captar_Value($res2, 'name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="','"');

if( !empty($viewstate) && !empty($viewstategenerator) && !empty($eventvalidation) ){
    

$anses_data = [
    '__EVENTTARGET' => '', // Estos suelen estar vacíos a menos que un control específico los use
    '__EVENTARGUMENT' => '',
    '__VIEWSTATE' => $viewstate,
    '__VIEWSTATEGENERATOR' => $viewstategenerator,
    '__EVENTVALIDATION' => $eventvalidation,
    'ctl00$ContentPlaceHolder1$txtDoc' => ( !empty($_GET['doc'])? strval($_GET['doc']) : '28154969'),
    'ctl00$ContentPlaceHolder1$Button1' => 'Continuar',
    'g-recaptcha-response' => '',
    'action' => 'login'
    // Agrega aquí los campos específicos de tu formulario de consulta (ej. CUIL, DNI, etc.)
    // Por ejemplo:
    // 'ctl00$ContentPlaceHolder1$txtCuil' => '20281549694', // Esto es un ejemplo, debes reemplazarlo con los nombres de campo reales del formulario
    // 'ctl00$ContentPlaceHolder1$btnConsultar' => 'Consultar', // Nombre del botón que dispara la acción
];


$resX = " todavia nada. ";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, !empty($timeOut)?$timeOut:30);
if( !empty($proxy) ){
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    //curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
    curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
    if( !empty($proxyAuth) ) curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth);
}
// Set the User-Agent
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
// Follow redirects, as a browser would
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// Handle cookies, which many sites use for session management
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieMax_file_name);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieMax_file_name);
// Set other browser-like headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    "sec-ch-ua: \"Not(A:Brand\";v=\"8\", \"Chromium\";v=\"144\", \"Google Chrome\";v=\"144\"",
    //'Accept-Encoding: gzip, deflate, br'
]);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); // Use CURLOPT_CUSTOMREQUEST for clarity, or rely on CURLOPT_POSTFIELDS setting the method
curl_setopt($ch, CURLOPT_POSTFIELDS, $anses_data );

//curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

$response2 = curl_exec($ch);
curl_close($ch);
//$resX = explode('<body>',$response2)[0];
//$resX = htmlentities( gzdecode($response2) );

//$resX = htmlentities( ($response2) );
$tempRes = [];
$tempRes = explode('<table',$response2,2);
$resX = !empty($tempRes[1])? '<table'.$tempRes[1] :'';

$resXML ='';

if( !empty($resX) ){
$table_data = anses_response_to_Array( str_replace('<head>','<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">', $response2) );

echo '<pre>' . json_encode( $table_data, JSON_PRETTY_PRINT) . '</pre>';
}


echo '<div style="border:2px solid green;margin:10px;">' . print_r([$table_data, $viewstate,$viewstategenerator, $eventvalidation, $resX], true) . '</div>';


$f = fopen(__DIR__ .'/anses-res/respuestaX_'.time().'.txt','w');
if($f){
    fwrite($f, json_encode( $table_data, JSON_PRETTY_PRINT) . "\n\n" . print_r([ $viewstate,$viewstategenerator, $eventvalidation, $response2], true) );
    fclose($f);
}

}

                                         
                                         
                                         
                                         //print_r( file_get_contents($url) );
                                         //$command = 'curl -s ' . $url; // Example command
/*
                                         
$descriptorspec = [
    0 => ['pipe', 'r'],  // stdin is a pipe that the child will read from
    1 => ['pipe', 'w'],  // stdout is a pipe that the child will write to
    2 => ['pipe', 'w'],   // stderr is a pipe that the child will write to
    //3 => ['pipe', 'w'],
];

$cwd = null; // Current working directory (null uses default)
$env = null; // Environment variables (null uses default)

//$process = proc_open($command, $descriptorspec, $pipes, $cwd, $env);

if (is_resource($process)) {
    // $pipes now holds array of file pointers to the pipes
    // 0 => stdin, 1 => stdout, 2 => stderr

    // Read the output from stdout
    $stdout = stream_get_contents($pipes[1]);
    
    // Read the output from stderr (optional, for debugging)
    $stderr .= stream_get_contents($pipes[2]);
    //$stderr .= stream_get_contents($pipes[3]);

    // Close all the pipes
    fclose($pipes[0]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    //fclose($pipes[3]);

    // Close the process and get the return code
    $return_code = proc_close($process);

    echo "STDOUT Output: \n$stdout\n";
    if (!empty($stderr)) {
        echo "STDERR Output: \n$stderr\n";
    }
    echo "Return code: $return_code\n";
} else {
    echo "Failed to open process.";
}


*/
                                         
                                         echo "</div></div>";
                                         exit();
                                }
                            ?>
                            <style id="expansion_staff_duration_temporal_style">
                            
                            
                                    .bookingpress_page_bookingpress_staff_members .el-form-item.custom-staff-duration .el-form-item__label {
                                        width: 100%;
                                    }
                                    .bookingpress_page_bookingpress_staff_members .el-form-item.custom-staff-duration .el-form-item__label {
                                        width: 100%;
                                    }
                                    .bookingpress_page_bookingpress_staff_members .el-form-item.custom-staff-duration .el-form-item__content>.bpa-form-control {
                                        transition: all 0.3s;
                                        opacity: 0.4;
                                        background-color: #d4eff747;
                                        
                                    }
                                    .bookingpress_page_bookingpress_staff_members .el-form-item.custom-staff-duration:has(.is-checked) .el-form-item__content>.bpa-form-control {
                                        opacity: 1;
                                        background-color: transparent;
                                    }
                                    .bookingpress_page_bookingpress_staff_members .custom-staff-duration-col {
                                        display: flex;
                                        justify-content: space-around;
                                    }
                                    .bookingpress_page_bookingpress_staff_members .el-col:has(>.bpa-card__item .custom-staff-duration-col) + .el-col>div {
                                        min-width: 76px;
                                    }
                                    
                                    .bookingpress_page_bookingpress_staff_members .custom-staff-du-tuto:hover:after {
                                        content: ' ';
                                        display: block;
                                        position: absolute;
                                        min-width: 300px;
                                        min-height: 300px;
                                        border-radius: 3px;
                                        box-shadow: 1px 1px 5px lightgray;
                                        background-color: aliceblue;
                                        top: 30px;
                                        right: 10px;
                                        z-index: 2;
                                        background-size: contain;
                                        background-repeat: no-repeat;
                                        background-image: url("/wp-content/plugins/bookingpress-whatsapp/core/classes/bookingmod-src/tuto_duration.gif");
                                        background-image: var(--expansion-tuto-staff-dur);
                                    }
                                    .bookingpress_page_bookingpress_staff_members:has(.custom-staff-du-tuto:hover) .bpa-dc__staff--assigned-service {
                                        overflow: visible;
                                    }
                                    
                                    .force-max-index {
                                        z-index: 10000 !important;
                                    }
                            </style>
                            <?php
                        }, 10);
    //ESTILO TEMPORAL FIN
    
    //do_action( 'bookingpress_staff_assigned_services_column_name' );
    //do_action( 'bookingpress_staff_assigned_services_column_value');
    add_action( 'bookingpress_staff_assigned_services_column_name', function(){
        ?>
        <el-col :xs="06" :sm="06" :md="06" :lg="06" :xl="06" class="custom-staff-duration-col-title" style="position: relative;">
            <!--<span class="material-icons-round custom-staff-du-tuto" style="position: absolute;top: -20px;right: 10px;color: powderblue;cursor: progress;font-size: 18px;color: #a1d9e1;">help</span>-->
			<div class="bpa-card__item">
				<h4 class="bpa-card__item__heading" style="padding: 0 4px;">
                <?php esc_html_e( 'Duraci&oacute;n Personal', 'bookingpress-appointment-booking' ); ?> 
                <span class="material-icons-round custom-staff-du-tuto" style="color: #1ab59b99;cursor: progress;font-size: 15px;position: absolute;margin:2px 4px;">help</span>
                </h4>    
			</div>
		</el-col>
        <?php
    }, 10);
    add_action( 'bookingpress_staff_assigned_services_column_value', function(){
        ?>
        <el-col :xs="06" :sm="06" :md="06" :lg="06" :xl="06">
			<div class="bpa-card__item">
                
				<h4 class="bpa-card__item__heading is--body-heading custom-staff-duration-col" v-if="assigned_service_details.staff_duration_data">
                    <!--<input type="checkbox" :checked="assigned_service_details.staff_duration_data.active? true:false " value="1" disabled/>-->
                    <el-switch class="bpa-swtich-control" v-model="assigned_service_details.staff_duration_data.active" :active-value="1" :inactive-value="0" disabled></el-switch>
                    <span>
                        {{ assigned_service_details.staff_duration_data.d_val }} 
                        {{ (function(staffd = assigned_service_details.staff_duration_data.d_unit){ if(staffd=='d') return 'dias'; if(staffd=='h') return 'horas'; return 'minutos'; })() }}
                    </span>
                
                </h4>
			</div>
		</el-col>
        <?php
    }, 10);
    add_action( 'bookingpress_staff_assigned_services_column_name', function(){
        ?>
        <el-col :xs="06" :sm="06" :md="06" :lg="06" :xl="06" class="staff-serv-particular-col-title" >
            <div class="bpa-card__item">
                
				<h4 class="bpa-card__item__heading">
                <el-tooltip popper-class="force-max-index" content="Solo Particular o Admite Obras Sociales y Particular" open-delay="100">
                <span><?php esc_html_e( 'Modalidad Particular', 'bookingpress-appointment-booking' ); ?></span>
                </el-tooltip>
                </h4>                
			</div>
		</el-col>
        <el-col :xs="06" :sm="06" :md="06" :lg="06" :xl="06" class="orig-serv-duration-col-title" >
            <div class="bpa-card__item">
				<h4 class="bpa-card__item__heading"><?php esc_html_e( 'Duraci&oacute;n Servicio', 'bookingpress-appointment-booking' ); ?></h4>    
			</div>
		</el-col>
        <?php
    }, 9);
    add_action( 'bookingpress_staff_assigned_services_column_value', function(){
        ?>
        <el-col :xs="06" :sm="06" :md="06" :lg="06" :xl="06" class="staff-serv-particular-col" >
			<div class="bpa-card__item">
                
				<h4 class="bpa-card__item__heading is--body-heading" v-if="assigned_service_details.assign_service_id" >                    
                    <el-tooltip popper-class="force-max-index" content="Solo Particular o Admite Obras Sociales y Particular" open-delay="100" style="display: flex;text-align: center;flex-direction: column;align-items: center;min-width: 140px;">
                    <span v-if="!Number(assigned_service_details.staff_only_particular)">
                        <el-tag>Por defecto Servicio</el-tag>
                        <span>{{ (assigned_service_details.service_is_only_particular? 'Solo Particular':'Admitir Todo') }}</span>                                               
                    </span>
                    <span v-if="assigned_service_details.staff_only_particular==1">
                        <el-tag>Por M&eacute;dico</el-tag><span>Solo Particular</span>
                    </span>
                    <span v-if="assigned_service_details.staff_only_particular==2">
                        <el-tag>Por M&eacute;dico</el-tag><span>Admitir Todo</span>
                    </span>
                    </el-tooltip>
                </h4>
			</div>
		</el-col>
        <el-col :xs="06" :sm="06" :md="06" :lg="06" :xl="06" class="orig-serv-duration-col" >
			<div class="bpa-card__item">
                
				<h4 class="bpa-card__item__heading is--body-heading" v-if="assigned_service_details.assign_service_id">                    
                    <span>
                        {{ (function(serv_list_data = bookingpress_service_list.flatMap( serv_list => serv_list.category_services ).find( serv => serv.service_id == assigned_service_details.assign_service_id ) ){ if(!serv_list_data) return 'sin datos'; dur = serv_list_data.service_duration, un = serv_list_data.service_duration_unit;  if(un=='d') return dur+' dias'; if(un=='h') return dur+' horas'; return dur+' minutos'; })() }}
                    </span>
                
                </h4>
			</div>
		</el-col>
        <?php
    }, 9);
    
    
    add_action( 'bookingpress_reset_assign_service_modal_outside', function(){
        ?>
        //vm.assign_service_form.service_is_only_particular = false;
        vm.assign_service_form.staff_only_particular = null;
        let temp_staff_duration = { 's_id': '', 'd_val':5, 'd_unit':'m', active: 0};
        vm.assign_service_form.staff_duration_data = temp_staff_duration;
        //vm.assign_service_form.staff_loco = 2;
        setTimeout(( ) => { 
            if( vm.assign_service_form.is_service_edit && vm.assign_service_form.assign_service_id ){
                vm.assign_service_form.assigned_service_list
                let sel_service = vm.assign_service_form.assigned_service_list.find( assig_serv => assig_serv.assign_service_id == vm.assign_service_form.assign_service_id );
                vm.assign_service_form.staff_duration_data = sel_service ? { ...sel_service.staff_duration_data } : temp_staff_duration;
                vm.assign_service_form.staff_only_particular = sel_service ? Number(sel_service.staff_only_particular) : 0;
            }
            //console.log('time is out', vm.assign_service_form.is_service_edit, vm.assign_service_form.assign_service_id, vm.assign_service_form.is_service_edit?'TRUE':'FALSE' );
        }, 20);
        <?php
    }, 10);
    
    //do_action('bookingpress_assign_custom_services'); evento change service "selected_value" es el id de servicio
    /*
    add_action( 'bookingpress_assign_custom_services', function(){
        ?>
        console.log('change serv', vm.assign_service_form);
        <?php
    }, 2);
    */
    
    add_action( 'bookingpress_modify_assign_service_form_for_edit_staffmember', function(){
        ?>
        vm.assign_service_form.assigned_service_list[index].staff_only_particular = (typeof vm.assign_service_form.staff_only_particular != 'undefined')? vm.assign_service_form.staff_only_particular : 0;
        if( vm.assign_service_form.staff_duration_data && typeof vm.assign_service_form.staff_duration_data != 'undefined'){
            vm.assign_service_form.assigned_service_list[index].staff_duration_data = {...vm.assign_service_form.staff_duration_data};
            vm.assign_service_form.assigned_service_list[index].staff_duration_data.s_id = vm.assign_service_form.assign_service_id;
        }
        <?php
    }, 2);
    add_action( 'bookingpress_modify_assign_service_form_for_staffmember', function(){
        ?>
        bpa_assigned_service_data.staff_only_particular = (typeof vm.assign_service_form.staff_only_particular != 'undefined')? vm.assign_service_form.staff_only_particular : 0;
        if( vm.assign_service_form.staff_duration_data && typeof vm.assign_service_form.staff_duration_data != 'undefined'){
            bpa_assigned_service_data.staff_duration_data = {...vm.assign_service_form.staff_duration_data};
            bpa_assigned_service_data.staff_duration_data.s_id = vm.assign_service_form.assign_service_id;
        }
        <?php
    }, 2);
    
    add_action( 'bookingpress_staff_assign_service_outside_control', function(){
        ?>
        <?php /* v-if="open_assign_service_modal && assign_service_form.assign_service_id"
        
        <!--{{ (function(){ if(assign_service_form.staff_duration_data && typeof assign_service_form.staff_duration_data != 'undefined') return; let sel_service = assign_service_form.assigned_service_list.find(assig_serv=> assig_serv.staff_duration_data.id == assign_service_form.assign_service_id ); assign_service_form.staff_duration_data = sel_service? {...sel_service.staff_duration_data} : { 'id': assign_service_form.assign_service_id, 'd_val':2, 'd_unit':'m', active: 0}; console.log('asignando durdata', assign_service_form); return;})() }}-->
        
        popper-class="bpa-el-select--is-with-navbar"  
        popper-class="bpa-el-select--is-with-modal bpa-service-number-control-dropdown bpa-el-select--is-sm-modal"
        */ ?>
            
            <?php
            /*
            <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
                <el-form-item>
				    <template #label>
						<span class="bpa-form-label"><?php esc_html_e( 'Duraci&oacute;n Personal', 'bookingpress-appointment-booking' ); ?></span>
					</template>
                    <el-input-number class="bpa-form-control bpa-form-control--number" :min="1" :max="999" v-model="assign_service_form.staff_duration_data.d_val" step-strictly></el-input-number>
                </el-form-item>
            </el-col>
    		<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
    			
                <el-form-item>
				    <template #label>
						<span class="bpa-form-label"><?php esc_html_e( 'unit', 'bookingpress-appointment-booking' ); ?></span>
					</template>
                    <el-select class="bpa-form-control" v-model="assign_service_form.staff_duration_data.d_unit" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar"  >
        				<el-option key="m" label="<?php esc_html_e( 'Mins', 'bookingpress-appointment-booking' ); ?>" value="m"></el-option>
        				<el-option key="h" label="<?php esc_html_e( 'Hours', 'bookingpress-appointment-booking' ); ?>" value="h"></el-option>
        				<el-option key="d" label="<?php esc_html_e( 'Days', 'bookingpress-appointment-booking' ); ?>" value="d"></el-option>
        			</el-select>
                </el-form-item>
                
    		</el-col>
            */ ?>
            <el-col v-if="open_assign_service_modal" :xs="24" :sm="24" :md="24" :lg="24" :xl="24" >
                <el-form-item>
                    <template #label>
                        <span class="bpa-form-label" style="display: flex;justify-content: space-between;width: 100%;">
                            Servicio Particular
                        </span>
                    </template>
                    <el-radio-group v-model="assign_service_form.staff_only_particular" @change="$forceUpdate()" style="display: flex;flex-direction: column;margin-left: 20px;">
                        <el-radio :label="0" :key="0">Por defecto del servicio</el-radio>
                        <el-radio :label="1" :key="1">Solo Particular</el-radio>
                        <el-radio :label="2" :key="2">Admitir Todo</el-radio>
                    </el-radio-group>
                </el-form-item>
                <el-form-item class="custom-staff-duration" style="border: 1px solid var(--bpa-gt-gray-400);border-radius: 5px;padding: 10px;">
				    <template #label>
                            <el-tooltip popper-class="force-max-index" effect="dark" content="Habilitar duraci&oacute;n personal." placement="top" open-delay="100" >
                                <span class="bpa-form-label" style="display: flex;justify-content: space-between;width: 100%;">
                                <?php esc_html_e( 'Duraci&oacute;n Personal', 'bookingpress-appointment-booking' ); ?>
                                <el-switch class="bpa-swtich-control" v-model="assign_service_form.staff_duration_data.active" :active-value="1" :inactive-value="0" ></el-switch>
                                <!--<el-checkbox v-model="assign_service_form.staff_duration_data.active" :true-value="1" :false-value="0" ></el-checkbox>-->
                                </span>
                            </el-tooltip>
					</template>
                    
                    <el-input-number class="bpa-form-control bpa-form-control--number" :min="1" :max="999" v-model="assign_service_form.staff_duration_data.d_val" step-strictly></el-input-number>
                    
                    <el-select class="bpa-form-control" v-model="assign_service_form.staff_duration_data.d_unit" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar"  >
        				<el-option key="m" label="<?php esc_html_e( 'Mins', 'bookingpress-appointment-booking' ); ?>" value="m"></el-option>
        				<el-option key="h" label="<?php esc_html_e( 'Hours', 'bookingpress-appointment-booking' ); ?>" value="h"></el-option>
        				<el-option key="d" label="<?php esc_html_e( 'Days', 'bookingpress-appointment-booking' ); ?>" value="d"></el-option>
        			</el-select>
                </el-form-item>
                
    		</el-col>
        
        <?php
    }, 10);



if( isset($_GET['bookingpress-listener']) ){
    if( $_GET['bookingpress-listener'] == 'bpa_pro_mercadopago_url'){}
    
    $f_pagos = fopen(__DIR__ .'/pago_listener.txt','a');
    if( $f_pagos ){
        fwrite($f_pagos, "+++++++++++++++++++++++++++++\n++++++++++++++++++++++++++++\n\n".print_r( array($_REQUEST, $_POST, file_get_contents('php://input') ), true) );
        fclose($f_pagos);
    }
    
}

add_action('plugins_loaded',function(){
    
        
    #echo "<h1>Expansion</h1>";
    
    #echo "<h1>.........." . BPHC_PLUGIN_DIR . "...........</h1>";
    #echo "<h1>.........." . BPHC_PLUGIN_URL . "...........</h1>";
    
    if( file_exists( BPHC_PLUGIN_DIR . 'includes/TABLAS.php' ) ){
        include_once BPHC_PLUGIN_DIR . 'includes/TABLAS.php';
    }
    
    
    if( is_admin() && file_exists( BPHC_PLUGIN_DIR . 'includes/class.expansion-modules.php' ) ){
        include_once BPHC_PLUGIN_DIR . 'includes/class.expansion-modules.php';
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




/*
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
            
            #extra
            add_action( 'bookingpress_save_staff_member', array( $this, 'add_data_to_save_staff_member_vue_method' ), 10 );
            #extra
            add_action( 'bookingpress_staff_member_external_vue_methods', array( $this, 'add_staff_manage_methods' ), 10);
            #extra
            add_action( 'bookingpress_staff_work_hour_content_outside', array($this, 'add_staff_manage_content'), 10);
            #$bookingpress_staff_member_vue_data_fields = apply_filters('bookingpress_modify_staffmember_data_fields', $bookingpress_staff_member_vue_data_fields);
            
            remove_action( 'bookingpress_modify_default_off_days', array( $bookingpress_pro_staff_members, 'bookingpress_staff_working_hours_daysoff' ) );
            remove_filter( 'bookingpress_modify_default_off_days', array( $bookingpress_pro_staff_members, 'bookingpress_staff_working_hours_daysoff' ) );
            
            add_filter( 'bookingpress_modify_default_off_days', array( $this, 'bookingpress_staff_working_hours_daysoff' ), 4, 4 );
            
            //Add dates to disable date if service duration is days
                //Comentado - pero asignada la nueva tabla y condicion de servicio - si llega a ser necesario activarlo.
            add_filter('bookingpress_modify_disable_dates', array($this, '__bookingpress_modify_disable_dates_func'), 5, 4);
            
            
            #######REMOVER Y AGREGAR 
            //NO VA ESTO--->>>> add_filter( 'bookingpress_modify_disable_dates_with_staffmember', array( $this, 'bookingpress_modify_disable_dates_with_staffmember_func' ), 5, 3 );
            
            
            remove_action( 'wp_ajax_bookingpress_retrieve_staffmember_shift_managment_data', array( $bookingpress_pro_staff_members, 'bookingpress_retrieve_staffmember_shift_managment_data_func' ) );
                   add_action( 'wp_ajax_bookingpress_retrieve_staffmember_shift_managment_data', array( $this, 'bookingpress_retrieve_staffmember_shift_managment_data_func' ), 10 );
                   
            remove_action( 'wp_ajax_bookingpress_add_staff_member', array( $bookingpress_pro_staff_members, 'bookingpress_add_staff_member_func' ) );
                   add_action( 'wp_ajax_bookingpress_add_staff_member', array( $this, 'bookingpress_add_staff_member_func' ), 10 );
                                      
            remove_filter( 'bookingpress_retrieve_pro_modules_timeslots', array( $bookingpress_pro_staff_members, 'bookingpress_retrieve_staffmember_timings' ) );
                   add_filter( 'bookingpress_retrieve_pro_modules_timeslots', array( $this, 'bookingpress_retrieve_staffmember_timings' ), 10, 6 );
            
            #extra
            add_action( 'wp_ajax_bpexp_update_specifict_workhour_before_Edit', array($this, 'update_specifict_workhour_before_Edit'), 10);
            
            /** TOMAR LA PETICION DESDE LA FECHA ACTUAL -- Esto busca corregir que dias previos a la fecha seleccionada figuren como habilitado aunq no permita reservar por horarios no disponibles. */
            add_action('wp_ajax_bookingpress_get_disable_date', function(){
                // simplemente establecemos el selected date siempre al dia actual.
                if( !empty($_REQUEST['selected_date']) ) $_REQUEST['selected_date'] = date("Y-m-d");
            }, 8);
            
            
            //2025/09/23 Modify working hours en pro-bp-appointment_bookings object -- actua antes y quita su filtro dentro de esta funcion
            add_filter('bookingpress_modify_working_hours', array($this, 'bookingpress_modify_working_hours_func'), 5, 3);
            #2025/09/23 ESTA PRIORIDAD PARA VER DESPUES DE LOS OTROS FILTOS
            #add_filter('bookingpress_modify_working_hours', [$this, 'bpress_get_default_dayoff_dates_break_days'], 20, 3 );
        }
        
        function bpress_get_default_dayoff_dates_break_days($break_days, $bookingpress_selected_service,$bookingpress_selected_staffmember_id){
                        
            global $wpdb, $tbl_bookingpress_default_daysoff, $tbl_bookingpress_default_workhours;
            
            global $tbl_expansion_staff_member_workhours;
            $service_id = absint( $bookingpress_selected_service );
            $and_where_service = "  AND service_id = {$service_id} ";

            #### ***** PARECE QUE OTRO FILTRO LO TOMA Y MODIFICA ANTES (AL break_days)**** #### 
            
            $bpa_default_hours_with_nobreak = wp_cache_get( 'bookingpress_default_workhours_without_break' );
            if( false === $bpa_default_hours_with_nobreak ){
                $bookingpress_workhours_data = $wpdb->get_results("SELECT * FROM {$tbl_bookingpress_default_workhours} WHERE bookingpress_is_break = 0", ARRAY_A);// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_default_workhours is table name defined globally. False alarm
                wp_cache_set( 'bookingpress_default_workhours_without_break', $bookingpress_workhours_data );
            } else {
                $bookingpress_workhours_data = $bpa_default_hours_with_nobreak;
            }
            
            $is_monday_break             = 0;
            $is_tuesday_break            = 0;
            $is_wednesday_break          = 0;
            $is_thursday_break           = 0;
            $is_friday_break             = 0;
            $is_saturday_break           = 0;
            $is_sunday_break             = 0;

            foreach ( $bookingpress_workhours_data as $workhour_key => $workhour_val ) {
                $bookingpress_start_time = $workhour_val['bookingpress_start_time'];
                $bookingpress_end_time   = $workhour_val['bookingpress_end_time'];
                if ($workhour_val['bookingpress_workday_key'] == 'monday' && ( $bookingpress_start_time == null || $bookingpress_end_time == null ) ) {
                    $is_monday_break = 1;
                } elseif ($workhour_val['bookingpress_workday_key'] == 'tuesday' && ( $bookingpress_start_time == null || $bookingpress_end_time == null ) ) {
                    $is_tuesday_break = 1;
                } elseif ($workhour_val['bookingpress_workday_key'] == 'wednesday' && ( $bookingpress_start_time == null || $bookingpress_end_time == null ) ) {
                    $is_wednesday_break = 1;
                } elseif ($workhour_val['bookingpress_workday_key'] == 'thursday' && ( $bookingpress_start_time == null || $bookingpress_end_time == null ) ) {
                    $is_thursday_break = 1;
                } elseif ($workhour_val['bookingpress_workday_key'] == 'friday' && ( $bookingpress_start_time == null || $bookingpress_end_time == null ) ) {
                    $is_friday_break = 1;
                } elseif ($workhour_val['bookingpress_workday_key'] == 'saturday' && ( $bookingpress_start_time == null || $bookingpress_end_time == null ) ) {
                    $is_saturday_break = 1;
                } elseif ($workhour_val['bookingpress_workday_key'] == 'sunday' && ( $bookingpress_start_time == null || $bookingpress_end_time == null ) ) {
                    $is_sunday_break = 1;
                }
            }

            $break_days = array();
            $break_days['monday'] = $is_monday_break;
            $break_days['tuesday'] = $is_tuesday_break;
            $break_days['wednesday'] = $is_wednesday_break;
            $break_days['thursday'] = $is_thursday_break;
            $break_days['friday'] = $is_friday_break;
            $break_days['saturday'] = $is_saturday_break;
            $break_days['sunday'] = $is_sunday_break;
            
            
            #### ***** PARECE QUE OTRO FILTRO LO TOMA Y MODIFICA ANTES (AL break_days)**** #### 
            wp_send_json(array(
            'variant' => 'error',
            'maxiii_breaks' => $break_days,
            'maxiii_bookingpress_selected_service'=> $bookingpress_selected_service,
            'cachedata' => wp_cache_get( 'bookingpress_default_workhours_without_break' ),
            ));
            die();
                        
            return array_merge($break_days,
                array(
                'variant' => 'error',
                'maxiii_breaks' => $break_days,
                'maxiii_bookingpress_selected_service'=> $bookingpress_selected_service,
                'cachedata' => wp_cache_get( 'bookingpress_default_workhours_without_break' ),
                )
            );
        }
        
        
        /**
		 * Add dates to disable date if service duration is days
		 *
		 * @param  mixed $response
		 * @param  mixed $bookingpress_selected_service
		 * @param  mixed $bookingpress_selected_date
		 * @param  mixed $bookingpress_appointment_data
		 * @return void
		 */
		function __bookingpress_modify_disable_dates_func($response, $bookingpress_selected_service, $bookingpress_selected_date, $bookingpress_appointment_data){

			global $wpdb, $BookingPress, $tbl_bookingpress_staff_member_workhours, $bookingpress_services, $bookingpress_pro_staff_members, $tbl_bookingpress_staffmembers_daysoff, $tbl_bookingpress_service_special_day, $tbl_bookingpress_staffmembers_special_day, $tbl_bookingpress_staffmembers_special_day, $tbl_bookingpress_default_special_day, $tbl_bookingpress_servicesmeta,$tbl_bookingpress_service_workhours, $tbl_bookingpress_appointment_bookings, $tbl_bookingpress_service_daysoff;
#print_r($response ); exit;
            //Removemos el filtro original.
            global $bookingpress_pro_appointment_bookings;
            remove_filter('bookingpress_modify_disable_dates', array($bookingpress_pro_appointment_bookings, 'bookingpress_modify_disable_dates_func') );

			$bookingpress_disable_dates = $response;
			$bookingpress_new_disable_dates_arr = array();

			$bookingpress_selected_staffmember_id = !empty($bookingpress_appointment_data['bookingpress_selected_staff_member_details']['selected_staff_member_id']) ? intval($bookingpress_appointment_data['bookingpress_selected_staff_member_details']['selected_staff_member_id']) : 0;

			if($bookingpress_selected_staffmember_id == 0 && isset($bookingpress_appointment_data['bookingpress_selected_staffmember'])){
				$bookingpress_selected_staffmember_id = !empty($bookingpress_appointment_data['bookingpress_selected_staffmember'])?intval($bookingpress_appointment_data['bookingpress_selected_staffmember']):0;
			}

			//Allow default special days dates
			$bookingpress_default_special_days = $wpdb->get_results( "SELECT * FROM {$tbl_bookingpress_default_special_day}" , ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_default_special_day is table name defined globally. False alarm
			if(!empty($bookingpress_default_special_days) && is_array($bookingpress_default_special_days)){
				foreach($bookingpress_default_special_days as $k => $v){
					$bookingpress_start_date = date('c', strtotime($v['bookingpress_special_day_start_date']));
					$bookingpress_end_date = date('c', strtotime($v['bookingpress_special_day_end_date']));

					foreach($bookingpress_disable_dates as $k2 => $v2){
						if($v2 >= $bookingpress_start_date && $v2 <= $bookingpress_end_date){
							unset($bookingpress_disable_dates[$k2]);
						}
					}
				}
			}

			//Disable service level holidays
			$retrieve_daysoff = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$tbl_bookingpress_service_daysoff} WHERE bookingpress_service_id = %d", $bookingpress_selected_service ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_service_daysoff is table name defined globally. False Positive alarm
			if( !empty( $retrieve_daysoff ) ){

				$get_period_available_for_booking = $BookingPress->bookingpress_get_settings('period_available_for_booking', 'general_setting');
				if( empty( $get_period_available_for_booking ) || !$BookingPress->bpa_is_pro_active() ){
					$get_period_available_for_booking = 365;
				}

				$bookingpress_start_date = date('Y-m-d', current_time('timestamp') );

				/** Modify get available time of booking if the service expiration time is set */
				$get_period_available_for_booking = apply_filters( 'bookingpress_modify_max_available_time_for_booking', $get_period_available_for_booking, $bookingpress_start_date, $bookingpress_selected_service );

				$bookingpress_end_date = date('Y-m-d', strtotime( '+' . $get_period_available_for_booking . ' days') );

				foreach( $retrieve_daysoff as $daysoff_details_val ){
					if( 0 == $daysoff_details_val['bookingpress_service_daysoff_repeat' ] ){
						array_push( $bookingpress_disable_dates, date('c', strtotime( $daysoff_details_val['bookingpress_service_daysoff_date'] ) ) );
					} else {
						$daysoff_start_date = date('Y-m-d', strtotime( $daysoff_details_val['bookingpress_service_daysoff_date'] ) );
						if( $daysoff_start_date >= $bookingpress_end_date ){
							continue;
						}
						$daysoff_end_date = date( 'Y-m-d', strtotime( $daysoff_details_val['bookingpress_service_daysoff_enddate'] ) );

						$bpa_do_frequency = !empty( $daysoff_details_val['bookingpress_service_daysoff_repeat_frequency'] ) ? $daysoff_details_val['bookingpress_service_daysoff_repeat_frequency'] : 1;
						$bpa_do_frequency_type = !empty( $daysoff_details_val['bookingpress_service_daysoff_repeat_frequency_type'] ) ? $daysoff_details_val['bookingpress_service_daysoff_repeat_frequency_type'] : 'yearly';

						if( 'week' == $bpa_do_frequency_type ){
							$bpa_do_frequency_type = 'weekly';
						} else if( 'month' == $bpa_do_frequency_type ){
							$bpa_do_frequency_type = 'monthly';
						} else if( 'day' == $bpa_do_frequency_type ){
							$bpa_do_frequency_type = 'daily';
						} else if( 'year' == $bpa_do_frequency_type ){
							$bpa_do_frequency_type = 'yearly';
						}

						$bpa_do_duration = $daysoff_details_val['bookingpress_service_daysoff_repeat_duration'];

						if( 'until' == $bpa_do_duration && strtotime( $daysoff_start_date ) >= strtotime( $daysoff_details_val['bookingpress_service_daysoff_repeat_date'] ) ){
							continue;
						}

						$bpa_do_repeat_obj = new BookingPress_Repeat_Holiday();
						
						$bpa_do_repeat_obj->startDate( new DateTime( $daysoff_start_date ) );
						$bpa_do_repeat_obj->freq( $bpa_do_frequency_type );

						$bpa_do_repeat_obj->interval( $bpa_do_frequency );

						if( 'forever' == $bpa_do_duration ){
							$bpa_do_repeat_obj->until( new DateTime( $bookingpress_end_date ) );
						} else if( 'no_of_times' == $bpa_do_duration ){
							$bpa_do_repeat_obj->count( $daysoff_details_val['bookingpress_service_daysoff_repeat_times'] );
						} else if( 'until' == $bpa_do_duration ){
							$bpa_do_repeat_obj->until( new DateTime( $daysoff_details_val['bookingpress_service_daysoff_repeat_date'] ) );
						}

						$use_multiple_dates = false;
						$days_interval = 0;
						if( $daysoff_start_date != $daysoff_end_date ){
							$begin_date = new DateTime( $daysoff_start_date );
							$end_date = new DateTime( $daysoff_end_date );
							$interval = $begin_date->diff($end_date);
							if( !empty( $interval->d ) && 1 <= $interval->d ){
								$use_multiple_dates = true;
								$days_interval = $interval->d;
							}
						}

						$bpa_do_repeat_obj->generateOccurrences();

						$all_repeated_days = $bpa_do_repeat_obj->occurrences;

						if( !empty( $all_repeated_days ) ){
							foreach( $all_repeated_days as $off_days ){
	
								if( true == $use_multiple_dates ){
									$st_date = new DateTime( $off_days->format('Y-m-d' ) );
									$en_date = new DateTime( date('Y-m-d', strtotime( $off_days->format('Y-m-d' ) . ' +'.( $days_interval + 1).' days' ) ) );
	
									$interval = DateInterval::createFromDateString('1 day');
									$period = new DatePeriod($st_date, $interval, $en_date );
									foreach ($period as $dt) {
										array_push( $bookingpress_disable_dates, $dt->format('c') );
									}
								} else {
									array_push( $bookingpress_disable_dates, $off_days->format('c') );
								}
							}
						}
					}
				}
			}

			//Allow service level special days dates
			$bookingpress_service_special_days = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_service_special_day} WHERE bookingpress_service_id = %d", $bookingpress_selected_service), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_default_special_day is table name defined globally. False alarm
			if(!empty($bookingpress_service_special_days) && is_array($bookingpress_service_special_days)){
				foreach($bookingpress_service_special_days as $k => $v){
					$bookingpress_start_date = date('c', strtotime($v['bookingpress_special_day_start_date']));
					$bookingpress_end_date = date('c', strtotime($v['bookingpress_special_day_end_date']));

					foreach($bookingpress_disable_dates as $k2 => $v2){
						if($v2 >= $bookingpress_start_date && $v2 <= $bookingpress_end_date){
							unset($bookingpress_disable_dates[$k2]);
						}
					}
				}
			}
			
			if($bookingpress_pro_staff_members->bookingpress_check_staffmember_module_activation() && !empty($bookingpress_selected_staffmember_id)){

				/** If staff member working hours is off then also add that date to disable date */
				
				$is_staffmember_workhour_enable = $bookingpress_pro_staff_members->get_bookingpress_staffmembersmeta($bookingpress_selected_staffmember_id, 'bookingpress_configure_specific_workhour');

				if( "true" == $is_staffmember_workhour_enable ){
				    /** 
					global $tbl_bookingpress_staff_member_workhours;
					$bookingpress_disabled_workhours = $wpdb->get_results( $wpdb->prepare( "SELECT bookingpress_staffmember_workday_key FROM {$tbl_bookingpress_staff_member_workhours} WHERE bookingpress_staffmember_id = %d AND bookingpress_staffmember_workhours_start_time IS NULL", $bookingpress_selected_staffmember_id ) ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staff_member_workhours is a table name. false alarm
					*/
                    global $tbl_expansion_staff_member_workhours;
                    $service_id = absint( $bookingpress_selected_service );
                    $and_where_service = $service_id? "  AND service_id = {$service_id} ": "";
                    
					$bookingpress_disabled_workhours = $wpdb->get_results( $wpdb->prepare( "SELECT bookingpress_staffmember_workday_key FROM {$tbl_expansion_staff_member_workhours} WHERE bookingpress_staffmember_id = %d {$and_where_service} AND bookingpress_staffmember_workhours_start_time IS NULL", $bookingpress_selected_staffmember_id ) );
                    
					$bpa_staffmember_disable_day = array();
					if( !empty( $bookingpress_disabled_workhours ) ){
						foreach( $bookingpress_disabled_workhours as $disable_dates ){
							$bpa_staffmember_disable_day[] = $disable_dates->bookingpress_staffmember_workday_key;
						}
						
						$bookingpress_max_days_for_booking          = $BookingPress->bookingpress_get_settings( 'period_available_for_booking', 'general_setting' );
						
						$current_site_date = date('Y-m-d', current_time( 'timestamp') );
						$max_avaialble_date = date('Y-m-d', strtotime( '+' . $bookingpress_max_days_for_booking . ' days' ) );

						$start_date = new DateTime( $current_site_date );
						$end_date = new DateTime( $max_avaialble_date );

						$interval = DateInterval::createFromDateString('1 day');
						$period = new DatePeriod( $start_date, $interval, $end_date );
						
						foreach( $period as $dt ){
							$current_date = $dt->format("c");
							$current_day_name = $dt->format('l');
							if( !in_array( $current_date, $bookingpress_disable_dates ) && in_array( $current_day_name, $bpa_staffmember_disable_day ) ){
								array_push( $bookingpress_disable_dates, $current_date );
							}
						}

					}					
				}
				

				// If staff member has any days off added then also add that date to disable dates
				$bookingpress_staffmember_daysoff = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_staffmembers_daysoff} WHERE bookingpress_staffmember_id = %d", $bookingpress_selected_staffmember_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staffmembers_daysoff is table name defined globally. False alarm
				if(!empty($bookingpress_staffmember_daysoff) && is_array($bookingpress_staffmember_daysoff) ){
					foreach($bookingpress_staffmember_daysoff as $k => $v){
						$bookingpress_daysoff_date = $v['bookingpress_staffmember_daysoff_date'];
						$bookingpress_tmp_daysoff_date = date('c', strtotime($bookingpress_daysoff_date));
						$dayoff_year = date('Y', strtotime($bookingpress_daysoff_date));
						$default_year = date('Y', current_time('timestamp'));

						if (empty($v['bookingpress_staffmember_daysoff_repeat']) && !in_array($bookingpress_tmp_daysoff_date, $bookingpress_new_disable_dates_arr) ) {
							array_push($bookingpress_new_disable_dates_arr, $bookingpress_tmp_daysoff_date);
						}else{
							for($i = $default_year; $i <= 2035; $i++){
								$daysoff_new_date_month = $i . '-' . date('m-d', strtotime($bookingpress_daysoff_date));
								$daysoff_new_date_month_tmp = date('c', strtotime($daysoff_new_date_month));
								if(!in_array($daysoff_new_date_month_tmp, $bookingpress_new_disable_dates_arr)){
									array_push($bookingpress_new_disable_dates_arr, $daysoff_new_date_month_tmp);
								}
							}
						}
					}
				}

				if( !empty( $bookingpress_new_disable_dates_arr ) ){
					$bookingpress_disable_dates = array_merge($bookingpress_disable_dates,$bookingpress_new_disable_dates_arr);
				}
				
				//Check if any special day added or not
				$bookingpress_staff_special_days = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_staffmembers_special_day} WHERE bookingpress_staffmember_id = %d AND (bookingpress_special_day_service_id LIKE %s OR bookingpress_special_day_service_id = '')", $bookingpress_selected_staffmember_id, '%'.$bookingpress_selected_service.'%'), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staffmembers_special_day is table name defined globally. False alarm

				if(!empty($bookingpress_staff_special_days) && is_array($bookingpress_staff_special_days)){
					foreach($bookingpress_staff_special_days as $k3 => $v3){
						$bookingpress_special_day_start_date = date('c', strtotime($v3['bookingpress_special_day_start_date']));
						$bookingpress_special_day_end_date = date('c', strtotime($v3['bookingpress_special_day_end_date']));

						foreach($bookingpress_disable_dates as $k4 => $v4){
						if($v4 >= $bookingpress_special_day_start_date && $v4 <= $bookingpress_special_day_end_date){
								unset($bookingpress_disable_dates[$k4]);
							}
						}
					}
				}				

				/** disable date if another service is booked on the date and the selected service unit is in days */

				if( !empty( $bookingpress_appointment_data['selected_service_duration_unit'] ) && 'd' == $bookingpress_appointment_data['selected_service_duration_unit']  ){

					$first_date_of_month = date('Y-m', current_time('timestamp') ) . '-01';
					$get_period_available_for_booking = $BookingPress->bookingpress_get_settings('period_available_for_booking', 'general_setting');
					
					$last_date_of_month = date('Y-m-t', strtotime( $first_date_of_month . '+' . $get_period_available_for_booking . ' days' ) );
					
					$start_date = new DateTime( $first_date_of_month );
					$end_date = new DateTime( $last_date_of_month );
					
					$interval = DateInterval::createFromDateString('1 day');
					$period = new DatePeriod( $start_date, $interval, $end_date );

					foreach( $period as $dt ){
						$current_date = $dt->format("Y-m-d H:i:s");
						$date_t = date('c', strtotime( $current_date ) );
						
						if( !in_array( $date_t, $bookingpress_disable_dates ) ){
							$current_sel_date = $dt->format('Y-m-d');
							$get_appointments = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_appointment_date = %s AND bookingpress_staff_member_id = %d AND bookingpress_service_id != %d AND (bookingpress_appointment_status = %s OR bookingpress_appointment_status = %s)", $current_sel_date, $bookingpress_selected_staffmember_id, $bookingpress_selected_service, '1', '2' ) ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
							if( !empty( $get_appointments ) ){
								foreach( $get_appointments as $appointment_dt ){

									$service_duration = $appointment_dt->bookingpress_service_duration_val;
									$service_duration_unit = $appointment_dt->bookingpress_service_duration_unit;
									if( 1 < $service_duration && $service_duration_unit == 'd' ){		
										$tmp_start_date = $current_sel_date;
										$tmp_end_date = date('Y-m-d', strtotime( $current_sel_date . '+' . $service_duration . ' days' ) );
										
										$tstart_date = new DateTime( $tmp_start_date );
										$tend_date = new DateTime( $tmp_end_date );
										
										$tinterval = DateInterval::createFromDateString('1 day');
										$tperiod = new DatePeriod( $tstart_date, $tinterval, $tend_date );
										
										foreach( $tperiod as $tdt ){
											$tcurrent_date = $tdt->format("c");
											array_push( $bookingpress_disable_dates, $tcurrent_date );
										}
									} else {
										array_push( $bookingpress_disable_dates, $date_t );
									}
								}
							}
						}
					}
				}				
			}

			//Get service minimum time required and disabled dates if minimium time is greater than or equal to 24 hours
			//---------------------------------------------------------------------------
			//$bookingpress_minimum_time_required_for_booking = $bookingpress_services->bookingpress_get_service_meta( $bookingpress_selected_service, 'minimum_time_required_before_booking' ); // Selected service meta value
			$bookingpress_minimum_time_required_for_booking = 'disabled';
            $bookingpress_minimum_time_required_for_booking = apply_filters( 'bookingpress_retrieve_minimum_required_time', $bookingpress_minimum_time_required_for_booking, $bookingpress_selected_service );

			
			if ( $bookingpress_minimum_time_required_for_booking != 'disabled' && $bookingpress_minimum_time_required_for_booking >= 1440 ) {
				$bookingpress_total_days = intval( $bookingpress_minimum_time_required_for_booking ) / 1440;

				/** reputelog - need to confirm this change with every aspects */
				$booking_date_timestamp = strtotime( $bookingpress_selected_date . ' 23:59:59' );
				
				$bookingpress_current_date           = date( 'Y-m-d H:i:s', current_time( 'timestamp' ) );
				$bookingpress_current_date_timestamp = strtotime( $bookingpress_current_date );
				
				if ( $booking_date_timestamp == $bookingpress_current_date_timestamp ) {
					if(!in_array($booking_date_timestamp, $bookingpress_new_disable_dates_arr)){
						array_push( $bookingpress_new_disable_dates_arr, date( 'c', $booking_date_timestamp ) );
					}					
					for ( $i = 1; $i <= $bookingpress_total_days; $i++ ) {
						$bookingpress_next_date = date( 'c', strtotime( '+' . $i . 'days', $bookingpress_current_date_timestamp ) );
						if(!in_array($bookingpress_next_date, $bookingpress_new_disable_dates_arr)){
							if( !empty( $bookingpress_appointment_data['selected_service_duration_unit'] ) && 'd' == $bookingpress_appointment_data['selected_service_duration_unit']  ){
								$bookingpress_next_date = date( 'Y-m-d', strtotime( '+' . $i . 'days', $bookingpress_current_date_timestamp ) ).'T00:00:00+00:00';
							}
							array_push( $bookingpress_new_disable_dates_arr, $bookingpress_next_date );
						}
					}
				} else {

					/* New Logic For Not Disable Day Issue When Back Button Press */										
					$bookingpress_date_diff_in_minutes = round( abs( $booking_date_timestamp - $bookingpress_current_date_timestamp ) / 60, 2 );					
					if ( $bookingpress_date_diff_in_minutes <= $bookingpress_minimum_time_required_for_booking ) {
						if(!in_array($booking_date_timestamp, $bookingpress_new_disable_dates_arr)){	
							if( !empty( $bookingpress_appointment_data['selected_service_duration_unit'] ) && 'd' == $bookingpress_appointment_data['selected_service_duration_unit']  ){
								array_push( $bookingpress_new_disable_dates_arr, date( 'Y-m-d', $booking_date_timestamp ).'T00:00:00+00:00' );
							}else{
								array_push( $bookingpress_new_disable_dates_arr, date( 'c', $booking_date_timestamp ) );
							}							
						}																		
						for ( $i = 1; $i < $bookingpress_total_days; $i++ ) {
							$bookingpress_next_date = date( 'c', strtotime( '+' . $i . 'days', $bookingpress_current_date_timestamp ) );
							if(!in_array($bookingpress_next_date, $bookingpress_new_disable_dates_arr)){
								if( !empty( $bookingpress_appointment_data['selected_service_duration_unit'] ) && 'd' == $bookingpress_appointment_data['selected_service_duration_unit']  ){
									$bookingpress_next_date = date( 'Y-m-d', strtotime( '+' . $i . 'days', $bookingpress_current_date_timestamp ) ).'T00:00:00+00:00';
								}
								array_push( $bookingpress_new_disable_dates_arr, $bookingpress_next_date );
							}
						}
					}else{
						/* New Logic For Not Disable Days In Day Service When Back Button Press */												
						$booking_date_timestamp_new = strtotime(date( 'Y-m-d', $bookingpress_current_date_timestamp ). ' 23:59:59');
						if(!in_array($booking_date_timestamp_new, $bookingpress_new_disable_dates_arr)){	
							if( !empty( $bookingpress_appointment_data['selected_service_duration_unit'] ) && 'd' == $bookingpress_appointment_data['selected_service_duration_unit']  ){
								array_push( $bookingpress_new_disable_dates_arr, date( 'Y-m-d', $bookingpress_current_date_timestamp ).'T00:00:00+00:00' );
							}else{
								array_push( $bookingpress_new_disable_dates_arr, date( 'c', $bookingpress_current_date_timestamp ) );
								array_push( $bookingpress_new_disable_dates_arr, date( 'Y-m-d', $bookingpress_current_date_timestamp ).'T00:00:00+00:00' );
							}							
						}
						for ( $i = 1; $i < $bookingpress_total_days; $i++ ) {
							$bookingpress_next_date = date( 'c', strtotime( '+' . $i . 'days', $bookingpress_current_date_timestamp ) );
							if(!in_array($bookingpress_next_date, $bookingpress_new_disable_dates_arr)){
								if( !empty( $bookingpress_appointment_data['selected_service_duration_unit'] ) && 'd' == $bookingpress_appointment_data['selected_service_duration_unit']  ){
									$bookingpress_next_date = date( 'Y-m-d', strtotime( '+' . $i . 'days', $bookingpress_current_date_timestamp ) ).'T00:00:00+00:00';
									array_push( $bookingpress_new_disable_dates_arr, $bookingpress_next_date );
								}
								array_push( $bookingpress_new_disable_dates_arr, $bookingpress_next_date );
							}
						}						

					}					
				}				
				if( !empty( $bookingpress_new_disable_dates_arr ) ){
					$bookingpress_disable_dates =  array_merge( $bookingpress_disable_dates, $bookingpress_new_disable_dates_arr );
				}
			}
			//---------------------------------------------------------------------------

			/** Disable dates for multiple days event */
			if( !empty( $bookingpress_appointment_data['selected_service_duration_unit'] ) && 'd' == $bookingpress_appointment_data['selected_service_duration_unit'] && 1 < $bookingpress_appointment_data['selected_service_duration'] ){
				$service_duration_val = $bookingpress_appointment_data['selected_service_duration'] - 1;
				$multiple_day_event_disable_dates = array();
				foreach( $bookingpress_disable_dates as $disable_dates ){
					$offday = date('Y-m-d',strtotime($disable_dates) );
					for( $do = $service_duration_val; $do > 0; $do-- ){
						$multiple_day_event_disable_dates[] = date( 'c', strtotime( $disable_dates . '-' . $do . ' days' ));
					}
				}
				if( !empty( $multiple_day_event_disable_dates ) ){
					$bookingpress_disable_dates = array_merge( $bookingpress_disable_dates, $multiple_day_event_disable_dates );
				}
			}
			
			return $bookingpress_disable_dates;

		}
        
        /**
		 * NUEVO -- OBTIENE LOS HORARIOS DEL STAFF PARA LOS SERVICIOS ESPECIFICOS --Y-- SE
         * AJUSTA AL NUEVO REQUERIMIENTO.
         * Modify dates to disable date if service and staff has their own working hours enabled
		 *
		 * @param  mixed $break_days
		 * @param  mixed $bookingpress_selected_service
		 * @param  mixed $bookingpress_selected_staffmember_id
		 * @return void
		 */
		function bookingpress_modify_working_hours_func($break_days, $bookingpress_selected_service,$bookingpress_selected_staffmember_id)
		{
			global $wpdb, $BookingPress, $tbl_bookingpress_staff_member_workhours, $bookingpress_services, $bookingpress_pro_staff_members, $tbl_bookingpress_staffmembers_daysoff, $tbl_bookingpress_service_special_day, $tbl_bookingpress_staffmembers_special_day, $tbl_bookingpress_staffmembers_special_day, $tbl_bookingpress_default_special_day, $tbl_bookingpress_servicesmeta,$tbl_bookingpress_service_workhours;
            
            //Removemos el filtro original.
            global $bookingpress_pro_appointment_bookings;
            remove_filter('bookingpress_modify_working_hours', array($bookingpress_pro_appointment_bookings, 'bookingpress_modify_working_hours_func') );


			if($bookingpress_pro_staff_members-> bookingpress_check_staffmember_module_activation() && !empty($bookingpress_selected_staffmember_id)){
				$bookingpress_is_staff_workhour_enable = $bookingpress_pro_staff_members->get_bookingpress_staffmembersmeta($bookingpress_selected_staffmember_id, 'bookingpress_configure_specific_workhour');

				//if staffmember workhour enable then consider it
				if($bookingpress_is_staff_workhour_enable){
				    
                    global $tbl_expansion_staff_member_workhours;
                    $service_id = absint( $bookingpress_selected_service );
                    $and_where_service = "  AND service_id = {$service_id} ";

					$bookingpress_new_disable_dates_arr = array();
					$bookingpress_staffmember_working_days = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$tbl_expansion_staff_member_workhours} WHERE bookingpress_staffmember_id = %d $and_where_service AND bookingpress_staffmember_workhours_is_break = %d", $bookingpress_selected_staffmember_id, 0 ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staff_member_workhours is table name defined globally. False alarm

					if( !empty( $bookingpress_staffmember_working_days ) ){
						$is_staffmember_monday_break             = 0;
						$is_staffmember_tuesday_break            = 0;
						$is_staffmember_wednesday_break          = 0;
						$is_staffmember_thursday_break           = 0;
						$is_staffmember_friday_break             = 0;
						$is_staffmember_saturday_break           = 0;
						$is_staffmember_sunday_break             = 0;

						foreach( $bookingpress_staffmember_working_days as $staffmember_workhour_key => $staffmember_workhour_val ){
							$bookingpress_staffmember_start_time = $staffmember_workhour_val['bookingpress_staffmember_workhours_start_time'];
							$bookingpress_staffmember_end_time   = $staffmember_workhour_val['bookingpress_staffmember_workhours_end_time'];

							if( 'monday' == strtolower( $staffmember_workhour_val['bookingpress_staffmember_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
								$is_staffmember_monday_break = 1;
							} else if( 'tuesday' == strtolower( $staffmember_workhour_val['bookingpress_staffmember_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
								$is_staffmember_tuesday_break = 1;
							} else if( 'wednesday' == strtolower( $staffmember_workhour_val['bookingpress_staffmember_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
								$is_staffmember_wednesday_break = 1;
							} else if( 'thursday' == strtolower( $staffmember_workhour_val['bookingpress_staffmember_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
								$is_staffmember_thursday_break = 1;
							} else if( 'friday' == strtolower( $staffmember_workhour_val['bookingpress_staffmember_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
								$is_staffmember_friday_break = 1;
							} else if( 'saturday' == strtolower( $staffmember_workhour_val['bookingpress_staffmember_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
								$is_staffmember_saturday_break = 1;
							} else if( 'sunday' == strtolower( $staffmember_workhour_val['bookingpress_staffmember_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
								$is_staffmember_sunday_break = 1;
							}
						}

						$break_days['monday'] = $is_staffmember_monday_break;
						$break_days['tuesday'] = $is_staffmember_tuesday_break;
						$break_days['wednesday'] = $is_staffmember_wednesday_break;
						$break_days['thursday'] = $is_staffmember_thursday_break;
						$break_days['friday'] = $is_staffmember_friday_break;
						$break_days['saturday'] = $is_staffmember_saturday_break;
						$break_days['sunday'] = $is_staffmember_sunday_break;

						return $break_days;
					}
				}
			}

			if( !empty($bookingpress_selected_service)){

					// Get service working hours days
					$bookingpress_service_workhour_enable = $wpdb->get_row( $wpdb->prepare( "SELECT bookingpress_servicemeta_value FROM {$tbl_bookingpress_servicesmeta} WHERE bookingpress_service_id = %d AND bookingpress_servicemeta_name = 'bookingpress_configure_specific_service_workhour'", $bookingpress_selected_service ), ARRAY_A);// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_servicesmeta is table name defined globally. False Positive alarm
#var_dump($bookingpress_service_workhour_enable);
					//if service workhour enable then consider it
					if(is_array($bookingpress_service_workhour_enable) && isset($bookingpress_service_workhour_enable['bookingpress_servicemeta_value']) && $bookingpress_service_workhour_enable['bookingpress_servicemeta_value']){
						$bookingpress_new_disable_dates_arr = array();
						$bookingpress_staffmember_working_days = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$tbl_bookingpress_service_workhours} WHERE bookingpress_service_id = %d AND bookingpress_service_workhours_is_break = %d", $bookingpress_selected_service, 0 ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staff_member_workhours is table name defined globally. False alarm

						if( !empty( $bookingpress_staffmember_working_days ) ){
							$is_staffmember_monday_break             = 0;
							$is_staffmember_tuesday_break            = 0;
							$is_staffmember_wednesday_break          = 0;
							$is_staffmember_thursday_break           = 0;
							$is_staffmember_friday_break             = 0;
							$is_staffmember_saturday_break           = 0;
							$is_staffmember_sunday_break             = 0;

							foreach( $bookingpress_staffmember_working_days as $staffmember_workhour_key => $staffmember_workhour_val ){
								$bookingpress_staffmember_start_time = $staffmember_workhour_val['bookingpress_service_workhours_start_time'];
								$bookingpress_staffmember_end_time   = $staffmember_workhour_val['bookingpress_service_workhours_end_time'];

								if( 'monday' == strtolower( $staffmember_workhour_val['bookingpress_service_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
									$is_staffmember_monday_break = 1;
								} else if( 'tuesday' == strtolower( $staffmember_workhour_val['bookingpress_service_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
									$is_staffmember_tuesday_break = 1;
								} else if( 'wednesday' == strtolower( $staffmember_workhour_val['bookingpress_service_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
									$is_staffmember_wednesday_break = 1;
								} else if( 'thursday' == strtolower( $staffmember_workhour_val['bookingpress_service_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
									$is_staffmember_thursday_break = 1;
								} else if( 'friday' == strtolower( $staffmember_workhour_val['bookingpress_service_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
									$is_staffmember_friday_break = 1;
								} else if( 'saturday' == strtolower( $staffmember_workhour_val['bookingpress_service_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
									$is_staffmember_saturday_break = 1;
								} else if( 'sunday' == strtolower( $staffmember_workhour_val['bookingpress_service_workday_key'] ) && ( null == $bookingpress_staffmember_start_time || null == $bookingpress_staffmember_end_time ) ){
									$is_staffmember_sunday_break = 1;
								}
							}

				            $break_days['monday'] = $is_staffmember_monday_break;
				            $break_days['tuesday'] = $is_staffmember_tuesday_break;
				            $break_days['wednesday'] = $is_staffmember_wednesday_break;
				            $break_days['thursday'] = $is_staffmember_thursday_break;
				            $break_days['friday'] = $is_staffmember_friday_break;
				            $break_days['saturday'] = $is_staffmember_saturday_break;
				            $break_days['sunday'] = $is_staffmember_sunday_break;


				            return $break_days;
						}
					}
			}


			return $break_days;
		}
        
        
        
        
        function bookingpress_staff_working_hours_daysoff( $default_off_days, $selected_service, $selected_service_duration, $selected_staffmember ){

			global $wpdb, $tbl_bookingpress_staff_member_workhours;
            global $tbl_expansion_staff_member_workhours, $bookingpress_pro_staff_members;
            remove_action( 'bookingpress_modify_default_off_days', array( $bookingpress_pro_staff_members, 'bookingpress_staff_working_hours_daysoff' ) );
            remove_filter( 'bookingpress_modify_default_off_days', array( $bookingpress_pro_staff_members, 'bookingpress_staff_working_hours_daysoff' ) );
            
#print_r( ["obtenidos"=>$default_off_days]  ); exit;
			if( empty( $selected_staffmember ) || ( !empty( $default_off_days['skip_check'] ) && true == $default_off_days['skip_check'] ) ){

				/** First check if any staff member is selected */
				if( empty( $default_off_days['skip_check'] ) && empty( $selected_staffmember ) ){
					$appointment_data_obj = $_POST['appointment_data_obj']; //phpcs:ignore
					
					if( !empty( $appointment_data_obj['any_staff_selected'] ) && 1 == $appointment_data_obj['any_staff_selected']){
						$available_staffs = !empty( $appointment_data_obj['available_staffs'] ) ? $appointment_data_obj['available_staffs'] : array();

						if( empty( $available_staffs ) ){
							return $default_off_days;
						}

						$default_off_days['skip_check'] = true;

						$total_staffs = count( $available_staffs );

						$available_staffs_placeholder = 'AND bookingpress_staffmember_id IN (';
						$available_staffs_placeholder .= rtrim( str_repeat( '%s,', count( $available_staffs ) ), ',' );
						$available_staffs_placeholder .= ')';
						
						array_unshift( $available_staffs, $available_staffs_placeholder );

						$staff_query_where = call_user_func_array(array( $wpdb, 'prepare' ), $available_staffs );
                        $and_where_service = " AND service_id = {$selected_service} ";
                        $staff_query_where .= $and_where_service;//AGREGADO SERVICIO_ID
						
						$staff_workdays = $wpdb->get_results( $wpdb->prepare( "SELECT LOWER( bookingpress_staffmember_workday_key ) AS bookingpress_staffmember_workday_key FROM {$tbl_expansion_staff_member_workhours} WHERE bookingpress_staffmember_workhours_is_break = %d AND ( bookingpress_staffmember_workhours_start_time IS NULL OR ( ABS( TIME_TO_SEC( TIMEDIFF( bookingpress_staffmember_workhours_start_time, ( CASE WHEN bookingpress_staffmember_workhours_end_time = '00:00:00' THEN '24:00:00' ELSE bookingpress_staffmember_workhours_end_time END ) ) ) DIV 60 ) < %d ) ) {$staff_query_where} GROUP BY {$tbl_expansion_staff_member_workhours}.bookingpress_staffmember_workday_key HAVING COUNT(bookingpress_staffmember_workday_key) = %d", 0, $selected_service_duration, $total_staffs ), ARRAY_A ); //phpcs:ignore
						
						if( empty( $staff_workdays ) ){
							return $default_off_days;
						}

						$total_off_days = count( $staff_workdays );
						$counter = 0;
						while( 0 < $total_off_days ){

							$default_off_days['off_days'][] = $staff_workdays[ $counter ]['bookingpress_staffmember_workday_key'];

							$total_off_days--;
							$counter++;
						}
					}
				}
				
				return $default_off_days;
			}

			//bookingpress_configure_specific_workhour
			$staff_working_hours = $this->get_bookingpress_staffmembersmeta( $selected_staffmember, 'bookingpress_configure_specific_workhour' );
			if( 'true' == $staff_working_hours ){

				$default_off_days['skip_check'] = true;
                $and_where_service = " AND service_id = {$selected_service} ";

				$staff_workdays = $wpdb->get_results( $wpdb->prepare( "SELECT LOWER( bookingpress_staffmember_workday_key ) AS bookingpress_staffmember_workday_key FROM {$tbl_expansion_staff_member_workhours} WHERE bookingpress_staffmember_id = %d {$and_where_service} AND bookingpress_staffmember_workhours_is_break = %d AND ( bookingpress_staffmember_workhours_start_time IS NULL OR ( ABS( TIME_TO_SEC( TIMEDIFF( bookingpress_staffmember_workhours_start_time, ( CASE WHEN bookingpress_staffmember_workhours_end_time = '00:00:00' THEN '24:00:00' ELSE bookingpress_staffmember_workhours_end_time END ) ) ) DIV 60 ) < %d ) ) ", $selected_staffmember, 0, $selected_service_duration ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_staff_member_workhours is table name defined globally. False Positive alarm 

				#print_r( $staff_workdays ); exit; 
                if( empty( $staff_workdays ) ){
					return $default_off_days;
				}

				$total_off_days = count( $staff_workdays );
				$counter = 0;
				while( 0 < $total_off_days ){

					$default_off_days['off_days'][] = $staff_workdays[ $counter ]['bookingpress_staffmember_workday_key'];

					$total_off_days--;
					$counter++;
				}
			}
			

			//END $tbl_bookingpress_staff_member_workhours - $tbl_expansion_staff_member_workhours
            return $default_off_days;
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
#print_r($default_timeslot_step);exit;
			/** Check for staff member holiday */
			$bpa_get_staff_holiday = $wpdb->get_results( $wpdb->prepare( "SELECT bookingpress_staffmember_id, bookingpress_staffmember_daysoff_date, bookingpress_staffmember_daysoff_repeat FROM {$tbl_bookingpress_staffmembers_daysoff} WHERE ( bookingpress_staffmember_daysoff_date = %s OR bookingpress_staffmember_daysoff_repeat = %d )AND bookingpress_staffmember_id = %d", $selected_date, 1, $bookingpress_selected_staffmember_id ) ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staffmembers_daysoff is a table name.


			#print_r( $bpa_get_staff_holiday ); exit;
            
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


			#var_dump( $service_timings_data ); exit;
            $workhour_data = array();

			/** Check for Staff Member Special Days */
			$bookingpress_staffmember__special_day_details = $BookingPressPro->bookingpress_get_staffmember_special_days(  $bookingpress_selected_staffmember_id, $selected_service_id, $selected_date );
			#var_dump( $bookingpress_staffmember__special_day_details ); exit;
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

				#var_dump( $bookingpress_staffmember_workhours ); exit;
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
			#print_r($service_timings_data );exit; 
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

				if( $bookingpress_action == 'bookingpress_shift_managment' && absint($bookingpress_update_id) ) {
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
                        #if(!$delete_all_workHours) $bookingpress_delete_staff_workhours_where_condition['service_id'] = $selected_staff_service;
                        
                        
						$bookingpress_delete_staff_workhours_where_condition = apply_filters('bookingpress_delete_staff_workhours_where_condition_filter', $bookingpress_delete_staff_workhours_where_condition, $_REQUEST);
                        
                        $bookingpress_delete_staff_workhours_where_condition['service_id'] = $selected_staff_service;
						$wpdb->delete( $tbl_expansion_staff_member_workhours, $bookingpress_delete_staff_workhours_where_condition );

						$bookingpress_delete_staff_workhours_break_where_condition = array(
							'bookingpress_staffmember_id' => $bookingpress_update_id,
							'bookingpress_staffmember_workhours_is_break' => 1,
						);
                        #if(!$delete_all_workHours) $bookingpress_delete_staff_workhours_break_where_condition['service_id'] = $selected_staff_service;
                        
						$bookingpress_delete_staff_workhours_break_where_condition = apply_filters('bookingpress_delete_staff_workhours_break_where_condition_filter', $bookingpress_delete_staff_workhours_break_where_condition, $_REQUEST);
                        
                        $bookingpress_delete_staff_workhours_break_where_condition['service_id'] = $selected_staff_service;
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
                                
                                $bookingpress_db_fields['service_id'] = $selected_staff_service;
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
                                        
                                        $bookingpress_db_fields['service_id'] = $selected_staff_service;
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
                #print_r( $response['daysoff_data'] );

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
            $request_manage_staff = false;
            if( isset($_REQUEST['page']) ){
                if( $_REQUEST['page'] == 'bookingpress_staff_members') $request_manage_staff = true;
            }
            
            if(!$request_manage_staff) return;
            
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
                    *Cuidado! Revisa todos los servicios asignados. Si existen configuraciones de servicio para un solo medico volver a ajustar el horario de servicio tanto para sus días y horario completo.<br>
                    <br>
                    *Vacaciones Y Días especiales, tras añadir/editar uno u varios requiere presionar el botón [guardar] superior para guardar en el sistema.
                </div>
                <div style="padding: 20px;">
                    <span class="bpa-form-label"><?php esc_html_e( 'Service', 'bookingpress-appointment-booking' ); ?></span>
        			<el-select ref="selectServiceWH" @visible-change="bpExp_selectVisibleChange" @change="bpExp_reload_currentStaff_shift_modal" class="bpa-form-control bpa-from-select-tab" v-model="gestionWorkH_selected_service_id" filterable collapse-tags  placeholder="<?php esc_html_e( 'Select Service', 'bookingpress-appointment-booking' ); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
        			   <el-option key="0" value="0" label="Seleccionar servicio "></el-option>
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
                           //vm.$forceUpdate();
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
                    if(Number(edit_id)) vm.bookingpress_open_shift_management_modal( edit_id, is_configure_specific_workhour, 'from_bpexp_reload');
                    //console.log('llamado open shift fin__');
                },5);
                
                
            },
            bpExp_selectVisibleChange(isVisible){
                console.log(isVisible);
                if(isVisible){
                    //this.saveShiftManagementDetails( 'is_select_service' );
                }
            },
            
            bookingpress_open_shift_management_modal(edit_id, is_configure_specific_workhour = false, from_bpexp=''){
					const vm = this;
                    this.workhours_manage_delete_all = 0;
                    vm.is_display_loader = 1;
                                        
                    //console.log('llamado open shift');
                          
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
                saveShiftManagementDetails( is_select_service= '' ){
                    console.log([ is_select_service ] );
					const vm2 = this
					vm2.is_disabled = true
					vm2.is_display_save_loader = '1'
					var postdata = [];
					postdata.action = 'bookingpress_add_staff_member';
					postdata.update_id = vm2.staff_members.update_id;
					postdata.workhours_details = JSON.stringify( vm2.workhours_timings );
					postdata.break_details = JSON.stringify( vm2.selected_break_timings );
					postdata.dayoff_details = JSON.stringify( vm2.staffmember_dayoff_arr );
					postdata.special_day_details = JSON.stringify( vm2.staffmember_special_day_arr );
					postdata.bookingpress_action = 'bookingpress_shift_managment';
					<?php do_action( 'bookingpress_save_staff_member' ); ?>
					postdata.bookingpress_configure_specific_workhour = vm2.bookingpress_configure_specific_workhour
					postdata._wpnonce = '<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce' ) ); ?>';
					axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
					.then(function(response){
						vm2.is_disabled = false
						vm2.is_display_save_loader = '0'							
						
						if (response.data.variant == 'success') {
																									
							vm2.staff_members.update_id = response.data.staff_member_id
                            if(is_select_service != 'is_select_service'){
                                vm2.$notify({
        							title: response.data.title,
        							message: response.data.msg,
        							type: response.data.variant,
        							customClass: response.data.variant+'_notification',
        						});
                                vm2.open_shift_management_modal = false
							     vm2.loadStaffmembers()
                            }else{
                                //vm2.$refs.selectServiceWH.selectedLabel
                                vm2.$notify({
        							title: ' ',
        							message: 'se ha almacenado la configuracion de horarios de '+vm2.$refs.selectServiceWH.previousQuery,
        							type: 'info',
        							customClass: 'info'+'_notification',
        						});
                                
                            }
						}else{
						  vm2.$notify({
							title: response.data.title,
							message: response.data.msg,
							type: response.data.variant,
							customClass: response.data.variant+'_notification',
						  });
                          
						}
					}).catch(function(error){
						vm2.is_disabled = false
						vm2.is_display_loader = '0'
						console.log(error);
						vm2.$notify({
							title: '<?php esc_html_e( 'Error', 'bookingpress-appointment-booking' ); ?>',
							message: '<?php esc_html_e( 'Something went wrong..', 'bookingpress-appointment-booking' ); ?>',
							type: 'error',
							customClass: 'error_notification',
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


$bookingpress_expansion_staff_members = new bookingpress_Expansion_staff_members();



global $bookingpress_staff_member_vue_data_fields;

$bookingpress_staff_member_vue_data_fields['gestionWorkH_selected_service_id'] = "0";
$bookingpress_staff_member_vue_data_fields['workhours_manage_delete_all'] = "0";

#$bookingpress_pro_staff_members->bookingpress_retrieve_staffmember_shift_managment_data_func() = $bookingpress_exp_staff_members->bookingpress_retrieve_staffmember_shift_managment_data_func();




//ALTER TABLE `wp_expansion_staff_member_workhours` CHANGE `service_id` `service_id` SMALLINT(6) NOT NULL;
 
//INSERT INTO `wp_expansion_staff_member_workhours` (`bookingpress_staffmember_workhours_id`, `bookingpress_staffmember_id`, `service_id`, `bookingpress_staffmember_workday_key`, `bookingpress_staffmember_workhours_start_time`, `bookingpress_staffmember_workhours_end_time`, `bookingpress_staffmember_workhours_is_break`, `bookingpress_staffmember_workhours_created_at`) VALUES (NULL, '97', '55', 'Tuesday', '17:00:00', '19:00:00', '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Sunday', NULL, NULL, '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Thursday', '12:00:00', '14:00:00', '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Monday', '07:00:00', '19:00:00', '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Wednesday', '07:00:00', '19:00:00', '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Saturday', NULL, NULL, '0', '2025-09-12 00:19:48'), (NULL, '97', '55', 'Friday', '07:00:00', '19:00:00', '0', '2025-09-12 00:19:48');

}//Fin ifClass



add_action('wp_print_styles', function( ){
    return; /** DESACTIVADO ESTILOS DE DISEÑO NUEVO */
    ?>
<!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">-->
<!-- Font Awesome para iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
:root {
<?php
//--primary-color: #0056b3; /* Azul médico profesional */
//--secondary-color: #00a8e1;
//--text-dark: #333;
//--text-light: #ffffff;
//--bg-light: #f4f7f6;
//--accent-color: #28a745; /* Verde para acciones */
?>
--wp--style--global--content-size : 100%;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    background-color: var(--bg-light);
    color: var(--text-dark);
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
.wp-site-blocks, .wp-block-post-content {
    margin: 0 !important;
    padding: 0 !important;
}

.is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
    --wp--style--global--content-size : 100%;
    max-width: var(--wp--style--global--content-size);
    margin-left: auto !important;
    margin-right: auto !important;
}

/* --- HEADER --- */
header {
    background-color: #ffffffa0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    padding: 0;
    /* position: sticky; */
    /* top: 0; */
    /* z-index: 1000; */
    background-color: white;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* max-width: 1200px; */
    margin: 0 auto;
    padding: 5px;
}

.logo img {
    height: 50px; 
}

.nav-links {
    display: flex;
    gap: 20px;
    list-style: none;
}

.nav-links a {
    text-decoration: none;
    color: var(--primary-color);
    font-weight: 500;
    transition: 0.3s;
}

.nav-links a:hover {
    color: var(--secondary-color);
}

.btn-portal {
    background-color: var(--primary-color);
    color: white !important;
    padding: 8px 20px;
    border-radius: 50px;
}

/* --- MAIN CONTENT / FORM --- */



/* CAMBIAMOS EL BACKGROUND */
.entry-content.wp-block-post-content {
    
    background-size: cover;
    background-position: center;
}
.booking-main {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(rgba(255,255,255,0.8), #00000020);
    background-size: cover;
    background-position: center;
    padding: 40px 10px !important;
    margin: 0 !important;
}


.booking-container {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 1200px;
    max-width: 1140px;
    /*text-align: center;*/
    padding: 20px;
    position: relative;
    top: 0;
}

.booking-container h1 {
    color: var(--primary-color);
    margin-bottom: 10px;
    font-size: 1.8rem;
}

.booking-container p {
    margin-bottom: 30px;
    color: #666;
}

/* Placeholder para el shortcode */
.shortcode-placeholder {
    background: #f9f9f9;
    border: 2px dashed #ddd;
    padding: 20px;
    border-radius: 8px;
    min-height: 300px;
}

/* --- FOOTER --- */
footer {
    color: white;
    padding: 20px 0 10px;
    margin: 0 !important;
    
    background-color: #2c3e50d5;
    background-color: #2c2e5090;
    background-color: #00000090;
}


.footer-grid {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}

.footer-section h3 {
    border-bottom: 2px solid var(--secondary-color);
    padding-bottom: 10px;
    margin-bottom: 15px;
    font-size: 1.2rem;
}

.footer-section p, .footer-section li {
    font-size: 0.9rem;
    line-height: 1.6;
    list-style: none;
    margin-bottom: 8px;
}

.social-icons {
    margin-top: 15px;
}

.social-icons a {
    color: white;
    font-size: 1.5rem;
    margin-right: 15px;
    transition: 0.3s;
}

.social-icons a:hover {
    color: var(--secondary-color);
}

.footer-bottom {
    text-align: center;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid rgba(255,255,255,0.1);
    font-size: 0.8rem;
}



.bpa-front-dc--body {
    /* scrollbar-width: thin; */
    scrollbar-color: #40758f60 ghostwhite;
}

footer {
        padding: 20px 10px 10px;
    }

/* Responsive */
@media (max-width: 768px) {
    
    .header-container {
        flex-direction: column;
        gap: 15px;
    }
    .nav-links {
        display: none; /* O un menú hamburguesa aquí */
    }
    
    
    .booking-main {
        background-position: bottom;
        padding: 40px 0px !important;
    }
    .booking-container {
        padding: 10px;
        border-radius: 0;
    }
    footer {
        padding: 20px 10px 10px;
    }
    
}

@media (min-width: 1024px) and (max-width: 1367px) {
    .bpa-front-module--date-and-time .bpa-front--dt__wrapper, .bpa-front-module--service-items-row {
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)) !important;
    }
}


header{
    height: 150px;
}
.page_title {
    
}


.booking-container {
    top: -50px;
}
.booking-container.start_animate {
    /* position: absolute; */
    /* top: 120px; */
    background: transparent;
    box-shadow: none;
    transition: all 0.8s ease;
    /*height: calc(100vh - 100px); */
    position: relative;
    top: -50px;
}

.booking-container .page_title.bpa-front-tabs {
    height: calc(100vh - 195px);
    min-height: 300px;
}
.boking-main-notice {
    position: absolute;
    bottom: 0px;
}

.booking-container, 
.booking-container .shortcode-wrapper,
.entry-content.wp-block-post-content {
    transition: all 0.8s ease;
}
.booking-container .shortcode-wrapper {
    opacity: 1;
    max-height: 100%;
    overflow: hidden;
}
.booking-container .shortcode-wrapper.end_animate {
    overflow: visible;
}
.booking-container .shortcode-wrapper.start_animate {
    transform: translatey(-5px);/* lleva el scroll un poco mas alto */
    opacity: 0;
    max-height: 0%;
    overflow: hidden;
    transition: all 0.8s ease;
}

/* */
.entry-content.wp-block-post-content {
    background: linear-gradient(rgba(255, 255, 255, 1), #2c3e5008), 
    url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
    transition: all 0.8s ease;
    background-size: cover;
    background-position: center;
}
.entry-content.wp-block-post-content.end_animate {
    /*background: linear-gradient(rgba(255,255,255,1), #2c3e50a0),
    url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
    */transition: all 0.8s ease;
    /*background: #000000a0;*/
}

.booking-main.gracias .contact-info ul li {
    text-align: center;
    list-style: none;
}

@media (min-width: 1024px){
    .booking-main.gracias .bpa-front-thankyou-module-container {
        /* float: right; */
        margin: 0 50px;
        justify-self: right;
        max-width: none;
    }
}
</style>
<script>

window.addEventListener("DOMContentLoaded", function(){//DOMContentLoaded//load

    const welcomeTimeO1 = setTimeout(()=>{
        if( window.innerHeight > 300 ){
            document.querySelector('.header-container').scrollIntoView({ behavior: 'instant'/*'smooth' 'instant'*/, block: 'start'});
        }else{
            document.querySelector('.booking-container .page_title').scrollIntoView({ behavior: 'smooth'/*'instant'*/, block: /*'nearest'*/'center'});
        }
        
        const welcomeTimeO2 = setTimeout(()=>{
            document.querySelector('.entry-content.wp-block-post-content').classList.add('end_animate');
            document.querySelectorAll('.start_animate').forEach(el=> el.classList.remove('start_animate'));
            document.querySelector('.booking-container .shortcode-wrapper').classList.add('end_animate');
            setTimeout(()=>{ document.querySelector('.booking-container .shortcode-wrapper').scrollIntoView({ behavior: 'smooth', block: 'start'}); }, 1000);
        }, 2000);
    }, 100);

});
</script>
    <?php
}, 10);




