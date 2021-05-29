<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo <3 Cúcuta  \\
include_once realpath('ActividadesController.php');
include_once realpath('CapacitacionesController.php');
include_once realpath('ColaboradorController.php');
include_once realpath('DepartamentoController.php');
include_once realpath('DocenteController.php');
include_once realpath('Estado_proyectoController.php');
include_once realpath('EstudianteController.php');
include_once realpath('FacultadController.php');
include_once realpath('Fuente_financiacionController.php');
include_once realpath('Grupo_has_participanteController.php');
include_once realpath('Grupo_has_proyectoController.php');
include_once realpath('Grupo_investigacionController.php');
include_once realpath('Grupo_linea_investigacionController.php');
include_once realpath('Grupo_solicitud_horasController.php');
include_once realpath('Linea_investigacionController.php');
include_once realpath('ModulosController.php');
include_once realpath('Otras_actividadesController.php');
include_once realpath('Pares_academicosController.php');
include_once realpath('PerfilesController.php');
include_once realpath('Perfiles_has_modulosController.php');
include_once realpath('PersonaController.php');
include_once realpath('Persona_has_grupoController.php');
include_once realpath('Persona_has_semilleroController.php');
include_once realpath('Plan_accionController.php');
include_once realpath('Plan_estudiosController.php');
include_once realpath('PonenciasController.php');
include_once realpath('Proy_lineas_investController.php');
include_once realpath('ProyectosController.php');
include_once realpath('PublicacionesController.php');
include_once realpath('Sem_linea_investigacionController.php');
include_once realpath('SemilleroController.php');
include_once realpath('Solicitud_horasController.php');
include_once realpath('Tipo_docuemntoController.php');
include_once realpath('Tipo_ponenciasController.php');
include_once realpath('Tipo_proyectoController.php');
include_once realpath('Tipo_publicacionesController.php');
include_once realpath('Tipo_vinculacionController.php');
include_once realpath('TitulosController.php');
include_once realpath('UsuariosController.php');

