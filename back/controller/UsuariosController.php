<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\
include_once realpath('../facade/UsuariosFacade.php');


class UsuariosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Persona_id = strip_tags($_POST['persona_id']);
        $persona= new Persona();
        $persona->setId($Persona_id);
        $password = strip_tags($_POST['password']);
        UsuariosFacade::insert($id, $persona, $password);
return true;
    }

    public static function listAll(){
        $list=UsuariosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Usuarios) {	
	       $rta.="{
	    \"id\":\"{$Usuarios->getid()}\",
	    \"persona_id_id\":\"{$Usuarios->getpersona_id()->getid()}\",
	    \"password\":\"{$Usuarios->getpassword()}\"
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