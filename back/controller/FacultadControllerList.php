<?php
include_once realpath('../facade/FacultadFacade.php');

$list=FacultadFacade::listAll();
$rta="";
foreach ($list as $obj => $Facultad) {	
    $rta.="{
        \"id\":\"{$Facultad->getid()}\",
        \"descripcion\":\"{$Facultad->getdescripcion()}\"
    },";
}
if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"falcultades\":[{$rta}]}";
} else {
    echo "{\"falcultades\":[]}";
}

