<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\
include_once realpath('../facade/Persona_has_semilleroFacade.php');


class Persona_has_semilleroController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Persona_id = strip_tags($_POST['persona_id']);
        $persona= new Persona();
        $persona->setId($Persona_id);
        $Semillero_id = strip_tags($_POST['semillero_id']);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        Persona_has_semilleroFacade::insert($id, $persona, $semillero);
return true;
    }

    public static function listAll(){
        $list=Persona_has_semilleroFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Persona_has_semillero) {	
	       $rta.="{
	    \"id\":\"{$Persona_has_semillero->getid()}\",
	    \"persona_id_id\":\"{$Persona_has_semillero->getpersona_id()->getid()}\",
	    \"semillero_id_id\":\"{$Persona_has_semillero->getsemillero_id()->getid()}\"
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