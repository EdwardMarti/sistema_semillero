<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Por desgracia, mi epitafio será una frase insulsa y vacía  \\
include_once realpath('../facade/ProyectosFacade.php');


class ProyectosController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $titulo = strip_tags($_POST['titulo']);
        $investigador = strip_tags($_POST['investigador']);
        $Estado_proyecto_id = strip_tags($_POST['tipo_proyecto_id']);
        $estado_proyecto= new Estado_proyecto();
        $estado_proyecto->setId($Estado_proyecto_id);
        $tiempo_ejecucion = strip_tags($_POST['tiempo_ejecucion']);
        $fecha_ini = strip_tags($_POST['fecha_ini']);
        $resumen = strip_tags($_POST['resumen']);
        $obj_general = strip_tags($_POST['obj_general']);
        $obj_esÃÂ©cifico = strip_tags($_POST['obj_esÃÂ©cifico']);
        $resultados = strip_tags($_POST['resultados']);
        $costo_valor = strip_tags($_POST['costo_valor']);
        $producto = strip_tags($_POST['producto']);
        $Semillero_id = strip_tags($_POST['semillero_id']);
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        ProyectosFacade::insert($id, $titulo, $investigador, $estado_proyecto, $tiempo_ejecucion, $fecha_ini, $resumen, $obj_general, $obj_esÃÂ©cifico, $resultados, $costo_valor, $producto, $semillero);
return true;
    }

    public static function listAll(){
        $list=ProyectosFacade::listAll();
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
	    \"obj_esÃÂ©cifico\":\"{$Proyectos->getobj_esÃÂ©cifico()}\",
	    \"resultados\":\"{$Proyectos->getresultados()}\",
	    \"costo_valor\":\"{$Proyectos->getcosto_valor()}\",
	    \"producto\":\"{$Proyectos->getproducto()}\",
	    \"semillero_id_id\":\"{$Proyectos->getsemillero_id()->getid()}\"
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