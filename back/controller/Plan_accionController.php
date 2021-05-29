<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../facade/Plan_accionFacade.php');


class Plan_accionController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $semestre = strip_tags($_POST['semestre']);
        $ano = strip_tags($_POST['ano']);
        $vbo_dirSemillero = strip_tags($_POST['vbo_dirSemillero']);
        $vbo_dirGinvestigacion = strip_tags($_POST['vbo_dirGinvestigacion']);
        $vbo_facultaInv = strip_tags($_POST['vbo_facultaInv']);
        $Semillero_id = strip_tags($_POST['semillero_id']);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        $Proyectos_id = strip_tags($_POST['proyectos_id']);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        $Capacitaciones_id = strip_tags($_POST['capacitaciones_id']);
        $capacitaciones= new Capacitaciones();
        $capacitaciones->setId($Capacitaciones_id);
        $Otras_actividades_id = strip_tags($_POST['otras_actividades_id']);
        $otras_actividades= new Otras_actividades();
        $otras_actividades->setId($Otras_actividades_id);
        Plan_accionFacade::insert($id, $semestre, $ano, $vbo_dirSemillero, $vbo_dirGinvestigacion, $vbo_facultaInv, $semillero, $proyectos, $capacitaciones, $otras_actividades);
return true;
    }

    public static function listAll(){
        $list=Plan_accionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Plan_accion) {	
	       $rta.="{
	    \"id\":\"{$Plan_accion->getid()}\",
	    \"semestre\":\"{$Plan_accion->getsemestre()}\",
	    \"ano\":\"{$Plan_accion->getano()}\",
	    \"vbo_dirSemillero\":\"{$Plan_accion->getvbo_dirSemillero()}\",
	    \"vbo_dirGinvestigacion\":\"{$Plan_accion->getvbo_dirGinvestigacion()}\",
	    \"vbo_facultaInv\":\"{$Plan_accion->getvbo_facultaInv()}\",
	    \"semillero_id_id\":\"{$Plan_accion->getsemillero_id()->getid()}\",
	    \"proyectos_id_id\":\"{$Plan_accion->getproyectos_id()->getid()}\",
	    \"capacitaciones_id_id\":\"{$Plan_accion->getcapacitaciones_id()->getid()}\",
	    \"otras_actividades_id_id\":\"{$Plan_accion->getotras_actividades_id()->getid()}\"
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