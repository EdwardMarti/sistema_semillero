<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Hey ¿cómo se llama tu café internet?  \\
include_once realpath('../facade/ColaboradorFacade.php');


class ColaboradorController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre = strip_tags($_POST['nombre']);
        $codigo = strip_tags($_POST['codigo']);
        $tp_colaborador = strip_tags($_POST['tp_colaborador']);
        $Proyectos_id = strip_tags($_POST['proyectos_id']);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        ColaboradorFacade::insert($id, $nombre, $codigo, $tp_colaborador, $proyectos);
return true;
    }

    public static function listAll(){
        $list=ColaboradorFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Colaborador) {	
	       $rta.="{
	    \"id\":\"{$Colaborador->getid()}\",
	    \"nombre\":\"{$Colaborador->getnombre()}\",
	    \"codigo\":\"{$Colaborador->getcodigo()}\",
	    \"tp_colaborador\":\"{$Colaborador->gettp_colaborador()}\",
	    \"proyectos_id_id\":\"{$Colaborador->getproyectos_id()->getid()}\"
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