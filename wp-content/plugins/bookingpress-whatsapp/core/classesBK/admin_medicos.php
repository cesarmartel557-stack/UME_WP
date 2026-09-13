<?php
/** if( !isset($_GET['obs']) ) return; */
#do_action('bookingpress_add_staffmember_shift_management_content');



add_action('admin_footer','modulo_opciones_medicos',9);//bookingpress_staff_members_dynamic_view_load


    function modulo_opciones_medicos(){
        
        /**
         * $all_obras = get_all_obras();
                $ob_col_id = array_column($all_obras, 'id');
                sort($ob_col_id, SORT_ASC);
                $last_id = !empty(end($ob_col_id))? end($ob_col_id): count($all_obras);
                echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx $last_id _______";
                $last_id = get_option("ultima_obras_id", $last_id);
                echo " zzzzzzzzzzzzzz $last_id _______";
          */      
        ?>
<div id="modulo_ajustes_medicos_main_app" style="margin: auto; text-align: center; display: none;">
<div id="modulo_ajustes_medicos_obs_particular" class="modulo_ajustes_medicos_obs_particular" >
<form @submit.prevent="guardar_ajustes_medico">
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
        <textarea v-model="form.descripcion" placeholder="Introduzca su descripcion, asi como horarios de atencion etc... \n Para agregar saltos de linea coloca: <br>. texto negrita: <b>texto ennegrita</b>"></textarea>
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
        <span class="particular_info">{{(form.config.solo_particular)?'Este medico atiende Solamente Particular':'Este medico atiende Particular/Obras Sociales/Seguros'}}</span>
        </div>
        
    </div>
    <div class="el-col reglas_particular "  :class=" !form.config.solo_particular?'show':'' " > <!-- v-show=" !form.config.solo_particular "-->
        <div class="br-out">
            <label title="Dejar en cero si no hay limite (independiente de otras opciones)">Max. de Obras sociales X dia: <span class="info" title="Dejar en cero si no hay limite (independiente de otras opciones)">?</span></label>
            <span style="opacity: 0;user-select:none;">Desde</span> <input type="number" min="0" v-model="form.config.regla_particular.max_obra_soc_x_dia" title="Dejar en cero si no hay limite maximo de obra social que atiendes por dia"> 
            <span>Dejar en cero si no hay limite</span>
        </div>
        <div class="br-out">
            <label title="Dejar campos en limpio si no se desea usar rango de fechas de atencion solo particular (independiente de otras opciones)">Particular Entre Fechas: <span class="info" title="Dejar campos en limpio si no se desea usar rango de fechas de solo particular (independiente de otras opciones)">?</span></label>
            <span title="Desde el dia">Desde</span> <input type="number" v-model="form.config.regla_particular.rango_fechas[0]" min="0" max="31"> <span title="Hasta el dia">Hasta</span> <input type="number" v-model="form.config.regla_particular.rango_fechas[1]" min="0" :min="form.config.regla_particular.rango_fechas[0]" max="31"> 
        </div>
        <div class="br-out">
            <label title="Dejar campos en limpio si no se desea usar rango de horas de atencion solo particular (se puede limitar a ciertos dias 'en conjunto')">Horas Solo particular: <span class="info" title="Dejar campos en limpio si no se desea usar rango de horas de solo particular (se puede limitar a ciertos dias 'en conjunto')">?</span></label>
            <span  title="Desde la Hora">Desde</span> <input type="time" v-model="form.config.regla_particular.rango_horas[0]"  > <span title="Hasta la Hora">Hasta</span> <input type="time" v-model="form.config.regla_particular.rango_horas[1]" :min="form.config.regla_particular.rango_horas[0]" > 
        </div>
        
        <div class="br-out">
            <label title="marcar los Dias solo particular (se puede limitar a dentro de un horario 'en conjunto')">Días Solo particular: <span class="info" title="marcar los Dias solo particular (se puede limitar a dentro de un horario 'en conjunto')">?</span></label>
            <!--<span style="opacity: 0;user-select:none;">Desde</span>-->
             <div class="lista_dias">
                <div class="dia_item"> <span> Domingo <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="dom"> </span></div> 
                <div class="dia_item"> <span> Lunes <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="lun"> </span></div>
                <div class="dia_item"> <span> Martes <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="mar"> </span></div>
                <div class="dia_item"> <span> Miercoles <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="mier"> </span></div>
                <div class="dia_item"> <span> Jueves <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="jue"> </span></div>
                <div class="dia_item"> <span> Viernes <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="vier"> </span></div>
                <div class="dia_item"> <span> Sabado <input type="checkbox" min="0" v-model="form.config.regla_particular.days" value="sab"> </span></div>
             </div>
            
            
        </div>
        
        <div class="br-out">
            <label title="Ignora Dias y Horas por separado. Solo si se cumplen ambas sera particular">Solo particular si Días y Horas (en conjunto): <span class="info" title="Ignora Dias y Horas por separado. Solo si se cumplen ambas sera particular">?</span></label>
            <span style="opacity: 0;user-select:none;">Desde</span> <input type="checkbox" min="0" v-model="form.config.regla_particular.days_horas_conjunto" title="Ignora rango de Fechas y Horas por separado. Solo si se cumplen ambas sera particular"> 
            
        </div>
        
    </div>
    
</div><!--Fin row reglas-->

<div class="el-row obras" :class=" !form.config.solo_particular?'show':'' " >
    
    <div class="add_obra edit_obras_cupos el-row" @keyup.enter="add_obra">
        <div class="obra_item columnas" >
            <div> Obra Social </div><div> Con limite </div><div> Cupos </div>
        </div>
        <div class="obra_item columnas" >
            <div> <input type="text" v-model="new_obra.value" placeholder="Obra social"> </div><div> <input type="checkbox"  v-model="new_obra.limitado"> </div><div> <input type="number"  v-model="new_obra.cupos" min="0"> </div>
        </div>
        <a class="button-primary" @click="add_obra">Agregar obra</a>
        <span class="error error_msg" :class=" (new_obra_error!=''?'show':'') ">{{new_obra_error}}</span>
    </div>
    
    <div class="edit_obras_cupos resize el-row">
        <!-- Encabezado con checkbox maestro -->
        <div class="obra_item columnas" >
            <div> 
                <input type="checkbox" v-model="selectAllObras" @change="toggleAllObras"> 
                <span style="font-weight: bold;">Seleccionar Todas</span>
            </div>
            <div> Con limite </div>
            <div> Cupos </div>
        </div>

        <!-- Lista de obras sociales -->
        <div class="obra_item" v-for="(obras, x) in form.config.obras_sociales" :key="obras.value" :data-ob="obras.value" :data-indx="x" :class="(obras.active)?'active':''">
        
            <div> <input type="checkbox" v-model="obras.active" @change="checkSelectAll"> <span class="label">{{obras.label}}</span> </div> 
            <div> <input type="checkbox"  v-model="obras.limitado"></div> 
            <div class="obra_item_cupos" :style="!obras.limitado?'opacity:0':''"> <input type="number" v-model="obras.cupos" min="0"> </div> 
            
            <span class="obra_item_del" v-if="obras.add_new" @click="remove_obra(x)"> X </span>
        </div>
    </div>
    
    <div v-if="obras_perdidas_count" class="posible_obras_perdidas">
        <span class="warning">Revisar posibles Obras Sociales perdidas:</span><br />
        <span v-for="perdida in form.config.obras_perdidas"> {{perdida}} </span> 
    </div>
    
    <div style="height: 50px;">
    </div>
    
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


</div><!-- row obras -->

<div class="el-row first-btn-row last-btn-row" v-show=" !form.config.solo_particular " ><!--button-primary-->
<button type="submit" class="el-button bpa-btn bpa-btn--primary el-button--default" >Guardar solo Esta seccion</button><!--@click="guardar_ajustes_medico"-->

<div>
<br >
        <label title="">Descripción interna para nuevos turnos del medico (Añadir Cita | info medico):</label>
        <br >
        <textarea v-model="form.config.desc_int" placeholder="Introduzca detalle o guia" style="min-width: 80%;"></textarea>
</div>

</div>

    </div><!-- Fin card configuracion medico-->
</form>
</div><!-- Fin modulo configuracion medico-->

    <div style="display: none;"><!--computed-->
{{staff_member_modal}} <br />
{{form.config.regla_particular.days}} <br />
{{computed_medico_id}}<br />


    </div>
</div>

        <?php
        
    }
    
    

