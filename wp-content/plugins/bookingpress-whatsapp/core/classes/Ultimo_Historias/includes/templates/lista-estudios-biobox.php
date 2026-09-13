<?php
if(!defined('ABSPATH')) exit;

?>

<!-- pestaña biobox estudios -->
                <div v-if="bphc_target=='estudios'" ref="lista_estudios_container" class="lista-historias-container bphc_listing_conf-1" style="min-height: 380px;">

                    <div v-if="selected_patient" style="padding: 0 20px;width: 100%;"> <!-- v-if="biobox_estudios.lista.length > 0"  -->
                        <h2 class="bpa-page-heading bp_hc_dualview_heading" style="font-size: large;display: inline-flex;align-items: start;width: 100%;">
                            <span style="flex: 1; text-align: center;">L&iacute;nea de tiempo de Estudios</span> 
                            <el-button @click="bphc_target='historias';biobox_split_size_list( )" class="bpa-btn__small" style="position: relative;float: right;">ver historias</el-button>
                        </h2>
                    </div>
                                    
                    <div class="lista-historias estudio-container" style="padding-right: 10px;">
                        <div class="biobox-head">
                            <span style="
                                padding: 6px;
                                display: inline-block;
                                text-transform: capitalize;
                            ">{{(biobox_estudios.current_title? biobox_estudios.current_title:'')}}</span>
                            
                            <div>
                                <el-button v-if=" bp_hc_view_mode.dual_view /*== 'portrait'*/ " @click="if($refs.biobox_container.parentElement.classList.contains('full')){$refs.biobox_container.parentElement.classList.remove('full')}else{$refs.biobox_container.parentElement.classList.add('full')}" 
                                    class="bpa-btn__small" 
                                    style="padding: 2px;overflow: clip;height: 30px;width: 34px;margin-left: 10px;"
                                >
                                    <span class="material-icons-round">fullscreen</span>
                                </el-button>
                                <el-button @click="$refs.biobox_container.parentElement.classList.remove('full');biobox_estudios.is_loading=0;$refs.biobox_container.innerHTML='';biobox_estudios.current_title='';" 
                                    class="bpa-btn__small" 
                                    style="padding: 2px;overflow: clip;height: 30px;width: 34px;margin-left: 10px;"
                                >
                                    <span class="material-icons-round">close</span>
                                </el-button>
                            
                            </div>
                            
                        </div>
                        <div ref="biobox_container" class="biobox-body" style="">
                        </div>
                        
                        <div v-if="biobox_estudios.is_loading" class="bphc_cargando_historias" style="display: flex;position: absolute;">
                            <h2>Aguarde un momento.</h2>
                            	<div class="bpa-back-loader-container" id="bpa-page-loading-loader">
        			                 <div class="bpa-back-loader"></div>
        	                   </div>
                        </div>
                    </div>
                    
                    <div class="lista-historias" style="padding-right: 10px;">
                        <div v-if="biobox_estudios.is_loading" class="bphc_cargando_historias" style="display: flex;">
                            <h2>Cargando estudios...</h2>
                            	<div class="bpa-back-loader-container" id="bpa-page-loading-loader">
        			                 <div class="bpa-back-loader"></div>
        	                   </div>
                        </div>

                        <div v-else-if="!selected_patient" class="bphc_selecciona_paciente">
                            <div style="position: relative;">
                            
                                <h2 style=""> 
                                <span style="" type="warning">Selecciona un Paciente.</span>
                                </h2>
                                <svg style=""   viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_4470_13557)"><path d="M21 12V6C21 4.9 20.1 4 19 4H18V3C18 2.45 17.55 2 17 2C16.45 2 16 2.45 16 3V4H8V3C8 2.45 7.55 2 7 2C6.45 2 6 2.45 6 3V4H5C3.9 4 3 4.9 3 6V20C3 21.1 3.9 22 5 22H12V20H5V10H19V12H21Z"></path> <path d="M18 13C15.24 13 13 15.24 13 18C13 20.76 15.24 23 18 23C20.76 23 23 20.76 23 18C23 15.24 20.76 13 18 13ZM19.65 20.35L17.5 18.2V15H18.5V17.79L20.35 19.64L19.65 20.35Z"></path></g> <defs><clipPath id="clip0_4470_13557"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg>
                                
                            </div>
                        </div>

                        <div v-else-if="biobox_estudios.lista.length === 0" class="bphc_no_historias" style="display: flex;text-align: center;position:relative;">
                       
                                <h2 >No se encontraron Estudios.</h2>
                                <div class="bpa-ev-left-vector" style="float: none;">
        							<picture>
        								<source srcset="<?php echo esc_url( BOOKINGPRESS_IMAGES_URL . '/data-grid-empty-view-vector.webp' ); ?>" type="image/webp">
        								<img src="<?php echo esc_url( BOOKINGPRESS_IMAGES_URL . '/data-grid-empty-view-vector.png' ); ?>">
        							</picture>
        						</div>
                              <!-- :data-historia="h.date_label"  v-if="(h.consultation_data.general.motivoConsulta.length) < 200 " -->  
                        </div>
                        
