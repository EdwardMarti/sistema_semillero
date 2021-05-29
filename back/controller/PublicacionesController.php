<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\
include_once realpath('../facade/PublicacionesFacade.php');


class PublicacionesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $autor = strip_tags($_POST['autor']);
        $titulo = strip_tags($_POST['titulo']);
        $nombre_medio = strip_tags($_POST['nombre_medio']);
        $issn = strip_tags($_POST['issn']);
        $editorial = strip_tags($_POST['editorial']);
        $volumen = strip_tags($_POST['volumen']);
        $cant_pag = strip_tags($_POST['cant_pag']);
        $fecha = strip_tags($_POST['fecha']);
        $ciudad = strip_tags($_POST['ciudad']);
        $Tipo_publicaciones_id = strip_tags($_POST['tipo_publicaciones_id']);
        $tipo_publicaciones= new Tipo_publicaciones();
        $tipo_publicaciones->setId($Tipo_publicaciones_id);
        $Semillero_id = strip_tags($_POST['semillero_id']);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        PublicacionesFacade::insert($id, $autor, $titulo, $nombre_medio, $issn, $editorial, $volumen, $cant_pag, $fecha, $ciudad, $tipo_publicaciones, $semillero);
return true;
    }

    public static function listAll(){
        $list=PublicacionesFacade::listAll();
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
	    \"tipo_publicaciones_id_id\":\"{$Publicaciones->gettipo_publicaciones_id()->getid()}\",
	    \"semillero_id_id\":\"{$Publicaciones->getsemillero_id()->getid()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        return "[{$msg},{$rta}]";
    }

}
//That`s all folks!