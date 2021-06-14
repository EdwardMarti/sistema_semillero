<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
//include_once realpath('../facade/SemilleroFacade.php');
include_once realpath('../facade/Persona_has_semilleroFacade.php');
//include_once realpath('../facade/PersonaFacade.php');
//include_once realpath('../facade/Grupo_investigacionFacade.php');
//include_once realpath('../facade/Tipo_vinculacionFacade.php');
//include_once realpath('../facade/DocenteFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id);
// \"id\":\"{$Persona_has_semillero->getid()}\",
//	    \"persona_id_id\":\"{$Persona_has_semillero->getpersona_id()->getid()}\",
//	    \"semillero_id_id\":\"{$Persona_has_semillero->getsemillero_id()->getid()}\"
//$id = 2;

        $list= Persona_has_semilleroFacade::listAll_Semillero($id);
        $rta="";
        foreach ($list as $obj => $Persona_has_semillero) {	
	       $rta.="{
	    \"id\":\"{$Persona_has_semillero->getsemillero_id()->getid()}\",
	    \"nombre\":\"{$Persona_has_semillero->getsemillero_id()->getnombre()}\",
	    \"sigla\":\"{$Persona_has_semillero->getsemillero_id()->getsigla()}\",
	    \"fecha_creacion\":\"{$Persona_has_semillero->getsemillero_id()->getfecha_creacion()}\",
	    \"aval_dic_grupo\":\"{$Persona_has_semillero->getsemillero_id()->getaval_dic_grupo()}\",
	    \"aval_dic_sem\":\"{$Persona_has_semillero->getsemillero_id()->getaval_dic_sem()}\",
	    \"aval_dic_unidad\":\"{$Persona_has_semillero->getsemillero_id()->getaval_dic_unidad()}\",
	    \"grupo_investigacion_id\":\"{$Persona_has_semillero->getsemillero_id()->getgrupo_investigacion_id()->getid()}\",
	    \"departamento\":\"{$Persona_has_semillero->getsemillero_id()->getunidad_academica()}\",
	    \"facultad\":\"{$Persona_has_semillero->getsemillero_id()->getFacultad()}\",
	    \"p_estudio\":\"{$Persona_has_semillero->getsemillero_id()->getPlan_estudio()}\",
	    \"ubicacion\":\"{$Persona_has_semillero->getsemillero_id()->getUbicacion()}\",
            \"persona_Id\":\"{$Persona_has_semillero->getpersona_id()->getid()}\",
            \"nombreD\":\"{$Persona_has_semillero->getpersona_id()->getnombre()}\",
	    \"telefonoD\":\"{$Persona_has_semillero->getpersona_id()->gettelefono()}\",
	    \"correoD\":\"{$Persona_has_semillero->getpersona_id()->getcorreo()}\",
	    \"id_docente\":\"{$Persona_has_semillero->getpersona_id()->getId_aux()}\",
	    \"tp_vinculacion\":\"{$Persona_has_semillero->getpersona_id()->getperfiles_id()->getid()}\",
	    \"ubicacionD\":\"{$Persona_has_semillero->getpersona_id()->getperfiles_id()->getDescripcion()}\"
       
	       },";
        }

        if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"semilleroPer\":[{$rta}]}";
      } else {
        echo "{\"semilleroPer\":[]}";
      }
      
         
	    