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
console.log('mod_manage_appointment linea 461 condicion comentada x test');