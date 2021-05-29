<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El coronel necesitó setenta y cinco años -los setenta y cinco años de su vida, minuto a minuto- para llegar a ese instante. Se sintió puro, explícito, invencible, en el momento de responder:  \\
include_once realpath('../facade/PerfilesFacade.php');


class PerfilesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        PerfilesFacade::insert($id, $descripcion);
return true;
    }

    public static function listAll(){
        $list=PerfilesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Perfiles) {	
	       $rta.="{
	    \"id\":\"{$Perfiles->getid()}\",
	    \"descripcion\":\"{$Perfiles->getdescripcion()}\"
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