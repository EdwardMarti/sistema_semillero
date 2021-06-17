<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\
include_once realpath('../facade/Otras_actividadesFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$id = strip_tags($dataObject->id);


        $rta=Otras_actividadesFacade::delete($id);
      

      if ($rta == "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"OtrasCap\":[{$rta}]}";
      } else {
        echo "{\"OtrasCap\":[]}";
      }