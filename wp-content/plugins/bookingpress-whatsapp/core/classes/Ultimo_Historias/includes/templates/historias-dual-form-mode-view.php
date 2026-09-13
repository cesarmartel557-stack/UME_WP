<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<!--Dual View MODE - REGISTRO DE NUEVA HISTORIA custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--history-modal bpa--is-page-non-scrollable-mob" -->
<div class="start-form"></div>
<!-- custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--history-modal bpa--is-page-non-scrollable-mob"  direction="ltr" :modal="false" :append-to-body="true" :visible.sync="bp_hc_ConsultationModal" :before-close="closeCustomerModal"  :close-on-press-escape="close_modal_on_esc" -->
<div id="dual_view_bphc_history_add_container" v-if="bp_hc_ConsultationModal" style="position: relative;"> <!-- v-if="bp_hc_ConsultationModal" -->
<div v-if="bp_hc_bookingpress_staffmember_id && newRecord.bookingpress_customer_id" >

    <div class="bpa-dialog-heading">
		<el-row type="flex" style="justify-content: space-between;margin-bottom: 10px;">
			<el-col :span="16">
		<h2 class="bpa-page-heading bp_hc_dualview_heading" v-if="newRecord.update_id == 0" style="font-size: large;">
        <div><?php esc_html_e( 'Nuevo Registro', 'bookingpress-appointment-booking' ); ?>
        <?php esc_html_e( 'Historia Clínica', 'bookingpress-appointment-booking' ); ?></div>
        </h2>
		<h2 class="bpa-page-heading bp_hc_dualview_heading" style="font-size: large;" v-else>
            <!-- {{ ( newRecord.bookingpress_staff_member_id == bp_hc_bookingpress_staffmember_id? '<?php esc_html_e( 'Editar ', 'bookingpress-appointment-booking' ); ?>':'' ) }} -->
            <?php esc_html_e( 'Registro de Historia Clínica', 'bookingpress-appointment-booking' ); ?> {{ (Number(newRecord.update_id)?('#'+Number(newRecord.update_id)):'') }}
        </h2>
			</el-col>
			<el-col v-if="newRecord.bookingpress_staff_member_id == bp_hc_bookingpress_staffmember_id" :span="8" class="bpa-dh__btn-group-col" style="" >
				<el-button class="bpa-btn bpa-btn--primary " :class="is_display_save_loader == '1' ? 'bpa-btn--is-loader' : ''" @click="bphc_save_historyRecord" :disabled="is_disabled" >
					<span class="bpa-btn__label"><?php esc_html_e( 'Guardar', 'bookingpress-appointment-booking' ); ?></span>
					<div class="bpa-btn--loader__circles">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</el-button> 
				<el-button class="bpa-btn" style="margin-left: 0;" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Cerrar', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
            <el-col v-else :span="8"  class="bpa-dh__btn-group-col" style="" >
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
	
	<div class="bpa-dialog-body">
    
		<div class="bpa-back-loader-container" v-if="is_display_loader == '1'">
			<div class="bpa-back-loader"></div>
		</div>
        
		<div class="bpa-form-row">
			<el-row>
				<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
					<div class="bpa-db-sec-heading">
						<el-row type="flex" align="middle">
							<!--
                            <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12">
								<div class="db-sec-left">
									<h2 class="bpa-page-heading"><?php esc_html_e( 'Información General', 'bookingpress-appointment-booking' ); ?></h2>
								</div>
							</el-col>
                            -->
						</el-row>
					</div>
                    <!-- formulario registro body card -->			
					<div class="bpa-default-card bpa-db-card">
                        <span v-if="newRecord.booking_id || newRecord.raw && newRecord.raw.booking_id" style="position: absolute;top: 2px;left: 5px;font-size: 10px;color: darkslateblue;">Turno #{{newRecord.booking_id || newRecord.raw.booking_id}}</span>
                    
