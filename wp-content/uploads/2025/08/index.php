<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if(!defined("BKMOD_SRC") ) { exit; }

$url_form_action = BKMOD_SRC . '/Ultimo_Historias/temp/imprimir.php';
#$url_form_action = BKMOD_SRC . '/Ultimo_Historias/includes/templates/historia_clinica_template3.php';

 /** 
  * add_action('admin_enqueue_scripts', array( $this, 'set_js' ), 11);
  * 
  * 
  * 
  * do_action('bookingpress_' . $requested_module . '_dynamic_helper_vars');
  * do_action('bookingpress_' . $requested_module . '_dynamic_components');
  * do_action('bookingpress_' . $requested_module . '_dynamic_directives');
  * var bookingpress_return_data = <?php do_action('bookingpress_' . $requested_module . '_dynamic_data_fields'); ?>;
  * computed: {
                            <?php do_action('bookingpress_' . $requested_module . '_dynamic_computed_methods'); ?>
    }
  * 
  * do_action('bookingpress_' . $requested_module . '_dynamic_on_load_methods');
  * do_action('bookingpress_' . $requested_module . '_dynamic_vue_methods');
  * 
  * jQuery(document).ready(function($){     });
  *                     
  */

/* 
<p> Dir: <?php echo BKMOD_SRC; ?> </p>
<p>PRUEBA IMPRIMIR - <?php echo $url_form_action ?></p>
*/

?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Maximiliano Suarez <cv.msuarez@gmail.com>" />

	<title>Hoja de Historia Clinica</title>
    <!--
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&" />//icon_names=minimize
    -->

    <script src="<?php echo admin_url( ).'load-scripts.php?c=0&load%5Bchunk_0%5D=jquery-core,jquery-migrate,utils&ver=6.8.2'; ?>"></script>
    
    <script>
     var appoint_ajax_obj = { 'ajax_url' : "<?php echo admin_url('admin-ajax.php'); ?>"};
     
     </script>
    <script id="js-vue" src="<?php echo BOOKINGPRESS_URL . '/js/bookingpress_vue.min.js'; ?>" ></script>
    <script id="js-moment" src="<?php echo BOOKINGPRESS_URL . '/js/bookingpress_moment.min.js' ?>" ></script>
    <style>
    .bphc-componente-impesion {
        margin-bottom: 20px;
        /*display: none;*/
    }
    .imprime-frame-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: start;
        transition: opacity 0.5s;
        background: #00000020;
        z-index: -100;
        opacity: 0;
    }
    .imprime-frame-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: start;
        transition: opacity 0.5s;
        background: #00000020;
        z-index: -100;
        opacity: 0;
        min-height: 27.9cm;
    }
    #imprimirFrame {
        width: 21cm;
        height: 20cm;
        
        opacity: 1;
        transition: opacity 0.5s;
    }
    </style>
</head>

<body>

<div id="bphc_component_main_container" class="bphc-main-cointainer">
    <template id="BPHC_Historias_Template">
        <div>
        <strong>Historias clinicas {{ turno }}</strong>
        </div>
        
        <?php 
        global $historiasClinicas_module_name;
        #do_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_view_load');
        ?>
        
    </template>
    <script>
    var histComponent = Vue.component('bphc-historias', {
        props: [ 'turno'],
        template: '#BPHC_Historias_Template'
    });
    
    </script>
    

    <div id="bphc_root_app">
        <h1>APP PRINCIPAL</h1>
        <div>
            <p>balablablalalba</p>
            
            <bphc-historias turno="2"></bphc-historias>
            <p>blablalbal {{ uno }}</p>
        </div>
        
    </div>
    

    
    
    <script >
    
    //#BPHC_Historias_Template
    
    new Vue({
        el: '#bphc_root_app',
        //components: { 'bphc-Historias': histComponent },
        data: {
            uno: 'xxxxx'
        },
        methods: {},
        mounted(){
            console.log('montado');
        },
    });
    
    </script>
</div>


<!-- *Componente IMPRESION *********** -->
    <div class="bphc-componente-impesion" style="text-align: center;">
        <form id="imprime_mi_Frame" target="imprimirFrameTarget" method="POST">
            <input type="hidden" name="imprimir_data" value='{"nombre":"jooo", "apellido":"Random"}' />
            
            <button type="submit" value="Hoja de impresion">Hoja de impresion</button>
        </form>
        
        <div class="imprime-frame-container">
        <iframe id="imprimirFrame" name="imprimirFrameTarget" scrolling="no" style="border:0;margin: 4px;" >
        
        </iframe>
        </div>
    </div>



