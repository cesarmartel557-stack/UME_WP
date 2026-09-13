<?php

if(!defined("BPHC_PLUGIN_DIR") ) { exit; }

@ini_set('max_input_vars',0);
/**
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
*/
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
    
    '[DIRECCION_EMPRESA]'   =>  'Comandante Fernandez Nº 755, Presidencia Roque Sáenz Peña, Argentina, 3700',//DIRECCION_UME
    '[TELEFONO_EMPRESA]'    =>  '+54 3644506061',//TELEFONO_UME
    '[EMAIL_EMPRESA]'       =>  'infoume@uncaus.edu.ar',//EMAIL_UME
);
$template_config['[DIR_EMP_ENCODED]'] = urlencode( $template_config['[DIRECCION_EMPRESA]'] );

$template_data = [
    'customer' => array(
        'dni'       => '',
        'nombre'    => '',
        'genero' => 'masculino',
        'telefono'  =>  '+54',
        'email'     =>  '',
        'fecha_nac' =>  '1986-11-17',
    ),
    'creado_por'    => 'MAXIMILIANO SUAREZ <cv.msuarez@gmail.com>',
    'consulta_id'   =>  '',
    'motivo_consulta'   => '',
    'diagnostico'       => '',
    'tratamiento'       => '',
    'servicio'          => '',
    'staff_name'        => '',
    'staff_matricula'   => 'MAT- ',
    'vitales'   => array(
        'altura'    => '',
        'peso'      => '',
        'temperatura'   =>  '',
        'freq_card' =>  '',
        'freq_resp' =>  '',
        'presion'   =>  '',
        'sato2'     =>  '',
    )
];

if( !empty($postdata_to_remplace) ){
    
    if( is_array($postdata_to_remplace) ) $template_data = array_merge( $template_data, $postdata_to_remplace);
}

$customer_fecha_nac = $template_data['customer']['fecha_nac'];
$customer_fecha_nac = !empty($customer_fecha_nac)? date("Y-m-d", strtotime($customer_fecha_nac) ) :'';
$calculo_edad = !empty($customer_fecha_nac)? intval( ( date("Ymd",strtotime(date("Y-m-d")." 23:00:00")) - date("Ymd",strtotime($customer_fecha_nac." 00:00:00")) ) / 10000 ) : '';

$remplace_template = array(
'[FECHA_EMISION]' => $date,
'[NUM_HC]' => $template_data['consulta_id'],//Consulta_id
'[NOMBRE_PACIENTE]' => $template_data['customer']['nombre'],
'[DNI_PACIENTE]'    => (!empty($template_data['customer']['tipo_doc'])? $template_data['customer']['tipo_doc'] : ( !empty($template_data['customer']['metadata']['tipo_doc'])? $template_data['customer']['metadata']['tipo_doc'] :'') ) . ' ' . $template_data['customer']['dni'],
'[FECHA]'   => (!empty($customer_fecha_nac)? $customer_fecha_nac :'yyyy-mm-dd'),
'[HORA]'    => date("H:i"),
'[EDAD]'    => (!empty($calculo_edad)? "$calculo_edad años":''),
'[SEXO]'    => $template_data['customer']['genero'],
'[TELEFONO]'    => $template_data['customer']['telefono'],
'[EMAIL_PACIENTE]'  => ( !empty($template_data['customer']['email']) && !strstr((string) $template_data['customer']['email'], '.invalid')? (string) $template_data['customer']['email'] : ''),
'[NOMBRE_MEDICO]'   => $template_data['staff_name'],
'[MATRICULA_MEDICO]'       => 'MAT- ',//$template_data['staff_matricula'], //NO SE HA ASIGNADO MATRICULAS
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
'[OBSERVACIONES]'    => $template_data['notas'],
'[PROXIMA_CITA]'    => '',


);

