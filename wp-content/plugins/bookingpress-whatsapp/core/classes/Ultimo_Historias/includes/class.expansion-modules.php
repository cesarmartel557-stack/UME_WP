<?php 
#/wp-admin/admin.php?page=expansion-modules&test_modules 
/**
 *@author Maxi S - foatconcept 
 *@copyright 2026 
 * 
 */
defined('ABSPATH') || exit;

if(!defined('EXPANSION_MODULES_DIR')) define('EXPANSION_MODULES_DIR', BPHC_PLUGIN_DIR . 'includes/expansion-modules/' );
if(!defined('EXPANSION_MODULES_SRC')) define('EXPANSION_MODULES_SRC', plugin_dir_url(__FILE__) . 'expansion-modules/' );

if( !class_exists('Expansion_Modules') ){
    
    class Expansion_Modules {
        
        function Apply_core_updates(){
            global $wpdb, $tbl_internacion_data, $tbl_internacion_ingreso, $tbl_internacion_camas, $tbl_internacion_movimientos;
            $charset_collate = $wpdb->get_charset_collate();
            $update_success = 0;
            $errors = $detalle = [];
            
            $tbl_internacion_data = $wpdb->prefix . 'expansion_internacion_data';
            $tbl_internacion_ingreso = $wpdb->prefix . 'expansion_internacion_ingreso';
            $tbl_internacion_movimientos = $wpdb->prefix . 'expansion_internacion_movimientos';
            $tbl_internacion_camas = $wpdb->prefix . 'expansion_internacion_camas';
            
            if( !($wpdb->get_var(" SHOW TABLES LIKE '$tbl_internacion_camas' ") == $tbl_internacion_camas) ){
                
                // Tabla de Camas
                try{
                    
                $sql = "CREATE TABLE $tbl_internacion_camas (
                    sala varchar(20) NOT NULL,
                    cama varchar(10) NOT NULL,
                    sector varchar(30) NOT NULL,
                    habilitada TINYINT(1) DEFAULT 1, 
                    descri_cama TEXT,
                    coord_x DECIMAL(8,2) NOT NULL DEFAULT 0.00,
                    coord_y DECIMAL(8,2) NOT NULL DEFAULT 0.00,
                    raw_cama TEXT NOT NULL,
                    PRIMARY KEY  (sala, cama),
                    KEY idx_busqueda_plano (sector, sala)
                ) $charset_collate;";
                
                require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                dbDelta( $sql );                
                if(!empty($wpdb->last_error) ){
                    $errors[] =  $wpdb->last_error;
                }
                
                } catch (Exception $e) {
                    // En caso de cualquier fallo, revertimos la base de datos al estado inicial
                    $errors[] = $e->getMessage();
                }
                
            }else{
                $detalle[] = 'creada camas';
                $update_success++;
            }
            
            if( !($wpdb->get_var(" SHOW TABLES LIKE '$tbl_internacion_movimientos' ") == $tbl_internacion_movimientos) ){
                
                // Tabla de Historial de Movimientos
                try{
                $sql = "CREATE TABLE $tbl_internacion_movimientos (
                    id bigint(20) NOT NULL AUTO_INCREMENT,
                    ingreso_id bigint(20) NOT NULL,
                    internacion_id bigint(20) NOT NULL,
                    paciente_id bigint(20) NOT NULL,
                    sala varchar(20) NOT NULL,
                    cama varchar(10) NOT NULL,
                    area varchar(30) NOT NULL,
                    fecha_desde datetime NOT NULL,
                    fecha_hasta datetime DEFAULT NULL,
                    raw_mov TEXT NOT NULL,
                    PRIMARY KEY  (id),
                    KEY idx_paciente_actual (paciente_id, fecha_hasta), -- Índice 1: Ubicación rápida del paciente
                    KEY idx_cama_actual (sala, cama, fecha_hasta),     -- Índice 2: Carga instantánea del mapa de camas
                    KEY idx_ingreso (ingreso_id),
                    KEY idx_internacion (internacion_id)                -- Índice 3: Cronología de una internación específica                    
                ) $charset_collate;";
                
                require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                dbDelta( $sql );
                if(!empty($wpdb->last_error) ){
                    $errors[] =  $wpdb->last_error;
                }
                
                } catch (Exception $e) {
                    // En caso de cualquier fallo, revertimos la base de datos al estado inicial
                    $errors[] = $e->getMessage();
                }

            }else{
                $detalle[] = 'creada Movimientos';
                $update_success++;
            }
            
            
            if( !($wpdb->get_var(" SHOW TABLES LIKE '$tbl_internacion_data' ") == $tbl_internacion_data) ){
                
                // Tabla de internacion General
                try{
                    
                $sql = "CREATE TABLE $tbl_internacion_data (
                    id bigint(20) NOT NULL AUTO_INCREMENT,
                    ingreso_id bigint(20) NOT NULL,
                    id_interno varchar(50) DEFAULT '' NOT NULL,
                    paciente_id bigint(20) NOT NULL,
                    medico_encargado bigint(20) NOT NULL,
                    estado tinyint(1) DEFAULT 1 NOT NULL, -- 0: sin definir, 1: Activo, 2: Alta médica, 3: Derivado, 4: Fallecido
                    medico_name varchar(255) DEFAULT '' NOT NULL,
                    customer_name varchar(255) DEFAULT '' NOT NULL,
                    medico_ingreso_name varchar(255) DEFAULT '' NOT NULL,
                    area_desc varchar(150) DEFAULT '' NOT NULL,
                    destino varchar(255) DEFAULT '' NOT NULL,
                    raw_int JSON DEFAULT NULL, -- Formato JSON Nativo
                    fecha_ingreso datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                    fecha_egreso datetime DEFAULT NULL,
                    PRIMARY KEY  (id),
                    UNIQUE KEY ingreso_id (ingreso_id), -- Restricción de unicidad
                    KEY paciente_id (paciente_id),
                    KEY estado (estado),
                    KEY fecha_ingreso (fecha_ingreso)
                ) $charset_collate;";
                
                require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                dbDelta( $sql );
                if(!empty($wpdb->last_error) ){
                    $errors[] =  $wpdb->last_error;
                }
                
                } catch (Exception $e) {
                    // En caso de cualquier fallo, revertimos la base de datos al estado inicial
                    $errors[] = $e->getMessage();
                }

            }else{
                $detalle[] = 'creada internacion';
                $update_success++;
            }
            
            if( !($wpdb->get_var(" SHOW TABLES LIKE '$tbl_internacion_ingreso' ") == $tbl_internacion_ingreso) ){
                
                // Tabla de internacion Ingreso
                try{
                    
                $sql = "CREATE TABLE $tbl_internacion_ingreso (
                    id bigint(20) NOT NULL AUTO_INCREMENT,
                    id_interno varchar(50) DEFAULT '' NOT NULL,
                    paciente_id bigint(20) NOT NULL,
                    ingreso_medico_id bigint(20) NOT NULL,
                    by_user mediumint(8) NOT NULL, -- Usuario del sistema que registró el ingreso
                    ingreso_formdata JSON DEFAULT NULL, -- Datos estructurados del formulario
                    raw_ingreso JSON DEFAULT NULL, -- Datos crudos del payload/API
                    fecha_ingreso datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                    PRIMARY KEY  (id),
                    KEY paciente_id (paciente_id),
                    KEY ingreso_medico_id (ingreso_medico_id),
                    KEY fecha_ingreso (fecha_ingreso)
                ) $charset_collate;";
                
                require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                dbDelta( $sql );
                if(!empty($wpdb->last_error) ){
                    $errors[] =  $wpdb->last_error;
                }
                
                } catch (Exception $e) {
                    // En caso de cualquier fallo, revertimos la base de datos al estado inicial
                    $errors[] = $e->getMessage();
                }
                
            }else{
                $detalle[] = 'creada ingreso';
                $update_success++;
            }            
            //if( $this->install_videochat_notification_data() ) $update_success++;
                        
            return [ 'success'=> ($update_success == 4), 'errors'=> $errors, 'detalle'=> $detalle ];
        }
        
        function ajax_Expansion_Modules_core_updates(){
            $success = false;
            $res = [ 'success'=> 0, 'errors'=> [] ];
            $msg = 'Sin permisos';
            if( true || current_user_can('manage_options') ){
                $msg = 'error al actualizar';
                $res = $this->Apply_core_updates();
                $success = $res['success'];
                if( !$success && empty($res['errors']) ){
                    $res = $this->Apply_core_updates();
                    $success = $res['success'];
                }
                
            }
            $response = $success? ['variant'=>'success','msg'=>'OK','result'=> $res]:['variant'=>'error', 'msg'=>$msg, 'result'=> $res ];
            wp_send_json($response);
            exit;
        }
        
        public function registerGlobals(){
            global $wpdb, $tbl_internacion_data, $tbl_internacion_ingreso, $tbl_internacion_camas, $tbl_internacion_movimientos;
            $tbl_internacion_data = $wpdb->prefix . 'expansion_internacion_data';
            $tbl_internacion_ingreso = $wpdb->prefix . 'expansion_internacion_ingreso';
            $tbl_internacion_movimientos = $wpdb->prefix . 'expansion_internacion_movimientos';
            $tbl_internacion_camas = $wpdb->prefix . 'expansion_internacion_camas';
            
            do_action('expansion_modules_register_globals');
        }
        
        function bookingpress_get_edit_user_add_meta_fields( $bookingpress_edit_customer_details, $bookingpress_customer_id ){
            global $BookingPress;
            if( empty($bookingpress_edit_customer_details['customer_metadata']['obra_nro_afiliado']) ) $bookingpress_edit_customer_details['customer_metadata']['obra_nro_afiliado'] = $BookingPress->get_bookingpress_customersmeta( $bookingpress_customer_id, 'obra_nro_afiliado' );
            if( empty($bookingpress_edit_customer_details['customer_metadata']['estado_civil']) ) $bookingpress_edit_customer_details['customer_metadata']['estado_civil'] = $BookingPress->get_bookingpress_customersmeta( $bookingpress_customer_id, 'estado_civil' );
            $bookingpress_edit_customer_details['customer_metadata']['obra_nro_afiliado'] = !empty($bookingpress_edit_customer_details['customer_metadata']['obra_nro_afiliado'])? $bookingpress_edit_customer_details['customer_metadata']['obra_nro_afiliado']:'';
            $bookingpress_edit_customer_details['customer_metadata']['estado_civil'] = !empty($bookingpress_edit_customer_details['customer_metadata']['estado_civil'])? $bookingpress_edit_customer_details['customer_metadata']['estado_civil']:'';
            return $bookingpress_edit_customer_details;
        }
        
        public function __construct() {
            
            $this->registerGlobals();
            ###/wp-admin/admin-ajax.php?action=expansion_modules_apply_core_updates
            add_action('wp_ajax_expansion_modules_apply_core_updates',[$this, 'ajax_Expansion_Modules_core_updates'], 10);
            
            add_filter( 'bookingpress_modify_edit_customer_details', array( $this, 'bookingpress_get_edit_user_add_meta_fields' ), 11, 2 );
            
            
            /**
            add_action('init', function(){
                global $BookingPress, $bookingpress_slugs;
                    $bookingpress_slugs->modulos     = 'bookingpress_modulos';
                    $BookingPress->bookingpress_slugs = $bookingpress_slugs;
                    
            },2);
            */
            
            #add_action('bookingpress_add_dynamic_menu_item_to_top', [$this, 'add_top_menu_item'], 10);            
            add_action('expansion_add_menu_item_to_top_after_historias', [$this, 'add_top_menu_item'], 10);
            
            add_action('admin_menu', [$this, 'add_modules_menu_page'], 2000);
            
            add_action('expansion_apply_admin_view_filters', [$this, 'add_admin_view_filters'], 10);
            
            add_action('wp_ajax_expansion_get_module', [$this, 'get_moduleFile'], 2);
            add_action('wp_ajax_nopriv_expansion_get_module', [$this, 'get_moduleFile'], 2);
            
            add_action('wp_ajax_expansion_get_internacionIngreso_id', [$this, 'ajax_get_internacionIngresoFormData'], 10);
            add_action('wp_ajax_expansion_save_internacionIngreso', [$this, 'ajax_save_internacionIngresoFormData'], 10);
            
            
            
            //SE UTILIZARA PARA OBTENER HISTORIAL DE MOVIMIENTOS Y/O OTROS -->> add_action('wp_ajax_expansion_get_more_internacion_edit_id', [$this, 'ajax_get_more_internacion_edit_id'], 10);
            add_action('wp_ajax_expansion_save_internacion_edit_id', [$this, 'ajax_save_internacion_edit_id'], 10);
                        
            //ajax_get_internacionList
            add_action('wp_ajax_expansion_get_internacionList', [$this, 'ajax_get_internacionList'], 10);
            
            
        }
        /**
         * Guardar ingreso Y generar una internacion nueva si no la hay
         * 
         * 
         */
        function ajax_save_internacionIngresoFormData(){
            global $wpdb, $tbl_internacion_data, $tbl_internacion_ingreso;
            $update_ingreso_id = 0;
            $datos_ingreso = $datos_internacion = $raw_ingreso = [];
            $response = ['variant'=>'error', 'type'=>'error','msg'=> 'Error de seguridad - Recarga/Ingresa Usuario' ,'ingreso_id'=> 0, 'internacion_id'=> 0 ];
            $postdata = $_POST;
            $nonce = !empty($postdata['_wpnonce'])? $postdata['_wpnonce'] : '';
            $verify = wp_verify_nonce($nonce, 'bpa_wp_nonce');
            if(!$verify ){
                wp_send_json($response);
                exit;
            }
            $ingreso_formdata = !empty($postdata['int_ingreso_formdata'])? $postdata['int_ingreso_formdata']:[];
            $update_ingreso_id = !empty($postdata['int_ingreso_id'])? absint($postdata['int_ingreso_id']) : ( !empty($ingreso_formdata['id'])? absint($ingreso_formdata['id']):0 );
            if( empty( $ingreso_formdata ) ){
                wp_send_json( ['msg'=> 'Faltan datos'] +$response );
                exit;
            }
            
            $selected_customer_id = !empty($ingreso_formdata['selected_customer'])? absint($ingreso_formdata['selected_customer']): 0;
            $ingreso_medico_id = !empty($ingreso_formdata['selected_staffmember'])? absint($ingreso_formdata['selected_staffmember']): 0;
            
            
            $customer_data = !empty($ingreso_formdata['selected_customer_data'])? $ingreso_formdata['selected_customer_data']:[];//selected_customer_data
            $customer_name = (!empty($customer_data['firstname'])? $customer_data["firstname"]:'') . ' ' . (!empty($customer_data['lastname'])? $customer_data["lastname"]:'');            
            $customer_data["customer_name"] = $customer_name;
            
            $raw_ingreso = [];
            if( !empty($postdata['raw_ingreso']) ){
                $raw_ingreso =  $postdata['raw_ingreso'];
            }else{
                $raw_ingreso = [ 'customer_data' => array_intersect_key( 
                    $customer_data, 
                    array_flip([ "tipo_doc", "customer_dni", "text_C6kufq", "obra_soc_seguros", "obra_nro_afiliado", "persona_alergias", "customer_name" ])
                    )
                ];
            }
            unset( $ingreso_formdata['selected_customer_data'] );
                        
            //$ingreso_formdata['selected_customer']
            
            #var_dump( $ingreso_insert_id, $ingreso_formdata ); exit;
            
            $datos_ingreso = [
                'id_interno'        => '',
                'paciente_id'       => $selected_customer_id,//selected_customer
                'ingreso_medico_id' => $ingreso_medico_id,
                'by_user'           => get_current_user_id(), //el usuario wp de recepcion actual
                'ingreso_formdata'  => $ingreso_formdata,
                'raw_ingreso'       => $raw_ingreso,
            ];            
            if( !empty($ingreso_formdata['fecha_ingreso']) ) $datos_ingreso['fecha_ingreso'] = $ingreso_formdata['fecha_ingreso'];//datetime
            
            $datos_internacion = [
                'id_interno'          => '',
                'paciente_id'         => $selected_customer_id,
                'medico_encargado'    => $ingreso_medico_id,
                'estado'              => 1, // Activo
                'medico_name'         => $ingreso_formdata['medico_name'],
                'customer_name'       => $customer_name,
                'medico_ingreso_name' => $ingreso_formdata['medico_name'],
                'area_desc'           => 'Piso 1 - Sala General',
                'raw_int'             => ['habitacion' => 'A21', 'cama' => '2'],
            ];
            
            #var_dump( $datos_internacion, $datos_ingreso ); exit;
            
            // SI TIENE INGRESO ID ES UPDATE
            if( $update_ingreso_id ){
                
                $db_internacion_data = $wpdb->get_row("SELECT id, paciente_id FROM $tbl_internacion_data WHERE ingreso_id = '{$update_ingreso_id}' ", ARRAY_A );
                $update_internacion_id = !empty($db_internacion_data['id'])? absint($db_internacion_data['id']) :0;
                #var_dump('update', $update_ingreso_id, $db_internacion_data ); exit;
                
                $resultado_proceso = $this->actualizar_ingreso_y_sincronizar_internacion($update_ingreso_id, $datos_ingreso, $datos_internacion);
                    if ($resultado_proceso['success']){
                        $resultado_proceso['internacion_id'] = $update_internacion_id;
                    }
                
            }else{
                #var_dump('insert', $update_ingreso_id, $ingreso_formdata ); exit;
                // Ejecución segura de la transacción
                $resultado_proceso = $this->guardar_ingreso_e_internacion_transaccional($datos_ingreso, $datos_internacion);
            }
            
            if ($resultado_proceso['success']) {
                #$result_ingreso_id = absint($resultado_proceso['ingreso_id']);
                wp_send_json([
                    'msg'        => $update_ingreso_id? "Ingreso #". $resultado_proceso['ingreso_id']." actualizado." :"Paciente ingresado correctamente. Ingreso #".$resultado_proceso['ingreso_id'],
                    'variant'=>'success', 'type'=>'success',
                    'ingreso_id'     => $resultado_proceso['ingreso_id'],
                    'internacion_id' => $resultado_proceso['internacion_id'],
                    'raw_ingreso' => !empty($raw_ingreso)? $raw_ingreso: null,
                    'raw_int' => !empty($datos_internacion['raw_int'])? $datos_internacion['raw_int']: null,
                ] + $response );
            } else {
                wp_send_json([
                    'msg' => 'La operación fue cancelada por seguridad.',
                    'detalles' => $resultado_proceso['error']
                ] + $response);
            }
            
            
            exit;
            
            
            /**
                    //Simulando EL POSTDATA que Viene con datos de internacion
                                $datostbl_internacion = [
                                    'id' => '1',
                                    'ingreso_id' => '1',
                                    'id_interno' => '',
                                    'paciente_id' => '4514',
                                    'medico_encargado' => '2',
                                    'estado' => '1',//['sin definir','Activo','Alta médica','Derivado','Fallecido']
                                    //'sala' => '',
                                    //'cama' => '',
                                    //'area' => '',
                                    'destino' => '',
                                    'fecha_ingreso' => current_time('mysql'),
                                    'fecha_egreso' => null,
                                ];
                                
            $datostbl_ingreso_internacion = [
                'id' => '1',
                'id_interno' => '',
                'paciente_id' => '4514',
                'ingreso_medico_id' => '2',
                'estado' => '1',//['sin definir','Activo','Alta médica','Derivado','Fallecido']
                'by_user' => '2',
                //'area' => '',
                'datos_internacion' => $datostbl_internacion,//Datos POSTDATA
                'ingreso_formdata' => null,
                'raw_data' => [],
                'fecha_ingreso' => current_time('mysql'),
                'fecha_egreso' => null,
                
            ];
            $datos_internacion_fromIngreso = [];
            if(!empty($datostbl_ingreso_internacion['datos_internacion'])){
                $datos_internacion_fromIngreso = $datostbl_ingreso_internacion['datos_internacion'];
                unset($datostbl_ingreso_internacion['datos_internacion']);
            }
            
            $ingreso_insert_id = 1;
            
            $generate_table_internacion_data = array_intersect_key(
            [
                'id' => null,
                'ingreso_id' => $ingreso_insert_id,
                'medico_encargado' => '',
                'destino' => '',
            ] + $datostbl_ingreso_internacion,
            [
                
                'id_interno' => '',
                'paciente_id' => '',
                'medico_encargado' => '',
                'estado' => '1',//['sin definir','Activo','Alta médica','Derivado','Fallecido']
                //'sala' => '',
                //'cama' => '',
                //'area' => '',
                'destino' => '',
                'fecha_ingreso' => current_time('mysql'),
                'fecha_egreso' => null,
            ]);
            
            */
            
            #$response = ['variant'=>'success', 'type'=>'success','msg'=> 'Ingreso Guardado con exito.' , 'ingreso_id' => $ingreso_insert_id, 'gen_datos_db_internacion'=> $generate_table_internacion_data, 'datos_db_ingreso'=>$datostbl_ingreso_internacion, 'requestdata'=> $postdata ];
            #wp_send_json($response);
            #exit;
        }
        /**
         * Guarda/Actualiza Internacion By ID o Ingreso_id
         * 
         */
        function ajax_save_internacion_edit_id(){
            $ingreso_id = 0; $msg = '';
            $response = ['variant'=>'error', 'type'=>'error','msg'=> 'Error de seguridad - Recarga/Ingresa Usuario' ,'result'=> []];
            $requestdata = $_REQUEST;
            $nonce = !empty($requestdata['_wpnonce'])? $requestdata['_wpnonce'] : '';
            $verify = wp_verify_nonce($nonce, 'bpa_wp_nonce');
            if(!$verify ){
                wp_send_json($response);
                exit;
            }
            
            $internacionPostData = !empty($requestdata['internacion_data'])? $requestdata['internacion_data']:[];
            
            $id_internacion = !empty($internacionPostData['id'])? abs($internacionPostData['id']): 0;
            $ingreso_id = !empty($internacionPostData['ingreso_id'])? abs($internacionPostData['ingreso_id']): 0;
            $int_ingreso_id = !empty($requestdata['int_ingreso_id'])? abs($requestdata['int_ingreso_id']): 0;
            if( !$id_internacion && !$ingreso_id ){
                wp_send_json(['msg'=> 'Falta id de internación e ingreso.']+$response);
                exit;
            }
            
            /**
            $datostbl_internacion = [
                'id' => '1',
                'ingreso_id' => '1',
                'id_interno' => '',
                'paciente_id' => '4514',
                'medico_encargado' => '2',
                'estado' => '1',//['sin definir','Activo','Alta médica','Derivado','Fallecido']
                'medico_name'=> 'Doc Maxi Testeando',
                'customer_name'=> 'Paciente Loco',
                'medico_ingreso_name'=> 'Doc de INgreso',
                //'sala' => '',
                //'cama' => '',
                'area_desc' => '',
                'destino' => '',
                'raw_int' => [],
                'fecha_ingreso' => date("Y-m-d H:i:s"),
                'fecha_egreso' => null,
            ];
            */
            
            
            
            $movimiento = $internacionPostData['movimientos'][0];
            
            $nueva_sala = !empty($movimiento['sala'])? $movimiento['sala']: ''; 
            $cama_numero = !empty($movimiento['cama'])? $movimiento['cama']: ''; 
            $area = !empty($movimiento['area'])? $movimiento['area']: ''; 
            
            $res_traslado = $this->registrar_traslado_paciente($id_internacion, $internacionPostData['paciente_id'], $ingreso_id, $nueva_sala, $cama_numero, $area );
            //echo $res_traslado;
            
            $res = $this->actualizar_internacion($id_internacion, $ingreso_id, $internacionPostData);
            //echo $res;
            
            $msg = ($res? 'Internación actualizada. ': 'Internación no actualizada. ') . ($res_traslado? ' Ubicación de paciente actalizada.': ' Ubicación no se actualizo.');
            
            wp_send_json( ['variant'=>'success', 'type'=>'success','msg'=> $msg, 'result'=> ['traslado'=>$res_traslado, 'internacion' =>$res] ] + $response);
            
            exit;
        }
        /**
         * Ajax request for get appointments
         *
         * @return void
         */
        function get_internacionList( $searchData = [] )
        {
            global $wpdb ,$BookingPress, $tbl_internacion_data, $tbl_internacion_ingreso, $tbl_internacion_movimientos;

            $response = array( 'success'=> false, 'items'=>[], 'total'=> 0, 'error'=> '' );
            try{
            $searchData = array_merge([
                'filter'=> [], 
                'perpage'=> 10, 
                'currentpage'=> 1, 
                'offset' => 0
            ], $searchData);
            
            $perpage     = !empty($searchData['perpage']) ? intval($searchData['perpage']) : 10; // phpcs:ignore WordPress.Security.NonceVerification
            $currentpage = !empty($searchData['currentpage']) ? intval($searchData['currentpage']) : 1; // phpcs:ignore WordPress.Security.NonceVerification
            $offset      = !empty($searchData['offset']) ? intval($searchData['offset']) : (( ! empty($currentpage) && $currentpage > 1 ) ? ( ( $currentpage - 1 ) * $perpage ) : 0);
            $bookingpress_search_query       = '';
            $bookingpress_search_query_where = 'WHERE 1=1 ';
            
            if ( !empty($searchData['filter']) ) {
                //fecha_ingreso fecha_egreso area_desc medico_encargado medico_ingreso_name medico_name estado ingreso_id paciente_id
                
                if (!empty($searchData['filter']['id']) ) {
                    $search_id = absint($searchData['filter']['id']);
                    $bookingpress_search_query_where .= "AND ( id = '{$search_id}' )";
                }
                
                if (! empty($searchData['filter']['date_range']) ) {
                    $search_date         = $searchData['filter']['date_range'];
                    $start_date                       = date('Y-m-d', strtotime($search_date[0]));
                    $end_date                         = date('Y-m-d', strtotime($search_date[1]));
                    $bookingpress_search_query_where .= "AND ( fecha_ingreso > '{$start_date}' AND (fecha_egreso IS NULL OR '{$end_date}' > fecha_egreso) )";
                }
                
                if (!empty($searchData['filter']['customer_id']) ) {
                    $search_customers = is_array($searchData['filter']['customer_id'])? implode(',', array_map(sprintf($val, '%d'),$searchData['filter']['customer_id']) ) : absint($searchData['filter']['customer_id']);
                    $bookingpress_search_query_where .= "AND (paciente_id IN ({$search_customers}))";
                }
                
                if (!empty($searchData['filter']['medico_name']) ) {
                    $search_medicos_encarga2 = is_array($searchData['filter']['medico_name'])? implode(',', array_map(sprintf($val, '%d'),$searchData['filter']['medico_name']) ) : absint($searchData['filter']['medico_name']);
                    $bookingpress_search_query_where .= "AND (medico_encargado IN ({$search_medicos_encarga2}))";
                }
                
                if (!empty($searchData['filter']['area']) ) {
                    $search_area = sprintf($searchData['filter']['area_desc'], '%s');
                    $bookingpress_search_query_where .= "AND ( area_desc = '{$search_area}' )";
                }
                
                if (!empty($searchData['filter']['estado']) ) {
                    $search_estado = absint($searchData['filter']['estado']);
                    $bookingpress_search_query_where .= "AND ( estado = '{$search_estado}' )";
                }//listFilter[searchQuery]
                
                if (!empty($searchData['filter']['searchQuery']) ) {
                    $search_queryString = $wpdb->esc_like( sprintf($searchData['filter']['searchQuery'], '%s') );
                    $bookingpress_search_query_where .= "AND ( estado = '{$search_estado}' )";
                    $bookingpress_search_query_where .= "AND ( area_desc LIKE '%{$search_queryString}%' OR medico_ingreso_name LIKE '%{$search_queryString}%' OR medico_name LIKE '%{$search_queryString}%' OR customer_name LIKE '%{$search_queryString}%' )";
                }//fecha_ingreso fecha_egreso area_desc medico_encargado medico_ingreso_name medico_name estado ingreso_id paciente_id    customer_name 
            
            }
            //$total = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}tu_tabla");
            $total_items = $wpdb->get_var("SELECT COUNT(id) FROM {$tbl_internacion_data} {$bookingpress_search_query} {$bookingpress_search_query_where} ");
            
            
            /*
            id bigint(20) NOT NULL AUTO_INCREMENT,
                    ingreso_id bigint(20) NOT NULL,
                    internacion_id bigint(20) NOT NULL,
                    paciente_id bigint(20) NOT NULL,
                    sala varchar(20) NOT NULL,
                    cama varchar(10) NOT NULL,
                    area varchar(30) NOT NULL,
                    fecha_desde datetime NOT NULL,
                    fecha_hasta datetime DEFAULT NULL,
            */
            
            //$bookingpress_search_query = " LEFT JOIN {$tbl_internacion_movimientos} mov ON i.id = mov.internacion_id ";
            
            $result_items = $wpdb->get_results("SELECT *, ( SELECT JSON_OBJECT('ingreso_id', m.ingreso_id, 'sala', m.sala, 'cama', m.cama, 'area', m.area, 'fecha_desde', m.fecha_desde) FROM {$tbl_internacion_movimientos} m WHERE m.internacion_id = i.id AND m.fecha_hasta IS NULL ) as movimientos FROM {$tbl_internacion_data} i {$bookingpress_search_query} {$bookingpress_search_query_where} order by i.id DESC LIMIT {$offset} , {$perpage}", ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
            
            $response = ['success'=> true, 'items'=> $result_items, 'total'=> $total_items ] + $response;
            
            }catch( exception $e ){
                $response = [
                    'error'   => $e->getMessage()
                ] + $response;
            }
            
            return $response;
            /**
action
expansion_get_internacionList
listFilter[id]
2
listFilter[estado]
1
listFilter[date_range][0]
2026-07-01
listFilter[date_range][1]
2026-07-04
listFilter[medico_name][0]
63
listFilter[customer_id]
4526
listFilter[area]
listFilter[searchQuery]
sala 1
_wpnonce
bb4aed395e




id bigint(20) NOT NULL AUTO_INCREMENT,
                    ingreso_id bigint(20) NOT NULL,
                    id_interno varchar(50) DEFAULT '' NOT NULL,
                    paciente_id bigint(20) NOT NULL,
                    medico_encargado bigint(20) NOT NULL,
                    estado tinyint(1) DEFAULT 1 NOT NULL, -- 0: sin definir, 1: Activo, 2: Alta médica, 3: Derivado, 4: Fallecido
                    medico_name varchar(255) DEFAULT '' NOT NULL,
                    customer_name varchar(255) DEFAULT '' NOT NULL,
                    medico_ingreso_name varchar(255) DEFAULT '' NOT NULL,
                    area_desc varchar(150) DEFAULT '' NOT NULL,
                    destino varchar(255) DEFAULT '' NOT NULL,
                    raw_int JSON DEFAULT NULL, -- Formato JSON Nativo
                    fecha_ingreso datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
                    fecha_egreso datetime DEFAULT NULL,



*/

            
        }//Fin func
        
        function ajax_get_internacionList(){
            global $BookingPress;
            $response = ['variant'=>'error', 'type'=>'error','msg'=> 'Error de seguridad - Recarga/Ingresa Usuario' ,'result'=> null];
            $requestdata = $_REQUEST;
            $nonce = !empty($requestdata['_wpnonce'])? $requestdata['_wpnonce'] : '';
            $verify = wp_verify_nonce($nonce, 'bpa_wp_nonce');
            /**
            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_appointments', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }
            */

            $searchDataFilter = !empty($requestdata['listFilter'])? $requestdata['listFilter'] : [];
            
            $searchDataFilter = !empty($searchDataFilter) ? array_map(array( $BookingPress, 'appointment_sanatize_field' ), $searchDataFilter) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_REQUEST['search_data'] contains array and sanitized properly using appointment_sanatize_field function
            
            $perpage     = isset($requestdata['perpage']) ? intval($requestdata['perpage']) : 10; // phpcs:ignore WordPress.Security.NonceVerification
            $currentpage = isset($requestdata['currentpage']) ? intval($requestdata['currentpage']) : 1; // phpcs:ignore WordPress.Security.NonceVerification
            $offset      = ( !empty($currentpage) && $currentpage > 1 ) ? ( ( $currentpage - 1 ) * $perpage ) : 0;
            
            $resultado = $this->get_internacionList([
                'filter'=> $searchDataFilter, 
                'perpage'=> $perpage, 
                'currentpage'=> $currentpage, 
                'offset' => 0
            ]);
            if( empty($resultado['success']) ){
                $response = ['msg'=> 'Error al obtener listado'.$resultado['error'] ] + $response;
            }else{
                $response = ['variant'=> 'success', 'type'=>'success', 'msg'=> 'Listado recuperado con exito.' ,'result'=> $resultado ];
            }
            wp_send_json($response);
            exit;
            
            $resultado = [ 'items'=> $items, 'total' => 2 ];
            $response['result'] = $resultado;
            
            $items = [];
            $datostbl_internacion_movimientos = [
                'id' => '1',
                'ingreso_id' => '1',
                'id_interno' => '',
                'paciente_id' => '4514',
                'sala' => 'A21',
                'cama' => '2',
                'area' => '',
                'fecha_desde' => '2026-07-01 08:15:00',
                'fecha_hasta' => null,
            ];
            $datostbl_internacion = [
                'id' => '1',
                'ingreso_id' => '1',
                'id_interno' => '',
                'paciente_id' => '4514',
                'medico_encargado' => '2',
                'estado' => '1',//['sin definir','Activo','Alta médica','Derivado','Fallecido']
                'medico_name'=> 'Doc Maxi Testeando',
                'customer_name'=> 'Paciente Loco',
                'medico_ingreso_name'=> 'Doc de INgreso',
                'area_desc' => '',
                'destino' => '',
                'raw_int' => [],
                'fecha_ingreso' => date("Y-m-d H:i:s"),
                'fecha_egreso' => null,
            ];
            $datostbl_internacion['movimientos'] = [$datostbl_internacion_movimientos];
            
            $items[] = $datostbl_internacion;
            $items[] = ['id' => '2', 'ingreso_id' => '2', 'movimientos'=> [ [ 'id' => '2', 'ingreso_id' => '2'] + $datostbl_internacion_movimientos] ] + $datostbl_internacion;
            
            $response = ['variant'=>'success', 'type'=>'success','msg'=> 'Listado recuperado con exito.' ,'result'=> [ 'items'=> $items, 'total' => 2 ] ];
            wp_send_json($response);
            exit;
        }
        function ajax_get_more_internacion_edit_id(){
            $result = [];
            
            //Obtener Todos los Movimientos
            
            $response = ['variant'=>'success', 'type'=>'success','msg'=> 'Listado recuperado con exito.' ,'result'=> $result ];
            wp_send_json($response);
            exit;
        }        
        
        
        function ajax_get_internacionIngresoFormData(){
            global $wpdb, $tbl_internacion_ingreso;
            
            $response = ['variant'=>'error', 'type'=>'error','msg'=> 'Error de seguridad - Recarga/Ingresa Usuario' ,'internacionForm_data'=> null];
            $requestdata = $_REQUEST;
            $action_ingreso = !empty($requestdata['action'])? $requestdata['action'] == 'expansion_get_internacionIngreso_id' : false;
            $nonce = !empty($requestdata['_wpnonce'])? $requestdata['_wpnonce'] : '';
            $verify = wp_verify_nonce($nonce, 'bpa_wp_nonce');
            if(!$verify ){
                wp_send_json($response);
                exit;
            }
            
            $ingreso_formdata = !empty($requestdata['int_ingreso_formdata'])? $requestdata['int_ingreso_formdata']:[];
            $ingreso_id = !empty($requestdata['int_ingreso_id'])? absint($requestdata['int_ingreso_id']) : ( !empty($ingreso_formdata['id'])? absint($ingreso_formdata['id']):0 );
            $ingreso_id = empty($ingreso_id) && (!empty($requestdata['internacion_id']) && $action_ingreso )? absint($requestdata['internacion_id']): 0;
            
            if(!$ingreso_id){
                wp_send_json( ['msg'=> 'Falta Id de ingreso'] + $response);
                exit;
            }
                        
            
            //( SELECT JSON_OBJECT('ingreso_id', m.ingreso_id, 'sala', m.sala, 'cama', m.cama, 'area', m.area, 'fecha_desde', m.fecha_desde) FROM {$tbl_internacion_movimientos} m 
            $result = $wpdb->get_row("SELECT * FROM {$tbl_internacion_ingreso} WHERE id = '{$ingreso_id}' order by id DESC", ARRAY_A);
            
            if( !empty($result) ){
                $result['ingreso_formdata'] = !empty($result['ingreso_formdata'])? json_decode($result['ingreso_formdata'], true): null;
                if( !empty($result['ingreso_formdata']) && is_array($result['ingreso_formdata']) ) $result['ingreso_formdata']['id'] = absint($result['id']);
                $result['raw_ingreso'] = !empty($result['raw_ingreso'])? json_decode($result['raw_ingreso'], true): null;
                $response = ['variant'=>'success', 'type'=>'success','msg'=> 'Ingreso recuperado con exito.' ,'internacionForm_data'=> $result];
                wp_send_json($response);
                exit;
            }
            /**
            $datostbl_local_camas = [
                'sala' => 'A21',
                'cama' => '2',
                'area' => 'clinica medica',
                'desc_sala' => 'Piso 3 Ala norte, Aislamiento',
                'map' => '1',
                'map_coord' => '(20,56)',
                'detalles' => '',
                'enable' => 1
            ]; //PRIMMARY KEY (sala, cama)
            
            
            $datostbl_internacion_movimientos = [
                'id' => '1',
                'ingreso_id' => '1',
                'id_interno' => '',
                'paciente_id' => '4514',
                'sala' => 'A21',
                'cama' => '2',
                'area' => '',
                'fecha_desde' => '2026-07-01 08:15:00',
                'fecha_hasta' => null,
            ];
            //KEY idx_paciente_actual (paciente_id,fecha_hasta)
            //KEY idx_cama_actual (sala,cama,fecha_hasta)
            //KEY idx_ingresoid (ingreso_id)
            
            $datostbl_internacion = [
                'id' => '1',
                'ingreso_id' => '1',
                'id_interno' => '',
                'paciente_id' => '4514',
                'medico_encargado' => '2',
                'estado' => '1',//['sin definir','Activo','Alta médica','Derivado','Fallecido']
                //'sala' => '',
                //'cama' => '',
                //'area' => '',
                'destino' => '',
                'raw_int' => [],
                'fecha_ingreso' => date("Y-m-d H:i:s"),
                'fecha_egreso' => null,
            ];
            //lugar Actual por defecto
            $datostbl_internacion['movimientos'] = [$datostbl_internacion_movimientos];
            
            $datostbl_ingreso_internacion = [
                'id' => '1',
                'id_interno' => '1',
                'paciente_id' => '4514',
                'ingreso_medico_id' => '2',
                'estado' => '1',//['sin definir','Activo','Alta médica','Derivado','Fallecido']
                'by_user' => '2',
                'area' => '',
                'datos_internacion' => $datostbl_internacion,
                'ingreso_formdata' => null,
                'raw_ingreso' => [],
                'fecha_ingreso' => date("Y-m-d H:i:s"),
                'fecha_egreso' => null,
                
            ];
            $response = ['variant'=>'success', 'type'=>'success','msg'=> 'Ingreso recuperado con exito.' ,'internacionForm_data'=> $datostbl_ingreso_internacion];
            */
            wp_send_json($response);
            exit;
        }
        
        function get_moduleFile(){
            $requestdata = $_REQUEST;
            $nonce = !empty($requestdata['_wpnonce'])? $requestdata['_wpnonce'] : '';
            $verify = wp_verify_nonce($nonce, 'bpa_wp_nonce');
            header("Cache-Control: public, max-age=300");
            header("X-LiteSpeed-Cache-Control: public, max-age=300");
            
            if(!$verify || !get_current_user_id() ){
                #http_response_code(403);
                header("Content-Type: application/javascript");
                ?>
                export default {
                    props: ['tab'],
                    template: `<div><h4>Fallo de seguridad</h4><br /><h3>{{titulo}}</h3><br /></div>`,
                    data(){
                        return {
                            titulo: 'Requiere volver a Ingresar',
                        };
                    },
                    methods: {},
                    mounted(){
                                                
                        $exp_bpa_wp_nonce = '<?php echo wp_create_nonce('bpa_wp_nonce'); ?>';                        
                        this.isLoading = false;
                        if(this.$root) this.$root.isLoading = false;
                        alert("Fallo de seguridad");
                    },
                };
                <?php
                exit;
            }
            include_once BPHC_PLUGIN_DIR . 'includes/expansion-modules/module.php';
            exit;
        }
        
        function check_admin_view_need_filters(){
            global $expansion_modules_slugs_list;
            $request_page = !empty($_GET['page'])? $_GET['page'] : false;
            if(!$request_page) return;
            
            if(in_array($request_page, $expansion_modules_slugs_list)){
                do_action( 'expansion_apply_admin_view_filters', $request_page );
            }
            
        }
        function add_admin_view_filters(){
            global $menu;
            $menu = [];
            remove_all_actions( 'admin_notices' );
            remove_all_actions( 'all_admin_notices' );
            
        }
        
        function add_modules_menu_page(){
            global $BookingPress, $bookingpress_slugs;
            
            $this->check_admin_view_need_filters();                        
            /**
            add_menu_page( 
            'Modulos - Internación', 
            'Internación - Modulos de Extension', 
            'bookingpress_appointments',//capacidad //'bookingpress_appointments' 
            'bookingpress_modulos',//slug 
            array( $this, 'modules_menu_page' ), 
            $icon_url = '', 1 
            );
            */
            
            //AGREGAMOS el slug sino falla
            $bookingpress_slugs->modulos     = 'bookingpress_modulos';
            
            ob_start();
            ?>
            <span id="internacion_admin_link">Internación</span>            
            <?php
            $no_display_link = ob_get_clean();
            //<style>a:has(#historiasC_admin_link) { background: pink; display: none;}</style>
            
            add_submenu_page($bookingpress_slugs->bookingpress, __('internación', 'bookingpress-appointment-booking' ), 'Internacion', 'bookingpress', $bookingpress_slugs->modulos, array( $this, 'modules_menu_page' ) );
                        
            
            
            
        }
        function add_top_menu_item(){
            global $BookingPressPro, $bookingpress_slugs;
            $request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard'; //// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['action'] sanitized properly
            if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_appointments' )  ){
                        
        
        			?>			
        			<li class="bpa-nav-item <?php echo ( 'modulos' == $request_module ) ? '__active' : ''; ?>">
        				
                        <a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->modulos, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ) /** . '#internacionIngreso' */;  // phpcs:ignore ?>" class="bpa-nav-link">
                            <div class="bpa-nav-link--icon">
            					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            						<g clip-path="url(#clip0_4470_13557)">
            							<path d="M21 12V6C21 4.9 20.1 4 19 4H18V3C18 2.45 17.55 2 17 2C16.45 2 16 2.45 16 3V4H8V3C8 2.45 7.55 2 7 2C6.45 2 6 2.45 6 3V4H5C3.9 4 3 4.9 3 6V20C3 21.1 3.9 22 5 22H12V20H5V10H19V12H21Z"/>
            							<path d="M18 13C15.24 13 13 15.24 13 18C13 20.76 15.24 23 18 23C20.76 23 23 20.76 23 18C23 15.24 20.76 13 18 13ZM19.65 20.35L17.5 18.2V15H18.5V17.79L20.35 19.64L19.65 20.35Z"/>
            						</g>
            						<defs>
            							<clipPath id="clip0_4470_13557">
            								<rect width="24" height="24" fill="white"/>
            							</clipPath>
            						</defs>
            					</svg>
                            </div>
        					<?php esc_html_e( 'internación', 'bookingpress-appointment-booking' ); ?>					
        				</a>
        			</li>
        			<?php 
                    }
        }
        
        function modules_menu_page(){
            
            if( file_exists( BPHC_PLUGIN_DIR . 'includes/templates/expansion-modules-menu-page.php' ) ){
                
                include_once BPHC_PLUGIN_DIR . 'includes/templates/expansion-modules-menu-page.php';
                exit;
            }
            
        }
        function registrar_traslado_paciente($internacion_id, $paciente_id, $ingreso_id=0, $nueva_sala='', $cama_numero='', $area='') {
            global $wpdb, $tbl_internacion_movimientos; 
            $tbl_internacion_movimientos = !empty($tbl_internacion_movimientos)? $tbl_internacion_movimientos: $wpdb->prefix . 'expansion_internacion_movimientos'; 
            $ahora = current_time('mysql'); // Hora local de WordPress 
            // Iniciamos una transacción para que se hagan ambos cambios o ninguno (evita datos huérfanos) 
            $wpdb->query('START TRANSACTION'); 
            // 1. Cerramos el movimiento actual del paciente (donde fecha_hasta es NULL) 
            $update = $wpdb->update( $tbl_internacion_movimientos, 
                array('fecha_hasta' => $ahora), 
                array( 'internacion_id' => $internacion_id, 'fecha_hasta' => null ), 
                array('%s'), array('%d', '%s') 
            ); 
            // 2. Insertamos la fila con la nueva ubicación 
            $insert = $wpdb->insert( $tbl_internacion_movimientos, 
                array(                 
                'internacion_id' => $internacion_id, 
                'paciente_id' => $paciente_id, 
                'ingreso_id' => $ingreso_id, 
                'sala' => $nueva_sala, 
                'cama' => $cama_numero, 
                'area'=> $area, 
                'fecha_desde' => $ahora, 
                'fecha_hasta' => null 
                ), 
                array('%d', '%d', '%d', '%s', '%s', '%s', '%s', '%s') 
            ); 
            // Si todo salió bien, confirmamos los cambios en MySQL 
            if ($insert !== false) {
                $wpdb->query('COMMIT'); return true; 
            } else {
                $wpdb->query('ROLLBACK'); return false; 
            } 
        }
        
        
        function registrar_nueva_internacion($datos_entrada) {
            global $wpdb, $tbl_internacion_data;
        
            // 1. Asegurar valores por defecto si no vienen en el array de entrada
            $valores = wp_parse_args($datos_entrada, [
                'ingreso_id'          => 0,
                'id_interno'          => '',
                'paciente_id'         => 0,
                'medico_encargado'    => 0,
                'estado'              => 1,
                'medico_name'         => '',
                'customer_name'       => '',
                'medico_ingreso_name' => '',
                'area_desc'           => '',
                'destino'             => '',
                'raw_int'             => [],
                'fecha_ingreso'       => current_time('mysql'), // Hora local de WordPress
                'fecha_egreso'        => null,
            ]);
        
            // 2. Formatear y preparar el campo JSON de forma segura
            // Usamos JSON_UNESCAPED_UNICODE para mantener tildes y caracteres latinos intactos
            $json_crudo = json_encode($valores['raw_int'], JSON_UNESCAPED_UNICODE);
            
            // Si el JSON falla o viene vacío, aseguramos que guarde un objeto vacío válido '{}' o NULL
            $valores['raw_int'] = ($json_crudo !== false) ? $json_crudo : '{}';
        
            // 3. Definir los formatos de datos para la sanitización de $wpdb
            $formatos = [
                '%d', // ingreso_id
                '%s', // id_interno
                '%d', // paciente_id
                '%d', // medico_encargado
                '%d', // estado
                '%s', // medico_name
                '%s', // customer_name
                '%s', // medico_ingreso_name
                '%s', // area_desc
                '%s', // destino
                '%s', // raw_int (Se pasa como string, MySQL lo castea a JSON)
                '%s', // fecha_ingreso
                '%s', // fecha_egreso
            ];
        
            // 4. Ejecutar la inserción segura
            $resultado = $wpdb->insert($tbl_internacion_data, $valores, $formatos);
        
            if ($resultado === false) {
                // Error al insertar (puedes registrar un log aquí)
                return false; 
            }
        
            // Retorna el ID de la fila recién creada
            return $wpdb->insert_id;
        }
        
        function actualizar_internacion($id_internacion = 0, $id_ingreso = 0, $datos_nuevos) {
            global $wpdb, $tbl_internacion_data;
            if( empty($id_internacion) && empty($id_ingreso) ) return false;
                    
            // 1. Filtrar solo los campos permitidos para actualización
            $valores = array_intersect_key($datos_nuevos, array_flip([
                'id_interno',
                'medico_encargado',
                'estado',
                'medico_name',
                'area_desc',
                'destino',
                'raw_int',
                'fecha_egreso'
            ]));
        
            if (empty($valores)) {
                return false;
            }
        
            // 2. Si viene el campo JSON, lo formateamos correctamente
            if (isset($valores['raw_int'])) {
                $json_crudo = json_encode($valores['raw_int'], JSON_UNESCAPED_UNICODE);
                $valores['raw_int'] = ($json_crudo !== false) ? $json_crudo : '{}';
            }
        
            // 3. Mapear dinámicamente los formatos de sanitización para $wpdb
            $formatos = [];
            foreach ($valores as $columna => $valor) {
                if (in_array($columna, ['medico_encargado', 'estado' ])) {
                    $formatos[] = '%d'; // Enteros
                } else {
                    $formatos[] = '%s'; // Strings, Fechas y JSON
                }
            }
        
            $update_where = !empty($id_ingreso)? ['ingreso_id' => $id_ingreso] : ['id' => $id_internacion];
            // 4. Ejecutar la actualización con la condición WHERE id = $id_internacion
            $resultado = $wpdb->update(
                $tbl_internacion_data,
                $valores,                  // Datos a actualizar
                ['id' => $id_internacion], // Condición WHERE
                $formatos,                 // Formato de los datos
                ['%d']                     // Formato del WHERE (id es entero)
            );
        
            // $resultado devuelve el número de filas afectadas, o false si hubo un error de SQL.
            // Si los datos guardados son exactamente idénticos a los que ya había, devuelve 0.
            return ($resultado !== false);
        }
        
        
        /**
         * 
         * 
         * 
         */
        function guardar_ingreso_e_internacion_transaccional($datos_ingreso, $datos_internacion) {
            global $wpdb, $tbl_internacion_data, $tbl_internacion_ingreso;
            
            // 1. Iniciar la transacción 
            $wpdb->query('START TRANSACTION');
        
            try {
                // --- PASO A: PROCESAR E INSERTAR EL INGRESO ---
                $valores_ingreso = wp_parse_args($datos_ingreso, [
                    'id_interno'        => '',
                    'paciente_id'       => 0,
                    'ingreso_medico_id' => 0,
                    'by_user'           => 0,
                    'ingreso_formdata'  => null,
                    'raw_ingreso'       => null,
                    'fecha_ingreso'     => current_time('mysql'),
                ]);
        
                // Formatear JSONs de ingreso
                $json_formdata = json_encode($valores_ingreso['ingreso_formdata'], JSON_UNESCAPED_UNICODE);
                $valores_ingreso['ingreso_formdata'] = ($json_formdata !== false) ? $json_formdata : null;
        
                $json_raw_ingreso = json_encode($valores_ingreso['raw_ingreso'], JSON_UNESCAPED_UNICODE);
                $valores_ingreso['raw_ingreso'] = ($json_raw_ingreso !== false) ? $json_raw_ingreso : null;
        
                $insert_ingreso = $wpdb->insert($tbl_internacion_ingreso, $valores_ingreso, [
                    '%s', '%d', '%d', '%d', '%s', '%s', '%s'
                ]);
        
                // Si falla el insert de ingresos, disparamos una excepción
                if ($insert_ingreso === false) {
                    #print_r($wpdb->last_error);
                    throw new Exception("Error al insertar el registro de ingreso.");
                }
        
                // Recuperamos el ID autogenerado del ingreso
                $nuevo_ingreso_id = $wpdb->insert_id;
        
        
                // --- PASO B: PROCESAR E INSERTAR LA INTERNACIÓN ASOCIADA ---
                $valores_internacion = wp_parse_args($datos_internacion, [
                    'id_interno'          => '',
                    'paciente_id'         => $valores_ingreso['paciente_id'], // Hereda el mismo si no viene
                    'medico_encargado'    => 0,
                    'estado'              => 1,
                    'medico_name'         => '',
                    'customer_name'       => '',
                    'medico_ingreso_name' => '',
                    'area_desc'           => '',
                    'destino'             => '',
                    'raw_int'             => null,
                    'fecha_ingreso'       => $valores_ingreso['fecha_ingreso'],
                    'fecha_egreso'        => null,
                ]);
        
                // Forzar el ID relacional que vincula ambas tablas
                $valores_internacion['ingreso_id'] = $nuevo_ingreso_id;
        
                // Formatear JSON de internación
                $json_raw_int = json_encode($valores_internacion['raw_int'], JSON_UNESCAPED_UNICODE);
                $valores_internacion['raw_int'] = ($json_raw_int !== false) ? $json_raw_int : null;
        
                $insert_internacion = $wpdb->insert($tbl_internacion_data, $valores_internacion, [
                    '%s', '%d', '%d', '%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d'
                ]);
        
                // Si falla el insert de la internación (ej. duplicidad de ingreso_id único), disparamos excepción
                if ($insert_internacion === false) {
                    throw new Exception("Error al crear internación.");
                }
                $nueva_internacion_id = $wpdb->insert_id;
        
                // Si todo salió bien hasta aquí, confirmamos los cambios en disco
                $wpdb->query('COMMIT');
        
                return [
                    'success'        => true,
                    'ingreso_id'     => ($insert_ingreso? $nuevo_ingreso_id: null),
                    'internacion_id' => ($insert_internacion? $nueva_internacion_id: null)
                ];
        
            } catch (Exception $e) {
                // En caso de cualquier fallo, revertimos la base de datos al estado inicial
                $wpdb->query('ROLLBACK');
        
                return [
                    'success' => false,
                    'error'   => $e->getMessage()
                ];
            }
        }
        

        


        /**
         * 
         * 
         */
        function actualizar_ingreso_y_sincronizar_internacion($id_ingreso = 0, $datos_ingreso = [], $datos_internacion = []) {
            global $wpdb, $tbl_internacion_data, $tbl_internacion_ingreso;
            $resultado = [ 'success' => false, 'error'=>'', 'ingreso_id' => null, 'internacion_id'=> null];
            
            // 1. Iniciar transacción
            $wpdb->query('START TRANSACTION');
            
            
            try {
                // --- PASO A: ACTUALIZAR LA TABLA DE INGRESOS ---
                // Filtramos solo los campos pertenecientes a la tabla de ingresos
                $valores_ingreso = array_intersect_key($datos_ingreso, array_flip([
                    'id_interno',
                    'paciente_id',
                    'ingreso_medico_id',
                    'by_user',
                    'ingreso_formdata',
                    'raw_ingreso',
                    //'fecha_ingreso'
                ]));
                //$datos_ingreso, $datos_internacion
        
                if (!empty($valores_ingreso)) {
                    // Procesar y escapar campos JSON
                    if (isset($valores_ingreso['ingreso_formdata'])) {
                        $json_formdata = json_encode($valores_ingreso['ingreso_formdata'], JSON_UNESCAPED_UNICODE);
                        $valores_ingreso['ingreso_formdata'] = ($json_formdata !== false) ? $json_formdata : null;
                    }
        
                    if (isset($valores_ingreso['raw_ingreso'])) {
                        $json_raw = json_encode($valores_ingreso['raw_ingreso'], JSON_UNESCAPED_UNICODE);
                        $valores_ingreso['raw_ingreso'] = ($json_raw !== false) ? $json_raw : null;
                    }
        
                    // Formatear tipos de datos para la consulta
                    $formatos_ingreso = [];
                    foreach ($valores_ingreso as $columna => $valor) {
                        $formatos_ingreso[] = in_array($columna, ['ingreso_medico_id','paciente_id', 'by_user']) ? '%d' : '%s';
                    }
        
                    $update_ingreso = $wpdb->update(
                        $tbl_internacion_ingreso,
                        $valores_ingreso,
                        ['id' => $id_ingreso],
                        $formatos_ingreso,
                        ['%d']
                    );
        
                    if ($update_ingreso === false) {
                        throw new Exception("Error al actualizar ingreso.");
                    }
                }
                
                // --- PASO B: SINCRONIZAR DATOS REPLICADOS EN LA INTERNACIÓN ---
                // Verificamos si  viene el nombre del médico para sincronizarlo
                $valores_internacion = [];
                $valores_internacion = array_intersect_key($datos_internacion, array_flip([
                    'id_interno',
                    'paciente_id',
                    'customer_name',
                    'medico_ingreso_name',            
                    'ingreso_formdata',
                    //'fecha_ingreso'
                ]));
                
                if (isset($datos_ingreso['medico_ingreso_name'])) {
                    $valores_internacion['medico_ingreso_name'] = $datos_ingreso['medico_ingreso_name'];
                }
                
                $formatos_internacion = [];
                foreach ($valores_internacion as $columna => $valor) {
                    $formatos_internacion[] = in_array($columna, ['medico_encargado', 'paciente_id', 'by_user']) ? '%d' : '%s';
                }
                
                // Si hay campos que requieren sincronización espejo en la internación
                if (!empty($valores_internacion)) {
        
                    // Aquí usamos el vínculo relacional: actualizamos WHERE ingreso_id = $id_ingreso
                    $update_internacion = $wpdb->update(
                        $tbl_internacion_data,
                        $valores_internacion,
                        ['ingreso_id' => $id_ingreso], // Vinculo principal entre tablas
                        $formatos_internacion,
                        ['%d'] // formato de ingreso_id es entero
                    );
        
                    if ($update_internacion === false) {
                        throw new Exception("Error al sincronizar internacion.");
                    }
                }
        
                // Si ambas operaciones se ejecutaron correctamente, consolidamos en la BD
                $wpdb->query('COMMIT');
                $resultado = [ 'success' => true, 'ingreso_id' => $id_ingreso, 'internacion_id' => null] + $resultado;
                return $resultado;
        
            } catch (Exception $e) {
                // Si cualquiera de las dos escrituras falla, revertimos todo al estado original
                $wpdb->query('ROLLBACK');
                error_log('Error en transacción de hospitalización: ' . $e->getMessage());
                $resultado = [ 'success' => false, 'error'=> $e->getMessage() ] + $resultado;
                return $resultado;
            }
        }


    }
    
    global $expansion_modules, $expansion_modules_slugs_list, $wpdb, $tbl_internacion_data, $tbl_internacion_ingreso, $tbl_internacion_camas, $tbl_internacion_movimientos;
    $tbl_internacion_data = $wpdb->prefix . 'expansion_internacion_data';
    $tbl_internacion_ingreso = $wpdb->prefix . 'expansion_internacion_ingreso';
    $tbl_internacion_movimientos = $wpdb->prefix . 'expansion_internacion_movimientos';
    $tbl_internacion_camas = $wpdb->prefix . 'expansion_internacion_camas';
    
    $expansion_modules_slugs_list = [
        'modulos'
    ];
    $expansion_modules = new Expansion_Modules();
}

