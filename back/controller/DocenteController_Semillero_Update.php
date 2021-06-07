<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que Anarchy se generó a sí mismo?  \\
include_once realpath('../facade/DocenteFacade.php');
include_once realpath('../facade/PersonaFacade.php');

        
$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


//$id = strip_tags($dataObject->id);

        $id = strip_tags($dataObject->persona_Id);
        $nombre = strip_tags($dataObject->nombreD);
        $telefono = strip_tags($dataObject->telefonoD);
        $correo = strip_tags($dataObject->correoD);
       
        PersonaFacade::update2($id, $nombre, $telefono, $correo);
      
        $Persona_id = $id;
        $tipo_vinculacion = strip_tags($dataObject->tp_vinculacion);
        $ubicacion = strip_tags($dataObject->ubicacionD);
      $rpta=  DocenteFacade::update2( $Persona_id, $tipo_vinculacion, $ubicacion);
   try {
                    if ($rpta > 0) {
                        http_response_code(200);
                        echo "{\"mensaje\":\"Se ha Actualizado exitosamente\"}";
                    }
                } catch (Exception $e) {
                    http_response_code(500);
                    echo "{\"mensaje\":\"Error al Actualizar el Registro\"}";
                }