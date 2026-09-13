<html lang="es">
<?php


  $received_data = ( json_decode(file_get_contents("php://input"),true) );
  if( $received_data != null ){
    
    if( $received_data['action'] == 'maxxxx'){
        echo $received_data['content'];
        exit;
    }
    
    var_dump( $received_data );
        
  }

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
    'tratamiento'       => 'Que vaya fera de la clínica se cague en todo lo que quiera y en casa se cague hasta las paredes',
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
'[EDAD]'    => $calculo_edad,
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
<td width="10%"><b>Fecha:</b></td><td width="12%">[FECHA]</td>
<td width="8%"><b>Hora:</b></td><td width="10%">[HORA]</td>
</tr>
<tr class="info-row">
<td><b>Edad:</b></td><td>[EDAD] años</td>
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
<tr class="vital-row"><td>Peso</td><td>kg</td><td>[PESO]</td></tr>
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
<div style="margin-top: 1px; font-size: 5px; color: #666;">Documento válido con firma médica</div>
</td>
</tr>
</table>
</div>
</body>
</html>';

$remplace_template = array_merge($template_config, $remplace_template);

$html_email_template = str_replace(array_keys($remplace_template),array_values($remplace_template),$html_email_template);

?>
<style>
#booking_Expansion_To_send_content {
    border: 4px solid green;
    width: 206mm;
    height: calc( 80vh - 10px );
    margin-top: 10px;
}

</style>
<script>
function bookingExpansion_enviar(send_opt = 'email'){
    const booking_Expansion_To_send_content = document.querySelector('#booking_Expansion_To_send_content');
    const doc_To_send_content = booking_Expansion_To_send_content.contentWindow || booking_Expansion_To_send_content.contentDocument;
    let send_content = doc_To_send_content.document.documentElement.outerHTML;
    let temp = new DOMParser( );
    send_content = temp.parseFromString(send_content, 'text/html');
    /*console.log( send_content.querySelectorAll('[contenteditable]') );*/
    
    send_content.querySelectorAll('[contenteditable]').forEach( (el, indx)=> el.removeAttribute('contentEditable') );
    /*console.log( send_content.documentElement );*/
    send_content = send_content.documentElement.outerHTML;
    fetch(location.href,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/json; charset=UTF-8'
        },
        body: JSON.stringify({
            'action': 'maxxxx',
            content: send_content,
            _wpnonce: 'blabla',
            'maxi': 'un_capo',
        })
    });
    
    console.log(send_content);
    send_content = temp = null;;
}
</script>
<?php
/*
$html_email_template = '
<html lang="es">
<head></head>
<body contenteditable>
<p>Hellooooooo</p>
</body>
</html>

';
*/
$html_email_template = htmlentities($html_email_template);
?>
<script>

function impresionButton(){
    const booking_Expansion_To_send_content = document.querySelector('#booking_Expansion_To_send_content');
    const doc_To_send_content = booking_Expansion_To_send_content.contentWindow || booking_Expansion_To_send_content.contentDocument;
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
    document.querySelector('body').innerHTML="";
    
    impFrameHide();
}
var impFrameHide = function(){
        console.log('FRAME hide');
        Object.assign( window.parent.document.querySelector('.imprime-frame-container').style, {'opacity':0, 'z-index':-100});
};

</script>
<style>
body {
    /*width: 21cm;*/
    /*height: 19cm;*/
    /*max-height: 19cm;*/
    /*max-width: 790px;*/
    padding: 0;
    margin: 0;
    background: white;
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
    background: #00000015;
    transition: all 0.2s;
    padding: 10px 0;
    width: calc(100% - 5mm);
    width: 100%;
    box-shadow: 0px 2px 0px #20b2aa8c;
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
    max-width: 240mm;
    /*width: calc(100% - 30px);*/
    left: auto;
    margin: 8px;
    padding: 5px 0;
    align-items: center;
    
    background-color: white;
    border-radius: 5px;
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
}
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


</style>
<!-- *Componente IMPRESION *********** -->
<div class="bphc-componente-impesion" style="text-align: center;display: flex;align-content: flex-start;art;flex-direction: column;align-items: center;justify-content: flex-start;background: aliceblue;">
    <div class="impresion-buttons-container">
    
        <div>
            <div class="impresion-buttons">
                <button onclick="impresionButton()" class="confirmar confirm">Imprimir</button>
                <button onclick="verificarButton()" class="verificar">Trabajar</button>
                <button onclick="bookingExpansion_enviar('email')">Enviar </button>
                <button onclick="closeButton()" class="close btn-close">Cerrar</button>
            </div>
        </div>
    </div>
    <?php
    echo "
    <iframe id='booking_Expansion_To_send_content' srcdoc='$html_email_template' ".($template_options['is_editable']? 'contenteditable': '').">
    </iframe>
    ";
    
    ?>
</div>
</html>