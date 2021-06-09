<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nuestra empresa cuenta con una división sólo para las frases. Disfrútalas  \\

include_once realpath('../dao/conexion/Conexion.php');
include_once realpath('../dao/interfaz/IFactoryDao.php');

class FactoryDao implements IFactoryDao{
	
     private $conn;
     public static $NULL_GESTOR = -1;
    public static $MYSQL_FACTORY = 0;
    public static $POSTGRESQL_FACTORY = 1;
    public static $ORACLE_FACTORY = 2;
    public static $DERBY_FACTORY = 3;

     public function __construct($gestor){
        $this->conn=new Conexion($gestor);
     }
     /**
     * Devuelve una instancia de ActividadesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ActividadesDao
     */
     public function getActividadesDao($dbName){
        return new ActividadesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Actividades_jovenesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Actividades_jovenesDao
     */
     public function getActividades_jovenesDao($dbName){
        return new Actividades_jovenesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de AreaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AreaDao
     */
     public function getAreaDao($dbName){
        return new AreaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de CapacitacionesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CapacitacionesDao
     */
     public function getCapacitacionesDao($dbName){
        return new CapacitacionesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ColaboradorDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ColaboradorDao
     */
     public function getColaboradorDao($dbName){
        return new ColaboradorDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Compromisos_equipoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Compromisos_equipoDao
     */
     public function getCompromisos_equipoDao($dbName){
        return new Compromisos_equipoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Concepto_cumplimientoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Concepto_cumplimientoDao
     */
     public function getConcepto_cumplimientoDao($dbName){
        return new Concepto_cumplimientoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ContratoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ContratoDao
     */
     public function getContratoDao($dbName){
        return new ContratoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Cumplimiento_acompanamientoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cumplimiento_acompanamientoDao
     */
     public function getCumplimiento_acompanamientoDao($dbName){
        return new Cumplimiento_acompanamientoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Cumplimiento_cronogramaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cumplimiento_cronogramaDao
     */
     public function getCumplimiento_cronogramaDao($dbName){
        return new Cumplimiento_cronogramaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Cumplimiento_objetivosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Cumplimiento_objetivosDao
     */
     public function getCumplimiento_objetivosDao($dbName){
        return new Cumplimiento_objetivosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de DepartamentoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DepartamentoDao
     */
     public function getDepartamentoDao($dbName){
        return new DepartamentoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de DisciplinaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DisciplinaDao
     */
     public function getDisciplinaDao($dbName){
        return new DisciplinaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de DocenteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de DocenteDao
     */
     public function getDocenteDao($dbName){
        return new DocenteDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Estado_proyectoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Estado_proyectoDao
     */
     public function getEstado_proyectoDao($dbName){
        return new Estado_proyectoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de EstudianteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EstudianteDao
     */
     public function getEstudianteDao($dbName){
        return new EstudianteDao($this->conn->obtener($dbName));
    }
     public function getEstudiante_proyectoDao($dbName){
        return new Estudiante_proyectoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de FacultadDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de FacultadDao
     */
     public function getFacultadDao($dbName){
        return new FacultadDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Fuente_financiacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Fuente_financiacionDao
     */
     public function getFuente_financiacionDao($dbName){
        return new Fuente_financiacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Grupo_has_participanteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_has_participanteDao
     */
     public function getGrupo_has_participanteDao($dbName){
        return new Grupo_has_participanteDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Grupo_has_proyectoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_has_proyectoDao
     */
     public function getGrupo_has_proyectoDao($dbName){
        return new Grupo_has_proyectoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Grupo_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_investigacionDao
     */
     public function getGrupo_investigacionDao($dbName){
        return new Grupo_investigacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Grupo_linea_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_linea_investigacionDao
     */
     public function getGrupo_linea_investigacionDao($dbName){
        return new Grupo_linea_investigacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Grupo_solicitud_horasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Grupo_solicitud_horasDao
     */
     public function getGrupo_solicitud_horasDao($dbName){
        return new Grupo_solicitud_horasDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Impactos_socialesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Impactos_socialesDao
     */
     public function getImpactos_socialesDao($dbName){
        return new Impactos_socialesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Informe_gestion_jovenesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Informe_gestion_jovenesDao
     */
     public function getInforme_gestion_jovenesDao($dbName){
        return new Informe_gestion_jovenesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Informes_gestion_financiadoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Informes_gestion_financiadoDao
     */
     public function getInformes_gestion_financiadoDao($dbName){
        return new Informes_gestion_financiadoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de InvestigadorDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de InvestigadorDao
     */
     public function getInvestigadorDao($dbName){
        return new InvestigadorDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Linea_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Linea_investigacionDao
     */
     public function getLinea_investigacionDao($dbName){
        return new Linea_investigacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ModulosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ModulosDao
     */
     public function getModulosDao($dbName){
        return new ModulosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Otras_actividadesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Otras_actividadesDao
     */
     public function getOtras_actividadesDao($dbName){
        return new Otras_actividadesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Pares_academicosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Pares_academicosDao
     */
     public function getPares_academicosDao($dbName){
        return new Pares_academicosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de PerfilesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PerfilesDao
     */
     public function getPerfilesDao($dbName){
        return new PerfilesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Perfiles_has_modulosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Perfiles_has_modulosDao
     */
     public function getPerfiles_has_modulosDao($dbName){
        return new Perfiles_has_modulosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de PersonaDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PersonaDao
     */
     public function getPersonaDao($dbName){
        return new PersonaDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Persona_has_grupoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Persona_has_grupoDao
     */
     public function getPersona_has_grupoDao($dbName){
        return new Persona_has_grupoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Persona_has_semilleroDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Persona_has_semilleroDao
     */
     public function getPersona_has_semilleroDao($dbName){
        return new Persona_has_semilleroDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Plan_accionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Plan_accionDao
     */
     public function getPlan_accionDao($dbName){
        return new Plan_accionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Plan_estudiosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Plan_estudiosDao
     */
     public function getPlan_estudiosDao($dbName){
        return new Plan_estudiosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de PonenciasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PonenciasDao
     */
     public function getPonenciasDao($dbName){
        return new PonenciasDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Proy_lineas_investDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Proy_lineas_investDao
     */
     public function getProy_lineas_investDao($dbName){
        return new Proy_lineas_investDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ProyectosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProyectosDao
     */
     public function getProyectosDao($dbName){
        return new ProyectosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de PublicacionesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PublicacionesDao
     */
     public function getPublicacionesDao($dbName){
        return new PublicacionesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Sem_linea_investigacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Sem_linea_investigacionDao
     */
     public function getSem_linea_investigacionDao($dbName){
        return new Sem_linea_investigacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de SemilleroDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de SemilleroDao
     */
     public function getSemilleroDao($dbName){
        return new SemilleroDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Solicitud_horasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Solicitud_horasDao
     */
     public function getSolicitud_horasDao($dbName){
        return new Solicitud_horasDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Solicitud_horas_financiadoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Solicitud_horas_financiadoDao
     */
     public function getSolicitud_horas_financiadoDao($dbName){
        return new Solicitud_horas_financiadoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Solicitud_horas_tutorDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Solicitud_horas_tutorDao
     */
     public function getSolicitud_horas_tutorDao($dbName){
        return new Solicitud_horas_tutorDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Tipo_docuemntoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_docuemntoDao
     */
     public function getTipo_docuemntoDao($dbName){
        return new Tipo_docuemntoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Tipo_ponenciasDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_ponenciasDao
     */
     public function getTipo_ponenciasDao($dbName){
        return new Tipo_ponenciasDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Tipo_proyectoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_proyectoDao
     */
     public function getTipo_proyectoDao($dbName){
        return new Tipo_proyectoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Tipo_publicacionesDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_publicacionesDao
     */
     public function getTipo_publicacionesDao($dbName){
        return new Tipo_publicacionesDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Tipo_vinculacionDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Tipo_vinculacionDao
     */
     public function getTipo_vinculacionDao($dbName){
        return new Tipo_vinculacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de TitulosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de TitulosDao
     */
     public function getTitulosDao($dbName){
        return new TitulosDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de Uso_equiposDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de Uso_equiposDao
     */
     public function getUso_equiposDao($dbName){
        return new Uso_equiposDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de UsuariosDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuariosDao
     */
     public function getUsuariosDao($dbName){
        return new UsuariosDao($this->conn->obtener($dbName));
    }

}
//That`s all folks!