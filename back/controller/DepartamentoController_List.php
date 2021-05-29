<?php

include_once realpath('../facade/DepartamentoFacade.php');


        $list=DepartamentoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Departamento) {	
	       $rta.="{
	    \"id\":\"{$Departamento->getid()}\",
	    \"descripcion\":\"{$Departamento->getdescripcion()}\",
	    \"facultad\":\"{$Departamento->getfacultad_id()->getid()}\"
	       },";
        }

    if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"departamento\":[{$rta}]}";
      } else {
        echo "{\"departamento\":[]}";
      }

