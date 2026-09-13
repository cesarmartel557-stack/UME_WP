<div class="overlay_container"></div>
<div class="vue_mod" >

<?php   include_once __DIR__ . '/descripciones_medicos.php';    ?>

<!-- 
<script src="https://unpkg.com/vue-multiselect"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-multiselect/dist/vue-multiselect.css">
-->
<!--
  <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
  <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
-->
  <script src="<?php echo BKMOD_SRC.'/vue-multiselect.min.js'; ?>"></script>
  <link rel="stylesheet" href="<?php echo BKMOD_SRC.'/vue-multiselect.min.css'; ?>">


<style>
:root{
    --principal-green: #22B49B;/*#2dc2a5;*/
    --principal-disable: #a6a6a6;
    --principal-font: Arial !important;
    
}

.vue_mod {
    display: none;
}
.overlay_container {
    position: fixed;
    width: 90vw;
    height: 80vh;
    top: 10vh;
    left:  5vw;
    z-index: 9999999999999;
    display: none;
}
.overlay_container {
    position: fixed;
    width: 100vw;
    height: 100vh;
    top: 0vh;
    left: 0vw;
    z-index: 9999999999999;
    display: none;
    flex-direction: column;
    background: #00000070;
    justify-items: center;
    justify-content: center;
}
.overlay_container.show {
    display: flex;
    align-items: center;
    box-shadow: 0 0 100px 100px #0000005e;
    background: #000000b5;
}
.overlay_container>div{
    max-height: 80vh !important;
    max-width: 90vw;
    border-radius: 10px;
}

.obra_social, .plan_obra_social {
    display:none;
}
.bpa-field-main-col:has(.obra_social),
.bpa-field-main-col:has(.plan_obra_social) {
    display:none;
}


.option__desc.grupo {
    
    //font-size: 20px;
    //text-decoration: underline;
}

.option__desc.grupo {
    font-size: 20px;
    /* text-decoration: underline; */
    /* border-bottom: 1px solid gray; */
    padding: 0;
    //color: black;
    /* text-align: center; */
}
li.multiselect__element {
    //margin: 0px 10px;
    border-bottom: 1px solid #c9d4cb1a;
    padding: 2px 10px;
}
.multiselect__element:has(.option__desc.grupo) {
    //height: 30px;
    padding: 0;
    margin: 0;
    
}
span.multiselect__option:has(.option__desc.grupo) {
    background: #a1e1e1b8;
    background: white;
}
span.cupos {
    //float: right;
    color: forestgreen;
    color: var(--principal-green);
}
.multiselect__option:hover span.cupos,.multiselect__option--highlight span.cupos {
    color: white;
    color: dimgrey;
}

span.cupos.sin-cupos {
    color: var(--principal-disable);//white;
    /* float: right; */
}



.obra_soc_seguros {
    margin-bottom: 20px;
    transition: all 0.3s cubic-bezier(0.59, 0.03, 0.67, 0.96)
}
.bpa-field-main-col:has(.obra_soc_seguros) {
    margin-top: -20px;
    margin-bottom: 5px !important;
}
.bpa-bdf--single-col-item:has(.obra_soc_seguros) {
    padding-top: 10px;
}
div:has(>.hide_me){
    overflow: hidden;
    transition: all 0.5s;
}
.hide_me {
    transition: all 0.5s ease;
    opacity: 0;
    margin-top: -100px;
    z-index: 0;
}

#obs_seg_price{
    //margin-top: 25px;

}
/*
#obs_seg_price:has(>.aviso_price) {
    opacity: 1;
    
}*/

#obs_seg_price {
    transition: all 0.3s ease-in 0.2s;
    opacity: 0;
}
div:has(input[value=particular]:checked) #obs_seg_price {
    opacity: 1;
}

/*
#obs_seg_price div.aviso_price {
    opacity: 0;
    transition:  opacity 0.8s ease;
    //padding-left: 20px;
    color: #29b26d;
    padding: 2px;
    text-align: center;
    border-bottom: 1px solid;
    color: var(--principal-green);
}*/
#obs_seg_price div.aviso_price {
    opacity: 0;
    transition: opacity 0.8s ease;
    //padding-left: 20px;
    color: #29b26d;
    padding: 2px;
    /* text-align: center; */
    /* border-bottom: 1px solid; */
    color: var(--bpa-pt-main-green);
}

#obs_seg_price div.aviso_price.con-valor {
    transition: opacity 0.8s ease;
    opacity: 1;
    padding-top: 30px;
}

.fade-enter-active{
    transition:  opacity 0.5s ease;
    //opacity: 1;
}
.fade-leave-active {
    transition:  opacity 0.5s ease;
    //opacity: 1;
    
}

.fade-enter-from,
.fade-leave-to {
    opacity: 1;
}

.bpa-front-dc--body {
    //min-height: 800px !important;
}



.presentar_doc{
    text-align: center;
}

.presentar_title {
    color:var(--bpa-pt-main-green);
    text-align: center;
}

.presentar {
    display: flex;
    flex-direction: row;
    /* min-height: 100px; */
    align-content: center;
    flex-wrap: wrap;
    justify-content: center;
    
    font-size: 16px;
    font-weight: 500;
    line-height: 20px;
    color: var(--bpa-dt-black-400);
    font-family: var(--principal-font);
}

.presentar span {
    margin: 5px;
    display: flex;
    padding: 2px;
    min-width: 100px;
    align-items: center;
    justify-content: center;
    height: fit-content;
    outline: double 4px lightgray;
}
.presentar span {
    margin: 5px;
    display: flex;
    padding: 2px;
    min-width: 100px;
    align-items: center;
    justify-content: center;
    height: fit-content;
    outline: solid 1px #d3d3d359;
    border-radius: 5px;
}

/* COLOR DE OPCIONES------------------------------------- */
.multiselect__option--disabled {
    background: #d1cdcd;
    /* color: #f2f6fc; */
}
.multiselect__option--selected::after {
    /* font-size: 15px; */
    text-shadow: 1px 1px 2px #31e4b1fc;
    display: flex;
    align-items: center;
    height: 100%;
    background: unset;
}
.multiselect__option--selected.multiselect__option--highlight:after {
    background: unset;
    //content: attr(data-deselect);
    //color: #fff;
}
.multiselect__option--selected {
    background: #5495d5;
    background: #bfdbee66;
    color: #35495e;
    font-weight: 700;
}
.multiselect__option--highlight{
    background: unset;
    color: unset;
}
.multiselect__option:hover {
    /* background: unset; */
    color: var(--bpa-dt-black-300);
    color: white;
    /* background: #2dc2a5; */
    background: var(--bpa-pt-main-green);
    background-color: #d3e6ef;
    text-shadow: -2px -2px 1px #ececec3b;
    color: dimgrey;
}

.multiselect__option--selected.multiselect__option--highlight {
    background: #6aabff;
    color: #fff;
}


.el-form-item__content {
    line-height: inherit;
    /* font-size: 10px; */
}
.multiselect, .multiselect__input, .multiselect__single {
    font-family: Poppins;
    font-family: var(--principal-font);
    font-size: 13px;
}
.option__desc {
    font-size: 13px;
    font-family: Poppins;
    font-family: var(--principal-font);
    line-height: 20px;
    /*border-bottom: 1px solid #71df783d;*/
    /*border-bottom: 1px solid #71df781a;*/
}


span.multiselect__option {
    margin: 0;
    /*max-height: 35px;*/
    min-height: 20px;
    font-weight: 500;
}
span.multiselect__option {
    margin: 0;
    /* max-height: 35px; */
    min-height: 20px !important;
    font-weight: 500;
    /* height: 100%; */
    padding: 5px;
    white-space: normal;
}


.multiselect__element:has([particular=true]) {
    display: none;
}

.aviso_obras {
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 1px gray;
    margin: 10px 0px;
    background: #fff3cd;/*#f3f6899e;*/
    transition: all 0.5s ease;
    color: gray;
}
/*
.aviso_obras {
    padding: 10px;
    border-radius: 5px;
    margin: 10px 0px;
    transition: all 0.5s ease;
    color: grey;
}*/
.asterisco-green{
    color: var(--principal-green);
    margin-right: 2px;
}
label[for=obra_soc_seguros] {
    display: none;
}
.bpa-bd-fields--sel-container:has(.obra_soc_seguros) {
    z-index: 2;
}
.bp_multiselect__input {
    border: 1px solid #096f95;
    border-radius: 5px;
}


.aviso_obras>div>span, .adicional_costo {
    display: none;
}


.is_particular .acepta_solo_particular {
    padding: 3px 12px;
    border-radius: 3px;
    background: #d7f5ff;
    margin: 0 0px 0 100px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    max-width: 350px;
}

.is_particular:has(.acepta_solo_particular) label.el-radio:has([value^=obra]) {
    opacity: 0.4;
}
.is_particular:has(.acepta_solo_particular) label.el-radio:has([value^=obra]):before {
    content: ' ';
    width: 100%;
    position: absolute;
    cursor: default;
    height: 100%;
    z-index: 2;
}

.bp_multiselect__input:has(+.v-enter-active) {
    opacity: 0;
}
</style>

