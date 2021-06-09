<?php
include_once realpath('../facade/Solicitud_horasFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id = strip_tags($dataObject->id);
$anio = strip_tags($dataObject->anio);
$semestre = strip_tags($dataObject->semestre);
$horasCatedra = strip_tags($dataObject->horas_catedra);
$horasPlanta = strip_tags($dataObject->horas_planta);
$horasSolicitadas= strip_tags($dataObject->horas_solicitadas);

$response = Solicitud_horasFacade::update($id, $anio,  $semestre,  $horasCatedra,  $horasPlanta,  $horasSolicitadas);
try {
  if ($response > 0) {
          http_response_code(200);
          echo json_encode(["mensaje"=>"Se ha registrado exitosamente"]);
  }
} catch (Exception $e) {
  http_response_code(500);
  echo json_encode(["mensaje"=>"No se pudo actualizar la solicitud de horas"]);
}    