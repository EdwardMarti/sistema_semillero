<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando eres Ingeniero en sistemas, pero tu vocación siempre fueron los memes  \\
include_once realpath('../facade/Estado_proyectoFacade.php');


class Estado_proyectoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        Estado_proyectoFacade::insert($id, $descripcion);
return true;
    }

    public static function listAll(){
        $list=Estado_proyectoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Estado_proyecto) {	
	       $rta.="{
	    \"id\":\"{$Estado_proyecto->getid()}\",
	    \"descripcion\":\"{$Estado_proyecto->getdescripcion()}\"
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
    }

}
//That`s all folks!