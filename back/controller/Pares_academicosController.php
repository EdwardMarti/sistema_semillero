<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\
include_once realpath('../facade/Pares_academicosFacade.php');


class Pares_academicosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $inst_empresa = strip_tags($_POST['inst_empresa']);
        $Persona_id = strip_tags($_POST['persona_id']);
        $persona= new Persona();
        $persona->setId($Persona_id);
        $numero_docuemnto = strip_tags($_POST['numero_docuemnto']);
        $Tipo_docuemnto_id = strip_tags($_POST['tipo_docuemnto_id']);
        $tipo_docuemnto= new Tipo_docuemnto();
        $tipo_docuemnto->setId($Tipo_docuemnto_id);
        Pares_academicosFacade::insert($id, $inst_empresa, $persona, $numero_docuemnto, $tipo_docuemnto);
return true;
    }

    public static function listAll(){
        $list=Pares_academicosFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Pares_academicos) {	
	       $rta.="{
	    \"id\":\"{$Pares_academicos->getid()}\",
	    \"inst_empresa\":\"{$Pares_academicos->getinst_empresa()}\",
	    \"persona_id_id\":\"{$Pares_academicos->getpersona_id()->getid()}\",
	    \"numero_docuemnto\":\"{$Pares_academicos->getnumero_docuemnto()}\",
	    \"tipo_docuemnto_id_id\":\"{$Pares_academicos->gettipo_docuemnto_id()->getid()}\"
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