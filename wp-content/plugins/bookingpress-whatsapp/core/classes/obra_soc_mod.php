<?php
//2026 updates metodos bookingpress_get_search_customer_list bookingpress_get_customer_list reescritos linea 277
//2026 updates changes change_obra_soc_seguros
//2026 updates acepta_solo_particular_msg linea 1427
add_filter('bookingpress_modify_appointment_data_fields', function($bookingpress_appointment_vue_data_fields){
    global $dni_key;
    $bookingpress_appointment_vue_data_fields['expansion_dni_key'] = $dni_key;
    $bookingpress_appointment_vue_data_fields['obs_seguro_no_existe'] = "";
    $bookingpress_appointment_vue_data_fields['expansion_obs_customer'] = null;
    $bookingpress_appointment_vue_data_fields['expansion_customer_anses'] = ['is_loading'=>0,'data'=> null];
    $bookingpress_appointment_vue_data_fields['expansion_verify_data'] = [];
    $bookingpress_appointment_vue_data_fields['expansion_drawer_msg'] = false;
    if( is_admin() ){
        $bookingpress_appointment_vue_data_fields['expansion_include_apelname'] = '';
        $bookingpress_appointment_vue_data_fields['serverObra'] = (object) [];
        
        $new_fields = [];
        foreach( $bookingpress_appointment_vue_data_fields['bookingpress_form_fields'] as $k => $field){
            $field['is_anses_data'] = false;
            $new_fields[] = $field;
            if( in_array($field['bookingpress_field_meta_key'], ['persona_fecha'] ) ){
                $new_fields[] = ['is_anses_data' => true];
            }
        }
        $bookingpress_appointment_vue_data_fields['bookingpress_form_fields'] = $new_fields;
    }
    
    return $bookingpress_appointment_vue_data_fields;
},100,1 );


add_action( 'bookingpress_appointment_add_dynamic_vue_methods', function($vue_methos_data=""){ 
    $vue_methos_data .='
    obras_loading(){
        if(maxApp == null) maxApp = this;
        return obras_is_loading;
    },
    get_opciones_medico(){
        if(maxApp == null) maxApp = this;
        const vm = this;
        
        if("particular" == vm.appointment_formdata.bookingpress_appointment_meta_fields_value["is_particular"]){
            vm.appointment_formdata.bookingpress_appointment_meta_fields_value["is_particular"] = "Particular";
        }
        if("obra social" == vm.appointment_formdata.bookingpress_appointment_meta_fields_value["is_particular"]){
            vm.appointment_formdata.bookingpress_appointment_meta_fields_value["is_particular"] = "Obra Social/Seguro con convenio";
        }
        
        //if( data_turno_old!=null && data_turno_old == JSON.stringify(data_turno) ) return configuracion_medico["obras_sociales"];
        
        if(vm.opt_medicos_last_time == null)
            vm.opt_medicos_last_time = 0;
        
    if(Date.now() > 500 + vm.opt_medicos_last_time ){
        
        set_medic_opss_admin(vm.appointment_formdata);
        if( data_turno_old != JSON.stringify(data_turno) ){
        setTimeout( ()=>{
            if(vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"].toLowerCase() != "particular"){
                vm.appointment_formdata.service_price_without_currency = 0;
                vm.appointment_formdata.subtotal = this.appointment_formdata.total_amount = 0;
                vm.appointment_formdata.subtotal_with_currency = this.appointment_formdata.total_amount_with_currency = this.bookingpress_price_with_currency_symbol(0);
                
            }else{
                //console.log("calculate precios");
                vm.appointment_formdata.service_price_without_currency = turno_price;
                vm.bookingpress_calculate_prices();
            }
            
        },50);
        }//fin data turno
        
        //console.log("configuracion_medico-obras_sociales");
        //console.log(configuracion_medico["obras_sociales"]);
        
        vm.opt_medicos_last_time = Date.now();
    }
    
        if(vm.obs_prev_val == null) vm.obs_prev_val = "";
        if(vm.obs_prev_val != vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"]){
            vm.obs_prev_val = vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"];
            
            if( maxApp.first_load ){
            vm.change_obra_soc_seguros( 1 );
            }
        }
    
        if( typeof configuracion_medico["obras_sociales"] == "undefined"){
            return [{label: "particular", value: "particular", limitado: false, cupos: 0, grupo: false}];
        }
        return configuracion_medico["obras_sociales"];
    },
    get_text_headmax(){
        return " ";
    },
    change_obra_soc_seguros(force=0){
        const vm = this;
        if(!vm.open_appointment_modal){ return; }
        //console.log("change");
        if(vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"]==null) vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
        vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"].trim();
        if(vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"].toLowerCase() == "particular")
            vm.appointment_formdata.bookingpress_appointment_meta_fields_value["is_particular"] = "Particular";
        
        val = null;
        val = configuracion_medico["obras_sociales"].find((sel_data) => sel_data.value ==  vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] );
        if( val == null ){
            if(force && vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"]!=""){
                vm.obs_seguro_no_existe = vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"];
            }
            //vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
            
            if(vm.obs_seguro_no_existe != "" && vm.appointment_formdata.selected_staffmember != "" && Number(vm.appointment_formdata.appointment_selected_customer) ){
                vm.$notify({
    						title: "Aviso",
    						message: "Es posible que la Obra social del Paciente no este disponible.",
    						type: "info",
    						customClass: "info_notification",
    					});
            }
        }else{
            vm.obs_seguro_no_existe = "";
        }
        
        vm.expansion_onParticularObs_Changed();
        vm.$emit("ParticularObsChanged");
    },
    ';
    echo $vue_methos_data;
    
    ?>
    expansion_onParticularObs_Changed() {
        app = this;
        let expansion_new_price = 0;
        if( String(app.appointment_formdata.bookingpress_appointment_meta_fields_value["is_particular"]).toLowerCase() == "particular" ){
            //console.log("es precio particular")
            expansion_new_price = 1;
            if( app.appointment_formdata.selected_staffmember ){
                let staff = app.bookingpress_loaded_staff[app.appointment_formdata.appointment_selected_service].find( staff => staff.bookingpress_staffmember_id == app.appointment_formdata.selected_staffmember )
                expansion_new_price = !staff? staff.bookingpress_service_price : 1;
            }else{
                expansion_new_price = Number(app.appointment_formdata.subtotal)? app.appointment_formdata.subtotal: expansion_new_price;
            }
        }
        app.appointment_formdata.total_amount = app.appointment_formdata.subtotal = expansion_new_price;
        app.appointment_formdata.total_amount_with_currency = app.appointment_formdata.subtotal_with_currency = app.bookingpress_price_with_currency_symbol(expansion_new_price);
        
        if(  Number(expansion_new_price)  ){
            app.bookingpress_admin_get_final_step_amount()
        }
    },
    bookingpress_retrieve_custom_field_values( selected_customer_id ){
		const vm = this;
		let postData =  {action: "bookingpress_get_customer_form_field_values", customer_id: selected_customer_id, _wpnonce:'<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce')); ?>'};
		axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
		.then( function(response){
			if( response.data.variant == 'success' ){
				let customer_form_fields = response.data.customer_form_fields;
				for( let field_key in customer_form_fields ){
					let field_value = customer_form_fields[ field_key ];
					if( 'undefined' != typeof vm.appointment_formdata.bookingpress_appointment_meta_fields_value[ field_key ] ){
						vm.appointment_formdata.bookingpress_appointment_meta_fields_value[ field_key ] = field_value;
                        if( field_key == 'obra_soc_seguros'){
                            vm.expansion_obs_customer = field_value;
                        }
					}
				}
			}
		}).catch( function(error){
			console.log( error );
		})
	},
    /*async saveProAppointmentBooking(bookingAppointment){
		const vm = new Vue();
		const vm2 = this
		
		let is_timeslot_display = vm2.is_timeslot_display;
		if( '0' == is_timeslot_display ){
			vm2[bookingAppointment].appointment_booked_time = "00:00:00";
		}

		let expansion_is_valid = await vm2.expansionValidateFormFieldsBakend( bookingAppointment );
        if( expansion_is_valid ){
            vm2.saveAppointmentBooking(bookingAppointment);
        }
	},*/
    async expansionValidateFormFieldsBakend( bookingAppointment ){
        let expansion_validate = true;
        let meta_values = bookingAppointment.bookingpress_appointment_meta_fields_value;
        let dni_key = this.expansion_dni_key? this.expansion_dni_key : 'text_C6kufq';
        if( 
        !Number(bookingAppointment.appointment_selected_customer) || 
            ( meta_values['tipo_doc'] == '' ) || 
            ( meta_values[dni_key] == '' ) || 
            ( meta_values['is_particular'] == '' ) ||
            ( meta_values['is_particular'].toLowerCase() != 'particular' && meta_values['obra_soc_seguros'] == '' ) 
        ){
            expansion_validate = false;
            //return false;
        }
        app.$refs.FormItem_is_particular__ref[0].validate('change');
        app.$refs.FormItem_obra_soc_seguros__ref[0].validate('change');
        
        if( app.$refs.FormItem_is_particular__ref && app.$refs.FormItem_is_particular__ref[0].validateState == 'error' ){
            expansion_validate = false;
            //return false;
        }
        if( app.$refs.FormItem_obra_soc_seguros__ref && app.$refs.FormItem_obra_soc_seguros__ref[0].validateState == 'error' ){
            expansion_validate = false;
            //return false;
        }
        
        let obs_validate = await obs_soc_seguros_validate();
        
        if( !expansion_validate || !obs_validate ){
            return false;
        }
        return true;
    },
    async expansion_anses_get_customer(){
        const ansesVm = this;
        if(Date.now() < Number(expansion_verify_req.timestamp) + 30000 ){
            alert('espera... puedes consultar cada 35segundos');
            return;
        }
        
        let custom_fields = {
            'text_C6kufq': ansesVm.appointment_formdata.bookingpress_appointment_meta_fields_value["text_C6kufq"],
            'doc': ansesVm.appointment_formdata.bookingpress_appointment_meta_fields_value["text_C6kufq"],
            'tipo_doc': ansesVm.appointment_formdata.bookingpress_appointment_meta_fields_value["tipo_doc"],
        };
        ansesVm.expansion_customer_anses.doc_requerido = custom_fields.doc? 0:1;
        if( ansesVm.expansion_include_apelname.trim() !='' ) custom_fields.customer_lastname = ansesVm.expansion_include_apelname;
        if( !custom_fields.tipo_doc ) delete(custom_fields.tipo_doc);
        
        if( !custom_fields.doc ) return;
        console.log("sigue consulta",custom_fields.doc, ansesVm.appointment_formdata.bookingpress_appointment_meta_fields_value["text_C6kufq"]);
        
        ansesVm.expansion_customer_anses.is_loading = 1;
        let ansesRes = await expansion_verify_data_func( custom_fields );
        ansesVm.expansion_verify_data.in_admin = ansesRes;
        ansesVm.expansion_customer_anses.data = (ansesRes && ansesRes.admin_data)? ansesRes.admin_data : null;
        setTimeout(( )=> { ansesVm.expansion_customer_anses.is_loading = 0;} ,500);
        
        expansion_verify_req.consulta = 1;
        
        if( ansesVm.expansion_customer_anses.data && ansesVm.expansion_customer_anses.data.obras_sociales.length ){
        ansesVm.expansion_admin_entidadesPorRnas( ansesVm.expansion_customer_anses.data.obras_sociales );
        }
    },
    async expansion_admin_entidadesPorRnas( obras = null ){
        if(!obras) return;
        const ansesVm = this;
        
        let url = new URL(location.href);
        url.search = new URLSearchParams({'expansion_json_data': 'rnas_obras.json'});
        
        // El navegador negocia Gzip automáticamente con el servidor
        console.log( url );
        const response = await fetch( url );
        
        if (!response.ok) throw new Error('Error al cargar el JSON');
        
        const data = await response.json(); //descomprimido por el navegador
        
        let rnas_search = [];
        for(x of obras){
            rnas_search.push(Number(x['C\u00f3digo']));
        }
        // Buscamos el objeto que coincida con el RNAS proporcionado
        let resultado = data.filter( item => rnas_search.includes( Number(item.RNAS) ) );
        //console.log( 'filter', resultado);
        resultado.map( item => { ansesVm.serverObra[ item.RNAS ] = item });
        //console.log( resultado, rnas_search, ansesVm.serverObra );
        ansesVm.$forceUpdate();
    },
    
    //2026 updates ACTUALIZADO CODIGO BASURA DE BPRESS sobrescrito
    bookingpress_get_search_customer_list(query){
		//const vm = new Vue()//innecesario
		const vm2 = this	
		if (query !== '' && query.length>2 ) {
		  //console.log('rewrite search 1');
			vm2.bookingpress_loading = true;                    
			var customer_action = { action:'bookingpress_get_search_customer_list',search_user_str:query,_wpnonce:'<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce')); ?>' }                    
			axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
			.then(function(response){
				vm2.bookingpress_loading = false;
                //console.log('busqueda nombres result',response.data.appointment_customers_details.length, response.data.appointment_customers_details.splice(0,50));
				vm2.search_customer_list = response.data.appointment_customers_details.splice(0,50)
			}).catch(function(error){
				console.log(error)
			});
		} else {
			vm2.search_customer_list = [];
		}	
	},
    bookingpress_get_customer_list(query){
        //const vm = new Vue()//innecesario
        const vm2 = this	
        if (query !== '' && query.length>2 ) {
            //console.log('rewrite search 2');
            vm2.bookingpress_loading = true;                    
            var customer_action = { action:'bookingpress_get_customer_list',search_user_str:query,customer_id:vm2.customer_id,_wpnonce:'<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce')); ?>' }                    
            axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
            .then(function(response){
                vm2.bookingpress_loading = false;
                //console.log('busqueda nombres result',response.data.appointment_customers_details.length, response.data.appointment_customers_details.splice(0,50));
                vm2.appointment_customers_list = response.data.appointment_customers_details.splice(0,50)
            }).catch(function(error){
                console.log(error)
            });
        } else {
            vm2.appointment_customers_list = [];
        }	
    },
    <?php
    
    //return $vue_methos_data;
},20);

