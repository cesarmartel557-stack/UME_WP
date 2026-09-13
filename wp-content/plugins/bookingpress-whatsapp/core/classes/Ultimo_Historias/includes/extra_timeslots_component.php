<?php

/**
 * @author FoatConcept - Maximiliano Suarez <cv.msuarez@gmail.com>
 * @copyright 2025
 */


function bpress_Expansion_add_TimeSlotComponent()
{
    global $BookingPress, $bookingpress_common_date_format;
    $bookingpress_common_datetime_format = $bookingpress_common_date_format . ' HH:mm';
	$bookingpres_default_time_format = $BookingPress->bookingpress_get_settings('default_time_format','general_setting');
    
    /**
     * v-model="appointment_formdata.appointment_booked_time"
     * :value="appointment_time.store_start_time"
     */

    /**
    <!--
    {{fecha_elejida}} - {{ (new Date( fecha_elejida+'T00:00:00' ).getDay()) }}
    <br>
        {{ JSON.stringify( staff_work_times[(new Date( fecha_elejida+'T00:00:00' ).getDay())] ) }}
    <br>
    -->
    */

    add_action('bookingpress_add_column_outsite', function() {
        defined('BK_EXPANSION_DATE_COLUMN') || define('BK_EXPANSION_DATE_COLUMN', TRUE);
        ?>
                            <el-table-column  class-name="out_of_time bk_expansion_date-col" prop="appointment_date" min-width="120"   label="<?php esc_html_e( 'Fecha', 'bookingpress-appointment-booking' ); ?>" sortable sort-by="sort_appointment_date_time">
								
                                <template slot-scope="scope">
                                <div>                                    
									<label class="bpa-item__date-col">{{ scope.row.appointment_date }}
                                    <!--<span class="material-icons-round ">more_time</span>-->
                                    <el-tooltip :content="scope.row.is_out_time_content || '<?php esc_html_e('Sobre Turno', 'bookingpress-appointment-booking'); ?>' " placement="top" v-if="scope.row.is_out_time">
										&nbsp;<span class="material-icons-round bk-expansion-out_of_time-icon" v-if="scope.row.is_out_time == 1">more_time</span>
									</el-tooltip>
                                    </label>
                                    
                                </div>
                                <div style="display: inline;">    
									<el-tooltip content="<?php esc_html_e('Rescheduled', 'bookingpress-appointment-booking'); ?>" placement="top" v-if="scope.row.is_rescheduled == 1">
										<span class="material-icons-round bpa-rescheduled-appointment-icon" v-if="scope.row.is_rescheduled == 1">update</span>
									</el-tooltip>
                                </div>
                                    
								</template>
							</el-table-column>
        <?php
        /**
        add_action('admin_footer', function(){
            global $bk_expansion_out_of_time_appoint_style_append;
            #$bk_expansion_out_of_time_appoint_style_append = 1;
            if($bk_expansion_out_of_time_appoint_style_append) return;
            
            ?>
<script>
//Vue.config.ignoredElements =["el-table-column","ElTableColumn","vue-component-31-ElTableColumn"];
var bkexpansion_fechaouttimeCol = null;
var bkexpansion_take_app_oncetime = 0;
Vue.mixin({
    beforeCreate: function(){
        if(!bkexpansion_take_app_oncetime && !app){
            bkexpansion_take_app_oncetime = 1;
            bkexpansion_fechaouttime_beforeAppExist_handler();
        }
    },
    mounted: function(){
        
        if( (this.$options.propsData && this.$options.propsData.prop =='appointment_date') && (String(this.$options.propsData.className).includes('out_of_time') === true) ){
            bkexpansion_fechaouttimeCol = {...this};
        }
        if( (this.$options.propsData && this.$options.propsData.prop =='appointment_date') && (String(this.$options.propsData.className).includes('out_of_time') != true)  ){
                if(this.$parent.$el != bkexpansion_fechaouttimeCol.$parent.$el ) return;
                this.$props.minWidth = this.$props.width = "0";
                this.columnConfig.id = "outtime_remplaced_dateCol";
                //this.$destroy();  
                //const removeInstance = this.$el.__vue__ || this.$vnode.elm.__vue__ ;
                //removeInstance.$destroy();
                                
                //app.$refs.multipleTable.doLayout()
        }
        
    }
});



function bkexpansion_fechaouttime_beforeAppExist_handler(){
    const dateCols = document.querySelectorAll('el-table-column[prop="appointment_date"]');
    if( dateCols.length ){
        for(el of dateCols){
            if( !el.getAttribute('class-name') ){
            el.remove();
            }
        };
        
    }
        
}



console.log("add extratimeslot mixin date col");
console.log('mod_manage_appointment linea 461 condicion de fecha de botones comentada x test');

</script>
<style>

.bk-expansion-out_of_time-icon {
    color: #9E9E9E; vertical-align: middle; font-size: 22px; color: currentColor; opacity: 0.3;
    margin-left: 4px;
}

.el-table:has(.out_of_time) .outtime_remplaced_dateCol,
.el-table:has(.out_of_time) colgroup col[name=outtime_remplaced_dateCol] {
    display: none;
    max-width: 0;
    height: 0;
    overflow: hidden;
    text-overflow: clip;
    
}

</style>
            <?php 
            $bk_expansion_out_of_time_appoint_style_append = 1;
            },100);
            
            */
    }, 10);
    
    
    add_action('bookingpress_add_appointment_field_section', function() use($bookingpress_common_date_format, $bookingpres_default_time_format){
       
       if( !current_user_can('expansion_sobre_turnos') ) return;
       ?>
       <el-col :xs="24" :sm="24" :md="24" :lg="08" :xl="08">
		
			<label class="bpa-form-label" style="display: flex;align-items: center;gap: 20px;">
                <span style="padding: 2px 0;">Sobre Turnos</span>
                <el-tooltip effect="dark" placement="top-end" content=" Especialidad y medico requeridos " popper-class="bkexp-is-in-dialog--tooltip" >
                    <span class="dashicons dashicons-editor-help"></span>
                </el-tooltip>
            </label>
            <bpexp-extratimeslots instance-name="add_sobreturnos" 
            btn-text="<?php esc_html_e( 'Agregar Sobre Turno', 'bookingpress-appointment-booking' ); ?>"
            dialog-title="<?php esc_html_e( 'Nuevo Sobre Turno', 'bookingpress-appointment-booking' ); ?>"
            slot-title="<?php esc_html_e( 'Sobre Turno', 'bookingpress-appointment-booking' ); ?>"
            dateformat="<?php echo esc_html($bookingpress_common_date_format); ?>"
            timeformat="<?php echo esc_html($bookingpres_default_time_format); ?>"
            texto-ocupado="reserva en"
            :t-pickopts="{start: '07:00',step: '00:05',end: '19:00'}"
            :staff_id="appointment_formdata.selected_staffmember? appointment_formdata.selected_staffmember:appointment_formdata.appointment_selected_staff_member"
            :service_id="appointment_formdata.appointment_selected_service"
            :serv_dtime="appointment_formdata.selected_service_duration"
            :serv_dunit="appointment_formdata.selected_service_duration_unit"
            :var_notify="$notify"
            :on-confirm-update-tslots="appointment_time_slot"
            on-confirm-update-tslotsvarname="appointment_time_slot"
            :on-confirm-update-date="select_appointment_booking_date"
            @extraslot-change="(slot_data)=>{appointment_time_slot = slot_data }"
            ></bpexp-extratimeslots>
            
		<!--<span style="color: crimson;"> {{appointment_formdata.selected_service_duration}}  {{appointment_formdata.selected_service_duration_unit}} </span>-->
	</el-col>
    
       <?php 
    },30);
    
    /** :staffservice_ids="sel_staff_service"  <!--{{staff_id}} {{service_id}}--> */
?>
<template id="BPressExpansion_Extra_TimeSlots">
    <div>
        
        <el-button @click="toggle_extra_timeSdialog" plain :staffservice_ids="JSON.stringify(sel_staff_service)" :disabled="!Number(service_id) || !Number(staff_id)">
            {{btnText}}
        </el-button>
        
        <el-dialog class="extratS-dialog" :visible.sync="extra_timeSdialog" :title="dialogTitle+' \t | \t '+selected_service_name" width="500" style="background-color: #00000030;color:#2196f3;" append-to-body>
            
            <div class="staff-work-days">
                <div class="staff-work-days-header">
                    <span>{{ selected_staff_name }}</span> 
                    <el-tooltip effect="light" placement="top" content="Horarios de atención" popper-class="bkexp-is-in-dialog--tooltip">
                    <span class="staff-work-days-info" ><span class="dashicons dashicons-arrow-down" style="font-size: 22px;"></span><input type="checkbox" class="staff-work-days-check" /></span>
                    </el-tooltip>
                    <el-tooltip effect="light" placement="top" content="Verificar vacaciones y días especiales. Info/Horario generado automaticamente, pueden existir variaciones " popper-class="bkexp-is-in-dialog--tooltip" >
                    <span class="dashicons dashicons-editor-help bkexpansion-txt danger" quitado-tooltip-title="Verificar vacaciones y días especiales. Info/Horario generado automaticamente, pueden existir variaciones " style="position: absolute;right: 0;margin-right: 20px;"></span>
                    </el-tooltip>
                </div>
                
                <div class="staff-work-days-container">
                    <!--<span class="dashicons dashicons-editor-help expansion-tooltip danger" tooltip-title="Verificar vacaciones y días especiales. Info/Horario generado automaticamente, pueden existir variaciones " style="position:relative;float:right;margin:-10px;"></span>-->
                    
                    <div v-for="(sday_data, dayKey) in staff_work_times" :key="dayKey">
                        
                        <div v-if="typeof sday_data == 'object' && Object.entries(sday_data).length">
                            <span style="color:#2196f3;"><!--{{ Object.entries(sday_data)[0][1][0].weekday }}-->
                            {{ (bk_expansion_to_locale_weekDay[Object.entries(sday_data)[0][1][0].weekday]?bk_expansion_to_locale_weekDay[Object.entries(sday_data)[0][1][0].weekday]:Object.entries(sday_data)[0][1][0].weekday ) }}
                            </span>
                        </div>
    					
                        <div v-for="(sday, snum) in sday_data" >
                            &nbsp;&nbsp; 
                            <span class="work-servname">{{ sday.at(0).service_name }}</span>
    						
    						<span v-for="(wday, wind) in sday" >
                            {{( Number(wday.is_break)?', Pausa ':'' )}} de {{ moment(wday.start_time,'HH:mm:ss').format('HH:mm') }} a {{ moment(wday.end_time,'HH:mm:ss').format('HH:mm') }}  
    						</span>
                        </div>
                    
                    </div>
                </div>
                
                <div style="padding: 10px 20px;">
                    <div style="margin-bottom: 5px;"><span>Horario especial próximo del <span style="color: darkviolet;">medico</span> en esta <span style="color: darkviolet;">especialidad.</span></span></div>
                    
                    <div v-if="staff_spec_days.length" class="work-special-list">
                        <ul>
                            <li v-for="specialDay in staff_spec_days">
                                <span v-if="specialDay.ini_date && specialDay.end_date"> 
                                    del {{ Intl.DateTimeFormat("lookup",{day: "numeric",month: "long"}).format( new Date(specialDay.ini_date) ) }}
                                    al {{ Intl.DateTimeFormat("lookup",{day: "2-digit",year: "numeric",month: "long"}).format( new Date(specialDay.end_date) ) }}
                                    de {{ String(specialDay.start_time).substring(0, 5) }} a {{ String(specialDay.end_time).substring(0, 5) }}
                                </span> 
                            </li>
                        </ul>
                    </div>
                    <div v-else class="work-special-list">
                        &nbsp;&nbsp;<span>No se encontró horario especial próximo en esta especialidad.</span>
                    </div>

                </div>
            </div>
            
                            
            <div class="extraS-container" style="">
                <el-date-picker
                class="bpa-form-control bpa-form-control--date-picker"
                v-model="fecha_elejida"
                type="date"
                :format="dateformat"
                value-format="yyyy-MM-dd"
                placeholder="Seleccionar Fecha"
                :picker-options="d_pickOpts"
                style="margin: 4px;"
                @change="create_times"
                ></el-date-picker>
                <!--
                <el-time-select
                class="bpa-form-control "
                style="margin: 4px;"
                v-model="hora_elejida"
                format="HH:mm"
                placeholder="Selecciona Hora"
                :picker-options="tPickopts"
                style="margin: 4px;"
                filterable
                ></el-time-select>
                -->
                <!-- v-if="work_timings.start_time != workhours_timings[work_hours_day.day_name].end_time || workhours_timings[work_hours_day.day_name].end_time == 'Off'" -->
                
                <el-select v-model="hora_elejida" style="margin: 4px;"
                class="bpa-form-control bpa-form-control__left-icon workstaff-sel-time" 
                placeholder="Seleccionar Hora de inicio"
                filterable
                clearable
                >
        			<span slot="prefix" class="material-icons-round">access_time</span>
        			<el-option class="workstaff-opts-time" v-for="date_times in created_times" :label="date_times.label" :value="date_times.value" :class="date_times.type" >
                        <div v-if="date_times.busy" class="staff-busy">
                        <span>{{date_times.value}}</span> <span>{{ textoOcupado || date_times.type}}</span> <span>{{date_times.sname}}</span>
                        </div>
                        <div v-else>
                        <span>{{date_times.value}}</span>
                        </div>
                    </el-option>
        		</el-select>
                
                <span v-if="is_personal_duration" style="color: lightsteelblue;display: block;text-align: right;font-size: 80%;">El m&eacute;dico posee Duraci&oacute;n personal para este servicio</span>
                
                <?php if( isset($_GET['testy2']) ){ //@change="bookingpress_set_workhour_value($event,work_hours_day.day_name)"  ?>
                <el-select v-model="hora_elejida" class="bpa-form-control bpa-form-control__left-icon" placeholder="Selecciona Hora"
        			filterable>
        			<span slot="prefix" class="material-icons-round">access_time</span>
        			<el-option v-for="work_timings in work_hours_day.worktimes" :label="work_timings.formatted_start_time" :value="work_timings.start_time" v-if="work_timings.start_time != workhours_timings[work_hours_day.day_name].end_time || workhours_timings[work_hours_day.day_name].end_time == 'Off'"></el-option>
        		</el-select>
                <?php } ?>
                
            </div>
            <template #footer>
                <div class="dialog-footer">
                    <el-button @click="toggle_extra_timeSdialog">Cancel</el-button>
                    <el-button type="primary" @click="bpress_Expansion_extratimeslots_on_datetime_confirm">
                    Aplicar
                    </el-button>
                </div>
            </template>
        </el-dialog>
        <div class="bpexp-block-load" :class="block_in_load?'show':''">
            <h4 style="color: white;">cargando...</h4>
        </div>
    </div>    
</template>
<script>
var bk_expansion_extratimeslots_nonce = "<?php echo wp_create_nonce( 'booking_Expansion_staff_service_disable_days' ); ?>";
var bk_expansion_currentwp = "<?php echo json_encode( get_current_user_id() ) ; ?>";

var bk_expansion_to_locale_weekDay = {
    'Sunday': '<?php esc_html_e('Sunday', 'bookingpress-appointment-booking'); ?>',
    'Monday': '<?php esc_html_e('Monday', 'bookingpress-appointment-booking'); ?>',
    'Tuesday': '<?php esc_html_e('Tuesday', 'bookingpress-appointment-booking'); ?>',
    'Wednesday': '<?php esc_html_e('Wednesday', 'bookingpress-appointment-booking'); ?>',
    'Thursday': '<?php esc_html_e('Thursday', 'bookingpress-appointment-booking'); ?>',
    'Friday': '<?php esc_html_e('Friday', 'bookingpress-appointment-booking'); ?>',
    'Saturday': '<?php esc_html_e('Saturday', 'bookingpress-appointment-booking'); ?>',
    
};

</script>
<script id="BPressExpansion_Extra_TimeSlots_js">
window.addEventListener('DOMContentLoaded', function() {
if( typeof Vue == 'undefined' ){ return }
var extra_timeSComponent = ( )=> { Vue.component('bpexp-extratimeslots', {
    props:{ 
        'instance-name': Date.now(), 'btn-text':'abrir modal', 'texto-ocupado': null,
        'dialog-title':'date-time', 'slot-title':'Nuevo slot', 'dateformat': '', 'timeformat': '',
        'd-pickopts': null, 't-pickopts': {start: '00:00',step: '00:05',end: '23:55'},
        'staff_id': 0, 'service_id': 0, 'serv_dtime': '05', 'serv_dunit': 'm', 'on-confirm-update-tslotsvarname': null,
        'var_notify': null, 'on-confirm-callback': '', 'on-confirm-update-tslots': null, 'on-confirm-update-date': null, 
    },
    template: '#BPressExpansion_Extra_TimeSlots',
    data() {
        return {
            block_in_load: false,
            extra_timeSdialog: false,            
            fecha_elejida: '',
            hora_elejida: '',
            instance_extratimeslot : { 'timeslot_label': "Sobre_turnos", 'timeslots':  [] },
            work_dates: [],//["monday","tuesday"],
            work_dates_numbers: [],
            staff_work_times: [],
            dates_off: [],
            staff_spec_days: [],
            staff_busy_times: [],
            created_times: [],
            service_step_time: 0,
            selected_staff_name: '',
            selected_service_name: '',
            pass_value_to_render: "",
            is_personal_duration: 0,
            d_pickOpts: {
                disabledDate(time) {
                  return true;
                }
            }
        };
    },
    computed: {
        /*computed_work_dates_numbers(){
            return this.workdates_to_Numbers( this.work_dates )
        }*/
        sel_staff_service(){
            //console.log( this.staff_id );
            this.bpress_Expansion_extratimeslots_staff_service_daysoff();
            return { 'staff_id': this.staff_id, 'service_id': this.service_id }; 
        },
    },
    methods: {
        create_times(){
            let busy = [];
            if( this.staff_busy_times.length && this.fecha_elejida!='' && (new Date(this.fecha_elejida).getTime()) ){
                busy = this.staff_busy_times.filter( busyTime => new Date(busyTime.date).getTime() == new Date(this.fecha_elejida).getTime() );
            }
            //console.log( ' BUSY LIST ', busy );
            let def_time = {'id':0, 'value':"00:00", "busy":0, 'label':'', 'type':'enable', 'sname':'', 'busy_text':''};
            const newtimes = [];
            let pickOp = this.tPickopts? this.tPickopts : {start: '07:00',step: '00:05',end: '19:00'};
            let jsFirstDate = '1970-01-01';
            let useEvalDate = (new Date(this.fecha_elejida).getTime())? this.fecha_elejida : jsFirstDate;
            let step = new Date(jsFirstDate+' '+pickOp.step+' GMT').getTime();//30 * 60 * 1000; // 30 minutos
                        
            step = this.service_step_time? this.service_step_time : step;
            
            //console.log( 'step ', step, ( new Date(jsFirstDate+' '+pickOp.step+' GMT').getTime() ) ); 
            let start_time = pickOp.start;
            let end_time = pickOp.end;
            
            let currentTime = new Date(useEvalDate+'T'+start_time); // Hora de inicio
            const endTime = new Date(useEvalDate+'T'+end_time); // Hora de fin
            
            //console.log( (new Date('2025-01-01T09:00:00').getMinutes()), (new Date( 0 ).getMinutes()), " fecha cero: "+( new Date( 0 ) ), new Date( 0 ).getTime() );
            
            while (currentTime <= endTime) {
                def_time.id ++;
                let temp_time = {...def_time};
                let hours = String(currentTime.getHours()).padStart(2, '0');
                let minutes = String(currentTime.getMinutes()).padStart(2, '0');
                temp_time.value = temp_time.label = `${hours}:${minutes}`;
                let is_busy = busy.find( (busyTime) =>  
                    currentTime.getTime() == (new Date(useEvalDate+'T'+busyTime.start_time).getTime())
                        || 
                    ( currentTime >= (new Date(useEvalDate+'T'+busyTime.start_time)) && currentTime <= (new Date(useEvalDate+'T'+busyTime.end_time)) )
                        || 
                    ( (new Date(useEvalDate+'T'+busyTime.start_time)) >= currentTime && (new Date(useEvalDate+'T'+busyTime.end_time)) <= (new Date(currentTime.getTime() + step)) )
                );
                if( is_busy != null && is_busy.start_time){
                    temp_time.busy_text = `( ${String(is_busy.start_time).substring(0,5)} - ${String(is_busy.end_time).substring(0,5)} )`;
                    temp_time.busy = 1; temp_time.sname = `${is_busy.sname} ${temp_time.busy_text}`;
                    temp_time.label += ' ocupado '+is_busy.sname+' '+temp_time.busy_text;
                    temp_time.type = "ocupado";
                }
                //console.log('deftime', temp_time, currentTime, endTime);
                //this.$emit('wtime_item', temp_time  );
                newtimes.push( temp_time );
                currentTime = new Date(currentTime.getTime() + step);
            }
            
            
            this.created_times = newtimes;
        },
        set_serviceStepTime(){
            let service_step = Number(this.serv_dtime)? Number(this.serv_dtime) : 0;
            let dunit = String(this.serv_dunit)? String(this.serv_dunit): "h";
            switch( dunit ){
                case "m": service_step *= 60; break;
                case "h": service_step *= 60 * 60; break;
                case "d": service_step *= 60 * 60 * 24; break;
                default : service_step *= 60; break;
            }
            service_step = (service_step * 1000)>=300000? (service_step * 1000) : 300000;
            this.service_step_time = service_step;
        },
        workdates_to_Numbers( work_dates = [] ){
            const dayOfWeek_map = {
                "sunday": 0,
                "monday": 1,
                "tuesday": 2,
                "wednesday": 3,
                "thursday": 4,
                "friday": 5,
                "saturday": 6,
            };
            let wkd_numbs = [];
            for(let wkd of work_dates ){
                wkd_numbs.push( dayOfWeek_map[wkd] );
            }
            //console.log('wkd_numbs', wkd_numbs);
            //this.work_dates_numbers = wkd_numbs
            return wkd_numbs;
        },
        toggle_extra_timeSdialog(){
            const vm_extra_timeS = this;
            if(!this.extra_timeSdialog){
                this.bpress_Expansion_extratimeslots_staff_service_daysoff();
                
                this.work_dates_numbers = this.workdates_to_Numbers( this.work_dates );
                
            }
            //console.log(window.$vm_extra_timeSComponent[this.instanceName]);
            this.extra_timeSdialog = !this.extra_timeSdialog;
            
        },
        reset_instance_extratimeslot(){
            //this.instance_extratimeslot = { 'timeslot_label': "Sobre_turnos", 'timeslots':  [] };
            this.instance_extratimeslot.timeslots = [];
        },
        async bpress_Expansion_add_extra_timeslot( fH_Obj = null ){
            const vm_extra_timeS = this;
            vm_extra_timeS.block_in_load = true;
        try{
            if( !fH_Obj ) fH_Obj = { 'fecha': this.fecha_elejida, 'hora': this.hora_elejida };        
            
            let add_time = Number(this.serv_dtime)? Number(this.serv_dtime):5;
            switch( this.serv_dunit ){
                case 'h': add_time * 60; break;
                case 'd': add_time * 60 * 24; break;
            }
            let fecha_elejida = fH_Obj.fecha;
            let t_start = fH_Obj.hora;//test - t_start = "09:10";
            
            let t_end = t_start;
            
            let temp_start_D = new Date('1970-01-01T'+t_start);
            let temp_end_D = new Date( temp_start_D );
            temp_end_D.setMinutes( temp_end_D.getMinutes() + add_time );
            
            t_end = `${String(temp_end_D.getHours()).padStart(2,'0')}:${String(temp_end_D.getMinutes()).padStart(2,'0')}`;
            
            
            let extra_timeslot = {
                "start_time": t_start,//"08:50",
                "end_time": t_end,//"09:00",
                "break_start_time": "",
                "break_end_time": "",
                "store_start_time": t_start,//"08:50",
                "store_end_time": t_end,//"09:00",
                "store_service_date": fecha_elejida,
                "is_booked": 0,
                "max_capacity": "1",
                "total_booked": 0,
                "disable_flag_timeslot": false,
                "max_total_capacity": "1",
                "css_animation_class": "bpa-front--ts-item-1",
                "formatted_start_time": t_start,//"08:50",
                "formatted_end_time": t_end,//"09:00",
                "formatted_start_end_time": `${t_start} ${t_end}`,//"08:50 09:00",
                "class": "",
                "sobre_turno": 1,
                "wpu": bk_expansion_currentwp,
            };
            
            var_to_update = this.onConfirmUpdateTslots; //variable clonada de time_slot 
            
            var newslots = {
                'extra_time': { 'timeslot_label': "Sobre Turnos", 'timeslots':  [ extra_timeslot ] },
                'last_time': { 'timeslot_label': "", 'timeslots':  [ ] }
            };
            var newslotsJSON = JSON.stringify( {...newslots} );
            //SETEO PREVIO DE TIMESLOTS------------------- PARA IR MOSTRANDO
            vm_extra_timeS.update_onConfirmVarname( newslots );
        
            const awaitSlotChange = {
                then(resolve) {
                    var_to_update._awaitchange = 1;
                                        
                    this.init_time = Date.now();
                    this.interv = setInterval(()=>{
                        //console.log('--update-var:', var_to_update, app.appointment_time_slot);
                        if( !var_to_update._awaitchange ){
                            clearInterval(this.interv);
                            console.log("extratimeslot_resolved");
                            resolve("changed");
                        }
                        if(Date.now() > (this.init_time+(2*1300)) ){
                            clearInterval(this.interv);
                            delete var_to_update._awaitchange;
                            console.log("extratimeslot_limit");
                            resolve("time_limit");
                            //reject("changed");
                        }
                    },500);
                  
                },
            };
            if( this.onConfirmUpdateDate ){
                if(typeof this.onConfirmUpdateDate == 'function'){
                    //app.select_appointment_booking_date( fecha_elejida )
                    this.onConfirmUpdateDate( fecha_elejida )
                }else{
                    this.onConfirmUpdateDate = fecha_elejida
                }
            }
            
            await awaitSlotChange;
                        
            setTimeout(()=>{
            
            /** CHANGE MORNING TIME FUNCIONA....
            vm_extra_timeS.$forceUpdate();            
            vm_extra_timeS.onConfirmUpdateTslots.morning_time = JSON.parse(newslotsJSON).extra_time;
            */                              
                    if( !vm_extra_timeS.update_onConfirmVarname(JSON.parse(newslotsJSON)) ){
                        console.log("variable Root NOO actualizada");
                    }
                    vm_extra_timeS.$emit('extraslot-change', JSON.parse(newslotsJSON) );
                    //SIIIIIIIIIIIIIIIIIIIII ESOOO ESS-->> vm_extra_timeS.$emit('extraslot-change', JSON.parse(newslotsJSON) );
                    vm_extra_timeS.block_in_load = false;
                    vm_extra_timeS.var_notify({
    					title: 'SobreTurnos',
    					message: 'Se ha habilitado el horario!  Selecciona !',
    					type: 'success',
    					customClass: 'success_notification',
    				});
                
            }, 10 );
        }catch( e ){
            console.log(e);
            vm_extra_timeS.block_in_load = false;
            vm_extra_timeS.var_notify({
					title: 'SobreTurnos',
					message: 'Fallo carga de sobreturno',
					type: 'error',
					customClass: 'error_notification',
				});
        }
        
        },
        update_onConfirmVarname( newval = [] ){
            const vm_extra_timeS = this;
            if( typeof vm_extra_timeS.onConfirmUpdateTslotsvarname == 'string' && vm_extra_timeS.onConfirmUpdateTslotsvarname!='' ){
                let rootvarname = vm_extra_timeS.onConfirmUpdateTslotsvarname;
                if( typeof vm_extra_timeS.$root[rootvarname] != 'undefined'){
                    vm_extra_timeS.$root[rootvarname] = newval;
                    return true;
                }
            }
            return false;
        },
        bpress_Expansion_extratimeslots_on_datetime_confirm(){
            const vm_extra_timeS = this;
            setTimeout(()=>{ vm_extra_timeS.extra_timeSdialog = false; },10);
            let fH_Obj = { 'fecha': this.fecha_elejida, 'hora': this.hora_elejida };
            if( typeof this.onConfirmCallback == 'function'){
                return this.onConfirmCallback( fH_Obj );
            }
            
            return this.bpress_Expansion_add_extra_timeslot( fH_Obj );
        },
        bpress_Expansion_extratimeslots_staff_service_daysoff(){
			const vm_extra_timeS = this;
            if(!Number(vm_extra_timeS.service_id) ) return;
			var bkexp_staff_service = {
				action:'booking_Expansion_staff_service_disable_days',
				selected_service_id: vm_extra_timeS.service_id,
				selected_staff_id: vm_extra_timeS.staff_id,
				_wpnonce: bk_expansion_extratimeslots_nonce
			}				
			axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( bkexp_staff_service ) )
			.then(function(response) {
                //console.log(response);
                    if( response.data.variant == 'success' ){
                        let resdata = response.data;
                        vm_extra_timeS.work_dates = resdata.work_off_data
                        vm_extra_timeS.selected_staff_name = resdata.selected_staff_name
                        vm_extra_timeS.selected_service_name = resdata.selected_service_name
                        vm_extra_timeS.work_dates_numbers = vm_extra_timeS.workdates_to_Numbers( vm_extra_timeS.work_dates );
                        vm_extra_timeS.staff_spec_days = resdata.staff_enable_spec_days;
                        vm_extra_timeS.dates_off = resdata.dates_off;
                        vm_extra_timeS.staff_work_times = resdata.staff_work_times;
                        vm_extra_timeS.staff_busy_times = resdata.staff_busy_times;
                        
                        
                        vm_extra_timeS.set_serviceStepTime();
                        vm_extra_timeS.create_times();
                        
                        if( resdata.custom_staff_duration && Number(resdata.custom_staff_duration.d_val) ){
                            vm_extra_timeS.serv_dtime = resdata.custom_staff_duration.d_val;
                            vm_extra_timeS.serv_dunit = resdata.custom_staff_duration.d_unit;
                            //console.log( resdata.custom_staff_duration )
                        }
                        
                        vm_extra_timeS.is_personal_duration = 0;
                        if( resdata.is_personal_duration ) vm_extra_timeS.is_personal_duration = 1;
                        
                    }else{
                        throw new Error('Fallo a obtener días laborales.');
                    }
                
				}).catch(function(error){
				console.log(error);
				vm_extra_timeS.var_notify({
					title: 'Error',
					message: 'Algo salió mal..',
					type: 'error',
					customClass: 'error_notification',
				});
			});
		},
        bookingpress_set_time(event,time_slot_data) {
            const vm = this.$root;
            if(event != '' && time_slot_data != '') {
                for (let x in time_slot_data) {
                    var slot_data_arr = time_slot_data[x];                        
                    for(let y in slot_data_arr) {
                        var time_slot_data_arr = slot_data_arr[y];
                        for(let m in time_slot_data_arr) {
                            var data_arr  = time_slot_data_arr[m];
                            if(data_arr.store_start_time != undefined && data_arr.store_end_time != undefined && data_arr.store_start_time == event) {
                                vm.appointment_formdata.appointment_booked_end_time = data_arr.store_end_time;
                                if( data_arr.sobre_turno ){
                                    vm.appointment_formdata.is_out_of_time = 1;
                                    vm.appointment_formdata.wpu = data_arr.wpu;
                                }else{
                                    vm.appointment_formdata.is_out_of_time = 0;
                                }
                            }
                        }
                    }
                }
            }
        },
    },
    created(){
        const vm_extra_timeS = this;
        //Comentado Setting By Default PROP - if(typeof vm_extra_timeS.instanceName == 'undefined') vm_extra_timeS.instanceName = Date.now();
        if(typeof window.$vm_extra_timeSComponent  == 'undefined') window.$vm_extra_timeSComponent = [];
        window.$vm_extra_timeSComponent[vm_extra_timeS.instanceName] = vm_extra_timeS;
        
        if( typeof this.$root.bookingpress_set_time == 'function'){
            //remplazando funciopn en addAppointment
            this.$root.bookingpress_set_time = this.bookingpress_set_time;
        }
        
        console.log( 'Continuar in_special extratimeslots  linea 470' );
        
        this.d_pickOpts = {
            disabledDate(time) {
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                if ( time < today.getTime() ){
                    return true;
                }else if( time < (today.getTime() + (23 * 60 * 60 * 1000) + ( 59 * 60 * 1000 ) ) ){
                    return false; //Deberia estar calculando dentro del dia corriente - lo habilitamos
                }
                let in_special = null;
                in_special = vm_extra_timeS.staff_spec_days.find( in_time =>( ((time/1000) >= in_time.ini_dtimes) &&  ( (time/1000)<=in_time.end_dtimes) ));
                if( in_special ) return false;
                // vm_extra_timeS.staff_spec_days: [],
                // vm_extra_timeS.dates_off: [],
                let in_dateOff = null;
                if( typeof vm_extra_timeS.dates_off.dtimes == 'object' ){
                    in_dateOff = vm_extra_timeS.dates_off.dtimes.find( in_time =>( ((time/1000) >= in_time.ini_dtimes) &&  ( (time/1000)<=in_time.end_dtimes) ));
                }
                if( in_dateOff ) return true;
                //Dia de la semana  numero  Index
                const dayOfWeek = new Date(time).getDay();
                
                return vm_extra_timeS.work_dates_numbers.includes( dayOfWeek );
            },
            firstDayOfWeek: 1,//Number(bookingpress_start_of_week)?Number(bookingpress_start_of_week):1,
        };
        //console.log( " created extratimeslots", vm_extra_timeS);
                
    },
    mounted(){},
});

};
extra_timeSComponent();

})
</script>
<style>
.bkexp-is-in-dialog--tooltip {
    z-index: 9999 !important;
}
.bpexp-block-load {
    width: 100%;
    height: 100%;
    background: #1d486c10;
    min-width: 80vw;
    min-height: 50vh;
    position: fixed;
    bottom: 0;
    left: 0;
    transition: all 0.4s;
    opacity: 0;
    display: none;
    z-index: -1;
}
.bpexp-block-load.show {
    background: #1d486c21;
    z-index: 5;
    opacity: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: wait;
}

