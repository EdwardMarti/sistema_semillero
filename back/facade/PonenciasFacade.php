<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Ponencias.php');
require_once realpath('../dao/interfaz/IPonenciasDao.php');
require_once realpath('../dto/Tipo_ponencias.php');
require_once realpath('../dto/Semillero.php');

class PonenciasFacade {

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
   * Crea un objeto Ponencias a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre_po
   * @param fecha
   * @param nombre_eve
   * @param institucion
   * @param ciudad
   * @param lugar
   * @param tipo_ponencias_id
   * @param semillero_id
   */
  public static function insert( $id,  $nombre_po,  $fecha,  $nombre_eve,  $institucion,  $ciudad,  $lugar,  $tipo_ponencias_id,  $semillero_id){
      $ponencias = new Ponencias();
      $ponencias->setId($id); 
      $ponencias->setNombre_po($nombre_po); 
      $ponencias->setFecha($fecha); 
      $ponencias->setNombre_eve($nombre_eve); 
      $ponencias->setInstitucion($institucion); 
      $ponencias->setCiudad($ciudad); 
      $ponencias->setLugar($lugar); 
      $ponencias->setTipo_ponencias_id($tipo_ponencias_id); 
      $ponencias->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ponenciasDao =$FactoryDao->getponenciasDao(self::getDataBaseDefault());
     $rtn = $ponenciasDao->insert($ponencias);
     $ponenciasDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Ponencias de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $ponencias = new Ponencias();
      $ponencias->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ponenciasDao =$FactoryDao->getponenciasDao(self::getDataBaseDefault());
     $result = $ponenciasDao->select($ponencias);
     $ponenciasDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Ponencias  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre_po
   * @param fecha
   * @param nombre_eve
   * @param institucion
   * @param ciudad
   * @param lugar
   * @param tipo_ponencias_id
   * @param semillero_id
   */
  public static function update($id, $nombre_po, $fecha, $nombre_eve, $institucion, $ciudad, $lugar, $tipo_ponencias_id, $semillero_id){
      $ponencias = self::select($id);
      $ponencias->setNombre_po($nombre_po); 
      $ponencias->setFecha($fecha); 
      $ponencias->setNombre_eve($nombre_eve); 
      $ponencias->setInstitucion($institucion); 
      $ponencias->setCiudad($ciudad); 
      $ponencias->setLugar($lugar); 
      $ponencias->setTipo_ponencias_id($tipo_ponencias_id); 
      $ponencias->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ponenciasDao =$FactoryDao->getponenciasDao(self::getDataBaseDefault());
     $ponenciasDao->update($ponencias);
     $ponenciasDao->close();
  }

  /**
   * Elimina un objeto Ponencias de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $ponencias = new Ponencias();
      $ponencias->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ponenciasDao =$FactoryDao->getponenciasDao(self::getDataBaseDefault());
     $ponenciasDao->delete($ponencias);
     $ponenciasDao->close();
  }

  /**
   * Lista todos los objetos Ponencias de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Ponencias en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $ponenciasDao =$FactoryDao->getponenciasDao(self::getDataBaseDefault());
     $result = $ponenciasDao->listAll();
     $ponenciasDao->close();
     return $result;
  }


}
//That`s all folks!