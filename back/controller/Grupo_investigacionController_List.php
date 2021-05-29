<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\
include_once realpath('../facade/Grupo_investigacionFacade.php');


   
        $list=Grupo_investigacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Grupo_investigacion) {	
	       $rta.="{
	    \"id\":\"{$Grupo_investigacion->getid()}\",
	    \"nombre\":\"{$Grupo_investigacion->getnombre()}\",
	    \"sigla\":\"{$Grupo_investigacion->getsigla()}\",
	    \"unidad_academica\":\"{$Grupo_investigacion->getunidad_academica()}\",
	    \"fecha_creacion\":\"{$Grupo_investigacion->getfecha_creacion()}\",
	    \"fecha_gruplac\":\"{$Grupo_investigacion->getfecha_gruplac()}\",
	    \"codigo_gruplac\":\"{$Grupo_investigacion->getcodigo_gruplac()}\",
	    \"clas_colciencias\":\"{$Grupo_investigacion->getclas_colciencias()}\",
	    \"cate_colciencias\":\"{$Grupo_investigacion->getcate_colciencias()}\"
	       },";
        }

      if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"gp_i\":[{$rta}]}";
      } else {
        echo "{\"gp_i\":[]}";
      }