/**
        function update_internacion_example(){
            // Datos limpios recibidos
            $datos_modificados = [
                'medico_encargado' => 14, // Cambió de médico
                'area_desc'        => 'Piso 1 - Sala General',
                'raw_int'          => [
                    'habitacion' => 'A21',
                    'cama'       => '3', // Se cambió a la cama 3
                ]
            ];
            
            $id_a_modificar = 1; // ID de la fila en tu tabla
            
            $actualizado = actualizar_internacion($id_a_modificar, $datos_modificados);
            
            if ($actualizado) {
                wp_send_json_success('Internación actualizada con éxito.');
            } else {
                wp_send_json_error('No se realizaron cambios o hubo un error.');
            }
        }
        function nueva_internacion_example(){
            $datostbl_internacion = [
                'ingreso_id'          => '1',
                'id_interno'          => 'INT-992',
                'paciente_id'         => '4514',
                'medico_encargado'    => '2',
                'estado'              => '1', 
                'medico_name'         => 'Doc Maxi Testeando',
                'customer_name'       => 'Paciente Loco',
                'medico_ingreso_name' => 'Doc de INgreso',
                'area_desc'           => 'Piso 1 - Sala General',
                'destino'             => '',
                // Guardamos datos dinámicos extra en el JSON que Vue puede requerir
                'raw_int'             => [
                    'habitacion'     => 'A21',
                    'cama'           => '2',
                    'cobertura'      => 'Particular',
                    'observaciones'  => 'Paciente ingresa por guardia con dolor abdominal.'
                ],
                'fecha_ingreso'       => date("Y-m-d H:i:s"),
                'fecha_egreso'        => null,
            ];
            
            // Insertar en la base de datos
            $nuevo_id = registrar_nueva_internacion($datostbl_internacion);
            
            if ($nuevo_id) {
                echo "Internación registrada con éxito. ID: " . $nuevo_id;
            }
        }
*/

