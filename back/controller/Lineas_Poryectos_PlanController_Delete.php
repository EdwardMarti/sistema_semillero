<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\
include_once realpath('../facade/Linea_investigacionFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);



$id = strip_tags($dataObject->id);


$rpta = Linea_investigacionFacade::delete($id);

try {
    if ($rpta == 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha Borrado exitosamente\"}";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "{\"mensaje\":\"Error al Borrar\"}";
}