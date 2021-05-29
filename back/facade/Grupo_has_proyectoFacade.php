<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿No es más sencillo hacer todo en el Main?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Grupo_has_proyecto.php');
require_once realpath('../dao/interfaz/IGrupo_has_proyectoDao.php');
require_once realpath('../dto/Grupo_investigacion.php');
require_once realpath('../dto/Proyectos.php');

class Grupo_has_proyectoFacade {

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
   * Crea un objeto Grupo_has_proyecto a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param grupo_investigacion_id
   * @param proyectos_terminados_id
   */
  public static function insert( $id,  $grupo_investigacion_id,  $proyectos_terminados_id){
      $grupo_has_proyecto = new Grupo_has_proyecto();
      $grupo_has_proyecto->setId($id); 
      $grupo_has_proyecto->setGrupo_investigacion_id($grupo_investigacion_id); 
      $grupo_has_proyecto->setProyectos_terminados_id($proyectos_terminados_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_has_proyectoDao =$FactoryDao->getgrupo_has_proyectoDao(self::getDataBaseDefault());
     $rtn = $grupo_has_proyectoDao->insert($grupo_has_proyecto);
     $grupo_has_proyectoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Grupo_has_proyecto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $grupo_has_proyecto = new Grupo_has_proyecto();
      $grupo_has_proyecto->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_has_proyectoDao =$FactoryDao->getgrupo_has_proyectoDao(self::getDataBaseDefault());
     $result = $grupo_has_proyectoDao->select($grupo_has_proyecto);
     $grupo_has_proyectoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Grupo_has_proyecto  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param grupo_investigacion_id
   * @param proyectos_terminados_id
   */
  public static function update($id, $grupo_investigacion_id, $proyectos_terminados_id){
      $grupo_has_proyecto = self::select($id);
      $grupo_has_proyecto->setGrupo_investigacion_id($grupo_investigacion_id); 
      $grupo_has_proyecto->setProyectos_terminados_id($proyectos_terminados_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_has_proyectoDao =$FactoryDao->getgrupo_has_proyectoDao(self::getDataBaseDefault());
     $grupo_has_proyectoDao->update($grupo_has_proyecto);
     $grupo_has_proyectoDao->close();
  }

  /**
   * Elimina un objeto Grupo_has_proyecto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $grupo_has_proyecto = new Grupo_has_proyecto();
      $grupo_has_proyecto->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_has_proyectoDao =$FactoryDao->getgrupo_has_proyectoDao(self::getDataBaseDefault());
     $grupo_has_proyectoDao->delete($grupo_has_proyecto);
     $grupo_has_proyectoDao->close();
  }

  /**
   * Lista todos los objetos Grupo_has_proyecto de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Grupo_has_proyecto en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_has_proyectoDao =$FactoryDao->getgrupo_has_proyectoDao(self::getDataBaseDefault());
     $result = $grupo_has_proyectoDao->listAll();
     $grupo_has_proyectoDao->close();
     return $result;
  }


}
//That`s all folks!