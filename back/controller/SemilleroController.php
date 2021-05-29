<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../facade/SemilleroFacade.php');


class SemilleroController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre = strip_tags($_POST['nombre']);
        $sigla = strip_tags($_POST['sigla']);
        $fecha_creacion = strip_tags($_POST['fecha_creacion']);
        $aval_dic_grupo = strip_tags($_POST['aval_dic_grupo']);
        $aval_dic_sem = strip_tags($_POST['aval_dic_sem']);
        $aval_dic_unidad = strip_tags($_POST['aval_dic_unidad']);
        $Grupo_investigacion_id = strip_tags($_POST['grupo_investigacion_id']);
        $grupo_investigacion= new Grupo_investigacion();
        $grupo_investigacion->setId($Grupo_investigacion_id);
        $unidad_academica = strip_tags($_POST['unidad_academica']);
        SemilleroFacade::insert($id, $nombre, $sigla, $fecha_creacion, $aval_dic_grupo, $aval_dic_sem, $aval_dic_unidad, $grupo_investigacion, $unidad_academica);
return true;
    }

    public static function listAll(){
        $list=SemilleroFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Semillero) {	
	       $rta.="{
	    \"id\":\"{$Semillero->getid()}\",
	    \"nombre\":\"{$Semillero->getnombre()}\",
	    \"sigla\":\"{$Semillero->getsigla()}\",
	    \"fecha_creacion\":\"{$Semillero->getfecha_creacion()}\",
	    \"aval_dic_grupo\":\"{$Semillero->getaval_dic_grupo()}\",
	    \"aval_dic_sem\":\"{$Semillero->getaval_dic_sem()}\",
	    \"aval_dic_unidad\":\"{$Semillero->getaval_dic_unidad()}\",
	    \"grupo_investigacion_id_id\":\"{$Semillero->getgrupo_investigacion_id()->getid()}\",
	    \"unidad_academica\":\"{$Semillero->getunidad_academica()}\"
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