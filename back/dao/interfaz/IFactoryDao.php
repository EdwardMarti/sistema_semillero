<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    A vote for Bart is a vote for Anarchy!  \\

include_once realpath('../dao/entities/ActividadesDao.php');
include_once realpath('../dao/entities/CapacitacionesDao.php');
include_once realpath('../dao/entities/Capacitaciones_ProyectosDao.php');
include_once realpath('../dao/entities/ColaboradorDao.php');
include_once realpath('../dao/entities/DepartamentoDao.php');
include_once realpath('../dao/entities/DocenteDao.php');
include_once realpath('../dao/entities/Datos_adicionalesSDao.php');
include_once realpath('../dao/entities/Estado_proyectoDao.php');
include_once realpath('../dao/entities/EstudianteDao.php');
include_once realpath('../dao/entities/Estudiante_proyectoDao.php');
include_once realpath('../dao/entities/FacultadDao.php');
include_once realpath('../dao/entities/CumplimientoDao.php');
include_once realpath('../dao/entities/Fuente_financiacionDao.php');
include_once realpath('../dao/entities/Grupo_has_participanteDao.php');
include_once realpath('../dao/entities/Grupo_has_proyectoDao.php');
include_once realpath('../dao/entities/Grupo_investigacionDao.php');
include_once realpath('../dao/entities/Grupo_linea_investigacionDao.php');
include_once realpath('../dao/entities/Grupo_solicitud_horasDao.php');
include_once realpath('../dao/entities/Linea_investigacionDao.php');
include_once realpath('../dao/entities/ModulosDao.php');
include_once realpath('../dao/entities/Otras_actividadesDao.php');
include_once realpath('../dao/entities/Pares_academicosDao.php');
include_once realpath('../dao/entities/PerfilesDao.php');
include_once realpath('../dao/entities/Perfiles_has_modulosDao.php');
include_once realpath('../dao/entities/PersonaDao.php');
include_once realpath('../dao/entities/Persona_has_grupoDao.php');
include_once realpath('../dao/entities/Persona_has_semilleroDao.php');
include_once realpath('../dao/entities/Plan_accionDao.php');
include_once realpath('../dao/entities/Plan_estudiosDao.php');
include_once realpath('../dao/entities/PonenciasDao.php');
include_once realpath('../dao/entities/Proy_lineas_investDao.php');
include_once realpath('../dao/entities/ProyectosDao.php');
include_once realpath('../dao/entities/PublicacionesDao.php');
include_once realpath('../dao/entities/Sem_linea_investigacionDao.php');
include_once realpath('../dao/entities/SemilleroDao.php');
include_once realpath('../dao/entities/Solicitud_horasDao.php');
include_once realpath('../dao/entities/Tipo_docuemntoDao.php');
include_once realpath('../dao/entities/Tipo_ponenciasDao.php');
include_once realpath('../dao/entities/Tipo_proyectoDao.php');
include_once realpath('../dao/entities/Tipo_publicacionesDao.php');
include_once realpath('../dao/entities/Tipo_vinculacionDao.php');
include_once realpath('../dao/entities/TitulosDao.php');
include_once realpath('../dao/entities/UsuariosDao.php');
include_once realpath('../dao/entities/AreaDao.php');
include_once realpath('../dao/entities/DisciplinaDao.php');


interface IFactoryDao {
      /**
     * Devuelve una instancia de AreaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AreaDao
     */
    public function getAreaDao($dbName);
     /**
     * Devuelve una instancia de DisciplinaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DisciplinaDao
     */
    public function getDisciplinaDao($dbName);
	
     /**
     * Devuelve una instancia de ActividadesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ActividadesDao
     */
     public function getActividadesDao($dbName);
     

     /**
     * Devuelve una instancia de CapacitacionesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CapacitacionesDao
     */
     public function getCapacitacionesDao($dbName);
     
     public function getCapacitaciones_ProyectosDao($dbName);
     
     
     
     public function getDatos_adicionalesSDao($dbName);
     /**
     * Devuelve una instancia de ColaboradorDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ColaboradorDao
     */
     public function getColaboradorDao($dbName);
     /**
     * Devuelve una instancia de DepartamentoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DepartamentoDao
     */
     public function getDepartamentoDao($dbName);
     /**
     * Devuelve una instancia de DocenteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DocenteDao
     */
     public function getDocenteDao($dbName);
     /**
     * Devuelve una instancia de DocenteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DocenteDao
     */
     public function getCumplimientoDao($dbName);
     /**
     * Devuelve una instancia de Estado_proyectoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Estado_proyectoDao
     */
     public function getEstado_proyectoDao($dbName);
     /**
     * Devuelve una instancia de EstudianteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EstudianteDao
     */
     public function getEstudianteDao($dbName);
     
