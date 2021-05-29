<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\
include_once realpath('../facade/Persona_has_grupoFacade.php');


class Persona_has_grupoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $Grupo_investigacion_id = strip_tags($_POST['grupo_investigacion_id']);
        $grupo_investigacion= new Grupo_investigacion();
        $grupo_investigacion->setId($Grupo_investigacion_id);
        $Persona_id = strip_tags($_POST['persona_id']);
        $persona= new Persona();
        $persona->setId($Persona_id);
        Persona_has_grupoFacade::insert($id, $grupo_investigacion, $persona);
return true;
    }

    public static function listAll(){
        $list=Persona_has_grupoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Persona_has_grupo) {	
	       $rta.="{
	    \"id\":\"{$Persona_has_grupo->getid()}\",
	    \"grupo_investigacion_id_id\":\"{$Persona_has_grupo->getgrupo_investigacion_id()->getid()}\",
	    \"persona_id_id\":\"{$Persona_has_grupo->getpersona_id()->getid()}\"
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