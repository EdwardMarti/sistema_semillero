<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Estadistas informan que una linea de código equivale a un sorbo de café  \\
include_once realpath('../facade/FacultadFacade.php');


class FacultadController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        FacultadFacade::insert($id, $descripcion);
        return true;
    }

    public static function listAll(){
        $list=FacultadFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Facultad) {	
	       $rta.="{
	    \"id\":\"{$Facultad->getid()}\",
	    \"descripcion\":\"{$Facultad->getdescripcion()}\"
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