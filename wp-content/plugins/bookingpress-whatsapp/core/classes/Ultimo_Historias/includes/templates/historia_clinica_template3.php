
<?php

if(!defined("BPHC_PLUGIN_DIR") ) { exit; }

@ini_set('max_input_vars',0);

  if( !empty( $_REQUEST['booking_Expansion_action'] ) ){
    $received_data = $_REQUEST;
  }else{ $received_data = ( json_decode(file_get_contents("php://input"),true) ); }
  
  #var_dump( $_POST, $_SERVER["REQUEST_METHOD"], $_SERVER["DOCUMENT_ROOT"] );
  #if(!empty($_POST)) exit;
  if( $received_data != null ){
    
    if( $received_data['action'] == 'booking_Expansion_send_content'){
        $send_content = json_decode($received_data['content'], true);
        if( empty($send_content) ) $send_content = json_decode(stripslashes($received_data['content']), true);
        echo $send_content;
        echo '-------Fin received----------------';
        exit;
    }
    
    var_dump( $received_data );
        
  }
/*
date_default_timezone_set("America/Montevideo");

$date = date("Y-m-d");//[FECHA_EMISION]

$is_editable = 1;
$template_options = [
    'inc_vitales'       => 1,
    'inc_exam_fisico'   => 1,
    'is_editable'       => 1,
    'inc_med_dias'      => 1,
];


$template_config = array(
    '[%min-height%]'    => '50px',
    '[%editable%]'      => ($template_options['is_editable']? 'contenteditable': ''),
    
    '[DIRECCION_UME]'   =>  'Av. Esto lo Otro P e r o . . . ',
    '[TELEFONO_UME]'    =>  '+54 88 89 99 88',
    '[EMAIL_UME]'       =>  'ume@ SElavanLasManos . com',
);


$template_data = [
    'customer' => array(
        'dni'       => '889998888',
        'nombre'    => 'Maximiliano S',
        'genero' => 'masculino',
        'telefono'  =>  '+5499999999',
        'email'     =>  'example@example.com',
        'fecha_nac' =>  '1986-11-17',
    ),
    'creado_por'    => 'MAXIMILIANO SUAREZ <cv.msuarez@gmail.com>',
    'consulta_id'   =>  '1923',
    'motivo_consulta'   => 'dolor panza',
    'diagnostico'       => 'cagar mucho',
    'tratamiento'       => 'Que vaya fuera de la clínica se cague en todo lo que quiera y en casa se cague hasta las paredes',
    'servicio'          => 'Cardiología',
    'staff_name'        => 'Maxi',
    'staff_matricula'   => 'MAT-ABC0002025',
    'vitales'   => array(
        'altura'    => '1.7',
        'peso'      => '70',
        'temperatura'   =>  '36',
        'freq_card' =>  '120/80',
        'freq_resp' =>  '62',
        'presion'   =>  '120/80',
        'sato2'     =>  '62',
    )
];


$customer_fecha_nac = $template_data['customer']['fecha_nac'];
$calculo_edad = !empty($customer_fecha_nac)? intval( ( date("Ymd",strtotime(date("Y-m-d")." 23:00:00")) - date("Ymd",strtotime($customer_fecha_nac." 00:00:00")) ) / 10000 ) : '';

$remplace_template = array(
'[FECHA_EMISION]' => $date,
'[NUM_HC]' => $template_data['consulta_id'],//Consulta_id
'[NOMBRE_PACIENTE]' => $template_data['customer']['nombre'],
'[DNI_PACIENTE]'    => $template_data['customer']['dni'],
'[FECHA]'   => date("Y/m/d"),
'[HORA]'    => date("H:i"),
'[EDAD]'    => (!empty($calculo_edad)? "$calculo_edad años":''),
'[SEXO]'    => $template_data['customer']['genero'],
'[TELEFONO]'    => $template_data['customer']['telefono'],
'[EMAIL_PACIENTE]'  => $template_data['customer']['email'],
'[NOMBRE_MEDICO]'   => $template_data['staff_name'],
'[MATRICULA_MEDICO]'       => $template_data['staff_matricula'],
'[ESPECIALIDAD]'    =>  $template_data['servicio'],
'[MOTIVO_CONSULTA]' =>  $template_data['motivo_consulta'],
'[DIAGNOSTICO]'     =>  $template_data['diagnostico'],
'[TRATAMIENTO]'     =>  $template_data['tratamiento'],
'[TRATAMIENTO]'     =>  $template_data['tratamiento'],

'[ALTURA]'   => $template_data['vitales']['altura'],
'[PESO]'    =>  $template_data['vitales']['peso'],
'[TEMPERATURA]' =>  $template_data['vitales']['temperatura'],
'[FREQ_RESP]'   =>  $template_data['vitales']['freq_resp'],
'[PRESION]'     =>  $template_data['vitales']['presion'],
'[SAT_O2]'      =>  $template_data['vitales']['sato2'],
'[FREQ_CARD]'   =>  $template_data['vitales']['freq_card'],


'[EXAMEN_FISICO]'   => '',
'[OBSERVACIONES]'    => '',
'[PROXIMA_CITA]'    => '',


);

$html_email_template ='
<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<title>Historia Clínica Ambulatoria</title>
<style>
@media print {
    * { -webkit-print-color-adjust: exact !important; color-adjust: exact !important; }
    body { margin: 0 !important; padding: 0 !important; font-size: 8px !important; }
    .no-print { display: none !important; }
    table { page-break-inside: avoid; }
    .break-after { page-break-after: always; }
    @page { size: A4 portrait; margin: 10mm; }
}
@media screen { body { padding: 10mm; margin: 0 auto; background: white; } }
body { 
    font-family: Arial, sans-serif; 
    font-size: 11px; 
    line-height: 1.1; 
    margin: 0; 
    color: #000;
    box-sizing: border-box;
}
table { 
    width: 100%; 
    border-collapse: collapse; 
    margin-bottom: 2px;
    table-layout: fixed;
}
td, th { border: 1px solid #333; padding: 1px 3px; vertical-align: top; word-wrap: break-word; }
th { background: #f5f5f5; font-weight: bold; font-size: 7px; text-align: center; }
.section { background: #f0f0f0; font-weight: bold; text-align: center; font-size: 7px; padding: 1px; }
.vital-row td:first-child {  width: 25%; }
.vital-row td:nth-child(2) { width: 10%; text-align: center; font-size: 6px; }
.vital-row td:last-child { width: 15%; text-align: right;  }
.text-area { min-height: 15px; width: 100%; font-size: 7px; }
.small { font-size: 6px; }
.compact { margin-bottom: 1px; font-size: 10px; }
.signature { border-top: 1px solid #000; margin-top: 0px; text-align: center; width: 110px; display: inline-block; font-size: 6px; }
.two-col { width: 50%; }
.med-table td { padding: 1px 2px; font-size: 7px; }
.info-row td { padding: 1px 2px; font-size: 8px; }
:focus { outline: 0; }
</style>
</head>

<body '.($template_options['is_editable']? 'contenteditable': '').'>

<div class="header-logo">
<table style="border: 2px solid rgb(20, 162, 211); margin-bottom: 6px; width: 100%;">
<tr>
<td width="15%" style="text-align: center; padding: 8px; background: rgb(20, 162, 211); color: white; border: none;">
<div style="font-size: 16px; font-weight: bold; line-height: 1;">UME</div>
<div style="font-size: 6px; margin-top: 1px;">EDUCATIVA</div>
</td>
<td width="70%" style="text-align: center; padding: 5px; border: none;">
<div style="font-size: 11px; font-weight: bold; color: rgb(20, 162, 211); margin-bottom: 1px;">UNIDAD MÉDICA EDUCATIVA</div>
<div style="font-size: 13px; font-weight: bold; color: #000;">HISTORIA CLÍNICA AMBULATORIA</div>
<div style="font-size: 7px; color: #333; margin-top: 1px;">Registro de Consulta Médica</div>
</td>
<td width="15%" style="text-align: center; padding: 3px; font-size: 6px; color: #333; border: 1px solid rgb(20, 162, 211);">
<div>Fecha de emisión:</div>
<div style="font-weight: bold; color: rgb(20, 162, 211);">[FECHA_EMISION]</div>
<div style="margin-top: 3px;">N.º de HC:</div>
<div style="font-weight: bold; color: rgb(20, 162, 211);">[NUM_HC]</div>
</td>
</tr>
</table>
</div>

<table class="compact" >
<tr class="info-row">
<td width="12%"><b>Paciente:</b></td><td width="28%">[NOMBRE_PACIENTE]</td>
<td width="8%"><b>DNI:</b></td><td width="12%">[DNI_PACIENTE]</td>
<td width="8%"><b>DNI:</b></td><td width="12%">[FECHA]</td>
<td width="10%"><b>Fecha nac:</b></td><td width="12%">asdsdsdsd</td>
<td width="8%"><b>Hora:</b></td><td width="10%">[HORA]</td>
</tr>
<tr class="info-row">
<td><b>Edad:</b></td><td>[EDAD] </td>
<td><b>Sexo:</b></td><td>[SEXO]</td>
<td><b>Médico:</b></td><td colspan="3">Dr/a. [NOMBRE_MEDICO] - [ESPECIALIDAD]</td>
</tr>
<tr class="info-row">
<td><b>Teléfono:</b></td><td>[TELEFONO]</td>
<td><b>Email:</b></td><td colspan="5">[EMAIL_PACIENTE]</td>
</tr>
</table>

<table class="compact" >
<tr><td class="section">MOTIVO DE CONSULTA</td></tr>
<tr><td class="text-area" contenteditable="false"><div style="min-height: [%min-height%];" [%editable%]>[MOTIVO_CONSULTA]</div></td></tr>
</table>

'.($template_options['inc_vitales']?'
<table class="compact">
<tr><td colspan="3" class="section">SIGNOS VITALES</td></tr>
<tr class="vital-row"><td>Altura</td><td>cm</td><td>[ALTURA]</td></tr>
<tr class="vital-row"><td>Peso</td><td>kg</td><td><div>[PESO]</div></td></tr>
<tr class="vital-row"><td>Temperatura</td><td>°C</td><td>[TEMPERATURA]</td></tr>
<tr class="vital-row"><td>Frec. Respiratoria</td><td>rpm</td><td>[FREQ_RESP]</td></tr>
<tr class="vital-row"><td>Presión Arterial</td><td>mmHg</td><td>[PRESION]</td></tr>
<tr class="vital-row"><td>Sat. O2</td><td>%</td><td>[SAT_O2]</td></tr>
<tr class="vital-row"><td>Frec. Cardíaca</td><td>lpm</td><td>[FREQ_CARD]</td></tr>
</table>
':'').'

'.($template_options['inc_exam_fisico']?'
<table class="compact">
<tr><td class="section">EXAMEN FÍSICO</td></tr>
<tr><td class="text-area" contenteditable="false"><div style="min-height: [%min-height%];" [%editable%]>[EXAMEN_FISICO]</div></td></tr>
</table>
':'').'

<table class="compact" >
<tr><td class="section">DIAGNÓSTICO</td></tr>
<tr><td class="text-area" contenteditable="false"><div style="min-height: [%min-height%];" [%editable%]>[DIAGNOSTICO]<div></td></tr>
</table>

<table class="med-table compact">
<tbody [%editable%]>
<tr><td colspan="' . ($template_options['inc_med_dias']? '4':'3') .'" class="section">MEDICAMENTOS</td></tr>
<tr><th>Medicamento</th><th>Dosis</th><th>Frecuencia</th> ' . ($template_options['inc_med_dias']?'<th>Días</th></tr>':'').'
<tr><td>[MED_1]</td><td>[DOSIS_1]</td><td>[FREQ_1]</td>   ' . ($template_options['inc_med_dias']?'<td>[DIAS_1]</td></tr>':'').'
<tr><td>[MED_2]</td><td>[DOSIS_2]</td><td>[FREQ_2]</td>   ' . ($template_options['inc_med_dias']?'<td>[DIAS_2]</td></tr>':'').'
<tr ><td>[MED_3]</td><td>[DOSIS_3]</td><td>[FREQ_3]</td>   ' . ($template_options['inc_med_dias']?'<td>[DIAS_3]</td></tr>':'').'
</tbody>
</table>

<table class="compact">
<tr><td class="section">TRATAMIENTO / INDICACIONES</td></tr>
<tr><td class="text-area" contenteditable="false"><div style="min-height: [%min-height%];" [%editable%]>[TRATAMIENTO]</div></td></tr>
</table>

<table class="compact">
<tr><td class="section">OBSERVACIONES</td></tr>
<tr><td class="text-area" contenteditable="false"><div style="min-height: [%min-height%];" [%editable%]>[OBSERVACIONES]</div></td></tr>
</table>

<table class="compact">
<tr class="info-row">
<td width="25%"><b>Próxima Cita:</b></td><td width="25%">[PROXIMA_CITA]</td>
<td width="25%"><b>Especialidad:</b></td><td width="25%">[ESPECIALIDAD]</td>
</tr>
</table>

<table style="border:none; margin-top: 8px; text-align: center;">
<tr>
<td class="two-col" style="border:none;">
<div style="min-height: 20px;font-size: 8px;"></div>

<div class="signature">
Firma y Sello Médico<br>
Dr. [NOMBRE_MEDICO]<br>
M.P.: [MATRICULA_MEDICO]
</div>

</td>
<td class="two-col" style="border:none;">
<div style="min-height: 20px;font-size: 8px;"></div>

<div class="signature">
Firma del Paciente<br>
[NOMBRE_PACIENTE]<br>
DNI: [DNI_PACIENTE]
</div>

</td>
</tr>
</table>

<div class="footer-ume">
<table style="border-top: 2px solid rgb(20, 162, 211); margin-top: 10px; width: 100%; border-collapse: collapse;">
<tr>
<td width="33%" style="border: none; padding: 4px; font-size: 6px; vertical-align: top;">
<div style="font-weight: bold; margin-bottom: 1px; color: rgb(20, 162, 211);">CONTACTO:</div>
<div>Dir. [DIRECCION_UME]</div>
<div>Tel. [TELEFONO_UME]</div>
<div>Email [EMAIL_UME]</div>
</td>
<td width="34%" style="border: none; padding: 4px; text-align: center; vertical-align: top;">
<div style="font-size: 9px; font-weight: bold; margin-bottom: 1px; color: rgb(20, 162, 211);">UME</div>
<div style="font-size: 6px; color: #333;">Unidad Médica Educativa</div>
<div style="font-size: 5px; color: #666; margin-top: 1px;">Comprometidos con la salud y la educación médica</div>
<div style="font-size: 5px; font-weight: bold; margin-top: 1px; color: rgb(20, 162, 211);">www.ume.edu.ar</div>
</td>
<td width="33%" style="border: none; padding: 4px; font-size: 6px; text-align: right; vertical-align: top;">
<div style="font-weight: bold; margin-bottom: 1px; color: rgb(20, 162, 211);">IMPORTANTE:</div>
<div>Conservar este documento</div>
<div style="display:none;">Traer en próxima consulta</div>
<div style="margin-top: 1px; font-size: 5px; color: #666;">Documento válido solo con firma médica</div>
</td>
</tr>
</table>
</div>
</body>
</html>';

$remplace_template = array_merge($template_config, $remplace_template);

$html_email_template = str_replace(array_keys($remplace_template),array_values($remplace_template),$html_email_template);
*/
$html_email_template='';
?>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>-->
<script>
var bk_expansion_nonce = '<?php echo wp_create_nonce( 'booking_Expansion_send_content' ); ?>';
</script>
<script>
var impresion_drawer_continue = 0;
var expansion_to_send_content_email_list = [];

