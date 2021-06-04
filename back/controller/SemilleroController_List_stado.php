<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../facade/SemilleroFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


//$id = strip_tags($dataObject->id);

        $id = 2;

      $list=SemilleroFacade::listStado($id);
        $rta="";
        foreach ($list as $obj => $Semillero) {		
	       $rta.="{
	    \"id\":\"{$Semillero->getid()}\",
            \"fecha_creacion\":\"{$Semillero->getfecha_creacion()}\",
	    \"aval_dic_grupo\":\"{$Semillero->getaval_dic_grupo()}\",
	    \"aval_dic_sem\":\"{$Semillero->getaval_dic_sem()}\",
	    \"aval_dic_unidad\":\"{$Semillero->getaval_dic_unidad()}\"
	      },";
        }

        if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"semilleroS\":[{$rta}]}";
      } else {
        echo "{\"semilleroS\":[]}";
      }
      
         
	    