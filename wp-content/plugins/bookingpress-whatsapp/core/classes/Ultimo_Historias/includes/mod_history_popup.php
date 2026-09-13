<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if(!defined("BKMOD_SRC") ) { exit; }

#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);

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

?>
<script> console.log('popup init')</script>
<style>
.bpa-table-actions-wrap {
    
}
/* //2025-10-24 updates --cambiado  margin 4px, top 76 -- */
#histories_pop_display {
    left: 255px;
    top: 80px;
    width: auto;
    right: 0;
    margin: 0px;
    
    height: 0px;
    background: transparent;
    /*display: flex;
    justify-content: center;*/
    
}

@media (max-width: 1024px) {
    #histories_pop_display {
        left: 96px;
    }
}
@media (max-width: 782px) {
    #histories_pop_display {
        left: 0px;
        top: 76px;
    }
}
</style>
<div id="histories_pop_display" class=".bpa-main-list-card__is-staff-custom-view" style="position: fixed;z-index: 999;">
<?php 
/**
    <!--
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&" />//icon_names=minimize
    -->
<!--
    <script src="<?php echo admin_url( ).'load-scripts.php?c=0&load%5Bchunk_0%5D=jquery-core,jquery-migrate,utils&ver=6.8.2'; ?>"></script>
    <script>
     var appoint_ajax_obj = { 'ajax_url' : "<?php echo admin_url('admin-ajax.php'); ?>"};
     </script>
    <script id="js-vue" src="<?php echo BOOKINGPRESS_URL . '/js/bookingpress_vue.min.js'; ?>" ></script>
    <script id="js-moment" src="<?php echo BOOKINGPRESS_URL . '/js/bookingpress_moment.min.js' ?>" ></script>
-->
*/
?>
    <style>
    .bphc-componente-impesion {
        display: none;
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


<style>
html {

--bpexpansion-icon-fullscreen: url("<?php echo bookingpress_mod_icon_helper('fullscreen.svg'); ?>");
--bpexpansion-icon-fullscreen_exit: url("<?php echo bookingpress_mod_icon_helper('fullscreen_exit.svg'); ?>");
--bpexpansion-icon-minimize: url("<?php echo bookingpress_mod_icon_helper('minimize.svg'); ?>");
--bpexpansion-icon-close: url("<?php echo bookingpress_mod_icon_helper('close.svg'); ?>");

--historypop-back-color: #9E9E9E;
--historypop-back-color: #009688;
--historypop-back-color: #096f95;
--historypop-back-color: #fffffff2;

--historypop-header-title-color: lightgray;
--historypop-header-title-color: #363861d6;


--historypop-outline: 1px solid lightgray;


--historypop-shadow: 0 0 20px #7788995c;
--historypop-shadow: 0 0 40px #3f4449f5;


}

.fullscreen, .fullscreen_exit, .minimize, .close {
    background-image: var(--bpexpansion-icon-fullscreen);
    display: block;
    width: 16px;
    height: 16px;
    background-attachment: local;
    background-origin: border-box;
    background-position: center;
    object-fit: scale-down;
    /* background-color: #c3aaaa4a; */
    color: transparent;
    background-size: cover;
    /* filter: invert(1); */
    outline: 2px solid gainsboro;
}

.fullscreen_exit {
    background-image: var(--bpexpansion-icon-fullscreen_exit);
}
.minimize {
    background-image: var(--bpexpansion-icon-minimize);
}
.close {
    background-image: var(--bpexpansion-icon-close);
}
/*
span.close {
    display: block;
    padding: 0px 4px;
    font-weight: 700;
    line-height: 16px;
    color: #727e95;
}
*/
button.btn.small {
    background: transparent;
    padding: 0px;
    margin: 2px;
    border: 0;
    cursor: pointer;
}
</style>

<div class="poparea" style="opacity: 0; position: absolute;display: none;">
    <div id="bphc-pophistory-container" class="bphc-pophistory-container" style=""><!-- position: absolute; -->
        <div class="bphc-pophistory-header" style="display: flex;height: 24px;align-items: center;justify-content: space-between;"> 
            <label class="bpa-form-label" style="padding-left: 10px;">
                <span class="bphc-pophistory-title">Historias Clínicas Ambulatorias</span>
                <span class="bphc-pophistory-pname"></span>
            </label>
            
            <div class="bpa-hw-right-btn-group bpa-vac--head__right historypopbuttons" style="padding-right: 10px;">
                <button onclick="bphc_pop_history.min()" class="btn small pop-minimize" style="align-self:end;"><span class="minimize">minimize</span></button>
                <button onclick="bphc_pop_history.full_toggle(this)" class="btn small pop-full-toggle" style="align-self:end;"><span class="fullscreen">fullscreen</span></button>
                
                <button onclick="bphc_pop_history.close()" class="btn small pop-close" > <!-- el-button bpa-btn el-button--text el-popover__reference -->
                    <span class="close">close</span>
                    <!--<span class="close">X</span>-->
                </button>
           </div>
        </div>
        <iframe id="bphc-pophistory" class="bphc-pophistory" style="" 
        > <p>.......................cargando.......................</p>
        </iframe>
    </div>
    <!--<p> ******** //TODO recargar el boton de Historia del turno al guardar la historia </p>-->
</div>

<script>
window.addEventListener('DOMContentLoaded', function() {
    /**
    if( document.querySelector('.bpa-staff-header-navbar__mob').style.display != 'none' ){
        const navmob = document.querySelector('.bpa-staff-header-navbar__mob').getBoundingClientRect();
        if( document.querySelector('#histories_pop_display') ){
        document.querySelector('#histories_pop_display').style.top = navmob.height+'px';
        }
    }*/
});
</script>
<script>
class Historypop {
    constructor(){
        this.l = 0;
        this.t = 0;
        this.w = 0;
        this.h = 0;
        
        this.is_full= false;
        this.is_min = false;
        this.createListeners( )
        
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
        /*console.log( 'inputvars', inputvars );*/
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
            this.is_min = true;
        }else{
            pophist.style.display   = '';
            this.is_min = false;
        }
        this.enable_scroll();
        /*console.log( {
            w: this.w,
            h: this.h,
            l: this.l,
            t: this.t,
            } );
        */
    }
    
    full_toggle(butt){
        
        
        if(!this.is_full && !this.is_min){
            console.log('FUllscreen');
            this.getProps();
            
            document.querySelector('body').classList.add('remove_scrooll');
            
            let lefttt = 0;
            
            const sidenav = document.querySelector('.bpa-staff-sidebar-navigation');
            //console.log('bounding', sidenav.getBoundingClientRect(), 'screenW', screen.availWidth )
            if( sidenav.getBoundingClientRect().x < 100 ){
                lefttt = sidenav.getBoundingClientRect().width+'px';
            }
            
            let toppp = 0;
            
            if( document.querySelector('.bpa-staff-header-navbar__mob').style.display != 'none' ){
                const navmob = document.querySelector('.bpa-staff-header-navbar__mob');
                toppp = navmob.getBoundingClientRect().height+'px';
            }else{
                //toppp = window.pageYOffset+'px';
                //if(toppp == undefined) toppp = window.scrollY;
                if(toppp == undefined) toppp = 0+'px';
            }
            
            lefttt = lefttt==0? lefttt+'px':lefttt;
            toppp = toppp==0? toppp+'px':toppp;
            /**
            this.setProps({
                w: 'calc(100vw - '+lefttt+' - 4px)',
                h: 'calc(100vh - '+toppp+' - 4px)',
                l: lefttt,
                t: 0,
                });
                */
                
                let www = document.querySelector('#histories_pop_display').getBoundingClientRect().width+'px';
                let dispTop = document.querySelector('#histories_pop_display').offsetTop+'px';
                /*console.log('www', www, 'hhh',dispTop);*/
                console.log('calc HeIGTH ','calc(100vh - '+dispTop+' - 4px)' );
                this.setProps({
                w: www,//'calc(100vw -'+lefttt+' - 4px)',
                h: 'calc(100vh - '+dispTop+' - 4px)',
                l: 0,
                t: 0,
                });
                
            //width: calc(100vw - 8px);
            //height: calc(100vh - 44px);
                        
        }else{
            if(this.is_full){
                document.querySelector('body').classList.remove('remove_scrooll');
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
        this.enable_scroll();
    }
    enable_scroll(){
        if( this.is_full ){
            this.full_toggle( document.querySelector('.pop-full-toggle') );
        }
    }
        
    onScreenChange( ){
        if( this.is_full ){
            
                let www = document.querySelector('#histories_pop_display').offsetWidth+'px';
                let dispTop = document.querySelector('#histories_pop_display').offsetTop+'px';
                
                this.setProps({
                w: www,//'calc(100vw -'+lefttt+' - 4px)',
                h: 'calc(100vh -'+dispTop+' - 4px)',
                l: 0,
                t: 0,
                });
        }
    }
    
    onScroll( ){
        /*console.log('pagOffs', window.pageYOffset );*/
        if( window.pageYOffset > 80 ){
            document.querySelector('#histories_pop_display').style.top = 0;
        }else{
            document.querySelector('#histories_pop_display').style.top = '';
        }
    }
    createListeners( ){
        window.addEventListener("resize", ()=>{this.onScreenChange( )});
        window.addEventListener("scroll", ()=>{this.onScroll( )});
    }
        
} 


var bphc_pop_history = new Historypop();
</script>
<style>


.remove_scrooll {
    max-height: 100%;
    overflow: hidden;
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
    min-height: 500px;
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

.bphc-pophistory-header .bpa-form-label {
    color: var(--historypop-header-title-color);
    margin-bottom: 0;
}

/*
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
    transition: opacity 0.3s;
    box-shadow: 0 0 20px #7788995c;
    outline: 1px solid lightgray;
    box-shadow: var(--historypop-shadow);
    outline: var(--historypop-outline);
    place-self: center;
}
*/

/* -- //2025-10-24 updates removido padding y box-shadow --  */
.bphc-pophistory-container {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: flex-start;
    background: var(--historypop-back-color);
    /* padding: 2px; */
    margin: 0;
    border: 0;
    outline: 0;
    /* border-radius: 8px; */
    min-width: 470px;
    transition: opacity 0.3s;
    /* box-shadow: 0 0 20px #7788995c; */
    outline: 1px solid lightgray;
    /* box-shadow: var(--historypop-shadow); */
    outline: var(--historypop-outline);
    place-self: center;
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
.bpa-btn--is-loader .history_btn_text {
    opacity: 0;
}
</style> 
<!-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->
<script src="<?php echo bookingpress_mod_icon_helper('jquery-ui.js'); ?>"></script>
<script> var $bphc_pophistory_url = "<?php echo admin_url('admin.php?') . 'page=bookingpress_historias&popup-display=1'.(isset($_GET['z'])?'&z=1':'').(isset($_GET['test'])?'&test=1':'').(isset($_GET['imp'])?'&imp=1':'') ?>";</script>
<script>
var xhistory_btns_disabled = true;

jQuery(document).ready(function($){
    app.history_btns_disabled = true;
    
    $('.bphc-pophistory-container').draggable({
        cursorAt: { top:5 },
        cursor: "move",
        cancel: ".bphc-pophistory-container iframe"
    });
    //$('.bphc-pophistory-container iframe').mouse( "_mouseUp" );//_mouseDrag
    
    console.log( '--- considerado ready ---');
    
    setTimeout(()=>{
        //"admin.php?page=bookingpress_historias&popup-display=1"
        document.querySelector('#bphc-pophistory').src = $bphc_pophistory_url;
    },5000);
        
    document.querySelector('#bphc-pophistory').onload = ( ) => {
        /**
        if( document.querySelector('.bpa-staff-header-navbar__mob').style.display != 'none' ){
            const navmob = document.querySelector('.bpa-staff-header-navbar__mob').getBoundingClientRect();
            if( document.querySelector('#histories_pop_display') ){
                console.log( 'ajustando top', navmob );
            document.querySelector('#histories_pop_display').style.top = navmob.height+'px';
            }
        }*/
        document.querySelector('iframe#bphc-pophistory').style.display = '';
        //$('.poparea').css( 'display', '');
        console.log( '-- load history -- ');
        $('.poparea').css( 'opacity', 1);
        app.history_btns_disabled = false;
        
        //$('.history_btn_text').css('opacity', '1');
        
        //historyAppointmentPOP({'customer_id': 1259, 'dni': 28154969  }) // TEST EXAMPLEE ---- // 
    };
    
});




</script>

</div>
