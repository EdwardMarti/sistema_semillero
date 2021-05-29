<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\
include_once realpath('../facade/EstudianteFacade.php');


class EstudianteController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $codigo = strip_tags($_POST['codigo']);
        $semestre = strip_tags($_POST['semestre']);
        $programa_academico = strip_tags($_POST['programa_academico']);
        $Persona_id = strip_tags($_POST['persona_id']);
        $persona= new Persona();
        $persona->setId($Persona_id);
        $num_documento = strip_tags($_POST['num_documento']);
        $Tipo_docuemnto_id = strip_tags($_POST['tipo_docuemnto_id']);
        $tipo_docuemnto= new Tipo_docuemnto();
        $tipo_docuemnto->setId($Tipo_docuemnto_id);
        EstudianteFacade::insert($id, $codigo, $semestre, $programa_academico, $persona, $num_documento, $tipo_docuemnto);
return true;
    }

    public static function listAll(){
        $list=EstudianteFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Estudiante) {	
	       $rta.="{
	    \"id\":\"{$Estudiante->getid()}\",
	    \"codigo\":\"{$Estudiante->getcodigo()}\",
	    \"semestre\":\"{$Estudiante->getsemestre()}\",
	    \"programa_academico\":\"{$Estudiante->getprograma_academico()}\",
	    \"persona_id_id\":\"{$Estudiante->getpersona_id()->getid()}\",
	    \"num_documento\":\"{$Estudiante->getnum_documento()}\",
	    \"tipo_docuemnto_id_id\":\"{$Estudiante->gettipo_docuemnto_id()->getid()}\"
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