<div id="main_obs_seg" class="obs_seg_main">
<!-- group-values="opciones" group-label="grupo" --> <!-- select-label="Click/Enter para seleccionar" deselect-label="Click/Enter para quitar" -->
    <div id="obs_seg_select" vif=" max.appointment_step_form_data ==null || max.appointment_step_form_data !=null && max.appointment_step_form_data.form_fields.is_particular != 'particular' "> 
       <!-- <label class="typo__label">Obras Sociales / Seguros con convenio</label> --> 
        <multiselect class="bp_multiselect__input" v-model="obs_value" label="label" track-by="label" @open="multiOpen()" @close="multiClose()" selected-label="&#10003; " :allow-empty="false"  :group-select="false" :options="checkOptions()"  :searchable="false" :close-on-select="true" :show-labels="true"  select-label="" deselect-label="&#10003; "   placeholder="Selecciona una opcion." > 
            <template #singleLabel="props">
            <span class="option__desc" >
                <span class="option__title">{{ props.option.label }}</span>
                <small class="label2">{{ props.option.sss_name || ''}}</small>
            </span>
            </template>
            <template #option="props" :disabled="props.option.disabled" >
                <div v-if="props.option.grupo" class="option__desc grupo">
                    <span  class="option__title">{{ props.option.grupo }}</span>&nbsp;
                </div>
                <div v-if="props.option.grupo == null || props.option.grupo==false" class="option__desc" v-bind:particular="(props.option.value=='particular'?true:false)">
                     
                    <span  class="option__title" :data-rnas="Number(props.option.rnas) || ''">{{ props.option.label }}</span>&nbsp;
                    <span v-if="mobile==false && props.option.grupo==false && props.option.limitado && props.option.cupos>0 " class="option__small cupos">( {{ props.option.cupos }} cupos disponibles)</span>
                    <span v-if="mobile==false && props.option.grupo==false && props.option.limitado && props.option.cupos<1 " class="option__small cupos sin-cupos">( sin cupos disponibles)</span>
                    <span v-if="mobile && props.option.grupo==false && props.option.limitado && props.option.cupos>0 " class="option__small cupos">({{ props.option.cupos }} cupos disponibles)</span>
                    <span v-if="mobile && props.option.grupo==false && props.option.limitado && props.option.cupos<1 " class="option__small cupos sin-cupos">(0 cupos disponibles)</span>
                    <!-- /* ******* Front 2026 *********** */ -->
                    <small class="label2">{{ props.option.sss_name || ''}}</small>
                </div>
            </template>
                     
        </multiselect>

        <Transition>
            <div :class="{'hide_me': (is_particular=='particular') }" class="aviso_obras"  v-show="is_particular!='particular'">
               <div><span class="adicional_costo">Costo adicional consulta por Obra Social: <span style="font-weight:600;color:green;">$5.000</span></div>
               <span class="asterisco-green">*</span><span>Si no tienes una de estas Obras Sociales aceptadas podrás atenderte de forma particular</span>
            </div>
        </Transition>
    </div>
    <div>
        <span v-if="max.appointment_step_form_data != null" >ES PARTICULAR {{max.appointment_step_form_data.form_fields.is_particular}}</span>
    </div>
    
    <div id="obs_seg_price">
    <Transition name="fade">
        <div v-if="price>0" :class="['aviso_price',{'con-valor': (price>0?1:0) }]"> 
            <div style="
    border: 1px solid lightgray;
    border-radius: 5px;
    font-size: 12px;
    color: black;
    background-color: var(--bpa-gt-gray-100);
    padding: 5px;
">
Los pagos online no tienen reintegro por motivos ajenos a la institución 
<a href="/terminos-y-condiciones/" target="_blank" class="" style="text-decoration: underline !important;color: cornflowerblue;">Terminos y condiciones</a>
</div>
            Costo de la consulta particular: {{max.appointment_step_form_data.selected_service_price}} (No incluye estudios)
            
        </div>
    </Transition>
    </div>
    
    <div style="height: 300px;text-align: center;">
    
    tab {{current_tab}} 
    <br />
    obra_soc_seguros {{obra_soc_seguros}} 
    <br />
    is_particular {{is_particular}}
    <br />
    
    <pre class="language-json"><code>{{ obs_value }}</code></pre> 
    
    </div>
    
</div>
<!--
<template id="part_text">
    <span v-if="max.appointment_step_form_data != null" >ES PARTICULAR {{max.appointment_step_form_data.form_fields.is_particular}}</span>
</template>
-->
<?php

echo '<script> '.
'var configuracion_medico = {};
'.
'configuracion_medico["obras_sociales"] = [
    {label: "particular ", value: "particular", limitado: false, cupos:1}
]; 
'.
'</script>';

bk_mod_front_handle_response();

?>

<script>
var data_turno = {medico:0,date:"",hora:"", service_id:0};
var opss = configuracion_medico["obras_sociales"];


//window.addEventListener('DOMContentLoaded', function() {
    function load_obs_select(){ //LLAMADO DESDE bookingpressmod
        
        opss = [];
        opss = set_medic_opss();
        obs.max = maxApp;
        //obs.loadOptions();
    }//fin func
    
