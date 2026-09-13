<div class="med_desc_container">
<?php
$desc_medicos = array();

$desc_medicos = [
"3" => "ATIENDE: JUEVES 16:00HS A 19:00HS, VIERNES DE 8:00 A 12:00HS
 <br>Costo de servicio particular: $9000 ",
 
"4" => "ATIENDE: Lunes y Viernes de 12:15 a 12:40hs",

"49" => "ATIENDE:  JUEVES de 8:00HS A 12:00HS, SOLO PARTICULAR",


"29" => " CIRUJANO ESTETICO: DR ORTELLADO MANUEL
MARTES Y JUEVES 14:00HS
2 PAMI RED LOMA LINDA
Y SOLO PARTICULAR",

"51" =>"DERMATOLOGA: DRA ESCOBAR SOLARI
VIERNES CADA 15 DIAS DE 11:30 A 16:00HS SOLO PARTICULAR $12000",

"50" =>"PSIQUIATRA: DRA MUSTAFA ANDREA
LUNES 15:00HS SOLO PARTICULAR $25000",

"0" =>"HEMATOLOGO: DR KHALIL TANNURI
LUNES POR MEDIO 9:00HS A 12HS
TODAS LAS REDES DE PAMI E INSSSEP, NI OTRA MUTUAL",

"0" =>"HEMATOLOGO: DR GARCIA ATILIO
LUNES POR MEDIO 9:00HS A 12HS
TODAS LAS REDES DE PAMI E INSSSEP, NI OTRA MUTUAL",

"28" =>"NEFROLOGO: DR MOMBELLI CESAR
MARTES Y JUEVES DE 16:00HS A 19HS
NO TRABAJA CON MUTUAL SOLO PARTICULAR $12000",

"17" =>"ESTUDIOS: ECODOPLER, Y HOLTER PARTICULAR $30.000
",

"18" =>"ATIENDE: LUNES 9 A 12 Y DE 16 A 19HS 
MIERCOLES Y VIERNES 9HS<BR>
ESTUDIOS: ERGOMETRIA PARTICULAR $30.000
",


];

    $desc_medicos = array();
    $medicos_config_ids = get_option('todos_los_medicos_con_config', []);
    
    foreach($medicos_config_ids as $mid){
        $descripcion = get_option('medico_opt_descripcion_'.$mid, "Sin descripcion....");
        $descripcion = str_replace(array("\r\n","\n","\r"),"<br>", $descripcion);
        $desc_medicos[$mid] = $descripcion;
    }
    
?>
</div>

<script>

var dsc_medicos = <?php echo json_encode($desc_medicos); ?>;

async function apply_descripciones_medicos(){ //med_desc_container descripcion_medico mid
    mid=0;
    
    //desc_container = document.querySelector(".med_desc_container");
    
    //descripciones = desc_container.querySelectorAll(".descripcion_medico");
    
    let modul_staff = await document.querySelector(".bpa-front-module-container.bpa-front-module--staff");
    tarjetas_medicos = document.querySelectorAll(".bpa-front-module--staff-item-row .bpa-front-sm--col");
    
    
    el_desc_med=[];
    for(x in tarjetas_medicos){
        if( typeof tarjetas_medicos[x] == "object" ){
            //console.log(typeof tarjetas_medicos[x]);
            mid = tarjetas_medicos[x].getAttribute("data-id");
            
            if( dsc_medicos[mid] != null ){
                if( tarjetas_medicos[x].querySelector(".text_medico_desc") == null){
                    el_desc_med[mid] = document.createElement('div');
                    el_desc_med[mid].className = "text_medico_desc";
                    el_desc_med[mid].id = "text_medico_desc_"+mid;
                    el_desc_med[mid].innerHTML=dsc_medicos[mid];
                    tarjetas_medicos[x].append( el_desc_med[mid] );
                }
                if( tarjetas_medicos[x].querySelector(".text_medico_desc") != null){
                    
                }
            }
        }
    }
    
    

    
}


</script>
<style>
.bpa-front-sm-card .bpa-front-sm-card__body .bpa-front-cb__title {
    color: var(--principal-green) !important;
}

.bpa-front-module-container.bpa-front-module--staff .bpa-front-module--staff-item-row {
    display: flex;
    flex-wrap: wrap;
    //flex-direction: column;
}
.bpa-front-module--staff-item-row .bpa-front-sm--col {
    padding: 5px;
    border: 1px solid lightgray;
    margin: 5px;
    //width: 100%;
    //min-width: 300px;
    background: linear-gradient(172deg, #6caedc0d, transparent);
}
.text_medico_desc {
    color: var(--bpa-dt-black-300);
    font-size: 16px;
    font-weight: 500;
    line-height: 20px;
    margin: 0;
    margin-bottom: 12px;
    letter-spacing: 0;
    text-transform: unset;
}

.text_medico_desc {
    background: linear-gradient(172deg, #6caedc0d, transparent);
    background: white;
    padding: 10px;
    border-radius: 20px;
    opacity: 0;
    transition: all 1s;
}

.bpa-front-module--staff-item-row .bpa-front-sm--col {
    margin: 5px;
    width: calc(50% - 24px);//45%;
    transition: 0.3s;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}
.bpa-front-module--staff-item-row .bpa-front-sm--col {
    padding: 5px;
    border: 1px solid lightgray;
    //margin: 5px;
    //width: 100%;
    //min-width: 300px;
    background: linear-gradient(172deg, #484d5003, transparent);
}
.bpa-front-module--staff-item-row .bpa-front-sm--col:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    cursor: pointer;
}

.bpa-front-sm-card {
    border: 0px solid !important;
    /* border-radius: 0 !important; */
}

@media (max-width: 768px) {
    .bpa-front-module--staff-item-row div.bpa-front-sm--col {
        width: 100%;
    }
}

</style>