<?php

include_once realpath('../facade/Fuente_financiacionFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$fuente = strip_tags($dataObject->fuente);
$valor = strip_tags($dataObject->valor);
$Proyectos_id = strip_tags($dataObject->proyecto_id);
$proyectos = new Proyectos();
$proyectos->setId($Proyectos_id);

if ($fuente == "" || $valor == "" || $Proyectos_id == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete todos los campos\"}";
} else {
    try {
        $rpta = Fuente_financiacionFacade::insert($fuente, $valor, $proyectos);
        if ($rpta > 0) {
            http_response_code(200);
            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar\"}";
    }
}
