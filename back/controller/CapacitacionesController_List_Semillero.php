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
        
        $list=CapacitacionesFacade::listAll_id_Semillero($id);
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
        echo "{\"capacitaciones\":[{$rta}]}";
      } else {
        echo "{\"capacitaciones\":[]}";
      }
