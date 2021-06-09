<?php

include_once realpath('../facade/UsuarioFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$clave = strip_tags($dataObject->clave);
$token = strip_tags($dataObject->token);
//$clave = md5($clave);

if ($clave == "" || $token == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete todos los campos.\"}";
} else {

    $list = UsuarioFacade::newPass($clave, $token);
    if ($list == null) {
        http_response_code(400);
        echo "{\"mensaje\":\"Debe generar un nuevo token este ya ha caducado.\"}";
    } else {
        http_response_code(200);
        echo "{}";
    }
}
