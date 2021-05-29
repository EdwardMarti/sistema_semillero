<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Don´t call me gringo you f%&ing beanner  \\
include_once realpath('../facade/Grupo_linea_investigacionFacade.php');


class Grupo_linea_investigacionController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Grupo_investigacion_id = strip_tags($_POST['grupo_investigacion_id']);
        $grupo_investigacion= new Grupo_investigacion();
        $grupo_investigacion->setId($Grupo_investigacion_id);
        $Linea_investigacion_id = strip_tags($_POST['linea_investigacion_id']);
        $linea_investigacion= new Linea_investigacion();
        $linea_investigacion->setId($Linea_investigacion_id);
        Grupo_linea_investigacionFacade::insert($id, $grupo_investigacion, $linea_investigacion);
return true;
    }

    public static function listAll(){
        $list=Grupo_linea_investigacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Grupo_linea_investigacion) {	
	       $rta.="{
	    \"id\":\"{$Grupo_linea_investigacion->getid()}\",
	    \"grupo_investigacion_id_id\":\"{$Grupo_linea_investigacion->getgrupo_investigacion_id()->getid()}\",
	    \"linea_investigacion_id_id\":\"{$Grupo_linea_investigacion->getlinea_investigacion_id()->getid()}\"
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