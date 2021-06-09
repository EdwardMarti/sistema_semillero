<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\
include_once realpath('../facade/Estudiante_proyectoFacade.php');


class EstudianteController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $codigo = strip_tags($_POST['codigo']);
        $nombre = strip_tags($_POST['nombre']);
        $proyecto_id = strip_tags($_POST['proyecto_id']);
      
        Estudiante_proyectoFacade::insert($id, $codigo, $nombre, $proyecto_id);
return true;
    }

    public static function listAll(){
        $list=Estudiante_proyectoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Estudiante_proyecto) {	
	       $rta.="{
	    \"id\":\"{$Estudiante_proyecto->getid()}\",
	    \"codigo\":\"{$Estudiante_proyecto->getcodigo()}\",
	    \"nombre\":\"{$Estudiante_proyecto->getnombre()}\",
	    \"proyecto_id\":\"{$Estudiante_proyecto->getproyecto_id()}\"
	   
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