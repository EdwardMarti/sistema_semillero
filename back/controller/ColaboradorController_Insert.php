<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Hey ¿cómo se llama tu café internet?  \\
include_once realpath('../facade/ColaboradorFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$nombre = strip_tags($dataObject->nombre);
$codigo = strip_tags($dataObject->codigo);
$tp_colaborador = strip_tags($dataObject->tipo);
$Proyectos_id = strip_tags($dataObject->id_proyecto);
$proyectos = new Proyectos();
$proyectos->setId($Proyectos_id);

if ($nombre == "" || $codigo == "" || $tp_colaborador == "" || $Proyectos_id == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete todos los campos\"}";
} else {
    try {
        $rpta = ColaboradorFacade::insert($nombre, $codigo, $tp_colaborador, $proyectos);
        if ($rpta > 0) {
            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar\"}";
    }
}