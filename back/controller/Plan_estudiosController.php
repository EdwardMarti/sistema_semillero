<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    404 Frase no encontrada  \\
include_once realpath('../facade/Plan_estudiosFacade.php');


class Plan_estudiosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $Departamento_id = strip_tags($_POST['departamento_id']);
        $departamento= new Departamento();
        $departamento->setId($Departamento_id);
        Plan_estudiosFacade::insert($id, $descripcion, $departamento);
return true;
    }

    public static function listAll(){
        $list=Plan_estudiosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Plan_estudios) {	
	       $rta.="{
	    \"id\":\"{$Plan_estudios->getid()}\",
	    \"descripcion\":\"{$Plan_estudios->getdescripcion()}\",
	    \"departamento_id_id\":\"{$Plan_estudios->getdepartamento_id()->getid()}\"
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