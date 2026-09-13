<html>
<head>
<title>TURNOS SANATORIO</title>
<meta charset="UTF-8"/>

</head>
<body>
<?php
global $pdoDB;
$dbCon = null;

/**
 * AVAILABLE DRIVERS PDO
 */
 echo "<br />ALAILABLE PDO DRIVERS:<br /> ";
 
 var_dump( PDO::getAvailableDrivers() );
 echo "<br />FIN ALAILABLE PDO DRIVERS<br /><br />";

#phpinfo();

### GOOD!!! $dsn =  'dblib:dbname=LomaLindaSRL;host=45.226.28.100;charset=UTF-8';

#$dsn =  'sqlsrv:database=LomaLindaSRL;server=45.226.28.100; ';//requires the Microsoft ODBC Driver for SQL Server  //Server=localhost;Database=testdb

### $dsn =  'dblib:Database=LomaLindaSRL;Server=45.226.28.100;charset=UTF-8'; 

//dblib:host=your_hostname;dbname=your_db;charset=UTF-8



$dsn =  'dblib:dbname=LomaLindaSRL;host=45.226.28.100;charset=UTF-8';//$dsn =  'dblib:dbname=LomaLindaSRL;host=45.226.28.100;charset=UTF-8';
$dsn =  'dblib:dbname=LomaLindaSRL;host=45.226.28.100;charset=UTF-8';
$usuario = "sa";
$contraseña = "LomaLinda123";

try {
    $pdoDB = new PDO($dsn, $usuario, $contraseña);
    $GLOBALS['pdodb'] = $pdoDB;

} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

echo "<br />***********<br />";


    $sql = "SELECT TOP 1000 * FROM V_TURNOS_AMBULATORIOS ORDER BY ID_TURNO_AMBU DESC";
    
    /**
     * CONDICION DE FECHAS POSTERIORES
     * UTILIZANDO LA FECHA ACTUAL
     * (FECHAS POR ATENDER)
     */
     ### date_default_timezone_set('UTC');
     ### $dia = date("Y-m-d", time() ); //2018-02-28 00:00:00.000000
     
    $sql = "SELECT TOP 1000 * FROM V_TURNOS_AMBULATORIOS WHERE FECHA >= GETUTCDATE() ORDER BY ID_TURNO_AMBU ASC";//GETDATE()
    
    if( $pdoDB ){
    
    //get_all_results( $sql );
    
    get_all_results( "SELECT * FROM V_CHANGES" );

    }

echo "<br />***********<br />";


    function get_all_results( $sql = "" ){
        global $pdodb;
        $pdoStatment = $pdodb->query( $sql );
        if( $pdoStatment ){
            var_dump( $pdoStatment->fetchAll() );
        }else{
            echo "<br /> NO HAY RESULTADOS.. <br />";
        }
    }











//exit();
echo "<br /><br /> Prueba 2: <br /><br />";

$serverName = "45.226.28.100, 1433";
$serverName = "45.226.28.100, 1433";//serverName\instanceName, portNumber (por defecto es 1433) //serverName\sqlexpress, 1542
$connectionInfo = array( "Database"=>"LomaLindaSRL", "UID"=>"sa", "PWD"=>"LomaLinda123", 'CharacterSet'=>'UTF-8');

if( function_exists('sqlsrv_connect') ){

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
     global $dbCon;
     $dbCon = $conn;
}else{
     echo "Conexión no se pudo establecer.<br />";
     print_r( sqlsrv_errors(), true) ;
     var_dump( $conn );
}



}else{
    echo "no existe LA FUNCION sqlsrv_connect ";
}

echo "<br /><br />";

