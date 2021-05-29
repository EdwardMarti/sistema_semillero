<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En esto paso mis sábados en la noche ( ¬.¬)  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Grupo_linea_investigacion.php');
require_once realpath('../dao/interfaz/IGrupo_linea_investigacionDao.php');
require_once realpath('../dto/Grupo_investigacion.php');
require_once realpath('../dto/Linea_investigacion.php');

class Grupo_linea_investigacionFacade {

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
   * Crea un objeto Grupo_linea_investigacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param grupo_investigacion_id
   * @param linea_investigacion_id
   */
  public static function insert( $id,  $grupo_investigacion_id,  $linea_investigacion_id){
      $grupo_linea_investigacion = new Grupo_linea_investigacion();
      $grupo_linea_investigacion->setId($id); 
      $grupo_linea_investigacion->setGrupo_investigacion_id($grupo_investigacion_id); 
      $grupo_linea_investigacion->setLinea_investigacion_id($linea_investigacion_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_linea_investigacionDao =$FactoryDao->getgrupo_linea_investigacionDao(self::getDataBaseDefault());
     $rtn = $grupo_linea_investigacionDao->insert($grupo_linea_investigacion);
     $grupo_linea_investigacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Grupo_linea_investigacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $grupo_linea_investigacion = new Grupo_linea_investigacion();
      $grupo_linea_investigacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_linea_investigacionDao =$FactoryDao->getgrupo_linea_investigacionDao(self::getDataBaseDefault());
     $result = $grupo_linea_investigacionDao->select($grupo_linea_investigacion);
     $grupo_linea_investigacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Grupo_linea_investigacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param grupo_investigacion_id
   * @param linea_investigacion_id
   */
  public static function update($id, $grupo_investigacion_id, $linea_investigacion_id){
      $grupo_linea_investigacion = self::select($id);
      $grupo_linea_investigacion->setGrupo_investigacion_id($grupo_investigacion_id); 
      $grupo_linea_investigacion->setLinea_investigacion_id($linea_investigacion_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_linea_investigacionDao =$FactoryDao->getgrupo_linea_investigacionDao(self::getDataBaseDefault());
     $grupo_linea_investigacionDao->update($grupo_linea_investigacion);
     $grupo_linea_investigacionDao->close();
  }

  /**
   * Elimina un objeto Grupo_linea_investigacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $grupo_linea_investigacion = new Grupo_linea_investigacion();
      $grupo_linea_investigacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_linea_investigacionDao =$FactoryDao->getgrupo_linea_investigacionDao(self::getDataBaseDefault());
     $grupo_linea_investigacionDao->delete($grupo_linea_investigacion);
     $grupo_linea_investigacionDao->close();
  }

  /**
   * Lista todos los objetos Grupo_linea_investigacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Grupo_linea_investigacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_linea_investigacionDao =$FactoryDao->getgrupo_linea_investigacionDao(self::getDataBaseDefault());
     $result = $grupo_linea_investigacionDao->listAll();
     $grupo_linea_investigacionDao->close();
     return $result;
  }


}
//That`s all folks!