<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\
include_once realpath('../facade/Grupo_investigacionFacade.php');


class Grupo_investigacionController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre = strip_tags($_POST['nombre']);
        $sigla = strip_tags($_POST['sigla']);
        $unidad_academica = strip_tags($_POST['unidad_academica']);
        $fecha_creacion = strip_tags($_POST['fecha_creacion']);
        $fecha_gruplac = strip_tags($_POST['fecha_gruplac']);
        $codigo_gruplac = strip_tags($_POST['codigo_gruplac']);
        $clas_colciencias = strip_tags($_POST['clas_colciencias']);
        $cate_colciencias = strip_tags($_POST['cate_colciencias']);
        Grupo_investigacionFacade::insert($id, $nombre, $sigla, $unidad_academica, $fecha_creacion, $fecha_gruplac, $codigo_gruplac, $clas_colciencias, $cate_colciencias);
return true;
    }

    public static function listAll(){
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