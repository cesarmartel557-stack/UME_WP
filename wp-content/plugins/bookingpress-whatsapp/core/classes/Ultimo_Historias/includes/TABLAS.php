<?php

/**
 * 
 */
class booking_Expansion_Exception extends Exception {}
 
class BookingPress_Expansion_Tables {
    public static $tables = [
    'expansion_workhours' => 'expansion_staff_member_workhours',
    'consultas'     =>  'bphc_consultas',
    'antecedentes'  =>  'bphc_antecedentes',
    'medicamentos'  =>  'bphc_medicamentos',
    'alergias'      =>  'bphc_alergias'
    ];
}

class BookingPress_Expansion_Plugin {
    public $init_start = 0;
    public $last_check = 0;
    public $options = [];
    public $expire = 12960000;//5meses 2592000;//1mes //60*60*24*30;
    public $BookingPress_Expansion_email_notification = null;
    
    
    public function __construct(){
        /*
        @ini_set('display_errors', 1);
        add_action( 'wp_print_scripts', function(){
            @ini_set('display_errors', 1);
            exit;
        }, 210 );*/
        
        if( is_admin() ){
            
            $requested_module = ( ! empty($_REQUEST['page']) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? sanitize_text_field(str_replace('bookingpress_', '', $_REQUEST['page'])) : 'dashboard'; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['page'] sanitized properly
            add_action( 'bookingpress_' . $requested_module . '_dynamic_view_load', function(){
                // MOSTRAR EN TODOS LOS MODULOS
                ?>
<el-dialog :visible.sync="expansion_all_admin_dialog.is_open" :custom-class="['expansion-dialog-box', expansion_all_admin_dialog.add_class]" :modal="false" :modal-append-to-body="false" :before-close="expansion_all_admin_dialog.onClose" :fullscreen="false"  style="" :style="expansion_all_admin_dialog.style" >
    <div v-if="expansion_all_admin_dialog.content" v-html="expansion_all_admin_dialog.content" class="expansion-dialog-body" >
    
    </div>
    <div class="bpa-back-loader-container" v-if="expansion_all_admin_dialog.is_loading">
		<div class="bpa-back-loader"></div>
	</div>
</el-dialog>
                <?php
                do_action('expansion_on_all_admin_start_views');
            }, -1);
            
            add_action('bookingpress_admin_vue_data_variables_script', function(){
                ?>
                bookingpress_return_data['expansion_zoom'] = 100;
                bookingpress_return_data['expansion_all_admin_dialog'] = {
                'is_open': false, 'is_loading': false, 'onClose': null, 'add_class': null, 'style': {zIndex: '9999 !important'}, 'content': null, 'last_content_name':null
                };
                <?php
                do_action('expansion_on_all_admin_vue_data');
            },20);
            
                        
            add_action( 'bookingpress_admin_panel_vue_methods', function(){
                /*
                ?>                
                expansionZoomInOut( ev, in_out = '+' ){
                    ev.preventDefault();
                    const vm = this;
                    console.log('ajuste zoom', ev, in_out);
                    try{
                        let step = 10;
                        let zoom_val = vm.expansion_zoom;
                        zoom_val = (in_out == '-')? (zoom_val - step ): (zoom_val + step);
                        zoom_val = zoom_val > 50? (zoom_val>200? 200 : zoom_val) : 50;
                        vm.set_expansionZoom( zoom_val )
                    }catch{};
                },                
                set_expansionZoom( zoom_val = 100 ){
                    const vm = this;
                    try{
                        //body_el = document.querySelector('body');//bookingpress_page_inner_wrapper
                        //console.log( body_el );
                        //body_el.style.zoom = zoom_val+'%';
                        vm.expansionChangeViewportScale( 0.75 )
                        vm.expansion_zoom = zoom_val;
                    }catch{ 
                        return 0;
                    };
                    return 1;
                },
                expansionChangeViewportScale(scaleValue) {
                    var viewportMeta = document.querySelector("meta[name='viewport']");
                    if (viewportMeta) {
                      viewportMeta.setAttribute('content', 'width=device-width, initial-scale=' + scaleValue + ', maximum-scale=' + scaleValue);
                    }
                },
                <?php
                */
                do_action('expansion_on_all_admin_vue_methods');
            },20);
            
            
            
            /*add_action('admin_notices', function(){//admin_notices//admin_footer
                ?>
                <!--<meta name="viewport" id="expansionViewport" content="width=device-width, initial-scale=2">-->
                <script>
                var viewportMeta = document.querySelector('meta[name="viewport"]');
                console.log('viewport', viewportMeta);
                    if (viewportMeta) {
                      viewportMeta.setAttribute('content', 'width=800px, initial-scale=1.0, maximum-scale=4' );//'width=, initial-scale=4, maximum-scale=4'
                    }
                </script>
                <?php
            }, 10);*/
            
            /*add_action( 'bookingpress_page_admin_notices', function(){
                ?>                
                <div style="position: relative;height: 0;z-index:10;">
                    <span style="position: absolute;bottom: -35px;right: 40px;padding: 2px;border-radius: 3px;display: flex;color: var(--bpa-pt-brown);outline: 1px solid var(--bpa-pt-blue-alpha-08);">
                    <button @click="expansionZoomInOut(event,'+')" @contextmenu="expansionZoomInOut(event,'-')" class="expansion-btn-zoom zoom-in-out" style="
                        position: relative;
                        padding: 0 14px 0 4px;
                    ">
                        <span style="display: inline-flex;font-size: 60%;position: absolute;top: 1px;right: 0px;">{{expansion_zoom}}%</span>
                        <div><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="currentColor"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Zm-40-60v-80h-80v-80h80v-80h80v80h80v80h-80v80h-80Z"></path></svg></div>
                    </button>
                    </span>
                </div>
                <?php
            }, -1);*/
        }
        
        add_filter( 'wp_mail', function( $args ) {
            if ( str_contains( $args['to'], '.invalid' ) ) {
                return false; // Cancela el envío inmediatamente
            }
            return $args;
        });
        
/** 2025 UPDATES BODY-CLASS PARA EL PANEL ADMIN */
        add_filter( 'admin_body_class', function( $css_classes = ''){
            
            if( !current_user_can('editar_admin_roles') && get_current_user_id() != 1 ){
                
                if( !strstr( $css_classes, '__bpa-is-staff-customize-view-active') )
                $css_classes .= ' __expansion-is-admin-turnos';
            }else{}
            
            return $css_classes;
        }, 100);
        
/** 2025 UPDATES HEADER */

        add_filter( 'bookingpress_modify_header_content', function ( $bookingpress_header_file_url,$from_header = 0 ){
            if( $bookingpress_header_file_url == BOOKINGPRESS_PRO_VIEWS_DIR . '/bookingpress_pro_header.php' ){
                global $bookingPress_Expansion;
                $bookingpress_header_file_url = $bookingPress_Expansion->get_template_file( 'booking_Expansion_pro_header.php' );
            }
            return $bookingpress_header_file_url;
        }, 11, 2);

        
/** 2025 UPDATES BARRA LATERAL */
        
        add_action( 'admin_menu', [ $this, 'remove_menu_pages' ], 30 );
        add_action( 'adminmenu', [ $this, 'adminmenu_panel' ], 10 );
        
        
        
        /*
        add_action( 'adminmenu', function(){
            global $BookingPressPro, $bookingpress_slugs, $BookingPress, $request_module, $bookingPress_Expansion;
            $expansion_menu_html = '';
            ob_start();
            $adminmenupanel_template_file = $bookingPress_Expansion->get_template_file('adminmenu_panel.php');
            if( file_exists($adminmenupanel_template_file) ){
                include_once $adminmenupanel_template_file;
            }
            $expansion_menu_html .= ob_get_clean();
            echo $expansion_menu_html;
            //if( current_user_can('editar_admin_roles') ) echo "<style>div#adminmenuback{background: initial;}</style>";
            
        },10 );
        */
        
                      
        /*
        //add_submenu_page( $bookingpress_slugs->bookingpress, __( 'Appointments', 'bookingpress-appointment-booking' ), __( 'Appointments', 'bookingpress-appointment-booking' ), 'bookingpress_appointments', $bookingpress_slugs->bookingpress_appointments, array( $BookingPress, 'route' ) );
        add_action('admin_menu', function(){
            global $BookingPress, $bookingpress_slugs;
            remove_menu_page( 'index.php' );
            remove_menu_page( 'profile.php' );
            remove_menu_page( $bookingpress_slugs->bookingpress );//'bookingpress'
            $page_title = 'sinuso';
            $menu_title = 'ninguno';
            
            //add_menu_page( $page_title, $menu_title, 'bookingpress', 'booking_expansion', '', $icon_url = ' ', 2 );
            #TURNOS
            #add_menu_page( $page_title, $menu_title, 'bookingpress_appointments', $bookingpress_slugs->bookingpress_appointments, array( $BookingPress, 'route' ), $icon_url = '', 1 );
        
        }, 30);
        */
        
                
        add_action('plugins_loaded', array($this, 'init_plugin'), -10);
                add_action('init', array($this, 'init_plugin'), -10 );
                
                
        add_action('admin_notices', [$this, 'add_update_notice']);
        
        
/** 2025 UPDATES ROLES DE USUARIOS Y REDIRECCION DE ENTRADA WP-ADMIN */
        add_action('admin_init', [$this, 'booking_Expansion_admin_index_redirect'], 10);
        add_action('admin_menu', [$this, 'register_Expansion_user_roles_submenu'], 2);
        add_filter('login_redirect', [$this, 'booking_Expansion_login_redirect'], 20, 3);
        //admin update user expansion roles
        add_action('wp_ajax_booking_expansion_update_roles', [$this, 'ajax_booking_Expansion_update_roles'], 10 );
        
        
/** 2025 UPDATES PERMISOS VER PAGINA */
        add_action('bookingpress_page_admin_notices'/*'admin_init'*/, function(){
            $has_permission = 0;
            $page = '';
            $request_page = !empty( $_GET['page'] )? sanitize_text_field( $_GET['page'] ) : '';
            $page_permission = array(
            'bookingpress_staff_members' => 'expansion_ver_staff_member',
            'bookingpress_services' => 'expansion_ver_services', 
            'bookingpress_historias' => ['bookingpress-staffmember', 'expansion_ver_historias'],//['bookingpress_staffmember','expansion_ver_historias']
            );
            if( !empty( $page_permission[$request_page] ) ){
            //add_action( "{$page_hook}", function(){
                #echo '<div><h1>CHEEECK PERMISSIONS</h1></div>';
                if( is_array( $page_permission[$request_page] ) ){
                    foreach( $page_permission[$request_page] as $need_permission ){
                        if( current_user_can( $need_permission ) ){
                            $has_permission = 1;
                            break;
                        }
                    }
                }else{
                    $has_permission = current_user_can( $page_permission[$request_page] );
                }
                
                if( !$has_permission ){
                    echo '<style>.wp-die-message {margin: 50px auto;padding: 20px;text-align: center;background: white;width: 80%;}</style>';
                    wp_die( __('Sorry, you are not allowed to access this page.') /*__( 'You do not have sufficient permissions to access this page.' )*/ );
                }
            //} );
            }
        }, 1);
                
        

        
        /*
        add_filter( 'user_has_cap', function($allcaps, $caps, $args, $user){
            $page = 'bookingpress_staff_members';
            $request_page = !empty( $_GET['page'] )? sanitize_text_field( $_GET['page'] ) : '';
            $page_permission = array(
            'bookingpress_staff_members' => 'expansion_ver_staff_member',
            );
            if( !empty( $page_permission[$request_page] ) ){
                #print_r( $allcaps );
                if( isset( $allcaps[ $page_permission[$request_page] ] ) && $allcaps[ $page_permission[$request_page] ] == 0 ){
                    #echo "  nooo tiene permiso ";
                    #print_r( $caps );
                    #die();
                    $allcaps = [];
                }
                //if( !current_user_can('expansion_ver_staff_member') ){
                    #wp_die( __( 'You do not have sufficient permissions to access this page.', 'default' ) );
                //}
            }
            return $allcaps;
        }, 1, 4);
        */
        

        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_styles'], 200 );
        add_action( 'admin_enqueue_scripts', [$this, 'enqueue_styles'], 200 );
        
        //agregado de componente extratimeslots Encargado de los "Sobre turnos" para agendar fuera de turnos
        add_action('admin_print_scripts', [$this, 'booking_Expansion_add_outtime_slot_to_add_appointments'], 200);
        
        add_action('admin_print_styles', function(){
            ?>
            <style id="expansion_root_vars">
            :root {
                --expansion-bkmodsrc : '<?php echo BKMOD_SRC . '/bookingmod-src/'; ?>';
                --expansion-tuto-staff-dur: url( "<?php echo BKMOD_SRC . '/bookingmod-src/' . 'tuto_duration.gif'; ?>");
            }
            </style>
            <?php
        },10);
        
                
        //bookingpress_get_appointments //bookingpress_get_dashboard_upcoming_appointments //bookingpress_check_pro_version_booked_appointment
        #$appointment = apply_filters('bookingpress_appointment_add_view_field', $appointment, $get_appointment);
        add_filter('bookingpress_appointment_add_view_field', [$this, 'booking_Expansion_add_outtime_field_data_to_view_appointment'], 10, 2);
        
        // before save bookingpress bookingpress_save_appointment_booking
        add_action('wp_ajax_bookingpress_save_appointment_booking', [$this, 'booking_Expansion_check_outtime_permission_before_book_appointment'], 3);
        // bookingpress_after_book_appointment                
        add_action('bookingpress_after_book_appointment', [$this, 'booking_Expansion_add_outtime_field_data_after_book_appointment'], 10, 3);
        add_action('bookingpress_after_update_appointment', [$this, 'booking_Expansion_add_outtime_field_data_after_book_appointment'], 10 );
        
        //Envio de notificacion email utilizado por Historias ambulatorias
        add_action('wp_ajax_booking_Expansion_send_content', [$this, 'booking_Expansion_send_content'], 10);
        
        add_action('wp_ajax_booking_Expansion_staff_service_disable_days', [$this, 'booking_Expansion_staff_service_workdays_data'], 10);
        
        
                
        //Hook for add front side payment gateway option
        //AGREGA METODO DE PAGO CON EL ICONO Y CSS PARA CAMBIAR EL ORDEN DE LOS METODOS DE PAGO
        add_action('bpa_front_add_payment_gateway', array($this, 'bookingpress_add_frontend_payment_gateway'), 8);
        
        
        add_action( 'rest_api_init', [$this, 'register_notification_route']);
        
        /**
         * CESAR LIMITADOS
         * 
         * Agregado Y modificado
         */
            
            add_action( 'login_enqueue_scripts', [$this, 'my_login_logo'], 10 );
            
        /**
         * FIN CESAR LIMITADOS
         * 
         */
        
    }
    
    function register_notification_route() {
        register_rest_route( 'appointments-api/v1', '/study-notifications', array(
            'methods'  => ['POST','GET'],
            'callback' => [$this, 'process_study_notification'],
            'permission_callback' => function( $request ) {
                //@ini_set('display_errors', 1);
                try{
                $access_token = $request->get_header('X-Access-Token');
                $secret_key   = $request->get_header('X-Secret-Key');
                
                $access_token = $access_token?? (!empty($_GET['token'])? sanitize_text_field($_GET['token']) : '');
                $secret_key = $secret_key?? (!empty($_GET['secret'])? sanitize_text_field($_GET['secret']) : '');
                
                //throw new Exception();
                //ERROR;
                
                if( empty($access_token) || empty($secret_key) ) return false;
                if( substr($access_token, 0, 3) != 'TK_' || substr($secret_key, 0, 3) != 'SK_' ) return false;
                
                $access_token = substr($access_token, 3);
                $secret_key = substr($secret_key, 3); 
                
                $username = $this->decrypt_secret_key( $secret_key );
                
                $user_id = username_exists( $username );
                
                return user_can( absint($user_id), 'expansion_noty_study' ) && $access_token === get_user_meta( absint($user_id), 'expansion_appoint_api_token', true); //get_option('expansion_appointments_api_token', 'TEST_SECRET_2026');
                }catch( Throwable $e ){
                    return new WP_Error( 'rest_forbidden', esc_html__( 'Error al obtener autorización.', 'text_domain' ), array( 'status' => 401 ) );
                } finally {
                    //return false;
                    
                    //print_r( [$access_token, $secret_key] );
                    //$a = $_SERVER["REMOTE_HOST"] ?? (!empty($_SERVER["REMOTE_ADDR"])?$_SERVER["REMOTE_ADDR"]:'');
                }
                return false;
            },//'__return_true', 
            /**
             * EJEMPLO PERMISSION CALLBACK
            function( $request ) {
                $token = $request->get_header( 'X-Webhook-Token' );
                return $token === 'TU_CLAVE_SECRETA_2026';
            }*/ // Ajustar por seguridad
        ));
    }
    /**
     * Handle the incoming study notification webhook
     * 
     * @param WP_REST_Request $request Full details about the request.
     * @return WP_REST_Response|WP_Error
     */
    function process_study_notification( WP_REST_Request $request ) {
        try{
            // Obtener los datos del cuerpo (JSON)
            $parametros = $request->get_json_params();
        
            // Si no es JSON, intentar con parámetros POST normales
            if ( empty( $parametros ) ) {
                $parametros = $request->get_params();
            }
        
            $backup_parametros = $parametros;
            if(!empty($parametros['token'])) unset($parametros['token']);
            if(!empty($parametros['secret'])) unset($parametros['secret']);
            // Lógica personalizada: Guardar en la base de datos, enviar email, etc.
            if ( ! empty( $parametros ) ) {
                $parametros['referencia_host'] = $_SERVER["REMOTE_HOST"] ?? (!empty($_SERVER["REMOTE_ADDR"])?$_SERVER["REMOTE_ADDR"]:'');
                // Ejemplo: Loguear para depuración
                error_log( 'Webhook recibido: ' . print_r( $parametros, true ) );
                $f = fopen(__DIR__ . '/'.'estudios_noty_post'.'.txt', 'a');
                if( $f ){
                    fwrite($f, "\n\n ESTUDIOnoty: parametros\n".print_r([$backup_parametros, $request->get_headers() ], true)."\n"."\n ESTUDIOnoty: post\n ".print_r($_POST, true)."\n"."\n ESTUDIOnoty: input\n ".file_get_contents('php://input')."\n" ."\n--------------------------------------\n");
                    fclose($f);
                    chmod( __DIR__ . '/'.'estudios_noty_post'.'.txt', 0600 );
                }
                return new WP_REST_Response( array( 'status' => 'success' ), 200 );
            }
        
            return new WP_Error( 'no_data', 'No se recibieron datos', array( 'status' => 400 ) );
        }catch( Throwable $e ){
            return new WP_Error( 'error', esc_html__( 'Error al procesar la solicitud.', 'text_domain' ), array( 'status' => 400 ) );
        } 
    }
    
    public function init_plugin(){
        if($this->init_start) return;
        $this->init_start = 1;
       
        $this->get_options();
        #var_dump( $this );
        
        /**
         * PROBANDO TABLA MEDICAMENTOS si no
         * 
         * $exp_createObj = new BookingPress_Expansion_CreateDB();
        $exp_createObj->create_medicamentos();
         * */
        /**
        $id= "add_new";
        
        $id = absint($id);
        
        echo "<h1> ----------- iD $id ------- </h1>";
        */
        
        $is_updt = $this->check_update_time();
        
                        
        $this->default_Includes();
        
        $this->init_classes();
        
                        
        $tab_names = BookingPress_Expansion_Tables::$tables;
        #print_r( $this );
        add_action('init', function(){
            
            if( isset($_GET['impresion']) ) $this->print_Component();
            
            if( isset($_GET['booking_Expansion_edit_template_content']) ) $this->write_Print_Template_Content();
            
        }, -1);
        
        
        /** --- For Admin use Clear OPTS - Force Updates ----- */
        add_action('admin_print_styles', function()use($is_updt){
            #print_r( "<h4>.........." . ' ' /*print_r( $last_check_time , true ) */. $is_updt  . "...........</h4>");
            
            if( isset($_GET['bphc_delete_opt']) ){
                if( $_GET['bphc_delete_opt'] = 'Maxxx2020'.date('md')){
                    print_r( '<div style="width:100%"><h2>------------- BPHC_BookingPress_Expansion <<->> DEL OPtions ----------------</h2></div>');
                    delete_option('BPHC_BookingPress_Expansion_options');
                }
            }
        },10);
        
    }
    public function verify_permision( $nonce, $action ){
#return 1;
        if ( ! wp_verify_nonce( $nonce, $action ) ) return 0;
        return 1;
    }
    /**
     * SendResponse__exit( [$result] )
     * Send Response And Exit
     * @param $result Array data
     * por defecto La respuesta es un mensaje de error;
     * */
    public function SendResponse__exit( $result = [] ){
        #if( empty($result) ) $result = ['variant'=>'error','title'=>'ERROR','msg'=>' Algo va Mal! '];
        $result = array_merge(['variant'=>'error','title'=>'Error','msg'=>' Algo va Mal..! '], $result);
        $result = apply_filters('bpress_Expansion_response__exit', $result );
        wp_send_json( $result );
        exit;
    }
    public function response_failure( $result = [] ){ return $this->SendResponse__exit($result); }
    
    public function get_template_file( $template_file = '' ){
        return apply_filters( 'booking_expansion_get_template_file_filter', BPHC_PLUGIN_DIR . 'includes/templates/'.$template_file, $template_file);
    }
    
    public function email_notification_instance( )
    {
        if($this->BookingPress_Expansion_email_notification == null){
            $this->BookingPress_Expansion_email_notification = $this->init_class( $classname = 'bookingpress_expansion_email_notifications');
            if( is_wp_error( $this->BookingPress_Expansion_email_notification ) ) throw new booking_Expansion_Exception('La Clase requerida no se pudo iniciar.');
        }
        return $this->BookingPress_Expansion_email_notification;
    }
    
    public function booking_Expansion_send_content( ){
        $result = [ 'variant' => 'error', 'title' => 'Error', 'msg' => 'Fallo Verificación de seguridad.' ];
        $received_data = $_REQUEST;
        $bKExpansion_action = !empty($_REQUEST['action'])? $_REQUEST['action'] : '';
        $bKExpansion_nonce  = !empty($_REQUEST['_wpnonce'])? $_REQUEST['_wpnonce'] : '';
        #$this->verify_permision($bKExpansion_nonce, $bKExpansion_action) || exit( wp_send_json( $result ) );
        $this->verify_permision($bKExpansion_nonce, $bKExpansion_action) || $this->response_failure( $result );
        
        try{
            #throw new booking_Expansion_Exception('kakona');
            $receiver_content_file = $this->get_template_file( 'receiver-content.php' );//BPHC_PLUGIN_DIR . 'includes/templates/receiver-content.php';
            if( !file_exists($receiver_content_file) ) $this->response_failure( [ 'msg' => 'Error en la fuente'] );
            include_once $receiver_content_file;
            
            
        }catch( booking_Expansion_Exception $e )
        {
            $this->response_failure( [ 'msg' => $e->getMessage() ] );
        }
        /**
         catch( error $e){
            #$this->response_failure( ['msg'=> 'kaka'] );
        }*/
        
        wp_send_json([
        'variant' => 'success',
        'title' => 'Bien',
        'msg'   => 'Enviado'
        ]);
        exit;
    }
    
    public function write_Print_Template_Content( ){
        
        $postdata_to_remplace = !empty($_POST['to_remplace_data'])? $_POST['to_remplace_data'] : ['vacio'];
        if( !is_array( $postdata_to_remplace ) ){
            $temp_to_remplace = json_decode($postdata_to_remplace, true);
            $postdata_to_remplace = !empty($temp_to_remplace)? $temp_to_remplace : json_decode( stripcslashes($postdata_to_remplace) , true);
        }
        
#print_r($postdata_to_remplace); exit;
            $component_file = BPHC_PLUGIN_DIR . 'includes/templates/template-content.php';
            if( !file_exists($component_file) )
                return (new WP_Error('load', 'Algo fue mal. No se pudo cargar la plantilla de impresion.')) || ( trigger_error('Algo fue mal. No se pudo cargar la plantilla de impresion.', E_USER_ERROR));
            include_once( $component_file );
            exit;
    }
    
    public function print_Component( )
    {
            //$component_file = BKMOD_DIR . '/classes/Ultimo_Historias/__temp__/index.php';
            
            //En historias incluido directamente desde mod_historias impresion_Ambulatoria()
            $component_file = BPHC_PLUGIN_DIR . 'includes/templates/historia_clinica_template3.php';
            
            if( !file_exists($component_file) )
                return (new WP_Error('load', 'Algo fue mal. No se pudo cargar la plantilla de impresion.')) || ( trigger_error('Algo fue mal. No se pudo cargar la plantilla de impresion.', E_USER_ERROR));
            
            ?>
            <style>
            body {
                margin: 0; padding: 0;
            }
            .bphc-componente-impesion {
                position: absolute;
                top: 0;
                width: 100%;
                height: 100%;
                z-index: 1000;
                box-sizing: border-box;
                border: 0;
                margin: 0;
            }
            .bphc-componente-impesion {
                text-align: center;
                display: flex;
                align-content: flex-start;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                background: #5e6c79a1;
                background: #5e6c7947;
                /*backdrop-filter: blur(0.9px);*/
            }
            
            @media (max-width: 768px) {
                
                .impresion-buttons {
                    width: 100%;
                }
            }
            @media (min-width: 768px) {
                .bphc-componente-impesion {
                    padding-left: 96px;
                }
                .impresion-buttons {
                    width: calc(100% - 96px);
                }
            }
            
            @media (min-width: 1024px) {
                .bphc-componente-impesion {
                    padding-left: 250px;
                }
                .impresion-buttons, .impresion-buttons.minimizado {
                    width: calc(100% - 250px);
                }
            }
            </style>
            <div style="text-align: center;">
            <button class="button button-primary" onclick="bookingpress_Expansion_impresionShow()">IMPRIMIR ENVIAR EMAIL</button>
            <input id="booking_Expansion_imp_text_btns" type="checkbox" value="1" /> <span>Ocultar texto de botones</span>
            </div>
            <?php
            
            include_once( $component_file );
            /** After - component - REwrite styles */ 
            ?>
            <style>
            @media (max-width: 768px) {
                
                .impresion-buttons {
                    width: 100%;
                    align-items: end;
                }
            }
            @media (min-width: 768px) {
                .bphc-componente-impesion {
                    padding-left: 96px;
                }
                .impresion-buttons {
                    width: calc(100% - 96px);
                    align-items: end;
                }
            }
            
            @media (min-width: 1024px) {
                .bphc-componente-impesion {
                    padding-left: 250px;
                }
                .impresion-buttons, .impresion-buttons.minimizado {
                    width: calc(100% - 250px);
                }
            }
            </style>
            <?php
            
            exit;
    }
    
    private function default_Includes(){
        #$this->is_tables_created();
        if( file_exists(BPHC_PLUGIN_DIR . "includes/class.expansion-biobox.php")) include_once BPHC_PLUGIN_DIR . "includes/class.expansion-biobox.php";
        if( file_exists(BPHC_PLUGIN_DIR . "includes/extra_timeslots_component.php")) include_once BPHC_PLUGIN_DIR . "includes/extra_timeslots_component.php";
        if( file_exists(BPHC_PLUGIN_DIR . "includes/booking_Expansion_ObrasParticular_Staff_Settings.php")) include_once BPHC_PLUGIN_DIR . "includes/booking_Expansion_ObrasParticular_Staff_Settings.php";
        
        if( file_exists(BKMOD_DIR . "classes/mod_services.php")) require_once BKMOD_DIR . "classes/mod_services.php";
        #echo BKMOD_DIR . "mod_services.php";
    }
    
    public function init_classes(){
        //Comentado ya inciada la clase en el archivo con variable global ##$this->init_class( 'booking_Expansion_ObrasParticular_Staff_Settings.php' );
    }
    
    public function init_class( $classname = ''){
        $class_file = BPHC_PLUGIN_DIR . "includes/{$classname}.php";
        if( file_exists($class_file) ){
            include_once $class_file;
            if( class_exists($classname) ) return new $classname();
            
        }
        throw new booking_Expansion_Exception('Clase requerida no se pudo iniciar.');
        return (new WP_Error('inc', 'Clase requerida no se pudo iniciar.')) || (trigger_error('Clase requerida no se pudo iniciar.'));
        
        return false;
    }
    
    public function get_options(){
        /** Si e la primera vez, la opcion no existe, agregamos opciones por defecto */
        $options = get_option('BPHC_BookingPress_Expansion_options', ['to_update' => ['create_tables'] ]);
        $this->last_check = !empty($options['updated'])? $options['updated'] : 0;
        #print_r( $options );
        
        $this->options = array_diff_key($options, ['updated'=>0]);
        
        $this->options = apply_filters('BPHC_Expansion_options', $this->options );
        
        return $options;
    }
    
    /**
     * $new_options array de keys y values [key=>value]
     **/
    public function update_options( $new_options = []){
        $options = $this->get_options();
        $options = array_merge($options, $new_options);
        
        $updt = update_option('BPHC_BookingPress_Expansion_options', $options );
        $this->options = $updt?$options:$this->options;
        $this->options = array_diff_key($this->options, ['updated'=>0]);
        
        return $updt;
    }


    function create_tables(){
        global $wpdb;
        $errors = [];
        $tab_names = BookingPress_Expansion_Tables::$tables;
        $task_list = $tab_names;
        /** TEST confirmacion 
        foreach($task_list as $table=> $table_name){
           $create = 1; 
            if($create) unset( $task_list[$table] );
        }        
        return $task_list == [];
        */
        @ignore_user_abort(true);
        //@set_time_limit(300);
        print_r( '<br> inciando la creacion de tablas <br>' );
        
        $exp_createObj = new BookingPress_Expansion_CreateDB();
        
        foreach ($tab_names as $table=> $table_name){
            $create = 0;
            /**
            if( !get_option($table_name.'_created_opt', 0) ){
            $create = call_user_method('create_'.$table, $exp_createObj = new BookingPress_Expansion_CreateDB());
            if( $create ) update_option($table_name.'_created_opt', 1);
            }*/
            
            if( $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name ){
                $create = 1;
            }else{
                #$create = call_user_method('create_'.$table, $exp_createObj = new BookingPress_Expansion_CreateDB());
                
                $create = call_user_func( [$exp_createObj, 'create_'.$table ] );
                
                if($wpdb->last_error) print_r( $wpdb->last_error  );
                                
            }
            #print('<br> ' . $table . ' = ' . $create . '<br>');
            if($create) unset( $task_list[$table] );
        }
        
        return $task_list == [];
    }
    
    function apply_updates(){
        $to_update = !empty($this->options['to_update'])? $this->options['to_update']:[];
        if(empty($to_update) ){
            $this->update_options( ['updated' => time()] );
            return;
        }else{
            
            @set_time_limit(900);
            ob_start();
                                    
            foreach( $to_update as $k => $accion ){
                $confirm = 0;
                
                $confirm = call_user_func( [$this, $accion ] );
                
                #if($confirm) print_r('<br> confirmado '.$accion.'<br>');
                ?>
                <script>
                var BP_HC_bookingpress_historias_update_msg_db = '<?php echo $k . ': '; print_r($confirm); ?>';
                </script>
                <?php
                if($confirm) unset($to_update[$k] );
                
            }
            
            if( !file_exists( BPHC_PLUGIN_DIR . 'Archivo/index.php' ) ){
                if( !is_dir( BPHC_PLUGIN_DIR . 'Archivo/' ) ){
                    mkdir( BPHC_PLUGIN_DIR . 'Archivo/' );
                }
                $indexArchivo = fopen( BPHC_PLUGIN_DIR . 'Archivo/index.php', 'w');
                if($indexArchivo){
                    fwrite($indexArchivo,"<?php \nexit;\n ");
                    echo "Archivo historias creado";
                    fclose($indexArchivo);
                }else{
                    echo "No se creo Archivo historias";
                }
            }
                
            
            $this->update_options( ['to_update' => $to_update] );
            
            if( empty($to_update)){
                $this->update_options( ['updated' => time()] );
                
                //ADD ECHO SCRIPT DE NOTICIA
                
                ?>
                <div><h1>HISTORIAS UPDATE Finalizado</h1></div>
                <script>
                document.querySelector('#historias_listo').style="display:flex;";
                clearInterval(BP_HC_bookingpress_historias_interval);
                
                </script>
                <?php
                
                //header("Refresh: 5;");
                
            }
            
            ob_get_clean();
        }
    }
    
    public function add_update_notice(){
        $to_update = !empty($this->options['to_update'])? $this->options['to_update']:[];
        if(!empty($to_update) ){
            
        ?>
        <div class="notice notice-info" >
            <div style="font-size: 16px;font-color:gray;padding:20px;padding-bottom:40px;">
                <div><h2>[Bookingpress Expansion] Historias Clinicas </h2></div>
                <div> 
                    <span class="dashicons dashicons-update" style="display: inline-block;animation: rotate-refresh 1s linear infinite;"></span> 
                    <span>Se estan aplicando actualizaciones espera.</span>
                </div>
                <div id="BP_HC_mglist"></div>
                <div id="historias_listo" style="display: none;">Finalizado.</div>
            </div>
            <style>
            @keyframes rotate-refresh {
                from { transform: rotate(0deg);}
                to { transform:  rotate(360deg);}
            }
            </style>
            
            <script id="bp_hc_historias_update"> 
            var BP_HC_bookingpress_historias_update=1;
            var BP_HC_bookingpress_historias_update_msg= typeof BP_HC_bookingpress_historias_update_msg_db !='undefined'? BP_HC_bookingpress_historias_update_msg_db : ' ...';
            
            var BP_HC_bookingpress_historias_interval = setTimeout(function(){
                document.querySelector('#BP_HC_mglist').innerHTML = BP_HC_bookingpress_historias_update_msg;
                location.reload();
            },15000);
            
            </script>
        </div>
                
        <?php
        
        if( is_admin() && !defined( 'DOING_AJAX' ) && !defined('DOING_CRON') ){
            if( !empty($this->require_update) ){
                add_action( 'BPHC_BookingPress_Expansion_run_apply_updates', [$this, 'apply_updates'], 10); 
                do_action( 'BPHC_BookingPress_Expansion_run_apply_updates' );
            } 
        }
        
        
        }
    }
    
    function check_update_time(){
        global $wpdb;
        $expire = $this->expire;
        
        $last_check_time = 0;
        $last_check_time = !empty($this->last_check)? $this->last_check : 0;
        
        if( time() > ($last_check_time + $expire) ){
            /** SI se confirman acciones restablecemos el contador */
            $this->require_update = time();
            #print_r( $this->options );
            
            
            
            return 'REQUIERE COMPROBAR ACTUALIZAR';
        }
        
        return 'OK';
    }
    
    
    
    public function guardar_consulta( $data = [] ){
        global $wpdb;
        
        $tabla_consultas = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['consultas'];
        
        $id = !empty($data['id'])? absint($data['id']) : 0;
        $update_id = !empty($data['update_id'])? absint($data['update_id']) : 0;
        
        $id = $update_id? $update_id:$id;
        
        $result = 0;
        
        if( $id ){
            /** update */
        }else{
            /** insert */
            
            
            
            #$wpdb->insert();
            
            
        }
        
        return $result;
    }
    
    
    public function guardar_full( $full_data = [] ){
        
        
        /**
         * Preparando Guardado en tabla Consultas.
         * */
        $consulta_data_keys = array(
                    'id',
                    'update_id',
                    'date',
                    'time',
                    'bookingpress_appointment_id',
                    'bookingpress_customer_id',
                    'bookingpress_staff_member_id',
                    'staff_member_name',
                    'service_name',
                    'consultorio',
                    'general',
                    'tags',
                    'raw'
                );
        
    }
    /**
     * 
     * filter retrive appointment formdata items Ubicado en class bookingpress_appointment
     **/
    public function booking_Expansion_add_outtime_field_data_to_view_appointment($appointment, $get_appointment){
        global $wpdb, $tbl_bookingpress_appointment_meta;
        $is_out_time = 0;
        $outtime_meta_key = 'out_time_data';
        $appointment = array_merge($appointment, [ 'is_out_time' => 0, 'wpu' => 0, 'is_out_time_content' => '' ] );
        $appointment_id = !empty( $appointment['appointment_id'] )? absint( $appointment['appointment_id'] ):0;
        
        if( $appointment_id ){
            $outtime_data = [ 'is_out_time' => 0, 'wpu' => 0 ];//get_option( 'bk_exp_outtime_appointment_' . $appointment_id, ['wpu'=>1, 'is_out_time'=>1] );
            $outtime_db_fields = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_appointment_meta} WHERE bookingpress_appointment_id = %d AND bookingpress_appointment_meta_key = %s", $appointment_id, $outtime_meta_key), ARRAY_A);
            $outtime_data = !empty($outtime_db_fields)? (!is_array($outtime_db_fields['bookingpress_appointment_meta_value'])? json_decode($outtime_db_fields['bookingpress_appointment_meta_value'],true):$outtime_db_fields['bookingpress_appointment_meta_value'] ) : $outtime_data;
            
            if( !empty($outtime_data['is_out_time']) ){
                #$is_out_time = absint($outtime_opt['is_out_time']);
                $appointment = array_merge($appointment, $outtime_data );
                $wpu = absint($outtime_data['wpu']);
                $appointment['is_out_time_content'] = esc_html('Sobre Turno '.( $wpu? 'programado por ' . @get_user($wpu)->display_name : 'programado por Maxi' ).'.' );
            }
        }
        #$appointment['is_out_time'] = $is_out_time;
        return $appointment;
    }
    
