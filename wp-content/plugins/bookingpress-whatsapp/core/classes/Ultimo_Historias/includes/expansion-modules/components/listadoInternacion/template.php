<div class="exp-listado-internacion" style="padding: 15px 0;background: rgb(255, 255, 255);/* border: 1px solid rgb(204, 208, 212); */box-sizing: border-box;width: 100%;">
<template>
  <div class="hospitalization-container" style="position: relative; display: flex; flex-direction: column;">
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
                <el-button type="primary" class="bpa-btn bpa-btn--primary" icon="el-icon-plus" @click="openExternalSection('internacionIngreso', 0 )/*location.hash = 'internacionIngreso'*/">
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
    
    <!--<el-card  class="box-card">-->
    
    
      <!-- Encabezado y Buscador -->
<!--
      <div slot="header" style="width: 100%;text-align: center;">
        <h2>Listado</h2>                       
      </div>
-->

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
<div class="bpa-table-container">
      
      <div class="bpa-tc__wrapper" v-show="!tableData.length && !loading">
            <el-row type="flex" v-show="!tableData.length && !loading">
				<el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
					<div class="bpa-data-empty-view">
						<div class="bpa-ev-left-vector">
							<picture>
								<source srcset="<?php echo esc_url( BOOKINGPRESS_IMAGES_URL . '/data-grid-empty-view-vector.webp' ); ?>" type="image/webp">
								<img src="<?php echo esc_url( BOOKINGPRESS_IMAGES_URL . '/data-grid-empty-view-vector.png' ); ?>">
							</picture>
						</div>
						<div class="bpa-ev-right-content">
							<h4><?php esc_html_e( 'No Record Found!', 'bookingpress-appointment-booking' ); ?></h4>						
							<?php /**
                            <el-button class="bpa-btn bpa-btn--primary bpa-btn__medium" @click="open_add_appointment_modal()" v-if="bookingpress_manage_appointment == 1"> 						
								<span class="material-icons-round">add</span> 
								<?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?>
							</el-button>
                            */ ?>
						</div>
					</div>
				</el-col>
			</el-row>
      </div>
      <!-- Tabla de Datos  stripe -->
      <div class="bpa-tc__wrapper" v-show="tableData.length">
      <el-table
        class="bpa-manage-appointment-items"
        :data="filteredHospitalizations"
        ref="multipleTable"
        style="width: 100%"
        v-loading="loading"        
        border>
        
        <el-table-column type="expand">
		  <template slot-scope="scope">
            </template>
        </el-table-column>
        <el-table-column type="selection" width="20"></el-table-column>

        <el-table-column prop="ingreso_id" label="ID" width="100" align="center"></el-table-column>
        
        <el-table-column label="Fecha" width="100" align="center" sortable sort-by='fecha_ingreso'>
            <template slot-scope="scope">
                <span class="int-fecha" style="padding: 2px;">{{ extractDateTime(scope.row.fecha_ingreso, 'humano') }}</span>                
            </template>
        </el-table-column>
        
        <el-table-column prop="customer_name" label="Paciente" min-width="140" sortable sort-by='customer_name'>
          <template slot-scope="scope">
            <span style="padding: 2px;"> <i class="el-icon-user"></i> {{ scope.row.customer_name }} </span>  
          </template>
        </el-table-column>
        
        <el-table-column  label="Médico" width="160" sortable sort-by='medico_name'>
            <template slot-scope="scope">
                <span style="padding: 2px;"> {{ ( Number(scope.row.medico_name)!= 0? scope.row.medico_name :( scope.row.medico_ingreso_name || '') ) }} </span>
            </template>
        </el-table-column>
        
        <el-table-column label="Área" width="160" align="center" sortable sort-by='area_desc'>
            <template slot-scope="scope">
                <span class="int-sala" v-if="scope.row.movimientos?.length">{{ scope.row.area_desc}}</span>
                <span class="int-sala" v-else>Sin asignar</span>
            </template>
        </el-table-column>
                
        <!--
        <el-table-column label="Habitación" width="120" align="center">
            <template slot-scope="scope">
                <span class="int-sala" v-if="scope.row.movimientos?.length">{{ scope.row.movimientos[0].sala}}</span>
                <span class="int-sala" v-else>Sin asignar</span>
            </template>
        </el-table-column>
        -->
        
        <!--<el-table-column prop="diagnosis" label="Diagnóstico" min-width="200"></el-table-column>-->
        
        <!-- Columna con Tags para el Estado -->
        <el-table-column label="Estado" width="150" align="center" >
          <template slot-scope="scope">
            <el-tag
              :type="getStatusType(scope.row.estado)"
              effect="dark"
              class="int-status-tag">
              {{ getStatusType(scope.row.estado,'text') }}
            </el-tag>
          </template>
        </el-table-column>

        <!-- Acciones -->
        <el-table-column label="Acciones" width="180" align="center">
          <template slot-scope="scope"> <!-- circle  class="bpa-btn bpa-btn--icon-without-box" -->
            <span></span>
            <div class="bpa-table-actions-wrap">
            <div class="bpa-table-actions">
                <el-button 
                  type="default" 
                  icon="el-icon-edit" 
                  size="mini" 
                  circle
                  title="Ver Detalles"
                  @click="handleView(scope.row)">
                </el-button>
                <!--
                <el-button 
                  type="success" 
                  icon="el-icon-check" 
                  size="mini" 
                  circle
                  title="Dar Alta"
                  v-if="Array( '1' ,'Internado').includes(scope.row.estado)"
                  @click="handleDischarge(scope.row)">
                </el-button>-->
                <el-button 
                  type="danger" 
                  icon="el-icon-delete" 
                  size="mini" 
                  circle
                  title="Cancelar"
                  @click="handleDelete(scope.row)">
                </el-button>
            </div>
            </div>
          </template>
        </el-table-column>        

      </el-table>
      </div>      
      
      
      <!-- Agregar PAGINACION -->
      <el-row class="bpa-pagination" type="flex" v-if="tableData.length > 0"> <!-- Pagination -->
			<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" >
				<div class="bpa-pagination-left">
                    <p><?php esc_html_e('Showing', 'bookingpress-appointment-booking'); ?> <strong><u>{{ tableData.length }}</u></strong>&nbsp;<?php esc_html_e('out of', 'bookingpress-appointment-booking'); ?>&nbsp;<strong>{{ tableTotal }}</strong></p>
					<div class="bpa-pagination-per-page">
                        <p><?php esc_html_e('Per Page', 'bookingpress-appointment-booking'); ?></p>
						<el-select v-model="pagination_length_val" placeholder="Select" @change="changePaginationSize($event)" class="bpa-form-control" popper-class="bpa-pagination-dropdown">
							<el-option v-for="item in pagination_val" :key="item.text" :label="item.text" :value="item.value"></el-option>
						</el-select>
					</div>
				</div>
			</el-col>
			<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" class="bpa-pagination-nav">
				<el-pagination @size-change="handleSizeChange" @current-change="handleCurrentChange" :current-page.sync="currentPage" layout="prev, pager, next" :total="tableTotal" :page-sizes="pagination_length" :page-size="perPage"></el-pagination>
			</el-col>
            <?php /**
            <!--
			<el-container v-if="( bookingpress_manage_appointment == 1 || bookingpress_delete_appointment == 1) && multipleSelection.length > 0" class="bpa-default-card bpa-bulk-actions-card" >
				<el-button class="bpa-btn bpa-btn--icon-without-box bpa-bac__close-icon" @click="closeBulkAction">
					<span class="material-icons-round">close</span>
				</el-button>
				<el-row type="flex" class="bpa-bac__wrapper">
					<el-col class="bpa-bac__left-area" :xs="24" :sm="12" :md="12" :lg="12" :xl="12">
						<span class="material-icons-round">check_circle</span>
						<p>{{ multipleSelection.length }}<?php esc_html_e( ' Items Selected', 'bookingpress-appointment-booking' ); ?></p>
					</el-col>
					<el-col class="bpa-bac__right-area" :xs="24" :sm="12" :md="12" :lg="12" :xl="12">
							<el-select class="bpa-form-control" v-model="bulk_action" placeholder="<?php esc_html_e( 'Select', 'bookingpress-appointment-booking' ); ?>" v-if="bookingpress_manage_appointment == 1 && bookingpress_delete_appointment == 0">
								<el-option-group v-for="bulk_option_data in bulk_options" :key="bulk_option_data.label" :label="bulk_option_data.label" :value="bulk_option_data.label">
									<el-option v-for="bulk_action_data in bulk_option_data.bulk_actions" :label="bulk_action_data.text" :value="bulk_action_data.value" v-if="bulk_action_data.value != 'delete'"></el-option>
								</el-option-group>
							</el-select>
							<el-select class="bpa-form-control" v-model="bulk_action" placeholder="<?php esc_html_e( 'Select', 'bookingpress-appointment-booking' ); ?>" v-else-if="bookingpress_manage_appointment == 0 && bookingpress_delete_appointment == 1">
								<el-option-group v-for="bulk_option_data in bulk_options" :key="bulk_option_data.label" :label="bulk_option_data.label" :value="bulk_option_data.label" v-if="bulk_option_data.value != 'change_status'">
									<el-option v-for="bulk_action_data in bulk_option_data.bulk_actions" :label="bulk_action_data.text" :value="bulk_action_data.value" v-if="bulk_action_data.value == 'delete' || bulk_action_data.value == 'bulk_action'"></el-option>
								</el-option-group>
							</el-select>					
							<el-select class="bpa-form-control" v-model="bulk_action" placeholder="<?php esc_html_e( 'Select', 'bookingpress-appointment-booking' ); ?>" v-else>
								<el-option-group v-for="bulk_option_data in bulk_options" :key="bulk_option_data.label" :label="bulk_option_data.label" :value="bulk_option_data.label">
									<el-option v-for="bulk_action_data in bulk_option_data.bulk_actions" :label="bulk_action_data.text" :value="bulk_action_data.value"></el-option>
								</el-option-group>
							</el-select>							
						<el-button @click="bulk_actions()" class="bpa-btn bpa-btn--primary bpa-btn__medium">
							<?php esc_html_e( 'Go', 'bookingpress-appointment-booking' ); ?>
						</el-button>
					</el-col>
				</el-row>
			</el-container>	
            -->	
            */ ?>	
		</el-row>
