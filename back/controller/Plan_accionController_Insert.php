<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../facade/Plan_accionFacade.php');
include_once realpath('../facade/Proy_lineas_investFacade.php');


     $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$Semillero_id = strip_tags($dataObject->semillero_id);
$anio = strip_tags($dataObject->anio);
$semestre = strip_tags($dataObject->semestre);

 

$rpta1 = Plan_accionFacade::insert2($Semillero_id,$anio,$semestre);



        $id = $rpta1;
        $Proyectos_id = strip_tags($dataObject->proyectos_id);
        $Linea_investigacion_id = strip_tags($dataObject->linea_investigacion_id);
        Proy_lineas_investFacade::insert2($id, $Proyectos_id, $Linea_investigacion_id,$semestre,$anio);
   

 try {
        if ($rpta1 > 0) {
            http_response_code(200);
            echo "{
                \"id\":\"{$rpta1}\",
                \"mensaje\":\"Se ha registrado exitosamente\"
            }";
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo "{\"mensaje\":\"Error al registrar \"}";
    }