async function impresion_drawer_step(){
    return new Promise( (resolve, reject)=>{
        const intrv = setInterval(()=>{
            if( impresion_drawer_continue == 1 ){
                clearInterval(intrv)
                impresion_drawer_continue = 0;
                resolve('confirm')
            }
            if( impresion_drawer_continue == 2 ){
                clearInterval(intrv)
                impresion_drawer_continue = 0;
                resolve('cancel')
            }
        },500);
    });
}

async function bookingExpansion_enviar( btn = null, send_opt = 'email' ){
    btn.disabled = true;
    
    
    const booking_Expansion_To_send_content = document.querySelector('#booking_Expansion_To_send_content');
    const doc_To_send_content = booking_Expansion_To_send_content.contentWindow || booking_Expansion_To_send_content.contentDocument;
    let send_content = doc_To_send_content.document.documentElement.outerHTML;
    let temp = new DOMParser( );
    send_content = temp.parseFromString(send_content, 'text/html');
    //console.log( send_content.querySelectorAll('[contenteditable]') );
    
    send_content.querySelectorAll('[contenteditable]').forEach( (el, indx)=> el.removeAttribute('contentEditable') );
    try{ send_content.querySelector('body').style.zoom = '';}catch{}
    //console.log( send_content.documentElement );
    send_content = send_content.documentElement.outerHTML;
    const params = new URLSearchParams({
        'action': 'booking_Expansion_send_content',
        'booking_Expansion_action': 'booking_Expansion_send_content',
        content: JSON.stringify(send_content),
        _wpnonce: bk_expansion_nonce,
        'maxi': 'un_capo',
    });
    
    let email_subject = '';
    let email_list = [];
    app.impresion_drawer = true;
    
    //await impresion_drawer_step();
    
    impresion_drawer_step().then( step => {
        console.log("fin wait imp dialog", step);
        
        if( step == 'confirm' ){
            email_subject = app.expansion_to_send_email_subject;
            email_list = app.expansion_to_send_email_list;
            params.append('email_subject', email_subject );
            params.append('email_list', JSON.stringify(email_list) );
            console.log( params );
            fetch( appoint_ajax_obj.ajax_url, {
                method: 'POST',
                headers: {
                    //'Content-Type': 'application/json; charset=UTF-8'
                    //'Content-Type': 'multipart/form-data; charset=UTF-8'
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                body: params
            })
            .then( res => res.json() )
            .then( result => {
                console.log(result);
                app.impresion_drawer = false;
                setTimeout(()=>( btn.disabled = false ),16000);
                //addnotify
                app.$notify({
                    title: result.title,
                    message: result.msg,
                    type: result.variant,
                    customClass: result.variant+'_notification',
                    duration: 2500,
                });
                //fin addnotify
            });
        }else{
            app.impresion_drawer = false;
            btn.disabled = false;
        }
        //console.log(send_content);
        send_content = temp = null;
    
        
    }).catch( function (e) {
        send_content = temp = null;
        app.impresion_drawer = false;
        btn.disabled = false;
        
        console.log(e);
        //addnotify
        app.$notify({
            title: 'Error',
            message: e,
            type: response.data.variant,
            customClass: 'error_notification',
            duration: 2500,
        });
        //fin addnotify
    });

}

/*
    function impresionZoomInOut( ev, in_out = '+' ){
        ev.preventDefault();
        try{
            body_el = querySelector('body');
            if(in_out == '-'){
                
            }
        }catch{};
    }
*/
</script>
<?php
/*
$html_email_template = htmlentities($html_email_template);
*/
$html_email_template = '';
?>
<script>

function booking_ExpansionGetDoContent(){
    const booking_Expansion_To_send_content = document.querySelector('#booking_Expansion_To_send_content');
    const doc_To_send_content = booking_Expansion_To_send_content.contentWindow || booking_Expansion_To_send_content.contentDocument;
    return doc_To_send_content;
}

function impresionButton(){
    const doc_To_send_content = booking_ExpansionGetDoContent( );
    doc_To_send_content.print();
    //window.print();
}

function verificarButton(){
    const impButtons = document.querySelector('.impresion-buttons');
    
    //console.log(impButtons.classList.contains('minimizado'));
    if( impButtons.classList.contains('minimizado') ){
        impButtons.classList.remove('minimizado');
    }else{
        impButtons.classList.add('minimizado');
    }
    
}


function closeButton(){
    console.log('cerrar...');
    //document.querySelector('body').innerHTML="";
    
    bookingpress_Expansion_impresionHide();
}
var expansion_impresion_is_show = false;

var bookingpress_Expansion_impresionHide = function(){
        console.log('IMPRESION hide');
        //Object.assign( window.parent.document.querySelector('.imprime-frame-container').style, {'opacity':0, 'z-index':-100});
        Object.assign( document.querySelector('.bphc-componente-impesion').style, {'opacity':0, 'z-index':-100});
        expansion_impresion_is_show = false;
        if(app) app.expansion_impresion_is_show = expansion_impresion_is_show;
};
var bookingpress_Expansion_impresionShow = function(){
        console.log('IMPRESION SHOW');
        //Object.assign( window.parent.document.querySelector('.imprime-frame-container').style, {'opacity':0, 'z-index':-100});
        Object.assign( document.querySelector('.bphc-componente-impesion').style, {'display':'','opacity':1, 'z-index':''});
        expansion_impresion_is_show = true;
        if(app) app.expansion_impresion_is_show = expansion_impresion_is_show;
};

var bookingpress_Expansion_impresionWriteSrcDoc = async function(writeDoc=''){
    return new Promise( (resolve, reject)=>{
        document.querySelector('#booking_Expansion_To_send_content').srcdoc = writeDoc;
        document.querySelector('#booking_Expansion_To_send_content').onload = ()=> {
            const doc_To_send_content = booking_ExpansionGetDoContent( );
            if( doc_To_send_content.document.documentElement.querySelector('table') != null ){
                resolve('success');
            }
            reject('Algo salio mal al cargar la plantilla.')
        }
        setTimeout(()=>(reject('Algo salio mal al cargar la plantilla.')), 10000);
    });
};
</script>
    

<?php add_action( 'admin_footer', function(){

?>
<style>
@media print{
    .impresion-buttons, .impresion-buttons-container {
        display: none;
    }
}

.el-dialog__wrapper:has(>.expansion-dialog-box) {
    border: 0;
    border-radius: 0;
    margin: 0;
    box-shadow: none;
}
.expansion-email-box {
    display: flex;
    flex-direction: column;
    font-size: 12px;
    padding: 0 10px;
}
.expansion-email-box .el-input,
.expansion-email-box .el-select,
.expansion-email-list .el-select-dropdown__item {
    font-size: 12px;
}
.expansion-email-box .el-select .el-input--suffix .el-input__inner {
    background: white;
    padding-left: 25px;
}
.expansion-email-box .el-select .el-input.is-focus .el-input__inner {
    /* border-color: #409eff; */
    border-color: #c0c4cc;
}

.expansion-email-box-footer {
    flex: 1 1 auto;
    align-items: center;
    display: flex;
    justify-content: flex-end;
    padding: 0 10px;
}
.expansion-email-box-footer button {
    height: 32px;
    padding: 8px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    min-width: 34px;
}
.expansion-email-box-footer button .material-icons-round {
    font-size: 15px;
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
    background: #bcc7d157;
}

.bphc-impresion-iframe-container {
    height: 100%;
    /* overflow: auto; */
    border-radius: 6px;
    border: 1px solid lightgray;
    width: 100%;
    display: flex;
    justify-content: center;
    background: #f6f9fbd9;
}

.impresion-buttons-container {
    position: relative;
    top: 0;
    height: 270px;
    /*height: calc(20vh - 8px);*/
    background: #00000015;
    box-sizing: border-box;
    width: 100%;
    display: flex;
    flex-direction: column;
    background: white;
    height: 270px;
    margin-bottom: 10px;
}


.impresion-buttons {
    width: 100%;
    /*position: absolute;*/
    position: relative;
    left: auto;
    /* max-width: 21cm; */
    height: 100%;
    top: 0;
    display: flex;
    align-items: start;
    justify-content: center;
    background-color: #00000020;
    transition: all 0.4s;
    /* padding: 10px 0; */
    /* width: calc(100% - 5mm); */
    /* width: inherit; */
    /* box-shadow: 0px 2px 0px #25c68f29; */
    margin: 0px;
    /* justify-self: center; */
    /* margin-top: 4px; */
    /* background-color: #838f9b3b; */
    cursor: not-allowed;
}
.impresion-buttons.minimizado {
    position: relative;
    /* top: 0; */
    max-height: 80px;
    /* max-width: 240mm; */
    /* width: calc(100% - 40px); */
    left: auto;
    /* margin: 8px; */
    padding: 5px 0;
    align-items: center;
    background-color: #ffffff80;
    /* border-radius: 5px; */
    max-width: unset;
}

.impresion-buttons__inner {
    display: flex;
    align-items: center;
    background-color: #ffffffd9;
    width: 100%;
    justify-content: space-around;
}
/*
.impresion-buttons button {
    border-radius: 5px;
    max-width: 150px;
    cursor: pointer;
    margin: 4px;
    background: #17a5aa;
    color: white;
    font-size: 15px;
    border: 1px solid lightgray;
    display: flex;
    gap: 4px;
    align-items: center;
}
*/
.impresion-buttons button {
    border-radius: 5px;
    max-width: 150px;
    /* padding: 8px 15px; */
    cursor: pointer;
    margin: 4px;
    background: #ededed;
    color: #f3eeee;
    font-size: 15px;
    border: 1px solid lightgray;
    display: flex;
    gap: 4px;
    align-items: center;
    /* width: 32px; */
    /* height: 32px; */
}
/*
.impresion-buttons button svg {
    width: 28px;
    height: 28px;
    border: 2px solid #c3d7e2ed;
    border-radius: 50%;
    background: #47474736;
    padding: 2px;
}
*/
.impresion-buttons button svg {
    /* width: 18px; */
    /* height: 18px; */
    border: 2px solid #c3d7e2ed;
    border-radius: 50%;
    /* background: #47474736; */
    padding: 2px;
    background: var(--bpa-pt-main-green);
}



body:has(#booking_Expansion_imp_text_btns:checked) {
    .impresion-buttons button svg {
        width: 28px;
        height: 28px;
    }
    .impresion-buttons button span {
        display: none;
    }

}


#booking_Expansion_To_send_content {
    border: 1px solid #b0bac261;
    width: 206mm;
    height: 280mm;
    max-width: 100%;
    /* height: calc( 80vh - 10px ); */
    margin-top: 10px;
    overflow-y: overlay;
    /* overscroll-behavior: auto; */
    border-radius: 4px;
    box-shadow: 0 0 20px #3f3f3f1f;
    position: relative;
}


.bphc-componente-impesion {
    width: calc(100% - 20px);
    max-height: calc(100% - 10px);
}
.impresion-buttons-container {
    height: 100%;
    position: absolute;
    min-height: calc( 210mm + 280px);
}
.bphc-impresion-iframe-container {
    height: 100%;
    overflow: auto;
    border-radius: 6px;
    border: 1px solid lightgray;
    width: 100%;
    display: flex;
    justify-content: center;
    background: #f6f9fbd9;
    margin-top: 100px;
}
.impresion-buttons__inner {
    height: 100px;
}

.bphc-componente-impesion, .impresion-buttons__inner, .impresion-buttons-container {
    background: transparent;
}

iframe#booking_Expansion_To_send_content:after {
    z-index: 300;
    content: ' ';
    display: block;
    background: antiquewhite;
    width: 100%;
    height: 100%;
    position: absolute;
}





.bphc-componente-impesion {
    z-index: 4;
}
.histories-listing-header .view-impresion-btns {
    margin: 0 14px 0 0;
    z-index: 5;
}
.histories-listing-header .view-impresion-btns button {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 2px;
    height: 34px;
    width: 34px;    
}
.histories-listing-header .view-impresion-btns button {
    position: relative;
    outline: 1px solid rgb(163 173 195 / 5%);
    margin: 0 4px;
    justify-content: center;
    border-radius: 5px;
    color: #a3adc3;
    color: #959fb5;
    transition: all;
}
.histories-listing-header .view-impresion-btns button:hover {
    background: #e3e3e317;
    color: #73b1d7f7;
    color: #b5d5f1;
    color: #95b3cd;
    outline: 1px solid rgb(163 173 195 / 8%);
}
.histories-listing-header .view-impresion-btns button[disabled] {
    color: #096f95;
    background: #c9c9cd17;
}
.histories-listing-header .view-impresion-btns button div {
    position: relative;
}
.histories-listing-header .view-impresion-btns button[disabled] div:after {
    content: ' ';
    display: flex;
    width: calc(100% + 8px);
    height: calc(100% + 8px);
    background: transparent;
    z-index: 100;
    position: absolute;
    transition: all 0.5s;
    border: 0px solid currentColor;
    border-width: 0px 1px 2px 1px;
    position: absolute;
    top: -4px;
    border-radius: 50%;
    animation: bKexpansionSpin 1.8s cubic-bezier(0.38, 0.69, 0.67, 0.42) infinite;
    /* align-items: center; */
    place-self: center;
    /* justify-content: center; */
    /* border-color: #c9c9cd91; */
    border-color: currentColor;
    opacity: 0.8;
}

@keyframes bKexpansionSpin {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
}
                    
.histories-listing-header .view-impresion-btns button span {
    display: none;
}


body:has(.histories-listing-header .view-impresion-btns) {
    .bphc-componente-impesion .impresion-buttons__inner * {
        display: none;
    }
    .impresion-buttons, .impresion-buttons__inner {
        background-color: #f9f9f900;
    }
}

</style>
<?php
    /** NO SE EJECUTA ESTOS ESTILOS "RETORNADO" */
    return;
?>
<style>
#booking_Expansion_To_send_content {
    border: 1px solid #b0bac261;
    width: 206mm;
    height: 280mm;
    max-width: 100%;
    /* height: calc( 80vh - 10px ); */
    margin-top: 10px;
    overflow-y: overlay;
    /* overscroll-behavior: auto; */
    border-radius: 4px;
    box-shadow: 0 0 20px #3f3f3f1f;
}