</div>

    <!--</el-card>-->
    
    
     <!-- open_internacionEdit -->
     <?php /**
     <el-dialog v-show="open_internacionEdit" :visible.sync="open_internacionEdit" :custom-class=" 'internacion-modal-view bpa--is-page-non-scrollable-mob ' " :fullscreen="false" :modal-append-to-body="false" :close-on-press-escape="true" style="width: 100%;z-index: 2142;display: flex;justify-content: center;align-items: center;top:unset;overflow:visible;"><!-- "bpa-dialog bpa-dialog--fullscreen  bpa--is-page-non-scrollable-mob" " :modal-append-to-body="false" " -->
     */ ?>
     <el-dialog v-show="open_internacionEdit" :title="'Datos de Internación '/*+(currentEditData && currentEditData.ingreso_id?'#'+currentEditData.id:'')*/" :visible.sync="open_internacionEdit" :custom-class=" 'internacion-modal-view bpa--is-page-non-scrollable-mob ' " :fullscreen="false" :modal-append-to-body="false" :close-on-press-escape="true" style="width: auto;z-index: 2142;display: flex;justify-content: center;align-self:center;"><!-- "bpa-dialog bpa-dialog--fullscreen  bpa--is-page-non-scrollable-mob" " :modal-append-to-body="false" " -->
        <template v-if="open_internacionEdit && currentEditData && currentEditData.ingreso_id" >
            <el-form ref="internacionEdit" rules="" :model="currentEditData" @validate="" label-position="top" style="background: var(--bpa-gt-gray-100);padding: 10px 20px;" @submit.native.prevent>
            <template>
            
                <div class="bpa-db-sec-heading" style="padding: 10px 20px;"> 
					<el-row type="flex" align="middle">
						<el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12">
							<div class="db-sec-left">
								<h2 class="bpa-page-heading">Datos de ingreso</h2>
							</div>
						</el-col>							
					</el-row>
				</div>
                
                <div class="bpa-default-card bpa-db-card" style="padding: 0px;">
                <el-card class="box-card" shadow="hover" style="border-radius:8px;">
                <el-row :gutter="24" type="flex" align="center" style="width: 100%;padding-bottom: 10px;gap:10px;align-items: center;margin-inline: 0;display: inline-flex;justify-content: space-between;">
                    <?php /*
                    <el-col  :xs="0"  :md="2" :lg="2" :xl="2" style="text-align: center;"> <div style="width: 100%;border-bottom: 1px dotted currentColor;"></div>  </el-col>
                    
                    <el-col :xs="24"  :md="24" :lg="24" :xl="24" style="align-items: center;gap: 10px;justify-content: space-between;">
                        */ ?>
                        <el-col :span="8" style="text-align: left;">
                        <strong style="margin-right: 5px;">Numero de Ingreso: #{{currentEditData.ingreso_id}} </strong>
                        </el-col>
                        
                        <el-col :span="16" style="padding-inline: 0;" align="right">
                            <el-button style="width: 25%;" type="small" class="bpa-btn bpa-btn bpa-btn__medium bpa-btn bpa-btn--secondary" @click="location.hash = 'internacionIngreso/'+currentEditData.ingreso_id">
                            ir <!--<i class="el-icon-view"></i>-->
                            </el-button>
                            <el-button style="width: 25%;" type="small" class="bpa-btn bpa-btn bpa-btn__medium bpa-btn--primary" @click="openExternalSection('internacionIngreso', currentEditData.ingreso_id )" >ver ingreso</el-button>                            
                            
                        </el-col>
                        <?php /*
                    </el-col>
                    
                    <el-col  :xs="0"  :md="2" :lg="2" :xl="2"  style="text-align: center;"> <div style="width: 100%;border-bottom: 1px dotted currentColor;"></div>  </el-col>
                    */ ?>
                </el-row>
                
                <el-row :gutter="24" type="flex" align="right" style="padding-bottom: 10px;gap:20px;align-items: center;">
                    <el-col :span="8" style="display: flex;flex-wrap: wrap;"></el-col>
                    
                    <el-col :span="16"  style="display: inline-flex;align-items: center;gap: 10px;justify-content: space-between;">
                        <el-col :span="10" style="text-align: left;">
                        <span> ID Interno: </span>
                        </el-col>
                        <el-col :span="14" style="padding-inline: 0;">
                        <el-input class="bpa-form-control" v-model="currentEditData.id_interno" placeholder="ID Interno de UME" @input="" > </el-input>
                        </el-col>
                    </el-col>
                </el-row>
                </el-card>
                </div>
                
                <div class="bpa-db-sec-heading" style="padding: 10px 20px;">
					<el-row type="flex" align="middle">
						<el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12">
							<div class="db-sec-left">
								<h2 class="bpa-page-heading">Estado de Internación</h2>
							</div>
						</el-col>							
					</el-row>
				</div>
                
                <div class="internacion-edit-view" v-if="currentEditData.ingreso_id" style="padding: 0px;">
                    <template>
                      <el-card class="box-card" shadow="hover">
                        <!-- CABECERA DE LA TARJETA -->
                        <div slot="header" class="card-header" style="border: 2px solid #fff;">
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
                            <el-col :xs="24" :sm="12" :md="12" style="padding-right: 0;">
                              <div class="info-item">
                                <span class="label"><i class="el-icon-date"></i> Fecha ingreso: </span>
                                <span class="value info-value-highlight" style="">
                                {{ extractDateTime(currentEditData.fecha_ingreso, 'fecha hora') }}
                                </span><!--2026/07/07 08:30-->
                              </div>
                            </el-col>
                            <el-col :xs="24" :sm="12" :md="12">
                              <div class="info-item">
                                <span class="label"><i class="el-icon-s-home"></i> Área de Hospitalización: </span>
                                <span class="value"> <!-- @keyup.enter.native="($event)=>{ console.log($event, search_area_list); if($event.target && $event.target.value){ currentEditData.movimientos[0].area = $event.target.value; if( $event.target.closest('.el-select').__vue__ ){ }else{$refs.sel_intArea.handleClose()} } }" -->
                                    <!-- @change="($event)=>{ if(!search_area_list.includes($event)) search_area_list.push($event) }" -->
                                    <el-select ref="sel_intArea" class="bpa-form-control" v-model="currentEditData.movimientos[0].area" 
                                    style="max-width: 100%;" 
                                    default-first-option filterable allow-create placeholder="escriba Area/Sector" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
                                        <!--<el-option value=""></el-option>-->
                                        <el-option v-for="area in search_area_list" :key="area" :label="area" :value="area"></el-option>
                                    </el-select>
                                </span><!--Clínica Médica-->
                              </div>
                            </el-col>
                            <el-col :xs="24" :sm="24" :md="24">
                              <div class="info-item">
                                <span class="label" style="display: inline-flex;align-items: center;justify-content: space-between;">
                                    <span><i class="el-icon-office-building"></i> Habitación </span><span>Cama </span>
                                    <el-button type="text" @click="$alert('Aún no disponible')" style="padding: 0;"> mapa </el-button><!--Ubicación:-->
                                </span>
                                <span class="value" style="text-align: center;">
                                    <el-row :gutter="24" type="flex" style="align-items: center;">
                                        <el-col :span="12">
                                            <el-select class="bpa-form-control" v-model="currentEditData.movimientos[0].sala" 
                                            default-first-option filterable allow-create placeholder="A24" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
                                                <el-option value=""></el-option>                                                
                                            </el-select>
                                            
                                        </el-col>
                                        
                                        <el-col :span="12">
                                            <el-select class="bpa-form-control" v-model="currentEditData.movimientos[0].cama" 
                                            default-first-option filterable allow-create placeholder="2" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
                                                <el-option value=""></el-option>                                                
                                            </el-select>
                                        </el-col>
                                    
                                    </el-row>
                                                                        
                                </span><!--Sala A34 - Cama 2-->
                              </div>
                            </el-col>
                          </el-row>
                          
                          <?php /**
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
                                <span class="label" style="display: inline-flex;align-items: center;justify-content: space-between;">
                                    <span><i class="el-icon-office-building"></i> Habitación - Cama: </span>
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
                          */ ?>
                    
                          <el-divider></el-divider>
                    
                          <!-- FILA 2: Personal Médico -->
                          <el-row :gutter="20" class="info-row">
                            <el-col :xs="24" :sm="12">
                              <div class="info-item">
                                <span class="label">Médico ingreso:</span>
                                <span class="value info-value-highlight"> {{currentEditData.medico_ingreso_name}} </span>
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
                                        <el-option v-if="currentEditData.medico_encargado && !(($exp_default_data_fields||{}).search_staff_member_list || []).some(opt=> opt.value == currentEditData.medico_encargado)" 
                                        :label="'El Id ('+currentEditData.medico_encargado+') No se encuentra o ya no forma parte de los médicos'" 
                                        :key="currentEditData.medico_encargado" :value="currentEditData.medico_encargado" disabled></el-option>
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
                                    <el-input class="bpa-form-control" v-model="currentEditData.destino" placeholder="Domicilio/Nombre Hospital derivado..." type="textarea" :rows="1"></el-input>                                    
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
                  title="Guardar"
                  class="bpa-btn bpa-btn--primary"
                  @click="save_edit_internacionData">
                  <span>Guardar                     
                    <i class="el-icon-loading" v-if="internacionSaveBtnLoad"></i> 
                    <i class="el-icon-check" v-else></i> 
                  </span>            
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
    
    <!-- /*width: 100%;z-index: 2142;display: flex;justify-content: center;align-items: center;*/ -->
    <el-dialog v-show="open_external_section" title="Ingreso de Iternación" :visible.sync="open_external_section" :custom-class=" 'ingreso-modal-view bpa--is-page-non-scrollable-mob ' " :fullscreen="false" :modal-append-to-body="true" :close-on-press-escape="true" 
    style="
    z-index: 2018;justify-content: center;position: fixed;min-width: min(400px, 100%);box-sizing: border-box;flex: 0 0 100%;align-self: center;padding-bottom: 20px;backdrop-filter: blur(0.8px);left: anchor(--int-app-container left);right: anchor(--int-app-container right);
    background-color: #00000005;
    " >
    <!-- 
    /* display: flex;width: auto;z-index: 2009;justify-content: center;position: fixed;inset: 0px auto;margin-top: 15vh;width: auto;min-width: min(400px, 100%);box-sizing: border-box;*/  
    /* display: flex; *//* width: 100%; */z-index: 2020;/* justify-content: center; */position: fixed;inset: 0px auto;margin-top: 10vh;min-width: min(400px, 100%);box-sizing: border-box;top: 0;/* float: right; */background: #00000003;bottom: 0px;height: 90vh;/* min-height: 100vh; */z-index: 9999 !important;/* align-items: stretch; */flex-direction: row;flex-basis: 10%;/* padding: 10px 0; */
    
    z-index: 2044;justify-content: center;position: fixed;inset: 0px auto;padding-top: 10vh;min-width: min(1000px, 100%);box-sizing: border-box;height: 100vh;flex: 0 0 100%;align-self: center;padding-bottom: 5vh;background: #00000003;backdrop-filter: blur(0.8px); 
    -->
        <async-max ref="dialogSection" :props-data="external_section_data" :tab="'internacionIngreso'" :key="'internacionIngreso_'+external_section_data.int_form_number" style="width: 100%;min-width: min(1200px, 100%);" ></async-max>
    </el-dialog>
    
  </div>
  
</template>
</div>