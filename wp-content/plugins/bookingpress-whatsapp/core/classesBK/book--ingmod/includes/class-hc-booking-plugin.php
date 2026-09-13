<?php


class HC_BookingPress_Plugin {
        
    public static $records_table = 'test_hc_clinical_records';
    public $db_ok = 0;
    
    public function __construct(){
        
        add_action('plugins_loaded', [$this, 'init_classes'], 10);
        
    }
    
    
    public function init_classes(){
        global $bp_hc_HistoriesDB;
        
        $bp_hc_HistoriesDB = new BPHC_BookingPress_DB();
        
        #$bp_hc_HistoriesDB->check_for_update();
        
        
        global $wpdb;
        $table_name = 'test_hc_clinical_records';
        //$a = $wpdb->get_var(" SHOW TABLES LIKE '$table_name' ");
        //echo "<h1 style='margin-top:200px'>init db class $a </h1>";    
            
        
        
    }
    
    
        
}


