<?php


class BPHC_BookingPress_DB {
    public $class_vers = 1;
    public $class_opt = 'bphc_db_version';
    
    public function __construct(){
        
        $this->check_for_update();
        
    }
    
    
    public static function create_table() {
        global $wpdb;
        $table_name = $wpdb->prefix . HC_BookingPress_Plugin::$records_table; //$wpdb->prefix . 'hc_clinical_records';
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
    
    
    public function require_update( ){
        $up = 0;
        switch( $this->class_vers ){
           case 1:  $up = $this->create_table( ); break;
        }
    }
    
    public function check_for_update(){
        $option = get_option($this->class_opt, 0);
        $option++;
        if( $option <= $this->class_vers ){
            $upt = $this->require_update( );
            if($upt) update_option($this->class_opt, $option);
        }
        
        #echo "<h1>init db class option: $option </h1>";
    }
    
}


