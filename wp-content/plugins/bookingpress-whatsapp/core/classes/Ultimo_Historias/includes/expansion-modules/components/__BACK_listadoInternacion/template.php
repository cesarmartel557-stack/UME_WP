<div class="exp-listado-internacion" style="padding: 15px;background: rgb(255, 255, 255);/* border: 1px solid rgb(204, 208, 212); */box-sizing: border-box;width: 100%;">
<template>
  <div class="hospitalization-container" style="position: relative;">
    <!-- TITULO Header filtro -->
    <el-row type="flex" class="bpa-mlc-head-wrap" >
		<el-col :xs="24" :sm="12" :md="12" :lg="12" :xl="12" class="bpa-mlc-left-heading">
			<h1 class="bpa-page-heading">Listado de Internación</h1>
		</el-col>
		<el-col :xs="24" :sm="12" :md="12" :lg="12" :xl="12">
			<div class="bpa-hw-right-btn-group">
                <?php /*
				<el-button class="bpa-btn bpa-btn--primary" @click=""> 
					<span class="material-icons-round">add</span> 
					<?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?>
				</el-button>
                */ ?>
                <el-button type="primary" class="bpa-btn bpa-btn--primary" icon="el-icon-plus" @click="location.hash = 'internacionIngreso'">
                  <span> Nuevo Ingreso </span>
                </el-button>
			</div>
		</el-col>
	</el-row>
    
    
    <div class="bpa-table-filter">				
			<el-row type="flex" :gutter="32">			
				<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
					<span class="bpa-form-label">Fecha</span>
                    <el-date-picker @focus="" class="bpa-form-control bpa-form-control--date-range-picker" format="yyyy/MM/dd" v-model="intListFilter.date_range" type="daterange" start-placeholder="<?php esc_html_e('Start date', 'bookingpress-appointment-booking'); ?>" end-placeholder="<?php esc_html_e('End date', 'bookingpress-appointment-booking'); ?>" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar bpa-date-range-picker-widget-wrapper" range-separator=" - " value-format="yyyy-MM-dd" :picker-options="filter_pickerOptions"> </el-date-picker>
                    <!--<el-date-picker format="yyyy/MM/dd HH:mm:ss" value-format="yyyy-MM-ddTHH:mm:ss" placeholder="Ingrese fecha y Hora aaaa/mm/dd hh:mm:ss" v-model="ingreso_formdata.datetime" class="bpa-form-control bpa-form-control--date-picker" prefix-icon="" type="datetime"  ></el-date-picker>-->
				</el-col>							
				<?php
				
					?>
				<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
					<span class="bpa-form-label">Médico</span>	
					<el-select class="bpa-form-control" v-model="intListFilter.medico_name" multiple filterable collapse-tags 
					placeholder="<?php esc_html_e('Select', 'bookingpress-appointment-booking'); ?><?php echo " ".esc_html($bookingpress_plural_staffmember_name); ?>"
					:popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
						<el-option v-for="item in (($exp_default_data_fields||{}).search_staff_member_list || [])" :key="item.value" :label="item.text" :value="item.value">	
						</el-option>
					</el-select>
				</el-col>
					<?php
				
				?>
				<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
					<span class="bpa-form-label">Paciente <span style="color: var(--bpa-dt-black-100);margin-inline: 0px;position: relative;float: right;">(Nombre/Documento)</span></span>	
					<el-select class="bpa-form-control" v-model="intListFilter.customer_id" filterable collapse-tags placeholder="<?php esc_html_e( 'Start typing to fetch Customer', 'bookingpress-appointment-booking' ); ?>" 
                    remote reserve-keyword	 :remote-method="$exp_default_data_fields.methods.bookingpress_get_customer_list.bind(this)" :loading="bookingpress_loading" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
						<el-option v-for="item in search_customer_list" :key="item.value" :label="item.text" :value="item.value"></el-option>
					</el-select>
				</el-col>
				<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
					<span class="bpa-form-label">Área de Hospitalización</span>
					<el-select class="bpa-form-control" v-model="intListFilter.area" filterable  placeholder="Selecciona area" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
					   <el-option v-for="area in search_area_list" :key="area.value" :label="area.text" :value="area.value"></el-option>
						
					</el-select>
				</el-col>
				<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
					<span class="bpa-form-label"><?php esc_html_e( 'Status', 'bookingpress-appointment-booking' ); ?></span>		
					<el-select class="bpa-form-control" v-model="intListFilter.estado" 
						placeholder="<?php esc_html_e( 'Select Status', 'bookingpress-appointment-booking' ); ?>"
						:popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
						<el-option label="<?php esc_html_e('All', 'bookingpress-appointment-booking'); ?>" value="all"></el-option>
						<el-option v-for="item in internacion_status_list" v-if="item.show" :key="item.value" :label="item.text" :value="item.value"></el-option>
					</el-select>
				</el-col>
                
                <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                    <span class="bpa-form-label">ID</span>
					<el-input class="bpa-form-control" v-model="intListFilter.id" placeholder="ID Internación" @input="($event)=>{ let val = $event; return val.replace(/\D/g,'')}" >    
					</el-input>
				</el-col>
                
			</el-row><br>
			<el-row type="flex" :gutter="32">
				
				<el-col :xs="24" :sm="24" :md="24" :lg="16" :xl="16">
					<el-input class="bpa-form-control" v-model="intListFilter.searchQuery" placeholder="<?php esc_html_e( 'Search for Customers, Services...', 'bookingpress-appointment-booking' ); ?>" >	
					</el-input>
				</el-col>
				<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
					<div class="bpa-tf-btn-group">
						<el-button class="bpa-btn bpa-btn__medium bpa-btn--full-width" @click="reset_intListFilter">
							<?php esc_html_e( 'Reset', 'bookingpress-appointment-booking' ); ?>
						</el-button>
						<el-button class="bpa-btn bpa-btn__medium bpa-btn--primary bpa-btn--full-width" @click="loadInternacionList()">
							<?php esc_html_e( 'Apply', 'bookingpress-appointment-booking' ); ?>
						</el-button>						
					</div>
				</el-col>										
			</el-row><br>
		</div>
    
    
    
    <!-- Fin TITULO Header filtro -->
    
    <el-card class="box-card">
      <!-- Encabezado y Buscador -->
      <div slot="header" style="width: 100%;text-align: center;">
        <h2>Listado</h2>                       
      </div>
      
