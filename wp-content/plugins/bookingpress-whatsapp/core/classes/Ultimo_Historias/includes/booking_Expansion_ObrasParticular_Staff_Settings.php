<?php

/**
 * @author Maximiliano Suarez
 * @copyright 2025
 */
 
if( !class_exists('booking_Expansion_ObrasParticular_Staff_Settings') ){
    
    class booking_Expansion_ObrasParticular_Staff_Settings{
        
        public function __construct(){
            #@ini_set('display_errors', 1);
            add_action('wp_ajax_get_bookings_day', [$this, 'extend_ajax_get_bookings_day'], 8);
            add_action('wp_ajax_nopriv_get_bookings_day', [$this, 'extend_ajax_get_bookings_day'], 8);
            //2026 UPDATES
            add_action('booking_Expansion_on_save_config_medico', [$this, 'extend_save_all_obras_data'], 10);
            
            add_filter( 'extend_get_active_obras_medico', [$this, 'extend_merge_active_items'], 10, 2);
            
            add_filter('booking_Expansion_get_admin_config_medico', [$this, 'extend_get_config_medico'], 10, 2);
            add_filter('validate_config_medico_get_bookings_day', [$this, 'extend_get_bookings_day'], 10, 6);
            
            add_filter('booking_Expansion_get_all_obras_filter', [$this, 'extend_items_data'], 10);
            add_filter('booking_Expansion_get_all_seguros_filter', [$this, 'extend_items_data'], 10);
            
            if( !is_admin() ){
                                                           
                    add_action( 'wp_enqueue_scripts', [$this, 'enqueue_scripts'] );
                    //add_action('wp_print_footer_scripts', [$this, 'test_js_filter_function'], 100);
            }else{
                    add_action( 'admin_enqueue_scripts', [$this, 'enqueue_scripts'] );
                    //add_action('admin_print_scripts', [$this, 'enqueue_js_filter_function'], 11);
                    //add_action('admin_print_footer_scripts', [$this, 'test_js_filter_function'], 100);
            }
        }
        
        /**
         * extend_save_all_obras_data
         * @param parametros Array ([Array obras],[Array seguros],[Array appoint_data])
         * @param update_prop String obras|seguros
         */
        function extend_save_all_obras_data( $parametros = [], $update_prop = 'obras' ){
            $success = 0;
            #$obras = !empty($parametros['obras']) && is_array($parametros['obras'])? $parametros['obras'] : [];
            $obras = !empty($parametros[$update_prop]) && is_array($parametros[$update_prop])? $parametros[$update_prop] : [];
            if( empty($obras) ) return $success;
            
            $obras_vkeys = array_column($obras, null, 'value');
            unset( $parametros, $obras );
            
            $all_obras = ( $update_prop == 'seguros' )? get_all_seguros() : get_all_obras();
                        
            foreach( $all_obras as $k => $obra ){
                $vkey_data = !empty($obras_vkeys[ $obra['value'] ])? $obras_vkeys[ $obra['value'] ] : [];
                $all_obras[$k]['rnas'] = !empty($vkey_data['rnas'])? $vkey_data['rnas'] : ( !empty($obra['rnas'])? $obra['rnas'] : '' );
                #TEST DE SSSalud Name ASignado //echo ' obra sname: "'. (!empty($obra['sss_name'])? $obra['sss_name'] : '') . '"'."\n";
                $all_obras[$k]['sss_name'] = !empty($vkey_data['sss_name'])? $vkey_data['sss_name'] : ( !empty($obra['sss_name'])? $obra['sss_name'] : '' );
                
            }
            /**
            $print_test_obras = array_filter( $all_obras, function( $val ){
                return !empty($val['rnas']) || !empty($val['sss_name']); 
            });
            print_r( ['TEST obrasss', $print_test_obras ]); exit;
            
            ###YA NO ES NECESARIO ORDENAR YA Que se utiliza foreach no altera el orden
                //Antes de guardar volvemos a ordenar por id
                    #$ob_col_id = array_column($all_obras, 'id');
                    #sort($ob_col_id, SORT_ASC);
            */
                if( $update_prop == 'seguros' ){
                    $success = update_option("todos_los_seguros", $all_obras);
                }else{
                    $success = update_option("todas_las_obras", $all_obras);
                }
                
            return $success;
        }
        
        /**
         * extend_merge_active_items
         * @param Array $items
         * @param Array $secondary_items
         * @param bool $preserve_first_value = TRUE (Si el medico aplica un valor se usara ese para es medico y no la definicion general - Realmente Deberia ser el mismo para todos)
         * Principalmente para aplicar los rnas y nombres a los items Obras activas
         *      cuando se obtienen las obras de los medicos ( items - ha de ser expandible a los seguros)
         */
        function extend_merge_active_items( $items = [] , $secondary_items = [], $preserve_first_value = true){
            if( empty($secondary_items) || empty($items) ) return $items;
            $secundary_vkeys = array_column( (array) $secondary_items, null, 'value');
            unset($secondary_items);
            foreach( (array) $items as $k => $obra ){
                $vkey_data = !empty($secundary_vkeys[ $obra['value'] ])? $secundary_vkeys[ $obra['value'] ] : [];
                if(!$preserve_first_value){
                    $items[$k]['rnas'] = !empty($vkey_data['rnas'])? $vkey_data['rnas'] : ( !empty($obra['rnas'])? $obra['rnas'] : '' );
                    $items[$k]['sss_name'] = !empty($vkey_data['sss_name'])? $vkey_data['sss_name'] : ( !empty($obra['sss_name'])? $obra['sss_name'] : '' );
                    }else{
                        $items[$k]['rnas'] = !empty($obra['rnas'])? $obra['rnas'] : ( !empty($vkey_data['rnas'])? $vkey_data['rnas'] : '' );
                        $items[$k]['sss_name'] = !empty($obra['sss_name'])? $obra['sss_name'] : ( !empty($vkey_data['sss_name'])? $vkey_data['sss_name'] : '' );
                }
                
            }
            
            unset($secundary_vkeys);
            return $items;
        }
        
        
        function extend_ajax_get_bookings_day(){
            
            remove_action('wp_ajax_get_bookings_day', 'ajax_get_bookings_day');
            remove_action('wp_ajax_nopriv_get_bookings_day', 'ajax_get_bookings_day');
            
            $config_medico=array();
            $medico = 0;
            $service_id = 0;//Se agrego Service_ID requerido para descontar cupos por servicio si se definio/selecciono uno.
            $date = "2024-01-01";//example lo reescribe con appoint_data
            $hora="";
            if(!empty($_REQUEST['appoint_data']) ){
                $appoint_data = is_array($_REQUEST['appoint_data'])? $_REQUEST['appoint_data']: json_decode($_REQUEST['appoint_data'], true);
                extract($appoint_data);
            }
            
            //2026-03-30 updates
            //$medico || exit("");
            $service_id = absint($service_id);
            
            if( !$medico ){
                if( $service_id ){
                    //global $expansion_extend_fields_services;
                    //$config_medico['is_only_particular_service'] = $expansion_extend_fields_services->get_service_is_only_particular( $service_id );
                    
                    wp_send_json( $config_medico );
                }
                exit;
            }
            
            //ob_start();
                $config_medico = $this->extend_get_bookings_day( $medico, $date, $hora, false, $service_id, $appoint_data );
            //ob_get_clean();
            
            if( is_array($config_medico) ){
            wp_send_json( $config_medico );
            }
            exit;
        }
        
        /**
         * extend_get_bookings_day
         * 
         * TEST serviccio cardiologia 2
         * TEST serviccio Ergometrias 62
         * 
         */    
        function extend_get_bookings_day( $medico = 0, $date = "2024-01-01", $hora="", $solo_config=false, $selected_service_id = 0, $request_data = [] ){
            global $wpdb, $BookingPress, $tbl_bookingpress_services,$tbl_bookingpress_appointment_bookings, $tbl_bookingpress_appointment_meta, $tbl_bookingpress_payment_logs,$tbl_bookingpress_customers,$bookingpress_global_options,$tbl_bookingpress_form_fields;
            $response = array();
            //print_r(['selservice', $selected_service_id]);
            if( empty($medico) || empty($date) ){
                #print_r("");
                return "faltan datos.";
            }
            
            $medico_id= $medico;
            $config_medico = array();
                        $obras_medico = get_option('medico_opt_obras_'.$medico_id, [] );
                        $obras_medico = is_array($obras_medico)? $obras_medico: json_decode($obras_medico, true );
                        
                        $config_medico = get_option('medico_opt_config_'.$medico_id, []);
            if( !empty($config_medico) && $solo_config == false ) {
                $obras_medico = array_filter($obras_medico, function($o){ return $o['active'];});
                //$this->extend_merge_active_items()
                
                $obras_medico = apply_filters('extend_get_active_obras_medico', $obras_medico, get_all_obras(), true, $medico_id);
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
            
            include BKMOD_DIR . '/config_medicos.php';
            
            }
            //2026-03-30 updates
            global $expansion_extend_fields_services, $bookingpress_pro_staff_members;
            $config_medico['staff_only_particular'] = 0;
            $config_medico['is_only_particular_service'] = $expansion_extend_fields_services->get_service_is_only_particular( $selected_service_id );            
            if( $medico_id && $selected_service_id ){
                $staff_only_particular = $bookingpress_pro_staff_members->get_bookingpress_staffmembersmeta( $medico_id, 'expansion_staff_service_particular_' . $selected_service_id )?? 0;
                $config_medico['staff_only_particular'] = $staff_only_particular;
                if( !empty($staff_only_particular) ){
                    $config_medico['is_only_particular_service'] = $staff_only_particular==1? true: false;
                }
            }
            
            $config_medico_original = $config_medico;
            if( $solo_config ) return $config_medico;
            
            /** update 2025-11 Se agrega service_id al resltado y Array $obra_by_service_count */
            
            $where = " WHERE bookingpress_staff_member_id='{$medico}' AND bookingpress_appointment_date='{$date}' AND bookingpress_appointment_meta_key='obra_soc_art' ";
            
            $select_fields = "bookingpress_staff_member_id medico, bookingpress_appointment_date date, bookingpress_appointment_time hora, bookingpress_appointment_meta_value obra_soc_art, bookingpress_service_id";
            
            $res = $wpdb->get_results("SELECT $select_fields FROM {$tbl_bookingpress_appointment_bookings} join {$tbl_bookingpress_appointment_meta} meta ON bookingpress_appointment_booking_id = meta.bookingpress_appointment_id {$where} ", ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
            
            $obra_count = $obra_by_service_count = array();
            foreach($res as $turnos){
#var_dump($turnos);
                if( isset($obra_count[ $turnos['obra_soc_art'] ]) ){
                    $obra_count[ $turnos['obra_soc_art'] ]++;
                }else{
                    $obra_count[ $turnos['obra_soc_art'] ] = 1;
                }
                
                $obra_val = "";
                $obra_val = trim( reset(explode( '-', $turnos['obra_soc_art'])) );
                // Key ObraSocial value Key Service ID
                if( empty($obra_by_service_count[ $obra_val ][ (string) $turnos['bookingpress_service_id'] ]) ){
                    $obra_by_service_count[ $obra_val ][ (string) $turnos['bookingpress_service_id'] ] = 1;
                }else{
                    $obra_by_service_count[ $obra_val ][ (string) $turnos['bookingpress_service_id'] ]++;
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

                $cupo_x_ob[$obra_val] = !empty($cupo_x_ob[$obra_val])? $cupo_x_ob[$obra_val]+$count : $count;

            }
            
#var_dump( array_keys($obra_by_service_count["ACA SALUD"])  );
#var_dump( $obra_by_service_count );

            if( !empty($config_medico['obras_sociales']) ){
                foreach($config_medico['obras_sociales'] as $k=> $opcion ){
                    //2025 updates
                    $cupos = $is_extend_cupos = 0; $obra_val = "";
                    $config_medico['obras_sociales'][$k]['cupos'] = (int) $config_medico['obras_sociales'][$k]['cupos'];
                    
                    $is_extend_cupos = !empty( $opcion["extend"] )? 1:0;
                    #var_dump($is_extend_cupos, $opcion['cupo_grupos'] ); echo "x" . nl2br("   ");
                    if( $is_extend_cupos  &&  !empty( $opcion["limitado"] ) && $selected_service_id ){
                        
                        $obra_val = trim( reset(explode( '-', $opcion["value"])) );
                        
                        //if( !empty($obra_by_service_count[ $obra_val ]) ){
                            foreach( $opcion['cupo_grupos'] as $slots_group ) {
                                #var_dump($slots_group ); echo nl2br(" z ");
                                if( in_array( $selected_service_id, $slots_group['servs'] ) ){
                                    $config_medico['obras_sociales'][$k]['limitado'] = $slots_group['limitado'];
                                    $config_medico['obras_sociales'][$k]['cupos'] = (int) $slots_group['cupos'];
                                    
                                    if( !empty($slots_group['limitado']) ){
                                        foreach( $slots_group['servs'] as $in_group_service_id ){
                                            //if( empty($obra_by_service_count[ $obra_val ][ (string) $selected_service_id ]) ) continue;
                                            if( empty($obra_by_service_count[ $obra_val ][ (string) $in_group_service_id]) ) continue;
                                                
                                                $cupos = (int) $config_medico['obras_sociales'][$k]['cupos'];
                                                $cupos = $cupos - (int) $obra_by_service_count[ $obra_val ][ (string) $in_group_service_id ];
                                                $cupos = ( $cupos < 1 )? 0 : $cupos;
                                                $config_medico['obras_sociales'][$k]['cupos'] = $cupos;
                                                
                                                #echo nl2br( " /* "); echo nl2br( "  in_group_service_id cupos <br> "); echo nl2br( "  ");
                                                #var_dump($in_group_service_id, $cupos , $obra_by_service_count[ $obra_val ] ); echo nl2br( " */ ");
                                            
                                        }
                                    }
                                    #echo nl2br( " slots_group y obra_by_service_count : "); echo nl2br( "");
                                    #var_dump($slots_group, $obra_by_service_count ); nl2br( " - ");
                                    break;
                                }
                            }
                            
                        //}
                        
                        /**
                        if( !empty($obra_by_service_count[ $obra_val ][ (string) $selected_service_id ]) ){
                            
                            $cupos = (int) $config_medico['obras_sociales'][$k]['cupos'];
                            $cupos = $cupos - (int) $obra_by_service_count[ $obra_val ][ (string) $selected_service_id ];
                            $cupos = ( $cupos < 1 )? 0 : $cupos;
                            $config_medico['obras_sociales'][$k]['cupos'] = $cupos;
                        }*/
                        
                        
                        
                    }
                    
                    //Mantenemos la logica por defecto por compatibilidad                    
                    if( !$is_extend_cupos  &&  !empty( $opcion["limitado"] ) ){
                        
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
        
        public function extend_get_config_medico( $config_medico = [], $medico_id = 0 ){
            
            
            $config_medico['obras_sociales'] = $this->extend_items_data( $config_medico['obras_sociales'] );
            
            $config_medico['seguros_convenio'] = array_map(function($item){
                $item['extend'] = empty($item['extend'])? false:true;
                if( !isset($item['cupo_grupos']) ) $item['cupo_grupos'] = [ array( 'servs'=> [], 'limitado'=> 0, 'cupos'=> 10 ) ];
                return $item;
            }, 
            $config_medico['seguros_convenio']
            );
            //print_r( $config_medico['obras_sociales'] ); exit;
            return $config_medico;
        }
        
        public function extend_items_data( $items = [] ){
            $items = array_map( function($item){
                    $item['extend'] = empty($item['extend'])? false:true;
                    if( !isset($item['cupo_grupos']) ) $item['cupo_grupos'] = [ array( 'servs'=> [], 'limitado'=> 0, 'cupos'=> 10 ) ];
                    $item = array_merge( [ 'rnas'=> null, 'sss_name'=> '' ], $item );
                    return $item;
                }, 
                $items
            );
            
            return $items;
        }
        
        
        
        
        public function enqueue_js_filter_function(){
            ?>
<script id="booking_expansion_expansion_filter_func">
console.log('mod_manage_appointment linea 461 condicion comentada x test');
var booking_expansion_global_filter_var = {};
function booking_expansion_filter_data(hook, ...datas ){
    if ( datas.length ) {
        let to_filter_var = datas[0];
        
        //let extra_data = datas.slice(1);
        if( Array.isArray( booking_expansion_global_filter_var[hook] ) ){
            for ( filter in booking_expansion_global_filter_var[hook] ){
                //booking_expansion_global_filter_var[hook]
                
                to_filter_var  = booking_expansion_global_filter_var[hook][filter].callback( ...datas )
            }
            
        }
        
        return to_filter_var;
    }
    return;
}

function booking_expansion_add_filter(hook, filter_func ){
    if( filter_func ){
        if( !Array.isArray( booking_expansion_global_filter_var[hook] ) ) booking_expansion_global_filter_var[hook] = [];
        booking_expansion_global_filter_var[hook].push({ 'callback': filter_func});
    }
}

booking_expansion_add_filter('medic_opss__postdata', function( bk_mod_postdata, appointment_step_form_data ){
    
    let selected_service = appointment_step_form_data.selected_service? appointment_step_form_data.selected_service:0;
    bk_mod_postdata.appoint_data.service_id = selected_service;
    //console.log("filter post data add service_id", selected_service, bk_mod_postdata)
    return bk_mod_postdata;
});
</script>
            <?php
        }
        
        
        public function test_js_filter_function(){
            ?>
<script id="booking_expansion_expansion_test_filter">
var chocolate = "chocolate";
console.log( chocolate )

booking_expansion_add_filter("filtro_chocolate", maxi_choco);

chocolate = booking_expansion_filter_data("filtro_chocolate","chocolate", "manzana");
console.log( chocolate )

function maxi_choco( a, b){
    console.log("llamada a filtro")
    return "frutilla";
}
//setTimeout(()=>{ chocolate = booking_expansion_filter_data("filtro_chocolate","chocolate", "manzana"); console.log( chocolate ) },3000);

</script>
            <?php
        }
        
        public function enqueue_scripts( ){
            if( !defined('BPHC_PLUGIN_URL') ) return;
                 #echo BPHC_PLUGIN_URL . 'src/js/booking-expansion-js-filter.js';       
            if( file_exists(BPHC_PLUGIN_DIR . 'src/js/booking-expansion-js-filter.js') ){
                wp_enqueue_script(
                    'booking_expansion_expansion_filter_func',
                    BPHC_PLUGIN_URL . 'src/js/booking-expansion-js-filter.js',
                    [],
                    '1.0',
                    false
                );
                #exit("sigue2");
            }else{
                add_action( 'admin_print_scripts', [$this, 'enqueue_js_filter_function'], 11);
                add_action('wp_print_scripts', [$this, 'enqueue_js_filter_function'], 11);
                
            }
                        
        }
        
    }//End class
    
    global $Booking_Expansion_ObrasParticular_Staff_Settings;
    $Booking_Expansion_ObrasParticular_Staff_Settings = new booking_Expansion_ObrasParticular_Staff_Settings();

}


