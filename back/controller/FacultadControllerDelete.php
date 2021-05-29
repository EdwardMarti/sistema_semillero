<?php
include_once realpath('../facade/FacultadFacade.php');
try {


//    include_once realpath('../facade/InspectorFacade.php');
//    include_once realpath('../util/Util.php');
//
//    $token = (empty(apache_request_headers()['Authorization'])) ? null : apache_request_headers()['Authorization'];
//    $plataform = (empty(apache_request_headers()['Plataform'])) ? null : apache_request_headers()['Plataform'];
//    $user = InspectorFacade::isLogin($token);

//    if ($user == null) {
//        http_response_code(401);
//        echo "{\"mensaje\":\"La sesión ha expirado.\"}";
//    } else {
//        if ($user->getrol() != 1) {
//            http_response_code(403);
//            echo "{\"mensaje\":\"El usuario no cuenta con los permisos para ejecutar la acción.\"}";
//        } else {

//            //Verificar Caducidad
//            $fechaActual = strtotime(date("Y-m-d H:i:s"));
//            $tokenCaducidad = $plataform === "web" ? strtotime(date($user->getestado())) : strtotime(date("Y-m-d H:i:s"));
//
//            if ($fechaActual > $tokenCaducidad) {
//                http_response_code(401);
//                echo "{\"mensaje\":\"La sesión ha expirado.\"}";
//            } else {
    $JSONData = file_get_contents("php://input");
    $dataObject = json_decode($JSONData);
    $id = strip_tags($dataObject->id);
    
    if ($id == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Debe enviar un identificador de Facultad.\"}";
    } else {
    try {
        $rpta = FacultadFacade::delete($id);
        if ($rpta) {
            http_response_code(200);
            echo "{\"mensaje\":\"Se ha Eliminado exitosamente\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al Eliminar el Facultad\"}";
    }
    }
} catch (ErrorException $e) {
    echo "{\"status\": false }";
}
