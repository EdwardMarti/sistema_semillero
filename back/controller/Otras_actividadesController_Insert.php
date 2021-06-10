<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\
include_once realpath('../facade/Otras_actividadesFacade.php');


        $id = strip_tags($_POST['id']);
        $nombre_proyecto = strip_tags($_POST['nombre_proyecto']);
        $nombre_actividad = strip_tags($_POST['nombre_actividad']);
        $modalidad_participacion = strip_tags($_POST['modalidad_participacion']);
        $responsable = strip_tags($_POST['responsable']);
        $fecha_realizacion = strip_tags($_POST['fecha_realizacion']);
        $producto = strip_tags($_POST['producto']);
        $Semillero_id = strip_tags($_POST['semillero_id']);
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