add_action('bookingpress_modify_request_after_validation', function(){
    ?>
    
    let expansion_is_valid = vm2.expansionValidateFormFieldsBakend( bookingAppointment );
    if( !expansion_is_valid ) valid = false;
    console.log(" expansion extravalidacion ", expansion_is_valid);
    <?php
},100);



add_action('bookingpress_edit_appointment_details', 'obra_soc_mod_edit_appointment_details_func', 1);
        /**
		 * Function for get edit appointment details
		 *
		 * @return void
		 */
		function obra_soc_mod_edit_appointment_details_func(){
		  global $bookingpress_pro_appointment;
          remove_action('bookingpress_edit_appointment_details', array($bookingpress_pro_appointment, 'bookingpress_edit_appointment_details_func'));
			?>
				const vm = this
				var bookingpress_appointment_booking_id = response.data.bookingpress_appointment_booking_id;

				var is_timeslot_disp = 1;
				vm.is_timeslot_display = '1';
				for( let index in vm.appointment_services_list ){
					let currentValue = vm.appointment_services_list[ index ];
					if(currentValue.category_services.length > 0){
						for( let index2 in currentValue.category_services ){
							let currentValue2 = currentValue.category_services[ index2 ];
							if( currentValue2.service_id == vm.appointment_formdata.appointment_selected_service && currentValue2.service_duration_unit == 'd'){
								is_timeslot_disp = 0;
							}
						}
					}
				}
				if(is_timeslot_disp == 0){
					vm.is_timeslot_display = '0';
					vm.appointment_formdata.appointment_booked_time = '00:00:00';
				}
				
				//Set edited extras value
				if(response.data.bookingpress_extra_service_details != "" && response.data.bookingpress_extra_service_details != null){
					vm2.appointment_formdata.selected_extra_services_ids = [];
					var bookingpress_extra_details = JSON.parse(response.data.bookingpress_extra_service_details);
					bookingpress_extra_details.forEach(function(currentValue, index, arr){
						vm2.appointment_formdata.selected_extra_services_ids.push(currentValue.bookingpress_extra_service_details.bookingpress_extra_services_id);
						vm.bookingpress_loaded_extras[vm.appointment_formdata.appointment_selected_service].forEach(function(currentValue2, index2, arr2){
							if(currentValue2.bookingpress_extra_services_id == currentValue.bookingpress_extra_service_details.bookingpress_extra_services_id){
								vm.bookingpress_loaded_extras[vm.appointment_formdata.appointment_selected_service][index2].bookingpress_is_selected = true;
								vm.bookingpress_loaded_extras[vm.appointment_formdata.appointment_selected_service][index2].bookingpress_selected_qty = parseInt(currentValue.bookingpress_selected_qty);
							}
						});
					});
				}
				
				//Set bring anyone with value
				var bring_anyone_max_cap = response.data.bring_anyone_max_capacity;
				vm2.appointment_formdata.bookingpress_bring_anyone_max_capacity = parseInt(bring_anyone_max_cap);
				if( vm2.is_bring_anyone_with_you_enable == 1 ){
					var bring_anyone_min_cap = response.data.bring_anyone_min_capacity;
					vm2.appointment_formdata.bookingpress_bring_anyone_min_capacity = parseInt(bring_anyone_min_cap);
				}

				vm2.appointment_formdata.selected_bring_members = parseInt(response.data.bookingpress_selected_extra_members);
				if(typeof response.data.bookingpress_staff_member_id != 'undefined' && response.data.bookingpress_staff_member_id != 0 && response.data.bookingpress_staff_member_id != '') {					
					let selected_staffmember = response.data.bookingpress_staff_member_id;
					if( "" != selected_staffmember ){						
						let selected_service = response.data.bookingpress_service_id;
						let selected_service_staffmember = vm.bookingpress_loaded_staff[ selected_service ];
						let selected_staff_capacity = 1;
						let selected_staff_min_capacity = 1;
						selected_service_staffmember.forEach(function( elm ){
							if( selected_staffmember == elm.bookingpress_staffmember_id ){
								selected_staff_capacity = elm.bookingpress_service_capacity;
								
								if( vm2.is_bring_anyone_with_you_enable == 1 ){
									
									selected_staff_min_capacity = elm.bookingpress_service_min_capacity;
									
								}
								return false;
							}
						});
						vm2.appointment_formdata.bookingpress_bring_anyone_max_capacity = parseInt(selected_staff_capacity);
						if( vm2.is_bring_anyone_with_you_enable == 1 ){
							vm2.appointment_formdata.bookingpress_bring_anyone_min_capacity = parseInt(selected_staff_min_capacity);
						}
					}
				}

				//Set Selected Staff Member
				if(response.data.bookingpress_staff_member_id == 0) {
					vm2.appointment_formdata.selected_staffmember = '';
				} else{ 
					vm2.appointment_formdata.selected_staffmember = response.data.bookingpress_staff_member_id;
				}
                
                //2026 updates obra_soc_mod2
                if( Number(bookingpress_appointment_booking_id) ){
                    vm2.appointment_formdata.bk_mod_original_date = response.data.bookingpress_appointment_date;
                }
                //2026 updates obra_soc_mod2 end
                
				//Set payment status
				vm2.bookingpress_payment_status = response.data.bookingpress_payment_status
				
				var bookingpress_order_id = response.data.bookingpress_order_id;
				var postData = { action:'bookingpress_get_appointment_meta_values', bookingpress_appointment_id: bookingpress_appointment_booking_id, bookingpress_order_id: bookingpress_order_id, _wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' };
				axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
				.then( function (result) {
					if(result.data.custom_fields_values != ""){
						vm2.appointment_formdata.bookingpress_appointment_meta_fields_value = [];
						vm2.appointment_formdata.bookingpress_appointment_meta_fields_value = result.data.custom_fields_values;
                        //2026 updates obra_soc_mod
                        let expansion_obra_soc_seguro = '';
                        if( result.data.custom_fields_values['obra_soc_seguros'] ){
                            expansion_obra_soc_seguro = result.data.custom_fields_values['obra_soc_seguros'];
                            vm2.appointment_formdata.expansion_obra_soc_seguro = expansion_obra_soc_seguro;
                        }
                        setTimeout(()=>{
                            vm2.appointment_formdata.bookingpress_appointment_meta_fields_value['obra_soc_seguros'] = expansion_obra_soc_seguro;
                            console.log('custom_fields_values_recibidos', result.data.custom_fields_values);
                            vm2.$emit('get_edit_appoint_meta_values', result.data.custom_fields_values);
                        },100);
                        //2026 update obra_soc_mod end
						vm2.bookingpress_form_fields.forEach( (element, index) => {
							let appointment_file_field_list = [];
							if( "file" == element.bookingpress_field_type ){
								let meta_key = element.bookingpress_field_meta_key;
								let file_upload_url = vm2.appointment_formdata.bookingpress_appointment_meta_fields_value[ meta_key ];
								let file_data = file_upload_url.split('/');
								let file_name = file_data[ file_data.length - 1 ];
								let file_obj = {
									name: file_name,
									url: file_upload_url,
									response:{
										file_ref: meta_key
									}
								};								
								appointment_file_field_list.push( file_obj );
								if(file_upload_url != '') {
									vm2.bookingpress_form_fields[index].bpa_file_list = appointment_file_field_list;
								} else {
									vm2.bookingpress_form_fields[index].bpa_file_list = [];
								}
							}
						});
					}
				}.bind(this) )
				.catch( function (error) {
					console.log(error);
				});

				<?php 
					do_action('bookingpress_reset_tax_for_admin_edit_appointment');
				?>				
				
				vm2.appointment_formdata.bookingpress_currency_name	= response.data.bookingpress_service_currency;
				if(response.data.bookingpress_coupon_details != ""){
					var bookingpress_applied_coupon_details = JSON.parse(response.data.bookingpress_coupon_details);
					
					if(bookingpress_applied_coupon_details != '' && null != bookingpress_applied_coupon_details ){
						bookingpress_coupon_code = bookingpress_applied_coupon_details.bookingpress_coupon_code;
						if(bookingpress_coupon_code == undefined){
							bookingpress_coupon_code = bookingpress_applied_coupon_details.coupon_data.bookingpress_coupon_code;
						}
						setTimeout(function(){
							vm2.appointment_formdata.applied_coupon_code = bookingpress_coupon_code;
							vm2.bookingpress_apply_coupon_code();
						}, 2000);
					}
				}
				vm2.bookingpress_admin_get_final_step_amount();
				
			<?php
		}


add_action( 'mod_max_add_fields', function(){ //bookingpress_add_appointment_field_section //bookingpress_add_appointment_new_row_section

/*
<script>
var config_medico_get_options = [ {label:"PARTICULAR", value: "particular", limitado:false, cupos:3, grupo:false} ];

maxApp = this;
    maxApp.config_medico_get_options = function(){
        
        return config_medico_get_options;
    }
    
    
</script>
*/
?>
				
                    
					
						<el-form ref="appointment_custom_formdata" :rules="custom_field_rules" :model="appointment_formdata.bookingpress_appointment_meta_fields_value" label-position="top" @submit.native.prevent>
							<template>
								
										<el-col :xs="24" :sm="24" :md="24" :lg="08" :xl="08" v-for="form_fields in bookingpress_form_fields" :class="(form_fields.is_separator == true) ? '--bpa-is-field-separator' : (form_fields.is_anses_data? 'expansion-is-anses-data':'')">
											<div v-if="form_fields.is_separator == false && !form_fields.is_anses_data">
												<div v-if="'undefined' != typeof form_fields.selected_services && form_fields.selected_services.length > 0">
													<el-form-item v-if='(form_fields.bookingpress_field_type == "text" || form_fields.bookingpress_field_type == "email" || form_fields.bookingpress_field_type == "phone") && form_fields.selected_services.includes(appointment_formdata.appointment_selected_service)' :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-input class="bpa-form-control" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" :placeholder="form_fields.bookingpress_field_placeholder"></el-input>
													</el-form-item>
													<el-form-item v-if='form_fields.bookingpress_field_type == "textarea" && form_fields.selected_services.includes(appointment_formdata.appointment_selected_service)' :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-input class="bpa-form-control" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" :placeholder="form_fields.bookingpress_field_placeholder" type="textarea" :rows="3"></el-input>
													</el-form-item>									
													<el-form-item v-if="form_fields.bookingpress_field_type == 'checkbox' && form_fields.selected_services.includes(appointment_formdata.appointment_selected_service)" :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-checkbox-group v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields['bookingpress_field_meta_key']]">
															<el-checkbox class="bpa-front-label bpa-custom-checkbox--is-label" v-for="(chk_data, keys) in JSON.parse( form_fields.bookingpress_field_values)" :label="chk_data.value" :key="chk_data.value" :name="form_fields['bookingpress_field_meta_key']"><p v-html="chk_data.label"></p></el-checkbox>
														</el-checkbox-group>
													</el-form-item>
													<el-form-item v-if="form_fields.bookingpress_field_type == 'radio' && form_fields.selected_services.includes(appointment_formdata.appointment_selected_service)" :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-radio class="bpa-form-label bpa-custom-radio--is-label" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" v-for="(chk_data, keys) in JSON.parse(form_fields.bookingpress_field_values)" :label="chk_data.label" :key="chk_data.value">{{chk_data.label}}</el-radio>
													</el-form-item>
                                                    
                                                    
													<el-form-item v-if='form_fields.bookingpress_field_type == "dropdown" && form_fields.selected_services.includes(appointment_formdata.appointment_selected_service)' :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-select v-if="form_fields.bookingpress_field_meta_key!='obra_soc_seguros' " class="bpa-form-control" :placeholder="form_fields.bookingpress_field_placeholder" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]">
															<el-option v-for="sel_data in JSON.parse(form_fields.bookingpress_field_values)" :key="sel_data.value" :label="sel_data.label" :value="sel_data.value" ></el-option>
														</el-select>
                                                        <el-select v-else class="bpa-form-control" :placeholder="form_fields.bookingpress_field_placeholder" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]">
															<el-option v-for="sel_data in JSON.parse(form_fields.bookingpress_field_values)" :key="sel_data.value" :label="''+sel_data.label" :value="sel_data.value" ></el-option>
														</el-select>
													</el-form-item>
                                                    
                                                                                                       
                                                    
													<el-form-item v-if='form_fields.bookingpress_field_type == "date" && form_fields.selected_services.includes(appointment_formdata.appointment_selected_service)' :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
															<el-date-picker :format="( 'true' == form_fields.bookingpress_field_options.enable_timepicker ) ? '<?php echo esc_html( $bookingpress_common_datetime_format ); ?>' : '<?php echo esc_html( $bookingpress_common_date_format ) ?>'" class="bpa-form-control bpa-form-control--date-picker" prefix-icon="" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" :placeholder="form_fields.bookingpress_field_placeholder" :type="'true' == form_fields.bookingpress_field_options.enable_timepicker ? 'datetime' : 'date'" :value-format="form_fields.bookingpress_field_options.enable_timepicker == 'true' ? 'yyyy-MM-dd hh:mm:ss' : 'yyyy-MM-dd'" :picker-options="filter_pickerOptions"></el-date-picker> <!-- @change="bookingpress_custom_field_date_change($event,form_fields.bookingpress_field_meta_key,form_fields.bookingpress_field_options.enable_timepicker)" -->
													</el-form-item>
													<el-form-item v-if='form_fields.bookingpress_field_type == "file" && form_fields.selected_services.includes(appointment_formdata.appointment_selected_service)' :prop="form_fields.bookingpress_field_meta_key" >
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-upload :action="form_fields.bpa_action_url" :ref="form_fields.bpa_ref_name" :data="form_fields.bpa_action_data" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" :on-success="BPACustomerFileUpload" :on-remove="BPACustomerFileUploadRemove" :file-list="form_fields.bpa_file_list" :on-error="BPACustomerFileUploadError" multiple="false" limit="1" :name="form_fields.bookingpress_field_meta_key" >
															<label for="bpa-file-upload-two" class="bpa-form-control--file-upload">
																<span class="bpa-fu__placeholder">Choose a file...</span>
																<span class="bpa-fu__btn">Browse</span>
															</label> 
														</el-upload>
													</el-form-item>								
												</div>
												<div v-else>
													<el-form-item v-if='(form_fields.bookingpress_field_type == "text" || form_fields.bookingpress_field_type == "email" || form_fields.bookingpress_field_type == "phone")' :prop="form_fields.bookingpress_field_meta_key" :class=" (form_fields.bookingpress_form_field_name=='dni')?' campo_dni ':'' ">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-input class="bpa-form-control" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" :placeholder="form_fields.bookingpress_field_placeholder" :style="(form_fields.bookingpress_form_field_name=='dni')?'width: calc(60% - 10px);margin-right: 10px;':''"></el-input>
													<div v-if="form_fields.bookingpress_form_field_name=='dni' " class="busquedadni" style="display: inline-block;align-self: center;">
                                                        <a  class="bpa-btn bpa-btn--primary" onclick="paciente_dni(this);" :data-field_key="form_fields.bookingpress_field_meta_key" style="display: flex;height: 30px;padding: 4px;justify-content: center;align-items: center;">Buscar</a>
                                                    </div>
                                    <?php 
                                    /*
                                      <!--       <div v-if="form_fields.bookingpress_form_field_name=='dni' " >     
                                            <el-form-item  prop="appointment_selected_customer">
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'Select Customer', 'bookingpress-appointment-booking' ); ?></span>
												</template>
												<el-select class="bpa-form-control" name="appointment_selected_customer" v-model="appointment_formdata.appointment_selected_customer"  @change="bookingpress_select_customer($event)" filterable placeholder="<?php esc_html_e( 'Start typing to fetch Customer', 'bookingpress-appointment-booking' ); ?>" remote reserve-keyword :remote-method="bookingpress_get_customer_list" :loading="bookingpress_loading"  popper-class="bpa-el-select--is-with-modal" v-cancel-read-only> 
                                        											
													<el-option value="add_new" label="Add New" v-if="bookingpress_edit_customers == 1">
														<i class="el-icon-plus" ></i>
														<span><?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?></span>
													</el-option>
													<el-option v-for="customer_data in appointment_customers_list" :key="customer_data.value" :label="customer_data.text" :value="customer_data.value">
														<span>{{ customer_data.text }}</span>
													</el-option>													
                                                </el-select>  												
											</el-form-item>
                                            </div> 
                                        -->
                                    */ 
                                    ?>
                                                    
                                                    </el-form-item>
													<el-form-item v-if='form_fields.bookingpress_field_type == "textarea"' :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-input class="bpa-form-control" :placeholder="form_fields.bookingpress_field_placeholder" type="textarea" :rows="3" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]"></el-input>
													</el-form-item>									
													<el-form-item v-if="form_fields.bookingpress_field_type == 'checkbox'" :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-checkbox-group v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields['bookingpress_field_meta_key']]">
															<el-checkbox class="bpa-front-label bpa-custom-checkbox--is-label" v-for="(chk_data, keys) in JSON.parse( form_fields.bookingpress_field_values)" :label="chk_data.value" :key="chk_data.value" :name="form_fields['bookingpress_field_meta_key']"><p v-html="chk_data.label"></p></el-checkbox>
														</el-checkbox-group>
													</el-form-item>
													<el-form-item v-if="form_fields.bookingpress_field_type == 'radio'" :prop="form_fields.bookingpress_field_meta_key"  :ref="'FormItem_'+form_fields.bookingpress_field_meta_key+'__ref'" > <!--  ref="expansionfields__ref"  ${form_fields.bookingpress_field_meta_key}     'is_particular'-->
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-radio class="bpa-form-label bpa-custom-radio--is-label" v-for="(chk_data, keys) in JSON.parse(form_fields.bookingpress_field_values)" :label="chk_data.label" :key="chk_data.value" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]">{{chk_data.label}}</el-radio>
													</el-form-item>
													<el-form-item v-if='form_fields.bookingpress_field_type == "dropdown"' :prop="form_fields.bookingpress_field_meta_key" :ref="'FormItem_'+form_fields.bookingpress_field_meta_key+'__ref'" >
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-select v-if="form_fields.bookingpress_field_meta_key!='obra_soc_seguros' "  class="bpa-form-control" :placeholder="form_fields.bookingpress_field_placeholder" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]"  >
															<el-option v-for="sel_data in JSON.parse(form_fields.bookingpress_field_values)" :key="sel_data.value" :label="sel_data.label" :value="sel_data.value" ></el-option>
														</el-select>
                                                        <el-select v-if="form_fields.bookingpress_field_meta_key=='obra_soc_seguros' " ref="obra_soc_seguros_ref"  class="bpa-form-control" :class="(appointment_formdata.bookingpress_appointment_meta_fields_value['is_particular'] =='Particular')?'hide_me':'' " filterable  :placeholder="form_fields.bookingpress_field_placeholder"  v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" @change="change_obra_soc_seguros()" >
                                                            <el-option v-for="(sel_data, k) in get_opciones_medico()" :label="sel_data.label" :value="sel_data.value" :key="sel_data.label" :disabled="sel_data.isDisabled || sel_data.$isDisabled || (sel_data.grupo!=false) || (sel_data.limitado && sel_data.cupos<1) " > <!-- :onclick="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]='' " -->
                                                                <div v-if="sel_data.grupo" class="option__grupo" style="z-index: 10;position: relative;" @click="appointment_formdata.bookingpress_appointment_meta_fields_value['obra_soc_seguros']=''; ">
                                                                    <span class="grupo__title">{{sel_data.label}}</span> 
                                                                </div>
                                                                <div v-else class="option__desc">
                                                                    <span class="option__title">{{sel_data.label}}</span> 
                                                                    <span v-if="sel_data.limitado && sel_data.cupos>0" class="cupos" >({{sel_data.cupos}} cupos disponibles)</span>
                                                                    <span v-if="sel_data.limitado && sel_data.cupos<1" class="cupos sin-cupos" >(Sin cupos disponibles)</span>
                                                                </div>
                                                            </el-option>
														</el-select>
													</el-form-item>
                                                    <div v-if="form_fields.bookingpress_field_meta_key=='obra_soc_seguros' " class="price">
                                                        
                                                        <div v-if="(appointment_formdata.bookingpress_appointment_meta_fields_value['is_particular'] =='Particular')" class="show">
                                                            <label class="bpa-form-label">Precio del servicio</label>
                                                            <span class="price">Costo <?php echo (!is_admin()?'de la consulta ':''); ?>particular: {{appointment_formdata.total_amount_with_currency}}</span>
                                                        </div>
                                                        
                                                    </div>
                                                   
                                            <div v-if="form_fields.bookingpress_field_meta_key=='obra_soc_seguros' " v-show="(expansion_obs_customer || obs_seguro_no_existe!='') && (appointment_formdata.bookingpress_appointment_meta_fields_value['is_particular'] !='Particular')" class="no_admite_obs_sel">
                                                    <span v-if="appointment_formdata.selected_staffmember=='' && obs_seguro_no_existe">Obra Social del paciente : <span class="no_obs_sel">{{obs_seguro_no_existe}}</span>.</span>
                                                    <span v-else>Obra Social del paciente : <span class="no_obs_sel">{{expansion_obs_customer || 'Sin especificar'}}</span>.</span>
                                                        
                                            </div>
                                                    
                                                    
													<el-form-item v-if='form_fields.bookingpress_field_type == "date"' :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
															<el-date-picker :format="( 'true' == form_fields.bookingpress_field_options.enable_timepicker ) ? '<?php echo esc_html( $bookingpress_common_datetime_format ); ?>' : '<?php echo esc_html( $bookingpress_common_date_format ) ?>'" class="bpa-form-control bpa-form-control--date-picker" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" prefix-icon="" :placeholder="form_fields.bookingpress_field_placeholder" :type="( 'true' == form_fields.bookingpress_field_options.enable_timepicker ) ? 'datetime' : 'date'" <?php if($bookingpres_default_time_format == 'H:i') { ?> :value-format="form_fields.bookingpress_field_options.enable_timepicker == 'true' ? 'yyyy-MM-dd HH:mm:ss' : 'yyyy-MM-dd'" <?php } else {?> :value-format="form_fields.bookingpress_field_options.enable_timepicker == 'true' ? 'yyyy-MM-dd hh:mm:ss' : 'yyyy-MM-dd'" <?php } ?> :picker-options="filter_pickerOptions"></el-date-picker> <!-- @change="bookingpress_custom_field_date_change($event,form_fields.bookingpress_field_meta_key,form_fields.bookingpress_field_options.enable_timepicker)" -->
													</el-form-item>
													<el-form-item v-if='form_fields.bookingpress_field_type == "file"' :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-upload class="bpa-form-control" :action="form_fields.bpa_action_url" :ref="form_fields.bpa_ref_name" :data="form_fields.bpa_action_data" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" :on-success="BPACustomerFileUpload" :on-remove="BPACustomerFileUploadRemove" :file-list="form_fields.bpa_file_list" :on-error="BPACustomerFileUploadError" multiple="false" limit="1" :name="form_fields.bookingpress_field_meta_key" >
															<label for="bpa-file-upload-two" class="bpa-form-control--file-upload" >
																<span class="bpa-fu__placeholder">Choose a file...</span>
																<span class="bpa-fu__btn">Browse</span>
															</label> 
														</el-upload>
                                                        
													</el-form-item>
                                                                                                       
												</div>
											</div>

                                            <div v-if="form_fields.is_anses_data" class="expansion_customer-anses-data" style="width: 100%;position: relative;top: -2px;">
                                                <span class="bpa-form-label" style="display: inline-block;margin: 4px 0 2px 0;">Datos Anses Vinculados al Nro. Documento</span> &Tab; 
                                                <a href="https://servicioswww.anses.gob.ar/ooss2/" target="_blank" style="display: inline-flex;float: right;margin: 0 4px;align-items: center;">Consultar visitando <strong class="anses-logo-strong" style="background-image: url('<?php echo bookingpress_mod_icon_helper('anses_logo.png'); #BKMOD_SRC . '/bookingmod-src/anses_logo.png'; #https://clinicaume.com.ar/turnos2/TEST_UME/wp-content/plugins/bookingpress-whatsapp/core/classes/bookingmod-src/ ?>');" > ANSES </strong> <span class="material-icons-round" style="font-size: 20px;">open_in_new</span> </a>
                                                <br>
                                                <div class="" style="padding: 0px 4px;display: flex;width: 100%;box-sizing: border-box;">
                                                    <div style="width: 100%;padding-bottom: 4px;"> 
                                                        
                                                        <!--<span style="font-size: 80%;display: block;width: 100%">Documento: {{appointment_formdata.bookingpress_appointment_meta_fields_value["text_C6kufq"]}}--> 
                                                        <!--TIPO: {{appointment_formdata.bookingpress_appointment_meta_fields_value["tipo_doc"]}}-->
                                                        <!--</span>-->
                                                                                                              
                                                        <div style="display: flex;align-items:center;gap:10px;">
                                                            <el-input class="bpa-form-control anses-input"  v-model="appointment_formdata.bookingpress_appointment_meta_fields_value['text_C6kufq']" placeholder="Nro. Documento del formulario" ></el-input>
                                                            <el-input class="bpa-form-control anses-input"  v-model="expansion_include_apelname" placeholder="APELLIDO NOMBRE" ></el-input>
                                                            <!--<input type="text" v-model="expansion_include_apelname" placeholder="APELLIDO NOMBRE" />-->
                                                            
                                                            <el-button class="bpa-btn__medium" @click="expansion_drawer_msg = true;expansion_anses_get_customer();" type="primary">Consultar</el-button>

                                                        </div>
                                                        
                                                    </div>
                                                    
