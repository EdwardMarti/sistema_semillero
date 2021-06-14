<?php

include_once realpath('../facade/ProyectosFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$rpta = "";
$parte = strip_tags($dataObject->parte);

if ($parte == 1) {
    $id = strip_tags($dataObject->id);
    $tiempo_ejecucion = strip_tags($dataObject->t_ejecucion);
    $fecha_ini = strip_tags($dataObject->fecha_ini);
    $resumen = strip_tags($dataObject->resumen);
    $linea_investigacion = strip_tags($dataObject->linea_investigacion);
    $fecha_fin = strip_tags($dataObject->fecha_fin);
} else if ($parte == 2) {
    $id = strip_tags($dataObject->id);
    $tiempo_ejecucion = strip_tags($dataObject->obj_general);
    $fecha_ini = strip_tags($dataObject->obj_especifico);
    $resumen = strip_tags($dataObject->resultados);
    $linea_investigacion = strip_tags($dataObject->costo);
}

if ($parte == 1) {
    $rpta = ProyectosFacade::updateParte1($id, $tiempo_ejecucion, $fecha_ini, $resumen, $linea_investigacion, $fecha_fin);
} else if ($parte == 2) {
    $rpta = ProyectosFacade::updateParte2($id, $tiempo_ejecucion, $fecha_ini, $resumen, $linea_investigacion);
}

try {
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "{\"mensaje\":\"Error al registrar el proyecto\"}";
}
