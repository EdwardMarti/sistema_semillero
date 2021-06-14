<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Has encontrado la frase #1024 ¡Felicidades! Ahora tu proyecto funcionará a la primera  \\
include_once realpath('../facade/Proy_lineas_investFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id);
//$id = '7';

        $list=Proy_lineas_investFacade::listAll_Linea($id);
        $rta="";
        foreach ($list as $obj => $Proy_lineas_invest) {	
	       $rta.="{  
	    \"id\":\"{$Proy_lineas_invest->getid()}\",
	    \"proyectos_id\":\"{$Proy_lineas_invest->getproyectos_id()->getid()}\",
	    \"titulo\":\"{$Proy_lineas_invest->getproyectos_id()->getTitulo()}\",
	    \"objetivoG\":\"{$Proy_lineas_invest->getproyectos_id()->getObj_general()}\",
	    \"investigador\":\"{$Proy_lineas_invest->getproyectos_id()->getinvestigador()}\",
	    \"fecha_ini\":\"{$Proy_lineas_invest->getproyectos_id()->getfecha_ini()}\",
	    \"fecha_fin\":\"{$Proy_lineas_invest->getproyectos_id()->getfecha_fin()}\",
	    \"producto\":\"{$Proy_lineas_invest->getproyectos_id()->getproducto()}\",
	    \"linea_investigacion_id_id\":\"{$Proy_lineas_invest->getlinea_investigacion_id()->getid()}\"
	       },";
        }
        
      

      if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"proy_linea\":[{$rta}]}";
      } else {
        echo "{\"proy_linea\":[]}";
      }