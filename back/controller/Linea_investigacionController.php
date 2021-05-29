<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\
include_once realpath('../facade/Linea_investigacionFacade.php');


class Linea_investigacionController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $lider = strip_tags($_POST['lider']);
        Linea_investigacionFacade::insert($id, $descripcion, $lider);
return true;
    }

    public static function listAll(){
        $list=Linea_investigacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Linea_investigacion) {	
	       $rta.="{
	    \"id\":\"{$Linea_investigacion->getid()}\",
	    \"descripcion\":\"{$Linea_investigacion->getdescripcion()}\",
	    \"lider\":\"{$Linea_investigacion->getlider()}\"
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