<?php

// ok armame un array en php llamado $obras_sociales con el siguiente listado de nombres:

if( $medico == 34 || isset($all_medicos) ): //"34" =>"CLINICA: DRA PREISLER LAURA"

    $config_medico = array(
		"obras_sociales" => [
			array("label" => "IN.S.S.S.E.P.", "value" => "IN.S.S.S.E.P.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSIAD (ACEITEROS)", "value" => "OSIAD (ACEITEROS)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSAPM", "value" => "OSAPM", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA", "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ATSA", "value" => "ATSA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "IN.S.S.S.E.P. - CONVENIO", "value" => "IN.S.S.S.E.P. - CONVENIO", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ASIPSALUD SRL", "value" => "ASIPSALUD SRL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SANTA CLARA SALUD", "value" => "SANTA CLARA SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO", "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "IOSFA", "value" => "IOSFA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO", "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OPDEA", "value" => "OPDEA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPIL (INDUSTRIA LECHERA)", "value" => "OSPIL (INDUSTRIA LECHERA)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "IMAGEN EN SALUD SA", "value" => "IMAGEN EN SALUD SA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "PODER JUDICIAL", "value" => "PODER JUDICIAL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SUPERINTENDENCIA DE BIENESTAR", "value" => "SUPERINTENDENCIA DE BIENESTAR", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "Sancor Salud", "value" => "Sancor Salud", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "GLOBAL EMPRESARIA S.A.", "value" => "GLOBAL EMPRESARIA S.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSETYA (EMPLEADOS TEXTILES)", "value" => "OSETYA (EMPLEADOS TEXTILES)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ITER MEDICINA", "value" => "ITER MEDICINA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "PARANÁ SALUD S.A.", "value" => "PARANÁ SALUD S.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7", "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "O.S.C.T.C.P.", "value" => "O.S.C.T.C.P.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "U.T.A . CHACO", "value" => "U.T.A . CHACO", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ISSUNNE", "value" => "ISSUNNE", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPIM (MADEREROS)", "value" => "OSPIM (MADEREROS)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPEDyC", "value" => "OSPEDyC", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "O.S.S.E.G.", "value" => "O.S.S.E.G.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPERYH", "value" => "OSPERYH", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR", "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN", "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "O.S.U.O.M.R.A.", "value" => "O.S.U.O.M.R.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "O.S.C.T.C.P.", "value" => "O.S.C.T.C.P.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "CONFERENCIA EPISCOPAL ARGENTINA", "value" => "CONFERENCIA EPISCOPAL ARGENTINA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "A.M.F.F.A.", "value" => "A.M.F.F.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SCIS S.A. - OS DE CERVECEROS", "value" => "SCIS S.A. - OS DE CERVECEROS", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPIDA", "value" => "OSPIDA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "MUT. FEDERADA 25 DE JUNIO", "value" => "MUT. FEDERADA 25 DE JUNIO", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "MEDICUS", "value" => "MEDICUS", "limitado" => false, "cupos" => 3, "grupo" => false),
			
			array("label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL", "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA", "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA", "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL", "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "LUIS ALBERTO DAJRUCH", "value" => "LUIS ALBERTO DAJRUCH", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "COSECHA SALUD PYMES", "value" => "COSECHA SALUD PYMES", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SWISS MEDICAL S.A.", "value" => "SWISS MEDICAL S.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OMINT S.A.", "value" => "OMINT S.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "JERARQUICOS SALUD", "value" => "JERARQUICOS SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "IN.S.S.S.E.P. - EX COMBATIENTES", "value" => "IN.S.S.S.E.P. - EX COMBATIENTES", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "MEDIFÉ ASOCIACIÓN CIVIL", "value" => "MEDIFÉ ASOCIACIÓN CIVIL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ACA SALUD COOP. DE SERV. MEDICOS", "value" => "ACA SALUD COOP. DE SERV. MEDICOS", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPIDA STADYCA", "value" => "OSPIDA STADYCA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "UNIÓN DEL PERSONAL", "value" => "UNIÓN DEL PERSONAL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "O.S.Pe.Con.", "value" => "O.S.Pe.Con.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "Osmedica", "value" => "Osmedica", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ACCORD SALUD", "value" => "ACCORD SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "GALENO", "value" => "GALENO", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPESCHA", "value" => "OSPESCHA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ISSUNCAUS", "value" => "ISSUNCAUS", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "AMSTERDAM SALUD S.A.", "value" => "AMSTERDAM SALUD S.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSALARA", "value" => "OSALARA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "BRAMED", "value" => "BRAMED", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SCIS", "value" => "SCIS", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "O.S.P.I.V.", "value" => "O.S.P.I.V.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SISTEMAS MEDICOS SRL", "value" => "SISTEMAS MEDICOS SRL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "VISITAR PREVENCIÓN SALUD", "value" => "VISITAR PREVENCIÓN SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "UTEPLIM S.A.", "value" => "UTEPLIM S.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ELEVAR (PASTELEROS)", "value" => "ELEVAR (PASTELEROS)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPRERA", "value" => "OSPRERA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Provincia", "value" => "ART Provincia", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Asociart", "value" => "ART Asociart", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Colonia Suiza", "value" => "ART Colonia Suiza", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Experta/La Caja", "value" => "ART Experta/La Caja", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Federación Patronal", "value" => "ART Federación Patronal", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Galeno", "value" => "ART Galeno", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART La Holando", "value" => "ART La Holando", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART La Segunda", "value" => "ART La Segunda", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Medicar Work", "value" => "ART Medicar Work", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Numuse", "value" => "ART Numuse", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Omint", "value" => "ART Omint", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Plenus", "value" => "ART Plenus", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Prevención", "value" => "ART Prevención", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ART Río Varadero", "value" => "ART Río Varadero", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "Asociación Argentina de Volantes", "value" => "Asociación Argentina de Volantes", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "PROME-Protección Médica Escolar", "value" => "PROME-Protección Médica Escolar", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "Seguros Integro", "value" => "Seguros Integro", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "Seguros Personales Federación Patronal", "value" => "Seguros Personales Federación Patronal", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "Seguros Personales La Segunda", "value" => "Seguros Personales La Segunda", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "Seguros Personales San Cristóbal", "value" => "Seguros Personales San Cristóbal", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "Seguros Sáncor de Persona", "value" => "Seguros Sáncor de Persona", "limitado" => false, "cupos" => 3, "grupo" => false)
			
		],
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
$all_obras[] = $config_medico;
endif;


if( $medico == 40 || isset($all_medicos) ) : //"40" => "CLINICO: DR RUIZ DANIEL"

    $config_medico = array (
         "obras_sociales" => Array(
             Array(
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => false,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "OSPRERA",
                     "value" => "OSPRERA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "77" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "78" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "79" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "80" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "81" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "82" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "83" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "84" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "85" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "86" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "87" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "88" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "89" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "90" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 52 || isset($all_medicos) ): //"52" => "CIRUJANO: DR SALMON JULIO"
 
    $config_medico = array(
    
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "AMUR Plan V",
                     "value" => "AMUR Plan V",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "AMUR (Gravado), Adherente",
                     "value" => "AMUR (Gravado), Adherente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "AMUR (IVA Exento), Obligatorio",
                     "value" => "AMUR (IVA Exento), Obligatorio",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "APM (OSPAM),",
                     "value" => "APM (OSPAM),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "Bancarios, OSBA",
                     "value" => "Bancarios, OSBA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "Campsic - Obligatorios",
                     "value" => "Campsic - Obligatorios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "Campsic - Voluntarios",
                     "value" => "Campsic - Voluntarios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "Cosecha Salud",
                     "value" => "Cosecha Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "DASUTEN",
                     "value" => "DASUTEN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "Eclesiástica San Pedro",
                     "value" => "Eclesiástica San Pedro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "Elevar (Pasteleros),",
                     "value" => "Elevar (Pasteleros),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "Farmacia",
                     "value" => "Farmacia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "Federada 25 de Junio SPR",
                     "value" => "Federada 25 de Junio SPR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Femechaco Salud - SADAIC",
                     "value" => "Femechaco Salud - SADAIC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "Ferroviarios (OSFA),",
                     "value" => "Ferroviarios (OSFA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Futbolistas Argentinos",
                     "value" => "Futbolistas Argentinos",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Galeno Argentino S.A.",
                     "value" => "Galeno Argentino S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "Global Empresaria S.A.",
                     "value" => "Global Empresaria S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "Hemisferio Salud",
                     "value" => "Hemisferio Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "INSSSEP:",
                     "value" => "INSSSEP:",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "INSSSEP: Convenio Ex Combatiente",
                     "value" => "INSSSEP: Convenio Ex Combatiente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "Jerárquicos Salud",
                     "value" => "Jerárquicos Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "Luz y Fuerza",
                     "value" => "Luz y Fuerza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "Medicus",
                     "value" => "Medicus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "Omint",
                     "value" => "Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OS.D.O.F",
                     "value" => "OS.D.O.F",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OSALARA: Sygma-Agdelotería",
                     "value" => "OSALARA: Sygma-Agdelotería",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "OSECAC",
                     "value" => "OSECAC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "OSETYA: (Textiles y Afines),",
                     "value" => "OSETYA: (Textiles y Afines),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "OSJERA (Pers. Agua y Ener),",
                     "value" => "OSJERA (Pers. Agua y Ener),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "OSPIDA (Stadyca),",
                     "value" => "OSPIDA (Stadyca),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "OSPITA (Personal Técnico Aeronáutico),",
                     "value" => "OSPITA (Personal Técnico Aeronáutico),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "PAMI: Fuera de Padron",
                     "value" => "PAMI: Fuera de Padron",
                     "limitado" => "true",
                     "cupos" => 4,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "Personal de Prensa",
                     "value" => "Personal de Prensa",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "Poder Judicial",
                     "value" => "Poder Judicial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "Prevención Salud: Grav",
                     "value" => "Prevención Salud: Grav",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "Prevención Salud: No Gravado",
                     "value" => "Prevención Salud: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "Prevención Salud: Plan Especial",
                     "value" => "Prevención Salud: Plan Especial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "Sanidad Luis Pasteur",
                     "value" => "Sanidad Luis Pasteur",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "Seguro (OSSEG),",
                     "value" => "Seguro (OSSEG),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "Servicio Penitenciario Federal",
                     "value" => "Servicio Penitenciario Federal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "Servesalud",
                     "value" => "Servesalud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SMATA",
                     "value" => "SMATA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "SOMU: Personal Marítimo",
                     "value" => "SOMU: Personal Marítimo",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "Swiss Medical",
                     "value" => "Swiss Medical",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "SCIS: No Gravado",
                     "value" => "SCIS: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "SCIS: Gravado",
                     "value" => "SCIS: Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "SMAI (Policía Federal),",
                     "value" => "SMAI (Policía Federal),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "TV Salud",
                     "value" => "TV Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "Unión Personal Accord Salud",
                     "value" => "Unión Personal Accord Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Visitar (Andar),",
                     "value" => "Visitar (Andar),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
 $all_obras[] = $config_medico;
 endif;


 if( $medico == 47 || isset($all_medicos) ): //"47" => "TRAUMATOLOGO EN CADERA: DR UEZ JOSE"

    $config_medico = array(
    
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "PAMI",
                     "value" => "PAMI",
                     "limitado" => "true",
                     "cupos" => 2,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 39 || isset($all_medicos) ): //"39" =>"GINECOLOGA: DRA ROLDAN GRACIELA"
 
    $config_medico = array(
    
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
 $all_obras[] = $config_medico;
 endif;
  


 if( $medico == 35 || isset($all_medicos) ): //"35" => "TRAUMATOLOGA PIE Y TOBILLLO: DRA RAMIREZ GABRIELA"

    $config_medico = array(
    
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 2,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "77" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "78" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "79" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "80" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "81" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "82" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "83" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "84" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "85" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "86" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "87" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "88" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "89" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
                 
             "90" => Array
                 (
                     "label" => "INSEP",
                     "value" => "INSEP",
                     "limitado" => "true",
                     "cupos" => 1,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 33 || isset($all_medicos) ): //"33" =>"TRAUMATOLOGA INFANTIL: DRA PELOSO PATRICIA"
 
    $config_medico = array(
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
 $all_obras[] = $config_medico;
 endif;


 if( $medico == 36 || isset($all_medicos) ): //"36" => "TRAUMATOLOGO MIEMBRO INFERIOR: DR RAMOS GUSTAVO"

    $config_medico = array(
    
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "77" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "78" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "79" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "80" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "81" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "82" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "83" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "84" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "85" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "86" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "87" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "88" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "89" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 43 || isset($all_medicos) ): //"43" =>"GINECOLOGA DRA SZCZERBA SANDRA"
 
    $config_medico = array(
    
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "AVALIAN",
                     "value" => "AVALIAN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "BANCARIOS",
                     "value" => "BANCARIOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "CAMIONEROS",
                     "value" => "CAMIONEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "COSECHA SALUD",
                     "value" => "COSECHA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "INSSSEP",
                     "value" => "INSSSEP",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "LUZ Y FUERZA",
                     "value" => "LUZ Y FUERZA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OSDOP",
                     "value" => "OSDOP",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSECAC",
                     "value" => "OSECAC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "OSIAD",
                     "value" => "OSIAD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "OSJERA",
                     "value" => "OSJERA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "OSPEDYC",
                     "value" => "OSPEDYC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "OSPECHA",
                     "value" => "OSPECHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "OSPRERA",
                     "value" => "OSPRERA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSSEG",
                     "value" => "OSSEG",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PREVENCION SALUD",
                     "value" => "PREVENCION SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "SAN PEDRO",
                     "value" => "SAN PEDRO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "SANCOR SALUD",
                     "value" => "SANCOR SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "SANTA CLARA (MOSAISTAS),",
                     "value" => "SANTA CLARA (MOSAISTAS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "SMATA",
                     "value" => "SMATA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "SPF",
                     "value" => "SPF",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "SWISS MEDICAL",
                     "value" => "SWISS MEDICAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "UNION PERSONAL",
                     "value" => "UNION PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "UTA",
                     "value" => "UTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
$all_obras[] = $config_medico;
endif;


if( $medico == 32 || isset($all_medicos) ): //"32" =>"TRAUMATOLOGO EN COLUMNA: DR PADINI MANUEL"

    $config_medico = array(
     "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
                 
             "21" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 2,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 27 || isset($all_medicos) ): //"27" =>"CLINICO: DR MANRIQUE ERNESTO"
 
    $config_medico = array(
    
     "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 2,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "OSPRERA",
                     "value" => "OSPRERA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "77" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "78" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "79" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "80" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "81" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "82" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "83" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "84" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "85" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "86" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "87" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "88" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "89" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "90" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;


 if( $medico == 26 || isset($all_medicos) ): //"26" =>"CIRUJANO: DR LOVERA ALBERTO"

    $config_medico = array(
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "AMUR Plan V",
                     "value" => "AMUR Plan V",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "AMUR (Gravado), Adherente",
                     "value" => "AMUR (Gravado), Adherente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "AMUR (IVA Exento), Obligatorio",
                     "value" => "AMUR (IVA Exento), Obligatorio",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "APM (OSPAM),",
                     "value" => "APM (OSPAM),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "Bancarios, OSBA",
                     "value" => "Bancarios, OSBA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "Campsic",
                     "value" => "Campsic",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "Cosecha Salud",
                     "value" => "Cosecha Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "DASUTEN",
                     "value" => "DASUTEN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "Eclesiástica San Pedro",
                     "value" => "Eclesiástica San Pedro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "Elevar (Pasteleros),",
                     "value" => "Elevar (Pasteleros),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "Federada 25 de Junio SPR",
                     "value" => "Federada 25 de Junio SPR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "Femechaco Salud",
                     "value" => "Femechaco Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "Ferroviarios (OSFA),",
                     "value" => "Ferroviarios (OSFA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Futbolistas Argentinos",
                     "value" => "Futbolistas Argentinos",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "Galeno Argentino S.A",
                     "value" => "Galeno Argentino S.A",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Global Empresaria S.A.",
                     "value" => "Global Empresaria S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Hemisferio Salud",
                     "value" => "Hemisferio Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "INSSSEP",
                     "value" => "INSSSEP",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "INSSSEP: Convenio Ex Combatiente",
                     "value" => "INSSSEP: Convenio Ex Combatiente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "Jerárquicos Salud",
                     "value" => "Jerárquicos Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "Luz y Fuerza",
                     "value" => "Luz y Fuerza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "Medicus",
                     "value" => "Medicus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "Medicus: Corporate",
                     "value" => "Medicus: Corporate",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "Omint: Medicina Privada",
                     "value" => "Omint: Medicina Privada",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OPDEA: Voluntarios",
                     "value" => "OPDEA: Voluntarios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "OS.D.O.P (Docentes Particulares),",
                     "value" => "OS.D.O.P (Docentes Particulares),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OSECAC",
                     "value" => "OSECAC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "OSETYA: (Textiles y Afines),",
                     "value" => "OSETYA: (Textiles y Afines),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "OSJERA",
                     "value" => "OSJERA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "OSPIDA (Stadyca),",
                     "value" => "OSPIDA (Stadyca),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "OSPITA",
                     "value" => "OSPITA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "Personal de Prensa",
                     "value" => "Personal de Prensa",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "Poder Judicial",
                     "value" => "Poder Judicial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "Prevención Salud",
                     "value" => "Prevención Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "Sancor Salud Conectividad",
                     "value" => "Sancor Salud Conectividad",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "Sanidad Luis Pasteur",
                     "value" => "Sanidad Luis Pasteur",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "Seguro (OSSEG),",
                     "value" => "Seguro (OSSEG),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "Servicio Penitenciario Federal",
                     "value" => "Servicio Penitenciario Federal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "Servesalud",
                     "value" => "Servesalud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "SMATA",
                     "value" => "SMATA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "SOMU",
                     "value" => "SOMU",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "Swiss Medical",
                     "value" => "Swiss Medical",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SMAI (Policía Federal),",
                     "value" => "SMAI (Policía Federal),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "TV Salud",
                     "value" => "TV Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "Unión Personal Accord Salud",
                     "value" => "Unión Personal Accord Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "Visitar (Andar),",
                     "value" => "Visitar (Andar),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
                 
             "72" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 4,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 23 || isset($all_medicos) ): //"23" =>"NEUMONOLOGA: DRA KNIZ CECILIA"
 
    $config_medico = array(
    
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "AMUR Plan V -",
                     "value" => "AMUR Plan V -",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "AMUR (Gravado), Adherente -",
                     "value" => "AMUR (Gravado), Adherente -",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "AMUR (IVA Exento), Obligatorio",
                     "value" => "AMUR (IVA Exento), Obligatorio",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "APM (OSPAM),",
                     "value" => "APM (OSPAM),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "Bancarios, OSBA",
                     "value" => "Bancarios, OSBA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "Campsic - Obligatorios",
                     "value" => "Campsic - Obligatorios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "Campsic - Voluntarios",
                     "value" => "Campsic - Voluntarios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "Cosecha Salud",
                     "value" => "Cosecha Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "DASUTEN",
                     "value" => "DASUTEN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "Eclesiástica San Pedro",
                     "value" => "Eclesiástica San Pedro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "Elevar (Pasteleros),",
                     "value" => "Elevar (Pasteleros),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "Farmacia",
                     "value" => "Farmacia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "Federada 25 de Junio SPR",
                     "value" => "Federada 25 de Junio SPR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Femechaco Salud - SADAIC",
                     "value" => "Femechaco Salud - SADAIC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "Ferroviarios (OSFA),",
                     "value" => "Ferroviarios (OSFA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Futbolistas Argentinos",
                     "value" => "Futbolistas Argentinos",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Galeno Argentino S.A.",
                     "value" => "Galeno Argentino S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "Global Empresaria S.A.",
                     "value" => "Global Empresaria S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "Hemisferio Salud",
                     "value" => "Hemisferio Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "INSSSEP:",
                     "value" => "INSSSEP:",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "INSSSEP: Convenio Ex Combatiente",
                     "value" => "INSSSEP: Convenio Ex Combatiente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "Jerárquicos Salud",
                     "value" => "Jerárquicos Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "Luz y Fuerza",
                     "value" => "Luz y Fuerza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "Medicus",
                     "value" => "Medicus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "Omint",
                     "value" => "Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OS.D.O.F",
                     "value" => "OS.D.O.F",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OSALARA: Sygma-Agdelotería",
                     "value" => "OSALARA: Sygma-Agdelotería",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "OSECAC",
                     "value" => "OSECAC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "OSETYA: (Textiles y Afines),",
                     "value" => "OSETYA: (Textiles y Afines),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "OSJERA (Pers. Agua y Ener),",
                     "value" => "OSJERA (Pers. Agua y Ener),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "OSPIDA (Stadyca),",
                     "value" => "OSPIDA (Stadyca),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "OSPITA (Personal Técnico Aeronáutico),",
                     "value" => "OSPITA (Personal Técnico Aeronáutico),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "PAMI: Fuera de Padron",
                     "value" => "PAMI: Fuera de Padron",
                     "limitado" => false,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "Personal de Prensa",
                     "value" => "Personal de Prensa",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "Poder Judicial",
                     "value" => "Poder Judicial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "Prevención Salud: Grav",
                     "value" => "Prevención Salud: Grav",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "Prevención Salud: No Gravado",
                     "value" => "Prevención Salud: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "Prevención Salud: Plan Especial",
                     "value" => "Prevención Salud: Plan Especial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "Sanidad Luis Pasteur",
                     "value" => "Sanidad Luis Pasteur",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "Seguro (OSSEG),",
                     "value" => "Seguro (OSSEG),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "Servicio Penitenciario Federal",
                     "value" => "Servicio Penitenciario Federal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "Servesalud",
                     "value" => "Servesalud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SMATA",
                     "value" => "SMATA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "SOMU: Personal Marítimo",
                     "value" => "SOMU: Personal Marítimo",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "Swiss Medical",
                     "value" => "Swiss Medical",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "SCIS: No Gravado",
                     "value" => "SCIS: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "SCIS: Gravado",
                     "value" => "SCIS: Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "SMAI (Policía Federal),",
                     "value" => "SMAI (Policía Federal),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "TV Salud",
                     "value" => "TV Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "Unión Personal Accord Salud",
                     "value" => "Unión Personal Accord Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Visitar (Andar),",
                     "value" => "Visitar (Andar),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
                 
             "56" => Array
                 (
                     "label" => "PAMI - RED LOMA LINDA",
                     "value" => "PAMI - RED LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 4,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 24 || isset($all_medicos) ): //"24" =>"OTORRINOLARINGOLOGO: DR KRIJICH CARLOS"
 
    $config_medico = array(
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "A.M.F.F.A",
                     "value" => "A.M.F.F.A",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "AMUR Plan V",
                     "value" => "AMUR Plan V",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "AMUR (Gravado), Adherente",
                     "value" => "AMUR (Gravado), Adherente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "AMUR (IVA Exento), Obligatorio",
                     "value" => "AMUR (IVA Exento), Obligatorio",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "APM (OSPAM),",
                     "value" => "APM (OSPAM),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "Bancarios, OSBA",
                     "value" => "Bancarios, OSBA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "Campsic - Obligatorios",
                     "value" => "Campsic - Obligatorios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "Campsic - Voluntarios",
                     "value" => "Campsic - Voluntarios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "Cosecha Salud",
                     "value" => "Cosecha Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "DASUTEN",
                     "value" => "DASUTEN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "Eclesiástica San Pedro",
                     "value" => "Eclesiástica San Pedro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "Elevar (Pasteleros),",
                     "value" => "Elevar (Pasteleros),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "Farmacia",
                     "value" => "Farmacia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "Federada 25 de Junio SPR",
                     "value" => "Federada 25 de Junio SPR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Femechaco Salud - SADAIC",
                     "value" => "Femechaco Salud - SADAIC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "Ferroviarios (OSFA),",
                     "value" => "Ferroviarios (OSFA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Futbolistas Argentinos",
                     "value" => "Futbolistas Argentinos",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Galeno Argentino S.A.",
                     "value" => "Galeno Argentino S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "Global Empresaria S.A.",
                     "value" => "Global Empresaria S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "Hemisferio Salud",
                     "value" => "Hemisferio Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "INSSSEP:",
                     "value" => "INSSSEP:",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "INSSSEP: Convenio Ex Combatiente",
                     "value" => "INSSSEP: Convenio Ex Combatiente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "Jerárquicos Salud",
                     "value" => "Jerárquicos Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "Luz y Fuerza",
                     "value" => "Luz y Fuerza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "Medicus",
                     "value" => "Medicus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "Omint",
                     "value" => "Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OS.D.O.F",
                     "value" => "OS.D.O.F",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OSALARA: Sygma-Agdelotería",
                     "value" => "OSALARA: Sygma-Agdelotería",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "OSECAC",
                     "value" => "OSECAC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "OSETYA: (Textiles y Afines),",
                     "value" => "OSETYA: (Textiles y Afines),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "OSJERA (Pers. Agua y Ener),",
                     "value" => "OSJERA (Pers. Agua y Ener),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "OSPIDA (Stadyca),",
                     "value" => "OSPIDA (Stadyca),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "OSPITA (Personal Técnico Aeronáutico),",
                     "value" => "OSPITA (Personal Técnico Aeronáutico),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "PAMI: Fuera de Padron",
                     "value" => "PAMI: Fuera de Padron",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "Personal de Prensa",
                     "value" => "Personal de Prensa",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "Poder Judicial",
                     "value" => "Poder Judicial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "Prevención Salud: Grav",
                     "value" => "Prevención Salud: Grav",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "Prevención Salud: No Gravado",
                     "value" => "Prevención Salud: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "Prevención Salud: Plan Especial",
                     "value" => "Prevención Salud: Plan Especial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "Sanidad Luis Pasteur",
                     "value" => "Sanidad Luis Pasteur",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "Seguro (OSSEG),",
                     "value" => "Seguro (OSSEG),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "Servicio Penitenciario Federal",
                     "value" => "Servicio Penitenciario Federal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "Servesalud",
                     "value" => "Servesalud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SMATA",
                     "value" => "SMATA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "SOMU: Personal Marítimo",
                     "value" => "SOMU: Personal Marítimo",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "Swiss Medical",
                     "value" => "Swiss Medical",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "SCIS: No Gravado",
                     "value" => "SCIS: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "SCIS: Gravado",
                     "value" => "SCIS: Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "SMAI (Policía Federal),",
                     "value" => "SMAI (Policía Federal),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "TV Salud",
                     "value" => "TV Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "Unión Personal Accord Salud",
                     "value" => "Unión Personal Accord Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Visitar (Andar),",
                     "value" => "Visitar (Andar),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
                 
             "77" => Array
                 (
                     "label" => "PAMI: LOMA LINDA",
                     "value" => "PAMI: LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 4,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;



 if( $medico == 00 || isset($all_medicos) ): //"00" =>"TECNICO ESPIROMETRIA; KNIZ CARLOS"

    $config_medico = array(
        "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "AMUR Plan V -",
                     "value" => "AMUR Plan V -",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "AMUR (Gravado), Adherente -",
                     "value" => "AMUR (Gravado), Adherente -",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "AMUR (IVA Exento), Obligatorio",
                     "value" => "AMUR (IVA Exento), Obligatorio",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "APM (OSPAM),",
                     "value" => "APM (OSPAM),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "Bancarios, OSBA",
                     "value" => "Bancarios, OSBA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "Campsic - Obligatorios",
                     "value" => "Campsic - Obligatorios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "Campsic - Voluntarios",
                     "value" => "Campsic - Voluntarios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "Cosecha Salud",
                     "value" => "Cosecha Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "DASUTEN",
                     "value" => "DASUTEN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "Eclesiástica San Pedro",
                     "value" => "Eclesiástica San Pedro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "Elevar (Pasteleros),",
                     "value" => "Elevar (Pasteleros),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "Farmacia",
                     "value" => "Farmacia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "Federada 25 de Junio SPR",
                     "value" => "Federada 25 de Junio SPR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Femechaco Salud - SADAIC",
                     "value" => "Femechaco Salud - SADAIC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "Ferroviarios (OSFA),",
                     "value" => "Ferroviarios (OSFA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Futbolistas Argentinos",
                     "value" => "Futbolistas Argentinos",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Galeno Argentino S.A.",
                     "value" => "Galeno Argentino S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "Global Empresaria S.A.",
                     "value" => "Global Empresaria S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "Hemisferio Salud",
                     "value" => "Hemisferio Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "INSSSEP:",
                     "value" => "INSSSEP:",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "INSSSEP: Convenio Ex Combatiente",
                     "value" => "INSSSEP: Convenio Ex Combatiente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "Jerárquicos Salud",
                     "value" => "Jerárquicos Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "Luz y Fuerza",
                     "value" => "Luz y Fuerza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "Medicus",
                     "value" => "Medicus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "Omint",
                     "value" => "Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OS.D.O.F",
                     "value" => "OS.D.O.F",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OSALARA: Sygma-Agdelotería",
                     "value" => "OSALARA: Sygma-Agdelotería",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "OSECAC",
                     "value" => "OSECAC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "OSETYA: (Textiles y Afines),",
                     "value" => "OSETYA: (Textiles y Afines),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "OSJERA (Pers. Agua y Ener),",
                     "value" => "OSJERA (Pers. Agua y Ener),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "OSPIDA (Stadyca),",
                     "value" => "OSPIDA (Stadyca),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "OSPITA (Personal Técnico Aeronáutico),",
                     "value" => "OSPITA (Personal Técnico Aeronáutico),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "PAMI: Fuera de Padron",
                     "value" => "PAMI: Fuera de Padron",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "Personal de Prensa",
                     "value" => "Personal de Prensa",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "Poder Judicial",
                     "value" => "Poder Judicial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "Prevención Salud: Grav",
                     "value" => "Prevención Salud: Grav",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "Prevención Salud: No Gravado",
                     "value" => "Prevención Salud: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "Prevención Salud: Plan Especial",
                     "value" => "Prevención Salud: Plan Especial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "Sanidad Luis Pasteur",
                     "value" => "Sanidad Luis Pasteur",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "Seguro (OSSEG),",
                     "value" => "Seguro (OSSEG),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "Servicio Penitenciario Federal",
                     "value" => "Servicio Penitenciario Federal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "Servesalud",
                     "value" => "Servesalud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SMATA",
                     "value" => "SMATA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "SOMU: Personal Marítimo",
                     "value" => "SOMU: Personal Marítimo",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "Swiss Medical",
                     "value" => "Swiss Medical",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "SCIS: No Gravado",
                     "value" => "SCIS: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "SCIS: Gravado",
                     "value" => "SCIS: Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "SMAI (Policía Federal),",
                     "value" => "SMAI (Policía Federal),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "TV Salud",
                     "value" => "TV Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "Unión Personal Accord Salud",
                     "value" => "Unión Personal Accord Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Visitar (Andar),",
                     "value" => "Visitar (Andar),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 19 || isset($all_medicos) ): //"19" =>"CARDIOLOGO: DR HARASIWKA CARLOS"
 
    $config_medico = array(
      "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "AMUR Plan V",
                     "value" => "AMUR Plan V",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "AMUR (Gravado), Adherente",
                     "value" => "AMUR (Gravado), Adherente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "AMUR (IVA Exento), Obligatorio",
                     "value" => "AMUR (IVA Exento), Obligatorio",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "APM (OSPAM),",
                     "value" => "APM (OSPAM),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "Bancarios, OSBA",
                     "value" => "Bancarios, OSBA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "Campsic",
                     "value" => "Campsic",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "Cosecha Salud",
                     "value" => "Cosecha Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "DASUTEN",
                     "value" => "DASUTEN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "Eclesiástica San Pedro",
                     "value" => "Eclesiástica San Pedro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "Elevar (Pasteleros),",
                     "value" => "Elevar (Pasteleros),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "Federada 25 de Junio SPR",
                     "value" => "Federada 25 de Junio SPR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "Femechaco Salud",
                     "value" => "Femechaco Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "Ferroviarios (OSFA),",
                     "value" => "Ferroviarios (OSFA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Futbolistas Argentinos",
                     "value" => "Futbolistas Argentinos",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "Galeno Argentino S.A",
                     "value" => "Galeno Argentino S.A",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Global Empresaria S.A.",
                     "value" => "Global Empresaria S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Hemisferio Salud",
                     "value" => "Hemisferio Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "INSSSEP",
                     "value" => "INSSSEP",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "INSSSEP: Convenio Ex Combatiente",
                     "value" => "INSSSEP: Convenio Ex Combatiente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "Jerárquicos Salud",
                     "value" => "Jerárquicos Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "Luz y Fuerza",
                     "value" => "Luz y Fuerza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "Medicus",
                     "value" => "Medicus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "Medicus: Corporate",
                     "value" => "Medicus: Corporate",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "Omint: Medicina Privada",
                     "value" => "Omint: Medicina Privada",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OPDEA: Voluntarios",
                     "value" => "OPDEA: Voluntarios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "OS.D.O.P (Docentes Particulares),",
                     "value" => "OS.D.O.P (Docentes Particulares),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OSECAC",
                     "value" => "OSECAC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "OSETYA: (Textiles y Afines),",
                     "value" => "OSETYA: (Textiles y Afines),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "OSJERA",
                     "value" => "OSJERA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "OSPIDA (Stadyca),",
                     "value" => "OSPIDA (Stadyca),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "OSPITA",
                     "value" => "OSPITA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "PAMI",
                     "value" => "PAMI",
                     "limitado" => "true",
                     "cupos" => 4,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "Personal de Prensa",
                     "value" => "Personal de Prensa",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "Poder Judicial",
                     "value" => "Poder Judicial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "Prevención Salud",
                     "value" => "Prevención Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "Sancor Salud Conectividad",
                     "value" => "Sancor Salud Conectividad",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "Sanidad Luis Pasteur",
                     "value" => "Sanidad Luis Pasteur",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "Seguro (OSSEG),",
                     "value" => "Seguro (OSSEG),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "Servicio Penitenciario Federal",
                     "value" => "Servicio Penitenciario Federal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "Servesalud",
                     "value" => "Servesalud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "SMATA",
                     "value" => "SMATA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "SOMU",
                     "value" => "SOMU",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "Swiss Medical",
                     "value" => "Swiss Medical",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "SMAI (Policía Federal),",
                     "value" => "SMAI (Policía Federal),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "TV Salud",
                     "value" => "TV Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "Unión Personal Accord Salud",
                     "value" => "Unión Personal Accord Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "Visitar (Andar),",
                     "value" => "Visitar (Andar),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;


 if( $medico == 21 || isset($all_medicos) ): //"21" =>"TRAUMATOLOGO MIEMBRO INFERIOR: JALFON DIEGO"

    $config_medico = array(
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "77" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "78" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "79" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "80" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "81" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "82" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "83" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "84" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "85" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "86" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "87" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "88" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "89" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 15 || isset($all_medicos) ): //"15" =>"CIRUJANO: DR GUSTIN DIEGO"
 
    $config_medico = array(
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "AMUR Plan V -",
                     "value" => "AMUR Plan V -",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "AMUR (Gravado), Adherente -",
                     "value" => "AMUR (Gravado), Adherente -",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "AMUR (IVA Exento), Obligatorio",
                     "value" => "AMUR (IVA Exento), Obligatorio",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "APM (OSPAM),",
                     "value" => "APM (OSPAM),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "Bancarios, OSBA",
                     "value" => "Bancarios, OSBA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "Campsic - Obligatorios",
                     "value" => "Campsic - Obligatorios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "Campsic - Voluntarios",
                     "value" => "Campsic - Voluntarios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "Cosecha Salud",
                     "value" => "Cosecha Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "DASUTEN",
                     "value" => "DASUTEN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "Eclesiástica San Pedro",
                     "value" => "Eclesiástica San Pedro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "Elevar (Pasteleros),",
                     "value" => "Elevar (Pasteleros),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "Farmacia",
                     "value" => "Farmacia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "Federada 25 de Junio SPR",
                     "value" => "Federada 25 de Junio SPR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Femechaco Salud - SADAIC",
                     "value" => "Femechaco Salud - SADAIC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "Ferroviarios (OSFA),",
                     "value" => "Ferroviarios (OSFA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Futbolistas Argentinos",
                     "value" => "Futbolistas Argentinos",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Galeno Argentino S.A.",
                     "value" => "Galeno Argentino S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "Global Empresaria S.A.",
                     "value" => "Global Empresaria S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "Hemisferio Salud",
                     "value" => "Hemisferio Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "INSSSEP:",
                     "value" => "INSSSEP:",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "INSSSEP: Convenio Ex Combatiente",
                     "value" => "INSSSEP: Convenio Ex Combatiente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "Jerárquicos Salud",
                     "value" => "Jerárquicos Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "Luz y Fuerza",
                     "value" => "Luz y Fuerza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "Medicus",
                     "value" => "Medicus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "Omint",
                     "value" => "Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OS.D.O.F",
                     "value" => "OS.D.O.F",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OSALARA: Sygma-Agdelotería",
                     "value" => "OSALARA: Sygma-Agdelotería",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "OSECAC",
                     "value" => "OSECAC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "OSETYA: (Textiles y Afines),",
                     "value" => "OSETYA: (Textiles y Afines),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "OSJERA (Pers. Agua y Ener),",
                     "value" => "OSJERA (Pers. Agua y Ener),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "OSPIDA (Stadyca),",
                     "value" => "OSPIDA (Stadyca),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "OSPITA (Personal Técnico Aeronáutico),",
                     "value" => "OSPITA (Personal Técnico Aeronáutico),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "Personal de Prensa",
                     "value" => "Personal de Prensa",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "Poder Judicial",
                     "value" => "Poder Judicial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "Prevención Salud: Grav",
                     "value" => "Prevención Salud: Grav",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "Prevención Salud: No Gravado",
                     "value" => "Prevención Salud: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "Prevención Salud: Plan Especial",
                     "value" => "Prevención Salud: Plan Especial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "Sanidad Luis Pasteur",
                     "value" => "Sanidad Luis Pasteur",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "Seguro (OSSEG),",
                     "value" => "Seguro (OSSEG),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "Servicio Penitenciario Federal",
                     "value" => "Servicio Penitenciario Federal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "Servesalud",
                     "value" => "Servesalud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SMATA",
                     "value" => "SMATA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "SOMU: Personal Marítimo",
                     "value" => "SOMU: Personal Marítimo",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "Swiss Medical",
                     "value" => "Swiss Medical",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "SCIS: No Gravado",
                     "value" => "SCIS: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "SCIS: Gravado",
                     "value" => "SCIS: Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "SMAI (Policía Federal),",
                     "value" => "SMAI (Policía Federal),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "TV Salud",
                     "value" => "TV Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "Unión Personal Accord Salud",
                     "value" => "Unión Personal Accord Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Visitar (Andar),",
                     "value" => "Visitar (Andar),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;


 if( $medico == 14 || isset($all_medicos) ): //"14" =>"CIRUJANO: G. DEL POZO"

    $config_medico = array(
     "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "S.R.T.",
                     "value" => "S.R.T.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 4,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "SCIS - MEDICINA PRIVADA NO GRABADOS",
                     "value" => "SCIS - MEDICINA PRIVADA NO GRABADOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SCIS - MEDICINA PRIVADA - GRAVADOS",
                     "value" => "SCIS - MEDICINA PRIVADA - GRAVADOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "77" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "78" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "79" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "80" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "81" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "82" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "83" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "84" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "85" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "86" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "87" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "88" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "89" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "90" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "91" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 13 || isset($all_medicos) ): //"13" =>"NEUROLOGO: DR GEMETRO FELIPE"
 
    $config_medico = array(
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 2,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "SCIS - MEDICINA PRIVADA NO GRABADOS",
                     "value" => "SCIS - MEDICINA PRIVADA NO GRABADOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "SCIS - MEDICINA PRIVADA - GRAVADOS",
                     "value" => "SCIS - MEDICINA PRIVADA - GRAVADOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "LUZ Y FUERZA",
                     "value" => "LUZ Y FUERZA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "77" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "78" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "79" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "80" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "81" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "82" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "83" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "84" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "85" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "86" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "87" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "88" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "89" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "90" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "91" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
                 
                 
             "92" => Array
                 (
                     "label" => "INSEP",
                     "value" => "INSEP",
                     "limitado" => "true",
                     "cupos" => 3,
                     "grupo" => false
                 ),
                 
             "93" => Array
                 (
                     "label" => "PARTICULAR",
                     "value" => "PARTICULAR",
                     "limitado" => false,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;


 if( $medico == 12 || isset($all_medicos) ): //"12" =>"PEDIATRA: DRA FRESCHI MARIANA"

    $config_medico = array(
      "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "A.M.F.F.A",
                     "value" => "A.M.F.F.A",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "AMUR Plan V",
                     "value" => "AMUR Plan V",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "AMUR (Gravado), Adherente",
                     "value" => "AMUR (Gravado), Adherente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "AMUR (IVA Exento), Obligatorio",
                     "value" => "AMUR (IVA Exento), Obligatorio",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "APM (OSPAM),",
                     "value" => "APM (OSPAM),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "Bancarios, OSBA",
                     "value" => "Bancarios, OSBA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "Campsic - Obligatorios",
                     "value" => "Campsic - Obligatorios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "Campsic - Voluntarios",
                     "value" => "Campsic - Voluntarios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "Cosecha Salud",
                     "value" => "Cosecha Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "DASUTEN",
                     "value" => "DASUTEN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "Eclesiástica San Pedro",
                     "value" => "Eclesiástica San Pedro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "Elevar (Pasteleros),",
                     "value" => "Elevar (Pasteleros),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "Farmacia",
                     "value" => "Farmacia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "Federada 25 de Junio SPR",
                     "value" => "Federada 25 de Junio SPR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Femechaco Salud - SADAIC",
                     "value" => "Femechaco Salud - SADAIC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "Ferroviarios (OSFA),",
                     "value" => "Ferroviarios (OSFA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Futbolistas Argentinos",
                     "value" => "Futbolistas Argentinos",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Galeno Argentino S.A.",
                     "value" => "Galeno Argentino S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "Global Empresaria S.A.",
                     "value" => "Global Empresaria S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "Hemisferio Salud",
                     "value" => "Hemisferio Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "INSSSEP:",
                     "value" => "INSSSEP:",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "INSSSEP: Convenio Ex Combatiente",
                     "value" => "INSSSEP: Convenio Ex Combatiente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "Jerárquicos Salud",
                     "value" => "Jerárquicos Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "Luz y Fuerza",
                     "value" => "Luz y Fuerza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "Medicus",
                     "value" => "Medicus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "Omint",
                     "value" => "Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OS.D.O.F",
                     "value" => "OS.D.O.F",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OSALARA: Sygma-Agdelotería",
                     "value" => "OSALARA: Sygma-Agdelotería",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "OSECAC",
                     "value" => "OSECAC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "OSETYA: (Textiles y Afines),",
                     "value" => "OSETYA: (Textiles y Afines),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "OSJERA (Pers. Agua y Ener),",
                     "value" => "OSJERA (Pers. Agua y Ener),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "OSPIDA (Stadyca),",
                     "value" => "OSPIDA (Stadyca),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "OSPITA (Personal Técnico Aeronáutico),",
                     "value" => "OSPITA (Personal Técnico Aeronáutico),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "PARTICULAR",
                     "value" => "PARTICULAR",
                     "limitado" => false,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "Personal de Prensa",
                     "value" => "Personal de Prensa",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "Poder Judicial",
                     "value" => "Poder Judicial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "Prevención Salud: Grav",
                     "value" => "Prevención Salud: Grav",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "Prevención Salud: No Gravado",
                     "value" => "Prevención Salud: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "Prevención Salud: Plan Especial",
                     "value" => "Prevención Salud: Plan Especial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "Sanidad Luis Pasteur",
                     "value" => "Sanidad Luis Pasteur",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "Seguro (OSSEG),",
                     "value" => "Seguro (OSSEG),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "Servicio Penitenciario Federal",
                     "value" => "Servicio Penitenciario Federal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "Servesalud",
                     "value" => "Servesalud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SMATA",
                     "value" => "SMATA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "SOMU: Personal Marítimo",
                     "value" => "SOMU: Personal Marítimo",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "Swiss Medical",
                     "value" => "Swiss Medical",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "SCIS: No Gravado",
                     "value" => "SCIS: No Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "SCIS: Gravado",
                     "value" => "SCIS: Gravado",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "SMAI (Policía Federal),",
                     "value" => "SMAI (Policía Federal),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "TV Salud",
                     "value" => "TV Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "Unión Personal Accord Salud",
                     "value" => "Unión Personal Accord Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Visitar (Andar),",
                     "value" => "Visitar (Andar),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 6 || isset($all_medicos) ): //"6" =>"CIRUJANO ESTETICO: DR AROLFO RODOLFO"
 
    $config_medico = array(
    "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "OSPRERA",
                     "value" => "OSPRERA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "77" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "78" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "79" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "80" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "81" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "82" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "83" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "84" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "85" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "86" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "87" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "88" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "89" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "90" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;


 if( $medico == 9 || isset($all_medicos) ): //"9" =>"FLEBOLOGO Y CIRUJANO: DR BRAVO GERARDO"

    $config_medico = array(
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P",
                     "value" => "IN.S.S.S.E.P",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "S.R.T.",
                     "value" => "S.R.T.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 2,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "SCIS - MEDICINA PRIVADA NO GRABADOS",
                     "value" => "SCIS - MEDICINA PRIVADA NO GRABADOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SCIS - MEDICINA PRIVADA - GRAVADOS",
                     "value" => "SCIS - MEDICINA PRIVADA - GRAVADOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "73" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "74" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "75" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "76" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "77" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "78" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "79" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "80" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "81" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "82" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "83" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "84" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "85" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "86" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "87" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "88" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "89" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "90" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "91" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 7 || isset($all_medicos) ): //"7" =>"TRAUMATOLOGO MIEMBRO SUPERIOR: BARCIA SERGIO"
 
    $config_medico = array(
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
                 
             "21" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;

 if( $medico == 25 || isset($all_medicos) ): //"25" =>"CARDIOLOGA: DRA LOPEZ MARISA"
 
    $config_medico = array(
        "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "AMUR Plan V",
                     "value" => "AMUR Plan V",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "AMUR (Gravado), Adherente",
                     "value" => "AMUR (Gravado), Adherente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "AMUR (IVA Exento), Obligatorio",
                     "value" => "AMUR (IVA Exento), Obligatorio",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "APM (OSPAM),",
                     "value" => "APM (OSPAM),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "Bancarios, OSBA",
                     "value" => "Bancarios, OSBA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "Campsic",
                     "value" => "Campsic",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "Cosecha Salud",
                     "value" => "Cosecha Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "DASUTEN",
                     "value" => "DASUTEN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "Eclesiástica San Pedro",
                     "value" => "Eclesiástica San Pedro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "Elevar (Pasteleros),",
                     "value" => "Elevar (Pasteleros),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "Federada 25 de Junio SPR",
                     "value" => "Federada 25 de Junio SPR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "Femechaco Salud",
                     "value" => "Femechaco Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "Ferroviarios (OSFA),",
                     "value" => "Ferroviarios (OSFA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "Futbolistas Argentinos",
                     "value" => "Futbolistas Argentinos",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "Galeno Argentino S.A",
                     "value" => "Galeno Argentino S.A",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Global Empresaria S.A.",
                     "value" => "Global Empresaria S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "Hemisferio Salud",
                     "value" => "Hemisferio Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "INSSSEP",
                     "value" => "INSSSEP",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "INSSSEP: Convenio Ex Combatiente",
                     "value" => "INSSSEP: Convenio Ex Combatiente",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "Jerárquicos Salud",
                     "value" => "Jerárquicos Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "Luz y Fuerza",
                     "value" => "Luz y Fuerza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "Medicus",
                     "value" => "Medicus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "Medicus: Corporate",
                     "value" => "Medicus: Corporate",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "Omint: Medicina Privada",
                     "value" => "Omint: Medicina Privada",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OPDEA: Voluntarios",
                     "value" => "OPDEA: Voluntarios",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "OS.D.O.P (Docentes Particulares),",
                     "value" => "OS.D.O.P (Docentes Particulares),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OSECAC",
                     "value" => "OSECAC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "OSETYA: (Textiles y Afines),",
                     "value" => "OSETYA: (Textiles y Afines),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "OSJERA",
                     "value" => "OSJERA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "OSPIDA (Stadyca),",
                     "value" => "OSPIDA (Stadyca),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "OSPITA",
                     "value" => "OSPITA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "PAMI: Fuera de Padron",
                     "value" => "PAMI: Fuera de Padron",
                     "limitado" => "true",
                     "cupos" => 4,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "Personal de Prensa",
                     "value" => "Personal de Prensa",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "Poder Judicial",
                     "value" => "Poder Judicial",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "Prevención Salud",
                     "value" => "Prevención Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "Sancor Salud Conectividad",
                     "value" => "Sancor Salud Conectividad",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "Sanidad Luis Pasteur",
                     "value" => "Sanidad Luis Pasteur",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "Seguro (OSSEG),",
                     "value" => "Seguro (OSSEG),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "Servicio Penitenciario Federal",
                     "value" => "Servicio Penitenciario Federal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "Servesalud",
                     "value" => "Servesalud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "SMATA",
                     "value" => "SMATA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "SOMU",
                     "value" => "SOMU",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "Swiss Medical",
                     "value" => "Swiss Medical",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SCIS",
                     "value" => "SCIS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "SMAI (Policía Federal),",
                     "value" => "SMAI (Policía Federal),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "TV Salud",
                     "value" => "TV Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "Unión Personal Accord Salud",
                     "value" => "Unión Personal Accord Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "Visitar (Andar),",
                     "value" => "Visitar (Andar),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "OSDE",
                     "value" => "OSDE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "ART Provincia",
                     "value" => "ART Provincia",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "ART Asociart",
                     "value" => "ART Asociart",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "ART Colonia Suiza",
                     "value" => "ART Colonia Suiza",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "ART Experta/La Caja",
                     "value" => "ART Experta/La Caja",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "ART Federación Patronal",
                     "value" => "ART Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "ART Galeno",
                     "value" => "ART Galeno",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "ART La Holando",
                     "value" => "ART La Holando",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "ART La Segunda",
                     "value" => "ART La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "ART Medicar Work",
                     "value" => "ART Medicar Work",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "ART Numuse",
                     "value" => "ART Numuse",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "ART Omint",
                     "value" => "ART Omint",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "ART Plenus",
                     "value" => "ART Plenus",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "ART Prevención",
                     "value" => "ART Prevención",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "ART Río Varadero",
                     "value" => "ART Río Varadero",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "Asociación Argentina de Volantes",
                     "value" => "Asociación Argentina de Volantes",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "PROME-Protección Médica Escolar",
                     "value" => "PROME-Protección Médica Escolar",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "Seguros Integro",
                     "value" => "Seguros Integro",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "Seguros Personales Federación Patronal",
                     "value" => "Seguros Personales Federación Patronal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "Seguros Personales La Segunda",
                     "value" => "Seguros Personales La Segunda",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "Seguros Personales San Cristóbal",
                     "value" => "Seguros Personales San Cristóbal",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "72" => Array
                 (
                     "label" => "Seguros Sáncor de Persona",
                     "value" => "Seguros Sáncor de Persona",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
 
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
 $all_obras[] = $config_medico;
 endif;
 
 if( $medico == 5 || isset($all_medicos) ): //"5" =>"UROLOGO: DR ACHITE MARCELO"
 
    $config_medico = array(
    
         "obras_sociales" => Array
         (
             "0" => Array
                 (
                     "label" => "IN.S.S.S.E.P.",
                     "value" => "IN.S.S.S.E.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "1" => Array
                 (
                     "label" => "OSIAD (ACEITEROS),",
                     "value" => "OSIAD (ACEITEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "2" => Array
                 (
                     "label" => "OSAPM",
                     "value" => "OSAPM",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "3" => Array
                 (
                     "label" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "value" => "A.M.U.R. ASOCIACIÓN MUTUAL RURALISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "4" => Array
                 (
                     "label" => "ATSA",
                     "value" => "ATSA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "5" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - CONVENIO",
                     "value" => "IN.S.S.S.E.P. - CONVENIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "6" => Array
                 (
                     "label" => "ASIPSALUD SRL",
                     "value" => "ASIPSALUD SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "7" => Array
                 (
                     "label" => "SANTA CLARA SALUD",
                     "value" => "SANTA CLARA SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "8" => Array
                 (
                     "label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "9" => Array
                 (
                     "label" => "IOSFA",
                     "value" => "IOSFA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "10" => Array
                 (
                     "label" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "value" => "MUTUAL FEDERADA 25 DE JUNIO SPR GRUPO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "11" => Array
                 (
                     "label" => "OPDEA",
                     "value" => "OPDEA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "12" => Array
                 (
                     "label" => "OSPIL (INDUSTRIA LECHERA),",
                     "value" => "OSPIL (INDUSTRIA LECHERA),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "13" => Array
                 (
                     "label" => "IMAGEN EN SALUD SA",
                     "value" => "IMAGEN EN SALUD SA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "14" => Array
                 (
                     "label" => "PODER JUDICIAL",
                     "value" => "PODER JUDICIAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "15" => Array
                 (
                     "label" => "SUPERINTENDENCIA DE BIENESTAR",
                     "value" => "SUPERINTENDENCIA DE BIENESTAR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "16" => Array
                 (
                     "label" => "Sancor Salud",
                     "value" => "Sancor Salud",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "17" => Array
                 (
                     "label" => "GLOBAL EMPRESARIA S.A.",
                     "value" => "GLOBAL EMPRESARIA S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "18" => Array
                 (
                     "label" => "OSETYA (EMPLEADOS TEXTILES),",
                     "value" => "OSETYA (EMPLEADOS TEXTILES),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "19" => Array
                 (
                     "label" => "ITER MEDICINA",
                     "value" => "ITER MEDICINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "20" => Array
                 (
                     "label" => "PARANÁ SALUD S.A.",
                     "value" => "PARANÁ SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "21" => Array
                 (
                     "label" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "value" => "DIRECCIÓN DE OBRA SOCIAL DEL SPF U7",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "22" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "23" => Array
                 (
                     "label" => "U.T.A . CHACO",
                     "value" => "U.T.A . CHACO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "24" => Array
                 (
                     "label" => "ISSUNNE",
                     "value" => "ISSUNNE",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "25" => Array
                 (
                     "label" => "OSPIM (MADEREROS),",
                     "value" => "OSPIM (MADEREROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "26" => Array
                 (
                     "label" => "OSPEDyC",
                     "value" => "OSPEDyC",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "27" => Array
                 (
                     "label" => "O.S.S.E.G.",
                     "value" => "O.S.S.E.G.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "28" => Array
                 (
                     "label" => "OSPERYH",
                     "value" => "OSPERYH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "29" => Array
                 (
                     "label" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "value" => "OB.SOCIAL PERS. DIRECCIÓN SANIDAD LUIS PASTEUR",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "30" => Array
                 (
                     "label" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "value" => "TV SALUD - O.S. PERSONAL DE TELEVISIÓN",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "31" => Array
                 (
                     "label" => "O.S.U.O.M.R.A.",
                     "value" => "O.S.U.O.M.R.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "32" => Array
                 (
                     "label" => "O.S.C.T.C.P.",
                     "value" => "O.S.C.T.C.P.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "33" => Array
                 (
                     "label" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "value" => "CONFERENCIA EPISCOPAL ARGENTINA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "34" => Array
                 (
                     "label" => "A.M.F.F.A.",
                     "value" => "A.M.F.F.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "35" => Array
                 (
                     "label" => "SCIS S.A. - OS DE CERVECEROS",
                     "value" => "SCIS S.A. - OS DE CERVECEROS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "36" => Array
                 (
                     "label" => "OSPIDA",
                     "value" => "OSPIDA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "37" => Array
                 (
                     "label" => "MUT. FEDERADA 25 DE JUNIO",
                     "value" => "MUT. FEDERADA 25 DE JUNIO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "38" => Array
                 (
                     "label" => "MEDICUS",
                     "value" => "MEDICUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "39" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "40" => Array
                 (
                     "label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "41" => Array
                 (
                     "label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "42" => Array
                 (
                     "label" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "value" => "DASUTEN - UNIVERSIDAD TECNOLÓGICA NACIONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "43" => Array
                 (
                     "label" => "LUIS ALBERTO DAJRUCH",
                     "value" => "LUIS ALBERTO DAJRUCH",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "44" => Array
                 (
                     "label" => "S.R.T.",
                     "value" => "S.R.T.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "45" => Array
                 (
                     "label" => "COSECHA SALUD PYMES",
                     "value" => "COSECHA SALUD PYMES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "46" => Array
                 (
                     "label" => "SWISS MEDICAL S.A.",
                     "value" => "SWISS MEDICAL S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "47" => Array
                 (
                     "label" => "OMINT S.A.",
                     "value" => "OMINT S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "48" => Array
                 (
                     "label" => "JERARQUICOS SALUD",
                     "value" => "JERARQUICOS SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "49" => Array
                 (
                     "label" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "value" => "IN.S.S.S.E.P. - EX COMBATIENTES",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "50" => Array
                 (
                     "label" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "value" => "MEDIFÉ ASOCIACIÓN CIVIL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "51" => Array
                 (
                     "label" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "value" => "ACA SALUD COOP. DE SERV. MEDICOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "52" => Array
                 (
                     "label" => "OSPIDA STADYCA",
                     "value" => "OSPIDA STADYCA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "53" => Array
                 (
                     "label" => "UNIÓN DEL PERSONAL",
                     "value" => "UNIÓN DEL PERSONAL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "54" => Array
                 (
                     "label" => "O.S.Pe.Con.",
                     "value" => "O.S.Pe.Con.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "55" => Array
                 (
                     "label" => "Osmedica",
                     "value" => "Osmedica",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "56" => Array
                 (
                     "label" => "ACCORD SALUD",
                     "value" => "ACCORD SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "57" => Array
                 (
                     "label" => "PAMI RED LOMA LINDA",
                     "value" => "PAMI RED LOMA LINDA",
                     "limitado" => "true",
                     "cupos" => 4,
                     "grupo" => false
                 ),
 
             "58" => Array
                 (
                     "label" => "GALENO",
                     "value" => "GALENO",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "59" => Array
                 (
                     "label" => "OSPESCHA",
                     "value" => "OSPESCHA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "60" => Array
                 (
                     "label" => "ISSUNCAUS",
                     "value" => "ISSUNCAUS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "61" => Array
                 (
                     "label" => "AMSTERDAM SALUD S.A.",
                     "value" => "AMSTERDAM SALUD S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "62" => Array
                 (
                     "label" => "OSALARA",
                     "value" => "OSALARA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "63" => Array
                 (
                     "label" => "BRAMED",
                     "value" => "BRAMED",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "64" => Array
                 (
                     "label" => "SCIS - MEDICINA PRIVADA NO GRABADOS",
                     "value" => "SCIS - MEDICINA PRIVADA NO GRABADOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "65" => Array
                 (
                     "label" => "SCIS - MEDICINA PRIVADA - GRAVADOS",
                     "value" => "SCIS - MEDICINA PRIVADA - GRAVADOS",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "66" => Array
                 (
                     "label" => "O.S.P.I.V.",
                     "value" => "O.S.P.I.V.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "67" => Array
                 (
                     "label" => "SISTEMAS MEDICOS SRL",
                     "value" => "SISTEMAS MEDICOS SRL",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "68" => Array
                 (
                     "label" => "VISITAR PREVENCIÓN SALUD",
                     "value" => "VISITAR PREVENCIÓN SALUD",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "69" => Array
                 (
                     "label" => "UTEPLIM S.A.",
                     "value" => "UTEPLIM S.A.",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "70" => Array
                 (
                     "label" => "ELEVAR (PASTELEROS),",
                     "value" => "ELEVAR (PASTELEROS),",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 ),
 
             "71" => Array
                 (
                     "label" => "OSPRERA",
                     "value" => "OSPRERA",
                     "limitado" => false,
                     "cupos" => 3,
                     "grupo" => false
                 )
         ),
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
$all_obras[] = $config_medico;
 endif;
 