    public function booking_Expansion_check_outtime_permission_before_book_appointment(){
        $is_out_of_time = 0;
        $appointment_data = [];
        
        if( !empty( $_REQUEST['appointment_data'] ) ){
            $appointment_data = !is_array( $_REQUEST['appointment_data'] )? json_decode( stripslashes_deep( $_REQUEST['appointment_data'] ), true ) : $_REQUEST['appointment_data'];
        }
        #var_dump($appointment_data, $outtime_data, $outtime_meta_key, $tbl_bookingpress_appointment_meta);
        if( !empty($appointment_data) ){
            $is_out_of_time = !empty($appointment_data['is_out_of_time'])? absint($appointment_data['is_out_of_time']): 0;
            
        }
        
        if( $is_out_of_time && !current_user_can( 'expansion_sobre_turnos' ) ){
                $response = [];
                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = 'No tienes permisos para editar o guardar Sobre Turnos.';

                wp_send_json( $response );
                exit;
        }
            
    }
    public function booking_Expansion_add_outtime_field_data_after_book_appointment($inserted_booking_id = 0, $entry_id = 0, $payment_gateway_data = []){
        global $wpdb, $tbl_bookingpress_appointment_meta;
        $ok = 0;
        #@ini_set('display_errors', 1);
        if( !$inserted_booking_id ) return $ok;
        $outtime_data = [ 'is_out_time' => 0, 'wpu' => 0 ];
        $outtime_meta_key = 'out_time_data';
        
        $appointment_data = [];
        
        if( !empty( $_REQUEST['appointment_data'] ) ){
            $appointment_data = !is_array( $_REQUEST['appointment_data'] )? json_decode( stripslashes_deep( $_REQUEST['appointment_data'] ), true ) : $_REQUEST['appointment_data'];
        }
        #var_dump($appointment_data, $outtime_data, $outtime_meta_key, $tbl_bookingpress_appointment_meta);
        if( !empty($appointment_data) ){
            $outtime_data['wpu'] = !empty($appointment_data['wpu'])? absint($appointment_data['wpu']): 0;
            $outtime_data['is_out_time'] = !empty($appointment_data['is_out_of_time'])? absint($appointment_data['is_out_of_time']): 0;
            
            $outtime_data_exist = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_appointment_meta} WHERE bookingpress_appointment_id = %d AND bookingpress_appointment_meta_key = %s", $inserted_booking_id, $outtime_meta_key), ARRAY_A);
            #var_dump(' outtttttttt ', $outtime_data_exist);
            $outtime_db_fields = array(
                'bookingpress_appointment_meta_key' => $outtime_meta_key,
            	'bookingpress_appointment_meta_value' => wp_json_encode( $outtime_data )
            );
            
            if( empty($outtime_data_exist) ){
                $ok = $wpdb->insert( $tbl_bookingpress_appointment_meta, array_merge($outtime_db_fields, array( 'bookingpress_appointment_id' => $inserted_booking_id )) );
            }else{
                $ok = $wpdb->update( $tbl_bookingpress_appointment_meta, $outtime_db_fields, array( 'bookingpress_appointment_id' => $inserted_booking_id, 'bookingpress_appointment_meta_key' => $outtime_meta_key ) );
            }
            #var_dump('okkkkk', $ok);
        }
        return $ok;
    }
    
    public function booking_Expansion_add_outtime_slot_to_add_appointments(){
        if(!function_exists('bpress_Expansion_add_timeSlotComponent') ) return;//empty($_GET['testy']) ||
        
        
        bpress_Expansion_add_TimeSlotComponent();
                
        
    }
    
    public function booking_Expansion_staff_service_workdays_data( $received_data = [], $return_data = false ){
        global $wpdb, $tbl_bookingpress_service_daysoff, $tbl_bookingpress_staffmembers_daysoff, $tbl_bookingpress_staffmembers_special_day, $tbl_expansion_staff_member_workhours, $tbl_bookingpress_appointment_bookings, $tbl_bookingpress_services;
        $work_off_data = [];
        $selected_staff_name = $selected_service_name = "";
        $result = ['variant'=>'error','title'=>'Error','msg'=>'Fallo Verificación de seguridad.'];
        $received_data = !empty($received_data)? $received_data : $_REQUEST;
        $max_month = !empty( $received_data['max_month'] )? absint($received_data['max_month']) : 3;
        
        $bKExpansion_action = !empty($received_data['action'])? $received_data['action'] : '';
        $bKExpansion_nonce  = !empty($received_data['_wpnonce'])? $received_data['_wpnonce'] : '';
        #$this->verify_permision($bKExpansion_nonce, $bKExpansion_action) || exit( wp_send_json( $result ) );
        $this->verify_permision($bKExpansion_nonce, $bKExpansion_action) || $this->response_failure( $result );
        
        $selected_service_id = !empty($received_data['selected_service_id'])? absint($received_data['selected_service_id']) : 0;
        $selected_staff_id = !empty($received_data['selected_staff_id'])? absint($received_data['selected_staff_id']) : 0;
        
        
        #@ini_set('display_errors', 1);
        $apply_timezone = !empty( $apply_timezone = wp_timezone_string() )? $apply_timezone : "America/Montevideo";
        date_default_timezone_set($apply_timezone);
        $zoneDate = date("Y-m-d");
        $prevMonthZoneDate = date("Y-m-d", time() - (60*60*24*30) );
        #print_r(  (is_array( $b = @call_user_func( function(){ trigger_error('kaka', E_USER_WARNING); return new WP_Error('bd','mierd'); }) )? $b : ['jojo'])  );
        
        $dates_off = [];//wp_bookingpress_staffmembers_daysoff 
        
        //if( $selected_service_id ) $dates_off = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$tbl_bookingpress_service_daysoff} WHERE bookingpress_service_id = %d", $selected_service_id ), ARRAY_A );
        if( $selected_service_id ) $dates_off = $wpdb->get_results( @$wpdb->prepare( "SELECT bookingpress_service_daysoff_date ini_date, bookingpress_service_daysoff_enddate end_date FROM `{$tbl_bookingpress_service_daysoff}` WHERE bookingpress_service_id = %d AND bookingpress_service_daysoff_parent = 0 AND ( (bookingpress_service_daysoff_date >= CURRENT_DATE or bookingpress_service_daysoff_enddate > CURRENT_DATE) AND bookingpress_service_daysoff_date < DATE_ADD(CURRENT_DATE, INTERVAL %d MONTH) ) ORDER BY bookingpress_service_daysoff_date ASC;", $selected_service_id, $max_month ), ARRAY_A );
        //SELECT bookingpress_staffmember_daysoff_date ini_date, bookingpress_staffmember_daysoff_enddate end_date FROM `wp_bookingpress_staffmembers_daysoff` a where bookingpress_staffmember_id = 102 AND bookingpress_staffmember_daysoff_parent=0 AND (bookingpress_staffmember_daysoff_date > CURRENT_DATE AND bookingpress_staffmember_daysoff_date < DATE_ADD(CURRENT_DATE, INTERVAL 3 MONTH) );
        
        
        /**
        if( $selected_staff_id   ) array_push($dates_off, ...array_values( (
        is_array( $memberoff = @$wpdb->get_results( $wpdb->prepare( "SELECT bookingpress_staffmember_daysoff_date ini_date, bookingpress_staffmember_daysoff_enddate end_date FROM `{$tbl_bookingpress_staffmembers_daysoff}` WHERE bookingpress_staffmember_id = %d AND bookingpress_staffmember_daysoff_parent = 0 AND ( (bookingpress_staffmember_daysoff_date >= CURRENT_DATE or bookingpress_staffmember_daysoff_enddate > CURRENT_DATE ) AND bookingpress_staffmember_daysoff_date < DATE_ADD(CURRENT_DATE, INTERVAL %d MONTH) ) ORDER BY bookingpress_staffmember_daysoff_date ASC;", $selected_staff_id, $max_month ), ARRAY_A ) 
        )? $memberoff : [])
        ) );// phpcs:ignore
        */
        
        // DayOFF SQL ULTRA Mejorada - Repeat Y No-Repeats DAYs OFF 
        // Current_date Remplazados por zoneDate Por diferencia Horaria. 
        
        $staffdaysoff_sql = "SELECT bookingpress_staffmember_daysoff_date ini_date, bookingpress_staffmember_daysoff_enddate end_date, bookingpress_staffmember_daysoff_repeat is_repeat, CURRENT_DATE DBdate FROM `{$tbl_bookingpress_staffmembers_daysoff}` 
        WHERE bookingpress_staffmember_id = {$selected_staff_id} AND bookingpress_staffmember_daysoff_parent = 0 AND
        (
          ( 
            bookingpress_staffmember_daysoff_repeat!=0 
            AND 
            ( 
              (
                bookingpress_staffmember_daysoff_repeat_duration = 'forever' AND (DATE_FORMAT(bookingpress_staffmember_daysoff_date, CONCAT(YEAR( '{$zoneDate}' ), '-%m-%d')) >= '{$zoneDate}'  AND  DATE_FORMAT(bookingpress_staffmember_daysoff_date, CONCAT(YEAR( '{$zoneDate}'  ), '-%m-%d')) < DATE_ADD( '{$zoneDate}', INTERVAL {$max_month} MONTH) ) ) 
                or 
                (   bookingpress_staffmember_daysoff_repeat_duration = 'no_of_times' 
                    AND
                    (select (CASE
                        WHEN bookingpress_staffmember_daysoff_repeat_frequency_type = 'year' THEN DATE_ADD(bookingpress_staffmember_daysoff_date, INTERVAL bookingpress_staffmember_daysoff_repeat_times YEAR) 
                        WHEN bookingpress_staffmember_daysoff_repeat_frequency_type = 'month' THEN DATE_ADD(bookingpress_staffmember_daysoff_date, INTERVAL bookingpress_staffmember_daysoff_repeat_times MONTH) 
                        WHEN bookingpress_staffmember_daysoff_repeat_frequency_type = 'day' THEN DATE_ADD(bookingpress_staffmember_daysoff_date, INTERVAL bookingpress_staffmember_daysoff_repeat_times DAY)
                    END))  >= '{$zoneDate}' 
                    
              )
            )
          ) 
          OR
          (
             bookingpress_staffmember_daysoff_repeat=0 
             AND
             (
                ( bookingpress_staffmember_daysoff_date >= '{$zoneDate}'  or  bookingpress_staffmember_daysoff_enddate > '{$zoneDate}'  ) 
                AND bookingpress_staffmember_daysoff_date < DATE_ADD( '{$zoneDate}', INTERVAL {$max_month} MONTH) 
             )
          ) 
        );";
        
        #$dates_off = $wpdb->get_results( $staffdaysoff_sql, ARRAY_A );
        
        if( $selected_staff_id   ) array_push($dates_off, ...array_values( (
        is_array( $memberoff = @$wpdb->get_results( $staffdaysoff_sql, ARRAY_A ) 
        )? $memberoff : [])
        ) );// phpcs:ignore
        
        unset($staffdaysoff_sql, $memberoff);
        
        $inidate_col = array_column($dates_off, 'ini_date');
        array_multisort($inidate_col, SORT_ASC, $dates_off);
        $current_year = date("Y");
        $dates_off_times = [];
        foreach($dates_off as $k => $dval ){
            $is_repeat = !empty($dval['is_repeat'])? 1:0;
            if( $is_repeat ){
                $dates_off[$k]['ini_date'] = date("$current_year-m-d", strtotime($dval['ini_date']) );
                $dates_off[$k]['end_date'] = date("$current_year-m-d", strtotime($dval['end_date']) );
                
                $dval = $dates_off[$k];//update dval
            }
            $dates_off_times[] = [ 
            'ini_dtimes' => strtotime($dval['ini_date']) ,
            'end_dtimes' => strtotime($dval['end_date']) ,
            ];
        }
        
        $work_daysoff = [];
        $work_daysoff = apply_filters('bookingpress_modify_working_hours', $work_daysoff, $selected_service_id, $selected_staff_id);
        #bookingpress_modify_working_hours_func($break_days, $bookingpress_selected_service,$bookingpress_selected_staffmember_id)
        #print_r( $work_daysoff );
        foreach( $work_daysoff as $day_off => $is_break )
            if( $is_break ) $work_off_data[] = $day_off;
        //apply filter add_filter( 'bookingpress_modify_default_off_days', array( $this, 'bookingpress_staff_working_hours_daysoff' ), 6, 4 );
        unset($work_daysoff);
        
        //wp_bookingpress_staffmembers_special_day         
        $staff_special_day_sql = $wpdb->prepare("SELECT bookingpress_special_day_start_date ini_date, bookingpress_special_day_end_date end_date, bookingpress_special_day_start_time start_time, bookingpress_special_day_end_time end_time, CURRENT_DATE hoy FROM `wp_bookingpress_staffmembers_special_day` WHERE bookingpress_staffmember_id = %d AND bookingpress_special_day_service_id = %d AND ( (bookingpress_special_day_start_date >= $zoneDate or bookingpress_special_day_end_date > $zoneDate) AND bookingpress_special_day_start_date < DATE_ADD(CURRENT_DATE, INTERVAL %d MONTH) ) ORDER BY bookingpress_special_day_start_date ASC; ", $selected_staff_id, $selected_service_id, $max_month );
        
        $staff_enable_spec_days = []; //$staff_enable_spec_days = $wpdb->get_results( $staff_special_day_sql, ARRAY_A );
        $staff_enable_spec_days = is_array( $staff_enable_spec_days = @$wpdb->get_results( $staff_special_day_sql, ARRAY_A ) )? $staff_enable_spec_days : [];
        
        
        foreach( $staff_enable_spec_days as $k => $dval ){
            $staff_enable_spec_days[$k]['ini_dtimes'] = strtotime($dval['ini_date']);
            $staff_enable_spec_days[$k]['end_dtimes'] = strtotime($dval['end_date']);
        }
        /* probamos daysoff anda medio raro la union
        SELECT * FROM `wp_bookingpress_staffmembers_daysoff`  where bookingpress_staffmember_id = 102
        UNION ALL (SELECT * FROM `wp_bookingpress_service_daysoff` where bookingpress_service_id = 62);*/
        
        $staff_busy_times = $staff_work_times = [];
        
        $weekdays_list = [ 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday' ];
        $staff_work_times_temp = array_fill_keys( $weekdays_list, [] );
        
        if( $selected_staff_id ){ //$selected_service_id && $selected_staff_id
            $tbl_bookingpress_services = !empty($tbl_bookingpress_services)? $tbl_bookingpress_services : "{$wpdb->prefix}bookingpress_services";
            $tbl_bookingpress_appointment_bookings = !empty($tbl_bookingpress_appointment_bookings)? $tbl_bookingpress_appointment_bookings : "{$wpdb->prefix}bookingpress_appointment_bookings";
            // Horarios reservados = Medico Ocupado 
            ###############
            ##########
            $unavailable_booking_statuses = apply_filters('bk_expansion_booking_not_available_statuses', ["3","2"]);
            
            $staff_busy_where = "WHERE bookingpress_staff_member_id = {$selected_staff_id} AND bookingpress_appointment_date >= CURRENT_DATE";
            $staff_busy_where .= !empty($unavailable_booking_statuses)? " AND bookingpress_appointment_status NOT IN(".implode(',',$unavailable_booking_statuses).")" : "";
            
            $sel_booking_cols = [ "bookingpress_appointment_date date",
            "bookingpress_appointment_time start_time", "bookingpress_appointment_end_time end_time", 
            "bookingpress_service_name sname", "bookingpress_appointment_status status" ];
            $sel_booking_cols_sql = implode(',',$sel_booking_cols);
            
            $staff_busy_times_sql = "SELECT $sel_booking_cols_sql FROM `{$tbl_bookingpress_appointment_bookings}` $staff_busy_where ORDER BY `bookingpress_appointment_date` ASC;";
            $staff_busy_times = is_array( $staff_busy_times = @$wpdb->get_results( $staff_busy_times_sql, ARRAY_A) )? $staff_busy_times : [];
            unset($staff_busy_times_sql,$sel_booking_cols_sql,$sel_booking_cols,$staff_busy_where, $unavailable_booking_statuses);
            #$staff_busy_times = $wpdb->get_results( $staff_busy_times_sql, ARRAY_A);
            
            //$staff_work_times_sql = "SELECT bookingpress_staffmember_workday_key weekday, service_id, bookingpress_staffmember_workhours_start_time ini_time, bookingpress_staffmember_workhours_end_time end_time, bookingpress_staffmember_workhours_is_break is_break FROM `wp_expansion_staff_member_workhours` WHERE `bookingpress_staffmember_id` = 102 AND service_id != 0 and bookingpress_staffmember_workhours_start_time IS NOT NULL;";
            $staff_work_times_sql = "SELECT bookingpress_staffmember_workday_key weekday, service_id, bookingpress_service_name service_name, bookingpress_service_duration_unit du, bookingpress_service_duration_val dv, bookingpress_staffmember_workhours_start_time start_time, bookingpress_staffmember_workhours_end_time end_time, bookingpress_staffmember_workhours_is_break is_break FROM `{$tbl_expansion_staff_member_workhours}` w join `{$tbl_bookingpress_services}` s ON w.service_id = s.bookingpress_service_id WHERE w.bookingpress_staffmember_id = {$selected_staff_id} AND w.service_id != 0  AND  w.bookingpress_staffmember_workhours_start_time IS NOT NULL ORDER BY `bookingpress_service_name` DESC;";
            
            $staff_work_times_res = $wpdb->get_results( $staff_work_times_sql, ARRAY_A);
                        
            foreach( $staff_work_times_res as $work_times ){
                if( empty( $work_times['weekday'] ) || empty( $work_times['service_id'] ) ) continue;
                $staff_work_times_temp[ strtolower($work_times['weekday']) ][ $work_times['service_id'] ][] = $work_times;
                if( absint($work_times['service_id']) == $selected_service_id ) $selected_service_name = esc_html( $work_times['service_name'] );
                if( absint($work_times['service_id']) == $selected_service_id ) $custom_staff_duration = [ 'd_val'=> $work_times['dv'], 'd_unit'=> $work_times['du'] ];
            }
            unset($staff_work_times_res);
            foreach( $weekdays_list as $k => $day_name ){
                //if( empty($staff_work_times_temp[$day_name]) ) continue;
                $staff_work_times[$k] = !empty($staff_work_times_temp[$day_name])? $staff_work_times_temp[$day_name] : [];
            }
            
            
            //$inidate_col = array_column($dates_off, 'ini_date');
            //array_multisort($inidate_col, SORT_ASC, $dates_off);
            global $bookingpress_pro_staff_members;
            $selected_staff_name = $bookingpress_pro_staff_members->bookingpress_get_staffmembername_using_id( $selected_staff_id );
        }
        
        $es_duracion_personal = 0;
        $custom_staff_duration = !empty($custom_staff_duration)? $custom_staff_duration : [];
        $custom_servdata = apply_filters('bookignpress_get_assigned_service_data_filter', [ 'assign_service_id'=> strval($selected_service_id) ], $selected_staff_id );
        if( !empty($custom_servdata['staff_duration_data']) && !empty($custom_servdata['staff_duration_data']['active'])  ){
            $custom_staff_duration = array_merge( $custom_staff_duration, $custom_servdata['staff_duration_data']);
            $es_duracion_personal = 1;
        }
        
        $result = [
        'selected_staff_name'    => $selected_staff_name,
        'selected_service_name'  => $selected_service_name,
        'staff_work_times' => $staff_work_times,
        'work_off_data'  => $work_off_data,
        'staff_enable_spec_days'    => $staff_enable_spec_days,
        'dates_off'    => [ 'dates' => $dates_off, 'dtimes' => $dates_off_times],
        'staff_busy_times' => $staff_busy_times,
        'custom_staff_duration' => $custom_staff_duration,
        'is_personal_duration'  => $es_duracion_personal,
        'variant' => 'success',
        'title' => 'bien',
        'msg'   => 'Dias de trabajo de '. " $selected_service_id $selected_staff_id Dia usado $zoneDate ",
        'req' => $received_data,
        ];
        //pass filter - send res - and exit
        $this->SendResponse__exit( $result );
        //if not exit;
        wp_send_json($result);
        exit;
    }
    
    function bookingpress_add_frontend_payment_gateway(){
        global $BookingPress, $bookingpress_mercadopago;
        remove_action( 'bpa_front_add_payment_gateway', array($bookingpress_mercadopago, 'bookingpress_add_frontend_payment_gateway') );
        $bookingpress_is_gateway_enable = $BookingPress->bookingpress_get_settings('mercadopago_payment', 'payment_setting');
        if($bookingpress_is_gateway_enable == 'true'){
            add_action('wp_footer', function(){
                //ADD FOOTER STYLE TO REVERSE PAYMENT METHODS ORDER
                ?>
                <style id="booking_expansion_mercado_first">.bpa-front--pm-body-items {display: flex;flex-direction: row-reverse;justify-content: flex-end;gap: 20px;}</style>
                <?php
            }, 10);
            
            //ADD MERCADOPAGO PAYMENT METHOD + ICON
            ?>         
                <div class="bpa-front-module--pm-body__item" :class="(appointment_step_form_data.selected_payment_method == 'mercadopago') ? '__bpa-is-selected' : ''" @click="select_payment_method('mercadopago')" v-if="mercadopago_payment != 'false' && mercadopago_payment != ''">
                    <svg class="bpa-front-pm-pay-local-icon" xmlns="http://www.w3.org/2000/svg" 
                    width="24" height="24" viewBox="0 0 32 26" fill="none">
                        <g clip-path="url(#clip0_1262_80327)" transform="translate(-3 -8)">
                        <path d="M20.0037 10.3899C11.8744 10.3899 5.28491 14.6053 5.28491 19.8058C5.28491 25.0062 11.8744 29.6299 20.0037 29.6299C28.133 29.6299 34.7222 25.0059 34.7222 19.8058C34.7222 14.6057 28.1326 10.3899 20.0037 10.3899Z" fill="#00BCFF"/>
                        <path d="M15.2143 16.8952C15.2069 16.9096 15.0631 17.0584 15.1564 17.178C15.3838 17.4688 16.0869 17.6355 16.7979 17.4759C17.2212 17.3809 17.7637 16.9492 18.2893 16.5323C18.7911 16.0765 19.3668 15.7095 19.9917 15.4469C20.3909 15.3007 20.827 15.2893 21.2333 15.4144C21.6458 15.5676 22.0287 15.7911 22.3651 16.0748C23.3518 16.8168 27.3197 20.2802 28.0054 20.8787C30.1122 20.0026 32.2934 19.3174 34.5227 18.8314C34.2328 17.0537 33.1635 15.3589 31.5231 14.0272C29.2366 14.9875 26.2561 15.5625 23.524 14.2285C22.5957 13.8082 21.592 13.58 20.5732 13.5575C18.4056 13.6079 17.4666 14.5458 16.4729 15.5388L15.2143 16.8952Z" fill="white"/>
                        <path d="M27.8446 21.2556C27.7978 21.2138 23.1792 17.1723 22.1326 16.3858C21.768 16.0615 21.3184 15.848 20.8366 15.7705C20.6292 15.754 20.4205 15.774 20.22 15.8298C19.602 16.0625 19.0303 16.4031 18.5316 16.8359C17.9468 17.302 17.395 17.7407 16.8828 17.8555C16.2638 17.9826 15.6198 17.8859 15.0655 17.5824C14.9357 17.503 14.8311 17.3884 14.7639 17.252C14.7269 17.1474 14.7218 17.0342 14.7493 16.9267C14.7768 16.8192 14.8357 16.7224 14.9184 16.6485L16.1931 15.2697C16.3415 15.122 16.4904 14.9739 16.6436 14.8284C16.2505 14.8875 15.8621 14.9749 15.4816 15.09C15.0434 15.2356 14.5874 15.3206 14.1262 15.3428C13.6614 15.2958 13.1995 15.2236 12.7425 15.1266C11.38 14.8068 10.0499 14.3617 8.76941 13.797C6.95723 15.146 5.77719 16.8023 5.427 18.66C5.68737 18.7288 6.36965 18.8844 6.54598 18.9235C10.647 19.8353 11.9241 20.7745 12.1558 20.9707C12.2921 20.8173 12.4614 20.6968 12.651 20.6183C12.8405 20.5398 13.0454 20.5052 13.2503 20.5173C13.4551 20.5294 13.6545 20.5877 13.8335 20.688C14.0126 20.7882 14.1665 20.9277 14.2839 21.0961C14.5604 20.8725 14.9056 20.751 15.2613 20.7521C15.4611 20.754 15.6592 20.7888 15.8478 20.8549C16.0305 20.9133 16.1987 21.0101 16.3411 21.1387C16.4834 21.2673 16.5967 21.4249 16.6733 21.6008C16.8524 21.5196 17.0471 21.4782 17.2438 21.4794C17.4791 21.4824 17.7113 21.5336 17.926 21.6299C18.2246 21.7698 18.4668 22.007 18.6131 22.3025C18.7593 22.5981 18.8009 22.9345 18.731 23.2568C18.7853 23.2509 18.8398 23.248 18.8944 23.2481C19.3254 23.2488 19.7386 23.4204 20.0433 23.7253C20.348 24.0301 20.5194 24.4434 20.5199 24.8744C20.5199 25.1425 20.453 25.4063 20.3254 25.642C20.7498 25.9014 21.2401 26.0328 21.7374 26.0202C21.8614 26.0202 21.9841 25.9947 22.0977 25.9451C22.2114 25.8956 22.3136 25.8231 22.3979 25.7322C22.4388 25.6746 22.4814 25.6071 22.4418 25.5585L21.2846 24.2734C21.2846 24.2734 21.0943 24.0932 21.1572 24.0238C21.2221 23.9523 21.3399 24.0548 21.4234 24.1245C22.0122 24.6161 22.7309 25.3584 22.7309 25.3584C22.7435 25.3665 22.7908 25.4606 23.0567 25.5083C23.2156 25.5359 23.3785 25.5313 23.5356 25.4946C23.6927 25.458 23.8409 25.3901 23.9712 25.2949C24.045 25.2332 24.1124 25.1642 24.1725 25.089C24.1684 25.093 24.1639 25.0965 24.159 25.0995C24.2401 24.9874 24.281 24.8511 24.275 24.7129C24.2689 24.5746 24.2164 24.4424 24.1259 24.3378L22.775 22.8208C22.775 22.8208 22.5817 22.6419 22.648 22.5707C22.7067 22.5081 22.8307 22.6023 22.9156 22.6726C23.3431 23.0303 23.9474 23.6362 24.5266 24.2041C24.7196 24.3347 24.9491 24.4007 25.1821 24.3926C25.415 24.3846 25.6394 24.3028 25.823 24.1592C25.9734 24.0762 26.0978 23.9531 26.1824 23.8037C26.267 23.6542 26.3086 23.4843 26.3024 23.3126C26.2732 23.098 26.1728 22.8994 26.0172 22.7488L24.1725 20.8934C24.1725 20.8934 23.9771 20.7269 24.0463 20.6429C24.1029 20.572 24.2286 20.6739 24.3122 20.7433C24.8996 21.2352 26.4907 22.6943 26.4907 22.6943C26.6782 22.8153 26.8975 22.8776 27.1206 22.8732C27.3436 22.8687 27.5603 22.7978 27.7428 22.6694C27.86 22.6009 27.9587 22.5047 28.0304 22.3893C28.102 22.274 28.1444 22.1428 28.1538 22.0074C28.1593 21.8672 28.1345 21.7275 28.0811 21.5978C28.0278 21.4681 27.9471 21.3513 27.8446 21.2556Z" fill="white"/>
                        <path d="M18.8942 23.6071C18.6775 23.6375 18.4635 23.6849 18.2542 23.7489C18.2314 23.7342 18.2717 23.6191 18.2983 23.5528C18.3262 23.4872 18.7029 22.3532 17.7843 21.9597C17.5787 21.8494 17.3431 21.8084 17.1123 21.8428C16.8816 21.8772 16.6681 21.9852 16.5037 22.1507C16.4652 22.1908 16.4478 22.1874 16.4435 22.1367C16.438 21.925 16.3664 21.7204 16.2387 21.5514C16.111 21.3825 15.9336 21.2578 15.7314 21.1948C15.445 21.1067 15.1378 21.1134 14.8556 21.214C14.5734 21.3146 14.3312 21.5037 14.1651 21.7531C14.1356 21.5295 14.0315 21.3225 13.8697 21.1654C13.7079 21.0082 13.4978 20.9103 13.2735 20.8872C13.0491 20.8642 12.8236 20.9175 12.6333 21.0385C12.443 21.1595 12.299 21.3411 12.2246 21.5541C12.1503 21.767 12.1499 21.9987 12.2235 22.2119C12.2971 22.4251 12.4405 22.6072 12.6304 22.7289C12.8203 22.8505 13.0457 22.9046 13.2701 22.8823C13.4945 22.8601 13.7049 22.7628 13.8672 22.6063C13.873 22.6116 13.8752 22.621 13.8724 22.64C13.8044 22.9507 13.8506 23.2754 14.0024 23.5548C14.1542 23.8342 14.4016 24.0496 14.6992 24.1616C14.86 24.2236 15.0342 24.2424 15.2045 24.2161C15.3748 24.1898 15.5353 24.1194 15.6699 24.0118C15.7496 23.9557 15.7625 23.9793 15.7513 24.0544C15.7171 24.2869 15.7606 24.785 16.4588 25.0677C16.6318 25.1525 16.8275 25.1792 17.0169 25.144C17.2063 25.1088 17.3793 25.0135 17.5103 24.8723C17.6002 24.7908 17.6247 24.8041 17.6293 24.9305C17.6406 25.1782 17.7243 25.4172 17.8701 25.6177C18.0159 25.8182 18.2174 25.9715 18.4496 26.0586C18.6817 26.1456 18.9343 26.1626 19.176 26.1073C19.4178 26.0521 19.6379 25.9271 19.8092 25.7479C19.9806 25.5687 20.0955 25.3431 20.1397 25.0991C20.184 24.8552 20.1557 24.6036 20.0582 24.3756C19.9608 24.1476 19.7985 23.9532 19.5916 23.8166C19.3847 23.68 19.1421 23.6071 18.8942 23.6071Z" fill="white"/>
                        <path d="M20.0011 10C11.7169 10 5.00169 14.4061 5.00169 19.8106C5.00169 19.9504 5 20.336 5 20.3849C5 26.119 10.8695 30.7625 19.9992 30.7625C29.184 30.7625 35 26.12 35 20.386V19.8106C34.9998 14.4061 28.2845 10 20.0011 10ZM34.3237 18.7233C32.1624 19.2016 30.0524 19.8875 28.023 20.7715C26.5999 19.5299 23.3119 16.6707 22.4214 16.0026C22.0762 15.7122 21.6834 15.4836 21.2604 15.3269C21.076 15.2688 20.884 15.2388 20.6906 15.2379C20.4446 15.2412 20.2004 15.2823 19.9669 15.3599C19.3415 15.6195 18.7653 15.9844 18.2631 16.4386L18.2345 16.4612C17.7178 16.872 17.1838 17.297 16.7797 17.3869C16.6029 17.4268 16.4222 17.447 16.241 17.4472C16.0592 17.4624 15.8761 17.4414 15.7025 17.3855C15.5288 17.3297 15.3678 17.24 15.229 17.1216C15.2038 17.0894 15.2204 17.0374 15.279 16.9628L15.2865 16.9526L16.5387 15.6038C17.5191 14.6233 18.4453 13.6976 20.5766 13.6486C20.6121 13.6476 20.6479 13.647 20.683 13.647C21.651 13.6864 22.6024 13.9118 23.4854 14.3107C24.6716 14.9037 25.978 15.217 27.3042 15.2265C28.755 15.2015 30.1827 14.8601 31.4878 14.2261C33.0085 15.505 34.0171 17.0452 34.3237 18.7233ZM20.0037 10.5793C24.4006 10.5793 28.3353 11.8396 30.9805 13.8246C29.8263 14.3518 28.5759 14.6352 27.3072 14.6572C26.0661 14.6471 24.8437 14.3529 23.7339 13.7972C22.7744 13.3592 21.738 13.1144 20.6839 13.0766C20.6438 13.0766 20.6033 13.0772 20.5636 13.0781C19.294 13.0595 18.0599 13.4976 17.0861 14.3126C16.4966 14.3435 15.9134 14.45 15.351 14.6294C14.9556 14.7613 14.5445 14.84 14.1284 14.8636C13.9716 14.8636 13.6896 14.8493 13.6642 14.8482C12.1683 14.5848 10.701 14.1788 9.28249 13.6356C11.9224 11.7596 15.747 10.5793 20.0037 10.5793ZM8.76348 14.0272C10.5929 14.7755 12.8124 15.3533 13.5143 15.3987C13.71 15.4116 13.9186 15.4338 14.1273 15.4342C14.5968 15.4114 15.0609 15.3252 15.5072 15.1778C15.7729 15.1033 16.0659 15.0221 16.3743 14.9632C16.2918 15.0438 16.2097 15.1257 16.1272 15.2084L14.8556 16.584C14.7589 16.6697 14.6905 16.7828 14.6594 16.9082C14.6283 17.0336 14.636 17.1656 14.6815 17.2865C14.7553 17.4395 14.8712 17.5682 15.0158 17.6575C15.4271 17.89 15.8932 18.0082 16.3656 18C16.5466 18.0012 16.7272 17.9823 16.904 17.9436C17.4373 17.8242 17.9966 17.3785 18.5888 16.9076C19.0794 16.484 19.6397 16.1487 20.2449 15.9167C20.3956 15.8766 20.5506 15.8554 20.7065 15.8534C20.7465 15.853 20.7864 15.8554 20.826 15.8605C21.2917 15.937 21.7261 16.1442 22.0785 16.4581C23.1226 17.2427 27.7418 21.2837 27.7873 21.3236C27.879 21.4106 27.9512 21.5161 27.999 21.6332C28.0468 21.7502 28.0692 21.8761 28.0646 22.0024C28.0562 22.1236 28.0181 22.2408 27.9537 22.3437C27.8893 22.4466 27.8005 22.5321 27.6952 22.5926C27.5157 22.7126 27.3052 22.7782 27.0893 22.7815C26.8997 22.7817 26.7139 22.7279 26.5538 22.6264C26.5369 22.6125 24.9543 21.1611 24.3714 20.6734C24.2985 20.5963 24.2026 20.545 24.098 20.5273C24.0748 20.5269 24.0518 20.5318 24.0308 20.5417C24.0098 20.5516 23.9913 20.5662 23.9769 20.5843C23.8852 20.6972 23.9879 20.8538 24.1089 20.9563L25.9576 22.8156C26.0955 22.9499 26.1854 23.1259 26.2134 23.3163C26.2182 23.4721 26.1797 23.6262 26.1022 23.7615C26.0247 23.8968 25.9113 24.008 25.7745 24.0827C25.5822 24.2181 25.3541 24.2936 25.119 24.2994C24.9312 24.2994 24.7477 24.2437 24.5916 24.1392L24.3265 23.8781C23.8416 23.4012 23.3411 22.9079 22.9748 22.6023C22.9008 22.5261 22.8041 22.4759 22.6992 22.4592C22.6774 22.4589 22.6557 22.4631 22.6357 22.4717C22.6156 22.4803 22.5976 22.493 22.5828 22.509C22.541 22.5555 22.5118 22.6388 22.6165 22.7772C22.6447 22.8144 22.6759 22.8492 22.7098 22.8813L24.0585 24.3966C24.1364 24.4849 24.1819 24.597 24.1875 24.7146C24.1931 24.8322 24.1584 24.9481 24.0892 25.0433L24.0414 25.1036C24.0019 25.1464 23.9599 25.1869 23.9157 25.2247C23.7248 25.3649 23.4931 25.4383 23.2564 25.4337C23.1953 25.4339 23.1343 25.4288 23.0741 25.4183C22.9757 25.4105 22.8825 25.3712 22.8082 25.3062L22.7913 25.2892C22.718 25.2129 22.038 24.5187 21.4755 24.049C21.4057 23.9748 21.3135 23.9255 21.213 23.9087C21.1899 23.9085 21.1671 23.9132 21.1461 23.9226C21.1251 23.9319 21.1063 23.9457 21.091 23.9629C20.98 24.0849 21.1471 24.267 21.218 24.3339L22.368 25.6031C22.3582 25.6312 22.3437 25.6574 22.325 25.6805C22.2837 25.7375 22.1443 25.8772 21.7269 25.9295C21.6763 25.936 21.6253 25.9391 21.5742 25.9388C21.1783 25.9134 20.7932 25.7992 20.4475 25.6046C20.5707 25.3431 20.6258 25.0547 20.6078 24.7661C20.5898 24.4776 20.4992 24.1983 20.3445 23.9542C20.1897 23.71 19.9757 23.5089 19.7225 23.3695C19.4692 23.2301 19.1848 23.1569 18.8958 23.1568C18.8756 23.1568 18.854 23.1574 18.8338 23.1581C18.883 22.8313 18.8247 22.4975 18.6677 22.2068C18.5107 21.916 18.2634 21.6843 17.9631 21.5463C17.7373 21.445 17.493 21.3912 17.2455 21.3882C17.0657 21.3873 16.8873 21.4197 16.7193 21.4836C16.5444 21.144 16.2423 20.8875 15.8789 20.77C15.681 20.6999 15.4728 20.6632 15.2628 20.6616C14.9185 20.6596 14.5825 20.7673 14.3033 20.969C14.1765 20.8096 14.0174 20.6788 13.8364 20.5852C13.6555 20.4916 13.4568 20.4373 13.2534 20.4258C13.05 20.4144 12.8465 20.446 12.6562 20.5187C12.4658 20.5914 12.293 20.7035 12.1491 20.8476C11.7908 20.5738 10.37 19.6713 6.56686 18.8078C6.3852 18.7667 5.97285 18.6486 5.71314 18.5724C6.06991 16.8653 7.15461 15.3063 8.76348 14.0272ZM15.8179 23.927L15.7767 23.8902H15.7352C15.6925 23.8934 15.6518 23.9098 15.6189 23.9372C15.4555 24.063 15.2565 24.1338 15.0504 24.1395C14.9418 24.1387 14.8343 24.1178 14.7332 24.0779C14.4541 23.9738 14.2223 23.7718 14.0809 23.5096C13.9395 23.2474 13.898 22.9428 13.9642 22.6523C13.9688 22.6312 13.9676 22.6093 13.9608 22.5888C13.954 22.5682 13.9419 22.5499 13.9257 22.5356L13.8635 22.4848L13.8053 22.5403C13.6358 22.7048 13.4088 22.7968 13.1726 22.7967C12.9964 22.7974 12.8238 22.7472 12.6754 22.6522C12.527 22.5572 12.4092 22.4214 12.3361 22.261C12.263 22.1007 12.2378 21.9227 12.2634 21.7483C12.2891 21.574 12.3645 21.4108 12.4806 21.2783C12.5968 21.1458 12.7487 21.0496 12.9182 21.0013C13.0876 20.9531 13.2674 20.9547 13.436 21.0062C13.6045 21.0576 13.7546 21.1566 13.8682 21.2912C13.9819 21.4259 14.0543 21.5905 14.0766 21.7653L14.1082 22.0111L14.2432 21.803C14.3954 21.5669 14.6214 21.3878 14.886 21.2936C15.1507 21.1994 15.4391 21.1955 15.7062 21.2824C15.8907 21.3404 16.0524 21.4546 16.1686 21.6092C16.2848 21.7638 16.3496 21.9509 16.3539 22.1442C16.3638 22.2634 16.4487 22.2693 16.4651 22.2693C16.4857 22.2678 16.5057 22.2622 16.5239 22.2526C16.5422 22.2431 16.5582 22.2299 16.5711 22.2138C16.6581 22.123 16.7627 22.0509 16.8786 22.002C16.9945 21.9531 17.1191 21.9284 17.2448 21.9293C17.4191 21.9332 17.5908 21.9719 17.7498 22.0434C18.6115 22.413 18.2208 23.5082 18.2162 23.5194C18.1418 23.7008 18.1389 23.781 18.2085 23.8273L18.2425 23.8433H18.2678C18.3253 23.8368 18.3815 23.8221 18.4347 23.7996C18.5816 23.7416 18.7367 23.7073 18.8943 23.6981C19.0487 23.6981 19.202 23.7286 19.3446 23.7877C19.4872 23.8468 19.6168 23.9334 19.7259 24.0426C19.835 24.1518 19.9216 24.2814 19.9806 24.4241C20.0397 24.5667 20.07 24.7196 20.07 24.874C20.07 25.0283 20.0395 25.1812 19.9804 25.3238C19.9213 25.4664 19.8347 25.596 19.7255 25.7051C19.6163 25.8142 19.4867 25.9008 19.344 25.9598C19.2014 26.0189 19.0485 26.0492 18.8941 26.0492C18.5913 26.051 18.2996 25.935 18.0808 25.7257C17.8619 25.5165 17.733 25.2303 17.7213 24.9277C17.7196 24.8739 17.714 24.7308 17.5926 24.7308C17.5374 24.7372 17.4866 24.764 17.4502 24.8059C17.3001 24.9656 17.0928 25.0592 16.8738 25.0661C16.7431 25.0634 16.6141 25.0355 16.494 24.9837C15.8246 24.712 15.8154 24.2523 15.8424 24.0675C15.849 24.0437 15.8502 24.0188 15.846 23.9945C15.8417 23.9702 15.8321 23.9471 15.8179 23.927ZM20.0035 29.0321C12.0382 29.0322 5.58114 24.9012 5.58114 19.8057C5.58237 19.6021 5.59397 19.3986 5.61589 19.1961C5.67949 19.2112 6.31208 19.3625 6.44309 19.392C10.3281 20.255 11.6118 21.1522 11.8287 21.3219C11.7365 21.5431 11.7003 21.7836 11.7234 22.0222C11.7464 22.2607 11.828 22.4899 11.9609 22.6893C12.0938 22.8887 12.2739 23.0523 12.4852 23.1654C12.6965 23.2785 12.9325 23.3376 13.1721 23.3376C13.2617 23.3378 13.3511 23.3295 13.4391 23.313C13.4965 23.6015 13.6279 23.8701 13.8204 24.0925C14.0129 24.3149 14.2599 24.4834 14.5372 24.5815C14.7025 24.6464 14.8783 24.6803 15.0558 24.6815C15.1676 24.6822 15.279 24.6685 15.3872 24.6406C15.5206 24.9214 15.729 25.1599 15.9893 25.3299C16.2496 25.4998 16.5518 25.5945 16.8626 25.6037C17.0142 25.6037 17.1646 25.5768 17.3069 25.5243C17.4146 25.788 17.5864 26.0206 17.8066 26.2011C18.0268 26.3817 18.2886 26.5045 18.5682 26.5585C18.8478 26.6124 19.1365 26.5958 19.4081 26.5102C19.6797 26.4245 19.9257 26.2725 20.1238 26.0679C20.5669 26.3261 21.0651 26.4749 21.5772 26.5019C21.6508 26.5017 21.7242 26.4971 21.7972 26.488C21.9862 26.4823 22.1719 26.4363 22.3418 26.3531C22.5117 26.27 22.6619 26.1516 22.7825 26.0059C22.8053 25.9745 22.8256 25.9415 22.8434 25.9071C22.9943 25.9531 23.151 25.9776 23.3088 25.9799C23.65 25.9731 23.9796 25.8552 24.2478 25.6442C24.5309 25.4583 24.7299 25.1688 24.8019 24.8379C24.8025 24.8343 24.803 24.8306 24.8032 24.8269C24.9067 24.8479 25.012 24.8585 25.1176 24.8585C25.4624 24.8543 25.7981 24.7478 26.0823 24.5526C26.2985 24.4272 26.4769 24.2459 26.5987 24.0277C26.7205 23.8095 26.7813 23.5625 26.7745 23.3127C26.8793 23.3345 26.9861 23.3456 27.0931 23.3458C27.4148 23.3423 27.7286 23.2457 27.9966 23.0676C28.1747 22.9588 28.3245 22.8095 28.4338 22.6317C28.5431 22.454 28.6088 22.2529 28.6256 22.0449C28.6469 21.7554 28.5771 21.4666 28.426 21.2188C30.3638 20.4278 32.3647 19.8012 34.4076 19.3455C34.4193 19.4981 34.4258 19.6516 34.4258 19.806C34.4258 24.9012 27.9688 29.0321 20.0035 29.0321Z" fill="#0A0080"/>
                        </g>
                        <defs><clipPath id="clip0_1262_80327"><rect width="40" height="40" rx="20" fill="white"/></clipPath></defs>                        
                    </svg>
                    <p>{{mercadopago_text}}</p>
                    <div class="bpa-front-si-card--checkmark-icon" v-if="appointment_step_form_data.selected_payment_method == 'mercadopago'">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM9.29 16.29 5.7 12.7c-.39-.39-.39-1.02 0-1.41.39-.39 1.02-.39 1.41 0L10 14.17l6.88-6.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-7.59 7.59c-.38.39-1.02.39-1.41 0z"/></svg>
                    </div>
                </div>
            <?php
        }
    }
    
    public function enqueue_styles(){
        if( !defined('BPHC_PLUGIN_URL') ) return;
                 #echo BPHC_PLUGIN_URL . 'src/js/booking-expansion-js-filter.js';
        
        if( file_exists(BPHC_PLUGIN_DIR . 'src/css/admin_panel.css') ){
            wp_enqueue_style(
                'booking_expansion_admin_panel',
                BPHC_PLUGIN_URL . 'src/css/admin_panel.css',
                [],
                '1.01.001',
                'all'
            );
            
        }
        
        if( file_exists(BPHC_PLUGIN_DIR . 'src/css/footer.css') ){
            wp_enqueue_style(
                'booking_expansion_expansion_footer',
                BPHC_PLUGIN_URL . 'src/css/footer.css',
                [],
                '1.01.'.time(),
                'all'
            );
            
        }
        
        if( ! isset($_GET['testeo']) ) return;
        $bookingpress_customer_email = 'wiyaliw794@okcdeals.com';
        $bookingpress_user_pass= 'asdasd';
        $bookingpress_user_name='999999999801';
        $bookingpress_is_wp_user_exist = get_user_by('email', $bookingpress_customer_email);
        
        $bookingpress_wpuser_id = wp_create_user($bookingpress_user_name, $bookingpress_user_pass, $bookingpress_customer_email);
        var_dump( $bookingpress_is_wp_user_exist, $bookingpress_wpuser_id ); exit;
    }
    
    function register_Expansion_user_roles_submenu() {
        add_submenu_page(
            'users.php',                  // Parent slug (Users menu)
            'Capacidades de Admins',        // Page title
            'Capacidades de Admins',        // Menu title
            'manage_options',             // Capability required to access
            'expansion-user-caps',     // Menu slug
            [$this, 'booking_Expansion_roles_page'] // Callback function
        );
    }
    public function booking_Expansion_roles_page(){
        @ini_set('display_erros', 1);
        #remove_role('expansion-sobre-turnos');remove_role('expansion-admin-turnos');remove_role('expansion-admin-turnos-limitado');
        add_role('expansion-notify-study','Notificaciones de estudios', ['expansion_noty_study' => 1 ]);
        add_role('expansion-admin-roles','Asignar Roles Admin', ['editar_admin_roles' => 1 ]);
        add_role('expansion-sobre-turnos','Asignar SobreTurnos', ['expansion_sobre_turnos' => 1 ]);
        add_role('expansion-admin-turnos','Admin Turnos', [ 'expansion_admin_turnos' => 1, 'expansion_ver_staff_member' => 1, 'expansion_ver_services' => 1, 'expansion_ver_historias' => 1, 'read' => 1, 'level_0' => 1 ]);
        add_role('expansion-admin-turnos-limitado','Admin Turnos Limitado', [ 'expansion_admin_turnos_limitado' => 1, 'expansion_ver_staff_member' => 0, 'expansion_ver_services' => 0, 'expansion_ver_historias' => 0, 'read' => 1, 'level_0' => 1 ]);
        
        wp_register_script('bookingpress_vue_js', BOOKINGPRESS_URL . '/js/bookingpress_vue.min.js', array(), BOOKINGPRESS_VERSION, true);
        wp_register_script('bookingpress_element_js', BOOKINGPRESS_URL . '/js/bookingpress_element.js', array(), BOOKINGPRESS_VERSION, true);
        wp_enqueue_script('bookingpress_vue_js');
        wp_enqueue_script('bookingpress_element_js');
        /*
        wp_register_script('bookingpress_elements_locale', BOOKINGPRESS_URL . '/js/bookingpress_element_en.js', array(), BOOKINGPRESS_VERSION, true);
        wp_enqueue_script('bookingpress_elements_locale');
        */
        wp_register_style('bookingpress_element_css', BOOKINGPRESS_URL . '/css/bookingpress_element_theme.css', array(), BOOKINGPRESS_VERSION);
        wp_enqueue_style('bookingpress_element_css');
        
        $admins = [];
        $args = array(
            'role' => 'Administrator',
            'orderby' => 'user_nicename',
            'order' => 'ASC'
        );
        
        /* DEPRECATED
        $admins = get_users( $args );
        $this->print_admin_roles( $admins );
        $admins = array_map( function( $user ){
            return (object) [ 'ID' => $user->ID, 'roles' => array_values( (array) $user->roles ), 'display_name' => $user->display_name, 'user_email' => $user->user_email ];
        }, $admins);
        
        $roles_list = array_keys( wp_roles()->roles );
        
        $expansion_roles_vars = array(
            'roles_list' => $roles_list,
            'admins'    => $admins
        );
        */
        $expansion_roles_vars = $this->get_booking_Expansion_roles_vars( );
        #print_r( wp_roles() );
        ?>
        <style>
body.auto-fold #wpcontent .booking-expansion-user-roles {
    /* width: calc(100% - 20px); */
    margin-right: 20px;
}
body:not(.auto-fold) #wpcontent .booking-expansion-user-roles {
    margin: 20px;
}
.booking-expansion-user-roles {
    /*padding-top: 2px;*/
}

