<div class="el-card" style="padding: 15px 30px;background: rgb(255, 255, 255);border: 0px solid rgb(204, 208, 212);width: 100%;box-sizing: border-box;">
<el-form class="bpa-add-appointment-form" ref="ingreso_formdata" :rules="rules" :model="ingreso_formdata" label-position="top" @submit.native.prevent>
<template>
    <div class="scoped_styles2" style="display: none;" v-pre></div>

<?php 
/**
        <div class="ume-wrap">
            <h3>Seleccionar Paciente</h3>
           <div class="el-card">            
        
                <div class="bpa-table-filter">                
        			<el-row type="flex" :gutter="24">
                    
                        <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">											
							<el-form-item prop="selected_customer">
								<template #label>
									<span class="bpa-form-label" style="margin-bottom: 20px;"><?php esc_html_e( 'Select Customer', 'bookingpress-appointment-booking' ); ?></span>
								</template>
								<el-select class="bpa-form-control" name="selected_customer" v-model="ingreso_formdata.selected_customer"  @change="bookingpress_select_customer($event)" filterable placeholder="<?php esc_html_e( 'Start typing to fetch Customer', 'bookingpress-appointment-booking' ); ?>" remote reserve-keyword :remote-method="bookingpress_get_customer_list" :loading="bookingpress_loading"  popper-class="bpa-el-select--is-with-modal" v-cancel-read-only>												
									<el-option value="add_new" label="<?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?>" v-if="config.bookingpress_edit_customers == 1">
										<i class="el-icon-plus" ></i>
										<span><?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?></span>
									</el-option>
									<el-option v-for="customer_data in ingreso_customers_list" :key="customer_data.value" :label="customer_data.text" :value="customer_data.value">
										<span>{{ customer_data.text }}</span>
									</el-option>													
                                </el-select>  												
							</el-form-item>
						</el-col>

<!--
                    <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
    					<span class="bpa-form-label"><?php echo esc_html_e( 'Nombre del Paciente o Dni', 'bookingpress-appointment-booking' );#esc_html_e( 'Customer Name', 'bookingpress-appointment-booking' ); ?></span>	
    					<el-select class="bpa-form-control" v-model="search_customer_name" multiple filterable collapse-tags placeholder="<?php esc_html_e( 'Start typing to fetch Customer', 'bookingpress-appointment-booking' ); ?>" remote reserve-keyword	 :remote-method="bookingpress_get_search_customer_list" :loading="bookingpress_loading" :popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
    						<el-option v-for="item in search_customer_list" :key="item.value" :label="item.text" :value="item.value"></el-option>
    					</el-select>
    				</el-col>
                    
        				<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12">
                            <el-input class="bpa-form-control" v-model="customerSearch" placeholder="<?php esc_html_e('Search customer', 'bookingpress-appointment-booking'); ?>"></el-input>
        				</el-col>
                        
--> 
        				<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12">
        					<div class="bpa-tf-btn-group">
        						<el-button class="bpa-btn bpa-btn__medium bpa-btn--full-width" @click="resetFilter">
        							<?php esc_html_e( 'Reset', 'bookingpress-appointment-booking' ); ?>
        						</el-button>
                                <!--
        						<el-button class="bpa-btn bpa-btn__medium bpa-btn--primary bpa-btn--full-width" @click="loadCustomers">
        							<?php esc_html_e( 'Apply', 'bookingpress-appointment-booking' ); ?>
        						</el-button>
                                -->
        						<el-button class="bpa-btn bpa-btn--primary" @click="bookingpress_select_customer( ingreso_formdata.selected_customer || 'add_new' )"> 
                					<span class="material-icons-round">add</span> 
                					<?php esc_html_e( 'Asignar Paciente', 'bookingpress-appointment-booking' ); ?>
                				</el-button>
        					</div>											
        				</el-col>				
        			</el-row>
        		</div>
          </div> 
        </div>
        
*/ ?>
        <div class="ume-wrap">
            <div v-if="!config.formato_two" shadow="never" style="margin-inline: 40px; margin-bottom: 20px;">
               <el-row :gutter="24" type="flex">
                <el-col :span="7">
                    Fecha: {{ ingreso_formdata.datetime? moment(ingreso_formdata.datetime).format("YYYY/MM/DD") : 'Sin asignar'}} 
                </el-col>
                <el-col :span="7">
                    Hora: {{ ingreso_formdata.datetime? moment(ingreso_formdata.datetime).format("HH:mm:ss") : 'Sin asignar'}}                    
                </el-col>
                <el-col :span="10">
                    Médico: {{ingreso_formdata.medico_name || ''}}
                </el-col>
               </el-row>
           </div>
           
           <el-row>            
            <!--
                <el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12">
                    <h3 class="bpa-page-heading" style="margin-bottom: 10px;">Formulario de Ingreso</h3>
                </el-col>
                <el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12">
                    <h3 v-if="Number(ingreso_formdata.id)" class="bpa-page-heading" style="margin-bottom: 10px;">Nro. #{{}}</h3>
                    <h3 v-else class="bpa-page-heading" style="margin-bottom: 10px;">Nuevo</h3>
                </el-col>
           -->
                <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
                    <h3 class="bpa-page-heading" style="margin-bottom: 10px;">
                        <span><!--Formulario de -->Ingreso </span>
                        <span > 
                            <span v-if="Number(ingreso_formdata.id)" class="bpa-page-heading" style="color: var(--bpa-dt-black-300);"> Nro. #{{}} </span>
                            <span v-else class="bpa-page-heading" style="color: var(--bpa-dt-black-300);"> Nuevo </span>
                        </span>
                    </h3>
                </el-col>
           </el-row>
           
           <div v-if="config.formato_two" shadow="never" style="margin-inline: 40px; margin-bottom: 20px;">
               <el-row :gutter="24" type="flex">
                <el-col :span="7">
                    Fecha: {{ ingreso_formdata.datetime? moment(ingreso_formdata.datetime).format("YYYY/MM/DD") : 'Sin asignar'}} 
                </el-col>
                <el-col :span="7">
                    Hora: {{ ingreso_formdata.datetime? moment(ingreso_formdata.datetime).format("HH:mm:ss") : 'Sin asignar'}}
                    <el-form-item  prop="datetime">						
						<el-date-picker format="yyyy/MM/dd HH:mm:ss" value-format="yyyy-MM-ddTHH:mm:ss" placeholder="Ingrese fecha y Hora aaaa/mm/dd hh:mm:ss" v-model="ingreso_formdata.datetime" class="bpa-form-control bpa-form-control--date-picker" prefix-icon="" type="datetime"  ></el-date-picker>
					</el-form-item>
                </el-col>
                <el-col :span="10">
                    Médico: {{ingreso_formdata.medico_name || ''}}
                    <el-form-item prop="selected_staffmember">
                        <el-select class="bpa-form-control" v-model="ingreso_formdata.selected_staffmember" @change="ingreso_onChangeStaff" filterable collapse-tags 
    					placeholder="Seleccione Médico"
    					:popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
    						<el-option v-for="item in search_staff_member_list" :key="item.value" :label="item.text" :value="item.value">	
    						</el-option>
    					</el-select>
                        <?php /**
						<el-select class="bpa-form-control" placeholder="<?php esc_html_e('Select', 'bookingpress-appointment-booking'); ?><?php echo " ".esc_html($bookingpress_singular_staffmember_name); ?>" filterable v-model="ingreso_formdata.selected_staffmember" @change="bookingpress_change_staff" >
							<el-option value=""><?php esc_html_e('Select', 'bookingpress-appointment-booking'); ?><?php echo " ".esc_html($bookingpress_singular_staffmember_name); ?></el-option>
							<el-option :label="staff_member_details.profile_details.bookingpress_staffmember_firstname != '' && staff_member_details.profile_details.bookingpress_staffmember_lastname != '' ? staff_member_details.profile_details.bookingpress_staffmember_firstname+' '+staff_member_details.profile_details.bookingpress_staffmember_lastname+' ( '+staff_member_details.staff_price_with_currency+' )' : staff_member_details.profile_details.bookingpress_staffmember_email+' ( '+staff_member_details.staff_price_with_currency+' )'" :value="staff_member_details.profile_details.bookingpress_staffmember_id" v-for="staff_member_details in bookingpress_loaded_staff[appointment_formdata.appointment_selected_service]" v-if="typeof staff_member_details.profile_details != 'undefined'"></el-option>
						</el-select>
                        */ ?>
					</el-form-item>
                </el-col>
               </el-row>
           </div>
           
           <div v-if="!config.formato_two" shadow="never" style="margin-inline: 10px; margin-bottom: 20px;">
               <el-row :gutter="24" type="flex">
                <el-col :span="12">                    
                    <el-form-item label="Hora y Fecha"  prop="datetime">
						<el-date-picker format="yyyy/MM/dd HH:mm:ss" value-format="yyyy-MM-ddTHH:mm:ss" placeholder="Ingrese fecha y Hora aaaa/mm/dd hh:mm:ss" v-model="ingreso_formdata.datetime" class="bpa-form-control bpa-form-control--date-picker" prefix-icon="" type="datetime"  ></el-date-picker>
					</el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="Médico" prop="selected_staffmember">
                        <el-select class="bpa-form-control" v-model="ingreso_formdata.selected_staffmember" @change="ingreso_onChangeStaff" filterable collapse-tags 
    					placeholder="Seleccione Médico"
    					:popper-append-to-body="false" popper-class="bpa-el-select--is-with-navbar">
    						<el-option v-for="item in search_staff_member_list" :key="item.value" :label="item.text" :value="item.value">	
    						</el-option>
    					</el-select>
					</el-form-item>
                </el-col>
               </el-row>
           </div>
           <el-divider content-position="center"></el-divider>
          
          
          <el-collapse class="int-form-collapse"  v-model="formCollapseActiveNames" @change="handleChangeFormCollapse" :accordion="false">
          
              <el-collapse-item title="1. Paciente" name="1">
                  <template #title>          
                    <div class="sec-icon">
                        <span class="material-icons-round">person</span>
                    </div>
                    <span class="sec-title">1. DATOS DE FILIACIÓN</span>          
                  </template>
              
                <el-card v-if="formCollapseActiveNames.includes('1')" class="bpa-dialog--customer-modal bpa--is-page-non-scrollable-mob">
                    
                    <el-card class="asignar-paciente-header" >
                        <div class="bpa-table-filter" style="border: 0;">
                			<el-row type="flex" :gutter="24">
                            
                                <el-col :xs="24" :sm="24" :md="24" :lg="16" :xl="16">											
        							<el-form-item ref="sel_selected_customer_item" prop="selected_customer">
        								<template #label>
        									<span class="bpa-form-label" style="margin-bottom: 20px;"><?php esc_html_e( 'Select Customer', 'bookingpress-appointment-booking' ); ?></span>
        								</template><!--v-cancel-read-only-->
        								<el-select ref="sel_selected_customer" class="bpa-form-control" name="selected_customer" v-model="ingreso_formdata.selected_customer"  @change="bookingpress_select_customer($event)" filterable placeholder="<?php esc_html_e( 'Start typing to fetch Customer', 'bookingpress-appointment-booking' ); ?>" remote reserve-keyword :remote-method="bookingpress_get_customer_list" :loading="bookingpress_loading"  popper-class="bpa-el-select--is-with-modal" >												
        									<el-option value="add_new" label="<?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?>"  v-if="config.bookingpress_edit_customers == 1">
        										<i class="el-icon-plus" ></i>
        										<span><?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?></span>
        									</el-option>
        									<el-option v-if="ingreso_customers_list && customer_data" v-for="customer_data in ingreso_customers_list" :key="customer_data.value" :label="customer_data.text" :value="customer_data.value">
        										<span>{{ customer_data.text }}</span>
        									</el-option>
                                        </el-select>  												
        							</el-form-item>
        						</el-col>
        
                				<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                					<div class="bpa-tf-btn-group">
                						<el-button class="bpa-btn bpa-btn__medium bpa-btn--full-width" @click="closeCustomerModal();resetFilter();">
                							<?php esc_html_e( 'Reset', 'bookingpress-appointment-booking' ); ?>
                						</el-button>
                                        <el-button class="bpa-btn bpa-btn--primary " :class="is_display_save_loader == '1' ? 'bpa-btn--is-loader' : ''" @click="saveCustomerDetails" :disabled="is_disabled" >
                                            <span class="bpa-btn__label" v-if="Number(customer.update_id)"><?php esc_html_e('Actualizar', 'bookingpress-appointment-booking'); ?></span>
                                            <span class="bpa-btn__label" v-else><?php esc_html_e('Agregar', 'bookingpress-appointment-booking'); ?></span>
                                            <div class="bpa-btn--loader__circles">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </el-button> 
                                        <!--
                						<el-button class="bpa-btn bpa-btn--primary" @click="bookingpress_select_customer( ingreso_formdata.selected_customer || 'add_new' )"> 
                        					<span class="material-icons-round">add</span> Asignar Paciente
                        				</el-button>
                                        -->
                					</div>											
                				</el-col>				
                			</el-row>
                		</div>
                
                    </el-card>
                    
                    <div class="asignar-paciente-body">
                        <div class="bpa-dialog-heading">
                            <el-row type="flex">
                            <div>
                                <h1 class="bpa-page-heading" v-if="customer.update_id == 0"><?php esc_html_e('Add Customer', 'bookingpress-appointment-booking'); ?></h1>
                                <h1 class="bpa-page-heading" v-else><?php esc_html_e('Actualizar datos del Paciente', 'bookingpress-appointment-booking'); ?></h1>
                            </div>
                            <!--
                                <el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
                                    <div>
                                        <h1 class="bpa-page-heading" v-if="customer.update_id == 0"><?php esc_html_e('Add Customer', 'bookingpress-appointment-booking'); ?></h1>
                                        <h1 class="bpa-page-heading" v-else><?php esc_html_e('Actualizar Paciente', 'bookingpress-appointment-booking'); ?></h1>
                                    </div>
                                    
                                </el-col>
                                <el-col :xs="12" :sm="12" :md="8" :lg="8" :xl="8" class="bpa-dh__btn-group-col">
                                    <el-button class="bpa-btn bpa-btn--primary " :class="is_display_save_loader == '1' ? 'bpa-btn--is-loader' : ''" @click="saveCustomerDetails" :disabled="is_disabled" >
                                        <span class="bpa-btn__label"><?php esc_html_e('Save', 'bookingpress-appointment-booking'); ?></span>
                                        <div class="bpa-btn--loader__circles">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </el-button> 
                                    <el-button class="bpa-btn" @click="closeCustomerModal()"><?php esc_html_e('Cancel', 'bookingpress-appointment-booking'); ?></el-button>
                                </el-col>
                            -->
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
                                           
                                        </div>            
                                        <div class="bpa-default-card bpa-db-card">
                                            <div style="margin-bottom: 20px;">
                                                <el-row :gutter="24">
                                                    
                                                </el-row>
                                            </div>
                                        
                                            <el-form ref="customer" :rules="customer_rules" :model="customer" @validate="onCustomerFormChange($event)" label-position="top" @submit.native.prevent>
                                                <template>                            
                                                    <el-row :gutter="24">
                                                        <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-form-group">
                                                            <el-upload class="bpa-upload-component" ref="avatarRef" action="<?php echo wp_nonce_url($bookingpress_ajaxurl . '?action=bookingpress_upload_customer_avatar', 'bookingpress_upload_customer_avatar'); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - esc_html is already used by wp_nonce_url function and it's false positive ?>" :on-success="bookingpress_upload_customer_avatar_func" :file-list="customer.avatar_list" multiple="false" :show-file-list="cusShowFileList" limit="1" :on-exceed="bookingpress_image_upload_limit" :on-error="bookingpress_image_upload_err" :on-remove="bookingpress_remove_customer_avatar" :before-upload="checkUploadedFile" drag>
                                                                <span class="material-icons-round bpa-upload-component__icon">cloud_upload</span>
                                                               <div class="bpa-upload-component__text" v-if="customer.avatar_url == ''"><?php esc_html_e('jpg/png files with a size less than 500kb', 'bookingpress-appointment-booking'); ?>                                           
                                                               </div>
                                                            </el-upload>
                                                            <div class="bpa-uploaded-avatar__preview"  v-if="customer.avatar_url != ''">
                                                                <button class="bpa-avatar-close-icon" @click="bookingpress_remove_customer_avatar">
                                                                    <span class="material-icons-round">close</span>
                                                                </button>
                                                                <el-avatar shape="square" :src="customer.avatar_url" class="bpa-uploaded-avatar__picture"></el-avatar>
                                                            </div>
                                                        </el-col>
                                                    </el-row>
                                                    <div class="bpa-form-body-row bpa-fbr--customer">
                                                        <el-row :gutter="32" type="flex">
                    
                                <div style="opacity: 0.3;width: 100%;">
                                                            <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                                                <el-form-item prop="wp_user">
                                                                    <template #label>
                                                                        <span class="bpa-form-label"><?php esc_html_e('WordPress User', 'bookingpress-appointment-booking'); ?></span>
                                                                    </template>
                    												<el-select class="bpa-form-control" v-model="customer.wp_user" filterable placeholder="<?php esc_html_e( 'Start typing to fetch user.', 'bookingpress-appointment-booking' ); ?>" @change="bookingpress_get_existing_user_details($event)"  remote reserve-keyword	 :remote-method="get_wordpress_users" :loading="bookingpress_loading">
                    													<el-option-group label="<?php esc_html_e( 'Create New User', 'bookingpress-appointment-booking' ); ?>">
                    														<template>
                    															<el-option value="add_new" label="Create New">
                    																<i class="el-icon-plus" ></i>
                    																<span><?php esc_html_e( 'Create New', 'bookingpress-appointment-booking' ); ?></span>
                    															</el-option>
                    														</template>
                    													</el-option-group>
                    													<el-option-group v-for="wp_user_list_cat in wpUsersList" :key="wp_user_list_cat.category" :label="wp_user_list_cat.category">
                    														<template>
                    															<el-option v-for="item in wp_user_list_cat.wp_user_data" :key="item.wp_user" :label="item.label" :value="item.value" >
                    																<span>{{ item.label }}</span>
                    															</el-option>
                    														</template>
                    													</el-option-group>
                    												</el-select>
                                                                </el-form-item>                                                
                                                            </el-col>                                        
                                                            <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8" v-if="customer.wp_user =='add_new'">
                                                                <el-form-item>
                                                                    <template #label>
                                                                        <span class="bpa-form-label"><?php esc_html_e('Password', 'bookingpress-appointment-booking'); ?></span>
                                                                    </template>
                                                                    <el-input class="bpa-form-control --bpa-fc-field-pass" type="password" v-model="customer.password" placeholder="<?php esc_html_e('Enter Password', 'bookingpress-appointment-booking'); ?>" :show-password="true" ></el-input>
                                                                </el-form-item>                                            
                                                            </el-col>
                                                            
                                                            <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                                                <el-form-item prop="username">
                                                                    <template #label>
                                                                        <span class="bpa-form-label"><?php esc_html_e('Username', 'bookingpress-appointment-booking'); ?></span>
                                                                    </template>
                                                                    <el-input class="bpa-form-control" v-model="customer.username" id="username" name="username" placeholder="<?php esc_html_e('Enter Username', 'bookingpress-appointment-booking'); ?>"></el-input>
                                                                </el-form-item>
                                                            </el-col>
                                </div>
                                                            
                    
                                                            <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                                                <el-form-item prop="firstname">
                                                                    <template #label>
                                                                        <span class="bpa-form-label"><?php esc_html_e('First Name', 'bookingpress-appointment-booking'); ?></span>
                                                                    </template>
                                                                    <el-input class="bpa-form-control" v-model="customer.firstname" id="firstname" name="firstname" placeholder="<?php esc_html_e('Enter First Name', 'bookingpress-appointment-booking'); ?>"></el-input>
                                                                </el-form-item>
                                                            </el-col>
                                                            <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                                                <el-form-item prop="lastname">
                                                                    <template #label>
                                                                        <span class="bpa-form-label"><?php esc_html_e('Last Name', 'bookingpress-appointment-booking'); ?></span>
                                                                    </template>
                                                                    <el-input class="bpa-form-control" v-model="customer.lastname" id="lastname" name="lastname" placeholder="<?php esc_html_e('Enter Last Name', 'bookingpress-appointment-booking'); ?>"></el-input>
                                                                </el-form-item>
                                                            </el-col>                                            
                                                            <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                                                <el-form-item prop="email">
                                                                    <template #label>
                                                                        <span class="bpa-form-label"><?php esc_html_e('Email', 'bookingpress-appointment-booking'); ?></span>
                                                                    </template>
                                                                    <el-input class="bpa-form-control" v-model="customer.email" id="email" name="email" placeholder="<?php esc_html_e('Enter Email', 'bookingpress-appointment-booking'); ?>"></el-input>
                                                                </el-form-item>
                                                            </el-col>
                                                            <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                                                <el-form-item prop="phone">
                                                                    <template #label>
                                                                        <span class="bpa-form-label"><?php esc_html_e('Phone', 'bookingpress-appointment-booking'); ?></span>
                                                                    </template>
                                                                    <vue-tel-input v-model="customer.phone" class="bpa-form-control --bpa-country-dropdown" @country-changed="bookingpress_phone_country_change_func($event)" v-bind="bookingpress_tel_input_props" ref="bpa_tel_input_field">
                                                                        <template v-slot:arrow-icon>
                                                                            <span class="material-icons-round">keyboard_arrow_down</span>
                                                                        </template>
                                                                    </vue-tel-input>
                                                                </el-form-item>
                                                            </el-col>            
                                                            
                    										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8" v-if="bookingpress_customer_fields.length > 0" :data-customer-field-id="bpa_cus_field.bookingpress_form_field_id" v-for="(bpa_cus_field, cfkey) in bookingpress_customer_fields"> 
                    											                                            
                                                                <el-form-item :prop="bpa_cus_field.bookingpress_field_meta_key" v-if=" 'obra_soc_seguros' != bpa_cus_field.bookingpress_field_meta_key " >
                    												<template #label>
                    													<span class="bpa-form-label">{{bpa_cus_field.bookingpress_field_label}}</span>
                    												</template>
                    												<el-input class="bpa-form-control" v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" :placeholder="bpa_cus_field.bookingpress_field_placeholder" v-if="'text' == bpa_cus_field.bookingpress_field_type"></el-input>
                    												<el-input class="bpa-form-control" :placeholder="bpa_cus_field.bookingpress_field_placeholder" v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" v-if="'textarea' == bpa_cus_field.bookingpress_field_type" type="textarea"></el-input>
                    												<template v-if="'checkbox' == bpa_cus_field.bookingpress_field_type">
                    													<el-checkbox v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key+'_'+keys]" class="bpa-form-label bpa-custom-checkbox--is-label" v-for="(chk_data,keys) in bpa_cus_field.bookingpress_field_values" :label="chk_data.value" :key="chk_data.value">{{chk_data.value}}</el-checkbox>
                    												</template>
                    												<template v-if="'radio' == bpa_cus_field.bookingpress_field_type">
                    													<el-radio v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" class="bpa-form-label bpa-custom-radio--is-label" v-for="(rdo_data,keys) in bpa_cus_field.bookingpress_field_values" :label="rdo_data.value" :key="rdo_data.value">{{rdo_data.value}}</el-radio>
                    												</template>
                    												<template v-if="'dropdown' == bpa_cus_field.bookingpress_field_type">
                    													<el-select  v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" class="bpa-form-control" :placeholder="bpa_cus_field.bookingpress_field_placeholder">
                    														<el-option v-for="sel_data in bpa_cus_field.bookingpress_field_values" :key="sel_data.value" :label="sel_data.label" :value="sel_data.value" ></el-option>
                    													</el-select>
                    												</template>
                                                                    <el-date-picker format="" placeholder="aaaa-mm-dd " v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" class="bpa-form-control bpa-form-control--date-picker" prefix-icon="" v-if="'date' == bpa_cus_field.bookingpress_field_type || 'datepicker' == bpa_cus_field.bookingpress_field_type" :type="'true' == bpa_cus_field.bookingpress_field_options.enable_timepicker ? 'datetime' : 'date'"  ></el-date-picker>
                                                                    
                    											</el-form-item>
                                                                
                                                                <el-form-item :prop="bpa_cus_field.bookingpress_field_meta_key" v-else >
                                                                    <template #label>
                    													<span class="bpa-form-label">{{bpa_cus_field.bookingpress_field_label}}</span>
                    												</template>
                                                                    <template >
                    													<el-select  v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" filterable allow-create class="bpa-form-control" :placeholder="bpa_cus_field.bookingpress_field_placeholder">
                    														<el-option v-for="sel_data in all_obras_y_seguros" :key="sel_data.value" :label="sel_data.label" :value="sel_data.value"  :disabled="sel_data.isDisabled || sel_data.$isDisabled " ></el-option>
                    													</el-select>
                    												</template>
                                                                </el-form-item>
                                                                
                    										</el-col>
                                                            
                                                            
                                                            <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                                                <el-form-item prop="note">
                                                                    <template #label>
                                                                        <span class="bpa-form-label"><?php esc_html_e('Note', 'bookingpress-appointment-booking'); ?></span>
                                                                    </template>
                                                                    <el-input class="bpa-form-control" type="textarea" :rows="3" v-model="customer.note"></el-input>
                                                                </el-form-item>
                                                            </el-col>
                                                        </el-row>
                                                    </div>
                                                </template>
                                            </el-form>
                                        </div>
                                    </el-col>
                                </el-row>
                            </div>
                            
                        </div>
                        
                        <el-row :gutter="32" type="flex" class="bpa-dialog-footer" style="text-align: right; padding-inline: 30px;">
                            <el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12">
                            </el-col>
                            <el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12">
                                <el-button v-if="Number(customer.update_id)" class="bpa-btn bpa-btn--secundary " @click="asignarCustomer('continuar')">
        							<?php esc_html_e( 'Continuar', 'bookingpress-appointment-booking' ); ?>
        						</el-button>
                                <el-button class="bpa-btn bpa-btn--primary " :class="is_display_save_loader == '1' ? 'bpa-btn--is-loader' : ''" @click="asignarCustomer('guardar')" :disabled="is_disabled" >
                                    <span class="bpa-btn__label" v-if="Number(customer.update_id)"><?php esc_html_e('Actualizar datos del Paciente', 'bookingpress-appointment-booking'); ?></span>
                                    <span class="bpa-btn__label" v-else><?php esc_html_e('Agregar', 'bookingpress-appointment-booking'); ?></span>
                                    <div class="bpa-btn--loader__circles">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </el-button> 
                            </el-col>
                        </el-row>                        
                        
                    </div>
                
                </el-card>                
                
              </el-collapse-item>
              