</style>
<style>
body {
    /*width: 21cm;*/
    /*height: 19cm;*/
    /*max-height: 19cm;*/
    /*max-width: 790px;*/
    
    
    /*padding: 0;*/
    /*margin: 0;*/
    /*background: white;*/
}
.bphc-componente-impesion {
    width: 100%;
}
.impresion-buttons__inner {
    display: flex;
    align-items: center;
    background-color: #ffffffd9;
    width: 100%;
    justify-content: space-around;
    //padding-bottom: 20px;
}
.impresion-buttons {
    position: fixed;
    left: auto;
    /* max-width: 21cm; */
    height: 100%;
    top: 0;
    display: flex;
    align-items: start;
    justify-content: center;
    background-color: #00000020;
    transition: all 0.4s;
    padding: 10px 0;
    /*width: calc(100% - 5mm);*/
    /*width: 100%;*/
    box-shadow: 0px 2px 0px #25c68f29;
    margin: 0px;
    justify-self: center;
    margin-top: 4px;
    /* background-color: #838f9b3b; */
    cursor: not-allowed;
}
.impresion-buttons.minimizado {
    position: relative;
    /* top: 0; */
    max-height: 80px;
    /*max-width: 240mm;*/
    width: calc(100% - 40px);
    left: auto;
    margin: 8px;
    padding: 5px 0;
    align-items: center;
    
    background-color: #ffffff80;
    border-radius: 5px;
    max-width: unset;
}
.impresion-buttons-container {
    position: relative;
    top: 0;
    height: 120px;
    height: calc(20vh - 8px);
    /* width: calc(21cm - 19px); */
    background: #00000015;
    padding: 10px;
    box-sizing: border-box;
    width: 100%;
    display: flex;
    flex-direction: column;
}