$html_email_template = '<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Historia Clínica Ambulatoria</title>
<style>
@media print {
    * { -webkit-print-color-adjust: exact !important; color-adjust: exact !important; }
    body { margin: 0 !important; padding: 0 !important; font-size: 12px !important; zoom: normal !important; }
    .no-print { display: none !important; }
    table { page-break-inside: avoid; border-collapse: collapse; }
    td, th { border: 0.1pt solid #333; }
    .break-after { page-break-after: always; }
    @page { size: A4 portrait; margin: 10mm; }
}
@media screen { body { padding: 10mm; margin: 0 auto; background: white; } }
body { 
    font-family: Arial, sans-serif; 
    font-size: 12px; 
    line-height: 1.1; 
    margin: 0; 
    color: #111;
    box-sizing: border-box;
}
table { 
    width: 100%; 
    border-collapse: collapse;
    margin-bottom: 2px;
    table-layout: fixed;
}
.expansion-printable table td, .expansion-printable table th  { border: 0.1pt solid #333; padding: 2px 3px; vertical-align: middle; word-wrap: break-word; height: 15px; }
.expansion-printable table th  { background: #f5f5f5; font-weight: 600; font-size: 8px; text-align: center; }
.section { background: #f0f0f0; font-weight: 600; text-align: center; font-size: 8px; padding: 1px; }
.vital-row td:first-child {  width: 25%; }
.vital-row td:nth-child(2) { width: 10%; text-align: center; font-size: 6px; }
.vital-row td:last-child { width: 15%; text-align: right;  }
.text-area { min-height: 15px; width: 100%; font-size: 8px; }
.small { font-size: 6px; }
.compact { margin-bottom: 1px; font-size: 10px; }
.signature { border-top: 1px solid #000; margin-top: 0px; text-align: center; width: 110px; display: inline-block; font-size: 7px; }
.two-col { width: 50%; }
.med-table td { padding: 1px 2px; font-size: 8px; }
.info-row td { padding: 2px 2px; font-size: 8px; }
:focus { outline: 0; }
</style>
</head>

<body class="expansion-printable" '.($template_options['is_editable']? 'contenteditable': '').'>

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
<td width="15%" style="text-align: center; padding: 3px; font-size: 8px; color: #333; border: 1px solid rgb(20, 162, 211);">
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
<td width="8%"><b>DOC:</b></td><td width="12%">[DNI_PACIENTE]</td>
<td width="10%"><b>Fecha Nac:</b></td><td width="12%">[FECHA]</td>
<td width="8%"><b>Hora actual:</b></td><td width="10%">[HORA]</td>
</tr>
<tr class="info-row">
<td><b>Edad:</b></td><td>[EDAD]</td>
<td><b>Sexo:</b></td><td>[SEXO]</td>
<td><b>Médico:</b></td><td colspan="3">Dr./a. [NOMBRE_MEDICO] - [ESPECIALIDAD]</td>
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
<tr><td><!--[MED_1]--></td><td><!--[DOSIS_1]--></td><td><!--[FREQ_1]--></td>   ' . ($template_options['inc_med_dias']?'<td><!--[DIAS_1]--></td></tr>':'').'
<tr><td><!--[MED_2]--></td><td><!--[DOSIS_2]--></td><td><!--[FREQ_2]--></td>   ' . ($template_options['inc_med_dias']?'<td><!--[DIAS_2]--></td></tr>':'').'
<tr ><td><!--[MED_3]--></td><td><!--[DOSIS_3]--></td><td><!--[FREQ_3]--></td>   ' . ($template_options['inc_med_dias']?'<td><!--[DIAS_3]--></td></tr>':'').'
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
Documento: [DNI_PACIENTE]
</div>

</td>
</tr>
</table>

<div class="footer-ume">
<table style="border-top: 2px solid rgb(20, 162, 211); margin-top: 10px; width: 100%; border-collapse: collapse;">
<tr>
<td width="33%" style="border: none; padding: 4px; font-size: 7px; vertical-align: top; line-height: 8px;">
<div style="font-weight: bold; margin-bottom: 1px; font-size: 8px; color: rgb(20, 162, 211);">CONTACTO:</div>
<div>
Dir: <a href="https://www.google.com/maps/?q=[DIRECCION_EMPRESA]" target="_blank" style="color: #333;">
        [DIRECCION_EMPRESA]
    </a>
</div>

<div>Tel: <a href="tel:[TELEFONO_EMPRESA]" target="_top" style="color: #333;text-decoration: none;">[TELEFONO_EMPRESA]</a></div>

'.($template_config['[EMAIL_EMPRESA]']?'<div>Email: [EMAIL_EMPRESA]</div>':'').'
</td>
<td width="34%" style="border: none; padding: 4px; text-align: center; vertical-align: top;">
<div style="font-size: 9px; font-weight: bold; margin-bottom: 1px; color: rgb(20, 162, 211);">UME</div>
<div style="font-size: 8px; color: #333;">Unidad Médica Educativa</div>
<div style="font-size: 8px; color: #666; margin-top: 1px;">Comprometidos con la salud y la educación médica</div>
<div style="font-size: 7px; font-weight: bold; margin-top: 1px; color: rgb(20, 162, 211);">www.ume.edu.ar</div>
</td>
<td width="33%" style="border: none; padding: 4px; font-size: 8px; text-align: right; vertical-align: top;">
<div style="font-weight: bold; margin-bottom: 1px; color: rgb(20, 162, 211);">IMPORTANTE:</div>
<div>Conservar este documento</div>
<div style="display:none;">Traer en próxima consulta</div>
<div style="margin-top: 1px; font-size: 7px; color: #666;">Documento válido solo con firma médica</div>
</td>
</tr>
</table>
</div>
</body>
</html>
';

$html_email_template = apply_filters('expansion_print_email_template_filter', $html_email_template );

$remplace_template = array_merge($template_config, $remplace_template);

$html_email_template = str_replace(array_keys($remplace_template),array_values($remplace_template),$html_email_template);

$html_email_template = apply_filters('expansion_print_email_template_filter_after_remplace', $html_email_template, $remplace_template );
#$html_email_template = htmlentities($html_email_template);

echo $html_email_template;

/* icono ubicacion
<!--<svg xmlns="http://www.w3.org/2000/svg" height="11px" viewBox="0 -960 960 960" width="11px" fill="currentColor"><path d="M536.5-503.5Q560-527 560-560t-23.5-56.5Q513-640 480-640t-56.5 23.5Q400-593 400-560t23.5 56.5Q447-480 480-480t56.5-23.5ZM480-186q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg>-->
*/