if($dbCon){
    
    echo "Consulta:<br />";
    
    #$server_info = sqlsrv_server_info( $dbCon );
    #var_dump( $server_info );
    
    
    /**
     * FECHA SOLICITA DESC
     * FECHA QUE REALIZA LA SOLICITUD EN ORDEN DESENDIENTE -- (ULTIMAS SOLICITUDES) BASADAS EN LA HORA
     */
    $sql = "SELECT TOP 10 * FROM V_TURNOS_AMBULATORIOS ORDER BY ID_TURNO_AMBU DESC";//ORDER BY FECHA_SOLICITA DESC
    
    /**
     * CONDICION DE FECHAS POSTERIORES
     * UTILIZANDO LA FECHA ACTUAL
     * (FECHAS POR ATENDER)
     */
     ### date_default_timezone_set('UTC');
     ### $dia = date("Y-m-d", time() ); //2018-02-28 00:00:00.000000
     
      //SIN HACER: roldanSilvia Ginec 37 id:39
      
      /**
       * #FALTAN  182-GAB RAMOS
       * 
       * 
       * 182-RAMIREZ GABRIELA id:35 serv:17 Traumatología
       * 353-UEZ JOSE LUIS
       * 43-BRAVO GERARDO LUIS
       * 37-roldanSilvia Ginec 37 id:39
     */
     //ruiz 31 | natalia 352 |davv gyoker 88 | harasiwka 339 id:19  marisaLOPE 276 id:25 | NEST MANR 84 id:27 | 
     //PREILER 81 id:34 | rAMOS ARIEL 176 id:36 | 179-GEMETRO FELIPE id:13 | 260-ACHITTE MARCELO ALEJANDRO id:5 |
     //
    
//ID_PRESTADOR not in(31,352,88,339,276,84,81,176)
     // ID_PRESTADOR=339 AND TURNO like 'MAÑANA' AND AND TURNO like 'TARDE' PRESTADOR like '%PREIS%'  AND
     
     //ORDER BY ID_TURNO_AMBU ASC ["TURNO"]=> string(6) "MA�ANA"        IsNull(OBRA_SOCIAL,'')!=''   AND OBRA_SOCIAL LIKE 'PARTI%'     
    $sql = "SELECT TOP 1200 * FROM V_TURNOS_AMBULATORIOS WHERE ID_PRESTADOR=31 AND TURNO like 'MA%ANA' AND FECHA > GETUTCDATE() ORDER BY ID_PRESTADOR,FECHA,TURNO,TURNO_NRO ASC";//GETDATE()
    $sql = "SELECT TOP 1200 * FROM V_TURNOS_AMBULATORIOS WHERE ID_PRESTADOR=182 AND TURNO like 'tarde' AND ID_OBRA_SOCIAL!=283 AND ID_OBRA_SOCIAL!=0  AND FECHA > GETUTCDATE() AND PACIENTE!='TURNERA CERRADA' ORDER BY ID_PRESTADOR,FECHA,TURNO,TURNO_NRO ASC";//GETDATE()
    
    //SQLSRV_SCROLL_LAST
    
    $stmt = sqlsrv_query( $dbCon, $sql); 
    if(!$stmt){
        echo " La consulta no dio resultado.<br />";
        return;
    }
    #echo "<br /><strong style='color:blue;'>stm: </strong>";
    #var_dump(   $stmt  );

    
    #var_dump( sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) );
    //sqlsrv_fetch_object( $stmt )
    $indx = 0;$cuenta=0;$vacios=0;
    $max_loop = 1300;
    
    $turnitos=[];
    $cuenta_presta=[];
    
    $row = [];
    echo "[ 
    ";
    $f = fopen(__DIR__ .'/turnos_json.txt','wb');
        fwrite($f, "[" );
        fclose($f);
    ob_start();
    for( $indx=0;$indx<$max_loop;$indx++ ){
        ob_start();
    echo "<br />------------- $indx <br /><br />";
    
    $current_row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
    
    var_dump( $current_row );
    
    //$current_row["TURNO"]='MAÑANA';
    
    $fila = array_map( "json_encode",(array) $current_row );
    
     $fila = array_map( "json_decode",(array) $fila );
          
     $json= json_encode( $fila );
    
     
        //time_nanosleep(0,50000000);
     if( !empty($fila) ){
        echo "<br />";
        echo $json;
        echo ", 
        ";
        $turnitos[]= $fila['TURNO_NRO'];
        $f = fopen(__DIR__ .'/turnos_json.txt','a');
        fwrite($f, $json."," );
        fclose($f);
        $json='';
        $pres = $fila['ID_PRESTADOR'];
         if( isset($cuenta_presta[ $pres ]) ){
         $cuenta_presta[ $pres ]++;
         }else{
            $cuenta_presta[ $pres ]=1;
         }
     
     }
     
     ob_end_flush();
     ob_flush();
     flush();
    if( !empty($current_row) ){
        $cuenta++;
        echo "<br /> cuenta: $cuenta <br />";
        $row[ $current_row["ID_TURNO_AMBU"] ] = $current_row;
    }else{
        $vacios++;
        //echo " FINNN.... ";
        if($vacios > 0){
        break;
        }
    }
    
        
    
    }//END For
    ob_get_clean();
    echo "
    ]
    ";
    $f = fopen(__DIR__ .'/turnos_json.txt','a');
        fwrite($f, "]" );
        fclose($f);
    
    //$res= json_encode($row);
    //echo $res;
    
    echo "<br /><br />################*##############<br /><br />";
    asort($cuenta_presta);
    print_r($cuenta_presta);
    echo "<br /><br /> turnitos ";
    print_r($turnitos);
    ### print_r(  end($row) );
    
    
    
    
}
exit;
?>

