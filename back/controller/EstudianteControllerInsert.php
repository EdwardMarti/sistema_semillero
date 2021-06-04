<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nada mejor que el código hecho a mano.  \\
include_once realpath('../facade/EstudianteFacade.php');

$nombre = strip_tags($dataObject->nombreD);
$telefono = strip_tags($dataObject->telefonoD);
$correo = strip_tags($dataObject->correoD);
$Perfiles_id = "1";
$perfiles= new Perfiles();
$perfiles->setId($Perfiles_id);


$rptaP=PersonaFacade::insert( $nombre, $telefono, $correo, $perfiles);
$num_documento = strip_tags($_POST['num_documento']);
$Tipo_docuemnto_id = strip_tags($_POST['tipo_docuemnto_id']);
$tipo_docuemnto= new Tipo_docuemnto();
$tipo_docuemnto->setId($Tipo_docuemnto_id);
EstudianteFacade::insert($id, $codigo, $semestre, $programa_academico, $persona, $num_documento, $tipo_docuemnto);
return true;

   
//That`s all folks!