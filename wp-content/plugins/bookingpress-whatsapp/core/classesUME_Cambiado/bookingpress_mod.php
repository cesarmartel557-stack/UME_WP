<?php
if(!defined("BKMOD_DIR") ) define("BKMOD_DIR", plugin_dir_path( __DIR__ ));
if(!defined("BKMOD_SRC") ) define("BKMOD_SRC", plugins_url('',__FILE__));

if( is_admin() ){
    add_action('admin_print_styles','bookingpress_mod_add_styles',10);
    add_action('admin_footer','bookingpress_mod_add_styles',10);
}else{
    add_action('wp_footer', 'bookingpress_mod_form_control',20);
}

function bookingpress_mod_add_styles(){
    
    ?>
<style>
.bpa-pg-warning-belt-box:has(.bpa-wbb__desc) {
    display: none;
}
td.el-table_1_column_5.el-table__cell .cell {
    word-break: break-word !important;
}
td.el-table_1_column_6.el-table__cell .cell {
    word-break: break-word !important;
}
.bpa-sf-items-wrapper {
    width: 100%;
    max-height: 600px;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
}
.bpa-afb_staff-filter-nav-arrows {
    display: none;
}
.bpa-afb__staff-filter:hover .bpa-afb_staff-filter-nav-arrows {
    display: none;
}

</style>
<?php if(isset($_GET['max'])){ ?>
<script>
var maxApp;

var maxOnOpen = {
    llamaron : function(){
        console.log("opeennnnnn");
    }
};
//maxOnOpen.llamaron();

window.addEventListener("load", ()=>{
    console.log("loadeeeddddddddddddddddddddddd");
    maxApp = app;
    
    maxApp.open_add_customer_modal.call(function(){console.log("opeennnnnn");});
    
});


</script>


    <?php
}//fin get
    
}




function bookingpress_mod_form_control(){
    
    
                /*document.querySelector('.obra_social input').focus();
                document.querySelector('.obra_social input').dispatchEvent(new KeyboardEvent('keydown',  {'key':'a'}));
                document.querySelector('.obra_social input').dispatchEvent(new KeyboardEvent('keyup',{'key':'a'}));
               
                document.querySelector('.plan_obra_social input').focus();
                document.querySelector('.plan_obra_social input').dispatchEvent(new KeyboardEvent('keydown',  {'key':'a'}));
                document.querySelector('.plan_obra_social input').dispatchEvent(new KeyboardEvent('keyup',{'key':'a'}));
              */
               
               //document.querySelector('.obra_social').style.display = "none";
                //document.querySelector('.plan_obra_social').style.display = "none";
               
               
               //field_ob_s.field_values[0].value = "a";
               //field_plan_ob_s.field_values[0].value = "a";
               
               //maxApp.bookingpress_new_form_fields = maxApp.customer_form_fields;
    
    
//<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    ?>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bulma/bulma.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<style>
.swal2-container.swal2-center.swal2-backdrop-show {
    z-index: 99999999999;
    //display: flex;
    //align-items: center;
    //justify-content: center;
}
.swal2-styled.swal2-cancel {
    color: white;
    text-shadow: 0 0 10px grey;
}

.particular_importe_msg {
    color: darkolivegreen;
    font-size: 1em;
}

/*
div:where(.swal2-container).swal2-center > .swal2-popup {
    grid-column: 2;
    grid-row: 1;
    place-self: center center;
}
*/
</style>

<script id="bookingpress_mod_form" >
    var maxApp;
    var maxApp_current_tab;
    var is_particular_val;
    
    var booking_mod_form_values = [];
    booking_mod_form_values = { current_tab: "service", service: 0, staff_member_id: 0, date: "" };
    
    var original_service_price_w = 0;
    var original_service_price = 0;
    
    var obra_old_val;
    var plan_old_val;
    
    var medic_condition = {"solo_particular":false, "any_plan":false, "plans": {"loma linda":1} }; //plan:any
        
    const eventMaxAppInit = new CustomEvent("maxapp_init");
    const eventChangeTab = new CustomEvent("change_tab");
    window.onload = function(){
        if( typeof app != "null" && typeof app != "undefined" ){
        
        maxApp = app;
        if(typeof obs != "undefined"){
        obs.max = maxApp;
        }
        
        maxApp.bookingpress_select_staffmember = async function(selected_staffmember_id, is_any_staff_option_selected = 0){
					medic_condition = {"solo_particular":false};
                    /*
                    console.log("SELECCIONANDO STAFFMEMBER "+selected_staffmember_id);
                    bk_mod_postdata = {"action":"bk_mod_medic_condition",  "staffmember_id": selected_staffmember_id };
                    axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( bk_mod_postdata ) )
					.then( function (response) {
						//vm.appointment_step_form_data = response.data.appointment_data
                        if( response.data.solo_particular != null ){
                            // ###medic_condition = response.data;
                        }else{
                            medic_condition = {"solo_particular":false};
                        }
					});
                    */
                    const vm = app;
					
					var bookingpress_is_selected_staff_from_url = "0";

					vm.v_calendar_disable_dates = [];

					if( "undefined" != typeof vm.bookingpress_disabled_staffmember && vm.bookingpress_disabled_staffmember.indexOf( selected_staffmember_id ) > -1 ){
						return false;
					}
					if(typeof vm.appointment_step_form_data.cart_items == "undefined"){						
						vm.appointment_step_form_data.selected_date = "";
						vm.appointment_step_form_data.selected_start_time = "";
						vm.appointment_step_form_data.selected_end_time = "";
					}

					let service_id = vm.appointment_step_form_data.selected_service;
					let service_data = vm.bookingpress_all_services_data[ service_id ];

					let use_legacy_any_staff = false;
					if( selected_staffmember_id == "any_staff" && "undefined" != typeof service_data && "undefined" != typeof service_data.bookingpress_service_duration_unit && "d" == service_data.bookingpress_service_duration_unit ){
						use_legacy_any_staff = true;
					}

					vm.appointment_step_form_data.any_staff_selected = 0;

					

					if( true == use_legacy_any_staff ){
						return await vm.bookingpress_select_staffmember_legacy( selected_staffmember_id, is_any_staff_option_selected );
					} else if(selected_staffmember_id == "any_staff" ){
						vm.appointment_step_form_data.any_staff_selected = 1;
						if( "" != vm.appointment_step_form_data.selected_service ){

							vm.isLoadServiceLoader = "0";
							
							let assigned_staffs = [];
							service_data.assigned_staffmembers.forEach( function(staff_id){
								assigned_staffs.push( staff_id );
							});
							if( 1 == assigned_staffs.length ){
								vm.appointment_step_form_data.any_staff_selected = 0;
								let selected_staffmember_id = service_data.assigned_staffmembers[0];

								vm.appointment_step_form_data.bookingpress_selected_staff_member_details.selected_staff_member_id = selected_staffmember_id;
								vm.appointment_step_form_data.bookingpress_selected_staff_member_details.staff_member_id = selected_staffmember_id;
								vm.appointment_step_form_data.bookingpress_selected_staff_member_details.is_any_staff_option_selected = is_any_staff_option_selected;
								vm.appointment_step_form_data.selected_staff_member_id = selected_staffmember_id;
								vm.hide_capacity_text_flag = false;
							} else {
								vm.appointment_step_form_data.available_staffs = assigned_staffs;
								vm.hide_capacity_text_flag = true;
							}
						} else {
							if( "service" == vm.bookingpress_current_tab  ){
								let f = 0;
								vm.appointment_step_form_data.selected_category = "-1";
								vm.appointment_step_form_data.selected_service = "";
								let first_service_category = "";

								let assigned_staffs = [];

								for (let x in vm.bpasortedServices) {
									let elm = vm.bpasortedServices[x];
									if( "undefined" != typeof elm.assigned_staffmembers && false == elm.is_disabled ){
										elm.assigned_staffmembers.forEach( function(staff_id){
											assigned_staffs.push( staff_id );
										});
										vm.bpasortedServices[x].is_visible = true;
										vm.bpasortedServices[x].hide_for_staff = false;
										if ("" == first_service_category) {
											first_service_category = elm.bookingpress_category_id;
										}
									} else {
										vm.bpasortedServices[x].is_visible = false;
										vm.bpasortedServices[x].hide_for_staff = true;
									}
								}

								vm.appointment_step_form_data.available_staffs = assigned_staffs;
								vm.hide_capacity_text_flag = true;

								let hidden_category_for_staff = [];
								for (let ci in vm.service_categories) {
									let current_category = vm.service_categories[ci];
									let category_id = current_category.bookingpress_category_id;
									let category_staff = current_category.bookingpress_staffmembers;

									/* if (category_staff.indexOf(response.data.staffmember_id.toString()) < 0) {
										hidden_category_for_staff.push(category_id);
									} */
								}

								if ("" != first_service_category) {
									for (let c in vm.bookingpress_all_categories) {
										vm.bookingpress_all_categories[c].is_visible = true;
										let current_category = vm.bookingpress_all_categories[c];
										if (current_category.category_id == first_service_category) {
											vm.bpa_select_category(current_category.category_id, current_category.category_name);
										} else {
											if (hidden_category_for_staff.indexOf(current_category.category_id.toString()) > -1) {
												vm.bookingpress_all_categories[c].is_visible = false;
											}
										}
									}
								}
		
								vm.isLoadServiceLoader = "0";
							}

							vm.hide_capacity_text_flag = false;
						}
					} else {
						vm.hide_capacity_text_flag = false;
						vm.appointment_step_form_data.bookingpress_selected_staff_member_details.selected_staff_member_id = selected_staffmember_id;
						vm.appointment_step_form_data.bookingpress_selected_staff_member_details.staff_member_id = selected_staffmember_id;
						vm.appointment_step_form_data.bookingpress_selected_staff_member_details.is_any_staff_option_selected = is_any_staff_option_selected;
						vm.appointment_step_form_data.selected_staff_member_id = selected_staffmember_id;

						vm.appointment_step_form_data.available_staffs = [];
						
						if( vm.is_staff_first_step == 1 ){
							vm.appointment_step_form_data.selected_category = "-1";
							vm.appointment_step_form_data.selected_service = "";
							let visible_service_ids = [];
							let first_service_category = "";
							for( let x in vm.bpasortedServices ){
								let elm = vm.bpasortedServices[x];
								if( "undefined" != typeof elm.assigned_staffmembers && -1 < elm.assigned_staffmembers.indexOf( selected_staffmember_id ) && false == elm.is_disabled ){
									vm.bpasortedServices[x].is_visible = true;
									vm.bpasortedServices[x].hide_for_staff = false;
									if( "" == first_service_category ){
										first_service_category = elm.bookingpress_category_id;
									}
									vm.appointment_step_form_data.base_price_without_currency = vm.bpasortedServices[x].staff_member_details[ selected_staffmember_id ].bookingpress_service_price;
									vm.bpasortedServices[x].service_price_without_currency = vm.bpasortedServices[x].staff_member_details[ selected_staffmember_id ].bookingpress_service_price;
									let selected_staffprice = vm.bookingpress_price_with_currency_symbol( vm.bpasortedServices[x].staff_member_details[ selected_staffmember_id ].bookingpress_service_price );
									vm.bpasortedServices[x].bookingpress_service_price = selected_staffprice;
									visible_service_ids.push( elm.bookingpress_service_id );
								} else {
									vm.bpasortedServices[x].is_visible = false;
									vm.bpasortedServices[x].hide_for_staff = true;
								}
							}

							let hidden_category_for_staff = [];
							for( let ci in vm.service_categories ){
								let current_category = vm.service_categories[ci];
								let category_id = current_category.bookingpress_category_id;
								let category_staff = current_category.bookingpress_staffmembers;

								if( category_staff.indexOf( selected_staffmember_id.toString() ) < 0 ){
									hidden_category_for_staff.push( category_id );
								}
							}


							if( "" != first_service_category ){
								for( let c in vm.bookingpress_all_categories ){
									let current_category = vm.bookingpress_all_categories[c];
									vm.bookingpress_all_categories[c].is_visible = true;
									if( current_category.category_id == first_service_category ){
										vm.bpa_select_category( current_category.category_id, current_category.category_name );
									} else {
										if( hidden_category_for_staff.indexOf( current_category.category_id.toString() ) > -1 ){
											vm.bookingpress_all_categories[c].is_visible = false;
										}
									}
								}
							}

						} else {
							if( "" != vm.appointment_step_form_data.selected_service ){
								let selected_service = vm.appointment_step_form_data.selected_service;
								let selected_service_data = vm.bookingpress_all_services_data[ selected_service ];
								
								if( vm.is_bring_anyone_with_you_activated == 1 ){
									let service_min_capacity = selected_service_data.staff_member_details[ selected_staffmember_id].bookingpress_min_service_capacity;
									if( service_min_capacity != "undefined" && vm.appointment_step_form_data.bookingpress_selected_bring_members < service_min_capacity ){
										vm.appointment_step_form_data.bookingpress_selected_bring_members = service_min_capacity;

										let members = vm.appointment_step_form_data.bookingpress_selected_bring_members;
										let uniqueId = vm.appointment_step_form_data.bookingpress_uniq_id;
										let uniqueId2 = uniqueId.split("").reverse().join("");

										let salt = `${uniqueId}${members}${uniqueId2}`;
										let token = btoa( salt );
										vm.appointment_step_form_data.multiple_quantity_token = token;

										vm.bookingpress_update_staffmember_data( vm.appointment_step_form_data.bookingpress_selected_bring_members );
									} 
								}
								let service_staff_details = selected_service_data.staff_member_details[ selected_staffmember_id ];
								let selected_staff_price = service_staff_details.bookingpress_service_price;
								vm.appointment_step_form_data.service_price_without_currency = selected_staff_price;
								vm.appointment_step_form_data.base_price_without_currency = selected_staff_price;
								vm.appointment_step_form_data.selected_service_price = vm.bookingpress_price_with_currency_symbol( selected_staff_price );
							}
						}

						let step_data = "staffmembers";
						let f = 0;	

						if( "staffmembers" == vm.bookingpress_current_tab ){
							vm.bookingpress_step_navigation(vm.bookingpress_sidebar_step_data[step_data].next_tab_name, vm.bookingpress_sidebar_step_data[step_data].next_tab_name, vm.bookingpress_sidebar_step_data[step_data].previous_tab_name, 1);
						} else {
							if( 1 == vm.is_bring_anyone_with_you_activated ){
								vm.bookingpress_show_bring_anyone_on_staffselection( selected_staffmember_id );
							}
						}
					}
					
				};
        
        
        init_mod();
        }
    }
    
    function capture_tab(){
    setTimeout( function(){
        
        if( maxApp_current_tab != maxApp.bookingpress_current_tab){
            //console.log( "capture currentab: " + maxApp.bookingpress_current_tab );
            maxApp_current_tab = maxApp.bookingpress_current_tab;
            booking_mod_form_values["current_tab"] = maxApp.bookingpress_current_tab;
            document.dispatchEvent(eventChangeTab);
        }
        capture_tab();
    }, 
    300);
    
    
        return maxApp.bookingpress_current_tab;
    }
    
    function init_mod(){
        //console.log("init maxApp: ");
        
        document.dispatchEvent(eventMaxAppInit);
        
        const field_ob_s = maxApp.customer_form_fields.find((element) => element.field_name == "obra_soc_seguros" );
        const field_plan_ob_s = maxApp.customer_form_fields.find((element) => element.field_name == "plan_obra_social" );
        
        const index_field_ob_s = maxApp.customer_form_fields.findIndex((element) => element.field_name == "obra_social" );
        const index_field_plan_ob_s = maxApp.customer_form_fields.findIndex((element) => element.field_name == "plan_obra_social" );
        
        if(field_ob_s != null ) field_ob_s.is_required = true;
        if(field_plan_ob_s != null ) field_plan_ob_s.is_required = true;
        
        capture_tab();
        
        
        
        //let current_tab = this.bookingpress_current_tab;
        // maxApp.customer_form_fields
        
        //console.log( "current: " + maxApp.bookingpress_current_tab );
        
        /*
            obra_soc_input = document.querySelector('.obra_social input');
            
            if(obra_soc_input == null ){ return; }else{
            
            obra_soc_input.addEventListener("change", (event) => {
                console.log( `You like ${event.target.value}` );
            });
            
            }
        */    
        
        
    }
    
    function obra_soc_mod(){
        //console.log( "Obra socccccc: " + maxApp.bookingpress_current_tab );
        
        maxApp.appointment_step_form_data.selected_payment_method = "";
        maxApp.is_only_onsite_enabled = true;
        //maxApp.paypal_payment = false;
        maxApp.total_configure_gateways = 2;
        
        /*
        vm2.appointment_formdata.appointment_selected_customer = "1";
        vm2.appointment_formdata.appointment_selected_service = "";
        vm2.appointment_formdata.appointment_booked_date = "2024-06-13";
        vm2.appointment_formdata.appointment_booked_time = ""
        */
            $obra_soc_input = document.querySelector('.obra_social input');
            
            if( $obra_soc_input != null )
            {
                
            
            
            $obra_soc_input.addEventListener("change", (event) => {
                
                let valor = event.target.value;
                if( valor != obra_old_val ){
                    //check_apply_available_plans();
                    
                }
                obra_old_val = valor;
            });
            
            document.querySelector('.plan_obra_social input').addEventListener("change", (event) => {
                
                let valor = event.target.value;
                if( valor != plan_old_val ){
                    //check_apply_available_plans();
                    
                }
                plan_old_val = valor;
            });
            
            
            
            
            
            }
    }//fin funct
    
    
    function check_apply_available_plans(){
        apply_price = 1;
        triggerPamiModal = 0;
        
        model_obra = maxApp.customer_form_fields.find((element) => element.field_name == "obra_soc_seguros" ).v_model_value;
        model_plan_obra = maxApp.customer_form_fields.find((element) => element.field_name == "plan_obra_social" ).v_model_value;
        valor_obra = maxApp.appointment_step_form_data.form_fields[model_obra];
        valor_plan = maxApp.appointment_step_form_data.form_fields[model_plan_obra];
        text_plan="";
        
        medic_condition = medic_condition;//{"solo_particular":false, "any_plan":false, "plans": {"loma linda":0} }; //plan:any
        
                    //console.log( "nuevo valor obraSocial: "+valor_obra);
                    palabra_clave = 'PAMI';
                    
                    if( valor_obra.toUpperCase() == palabra_clave.toUpperCase()  ){
                        if( medic_condition.any_plan ){
                            apply_price = 0;
                        }else{
                            if( medic_condition.plans[valor_plan.toLowerCase()] != null ){
                                if( medic_condition.plans[valor_plan.toLowerCase()] > 0 ){
                                    medic_condition.plans[valor_plan.toLowerCase()] = medic_condition.plans[valor_plan.toLowerCase()] - 1;
                                    if(medic_condition.plans[valor_plan.toLowerCase()] <=0) medic_condition.plans[valor_plan.toLowerCase()] =0;
                                    apply_price = 0;
                                }else{
                                    triggerPamiModal = 1;
                                    text_plan = " "+valor_plan;
                                }
                            }
                            
                        }
                    }
                    
                    
                    
                    if( triggerPamiModal ){
                        //alert( `Le informamos que el medico de su eleccion ya no posee "${palabra_clave}" sin cargo disponibles para esta fecha.\n desea continuar?\n (se aplicaran cargos a la consulta).` );
                    
                        Swal.fire({
                          title: "PAMI",
                          text: `Le informamos que el medico de su eleccion ya no posee "${palabra_clave}${text_plan}" sin cargo disponibles para esta fecha.\n desea continuar?\n (se aplicaran cargos a la consulta).`,
                          icon: "info",
                          showCancelButton: true,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#15db72fc",
                          cancelButtonText: "Cita particular",
                          confirmButtonText: "Elejir otra fecha"
                        }).then((result) => {
                          if (result.isDismissed) {
                            maxApp.appointment_step_form_data.form_fields.is_particular = "particular";
                            is_particular_checked();
                          }
                          if (result.isConfirmed) {
                            //alert("back");
                            maxApp.bookingpress_step_navigation(maxApp.bookingpress_sidebar_step_data['basic_details'].previous_tab_name, maxApp.bookingpress_sidebar_step_data['basic_details'].next_tab_name, maxApp.bookingpress_sidebar_step_data['basic_details'].previous_tab_name);
                          }
                        });
                        
                    }
                    
        if( apply_price ){
            maxApp.appointment_step_form_data.service_price_without_currency = original_service_price_w;
            maxApp.appointment_step_form_data.base_price_without_currency = original_service_price_w;
            maxApp.appointment_step_form_data.selected_service_price = original_service_price;
            
        maxApp.appointment_step_form_data.selected_payment_method = "";
        maxApp.is_only_onsite_enabled = false;
        //maxApp.paypal_payment = true;
        //maxApp.total_configure_gateways = 2;
        }else{
            prices_to_cero();
        }
        
    }//fin funct
    
    
    
    async function is_particular_checked(){
        const field_ob_s = maxApp.customer_form_fields.find((element) => element.field_name == "obra_social" );
        const field_plan_ob_s = maxApp.customer_form_fields.find((element) => element.field_name == "plan_obra_social" );
        model_obra = (field_ob_s!=null)? field_ob_s.v_model_value: '';
        model_plan_obra = (field_plan_ob_s!=null)? field_plan_ob_s.v_model_value: '';
        
        const index_field_ob_s = maxApp.customer_form_fields.findIndex((element) => element.field_name == "obra_social" );
        const index_field_plan_ob_s = maxApp.customer_form_fields.findIndex((element) => element.field_name == "plan_obra_social" );
        
        if( original_service_price_w == 0 && parseInt(maxApp.appointment_step_form_data.service_price_without_currency) != 0 ){
            original_service_price_w = maxApp.appointment_step_form_data.service_price_without_currency;
            original_service_price = maxApp.appointment_step_form_data.selected_service_price;
        }
        
        if(maxApp.appointment_step_form_data.form_fields.is_particular == '') maxApp.appointment_step_form_data.form_fields.is_particular = 'obra social';
        
        is_particular_val =  maxApp.appointment_step_form_data.form_fields.is_particular;
        let $is_particular = await document.querySelector('.is_particular input');
        //console.log( " PARTICULAR VALUE: "+is_particular_val );
        
        if( is_particular_val != 'particular' ){
               //console.log(  maxApp.customer_form_fields  );  
               // ########################
               
               //particular_labels( false );
               //console.log(  maxApp  );  
                 
               
               //hide_service_price
               
               if(field_ob_s != null ) field_ob_s.is_required = true;
               if(field_plan_ob_s!=null) field_plan_ob_s.is_required = true;
               if(field_ob_s != null )field_ob_s.is_hide = 0;
               if(field_plan_ob_s!=null) field_plan_ob_s.is_hide = 0;
               
               let $obra_soc_input =  await document.querySelector('.obra_social input');
               
                 //COMENTADO 2024-09-01             
                //document.querySelector('.particular_msg').style.display="none";
                //document.querySelector('.particular_importe_msg').style.display="none";
               
                              prices_to_cero();
                              
                obra_soc_mod();
                //check_apply_available_plans();
                
            }else{
                //particular_labels( true );
                let $obra_soc_input =  await document.querySelector('.obra_social input');
                if( $obra_soc_input !== null ){
               //document.querySelector('.obra_social input').value = "_";
               //document.querySelector('.plan_obra_social input').value = "_";
                }
                
                if(field_ob_s != null )field_ob_s.is_required = false;
                if(field_plan_ob_s!=null) field_plan_ob_s.is_required = false;
                if(field_ob_s != null )field_ob_s.is_hide = 1;
                if(field_plan_ob_s!=null) field_plan_ob_s.is_hide = 1;
                
                
                maxApp.appointment_step_form_data.service_price_without_currency = original_service_price_w;
                maxApp.appointment_step_form_data.base_price_without_currency = original_service_price_w;
                maxApp.appointment_step_form_data.selected_service_price = original_service_price;
                
                
                empty_obra_add_value();
                
                maxApp.appointment_step_form_data.selected_payment_method = "";
                maxApp.is_only_onsite_enabled = false;
                
                
            }
            
            
        maxApp.$forceUpdate();
        
        
    }//fin funct
    
    function empty_obra_add_value(){
                model_obra = "text_oO9f1B";
                model_plan_obra = "text_o9q4Cr";
                
                
                if( maxApp.appointment_step_form_data.form_fields[model_obra] == ""){
                    maxApp.appointment_step_form_data.form_fields[model_obra] = "_";
                    maxApp.appointment_step_form_data[model_obra] = "_";
                }
                if( maxApp.appointment_step_form_data.form_fields[model_plan_obra] == ""){
                    maxApp.appointment_step_form_data.form_fields[model_plan_obra] = "_";
                    maxApp.appointment_step_form_data[model_plan_obra] = "_";
                }
    }
    
    function prices_to_cero(){
        maxApp.appointment_step_form_data.service_price_without_currency = "0";
        maxApp.appointment_step_form_data.base_price_without_currency = "0";
               
        //maxApp.appointment_step_form_data.service_price = "$0";
        maxApp.appointment_step_form_data.selected_service_price = "$0";
        
        maxApp.is_only_onsite_enabled = true;
               
        //console.log(  maxApp.appointment_step_form_data.selected_service_price  );
    }
    
    document.addEventListener("change_tab", () => {
        let current_tab = maxApp_current_tab;
                
        if( 'basic_details' == current_tab ){
            //obra_soc_mod();
            /*
            if(medic_condition.solo_particular){
                maxApp.appointment_step_form_data.form_fields.is_particular = "particular";
                particular_labels( true )
            }else{
                maxApp.appointment_step_form_data.form_fields.is_particular = "";
                particular_labels( false )
            }
            */
                        
            is_particular_checked();
            
            load_obs_select();//2024-07-12
        }
        
        
    });
    
    async function particular_labels( particular=false ){
        let is_particular_labels = await document.querySelectorAll('.is_particular label');
        let is_particular_div = document.querySelectorAll('div.is_particular');
        let el_span_only_particular = document.querySelector('.particular_msg') ? document.querySelector('.particular_msg') : document.createElement('span');
            el_span_only_particular.id="particular_msg";
            el_span_only_particular.className = 'particular_msg el-radio__label';
            el_span_only_particular.innerHTML = "Solo particular disponible.";
            
        let el_span_importe_particular = document.querySelector('.particular_importe_msg') ? document.querySelector('.particular_importe_msg') : document.createElement('span');
            el_span_importe_particular.id="particular_importe_msg";
            el_span_importe_particular.className = 'particular_importe_msg el-radio__label';
            el_span_importe_particular.innerHTML = "El importe de esta consulta es de "+ original_service_price;
            
            //is_particular_div[0].querySelector('.particular_msg').remove();
            //is_particular_div[0].querySelector('.particular_importe_msg').remove();
            is_particular_div[0].append(el_span_only_particular);
            //is_particular_div[0].append(document.createElement('br'));
            is_particular_div[0].append(el_span_importe_particular);
        if( particular ){
            
                is_particular_labels[1].style.display = "none";
                //is_particular_labels[0].after("Este medico solo acepta consulta particular.");
                document.querySelector('.particular_msg').style.display="block";
                
                
        }else{
                //document.remove(el_span_only_particular);
                is_particular_labels[1].style.display = "";
                
        }
        
        
    }
    
    
    document.addEventListener("change", (event) => {
        if( event.target.type== "radio" && (event.target.value == "obra social" || event.target.value == "particular") ){
                //is_particular_val = event.target.value;
                is_particular_checked();
                
                }
            });
    
    
    /**
    $is_particular.addEventListener("change", (event) => {
                is_particular_val = event.target.value;
                is_particular_checked();
            });
*/

</script>
<?php include_once __DIR__ . "/vue_app_mod.php";?>
<style>
.particular_msg{
    color: coral;
}

</style>
    <?php
}


