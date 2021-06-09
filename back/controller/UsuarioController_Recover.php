<?php

include_once realpath('../correo/enviarMail.php');
include_once realpath('../facade/UsuarioFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$correo = strip_tags($dataObject->correo);

if ($correo == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete el campo solicitado.\"}";
} else {
    $list = UsuarioFacade::validarEmail($correo);

    if ($list == null) {
        http_response_code(400);
        echo "{\"mensaje\":\"No se encontró un usuario registrado con el correo suministrado.\"}";
    } else {
        $server = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://" . $_SERVER['HTTP_HOST'];
        $link = $server . "/front/view/login/clave_nueva.html?token=";
        $token = password_hash("F3Rl@", PASSWORD_BCRYPT);
        $boton = "<center><a type='button' target='_blank' class='btn btn-success'
        href='$link" . "$token'>Cambiar Clave</a></center>";
        if (UsuarioFacade::inserToken($token, $list->getidUsuario(), "tokenClave")) {
            $name = $list->getnombres();
            $lastName = $list->getApellidos();
            $fullName = $name . ' ' . $lastName;
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
