<?php

$texto = [];
#print_r($_REQUEST);
$textoRequest = !empty( $_REQUEST['imprimir_data'] )? json_decode($_REQUEST['imprimir_data'],true) : [];
#print_r($textoRequest);
$texto['nombre'] = 'Maxi';
$texto['apellido'] = 'Suarez';

$texto = $textoRequest;
$texto['apellido'] = '<span>Suárez Ñ &erer &nbsp; " ';

if(empty( $texto )) exit("Aqui no hay nada");
$texto = array_map(function( $valor){
    return htmlspecialchars_decode($valor);
}, $texto);

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />

	<title>Hoja de Historia Clinica</title>
<style>
body,html, head {
    width: 21cm;
    height: 19cm;
    max-height: 19cm;
    max-width: 790px;
    padding: 0;
    margin: 0;
    background: white;
}
.impresion-buttons {
    position: fixed;
    left: 0;
    max-width: 21cm;
    height: 100%;
    top: 0;
    display: flex;
    align-items: start;
    justify-content: center;
    background: #00000015;
    transition: all 0.5s;
    padding: 20px 0;
    width: calc(100% - 30px);
    width: 100%;
    box-shadow: 0px 1px 2px #20b2aa9e;
}
.impresion-buttons.minimizado {
    position: relative;
    top: 0;
    max-height: 50px;
    width: calc(100% - 30px);
}
.impresion-buttons-container {
    position: relative;
    top: 0;
    height: 120px;
    width: calc(21cm - 19px);
    background: #00000015;
    padding: 10px;
    box-sizing: border-box;
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
</head>
<body onload="">
    <div class="impresion-buttons-container">
        <div>
        <div class="impresion-buttons"><button onclick="impresionButton()" class="confirmar confirm">Imprimir</button><button onclick="verificarButton()" class="verificar">Trabajar</button><button onclick="closeButton()" class="close btn-close">Cerrar</button></div>
        </div>
    </div>
    
    <iframe src="https://turnos2.clinicaume.com.ar/wp-content/plugins/bookingpress-whatsapp/core/classes/Ultimo_Historias/includes/templates/historia_clinica_template3.php" style="width: 100%;height: 320mm ; overflow: visible;"></iframe>
    
    
    <!--<div class="impresion-content">-->
    <!--
        <table style="table-layout: fixed;">
        <tr>
        <td><?php echo $texto['nombre']; ?></td><td><?php echo $texto['apellido']; ?></td>
        </tr>
        <tr>
        
        <td> <textarea>Rellenar .... </textarea></td><td> <textarea>Rellenar .... </textarea></td>
        </tr>
        </table>
    -->
    <!--</div>-->

</body>
<script>

function impresionButton(){
    window.print();
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
</html>
<?php
