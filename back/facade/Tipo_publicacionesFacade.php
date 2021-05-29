<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora tú puedes ser el tipo con el látigo  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Tipo_publicaciones.php');
require_once realpath('../dao/interfaz/ITipo_publicacionesDao.php');

class Tipo_publicacionesFacade {

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
   * Crea un objeto Tipo_publicaciones a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function insert(   $descripcion){
      $tipo_publicaciones = new Tipo_publicaciones();
//      $tipo_publicaciones->setId($id); 
      $tipo_publicaciones->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_publicacionesDao =$FactoryDao->gettipo_publicacionesDao(self::getDataBaseDefault());
     $rtn = $tipo_publicacionesDao->insert($tipo_publicaciones);
     $tipo_publicacionesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Tipo_publicaciones de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $tipo_publicaciones = new Tipo_publicaciones();
      $tipo_publicaciones->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_publicacionesDao =$FactoryDao->gettipo_publicacionesDao(self::getDataBaseDefault());
     $result = $tipo_publicacionesDao->select($tipo_publicaciones);
     $tipo_publicacionesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Tipo_publicaciones  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function update($id, $descripcion){
      $tipo_publicaciones = self::select($id);
      $tipo_publicaciones->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_publicacionesDao =$FactoryDao->gettipo_publicacionesDao(self::getDataBaseDefault());
     $rta=$tipo_publicacionesDao->update($tipo_publicaciones);
     $tipo_publicacionesDao->close();
     return $rta;
  }

  /**
   * Elimina un objeto Tipo_publicaciones de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $tipo_publicaciones = new Tipo_publicaciones();
      $tipo_publicaciones->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_publicacionesDao =$FactoryDao->gettipo_publicacionesDao(self::getDataBaseDefault());
     $tipo_publicacionesDao->delete($tipo_publicaciones);
     $tipo_publicacionesDao->close();
  }

  /**
   * Lista todos los objetos Tipo_publicaciones de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Tipo_publicaciones en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_publicacionesDao =$FactoryDao->gettipo_publicacionesDao(self::getDataBaseDefault());
     $result = $tipo_publicacionesDao->listAll();
     $tipo_publicacionesDao->close();
     return $result;
  }


}
//That`s all folks!