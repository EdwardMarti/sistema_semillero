<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\
include_once realpath('../facade/Linea_investigacionFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$plan = strip_tags($dataObject->plan);
//$linea = strip_tags($dataObject->linea);

        $list=Linea_investigacionFacade::listAll_id_linea_act($plan);
        $rta="";
        foreach ($list as $obj => $Linea_investigacion) {	
	       $rta.="{
	    \"id\":\"{$Linea_investigacion->getid()}\",
	    \"descripcion\":\"{$Linea_investigacion->getdescripcion()}\",
	    \"plan_id\":\"{$Linea_investigacion->getlider()}\",
             \"proy_id\":\"{$Linea_investigacion->getdisciplina_id()->getArea_id()}\",
            \"linea_id\":\"{$Linea_investigacion->getdisciplina_id()->getDescripcion()}\",
              \"titulo\":\"{$Linea_investigacion->getdisciplina_id()->getid()}\"
	    
	       },";
        }
   if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"li_inv3\":[{$rta}]}";
      } else {
        echo "{\"li_inv3\":[]}";
      }