<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ojitos de luz de luna  \\
include_once realpath('../facade/PersonaFacade.php');


class PersonaController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre = strip_tags($_POST['nombre']);
        $telefono = strip_tags($_POST['telefono']);
        $correo = strip_tags($_POST['correo']);
        $Perfiles_id = strip_tags($_POST['perfiles_id']);
        $perfiles= new Perfiles();
        $perfiles->setId($Perfiles_id);
        PersonaFacade::insert($id, $nombre, $telefono, $correo, $perfiles);
return true;
    }

    public static function listAll(){
        $list=PersonaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Persona) {	
	       $rta.="{
	    \"id\":\"{$Persona->getid()}\",
	    \"nombre\":\"{$Persona->getnombre()}\",
	    \"telefono\":\"{$Persona->gettelefono()}\",
	    \"correo\":\"{$Persona->getcorreo()}\",
	    \"perfiles_id_id\":\"{$Persona->getperfiles_id()->getid()}\"
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