.el-notification.right {
    margin-top: 50px;
}

.card.expansion-card {
    max-width: 100%;
    /* width: 100%; */
}

.expansion-card .user-list-item {
    display: flex;
    justify-content: space-between;
}
.expansion-card .user-list-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    border: 1px solid transparent;
    border: 1px solid lightgray;
    padding: 10px;
    align-items: flex-start;
    min-height: 160px;
    /* overflow: scroll; */
}
.expansion-card .user-list-item:hover {
    background-color: #fbfbf9;
    border: 1px solid lightgray;
    /* border-bottom: 1px solid transparent; */
}

.expansion-card .user-list-item label {
    font-weight: 500;
}
.expansion-card-header, .expansion-card-footer {
    display: flex;
    justify-content: space-between;
}
.expansion-card-body {
    transition: all 0.3s;
    transition-property: max-height, opacity;
    padding: 10px;
    max-height: 70vh;/*100%;*/
    min-height: 20vh;
    overflow-y: scroll;
}
.expansion-card .btn-group {
    padding: 10px;
}


.expansion-card .roles-container {
    min-width: 320px;
    height: 100%;
    /*overflow-y: scroll;*/
    /*overflow-x: clip;*/
}
.el-select {
    min-width: 300px;
}
.el-select .el-tag {
    min-width: 100%;
    justify-content: space-between;
}
.el-select .el-tag {
    background-color: lightskyblue;
    color: white;
    background-color: white;
    color: dodgerblue;
    font-weight: 500;
}
.el-select .el-tag.el-tag--info {
    color: dodgerblue;
}



