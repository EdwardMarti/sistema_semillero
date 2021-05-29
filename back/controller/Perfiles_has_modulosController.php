<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\
include_once realpath('../facade/Perfiles_has_modulosFacade.php');


class Perfiles_has_modulosController {

    public static function insert(){
        $Perfiles_id = strip_tags($_POST['perfiles_id']);
        $perfiles= new Perfiles();
        $perfiles->setId($Perfiles_id);
        $Modulos_id = strip_tags($_POST['modulos_activos_id']);
        $modulos= new Modulos();
        $modulos->setId($Modulos_id);
        $id = strip_tags($_POST['id']);
        $activo = strip_tags($_POST['activo']);
        Perfiles_has_modulosFacade::insert($perfiles, $modulos, $id, $activo);
return true;
    }

    public static function listAll(){
        $list=Perfiles_has_modulosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Perfiles_has_modulos) {	
	       $rta.="{
	    \"perfiles_id_id\":\"{$Perfiles_has_modulos->getperfiles_id()->getid()}\",
	    \"modulos_activos_id_id\":\"{$Perfiles_has_modulos->getmodulos_activos_id()->getid()}\",
	    \"id\":\"{$Perfiles_has_modulos->getid()}\",
	    \"activo\":\"{$Perfiles_has_modulos->getactivo()}\"
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