const obs = new Vue({
    el: '#main_obs_seg',
    props: [
    ],
    data() {
        return {
            selectRemplace: 0,
            mobile: false,
            turno: {},
            medico: 0,
            obs_value: {},
            prev_obs_value: {},
            options: opss,
            max: {appointment_step_form_data:null}
        }
    },
    components: {
       Multiselect: window.VueMultiselect.default
    },
    methods: {
        multiOpen(){
            if( this.mobile ){
            $select_obs = document.getElementById("obs_seg_select").querySelector(".multiselect__content-wrapper");
            $select_obs.style.maxHeight="80vh";
            $select_obs_parent = $select_obs.parentElement;
            overlay_container = document.querySelector(".overlay_container");
            overlay_container.append($select_obs);
            overlay_container.className = "overlay_container show";
            }
        },
        multiClose(){
            if( this.mobile ){
            /*
            select_obs = document.getElementById("obs_seg_select").parentElement;
            
            */
            overlay_container = document.querySelector(".overlay_container");
            overlay_container.className = "overlay_container";
            $select_obs_parent.append($select_obs);
            }
            opcion_highlight = document.querySelector(".multiselect__option.multiselect__option--highlight");
            if(opcion_highlight!=null) opcion_highlight.classList.remove("multiselect__option--highlight");
        },
        labelOption(option){
            return option.label;
        },
        checkOptions(){
            ob_sel = "";
            if(this.max.appointment_step_form_data != null){
                    if(this.max.appointment_step_form_data.form_fields.is_particular == 'particular'){
                        ob_sel = 'particular';
                        this.max.appointment_step_form_data.form_fields.obra_soc_seguros = 'particular';
                        
                    }else{
                        ob_sel = '';
                        //ob_sel = this.max.appointment_step_form_data.form_fields.obra_soc_seguros;
                        this.max.appointment_step_form_data.form_fields.obra_soc_seguros = '';
                    }
            }
            opts = this.options;
            for(x in opts){
                if(opts[x].limitado){
                    if(opts[x].cupos < 1) opts[x].$isDisabled = true;
                    //console.log(opts[x]);
                }
                if(ob_sel!= "" && ob_sel == opts[x].value){
                    this.obs_value = opts[x];
                    //this.max.appointment_step_form_data.form_fields.obra_soc_seguros = ob_sel; 
                }
            }
            
            if(this.obs_value!=null && this.obs_value.value !=""){
                if(this.obs_value.value !="particular") this.prev_obs_value = this.obs_value;
                if( !configuracion_medico.solo_particular){
                    if(this.max.appointment_step_form_data != null) this.max.appointment_step_form_data.form_fields.obra_soc_seguros = this.obs_value.value;
                }
            }
            
            return opts;
        },
        loadOptions(){
            //console.log("load options");
            
            if( JSON.stringify(this.turno) != JSON.stringify(data_turno) ) this.obs_value = {};//if( this.turno.medico != data_turno.medico ) 
            this.turno = { ...data_turno};
            this.medico = data_turno.medico;
            this.options = configuracion_medico["obras_sociales"];//opss;
            this.apply_config_medico();
        },
        hora_to_time( hora="00:00" ){
            return Date.parse('1970-01-01 '+hora+' GMT');
        },
        apply_config_medico(){
            es_solo_particular = 0;
            label_msg = "";
            label_msg = "Particular (atención particular disponible para este dia/hora)";//"Solo Particular disponible para este dia/hora";
            
            if(configuracion_medico.solo_particular){
                es_solo_particular = 1;
                label_msg = "Particular (Medico Particular)";
                console.log("aplica solo particular", this.max.appointment_step_form_data.form_fields, this.max);
                this.max.appointment_step_form_data.form_fields.is_particular = '';
                this.max.appointment_step_form_data.form_fields.is_particular = 'particular';
                this.max.appointment_step_form_data.form_fields.obra_soc_seguros = "particular";
            }
            if(configuracion_medico.particular_habilitado){
                //console.log("particular esta habilitado");
                
                solo_horas_en_dias = configuracion_medico.regla_particular['days_horas_conjunto'];
                
                /* ********SOLO PARTICULAR EN DIAS************* */
                if( configuracion_medico.regla_particular['days'] != null ){
                if( configuracion_medico.regla_particular['days'].length ){
                    d = new Date( data_turno.date+' 00:00:00' );
                    day = d.getDay();
                    // Sunday - Saturday : 0 - 6
                    dias = ["dom","lun","mar","mier","jue","vier","sab"  ];
                    
                    if(  configuracion_medico.regla_particular['days'].includes(dias[day]) ){
                        
                        if(solo_horas_en_dias){
                            es_solo_particular = "dia";
                        }else{
                            es_solo_particular = 1;
                        }
                        
                    }
                }}//fin if days
                
                /* ********SOLO PARTICULAR DE HORA A HORA*************  */
                if( configuracion_medico.regla_particular['rango_horas'] !=null ){
                if( configuracion_medico.regla_particular['rango_horas'].length ){
                    hora = data_turno.hora;
                    de = configuracion_medico.regla_particular['rango_horas'][0];
                    hasta = configuracion_medico.regla_particular['rango_horas'][1];
                    hasta = hasta!=null? hasta:"23:59";
                        
                    time_hora = this.hora_to_time(hora);
                    time_de = this.hora_to_time(de);
                    time_hasta = this.hora_to_time(hasta);
                    
                    if( time_de<=time_hora && time_hasta>=time_hora ){
                        
                        if(solo_horas_en_dias ){
                            if(es_solo_particular == "dia"){
                                es_solo_particular = "diaYhora";
                            }
                        }else{
                            es_solo_particular = 1;
                        }
                        
                    }
                }}//fin if rango_horas
                
                /* ********SOLO PARTICULAR DE FECHA A FECHA*************  */
                if( configuracion_medico.regla_particular['rango_fechas'] !=null ){
                if( configuracion_medico.regla_particular['rango_fechas'].length ){
                    
                    de =    configuracion_medico.regla_particular['rango_fechas'][0];
                    hasta = configuracion_medico.regla_particular['rango_fechas'][1];
                    hasta = hasta!=null? hasta:31;
                    d = new Date( data_turno.date+' 00:00:00' );
                    day_num = d.getDate();
                    if(de<=day_num && hasta>=day_num ){
                        es_solo_particular = 1;
                    }
                }}//fin if rango_fechas
                
                /* ********SOLO PARTICULAR MAX DE OBRAS EN EL DIA*************  */
                if( configuracion_medico.regla_particular['max_obra_soc_x_dia'] !=null ){
                if( configuracion_medico.regla_particular['max_obra_soc_x_dia'] > 0 ){
                    if(configuracion_medico.regla_particular['max_obra_soc_x_dia'] <= configuracion_medico.total_obras_day_cont){
                        es_solo_particular = 1;
                    }
                    
                }}//fin if MAX obras x dia
            }
            
            /* Se aplica condicion si cumple una de las reglas */
            if( (solo_horas_en_dias && es_solo_particular == "diaYhora" ) || es_solo_particular==1 ){
                //es_solo_particular = 1; 
                particular_val = {label:label_msg,value:"particular",limitado:false,grupo: false};
                this.options = [particular_val];
                this.obs_value = particular_val;
                this.max.appointment_step_form_data.form_fields.is_particular = 'particular';
                setTimeout( async ()=>{
                let solo_particular_opt = await document.querySelector(".multiselect__element [particular=true]");
                if(solo_particular_opt){ console.log(solo_particular_opt); solo_particular_opt.setAttribute("particular","false");}
                },100);
            }else{
                //console.log("NO --> ES SOLO PARTICULAR -> "+es_solo_particular);
            }
        },
        ajuste_precios(apply_price = 1 ){
            if( apply_price ){
                if(original_service_price_w>0){
                maxApp.appointment_step_form_data.service_price_without_currency = original_service_price_w;
                maxApp.appointment_step_form_data.base_price_without_currency = original_service_price_w;
                maxApp.appointment_step_form_data.selected_service_price = original_service_price;
                }
                maxApp.appointment_step_form_data.selected_payment_method = "";
                maxApp.is_only_onsite_enabled = false;
                //maxApp.paypal_payment = true;
                //maxApp.total_configure_gateways = 2;
            }else{
                if(maxApp.appointment_step_form_data.service_price_without_currency>0){
                    original_service_price_w = maxApp.appointment_step_form_data.service_price_without_currency;
                    original_service_price = maxApp.appointment_step_form_data.selected_service_price;
                }
                prices_to_cero();
            }
        },
        precio_particular(){
            apply_price = 0;
            if(this.max.appointment_step_form_data.form_fields.is_particular == 'particular'){
                apply_price = 1;
            }
            this.ajuste_precios(apply_price);
        },
        text_med_opacity(num=0){
            txt_m_d = document.querySelectorAll(".text_medico_desc");
                    for(x in txt_m_d){
                        if( typeof txt_m_d[x] == 'object')
                            txt_m_d[x].style.opacity = num;
                    }
        }
    },//fin methods
    computed : {
        obra_soc_seguros: function(){
            val="";
            if( this.obs_value != null )
                val = this.obs_value.value;
            if( val == {} ) val="";
            //2026 updates
            if(app){
                //2025 updates 2025-12
                let radioButton_Obras = document.querySelector('.is_particular input[value^=obra]');
                
                let is_only_particular_service = 0;
                
                if( configuracion_medico ){                    
                    if(typeof configuracion_medico.is_only_particular_service !='undefined'){
                        is_only_particular_service = configuracion_medico.is_only_particular_service;
                    }else{
                        if( app.bookingpress_current_tab == 'basic_details' ){
                            let current_service_id = app.appointment_step_form_data? app.appointment_step_form_data.selected_service : '0';
                            let current_service_data = app.bookingpress_all_services_data? Object.values( app.bookingpress_all_services_data ).find( serv_data => current_service_id == serv_data.bookingpress_service_id ) : null;
                            is_only_particular_service = current_service_data? Number(current_service_data.services_meta.is_only_particular) : 0;
                        }
                    }
                } 
                
                if( is_only_particular_service || configuracion_medico.solo_particular ){
                    app.appointment_step_form_data.form_fields.is_particular = '';
                    val="particular";
                    console.log("val particular");//document.querySelector("[value^=obra]
                    if( radioButton_Obras ) radioButton_Obras.disabled = true;
                    if( document.querySelector('label[for="is_particular"] .acepta_solo_particular') ){
                        document.querySelector('label[for="is_particular"] .acepta_solo_particular').remove();
                    }
                    if( !document.querySelector('.is_particular>label .acepta_solo_particular') ){
                        let acepta_particular_msg = is_only_particular_service? ( Number(configuracion_medico.staff_only_particular)? 'M&eacute;dico admite solo Particular en esta Especialidad.' :'Especialidad/M&eacute;dico admite solo Particular.') : 'M&eacute;dico admite solo Particular.';
                        document.querySelector('.is_particular>label .bpa-front-form-label').innerHTML += '<span class="acepta_solo_particular">'+acepta_particular_msg+'</span>';
                    }
                }else{
                    if( radioButton_Obras ) radioButton_Obras.disabled = false;
                    if( document.querySelector('.is_particular>label .acepta_solo_particular') ){
                        document.querySelector('.is_particular>label .acepta_solo_particular').remove();
                        app.appointment_step_form_data.form_fields.is_particular = '';                        
                    }
                }
            }
            
            if( this.max.appointment_step_form_data != null){
                this.max.appointment_step_form_data.form_fields['obra_soc_seguros'] = val;
                if( val == 'particular' ){
                    this.max.appointment_step_form_data.form_fields.is_particular = 'particular';
                }else{
                    this.max.appointment_step_form_data.form_fields.is_particular = 'obra social';
                }
            }
            
            return val;
        },
        price: function(){
            price = 0;
            
            if( this.max.appointment_step_form_data !=null && this.max.bookingpress_current_tab=="basic_details"){
                
                if( this.obs_value!=null){
                        if( (this.obs_value.value!=null && this.obs_value.value == 'particular') || this.max.appointment_step_form_data.form_fields.is_particular == 'particular' ){
                            this.ajuste_precios( 1 );
                        }else{
                            this.ajuste_precios( 0 );
                        }
                }
                price = this.max.appointment_step_form_data.base_price_without_currency;
                
            }
            return price;
        },
        current_tab: function(){
            tab = "";
            if(this.max.current_screen_size != null){
                if(this.max.current_screen_size == "mobile"){
                    this.mobile=true;
                }else{ this.mobile=false; }
            }
            
            if(this.max.bookingpress_current_tab != null)
                tab = this.max.bookingpress_current_tab;
            
            if(tab == 'staffmembers'){
                //original_service_price_w = 0;
                apply_descripciones_medicos();
                
                this.text_med_opacity( 0 );
                
                setTimeout( function(){ 
                    obs.text_med_opacity( 1 );
                    /*txt_m_d = document.querySelectorAll(".text_medico_desc");
                    for(x in txt_m_d){
                        if( typeof txt_m_d[x] == 'object')
                            txt_m_d[x].style.opacity=1;
                    }*/
                },100);
            }
            
            if(tab == 'basic_details'){
                app.appointment_step_form_data.is_particular = '';
            }
            if(tab == 'basic_details' && !this.selectRemplace){
                $el_ob_soc_seg = document.querySelector(".obra_soc_seguros");
                
                $el_ob_soc_seg.querySelector(".el-select.bpa-front-form-control").replaceWith(
                    document.getElementById("obs_seg_select")
                );
                
                $el_ob_soc_seg.after(
                    document.getElementById("obs_seg_price")
                );
                
                try{
                    if( document.querySelector("[value=particular][aria-hidden]") != null){
                        document.querySelector("[value=particular][aria-hidden]").ariaHidden=false;
                    }
                    if( document.querySelector("[value^=obra][aria-hidden]") != null){
                        document.querySelector("[value^=obra][aria-hidden]").ariaHidden=false;
                    }
                    
                    for(let elemen in document.querySelectorAll("[aria-hidden]") ){
                        elemen.ariaHidden=false;
                    }
                    
                }catch(error){}
                
            
                this.selectRemplace = 1;
            }
            
            if(tab == 'summary'){
                if(this.max.appointment_step_form_data.form_fields["customer_email"]==""){
                    if(this.max.appointment_step_form_data.form_fields["text_C6kufq"]!=null){
                        //this.max.appointment_step_form_data.form_fields["customer_username"] = this.max.appointment_step_form_data.form_fields["text_C6kufq"];
                        }
                        
                }
            }
            
            if(tab == 'summary' && document.getElementById("asiste_con_text") == null){
                if(this.max.appointment_step_form_data.form_fields.obra_soc_seguros=="") this.max.appointment_step_form_data.form_fields.obra_soc_seguros = this.obs_value.value;

                //console.info (this.max.appointment_step_form_data);
                console.info (this.max.appointment_step_form_data.form_fields["obra_soc_seguros"]);
                //Ergometrias: id: 62
                //Holter: id: 65

                //$el_sumary_sm = document.querySelector(".bpa-front-summary-content__sm");
                el_asiste_conOs = document.createElement("div");
                el_asiste_conOs.id = "obra_social_paciente";
                /*el_asiste_con.className = "bpa-front-module--bs-summary-content presentar_doc";*/
                el_asiste_conOs.innerHTML='<div class="bpa-front-module--bs-summary-content bpa-front-module--bs-customer-detail"><div class="bpa-front-module--bs-summary-content-item"><span>¿Obra social del paciente?</span> <div class="bpa-front-bs-sm__item-val">'+ this.max.appointment_step_form_data.form_fields["obra_soc_seguros"] +'</div></div></div>';
                
                $el_sumary_sm = document.querySelector(".bpa-front-summary-content__sm");
                el_asiste_con = document.createElement("div");
                el_asiste_con.id = "asiste_con_text";
                el_asiste_con.className = "bpa-front-module--bs-summary-content presentar_doc";
                el_asiste_con.innerHTML='<span class="presentar_title" style="color:var(--bpa-pt-main-green);">Presentarse con la documentacion requerida:</span>'+
                '<div class="bpa-front-bs-sm__item-val presentar"><br><span>DNI.</span><br><span>CARNET.</span><br><span>Orden medica.</span><br><span>consulta/estudios.</span></div>';

                if (this.max.appointment_step_form_data.selected_service == 62) {
                    el_asiste_con2 = document.createElement("div");
                    el_asiste_con2.id = "asiste_con_text";
                    el_asiste_con2.className = "bpa-front-module--bs-summary-content presentar_doc2";
                    el_asiste_con2.innerHTML = '<h6 style="margin: 11px 0 7px 0; font-weight: 400;"><span class="presentar_title2" style="color:var(--bpa-pt-main-green);">PREPARACIÓN PARA ERGOMETRÍA:</span></h6>' +
    '<div class="bpa-front-bs-sm__item-val presentar2">' +
    '<div style="margin: 4px 0 10px; text-align:left !important">' +
    '<ul class="bpa-frontend-main-container-ul" style="text-decoration: none !important; list-style-position: inside; list-style-type: disclosure-closed; padding-left:1rem; font-size:14px;font-weight: 400;">' +
    '<li style="margin: 5px 0;">_ ACUDIR CON ROPA CÓMODA (ROPA DEPORTIVA)</li>' +
    '<li style="margin: 5px 0;">_ DEPILARSE LA ZONA DONDE SE COLOCAN LOS ELECTRODOS (PECHO)</li>' +
    '<li style="margin: 5px 0;">_ TRAER TOALLA PEQUEÑA</li>' +
    '<li style="margin: 5px 0;">_ NO INGERIR ALIMENTOS POR LO MENOS 2 HORAS PREVIAS AL ESTUDIO</li>' +
    '<li style="margin: 9px 0; text-decoration: underline; font-weight: 400; color:var(--bpa-pt-main-green);">_ SI PADECE UNA ENFERMEDAD CARDÍACA O ENFERMEDAD QUE CONSIDERE IMPORTANTE, COMUNICAR AL MÉDICO ANTES DE COMENZAR EL ESTUDIO</li>' +
    '</ul>' +
    '<h6 style="margin: 15px 0 7px 0; font-weight: 500;"><span class="presentar_title2" style="color:var(--bpa-pt-main-green);">DEBE TRAER:</span></h6>' +
    '<ul class="bpa-frontend-main-container-ul" style="text-decoration: none !important; list-style-position: inside; list-style-type: disclosure-closed; padding-left:1rem; font-size:14px;font-weight: 400;">' +
    '<li style="margin: 5px 0;">_ 10 ELECTRODOS</li>' +
    '</ul>' +
    '</div>' +
    '</div>';
                }

                if (this.max.appointment_step_form_data.selected_service == 65) {
                    el_asiste_con2 = document.createElement("div");
                    el_asiste_con2.id = "asiste_con_text";
                    el_asiste_con2.className = "bpa-front-module--bs-summary-content presentar_doc2";
                    el_asiste_con2.innerHTML = '<div class="bpa-front-bs-sm__item-val presentar2"><h6 style="margin: 11px 0 7px 0; font-weight: 400;"><span class="presentar_title2" style="color:var(--bpa-pt-main-green);">PREPARACIÓN PARA HOLTER:</span></h6>' +
    '<div style="margin: 4px 0 10px; text-align:left !important">' +
    '<ul class="bpa-frontend-main-container-ul" style="text-decoration: none !important; list-style-position: inside; list-style-type: disclosure-closed; padding-left:1rem; font-size:14px;font-weight: 400;">' +
    '<li style="margin: 5px 0;">_ DEPILARSE LA ZONA DONDE SE COLOCAN LOS ELECTRODOS (PECHO)</li>' +
    '<li style="margin: 5px 0;">_ ASEO PREVIO AL TURNO</li>' +
    '<li style="margin: 5px 0;">_ DEBE ACUDIR CON SU DNI AL MOMENTO DE RETIRAR EL HOLTER</li>' +
    '<li style="margin: 5px 0;">_ PUEDE REALIZAR SU ACTIVIDAD COTIDIANA EN EL TRANSCURSO DEL ESTUDIO</li>' +
    '</ul>' +
    '<h6 style="margin: 15px 0 7px 0; font-weight: 400;"><span class="presentar_title2" style="color:var(--bpa-pt-main-green);">DEBE TRAER:</span></h6>' +
    '<ul class="bpa-frontend-main-container-ul" style="text-decoration: none !important; list-style-position: inside; list-style-type: disclosure-closed; padding-left:1rem; font-size:14px;font-weight: 400;">' +
    '<li style="margin: 5px 0;">_ 5 ELECTRODOS</li>' +
    '<li style="margin: 5px 0;">_ 1 PILA DOBLE A (AA)</li>' +
    '</ul>' +
    '<h6 style="margin: 15px 0 7px 0; font-weight: 400;"><span class="presentar_title2" style="color:var(--bpa-pt-main-green);">ADVERTENCIAS:</span></h6>' +
    '<ul class="bpa-frontend-main-container-ul" style="text-decoration: none !important; list-style-position: inside; list-style-type: disclosure-closed; padding-left:1rem; font-size:14px;font-weight: 400;">' +
    '<li style="margin: 5px 0; font-weight: 500; color:var(--bpa-pt-main-green);">_ NO DEBE RETIRARSE EL HOLTER UNA VEZ COLOCADO</li>' +
    '<li style="margin: 5px 0; font-weight: 500; color:var(--bpa-pt-main-green);">_ NO DEBE MOJAR EL HOLTER</li>' +
    '<li style="margin: 5px 0;">_ EL ESTUDIO PUEDE DURAR 24,48 U 72 HORAS</li>' +
    '</ul>' +
    '</div>' +
    '</div>';
                }

                
                // TEXTO PARA LA PANTALLA FINAL:
                const $el_module_calendar = document.querySelector(".bpa-front-module--add-to-calendar");

                el_asiste_conOs2 = document.createElement("div");
                el_asiste_conOs2.id = "obra_social_paciente2";
                el_asiste_conOs2.className = "bpa-front-tmc__summary-content";
                el_asiste_conOs2.innerHTML='<div class="bpa-front-tmc__sc-item" style="border-right:0 !important; border-top:0 !important;"><label class="bpa-front-sc-item__label">¿Obra social del paciente?</label>'+
                '<div class="bpa-front-sc-item__val"><div class="bookingpress-appointment-customer-container">'+
                '<div class="bookingpress_appointment_customername_div"><span class="bookingpress_appointment_customername">'+ this.max.appointment_step_form_data.form_fields["obra_soc_seguros"] +'</span></div></div></div>';

if ($el_module_calendar) {

                if (this.max.appointment_step_form_data.selected_service == 62) {
                    el_asiste_con2 = document.createElement("div");
                    el_asiste_con2.id = "asiste_con_text";
                    el_asiste_con2.className = "bpa-front-module--bs-summary-content presentar_doc2";
                    el_asiste_con2.innerHTML = '<h6 style="margin: 11px 0 7px 0; font-weight: 500;"><span class="presentar_title2" style="color:var(--bpa-pt-main-green);">PREPARACIÓN PARA ERGOMETRÍA:</span></h6>' +
    '<div class="bpa-front-bs-sm__item-val presentar2">' +
    '<div style="margin: 4px 0 10px; text-align:left !important">' +
    '<ul class="bpa-frontend-main-container-ul" style="text-decoration: none !important; list-style-position: inside; list-style-type: disclosure-closed; padding-left:1rem; font-size:14px;font-weight: 400;">' +
    '<li style="margin: 5px 0;">_ ACUDIR CON ROPA CÓMODA (ROPA DEPORTIVA)</li>' +
    '<li style="margin: 5px 0;">_ DEPILARSE LA ZONA DONDE SE COLOCAN LOS ELECTRODOS (PECHO)</li>' +
    '<li style="margin: 5px 0;">_ TRAER TOALLA PEQUEÑA</li>' +
    '<li style="margin: 5px 0;">_ NO INGERIR ALIMENTOS POR LO MENOS 2 HORAS PREVIAS AL ESTUDIO</li>' +
    '<li style="margin: 9px 0; text-decoration: underline; font-weight: 500; color:var(--bpa-pt-main-green);">_ SI PADECE UNA ENFERMEDAD CARDÍACA O ENFERMEDAD QUE CONSIDERE IMPORTANTE, COMUNICAR AL MÉDICO ANTES DE COMENZAR EL ESTUDIO</li>' +
    '</ul>' +
    '<h6 style="margin: 15px 0 7px 0; font-weight: 500;"><span class="presentar_title2" style="color:var(--bpa-pt-main-green);">DEBE TRAER:</span></h6>' +
    '<ul class="bpa-frontend-main-container-ul" style="text-decoration: none !important; list-style-position: inside; list-style-type: disclosure-closed; padding-left:1rem; font-size:14px;font-weight: 400;">' +
    '<li style="margin: 5px 0;">_ 10 ELECTRODOS</li>' +
    '</ul>' +
    '</div>' +
    '</div>';
                }

                if (this.max.appointment_step_form_data.selected_service == 65) {
                    el_asiste_con2 = document.createElement("div");
                    el_asiste_con2.id = "asiste_con_text";
                    el_asiste_con2.className = "bpa-front-module--bs-summary-content presentar_doc2";
                    el_asiste_con2.innerHTML = '<div class="bpa-front-bs-sm__item-val presentar2"><h6 style="margin: 11px 0 7px 0; font-weight: 400;"><span class="presentar_title2" style="color:var(--bpa-pt-main-green);">PREPARACIÓN PARA HOLTER:</span></h6>' +
    '<div style="margin: 4px 0 10px; text-align:left !important">' +
    '<ul class="bpa-frontend-main-container-ul" style="text-decoration: none !important; list-style-position: inside; list-style-type: disclosure-closed; padding-left:1rem; font-size:14px;font-weight: 400;">' +
    '<li style="margin: 5px 0;">_ DEPILARSE LA ZONA DONDE SE COLOCAN LOS ELECTRODOS (PECHO)</li>' +
    '<li style="margin: 5px 0;">_ ASEO PREVIO AL TURNO</li>' +
    '<li style="margin: 5px 0;">_ DEBE ACUDIR CON SU DNI AL MOMENTO DE RETIRAR EL HOLTER</li>' +
    '<li style="margin: 5px 0;">_ PUEDE REALIZAR SU ACTIVIDAD COTIDIANA EN EL TRANSCURSO DEL ESTUDIO</li>' +
    '</ul>' +
    '<h6 style="margin: 15px 0 7px 0; font-weight: 400;"><span class="presentar_title2" style="color:var(--bpa-pt-main-green);">DEBE TRAER:</span></h6>' +
    '<ul class="bpa-frontend-main-container-ul" style="text-decoration: none !important; list-style-position: inside; list-style-type: disclosure-closed; padding-left:1rem; font-size:14px;font-weight: 400;">' +
    '<li style="margin: 5px 0;">_ 5 ELECTRODOS</li>' +
    '<li style="margin: 5px 0;">_ 1 PILA DOBLE A (AA)</li>' +
    '</ul>' +
    '<h6 style="margin: 15px 0 7px 0; font-weight: 400;"><span class="presentar_title2" style="color:var(--bpa-pt-main-green);">ADVERTENCIAS:</span></h6>' +
    '<ul class="bpa-frontend-main-container-ul" style="text-decoration: none !important; list-style-position: inside; list-style-type: disclosure-closed; padding-left:1rem; font-size:14px;font-weight: 400;">' +
    '<li style="margin: 5px 0; font-weight: 500; color:var(--bpa-pt-main-green);">_ NO DEBE RETIRARSE EL HOLTER UNA VEZ COLOCADO</li>' +
    '<li style="margin: 5px 0; font-weight: 500; color:var(--bpa-pt-main-green);">_ NO DEBE MOJAR EL HOLTER</li>' +
    '<li style="margin: 5px 0;">_ EL ESTUDIO PUEDE DURAR 24,48 U 72 HORAS</li>' +
    '</ul>' +
    '</div>' +
    '</div>';
                }

            } // cierra texto pagina de gracias

                $el_sumary_sm.before(el_asiste_conOs);
                $el_sumary_sm.after(el_asiste_con);

                if (this.max.appointment_step_form_data.selected_service == 65 || this.max.appointment_step_form_data.selected_service == 62) {
                    $el_sumary_sm.after(el_asiste_con2);
                } 
                
                const checkThankYouPage = () => {
                    const thankYouDiv = document.getElementById("bpa-thankyou-screen-div");
                    const $el_module_calendar2 = document.querySelector(".bpa-front-module--add-to-calendar");

                    if (thankYouDiv && $el_module_calendar2) {
                        $el_module_calendar2.before(el_asiste_conOs2);
                        
                        if (this.max.appointment_step_form_data.selected_service == 65 || this.max.appointment_step_form_data.selected_service == 62 ) {
                            $el_module_calendar2.after(el_asiste_con2);
                        }
                    } else {
                        setTimeout(checkThankYouPage, 500);
                    }
                };
                
                setTimeout(checkThankYouPage, 2000);
            
            } //ciera if tab == 'summary'
            
            return tab;
        },

        is_particular: function(){
            is = "";
            if(this.max.appointment_step_form_data != null){
                is = this.max.appointment_step_form_data.form_fields.is_particular;
            }
            if(document.querySelector("div.obra_soc_seguros")!=null){
                if( is == 'particular'){
                    setTimeout( ()=>{
                        document.querySelector("div.obra_soc_seguros").className="el-form-item is-required obra_soc_seguros hide_me"; 
                    },100);
                }else{
                    setTimeout( ()=>{
                        //obs.obs_value={}; 
                        obs.obs_value = obs.prev_obs_value; 
                        if(obs.prev_obs_value.value!=null) obs.max.appointment_step_form_data.form_fields.obra_soc_seguros = obs.prev_obs_value.value;
                        document.querySelector("div.obra_soc_seguros").className="el-form-item is-required obra_soc_seguros";
                    },100); 
                }
            }
            return is;
        }
        /*
        obs_value: function(){
            if( this.obs_value.value == 'particular' ){
                this.ajuste_precios( 1 );
            }else{
                this.ajuste_precios( 0 );
            }
            return this.obs_value;
        }
        */
    },//fin computed
    mounted : function(){
            /*console.log('the component is now mounted.');*/
            //this.max = maxApp;
        }
  })
  



