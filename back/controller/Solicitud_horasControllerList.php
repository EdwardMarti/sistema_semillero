<?php
include_once realpath('../facade/Solicitud_horasFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);
$idSemillero = strip_tags($dataObject->id);

$list = Solicitud_horasFacade::listHorasBySemillero($idSemillero);
$rta = "";
foreach ($list as $obj => $Solicitud_horas)
{
    $rta .= "{
	    \"id\":\"{$Solicitud_horas->getid() }\",
	    \"anio\":\"{$Solicitud_horas->getanio() }\",
	    \"semestre\":\"{$Solicitud_horas->getsemestre() }\",
	    \"horas_catedra\":\"{$Solicitud_horas->gethoras_catedra() }\",
	    \"horas_planta\":\"{$Solicitud_horas->gethoras_planta() }\",
	    \"horas_solicitadas\":\"{$Solicitud_horas->gethoras_solicitadas() }\"
	       },";
}

if ($rta != "")
{
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"horas\":[{$rta}]}";
}
else
{
    http_response_code(400);
    echo "{\"horas\":[]}";
}

