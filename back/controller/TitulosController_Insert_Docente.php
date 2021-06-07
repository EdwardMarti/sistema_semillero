<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\
include_once realpath('../facade/TitulosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

        
        $descripcion = strip_tags($dataObject->descripcionD);
        $universidad_id = strip_tags($dataObject->universidad);
        $Docente_id = strip_tags($dataObject->id_docente);
        $docente= new Docente();
        $docente->setId($Docente_id);
       $rpta= TitulosFacade::insert($descripcion, $universidad_id, $docente);
         try {
                        if ($rpta > 0) {
                            http_response_code(200);
                            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
                        }
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo "{\"mensaje\":\"Error al registrar \"}";
                    }

  

