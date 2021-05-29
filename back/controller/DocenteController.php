<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\
include_once realpath('../facade/DocenteFacade.php');



        $list=DocenteFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Docente) {	
	       $rta.="{
	    \"id\":\"{$Docente->getid()}\",
	    \"persona_id\":\"{$Docente->getpersona_id()->getid()}\",
	    \"password\":\"{$Docente->getpassword()}\",
	    \"tipo_vinculacion_id_id\":\"{$Docente->gettipo_vinculacion_id()->getid()}\",
	    \"ubicacion\":\"{$Docente->getubicacion()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        return "[{$msg},{$rta}]";

//That`s all folks!