<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\
include_once realpath('../facade/Linea_investigacionFacade.php');



        $list=Linea_investigacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Linea_investigacion) {	
	       $rta.="{
	    \"id\":\"{$Linea_investigacion->getid()}\",
	    \"descripcion\":\"{$Linea_investigacion->getdescripcion()}\",
	    \"lider\":\"{$Linea_investigacion->getlider()}\"
	       },";
        }
   if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"li_inv\":[{$rta}]}";
      } else {
        echo "{\"li_inv\":[]}";
      }