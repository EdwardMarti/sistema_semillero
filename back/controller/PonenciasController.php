<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Me han encontrado! ¡No sé cómo pero me han encontrado!  \\
include_once realpath('../facade/PonenciasFacade.php');


class PonenciasController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre_po = strip_tags($_POST['nombre_po']);
        $fecha = strip_tags($_POST['fecha']);
        $nombre_eve = strip_tags($_POST['nombre_eve']);
        $institucion = strip_tags($_POST['institucion']);
        $ciudad = strip_tags($_POST['ciudad']);
        $lugar = strip_tags($_POST['lugar']);
        $Tipo_ponencias_id = strip_tags($_POST['tipo_ponencias_id']);
        $tipo_ponencias= new Tipo_ponencias();
        $tipo_ponencias->setId($Tipo_ponencias_id);
        $Semillero_id = strip_tags($_POST['semillero_id']);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        PonenciasFacade::insert($id, $nombre_po, $fecha, $nombre_eve, $institucion, $ciudad, $lugar, $tipo_ponencias, $semillero);
return true;
    }

    public static function listAll(){
        $list=PonenciasFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Ponencias) {	
	       $rta.="{
	    \"id\":\"{$Ponencias->getid()}\",
	    \"nombre_po\":\"{$Ponencias->getnombre_po()}\",
	    \"fecha\":\"{$Ponencias->getfecha()}\",
	    \"nombre_eve\":\"{$Ponencias->getnombre_eve()}\",
	    \"institucion\":\"{$Ponencias->getinstitucion()}\",
	    \"ciudad\":\"{$Ponencias->getciudad()}\",
	    \"lugar\":\"{$Ponencias->getlugar()}\",
	    \"tipo_ponencias_id_id\":\"{$Ponencias->gettipo_ponencias_id()->getid()}\",
	    \"semillero_id_id\":\"{$Ponencias->getsemillero_id()->getid()}\"
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