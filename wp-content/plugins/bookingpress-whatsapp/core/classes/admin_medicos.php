<?php
/** SE CAMBIO EL EVENTO "load" A 'DOMContentLoaded' cerca de linea 354 
    FALTA AGREGAR CODIGO_RNAS Y SSS_NAME A TODAS LAS OBRAS 
*/
#do_action('bookingpress_add_staffmember_shift_management_content');

add_action('admin_print_styles',function(){
    ?><script> var BK_windowOpen = window.open;</script><?php
},-1);
add_action('admin_footer','modulo_opciones_medicos',9);//bookingpress_staff_members_dynamic_view_load


    function modulo_opciones_medicos(){
        #if( !isset($_GET['testy']) ) return;
        
        if( isset($_GET['testy']) ){
            #print_r( get_option('medico_opt_obras_'.'102', [] ) );
        }
        
        ?>
<div id="modulo_ajustes_medicos_main_app" style="margin: auto; text-align: center; display: none;">
<div id="modulo_ajustes_medicos_obs_particular" class="modulo_ajustes_medicos_obs_particular" >
<form @submit.prevent="guardar_ajustes_medico" v-if="Number(medico_id)">
    <div class="bpa-db-sec-heading">
        <h3>Configurar Descripción, Obras sociales/particular</h3>
        
    </div>
    <div class="bpa-default-card bpa-db-card">
<div class="el-row first-btn-row"><!--button-primary-->
    <button type="submit" class="el-button bpa-btn bpa-btn--primary el-button--default" >Guardar solo Esta seccion</button><!--@click="guardar_ajustes_medico"-->
</div>

<div class="el-row reglas">
    <div class="br-out descripcion_opt">
        <br >
        <label title="Para agregar saltos de linea coloca: <br>. texto negrita: <b>texto ennegrita</b>">Descripción del medico:</label>
        <br >
        <textarea v-model="form.descripcion" placeholder="Introduzca su descripción, así como horarios de atención etc... 
*Para agregar saltos de línea coloca : <br>  
*texto en negrita (resaltado) coloca : <b>texto en negrita</b> "></textarea>
        <br >
<?php if( current_user_can('manage_options') && false ){ ?>
        <label >MercadoPago</label>
        <br >
        <span style="color: gray;">Solo administradores pueden ver/editar mercadopago.</span>
        <br >
        <div class="mp_opt">
            <span>Llave pública</span> <input type="text" v-model="form.mpago.pub_key">
        </div>
        <div class="mp_opt">
            <span>Token de acceso</span> <input type="text" v-model="form.mpago.token">
        </div>
        <div class="mp_opt">
            <span>Firma secreta</span> <input type="text" v-model="form.mpago.secret">
        </div>
        <br >
<?php } ?>

    </div>

    <div class="el-col particular_opt descripcion_opt">
        <div class="br-out">
        <!--<label >Descripción del medico: </label>
        <br >
        <textarea v-model="form.descripcion" placeholder="Introduzca su descripcion, asi como horarios de atencion etc..."></textarea>
        <br >
        <label >MercadoPago</label>
        <br >
        <div class="mp_opt">
            <span>Llave pública</span> <input type="text" v-model="form.mpago.pub_key">
        </div>
        <div class="mp_opt">
            <span>Token de acceso</span> <input type="text" v-model="form.mpago.token">
        </div>
        <div class="mp_opt">
            <span>Firma secreta</span> <input type="text" v-model="form.mpago.secret">
        </div>
        <br>
        -->

        <label for="solo_particular_elem">Solo Particular: </label>
        <br >
        <input id="solo_particular_elem" type="checkbox" v-model="form.config.solo_particular" > 
        <br >
        <span class="el-tag el-tag--light particular_info">{{(form.config.solo_particular)?'Este m&eacute;dico atiende Solo Particular':'Este m&eacute;dico atiende Particular, Obras Sociales y/o Seguros'}}</span>
        </div>

    </div>
    <div class="el-col reglas_particular "  :class=" !form.config.solo_particular?'show':'' " > <!-- v-show=" !form.config.solo_particular "-->
        <div class="br-out">
            <label title="Dejar en cero si no hay limite (independiente de otras opciones)">Max. de Obras sociales aceptadas por día: <span class="info" title="Dejar en cero si no hay limite (independiente de otras opciones)">?</span></label>
            <span style="opacity: 0;user-select:none;">Desde</span> <input type="number" min="0" v-model="form.config.regla_particular.max_obra_soc_x_dia" title="Dejar en cero si no hay limite maximo de obra social que atiendes por dia"> 
            <span style="margin-left: 10px;">Dejar en cero si no hay limite</span>
        </div>
        <div class="br-out">
            <label title="Dejar campos en limpio si no se desea usar rango de fechas de atencion solo particular (independiente de otras opciones)">Particular Entre Fechas: <span class="info" title="Dejar campos en limpio si no se desea usar rango de fechas de solo particular (independiente de otras opciones)">?</span></label>
            <span title="Desde el día">Desde</span> <input type="number" v-model="form.config.regla_particular.rango_fechas[0]" min="0" max="31"> <span title="Hasta el dia">Hasta</span> <input type="number" v-model="form.config.regla_particular.rango_fechas[1]" min="0" :min="form.config.regla_particular.rango_fechas[0]" max="31"> 
        </div>
        <div class="br-out">
            <label title="Dejar campos en limpio si no se desea usar rango de horas de atencion solo particular (se puede limitar a ciertos dias 'en conjunto')">Horas Solo particular: <span class="info" title="Dejar campos en limpio si no se desea usar rango de horas de solo particular (se puede limitar a ciertos dias 'en conjunto')">?</span></label>
            <span  title="Desde la Hora">Desde</span> <input type="time" v-model="form.config.regla_particular.rango_horas[0]"  > <span title="Hasta la Hora">Hasta</span> <input type="time" v-model="form.config.regla_particular.rango_horas[1]" :min="form.config.regla_particular.rango_horas[0]" > 
        </div>

        <div class="br-out">
            <label title="marcar los Dias solo particular (se puede limitar a dentro de un horario 'en conjunto')">Días Solo particular: <span class="info" title="marcar los Dias solo particular (se puede limitar a dentro de un horario 'en conjunto')">?</span></label>

             <span style="opacity: 0; user-select: none;">Desde</span>
             <div class="lista_dias">
                <div class="dia_item"> <span> Lunes <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="lun"> </span></div>
                <div class="dia_item"> <span> Martes <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="mar"> </span></div>
                <div class="dia_item"> <span> Miercoles <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="mier"> </span></div>
                <div class="dia_item"> <span> Jueves <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="jue"> </span></div>
                <div class="dia_item"> <span> Viernes <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="vier"> </span></div>
                <div class="dia_item"> <span> Sabado <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="sab"> </span></div>
                <div class="dia_item"> <span> Domingo <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="dom"> </span></div>
             </div>

        </div>

        <div class="br-out">
            <label title="Ignora Dias y Horas por separado. Solo si se cumplen ambas sera particular">Solo particular si Días y Horas (en conjunto): <span class="info" title="Ignora Dias y Horas por separado. Solo si se cumplen ambas sera particular">?</span></label>
            <span style="opacity: 0;user-select:none;">Desde</span> <input type="checkbox" min="0" v-model="form.config.regla_particular.days_horas_conjunto" title="Ignora rango de Fechas y Horas por separado. Solo si se cumplen ambas sera particular"> 
            
        </div>

    </div>

</div><!--Fin row reglas-->

<div class="el-row obras" :class=" !form.config.solo_particular?'show':'' " >

    <div class="add_obra edit_obras_cupos el-row" @keyup.enter.prevent="add_obra">
        <div class="obra_item columnas"  style="padding: 5px;">
            <div> <span style="padding-left: 8px;">Obra Social</span> </div>
            <div> Codigo RNAS </div>
            <div style="position: absolute;right: 20px;min-width: 220px;"> 
                <div style="display: flex;flex-direction: column;text-align: center;font-size: 80%;width: 100%;: 0 5px;box-sizing: border-box;margin: 2px;">
                    <el-tooltip popper-class="force-max-index" content="Ver Todas las obras sociales">
                    <a class="expansion-minimal-link"  @click="show_obras_RNAS_List()">Ver listado de Obras SSSalud</a>
                    </el-tooltip>
                    
                    <el-tooltip popper-class="force-max-index" content="Super Intendencia de Servicios de Salud">
                    <a class="expansion-minimal-link"  @click="window.open('https://www.sssalud.gob.ar/?page=listRnosc&tipo=100','SuperIntendenciadeServiciosdeSalud','width=400,height=400,right=20,top=100')" title="Super Intendencia de Servicios de Salud" >Descargar Excel en SSSalud</a>
                    </el-tooltip>
                </div>
            </div>
        </div>
        <div class="obra_item columnas" > <!-- class="el-input__inner" -->

            <div> <input class="el-input__inner" @keydown.enter.prevent="()=>{console.log('enter')}" type="text" v-model="new_obra.value" placeholder="Obra social" style="width: 350px;max-width: 100%;"> </div>
            <!-- onkeydown="if(event.key=='Enter') event.preventDefault();" -->
            <div>
                <input type="number" v-model="new_obra.rnas" 
                @input="if(String(new_obra.rnas||'').lenght>2) get_obra_rnas(new_obra.rnas, new_obra, 'sss_name');" 
                @keydown.enter.prevent="get_obra_rnas(new_obra.rnas, new_obra, 'sss_name')" 
                @change="get_obra_rnas(new_obra.rnas, new_obra, 'sss_name')" 
                style="width: 110px;max-width: 110px;">
            </div>

            <div style="width: 50px;min-width: 20px;"><!-- empty div nth-of-type(3) --></div>

            <div class="add-obra-sss_name"> <span v-if="new_obra.sss_name" style="font-size: 70%;color: lightseagreen;">{{ new_obra.sss_name || ''}}</span> </div>
        </div>
        <a class="button-primary expansion-btn-add-obra" @click="add_obra">Agregar obra</a>
        <span class="error error_msg" :class=" (new_obra_error!=''?'show':'') ">{{new_obra_error}}</span>
    </div>

    <div class="edit_obras_cupos resize el-row">
    <!-- Encabezado con checkbox maestro -->
        <div class="obra_item columnas" >
            <div>
                <input type="checkbox" v-model="selectAllObras" @change="toggleAllObras"> 
                <span style="font-weight: bold;">Activar Todas</span>
            </div>
            <div> codigo RNAS </div>
            <div> limite </div>
            <div> Cupos </div>
        </div>

    <!-- nuevo_obras -->
        <!-- Lista de obras sociales -->
        <div class="obra_item" v-for="(obras, x) in form.config.obras_sociales" :key="obras.value" :data-indx="x" :class="(obras.active)?'active':''" style="align-items:center;">
            <div>
                <input @keydown.enter.prevent=""  type="checkbox" v-model="obras.active" @change="checkSelectAll">
                <span>
                    <span class="label">{{obras.label}}</span>
                    <small class="label2">{{form.config.obras_sociales[x].sss_name || ''}}</small>
                </span>
            </div>
            <div> 
                <el-tooltip popper-class="force-max-index" content="Ingresar RNAS y presionar Enter o click fuera del campo antes de guardar.">
                <input class="rnas_number" @keydown.enter.prevent="get_obra_rnas(obras.rnas, form.config.obras_sociales[x], 'sss_name')" type="number"  v-model="obras.rnas" @input="if(String(obras.rnas||'').lenght>2) get_obra_rnas(obras.rnas, form.config.obras_sociales[x], 'sss_name')" @change="get_obra_rnas(obras.rnas, form.config.obras_sociales[x], 'sss_name')" >
                </el-tooltip>
            </div>

            <div> <input @keydown.enter.prevent="()=>{console.log('enter')}" type="checkbox"  v-model="obras.limitado"> </div> 
            <div class="obra_item_cupos" v-if="obras.limitado" > <!-- @mouseup="modulo_medicos.$forceUpdate()" -->

                <el-tooltip popper-class="force-max-index" content="asignar limite de cupos agrupado o separado por especialidades de este medico.">
                <el-popover
                    title=""
                    width="450"
                    trigger="click"
                    placement="bottom">

                        <el-button type="text" slot="reference" class="bpa-btn extend-btn" >
                            <span class="material-icons-round extend" :class="(form.config.obras_sociales[x].extend?'Activo':'')" >reduce_capacity</span>

                        </el-button>

                        <div class="obra_item_cupos_extendidos" style="position: relative;z-index: 10;">

                            <div class="menu_cupos_extendidos" >
                                <div class="cupos_ext_title" >
                                    <span class="cupos_ext_title-text" >Cupos por especialidad</span>
                                    <el-button class="bpa-btn bpa-btn__small" @click="document.querySelector(`.obra_item[data-indx='${x}'] .extend-btn`).click()">Listo</el-button>
                                </div>

                                <div class="group_checker"> <!-- :true-label="1" -->
                                    <el-checkbox class="bpa-form-control--checkbox" v-model="form.config.obras_sociales[x].extend" ></el-checkbox>
                                    <span>Evaluar cupos por grupos</span>
                                </div>
                                <div class="group_list" v-if="form.config.obras_sociales[x].extend">

                                    <!-- Grupo por defecto | columnas-->
                                    <div class="group_item">
                                        <div>Compartir con</div>
                                        <div>&nbsp;&nbsp;&infin;&nbsp;&nbsp; Limitado</div>
                                        <div class="limit-col">Cantidad Cupos</div>
                                        <div class="act-col">
                                            <el-button @click="obras.cupo_grupos.push({'servs':[],'limitado':0,'cupos':10})" class="bpa-btn--icon-without-box bpa-btn--primary btn-add-group">
                                                +
                                            </el-button>
                                        </div>
                                    </div>
                                    <!-- Grupos size="small" -->
                                    <transition-group name="gcupos" tag="div">
                                        <div v-for="(group, i) in obras.cupo_grupos" :key="i" class="group_item">
                                            <div>
                                                <el-select
                                                @change="group_selection_Change(obras)"
                                                v-model="form.config.obras_sociales[x].cupo_grupos[i].servs" 
                                                placeholder="especialidades"
                                                filterable
                                                multiple>
                                                    <el-option v-for="serv_item in max.assign_service_form.assigned_service_list" :value="serv_item.assign_service_id" :label="serv_item.assign_service_name" :disabled="is_assignedService(serv_item.assign_service_id, obras)" v-if="serv_item.assign_service_display"></el-option>
                                                </el-select>
                                            </div>
                                            <div class="limit-col">
                                                <el-checkbox v-model="form.config.obras_sociales[x].cupo_grupos[i].limitado"></el-checkbox>
                                                <span class="infin-label" :class="obras.cupo_grupos[i].limitado?'limitado':''">&infin;</span>
                                            </div>
                                            <div>
                                                <el-input type="number" v-model="form.config.obras_sociales[x].cupo_grupos[i].cupos" min="0" size="4"></el-input>
                                            </div>
                                            <div class="act-col">
                                                <span v-if="obras.cupo_grupos.length > 1" @click="obras.cupo_grupos.splice(i,1)" class="material-icons-round bpa-btn--icon-without-box bpa-btn bpa-btn__small btn-del-group_item bpa-btn--danger">delete</span><!--bpa-btn--icon-without-box -->
                                            </div>
                                        </div>
                                    </transition-group>
                               </div> 
                            </div>
                        </div>
                </el-popover>
                </el-tooltip>

                <span v-if="!form.config.obras_sociales[x].extend" class="label-group-default">
                    <el-tooltip popper-class="force-max-index" content="asignar limite de cupos de esta obra para todas las especialidades de este medico.">
                    <input type="number" v-model="obras.cupos" min="0" style="width:100%;">
                    </el-tooltip>
                </span>
                <span v-else class="label-group">
                    Agrupado
                </span>

            </div>
            <div class="obra_item_cupos" v-if="!obras.limitado" ></div>
            <div class="obra_item_actions">
            <span class="obra_item_del" v-if="obras.add_new" @click="remove_obra(x)">
                <span class="material-icons-round bpa-btn--icon-without-box bpa-btn bpa-btn__small bpa-btn--danger">delete</span>
            </span>
            </div>
        </div>
        <!-- Fin Lista de obras sociales -->
    </div>

    <div v-if="obras_perdidas_count" class="posible_obras_perdidas">
        <span class="warning">Revisar posibles Obras Sociales perdidas:</span><br />
        <span v-for="perdida in form.config.obras_perdidas"> {{perdida}} </span> 
    </div>

    <div style="height: 40px;"></div>
<?php 
/*
<!-- Edit seguros -->
 <!--
    <div class="add_obra edit_obras_cupos el-row edit_seguros" @keyup.enter="add_seguro">
        <div class="obra_item columnas" >
            <div> ART Seguro </div><div> Con limite </div><div> Cupos </div>
        </div>
        <div class="obra_item columnas" >
            <div> <input type="text" v-model="new_seguro.value" placeholder="ART Seguro"> </div>
            <div> <input type="checkbox"  v-model="new_seguro.limitado"> </div>
            <div> <input type="number"  v-model="new_seguro.cupos" min="0"> </div>
        </div>
        <a class="button-primary" @click="add_seguro">Agregar Seguro</a>
        <span class="error error_msg" :class=" (new_seguro_error!=''?'show':'') ">{{new_seguro_error}}</span>
    </div>
    
    <div class="edit_obras_cupos resize el-row edit_seguros">
        <div class="obra_item columnas" >
            <div> ART Seguro </div><div> Con limite </div><div> Cupos </div>
        </div>
        <div class="obra_item" v-for="(obras, x) in form.config.seguros_convenio" :key="obras.value" :data-ob="obras.value" :data-indx="x" :class="(obras.active)?'active':''">
        
            <div> <input type="checkbox" v-model="obras.active" > <span class="label">{{obras.label}}</span> </div> 
            <div> <input type="checkbox"  v-model="obras.limitado"></div> 
            <div class="obra_item_cupos" :style="!obras.limitado?'opacity:0':''"> <input type="number" v-model="obras.cupos" min="0"> </div> 
            
            <span class="obra_item_del" v-if="obras.add_new" @click="remove_seguro(x)"> X </span>
        </div>
    </div>
    -->
<!-- Fin Edit seguros -->
*/
?>
<div class="el-row first-btn-row last-btn-row"  ><!-- v-show=" !form.config.solo_particular "  -->
    <button style="margin-bottom: 20px;" type="submit" class="el-button bpa-btn bpa-btn--primary el-button--default" >Guardar solo Esta seccion</button><!--@click="guardar_ajustes_medico"-->

    <div>
        <label title="" style="display: block;margin-bottom: 5px;"> Descripción interna: Este texto se muestra en la sección de Añadir Turno ( <a>info medico</a> ) </label>
        <textarea v-model="form.config.desc_int" placeholder="Introduzca detalle o guia" style="min-width: 80%;min-height: 80px;margin-top: 5px;"></textarea>
    </div>

</div>
</div><!-- row obras -->


    </div><!-- Fin card configuracion medico-->
</form>
</div><!-- Fin modulo configuracion medico-->

<div style="display: none;"><!--computed-->
{{staff_member_modal}} 
{{form.config.regla_particular.days}} 
{{computed_medico_id}} 
</div>
</div>

        <?php
        
    }