<div :class="{ inhabilitado : !Number(ingreso_formdata.selected_customer) }" :style="{opacity:(!Number(ingreso_formdata.selected_customer)? '0.5':'')}" >
              
              <el-collapse-item title="2. MOTIVO CONSULTA INGRESO" name="2">
                <template #title>
                    <div class="sec-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0z"></path></svg>
                    </div>
                    <span class="sec-title">2. MOTIVO CONSULTA INGRESO</span>          
                </template>
                <template>
                    <el-card>
                        <el-row type="flex" :gutter="24">                                          
                            <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">											
        						<el-form-item prop="motivo_ingreso">
        							<template #label>
        								<span class="bpa-form-label" style="margin-bottom: 20px;">Motivo de Consulta/Ingreso</span>
        							</template>
                                                                          
        							<el-input class="bpa-form-control" v-model="ingreso_formdata.motivo_ingreso" placeholder="Motivo..." type="textarea" :rows="3"></el-input>
                                    
        						</el-form-item>
        					</el-col>
                            
                        </el-row>
                    </el-card>
                </template>
              </el-collapse-item>
              
              
              <el-collapse-item title="3. ANTECEDENTES DE ENFERMEDAD ACTUAL" name="3">
                <template #title>
                    <div class="sec-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0z"></path></svg>
                    </div>
                    <span class="sec-title">3. ANTECEDENTES DE ENFERMEDAD ACTUAL</span>          
                </template>
                
                <template>
                    <el-card>
                        <el-row type="flex" :gutter="24">
                                          
                            <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">											
        						<el-form-item prop="ant_enf_actual">
        							<template #label>
        								<span class="bpa-form-label" style="margin-bottom: 20px;"><?php esc_html_e( 'Antecedentes de Enfermedad actual', 'bookingpress-appointment-booking' ); ?></span>
        							</template>
                                      
        							<el-input class="bpa-form-control" v-model="ingreso_formdata.ant_enf_actual" placeholder="Describe antecedentes actuales" type="textarea" :rows="3"></el-input>
                                    
        						</el-form-item>
        					</el-col>
                            
                        </el-row>
                    </el-card>
                <template>
              </el-collapse-item>
              
              <el-collapse-item title="4. ANTECEDENTES PERSONALES" name="4">
                <template #title>
                    <div class="sec-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0z"></path></svg>
                    </div>
                    <span class="sec-title">4. ANTECEDENTES PERSONALES</span>          
                </template>
                
                <template>
                    <el-card>
                        <!--
                        <div slot="header" class="clearfix">
                          <span>Habitos</span>
                        </div>
                        -->
                        <div class="subsection">
                        <h3 class="subsection-title">Habitos</h3>
                        <el-form-item label="Habitos Fisiológicos" prop="ant_personales.hab_fisiologicos">
                          <el-input v-model="ingreso_formdata.ant_personales.hab_fisiologicos" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="Habitos Tóxicos">
                            <el-row type="flex" :gutter="24">
                              <el-col :span="6">
                                <el-form-item label="tabaco" prop="ant_personales.hab_tox.tabaco">
                                  <el-input v-model="ingreso_formdata.ant_personales.hab_tox.tabaco" placeholder="..."></el-input>
                                </el-form-item>
                              </el-col>
                              <el-col :span="6">
                                <el-form-item label="alcohol" prop="ant_personales.hab_tox.alcohol">
                                  <el-input v-model="ingreso_formdata.ant_personales.hab_tox.alcohol" placeholder="..."></el-input>
                                </el-form-item>
                              </el-col>
                              <el-col :span="6">
                                <el-form-item label="drogas" prop="ant_personales.hab_tox.drogas">
                                  <el-input v-model="ingreso_formdata.ant_personales.hab_tox.drogas" placeholder="..."></el-input>
                                </el-form-item>
                              </el-col>
                              <el-col :span="6">
                                <el-form-item label="otros" prop="ant_personales.hab_tox.otros">
                                  <el-input v-model="ingreso_formdata.ant_personales.hab_tox.otros" placeholder="..."></el-input>
                                </el-form-item>
                              </el-col>
                            </el-row>
                        </el-form-item>
                        </div>
                        <div class="subsection">
                        <h3 class="subsection-title">Patológicos</h3>
                        <el-form-item label="A. Médicos" prop="ant_personales.patologicos.m">
                          <el-input v-model="ingreso_formdata.ant_personales.patologicos.m" placeholder="..."></el-input>
                        </el-form-item>
                        <el-form-item label="A. Quirúrgicos" prop="ant_personales.patologicos.q">
                          <el-input v-model="ingreso_formdata.ant_personales.patologicos.q" placeholder="..."></el-input>
                        </el-form-item>
                        <el-form-item label="A. Traumáticos" prop="ant_personales.patologicos.t">
                          <el-input v-model="ingreso_formdata.ant_personales.patologicos.t" placeholder="..."></el-input>
                        </el-form-item>
                        <el-form-item label="A. Alérgicos" prop="ant_personales.patologicos.a">
                          <el-input v-model="ingreso_formdata.ant_personales.patologicos.a" placeholder="..."></el-input>
                        </el-form-item>
                        </div>
                        <div class="subsection">
                        <h3 class="subsection-title">Medicación</h3>
                        <el-form-item label="Medicación reciente y actual" prop="ant_personales.medicacion">
                          <el-input v-model="ingreso_formdata.ant_personales.medicacion" placeholder="..."></el-input>
                        </el-form-item>
                        </div>
                    </el-card>
                <template>
              </el-collapse-item>
              
              
              <el-collapse-item title="5. ANTECEDENTES HEREDOFAMILIARES" name="5">
                <template #title>
                    <div class="sec-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0z"></path></svg>
                    </div>
                    <span class="sec-title">5. ANTECEDENTES HEREDOFAMILIARES</span>          
                </template>
                
                <template>
                    <el-card>
                        <el-row type="flex" :gutter="24">
                                          
                            <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">											
        						<el-form-item prop="ant_familiares">
        							<template #label>
        								<span class="bpa-form-label" style="margin-bottom: 20px;"><?php esc_html_e( 'Antecedentes heredados', 'bookingpress-appointment-booking' ); ?></span>
        							</template>
                                      
        							<el-input class="bpa-form-control" v-model="ingreso_formdata.ant_familiares" placeholder="Describe antecedentes heredados" type="textarea" :rows="3"></el-input>
                                    
        						</el-form-item>
        					</el-col>
                            
                        </el-row>
                    </el-card>
                <template>
              </el-collapse-item>
              
              <el-collapse-item title="6. Examen Físico" name="6">
              
                <template #title>          
                    <div class="sec-icon"><svg viewBox="0 -5 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0z"></path></svg></div>
                    <span class="sec-title">6. Examen Físico</span>          
                </template>
                <div>
                <template>
                  <el-card class="box-card">
                    <!--
                    <div slot="header" class="clearfix">
                      <span>Examen Físico de Ingreso</span>
                    </div>
                    -->
                    
                    <?php #<el-form :model="ingreso_formdata" label-position="top" ref="ingresoForm" :rules="formRules"> ?>
                      
                      <!-- 1. SECCIÓN: CABEZA Y CUELLO -->
                      <div class="subsection">
                        <h3 class="subsection-title">Cabeza y Cuello</h3>
                        <div>
                        <el-row type="flex" :gutter="24">
                          <el-col :span="8">
                            <el-form-item label="Cráneo" prop="examen_fisico.cabeza.craneo">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.craneo" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="8">
                            <el-form-item label="Cara" prop="examen_fisico.cabeza.cara">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.cara" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="8">
                            <el-form-item label="Ojos" prop="examen_fisico.cabeza.ojos">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.ojos" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                
                        <el-row :gutter="20">          
                          <el-col :span="12">
                            <el-form-item label="Narinas" prop="examen_fisico.cabeza.narinas">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.narinas" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="12">
                            <el-form-item label="Oídos" prop="examen_fisico.cabeza.oidos">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.oidos" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                
                        <el-row :gutter="20">
                          <el-col :span="12">
                            <el-form-item label="Parótidas" prop="examen_fisico.cabeza.parotidas">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.parotidas" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="12">
                            <el-form-item label="Boca" prop="examen_fisico.cabeza.boca">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.boca" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                
                        <el-row :gutter="20">
                          <el-col :span="12">
                            <el-form-item label="Cuello" prop="examen_fisico.cabeza.cuello">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.cuello" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="12">
                            <el-form-item label="Tiroides" prop="examen_fisico.cabeza.tiroides">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.tiroides" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                
                        <el-row :gutter="20">
                          <el-col :span="8">
                            <el-form-item label="Ing. Yugular" prop="examen_fisico.cabeza.ing_yugular">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.ing_yugular" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="8">
                            <el-form-item label="Latidos" prop="examen_fisico.cabeza.latidos">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.latidos" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="8">
                            <el-form-item label="Soplos" prop="examen_fisico.cabeza.soplos">
                              <el-input v-model="ingreso_formdata.examen_fisico.cabeza.soplos" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                        </div>
                
                        <el-row :gutter="20">
                          <el-col :span="12">
                            <el-form-item label="Tórax" prop="examen_fisico.torax">
                              <el-input v-model="ingreso_formdata.examen_fisico.torax" placeholder="..." type="textarea" :rows="2"></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="12">
                            <el-form-item label="Mamas" prop="examen_fisico.mamas">
                              <el-input v-model="ingreso_formdata.examen_fisico.mamas" placeholder="..." type="textarea" :rows="2"></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                      </div>
                
                      <el-divider></el-divider>
                
                      <!-- 2. SECCIÓN: AP. RESPIRATORIO -->
                      <div class="subsection">
                        <h3 class="subsection-title">Ap. Respiratorio</h3>
                        
                        <el-row :gutter="20">
                          <el-col :span="12">
                            <el-form-item label="Frecuencia" prop="examen_fisico.respiratorio.frecuencia">
                              <el-input v-model="ingreso_formdata.examen_fisico.respiratorio.frecuencia" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="12">
                            <el-form-item label="Tipo" prop="examen_fisico.respiratorio.tipo">
                              <el-input v-model="ingreso_formdata.examen_fisico.respiratorio.tipo" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                
                        <el-form-item label="Expansión de bases" prop="examen_fisico.respiratorio.expansion_bases">
                          <el-input v-model="ingreso_formdata.examen_fisico.respiratorio.expansion_bases" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="V. Vocales" prop="examen_fisico.respiratorio.v_vocales">
                          <el-input v-model="ingreso_formdata.examen_fisico.respiratorio.v_vocales" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="Percusión" prop="examen_fisico.respiratorio.percusion">
                          <el-input v-model="ingreso_formdata.examen_fisico.respiratorio.percusion" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="M. Vesicular" prop="examen_fisico.respiratorio.m_vesicular">
                          <el-input v-model="ingreso_formdata.examen_fisico.respiratorio.m_vesicular" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="Otros" prop="examen_fisico.respiratorio.otros">
                          <el-input v-model="ingreso_formdata.examen_fisico.respiratorio.otros" placeholder="..."></el-input>
                        </el-form-item>
                      </div>
                
                      <el-divider></el-divider>
                
                      <!-- 3. SECCIÓN: AP. CARDIOVASCULAR -->
                      <div class="subsection">
                        <h3 class="subsection-title">Ap. Cardiovascular</h3>
                        
                        <el-form-item label="Pulso" prop="examen_fisico.cardiovascular.pulso">
                          <el-input v-model="ingreso_formdata.examen_fisico.cardiovascular.pulso" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="Ruidos cardíacos">
                          <el-row :gutter="10">
                            <el-col :span="6">
                              <div class="sub-label">1er R</div>
                              <el-form-item prop="examen_fisico.cardiovascular.ruidos_1r">
                                <el-input v-model="ingreso_formdata.examen_fisico.cardiovascular.ruidos_1r" placeholder="..."></el-input>
                              </el-form-item>
                            </el-col>
                            <el-col :span="6">
                              <div class="sub-label">2do R</div>
                              <el-form-item prop="examen_fisico.cardiovascular.ruidos_2r">
                                <el-input v-model="ingreso_formdata.examen_fisico.cardiovascular.ruidos_2r" placeholder="..."></el-input>
                              </el-form-item>
                            </el-col>
                            <el-col :span="6">
                              <div class="sub-label">3er R</div>
                              <el-form-item prop="examen_fisico.cardiovascular.ruidos_3r">
                                <el-input v-model="ingreso_formdata.examen_fisico.cardiovascular.ruidos_3r" placeholder="..."></el-input>
                              </el-form-item>
                            </el-col>
                            <el-col :span="6">
                              <div class="sub-label">4to R</div>
                              <el-form-item prop="examen_fisico.cardiovascular.ruidos_4r">
                                <el-input v-model="ingreso_formdata.examen_fisico.cardiovascular.ruidos_4r" placeholder="..."></el-input>
                              </el-form-item>
                            </el-col>
                          </el-row>
                        </el-form-item>
                
                        <el-row :gutter="20">
                          <el-col :span="8">
                            <el-form-item label="Frotes" prop="examen_fisico.cardiovascular.frotes">
                              <el-input v-model="ingreso_formdata.examen_fisico.cardiovascular.frotes" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="8">
                            <el-form-item label="Soplos Sistólicos" prop="examen_fisico.cardiovascular.soplos_sistolicos">
                              <el-input v-model="ingreso_formdata.examen_fisico.cardiovascular.soplos_sistolicos" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="8">
                            <el-form-item label="Soplos Diastólicos" prop="examen_fisico.cardiovascular.soplos_diastolicos">
                              <el-input v-model="ingreso_formdata.examen_fisico.cardiovascular.soplos_diastolicos" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                
                        <el-row :gutter="20">
                          <el-col :span="12">
                            <el-form-item label="Frémitos" prop="examen_fisico.cardiovascular.fremitos">
                              <el-input v-model="ingreso_formdata.examen_fisico.cardiovascular.fremitos" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="12">
                            <el-form-item label="Sistema Venoso" prop="examen_fisico.cardiovascular.sistema_venoso">
                              <el-input v-model="ingreso_formdata.examen_fisico.cardiovascular.sistema_venoso" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                      </div>
                
                      <el-divider></el-divider>
                
                      <!-- 4. SECCIÓN: ABDOMEN -->
                      <div class="subsection">
                        <h3 class="subsection-title">Abdomen</h3>
                        
                        <el-form-item label="Inspección" prop="examen_fisico.abdomen.inspeccion">
                          <el-input v-model="ingreso_formdata.examen_fisico.abdomen.inspeccion" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="Palpación" prop="examen_fisico.abdomen.palpacion">
                          <el-input v-model="ingreso_formdata.examen_fisico.abdomen.palpacion" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="Percución" prop="examen_fisico.abdomen.percusion">
                          <el-input v-model="ingreso_formdata.examen_fisico.abdomen.percusion" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="Auscultación" prop="examen_fisico.abdomen.auscultacion">
                          <el-input v-model="ingreso_formdata.examen_fisico.abdomen.auscultacion" placeholder="..."></el-input>
                        </el-form-item>
                      </div>
                      
                <?php /**
                      <el-divider></el-divider>
                
                      <!-- 5. SECCIÓN: GÉNITO - URINARIO -->
                      <div class="subsection">
                        <h3 class="subsection-title">Génito - Urinario</h3>
                        
                        <el-form-item label="Puntos dolorosos" prop="examen_fisico.genito_urinario.puntos_dolorosos">
                          <el-input v-model="ingreso_formdata.examen_fisico.genito_urinario.puntos_dolorosos" placeholder="..."></el-input>
                        </el-form-item>
                      </div>
                      
                */ ?>
                
                      <el-divider></el-divider>
                
                      <!-- 5. SECCIÓN: GÉNITO - URINARIO -->
                      <div class="subsection">
                        <h3 class="subsection-title">Génito - Urinario</h3>
                        <el-row :gutter="20">
                            <el-col :span="20">
                                <el-form-item label="Puntos dolorosos" prop="examen_fisico.genito_urinario.puntos_dolorosos">
                                  <el-input v-model="ingreso_formdata.examen_fisico.genito_urinario.puntos_dolorosos" placeholder="..."></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        
                        <el-row :gutter="20">
                          <el-col :span="10">
                            <el-form-item label="Palpación renal" prop="examen_fisico.genito_urinario.palpacion_renal">
                              <el-input v-model="ingreso_formdata.examen_fisico.genito_urinario.palpacion_renal" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="10">
                            <el-form-item label="Puño Percusión (+) (−) (D − I)" prop="examen_fisico.genito_urinario.puno_percusion">
                              <el-input v-model="ingreso_formdata.examen_fisico.genito_urinario.puno_percusion" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                
                        <el-form-item label="Genit. Ext." prop="examen_fisico.genito_urinario.genit_ext">
                          <el-input v-model="ingreso_formdata.examen_fisico.genito_urinario.genit_ext" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-row :gutter="20">
                          <el-col :span="12">
                            <el-form-item label="Tacto Vaginal" prop="examen_fisico.genito_urinario.tacto_vaginal">
                              <el-input v-model="ingreso_formdata.examen_fisico.genito_urinario.tacto_vaginal" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="12">
                            <el-form-item label="Tacto Rectal" prop="examen_fisico.genito_urinario.tacto_rectal">
                              <el-input v-model="ingreso_formdata.examen_fisico.genito_urinario.tacto_rectal" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                        </el-row>
                      </div>
                
                      <el-divider></el-divider>
                
                      <!-- 6. SECCIÓN: NEUROLÓGICO -->
                      <div class="subsection">
                        <h3 class="subsection-title">Neurológico</h3>
                        
                        <el-row :gutter="20">
                          <el-col :span="6">
                            <el-form-item label="Conciencia" prop="examen_fisico.neurologico.conciencia">
                              <el-input v-model="ingreso_formdata.examen_fisico.neurologico.conciencia" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="6">
                            <el-form-item label="Glasgow total" prop="examen_fisico.neurologico.glasgow_total">
                              <el-input v-model="ingreso_formdata.examen_fisico.neurologico.glasgow_total" placeholder="..."></el-input>
                            </el-form-item>
                          </el-col>
                          <el-col :span="6">
                            <el-form-item label="O (Ocular)" prop="examen_fisico.neurologico.glasgow_o">
                              <el-input-number v-model="ingreso_formdata.examen_fisico.neurologico.glasgow_o" :min="1" :max="4" placeholder="1-4" style="width: 100%;"></el-input-number>
                            </el-form-item>
                          </el-col>
                          <el-col :span="6">
                            <el-form-item label="V (Verbal)" prop="examen_fisico.neurologico.glasgow_v">
                              <el-input-number v-model="ingreso_formdata.examen_fisico.neurologico.glasgow_v" :min="1" :max="5" placeholder="1-5" style="width: 100%;"></el-input-number>
                            </el-form-item>
                          </el-col>
                        </el-row>
                
                        <el-row :gutter="20">
                          <el-col :span="6">
                            <el-form-item label="M (Motor)" prop="examen_fisico.neurologico.glasgow_m">
                              <el-input-number v-model="ingreso_formdata.examen_fisico.neurologico.glasgow_m" :min="1" :max="6" placeholder="1-6" style="width: 100%;"></el-input-number>
                            </el-form-item>
                          </el-col>
                        </el-row>
                
                        <el-form-item label="Motilidad" prop="examen_fisico.neurologico.motilidad">
                          <el-input v-model="ingreso_formdata.examen_fisico.neurologico.motilidad" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="Sensibilidad" prop="examen_fisico.neurologico.sensibilidad">
                          <el-input v-model="ingreso_formdata.examen_fisico.neurologico.sensibilidad" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="Reflejo" prop="examen_fisico.neurologico.reflejo">
                          <el-input v-model="ingreso_formdata.examen_fisico.neurologico.reflejo" placeholder="..."></el-input>
                        </el-form-item>
                
                        <el-form-item label="Osteomioarticular" prop="examen_fisico.neurologico.osteomioarticular">
                          <el-input v-model="ingreso_formdata.examen_fisico.neurologico.osteomioarticular" placeholder="..."></el-input>
                        </el-form-item>
                      </div>
                
                      <!-- BOTÓN DE ACCIÓN -->      
                      <el-form-item style="margin-top: 30px;">
                        <el-button type="default" @click="">Continuar</el-button>
                      </el-form-item>
                
                    <?php #</el-form> ?>
                  </el-card>
                </template>
                </div>


            </el-collapse-item>
            
            <!-- ======================================================= SECCIÓN: DIAGNÓSTICO -->
            <el-collapse-item title="7. Diagnóstico de Ingreso" name="7">
                <template #title>
                    <div class="sec-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0121 9.414V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <span class="sec-title">7. Diagnóstico de Ingreso</span>          
                </template>
                <el-card>
                    <el-row type="flex" :gutter="24">
                        <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">											
    						<el-form-item prop="diagnostico_ingreso">
    							<template #label>
    								<span class="bpa-form-label" style="margin-bottom: 20px;"><?php esc_html_e( 'Diagnóstico', 'bookingpress-appointment-booking' ); ?></span>
    							</template>
    							<el-input class="bpa-form-control" v-model="ingreso_formdata.diagnostico_ingreso" placeholder="Diagnóstico..." type="textarea" :rows="3"></el-input>
                                
    						</el-form-item>
    					</el-col>
                    </el-row>
                </el-card>
              </el-collapse-item>
              
              <!-- ======================================================= SECCIÓN: TERAPÉUTICA -->
              <el-collapse-item title="8. Terapéutica" name="8">
                <template #title>
                    <div class="sec-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                    </div>
                    <span class="sec-title">8. Terapéutica</span>          
                </template>
                
                <el-card>
                    <el-row type="flex" :gutter="24">
                        <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">											
    						<el-form-item prop="terapeutica.dieta">
    							<template #label>
    								<span class="bpa-form-label" style="margin-bottom: 20px;"><?php esc_html_e( 'Dieta', 'bookingpress-appointment-booking' ); ?></span>
    							</template>
                                  
    							<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.dieta" placeholder="Dieta..." type="textarea" :rows="2"></el-input>
                                
    						</el-form-item>
    					</el-col>                        
                    </el-row>
                    
                    <div class="subsection">
                        <h3 class="subsection-title">Oxigenoterapia</h3>
                        <el-row type="flex" :gutter="24">                        
                            <el-col :span="8">											
        						<el-form-item prop="terapeutica.oxi_terapia.fio2">
        							<template #label>
        								<span class="bpa-form-label" style="margin-bottom: 20px;">FiO2</span>
        							</template>
        							<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.oxi_terapia.fio2" placeholder="FiO2" ></el-input>
                                    
        						</el-form-item>
        					</el-col>
                            <el-col :span="8">											
        						<el-form-item prop="terapeutica.oxi_terapia.flujo">
        							<template #label>
        								<span class="bpa-form-label" style="margin-bottom: 20px;">Flujo</span>
        							</template>
        							<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.oxi_terapia.flujo" placeholder="Flujo" ></el-input>
                                    
        						</el-form-item>
        					</el-col>
                            <el-col :span="8">											
        						<el-form-item prop="terapeutica.oxi_terapia.nbl">
        							<template #label>
        								<span class="bpa-form-label" style="margin-bottom: 20px;">NBL</span>
        							</template>
        							<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.oxi_terapia.nbl" placeholder="NBL" ></el-input>
                                    
        						</el-form-item>
        					</el-col>
                        </el-row>
                    </div>
                    
                    <el-row type="flex" :gutter="24">                        
                        <el-col :span="12">											
    						<el-form-item prop="terapeutica.hp">
    							<template #label>
    								<span class="bpa-form-label" style="margin-bottom: 20px;">HP</span>
    							</template>
    							<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.hp" placeholder="Hidratación Parental, Hipertencion pulmonar, Historia Personal, Humedecedor Pasivo o Humedad Permanente...?" ></el-input>
                                
    						</el-form-item>
    					</el-col>
                        <el-col :span="12">											
    						<el-form-item prop="terapeutica.profilaxis_ant">
    							<template #label>
    								<span class="bpa-form-label" style="margin-bottom: 20px;">Profilaxis Antitrombótica</span>
    							</template>
    							<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.profilaxis_ant" placeholder="profilaxis..." ></el-input>
                                
    						</el-form-item>
    					</el-col>
                    </el-row>
                    
                    <el-form-item prop="terapeutica.farmacos">
						<template #label>
							<span class="bpa-form-label" style="margin-bottom: 20px;">Fármacos</span>
						</template>
						<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.farmacos" placeholder="..." type="textarea" :rows="2"></el-input>                        
					</el-form-item>
                    
                    <div class="subsection">
                        <h3 class="subsection-title">Control de Signos Vitales</h3>
                        <el-row type="flex" :gutter="24">                        
                            <el-col :span="6">											
        						<el-form-item prop="terapeutica.sig_v.diuresis">
        							<template #label>
        								<span class="bpa-form-label" style="margin-bottom: 20px;">Diuresis</span>
        							</template>
        							<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.sig_v.diuresis" placeholder="..." ></el-input>
                                    
        						</el-form-item>
        					</el-col>
                            <el-col :span="6">											
        						<el-form-item prop="terapeutica.sig_v.catarsis">
        							<template #label>
        								<span class="bpa-form-label" style="margin-bottom: 20px;">Catarsis</span>
        							</template>
        							<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.sig_v.catarsis" placeholder="..." ></el-input>
                                    
        						</el-form-item>
        					</el-col>
                            
                            <el-col :span="6">											
        						<el-form-item prop="terapeutica.sig_v.t">
        							<template #label>
        								<span class="bpa-form-label" style="margin-bottom: 20px;">T°</span>
        							</template>
        							<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.sig_v.t" placeholder="..." ></el-input>
                                    
        						</el-form-item>
        					</el-col>
                            <el-col :span="6">											
        						<el-form-item prop="terapeutica.sig_v.otros">
        							<template #label>
        								<span class="bpa-form-label" style="margin-bottom: 20px;">Otros</span>
        							</template>
        							<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.sig_v.otros" placeholder="..." ></el-input>
                                    
        						</el-form-item>
        					</el-col>
                        </el-row>
                    </div>
                    
                    <el-form-item prop="terapeutica.info_extra_paciente">
						<template #label>
							<span class="bpa-form-label" style="margin-bottom: 20px;">Información Paciente / Familiar / Solicitud Donantes de Sangre</span>
						</template>
						<el-input class="bpa-form-control" v-model="ingreso_formdata.terapeutica.info_extra_paciente" placeholder="..." type="textarea" :rows="3"></el-input>                        
					</el-form-item>
                    
                </el-card>
              </el-collapse-item>
            
            
