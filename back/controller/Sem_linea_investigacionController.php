<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\
include_once realpath('../facade/Sem_linea_investigacionFacade.php');


class Sem_linea_investigacionController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Semillero_id = strip_tags($_POST['semillero_id']);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        $Linea_investigacion_id = strip_tags($_POST['linea_investigacion_id']);
        $linea_investigacion= new Linea_investigacion();
        $linea_investigacion->setId($Linea_investigacion_id);
        Sem_linea_investigacionFacade::insert($id, $semillero, $linea_investigacion);
return true;
    }

    public static function listAll(){
        $list=Sem_linea_investigacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Sem_linea_investigacion) {	
	       $rta.="{
	    \"id\":\"{$Sem_linea_investigacion->getid()}\",
	    \"semillero_id_id\":\"{$Sem_linea_investigacion->getsemillero_id()->getid()}\",
	    \"linea_investigacion_id_id\":\"{$Sem_linea_investigacion->getlinea_investigacion_id()->getid()}\"
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