#bpa-page-loading-loader {
    display: none;
    justify-content: center;
    align-items: center;
    align-items: flex-start;
    width: 100%;
    height: 100%;
    min-height: 30px;
    position: absolute;
    position: stiky;
    left: 0;
    opacity: 0;
    transition: opacity 0.2s;
}
.bpa-back-loader {
    border: 4px solid dodgerblue;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border-width: 6px 0 0 0;
    /*transform: rotate(10deg);*/
    transition: all 0.2s;
    margin-top: min( 100px, 50%);
}

.first-load #bpa-page-loading-loader .bpa-back-loader,
#bpa-page-loading-loader.is_loading .bpa-back-loader {
    animation: spin-load 0.5s linear infinite;
}

.first-load #bpa-page-loading-loader,
#bpa-page-loading-loader.is_loading {
    display: flex;
    opacity: 1;
}

.first-load .expansion-card-body {
    max-height: 40vh;
    opacity: 0;
}

#bpa-page-loading-loader.is_loading+.expansion-card-body {
    max-height: 40vh;
    opacity: 0;
}
@keyframes spin-load {
  0% {
    transform: rotate(0deg); /* Start at 0 degrees rotation */
  }
  100% {
    transform: rotate(360deg); /* Rotate to 360 degrees */
  }
}

