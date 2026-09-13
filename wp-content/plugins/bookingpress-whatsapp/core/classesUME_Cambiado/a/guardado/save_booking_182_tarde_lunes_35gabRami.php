<?php

ignore_user_abort(true);
set_time_limit(1800);
//ob_implicit_flush();
/**
 * @author lolkittens
 * @copyright 2024
 * 
 */
echo "load saveboking <br />";
if( !isset($_GET['max_imp3'])) return;
//echo str_replace( $_SERVER["DOCUMENT_ROOT"], $_SERVER["HTTP_HOST"], __DIR__.'/LOMA_sql_server.php' ). " url <br />";
//exit("EXITTTTTT"); 


@ob_end_clean();
//ob_implicit_flush();

#@ob_start( null, 0, PHP_OUTPUT_HANDLER_FLUSHABLE);

//header("Connection: Close\r\n");

#######################################################################
##########################################################################
//182-RAMIREZ GABRIELA id:35 serv:17 Traumatología | 

$test_json='{
    "selected_category" : "1", 
    "selected_service" : "17", 
    "selected_service_name" :"Traumatología", 
    "selected_service_price" : "$0,00",
        "service_price_without_currency" : 0, "selected_date" : "2024-08-21",
        "selected_end_date" : "", "selected_start_time" : "09:00", "selected_end_time" :
        "09:15", "customer_email" : "", "selected_payment_method" : "",
        "customer_phone_country" : "AR", "total_services" : "", "total_category" : "",
        "selected_service_duration" : "15", "selected_service_duration_unit" : "m",
        "is_enable_validations" : 1, "check_bookingpress_username_set" : "0",
        "bpa_check_user_login" : "0", "customer_firstname" : "", "customer_lastname" :
        "", "text_C6kufq" : "", "is_particular" : "", "obra_soc_seguros" : "",
        "text_o9q4Cr" : "", "customer_phone" : "", "is_waiting_list" : 0,
        "check_username_validation" : false, "invalid_customer_username" : false,
        "invalid_customer_message" : "Invalid Username",  "related_category_service" : {
        "1" : ["1", "2", "3", "4", "5", "6", "9", "11", "12", "14", "17", "18", "19",
            "20", "21", "23", "24", "25", "26", "27", "28", "29", "30", "32", "33", "34",
            "36", "37"]}
    , "customer_phone_dial_code" : "54", "bookingpress_customer_timezone" : 180,
        "bookingpress_form_token" : "66c912ae0ad3b_7exi7b7jfd5", "form_fields" : {
        "customer_firstname" : "NOMBRE", "customer_lastname" : "APELLIDO",
            "customer_email" : "", "customer_phone" : "123",
            "customer_phone_country" : "AR", "text_C6kufq" : "1111111", "text_o9q4Cr" : " ",
            "is_particular" : "obra social", "obra_soc_seguros" : "SIN DEFINIR",
            "persona_genero" : "", "persona_fecha" : "", "persona_dir" : "",
            "persona_alergias" : "", "persona_city" : "", "persona_provincia" : "",
            "send_whatsapp_notification" : false, "customer_username" : ""}
    , "coupon_code" : "", "total_payable_amount" : 0,
        "total_payable_amount_with_currency" : "$0,00", "card_holder_name" : "",
        "card_number" : "", "expire_month" : "", "expire_year" : "", "cvv" : "",
        "bpa_password_already_exists" : false, "bpa_user_email_already_exists" : false,
        "bookingpress_front_field_data" : {
        "customer_name" : "1", "customer_firstname" : "2", "text_C6kufq" : "20",
            "customer_lastname" : "3", "obra_soc_seguros" : "26", "text_o9q4Cr" : "22",
            "is_particular" : "25", "persona_fecha" : "29", "persona_genero" : "28",
            "persona_dir" : "30", "customer_email" : "4", "persona_city" : "32",
            "customer_phone" : "5", "persona_provincia" : "33", "appointment_note" : "6",
            "persona_alergias" : "31", "terms_and_conditions_AKklQr" : "7",
            "customer_username" : "8"}
    , "bookingpress_deposit_payment_method" : "deposit_or_full_price",
        "deposit_payment_type" : "", "deposit_payment_amount" : "",
        "deposit_payment_amount_percentage" : "", "deposit_payment_formatted_amount" :
        "", "bookingpress_selected_extra_details" : [],
        "bookingpress_selected_extra_service_count" : 0,
        "bookingpress_selected_bring_members" : 1, "service_max_capacity" : 1,
        "service_min_capacity" : 1, 
        "bookingpress_selected_staff_member_details" : {
        "selected_staff_member_id" : "35", 
        "staff_member_id" : "35",
            "select_any_staffmember" : "false", "is_any_staff_option_selected" : 0}
    , "selected_staff_member_id" : "35",
     "is_extra_service_exists" : 0,
        "is_staff_exists" : 1, "hide_staff_selection" : "false", "form_sequence" : ["service_selection",
        "staff_selection"], "booking_form_redirection_mode" : "in-built",
        "is_transaction_completed" : "", "bookingpress_repeater_fields_key" : [],
        "stime" : 1724468471, "spam_captcha" : "pr0v6UzKeXPO", "bookingpress_uniq_id" :
        "66c912ae0ad3b", "bookingpress_captcha_66c912ae0ad3b" : "",
        "base_price_without_currency" : "0", "multiple_quantity_token" :
        "NjZjOTEyYWUwYWQzYjFiM2RhMGVhMjE5YzY2", "any_staff_selected" : 0,
        "available_staffs" : [], "selected_formatted_start_time" : "09:00",
        "selected_formatted_end_time" : "09:15", "selected_formatted_start_end_time" :
        "09:00 - 09:15", "store_start_time" : "09:00", "store_end_time" : "09:15",
        "client_offset" : "", "store_selected_date" : "2024-08-21", "authorized_token" :
        "eb190ec8acbaa1294e25a3f6b260b375", "authorized_time" : 1724169392}';







$horario = array();

$horario['mañana']=json_decode('[]',true);


$horario['tarde']= json_decode('[
    {
        "start_time": "16:00",
        "end_time": "16:15",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "16:00",
        "store_end_time": "16:15",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-1",
        "formatted_start_time": "16:00",
        "formatted_end_time": "16:15",
        "formatted_start_end_time": "16:00 - 16:15",
        "class": ""
    },
    {
        "start_time": "16:15",
        "end_time": "16:30",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "16:15",
        "store_end_time": "16:30",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-2",
        "formatted_start_time": "16:15",
        "formatted_end_time": "16:30",
        "formatted_start_end_time": "16:15 - 16:30",
        "class": ""
    },
    {
        "start_time": "16:30",
        "end_time": "16:45",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "16:30",
        "store_end_time": "16:45",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-3",
        "formatted_start_time": "16:30",
        "formatted_end_time": "16:45",
        "formatted_start_end_time": "16:30 - 16:45",
        "class": ""
    },
    {
        "start_time": "16:45",
        "end_time": "17:00",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "16:45",
        "store_end_time": "17:00",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-4",
        "formatted_start_time": "16:45",
        "formatted_end_time": "17:00",
        "formatted_start_end_time": "16:45 - 17:00",
        "class": ""
    },
    {
        "start_time": "17:00",
        "end_time": "17:15",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "17:00",
        "store_end_time": "17:15",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-5",
        "formatted_start_time": "17:00",
        "formatted_end_time": "17:15",
        "formatted_start_end_time": "17:00 - 17:15",
        "class": ""
    },
    {
        "start_time": "17:15",
        "end_time": "17:30",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "17:15",
        "store_end_time": "17:30",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-6",
        "formatted_start_time": "17:15",
        "formatted_end_time": "17:30",
        "formatted_start_end_time": "17:15 - 17:30",
        "class": ""
    },
    {
        "start_time": "17:30",
        "end_time": "17:45",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "17:30",
        "store_end_time": "17:45",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-7",
        "formatted_start_time": "17:30",
        "formatted_end_time": "17:45",
        "formatted_start_end_time": "17:30 - 17:45",
        "class": ""
    },
    {
        "start_time": "17:45",
        "end_time": "18:00",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "17:45",
        "store_end_time": "18:00",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-8",
        "formatted_start_time": "17:45",
        "formatted_end_time": "18:00",
        "formatted_start_end_time": "17:45 - 18:00",
        "class": ""
    },
    {
        "start_time": "18:00",
        "end_time": "18:15",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "18:00",
        "store_end_time": "18:15",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-9",
        "formatted_start_time": "18:00",
        "formatted_end_time": "18:15",
        "formatted_start_end_time": "18:00 - 18:15",
        "class": ""
    },
    {
        "start_time": "18:15",
        "end_time": "18:30",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "18:15",
        "store_end_time": "18:30",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-10",
        "formatted_start_time": "18:15",
        "formatted_end_time": "18:30",
        "formatted_start_end_time": "18:15 - 18:30",
        "class": ""
    },
    {
        "start_time": "18:30",
        "end_time": "18:45",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "18:30",
        "store_end_time": "18:45",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-11",
        "formatted_start_time": "18:30",
        "formatted_end_time": "18:45",
        "formatted_start_end_time": "18:30 - 18:45",
        "class": ""
    },
    {
        "start_time": "18:45",
        "end_time": "19:00",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "18:45",
        "store_end_time": "19:00",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-12",
        "formatted_start_time": "18:45",
        "formatted_end_time": "19:00",
        "formatted_start_end_time": "18:45 - 19:00",
        "class": ""
    },
    {
        "start_time": "19:00",
        "end_time": "19:15",
        "break_start_time": "",
        "break_end_time": "",
        "store_start_time": "19:00",
        "store_end_time": "19:15",
        "store_service_date": "2024-08-30",
        "is_booked": 0,
        "max_capacity": "1",
        "total_booked": 0,
        "disable_flag_timeslot": false,
        "max_total_capacity": "1",
        "css_animation_class": "bpa-front--ts-item-13",
        "formatted_start_time": "19:00",
        "formatted_end_time": "19:15",
        "formatted_start_end_time": "19:00 - 19:15",
        "class": ""
    }
]',true);


    


