<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Oh! (°o° ) ¡es Fredy Arciniegas, el intelectualoide millonario!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Tipo_docuemnto.php');
require_once realpath('../dao/interfaz/ITipo_docuemntoDao.php');

class Tipo_docuemntoFacade {

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
   * Crea un objeto Tipo_docuemnto a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function insert( $id,  $descripcion){
      $tipo_docuemnto = new Tipo_docuemnto();
      $tipo_docuemnto->setId($id); 
      $tipo_docuemnto->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_docuemntoDao =$FactoryDao->gettipo_docuemntoDao(self::getDataBaseDefault());
     $rtn = $tipo_docuemntoDao->insert($tipo_docuemnto);
     $tipo_docuemntoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Tipo_docuemnto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $tipo_docuemnto = new Tipo_docuemnto();
      $tipo_docuemnto->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_docuemntoDao =$FactoryDao->gettipo_docuemntoDao(self::getDataBaseDefault());
     $result = $tipo_docuemntoDao->select($tipo_docuemnto);
     $tipo_docuemntoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Tipo_docuemnto  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function update($id, $descripcion){
      $tipo_docuemnto = self::select($id);
      $tipo_docuemnto->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_docuemntoDao =$FactoryDao->gettipo_docuemntoDao(self::getDataBaseDefault());
     $tipo_docuemntoDao->update($tipo_docuemnto);
     $tipo_docuemntoDao->close();
  }

  /**
   * Elimina un objeto Tipo_docuemnto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $tipo_docuemnto = new Tipo_docuemnto();
      $tipo_docuemnto->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_docuemntoDao =$FactoryDao->gettipo_docuemntoDao(self::getDataBaseDefault());
     $tipo_docuemntoDao->delete($tipo_docuemnto);
     $tipo_docuemntoDao->close();
  }

  /**
   * Lista todos los objetos Tipo_docuemnto de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Tipo_docuemnto en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $tipo_docuemntoDao =$FactoryDao->gettipo_docuemntoDao(self::getDataBaseDefault());
     $result = $tipo_docuemntoDao->listAll();
     $tipo_docuemntoDao->close();
     return $result;
  }


}
//That`s all folks!