<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\
include_once realpath('../facade/CapacitacionesFacade.php');

    $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

       
 
            
        $semestre = strip_tags($dataObject->semestre);
        $anio = strip_tags($dataObject->anio);
        $Semillero_id = strip_tags($dataObject->semillero_id);
        $linea_id = strip_tags($dataObject->linea_id);
        $proy_id = strip_tags($dataObject->proy_id);
        $plan_accion_id = strip_tags($dataObject->plan_accion_id);
       
   
     
        
        $rpta= CapacitacionesFacade::insertCap2($semestre, $anio, $Semillero_id,$linea_id,$proy_id,$plan_accion_id);
       try {
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "{\"mensaje\":\"Error al registrar \"}";
}