<style>
html {
    --bpexpansion-icon-fullscreen: url("<?php echo bookingpress_mod_icon_helper('fullscreen.svg'); ?>");
    --bpexpansion-icon-fullscreen_exit: url("<?php echo bookingpress_mod_icon_helper('fullscreen_exit.svg'); ?>");
    --bpexpansion-icon-minimize: url("<?php echo bookingpress_mod_icon_helper('minimize.svg'); ?>");
}
.fullscreen, .fullscreen_exit, .minimize {
    background-image: var(--bpexpansion-icon-fullscreen);
    display: block;
    width: 16px;
    height: 16px;
    background-attachment: local;
    background-origin: border-box;
    background-position: center;
    object-fit: scale-down;
    background-color: #c3aaaa4a;
    color: transparent;
    background-size: cover;
    filter: invert(1);
}
.fullscreen_exit {
    background-image: var(--bpexpansion-icon-fullscreen_exit);
}
.minimize {
    background-image: var(--bpexpansion-icon-minimize);
}
span.close {
    color: #000000a1;
    display: block;
    padding: 0px 4px;
    filter: invert(1);
    background: #ffffff1c;
    font-weight: 700;
}
button.btn.small {
    background: transparent;
    padding: 0px;
    margin: 2px;
    border: 0;
    cursor: pointer;
}
</style>

<div class="poparea" style="opacity: 0;">
    <div id="bphc-pophistory-container" class="bphc-pophistory-container" style="position: absolute;">
        <div class="bphc-pophistory-header" style="display: flex;height: 24px;align-items: center;justify-content: space-between;"> 
            <label class="bpa-form-label" style="padding-left: 10px;">
                <span class="bphc-pophistory-title">Historias Clínicas Ambulatorias</span>
                <span class="bphc-pophistory-pname"></span>
            </label>
            
            <div class="bpa-hw-right-btn-group bpa-vac--head__right historypopbuttons" style="padding-right: 10px;">
                <button onclick="bphc_pop_history.min()" class="btn small" style="align-self:end;"><span class="minimize">minimize</span></button>
                <button onclick="bphc_pop_history.full_toggle(this)" class="btn small" style="align-self:end;"><span class="fullscreen">fullscreen</span></button>
                
                <button onclick="bphc_pop_history.close()" class="btn small" > <!-- el-button bpa-btn el-button--text el-popover__reference -->
                    <span class="close">X</span>
                </button>
           </div>
        </div>
        <iframe id="bphc-pophistory" class="bphc-pophistory" style="" 
        src="https://turnos2.clinicaume.com.ar/wp-admin/admin.php?page=bookingpress_historias&popup-display=1"
        >
        <!-- src="https://turnos2.clinicaume.com.ar/wp-admin/admin.php?page=bookingpress_historias&booking_id=2980&appointment=3018&service_id=62&paciente_id=43&paciente=16142210&" -->
            <p>..........................pop...........................</p>
        </iframe>
    </div>
    <p> ******** //TODO recargar el boton de Historia del turno al guardar la historia </p>
</div>


<div>
<textarea id="evaluar"  style="width: 100%; height: 200px;" >
/*const HistoryArea = document.querySelector('iframe#bphc-pophistory'); 
const historyContent = ( (HistoryArea.contentWindow || HistoryArea.contentDocument) );

console.log( historyContent );

historyContent.app.selected_bookingpress_appointment_id = 3019;
historyContent.app.selectPatient( {'customer_id': 1259, 'dni': 28154969  }, 'is_from_appointment' );
*/
var historyAppointmentPOP = ( row )=>{
                //Data from scope row - appointment id NOT booking id && customer_id always NEED customer_id!
            const HistoryArea = document.querySelector('iframe#bphc-pophistory'); 
            const historyContent = ( (HistoryArea.contentWindow || HistoryArea.contentDocument) );
            
            console.log(' ------', historyContent );
                //aqui selectPatient 'only'Fans needs the customer_id o~(*.º)~º
            historyContent.app.selected_bookingpress_appointment_id = 3019;//row.appointment_id;
            historyContent.app.selectPatient(  row , 'is_from_appointment' );
            document.querySelector('.poparea').style.display = '';
            setTimeout(()=>{
                if(selected_patient) document.querySelector('.bphc-pophistory-pname').innerHTML = (historyContent.app.selected_patient.customer_firstname+' '+historyContent.app.selected_patient.customer_lastname) 
            },700);
            
            }
historyAppointmentPOP({'customer_id': 1259, 'dni': 28154969  })

</textarea>
<button onclick="evaluar()">EVALUAR</button>
</div>
<script>
function evaluar(){
    console.log( document.querySelector('#evaluar').value );
    eval(document.querySelector('#evaluar').value);
}
</script>
<script>
class Historypop {
    constructor(){
        this.l = 0;
        this.t = 0;
        this.w = 0;
        this.h = 0;
        
        this.is_full= false;
    }
    
    getProps(){
        const el_pos  = document.querySelector('#bphc-pophistory-container');
        const el_size = document.querySelector('#bphc-pophistory');
        this.l = el_pos.style.left;
        this.t = el_pos.style.top;
        
        this.w = el_size.style.width;
        this.h = el_size.style.height;
        
        //console.log( el_pos );
        //console.log( el_pos.style.left );
    }
    
    setProps( inputvars = null ){
        if(inputvars!=null){
            const el_pos  = document.querySelector('#bphc-pophistory-container');
            const el_size = document.querySelector('#bphc-pophistory');
            el_size.style.width = inputvars.w;
            el_size.style.height = inputvars.h;
            el_pos.style.left = inputvars.l;
            el_pos.style.top = inputvars.t;
        }
        
    }
    
