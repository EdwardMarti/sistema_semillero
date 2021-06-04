<?php

include_once  ('../facade/SemilleroFacade.php');
include_once realpath('../facade/EstudianteFacade.php');
include_once realpath('../facade/Persona_has_semilleroFacade.php');
include_once realpath('../facade/PersonaFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$estu_id = strip_tags($dataObject->id);
$persona_id = strip_tags($dataObject->persona_id_id);

$list=EstudianteFacade::delete($estu_id);
$list=PersonaFacade::delete($persona_id);
$list_pares=Persona_has_semilleroFacade::deletecustom($estu_id,$persona_id);

if ($list == "") {
   http_response_code(400);
   echo "{\"mensaje\":\"Complete todos los campos\"}";
} else {
   try {
       if ($list == 0) {
           http_response_code(200);
           echo "{\"mensaje\":\"Se ha eliminado exitosamente\"}";
       }
   } catch (Exception $e) {
       http_response_code(500);
       echo "{\"mensaje\":\"Error al eliminar el estudiante\"}";
   }
}