$exepcion_dia=array();
$exepcion_dia['mañana'] = json_decode('[]',true);

//ruiz 31 | natalia 352 |davv gyoker 88 |harasiwka 339 id:19 | marisa 276 id:25 | NEST MANR 84 id:27 |
//PREILER 81 id:34 | rAMOS ARIEL 176 id:36 | 179-GEMETRO FELIPE id:13 | 260-ACHITTE MARCELO ALEJANDRO id:5 |
//353-UEZ JOSE LUIS id:47 serv 17 Traumatología | 43-BRAVO GERARDO LUIS id:9 serv:9 Cirugía General |
/** sin hacer 
 * 182-RAMIREZ GABRIELA id:35 serv:17 Traumatología | 
 */

$prestador = 182;//179
$medico_id = 35; //47 serv 17 Traumatología
$turno_man_tarde="tarde";//mañana tarde
$str_tarde= ($turno_man_tarde=='tarde')? "_tarde_lunes":"";

$limite_turnos = count($horario[$turno_man_tarde]);

echo "<br /><br />limite de $limite_turnos turnos en este horario $turno_man_tarde<br />";

if( !empty( file_get_contents(__DIR__.'/resultado_'.$prestador.'.txt') )) exit("ya existe resultado $turno_man_tarde");

$f = utf8_encode(file_get_contents(__DIR__.'/turnos_json'.$prestador.$str_tarde.'.txt'));
$f = str_replace(array("\n\r","\n","\r"),'', $f);
$datos_turno = json_decode($f,true);
if( ! is_array($datos_turno) ) exit("no es array");


IF( isset($_GET['mostrar'])){
    ECHO "<br />mostrar ID PRESTADOR $prestador . ID MEDICO $medico_id . ".count($datos_turno)." resultados<br /><br />";
    
    print_r($datos_turno);
    exit;
}



//@ob_start( null, 0, PHP_OUTPUT_HANDLER_FLUSHABLE);
$indx=0;
foreach( $datos_turno as $indx=>$datos){
//if($indx <2) continue;
#@ob_end_flush();


#print_r($datos_turno[$indx]);

/*if( strpos((string) $datos_turno[$indx]['TURNO'], "MA") !== false){
    $datos_turno[$indx]['TURNO'] = "MAÑANA";
}*/

if( $datos_turno[$indx]['ID_PRESTADOR'] == $prestador  ){
    
    echo "<br /><br /> ID_PRESTADOR $prestador ok . ".$datos_turno[$indx]['PRESTADOR']."<br />";
    
    $date = date('Y-m-d', strtotime($datos_turno[$indx]['FECHA']['date']) );
    echo $date;
    echo "<br />";
    
    $doc = '';
    $doc = stripcslashes((string) $datos_turno[$indx]["NRODOCUMENTO"]);
    echo "doc: ".$doc;
    echo "<br />";
    
    $paciente='';
    $paciente= stripcslashes((string) $datos_turno[$indx]['PACIENTE']);
    $paciente_arr = explode(' ',$paciente,2);
    $apellido = $paciente_arr[0];
    $nombre = !empty($paciente_arr[1])? $paciente_arr[1]:$paciente_arr[0];
    echo $nombre;
    echo "<br />";
    echo $apellido;
    echo "<br />";   
    $tel='';
    $telefono='';
    $teltext="tel";
    $telefono = ((object) $datos_turno[$indx])->TEL;// => 3734 52-0925
    $barpos=[];
    $barpos= explode("-",$telefono,2);
    if( strlen($barpos[0]) >7 ){
        $telefono = $barpos[0];
    }
    
    $telefono = (string) str_replace(array("-"," "),'',$telefono);
    
    $barpos= explode("/",$telefono,2);
    if( strlen($barpos[0]) <7 ){
    $telefono = $barpos[0].(isset($barpos[1])?$barpos[1]:'');
    }
    $telefono = (int) $telefono;
    
    
    echo " $telefono ";
    echo "<br />";
    $obra =  (string) $datos_turno[$indx]['OBRA_SOCIAL'];
    ECHO $obra;
    echo "<br />";
    $observaciones='';
    $observaciones = stripcslashes((string) $datos_turno[$indx]['OBSERVACIONES']);
    
    $nro_turno = 0;
    $nro_turno = (int) $datos_turno[$indx]['TURNO_NRO'];
    echo "num turno: ".$nro_turno;
    $nro_turno = $nro_turno-1;
    if($nro_turno <0) $nro_turno=0;
    
        /**
         * Exapcion dia viernes
         if( date("D", strtotime($date)) == "Fri" ){
            echo " friday<br />";
            $turno_en_horas = $friday[$turno_man_tarde][$nro_turno];
        }*/
        
         //Exapcion dia viernes
         
         if( date("D", strtotime($date)) == "Mon" ){
            echo " LUNES $nro_turno <br />";
            
        }else{
            //$nro_turno = 2+ $nro_turno;
            echo " NO guardar $nro_turno <br />";
            continue;
        }
        
        
    
    echo " indx_hora_turno: ".$nro_turno. " $turno_man_tarde ";
    echo "<br />";
    
    $domicilio = '';
    $domicilio = stripcslashes((string) $datos_turno[$indx]['DOMICILIO']);
    echo $domicilio;
    echo "<br />";
    
if( !empty($horario[$turno_man_tarde][$nro_turno]) ){

        $turno_en_horas = $horario[$turno_man_tarde][$nro_turno];
        
        
        
        #print_r($turno_en_horas);
        echo "hora {$turno_en_horas['start_time']}<br />";
//ob_start();

#echo "<br /><br />postttt<br />";

$arr = json_decode($test_json,true);

//$arr["selected_service"] = 1; 
//$arr["selected_service_name"] ="Clínica Médica";
//$arr["bookingpress_selected_staff_member_details"]["selected_staff_member_id"] = "40";
//$arr["bookingpress_selected_staff_member_details"]["staff_member_id"] = "40";

$arr['selected_date'] = $date; //$turno_en_horas['store_service_date'] 

$arr['selected_start_time'] = $turno_en_horas['start_time'];
$arr['selected_end_time'] = $turno_en_horas['end_time'];
$arr['selected_formatted_start_time'] = $turno_en_horas['formatted_start_time'];
$arr['selected_formatted_end_time'] = $turno_en_horas['formatted_end_time'];
$arr['selected_formatted_start_end_time'] = $turno_en_horas['formatted_start_end_time'];
$arr['store_start_time'] = $turno_en_horas['store_start_time'];
$arr['store_end_time'] = $turno_en_horas['store_end_time'];
$arr['store_selected_date'] = $date;

$arr['form_fields']['customer_firstname'] = $nombre;
 $arr['form_fields']['customer_lastname'] = $apellido; 
$arr['form_fields']['customer_phone'] = '+54'.$telefono;
 $arr['form_fields']['customer_phone_country'] = 'AR';
 $arr['form_fields']['text_C6kufq'] = $doc;
 $arr['form_fields']['obra_soc_seguros'] = $obra; 
 if( !empty($obra) && empty(strstr( (string) $obra,"PARTICULAR")) ){
    $arr['form_fields']['is_particular'] = 'obra social';
 }else{
    $arr['form_fields']['is_particular'] = 'particular';
 }
 $arr['form_fields']['appointment_note'] = $observaciones;
 $arr['form_fields']['persona_dir'] = $domicilio;
 
 //$arr['form_fields']['send_whatsapp_notification'] = false;
 //$arr['form_fields']['customer_username'] = $doc;


#print_r($arr);

#exit;

echo "<br /><br /><br />RESULTADOS $indx<br /><br />";
global $maxii;
$maxii['appointment_data'] = $arr;
//$maxii['action'] = "bookingpress_front_save_appointment_booking";//wp_ajax_nopriv_bookingpress_front_save_appointment_booking
$maxii['_wpnonce'] = "a38d102852";
$_POST=$maxii;
$_REQUEST = $_POST;

//add_action('init', 'salvar_booking',1);

echo " ";


#exit;
$salvado = '';

            $salvado = salvar_booking();

}else{
    $salvado = 'LIMITE_TURNO';
}
$index_result = "$indx: $salvado";

$escribe_result = fopen(__DIR__ .'/resultado_'.$prestador.'.txt','a');
if($escribe_result){
fwrite($escribe_result, $index_result."\n" );
fclose($escribe_result);
}
echo "<br />$index_result<br />";

echo "-----------------------<br /><br />";
echo ob_get_clean();
@ob_end_flush();
@ob_flush();
@flush();
sleep(1);
$_REQUEST = $_POST = array(); 
//exit("detenido");
}
    //$indx++;
}//fin for
@ob_get_clean();

