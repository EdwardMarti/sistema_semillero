<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\
include_once realpath('../facade/Tipo_docuemntoFacade.php');


class Tipo_docuemntoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        Tipo_docuemntoFacade::insert($id, $descripcion);
return true;
    }

    public static function listAll(){
        $list=Tipo_docuemntoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Tipo_docuemnto) {	
	       $rta.="{
	    \"id\":\"{$Tipo_docuemnto->getid()}\",
	    \"descripcion\":\"{$Tipo_docuemnto->getdescripcion()}\"
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