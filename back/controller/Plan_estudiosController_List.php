<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    404 Frase no encontrada  \\
include_once realpath('../facade/Plan_estudiosFacade.php');
     $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->dptos);

        $list=Plan_estudiosFacade::listAll_id($id);
        $rta="";
        foreach ($list as $obj => $Plan_estudios) {	
	       $rta.="{
	    \"id\":\"{$Plan_estudios->getid()}\",
	    \"descripcion\":\"{$Plan_estudios->getdescripcion()}\",
	    \"departamento\":\"{$Plan_estudios->getdepartamento_id()->getid()}\"
	       },";
        }
 if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"plan\":[{$rta}]}";
      } else {
        echo "{\"plan\":[]}";
      }
 
