<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tu alma nos pertenece... Salve Mr. Arciniegas  \\
include_once realpath('../facade/AreaFacade.php');



   
        $list = AreaFacade::listAll();
$rta = "";
foreach ($list as $obj => $Area) {
    $rta .= "{
	    \"id\":\"{$Area->getid()}\",
	    \"descripcion\":\"{$Area->getdescripcion()}\"
	       },";
}
if ($rta != "") {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{\"areaS\":[{$rta}]}";
} else {
    echo "{\"areaS\":[]}";
}


