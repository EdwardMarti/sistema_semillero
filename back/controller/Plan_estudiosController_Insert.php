<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    404 Frase no encontrada  \\
include_once realpath('../facade/Plan_estudiosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$descripcion = strip_tags($dataObject->descripcion);
$Departamento_id = strip_tags($dataObject->departamento_id);
$departamento = new Departamento();
$departamento->setId($Departamento_id);
$rpta = Plan_estudiosFacade::insert($descripcion, $departamento);

if ($descripcion == "" || $Departamento_id == "") {
    http_response_code(400);
    echo "{\"mensaje\":\"Complete todos los campos\"}";
} else {

    try {
        if ($rpta > 0) {
            http_response_code(200);
            echo "{\"id\":\"{$rpta}\",\"mensaje\":\"Se ha registrado exitosamente\"}";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
    }
}
   
