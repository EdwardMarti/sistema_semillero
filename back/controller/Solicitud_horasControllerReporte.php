<?php
include_once realpath('../facade/Solicitud_horasFacade.php');
include_once realpath('../facade/Persona_has_semilleroFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);
$idSolicitud = strip_tags($dataObject->id);
$key = hash("ripemd160", $idSolicitud);

$solicitud = Solicitud_horasFacade::select($idSolicitud);
http_response_code(200);
echo json_encode(["key" => $solicitud]);
die();
$list = Persona_has_semilleroFacade::listAll_todo($idSolicitud);

http_response_code(200);
var_dump($solicitud);
die();
$semillero = $list->getSemillero_id();
//$semillero=4;
$grupoInvestigacion = $semillero->getGrupo_investigacion_id();
$persona = $list->getPersona_id();

$data = array(
    "codigo" => "FO-IN-05",
    "version" => "01",
    "fecha" => "24/04/2018",
    "grupo_investigacion" => $grupoInvestigacion->getId() ,
    "semillero" => $semillero->getNombre() ,
    "semestre" => $solicitud->getSemestre() ,
    "anio" => $solicitud->getAnio() ,
    "horas_catedra" => $solicitud->getHoras_catedra() ,
    "horas_planta" => $solicitud->getHoras_planta() ,
    "horas_solicitadas" => $solicitud->getHoras_solicitadas() ,
    "docente" => $persona->getNombre()
);

session_start();

$_SESSION[$key] = $data;

http_response_code(200);
echo json_encode(["key" => $key]);