<!-- :key="h.id" -->    <div v-else v-for="(estd, i) in biobox_estudios.lista" :key="estd.id" class="flex history-Slot" >

                            <div class="bphc_historia-item-before">
                                <div class="bphc_item-before-line"></div>
                                <div class="bphc_item-before-round" class="show"> <!-- :class="{show: h.yearShow }" -->
                                    <div></div>
                                    <!--<span class="uppercase">{{ moment(h.date).format('YYYY')||'' }}</span>-->
                                </div>
                            </div>

                            <div class="historia-item"  >
                            
                                <div class="medical-card">
                                    <!-- Header con gradiente -->
                                    <div class="card-header-gradient">
                                        <div class="header-content">
                                            <div class="header-left">
                                                <h5 class="header-title">{{ moment(estd.fecha).format('DD [de] MMMM, YYYY') || '' }}</h5>
                                                <div class="header-subtitle">{{ moment(estd.fecha || '', 'HH:mm').format('hh:mm A') !== 'Invalid date' ? moment(estd.fecha || '', 'HH:mm').format('hh:mm A') : '' }}</div>
                                            </div>
                                            <div class="header-right">
                                            <?php if( isset($_GET['test']) ){ ?>
                                                <!--<el-button @click.stop="bphc_history_print( h )">Hoja clinica</el-button>-->
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <!-- Tabs/Botones -->
                                        <div class="tags-container">
                                            <el-tooltip effect="dark" content="Identificador de estudio biobox" placement="top">
                                                <button class="tag-item">#{{ estd.id }}</button>
                                            </el-tooltip>
                                            
                                            <el-tooltip effect="dark" content="Numero de estudio biobox" placement="top">
                                                <button class="tag-item" v-if="estd.nro_estudio">
                                                    Nro Estudio #{{ estd.nro_estudio }}
                                                </button>
                                                <button class="tag-item" v-else>
                                                    No vinculado
                                                </button>
                                            </el-tooltip>
                                            
                                            <el-tooltip 
                                                effect="dark" 
                                                :content="estd.service_name || 'Tomografo'" 
                                                placement="bottom" 
                                                :open-delay="300"
                                            >
                                                <button class="tag-item">{{ estd.service_name || 'Tomografo' }}</button>
                                            </el-tooltip>
                                            
                                            <button class="tag-item">
                                                {{ estd.consultorio || 'estudio biobox' }}
                                            </button>
                                        </div>
                                        
                                        <!-- Información de médicos -->
                                        <div class="info-section">
                                            <div class="info-grid">
                                                <div class="info-col">
                                                    <div class="info-label">Paciente</div>
                                                    <div class="info-value">
                                                        {{ (selected_patient.customer_firstname || '') + ' ' + (selected_patient.customer_lastname || '') }}
                                                    </div>
                                                </div>
                                                <div class="info-col">
                                                    <div class="info-label"> Incrustado | Ventana </div>
                                                    <div class="info-value">
                                                        <el-select v-model="biobox_alwais_open_window">
                                                            <el-option :value="true" label="ver en Ventana">Ver en Ventana</el-option>
                                                            <el-option :value="false" label="ver Incrustado">Ver Incrustado</el-option>
                                                        </el-select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Diagnósticos -->
                                        <div class="diagnostics-section">
                                            <div class="diagnostic-item" v-if="estd.descripcion">
                                                <strong>Descripcion:</strong> {{ estd.descripcion }}
                                            </div>
                                            <div class="diagnostic-item" v-if="estd.general && estd.general.diagnostico">
                                                <strong>Diagnóstico:</strong> {{ estd.general.diagnostico }}
                                            </div>
                                            <div class="diagnostic-item" v-if="estd.general && estd.general.tratamiento">
                                                <strong>Tratamiento:</strong> {{ estd.general.tratamiento }}
                                            </div>
                                        </div>
                                        
                                        <!-- Botones inferiores -->
                                        <div class="action-buttons">
                                            
                                            <button 
                                                @click="handle_biobox_list_btn( event, 'informe', estd.UrlInforme, estd.nro_estudio)"
                                                class="btn-primary-action2"
                                            >
                                                <span class="material-icons-round">description</span>
                                                <span>Ver informe</span>
                                            </button>
                                            
                                            <button 
                                                @click="handle_biobox_list_btn( event, 'estudio', estd.UrlImagen, estd.nro_estudio)"
                                                class="btn-secondary-action2"
                                                style="min-width: 130px; gap: 6px;"
                                            >
                                                <span>Ver estudio</span>
                                                <span class="material-icons-round">visibility</span>
                                            </button>
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin medical-card -->
                                
                                
                                                             
                            </div><!--fin new historia-item -->
                            
                        </div>
                                                
                    </div> <!--Fin lista historias-->
                    
                    
                    <!-- PAGINACION  -->
            		<el-row class="bpa-pagination" type="flex" v-if="biobox_estudios.lista.length > 0 || biobox_estudios.lista_full.length>0" style="width: 100%;padding: 0 20px;"> 
            			<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" >
            				<div class="bpa-pagination-left">
            					<p><?php esc_html_e('Showing', 'bookingpress-appointment-booking'); ?> <strong><u>{{ biobox_estudios.lista.length || String(biobox_estudios.lista.length).padStart(2,'0') }}</u></strong>&nbsp;<?php esc_html_e('out of', 'bookingpress-appointment-booking'); ?>&nbsp;<strong>{{ biobox_estudios.total }}</strong></p>
            					<div class="bpa-pagination-per-page">
                                    <p><?php esc_html_e('Per Page', 'bookingpress-appointment-booking'); ?></p>
            						<el-select v-model="biobox_estudios.pagination_length" placeholder="Select" @change="biobox_changePaginationSize($event)" class="bpa-form-control" popper-class="bpa-pagination-dropdown">
            							<el-option v-for="item in pagination_val" :key="item.text" :label="item.text" :value="item.value"></el-option>
            						</el-select>
            					</div>
            				</div>
            			</el-col>
            			<el-col :xs="24" :sm="24" :md="24" :lg="12" :xl="12" class="bpa-pagination-nav">
            				<el-pagination @size-change="biobox_handleSizeChange" @current-change="biobox_handleCurrentChange" :current-page.sync="biobox_estudios.currentPage" layout="prev, pager, next" :total="biobox_estudios.total" :page-sizes="biobox_estudios.pagination_length" :page-size="biobox_estudios.perPage"></el-pagination>
            			</el-col>
            			
            		</el-row>
                 
                </div>
                <!-- Fin listaestudiosContainer -->
                