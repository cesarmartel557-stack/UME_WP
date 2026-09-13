<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    

	<title>Untitled 3</title>
</head>

<body>
<?php

$medico = 0;
$all_medicos = 1;

if( function_exists("get_option") ){
    $all_obras_opt = [];
    $all_obras_opt = get_option("todas_las_obras", []);
    
    if( !empty($all_obras_opt) ){
        //echo "/* de opciones*/";
        echo json_encode( $all_obras_opt );
        return $all_obras_opt;
    }
}

include __DIR__ . '/config_medicos.php';


if ( isset($all_medicos) ){
    $vals = [];
    global $allobrasvals;
    $allobrasvals = [];
         
     array_map( function($obras){
        global $allobrasvals;
        if(!is_array($allobrasvals)) $allobrasvals = [];
        $values = array_column($obras['obras_sociales'],'value','value');
        $GLOBALS['allobrasvals'] = array_merge($allobrasvals, $values);
        //print_r( json_encode($vals) ); echo "<br /><br />\r\n";
        return $values;
     }, 
     $all_obras );
        
     $vals = $allobrasvals;

sort($vals);  
foreach($vals as $k=>$val  )  $vals[$k] = trim($val);
$vals = array_unique( $vals );

/*
echo count($vals)."<br><br />\r\n";
 
foreach($vals as $val  ){ print_r( '"'.$val.'"' ); echo "<br>";}

echo "<br /><br />\r\n";
*/


$todas_new = array();
$todas = array_values( $vals );
//print_r($todas);
foreach($todas as $k=>$val  ) $todas_new[$k] = array("id"=>$k,"active"=>false,"label" => $val, "value" => $val, "limitado" => false, "cupos" => 0, "grupo" => false);

$up = 0;
if( function_exists("update_option") ){
    $up = update_option("todas_las_obras", $todas_new);
}


//echo "/* de archivo ".($up?" opciones actualizadas ":"")."*/";
echo json_encode( $todas_new );
return $todas_new;
//var_dump( $vals );

}

?>
</body>
</html>