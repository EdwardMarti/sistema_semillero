<?php
include_once realpath('../facade/Solicitud_horasFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$anio = strip_tags($dataObject->anio);
$semestre = strip_tags($dataObject->semestre);
$horasCatedra = strip_tags($dataObject->horas_catedra);
$horasPlanta = strip_tags($dataObject->horas_planta);
$horasSolicitadas= strip_tags($dataObject->horas_solicitadas);
$idSemillero = 2;

$response = Solicitud_horasFacade::insert($anio,  $semestre,  $horasCatedra,  $horasPlanta,  $horasSolicitadas, $idSemillero);
try {
  if ($response > 0) {
          http_response_code(200);
          echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
  }
} catch (Exception $e) {
  http_response_code(500);
  echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
}    