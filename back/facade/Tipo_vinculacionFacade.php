<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...y esta no es la única frase que encontrarás...  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Tipo_vinculacion.php');
require_once realpath('../dao/interfaz/ITipo_vinculacionDao.php');

class Tipo_vinculacionFacade {

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
   * Crea un objeto Tipo_vinculacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function insert( $id,  $descripcion){
      $tipo_vinculacion = new Tipo_vinculacion();
      $tipo_vinculacion->setId($id); 
      $tipo_vinculacion->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_vinculacionDao =$FactoryDao->gettipo_vinculacionDao(self::getDataBaseDefault());
     $rtn = $tipo_vinculacionDao->insert($tipo_vinculacion);
     $tipo_vinculacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Tipo_vinculacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $tipo_vinculacion = new Tipo_vinculacion();
      $tipo_vinculacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_vinculacionDao =$FactoryDao->gettipo_vinculacionDao(self::getDataBaseDefault());
     $result = $tipo_vinculacionDao->select($tipo_vinculacion);
     $tipo_vinculacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Tipo_vinculacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function update($id, $descripcion){
      $tipo_vinculacion = self::select($id);
      $tipo_vinculacion->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_vinculacionDao =$FactoryDao->gettipo_vinculacionDao(self::getDataBaseDefault());
     $tipo_vinculacionDao->update($tipo_vinculacion);
     $tipo_vinculacionDao->close();
  }

  /**
   * Elimina un objeto Tipo_vinculacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $tipo_vinculacion = new Tipo_vinculacion();
      $tipo_vinculacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_vinculacionDao =$FactoryDao->gettipo_vinculacionDao(self::getDataBaseDefault());
     $tipo_vinculacionDao->delete($tipo_vinculacion);
     $tipo_vinculacionDao->close();
  }

  /**
   * Lista todos los objetos Tipo_vinculacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Tipo_vinculacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_vinculacionDao =$FactoryDao->gettipo_vinculacionDao(self::getDataBaseDefault());
     $result = $tipo_vinculacionDao->listAll();
     $tipo_vinculacionDao->close();
     return $result;
  }


}
//That`s all folks!