<div class="expansion-chat chat-container">
    <!-- Ventana de Chat -->
    <transition name="el-zoom-in-bottom">
      <el-card v-show="expansion_drawer_msg" class="chat-window" shadow="always">
        <div slot="header" class="chat-header">
          <span class="expansion-chat-title">Consulta Anses</span>
          <img class="anses-logo-img" src="https://www.anses.gob.ar/themes/custom/ansessite/images/logo_anses_ch.png" style="height: 25px;/* background: #4a558d; */border-radius: 15px;filter: brightness(0.5);padding: 0 60px 0 0px;">
          <el-button type="text" icon="el-icon-close" @click="expansion_drawer_msg = false"></el-button>
          
          <div style="display: none;width: 100%;">
            <span>Documento: {{appointment_formdata.bookingpress_appointment_meta_fields_value["text_C6kufq"]}}</span>
          </div>
        </div>
        <div class="chat-content bpa-tsd--loader">
          <!-- Aquí van tus mensajes -->
                                                    
                                                    <div ref="expansion_anses_data_show" class="expansion_customer-anses-data-show" style="">
                                                    
                                                        <strong v-if="expansion_customer_anses.doc_requerido" style="color: crimson;opacity: 0.5;">Se requiere Nro. Documento</strong>
                                                        <div v-if="expansion_customer_anses.data">
                                                        <strong style="color: seagreen;opacity: 0.7;padding: 5px 0;display: block;">Resultado</strong>
                                                            <div class="anses-personas" v-if="expansion_customer_anses.data.personas_encontradas.length" v-for="anses_persona in expansion_customer_anses.data.personas_encontradas" >
                                                                <div class="anses-individual">
                                                                    <div class="anses-pers">
                                                                        <span>Tipo doc: </span> <strong>{{ anses_persona['Tipo Doc.']}}</strong>&Tab;
                                                                        <span>Documento: </span> <strong>{{anses_persona['Nro. Doc.']}}</strong>&Tab;
                                                                        <span>Nombre: </span> <strong>{{anses_persona['Apellido y Nombre']}}</strong>&Tab;
                                                                    </div>
                                                                    
                                                                    <span class="anses-obras-result" v-for="anses_obra in expansion_customer_anses.data.obras_sociales" >
                                                                        <span class="anses-obs" v-if="anses_obra['rel_cuil'].replace( /\D/g, '') == anses_persona['Cuil'].replace( /\D/g, '')">
                                                                           <span class="anses-obs-info">
                                                                                <span style="color: darkblue;">{{anses_obra['C\u00f3digo']}}</span>&Tab;
                                                                                <span style="color: darkblue;">{{anses_obra["Descripci\u00f3n"]}}</span>&Tab;
                                                                                <span style="color: darkblue;">{{anses_obra["Condici\u00f3n"]}}</span>&Tab;
                                                                                <span style="color: darkblue;">{{anses_obra["Situaci\u00f3n"]}}</span>
                                                                           </span>
                                                                           <div v-if="serverObra[ anses_obra['C\u00f3digo'] ]">
                                                                                <div style="color: dodgerblue;">{{ serverObra[anses_obra['C\u00f3digo']].nombre | '' }}</div>
                                                                                <div><span class="anses-tipo-dato">sigla: </span>{{serverObra[anses_obra['C\u00f3digo']].sigla | ' ' }}</div>&Tab;
                                                                                <div><span class="anses-tipo-dato">localidad: </span>{{ serverObra[anses_obra['C\u00f3digo']].localidad | ' ' }}</div>&Tab;
                                                                           </div>
                                                                        </span>
                                                                        <span class="anses-empty-obs">No se encontro obra social<br>( posible criterio - apellido nombre )</span>
                                                                        
                                                                    </span>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="anses-personas" v-if="!expansion_customer_anses.data.personas_encontradas.length">
                                                                <div>
                                                                    <strong style="color: crimson;">No se encontro personas en Anses.</strong>
                                                                    <br><br>
                                                                    <span>puede consultar sitios como renaper</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!--"Cuil":"27-06607780-8","Apellido y Nombre":"MESA DELFINA","Tipo Doc.":"LC","Nro. Doc.":"6607780"
                                                        "Código":"500807","Descripción":"I.N.S.S.J.Y P.","Condición":"Titular","Situación":"PASIVO","rel_cuil":"27 - 06607780 - 8","CODEM":"" -->
                                                        
                                                        
                                                    </div>
                                                    
