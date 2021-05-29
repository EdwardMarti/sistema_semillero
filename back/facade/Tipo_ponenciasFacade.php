<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Tipo_ponencias.php');
require_once realpath('../dao/interfaz/ITipo_ponenciasDao.php');

class Tipo_ponenciasFacade {

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
   * Crea un objeto Tipo_ponencias a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   */
  public static function insert( $id,  $nombre){
      $tipo_ponencias = new Tipo_ponencias();
      $tipo_ponencias->setId($id); 
      $tipo_ponencias->setNombre($nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_ponenciasDao =$FactoryDao->gettipo_ponenciasDao(self::getDataBaseDefault());
     $rtn = $tipo_ponenciasDao->insert($tipo_ponencias);
     $tipo_ponenciasDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Tipo_ponencias de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $tipo_ponencias = new Tipo_ponencias();
      $tipo_ponencias->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_ponenciasDao =$FactoryDao->gettipo_ponenciasDao(self::getDataBaseDefault());
     $result = $tipo_ponenciasDao->select($tipo_ponencias);
     $tipo_ponenciasDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Tipo_ponencias  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   */
  public static function update($id, $nombre){
      $tipo_ponencias = self::select($id);
      $tipo_ponencias->setNombre($nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_ponenciasDao =$FactoryDao->gettipo_ponenciasDao(self::getDataBaseDefault());
     $tipo_ponenciasDao->update($tipo_ponencias);
     $tipo_ponenciasDao->close();
  }

  /**
   * Elimina un objeto Tipo_ponencias de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $tipo_ponencias = new Tipo_ponencias();
      $tipo_ponencias->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_ponenciasDao =$FactoryDao->gettipo_ponenciasDao(self::getDataBaseDefault());
     $tipo_ponenciasDao->delete($tipo_ponencias);
     $tipo_ponenciasDao->close();
  }

  /**
   * Lista todos los objetos Tipo_ponencias de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Tipo_ponencias en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_ponenciasDao =$FactoryDao->gettipo_ponenciasDao(self::getDataBaseDefault());
     $result = $tipo_ponenciasDao->listAll();
     $tipo_ponenciasDao->close();
     return $result;
  }


}
//That`s all folks!