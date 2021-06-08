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


        $id = strip_tags($dataObject->id);
        $tema = strip_tags($dataObject->tema);
        $docente = strip_tags($dataObject->docente);
        $fecha = strip_tags($dataObject->fecha);
        $cant_capacitados = strip_tags($dataObject->cant_capacitados);
        $Semillero_id = strip_tags($dataObject->semillero_id);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
       
        CapacitacionesFacade::update2($id, $tema, $docente, $fecha, $cant_capacitados, $semillero_id);
