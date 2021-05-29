<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella no te quiere </3 mejor ponte a programar  \\
include_once realpath('../facade/Grupo_has_proyectoFacade.php');


class Grupo_has_proyectoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Grupo_investigacion_id = strip_tags($_POST['grupo_investigacion_id']);
        $grupo_investigacion= new Grupo_investigacion();
        $grupo_investigacion->setId($Grupo_investigacion_id);
        $Proyectos_id = strip_tags($_POST['proyectos_terminados_id']);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        Grupo_has_proyectoFacade::insert($id, $grupo_investigacion, $proyectos);
return true;
    }

    public static function listAll(){
        $list=Grupo_has_proyectoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Grupo_has_proyecto) {	
	       $rta.="{
	    \"id\":\"{$Grupo_has_proyecto->getid()}\",
	    \"grupo_investigacion_id_id\":\"{$Grupo_has_proyecto->getgrupo_investigacion_id()->getid()}\",
	    \"proyectos_terminados_id_id\":\"{$Grupo_has_proyecto->getproyectos_terminados_id()->getid()}\"
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