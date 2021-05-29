<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Capacitaciones.php');
require_once realpath('../dao/interfaz/ICapacitacionesDao.php');
require_once realpath('../dto/Semillero.php');

class CapacitacionesFacade {

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
   * Crea un objeto Capacitaciones a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param tema
   * @param docente
   * @param fecha
   * @param cant_capacitados
   * @param semillero_id
   * @param objetivo
   */
  public static function insert( $id,  $tema,  $docente,  $fecha,  $cant_capacitados,  $semillero_id,  $objetivo){
      $capacitaciones = new Capacitaciones();
      $capacitaciones->setId($id); 
      $capacitaciones->setTema($tema); 
      $capacitaciones->setDocente($docente); 
      $capacitaciones->setFecha($fecha); 
      $capacitaciones->setCant_capacitados($cant_capacitados); 
      $capacitaciones->setSemillero_id($semillero_id); 
      $capacitaciones->setObjetivo($objetivo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitacionesDao =$FactoryDao->getcapacitacionesDao(self::getDataBaseDefault());
     $rtn = $capacitacionesDao->insert($capacitaciones);
     $capacitacionesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Capacitaciones de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $capacitaciones = new Capacitaciones();
      $capacitaciones->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitacionesDao =$FactoryDao->getcapacitacionesDao(self::getDataBaseDefault());
     $result = $capacitacionesDao->select($capacitaciones);
     $capacitacionesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Capacitaciones  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param tema
   * @param docente
   * @param fecha
   * @param cant_capacitados
   * @param semillero_id
   * @param objetivo
   */
  public static function update($id, $tema, $docente, $fecha, $cant_capacitados, $semillero_id, $objetivo){
      $capacitaciones = self::select($id);
      $capacitaciones->setTema($tema); 
      $capacitaciones->setDocente($docente); 
      $capacitaciones->setFecha($fecha); 
      $capacitaciones->setCant_capacitados($cant_capacitados); 
      $capacitaciones->setSemillero_id($semillero_id); 
      $capacitaciones->setObjetivo($objetivo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitacionesDao =$FactoryDao->getcapacitacionesDao(self::getDataBaseDefault());
     $capacitacionesDao->update($capacitaciones);
     $capacitacionesDao->close();
  }

  /**
   * Elimina un objeto Capacitaciones de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $capacitaciones = new Capacitaciones();
      $capacitaciones->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitacionesDao =$FactoryDao->getcapacitacionesDao(self::getDataBaseDefault());
     $capacitacionesDao->delete($capacitaciones);
     $capacitacionesDao->close();
  }

  /**
   * Lista todos los objetos Capacitaciones de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Capacitaciones en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitacionesDao =$FactoryDao->getcapacitacionesDao(self::getDataBaseDefault());
     $result = $capacitacionesDao->listAll();
     $capacitacionesDao->close();
     return $result;
  }


}
//That`s all folks!