    min(){
        const pophist = document.querySelector('iframe#bphc-pophistory');
               
        if( pophist.style.display != 'none' ){
            pophist.style.display   = 'none';
        }else{
            pophist.style.display   = '';
        }
        
        console.log( {
            w: this.w,
            h: this.h,
            l: this.l,
            t: this.t,
            } );

    }
    
    full_toggle(butt){
        
        
        if(!this.is_full){
            console.log('FUllscreen');
            this.getProps();
            this.setProps({
                w: 'calc(100vw - 8px)',
                h: 'calc(100vh - 44px)',
                l: 0,
                t: 0,
                });
            //width: calc(100vw - 8px);
            //height: calc(100vh - 44px);
                        
        }else{
            if(this.is_full){
                this.setProps({
                    w: this.w,
                    h: this.h,
                    l: this.l,
                    t: this.t,
                    });
                //this.is_full = false;
            }
        }
        
        this.is_full = !this.is_full;
        if(butt.querySelector('span').innerHTML == 'fullscreen'){
            butt.querySelector('span').innerHTML = 'fullscreen_exit' //arrows_input
            butt.querySelector('span').classList.add('fullscreen_exit');
            butt.querySelector('span').classList.remove('fullscreen');
        }else{
            butt.querySelector('span').innerHTML = 'fullscreen'
            butt.querySelector('span').classList.add('fullscreen');
            butt.querySelector('span').classList.remove('fullscreen_exit');
        }
    }
    
    close(){
        console.log( 'close' );
        document.querySelector('.poparea').style.display = 'none';
    }
        
} 


var bphc_pop_history = new Historypop();
</script>
<style>
html {
--historypop-back-color: #9E9E9E;
--historypop-back-color: #009688;
--historypop-shadow: 0 0 20px #7788995c;
--historypop-outline: 1px solid lightgray;
}

.historypopbuttons {
    display: flex;
    justify-content: space-between;
}

iframe#bphc-pophistory {
    /* border-radius: 20px; */
    width: 60vw;
    height: 60vh;
    box-shadow: 0 0 20px lavender;
    resize: auto;
    margin: -1px -1px;
    border-radius: 0 0 5px 5px;
    border: 0;
    min-height: 590px;
    min-width: 480px;
}
.bphc-pophistory-header {
    text-align: center;
    background: var(--historypop-back-color);
    padding: 4px 0;
    width: 100%;
    border-radius: 5px 5px 0 0;
}
.bphc-pophistory-header {
    cursor: move;
    cursor: grab;
}
.bphc-pophistory-header:active {
    cursor: grabbing;
    cursor: move;
}

.bphc-pophistory-container {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: flex-start;
    background: var(--historypop-back-color);
    padding: 2px;
    margin: 0;
    border: 0;
    outline: 0;
    border-radius: 8px;
    min-width: 470px;
    transition: all 0.2s;
    box-shadow: 0 0 20px #7788995c;
    outline: 1px solid lightgray;
    box-shadow: var(--historypop-shadow);
    outline: var(--historypop-outline);
}
.poparea {
    display: flex;
    //padding-bottom: 20px;
    //background: wheat;
    //resize: auto;
    //width: 60vw;
    //height: 60vh;
    opacity: 0;
    transition: opacity 0.4s;
}
</style>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
jQuery(document).ready(function($){
    
    $('.bphc-pophistory-container').draggable({
        cursorAt: { top:5 },
        cursor: "move",
        cancel: ".bphc-pophistory-container iframe"
    });
    //$('.bphc-pophistory-container iframe').mouse( "_mouseUp" );//_mouseDrag
    
    
    
    document.querySelector('#bphc-pophistory').onload = ( ) => {
        document.querySelector('iframe#bphc-pophistory').style.display = '';
        $('.poparea').css( 'display', '');
        console.log( '-- load history -- ');
        $('.poparea').css( 'opacity', 1);
    };
    
});




</script>



</body>


<script>
window.addEventListener('DOMContentLoaded', function() {
    
    const impForm = document.querySelector('#imprime_mi_Frame');
    impForm.target='imprimirFrameTarget';
    impForm.action="<?php echo $url_form_action ?>";
    impForm.method="POST";
    impFormData = new FormData(impForm);
    //console.log(impForm);
    //impForm.append('imprimir_data', {'nombre':'jooo', 'apellido':'Random'});
    //impForm.submit();
    
    //impForm.onSubmit = function(){impForm.style.opacity=1;};
    
    const impFrame = document.querySelector('#imprimirFrame');
    impFrame.onload = ()=> {
        //Object.assign( document.querySelector('.imprime-frame-container').style, {'opacity':1, 'z-index':1000});
        console.log('FRAME load');
        console.log('preparando hoja.');
        impFrameShow();
    };

    var impFrameShow = ()=>{
        console.log('FRAME show');
        Object.assign( document.querySelector('.imprime-frame-container').style, {'opacity':1, 'z-index':9999});
    };
    
    
});
</script>

</html>