function set_medic_opss(){
    options = [];
    stp_f_fata = maxApp.appointment_step_form_data;
    
    data_turno.medico = stp_f_fata.selected_staff_member_id;
    data_turno.date = stp_f_fata.selected_date;
    data_turno.hora = stp_f_fata.store_start_time;
    //options_for_member = medico;
    
    options = [
    {label: "particular", value: "particular", limitado: false, cupos:1 }
    ];
    
    
    bk_mod_postdata = {"action":"get_bookings_day",  "appoint_data": data_turno };
    if(typeof booking_expansion_filter_data == 'function'){
        bk_mod_postdata = booking_expansion_filter_data('medic_opss__postdata', bk_mod_postdata, stp_f_fata)
    }
                    axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( bk_mod_postdata ) )
					.then( function (response) {
						//vm.appointment_step_form_data = response.data.appointment_data
                        if( response.data['obras_sociales'] != null ){
                            configuracion_medico = response.data;
                        }
                        //maxApp = obs.max;
                        obs.loadOptions();
					});
    
    
    return options;
}

var extravalidate_apply = 0;
var extravalidate_dni;

document.addEventListener('change_tab', function(){
    
    setTimeout( ()=>{
    if( typeof app.$refs != "undefined" && !extravalidate_apply){
        
        if( typeof app.$refs.text_C6kufq != "undefined" ){
            extravalidate_apply = 1;
        
        
        extravalidate_dni = app.$refs.text_C6kufq[0].$children[1].$refs.input;
        //console.log( app.$refs.text_C6kufq[0].$children[1].$refs.input );
        
        extravalidate_dni.pattern = "[0-9]{6,12}";
        
                
        /*
        app.$refs.text_C6kufq[0].onFieldBlurBK = app.$refs.text_C6kufq[0].onFieldBlur;
        
        app.$refs.text_C6kufq[0].onFieldBlur = function(){
            app.$refs.text_C6kufq[0].onFieldBlurBK();
            extraValidation();
            
        }
        
        app.$refs.text_C6kufq[0].onFieldChangeBK = app.$refs.text_C6kufq[0].onFieldChange;
        
        app.$refs.text_C6kufq[0].onFieldChange = function(){
            app.$refs.text_C6kufq[0].onFieldChangeBK();
            extraValidation();
            
        }
        */
        
        if( app.customer_details_rule.customer_email == null){
        app.customer_details_rule.customer_email = [
            {
                "type": "email",
                "message": "Ingresa un correo electrónico valido",
                "trigger": "blur"
            }
        ];
        }
        
        extravalidate_dni.addEventListener("blur", ()=>{extraValidation()});
        extravalidate_dni.addEventListener("change", ()=>{extraValidation()});
        
        app.$refs.validteBtn.$el.addEventListener("click", ()=>{extraValidation()});
        
        
    
        app.bookingpress_step_navigation = function(current_tab, next_tab, previous_tab, is_strict_validate = 1){
                const vm = this;
                var bookingpress_is_validate = 0;

                vm.bookingpress_remove_error_msg();

                var bookingpress_validate_fields_arr = vm.bookingpress_sidebar_step_data[vm.bookingpress_current_tab].validate_fields;

                

                if((vm.bookingpress_current_tab == "basic_details") && vm.bookingpress_current_tab != next_tab && current_tab != previous_tab){
                    bookingpress_validate_fields_arr.forEach(function(currentValue, index, arr){
                        if(vm.bookingpress_current_tab == vm.bookingpress_current_tab && vm.appointment_step_form_data[currentValue] == "" && vm.bookingpress_current_tab != next_tab && current_tab != previous_tab){
                            vm.bookingpress_set_error_msg(vm.bookingpress_sidebar_step_data[vm.bookingpress_current_tab].validation_msg[currentValue]);
                            bookingpress_is_validate = 1;
                        }
                    });

                    if(bookingpress_is_validate == 0 && is_strict_validate == 1){
                        var customer_form = "appointment_step_form_data";
                        vm.$refs[customer_form].validate((valid) => {
                            if (!valid) {
                                bookingpress_is_validate = 1;
                            }else{
                                bookingpress_is_validate = 0;
                            }
                        });
                    }
                    
                    //ADD
                    if( !extraValidation() ){
                        bookingpress_is_validate = 1;
                    }
                    
                }else{
                    if(is_strict_validate == 1){
                        bookingpress_validate_fields_arr.forEach(function(currentValue, index, arr){
                            if(vm.bookingpress_current_tab == vm.bookingpress_current_tab && vm.appointment_step_form_data[currentValue] == "" && vm.bookingpress_current_tab != next_tab && current_tab != previous_tab){
                                if( currentValue == "selected_start_time" && vm.appointment_step_form_data[currentValue] == "" ) {
                                    if( vm.appointment_step_form_data.selected_service_duration_unit != "d" ){
                                        vm.bookingpress_set_error_msg(vm.bookingpress_sidebar_step_data[vm.bookingpress_current_tab].validation_msg[currentValue]);
                                        bookingpress_is_validate = 1;
                                    }
                                } else {
                                    vm.bookingpress_set_error_msg(vm.bookingpress_sidebar_step_data[vm.bookingpress_current_tab].validation_msg[currentValue]);
                                    bookingpress_is_validate = 1;
                                }
                            }
                        });
                    }
                    
                    

                    
                    /* if( "undefined" == typeof retrieved_timeslots && "datetime" == next_tab && 0 == bookingpress_is_validate ){
                        let selected_service_id = vm.appointment_step_form_data.selected_service;
                        vm.bookingpress_disable_date(selected_service_id,vm.appointment_step_form_data.selected_date);
                    } */
                }

                if( "service" == current_tab && "service" != vm.bookingpress_current_tab ){
                    var bookingpress_selected_date = vm.appointment_step_form_data.selected_date+"T00:00:00+00:00";
                    var bookingpress_disable_dates_arr = vm.days_off_disabled_dates.split(",");
                    if(bookingpress_disable_dates_arr.includes(bookingpress_selected_date)){
                        let newDate = new Date("2024-09-01 17:09:22");
                        let pattern = /(\d{4}\-\d{2}\-\d{2})/;
                        if( !pattern.test( newDate ) ){

                            let sel_month = newDate.getMonth() + 1;
                            let sel_year = newDate.getFullYear();
                            let sel_date = newDate.getDate();

                            if( sel_month < 10 ){
                                sel_month = "0" + sel_month;
                            }

                            if( sel_date < 10 ){
                                sel_date = "0" + sel_date;
                            }
                            
                            newDate = sel_year + "-" + sel_month + "-" + sel_date;
                        }
                        
                        vm.appointment_step_form_data.selected_date = newDate;
                    }
                }                                
                
                if( ("basic_details" == current_tab && "service" == vm.bookingpress_current_tab) || ("summary" == current_tab && "service" == vm.bookingpress_current_tab) ){                  
                    if(vm.appointment_step_form_data.selected_service_duration_unit != "d"){                                                
                        if(vm.appointment_step_form_data.selected_start_time == ""){
                            bookingpress_is_validate = 1;                            
                        }
                    }
                }

                if(bookingpress_is_validate == 0){
                    vm.bookingpress_sidebar_step_data[vm.bookingpress_current_tab].is_allow_navigate = 1;
                    vm.bookingpress_current_tab = current_tab;
                    vm.bookingpress_next_tab = next_tab;
                    vm.bookngpress_previous_tab = previous_tab;
                    vm.bookingpress_sidebar_step_data[vm.bookingpress_current_tab].is_allow_navigate = 1;
                    if( "datetime" == current_tab ){
                        let selected_service_id = vm.appointment_step_form_data.selected_service;
                        vm.bookingpress_disable_date(selected_service_id,vm.appointment_step_form_data.selected_date);
                    }
                }

                if( window.innerWidth <= 576 ){
                    let container = vm.$el;
                    let pos = 0;
                    if( null != container ){
                        pos = container.getBoundingClientRect().top + window.scrollY;
                    }

                    const myVar = Error().stack;
                    let allow_scroll = true;
                    if( /mounted/.test( myVar ) ){
                        allow_scroll = false;
                    }
                    if( allow_scroll ){
                    setTimeout(function(){
                        window.scrollTo({
                            top: pos,
                            behavior: "smooth",
                        });
                    }, 500);
                    }
                }

                if( "summary" == current_tab && "summary" == vm.bookingpress_current_tab ) {

                    const vm = this;
                    var total_payment_div_count = document.querySelectorAll(".bpa-front-module--pm-body__item").length;
                    
                    if(total_payment_div_count == 1){
                        var total_payment_div = document.querySelector(".bpa-front-module--pm-body__item");
                        if( null != total_payment_div && "undefined" != typeof total_payment_div) {
                            vm.prevent_verification_on_load = true;
                            total_payment_div.click();
                            vm.prevent_verification_on_load = false;
                        }
                    }
                     
                    
                }

                
				if( "summary" == next_tab && "summary" == vm.bookingpress_current_tab && bookingpress_is_validate == 0 ){
					if (typeof vm.appointment_step_form_data.cart_items == "undefined") {
						if( "" == vm.appointment_step_form_data.selected_service && "undefined" != typeof app.appointment_step_form_data.selected_service && "" != app.appointment_step_form_data.selected_service ){
							vm.appointment_step_form_data.selected_service = app.appointment_step_form_data.selected_service;
						}
						let selected_service_data = vm.bookingpress_all_services_data[ vm.appointment_step_form_data.selected_service ];
						if( "undefined" != typeof selected_service_data.enable_custom_service_duration && true == selected_service_data.enable_custom_service_duration ){

						} else {
							
							let total_payable_amount = vm.appointment_step_form_data.base_price_without_currency;

							let selected_no_person = vm.appointment_step_form_data.bookingpress_selected_bring_members || 1;

							let calcualted_person_price = parseFloat( total_payable_amount ) * parseInt( selected_no_person );

							vm.appointment_step_form_data.service_price_without_currency = calcualted_person_price;

							vm.appointment_step_form_data.selected_service_price = vm.bookingpress_price_with_currency_symbol( calcualted_person_price );

							vm.use_base_price_for_calculation = false;
						}
					}
				}

				if((vm.bookingpress_current_tab == "basic_details")){					
					if(vm.bookingpress_has_password_field == "1"){
						if(typeof vm.appointment_step_form_data.form_fields.customer_email != "undefined" && vm.appointment_step_form_data.form_fields.customer_email != ""){						
							vm.bpa_check_password_validation(vm.appointment_step_form_data.form_fields.customer_email);
						}						
						if(typeof vm.appointment_step_form_data.form_fields.customer_username != "undefined" && vm.appointment_step_form_data.form_fields.customer_username != ""){							
							vm.bpa_check_password_validation(vm.appointment_step_form_data.form_fields.customer_username);
						}
					}
					if( (vm.bookingpress_is_extra_enable == "1" ) ){
						
						let bpa_selected_service_extra_count = 0;
						for(var extra_key in vm.appointment_step_form_data.bookingpress_selected_extra_details){
								
							if(vm.appointment_step_form_data.bookingpress_selected_extra_details[extra_key].bookingpress_is_selected == true){

								let service_extra_price = vm.appointment_step_form_data.bookingpress_selected_extra_details[extra_key].bookingpress_extra_price;
								let service_extra_qty = vm.appointment_step_form_data.bookingpress_selected_extra_details[extra_key].bookingpress_selected_qty;								
								if( service_extra_qty != ""){
									if(typeof vm.appointment_step_form_data.bookingpress_selected_extra_details[extra_key]["bookingpress_extra_price_org"] != "undefined"){
										service_extra_price = vm.appointment_step_form_data.bookingpress_selected_extra_details[extra_key]["bookingpress_extra_price_org"];
									}									
									let bpa_final_extra_price = service_extra_price * service_extra_qty;									
									vm.appointment_step_form_data.bookingpress_selected_extra_details[extra_key]["bookingpress_extra_price_org"] = service_extra_price;
									vm.appointment_step_form_data.bookingpress_selected_extra_details[extra_key].bookingpress_extra_price = vm.bookingpress_price_with_currency_symbol(bpa_final_extra_price);
								}	
								bpa_selected_service_extra_count++;
							}
						}
						vm.appointment_step_form_data.bookingpress_selected_extra_service_count = bpa_selected_service_extra_count;
					}
				}
			
			if( ( previous_tab == "staffmembers" || ( typeof vm.is_staff_first_step != "undefined" && vm.is_staff_first_step == 1 )) && "service" == current_tab && "true" == vm.appointment_step_form_data.select_any_staffmember && 0 == vm.appointment_step_form_data.selected_staff_member_id ){
				vm.isLoadServiceLoader = "1";
				vm.bookingpress_select_staffmember("any_staff", 1 );
			}
			
				if((vm.bookingpress_is_extra_enable == "0" || vm.bookingpress_service_extras.length == 0 || vm.appointment_step_form_data.is_extra_service_exists == "0") && (vm.is_bring_anyone_with_you_activated == "0" || vm.bookingpress_bring_anyone_with_you_details.length == "0" || parseInt(vm.appointment_step_form_data.service_max_capacity) == "") && (vm.is_staffmember_activated == "0" || vm.appointment_step_form_data.is_staff_exists == "0" || vm.appointment_step_form_data.form_sequence == "staff_selection")){
					vm.bookingpress_open_extras_drawer = "false";
				}
				
				var bpa_selected_staff_from_url = "0";
				
				for(var extra_key in vm.appointment_step_form_data.bookingpress_selected_extra_details){
					if(vm.appointment_step_form_data.bookingpress_selected_extra_details[extra_key].bookingpress_is_selected == "true"){
						vm.appointment_step_form_data.bookingpress_selected_extra_details[extra_key].bookingpress_is_selected = true;
					}
				}

				var bpa_selected_staff_id = vm.appointment_step_form_data.bookingpress_selected_staff_member_details.selected_staff_member_id;

				if( "summary" == vm.bookingpress_current_tab && "summary" == next_tab && bookingpress_is_validate == 0 ){
					/* vm.bookingpress_calculate_service_addons_price(vm.appointment_step_form_data.selected_service); */
					vm.bookingpress_get_final_step_amount();
					/* vm.bookingpress_recalculate_payable_amount(); */
				}
			;
            };
        }
    }
    },10);
});


