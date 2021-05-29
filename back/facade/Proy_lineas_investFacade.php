<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo <3 Cúcuta  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Proy_lineas_invest.php');
require_once realpath('../dao/interfaz/IProy_lineas_investDao.php');
require_once realpath('../dto/Proyectos.php');
require_once realpath('../dto/Linea_investigacion.php');

class Proy_lineas_investFacade {

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
   * Crea un objeto Proy_lineas_invest a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param proyectos_id
   * @param linea_investigacion_id
   */
  public static function insert( $id,  $proyectos_id,  $linea_investigacion_id){
      $proy_lineas_invest = new Proy_lineas_invest();
      $proy_lineas_invest->setId($id); 
      $proy_lineas_invest->setProyectos_id($proyectos_id); 
      $proy_lineas_invest->setLinea_investigacion_id($linea_investigacion_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proy_lineas_investDao =$FactoryDao->getproy_lineas_investDao(self::getDataBaseDefault());
     $rtn = $proy_lineas_investDao->insert($proy_lineas_invest);
     $proy_lineas_investDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Proy_lineas_invest de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $proy_lineas_invest = new Proy_lineas_invest();
      $proy_lineas_invest->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proy_lineas_investDao =$FactoryDao->getproy_lineas_investDao(self::getDataBaseDefault());
     $result = $proy_lineas_investDao->select($proy_lineas_invest);
     $proy_lineas_investDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Proy_lineas_invest  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param proyectos_id
   * @param linea_investigacion_id
   */
  public static function update($id, $proyectos_id, $linea_investigacion_id){
      $proy_lineas_invest = self::select($id);
      $proy_lineas_invest->setProyectos_id($proyectos_id); 
      $proy_lineas_invest->setLinea_investigacion_id($linea_investigacion_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proy_lineas_investDao =$FactoryDao->getproy_lineas_investDao(self::getDataBaseDefault());
     $proy_lineas_investDao->update($proy_lineas_invest);
     $proy_lineas_investDao->close();
  }

  /**
   * Elimina un objeto Proy_lineas_invest de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $proy_lineas_invest = new Proy_lineas_invest();
      $proy_lineas_invest->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proy_lineas_investDao =$FactoryDao->getproy_lineas_investDao(self::getDataBaseDefault());
     $proy_lineas_investDao->delete($proy_lineas_invest);
     $proy_lineas_investDao->close();
  }

  /**
   * Lista todos los objetos Proy_lineas_invest de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Proy_lineas_invest en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proy_lineas_investDao =$FactoryDao->getproy_lineas_investDao(self::getDataBaseDefault());
     $result = $proy_lineas_investDao->listAll();
     $proy_lineas_investDao->close();
     return $result;
  }


}
//That`s all folks!