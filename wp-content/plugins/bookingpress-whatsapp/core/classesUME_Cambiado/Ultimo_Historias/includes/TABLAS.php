<?php

/**
 * 
 */
class BookingPress_Expansion_Tables {
    public static $tables = [
    'consultas'     =>  'test2_bphc_consultas',
    'antecedentes'  =>  'test2_bphc_antecedentes',
    'medicamentos'  =>  'test2_bphc_medicamentos',
    'alergias'      =>  'test2_bphc_alergias'
    ];
}

class BookingPress_Expansion_Plugin {
    public $init_start = 0;
    public $last_check = 0;
    public $options = [];
    
    
    public function __construct(){
        
        
        add_action('plugins_loaded', array($this, 'init_plugin'), -10);
                add_action('init', array($this, 'init_plugin') );
                
                
        #add_action('admin_notices', [$this, 'add_update_notice']);
        
    }
    
    public function init_plugin(){
        if($this->init_start) return;
        $this->init_start = 1;
       
        $this->get_options();
        
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
        
        if( is_admin() && !defined( 'DOING_AJAX' ) && !defined('DOING_CRON') ){
            if( !empty($this->require_update) ){
                $this->apply_updates();
            } 
        }
                
        $tab_names = BookingPress_Expansion_Tables::$tables;
        #print_r( $this );
        
        add_action('admin_print_styles', function()use($is_updt){
            #print_r( "<h4>.........." . ' ' /*print_r( $last_check_time , true ) */. $is_updt  . "...........</h4>");
            
            if( isset($_GET['bphc_delete_opt']) ){
                print_r( '------------ DEL OPtions ----------------');
                delete_option('BPHC_BookingPress_Expansion_options');
                }
            
        },10);
        
    }
    
    private function default_Includes(){
        #$this->is_tables_created();
    }
    
    public function init_classes(){}
    
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
        } 
        
        
        
        foreach( $to_update as $k => $accion ){
            $confirm = 0;
            ob_start();
            $confirm = call_user_func( [$this, $accion ] );
            $mensajes = ob_get_clean();
            #if($confirm) print_r('<br> confirmado '.$accion.'<br>');
            ?>
            <script>
            var BP_HC_bookingpress_historias_update_msg_db = '<?php echo $k . ': '; print_r($confirm); print_r($mensajes); ?>';
            </script>
            <?php
            if($confirm) unset($to_update[$k] );
        }
        
        
        $this->update_options( ['to_update' => $to_update] );
        
        if( empty($to_update)){
            $this->update_options( ['updated' => time()] );
            
            //ADD ECHO SCRIPT DE NOTICIA
            ?>
            <script>
            document.querySelector('#historias_listo').style="display:flex;";
            clearInterval(BP_HC_bookingpress_historias_interval);
            
            </script>
            <?php
            flush();
            
            header("Refresh: 5;");
        }
        
    }
    
    public function add_update_notice(){
        $to_update = !empty($this->options['to_update'])? $this->options['to_update']:[];
        if(!empty($to_update) || true ){
        ?>
        <div class="notice notice-info" >
            <div style="font-size: 16px;font-color:gray;">
                <div><h2>Historias Clinicas</h2></div>
                <div> <span>Se estan aplicando actualizaciones espera.</span><span class="dashicons dashicons-update" style="display: inline-block;animation: rotate-refresh 1s linear infinite;"></span></div>
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
            },5000);
            
            </script>
        </div>
                
        <?php
        }
    }
    
    function check_update_time(){
        global $wpdb;
        $expire = (60*60*24);
        
        $last_check_time = 0;
        $last_check_time = !empty($this->last_check)? $this->last_check : 0;
        
        #print_r($last_check_time);
        
        
        if( time() > ($last_check_time + $expire) ){
            /** SI se confirman acciones restablecemos el contador */
            $this->require_update = time();
            #print_r( $this->options );
            
            
            
            
            
            return 'ESTO REQUIERE COMPROBAR/ACTUALIZAR';
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
    

}//BookingPress_Expansion_Plugin


global $bookingPress_Expansion;
$bookingPress_Expansion = new bookingPress_Expansion_Plugin();


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
          `descripcion` TEXT NOT NULL,
          `detalle` TEXT NULL,
          `fecha` DATE NOT NULL,
           PRIMARY KEY (`id`),
           KEY consulta_id (consulta_id),
           KEY `bookingpress_appointment_id` (`bookingpress_appointment_id`),
           INDEX `antecedentes_customer` (`bookingpress_customer_id` ASC),
           CONSTRAINT `bphc_ant_customer_id_testhc`
            FOREIGN KEY (`bookingpress_customer_id`)
            REFERENCES `$customers_table` (`bookingpress_customer_id`) 
            ON DELETE NO ACTION ON UPDATE NO ACTION
        ) $charset_collate;";
        
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
          INDEX `alergias_customer_id` (`bookingpress_customer_id` ASC),
          CONSTRAINT `bphc_alerg_customer_id_testhc`
            FOREIGN KEY (`bookingpress_customer_id`)
            REFERENCES `$customers_table` (`bookingpress_customer_id`) 
            ON DELETE NO ACTION ON UPDATE NO ACTION
        ) $charset_collate;";
        
            

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        if($wpdb->last_error) return $wpdb->last_error;
        $up = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name;
        
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