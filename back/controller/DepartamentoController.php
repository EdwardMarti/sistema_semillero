<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\
include_once realpath('../facade/DepartamentoFacade.php');


class DepartamentoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $Facultad_id = strip_tags($_POST['facultad_id']);
        $facultad= new Facultad();
        $facultad->setId($Facultad_id);
        DepartamentoFacade::insert($id, $descripcion, $facultad);
return true;
    }

    public static function listAll(){
        $list=DepartamentoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Departamento) {	
	       $rta.="{
	    \"id\":\"{$Departamento->getid()}\",
	    \"descripcion\":\"{$Departamento->getdescripcion()}\",
	    \"facultad_id_id\":\"{$Departamento->getfacultad_id()->getid()}\"
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