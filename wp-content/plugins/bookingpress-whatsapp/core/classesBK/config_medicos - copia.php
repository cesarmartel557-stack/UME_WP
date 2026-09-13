<?php


$all_obras = [];


if( $medico == 3 || isset($all_medicos) ): //VERONICA ACEVEDO

$config_medico = array(
    "obras_sociales"=>[
        array("label"=>"PAMI","value"=>"PAMI", "limitado"=>true, "cupos"=>1, "\$isDisabled"=>true, "grupo"=>false),
        array("label"=>"PAMI - LOMA LINDA","value"=>"PAMI - LOMA LINDA", "limitado"=>true, "cupos"=>2, "grupo"=>false),
        array("label"=>"JERÁRQUICOS SALUD","value"=>"JERÁRQUICOS SALUD", "limitado"=>false, "cupos"=>2, "grupo"=>false),
        array("label"=>"OSDE","value"=>"OSDE", "limitado"=>false, "cupos"=>2, "grupo"=>false),
        array("label"=>"INSSSEP","value"=>"INSSSEP", "limitado"=>false, "cupos"=>2, "grupo"=>false), 
    ],
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] los mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
    
    $all_obras[] = $config_medico;
endif;


if( $medico == 17 || isset($all_medicos) )://"17" =>"CARDIOLOGO: DR GYOKER JUAN DAVID

