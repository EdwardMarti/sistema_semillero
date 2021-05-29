<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\
include_once realpath('../facade/DocenteFacade.php');


class DocenteController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Persona_id = strip_tags($_POST['persona_id']);
        $persona= new Persona();
        $persona->setId($Persona_id);
        $password = strip_tags($_POST['password']);
        $Tipo_vinculacion_id = strip_tags($_POST['tipo_vinculacion_id']);
        $tipo_vinculacion= new Tipo_vinculacion();
        $tipo_vinculacion->setId($Tipo_vinculacion_id);
        $ubicacion = strip_tags($_POST['ubicacion']);
        DocenteFacade::insert($id, $persona, $password, $tipo_vinculacion, $ubicacion);
return true;
    }

    public static function listAll(){
        $list=DocenteFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Docente) {	
	       $rta.="{
	    \"id\":\"{$Docente->getid()}\",
	    \"persona_id_id\":\"{$Docente->getpersona_id()->getid()}\",
	    \"password\":\"{$Docente->getpassword()}\",
	    \"tipo_vinculacion_id_id\":\"{$Docente->gettipo_vinculacion_id()->getid()}\",
	    \"ubicacion\":\"{$Docente->getubicacion()}\"
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