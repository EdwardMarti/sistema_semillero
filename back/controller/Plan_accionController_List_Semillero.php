<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../facade/Plan_accionFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id);

$list=Plan_accionFacade::listAll_plan_sem($id);
        $rta="";
        foreach ($list as $obj => $Plan_accion) {	
	       $rta.="{
	    \"id_plan_Ac\":\"{$Plan_accion->getid()}\",
	    \"titulo\":\"{$Plan_accion->getsemestre()}\",
	    \"descripcion\":\"{$Plan_accion->getano()}\",
	    \"nombre\":\"{$Plan_accion->getvbo_dirSemillero()}\",
	    \"semestre\":\"{$Plan_accion->getvbo_dirGinvestigacion()}\",
	    \"ano\":\"{$Plan_accion->getvbo_facultaInv()}\",
	    \"estado\":\"{$Plan_accion->getsemillero_id()->getid()}\"
           
	   
	       },";
        }

       if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"PlanGeneral\":[{$rta}]}";
      } else {
        echo "{\"PlanGeneral\":[]}";
      }