<!--
      <div slot="header" class="clearfix">
        <h2>Listado de Internación</h2>
        <el-row :gutter="20">
          <el-col :span="8">
            <el-input
              v-model="searchQuery"
              placeholder="Buscar por paciente, habitación o diagnóstico..."
              prefix-icon="el-icon-search"
              clearable>
            </el-input>
          </el-col>
          <el-col :span="16" style="text-align: right;">
            <el-button type="primary" icon="el-icon-plus" @click="handleNewAdmission">
              Nueva Internación
            </el-button>
          </el-col>
        </el-row>
      </div>
-->

<?php /**

[
    'id' => '1',
    'ingreso_id' => '1',
    'id_interno' => '',
    'paciente_id' => '4514',
    'medico_encargado' => '2',
    'estado' => '1',//['sin definir','Activo','Alta médica','Derivado','Fallecido']
    'medico_name'=> 'Doc Maxi Testeando',
    'customer_name'=> 'Paciente Loco',
    //'sala' => '',
    //'cama' => '',
    //'area' => '',
    'destino' => '',
    'raw_int' => [],
    'fecha_ingreso' => date("Y-m-d H:i:s"),
    'fecha_egreso' => null,
]

*/ ?>

      <!-- Tabla de Datos -->
      <el-table
        :data="filteredHospitalizations"
        style="width: 100%"
        v-loading="loading"
        stripe
        border>

        <el-table-column prop="ingreso_id" label="ID" width="100" align="center"></el-table-column>
        
        <el-table-column label="F. Ingreso" width="100" align="center">
            <template slot-scope="scope">
                <span class="int-fecha" style="padding: 2px;">{{ extractDateTime(scope.row.fecha_ingreso, 'fecha') }}</span>                
            </template>
        </el-table-column>
        
        <el-table-column prop="customer_name" label="Paciente" min-width="160" >
          <template slot-scope="scope">
            <span style="padding: 2px;"> <i class="el-icon-user"></i> {{ scope.row.customer_name }} </span>  
          </template>
        </el-table-column>

        <el-table-column label="Habitación" width="120" align="center">
            <template slot-scope="scope">
                <span class="int-sala" v-if="scope.row.movimientos?.length">{{ scope.row.movimientos[0].sala}}</span>
                <span class="int-sala" v-else>Sin asignar</span>
            </template>
        </el-table-column>
        
        
        
        <!--<el-table-column prop="diagnosis" label="Diagnóstico" min-width="200"></el-table-column>-->
        
        <el-table-column prop="medico_name" label="Médico" width="160" >
            <template slot-scope="scope">
                <span style="padding: 2px;"> {{ scope.row.medico_name }} </span>
            </template>
        </el-table-column>

        <!-- Columna con Tags para el Estado -->
        <el-table-column label="Estado" width="130" align="center">
          <template slot-scope="scope">
            <el-tag
              :type="getStatusType(scope.row.estado)"
              effect="dark"
              size="small">
              {{ getStatusType(scope.row.estado,'text') }}
            </el-tag>
          </template>
        </el-table-column>

        <!-- Acciones -->
        <el-table-column label="Acciones" width="180" align="center">
          <template slot-scope="scope">
            <el-button 
              type="info" 
              icon="el-icon-view" 
              size="mini" 
              circle
              title="Ver Detalles"
              @click="handleView(scope.row)">
            </el-button>
            <el-button 
              type="success" 
              icon="el-icon-check" 
              size="mini" 
              circle
              title="Dar Alta"
              v-if="Array( 1 ,'Internado').includes(scope.row.estado)"
              @click="handleDischarge(scope.row)">
            </el-button>
            <el-button 
              type="danger" 
              icon="el-icon-delete" 
              size="mini" 
              circle
              title="Cancelar"
              @click="handleDelete(scope.row)">
            </el-button>
          </template>
        </el-table-column>

      </el-table>
      
      <!-- Agregar PAGINACION -->
      
      
      
    </el-card>
    
    
     <!-- open_internacionEdit -->
     <?php /**
     <el-dialog v-show="open_internacionEdit" :visible.sync="open_internacionEdit" :custom-class=" 'internacion-modal-view bpa--is-page-non-scrollable-mob ' " :fullscreen="false" :modal-append-to-body="false" :close-on-press-escape="true" style="width: 100%;z-index: 2142;display: flex;justify-content: center;align-items: center;top:unset;overflow:visible;"><!-- "bpa-dialog bpa-dialog--fullscreen  bpa--is-page-non-scrollable-mob" " :modal-append-to-body="false" " -->
     */ ?>
     <el-dialog v-show="open_internacionEdit" title="Datos de Internación" :visible.sync="open_internacionEdit" :custom-class=" 'internacion-modal-view bpa--is-page-non-scrollable-mob ' " :fullscreen="false" :modal-append-to-body="false" :close-on-press-escape="true" style="width: 100%;z-index: 2142;display: flex;justify-content: center;align-items: center;"><!-- "bpa-dialog bpa-dialog--fullscreen  bpa--is-page-non-scrollable-mob" " :modal-append-to-body="false" " -->
        <template v-if="open_internacionEdit && currentEditData && currentEditData.ingreso_id">
            <el-form ref="internacionEdit" rules="" :model="currentEditData" @validate="" label-position="top" @submit.native.prevent>
            <template>
                <el-row :gutter="24" type="flex" style="padding-bottom: 10px;gap:20px;align-items: center;">
                    <el-col :span="8">
                        <strong>Ingreso Nro: #{{currentEditData.ingreso_id}}</strong>
                    </el-col>
                    <el-col :span="16" :gutter="16" style="display: inline-flex;align-items: center;gap: 10px;justify-content: flex-end;">
                        <el-col :span="10">
                        <span> Numero Interno: </span>
                        </el-col>
                        <el-col :span="12" style="padding-inline: 0;">
                        <el-input class="bpa-form-control" v-model="currentEditData.id_interno" placeholder="ID Interno" @input="" > </el-input>
                        </el-col>
                    </el-col>
                </el-row>
                
                <div class="internacion-edit-view" v-if="currentEditData.ingreso_id">
                    <template>
                      <el-card class="box-card" shadow="hover">
                        <!-- CABECERA DE LA TARJETA -->
                        <div slot="header" class="card-header">
                          <div class="patient-title">
                            <i class="el-icon-user-solid patient-icon"></i>
                            <span class="patient-name">{{ currentEditData.customer_name || ''}}</span>
                            <span class="patient-subtitle">(Paciente)</span>
                          </div>
                          <!-- Etiqueta de estado dinámica  size="small"-->
                          <div style="float: right; display: flex;flex-wrap: wrap;">
                            <?php /** 
                            <el-select v-model="currentEditData.estado" >
                                <el-option v-for="item in internacion_status_list" v-if="item.show" :key="item.value" :label="item.text" :value="item.value"></el-option>
                            </el-select>                            
                            <el-tag :type="getStatusType(currentEditData.estado)" effect="dark">{{ getStatusType(currentEditData.estado,'text') }}</el-tag> <!-- internacion_status_list.find(val=> currentEditData.estado == val.value).text || '' -->
                            */ ?>
                            
                            
                            <el-tag class="tag-with-select" :type="getStatusType(currentEditData.estado)" effect="dark">
                                <el-select v-model="currentEditData.estado" placeholder="Seleccione" style="max-width: 140px;">
                                    <el-option v-for="item in internacion_status_list" v-if="item.show" :key="item.value" :label="item.text" :value="item.value"></el-option>
                                </el-select>
                            </el-tag> 
                          </div>
                          
                        </div>
                    
                        <!-- CUERPO DE LA TARJETA (Distribución en filas y columnas) -->
                        <div class="card-body">
                          <!-- FILA 1: Tiempos e Ingreso -->
                          <el-row :gutter="24" class="info-row">
                            <el-col :xs="24" :sm="12" :md="6" style="padding-right: 0;">
                              <div class="info-item">
                                <span class="label"><i class="el-icon-date"></i> Fecha ingreso: </span>
                                <span class="value info-value-highlight" style="">
                                {{ extractDateTime(currentEditData.fecha_ingreso, 'fecha hora') }}
                                </span><!--2026/07/07 08:30-->
                              </div>
                            </el-col>
                            <el-col :xs="24" :sm="12" :md="9">
                              <div class="info-item">
                                <span class="label"><i class="el-icon-s-home"></i> Área de Hospitalización: </span>
                                <span class="value"> <!-- @keyup.enter.native="($event)=>{ console.log($event, search_area_list); if($event.target && $event.target.value){ currentEditData.movimientos[0].area = $event.target.value; if( $event.target.closest('.el-select').__vue__ ){ }else{$refs.sel_intArea.handleClose()} } }" -->
                                    <el-select ref="sel_intArea" class="bpa-form-control" v-model="currentEditData.movimientos[0].area" 
                                    style="max-width: 100%;" @change="($event)=>{ if(!search_area_list.includes($event)) search_area_list.push($event) }"
                                    default-first-option filterable allow-create placeholder="escriba Area/Sector" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
                                        <!--<el-option value=""></el-option>-->
                                        <el-option v-for="area in search_area_list" :key="area" :label="area" :value="area"></el-option>
                                    </el-select>
                                </span><!--Clínica Médica-->
                              </div>
                            </el-col>
                            <el-col :xs="24" :sm="12" :md="9">
                              <div class="info-item">
                                <span class="label" style="display: inline-flex;align-items: center;">
                                    <i class="el-icon-office-building"></i> Habitación - Cama: 
                                    <el-button type="text" @click="$alert('Aún no disponible')" style="padding: 0;"> mapa </el-button><!--Ubicación:-->
                                </span>
                                <span class="value" style="text-align: center;">
                                    <el-row :gutter="24" type="flex" style="align-items: center;">
                                        <el-col :span="12">
                                            <el-select class="bpa-form-control" v-model="currentEditData.movimientos[0].sala" 
                                            filterable allow-create placeholder="A24" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
                                                <el-option value=""></el-option>                                                
                                            </el-select>
                                            
                                        </el-col>
                                        
                                        <el-col :span="1">
                                            <strong> - </strong>
                                        </el-col>
                                        
                                        <el-col :span="11">
                                            <el-select class="bpa-form-control" v-model="currentEditData.movimientos[0].cama" 
                                            filterable allow-create placeholder="2" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
                                                <el-option value=""></el-option>                                                
                                            </el-select>
                                        </el-col>
                                    
                                    </el-row>
                                                                        
                                </span><!--Sala A34 - Cama 2-->
                              </div>
                            </el-col>
                          </el-row>
                    
                          <el-divider></el-divider>
                    
                          <!-- FILA 2: Personal Médico -->
                          <el-row :gutter="20" class="info-row">
                            <el-col :xs="24" :sm="12">
                              <div class="info-item">
                                <span class="label">Médico ingreso:</span>
                                <span class="value info-value-highlight">ejemplo TEST</span>
                              </div>
                            </el-col>
                            <el-col :xs="24" :sm="12">
                              <div class="info-item">
                                <span class="label">Médico encargado:</span>
                                <span class="value ">
                                    <el-select class="bpa-form-control" v-model="currentEditData.medico_encargado" filterable 
                					placeholder="Médico Encargado"
                					:popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
                						<el-option v-for="item in (($exp_default_data_fields||{}).search_staff_member_list || [])" :key="item.value" :label="item.text" :value="item.value">	
                						</el-option>
                					</el-select>
                                </span>
                              </div>
                            </el-col>
                          </el-row>
                    
                          <el-divider></el-divider>
                    
                          <!-- FILA 3: Egreso y Destino -->
                          <el-row :gutter="20" class="info-row footer-info">
                            <el-col :xs="12" :sm="12">
                              <div class="info-item text-center-mobile">
                                <span class="label">Egreso:</span>
                                <span class="value text-empty">
                                    <el-form-item  prop="fecha_egreso">						
                						<el-date-picker format="yyyy/MM/dd HH:mm:ss" value-format="yyyy-MM-ddTHH:mm:ss" placeholder="Ingrese fecha y Hora aaaa/mm/dd hh:mm:ss" v-model="currentEditData.fecha_egreso" class="bpa-form-control bpa-form-control--date-picker" prefix-icon="" type="datetime"  ></el-date-picker>
                					</el-form-item>
                                </span>
                              </div>
                            </el-col>
                            <el-col :xs="12" :sm="12">
                              <div class="info-item text-center-mobile">
                                <span class="label">Destino:</span>
                                <span class="value text-empty">
                                    <el-input class="bpa-form-control" v-model="currentEditData.destino" placeholder="Describe antecedentes actuales" type="textarea" :rows="1"></el-input>                                    
                                </span>
                              </div>
                            </el-col>
                          </el-row>
                        </div>
                      </el-card>
                    </template>
                    
                </div>
            </template>
            </el-form>
        
            <div slot="footer">
            
                <el-button 
                  type="cancel" 
                  icon="el-icon-back" 
                  title="cancelar"
                  class="bpa-btn"
                  @click="open_internacionEdit = false;currentEditData = {};">
                  <span>Volver</span>            
                </el-button>
                <el-button 
                  type="success" 
                  icon="el-icon-check" 
                  title="Guardar"
                  class="bpa-btn bpa-btn--primary"
                  @click="save_edit_internacionData">
                  <span>Guardar</span>            
                </el-button>
                <!--
                <el-button 
                  type="success" 
                  icon="el-icon-check" 
                  size="mini" 
                  circle
                  title="Guardar"              
                  @click="">              
                </el-button>
                -->
            </div>
        </template>
        <template v-else>
            <div style="text-align: center;">
                <h3>Falta Id de ingreso</h3>
            </div>
        </template>
    </el-dialog>
     
    
    
  </div>
  
</template>
</div>