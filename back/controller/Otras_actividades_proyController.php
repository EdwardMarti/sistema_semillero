<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Te veeeeeooooo  \\
include_once realpath('../facade/Otras_actividadesFacade.php');


class Otras_actividadesController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre_proyecto = strip_tags($_POST['nombre_proyecto']);
        $nombre_actividad = strip_tags($_POST['nombre_actividad']);
        $modalidad_participacion = strip_tags($_POST['modalidad_participacion']);
        $responsable = strip_tags($_POST['responsable']);
        $fecha_realizacion = strip_tags($_POST['fecha_realizacion']);
        $producto = strip_tags($_POST['producto']);
        $Semillero_id = strip_tags($_POST['semillero_id']);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        Otras_actividadesFacade::insert($id, $nombre_proyecto, $nombre_actividad, $modalidad_participacion, $responsable, $fecha_realizacion, $producto, $semillero);
return true;
    }

    public static function listAll(){
        $list=Otras_actividadesFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Otras_actividades) {	
	       $rta.="{
	    \"id\":\"{$Otras_actividades->getid()}\",
	    \"nombre_proyecto\":\"{$Otras_actividades->getnombre_proyecto()}\",
	    \"nombre_actividad\":\"{$Otras_actividades->getnombre_actividad()}\",
	    \"modalidad_participacion\":\"{$Otras_actividades->getmodalidad_participacion()}\",
	    \"responsable\":\"{$Otras_actividades->getresponsable()}\",
	    \"fecha_realizacion\":\"{$Otras_actividades->getfecha_realizacion()}\",
	    \"producto\":\"{$Otras_actividades->getproducto()}\",
	    \"semillero_id_id\":\"{$Otras_actividades->getsemillero_id()->getid()}\"
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