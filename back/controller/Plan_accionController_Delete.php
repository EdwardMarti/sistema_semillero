<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../facade/Plan_accionFacade.php');
include_once realpath('../facade/Proy_lineas_investFacade.php');


     $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id);


     $rpta = Plan_accionFacade::delete($id);



 try {
                    if ($rpta == 0) {
                        http_response_code(200);
                        echo "{\"mensaje\":\"Se ha Borrado exitosamente\"}";
                    }
                } catch (Exception $e) {
                    http_response_code(500);
                    echo "{\"mensaje\":\"Error al Borrar\"}";
                }