.api-user-field {
    display: flex;
    align-items: center;
    font-size: 16px;
}
.api-user-field>span {
    display: block;
    text-align: left;
    width: 150px;
}
.appoint-api-user {
    display: flex;flex-direction: column;gap: 10px;padding:10px;border-radius:3px;border: 1px solid lightgray;
    margin-bottom: 10px;
}
        </style>
        <script>
        var Expansion_roles_vars = JSON.parse('<?php echo addslashes( json_encode($expansion_roles_vars) ); ?>');
        </script>
        <div class="booking-expansion-user-roles first-load">
            
            <div id="root_expansion_roles_app" class="card expansion-card">
                <div class="expansion-card-header">
                    <h2>Control de Usuarios </h2>
                    <div class="btn-group">
                        <button class="button-primary" @click="booking_expansion_save_roles">Guardar</button>
                    </div>
                </div>
                
               	<div class="bpa-back-loader-container " :class="is_loading?'is_loading':''" id="bpa-page-loading-loader">
            		<div class="bpa-back-loader"></div>
            	</div>
                <div class="expansion-card-body" >
                    <div style="margin-bottom: 10px;">
                        <span>Usuario y token API notificación estudios</span>
                        <br>
                        <div></div>
                        <br>
                        
                        <div v-if="RolesVars.noty_study.length" >
                            <div v-for="user_study in RolesVars.noty_study" class="appoint-api-user" style="">
                            
                            <div class="api-user-field"><span>Usuario:</span><el-input :value="user_study.username" /></div>
                            <div class="api-user-field"><span>Token:</span><el-input :value="user_study.token" /></div>
                            <div class="api-user-field"><span>Secrect key:</span><el-input :value="user_study.secret" /></div>
                            <!--<div class="api-user-field"><span></span><input :value="JSON.stringify(user_study)" style="display: none;"/></div>-->
                            
                            <button class="button-link"  @click="booking_expansion_save_roles( {'create_api_noty_user':1,'usname': user_study.username} )" style="justify-self: end;align-self: end;">Actualizar claves</button>
                            <button class="button-link"  @click="booking_expansion_save_roles( {'delete_api_noty_user':1,'usname': user_study.username} )" style="justify-self: end;align-self: end; color: crimson;">Borrar</button>
                            </div>
                        </div>
                        <div v-else style="display: flex;flex-direction: row;gap: 10px;">
                            <div style="width: 100%;"> El token se genera automaticamente</div>
                            <input placeholder="nombre de usuario" v-model="new_api_user" /> <button @click="booking_expansion_save_roles( {'create_api_noty_user':1,'usname': new_api_user} )">Crear</button>
                        </div>
                    </div>
                    <ul v-if="RolesVars.admins.length">
                        <li v-for="user in RolesVars.admins" :key="user.ID" >
                            <div class="user-list-item">
                                <label> <span>{{user.display_name}}</span> <span>{{user.user_email}}</span> </label>
                                
                                <div class="roles-container">
                                    <el-select v-model="user.roles" multiple="true" @change="booking_expansion_userRole_change( user )">
                                        <el-option v-for="rol in RolesVars.roles_list" :value="rol" :label="RolesVars.role_names[rol] || rol">{{RolesVars.role_names[rol]}} | {{rol}}</el-option>
                                    </el-select>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul v-else>
                        <li><div style="text-align: center;display: flex;min-height: 230px;justify-content: center;align-items: center;"><h4>Sin resultados</h4></div></li>
                    </ul>
                </div>
                <div class="expansion-card-footer">
                    <h2></h2>
                    <div class="btn-group">
                        <button class="button-primary" @click="booking_expansion_save_roles">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
        var app, ExpansionRolesApp;
        window.addEventListener('DOMContentLoaded', function() {
            app = ExpansionRolesApp = new Vue({
                el: '#root_expansion_roles_app',
                data(){
                    return {
                        is_loading: 0,
                        new_api_user: '',
                        RolesVars: Expansion_roles_vars,
                        changed_users: [],
                        manage_roles: [ 'expansion-sobre-turnos', 'expansion-admin-turnos', 'expansion-admin-turnos-limitado' ],//remove_role('expansion-sobre-turnos');remove_role('expansion-admin-turnos');remove_role('expansion-admin-turnos-limitado');
                    }
                },
                methods: {
                    async booking_expansion_save_roles( extradata = [] ){
                        const vm = this;
                        vm.is_loading = 1;
                        return new Promise( (resolve) => {
                            //TEST RETRASO DE EJECUCION setTimeout( () =>{
                            //console.log( 'changed users', vm.changed_users );
                            //console.log( 'all admins', vm.RolesVars.admins );
                            vm.is_loading = 1;
                            try{
                                const params = new URLSearchParams();
                                params.append('action', 'booking_expansion_update_roles');
                                params.append('_ajax_nonce', '<?php echo wp_create_nonce( 'booking_expansion_update_roles' )?>');
                                
                                params.append('manage_roles', JSON.stringify(vm.manage_roles));
                                params.append('changed_user_roles', JSON.stringify(vm.changed_users)); // Enviamos el objeto como string JSON
                                Object.entries(extradata).forEach( ([index, extra]) => params.append(index, extra));
                                fetch( ajaxurl, {
                                    method: 'POST',
                                    body: params
                                })
                                .then(response => response.json())
                                .then(result => {
                                     //console.log( result )
                                    if( result.variant == 'success'){
                                        vm.changed_users = [];
                                        //vm.is_loading = 0;
                                        if( result.update_roles_vars ){
                                            //console.log( result.update_roles_vars )
                                            vm.RolesVars = result.update_roles_vars
                                        }
                                        
                                        if( vm.$notify ){
                                            vm.$notify({
                                                title: result.title,
                                                message: result.msg,//"Historia Guardada con exito",
                                                type: result.type,
                                                customClass: "success",
                                                duration:1500
                                            });
                                        }else{
                                            alert( result.msg );
                                        }
                                        
                                        vm.is_loading = 0;
                                        vm.$forceUpdate();
                                        this.is_loading = 0;
                                        resolve(true);
                                        
                                    }else{
                                        
                                    }
                                })
                            }catch (error) {
                                console.error("Error al guardar", error);
                            }
                            vm.is_loading = 0;
                            resolve(false); 
                            //}, 100);
                        });
                        vm.is_loading = 0;                        
                    },
                    booking_expansion_userRole_change( user = null ){
                        if( user != null ){
                            let chang_us_key = user.ID
                            //this.changed_users[user.ID] = user;
                            if( ! this.changed_users.find( us => us == user ) ){
                                this.changed_users.push( user );
                            }
                        }
                    },
                },
                mounted(){
                    if( document.querySelector('.booking-expansion-user-roles') ) document.querySelector('.booking-expansion-user-roles').scrollIntoView({ behavior: 'smooth', block: 'start' });
                    console.log("loadinngggg...");
                    setTimeout( () => {
                        if( document.querySelector('.first-load') ) document.querySelector('.first-load').classList.remove('first-load');
                        if( document.querySelector('.is_loading') ) document.querySelector('.is_loading').classList.remove('is_loading');
                    }, 500);
                        
                }
            });
            
            
        });
        //setTimeout( () => {
            //if( document.querySelector('#bpa-page-loading-loader') ){
                //console.log('encontrado');
                //document.querySelector('#bpa-page-loading-loader').classList.add('is_loading');
            //}
        //},10);
        </script>
        <style>
        /*
#bpa-page-loading-loader.is_loading .bpa-back-loader {
    transform: rotate(10deg);
    transform: rotate(4801deg);
}*/
        </style>
        <?php
    }
    public function booking_Expansion_admin_index_redirect(){
        if( current_user_can( 'administrator' ) ) return;
        if( !( current_user_can( 'expansion-admin-turnos' ) || current_user_can( 'expansion-admin-turnos-limitado' ) ) ) return;
        
        if( !( defined( 'DOING_AJAX' ) && DOING_AJAX ) && ( strpos($_SERVER['REQUEST_URI'], 'wp-admin/index.php') || preg_match("/wp-admin\/$/",$_SERVER['REQUEST_URI']) ) ){
            wp_redirect( esc_url( admin_url() . 'admin.php?page=bookingpress') );
        }
    }
    public function booking_Expansion_login_redirect( $redirect_to = '', $requested_redirect_to = '', $user = [] ){
        
        if( !empty( array_intersect( ['Administrator', 'expansion-admin-turnos', 'expansion-admin-turnos-limitado'] ,(array) $user->roles )) ){
            
            if( !strstr( $redirect_to, 'staffmember_view' ) ) $redirect_to =  esc_url( admin_url() . 'admin.php?page=bookingpress');
        }
        return $redirect_to;
    }
    public function get_booking_Expansion_roles_vars( ){
        $admins = [];
        $args = array(
            'role__in' => ['Administrator', 'expansion-admin-turnos', 'expansion-admin-turnos-limitado'/*'bookingpress-staffmember'*/],
            //'role'  => 'Administrator',
            'orderby' => 'user_nicename',
            'order' => 'ASC'
        );
        if( isset($_GET['ver_personal']) ) $args['role'] = 'bookingpress-staffmember';
        
        $admins = get_users( $args );
        #$this->print_admin_roles( $admins );
        $admins = array_map( function( $user ){
            return (object) [ 'ID' => $user->ID, 'roles' => array_values( (array) $user->roles ), 'display_name' => $user->display_name, 'user_email' => $user->user_email ];
        }, $admins);
        
        $roles_list = array_keys( (array) wp_roles()->roles );
        $role_names = (array) wp_roles()->role_names;
        
        $users_noty_study = (array) get_users( ['role'=>'expansion-notify-study'] );
        //bin2hex( random_bytes( 32 ) )
        //update_user_meta( $user_id, 'api_appointments_access_token', $token );
        $users_noty_study = array_map( function( $user ){
            return (object) [ 'ID' => $user->ID, 'username' => $user->user_login, 'roles' => array_values( (array) $user->roles ), 'token' => 'TK_' . get_user_meta( $user->ID, 'expansion_appoint_api_token', true), 'secret' => 'SK_' . get_user_meta( $user->ID, 'expansion_appoint_api_secret', true), 'display_name' => $user->display_name, 'user_email' => $user->user_email ];
        }, $users_noty_study);
        
        $expansion_roles_vars = array(
            'roles_list' => $roles_list,
            'role_names' => $role_names,
            'admins'    => $admins,
            'noty_study' => $users_noty_study,
        );
        return $expansion_roles_vars;
    }
    
    public function ajax_booking_Expansion_update_roles( ){
        #@ini_set('display_erros', 1);
        $return_data = array(
        'variant' => 'error',
        'type'  => 'error',
        'title' => 'Fallo',
        'msg'   => 'No tienes permisos para realizar esta accion.'
        );
        $posdata = $_POST;
        #print_r( $posdata );
        if( empty($posdata['action']) ) return;
        
        $action = sanitize_text_field( $posdata['action'] );
        $nonce  = !empty( $posdata['_ajax_nonce'] )? sanitize_text_field( $posdata['_ajax_nonce'] ) : '';
        
        //$return_data['msg'] = 'No tienes permisos para realizar esta accion.';
        if( !$this->verify_permision( $nonce, $action ) ) 
        {
            wp_send_json($return_data); exit; 
        }
        //if( ! $this->verify_permision( $nonce, $action ) ){ wp_send_json($return_data); exit; }
        
        $changed_user_roles = $posdata['changed_user_roles'] ?? '';
        #$temp_changed_user_roles = json_decode( $changed_user_roles, true );
        #$temp_changed_user_roles = is_null($temp_changed_user_roles)? json_decode( stripcslashes( $changed_user_roles ), true ) : $temp_changed_user_roles;
        #$changed_user_roles = is_array($temp_changed_user_roles)? $temp_changed_user_roles : [];
        $changed_user_roles = $this->json_decode_helper( $changed_user_roles, [] );
        
        $manage_roles = $posdata['manage_roles'] ?? '';
        $manage_roles = $this->json_decode_helper( $manage_roles, [] );
        
        $updated_users = $this->booking_Expansion_update_roles( $changed_user_roles, $manage_roles );
        
        $return_data['variant'] = $return_data['type'] = 'success';
        $return_data['title'] = !empty( $updated_users )? 'Guardado' : 'Recibido';
        $return_data['msg'] = !empty( $updated_users )? 'Roles actualizados' : 'Sin cambios';
        $return_data['updated_users'] = $updated_users;
        
        if( !empty( $updated_users ) ){}
        
        $new_username = $username = !empty($posdata['usname'])? sanitize_text_field($posdata['usname']) : '';//api_noty_estudios_user
        
        
        if( !empty($posdata['create_api_noty_user'] ) ){
            //$new_username = !empty($posdata['usname'])? sanitize_text_field($posdata['usname']) : '';//api_noty_estudios_user
            if( !empty($new_username) ){
                //$this->create_user_with_token( $new_username, $email='', $role = 'expansion-notify-study', $temporal = 0 );
                $created_userdata = $this->create_user_with_token( $new_username );
                $username = $created_userdata['username'];
                //$sk = $this->encrypt_secret_key( $new_username );
                
                //$dec_sk = $this->decrypt_secret_key( $sk );
                
                //$return_data['msg'] = "creando usuario api: " . $new_username . " " . " tk_".bin2hex( random_bytes( 32 ) ) . " " . " sk_" . base64_decode($sk) . " dec: *** " . $dec_sk . " *** " . hash( 'sha256', AUTH_SALT );
                
                //$tk = $created_userdata['token'];
                //$sk = $created_userdata['secret'];
                //$dec_sk = $this->decrypt_secret_key( $sk );
                
                $return_data['title'] = "Usuario  \"$username\".";
                $return_data['msg'] = "Nuevo Usuario api creado.";
                
                if( !$created_userdata['is_new'] ){
                    $return_data['msg'] = "Credenciales de Usuario actualizadas.";
                }
                
                //$return_data['msg'] = "creando usuario api: " . $new_username . " " . " tk_" . $tk . " " . " sk_" . $sk . " dec: *** " . $dec_sk . " *** " ;
                
            }else{
                $return_data['title'] = 'No se pudo crear usuario.';
                $return_data['type'] = 'error';
                $return_data['msg'] = "creando usuario api: Nombre de usuario requerido.";
            }
        }
        
        if( !empty($posdata['delete_api_noty_user'] ) ){
            
            if( $this->delete_user_api($user_id = 0, $username ) ){
                 $return_data['msg'] = " usuario " . ($user_id?"#{$user_id}":$username) . " borrado.";
            }else{
                $return_data['title'] = 'No se pudo borrar usuario.';
                $return_data['type'] = 'error';
                $return_data['msg'] = "Fallo al intentar borrar. prueba desde el menu de usuarios wordpress.";
            }
        }
        $return_data['update_roles_vars'] = $this->get_booking_Expansion_roles_vars( );
        
                
        wp_send_json( $return_data );
        exit;
    }
    public function booking_Expansion_update_roles( $users = [], $manage_roles = [] ){
        
        if ( empty($users) ) return false;
        
        $default_manage_roles = [ 'administrator', 'bookingpress-staffmember', 'expansion-admin-roles', 'expansion-sobre-turnos', 'expansion-admin-turnos', 'expansion-admin-turnos-limitado' ];
        //$default_manage_roles = [ 'expansion-admin-roles', 'expansion-sobre-turnos' ];
                
        $to_manage_roles = array_merge( $default_manage_roles, $manage_roles);
        
        $updated_users = [];
        foreach ( $users as $entry_user ){
            $id = $entry_user['ID'] ?? 0;
            //$id ?? continue;
            $user = get_user( absint($id) );
            foreach( $to_manage_roles as $editable_rol ){
#print_r( in_array( $editable_rol, (array) $user->roles ) );
                if( in_array( $editable_rol, array_values( (array) $entry_user['roles'] )) ){
                    if( !in_array( $editable_rol, (array) $user->roles ) ) $updated_users[$id][] = 'add';
                    $user->add_role( $editable_rol );
                }else{
                    if( in_array( $editable_rol, (array) $user->roles ) ) $updated_users[$id][] = 'remove';
                    $user->remove_role( $editable_rol );
                }
            }
            
        }
        return $updated_users;
    }
    
    function encrypt_secret_key( $plain_text ) {
        if( !defined('AUTH_SALT') && extension_loaded('openssl') ) return base64_encode( $plain_text );
        
        $method = 'aes-256-cbc';
        $key = hash( 'sha256', AUTH_SALT ); // Normalizar llave a 32 bytes
        $iv_length = openssl_cipher_iv_length( $method );
        $iv = openssl_random_pseudo_bytes( $iv_length ); // IV aleatorio para cada cifrado
    
        $encrypted = openssl_encrypt( $plain_text, $method, $key, 0, $iv );
        
        // Guardamos el IV junto al dato cifrado (separado por ::) para poder descifrarlo
        return base64_encode( $encrypted . '::' . $iv );
    }
    
    function decrypt_secret_key( $encrypted_data ) {
        if( !defined('AUTH_SALT') && extension_loaded('openssl') ) return base64_decode( $encrypted_data );
        
        $method = 'aes-256-cbc';
        $key = hash( 'sha256', AUTH_SALT );
        
        $data = base64_decode( $encrypted_data );
        if ( str_contains( $data, '::' ) ) {
            list( $encrypted_text, $iv ) = explode( '::', $data, 2 );
            return openssl_decrypt( $encrypted_text, $method, $key, 0, $iv );
        }
        return false;
    }
    
    /**
     * Borrar un usuario por id o username
     * @param int $user_id
     * @param string $username
     */
    function delete_user_api($user_id = 0, $username = '' ){
        $user_id = absint($user_id)? absint($user_id) : username_exists( $username );
        if( $user_id ){
            return wp_delete_user( $user_id );
        }
        return false;
    }
    /**
     * Crea o actualiza un usuario y le asigna un secret y token de acceso único.
     *
     * @param string $username Nombre de usuario (DNI, ID externo, etc).
     * @param string $role     Rol que se le asignará.
     * @param string $email    Email por defecto vacio - se asigna email ficticio.
     * @return array|WP_Error  Datos del usuario y token o error.
     */
    function create_user_with_token( $username, $email= '', $role = 'expansion-notify-study', $temporal = 0 ) {
        $is_new = 0;
        // 1. Verificar si el usuario ya existe
        $user_id = username_exists( $username );
        
        if ( ! $user_id ) {
            // 2. Crear usuario con password aleatorio (email vacío permitido)
            $username .= '_API'. strtoupper(bin2hex( random_bytes( 3 ) ));
            $email = !empty($email)? sanitize_email($email) : "{$username}@no-mail.invalid";
            $password = wp_generate_password( 18, true );
            $user_id = wp_create_user( $username, $password, $email );
    
            if ( is_wp_error( $user_id ) ) {
                return $user_id;
            }
    
            // 3. Asignar el rol específico
            $user = new WP_User( $user_id );
            $user->set_role( $role );
            $is_new = 1;
        }
    
        // 4. Generar y asignar el Token (usamos bin2hex para un token seguro)
        // En 2026, se recomienda un token de al menos 32-64 caracteres
        $token = bin2hex( random_bytes( 32 ) );
        $secret_k = $this->encrypt_secret_key( $username );
        
        // Guardamos el token en los metadatos del usuario
        update_user_meta( $user_id, 'expansion_appoint_api_token', $token );
        update_user_meta( $user_id, 'expansion_appoint_api_secret', $secret_k );
        
        // Opcional: Guardar fecha de expiración si el token es temporal
        if($temporal)
        update_user_meta( $user_id, 'expansion_appoint_api_token_expiry', strtotime( '+30 days' ) );
    
        return array(
            'user_id' => $user_id,
            'token'   => $token,
            'secret' => $secret_k,
            'username' => $username,
            'is_new' => $is_new
        );
    }
    
    /**
     * DEPRECATED function Print admin roles
     */
    public function print_admin_roles( $admins = [] ){
        ob_start();
        if ( ! empty( $admins ) ) {
            #print_r(  wp_roles() );
            echo '<br>-----------<br>';
            print_r( $roles_list );
            echo '<br>-----------<br>';
            
            echo '<ul>';
                        
            foreach ( $admins as $user ) {
                if( $user->ID == 328 ){
                    $user = get_user( $user->ID );
                    $user->add_role('expansion-admin-turnos-limitado');
                    //$user->remove_role('expansion_sobre_turnos');
                    
                    if( user_can( $user->ID, 'expansion_ver_staff_member' ) ){
                        echo '<br><br><h2>EL USER TIENE PERMISO VER STAFF</h2><br><br>';
                    }else{
                        echo '<br><br><h2>EL USER noooooo TIENE PERMISO VER STAFF</h2><br><br>';
                    }
                }
                
                echo '<li>' . esc_html( $user->display_name ) . ' (' . esc_html( $user->user_email ) . ')';
                
                ?>
                <div>
                <?php print_r($user->roles) ?>
                </div>
                <?php
                
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo 'No administrators found.';
        }
        echo ob_get_clean();
    }
    
    public function die_output_not_access( ){
        echo '<style>.wp-die-message {margin: 50px auto;padding: 20px;text-align: center;background: white;width: 80%;}</style>';
        wp_die( __('Sorry, you are not allowed to access this page.') /*__( 'You do not have sufficient permissions to access this page.' )*/ );
                    
    }
    
    public function json_decode_helper( $arg = null, $default = false ){
        $temp_arg = json_decode( $arg, true );
        $arg = is_null($temp_arg)? json_decode( stripcslashes( $arg ), true ) : $temp_arg;
        if( $default ){
            $arg = ( gettype($arg) == gettype($default) )? $arg : $default;
        }
        return $arg;
    }
    
    /**
     * Remove default top level pages
     * remueve links del menu del nivel superior por defecto, se agregan custom links luego
     */
    public function remove_menu_pages( ) {
        global $BookingPress, $bookingpress_slugs;
        remove_menu_page( 'index.php' );
        remove_menu_page( 'profile.php' );
        remove_menu_page( $bookingpress_slugs->bookingpress /*'bookingpress'*/ );
        //$page_title = 'sinuso';
        //$menu_title = 'ninguno';
        
        //add_menu_page( $page_title, $menu_title, 'bookingpress', 'booking_expansion', '', $icon_url = ' ', 2 );
        #TURNOS
        #add_menu_page( $page_title, $menu_title, 'bookingpress_appointments', $bookingpress_slugs->bookingpress_appointments, array( $BookingPress, 'route' ), $icon_url = '', 1 );
    
    }
    
    /**
     * Custon adminmenu Links
     */
    public function adminmenu_panel( ) {
        global $BookingPressPro, $bookingpress_slugs, $BookingPress, $request_module, $bookingPress_Expansion;
        $expansion_menu_html = '';
        ob_start();
        $adminmenupanel_template_file = $bookingPress_Expansion->get_template_file('adminmenu_panel.php');
        if( file_exists($adminmenupanel_template_file) ){
            include_once $adminmenupanel_template_file;
        }
        $expansion_menu_html .= ob_get_clean();
        echo $expansion_menu_html;
        //if( current_user_can('editar_admin_roles') ) echo "<style>div#adminmenuback{background: initial;}</style>";
        
    }
    
    /**
     * cesar limitados
     *  Custom wp-login page:
     */
    function my_login_logo() {
        ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url('//clinicaume.com.ar/turnos/wp-content/uploads/2025/06/cropped-LOGO-UME_3A-scaled-1.png');
    			background-repeat: no-repeat;
            	padding-bottom: 0px;
            }
    
    		.login h1 a {
        		background-size: 100% !important;
        		color:#007098;
        		height: 235px !important;
        		width: 100% !important;
    		}
    
    		body.login {
    			background: #fff;
    			min-width: 0;
    			color: #1f1f1f;
    		}
    
    		body.login form {
    			background: transparent;
    			border: 1px solid #007098;
    			box-shadow: 0 1px 3px rgba(0,0,0,.04);
    		}
    
    		.login #backtoblog a, .login #nav a, .login h1 a, body.login a {
    			color: #1f1f1f !important;
    		}
    
    		.login #nav {
    			display:none !important;
    		}
    
    		.login .button-primary {
    			background: #007098 !important;
    			border-color: #fff !important;
    			color: #fff;
    			text-decoration: none;
    			text-shadow: none;
    		}
    
    		.login #login_error, .login .message, .login .success {background-color: transparent !important;}
    
    		.login .privacy-policy-page-link {display:none !important;}
        </style>
    <?php 
    }
    

}//BookingPress_Expansion_Plugin


