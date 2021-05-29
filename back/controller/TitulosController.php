<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\
include_once realpath('../facade/TitulosFacade.php');


class TitulosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $universidad_id = strip_tags($_POST['universidad_id']);
        $Docente_id = strip_tags($_POST['docente_id']);
        $docente= new Docente();
        $docente->setId($Docente_id);
        TitulosFacade::insert($id, $descripcion, $universidad_id, $docente);
return true;
    }

    public static function listAll(){
        $list=TitulosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Titulos) {	
	       $rta.="{
	    \"id\":\"{$Titulos->getid()}\",
	    \"descripcion\":\"{$Titulos->getdescripcion()}\",
	    \"universidad_id\":\"{$Titulos->getuniversidad_id()}\",
	    \"docente_id_id\":\"{$Titulos->getdocente_id()->getid()}\"
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