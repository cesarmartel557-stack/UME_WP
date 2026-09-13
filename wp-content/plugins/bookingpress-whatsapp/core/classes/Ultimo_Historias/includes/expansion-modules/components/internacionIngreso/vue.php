<?php 

global $bookingpress_notification_duration;


$module_template_file = __DIR__ . '/template.php';
if( !file_exists($module_template_file) ){
    $module_template_file = false;
}

$bookingpress_notification_duration = $bookingpress_notification_duration? $bookingpress_notification_duration: 1500;

?>
export default {
        props: ['tab','int_form_number', 'propsData'],
        components : {
            'el-select-customer': Vue.options.components.ElSelect,
            'el-option-customer': Vue.options.components.ElOption,
        },
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
                impre:0,
                ingreso_start_time: Date.now(),
                last_auto_save: 0,
                customerSearch: '',
                search_customer_name: '',
                search_customer_list: [],                
                bookingpress_loading: '',
                last_get_customer_list: 0,
                ingreso_customers_list: [],
                ingreso_formdata : {
                    id: 0,
                    fecha_ingreso: moment().format(),
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
                      
                },
                selectCustomerFromFix: 0,
                formCollapseActiveNames: ['1','2','3','4','5','6','7','8'],
                customerCollapseIsClose: 0,
                
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
        //Comentado Recuperar Formulario en cada Inicio
            //this.obtenerConfiguracion();
            
            let hash_id = window.location.hash.substring(1)?.split('/')[1];
            if(hash_id) this.int_form_number = hash_id;
                        
            if(this.propsData && this.propsData.int_form_number){
                this.int_form_number = this.propsData.int_form_number;
            }
            
            if(Number(this.int_form_number)){
                this.loadInternacionFormNumber( this.int_form_number );
            }
            window.appInt = this;
            
            //Vue.options.components.ElSelect.options.methods.handleQueryChange
            //this.$options.components['el-select-customer'].options.components['el-option-customer'] = this.$options.components['el-option-customer'];
            
                        
            this.$options.components['el-select-customer'].options.methods = {...this.$options.components['el-select-customer'].options.methods};
            /*
            this.$options.components['el-select-customer'].options.methods.handleQueryChange = function(e){
                let res = 0;
                try{
                    var t = this;
                    this.previousQuery === e || this.isOnComposition || (null !== this.previousQuery || "function" != typeof this.filterMethod && "function" != typeof this.remoteMethod ? (this.previousQuery = e,
                    this.$nextTick(function() {
                        t.visible && t.broadcast("ElSelectDropdown", "updatePopper")
                    }),
                    this.hoverIndex = -1,
                    this.multiple && this.filterable && this.$nextTick(function() {
                        var e = 15 * t.$refs.input.value.length + 20;
                        t.inputLength = t.collapseTags ? Math.min(50, e) : e,
                        t.managePlaceholder(),
                        t.resetInputHeight()
                    }),
                    this.remote && "function" == typeof this.remoteMethod ? (this.hoverIndex = -1,
                    this.remoteMethod(e)) : ("function" == typeof this.filterMethod ? this.filterMethod(e) : (this.filteredOptionsCount = this.optionsCount,
                    this.broadcast("ElOption", "queryChange", e)),
                    this.broadcast("ElOptionGroup", "queryChange")),
                    this.defaultFirstOption && (this.filterable || this.remote) && this.filteredOptionsCount && this.checkDefaultFirstOption()) : this.previousQuery = e)
                    console.log("handle", e)
                    
                }catch(err){
                    console.log( err);
                }
                
            };
            */
            
            /*
            this.$options.components['el-select-customer'].options.errorCaptured = [function(err, vm, info){
                console.warn("[select] error renderizado en select", err.message, vm, info);
                if(err.message.includes("reading 'key'")){
                    
                    if(vm && vm.$options.name === 'ElSelect' || vm.$options.name === 'ElOption'){
                        //vm.options = [];
                        appInt.ingreso_customers_list = [];
                    }
                    return false;
                }
            }];
            this.$options.components['el-option-customer'].options.errorCaptured = [function(err, vm, info){
                console.warn("[option] error renderizado en select", err.message, vm, info);
                if(err.message.includes("reading 'key'")){
                    
                    if(vm && (vm.$options.name === 'ElSelect' || vm.$options.name === 'ElOption')){
                        //vm.options = [];
                        appInt.ingreso_customers_list = [];
                    }
                    return false;
                }
            }];
            */
            
            Vue.config.errorHandler = function(err, vm, info){
                //if(err.message.includes("reading 'key'")){
                    console.log(" [vue] error renderizado en select", err.message, vm, info);
                    if(vm && (vm.$options.name === 'ElSelect' || vm.$options.name === 'ElOption')){
                        //vm.options = [];
                        appInt.ingreso_customers_list = [];
                    }
                    return false;
                //}
                return false;
                console.error("[ error ]", err.message);
            };
        
            //$options.components.ElSelect.extendOptions
        },
        beforeDestroy(){
            window.appInt = null;
        },        
        watch: {
            ingreso_formdata: {
                handler( val ){
                    if(val && val.selected_customer != this.ingreso_formdata.selected_customer){
                        if(this.$refs['sel_selected_customer']){
                            this.$refs['sel_selected_customer'].emitChange(val.selected_customer)
                           //console.log('ref change')
                           
                        }else{
                            this.bookingpress_select_customer(val.selected_customer)
                            console.log('select customer')
                        }
                        
                    }
                    //console.log('ing', val)
                    this.guardarConfiguracion({from: 'auto_up', silence: 1, dif_auto: 1500, dif_start: 5500});
                }, deep: true, immediate: true
            },
        },
        methods: {
            <?php
            #do_action('bookingpress_appointment_add_dynamic_vue_methods');
            do_action('bookingpress_appointments_dynamic_vue_methods');
            do_action('bookingpress_customers_dynamic_vue_methods');
            ?>
            guardarConfiguracion( setting = {from: '', silence: 0, dif_auto: 1500, dif_start: 2500} ) {
                let abort = 0;
                if(setting.from == 'auto_up'){
                    let currTime = Date.now();
                    if( (currTime < (this.last_auto_save+(setting.dif_auto || 1000))) || (currTime < ( this.ingreso_start_time + (setting.dif_start||1500) )) ){
                        abort = 1;
                        console.log('recover save abortado.');
                        return;
                    }
                     
                    this.last_auto_save = currTime;                    
                }
                if( !abort ){
                    console.log('recover save......', (setting.dif_start||1500) );
                    //localStorage.setItem('module_settings', this.config.siteName);
                    //this.$notify('Configuración guardada localmente: ' + this.config.siteName);
                    
                    let jsonData = JSON.stringify( this.ingreso_formdata/*this.$data*/ || {} );
                    localStorage.setItem('int_ingreso_recoverData', jsonData);
                    if( !setting.silence ){
                        //console.log('recover save');
                        //app.$message('recuperacion actualizada');
                        this.$notify({
                            title: 'Recuperacion',
                            message: 'recuperacion actualizada',
                            type: 'success',
                            customClass: 'info'+'_notification',
                            duration: 1000,
                        });
                    }
                }
            },
            obtenerConfiguracion(){
                console.log('obteniendo config...');
                let int_ingreso_recoverData = {};
                let jsonData = localStorage.getItem('int_ingreso_recoverData');
                if(typeof jsonData != 'undefined' && jsonData){
                    try{
                        int_ingreso_recoverData = JSON.parse(jsonData);
                        this.last_auto_save = Date.now();//Evitar autoguardado inmediato
                        console.log('config obtenienda');                        
                        this.ingreso_formdata = { ...this.ingreso_formdata, ...int_ingreso_recoverData };
                        /*
                        let cont=0
                        for(let x in this.$data){
                            if(int_ingreso_recoverData[x]) this[x] = int_ingreso_recoverData[x];
                            cont++
                        }
                        console.log(cont);
                        */
                        
                        if(this.$refs['sel_selected_customer']){
                            this.$refs['sel_selected_customer'].emitChange(this.ingreso_formdata.selected_customer)
                            //console.log('ref change')
                           
                        }else{
                            this.bookingpress_select_customer(this.ingreso_formdata.selected_customer)
                            //console.log('no ref select change')
                        }
                    }catch(err){
                        console.log('fallo obtener local',err)
                    }
                }
            },
            
            resetFilter(){
                //this.$notify('reset');
                this.customerSearch = '';
                this.ingreso_formdata.selected_customer ='';
                this.ingreso_formdata.selected_customer_data = null;
            },
            loadCustomers(){
                //this.$notify('search');
                console.log('loadC');
            },
            ingreso_onChangeStaff(){
                let selected_staff = null;
                this.ingreso_formdata.medico_name = '';
                if( this.ingreso_formdata.selected_staffmember ){
                    if( Number(this.ingreso_formdata.selected_staffmember) && this.search_staff_member_list && this.search_staff_member_list.length ){
                        selected_staff = this.search_staff_member_list.find( item => item.value == this.ingreso_formdata.selected_staffmember);
                    }
                    this.ingreso_formdata.medico_name = selected_staff && selected_staff.text? selected_staff.text : '';
                }
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
                        //TEST 07-08 15HS vm2.ingreso_customers_list = [];
                        
                        let list = Array.isArray(response.data.appointment_customers_details)? response.data.appointment_customers_details.slice(0,30) : [];
                        /*
                        let vistos = new Set();                        
                        let new_list = list.filter(cus => {
                            if( vistos.has(cus.value) ){ return false }
                            vistos.add(cus.value);
                            return true;
                        });
                        */
                        //TEST 07-08 15HS 
                        vm2.ingreso_customers_list = list.slice(0,20);
                        vm2.bookingpress_loading = false;
                        /*
                        //TEST 07-08 15HS COMENTADO 
                        let vistos = list.filter(cus => cus.dni).map(visto => visto.value);                        
                        let new_list = list.filter(cus => {
                            if(!cus.dni && vistos.includes(cus.value) ){ return false }                            
                            return true;
                        });
                        vm2.$nextTick(()=>{
                            vm2.ingreso_customers_list = new_list.slice(0,20);
                            vm2.bookingpress_loading = false;
                        });
                        */
                        vm2.last_get_customer_list = Date.now();
                    }).catch(function(error){
                        console.log(error)
                    });
                } else {
                    //TEST 07-08 15HS DESCOMENTADO
                    vm2.ingreso_customers_list = [];
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
            
            fixCustomerList(){
                const vm2 = this;
                let cust_data = vm2.customer? vm2.customer: vm2.ingreso_formdata.selected_customer_data;
                if( cust_data && !vm2.ingreso_customers_list.find(txtVal=> txtVal.value == cust_data.update_id) ){
                    vm2.ingreso_customers_list = [ {'text': String(cust_data.firstname+' '+cust_data.lastname), 'value': cust_data.update_id} ];
                }
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
                if( val.includes('1') && this.customerCollapseIsClose ){
                    this.open_add_customer_modal( this.ingreso_formdata.selected_customer )
                    this.customerCollapseIsClose = 0;
                }else{
                    //this.closeCustomerModal()
                    this.customerCollapseIsClose = 1;
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
                    console.log('start', performance.now() )
                    let ediresult = await vm.editCustomerDetails( selected_customer );
                    //console.log('await customer', Date.now(), vm.customer );
                    console.log('fin', performance.now(), ediresult)
                    if( ediresult == 'success'){
                        vm.fixCustomerList()
                    }
					//vm.bookingpress_retrieve_custom_field_values( selected_customer );
                    
                    //TEST NO REQUIERE SE SUPONE LO ABRE LA FUNCION EDITCUSTOMER vm.open_add_customer_modal( selected_customer );
                    
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
                        postdata._wpnonce = ( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>');
                        
                        return axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
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
                                
                                vm2.fixCustomerList();
                                
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
                //console.log(ev);
                if(this.ingreso_formdata.selected_customer == this.customer.update_id){
                    vm.fixCustomerData();
                }
            },
            async asignarCustomer( asignar = 'guardar', next = 2 ){
                const vm = this;
                if(asignar == 'guardar'){
                    await vm.saveCustomerDetails();
                }else{
                    vm.fixCustomerData(); 
                }
                if( Number(vm.ingreso_formdata.selected_customer) ){
                    //vm.formCollapseActiveNames = ['2'];
                    vm.ingresoFormNextSection(next)
                }
            },
            ingresoFormNextSection(next){
                try{
                    this.$emit('onNextColapse', this.formCollapseActiveNames);
                    if( !this.formCollapseActiveNames.includes(String(next)) ) this.formCollapseActiveNames.push( String(next) );
                    //this.formCollapseActiveNames = [String(next)];
                    if(this.ingreso_formdata.selected_customer == this.customer.update_id){
                        this.fixCustomerData();
                    }
                }catch(err){
                    console.error(err);
                }
            },
            <?php 
			//saveCustomerDetails(){},
            //bookingpress_upload_customer_avatar_func(){},
            ?>
            
            async editCustomerDetails(edit_id){
                const vm2 = this
                vm2.customer.update_id = edit_id
                vm2.open_add_customer_modal( edit_id )
                var customer_action = { action: 'bookingpress_get_edit_user', edit_id: edit_id,_wpnonce: ( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>') }
                return axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
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
                        
                        return response.data.variant;
                    } else {
                        vm2.$notify({
                            title: response.data.title,
                            message: response.data.msg,
                            type: response.data.variant,
                            customClass: response.data.variant+'_notification',
                            duration:1500,
                        });
                        return response.data.variant;
                    }
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:1500,
                    });
                    return 'error';
                });
            },
            
            
            
            async loadInternacionFormNumber( loadIntNumber ){
                const vm2 = this;
                let internacion_id = Number(loadIntNumber)? loadIntNumber : this.int_form_number;
                if(!internacion_id ) return null;
                
                var postdata = { action: 'expansion_get_internacionIngreso_id', internacion_id: internacion_id, _wpnonce:( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>') }
                return axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                .then(async function(response){
                    if(response.data.variant == 'success' && response.data.internacionForm_data?.id ){
                        var internacionForm_details = response.data.internacionForm_data;
                        console.log('success', response.data );
                        vm2.last_auto_save = Date.now();//Evitar autoguardado inmediato
                        
                        /*
                        if(!internacionForm_details.ingreso_formdata ){
                            let tempIngFormData = {};
                            let local_tempIngFormData = localStorage.getItem('last_inter_ing_formData');
                            if( local_tempIngFormData ){
                                tempIngFormData = JSON.parse(local_tempIngFormData);
                                internacionForm_details.ingreso_formdata = { ...tempIngFormData };
                            } 
                        }
                        */
                        
                        if( internacionForm_details.ingreso_formdata ){
                            if(internacionForm_details.ingreso_formdata.id != internacionForm_details.id ) internacionForm_details.ingreso_formdata.id = internacionForm_details.id;
                        
                            vm2.ingreso_formdata = { ...vm2.ingreso_formdata, ...internacionForm_details.ingreso_formdata};
                            if( internacionForm_details.paciente_id ){
                                
                                vm2.customer.update_id  = internacionForm_details.paciente_id;
                                vm2.ingreso_formdata.selected_customer = internacionForm_details.paciente_id;                            
                                let cus = await vm2.bookingpress_select_customer( internacionForm_details.paciente_id );                            
                                setTimeout(()=>{
                                    console.log('cus', cus );
                                    vm2.fixCustomerList();
                                    //vm2.ingreso_customers_list = [ {'text': String(vm2.customer.firstname+' '+vm2.customer.lastname), 'value': vm2.customer.update_id} ];
                                }, 1500);
                            }
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
            
            async saveInternacionForm(){
                //expansion_save_internacionIngreso_id
                const vm2 = this;
                let int_ingreso_id = Number(vm2.ingreso_formdata.id)?? this.int_form_number?? 0;
                //if(!internacion_id ) return null;
                
                var postdata = { action: 'expansion_save_internacionIngreso', int_ingreso_formdata: vm2.ingreso_formdata, int_ingreso_id: int_ingreso_id, _wpnonce:( typeof $exp_bpa_wp_nonce!='undefined' && $exp_bpa_wp_nonce? $exp_bpa_wp_nonce : '<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>') }
                return axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                .then(async function(response){
                    if(response.data.variant == 'success' && Number(response.data.ingreso_id) ){
                        vm2.last_auto_save = Date.now();//Evitar autoguardado inmediato
                        vm2.ingreso_formdata.id = response.data.ingreso_id;
                        
                        console.log('success', response.data );
                        
                        
                        
                        <?php do_action('expansion_on_internacionIngreso_save') ?>
                                                
                    }
                    vm2.$notify({
                        title: response.data.title?? 'Guardado',
                        message: response.data.msg?? (response.data.ingreso_id? 'ingreso #'+response.data.ingreso_id+' generado' : 'No se genero id'),
                        type: response.data.variant,
                        customClass: response.data.variant+'_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                    
                    return response.data.variant;
                    
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                    return 'error';
                });
            },
            
        //Fin Methods
        },
        mounted(){
            this.$root.mainSectionTitleShow = 0;
        },
        
};
<?php

