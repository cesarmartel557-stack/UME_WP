<?php
if( !defined('ABSPATH') ) exit('No tienes permiso para ver esto!'); 
//require_once dirname(__FILE__, 6) . '/wp-load.php'; 
?><?php
if( !file_exists( ABSPATH . 'wp-load.php' ) ) exit;
#require_once ABSPATH . 'wp-load.php';

/**
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    

	<title>Untitled 3</title>
</head>

<body>
*/


  $nuevas_obras_sociales = [
        array("label" => "+AC-OSCCH", "value" => "+AC-OSCCH", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "ACA SALUD", "value" => "ACA SALUD", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "AMFFA (Asociación Mutual Farmacéutico)", "value" => "AMFFA (Asociación Mutual Farmacéutico)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "AMSTERDAM SALUD", "value" => "AMSTERDAM SALUD", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "AMUR (Ruralistas)", "value" => "AMUR (Ruralistas)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "APM OSAPM (Agentes de Propaganda Médica)", "value" => "APM OSAPM (Agentes de Propaganda Médica)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "ATSA", "value" => "ATSA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "ATSA (Sanidad)", "value" => "ATSA (Sanidad)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "AVALIAN", "value" => "AVALIAN", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "BIOLAB", "value" => "BIOLAB", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "BOREAL", "value" => "BOREAL", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "BRAMED", "value" => "BRAMED", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "CONFERENCIA EPISCOPAL ARGENTINA", "value" => "CONFERENCIA EPISCOPAL ARGENTINA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "CONSTRUIR SALUD", "value" => "CONSTRUIR SALUD", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "CORTE SUPREMA DE LA JUSTICIA", "value" => "CORTE SUPREMA DE LA JUSTICIA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "COSECHA", "value" => "COSECHA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "COSECHA SALUD", "value" => "COSECHA SALUD", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "DASUTEN", "value" => "DASUTEN", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "ELEVAR (OBRA SOCIAL DE PASTELEROS,CONFITEROS,ETC)", "value" => "ELEVAR (OBRA SOCIAL DE PASTELEROS,CONFITEROS,ETC)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "EN EL HOGAR (ex ADMED SRL - Obra Social de la Carne)", "value" => "EN EL HOGAR (ex ADMED SRL - Obra Social de la Carne)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "ESCLESIÁSTICA SAN PEDRO", "value" => "ESCLESIÁSTICA SAN PEDRO", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "EX COMBATIENTES Convenio InSSSeP-Form 2741", "value" => "EX COMBATIENTES Convenio InSSSeP-Form 2741", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "FEDERADA 25 DE JUNIO - GRUPO 2 - NUMEN", "value" => "FEDERADA 25 DE JUNIO - GRUPO 2 - NUMEN", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "FEDERADA 25 DE JUNIO -GRUPO 1", "value" => "FEDERADA 25 DE JUNIO -GRUPO 1", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "GALENO ARGENTINA", "value" => "GALENO ARGENTINA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "GLOBAL EMPRESARIA - SOMU", "value" => "GLOBAL EMPRESARIA - SOMU", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "GM SALUD - OSFOT - ASIP SALUD SRL", "value" => "GM SALUD - OSFOT - ASIP SALUD SRL", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "IMAGEN EN SALUD (O.Social Marina Mercante) - JB CONSULTORES", "value" => "IMAGEN EN SALUD (O.Social Marina Mercante) - JB CONSULTORES", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "InSSSeP - Afiliados Directos - Form 2741", "value" => "InSSSeP - Afiliados Directos - Form 2741", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "InSSSeP - Programa de Diabetes 420150-420151 - Form 2741", "value" => "InSSSeP - Programa de Diabetes 420150-420151 - Form 2741", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "InSSSeP - Programa Ginecológico - Form 2741(*)", "value" => "InSSSeP - Programa Ginecológico - Form 2741(*)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "InSSSeP/Con.De Rec./ ECOM(Af.91000)/ Bioqui.(Af.71000) - Form 2741", "value" => "InSSSeP/Con.De Rec./ ECOM(Af.91000)/ Bioqui.(Af.71000) - Form 2741", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "INSSUCAUS (Inst. de Servicios Sociales Univ.Chaco)", "value" => "INSSUCAUS (Inst. de Servicios Sociales Univ.Chaco)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "IOSFA (Uso de validador OBLIGATORIO propio O.S.)", "value" => "IOSFA (Uso de validador OBLIGATORIO propio O.S.)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "ISSUNNE (c/Autorizador Propio O.S.)", "value" => "ISSUNNE (c/Autorizador Propio O.S.)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "ITER MEDICINA SA (OSFE Obra Social Ferroviaria)", "value" => "ITER MEDICINA SA (OSFE Obra Social Ferroviaria)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "JERÁRQUICOS SALUD (PLAN PMO SIN CONVENIO) Validar por Autorizador del CMGCh)", "value" => "JERÁRQUICOS SALUD (PLAN PMO SIN CONVENIO) Validar por Autorizador del CMGCh)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "LYF /OSFATLY F", "value" => "LYF /OSFATLY F", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "Medi Full - SIEMPRE -LUIS A. DAJRUCH(*)", "value" => "Medi Full - SIEMPRE -LUIS A. DAJRUCH(*)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "MEDICUS - Blanco - Azul - Celeste", "value" => "MEDICUS - Blanco - Azul - Celeste", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "MEDIFE (NO ATENDER PLAN AMN)", "value" => "MEDIFE (NO ATENDER PLAN AMN)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "MEPUFE Salud Integral", "value" => "MEPUFE Salud Integral", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "MOSAISTAS - Carnet GRIS", "value" => "MOSAISTAS - Carnet GRIS", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "MOSAISTAS - Carnet VERDE", "value" => "MOSAISTAS - Carnet VERDE", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OBRA SOCIAL DE FARMACIAS", "value" => "OBRA SOCIAL DE FARMACIAS", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OBRA SOCIAL DE METALURGICOS", "value" => "OBRA SOCIAL DE METALURGICOS", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OBRA SOCIAL GMA INTEGRAL SALUD", "value" => "OBRA SOCIAL GMA INTEGRAL SALUD", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OMINT S.A.", "value" => "OMINT S.A.", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OPDEA (Directivos Alimentación)", "value" => "OPDEA (Directivos Alimentación)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OS PESCHA", "value" => "OS PESCHA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSCCH -TAC (CONDUCTORES CAMIONEROS CHACO)", "value" => "OSCCH -TAC (CONDUCTORES CAMIONEROS CHACO)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSDE", "value" => "OSDE", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSETYA (Textiles y Afines)", "value" => "OSETYA (Textiles y Afines)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSIAD (Aceiteros)", "value" => "OSIAD (Aceiteros)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSJERA (Pers. Jerárquico de la R.A.)-Plan700/800-Joven 800/Dor 800 S/Bono", "value" => "OSJERA (Pers. Jerárquico de la R.A.)-Plan700/800-Joven 800/Dor 800 S/Bono", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSJERA (Personal Jerárquico de la R.A.)Plan Básico y Básico Plus (Adjuntar Ticket Pago Coseguro)", "value" => "OSJERA (Personal Jerárquico de la R.A.)Plan Básico y Básico Plus (Adjuntar Ticket Pago Coseguro)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPECON", "value" => "OSPECON", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPEDYC-Consultas R/P y Prácticas según criterio aut.", "value" => "OSPEDYC-Consultas R/P y Prácticas según criterio aut.", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPERHYRA", "value" => "OSPERHYRA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPESCHA (Ob.Social Pers. Estac. Servicios,Garages)", "value" => "OSPESCHA (Ob.Social Pers. Estac. Servicios,Garages)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPIDA (Personal de Imprentas y Artes Gráficas)", "value" => "OSPIDA (Personal de Imprentas y Artes Gráficas)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPIDA STADYCA", "value" => "OSPIDA STADYCA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPIL (Industria Lechera)", "value" => "OSPIL (Industria Lechera)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPIM MADEREROS", "value" => "OSPIM MADEREROS", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPIM MOLINEROS (Obra Social del Pers. de la Industria Molinera)", "value" => "OSPIM MOLINEROS (Obra Social del Pers. de la Industria Molinera)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPIV (Obra Social del Vestido)", "value" => "OSPIV (Obra Social del Vestido)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPM", "value" => "OSPM", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPSA (Sanidad)", "value" => "OSPSA (Sanidad)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSPTV (Obra Social del Personal de Televisión)", "value" => "OSPTV (Obra Social del Personal de Televisión)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSSEG (Obra Social Seguros,Reaseguros,Capit y Ahorro de Vivienda)", "value" => "OSSEG (Obra Social Seguros,Reaseguros,Capit y Ahorro de Vivienda)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSSIMRA", "value" => "OSSIMRA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "OSUTHGRA (Gastronómicos)", "value" => "OSUTHGRA (Gastronómicos)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "PAMI GRAL. SAN MARTIN (*)", "value" => "PAMI GRAL. SAN MARTIN (*)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "PARANÁ SALUD", "value" => "PARANÁ SALUD", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "PODER JUDICIAL", "value" => "PODER JUDICIAL", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "POLICÍA FEDERAL", "value" => "POLICÍA FEDERAL", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SANCOR (Asoc.Mutual SanCor)", "value" => "SANCOR (Asoc.Mutual SanCor)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SANIDAD LUIS PASTEUR", "value" => "SANIDAD LUIS PASTEUR", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SANTA CLARA", "value" => "SANTA CLARA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SCIS-MEDICINA PRIVADA (Gravado)", "value" => "SCIS-MEDICINA PRIVADA (Gravado)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SCIS-MEDICINA PRIVADA (No Gravado)", "value" => "SCIS-MEDICINA PRIVADA (No Gravado)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SCIS-OSPACA (CERVECEROS)", "value" => "SCIS-OSPACA (CERVECEROS)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SERVICIO PENITENCIARIO FEDERAL-U.11 (P.R.SAENZ PEÑA)", "value" => "SERVICIO PENITENCIARIO FEDERAL-U.11 (P.R.SAENZ PEÑA)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SERVICIO PENITENCIARIO FEDERAL-U.7 (RESISTENCIA)", "value" => "SERVICIO PENITENCIARIO FEDERAL-U.7 (RESISTENCIA)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SUPERINTENDENCIA - COMISIÓN MÉDICA (RESISTENCIA)", "value" => "SUPERINTENDENCIA - COMISIÓN MÉDICA (RESISTENCIA)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SUPERINTENDENCIA - COMISIÓN MÉDICA 40 (RECONQUISTA)", "value" => "SUPERINTENDENCIA - COMISIÓN MÉDICA 40 (RECONQUISTA)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SUPERINTENDENCIA - COMISIÓN MÉDICA CENTRAL (BS.AS.)", "value" => "SUPERINTENDENCIA - COMISIÓN MÉDICA CENTRAL (BS.AS.)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SUPERINTENDENCIA DE BIENESTAR", "value" => "SUPERINTENDENCIA DE BIENESTAR", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SUPERINTENDENCIA-COMISIÓN MÉDICA (Pcia ROQUE SAENZ PEÑA)", "value" => "SUPERINTENDENCIA-COMISIÓN MÉDICA (Pcia ROQUE SAENZ PEÑA)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "SWISS MEDICAL /Family/Global 3000/3100/32007 Plan Básico/Plus (e-Token)", "value" => "SWISS MEDICAL /Family/Global 3000/3100/32007 Plan Básico/Plus (e-Token)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "TACCHI", "value" => "TACCHI", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "TV SALUD", "value" => "TV SALUD", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "UNIÓN PERSONAL (Plan Accord) (c/Autorizador Propio O.S.)", "value" => "UNIÓN PERSONAL (Plan Accord) (c/Autorizador Propio O.S.)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "UNIÓN PERSONAL (Plan Clásico-c/Conv.PMO) (c/Autorizador Propio O.S.)", "value" => "UNIÓN PERSONAL (Plan Clásico-c/Conv.PMO) (c/Autorizador Propio O.S.)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "UOM CHACO", "value" => "UOM CHACO", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "UTA", "value" => "UTA", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "UTA CHACO-SIMED SRL", "value" => "UTA CHACO-SIMED SRL", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "UTA SantaFé(O.S.Conduc.Transporte  de Colectivos)", "value" => "UTA SantaFé(O.S.Conduc.Transporte  de Colectivos)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "UTEPLIM", "value" => "UTEPLIM", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "UTN", "value" => "UTN", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "VISITAR S.R.L.", "value" => "VISITAR S.R.L.", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "VISITAR S.R.L. - OSDEPYM", "value" => "VISITAR S.R.L. - OSDEPYM", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "VISITAR S.R.L. - OSPIV (VIDRIO)", "value" => "VISITAR S.R.L. - OSPIV (VIDRIO)", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "VISITAR S.R.L. - OSTEP", "value" => "VISITAR S.R.L. - OSTEP", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "VISITAR S.R.L. - PREVENCIÓN SALUD", "value" => "VISITAR S.R.L. - PREVENCIÓN SALUD", "limitado" => false, "cupos" => 10, "grupo" => false),
        array("label" => "VISITAR S.R.L. - OSPERSAM", "value" => "VISITAR S.R.L. -OSPERSAM", "limitado" => false, "cupos" => 10, "grupo" => false)
    ];
    
    /*$nuevas_obras_sociales = array_map(function($item){
            $item['extend'] = empty($item['extend'])? 0:1;
            if( !isset($item['cupo_grupos']) ) $item['cupo_grupos'] = [ array( 'servs'=> [], 'limitado'=> 0, 'cupos'=> 10 ) ];
            return $item;
        }, 
        $nuevas_obras_sociales
    );*/
    $nuevas_obras_sociales = apply_filters('booking_Expansion_get_all_obras_filter', $nuevas_obras_sociales);

    // Actualizar la opción en la base de datos
    if( update_option("todas_las_obras", $nuevas_obras_sociales) ){
        
        echo "Obras sociales actualizadas correctamente";
    }

/**
</body>
</html>
*/
