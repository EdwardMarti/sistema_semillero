<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Me han encontrado! ¡No sé cómo pero me han encontrado!  \\
include_once realpath('../facade/CumplimientoFacade.php');


class CumplimientoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $dirigido_id = strip_tags($_POST['dirigido_id']);
        $descripcion = strip_tags($_POST['descripcion']);
        $porcentaje = strip_tags($_POST['porcentaje']);
        $semestre = strip_tags($_POST['semestre']);
        $ano = strip_tags($_POST['ano']);
        $productos = strip_tags($_POST['productos']);
        $acepta_uno = strip_tags($_POST['acepta_uno']);
       
        
        $acepta_dos = strip_tags($_POST['acepta_dos']);
        
        
        CumplimientoFacade::insert($id, $dirigido_id, $descripcion, $porcentaje, $semestre, $ano, $productos, $acepta_uno, $acepta_dos);
return true;
    }

    public static function listAll(){
        $list=CumplimientoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Cumplimiento) {	
	       $rta.="{
	    \"id\":\"{$Cumplimiento}\",
	    \"dirigido_id\":\"{$Cumplimiento->getdirigido_id()}\",
	    \"descripcion\":\"{$Cumplimiento->getdescripcion()}\",
	    \"porcentaje\":\"{$Cumplimiento->getporcentaje()}\",
	    \"semestre\":\"{$Cumplimiento->getsemestre()}\",
	    \"ano\":\"{$Cumplimiento->getano()}\",
	    \"productos\":\"{$Cumplimiento->getproductos()}\",
	    \"acepta_uno_id\":\"{$Cumplimiento->getacepta_uno()}\",
	    \"acepta_dos_id\":\"{$Cumplimiento->getacepta_dos()}\"
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