include_once __DIR__ .'/bk_mod.php';


 #### add_action( 'wp_ajax_nopriv_bookingpress_book_appointment_booking', array( $this, 'bookingpress_book_front_appointment_func' ) );
$current_new_appointment_price = 0;

if( !class_exists("bookingpress_mod_appointment") && class_exists("bookingpress_pro_appointment_bookings")  ){

class bookingpress_mod_appointment_PRO Extends bookingpress_pro_appointment_bookings
{
    function __construct(){
        
        
    ###LINE CODE Comentado 2024-06-26 
        add_action('plugins_loaded', [$this, 'change_actions'],10 );
    
        #apply_filters( 'bookingpress_validate_submitted_booking_form', $payment_gateway, $bookingpress_appointment_data );
        //add_filter( 'bookingpress_validate_submitted_booking_form', [$this, 'after_booking_check_obra_social'], 10, 2);
        
        add_filter( 'query', [$this, 'not_save_customersmeta_values'], 10, 1 );
        

    }
    
    public function change_actions(){
        global $bookingpress_pro_appointment_bookings;
        
        remove_action( 'wp_ajax_bookingpress_book_appointment_booking',         [ $bookingpress_pro_appointment_bookings, 'bookingpress_book_front_appointment_func'] );
        remove_action( 'wp_ajax_nopriv_bookingpress_book_appointment_booking',  [ $bookingpress_pro_appointment_bookings, 'bookingpress_book_front_appointment_func'] );
        
        #remove_all_actions( 'wp_ajax_bookingpress_book_appointment_booking');
        #remove_all_actions( 'wp_ajax_nopriv_bookingpress_book_appointment_booking');
        
        
       	    add_action( 'wp_ajax_bookingpress_book_appointment_booking', array( $this, 'bookingpress_book_front_appointment_func_mod' ) );
            add_action( 'wp_ajax_nopriv_bookingpress_book_appointment_booking', array( $this, 'bookingpress_book_front_appointment_func_mod' ) );

    }
    
    public function not_save_customersmeta_values( $query='' ){
        global $tbl_bookingpress_customers_meta;
        
        if( strpos($query, "UPDATE") !== false ){
            if( strpos($query, $tbl_bookingpress_customers_meta) != false ){
                if( strpos($query, " `bookingpress_customersmeta_value` = '_' ") != false ){
                    return false;
                }
            }
            
        }
        
        return $query;
    }
    
    
    public function bookingpress_book_front_appointment_func_mod($return_data = false){
        $mod_appointment_data = array();
        $is_particular = 0;
        
            if( !empty( $_REQUEST['appointment_data'] ) && !is_array( $_REQUEST['appointment_data'] ) ){
				$mod_appointment_data = json_decode( stripslashes_deep( $_REQUEST['appointment_data'] ), true ); //phpcs:ignore
                #$mod_appointment_data = json_decode( $_REQUEST['appointment_data'], true  ); //phpcs:ignore
                
                if( !empty($mod_appointment_data['form_fields']['obra_soc_seguros']) ){
                    $mod_appointment_data['form_fields']['obra_soc_seguros'] = mb_convert_encoding($mod_appointment_data['form_fields']['obra_soc_seguros'], 'UTF-8');
                    
                    //$orig_appointment_data['form_fields']['obra_soc_seguros'] = $mod_appointment_data['form_fields']['obra_soc_seguros'];
                }
                
                global $bookingmod_app;
                $mod_appointment_data = $bookingmod_app->change_app_data( $mod_appointment_data );
                $_REQUEST['appointment_data'] =  $mod_appointment_data ;
                
			}
        
        
        
        if($return_data){
            $response = $this->bookingpress_book_front_appointment_func( true );
			return $response;
        }
        
        
        # NO RETURN 
        $this->bookingpress_book_front_appointment_func( );
        
        
    }//Fin funct front booking
    
    
    function after_booking_check_obra_social( $payment_gateway, $bookingpress_appointment_data ){
        global $wpdb, $BookingPress, $tbl_bookingpress_appointment_bookings, $tbl_bookingpress_services, $tbl_bookingpress_customer_bookings, $tbl_bookingpress_customers;
        
        $entry_id = ! empty( $bookingpress_appointment_data['entry_id'] ) ? $bookingpress_appointment_data['entry_id'] : 0;
        
        if( $entry_id ){
            //$appointment_data = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_entry_id = %d", $entry_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_appointment_bookings is table name defined globally. False Positive alarm
            //$wpdb->update( $tbl_bookingpress_appointment_bookings, array()  );
        }
        
        return $payment_gateway;
    }
    
    
    
    
    
    /**
		 * Main function of book appointment at [bookingpress_form] shortcode
		 *
		 * @return void
		 */
		function bookingpress_book_front_appointment_func($return_data = false) {
			global $wpdb, $BookingPress, $tbl_bookingpress_appointment_bookings, $tbl_bookingpress_services, $tbl_bookingpress_customer_bookings, $tbl_bookingpress_customers, $bookingpress_pro_payment_gateways, $bookingpress_debug_payment_log_id, $bookingpress_other_debug_log_id;
			
            /** $response = [];
                $response['variant'] = 'error';
				$response['title']   = esc_html__( 'Error', 'bookingpress-appointment-booking' );
				$response['msg']     = __( 'Add Lo siento pelotudazo! ' );
				
				echo wp_json_encode( $response );
                exit;
                */
            
			do_action( 'bookingpress_other_debug_log_entry', 'appointment_debug_logs', 'Booking data process starts', 'bookingpress_bookingform', $_REQUEST, $bookingpress_other_debug_log_id );

			$response              = array();
			$wpnonce               = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( $_REQUEST['_wpnonce'] ) : '';
			$bpa_verify_nonce_flag = wp_verify_nonce( $wpnonce, 'bpa_wp_nonce' );
			if ( ! $bpa_verify_nonce_flag ) {
				$response['variant'] = 'error';
				$response['title']   = esc_html__( 'Error', 'bookingpress-appointment-booking' );
				$response['msg']     = esc_html__( 'Sorry, Your request can not be processed due to security reason.', 'bookingpress-appointment-booking' );
				if($return_data){
					return $response;
				}
				echo wp_json_encode( $response );
				die();
			}
			$response['variant']       = 'error';
			$response['title']         = esc_html__( 'Error', 'bookingpress-appointment-booking' );
			$response['msg']           = esc_html__( 'Something went wrong..', 'bookingpress-appointment-booking' );
			$response['is_redirect']   = 0;
			$response['redirect_data'] = '';
			$response['is_spam']       = 1;

			if( !empty( $_REQUEST['appointment_data'] ) && !is_array( $_REQUEST['appointment_data'] ) ){
				$_REQUEST['appointment_data'] = json_decode( stripslashes_deep( $_REQUEST['appointment_data'] ), true ); //phpcs:ignore
				$_REQUEST['appointment_data'] =  !empty($_REQUEST['appointment_data']) ? array_map(array($this,'bookingpress_boolean_type_cast'), $_REQUEST['appointment_data'] ) : array(); // phpcs:ignore				
				$_POST['appointment_data'] =  array_map( array( $BookingPress, 'appointment_sanatize_field'),  $_REQUEST['appointment_data'] ); //phpcs:ignore
			}

			
			$response = apply_filters( 'bookingpress_validate_spam_protection', $response, ( !empty( $_REQUEST['appointment_data'] ) ? array_map( array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['appointment_data'] ) : array() ) );// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_REQUEST contains mixed array and will be sanitized using 'appointment_sanatize_field' function
			
			$booking_response = $this->bookingpress_pro_before_book_appointment_func();
			
			if( !empty( $booking_response ) ){
				$booking_response_arr = json_decode( $booking_response, true );
				if(  !empty( $booking_response_arr['variant'] ) && 'error' == $booking_response_arr['variant'] ){
					if(!empty($booking_response_arr['msg'])) {
						$booking_response_arr['msg'] = stripslashes_deep(html_entity_decode($booking_response_arr['msg'],ENT_QUOTES));
					}
					if($return_data){						
						return $booking_response_arr;
					}					
					wp_send_json($booking_response_arr);
					die;
				}
			}
            
            

			$appointment_booked_successfully = $BookingPress->bookingpress_get_settings( 'appointment_booked_successfully', 'message_setting' );

			if ( ! empty( $_REQUEST ) && ! empty( $_REQUEST['appointment_data'] )  ) {
				$bookingpress_appointment_data            = array_map( array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['appointment_data'] );// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_REQUEST contains mixed array and will be sanitized using 'appointment_sanatize_field' function
                
                
#### CODE ADD
                
                
                $is_mod_price_to_cero=0;
                /*
                $bookingpress_appointment_data = $this->to_cero_price( $bookingpress_appointment_data );
                maxidata( ' appoint data ', $bookingpress_appointment_data );
                $is_mod_price_to_cero=1;
                */
                
				$bookingpress_payment_gateway             = ! empty( $bookingpress_appointment_data['selected_payment_method'] ) ? sanitize_text_field( $bookingpress_appointment_data['selected_payment_method'] ) : '';
				$bookingpress_appointment_on_site_enabled = ( sanitize_text_field( $bookingpress_appointment_data['selected_payment_method'] ) == 'onsite' ) ? 1 : 0;
				$payment_gateway                          = ( $bookingpress_appointment_on_site_enabled ) ? 'on-site' : $bookingpress_payment_gateway;
                
                
                
				$bookingpress_service_price = $bookingpress_total_price = 0;
				if(empty($bookingpress_appointment_data['cart_items'])){
					$bookingpress_service_price = (isset( $bookingpress_appointment_data['service_price_without_currency'] )) ? floatval( $bookingpress_appointment_data['service_price_without_currency'] ) : 0;
					$tip_amount = isset($bookingpress_appointment_data['tip_amount']) ? $bookingpress_appointment_data['tip_amount'] : 0;
					if ( $bookingpress_service_price == 0 && $tip_amount == 0) {
						$payment_gateway = ' - ';
					}
				}else{
					$bookingpress_service_price = !empty($bookingpress_appointment_data['bookingpress_cart_total']) ? $bookingpress_appointment_data['bookingpress_cart_total'] : 0;
				}
                
                
				$bookingpress_total_price = !empty($bookingpress_appointment_data['total_payable_amount']) ? $bookingpress_appointment_data['total_payable_amount'] : 0;
				$bookingpress_discount_amount = !empty($bookingpress_appointment_data['coupon_discount_amount']) ? floatval($bookingpress_appointment_data['coupon_discount_amount']) : 0;                
                
                
##### CODE ADD MAXI 2024

                
                /*
                $bookingpress_service_price = 0;
                $bookingpress_total_price = 0;
                $tip_amount = 0;
                $payment_gateway = ' - ';
                */
                

                
				if($bookingpress_total_price == 0 && !empty($bookingpress_discount_amount)){
					$payment_gateway = " - ";
				}
				
				if(empty($payment_gateway)){
					$payment_gateway = apply_filters( 'bookingpress_check_for_modified_empty_payment_getway', $payment_gateway, $bookingpress_appointment_data );
				}
                
                /** Revisamos si existe un Usuario con el DNI y mismo email-tel si lo tiene */
                global $booking_mod_dni_helper;
                $check_dni_user_field_error = $booking_mod_dni_helper->validate_customer( $bookingpress_appointment_data );
                
                if( !empty( $check_dni_user_field_error ) ){
    				if(  !empty( $check_dni_user_field_error['variant'] ) && 'error' == $check_dni_user_field_error['variant'] ){
    					if(!empty($check_dni_user_field_error['msg'])) {
    						$check_dni_user_field_error['msg'] = stripslashes_deep(html_entity_decode($check_dni_user_field_error['msg'],ENT_QUOTES));
    					}
    					if($return_data){						
    						return $check_dni_user_field_error;
    					}					
    					wp_send_json($check_dni_user_field_error);
    					die;
    				}
    			}
				
				$bookingpress_return_data = apply_filters( 'bookingpress_validate_submitted_booking_form', $payment_gateway, $bookingpress_appointment_data );
				do_action( 'bookingpress_other_debug_log_entry', 'appointment_debug_logs', 'Booking form modified data', 'bookingpress_bookingform', $bookingpress_return_data, $bookingpress_other_debug_log_id );
                
                

				$bookingpress_redirection_mode = !empty($bookingpress_return_data['booking_form_redirection_mode']) ? $bookingpress_return_data['booking_form_redirection_mode'] : 'external_redirection';
				
				$authorization_token = !empty( $bookingpress_appointment_data['authorized_token'] ) ? $bookingpress_appointment_data['authorized_token'] : '';
				
				$bookingpress_uniq_id = $bookingpress_appointment_data['bookingpress_uniq_id'];
				$authorization_time = $bookingpress_appointment_data['authorized_time'];

				$verification_token_key = 'bookingpress_verify_payment_token_' .  $bookingpress_uniq_id . '_' . $authorization_time;

				#CODE ADD
                if( $is_mod_price_to_cero ) $authorization_token = wp_hash( $verification_token_key );
                
                
                if( wp_hash( $verification_token_key ) != $authorization_token ){
					$bookingpress_invalid_token = esc_html__('Sorry! Appointment could not be processed', 'bookingpress-appointment-booking');

                    $response['variant']       = 'error';
                    $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                    $response['msg']           = $bookingpress_invalid_token;
                    $response['is_redirect']   = 0;
                    $response['reason']        = 'token mismatched ' . $authorization_token . ' --- ' . wp_hash( $verification_token ) . ' --- ' . $verification_token_key;
                    $response['redirect_data'] = '';
                    $response['is_spam']       = 0;
					if($return_data){
						return $response;
					}
                    echo json_encode($response);
                    exit;
				}
							

				$bookingpress_total_payment_price = get_transient( $authorization_token );
                ##CODE ADD 
                /**
                if( $is_mod_price_to_cero ) $bookingpress_total_payment_price = 0;
                global $current_new_appointment_price;
                if( $current_new_appointment_price ) $bookingpress_total_payment_price = $current_new_appointment_price;
                */
                global $bookingmod_app;
                $bookingpress_total_payment_price = $bookingmod_app->price;
                

				if( false !== $bookingpress_total_payment_price && $bookingpress_total_payment_price != $bookingpress_total_price ){
					$bookingpress_invalid_amount = esc_html__('Sorry! Appointment could not be processed', 'bookingpress-appointment-booking');

                    $response['variant']       = 'error';
                    $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                    $response['msg']           = $bookingpress_invalid_amount;
                    $response['is_redirect']   = 0;
					$response['bookingpress_total_payment_price'] = $bookingpress_total_payment_price;
					$response['bookingpress_total_price'] = $bookingpress_total_price;
                    $response['reason']        = 'price mismatched ' . $bpa_service_amount . ' --- ' . $bookingpress_service_price;
                    $response['redirect_data'] = '';
                    $response['is_spam']       = 0;
					if($return_data){
						return $response;
					}
                    echo json_encode($response);
                    exit;
				}
                
                
                
                
/**                $bookingpress_service_price = apply_filters( 'bookingpress_mod_service_price', $bookingpress_service_price, $bookingpress_appointment_data, $bookingpress_return_data);
                $bookingpress_service_price = 0;
                $bookingpress_total_price = 0;
                $bookingpress_appointment_data['tip_amount'] = 0;*/
				
				if ( $payment_gateway == 'on-site' && $bookingpress_service_price > 0 ) {
				    
					$entry_id = ! empty( $bookingpress_return_data['entry_id'] ) ? $bookingpress_return_data['entry_id'] : 0;
					$bookingpress_is_cart = !empty($bookingpress_return_data['is_cart']) ? 1 : 0;
					$bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('onsite_appointment_status', 'general_setting');

					if($bookingpress_appointment_status ==  '1' ) {               
                        $bookingpress_pro_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '1', '', '', 1, $bookingpress_is_cart);
                        $bookingpress_redirect_url = $bookingpress_return_data['approved_appointment_url'];
                    } else {                    
                        $bookingpress_pro_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '2', '', '', 1, $bookingpress_is_cart);
                        $bookingpress_redirect_url = $bookingpress_return_data['pending_appointment_url'];
                    }

					if ( ! empty( $bookingpress_redirect_url ) ) {
						$response['variant']       = 'redirect_url';
						$response['title']         = '';
						$response['msg']           = '';
						$response['is_redirect']   = 1;
						$response['redirect_data'] = $bookingpress_redirect_url;
						if($bookingpress_redirection_mode == "in-built"){
							$response['is_transaction_completed'] = 1;
						}
					} else {
						$response['variant'] = 'success';
						$response['title']   = esc_html__( 'Success', 'bookingpress-appointment-booking' );
						$response['msg']     = $appointment_booked_successfully;
					}
				} elseif( ($bookingpress_service_price == 0 && $bookingpress_total_price > 0 && isset($bookingpress_appointment_data['tip_amount']) && !empty($bookingpress_appointment_data['tip_amount']))){
					
                    if($payment_gateway == 'on-site'){
						$entry_id = ! empty( $bookingpress_return_data['entry_id'] ) ? $bookingpress_return_data['entry_id'] : 0;
						$bookingpress_is_cart = !empty($bookingpress_return_data['is_cart']) ? 1 : 0;
						$bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('onsite_appointment_status', 'general_setting');

						if($bookingpress_appointment_status ==  '1' ) {               
							$bookingpress_pro_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '1', '', '', 1, $bookingpress_is_cart);
							$bookingpress_redirect_url = $bookingpress_return_data['approved_appointment_url'];
						} else {                    
							$bookingpress_pro_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '2', '', '', 1, $bookingpress_is_cart);
							$bookingpress_redirect_url = $bookingpress_return_data['pending_appointment_url'];
						}
						if ( ! empty( $bookingpress_redirect_url ) ) {
							$response['variant']       = 'redirect_url';
							$response['title']         = '';
							$response['msg']           = '';
							$response['is_redirect']   = 1;
							$response['redirect_data'] = $bookingpress_redirect_url;
							if($bookingpress_redirection_mode == "in-built"){
								$response['is_transaction_completed'] = 1;
							}
						} else {
							$response['variant'] = 'success';
							$response['title']   = esc_html__( 'Success', 'bookingpress-appointment-booking' );
							$response['msg']     = $appointment_booked_successfully;
						}
					}
					else {
						$response = apply_filters( 'bookingpress_' . $payment_gateway . '_submit_form_data', $response, $bookingpress_return_data );
                        
					}
					
					/* echo "<br> response";
					print_r($response); */
				} 
				elseif ( ($bookingpress_service_price === 0 || $bookingpress_total_price === 0 ) ) {
				    
					$entry_id = ! empty( $bookingpress_return_data['entry_id'] ) ? $bookingpress_return_data['entry_id'] : 0;
					$bookingpress_is_cart = !empty($bookingpress_return_data['is_cart']) ? 1 : 0;
					$bookingpress_pro_payment_gateways->bookingpress_confirm_booking( $entry_id, array(), '1', '', '', 1, $bookingpress_is_cart);

					$redirect_url                    = $bookingpress_return_data['approved_appointment_url'];
					$bookingpress_appointment_status = $BookingPress->bookingpress_get_settings( 'appointment_status', 'general_setting' );
					if ( $bookingpress_appointment_status == '2' ) {
						$redirect_url = $bookingpress_return_data['pending_appointment_url'];
					}

					$bookingpress_redirect_url = $redirect_url;
					if ( ! empty( $bookingpress_redirect_url ) ) {
						$response['variant']       = 'redirect_url';
						$response['title']         = '';
						$response['msg']           = '';
						$response['is_redirect']   = 1;
						$response['redirect_data'] = $bookingpress_redirect_url;
						if($bookingpress_redirection_mode == "in-built"){
							$response['is_transaction_completed'] = 1;
						}
					} else {
						$response['variant'] = 'success';
						$response['title']   = esc_html__( 'Success', 'bookingpress-appointment-booking' );
						$response['msg']     = $appointment_booked_successfully;
					}
				} else {
				    
					$response = apply_filters( 'bookingpress_' . $payment_gateway . '_submit_form_data', $response, $bookingpress_return_data );
                    
                    //echo '{"variant":"error", "msg":"'.$payment_gateway.'", "res": '.json_encode( $response ).'}';
                    //die();
				}

				do_action( 'bookinpgress_after_front_book_appointment', array_map( array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['appointment_data'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_POST contains mixed array and will be sanitized using 'appointment_sanatize_field' function


			}

			if( !empty( $_SESSION['cart_timings'] ) ){
				$_SESSION['cart_timings'] = array();
			}
			$_SESSION['disable_dates'] = array();
			$_SESSION['front_timings'] = array();

			/** Delete transient if the appointment processed successfully */
			delete_transient( $authorization_token );
			if($return_data){

				
                
                $entry_id = !empty( $bookingpress_return_data['entry_id'] ) ? $bookingpress_return_data['entry_id'] : 0;
				$bookingpress_is_cart = !empty($bookingpress_return_data['is_cart']) ? 1 : 0;

				$response['entry_id'] = '';
				$response['appointment_book'] = 0;
				$response['order_id'] = '';
				$response['is_cart'] = 0;
				$response['thankyou_page_data'] = array();
				$response['redirect_data'] = array();
				$is_card_payment =  apply_filters( 'bookingpress_check_payment_gateway_support_card_payment', 0, $payment_gateway );				
				$response['appointment_book'] = ($is_card_payment || ($payment_gateway == 'on-site' && $bookingpress_service_price > 0 ) || ($bookingpress_service_price === 0 || $bookingpress_total_price === 0 ))?1:0;				
				$response['entry_id'] = (!$bookingpress_is_cart)?$entry_id:'';
				$response['is_cart'] = $bookingpress_is_cart;
				$response['order_id'] = ($bookingpress_is_cart)?$entry_id:'';
				if($response['appointment_book']){
					$thankyou_data = $this->bookingpress_bpa_get_thankyou_detail_func(array('entry_id'=>$response['entry_id'],'order_id'=>$response['order_id']));
					if($thankyou_data['status'] == 1){
						$thankyou_detail = (isset($thankyou_data['response']['result']['appointment_detail']))?$thankyou_data['response']['result']['appointment_detail']:'';
						if(!empty($thankyou_detail)){
							$response['thankyou_page_data'] = $thankyou_detail;
						}
					}
				}else{
					$response['redirect_data'] = $bookingpress_return_data;
				}								
				return $response;
			}
            
			echo wp_json_encode( $response );
			exit;
		}
    
    
    public function to_cero_price( $bookingpress_appointment_data ){
        
        $bookingpress_appointment_data['total_payable_amount'] = 0;
        $bookingpress_appointment_data['total_payable_amount_with_currency'] = "$0.00";
        $bookingpress_appointment_data['base_price_without_currency'] = 0;
        $bookingpress_appointment_data['selected_service_price'] = "$0.00";
        $bookingpress_appointment_data['service_price_without_currency'] = 0;
        
        
        $bookingpress_uniq_id = $bookingpress_appointment_data['bookingpress_uniq_id'];
		$authorization_time = $bookingpress_appointment_data['authorized_time'];
        $verification_token_key = 'bookingpress_verify_payment_token_' .  $bookingpress_uniq_id . '_' . $authorization_time;
        
        $bookingpress_appointment_data['authorized_token'] = wp_hash( $verification_token_key );
        
        return $bookingpress_appointment_data;
    }
    
    

}//Fin Class








