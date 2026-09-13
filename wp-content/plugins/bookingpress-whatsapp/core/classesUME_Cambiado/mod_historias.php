<?php
// Verificar que WordPress esté cargado
if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

/*
$bookingpress_geoip_file = BOOKINGPRESS_PRO_LIBRARY_DIR . '/geoip/autoload.php';
require $bookingpress_geoip_file;
use GeoIp2\Database\Reader;
*/
function historias_add_styles(){
    global $historias_add_styles_ready;
    if( empty($historias_add_styles_ready) ){
    ?>
    
<script>

var $histories_Obj = [

                {
                    "id": "1",
                    "date": "2025-09-01",
                    "time": "09:00",
                    "bookingpress_appointment_id": "1",
                    "bookingpress_customer_id": "1",
                    "bookingpress_staff_member_id": "3",
                    "staff_member_name": "JoseTest",
                    "service_name": "Cardiología",
                    "consultation_data": {
                        "general":{
                			"motivoConsulta": "cliente dice dolor",
                			"diagnostico": "no tiene nada",
                			"tratamiento": "ninguno - no tiene nada",
                			"notas": "Este viene a joder 2 x 3 Y alguna otra vez (actualizado)"
                        },
                    	"vitales":{
                    	    "altura":"",
                            "peso":"",
                            "imc":"",
                    		"presionArterial":"",
                    		"frecuenciaCardiaca":"",
                    		"frecuenciaRespiratoria":"",
                    		"temperatura":"",
                    		"saturacionOxigeno":""
                    	},
                    	"antecedentes":{
                    		"personales":[{"a":"Traumatismo","motivo":"se pego en la cabeza."},{"a":"Colicos","motivo":"comio achuras."}],
                    		"familiares":[{"a":"Diabetes","motivo":"abuelo pat."}],
                    	},
                    	"medicamentos":[
                    		{"nombre" :"ibuprofeno","dosis" :"2","frecuencia" :"8hs", "fecha":"2025/03/14"},
                            {"nombre" :"antibiotico","dosis" :"1","frecuencia" :"12hs", "fecha":"2025/03/14"},
                    	]
                        
                    }
                },
                {
                    "id": "2",
                    "date": "2025-09-05",
                    "time": "09:00",
                    "bookingpress_appointment_id": "1",
                    "bookingpress_customer_id": "1",
                    "bookingpress_staff_member_id": "3",
                    "staff_member_name": "JoseTest",
                    "service_name": "Cardiología",
                    "consultation_data": {
                        "general":{
                			"motivoConsulta": "cliente dice dolor",
                			"diagnostico": "no tiene nada",
                			"tratamiento": "ninguno - no tiene nada",
                			"notas": "Este viene a joder 2 x 3 Y alguna otra vez (actualizado)"
                        },
                    	"vitales":{
                    	    "altura":"",
                            "peso":"",
                            "imc":"",
                    		"presionArterial":"",
                    		"frecuenciaCardiaca":"",
                    		"frecuenciaRespiratoria":"",
                    		"temperatura":"",
                    		"saturacionOxigeno":""
                    	},
                    	"antecedentes":{
                    		"personales":[{"a":"Traumatismo","motivo":"se pego en la cabeza."},{"a":"Colicos","motivo":"comio achuras."}],
                    		"familiares":[{"a":"Diabetes","motivo":"abuelo pat."}],
                    	},
                    	"medicamentos":[
                    		{"nombre" :"ibuprofeno","dosis" :"2","frecuencia" :"8hs", "fecha":"2025/03/14"},
                            {"nombre" :"antibiotico","dosis" :"1","frecuencia" :"12hs", "fecha":"2025/03/14"},
                    	]
                        
                    }
                },
            ];
            
</script>

 <style>
 .bpa-table-container .el-table__body-wrapper table tbody tr:nth-child(even) {
    background-color: #fbfbfb !important;
}
 .el-table--enable-row-hover .el-table__body tr:hover>td.el-table__cell {
    background-color: #595a5a !important;
    color: white;
}

.el-table th .cell {
    text-overflow: ellipsis !important;
    /* width: 50px !important; */
    word-break: break-word !important;
    white-space: nowrap !important;
    overflow: hidden !important;
}

@media (max-width: 800px){
    .el-table th .cell {
        //text-decoration: underline;
        //text-decoration-color: cadetblue;
        color: cadetblue;
    }
    .el-table th .cell .caret-wrapper {
        display: none;
    }
    
}

.link-paciente {
    display: block;
    width: 100%;
    height: 100%;
    cursor: pointer !important;
    padding: 4px 10px;
    min-height: 40px;
}
.link-paciente:hover {
    color: #00d1a1e8 !important;
}
.link-paciente:hover .el-image {
    outline: 1px solid #00d1a1e8;
    /* box-shadow: 0 0 5px #00d1cf8a; */
}

.link-paciente label {
    cursor: pointer !important;
}

.w25min {
    width: 30%;
    min-width: 250px;
    border: 1px solid #a9a9a98f;
    border-radius: 0 10px 10px 0;
    /* box-shadow: -1px 0px 7px 0px grey; */
    background-color: white;
    padding: 2px;
}

.historias_y_pacientes {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    padding-top: 20px;
}
.historias_y_pacientes {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    padding-top: 20px;
    background-color: #152e2d;
}
.main-historias {
    display: flex;
    width: calc(100% - max(250px, calc(30% + 10px)) );
    min-width: 200px;
    align-items: flex-start;
    flex-direction: column;
    padding: 10px;
    border: 0px dotted darkgrey;
    border-radius: 10px;
    margin: 2px;
}

.subt-historias {
    /* width: 100%; */
    padding: 10px 40px 0 0px;
    border-bottom: 1px dotted darkgray;
    margin: 10px 10px 30px;
}
.subt-historias * {
    color: ghostwhite;
}

.lista-historias-container {
    width: 100%;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
}
.linea-tiempo {
    width: 30px;
}

.lista-historias {
    display: flex;
    flex-direction:column;
    align-items: flex-start;
    
    width: calc( 100% - 30px);
    height: 100%;
    
    position:relative;
}
/*
.historia-item {
    display: block;
    width: 90%;
    margin: auto;
    border-radius: 5px;
    border: 2px solid midnightblue;
    margin-bottom: 36px;
    padding: 10px;
}
*/
.historia-item {
    display: block;
    width: 90%;
    margin: auto;
    border-radius: 5px;
    transition: all 0.3s ease 0.1s;
    margin-bottom: 36px;
    padding: 10px;
    outline: 2px solid #19197000;
    box-shadow: -1px 0px 30px 0px #8080801f;
    /*box-shadow: -1px 0px 13px 0px #8080803b;*/
    background-color: honeydew;
    box-shadow: -1px 0px 30px 0px #808080a1;
    position: relative;
}
.historia-item {
    display: block;
    width: 90%;
    margin: auto;
    border-radius: 5px;
    transition: all 0.3s ease 0.1s;
    margin-bottom: 36px;
    padding: 10px;
    outline: 2px solid #19197000;
    box-shadow: -1px 0px 30px 0px #8080801f;
    /* box-shadow: -1px 0px 13px 0px #8080803b; */
    background-color: darkorange;
    box-shadow: -1px 0px 30px 0px #808080a1;
    cursor: zoom-in;
    position: relative;
}


.historia-item:hover {
    outline: 2px solid #191970f7;
    
}
.historia-item:hover {
    outline: 2px solid #40caff;
    background-color: white;
    box-shadow: 0 0 3px white;
    /* transition: all .2s; */
}

/* ----- linea tiempo ---- */
.lista-historias::after {
    //content: ' ';
    position: absolute;
    width: 6px;
    background-color: white;
    top: 0;
    bottom: 0;
    left: -10px;
    /* margin-right: 10px; */
}


/*
.historia-item:after {
    content: ' ';
    position: absolute;
    width: 20px;
    height: 20px;
    background-color: white;
    border: 4px solid mediumspringgreen;
    border-radius: 50%;
    z-index: 1;
    top: 5px;
    left: -20px;
}
*/
/*
.historia-item:after {
    content: ' ';
    position: absolute;
    width: 0;
    height: 0;
    //background-color: white;
    border: 4px solid mediumspringgreen;
    //border-radius: 50%;
    z-index: 1;
    top: 5px;
    left: -25px;
    border-width: 10px 10px 10px 15px;
    border-color: transparent transparent transparent mediumspringgreen;
}
*/
.historia-item:after {
    content: ' ' attr(data-historia) ' ';
    position: absolute;
    left: -56px;
    width: 40px;
    height: 40px;
    top: 10px;
    background-color: white;
    color: mediumseagreen;
    z-index: 1;
    /* outline: 2px solid mediumspringgreen; */
    border-radius: 50%;
    padding: 6px;
    text-align: center;
}





.linea-tiempo {
    width: 30px;
    border: 4px solid white;
    border-width: 0 10px 0 0;
    /* padding: 0 4px; */
    /* background: aquamarine; */
    margin-right: 30px;
}
.linea-tiempo {
    width: 20px;
    border: 4px solid white;
    border-width: 0 10px 0 0;
    /* padding: 0 4px; */
    /* background: aquamarine; */
    margin-right: 34PX;
}
.lista-historias {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: calc( 100% - 30px);
    height: 100%;
    position: relative;
    align-content: flex-start;
    justify-content: flex-start;
    /* padding: 0; */
}
.historia-item {
    display: block;
    width: 90%;
    margin: 0;
    border-radius: 5px;
    transition: all 0.3s ease 0.1s;
    margin-bottom: 36px;
    padding: 10px;
    outline: 2px solid #19197000;
    box-shadow: -1px 0px 30px 0px #8080801f;
    /* box-shadow: -1px 0px 13px 0px #8080803b; */
    background-color: darkorange;
    box-shadow: -1px 0px 30px 0px #808080a1;
    cursor: pointer; //zoom-in;
    position: relative;
    left: 0;
}

.historia-item:after {
    content: ' ' attr(data-historia) ' ';
    position: absolute;
    left: -60px;
    width: 40px;
    height: 40px;
    top: 10px;
    background-color: white;
    color: black;//mediumseagreen;
    z-index: 1;
    /* outline: 2px solid mediumspringgreen; */
    border-radius: 50%;
    padding: 6px;
    /* margin-left: -45px; */
}




.w25min {
    width: 30%;
    min-width: 250px;
    border: 0px solid #a9a9a98f;
    border-radius: 0 10px 10px 0;
    /* box-shadow: -1px 0px 7px 0px grey; */
    background-color: white;
    padding-top: 10px;
}
.historias_y_pacientes {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    padding-top: 20px;
    background-color: #565a5a;
}

.historia-item {
    background-color: #fafffe;
}
.historia-item:hover {
    outline: 2px solid #40caff;
    background-color: white;
    box-shadow: 0 0 3px white, 2px 5px 20px #23d3721f !important;
    transition: all .2s;
}



.el-table tr .el-table__cell {
    border-bottom: 6px solid transparent;
}
.el-table tr:has(.link-paciente.activo) .el-table__cell {
    
    background: #0e0e0e9e;
    border-bottom: 6px solid #06b998 !important;
    color: white;
}
a.link-paciente.activo {
    color: #0dddb7;
}
.el-row.w25min {
    padding-right: 0;
}


.historias_y_pacientes {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    padding-top: 20px;
    background-color: #2a2e2ea8;
    /*background-image: url(https://www.sanatoriolomalinda.com.ar/wp-content/uploads/2024/01/DSC9081-scaled-100x50.jpg);*/
    background-repeat: repeat;
    background-size: 100%;
    background-blend-mode: multiply;
    /* background-position-y: top; */
    /* transform: scale(1.5); */
    /* background-position-y: -100px; */
    /*filter: sepia(1);*/
    transition: all 0.8s;
}

</style>
<script src='<?php echo BKMOD_SRC.'/a076d05399.js';?>' crossorigin='anonymous'></script>
<?php
    }
    $historias_add_styles_ready = 1;
}

