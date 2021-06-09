<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\
include_once realpath('../facade/PublicacionesFacade.php');

     $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

   
//        $id = strip_tags($dataObject->id);
        $autor = strip_tags($dataObject->autor);
        $titulo = strip_tags($dataObject->titulo);
        $nombre_medio = strip_tags($dataObject->nombre_medio);
        $issn = strip_tags($dataObject->issn);
        $editorial = strip_tags($dataObject->editorial);
        $volumen = strip_tags($dataObject->volumen);
        $cant_pag = strip_tags($dataObject->cant_pag);
        $fecha = strip_tags($dataObject->fecha);
        $ciudad = strip_tags($dataObject->ciudad);
        $Tipo_publicaciones_id = strip_tags($dataObject->tipo_publicaciones_id);
        $tipo_publicaciones= new Tipo_publicaciones();
        $tipo_publicaciones->setId($Tipo_publicaciones_id);
        $Semillero_id = strip_tags($dataObject->semillero_id);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        $rpta=PublicacionesFacade::insert( $autor, $titulo, $nombre_medio, $issn, $editorial, $volumen, $cant_pag, $fecha, $ciudad, $tipo_publicaciones, $semillero);
        
         try {
                        if ($rpta > 0) {
                            http_response_code(200);
                            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
                        }
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo "{\"mensaje\":\"Error al registrar \"}";
                    }
