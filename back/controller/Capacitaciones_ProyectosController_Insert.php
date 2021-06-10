<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\
include_once realpath('../facade/Capacitaciones_ProyectosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

//        $id = strip_tags($dataObject->id);
        $tema = strip_tags($dataObject->temaCap);
        $docente = strip_tags($dataObject->docenteCap);
        $fecha = strip_tags($dataObject->fechaCap);
        $cant_capacitados = strip_tags($dataObject->cant_capacitadosCap);
        $proyecto_id = strip_tags($dataObject->proyecto_idCap);
        $objetivo = strip_tags($dataObject->objetivoCap);
        $responsable = " ";
       $rpta= Capacitaciones_ProyectosFacade::insert( $tema, $docente, $fecha, $cant_capacitados, $proyecto_id, $objetivo,$responsable);
       try {
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "{\"mensaje\":\"Error al registrar \"}";
}