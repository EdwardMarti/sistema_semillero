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

//
        $plan = strip_tags($dataObject->plan);
        $linea = strip_tags($dataObject->linea);
        $proyecto = strip_tags($dataObject->proyecto);
        $semillero = strip_tags($dataObject->semillero);
        
        
////        25', '7', '5', '2'
//        $plan = '25';
//        $linea = '7';
//        $proyecto = '5';
//        $semillero = '2';
        
        $list=CapacitacionesFacade::listAll_id_SemilleroPlan($plan,$linea,$proyecto,$semillero);
        $rta="";
        foreach ($list as $obj => $Capacitaciones) {	
	       $rta.="{
	    \"id\":\"{$Capacitaciones->getid()}\",
	    \"tema\":\"{$Capacitaciones->gettema()}\",
	    \"docente\":\"{$Capacitaciones->getdocente()}\",
	    \"fecha\":\"{$Capacitaciones->getfecha()}\",
	    \"cant_capacitados\":\"{$Capacitaciones->getcant_capacitados()}\",
	    \"semillero_id_id\":\"{$Capacitaciones->getsemillero_id()->getid()}\",
	    \"objetivo\":\"{$Capacitaciones->getobjetivo()}\"
	       },";
        }

   if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"capacitaciones2\":[{$rta}]}";
      } else {
        echo "{\"capacitaciones2\":[]}";
      }
