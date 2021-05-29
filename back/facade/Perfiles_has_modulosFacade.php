<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Vaya! ¡Al fin harás algo mejor que una calculadora!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Perfiles_has_modulos.php');
require_once realpath('../dao/interfaz/IPerfiles_has_modulosDao.php');
require_once realpath('../dto/Perfiles.php');
require_once realpath('../dto/Modulos.php');

class Perfiles_has_modulosFacade {

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
   * Crea un objeto Perfiles_has_modulos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param perfiles_id
   * @param modulos_activos_id
   * @param id
   * @param activo
   */
  public static function insert( $perfiles_id,  $modulos_activos_id,  $id,  $activo){
      $perfiles_has_modulos = new Perfiles_has_modulos();
      $perfiles_has_modulos->setPerfiles_id($perfiles_id); 
      $perfiles_has_modulos->setModulos_activos_id($modulos_activos_id); 
      $perfiles_has_modulos->setId($id); 
      $perfiles_has_modulos->setActivo($activo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $perfiles_has_modulosDao =$FactoryDao->getperfiles_has_modulosDao(self::getDataBaseDefault());
     $rtn = $perfiles_has_modulosDao->insert($perfiles_has_modulos);
     $perfiles_has_modulosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Perfiles_has_modulos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $perfiles_has_modulos = new Perfiles_has_modulos();
      $perfiles_has_modulos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $perfiles_has_modulosDao =$FactoryDao->getperfiles_has_modulosDao(self::getDataBaseDefault());
     $result = $perfiles_has_modulosDao->select($perfiles_has_modulos);
     $perfiles_has_modulosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Perfiles_has_modulos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param perfiles_id
   * @param modulos_activos_id
   * @param id
   * @param activo
   */
  public static function update($perfiles_id, $modulos_activos_id, $id, $activo){
      $perfiles_has_modulos = self::select($id);
      $perfiles_has_modulos->setPerfiles_id($perfiles_id); 
      $perfiles_has_modulos->setModulos_activos_id($modulos_activos_id); 
      $perfiles_has_modulos->setActivo($activo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $perfiles_has_modulosDao =$FactoryDao->getperfiles_has_modulosDao(self::getDataBaseDefault());
     $perfiles_has_modulosDao->update($perfiles_has_modulos);
     $perfiles_has_modulosDao->close();
  }

  /**
   * Elimina un objeto Perfiles_has_modulos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $perfiles_has_modulos = new Perfiles_has_modulos();
      $perfiles_has_modulos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $perfiles_has_modulosDao =$FactoryDao->getperfiles_has_modulosDao(self::getDataBaseDefault());
     $perfiles_has_modulosDao->delete($perfiles_has_modulos);
     $perfiles_has_modulosDao->close();
  }

  /**
   * Lista todos los objetos Perfiles_has_modulos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Perfiles_has_modulos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $perfiles_has_modulosDao =$FactoryDao->getperfiles_has_modulosDao(self::getDataBaseDefault());
     $result = $perfiles_has_modulosDao->listAll();
     $perfiles_has_modulosDao->close();
     return $result;
  }


}
//That`s all folks!