global $bookingPress_Expansion;
$bookingPress_Expansion = new bookingPress_Expansion_Plugin();

/**
 * CONSULTA TEST DAYOFF REPEATS Y NO-REPEAT EN CONSULTA ESTIPULADO DESDE LA FECHA A 3 MESES ... NO ESTA TDO CONTEMPLADO,
 * PERO EN BOOKINGPRESS AL PARECER TAMPOCO Y/o REPETICION DE AÑOS NO RESPONDE COMO ESPERABAN o SIMPLEMENTE EVALUARON SIEMPRE 
 * CADA 1 AÑO. -- AQUI ESTARA SIEMPRE CADA AÑO DESDE LA FECHA INICIAL HASTA EL CALCULO CORRESPONDIENTE NUM DE REPETICIONES
 * 
 * ###Posible remplazo de CURRENT_DATE por variable fecha date() Por diferencias de zonahoraria de la BD
 * 
"SELECT *, CURRENT_DATE hoYdb FROM `wp_bookingpress_staffmembers_daysoff`
WHERE bookingpress_staffmember_id = 102 AND bookingpress_staffmember_daysoff_parent = 0 AND
(
  ( 
    bookingpress_staffmember_daysoff_repeat!=0 
    AND 
    ( 
      (
        bookingpress_staffmember_daysoff_repeat_duration = 'forever' AND (DATE_FORMAT(bookingpress_staffmember_daysoff_date, CONCAT(YEAR( CURRENT_DATE ), '-%m-%d')) >=  CURRENT_DATE AND DATE_FORMAT(bookingpress_staffmember_daysoff_date, CONCAT(YEAR( CURRENT_DATE  ), '-%m-%d')) < DATE_ADD( CURRENT_DATE, INTERVAL 3 MONTH) ) ) 
        or 
        (   bookingpress_staffmember_daysoff_repeat_duration = 'no_of_times' 
            AND
            (select (CASE
                WHEN bookingpress_staffmember_daysoff_repeat_frequency_type = 'year' THEN DATE_ADD(bookingpress_staffmember_daysoff_date, INTERVAL bookingpress_staffmember_daysoff_repeat_times YEAR) 
                WHEN bookingpress_staffmember_daysoff_repeat_frequency_type = 'month' THEN DATE_ADD(bookingpress_staffmember_daysoff_date, INTERVAL bookingpress_staffmember_daysoff_repeat_times MONTH) 
                WHEN bookingpress_staffmember_daysoff_repeat_frequency_type = 'day' THEN DATE_ADD(bookingpress_staffmember_daysoff_date, INTERVAL bookingpress_staffmember_daysoff_repeat_times DAY)
            END))  >= CURRENT_DATE 
            
      )
    )
  ) 
  OR
  (
     bookingpress_staffmember_daysoff_repeat=0 
     AND
     (
        ( bookingpress_staffmember_daysoff_date >= CURRENT_DATE  or  bookingpress_staffmember_daysoff_enddate > CURRENT_DATE  ) 
        AND bookingpress_staffmember_daysoff_date < DATE_ADD( CURRENT_DATE, INTERVAL 3 MONTH) 
     )
  ) 
);";


*/




