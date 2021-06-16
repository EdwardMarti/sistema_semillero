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


 
        $nombre_proyecto = strip_tags($dataObject->nombre_proyectoO);
        $nombre_actividad = strip_tags($dataObject->nombre_actividadO);
        $modalidad_participacion = strip_tags($dataObject->modalidad_participacionO);
        $responsable = strip_tags($dataObject->responsableO);
        $fecha_realizacion = strip_tags($dataObject->fecha_realizacionO);
        $producto = strip_tags($dataObject->productoO);
        $Semillero_id = strip_tags($dataObject->semillero_id);
        $linea_investigacion_id = strip_tags($dataObject->linea_investigacion_id);
        $proyectos_id = strip_tags($dataObject->proyectos_id);
        $plan_accion_id = strip_tags($dataObject->plan_accion_id);
       
       

             try {
            $rta = Otras_actividadesFacade::insert2( $nombre_proyecto, $nombre_actividad, $modalidad_participacion, $responsable, $fecha_realizacion, $producto, $Semillero_id,$linea_investigacion_id,$proyectos_id,$plan_accion_id);
            if ($rta > 0) {
                http_response_code(200);
                echo "{\"mensaje\":\"Exito al registrar \"}";
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo "{\"mensaje\":\"Error al registrar\"}";
        }