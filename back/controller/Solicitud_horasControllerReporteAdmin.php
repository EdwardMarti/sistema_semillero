<?php
include_once realpath('../facade/Solicitud_horasFacade.php');
include_once realpath('../facade/Persona_has_semilleroFacade.php');
include_once  realpath("../dto/Solicitud_horas.php");
include_once  realpath("../facade/SemilleroFacade.php");

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);
$idSolicitud = strip_tags($dataObject->idSolicitud);
$idDocente = strip_tags($dataObject->idDocente);
$key = hash("ripemd160", $idSolicitud);

$response = Solicitud_horasFacade::selectDataForReportAdmin();

$data = array(
    "codigo" => "FO-IN-05",
    "version" => "01",
    "fecha" => "24/04/2018",
    "semestre" => $response["semestre"] ,
    "anio" => $response["anio"] ,
    "horasCantidad" => $response["horasCantidad"],
    "horasDescripcion" => $response["horasDescripcion"],
    "nombreSemillero" => $response["nombreSemillero"],
    "grupoInvestigacionNombre" => $response["grupoInvestigacionNombre"],
    "nombreDocente" => $response["nombreDocente"]
);
session_start();

$_SESSION[$key] = $data;

http_response_code(200);
echo json_encode(["key" => $key]);