//$bookingpress_appointment_bookings
function salvar_booking()
{
            global $wpdb, $BookingPress, $tbl_bookingpress_appointment_bookings, $tbl_bookingpress_services, $tbl_bookingpress_customer_bookings, $tbl_bookingpress_customers, $bookingpress_payment_gateways, $bookingpress_debug_payment_log_id, $bookingpress_appointment_bookings;
            $response              = array();
            $wpnonce               = isset($_REQUEST['_wpnonce']) ? sanitize_text_field($_REQUEST['_wpnonce']) : '';
            $bpa_verify_nonce_flag = 1;
            echo "salvar_activo";
            
            global $maxii;
            $_REQUEST = $maxii;
            
            if( empty($_REQUEST )){
                
                $_REQUEST = $_POST;
            }
            
            /*
            $response['variant']       = 'error';
            $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']           = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            $response['is_redirect']   = 0;
            $response['redirect_data'] = '';
            $response['is_spam']       = 1;
            */

            if( !empty( $_REQUEST['appointment_data'] ) && !is_array( $_REQUEST['appointment_data'] ) ){
                $_REQUEST['appointment_data'] = json_decode( $_REQUEST['appointment_data'] , true ); //phpcs:ignore
                $_POST['appointment_data'] = $_REQUEST['appointment_data'] =  !empty($_REQUEST['appointment_data']) ? array_map(array($BookingPress,'bookingpress_boolean_type_cast'), $_REQUEST['appointment_data'] ) : array(); // phpcs:ignore
            }

            //$response = apply_filters('bookingpress_validate_spam_protection', $response, array_map(array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['appointment_data'])); // phpcs:ignore
            
            echo "<br /><br /> REQUEST APPOINTMENT DATA <br />";
            //print_r($_REQUEST['appointment_data']);
            echo "<br /><br />";
            
      #exit;
            $booking_response = salvar_before_book_func();//$bookingpress_appointment_bookings->bookingpress_before_book_appointment_func();
            #echo "<br />before book response <br />";
            #print_r($booking_response);
            #echo "<br /><br />";
      #exit;
            #echo "<br />xxxxxx<br />";
/*
            if( !empty( $booking_response ) ){
                $booking_response_arr = json_decode( $booking_response, true );                
                if( !empty( $booking_response_arr['variant'] ) && 'error' == $booking_response_arr['variant'] ){
                    if(!empty($booking_response_arr['msg'])) {
                        $booking_response_arr['msg'] = stripslashes_deep(html_entity_decode($booking_response_arr['msg'],ENT_QUOTES));
                    }                                     
                    wp_send_json($booking_response_arr);
                    die;
                }
            }
*/
            $appointment_booked_successfully = $BookingPress->bookingpress_get_settings('appointment_booked_successfully', 'message_setting');

            if (! empty($_REQUEST) && ! empty($_REQUEST['appointment_data']) ) {
                #echo "<br />aaaaaaaaaaaaaa<br />";
             
                $bookingpress_appointment_data            = $_REQUEST['appointment_data']; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_GET['appointment_data'] contains mixed array and sanitized properly using 'appointment_sanatize_field' function
                $bookingpress_payment_gateway             = ! empty($bookingpress_appointment_data['selected_payment_method']) ? $bookingpress_appointment_data['selected_payment_method'] : '';
                $bookingpress_appointment_on_site_enabled = ( $bookingpress_appointment_data['selected_payment_method'] == 'onsite' ) ? 1 : 0;
                $payment_gateway                          = ( $bookingpress_appointment_on_site_enabled ) ? 'on-site' : $bookingpress_payment_gateway;

                $payment_gateway='on-site';
                //$payment_gateway = ' - ';
                
                $bookingpress_service_price = isset($bookingpress_appointment_data['service_price_without_currency']) ? floatval($bookingpress_appointment_data['service_price_without_currency']) : 0;
                if ($bookingpress_service_price == 0 ) {
                    $payment_gateway = ' - ';
                }

                $bpa_selected_service = $bookingpress_appointment_data['selected_service'];

                $bpa_service_data               = $BookingPress->get_service_by_id( $bpa_selected_service );
                $bpa_service_amount             = ! empty($bpa_service_data['bookingpress_service_price']) ? (float) $bpa_service_data['bookingpress_service_price'] : 0;

                /*if( $bpa_service_amount != $bookingpress_service_price ){
                    $bookingpress_invalid_amount = esc_html__('Sorry! Appointment could not be processed', 'bookingpress-appointment-booking');

                    $response['variant']       = 'error';
                    $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                    $response['msg']           = $bookingpress_invalid_amount;
                    $response['is_redirect']   = 0;
                    $response['reason']        = 'price mismatched ' . $bpa_service_amount . ' --- ' . $bookingpress_service_price;
                    $response['redirect_data'] = '';
                    $response['is_spam']       = 0;

                    echo json_encode($response);
                    exit;
                }*/

                //print_r($bookingpress_return_data);
                //echo "<br />aaaaaaaaaaaaaa<br />";add_filter('bookingpress_validate_submitted_form'
                
                #$bookingpress_return_data = apply_filters('bookingpress_validate_submitted_form', $payment_gateway, $bookingpress_appointment_data);
                
                $bookingpress_return_data = bk_mod_validate_booking_form($payment_gateway, $bookingpress_appointment_data);
                #print_r($bookingpress_return_data);
                #echo "<br /><br />";
                #exit;

                if ($payment_gateway == 'on-site' && $bookingpress_service_price > 0 ) {
                    $entry_id = ! empty($bookingpress_return_data['entry_id']) ? $bookingpress_return_data['entry_id'] : 0;
                    $bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('onsite_appointment_status', 'general_setting');

                    if($bookingpress_appointment_status ==  '1' ) {               
                        $bookingpress_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '1', '', '', 1);
                        $bookingpress_redirect_url = $bookingpress_return_data['approved_appointment_url'];
                    } else {                    
                        $bookingpress_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '2', '', '', 1);
                        $bookingpress_redirect_url = $bookingpress_return_data['pending_appointment_url'];
                    }
                    if (! empty($bookingpress_redirect_url) ) {
                        $response['variant']       = 'redirect_url';
                        $response['title']         = '';
                        $response['msg']           = '';
                        $response['is_redirect']   = 1;
                        $response['redirect_data'] = $bookingpress_redirect_url;
                    } else {
                        $response['variant'] = 'success';
                        $response['title']   = esc_html__('Success', 'bookingpress-appointment-booking');
                        $response['msg']     = esc_html($appointment_booked_successfully);
                    }
                } elseif ($bookingpress_service_price == 0 ) {
                    $entry_id = ! empty($bookingpress_return_data['entry_id']) ? $bookingpress_return_data['entry_id'] : 0;
                    $bookingpress_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '1', '', '', 1);

                    $redirect_url                    = $bookingpress_return_data['approved_appointment_url'];
                    $bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('appointment_status', 'general_setting');
                    if ($bookingpress_appointment_status == 'Pending' ) {
                        $redirect_url = $bookingpress_return_data['pending_appointment_url'];
                    }

                    $bookingpress_redirect_url = $redirect_url;
                    if (! empty($bookingpress_redirect_url) ) {
                        $response['variant']       = 'redirect_url';
                        $response['title']         = '';
                        $response['msg']           = '';
                        $response['is_redirect']   = 1;
                        $response['redirect_data'] = $bookingpress_redirect_url;
                    } else {
                        $response['variant'] = 'success';
                        $response['title']   = esc_html__('Success', 'bookingpress-appointment-booking');
                        $response['msg']     = esc_html($appointment_booked_successfully);
                    }
                } else {
                    if ($payment_gateway == 'paypal' ) {
                        $bookingpress_payment_mode    = $BookingPress->bookingpress_get_settings('paypal_payment_mode', 'payment_setting');
                        $bookingpress_is_sandbox_mode = ( $bookingpress_payment_mode != 'live' ) ? true : false;
                        $bookingpress_gateway_status  = $BookingPress->bookingpress_get_settings('paypal_payment', 'payment_setting');
                        $bookingpress_merchant_email  = $BookingPress->bookingpress_get_settings('paypal_merchant_email', 'payment_setting');
                        $bookingpress_api_username    = $BookingPress->bookingpress_get_settings('paypal_api_username', 'payment_setting');
                        $bookingpress_api_password    = $BookingPress->bookingpress_get_settings('paypal_api_password', 'payment_setting');
                        $bookingpress_api_signature   = $BookingPress->bookingpress_get_settings('paypal_api_signature', 'payment_setting');

                        $bookingpress_paypal_error_msg  = esc_html__('PayPal Configuration Error', 'bookingpress-appointment-booking');
                        $bookingpress_paypal_error_msg .= ': ';
                        if (empty($bookingpress_merchant_email) ) {
                               $bookingpress_paypal_error_msg .= esc_html__('Please configure merchant email address', 'bookingpress-appointment-booking');

                               $response['variant']       = 'error';
                               $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                               $response['msg']           = $bookingpress_paypal_error_msg;
                               $response['is_redirect']   = 0;
                               $response['redirect_data'] = '';
                               $response['is_spam']       = 0;

                               echo json_encode($response);
                               return;###exit;
                        }

                        if (empty($bookingpress_api_username) ) {
                            $bookingpress_paypal_error_msg .= esc_html__('Please configure PayPal API Username', 'bookingpress-appointment-booking');

                            $response['variant']       = 'error';
                            $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                            $response['msg']           = $bookingpress_paypal_error_msg;
                            $response['is_redirect']   = 0;
                            $response['redirect_data'] = '';
                            $response['is_spam']       = 0;

                            echo json_encode($response);
                            return;###exit;
                        }

                        if (empty($bookingpress_api_password) ) {
                            $bookingpress_paypal_error_msg .= esc_html__('Please configure PayPal API Password', 'bookingpress-appointment-booking');

                            $response['variant']       = 'error';
                            $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                            $response['msg']           = $bookingpress_paypal_error_msg;
                            $response['is_redirect']   = 0;
                            $response['redirect_data'] = '';
                            $response['is_spam']       = 0;

                            echo json_encode($response);
                            return;###exit;
                        }

                        if (empty($bookingpress_api_signature) ) {
                            $bookingpress_paypal_error_msg .= esc_html__('Please configure PayPal API Signature', 'bookingpress-appointment-booking');

                            $response['variant']       = 'error';
                            $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                            $response['msg']           = $bookingpress_paypal_error_msg;
                            $response['is_redirect']   = 0;
                            $response['redirect_data'] = '';
                            $response['is_spam']       = 0;

                            echo json_encode($response);
                            return;###exit;
                        }

                        $entry_id                          = $bookingpress_return_data['entry_id'];
                        $currency                          = $bookingpress_return_data['currency'];
                        $currency_symbol                   = $BookingPress->bookingpress_get_currency_code($currency);
                        $bookingpress_final_payable_amount = isset($bookingpress_return_data['payable_amount']) ? $bookingpress_return_data['payable_amount'] : 0;
                        $customer_details                  = $bookingpress_return_data['customer_details'];
                        $customer_email                    = ! empty($customer_details['customer_email']) ? $customer_details['customer_email'] : '';

                        $bookingpress_service_name = ! empty($bookingpress_return_data['service_data']['bookingpress_service_name']) ? $bookingpress_return_data['service_data']['bookingpress_service_name'] : __('Appointment Booking', 'bookingpress-appointment-booking');

                        $custom_var = $entry_id;

                        $sandbox = $bookingpress_is_sandbox_mode ? 'sandbox.' : '';

                        $notify_url = $bookingpress_return_data['notify_url'];

                        $redirect_url                    = $bookingpress_return_data['approved_appointment_url'];
                        $bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('appointment_status', 'general_setting');
                        if ($bookingpress_appointment_status == 'Pending' ) {
                            $redirect_url = $bookingpress_return_data['pending_appointment_url'];
                        }

                        $bookingpress_paypal_cancel_url_id = $BookingPress->bookingpress_get_customize_settings('after_failed_payment_redirection', 'booking_form');
                        $bookingpress_paypal_cancel_url = get_permalink($bookingpress_paypal_cancel_url_id);
                        $cancel_url                     = ! empty($bookingpress_paypal_cancel_url) ? $bookingpress_paypal_cancel_url : BOOKINGPRESS_HOME_URL;
                        $cancel_url                     = add_query_arg('is_cancel', 1, esc_url($cancel_url));

                        $cmd          = '_xclick';
                        $paypal_form  = '<form name="_xclick" id="bookingpress_paypal_form" action="https://www.' . $sandbox . 'paypal.com/cgi-bin/webscr" method="post">';
                        $paypal_form .= '<input type="hidden" name="cmd" value="' . $cmd . '" />';
                        $paypal_form .= '<input type="hidden" name="amount" value="' . $bookingpress_final_payable_amount . '" />';
                        $paypal_form .= '<input type="hidden" name="business" value="' . $bookingpress_merchant_email . '" />';
                        $paypal_form .= '<input type="hidden" name="notify_url" value="' . $notify_url . '" />';
                        $paypal_form .= '<input type="hidden" name="cancel_return" value="' . $cancel_url . '" />';
                        $paypal_form .= '<input type="hidden" name="return" value="' . $redirect_url . '" />';
                        $paypal_form .= '<input type="hidden" name="rm" value="2" />';
                        $paypal_form .= '<input type="hidden" name="lc" value="en_US" />';
                        $paypal_form .= '<input type="hidden" name="no_shipping" value="1" />';
                        $paypal_form .= '<input type="hidden" name="custom" value="' . $custom_var . '" />';
                        $paypal_form .= '<input type="hidden" name="on0" value="user_email" />';
                        $paypal_form .= '<input type="hidden" name="os0" value="' . $customer_email . '" />';
                        $paypal_form .= '<input type="hidden" name="currency_code" value="' . $currency_symbol . '" />';
                        $paypal_form .= '<input type="hidden" name="page_style" value="primary" />';
                        $paypal_form .= '<input type="hidden" name="charset" value="UTF-8" />';
                        $paypal_form .= '<input type="hidden" name="item_name" value="' . $bookingpress_service_name . '" />';
                        $paypal_form .= '<input type="hidden" name="item_number" value="1" />';
                        $paypal_form .= '<input type="submit" value="Pay with PayPal!" />';
                        $paypal_form .= '</form>';

                        do_action('bookingpress_payment_log_entry', 'paypal', 'payment form redirected data', 'bookingpress', $paypal_form, $bookingpress_debug_payment_log_id);

                        $paypal_form .= '<script type="text/javascript">document.getElementById("bookingpress_paypal_form").submit();</script>';

                        $response['variant']       = 'redirect';
                        $response['title']         = '';
                        $response['msg']           = '';
                        $response['is_redirect']   = 1;
                        $response['redirect_data'] = $paypal_form;
                        $response['entry_id']      = $entry_id;
                    }
                }
            }

            echo json_encode($response);
            return "OK";###exit;
        }


        function salvar_before_book_func()
        {
            global $wpdb, $BookingPress, $tbl_bookingpress_appointment_bookings, $tbl_bookingpress_payment_logs,$tbl_bookingpress_customers,$bookingpress_payment_gateways,$tbl_bookingpress_form_fields, $bookingpress_appointment_bookings;
            $response              = array();
            $wpnonce               = isset($_REQUEST['_wpnonce']) ? sanitize_text_field($_REQUEST['_wpnonce']) : '';
            $bpa_verify_nonce_flag = wp_verify_nonce($wpnonce, 'bpa_wp_nonce');
            /*if (! $bpa_verify_nonce_flag ) {
                $response['variant']      = 'error';
                $response['title']        = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']          = esc_html__('Sorry, Your request can not be processed due to security reason.', 'bookingpress-appointment-booking');
                $response['redirect_url'] = '';
                return wp_json_encode($response);
                
            }*/
            $response['variant']    = 'success';
            $response['title']      = '';
            $response['msg']        = '';
            $response['error_type'] = '';
            
            if( !empty($_REQUEST['appointment_data']['form_fields']) ){
                //echo "<br /><br />meeeeeeeeeeeeerrrgeeeeeee<br />";
                $_POST['appointment_data'] = array_merge($_REQUEST['appointment_data'], $_REQUEST['appointment_data']['form_fields']);
                $_REQUEST['appointment_data'] = array_merge($_REQUEST['appointment_data'], $_REQUEST['appointment_data']['form_fields']);
            }
            #$_POST['appointment_data']['customer_firstname'] = "LALO";
            echo "<br />before book response appoi dataaa <br />";
            
            #print_r($_REQUEST['appointment_data']);
            #echo "<br /><br />";
      #exit;
            
            if( !empty( $_REQUEST['appointment_data'] ) && !is_array( $_REQUEST['appointment_data'] ) ){
                $_REQUEST['appointment_data'] = json_decode( stripslashes_deep( $_REQUEST['appointment_data'] ), true ); //phpcs:ignore                
                $_POST['appointment_data'] = $_REQUEST['appointment_data'] =  !empty($_REQUEST['appointment_data']) ? array_map(array($BookingPress,'bookingpress_boolean_type_cast'), $_REQUEST['appointment_data'] ) : array(); // phpcs:ignore
            }
            $bookingpress_unique_id =  !empty($_REQUEST['appointment_data']['bookingpress_uniq_id']) ? sanitize_text_field( $_REQUEST['appointment_data']['bookingpress_uniq_id'] ) : '';
            $bookingpress_form_token = !empty( $_REQUEST['appointment_data']['bookingpress_form_token'] ) ? sanitize_text_field( $_REQUEST['appointment_data']['bookingpress_form_token'] ) : $bookingpress_unique_id;
            
            $no_service_selected_for_the_booking = $BookingPress->bookingpress_get_settings('no_service_selected_for_the_booking', 'message_setting');

            $no_appointment_date_selected_for_the_booking = $BookingPress->bookingpress_get_settings('no_appointment_date_selected_for_the_booking', 'message_setting');

            $no_appointment_time_selected_for_the_booking = $BookingPress->bookingpress_get_settings('no_appointment_time_selected_for_the_booking', 'message_setting');

            $no_payment_method_is_selected_for_the_booking = $BookingPress->bookingpress_get_settings('no_payment_method_is_selected_for_the_booking', 'message_setting');

            $duplicate_email_address_found = $BookingPress->bookingpress_get_settings('duplicate_email_address_found', 'message_setting');

            $unsupported_currecy_selected_for_the_payment = $BookingPress->bookingpress_get_settings('unsupported_currecy_selected_for_the_payment', 'message_setting');

            $duplidate_appointment_time_slot_found = $BookingPress->bookingpress_get_settings('duplidate_appointment_time_slot_found', 'message_setting');

            $bookingpress_service_price = isset($_REQUEST['appointment_data']['service_price_without_currency']) ? floatval($_REQUEST['appointment_data']['service_price_without_currency']) : 0;

            /* server side validation */
            $all_fields = $wpdb->get_results( "SELECT bookingpress_field_error_message,bookingpress_form_field_name,bookingpress_field_is_default FROM {$tbl_bookingpress_form_fields} WHERE bookingpress_field_required = 1 AND bookingpress_field_is_hide = 0" ); //phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_form_fields is a table name. false alarm
  
            $field_validation_message = array();
            $is_required_validation = false;
            if ( ! empty( $all_fields ) ) {
                foreach ( $all_fields as $field_data ) {

                    $field_error_msg = $field_data->bookingpress_field_error_message;

                    if( $field_data->bookingpress_field_is_default == 1 ){

                        if( $field_data->bookingpress_form_field_name == 'firstname'){
                            $bpa_visible_field_key = 'customer_firstname';		
                        }
                        if( $field_data->bookingpress_form_field_name == 'lastname'){
                            $bpa_visible_field_key = 'customer_lastname';		
                        }
                        if( $field_data->bookingpress_form_field_name == 'email_address'){
                            $bpa_visible_field_key = 'customer_email';		
                        }
                        if( $field_data->bookingpress_form_field_name == 'note'){
                            $bpa_visible_field_key = 'appointment_note';		
                        }
                        if( $field_data->bookingpress_form_field_name == 'phone_number'){
                            $bpa_visible_field_key = 'customer_phone';		
                        }
                        if( $field_data->bookingpress_form_field_name == 'fullname'){
                            $bpa_visible_field_key = 'customer_name';		
                        }
                        if( $field_data->bookingpress_form_field_name == 'username'){
                            $bpa_visible_field_key = 'customer_username';		
                        }
                        if( $field_data->bookingpress_form_field_name == 'terms_and_conditions'){
                            $bpa_visible_field_key = 'appointment_terms_conditions';		
                        }
                    } 
                    
                    $val = isset($_POST['appointment_data'][ $bpa_visible_field_key ]) ? $_POST['appointment_data'][ $bpa_visible_field_key ] : ''; //phpcs:ignore

                    if( $bpa_visible_field_key == 'appointment_terms_conditions'){

                        if( empty($val[0])){
                            $is_required_validation = true;
                            $field_validation_message[] = $field_error_msg;
                        }
                    } else {
                        if( '' === $val ){
                            $is_required_validation = true;
                            $field_validation_message[] = $field_error_msg;
                        }
                    }

                }
            }

            if( true == $is_required_validation ){
				$response['variant'] = 'error';
				$response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
				$response['msg']     = !empty($field_validation_message) ? implode(' ', $field_validation_message) : array();
				return wp_json_encode($response);	
			}

            if (empty($_POST['appointment_data']['selected_service']) ) {
                $response['variant'] = 'error';
                $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']     = esc_html($no_service_selected_for_the_booking);
                return wp_json_encode($response);
            }

            if (empty($_POST['appointment_data']['selected_date']) ) {
                $response['variant'] = 'error';
                $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']     = esc_html($no_appointment_date_selected_for_the_booking);
                return wp_json_encode($response);
            }

            if (empty($_POST['appointment_data']['selected_start_time']) || empty($_POST['appointment_data']['selected_end_time']) ) {
                $response['variant'] = 'error';
                $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']     = esc_html($no_appointment_time_selected_for_the_booking);
                return wp_json_encode($response);
            }

            if (empty($_POST['appointment_data']['selected_payment_method']) && $bookingpress_service_price > 0 ) {
                $response['variant'] = 'error';
                $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']     = esc_html($no_payment_method_is_selected_for_the_booking);
                return wp_json_encode($response);
            }

            $bookingpress_fullname  = ! empty($_POST['appointment_data']['customer_name']) ? trim(sanitize_text_field($_POST['appointment_data']['customer_name'])) : '';
            $bookingpress_firstname = ! empty($_POST['appointment_data']['customer_firstname']) ? trim(sanitize_text_field($_POST['appointment_data']['customer_firstname'])) : '';
            $bookingpress_lastname  = ! empty($_POST['appointment_data']['customer_lastname']) ? trim(sanitize_text_field($_POST['appointment_data']['customer_lastname'])) : '';
            $bookingpress_email     = ! empty($_POST['appointment_data']['customer_email']) ? sanitize_email($_POST['appointment_data']['customer_email']) : '';

            if (strlen($bookingpress_fullname) > 255 ) {
                $response['variant'] = 'error';
                $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']     = esc_html__('Fullname is too long...', 'bookingpress-appointment-booking');
                return wp_json_encode($response);
            }
            if (strlen($bookingpress_firstname) > 255 ) {
                $response['variant'] = 'error';
                $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']     = esc_html__('Firstname is too long...', 'bookingpress-appointment-booking');
                return wp_json_encode($response);
            }
            if (strlen($bookingpress_lastname) > 255 ) {
                $response['variant'] = 'error';
                $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']     = esc_html__('Lastname is too long...', 'bookingpress-appointment-booking');
                return wp_json_encode($response);
            }
            if (strlen($bookingpress_email) > 255 ) {
                $response['variant'] = 'error';
                $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']     = esc_html__('Email address is too long...', 'bookingpress-appointment-booking');
                return wp_json_encode($response);
            }
            $bookingpress_selected_payment_method = sanitize_text_field($_POST['appointment_data']['selected_payment_method']);
            $bookingpress_currency_name           = $BookingPress->bookingpress_get_settings('payment_default_currency', 'payment_setting');

            $bookingpress_paypal_currency = $bookingpress_payment_gateways->bookingpress_paypal_supported_currency_list();            
            if ($bookingpress_selected_payment_method == 'paypal' && !in_array($bookingpress_currency_name,$bookingpress_paypal_currency ) ) {
                
                $response['variant'] = 'error';
                $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']     = esc_html($unsupported_currecy_selected_for_the_payment);
                return wp_json_encode($response);
            }

            $appointment_service_id    = intval($_POST['appointment_data']['selected_service']);
            $appointment_selected_date = date('Y-m-d', strtotime(sanitize_text_field($_POST['appointment_data']['selected_date'])));
            $appointment_start_time    = date('H:i:s', strtotime(sanitize_text_field($_POST['appointment_data']['selected_start_time'])));
            $appointment_end_time      = date('H:i:s', strtotime(sanitize_text_field($_POST['appointment_data']['selected_end_time'])));

            $is_appointment_exists = $BookingPress->bookingpress_is_appointment_booked($appointment_service_id, $appointment_selected_date, $appointment_start_time, $appointment_end_time);
            if ($is_appointment_exists) {
                $response['variant']              = 'error';
                $response['title']                = 'Error';
                $response['msg']                  = esc_html($duplidate_appointment_time_slot_found);
                return wp_json_encode($response);
            }

            // If selected date is day off then display error.
            $bookingpress_search_query              = preg_quote($appointment_selected_date, '~');
            $bookingpress_get_default_daysoff_dates = $BookingPress->bookingpress_get_default_dayoff_dates();
            $bookingpress_search_date               = preg_grep('~' . $bookingpress_search_query . '~', $bookingpress_get_default_daysoff_dates);
            if (! empty($bookingpress_search_date) ) {
                $booking_dayoff_msg     = esc_html__('Selected date is off day', 'bookingpress-appointment-booking');
                $booking_dayoff_msg    .= '. ' . esc_html__('So please select new date', 'bookingpress-appointment-booking') . '.';
                $response['error_type'] = 'dayoff';
                $response['variant']    = 'error';
                $response['title']      = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']        = $booking_dayoff_msg;
                return wp_json_encode($response);
            }

            // If payment gateway is disable then return error
            if ($bookingpress_selected_payment_method == 'on-site' && $bookingpress_service_price > 0 ) {
                $on_site_payment = $BookingPress->bookingpress_get_settings('on_site_payment', 'payment_setting');
                if (empty($on_site_payment) || ( $on_site_payment == 'false' ) ) {
                    $response['variant'] = 'error';
                    $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                    $response['msg']     = __('On site payment gateway is not active', 'bookingpress-appointment-booking') . '.';
                    return wp_json_encode($response);
                }
            } elseif ( $bookingpress_selected_payment_method == 'paypal' && $bookingpress_service_price > 0 ) {
                $paypal_payment = $BookingPress->bookingpress_get_settings('paypal_payment', 'payment_setting');
                if (empty($paypal_payment) || ( $paypal_payment == 'false' ) ) {
                    $response['variant'] = 'error';
                    $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                    $response['msg']     = __('PayPal payment gateway is not active', 'bookingpress-appointment-booking') . '.';
                    return wp_json_encode($response);
                }

                if ($bookingpress_service_price < floatval('0.1') ) {
                    $response['variant'] = 'error'; 
                    $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                    $response['msg']     = esc_html__('Paypal supports minimum amount 0.1', 'bookingpress-appointment-booking');
                    return wp_json_encode($response);
                }
            }

            $bpa_front_timings_key = 'bpa_front_timings_' .$bookingpress_form_token.'_'.$appointment_selected_date;
            /*
            $bpa_front_timings_data = $this->bookingpress_get_transient( $bpa_front_timings_key );
            
            // double confirm the timings
            $timings = array_values($bpa_front_timings_data);
            
            $appointment_start_time = date('H:i',strtotime($appointment_start_time));
            $appointment_end_time = $appointment_end_time != '00:00:00' ? date('H:i',strtotime($appointment_end_time)) : '24:00';
            $time_slot_start_key = array_search($appointment_start_time, array_column( $timings, 'store_start_time' ) );				
            $time_slot_end_key = array_search( $appointment_end_time, array_column( $timings, 'store_end_time' ) );
            if( ( trim($time_slot_start_key) === '' || trim($time_slot_end_key) === '' || trim($time_slot_start_key) != trim($time_slot_end_key) ) && 'd' != $posted_data['appointment_data']['selected_service_duration_unit'] ){
                $response['variant']              = 'error';
                $response['title']                = 'Error';
                $response['msg']                  = esc_html__("Sorry, Booking can not be done as booking time is different than selected timeslot", "bookingpress-appointment-booking");
                return wp_json_encode($response);
            }
            */
            //global $maxii;
            
            //do_action('bookingpress_validate_booking_form', $maxii);

        }
        
        
        function bk_mod_validate_booking_form($payment_gateway ,$posted_data){
			global $BookingPress, $wpdb, $tbl_bookingpress_entries, $bookingpress_debug_payment_log_id, $bookingpress_coupons, $tbl_bookingpress_appointment_meta, $tbl_bookingpress_extra_services, $bookingpress_pro_staff_members, $tbl_bookingpress_staffmembers, $bookingpress_deposit_payment, $tbl_bookingpress_staffmembers_services, $bookingpress_other_debug_log_id;

			$return_data = array(
				'service_data'     => array(),
				'payable_amount'   => 0,
				'customer_details' => array(),
				'currency'         => '',
			);

			$bookingpress_appointment_data = $posted_data;

			$bookingpress_timeslot_display_in_client_timezone = $BookingPress->bookingpress_get_settings( 'show_bookingslots_in_client_timezone', 'general_setting' );


			$return_data                   = apply_filters( 'bookingpress_before_modify_validate_submit_form_data', $return_data );

			/* Add new variable for added recurring appointment */
			$bookingpress_add_single_entry = apply_filters( 'bookingpress_add_single_appointment_data',true,$posted_data);

			if ( ! empty( $posted_data ) && ! empty( $payment_gateway ) && empty($bookingpress_appointment_data['cart_items']) && $bookingpress_add_single_entry ) {
				$bookingpress_selected_service_id     = sanitize_text_field( $bookingpress_appointment_data['selected_service'] );
				$bookingpress_appointment_booked_date = sanitize_text_field( $bookingpress_appointment_data['selected_date'] );
				$bookingpress_selected_start_time     = sanitize_text_field( $bookingpress_appointment_data['selected_start_time'] );
				$bookingpress_selected_end_time       = sanitize_text_field($bookingpress_appointment_data['selected_end_time']);
				if( !empty( $bookingpress_timeslot_display_in_client_timezone ) && 'true' == $bookingpress_timeslot_display_in_client_timezone ){
					$bookingpress_appointment_booked_date = !empty( $bookingpress_appointment_data['store_selected_date'] ) ? sanitize_text_field( $bookingpress_appointment_data['store_selected_date'] ) : $bookingpress_appointment_booked_date;

					$bookingpress_selected_start_time = !empty( $bookingpress_appointment_data['store_start_time'] ) ? sanitize_text_field( $bookingpress_appointment_data['store_start_time'] ) : $bookingpress_selected_start_time;

					$bookingpress_selected_end_time = !empty( $bookingpress_appointment_data['store_end_time'] ) ? sanitize_text_field( $bookingpress_appointment_data['store_end_time'] ) : $bookingpress_selected_end_time;

					//$bookingpress_appointment_data['bookingpress_customer_timezone'] = $bookingpress_appointment_data['client_offset'];

				}

				$bookingpress_internal_note = '';
				if( isset ( $bookingpress_appointment_data['appointment_note'] ) ){

					$bookingpress_internal_note           = !empty( $bookingpress_appointment_data['appointment_note'] ) ? sanitize_textarea_field( $bookingpress_appointment_data['appointment_note'] ) : $bookingpress_appointment_data['form_fields']['appointment_note'];
				}

				$service_data                         = $BookingPress->get_service_by_id( $bookingpress_selected_service_id );
				$bookingpress_service_price = $service_data['bookingpress_service_price'];
				$service_duration_vals                = $BookingPress->bookingpress_get_service_end_time( $bookingpress_selected_service_id, $bookingpress_selected_start_time );
				$service_data['service_start_time']   = sanitize_text_field( $service_duration_vals['service_start_time'] );
				$service_data['service_end_time']     = sanitize_text_field( $service_duration_vals['service_end_time'] );
				$return_data['service_data']          = $service_data;

				$bookingpress_currency_name   = $BookingPress->bookingpress_get_settings( 'payment_default_currency', 'payment_setting' );
				$return_data['currency']      = $bookingpress_currency_name;
				$return_data['currency_code'] = $BookingPress->bookingpress_get_currency_code( $bookingpress_currency_name );

				$__payable_amount              = $bookingpress_appointment_data['total_payable_amount'];
				$bookingpress_due_amount = 0;

				if ( $__payable_amount == 0 ) {
					$payment_gateway = ' - ';
				}

				//echo "Payable amount ===>".$__payable_amount ;
				$customer_email     = !empty($bookingpress_appointment_data['form_fields']['customer_email']) ? $bookingpress_appointment_data['form_fields']['customer_email'] : $bookingpress_appointment_data['customer_email'];
				$customer_full_name  = !empty( $bookingpress_appointment_data['form_fields']['customer_name'] ) ? sanitize_text_field( $bookingpress_appointment_data['form_fields']['customer_name'] ) : (!empty( $bookingpress_appointment_data['customer_name'] ) ? sanitize_text_field($bookingpress_appointment_data['customer_name'] ) : '');
				$customer_username  = !empty( $bookingpress_appointment_data['form_fields']['customer_username'] ) ? sanitize_text_field( $bookingpress_appointment_data['form_fields']['customer_username'] ) : (!empty( $bookingpress_appointment_data['customer_username'] ) ? sanitize_text_field($bookingpress_appointment_data['customer_username'] ) : '');

				$customer_password  = !empty( $bookingpress_appointment_data['form_fields']['customer_password'] ) ? sanitize_text_field( $bookingpress_appointment_data['form_fields']['customer_password'] ) : (!empty( $bookingpress_appointment_data['customer_password'] ) ? sanitize_text_field($bookingpress_appointment_data['customer_password'] ) : '');

				$customer_firstname = !empty( $bookingpress_appointment_data['form_fields']['customer_firstname'] ) ? sanitize_text_field( $bookingpress_appointment_data['form_fields']['customer_firstname'] ) : (!empty($bookingpress_appointment_data['customer_firstname']) ? sanitize_text_field($bookingpress_appointment_data['customer_firstname'] ) : '');
				$customer_lastname  = !empty( $bookingpress_appointment_data['form_fields']['customer_lastname'] ) ? sanitize_text_field( $bookingpress_appointment_data['form_fields']['customer_lastname'] ) : (!empty($bookingpress_appointment_data['customer_lastname']) ? sanitize_text_field($bookingpress_appointment_data['customer_lastname'] ) : '');
				$customer_phone     = !empty( $bookingpress_appointment_data['form_fields']['customer_phone'] ) ? sanitize_text_field( $bookingpress_appointment_data['form_fields']['customer_phone'] ) : ( !empty($bookingpress_appointment_data['customer_phone']) ? sanitize_text_field($bookingpress_appointment_data['customer_phone'] ) : '' );
				$customer_country   = !empty( $bookingpress_appointment_data['form_fields']['customer_phone_country'] ) ? sanitize_text_field( $bookingpress_appointment_data['form_fields']['customer_phone_country'] ) : ( !empty($bookingpress_appointment_data['customer_phone_country']) ? sanitize_text_field($bookingpress_appointment_data['customer_phone_country'] ) : '');
				$customer_phone_dial_code = !empty($bookingpress_appointment_data['customer_phone_dial_code']) ? $bookingpress_appointment_data['customer_phone_dial_code'] : '';
				$customer_timezone = !empty($bookingpress_appointment_data['bookingpress_customer_timezone']) ? $bookingpress_appointment_data['bookingpress_customer_timezone'] : wp_timezone_string();

				$customer_dst_timezone = !empty( $bookingpress_appointment_data['client_dst_timezone'] ) ? intval( $bookingpress_appointment_data['client_dst_timezone'] ) : 0;

				if( !empty($customer_phone) && !empty( $customer_phone_dial_code) ){

                    $customer_phone_pattern = '/(^\+'.$customer_phone_dial_code.')/';
                    if( preg_match($customer_phone_pattern, $customer_phone) ){
                        $customer_phone = preg_replace( $customer_phone_pattern, '', $customer_phone) ;
                    }
                }

				$return_data['customer_details'] = array(
					'customer_firstname' => $customer_firstname,
					'customer_lastname'  => $customer_lastname,
					'customer_email'     => $customer_email,
					'customer_username'  => !empty($customer_username) ? $customer_username : $customer_full_name,
					'customer_phone'     => $customer_phone,
				);

				$return_data['card_details'] = array(
					'card_holder_name' => $bookingpress_appointment_data['card_holder_name'],
					'card_number'      => $bookingpress_appointment_data['card_number'],
					'expire_month'     => $bookingpress_appointment_data['expire_month'],
					'expire_year'      => $bookingpress_appointment_data['expire_year'],
					'cvv'              => $bookingpress_appointment_data['cvv'],
				);

				$bookingpress_appointment_status = $BookingPress->bookingpress_get_settings( 'appointment_status', 'general_setting' );

				if ( $payment_gateway == 'on-site' ) {
					$bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('onsite_appointment_status', 'general_setting');
				}

				$bookingpress_customer_id = "";//get_current_user_id();

				$bookingpress_deposit_selected_type = "";
				$bookingpress_deposit_selected_amount = 0;
				$bookingpress_deposit_details = array();
				if($payment_gateway != "on-site" && $payment_gateway != " - " && $bookingpress_deposit_payment->bookingpress_check_deposit_payment_module_activation() && !empty($bookingpress_appointment_data['bookingpress_deposit_payment_method']) && ($bookingpress_appointment_data['bookingpress_deposit_payment_method'] == "deposit_or_full_price") ){
					$bookingpress_deposit_selected_type = !empty($bookingpress_appointment_data['deposit_payment_type']) ? $bookingpress_appointment_data['deposit_payment_type'] : '';
					$bookingpress_deposit_selected_amount = !empty($bookingpress_appointment_data['bookingpress_deposit_amt_without_currency']) ? floatval($bookingpress_appointment_data['bookingpress_deposit_amt_without_currency']) : 0;
					$bookingpress_due_amount = !empty($bookingpress_appointment_data['bookingpress_deposit_due_amt_without_currency']) ? floatval($bookingpress_appointment_data['bookingpress_deposit_due_amt_without_currency']) : 0;

					if(!empty($bookingpress_deposit_selected_amount)){
						$__payable_amount = $bookingpress_deposit_selected_amount;
					}
					
					$bookingpress_deposit_details = array(
						'deposit_selected_type' => $bookingpress_deposit_selected_type,
						'deposit_amount' => $bookingpress_deposit_selected_amount,
						'deposit_due_amount' => $bookingpress_due_amount,
					);
				}

				$return_data['payable_amount'] = (float) $__payable_amount;

				//echo "<br>Payable amount 2===>".$return_data['payable_amount'] ;

				// Apply coupon if coupon module enabled
				$bookingpress_coupon_code         = ! empty( $bookingpress_appointment_data['coupon_code'] ) ? $bookingpress_appointment_data['coupon_code'] : '';
				$discounted_amount                = !empty($bookingpress_appointment_data['coupon_discount_amount']) ? floatval($bookingpress_appointment_data['coupon_discount_amount']) : 0;
				$bookingpress_is_coupon_applied   = 0;
				$bookingpress_applied_coupon_data = array();

				if ( $bookingpress_coupons->bookingpress_check_coupon_module_activation() && ! empty( $bookingpress_coupon_code )) {
					$bookingpress_applied_coupon_data = ! empty( $bookingpress_appointment_data['applied_coupon_res'] ) ? $bookingpress_appointment_data['applied_coupon_res'] : array();
					$bookingpress_applied_coupon_data['coupon_discount_amount'] = $discounted_amount;
					$bookingpress_is_coupon_applied = 1;
				}

				$bookingpress_selected_extra_members = !empty($bookingpress_appointment_data['bookingpress_selected_bring_members']) ? $bookingpress_appointment_data['bookingpress_selected_bring_members'] : 1;

				$bookingpress_extra_services = !empty($bookingpress_appointment_data['bookingpress_selected_extra_details']) ? $bookingpress_appointment_data['bookingpress_selected_extra_details'] : array();
				$bookingpress_extra_services_db_details = array();

				if(!empty($bookingpress_extra_services)){
					foreach($bookingpress_extra_services as $k => $v){
						if($v['bookingpress_is_selected'] == "true"){
							$bookingpress_extra_service_id = intval($k);
							$bookingpress_extra_service_details = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$tbl_bookingpress_extra_services} WHERE bookingpress_extra_services_id = %d", $bookingpress_extra_service_id ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_extra_services is a table name. false alarm

							if(!empty($bookingpress_extra_service_details)){
								$bookingpress_extra_service_price = ! empty( $bookingpress_extra_service_details['bookingpress_extra_service_price'] ) ? floatval( $bookingpress_extra_service_details['bookingpress_extra_service_price'] ) : 0;

								$bookingpress_selected_qty = !empty($v['bookingpress_selected_qty']) ? intval($v['bookingpress_selected_qty']) : 1;

								if(!empty($bookingpress_selected_qty)){
									$bookingpress_final_price = $bookingpress_extra_service_price * $bookingpress_selected_qty;
									$v['bookingpress_final_payable_price'] = $bookingpress_final_price;
									$v['bookingpress_extra_service_details'] = $bookingpress_extra_service_details;
									array_push($bookingpress_extra_services_db_details, $v);
								}
							}
						}
					}
				}
	
				$bookingpress_selected_staffmember = 0;
				$bookingpress_is_any_staff_selected = 0;
				$bookingpress_staff_member_firstname = "";
				$bookingpress_staff_member_lastname = "";
				$bookingpress_staff_member_email_address = "";
				$bookingpress_staffmember_price = 0;
				$bookingpress_staffmember_details = array();

				if($bookingpress_pro_staff_members->bookingpress_check_staffmember_module_activation()){
					$bookingpress_selected_staffmember = !empty($bookingpress_appointment_data['bookingpress_selected_staff_member_details']['selected_staff_member_id']) ? $bookingpress_appointment_data['bookingpress_selected_staff_member_details']['selected_staff_member_id'] : 0;
					$bookingpress_is_any_staff_selected = !empty($bookingpress_appointment_data['bookingpress_selected_staff_member_details']['is_any_staff_option_selected']) ? 1 : 0;
					if(!empty($bookingpress_selected_staffmember)){
						$bookingpress_staffmember_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_staffmembers} WHERE bookingpress_staffmember_id = %d", $bookingpress_selected_staffmember), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staffmembers is table name.
						$bookingpress_staff_member_firstname = !empty($bookingpress_staffmember_details['bookingpress_staffmember_firstname']) ? $bookingpress_staffmember_details['bookingpress_staffmember_firstname'] : '';
						$bookingpress_staff_member_lastname = !empty($bookingpress_staffmember_details['bookingpress_staffmember_lastname']) ? $bookingpress_staffmember_details['bookingpress_staffmember_lastname'] : '';
						$bookingpress_staff_member_email_address = !empty($bookingpress_staffmember_details['bookingpress_staffmember_email']) ? $bookingpress_staffmember_details['bookingpress_staffmember_email'] : '';

						$bookingpress_staffmember_details['is_any_staff_selected'] = $bookingpress_is_any_staff_selected;

						//Fetch staff member price
						$bookingpress_staffmember_price_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_staffmembers_services} WHERE bookingpress_staffmember_id = %d AND bookingpress_service_id = %d", $bookingpress_selected_staffmember, $bookingpress_selected_service_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_staffmembers_services is table name.
						$bookingpress_staffmember_price = !empty($bookingpress_staffmember_price_details['bookingpress_service_price']) ? floatval($bookingpress_staffmember_price_details['bookingpress_service_price']) : 0;
					}
				}
				$bookingpress_total_amount = $bookingpress_appointment_data['total_payable_amount'];

				// Insert data into entries table.
				$bookingpress_entry_details = array(
					'bookingpress_customer_id'                    => $bookingpress_customer_id,
					'bookingpress_order_id'                       => 0,
					'bookingpress_customer_name'                  => $customer_full_name,
					'bookingpress_username'                       => $customer_username,
					'bookingpress_password'                       => wp_hash_password( $customer_password ),
					'bookingpress_customer_phone'                 => $customer_phone,
					'bookingpress_customer_firstname'             => $customer_firstname,
					'bookingpress_customer_lastname'              => $customer_lastname,
					'bookingpress_customer_country'               => $customer_country,
					'bookingpress_customer_phone_dial_code'       => $customer_phone_dial_code,
					'bookingpress_customer_email'                 => $customer_email,
					'bookingpress_customer_timezone'              => $customer_timezone,
					'bookingpress_dst_timezone'					  => $customer_dst_timezone,
					'bookingpress_service_id'                     => $bookingpress_selected_service_id,
					'bookingpress_service_name'                   => $service_data['bookingpress_service_name'],
					'bookingpress_service_price'                  => $bookingpress_service_price,
					'bookingpress_service_currency'               => $bookingpress_currency_name,
					'bookingpress_service_duration_val'           => $service_data['bookingpress_service_duration_val'],
					'bookingpress_service_duration_unit'          => $service_data['bookingpress_service_duration_unit'],
					'bookingpress_payment_gateway'                => $payment_gateway,
					'bookingpress_appointment_date'               => $bookingpress_appointment_booked_date,
					'bookingpress_appointment_time'               => $bookingpress_selected_start_time,
					'bookingpress_appointment_end_time'  		  => $bookingpress_selected_end_time,
					'bookingpress_appointment_internal_note'      => $bookingpress_internal_note,
					'bookingpress_appointment_send_notifications' => 1,
					'bookingpress_appointment_status'             => $bookingpress_appointment_status,
					'bookingpress_coupon_details'                 => wp_json_encode( $bookingpress_applied_coupon_data ),
					'bookingpress_coupon_discount_amount'         => $discounted_amount,
					'bookingpress_deposit_payment_details'        => wp_json_encode( $bookingpress_deposit_details ),
					'bookingpress_deposit_amount'                 => $bookingpress_deposit_selected_amount,
					'bookingpress_selected_extra_members'         => $bookingpress_selected_extra_members,
					'bookingpress_extra_service_details'          => wp_json_encode( $bookingpress_extra_services_db_details ),
					'bookingpress_staff_member_id'                => $bookingpress_selected_staffmember,
					'bookingpress_staff_member_price'             => $bookingpress_staffmember_price,
					'bookingpress_staff_first_name'               => $bookingpress_staff_member_firstname,
					'bookingpress_staff_last_name'                => $bookingpress_staff_member_lastname,
					'bookingpress_staff_email_address'            => $bookingpress_staff_member_email_address,
					'bookingpress_staff_member_details'           => wp_json_encode($bookingpress_staffmember_details),
					'bookingpress_paid_amount'                    => $__payable_amount,
					'bookingpress_due_amount'                     => $bookingpress_due_amount,
					'bookingpress_total_amount'                   => $bookingpress_total_amount,
					'bookingpress_created_at'                     => current_time( 'mysql' ),
				);
				
                ECHO "<br /><br />entry data before insert <br />";
                print_r($bookingpress_entry_details);
                echo "<br /><br />";
                #exit;
                
				$bookingpress_entry_details = apply_filters( 'bookingpress_modify_entry_data_before_insert', $bookingpress_entry_details, $posted_data );
                
                
				do_action( 'bookingpress_payment_log_entry', $payment_gateway, 'submit appointment form front', 'bookingpress pro', $bookingpress_entry_details, $bookingpress_debug_payment_log_id );

				$wpdb->insert( $tbl_bookingpress_entries, $bookingpress_entry_details );
				$entry_id = $wpdb->insert_id;