function extraValidation(){
            if( !extravalidate_dni.validity.valid ){
            app.$refs.text_C6kufq[0].validateMessage = "Introduzca un documento valido, solo numeros (sin puntos, espacios y guiones)";
            app.$refs.text_C6kufq[0].validateState = "error";
            }
            
            return extravalidate_dni.validity.valid;
        }

//});
</script>




<?php


function BACKUP_get_bookings_day( $medico = 3, $date = "2024-07-18", $hora=""){
    global $wpdb, $BookingPress, $tbl_bookingpress_services,$tbl_bookingpress_appointment_bookings, $tbl_bookingpress_appointment_meta, $tbl_bookingpress_payment_logs,$tbl_bookingpress_customers,$bookingpress_global_options,$tbl_bookingpress_form_fields;
    $response = array();
    
    if( empty($medico) || empty($date) ){
        #print_r(" faltan datos.");
        return " faltan datos.";
    }
    
    $config_medico = array(
    "obras_sociales"=>[
        array("label"=>"PAMI","value"=>"PAMI", "limitado"=>true, "cupos"=>1, "grupo"=>false),
        array("label"=>"PAMI-LomaLinda","value"=>"PAMI-LomaLinda", "limitado"=>true, "cupos"=>2, "grupo"=>false),
        array("label"=>"OSDE","value"=>"OSDE", "limitado"=>true, "cupos"=>2, "grupo"=>false),
        array("label"=>"INSSSEP","value"=>"INSSSEP", "limitado"=>true, "cupos"=>5, "grupo"=>false), 
    ],
    "particular_habilitado"=>true,
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [20,24],
        'days' => [ "jue", "mier" ],
        'rango_horas' => ["14:00","20:00"],
        'days_horas_conjunto'=> true
    ]
    );
    
    
    $config_medico_original = $config_medico;
    
    $where = " WHERE bookingpress_staff_member_id='{$medico}' AND bookingpress_appointment_date='{$date}' AND bookingpress_appointment_meta_key='obra_soc_art' ";
    
    $select_fields= "bookingpress_staff_member_id medico, bookingpress_appointment_date date, bookingpress_appointment_time hora, bookingpress_appointment_meta_value obra_soc_art";
    
    $res = $wpdb->get_results("SELECT $select_fields FROM {$tbl_bookingpress_appointment_bookings} join {$tbl_bookingpress_appointment_meta} meta ON bookingpress_appointment_booking_id = meta.bookingpress_appointment_id {$where} ", ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
    
    $obra_count = array();
    foreach($res as $turnos){
        if( isset($obra_count[ $turnos['obra_soc_art'] ]) ){
            $obra_count[ $turnos['obra_soc_art'] ]++;
        }else{
            $obra_count[ $turnos['obra_soc_art'] ] = 1;
        }
    }
    
    echo "<br />OBRA COUNT: ";
    print_r($obra_count);
    echo "<br /> xxxxx <br /><br />";
    if( !empty($config_medico['obras_sociales']) ){
        foreach($config_medico['obras_sociales'] as $k=> $opcion ){
            $cupos=0;
            if($opcion["limitado"]){
                if( !empty( $obra_count[ $opcion["value"] ] ) ){
                    $cupos = (int) $config_medico['obras_sociales'][$k]['cupos'];
                    $cupos = $cupos - (int) $obra_count[ $opcion["value"] ];
                    $cupos = $cupos<1? 0: $cupos;
                    $config_medico['obras_sociales'][$k]['cupos'] = $cupos;
                }
            }
            
        }
        echo "<br />original: ";
        print_r($config_medico_original);
        echo "<br />actualizado: ";
        print_r($config_medico);
    }
    $merge_init = array();
    if( $config_medico['particular_habilitado'] ){
        $merge_init[] = array('label'=>"particular",'value'=>"particular",'limitado'=>false,'cupos'=>0, "grupo"=>false);
    }
    $merge_init[] = array("grupo"=>"Obras Sociales","label"=>"obras", "value"=>"","limitado"=>false,"\$isDisabled"=>true);
    $config_medico['obras_sociales'] = array_merge( $merge_init , $config_medico['obras_sociales'] );
    return $config_medico;
    
    echo "<br /><br />RESPUESTA BASE DE DATOS: <br />";
    print_r($res);
}



