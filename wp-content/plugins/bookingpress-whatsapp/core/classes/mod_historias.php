<?php
// Verificar que WordPress esté cargado
if (!defined('ABSPATH')) {
    exit; // Salir si se accede directamente
}

if( !defined('BKMOD_STYLES_DIR')) define('BKMOD_STYLES_DIR', BKMOD_SRC . '' );

#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);

/*
$bookingpress_geoip_file = BOOKINGPRESS_PRO_LIBRARY_DIR . '/geoip/autoload.php';
require $bookingpress_geoip_file;
use GeoIp2\Database\Reader;
*/
function historias_add_styles(){
    global $historias_add_styles_ready;
    if( empty($historias_add_styles_ready) ){
    ?>
    
<script>
window.addEventListener('DOMContentLoaded', function() {
    
    //window.document.addEventListener("change", winVisChange );
//window.document.oncontentvisibilityautostatechange = winVisChange();
    //document.querySelector('body').addEventListener("click", winVisChange );
    
    
    
});

    function scrollToTopElement( ev, el ){
        targetEl = document.querySelector('.start-form');//('.bp_hc_dual_col_form #dual_view_bphc_history_add_container');
        targetEl.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
        let delaytime = document.querySelector('.bp_hc_dual_view_container.landscape')? 800: 500;
        setTimeout(()=>{ location.hash = '#'; location.hash = '#contenido-principal'; /*document.querySelector('#contenido-principal').scrollIntoView({behavior: 'smooth',block: 'start'});*/ }, delaytime);
        
    }
    
    function onScrollToTopBtnChange(ev, el){
        const targetEl = document.querySelector('.bp_hc_dual_col_form');
        const showBtnEL = document.querySelector('.history-gototop-btn');
        if( targetEl && showBtnEL/*document.querySelector('.bp_hc_dual_col_form')*/ ){
                       
                        
            if( !document.querySelector('body.__is_bphc_popup') || document.querySelector('body.__is_bphc_popup .landscape')  ){
                //console.log("es relativo");
                cond1 = document.documentElement.scrollTop > ( (targetEl.scrollHeight/1.5) + document.querySelector('#bphc_main_historias_el').offsetTop - document.documentElement.clientHeight );
                cond2 = document.documentElement.scrollTop >= (document.documentElement.scrollHeight - document.documentElement.clientHeight - 50);
                //console.log( document.documentElement.scrollTop, document.documentElement.scrollHeight, document.documentElement.clientHeight);
                //console.log( document.documentElement.scrollTop, ( (targetEl.scrollHeight/1.7) + document.querySelector('#bphc_main_historias_el').offsetTop - document.documentElement.clientHeight ), window.innerHeight, document.documentElement.clientHeight );
                if( cond1 || cond2 ){
                    document.querySelector('.history-gototop-btn').classList.add('show');
                }else{
                    document.querySelector('.history-gototop-btn').classList.remove('show');
                }
                
            }else{
                if( targetEl.scrollTop > (targetEl.scrollHeight - targetEl.scrollWidth) ){
                    document.querySelector('.history-gototop-btn').classList.add('show');
                }else{
                    document.querySelector('.history-gototop-btn').classList.remove('show');
                }
            }
            
            //console.log("scroll---", targetEl.scrollTop, el );
            //console.log("listener", (!document.querySelector('body.__is_bphc_popup') || document.querySelector('body.__is_bphc_popup .landscape')) );
            
            
        }
        
        if( !document.querySelector('body.__is_bphc_popup') ){
            //if( window.scrollY < 100 )
            if( window.scrollY < 100 && document.querySelector('#contenido-superior').getBoundingClientRect().top < 150 ){
                document.querySelector('#contenido-superior').scrollIntoView({behavior: 'smooth', block:'nearest'});
                setTimeout(()=>{ location.hash = '#contenido-superior';}, 50);
            }
        }
    }
    
    window.addEventListener("scroll", onScrollToTopBtnChange );
    //document.addEventListener("scrollend", onScrollToTopBtnChange );

</script>

<script>
/*
var $histories_Obj = [

                {
                    "id": "1",
                    "date": "2025-09-01",
                    "time": "09:00",
                    "bookingpress_appointment_id": "1",
                    "bookingpress_customer_id": "1",
                    "bookingpress_staff_member_id": "3",
                    "staff_member_name": "Dr.JoseTest",
                    "service_name": "Cardiología",
                    "consultation_data": {
                        "general":{
                			"motivoConsulta": "",
                			"diagnostico": "",
                			"tratamiento": "",
                			"notas": ""
                        },
                    	"vitales":{
                    	    "altura":"",
                            "peso":"",
                    		"presionArterial":"",
                    		"frecuenciaCardiaca":"",
                    		"frecuenciaRespiratoria":"",
                    		"temperatura":"",
                    		"saturacionOxigeno":""
                    	},
                    	"antecedentes":{
                    		"personales":[{"a":"Traumatismo","motivo":"se pego en la cabeza."},{"a":"Colicos","motivo":"comio achuras."}],
                    		"familiares":[{"a":"Diabetes","motivo":"abuelo pat."}],
                    	},
                    	"medicamentos":[
                    		{"nombre" :"ibuprofeno","dosis" :"2","frecuencia" :"8hs", "fecha":"2025/03/14"},
                            {"nombre" :"antibiotico","dosis" :"1","frecuencia" :"12hs", "fecha":"2025/03/14"},
                    	]
                        
                    }
                },
                
            ];
*/
</script>

<style>
.expansion-printable table td, .expansion-printable table th {
    border: 0.1pt solid #333;
}
.el-table td, .el-table th {
    border: 0;
}
body {
--linetime-bgcolor-line: #b0d6c96b;

--linetime-bgcolor-round: #fff;
--linetime-size-round-w: 20px;
--linetime-size-round-h: 20px;

--linetime-color-font: gray;
--linetime-border-radius: 50%;
--linetime-outln: 2px solid #51bfbc4f;

--linetime-align: stretch;


--linetime-bgcolor-line: #096f95fc;
--linetime-color-font: #096f95fc;


--linetime-border-radius: 0px;
--linetime-outln: 2px solid var(--linetime-bgcolor-line);

--linetime-align: center;


--linetime-bgcolor-line: rgb(20 162 211);
--linetime-bgcolor-round: rgb(20 162 211);

--linetime-bgcolor-line: rgb(9 111 149);
--linetime-bgcolor-round: rgb(9 111 149);
--linetime-marginL-round: calc( var(--linetime-size-round-w) / (-2) + 3px );
}

</style>
 <style>
 .bpa-table-container .el-table__body-wrapper table tbody tr:nth-child(even) {
    background-color: #fbfbfb !important;
}
 .el-table--enable-row-hover .el-table__body tr:hover>td.el-table__cell {
    /* background-color: #595a5a !important; */
    /* color: white; */
}

.el-table th .cell {
    text-overflow: ellipsis !important;
    word-break: break-word !important;
    white-space: nowrap !important;
    overflow: hidden !important;
}
.el-table th:nth-of-type(2) .cell {
    min-width: 120px;
    /* display: block; */
}

@media (max-width: 800px){
    .el-table th .cell {
        /* text-decoration: underline; */
        /* text-decoration-color: cadetblue; */
        color: cadetblue;
    }
    .el-table th .cell .caret-wrapper {
        /*display: none; */
    }
    
} 

.link-paciente {
    display: inline-flex;
    align-items: center;
    width: 100%;
    height: 100%;
    cursor: pointer !important;
    padding: 4px 10px;
    min-height: 40px;
}

.el-table tr {
    background-color: #fff;
}


/*
.link-paciente:hover .el-image {
    outline: 1px solid #00d1a1e8;
    //box-shadow: 0 0 5px #00d1cf8a;
}
*/

.link-paciente label {
    cursor: pointer !important;
}
.link-paciente div.el-image {
    min-width: fit-content;
    box-shadow: 0 0px 3px gray;
    min-width: 24px;
}
@media (min-width: 1024px){
    .link-paciente div.el-image {
        min-width: 32px;
    }
}


.el-table tr .el-table__cell {
    border-bottom: 4px solid transparent;
}
tr.el-table__row:hover {
    /*outline: 1px solid lightblue;*/
    /* border-radius: 5px; */
    /* max-height: 30px; */
}
.el-table--enable-row-hover .el-table__body tr:hover>td.el-table__cell {
    background: #06b998;
    /* background-color: #5d6a6c38 !important; */
    /* color: white; */
    /* outline: 1px solid lightslategray; */
}

.el-table tr:hover .cell, .el-table .link-paciente:hover  {
    cursor: pointer;
    color: #00a1a1e8;
    color: #0064a1e8;
    /* box-shadow: 0 0 5px #00d1cf8a; */
}
.el-table tr:hover .el-image {
    outline: 1px solid #00a1a1e8;
    /* box-shadow: 0 0 5px #00d1cf8a; */
}

.el-table tr:has(.link-paciente.activo) .el-table__cell {
    
    background: #5b7bbe2b;
    background: #90bbda1a;
}
.link-paciente.activo .link-paciente.activo:hover, .el-table tr:has(.link-paciente.activo) .cell {
    color: var(--bpa-dt-black-400-darker);
    color: #2a4270;
}




.link-paciente label {
    word-break: keep-all;
}

.w25min {
    width: 30%;
    min-width: 250px;
    border: 1px solid #a9a9a98f;
    border-radius: 0 10px 10px 0;
    /* box-shadow: -1px 0px 7px 0px grey; */
    background-color: white;
    padding: 2px;
}
.el-row.w25min {
    padding-right: 0;
    margin-left: 5px;
    margin-bottom: 20px;
    border: 1px solid lightgray;
    border-radius: 0 0px 0 0;
    /* margin-top: 0; */
    border-width: 1px 1px 0px 0;
    min-width: 300px;
}

.historias_y_pacientes {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    padding-top: 20px;
    
    transition: all 0.8s;
    background-color: #dfe1e51a;
    //font-size: 16px;
    //font-weight: 500;
    /* font-family: var(--bpa-secondary-font), var(--bpa-primary-font); */
    /* font-family: 'Poppins'; */
}
.main-historias {
    display: flex;
    width: calc(100% - max(250px, calc(30% + 10px)) );
    min-width: 200px;
    align-items: flex-start;
    flex-direction: column;
    padding: 10px;
    padding-top: 0;
    border: 0px dotted darkgrey;
    border-radius: 10px;
    margin: 2px;
}


.lista-historias-container {
    width: 100%;
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    padding: 0;
    justify-content: start;
    justify-content: flex-start;
    align-items: center;
}

.lista-historias {
    display: flex;
    flex-direction: column;
    /* width: calc( 100% - 30px); */
    /* height: 100%; */
    /* position: relative; */
    /* padding: 0; */
    align-items: stretch;
    width: 100%;
    justify-content: flex-start;
    padding: 20px 0;
}
.lista-historias {
    overflow-y: scroll;
    height: 60vh;
}



.w25min {
    width: 30%;
    min-width: 250px;
    border: 0px solid #a9a9a98f;
    border-radius: 0 10px 10px 0;
    /* box-shadow: -1px 0px 7px 0px grey; */
    background-color: white;
    padding-top: 10px;
}
.lista-pacientes {
    margin-top: 2px;
}

.listas-pacientes, .listas-pacientes .el-table, .listas-pacientes .el-table tr {
    background-color: #ffffff;
    
}


.historia-item {
    background-color: #fafffe;
}
.historia-item {
    background-color: #fdfdfd;
}
.historia-item {
    display: block;
    width: 100%;
    min-height: 160px;
    margin: 4px 0;
    border-radius: 5px;
    transition: all 0.3s ease 0.1s;
    margin-bottom: 36px;
    outline: 1px solid var(--bpa-gt-gray-400);
    box-shadow: -1px 0px 30px 0px #8080801f;
    cursor: pointer;
    /* position: relative; */
    transition: all 0.2s;
    left: 0;
    padding: 10px 4px;
    box-shadow: 4px 4px 4px rgba(207,214,229,.35);
}
/*
.historia-item {
    display: block;
    width: 100%;
    min-height: 110px;
    margin: 4px 0;
    border-radius: 5px;
    transition: all 0.3s ease 0.1s;
    margin-bottom: 36px;
    padding: 10px;
    outline: 1px solid #2929715e;
    outline: 1px solid #46464a38;
    box-shadow: -1px 0px 30px 0px #8080801f;
    cursor: pointer;
    position: relative;
    transition: all 0.2s;
    left: 0;
}
*/
/*
.historia-item:hover {
    outline: 1px solid #2196f352;
    background-color: #f2f3f3;
    background-color: #f7f7f7d6;
    box-shadow: 0 0 3px white;
    
}
*/
.historia-item>div {
    min-height: 120px;
    gap: 2px;
}

.historia-item:hover {
    outline: 2px solid #7ea5c5c4;
    /* background-color: #f7f7f7d6; */
    box-shadow: 2px 5px 20px #1d1f1e14;
}





.subt-historias {
    /* width: 100%; */
    padding: 10px 40px 0 0px;
    border-bottom: 1px dotted darkgray;
    margin: 10px 10px 30px;
}

.subt-historias * {
    color: cornflowerblue;
    /* font-family: sans-serif; */
}



.bphc-summary-dialog-card {
    margin: 4px;
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    /* padding: 8px; */
    /* padding-top: 40px; */
    /* border-radius: 3px; */
    
}

.bphc-summary-dialog-card {
    font-family: 'Inter';
    font-size: 14px;
    color: var(--bpa-dt-black-400);
}

/* ------------------------------------------------------------------------------------ */


.bphc-form-grid {
    margin-top: 20px;
    display: flex;
    /* flex-wrap: wrap; */
    display: grid;
    gap: 20px;
    /* justify-items: stretch; */
    grid-template-columns: repeat(2, 1fr);
    align-items: start;
    justify-content: center;
    grid-template-columns: min(45%,500px) calc((100% - 20px) - min(45%,500px) );
}

/* https://turnos2.clinicaume.com.ar/wp-admin/admin.php?page=bookingpress_appointments&z */
.bp_hc_dual_view_container {
    width: 100%;
    min-height: 380px;
    display: grid;
    grid-template-columns: auto auto;
    grid-template-columns: calc(50% + 50px) auto;
    gap: 10px;
    
}
.bp_hc_dual_view_container.full_form {
    grid-template-columns: 1fr;
}

.bp_hc_dual_view_container.portrait .historia-item .el-tag {
    max-width: calc(50% - 2px);
    overflow: clip;
    text-overflow: ellipsis;
}

.bp_hc_dual_view_container.landscape {
    grid-template-columns: 1fr;
    width: 100%;
}
.bp_hc_dual_view_container.landscape .bp_hc_dual_col_form {
    resize: none;
    /*min-height: 600px;*/
    /* order: 1; */
}


body.__is_bphc_popup:has(.bp_hc_dual_view_container.landscape) {
    overflow-y: scroll !important;
}
body.__is_bphc_popup:has(.bp_hc_dual_view_container.landscape) #bphc_main_historias_el {
    position: relative;
    height: auto;
    padding: 10px 0px 10px 10px;
    margin-right: 0px;
}


body.__is_bphc_popup:has(.bp_hc_dual_view_container.landscape) .lista-pacientes {
    display: none;
}
body.__is_bphc_popup .historias-title-filter-header {
    display: none;
}


.bp_hc_dual_view_container.portrait {
    width: 100%;
    grid-template-columns: auto auto;
    grid-template-columns: calc(50% + 50px) auto;
}


.bp_hc_dual_view_container .bphc-form-grid {
    grid-template-columns: repeat(1, 1fr);
}

.bp_hc_dual_view_container .bp_hc_dual_col_form {
    display: flex;
    max-width: 100%;
    margin: 4px;
    flex-direction: column;
    max-height: calc(100% - 20px);
    overflow-y: auto;
    resize: horizontal;
    min-width: 500px;
}

/* Opciones estándar (recomendado) */
.bp_hc_dual_col_form {
  /*scrollbar-width: thin; *//* Puede ser 'auto', 'thin', o 'none' */
  /*scrollbar-color: #888 #f1f1f1;*/ /* color-thumb y color-track */
}
.bp_hc_dual_view_container .bp_hc_dual_col_form, 
.bp_hc_dual_view_container .lista-historias {
    scrollbar-width: thin;
    /*scrollbar-color: #36cb9b08 #a1c3c012;*/
}
.bp_hc_dual_view_container {
    scrollbar-width: thin;
    scrollbar-color: #29f5b380 #b6d3d112;
}

/* Para una mayor compatibilidad con navegadores más antiguos, usa ::-webkit-scrollbar */
.bp_hc_dual_col_form::-webkit-scrollbar {
  width: 12px;  
  background-color: #29f5b380; /* Fondo del scroll */
}

.bp_hc_dual_col_form::-webkit-scrollbar-thumb {
  background-color: #29f5b380;/* #888; */
  /*background-color: #fff;*/ /* #888; */
  border-radius: 6px; /* Para esquinas redondeadas */
}



.bp_hc_dual_view_container .lista-historias-container {
    min-width: 465px;
    
    
    min-height: 380px;
    height: 100%;
    display: flex;
    align-content: space-between;
    /* align-items: stretch; */
    justify-content: space-between;
}

.bp_hc_dual_view_container .lista-historias-container .lista-historias {
    padding-right: 10px;
    /* height: calc(100% - 200px); */
    height: 100%;
}


@media (max-width: 880px){
.bphc-form-grid {
    margin-top: 20px;
    display: flex;
    /* flex-wrap: wrap; */
    display: grid;
    gap: 20px;
    /* justify-items: stretch; */
    grid-template-columns: repeat(1, 1fr);
    align-items: start;
    justify-content: center;
}
}

.flex {
    display: flex;
}


/* Formulario Vitales -------------------------------------------------------------------------------- */


.icon-container {
    width: 24px; 
    
}
.bphc-vitales {
    font-size: 16px;
}

.bphc-vitales .el-form-item::after, .el-form-item::before {
    display: table;
    content: "";
    position: absolute;
}
.bphc-vitales .el-form-item {
    display:flex;
    align-items:end;
    justify-content:space-between;
}


.bphc-vitales .bpa-form-label {
    /* text-transform: uppercase; */
}

.bphc-vitales .bphc_item_input {
    width: 80px;
}
.bphc-vitales .bphc_item_input input {
    border-radius: 0;
    border-width: 0 0 1px 0;
    text-align: right;
}

.bphc-vitales .el-form-item__error {
    left: 0;
}


.bphc-info .el-form-item {
    margin-bottom: 20px;
}

.bphc-group-meds-files {
    /* height: 100%; */
    align-self: start;
    display: flex;
    flex-direction: column;
    align-items: stretch;
    gap: 20px;
    align-content: flex-start;
    justify-content: flex-end;
}

.border-item {
    outline: 1px solid var(--bpa-pt-blue-alpha-08);
    border-radius: 3px;
}

.rowitem-center {
    align-items: center;
    display: flex;
}
/* ------------------------------------------------------------------------------------ */

.bpa-fbr--customer .el-row {
    flex-wrap: wrap;
}


.histories-listing-header {
    flex-wrap:wrap;
    justify-content: flex-end;
}

@media (min-width: 1000px){
    .histories-listing-header {
        justify-content: flex-end;
    }
}

.histories-listing-header {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    border: 1px solid #9e9e9e5e;
    padding-bottom: 10px;
    height: 74px;
    /* box-shadow: 0px 0px 3px magenta; */
    border-bottom: 1px solid #b9c9de;
}

.historia-item .bphc_inf_motivo {
    display: flex;
    flex-direction: column;
    min-width: 150px;
    padding: 0 10px;
    flex-basis: 60%;
}



.bphc_listing_conf-1  .historia-item .bphc_inf_sname {
    flex: 1 1 0%;
    max-width: 30%;
}
.bphc_inf_sname>div {
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
}
.bphc_inf_sname .el-tag {
    max-width: 100px;
    text-overflow: ellipsis;
    overflow: clip;
}


.bphc_listing_conf-2  .historia-item .bphc_inf_motivo {
    flex: 1 1 0%;
}




.bphc_historia-item-before {
    display: flex;
    justify-content: center;
    /* padding: 0 10px; */
    align-content: center;
    align-items: var(--linetime-align);
    flex-direction: column;
    flex-direction: row;
    position: relative;
}
.bphc_item-before-line {
    width: 10px;
    background: var(--linetime-bgcolor-line);
    height: 100%;
    align-self: center;
    position: absolute;
}
/*
.bphc_item-before-round {
    width: var(--linetime-size-round-w);
    height: var(--linetime-size-round-h);
    color: var(--linetime-color-font);
    z-index: 1;
    outline: 2px solid #51bfbc4f;
    border-radius: var(--linetime-border-radius);
    justify-content: center;
    background-color: var(--linetime-bgcolor-round);
}
*/
.bphc_item-before-round {
    /* content: ' '; */
    /* position: absolute; */
    /* left: -60px; */
    width: var(--linetime-size-round-w);
    height: var(--linetime-size-round-h);
    color: var(--linetime-bgcolor-line);
    z-index: 1;
    outline: var(--linetime-outln);
    border-radius: var(--linetime-border-radius);
    /* padding: 6px; */
    /* margin-left: -45px; */
    display: flex;
    align-items: center;
    justify-content: center;
    /* box-shadow: 0 0 2px slategray; */
    background-color: var(--linetime-bgcolor-round);
    /* text-align: center; */
    /* font-weight: 600; */
}
.bphc_item-before-round {
    /* content: ' '; */
    /* position: absolute; */
    /* left: -60px; */
    width: var(--linetime-size-round-w);
    height: var(--linetime-size-round-h);
    color: #14a2d3;
    z-index: 1;
    outline: var(--linetime-outln);
    border-radius: 50%;
    /* padding: 6px; */
    /* margin-left: -45px; */
    display: flex;
    align-items: center;
    justify-content: center;
    /* box-shadow: 0 0 2px slategray; */
    background-color: var(--linetime-bgcolor-round);
    /* text-align: center; */
    /* font-weight: 600; */
    margin-top: -10px;
    align-self: center;
}

.bphc_item-before-round>span {
    background: white;
    padding: 4px;
}
.bphc_item-before-round>div {
    width: 30px;
    height: 30px;
    position: absolute;
    background: currentColor;
    z-index: -1;
    transform: scale(1.5);
}
.bphc_item-before-round>div {
    width: 15px;
    height: 15px;
    position: absolute;
    background: currentColor;
    z-index: -1;
    transform: rotate(45deg);
    right: 15px;
}





.bphc_item-before-round {
    /* content: ' '; */
    /* position: absolute; */
    /* left: -60px; */
    width: var(--linetime-size-round-w);
    height: var(--linetime-size-round-h);
    color: #14a2d3;
    z-index: 1;
    outline: 0;
    border-radius: 50%;
    /* padding: 6px; */
    /* margin-left: -45px; */
    display: flex;
    align-items: center;
    justify-content: center;
    /* box-shadow: 0 0 2px slategray; */
    background-color: var(--linetime-bgcolor-round);
    /* text-align: center; */
    /* font-weight: 600; */
    margin-top: 38px;
    align-self: start;
}
.bphc_item-before-round>div {
    width: 15px;
    height: 15px;
    position: absolute;
    background: currentColor;
    z-index: -1;
    transform: rotate(45deg);
    right: 15px;
}
.bphc_item-before-round>span {
    background: white;
    padding: 5px 1px;
    border: 2px solid dodgerblue;
    border-radius: var(--linetime-border-radius);
    border-radius: 45%;
    color: #4f5972;
    font-weight: 800;
    font-size: 16px;
    font-family: 'element-icons';
    letter-spacing: 0px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.bphc_item-before-round>span {
    background: white;
    padding: 6px 1px;
    border: 2px solid dodgerblue;
    border-radius: var(--linetime-border-radius);
    border-radius: 45%;
    color: #4f5972;
    font-weight: 600;
    font-size: 11px;
    font-family: sans-serif;
    letter-spacing: 0px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.bphc_item-before-round {
    opacity: 1;
}
.bphc_item-before-round.show {
    opacity: 1;
}


.comentado_bphc_selecciona_paciente h2 {
padding: 100px 20px;position: absolute;width: 100%;text-align: center;
}
.comentado_bphc_selecciona_paciente span {
    background: transparent;color: cornflowerblue;font-size: 16px;padding-top: 20px;
}

.bphc_no_historias, .bphc_selecciona_paciente, .bphc_cargando_historias {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
}
.bphc_no_historias>h2, .bphc_selecciona_paciente h2, .bphc_cargando_historias h2 {
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    width: 100%;
    height: 100%;
    font-size: 16px;
} 
.bphc_no_historias img, .bphc_selecciona_paciente svg {
    fill: #2196f312;
    width: 50%;
    justify-self: center;
    min-width: 250px;
}

.bphc_selecciona_paciente {
    
}

@media (max-width: 1100px) {
    .historias_y_pacientes {
        flex-direction: column;
    }
    
    .main-historias, .lista-pacientes {
        width: calc( 100% - 5px);
        border: 0;
    }
    .w25min, .el-row.w25min {
        border: 0;
        border-width: 0;
    }
    
}



.bphc_historia-item-before {
    display: flex;
    justify-content: center;
    /* padding: 0 10px; */
    align-content: center;
    align-items: stretch;
    flex-direction: column;
    flex-direction: row;
    position: relative;
    width: 80px;
    margin-left: -6px;
    padding-top: 15px;
}


.first-desc-form {
    transition: all 0.2s;
    display: flex;
    justify-content: space-between;
    align-items: end;
}


.first-desc-form .fdform_left {
    transition: all 0.2s;
    text-align: start;
    align-self: end;
    justify-self: flex-start;
}
.first-desc-form .fdform_right {
    display: flex;
    justify-content: end;
    align-self: end;
    max-width: 180px;
    max-height: 40px;
    padding-right: 12px;
}
.first-desc-form .fdform_right .el-tag {
    padding: 10px;
    width: 100%;
    background-color: #f0faff30;
    /* text-align: center; */
    width: 168px;
    min-height: 40px;
    font-size: 14px;
    transition: none;
    padding-left: 16px;
    border-radius: 5px;
    margin: 0;
}

@media (max-width: 782px) {
    
    .first-desc-form .fdform_left:nth-child(2) {
        
        opacity: 0;
        width: 0;
        height: 0;
    }
    
}



.the_history_date {
    outline: 1px solid #bccad629;
    margin: 2px;
    padding: 2px;
}
.the_history_date {
    outline: 1px solid #bccad60f;
    margin: 2px;
    /*padding: 4px;*/
    /*border-left: 3px solid steelblue;*/
}
.the_history_date+div {
    //color: aliceblue;
    //background-color: cornflowerblue;
    padding: 0px 4px;
}
.the_history_time {
    flex: 1 1 1%;
    display: inline-flex;
    width: calc(50% - 10px);
    /* white-space: nowrap; */
    text-align: center;
    white-space: nowrap;
    align-items: center;
    height: 26px;
}
.bphc_inf_right {
    display: flex;
    /* flex-direction: row; */
    flex-wrap: wrap;
    max-width: 120px;
    flex-basis: content;
}


.bpa-hw-right-btn-group:has(.btn-goHistoryBooking) {
    flex-direction: row-reverse;
    gap: 4px;
}


.historia-item .el-tag {
    height: 30px;
    min-height: 32px;
    /* width: 100px; */
    min-width: 100px;
    max-height: 30px;
    border-radius: 2px;
}

.bphc-action-buttons>span:hover {
    color: slateblue;
    outline: 1px solid gray;
    outline-offset: 4px;
    
}
.no_sel_paciente_2 {
    display: none;
}
<?php if(  true ||  isset($_GET['testy']) ){ ?>

.variapaddding-bpa-mlc-head-wrap.el-row.el-row--flex {
    border-bottom: 0;
    flex-direction: column;
    padding-left: 24px !important;
}
.variapaddding-bpa-mlc-head-wrap.el-row.el-row--flex>div {
    width: 100%;
}
.variapaddding-bpa-mlc-head-wrap .bpa-table-filter.is-align-right.bp-hc-filter {
    border-bottom: 0;
    padding: 0;
}
.variapaddding-bpa-mlc-head-wrap .bpa-table-filter.is-align-right.bp-hc-filter .justify-end.el-row.is-align-right.el-row--flex {
    justify-content: space-between;
    flex-wrap: nowrap;
}

.justify-end.el-row--flex>div {
    min-width: 420px !important;
    width: 30%;
    /* display: flex; */
    /* flex-direction: row; */
    /* justify-content: space-between !important; */
    /* align-items: stretch !important; */
    /* align-content: stretch !important; */
    /* flex-wrap: wrap !important; */
}
.variapaddding-bpa-mlc-head-wrap .bpa-table-filter.is-align-right.bp-hc-filter .justify-end.el-row.is-align-right.el-row--flex>div:first-of-type {
    width: 70%;
}
.bp-hc-filter .el-button {
    width: 45%;
    min-width: 194px !important;
}
.bpa-table-filter.is-align-right.bp-hc-filter .bpa-form-control .el-input {
    /*height: 36px;*/
}

.historias_y_pacientes {
    padding-left: 18px;
}
.lista-pacientes.el-row.w25min {
    border-width: 1px;
    border-radius: 5px;
}

.histories-listing-header {
    border: 0;
    height: 60px;
}
@media (max-width: 1200px) {
    .variapaddding-bpa-mlc-head-wrap .bpa-table-filter.is-align-right.bp-hc-filter .justify-end.el-row.is-align-right.el-row--flex>div:first-of-type {
        min-width: 40% !important;
    }
}
@media (max-width: 1024px) {
    .bpa-table-filter .el-row {
        flex-direction: column;
        align-items: center;
    }
}

<?php } ?>


.bp_hc_dual_col_form .bpa-form-label {
    font-size: 12px;
}

/* ********** TAILWIND ******** */

.text-purple-500 {
  --tw-text-opacity: 1;
  color: rgb(168 85 247 / var(--tw-text-opacity, 1));
}
.text-xs {
  font-size: 12px;
  line-height: 19.200000000000003px;
}




/* ----- linea tiempo ---- */
/*
.lista-historias::after {
    //content: ' ';
    position: absolute;
    width: 6px;
    background-color: white;
    top: 0;
    bottom: 0;
    left: -10px;
}
*/




/*

.linea-tiempo {
    width: 30px;
    border: 4px solid white;
    border-width: 0 10px 0 0;
    margin-right: 30px;
}
.linea-tiempo {
    width: 0px;
    border: 4px solid white;
    border-width: 0 10px 0 0;
    padding: 0;
    margin-right: 34PX;
    margin-left: 20px;
    box-shadow: 0 0 50px rgb(65 73 80 / 49%);
    background-color: transparent;
}
*/


body:not(.bookingpress_page_bookingpress_appointments.__bpa-is-staff-customize-view-active) .bpa-table-actions .history_btn_area {
    display: none;
}



</style>

<style id="historias_before_line">

.bphc_historia-item-before {
    display: flex;
    justify-content: start;
    padding: 0 12px;
    align-content: center;
    align-items: center;
    flex-direction: column;
    flex-direction: row;
    position: relative;
    width: 90px;
    /* margin-left: -6px; */
    padding-top: 15px;
    margin: 0 0px;
    min-width: 80px;
}

.bphc_item-before-line {
    width: 5px;
    background: var(--linetime-bgcolor-line);
    height: 100%;
    align-self: center;
    position: absolute;
    margin-left: 0;
}

.bphc_item-before-round {
    /* content: ' '; */
    /* position: absolute; */
    /* left: -60px; */
    width: var(--linetime-size-round-w);
    min-width: var(--linetime-size-round-w);
    max-width: var(--linetime-size-round-w);
    height: var(--linetime-size-round-h);
    min-height: var(--linetime-size-round-h);
    max-height: var(--linetime-size-round-h);
    color: #14a2d3;
    z-index: 1;
    outline: 0;
    border-radius: 50%;
    /* padding: 6px; */
    /* margin-left: -45px; */
    display: flex;
    align-items: center;
    justify-content: center;
    /* box-shadow: 0 0 2px slategray; */
    background-color: var(--linetime-bgcolor-round);
    /* text-align: center; */
    /* font-weight: 600; */
    margin-top: 38px;
    /* align-self: center; */
    /* justify-self: center; */
    margin-left: -12px;
    margin-left: var(--linetime-marginL-round);
}



.bphc_item-before-round>div {
    width: calc( var(--linetime-size-round-w) / 4 );
    height: calc( var(--linetime-size-round-w) / 4 );
    position: absolute;
    justify-self: center;
    background: white;
    z-index: 0;
    transform: rotate(45deg);
    right: unset;
    margin: 0px;
    border-radius: 2px;
    background: slategray;
    margin-left: -0.22px;
    display: none;
}

.bphc_item-before-round>span {
    background: transparent;
    padding: 6px 4px;
    border: 2px solid dodgerblue;
    border-radius: var(--linetime-border-radius);
    border-radius: 0;
    color: #4f5972;
    font-weight: 500;
    font-size: 14px;
    font-family: sans-serif;
    letter-spacing: 0px;
    display: flex;
    align-items: center;
    justify-content: right;
    left: 26px;
    position: absolute;
    margin: 0px 6px;
    border-width: 1px 1px 1px 0px;
    border-width: 0;
    padding-top: 2px;
    text-decoration: underline;
    text-decoration-color: #4443431f;
    text-shadow: 0 0 2px #3f51b540;
    text-decoration: none;
    text-shadow: 0 0 transparent;
}


.bphc_item-before-round>span {
    opacity: 0;
}
.bphc_item-before-round.show>span {
    opacity: 1;
}
.lista-historias {
    position: relative;
}

.historia-item .motivoConsulta {
    min-height: 30px;
    max-height: 40px;
    overflow: clip;
    text-overflow: ellipsis;
}
.historia-item .motivoConsulta:has(+.diagnostico) {
    max-height: 40px;
    font-size: 11px;
}
.historia-item .diagnostico, 
.historia-item .tratamiento {
    max-height: 100px;
    overflow: clip;
    text-overflow: ellipsis;
    color: var(--bpa-dt-black-400);
    padding-top: 5px;
    line-height: 12px;
    font-size: 11px;
}
.historia-item .motivoConsulta, .historia-item .diagnostico {
    max-width: 300px;
}

@media (max-width: 782px) {
    button.add-history-btn {
        min-width: 60px;
        overflow: clip;
        text-overflow: clip;
    }
    .add-history-btn-text {
        display: none;
    }
}
 
</style>
<!-- estilos print aqui -->
<link rel="stylesheet" href="<?php echo BKMOD_STYLES_DIR . '/_view_historias.css?ver=1.00.010'.time() ?>" media="all">
 
<!-- FUENTE AWESOME -->
<script src='<?php echo BKMOD_SRC.'/a076d05399.js';?>' crossorigin='anonymous'></script>

<?php
    }
    $historias_add_styles_ready = 1;
}



function bookingpress_mod_icon_helper( $icon='' ){
    $imgsrc = '/bookingmod-src/';
    switch( $icon ){
        case 'satO2' : return BKMOD_SRC . $imgsrc . 'satO2.png'; break;
        default : return BKMOD_SRC . $imgsrc . $icon;
    }
}

#$bookingpress_load_file_name = apply_filters('bookingpress_modify_header_content', $bookingpress_load_file_name,1);
add_filter('bookingpress_modify_header_content', function( $bookingpress_load_file_name, $from_header = 0 ){
    global $BookingPress, $bookingpress_slugs;
    
    if( strpos($bookingpress_load_file_name, 'staffmember_customize') ){
        //remove_action( 'init', array( $BookingPress, 'bookingpress_modify_header_content_func' ) );
        $bookingpress_load_file_name = __DIR__ .'/mod_staff_customize.php';
    }
    
    return $bookingpress_load_file_name;
},50,1);

#$bookingpress_allowed_disable_date_filter_pickeroptions = apply_filters( 'bookingpress_allowed_disable_date_filter_pickeroptions', false, $requested_module);
add_filter('bookingpress_allowed_disable_date_filter_pickeroptions', function( $confrmar = false, $requested_module= "" ){
    global $historiasClinicas_module_name;
    #echo "<h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa $historiasClinicas_module_name aaaaaaaaaaaaaaaaaaaaaaaaaa</h1>";
    if( $requested_module == $historiasClinicas_module_name){
        $confrmar = true;
    }
    
    return $confrmar;
},10,2);

add_filter('bookingpress_allowed_tel_input_script_backend', function( $confrmar= false, $page= "" ){
    global $historiasClinicas_module_name;
    if( $page == 'bookingpress_'.$historiasClinicas_module_name ){
        $confrmar = true;
        historias_add_styles();
    }
    
    return $confrmar;
},30,2);


/**
 * //Comentado para que se vea solo el boton
 * 
add_action('bookingpress_add_dynamic_menu_item_to_top', function( ){
    $bookingpress_load_file_name = __DIR__ .'/mod_header.php';
    
    include_once $bookingpress_load_file_name;
},10);
*/


//'AGREGADO HISTORIAS CLINICAS A LA LISTA DE PAGINAS - MODULOS init Y admin_menu'

add_action('init', function(){
global $BookingPress, $bookingpress_slugs, $historiasClinicas_module_name;
    $bookingpress_slugs->bookingpress_stories     = 'bookingpress_'.$historiasClinicas_module_name;
    $BookingPress->bookingpress_slugs = $bookingpress_slugs;
    #print_r($bookingpress_slugs);
    
    //$bookingpress_slugs = $bookingpress_slugs;
#add_action('admin_enqueue_scripts', array( $BookingPress, 'set_js' ), 11);
#add_action('admin_enqueue_scripts', array( $BookingPress, 'set_css' ), 11);

/*
 $bookingpress_site_current_language = 'es';
    wp_register_script('bookingpress_element_js', BOOKINGPRESS_URL . '/js/bookingpress_element.js', array( 'bookingpress_admin_js' ), BOOKINGPRESS_VERSION);
        wp_enqueue_script('bookingpress_element_js');
    
    wp_register_script('bookingpress_elements_locale', BOOKINGPRESS_URL . '/js/elements_locale/' . $bookingpress_site_current_language . '.js', array( 'bookingpress_element_js' ), BOOKINGPRESS_VERSION);
                    wp_enqueue_script('bookingpress_elements_locale');
*/
},2);



add_action('admin_menu', function(){
    global $BookingPress, $bookingpress_slugs, $historiasClinicas_module_name;
    //AGREGAMOS el slug sino falla
    $bookingpress_slugs->bookingpress_stories     = 'bookingpress_'.$historiasClinicas_module_name;
    
    ob_start();
    ?><span id="historiasC_admin_link">Historias Clinicas</span>
<style>a:has(#historiasC_admin_link) { background: pink; display: none;}</style>
    <?php
    $no_display_link = ob_get_clean();
    
    //Comentado para que se vea solo el boton
    add_submenu_page($bookingpress_slugs->bookingpress, __('Historias Clinicas', 'bookingpress-appointment-booking' ), $no_display_link, 'bookingpress', 'bookingpress_'.$historiasClinicas_module_name, array($BookingPress, 'route') );

}, 50);


    class bookingpress_stories Extends BookingPress_Core
    {
        function __construct()
        {
            global $historiasClinicas_module_name;
            
        add_action('admin_footer', [$this, 'html_footer_histories'], 100);

        ############## PORBANDO COMPONENTE - SE CAMBIO COMPONENTE Y se usa para llamar otra funcion #################
        add_action('admin_footer', [$this, 'html_footer_historyAppointments'], 100);
            
        add_action('admin_print_styles', [$this, 'html_head_histories'], 1 );
        
        
        add_action( 'view_historias_impresion', [$this, 'impresion_Ambulatoria'], 10);
        
        
            
            add_filter('bookingpress_modify_appointment_data_fields', [$this,'add_appointment_fields'], 10,1);
    
    //add_action('bookingpress_add_dynamic_buttons_for_view_appointments', [$this,'add_appointment_histories_view_button'], 10);
    add_action('bookingpress_appointment_list_add_action_button', [$this,'add_appointment_histories_view_button'], 10);
    /**
    add_action('bookingpress_add_column_outsite', function(){
        ?>
        <el-table-column prop="booking_id" min-width="30" label="<?php esc_html_e( 'HISTORIA', 'bookingpress-appointment-booking' ); ?>">
			<template slot-scope="scope">
				<button>HISTORIA</button>
			</template>
		</el-table-column>
        <?php
    }, 10); */
    
    add_action('bookingpress_add_appointment_dynamic_on_load_methods' , [$this,'on_mount_appointments'], 5 );
    
            
/*
            add_action('wp_ajax_bookingpress_get_customers', array( $this, 'bookingpress_get_customer_details' ), 10);
            add_action('wp_ajax_bookingpress_add_customer', array( $this, 'bookingpress_add_customer' ), 10);
            add_action('wp_ajax_bookingpress_get_edit_user', array( $this, 'bookingpress_get_edit_user_details' ), 10);
            add_action('wp_ajax_bookingpress_delete_customer', array( $this, 'bookingpress_delete_customer' ), 10);
            add_action('wp_ajax_bookingpress_bulk_customer', array( $this, 'bookingpress_bulk_action' ), 10);
*/
            /*add_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_vue_methods', function(){
                
            },10);*/
            
            add_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_computed_methods', array( $this, 'computed_history_props' ), 10);
            
            add_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_vue_methods', array( $this, 'bookingpress_customer_dynamic_vue_methods_func' ), 10);
                                                                                                                             
            add_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_on_load_methods', array( $this, 'bookingpress_customer_dynamic_on_load_methods_func' ), 10);
            add_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_data_fields', array( $this, 'bookingpress_customer_dynamic_data_fields_func' ), 10);
            add_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_helper_vars', array( $this, 'bookingpress_customer_dynamic_helper_vars_func' ), 10);
            add_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_view_load', array( $this, 'bookingpress_dynamic_load_stories_view_func' ), 10);
            
            
            add_action( 'booking_Expansion_history_form_template', [$this, 'add_custom_history_form'], 10 );
            

add_action( 'admin_init', array( $this, 'bookingpress_customer_vue_data_fields'));
add_action( 'bphc_histories_module_vue_data_fields', array( $this, 'bookingpress_customer_vue_data_fields'));

            
            add_action('wp_ajax_bookingpress_upload_record_file', array( $this, 'bookingpress_upload_record_file_func' ), 10);
            
            add_action('wp_ajax_bp_hc_save_clinical_record', array( $this, 'bp_hc_save_patient_history_record' ), 10);

/*
            add_action('wp_ajax_bookingpress_get_wpuser', array( $this, 'bookingpress_get_wpuser' ));

            
            add_action('wp_ajax_bookingpress_get_existing_users_details', array( $this, 'bookingpress_get_existing_user_details' ), 10);

            
            add_action('user_register', array($this,'bookingpress_add_capabilities_to_new_user'));

            add_action( 'wp_ajax_bookingpress_remove_customer_avatar', array( $this, 'bookingpress_remove_customer_avatar_func'));
*/
            add_action('wp_ajax_bookingpress_get_patient_histories', array( $this, 'bp_hc_get_patient_history_records' ), 10);
            add_action('wp_ajax_bookingpress_find_customer_by_dni', array( $this, 'bookingpress_find_customer_by_dni' ), 10);
            
            add_action('wp_ajax_bookingpress_get_customers_in_histories', array( $this, 'bookingpress_get_customer_details' ), 10);
        }
        
        public function is_staff_customize_view( ){
            global $BookingPressPro, $bookingpress_staff_customize_view, $bookingpress_staffmember_view;
            @ini_set('display_erros', 0);
            $bookingpress_staff_customize_view = 0;
            if ( $BookingPressPro->bookingpress_check_user_role( 'bookingpress-staffmember' )) {
				if(empty($_COOKIE['bookingpress_staffmember_view']) || (!empty($_COOKIE['bookingpress_staffmember_view']) && $_COOKIE['bookingpress_staffmember_view'] == 'customize_view') || (!empty($bookingpress_staffmember_view) && $bookingpress_staffmember_view == 'customize_view')) {
					$bookingpress_staff_customize_view = 1;
				}
				if($bookingpress_staffmember_view == 'admin_view') {
					$bookingpress_staff_customize_view = 0;
				}
				if($bookingpress_staff_customize_view == 0 && $bookingpress_staffmember_access_admin == 'false') {
					$bookingpress_staff_customize_view = 1;
				}
			}
            return $bookingpress_staff_customize_view;
        }
        
        public function add_custom_history_form( $mode = '' ){
            global $bookingPress_Expansion;
            #echo " en hook ... ";
            if( $mode == 'dual_view_mode'){
                $template_file = $bookingPress_Expansion->get_template_file( 'historias-dual-form-mode-view.php' );
                if( file_exists($template_file) ) include_once $template_file;
            }
        }
        
        public function add_appointment_fields($appointments_fields = []){
            
            global $BookingPressPro, $bookingpress_pro_staff_members;
            /*
            $bookingpress_user_id        = get_current_user_id();
            $bookingpress_staffmember_id = $bookingpress_pro_staff_members->bookingpress_get_staffmember_id_using_wp_user_id( $bookingpress_user_id );
            
            $bookingpress_staffmember_name = '';
            $bookingpress_staffmember_services_cat = $bookingpress_staffmember_services = [];
            
            if(!empty($bookingpress_staffmember_id)) {
                #print_r( $bookingpress_pro_staff_members );
                #exit;
                $bookingpress_staffmember_name = $bookingpress_pro_staff_members->bookingpress_get_staffmembername_using_id( $bookingpress_staffmember_id );
                $bookingpress_staffmember_services    = $bookingpress_pro_staff_members->bookingpress_get_staffmember_service( $bookingpress_staffmember_id );
                $bookingpress_staffmember_services_cat    = $bookingpress_pro_staff_members->get_bookingpress_service_data_group_with_category_for_staff($bookingpress_staffmember_services);
            }*/
            

            $to_appointments_vue_data_fields = array(
                'history_btns_disabled' => true,
                'filter_date_changed' => 0,
                /*
                'bp_hc_bookingpress_staffmember_id'        => $bookingpress_staffmember_id,
                'bp_hc_bookingpress_staffmember_name'     => $bookingpress_staffmember_name,
                'bp_hc_bookingpress_staffmember_services'=> $bookingpress_staffmember_services,
                'bp_hc_staff_serviceList'              => $bookingpress_staffmember_services_cat,
                'bp_hc_selected_service_id'        => '',//array('service_id'=>'0','service_name'=>''),
                'bp_hc_selected_service_name'   => '',
                */
                );
                
                
                
                return array_merge($to_appointments_vue_data_fields, $appointments_fields);
        }
        
        public function on_mount_appointments(){
            global $BookingPressPro, $bookingpress_staff_customize_view;
            //return; //<<----Volvemos-Nada que hacer aqui ahora no sirve---->>
            
            $request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard';
            
            if( $this->is_staff_customize_view() && $request_module == 'appointments' ){
                
                add_action('bookingpress_appointment_add_post_data', function(){
                    ?>
                    if(!vm2.filter_date_changed){
                        vm2.filter_date_changed = 1;
                        let today = moment().format("YYYY-MM-DD");
                        this.appointment_date_range = [today ,today ];
                        bookingpress_search_data.selected_date_range = this.appointment_date_range;
                    }
                    <?php
                });
                
                
            ?>
            
            const vm = this;
            const firstSortDate = setInterval(()=>{
                if( this.$refs.multipleTable ){
                        vm.$refs.multipleTable.sort('appointment_date', 'ascending');
                            clearInterval(firstSortDate);
                }
            },1000);
            
                        
            
            <?php
            }
            
        }
        
        /**
         * Agrega boton de historias al listado llamando a funciones js del metodo histories_popup
         * Este codigo se ejecuta en el listado. No dentro de la url de historias
         * */
        public function add_appointment_histories_view_button(){
            global $BookingPressPro, $bookingpress_pro_staff_members;
            
            #if( !$this->is_staff_customize_view() ) return;
            $request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard';
            

            //if( !($this->is_staff_customize_view() && $request_module == 'appointments') ) return;
//TEST 2025-12-08
$bookingpress_user_id        = get_current_user_id();
$bookingpress_staffmember_id = $bookingpress_pro_staff_members->bookingpress_get_staffmember_id_using_wp_user_id( $bookingpress_user_id );
            
if( !( $this->is_staff_customize_view() && ( $BookingPressPro->bookingpress_check_user_role( 'bookingpress-staffmember' ) || $bookingpress_staffmember_id ) && $request_module == 'appointments') ) return;
//if( !(  ( $BookingPressPro->bookingpress_check_user_role( 'bookingpress-staffmember' ) || $this->user_can_access_historias($bookingpress_user_id) ) && $request_module == 'appointments') ) return;
            
            
            $bookingpress_staffmember_name = $bookingpress_pro_staff_members->bookingpress_get_staffmembername_using_id( $bookingpress_staffmember_id );
            /** scope.row.bookingpress_staff ....... */
            
                        
            //:href="'?page=bookingpress_historias&appointment='+scope.row.appointment_id+'&paciente_id='+scope.row.bookingpress_customer_id+'&paciente='+(scope.row.custom_fields_values.find(el=> el.label='text_C6kufq').value )" class="bpa-btn el-button bpa-btn  bpa-btn--primary "
            
            //bpa-btn el-button bpa-btn  bpa-btn--primary {'customer_id': '1259', 'dni': 28154969  }
            //&& (scope.row.appointment_status != '3') "'historyAppointmentPOP('+JSON.stringify(scope.row)+')'"
            ?>
            <span class="history_btn_area">
            <el-button class="bpa-btn el-button bpa-btn  bpa-btn--primary" v-if="bookingpress_staff_customize_view" 
            @click.native.stop="historyAppointmentPOP({'appointment_id': scope.row.appointment_id, 'customer_id': scope.row.bookingpress_customer_id, 'dni':(scope.row.custom_fields_values.find(el=> el.label='text_C6kufq').value )});{if(scope.row.appointment_status == '7')bookingpress_change_status(scope.row.appointment_id, '9')};console.log('apo id',scope.row.appointment_id);" style="display: flex !important;"
            
            :disabled="history_btns_disabled"
            :class="(history_btns_disabled)? 'bpa-btn--is-loader' : ''"
            >
                <div class="history_btn_text" > <!-- :style="(history_btns_disabled)? 'opacity: 0;':'opacity: 1;'" -->
                    <span class="material-icons-round">mode_edit</span> 
                    <span>Historia</span>
                </div>
                <div class="bpa-btn--loader__circles">				    
					  <div></div>
					  <div></div>
					  <div></div>
				</div>
            </el-button>
            </span>
            
            <?php
            
            
            /** ------ *VERSION ANTERIOR* ----
            ?>
            
            <!--
            <el-link :href="'javascript:window.open(`?page=bookingpress_historias&booking_id='+scope.row.booking_id+'&appointment='+scope.row.appointment_id+'&service_id='+scope.row.service_id+'&paciente_id='+scope.row.bookingpress_customer_id+'&paciente='+(scope.row.custom_fields_values.find(el=> el.label='text_C6kufq').value )+'&row='+JSON.stringify(scope.row)+'`, `_top`)'"
            class="btn-goHistoryBooking el-button bpa-btn bpa-btn__medium bpa-btn--primary bpa-btn--full-width el-button--default "
            style="margin: auto;" 
            v-if="bookingpress_staff_customize_view && (scope.row.appointment_status != '3')"
            underline=false
            target="_self"
            type="default"
            style=""><span class="material-icons-round">mode_edit</span> 
                <span>Historia</span>
            </el-link>
            --> 
            
            
            

            <el-link :href="'javascript:window.open(`?page=bookingpress_historias&booking_id='+scope.row.booking_id+'&appointment='+scope.row.appointment_id+'&service_id='+scope.row.service_id+'&paciente_id='+scope.row.bookingpress_customer_id+'&paciente='+(scope.row.custom_fields_values.find(el=> el.label='text_C6kufq').value )+'&row='+JSON.stringify(scope.row)+'`, `_top`)'"
            class="btn-goHistoryBooking el-button bpa-btn bpa-btn__medium bpa-btn--primary bpa-btn--full-width el-button--default "
            style="margin: auto;" 
            v-if="bookingpress_staff_customize_view && (scope.row.appointment_status != '3')"
            underline=false
            target="_self"
            type="default"
            style=""><span class="material-icons-round">mode_edit</span> 
                <span>Historia</span>
            </el-link>
            
            
            <?php
            */
            return;
            
            /**
             * @click="window.open('?page=bookingpress_historias&appointment='+scope.row.appointment_id+'&paciente_id='+scope.row.bookingpress_customer_id+'&paciente='+(scope.row.custom_fields_values.find(el=> el.label='text_C6kufq').value )+')'"
             * 
             * 
             * <el-button v-if=" (scope.row.appointment_status != '3')" class="bpa-btn el-button bpa-btn  bpa-btn--primary" 
            @click="scope.row.id"
            >
            <span>ver Historias</span>
            </el-button>
             * 
             * 
             * 
             * <!--{{ (scope.row.custom_fields_values.find(el=> el.label='text_C6kufq').value ) }}-->
             * 
             * 
             * {{(typeof bp_hc_bookingpress_staffmember_id != 'undefined'? bp_hc_bookingpress_staffmember_id :'Noid Medico'}}
             * */
            
            
        }
        
        /**
         * Agrega popup de historias al listado de Turnos
         * Este codigo se ejecuta en el listado. No dentro de la url de historias
         * 
         * */
        public function add_appointment_histories_popup( )
        {
            
            //$this->user_can_access_historias( get_current_user_id() )
            $request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard';
            if( !( ( $this->is_staff_customize_view()  ) && $request_module == 'appointments') ) return;
            //echo "<script> console.log('$include_pop')</script>";
            $include_pop = BPHC_PLUGIN_DIR . 'includes/mod_history_popup.php';
            
            if( file_exists($include_pop) ){
                include_once( $include_pop );
                //$bookingpress_before_appointments_list_files = apply_filters('bookingpress_before_admin_appointments_list_load',$bookingpress_before_appointments_list_files);
            }
            
            
            ?>
            <style> 
            .bpa-staff-sidebar-navigation { z-index: 1000;} 
            .bpa-table-actions {
                /* background: whitesmoke !important; */
            }
            .bpa-table-actions {
                border: 0;
                background: transparent !important;
                padding: 0;
                display: flex;
                min-width: 100px;
                max-width: 120px;
                border: 0;
                outline: 0;
                box-shadow: 0 0 0;
                z-index: 990;
            }
            /* updates 2025-10-30
            .cell:has(.history_btn_area) {
                min-width: 100px;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                display: flex;
                //font-size: 8px;
            }*/
            .cell:has(.history_btn_area) {
                min-width: 100px;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                display: flex;
                padding: 0 !important;
                align-content: center;
                flex-wrap: wrap;
            }
            .bpa-table-actions-wrap {
                min-width: 100px;
                transform: unset;
                position: relative;
                box-shadow: 0 0 0;
                top: auto;
                right: auto;
                display: flex;
                justify-content: center;
            }
            /*
            .cell:has(.history_btn_area) label {
                align-self: self-start;
            }*/
            .cell:has(.history_btn_area) label {
                align-self: center;
                justify-self: center;
                display: flex;
                width: 100%;
                /* text-align: center; */
                justify-content: center;
                align-content: center;
                align-items: center;
                flex-wrap: wrap;
                flex-direction: column;
                font-size: 10px;
            }
            
iframe#bphc-pophistory {
    box-shadow: none;
}
.historypopbuttons {
    gap: 8px;
}
.bphc-pophistory-header {
    padding: 10px 0;
}

button.btn.small {
    background: transparent;
    padding: 0px;
    margin: 2px;
    border: 0;
    cursor: pointer;
    outline: 1px solid lavender;
    border-radius: 5px;
    padding: 5px;
}
button.btn.small:hover {
    background-color: #e2e5e826;
    outline: 1px solid #bbc6d53b;
}


.fullscreen, .fullscreen_exit, .minimize, .close {
    width: 26px;
    height: 22px;
    /* background-color: #c3aaaa4a; */
    color: transparent;
    background-size: cover;
    /* filter: invert(1); */
    outline: 0px solid gainsboro;
    /* border-radius: 3px; */
    /* background-color: #f7f4f4; */
    /* color: #5b6bcd; */
    /* fill: #8575bd; */
    /* background-blend-mode: exclusion; */
    /*padding: 0px;*/
    /* font-size: 20px; */
}
            </style>
            <script id="historyAppointPOPUP">
            
            var historyAppointmentPOP = ( row )=>{
                if(typeof row == 'string') row = JSON.parse(row);
                    //Data from scope row - appointment id NOT booking id && customer_id always NEED customer_id!
                const HistoryArea = document.querySelector('iframe#bphc-pophistory'); 
                const historyContent = ( (HistoryArea.contentWindow || HistoryArea.contentDocument) );
                let need_close_Form = 0;
                if( (historyContent.app.selected_bookingpress_appointment_id != row.appointment_id) || (historyContent.app.selected_patient.customer_id != row.customer_id) ){
                    need_close_Form = 1;
                }
                    //aqui selectPatient 'only'Fans needs the customer_id o~(*.º)~º
                historyContent.app.selected_bookingpress_appointment_id = row.appointment_id;//3019;//row.appointment_id;
                historyContent.app.selectPatient(  row , 'is_from_appointment' );
                
                if( need_close_Form ) historyContent.app.bp_hc_CloseHistoryModal();
                //Finalmente aseguramos que se muestre el "popup" en caso de estado Close
                document.querySelector('.poparea').style.display = '';
                document.querySelector('iframe#bphc-pophistory').style.display = '';
                bphc_pop_history.is_full = bphc_pop_history.is_min = false;
                bphc_pop_history.full_toggle( document.querySelector('button.pop-full-toggle') );//seteamos pop history a full
                //$('.poparea').css( 'display', '');$('.poparea').css( 'opacity', 1);
                console.log( '-- load history -- ');
                document.querySelector('.poparea').style.opacity = 1;
                setTimeout(()=>{
                    if(historyContent.app.selected_patient) document.querySelector('.bphc-pophistory-pname').innerHTML = ' | '+(historyContent.app.selected_patient.customer_firstname+' '+historyContent.app.selected_patient.customer_lastname)+' ';
                    setTimeout(()=>{
                        if(historyContent.app.selected_patient) document.querySelector('.bphc-pophistory-pname').innerHTML = ' | '+(historyContent.app.selected_patient.customer_firstname+' '+historyContent.app.selected_patient.customer_lastname)+' '
                        },2000);
                    },1200);
                
            }
            //historyAppointmentPOP({'customer_id': "1259", 'dni': 28154969  }) // EXAMPLEE ---- // 

            </script>
            <?php
            
            return;
        }
        
        
        /**
         * Add BookingPress capabilities when new admin user register from backend
         *
         * @param  mixed $user_id   New registered user id
         * @return void
         */
        function bookingpress_add_capabilities_to_new_user($user_id) {
            global $BookingPress;
            if ($user_id == '') {
                return;
            }
            if (user_can($user_id, 'bookingpress-staffmember')) {
                $bookingpressroles = $BookingPress->bookingpress_capabilities();
                $userObj = new WP_User($user_id);
                foreach ($bookingpressroles as $bookingpress_role => $bookingpress_role_desc) {
                    $userObj->add_cap($bookingpress_role);
                }
                unset($bookingpress_role);
                unset($bookingpress_roles);
                unset($bookingpress_role_desc);
            }
        }
        
        
        function bookingpress_historias_vue_data_fields(){
            global $BookingPressPro, $bookingpress_pro_staff_members, $bookingpress_historias_fields;
            
            $bookingpress_user_id        = get_current_user_id();
            $bookingpress_staffmember_id = $bookingpress_pro_staff_members->bookingpress_get_staffmember_id_using_wp_user_id( $bookingpress_user_id );
            
            $bookingpress_staffmember_name = '';
            $bookingpress_staffmember_services_cat = $bookingpress_staffmember_services = [];
            
            if(!empty($bookingpress_staffmember_id)) {
                #print_r( $bookingpress_pro_staff_members );
                #exit;
                $bookingpress_staffmember_name = $bookingpress_pro_staff_members->bookingpress_get_staffmembername_using_id( $bookingpress_staffmember_id );
                $bookingpress_staffmember_services    = $bookingpress_pro_staff_members->bookingpress_get_staffmember_service( $bookingpress_staffmember_id );
                $bookingpress_staffmember_services_cat    = $bookingpress_pro_staff_members->get_bookingpress_service_data_group_with_category_for_staff($bookingpress_staffmember_services);
            }
            
            $bookingpress_historias_fields = array(
            
                'bp_hc_bookingpress_staffmember_id'        => $bookingpress_staffmember_id,
                'bp_hc_bookingpress_staffmember_name'     => $bookingpress_staffmember_name,
                'bp_hc_bookingpress_staffmember_services'=> $bookingpress_staffmember_services,
                'bp_hc_staff_serviceList'              => $bookingpress_staffmember_services_cat,
                'bp_hc_selected_service_id'        => 0,//array('service_id'=>'0','service_name'=>''),
                'bp_hc_selected_service_name'   => '',
                
                
                
            );
            
        }
        
        /**
         * Default data variables for customer module
         *
         * @return void
         */
        function bookingpress_customer_vue_data_fields(){
            global $bookingpress_customer_vue_data_fields,$bookingpress_global_options, $dni_key, $obra_social_field_key, $plan_de_obra_field_key;
            
            global $historiasClinicas_module_name;
            $request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard';
            #print_r( $request_module )
            
            //!in_array($request_module, [$historiasClinicas_module_name, 'appointments'])
            if( !in_array($request_module, [$historiasClinicas_module_name]) ){
            return;
            }
            
            $bookingpress_options                  = $bookingpress_global_options->bookingpress_global_options();
            $bookingpress_country_list             = $bookingpress_options['country_lists'];
            $bookingpress_pagination               = $bookingpress_options['pagination'];
            $bookingpress_pagination_arr           = json_decode($bookingpress_pagination, true);
            $bookingpress_pagination_selected      = $bookingpress_pagination_arr[0];
            
            global $BookingPressPro, $bookingpress_pro_staff_members;
            
            $bookingpress_user_id        = get_current_user_id();
            $bookingpress_staffmember_id = $bookingpress_pro_staff_members->bookingpress_get_staffmember_id_using_wp_user_id( $bookingpress_user_id );
            
            $bookingpress_staffmember_name = '';
            $bookingpress_staffmember_services_cat = $bookingpress_staffmember_services = [];
            
            if(!empty($bookingpress_staffmember_id)) {
                #print_r( $bookingpress_pro_staff_members );
                #exit;
                $bookingpress_staffmember_name = $bookingpress_pro_staff_members->bookingpress_get_staffmembername_using_id( $bookingpress_staffmember_id );
                $bookingpress_staffmember_services    = $bookingpress_pro_staff_members->bookingpress_get_staffmember_service( $bookingpress_staffmember_id );
                $bookingpress_staffmember_services_cat    = $bookingpress_pro_staff_members->get_bookingpress_service_data_group_with_category_for_staff($bookingpress_staffmember_services);
            }


            $bookingpress_customer_vue_data_fields = array(
                'bulk_action'                => 'bulk_action',
                'bulk_options'               => array(
                    array(
                        'value' => 'bulk_action',
                        'label' => __('Bulk Action', 'bookingpress-appointment-booking'),
                    ),
                    array(
                        'value' => 'delete',
                        'label' => __('Delete', 'bookingpress-appointment-booking'),
                    ),
                ),
            
                "bphc_currentService" => null,
                "bphc_appointment_history" => false,
                'bp_hc_bookingpress_staffmember_id'        => $bookingpress_staffmember_id,
                'bp_hc_bookingpress_staffmember_name'     => $bookingpress_staffmember_name,
                'bp_hc_bookingpress_staffmember_services'=> $bookingpress_staffmember_services,
                'bp_hc_staff_serviceList'              => $bookingpress_staffmember_services_cat,
                'bp_hc_selected_service_id'        => '',//array('service_id'=>'0','service_name'=>''),
                'bp_hc_selected_service_name'   => '',
                'bp_hc_histories_prevyear'  => '',
                'bp_hc_selected_date_range' => null,
                'bp_hc_view_mode'   => [ 'full_form' => 0, 'dual_view' => 'portrait'/*'landscape'*/  ],//('portrait' | 'landscape' | 0 ) //default is portrait
                
                
                'phone_countries_details'    => json_decode($bookingpress_country_list),
                'loading'                    => false,
                'items'                      => array(),
                'multipleSelection'          => array(),
                'perPage'                    => 10,
                'totalItems'                 => 0,
                'pagination_selected_length' => 10,
                'pagination_length'          => $bookingpress_pagination,
                'currentPage'                => 1,
                'open_customer_modal'        => false,
                'customer'                   => array(
                    'avatar_url'             => '',
                    'avatar_name'            => '',
                    'avatar_list'            => array(),
                    'wp_user'                => null,
                    'username'               => '',
                    'firstname'              => '',
                    'lastname'               => '',
                    'email'                  => '',
                    'phone'                  => '',
                    'customer_phone_country' => '',
                    'customer_phone_dial_code' => '',
                    'note'                   => '',
                    'update_id'              => 0,
                    '_wpnonce'               => '',
                    'password'               => '',
                ),
                'customer_detail_save'       => false,
                'wpUsersList'                => array(),
                'savebtnloading'             => false,
                'rules'                      => array(
                    'username' => array(
                        array(
                            'required' => true,
                            'message'  => esc_html__('Please enter username', 'bookingpress-appointment-booking'),
                            'trigger'  => 'blur',
                        ),
                    ),
                    'firstname' => array(
                        array(
                            'required' => true,
                            'message'  => esc_html__('Please enter firstname', 'bookingpress-appointment-booking'),
                            'trigger'  => 'blur',
                        ),
                    ),
                    'lastname'  => array(
                        array(
                            'required' => true,
                            'message'  => esc_html__('Please enter lastname', 'bookingpress-appointment-booking'),
                            'trigger'  => 'blur',
                        ),
                    ),
                    'email'     => array(
                        array(
                            'required' => true,
                            'message'  => esc_html__('Please enter email address', 'bookingpress-appointment-booking'),
                            'trigger'  => 'blur',
                        ),
                        array(
                            'type'    => 'email',
                            'message' => esc_html__('Please enter valid email address', 'bookingpress-appointment-booking'),
                            'trigger' => 'blur',
                        ),
                    ),
                ),
                'customerSearch'             => '',
                'customer_search_range'      => '',
                'columnSequenceModal'        => false,
                'pagination_length_val'      => '10',
                'pagination_val'             => array(
                    array(
                        'text'  => '5',
                        'value' => '5',
                    ),
                    array(
                        'text'  => '10',
                        'value' => '10',
                    ),
                    array(
                        'text'  => '20',
                        'value' => '20',
                    ),
                ),
                'cusShowFileList'            => false,
                'is_display_loader'          => '0',
                'is_disabled'                => false,
                'is_display_save_loader'     => '0',
                'selectedRow' => (object)[],
                'selected_patient' => false,
                'histories' => array(),
                'historiesTotal'=> 0,
                'histories_loading' => false,
                'dni_query' => '',
                'patient_searching' => false,
                'current_user_id' => get_current_user_id(),
                'history_form' => array(
                    'antecedentes' => '',
                    'diagnostico' => '',
                    'medicamentos' => '',
                    'observaciones' => '',
                ),
                'bpa_wp_nonce' => wp_create_nonce('bpa_wp_nonce'),
                'history_saving' => false,
                'bp_hc_is_expand' => 0,
                'dni_meta_key' => !empty($dni_key)? $dni_key:'text_C6kufq',
                'obra_social_meta_key' => !empty($obra_social_field_key)? $obra_social_field_key:'obra_soc_seguros',
                'obra_plan_meta_key' => !empty($plan_de_obra_field_key)? $plan_de_obra_field_key:"text_o9q4Cr", //.customer_metadata[ vm2.obra_plan_meta_key ]
                'bphc_layout' => array(
                    'customerHeaderCard' => ['activeNames'=>[]]
                ),
                'bp_hc_SummaryModal' => false,
                'bp_hc_ConsultationModal' => false,
                'bp_hc_HistoriesSummary' => false,
                "bp_hc_defaultHistoriesSummary" => ([

                    (object) [
                            "id"    => "0",
                            "update_id" => "0",
                            "date"  => "2025-01-01",
                            "time"  => "08:00",
                            "bookingpress_appointment_id"   => "0",
                            "bookingpress_customer_id"      => "0",
                            "bookingpress_staff_member_id"  => "0",
                            "staff_member_name" => "",
                            "service_name"      => "",
                            "consultation_data" => [
                                    "general" =>[
                            			"motivoConsulta" => "dolor de panza",
                            			"diagnostico" => "no tiene nada",
                            			"tratamiento" => "ninguno - no tiene nada",
                            			"notas" => " ",
                                        "archivos" => [ array("name" =>"resultados.jpg","size"=>"50000","type"=>"jpg","url"=>'https://foatconcept.com.ar/turnos/wp-content/uploads/bookingpress/1757597662_1757597657_descarga_avatar.png') ]
                                    ],
                                	"vitales" =>[
                                        "altura" =>"",
                                        "peso" =>"",
                                		"presionArterial" =>"",
                                		"frecuenciaCardiaca" =>"",
                                		"frecuenciaRespiratoria" =>"",
                                		"temperatura" =>"",
                                		"saturacionOxigeno" =>""
                                	],
                                	"antecedentes" =>[
                                		//"personales" =>[["a"=>"Traumatismo","motivo"=>"se pego en la cabeza."],["a"=>"Colicos","motivo"=>"comio achuras."]],
                                		//"familiares" =>[["a"=>"Diabetes","motivo"=>"abuelo pat."]],
                                	],
                                	"medicamentos" =>[
                                		//["nombre" =>"ibuprofeno","dosis" =>"2","frecuencia" =>"8hs", "fecha"=>"2025/03/14","size"=>""],
                                        //["nombre" =>"antibiotico","dosis" =>"1","frecuencia" =>"12hs", "fecha"=>"2025/03/14","size"=>"","url"=>'https://cdn.prod.website-files.com/5dd6c916acc1cc42476f2149/60a9af48c867f6ee401a48e1_Nimbo%20nueva%20funcionalidad%20template%202020-01.png']
                                	]
                                
                            ]
                    ]
                ]),
                "vista_form" => 0,
                "newRecord" => [
                    "is_block_service" => 0,
                    "id"    => "0",
                    "update_id" => "0",
                    "date"  => "2025-01-01",
                    "time"  => "00:00",
                    "bookingpress_appointment_id"   => "0",
                    "bookingpress_customer_id"      => "0",
                    "bookingpress_staff_member_id"  => "0",
                    "staff_member_name" => "",
                    "service_name"      => "",
                    "service_id"    =>"0",
                    "consultorio"   =>"",
                    "tags"  => "",
                    "general"=> [
                            	"motivoConsulta" => "",
                            	"diagnostico" => "",
                            	"tratamiento" => "",
                            	"notas" => "",
                    ],
                    "vitales"=> [
                                        "altura" =>"",
                                        "peso" =>"",
                                		"presionArterial" =>"",
                                		"frecuenciaCardiaca" =>"",
                                		"frecuenciaRespiratoria" =>"",
                                		"temperatura" =>"",
                                		"saturacionOxigeno" =>""
                    ],
                    "archivos" => [],
                    "antecedentes"=> [],
                    "medicamentos"=> [],
                    "alergias"=> [],
                ],
                
                
                                
                //End datafields
            );
            
        }
        
        public function computed_history_props( ){
            ?>
                        
            <?php
        }
		
		
        function bookingpress_remove_customer_avatar_func(){
            global $wpdb;
            $response = array();

            $bpa_check_authorization = $this->bpa_check_authentication( 'remove_customer_avatar', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            if (! empty($_POST) && ! empty($_POST['upload_file_url']) ) { // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_uploaded_avatar_url = esc_url_raw($_POST['upload_file_url']); // phpcs:ignore
                $bookingpress_file_name_arr       = explode('/', $bookingpress_uploaded_avatar_url);
                $bookingpress_file_name           = $bookingpress_file_name_arr[ count($bookingpress_file_name_arr) - 1 ];
                if( file_exists( BOOKINGPRESS_TMP_IMAGES_DIR . '/' . $bookingpress_file_name ) ){
                    @unlink(BOOKINGPRESS_TMP_IMAGES_DIR . '/' . $bookingpress_file_name);
                }
            }
            die;
        }
        
        /**
         * Get existing wordpress user details
         *
         * @return void
         */
        function bookingpress_get_existing_user_details()
        {
            global $wpdb, $tbl_bookingpress_customers;
            $response              = array();

            $bpa_check_authorization = $this->bpa_check_authentication( 'search_user', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            $response['variant']      = 'error';
            $response['title']        = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']          = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            $response['user_details'] = '';

            $existing_user_id = ! empty($_REQUEST['existing_user_id']) ? intval($_REQUEST['existing_user_id']) : 0;
            if (! empty($existing_user_id) ) {
                $bookingpress_user_details = get_user_by('id', $existing_user_id);
                $bookingpress_user_email   = $bookingpress_user_details->data->user_email;
                $bookingpress_user_name    = $bookingpress_user_details->data->user_login;
                
                $bookingpress_user_firstname = get_user_meta($existing_user_id, 'first_name', true);
                $bookingpress_user_lastname  = get_user_meta($existing_user_id, 'last_name', true);

                $bookingpress_user_data = array(
                'username'       => esc_html($bookingpress_user_name),
                'user_email'     => esc_html($bookingpress_user_email),
                'user_firstname' => esc_html($bookingpress_user_firstname),
                'user_lastname'  => esc_html($bookingpress_user_lastname),
                );

                $response['user_details'] = $bookingpress_user_data;
                $response['variant']      = 'success';
                $response['title']        = esc_html__('Success', 'bookingpress-appointment-booking');
                $response['msg']          = esc_html__('Users details fetched successfully.', 'bookingpress-appointment-booking');
            }

            echo wp_json_encode($response);
            exit();
        }
        
        /**
         * bookingpress_upload_record_file_func
         *
         * @return void
         */
        function bookingpress_upload_record_file_func()
        {
            $return_data = array(
            'error'            => 0,
            'msg'              => '',
            'upload_url'       => '',
            'upload_file_name' => '',
            );
         //phpcs:ignore 
         $bookingpress_fileupload_obj = new bookingpress_fileupload_class( $_FILES['file'] );

            if (! $bookingpress_fileupload_obj ) {
                $return_data['error'] = 1;
                $return_data['msg']   = $bookingpress_fileupload_obj->error_message;
            }

            $bpa_check_authorization = $this->bpa_check_authentication( 'upload_customer_avatar', true, 'bookingpress_upload_customer_avatar' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            $bookingpress_fileupload_obj->check_cap          = false;
            $bookingpress_fileupload_obj->check_nonce        = false;
            $bookingpress_fileupload_obj->nonce_data         = isset($_REQUEST['_wpnonce']) ? sanitize_text_field($_REQUEST['_wpnonce']) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
            $bookingpress_fileupload_obj->nonce_action       = isset($_REQUEST['action']) ? sanitize_text_field($_REQUEST['action']) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
            $bookingpress_fileupload_obj->check_only_image   = false;
            $bookingpress_fileupload_obj->check_specific_ext = false;
            $bookingpress_fileupload_obj->allowed_ext        = array();

            $bad_file_name = 0;
            $nombre_ext_archivo = 'jpg';
            if( isset($_FILES['file']['name']) ){
                $nombre_ext_archivo = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION );
                if( in_array(strtolower($nombre_ext_archivo), ['html','xhtml','js','css','php','sql','exe','bin','ini','perl','py',''] ) ){
                    $nombre_ext_archivo = 'txt';
                }
            }
            $file_name                = isset($_FILES['file']['name']) ? current_time('timestamp') . '_' . sanitize_file_name($_FILES['file']['name']) : current_time('timestamp') . '_' .'consultorio.'.$nombre_ext_archivo; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
            $file_name = trim($file_name);
            //para los nombres ed archivo que sube Gerardo o caracteres. -- bad_file_name -- *Rompe el nombre de archivo
            if(empty($file_name) ){ $file_name = current_time('timestamp') . '_' .'consultorio.'.$nombre_ext_archivo; $bad_file_name = 1; }
            
            $upload_dir               = BPHC_PLUGIN_DIR . 'Archivo/';//BOOKINGPRESS_UPLOAD_DIR . '/';//BOOKINGPRESS_TMP_IMAGES_DIR . '/';
            $upload_url               = BPHC_PLUGIN_URL . 'Archivo/';//BOOKINGPRESS_UPLOAD_URL . '/';//BOOKINGPRESS_TMP_IMAGES_URL . '/';
            $bookingpress_destination = $upload_dir . $file_name;

            $check_file = wp_check_filetype_and_ext( $bookingpress_destination, $file_name );
            $maxi_force_update = 1;
            if( !$maxi_force_update && empty( $check_file['ext'] ) ){
                $return_data['error'] = 1;
                $return_data['upload_error'] = $upload_file;
                $return_data['msg']   = ' mal ' . esc_html__('Invalid file extension. Please select valid file', 'bookingpress-appointment-booking');
            } else {
                $upload_file = $bookingpress_fileupload_obj->bookingpress_process_upload($bookingpress_destination);
                if ($upload_file == false ) {
                    $return_data['error'] = 1;
                    $return_data['msg']   = ! empty($upload_file->error_message) ? $upload_file->error_message : esc_html__('Something went wrong while updating the file', 'bookingpress-appointment-booking');
                } else {
                    $return_data['error']            = 0;
                    $return_data['msg']              = $bad_file_name? 'Nombre de archivo invalido. Se ha cambiado el nombre de archivo.' :'';
                    $return_data['upload_url']       = $upload_url . $file_name;
                    $return_data['upload_file_name'] = $file_name;
                    $return_data['upload_file_check'] = json_encode($check_file);
                }
            }
            
            echo wp_json_encode($return_data);
            exit();
        }
        
        public function user_can_access_historias( $user_id = 0 ){
            global $BookingPressPro, $bookingpress_pro_staff_members;
            $user_id = absint($user_id)? absint($user_id) : get_current_user_id();
            $nivel_autoridad_permitido = $user_id==1? 1 : 0;
            if( $bookingpress_pro_staff_members->bookingpress_get_staffmember_id_using_wp_user_id( $user_id ) || $nivel_autoridad_permitido ){
                return true;
            }
            return false;
        }
        /**
         * Load customers module view file
         *
         * @return void
         */
        function bookingpress_dynamic_load_stories_view_func()
        {
            //if(!isset($_GET['z'])) return;
            
            //if( $this->is_staff_customize_view( ) ){
//TEST 2025-12-08
global $BookingPressPro, $bookingpress_pro_staff_members;
//$nivel_autoridad_permitido = get_current_user_id()==1? 1 : 0;
//if( $bookingpress_pro_staff_members->bookingpress_get_staffmember_id_using_wp_user_id( get_current_user_id() ) || $nivel_autoridad_permitido ){
if( $this->user_can_access_historias() ){
                $bookingpress_load_file_name = __DIR__ . '/mod_view_historias.php';
                $bookingpress_load_file_name = apply_filters('bookingpress_modify_stories_view_file_path', $bookingpress_load_file_name);
    
                include $bookingpress_load_file_name;
            }else{
                ob_start();
                ?>
                <div class="" style="display: flex;width: 100%;min-height: 80vh;align-items: stretch;margin: auto;flex-direction: column;justify-content: center;">
                    <div style="min-height: 100px;display: flex;justify-content: center;align-items: center;margin: 40px;" class="bpa-default-card">
                        <h2 style="color: var(--bpa-dt-black-200);">Debes acceder desde el panel medico...</h2>
                    </div>
                </div>
                <?php
                echo ob_get_clean();
            }
            
        }
        
        /**
         * Load customers module helper variables
         *
         * @return void
         */
        function bookingpress_customer_dynamic_helper_vars_func()
        {
            global $bookingpress_global_options;
            $bookingpress_options     = $bookingpress_global_options->bookingpress_global_options();
            $bookingpress_locale_lang = $bookingpress_options['locale'];
            ?>
            var lang = ELEMENT.lang.<?php echo esc_html($bookingpress_locale_lang); ?>;
            ELEMENT.locale(lang)
            moment.locale('<?php echo esc_html($bookingpress_locale_lang); ?>');
            
            <?php
            do_action('bookingpress_customer_add_dynamic_helper_vars');
        }
        
        /**
         * Add more dynamic data fields to customer module
         *
         * @return void
         */
        function bookingpress_customer_dynamic_data_fields_func()
        {
            global $bookingpress_customer_vue_data_fields,$BookingPress;
            $bpa_nonce = wp_create_nonce('bpa_wp_nonce');
            $bookingpress_customer_vue_data_fields['customer']['_wpnonce'] = $bpa_nonce;
            $bookingpress_customer_vue_data_fields['bookingpress_loading'] = false;
            $bookingpress_customer_vue_data_fields['wordpress_user_id'] = '';

            // pagination data
            #$bookingpress_default_perpage_option                            = $BookingPress->bookingpress_get_settings('per_page_item', 'general_setting');
            $bookingpress_customer_vue_data_fields['perPage']               = '10';
            $bookingpress_customer_vue_data_fields['pagination_selected_length'] = '10';
      
            $bookingpress_phone_country_option = $BookingPress->bookingpress_get_settings('default_phone_country_code', 'general_setting');
            $bookingpress_customer_vue_data_fields['customer']['customer_phone_country'] = $bookingpress_phone_country_option;

            $bookingpress_customer_vue_data_fields['bookingpress_tel_input_props'] = array(
                'defaultCountry' => $bookingpress_phone_country_option,
                'inputOptions' => array(
                    'placeholder' => '',
                ),
                'validCharactersOnly' => true,
            );
            $bookingpress_customer_vue_data_fields['vue_tel_mode'] = 'international';
            $bookingpress_customer_vue_data_fields['vue_tel_auto_format'] = true;

            $bookingpress_customer_vue_data_fields['selected_patient'] = false;
            $bookingpress_customer_vue_data_fields['histories'] = array();
            $bookingpress_customer_vue_data_fields['histories_loading'] = false;
            $bookingpress_customer_vue_data_fields['dni_query'] = '';
            $bookingpress_customer_vue_data_fields['patient_searching'] = false;
            $bookingpress_customer_vue_data_fields['current_user_id'] = get_current_user_id();
            $bookingpress_customer_vue_data_fields['history_form'] = array(
                'antecedentes' => '',
                'diagnostico' => '',
                'medicamentos' => '',
                'observaciones' => '',
            );
 
            $bookingpress_customer_vue_data_fields['bpa_wp_nonce'] = wp_create_nonce('bpa_wp_nonce');
            $bookingpress_customer_vue_data_fields['history_saving'] = false;
            $bookingpress_customer_vue_data_fields['expansion_impresion_is_show'] = false;
            
            $bookingpress_customer_vue_data_fields['impresion_drawer'] = false;
            $bookingpress_customer_vue_data_fields['expansion_to_send_email_list'] = [];
            $bookingpress_customer_vue_data_fields['expansion_to_send_email_subject'] = 'Hoja de Historia Clínica Ambulatoria';
            $bookingpress_customer_vue_data_fields = apply_filters('bookingpress_modify_customer_data_fields', $bookingpress_customer_vue_data_fields);
            $bookingpress_customer_vue_data_fields = apply_filters('bookingpress_modify_histories_data_fields', $bookingpress_customer_vue_data_fields);
            
            $bookingpress_avatar_url = BOOKINGPRESS_IMAGES_URL . '/default-avatar.jpg';
            $bookingpress_customer_vue_data_fields['bp_hc_default_avatar'] = $bookingpress_avatar_url;
            $bookingpress_customer_vue_data_fields['biobox_estudios'] = ['lista_full'=>[],'lista'=>[],'total'=>0,'base_url'=>'','is_loading'=> 0,'currentPage'=>1,'perPage'=>10,'pagination_length'=>10,'current_title'=>''];
            global $expansion_biobox_alwais_open_window;
            $bookingpress_customer_vue_data_fields['biobox_alwais_open_window'] = $expansion_biobox_alwais_open_window;
            $bookingpress_customer_vue_data_fields['bphc_target'] = 'historias';// historias|estudios
            
            //$bookingpress_customer_vue_data_fields['expansion_zoom'] = 100;
            $bookingpress_customer_vue_data_fields['zoom_impresion'] = 100;
            $bookingpress_customer_vue_data_fields['impresion_btn_anim_end'] = 0;
            
            $bookingpress_customer_vue_data_fields['expansion_multi_dialog'] = [
                'is_open'=> false, 'onClose'=>null, 'content'=>null
            ];
            
            echo wp_json_encode($bookingpress_customer_vue_data_fields);
        }
        
        /**
         * Dynamic onload methods for customer module
         *
         * @return void
         */
        function bookingpress_customer_dynamic_on_load_methods_func()
        {
            ?>            
            this.$watch('bp_hc_selected_service_id', function(val){
                 this.bphc_on_updateSelectedService(val);
            });
            
            
            this.defaultNewRecord = structuredClone(this.newRecord);
            
            //console.log( this.selected_patient);
            
            //this.selected_patient = {'customer_firstname':'falla'};
            
            //2026 updates ----si pantalla es chica Forzamos inicio en modo landscape-----
            let bphc_doc_main = document.querySelector('main');
            console.log( 'main or win', (bphc_doc_main? bphc_doc_main.offsetWidth:0 || window.innerWidth), window.innerWidth, (bphc_doc_main?bphc_doc_main.offsetWidth:0) );
            if( /*window.screen.width*/ ( document.querySelector('main')? document.querySelector('main').offsetWidth : window.innerWidth) < 980 ){
                if( this.bp_hc_view_mode  ){ this.bp_hc_view_mode.dual_view = 'landscape'; }
            }
            
            <?php 
            if( !empty($_GET['appointment'])){
                
                $appointment = absint( $_GET['appointment'] );
                
                echo " this.selected_bookingpress_appointment_id = $appointment; ";
                
                $current_dni = !empty($_GET['paciente'])? absint($_GET['paciente']):0;
                $current_pid = !empty($_GET['paciente_id'])? absint($_GET['paciente_id']):0;
                #echo " this.searchByDni( $current_dni ); ";
                #echo " this.selectPatient( {'customer_id': $current_pid } ); ";
                echo " this.selectPatient( {'customer_id': $current_pid, 'dni': $current_dni }, 'is_from_appointment' ); ";
                
                
                
                #echo " this.newRecord.bookingpress_appointment_id = $appointment;" ;
                
                #echo " this.bphc_edit_HystoryRecord(0, null, $appointment); ";
                #echo " this.selected_bookingpress_appointment_id = $appointment; ";
                
            }else{
                if( empty($_GET['popup-display']) ){
                    echo " this.loadCustomers(); ";
                }
            }
            
            global $historiasClinicas_module_name;
            do_action('bookingpress_' . $historiasClinicas_module_name . '_add_dynamic_on_load_method');
        }
        
        /**
         * Customer module methods / functions
         *
         * @return void
         */
        function bookingpress_customer_dynamic_vue_methods_func()
        {
            global $BookingPress,$bookingpress_notification_duration;
            $bookingpress_phone_country_option = $BookingPress->bookingpress_get_settings('default_phone_country_code', 'general_setting');
            
                        
            ?>
            bphc_history_print( historyObj = null ){
                let to_remplace_data = [];
                console.log( 'print', historyObj, this.selected_patient );
                
                to_remplace_data = 
                {
                    'consulta_id'   : historyObj.update_id?historyObj.update_id:historyObj.id,
                    'service_id'    : historyObj.service_id,
                    'bookingpress_customer_id'  : historyObj.bookingpress_customer_id,
                    'bookingpress_staff_member_id'  : historyObj.bookingpress_staff_member_id,
                    
                    
                    'motivo_consulta'   : historyObj.general.motivoConsulta,
                    'diagnostico'       : historyObj.general.diagnostico,
                    'tratamiento'       : historyObj.general.tratamiento,
                    'notas'             : historyObj.general.notas,
                    'servicio'          : historyObj.service_name,
                    'staff_name'        : historyObj.staff_member_name,
                    'staff_matricula'   : 'MAT-ABC0002025',
                    'customer' : {
                        'dni'       : this.selected_patient.dni,
                        'nombre'    : this.selected_patient.customer_firstname +' '+ this.selected_patient.customer_lastname,                        
                        'telefono'  : this.selected_patient.customer_country_dial_code +' '+ this.selected_patient.customer_phone,
                        'email'     : this.selected_patient.customer_email,
                        'fecha_nac' : this.selected_patient.customer_metadata.persona_fecha?this.selected_patient.customer_metadata.persona_fecha:'',
                        'genero'    : this.selected_patient.customer_metadata.persona_genero?this.selected_patient.customer_metadata.persona_genero:'no definido',
                        'metadata'  : this.selected_patient.customer_metadata,
                    },
                    'vitales'   : {
                        'altura'    : historyObj.vitales.altura,
                        'peso'      : historyObj.vitales.peso,
                        'temperatura'   :  historyObj.vitales.temperatura,
                        'freq_card' :  historyObj.vitales.frecuenciaCardiaca,
                        'freq_resp' :  historyObj.vitales.frecuenciaRespiratoria,
                        'presion'   :  historyObj.vitales.presionArterial,
                        'sato2'     :  historyObj.vitales.saturacionOxigeno,
                    }
                };
                
                if( historyObj && typeof bookingpress_Expansion_impresion_load == 'function' ){
                    bookingpress_Expansion_impresion_load( to_remplace_data );
                }
            },
            bphc_date_range_change(){
                this.loadPatientHistories()
            },
            
            bphc_prevyear_reset(){
                this.bp_hc_histories_prevyear = '';
            },
            bphc_rounded_show(histories=[]){
                let show = true;
                this.bp_hc_histories_prevyear = '';
                for(const [i, h] of Object.entries(histories) ){
                    year = moment(h.date).format('YYYY');
                    if( year != this.bp_hc_histories_prevyear ){
                        this.bp_hc_histories_prevyear = year;
                        h.yearShow = true;
                    }else{
                        h.yearShow = false;
                    }
                }
                return histories;
            },
            
            bphc_changeCurrentService(selectedService_data = null){
                //console.log(selectedService_data);
                
                console.log("fired change service");
                //this.newRecord.service_name = this.bp_hc_selected_service_name;
                if( !Number(this.newRecord.service_id) ){
                    console.log( "record:"+this.newRecord.service_id+" - ", this.bp_hc_selected_service_id );
                    this.newRecord.service_id = selectedService_data? (Number(selectedService_data.service_id)? selectedService_data.service_id: this.bp_hc_selected_service_id) : this.bp_hc_selected_service_id;
                }
            },
            bphc_on_updateSelectedService( val ){
                let name = '';
                let servList = this.bp_hc_staff_serviceList;
                console.log('-----------------');
                searchService: {
                for(let cIndx in servList){
                        for(let sIndx in servList[cIndx].category_services){
                            if( this.bp_hc_selected_service_id == servList[cIndx].category_services[sIndx].service_id){
                                name =servList[cIndx].category_services[sIndx].service_name;
                                break searchService;
                            }
                        }
                    }
                }
              //if( !Number(this.newRecord.service_id) ){
                this.newRecord.service_id = this.bp_hc_selected_service_id;
              //}
              //if( this.newRecord.service_name == ''){
                this.newRecord.service_name = name;
              //}
              this.bp_hc_selected_service_name = name
            },
            toggle_sepia(){
                if(document.querySelector('.historias_y_pacientes').style.filter == 'sepia(0.7)'){
                    document.querySelector('.historias_y_pacientes').style.filter='';
                }else{
                    document.querySelector('.historias_y_pacientes').style.filter='sepia(0.7)';
                }    
            },
            toggleBusy() {
                if(this.is_display_loader == '1'){
                    this.is_display_loader = '0'
                }else{
                    this.is_display_loader = '1'
                }
            },
            handleSelectionChange(val) {
                this.multipleSelection = [];
                const customer_items_obj = val
                Object.values(customer_items_obj).forEach(val => {
                    this.multipleSelection.push({customer_id : val.customer_id})
                    this.bulk_action = 'bulk_action';
                });
            },
            handleSizeChange(val) {
                this.perPage = val
                //this.loadCustomers()
                this.loadPatientHistories()
            },
            handleCurrentChange(val) {
                this.currentPage = val;
                //this.loadCustomers()
                this.loadPatientHistories()
            },        
            changeCurrentPage(perPage) {
                var total_item = this.totalItems;
                var recored_perpage = perPage;
                var select_page =  this.currentPage;                
                var current_page = Math.ceil(total_item/recored_perpage);
                if(total_item <= recored_perpage ) {
                    current_page = 1;
                } else if(select_page >= current_page ) {
                    
                } else {
                    current_page = select_page;
                }
                return current_page;
            },
            changePaginationSize(selectedPage) {     
                var total_recored_perpage = selectedPage;
                var current_page = this.changeCurrentPage(total_recored_perpage);                                        
                this.perPage = selectedPage;                    
                this.currentPage = current_page;    
                //this.loadCustomers()
                this.loadPatientHistories()
            },
            async loadCustomers(){
                return this.loadCustomersOrig();
                //this.getCustomerDetailsTEST(1);
                
            },
            async loadCustomersOrig() {
                const vm = this;
                //this.toggleBusy(); toggleBusy No funciona como es esperado
                vm.is_display_loader = 1;
                
                var bookingpress_module_type = bookingpress_dashboard_filter_start_date = bookingpress_dashboard_filter_end_date = selected_date_range = ''; 
                bookingpress_module_type = sessionStorage.getItem("bookingpress_module_type");                
                bookingpress_dashboard_filter_start_date = sessionStorage.getItem("bookingpress_dashboard_filter_start_date");
                bookingpress_dashboard_filter_end_date = sessionStorage.getItem("bookingpress_dashboard_filter_end_date");
                sessionStorage.removeItem("bookingpress_module_type");
                sessionStorage.removeItem("bookingpress_dashboard_filter_start_date");
                sessionStorage.removeItem("bookingpress_dashboard_filter_end_date");                    
                if(bookingpress_module_type != '' && bookingpress_module_type == 'customer' && bookingpress_dashboard_filter_start_date != '' && bookingpress_dashboard_filter_end_date != '' ) {                        
                    selected_date_range = [bookingpress_dashboard_filter_start_date,bookingpress_dashboard_filter_end_date];
                    vm.customer_search_range = selected_date_range;
                }                
                var bookingpress_search_data = { search_name: this.customerSearch, selected_date_range: selected_date_range }
                var postData = { action:'bookingpress_get_customers_in_histories', perpage:5/*this.perPage*/, currentpage:1/*this.currentPage*/, search_data: bookingpress_search_data,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' };
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
                .then( function (response) {                    
                    // Deduplicate by DNI so the same document doesn't appear twice
                    const uniqueByDni = [];
                    const seenDni = new Set();
                    (response.data.items || []).forEach(row => {
                        const dniVal = (row && row.dni != null) ? String(row.dni).trim() : '';
                        if (dniVal !== '') {
                            if (!seenDni.has(dniVal)) {
                                seenDni.add(dniVal);
                                uniqueByDni.push(row);
                            }
                        } else {
                            // If there's no DNI, keep the row as-is (do not group empties)
                            uniqueByDni.push(row);
                        }
                    });
                    //2026 updates
                    if( !vm.patient_searching && ( !vm.firstsearch_pass || (/*vm.firstsearch_pass &&*/ vm.firstload_pass) ) ){
                        this.items = uniqueByDni;
                        this.totalItems = uniqueByDni.length;
                    }else{
                        console.log('se ha ignorado el primer load, se mantiene resultado de busqueda');
                    }
                }.bind(this) )
                .catch( function (error) {
                    console.log(error);
                }).finally( function(){
                    vm.firstload_pass = 1;
                    //this.toggleBusy(); toggleBusy No funciona como es esperado
                    vm.is_display_loader = 0;
                });
            },
            open_add_customer_modal(){                
                const vm2 = this
                vm2.resetForm()
                vm2.open_customer_modal = true
            },
            get_wordpress_users(query) {
                const vm2 = this	
                if (query !== '') {
                    vm2.bookingpress_loading = true;                    
                    var customer_action = { action:'bookingpress_get_wpuser',search_user_str:query,wordpress_user_id:vm2.wordpress_user_id,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }                    
                    axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                    .then(function(response){
                        vm2.bookingpress_loading = false;
                        vm2.wpUsersList = response.data.users
                    }).catch(function(error){
                        console.log(error)
                    });
                } else {
                    vm2.wpUsersList = [];
                }	
            },
            saveCustomerDetails(){
                const vm2 = this
                vm2.$refs['customer'].validate((valid) => {
                    if(valid){
                        vm2.is_disabled = true
                        vm2.is_display_save_loader = '1'
                        var postdata = vm2.customer;
                        postdata.action = 'bookingpress_add_customer';
                        postdata._wpnonce = '<?php echo esc_html( wp_create_nonce( 'bpa_wp_nonce') ); ?>'
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postdata ) )
                        .then(function(response){
                            vm2.is_disabled = false
                            vm2.is_display_save_loader = '0'                            
                            vm2.$notify({
                                title: response.data.title,
                                message: response.data.msg,
                                type: response.data.variant,
                                customClass: response.data.variant+'_notification',
                                duration:<?php echo intval($bookingpress_notification_duration); ?>,
                            });
                            if (response.data.variant == 'success') {
                                vm2.open_customer_modal = false
                                vm2.customer.update_id = response.data.customer_id
                                vm2.loadCustomers()
                            }
                            vm2.savebtnloading = false
                        }).catch(function(error){
                            vm2.is_disabled = false
                            vm2.is_display_loader = '0'
                            console.log(error);
                            vm2.$notify({
                                title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                                message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                                type: 'error',
                                customClass: 'error_notification',
                                duration:<?php echo intval($bookingpress_notification_duration); ?>,
                            });
                        });
                    }
                })
            },
            editCustomerDetails(edit_id){
                const vm2 = this
                vm2.customer.update_id = edit_id
                vm2.open_add_customer_modal()
                var customer_action = { action: 'bookingpress_get_edit_user', edit_id: edit_id,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                .then(function(response){
                    if(response.data.variant == 'success'){
                        var edit_customer_details = response.data.edit_data;
                        vm2.customer.update_id  = edit_customer_details.bookingpress_customer_id
                        if(edit_customer_details.bookingpress_wpuser_id != '') {                        
                            vm2.customer.wp_user = parseInt(edit_customer_details.bookingpress_wpuser_id);        
                        } else {                            
                            vm2.customer.wp_user = '';
                        }
                        vm2.wordpress_user_id = vm2.customer.wp_user;
                        vm2.customer.username = edit_customer_details.bookingpress_user_name
                        vm2.customer.firstname = edit_customer_details.bookingpress_user_firstname
                        vm2.customer.lastname = edit_customer_details.bookingpress_user_lastname
                        vm2.customer.email = edit_customer_details.bookingpress_user_email
                        vm2.customer.phone = edit_customer_details.bookingpress_user_phone
                        //vm2.customer.gender = edit_customer_details.gender
                        //vm2.customer.birthdate = edit_customer_details.birthdate
                        vm2.customer.note = edit_customer_details.note
                        //vm2.customer.avatar_list = edit_customer_details.avatar_list
                        vm2.customer.avatar_url = edit_customer_details.avatar_url
                        vm2.customer.avatar_name = edit_customer_details.avatar_name
                        vm2.customer.customer_phone_country = edit_customer_details.bookingpress_user_country_phone
                        vm2.bookingpress_tel_input_props.defaultCountry = edit_customer_details.bookingpress_user_country_phone;
                        vm2.$refs.bpa_tel_input_field._data.activeCountryCode = edit_customer_details.bookingpress_user_country_phone;
                        vm2.wpUsersList = edit_customer_details.wp_user_list
                        <?php do_action('bookingpress_customer_edit_details') ?>
                    } else {
                        vm2.$notify({
                            title: response.data.title,
                            message: response.data.msg,
                            type: response.data.variant,
                            customClass: response.data.variant+'_notification',
                            duration:<?php echo intval($bookingpress_notification_duration); ?>,
                        });                        
                    }
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                });
            },
            deleteCustomer(delete_id){
                const vm2 = this
                var customer_action = { action: 'bookingpress_delete_customer', delete_id: delete_id,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                .then(function(response){
                    vm2.$notify({
                        title: response.data.title,
                        message: response.data.msg,
                        type: response.data.variant,
                        customClass: response.data.variant+'_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                    vm2.loadCustomers()
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                });
            },
            bulk_actions() {
                const vm = new Vue()
                const vm2 = this
                if(this.bulk_action == "bulk_action")
                {
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Please select any action.', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                }
                else
                {
                    if(this.multipleSelection.length > 0 && this.bulk_action == "delete")
                    {
                        var customer_delete_data = {
                            action: 'bookingpress_bulk_customer',
                            delete_ids: this.multipleSelection,
                            bulk_action: 'delete',
                            _wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>'
                        }
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_delete_data ) )
                        .then(function(response){
                            vm2.$notify({
                                title: response.data.title,
                                message: response.data.msg,
                                type: response.data.variant,
                                customClass: response.data.variant+'_notification',
                                duration:<?php echo intval($bookingpress_notification_duration); ?>,

                            });
                            vm2.loadCustomers();
                            vm2.multipleSelection = [];
                            vm2.totalItems = vm2.items.length
                        }).catch(function(error){
                            console.log(error);
                            vm2.$notify({
                                title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                                message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                                type: 'error',
                                customClass: 'error_notification',
                                duration:<?php echo intval($bookingpress_notification_duration); ?>,
                            });
                        });
                    }
                    else
                    {    
                        if(this.multipleSelection.length == 0) {                                
                            vm2.$notify({
                                title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                                message: '<?php esc_html_e('Please select one or more records.', 'bookingpress-appointment-booking'); ?>',
                                type: 'error',
                                customClass: 'error_notification',
                                duration:<?php echo intval($bookingpress_notification_duration); ?>,
                            });
                        }else{
            <?php do_action('bookingpress_customer_dynamic_bulk_action'); ?>
                        }                            
                    }
                }
            },
            resetForm() {                        
                const vm2 = this                
                vm2.customer.update_id = 0;
                vm2.customer.username = '';
                vm2.customer.wp_user = '';
                vm2.customer.firstname = '';
                vm2.customer.lastname = '';
                vm2.customer.email = '';
                vm2.customer.phone = '';
                vm2.customer.note = '';
                vm2.customer.password = '';
                vm2.customer.avatar_list = [];
                vm2.customer.avatar_url = '';
                vm2.customer.avatar_name = '';
                vm2.customer.customer_phone_country = vm2.bookingpress_tel_input_props.defaultCountry;
                vm2.wordpress_user_id = '';
                vm2._wpnonce = '<?php wp_create_nonce('bpa_wp_nonce'); ?>';
                <?php do_action('bookingpress_reset_customer_fields_data') ?>
            },
            resetFilter(){
                const vm2 = this
                vm2.customerSearch =''; 
                vm2.customer_search_range = '';                          
                vm2.loadCustomers()
            },
            closeCustomerModal() {
                const vm2 = this
                vm2.$refs['customer'].resetFields()
                vm2.open_customer_modal = false
                vm2.resetForm()
            },
            
            closeBulkAction(){
                this.$refs.multipleTable.clearSelection();
                this.bulk_action = 'bulk_action';
            },
            select_date(selected_value) {
                const vm2 = this
                vm2.customer.birthdate = this.get_formatted_date(this.customer.birthdate)
            },
            get_formatted_date(iso_date){

                if( true == /(\d{2})\T/.test( iso_date ) ){
                    let date_time_arr = iso_date.split('T');
                    return date_time_arr[0];
                }
                var __date = new Date(iso_date);
                var __year = __date.getFullYear();
                var __month = __date.getMonth()+1;
                var __day = __date.getDate();
                if (__day < 10) {
                    __day = '0' + __day;
                }
                if (__month < 10) {
                    __month = '0' + __month;
                }
                var formatted_date = __year+'-'+__month+'-'+__day;
                return formatted_date;
            },
            customer_details_save(){
                this.customer_detail_save = !this.customer_detail_save
            },
            bookingpress_get_existing_user_details(bookingpress_selected_user_id){
                const vm = this
                if(bookingpress_selected_user_id != 'add_new') {
                    var postData = { action:'bookingpress_get_existing_users_details', existing_user_id: bookingpress_selected_user_id, _wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' };
                    axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
                    .then( function (response) {
                        if(response.data.user_details != '' || response.data.user_details != undefined){
                            vm.customer.username  = response.data.user_details.username
                            vm.customer.firstname = response.data.user_details.user_firstname
                            vm.customer.lastname = response.data.user_details.user_lastname
                            vm.customer.email = response.data.user_details.user_email
                        }
                    }.bind(vm) )
                    .catch( function (error) {
                        console.log(error);
                    });
                }
            },
            bookingpress_phone_country_change_func(bookingpress_country_obj){
                const vm = this
                var bookingpress_selected_country = bookingpress_country_obj.iso2
                let exampleNumber = window.intlTelInputUtils.getExampleNumber( bookingpress_selected_country, true, 1 );
                if( '' != exampleNumber ){
                    vm.bookingpress_tel_input_props.inputOptions.placeholder = exampleNumber;
                }
                vm.customer.customer_phone_country = bookingpress_selected_country
                vm.customer.customer_phone_dial_code = bookingpress_country_obj.dialCode;
            },
            async selectPatient( row, is_from = '' ){
                const vm2 = this
                //{'customer_id': $current_pid, 'dni': $current_dni }, 'is_from_appointment'
                // Highlight is handled by CSS in template; here we set state and load histories
                //this.selected_patient = row;
                this.histories = [];
                
                try{
                    this.loadPatientHistories(row, is_from);
                    
                    this.getCustomerDetails(row.customer_id);
                    
                    
                    if( is_from == 'is_from_appointment' ){
                        //selected_patient.customer_avatar customer_metadata customer_firstname customer_lastname
                        const from_appointment_intrv = Object();
                        from_appointment_intrv.count = 1;
                        from_appointment_intrv.interval = setInterval(()=> {
                                if(this.selected_patient){
                                    row = {
                                        'customer_id': this.selected_patient.customer_id, 
                                        'dni': this.selected_patient.dni, 
                                        'customer_avatar': ( this.selected_patient.customer_avatar!=''? this.selected_patient.customer_avatar : this.bp_hc_default_avatar ),
                                        'customer_firstname': this.selected_patient.customer_firstname, 'customer_lastname': this.selected_patient.customer_lastname,
                                        'customer_metadata': this.selected_patient.customer_metadata 
                                     };
                                    this.items = [ row ];
                                    this.totalItems = 1;
                                    
                                    clearInterval(from_appointment_intrv.interval);
                                }
                                //console.log(from_appointment_intrv.count);
                                
                                try{
                                    if(from_appointment_intrv.count >= 15){ 
                                        clearInterval(from_appointment_intrv.interval);
                                        this.$refs.bphc_dni_filter.focus();
                                        throw new Error('Error al recuperar datos del paciente, la consulta tarda demasiado.\nPrueba recargar la pagina o continua filtrando el DNi del paciente.');   
                                    }
                                    
                                    from_appointment_intrv.count++;
                                }catch(error){
                                    vm2.$notify({
                                        title: 'Atencion',
                                        message: error,
                                        type: 'info',
                                        customClass: 'error_notification',
                                        duration:3000,
                                    });
                                }
                                
                        },300);
                        
                    }else{
                        
                    }
                    this.selectedRow = row;
                }catch(error){
                    console.log('Capturao error'); 
                    vm2.$notify({
                        title: 'Error',
                        message: error,
                        type: 'info',
                        customClass: 'error_notification',
                        duration:1500,
                    });
                }
            },
            loadPatientHistories(row, is_from = ''){
                const vm = this;
                this.histories_loading = true;
                try{
                    const dniRaw = row && (row.dni || (row.bpa_customer_field && row.bpa_customer_field.text_C6kufq) || '');
                    const dni = dniRaw ? String(dniRaw).trim().replace(/\D+/g,'') : '';
                    const data = new URLSearchParams();
                    data.append('action','bookingpress_get_patient_histories');
                    if(vm.customer && vm.customer.bpa_wp_nonce){ data.append('bpa_wp_nonce', vm.bpa_wp_nonce); }
                    
                    if(row && row.customer_id){ data.append('customer_id', row.customer_id);
                    }else{
                        if(this.selected_patient) data.append('customer_id', this.selected_patient.customer_id );
                    }
                                                            
                    data.append('perpage', this.perPage ); data.append('currentpage', this.currentPage );
                    
                    if(this.bp_hc_selected_date_range) data.append('selected_date_range', JSON.stringify(this.bp_hc_selected_date_range) );
                                                            
                    if(dni){ data.append('dni', dni); }
                    
                    if(is_from !=''){ data.append('appointment_id', this.selected_bookingpress_appointment_id);}
                    
                    data.append('_wpnonce', vm.bpa_wp_nonce);
                    axios.post(ajaxurl, data).then(function(res){
                        
                        if( res.data.variant == 'success'){
                            const histories = (res && res.data && Array.isArray(res.data.histories)) ? res.data.histories : [];
                            
                            vm.bp_hc_histories_prevyear = '';
                            
                            vm.histories = vm.bphc_rounded_show(histories);
                            vm.historiesTotal = Number(res.data.historiesTotal)? Number(res.data.historiesTotal) : histories.length;
                            
                            
                            if( typeof res.data.historyAppointmentMSG == 'undefined' ){
                                
                                if( typeof res.data.historyAppointment != 'undefined' ){
                                    vm.bphc_appointment_history = res.data.historyAppointment
                                    if(is_from == 'is_from_appointment'){
                                        setTimeout(( )=>{
                                            vm.bphc_edit_HystoryRecord(0, vm.bphc_appointment_history, 0, 1);
                                        },500);
                                    }
                                }
                                
                            }else{
                                vm.$notify({
                                    title: 'Atencion',
                                    message: res.data.historyAppointmentMSG,
                                    type: 'warning',
                                    customClass: 'warning_notification',
                                    duration:1500,
                                });
                                
                            }
                            
                            //TEST
                            //vm.histories = vm.bp_hc_defaultHistoriesSummary;
                        }else{
                            vm.$notify({
                                title: res.data.variant.toUpperCase(),
                                message: res.data.msg,
                                type: res.data.variant,
                                customClass: res.data.variant+'_notification',
                                duration:1500,
                            });
                            
                        }
                        
                    }).catch(function(err){
                        console.error(err);
                        if(vm.$notify){ vm.$notify({ type: 'error', title: 'Error', message: 'No se pudieron cargar las historias' }); }
                    }).finally(function(){
                        vm.histories_loading = false;
                    });
                }catch(e){
                    console.error(e);
                    this.histories_loading = false;
                    
                    this.$notify({
                        title: 'Error',
                        message: 'Algo salió mal..',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:1500,
                    });
                    
                }
            },
            clearSearch(){                
                this.dni_query = '';
                this.is_display_loader = 1;
                this.selected_patient = false;
                this.histories = [];
                this.loadCustomers()
            },
            searchByDni( appointment_dni = 0 ){
                const vm = this;
                const dni = ( (Number(appointment_dni)? Number(appointment_dni) : vm.dni_query) || '').toString().trim().replace(/\D+/g,'');
                if(!dni){
                    if(vm.$notify){ vm.$notify({ type:'warning', title:' ', message:'El DNI ingresado no es válido' }); }
                    return;
                }
                vm.patient_searching = true;
                vm.is_display_loader = 1;
                const data = new URLSearchParams();
                data.append('action','bookingpress_find_customer_by_dni');
                if(vm.bpa_wp_nonce){ data.append('bpa_wp_nonce', vm.bpa_wp_nonce); }
                data.append('dni', dni);
                axios.post(ajaxurl, data).then(function(res){
                    const row = res && res.data && res.data.items ? res.data.items : null;
                    if(row){
                        
                        vm.items = row;
                        vm.totalItems = res.data.total;
                        //vm.selectPatient(row);
                    }else{
                        vm.selected_patient = null;
                        vm.histories = [];
                        if(vm.$notify){ vm.$notify({ type:'info', title:'Sin resultados', message:'No se encontró paciente con ese DNI' }); }
                    }
                }).catch(function(err){
                    console.error(err);
                    if(vm.$notify){ vm.$notify({ type:'error', title:'Error', message:'No se pudo buscar el paciente' }); }
                }).finally(function(){ vm.patient_searching = false; vm.firstsearch_pass = 1; vm.is_display_loader = 0;});
            },
            submitHistory(){
                // TODO: Implementar guardado de historia con campos del formulario
                if(this.$notify){ this.$notify({ type:'info', title:'Pendiente', message:'Guardado de historia no implementado aún' }); }
            },
            resetHistoryForm(){
                this.history_form = {
                    antecedentes: '',
                    diagnostico: '',
                    medicamentos: '',
                    observaciones: ''
                };
            },
            bp_hc_expand_toggle(){
                if( typeof document.querySelector('.bookingpress_page_wrapper')=='undefined' ) return;
                
                this.bp_hc_is_expand = ! this.bp_hc_is_expand;
                if( this.bp_hc_is_expand ){
                    document.querySelector('.bookingpress_page_wrapper').classList.add('bp_hc_is_expand');
                }else{
                    document.querySelector('.bookingpress_page_wrapper').classList.remove('bp_hc_is_expand');
                }
            },
            async getCustomerDetails(edit_id){
                const vm2 = this;
                const vmx = {};
                //vm2.customer.update_id = edit_id
                //vm2.open_add_customer_modal()
                var customer_action = { action: 'bookingpress_get_edit_user', edit_id: edit_id,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                .then(function(response){
                    if(response.data.variant == 'success'){
                        var edit_customer_details = response.data.edit_data;
                        vmx.customer_id  = edit_customer_details.bookingpress_customer_id
                        if(edit_customer_details.bookingpress_wpuser_id != '') {                        
                            vmx.customer_wp_user = parseInt(edit_customer_details.bookingpress_wpuser_id);        
                        } else {                            
                            vmx.customer_wp_user = '';
                        }
                        
                        
                        vmx.wordpress_user_id = vmx.customer_wp_user;
                        vmx.customer_username = edit_customer_details.bookingpress_user_name
                        vmx.customer_firstname = edit_customer_details.bookingpress_user_firstname
                        vmx.customer_lastname = edit_customer_details.bookingpress_user_lastname
                        vmx.customer_email = edit_customer_details.bookingpress_user_email
                        vmx.customer_phone = edit_customer_details.bookingpress_user_phone
                        //vmx.customer_gender = edit_customer_details.gender
                        
                        vmx.customer_note = edit_customer_details.note
                        //vmx.customer.avatar_list = edit_customer_details.avatar_list
                        vmx.customer_avatar = edit_customer_details.avatar_url
                        vmx.customer_avatar_name = edit_customer_details.avatar_name
                        vmx.customer_phone_country = edit_customer_details.bookingpress_user_country_phone
                        vmx.customer_country_dial_code = edit_customer_details.bookingpress_user_country_dial_code;
                        vmx.customer_metadata = edit_customer_details.customer_metadata;
                        
                        vmx.wpUsersList = edit_customer_details.wp_user_list;
                        
                        //vm2.bookingpress_tel_input_props.defaultCountry = edit_customer_details.bookingpress_user_country_phone;
                        //vm2.$refs.bpa_tel_input_field._data.activeCountryCode = edit_customer_details.bookingpress_user_country_phone;
                        
                        vmx.dni = edit_customer_details.customer_dni;
                        vmx.dni = vmx.dni? vmx.dni : edit_customer_details.customer_metadata[ vm2.dni_meta_key ];
                        vmx.tipo_doc = edit_customer_details.tipo_doc;
                        vmx.tipo_doc = vmx.tipo_doc? vmx.tipo_doc : edit_customer_details.customer_metadata[ 'tipo_doc' ];
                        vm2.selected_patient = vmx;
                        
                        //vm2.bp_hc_HistoriesSummary = vm2.bp_hc_defaultHistoriesSummary;
                        //vmx.historySummary = vm2.bp_hc_defaultHistoriesSummary[0];
                        
                        
                        vm2.selected_patient = vmx;
                        /*
                        var biobox_request_data = { action: 'expansion_biobox_dni', dni: vmx.dni, tipo_doc: vmx.tipo_doc,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' }
                        axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( biobox_request_data ) )
                        .then(function(response){
                            if(response.data.variant == 'success'){
                                vm2.biobox_estudios.lista = response.data.result.lista;
                                vm2.biobox_estudios.total = response.data.result.total;
                                //vm2.biobox_estudios.perPage = 1;
                                vm2.biobox_estudios.currentPage = 1;
                                console.log(response.data);
                            }else{
                                vm2.biobox_estudios.lista = [];
                                vm2.biobox_estudios.total = 0;
                                vm2.biobox_estudios.currentPage = 1;
                                console.log(response.data);
                            }
                        }).catch(function(error){
                            console.log(error);
                            vm2.biobox_estudios.lista = [];
                            vm2.biobox_estudios.total = 0;
                        });
                        */
                        
                        
                        <?php do_action('bphc_customer_edit_details') ?>
                        
                        return new Promise((resolve,reject)=> resolve=>{ return vm2.selected_patient});
                        
                    } else {
                        vm2.$notify({
                            title: response.data.title,
                            message: response.data.msg,
                            type: response.data.variant,
                            customClass: response.data.variant+'_notification',
                            duration:<?php echo intval($bookingpress_notification_duration); ?>,
                        });
                        return vm2.selected_patient;
                    }
                }).catch(function(error){
                    console.log(error);
                    
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Something went wrong..', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                });
                
            },
            /*
            async getCustomerDetailsTEST(edit_id){
                const vm2 = this;
                const vmx = {};

                    if(response.data.variant == 'success'){
                        var edit_customer_details = response.data.edit_data;
                        vmx.customer_id  = edit_customer_details.bookingpress_customer_id
                        if(edit_customer_details.bookingpress_wpuser_id != '') {                        
                            vmx.customer_wp_user = parseInt(edit_customer_details.bookingpress_wpuser_id);        
                        } else {                            
                            vmx.customer_wp_user = '';
                        }
                        
                        
                        vmx.wordpress_user_id = vmx.customer_wp_user;
                        vmx.customer_username = edit_customer_details.bookingpress_user_name
                        vmx.customer_firstname = edit_customer_details.bookingpress_user_firstname
                        vmx.customer_lastname = edit_customer_details.bookingpress_user_lastname
                        vmx.customer_email = edit_customer_details.bookingpress_user_email
                        vmx.customer_phone = edit_customer_details.bookingpress_user_phone
                        vmx.customer_country_dial_code = edit_customer_details.bookingpress_user_country_dial_code;
                        vmx.customer_phone_country = edit_customer_details.bookingpress_user_country_phone
                        
                        //vmx.customer_gender = edit_customer_details.gender
                        
                        vmx.customer_note = edit_customer_details.note
                        //vmx.customer.avatar_list = edit_customer_details.avatar_list
                        vmx.customer_avatar = edit_customer_details.avatar_url
                        vmx.customer_avatar_name = edit_customer_details.avatar_name
                        
                        
                        vmx.customer_metadata = edit_customer_details.customer_metadata;
                        
                        vmx.wpUsersList = edit_customer_details.wp_user_list;
                        
                        //vm2.bookingpress_tel_input_props.defaultCountry = edit_customer_details.bookingpress_user_country_phone;
                        //vm2.$refs.bpa_tel_input_field._data.activeCountryCode = edit_customer_details.bookingpress_user_country_phone;
                        
                        vmx.dni = edit_customer_details.customer_metadata[ vm2.dni_meta_key ]
                        
                        vm2.bp_hc_HistoriesSummary = vm2.bp_hc_defaultHistoriesSummary;
                        vmx.historySummary = vm2.bp_hc_defaultHistoriesSummary[0];
                        
                        vm2.selected_patient = vmx;
                        
                        if(vmx.historySummary.consultation_data.medicamentos.length){
                            for(item in vmx.historySummary.consultation_data.medicamentos){
                            await this.displayFileSize(vmx.historySummary.consultation_data.medicamentos[item]);
                            }
                        }
                        
                        
                        console.log('selected patient')
                        console.log(vm2.selected_patient);
                        return;
                                                
                    } else {
                        vm2.$notify({
                            title: response.data.title,
                            message: response.data.msg,
                            type: response.data.variant,
                            customClass: response.data.variant+'_notification',
                            duration:1500,
                        });                        
                    }
                //vm2.customer.update_id = edit_id
                //vm2.open_add_customer_modal()
                var customer_action = { action: 'bookingpress_get_edit_user', edit_id: edit_id,_wpnonce:'2cb9743d73' }
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( customer_action ) )
                .then(function(response){
                }).catch(function(error){
                    console.log(error)
                    vm2.$notify({
                        title: 'Error',
                        message: 'Algo salió mal..',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:1500,
                    });
                });
            },
            */

            bp_hc_applyStaffmemberData( historyRecord = {} ){
                console.log('bphcstaffid '+this.bp_hc_bookingpress_staffmember_id)
                console.log('historyr staffid '+historyRecord.bookingpress_staff_member_id)
                                  
                Object.assign(historyRecord, {
                   
                    "bookingpress_staff_member_id": (!Number(historyRecord.bookingpress_staff_member_id)? this.bp_hc_bookingpress_staffmember_id : Number(historyRecord.bookingpress_staff_member_id)),
                    "staff_member_name": this.bp_hc_bookingpress_staffmember_name,
                    "service_name": (!historyRecord.service_name? this.bp_hc_selected_service_name:historyRecord.service_name),
                    "service_id": (!historyRecord.service_id? this.bp_hc_selected_service_id:historyRecord.service_id),
                    
                })
                return historyRecord
            },
            bphc_view_full_HystoryRecord(edit_id = '0', historyObj = null){
                console.log("run viewFULL");
                let current_record = { ...this.newRecord };
                let current_mode = { ...this.bp_hc_view_mode };
                this.bphc_is_view_full = { 'current_mode': current_mode, 'current_record': current_record, 'form_is_open': this.bp_hc_ConsultationModal, 'scrollTop': (window.scrollTop || document.documentElement.scrollTop) };
                this.bp_hc_view_mode.full_form = 1;
                this.bphc_edit_HystoryRecord( edit_id, historyObj );
                /* 
                //Movido scrollinTO a bphc_edit_HystoryRecord mothod para ejecutarlos en todos los fullview
                //se agrega if-this.bp_hc_view_mode.full_form
                setTimeout(( )=>{
                    let dialog_el = document.querySelector('.bpa-dialog--history-modal'); //.first-desc-form
                    
                    if( dialog_el ){
                        dialog_el.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                },500);
                */
            },
            bphc_edit_HystoryRecord( edit_id = '0', historyObj = null, selected_appointment='', from_appoint=0 ){
                this.toggleBusy();
                console.log( 'editando::: ' + edit_id );
                try{
                    let bphc_edit_id = (edit_id+' ').includes('_')? edit_id: parseInt( edit_id );
                    /*bphc_edit_id = parseInt( edit_id );*/
                    
                    
                    if( !bphc_edit_id ){
                        //Se establece Nueva instancia de registro y asigna valores update_id y id a 0 add_new
                        
                        //this.bp_hc_reset_on_open();
                        
                        this.newRecord = {};
                            let strNR = this.bphc_tryNewObj( {... this.defaultNewRecord} );
                            strNR = JSON.parse(strNR, true);
                            this.newRecord = {... strNR };
                        
                        
                        bphc_edit_id = 'add_new';
                        this.newRecord.id = bphc_edit_id;
                        this.newRecord.update_id = 0;
                        this.newRecord.bookingpress_appointment_id = 0;
                        this.newRecord.bookingpress_customer_id = (this.selected_patient? this.selected_patient.customer_id :0)
                        
                        
                        console.log( this.newRecord );
                        this.newRecord = this.bp_hc_applyStaffmemberData( this.newRecord );
                        console.log( 'segundo----' );
                        this.newRecord.is_block_service = 0;
                        if( historyObj != null ){
                            Object.assign( this.newRecord, {...historyObj} );
                            this.newRecord.is_block_service = 1;
                            this.newRecord.is_from_appoint = from_appoint;
                        }else{
                            this.bphc_changeCurrentService();
                        }
                        console.log( this.newRecord );
                        
                        this.newRecord.date = moment().format("YYYY-MM-DD"); //Fecha ISO (mejor control PHP y DB)
                        this.newRecord.time = moment().format("HH:mm");    //La Hora se guarda en formato 24hs
                        
                        
                    }else{
                        
                        //this.bp_hc_reset_on_open();
                        this.newRecord = {};
                        /*
                        let strNR = this.bphc_tryNewObj( {... this.defaultNewRecord} );
                        strNR = JSON.parse(strNR, true);
                        this.newRecord = {... strNR };
                        */
                        if(!historyObj) console.log('distinto');
                        if(!historyObj) historyObj = this.histories.find((history) => history.id == bphc_edit_id );
                        
                        if(!historyObj) console.log('distinto2222');
                        
                        let strNR = this.bphc_tryNewObj( {... historyObj} );
                        strNR = JSON.parse(strNR, true);
                        this.newRecord = {... strNR };
                        
                        this.newRecord = {...this.newRecord,
                        "id": bphc_edit_id,
                        "update_id": bphc_edit_id,
                        "date": historyObj.date,
                        "time": historyObj.time,
                        "bookingpress_appointment_id": (historyObj.bookingpress_appointment_id?historyObj.bookingpress_appointment_id:0),
                        "bookingpress_customer_id": historyObj.bookingpress_customer_id,
                        "bookingpress_staff_member_id": historyObj.bookingpress_staff_member_id,
                        "staff_member_name": historyObj.staff_member_name,
                        "service_name": historyObj.service_name,
                        "service_id": historyObj.service_id,
                    
                        };
                        
                        
                        
                        this.newRecord.update_id = bphc_edit_id;
                    }
                    this.toggleBusy();
                    try{ 
                        this.bp_hc_openHistoryModal();
                        
                        if(this.bp_hc_view_mode.full_form){
                            setTimeout(( )=>{
                                let dialog_el = document.querySelector('.bpa-dialog--history-modal'); //.first-desc-form
                                
                                if( dialog_el ){
                                    dialog_el.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'start'
                                    });
                                }
                            },500); 
                        }
                    
                    }catch( e ){
                        this.bp_hc_CloseHistoryModal();
                        console.log(e);
                        this.$notify.error('Error al leer los datos del registro.');
                        this.toggleBusy();
                    }
                }catch(e){
                    console.log(e);
                    this.$notify.error('Error al cargar los datos del registro.');
                    this.bp_hc_CloseHistoryModal();
                    this.toggleBusy();
                }
            },
            bphc_tryNewObj( tojson = {} ){
                let strObj = JSON.stringify( {... tojson} );
                return strObj;
            },
            
            bp_hc_openSummaryModal(){
                
                this.bp_hc_SummaryModal = !this.bp_hc_SummaryModal;
            },
            bp_hc_closeSummaryModal(){
                this.bp_hc_SummaryModal = 0;
            },
            /** 
            * open Consultation modal ya resetea los valores - bp_hc_openHistoryModal los mantiene solo abre
            */
            bp_hc_openConsultationModal(){
                this.bp_hc_reset_on_open();
                this.bp_hc_ConsultationModal = !this.bp_hc_ConsultationModal;
            },
            bp_hc_openHistoryModal(){
                this.bp_hc_ConsultationModal = 1;//!this.bp_hc_ConsultationModal;
            },
            bp_hc_CloseHistoryModal(){
                let user_viewfull_mode = 0;
                let current_values = this.bphc_is_view_full;//['current_mode', 'current_record','form_is_open','scrollTop'];
                
                this.bp_hc_ConsultationModal = 0;
                //location.hash('contenido-principal');
                //location.assign('#contenido-principal');
                setTimeout(()=>{location.assign('#contenido-principal')},300);
                /* *** restauramos el formulario y la vista *** */
                if( this.bphc_is_view_full ){
                    this.newRecord = current_values.current_record;
                    this.bp_hc_view_mode = current_values.current_mode;
                    user_viewfull_mode = current_values.current_mode.full_form;
                    this.bphc_is_view_full = false;
                    //document.documentElement.scrollTop = current_values.scrollTop;//#contenido-principal
                    setTimeout(( )=>{
                        window.scrollTo({
                          top: current_values.scrollTop,
                          behavior: 'smooth'
                        });
                    },100);
                    const vm = this;
                    if( current_values.form_is_open /*!user_viewfull_mode*/ ){
                        setTimeout((( )=>{vm.bp_hc_ConsultationModal = 1 }),100);
                    }
                                        
                }
                /*
                if( !this.bp_hc_view_mode.full_form ){
                    const vm = this;
                    setTimeout((( )=>{vm.bp_hc_ConsultationModal = 1 }),100);
                }
                */
                
            },
            bp_hc_reset_on_open( ){
                this.newRecord = {... this.defaultNewRecord};
                
                this.newRecord = {...this.newRecord,
                    "id": "0",
                    "update_id": "0",
                    "date": "2000-00-00",
                    "time": "00:00",
                    "bookingpress_appointment_id": "0",
                    "bookingpress_customer_id": "0",
                    "bookingpress_staff_member_id": "0",
                    "staff_member_name": "",
                    "service_name": "",
                    "archivos":[],
                    "raw": {},
                };
                
                /*
                Object.assign(this.newRecord, this.selected_patient.historySummary.consultation_data, {
                    "id": "1",
                    "update_id": "0",
                    "date": "2025-09-01",
                    "time": "09:00",
                    "bookingpress_appointment_id": "1",
                    "bookingpress_customer_id": "1",
                    "bookingpress_staff_member_id": "3",
                    "staff_member_name": "JoseTest2",
                    "service_name": "Cardiología",
                });
                */
                
                
            },
            
            bp_hc_updateListingDetails( edit_record = null ){
                console.log('update listing view');
                if(!edit_record) return;
                
                if( edit_record.update_id ){
                    /*
                    console.log('paso update-');
                    var updateSumaryView = this.bp_hc_HistoriesSummary.find((history) => history.id == edit_record.update_id );
                    console.lo( 'updateSumaryView', updateSumaryView );
                    if( typeof updateSumaryView != 'undefined' ){
                        updateSumaryView = this.bphc_parse_consultationData(updateSumaryView, edit_record );
                    }
                    */
                
                }else{
                    console.log( 'es nuevo' );
                    /* 
                    if( edit_record.id == 'add_new' ){
                                                                       
                        //structuredClone(this.bp_hc_defaultHistoriesSummary[0]);
                        
                        let recData = { ...edit_record};
                        
                        edit_record['consultation_data'] = {
                            "general": edit_record['general'],
                        	"vitales": edit_record['vitales'],
                        	"antecedentes": edit_record['antecedentes'],
                        	"medicamentos": edit_record['medicamentos'],
                            };
                        
                        
                        
                        //temp_edit_record = this.bphc_parse_consultationData( structuredClone(this.bp_hc_defaultHistoriesSummary[0]), edit_record );
                        
                        //HACEMOS ESTO POR ULTIMO - SE REESCRIBE - 
                        
                        //console.log( "resultadossssssss" );
                        //console.log( edit_record );
                        
                        //console.log( temp_edit_record );
                        
                        //console.log( recData );
                        
                        
                        edit_record.id = Date.now() + '_';
                        edit_record.update_id = 'new';                        
                        
                        this.bp_hc_HistoriesSummary.push( edit_record );
                        
                    }
                    */
                }
                this.loadPatientHistories(this.selected_patient)
                //this.bp_hc_CloseHistoryModal();
            },
            
            bphc_parse_consultationData( updateSumaryView, edit_record, removeKeys=false, ret=1 ){
                
                
                //console.log('empieza '); 
                //console.log(edit_record.general);
                
                for(let up in updateSumaryView.consultation_data){
                            console.log( up );
                             updateSumaryView.consultation_data[up] = edit_record[up];
                             console.log( updateSumaryView.consultation_data[up] );
                             console.log( 'recordValue' );
                             console.log( edit_record[up] );
                             
                             //if(removeKeys) delete edit_record[up];
                        }
                        
                if(ret==2) return edit_record;
                return updateSumaryView;
            },
            
                        
            validateService(rule, value, callback){
                //console.log(rule, value, callback);
                
                if( !Number(value) ){
                    callback( new Error(rule.message) );
                }else{
                    callback();
                }
            },
            
            bphc_save_historyRecord() {
                const vm2 = this
                            
                this.$refs.recordForm.validate((valid,fields) => {
                    if (valid) {
                        console.log(vm2.newRecord);
                        //vm2.toggleBusy();
                        vm2.is_display_loader = '1';
                        
                        if(!vm2.newRecord.update_id || vm2.newRecord.id == 'new'){
                            vm2.newRecord.date = moment().format("YYYY-MM-DD"); //Fecha ISO (mejor control PHP y DB)
                            vm2.newRecord.time = moment().format("HH:mm");    //La Hora se guarda en formato 24hs
                        }
                        
                        const params = new URLSearchParams();
                        params.append('action', 'bp_hc_save_clinical_record');
                        params.append('update_id',  vm2.newRecord.update_id)
                        params.append('_ajax_nonce', 'nonce');
                        
                        params.append('record_data', JSON.stringify(this.newRecord)); // Enviamos el objeto como string JSON
                                                
                        fetch(appoint_ajax_obj.ajax_url, {
                            method: 'POST',
                            body: params
                        })
                        .then(response => response.json())
                        .then(result => {
                            
                            if (result.variant == 'success') {
                                vm2.$notify({
                                    title: result.title,
                                    message: result.msg,//"Historia Guardada con exito",
                                    type: 'success',
                                    customClass: "info",
                                    duration:1500 ,
                                });
                                
                                if(!vm2.newRecord.update_id || vm2.newRecord.id == 'new'){
                                    vm2.newRecord.id = vm2.newRecord.update_id = result.consulta_id;
                                    
                                    if(typeof vm2.newRecord.is_from_appoint != 'undefined' && vm2.newRecord.is_from_appoint){
                                        vm2.bphc_appointment_history = { ...vm2.newRecord };
                                        vm2.bphc_appointment_history.update_id = result.consulta_id;
                                    }
                                }
                                
                                //vm2.bp_hc_updateListingDetails( vm2.newRecord );
                                //Comentando-bp_hc_updateListingDetails-requiere-loadPatient
                                this.loadPatientHistories(this.selected_patient);
                                
                                //vm2.histories = vm2.bp_hc_HistoriesSummary;
                                vm2.is_display_loader = '0';
                                if( vm2.bp_hc_view_mode.full_form ){
                                    console.log("actual full close modal");
                                    setTimeout(()=>{ vm2.bp_hc_CloseHistoryModal(); },500);
                                }
                                //vm2.$forceUpdate();
                                
                                //this.$message.success(result.data.message);
                                //this.fetchPatientRecords(this.selectedPatient.ID); // Recargamos la línea de tiempo
                            } else {
                                
                                vm2.$notify({
                                    title: (result.title!='')? result.title : "Error",
                                    message: (result.msg!='')? result.msg : "El registro no se ha Guardado",
                                    type: (result.variant!='')? result.variant : "error",
                                    customClass: "warning",
                                    duration: 1500,//<?php echo intval($bookingpress_notification_duration); ?>,
                                });
                                //this.$message.error(result.data);
                                
                            }
                            //vm2.toggleBusy();
                            vm2.is_display_loader = '0';
                        });//FinFetch
                    } else {
                        //vm2.toggleBusy();
                        vm2.is_display_loader = '0';
                        this.$notify.error('Por favor, complete los campos requeridos.');
                        //this.$message.error('Por favor, complete los campos requeridos.');
                        return false;
                    }
                });
            },
            
            addMedicamento() {
                let dia = ( new Date(Date.now()).toLocaleDateString() );
                try{
                    dia = moment().format('YYYY-MM-DD');
                }catch{
                    console.log( moment() );
                }
                this.newRecord.medicamentos.push({ nombre: '', dosis: '', frecuencia: '', fecha: dia });
            },
            removeMedicamento(item) {
                const index = this.newRecord.medicamentos.indexOf(item);
                if (index !== -1) {
                    this.newRecord.medicamentos.splice(index, 1);
                }
            },
            addAlergia(){
                let dia = ( new Date(Date.now()).toLocaleDateString() );
                try{
                    dia = moment().format('YYYY-MM-DD');
                }catch{
                    console.log( moment() );
                }
                this.newRecord.alergias.push({ id: 0, alergia: '', reaccion_o_motivo: '', fecha: dia, hasta: dia });
            },
            removeAlergia(item) {
                const index = this.newRecord.alergias.indexOf(item);
                if (index !== -1) {
                    this.newRecord.alergias.splice(index, 1);
                }
            },
            addAntecedente(){
                let dia = ( new Date(Date.now()).toLocaleDateString() );
                try{
                    dia = moment().format('YYYY-MM-DD');
                }catch{
                    console.log( moment() );
                }
                this.newRecord.antecedentes.push({ id: 0, descripcion: '', tipo: '', detalle: '', fecha: dia });
            },
            removeAntecedente(item) {
                const index = this.newRecord.antecedentes.indexOf(item);
                if (index !== -1) {
                    this.newRecord.antecedentes.splice(index, 1);
                }
            },
            
            bphc_upload_record_file(response, file, fileList){
                const vm2 = this
                if(response != ''){
                    
                    let file_size = 0;
                    try{
                        file_size = parseFloat(file.size / 1024);
                        file_size = file_size.toFixed(2);
                    }catch{}
                    
                    let file_type = "";
                    try{
                        file_type = (file.type)? file.type : file.raw.type;
                    }catch{}
                    /*
                    console.log('bphc_upload_record_file', 'Nexxxxt fILE Type:'+file_type );
                    if( typeof this.nexFileType != 'undefined' ) console.log( this.nexFileType );
                    */
                    if(typeof vm2.bphc_filetypes != 'object'){
                        vm2.bphc_filetypes = [];
                    }
                    vm2.bphc_filetypes.push({'name': response.upload_file_name,'type': file_type});
                    
                    vm2.newRecord.archivos.push(
                    {'url' : response.upload_url, 'name': response.upload_file_name, 
                    'size': file_size, 'type': file_type, 'type_file': file_type }
                    );
                }
            },
            bphc_upload_record_file_err(err, file, fileList){
                const vm2 = this
                var err_msg = '<?php esc_html_e('Something went wrong', 'bookingpress-appointment-booking'); ?>';
                if(err != '' || err != undefined){
                    err_msg = err
                }
                vm2.$notify({
                    title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                    message: err_msg,
                    type: 'error',
                    customClass: 'error_notification',
                    duration:<?php echo intval($bookingpress_notification_duration); ?>,
                });
            },
            bphc_checkUploaded_file(file){
                const vm2 = this
                console.log('bphc_checkUploaded_file', file.type );
                this.nexFileType = file.type;
                if( true || (file.type != 'image/jpeg' && file.type != 'image/png' && file.type != 'image/webp') ){
                    vm2.$notify({
                        title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                        message: '<?php esc_html_e('Please upload jpg/png file only', 'bookingpress-appointment-booking'); ?>',
                        type: 'error',
                        customClass: 'error_notification',
                        duration:<?php echo intval($bookingpress_notification_duration); ?>,
                    });
                    /*return false*/
                    
                }else{
                    let bp_hc_max_sizeMB = 2;
                    let bp_hc_max_sizeBytes = bp_hc_max_sizeMB * 1024 *1024;
                    if(file && file.size > bp_hc_max_sizeBytes){
                        vm2.$notify({
                            title: '<?php esc_html_e('Error', 'bookingpress-appointment-booking'); ?>',
                            message: '<?php esc_html_e('Please upload maximum 20 MB file only', 'bookingpress-appointment-booking'); ?>',
                            type: 'error',
                            customClass: 'error_notification',
                            duration:<?php echo intval($bookingpress_notification_duration); ?>,
                        });                    
                        return false
                    }
                }
            },
            bphc_bookingpress_remove_customer_avatar(file='') {
                const vm = this
                console.log('is_remove_method ');
                console.log(file);
                return
                
                var upload_url = vm.customer.avatar_url
                var upload_filename = vm.customer.avatar_name
                var postData = { action:'bookingpress_remove_customer_avatar', upload_file_url: upload_url,_wpnonce:'<?php echo esc_html(wp_create_nonce('bpa_wp_nonce')); ?>' };
                axios.post( appoint_ajax_obj.ajax_url, Qs.stringify( postData ) )
                .then( function (response) {
                    vm.customer.avatar_url = ''
                    vm.customer.avatar_name = ''
                    vm.$refs.avatarRef.clearFiles()
                }.bind(vm) )
                .catch( function (error) {
                    console.log(error);
                });
            },
            
            bphc_handlePreview_record_file(file) {
              
              if( typeof file.raw != 'undefined'){
                      //imagen
                      if (file.raw.type.startsWith('image/')) {
                        window.open(file.url || URL.createObjectURL(file.raw));
                      } else {
                        //doc
                        window.open( file.url );
                      }
              }else{
                window.open(file.url)
                
              }
              
    
            },
            bphc_handleRemove_record_file(file, fileList) {
                //console.log('Removing file:', file, fileList);
                if( fileList ){
                this.newRecord.archivos = fileList;
                }
            },
            bphc_handleExceed_limit_files(files, fileList) {
                this.$notify.warning(`El limite es 10 archivos, usted agrego ${files.length} archivo(s) esta vez, llegando a ${files.length + fileList.length} archivos.`);
            },
            
            async getFileSize(url) {
                try {
                    const response = await fetch(url, { method: 'HEAD' });
                    const contentLength = response.headers.get('content-length');
                    if (contentLength) {
                      return parseInt(contentLength, 10); // Size in bytes
                    }
                    return null; // Content-Length header not found
                }catch (error) {
                    console.error("Error fetching file size:", error);
                    return null;
                }
            },
    
            async displayFileSize(item=null) {
                let tempItem = item;
                let url="";
                if( typeof item.url == 'string'){
                    url = item.url
                }
                let size = await this.getFileSize(url);
                
                if (size !== null) {
                    //console.log(`File size: ${size} bytes`);
                    let snum = size / 1024;
                    if( snum > 1024 ){
                        snum = snum /1024;
                        size = snum.toFixed(2) +'MB';
                    }else{
                        size = snum.toFixed(2) +'KB';
                    }
                    tempItem.size = size;
                } else {
                    console.log("Could not retrieve file size.");
                    tempItem.size = "SinDatos";
                }
            },
            
                                    
            impresionZoomInOut( ev, in_out = '+' ){
                ev.preventDefault();
                const vm = this;
                console.log('ajuste zoom', ev, in_out);
                try{
                    let step = 20;
                    let zoom_val = vm.zoom_impresion;
                    zoom_val = (in_out == '-')? (zoom_val - step ): (zoom_val + step);
                    zoom_val = zoom_val > 60? (zoom_val>200? 200 : zoom_val) : 60;
                    //vm.zoom_impresion = zoom_val;
                    vm.set_impresionZoom( zoom_val )
                    
                }catch{};
            },
            
            set_impresionZoom( zoom_val = 100 ){
                const vm = this;
                try{
                    body_el = vm.get_impresionDocument().querySelector('body');
                    body_el.style.zoom = zoom_val+'%';
                    vm.zoom_impresion = zoom_val;
                }catch{ 
                    return 0;
                };
                return 1;
            },
            
            get_impresionDocument(){
                return booking_ExpansionGetDoContent().document;
            },
            
            async impresion_toPDF( Ev ){
                let btn = null;
                if( Ev ){ btn = Ev.target.tagName == 'button'? Ev.target : Ev.target.closest('button'); }
                
                if( btn ) btn.disabled = true;
                document.querySelector('body').classList.add('is_pdf_load');
                const vm = this;
                vm.is_display_loader = 1;
                setTimeout(async ()=> {
                    vm.set_impresionZoom( zoom_val = 100 );
                    let html_el = vm.get_impresionDocument().documentElement;
                    
                    await vm.expansion_generar_pdf( null, html_el/*.documentElement*/ )
                    if( btn ) btn.disabled = false;
                    html_el = '';
                }, 10);
                return 1;
            },
            
            async expansion_generar_pdf( ev, el, addCanvasOpt ){
                //el = document.querySelector('#booking_Expansion_To_send_content')
                if(!el) return console.log('No se pudo generar PDF, no se encuentra elemento.');
    
                try{
                    return this.generarYAbrirPDF( el, addCanvasOpt );
                }catch{}
                
            },
            async generarYAbrirPDF( el, addCanvasOpt, props = {title:'Hoja-Clinica', creator: 'Foatconcept - Generado automaticamente'} ) {
                app.is_display_loader = 1;
                document.querySelector('body').classList.add('is_pdf_load');
                if(!el) return console.log('No se pudo generar PDF, no se encuentra elemento.');
                const elemento = el;//document.getElementById('contenido-a-exportar');
                
                let canvasOpt = { scale: 5, useCORS: true, letterRendering: true, scrollY: 0, scrollX: 0, logging: false };
                if( addCanvasOpt ){
                    canvasOpt = { ...canvasOpt, addCanvasOpt }; 
                }
                
                const opciones = {
                    margin: 0,
                    filename: 'documento.pdf',
                    image: { type: 'jpeg', quality: 0.99 },
                    html2canvas: canvasOpt,
                    jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }//letter//A4
                };
        
                // obtener el PDF como Blob
                const pdfBlob = await html2pdf()
                    .set(opciones)
                    .from(elemento)
                    .toPdf()
                    .get('pdf')
                    .then(pdf => pdf.setProperties(props)
                    ).output('blob');
                
                const url = URL.createObjectURL(pdfBlob);
                // ya No abrimos la url directamente //window.open(url, '_blank');
                
                let htm_maxi = `
                <div style="margin: 0 20px;height: 65vh;min-width: 482px;box-sizing: border-box;">
                    <div style="margin: 5px 5px; 10px">
                        <strong>PDF disponible</strong> 
                        <a style="float: right;display: flex;" href="${url}" target="_blank"> <span style="color: #606266;">Abrir</span> <span class="material-icons-round" style="font-size: 20px;">open_in_new</span> </a>
                    </div>
                    <embed width="100%" height="100%" style="height: calc(100% - 30px);" type="application/pdf" type="application/x-google-chrome-pdf" src="${url}" original-url="${url}" background-color="4280821800" javascript="allow" full-frame="">
                </div>
                `;
                app.expansion_multi_dialog.content = htm_maxi;
                app.expansion_multi_dialog.is_open = true;
                setTimeout(() => {
                    document.querySelector('body').classList.remove('is_pdf_load');
                    app.is_display_loader = 0;
                }, 300);
                
                // Liberamos la memoria
                app.expansion_multi_dialog.onClose = function(){
                    //app.expansion_multi_dialog.is_open = false;
                    console.log('liberando pdf de memoria', url);                    
                    setTimeout(() =>{ URL.revokeObjectURL(url) }, 3000);
                };
            },
            
            <?php
            global $historiasClinicas_module_name;
            do_action('bookingpress_customer_add_dynamic_vue_methods');
            do_action('bookingpress_' . $historiasClinicas_module_name . '_add_dynamic_vue_methods');
        }
        
        /**
         * Get all customers details for customer module
         *
         * @return void
         */
        function bookingpress_get_customer_details( $bphc_For_customer = [] )
        {
            global $wpdb, $tbl_bookingpress_customers, $tbl_bookingpress_appointment_bookings,$BookingPress,$bookingpress_global_options;
            $response              = array();
            
            global $dni_key;
            if( empty($dni_key) ) $dni_key = 'text_C6kufq';

            if( empty($bphc_For_customer) ):
                    
                    $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_customers', true, 'bpa_wp_nonce' );
                    
                    if( preg_match( '/error/', $bpa_check_authorization ) ){
                        $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                        $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');
        
                        $response['variant'] = 'error';
                        $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                        $response['msg'] = $bpa_error_msg;
        
                        wp_send_json( $response );
                        die;
                    }
        
                    $perpage     = isset($_POST['perpage']) ? intval($_POST['perpage']) : 10; // phpcs:ignore WordPress.Security.NonceVerification
                    $currentpage = isset($_POST['currentpage']) ? intval($_POST['currentpage']) : 1; // phpcs:ignore WordPress.Security.NonceVerification
                    $offset      = ( ! empty($currentpage) && $currentpage > 1 ) ? ( ( $currentpage - 1 ) * $perpage ) : 0;
                 // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['search_data'] contains mixed array and it's been sanitized properly using 'appointment_sanatize_field' function
                    $bookingpress_search_data  = ! empty($_REQUEST['search_data']) ? array_map(array( $BookingPress, 'appointment_sanatize_field' ), $_REQUEST['search_data']) : array(); // phpcs:ignore
                    $bookingpress_search_query = $bookingpress_search_query_join = '';
        
                    if (! empty($bookingpress_search_data['search_name']) ) {
                        $bookingpress_search_customer_name = explode(' ', $bookingpress_search_data['search_name']);
                        $bookingpress_search_query        .= ' AND (';
                        $search_loop_counter               = 1;
                        foreach ( $bookingpress_search_customer_name as $bookingpress_search_customer_key => $bookingpress_search_customer_val ) {
                            if ($search_loop_counter > 1 ) {
                                $bookingpress_search_query .= ' OR';
                            }
                            $bookingpress_search_query .= " (bookingpress_user_login LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_email LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_customer_full_name LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_firstname LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_lastname LIKE '%{$bookingpress_search_customer_val}%' OR bookingpress_user_phone LIKE '%{$bookingpress_search_customer_val}%')";
        
                            $search_loop_counter++;
                        }
                        $bookingpress_search_query .= ' )';
                    }
                    if (! empty($bookingpress_search_data['selected_date_range']) ) {
                        $bookingpress_search_date         = $bookingpress_search_data['selected_date_range'];
                        $start_date                       = date('Y-m-d', strtotime($bookingpress_search_date[0]));
                        $end_date                         = date('Y-m-d', strtotime($bookingpress_search_date[1]));
                        $bookingpress_search_query .= " AND (bookingpress_user_created BETWEEN '".$start_date." 00:00:00' AND '".$end_date." 23:59:59')";
                    }
        
                    $bookingpress_search_query_join = apply_filters('bookingpress_customer_view_join_add_filter', $bookingpress_search_query_join);
        
                    $bookingpress_search_query = apply_filters('bookingpress_customer_view_add_filter', $bookingpress_search_query);
        
                    $total_customers = $wpdb->get_results("SELECT cs.bookingpress_customer_id FROM {$tbl_bookingpress_customers} as cs {$bookingpress_search_query_join} WHERE cs.bookingpress_user_type = 2 AND cs.bookingpress_user_status = 1 {$bookingpress_search_query} ",ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                    $get_customers = $wpdb->get_results("SELECT cs.* FROM {$tbl_bookingpress_customers} as cs {$bookingpress_search_query_join} WHERE cs.bookingpress_user_type = 2 AND cs.bookingpress_user_status = 1 {$bookingpress_search_query} order by bookingpress_customer_id DESC LIMIT {$offset} , {$perpage}", ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm

            else:
                $get_customers = $bphc_For_customer;
                $total_customers = array_keys($bphc_For_customer);
                
            endif;
            
            $bookingpress_global_options_arr       = $bookingpress_global_options->bookingpress_global_options();
            $bookingpress_default_date_format = $bookingpress_global_options_arr['wp_default_date_format'];
            $bookingpress_default_time_format = $bookingpress_global_options_arr['wp_default_time_format'];
            $bookingpress_default_date_time_format = $bookingpress_default_date_format . ' ' . $bookingpress_default_time_format;
            
            $bookingpress_customers = array();
            if (! empty($get_customers) ) {
                $counter = 1;
                foreach ( $get_customers as $customer ) {

                    $bookingpress_avatar_url              = get_avatar_url($customer['bookingpress_wpuser_id']);
                    $bookingpress_get_existing_avatar_url = $BookingPress->get_bookingpress_customersmeta($customer['bookingpress_customer_id'], 'customer_avatar_details');
                    $bookingpress_get_existing_avatar_url = ! empty($bookingpress_get_existing_avatar_url) ? maybe_unserialize($bookingpress_get_existing_avatar_url) : array();
                    if (! empty($bookingpress_get_existing_avatar_url[0]['url']) ) {
                        $bookingpress_avatar_url = $bookingpress_get_existing_avatar_url[0]['url'];
                    } else {
                        $bookingpress_avatar_url = BOOKINGPRESS_IMAGES_URL . '/default-avatar.jpg';
                    }
                    $bookingpress_customer_tmp_details                       = array();
                    $bookingpress_customer_tmp_details['id']                 = $counter;
                    $bookingpress_customer_tmp_details['customer_id']        = intval($customer['bookingpress_customer_id']);
                    $bookingpress_customer_tmp_details['customer_avatar']    = esc_url($bookingpress_avatar_url);
                    $bookingpress_customer_tmp_details['customer_username'] = stripslashes_deep($customer['bookingpress_user_name']);
                    $bookingpress_customer_tmp_details['customer_fullname'] = (!empty($customer['bookingpress_customer_full_name']) && !is_null($customer['bookingpress_customer_full_name']))?stripslashes_deep($customer['bookingpress_customer_full_name']):'';
                    $bookingpress_customer_tmp_details['customer_firstname'] = stripslashes_deep($customer['bookingpress_user_firstname']);
                    $bookingpress_customer_tmp_details['customer_lastname']  = stripslashes_deep($customer['bookingpress_user_lastname']);
                    $bookingpress_customer_tmp_details['customer_email']     = stripslashes_deep($customer['bookingpress_user_email']);
                    $bookingpress_customer_tmp_details['customer_phone']     = esc_html($customer['bookingpress_user_phone']);
                    
                    $bookingpress_customer_tmp_details = apply_filters( 'bookingpress_modify_edit_customer_details', $bookingpress_customer_tmp_details, $bookingpress_customer_tmp_details['customer_id'] );
                    $bookingpress_customer_tmp_details['dni'] = !empty( $bookingpress_customer_tmp_details['customer_metadata'][$dni_key] )? $bookingpress_customer_tmp_details['customer_metadata'][$dni_key] : ''; 

                    // Fetch last appointment
                    $last_appointment_data            = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_customer_id = %d ORDER BY bookingpress_appointment_booking_id DESC LIMIT 1", $customer['bookingpress_customer_id']), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_appointment_bookings is table name defined globally. False Positive alarm
                    $default_date_time_format         = get_option('date_format') . ' ' . get_option('time_format');
                    $last_appointment_booked_datetime = ! empty($last_appointment_data['bookingpress_created_at']) ? date_i18n($bookingpress_default_date_time_format, strtotime($last_appointment_data['bookingpress_created_at'])) : '-';

                    // Count total appointment
                    $total_appointments = $wpdb->get_var($wpdb->prepare("SELECT COUNT(bookingpress_appointment_booking_id) FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_customer_id = %d", $customer['bookingpress_customer_id'])); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_appointment_bookings is table name defined globally. False Positive alarm

                    $bookingpress_customer_tmp_details['customer_last_appointment']  = $last_appointment_booked_datetime;
                    $bookingpress_customer_tmp_details['customer_total_appointment'] = $total_appointments;

                    $bookingpress_customers[] = $bookingpress_customer_tmp_details;
                    $counter++;
                }
            }
            $data['items'] = $bookingpress_customers;
            $data['total'] = count($total_customers);
            wp_send_json($data);
            die();
        }
                
        /**
         * Ajax request for get wordpress user except user who has role of administrator, bookingpress-staffmember, bookingpress-customer
         *
         * @return void
         */
        function bookingpress_get_wpuser()
        {
            global $wpdb, $BookingPress, $tbl_bookingpress_customers;
            $response              = array();

            $bpa_check_authorization = $this->bpa_check_authentication( 'search_user', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            $response['variant'] = 'error';
            $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']     = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            $search_user_str = ! empty( $_REQUEST['search_user_str'] ) ? sanitize_text_field( $_REQUEST['search_user_str'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
            $wordpress_user_id = ! empty( $_REQUEST['wordpress_user_id'] ) ? intval( $_REQUEST['wordpress_user_id'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
            
			if(!empty($search_user_str)) {                    
                $args                = array(
                    'search' => '*'.$search_user_str.'*',
					'fields' => array( 'user_login','id'),
                    'role__not_in' => array( 'administrator','bookingpress-staffmember','bookingpress-customer'),
                );
                $wpusers             = get_users($args);
                $bookingpress_existing_user_data = $existing_users_data = array();
                if(!empty($wordpress_user_id)) {
                    $user_data = '';
                    $user_data = get_userdata($wordpress_user_id);                
                    if(!empty($user_data)) {        
                        $existing_users_data[] = array(
                            'value' => $user_data->ID,				
                            'label' => $user_data->user_login,
                        );                         
                    }                                
                }
                if (!empty($wpusers) ) {
                    foreach ( $wpusers as $wpuser ) {
                        $user                  = array();
                        $user['value']         = $wpuser->id;
                        $user['label']         = $wpuser->user_login;
                        $existing_users_data[] = $user;
                    }
                }         
                $bookingpress_existing_user_data[] = array(
                    'category'     => esc_html__('Select Existing User', 'bookingpress-appointment-booking'),
                    'wp_user_data' => $existing_users_data,
                );
                $response['variant']               = 'success';
                $response['users']                 = $bookingpress_existing_user_data;
                $response['title']                 = esc_html__('Success', 'bookingpress-appointment-booking');
                $response['msg']                   = esc_html__('Customer Data.', 'bookingpress-appointment-booking');
            }     
            wp_send_json($response);
        }
        
        
        
        
        
        
        
        
        
        
        function bp_hc_request_de_customer(){
            
            
            if(false)
            {
                $bookingpress_existing_user_id = ! empty($_REQUEST['wp_user']) ? trim(sanitize_text_field($_REQUEST['wp_user'])) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_username         = ! empty($_REQUEST['username']) ? sanitize_text_field($_REQUEST['username']) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_firstname        = ! empty($_REQUEST['firstname']) ? trim(sanitize_text_field($_REQUEST['firstname'])) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_lastname         = ! empty($_REQUEST['lastname']) ? trim(sanitize_text_field($_REQUEST['lastname'])) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_email            = ! empty($_REQUEST['email']) ? sanitize_email($_REQUEST['email']) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_user_pass        = wp_generate_password(12, false);
             // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['search_data'] contains password and will be hashed using wp_create_user function. 
                $bookingpress_password = ! empty($_REQUEST['password']) ? $_REQUEST['password'] : $bookingpress_user_pass;

                if (strlen($bookingpress_firstname) > 255 ) {
                    $response['msg'] = esc_html__('Firstname is too long...', 'bookingpress-appointment-booking');
                    wp_send_json($response);
                    die();
                }

                if (strlen($bookingpress_lastname) > 255 ) {
                    $response['msg'] = esc_html__('Lastname is too long...', 'bookingpress-appointment-booking');
                    wp_send_json($response);
                    die();
                }

                if (strlen($bookingpress_email) > 255 ) {
                    $response['msg'] = esc_html__('Email address is too long...', 'bookingpress-appointment-booking');
                    wp_send_json($response);
                    die();
                }

                $bookingpress_allow_customer_create = $BookingPress->bookingpress_get_settings('allow_wp_user_create', 'customer_setting');
                $bookingpress_allow_customer_create = ! empty($bookingpress_allow_customer_create) ? $bookingpress_allow_customer_create : 'false';

                if (! empty($bookingpress_existing_user_id) && $bookingpress_existing_user_id == 'add_new' && email_exists($bookingpress_email) ) {
                    $response['msg'] = esc_html__('Email address is already exists', 'bookingpress-appointment-booking');
                    wp_send_json($response);
                    die();
                }
                
                if( !empty($bookingpress_username )){
                    $bookingpress_user_name = $bookingpress_username;
                } else {
                    $bookingpress_user_name = ! empty($bookingpress_firstname) ? $bookingpress_firstname : $bookingpress_email;
                }

                if (empty($bookingpress_existing_user_id) ) {
                    $bookingpress_customer_details = array(
                        'bookingpress_customer_name'      => $bookingpress_user_name,
                        'bookingpress_customer_phone'     => $bookingpress_customer_phone,
                        'bookingpress_customer_firstname' => $bookingpress_firstname,
                        'bookingpress_customer_lastname'  => $bookingpress_lastname,
                        'bookingpress_customer_country'   => $bookingpress_customer_country,
                        'bookingpress_customer_email'     => $bookingpress_email,
                        'bookingpress_customer_note'      => $bookingpress_note,
                        'bookingpress_customer_phone_dial_code' => $bookingpress_customer_dial_code,
                    );

                    $bookingpress_customer_details = $this->bookingpress_create_customer($bookingpress_customer_details, $bookingpress_existing_user_id,2,1);

                    if (is_array($bookingpress_customer_details) && isset($bookingpress_customer_details['bookingpress_customer_id']) && isset($bookingpress_customer_details['bookingpress_wpuser_id']) ) {
                        $bookingpress_update_id        = $bookingpress_customer_details['bookingpress_customer_id'];
                        $bookingpress_existing_user_id = $bookingpress_customer_details['bookingpress_wpuser_id'];

                        do_action('bookingpress_after_update_customer', $bookingpress_update_id);
                        do_action('bookingpress_after_create_new_customer', $bookingpress_update_id);                        

                        $response['customer_id'] = $bookingpress_update_id;
                        $response['wpuser_id']   = $bookingpress_existing_user_id;
                        $response['variant']     = 'success';
                        $response['title']       = esc_html__('Success', 'bookingpress-appointment-booking');
                        $response['msg']         = esc_html__('Customer has been added succsssfully.', 'bookingpress-appointment-booking');
                    }
                } else {
                    $bookingpress_existing_customer_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_customer_id = %d", $bookingpress_update_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                    $bookingpress_existing_wp_user_id = !empty($bookingpress_existing_customer_details['bookingpress_wpuser_id']) ? $bookingpress_existing_customer_details['bookingpress_wpuser_id'] : '';
                    if (! empty($bookingpress_existing_customer_details) ) {
                        $bookingpress_existing_user_id       = empty($bookingpress_existing_user_id) ? $bookingpress_existing_customer_details['bookingpress_wpuser_id'] : $bookingpress_existing_user_id;
                        $bookingpress_existing_users_details = get_userdata($bookingpress_existing_user_id);
                        if($bookingpress_existing_user_id != $bookingpress_existing_wp_user_id ) {
                            $userObj = new WP_User( $bookingpress_existing_wp_user_id );                   
                            $userObj->remove_role('bookingpress-customer');
                        }
                        if (! empty($bookingpress_existing_users_details->roles) && is_array($bookingpress_existing_users_details->roles) ) {
                               $bookingpress_user_roles = $bookingpress_existing_users_details->roles;
                               array_push($bookingpress_user_roles, 'bookingpress-customer');
                               $booking_user_update_meta_details['roles'] = $bookingpress_user_roles;
                        }
                        do_action('bookingpress_user_update_meta', $bookingpress_existing_user_id, $booking_user_update_meta_details);

                        $bookingpress_update_fields = array(
                            'bookingpress_user_name'      => $bookingpress_user_name,
                            'bookingpress_user_firstname' => $bookingpress_firstname,
                            'bookingpress_user_lastname'  => $bookingpress_lastname,
                            'bookingpress_user_email'     => $bookingpress_email,
                            'bookingpress_user_phone'     => $bookingpress_phone,
                            'bookingpress_user_country_phone' => $bookingpress_country_phone,
                            'bookingpress_wpuser_id'      => $bookingpress_existing_user_id,
                            'bookingpress_user_country_dial_code' => $bookingpress_country_dial_code,
                        );

                        $bookingpress_update_where_condition = array(
                        'bookingpress_customer_id' => $bookingpress_update_id,
                        );

                        $wpdb->update($tbl_bookingpress_customers, $bookingpress_update_fields, $bookingpress_update_where_condition);

                        $BookingPress->update_bookingpress_customersmeta($bookingpress_update_id, 'customer_note', $bookingpress_note);

                        do_action('bookingpress_after_update_customer', $bookingpress_update_id);

                        do_action('bookingpress_after_update_bookingpress_customer', $bookingpress_update_id); 
                        
                        
                        $response['customer_id'] = $bookingpress_update_id;
                        $response['wpuser_id']   = $bookingpress_existing_user_id;
                        $response['variant']     = 'success';
                        $response['title']       = esc_html__('Success', 'bookingpress-appointment-booking');
                        $response['msg']         = esc_html__('Customer has been updated succsssfully.', 'bookingpress-appointment-booking');
                    }
                }

                $user_image_details = array();
                if (! empty($_REQUEST['avatar_name']) && ! empty($_REQUEST['avatar_url']) ) {
                    $user_img_url  = esc_url_raw($_REQUEST['avatar_url']); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash
                    $user_img_name = sanitize_file_name($_REQUEST['avatar_name']); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash

                    $bookingpress_get_existing_avatar_details = $BookingPress->get_bookingpress_customersmeta($bookingpress_update_id, 'customer_avatar_details');
                    $bookingpress_get_existing_avatar_details = ! empty($bookingpress_get_existing_avatar_details) ? maybe_unserialize($bookingpress_get_existing_avatar_details) : array();
                    $bookingpress_get_existing_avatar_url     = ! empty($bookingpress_get_existing_avatar_details[0]['url']) ? $bookingpress_get_existing_avatar_details[0]['url'] : '';

                    if ($user_img_url != $bookingpress_get_existing_avatar_url ) {
                        global $BookingPress;
                        $upload_dir                 = BOOKINGPRESS_UPLOAD_DIR . '/';
                        $bookingpress_new_file_name = current_time('timestamp') . '_' . $user_img_name;
                        $upload_path                = $upload_dir . $bookingpress_new_file_name;
                        /* $bookingpress_upload_res    = $BookingPress->bookingpress_file_upload_function($user_img_url, $upload_path); */

                        $bookingpress_upload_res = new bookingpress_fileupload_class( $user_img_url, true );
                        $bookingpress_upload_res->check_cap          = true;
                        $bookingpress_upload_res->check_nonce        = true;
                        $bookingpress_upload_res->nonce_data         = isset($_REQUEST['_wpnonce']) ? sanitize_text_field($_REQUEST['_wpnonce']) : '';
                        $bookingpress_upload_res->nonce_action       = 'bpa_wp_nonce';
                        $bookingpress_upload_res->check_only_image   = true;
                        $bookingpress_upload_res->check_specific_ext = false;
                        $bookingpress_upload_res->allowed_ext        = array();
                        $upload_response = $bookingpress_upload_res->bookingpress_process_upload( $upload_path );

                        if( true == $upload_response ){

                            $user_image_new_url   = BOOKINGPRESS_UPLOAD_URL . '/' . $bookingpress_new_file_name;
                            $user_image_details[] = array(
                            'name' => $bookingpress_new_file_name,
                            'url'  => $user_image_new_url,
                            );

                            $BookingPress->update_bookingpress_customersmeta($bookingpress_update_id, 'customer_avatar_details', maybe_serialize($user_image_details));

                            $bookingpress_file_name_arr = explode('/', $user_img_url);
                            $bookingpress_file_name     = $bookingpress_file_name_arr[ count($bookingpress_file_name_arr) - 1 ];
                            if( file_exists( BOOKINGPRESS_TMP_IMAGES_DIR . '/' . $bookingpress_file_name ) ){
                                @unlink(BOOKINGPRESS_TMP_IMAGES_DIR . '/' . $bookingpress_file_name);
                            }

                            if (! empty($bookingpress_get_existing_avatar_url) ) {
                                // Remove old image and upload new image
                                $bookingpress_file_name_arr = explode('/', $bookingpress_get_existing_avatar_url);
                                $bookingpress_file_name     = $bookingpress_file_name_arr[ count($bookingpress_file_name_arr) - 1 ];
                                if( file_exists( BOOKINGPRESS_UPLOAD_DIR . '/' . $bookingpress_file_name ) ){   
                                    @unlink(BOOKINGPRESS_UPLOAD_DIR . '/' . $bookingpress_file_name);
                                }
                            }
                        }
                    }
                } else {
                    $BookingPress->update_bookingpress_customersmeta($bookingpress_update_id, 'customer_avatar_details', maybe_serialize($user_image_details));
                }
            }
        }
        
        
        
        
        /**
         * Ajax Request to Save a Record Of the Selected Patient's Medical History
         *
         * @return void
         */
        function bp_hc_save_patient_history_record()
        {
            global $wpdb, $BookingPress, $tbl_bookingpress_customers, $BookingPressPro, $bookingpress_pro_staff_members;
            $response                = array();

            $response['consulta_id'] = '';
            $response['variant']     = 'error';
            $response['title']       = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']         = esc_html__('Something went wrong..', 'bookingpress-appointment-booking') . ' - Codigo error:1';
            
            
            $current_user_id        = get_current_user_id();
            
            #$wordpress_user = wp_get_current_user();
            #print_r( $wordpress_user );
            
            
            $current_staffmember_id = $bookingpress_pro_staff_members->bookingpress_get_staffmember_id_using_wp_user_id( $current_user_id );
            
            $authorizar_staff_role = $BookingPressPro->bookingpress_check_user_role( 'bookingpress-staffmember' );
            if(!$authorizar_staff_role){
                $authorizar_staff_role = current_user_can('bookingpress_add_staffmembers') || current_user_can('bookingpress_staff_members')? 1:0;
            }
            //current_user_can('bookingpress_add_staffmembers'), current_user_can('bookingpress_staff_members')
            
            
            if( !$current_staffmember_id && !$authorizar_staff_role ){
                $response['msg'] = 'No eres medico? No tienes permisos para realizar esta accion!';
                wp_send_json($response);
                exit;
            }
            
            /** SALGOOO AL ENTRAR NOMAS */
            //wp_send_json($response);
            //die();
            /**
            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_customers', true, 'nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }
            */
            
            

            if (! empty($_REQUEST) ){
                global $bookingPress_Expansion;
  
                $history_data = [];
                
                $record_data = json_decode( stripcslashes( $_REQUEST['record_data']),true );
                //echo '{}';
                #print_r( $record_data);
                
                $_REQUEST = $record_data;
                
                $date = date("Y-m-d");
                $time = date("H:i");
                
                $id = !empty($_REQUEST['id']) ? $_REQUEST['id']: 0;
                $update_id = ! empty($_REQUEST['update_id']) ? $_REQUEST['update_id']: 0;
                                
                $bookingpress_staff_member_id   = ! empty($_REQUEST['bookingpress_staff_member_id']) ? absint($_REQUEST['bookingpress_staff_member_id']):0;
                $bookingpress_appointment_id    = ! empty($_REQUEST['bookingpress_appointment_id']) ? absint($_REQUEST['bookingpress_appointment_id']):0;
                $bookingpress_customer_id       = ! empty($_REQUEST['bookingpress_customer_id']) ? absint($_REQUEST['bookingpress_customer_id']):0;
                
                if(!$bookingpress_customer_id){
                    $response['msg'] = 'Paciente es requerido! ';
                    wp_send_json($response);
                    die();
                }
                if( $bookingpress_appointment_id ){
                    $appoint_data = $this->bphc_getAppointmentDataByID( $bookingpress_appointment_id );
                    if(!empty($appoint_data) && ( $bookingpress_staff_member_id != absint($appoint_data['bookingpress_staff_member_details']['bookingpress_staffmember_id']) || $bookingpress_customer_id != $appoint_data['customer_id'] )){
                        $response['msg'] = 'Medico y/o Paciente No estan vinculados con el turno indicado!';
                        wp_send_json($response);
                        die();
                    }
                }
                #print(' general :<br> ');
                
                
                
                $staff_member_name         = ! empty($_REQUEST['staff_member_name']) ? trim(sanitize_text_field($_REQUEST['staff_member_name'])) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $service_name          = ! empty($_REQUEST['service_name']) ? trim(sanitize_text_field($_REQUEST['service_name'])) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                $service_id          = ! empty($_REQUEST['service_id']) ? absint($_REQUEST['service_id']) : 0; 
                
                $consultorio    = ! empty($_REQUEST['consultorio']) ? trim(sanitize_text_field($_REQUEST['consultorio'])) : 'consulta'; // phpcs:ignore WordPress.Security.NonceVerification
                
                $tags    = ! empty($_REQUEST['tags']) ? trim(sanitize_text_field($_REQUEST['tags'])) : ''; // phpcs:ignore WordPress.Security.NonceVerification
                
                $general = ! empty($_REQUEST['general']) ?  $_REQUEST['general'] : [];
                $general = is_array($general)? $general : json_decode($general, true);
                                
                $archivos = ! empty($_REQUEST['archivos']) ? $_REQUEST['archivos'] : ( !empty($general['archivos'])? $general['archivos']:[]);
                    if( !empty($general['archivos']) ) unset ( $general['archivos'] );
                $archivos = is_array($archivos)? $archivos : json_decode($archivos, true);
                
                
                $vitales = ! empty($_REQUEST['vitales']) ? $_REQUEST['vitales'] : [];
                $vitales = is_array($vitales)? $vitales : json_decode($vitales, true);
                
                $medicamentos = ! empty($_REQUEST['medicamentos']) ? $_REQUEST['medicamentos'] : [];
                $medicamentos = is_array($medicamentos)? $medicamentos : json_decode($medicamentos, true);
                
                $antecedentes = ! empty($_REQUEST['antecedentes']) ? $_REQUEST['antecedentes'] : [];
                $antecedentes = is_array($antecedentes)? $antecedentes : json_decode($antecedentes, true);
                
                $alergias = ! empty($_REQUEST['alergias']) ? $_REQUEST['alergias'] : [];
                $alergias = is_array($alergias)? $alergias : json_decode($alergias, true);
                
                #var_dump($antecedentes); exit; 
                /* PARA GUARDAR EN LA TABLA CONSULTAS */
                #$general = json_encode($general);
                #$raw = json_encode($record_data);
                $raw = array_diff_key( $record_data, ['id'=>'','update_id'=>'', 'raw'=>'', 'is_block_service'=> '', 'yearShow'=>''] );
                unset( $record_data );
                
                
                $id = absint($id);
                $update_id = absint($update_id);
                                
                $id = $update_id? $update_id:$id;
                
                /** to_db_id  Consulta_id */
                $consulta_id = $id = $id? $id : 'NULL';
                                
                //---Compactamos casi todo para la tabla Consultas ( Historias Clinicas Principal )---
                $history_data = compact(
                    'id',
                    'update_id',
                    'date',
                    'time',
                    'bookingpress_appointment_id',
                    'bookingpress_customer_id',
                    'bookingpress_staff_member_id',
                    'staff_member_name',
                    'service_name',
                    'service_id',
                    'consultorio',
                    'general',
                    'vitales',
                    'archivos',
                    'medicamentos',
                    'antecedentes',
                    'alergias',
                    'tags',
                    'raw'
                );
                
                
                $tabla_consultas = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['consultas'];
                $tabla_antecedentes = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['antecedentes'];
                $tabla_medicamentos = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['medicamentos'];
                $tabla_alergias = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['alergias'];
                
                
                /**
                $sql = " 
                INSERT INTO `$tabla_consultas` 
                (`id`, `bookingpress_appointment_id`, 
                `bookingpress_customer_id`, `bookingpress_staff_member_id`, 
                `staff_member_name`, `service_name`, `consultorio`, `date`, `time`, 
                `general`, `archivos`, `raw`, `tags`) 
                VALUES 
                ($consulta_id, $bookingpress_appointment_id, $bookingpress_customer_id, 
                $bookingpress_staff_member_id, $staff_member_name, $service_name, 
                $consultorio, $date, $time, $general, $archivos, $raw, $tags)
                ";
                */
                
                if( !absint($consulta_id) ){
                    /** `created_at` AUTOMATICO ( NOW() ) */
                    
                    $result = $wpdb->insert($tabla_consultas, [
                        'id'=>$consulta_id,
                        'bookingpress_appointment_id' => $bookingpress_appointment_id,
                        'bookingpress_customer_id' => $bookingpress_customer_id,
                        'bookingpress_staff_member_id' => $bookingpress_staff_member_id,
                        'staff_member_name' => $staff_member_name,
                        'service_name' => $service_name,
                        'service_id' => $service_id,
                        'consultorio' => $consultorio,
                        'date' => $date,
                        'time' => $time,
                        'general' => json_encode($general),
                        'vitales' => json_encode($vitales),
                        'archivos' => json_encode($archivos),
                        'tags' => $tags,
                        'raw' => json_encode($raw),
                    ]);
                                                
                    
                    
                    #Liberando un poco de memoria; 
                    unset($raw, $general, $archivos, $vitales);
                    
                    if(!$result || is_wp_error($result) ){
                        
                        $response['msg'] = 'Error, No se pudo guardar su registro.' . $wpdb->last_error;
                    }else{
                        $consulta_id = $update_id = $wpdb->insert_id;
                        $history_data = array_merge($history_data, array('id'=>$consulta_id, 'update_id'=>$update_id ));
                        $response['variant'] = 'success';
                        $response['title'] = 'Exito ';
                        $response['msg'] = 'Felicitaciones, su registro se ha guardado con exito! #'.$consulta_id;
                        $response['consulta_id'] = $consulta_id;
                        $response['record_data'] = $history_data;
                        $response['resultado_sentencia'] = $result;
                        
                                          
                        
                    }
                }else{
                    /** TESTEAMOS UPDATE */
                    // unset($raw); //POR AHORA ASI LUEGO TALVEZ PROBAMOS MANTENER EL RAW ORIGINAL 
                    $response['consulta_id'] = $consulta_id;
                    
                    $history_member = $wpdb->get_var("SELECT bookingpress_staff_member_id as history_member From `$tabla_consultas` WHERE id='$consulta_id' ");
                    $response['author'] = $history_member;
                    if( $current_staffmember_id != $history_member ){
                        $response['msg'] = 'No tienes permiso para editar el registro. ( No eres el autor del registro )';
                    }else{ //SI es el staff id
                    
                        $result = $wpdb->update($tabla_consultas, [
                            
                            'bookingpress_appointment_id' => $bookingpress_appointment_id,
                            'bookingpress_customer_id' => $bookingpress_customer_id,
                            'bookingpress_staff_member_id' => $bookingpress_staff_member_id,
                            'staff_member_name' => $staff_member_name,
                            'service_name' => $service_name,
                            'consultorio' => $consultorio,
                            //'date' => $date, //MANTENEMOS LA FECHA --- VERIFICAR SI `CREATE_AT` SE MODIFICA y se usa como fecha de modificacion o se agrega el campo.
                            //'time' => $time,
                            'general' => json_encode($general),
                            'vitales' => json_encode($vitales),
                            'archivos' => json_encode($archivos),
                            'tags' => $tags,
                            'raw' => json_encode($raw), //ESTE RAW VA COMENTADO SI SE QUIERE MANTENER COPIA ORIGINAL
                        ], ['id'=>$consulta_id]);
                        
                        #Liberando un poco de memoria; 
                        unset($raw, $general, $archivos, $vitales);
                        #########################################
                        ####echo "/*INICIANDO UPDATE */ ";
                        
                        if( is_wp_error($result) ){
                            #$response['consulta_id'] = $consulta_id;
                            $response['msg'] = 'Error, No se pudo guardar su actualizacion de registro.' . $result->get_error_message();
                        }else{
                            
                            if(!$result){
                                //Sin Cambios en tabla Consultas pero posibles cambios en las otras tablas.
                                $response['msg'] = " registro #{$consulta_id} se ha actualizado.";
                                $response['variant'] = 'success';
                                $response['title'] = 'Exito ';
                            }else{
                                #$response['consulta_id'] = $consulta_id;
                                $response['variant'] = 'success';
                                $response['title'] = 'Exito ';
                                $response['msg'] = "Su registro #{$consulta_id} se ha actualizado.";
                            
                            }
                        }
                    }//Fin else-si distinto staffmember
                    
                }
                
                                
                $check_current_staff = !empty($history_member)? $history_member==$current_staffmember_id : 1;
                $response['check_current_staff'] = $check_current_staff;
                $consulta_id = absint($consulta_id);
                if($consulta_id && $check_current_staff){
                    /** CONTINUAMOS CON LAS DEMAS TABLAS EN BASE A AL ID DE CONSULTA GENERADO o yA EXISTENTE */
                    $where_consulta_id = " `consulta_id` = {$consulta_id} ";
                    
                    
                    $tabla_medicamentos = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['medicamentos'];
                    $wpdb->delete($tabla_medicamentos, ['consulta_id' => $consulta_id]);
                    
                    $med_result = 0;
                    foreach( $medicamentos as $medicamento ){
                        
                        $medicamentos_to_db = [
                        'bookingpress_customer_id' => $bookingpress_customer_id,
                        'consulta_id' => $consulta_id,
                        'bookingpress_appointment_id' => $bookingpress_appointment_id,
                        'fecha' => !empty($medicamento['fecha'])? sanitize_text_field($medicamento['fecha']) : $date,
                        'nombre_medicamento' => !empty($medicamento['nombre'])? sanitize_text_field($medicamento['nombre']) :'',
                        'dosis' => !empty($medicamento['dosis'])? sanitize_text_field($medicamento['dosis']) :'',
                        'frecuencia' => !empty($medicamento['frecuencia'])? sanitize_text_field($medicamento['frecuencia']) :'',
                        'hasta' => !empty($medicamento['hasta'])? sanitize_text_field($medicamento['hasta']) :'',
                        ];
                        if(empty($medicamentos_to_db['hasta'])) $medicamentos_to_db['hasta'] = $medicamentos_to_db['fecha'];
                        
                        if($wpdb->insert($tabla_medicamentos, $medicamentos_to_db )) $med_result++;
                    }
                    
                    ###$response['msg'] .= $med_result? " \r\n $med_result medicamentos almacenados,\r\n ": " \r\n no se almaceno medicamentos,\r\n ";
                    
                    
                    $tabla_antecedentes = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['antecedentes'];
                    $wpdb->delete($tabla_antecedentes, ['consulta_id' => $consulta_id]);
                    
                    $ant_result = 0;
                    #print_r($antecedentes); exit();
                    
                    foreach( $antecedentes as $antecedente ){
                        
                            if( empty($antecedente['descripcion']) ) continue;
                            $antecedentes_to_db = [
                            'bookingpress_customer_id' => $bookingpress_customer_id,
                            'consulta_id' => $consulta_id,
                            'bookingpress_appointment_id' => $bookingpress_appointment_id,
                            'tipo' => !empty( $antecedente['tipo'] )? ($antecedente['tipo']=='familiar'? 'familiar' : 'personal') : 'personal',//ENUM('personal', 'familiar')
                            'descripcion' => !empty($antecedente['descripcion'])? sanitize_text_field($antecedente['descripcion']) :'',
                            'detalle' => !empty($antecedente['detalle'])? sanitize_text_field($antecedente['detalle']) :'',
                            'fecha' => $date
                            ];
                            
                            if($wpdb->insert($tabla_antecedentes, $antecedentes_to_db)) $ant_result++;
                    }
                    
                    /** Guardado si estaba ordenado por tipo
                    foreach( $antecedentes as $tipo => $lista ){
                        foreach( $lista as $antecedente ){
                            if( empty($antecedente['descripcion']) ) continue;
                            $antecedentes_to_db = [
                            'bookingpress_customer_id' => $bookingpress_customer_id,
                            'consulta_id' => $consulta_id,
                            'bookingpress_appointment_id' => $bookingpress_appointment_id,
                            'tipo' => ($tipo=='familiar')? 'familiar': 'personal',//ENUM('personal', 'familiar')
                            'descripcion' => !empty($antecedente['descripcion'])? sanitize_text_field($antecedente['descripcion']) :'',
                            'detalle' => !empty($antecedente['detalle'])? sanitize_text_field($antecedente['detalle']) :'',
                            'fecha' => $date
                            ];
                            
                            if($wpdb->insert($tabla_antecedentes, $antecedentes_to_db)) $ant_result++;
                        }
                    }
                    */
                    /** FALTA A-N-T-E-C-E-D-E-N-T-E-S  EN FORMULARIO */
                    ####$response['msg'] .= $ant_result? " \r\n $ant_result antecedentes almacenados,\r\n ": " \r\n no se almaceno antecedentes,\r\n ";
                    
                    /**
                    $ant_result = 0;
                    $antecedente_row = $wpdb->get_row("SELECT id, consulta_id FROM {$tabla_antecedentes} WHERE $where_consulta_id LIMIT 1; ", ARRAY_A);
                    if( empty($antecedente_row) ){
                        //INSERT
                        $ant_result = $wpdb->insert($tabla_antecedentes, $antecedentes_to_db);
                        $response['msg'] .= !$ant_result? " \n[antecedente no generado]\n ": " \n[antecedente generado]\n ";
                    }else{
                        //UPDATE
                        $ant_result = $wpdb->update($tabla_antecedentes, $antecedentes_to_db, $antecedente_row);
                        $response['msg'] .= !$ant_result? " \n[antecedente no actualizado]\n ": " \n[antecedente actualizado]\n ";
                    }
                    */
                    
                    
                    $tabla_alergias = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['alergias'];
                    $wpdb->delete($tabla_alergias, ['consulta_id' => $consulta_id]);
                    
                    $alerg_result = 0;
                    foreach( $alergias as $alergia ){
                        
                        $alergias_to_db = [
                        'bookingpress_customer_id' => $bookingpress_customer_id,
                        'consulta_id' => $consulta_id,
                        'bookingpress_appointment_id' => $bookingpress_appointment_id,
                        'alergia' => !empty($alergia['alergia'])? sanitize_text_field($alergia['alergia']) :'',
                        'reaccion_o_motivo' => !empty($alergia['reaccion_o_motivo'])? sanitize_text_field($alergia['reaccion_o_motivo']) :'',
                        'fecha' => !empty($alergia['fecha'])? sanitize_text_field($alergia['fecha']) : $date,
                        ];
                        
                        if($wpdb->insert($tabla_alergias, $alergias_to_db )) $alerg_result++;
                    }
                    /** FALTA A-L-E-R-G-I-A-S  EN FORMULARIO */
                    #######$response['msg'] .= $alerg_result? " \r\n $alerg_result alergias almacenadas. \r\n ": " \r\n no se almaceno alergias.\r\n ";
                    
                }
                
                
                //if($med_result || $ant_result || $alerg_result) $response['msg'] = str_replace('No se han realizado cambios.', ' ', $response['msg']);
                
                #$result = $bookingPress_Expansion->guardar_consulta( $history_data );
                
                
                #wp_send_json( $history_data );
                
                #wp_send_json(array($authorizar_staff_role, $bookingpress_staff_member_id, $current_staffmember_id, $current_user_id, $general) );
                #exit;
                
            }

            wp_send_json($response);
            die();
        }
        
        /**
         * Ajax request for get edit customer details
         *
         * @return void
         */
        function bookingpress_get_edit_user_details()
        {
            global $wpdb, $tbl_bookingpress_customers, $BookingPress;

            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_customers', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            $response['variant']   = 'error';
            $response['title']     = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']       = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            $response['edit_data'] = array();
            if (! empty($_POST['edit_id']) ) { // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_edit_id               = intval($_POST['edit_id']); // phpcs:ignore WordPress.Security.NonceVerification
                $bookingpress_edit_customer_details = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$tbl_bookingpress_customers} WHERE bookingpress_customer_id = %d ORDER BY bookingpress_customer_id DESC", $bookingpress_edit_id), ARRAY_A); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- Reason: $tbl_bookingpress_customers is table name defined globally. False Positive alarm
                if (! empty($bookingpress_edit_customer_details) ) {
                    $bookingpress_wpuser_id = $bookingpress_edit_customer_details['bookingpress_wpuser_id'];
                    if (! empty($bookingpress_wpuser_id) ) {
                        $bookingpress_edit_customer_details['bookingpress_wpuser_id'] = $data = ! empty(get_user_by('ID', $bookingpress_wpuser_id)) ? $bookingpress_wpuser_id : '';
                    } else {
                        $bookingpress_edit_customer_details['bookingpress_wpuser_id'] = '';
                    }
                    $bookingpress_edit_customer_details['bookingpress_user_name'] = stripslashes_deep($bookingpress_edit_customer_details['bookingpress_user_name']);
                    $bookingpress_edit_customer_details['bookingpress_user_firstname'] = stripslashes_deep($bookingpress_edit_customer_details['bookingpress_user_firstname']);
                    $bookingpress_edit_customer_details['bookingpress_user_lastname'] = stripslashes_deep($bookingpress_edit_customer_details['bookingpress_user_lastname']);
                    $bookingpress_edit_customer_details['bookingpress_user_email'] = stripslashes_deep($bookingpress_edit_customer_details['bookingpress_user_email']); 

                    // Get customers meta details
                    // $bookingpress_customer_gender    = get_user_meta( $bookingpress_wpuser_id, 'gender', true );
                    // $bookingpress_customer_birthdate = get_user_meta( $bookingpress_wpuser_id, 'birthdate', true );

                    $bookingpress_customer_note_data                   = $BookingPress->get_bookingpress_customersmeta($bookingpress_edit_id, 'customer_note');
                    $bookingpress_edit_customer_details['note']        = stripslashes_deep($bookingpress_customer_note_data);
                    $bookingpress_get_existing_avatar_list             = $BookingPress->get_bookingpress_customersmeta($bookingpress_edit_id, 'customer_avatar_details');

                    //$bookingpress_edit_customer_details['avatar_list'] = $bookingpress_get_existing_avatar_list;

                    $bookingpress_get_existing_avatar_list             = ! empty($bookingpress_get_existing_avatar_list) ? maybe_unserialize($bookingpress_get_existing_avatar_list) : array();
                    $bookingpress_edit_customer_details['avatar_name'] = ! empty($bookingpress_get_existing_avatar_list[0]['name']) ? $bookingpress_get_existing_avatar_list[0]['name'] : '';
                    $bookingpress_edit_customer_details['avatar_url']  = ! empty($bookingpress_get_existing_avatar_list[0]['url']) ? $bookingpress_get_existing_avatar_list[0]['url'] : '';

                    // $bookingpress_edit_customer_details['gender']    = ! empty( $bookingpress_customer_gender ) ? $bookingpress_customer_gender : '';
                    // $bookingpress_edit_customer_details['birthdate'] = ! empty( $bookingpress_customer_birthdate ) ? $bookingpress_customer_birthdate : '';
                    if(!empty($bookingpress_wpuser_id)) {
                        $user_data = '';                    
                        $user_data = get_userdata($bookingpress_wpuser_id);                    
                        if(!empty($user_data)) {                        
                            $bookingpress_existing_user_data[] = array(
                                'category' => __('Select Existing User','bookingpress-appointment-booking'),
                                'wp_user_data' => array(
                                    array(
                                        'value' => $user_data->ID,				
                                        'label' => $user_data->user_login,
                                    )
                                ),
                            );
                            $bookingpress_edit_customer_details['wp_user_list'] = $bookingpress_existing_user_data;                    
                        }
                    }    
                    $bookingpress_edit_customer_details['bpa_wp_nonce'] = wp_create_nonce('bpa_wp_nonce');
                    $bookingpress_edit_customer_details = apply_filters( 'bookingpress_modify_edit_customer_details', $bookingpress_edit_customer_details, $bookingpress_edit_id );

                    $response['edit_data'] = $bookingpress_edit_customer_details;
                    $response['msg']       = esc_html__('Edit data retrieved successfully', 'bookingpress-appointment-booking');
                    $response['variant']   = 'success';
                    $response['title']     = esc_html__('Success', 'bookingpress-appointment-booking');

                }
            }

            echo wp_json_encode($response);
            exit();
        }

        
        /**
         * Delete customer function
         *
         * @param  mixed $delete_id   Customer ID which you want to delete
         * @return void
         */
        function bookingpress_delete_customer( $delete_id )
        {
            global $wpdb, $tbl_bookingpress_customers,$tbl_bookingpress_appointment_bookings,$tbl_bookingpress_payment_logs;
            $response              = array();

            $bpa_check_authorization = $this->bpa_check_authentication( 'delete_customer', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }
            
            $response['variant'] = 'error';
            $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']     = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            $return              = false;

            if (! empty($_POST['delete_id']) || intval($delete_id) ) { // phpcs:ignore WordPress.Security.NonceVerification
                $delete_customer_id = ! empty($_POST['delete_id']) ? intval($_POST['delete_id']) : intval($delete_id); // phpcs:ignore WordPress.Security.NonceVerification
                do_action('bookingpress_before_delete_customer', $delete_customer_id);
                if (! empty($delete_customer_id) ) {
                    $wpdb->delete( $tbl_bookingpress_customers, array( 'bookingpress_customer_id' => $delete_customer_id ) );
                    $wpdb->delete($tbl_bookingpress_appointment_bookings, array( 'bookingpress_customer_id' => $delete_customer_id ));
                    $wpdb->delete($tbl_bookingpress_payment_logs, array( 'bookingpress_customer_id' => $delete_customer_id ));

                    $response['variant'] = 'success';
                    $response['title']   = esc_html__('Success', 'bookingpress-appointment-booking');
                    $response['msg']     = esc_html__('Customer has been deleted successfully.', 'bookingpress-appointment-booking');

                    $return = true;
                }
            }
            

            if (! empty($_POST['action']) && sanitize_text_field($_POST['action']) == 'bookingpress_delete_customer' ) { // phpcs:ignore
                echo wp_json_encode($response);
                exit();
            }

            return $return;
        }

        
        /**
         * Customer module bulk actions
         *
         * @return void
         */
        function bookingpress_bulk_action()
        {
            global $BookingPress;
            $response              = array();

            $bpa_check_authorization = $this->bpa_check_authentication( 'delete_customer', true, 'bpa_wp_nonce' );
            
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json( $response );
                die;
            }

            $response['variant'] = 'error';
            $response['title']   = esc_html__('Error', 'bookingpress-appointment-booking');
            $response['msg']     = esc_html__('Something went wrong..', 'bookingpress-appointment-booking');
            if (! empty($_POST['bulk_action']) && sanitize_text_field($_POST['bulk_action']) == 'delete' ) { // phpcs:ignore
             // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized --Reason - $_REQUEST['delete_ids'] contains mixed array and it's been sanitized properly using 'appointment_sanatize_field' function
                $delete_ids = ! empty($_POST['delete_ids']) ? array_map(array( $BookingPress, 'appointment_sanatize_field' ), $_POST['delete_ids']) : array(); // phpcs:ignore
                if (! empty($delete_ids) ) {
                    foreach ( $delete_ids as $delete_key => $delete_val ) {
                        $delete_customer_id = $delete_val['customer_id'];
                        $return             = $this->bookingpress_delete_customer($delete_customer_id);
                        if ($return ) {
                            $response['variant'] = 'success';
                            $response['title']   = esc_html__('Success', 'bookingpress-appointment-booking');
                            $response['msg']     = esc_html__('Customer has been deleted successfully.', 'bookingpress-appointment-booking');
                        }
                    }
                }
            }
            echo wp_json_encode($response);
            exit();
        }
        
        /**
         * bp_hc_get_patient_history_records
         * Ajax Request to Get Medical History Records Of the Selected Patient
         * 
         */
        function bp_hc_get_patient_history_records(){
            $response = array(
                'variant' => 'error',
                'title' => esc_html__('Error', 'bookingpress-appointment-booking'),
                'msg' => '',
                'histories' => [],
            );
            
            if( empty($_REQUEST['_wpnonce']) ) $_REQUEST['_wpnonce'] = $_REQUEST['bpa_wp_nonce'];
            
            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_customers', true, 'bpa_wp_nonce' );
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json($response);
                die;
            }

            // TODO: Implement real fetching from DB using customer_id or DNI
            // $customer_id = !empty($_POST['customer_id']) ? intval($_POST['customer_id']) : 0; // phpcs:ignore
            // $dni = !empty($_POST['dni']) ? sanitize_text_field($_POST['dni']) : ''; // phpcs:ignore

            // For now, return an empty list so UI wiring works
            
            $customer_id = !empty($_REQUEST['customer_id'])? absint($_REQUEST['customer_id']):0;
            
            if(!$customer_id){
                $response['msg'] = "Se debe seleccionar un paciente.\nPaciente es requerido!";
                wp_send_json($response);
                die;
            }
            
            $requested_appointment_id = !empty($_REQUEST['appointment_id'])? absint($_REQUEST['appointment_id']):0;
            
            #***************************************************************************
            $perpage     = isset($_POST['perpage']) ? intval($_POST['perpage']) : 10; // phpcs:ignore WordPress.Security.NonceVerification
            $currentpage = isset($_POST['currentpage']) ? intval($_POST['currentpage']) : 1; // phpcs:ignore WordPress.Security.NonceVerification
            $offset      = ( ! empty($currentpage) && $currentpage > 1 ) ? ( ( $currentpage - 1 ) * $perpage ) : 0;
            
            $rango_fechas_sql = "";
            
            if (! empty($_REQUEST['selected_date_range']) ) {
                
                $rango_fechas         = json_decode(stripslashes($_REQUEST['selected_date_range']), true);
                $start_date                       = date('Y-m-d', strtotime($rango_fechas[0]));
                $end_date                         = date('Y-m-d', strtotime($rango_fechas[1]));
                $rango_fechas_sql .= " AND (c.created_at BETWEEN '".$start_date." 00:00:00' AND '".$end_date." 23:59:59')";
            }
            
            
            #*************************************
            global $wpdb, $bookingPress_Expansion;
            $tableConsultas = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['consultas'];
                $tabla_antecedentes = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['antecedentes'];
                $tabla_medicamentos = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['medicamentos'];
                $tabla_alergias = $wpdb->prefix . BookingPress_Expansion_Tables::$tables['alergias'];
                
            //SELECT *  FROM `wp_bphc_consultas` c left join (select consulta_id,JSON_ARRAYAGG(JSON_OBJECT('id',id)) as medicamentos from wp_bphc_medicamentos ) m ON c.id=m.consulta_id;
            /**
            "SELECT *, (select  JSON_ARRAYAGG(JSON_OBJECT(
                'id',id,
            	'consulta_id', consulta_id,
                'nombre',nombre_medicamento,
                'dosis',dosis,
                'frecuencia',frecuencia,
                'fecha',fecha,
                'hasta',hasta
            )) from wp_bphc_medicamentos WHERE consulta_id=c.id) medicamentos  FROM `wp_bphc_consultas` c;"
            */
            /**
            "SELECT *, 
            (select  JSON_ARRAYAGG(JSON_OBJECT(
                'id',id,
            	'consulta_id', consulta_id,
                'nombre',nombre_medicamento,
                'dosis',dosis,
                'frecuencia',frecuencia,
                'fecha',fecha
            )) from wp_bphc_medicamentos WHERE consulta_id=c.id) medicamentos, 
            (select  JSON_ARRAYAGG(JSON_OBJECT(
                'id',id,
            	'consulta_id', consulta_id,
                'alergia',alergia,
                'reaccion_o_motivo',reaccion_o_motivo,
                'fecha',fecha
            )) FROM `wp_bphc_alergias` WHERE consulta_id=c.id) alergias,
            (select  JSON_ARRAYAGG(JSON_OBJECT(
                'id',id,
            	'consulta_id', consulta_id,
                'tipo',tipo,
                'descripcion',descripcion,
                'detalle',detalle,
                'fecha',fecha
            )) FROM `wp_bphc_antecedentes` WHERE consulta_id=c.id) antecedentes 
            FROM `wp_bphc_consultas` c;"
            
            */
            
            #$joins = " LEFT JOIN `$tableConsultas` ";
            
            $total= false;
            $sql = "SELECT Count(id) total FROM `$tableConsultas` c WHERE bookingpress_customer_id='$customer_id' $rango_fechas_sql ORDER BY created_at DESC ";
                                    
            $result = $wpdb->get_results( $sql );
            if( !is_wp_error($result) ){
                $total = absint( ( is_array($result)? reset($result)->total : $result->total) );
            }
            
            $sql = "SELECT * FROM `$tableConsultas` c WHERE bookingpress_customer_id='$customer_id' $rango_fechas_sql ORDER BY created_at DESC LIMIT {$offset} , {$perpage}";
            
            // -- Nuava sentencia SQL -- incluye las tablas en formato json.
            $sql = "SELECT *, c.id update_id, 
            (select  JSON_ARRAYAGG(JSON_OBJECT(
                'id',id,
            	'consulta_id', consulta_id,
                'nombre',nombre_medicamento,
                'dosis',dosis,
                'frecuencia',frecuencia,
                'fecha',fecha,
                'hasta',hasta
            )) from `{$tabla_medicamentos}` WHERE consulta_id=c.id) medicamentos, 
            (select  JSON_ARRAYAGG(JSON_OBJECT(
                'id',id,
            	'consulta_id', consulta_id,
                'alergia',alergia,
                'reaccion_o_motivo',reaccion_o_motivo,
                'fecha',fecha
            )) FROM `{$tabla_alergias}` WHERE consulta_id=c.id) alergias,
            (select  JSON_ARRAYAGG(JSON_OBJECT(
                'id',id,
            	'consulta_id', consulta_id,
                'tipo',tipo,
                'descripcion',descripcion,
                'detalle',detalle,
                'fecha',fecha
            )) FROM `{$tabla_antecedentes}` WHERE consulta_id=c.id) antecedentes 
            FROM `{$tableConsultas}` c WHERE c.bookingpress_customer_id='{$customer_id}' {$rango_fechas_sql} ORDER BY c.created_at DESC LIMIT {$offset} , {$perpage};";
            
            
            $result = $wpdb->get_results( $sql );
            
            if( is_wp_error($result) ){
                $response['msg'] = 'Error al consultar datos. '.$result->get_error_message();
                wp_send_json($response);
                die;
            }else{
                
                $histories = array();
                
                #$histories = $result;
                
                $histories = $this->processHistoryResultDataHelper( $result );
                
                /**
                foreach($result as $k=> $data){
                    $raw = null;
                    $raw = json_decode( $data->raw, true );
                    if( $raw != null ){
                        extract($raw);
                        $raw['id'] = $raw['update_id'] = $data->id;
                        $general['vitales'] = $vitales;
                        
                        if(!empty($general['archivos']) ) $general['archivos'] = is_array($general['archivos'])? $general['archivos']: json_decode(stripcslashes($general['archivos']), true);
                        $raw['consultation_data'] = compact('general', 'vitales', 'medicamentos', 'atecedentes','archivos');
                        $raw = array_merge( $raw, $raw['consultation_data']);
                        $data->raw = $raw;
                        $histories[$k] = array_merge( (array) $data, $raw['consultation_data'],  $raw);
                        
                         $histories[$k]['archivos'] = is_array($histories[$k]['archivos'])? $histories[$k]['archivos']: json_decode(stripcslashes($histories[$k]['archivos']), true);
                    }
                    
                }*/
                
                unset( $result );            
                global $bookingpress_pro_appointment, $bookingpress_pro_staff_members, $tbl_bookingpress_appointment_bookings;
                
                $current_user_id        = get_current_user_id();
                $current_staffmember_id = $bookingpress_pro_staff_members->bookingpress_get_staffmember_id_using_wp_user_id( $current_user_id );
                
                $response = array(
                'variant' => 'success',
                'title' => esc_html__('Success', 'bookingpress-appointment-booking'),
                'msg' => '',
                'histories' => $histories,
                'historiesTotal' => $total!==false? $total : 0,                
                );
                
                if($requested_appointment_id){
                    $historyAppointment = [];
                    $historyAppointment = $wpdb->get_row($wpdb->prepare("SELECT 
                    bookingpress_appointment_booking_id as bookingpress_appointment_id, bookingpress_booking_id as booking_id,bookingpress_customer_id customer_id, bookingpress_customer_firstname as customer_firstname, bookingpress_customer_lastname as customer_lastname, bookingpress_service_id as service_id, bookingpress_service_name as service_name, bookingpress_staff_member_details
                    FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_appointment_booking_id = %d  ", $requested_appointment_id), ARRAY_A);
                    if( !empty($historyAppointment) ){
                            $historyAppointment['bookingpress_staff_member_details'] = json_decode(stripslashes($historyAppointment['bookingpress_staff_member_details']), true);//bookingpress_staffmember_id
                            
                            if( $current_staffmember_id == absint($historyAppointment['bookingpress_staff_member_details']['bookingpress_staffmember_id']) ){
                                #$historyAppointment['form_fields'] = $bookingpress_pro_appointment->bookingpress_get_appointment_form_field_data($requested_appointment_id);
                                unset($historyAppointment['bookingpress_staff_member_details']);
                                $historyAppointment['bookingpress_staff_member_id'] = $current_staffmember_id;
                                $historyAppointment['update_id'] = 0;
                                
                                #$selectedHistory = $wpdb->get_row($wpdb->prepare("SELECT * FROM `$tableConsultas` c WHERE bookingpress_appointment_id = %d LIMIT 1", $requested_appointment_id), ARRAY_A);
                                
                                $selectedHistory = $wpdb->get_row($wpdb->prepare("SELECT *, c.id update_id, 
                                (select  JSON_ARRAYAGG(JSON_OBJECT(
                                    'id',id,
                                	'consulta_id', consulta_id,
                                    'nombre',nombre_medicamento,
                                    'dosis',dosis,
                                    'frecuencia',frecuencia,
                                    'fecha',fecha,
                                    'hasta',hasta
                                )) from `{$tabla_medicamentos}` WHERE consulta_id=c.id) medicamentos, 
                                (select  JSON_ARRAYAGG(JSON_OBJECT(
                                    'id',id,
                                	'consulta_id', consulta_id,
                                    'alergia',alergia,
                                    'reaccion_o_motivo',reaccion_o_motivo,
                                    'fecha',fecha
                                )) FROM `{$tabla_alergias}` WHERE consulta_id=c.id) alergias,
                                (select  JSON_ARRAYAGG(JSON_OBJECT(
                                    'id',id,
                                	'consulta_id', consulta_id,
                                    'tipo',tipo,
                                    'descripcion',descripcion,
                                    'detalle',detalle,
                                    'fecha',fecha
                                )) FROM `{$tabla_antecedentes}` WHERE consulta_id=c.id) antecedentes 
                                FROM `{$tableConsultas}` c WHERE c.bookingpress_appointment_id = %d  LIMIT 1 ;", $requested_appointment_id), ARRAY_A);
                                
                                
                                
                                if( $selectedHistory ){
                                    $selectedHistory = reset($this->processHistoryResultDataHelper( [$selectedHistory] ));
                                                                       
                                    $historyAppointment = array_merge( $historyAppointment, $selectedHistory );
                                }
                                $historyAppointment['update_id'] = !empty($historyAppointment['update_id'])? absint($historyAppointment['update_id']):( absint($historyAppointment['id'])? absint($historyAppointment['id']) : 0);
                                
                                $response['historyAppointment'] = !empty($historyAppointment)? $historyAppointment : [];
                            }else{
                                $response['historyAppointment'] = false;
                                $response['historyAppointmentMSG'] = 'Parece que el turno solicitado pertenece a otro medico.';
                            }
                    
                    
                    
                    }
                    #print_r( 'appid:'.$requested_appointment_id .'\n');
                    #print_r($historyAppointment);
                    
                }
                
            }
            
           /**
            $response['histories'] = ([

                    (object) [
                            "id"    => "1",
                            "update_id" => "0",
                            "date"  => "2025-09-01",
                            "time"  => "09:00",
                            "bookingpress_appointment_id"   => "1",
                            "bookingpress_customer_id"      => "1",
                            "bookingpress_staff_member_id"  => "3",
                            "staff_member_name" => "JoseTest",
                            "service_name"      => "Cardiología",
                            "consultation_data" => [
                                    "general" =>[
                            			"motivoConsulta" => "cliente dice dolor",
                            			"diagnostico" => "no tiene nada",
                            			"tratamiento" => "ninguno - no tiene nada",
                            			"notas" => "Este viene a joder 2 x 3 Y alguna otra vez (actualizado)",
                                        "archivos" => [ array("name" =>"Anasilis.jpg","size"=>"50000","type"=>"jpg","url"=>'https://foatconcept.com.ar/turnos/wp-content/uploads/bookingpress/1757597662_1757597657_descarga_avatar.png') ]
                                    ],
                                	"vitales" =>[
                                        "altura" =>"",
                                        "peso" =>"",
                                        "imc" =>"",
                                		"presionArterial" =>"",
                                		"frecuenciaCardiaca" =>"",
                                		"frecuenciaRespiratoria" =>"",
                                		"temperatura" =>"",
                                		"saturacionOxigeno" =>""
                                	],
                                	"antecedentes" =>[
                                		"personales" =>[["a"=>"Traumatismo","motivo"=>"se pego en la cabeza."],["a"=>"Colicos","motivo"=>"comio achuras."]],
                                		"familiares" =>[["a"=>"Diabetes","motivo"=>"abuelo pat."]],
                                	],
                                	"medicamentos" =>[
                                		["nombre" =>"ibuprofeno","dosis" =>"2","frecuencia" =>"8hs", "fecha"=>"2025/03/14","size"=>""],
                                        ["nombre" =>"antibiotico","dosis" =>"1","frecuencia" =>"12hs", "fecha"=>"2025/03/14","size"=>"","url"=>'https://cdn.prod.website-files.com/5dd6c916acc1cc42476f2149/60a9af48c867f6ee401a48e1_Nimbo%20nueva%20funcionalidad%20template%202020-01.png']
                                	]
                                
                            ]
                    ]
                ]);
                */
                
            
            
            wp_send_json($response);
            die;
        }
        
        public function processHistoryResultDataHelper( $result = [] ){
                $histories = [];
                
                    foreach($result as $k=> $data){
                        $data = (array) $data;
                                                
                        #$data['update_id'] = $data['id'];
                        $data['general'] = !empty($data['general'])? (is_array($data['general'])? $data['general']: json_decode($data['general'], true)):[];
                        $data['vitales'] = !empty($data['vitales'])? (is_array($data['vitales'])? $data['vitales']: json_decode($data['vitales'], true)):[];
                        $data['archivos'] = !empty($data['archivos'])? (is_array($data['archivos'])? $data['archivos']: json_decode(stripcslashes($data['archivos']), true)): [];
                        $data['medicamentos'] = !empty($data['medicamentos'])? (is_array($data['medicamentos'])? $data['medicamentos']: json_decode($data['medicamentos'], true)):[];
                        $data['antecedentes'] = !empty($data['antecedentes'])? (is_array($data['antecedentes'])? $data['antecedentes']: json_decode($data['antecedentes'], true)):[];
                        $data['alergias'] = !empty($data['alergias'])? (is_array($data['alergias'])? $data['alergias']: json_decode($data['alergias'], true)):[];
                        
                        if( empty($data['general']) ) $data['general'] = (object)[];
                        if( empty($data['vitales']) ) $data['vitales'] = (object)[];
                        
                        $raw = null;
                        $raw = json_decode($data['raw'], true);
                        $data['raw'] = is_array($raw)? array_intersect_key($raw, array_flip(['booking_id'])) : (object)[];
                        /*
                        if( is_array($raw) ){
                            
                            extract($raw);
                            $raw['id'] = $raw['update_id'] = $data['id'];
                            $general['vitales'] = $vitales;
                            
                            if(!empty($general['archivos']) ) $general['archivos'] = is_array($general['archivos'])? $general['archivos']: json_decode(stripcslashes($general['archivos']), true);
                            $raw['consultation_data'] = compact('general', 'vitales', 'medicamentos', 'atecedentes','archivos');
                            $raw = array_merge( $raw, $raw['consultation_data']);
                            
                            $data['raw'] = $raw;
                        }
                        */
                        #print_r($data); exit ;
                        $histories[$k] = (array) $data;
                        $histories[$k]['indx'] = $k+1;
                                                
                    }
                
                
        return $histories;
        }
        
        
        /**
         * Ajax: Find a customer by DNI (normalized). Returns single customer or null
         */
        function bookingpress_find_customer_by_dni(){
            $response = array(
                'variant' => 'success',
                'title' => esc_html__('Success', 'bookingpress-appointment-booking'),
                'msg' => '',
                'items' => [],
                'total' => 0
                
            );
            $_REQUEST['_wpnonce'] = $_REQUEST['bpa_wp_nonce'];
            $bpa_check_authorization = $this->bpa_check_authentication( 'retrieve_customers', true, 'bpa_wp_nonce' );
            if( preg_match( '/error/', $bpa_check_authorization ) ){
                $bpa_auth_error = explode( '^|^', $bpa_check_authorization );
                $bpa_error_msg = !empty( $bpa_auth_error[1] ) ? $bpa_auth_error[1] : esc_html__( 'Sorry. Something went wrong while processing the request', 'bookingpress-appointment-booking');

                $response['variant'] = 'error';
                $response['title'] = esc_html__( 'Error', 'bookingpress-appointment-booking');
                $response['msg'] = $bpa_error_msg;

                wp_send_json($response);
                die;
            }

            // Placeholder: requires implementing real lookup by DNI in DB
            // Expected input
            $dni = ! empty($_POST['dni']) ? preg_replace('/\D+/', '', sanitize_text_field($_POST['dni'])) : '';
            if( empty($dni) ){
                $response['variant'] = 'error';
                $response['title'] = esc_html__('Error', 'bookingpress-appointment-booking');
                $response['msg'] = esc_html__('DNI requerido', 'bookingpress-appointment-booking');
                wp_send_json($response);
                die;
            }
            
            #$response['customer'] = get_dni_customers( $dni );
            $bphc_For_customer = get_dni_customers( $dni, '',true );
            //wp_send_json($bphc_For_customer);
            if( !empty($bphc_For_customer) ){
                //if( count($bphc_For_customer, COUNT_NORMAL) > 10 ) -- No nesecitamos contar, recortamos directamente
                //Maximo de clientes a mostrar = 10;
                $bphc_For_customer = array_slice( $bphc_For_customer, 0, 10, true );
                $this->bookingpress_get_customer_details( $bphc_For_customer );
            }
            
            wp_send_json($response);
            die;
        }
        
        public function bphc_getAppointmentDataByID($requested_appointment_id){
            global $wpdb, $tbl_bookingpress_appointment_bookings;
            $historyAppointment = [];
            $historyAppointment = $wpdb->get_row($wpdb->prepare("SELECT 
                    bookingpress_appointment_booking_id as bookingpress_appointment_id, bookingpress_booking_id as booking_id,bookingpress_customer_id customer_id, bookingpress_customer_firstname as customer_firstname, bookingpress_customer_lastname as customer_lastname, bookingpress_service_id as service_id, bookingpress_service_name as service_name, bookingpress_staff_member_details
                    FROM {$tbl_bookingpress_appointment_bookings} WHERE bookingpress_appointment_booking_id = %d  ", $requested_appointment_id), ARRAY_A);
            if( !empty( $historyAppointment['bookingpress_staff_member_details'] )){
            $historyAppointment['bookingpress_staff_member_details'] = json_decode(stripslashes($historyAppointment['bookingpress_staff_member_details']), true);
            }
            return $historyAppointment;
        }
        
        
        public function html_head_histories( )
        {
            global $historiasClinicas_module_name;
            
            $request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard';
                        
            if($request_module != $historiasClinicas_module_name) return;
            
            $html2pdf_file = 'src/js/lib/html2pdf.bundle.min.js';
            if( defined('BPHC_PLUGIN_DIR') && defined('BPHC_PLUGIN_URL') && file_exists( BPHC_PLUGIN_DIR . $html2pdf_file ) ){ ?>
                <script src="<?php echo BPHC_PLUGIN_URL . $html2pdf_file; ?>"></script>
            <?php }else{ ?>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
            <?php 
            }
            unset( $html2pdf_file );
            
            if( empty($_GET['popup-display']) ) return; // !Importantee. agregamos la peticion para evitar mas cargas en la pantalla principal
            ?>
            <script>
            //console.log('');
            //console.log( 'has_window_parent ?', window.parent[0] );
            var bphc_has_window_parent = (typeof window.parent[0] != 'undefined')?1:0;
            <?php if( !empty($_GET['popup-display']) ) echo 'bphc_has_window_parent = 1;'; ?>
            //console.log(bphc_has_window_parent);
            if( bphc_has_window_parent ){
                                
                capturarElemento( 'body', (docHistoriasBody) =>{
                    docHistoriasBody.classList.add('__is_bphc_popup');
                });
                
                
            }
            
            function capturarElemento(selector, callback) {
                const observer = new MutationObserver((mutations, observer) => {
                    const element = document.querySelector(selector);
                    if (element) {
                        observer.disconnect();
                        callback(element);
                    }
                });
            
                observer.observe(document.documentElement, {
                    childList: true,
                    subtree: true,
                });
            }
            
            
            </script>
<style>
.__is_bphc_popup * {
    /*display: none;*/
    /*z-index: -10;*/
}
body.__is_bphc_popup {
    overflow-y: clip;
}
.el-main {
    width: 100%;
    margin: 0 !important;
}
.__is_bphc_popup h1.bpa-page-heading {
    word-break: auto-phrase;
}
.__is_bphc_popup .is-align-right.bp-hc-filter {
    display: none;
}
.__is_bphc_popup .bpa-mlc-left-heading * {
    width: 80vw;
}
.__is_bphc_popup .bpa-staff-header-navbar__mob {
    display: none;
}
.__is_bphc_popup nav.bpa-header-navbar__staff {
    display: none;
}
.__is_bphc_popup .bpa-staff-sidebar-navigation {
    display: none;
}
.__is_bphc_popup #bphc_main_historias_el {
    background: white;
    display: flex;
    z-index: 100;
    position: fixed;
    width: 100vw;
    height: 100vh;
    top: 0;
    left: 0;
    margin: 0;
    padding: 10px;
    border-radius: 0;
}
.__is_bphc_popup .el-dialog__wrapper {
    padding: 0;
}
</style>
            
            <?php
            
        }
        
        public function html_footer_histories( )
        {
            global $historiasClinicas_module_name;
            
            $request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard';
            
            
            if($request_module != $historiasClinicas_module_name) return;
            
            if( empty($_GET['popup-display']) ){ ?>
                <style>
                .v-modal {
                    background: #00000040;
                }
                .el-dialog__wrapper {
                    z-index: 9996 !important;
                    left: 255px;
                    top: 102px;
                    top: 0px;
                    right: 0;
                    bottom: 0;
                    margin: 2px;
                    border-radius: 10px;
                    box-shadow: 0 0 20px #5b6773bd;
                    /* outline: 1px solid lightgray; */
                }
                @media (max-width: 1024px) {
                    .el-dialog__wrapper {
                        left: 96px;
                    }
                }
                @media (max-width: 782px) {
                    .el-dialog__wrapper {
                        left: 0px;
                        top: 74px;
                    }
                }
                

<?php if( true || isset($_GET['testy']) ){ ?>
/* ************************************* ULTIMO AGREGADO *********************************** */
/** NEWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW */
#bphc_history_add_modal.el-dialog__wrapper {
    width: calc(100% - 256px - 68px);
    /* margin: 255px; */
    position: absolute;
    top: 0;
    left: 0;
    margin: 141px 30px 20px calc( 256px + 36px );
    /* height: auto; */
    /*border-radius: 14px;*/
    /*overflow: hidden;*/
    /*background: var(--bpa-cl-white);*/
}
#bphc_history_add_modal.el-dialog__wrapper {
    bottom: unset;
    z-index: 2031;
    position: absolute !important;
    /* max-height: unset !important; */
    overflow: visible;
    height: auto;
    top: 0;
    box-shadow: none;
    border: 0;
}
#bphc_history_add_modal.el-dialog__wrapper {
    min-height: 800px;
    background: #f1f5f9;
    /* test height auto */
    height: 100%;
    height: auto;
    padding-bottom: 20px;
}
.el-popup-parent--hidden {
    overflow: auto;
}
.el-popup-parent--hidden .el-main.bpa-main-listing-card-container {
    display: none;
}


.v-modal {
    z-index: 4 !important;
    background: #00000004;
}

th.el-table_1_column_1 .cell {
    /* justify-content: center; */
    /* display: flex !important; */
    margin-left: 8px;
}
#bphc_history_add_modal.el-dialog__wrapper .el-dialog.is-fullscreen.bpa-dialog.bpa-dialog--fullscreen.bpa-dialog--history-modal.bpa--is-page-non-scrollable-mob {
    border: 2px solid var(--bpa-gt-gray-300);
    margin-bottom: 20px;
    background: var(--bpa-cl-white);
    min-height: 500px;
    border-radius: 8px;
}
#bphc_history_add_modal.el-dialog__wrapper .el-dialog__body .bpa-dialog-heading {
    margin-bottom: 0 !important;
    border: 0 !important;
    /* padding: 20px 0 !important; */
}
#bphc_history_add_modal.el-dialog__wrapper .el-dialog__body .bpa-dialog-heading h1.bpa-page-heading {
    font-size: 20px;
}
#bphc_history_add_modal.el-dialog__wrapper .el-dialog__body .bpa-dialog-body {
    padding: 0 0;
}
#bphc_history_add_modal.el-dialog__wrapper .el-dialog__body .bpa-dialog-body .bpa-form-row .el-row .el-col>.bpa-default-card.bpa-db-card {
    border: 0;
    padding: 20px;
    padding-top: 10px;
}
#bphc_history_add_modal.el-dialog__wrapper .el-dialog__body .bpa-dialog-body .bpa-form-row .el-row .el-col>.bpa-db-sec-heading {
    display: none;
}
@media (min-width: 1200px) and (max-width: 1440px) {
    #bphc_history_add_modal.el-dialog__wrapper {
        margin-top: 118px;
    }
}
@media (max-width: 1024px) {
    #bphc_history_add_modal.el-dialog__wrapper {
        width: calc( 100% - 108px - 20px);
        margin: 108px 20px 20px 112px;
    }
}
@media (max-width: 768px) {
    .bpa-staff-sidebar-navigation, .bpa-staff-sidebar-navigation.__bpa-is-active {
        z-index: 9999;
    }
    .bpa-staff-header-navbar__mob {
        z-index: 9999;
    }
    #bphc_history_add_modal.el-dialog__wrapper {
        margin-left: 15px !important;
        margin-right: 15px !important;
        width: calc(100% - 15px - 15px) !important;
    }
}
<?php } ?>
                
                </style>
            <?php }
            /** impresion movido a otra funcion*/
            do_action('historias_add_extra_footer_html');
            
                                    
            return;
/** RETORNADO COMENTADO ESTO QUE NO SE EJECUTA

            #echo add_query_arg( 'page', $bookingpress_slugs->bookingpress_calendar, esc_url( admin_url() . 'admin.php?page=bookingpress' ) );
            
            $url = ( admin_url() . 'admin.php?' . http_build_query([ 'page'=> 'bookingpress_'.$historiasClinicas_module_name, 'impresion'=>1 ]) );
                       
            
            ?>
<div style="width: 100%;text-align: center;"> <button onclick="HistoryImp()" class="bpa-btn button-primary">Imprimir Hoja</button> </div>

<div class="bphc_historiesPrint_Background" style="z-index:-100;">
    <iframe id="myHistoriesIframe"   src="" style=" width: 21cm;height: 29.7cm;opacity: 0;   transition: opacity 0.3s;">
    </iframe>
    <span onclick="HistoryImpClose()" style="position: absolute;top:20px;right: 20px;padding: 5px;border: 1px solid gray;color:whitesmoke;cursor: pointer;">X</span>
</div>


<style>
.bphc_historiesPrint_Background {
    width: 100%;
    height: 100%;
    text-align: center;
    position: fixed;
    top: 0px;
    left: 0px;
    z-index: -100;
    display: flex;
    justify-content: center;
    
    //background: #00000052;
    opacity: 0;
    transition: all 0.3s;
    //backdrop-filter: blur(1.2px);
}
</style>
<script>
var bookin_Expansion_impresion_url = "<?php echo $url; ?>";
</script>
<script>
var HistoryArea;
function HistoryImp(){
    
    HistoryArea = document.querySelector('#myHistoriesIframe');
    //HistoryArea.src="https://foatconcept.com.ar/turnos/historia_clinica_template3.html";
    HistoryArea.src = bookin_Expansion_impresion_url;
    HistoryArea.parentElement.style.zIndex=100;
    HistoryArea.parentElement.style.opacity=1;
    //let HistoryCopy = document.querySelector('#bphc_history_add_modal .bpa-default-card.bpa-db-card');
    
    //HistoryArea.srcdoc = HistoryCopy.innerHTML;
    
    
    
    HistoryArea.onload = ()=> {
    setTimeout(()=>{
            HistoryArea.style.opacity=1;
             HistoryContent = (HistoryArea.contentWindow || HistoryArea.contentDocument);
              
              //if( HistoryContent.document ){
                //HistoryDoc    = HistoryContent.document;
                
                //const celdas = HistoryDoc.querySelectorAll('td, th');
                
                //celdas.forEach(celda => {
                    //let textoCelda = celda.textContent;
                    
                    //textoCelda = remplazoTexo( textoCelda );
                    
                //});
                
              //}
              
              HistoryArea.onclick = (()=>{
                setTimeout(()=>{
                    HistoryImpClose();
                    //HistoryArea.contentWindow.print();
                    
                },500);
                //HistoryArea.style.zIndex=100;
            });
        
    },1000);
    };
    
    

}
function HistoryImpClose(){
    HistoryArea.style.opacity=0;
    HistoryArea.parentElement.style.zIndex=-100;
    HistoryArea.parentElement.style.opacity=0;
    
}


function remplazoTexo( texto ){
    remplaceList = getRemplaceList();
    console.log( texto );
    remText: for( const [clave, val] of Object.entries(remplaceList) ){
        let rempClave = new RegExp('\\['+clave+'\\]', "g");// USAR ESTE REGEXP SI NO FUNCA LO OTRO - PARECE q lo otro no funca
        let is_remp = 0;
        newtexto = texto.replace(rempClave, (match, val)=>{ is_remp=1; return val;});
        console.log( rempClave +'=== '+val+" -- "+texto );
        if( is_remp ) break remText;
    };
    
    return '';//newtexto;
}

function getRemplaceList() {
    const customer = app.customer;
    const hojaHistoria = app.newRecord;
    
    remplaceList = {
        "FECHA_EMISION": "14/09/25 09:45",
        "FECHA": "2025/09/14",
        "NOMBRE_PACIENTE": "josefo",
        "DNI": "334553355"
         
    };
    
    
    return remplaceList;
}

</script>

            <?php
*/
            
        }//Fin Html_footer_hist
        
        
        
        
        public function html_footer_historyAppointments(){
            global $historiasClinicas_module_name;
            
            
            
            $request_module = ( ! empty( $_REQUEST['page'] ) && ( $_REQUEST['page'] != 'bookingpress' ) ) ? str_replace( 'bookingpress_', '', sanitize_text_field( $_REQUEST['page'] ) ) : 'dashboard';
            //($this->is_staff_customize_view() || $this->user_can_access_historias(  ) )
            if( ( $this->is_staff_customize_view() ) && $request_module == 'appointments' ){
                //echo " <h1>Appointmet</h1>";
                echo "<script> console.log('---iniciando pop up code---')</script>";
                $this->add_appointment_histories_popup( );
            }
            
                        
            
            return; //SE utiliza EL ACTION para agregar el popup al footer -- desactivado aqui retornamos
            
            if($request_module != $historiasClinicas_module_name || empty($_GET['componente']) ) return;
            
            ob_start();
            ?>
     <template id="BPHC_Historias_Template">
        <div>
        <?php 
        global $historiasClinicas_module_name;
        
        do_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_view_load');
        ?>
        <strong>Historias clinicas {{ turno }}</strong>
        </div>
        
        
    </template>
    <script>
    var histComponent = Vue.component('bphc-historias', {
        props: [ 'turno'],
        data() {
            
            <?php 
            do_action('bphc_histories_module_vue_data_fields');
            
            //do_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_data_fields');
            ?>
            var bookingpress_return_data = <?php do_action('bookingpress_' . $historiasClinicas_module_name . '_dynamic_data_fields'); ?>;
            
            
            bookingpress_return_data['bookingpress_staff_customize_view '] = 1;
            
        },
        template: '#BPHC_Historias_Template'
    });
    
    </script>
            <?php
            echo ob_get_clean();
        }
        
        
        public function impresion_Ambulatoria(){
            global $BookingPress,$bookingpress_notification_duration;
            
            #################### Continuara..... Ecluimos por ahora #####################
            /**
            if( isset($_GET['test']) ){
            global $bookingPress_Expansion;
            $bookingPress_Expansion->print_Component();
            }
            */
            
            //if(  !isset($_GET['test']) && !isset($_GET['imp']) ){ return; }
            
                $include_imp = BPHC_PLUGIN_DIR . 'includes/templates/historia_clinica_template3.php';
                
                if( file_exists($include_imp) ){
                    
                    add_action('admin_footer', function(){
                        /** NO SE EJECUTA ESTOS ESTILOS "RETORNADO" */
                        return;
                    /*
                    ?>
                    <style>
                    .bphc-componente-impesion {
                        position:  absolute;
                    }
                    .bphc-componente-impesion {
                        position: absolute;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        z-index: 1000;
                    }
                                        
                    .bphc-componente-impesion {
                        text-align: center;
                        display: flex;
                        align-content: flex-start;
                        flex-direction: column;
                        align-items: center;
                        justify-content: flex-start;
                        background: #5e6c79a1;
                        background: #5e6c7947;
                        
                    }
                    
                    .impresion-buttons__inner {
                        min-height: 78px;
                    }
                    
                    .impresion-buttons button div {
                        position: relative;
                    }
                    .impresion-buttons button[disabled] {
                        cursor: progress;
                        outline-offset: 1px;
                        opacity: 0.9;
                        filter: brightness(1.1);
                        outline: 1px solid #03a9f461;
                        outline: 1px solid #03a9f481;
                    }
                    .impresion-buttons button[disabled]:active {
                        background: #17a5aa;
                    }
                    .impresion-buttons button[disabled] div:after {
                        content: ' ';
                        display: flex;
                        width: calc(100% + 8px);
                        height: calc(100% + 8px);
                        background: transparent;
                        z-index: 100;
                        position: absolute;
                        transition: all 0.5s;
                        border: 0px solid #2291ba8c;
                        border-width: 0px 4px 6px 8px;
                        position: absolute;
                        top: -4px;
                        border-radius: 50%;
                        animation: bKexpansionSpin 1.8s cubic-bezier(0.38, 0.69, 0.67, 0.42) infinite;
                        place-self: center;
                        border-color: #17a5aa;
                        opacity: 0.8;
                    }
                    @keyframes bKexpansionSpin {
                        from { transform: rotate(0deg); }
                        to   { transform: rotate(360deg); }
                    }
                    </style>
                    <?php
                    */
                    },10);
                    ?>
                    <script>
                    function bookingpress_Expansion_impresion_load( to_remplace_data = null ,continue_edit = 0 ){
                        
                        if( continue_edit ) return setTimeout( bookingpress_Expansion_impresionShow(), 100);
                        
                        const edit_content_url = new URL( appoint_ajax_obj.ajax_url );
                        edit_content_url.searchParams.append('booking_Expansion_edit_template_content','1');
                        const edit_content_data = new URLSearchParams();
                        edit_content_data.append( 'to_remplace_data', JSON.stringify(to_remplace_data) );
                        edit_content_data.append( 'timestamp', Date.now() );
                        fetch(edit_content_url.href,{
                            method: 'POST',
                            headers: {
                                //'Content-Type': 'application/json; charset=UTF-8'
                                //'Content-Type': 'multipart/form-data; charset=UTF-8'
                                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                            },
                            body: edit_content_data /* */
                        }) 
                        .then( ( response ) => { 
                            console.log('Response Status:', response.status);
                            if (response.ok) {
                                return response.text( ) 
                            }else{
                                throw new Error(`Error de conexion, la petición no llego a destino.`);
                            }
                        }) 
                        .then( result => {
                            //console.log( result );
                            bookingpress_Expansion_impresionWriteSrcDoc( result ).then( loaded =>{
                                if(loaded == 'success'){
                                    
                                    app.impresion_btn_anim_end = 0;
                                    setTimeout( bookingpress_Expansion_impresionShow(), 200);
                                    setTimeout( ()=> {app.impresion_btn_anim_end = 1;}, 300);
                                    app.$notify({
                                        title: '',
                                        type: loaded,
                                        message: 'Plantilla de trabajo cargada',
                                        customClass: loaded+'_notification',
                                        duration:<?php echo intval($bookingpress_notification_duration) ?? 1000; ?> 
                                    });
                                    
                                }else{
                                    app.$notify({
                                        title: 'Error',
                                        type: 'error',
                                        message: loaded,
                                        customClass: 'error_notification',
                                        duration:<?php echo intval($bookingpress_notification_duration); ?> 
                                    });
                                }
                            }).catch((error) => {
                                console.log(' --- error code 6324 mod his ---');
                                console.error(error); // "Error fetching data."
                                app.$notify.error( error );
                            });
                            
                        }).catch((error) => {
                            console.log(' --- error code 6330 mod his ---'+error);
                            console.error(error); // "Error fetching data."
                            app.$notify({
                                title: 'Error',
                                type: 'error',
                                message: error,
                                customClass: 'error_notification', 
                            });
                        });
                        
                        
                    }
                    
                    </script>                    
                    <div class="ignorado-impresion" style="text-align: center;height: 0;width: 0; display: none;">
                    <button class="button button-primary" onclick="bookingpress_Expansion_impresion_load()"> Hoja Clínica </button>
                    <button class="button button-primary" onclick="bookingpress_Expansion_impresion_load( 1 )"> Continuar Con la ultima Hoja </button>
                    <input id="booking_Expansion_imp_text_btns" type="checkbox" value="1" checked /> <span>Ocultar texto de botones</span>
                    </div>
                    <?php
                    include_once( $include_imp );
                    
                    add_action('admin_footer', function(){
                    /** After - component - REwrite styles */
                    /** NO SE EJECUTA ESTOS ESTILOS "RETORNADO" */
                        return;
                    /*
                    ?>
                    <style>
                    .bphc-componente-impesion {
                        align-items: end;
                    }
                    .impresion-buttons.minimizado {
                        width: calc(100% - 35px);
                    }
                    .impresion-buttons-container {
                        height: 110px;
                        padding: 4px;
                    }
                                                            
                    @media (max-width: 768px) {
                        
                        .impresion-buttons {
                            width: 100%;
                            align-items: end;
                            padding-bottom: 5px;
                        }
                    }
                    @media (min-width: 768px) {
                        .bphc-componente-impesion {
                            padding-left: 96px;
                        }
                        .impresion-buttons {
                            width: calc(100% - 96px);
                            align-items: end;
                            padding-bottom: 5px;
                        }
                    }
                    
                    @media (min-width: 1024px) {
                        .bphc-componente-impesion {
                            padding-left: 250px;
                        }
                        .impresion-buttons {
                            width: calc(100% - 250px);
                            max-width: calc(100% - 250px);
                        }
                    }
                    
                    // -- NEW MEDIA RULE --- AL TAMAÑO DE LA CAJA ------
                    .bpa-header-navbar__staff {
                        z-index: 10;
                        position: relative;
                    }
                    .bphc-componente-impesion {
                        background-color: aliceblue;
                        background-color: #f0f8fffa;
                    }
                    
                    .impresion-buttons-container {
                        border-radius: 8px;
                        //border: 2px solid var(--bpa-gt-gray-300);
                        //background-color: white;
                    }
                    .impresion-buttons-container:not( :has(.impresion-buttons.minimizado) ) {
                        height: 0px;
                        border: 0;
                        padding: 0;
                    }
                    .impresion-buttons.minimizado {
                        width: calc(100% - 35px);
                        box-shadow: 0 0 1px #d3d3d399;
                    }
                    
                    @media (min-width: 768px) {
                        .bphc-componente-impesion {
                            padding-left: 96px;
                            padding-top: 108px;
                            padding: 108px 16px 0px calc( 96px + 16px );
                            //background: aliceblue; 
                            z-index: 4;
                        }
                        .bpa-header-navbar__staff {
                            z-index: 10;
                            position: relative;
                        }
                        .impresion-buttons-container {
                            border-radius: 10px;
                            background: white;
                            border: 1.3px solid var(--bpa-gt-gray-300);
                        }
                    }
                    @media (min-width: 768px) {
                        .bphc-componente-impesion {
                            padding-left: 112px;
                            padding-top: 106px;
                            z-index: 2;
                            padding-right: 16px;
                        }
                    }
                    @media (max-width: 1024px) {
                        .bpa-header-navbar__staff {
                            z-index: 10;
                            position: relative;
                        }
                        
                    }
                    @media (max-width: 768px) {
                        .bphc-componente-impesion {
                            padding-top: 106px;
                            //opacity: 0.2 !important;
                        }
                    }
                    @media (min-width: 1024px) {
                        .bphc-componente-impesion {
                            padding-left: calc(250px + 16px);
                            //padding-right: 16px !important;
                        }
                        .impresion-buttons {
                            width: calc(100% - 250px);
                            max-width: calc(100% - 250px);
                        }
                    }
                    </style>
                    <?php
                    */
                    },20);
                }
                        
        }
        
        
        
    }


global $historiasClinicas_module_name;
$historiasClinicas_module_name = 'historias';
global $bookingpress_stories;
$bookingpress_stories = new bookingpress_stories();



/*
if(defined('BKMOD_DIR')){
    if(file_exists( BKMOD_DIR . '/classes/bookingmod/Bookingpress_expansion.php' )){
    //include_once( BKMOD_DIR . '/classes/bookingmod/Bookingpress_expansion.php' );
    }
}
*/
