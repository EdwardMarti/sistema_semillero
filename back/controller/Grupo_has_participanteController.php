<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Y pensar que Anarchy está hecho en código espagueti...  \\
include_once realpath('../facade/Grupo_has_participanteFacade.php');


class Grupo_has_participanteController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $participantes_id = strip_tags($_POST['participantes_id']);
        $Grupo_investigacion_id = strip_tags($_POST['grupo_investigacion_id']);
        $grupo_investigacion= new Grupo_investigacion();
        $grupo_investigacion->setId($Grupo_investigacion_id);
        Grupo_has_participanteFacade::insert($id, $participantes_id, $grupo_investigacion);
return true;
    }

    public static function listAll(){
        $list=Grupo_has_participanteFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Grupo_has_participante) {	
	       $rta.="{
	    \"id\":\"{$Grupo_has_participante->getid()}\",
	    \"participantes_id\":\"{$Grupo_has_participante->getparticipantes_id()}\",
	    \"grupo_investigacion_id_id\":\"{$Grupo_has_participante->getgrupo_investigacion_id()->getid()}\"
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