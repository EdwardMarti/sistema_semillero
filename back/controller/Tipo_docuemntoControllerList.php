<?php
include_once realpath('../facade/Tipo_docuemntoFacade.php');
$list=Tipo_docuemntoFacade::listAll();
$rta="";
foreach ($list as $obj => $Tipo_docuemnto) {	
    $rta.="{
        \"id\":\"{$Tipo_docuemnto->getid()}\",
        \"descripcion\":\"{$Tipo_docuemnto->getdescripcion()}\"
    },";
}

if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    // echo json_encode([
    //     "tipo_doc" => $rta
    // ]);
    echo "{\"tipo_doc\":[{$rta}]}";
  } else {
    echo "{\"tipo_doc\":[]}";
    // echo json_encode([
    //     "tipo_doc" => []
    // ]);
  }