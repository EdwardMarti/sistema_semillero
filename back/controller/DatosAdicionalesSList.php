<?php

include_once realpath('../facade/Datos_adicionaleSSFacade.php');

    $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

        $id = strip_tags($dataObject->id);


    
        $rpta= Datos_adicionalesSSFacade::listAll();
        
        
           $list=Datos_adicionaleSFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Datos_adicionaleS) {	
	       $rta.="{
	    \"id\":\"{$Datos_adicionaleS->getid()}\",
	    \"producto\":\"{$Datos_adicionaleS->getProducto()}\",
	    \"descripcion\":\"{$Datos_adicionaleS->getDescripcion()}\",
	    \"fecha\":\"{$Datos_adicionaleS->getFecha()}\",
	    \"responsable\":\"{$Datos_adicionaleS->getResponsable()}\",
	    \"aalificacion\":\"{$Datos_adicionaleS->getCalificacion()}\",
	    \"id_plan\":\"{$Datos_adicionaleS->getId_plan()}\",
	    \"id_semillero\":\"{$Datos_adicionaleS->getId_semillero()}\"
	
	       },";
        }
       if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"adicionaless\":[{$rta}]}";
      } else {
        echo "{\"adicionaless\":[]}";
      }
