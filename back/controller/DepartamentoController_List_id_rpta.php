<?php

include_once realpath('../facade/DepartamentoFacade.php');
     $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->facultad);
//        $id = $_GET['facultad'];
        $list=DepartamentoFacade::listAll_idRpta($id);
        $rta="";
        foreach ($list as $obj => $Departamento) {	
	       $rta.="{
	    \"id\":\"{$Departamento->getid()}\",
	    \"descripcion\":\"{$Departamento->getdescripcion()}\",
	    \"facultad\":\"{$Departamento->getfacultad_id()->getid()}\"
	       },";
        }

    if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"departamento\":[{$rta}]}";
      } else {
        echo "{\"departamento\":[]}";
      }