##########*********///////////***************//////////************/////////#############
###########################################################################################







class bookingpress_appointment_bookings_original_mod extends bookingpress_appointment_bookings {
    
    function __construct(){
        
       ###LINE CODE Comentado 2024-06-26 add_action( 'plugins_loaded', [$this, 'change_actions'],10 );
       
       //add_filter( 'bookingpress_' . 'mercagopago' . '_submit_form_data', [$this, 'bookingMOD_mercagopago_submit_form_data'], 100, 2 );
    
    }
    
    function change_actions(){
        
        remove_all_actions( 'wp_ajax_bookingpress_front_save_appointment_booking');
        remove_all_actions( 'wp_ajax_nopriv_bookingpress_front_save_appointment_booking');
        
        
        add_action('wp_ajax_bookingpress_front_save_appointment_booking', array( $this, 'bookingpress_save_appointment_booking_func' ), 1);
        add_action('wp_ajax_nopriv_bookingpress_front_save_appointment_booking', array( $this, 'bookingpress_save_appointment_booking_func' ), 1);

    }
   
   /**
         * Function for add/update appointment
         *
         * @return void
         */
        function bookingpress_save_appointment_booking_func()
        {
            global $wpdb, $BookingPress, $tbl_bookingpress_appointment_bookings, $tbl_bookingpress_services, $tbl_bookingpress_customer_bookings, $tbl_bookingpress_customers, $bookingpress_payment_gateways, $bookingpress_debug_payment_log_id;
            $response              = array();
            $wpnonce               = isset($_REQUEST['_wpnonce']) ? sanitize_text_field($_REQUEST['_wpnonce']) : '';
            $bpa_verify_nonce_flag = wp_verify_nonce($wpnonce, 'bpa_wp_nonce');
            if (! $bpa_verify_nonce_flag ) {
                $response['variant'] = 'error';
                $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg']     = esc_html__('Sorry, Your request can not be processed due to security reason.', 'bookingpress-appointment-booking');
                wp_send_json($response);
                die();
            }
            $response['variant']       = 'error';
            $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']           = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            $response['is_redirect']   = 0;
            $response['redirect_data'] = '';
            $response['is_spam']       = 1;

            if( !empty( $_REQUEST['appointment_data'] ) && !is_array( $_REQUEST['appointment_data'] ) ){
                $_REQUEST['appointment_data'] = json_decode( stripslashes_deep( $_REQUEST['appointment_data'] ), true ); //phpcs:ignore
                
                ##CODE ADD
                global $bookingmod_app;
                $mod_appointment_data = $bookingmod_app->change_app_data( $mod_appointment_data );
                $_REQUEST['appointment_data'] = json_encode( $mod_appointment_data );
                
                
                $_POST['appointment_data'] = $_REQUEST['appointment_data'] =  !empty($_REQUEST['appointment_data']) ? array_map(array($this,'bookingpress_boolean_type_cast'), $_REQUEST['appointment_data'] ) : array(); // phpcs:ignore
            }
            

            $response = apply_filters('bookingpress_validate_spam_protection', $response, array_map(array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['appointment_data'])); // phpcs:ignore

            
            $booking_response = $this->bookingpress_before_book_appointment_func();
                

            if( !empty( $booking_response ) ){
                $booking_response_arr = json_decode( $booking_response, true );                
                if( !empty( $booking_response_arr['variant'] ) && 'error' == $booking_response_arr['variant'] ){
                    if(!empty($booking_response_arr['msg'])) {
                        $booking_response_arr['msg'] = stripslashes_deep(html_entity_decode($booking_response_arr['msg'],ENT_QUOTES));
                    }                                     
                    wp_send_json($booking_response_arr);
                    die;
                }
            }

            $appointment_booked_successfully = $BookingPress->bookingpress_get_settings('appointment_booked_successfully', 'message_setting');

            if (! empty($_REQUEST) && ! empty($_REQUEST['appointment_data']) ) {
             
                $bookingpress_appointment_data            = array_map(array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['appointment_data']); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_GET['appointment_data'] contains mixed array and sanitized properly using 'appointment_sanatize_field' function
                $bookingpress_payment_gateway             = ! empty($bookingpress_appointment_data['selected_payment_method']) ? $bookingpress_appointment_data['selected_payment_method'] : '';
                $bookingpress_appointment_on_site_enabled = ( $bookingpress_appointment_data['selected_payment_method'] == 'onsite' ) ? 1 : 0;
                $payment_gateway                          = ( $bookingpress_appointment_on_site_enabled ) ? 'on-site' : $bookingpress_payment_gateway;

                $bookingpress_service_price = isset($bookingpress_appointment_data['service_price_without_currency']) ? floatval($bookingpress_appointment_data['service_price_without_currency']) : 0;
                if ($bookingpress_service_price == 0 ) {
                    $payment_gateway = ' - ';
                }

                $bpa_selected_service = $bookingpress_appointment_data['selected_service'];

                $bpa_service_data               = $BookingPress->get_service_by_id( $bpa_selected_service );
                $bpa_service_amount             = ! empty($bpa_service_data['bookingpress_service_price']) ? (float) $bpa_service_data['bookingpress_service_price'] : 0;

                ###CODE ADD
                /**
                $is_mod_price_to_cero= 0;
                if( $is_mod_price_to_cero ){
                    $bpa_service_amount = 0;
                    $bookingpress_service_price = 0;
                }
                global $current_new_appointment_price;
                if( $current_new_appointment_price ){
                    $bpa_service_amount = $bookingpress_service_price = $current_new_appointment_price;
                     
                }
                */
                global $bookingmod_app;
                $bpa_service_amount = $bookingmod_app->price;
                $bookingpress_service_price = $bookingmod_app->price;
                                
                
                if( $bpa_service_amount != $bookingpress_service_price ){
                    $bookingpress_invalid_amount = esc_html__('Sorry! Appointment could not be processed', 'bookingpress-appointment-booking');

                    $response['variant']       = 'error';
                    $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                    $response['msg']           = $bookingpress_invalid_amount;
                    $response['is_redirect']   = 0;
                    $response['reason']        = 'price mismatched ' . $bpa_service_amount . ' --- ' . $bookingpress_service_price;
                    $response['redirect_data'] = '';
                    $response['is_spam']       = 0;

                    echo json_encode($response); 
                    exit;
                }

                
                $bookingpress_return_data = apply_filters('bookingpress_validate_submitted_form', $payment_gateway, $bookingpress_appointment_data);

                
                if ($payment_gateway == 'on-site' && $bookingpress_service_price > 0 ) {
                    $entry_id = ! empty($bookingpress_return_data['entry_id']) ? $bookingpress_return_data['entry_id'] : 0;
                    $bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('onsite_appointment_status', 'general_setting');

                    if($bookingpress_appointment_status ==  '1' ) {               
                        $bookingpress_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '1', '', '', 1);
                        $bookingpress_redirect_url = $bookingpress_return_data['approved_appointment_url'];
                    } else {                    
                        $bookingpress_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '2', '', '', 1);
                        $bookingpress_redirect_url = $bookingpress_return_data['pending_appointment_url'];
                    }
                    if (! empty($bookingpress_redirect_url) ) {
                        $response['variant']       = 'redirect_url';
                        $response['title']         = '';
                        $response['msg']           = '';
                        $response['is_redirect']   = 1;
                        $response['redirect_data'] = $bookingpress_redirect_url;
                    } else {
                        $response['variant'] = 'success';
                        $response['title']   = esc_html__('Success', 'bookingpress-appointment-booking');
                        $response['msg']     = esc_html($appointment_booked_successfully);
                    }
                } elseif ($bookingpress_service_price == 0 ) {
                    
                    $entry_id = ! empty($bookingpress_return_data['entry_id']) ? $bookingpress_return_data['entry_id'] : 0;
                    $bookingpress_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '1', '', '', 1);

                    $redirect_url                    = $bookingpress_return_data['approved_appointment_url'];
                    $bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('appointment_status', 'general_setting');
                    if ($bookingpress_appointment_status == 'Pending' ) {
                        $redirect_url = $bookingpress_return_data['pending_appointment_url'];
                    }

