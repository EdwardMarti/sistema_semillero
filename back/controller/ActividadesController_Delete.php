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


        $id = strip_tags($dataObject->id);
      
        $rpta=  ActividadesFacade::delete($id);

    
                try {
    if ($rpta == 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha Borrado exitosamente\"}";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "{\"mensaje\":\"Error al Borrar \"}";
}

       