<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\
include_once realpath('../facade/ActividadesFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$proyecto = strip_tags($dataObject->id);
$plan = strip_tags($dataObject->plan);

//$id = 2;


   
        $list=ActividadesFacade::listAll_proyectos2($proyecto,$plan);
        $rta="";
        foreach ($list as $obj => $Actividades) {	
	       $rta.="{
	    \"id\":\"{$Actividades->getid()}\",
	    \"descripcion\":\"{$Actividades->getdescripcion()}\",
	    \"proyectos_id\":\"{$Actividades->getproyectos_id()->getid()}\"
	       },";
        }
   if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"actividades\":[{$rta}]}";
      } else {
        echo "{\"actividades\":[]}";
      }