                    $bookingpress_redirect_url = $redirect_url;
                    if (! empty($bookingpress_redirect_url) ) {
                        $response['variant']       = 'redirect_url';
                        $response['title']         = '';
                        $response['msg']           = '';
                        $response['is_redirect']   = 1;
                        $response['redirect_data'] = $bookingpress_redirect_url;
                    } else {
                        $response['variant'] = 'success';
                        $response['title']   = esc_html__('Success', 'bookingpress-appointment-booking');
                        $response['msg']     = esc_html($appointment_booked_successfully);
                    }
                } else {
                    
                    if ($payment_gateway == 'paypal' ) {
                        $bookingpress_payment_mode    = $BookingPress->bookingpress_get_settings('paypal_payment_mode', 'payment_setting');
                        $bookingpress_is_sandbox_mode = ( $bookingpress_payment_mode != 'live' ) ? true : false;
                        $bookingpress_gateway_status  = $BookingPress->bookingpress_get_settings('paypal_payment', 'payment_setting');
                        $bookingpress_merchant_email  = $BookingPress->bookingpress_get_settings('paypal_merchant_email', 'payment_setting');
                        $bookingpress_api_username    = $BookingPress->bookingpress_get_settings('paypal_api_username', 'payment_setting');
                        $bookingpress_api_password    = $BookingPress->bookingpress_get_settings('paypal_api_password', 'payment_setting');
                        $bookingpress_api_signature   = $BookingPress->bookingpress_get_settings('paypal_api_signature', 'payment_setting');

                        $bookingpress_paypal_error_msg  = esc_html__('PayPal Configuration Error', 'bookingpress-appointment-booking');
                        $bookingpress_paypal_error_msg .= ': ';
                        if (empty($bookingpress_merchant_email) ) {
                               $bookingpress_paypal_error_msg .= esc_html__('Please configure merchant email address', 'bookingpress-appointment-booking');

                               $response['variant']       = 'error';
                               $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                               $response['msg']           = $bookingpress_paypal_error_msg;
                               $response['is_redirect']   = 0;
                               $response['redirect_data'] = '';
                               $response['is_spam']       = 0;

                               echo json_encode($response);
                               exit;
                        }

                        if (empty($bookingpress_api_username) ) {
                            $bookingpress_paypal_error_msg .= esc_html__('Please configure PayPal API Username', 'bookingpress-appointment-booking');

                            $response['variant']       = 'error';
                            $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                            $response['msg']           = $bookingpress_paypal_error_msg;
                            $response['is_redirect']   = 0;
                            $response['redirect_data'] = '';
                            $response['is_spam']       = 0;

                            echo json_encode($response);
                            exit;
                        }

                        if (empty($bookingpress_api_password) ) {
                            $bookingpress_paypal_error_msg .= esc_html__('Please configure PayPal API Password', 'bookingpress-appointment-booking');

                            $response['variant']       = 'error';
                            $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                            $response['msg']           = $bookingpress_paypal_error_msg;
                            $response['is_redirect']   = 0;
                            $response['redirect_data'] = '';
                            $response['is_spam']       = 0;

                            echo json_encode($response);
                            exit;
                        }

                        if (empty($bookingpress_api_signature) ) {
                            $bookingpress_paypal_error_msg .= esc_html__('Please configure PayPal API Signature', 'bookingpress-appointment-booking');

                            $response['variant']       = 'error';
                            $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                            $response['msg']           = $bookingpress_paypal_error_msg;
                            $response['is_redirect']   = 0;
                            $response['redirect_data'] = '';
                            $response['is_spam']       = 0;

                            echo json_encode($response);
                            exit;
                        }

                        $entry_id                          = $bookingpress_return_data['entry_id'];
                        $currency                          = $bookingpress_return_data['currency'];
                        $currency_symbol                   = $BookingPress->bookingpress_get_currency_code($currency);
                        $bookingpress_final_payable_amount = isset($bookingpress_return_data['payable_amount']) ? $bookingpress_return_data['payable_amount'] : 0;
                        $customer_details                  = $bookingpress_return_data['customer_details'];
                        $customer_email                    = ! empty($customer_details['customer_email']) ? $customer_details['customer_email'] : '';

                        $bookingpress_service_name = ! empty($bookingpress_return_data['service_data']['bookingpress_service_name']) ? $bookingpress_return_data['service_data']['bookingpress_service_name'] : __('Appointment Booking', 'bookingpress-appointment-booking');

                        $custom_var = $entry_id;

                        $sandbox = $bookingpress_is_sandbox_mode ? 'sandbox.' : '';

                        $notify_url = $bookingpress_return_data['notify_url'];

                        $redirect_url                    = $bookingpress_return_data['approved_appointment_url'];
                        $bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('appointment_status', 'general_setting');
                        if ($bookingpress_appointment_status == 'Pending' ) {
                            $redirect_url = $bookingpress_return_data['pending_appointment_url'];
                        }

                        $bookingpress_paypal_cancel_url_id = $BookingPress->bookingpress_get_customize_settings('after_failed_payment_redirection', 'booking_form');
                        $bookingpress_paypal_cancel_url = get_permalink($bookingpress_paypal_cancel_url_id);
                        $cancel_url                     = ! empty($bookingpress_paypal_cancel_url) ? $bookingpress_paypal_cancel_url : BOOKINGPRESS_HOME_URL;
                        $cancel_url                     = add_query_arg('is_cancel', 1, esc_url($cancel_url));

                        $cmd          = '_xclick';
                        $paypal_form  = '<form name="_xclick" id="bookingpress_paypal_form" action="https://www.' . $sandbox . 'paypal.com/cgi-bin/webscr" method="post">';
                        $paypal_form .= '<input type="hidden" name="cmd" value="' . $cmd . '" />';
                        $paypal_form .= '<input type="hidden" name="amount" value="' . $bookingpress_final_payable_amount . '" />';
                        $paypal_form .= '<input type="hidden" name="business" value="' . $bookingpress_merchant_email . '" />';
                        $paypal_form .= '<input type="hidden" name="notify_url" value="' . $notify_url . '" />';
                        $paypal_form .= '<input type="hidden" name="cancel_return" value="' . $cancel_url . '" />';
                        $paypal_form .= '<input type="hidden" name="return" value="' . $redirect_url . '" />';
                        $paypal_form .= '<input type="hidden" name="rm" value="2" />';
                        $paypal_form .= '<input type="hidden" name="lc" value="en_US" />';
                        $paypal_form .= '<input type="hidden" name="no_shipping" value="1" />';
                        $paypal_form .= '<input type="hidden" name="custom" value="' . $custom_var . '" />';
                        $paypal_form .= '<input type="hidden" name="on0" value="user_email" />';
                        $paypal_form .= '<input type="hidden" name="os0" value="' . $customer_email . '" />';
                        $paypal_form .= '<input type="hidden" name="currency_code" value="' . $currency_symbol . '" />';
                        $paypal_form .= '<input type="hidden" name="page_style" value="primary" />';
                        $paypal_form .= '<input type="hidden" name="charset" value="UTF-8" />';
                        $paypal_form .= '<input type="hidden" name="item_name" value="' . $bookingpress_service_name . '" />';
                        $paypal_form .= '<input type="hidden" name="item_number" value="1" />';
                        $paypal_form .= '<input type="submit" value="Pay with PayPal!" />';
                        $paypal_form .= '</form>';

                        do_action('bookingpress_payment_log_entry', 'paypal', 'payment form redirected data', 'bookingpress', $paypal_form, $bookingpress_debug_payment_log_id);

                        $paypal_form .= '<script type="text/javascript">document.getElementById("bookingpress_paypal_form").submit();</script>';

                        $response['variant']       = 'redirect';
                        $response['title']         = '';
                        $response['msg']           = '';
                        $response['is_redirect']   = 1;
                        $response['redirect_data'] = $paypal_form;
                        $response['entry_id']      = $entry_id;
                    }
                    
                    ##CODE ADD
                    
                    if( $payment_gateway == 'mercagopago' ){
                        
                        $response = $this->bookingMOD_mercagopago_submit_form_data($response, $bookingpress_return_data);
                        
                    }
                    
                    
                }
            }

            echo json_encode($response);
            exit();
        }
        
        #apply_filters( 'bookingpress_' . $payment_gateway . '_submit_form_data', $response, $bookingpress_return_data );
        /**
         * add_filter( 'bookingpress_' . 'mercagopago' . '_submit_form_data', [$this, 'bookingMOD_mercagopago_submit_form_data'], 100, 2 );
         */
        public function bookingMOD_mercagopago_submit_form_data( $response, $bookingpress_return_data ){
            global $BookingPress;
                        //echo '{"variant":"error", "msg":"marcadopagoooooooo"}';
                        //exit;
                        
                        $entry_id                          = $bookingpress_return_data['entry_id'];
                        $currency                          = $bookingpress_return_data['currency'];
                        $currency_symbol                   = $BookingPress->bookingpress_get_currency_code($currency);
                        $bookingpress_final_payable_amount = isset($bookingpress_return_data['payable_amount']) ? $bookingpress_return_data['payable_amount'] : 0;
                        $customer_details                  = $bookingpress_return_data['customer_details'];
                        $customer_email                    = ! empty($customer_details['customer_email']) ? $customer_details['customer_email'] : '';

                        $bookingpress_service_name = ! empty($bookingpress_return_data['service_data']['bookingpress_service_name']) ? $bookingpress_return_data['service_data']['bookingpress_service_name'] : __('Appointment Booking', 'bookingpress-appointment-booking');

                        $custom_var = $entry_id;

                        $sandbox = 'sandbox.';

                        $notify_url = $bookingpress_return_data['notify_url'];

                        $redirect_url                    = $bookingpress_return_data['approved_appointment_url'];
                        $bookingpress_appointment_status = $BookingPress->bookingpress_get_settings('appointment_status', 'general_setting');
                        if ($bookingpress_appointment_status == 'Pending' ) {
                            $redirect_url = $bookingpress_return_data['pending_appointment_url'];
                        }

                        $bookingpress_paypal_cancel_url_id = $BookingPress->bookingpress_get_customize_settings('after_failed_payment_redirection', 'booking_form');
                        $bookingpress_paypal_cancel_url = get_permalink($bookingpress_paypal_cancel_url_id);
                        $cancel_url                     = ! empty($bookingpress_paypal_cancel_url) ? $bookingpress_paypal_cancel_url : BOOKINGPRESS_HOME_URL;
                        $cancel_url                     = add_query_arg('is_cancel', 1, esc_url($cancel_url));
                        
                        
                        
                        $cmd          = '_xclick';
                        $paypal_form  = '<form name="_xclick" id="bookingpress_paypal_form" action="https://www.' . $sandbox . 'paypal.com/cgi-bin/webscr" method="post">';
                        $paypal_form .= '<input type="hidden" name="cmd" value="' . $cmd . '" />';
                        $paypal_form .= '<input type="hidden" name="amount" value="' . $bookingpress_final_payable_amount . '" />';
                        $paypal_form .= '<input type="hidden" name="business" value="' . 'example@example.com' . '" />';
                        $paypal_form .= '<input type="hidden" name="notify_url" value="' . $notify_url . '" />';
                        $paypal_form .= '<input type="hidden" name="cancel_return" value="' . $cancel_url . '" />';
                        $paypal_form .= '<input type="hidden" name="return" value="' . $redirect_url . '" />';
                        $paypal_form .= '<input type="hidden" name="rm" value="2" />';
                        $paypal_form .= '<input type="hidden" name="lc" value="en_US" />';
                        $paypal_form .= '<input type="hidden" name="no_shipping" value="1" />';
                        $paypal_form .= '<input type="hidden" name="custom" value="' . $custom_var . '" />';
                        $paypal_form .= '<input type="hidden" name="on0" value="user_email" />';
                        $paypal_form .= '<input type="hidden" name="os0" value="' . $customer_email . '" />';
                        $paypal_form .= '<input type="hidden" name="currency_code" value="' . $currency_symbol . '" />';
                        $paypal_form .= '<input type="hidden" name="page_style" value="primary" />';
                        $paypal_form .= '<input type="hidden" name="charset" value="UTF-8" />';
                        $paypal_form .= '<input type="hidden" name="item_name" value="' . $bookingpress_service_name . '" />';
                        $paypal_form .= '<input type="hidden" name="item_number" value="1" />';
                        $paypal_form .= '<input type="submit" value="Pay with PayPal!" />';
                        $paypal_form .= '</form>';

                        //do_action('bookingpress_payment_log_entry', 'mercagopago', 'payment form redirected data', 'bookingpress', $paypal_form, $bookingpress_debug_payment_log_id);

                        //$paypal_form .= '<script type="text/javascript">document.getElementById("bookingpress_paypal_form").submit();</script>';
                        $paypal_form .= '<script type="text/javascript">window.app.bookingpress_is_display_external_html = false; document.getElementById("bookingpress_paypal_form").submit();</script>';

                        $response['variant']       = 'redirect';
                        $response['title']         = 'merca';
                        $response['msg']           = '';
                        $response['is_redirect']   = 1;
                        $response['redirect_data'] = $paypal_form;
                        $response['entry_id']      = $entry_id;
                        
                        #global $bookingpress_payment_gateways;
                        ### $bookingpress_payment_gateways->bookingpress_confirm_booking($entry_id, array(), '1', '', '', 1);
                        
                        /**
                        echo json_encode( $response );
                        die();
                        */
                        return $response;
            
        }
   
   
    
}//FIN  class original



