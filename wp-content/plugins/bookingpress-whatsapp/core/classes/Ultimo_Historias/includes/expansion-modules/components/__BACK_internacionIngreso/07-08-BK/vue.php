<?php 

global $bookingpress_notification_duration;


$module_template_file = __DIR__ . '/template.php';
if( !file_exists($module_template_file) ){
    $module_template_file = false;
}

$bookingpress_notification_duration = $bookingpress_notification_duration? $bookingpress_notification_duration: 1500;

?>
export default {
        props: ['tab','int_form_number'],
        template: `<?php if($module_template_file) include_once $module_template_file; ?>`,
        data(){
            
            <?php 
                $bookingpress_appointment_vue_data_fields = [];
                $bookingpress_appointment_vue_data_fields = apply_filters('bookingpress_modify_appointment_data_fields', $bookingpress_appointment_vue_data_fields);
                echo 'let bookingpress_return_data = ' . wp_json_encode($bookingpress_appointment_vue_data_fields).';';
            ?>
            
            let addCustomerFields = [
{
    "bookingpress_form_field_id": "0",
    "bookingpress_form_field_name": "obra_nro_afiliado",
    "bookingpress_field_required": "0",
    "bookingpress_field_label": "Nº Afiliado",
    "bookingpress_field_placeholder": "Nro. Afiliado",
    "bookingpress_field_error_message": "ingrese Numero de afliado",
    "bookingpress_field_is_hide": "0",
    "bookingpress_field_position": "4",
    "bookingpress_field_is_default": "0",
    "bookingpress_created_at": "2024-04-15 18:31:24",
    "bookingpress_is_customer_field": "1",
    "bookingpress_field_type": "text",
    "bookingpress_field_options": {
        "layout": "1col",
        "used_for_user_information": "true",
        "separate_value": false,
        "visibility": "always",
        "minimum": "",
        "maximum": "",
        "attach_with_email": false,
        "selected_services": []
    },
    "bookingpress_field_values": [],
    "bookingpress_field_meta_key": "obra_nro_afiliado",
    "bookingpress_field_css_class": "nro_afiliado",
    "bookingpress_field_key": ""
},
{
    "bookingpress_form_field_id": "0",
    "bookingpress_form_field_name": "estado_civil",
    "bookingpress_field_required": "0",
    "bookingpress_field_label": "Estado civil",
    "bookingpress_field_placeholder": "Estado civil",
    "bookingpress_field_error_message": "ingrese Estado civil",
    "bookingpress_field_is_hide": "0",
    "bookingpress_field_position": "4",
    "bookingpress_field_is_default": "0",
    "bookingpress_created_at": "2024-04-15 18:31:24",
    "bookingpress_is_customer_field": "1",
    "bookingpress_field_type": "text",
    "bookingpress_field_options": {
        "layout": "1col",
        "used_for_user_information": "true",
        "separate_value": false,
        "visibility": "always",
        "minimum": "",
        "maximum": "",
        "attach_with_email": false,
        "selected_services": []
    },
    "bookingpress_field_values": [],
    "bookingpress_field_meta_key": "estado_civil",
    "bookingpress_field_css_class": "estado_civil",
    "bookingpress_field_key": ""
},
];
            bookingpress_return_data.bookingpress_customer_fields.splice(3,0, ...addCustomerFields);
            bookingpress_return_data.all_obras_y_seguros = all_obras_y_seguros;
            return {
                titulo: 'Ingreso internación',
                "bookingpress_tel_input_props": {"defaultCountry":"AR","inputOptions":{"placeholder":"Introduzca su n\u00famero de tel\u00e9fono"},"validCharactersOnly":true},
                "days_off_disabled_dates":"","v_calendar_disable_dates":[],"v_calendar_attributes":[],"v_calendar_attributes_current":[],"v_calendar_default_label":[],"v_calendar_check_month_dates":false,"v_calendar_next_month_dates":[],
                
                "bookingpress_decimal_points":2,"bookingpress_currency_separator":"dot-comma","bookingpress_currency_name":"ARS","bookingpress_currency_symbol":"$","bookingpress_currency_symbol_position":"before","bookingpress_custom_comma_separator":"","bookingpress_custom_thousand_separator":"",
                "bookingpress_selected_date_range":[],
                "vue_tel_mode":"international","vue_tel_auto_format":true,                
                "bookingpress_timezone":"","bookingpress_timezone_offset":"",
                "bookingpress_pro_version":"3.5",
                config: {
                    siteName: '',
                    bookingpress_edit_customers: 1,
                    formato_two: 0,
                },
                customerSearch: '',
                search_customer_name: '',
                search_customer_list: [],                
                bookingpress_loading: '',
                last_get_customer_list: 0,
                ingreso_customers_list: [],
                ingreso_formdata : {
                    id: 0,
                    datetime: moment().format(),
                    selected_staffmember: '',
                    medico_name: '',
                    selected_customer: 'add_new',
                    selected_customer_data: null,
                    motivo_ingreso: '',
                    ant_enf_actual: '',
                    ant_personales: {
                        hab_fisiologicos: '',
                        hab_tox: {
                            tabaco: '',
                            alcohol: '',
                            drogas: '',
                            otros: '',
                        },
                        patologicos: {
                            m: '',
                            q: '',
                            t: '',
                            a: '',
                        },
                        medicacion: '',
                    },
                    ant_familiares: '',                    
                    examen_fisico: {
                      cabeza: {
                        craneo: '', cara: '', ojos: '', narinas: '', oidos: '',
                        parotidas: '', boca: '', cuello: '', tiroides: '',
                        ing_yugular: '', latidos: '', soplos: ''
                      },
                      torax: '',
                      mamas: '',
                      respiratorio: {
                        frecuencia: '', tipo: '', expansion_bases: '',
                        v_vocales: '', percusion: '', m_vesicular: '', otros: ''
                      },
                      cardiovascular: {
                        pulso: '', ruidos_1r: '', ruidos_2r: '', ruidos_3r: '', ruidos_4r: '',
                        frotes: '', soplos_sistolicos: '', soplos_diastolicos: '',
                        fremitos: '', sistema_venoso: ''
                      },
                      abdomen: {
                        inspeccion: '', palpacion: '', percusion: '', auscultacion: ''
                      },
                      genito_urinario: {
                          puntos_dolorosos: '',
                          palpacion_renal: '',
                          puno_percusion: '',
                          genit_ext: '',
                          tacto_vaginal: '',
                          tacto_rectal: ''
                        },
                        neurologico: {
                          conciencia: '',
                          glasgow_total: '',
                          glasgow_o: undefined, // undefined para que el input-number empiece vacío
                          glasgow_v: undefined,
                          glasgow_m: undefined,
                          motilidad: '',
                          sensibilidad: '',
                          reflejo: '',
                          osteomioarticular: '',
                        },
                        osteomioarticular: '',
                    },
                    diagnostico_ingreso: '',
                    terapeutica: {
                        dieta: '',
                        oxi_terapia: {
                            fio2: '',
                            flujo: '',
                            nbl: '',
                        },
                        hp: '',
                        profilaxis_ant: '',
                        farmacos: '',
                        sig_v: {
                            diuresis: '',
                            catarsis: '',
                            t: '',
                            otros: '',
                        },
                        info_extra_paciente: '',
                    },
                    
                    <?php /**
                    examen_fisico: {
                        ing_yugular: '',
                        latidos: '',
                        soplos: '',
                        torax: '',
                        mamas: '',
                        // Ap. Respiratorio
                        resp_frecuencia: '',
                        resp_tipo: '',
                        resp_expansion_bases: '',
                        resp_v_vocales: '',
                        resp_percusion: '',
                        resp_m_vesicular: '',
                        resp_otros: '',
                        // Ap. Cardiovascular
                        cardio_pulso: '',
                        cardio_ruidos_1r: '',
                        cardio_ruidos_2r: '',
                        cardio_ruidos_3r: '',
                        cardio_ruidos_4r: '',
                        cardio_frotes: '',
                        cardio_soplos_sistolicos: '',
                        cardio_soplos_diastolicos: '',
                        cardio_fremitos: '',
                        cardio_sistema_venoso: '',
                        // Abdomen
                        abdomen_inspeccion: '',
                        abdomen_palpacion: '',
                        abdomen_percusion: '',
                        abdomen_auscultacion: '',
                        // Génito - Urinario
                        genito_puntos_dolorosos: ''
                      },
                      */ ?>
                      
                },
                selectCustomerFromFix: 0,
                formCollapseActiveNames: ['1'],
                
                customer: {},
                rules: null,
                
                all_obras_y_seguros: [],
                //customer modal
                open_customer_modal: false,
                is_display_loader: 0,
                is_display_save_loader: 0,
                is_disabled: 0,
                customer_rules: null,
                bookingpress_image_upload_limit: 1,
                
                //default booking data
                ...bookingpress_return_data
            };
        },
        computed: {
            
        },
        errorCaptured(err, vm, info){
            if(err.message.includes("reading 'key'")){
                console.warn("error renderizado en select", err.message);
                if(vm && vm.$options.name === 'ElSelect'){
                    //vm.options = [];
                    this.ingreso_customers_list = [];
                }
                return false;
            }
        },
        created(){
            this.customer_rules.email[0].required = false;
            this.obtenerConfiguracion();
            if(Number(this.int_form_number)){
                this.loadInternacionFormNumber( this.int_form_number );
            }
            window.appInt = this;
        },
        mounted(){
            
        },
        methods: {
            <?php
            #do_action('bookingpress_appointment_add_dynamic_vue_methods');
            do_action('bookingpress_appointments_dynamic_vue_methods');
            do_action('bookingpress_customers_dynamic_vue_methods');
            ?>
            guardarConfiguracion() {
                localStorage.setItem('module_settings', this.config.siteName);
                this.$notify('Configuración guardada localmente: ' + this.config.siteName);
            },
            obtenerConfiguracion(){
                let module_settings = localStorage.getItem('module_settings');
                if(module_settings) this.config.siteName = module_settings;
            },
            
            resetFilter(){
                //this.$notify('reset');
                this.customerSearch = '';
                this.ingreso_formdata.selected_customer ='';
                this.ingreso_formdata.selected_customer_data = null;
            },
            loadCustomers(){
                this.$notify('search');
            },
            ingreso_onChangeStaff(){
                let selected_staff = null;
                if( Number(this.ingreso_formdata.selected_staffmember) && this.search_staff_member_list && this.search_staff_member_list.length ){
                    selected_staff = this.search_staff_member_list.find( item => item.value == this.ingreso_formdata.selected_staffmember);
                }
                this.ingreso_formdata.medico_name = selected_staff?.text || '';
            },
            
//INTERNACION METODOS - CUSTOMER
            bookingpress_get_search_customer_list(query){
				const vm2 = this;
				if (query !== '') {
					vm2.bookingpress_loading = true;                    
					var customer_action = { action:'bookingpress_get_search_customer_list',search_user_str:query,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }                    
					axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
					.then(function(response){
						vm2.bookingpress_loading = false;
						vm2.search_customer_list = response.data.appointment_customers_details
					}).catch(function(error){
						console.log(error)
					});
				} else {
					vm2.search_customer_list = [];
				}	
			},
            bookingpress_get_customer_list(query){
                const vm2 = this;
                if (query !== '') {
                    vm2.bookingpress_loading = true;                    
                    var customer_action = { action:'bookingpress_get_customer_list',search_user_str:query,customer_id:vm2.customer_id,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }                    
                    axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                    .then(function(response){
                        vm2.ingreso_customers_list = [];
                        
                        let list = Array.isArray(response.data.appointment_customers_details)? response.data.appointment_customers_details.slice(0,30) : [];
                        /*
                        let vistos = new Set();                        
                        let new_list = list.filter(cus => {
                            if( vistos.has(cus.value) ){ return false }
                            vistos.add(cus.value);
                            return true;
                        });
                        */
                        let vistos = list.filter(cus => cus.dni).map(visto => visto.value);                        
                        let new_list = list.filter(cus => {
                            if(!cus.dni && vistos.includes(cus.value) ){ return false }                            
                            return true;
                        });
                        vm2.$nextTick(()=>{
                            vm2.ingreso_customers_list = new_list.slice(0,20);
                            vm2.bookingpress_loading = false;
                        });
                        vm2.last_get_customer_list = Date.now();
                    }).catch(function(error){
                        console.log(error)
                    });
                } else {
                    //vm2.ingreso_customers_list = [];
                }	
            },
                        
            bookingpress_retrieve_custom_field_values( selected_customer_id ){
				const vm = this;
				let postData =  {action: "bookingpress_get_customer_form_field_values", customer_id: selected_customer_id, _wpnonce:'<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce')); ?>'};
				axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
				.then( function(response){
					if( response.data.variant == 'success' ){
						let customer_form_fields = response.data.customer_form_fields;
                        /*
						for( let field_key in customer_form_fields ){
							let field_value = customer_form_fields[ field_key ];
							if( 'undefined' != typeof vm.appointment_formdata.bookingpress_appointment_meta_fields_value[ field_key ] ){
								vm.appointment_formdata.bookingpress_appointment_meta_fields_value[ field_key ] = field_value;
							}
						}
                        */
					}
				}).catch( function(error){
					console.log( error );
				})
			},
            bookingpress_get_customers_details(selected_customer_id = ""){
				const vm = this
				var customer_details_action = { action: 'bookingpress_get_customer_details',customer_id:selected_customer_id, _wpnonce: '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }
				axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_details_action ) )
				.then(function(response){
					vm.appointment_customers_list = response.data.appointment_customers_details;
					if(selected_customer_id != ""){
						setTimeout(function(){
							vm.ingreso_formdata.selected_customer = ''+selected_customer_id;
						}, 500);
					}
				}).catch(function(error){
					console.log(error)
				});				
			},
            			
            resetCustomerForm() {
                const vm2 = this                
                vm2.customer.update_id = 0;
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
                vm2.customer.customer_dni = '';
                vm2.customer.tipo_doc = '';
                vm2.customer.customer_phone_country = (vm2.bookingpress_tel_input_props?.defaultCountry || 'AR');
				vm2.wordpress_user_id ='';
                if(typeof vm2.customer.bpa_customer_field == 'undefined' ) vm2.customer.bpa_customer_field = {};
                vm2._wpnonce = '<?php wp_create_nonce('bpa_wp_nonce'); ?>';
                <?php do_action('bookingpress_reset_customer_fields_data') ?>
            },
            
            
            fixCustomerData(){
                const vm = this;//vm2.customer.bpa_customer_field
                vm.customer.customer_dni = !vm.customer.customer_dni && ( vm.customer.bpa_customer_field.customer_dni || vm.customer.bpa_customer_field.dni || vm.customer.bpa_customer_field.text_C6kufq)? ( vm.customer.bpa_customer_field.customer_dni || vm.customer.bpa_customer_field.dni || vm.customer.bpa_customer_field.text_C6kufq) : vm.customer.customer_dni;
                vm.customer.tipo_doc = !vm.customer.tipo_doc && vm.customer.bpa_customer_field.tipo_doc? vm.customer.bpa_customer_field.tipo_doc : vm.customer.tipo_doc;
                if( !Number(vm.ingreso_formdata.selected_customer) && Number(vm.customer.update_id) ){
                    vm.selectCustomerFromFix = 1;
                    vm.ingreso_formdata.selected_customer = vm.customer.update_id;
                }
                vm.ingreso_formdata.selected_customer_data = { ...vm.customer, ...vm.customer.bpa_customer_field };
                vm.ingreso_formdata.selected_customer_data.bpa_customer_field = { ...vm.customer.bpa_customer_field };
            },
            
            handleChangeFormCollapse( val ){
                //console.log(val)
                if( val.includes('1') ){
                    this.open_add_customer_modal( this.ingreso_formdata.selected_customer )
                }else{
                    this.closeCustomerModal()
                }
                //if(val.length > 1)val.shift();
                //this.formCollapseActiveNames = val;
            },
            open_add_customer_modal( selected_customer ){
                const vm2 = this
				vm2.wpUsersList = [];
                vm2.$refs['customer']?.resetFields();
                if( !Number(selected_customer) ) vm2.resetCustomerForm();
                
                //vm2.get_wordpress_users()
                
                //TEST vm2.open_customer_modal = true
            },
            closeCustomerModal() {
                const vm2 = this;
                
                //vm2.ingreso_formdata.selected_customer_data = { ...vm2.customer };
                vm2.fixCustomerData();
                
                vm2.$refs['customer']?.resetFields()
                //TEST vm2.open_customer_modal = false
                vm2.resetCustomerForm()
				//vm2.ingreso_formdata.selected_customer = '';
            },
            
            async bookingpress_select_customer( bookingpress_selected_customer ){
				const vm = this;
                if( this.selectCustomerFromFix ){
                    this.selectCustomerFromFix = 0;
                    return;
                }
                if( !bookingpress_selected_customer ) return;
                let selected_customer = bookingpress_selected_customer;
                //vm.ingreso_formdata.selected_customer = bookingpress_selected_customer;
				if( selected_customer == "add_new" || !Number(selected_customer) ){
				    vm.ingreso_formdata.selected_customer = selected_customer;
					vm.open_add_customer_modal( selected_customer );
				} else {
				    //console.log('start await customer', Date.now(), {...vm.customer} );
                    await vm.editCustomerDetails( selected_customer );
                    //console.log('await customer', Date.now(), vm.customer );
                    
					//vm.bookingpress_retrieve_custom_field_values( selected_customer );
                    vm.open_add_customer_modal( selected_customer );
                    
                    //vm.ingreso_formdata.selected_customer_data = { ...vm.customer };
                    vm.fixCustomerData();
                    /*
                    setTimeout(()=>{
                        vm.ingreso_customers_list = [ {'text': String(vm.customer.firstname+' '+vm.customer.lastname), 'value': vm.customer.update_id} ];
                    }, 1500);
                    */
                    
				}
				<?php do_action('bookingress_backend_after_select_customer'); ?>
                
                return vm.customer;
			},
            async saveCustomerDetails(){
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
                                
                                vm2.fixCustomerData();
                                //vm2.loadCustomers()
                                vm2.ingreso_customers_list = [ {'text': String(vm2.customer.firstname+' '+vm2.customer.lastname), 'value': vm2.customer.update_id} ];
                            }
                            vm2.savebtnloading = false;
                            return vm2.customer;
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
                            return null;
                        });
                    }else{
                        return null;
                    }
                })
            },
            onCustomerFormChange( ev ){
                const vm = this;
                console.log(ev);
                if(this.ingreso_formdata.selected_customer == this.customer.update_id){
                    vm.fixCustomerData();
                }
            },
            async asignarCustomer( asignar = 'guardar'){
                const vm = this;
                if(asignar == 'guardar'){
                    await vm.saveCustomerDetails();
                }else{
                    vm.fixCustomerData(); 
                }
                if( Number(vm.ingreso_formdata.selected_customer) ){
                    vm.formCollapseActiveNames = ['2'];
                }
            },
            <?php 
			//saveCustomerDetails(){},
            //bookingpress_upload_customer_avatar_func(){},
            
            /**
            
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
            
            */ ?>
            
            async loadInternacionFormNumber( loadIntNumber ){
                const vm2 = this;
                let internacion_id = Number(loadIntNumber)? loadIntNumber : this.int_form_number;
                if(!internacion_id ) return null;
                
                var postdata = { action: 'expansion_get_internacionIngreso_id', internacion_id: internacion_id, _wpnonce:( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>') }
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                .then(async function(response){
                    if(response.data.variant == 'success' && response.data.internacionForm_data?.id ){                        
                        var internacionForm_details = response.data.internacionForm_data;
                        console.log('success', response.data );
                        
                        if(!internacionForm_details.ingreso_formdata ){
                            let tempIngFormData = {};
                            let local_tempIngFormData = localStorage.getItem('last_inter_ing_formData');
                            if( local_tempIngFormData ){
                                tempIngFormData = JSON.parse(local_tempIngFormData);
                                internacionForm_details.ingreso_formdata = { ...tempIngFormData };
                            } 
                        }
                        
                        vm2.ingreso_formdata = { ...vm2.ingreso_formdata, ...internacionForm_details.ingreso_formdata};
                        if( internacionForm_details.customer_id ){
                            vm2.customer.update_id  = internacionForm_details.customer_id;
                            vm2.ingreso_formdata.selected_customer = internacionForm_details.customer_id;                            
                            let cus = await vm2.bookingpress_select_customer( internacionForm_details.customer_id );
                            setTimeout(()=>{
                                console.log('cus', cus );
                                vm2.ingreso_customers_list = [ {'text': String(vm2.customer.firstname+' '+vm2.customer.lastname), 'value': vm2.customer.update_id} ];
                            }, 1500);
                        }
                        
                        <?php do_action('expansion_on_internacionIngreso_id_result') ?>
                        
                        return internacionForm_details;
                    } else {
                        vm2.$notify({
                            title: response.data.title,
                            message: response.data.msg,
                            type: response.data.variant,
                            customClass: response.data.variant+'_notification',
                            duration:<?php echo intval($bookingpress_notification_duration); ?>,
                        });
                        return null;
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
                    return null;
                });
                
            },
        },
        
};
<?php

