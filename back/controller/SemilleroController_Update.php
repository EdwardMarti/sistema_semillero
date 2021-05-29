<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../facade/SemilleroFacade.php');
//include_once realpath('../facade/PersonaFacade.php');
//include_once realpath('../facade/DocenteFacade.php');
//include_once realpath('../facade/Persona_has_semilleroFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

      
$id = strip_tags($dataObject->idSem);
$flag = strip_tags($dataObject->flag);


//var_dump($id);

if ($flag == 1) {

    $activar = "aval_dic_sem";
    $valor="1";
    $rpta = SemilleroFacade::update_Activar($id, $activar, $valor);
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    } else {
        http_response_code(500);
        echo "{\"mensaje\":\"No Se Actualizo Ninguna Informacion\"}";
    }
}
if ($flag == 2) {
    $activar = "aval_dic_grupo";
     $valor="1";
    $rpta = SemilleroFacade::update_Activar($id, $activar, $valor);
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    } else {
        http_response_code(500);
        echo "{\"mensaje\":\"No Se Actualizo Ninguna Informacion\"}";
    }
} if ($flag == 3) {
    $activar = "aval_dic_unidad";
     $valor="1";
    $rpta = SemilleroFacade::update_Activar($id, $activar, $valor);
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    } else {
        http_response_code(500);
        echo "{\"mensaje\":\"No Se Actualizo Ninguna Informacion\"}";
    }
} if ($flag == 4) {
    $activar = "aval_dic_sem";
     $valor="0";
    $rpta = SemilleroFacade::update_Activar($id, $activar, $valor);
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    } else {
        http_response_code(500);
        echo "{\"mensaje\":\"No Se Actualizo Ninguna Informacion\"}";
    }
}
 if ($flag == 5) {
    $activar = "aval_dic_grupo";
     $valor="0";
    $rpta = SemilleroFacade::update_Activar($id, $activar, $valor);
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    } else {
        http_response_code(500);
        echo "{\"mensaje\":\"No Se Actualizo Ninguna Informacion\"}";
    }
}
 if ($flag == 6) {
    $activar = "aval_dic_unidad";
     $valor="0";
    $rpta = SemilleroFacade::update_Activar($id, $activar, $valor);
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    } else {
        http_response_code(500);
        echo "{\"mensaje\":\"No Se Actualizo Ninguna Informacion\"}";
    }
}
      
  



