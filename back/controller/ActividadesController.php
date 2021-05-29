<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\
include_once realpath('../facade/ActividadesFacade.php');


class ActividadesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $Proyectos_id = strip_tags($_POST['proyectos_id']);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        ActividadesFacade::insert($id, $descripcion, $proyectos);
return true;
    }

    public static function listAll(){
        $list=ActividadesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Actividades) {	
	       $rta.="{
	    \"id\":\"{$Actividades->getid()}\",
	    \"descripcion\":\"{$Actividades->getdescripcion()}\",
	    \"proyectos_id_id\":\"{$Actividades->getproyectos_id()->getid()}\"
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