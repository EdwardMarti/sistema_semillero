<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Me han encontrado! ¡No sé cómo pero me han encontrado!  \\
include_once realpath('../facade/PonenciasFacade.php');


     $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

        $nombre_po = strip_tags($dataObject->nombre_po);
        $fecha = strip_tags($dataObject->fecha);
        $nombre_eve = strip_tags($dataObject->nombre_eve);
        $institucion = strip_tags($dataObject->institucion);
        $ciudad = strip_tags($dataObject->ciudad);
        $lugar = strip_tags($dataObject->lugar);
        $Tipo_ponencias_id = strip_tags($dataObject->tipo_ponencias_id);
        $Semillero_id = strip_tags($dataObject->semillero_id);
       
     $rpta =  PonenciasFacade::insert2( $nombre_po, $fecha, $nombre_eve, $institucion, $ciudad, $lugar, $Tipo_ponencias_id, $Semillero_id);
   try {
                        if ($rpta > 0) {
                            http_response_code(200);
                            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
                        }
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo "{\"mensaje\":\"Error al registrar \"}";
                    }