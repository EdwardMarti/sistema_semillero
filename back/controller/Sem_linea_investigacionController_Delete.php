<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\
include_once realpath('../facade/Sem_linea_investigacionFacade.php');
$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id);


      $rpta =  Sem_linea_investigacionFacade::delete_id($id);
                     try {
                    if ($rpta == 0) {
                        http_response_code(200);
                        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
                    }
                } catch (Exception $e) {
                    http_response_code(500);
                    echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
                }