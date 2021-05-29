<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    They call me Mr. Espagueti  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Grupo_investigacion.php');
require_once realpath('../dao/interfaz/IGrupo_investigacionDao.php');

class Grupo_investigacionFacade {

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
   * Crea un objeto Grupo_investigacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param sigla
   * @param unidad_academica
   * @param fecha_creacion
   * @param fecha_gruplac
   * @param codigo_gruplac
   * @param clas_colciencias
   * @param cate_colciencias
   */
  public static function insert( $id,  $nombre,  $sigla,  $unidad_academica,  $fecha_creacion,  $fecha_gruplac,  $codigo_gruplac,  $clas_colciencias,  $cate_colciencias){
      $grupo_investigacion = new Grupo_investigacion();
      $grupo_investigacion->setId($id); 
      $grupo_investigacion->setNombre($nombre); 
      $grupo_investigacion->setSigla($sigla); 
      $grupo_investigacion->setUnidad_academica($unidad_academica); 
      $grupo_investigacion->setFecha_creacion($fecha_creacion); 
      $grupo_investigacion->setFecha_gruplac($fecha_gruplac); 
      $grupo_investigacion->setCodigo_gruplac($codigo_gruplac); 
      $grupo_investigacion->setClas_colciencias($clas_colciencias); 
      $grupo_investigacion->setCate_colciencias($cate_colciencias); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_investigacionDao =$FactoryDao->getgrupo_investigacionDao(self::getDataBaseDefault());
     $rtn = $grupo_investigacionDao->insert($grupo_investigacion);
     $grupo_investigacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Grupo_investigacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $grupo_investigacion = new Grupo_investigacion();
      $grupo_investigacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_investigacionDao =$FactoryDao->getgrupo_investigacionDao(self::getDataBaseDefault());
     $result = $grupo_investigacionDao->select($grupo_investigacion);
     $grupo_investigacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Grupo_investigacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param sigla
   * @param unidad_academica
   * @param fecha_creacion
   * @param fecha_gruplac
   * @param codigo_gruplac
   * @param clas_colciencias
   * @param cate_colciencias
   */
  public static function update($id, $nombre, $sigla, $unidad_academica, $fecha_creacion, $fecha_gruplac, $codigo_gruplac, $clas_colciencias, $cate_colciencias){
      $grupo_investigacion = self::select($id);
      $grupo_investigacion->setNombre($nombre); 
      $grupo_investigacion->setSigla($sigla); 
      $grupo_investigacion->setUnidad_academica($unidad_academica); 
      $grupo_investigacion->setFecha_creacion($fecha_creacion); 
      $grupo_investigacion->setFecha_gruplac($fecha_gruplac); 
      $grupo_investigacion->setCodigo_gruplac($codigo_gruplac); 
      $grupo_investigacion->setClas_colciencias($clas_colciencias); 
      $grupo_investigacion->setCate_colciencias($cate_colciencias); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_investigacionDao =$FactoryDao->getgrupo_investigacionDao(self::getDataBaseDefault());
     $grupo_investigacionDao->update($grupo_investigacion);
     $grupo_investigacionDao->close();
  }

  /**
   * Elimina un objeto Grupo_investigacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $grupo_investigacion = new Grupo_investigacion();
      $grupo_investigacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_investigacionDao =$FactoryDao->getgrupo_investigacionDao(self::getDataBaseDefault());
     $grupo_investigacionDao->delete($grupo_investigacion);
     $grupo_investigacionDao->close();
  }

  /**
   * Lista todos los objetos Grupo_investigacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Grupo_investigacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_investigacionDao =$FactoryDao->getgrupo_investigacionDao(self::getDataBaseDefault());
     $result = $grupo_investigacionDao->listAll();
     $grupo_investigacionDao->close();
     return $result;
  }


}
//That`s all folks!