$ruta = strip_tags($_POST['ruta']);
    	$rtn = "";
    	switch ($ruta) {
           case 'ActividadesInsert':
    			$rtn = ActividadesController::insert();
    			break;
    		case 'ActividadesList':
    			$rtn = ActividadesController::listAll();
    			break;
           case 'CapacitacionesInsert':
    			$rtn = CapacitacionesController::insert();
    			break;
    		case 'CapacitacionesList':
    			$rtn = CapacitacionesController::listAll();
    			break;
           case 'ColaboradorInsert':
    			$rtn = ColaboradorController::insert();
    			break;
    		case 'ColaboradorList':
    			$rtn = ColaboradorController::listAll();
    			break;
           case 'DepartamentoInsert':
    			$rtn = DepartamentoController::insert();
    			break;
    		case 'DepartamentoList':
    			$rtn = DepartamentoController::listAll();
    			break;
           case 'DocenteInsert':
    			$rtn = DocenteController::insert();
    			break;
    		case 'DocenteList':
    			$rtn = DocenteController::listAll();
    			break;
           case 'Estado_proyectoInsert':
    			$rtn = Estado_proyectoController::insert();
    			break;
    		case 'Estado_proyectoList':
    			$rtn = Estado_proyectoController::listAll();
    			break;
           case 'EstudianteInsert':
    			$rtn = EstudianteController::insert();
    			break;
    		case 'EstudianteList':
    			$rtn = EstudianteController::listAll();
    			break;
           case 'FacultadInsert':
    			$rtn = FacultadController::insert();
    			break;
    		case 'FacultadList':
    			$rtn = FacultadController::listAll();
    			break;
           case 'Fuente_financiacionInsert':
    			$rtn = Fuente_financiacionController::insert();
    			break;
    		case 'Fuente_financiacionList':
    			$rtn = Fuente_financiacionController::listAll();
    			break;
           case 'Grupo_has_participanteInsert':
    			$rtn = Grupo_has_participanteController::insert();
    			break;
    		case 'Grupo_has_participanteList':
    			$rtn = Grupo_has_participanteController::listAll();
    			break;
           case 'Grupo_has_proyectoInsert':
    			$rtn = Grupo_has_proyectoController::insert();
    			break;
    		case 'Grupo_has_proyectoList':
    			$rtn = Grupo_has_proyectoController::listAll();
    			break;
           case 'Grupo_investigacionInsert':
    			$rtn = Grupo_investigacionController::insert();
    			break;
    		case 'Grupo_investigacionList':
    			$rtn = Grupo_investigacionController::listAll();
    			break;
           case 'Grupo_linea_investigacionInsert':
    			$rtn = Grupo_linea_investigacionController::insert();
    			break;
    		case 'Grupo_linea_investigacionList':
    			$rtn = Grupo_linea_investigacionController::listAll();
    			break;
           case 'Grupo_solicitud_horasInsert':
    			$rtn = Grupo_solicitud_horasController::insert();
    			break;
    		case 'Grupo_solicitud_horasList':
    			$rtn = Grupo_solicitud_horasController::listAll();
    			break;
           case 'Linea_investigacionInsert':
    			$rtn = Linea_investigacionController::insert();
    			break;
    		case 'Linea_investigacionList':
    			$rtn = Linea_investigacionController::listAll();
    			break;
           case 'ModulosInsert':
    			$rtn = ModulosController::insert();
    			break;
    		case 'ModulosList':
    			$rtn = ModulosController::listAll();
    			break;
           case 'Otras_actividadesInsert':
    			$rtn = Otras_actividadesController::insert();
    			break;
    		case 'Otras_actividadesList':
    			$rtn = Otras_actividadesController::listAll();
    			break;
           case 'Pares_academicosInsert':
    			$rtn = Pares_academicosController::insert();
    			break;
    		case 'Pares_academicosList':
    			$rtn = Pares_academicosController::listAll();
    			break;
           case 'PerfilesInsert':
    			$rtn = PerfilesController::insert();
    			break;
    		case 'PerfilesList':
    			$rtn = PerfilesController::listAll();
    			break;
           case 'Perfiles_has_modulosInsert':
    			$rtn = Perfiles_has_modulosController::insert();
    			break;
    		case 'Perfiles_has_modulosList':
    			$rtn = Perfiles_has_modulosController::listAll();
    			break;
           case 'PersonaInsert':
    			$rtn = PersonaController::insert();
    			break;
    		case 'PersonaList':
    			$rtn = PersonaController::listAll();
    			break;
           case 'Persona_has_grupoInsert':
    			$rtn = Persona_has_grupoController::insert();
    			break;
    		case 'Persona_has_grupoList':
    			$rtn = Persona_has_grupoController::listAll();
    			break;
           case 'Persona_has_semilleroInsert':
    			$rtn = Persona_has_semilleroController::insert();
    			break;
    		case 'Persona_has_semilleroList':
    			$rtn = Persona_has_semilleroController::listAll();
    			break;
           case 'Plan_accionInsert':
    			$rtn = Plan_accionController::insert();
    			break;
    		case 'Plan_accionList':
    			$rtn = Plan_accionController::listAll();
    			break;
           case 'Plan_estudiosInsert':
    			$rtn = Plan_estudiosController::insert();
    			break;
    		case 'Plan_estudiosList':
    			$rtn = Plan_estudiosController::listAll();
    			break;
           case 'PonenciasInsert':
    			$rtn = PonenciasController::insert();
    			break;
    		case 'PonenciasList':
    			$rtn = PonenciasController::listAll();
    			break;
           case 'Proy_lineas_investInsert':
    			$rtn = Proy_lineas_investController::insert();
    			break;
    		case 'Proy_lineas_investList':
    			$rtn = Proy_lineas_investController::listAll();
    			break;
           case 'ProyectosInsert':
    			$rtn = ProyectosController::insert();
    			break;
    		case 'ProyectosList':
    			$rtn = ProyectosController::listAll();
    			break;
           case 'PublicacionesInsert':
    			$rtn = PublicacionesController::insert();
    			break;
    		case 'PublicacionesList':
    			$rtn = PublicacionesController::listAll();
    			break;
           case 'Sem_linea_investigacionInsert':
    			$rtn = Sem_linea_investigacionController::insert();
    			break;
    		case 'Sem_linea_investigacionList':
    			$rtn = Sem_linea_investigacionController::listAll();
    			break;
           case 'SemilleroInsert':
    			$rtn = SemilleroController::insert();
    			break;
    		case 'SemilleroList':
    			$rtn = SemilleroController::listAll();
    			break;
           case 'Solicitud_horasInsert':
    			$rtn = Solicitud_horasController::insert();
    			break;
    		case 'Solicitud_horasList':
    			$rtn = Solicitud_horasController::listAll();
    			break;
           case 'Tipo_docuemntoInsert':
    			$rtn = Tipo_docuemntoController::insert();
    			break;
    		case 'Tipo_docuemntoList':
    			$rtn = Tipo_docuemntoController::listAll();
    			break;
           case 'Tipo_ponenciasInsert':
    			$rtn = Tipo_ponenciasController::insert();
    			break;
    		case 'Tipo_ponenciasList':
    			$rtn = Tipo_ponenciasController::listAll();
    			break;
           case 'Tipo_proyectoInsert':
    			$rtn = Tipo_proyectoController::insert();
    			break;
    		case 'Tipo_proyectoList':
    			$rtn = Tipo_proyectoController::listAll();
    			break;
           case 'Tipo_publicacionesInsert':
    			$rtn = Tipo_publicacionesController::insert();
    			break;
    		case 'Tipo_publicacionesList':
    			$rtn = Tipo_publicacionesController::listAll();
    			break;
           case 'Tipo_vinculacionInsert':
    			$rtn = Tipo_vinculacionController::insert();
    			break;
    		case 'Tipo_vinculacionList':
    			$rtn = Tipo_vinculacionController::listAll();
    			break;
           case 'TitulosInsert':
    			$rtn = TitulosController::insert();
    			break;
    		case 'TitulosList':
    			$rtn = TitulosController::listAll();
    			break;
           case 'UsuariosInsert':
    			$rtn = UsuariosController::insert();
    			break;
    		case 'UsuariosList':
    			$rtn = UsuariosController::listAll();
    			break;
    		default:
    			$rtn="404 Ruta no encontrada.";
    			break;
    	}

echo $rtn;

//That`s all folks!