if ( ! class_exists( 'bookingpress_pro_payment_gateways_mod' ) && class_exists( 'bookingpress_pro_payment_gateways' ) ) {
    
	class bookingpress_pro_payment_gateways_mod Extends bookingpress_pro_payment_gateways {

		public function bookingpress_confirm_booking( $entry_id, $payment_gateway_data, $payment_status, $transaction_id_field = '', $payment_amount_field = '', $is_front = 2, $is_cart_order = 0, $payment_currency_field = '' ) {

			global $wpdb, $BookingPress, $tbl_bookingpress_entries, $tbl_bookingpress_customers, $bookingpress_email_notifications, $bookingpress_debug_payment_log_id, $bookingpress_customers, $bookingpress_coupons, $tbl_bookingpress_appointment_meta, $tbl_bookingpress_appointment_bookings, $bookingpress_other_debug_log_id, $tbl_bookingpress_payment_logs,$bookingpress_dashboard, $bookingpress_pro_staff_members, $tbl_bookingpress_staffmembers_services, $bookingpress_bring_anyone_with_you, $bookingpress_services, $tbl_bookingpress_double_bookings, $bookingpress_pro_global_options;

			$bookingpress_confirm_booking_received_data = array(
				'entry_id' => $entry_id,
				'payment_gateway_data' => wp_json_encode($payment_gateway_data),
				'payment_status' => $payment_status,
				'transaction_id_field' => $transaction_id_field,
				'payment_amount_field' => $payment_amount_field,
				'currency_amount_field' => $payment_currency_field,
				'is_front' => $is_front,
				'is_cart_order' => $is_cart_order,
			);
            //print_r($bookingpress_confirm_booking_received_data);
            //exit;
			do_action( 'bookingpress_other_debug_log_entry', 'appointment_debug_logs', 'Booking form confirm booking data', 'bookingpress_complete_appointment', $bookingpress_confirm_booking_received_data, $bookingpress_other_debug_log_id );

			$bookingpress_before_check_package_add = apply_filters('bookingpress_before_appointment_confirm_booking_check_package_booking','',$entry_id,$payment_gateway_data,$payment_status,$transaction_id_field,$payment_amount_field,$is_front,$is_cart_order,$payment_currency_field);
			if($bookingpress_before_check_package_add){
				return $bookingpress_before_check_package_add;
			}

			$bookingpress_before_appointment_add = apply_filters('bookingpress_before_appointment_confirm_booking',false,$entry_id,$payment_gateway_data,$payment_status,$transaction_id_field,$payment_amount_field,$is_front,$is_cart_order);
			if($bookingpress_before_appointment_add){
				return 0;
			}
			$bookingpress_is_appointment_exists = $wpdb->get_var($wpdb->prepare("SELECT bookingpress_appointment_booking_id FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_appointment_booking_id = %d AND bookingpress_complete_payment_token != ''", $entry_id)); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm

			if($bookingpress_is_appointment_exists > 0){
				$bookingpress_get_appointment_details = $wpdb->get_row($wpdb->prepare("SELECT bookingpress_entry_id,bookingpress_appointment_booking_id, bookingpress_is_cart, bookingpress_order_id,bookingpress_customer_email,bookingpress_payment_id FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_appointment_booking_id = %d AND bookingpress_complete_payment_token != ''", $entry_id), ARRAY_A);// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
				$bookingpress_customer_email = !empty($bookingpress_get_appointment_details['bookingpress_customer_email']) ? ($bookingpress_get_appointment_details['bookingpress_customer_email']) : '';

				$bookingpress_is_cart = !empty($bookingpress_get_appointment_details['bookingpress_is_cart']) ? intval($bookingpress_get_appointment_details['bookingpress_is_cart']) : 0;
				$bookingpress_order_id = !empty($bookingpress_get_appointment_details['bookingpress_order_id']) ? intval($bookingpress_get_appointment_details['bookingpress_order_id']) : 0;
				$bookingpress_entry_id = !empty($bookingpress_get_appointment_details['bookingpress_entry_id']) ? intval($bookingpress_get_appointment_details['bookingpress_entry_id']) : 0;

				$transaction_id = ( ! empty( $transaction_id_field ) && ! empty( $payment_gateway_data[ $transaction_id_field ] ) ) ? $payment_gateway_data[ $transaction_id_field ] : '';
				
				$bookingpress_ap_status = 1;
				
				$selected_payment_method = !empty($_POST['complete_payment_data']['selected_payment_method']) ? sanitize_text_field($_POST['complete_payment_data']['selected_payment_method']) : ''; //phpcs:ignore
				$payment_gateway = $payment_gateway_name  = !empty($payment_gateway_data['bookingpress_payment_gateway']) ? $payment_gateway_data['bookingpress_payment_gateway'] : $selected_payment_method;
				if(empty($payment_gateway)) {
					$bookingpress_payment_id = !empty($bookingpress_get_appointment_details['bookingpress_payment_id']) ? intval($bookingpress_get_appointment_details['bookingpress_payment_id']) : 0;
					$bookingpress_payment_details = $wpdb->get_row($wpdb->prepare("SELECT bookingpress_payment_gateway FROM {$tbl_bookingpress_payment_logs} WHERE bookingpress_payment_log_id = %d", $bookingpress_payment_id), ARRAY_A);//phpcs:ignore
                    if(!empty($bookingpress_payment_details['bookingpress_payment_gateway'])){
                        $payment_gateway = $payment_gateway_name  =  $bookingpress_payment_details['bookingpress_payment_gateway'];
                    }					
				}				
				$bookingpress_ap_status = $BookingPress->bookingpress_get_settings('appointment_status', 'general_setting');				
				if (!empty($payment_gateway) && $payment_gateway == 'on-site' ) {
					$bookingpress_ap_status = $BookingPress->bookingpress_get_settings('onsite_appointment_status', 'general_setting');
				}
				
				
				$bookingpress_email_notification_type = '';
				if ( $bookingpress_ap_status == '2' ) {
					$bookingpress_email_notification_type = 'Appointment Pending';
				} elseif ( $bookingpress_ap_status == '1' ) {
					$bookingpress_email_notification_type = 'Appointment Approved';
				} elseif ( $bookingpress_ap_status == '3' ) {
					$bookingpress_email_notification_type = 'Appointment Canceled';
				} elseif ( $bookingpress_ap_status == '4' ) {
					$bookingpress_email_notification_type = 'Appointment Rejected';
				}

				//Store Coupon Data in appointment & Payment Log Start
				$bookingpress_payment_log_update_data = array();
				$bookingpress_appointment_booking_update_data = array();
				if($bookingpress_entry_id){

					$entry_data = $wpdb->get_row( $wpdb->prepare( "SELECT bookingpress_coupon_details,bookingpress_coupon_discount_amount FROM {$tbl_bookingpress_entries} WHERE bookingpress_entry_id = %d", $bookingpress_entry_id ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_entries is a table name. false alarm

					if ( ! empty( $entry_data ) ) { 
																	
						$bookingpress_coupon_details                 = $entry_data['bookingpress_coupon_details'];
						$bookingpress_coupon_discounted_amount       = $entry_data['bookingpress_coupon_discount_amount'];

						$bookingpress_payment_log_update_data = array(
							'bookingpress_coupon_details'          => $bookingpress_coupon_details,
							'bookingpress_coupon_discount_amount'  => $bookingpress_coupon_discounted_amount,
						);						
						$bookingpress_appointment_booking_update_data = array(						
							'bookingpress_coupon_details'          => $bookingpress_coupon_details,
							'bookingpress_coupon_discount_amount'  => $bookingpress_coupon_discounted_amount,							
						);						
						

					}


				}


				//Store Coupon Data in appointment & Payment Log Over
				$bookingpress_is_group_order = apply_filters('bookingpress_check_is_group_order_for_complete_payment_update',false, $entry_id,$bookingpress_order_id);

				if($bookingpress_is_cart || $bookingpress_is_group_order){		
					
					$bookingpress_appointment_booking_update_data['bookingpress_complete_payment_token'] = '';
					$bookingpress_appointment_booking_update_data['bookingpress_appointment_status'] = $bookingpress_ap_status;										
					$wpdb->update($tbl_bookingpress_appointment_bookings, $bookingpress_appointment_booking_update_data, array('bookingpress_order_id' => $bookingpress_order_id) );	
					
					$bookingpress_payment_log_update_data['bookingpress_complete_payment_token'] = '';
					$bookingpress_payment_log_update_data['bookingpress_payment_status'] = 1;
					$bookingpress_payment_log_update_data['bookingpress_transaction_id'] = $transaction_id;
					$bookingpress_payment_log_update_data['bookingpress_payment_gateway'] = $payment_gateway_name;
					$bookingpress_payment_log_update_data['bookingpress_created_at'] = current_time('mysql');
					$wpdb->update($tbl_bookingpress_payment_logs, $bookingpress_payment_log_update_data, array('bookingpress_order_id' => $bookingpress_order_id) );

					$bookingpress_inserted_appointment_ids = $wpdb->get_results($wpdb->prepare("SELECT bookingpress_appointment_booking_id,bookingpress_customer_email FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_order_id = %d", $bookingpress_order_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
					foreach($bookingpress_inserted_appointment_ids as $k2 => $v2){
						$entry_id = $v2['bookingpress_appointment_booking_id'];
						$bookingpress_customer_email = !empty($v2['bookingpress_customer_email']) ? $v2['bookingpress_customer_email'] : '';
						do_action('bookingpress_after_change_appointment_status', $entry_id, $bookingpress_ap_status);
						$bookingpress_email_notifications->bookingpress_send_after_payment_log_entry_email_notification( $bookingpress_email_notification_type, $entry_id,$bookingpress_customer_email );
					}
				}else{

					$bookingpress_appointment_booking_update_data['bookingpress_complete_payment_token'] = '';
					$bookingpress_appointment_booking_update_data['bookingpress_appointment_status'] = $bookingpress_ap_status;	
					$wpdb->update($tbl_bookingpress_appointment_bookings, $bookingpress_appointment_booking_update_data, array('bookingpress_appointment_booking_id' => $entry_id) );
					$bookingpress_payment_log_update_data['bookingpress_complete_payment_token'] = '';
					$bookingpress_payment_log_update_data['bookingpress_payment_status'] = 1;
					$bookingpress_payment_log_update_data['bookingpress_transaction_id'] = $transaction_id;
					$bookingpress_payment_log_update_data['bookingpress_payment_gateway'] = $payment_gateway_name;
					$bookingpress_payment_log_update_data['bookingpress_created_at'] = current_time('mysql');
					$wpdb->update($tbl_bookingpress_payment_logs, $bookingpress_payment_log_update_data, array('bookingpress_appointment_booking_ref' => $entry_id) );					

					do_action('bookingpress_after_change_appointment_status', $entry_id, $bookingpress_ap_status);
					$bookingpress_email_notifications->bookingpress_send_after_payment_log_entry_email_notification( $bookingpress_email_notification_type, $entry_id, $bookingpress_customer_email );					
				}
				return 0;
			}

			$transaction_id = ( ! empty( $transaction_id_field ) && ! empty( $payment_gateway_data[ $transaction_id_field ] ) ) ? $payment_gateway_data[ $transaction_id_field ] : '';

			if(!empty($transaction_id)){
				//Check received transaction id already exists or not
				$bookingpress_exist_transaction_count = $wpdb->get_var($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_payment_logs} WHERE bookingpress_transaction_id = %s", $transaction_id)); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_payment_logs is a table name. false alarm

				if($bookingpress_exist_transaction_count > 0){
					do_action( 'bookingpress_other_debug_log_entry', 'appointment_debug_logs', 'Transaction '.$transaction_id.' already exists', 'bookingpress_complete_appointment', $bookingpress_exist_transaction_count, $bookingpress_other_debug_log_id );
					return 0;
				}
			}

			if ( ! empty( $entry_id ) && empty($is_cart_order) ) {

				$entry_data = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$tbl_bookingpress_entries} WHERE bookingpress_entry_id = %d", $entry_id ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_entries is a table name. false alarm

				if ( ! empty( $entry_data ) ) {
					$bookingpress_entry_user_id                  = $entry_data['bookingpress_customer_id'];
					$bookingpress_customer_name                  = $entry_data['bookingpress_customer_name'];
					$bookingpress_customer_username              = $entry_data['bookingpress_username'];
					$bookingpress_customer_phone                 = $entry_data['bookingpress_customer_phone'];
					$bookingpress_customer_firstname             = $entry_data['bookingpress_customer_firstname'];
					$bookingpress_customer_lastname              = $entry_data['bookingpress_customer_lastname'];
					$bookingpress_customer_country               = $entry_data['bookingpress_customer_country'];
					$bookingpress_customer_phone_dial_code       = $entry_data['bookingpress_customer_phone_dial_code'];
					$bookingpress_customer_email                 = $entry_data['bookingpress_customer_email'];
					$bookingpress_customer_timezone				 = $entry_data['bookingpress_customer_timezone'];
					$bookingpress_customer_dst_timezone			 = $entry_data['bookingpress_dst_timezone'];
					$bookingpress_service_id                     = $entry_data['bookingpress_service_id'];
					$bookingpress_service_name                   = $entry_data['bookingpress_service_name'];
					$bookingpress_service_price                  = $entry_data['bookingpress_service_price'];
					$bookingpress_service_currency               = $entry_data['bookingpress_service_currency'];
					$bookingpress_service_duration_val           = $entry_data['bookingpress_service_duration_val'];
					$bookingpress_service_duration_unit          = $entry_data['bookingpress_service_duration_unit'];
					$bookingpress_payment_gateway                = $entry_data['bookingpress_payment_gateway'];
					$bookingpress_appointment_date               = $entry_data['bookingpress_appointment_date'];
					$bookingpress_appointment_time               = $entry_data['bookingpress_appointment_time'];
					$bookingpress_appointment_end_time           = $entry_data['bookingpress_appointment_end_time'];
					$bookingpress_appointment_internal_note      = $entry_data['bookingpress_appointment_internal_note'];
					$bookingpress_appointment_send_notifications = $entry_data['bookingpress_appointment_send_notifications'];
					$bookingpress_appointment_status             = $entry_data['bookingpress_appointment_status'];
					$bookingpress_coupon_details                 = $entry_data['bookingpress_coupon_details'];
					$bookingpress_coupon_discounted_amount       = $entry_data['bookingpress_coupon_discount_amount'];
					$bookingpress_deposit_payment_details        = $entry_data['bookingpress_deposit_payment_details'];
					$bookingpress_deposit_amount                 = $entry_data['bookingpress_deposit_amount'];
					$bookingpress_selected_extra_members         = $entry_data['bookingpress_selected_extra_members'];
					$bookingpress_extra_service_details          = $entry_data['bookingpress_extra_service_details'];
					$bookingpress_staff_member_id                = $entry_data['bookingpress_staff_member_id'];
					$bookingpress_staff_member_price             = $entry_data['bookingpress_staff_member_price'];
					$bookingpress_staff_first_name               = $entry_data['bookingpress_staff_first_name'];
					$bookingpress_staff_last_name                = $entry_data['bookingpress_staff_last_name'];
					$bookingpress_staff_email_address            = $entry_data['bookingpress_staff_email_address'];
					$bookingpress_staff_member_details           = $entry_data['bookingpress_staff_member_details'];
					$bookingpress_paid_amount                    = $entry_data['bookingpress_paid_amount'];
					$bookingpress_due_amount                     = $entry_data['bookingpress_due_amount'];
					$bookingpress_total_amount                   = $entry_data['bookingpress_total_amount'];
					$bookingpress_tax_percentage                 = $entry_data['bookingpress_tax_percentage'];
					$bookingpress_tax_amount                     = $entry_data['bookingpress_tax_amount'];
					$bookingpress_price_display_setting          = $entry_data['bookingpress_price_display_setting'];
					$bookingpress_display_tax_order_summary      = $entry_data['bookingpress_display_tax_order_summary'];
					$bookingpress_included_tax_label             = $entry_data['bookingpress_included_tax_label'];
					$bookingpress_complete_payment_token         = $entry_data['bookingpress_complete_payment_token'];
					$bookingpress_complete_payment_url_selection         = $entry_data['bookingpress_complete_payment_url_selection'];
					$bookingpress_complete_payment_url_selection_method         = $entry_data['bookingpress_complete_payment_url_selection_method'];

					$payable_amount = ( ! empty( $payment_amount_field ) && ! empty( $payment_gateway_data[ $payment_amount_field ] ) ) ? $payment_gateway_data[ $payment_amount_field ] : $bookingpress_paid_amount;

					$bookingpress_customer_id = $bookingpress_wpuser_id = $bookingpress_is_customer_create = 0;
					$bookingpress_customer_details = $bookingpress_customers->bookingpress_create_customer( $entry_data, $bookingpress_entry_user_id, $is_front );					
					if ( ! empty( $bookingpress_customer_details ) ) {
						$bookingpress_customer_id = $bookingpress_customer_details['bookingpress_customer_id'];
						$bookingpress_wpuser_id   = $bookingpress_customer_details['bookingpress_wpuser_id'];
						$bookingpress_is_customer_create = !empty($bookingpress_customer_details['bookingpress_is_customer_create']) ? $bookingpress_customer_details['bookingpress_is_customer_create'] : 0;
					}

					if ( ! empty( $_REQUEST['appointment_data']['form_fields'] ) && ! empty( $bookingpress_customer_id ) ) {
						$this->bookingpress_insert_customer_field_data( $bookingpress_customer_id, array_map( array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['appointment_data']['form_fields'] ) ); //phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_REQUEST['appointment_data']['form_fields'] has already been sanitized.
					}

					$appointment_booking_fields = array(
						'bookingpress_entry_id'                      => $entry_id,
						'bookingpress_payment_id'                    => 0,
						'bookingpress_customer_id'                   => $bookingpress_customer_id,
						'bookingpress_customer_name'      			 => $bookingpress_customer_name, 
						'bookingpress_username'                      => $bookingpress_customer_username,
						'bookingpress_customer_firstname' 			 => $bookingpress_customer_firstname,
						'bookingpress_customer_lastname'  			 => $bookingpress_customer_lastname,
						'bookingpress_customer_phone'     			 => $bookingpress_customer_phone,
						'bookingpress_customer_country'   			 => $bookingpress_customer_country,
						'bookingpress_customer_phone_dial_code'      => $bookingpress_customer_phone_dial_code,
						'bookingpress_customer_email'     			 => $bookingpress_customer_email, 
						'bookingpress_service_id'                    => $bookingpress_service_id,
						'bookingpress_service_name'                  => $bookingpress_service_name,
						'bookingpress_service_price'                 => $bookingpress_service_price,
						'bookingpress_service_currency'              => $bookingpress_service_currency,
						'bookingpress_service_duration_val'          => $bookingpress_service_duration_val,
						'bookingpress_service_duration_unit'         => $bookingpress_service_duration_unit,
						'bookingpress_appointment_date'              => $bookingpress_appointment_date,
						'bookingpress_appointment_time'              => $bookingpress_appointment_time,
						'bookingpress_appointment_end_time'          => $bookingpress_appointment_end_time,
						'bookingpress_appointment_internal_note'     => $bookingpress_appointment_internal_note,
						'bookingpress_appointment_send_notification' => $bookingpress_appointment_send_notifications,
						'bookingpress_appointment_status'            => $bookingpress_appointment_status,
						'bookingpress_appointment_timezone'			 => $bookingpress_customer_timezone,
						'bookingpress_dst_timezone'				     => $bookingpress_customer_dst_timezone,
						'bookingpress_coupon_details'                => $bookingpress_coupon_details,
						'bookingpress_coupon_discount_amount'        => $bookingpress_coupon_discounted_amount,
						'bookingpress_tax_percentage'                => $bookingpress_tax_percentage,
						'bookingpress_tax_amount'                    => $bookingpress_tax_amount,
						'bookingpress_price_display_setting'         => $bookingpress_price_display_setting,
						'bookingpress_display_tax_order_summary'     => $bookingpress_display_tax_order_summary,
						'bookingpress_included_tax_label'            => $bookingpress_included_tax_label,
						'bookingpress_deposit_payment_details'       => $bookingpress_deposit_payment_details,
						'bookingpress_deposit_amount'                => $bookingpress_deposit_amount,
						'bookingpress_complete_payment_url_selection'	=> $bookingpress_complete_payment_url_selection,
						'bookingpress_complete_payment_url_selection_method' => $bookingpress_complete_payment_url_selection_method,
						'bookingpress_complete_payment_token'        => $bookingpress_complete_payment_token,
						'bookingpress_selected_extra_members'        => $bookingpress_selected_extra_members,
						'bookingpress_extra_service_details'         => $bookingpress_extra_service_details,
						'bookingpress_staff_member_id'               => $bookingpress_staff_member_id,
						'bookingpress_staff_member_price'            => $bookingpress_staff_member_price,
						'bookingpress_staff_first_name'               => $bookingpress_staff_first_name,
						'bookingpress_staff_last_name'                => $bookingpress_staff_last_name,
						'bookingpress_staff_email_address'           => $bookingpress_staff_email_address,
						'bookingpress_staff_member_details'          => $bookingpress_staff_member_details,
						'bookingpress_paid_amount'                   => $bookingpress_paid_amount,
						'bookingpress_due_amount'                    => $bookingpress_due_amount,
						'bookingpress_total_amount'                  => $bookingpress_total_amount,
						'bookingpress_created_at'         			 => current_time('mysql'),
					);

					$appointment_booking_fields = apply_filters( 'bookingpress_modify_appointment_booking_fields_before_insert', $appointment_booking_fields, $entry_data );

					/** Validate again before confirming the payment start */

					/** Check for the paid amount and the received amount */
					if( !empty( $payment_gateway_data ) && 'woocommerce' != $bookingpress_payment_gateway ){

						if( 'stripe' == strtolower( trim( $bookingpress_payment_gateway ) ) && empty( $payment_amount_field  ) ){
							$payment_amount_field = 'amount';
						} else if( 'paypal' == strtolower( trim( $bookingpress_payment_gateway ) ) && empty( $payment_amount_field ) ){
							$payment_amount_field = 'mc_gross';
						}

						if( !empty( $payment_amount_field ) && !preg_match( '/\|/', $payment_amount_field ) ){
							$paid_amount = !empty( $payment_gateway_data[ $payment_amount_field ] ) ? $payment_gateway_data[ $payment_amount_field ] : 0;
						} else {
							$paid_amount = apply_filters( 'bookingpress_retrieve_payment_amount_currency_from_payment_data', 0, $payment_gateway_data, $bookingpress_payment_gateway, false );
						}
						$paid_amount = apply_filters( 'bookingpress_adjust_paid_amount', $paid_amount, strtolower( $bookingpress_payment_gateway ) );

						if( floatval( $bookingpress_paid_amount ) != floatval( $paid_amount ) ){

                            $suspicious_data = wp_json_encode(
                                array(
                                    'paid_amount_entries' => $bookingpress_paid_amount,
                                    'paid_amount_payment' => $paid_amount
                                )
                            );

                            status_header( 400, 'Amount Mismatched' );
                            http_response_code( 400 );
                            do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'prevent suspicious payment due to amount mismatched', 'bookingpress', $suspicious_data, $bookingpress_debug_payment_log_id);
                            die;
                        }

						/** Check for the currency received from the payment gateway data*/
						if( !empty( $payment_currency_field ) && !empty( $payment_gateway_data[ $payment_currency_field ] ) && !preg_match( '/\|/', $payment_currency_field ) ){

							if( strtolower( trim( $payment_gateway_data[ $payment_currency_field ] ) ) != strtolower( trim( $bookingpress_service_currency ) ) ){
								$suspicious_data = wp_json_encode(
									array(
										'service_currency' => $bookingpress_service_currency,
										'paid_in_currency' => $payment_gateway_data[ $payment_currency_field ]
									)
								);
	
								status_header( 400, 'currency Mismatched' );
								http_response_code( 400 );
								do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'prevent suspicious payment due to currency mismatched', 'bookingpress', $suspicious_data, $bookingpress_debug_payment_log_id);
								die;
							}

						} else {
							
							$payment_currency = apply_filters('bookingpress_retrieve_payment_amount_currency_from_payment_data', '', $payment_gateway_data, $bookingpress_payment_gateway, true );

							if( !empty( $payment_currency ) && strtolower( trim( $payment_currency ) ) != strtolower( trim( $bookingpress_service_currency ) ) ){
								$suspicious_data = wp_json_encode(
									array(
										'service_currency' => $bookingpress_service_currency,
										'paid_in_currency' => $payment_currency
									)
								);
	
								status_header( 400, 'currency Mismatched' );
								http_response_code( 400 );
								do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'prevent suspicious payment due to currency mismatched', 'bookingpress', $suspicious_data, $bookingpress_debug_payment_log_id);
								die;
							}
						}
					}
					/** Check for the paid amount and the received amount */

					/** Check if the entry already exists in the double booking table */
					$double_book_entry_id = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(bookingpress_double_booking_id) FROM $tbl_bookingpress_double_bookings WHERE bookingpress_entry_id = %d", $entry_id ) ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_double_bookings is table name defined globally. False Positive alarm 

					if( 0 < $double_book_entry_id ){
						status_header( 409 );
						do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'duplicate appointment data already exists in double booking table', 'bookingpress', $double_book_entry_id, $bookingpress_debug_payment_log_id);
						die;
					}
                    
                    $appointment_sid = $appointment_booking_fields['bookingpress_service_id'];
                    $appointment_date = $appointment_booking_fields['bookingpress_appointment_date'];
                    $appointment_stime = $appointment_booking_fields['bookingpress_appointment_time'];
                    $appointment_etime = $appointment_booking_fields['bookingpress_appointment_end_time'];

					$posted_data = array();

					$posted_data['appointment_data']['selected_service_duration'] = $bookingpress_service_duration_val;
					$posted_data['appointment_data']['selected_service_duration_unit'] = $bookingpress_service_duration_unit;

					if( !empty( $bookingpress_staff_member_id ) ){
						$_POST['bookingpress_selected_staffmember']['selected_staff_member_id'] = $bookingpress_staff_member_id;
						$posted_data['appointment_data']['bookingpress_selected_staff_member_details']['selected_staff_member_id'] = $bookingpress_staff_member_id;
					}
					
					$_POST['appointment_data_obj']['bookingpress_selected_bring_members'] = $bookingpress_selected_extra_members;

					$prevent_booking = $BookingPress->bookingpress_is_appointment_booked( $appointment_sid, $appointment_date, $appointment_stime, $appointment_etime, 0, true, $posted_data );

					if( !empty( $prevent_booking ) && !empty( $prevent_booking['prevent_validation_process'] ) && true == $prevent_booking['prevent_validation_process'] ){
						
						$payer_email = ! empty($payment_gateway_data['payer_email']) ? $payment_gateway_data['payer_email'] : '';
						
						$appointment_prevent_reason = $prevent_booking['response'];
						
						$bookingpress_double_booking_prevent_reasone = array(
							'bookingpress_entry_id' => $entry_id,
							'bookingpress_double_booking_reason' => wp_json_encode( $appointment_prevent_reason ),
							'bookingpress_payment_gateway' => $bookingpress_payment_gateway,
							'bookingpress_payer_email' => $payer_email,
							'bookingpress_transaction_id' => $transaction_id,
							'bookingpress_payment_date_time' => current_time('mysql'),
							'bookingpress_payment_status'  => $payment_status,
							'bookingpress_payment_amount'  => $payable_amount,
							'bookingpress_payment_currency' => $bookingpress_service_currency,
							'bookingpress_payment_type'    => '',
							'bookingpress_payment_response' => '',
							'bookingpress_additional_info' => wp_json_encode( $payment_gateway_data ),
							'bookingpress_request_raw_data' => wp_json_encode( $_REQUEST ),
						);
						
						$wpdb->insert( $tbl_bookingpress_double_bookings, $bookingpress_double_booking_prevent_reasone );
						$duplicate_event_id = $wpdb->insert_id;

						/** start refund process */

						/** Preparing variable to store refund related data into the double booking table */
						$double_booking_update_db_data = array(
							'bookingpress_refund_reason' => 'Crossed or Duplicate booking occurred with appointment data: ' . wp_json_encode( $appointment_prevent_reason )
						);
						/** Check if the payment gateway supports the refund */
						$bpa_payment_gateway_data = $bookingpress_pro_global_options->bookingpress_allowed_refund_payment_gateway_list();

						$bookingpress_refund_response_data['variant'] = 'error';
						$bookingpress_refund_response_data['title'] = esc_html__('Error', 'bookingpress-appointment-booking');
						$bookingpress_refund_response_data['msg'] = esc_html__('Something went wrong while processing the double booking refund', 'bookingpress-appointment-booking');

						$is_refund_supported = 0;
						$is_refund_processed = 0;

						$payment_currency = $BookingPress->bookingpress_get_settings('payment_default_currency','payment_setting');

						if( !empty( $bpa_payment_gateway_data[ $bookingpress_payment_gateway ] ) && 1 == $bpa_payment_gateway_data[ $bookingpress_payment_gateway ]['is_refund_support'] ){

							$double_booking_update_db_data['bookingpress_is_refund_supported'] = 1;

							$is_refund_supported = 1;
							
							$bookingpress_send_refund_data = array(
								'bookingpress_transaction_id' => $transaction_id,
								'refund_type' => 'full', //passing parameter of refund type to full
								'refund_reason' => 'Crossed or Duplicate booking occurred with another appointment',
								'refund_amount' => $payable_amount,
								'default_refund_amount' => $payable_amount,
								'bookingpress_payment_currency' => $payment_currency
							);
							
							if( 'stripe' == $bookingpress_payment_gateway ){
								$bookingpress_send_refund_data['reason'] = 'duplicate';
							}

							$bookingpress_refund_response_data = apply_filters('bookingpress_'.$bookingpress_payment_gateway.'_apply_refund',$bookingpress_refund_response_data,$bookingpress_send_refund_data);	

							$double_booking_update_db_data['bookingpress_refund_response'] = wp_json_encode( $bookingpress_refund_response_data );

							if(!empty($bookingpress_refund_response_data['variant']) && $bookingpress_refund_response_data['variant'] == 'success' ) {
								/** If refund successfully processed */
								$is_refund_processed = 1;
								$bookingpress_refund_response_data['msg']   = esc_html__( 'Refund successfully initiated', 'bookingpress-appointment-booking' );
								$double_booking_update_db_data['bookingpress_is_refunded'] = 1;
								//$this->bookingpress_after_refund_success($bookingpress_refund_response_data,$bookingpress_refund_data,$appointment_data,$refund_intiate_from );
							} else {
								/** if refund not processed and error occurred */
								$double_booking_update_db_data['bookingpress_is_refunded'] = 0;
							}

						} else {
							/** Refund is not supported by the payment gateway */
							$bookingpress_refund_response_data['bookingpress_refund_response'] = 'Refund is not supported by payment gateway ' . $bookingpress_payment_gateway;
							$double_booking_update_db_data['bookingpress_is_refund_supported'] = 0;
							$double_booking_update_db_data['bookingpress_refund_response'] = $bookingpress_refund_response_data;
							$double_booking_update_db_data['bookingpress_is_refunded'] = 0;
						}

						$wpdb->update(
							$tbl_bookingpress_double_bookings,
							$double_booking_update_db_data,
							array(
								'bookingpress_double_booking_id' => $duplicate_event_id
							)
						);

						/** sending email code to customer for refund related start */

						$date_format = $BookingPress->bookingpress_get_settings( 'default_date_format', 'general_setting');
						$time_format = $BookingPress->bookingpress_get_settings( 'default_time_format', 'general_setting');

						
                        $payment_currency = $BookingPress->bookingpress_get_currency_symbol( $payment_currency );

						$customer_email_subject = __('Appointment Cancellation Notification', 'bookingpress-appointment-booking');
						$customer_email_message = __("Dear %customer_first_name% %customer_last_name%,<br/><br/>This is regarding your recent payment and appointment scheduling with the below details which is not successfully booked, despite your payment being processed due to unforeseen technical glitches.<br/><br/>%service_name% - %appointment_date_time% - %appointment_amount%<br/><br/>We will process the refund for the full amount of your payment and it will be credited back to your account within the next 4-7 business days. We truly regret any inconvenience this may have caused you and understand the importance of having a smooth and hassle-free experience with our services.<br/><br/>Best regards,<br/>%company_name%<br/>%company_address%<br/>%company_phone%<br/>%company_website%", 'bookingpress-appointment-booking'); //phpcs:ignore

						$customer_email_message = str_replace( '%customer_first_name%', $bookingpress_customer_firstname, $customer_email_message );
						$customer_email_message = str_replace( '%customer_last_name%', $bookingpress_customer_lastname, $customer_email_message );
						
						$customer_email_message = str_replace( '%service_name%', $bookingpress_service_name, $customer_email_message );

						$customer_appointment_date = date( $date_format, strtotime( $bookingpress_appointment_date ) );
						
						$customer_appointment_time = date( $time_format, strtotime( $bookingpress_appointment_time ) );
						$customer_appointment_end_time = date( $time_format, strtotime( $bookingpress_appointment_end_time ) );

						$customer_email_message = str_replace( '%appointment_date_time%', $customer_appointment_date.' ' . $customer_appointment_time . ' to ' . $customer_appointment_end_time, $customer_email_message );
						$customer_email_message = str_replace( '%appointment_amount%', $bookingpress_paid_amount . ' ' . $payment_currency, $customer_email_message );

						$company_name = $BookingPress->bookingpress_get_settings('company_name', 'company_setting');
						$company_address = $BookingPress->bookingpress_get_settings('company_address', 'company_setting');
						$company_phone = $BookingPress->bookingpress_get_settings('company_phone', 'company_setting');
						$company_website = $BookingPress->bookingpress_get_settings('company_website', 'company_setting');

						$customer_email_message = str_replace( '%company_name%', $company_name, $customer_email_message );
						$customer_email_message = str_replace( '%company_address%', $company_address, $customer_email_message );
						$customer_email_message = str_replace( '%company_phone%', $company_phone, $customer_email_message );
						$customer_email_message = str_replace( '%company_website%', $company_website, $customer_email_message );

						$from_name = $BookingPress->bookingpress_get_settings('sender_name', 'notification_setting');
						$from_email = $BookingPress->bookingpress_get_settings('sender_email', 'notification_setting');

						$reply_to_name = $BookingPress->bookingpress_get_settings('sender_name', 'notification_setting');
						$reply_to = $BookingPress->bookingpress_get_settings('sender_email', 'notification_setting');

						$bookingpress_email_notifications->bookingpress_send_custom_email_notifications( $bookingpress_customer_email, stripslashes_deep( $customer_email_subject ), stripslashes_deep( $customer_email_message ), stripslashes_deep( $from_name ), $from_email, $reply_to, stripslashes_deep( $reply_to_name ) );

						/** sending email code to customer for refund related end */


						/** sending email code to admin/staffmember for refund related start */

						$admin_email_subject = __('Appointment cancelled due to conflict', 'bookingpress-appointment-booking');
						if( 1 == $is_refund_processed ){
							$admin_email_content = __('Dear Administrator,<br/>One of the recently booked appointment has conflict with another appointment with booking ID - %bookingpress_appointment_id% on our booking platform. So, the system has automatically initiated a refund for the payment of %appointment_amount% to avoid any double bookings.<br/><br/>Below are the appointment and payment details for your reference:<br/>Appointment Date: %appointment_date%<br/>Appointment Time: %appointment_time%<br/>Payment ID: %transaction_id%<br/>Payment Amount: %appointment_amount%<br/>Payment Gateway:%bookingpress_payment_gateway%<br/>First name & Last name: %customer_first_name% %customer_last_name%,<br/>Customer Full Name: %customer_full_name%<br/>Customer Email: %customer_email%<br/>Customer Phone: %customer_phone%<br/><br/>Best regards,<br/>%company_name%<br/>%company_address%<br/>%company_phone%<br/>%company_website%', "bookingpress-appointment-booking"); //phpcs:ignore
						} else {
							$admin_email_content = __('Dear Administrator,<br/>One of the recently booked appointment has conflict with another appointment with booking ID - %bookingpress_appointment_id% on our booking platform. So, an immediate action is required to handle the refund process for their payment.<br/><br/>Below are the appointment and payment details for your reference:<br/>Appointment Date: %appointment_date%<br/>Appointment Time: %appointment_time%<br/>Payment ID: %transaction_id%<br/>Payment Amount: %appointment_amount%<br/>Payment Gateway:%bookingpress_payment_gateway%<br/>First name & Last name: %customer_first_name% %customer_last_name%,<br/>Customer Full Name: %customer_full_name%<br/>Customer Email: %customer_email%<br/>Customer Phone: %customer_phone%<br/><br/>Best regards,<br/>%company_name%<br/>%company_address%<br/>%company_phone%<br/>%company_website%', "bookingpress-appointment-booking"); //phpcs:ignore
						}

						$admin_email_content = str_replace( '%customer_first_name%', $bookingpress_customer_firstname, $admin_email_content );
						$admin_email_content = str_replace( '%customer_last_name%', $bookingpress_customer_lastname, $admin_email_content );

						$admin_email_content = str_replace( '%customer_full_name%', $bookingpress_customer_firstname . ' ' . $bookingpress_customer_lastname, $admin_email_content  );
						$admin_email_content = str_replace( '%customer_email%', $bookingpress_customer_email, $admin_email_content );
						$admin_email_content = str_replace( '%customer_phone%', $bookingpress_customer_phone, $admin_email_content );
						
						$admin_email_content = str_replace( '%service_name%', $bookingpress_service_name, $admin_email_content );

						$bkp_appointment_date = date( $date_format, strtotime( $bookingpress_appointment_date ) );
						$bkp_appointment_time = date( $time_format, strtotime( $bookingpress_appointment_time ) );
						$bkp_appointment_end_time = date( $time_format, strtotime( $bookingpress_appointment_end_time ) );

						$admin_email_content = str_replace( '%appointment_date_time%', $bkp_appointment_date.' '. $bkp_appointment_time . ' to ' .$bkp_appointment_end_time, $admin_email_content );
						$admin_email_content = str_replace( '%appointment_date%', $bkp_appointment_date, $admin_email_content );
						$admin_email_content = str_replace( '%appointment_time%', $bkp_appointment_time . ' to ' . $bkp_appointment_end_time, $admin_email_content );
						$admin_email_content = str_replace( '%appointment_amount%', $bookingpress_paid_amount . ' ' . $payment_currency, $admin_email_content );

						$company_name = $BookingPress->bookingpress_get_settings('company_name', 'company_setting');
						$company_address = $BookingPress->bookingpress_get_settings('company_address', 'company_setting');
						$company_phone = $BookingPress->bookingpress_get_settings('company_phone', 'company_setting');
						$company_website = $BookingPress->bookingpress_get_settings('company_website', 'company_setting');

						$admin_email_content = str_replace( '%company_name%', $company_name, $admin_email_content );
						$admin_email_content = str_replace( '%company_address%', $company_address, $admin_email_content );
						$admin_email_content = str_replace( '%company_phone%', $company_phone, $admin_email_content );
						$admin_email_content = str_replace( '%company_website%', $company_website, $admin_email_content );

						$conflicted_appointment = $appointment_prevent_reason['data'];

						$conflicted_appointment_booking_id = $conflicted_appointment['bookingpress_booking_id'];
						$conflicted_appointment_date = date( $date_format, strtotime( $conflicted_appointment['bookingpress_appointment_date'] ) );
						$conflicted_appointment_time = date( $time_format, strtotime( $conflicted_appointment['bookingpress_appointment_time'] ) ) . '-' . date( $time_format, strtotime( $conflicted_appointment['bookingpress_appointment_end_time'] ) );
						$conflicted_appointment_service = $conflicted_appointment['bookingpress_service_name'];

						$admin_email_content = str_replace( '%bookingpress_appointment_id%', '#'.$conflicted_appointment_booking_id, $admin_email_content );
						$admin_email_content = str_replace( '%conflicted_appointment_service%', $conflicted_appointment_service, $admin_email_content );
						$admin_email_content = str_replace( '%conflicted_appointment_date%', $conflicted_appointment_date, $admin_email_content );
						$admin_email_content = str_replace( '%conflicted_appointment_time%', $conflicted_appointment_time, $admin_email_content );

						$admin_email_content = str_replace( '%bookingpress_payment_gateway%', $bookingpress_payment_gateway, $admin_email_content );
						$admin_email_content = str_replace( '%transaction_id%', $transaction_id, $admin_email_content );

						$bookingpress_admin_email = $BookingPress->bookingpress_get_settings('admin_email', 'notification_setting');

						$from_name = $BookingPress->bookingpress_get_settings('sender_name', 'notification_setting');
						$from_email = $BookingPress->bookingpress_get_settings('sender_email', 'notification_setting');

						$reply_to_name = $BookingPress->bookingpress_get_settings('sender_name', 'notification_setting');
						$reply_to = $BookingPress->bookingpress_get_settings('sender_email', 'notification_setting');

						$bookingpress_email_notifications->bookingpress_send_custom_email_notifications( $bookingpress_admin_email, stripslashes_deep( $admin_email_subject ), stripslashes_deep( $admin_email_content ), stripslashes_deep( $from_name ), $from_email, $reply_to, stripslashes_deep( $reply_to_name ) );


						/** sending email code to admin/staffmember for refund related end */

						/** end refund process */


						status_header( 409, $appointment_prevent_reason['message'] );
						do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'prevent duplicate appointment', 'bookingpress', $duplicate_event_id, $bookingpress_debug_payment_log_id);
						die;
					}

                    /** Validate again before confirming the payment end */

					do_action( 'bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'before insert appointment', 'bookingpress pro', $appointment_booking_fields, $bookingpress_debug_payment_log_id );

					$inserted_booking_id = $BookingPress->bookingpress_insert_appointment_logs( $appointment_booking_fields );
				
					//Update appointment id in appointment_meta table
					$wpdb->update( $tbl_bookingpress_appointment_meta, array('bookingpress_appointment_id' => $inserted_booking_id), array('bookingpress_entry_id' => $entry_id) );

					// Update coupon usage counter if coupon code use
					if ( ! empty( $bookingpress_coupon_details ) ) {
						$bookingpress_coupon_data = json_decode( $bookingpress_coupon_details, true );
						if ( ! empty( $bookingpress_coupon_data ) && is_array( $bookingpress_coupon_data ) ) {
							$coupon_id = $bookingpress_coupon_data['coupon_data']['bookingpress_coupon_id'];
							$bookingpress_coupons->bookingpress_update_coupon_usage_counter( $coupon_id );
						}
					}

					if ( ! empty( $inserted_booking_id ) ) {
						$service_time_details = $BookingPress->bookingpress_get_service_end_time( $bookingpress_service_id, $bookingpress_appointment_time, $bookingpress_service_duration_val, $bookingpress_service_duration_unit );						
						$service_start_time   = $service_time_details['service_start_time'];
						$service_end_time     = $service_time_details['service_end_time'];

						$payer_email = ! empty( $payment_gateway_data['payer_email'] ) ? $payment_gateway_data['payer_email'] : $bookingpress_customer_email;

						//$bookingpress_last_invoice_id = $BookingPress->bookingpress_get_settings( 'bookingpress_last_invoice_id', 'invoice_setting' );
						global $tbl_bookingpress_settings;
						$bookingpress_last_invoice_id = $wpdb->get_var( $wpdb->prepare("SELECT setting_value FROM $tbl_bookingpress_settings WHERE setting_name = %s AND setting_type = %s", 'bookingpress_last_invoice_id', 'invoice_setting' ) ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_settings is a table name. false alarm

						$bookingpress_last_invoice_id++;
						
						$BookingPress->bookingpress_update_settings( 'bookingpress_last_invoice_id', 'invoice_setting', $bookingpress_last_invoice_id );

						$bookingpress_last_invoice_id = apply_filters('bookingpress_modify_invoice_id_externally', $bookingpress_last_invoice_id);

						if($bookingpress_payment_gateway == "on-site"){
							$payment_status =  2;
						}

						$payment_log_data = array(
							'bookingpress_invoice_id'              => $bookingpress_last_invoice_id,
							'bookingpress_appointment_booking_ref' => $inserted_booking_id,
							'bookingpress_customer_id'             => $bookingpress_customer_id,
							'bookingpress_customer_name'           => $bookingpress_customer_name,  
							'bookingpress_username'                => $bookingpress_customer_username,
							'bookingpress_customer_firstname'      => $bookingpress_customer_firstname,
							'bookingpress_customer_lastname'       => $bookingpress_customer_lastname,
							'bookingpress_customer_phone'          => $bookingpress_customer_phone,
							'bookingpress_customer_country'        => $bookingpress_customer_country,
							'bookingpress_customer_phone_dial_code' => $bookingpress_customer_phone_dial_code,
							'bookingpress_customer_email'          => $bookingpress_customer_email,
							'bookingpress_service_id'              => $bookingpress_service_id,
							'bookingpress_service_name'            => $bookingpress_service_name,
							'bookingpress_service_price'           => $bookingpress_service_price,
							'bookingpress_payment_currency'        => $bookingpress_service_currency,
							'bookingpress_service_duration_val'    => $bookingpress_service_duration_val,
							'bookingpress_service_duration_unit'   => $bookingpress_service_duration_unit,
							'bookingpress_appointment_date'        => $bookingpress_appointment_date,
							'bookingpress_appointment_start_time'  => $bookingpress_appointment_time,
							'bookingpress_appointment_end_time'    => $bookingpress_appointment_end_time,
							'bookingpress_payment_gateway'         => $bookingpress_payment_gateway,
							'bookingpress_payer_email'             => $payer_email,
							'bookingpress_transaction_id'          => $transaction_id,
							'bookingpress_payment_date_time'       => current_time( 'mysql' ),
							'bookingpress_payment_status'          => $payment_status,
							'bookingpress_payment_amount'          => $payable_amount,
							'bookingpress_payment_currency'        => $bookingpress_service_currency,
							'bookingpress_payment_type'            => '',
							'bookingpress_payment_response'        => '',
							'bookingpress_additional_info'         => '',
							'bookingpress_coupon_details'          => $bookingpress_coupon_details,
							'bookingpress_coupon_discount_amount'  => $bookingpress_coupon_discounted_amount,
							'bookingpress_tax_percentage'          => $bookingpress_tax_percentage,
							'bookingpress_tax_amount'              => $bookingpress_tax_amount,
							'bookingpress_price_display_setting'   => $bookingpress_price_display_setting,
							'bookingpress_display_tax_order_summary' => $bookingpress_display_tax_order_summary,
							'bookingpress_included_tax_label'      => $bookingpress_included_tax_label,
							'bookingpress_deposit_payment_details' => $bookingpress_deposit_payment_details,
							'bookingpress_deposit_amount'          => $bookingpress_deposit_amount,
							'bookingpress_staff_member_id'         => $bookingpress_staff_member_id,
							'bookingpress_staff_member_price'      => $bookingpress_staff_member_price,
							'bookingpress_staff_first_name'        => $bookingpress_staff_first_name,
							'bookingpress_staff_last_name'         => $bookingpress_staff_last_name,
							'bookingpress_staff_email_address'     => $bookingpress_staff_email_address,
							'bookingpress_staff_member_details'    => $bookingpress_staff_member_details,
							'bookingpress_paid_amount'             => $bookingpress_paid_amount,
							'bookingpress_due_amount'              => $bookingpress_due_amount,
							'bookingpress_total_amount'            => $bookingpress_total_amount,
							'bookingpress_created_at'              => current_time( 'mysql' ),
						);

						/* Condition add if payment done with deposit then payment status consider as '4' */
						/* Please make sure that only deposit has been payed. Skip this if the 100% deposit has been paid */
						//----------------------------------------------
						$bookingpress_deposit_payment_details = !empty( $bookingpress_deposit_payment_details ) ? json_decode($bookingpress_deposit_payment_details, TRUE) : array();
						if(!empty($bookingpress_deposit_payment_details) && 0 < $bookingpress_due_amount ){
							$payment_log_data['bookingpress_payment_status'] = 4;
							$payment_log_data['bookingpress_mark_as_paid'] = 0;
						}
						//----------------------------------------------

						$payment_log_data = apply_filters( 'bookingpress_modify_payment_log_fields_before_insert', $payment_log_data, $entry_data );

						do_action( 'bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'before insert payment', 'bookingpress pro', $payment_log_data, $bookingpress_debug_payment_log_id );

						$payment_log_id = $BookingPress->bookingpress_insert_payment_logs( $payment_log_data );
						if(!empty($payment_log_id)){
                            $wpdb->update($tbl_bookingpress_appointment_bookings, array('bookingpress_payment_id' => $payment_log_id), array('bookingpress_appointment_booking_id' => $inserted_booking_id));
							$wpdb->update($tbl_bookingpress_appointment_bookings, array('bookingpress_booking_id' => $bookingpress_last_invoice_id), array('bookingpress_appointment_booking_id' => $inserted_booking_id));
                        }

						$bookingpress_email_notification_type = '';
						if ( $bookingpress_appointment_status == '2' ) {
							$bookingpress_email_notification_type = 'Appointment Pending';
						} elseif ( $bookingpress_appointment_status == '1' ) {
							$bookingpress_email_notification_type = 'Appointment Approved';
						} elseif ( $bookingpress_appointment_status == '3' ) {
							$bookingpress_email_notification_type = 'Appointment Canceled';
						} elseif ( $bookingpress_appointment_status == '4' ) {
							$bookingpress_email_notification_type = 'Appointment Rejected';
						}

						do_action('bookingpress_after_add_appointment_from_backend', $inserted_booking_id, array(), $entry_id);

						$bookingpress_email_notification_type = apply_filters('bookingpress_modify_send_email_notification_type',$bookingpress_email_notification_type,$bookingpress_appointment_status);
						do_action( 'bookingpress_after_book_appointment', $inserted_booking_id, $entry_id, $payment_gateway_data );
						if($bookingpress_is_customer_create == 1 && !empty($bookingpress_customer_id)) {
							do_action( 'bookingpress_after_create_new_customer',$bookingpress_customer_id);
						}
						$bookingpress_email_notifications->bookingpress_send_after_payment_log_entry_email_notification( $bookingpress_email_notification_type, $inserted_booking_id, $bookingpress_customer_email );
						return $payment_log_id;
					}
				}
			}else if(!empty($entry_id) && !empty($is_cart_order) ){
				$entry_data = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$tbl_bookingpress_entries} WHERE bookingpress_order_id = %d", $entry_id ), ARRAY_A ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_entries is a table name. false alarm

				if ( ! empty( $entry_data ) ) {
					$bookingpress_inserted_appointment_ids = array();
					$total_entry_data = count( $entry_data );
					$prevented_entry_data = 0;
					$bookingpress_customer_id = $bookingpress_wpuser_id = $bookingpress_is_customer_create = 0;
					foreach($entry_data as $k => $v){
						$bookingpress_entry_id                       = $v['bookingpress_entry_id'];
						$bookingpress_order_id                       = $v['bookingpress_order_id'];
						$bookingpress_entry_user_id                  = $v['bookingpress_customer_id'];
						$bookingpress_customer_name                  = $v['bookingpress_customer_name'];
						$bookingpress_customer_phone                 = $v['bookingpress_customer_phone'];
						$bookingpress_customer_firstname             = $v['bookingpress_customer_firstname'];
						$bookingpress_customer_lastname              = $v['bookingpress_customer_lastname'];
						$bookingpress_customer_country               = $v['bookingpress_customer_country'];
						$bookingpress_customer_phone_dial_code       = $v['bookingpress_customer_phone_dial_code'];
						$bookingpress_customer_email                 = $v['bookingpress_customer_email'];
						$bookingpress_customer_timezone              = $v['bookingpress_customer_timezone'];
						$bookingpress_dst_timezone				     = $v['bookingpress_dst_timezone'];
						$bookingpress_service_id                     = $v['bookingpress_service_id'];
						$bookingpress_service_name                   = $v['bookingpress_service_name'];
						$bookingpress_service_price                  = $v['bookingpress_service_price'];
						$bookingpress_service_currency               = $v['bookingpress_service_currency'];
						$bookingpress_service_duration_val           = $v['bookingpress_service_duration_val'];
						$bookingpress_service_duration_unit          = $v['bookingpress_service_duration_unit'];
						$bookingpress_payment_gateway                = $v['bookingpress_payment_gateway'];
						$bookingpress_appointment_date               = $v['bookingpress_appointment_date'];
						$bookingpress_appointment_time               = $v['bookingpress_appointment_time'];
						$bookingpress_appointment_end_time           = $v['bookingpress_appointment_end_time'];
						$bookingpress_appointment_internal_note      = $v['bookingpress_appointment_internal_note'];
						$bookingpress_appointment_send_notifications = $v['bookingpress_appointment_send_notifications'];
						$bookingpress_appointment_status             = $v['bookingpress_appointment_status'];
						$bookingpress_coupon_details                 = $v['bookingpress_coupon_details'];
						$bookingpress_coupon_discounted_amount       = $v['bookingpress_coupon_discount_amount'];
						$bookingpress_deposit_payment_details        = $v['bookingpress_deposit_payment_details'];
						$bookingpress_deposit_amount                 = $v['bookingpress_deposit_amount'];
						$bookingpress_selected_extra_members         = $v['bookingpress_selected_extra_members'];
						$bookingpress_extra_service_details          = $v['bookingpress_extra_service_details'];
						$bookingpress_staff_member_id                = $v['bookingpress_staff_member_id'];
						$bookingpress_staff_member_price             = $v['bookingpress_staff_member_price'];
						$bookingpress_staff_first_name               = $v['bookingpress_staff_first_name'];
						$bookingpress_staff_last_name                = $v['bookingpress_staff_last_name'];
						$bookingpress_staff_email_address            = $v['bookingpress_staff_email_address'];
						$bookingpress_staff_member_details           = $v['bookingpress_staff_member_details'];
						$bookingpress_paid_amount                    = $v['bookingpress_paid_amount'];
						$bookingpress_due_amount                     = $v['bookingpress_due_amount'];
						$bookingpress_total_amount                   = $v['bookingpress_total_amount'];
						$bookingpress_tax_percentage                 = $v['bookingpress_tax_percentage'];
						$bookingpress_tax_amount                     = $v['bookingpress_tax_amount'];
						$bookingpress_price_display_setting          = $v['bookingpress_price_display_setting'];
						$bookingpress_display_tax_order_summary      = $v['bookingpress_display_tax_order_summary'];
						$bookingpress_included_tax_label             = $v['bookingpress_included_tax_label'];

						$payable_amount = ( ! empty( $payment_amount_field ) && ! empty( $payment_gateway_data[ $payment_amount_field ] ) ) ? $payment_gateway_data[ $payment_amount_field ] : $bookingpress_paid_amount;

						/** Check for the paid amount and the received amount */
						if( !empty( $payment_gateway_data ) && 'woocommerce' != $bookingpress_payment_gateway ){

							if( 'stripe' == strtolower( trim( $bookingpress_payment_gateway ) ) && empty( $payment_amount_field  ) ){
								$payment_amount_field = 'amount';
							} else if( 'paypal' == strtolower( trim( $bookingpress_payment_gateway ) ) && empty( $payment_amount_field ) ){
								$payment_amount_field = 'mc_gross';
							}

							if( !empty( $payment_amount_field ) && !preg_match( '/\|/', $payment_amount_field ) ){	
								$paid_amount = !empty( $payment_gateway_data[ $payment_amount_field ] ) ? $payment_gateway_data[ $payment_amount_field ] : 0;
							} else {
								$paid_amount = apply_filters( 'bookingpress_retrieve_payment_amount_currency_from_payment_data', 0, $payment_gateway_data, $bookingpress_payment_gateway, false );
							}
							$paid_amount = apply_filters( 'bookingpress_adjust_paid_amount', $paid_amount, strtolower( $bookingpress_payment_gateway ) );

							if( floatval( $bookingpress_paid_amount ) != floatval( $paid_amount ) ){

								$suspicious_data = wp_json_encode(
									array(
										'paid_amount_entries' => $bookingpress_paid_amount,
										'paid_amount_payment' => $paid_amount
									)
								);

								status_header( 400, 'Amount Mismatched' );
								http_response_code( 400 );
								do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'prevent suspicious payment due to amount mismatched', 'bookingpress', $suspicious_data, $bookingpress_debug_payment_log_id);
								die;
							}

							/** Check for the currency received from the payment gateway data*/
							if( !empty( $payment_currency_field ) && !empty( $payment_gateway_data[ $payment_currency_field ] ) && !preg_match( '/\|/', $payment_currency_field ) ){

								if( strtolower( trim( $payment_gateway_data[ $payment_currency_field ] ) ) != strtolower( trim( $bookingpress_service_currency ) ) ){
									$suspicious_data = wp_json_encode(
										array(
											'service_currency' => $bookingpress_service_currency,
											'paid_in_currency' => $payment_gateway_data[ $payment_currency_field ]
										)
									);
		
									status_header( 400, 'currency Mismatched' );
									http_response_code( 400 );
									do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'prevent suspicious payment due to currency mismatched', 'bookingpress', $suspicious_data, $bookingpress_debug_payment_log_id);
									die;
								}

							} else {
								
								$payment_currency = apply_filters('bookingpress_retrieve_payment_amount_currency_from_payment_data', '', $payment_gateway_data, $bookingpress_payment_gateway, true );

								if( !empty( $payment_currency ) && strtolower( trim( $payment_currency ) ) != strtolower( trim( $bookingpress_service_currency ) ) ){
									$suspicious_data = wp_json_encode(
										array(
											'service_currency' => $bookingpress_service_currency,
											'paid_in_currency' => $payment_currency
										)
									);
		
									status_header( 400, 'currency Mismatched' );
									http_response_code( 400 );
									do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'prevent suspicious payment due to currency mismatched', 'bookingpress', $suspicious_data, $bookingpress_debug_payment_log_id);
									die;
								}
							}
						}
						/** Check for the paid amount and the received amount */

						/** Check if the entry already exists in the double booking table */
						$double_book_entry_id = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(bookingpress_double_booking_id) FROM $tbl_bookingpress_double_bookings WHERE bookingpress_entry_id = %d", $v['bookingpress_entry_id'] ) ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_double_bookings is table name defined globally. False Positive alarm 

						if( 0 < $double_book_entry_id ){
							//status_header( 409 );
							do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'duplicate appointment data already exists in double booking table', 'bookingpress', $v['bookingpress_entry_id'], $bookingpress_debug_payment_log_id);
							continue;
						}
						
						$appointment_sid = $v['bookingpress_service_id'];
						$appointment_date = $v['bookingpress_appointment_date'];
						$appointment_stime = $v['bookingpress_appointment_time'];
						$appointment_etime = $v['bookingpress_appointment_end_time'];

						$posted_data = array();

						$posted_data['appointment_data']['selected_service_duration'] = $bookingpress_service_duration_val;
						$posted_data['appointment_data']['selected_service_duration_unit'] = $bookingpress_service_duration_unit;

						if( !empty( $bookingpress_staff_member_id ) ){
							$_POST['bookingpress_selected_staffmember']['selected_staff_member_id'] = $bookingpress_staff_member_id;
							$posted_data['appointment_data']['bookingpress_selected_staff_member_details']['selected_staff_member_id'] = $bookingpress_staff_member_id;
						}
						
						$_POST['appointment_data_obj']['bookingpress_selected_bring_members'] = $bookingpress_selected_extra_members;

						$prevent_booking = $BookingPress->bookingpress_is_appointment_booked( $appointment_sid, $appointment_date, $appointment_stime, $appointment_etime, 0, true, $posted_data );

						if( !empty( $prevent_booking ) && true == $prevent_booking['prevent_validation_process'] ){
							
							$payer_email = ! empty($payment_gateway_data['payer_email']) ? $payment_gateway_data['payer_email'] : '';
							
							$appointment_prevent_reason = $prevent_booking['response'];

							$bookingpress_double_booking_prevent_reasone = array(
								'bookingpress_entry_id' => $v['bookingpress_entry_id'],
								'bookingpress_double_booking_reason' => wp_json_encode( $appointment_prevent_reason ),
								'bookingpress_payment_gateway' => $bookingpress_payment_gateway,
								'bookingpress_payer_email' => $payer_email,
								'bookingpress_transaction_id' => $transaction_id,
								'bookingpress_payment_date_time' => current_time('mysql'),
								'bookingpress_payment_status'  => $payment_status,
								'bookingpress_payment_amount'  => $payable_amount,
								'bookingpress_payment_currency' => $bookingpress_service_currency,
								'bookingpress_payment_type'    => '',
								'bookingpress_payment_response' => '',
								'bookingpress_additional_info' => wp_json_encode( $payment_gateway_data ),
								'bookingpress_request_raw_data' => wp_json_encode( $_REQUEST ),
							);
							
							$wpdb->insert( $tbl_bookingpress_double_bookings, $bookingpress_double_booking_prevent_reasone );
							$duplicate_event_id = $wpdb->insert_id;

							//status_header( 409, $appointment_prevent_reason['message'] );
							$prevented_entry_data++;
							do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'prevent duplicate appointment', 'bookingpress', $duplicate_event_id, $bookingpress_debug_payment_log_id);
							continue;
						}

						/** Validate again before confirming the payment end */

						$bookingpress_customer_details = $bookingpress_customers->bookingpress_create_customer( $v, $bookingpress_entry_user_id, $is_front, 0, $bookingpress_customer_timezone );
						if ( ! empty( $bookingpress_customer_details ) ) {
							$bookingpress_customer_id = $bookingpress_customer_details['bookingpress_customer_id'];
							$bookingpress_wpuser_id   = $bookingpress_customer_details['bookingpress_wpuser_id'];
							$bookingpress_is_customer_create = !empty($bookingpress_customer_details['bookingpress_is_customer_create']) ? $bookingpress_customer_details['bookingpress_is_customer_create'] : 0;
						}

						if ( ! empty( $_REQUEST['appointment_data']['form_fields'] ) && ! empty( $bookingpress_customer_id ) ) {
							$this->bookingpress_insert_customer_field_data( $bookingpress_customer_id, array_map( array( $BookingPress, 'appointment_sanatize_field'), $_REQUEST['appointment_data']['form_fields'] ) ); //phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason $_REQUEST['appointment_data']['form_fields'] has already been sanitized.
						}

						$appointment_booking_fields = array(
							'bookingpress_entry_id'                      => $bookingpress_entry_id,
							'bookingpress_order_id'                      => $bookingpress_order_id,
							'bookingpress_is_cart'                       => 1,
							'bookingpress_payment_id'                    => 0,
							'bookingpress_customer_id'                   => $bookingpress_customer_id,
							'bookingpress_customer_name'      			 => $bookingpress_customer_name, 
							'bookingpress_customer_firstname' 			 => $bookingpress_customer_firstname,
							'bookingpress_customer_lastname'  			 => $bookingpress_customer_lastname,
							'bookingpress_customer_phone'     			 => $bookingpress_customer_phone,
							'bookingpress_customer_country'   			 => $bookingpress_customer_country,
							'bookingpress_customer_phone_dial_code'      => $bookingpress_customer_phone_dial_code,
							'bookingpress_customer_email'     			 => $bookingpress_customer_email, 
							'bookingpress_service_id'                    => $bookingpress_service_id,
							'bookingpress_service_name'                  => $bookingpress_service_name,
							'bookingpress_service_price'                 => $bookingpress_service_price,
							'bookingpress_service_currency'              => $bookingpress_service_currency,
							'bookingpress_service_duration_val'          => $bookingpress_service_duration_val,
							'bookingpress_service_duration_unit'         => $bookingpress_service_duration_unit,
							'bookingpress_appointment_date'              => $bookingpress_appointment_date,
							'bookingpress_appointment_time'              => $bookingpress_appointment_time,
							'bookingpress_appointment_end_time'          => $bookingpress_appointment_end_time,
							'bookingpress_appointment_internal_note'     => $bookingpress_appointment_internal_note,
							'bookingpress_appointment_send_notification' => $bookingpress_appointment_send_notifications,
							'bookingpress_appointment_status'            => $bookingpress_appointment_status,
							'bookingpress_appointment_timezone'			 => $bookingpress_customer_timezone,
							'bookingpress_dst_timezone'				     => $bookingpress_dst_timezone,
							'bookingpress_coupon_details'                => $bookingpress_coupon_details,
							'bookingpress_coupon_discount_amount'        => $bookingpress_coupon_discounted_amount,
							'bookingpress_tax_percentage'                => $bookingpress_tax_percentage,
							'bookingpress_tax_amount'                    => $bookingpress_tax_amount,
							'bookingpress_price_display_setting'         => $bookingpress_price_display_setting,
							'bookingpress_display_tax_order_summary'     => $bookingpress_display_tax_order_summary,
							'bookingpress_included_tax_label'            => $bookingpress_included_tax_label,
							'bookingpress_deposit_payment_details'       => $bookingpress_deposit_payment_details,
							'bookingpress_deposit_amount'                => $bookingpress_deposit_amount,
							'bookingpress_selected_extra_members'        => $bookingpress_selected_extra_members,
							'bookingpress_extra_service_details'         => $bookingpress_extra_service_details,
							'bookingpress_staff_member_id'               => $bookingpress_staff_member_id,
							'bookingpress_staff_member_price'            => $bookingpress_staff_member_price,
							'bookingpress_staff_first_name'               => $bookingpress_staff_first_name,
							'bookingpress_staff_last_name'                => $bookingpress_staff_last_name,
							'bookingpress_staff_email_address'           => $bookingpress_staff_email_address,
							'bookingpress_staff_member_details'          => $bookingpress_staff_member_details,
							'bookingpress_paid_amount'                   => $bookingpress_paid_amount,
							'bookingpress_due_amount'                    => $bookingpress_due_amount,
							'bookingpress_total_amount'                  => $bookingpress_total_amount,
							'bookingpress_created_at'         			 => current_time('mysql'),
						);

						$appointment_booking_fields = apply_filters( 'bookingpress_modify_appointment_booking_fields_before_insert', $appointment_booking_fields, $v );

						do_action( 'bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'before insert appointment', 'bookingpress pro', $appointment_booking_fields, $bookingpress_debug_payment_log_id );

						$inserted_booking_id = $BookingPress->bookingpress_insert_appointment_logs( $appointment_booking_fields );
						array_push($bookingpress_inserted_appointment_ids, $inserted_booking_id);

						//Update appointment id in appointment_meta table
						$wpdb->update( $tbl_bookingpress_appointment_meta, array('bookingpress_appointment_id' => $inserted_booking_id), array('bookingpress_entry_id' => $v['bookingpress_entry_id']) );
						
					}

					if( 0 < $prevented_entry_data && $total_entry_data == $prevented_entry_data ){
						status_header( 409, 'Cart Entry Prevented due to double booking data' );
						do_action('bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'prevent duplicate appointment', 'bookingpress', $entry_data, $bookingpress_debug_payment_log_id);
						die;
					}
					// Update coupon usage counter if coupon code use
					if ( ! empty( $bookingpress_coupon_details ) ) {
						$bookingpress_coupon_data = json_decode( $bookingpress_coupon_details, true );
						if ( ! empty( $bookingpress_coupon_data ) && is_array( $bookingpress_coupon_data ) ) {
							$coupon_id = !empty($bookingpress_coupon_data['coupon_data']['bookingpress_coupon_id']) ? $bookingpress_coupon_data['coupon_data']['bookingpress_coupon_id'] :'';
							$coupon_id =( $coupon_id == '' && !empty($bookingpress_coupon_data['bookingpress_coupon_id'])) ? $bookingpress_coupon_data['bookingpress_coupon_id'] : $coupon_id;
							if($coupon_id != '') {
								$bookingpress_coupons->bookingpress_update_coupon_usage_counter( $coupon_id );
							}
						}
					}

					if ( ! empty( $bookingpress_inserted_appointment_ids ) ) {
						$entry_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_entries} WHERE bookingpress_order_id = %d", $entry_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_entries is a table name. false alarm

						$bookingpress_cart_version = get_option( 'bookingpress_cart_module' );
												
						$bookingpress_multiple_appointment_payment_order_detail = apply_filters( 'bookingpress_multiple_appointment_payment_order_detail',false, $entry_details);

						if(($bookingpress_multiple_appointment_payment_order_detail) || (file_exists(WP_PLUGIN_DIR . '/bookingpress-cart/bookingpress-cart.php') && !empty($bookingpress_cart_version) && version_compare($bookingpress_cart_version,'1.6','>'))){
							$entry_total_data = $wpdb->get_row($wpdb->prepare("SELECT SUM(bookingpress_deposit_amount) as total_deposit, bookingpress_paid_amount as total_paid, SUM(bookingpress_due_amount) as total_due, bookingpress_total_amount as total_amt FROM {$tbl_bookingpress_entries} WHERE bookingpress_order_id = %d", $entry_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_entries is table name.

						} else {
							$entry_total_data = $wpdb->get_row($wpdb->prepare("SELECT SUM(bookingpress_deposit_amount) as total_deposit, SUM(bookingpress_paid_amount) as total_paid, SUM(bookingpress_due_amount) as total_due, SUM(bookingpress_total_amount) as total_amt FROM {$tbl_bookingpress_entries} WHERE bookingpress_order_id = %d", $entry_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_entries is table name.							

						}									

						$bookingpress_deposit_amount = !empty($entry_total_data['total_deposit']) ? $entry_total_data['total_deposit'] : 0;
						$bookingpress_paid_amount = !empty($entry_total_data['total_paid']) ? $entry_total_data['total_paid'] : 0;
						$bookingpress_due_amount = !empty($entry_total_data['total_due']) ? $entry_total_data['total_due'] : 0;
						$bookingpress_total_amount = !empty($entry_total_data['total_amt']) ? $entry_total_data['total_amt'] : 0;

						$payer_email = ! empty( $payment_gateway_data['payer_email'] ) ? $payment_gateway_data['payer_email'] : $bookingpress_customer_email;

						//$bookingpress_last_invoice_id = $BookingPress->bookingpress_get_settings( 'bookingpress_last_invoice_id', 'invoice_setting' );
						global $tbl_bookingpress_settings;
						$bookingpress_last_invoice_id = $wpdb->get_var( $wpdb->prepare("SELECT setting_value FROM $tbl_bookingpress_settings WHERE setting_name = %s AND setting_type = %s", 'bookingpress_last_invoice_id', 'invoice_setting' ) ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_settings is a table name. false alarm

						$bookingpress_last_invoice_id++;
						$BookingPress->bookingpress_update_settings( 'bookingpress_last_invoice_id', 'invoice_setting', $bookingpress_last_invoice_id );

						$bookingpress_last_invoice_id = apply_filters('bookingpress_modify_invoice_id_externally', $bookingpress_last_invoice_id);

						if($entry_details['bookingpress_payment_gateway'] == "on-site"){
							$payment_status =  2;
						}

						$payment_log_data = array(
							'bookingpress_order_id'                => $entry_id,
							'bookingpress_is_cart'                 => 1,
							'bookingpress_invoice_id'              => $bookingpress_last_invoice_id,
							'bookingpress_appointment_booking_ref' => 0,
							'bookingpress_customer_id'             => $bookingpress_customer_id,
							'bookingpress_customer_name'           => $entry_details['bookingpress_customer_name'],
							'bookingpress_customer_firstname'      => $entry_details['bookingpress_customer_firstname'],
							'bookingpress_customer_lastname'       => $entry_details['bookingpress_customer_lastname'],
							'bookingpress_customer_phone'          => $entry_details['bookingpress_customer_phone'],
							'bookingpress_customer_country'        => $entry_details['bookingpress_customer_country'],
							'bookingpress_customer_phone_dial_code' => $entry_details['bookingpress_customer_phone_dial_code'],
							'bookingpress_customer_email'          => $entry_details['bookingpress_customer_email'],
							'bookingpress_payment_currency'        => $entry_details['bookingpress_service_currency'],
							'bookingpress_payment_gateway'         => $entry_details['bookingpress_payment_gateway'],
							'bookingpress_payer_email'             => $payer_email,
							'bookingpress_transaction_id'          => $transaction_id,
							'bookingpress_payment_date_time'       => current_time( 'mysql' ),
							'bookingpress_payment_status'          => $payment_status,
							'bookingpress_payment_amount'          => $bookingpress_paid_amount,
							'bookingpress_payment_currency'        => $entry_details['bookingpress_service_currency'],
							'bookingpress_coupon_details'          => $entry_details['bookingpress_coupon_details'],
							'bookingpress_coupon_discount_amount'  => $entry_details['bookingpress_coupon_discount_amount'],
							'bookingpress_tax_percentage'          => $entry_details['bookingpress_tax_percentage'],
							'bookingpress_tax_amount'              => $entry_details['bookingpress_tax_amount'],
							'bookingpress_price_display_setting'     => $bookingpress_price_display_setting,
							'bookingpress_display_tax_order_summary' => $bookingpress_display_tax_order_summary,
							'bookingpress_included_tax_label'        => $bookingpress_included_tax_label,
							'bookingpress_deposit_amount'          => $bookingpress_deposit_amount,
							'bookingpress_paid_amount'             => $bookingpress_paid_amount,
							'bookingpress_due_amount'              => $bookingpress_due_amount,
							'bookingpress_total_amount'            => $bookingpress_total_amount,
							'bookingpress_created_at'              => current_time( 'mysql' ),
						);

						/* Condition add if payment done with deposit then payment status consider as '4' */
						//----------------------------------------------
						$bookingpress_deposit_payment_details = !empty( $entry_details['bookingpress_deposit_payment_details'] ) ? json_decode($entry_details['bookingpress_deposit_payment_details'], TRUE) : array() ;
						if(!empty($bookingpress_deposit_payment_details) && 0 < $bookingpress_due_amount ){
							$payment_log_data['bookingpress_payment_status'] = 4;
							$payment_log_data['bookingpress_mark_as_paid'] = 0;
						}
						//----------------------------------------------

						$payment_log_data = apply_filters( 'bookingpress_modify_payment_log_fields_before_insert', $payment_log_data, $v );

						do_action( 'bookingpress_payment_log_entry', $bookingpress_payment_gateway, 'before insert payment', 'bookingpress pro', $payment_log_data, $bookingpress_debug_payment_log_id );

						$payment_log_id = $BookingPress->bookingpress_insert_payment_logs( $payment_log_data );
						if(!empty($payment_log_id)){
							foreach($bookingpress_inserted_appointment_ids as $k2 => $v2){
								$wpdb->update($tbl_bookingpress_appointment_bookings, array('bookingpress_payment_id' => $payment_log_id), array('bookingpress_appointment_booking_id' => $v2));
								$wpdb->update($tbl_bookingpress_appointment_bookings, array('bookingpress_booking_id' => $bookingpress_last_invoice_id), array('bookingpress_appointment_booking_id' => $v2));
							}
						}

						$bookingpress_email_notification_type = '';
						if ( $bookingpress_appointment_status == '2' ) {
							$bookingpress_email_notification_type = 'Appointment Pending';
						} elseif ( $bookingpress_appointment_status == '1' ) {
							$bookingpress_email_notification_type = 'Appointment Approved';
						} elseif ( $bookingpress_appointment_status == '3' ) {
							$bookingpress_email_notification_type = 'Appointment Canceled';
						} elseif ( $bookingpress_appointment_status == '4' ) {
							$bookingpress_email_notification_type = 'Appointment Rejected';
						}
						$bookingpress_email_notification_type = apply_filters('bookingpress_modify_send_email_notification_type',$bookingpress_email_notification_type,$bookingpress_appointment_status);
						$bookingpress_send_only_first_appointment_notification = "";
						foreach($bookingpress_inserted_appointment_ids as $k2 => $v2){
							do_action( 'bookingpress_after_book_appointment', $v2, $entry_id, $payment_gateway_data );
							if(empty($bookingpress_send_only_first_appointment_notification)){
								$bookingpress_email_notifications->bookingpress_send_after_payment_log_entry_email_notification( $bookingpress_email_notification_type, $v2, $bookingpress_customer_email );
							}							
							$bookingpress_send_only_first_appointment_notification = apply_filters('bookingpress_send_only_first_appointment_notification','',$v2,$payment_log_data);
						}
						if($bookingpress_is_customer_create == 1 && !empty($bookingpress_customer_id)) {
							do_action( 'bookingpress_after_create_new_customer',$bookingpress_customer_id);
						}
						do_action('bookingpress_after_add_group_appointment',$entry_id);
					}
				}
			}

			return 0;
		}//Fin confirm method
        
  }//Fin class
  
   

}//Fin class Exists


/**
$bookingpress_entry_details = apply_filters( 'bookingpress_modify_entry_data_before_insert', $bookingpress_entry_details, $posted_data );

******************************* bookingpress_pre_booking_verify_details ****************
*/

if( ! class_exists('booking_mod_dni_helper') ){
    class booking_mod_dni_helper {
        public $customer_rewrite = [];
        private $error = '';
        public $ratata = " ratataaa ";
        
        public function __construct() {
            
            add_filter( 'bookingpress_modify_entry_data_before_insert', [$this, 'mod_bookingUser_before_entry_insert'], 10);
        }

        public function validate_customer( $bookingpress_appointment_data ){
            global $dni_key;
            $msg = $reason = '';
            $response = $existing_customer_data  = [];
            #$msg = $reason = " Prueba ";
            $dni_key = !empty($dni_key)? $dni_key : 'text_C6kufq';
            $dni_value = !empty($bookingpress_appointment_data['form_fields'][$dni_key])? sanitize_text_field($bookingpress_appointment_data['form_fields'][$dni_key]) : sanitize_text_field($bookingpress_appointment_data[$dni_key]);
            
            if( $dni_value ):
            $existing_customer_data = get_dni_customers( $dni_value, $dni_key, true, '=' );
            else:
            $msg = 'Error! Falta el campo requerido (DNI).';
            $reason = 'Usuario no ingreso el campo requerido (DNI).';
            $this->error = $reason;
            endif;
            
            if( !empty($existing_customer_data) ){
                $post_customer_email = !empty($bookingpress_appointment_data['form_fields']['customer_email']) ? $bookingpress_appointment_data['form_fields']['customer_email'] : $bookingpress_appointment_data['customer_email'];
                $post_customer_phone = !empty($bookingpress_appointment_data['form_fields']['customer_phone'] ) ? sanitize_text_field( $bookingpress_appointment_data['form_fields']['customer_phone'] ) : ( !empty($bookingpress_appointment_data['customer_phone']) ? sanitize_text_field($bookingpress_appointment_data['customer_phone'] ) : '' );
                $post_customer_phone_dial_code = !empty($bookingpress_appointment_data['form_fields']['customer_phone_dial_code'] ) ? sanitize_text_field( $bookingpress_appointment_data['form_fields']['customer_phone_dial_code'] ) : ( !empty($bookingpress_appointment_data['customer_phone_dial_code']) ? sanitize_text_field($bookingpress_appointment_data['customer_phone_dial_code'] ) : '' );
                $post_customer_phone = preg_replace('/\D/','', $post_customer_phone);
                $post_customer_phone_dial_code = preg_replace('/\D/','', $post_customer_phone_dial_code);
                $post_customer_phone =(strpos($post_customer_phone,$post_customer_phone_dial_code)===0? $post_customer_phone: ($post_customer_phone_dial_code.$post_customer_phone) );
                
                $existing_customer_data = reset( $existing_customer_data );
                                
                $exist_dni = $existing_customer_data['bookingpress_customersmeta_value'];
                
                //SOLO POR... ---- NO ES NECESARIO
                if($exist_dni == $dni_value){
                    
                    $db_customer_id     = $existing_customer_data['bookingpress_customer_id'];
                    $db_customer_email  = $existing_customer_data['bookingpress_user_email'];
                    $db_customer_phone  = $existing_customer_data['bookingpress_user_phone'];
                    
                    $db_customer_phone  = !empty($db_customer_phone)? ($existing_customer_data['bookingpress_user_country_dial_code'] . $db_customer_phone) : '';
                    $db_customer_phone  = preg_replace('/\D/','', $db_customer_phone);
                    
                    if( !empty($db_customer_email) ){
                        $this->error = ($db_customer_email != $post_customer_email)? (empty($post_customer_email)? 'Campo email vacio, previamente utilizaste un email y se vinculo a tu perfil. Porfavor ingresa el correspondiente.' :'El Email no coincide con el DNI ingresado.') : '';
                    }
                    if( !empty($db_customer_phone) && (!empty($this->error) || empty($db_customer_email)) ){
                        $this->error = ($db_customer_phone != $post_customer_phone)? (!empty($this->error)? 'Email y Telefono no coinciden con el DNI ingresado.':' El telefono no coincide con el DNI ingresado.') : '';
                        
                    }
                    
                    if( empty($this->error) ):
                        $this->$customer_rewrite['bookingpress_customer_id'] = $db_customer_id;
                        $this->$customer_rewrite['bookingpress_customer_email'] = $db_customer_email;
                        $this->$customer_rewrite['bookingpress_customer_phone'] = $existing_customer_data['bookingpress_user_phone'];
                        
                    else:
                        $reason = 'Datos de identificación del paciente no coinciden. ' . $this->error;
                        $msg =  'Error! ' . $this->error . ' Si el problema persiste contactenos via Whatsapp: +5493644640269';
                    endif;
                                        
                }
            }
            
            #if( !empty($bookingpress_appointment_data['form_fields']['obra_soc_seguros']) ) $bookingpress_appointment_data['form_fields']['obra_soc_seguros'] = mb_convert_encoding($bookingpress_appointment_data['form_fields']['obra_soc_seguros'], 'UTF-8');
            
            #$reason = $msg = $db_customer_phone . 'db ' . $db_customer_phone . ' x ' . (strpos($post_customer_phone,$post_customer_phone_dial_code)===0? $post_customer_phone: ($post_customer_phone_dial_code.$post_customer_phone) ) . ' - '.  $post_customer_phone_dial_code;
            
            #$reason = $msg = ' Whatsapp: +5493644640269';
            
            /**
             * is_add_html es utilizado por el script en la funcion (bk_mod_front_handle_response)
             * en el archivo vue_app_mod
             */
            
            if( !empty($reason) ){
                    $response['variant']       = 'error';
                    $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
                    $response['msg']           = $msg;
                    $response['is_redirect']   = 0;
                    $response['reason']        = $reason;
                    $response['redirect_data'] = '';
                    $response['is_spam']       = 0;
                    #$response['is_add_html']   = 1;
                    #$response['add_html']      = '<div class="error_add">Si el problema persiste contactenos,<br> Whatsapp: <a href="https://api.whatsapp.com/send/?phone=5493644640269&text&type=phone_number&app_absent=0">+5493644640269</a></div>';
            }
            
            #wp_send_json($response);
            #exit;
            return $response;
        }
        
        public function mod_bookingUser_before_entry_insert($bookingpress_entry_details = [], $posted_data = []) {
                        
            /**
            $response = [];
            $response['variant']       = 'error';
            $response['title']         = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']           = 'testmsg';
            $response['is_redirect']   = 0;
            $response['reason']        = 'testreason';
            $response['redirect_data'] = '';
            $response['is_spam']       = 1;
            
            echo json_encode($response);
            
            exit;
           */
           
           $bookingpress_entry_details = array_merge($bookingpress_entry_details, $this->customer_rewrite);
           
           return $bookingpress_entry_details; 
        }
        
    }

global $booking_mod_dni_helper;
$booking_mod_dni_helper = new booking_mod_dni_helper();

}


global $bookingpress_pro_payment_gateways;
$bookingpress_pro_payment_gateways = new bookingpress_pro_payment_gateways_mod();


$booking_mod_pro = new bookingpress_mod_appointment_PRO();
$booking_mod_original = new bookingpress_appointment_bookings_original_mod();


if(defined('BKMOD_DIR')){
    if(file_exists( BKMOD_DIR . '/classes/Ultimo_Historias/Bookingpress_expansion.php' )){
      include_once( BKMOD_DIR . '/classes/Ultimo_Historias/Bookingpress_expansion.php'  );
    }
}


//add_action('plugins_loaded', [$booking_mod, 'change_actions'],10 );

//add_action( 'wp_ajax_nopriv_bookingpress_book_appointment_booking', array( $booking_mod, 'bookingpress_book_front_appointment_func' ) );









}//if class


