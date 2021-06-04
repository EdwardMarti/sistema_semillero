<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Oh gloria de las glorias, oh divino testamento de la eterna majestad de la creación de dios  \\
include_once realpath('../facade/DisciplinaFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


//$id = strip_tags($dataObject->id);
$id = "1";


        $list=DisciplinaFacade::listAll_id($id);
        $rta="";
        foreach ($list as $obj => $Disciplina) {	
	       $rta.="{
	    \"id\":\"{$Disciplina->getid()}\",
	    \"descripcion\":\"{$Disciplina->getdescripcion()}\"
	   
	       },";
        }

        if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"disciplina\":[{$rta}]}";
      } else {
        echo "{\"disciplina\":[]}";
      }
