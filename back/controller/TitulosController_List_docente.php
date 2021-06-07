<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\
include_once realpath('../facade/TitulosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id_docente);


        $list=TitulosFacade::listAll_Docente($id);
        $rta="";
        foreach ($list as $obj => $Titulos) {	
	       $rta.="{
	    \"id\":\"{$Titulos->getid()}\",
	    \"descripcion\":\"{$Titulos->getdescripcion()}\",
	    \"universidad\":\"{$Titulos->getuniversidad_id()}\"
	   
	       },";
        }

 if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"titulos\":[{$rta}]}";
      } else {
        echo "{\"titulos\":[]}";
      }