add_action('admin_footer', function(){
/*
    ob_start();
    $tds =get_all_obras();
     ob_get_clean();
?>
<script id="tds_las_obras">
var todas_las_obras = <?php echo json_encode($tds); ?>;
</script>

<?php
*/

?>
<script>
var maxApp;

window.addEventListener("load", function(){
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

const modulo_medicos = new Vue({
    el: '#modulo_ajustes_medicos_main_app',
    props: [
    ],
    data() {
        return {
            max: null,
            open_staff_member_modal: false,
            medico_id: 0,
            obras_perdidas_count: 0,
            selected_obras : [],
            all_obras : [],//[ {"code":"3818","value":"PAMI – LOMA LINDA"}, {"code":"24","value":"IN.S.S.E.P."}, ],
            new_obra : {"active":true,"label":"","value":"", "limitado":false, "cupos":0, "grupo":false},
            new_obra_error: "",
            new_seguro : {"active":true,"label":"","value":"", "limitado":false, "cupos":0, "grupo":false, "tipo":"seguro"},
            new_seguro_error: "",
            selectAllObras: false,
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
                    obras_sociales: [
                        {"active":false,"label":"PAMI","value":"PAMI", "limitado":true, "cupos":1, "grupo":false},
                        {"active":true,"label":"PAMI - LOMA LINDA","value":"PAMI - LOMA LINDA", "limitado":true, "cupos":1, "grupo":false},
                        {"active":false,"label":"INSSSEP","value":"INSSSEP", "limitado":true, "cupos":1, "grupo":false},
                    ],
                    seguros_convenio: [],
                    obras_perdidas: [],
                    
                }//end config
            }//end form
        }
    },
    methods: {
        async on_open_modal(open = false){
            this.open_staff_member_modal = open;
            elem_modulo = document.querySelector(".modulo_ajustes_medicos_obs_particular");
            
            if( open ){
                this.update_medico_id();
                
                await document.querySelector(".bpa-dialog--staff-modal .bpa-dialog-body");
                document.querySelector(".bpa-dialog--staff-modal .bpa-dialog-body").append(elem_modulo);
                //alert("open modal");
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

        update_medico_id(id=null){
            if(id != null){
                this.medico_id = id;
            }else{
                this.medico_id = this.max.staff_members.update_id
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
            let obras = formdata.config.obras_sociales;
            let seguros = formdata.config.seguros_convenio;
            formdata.config.obras_sociales = [];
            formdata.config.seguros_convenio = [];
            
            bk_mod_postdata = {"action":"save_config_medico",  "appoint_data": formdata, "obras": obras,"seguros":seguros };
            //axios.post
                        //fetch( appoint_ajax_obj.ajax_url+'?action=save_config_medico', { method:'POST',body:JSON.stringify( bk_mod_postdata ), headers:{"Content-Type":"application/json"} } )
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
                                modulo.form.config = response.data.config;//JSON.parse(JSON.stringify( response.data.config), (a,b)=>{if(b=="false")b=false;if(b=="true")b=true;return b});
                                //modulo.form.config = confi;
                                modulo.form.descripcion = response.data.descripcion;
                                modulo.form.mpago = response.data.mpago;
                                
                                if( modulo.form.config.obras_perdidas != null ){
                                modulo.obras_perdidas_count = Object.entries(modulo.form.config.obras_perdidas).length;
                                }
                                console.log( "datos cargados ");
                            }
                        });
            }//if medico
        },
        get_todas_las_obras(){
            return JSON.parse(JSON.stringify( todas_las_obras ));
        }
    },
    computed:{
        staff_member_modal: function(){
            open = false;
            if( this.max != null)
                open = this.max.open_staff_member_modal;
                this.on_open_modal(open);
            return open;
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


<style>
.modulo_ajustes_medicos_obs_particular .bpa-default-card {
    padding-bottom: 50px;
}
.first-btn-row {
    text-align: center;
    /* padding: 10px 10px; */
    /* margin: auto; */
    width: 90%;
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
    border-radius: 10px;
    outline: 1px solid lightgray;
}
.br-out.descripcion_opt {
    width: 100%;
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
    max-width: 800px;
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
    color: #12d57c;
    font-weight: 600;
}

.reglas {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 90%;
    margin: auto;
    padding: 10px 0px;
}
.reglas>.el-col {
    text-align: left;
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
    width: 100%;
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
    transition: all 0.8s ease;
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
    padding: 4px;
    border-bottom: 1px solid darkgray;
    font-weight: 500;
    color: grey;
    min-width: 280px;
}
.reglas_particular>div>label {
    width: 50%;
    
    padding: 4px;
}


.reglas_particular .regla_dias>label {
    width: 30%;
}
.lista_dias {
    width: 70%;
    display: flex;
    flex-wrap: wrap;
}
.dia_item {
    border: 1px solid;
    border-radius: 3px;
    margin: 2px;
    min-width: 95px;
    padding: 2px;
    display: flex;
    flex-wrap: nowrap;
    flex-direction: row;
    align-content: space-between;
    justify-content: flex-end;
    align-items: center;
    /* width: 100%; */
}

.obras {
    transition: all 1s ease;
    opacity: 0;
    width: 90%;
    margin: auto;
    max-height: 0px;
}
.obras.show {
    opacity: 1;
    max-height: 1000px;
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
    height: 200px;
    resize: vertical;
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
    min-height: 34px;
    min-width: 400px;
    padding: 2px 0px;
    /* outline: 1px solid darkgray; */
    border-radius: 10px;
    outline-offset: 2px;
    /* margin-bottom: 10px; */
}
.obra_item:nth-child(odd) {
    background: #f3f3f3ad;
}
.obra_item.active {
    background-color: #2473df29;
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
}
.obra_item>div:first-of-type {
    width: 50%;
    //align-items: center;
}
.edit_obras_cupos .obra_item>div:first-of-type * {
    //margin: 0px 4px !important;
    margin-left: 4px;
}

.reglas input[type=number],
.reglas input[type=time] {
    max-width: 66px;
    min-width: 66px;
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
    //border-color: unset;
}
.reglas input,
.obra_item input {
    //border-color: unset;
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

.obra_item_cupos {
    transition: all 0.5s ease;
    
}
.obra_item_del {
    cursor: pointer;
    transition: all 0.1s;
    padding: 4px 8px;
    color: gray;
    border-radius: 5px;
}
.obra_item_del:hover {
    color: #ef71efde;
    outline: 1px solid;
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
    border-radius: 15px;
    margin-bottom: 5px;
}
.obras {
    outline: 1px solid #d7cfcfab;
    border-radius: 15px;
    padding: 5px;
}

</style>
<?php

},10);
