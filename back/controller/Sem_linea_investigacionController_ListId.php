<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\
include_once realpath('../facade/Sem_linea_investigacionFacade.php');



$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


//$id = strip_tags($dataObject->id);
$id = '2';

        $list=Sem_linea_investigacionFacade::listAll_Semillero($id);
        $rta="";
        foreach ($list as $obj => $Sem_linea_investigacion) {	
	       $rta.="{
	    \"id\":\"{$Sem_linea_investigacion->getid()}\",
	    \"semillero_id\":\"{$Sem_linea_investigacion->getsemillero_id()->getid()}\",
	    \"descripcion\":\"{$Sem_linea_investigacion->getsemillero_id()->getNombre()}\",
	    \"linea\":\"{$Sem_linea_investigacion->getsemillero_id()->getAval_dic_grupo()}\",
	    \"disciplina\":\"{$Sem_linea_investigacion->getsemillero_id()->getAval_dic_sem()}\",
	    \"area\":\"{$Sem_linea_investigacion->getsemillero_id()->getAval_dic_unidad()}\"
	   
	       },";
        }


if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"linea_sem\":[{$rta}]}";
      } else {
         http_response_code(201);  
        echo "{\"linea_sem\":[]}";
      }