/**
 * TEST CREATE TABLE CONSULTAS
 * 
 * 

CREATE TABLE wp_test1_bphc_consultas (
            `id` mediumint(9) NOT NULL AUTO_INCREMENT,
            `bookingpress_appointment_id` BIGINT NOT NULL,
            `bookingpress_customer_id` int(9) NOT NULL,
            `bookingpress_staff_member_id` int(9) NOT NULL,
            `staff_member_name` int(9) NOT NULL,
            `service_name` varchar(255) DEFAULT '' NOT NULL,
            `consultorio` varchar(255) DEFAULT '' NOT NULL,
            `date` DATE NOT NULL,
            `time` TIME NOT NULL,
            `general` longtext NOT NULL,
            `archivos` longtext,
            `tags` varchar(255) DEFAULT '' NOT NULL,
            `created_at` datetime DEFAULT NOW() NOT NULL,
            PRIMARY KEY  (id),
            KEY bookingpress_appointment_id (bookingpress_appointment_id),
            KEY bookingpress_customer_id (bookingpress_customer_id),
            KEY bookingpress_staff_member_id (bookingpress_staff_member_id),
    INDEX `appointment_id` (`bookingpress_appointment_id` ASC),
           CONSTRAINT `bphc_booking_id`
            FOREIGN KEY (`bookingpress_appointment_id`)
    REFERENCES `wp_bookingpress_appointment_bookings` (`bookingpress_appointment_booking_id`)
        ) 






//TEST 2-------------------------------------------------------------
//-----------------------------------------





CREATE TABLE wp_test2_bphc_consultas (
            `id` mediumint(9) NOT NULL AUTO_INCREMENT,
            `bookingpress_appointment_id` BIGINT NOT NULL,
            `bookingpress_customer_id` int(9) NOT NULL,
            `bookingpress_staff_member_id` int(9) NOT NULL,
            `staff_member_name` int(9) NOT NULL,
            `service_name` varchar(255) DEFAULT '' NOT NULL,
            `consultorio` varchar(255) DEFAULT '' NOT NULL,
            `date` DATE NOT NULL,
            `time` TIME NOT NULL,
            `general` longtext NOT NULL,
            `archivos` longtext,
            `raw` longtext,
            `tags` varchar(255) DEFAULT '' NOT NULL,
            `created_at` datetime DEFAULT NOW() NOT NULL,
            PRIMARY KEY  (id),
            KEY bookingpress_appointment_id (bookingpress_appointment_id),
            KEY bookingpress_customer_id (bookingpress_customer_id),
            KEY bookingpress_staff_member_id (bookingpress_staff_member_id),
    INDEX `appointment_id` (`bookingpress_appointment_id` ASC),
           CONSTRAINT `bphc_booking_id`
            FOREIGN KEY (`bookingpress_appointment_id`)
    REFERENCES `wp_bookingpress_appointment_bookings` (`bookingpress_appointment_booking_id`)
        ) 


 * */








