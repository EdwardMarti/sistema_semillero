<?php

include_once realpath('../facade/ColaboradorFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id = strip_tags($dataObject->id);
$tipo = strip_tags($dataObject->tipo);

$list = ColaboradorFacade::listAll_Id($id,$tipo);
$rta = "";
foreach ($list as $obj => $Colaborador) {
    $rta .= "{
	    \"id\":\"{$Colaborador->getid()}\",
	    \"nombre\":\"{$Colaborador->getnombre()}\",
	    \"codigo\":\"{$Colaborador->getcodigo()}\",
	    \"tp_colaborador\":\"{$Colaborador->gettp_colaborador()}\",
	    \"proyecto_id\":\"{$Colaborador->getproyectos_id()->getid()}\"
	       },";
}

if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"Colaborador\":[{$rta}]}";
} else {
    echo "{\"Colaborador\":[]}";
}
