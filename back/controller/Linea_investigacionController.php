<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Les traigo amor  \\
include_once realpath('../facade/Linea_investigacionFacade.php');


class Linea_investigacionController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $lider = strip_tags($_POST['lider']);
        $Disciplina_id = strip_tags($_POST['disciplina_id']);
        $disciplina= new Disciplina();
        $disciplina->setId($Disciplina_id);
        Linea_investigacionFacade::insert($id, $descripcion, $lider, $disciplina);
return true;
    }

    public static function listAll(){
        $list=Linea_investigacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Linea_investigacion) {	
	       $rta.="{
	    \"id\":\"{$Linea_investigacion->getid()}\",
	    \"descripcion\":\"{$Linea_investigacion->getdescripcion()}\",
	    \"lider\":\"{$Linea_investigacion->getlider()}\",
	    \"disciplina_id_id\":\"{$Linea_investigacion->getdisciplina_id()->getid()}\"
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