#$bookingpress_load_file_name = apply_filters('bookingpress_modify_header_content', $bookingpress_load_file_name,1);
add_filter('bookingpress_modify_header_content', function( $bookingpress_load_file_name, $from_header = 0 ){
    global $BookingPress, $bookingpress_slugs;
    
    if( strpos($bookingpress_load_file_name, 'staffmember_customize') ){
        //remove_action( 'init', array( $BookingPress, 'bookingpress_modify_header_content_func' ) );
        $bookingpress_load_file_name = __DIR__ .'/mod_staff_customize.php';
    }
    
    return $bookingpress_load_file_name;
},50,1);

#$bookingpress_allowed_disable_date_filter_pickeroptions = apply_filters( 'bookingpress_allowed_disable_date_filter_pickeroptions', false, $requested_module);
add_filter('bookingpress_allowed_disable_date_filter_pickeroptions', function( $confrmar= false, $requested_module= "" ){
    if( $requested_module == 'stories'){
        $confrmar = true;
    }
    
    return $confrmar;
},10,2);

add_filter('bookingpress_allowed_tel_input_script_backend', function( $confrmar= false, $page= "" ){
    if( $page == 'bookingpress_stories'){
        $confrmar = true;
        historias_add_styles();
    }
    
    return $confrmar;
},30,2);


/**
 * //Comentado para que se vea solo el boton
 * 
add_action('bookingpress_add_dynamic_menu_item_to_top', function( ){
    $bookingpress_load_file_name = __DIR__ .'/mod_header.php';
    
    include_once $bookingpress_load_file_name;
},10);
*/

add_action('init', function(){
global $BookingPress, $bookingpress_slugs;
    $bookingpress_slugs->bookingpress_stories     = 'bookingpress_stories';
    $BookingPress->bookingpress_slugs = $bookingpress_slugs;
    
    //$bookingpress_slugs = $bookingpress_slugs;
#add_action('admin_enqueue_scripts', array( $BookingPress, 'set_js' ), 11);
#add_action('admin_enqueue_scripts', array( $BookingPress, 'set_css' ), 11);

/*
 $bookingpress_site_current_language = 'es';
    wp_register_script('bookingpress_element_js', BOOKINGPRESS_URL . '/js/bookingpress_element.js', array( 'bookingpress_admin_js' ), BOOKINGPRESS_VERSION);
        wp_enqueue_script('bookingpress_element_js');
    
    wp_register_script('bookingpress_elements_locale', BOOKINGPRESS_URL . '/js/elements_locale/' . $bookingpress_site_current_language . '.js', array( 'bookingpress_element_js' ), BOOKINGPRESS_VERSION);
                    wp_enqueue_script('bookingpress_elements_locale');
*/
},2);

add_action('admin_menu', function(){
    global $BookingPress, $bookingpress_slugs;
    //AGREGAMOS el slug sino falla
    $bookingpress_slugs->bookingpress_stories     = 'bookingpress_stories';
    
    //Comentado para que se vea solo el boton
    add_submenu_page($bookingpress_slugs->bookingpress, 'Historias Clinicas', 'Historias Clinicas', 'bookingpress', 'bookingpress_stories', array($BookingPress, 'route') );//'mod_historias'

}, 50);
//do_action('bookingpress_' . $requested_module . '_dynamic_view_load');

function mod_historias(){
 echo "<br /><br /><br /><br /><br />...<br /><br />";
    echo "<div style='margin:auto'><h1>HISTORIAS CLINICAS</h1></div>";

}

