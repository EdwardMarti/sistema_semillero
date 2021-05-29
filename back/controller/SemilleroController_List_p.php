<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../facade/SemilleroFacade.php');


 
        $list=SemilleroFacade::listAll_Pendiente();
        $rta="";
        foreach ($list as $obj => $Semillero) {	
	       $rta.="{
	    \"id\":\"{$Semillero->getid()}\",
	    \"nombre\":\"{$Semillero->getnombre()}\",
	    \"sigla\":\"{$Semillero->getsigla()}\",
	    \"fecha_creacion\":\"{$Semillero->getfecha_creacion()}\",
	    \"aval_dic_grupo\":\"{$Semillero->getaval_dic_grupo()}\",
	    \"aval_dic_sem\":\"{$Semillero->getaval_dic_sem()}\",
	    \"aval_dic_unidad\":\"{$Semillero->getaval_dic_unidad()}\",
	    \"grupo_investigacion_id\":\"{$Semillero->getgrupo_investigacion_id()->getid()}\",
	    \"unidad_academica\":\"{$Semillero->getunidad_academica()}\"
	       },";
        }

         if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"semillero_p\":[{$rta}]}";
      } else {
        echo "{\"semillero_p\":[]}";
      }