$config_medico = array(
    "obras_sociales"=>[
        array("label"=>"PAMI","value"=>"PAMI", "limitado"=>true, "cupos"=>3, "cupo_x_obra"=>true, "grupo"=>false),
        //array("label"=>"PAMI - COLEGIO MEDICO","value"=>"PAMI - COLEGIO MEDICO", "limitado"=>true, "cupos"=>3, "cupo_x_obra"=>true, "grupo"=>false),
        //array("label"=>"PAMI - CLINICA GIULIANI","value"=>"PAMI - CLINICA GIULIANI", "limitado"=>true, "cupos"=>3, "cupo_x_obra"=>true, "grupo"=>false),
        //array("label"=>"PAMI - UNCAUS","value"=>"PAMI - UNCAUS", "limitado"=>true, "cupos"=>3, "cupo_x_obra"=>true, "grupo"=>false),
        array("label"=>"INSSSEP","value"=>"INSSSEP", "limitado"=>false, "cupos"=>3, "grupo"=>false), 
        array("label"=>"INSSSEP - CONVENIO","value"=>"INSSSEP - CONVENIO", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        
        array("label"=>"OSIAD (ACEITEROS) ","value"=>"OSIAD (ACEITEROS)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSAPM (AGENTES DE PROPAGANDA MÉDICA)","value"=>"OSAPM (AGENTES DE PROPAGANDA MÉDICA)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"AMUR","value"=>"AMUR", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"ATSA","value"=>"ATSA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"AMFFA (Asoc. Mutual Farmacéutica)","value"=>"AMFFA (Asoc. Mutual Farmacéutica)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"ASIPSALUD SRL","value"=>"ASIPSALUD SRL", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        
        array("label"=>"SANTA CLARA SALUD SA","value"=>"SANTA CLARA SALUD SA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO","value"=>"TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"IOSFA","value"=>"IOSFA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"MUT. FEDERADA 25 DE JUNIO","value"=>"MUT. FEDERADA 25 DE JUNIO", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OPDEA","value"=>"OPDEA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSPIL (INDUSTRIA LECHERA)","value"=>"OSPIL (INDUSTRIA LECHERA)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        
        
    ],
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>15 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
    
    $config_medico['seguros_convenio'] = array(
    array("label"=>"ART Provincia","value"=>"ART Provincia", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Asociart","value"=>"ART Asociart", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Colonia Suiza","value"=>"ART Colonia Suiza", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Experta/La Caja","value"=>"ART Experta/La Caja", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Federación Patronal","value"=>"ART Federacion Patronal", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Galeno","value"=>"ART Galeno", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART La Holando","value"=>"ART La Holando", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART La Segunda","value"=>"ART La Segunda", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Medicar Work","value"=>"ART Medicar Work", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Numuse","value"=>"ART Numuse", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Omint","value"=>"ART Omint", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Plenus","value"=>"ART Plenus", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Prevención","value"=>"ART Prevencion", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Río Varadero","value"=>"ART Rio Varadero", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Asociación Argentina de Volantes","value"=>"Asociacion Argentina de Volantes", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"PROME-Protección Médica Escolar","value"=>"PROME-Protección Médica Escolar", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Seguros Integro","value"=>"Seguros Integro", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Seguros Personales Federación Patronal","value"=>"Seguros Personales Federacion Patronal", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Seguros Personales La Segunda","value"=>"Seguros Personales La Segunda", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Seguros Personales San Cristóbal","value"=>"Seguros Personales San Cristobal", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Seguros Sáncor de Persona","value"=>"Seguros Sancor de Persona", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    );
    
    
    $all_obras[] = $config_medico;
endif;


if( $medico == 18 || isset($all_medicos) )://"18" =>"CARDIOLOGA: DRA GYOKER NATALIA

$config_medico = array(
    "obras_sociales"=>[
        array("label"=>"PAMI","value"=>"PAMI", "limitado"=>true, "cupos"=>3, "cupo_x_obra"=>true, "grupo"=>false),
        //array("label"=>"PAMI - COLEGIO MEDICO","value"=>"PAMI - COLEGIO MEDICO", "limitado"=>true, "cupos"=>3, "cupo_x_obra"=>true, "grupo"=>false),
        //array("label"=>"PAMI - CLINICA GIULIANI","value"=>"PAMI - CLINICA GIULIANI", "limitado"=>true, "cupos"=>3, "cupo_x_obra"=>true, "grupo"=>false),
        //array("label"=>"PAMI - UNCAUS","value"=>"PAMI - UNCAUS", "limitado"=>true, "cupos"=>3, "cupo_x_obra"=>true, "grupo"=>false),
        array("label"=>"INSSSEP","value"=>"INSSSEP", "limitado"=>false, "cupos"=>3, "grupo"=>false), 
        array("label"=>"INSSSEP - CONVENIO","value"=>"INSSSEP - CONVENIO", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        
        array("label"=>"OSIAD (ACEITEROS) ","value"=>"OSIAD (ACEITEROS)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSAPM (AGENTES DE PROPAGANDA MÉDICA)","value"=>"OSAPM (AGENTES DE PROPAGANDA MÉDICA)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"AMUR","value"=>"AMUR", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"ATSA","value"=>"ATSA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"AMFFA (Asoc. Mutual Farmacéutica)","value"=>"AMFFA (Asoc. Mutual Farmacéutica)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"ASIPSALUD SRL","value"=>"ASIPSALUD SRL", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        
        array("label"=>"SANTA CLARA SALUD SA","value"=>"SANTA CLARA SALUD SA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO","value"=>"TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"IOSFA","value"=>"IOSFA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"MUT. FEDERADA 25 DE JUNIO","value"=>"MUT. FEDERADA 25 DE JUNIO", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OPDEA","value"=>"OPDEA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSPIL (INDUSTRIA LECHERA)","value"=>"OSPIL (INDUSTRIA LECHERA)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"HEMISFERIO SALUD","value"=>"HEMISFERIO SALUD", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=> "PODER JUDICIAL","value"=> "PODER JUDICIAL", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SUPERINTENDENCIA DE BIENESTAR","value"=>"SUPERINTENDENCIA DE BIENESTAR", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SANCOR SALUD","value"=>"SANCOR SALUD", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"GLOBAL EMPRESARIA S.A.","value"=>"GLOBAL EMPRESARIA S.A.", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSETYA (TEXTILES Y AFINES)","value"=>"OSETYA (TEXTILES Y AFINES)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"ITER MEDICINA","value"=>"ITER MEDICINA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"PARANA SALUD","value"=>"PARANA SALUD", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SPF ( SERV. PENT. FEDERAL)","value"=>"SPF ( SERV. PENT. FEDERAL)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSCHOCA","value"=>"OSCHOCA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"UTA (CHACO)","value"=>"UTA (CHACO)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"ISSUNNE","value"=>"ISSUNNE", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSPIM (MADEREROS)","value"=>"OSPIM (MADEREROS)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSPEDYC","value"=>"OSPEDYC", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSSEG","value"=>"OSSEG", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSPERYH","value"=>"OSPERYH", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SANIDAD LUIS PASTEUR","value"=>"SANIDAD LUIS PASTEUR", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"TV SALUD - OS PERSONAL DE TELEVISIÓN","value"=>"TV SALUD - OS PERSONAL DE TELEVISIÓN", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"UOM (CHACO)","value"=>"UOM (CHACO)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSCTCP","value"=>"OSCTCP", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"CONFERENCIA EPISCOPAL ARGENTINA","value"=>"CONFERENCIA EPISCOPAL ARGENTINA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"AMFFA (Asoc. Mutual Farmacéutica)","value"=>"AMFFA (Asoc. Mutual Farmacéutica)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SCIS - CERVECEROS","value"=>"SCIS - CERVECEROS", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSPIDA (STADYCA)","value"=>"OSPIDA (STADYCA)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"MUT. FEDERADA 25 DE JUNIO","value"=>"MUT. FEDERADA 25 DE JUNIO", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"MEDICUS","value"=>"MEDICUS", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"INSSSEP - CONVENIO","value"=>"INSSSEP - CONVENIO", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL","value"=>"SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA","value"=>"SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA","value"=>"SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"DASUTEN","value"=>"DASUTEN", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"LUIS ALBERTO DAJRUCH","value"=>"LUIS ALBERTO DAJRUCH", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SUPERINTENDENCIA DE RIESGOS DE TRABAJO","value"=>"SUPERINTENDENCIA DE RIESGOS DE TRABAJO", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"COSECHA SALUD","value"=>"COSECHA SALUD", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SWISS MEDICAL","value"=>"SWISS MEDICAL", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OMINT","value"=>"OMINT", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"JERÁRQUICOS SALUD","value"=>"JERÁRQUICOS SALUD", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"INSSSEP - EX COMBATIENTES","value"=>"INSSSEP - EX COMBATIENTES  ", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"MEDIFE","value"=>"MEDIFE", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"ACA SALUD","value"=>"ACA SALUD", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSPIDA (STADYCA)","value"=>"OSPIDA (STADYCA)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"UNIÓN DEL PERSONAL CIVIL DE LA NACIÓN","value"=>"UNIÓN DEL PERSONAL CIVIL DE LA NACIÓN", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSPeCon","value"=>"OSPeCon", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        
        array("label"=>"OSMEDICA","value"=>"OSMEDICA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"UNIÓN PERSONAL - ACCORD SALUD","value"=>"UNIÓN PERSONAL - ACCORD SALUD", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"GALENO ARGENTINO S.A.","value"=>"GALENO ARGENTINO S.A.", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSPESCHA","value"=>"OSPESCHA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"INSSSEP - CONVENIO","value"=>"INSSSEP - CONVENIO", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"ISSUNCAUS","value"=>"ISSUNCAUS", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"AMSTERDAM SALUD","value"=>"AMSTERDAM SALUD", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"JERÁRQUICOS SALUD","value"=>"JERÁRQUICOS SALUD", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSALARA","value"=>"OSALARA", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"BRAMED","value"=>"BRAMED", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SCIS - (NO GRAVADO)","value"=>"SCIS - (NO GRAVADO)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SCIS - (GRAVADO)","value"=>"SCIS - (GRAVADO)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"OSPIV","value"=>"OSPIV", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"SISTEMAS MEDICOS SRL","value"=>"SISTEMAS MEDICOS SRL", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        
        array("label"=>"VISITAR PREVENCIÓN SALUD","value"=>"VISITAR PREVENCIÓN SALUD", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"UTEPLIM S.A.","value"=>"UTEPLIM S.A.", "limitado"=>false, "cupos"=>3, "grupo"=>false),
        array("label"=>"ELEVAR (PASTELEROS)","value"=>"ELEVAR (PASTELEROS)", "limitado"=>false, "cupos"=>3, "grupo"=>false),
               
        
        
    ],
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [ ],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    
    
    $config_medico['seguros_convenio'] = array(
    array("label"=>"ART Provincia","value"=>"ART Provincia", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Asociart","value"=>"ART Asociart", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Colonia Suiza","value"=>"ART Colonia Suiza", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Experta/La Caja","value"=>"ART Experta/La Caja", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Federación Patronal","value"=>"ART Federacion Patronal", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Galeno","value"=>"ART Galeno", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART La Holando","value"=>"ART La Holando", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART La Segunda","value"=>"ART La Segunda", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Medicar Work","value"=>"ART Medicar Work", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Numuse","value"=>"ART Numuse", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Omint","value"=>"ART Omint", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Plenus","value"=>"ART Plenus", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Prevención","value"=>"ART Prevencion", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"ART Río Varadero","value"=>"ART Rio Varadero", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Asociación Argentina de Volantes","value"=>"Asociacion Argentina de Volantes", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"PROME-Protección Médica Escolar","value"=>"PROME-Protección Médica Escolar", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Seguros Integro","value"=>"Seguros Integro", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Seguros Personales Federación Patronal","value"=>"Seguros Personales Federacion Patronal", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Seguros Personales La Segunda","value"=>"Seguros Personales La Segunda", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Seguros Personales San Cristóbal","value"=>"Seguros Personales San Cristobal", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    array("label"=>"Seguros Sáncor de Persona","value"=>"Seguros Sancor de Persona", "limitado"=>false, "cupos"=>100, "grupo"=>false),
    );
    
    
    $all_obras[] = $config_medico;
endif;


include_once __DIR__ . '/obras_Cesar_2.php';


if( $medico == 34 || isset($all_medicos) ): //34 CLINICA DRA PREISLER LAURA


$config_medico = array(
    "obras_sociales"=>[
			array("label" => "INSSSEP", "value" => "INSSSEP", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSIAD (ACEITEROS)", "value" => "OSIAD (ACEITEROS)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSAPM (AGENTES DE PROPAGANDA MÉDICA)", "value" => "OSAPM (AGENTES DE PROPAGANDA MÉDICA)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "AMUR", "value" => "AMUR", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ATSA", "value" => "ATSA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "INSSSEP - CONVENIO", "value" => "INSSSEP - CONVENIO", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ASIPSALUD SRL", "value" => "ASIPSALUD SRL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SANTA CLARA SALUD SA", "value" => "SANTA CLARA SALUD SA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO", "value" => "TACCHI JULIO Y TACCHI JUAN CARLOS - SOC. DE HECHO", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "IOSFA", "value" => "IOSFA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "MUT. FEDERADA 25 DE JUNIO", "value" => "MUT. FEDERADA 25 DE JUNIO", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OPDEA", "value" => "OPDEA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPIL (INDUSTRIA LECHERA)", "value" => "OSPIL (INDUSTRIA LECHERA)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "HEMISFERIO SALUD", "value" => "HEMISFERIO SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "PODER JUDICIAL", "value" => "PODER JUDICIAL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SUPERINTENDENCIA DE BIENESTAR", "value" => "SUPERINTENDENCIA DE BIENESTAR", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SANCOR SALUD", "value" => "SANCOR SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "GLOBAL EMPRESARIA S.A.", "value" => "GLOBAL EMPRESARIA S.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSETYA (TEXTILES Y AFINES)", "value" => "OSETYA (TEXTILES Y AFINES)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ITER MEDICINA", "value" => "ITER MEDICINA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "PARANA SALUD", "value" => "PARANA SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SPF ( SERV. PENT. FEDERAL)", "value" => "SPF ( SERV. PENT. FEDERAL)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSCTCP", "value" => "OSCTCP", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "UTA (CHACO)", "value" => "UTA (CHACO)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ISSUNNE", "value" => "ISSUNNE", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPIM (MADEREROS)", "value" => "OSPIM (MADEREROS)", "limitado" => false, "cupos" => 3, "grupo" => false),
            array("label" => "OSPEDYC", "value" => "OSPEDYC", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSSEG", "value" => "OSSEG", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPERYH", "value" => "OSPERYH", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SANIDAD LUIS PASTEUR", "value" => "SANIDAD LUIS PASTEUR", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "TV SALUD - OS PERSONAL DE TELEVISIÓN", "value" => "TV SALUD - OS PERSONAL DE TELEVISIÓN", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SANIDAD LUIS PASTEUR", "value" => "SANIDAD LUIS PASTEUR", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSCTCP", "value" => "OSCTCP", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "CONFERENCIA EPISCOPAL ARGENTINA", "value" => "CONFERENCIA EPISCOPAL ARGENTINA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "AMFFA (Asoc. Mutual Farmacéutica)", "value" => "AMFFA (Asoc. Mutual Farmacéutica)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SCIS - CERVECEROS", "value" => "SCIS - CERVECEROS", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPIDA (STADYCA)", "value" => "OSPIDA (STADYCA)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "MUT. FEDERADA 25 DE JUNIO", "value" => "MUT. FEDERADA 25 DE JUNIO", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "MEDICUS", "value" => "MEDICUS", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL", "value" => "SUPERINTENDENCIA R.T. COMISIÓN MED. CENTRAL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA", "value" => "SUPERINTENDENCIA R.T. COM. MÉDICA 40 C RECONQUISTA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA", "value" => "SUPERINTENDENCIA AFJP - COMISIÓN R. SAENZ PEÑA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "DASUTEN", "value" => "DASUTEN", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "LUIS ALBERTO DAJRUCH", "value" => "LUIS ALBERTO DAJRUCH", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "COSECHA SALUD", "value" => "COSECHA SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SWISS MEDICAL", "value" => "SWISS MEDICAL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OMINT", "value" => "OMINT", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "JERÁRQUICOS SALUD", "value" => "JERÁRQUICOS SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "INSSSEP - EX COMBATIENTES", "value" => "INSSSEP - EX COMBATIENTES", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "MEDIFE", "value" => "MEDIFE", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ACA SALUD", "value" => "ACA SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPIDA (STADYCA)", "value" => "OSPIDA (STADYCA)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "UNIÓN PERSONAL", "value" => "UNIÓN PERSONAL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPeCon", "value" => "OSPeCon", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSMEDICA", "value" => "OSMEDICA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ACCORD SALUD", "value" => "ACCORD SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "GALENO ARGENTINO S.A.", "value" => "GALENO ARGENTINO S.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPESCHA", "value" => "OSPESCHA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ISSUNCAUS", "value" => "ISSUNCAUS", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "AMSTERDAM SALUD", "value" => "AMSTERDAM SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSALARA", "value" => "OSALARA", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "BRAMED", "value" => "BRAMED", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SCIS", "value" => "SCIS", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPIV", "value" => "OSPIV", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "SISTEMAS MEDICOS SRL", "value" => "SISTEMAS MEDICOS SRL", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "VISITAR PREVENCIÓN SALUD", "value" => "VISITAR PREVENCIÓN SALUD", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "UTEPLIM S.A.", "value" => "UTEPLIM S.A.", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "ELEVAR (PASTELEROS)", "value" => "ELEVAR (PASTELEROS)", "limitado" => false, "cupos" => 3, "grupo" => false),
			array("label" => "OSPRERA", "value" => "OSPRERA", "limitado" => false, "cupos" => 3, "grupo" => false)
    ],
    "particular_habilitado"=>true,//agrega particular a la lista de seleccion
    "solo_particular"=>false,
    "regla_particular"=> [ 
        'rango_fechas' => [], //[20,24] entre 20 y 24 particular
        'days' => [ ],//[ "mier" ,"mar"] loas mier y martes particular
        'rango_horas' => [ ],//["14:00","20:00"] de 14 a 20hrs particular
        'days_horas_conjunto'=> false,//Si se pone TRUE es necesario que coincida dia y rango de hora para particular
        'max_obra_soc_x_dia'=>0 //numero maximo de obras sociales por dia si es 0 se ignora
    ],
    "total_obras_day_cont"=>0
    );
    /*
    $config_medico['seguros_convenio'] = [
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
    ];
   */
if ( isset($all_medicos) ){
    //$a = $config_medico["obras_sociales"];
    //$a = array_column($a, 'value');
    //echo count( $a )."<br /><br />";
}
    
$all_obras[] = $config_medico;
endif;

