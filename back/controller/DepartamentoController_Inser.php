<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\
include_once realpath('../facade/DepartamentoFacade.php');

     $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$numero = strip_tags($dataObject->numero);
        $descripcion = strip_tags($dataObject->descripcion);
        $Facultad_id = strip_tags($dataObject->facultad_id);
        $facultad= new Facultad();
        $facultad->setId($Facultad_id);
        DepartamentoFacade::insert( $descripcion, $facultad);
 if ($descripcion == "" || $Facultad_id == "") {
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
   