</div>
          </el-collapse>
        
<?php /**
          <!-- Firma y Sello -->
          <div class="el-divider"></div>
          <div class="section-label">Firma y Sello</div>
          <div class="conformidad-block">
            <label class="bpa-checkbox-option">
              <input type="checkbox" class="bpa-checkbox-input"> Médico firmante — identidad verificada
            </label>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:2px;">
              <input type="text" class="bpa-form-input" placeholder="Nombre y apellido del profesional">
              <input type="date" class="bpa-form-input">
            </div>
          </div>
*/ ?>
        
          <div style="width: 100%;">
          <el-row :gutter="24" type="flex" align="right" style="min-height: 100px;">
            <el-col :span="12">
            <div></div>
            </el-col>
            <el-col :span="12" style="padding-top: 50px;">
            <el-divider content-position="center">Firma y Sello</el-divider>
            </el-col>
          </el-row>
          </div>
          
          <!-- FOOTER BUTTONS -->
          <div class="form-footer" style="border-radius:4px; border:1px solid var(--el-border-color-light);">
            <?php /**
            <!--
            <button type="button" class="bpa-btn bpa-btn--ghost">← Volver</button>
            -->
            */ ?>
            <button @click="()=>{ localStorage.setItem('last_inter_ing_formData', JSON.stringify(this.ingreso_formdata) ); this.$notify({type:'success', message:'Guardado Local'});  }" type="button" class="bpa-btn bpa-btn--primary">Guardar Ingreso →</button>
            
          </div>
        
    </div>
    