/*      
        function add_ingreso_internacion_ajax_example(){
            $datos_ingreso = [
                'id_interno'        => 'ING-2026-99',
                'paciente_id'       => 4514,
                'ingreso_medico_id' => 2,
                'by_user'           => get_current_user_id(), // Se guardará correctamente en el campo mediumint
                'ingreso_formdata'  => ['motivo' => 'Urgencia', 'triaje' => 'Rojo'],
                'raw_ingreso'       => ['payload_completo_api' => true]
            ];
            
            $datos_internacion = [
                'id_interno'          => 'INT-2026-99',
                'paciente_id'         => 4514,
                'medico_encargado'    => 2,
                'estado'              => 1, // Activo
                'medico_name'         => 'Doc Maxi Testeando',
                'customer_name'       => 'Paciente Loco',
                'medico_ingreso_name' => 'Doc de INgreso',
                'area_desc'           => 'Piso 1 - Sala General',
                'raw_int'             => ['habitacion' => 'A21', 'cama' => '2']
            ];
            
            // Ejecución segura de la transacción
            $resultado_proceso = guardar_ingreso_e_internacion_transaccional($datos_ingreso, $datos_internacion);
            
            if ($resultado_proceso['success']) {
                wp_send_json_success([
                    'mensaje'        => 'Paciente ingresado e internado correctamente.',
                    'ingreso_id'     => $resultado_proceso['ingreso_id'],
                    'internacion_id' => $resultado_proceso['internacion_id']
                ]);
            } else {
                wp_send_json_error([
                    'mensaje' => 'La operación fue cancelada por seguridad.',
                    'detalles' => $resultado_proceso['error']
                ]);
            }
        }
*/

