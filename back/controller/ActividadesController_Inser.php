<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\
include_once realpath('../facade/ActividadesFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);




        $descripcion = strip_tags($dataObject->descripcionAct);
        $Proyectos_id = strip_tags($dataObject->proyectos_id);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        $rpta=  ActividadesFacade::insert( $descripcion, $proyectos);

    
                try {
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "{\"mensaje\":\"Error al registrar \"}";
}

       