<!-- VISTA 2: FORMULARIO DE REGISTRO @back="goBack" -->
                <div  >
                    <el-form ref="recordForm" :model="newRecord"  style="margin-top:20px;">
                    <!--<el-page-header :content="'Paciente '+selected_patient.customer_firstname+' - '+newRecord.staff_member_name " ></el-page-header>-->
                    <div class="first-desc-form" style="">
                        
                        <div class="fdform_left" style="">
                            <span class="bpa-form-label text-gray-300">Paciente: {{ (selected_patient.customer_firstname||'') + '&nbsp;' + (selected_patient.customer_lastname||'') }}</span>
                        </div>
                        <!--
                        <div class="fdform_left" style="text-align: start;overflow: clip;min-width: 50px;max-height: 40px;text-overflow: ellipsis;justify-self: center;">
                            <span class="bpa-form-label">{{newRecord.staff_member_name }}</span>
                        </div>
                        -->
                        <div class="fdform_right" style="">
                            <div v-if="!newRecord.is_block_service && (!newRecord.id || newRecord.id == 'add_new') || (!newRecord.service_name && !newRecord.bookingpress_appointment_id)">
                                <el-form-item ref="bphcFormService" prop="service_id"  :rules="{required:true, message:'especialidad requerida', trigger: 'blur', validator: validateService}" >
                                <el-select  class="bpa-form-control bpa-from-select-tab" v-model="bp_hc_selected_service_id" 
                                
                                @change="bphc_changeCurrentService"
                                filterable collapse-tags  placeholder="<?php esc_html_e( 'Select Service', 'bookingpress-appointment-booking' ); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
                                   <el-option value="0" label=" " v-show="false" disabled="true"></el-option>
            					   <el-option-group v-for="service_cat_data in bp_hc_staff_serviceList" :key="service_cat_data.category_name" :label="service_cat_data.category_name">
            							<el-option v-for="(service_data, indx) in service_cat_data.category_services" :key="service_data.service_id" :label="service_data.service_name" :value="service_data.service_id" ></el-option> 
            						</el-option-group>
            					</el-select>
                                </el-form-item>
                                <!--
            					<el-select class="bpa-form-control bpa-from-select-tab" v-model="newRecord.service_name"
                                required 
                                @change=""
                                filterable collapse-tags  placeholder="<?php esc_html_e( 'Especialidad', 'bookingpress-appointment-booking' ); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
            					   <el-option-group v-for="service_cat_data in bp_hc_staff_serviceList" :key="service_cat_data.category_name" :label="service_cat_data.category_name">
            							<el-option v-for="(service_data, indx) in service_cat_data.category_services" :key="service_data.service_id" :label="service_data.service_name" :value="service_data.service_name" ></el-option> 
            						</el-option-group>
            					</el-select>
                                -->
                                 <!-- :extradata="`{'service_id':`+service_data.service_id+`,'service_name':`+service_data.service_name+`}`" -->
                            </div>
                            <div v-else>
                                <el-tag class="bpa-form-label service-tag" style="" type="info">{{ newRecord.service_name }}</el-tag>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!--agui form-->
                    <div class="bphc-form-grid" style="margin-top:20px;">
                        
                         <!-- en la misma columna del grid -->
                        <!-- Seccion Signos Vitales -->
                        <el-card class="bphc-vitales " shadow="never" header="Signos Vitales" style="" >
                            <el-row :gutter="20" :style="{ marginLeft: '', marginRight: '' }" style="padding: 10px;" >
                            
                            <!-- cambiar prop y model a altura -->
                                <el-row :gutter="20" style="" >
                                    <el-form-item inline-message="true" label="Altura" prop="vitales.altura"  > <!-- :rules="{ required: true, message: 'requerido', trigger: 'blur' }" -->
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-ruler-vertical text-purple-500"></i></div>
                                                <span class="bpa-form-label">Altura</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.altura" v-model="newRecord.vitales.altura" class="bphc_item_input" placeholder=" 1.78 (Mts) " ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                            <!-- cambiar prop y model a peso -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" label="Peso" prop="vitales.peso"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-weight text-blue-500 text-xs"></i></i></div>
                                                <span class="bpa-form-label">Peso</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.peso" v-model="newRecord.vitales.peso" class="bphc_item_input" placeholder="74 (Kg) " ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           <!-- temperatura -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" label="Temperatura" prop="vitales.temperatura"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-thermometer-half text-green-500 text-xs"></i></i></div>
                                                <span class="bpa-form-label">Temperatura</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.temperatura" v-model="newRecord.vitales.temperatura" class="bphc_item_input" placeholder="36.5 (°C) " ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           <!-- frecuenciaRespiratoria -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" label="Frec. Respiratoria" prop="vitales.frecuenciaRespiratoria"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-lungs text-teal-500 text-xs"></i></div>
                                                <span class="bpa-form-label">Frec. Respiratoria</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.frecuenciaRespiratoria" v-model="newRecord.vitales.frecuenciaRespiratoria" class="bphc_item_input" placeholder="17 (r/m)" ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           <!-- presionArterial -->
                                <el-row :gutter="20" >
                                    <el-form-item inline-message="true" style="display:flex;align-items:end;justify-content:space-between;" label="Presión Arterial" prop="vitales.presionArterial"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-heartbeat text-red-500 text-xs"></i></div>
                                                <span class="bpa-form-label">Presión Arterial</span>
                                            </div>
                                        </template>
                                        <el-input id="vitales.presionArterial" v-model="newRecord.vitales.presionArterial" class="bphc_item_input" placeholder="120/80 (mmHg)" ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                                <!-- saturacionOxigeno -->
                                <el-row :gutter="20" >
                                    <el-form-item  style="" label="Sat. O2" prop="vitales.saturacionOxigeno"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><span style="width: 18px; display: inline-block;"><img src="<?php echo bookingpress_mod_icon_helper( 'satO2' ); ?>" style="margin-left: -2px;" /></span></div>
                                                <span class="bpa-form-label">Sat. O2</span>
                                            </div>
                                        </template>
                                        <el-input  id="vitales.saturacionOxigeno" v-model="newRecord.vitales.saturacionOxigeno" class="bphc_item_input" placeholder="95% (SpO2)" ></el-input>
                                    </el-form-item>
                                </el-row>
                           
                           <!-- frecuenciaCardiaca -->
                                <el-row :gutter="20" >
                                    <el-form-item  style="" label="Frec. Cardíaca" prop="vitales.frecuenciaCardiaca"  >
                                        <template #label>
                                            <div class="flex">
                                                <div class="icon-container" ><i class="fas fa-heart text-pink-500 text-xs"></i></div>
                                                <span class="bpa-form-label">Frec. Cardíaca</span>
                                            </div>
                                        </template>
                                        <el-input  id="vitales.frecuenciaCardiaca" v-model="newRecord.vitales.frecuenciaCardiaca" class="bphc_item_input" placeholder="62 (Fc)" ></el-input>
                                    </el-form-item>
                                </el-row>
                                
                           
                                
                                
                                
                            </el-row>
                        </el-card>
                        <!-- Fin Seccion Signos Vitales -->
                        
                        
                        
                        
                        <!-- Seccion General -->
                        <el-card class="bphc-info " shadow="never" header="Información General" style="grid-row: span 2;" >
                        
                           <el-form-item label="Motivo de Consulta" prop="general.motivoConsulta" >
                               <el-input id="general.motivoConsulta" type="textarea" v-model="newRecord.general.motivoConsulta"></el-input>
                           </el-form-item>
                           <!--
                           <el-form-item label="Enfermedad Actual" prop="general.enfermedadActual">
                               <el-input id="general.enfermedadActual" type="textarea" :rows="4" v-model="newRecord.general.diagnostico"></el-input>
                           </el-form-item>
                           -->
                           <el-form-item label="Diagnostico" prop="general.diagnostico">
                               <el-input id="general.diagnostico" type="textarea" :rows="4" v-model="newRecord.general.diagnostico"></el-input>
                           </el-form-item>
                           
                           <el-form-item label="Tratamiento" prop="general.tratamiento">
                               <el-input id="general.tratamiento" type="textarea" :rows="4" v-model="newRecord.general.tratamiento"></el-input>
                           </el-form-item>
                           
                           <el-form-item label="nota" prop="general.notas">
                               <el-input id="general.notas" type="textarea" :rows="4" v-model="newRecord.general.notas"></el-input>
                           </el-form-item>
                           
                        </el-card>
                        <!-- Fin Seccion General -->
                        
                        <!-- Agrupacion medicamentos Y archivos -->
                        <div class="bphc-group-meds-files">
                            <!-- Seccion Medicamentos  -->
                             <el-card class="bphc-meds" shadow="never" header="Medicamentos" >
                                <div v-for="(item, index) in newRecord.medicamentos" :key="index" style="margin-bottom:10px;">
                                    <el-row :gutter="10" class="med-item">
                                        <el-col :span="8"><el-input placeholder="Nombre del medicamento" v-model="item.nombre"></el-input></el-col>
                                        <el-col :span="6"><el-input placeholder="Dosis" v-model="item.dosis"></el-input></el-col>
                                        <el-col :span="6"><el-input placeholder="Frecuencia" v-model="item.frecuencia"></el-input></el-col>
                                        <el-col :span="4" align="right"><el-button @click.prevent="removeMedicamento(item)" type="danger" icon="el-icon-delete" circle></el-button></el-col>
                                    </el-row>
                                </div>
                                <el-button @click="addMedicamento" size="small">+ Añadir Medicamento</el-button>
                            </el-card>
                            <!-- Fin Seccion Medicamentos  -->
                            <!-- Seccion Subida de Archivos :before-upload="checkUploadedFile"  -->
                            <el-card shadow="never" header="Archivos Adjuntos" v-if=" typeof newRecord.archivos !='undefined' " >
                                <el-upload v-if=" typeof newRecord.archivos !='undefined' "
                                    class="upload-demo" action="<?php echo wp_nonce_url(admin_url('admin-ajax.php') . '?action=bookingpress_upload_record_file', 'bookingpress_upload_customer_avatar'); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - esc_html is already used by wp_nonce_url function and it's false positive ?>"
                                    :file-list="newRecord.archivos"
                                    
                                    :on-success="bphc_upload_record_file"
                                    
                                    :on-remove="bphc_handleRemove_record_file"
                                    :on-error="bphc_upload_record_file_err"
                                    multiple="false"
                                    :limit="10"
                                    :on-preview="bphc_handlePreview_record_file"
                                    :on-exceed="bphc_handleExceed_limit_files"
                                    >
                                    <el-button size="small" type="primary">Agregar archivo</el-button>
                                    <div slot="tip" class="el-upload__tip">Archivos de imagen o doc. con un tamaño menor de 2MB</div>
                                </el-upload>
                            </el-card>
                            <!-- Fin Archivos -->
                        </div>
                        <!-- Fin Agrupacion medicamentos Y archivos -->
                        
                        <?php if(isset($_GET['test'])){ ?>
                        <!-- Seccion Alergias v-if="newRecord.alergias" -->
                         <el-card class="bphc-alergs" shadow="never" header="Alergias"  >
                            <div v-for="(item, index) in newRecord.alergias" :key="index" style="margin-bottom:10px;">
                                <el-row :gutter="10" style="" class="border-item alerg-item">
                                    <input type="hidden" name="alerg_id" v-model="item.id" >
                                    
                                        <el-col :span="24">
                                            <el-row class="rowitem-center">
                                                <el-col :span="20" >
                                                <el-tag>{{ item.fecha?moment(item.fecha).format('YY/MM/DD'):moment(item.fecha).format('YY/MM/DD') }}</el-tag>
                                                </el-col>
                                                <el-col :span="4" align="right">
                                                <el-button @click.prevent="removeAlergia(item)" type="danger" icon="el-icon-delete" circle></el-button>
                                                </el-col>
                                            </el-row>
                                            <el-row>
                                                <el-col :span="6">
                                                <span>Alergia:</span>
                                                </el-col>
                                                <el-col :span="18">
                                                <el-input placeholder="Alergia" v-model="item.alergia"></el-input>
                                                </el-col>
                                                <el-col :span="6">
                                                <span>&nbsp;</span>
                                                </el-col>
                                                <el-col :span="18">
                                                <el-input type="textarea" :rows="2" placeholder="reaccion o motivo" v-model="item.reaccion_o_motivo"></el-input>
                                                </el-col>
                                            </el-row>
                                        </el-col>
                                        
                                        
                                    
                                    
                                </el-row>
                            </div>
                            <el-button @click="addAlergia" size="small">+ Añadir Alergia</el-button>
                        </el-card>
                        <!-- Fin Seccion Alergias  -->
                        <?php } ?>
                        
                        <?php if(isset($_GET['test'])){ ?>
                        <!-- Seccion Antecedentes  v-if="newRecord.antecedentes" -->
                         <el-card class="bphc-antc" shadow="never" header="Antecedentes"  >
                            <div v-for="(item, index) in newRecord.antecedentes" :key="index" style="margin-bottom:10px;">
                                <el-row :gutter="10" style="" class="border-item antc-item">
                                    <input type="hidden" name="antc_id" v-model="item.id" >
                                    
                                        <el-col :span="24">
                                            <el-row class="rowitem-center"> <!-- style="padding: 2px 0;align-items: center;display: flex;flex-direction: row;" -->
                                                <el-col :span="6" >
                                                <el-tag>{{ item.fecha?moment(item.fecha).format('YY/MM/DD'):moment(item.fecha).format('YY/MM/DD') }}</el-tag>
                                                
                                                </el-col>
                                                <el-col :span="14" >
                                                <el-select placeholder="tipo" v-model="item.tipo" style="width: 100%;transform: scaleY(0.9);">
                                                    <el-option label="Personal" value="personal"></el-option>
                                                    <el-option label="Familiar" value="familiar"></el-option>
                                                </el-select>
                                                </el-col>
                                                <el-col :span="4" align="right">
                                                <el-button @click.prevent="removeAntecedente(item)" type="danger" icon="el-icon-delete" circle></el-button>
                                                </el-col>
                                            </el-row>
                                            <el-row>
                                                <el-col :span="6">
                                                <span>Antecedente:</span>
                                                </el-col>
                                                <el-col :span="18">
                                                <el-input placeholder="titulo - descripcion corta" v-model="item.descripcion" size="255"></el-input>
                                                
                                                </el-col>
                                            </el-row>
                                            <el-row >
                                                <el-col :span="24">
                                                    <el-col :span="6">
                                                    <span>&nbsp;</span>
                                                    </el-col>
                                                    <el-col :span="18">
                                                    <el-input type="textarea" :rows="2" placeholder="detalle - descripcion" v-model="item.detalle"></el-input>
                                                    </el-col>
                                                </el-col>
                                            </el-row>
                                            
                                        </el-col>
                                        
                                        
                                    
                                    
                                </el-row>
                            </div>
                            <el-button @click="addAntecedente" size="small">+ Añadir Antecedente</el-button>
                        </el-card>
                        <!-- Fin Seccion Antecedentes  -->
                        <?php } ?>

                        
                        <!--
                        <el-form-item style="margin-top: 30px;">
                            <el-button type="primary" @click="saveRecord">Guardar Historia Clinica</el-button>
                            <el-button @click="bp_hc_CloseHistoryModal" >Cancelar</el-button>
                        </el-form-item>
                        -->
                    </div>
                    </el-form>
                </div>
                    
                    
                    
                    
                    
                    
					</div>
                    <!-- Fin formulario registro body card -->
                    
                    <!--
                    <div style="margin: 40px;background: whitesmoke;text-align: right;">
                        <button onclick="HistoryImp()" class="bpa-btn button-primary">Imprimir Hoja</button>
                        
                        
                    </div>
                    -->
				</el-col>
			</el-row>
		</div>
	</div>
    