<p></p>
<p></p>
<div style="color: green;border: 2px dashed blue;">

EJEMPLO DE RESULTADO:
<br />
object(stdClass)#3 (30) { ["ID_TURNO_AMBU"]=> int(10078) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(283) ["FECHA"]=> object(DateTime)#1 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(1) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#2 (3) { ["date"]=> string(26) "2018-01-29 10:09:58.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(22) "BERTOLOTTI MARTA ELENA" ["TEL"]=> string(13) "0341-15669057" ["ID_PACIENTE"]=> int(27010) ["ESTADO_TURNO"]=> string(10) "CONFIRMADO" ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(17) "PARTICULAR EXENTO" ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(8) "SACHAJOJ" ["FECHANACIMIENTO"]=> int(54448) ["NRODOCUMENTO"]=> int(6265003) ["NROAFILIADO"]=> string(7) "6265003" ["EDAD"]=> int(74) ["CONSULTA_AMBU"]=> int(1) }
<br />
<br />
------------- 0 
array(30) { ["ID_TURNO_AMBU"]=> int(10078) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(283) ["FECHA"]=> object(DateTime)#1 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(1) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#4 (3) { ["date"]=> string(26) "2018-01-29 10:09:58.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(22) "BERTOLOTTI MARTA ELENA" ["TEL"]=> string(13) "0341-15669057" ["ID_PACIENTE"]=> int(27010) ["ESTADO_TURNO"]=> string(10) "CONFIRMADO" ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(17) "PARTICULAR EXENTO" ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(8) "SACHAJOJ" ["FECHANACIMIENTO"]=> int(54448) ["NRODOCUMENTO"]=> int(6265003) ["NROAFILIADO"]=> string(7) "6265003" ["EDAD"]=> int(74) ["CONSULTA_AMBU"]=> int(1) } 
------------- 1 
array(30) { ["ID_TURNO_AMBU"]=> int(10079) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(290) ["FECHA"]=> object(DateTime)#5 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(2) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#6 (3) { ["date"]=> string(26) "2018-02-28 07:58:48.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(30) "ALBORNOZ ROBERTO RENE CASTILLA" ["TEL"]=> string(7) "4435028" ["ID_PACIENTE"]=> int(42766) ["ESTADO_TURNO"]=> string(10) "CONFIRMADO" ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(27) "PARTICULAR CONSUMIDOR FINAL" ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(34) "MZ 46 PC 8 B° 50 VIVIENDAS FONAVI" ["FECHANACIMIENTO"]=> int(54313) ["NRODOCUMENTO"]=> int(7851715) ["NROAFILIADO"]=> string(14) "15067982300000" ["EDAD"]=> int(74) ["CONSULTA_AMBU"]=> int(1) } 
------------- 2 
array(30) { ["ID_TURNO_AMBU"]=> int(10080) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(36) ["FECHA"]=> object(DateTime)#7 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(3) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#8 (3) { ["date"]=> string(26) "2018-02-27 08:25:26.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(16) "OLIVERA FAUSTINA" ["TEL"]=> string(20) "425050 / 3644-567496" ["ID_PACIENTE"]=> int(761) ["ESTADO_TURNO"]=> string(10) "CONFIRMADO" ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(12) "In.S.S.Se.P." ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(28) "C.209 E/204 Y 206 BºLAMADRID" ["FECHANACIMIENTO"]=> int(47895) ["NRODOCUMENTO"]=> int(1550101) ["NROAFILIADO"]=> string(7) "1550101" ["EDAD"]=> int(92) ["CONSULTA_AMBU"]=> int(1) } 
------------- 3 
array(30) { ["ID_TURNO_AMBU"]=> int(10081) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(424) ["FECHA"]=> object(DateTime)#9 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(4) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#10 (3) { ["date"]=> string(26) "2018-02-16 10:34:34.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(20) "FLEITA CLAUDIA NOEMI" ["TEL"]=> string(11) "3644-456776" ["ID_PACIENTE"]=> int(107348) ["ESTADO_TURNO"]=> string(10) "CONFIRMADO" ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(26) "UNION PERSONAL-MONOTRIBUTO" ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(9) "Bo YAPEYU" ["FECHANACIMIENTO"]=> NULL ["NRODOCUMENTO"]=> int(20651312) ["NROAFILIADO"]=> string(8) "68028401" ["EDAD"]=> int(55) ["CONSULTA_AMBU"]=> int(1) } 
------------- 4 
array(30) { ["ID_TURNO_AMBU"]=> int(10082) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(36) ["FECHA"]=> object(DateTime)#11 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(5) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#12 (3) { ["date"]=> string(26) "2018-02-26 18:37:07.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(28) "FERNANDEZ CAROLINA MARIANELA" ["TEL"]=> string(11) "31-15629448" ["ID_PACIENTE"]=> int(63296) ["ESTADO_TURNO"]=> string(10) "CONFIRMADO" ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(12) "In.S.S.Se.P." ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(13) "SARMIENTO 231" ["FECHANACIMIENTO"]=> int(68395) ["NRODOCUMENTO"]=> int(33667723) ["NROAFILIADO"]=> string(8) "32854226" ["EDAD"]=> int(36) ["CONSULTA_AMBU"]=> int(1) } 
------------- 5 
array(30) { ["ID_TURNO_AMBU"]=> int(10083) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(36) ["FECHA"]=> object(DateTime)#13 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(6) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#14 (3) { ["date"]=> string(26) "2018-02-27 10:05:17.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(13) "ALARCON ELIDA" ["TEL"]=> string(12) "3644- 615253" ["ID_PACIENTE"]=> int(88967) ["ESTADO_TURNO"]=> NULL ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(12) "In.S.S.Se.P." ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(22) "10 E 25 Y 27 B° OBRERO" ["FECHANACIMIENTO"]=> NULL ["NRODOCUMENTO"]=> int(14799507) ["NROAFILIADO"]=> string(5) "59380" ["EDAD"]=> int(61) ["CONSULTA_AMBU"]=> int(1) } 
------------- 6 
array(30) { ["ID_TURNO_AMBU"]=> int(10084) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(36) ["FECHA"]=> object(DateTime)#15 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(7) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#16 (3) { ["date"]=> string(26) "2018-02-27 10:30:38.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(15) "BARRIOS EULOGIA" ["TEL"]=> string(6) "480757" ["ID_PACIENTE"]=> int(28549) ["ESTADO_TURNO"]=> string(10) "CONFIRMADO" ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(12) "In.S.S.Se.P." ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(22) "MZ.1 PC.2 Bº S. MARTIN" ["FECHANACIMIENTO"]=> int(57416) ["NRODOCUMENTO"]=> int(12465654) ["NROAFILIADO"]=> string(8) "25132942" ["EDAD"]=> int(66) ["CONSULTA_AMBU"]=> int(1) } 
------------- 7 
array(30) { ["ID_TURNO_AMBU"]=> int(10085) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(173) ["FECHA"]=> object(DateTime)#17 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(8) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#18 (3) { ["date"]=> string(26) "2018-02-28 08:42:42.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(20) "ALEGRE NENECIA JUSTA" ["TEL"]=> string(6) "421060" ["ID_PACIENTE"]=> int(68744) ["ESTADO_TURNO"]=> string(10) "CONFIRMADO" ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(20) "PAMI-FUERA DE CAPITA" ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(29) "MZ 112 PC 20 Bº 713 VIVIENDAS" ["FECHANACIMIENTO"]=> int(49298) ["NRODOCUMENTO"]=> int(3574334) ["NROAFILIADO"]=> string(7) "3574334" ["EDAD"]=> int(88) ["CONSULTA_AMBU"]=> int(1) } 
------------- 8 
array(30) { ["ID_TURNO_AMBU"]=> int(10086) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(283) ["FECHA"]=> object(DateTime)#19 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(9) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#20 (3) { ["date"]=> string(26) "2018-02-28 10:08:33.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(28) "MALDONADO TRINIDAD DEL VALLE" ["TEL"]=> string(6) "492012" ["ID_PACIENTE"]=> int(29400) ["ESTADO_TURNO"]=> string(10) "CONFIRMADO" ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(17) "PARTICULAR EXENTO" ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(8) "SACHAYOJ" ["FECHANACIMIENTO"]=> int(59880) ["NRODOCUMENTO"]=> int(16980248) ["NROAFILIADO"]=> string(0) "" ["EDAD"]=> NULL ["CONSULTA_AMBU"]=> int(1) } 
------------- 9 
array(30) { ["ID_TURNO_AMBU"]=> int(10087) ["ID_PRESTADOR"]=> int(84) ["ID_OBRA_SOCIAL"]=> int(283) ["FECHA"]=> object(DateTime)#21 (3) { ["date"]=> string(26) "2018-02-28 00:00:00.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["HORA"]=> NULL ["TURNO_NRO"]=> int(10) ["TIPO_SOLICITUD"]=> NULL ["FECHA_SOLICITA"]=> object(DateTime)#22 (3) { ["date"]=> string(26) "2018-02-28 10:14:56.000000" ["timezone_type"]=> int(3) ["timezone"]=> string(3) "UTC" } ["TIPO_TURNO"]=> NULL ["MONTO_CONSULTA"]=> NULL ["MONTO_SENIA"]=> NULL ["MONTO_PLUS"]=> NULL ["TIPO_ABONO"]=> NULL ["TURNO_CONFIRMADO"]=> int(0) ["TURNO"]=> string(6) "MAÑANA" ["PACIENTE"]=> string(32) "PADULA ALEJANDRA MARIANA MARISOL" ["TEL"]=> string(11) "3644 551021" ["ID_PACIENTE"]=> int(107850) ["ESTADO_TURNO"]=> string(10) "CONFIRMADO" ["OBSERVACIONES"]=> NULL ["CONSULTORIO"]=> NULL ["FORMA_LLAMADO"]=> NULL ["OBRA_SOCIAL"]=> string(17) "PARTICULAR EXENTO" ["PRESTADOR"]=> string(15) "MANRIQUE NESTOR" ["DOMICILIO"]=> string(44) "S/CALLE S/N BELGRANO CENTRO SACHAYOJ ALBERDI" ["FECHANACIMIENTO"]=> NULL ["NRODOCUMENTO"]=> int(42889883) ["NROAFILIADO"]=> NULL ["EDAD"]=> int(23) ["CONSULTA_AMBU"]=> int(1) } 
------------- 10 
NULL FINNN.... Array ( [10078] => Array ( [ID_TURNO_AMBU] => 10078 [ID_PRESTADOR] => 84 [ID_OBRA_SOCIAL] => 283 [FECHA] => DateTime Object ( [date] => 2018-02-28 00:00:00.000000 [timezone_type] => 3 [timezone] => UTC ) [HORA] => [TURNO_NRO] => 1 [TIPO_SOLICITUD] => [FECHA_SOLICITA] => DateTime Object ( [date] => 2018-01-29 10:09:58.000000 [timezone_type] => 3 [timezone] => UTC ) [TIPO_TURNO] => [MONTO_CONSULTA] => [MONTO_SENIA] => [MONTO_PLUS] => [TIPO_ABONO] => [TURNO_CONFIRMADO] => 0 [TURNO] => MAÑANA [PACIENTE] => BERTOLOTTI MARTA ELENA [TEL] => 0341-15669057 [ID_PACIENTE] => 27010 [ESTADO_TURNO] => CONFIRMADO [OBSERVACIONES] => [CONSULTORIO] => [FORMA_LLAMADO] => [OBRA_SOCIAL] => PARTICULAR EXENTO [PRESTADOR] => MANRIQUE NESTOR [DOMICILIO] => SACHAJOJ [FECHANACIMIENTO] => 54448 [NRODOCUMENTO] => 6265003 [NROAFILIADO] => 6265003 [EDAD] => 74 [CONSULTA_AMBU] => 1 ) [10079] => Array ( [ID_TURNO_AMBU] => 10079 [ID_PRESTADOR] => 84 [ID_OBRA_SOCIAL] => 290 [FECHA] => DateTime Object ( [date] => 2018-02-28 00:00:00.000000 [timezone_type] => 3 [timezone] => UTC ) [HORA] => [TURNO_NRO] => 2 [TIPO_SOLICITUD] => [FECHA_SOLICITA] => DateTime Object ( [date] => 2018-02-28 07:58:48.000000 [timezone_type] => 3 [timezone] => UTC ) [TIPO_TURNO] => [MONTO_CONSULTA] => [MONTO_SENIA] => [MONTO_PLUS] => [TIPO_ABONO] => [TURNO_CONFIRMADO] => 0 [TURNO] => MAÑANA [PACIENTE] => ALBORNOZ ROBERTO RENE CASTILLA [TEL] => 4435028 [ID_PACIENTE] => 42766 [ESTADO_TURNO] => CONFIRMADO [OBSERVACIONES] => [CONSULTORIO] => [FORMA_LLAMADO] => [OBRA_SOCIAL] => PARTICULAR CONSUMIDOR FINAL [PRESTADOR] => MANRIQUE NESTOR [DOMICILIO] => MZ 46 PC 8 B° 50 VIVIENDAS FONAVI [FECHANACIMIENTO] => 54313 [NRODOCUMENTO] => 7851715 [NROAFILIADO] => 15067982300000 [EDAD] => 74 [CONSULTA_AMBU] => 1 ) [10080] => Array ( [ID_TURNO_AMBU] => 10080 [ID_PRESTADOR] => 84 [ID_OBRA_SOCIAL] => 36 [FECHA] => DateTime Object ( [date] => 2018-02-28 00:00:00.000000 [timezone_type] => 3 [timezone] => UTC ) [HORA] => [TURNO_NRO] => 3 [TIPO_SOLICITUD] => [FECHA_SOLICITA] => DateTime Object ( [date] => 2018-02-27 08:25:26.000000 [timezone_type] => 3 [timezone] => UTC ) [TIPO_TURNO] => [MONTO_CONSULTA] => [MONTO_SENIA] => [MONTO_PLUS] => [TIPO_ABONO] => [TURNO_CONFIRMADO] => 0 [TURNO] => MAÑANA [PACIENTE] => OLIVERA FAUSTINA [TEL] => 425050 / 3644-567496 [ID_PACIENTE] => 761 [ESTADO_TURNO] => CONFIRMADO [OBSERVACIONES] => [CONSULTORIO] => [FORMA_LLAMADO] => [OBRA_SOCIAL] => In.S.S.Se.P. [PRESTADOR] => MANRIQUE NESTOR [DOMICILIO] => C.209 E/204 Y 206 BºLAMADRID [FECHANACIMIENTO] => 47895 [NRODOCUMENTO] => 1550101 [NROAFILIADO] => 1550101 [EDAD] => 92 [CONSULTA_AMBU] => 1 ) [10081] => Array ( [ID_TURNO_AMBU] => 10081 [ID_PRESTADOR] => 84 [ID_OBRA_SOCIAL] => 424 [FECHA] => DateTime Object ( [date] => 2018-02-28 00:00:00.000000 [timezone_type] => 3 [timezone] => UTC ) [HORA] => [TURNO_NRO] => 4 [TIPO_SOLICITUD] => [FECHA_SOLICITA] => DateTime Object ( [date] => 2018-02-16 10:34:34.000000 [timezone_type] => 3 [timezone] => UTC ) [TIPO_TURNO] => [MONTO_CONSULTA] => [MONTO_SENIA] => [MONTO_PLUS] => [TIPO_ABONO] => [TURNO_CONFIRMADO] => 0 [TURNO] => MAÑANA [PACIENTE] => FLEITA CLAUDIA NOEMI [TEL] => 3644-456776 [ID_PACIENTE] => 107348 [ESTADO_TURNO] => CONFIRMADO [OBSERVACIONES] => [CONSULTORIO] => [FORMA_LLAMADO] => [OBRA_SOCIAL] => UNION PERSONAL-MONOTRIBUTO [PRESTADOR] => MANRIQUE NESTOR [DOMICILIO] => Bo YAPEYU [FECHANACIMIENTO] => [NRODOCUMENTO] => 20651312 [NROAFILIADO] => 68028401 [EDAD] => 55 [CONSULTA_AMBU] => 1 ) [10082] => Array ( [ID_TURNO_AMBU] => 10082 [ID_PRESTADOR] => 84 [ID_OBRA_SOCIAL] => 36 [FECHA] => DateTime Object ( [date] => 2018-02-28 00:00:00.000000 [timezone_type] => 3 [timezone] => UTC ) [HORA] => [TURNO_NRO] => 5 [TIPO_SOLICITUD] => [FECHA_SOLICITA] => DateTime Object ( [date] => 2018-02-26 18:37:07.000000 [timezone_type] => 3 [timezone] => UTC ) [TIPO_TURNO] => [MONTO_CONSULTA] => [MONTO_SENIA] => [MONTO_PLUS] => [TIPO_ABONO] => [TURNO_CONFIRMADO] => 0 [TURNO] => MAÑANA [PACIENTE] => FERNANDEZ CAROLINA MARIANELA [TEL] => 31-15629448 [ID_PACIENTE] => 63296 [ESTADO_TURNO] => CONFIRMADO [OBSERVACIONES] => [CONSULTORIO] => [FORMA_LLAMADO] => [OBRA_SOCIAL] => In.S.S.Se.P. [PRESTADOR] => MANRIQUE NESTOR [DOMICILIO] => SARMIENTO 231 [FECHANACIMIENTO] => 68395 [NRODOCUMENTO] => 33667723 [NROAFILIADO] => 32854226 [EDAD] => 36 [CONSULTA_AMBU] => 1 ) [10083] => Array ( [ID_TURNO_AMBU] => 10083 [ID_PRESTADOR] => 84 [ID_OBRA_SOCIAL] => 36 [FECHA] => DateTime Object ( [date] => 2018-02-28 00:00:00.000000 [timezone_type] => 3 [timezone] => UTC ) [HORA] => [TURNO_NRO] => 6 [TIPO_SOLICITUD] => [FECHA_SOLICITA] => DateTime Object ( [date] => 2018-02-27 10:05:17.000000 [timezone_type] => 3 [timezone] => UTC ) [TIPO_TURNO] => [MONTO_CONSULTA] => [MONTO_SENIA] => [MONTO_PLUS] => [TIPO_ABONO] => [TURNO_CONFIRMADO] => 0 [TURNO] => MAÑANA [PACIENTE] => ALARCON ELIDA [TEL] => 3644- 615253 [ID_PACIENTE] => 88967 [ESTADO_TURNO] => [OBSERVACIONES] => [CONSULTORIO] => [FORMA_LLAMADO] => [OBRA_SOCIAL] => In.S.S.Se.P. [PRESTADOR] => MANRIQUE NESTOR [DOMICILIO] => 10 E 25 Y 27 B° OBRERO [FECHANACIMIENTO] => [NRODOCUMENTO] => 14799507 [NROAFILIADO] => 59380 [EDAD] => 61 [CONSULTA_AMBU] => 1 ) [10084] => Array ( [ID_TURNO_AMBU] => 10084 [ID_PRESTADOR] => 84 [ID_OBRA_SOCIAL] => 36 [FECHA] => DateTime Object ( [date] => 2018-02-28 00:00:00.000000 [timezone_type] => 3 [timezone] => UTC ) [HORA] => [TURNO_NRO] => 7 [TIPO_SOLICITUD] => [FECHA_SOLICITA] => DateTime Object ( [date] => 2018-02-27 10:30:38.000000 [timezone_type] => 3 [timezone] => UTC ) [TIPO_TURNO] => [MONTO_CONSULTA] => [MONTO_SENIA] => [MONTO_PLUS] => [TIPO_ABONO] => [TURNO_CONFIRMADO] => 0 [TURNO] => MAÑANA [PACIENTE] => BARRIOS EULOGIA [TEL] => 480757 [ID_PACIENTE] => 28549 [ESTADO_TURNO] => CONFIRMADO [OBSERVACIONES] => [CONSULTORIO] => [FORMA_LLAMADO] => [OBRA_SOCIAL] => In.S.S.Se.P. [PRESTADOR] => MANRIQUE NESTOR [DOMICILIO] => MZ.1 PC.2 Bº S. MARTIN [FECHANACIMIENTO] => 57416 [NRODOCUMENTO] => 12465654 [NROAFILIADO] => 25132942 [EDAD] => 66 [CONSULTA_AMBU] => 1 ) [10085] => Array ( [ID_TURNO_AMBU] => 10085 [ID_PRESTADOR] => 84 [ID_OBRA_SOCIAL] => 173 [FECHA] => DateTime Object ( [date] => 2018-02-28 00:00:00.000000 [timezone_type] => 3 [timezone] => UTC ) [HORA] => [TURNO_NRO] => 8 [TIPO_SOLICITUD] => [FECHA_SOLICITA] => DateTime Object ( [date] => 2018-02-28 08:42:42.000000 [timezone_type] => 3 [timezone] => UTC ) [TIPO_TURNO] => [MONTO_CONSULTA] => [MONTO_SENIA] => [MONTO_PLUS] => [TIPO_ABONO] => [TURNO_CONFIRMADO] => 0 [TURNO] => MAÑANA [PACIENTE] => ALEGRE NENECIA JUSTA [TEL] => 421060 [ID_PACIENTE] => 68744 [ESTADO_TURNO] => CONFIRMADO [OBSERVACIONES] => [CONSULTORIO] => [FORMA_LLAMADO] => [OBRA_SOCIAL] => PAMI-FUERA DE CAPITA [PRESTADOR] => MANRIQUE NESTOR [DOMICILIO] => MZ 112 PC 20 Bº 713 VIVIENDAS [FECHANACIMIENTO] => 49298 [NRODOCUMENTO] => 3574334 [NROAFILIADO] => 3574334 [EDAD] => 88 [CONSULTA_AMBU] => 1 ) [10086] => Array ( [ID_TURNO_AMBU] => 10086 [ID_PRESTADOR] => 84 [ID_OBRA_SOCIAL] => 283 [FECHA] => DateTime Object ( [date] => 2018-02-28 00:00:00.000000 [timezone_type] => 3 [timezone] => UTC ) [HORA] => [TURNO_NRO] => 9 [TIPO_SOLICITUD] => [FECHA_SOLICITA] => DateTime Object ( [date] => 2018-02-28 10:08:33.000000 [timezone_type] => 3 [timezone] => UTC ) [TIPO_TURNO] => [MONTO_CONSULTA] => [MONTO_SENIA] => [MONTO_PLUS] => [TIPO_ABONO] => [TURNO_CONFIRMADO] => 0 [TURNO] => MAÑANA [PACIENTE] => MALDONADO TRINIDAD DEL VALLE [TEL] => 492012 [ID_PACIENTE] => 29400 [ESTADO_TURNO] => CONFIRMADO [OBSERVACIONES] => [CONSULTORIO] => [FORMA_LLAMADO] => [OBRA_SOCIAL] => PARTICULAR EXENTO [PRESTADOR] => MANRIQUE NESTOR [DOMICILIO] => SACHAYOJ [FECHANACIMIENTO] => 59880 [NRODOCUMENTO] => 16980248 [NROAFILIADO] => [EDAD] => [CONSULTA_AMBU] => 1 ) [10087] => Array ( [ID_TURNO_AMBU] => 10087 [ID_PRESTADOR] => 84 [ID_OBRA_SOCIAL] => 283 [FECHA] => DateTime Object ( [date] => 2018-02-28 00:00:00.000000 [timezone_type] => 3 [timezone] => UTC ) [HORA] => [TURNO_NRO] => 10 [TIPO_SOLICITUD] => [FECHA_SOLICITA] => DateTime Object ( [date] => 2018-02-28 10:14:56.000000 [timezone_type] => 3 [timezone] => UTC ) [TIPO_TURNO] => [MONTO_CONSULTA] => [MONTO_SENIA] => [MONTO_PLUS] => [TIPO_ABONO] => [TURNO_CONFIRMADO] => 0 [TURNO] => MAÑANA [PACIENTE] => PADULA ALEJANDRA MARIANA MARISOL [TEL] => 3644 551021 [ID_PACIENTE] => 107850 [ESTADO_TURNO] => CONFIRMADO [OBSERVACIONES] => [CONSULTORIO] => [FORMA_LLAMADO] => [OBRA_SOCIAL] => PARTICULAR EXENTO [PRESTADOR] => MANRIQUE NESTOR [DOMICILIO] => S/CALLE S/N BELGRANO CENTRO SACHAYOJ ALBERDI [FECHANACIMIENTO] => [NRODOCUMENTO] => 42889883 [NROAFILIADO] => [EDAD] => 23 [CONSULTA_AMBU] => 1 ) ) 




</div> 




</body>
</html>