<?php
include_once realpath('../facade/Solicitud_horasFacade.php');
include_once realpath('../facade/SemilleroFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$key = hash("ripemd160", strip_tags($dataObject->id));
//$semillero = SemilleroFacade::select(strip_tags($dataObject->dirigido_id));
$data = array(
    "codigo" => "FO-IN-08",
    "version" => "01",
    "fecha" => "06/06/2019",
    "semestre" => strip_tags($dataObject->semestre) ,
    "anio" => strip_tags($dataObject->ano) ,
    "porcentaje" => strip_tags($dataObject->porcentaje) ,
    "productos" => strip_tags($dataObject->productos),
    "descripcion" => strip_tags($dataObject->descripcion),
    "acepta_dos_id" => strip_tags($dataObject->acepta_dos_id),
    "acepta_uno_id" => strip_tags($dataObject->acepta_uno_id),
 //   "productos" => strip_tags($dataObject->productos),
 //   "semilero"=>$semillero->getNombre()
    "semillero"=>"SEMILLERO DE PRUEBA"
);

session_start();

$_SESSION[$key] = $data;

http_response_code(200);
echo json_encode(["key" => $key]);