<?php

include_once realpath('../facade/Fuente_financiacionFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id = strip_tags($dataObject->id);

$list = Fuente_financiacionFacade::listAll_Id($id);
$rta = "";
foreach ($list as $obj => $Fuente_financiacion) {
    $rta .= "{
	    \"id\":\"{$Fuente_financiacion->getid()}\",
	    \"fuente\":\"{$Fuente_financiacion->getfuente()}\",
	    \"valor\":\"{$Fuente_financiacion->getvalor()}\",
	    \"proyecto_id\":\"{$Fuente_financiacion->getproyectos_terminados_id()->getid()}\"
	       },";
}

if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"Fuente\":[{$rta}]}";
} else {
    echo "{\"Fuente\":[]}";
}