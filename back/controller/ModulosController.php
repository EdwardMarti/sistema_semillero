<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Lo sé porque lo sabe Fredy  \\
include_once realpath('../facade/ModulosFacade.php');


class ModulosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        ModulosFacade::insert($id, $descripcion);
return true;
    }

    public static function listAll(){
        $list=ModulosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Modulos) {	
	       $rta.="{
	    \"id\":\"{$Modulos->getid()}\",
	    \"descripcion\":\"{$Modulos->getdescripcion()}\"
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