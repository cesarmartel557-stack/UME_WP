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
                        <span>Formulario de Ingreso </span>
                        <span > 
                            <span v-if="Number(ingreso_formdata.id)" class="bpa-page-heading" style="color: var(--bpa-dt-black-300);"> Nro. #{{}} </span>
                            <span v-else class="bpa-page-heading" style="color: var(--bpa-dt-black-300);"> Nuevo </span>
                        </span>
                    </h3>
                </el-col>
           </el-row>
          <!-- ======================================================= SECCIÓN: EXAMEN FÍSICO -->
          
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
              
          
          <el-collapse-item title="2. MOTIVO CONSULTA INGRESO" name="2">
            <template #title>
                <div class="sec-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0z"></path></svg>
                </div>
                <span class="sec-title">2. MOTIVO CONSULTA INGRESO</span>          
            </template>
            <el-card>
                <el-row type="flex" :gutter="24">
                                  
                    <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">											
						<el-form-item prop="motivo_ingreso">
							<template #label>
								<span class="bpa-form-label" style="margin-bottom: 20px;"><?php esc_html_e( 'Motivo de Consulta/Ingreso', 'bookingpress-appointment-booking' ); ?></span>
							</template>
                              
							<el-input class="bpa-form-control" v-model="ingreso_formdata.motivo_ingreso" placeholder="escribir motivo" type="textarea" :rows="3"></el-input>
                            
						</el-form-item>
					</el-col>
                    
                </el-row>
            </el-card>
          </el-collapse-item>
          
          
          <el-collapse-item title="6. Examen Físico" name="3">
          <template #title>          
            <div class="sec-icon"><svg viewBox="0 -5 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0z"></path></svg></div>
            <span class="sec-title">6. Examen Físico</span>          
          </template>
          <div class="el-card">
            <div class="el-card__header">
              <div class="sec-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0z"/>
                </svg>
              </div>
              <span class="sec-title">Examen Físico</span>
            </div>
            <div class="el-card__body">
        
              <!-- Yugular / Latidos / Soplos -->
              <div class="subsection">
                <div class="g3">
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Ing. Yugular</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Latidos</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Soplos</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Tórax</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Mamas</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
              </div>
        
              <div class="el-divider"></div>
        
              <!-- Ap. Respiratorio -->
              <div class="subsection">
                <div class="subsection-title">Ap. Respiratorio</div>
                <div class="g2">
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Frecuencia</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Tipo</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Expansión de bases</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">V. Vocales</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Percusión</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">M. Vesicular</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Otros</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
              </div>
        
              <div class="el-divider"></div>
        
              <!-- Ap. Cardiovascular -->
              <div class="subsection">
                <div class="subsection-title">Ap. Cardiovascular</div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Pulso</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Ruidos cardíacos</label>
                  <div class="g4">
                    <div>
                      <label class="bpa-form-label" style="font-size:11px;font-weight:500;">1er R</label>
                      <input type="text" class="bpa-form-input" placeholder="...">
                    </div>
                    <div>
                      <label class="bpa-form-label" style="font-size:11px;font-weight:500;">2do R</label>
                      <input type="text" class="bpa-form-input" placeholder="...">
                    </div>
                    <div>
                      <label class="bpa-form-label" style="font-size:11px;font-weight:500;">3er R</label>
                      <input type="text" class="bpa-form-input" placeholder="...">
                    </div>
                    <div>
                      <label class="bpa-form-label" style="font-size:11px;font-weight:500;">4to R</label>
                      <input type="text" class="bpa-form-input" placeholder="...">
                    </div>
                  </div>
                </div>
                <div class="g3">
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Frotes</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Soplos Sistólicos</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Soplos Diastólicos</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                </div>
                <div class="g2">
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Frémitos</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Sistema Venoso</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                </div>
              </div>
        
              <div class="el-divider"></div>
        
              <!-- Abdomen -->
              <div class="subsection">
                <div class="subsection-title">Abdomen</div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Inspección</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Palpación</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Percución</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Auscultación</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
              </div>
        
              <div class="el-divider"></div>
        
              <!-- Génito - Urinario -->
              <div class="subsection">
                <div class="subsection-title">Génito - Urinario</div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Puntos dolorosos</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="g2">
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Palpación renal</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Puño Percusión (+) (−) (D − I)</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Genit. Ext.</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="g2">
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Tacto Vaginal</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Tacto Rectal</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                </div>
              </div>
        
              <div class="el-divider"></div>
        
              <!-- Neurológico -->
              <div class="subsection">
                <div class="subsection-title">Neurológico</div>
                <div class="g4">
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Conciencia</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">Glasgow total</label>
                    <input type="text" class="bpa-form-input" placeholder="...">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">O (Ocular)</label>
                    <input type="number" class="bpa-form-input" placeholder="1-4" min="1" max="4">
                  </div>
                  <div class="bpa-form-group">
                    <label class="bpa-form-label">V (Verbal)</label>
                    <input type="number" class="bpa-form-input" placeholder="1-5" min="1" max="5">
                  </div>
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">M (Motor)</label>
                  <input type="number" class="bpa-form-input" style="max-width:160px;" placeholder="1-6" min="1" max="6">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Motilidad</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Sensibilidad</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Reflejo</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Osteomioarticular</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
              </div>
        
            </div><!-- /card body -->
          </div><!-- /card examen físico -->
        </el-collapse-item>
          </el-collapse>
        
          <!-- ======================================================= SECCIÓN: DIAGNÓSTICO -->
          <div class="el-card">
            <div class="el-card__header">
              <div class="sec-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0121 9.414V19a2 2 0 01-2 2z"/>
                </svg>
              </div>
              <span class="sec-title">7. Diagnóstico de Ingreso</span>
            </div>
            <div class="el-card__body">
              <div class="bpa-form-group">
                <label class="bpa-form-label">Diagnóstico principal</label>
                <textarea class="bpa-form-textarea" style="min-height:90px;" placeholder="Describa el diagnóstico de ingreso..."></textarea>
              </div>
            </div>
          </div>
        
        
          <!-- ======================================================= SECCIÓN: TERAPÉUTICA -->
          <div class="el-card">
            <div class="el-card__header">
              <div class="sec-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                </svg>
              </div>
              <span class="sec-title">7. Terapéutica</span>
            </div>
            <div class="el-card__body">
        
              <div class="bpa-form-group">
                <label class="bpa-form-label">Dieta</label>
                <input type="text" class="bpa-form-input" placeholder="...">
              </div>
        
              <div class="subsection-title" style="margin-top:4px;">Oxigenoterapia</div>
              <div class="g3">
                <div class="bpa-form-group">
                  <label class="bpa-form-label">FiO₂</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Flujo</label>
                  <input type="text" class="bpa-form-input" placeholder="L/min">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">NBL</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
              </div>
        
              <div class="g2">
                <div class="bpa-form-group">
                  <label class="bpa-form-label">HP</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Profilaxis Antitrombótica</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
              </div>
        
              <div class="bpa-form-group">
                <label class="bpa-form-label">Fármacos</label>
                <textarea class="bpa-form-textarea" style="min-height:72px;" placeholder="Listado de fármacos indicados..."></textarea>
              </div>
        
              <div class="el-divider"></div>
        
              <div class="subsection-title">Control de Signos Vitales</div>
              <div class="g4">
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Diuresis</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Catarsis</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">T°</label>
                  <input type="text" class="bpa-form-input" placeholder="°C">
                </div>
                <div class="bpa-form-group">
                  <label class="bpa-form-label">Otros</label>
                  <input type="text" class="bpa-form-input" placeholder="...">
                </div>
              </div>
        
              <div class="bpa-form-group">
                <label class="bpa-form-label">Información Paciente / Familiar / Solicitud Donantes de Sangre</label>
                <textarea class="bpa-form-textarea" placeholder="..."></textarea>
              </div>
        
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
        
            </div><!-- /card body -->
          </div><!-- /card terapéutica -->
        
          <!-- FOOTER BUTTONS -->
          <div class="form-footer" style="border-radius:4px; border:1px solid var(--el-border-color-light);">
            <button type="button" class="bpa-btn bpa-btn--ghost">← Volver</button>
            <button type="button" class="bpa-btn bpa-btn--primary">Guardar Ingreso →</button>
          </div>
        
    </div>
    
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


</div>