do_action( 'bookingpress_after_entry_data_insert', $entry_id,$posted_data);

				$return_data['entry_id'] = $entry_id;
				$return_data['booking_form_redirection_mode'] = !empty($posted_data['booking_form_redirection_mode'])? $posted_data['booking_form_redirection_mode']:0;

				$bookingpress_uniq_id = $posted_data['bookingpress_uniq_id'];
				$bookingpress_cookie_name = $bookingpress_uniq_id."_appointment_data";
				$bookingpress_cookie_value = $entry_id;

				$bookingpress_cookie_exists = !empty($_COOKIE[$bookingpress_cookie_name]) ? 1 : 0;
				if($bookingpress_cookie_exists){
					setcookie($bookingpress_cookie_name, "", time()-3600, "/");
					setcookie("bookingpress_last_request_id", "", time()-3600, "/");
					setcookie("bookingpress_referer_url", "", time() - 3600, "/");
				}

				$bookingpress_referer_url = (wp_get_referer()) ? wp_get_referer() : BOOKINGPRESS_HOME_URL;
				$bookingpress_encoded_value = base64_encode($entry_id);
				setcookie($bookingpress_cookie_name, $bookingpress_encoded_value, time()+(86400), "/");
				setcookie("bookingpress_last_request_id", $bookingpress_uniq_id, time()+(86400), "/");
				setcookie("bookingpress_referer_url", $bookingpress_referer_url, time()+(86400), "/");

				$bookingpress_entry_hash = md5($entry_id);
				
				$bookingpress_after_approved_payment_page_id = $BookingPress->bookingpress_get_customize_settings( 'after_booking_redirection', 'booking_form' );
				$bookingpress_after_approved_payment_url     = get_permalink( $bookingpress_after_approved_payment_page_id );

				$bookingpress_after_canceled_payment_page_id = $BookingPress->bookingpress_get_customize_settings( 'after_failed_payment_redirection', 'booking_form' );
				$bookingpress_after_canceled_payment_url     = get_permalink( $bookingpress_after_canceled_payment_page_id );
				
				if( !empty($posted_data['booking_form_redirection_mode']) && $posted_data['booking_form_redirection_mode'] == "in-built" ){
					$bookingpress_approved_appointment_url = $bookingpress_canceled_appointment_url = $bookingpress_referer_url;
					$bookingpress_approved_appointment_url = add_query_arg('is_success', 1, $bookingpress_after_approved_payment_url);
					$bookingpress_approved_appointment_url = add_query_arg('appointment_id', base64_encode($entry_id), $bookingpress_approved_appointment_url);
					$bookingpress_approved_appointment_url = add_query_arg( 'bp_tp_nonce', wp_create_nonce( 'bpa_nonce_url-'.$bookingpress_entry_hash ), $bookingpress_approved_appointment_url );

					$bookingpress_canceled_appointment_url = add_query_arg('is_success', 2, $bookingpress_canceled_appointment_url);
					$bookingpress_canceled_appointment_url = add_query_arg('appointment_id', base64_encode($entry_id), $bookingpress_canceled_appointment_url);
					$bookingpress_canceled_appointment_url = add_query_arg( 'bp_tp_nonce', wp_create_nonce( 'bpa_nonce_url-'.$bookingpress_entry_hash ), $bookingpress_canceled_appointment_url );

					$return_data['approved_appointment_url'] = $bookingpress_approved_appointment_url;
					$return_data['pending_appointment_url'] = $return_data['approved_appointment_url'];
					$return_data['canceled_appointment_url'] = $bookingpress_canceled_appointment_url;
				}else{
					$bookingpress_after_approved_payment_url = ! empty( $bookingpress_after_approved_payment_url ) ? $bookingpress_after_approved_payment_url : BOOKINGPRESS_HOME_URL;
					$bookingpress_after_approved_payment_url = add_query_arg('appointment_id', base64_encode($entry_id), $bookingpress_after_approved_payment_url);
					$bookingpress_after_approved_payment_url = add_query_arg( 'bp_tp_nonce', wp_create_nonce( 'bpa_nonce_url-'.$bookingpress_entry_hash ), $bookingpress_after_approved_payment_url );
					$return_data['approved_appointment_url'] = $bookingpress_after_approved_payment_url;

					$bookingpress_after_canceled_payment_url = ! empty( $bookingpress_after_canceled_payment_url ) ? $bookingpress_after_canceled_payment_url : BOOKINGPRESS_HOME_URL;
					$bookingpress_after_canceled_payment_url = add_query_arg('appointment_id', base64_encode($entry_id), $bookingpress_after_canceled_payment_url);
					$return_data['canceled_appointment_url'] = $bookingpress_after_canceled_payment_url;
					
					$return_data['pending_appointment_url'] = $return_data['approved_appointment_url'];
				}

				$bookingpress_notify_url   = BOOKINGPRESS_HOME_URL . '/?bookingpress-listener=bpa_pro_' . $payment_gateway . '_url';
				$return_data['notify_url'] = $bookingpress_notify_url;
				
