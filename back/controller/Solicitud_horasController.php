<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\
include_once realpath('../facade/Solicitud_horasFacade.php');


class Solicitud_horasController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $anio = strip_tags($_POST['anio']);
        $semestre = strip_tags($_POST['semestre']);
        $horas_catedra = strip_tags($_POST['horas_catedra']);
        $horas_planta = strip_tags($_POST['horas_planta']);
        $horas_solicitadas = strip_tags($_POST['horas_solicitadas']);
        Solicitud_horasFacade::insert($id, $anio, $semestre, $horas_catedra, $horas_planta, $horas_solicitadas);
return true;
    }

    public static function listAll(){
        $list=Solicitud_horasFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Solicitud_horas) {	
	       $rta.="{
	    \"id\":\"{$Solicitud_horas->getid()}\",
	    \"anio\":\"{$Solicitud_horas->getanio()}\",
	    \"semestre\":\"{$Solicitud_horas->getsemestre()}\",
	    \"horas_catedra\":\"{$Solicitud_horas->gethoras_catedra()}\",
	    \"horas_planta\":\"{$Solicitud_horas->gethoras_planta()}\",
	    \"horas_solicitadas\":\"{$Solicitud_horas->gethoras_solicitadas()}\"
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