.extratS-dialog.el-dialog__headerbtn {
    top: 20px !important;
    right: 20px !important;
}
.extratS-dialog .el-dialog {
    max-width: 800px;
}
.extraS-container {
    min-height: 100px;
}

ul.el-scrollbar__view.el-select-dropdown__list {
    padding-bottom: 12px !important;
}
.bpa-dialog--fullscreen .bpa-dialog-heading {
    z-index: 3;
}

/*
.staff-work-days-container {
    outline: 1px solid dimgray;
    padding: 4px;
    border-radius: 8px;
    display: none;
    opacity: 0;
    transition: all 0.3s;
}*/
.staff-work-days {
    padding-left: 10px;
}
.staff-work-days-header {
    padding: 14px 0;
    font-size: large;
    display: flex;
}

span.staff-work-days-staffname {
    padding: 2px 0 0 2px;
}
.staff-work-days-info {
    position: relative;
    display: inline-flex;
    justify-content: center;
    align-items: end;
}
.staff-work-days-check {
    position: absolute;
    opacity: 0;
    margin: 0;
    width: 100%;
    height: 100%;
}
.staff-work-days-container {
    outline: 1px solid #e6e6fa87;
    border-radius: 8px;
    /* display: none; */
    opacity: 0;
    transition: all 0.3s ease-in-out;
    transition-property: padding, opacity, max-height, outline;
    max-height: 0px;
    padding: 0px 30px;
    overflow: hidden;
    margin-left: 10px;
}

