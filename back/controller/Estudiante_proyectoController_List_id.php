<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\
include_once realpath('../facade/Estudiante_proyectoFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id);
 
        $list=Estudiante_proyectoFacade::listAll_Semillero($id);
        $rta="";
        foreach ($list as $obj => $Estudiante_proyecto) {	
	       $rta.="{
	    \"id\":\"{$Estudiante_proyecto->getid()}\",
	    \"codigo\":\"{$Estudiante_proyecto->getcodigo()}\",
	    \"nombre\":\"{$Estudiante_proyecto->getnombre()}\",
	    \"proyecto_id\":\"{$Estudiante_proyecto->getproyecto_id()}\"
	   
	       },";
        }

  if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"EstudianteP\":[{$rta}]}";
      } else {
        echo "{\"EstudianteP\":[]}";
      }