function view_historias(){}


    class bookingpress_stories Extends BookingPress_Core
    {
        function __construct()
        {
            
/*
            add_action('wp_ajax_bookingpress_get_customers', array( $this, 'bookingpress_get_customer_details' ), 10);
            add_action('wp_ajax_bookingpress_add_customer', array( $this, 'bookingpress_add_customer' ), 10);
            add_action('wp_ajax_bookingpress_get_edit_user', array( $this, 'bookingpress_get_edit_user_details' ), 10);
            add_action('wp_ajax_bookingpress_delete_customer', array( $this, 'bookingpress_delete_customer' ), 10);
            add_action('wp_ajax_bookingpress_bulk_customer', array( $this, 'bookingpress_bulk_action' ), 10);
*/
            add_action('bookingpress_stories_dynamic_vue_methods', array( $this, 'bookingpress_customer_dynamic_vue_methods_func' ), 10);
            add_action('bookingpress_stories_dynamic_on_load_methods', array( $this, 'bookingpress_customer_dynamic_on_load_methods_func' ), 10);
            add_action('bookingpress_stories_dynamic_data_fields', array( $this, 'bookingpress_customer_dynamic_data_fields_func' ), 10);
            add_action('bookingpress_stories_dynamic_helper_vars', array( $this, 'bookingpress_customer_dynamic_helper_vars_func' ), 10);
            add_action('bookingpress_stories_dynamic_view_load', array( $this, 'bookingpress_dynamic_load_customers_view_func' ), 10);

add_action( 'admin_init', array( $this, 'bookingpress_customer_vue_data_fields') );

/*
            add_action('wp_ajax_bookingpress_get_wpuser', array( $this, 'bookingpress_get_wpuser' ));

            add_action('wp_ajax_bookingpress_upload_customer_avatar', array( $this, 'bookingpress_upload_customer_avatar_func' ), 10);
            add_action('wp_ajax_bookingpress_get_existing_users_details', array( $this, 'bookingpress_get_existing_user_details' ), 10);

            
            add_action('user_register', array($this,'bookingpress_add_capabilities_to_new_user'));

            add_action( 'wp_ajax_bookingpress_remove_customer_avatar', array( $this, 'bookingpress_remove_customer_avatar_func'));
*/
            add_action('wp_ajax_bookingpress_get_patient_histories', array( $this, 'bookingpress_get_patient_histories' ), 10);
            add_action('wp_ajax_bookingpress_find_customer_by_dni', array( $this, 'bookingpress_find_customer_by_dni' ), 10);
        }
        
        /**
         * Add BookingPress capabilities when new admin user register from backend
         *
         * @param  mixed $user_id   New registered user id
         * @return void
         */
        function bookingpress_add_capabilities_to_new_user($user_id) {
            global $BookingPress;
            if ($user_id == '') {
                return;
            }
            if (user_can($user_id, 'bookingpress-staffmember')) {
                $bookingpressroles = $BookingPress->bookingpress_capabilities();
                $userObj = new WP_User($user_id);
                foreach ($bookingpressroles as $bookingpress_role => $bookingpress_role_desc) {
                    $userObj->add_cap($bookingpress_role);
                }
                unset($bookingpress_role);
                unset($bookingpress_roles);
                unset($bookingpress_role_desc);
            }
        }
        
        /**
         * Default data variables for customer module
         *
         * @return void
         */
        function bookingpress_customer_vue_data_fields(){
            global $bookingpress_customer_vue_data_fields,$bookingpress_global_options, $dni_key, $obra_social_field_key, $plan_de_obra_field_key;
            $bookingpress_options                  = $bookingpress_global_options->bookingpress_global_options();
            $bookingpress_country_list             = $bookingpress_options['country_lists'];
            $bookingpress_pagination               = $bookingpress_options['pagination'];
            $bookingpress_pagination_arr           = json_decode($bookingpress_pagination, true);
            $bookingpress_pagination_selected      = $bookingpress_pagination_arr[0];

            $bookingpress_customer_vue_data_fields = array(
                'bulk_action'                => 'bulk_action',
                'bulk_options'               => array(
                    array(
                        'value' => 'bulk_action',
                        'label' => __('Bulk Action', 'bookingpress-appointment-booking'),
                    ),
                    array(
                        'value' => 'delete',
                        'label' => __('Delete', 'bookingpress-appointment-booking'),
                    ),
                ),
            
                'phone_countries_details'    => json_decode($bookingpress_country_list),
                'loading'                    => false,
                'items'                      => array(),
                'multipleSelection'          => array(),
                'perPage'                    => $bookingpress_pagination_selected,
                'totalItems'                 => 0,
                'pagination_selected_length' => $bookingpress_pagination_selected,
                'pagination_length'          => $bookingpress_pagination,
                'currentPage'                => 1,
                'open_customer_modal'        => false,
                'customer'                   => array(
                    'avatar_url'             => '',
                    'avatar_name'            => '',
                    'avatar_list'            => array(),
                    'wp_user'                => null,
                    'username'               => '',
                    'firstname'              => '',
                    'lastname'               => '',
                    'email'                  => '',
                    'phone'                  => '',
                    'customer_phone_country' => '',
                    'customer_phone_dial_code' => '',
                    'note'                   => '',
                    'update_id'              => 0,
                    '_wpnonce'               => '',
                    'password'               => '',
                ),
                'customer_detail_save'       => false,
                'wpUsersList'                => array(),
                'savebtnloading'             => false,
                'rules'                      => array(
                    'username' => array(
                        array(
                            'required' => true,
                            'message'  => esc_html__('Please enter username', 'bookingpress-appointment-booking'),
                            'trigger'  => 'blur',
                        ),
                    ),
                    'firstname' => array(
                        array(
                            'required' => true,
                            'message'  => esc_html__('Please enter firstname', 'bookingpress-appointment-booking'),
                            'trigger'  => 'blur',
                        ),
                    ),
                    'lastname'  => array(
                        array(
                            'required' => true,
                            'message'  => esc_html__('Please enter lastname', 'bookingpress-appointment-booking'),
                            'trigger'  => 'blur',
                        ),
                    ),
                    'email'     => array(
                        array(
                            'required' => true,
                            'message'  => esc_html__('Please enter email address', 'bookingpress-appointment-booking'),
                            'trigger'  => 'blur',
                        ),
                        array(
                            'type'    => 'email',
                            'message' => esc_html__('Please enter valid email address', 'bookingpress-appointment-booking'),
                            'trigger' => 'blur',
                        ),
                    ),
                ),
                'customerSearch'             => '',
                'customer_search_range'      => '',
                'columnSequenceModal'        => false,
                'pagination_length_val'      => '10',
                'pagination_val'             => array(
                    array(
                        'text'  => '10',
                        'value' => '10',
                    ),
                    array(
                        'text'  => '20',
                        'value' => '20',
                    ),
                    array(
                        'text'  => '50',
                        'value' => '50',
                    ),
                    array(
                        'text'  => '100',
                        'value' => '100',
                    ),
                    array(
                        'text'  => '200',
                        'value' => '200',
                    ),
                    array(
                        'text'  => '300',
                        'value' => '300',
                    ),
                    array(
                        'text'  => '400',
                        'value' => '400',
                    ),
                    array(
                        'text'  => '500',
                        'value' => '500',
                    ),
                ),
                'cusShowFileList'            => false,
                'is_display_loader'          => '0',
                'is_disabled'                => false,
                'is_display_save_loader'     => '0',
                'selected_patient' => null,
                'histories' => array(),
                'histories_loading' => false,
                'dni_query' => '',
                'patient_searching' => false,
                'current_user_id' => get_current_user_id(),
                'history_form' => array(
                    'antecedentes' => '',
                    'diagnostico' => '',
                    'medicamentos' => '',
                    'observaciones' => '',
                ),
                'bpa_wp_nonce' => wp_create_nonce('bpa_wp_nonce'),
                'history_saving' => false,
                'bp_hc_is_expand' => 0,
                'dni_meta_key' => !empty($dni_key)? $dni_key:'text_C6kufq',
                'obra_social_meta_key' => !empty($obra_social_field_key)? $obra_social_field_key:'obra_soc_seguros',
                'obra_plan_meta_key' => !empty($plan_de_obra_field_key)? $plan_de_obra_field_key:"text_o9q4Cr", //.customer_metadata[ vm2.obra_plan_meta_key ]
                'bphc_layout' => array(
                    'customerHeaderCard' => ['activeNames'=>[]]
                ),
                'bp_hc_HistoriesSummary' => null,
                "bp_hc_defaultHistoriesSummary" => ([

                    (object) [
                            "id"    => "1",
                            "date"  => "2025-09-01",
                            "time"  => "09 =>00",
                            "bookingpress_appointment_id"   => "1",
                            "bookingpress_customer_id"      => "1",
                            "bookingpress_staff_member_id"  => "3",
                            "staff_member_name" => "JoseTest",
                            "service_name"      => "Cardiología",
                            "consultation_data" => [
                                    "general" =>[
                            			"motivoConsulta" => "cliente dice dolor",
                            			"diagnostico" => "no tiene nada",
                            			"tratamiento" => "ninguno - no tiene nada",
                            			"notas" => "Este viene a joder 2 x 3 Y alguna otra vez (actualizado)",
                                        "archivos" => [ "nombre" =>"ibuprofeno","size"=>"","url"=>'https://cdn.prod.website-files.com/5dd6c916acc1cc42476f2149/60a9af48c867f6ee401a48e1_Nimbo%20nueva%20funcionalidad%20template%202020-01.png' ]
                                    ],
                                	"vitales" =>[
                                        "altura" =>"",
                                        "peso" =>"",
                                        "imc" =>"",
                                		"presionArterial" =>"",
                                		"frecuenciaCardiaca" =>"",
                                		"frecuenciaRespiratoria" =>"",
                                		"temperatura" =>"",
                                		"saturacionOxigeno" =>""
                                	],
                                	"antecedentes" =>[
                                		"personales" =>[["a"=>"Traumatismo","motivo"=>"se pego en la cabeza."],["a"=>"Colicos","motivo"=>"comio achuras."]],
                                		"familiares" =>[["a"=>"Diabetes","motivo"=>"abuelo pat."]],
                                	],
                                	"medicamentos" =>[
                                		["nombre" =>"ibuprofeno","dosis" =>"2","frecuencia" =>"8hs", "fecha"=>"2025/03/14","size"=>""],
                                        ["nombre" =>"antibiotico","dosis" =>"1","frecuencia" =>"12hs", "fecha"=>"2025/03/14","size"=>"","url"=>'https://cdn.prod.website-files.com/5dd6c916acc1cc42476f2149/60a9af48c867f6ee401a48e1_Nimbo%20nueva%20funcionalidad%20template%202020-01.png']
                                	]
                                
                            ]
                    ],
                    (object) [
                            "id"    => "1",
                            "date"  => "2025-09-01",
                            "time"  => "09 =>00",
                            "bookingpress_appointment_id"   => "1",
                            "bookingpress_customer_id"      => "1",
                            "bookingpress_staff_member_id"  => "3",
                            "staff_member_name" => "JoseTest",
                            "service_name"      => "Cardiología",
                            "consultation_data" => [
                                    "general" =>[
                            			"motivoConsulta" => "cliente dice dolor",
                            			"diagnostico" => "no tiene nada",
                            			"tratamiento" => "ninguno - no tiene nada",
                            			"notas" => "Este viene a joder 2 x 3 Y alguna otra vez (actualizado)",
                                        "archivos" => [ ]
                                    ],
                                	"vitales" =>[
                                        "altura" =>"",
                                        "peso" =>"",
                                        "imc" =>"",
                                		"presionArterial" =>"",
                                		"frecuenciaCardiaca" =>"",
                                		"frecuenciaRespiratoria" =>"",
                                		"temperatura" =>"",
                                		"saturacionOxigeno" =>""
                                	],
                                	"antecedentes" =>[
                                		"personales" =>[["a"=>"Traumatismo","motivo"=>"se pego en la cabeza."],["a"=>"Colicos","motivo"=>"comio achuras."]],
                                		"familiares" =>[["a"=>"Diabetes","motivo"=>"abuelo pat."]],
                                	],
                                	"medicamentos" =>[
                                		["nombre" =>"ibuprofeno","dosis" =>"2","frecuencia" =>"8hs", "fecha"=>"2025/03/14"],
                                        ["nombre" =>"antibiotico","dosis" =>"1","frecuencia" =>"12hs", "fecha"=>"2025/03/14"]
                                	]
                                
                            ]
                    ]
                ]),
                
            );
            
        }
		
		/**
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
			//if the is_front parameter value is 1 then appointment booked at front side else 2 then appointment is booked at backend.
			//if the is_customer create parameter value is  1 then customer is create at the backend.
            global $wpdb, $BookingPress, $tbl_bookingpress_appointment_bookings, $tbl_bookingpress_customers, $tbl_bookingpress_entries, $bookingpress_email_notifications, $bookingpress_debug_payment_log_id, $bookingpress_global_options;
            $bookingpress_customer_id = $bookingpress_wpuser_id = 0;
            $bookingpress_user_pass   = '';

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
                
                if (empty($bookingpress_existing_user_id) ) {
                    $bookingpress_allow_customer_create = $BookingPress->bookingpress_get_settings('allow_wp_user_create', 'customer_setting');
                    $bookingpress_allow_customer_create = ! empty($bookingpress_allow_customer_create) ? $bookingpress_allow_customer_create : 'false';
                    if ($bookingpress_allow_customer_create == 'false' || $is_front == 2 ) {
                        // If user create switch turned off then this condition executes.
                        $customer_details = array(
                            'bookingpress_wpuser_id'      => $bookingpress_wpuser_id,
                            'bookingpress_user_login'     => $bookingpress_customer_email,
                            'bookingpress_user_status'    => 1,
                            'bookingpress_user_type'      => 2,
                            'bookingpress_user_email'     => $bookingpress_customer_email,
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
                        );

                        $wpdb->insert($tbl_bookingpress_customers, $customer_details);
                        $bookingpress_customer_id = $wpdb->insert_id;
                        $bookingpress_is_customer_create = 1;
                        do_action( 'bookingpress_after_create_customer', $bookingpress_customer_id );
                    } elseif ($bookingpress_allow_customer_create == 'true' ) {
                        $bookingpress_is_wp_user_exist = get_user_by('email', $bookingpress_customer_email);
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

                            $bookingpress_wpuser_id = 0;
                            if(!empty($bookingpress_customer_email)) {
                                $bookingpress_wpuser_id = wp_create_user($bookingpress_user_name, $bookingpress_user_pass, $bookingpress_customer_email);

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

                        $bookingpress_is_customer_exist = $wpdb->get_var($wpdb->prepare("SELECT COUNT(bookingpress_customer_id) as total FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2", $bookingpress_customer_email)); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                        if ($bookingpress_is_customer_exist == 0 || empty($bookingpress_customer_email)) {
                            // If customer not exists then create bookingpress customer
                            $customer_details = array(
                            'bookingpress_wpuser_id'   => $bookingpress_wpuser_id,
                            'bookingpress_user_login'  => $bookingpress_customer_email,
                            'bookingpress_user_status' => 1,
                            'bookingpress_user_type'   => 2,
                            'bookingpress_user_email'  => $bookingpress_customer_email,
                            'bookingpress_user_name'   => $bookingpress_user_name,
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
                            );

                            $wpdb->insert($tbl_bookingpress_customers, $customer_details);
                            $bookingpress_customer_id = $wpdb->insert_id;
                            $bookingpress_is_customer_create = 1;
                            do_action( 'bookingpress_after_create_customer', $bookingpress_customer_id );
                        } elseif ($bookingpress_is_customer_exist > 0 ) {
                            // Get latest customer details
                            $bookingpress_customer_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2 ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_email), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
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
                            $bookingpress_customer_details = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2 ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_email), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
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
					$bookingpress_wpuser_id = $bookingpress_customer_id = $bookingpress_existing_user_id; 

                    $bookingpress_is_wp_user_exist = get_user_by('ID', $bookingpress_wpuser_id);
                    $bookingpress_user_pass        = ! empty($bookingpress_is_wp_user_exist->data->user_pass) ? $bookingpress_is_wp_user_exist->data->user_pass : '';

                    $bookingpress_is_customer_exist = $wpdb->get_var($wpdb->prepare("SELECT COUNT(bookingpress_customer_id) as total FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2", $bookingpress_customer_email)); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm

                    if ($bookingpress_is_customer_exist == 0 ) {
                        $customer_details = array(
                         'bookingpress_wpuser_id'      => $bookingpress_wpuser_id,
                         'bookingpress_user_login'     => $bookingpress_customer_email,
                         'bookingpress_user_status'    => 1,
                         'bookingpress_user_type'      => 2,
                         'bookingpress_user_email'     => $bookingpress_customer_email,
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

                        );
                        $wpdb->insert($tbl_bookingpress_customers, $customer_details);
                        $bookingpress_customer_id = $wpdb->insert_id;
                        $bookingpress_is_customer_create = 1;
                        do_action( 'bookingpress_after_create_customer', $bookingpress_customer_id );
					}else if(($bookingpress_is_customer_exist > 0 && $is_front != 2) || $is_customer == 1 ){
                        // Get latest customer details
                        $bookingpress_customer_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2 ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_email), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm

                        $bookingpress_customer_id = $bookingpress_customer_details['bookingpress_customer_id'];

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
                        $bookingpress_customer_details = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_user_email = %s AND bookingpress_user_type = 2 ORDER BY bookingpress_customer_id DESC", $bookingpress_customer_email), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
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

            return array(
                'bookingpress_customer_id' => $bookingpress_customer_id,
                'bookingpress_wpuser_id'   => $bookingpress_wpuser_id,
                'bookingpress_is_customer_create' => $bookingpress_is_customer_create,
            );
        }

        function bookingpress_remove_customer_avatar_func(){
            global $wpdb;
            $response = array();

            $bpa_check_authorization = $this->bpa_check_authentication( 'remove_customer_avatar', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            if (! empty($_POST) && ! empty($_POST['upload_file_url']) ) { // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_uploaded_avatar_url = esc_url_raw($_POST['upload_file_url']); // phpcs:ignore
                $bookingpress_file_name_arr       = explode('/', $bookingpress_uploaded_avatar_url);
                $bookingpress_file_name           = $bookingpress_file_name_arr[ count($bookingpress_file_name_arr) - 1 ];
                if( file_exists( BOOKINGPRESS_TMP_IMAGES_DIR . '/' . $bookingpress_file_name ) ){
                    @unlink(BOOKINGPRESS_TMP_IMAGES_DIR . '/' . $bookingpress_file_name);
                }
            }
            die;
        }
        
        /**
         * Get existing wordpress user details
         *
         * @return void
         */
        function bookingpress_get_existing_user_details()
        {
            global $wpdb, $tbl_bookingpress_customers;
            $response              = array();

            $bpa_check_authorization = $this->bpa_check_authentication( 'search_user', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            $response['variant']      = 'error';
            $response['title']        = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']          = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            $response['user_details'] = '';

            $existing_user_id = ! empty($_REQUEST['existing_user_id']) ? intval($_REQUEST['existing_user_id']) : 0;
            if (! empty($existing_user_id) ) {
                $bookingpress_user_details = get_user_by('id', $existing_user_id);
                $bookingpress_user_email   = $bookingpress_user_details->data->user_email;
                $bookingpress_user_name    = $bookingpress_user_details->data->user_login;
                
                $bookingpress_user_firstname = get_user_meta($existing_user_id, 'first_name', true);
                $bookingpress_user_lastname  = get_user_meta($existing_user_id, 'last_name', true);

                $bookingpress_user_data = array(
                'username'       => esc_html($bookingpress_user_name),
                'user_email'     => esc_html($bookingpress_user_email),
                'user_firstname' => esc_html($bookingpress_user_firstname),
                'user_lastname'  => esc_html($bookingpress_user_lastname),
                );

                $response['user_details'] = $bookingpress_user_data;
                $response['variant']      = 'success';
                $response['title']        = esc_html__('Success', 'bookingpress-appointment-booking');
                $response['msg']          = esc_html__('Users details fetched successfully.', 'bookingpress-appointment-booking');
            }

            echo wp_json_encode($response);
            exit();
        }
        
        /**
         * Upload customer avatar from backend
         *
         * @return void
         */
        function bookingpress_upload_customer_avatar_func()
        {
            $return_data = array(
            'error'            => 0,
            'msg'              => '',
            'upload_url'       => '',
            'upload_file_name' => '',
            );
         //phpcs:ignore 
         $bookingpress_fileupload_obj = new bookingpress_fileupload_class( $_FILES['file'] );

            if (! $bookingpress_fileupload_obj ) {
                $return_data['error'] = 1;
                $return_data['msg']   = $bookingpress_fileupload_obj->error_message;
            }

            $bpa_check_authorization = $this->bpa_check_authentication( 'upload_customer_avatar', true, 'bookingpress_upload_customer_avatar' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            $bookingpress_fileupload_obj->check_cap          = true;
            $bookingpress_fileupload_obj->check_nonce        = true;
            $bookingpress_fileupload_obj->nonce_data         = isset($_REQUEST['_wpnonce']) ? sanitize_text_field($_REQUEST['_wpnonce']) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
            $bookingpress_fileupload_obj->nonce_action       = isset($_REQUEST['action']) ? sanitize_text_field($_REQUEST['action']) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
            $bookingpress_fileupload_obj->check_only_image   = true;
            $bookingpress_fileupload_obj->check_specific_ext = false;
            $bookingpress_fileupload_obj->allowed_ext        = array();

            $file_name                = isset($_FILES['file']['name']) ? current_time('timestamp') . '_' . sanitize_file_name($_FILES['file']['name']) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
            $upload_dir               = BOOKINGPRESS_TMP_IMAGES_DIR . '/';
            $upload_url               = BOOKINGPRESS_TMP_IMAGES_URL . '/';
            $bookingpress_destination = $upload_dir . $file_name;

            $check_file = wp_check_filetype_and_ext( $bookingpress_destination, $file_name );
            
            if( empty( $check_file['ext'] ) ){
                $return_data['error'] = 1;
                $return_data['upload_error'] = $upload_file;
                $return_data['msg']   = esc_html__('Invalid file extension. Please select valid file', 'bookingpress-appointment-booking');
            } else {
                $upload_file = $bookingpress_fileupload_obj->bookingpress_process_upload($bookingpress_destination);
                if ($upload_file == false ) {
                    $return_data['error'] = 1;
                    $return_data['msg']   = ! empty($upload_file->error_message) ? $upload_file->error_message : esc_html__('Something went wrong while updating the file', 'bookingpress-appointment-booking');
                } else {
                    $return_data['error']            = 0;
                    $return_data['msg']              = '';
                    $return_data['upload_url']       = $upload_url . $file_name;
                    $return_data['upload_file_name'] = $file_name;
                }
            }
            
            echo wp_json_encode($return_data);
            exit();
        }
        
        /**
         * Load customers module view file
         *
         * @return void
         */
        function bookingpress_dynamic_load_customers_view_func()
        {
            //if(!isset($_GET['z'])) return;           
            $bookingpress_load_file_name = __DIR__ . '/mod_view_historias.php';
            $bookingpress_load_file_name = apply_filters('bookingpress_modify_stories_view_file_path', $bookingpress_load_file_name);

            include $bookingpress_load_file_name;
            
        }
        
        /**
         * Load customers module helper variables
         *
         * @return void
         */
        function bookingpress_customer_dynamic_helper_vars_func()
        {
            global $bookingpress_global_options;
            $bookingpress_options     = $bookingpress_global_options->bookingpress_global_options();
            $bookingpress_locale_lang = $bookingpress_options['locale'];
            ?>
            var lang = ELEMENT.lang.<?php echo esc_html($bookingpress_locale_lang); ?>;
            ELEMENT.locale(lang)
            <?php
            do_action('bookingpress_customer_add_dynamic_helper_vars');
        }
        
        /**
         * Add more dynamic data fields to customer module
         *
         * @return void
         */
        function bookingpress_customer_dynamic_data_fields_func()
        {
            global $bookingpress_customer_vue_data_fields,$BookingPress;
            $bpa_nonce = wp_create_nonce('bpa_wp_nonce');
            $bookingpress_customer_vue_data_fields['customer']['_wpnonce'] = $bpa_nonce;
            $bookingpress_customer_vue_data_fields['bookingpress_loading'] = false;
            $bookingpress_customer_vue_data_fields['wordpress_user_id'] = '';

            // pagination data
            $bookingpress_default_perpage_option                            = $BookingPress->bookingpress_get_settings('per_page_item', 'general_setting');
            $bookingpress_customer_vue_data_fields['perPage']               = ! empty($bookingpress_default_perpage_option) ? $bookingpress_default_perpage_option : '10';
            $bookingpress_customer_vue_data_fields['pagination_selected_length'] = ! empty($bookingpress_default_perpage_option) ? $bookingpress_default_perpage_option : '10';
      
            $bookingpress_phone_country_option = $BookingPress->bookingpress_get_settings('default_phone_country_code', 'general_setting');
            $bookingpress_customer_vue_data_fields['customer']['customer_phone_country'] = $bookingpress_phone_country_option;

            $bookingpress_customer_vue_data_fields['bookingpress_tel_input_props'] = array(
                'defaultCountry' => $bookingpress_phone_country_option,
                'inputOptions' => array(
                    'placeholder' => '',
                ),
                'validCharactersOnly' => true,
            );
            $bookingpress_customer_vue_data_fields['vue_tel_mode'] = 'international';
            $bookingpress_customer_vue_data_fields['vue_tel_auto_format'] = true;

            $bookingpress_customer_vue_data_fields['selected_patient'] = null;
            $bookingpress_customer_vue_data_fields['histories'] = array();
            $bookingpress_customer_vue_data_fields['histories_loading'] = false;
            $bookingpress_customer_vue_data_fields['dni_query'] = '';
            $bookingpress_customer_vue_data_fields['patient_searching'] = false;
            $bookingpress_customer_vue_data_fields['current_user_id'] = get_current_user_id();
            $bookingpress_customer_vue_data_fields['history_form'] = array(
                'antecedentes' => '',
                'diagnostico' => '',
                'medicamentos' => '',
                'observaciones' => '',
            );
 
            $bookingpress_customer_vue_data_fields['bpa_wp_nonce'] = wp_create_nonce('bpa_wp_nonce');
            $bookingpress_customer_vue_data_fields['history_saving'] = false;
            $bookingpress_customer_vue_data_fields = apply_filters('bookingpress_modify_customer_data_fields', $bookingpress_customer_vue_data_fields);
            echo wp_json_encode($bookingpress_customer_vue_data_fields);
        }
        
        /**
         * Dynamic onload methods for customer module
         *
         * @return void
         */
        function bookingpress_customer_dynamic_on_load_methods_func()
        {
            ?>
            this.loadCustomers();
            <?php
            do_action('bookingpress_customer_add_dynamic_on_load_method');
        }
        
        /**
         * Customer module methods / functions
         *
         * @return void
         */
        function bookingpress_customer_dynamic_vue_methods_func()
        {
            global $BookingPress,$bookingpress_notification_duration;
            $bookingpress_phone_country_option = $BookingPress->bookingpress_get_settings('default_phone_country_code', 'general_setting');
            ?>
            toggle_sepia(){
                if(document.querySelector('.historias_y_pacientes').style.filter == 'sepia(0.7)'){
                    document.querySelector('.historias_y_pacientes').style.filter='';
                }else{
                    document.querySelector('.historias_y_pacientes').style.filter='sepia(0.7)';
                }    
            },
            toggleBusy() {
                if(this.is_display_loader == '1'){
                    this.is_display_loader = '0'
                }else{
                    this.is_display_loader = '1'
                }
            },
            handleSelectionChange(val) {
                this.multipleSelection = [];
                const customer_items_obj = val
                Object.values(customer_items_obj).forEach(val => {
                    this.multipleSelection.push({customer_id : val.customer_id})
                    this.bulk_action = 'bulk_action';
                });
            },
            handleSizeChange(val) {
                this.perPage = val
                this.loadCustomers()
            },
            handleCurrentChange(val) {
                this.currentPage = val;
                this.loadCustomers()
            },        
            changeCurrentPage(perPage) {
                var total_item = this.totalItems;
                var recored_perpage = perPage;
                var select_page =  this.currentPage;                
                var current_page = Math.ceil(total_item/recored_perpage);
                if(total_item <= recored_perpage ) {
                    current_page = 1;
                } else if(select_page >= current_page ) {
                    
                } else {
                    current_page = select_page;
                }
                return current_page;
            },
            changePaginationSize(selectedPage) {     
                var total_recored_perpage = selectedPage;
                var current_page = this.changeCurrentPage(total_recored_perpage);                                        
                this.perPage = selectedPage;                    
                this.currentPage = current_page;    
                this.loadCustomers()
            },
            loadCustomers(){
                this.getCustomerDetailsTEST(1);
                return;
            },
            async loadCustomersOrig() {
                this.toggleBusy(); 
                const vm = this;              
                var bookingpress_module_type = bookingpress_dashboard_filter_start_date = bookingpress_dashboard_filter_end_date = selected_date_range = ''; 
                bookingpress_module_type = sessionStorage.getItem("bookingpress_module_type");                
                bookingpress_dashboard_filter_start_date = sessionStorage.getItem("bookingpress_dashboard_filter_start_date");
                bookingpress_dashboard_filter_end_date = sessionStorage.getItem("bookingpress_dashboard_filter_end_date");
                sessionStorage.removeItem("bookingpress_module_type");
                sessionStorage.removeItem("bookingpress_dashboard_filter_start_date");
                sessionStorage.removeItem("bookingpress_dashboard_filter_end_date");                    
                if(bookingpress_module_type != '' && bookingpress_module_type == 'customer' && bookingpress_dashboard_filter_start_date != '' && bookingpress_dashboard_filter_end_date != '' ) {                        
                    selected_date_range = [bookingpress_dashboard_filter_start_date,bookingpress_dashboard_filter_end_date];
                    vm.customer_search_range = selected_date_range;
                }                    
                var bookingpress_search_data = { search_name: this.customerSearch, selected_date_range: selected_date_range }
                var postData = { action:'bookingpress_get_customers', perpage:this.perPage, currentpage:this.currentPage, search_data: bookingpress_search_data,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' };
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
                .then( function (response) {
                    this.toggleBusy();
                    // Deduplicate by DNI so the same document doesn't appear twice
                    const uniqueByDni = [];
                    const seenDni = new Set();
                    (response.data.items || []).forEach(row => {
                        const dniVal = (row && row.dni != null) ? String(row.dni).trim() : '';
                        if (dniVal !== '') {
                            if (!seenDni.has(dniVal)) {
                                seenDni.add(dniVal);
                                uniqueByDni.push(row);
                            }
                        } else {
                            // If there's no DNI, keep the row as-is (do not group empties)
                            uniqueByDni.push(row);
                        }
                    });
                    this.items = uniqueByDni;
                    this.totalItems = uniqueByDni.length;
                }.bind(this) )
                .catch( function (error) {
                    console.log(error);
                });
            },
            open_add_customer_modal(){                
                const vm2 = this
                vm2.resetForm()
                vm2.open_customer_modal = true
            },
            get_wordpress_users(query) {
                const vm2 = this	
                if (query !== '') {
                    vm2.bookingpress_loading = true;                    
                    var customer_action = { action:'bookingpress_get_wpuser',search_user_str:query,wordpress_user_id:vm2.wordpress_user_id,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }                    
                    axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                    .then(function(response){
                        vm2.bookingpress_loading = false;
                        vm2.wpUsersList = response.data.users
                    }).catch(function(error){
                        console.log(error)
                    });
                } else {
                    vm2.wpUsersList = [];
                }	
            },
            saveCustomerDetails(){
                const vm2 = this
                vm2.$refs['customer'].validate((valid) => {
                    if(valid){
                        vm2.is_disabled = true
                        vm2.is_display_save_loader = '1'
                        var postdata = vm2.customer;
                        postdata.action = 'bookingpress_add_customer';
                        postdata._wpnonce = '<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce') ); ?>'
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                        .then(function(response){
                            vm2.is_disabled = false
                            vm2.is_display_save_loader = '0'                            
                            vm2.$notify({
                                title: response.data.title,
                                message: response.data.msg,
                                type: response.data.variant,
                                customClass: response.data.variant+'_notification',
                                duration:<?php echo intval($bookingpress_notification_duration); ?>,
                            });
                            if (response.data.variant == 'success') {
                                vm2.open_customer_modal = false
                                vm2.customer.update_id = response.data.customer_id
                                vm2.loadCustomers()
                            }
                            vm2.savebtnloading = false
                        }).catch(function(error){
                            vm2.is_disabled = false
                            vm2.is_display_loader = '0'
                            console.log(error);
                            vm2.$notify({
                                title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                                message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                                type: 'error',
                                customClass: 'error_notification',
                                duration:<?php echo intval($bookingpress_notification_duration); ?>,
                            });
                        });
                    }
                })
            },
            editCustomerDetails(edit_id){
                const vm2 = this
                vm2.customer.update_id = edit_id
                vm2.open_add_customer_modal()
                var customer_action = { action: 'bookingpress_get_edit_user', edit_id: edit_id,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                .then(function(response){
                    if(response.data.variant == 'success'){
                        var edit_customer_details = response.data.edit_data;
                        vm2.customer.update_id  = edit_customer_details.bookingpress_customer_id
                        if(edit_customer_details.bookingpress_wpuser_id != '') {                        
                            vm2.customer.wp_user = parseInt(edit_customer_details.bookingpress_wpuser_id);        
                        } else {                            
                            vm2.customer.wp_user = '';
                        }
                        vm2.wordpress_user_id = vm2.customer.wp_user;
                        vm2.customer.username = edit_customer_details.bookingpress_user_name
                        vm2.customer.firstname = edit_customer_details.bookingpress_user_firstname
                        vm2.customer.lastname = edit_customer_details.bookingpress_user_lastname
                        vm2.customer.email = edit_customer_details.bookingpress_user_email
                        vm2.customer.phone = edit_customer_details.bookingpress_user_phone
                        //vm2.customer.gender = edit_customer_details.gender
                        //vm2.customer.birthdate = edit_customer_details.birthdate
                        vm2.customer.note = edit_customer_details.note
                        //vm2.customer.avatar_list = edit_customer_details.avatar_list
                        vm2.customer.avatar_url = edit_customer_details.avatar_url
                        vm2.customer.avatar_name = edit_customer_details.avatar_name
                        vm2.customer.customer_phone_country = edit_customer_details.bookingpress_user_country_phone
                        vm2.bookingpress_tel_input_props.defaultCountry = edit_customer_details.bookingpress_user_country_phone;
                        vm2.$refs.bpa_tel_input_field._data.activeCountryCode = edit_customer_details.bookingpress_user_country_phone;
                        vm2.wpUsersList = edit_customer_details.wp_user_list
                        <?php do_action('bookingpress_customer_edit_details') ?>
                    } else {
                        vm2.$notify({
                            title: response.data.title,
                            message: response.data.msg,
                            type: response.data.variant,
                            customClass: response.data.variant+'_notification',
                            duration:<?php echo intval($bookingpress_notification_duration); ?>,
                        });                        
                    }
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                });
            },
            deleteCustomer(delete_id){
                const vm2 = this
                var customer_action = { action: 'bookingpress_delete_customer', delete_id: delete_id,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                .then(function(response){
                    vm2.$notify({
                        title: response.data.title,
                        message: response.data.msg,
                        type: response.data.variant,
                        customClass: response.data.variant+'_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                    vm2.loadCustomers()
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                });
            },
            bulk_actions() {
                const vm = new Vue()
                const vm2 = this
                if(this.bulk_action == "bulk_action")
                {
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Please select any action.', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                }
                else
                {
                    if(this.multipleSelection.length > 0 && this.bulk_action == "delete")
                    {
                        var customer_delete_data = {
                            action: 'bookingpress_bulk_customer',
                            delete_ids: this.multipleSelection,
                            bulk_action: 'delete',
                            _wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>'
                        }
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_delete_data ) )
                        .then(function(response){
                            vm2.$notify({
                                title: response.data.title,
                                message: response.data.msg,
                                type: response.data.variant,
                                customClass: response.data.variant+'_notification',
                                duration:<?php echo intval($bookingpress_notification_duration); ?>,

                            });
                            vm2.loadCustomers();
                            vm2.multipleSelection = [];
                            vm2.totalItems = vm2.items.length
                        }).catch(function(error){
                            console.log(error);
                            vm2.$notify({
                                title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                                message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                                type: 'error',
                                customClass: 'error_notification',
                                duration:<?php echo intval($bookingpress_notification_duration); ?>,
                            });
                        });
                    }
                    else
                    {    
                        if(this.multipleSelection.length == 0) {                                
                            vm2.$notify({
                                title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                                message: '<?php esc_html_e('Please select one or more records.', 'bookingpress-appointment-booking'); ?>',
                                type: 'error',
                                customClass: 'error_notification',
                                duration:<?php echo intval($bookingpress_notification_duration); ?>,
                            });
                        }else{
            <?php do_action('bookingpress_customer_dynamic_bulk_action'); ?>
                        }                            
                    }
                }
            },
            resetForm() {                        
                const vm2 = this                
                vm2.customer.update_id = 0;
                vm2.customer.username = '';
                vm2.customer.wp_user = '';
                vm2.customer.firstname = '';
                vm2.customer.lastname = '';
                vm2.customer.email = '';
                vm2.customer.phone = '';
                vm2.customer.note = '';
                vm2.customer.password = '';
                vm2.customer.avatar_list = [];
                vm2.customer.avatar_url = '';
                vm2.customer.avatar_name = '';
                vm2.customer.customer_phone_country = vm2.bookingpress_tel_input_props.defaultCountry;
                vm2.wordpress_user_id = '';
                vm2._wpnonce = '<?php wp_create_nonce('bpa_wp_nonce'); ?>';
                <?php do_action('bookingpress_reset_customer_fields_data') ?>
            },
            resetFilter(){
                const vm2 = this
                vm2.customerSearch =''; 
                vm2.customer_search_range = '';                          
                vm2.loadCustomers()
            },
            closeCustomerModal() {
                const vm2 = this
                vm2.$refs['customer'].resetFields()
                vm2.open_customer_modal = false
                vm2.resetForm()
            },
            bookingpress_upload_customer_avatar_func(response, file, fileList){
                const vm2 = this
                if(response != ''){
                    vm2.customer.avatar_url = response.upload_url
                    vm2.customer.avatar_name = response.upload_file_name
                }
            },
            bookingpress_image_upload_limit(files, fileList){
                const vm2 = this
                    if(vm2.customer.avatar_url != ''){
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Multiple files not allowed', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                }
            },
            bookingpress_image_upload_err(err, file, fileList){
                const vm2 = this
                var bookingpress_err_msg = '<?php esc_html_e('Something went wrong', 'bookingpress-appointment-booking'); ?>';
                if(err != '' || err != undefined){
                    bookingpress_err_msg = err
                }
                vm2.$notify({
                    title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                    message: bookingpress_err_msg,
                    type: 'error',
                    customClass: 'error_notification',
                    duration:<?php echo intval($bookingpress_notification_duration); ?>,
                });
            },
            checkUploadedFile(file){
                const vm2 = this
                if(file.type != 'image/jpeg' && file.type != 'image/png' && file.type != 'image/webp'){
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Please upload jpg/png file only', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                    return false
                }else{
                    var bpa_image_size = parseInt(file.size / 1000000);
                    if(bpa_image_size > 1){
                        vm2.$notify({
                            title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                            message: '<?php esc_html_e('Please upload maximum 1 MB file only', 'bookingpress-appointment-booking'); ?>',
                            type: 'error',
                            customClass: 'error_notification',
                            duration:<?php echo intval($bookingpress_notification_duration); ?>,
                        });                    
                        return false
                    }
                }
            },
            bookingpress_remove_customer_avatar() {
                const vm = this
                var upload_url = vm.customer.avatar_url
                var upload_filename = vm.customer.avatar_name
                var postData = { action:'bookingpress_remove_customer_avatar', upload_file_url: upload_url,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' };
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
                .then( function (response) {
                    vm.customer.avatar_url = ''
                    vm.customer.avatar_name = ''
                    vm.$refs.avatarRef.clearFiles()
                }.bind(vm) )
                .catch( function (error) {
                    console.log(error);
                });
            },            
            closeBulkAction(){
                this.$refs.multipleTable.clearSelection();
                this.bulk_action = 'bulk_action';
            },
            select_date(selected_value) {
                const vm2 = this
                vm2.customer.birthdate = this.get_formatted_date(this.customer.birthdate)
            },
            get_formatted_date(iso_date){

                if( true == /(\d{2})\T/.test( iso_date ) ){
                    let date_time_arr = iso_date.split('T');
                    return date_time_arr[0];
                }
                var __date = new Date(iso_date);
                var __year = __date.getFullYear();
                var __month = __date.getMonth()+1;
                var __day = __date.getDate();
                if (__day < 10) {
                    __day = '0' + __day;
                }
                if (__month < 10) {
                    __month = '0' + __month;
                }
                var formatted_date = __year+'-'+__month+'-'+__day;
                return formatted_date;
            },
            customer_details_save(){
                this.customer_detail_save = !this.customer_detail_save
            },
            bookingpress_get_existing_user_details(bookingpress_selected_user_id){
                const vm = this
                if(bookingpress_selected_user_id != 'add_new') {
                    var postData = { action:'bookingpress_get_existing_users_details', existing_user_id: bookingpress_selected_user_id, _wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' };
                    axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
                    .then( function (response) {
                        if(response.data.user_details != '' || response.data.user_details != undefined){
                            vm.customer.username  = response.data.user_details.username
                            vm.customer.firstname = response.data.user_details.user_firstname
                            vm.customer.lastname = response.data.user_details.user_lastname
                            vm.customer.email = response.data.user_details.user_email
                        }
                    }.bind(vm) )
                    .catch( function (error) {
                        console.log(error);
                    });
                }
            },
            bookingpress_phone_country_change_func(bookingpress_country_obj){
                const vm = this
                var bookingpress_selected_country = bookingpress_country_obj.iso2
                let exampleNumber = window.intlTelInputUtils.getExampleNumber( bookingpress_selected_country, true, 1 );
                if( '' != exampleNumber ){
                    vm.bookingpress_tel_input_props.inputOptions.placeholder = exampleNumber;
                }
                vm.customer.customer_phone_country = bookingpress_selected_country
                vm.customer.customer_phone_dial_code = bookingpress_country_obj.dialCode;
            },
            selectPatient(row){
                // Highlight is handled by CSS in template; here we set state and load histories
                //this.selected_patient = row;
                this.histories = [];
                this.histories_loading = true;
                this.getCustomerDetails(row.customer_id);
                this.loadPatientHistories(row);
            },
            loadPatientHistories(row){
                const vm = this;
                try{
                    const dniRaw = row && (row.dni || (row.bpa_customer_field && row.bpa_customer_field.text_C6kufq) || '');
                    const dni = dniRaw ? String(dniRaw).trim().replace(/\D+/g,'') : '';
                    const data = new URLSearchParams();
                    data.append('action','bookingpress_get_patient_histories');
                    if(vm.customer && vm.customer.bpa_wp_nonce){ data.append('bpa_wp_nonce', vm.bpa_wp_nonce); }
                    if(row && row.customer_id){ data.append('customer_id', row.customer_id); }
                    if(dni){ data.append('dni', dni); }
                    data.append('_wpnonce', vm.bpa_wp_nonce);
                    axios.post(ajaxurl, data).then(function(res){
                        const histories = (res && res.data && Array.isArray(res.data.histories)) ? res.data.histories : [];
                        vm.histories = histories;
                    }).catch(function(err){
                        console.error(err);
                        if(vm.$notify){ vm.$notify({ type: 'error', title: 'Error', message: 'No se pudieron cargar las historias' }); }
                    }).finally(function(){
                        vm.histories_loading = false;
                    });
                }catch(e){
                    console.error(e);
                    this.histories_loading = false;
                }
            },
            clearSearch(){
                this.dni_query = '';
                this.selected_patient = null;
                this.histories = [];
                this.loadCustomers()
            },
            searchByDni(){
                const vm = this;
                const dni = (vm.dni_query || '').toString().trim().replace(/\D+/g,'');
                if(!dni){
                    if(vm.$notify){ vm.$notify({ type:'warning', title:'Atención', message:'Ingrese un DNI válido' }); }
                    return;
                }
                vm.patient_searching = true;
                const data = new URLSearchParams();
                data.append('action','bookingpress_find_customer_by_dni');
                if(vm.bpa_wp_nonce){ data.append('bpa_wp_nonce', vm.bpa_wp_nonce); }
                data.append('dni', dni);
                axios.post(ajaxurl, data).then(function(res){
                    const row = res && res.data && res.data.items ? res.data.items : null;
                    if(row){
                        console.log( row );
                        vm.items = row;
                        vm.totalItems = res.data.total;
                        //vm.selectPatient(row);
                    }else{
                        vm.selected_patient = null;
                        vm.histories = [];
                        if(vm.$notify){ vm.$notify({ type:'info', title:'Sin resultados', message:'No se encontró paciente con ese DNI' }); }
                    }
                }).catch(function(err){
                    console.error(err);
                    if(vm.$notify){ vm.$notify({ type:'error', title:'Error', message:'No se pudo buscar el paciente' }); }
                }).finally(function(){ vm.patient_searching = false; });
            },
            submitHistory(){
                // TODO: Implementar guardado de historia con campos del formulario
                if(this.$notify){ this.$notify({ type:'info', title:'Pendiente', message:'Guardado de historia no implementado aún' }); }
            },
            resetHistoryForm(){
                this.history_form = {
                    antecedentes: '',
                    diagnostico: '',
                    medicamentos: '',
                    observaciones: ''
                };
            },
            bp_hc_expand_toggle(){
                if( typeof document.querySelector('.bookingpress_page_wrapper')=='undefined' ) return;
                
                this.bp_hc_is_expand = ! this.bp_hc_is_expand;
                if( this.bp_hc_is_expand ){
                    document.querySelector('.bookingpress_page_wrapper').classList.add('bp_hc_is_expand');
                }else{
                    document.querySelector('.bookingpress_page_wrapper').classList.remove('bp_hc_is_expand');
                }
            },
            getCustomerDetails(edit_id){
                const vm2 = this
                const vmx = {}
                //vm2.customer.update_id = edit_id
                //vm2.open_add_customer_modal()
                var customer_action = { action: 'bookingpress_get_edit_user', edit_id: edit_id,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                .then(function(response){
                    if(response.data.variant == 'success'){
                        var edit_customer_details = response.data.edit_data;
                        vmx.customer_id  = edit_customer_details.bookingpress_customer_id
                        if(edit_customer_details.bookingpress_wpuser_id != '') {                        
                            vmx.customer_wp_user = parseInt(edit_customer_details.bookingpress_wpuser_id);        
                        } else {                            
                            vmx.customer_wp_user = '';
                        }
                        
                        
                        vmx.wordpress_user_id = vmx.customer_wp_user;
                        vmx.customer_username = edit_customer_details.bookingpress_user_name
                        vmx.customer_firstname = edit_customer_details.bookingpress_user_firstname
                        vmx.customer_lastname = edit_customer_details.bookingpress_user_lastname
                        vmx.customer_email = edit_customer_details.bookingpress_user_email
                        vmx.customer_phone = edit_customer_details.bookingpress_user_phone
                        //vmx.customer_gender = edit_customer_details.gender
                        
                        vmx.customer_note = edit_customer_details.note
                        //vmx.customer.avatar_list = edit_customer_details.avatar_list
                        vmx.customer_avatar = edit_customer_details.avatar_url
                        vmx.customer_avatar_name = edit_customer_details.avatar_name
                        vmx.customer_phone_country = edit_customer_details.bookingpress_user_country_phone
                        
                        vmx.customer_metadata = edit_customer_details.customer_metadata;
                        
                        vmx.wpUsersList = edit_customer_details.wp_user_list;
                        
                        //vm2.bookingpress_tel_input_props.defaultCountry = edit_customer_details.bookingpress_user_country_phone;
                        //vm2.$refs.bpa_tel_input_field._data.activeCountryCode = edit_customer_details.bookingpress_user_country_phone;
                        
                        vmx.dni = edit_customer_details.customer_metadata[ vm2.dni_meta_key ]
                        vm2.selected_patient = vmx
                        
                        console.log('selected patient')
                        console.log(vm2.selected_patient);
                        
                        <?php do_action('bphc_customer_edit_details') ?>
                        
                    } else {
                        vm2.$notify({
                            title: response.data.title,
                            message: response.data.msg,
                            type: response.data.variant,
                            customClass: response.data.variant+'_notification',
                            duration:<?php echo intval($bookingpress_notification_duration); ?>,
                        });                        
                    }
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                });
            },
async getCustomerDetailsTEST(edit_id){
                const vm2 = this
                const vmx = {}
response = {data:{}};
response.data = {
    "variant": "success",
    "title": "El éxito",
    "msg": "Editar los datos recuperados con éxito",
    "edit_data": {
        "bookingpress_customer_id": "43",
        "bookingpress_wpuser_id": "",
        "bookingpress_user_login": "cv.msuarez@gmail.com",
        "bookingpress_user_status": "1",
        "bookingpress_user_type": "2",
        "bookingpress_user_name": "cv.msuarez@gmail.com",
        "bookingpress_user_firstname": "MAXIMILIANO",
        "bookingpress_user_lastname": "SUAREZ",
        "bookingpress_customer_full_name": "",
        "bookingpress_user_email": "cv.msuarez@gmail.com",
        "bookingpress_user_phone": "92 241 133",
        "bookingpress_user_country_phone": "AR",
        "bookingpress_user_country_dial_code": "54",
        "bookingpress_user_timezone": "-03:00",
        "bookingpress_created_at": "1",
        "bookingpress_created_by": "1",
        "bookingpress_user_created": "2024-08-17 23:35:56",
        "note": "",
        "avatar_name": "1756846233_1756846230_alien_up.jpg",
        "avatar_url_2": "https://foatconcept.com.ar/turnos/wp-content/uploads/bookingpress/1756846233_1756846230_alien_up.jpg",
        "avatar_url": "https://foatconcept.com.ar/turnos/wp-content/uploads/2025/08/logo-svg.svg",
        "customer_metadata": {
            "text_C6kufq": "999888777",
            "text_o9q4Cr": "_",
            "obra_soc_seguros": "PARANÁ SALUD",
            "persona_genero": "Masculino",
            "persona_fecha": "2000-11-01T03:00:00.000Z",
            "persona_dir": "Bv. Oroño 123",
            "persona_alergias": "",
            "persona_city": "Rosario",
            "persona_provincia": "Santa Fe"
        },
        
    }
};
                
                    if(response.data.variant == 'success'){
                        var edit_customer_details = response.data.edit_data;
                        vmx.customer_id  = edit_customer_details.bookingpress_customer_id
                        if(edit_customer_details.bookingpress_wpuser_id != '') {                        
                            vmx.customer_wp_user = parseInt(edit_customer_details.bookingpress_wpuser_id);        
                        } else {                            
                            vmx.customer_wp_user = '';
                        }
                        
                        
                        vmx.wordpress_user_id = vmx.customer_wp_user;
                        vmx.customer_username = edit_customer_details.bookingpress_user_name
                        vmx.customer_firstname = edit_customer_details.bookingpress_user_firstname
                        vmx.customer_lastname = edit_customer_details.bookingpress_user_lastname
                        vmx.customer_email = edit_customer_details.bookingpress_user_email
                        vmx.customer_phone = edit_customer_details.bookingpress_user_phone
                        vmx.customer_country_dial_code = edit_customer_details.bookingpress_user_country_dial_code;
                        vmx.customer_phone_country = edit_customer_details.bookingpress_user_country_phone
                        
                        //vmx.customer_gender = edit_customer_details.gender
                        
                        vmx.customer_note = edit_customer_details.note
                        //vmx.customer.avatar_list = edit_customer_details.avatar_list
                        vmx.customer_avatar = edit_customer_details.avatar_url
                        vmx.customer_avatar_name = edit_customer_details.avatar_name
                        
                        
                        vmx.customer_metadata = edit_customer_details.customer_metadata;
                        
                        vmx.wpUsersList = edit_customer_details.wp_user_list;
                        
                        //vm2.bookingpress_tel_input_props.defaultCountry = edit_customer_details.bookingpress_user_country_phone;
                        //vm2.$refs.bpa_tel_input_field._data.activeCountryCode = edit_customer_details.bookingpress_user_country_phone;
                        
                        vmx.dni = edit_customer_details.customer_metadata[ vm2.dni_meta_key ]
                        
                        vm2.bp_hc_HistoriesSummary = vm2.bp_hc_defaultHistoriesSummary;
                        vmx.historySummary = vm2.bp_hc_defaultHistoriesSummary[0];
                        
                        vm2.selected_patient = vmx;
                        
                        if(vmx.historySummary.consultation_data.medicamentos.length){
                            for(item in vmx.historySummary.consultation_data.medicamentos){
                            await this.displayFileSize(vmx.historySummary.consultation_data.medicamentos[item]);
                            }
                        }
                        
                        
                        console.log('selected patient')
                        console.log(vm2.selected_patient);
                        return;
                                                
                    } else {
                        vm2.$notify({
                            title: response.data.title,
                            message: response.data.msg,
                            type: response.data.variant,
                            customClass: response.data.variant+'_notification',
                            duration:1500,
                        });                        
                    }
                //vm2.customer.update_id = edit_id
                //vm2.open_add_customer_modal()
                var customer_action = { action: 'bookingpress_get_edit_user', edit_id: edit_id,_wpnonce:'2cb9743d73' }
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                .then(function(response){
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: 'Error',
                        message: 'Algo salió mal..',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:1500,
                    });
                });
            },
async getFileSize(url) {
  try {
    const response = await fetch(url, { method: 'HEAD' });
    const contentLength = response.headers.get('content-length');
    if (contentLength) {
      return parseInt(contentLength, 10); // Size in bytes
    }
    return null; // Content-Length header not found
  } catch (error) {
    console.error("Error fetching file size:", error);
    return null;
  }
},

async displayFileSize(item=null) {
  let tempItem = item;
  let url="";
  url = 'https://foatconcept.com.ar/turnos/wp-content/uploads/bookingpress/1756846233_1756846230_alien_up.jpg';
  if( typeof item.url == 'string'){
    url = item.url
  }
  console.log('Quitamos llamada a lectura de archivos');
  //let size = await this.getFileSize(url);
  let size = 7696;
  if (size !== null) {
    console.log(`File size: ${size} bytes`);
    let snum = size / 1024;
    if( snum > 1024 ){
        snum = snum /1024;
        size = snum.toFixed(2) +'MB';
    }else{
        size = snum.toFixed(2) +'KB';
    }
    tempItem.size = size;
  } else {
    console.log("Could not retrieve file size.");
    tempItem.size = "SinDatos";
  }
},


            <?php
            do_action('bookingpress_customer_add_dynamic_vue_methods');
            do_action('bookingpress_stories_add_dynamic_vue_methods');
        }
        
        /**
         * Get all customers details for customer module
         *
         * @return void
         */
        function bookingpress_get_customer_details( $bphc_For_customer = [] )
        {
            global $wpdb, $tbl_bookingpress_customers, $tbl_bookingpress_appointment_bookings,$BookingPress,$bookingpress_global_options;
            $response              = array();

            if( empty($bphc_For_customer) ):
                    
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
                            $bookingpress_search_query .= " (bookingpress_user_login LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_email LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_customer_full_name LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_firstname LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_lastname LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_phone LIKE '%{$bookingpress_search_customer_val}%')";
        
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
        
                    $total_customers = $wpdb->get_results("SELECT cs.bookingpress_customer_id FROM {$tbl_bookingpress_customers} as cs {$bookingpress_search_query_join} WHERE cs.bookingpress_user_type = 2 AND cs.bookingpress_user_status = 1 {$bookingpress_search_query} ",ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                    $get_customers = $wpdb->get_results("SELECT cs.* FROM {$tbl_bookingpress_customers} as cs {$bookingpress_search_query_join} WHERE cs.bookingpress_user_type = 2 AND cs.bookingpress_user_status = 1 {$bookingpress_search_query} order by bookingpress_customer_id DESC LIMIT {$offset} , {$perpage}", ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm

            else:
                $get_customers = $bphc_For_customer;
                $total_customers = array_keys($bphc_For_customer);
                
            endif;
            
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
         * Ajax request for get wordpress user except user who has role of administrator, bookingpress-staffmember, bookingpress-customer
         *
         * @return void
         */
        function bookingpress_get_wpuser()
        {
            global $wpdb, $BookingPress, $tbl_bookingpress_customers;
            $response              = array();

            $bpa_check_authorization = $this->bpa_check_authentication( 'search_user', true, 'bpa_wp_nonce' );
            
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
            $search_user_str = ! empty( $_REQUEST['search_user_str'] ) ? sanitize_text_field( $_REQUEST['search_user_str'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
            $wordpress_user_id = ! empty( $_REQUEST['wordpress_user_id'] ) ? intval( $_REQUEST['wordpress_user_id'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
            
			if(!empty($search_user_str)) {                    
                $args                = array(
                    'search' => '*'.$search_user_str.'*',
					'fields' => array( 'user_login','id'),
                    'role__not_in' => array( 'administrator','bookingpress-staffmember','bookingpress-customer'),
                );
                $wpusers             = get_users($args);
                $bookingpress_existing_user_data = $existing_users_data = array();
                if(!empty($wordpress_user_id)) {
                    $user_data = '';
                    $user_data = get_userdata($wordpress_user_id);                
                    if(!empty($user_data)) {        
                        $existing_users_data[] = array(
                            'value' => $user_data->ID,				
                            'label' => $user_data->user_login,
                        );                         
                    }                                
                }
                if (!empty($wpusers) ) {
                    foreach ( $wpusers as $wpuser ) {
                        $user                  = array();
                        $user['value']         = $wpuser->id;
                        $user['label']         = $wpuser->user_login;
                        $existing_users_data[] = $user;
                    }
                }         
                $bookingpress_existing_user_data[] = array(
                    'category'     => esc_html__('Select Existing User', 'bookingpress-appointment-booking'),
                    'wp_user_data' => $existing_users_data,
                );
                $response['variant']               = 'success';
                $response['users']                 = $bookingpress_existing_user_data;
                $response['title']                 = esc_html__('Success', 'bookingpress-appointment-booking');
                $response['msg']                   = esc_html__('Customer Data.', 'bookingpress-appointment-booking');
            }     
            wp_send_json($response);
        }
                
        /**
         * Ajax request for add customer from backend
         *
         * @return void
         */
        function bookingpress_add_customer()
        {
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
                $bookingpress_existing_user_id = ! empty($_REQUEST['wp_user']) ? trim(sanitize_text_field($_REQUEST['wp_user'])) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_username         = ! empty($_REQUEST['username']) ? sanitize_text_field($_REQUEST['username']) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_firstname        = ! empty($_REQUEST['firstname']) ? trim(sanitize_text_field($_REQUEST['firstname'])) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_lastname         = ! empty($_REQUEST['lastname']) ? trim(sanitize_text_field($_REQUEST['lastname'])) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_email            = ! empty($_REQUEST['email']) ? sanitize_email($_REQUEST['email']) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_user_pass        = wp_generate_password(12, false);
             // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['search_data'] contains password and will be hashed using wp_create_user function. 
                $bookingpress_password = ! empty($_REQUEST['password']) ? $_REQUEST['password'] : $bookingpress_user_pass;

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
                    $bookingpress_user_name = ! empty($bookingpress_firstname) ? $bookingpress_firstname : $bookingpress_email;
                }

                if (empty($bookingpress_existing_user_id) ) {
                    $bookingpress_customer_details = array(
                        'bookingpress_customer_name'      => $bookingpress_user_name,
                        'bookingpress_customer_phone'     => $bookingpress_customer_phone,
                        'bookingpress_customer_firstname' => $bookingpress_firstname,
                        'bookingpress_customer_lastname'  => $bookingpress_lastname,
                        'bookingpress_customer_country'   => $bookingpress_customer_country,
                        'bookingpress_customer_email'     => $bookingpress_email,
                        'bookingpress_customer_note'      => $bookingpress_note,
                        'bookingpress_customer_phone_dial_code' => $bookingpress_customer_dial_code,
                    );

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

        
        /**
         * Delete customer function
         *
         * @param  mixed $delete_id   Customer ID which you want to delete
         * @return void
         */
        function bookingpress_delete_customer( $delete_id )
        {
            global $wpdb, $tbl_bookingpress_customers,$tbl_bookingpress_appointment_bookings,$tbl_bookingpress_payment_logs;
            $response              = array();

            $bpa_check_authorization = $this->bpa_check_authentication( 'delete_customer', true, 'bpa_wp_nonce' );
            
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
            $return              = false;

            if (! empty($_POST['delete_id']) || intval($delete_id) ) { // phpcs:ignore WordPress.Security.NonceVerification
                $delete_customer_id = ! empty($_POST['delete_id']) ? intval($_POST['delete_id']) : intval($delete_id); // phpcs:ignore WordPress.Security.NonceVerification
                do_action('bookingpress_before_delete_customer', $delete_customer_id);
                if (! empty($delete_customer_id) ) {
                    $wpdb->delete( $tbl_bookingpress_customers, array( 'bookingpress_customer_id' => $delete_customer_id ) );
                    $wpdb->delete($tbl_bookingpress_appointment_bookings, array( 'bookingpress_customer_id' => $delete_customer_id ));
                    $wpdb->delete($tbl_bookingpress_payment_logs, array( 'bookingpress_customer_id' => $delete_customer_id ));

                    $response['variant'] = 'success';
                    $response['title']   = esc_html__('Success', 'bookingpress-appointment-booking');
                    $response['msg']     = esc_html__('Customer has been deleted successfully.', 'bookingpress-appointment-booking');

                    $return = true;
                }
            }
            

            if (! empty($_POST['action']) && sanitize_text_field($_POST['action']) == 'bookingpress_delete_customer' ) { // phpcs:ignore
                echo wp_json_encode($response);
                exit();
            }

            return $return;
        }

        
        /**
         * Customer module bulk actions
         *
         * @return void
         */
        function bookingpress_bulk_action()
        {
            global $BookingPress;
            $response              = array();

            $bpa_check_authorization = $this->bpa_check_authentication( 'delete_customer', true, 'bpa_wp_nonce' );
            
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
            if (! empty($_POST['bulk_action']) && sanitize_text_field($_POST['bulk_action']) == 'delete' ) { // phpcs:ignore
             // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['delete_ids'] contains mixed array and it's been sanitized properly using 'appointment_sanatize_field' function
                $delete_ids = ! empty($_POST['delete_ids']) ? array_map(array( $BookingPress, 'appointment_sanatize_field' ), $_POST['delete_ids']) : array(); // phpcs:ignore
                if (! empty($delete_ids) ) {
                    foreach ( $delete_ids as $delete_key => $delete_val ) {
                        $delete_customer_id = $delete_val['customer_id'];
                        $return             = $this->bookingpress_delete_customer($delete_customer_id);
                        if ($return ) {
                            $response['variant'] = 'success';
                            $response['title']   = esc_html__('Success', 'bookingpress-appointment-booking');
                            $response['msg']     = esc_html__('Customer has been deleted successfully.', 'bookingpress-appointment-booking');
                        }
                    }
                }
            }
            echo wp_json_encode($response);
            exit();
        }
        
        /**
         * Ajax: Get patient clinical histories
         */
        function bookingpress_get_patient_histories(){
            $response = array(
                'variant' => 'success',
                'title' => esc_html__('Success', 'bookingpress-appointment-booking'),
                'msg' => '',
                'histories' => array(),
            );
            
            if( empty($_REQUEST['_wpnonce']) ) $_REQUEST['_wpnonce'] = $_REQUEST['bpa_wp_nonce'];
            
            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_customers', true, 'bpa_wp_nonce' );
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json($response);
                die;
            }

            // TODO: Implement real fetching from DB using customer_id or DNI
            // $customer_id = !empty($_POST['customer_id']) ? intval($_POST['customer_id']) : 0; // phpcs:ignore
            // $dni = !empty($_POST['dni']) ? sanitize_text_field($_POST['dni']) : ''; // phpcs:ignore

            // For now, return an empty list so UI wiring works
            
            /**
            
{
    "success": true,
    "data": [
        {
            "id": "1",
            "date": "2025-09-01",
            "time": "09:00",
            "bookingpress_appointment_id": "1",
            "bookingpress_customer_id": "1",
            "bookingpress_staff_member_id": "3",
            "service_name": "Cardiología",
            "consultation_data": {
                "general":{
        			"motivoConsulta": "cliente dice dolor",
        			"diagnostico": "no tiene nada",
        			"tratamiento": "ninguno - no tiene nada",
        			"notas": "Este viene a joder 2 x 3 Y alguna otra vez (actualizado)"
                },
            	"vitales":{
            		"presionArterial":"",
            		"frecuenciaCardiaca":"",
            		"frecuenciaRespiratoria":"",
            		"temperatura":"",
            		"saturacionOxigeno":""
            	},
            	"antecedentes":{
            		"personales":"",
            		"familiares":""
            	},
            	"medicamentos":[
            		{"nombre":"","dosis":"","frecuencia":""}
            	]
                
            }
        },
    ]
}

            
            */
            $response['histories'] = [

                    (object) [
                            "id"    => "1",
                            "date"  => "2025-09-03",
                            "time"  => "09:00",
                            "bookingpress_appointment_id"   => "1",
                            "bookingpress_customer_id"      => "1",
                            "bookingpress_staff_member_id"  => "3",
                            "staff_member_name" => "JoseTest",
                            "service_name"      => "Cardiología",
                            "consultation_data" => [
                                    "general" =>[
                            			"motivoConsulta" => "cliente dice dolor",
                            			"diagnostico" => "no tiene nada",
                            			"tratamiento" => "ninguno - no tiene nada",
                            			"notas" => "Este viene a joder 2 x 3 Y alguna otra vez (actualizado)",
                                        "archivos" => [ ]
                                    ],
                                	"vitales" =>[
                                		"presionArterial" =>"",
                                		"frecuenciaCardiaca" =>"",
                                		"frecuenciaRespiratoria" =>"",
                                		"temperatura" =>"",
                                		"saturacionOxigeno" =>""
                                	],
                                	"antecedentes" =>[
                                		"personales" =>"",
                                		"familiares" =>""
                                	],
                                	"medicamentos" =>[
                                		["nombre" =>"","dosis" =>"","frecuencia" =>""]
                                	]
                                
                            ]
                    ],
                    (object) [
                            "id"    => "1",
                            "date"  => "2025-09-01",
                            "time"  => "09:30",
                            "bookingpress_appointment_id"   => "0",
                            "bookingpress_customer_id"      => "1",
                            "bookingpress_staff_member_id"  => "4",
                            "staff_member_name" => "JosePrueba",
                            "service_name"      => "Cardiología",
                            "consultation_data" => [
                                    "general" =>[
                            			"motivoConsulta" => "cliente dice dolor",
                            			"diagnostico" => "no tiene nada",
                            			"tratamiento" => "ninguno - no tiene nada",
                            			"notas" => "Este viene a joder 2 x 3 Y alguna otra vez (actualizado)",
                                        "archivos" => [ ]
                                    ],
                                	"vitales" =>[
                                		"presionArterial" =>"",
                                		"frecuenciaCardiaca" =>"",
                                		"frecuenciaRespiratoria" =>"",
                                		"temperatura" =>"",
                                		"saturacionOxigeno" =>""
                                	],
                                	"antecedentes" =>[
                                		"personales" =>"",
                                		"familiares" =>""
                                	],
                                	"medicamentos" =>[
                                		["nombre" =>"","dosis" =>"","frecuencia" =>""]
                                	]
                                
                            ]
                    ],
            ];
            
            #$response['histories'] = ["x"=>"kaka"];
            wp_send_json($response);
            die;
        }
        
        /**
         * Ajax: Find a customer by DNI (normalized). Returns single customer or null
         */
        function bookingpress_find_customer_by_dni(){
            $response = array(
                'variant' => 'success',
                'title' => esc_html__('Success', 'bookingpress-appointment-booking'),
                'msg' => '',
                'items' => [],
                'total' => 0
                
            );
            $_REQUEST['_wpnonce'] = $_REQUEST['bpa_wp_nonce'];
            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_customers', true, 'bpa_wp_nonce' );
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json($response);
                die;
            }

            // Placeholder: requires implementing real lookup by DNI in DB
            // Expected input
            $dni = ! empty($_POST['dni']) ? preg_replace('/\D+/', '', sanitize_text_field($_POST['dni'])) : '';
            if(empty($dni)){
                $response['variant'] = 'error';
                $response['title'] = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg'] = esc_html__('DNI requerido', 'bookingpress-appointment-booking');
                wp_send_json($response);
                die;
            }
            
            #$response['customer'] = get_dni_customers( $dni );
            $bphc_For_customer = get_dni_customers( $dni, '',true );
            //wp_send_json($bphc_For_customer);
            if( !empty($bphc_For_customer) ){
            $this->bookingpress_get_customer_details( $bphc_For_customer );
            }
            // TODO: implementar búsqueda real por DNI y llenar $response['customer']
            wp_send_json($response);
            die;
        }
    }

global $bookingpress_stories;
$bookingpress_stories = new bookingpress_stories();
