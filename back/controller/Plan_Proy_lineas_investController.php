<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Has encontrado la frase #1024 ¡Felicidades! Ahora tu proyecto funcionará a la primera  \\
include_once realpath('../facade/Proy_lineas_investFacade.php');



  
        $id = strip_tags($dataObject->id);
        $Proyectos_id = strip_tags($dataObject->proyectos_id);
        $proyectos= new Proyectos();
        $proyectos->setId($Proyectos_id);
        $Linea_investigacion_id = strip_tags($dataObject->linea_investigacion_id);
        $linea_investigacion= new Linea_investigacion();
        $linea_investigacion->setId($Linea_investigacion_id);
        Proy_lineas_investFacade::insert($id, $proyectos, $linea_investigacion);
  