//echo "<br /><br />";

        function BACKUP_save_obs_after_appointment( $appointment_id=0 ){
			global $wpdb, $tbl_bookingpress_appointment_meta, $tbl_bookingpress_appointment_bookings;
            if(!$appointment_id) return;
            $obs_field = "";
            $bookingpress_appointment_meta = $existe_obs_meta = array();
            $obra_social_field_key = 'text_oO9f1B';
            
            //echo "corriendo save obs<br />";
            
            //$bookingpress_appointment_data = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_appointment_booking_id = %d", $appointment_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm 
            //if(empty($bookingpress_appointment_data)) return;
            $existe_obs_meta = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_appointment_meta} WHERE bookingpress_appointment_id = %d AND bookingpress_appointment_meta_key = 'obra_soc_art' ", $appointment_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
            //print_r($existe_obs_meta);
            //echo "---------- $tbl_bookingpress_appointment_meta <br />";
            //$bookingpress_appointment_meta = $wpdb->get_row($wpdb->prepare("SELECT * FROM `{$tbl_bookingpress_appointment_meta}` WHERE `bookingpress_appointment_booking_id` = '%d' AND `bookingpress_appointment_meta_key` = 'appointment_form_fields_data' ", $appointment_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared --Reason: $tbl_bookingpress_appointment_bookings is a table name. false alarm
            
            $bookingpress_appointment_meta = $wpdb->get_row($wpdb->prepare("SELECT * FROM `{$tbl_bookingpress_appointment_meta}` WHERE `bookingpress_appointment_id` = %d AND `bookingpress_appointment_meta_key` = 'appointment_form_fields_data' ", $appointment_id), ARRAY_A);
            
             //echo "+++++++++<br />";
             //print_r(json_encode($bookingpress_appointment_meta) );
            if(empty($bookingpress_appointment_meta)) return;
            $appointment_fields = is_array($bookingpress_appointment_meta['bookingpress_appointment_meta_value'])? $bookingpress_appointment_meta['bookingpress_appointment_meta_value']:json_decode($bookingpress_appointment_meta['bookingpress_appointment_meta_value'], true);
            
            if( isset( $appointment_fields['form_fields'][$obra_social_field_key] ) ){
                $obs_field = $appointment_fields['form_fields'][$obra_social_field_key];
            }
            if( isset( $appointment_fields['form_fields']['obra_soc_seguros'] ) ){
                $obs_field = $appointment_fields['form_fields']['obra_soc_seguros'];
            }
                        
            if( !empty($obs_field) ){
                $bookingpress_appointment_meta['bookingpress_appointment_meta_key'] = 'obra_soc_art';
                $bookingpress_appointment_meta['bookingpress_appointment_meta_value'] = $obs_field;
                
                if($appointment_fields['form_fields']['is_particular'] == 'particular'){
                    $bookingpress_appointment_meta['bookingpress_appointment_meta_value'] = 'particular';
                }
                /*
    			$bookingpress_appointment_form_fields_data = array(
    				'form_fields' => !empty($bookingpress_appointment_data['bookingpress_appointment_meta_fields_value']) ? $bookingpress_appointment_data['bookingpress_appointment_meta_fields_value'] : array(),
    				'bookingpress_front_field_data' => !empty($bookingpress_appointment_data['bookingpress_appointment_meta_fields_value']) ? $bookingpress_appointment_data['bookingpress_appointment_meta_fields_value'] : array(),
    			);
                */
                
    			$bookingpress_db_fields = $bookingpress_appointment_meta;
                unset($bookingpress_db_fields['bookingpress_appointment_meta_id']);
    
    			if( empty($existe_obs_meta) ){
                    $wpdb->insert($tbl_bookingpress_appointment_meta, $bookingpress_db_fields);
                    echo "<br /> insert ";
                }else{
                    $wpdb->update($tbl_bookingpress_appointment_meta, $bookingpress_db_fields, $existe_obs_meta );
                    echo "<br /> update ";
                }
                
                //print_r($bookingpress_db_fields);
            }
		}
        

