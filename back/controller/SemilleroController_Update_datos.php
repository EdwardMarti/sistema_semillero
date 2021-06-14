<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../facade/SemilleroFacade.php');
include_once realpath('../facade/PersonaFacade.php');
include_once realpath('../facade/DocenteFacade.php');
include_once realpath('../facade/Persona_has_semilleroFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

      
        $id = strip_tags($dataObject->id);
        $nombre = strip_tags($dataObject->nombre);
        $sigla = strip_tags($dataObject->sigla);
        $fecha_creacion = strip_tags($dataObject->fecha);
        $Grupo_investigacion_id = strip_tags($dataObject->grupo_investigacion);
        $departamento = strip_tags($dataObject->departamentos);
        $facultad = strip_tags($dataObject->facultades);
        $plan_estudios = strip_tags($dataObject->p_estudio);
        $ubicacion = strip_tags($dataObject->ubicacion);
      
       
      
       
             try {
    $rptaS = SemilleroFacade::update_Data($id, $nombre, $sigla, $fecha_creacion, $Grupo_investigacion_id, $departamento, $facultad, $plan_estudios, $ubicacion );
    if ($rptaS > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha Actualizado exitosamente\"}";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "{\"mensaje\":\"Error No hay cambios\"}";
}
