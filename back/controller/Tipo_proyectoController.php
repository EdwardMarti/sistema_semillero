<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo.   \\
include_once realpath('../facade/Tipo_proyectoFacade.php');


class Tipo_proyectoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $Proyectos_id = strip_tags($_POST['proyectos_id']);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        Tipo_proyectoFacade::insert($id, $descripcion, $proyectos);
return true;
    }

    public static function listAll(){
        $list=Tipo_proyectoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Tipo_proyecto) {	
	       $rta.="{
	    \"id\":\"{$Tipo_proyecto->getid()}\",
	    \"descripcion\":\"{$Tipo_proyecto->getdescripcion()}\",
	    \"proyectos_id_id\":\"{$Tipo_proyecto->getproyectos_id()->getid()}\"
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