<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\
include_once realpath('../facade/Tipo_publicacionesFacade.php');



        $list=Tipo_publicacionesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Tipo_publicaciones) {	
	       $rta.="{
	    \"id\":\"{$Tipo_publicaciones->getid()}\",
	    \"descripcion\":\"{$Tipo_publicaciones->getdescripcion()}\"
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