.impresion-buttons button {
    border-radius: 5px;
    max-width: 150px;
    padding: 8px 15px;
    cursor: pointer;
    margin: 10px;
    background: #17a5aa;
    color: white;
    font-size: 15px;
    border: 1px solid lightgray;
    display: flex;
    gap: 4px;
    align-items: center;
}
.impresion-buttons button svg {
    width: 18px;
    height: 18px;
    border: 2px solid #c3d7e2ed;
    border-radius: 50%;
    background: #47474736;
    padding: 2px;
}
.impresion-buttons:not(.minimizado) button .edit_off {
    display: none;
}
.impresion-buttons.minimizado button .edit_on {
    display: none;
}
/*
.impresion-buttons.minimizado button .edit_off {
    display: '';
}
*/
button:hover {
    opacity: 0.8;
}
button:active {
    background: #2b43e2;
}

@media print{
    .impresion-buttons, .impresion-buttons-container {
        display: none;
    }
}

body:has(#booking_Expansion_imp_text_btns:checked) { 
    .impresion-buttons button span {
        display: none;
    }
    .impresion-buttons button svg {
        width: 40px;
        height: 40px;
    }
}
</style>
<?php },11); ?>
<!-- *Componente IMPRESION *********** -->
<div class="bphc-componente-impesion" style="text-align: center;display: none;align-content: flex-start;art;flex-direction: column;align-items: center;justify-content: flex-start;"><!-- display: none;opacity: 0; -->
    <div class="impresion-buttons-container">
    
        <div>
            <div class="impresion-buttons">
            <div class="impresion-buttons__inner">
                <button onclick="impresionButton()" class="confirmar confirm">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M720-120v-120H600v-80h120v-120h80v120h120v80H800v120h-80ZM160-560h640-640Zm80 440v-160H80v-240q0-51 35-85.5t85-34.5h560q51 0 85.5 34.5T880-520v32q-18-10-38-17.5T800-516q0-17-11.5-30.5T760-560H200q-17 0-28.5 11.5T160-520v160h80v-80h342q-16 17-28 37t-20 43H320v160h214q7 22 20 42t28 38H240Zm400-520v-120H320v120h-80v-200h480v200h-80Z"/></svg>
                    <span>Imprimir</span>
                </button>
                <button onclick="verificarButton()" class="verificar">
                    <svg class="edit_on" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M240-160q-33 0-56.5-23.5T160-240q0-33 23.5-56.5T240-320q33 0 56.5 23.5T320-240q0 33-23.5 56.5T240-160Zm0-240q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm0-240q-33 0-56.5-23.5T160-720q0-33 23.5-56.5T240-800q33 0 56.5 23.5T320-720q0 33-23.5 56.5T240-640Zm240 0q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Zm240 0q-33 0-56.5-23.5T640-720q0-33 23.5-56.5T720-800q33 0 56.5 23.5T800-720q0 33-23.5 56.5T720-640ZM480-400q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm40 240v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T863-380L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z"/></svg>
                    <svg class="edit_off" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="m622-453-56-56 82-82-57-57-82 82-56-56 195-195q12-12 26.5-17.5T705-840q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L622-453ZM200-200h57l195-195-28-29-29-28-195 195v57ZM792-56 509-338 290-120H120v-169l219-219L56-792l57-57 736 736-57 57Zm-32-648-56-56 56 56Zm-169 56 57 57-57-57ZM424-424l-29-28 57 57-28-29Z"/></svg>
                    <span>Trabajar</span>
                </button>
                <button onclick="bookingExpansion_enviar( this, 'email' )">
                    
                    <span>Enviar</span>
                    <div><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg></div>
                </button>
                <button onclick="closeButton()" class="close btn-close">
                    
                    <span>Cerrar</span>
                    <div><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></div>
                </button>
                
            </div>
            </div>
        </div>
    </div>
    <div class="bphc-impresion-iframe-container">
        <?php
        echo "
        <iframe id='booking_Expansion_To_send_content' srcdoc='$html_email_template' ".($template_options['is_editable']? 'contenteditable': '').">
        </iframe>
        ";
        
        ?>
    </div>
    
