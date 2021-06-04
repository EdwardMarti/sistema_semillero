<?php
include_once realpath('../facade/SemilleroFacade.php');
include_once realpath('../facade/PersonaFacade.php');
include_once realpath('../facade/Pares_academicosFacade.php');
include_once realpath('../facade/Persona_has_semilleroFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$pares_id = strip_tags($dataObject->pares_id);
$pares_persona_id_id = strip_tags($dataObject->pares_persona_id_id);
$pares_nombre = strip_tags($dataObject->pares_nombre);
$pares_telefono = strip_tags($dataObject->pares_telefono);
$pares_tipo_docuemnto_id = strip_tags($dataObject->pares_tipo_docuemnto_id);
$pares_num_documento = strip_tags($dataObject->pares_num_documento);
$pares_empresa = strip_tags($dataObject->pares_empresa);
$pares_correo = strip_tags($dataObject->pares_correo);

$Perfiles_id = "1";
$perfiles= new Perfiles();
$perfiles->setId($Perfiles_id);
$rptaP=PersonaFacade::update($pares_persona_id_id,$pares_nombre, $pares_telefono, $pares_correo, $perfiles);
/*registrar docente*/
$Persona_id = $rptaP;
$persona= new Persona();
$persona->setId($Persona_id);
$tipo_doc_obnject = new Tipo_docuemnto();
$tipo_doc_obnject->setId($pares_tipo_docuemnto_id);
$par_academico = Pares_academicosFacade::insert($pares_id,  $pares_empresa,  $persona,  $pares_num_documento,  $tipo_doc_obnject);
try {
        if ($par_academico > 0) {
                http_response_code(200);
                echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
        }
} catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar el par academico\"}";
}    




function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}