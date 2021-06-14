<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\
include_once realpath('../facade/Otras_actividadesFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);



        $id = strip_tags($dataObject->id);
        $nombre_proyecto = strip_tags($dataObject->nombre_proyecto);
        $nombre_actividad = strip_tags($dataObject->nombre_actividad);
        $modalidad_participacion = strip_tags($dataObject->modalidad_participacion);
        $responsable = strip_tags($dataObject->responsable);
        $fecha_realizacion = strip_tags($dataObject->fecha_realizacion);
        $producto = strip_tags($dataObject->producto);
        $Semillero_id = strip_tags($dataObject->semillero_id);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
       

             try {
            $rta = Otras_actividadesFacade::insert($id, $nombre_proyecto, $nombre_actividad, $modalidad_participacion, $responsable, $fecha_realizacion, $producto, $semillero);
            if ($rta > 0) {
                http_response_code(200);
                echo "{\"mensaje\":\"Exito al registrar \"}";
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo "{\"mensaje\":\"Error al registrar\"}";
        }