</div> 	
<div v-else  style="">

    
    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		
			</el-col>
			<el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				 
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
    <!--
    <div class="bpa-dialog-heading">
		<el-row type="flex">
			<el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
		
		
			</el-col>
			<el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col" style="min-width: 360px;" >
				
				<el-button class="bpa-btn" @click="bp_hc_CloseHistoryModal()"><?php esc_html_e( 'Volver', 'bookingpress-appointment-booking' ); ?></el-button>
			</el-col>
		</el-row>
	</div>
    -->
    <div class="bpa-dialog-body" style="display: flex;align-items: center;justify-content: center;min-height: 60vh;width: 100%;">
        <div class="bpa-default-card bpa-db-card" style="padding-bottom: 40px;">
            <div class="bpa-form-row" >
                <h1 class="bpa-page-heading" style="display: flex; flex-wrap:wrap;">
                    <div class="no_sel_paciente_1">NO SE SELECCIONO PACIENTE</div>
                    <div class="no_sel_paciente_2">&nbsp;O NO SE HA SELECCIONADO UN TURNO</div>
                </h1>
            </div>
        </div>
    </div>
    <!-- 
    <div v-if="!newRecord.bookingpress_customer_id" class="bpa-form-label" style="display: flex;align-self:center;width: 100%;height:100%;font-size: larger;">
    <h1><span class="">NO SE SELECCIONO PACIENTE o NO SE HA SELECCIONADO UN TURNO VINCULADO A UNO</span></h1>
    </div>
    -->

</div>   

<a class="history-gototop-btn" onclick="scrollToTopElement()"  style=""><span class="material-icons-round">arrow_circle_up</span></a>

</div><!-- Change dialog X div -->

