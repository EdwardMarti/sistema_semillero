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

      

        $id = strip_tags($dataObject->id);
        $codigo = strip_tags($dataObject->codigo);
        $nombre = strip_tags($dataObject->nombre);
        $proyecto_id = strip_tags($dataObject->proyecto_id);
      
        $rpta=Estudiante_proyectoFacade::update($id, $codigo, $nombre, $proyecto_id);

         try {
                        if ($rpta > 0) {
                            http_response_code(200);
                            echo "{\"mensaje\":\"Se ha Actualizado exitosamente\"}";
                        }
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo "{\"mensaje\":\"Error al registrar \"}";
                    }