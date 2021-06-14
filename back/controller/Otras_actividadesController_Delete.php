<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\
include_once realpath('../facade/Otras_actividadesFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id = strip_tags($dataObject->id);


        $list=Otras_actividadesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Otras_actividades) {	
	       $rta.="{
	    \"id\":\"{$Otras_actividades->getid()}\",
	    \"nombre_proyecto\":\"{$Otras_actividades->getnombre_proyecto()}\",
	    \"nombre_actividad\":\"{$Otras_actividades->getnombre_actividad()}\",
	    \"modalidad_participacion\":\"{$Otras_actividades->getmodalidad_participacion()}\",
	    \"responsable\":\"{$Otras_actividades->getresponsable()}\",
	    \"fecha_realizacion\":\"{$Otras_actividades->getfecha_realizacion()}\",
	    \"producto\":\"{$Otras_actividades->getproducto()}\",
	    \"semillero_id_id\":\"{$Otras_actividades->getsemillero_id()->getid()}\"
	       },";
        }

      if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"OtrasCap\":[{$rta}]}";
      } else {
        echo "{\"OtrasCap\":[]}";
      }