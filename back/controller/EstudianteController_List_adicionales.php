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
include_once realpath('../facade/Datos_adicionalesSSFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->semillero_id);

$list=Datos_adicionalesSSFacade::list_adicionales($id);
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


if ($rta != "" || $rta_pares != "") {
   $rta = substr($rta, 0, -1);
   $rta_pares = substr($rta_pares, 0, -1);
   http_response_code(200);
   echo "{ \"semillero\":$rta_semi,\"estudiante\":[{$rta}],\"pares\":[{$rta_pares}] }";
} else {
   echo "{\"estudiante\":[]}";
}