/**
bookingpress_staff_member_price
bookingpress_total_amount
$bookingpress_entry_details = apply_filters( 'bookingpress_modify_entry_data_before_insert', $bookingpress_entry_details, $posted_data );
*/

### do_action('bookingpress_after_insert_appointment', $appointment_inserted_id);



##################*********################*********#########
##################*********################*********#########
##################*********################*********#########

/**
add_filter( 'bookingpress_modify_entry_data_before_insert', function( $bookingpress_entry_details, $posted_data ){
   
   $f = fopen(__DIR__ . '/book.txt', 'a');
   if( $f ){
    fwrite($f, "\n\n 1: ".print_r($bookingpress_entry_details, true)."\n 2: ".print_r($posted_data, true) );
    fclose($f); 
   }
   
   global $bookingmod_app;
   $price_amount = $bookingmod_app->price;
   
   $bookingpress_entry_details['bookingpress_staff_member_price'] = $price_amount;
   $bookingpress_entry_details['bookingpress_paid_amount'] = $price_amount;
   $bookingpress_entry_details['bookingpress_total_amount'] = $price_amount;
    //$bookingpress_entry_details['bookingpress_mark_as_paid'] = 0;
   if( !$price_amount ){
   $bookingpress_entry_details['bookingpress_mark_as_paid'] = 1;
   }
   
   return $bookingpress_entry_details; 
},10, 2 );

*/

