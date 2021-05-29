<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Damos paso a la anarquía...  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Tipo_proyecto.php');
require_once realpath('../dao/interfaz/ITipo_proyectoDao.php');
require_once realpath('../dto/Proyectos.php');

class Tipo_proyectoFacade {

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
   * Crea un objeto Tipo_proyecto a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param proyectos_id
   */
  public static function insert( $id,  $descripcion,  $proyectos_id){
      $tipo_proyecto = new Tipo_proyecto();
      $tipo_proyecto->setId($id); 
      $tipo_proyecto->setDescripcion($descripcion); 
      $tipo_proyecto->setProyectos_id($proyectos_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_proyectoDao =$FactoryDao->gettipo_proyectoDao(self::getDataBaseDefault());
     $rtn = $tipo_proyectoDao->insert($tipo_proyecto);
     $tipo_proyectoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Tipo_proyecto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $tipo_proyecto = new Tipo_proyecto();
      $tipo_proyecto->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_proyectoDao =$FactoryDao->gettipo_proyectoDao(self::getDataBaseDefault());
     $result = $tipo_proyectoDao->select($tipo_proyecto);
     $tipo_proyectoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Tipo_proyecto  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param proyectos_id
   */
  public static function update($id, $descripcion, $proyectos_id){
      $tipo_proyecto = self::select($id);
      $tipo_proyecto->setDescripcion($descripcion); 
      $tipo_proyecto->setProyectos_id($proyectos_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_proyectoDao =$FactoryDao->gettipo_proyectoDao(self::getDataBaseDefault());
     $tipo_proyectoDao->update($tipo_proyecto);
     $tipo_proyectoDao->close();
  }

  /**
   * Elimina un objeto Tipo_proyecto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $tipo_proyecto = new Tipo_proyecto();
      $tipo_proyecto->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_proyectoDao =$FactoryDao->gettipo_proyectoDao(self::getDataBaseDefault());
     $tipo_proyectoDao->delete($tipo_proyecto);
     $tipo_proyectoDao->close();
  }

  /**
   * Lista todos los objetos Tipo_proyecto de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Tipo_proyecto en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_proyectoDao =$FactoryDao->gettipo_proyectoDao(self::getDataBaseDefault());
     $result = $tipo_proyectoDao->listAll();
     $tipo_proyectoDao->close();
     return $result;
  }


}
//That`s all folks!