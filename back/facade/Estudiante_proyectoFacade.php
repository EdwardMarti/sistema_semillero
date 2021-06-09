<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En un lugar de La Mancha, de cuyo nombre no quiero acordarme...  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Estudiante_proyecto.php');
require_once realpath('../dao/interfaz/IEstudiante_proyectoDao.php');


class Estudiante_proyectoFacade {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Estudiante_proyecto a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param codigo
   * @param semestre
   * @param programa_academico
   * @param persona_id
   * @param num_documento
   * @param tipo_docuemnto_id
   */
  public static function insert(  $codigo,  $nombre,  $proyecto_id){
      $estudiante_proyecto = new Estudiante_proyecto();
      $estudiante_proyecto->setCodigo($codigo); 
      $estudiante_proyecto->setNombre($nombre); 
      $estudiante_proyecto->setProyecto_id($proyecto_id); 
    

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudiante_proyectoDao =$FactoryDao->getEstudiante_proyectoDao(self::getDataBaseDefault());
     $rtn = $estudiante_proyectoDao->insert($estudiante_proyecto);
     $estudiante_proyectoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Estudiante_proyecto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $estudiante_proyecto = new Estudiante_proyecto();
      $estudiante_proyecto->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudiante_proyectoDao =$FactoryDao->getEstudiante_proyectoDao(self::getDataBaseDefault());
     $result = $estudiante_proyectoDao->select($estudiante_proyecto);
     $estudiante_proyectoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Estudiante_proyecto  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param codigo
   * @param semestre
   * @param programa_academico
   * @param persona_id
   * @param num_documento
   * @param tipo_docuemnto_id
   */
  public static function update($id, $codigo, $nombre, $proyecto_id){
      $estudiante_proyecto = self::select($id);
      $estudiante_proyecto->setCodigo($codigo); 
      $estudiante_proyecto->setNombre($nombre); 
      $estudiante_proyecto->setProyecto_id($proyecto_id); 
     

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudiante_proyectoDao =$FactoryDao->getEstudiante_proyectoDao(self::getDataBaseDefault());
     $result = $estudiante_proyectoDao->update($estudiante_proyecto);
     $estudiante_proyectoDao->close();
     return $result;
  }

  /**
   * Elimina un objeto Estudiante_proyecto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $estudiante_proyecto = new Estudiante_proyecto();
      $estudiante_proyecto->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudiante_proyectoDao =$FactoryDao->getEstudiante_proyectoDao(self::getDataBaseDefault());
     $estudiante_proyectoDao->delete($estudiante_proyecto);
     $estudiante_proyectoDao->close();
     return true;
  }

  /**
   * Lista todos los objetos Estudiante_proyecto de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Estudiante_proyecto en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudiante_proyectoDao =$FactoryDao->getEstudiante_proyectoDao(self::getDataBaseDefault());
     $result = $estudiante_proyectoDao->listAll();
     $estudiante_proyectoDao->close();
     return $result;
  }
  
  public static function listAll_Semillero($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudiante_proyectoDao =$FactoryDao->getEstudiante_proyectoDao(self::getDataBaseDefault());
     $result = $estudiante_proyectoDao->listAll_Semillero($id);
     $estudiante_proyectoDao->close();
     return $result;
  }


}
//That`s all folks!