<?php

include_once realpath('../facade/Datos_adicionaleSSFacade.php');

    $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

        $dataadd_producto = strip_tags($dataObject->dataadd_producto);
        $dataadd_descripcion = strip_tags($dataObject->dataadd_descripcion);
        $dataadd_responsable = strip_tags($dataObject->dataadd_responsable);        
        $dataadd_codigo = strip_tags($dataObject->dataadd_codigo);
        $dataadd_fecha = strip_tags($dataObject->dataadd_fecha);
        $Semillero_id = strip_tags($dataObject->semillero_id);
        $calificacion ='';
        $id_plan = '' ;
        $rpta= Datos_adicionalesSSFacade::insert($dataadd_producto, $dataadd_descripcion,$dataadd_fecha,$dataadd_responsable,$calificacion, $id_plan, $Semillero_id);
       try {
    if ($rpta > 0) {
        http_response_code(200);
        echo "{\"mensaje\":\"Se ha registrado exitosamente\"}";
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "{\"mensaje\":\"Error al registrar \"}";
}