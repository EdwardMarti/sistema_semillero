<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Semillero.php');
require_once realpath('../dao/interfaz/ISemilleroDao.php');
require_once realpath('../dto/Grupo_investigacion.php');

class SemilleroFacade {

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
   * Crea un objeto Semillero a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param sigla
   * @param fecha_creacion
   * @param aval_dic_grupo
   * @param aval_dic_sem
   * @param aval_dic_unidad
   * @param grupo_investigacion_id
   * @param unidad_academica
   */
  public static function insert( $id,  $nombre,  $sigla,  $fecha_creacion,  $aval_dic_grupo,  $aval_dic_sem,  $aval_dic_unidad,  $grupo_investigacion_id,  $unidad_academica){
      $semillero = new Semillero();
      $semillero->setId($id); 
      $semillero->setNombre($nombre); 
      $semillero->setSigla($sigla); 
      $semillero->setFecha_creacion($fecha_creacion); 
      $semillero->setAval_dic_grupo($aval_dic_grupo); 
      $semillero->setAval_dic_sem($aval_dic_sem); 
      $semillero->setAval_dic_unidad($aval_dic_unidad); 
      $semillero->setGrupo_investigacion_id($grupo_investigacion_id); 
      $semillero->setUnidad_academica($unidad_academica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $semilleroDao =$FactoryDao->getsemilleroDao(self::getDataBaseDefault());
     $rtn = $semilleroDao->insert($semillero);
     $semilleroDao->close();
     return $rtn;
  }
  /**
   * Crea un objeto Semillero a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param sigla
   * @param fecha_creacion
   * @param aval_dic_grupo
   * @param aval_dic_sem
   * @param aval_dic_unidad
   * @param grupo_investigacion_id
   * @param unidad_academica
   */
 
  public static function insert_S(   $nombre,  $sigla,  $fecha_creacion,  $facultad,  $plan_estudios,  $grupo_investigacion_id,  $departamento){
      $semillero = new Semillero();
  
      $semillero->setNombre($nombre); 
      $semillero->setSigla($sigla); 
      $semillero->setFecha_creacion($fecha_creacion); 
      $semillero->setAval_dic_grupo($facultad); 
      $semillero->setAval_dic_sem($plan_estudios); 
      $semillero->setGrupo_investigacion_id($grupo_investigacion_id); 
      $semillero->setUnidad_academica($departamento); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $semilleroDao =$FactoryDao->getsemilleroDao(self::getDataBaseDefault());
     $rtn = $semilleroDao->insert_S($semillero);
     $semilleroDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Semillero de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $semillero = new Semillero();
      $semillero->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $semilleroDao =$FactoryDao->getsemilleroDao(self::getDataBaseDefault());
     $result = $semilleroDao->select($semillero);
     $semilleroDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Semillero  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param sigla
   * @param fecha_creacion
   * @param aval_dic_grupo
   * @param aval_dic_sem
   * @param aval_dic_unidad
   * @param grupo_investigacion_id
   * @param unidad_academica
   */
  public static function update($id, $nombre, $sigla, $fecha_creacion, $aval_dic_grupo, $aval_dic_sem, $aval_dic_unidad, $grupo_investigacion_id, $unidad_academica){
      $semillero = self::select($id);
      $semillero->setNombre($nombre); 
      $semillero->setSigla($sigla); 
      $semillero->setFecha_creacion($fecha_creacion); 
      $semillero->setAval_dic_grupo($aval_dic_grupo); 
      $semillero->setAval_dic_sem($aval_dic_sem); 
      $semillero->setAval_dic_unidad($aval_dic_unidad); 
      $semillero->setGrupo_investigacion_id($grupo_investigacion_id); 
      $semillero->setUnidad_academica($unidad_academica); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $semilleroDao =$FactoryDao->getsemilleroDao(self::getDataBaseDefault());
     $semilleroDao->update($semillero);
     $semilleroDao->close();
  }
  public static function update_Activar($id, $flag, $valor){
     
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $semilleroDao =$FactoryDao->getsemilleroDao(self::getDataBaseDefault());
     $result = $semilleroDao->update_Activar($id, $flag,$valor);
     $semilleroDao->close();
     return $result ;
  }

  /**
   * Elimina un objeto Semillero de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $semillero = new Semillero();
      $semillero->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $semilleroDao =$FactoryDao->getsemilleroDao(self::getDataBaseDefault());
     $semilleroDao->delete($semillero);
     $semilleroDao->close();
  }

  /**
   * Lista todos los objetos Semillero de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Semillero en base de datos o Null
   */
  public static function listAll_Pendiente(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $semilleroDao =$FactoryDao->getsemilleroDao(self::getDataBaseDefault());
     $result = $semilleroDao->listAll_Pendiente();
     $semilleroDao->close();
     return $result;
  }
  public static function listAll_id($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $semilleroDao =$FactoryDao->getsemilleroDao(self::getDataBaseDefault());
     $result = $semilleroDao->listAll_id($id);
     $semilleroDao->close();
     return $result;
  }
  public static function listAll_id_descrip($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $semilleroDao =$FactoryDao->getsemilleroDao(self::getDataBaseDefault());
     $result = $semilleroDao->listAll_id_descrip($id);
     $semilleroDao->close();
     return $result;
  }
  public static function listAll_docente($docente){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $semilleroDao =$FactoryDao->getsemilleroDao(self::getDataBaseDefault());
     $result = $semilleroDao->listAll_docente($docente);
     $semilleroDao->close();
     return $result;
  }


}
//That`s all folks!