add_action('admin_footer', function(){


?>
<script>
var maxApp;

window.addEventListener('DOMContentLoaded'/*"load"*/, function(){
    maxApp = app;
    maxApp.backup_staff_methods = [];
    modulo_medicos.max = maxApp;
    
    maxApp.backup_staff_methods.saveStaffMembersDetails = app.saveStaffMembersDetails;
    maxApp.saveStaffMembersDetails = function(){
        modulo_medicos.before_saveStaffMembersDetails();
        return maxApp.backup_staff_methods.saveStaffMembersDetails();
    };
    
    
    console.log("load");
});
/**
 * grupo si pertenece a obra o seguro "obras_sociales"|"seguros_convenio"
 */
const modulo_medicos = new Vue({
    el: '#modulo_ajustes_medicos_main_app',
    props: [
    ],
    data() {
        return {
            max: null,
            open_staff_member_modal: false,
            cupos_popover_modal: 0,
            medico_id: 0,
            obras_perdidas_count: 0,
            selected_obras : [],
            all_obras : [],//[ {"code":"3818","value":"PAMI – LOMA LINDA"}, {"code":"24","value":"IN.S.S.E.P."}, ],
            new_obra : {"active":true,"label":"","value":"", "limitado":false, "cupos":0, "grupo":false, "extend" : 0, "cupo_grupos" : [{'servs':[],'limitado':0,'cupos':10}], 'rnas': null, 'sss_name': '' },
            new_obra_error: "",
            new_seguro : {"active":true,"label":"","value":"", "limitado":false, "cupos":0, "grupo":false, "tipo":"seguro", "extend" : 0, "cupo_grupos" : [{'servs':[],'limitado':0,'cupos':10}], 'rnas': null, 'sss_name': '' },
            new_seguro_error: "",
            selectAllObras: false,
            nuevo_obras : [],
            form: {
                medico_id: 0,
                descripcion: "",
                mpago:{pub_key:"",token:"",secret:""},
                config: {
                    "particular_habilitado":true,
                    "solo_particular":false,
                    "regla_particular": {
                        'rango_fechas' : [20],
                        'days' : [ "mier" ,"mar"],
                        'rango_horas' : ["14:00","20:00"],
                        'days_horas_conjunto': true,
                        'max_obra_soc_x_dia': 0,
                    },
                    "total_obras_day_cont": 0,
                    obras_sociales: [],
                    seguros_convenio: [],
                    obras_perdidas: [],
                    
                }//end config
            },//end form
            obs_rnas_data: null,
        }
    },
    methods: {
        async on_open_modal(is_open = false){
            this.open_staff_member_modal = is_open;
            elem_modulo = document.querySelector(".modulo_ajustes_medicos_obs_particular");
            
            if( is_open ){
                this.update_medico_id();
                
                await document.querySelector(".bpa-dialog--staff-modal .bpa-dialog-body");
                document.querySelector(".bpa-dialog--staff-modal .bpa-dialog-body").append(elem_modulo);
                //alert("is_open modal");
            }else{
                this.update_medico_id(0);
                document.querySelector("#modulo_ajustes_medicos_main_app").append(elem_modulo);
            }
        },

        // Método para tildar/destildar todas las obras
        toggleAllObras() {
            const valor = this.selectAllObras;
            if (this.form.config.obras_sociales) {
                this.form.config.obras_sociales.forEach(obra => {
                    obra.active = valor;
                });
            }
        },
        
        // Método para verificar si todas están seleccionadas
        checkSelectAll() {
            if (this.form.config.obras_sociales && this.form.config.obras_sociales.length > 0) {
                const todasSeleccionadas = this.form.config.obras_sociales.every(obra => obra.active);
                this.selectAllObras = todasSeleccionadas;
            }
        },

        update_medico_id( id ){
            if(id != null){
                this.medico_id = id;
            }else{
                this.medico_id = this.max && this.max.staff_members? this.max.staff_members.update_id : 0
            }
            this.form.medico_id = this.medico_id;
            
        },
        reset_config(){
            this.obras_perdidas_count = 0;
            
            this.form.descripcion = "";
            this.form.mpago = {pub_key:"",token:"",secret:""};
            
            this.form.config = {
                    "particular_habilitado":true,
                    "solo_particular":true,
                    "regla_particular": {
                        'rango_fechas' : [ ],
                        'days' : [ ],
                        'rango_horas' : [ ],
                        'days_horas_conjunto': false,
                        'max_obra_soc_x_dia': 0,
                    },
                    "total_obras_day_cont": 0,
                    "obras_sociales": this.get_todas_las_obras(),
                    "seguros_convenio": [],
                    "obras_perdidas": [],
                }//end config
            
        },
        add_obra(){
            const modulo = this;
            if( this.new_obra.value == "" )
            {
                this.new_obra_error = "El campo Obra Social no puede estar vacio";
                setTimeout(()=>{ modulo.new_obra_error = ""; } ,2000);
            return;
            }
            this.new_obra.label = this.new_obra.value;
            this.new_obra.add_new = true; 
            //obras.extend = obras.extend? obras.extend : 0;
            //obras.asigna2 = obras.asigna2? obras.asigna2 : []; 
            //obras.cupo_grupos = obras.cupo_grupos? obras.cupo_grupos : [{'servs':[],'limitado':0,'cupos':10}];
            
            this.form.config.obras_sociales.unshift( {...this.new_obra} );
            
            this.new_obra.label = this.new_obra.value = "";
            this.new_obra.cupos = 0;
            
            //this.new_obra = {"active":true,"label":"","value":"", "limitado":false, "cupos":0, "grupo":false};
        },
        add_seguro(){
            const modulo = this;
            if( this.new_seguro.value == "" )
            {
                this.new_seguro_error = "El campo ART Seguro no puede estar vacio";
                setTimeout(()=>{ modulo.new_seguro_error = ""; } ,2000);
            return;
            }
            this.new_seguro.label = this.new_seguro.value;
            this.new_seguro.add_new = true; 
            
            this.form.config.seguros_convenio.unshift( {...this.new_seguro} );
            
            this.new_seguro.label = this.new_seguro.value = "";
            this.new_seguro.cupos = 0;
            
            //this.new_obra = {"active":true,"label":"","value":"", "limitado":false, "cupos":0, "grupo":false};
        },
        remove_obra(indx=null){
            
            if(indx !=null){
                this.form.config.obras_sociales.splice(indx,1);
            }
        },
        remove_seguro(indx=null){
            
            if(indx !=null){
                this.form.config.seguros_convenio.splice(indx,1);
            }
        },
        guardar_ajustes_medico(){
            const modulo = this;
            formdata = JSON.parse( JSON.stringify(modulo.form) );//{ ...modulo.form };
            console.log( formdata );//wp_ajax_save_config_medico
            if( !formdata || !Number(formdata.medico_id) ) return;
            let obras = formdata.config.obras_sociales;
            let seguros = formdata.config.seguros_convenio;
            formdata.config.obras_sociales = [];
            formdata.config.seguros_convenio = [];
            
            bk_mod_postdata = {"action":"save_config_medico",  "appoint_data": formdata, "obras": obras,"seguros":seguros };
            //axios.post
                        //fetch( appoint_ajax_obj.ajax_url+'?action=save_config_medico', { method:'post',body:JSON.stringify( bk_mod_postdata ), headers:{"Content-Type":"application/json"} } )
                        axios.post( appoint_ajax_obj.ajax_url+'?action=save_config_medico', JSON.stringify(bk_mod_postdata) )
    					.then( function (response) {
    						//vm.appointment_step_form_data = response.data.appointment_data
                            if( response.data.success ){
                                if( !modulo.show_notificacion({
    									title: 'Correcto!',
    									msg: ' '+response.data.success,
    									variant: "success"
								    }) )
                                    {
                                        alert( response.data.success );
                                    }
                                
                                
                                console.log( response.data.success );
                            }else{
                                if( response.data.error ){
                                    if( !modulo.show_notificacion({
    									title: 'Error',
    									msg: ' '+response.data.error,
    									variant: "error"
								    }) )
                                    {
                                        alert( response.data.error );
                                    }
                                    
                                }else{
                                    if( !modulo.show_notificacion({
    									title: 'Error',
    									msg: 'algo fallo.',
    									variant: "error"
								    }) )
                                    {
                                        alert( 'algo fallo.' );
                                    }
                                }
                            }
                            
                        });
            
        },
        before_saveStaffMembersDetails(){
            console.log("before save staffmember");
            this.guardar_ajustes_medico();
        },
        show_notificacion(noty){
            if( this.max.$notify != null ){
                this.max.$notify({
									title: noty.title,
									message: noty.msg,
									type: noty.variant,
									customClass: noty.variant+'_notification',
								});
            return true;
            }
            return false;
        },
        async load_config(){
            const modulo = this;
            if( modulo.medico_id ){
            bk_mod_postdata = {"action":"get_config_medico",  "appoint_data": {medico_id: modulo.medico_id} };
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( bk_mod_postdata ) )
    					.then( function (response) {
    						//vm.appointment_step_form_data = response.data.appointment_data
                            if( response.data.success != null ){
                                modulo.form.config.obras_sociales = [];
                                modulo.form.config.seguros_convenio = [];
                                response.data = JSON.parse(JSON.stringify( response.data ), (a,b)=>{if(b=="false")b=false;if(b=="true")b=true;return b});
                                
                                //modulo.form.config = confi;
                                modulo.form.descripcion = response.data.descripcion;
                                modulo.form.mpago = response.data.mpago;
                                
                                //TEST OBRAS TRUNCADAS por TEST
                                //response.data.config.obras_sociales = response.data.config.obras_sociales.slice(0,10);
                                
                                //response.data.config.obras_sociales.forEach( function(obras){
                                    //obras.extend = obras.extend? obras.extend : 0;
                                    //obras.asigna2 = obras.asigna2? obras.asigna2 : []; 
                                    //obras.cupo_grupos = obras.cupo_grupos? obras.cupo_grupos : [{'servs':[],'limitado':0,'cupos':10}];
                                //});
                                
                                
                                modulo.form.config = response.data.config;//JSON.parse(JSON.stringify( response.data.config), (a,b)=>{if(b=="false")b=false;if(b=="true")b=true;return b});
                                
                                //PRODBANDO UN OBJECTO APARTE
                                modulo.nuevo_obras = modulo.form.config.obras_sociales;
                                                                                               
                                //setTimeout( modulo.$forceUpdate(),300);
                                
                                if( modulo.form.config.obras_perdidas != null ){
                                modulo.obras_perdidas_count = Object.entries(modulo.form.config.obras_perdidas).length;
                                }
                                
                                console.log( "datos cargados config_medico");
                            }
                        });
            }//if medico
        },
        group_selection_Change( obras = null){
            
        },
        is_assignedService(s, obra){
            return obra.cupo_grupos.find(val=> val.servs.map(Number).includes( Number(s) ))?true:false;
        },
        get_todas_las_obras(){
            return JSON.parse(JSON.stringify( todas_las_obras ));
        },
        
        async get_obra_rnas( rnas, obj, prop ){
            let obtener = await obtenerEntidadPorRNAS( rnas );
            this.obs_rnas_data = obtener;
            this.$emit('entidad_por_rnas', {'rnas':rnas,'datos':obtener});
            if( obj instanceof Object ){ obj[prop] = ''; if( obtener ) obj[prop] = obtener.nombre;}
            return this.obs_rnas_data;
        },
        async show_obras_RNAS_List( buscar_dato = '', is_filter ){
            const modulo = this;
            let content_name = 'obras_RNAS_List';
            let namechanged  = content_name!=app.expansion_all_admin_dialog.last_content_name;
            app.expansion_all_admin_dialog.add_class = 'sssalud-lista-table';
            app.expansion_all_admin_dialog.is_open = app.expansion_all_admin_dialog.is_loading = true;
            if( is_filter || namechanged )
            {
                if((!is_filter) || namechanged==true){ app.expansion_all_admin_dialog.content = '' }
                app.expansion_all_admin_dialog.last_content_name = content_name;
                //console.log('buscar', buscar_dato, is_filter, namechanged);
                let url = new URL(location.href);
                url.search = new URLSearchParams({'expansion_json_data': 'rnas_obras.json'});
                  
                // El navegador negocia Gzip automáticamente con el servidor
                  //console.log( 'Obteniendo lista de obras', url.origin );
                const response = await fetch( url );
                
                if (!response.ok) throw new Error('Error al cargar el JSON');
            
                const data = await response.json();
                let rnas_total_regs = data.length;
                app.expansion_all_admin_dialog.rnas_total_show = 0;
                let json_htmlTable = modulo.json2Table(data, ['','otros_telefonos','habilita_opcion'], filter_data={search: buscar_dato, search_cols:["RNAS","nombre","sigla"]});
                let htm_maxi = `
                    <div class="obras_rnas_container" style="">
                        <div class="obras_rnas_header" style="">
                            <h3 class="bpa-hd-body__item-head">Lista de Obras Sociales Completa Según SSSalud a principios del 2026</h3> 
                            <div style="display: flex;justify-content: space-between;">
                                <div><span class="bpa-form-label total-rnas-show">Mostrando ${app.expansion_all_admin_dialog.rnas_total_show} registros</span></div>
                                <div class="bpa-form-field-value-input">
                                    <input class="el-input__inner expansion-border-down" id="ob_rnas_s" type="text" value="${buscar_dato}" placeholder="RNAS, SIGLA O NOMBRE PARA FILTRAR " onkeydown="if(event.key === 'Enter') modulo_medicos.show_obras_RNAS_List(this.value, 1)">
                                    <button class="el-button bpa-btn__small" onclick="modulo_medicos.show_obras_RNAS_List(document.querySelector('#ob_rnas_s').value, 1)"> Filtrar </button>
                                </div>
                            </div>
                        </div>
                        <div class="obras_rnas_table">
                        ${json_htmlTable}
                        </div>
                    </div>
                    `;
                app.expansion_all_admin_dialog.content = htm_maxi;
                
                app.expansion_all_admin_dialog.onClose = ()=>{
                    app.expansion_all_admin_dialog.is_open = false;
                    
                    setTimeout(()=>{
                        if( !app.expansion_all_admin_dialog.is_open && app.expansion_all_admin_dialog.last_content_name == 'obras_RNAS_List'){
                            app.expansion_all_admin_dialog.content = app.expansion_all_admin_dialog.last_content_name = null;app.expansion_all_admin_dialog.add_class = ''; console.log('Tabla de Obras se limpio de memoria.');
                        }else{
                            console.log('Tabla de Obras no se limpio, vista en curso.')
                        }
                    },10000);
                };
            }
            app.expansion_all_admin_dialog.is_loading = false
                
        },
        json2Table(json, omitir_keys =[''], filter_data={search:'', search_cols:["RNAS","nombre","sigla"]}) {
            // 1. Get column headers from the keys of the first object
            let cols = Object.keys(json[0]).filter(col=> !omitir_keys.includes(col) );
        
            // 2. Map over columns, create headers, and join into a string
            let headerRow = cols.map(col => `<th>${col}</th>`).join("");
        
            app.expansion_all_admin_dialog.rnas_total_show = 0;            
            // 3. Map over the array of JSON objects to create rows
            let rows = json.map(row => {
                if(filter_data.search && !filter_data.search_cols.find(scol=>{ if( matchval = String(row[scol]).replace(/[^(\s|\w)]/g,'').toUpperCase().match(filter_data.search.replace(/[^(\s|\w)]/g,'').toUpperCase()) ){ row[scol] = String(row[scol]).replace(matchval[0],`<span class="el-tag--plain el-tag--warning">${matchval[0]}</span>`); return true;} }) ){                    
                    return '';
                }
                //Agrego un contador de total de lineas resultante
                app.expansion_all_admin_dialog.rnas_total_show++;
                // For each row, map over column values to create table data cells (td)
                let tds = cols.map(col => `<td>${row[col]}</td>`).join("");
                return `<tr>${tds}</tr>`;
            }).join("");
        
            // 4. Build the final table string with header and body
            const table = `
                <table>
                    <thead>
                        <tr>${headerRow}</tr>
                    </thead>
                    <tbody>
                        ${rows}
                    </tbody>
                </table>
            `;
            
            return table;
        },
        
        
    },
    computed:{
        staff_member_modal: function(){
            let is_open = false;
            if( this.max != null)
                is_open = this.max.open_staff_member_modal;
                this.on_open_modal( is_open );
            return is_open;
        },
        computed_medico_id : function(){
            let id = this.medico_id;
            this.reset_config();
            this.load_config();
            return id;
        },
        
    },
    mounted: function(){
        //this.form.config.obras_sociales = this.get_todas_las_obras();

        // Al final, verificar el estado inicial del "Seleccionar todas"
        
        this.$nextTick(() => {
            this.checkSelectAll();
        });
    }
})
</script>
<script>
//('https://www.sssalud.gob.ar/?page=listRnosc&tipo=100','SuperIntendenciadeServiciosdeSalud','width=400,height=400,left=100,top=100');
function open_win_popup(u,t,f){
    window.open(u,t,f)
}
</script>
<style>

.label-group, 
.label-group-default {
    display: flex;
    width: 80px;
}
.label-group-default input {
    width: 100%;
    margin: 0;
}

.label-group {
    color: #a6c0d8;
    /* background-color: var(--bpa-cl-white); */
    padding: 6px 0;
    text-align: center;
    /* outline: 1px solid lightgray; */
    border-radius: 2px;
    justify-content: center;
    align-items: center;
    color: lightskyblue;
    /* color: goldenrod; */
}

button.el-button.bpa-btn.extend-btn {
    border: 0;
    display: flex;
    padding: 10px;
    justify-content: center;
    align-items: center;
    min-height: 40px;
    min-width: 50px;
    outline: 1px solid lightgray;
}

button.el-button.bpa-btn.extend-btn:has(.Activo) {
    /* outline: 1px solid lavender; */
    background-color: #e0e6e9;
}
.obra_item_cupos .extend {
    color: lavender;
    /* text-shadow: 0 0 1px #000000; */
    transition: all 0.3s;
    font-size: 24px !important;
    margin: 0 !important;
}
.obra_item_cupos .extend.Activo {
    /* text-shadow: 0 0px 7px #c1e9e9; */
    /* background-color: #a8b6bd21; */
    color: #0a5a9c;
    /* outline: 1px solid lavender; */
    color: lightskyblue;
}

button.el-button.bpa-btn.extend-btn:hover {
    outline: 1px solid #dadae5c3;
}
button.el-button.bpa-btn.extend-btn:hover span.material-icons-round.extend {
    color: #b0c4de;
}


/* ********** */
.menu_cupos_extendidos {
    padding: 0 10px;
    min-height: 200px;
    min-width: 300px;
}
.cupos_ext_title {
    padding: 2px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-height: 30px;
    font-weight: 600;
    margin-top: 5px;
    margin-bottom: 10px;
}
.cupos_ext_title-text {
    font-size: 17px;
}

.btn-add-group {
    outline: 1px solid lavender;
    cursor: pointer;
    /* font-weight: bold; */
}

.group_checker {
    margin-bottom: 10px;
}
.group_list {
    outline: 1px solid #deeaf4;
    padding: 4px;
    border-radius: 3px;
}

.group_item {
    display: flex;
    gap: 4px;
    align-items: center;
    justify-content: flex-start;
    flex-wrap: nowrap;
    transition: all 0.3s ease;
    outline: 1px dotted lavender;
    margin: 4px;
}
.group_item>div {
    width: 20%;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    min-height: 32px;
    padding: 4px;
    word-break: break-word;
    text-align: center;
}
.group_item>div:first-of-type {
    min-width: 160px;
}
.group_item .limit-col {
   justify-content: center; 
}
.group_item .act-col {
    justify-content: right;
    padding-right: 4px;
}
.btn-del-group_item {
    outline: 1px dotted lightgray;
    display: flex;
    justify-content: center;
    align-items: center;
    color: indianred;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.2s;
    opacity: 0.6;
}
.btn-del-group_item:hover {
    opacity: 0.8;
}
.group_item input {
    min-height: 24px;
    min-width: 24px;
    outline: 1px solid lavender;
    font-weight: 500;
}


/* select */
.group_item .el-select .el-tag {
    max-width: calc(50% - 8px);
}
.group_item .el-select__tags-text {
    text-overflow: clip;
}


/* checkbox label */
.infin-label {
    display: flex;
    align-items: center;
    width: 24px;
    height: 24px;
    font-size: 19px;
    font-family: math;
    color: mediumseagreen;
    margin: 2px;
    justify-content: center;
    font-weight: 200;
}
.infin-label.limitado {
    text-decoration: line-through;
    color: lightgray;
}


.gcupos-enter-active, 
.gcupos-leave-active {
    opacity: 0;
}
.gcupos-enter-from, 
.gcupos-leave-to {
    opacity: 0;
}

/* ********* */


</style>

<style>
.modulo_ajustes_medicos_obs_particular .bpa-default-card {
    padding-bottom: 50px;
}
.first-btn-row {
    text-align: center;
    width: 90%;
}
.last-btn-row {
    z-index: 1;
}

.posible_obras_perdidas .warning {
    color: orange;
}
.posible_obras_perdidas {
    padding: 5px;
    width: 90%;
    margin: 20px;
    text-align: left;
    color: lightblue;
    opacity: 0.6;
}

.br-out {
    border-radius: 3px;
    outline: 1px solid lightgray;
}
.descripcion_opt {
    margin: 4px;
    width: calc(100% - 8px);
}
.br-out.descripcion_opt {
    /* width: 100%; */
    margin-bottom: 25px;
}
.br-out.descripcion_opt {
    width: 100%;
    margin-bottom: 25px;
    /* min-height: 400px; */
    display: flex;
    flex-direction: column;
    /* flex-wrap: wrap; */
    align-items: center;
}
.br-out.descripcion_opt>label {
    /* margin-bottom: 10px !important; */
    /* padding: 20px !important; */
}
.mp_opt {
    display: flex;
    flex-direction: row;
    align-items: center;
    width: 80%;
    justify-content: space-between;
    margin: auto;
    margin-bottom: 4px;
    border-bottom: 1px solid #f0f8ff82;
}
.mp_opt input {
    min-width: 300px !important;
}

.modulo_ajustes_medicos_obs_particular .bpa-default-card>.el-row {
    max-width: 1024px;
    margin: auto;
}

.reglas .descripcion_opt textarea {
    margin: 4px;
    width: 80%;
    min-height: 100px;
    outline: 1px solid #dce1d5bf;
}

.particular_opt label {
    /* font-weight: 500; */
    font-size: 14px;
}
.particular_info {
    font-size: 14px;
    font-weight: 600;
    color: #12d57c;
    color: darkcyan;
}

.reglas {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 90%;
    margin: auto;
    padding: 10px 0px;
    outline: 0px solid lightgray;
    padding: 2px;
    margin: 20px auto !important;
    border-radius: 3px;
}
.reglas>.el-col {
    text-align: left;
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
    /* width: 100%; */
    align-items: flex-start;
}
.reglas .particular_opt>div {
    width: 100%; 
    text-align: center;
    display: block;
}
.reglas .particular_opt>div {
    width: 100%;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px 0px;
}
.reglas_particular {
    opacity: 0;
    max-height: 0px;
    overflow-y: hidden;
    transition: all 0.5s ease;
    /* overflow-x: unset; */
    /* width: fit-content; */
}
.reglas_particular.show {
    opacity: 1;
    max-height: 1000px;
    overflow-y: hidden;
    /* overflow-x: unset; */
    /* width: fit-content; */
}


.reglas_particular>div {
    margin: 4px;
    width: 100%;
    width: calc(100% - 16px);
    display: flex;
    align-items: center;
    /* justify-items: start; */
    align-content: center;
    /* grid-column: auto; */
    flex-direction: row;
    padding: 8px 4px;
    /* border-bottom: 1px solid darkgray; */
    font-weight: 500;
    color: grey;
    min-width: 280px;
    gap: 4px;
    margin-bottom: 6px;
}
.reglas_particular>div>label {
    width: 50%;
    
    padding: 4px;
}


.reglas_particular .regla_dias>label {
    width: 30%;
}
.lista_dias {
    width: calc(50% - 60px);
    display: flex;
    flex-wrap: wrap;
}
.dia_item {
    border: 1px solid lightgray;
    border-radius: 3px;
    margin: 4px;
    min-width: 110px;
    padding: 2px;
    display: flex;
    flex-wrap: nowrap;
    flex-direction: row;
    align-content: space-between;
    justify-content: flex-end;
    align-items: center;
}
.dia_item>span {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.obras {
    transition: all 0.6s ease;
    opacity: 0;
    width: 90%;
    margin: auto;
    max-height: 0px;
}
.obras.show {
    opacity: 1;
    max-height: 1024px;
}

.edit_obras_cupos {
    display: flex;
    flex-direction: column;
    padding: 20px;
    width: 100%;
    margin: auto;
    /* min-height: 40px; */
    font-weight: 500;
    /* min-width: 800px; */
    overflow: auto;
}

.edit_obras_cupos.resize {
    /* min-height: 350px; */
    height: 350px;
    resize: vertical;
    max-height: 750px;
    z-index: 2;
    background: white;
}

.add_obra.edit_obras_cupos {
    text-align: center;
}

.obra_item {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-content: center;
    align-items: center;
    min-height: 50px;
    min-width: 400px;
    padding: 4px 0px;
    /* outline: 1px solid lightgray; */
    border-radius: 4px;
    /* outline-offset: 2px; */
    /* margin-bottom: 10px; */
    gap: 2px;
}


.obra_item:nth-child(odd) {
    background: #f3f3f3ad;
}

/*
.obra_item.active {
    background-color: #2473df29;
}
*/
.obra_item {
    color: var(--bpa-dt-black-200);
}
.obra_item.active {
    color: var(--bpa-dt-black-300);
}

.obra_item:not(.columnas):hover {
    background-color: honeydew;
    background-color: #d4d9eb63;
}


.edit_obras_cupos .obra_item {
    margin-bottom: 4px;
}

.obra_item>div {
    width: 20%;
    text-align: left;
    display: inherit;
    align-items: center;
    gap: 4px;
}
.obra_item>div.obra_item_cupos {
    transition: all 0.5s ease;
    align-items: stretch;
}


.obra_item>div:first-of-type {
    width: 40%;
}

.edit_obras_cupos .obra_item>div:first-of-type * {
    /*margin: 0px 4px !important;*/
    margin-left: 4px;
}

.reglas input[type=number], .reglas input[type=time] {
    max-width: 84px;
    min-width: 84px;
    color: gray;
}
.obra_item input[type=number] {
    max-width: 80px;
}
.reglas input[type="text"],
.obra_item input[type="text"] {
    max-width: 100%;
}
.reglas input[type="checkbox"],
.obra_item input[type="checkbox"] {
    margin: 0;
    /* border-color: unset; */
}
.reglas input,
.obra_item input {
    /* border-color: unset; */
    /* font-weight: 400; */
    min-height: 35px;
    min-width: 35px;
    /* padding: 6px; */
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-wrap: nowrap;
    /* width: 100%; */
    border-color: lightgray;
}
.reglas input:focus,
.obra_item input:focus {
    /* border-color: unset; */
    outline: 1px solid springgreen;
}

.add_obra .error_msg {
    transition: all 0.5s ease;
    font-weight: 400;
    font-size: 12px;
    color: #fd3e62;
    opacity: 0;
    min-height: 5px;
    /* padding: 0; */
    /* margin: 0; */
}
.add_obra .error_msg.show {
    opacity: 1;
    min-height: 20px;
}

.obra_item_actions {
    display: flex;
    justify-content: right;
    align-items: center;
}
.obra_item_del {
    cursor: pointer;
    transition: all 0.1s;
    margin: 4px 8px;
    color: gray;
    border-radius: 5px;
}
.obra_item_del>span {
    justify-content: center;
    display: flex;
    align-items: center;
    opacity: 0.8;
}
.obra_item_del:hover {
    color: #ef71efde;
    /* outline: 1px solid; */
}

span.info {
    /* padding: 2px; */
    background: darkgrey;
    border-radius: 50%;
    width: 15px;
    display: inline-block;
    height: 15px;
    color: white;
    text-align: center;
    cursor: help;
    font-size: 12px;
    border: 1px solid lightgrey;
    margin-left: 4px;
    /* margin-top: -2px; */
    /* position: absolute; */
}



.edit_seguros>div>div {
    outline: 1px solid;
    opacity: 0;
    z-index: -1;
}
.edit_seguros>div>div:first-of-type {
    outline: 0;
    opacity: 1;
    z-index: 1;
}



.edit_obras_cupos {
    outline: 1px solid #d7cfcfab;
    border-radius: 5px;
    margin-bottom: 5px;
}
.obras {
    outline: 0px solid lavender;
    border-radius: 8px;
    padding: 6px;
}

</style>
<?php

},10);
