<?php

include_once realpath('../correo/enviarMail.php');
include_once realpath('../facade/UsuariosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$correo = strip_tags($dataObject->correo);

if ($correo == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete el campo solicitado.\"}";
} else {
    $list = UsuariosFacade::validarEmail($correo);

    if ($list == null) {
        http_response_code(400);
        echo "{\"mensaje\":\"No se encontrĂ³ un usuario registrado con el correo suministrado.\"}";
    } else {
        //$server = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://" . $_SERVER['HTTP_HOST'];
        $server = 'http://nortcoding-demos.tk/semillero/';
        $link = $server . "/front/view/clave_nueva.html?token=";
        $token = password_hash("S3Mi3r0", PASSWORD_BCRYPT);
        $boton = "<center><a type='button' target='_blank' class='btn btn-success'
        href='$link" . "$token'>Cambiar Clave</a></center>";
        if (UsuariosFacade::inserToken($token, $list->getpersona_id()->getid(), "token_clave")) {
            
            $fullName = "Usuario";
            //enviar mail recover
            $mail = new enviarMail();
            //correo|usuario|mensaje
            $mail->enviarMensajePlantilla($correo, $fullName, $boton);
            http_response_code(200);
            echo "{\"mensaje\":\"Un mensaje ha sido enviado a su correo con los pasos a seguir.\"}";
        } else {
            http_response_code(500);
            echo "{\"mensaje\":\"Se produjo un error al generar la solicitud\"}";
        }
    }
}