.staff-work-days-header:has(.staff-work-days-check:checked) .staff-work-days-info {
    color: dodgerblue;    
}
.staff-work-days-header:has(.staff-work-days-check:checked)+.staff-work-days-container {
    /* display: block; */
    opacity: 1;
    max-height: 1024px;
    padding: 30px;
    outline: 1px solid lavender;
}
.staff-work-days-container {
    color: var(--bpa-dt-black-200);
}
.work-servname {
    color: var(--bpa-dt-black-300);
}

.work-special-list {
    padding-left: 12px;
    color: var(--bpa-dt-black-200);
}

.expansion-tooltip {
    position: relative;
    cursor: pointer;
    z-index: 2;
    color: #e42b20c7;
}
.bkexpansion-txt.info,
.expansion-tooltip.info {
    color: lavender;
}
.bkexpansion-txt.warning, 
.expansion-tooltip.warning {
    color: #e49720;
}
.bkexpansion-txt.danger , 
.expansion-tooltip.danger {
    color: #e42b20c7;
}
.expansion-tooltip:hover:after {
    content: attr(tooltip-title);
    position: absolute;
    transform: translateX(-100%);
    background-color: #2d2d2c;
    color: #ffffff;
    padding: 6px 10px;
    border-radius: 4px;
    white-space: nowrap;
    z-index: 20;
    font-size: 11px;
    top: 0;
    left: 0;
    margin-top: -15px;
    display: flex;
    align-items: center;
    min-height: 12px;
}
.workstaff-opts-time.el-select-dropdown__item div {
    display: flex;
    gap: 30px;
}
.workstaff-opts-time.el-select-dropdown__item span {
    /*color: gray;*/
}
.workstaff-opts-time.el-select-dropdown__item.ocupado span {
    color: #708090c9;
}
.workstaff-opts-time.el-select-dropdown__item span:nth-of-type(2) {
    color: slateblue;
    color: #6565c894;
}
.workstaff-opts-time.el-select-dropdown__item span:nth-of-type(3) {
    color: darkviolet;
    color: #9400d361;
}
.staff-busy span {
    min-width: 40px;
}
</style>
<?php



}