##################*********################*********#########
##################*********################*********#########
##################*********################*********#########

#$appointment_booking_fields = apply_filters('bookingpress_modify_appointment_booking_fields', $appointment_booking_fields, $entry_data, $bookingpress_appointment_data);
/*
add_filter('bookingpress_modify_appointment_booking_fields', function($appointment_booking_fields, $entry_data, $bookingpress_appointment_data){
    
   $appointment_booking_fields['bookingpress_staff_member_price'] = 0;
   $appointment_booking_fields['bookingpress_total_amount'] = 0;
    
    return $appointment_booking_fields;
},200,3 );
*/





#$bookingpress_return_calculated_details = apply_filters('bookingpress_return_calculated_details_modify_outside',$bookingpress_return_calculated_details, $bookingpress_calculated_payment_details, $bookingpress_appointment_id, $bookingpress_payment_id );
/**
add_filter( 'bookingpress_return_calculated_details_modify_outside', function( $bookingpress_return_calculated_details, $bookingpress_calculated_payment_details, $bookingpress_appointment_id, $bookingpress_payment_id){
   $bookingpress_return_calculated_details['subtotal_amt'] = 0;
   $bookingpress_return_calculated_details['final_total_amount'] = 0;
   $bookingpress_return_calculated_details['paid_total_amount'] = 0;
   
   return $bookingpress_return_calculated_details; 
},100,4 );

*/