<?php /**
<!-- custom-class="bpa-dialog bpa-dialog--fullscreen bpa-dialog--customer-modal bpa--is-page-non-scrollable-mob" -->
<el-dialog id="inter_customer_add_modal" custom-class="bpa-dialog  bpa-dialog--customer-modal bpa--is-page-non-scrollable-mob" :modal-append-to-body="false" v-if="open_customer_modal" :visible.sync="open_customer_modal" :before-close="closeCustomerModal" :fullscreen="false" :close-on-press-escape="true">
    <div class="bpa-dialog-heading">
        <el-row type="flex">
            <el-col :xs="12" :sm="12" :md="16" :lg="16" :xl="16">
        <h1 class="bpa-page-heading" v-if="customer.update_id == 0"><?php esc_html_e('Add Customer', 'bookingpress-appointment-booking'); ?></h1>
        <h1 class="bpa-page-heading" v-else><?php esc_html_e('Edit Customer', 'bookingpress-appointment-booking'); ?></h1>
            </el-col>
            <el-col :xs="12" :sm="12" :md="7" :lg="7" :xl="7" class="bpa-dh__btn-group-col">
                <el-button class="bpa-btn bpa-btn--primary " :class="is_display_save_loader == '1' ? 'bpa-btn--is-loader' : ''" @click="saveCustomerDetails" :disabled="is_disabled" >
                    <span class="bpa-btn__label"><?php esc_html_e('Save', 'bookingpress-appointment-booking'); ?></span>
                    <div class="bpa-btn--loader__circles">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </el-button> 
                <el-button class="bpa-btn" @click="closeCustomerModal()"><?php esc_html_e('Cancel', 'bookingpress-appointment-booking'); ?></el-button>
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
                        <!--
                        <el-row type="flex" align="middle">
                            <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12">
                                <div class="db-sec-left">
                                    <h2 class="bpa-page-heading"><?php esc_html_e('Basic Details', 'bookingpress-appointment-booking'); ?></h2>
                                </div>
                            </el-col>
                            
                        </el-row>
                        -->
                    </div>            
                    <div class="bpa-default-card bpa-db-card">
                        <div style="margin-bottom: 20px;">
                            <el-row :gutter="24">
                                <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                    <span class="bpa-form-label"><?php esc_html_e( 'Buscar Paciente', 'bookingpress-appointment-booking' ); ?></span>
    								
    								<el-select class="bpa-form-control" name="selected_customer" v-model="ingreso_formdata.selected_customer"  @change="bookingpress_select_customer($event)" filterable placeholder="<?php esc_html_e( 'Start typing to fetch Customer', 'bookingpress-appointment-booking' ); ?>" remote reserve-keyword :remote-method="bookingpress_get_customer_list" :loading="bookingpress_loading"  popper-class="bpa-el-select--is-with-modal" v-cancel-read-only>												
    									<el-option value="add_new" label="<?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?>" v-if="config.bookingpress_edit_customers == 1">
    										<i class="el-icon-plus" ></i>
    										<span><?php esc_html_e( 'Add New', 'bookingpress-appointment-booking' ); ?></span>
    									</el-option>
    									<el-option v-for="customer_data in ingreso_customers_list" :key="customer_data.value" :label="customer_data.text" :value="customer_data.value">
    										<span>{{ customer_data.text }}</span>
    									</el-option>													
                                    </el-select>
                                    
                                </el-col>
                            </el-row>
                        </div>
                    
                        <el-form ref="customer" :rules="customer_rules" :model="customer" label-position="top" @submit.native.prevent>
                            <template>                            
                                <el-row :gutter="24">
                                    <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24" class="bpa-form-group">
                                        <el-upload class="bpa-upload-component" ref="avatarRef" action="<?php echo wp_nonce_url($bookingpress_ajaxurl . '?action=bookingpress_upload_customer_avatar', 'bookingpress_upload_customer_avatar'); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Reason - esc_html is already used by wp_nonce_url function and it's false positive ?>" :on-success="bookingpress_upload_customer_avatar_func" :file-list="customer.avatar_list" multiple="false" :show-file-list="cusShowFileList" limit="1" :on-exceed="bookingpress_image_upload_limit" :on-error="bookingpress_image_upload_err" :on-remove="bookingpress_remove_customer_avatar" :before-upload="checkUploadedFile" drag>
                                            <span class="material-icons-round bpa-upload-component__icon">cloud_upload</span>
                                           <div class="bpa-upload-component__text" v-if="customer.avatar_url == ''"><?php esc_html_e('jpg/png files with a size less than 500kb', 'bookingpress-appointment-booking'); ?>                                           
                                           </div>
                                        </el-upload>
                                        <div class="bpa-uploaded-avatar__preview"  v-if="customer.avatar_url != ''">
                                            <button class="bpa-avatar-close-icon" @click="bookingpress_remove_customer_avatar">
                                                <span class="material-icons-round">close</span>
                                            </button>
                                            <el-avatar shape="square" :src="customer.avatar_url" class="bpa-uploaded-avatar__picture"></el-avatar>
                                        </div>
                                    </el-col>
                                </el-row>
                                <div class="bpa-form-body-row bpa-fbr--customer">
                                    <el-row :gutter="32" type="flex">

            <div style="opacity: 0.3;width: 100%;">
                                        <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                            <el-form-item prop="wp_user">
                                                <template #label>
                                                    <span class="bpa-form-label"><?php esc_html_e('WordPress User', 'bookingpress-appointment-booking'); ?></span>
                                                </template>
												<el-select class="bpa-form-control" v-model="customer.wp_user" filterable placeholder="<?php esc_html_e( 'Start typing to fetch user.', 'bookingpress-appointment-booking' ); ?>" @change="bookingpress_get_existing_user_details($event)"  remote reserve-keyword	 :remote-method="get_wordpress_users" :loading="bookingpress_loading">
													<el-option-group label="<?php esc_html_e( 'Create New User', 'bookingpress-appointment-booking' ); ?>">
														<template>
															<el-option value="add_new" label="Create New">
																<i class="el-icon-plus" ></i>
																<span><?php esc_html_e( 'Create New', 'bookingpress-appointment-booking' ); ?></span>
															</el-option>
														</template>
													</el-option-group>
													<el-option-group v-for="wp_user_list_cat in wpUsersList" :key="wp_user_list_cat.category" :label="wp_user_list_cat.category">
														<template>
															<el-option v-for="item in wp_user_list_cat.wp_user_data" :key="item.wp_user" :label="item.label" :value="item.value" >
																<span>{{ item.label }}</span>
															</el-option>
														</template>
													</el-option-group>
												</el-select>
                                            </el-form-item>                                                
                                        </el-col>                                        
                                        <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8" v-if="customer.wp_user =='add_new'">
                                            <el-form-item>
                                                <template #label>
                                                    <span class="bpa-form-label"><?php esc_html_e('Password', 'bookingpress-appointment-booking'); ?></span>
                                                </template>
                                                <el-input class="bpa-form-control --bpa-fc-field-pass" type="password" v-model="customer.password" placeholder="<?php esc_html_e('Enter Password', 'bookingpress-appointment-booking'); ?>" :show-password="true" ></el-input>
                                            </el-form-item>                                            
                                        </el-col>
                                        
                                        <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                            <el-form-item prop="username">
                                                <template #label>
                                                    <span class="bpa-form-label"><?php esc_html_e('Username', 'bookingpress-appointment-booking'); ?></span>
                                                </template>
                                                <el-input class="bpa-form-control" v-model="customer.username" id="username" name="username" placeholder="<?php esc_html_e('Enter Username', 'bookingpress-appointment-booking'); ?>"></el-input>
                                            </el-form-item>
                                        </el-col>
            </div>
                                        

                                        <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                            <el-form-item prop="firstname">
                                                <template #label>
                                                    <span class="bpa-form-label"><?php esc_html_e('First Name', 'bookingpress-appointment-booking'); ?></span>
                                                </template>
                                                <el-input class="bpa-form-control" v-model="customer.firstname" id="firstname" name="firstname" placeholder="<?php esc_html_e('Enter First Name', 'bookingpress-appointment-booking'); ?>"></el-input>
                                            </el-form-item>
                                        </el-col>
                                        <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                            <el-form-item prop="lastname">
                                                <template #label>
                                                    <span class="bpa-form-label"><?php esc_html_e('Last Name', 'bookingpress-appointment-booking'); ?></span>
                                                </template>
                                                <el-input class="bpa-form-control" v-model="customer.lastname" id="lastname" name="lastname" placeholder="<?php esc_html_e('Enter Last Name', 'bookingpress-appointment-booking'); ?>"></el-input>
                                            </el-form-item>
                                        </el-col>                                            
                                        <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                            <el-form-item prop="email">
                                                <template #label>
                                                    <span class="bpa-form-label"><?php esc_html_e('Email', 'bookingpress-appointment-booking'); ?></span>
                                                </template>
                                                <el-input class="bpa-form-control" v-model="customer.email" id="email" name="email" placeholder="<?php esc_html_e('Enter Email', 'bookingpress-appointment-booking'); ?>"></el-input>
                                            </el-form-item>
                                        </el-col>
                                        <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                            <el-form-item prop="phone">
                                                <template #label>
                                                    <span class="bpa-form-label"><?php esc_html_e('Phone', 'bookingpress-appointment-booking'); ?></span>
                                                </template>
                                                <vue-tel-input v-model="customer.phone" class="bpa-form-control --bpa-country-dropdown" @country-changed="bookingpress_phone_country_change_func($event)" v-bind="bookingpress_tel_input_props" ref="bpa_tel_input_field">
                                                    <template v-slot:arrow-icon>
                                                        <span class="material-icons-round">keyboard_arrow_down</span>
                                                    </template>
                                                </vue-tel-input>
                                            </el-form-item>
                                        </el-col>            
                                        
										<el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8" v-if="bookingpress_customer_fields.length > 0" :data-customer-field-id="bpa_cus_field.bookingpress_form_field_id" v-for="(bpa_cus_field, cfkey) in bookingpress_customer_fields"> 
											                                            
                                            <el-form-item :prop="bpa_cus_field.bookingpress_field_meta_key" v-if=" 'obra_soc_seguros' != bpa_cus_field.bookingpress_field_meta_key " >
												<template #label>
													<span class="bpa-form-label">{{bpa_cus_field.bookingpress_field_label}}</span>
												</template>
												<el-input class="bpa-form-control" v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" :placeholder="bpa_cus_field.bookingpress_field_placeholder" v-if="'text' == bpa_cus_field.bookingpress_field_type"></el-input>
												<el-input class="bpa-form-control" :placeholder="bpa_cus_field.bookingpress_field_placeholder" v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" v-if="'textarea' == bpa_cus_field.bookingpress_field_type" type="textarea"></el-input>
												<template v-if="'checkbox' == bpa_cus_field.bookingpress_field_type">
													<el-checkbox v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key+'_'+keys]" class="bpa-form-label bpa-custom-checkbox--is-label" v-for="(chk_data,keys) in bpa_cus_field.bookingpress_field_values" :label="chk_data.value" :key="chk_data.value">{{chk_data.value}}</el-checkbox>
												</template>
												<template v-if="'radio' == bpa_cus_field.bookingpress_field_type">
													<el-radio v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" class="bpa-form-label bpa-custom-radio--is-label" v-for="(rdo_data,keys) in bpa_cus_field.bookingpress_field_values" :label="rdo_data.value" :key="rdo_data.value">{{rdo_data.value}}</el-radio>
												</template>
												<template v-if="'dropdown' == bpa_cus_field.bookingpress_field_type">
													<el-select  v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" class="bpa-form-control" :placeholder="bpa_cus_field.bookingpress_field_placeholder">
														<el-option v-for="sel_data in bpa_cus_field.bookingpress_field_values" :key="sel_data.value" :label="sel_data.label" :value="sel_data.value" ></el-option>
													</el-select>
												</template>
                                                <el-date-picker format="" placeholder="aaaa-mm-dd " v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" class="bpa-form-control bpa-form-control--date-picker" prefix-icon="" v-if="'date' == bpa_cus_field.bookingpress_field_type || 'datepicker' == bpa_cus_field.bookingpress_field_type" :type="'true' == bpa_cus_field.bookingpress_field_options.enable_timepicker ? 'datetime' : 'date'"  ></el-date-picker>
                                                
											</el-form-item>
                                            
                                            <el-form-item :prop="bpa_cus_field.bookingpress_field_meta_key" v-else >
                                                <template #label>
													<span class="bpa-form-label">{{bpa_cus_field.bookingpress_field_label}}</span>
												</template>
                                                <template >
													<el-select  v-model="customer['bpa_customer_field'][bpa_cus_field.bookingpress_field_meta_key]" filterable allow-create class="bpa-form-control" :placeholder="bpa_cus_field.bookingpress_field_placeholder">
														<el-option v-for="sel_data in all_obras_y_seguros" :key="sel_data.value" :label="sel_data.label" :value="sel_data.value"  :disabled="sel_data.isDisabled || sel_data.$isDisabled " ></el-option>
													</el-select>
												</template>
                                            </el-form-item>
                                            
										</el-col>
                                        
                                        
                                        <el-col :xs="24" :sm="24" :md="24" :lg="8" :xl="8">
                                            <el-form-item prop="note">
                                                <template #label>
                                                    <span class="bpa-form-label"><?php esc_html_e('Note', 'bookingpress-appointment-booking'); ?></span>
                                                </template>
                                                <el-input class="bpa-form-control" type="textarea" :rows="3" v-model="customer.note"></el-input>
                                            </el-form-item>
                                        </el-col>
                                    </el-row>
                                </div>
                            </template>
                        </el-form>
                    </div>
                </el-col>
            </el-row>
        </div>
    </div>
</el-dialog>
*/ ?>

</div>