<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Por desgracia, mi epitafio será una frase insulsa y vacía  \\
include_once realpath('../facade/ProyectosFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$id = strip_tags($dataObject->id);
//$id = 20;



        $list=ProyectosFacade::listAll_id($id);
        $rta="";
        foreach ($list as $obj => $Proyectos) {	
	       $rta.="{
	    \"id\":\"{$Proyectos->getid()}\",
	    \"titulo\":\"{$Proyectos->gettitulo()}\",
	    \"investigador\":\"{$Proyectos->getinvestigador()}\",
	    \"tipo_proyecto_id_id\":\"{$Proyectos->gettipo_proyecto_id()->getid()}\",
	    \"tiempo_ejecucion\":\"{$Proyectos->gettiempo_ejecucion()}\",
	    \"fecha_ini\":\"{$Proyectos->getfecha_ini()}\",
	    \"resumen\":\"{$Proyectos->getresumen()}\",
	    \"obj_general\":\"{$Proyectos->getobj_general()}\",
	    \"obj_especifico\":\"{$Proyectos->getobj_especifico()}\",
	    \"resultados\":\"{$Proyectos->getresultados()}\",
	    \"costo_valor\":\"{$Proyectos->getcosto_valor()}\",
	    \"producto\":\"{$Proyectos->getproducto()}\",
	    \"semillero_id_id\":\"{$Proyectos->getsemillero_id()->getid()}\"
	       },";
        }

if ($rta != "" ) {
    $rta = substr($rta, 0, -1);
    http_response_code(200);
    echo "{ \"projectos\":[{$rta}] }";
 } else {
    echo "{\"projectos\":[]}";
 }