<?php

add_filter('bookingpress_modify_appointment_data_fields', function($bookingpress_appointment_vue_data_fields){
    $bookingpress_appointment_vue_data_fields['obs_seguro_no_existe'] = "";
    
    return $bookingpress_appointment_vue_data_fields;
},100,1 );


add_action( 'bookingpress_appointment_add_dynamic_vue_methods', function($vue_methos_data=""){ 
    $vue_methos_data ='
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
        
    if(Date.now() > 1000 + vm.opt_medicos_last_time ){
        
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
        //console.log("lalala");
        return " ";
    },
    change_obra_soc_seguros(force=0){
        const vm = this;
        console.log("change");
        if(vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"]==null) vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
        vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"].trim();
        if(vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] == "particular")
            vm.appointment_formdata.bookingpress_appointment_meta_fields_value["is_particular"] = "Particular";
        
        val = null;
        val = configuracion_medico["obras_sociales"].find((sel_data) => sel_data.value ==  vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] );
        if( val == null ){
            if(force && vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"]!=""){
                vm.obs_seguro_no_existe = vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"];
            }
            vm.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
            
            if(vm.obs_seguro_no_existe != "" && vm.appointment_formdata.selected_staffmember != ""){
                vm.$notify({
    						title: "ObraSocial Convenio no disponible",
    						message: "La Obra social/Seguro del Paciente: `"+vm.obs_seguro_no_existe+"` no esta en la lista.",
    						type: "error",
    						customClass: "error_notification",
    					});
            }
        }else{
            vm.obs_seguro_no_existe = "";
        }
        
    },
    ';
    echo $vue_methos_data;
    //return $vue_methos_data;
},20);
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
								
										<el-col :xs="24" :sm="24" :md="24" :lg="08" :xl="08" v-for="form_fields in bookingpress_form_fields" :class="(form_fields.is_separator == true) ? '--bpa-is-field-separator' : ''">
											<div v-if="form_fields.is_separator == false">
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
														<el-input class="bpa-form-control" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" :placeholder="form_fields.bookingpress_field_placeholder" :style="(form_fields.bookingpress_form_field_name=='dni')?'width:60%;':''"></el-input>
													<div v-if="form_fields.bookingpress_form_field_name=='dni' " class="busquedadni" style="display: inline-block;">
                                                    <a  class="bpa-btn bpa-btn--primary" onclick="paciente_dni(this);" :data-field_key="form_fields.bookingpress_field_meta_key" style="display: block;">Buscar Paciente por DNi</a>
                                                    </div>
                                    <?php 
                                    /*
                                      <!--       <div v-if="form_fields.bookingpress_form_field_name=='dni' " >     
                                            <el-form-item  prop="appointment_selected_customer">
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'Select Customer', 'bookingpress-appointment-booking' ); ?></span>
												</template>
												<el-select class="bpa-form-control" name="appointment_selected_customer" v-model="appointment_formdata.appointment_selected_customer"  @change="bookingpress_select_customer($event)" filterable placeholder="<?php esc_html_e( 'Start typing to fetch Customer', 'bookingpress-appointment-booking' ); ?>" remote reserve-keyword :remote-method="bookingpress_get_customer_list" :loading="bookingpress_loading"  popper-class="bpa-el-select--is-with-modal" v-cancel-read-only> 
                                        -->	
                                        <!--											
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
													<el-form-item v-if="form_fields.bookingpress_field_type == 'radio'" :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-radio class="bpa-form-label bpa-custom-radio--is-label" v-for="(chk_data, keys) in JSON.parse(form_fields.bookingpress_field_values)" :label="chk_data.label" :key="chk_data.value" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]">{{chk_data.label}}</el-radio>
													</el-form-item>
													<el-form-item v-if='form_fields.bookingpress_field_type == "dropdown"' :prop="form_fields.bookingpress_field_meta_key">
														<template #label>
															<span class="bpa-form-label">{{ form_fields.bookingpress_field_label }}</span>
														</template>
														<el-select v-if="form_fields.bookingpress_field_meta_key!='obra_soc_seguros' "  class="bpa-form-control" :placeholder="form_fields.bookingpress_field_placeholder" v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]">
															<el-option v-for="sel_data in JSON.parse(form_fields.bookingpress_field_values)" :key="sel_data.value" :label="sel_data.label" :value="sel_data.value" ></el-option>
														</el-select>
                                                        <el-select v-if="form_fields.bookingpress_field_meta_key=='obra_soc_seguros' "  class="bpa-form-control" :class="(appointment_formdata.bookingpress_appointment_meta_fields_value['is_particular'] =='Particular')?'hide_me':'' " filterable  :placeholder="form_fields.bookingpress_field_placeholder"  v-model="appointment_formdata.bookingpress_appointment_meta_fields_value[form_fields.bookingpress_field_meta_key]" @change="change_obra_soc_seguros()">
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
                                                            <span class="price">Costo de la consulta particular: {{appointment_formdata.total_amount_with_currency}}</span>
                                                        </div>
                                                        
                                                    </div>
                                                   <!-- 
                                                    <div v-if="form_fields.bookingpress_field_meta_key=='obra_soc_seguros' " v-show="obs_seguro_no_existe!='' && (appointment_formdata.bookingpress_appointment_meta_fields_value['is_particular'] !='Particular')" class="no_admite_obs_sel">
                                                            <span v-if="appointment_formdata.selected_staffmember==''">La opcion: "<span class="no_obs_sel">{{obs_seguro_no_existe}}</span>" no se encuentra en lista actualmente.</span>
                                                            <span v-else>El medico no admite la opcion: "<span class="no_obs_sel">{{obs_seguro_no_existe}}</span>"</span>
                                                            
                                                            
                                                    </div>
                                                    -->
                                                    
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
    margin-top: -100px;
    transition: all 1s;
    z-index: -1;
    position: relative;
}

div.price {
    opacity: 0;
    transition: all 2s ease;
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

@media (max-width: 900px){
    .busquedadni { 
    width: 100%;
}
div:has(>.busquedadni)>div {
    width: 100% !important;
    //border: 3px solid brown;
}
}
@media (min-width: 1200px){
    .busquedadni { 
    width: 100%;
}
div:has(>.busquedadni)>div {
    width: 100% !important;
    //border: 3px solid brown;
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
        
        maxApp.backup_methods.open_add_appointment_modal();
        
        if( maxApp.appointment_formdata.appointment_update_id == 0){
            maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value['send_whatsapp_notification'] = true;
            
            setTimeout( ()=>{
            maxApp.first_load = 1;
            },1000);
        }
        
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
    
});


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
                                if( response.data['obras_sociales'] != null && configuracion_medico['obras_sociales'] != undefined ){ //response.data != " faltan datos."
                                    //for(z in response.data['obras_sociales']) if(response.data['obras_sociales'][z].value==null ) response.data['obras_sociales'].splice(z,1);
                                    configuracion_medico = response.data;
                                    if( configuracion_medico['obras_sociales'] != null ){
                                        val = null;
                                        val = configuracion_medico['obras_sociales'].find((sel_data) => sel_data.value ==  maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] );
                                        if( val == null ){
                                            maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
                                        }else{
                                            if( maxApp.appointment_formdata.appointment_update_id ){
                                                if(maxApp.appointment_formdata.bk_mod_original_date == null) maxApp.appointment_formdata.bk_mod_original_date = maxApp.appointment_formdata.appointment_booked_date;
                                                if(val.limitado && (maxApp.appointment_formdata.bk_mod_original_date == maxApp.appointment_formdata.appointment_booked_date) ){
                                                    val.cupos = val.cupos<1? 1:val.cupos;
                                                }
                                            }
                                        }
                                        
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
                        if( configuracion_medico['obras_sociales'] != null){
                                        val = null;
                                        val = configuracion_medico['obras_sociales'].find((sel_data) => sel_data.value ==  maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] );
                                        if( val == null ){
                                            maxApp.appointment_formdata.bookingpress_appointment_meta_fields_value["obra_soc_seguros"] = "";
                                        }
                                        
                        }
                        
                        obras_is_loading = false;
                        maxApp.obras_is_loading = false;
                        return configuracion_medico;
         }
     }
    
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
                                    if( response.data.id ){
                                        maxApp.bookingpress_retrieve_custom_field_values( response.data.id );
                                    }else{
                                        alert( "no se encontro paciente" ); 
                                    }
                                }
                            }else{
                                alert( response.data.msg ); 
                            }
                            
                        }
                        //maxApp.is_display_loader = "0";
                        //maxApp = obs.max;
                        //obs.loadOptions();
                         
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


?>