     public function getEstudiante_proyectoDao($dbName);
     /**
     * Devuelve una instancia de FacultadDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FacultadDao
     */
     public function getFacultadDao($dbName);
     /**
     * Devuelve una instancia de Fuente_financiacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Fuente_financiacionDao
     */
     public function getFuente_financiacionDao($dbName);
     /**
     * Devuelve una instancia de Grupo_has_participanteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_has_participanteDao
     */
     public function getGrupo_has_participanteDao($dbName);
     /**
     * Devuelve una instancia de Grupo_has_proyectoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_has_proyectoDao
     */
     public function getGrupo_has_proyectoDao($dbName);
     /**
     * Devuelve una instancia de Grupo_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_investigacionDao
     */
     public function getGrupo_investigacionDao($dbName);
     /**
     * Devuelve una instancia de Grupo_linea_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_linea_investigacionDao
     */
     public function getGrupo_linea_investigacionDao($dbName);
     /**
     * Devuelve una instancia de Grupo_solicitud_horasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_solicitud_horasDao
     */
     public function getGrupo_solicitud_horasDao($dbName);
     /**
     * Devuelve una instancia de Linea_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Linea_investigacionDao
     */
     public function getLinea_investigacionDao($dbName);
     /**
     * Devuelve una instancia de ModulosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ModulosDao
     */
     public function getModulosDao($dbName);
     /**
     * Devuelve una instancia de Otras_actividadesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Otras_actividadesDao
     */
     public function getOtras_actividadesDao($dbName);
     /**
     * Devuelve una instancia de Pares_academicosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Pares_academicosDao
     */
     public function getPares_academicosDao($dbName);
     /**
     * Devuelve una instancia de PerfilesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PerfilesDao
     */
     public function getPerfilesDao($dbName);
     /**
     * Devuelve una instancia de Perfiles_has_modulosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Perfiles_has_modulosDao
     */
     public function getPerfiles_has_modulosDao($dbName);
     /**
     * Devuelve una instancia de PersonaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PersonaDao
     */
     public function getPersonaDao($dbName);
     /**
     * Devuelve una instancia de Persona_has_grupoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Persona_has_grupoDao
     */
     public function getPersona_has_grupoDao($dbName);
     /**
     * Devuelve una instancia de Persona_has_semilleroDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Persona_has_semilleroDao
     */
     public function getPersona_has_semilleroDao($dbName);
     /**
     * Devuelve una instancia de Plan_accionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Plan_accionDao
     */
     public function getPlan_accionDao($dbName);
     /**
     * Devuelve una instancia de Plan_estudiosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Plan_estudiosDao
     */
     public function getPlan_estudiosDao($dbName);
     /**
     * Devuelve una instancia de PonenciasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PonenciasDao
     */
     public function getPonenciasDao($dbName);
     /**
     * Devuelve una instancia de Proy_lineas_investDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Proy_lineas_investDao
     */
     public function getProy_lineas_investDao($dbName);
     /**
     * Devuelve una instancia de ProyectosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProyectosDao
     */
     public function getProyectosDao($dbName);
     /**
     * Devuelve una instancia de PublicacionesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PublicacionesDao
     */
     public function getPublicacionesDao($dbName);
     /**
     * Devuelve una instancia de Sem_linea_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Sem_linea_investigacionDao
     */
     public function getSem_linea_investigacionDao($dbName);
     /**
     * Devuelve una instancia de SemilleroDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de SemilleroDao
     */
     public function getSemilleroDao($dbName);
     /**
     * Devuelve una instancia de Solicitud_horasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Solicitud_horasDao
     */
     public function getSolicitud_horasDao($dbName);
     /**
     * Devuelve una instancia de Tipo_docuemntoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_docuemntoDao
     */
     public function getTipo_docuemntoDao($dbName);
     /**
     * Devuelve una instancia de Tipo_ponenciasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_ponenciasDao
     */
     public function getTipo_ponenciasDao($dbName);
     /**
     * Devuelve una instancia de Tipo_proyectoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_proyectoDao
     */
     public function getTipo_proyectoDao($dbName);
     /**
     * Devuelve una instancia de Tipo_publicacionesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_publicacionesDao
     */
     public function getTipo_publicacionesDao($dbName);
     /**
     * Devuelve una instancia de Tipo_vinculacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_vinculacionDao
     */
     public function getTipo_vinculacionDao($dbName);
     /**
     * Devuelve una instancia de TitulosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de TitulosDao
     */
     public function getTitulosDao($dbName);
     /**
     * Devuelve una instancia de UsuariosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuariosDao
     */
     public function getUsuariosDao($dbName);

}
//That`s all folks!