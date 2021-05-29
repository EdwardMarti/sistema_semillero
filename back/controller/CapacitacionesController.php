<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\
include_once realpath('../facade/CapacitacionesFacade.php');


class CapacitacionesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $tema = strip_tags($_POST['tema']);
        $docente = strip_tags($_POST['docente']);
        $fecha = strip_tags($_POST['fecha']);
        $cant_capacitados = strip_tags($_POST['cant_capacitados']);
        $Semillero_id = strip_tags($_POST['semillero_id']);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        $objetivo = strip_tags($_POST['objetivo']);
        CapacitacionesFacade::insert($id, $tema, $docente, $fecha, $cant_capacitados, $semillero, $objetivo);
return true;
    }

    public static function listAll(){
        $list=CapacitacionesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Capacitaciones) {	
	       $rta.="{
	    \"id\":\"{$Capacitaciones->getid()}\",
	    \"tema\":\"{$Capacitaciones->gettema()}\",
	    \"docente\":\"{$Capacitaciones->getdocente()}\",
	    \"fecha\":\"{$Capacitaciones->getfecha()}\",
	    \"cant_capacitados\":\"{$Capacitaciones->getcant_capacitados()}\",
	    \"semillero_id_id\":\"{$Capacitaciones->getsemillero_id()->getid()}\",
	    \"objetivo\":\"{$Capacitaciones->getobjetivo()}\"
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