/**
function actualizar_ingreso_internacion($id_ingreso = 0, $datos_nuevos = []) {
    global $wpdb, $tbl_internacion_ingreso;
    $table_name = $tbl_internacion_ingreso;
    if( !$id_ingreso ) return false;

    // 1. Filtrar estrictamente solo las columnas editables de esta tabla
    // Evitamos que se alteren campos clave por error (como el paciente_id o el id auto_increment)
    $valores = array_intersect_key($datos_nuevos, array_flip([
        'id_interno',
        'ingreso_medico_id',
        'by_user',
        'ingreso_formdata',
        'raw_ingreso',
        //'fecha_ingreso'
    ]));

    // Si no viene ningún campo válido para actualizar, salimos temprano
    if (empty($valores)) {
        return false;
    }

    // 2. Procesar y escapar de forma segura los campos JSON si vienen en el payload
    if (isset($valores['ingreso_formdata'])) {
        $json_formdata = json_encode($valores['ingreso_formdata'], JSON_UNESCAPED_UNICODE);
        $valores['ingreso_formdata'] = ($json_formdata !== false) ? $json_formdata : null;
    }

    if (isset($valores['raw_ingreso'])) {
        $json_raw = json_encode($valores['raw_ingreso'], JSON_UNESCAPED_UNICODE);
        $valores['raw_ingreso'] = ($json_raw !== false) ? $json_raw : null;
    }

    // 3. Mapear dinámicamente los formatos de sanitización para $wpdb
    $formatos = [];
    foreach ($valores as $columna => $valor) {
        if (in_array($columna, ['ingreso_medico_id', 'by_user'])) {
            $formatos[] = '%d'; // Enteros (bigint / mediumint)
        } else {
            $formatos[] = '%s'; // Strings, Fechas y JSON strings
        }
    }

    // 4. Ejecutar la actualización segura con la condición WHERE id = $id_ingreso
    $resultado = $wpdb->update(
        $table_name,
        $valores,              // Datos limpios a actualizar
        ['id' => $id_ingreso], // Condición WHERE
        $formatos,             // Formato de los campos a actualizar
        ['%d']                 // Formato del ID en el WHERE (entero)
    );

    // Retorna true si la fila se modificó con éxito en MySQL.
    // Retorna false si hubo un error SQL o si los datos enviados eran exactamente iguales a los ya guardados.
    return ($resultado !== false);
}
*/