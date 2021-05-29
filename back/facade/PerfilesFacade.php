<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Perfiles.php');
require_once realpath('../dao/interfaz/IPerfilesDao.php');

class PerfilesFacade {

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
   * Crea un objeto Perfiles a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function insert( $id,  $descripcion){
      $perfiles = new Perfiles();
      $perfiles->setId($id); 
      $perfiles->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $perfilesDao =$FactoryDao->getperfilesDao(self::getDataBaseDefault());
     $rtn = $perfilesDao->insert($perfiles);
     $perfilesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Perfiles de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $perfiles = new Perfiles();
      $perfiles->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $perfilesDao =$FactoryDao->getperfilesDao(self::getDataBaseDefault());
     $result = $perfilesDao->select($perfiles);
     $perfilesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Perfiles  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function update($id, $descripcion){
      $perfiles = self::select($id);
      $perfiles->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $perfilesDao =$FactoryDao->getperfilesDao(self::getDataBaseDefault());
     $perfilesDao->update($perfiles);
     $perfilesDao->close();
  }

  /**
   * Elimina un objeto Perfiles de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $perfiles = new Perfiles();
      $perfiles->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $perfilesDao =$FactoryDao->getperfilesDao(self::getDataBaseDefault());
     $perfilesDao->delete($perfiles);
     $perfilesDao->close();
  }

  /**
   * Lista todos los objetos Perfiles de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Perfiles en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $perfilesDao =$FactoryDao->getperfilesDao(self::getDataBaseDefault());
     $result = $perfilesDao->listAll();
     $perfilesDao->close();
     return $result;
  }


}
//That`s all folks!