<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\
include_once realpath('../facade/Capacitaciones_ProyectosFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id);
//$id = 5;

        $list= Capacitaciones_ProyectosFacade::listAll_idProy($id);
        $rta="";
        foreach ($list as $obj => $Capacitaciones) {	
	       $rta.="{
	    \"id\":\"{$Capacitaciones->getid()}\",
	    \"tema\":\"{$Capacitaciones->gettema()}\",
	    \"docente\":\"{$Capacitaciones->getdocente()}\",
	    \"fecha\":\"{$Capacitaciones->getfecha()}\",
	    \"cant_capacitados\":\"{$Capacitaciones->getcant_capacitados()}\",
	    \"proyecto_id\":\"{$Capacitaciones->getproyecto_id()}\",
	    \"objetivo\":\"{$Capacitaciones->getobjetivo()}\",
	    \"responsable\":\"{$Capacitaciones->getresponsable()}\"
	       },";
        }

      if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"capacitaciones\":[{$rta}]}";
      } else {
        echo "{\"capacitaciones\":[]}";
      }
