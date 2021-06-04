<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Oh gloria de las glorias, oh divino testamento de la eterna majestad de la creación de dios  \\
include_once realpath('../facade/DisciplinaFacade.php');


class DisciplinaController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $Area_id = strip_tags($_POST['area_id']);
        $area= new Area();
        $area->setId($Area_id);
        DisciplinaFacade::insert($id, $descripcion, $area);
return true;
    }

    public static function listAll(){
        $list=DisciplinaFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Disciplina) {	
	       $rta.="{
	    \"id\":\"{$Disciplina->getid()}\",
	    \"descripcion\":\"{$Disciplina->getdescripcion()}\",
	    \"area_id_id\":\"{$Disciplina->getarea_id()->getid()}\"
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