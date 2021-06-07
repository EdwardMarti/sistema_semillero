<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../facade/SemilleroFacade.php');
include_once realpath('../facade/PersonaFacade.php');
include_once realpath('../facade/EstudianteFacade.php');
include_once realpath('../facade/Persona_has_semilleroFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$estu_id = strip_tags($dataObject->estu_id);
$persona_id_id = strip_tags($dataObject->persona_id_id);
$estu_nombre = strip_tags($dataObject->estu_nombre);
$estu_telefono = strip_tags($dataObject->estu_telefono);
$estu_correo = strip_tags($dataObject->estu_correo);
$estu_codigo = strip_tags($dataObject->estu_codigo);
$estu_semestre = strip_tags($dataObject->estu_semestre);
$estu_programa_academico = strip_tags($dataObject->estu_programa_academico);
$estu_tipo_docuemnto_id = strip_tags($dataObject->estu_tipo_docuemnto_id);
$estu_num_documento = strip_tags($dataObject->estu_num_documento);

$Perfiles_id = "1";
$perfiles= new Perfiles();
$perfiles->setId($Perfiles_id);
$rptaP=PersonaFacade::update($persona_id_id, $estu_nombre, $estu_telefono, $estu_correo, $perfiles);
/*registrar docente*/
$Persona_id = $rptaP;
$persona= new Persona();
$persona->setId($Persona_id);
$tipo_doc_obnject = new Tipo_docuemnto();
$tipo_doc_obnject->setId($estu_tipo_docuemnto_id);
$estudiante = EstudianteFacade::update($estu_id, $estu_codigo,  $estu_semestre,  $estu_programa_academico,  $persona,  $estu_num_documento,  $tipo_doc_obnject);
try {
        if ($estudiante) {
                http_response_code(200);
                echo "{\"mensaje\":\"Se ha actualizado exitosamente\"}";
        }
} catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al actualizar el estudiante\"}";
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