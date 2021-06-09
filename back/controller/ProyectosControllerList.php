<?php
include_once realpath('../facade/ProyectosFacade.php');
include_once realpath('../facade/SemilleroFacade.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


$docente = strip_tags($dataObject->docente_id);
$list = SemilleroFacade::listAll_docente($docente);
$rta_semi="";
$semillero_copy = $list[0];

foreach ($list as $obj => $Semillero) {	
   $rta_semi.="{
      \"id\":\"{$Semillero->getid()}\",
      \"nombre\":\"{$Semillero->getnombre()}\",
      \"sigla\":\"{$Semillero->getsigla()}\",
      \"fecha_creacion\":\"{$Semillero->getfecha_creacion()}\",
      \"grupo_investigacion_id_id\":\"{$Semillero->getgrupo_investigacion_id()->getid()}\",
      \"departamento\":\"{$Semillero->getunidad_academica()}\",
      \"facultad\":\"{$Semillero->getFacultad()}\",
      \"plan_estudio\":\"{$Semillero->getPlan_estudio()}\"
   }";
}
$id = strip_tags($semillero_copy->getid());
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