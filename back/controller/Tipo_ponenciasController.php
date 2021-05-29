<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Eres capaz de hackear mi Facebook?  \\
include_once realpath('../facade/Tipo_ponenciasFacade.php');


class Tipo_ponenciasController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre = strip_tags($_POST['nombre']);
        Tipo_ponenciasFacade::insert($id, $nombre);
return true;
    }

    public static function listAll(){
        $list=Tipo_ponenciasFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Tipo_ponencias) {	
	       $rta.="{
	    \"id\":\"{$Tipo_ponencias->getid()}\",
	    \"nombre\":\"{$Tipo_ponencias->getnombre()}\"
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