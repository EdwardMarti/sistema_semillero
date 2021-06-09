<?php
include_once realpath('../facade/Solicitud_horasFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id = strip_tags($dataObject->id);

$response = Solicitud_horasFacade::delete($id);

try {
  if ($response > 0) {
          http_response_code(200);
          echo json_encode(["mensaje"=>"Se ha eliminado exitosamente"]);
  }
} catch (Exception $e) {
  http_response_code(500);
  echo json_encode(["mensaje"=>"No se pudo eliminar la solicitud de horas"]);
}    