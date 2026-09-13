<?php
/**
 * @author Foatconcept - Maximiliano Suarez <cv.msuarez@gmail.com>
 * @copyright 2026
 */
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Expansion_Extend_Fields_services' ) ) {
    class Expansion_Extend_Fields_services {
        public function __construct() {
            add_filter( 'bookingpress_modify_service_data_fields', array( $this, 'add_service_data_fields' ), 10 );
            #add_filter( 'bookingpress_modify_edit_service_data', array($this, 'add_edit_service_data_fields'), 11, 2);
            add_action( 'bookingpress_add_service_field_outside', [$this, 'add_service_particular_field'], 10);
            
            add_filter( 'bookingpress_after_add_update_service', array( $this, 'add_save_service_details' ), 10, 3 );
            add_action( 'bookingpress_edit_service_more_vue_data', array( $this, 'add_edit_service_more_vue_data' ), 8 );
		}
        function add_service_data_fields( $bookingpress_services_vue_data_fields = [] ) {
            $bookingpress_services_vue_data_fields['service']['expansion_service_only_particular'] = 0;
            return $bookingpress_services_vue_data_fields;
        }
        function add_edit_service_data_fields($response = [],$service_id = 0) {
            $response['expansion_service_only_particular'] = false;
            return $response;
        }
        function add_save_service_details( $response, $service_id, $posted_data ) {
            global $bookingpress_services;
            if ( ! empty( $service_id ) && ! empty( $posted_data ) ) {
				$expansion_service_only_particular = ! empty( $posted_data['expansion_service_only_particular'] ) ? 1 : 0;
                $bookingpress_services->bookingpress_add_service_meta( $service_id, 'is_only_particular', $expansion_service_only_particular );
            }
            return $response;
        }
        function get_service_is_only_particular( $service_id = 0 ) {
            if( empty($service_id) ) return false;
            global $bookingpress_services;
            $expansion_service_only_particular = !empty( $bookingpress_services->bookingpress_get_service_meta( $service_id, 'is_only_particular' ) )? true : false;
            return $expansion_service_only_particular;
        }
        
        function add_service_particular_field(){
            ?>
                                <div class="bpa-form-body-row">
									<el-row :gutter="32">
										<el-col :xs="24" :sm="24" :md="24" :lg="08" :xl="08">
											<el-form-item prop="expansion_service_only_particular">
												<template #label>
													<span class="bpa-form-label"><?php esc_html_e( 'Definir Especialidad/Servicio Solo Particular:', 'bookingpress-appointment-booking' ); ?> </span>
												</template>
												<el-checkbox class="bpa-form-control bpa-form-control--number" id="expansion_service_only_particular" name="expansion_service_only_particular" v-model="service.expansion_service_only_particular" >Activar si el servicio solo se brinda de forma Particular.</el-checkbox>
											</el-form-item>
										</el-col>
									</el-row>
								</div>
            <?php
        }
        function add_edit_service_more_vue_data(){
            ?>
            vm2.service.expansion_service_only_particular = false;
            vm2.service.expansion_service_only_particular = Number(response.data.is_only_particular)? true : false;
            <?php
        }
    }
    
    global $expansion_extend_fields_services;
    $expansion_extend_fields_services = new Expansion_Extend_Fields_services();
 }
