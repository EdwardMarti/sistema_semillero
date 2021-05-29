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


$docente = strip_tags($dataObject->docente_id);
//$docente = 2;

        $list=SemilleroFacade::listAll_docente($docente);
        $rta="";
        foreach ($list as $obj => $Semillero) {	
	       $rta.="{
	    \"id\":\"{$Semillero->getid()}\",
	    \"nombre\":\"{$Semillero->getnombre()}\",
	    \"sigla\":\"{$Semillero->getsigla()}\",
	    \"fecha_creacion\":\"{$Semillero->getfecha_creacion()}\",
	    \"grupo_investigacion_id_id\":\"{$Semillero->getgrupo_investigacion_id()->getid()}\",
	    \"departamento\":\"{$Semillero->getunidad_academica()}\",
	    \"facultad\":\"{$Semillero->getFacultad()}\",
	    \"plan_estudio\":\"{$Semillero->getPlan_estudio()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        echo "[{$msg},{$rta}]";

//That`s all folks!