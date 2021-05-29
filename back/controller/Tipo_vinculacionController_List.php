<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo.   \\
include_once realpath('../facade/Tipo_vinculacionFacade.php');



        $list=Tipo_vinculacionFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Tipo_vinculacion) {	
	       $rta.="{
	    \"id\":\"{$Tipo_vinculacion->getid()}\",
	    \"descripcion\":\"{$Tipo_vinculacion->getdescripcion()}\"
	       },";
        }
if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"tp_vinculacion\":[{$rta}]}";
      } else {
        echo "{\"tp_vinculacion\":[]}";
      }
