<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\
include_once realpath('../facade/Tipo_publicacionesFacade.php');


        $id="2";
        $descripcion = "Poncho";
        Tipo_publicacionesFacade::update($id, $descripcion);
        echo true;
  
