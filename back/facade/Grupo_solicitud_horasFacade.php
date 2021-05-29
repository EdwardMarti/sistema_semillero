<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todos los animales son iguales, pero algunos animales son más iguales que otros  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Grupo_solicitud_horas.php');
require_once realpath('../dao/interfaz/IGrupo_solicitud_horasDao.php');
require_once realpath('../dto/Solicitud_horas.php');
require_once realpath('../dto/Grupo_investigacion.php');

class Grupo_solicitud_horasFacade {

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
   * Crea un objeto Grupo_solicitud_horas a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param solicitud_horas_id
   * @param grupo_investigacion_id
   */
  public static function insert( $id,  $solicitud_horas_id,  $grupo_investigacion_id){
      $grupo_solicitud_horas = new Grupo_solicitud_horas();
      $grupo_solicitud_horas->setId($id); 
      $grupo_solicitud_horas->setSolicitud_horas_id($solicitud_horas_id); 
      $grupo_solicitud_horas->setGrupo_investigacion_id($grupo_investigacion_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_solicitud_horasDao =$FactoryDao->getgrupo_solicitud_horasDao(self::getDataBaseDefault());
     $rtn = $grupo_solicitud_horasDao->insert($grupo_solicitud_horas);
     $grupo_solicitud_horasDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Grupo_solicitud_horas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $grupo_solicitud_horas = new Grupo_solicitud_horas();
      $grupo_solicitud_horas->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_solicitud_horasDao =$FactoryDao->getgrupo_solicitud_horasDao(self::getDataBaseDefault());
     $result = $grupo_solicitud_horasDao->select($grupo_solicitud_horas);
     $grupo_solicitud_horasDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Grupo_solicitud_horas  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param solicitud_horas_id
   * @param grupo_investigacion_id
   */
  public static function update($id, $solicitud_horas_id, $grupo_investigacion_id){
      $grupo_solicitud_horas = self::select($id);
      $grupo_solicitud_horas->setSolicitud_horas_id($solicitud_horas_id); 
      $grupo_solicitud_horas->setGrupo_investigacion_id($grupo_investigacion_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_solicitud_horasDao =$FactoryDao->getgrupo_solicitud_horasDao(self::getDataBaseDefault());
     $grupo_solicitud_horasDao->update($grupo_solicitud_horas);
     $grupo_solicitud_horasDao->close();
  }

  /**
   * Elimina un objeto Grupo_solicitud_horas de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $grupo_solicitud_horas = new Grupo_solicitud_horas();
      $grupo_solicitud_horas->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_solicitud_horasDao =$FactoryDao->getgrupo_solicitud_horasDao(self::getDataBaseDefault());
     $grupo_solicitud_horasDao->delete($grupo_solicitud_horas);
     $grupo_solicitud_horasDao->close();
  }

  /**
   * Lista todos los objetos Grupo_solicitud_horas de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Grupo_solicitud_horas en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_solicitud_horasDao =$FactoryDao->getgrupo_solicitud_horasDao(self::getDataBaseDefault());
     $result = $grupo_solicitud_horasDao->listAll();
     $grupo_solicitud_horasDao->close();
     return $result;
  }


}
//That`s all folks!