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


$id = strip_tags($dataObject->id);
//$id = 20;



        $rpta=ProyectosFacade::updateDelete($id);
       
 try {
                    if (($rpta > 0)) {
                        http_response_code(200);
                        echo "{\"mensaje\":\"Se ha Borrado exitosamente\"}";
                    }
                } catch (Exception $e) {
                    http_response_code(500);
                    echo "{\"mensaje\":\"Error al Borrar\"}";
                }
