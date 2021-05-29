<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella no te quiere </3 mejor ponte a programar  \\
include_once realpath('../facade/Fuente_financiacionFacade.php');


class Fuente_financiacionController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $fuente = strip_tags($_POST['fuente']);
        $valor = strip_tags($_POST['valor']);
        $Proyectos_id = strip_tags($_POST['proyectos_terminados_id']);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        Fuente_financiacionFacade::insert($id, $fuente, $valor, $proyectos);
return true;
    }

    public static function listAll(){
        $list=Fuente_financiacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Fuente_financiacion) {	
	       $rta.="{
	    \"id\":\"{$Fuente_financiacion->getid()}\",
	    \"fuente\":\"{$Fuente_financiacion->getfuente()}\",
	    \"valor\":\"{$Fuente_financiacion->getvalor()}\",
	    \"proyectos_terminados_id_id\":\"{$Fuente_financiacion->getproyectos_terminados_id()->getid()}\"
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