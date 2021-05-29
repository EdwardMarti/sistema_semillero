<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Has encontrado la frase #1024 ¡Felicidades! Ahora tu proyecto funcionará a la primera  \\
include_once realpath('../facade/Proy_lineas_investFacade.php');


class Proy_lineas_investController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Proyectos_id = strip_tags($_POST['proyectos_id']);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        $Linea_investigacion_id = strip_tags($_POST['linea_investigacion_id']);
        $linea_investigacion= new Linea_investigacion();
        $linea_investigacion->setId($Linea_investigacion_id);
        Proy_lineas_investFacade::insert($id, $proyectos, $linea_investigacion);
return true;
    }

    public static function listAll(){
        $list=Proy_lineas_investFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Proy_lineas_invest) {	
	       $rta.="{
	    \"id\":\"{$Proy_lineas_invest->getid()}\",
	    \"proyectos_id_id\":\"{$Proy_lineas_invest->getproyectos_id()->getid()}\",
	    \"linea_investigacion_id_id\":\"{$Proy_lineas_invest->getlinea_investigacion_id()->getid()}\"
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