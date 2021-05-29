<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    NEVERMORE  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Sem_linea_investigacion.php');
require_once realpath('../dao/interfaz/ISem_linea_investigacionDao.php');
require_once realpath('../dto/Semillero.php');
require_once realpath('../dto/Linea_investigacion.php');

class Sem_linea_investigacionFacade {

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
   * Crea un objeto Sem_linea_investigacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param semillero_id
   * @param linea_investigacion_id
   */
  public static function insert( $id,  $semillero_id,  $linea_investigacion_id){
      $sem_linea_investigacion = new Sem_linea_investigacion();
      $sem_linea_investigacion->setId($id); 
      $sem_linea_investigacion->setSemillero_id($semillero_id); 
      $sem_linea_investigacion->setLinea_investigacion_id($linea_investigacion_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sem_linea_investigacionDao =$FactoryDao->getsem_linea_investigacionDao(self::getDataBaseDefault());
     $rtn = $sem_linea_investigacionDao->insert($sem_linea_investigacion);
     $sem_linea_investigacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Sem_linea_investigacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $sem_linea_investigacion = new Sem_linea_investigacion();
      $sem_linea_investigacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sem_linea_investigacionDao =$FactoryDao->getsem_linea_investigacionDao(self::getDataBaseDefault());
     $result = $sem_linea_investigacionDao->select($sem_linea_investigacion);
     $sem_linea_investigacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Sem_linea_investigacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param semillero_id
   * @param linea_investigacion_id
   */
  public static function update($id, $semillero_id, $linea_investigacion_id){
      $sem_linea_investigacion = self::select($id);
      $sem_linea_investigacion->setSemillero_id($semillero_id); 
      $sem_linea_investigacion->setLinea_investigacion_id($linea_investigacion_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sem_linea_investigacionDao =$FactoryDao->getsem_linea_investigacionDao(self::getDataBaseDefault());
     $sem_linea_investigacionDao->update($sem_linea_investigacion);
     $sem_linea_investigacionDao->close();
  }

  /**
   * Elimina un objeto Sem_linea_investigacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $sem_linea_investigacion = new Sem_linea_investigacion();
      $sem_linea_investigacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sem_linea_investigacionDao =$FactoryDao->getsem_linea_investigacionDao(self::getDataBaseDefault());
     $sem_linea_investigacionDao->delete($sem_linea_investigacion);
     $sem_linea_investigacionDao->close();
  }

  /**
   * Lista todos los objetos Sem_linea_investigacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Sem_linea_investigacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $sem_linea_investigacionDao =$FactoryDao->getsem_linea_investigacionDao(self::getDataBaseDefault());
     $result = $sem_linea_investigacionDao->listAll();
     $sem_linea_investigacionDao->close();
     return $result;
  }


}
//That`s all folks!