</div>
<el-dialog :visible.sync="impresion_drawer" custom-class="expansion-dialog-box" :modal="false" :modal-append-to-body="false" :before-close="()=>{impresion_drawer_continue=2}" :fullscreen="false"  style="z-index: 6;">
        <div class="expansion-email-box">
            <div style="margin-bottom: 16px;"> <strong>Enviar Correo</strong> </div>
            <span>Destinatarios:</span>
            <el-select v-model="expansion_to_send_email_list" ref="select_email_list" placeholder="escribe o selecciona correo(s)" popper-class="expansion-email-list" :reserve-keyword="false" @change="(val,o)=>{ console.log(val,o, this.$refs); let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; this.expansion_to_send_email_list = this.expansion_to_send_email_list.filter(email=>{ if(!regex.test(email)){ alert(`&quot;${email}&quot; no es un email valido`);return false;} return true;});}" multiple filterable allow-create default-first-option clearable>
                <el-option v-if="selected_patient && selected_patient.customer_email" :value="selected_patient.customer_email" :label="selected_patient.customer_email">{{selected_patient.customer_firstname}}: &lt;{{selected_patient.customer_email}}&gt;</el-option>
                <?php if( !empty(wp_get_current_user()->user_email) ){ ?> 
                <el-option value="<?php echo wp_get_current_user()->user_email; ?>" label="<?php echo wp_get_current_user()->user_email; ?>">Tú: &lt;<?php echo wp_get_current_user()->user_email; ?>&gt;</el-option> 
                <?php } ?>
            </el-select>
            <span>Asunto:</span>
            <el-input v-model="expansion_to_send_email_subject" ></el-input>
            <!--<button @click="impresion_drawer_continue=1;">enviar</button>-->
        </div>
        <template #footer>
        <div class="expansion-email-box-footer" style="flex: auto">
          <el-button @click="impresion_drawer_continue=2" >Cancelar</el-button>
          <el-button type="primary" class="bpa-btn--primary" @click="impresion_drawer_continue=1">
            <span class="material-icons-round">send</span>
          </el-button>
        </div>
      </template>
    </el-dialog>

<el-dialog :visible.sync="expansion_multi_dialog.is_open" custom-class="expansion-dialog-box from-hc-template" :modal="false" :modal-append-to-body="false" @closed="expansion_multi_dialog.onClose" :fullscreen="false"  style="z-index: 6;"><!-- :before-close="expansion_multi_dialog.onClose" -->
    <div v-if="expansion_multi_dialog.content" v-html="expansion_multi_dialog.content">
    
    </div>
</el-dialog>