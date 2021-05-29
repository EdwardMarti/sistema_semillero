<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Y si mejor estudias comunicación?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Modulos.php');
require_once realpath('../dao/interfaz/IModulosDao.php');

class ModulosFacade {

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
   * Crea un objeto Modulos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function insert( $id,  $descripcion){
      $modulos = new Modulos();
      $modulos->setId($id); 
      $modulos->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $modulosDao =$FactoryDao->getmodulosDao(self::getDataBaseDefault());
     $rtn = $modulosDao->insert($modulos);
     $modulosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Modulos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $modulos = new Modulos();
      $modulos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $modulosDao =$FactoryDao->getmodulosDao(self::getDataBaseDefault());
     $result = $modulosDao->select($modulos);
     $modulosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Modulos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function update($id, $descripcion){
      $modulos = self::select($id);
      $modulos->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $modulosDao =$FactoryDao->getmodulosDao(self::getDataBaseDefault());
     $modulosDao->update($modulos);
     $modulosDao->close();
  }

  /**
   * Elimina un objeto Modulos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $modulos = new Modulos();
      $modulos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $modulosDao =$FactoryDao->getmodulosDao(self::getDataBaseDefault());
     $modulosDao->delete($modulos);
     $modulosDao->close();
  }

  /**
   * Lista todos los objetos Modulos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Modulos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $modulosDao =$FactoryDao->getmodulosDao(self::getDataBaseDefault());
     $result = $modulosDao->listAll();
     $modulosDao->close();
     return $result;
  }


}
//That`s all folks!