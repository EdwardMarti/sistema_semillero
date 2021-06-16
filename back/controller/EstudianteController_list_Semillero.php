<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\
include_once realpath('../facade/SemilleroFacade.php');
include_once realpath('../facade/EstudianteFacade.php');
include_once realpath('../facade/Pares_academicosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$docente = strip_tags($dataObject->docente_id);
$semillero_id = strip_tags($dataObject->semillero_id);
$list = SemilleroFacade::listAll_docente($docente);
$rta_semi="";
$semillero_copy = $list[0];

foreach ($list as $obj => $Semillero) {	
   $rta_semi.="{
      \"id\":\"{$Semillero->getid()}\",
      \"nombre\":\"{$Semillero->getnombre()}\",
      \"sigla\":\"{$Semillero->getsigla()}\",
      \"fecha_creacion\":\"{$Semillero->getfecha_creacion()}\",
      \"grupo_investigacion_id_id\":\"{$Semillero->getgrupo_investigacion_id()->getid()}\",
      \"departamento\":\"{$Semillero->getunidad_academica()}\",
      \"facultad\":\"{$Semillero->getFacultad()}\",
      \"plan_estudio\":\"{$Semillero->getPlan_estudio()}\"
   }";
}

$id = strip_tags($semillero_copy->getid());
$list=EstudianteFacade::listAll_Semillero($semillero_id);
$list_pares=Pares_academicosFacade::listAll($semillero_id);
$rta="";
$rta_pares="";

foreach ($list as $obj => $Estudiante) {	
   $rta.="{
   \"id\":\"{$Estudiante->getid()}\",
   \"nombre\":\"{$Estudiante->getpersona_id()->getNombre()}\",
   \"num_documento\":\"{$Estudiante->getnum_documento()}\",   
   \"programa_academico\":\"{$Estudiante->getprograma_academico()}\",     
   \"codigo\":\"{$Estudiante->getcodigo()}\",
   \"semestre\":\"{$Estudiante->getsemestre()}\",
   \"correo\":\"{$Estudiante->getpersona_id()->getCorreo()}\",
   \"telefono\":\"{$Estudiante->getpersona_id()->getTelefono()}\",
   \"persona_id_id\":\"{$Estudiante->getpersona_id()->getid()}\",
   \"tipo_docuemnto_id_id\":\"{$Estudiante->gettipo_docuemnto_id()->getid()}\"
   },";
}

foreach ($list_pares as $obj => $Pares_academicos) {	
   $rta_pares.="{
      \"id\":\"{$Pares_academicos->getid()}\",
      \"inst_empresa\":\"{$Pares_academicos->getinst_empresa()}\",
      \"nombrep\":\"{$Pares_academicos->getPersona_id()->getNombre()}\",
      \"correo\":\"{$Pares_academicos->getPersona_id()->getCorreo()}\",
      \"telefono\":\"{$Pares_academicos->getPersona_id()->getTelefono()}\",
      \"persona_id_id\":\"{$Pares_academicos->getPersona_id()->getId()}\",
      \"numero_docuemnto\":\"{$Pares_academicos->getnumero_docuemnto()}\",
      \"tipo_docuemnto_id_id\":\"{$Pares_academicos->gettipo_docuemnto_id()->getid()}\"
   },";
}

if ($rta != "" || $rta_pares != "") {
   $rta = substr($rta, 0, -1);
   $rta_pares = substr($rta_pares, 0, -1);
   http_response_code(200);
   echo "{ \"semillero\":$rta_semi,\"estudiante\":[{$rta}],\"pares\":[{$rta_pares}] }";
} else {
   echo "{\"estudiante\":[]}";
}