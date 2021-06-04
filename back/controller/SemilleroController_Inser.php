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

      
        $nombre = strip_tags($dataObject->nombre);
        $sigla = strip_tags($dataObject->sigla);
        $fecha_creacion = strip_tags($dataObject->fecha);
        $Grupo_investigacion_id = strip_tags($dataObject->grupo_investigacion);
        $grupo_investigacion= new Grupo_investigacion();
        $grupo_investigacion->setId($Grupo_investigacion_id);
        $departamento = strip_tags($dataObject->departamentos);
        $facultad = strip_tags($dataObject->facultades);
        $plan_estudios = strip_tags($dataObject->p_estudio);
       $rptaS= SemilleroFacade::insert_S( $nombre, $sigla, $fecha_creacion, $facultad, $plan_estudios, $grupo_investigacion, $departamento);


             try {
                        if ($rpta > 0) {
                            http_response_code(200);
                            echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
                        }
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
                    }    
            
           
     




function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}