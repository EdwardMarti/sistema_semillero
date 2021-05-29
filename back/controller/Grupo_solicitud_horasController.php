<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Les traigo amor  \\
include_once realpath('../facade/Grupo_solicitud_horasFacade.php');


class Grupo_solicitud_horasController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Solicitud_horas_id = strip_tags($_POST['solicitud_horas_id']);
        $solicitud_horas= new Solicitud_horas();
        $solicitud_horas->setId($Solicitud_horas_id);
        $Grupo_investigacion_id = strip_tags($_POST['grupo_investigacion_id']);
        $grupo_investigacion= new Grupo_investigacion();
        $grupo_investigacion->setId($Grupo_investigacion_id);
        Grupo_solicitud_horasFacade::insert($id, $solicitud_horas, $grupo_investigacion);
return true;
    }

    public static function listAll(){
        $list=Grupo_solicitud_horasFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Grupo_solicitud_horas) {	
	       $rta.="{
	    \"id\":\"{$Grupo_solicitud_horas->getid()}\",
	    \"solicitud_horas_id_id\":\"{$Grupo_solicitud_horas->getsolicitud_horas_id()->getid()}\",
	    \"grupo_investigacion_id_id\":\"{$Grupo_solicitud_horas->getgrupo_investigacion_id()->getid()}\"
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