class BookingPress_Expansion_CreateDB {





    
    public static function create_consultas() {
        global $wpdb;
        $table_name = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['consultas'];
        $charset_collate = $wpdb->get_charset_collate();
        
        $customers_table = "{$wpdb->prefix}bookingpress_customers";

        $sql = "CREATE TABLE $table_name (
            `id` mediumint(9) NOT NULL AUTO_INCREMENT,
            `bookingpress_appointment_id` BIGINT NOT NULL,
            `bookingpress_customer_id` int(9) NOT NULL,
            `bookingpress_staff_member_id` int(9) NOT NULL,
            `staff_member_name` varchar(255) DEFAULT '' NOT NULL,
            `service_id` int(9) NOT NULL,
            `service_name` varchar(255) DEFAULT '' NOT NULL,
            `consultorio` varchar(255) DEFAULT '' NOT NULL,
            `date` DATE NOT NULL,
            `time` TIME NOT NULL,
            `general` longtext NOT NULL,
            `vitales` longtext,
            `archivos` longtext,
            `raw` longtext,
            `tags` varchar(255) DEFAULT '' NOT NULL,
            `created_at` datetime DEFAULT NOW() NOT NULL,
            PRIMARY KEY  (id),
            KEY bookingpress_staff_member_id (bookingpress_staff_member_id), 
            INDEX `appointment_id` (`bookingpress_appointment_id` ASC)
        ) $charset_collate;";
        
        
        /**
         * 
         * , 
            CONSTRAINT `historiacustomerid`
            FOREIGN KEY (`bookingpress_customer_id`)
            REFERENCES `$customers_table` (`bookingpress_customer_id`) 
         * 
         * 
         * 
         * 
         * 
         * QUITAMOS LA RESTICCION PARA QUE PERMITA LA CREACION DE HISTORIA SIN APPOINTMENT
          CONSTRAINT `bphc_booking_id` 
          FOREIGN KEY (`bookingpress_appointment_id`) 
          REFERENCES `{$wpdb->prefix}bookingpress_appointment_bookings` (`bookingpress_appointment_booking_id`)
        */
        

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        if($wpdb->last_error) return $wpdb->last_error;
        $up = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name;
        
        return $up;
    }
    
    
    public static function create_antecedentes() {
        global $wpdb;
        $table_name = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['antecedentes'];
        $charset_collate = $wpdb->get_charset_collate();
        
        $customers_table = "{$wpdb->prefix}bookingpress_customers";

        /** -- -----------------------------------------------------
        -- Tabla `antecedentes_paciente`
        -- ----------------------------------------------------- */
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
          `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
          `bookingpress_customer_id` BIGINT NOT NULL,
          `consulta_id` BIGINT UNSIGNED NOT NULL,
          `bookingpress_appointment_id` BIGINT NOT NULL,
          `tipo` ENUM('personal', 'familiar') NOT NULL,
          `descripcion` varchar(255) DEFAULT '' NOT NULL,
          `detalle` TEXT NULL,
          `fecha` DATE NOT NULL,
           PRIMARY KEY (`id`),
           KEY consulta_id (consulta_id),
           KEY `bookingpress_appointment_id` (`bookingpress_appointment_id`),
           INDEX `antecedentes_customer` (`bookingpress_customer_id`)
        ) $charset_collate;";
        
        /** CONSTRAINT `bphc_ant_customer_id_testhc`
            FOREIGN KEY (`bookingpress_customer_id`)
            REFERENCES `$customers_table` (`bookingpress_customer_id`) 
            ON DELETE NO ACTION ON UPDATE NO ACTION */
        
                
        
        /*CREATE TABLE IF NOT EXISTS wp_test_antece (
          `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
          `bookingpress_customer_id` bigint NOT NULL, -- Corregido: Añadido UNSIGNED para compatibilidad con FOREIGN KEY
          `consulta_id` BIGINT UNSIGNED NOT NULL,
          `bookingpress_appointment_id` BIGINT NOT NULL,
          `tipo` ENUM('personal', 'familiar') NOT NULL,
          `descripcion` TEXT NOT NULL,
          `detalle` TEXT NULL,
           PRIMARY KEY (`id`),
           -- Eliminado KEY bookingpress_customer_id (bookingpress_customer_id) por redundancia
           KEY `consulta_id` (`consulta_id`),
           KEY `bookingpress_appointment_id` (`bookingpress_appointment_id`),
           INDEX `antecedentes_customer` (`bookingpress_customer_id` ), -- Este índice también se usará para la FOREIGN KEY
           CONSTRAINT `cudtomer_id`
            FOREIGN KEY (`bookingpress_customer_id`)
            REFERENCES `wp_bookingpress_customers` (`bookingpress_customer_id`)
        );*/
        
        
        
        
        


        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        if($wpdb->last_error) return $wpdb->last_error;
        $up = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name;
        
        return $up;
    }


    public static function create_medicamentos() {
        global $wpdb;
        $table_name = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['medicamentos'];
        $charset_collate = $wpdb->get_charset_collate();
        
        $table_consultas = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['consultas'];
        $customers_table = "{$wpdb->prefix}bookingpress_customers";

        print("<br>$table_name<br>$table_consultas<br>");

        /** -- -----------------------------------------------------
        -- Tabla `medicamentos_recetados`
        -- ----------------------------------------------------- */
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
          `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
          `bookingpress_customer_id` BIGINT   NOT NULL,
          `consulta_id` BIGINT NOT NULL,
          `bookingpress_appointment_id` BIGINT NOT NULL,
          `nombre_medicamento` VARCHAR(255) NOT NULL,
          `dosis` VARCHAR(100) NULL,
          `frecuencia` VARCHAR(100) NULL,
          `fecha` DATE NOT NULL,
          `hasta` DATE NOT NULL,
           PRIMARY KEY (`id`),
           KEY bookingpress_customer_id (bookingpress_customer_id),
           INDEX `appointment_id` (`bookingpress_appointment_id` ASC) 
           ) $charset_collate;";
        
        /*CONSTRAINT `medicam_cid`
            FOREIGN KEY (`consulta_id`)
            REFERENCES `$table_consultas` (`id`)
            
            ALTER TABLE `wp_test2_bphc_medicamentos` ADD CONSTRAINT 
            `medicam_cid` FOREIGN KEY (`consulta_id`) 
            REFERENCES `wp_test2_bphc_consultas`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
            
            
            
            */


        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        
        if($wpdb->last_error) return $wpdb->last_error;
        $up = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name;
        
        return $up;
    }



    public static function create_alergias() {
        global $wpdb;
        $table_name = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['alergias'];
        $charset_collate = $wpdb->get_charset_collate();
        
        $customers_table = "{$wpdb->prefix}bookingpress_customers";

        /** -- -----------------------------------------------------
        -- Tabla `alergias_paciente`
        -- ----------------------------------------------------- */
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
          `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
          `bookingpress_customer_id` BIGINT NOT NULL,
          `consulta_id` BIGINT UNSIGNED NOT NULL,
          `bookingpress_appointment_id` BIGINT NOT NULL,
          `alergia` VARCHAR(255) NOT NULL,
          `reaccion_o_motivo` TEXT NULL,
          `fecha` DATE NOT NULL,
          PRIMARY KEY (`id`),
          KEY bookingpress_customer_id (bookingpress_customer_id),
          INDEX `alergias_customer_id` (`bookingpress_customer_id` ASC)
        ) $charset_collate;";
        
        /** CONSTRAINT `bphc_alerg_customer_id_testhc`
            FOREIGN KEY (`bookingpress_customer_id`)
            REFERENCES `$customers_table` (`bookingpress_customer_id`) 
            ON DELETE NO ACTION ON UPDATE NO ACTION */

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        if($wpdb->last_error) return $wpdb->last_error;
        $up = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name;
        
        return $up;
    }
    
    
    public function create_expansion_workhours() {
        global $wpdb, $tbl_expansion_staff_member_workhours, $tbl_bookingpress_staff_member_workhours;
        
        $charset_collate = $wpdb->get_charset_collate();
        $up = 0;
        
        if( !empty($tbl_expansion_staff_member_workhours) ){
            
            $table_name = $tbl_expansion_staff_member_workhours;
            /**
    		$sql = "CREATE TABLE IF NOT EXISTS `{$table_name}`(
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
            */
            $sql = "CREATE TABLE IF NOT EXISTS `{$table_name}` 
            AS SELECT * FROM `{$tbl_bookingpress_staff_member_workhours}`;";
            
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    		dbDelta( $sql );
            
            $up = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name;
            
            if( $up ){
                $up = $wpdb->get_var(" SHOW COLUMNS FROM '$table_name' LIKE 'service_id'; ") == 'service_id';
                if( !$up ){
                    $sql = "ALTER TABLE `{$table_name}` ADD `service_id` SMALLINT(6) NOT NULL AFTER `bookingpress_staffmember_id`; ";
                    $up = $wpdb->query( $sql );
                }
            }
            
            if(!$up && $wpdb->last_error) return $wpdb->last_error;
            
        }
        return $up;
    }


    /**
    
    public function create_db_tables_anterior() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'bphc_clinical_records';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            appointment_id int(9) NOT NULL,
            customer_id int(9) NOT NULL,
            doctor_id int(9) NOT NULL,
            doctor_specialty varchar(255) DEFAULT '' NOT NULL,
            record_data longtext NOT NULL,
            attachments text,
            created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY  (id),
            KEY appointment_id (appointment_id),
            KEY customer_id (customer_id)
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        
        
        $up = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name;
        
        return $up;
    }
    */
    
}//Fin Class



/*
define( 'WP_CACHE', true );
*/