function maxidata( $name=' ', $data='', $fname='book' ){
   /**     $f = fopen(__DIR__ . '/'.$fname.'.txt', 'a');
   if( $f ){
    fwrite($f, "\n\n $name: ".print_r($data, true)."\n" );
    fclose($f); 
   }*/
}





            #add_action('wp_ajax_bookingpress_front_save_appointment_booking', array( $this, 'bookingpress_save_appointment_booking_func' ), 10);
            #add_action('wp_ajax_nopriv_bookingpress_front_save_appointment_booking', array( $this, 'bookingpress_save_appointment_booking_func' ), 10);





/**
add_filter('bookingpress_revenue_filter_payment_gateway_list_add', function($bookingpress_revenue_filter_payment_gateway_list){
			global $BookingPress;
            
            $add = 1;

			//$bookingpress_is_onsite_enabled = $BookingPress->bookingpress_get_settings('on_site_payment', 'payment_setting');
			if( $add ){
				$bookingpress_revenue_filter_payment_gateway_list[] = array(
					'value' => 'mercadopago',
					'text' => 'MercadoPago'
				);
			}

			return $bookingpress_revenue_filter_payment_gateway_list;
		},100, 1);
*/

/*
add_action( 'bpa_front_add_payment_gateway', function(){
    global $bookingpress_global_options;
$bpa_global_opts = $bookingpress_global_options->bookingpress_global_options();
$bookingpress_allow_tag = json_decode($bpa_global_opts['allowed_html'], true);
$bookingpress_mercadopago_text = 'MercadoPago';


?>
                                            <div class="bpa-front-module--pm-body__item" :class="(appointment_step_form_data.selected_payment_method == 'mercagopago') ? '__bpa-is-selected' : ''" @click="select_payment_method('mercagopago')" > <!-- v-if="paypal_payment != 'false' && paypal_payment != ''" -->
												<svg class="bpa-front-pm-pay-local-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><g><g><rect fill="none" height="24" width="24"/><rect fill="none" height="24" width="24"/></g></g><g><path d="M21.9,7.89l-1.05-3.37c-0.22-0.9-1-1.52-1.91-1.52H5.05c-0.9,0-1.69,0.63-1.9,1.52L2.1,7.89C1.64,9.86,2.95,11,3,11.06V19 c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2v-7.94C22.12,9.94,22.09,8.65,21.9,7.89z M13,5h1.96l0.54,3.52C15.59,9.23,15.11,10,14.22,10 C13.55,10,13,9.41,13,8.69V5z M6.44,8.86C6.36,9.51,5.84,10,5.23,10C4.3,10,3.88,9.03,4.04,8.36L5.05,5h1.97L6.44,8.86z M11,8.69 C11,9.41,10.45,10,9.71,10c-0.75,0-1.3-0.7-1.22-1.48L9.04,5H11V8.69z M18.77,10c-0.61,0-1.14-0.49-1.21-1.14L16.98,5l1.93-0.01 l1.05,3.37C20.12,9.03,19.71,10,18.77,10z"/></g>
                                                </svg>
												<p><?php echo wp_kses($bookingpress_mercadopago_text, $bookingpress_allow_tag); ?></p>
												<div class="bpa-front-si-card--checkmark-icon" v-if="appointment_step_form_data.selected_payment_method == 'mercagopago'">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM9.29 16.29 5.7 12.7c-.39-.39-.39-1.02 0-1.41.39-.39 1.02-.39 1.41 0L10 14.17l6.88-6.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-7.59 7.59c-.38.39-1.02.39-1.41 0z"/></svg>
												</div>
											</div>	
											<?php
 }, 10 );

*/