###save_obs_after_appointment( 160 );



?>
</div>




<?php



function bk_mod_front_handle_response(){
     return ''; /** DESACTIVADO - RETORNAMOS PARA QUE NO AGREGE CARGA INECESARIA AL SITIO */
    
    /**
     DNI movil test error (foat turnos)
     2222222 2222222222
     
     <!--
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M380.9 97.1c-41.9-42-97.7-65.1-157-65.1-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480 117.7 449.1c32.4 17.7 68.9 27 106.1 27l.1 0c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3 18.6-68.1-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1s56.2 81.2 56.1 130.5c0 101.8-84.9 184.6-186.6 184.6zM325.1 300.5c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8s-14.3 18-17.6 21.8c-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7s-12.5-30.1-17.1-41.2c-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2s-9.7 1.4-14.8 6.9c-5.1 5.6-19.4 19-19.4 46.3s19.9 53.7 22.6 57.4c2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4s4.6-24.1 3.2-26.4c-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
     -->
    */
    
    ?>
<style id="error_to_wpp_script">
.error-to-whatsap-msg {
    padding: 10px;
    text-align: center;
    font-weight: 500;
    color: var(--wp--preset--color--pale-cyan-blue);
    color: #009688;
    padding-top: 40px;   
}
a.wpp-btn {
    display: inline-flex;
    font-size: 16px;
    text-decoration: none;
    color: #f8f8f8;
    fill: currentColor;
    padding: 8px 10px;
    border: 1px solid lightgray;
    border-radius: 10px;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    flex-wrap: nowrap;
    max-width: 200px;
    background: #0fc07cfa;
    font-weight: 500;
    text-shadow: 0 0 5px #00000063;
}
.wpp-btn svg {
    width: 20px;
    height: 20px;
    filter: drop-shadow(2px 2px 3px #00000063);
}
.wpp-btn:hover {
    opacity: 0.9;
}
</style>
<script>
var bk_mod_wpp_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M380.9 97.1c-41.9-42-97.7-65.1-157-65.1-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480 117.7 449.1c32.4 17.7 68.9 27 106.1 27l.1 0c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3 18.6-68.1-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1s56.2 81.2 56.1 130.5c0 101.8-84.9 184.6-186.6 184.6zM325.1 300.5c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8s-14.3 18-17.6 21.8c-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7s-12.5-30.1-17.1-41.2c-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2s-9.7 1.4-14.8 6.9c-5.1 5.6-19.4 19-19.4 46.3s19.9 53.7 22.6 57.4c2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4s4.6-24.1 3.2-26.4c-1.3-2.5-5-3.9-10.5-6.6z"/></svg>';
var bk_mod_add_new_instance = 1;
let bk_mod_add_new = document.createElement('div');
bk_mod_add_new.id = 'error_to_whatsap_msg_' + bk_mod_add_new_instance;
bk_mod_add_new.className = 'el-row error-to-whatsap-msg';
bk_mod_add_new.innerHTML = '';
var $errorToWppTabpanel = null;


if(typeof axios != 'undefined' ){
    //console.log("axios activo");
    axios.interceptors.response.use(function(response){
        let d = {};
        if(response.status == 200){
        
            d = {...response.data};
            if( typeof d.is_add_html != 'undefined' ){
                if( d.is_add_html ){
                    if( typeof document.querySelector('.bpa-front-tabs--panel-body.__bpa-is-active .bpa-front-dc--body') != 'null'){
                            
                        let priority = [1,2];
                        for(let numP in priority){
                            let bk_mod_add_new = document.createElement('div');
                            bk_mod_add_new.timestamp = Date.now();
                            bk_mod_add_new.id = 'error_to_whatsap_msg_' + bk_mod_add_new_instance;
                            bk_mod_add_new.className = 'el-row error-to-whatsap-msg';
                            bk_mod_add_new.innerHTML = '<p>Si el problema persiste contactanos via Whatsapp: <br> <a class="wpp-btn" href="https://api.whatsapp.com/send/?phone=5493644640269&text=No%20puedo%20agendar%20la%20cita.%20Mi%20DNI%20es:__%20,%20telefono:__%20y%20o%20email:__&type=phone_number&app_absent=0" target="_blank"> '+bk_mod_wpp_svg+' +5493644640269 </a></p>';
                            if(priority == 1 ){
                                try{
                                    //document.querySelector('.bpa-front-tabs--panel-body.__bpa-is-active .bpa-front-dc--body .el-row').before(bk_mod_add_new);
                                    if( document.querySelector('.bpa-front-tabs--panel-body #error_to_whatsap_msg_'+bk_mod_add_new_instance) != null){
                                    document.querySelector('.bpa-front-tabs--panel-body #error_to_whatsap_msg_'+bk_mod_add_new_instance).remove();
                                    }
                                }catch(error){}
                            }
                            if(priority < 2 ) continue;
                            if( document.querySelector('.bpa-front-tabs--panel-body .error-to-whatsap-msg') == null){
                                
                                    if($errorToWppTabpanel == null) $errorToWppTabpanel = document.querySelector('.bpa-front-tabs--panel-body.__bpa-is-active');
                                    
                                    document.querySelector('.bpa-front-tabs--panel-body.__bpa-is-active .bpa-front-dc--body').before(bk_mod_add_new);
                                    
                                    
                                    try{
                                        error_to_whatsapp_listener = function(ev){
                                            error_to_whatsapp_remove('error_to_whatsap_msg_' + bk_mod_add_new_instance, 1);
                                        };
                                        $errorToWppTabpanel.querySelector('.bpa-front-tabs--foot button').removeEventListener('click', error_to_whatsapp_listener);
                                    }catch(error){}
                                    try{
                                    $errorToWppTabpanel.querySelector('.bpa-front-tabs--foot button').addEventListener('click', error_to_whatsapp_listener);
                                    }catch(error){}
                                    
                                    setTimeout(function(){
                                        error_to_whatsapp_remove('error_to_whatsap_msg_' + bk_mod_add_new_instance);
                                    },10000);
                                    
                                    bk_mod_add_new_instance++;
                                    bk_mod_add_new.id = 'error_to_whatsap_msg_' + bk_mod_add_new_instance;
                            }
                            
                        }//fin for    
                    }
                    
                }
            }
        }
        
        return response;
    });
    
    
}



function error_to_whatsapp_remove(instance_id='', is_listener=0){
    
    //$errorToWppTabpanel.querySelector('.bpa-front-tabs--foot button').removeEventListener('click', error_to_whatsapp_listener);
    
    try{
        
            let $to_remove = document.querySelector('.bpa-front-tabs--panel-body #'+instance_id);
            if( typeof $to_remove != 'null' ){
                if(is_listener){
                    /*setTimeout( function(){$to_remove.remove()}, 50 );*/
                    $to_remove.remove();
                }else{
                    if( Date.now() >  (8000 + $to_remove.timestamp) ){
                        /*setTimeout( function(){$to_remove.remove()}, 50 );*/
                        $to_remove.remove();
                    }
                }
            }
                
    }catch(error){
        //console.log(error); 
    }
    
}



</script>

    <?php
    
    
}
