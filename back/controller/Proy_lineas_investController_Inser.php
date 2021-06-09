<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Has encontrado la frase #1024 ¡Felicidades! Ahora tu proyecto funcionará a la primera  \\
include_once realpath('../facade/Proy_lineas_investFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$descripcion = strip_tags($dataObject->descripcion);

        $id = strip_tags($dataObject->responsable);
        $Proyectos_id = strip_tags($dataObject->proyectos_id);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        $Linea_investigacion_id = strip_tags($dataObject->linea_investigacion_id);
        $linea_investigacion= new Linea_investigacion();
        $linea_investigacion->setId($Linea_investigacion_id);
        Proy_lineas_investFacade::insert($id, $proyectos, $linea_investigacion);
        
       try {
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "{\"mensaje\":\"Error al registrar \"}";
}