<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tu alma nos pertenece... Salve Mr. Arciniegas  \\
include_once realpath('../facade/AreaFacade.php');


class AreaController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        AreaFacade::insert($id, $descripcion);
return true;
    }

    public static function listAll(){
        $list=AreaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Area) {	
	       $rta.="{
	    \"id\":\"{$Area->getid()}\",
	    \"descripcion\":\"{$Area->getdescripcion()}\"
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