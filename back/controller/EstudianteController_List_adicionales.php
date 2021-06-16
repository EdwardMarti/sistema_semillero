<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\
include_once realpath('../facade/SemilleroFacade.php');
include_once realpath('../facade/EstudianteFacade.php');
include_once realpath('../facade/Pares_academicosFacade.php');
include_once realpath('../facade/Datos_adicionalesSSFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->semillero_id);

$list=Datos_adicionalesSSFacade::list_adicionales($id);
$rta="";

foreach ($list as $obj => $datos_adicionalesS) {	
   $rta.="{
   \"id\":\"{$datos_adicionalesS->getid()}\",
   \"producto\":\"{$datos_adicionalesS->getProducto()}\",
   \"descripcion\":\"{$datos_adicionalesS->getDescripcion()}\",   
   \"fecha\":\"{$datos_adicionalesS->getFecha()}\",     
   \"calificacion\":\"{$datos_adicionalesS->getCalificacion()}\",
   \"plan_id\":\"{$datos_adicionalesS->getId_plan()}\",
   \"semillero_id\":\"{$datos_adicionalesS->getId_semillero()}\"
   },";
}


if ($rta != "" ) {
   $rta = substr($rta, 0, -1);
   http_response_code(200);
   echo "{\"datos_adicionales\":[{$rta}]}";
} else {
   echo "{\"datos_adicionales\":[]}";
}