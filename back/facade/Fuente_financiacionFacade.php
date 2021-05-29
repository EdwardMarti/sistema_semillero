<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Muerte a todos los humanos!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Fuente_financiacion.php');
require_once realpath('../dao/interfaz/IFuente_financiacionDao.php');
require_once realpath('../dto/Proyectos.php');

class Fuente_financiacionFacade {

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
   * Crea un objeto Fuente_financiacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param fuente
   * @param valor
   * @param proyectos_terminados_id
   */
  public static function insert( $id,  $fuente,  $valor,  $proyectos_terminados_id){
      $fuente_financiacion = new Fuente_financiacion();
      $fuente_financiacion->setId($id); 
      $fuente_financiacion->setFuente($fuente); 
      $fuente_financiacion->setValor($valor); 
      $fuente_financiacion->setProyectos_terminados_id($proyectos_terminados_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fuente_financiacionDao =$FactoryDao->getfuente_financiacionDao(self::getDataBaseDefault());
     $rtn = $fuente_financiacionDao->insert($fuente_financiacion);
     $fuente_financiacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Fuente_financiacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $fuente_financiacion = new Fuente_financiacion();
      $fuente_financiacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fuente_financiacionDao =$FactoryDao->getfuente_financiacionDao(self::getDataBaseDefault());
     $result = $fuente_financiacionDao->select($fuente_financiacion);
     $fuente_financiacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Fuente_financiacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param fuente
   * @param valor
   * @param proyectos_terminados_id
   */
  public static function update($id, $fuente, $valor, $proyectos_terminados_id){
      $fuente_financiacion = self::select($id);
      $fuente_financiacion->setFuente($fuente); 
      $fuente_financiacion->setValor($valor); 
      $fuente_financiacion->setProyectos_terminados_id($proyectos_terminados_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fuente_financiacionDao =$FactoryDao->getfuente_financiacionDao(self::getDataBaseDefault());
     $fuente_financiacionDao->update($fuente_financiacion);
     $fuente_financiacionDao->close();
  }

  /**
   * Elimina un objeto Fuente_financiacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $fuente_financiacion = new Fuente_financiacion();
      $fuente_financiacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fuente_financiacionDao =$FactoryDao->getfuente_financiacionDao(self::getDataBaseDefault());
     $fuente_financiacionDao->delete($fuente_financiacion);
     $fuente_financiacionDao->close();
  }

  /**
   * Lista todos los objetos Fuente_financiacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Fuente_financiacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $fuente_financiacionDao =$FactoryDao->getfuente_financiacionDao(self::getDataBaseDefault());
     $result = $fuente_financiacionDao->listAll();
     $fuente_financiacionDao->close();
     return $result;
  }


}
//That`s all folks!