$return_data = apply_filters( 'bookingpress_add_modify_validate_submit_form_data', $return_data, $payment_gateway, $posted_data );

				//Enter data in appointment meta table
				//------------------------------
				$bookingpress_appointment_service_data = array(
					'service_id' => $posted_data['selected_service'],
					'service_name' => $posted_data['selected_service_name'],
					'service_price' => $posted_data['selected_service_price'],
					'service_price_without_currency' => $posted_data['service_price_without_currency'],
					'extra_service_details' => !empty($posted_data['bookingpress_selected_extra_details']) ? $posted_data['bookingpress_selected_extra_details'] : array(),
					'selected_bring_members' => !empty($posted_data['bookingpress_selected_bring_members']) ? $posted_data['bookingpress_selected_bring_members'] : 1,
					'selected_service_max_capacity' => !empty($posted_data['service_max_capacity']) ? $posted_data['service_max_capacity'] : 1,
					'selected_staffmember_details' => !empty($posted_data['bookingpress_selected_staff_member_details']) ? $posted_data['bookingpress_selected_staff_member_details'] : array(),
					'is_extra_service_exists' => !empty($posted_data['is_extra_service_exists']) ? $posted_data['is_extra_service_exists'] : 0,
					'is_staff_exists' => !empty($posted_data['is_staff_exists']) ? $posted_data['is_staff_exists'] : 0,
				);
				$bookingpress_db_fields = array(
					'bookingpress_entry_id' => $entry_id,
					'bookingpress_appointment_id' => 0,
					'bookingpress_appointment_meta_key' => 'appointment_service_data',
					'bookingpress_appointment_meta_value' => wp_json_encode($bookingpress_appointment_service_data),
				);
				$wpdb->insert($tbl_bookingpress_appointment_meta, $bookingpress_db_fields);

				do_action( 'bookingpress_other_debug_log_entry', 'appointment_debug_logs', 'Appointment meta service data', 'bookingpress_submit_booking_request', $bookingpress_db_fields, $bookingpress_other_debug_log_id );

				//------------------------------
				$bookingpress_appointment_timeslot_data = array(
					'timeslot_data' => !empty($posted_data['service_timing']) ? $posted_data['service_timing'] : array(),
					'selected_date' => !empty($posted_data['selected_date']) ? $posted_data['selected_date'] : '',
					'selected_start_time' => !empty($posted_data['selected_start_time']) ? $posted_data['selected_start_time'] : '',
					'selected_end_time' => !empty($posted_data['selected_end_time']) ? $posted_data['selected_end_time'] : '',
					'selected_service_max_capacity' => !empty($posted_data['service_max_capacity']) ? $posted_data['service_max_capacity'] : 1,
				);
				$bookingpress_db_fields = array(
					'bookingpress_entry_id' => $entry_id,
					'bookingpress_appointment_id' => 0,
					'bookingpress_appointment_meta_key' => 'appointment_timeslot_data',
					'bookingpress_appointment_meta_value' => wp_json_encode($bookingpress_appointment_timeslot_data),
				);
				$wpdb->insert($tbl_bookingpress_appointment_meta, $bookingpress_db_fields);

				do_action( 'bookingpress_other_debug_log_entry', 'appointment_debug_logs', 'Appointment meta timeslot data', 'bookingpress_submit_booking_request', $bookingpress_db_fields, $bookingpress_other_debug_log_id );

				//------------------------------
				$form_fields_save_data = !empty($posted_data['form_fields']) ? $posted_data['form_fields'] : array(); 				
				$bookingpress_repeater_fields_key = !empty($posted_data['bookingpress_repeater_fields_key']) ? $posted_data['bookingpress_repeater_fields_key'] : array();
				$form_fields_save_data = apply_filters('bookingpress_removed_repeater_data_in_fields', $form_fields_save_data, $posted_data);
				
				$bookingpress_appointment_form_fields_data = array(
					'form_fields' => $form_fields_save_data,
					'bookingpress_front_field_data' => !empty($posted_data['bookingpress_front_field_data']) ? $posted_data['bookingpress_front_field_data'] : array(),
				);

				$bookingpress_db_fields = array(
					'bookingpress_entry_id' => $entry_id,
					'bookingpress_appointment_id' => 0,
					'bookingpress_appointment_meta_key' => 'appointment_form_fields_data',
					'bookingpress_appointment_meta_value' => wp_json_encode($bookingpress_appointment_form_fields_data),
				);
				$wpdb->insert($tbl_bookingpress_appointment_meta, $bookingpress_db_fields);

				do_action('bookingpress_after_insert_entry_data_from_frontend',$entry_id,$bookingpress_appointment_data);

				do_action( 'bookingpress_other_debug_log_entry', 'appointment_debug_logs', 'Appointment meta form fields data', 'bookingpress_submit_booking_request', $bookingpress_db_fields, $bookingpress_other_debug_log_id );
			}else{
				$return_data = apply_filters('bookingpress_modify_appointment_return_data', $bookingpress_appointment_data, $payment_gateway, $posted_data);
			}

$return_data = apply_filters( 'bookingpress_after_modify_validate_submit_form_data', $return_data );

			return $return_data; 
		}//fin func
        
        /*
         function bk_mod_validate_booking_form_NO_PRO($payment_gateway ,$posted_data){
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

                echo "<br /><br />ENTRY DETAILDS<br /><br />";
                print_r($bookingpress_entry_details);
                exit;
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