<!--<p>¿En qué podemos ayudarte?</p>-->
        
            <div 
            class="bpa-btn--loader__circles" 
            style="min-width: 40px;justify-content: center;align-content: center;width: 100%;height: 100%;position: absolute;background: #ffffffd1;"
            :style="{display: expansion_customer_anses.is_loading?'flex':''}"
            >
                <div></div> <div></div> <div></div>
            </div>
        
        </div>
        <!--
        <div class="chat-footer">
          <el-input placeholder="Escribe un mensaje..." v-model="message">
            <el-button slot="append" icon="el-icon-send"></el-button>
          </el-input> 
          <el-button type="text" icon="el-icon-close" @click="expansion_drawer_msg = false"></el-button>
        </div>
        -->
      </el-card>
    </transition>

    <!-- Botón Flotante -->
<!--
    <el-button
      type="primary"
      icon="el-icon-chat-dot-round"
      circle
      class="chat-button"
      @click="expansion_drawer_msg = !expansion_drawer_msg"
    ></el-button>
-->
</div>
                                                    
                                                   <!-- 
                                                    <span class="material-icons-round" @click="{if($refs.expansion_anses_data_show) $refs.expansion_anses_data_show[0].style.height='30px';}" 
                                                    style="align-self: center;color: steelblue;cursor: pointer;margin-left: 0px;border-radius: 3px;font-size: 25px;font-weight: 500;">compress</span>
                                                   --> 
                                                </div>
                            </div>
										</el-col>
									
							</template>
						</el-form>	
                        
                        
                        
                        
                        
				
			

