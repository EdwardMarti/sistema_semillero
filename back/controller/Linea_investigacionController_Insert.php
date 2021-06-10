<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Les traigo amor  \\
include_once realpath('../facade/Linea_investigacionFacade.php');



        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $lider = strip_tags($_POST['lider']);
        $Disciplina_id = strip_tags($_POST['disciplina_id']);
        $disciplina= new Disciplina();
        $disciplina->setId($Disciplina_id);
        Linea_investigacionFacade::insert($id, $descripcion, $lider, $disciplina);

         try {
            $rta = FacultadFacade::insert($titulo);
            if ($rta > 0) {
                http_response_code(200);
                echo "{\"mensaje\":\"Exito al registrar \"}";
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo "{\"mensaje\":\"Error al registrar\"}";
        }