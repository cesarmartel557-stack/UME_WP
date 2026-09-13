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
            global $wpdb, $tbl_videochat_sala;
            $charset_collate = $wpdb->get_charset_collate();
            $update_success = 0;
            /**
            if( !($wpdb->get_var(" SHOW TABLES LIKE '$tbl_videochat_msg' ") == $tbl_videochat_msg) ){
                // 3. Sentencia SQL estructurada para crear la tabla
                $sql = "CREATE TABLE $tbl_videochat_msg (
                    id bigint(20) NOT NULL AUTO_INCREMENT,
                    sala_id bigint(20) NOT NULL,
                    time int(11) NOT NULL,
                    msg text NOT NULL,
                    user varchar(100) NOT NULL,
                    PRIMARY KEY  (id),
                    KEY sala_id (sala_id)
                ) $charset_collate;";
                
                require_once ABSPATH . 'wp-admin/includes/upgrade.php';
                dbDelta($sql);
            }else{
                $update_success++;
            }
            if( !($wpdb->get_var(" SHOW TABLES LIKE '$tbl_videochat_sala' ") == $tbl_videochat_sala) ){
                
                // 3. Sentencia SQL estructurada con el índice único compuesto
                $sql = "CREATE TABLE $tbl_videochat_sala (
                    id bigint(20) NOT NULL AUTO_INCREMENT,
                    appoint_id bigint(20) NOT NULL,
                    name varchar(255) NOT NULL,
                    token varchar(255) NOT NULL,
                    status TINYINT DEFAULT 1 NOT NULL,
                    user_1 text NOT NULL,
                    user_2 text NOT NULL,
                    service varchar(255) NOT NULL,
                    fecha datetime NOT NULL,
                    PRIMARY KEY  (id),
                    KEY appoint_id (appoint_id),
                    UNIQUE KEY name_token (name, token)
                ) $charset_collate;";
                
                require_once ABSPATH . 'wp-admin/includes/upgrade.php';
                dbDelta($sql);
            }else{
                $update_success++;
            }
            */
            //if( $this->install_videochat_notification_data() ) $update_success++;
            
            
            return $update_success == 1;
        }
        
        function ajax_Expansion_Modules_core_updates(){
            $success = false;
            if( true || current_user_can('manage_options') ){
                $success = $this->Apply_core_updates();
                if( !$success ) $success = $this->Apply_core_updates();
            }
            $response = $success? ['variant'=>'success','result'=> $success]:['variant'=>'error','result'=> $success];
            wp_send_json($response);
            exit;
        }
        
        public function registerGlobals(){
            global $wpdb, $tbl_inter_ingreso;
            $tbl_inter_ingreso = $wpdb->prefix.'test_inter_ingreso';
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
            
            
            add_action('wp_ajax_expansion_get_internacionIngreso_id', [$this, 'ajax_get_internacionIngresoFormData'], 10);
        }
        
        function ajax_get_internacionIngresoFormData(){
            $response = ['variant'=>'error', 'type'=>'error','msg'=> 'error de seguridad' ,'internacionForm_data'=> null];
            $requestdata = $_REQUEST;
            $nonce = !empty($requestdata['_wpnonce'])? $requestdata['_wpnonce'] : '';
            $verify = wp_verify_nonce($nonce, 'bpa_wp_nonce');
            if(!$verify ){
                wp_send_json($response);
                exit;
            }
            $result = [
                'id' => '1',
                'customer_id' => '4514',                
                'staffmember_id' => '2',
                'by_user' => '2',
                'area' => '',
                'destino' => '',
                'sala' => '',
                'cama' => '',
                'ingreso_formdata' => null,
                'raw' => [],
                'datetime' => date("Y-m-d H:i:s"),
                
            ];
            $response = ['variant'=>'success', 'type'=>'success','msg'=> 'Ingreso recuperado con exito.' ,'internacionForm_data'=> $result];
            wp_send_json($response);
            exit;
        }
        
        function get_moduleFile(){
            $requestdata = $_REQUEST;
            $nonce = !empty($requestdata['_wpnonce'])? $requestdata['_wpnonce'] : '';
            $verify = wp_verify_nonce($nonce, 'bpa_wp_nonce');
            if(!$verify ){
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
            
            $this->check_admin_view_need_filters();                        
            
            add_menu_page( 
            'Modulos - Internación', 
            'Internación - Modulos de Extension', 
            'manage_options',//capacidad //'bookingpress_appointments' 
            'bookingpress_modulos',//slug 
            array( $this, 'modules_menu_page' ), 
            $icon_url = '', 1 
            );
                        
            global $BookingPress, $bookingpress_slugs;
                //AGREGAMOS el slug sino falla
                $bookingpress_slugs->modulos     = 'bookingpress_modulos';
                
                ob_start();
                ?>
                <span id="internacion_admin_link">Internacion</span>            
                <?php
                $no_display_link = ob_get_clean();
                //<style>a:has(#historiasC_admin_link) { background: pink; display: none;}</style>
                
                add_submenu_page($bookingpress_slugs->bookingpress, __('internación', 'bookingpress-appointment-booking' ), '', 'bookingpress', $bookingpress_slugs->modulos, array( $this, 'modules_menu_page' ) );
            
            
            
            
        }
        function add_top_menu_item(){
            global $BookingPressPro, $bookingpress_slugs;
            $request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard'; //// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['action'] sanitized properly
            if ( $BookingPressPro->bookingpress_check_capability( 'bookingpress_appointments' )  ){
                        
        
        			?>			
        			<li class="bpa-nav-item <?php echo ( 'modulos' == $request_module ) ? '__active' : ''; ?>">
        				
                        <a href="<?php echo add_query_arg( 'page', $bookingpress_slugs->modulos, esc_url( admin_url() . 'admin.php?page=bookingpress' ) ) . '#internacionIngreso';  // phpcs:ignore ?>" class="bpa-nav-link">
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
        
    }
    
    global $expansion_modules, $expansion_modules_slugs_list;
    $expansion_modules_slugs_list = [
        'modulos'
    ];
    $expansion_modules = new Expansion_Modules();
}

