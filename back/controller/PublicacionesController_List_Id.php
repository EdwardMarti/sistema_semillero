<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\
include_once realpath('../facade/PublicacionesFacade.php');


     $JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

   
        $id = strip_tags($dataObject->id);
//        $id = '2';
   
        $list=PublicacionesFacade::listAll_id($id);
        $rta="";
        foreach ($list as $obj => $Publicaciones) {	
	       $rta.="{
	    \"id\":\"{$Publicaciones->getid()}\",
	    \"autor\":\"{$Publicaciones->getautor()}\",
	    \"titulo\":\"{$Publicaciones->gettitulo()}\",
	    \"nombre_medio\":\"{$Publicaciones->getnombre_medio()}\",
	    \"issn\":\"{$Publicaciones->getissn()}\",
	    \"editorial\":\"{$Publicaciones->geteditorial()}\",
	    \"volumen\":\"{$Publicaciones->getvolumen()}\",
	    \"cant_pag\":\"{$Publicaciones->getcant_pag()}\",
	    \"fecha\":\"{$Publicaciones->getfecha()}\",
	    \"ciudad\":\"{$Publicaciones->getciudad()}\",
	    \"tipo_publicaciones_id\":\"{$Publicaciones->gettipo_publicaciones_id()->getid()}\",
	    \"semillero_id_id\":\"{$Publicaciones->getsemillero_id()->getid()}\"
	       },";
        }

      
 if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"publicaciones\":[{$rta}]}";
      } else {
        echo "{\"publicaciones\":[]}";
      }