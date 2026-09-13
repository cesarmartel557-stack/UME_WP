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
        
    }
    
    public function init_plugin(){
        if($this->init_start) return;
        $this->init_start = 1;
       
        $this->get_options();
        
        
        $is_updt = $this->check_update_time();
                
        $this->default_Includes();
        
        $this->init_classes();
        
        if( !empty($this->require_update) ){
            echo " actualizandooooooooooo";
            
            $this->apply_updates();
        } 
        
                
        $tab_names = BookingPress_Expansion_Tables::$tables;
        print_r( $this );
        
        add_action('admin_print_styles', function()use($is_updt){
            echo "<h4>.........." . ' ' /*print_r( $last_check_time , true ) */. $is_updt  . "...........</h4>";
            
            
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
        $tab_names = BookingPress_Expansion_Tables::$tables;
        $task_list = $tab_names;
        
        foreach($task_list as $table=> $table_name){
           $create = 1; 
            if($create) unset( $task_list[$table] );
        }        
        return $task_list == [];
        
        return;
        
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
            }
            
            if($create) unset( $task_list[$table] );
        }
        
        return $task_list == [];
    }
    
    function apply_updates(){
        $to_update = !empty($this->options['to_update'])? $this->options['to_update']:[];
        if(empty($to_update) ) return;
        
        foreach( $to_update as $k => $accion ){
            $confirm = 0;
            $confirm = call_user_func( [$this, $accion ] );
            
            if($confirm) unset($to_update[$k] );
        }
        
        
        $this->update_options( ['to_update' => $to_update] );
    }
    
    function check_update_time(){
        global $wpdb;
        $expire = (60);
        
        $last_check_time = 1757814052;
        $last_check_time = $this->last_check;
        
        print_r($last_check_time);
        
        
        if( time() > ($last_check_time + $expire) ){
            /** SI se confirman acciones restablecemos el contador */
            $this->require_update = time();
            print_r( $this->options );
            
            
            $this->update_options( ['updated' => time()] );
            
            
            return 'ESTO REQUIERE COMPROBAR/ACTUALIZAR';
        }
        
        return 'OK';
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

        $sql = "CREATE TABLE $table_name (
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
        ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        
        $up = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name;
        
        return $up;
    }
    
    
    public static function create_antecedentes() {
        global $wpdb;
        $table_name = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['antecedentes'];
        $charset_collate = $wpdb->get_charset_collate();

        /** -- -----------------------------------------------------
        -- Tabla `antecedentes_paciente`
        -- ----------------------------------------------------- */
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
          `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT,
          `bookingpress_customer_id` int(9) NOT NULL,
          `consulta_id` BIGINT UNSIGNED NOT NULL,
          `tipo` ENUM('personal', 'familiar') NOT NULL,
          `descripcion` TEXT NOT NULL,
          `detalle` TEXT NULL,
           PRIMARY KEY (`id`),
           KEY `bookingpress_appointment_id` (`bookingpress_appointment_id`),
           INDEX `fk_antecedentes_customer_idx` (`bookingpress_customer_id` ASC),
           CONSTRAINT `fk_antecedentes_customer`
            FOREIGN KEY (`bookingpress_customer_id`)
            REFERENCES `customer` (`id`)
        ) $charset_collate;";


        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        
        $up = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name;
        
        return $up;
    }


    public static function create_medicamentos() {
        global $wpdb;
        $table_name = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['medicamentos'];
        $charset_collate = $wpdb->get_charset_collate();

        /** -- -----------------------------------------------------
        -- Tabla `medicamentos_recetados`
        -- ----------------------------------------------------- */
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
          `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
          `bookingpress_customer_id` int(9) NOT NULL,
          `consulta_id` BIGINT UNSIGNED NOT NULL,
          `nombre_medicamento` VARCHAR(255) NOT NULL,
          `dosis` VARCHAR(100) NULL,
          `frecuencia` VARCHAR(100) NULL,
          `fecha` DATE NOT NULL,
          `hasta` DATE NOT NULL,
           PRIMARY KEY (`id`),
           INDEX `fk_medicamentos_consulta_idx` (`consulta_id` ASC),
           CONSTRAINT `fk_medicamentos_consulta`
            FOREIGN KEY (`consulta_id`)
            REFERENCES `consulta_id` (`id`)
        ) $charset_collate;";


        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        
        $up = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ") == $table_name;
        
        return $up;
    }



    public static function create_alergias() {
        global $wpdb;
        $table_name = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['alergias'];
        $charset_collate = $wpdb->get_charset_collate();

        /** -- -----------------------------------------------------
        -- Tabla `alergias_paciente`
        -- ----------------------------------------------------- */
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
          `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
          `bookingpress_customer_id` int(9) NOT NULL,
          `consulta_id` BIGINT UNSIGNED NOT NULL,
          `alergia` VARCHAR(255) NOT NULL,
          `reaccion_o_motivo` TEXT NULL,
          PRIMARY KEY (`id`),
          INDEX `fk_alergias_cliente_idx` (`cliente_id` ASC),
          CONSTRAINT `fk_alergias_cliente`
            FOREIGN KEY (`bookingpress_customer_id`)
            REFERENCES `clientes` (`id`)
        ) $charset_collate;";
        
            

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
        
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




