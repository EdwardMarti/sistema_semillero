<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\
include_once realpath('../facade/Estudiante_proyectoFacade.php');

  $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

      

        $codigo = strip_tags($dataObject->codigo);
        $nombre = strip_tags($dataObject->nombre);
        $proyecto_id = strip_tags($dataObject->proyecto_id);
      
        Estudiante_proyectoFacade::insert( $codigo, $nombre, $proyecto_id);

         try {
                        if ($rpta > 0) {
                            http_response_code(200);
                            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
                        }
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo "{\"mensaje\":\"Error al registrar \"}";
                    }