<?php
},20);


add_action( 'admin_footer', function(){
    //if( !isset($_GET['obs']) ) return;
    
    if( !isset($_GET['page']) && $_GET['page'] != 'bookingpress_appointments' ) return;
    
    
    //echo "<script>alert('Hola')</script>";


?>
<!-- HTML -->
<style scoped>
/* Expanion CHAT */
.expansion-chat.chat-container {
  box-sizing: border-box;
  position: fixed;
  right: 20px;
  bottom: 20px;
  z-index: 2000; /* Asegura que esté por encima de otros elementos */
}
.expansion-chat.chat-container * {
    box-sizing: border-box;
}

.expansion-chat .chat-button {
  width: 60px;
  height: 60px;
  font-size: 24px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.expansion-chat .chat-window {
    width: min(450px, calc(100vw - 20px - 50px) );
    margin-bottom: 15px;
    border-radius: 12px;
    height: 80vh;
    display: flex;
    flex-direction: column;
}

.expansion-chat .chat-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.expansion-chat .el-card__body {
    width: 100%;
    height: 100%;
    padding: 15px 20px;
    box-sizing: border-box;
    height: calc(100% - 50px);
    /* height: auto; */
    /* margin-bottom: 20px; */
}

.expansion-chat .chat-content {
    /* height: 300px; */
    overflow-y: auto;
    height: 100%;
    position: relative;
}
.expansion-chat .el-card__header {
    padding: 5px 20px;
}
</style>
<style>
:root{
    --principal-green: #22B49B;/*#2dc2a5;*/
    --principal-disable: #a6a6a6;
    --principal-font: Arial !important;
    
}

.desc_int {
    position: absolute;
    /* bottom: 20px; */
    margin: 2px 0;
    //display: none;
    background: white;
    padding: 20px;
    width: 70vw;
    min-height: 80px;
    border: 1px solid lightgray;
    opacity: 0;
    right: 0;
    border-radius: 10px;
    box-sizing: border-box;
    z-index: 0;
    right: 100vw;
    transition: all 0.5s;
    color: #3c035301;
}
span.info_int {
    float: right;
    cursor: pointer;
    //background: ghostwhite;
    z-index: 1;
    position: relative;
    z-index: 2;
}
span.info_int:hover {
    color: cornflowerblue;
}
span.info_int:hover .desc_int {
    color: #270536fa;
    display: block;
    z-index: 1;
    opacity: 1;
    right: 0;
}
.bpa-dialog-heading{
    z-index: 3;
}

.option__desc {
    width: calc(100% - 20px);
    white-space: normal;
    word-break: break-word;
}
.option__title {
    //word-break: break-word;
    //white-space: normal;
}
.cupos {
    white-space: nowrap;
    color: var(--principal-green);
    float: right;
}
.cupos.sin-cupos {
    color: #ff0000f2;
    //float: right;
    //word-break: keep-all; 
}
.busquedadni {
    width: calc(40% - 6px);
    text-align: center;
    cursor: pointer;
    margin-top: 5px;
}

/*
.campo_dni {
    margin-bottom: 36px;
}
*/
.hide_me{
    border: 5px solid blue;
}
.el-form-item:has(.hide_me) {
    /* display: none; */
    opacity: 0;
    <?php echo is_admin()? 'height:0;': 'margin-top: -100px;' ?>
    transition: all 1s;
    z-index: -1;
    position: relative;
}

div.price {
    opacity: 0;
    transition: all 0.8s ease;
    transform: scale(0.8);
    font-size: 18px;
    color: var(--bpa-pt-main-green);
}
div.price:has(.show) {
    opacity: 1;
    transform: scale(1);
}

.bpa-dialog--fullscreen .el-form>.el-col {
    margin-bottom: 32px;
}

/* //2026 updates  */
.el-select-dropdown .el-select-dropdown__list .el-select-dropdown__item {
    white-space: break-spaces;
}

/* anses results */
/* width: 70%; position: relative; border: 1px solid lightblue; border-radius: 3px; padding: 5px; transition: all 0.2s; height: 40px; min-height: 30px; max-height: 350px; resize: vertical; overflow-y: scroll; */

.expansion_customer-anses-data {
    width: 100%;
    /* outline: 1px solid lightblue; */
    padding: 0px 4px;
    border-radius: 3px;
}


.expansion_customer-anses-data-show {
    width: 70%;
    position: relative;
    border: 1px solid lightblue;
    border-radius: 3px;
    padding: 5px;
    transition: 0.2s;
    height: 154px;
    min-height: 30px;
    max-height: 350px;
    resize: vertical;
    overflow-y: scroll;
}

.expansion-chat .expansion_customer-anses-data-show {
    width: 100%;
    border: 1px solid lightgray;
    box-sizing: border-box;
    max-height: unset;
    height: auto;
    resize: none;
    min-height: 100px;
    overflow: unset;
}

.expansion-is-anses-data {
    min-width: calc( 100% - 34%);
}

.anses-input .el-input__inner {
    padding: 8px 16px;
}


.anses-obs-info {
    padding: 2px;
    /* border: 1px solid #bbd5f242; */
    display: inline-flex;
    background: #dae7f60a;
    width: 100%;
    justify-content: space-between;
    gap: 10px;
    text-align: center;
}

.anses-empty-obs {
    display: block;
    text-align: center;
}

.anses-obs + .anses-empty-obs {
    display: none;
    opacity: 0.3;
}
/*
span:has(>.anses-empty-obs) + span>.anses-empty-obs {
    display: none;
}
*/
span:has(>.anses-empty-obs) + :has(>.anses-empty-obs) {
    display: none;
}

/*
.anses-pers {
    margin-bottom: 4px;
    display: inline-block;
    padding: 4px 10px;
    background: honeydew;
    border-radius: 3px;
    border: 1px solid lightblue;
    border: 1px solid lime;
}
.anses-pers>* {
    display: block;
}
*/

.anses-individual .anses-obras-result {
    display: block;
    margin: 5px 10px;
    padding: 5px;
    border: 1px solid lavender;
    width: calc(100% - 10px);
    box-sizing: border-box;
}
.anses-pers {
    margin-bottom: 5px;
    display: flex;
    padding: 4px 10px;
    background: honeydew;
    border-radius: 3px;
    border: 1px solid lightblue;
    border: 1px solid lime;
    /* width: 380px; */
    /* vertical-align: top; */
    flex-wrap: wrap;
    align-content: flex-start;
    justify-content: flex-start;
    word-break: keep-all;
    margin: 5px 5px 5px 0;
    max-width: min(500px, 95%);
}
.anses-pers>* {
    display: inline-block;
    width: calc(50% - 4px);
}

.anses-personas {
    border-bottom: 1px dashed #80800038;
    padding-bottom: 10px;
    margin-bottom: 5px;
}
.anses-personas * {
    word-break: keep-all;
}

.anses-tipo-dato {
    color: darkslateblue;
}


.expancion-chat-title {
    animation: colorChange 4s infinite alternate ease-in-out;
}

@keyframes colorChange {
  0% {
    color: #176370;
  }
  100% {
    color: #2b1770;
  }
}

@media (max-width: 900px){
    .busquedadni { 
    width: 100%;
}
div:has(>.busquedadni)>div {
    /*width: 100% !important;*/
    
}
}
@media (min-width: 1200px){
    .busquedadni { 
    /*width: 100%;*/
}
div:has(>.busquedadni)>div {
    /*width: 100% !important;*/
}
}

//bpa-form-control
</style>
<script id="bk_mod_booking">
/*
if(Vue.config !=null){
    console.log( Vue.config );
Vue.config.msg = 'hello';

//Vue.config.optionMergeStrategies.data('msg',{ });

Vue.config.optionMergeStrategies.data(null,{msg:hello} );
   
;

}
*/

var maxApp;
var bk_app;
var add_price = 1;
var turno_price = 0;
/*
maxApp.config_medico_get_options = function(){
    return [];
};*/
var config_medico__options = [ {label:"particular", value: "particular", limitado:false, cupos:3, grupo:false} ];
var configuracion_medico = [];
configuracion_medico["obras_sociales"] = [{label:"particular", value: "particular", limitado:false, cupos:3, grupo:false}]; 


var data_turno = {medico:0,date:"",hora:""};
var data_turno_old;
var opss = configuracion_medico["obras_sociales"];
var obras_is_loading = false;


//DOMContentLoaded
window.addEventListener("load", function(){
    
    maxApp = app;
    maxApp.first_load = 0;
    maxApp.backup_methods = [];
    obras_is_loading = false;
    
    if(maxApp.customer_rules !=null){
        if(maxApp.customer_rules.email[0].required !=null){
            maxApp.customer_rules.email[0].required = false;
        }
    }
    
    maxApp.backup_methods.open_add_appointment_modal = maxApp.open_add_appointment_modal;
    maxApp.open_add_appointment_modal = function(field){
        maxApp.obs_seguro_no_existe = '';
        configuracion_medico.desc_int = '';
        maxApp.first_load = 0;
        maxApp.appointment_formdata.bk_mod_original_date = null;
        //2026 updates
        maxApp.expansion_obs_customer = null;
        
        maxApp.backup_methods.open_add_appointment_modal();
        
        if( maxApp.appointment_formdata.appointment_update_id == 0){
            maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value['send_whatsapp_notification'] = true;
            
            setTimeout( ()=>{
            maxApp.first_load = 1;
            },800);
        }
        
        setTimeout( ()=>{
            //if(maxApp.$refs.obra_soc_seguros_ref) Object.values(maxApp.$refs.obra_soc_seguros_ref)[0].$on('change', obs_soc_seguros_validate);
            
        },200);
        //console.log("opeenn o loop infinito? ");
        //setTimeout(()=>{move_fields()},10);
    };
    
    maxApp.backup_methods.bookingpress_change_staff = maxApp.bookingpress_change_staff;
    maxApp.bookingpress_change_staff = function(){
        maxApp.backup_methods.bookingpress_change_staff();
        turno_price = maxApp.appointment_formdata.service_price_without_currency; //bookingpress_price_with_currency_symbol(price);
    };
    
    //maxApp.editAppointmentData  = function (index,row, calendar = false, elm_target, is_more ){};
    
    	maxApp.backup_methods.saveCustomerDetails = maxApp.saveCustomerDetails;
        maxApp.saveCustomerDetails = function(){
                const vm2 = maxApp
                vm2.$refs['customer'].validate((valid) => {
                    if(valid){
                        vm2.is_disabled = true
                        vm2.is_display_save_loader = '1'
                        var postdata = vm2.customer;
                        postdata.action = 'bookingpress_add_customer';
						postdata._wpnonce ="<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>";
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                        .then(function(response){
                            vm2.is_disabled = false
                            vm2.is_display_save_loader = '0'                            
                            vm2.$notify({
                                title: response.data.title,
                                message: response.data.msg,
                                type: response.data.variant,
                                customClass: response.data.variant+'_notification',
                                duration:1500,
                            });
                            if (response.data.variant == 'success') {
                                vm2.open_customer_modal = false
                                vm2.customer.update_id = response.data.customer_id
								vm2.bookingpress_get_customers_details(response.data.customer_id);
                                vm2.bookingpress_retrieve_custom_field_values( response.data.customer_id );
                            }
                            vm2.savebtnloading = false
                        }).catch(function(error){
                            vm2.is_disabled = false
                            vm2.is_display_loader = '0'
                            console.log(error);
                            vm2.$notify({
                                title: 'Error',
                                message: 'Algo salió mal..',
                                type: 'error',
                                customClass: 'error_notification',
                                duration:1500,
                            });
                        });
                    }
                })
            };
    
    
    
    
    
    maxApp.config_medico_get_options = function(){
        
        return configuracion_medico["obras_sociales"];
    }
    
    maxApp.$on('ParticularObsChanged', obs_soc_seguros_validate)
    
});

function obs_soc_seguros_validate(){
    let is_valid = 1;
    if(app && !app.open_appointment_modal){
        return is_valid;
    }
    
    if( maxApp.$refs.obra_soc_seguros_ref && maxApp.$refs.obra_soc_seguros_ref[0].elFormItem ){
        maxApp.$refs.obra_soc_seguros_ref[0].elFormItem.validateState = "success";
    }
    //console.log("__obs_soc_seguros_validate__changeeeeeeeee obra ");
    /*
    if( maxApp.$refs.obra_soc_seguros_ref && maxApp.$refs.obra_soc_seguros_ref[0].elFormItem ){
            console.log("____changeeeeeeeee obra ");
        maxApp.$refs.obra_soc_seguros_ref[0].elFormItem.validateMessage = "Obra Sin cupos disponibles este dia";
        maxApp.$refs.obra_soc_seguros_ref[0].elFormItem.validateState = "success";
    }else{//si no encuentra lareferencia definitivamente limpiamos el valor
        maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
    }
    */
    val = null;
    obs_a_or_c = (maxApp.appointment_formdata.expansion_obra_soc_seguro?maxApp.appointment_formdata.expansion_obra_soc_seguro : (maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"]? maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] : maxApp.expansion_obs_customer) );
    val = configuracion_medico['obras_sociales'].find((sel_data) => sel_data.value ==  obs_a_or_c/*maxApp.appointment_formdata.expansion_obra_soc_seguro*/ /*maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"]*/ );
    if( val == null ){
        if( !Number(maxApp.appointment_formdata.appointment_update_id) || maxApp.appointment_formdata.bk_mod_original_date != maxApp.appointment_formdata.appointment_booked_date ){
            maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
            is_valid = 0;
        }
    }else{
        //if( Number(maxApp.appointment_formdata.appointment_update_id) ){
            //PASAMOS EL IF UPDATE_ID A LA REHABILITACION DE CUPOS
            if(maxApp.appointment_formdata.bk_mod_original_date == null) maxApp.appointment_formdata.bk_mod_original_date = maxApp.appointment_formdata.appointment_booked_date;
            
            if(val.limitado && (maxApp.appointment_formdata.bk_mod_original_date == maxApp.appointment_formdata.appointment_booked_date) ){
                if( Number(maxApp.appointment_formdata.appointment_update_id) ) val.cupos = Number(val.cupos)<1? 1: val.cupos;
                if(maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"]=="") maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = val.value;
            }
            
            if( val.limitado && (Number(val.cupos)<1) ){
            //Comentamos la limpieza del valor y asignamos stado de error y mensaje al formitem por referencia
                //maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
                if( maxApp.$refs.obra_soc_seguros_ref && maxApp.$refs.obra_soc_seguros_ref[0].elFormItem ){
                    //console.log("__obs_soc_seguros_validate__ASIGNANDO VALIDATESTATE obra ");
                    obra_soc_error_msg = "Obra no disponible";
                    if( Number(maxApp.appointment_formdata.appointment_update_id) ) obra_soc_error_msg = "Obra Sin cupos disponibles este dia";
                    maxApp.$refs.obra_soc_seguros_ref[0].elFormItem.validateMessage = obra_soc_error_msg;
                    maxApp.$refs.obra_soc_seguros_ref[0].elFormItem.validateState = "error";
                }else{//si no encuentra lareferencia definitivamente limpiamos el valor
                    maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
                }
                //console.log("__obs_soc_seguros_validate__la obra esta sin cupos este dia", val);
                
                is_valid = 0;
            }
        //}
    }
    return is_valid;
}


async function set_medic_opss_admin(appointment_formdata){
    options = [];
    if(maxApp.appointment_formdata != null){
            
            if(maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] == "particular"){
                if(maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["is_particular"] != "Particular")
                    maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
                    add_price = 0;
            }else{
                if(maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["is_particular"] == "Particular")
                    maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "particular";
                    add_price = 1;
            }
            
        stp_f_fata = maxApp.appointment_formdata;
        
        data_turno_old = JSON.stringify(data_turno);
        data_turno.medico = stp_f_fata.selected_staffmember;
        data_turno.date = stp_f_fata.appointment_booked_date;
        data_turno.hora = stp_f_fata.appointment_booked_time;
        data_turno.service_id = stp_f_fata.appointment_selected_service;
        //options_for_member = medico;
        if( data_turno_old != JSON.stringify(data_turno) ){
        //{label: "particular", value: "particular", limitado: false, cupos: 0, grupo: false}
        
    // # EN PRUEBA CONDICION obras_is_loading 
        if(obras_is_loading == false) configuracion_medico['obras_sociales'] = [];
        //##################################configuracion_medico['obras_sociales'] = [{label: "Cargando", value: "   ", "$isDisabled":true,limitado: false, cupos: 0, grupo: false}];
        
        obras_is_loading = true;
        maxApp.obras_is_loading = true;
        
        //maxApp.toggleBusy();
        //maxApp.is_display_loader = "1";
        bk_mod_postdata = {"action":"get_bookings_day",  "appoint_data": data_turno };
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( bk_mod_postdata ) )
    					.then( function (response) {
    						//vm.appointment_step_form_data = response.data.appointment_data
                            obras_is_loading = false;
                            maxApp.obras_is_loading = false;
                            
                            if( response.data ){
                                obras_is_loading = false;
                                maxApp.obras_is_loading = false;
                                configuracion_medico['obras_sociales'] = [];
                                //Acepta solo particular ADMIN version - Front version in vueappmod computed obra_soc_seguros
                                if( response.data.is_only_particular_service || response.data.solo_particular ){
                                    if( document.querySelector('label[for="is_particular"]') ){
                                        if( document.querySelector('label[for="is_particular"] .acepta_solo_particular') ){
                                            document.querySelector('label[for="is_particular"] .acepta_solo_particular').remove();
                                        }
                                        if( !document.querySelector('label[for="is_particular"] .acepta_solo_particular') ){
                                            let acepta_particular_msg = response.data.is_only_particular_service? 'Especialidad/M&eacute;dico admite solo Particular.' : 'M&eacute;dico admite solo Particular.';
                                            document.querySelector('label[for="is_particular"]').innerHTML += '<span class="acepta_solo_particular el-tag">'+acepta_particular_msg+'</span>';
                                            app.appointment_formdata.bookingpress_appointment_meta_fields_value.is_particular = '';
                                            app.appointment_formdata.bookingpress_appointment_meta_fields_value.is_particular = 'Particular';
                                        }
                                    }
                                }else{
                                    if( document.querySelector('label[for="is_particular"] .acepta_solo_particular') ){
                                        document.querySelector('label[for="is_particular"] .acepta_solo_particular').remove();
                                        app.appointment_formdata.bookingpress_appointment_meta_fields_value.is_particular = '';
                                    }
                                }
                                
                                if( response.data['obras_sociales'] != null && configuracion_medico['obras_sociales'] != undefined ){
                                    //for(z in response.data['obras_sociales']) if(response.data['obras_sociales'][z].value==null ) response.data['obras_sociales'].splice(z,1);
                                    configuracion_medico = response.data;
                                    if( configuracion_medico['obras_sociales'] !=  null  ){
                                        if(maxApp.appointment_formdata.bk_mod_original_date == null) maxApp.appointment_formdata.bk_mod_original_date = maxApp.appointment_formdata.appointment_booked_date;
                                        maxApp.change_obra_soc_seguros();
                                        /*
                                        val = null;
                                        //val = configuracion_medico['obras_sociales'].find((sel_data) => sel_data.value ==  maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] );
                                        val = configuracion_medico['obras_sociales'].find((sel_data) => sel_data.value ==  maxApp.appointment_formdata.expansion_obra_soc_seguro );
                                        if( val == null ){
                                            if( !Number(maxApp.appointment_formdata.appointment_update_id) || maxApp.appointment_formdata.bk_mod_original_date != maxApp.appointment_formdata.appointment_booked_date ) maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
                                        }else{
                                            if( maxApp.appointment_formdata.appointment_update_id ){
                                                if(maxApp.appointment_formdata.bk_mod_original_date == null) maxApp.appointment_formdata.bk_mod_original_date = maxApp.appointment_formdata.appointment_booked_date;
                                                if(val.limitado && (maxApp.appointment_formdata.bk_mod_original_date == maxApp.appointment_formdata.appointment_booked_date) ){
                                                    val.cupos = Number(val.cupos)<1? 1:val.cupos;
                                                    if(maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"]=="") maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = val.value;
                                                }else if( val.limitado && (Number(val.cupos)<1) ){
                                                //Comentamos la limpieza del valor y asignamos stado de error y mensaje al formitem por referencia
                                                    //maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
                                                    if( maxApp.$refs.obra_soc_seguros_ref && maxApp.$refs.obra_soc_seguros_ref[0].elFormItem ){
                                                        console.log("ASIGNANDO VALIDATESTATE obra ");
                                                        maxApp.$refs.obra_soc_seguros_ref[0].elFormItem.validateMessage = "Obra Sin cupos disponibles este dia";
                                                        maxApp.$refs.obra_soc_seguros_ref[0].elFormItem.validateState = "error";
                                                    }else{//si no encuentra lareferencia definitivamente limpiamos el valor
                                                        maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
                                                    }
                                                    console.log("la obra esta sin cupos este dia", val);
                                                }
                                            }
                                        }
                                        */
                                    }
                                    options = configuracion_medico['obras_sociales'];
                                    maxApp.$forceUpdate();
                                    maxApp.first_load = 1;
                                    return configuracion_medico;
                                }
                                
                            }
                            //maxApp.is_display_loader = "0";
                            //maxApp = obs.max;
                            //obs.loadOptions();
                            //maxApp.toggleBusy();
                             
    					});
         }else{
                        if( configuracion_medico['obras_sociales'] !=  null  ){
                            maxApp.change_obra_soc_seguros();
                                        /*
                                        val = null;
                                        //obs_a_or_c obra social en reserva o cliente
                                        obs_a_or_c = (maxApp.appointment_formdata.expansion_obra_soc_seguro?maxApp.appointment_formdata.expansion_obra_soc_seguro : (maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"]? maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] : maxApp.expansion_obs_customer) );
                                        val = configuracion_medico['obras_sociales'].find((sel_data) => sel_data.value == obs_a_or_c );
                                        if( val == null ){
                                            console.log("ASIGNAr VALIDATESTATE 2 obra ");
                                            if( !Number(maxApp.appointment_formdata.appointment_update_id)  ){
                                                maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
                                            }else{
                                                if( maxApp.appointment_formdata.bk_mod_original_date != maxApp.appointment_formdata.appointment_booked_date ){
                                                    if( maxApp.$refs.obra_soc_seguros_ref && maxApp.$refs.obra_soc_seguros_ref[0].elFormItem ){
                                                        console.log("ASIGNANDO VALIDATESTATE obra ");
                                                        maxApp.$refs.obra_soc_seguros_ref[0].elFormItem.validateMessage = "Obra no disponible";
                                                        maxApp.$refs.obra_soc_seguros_ref[0].elFormItem.validateState = "error";
                                                    }else{//si no encuentra lareferencia definitivamente limpiamos el valor
                                                        maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
                                                    }
                                                }
                                            }
                                        }
                                        */
                        }
                        
                        obras_is_loading = false;
                        maxApp.obras_is_loading = false;
                        return configuracion_medico;
         }
     }
    return;
}

function paciente_dni(but){
    dni_key="";//text_C6kufq
    dni_value="";
    if(but != null){
        dni_key = but.getAttribute("data-field_key");
        if(maxApp !=null){
            if(maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value !=null){
                if(dni_key != ""){
                    dni_value = maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value[dni_key];
                }
            }
        }
    }
    //alert(dni_key);
    dni_data = {"dni_key": dni_key, "dni_value": dni_value};
    
    bk_mod_postdata = {"action":"get_customer_by_dni",  "appoint_data": dni_data };
                    axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( bk_mod_postdata ) )
					.then( function (response) {
						//vm.appointment_step_form_data = response.data.appointment_data
                        if( response.data ){
                            if( response.data.msg == "success"){
                                if( response.data.result.length ){
                                    maxApp.appointment_customers_list = response.data.result;
                                    document.querySelector('[name="appointment_selected_customer"]').focus();
                                    
                                }else{
                                    if( Number(response.data.id) ){
                                        maxApp.bookingpress_retrieve_custom_field_values( response.data.id );
                                    }else{
                                        if(!maxApp.$notify){
                                            alert( "no se encontro paciente" );
                                        }else{
                                            maxApp.$notify({
                                                title: 'Sin resultados',
                                                message: "No se encontro paciente",
                                                type: "success",
                                                customClass: "success"+'_notification',
                                                duration:1500,//<?php echo intval($bookingpress_notification_duration); ?>,
                                            });
                                        } 
                                    }
                                }
                            }else{
                                if(!maxApp.$notify){
                                    alert( response.data.msg );
                                }else{
                                    maxApp.$notify({
                                        title: 'Error',
                                        message: response.data.msg,
                                        type: "error",
                                        customClass: "error"+'_notification',
                                        duration:1500,//<?php echo intval($bookingpress_notification_duration); ?>,
                                    });
                                } 
                            }
                            
                        }
                        //maxApp.is_display_loader = "0";
                        //maxApp = obs.max;
                        //obs.loadOptions();
                         
					})
                    .catch(function(e){
                        console.log(e)
                    });
    
}

async function move_fields(){
    let input_dni = await document.querySelector('.campo_dni');
    let input_sel_cus = document.querySelector('[name=appointment_selected_customer]');
    if( input_dni == null ){
        let input_dni = await document.querySelector('.campo_dni');
    }
    
    input_sel_cus.parentElement.parentElement.after(input_dni);
    
}


</script>
<!-- FIN HTML -->
<?php
},20);


/*
<!-- Drawer configurado como ventana pequeña inferior derecha -->
<!--
<el-drawer
title="Nuevo Mensaje"
:visible.sync="expansion_drawer_msg"
direction="rtl"
size="300px"
:with-header="true"
:modal="false"
custom-class="msg-drawer"
>
<span>Contenido del mensaje aquí...</span>
</el-drawer>
-->
*/

?>