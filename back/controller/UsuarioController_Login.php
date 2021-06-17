<?php

include_once realpath('../facade/UsuariosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$correo = strip_tags($dataObject->correo);
$clave = strip_tags($dataObject->clave);
/* $correo = 'shirleypaolanv@ufps.edu.co';*/
//$clave = 'password'; *
$clave = md5($clave);
$rpta = 0;
$rta = "";

if ($correo == "" || $clave == "") {
    http_response_code(400); //complete los campos
    echo "{\"mensaje\":\"Complete todos los campos\"}";
} else {

    $list = UsuariosFacade::login($correo, $clave);

    if ($list == null) {
        http_response_code(500); //clave o usuario incorrecto
        echo "{\"mensaje\":\"Usuario o Clave incorrectos\"}";
    } else {
        $token = password_hash("F3Rl@", PASSWORD_BCRYPT);

        //se inserta el tiempo de sesion permitido
        $fecha = date('Y/m/d H:i:s');
        $nuevafecha = strtotime('+1 hour', strtotime($fecha));
        //$nuevafecha = strtotime ( '+5 minute' , strtotime ( $fecha ) ) ;
        //$nuevafecha = strtotime ( '+30 second' , strtotime ( $fecha ) ) ;
        $nuevafecha = date('Y/m/d H:i:s', $nuevafecha);

        //Validaciones para saber si posee los roles de jurado y cordinador
        UsuariosFacade::inserToken($nuevafecha, $list->getpersona_id()->getid(), "tokenCaducidad");

        if (UsuariosFacade::inserToken($token, $list->getpersona_id()->getid(), "token")) {

            $rta = "{
            \"id\":\"{$list->getpersona_id()->getid()}\",
            \"token\":\"{$token}\",
            \"nombre\":\"{$list->getid()}\",
            \"semillero\":\"{$list->getpassword()}\",
            \"id_semillero\":\"{$list->getpersona_id()->getid_aux()}\",
            \"correo\":\"{$list->getpersona_id()->getcorreo()}\",
            \"rol\":\"{$list->getpersona_id()->getperfiles_id()}\"
            },";

            if ($rta != "") {
                $rta = substr($rta, 0, -1);
                http_response_code(200); //exito al loguearse
                echo "{\"usuario\":[{$rta}]}";
            } else {
                echo "{\"usuario\":[]}";
            }
        } else {
            http_response_code(500); //error al crear login de inicio de sesion
            echo "{\"mensaje\":\"Error al crear login de inicio de sesion\"}";
        }
    }
}
