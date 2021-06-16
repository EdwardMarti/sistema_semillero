<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Por desgracia, mi epitafio será una frase insulsa y vacía  \\
include_once realpath('../facade/ProyectosFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$titulo = strip_tags($dataObject->titulo);
$investigador = strip_tags($dataObject->investigador);
$id_semillero = strip_tags($dataObject->id_semillero);

if ($titulo == "" || $investigador == "" || $id_semillero == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete todos los campos \"}";
} else {
    $rpta = ProyectosFacade::insertBasico($titulo, $investigador, $id_semillero);

    try {
        if ($rpta > 0) {
            http_response_code(200);
            echo "{
                \"id\":\"{$rpta}\",
                \"mensaje\":\"Se ha registrado exitosamente\"
            }";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar el proyecto\"}";
    }
}
