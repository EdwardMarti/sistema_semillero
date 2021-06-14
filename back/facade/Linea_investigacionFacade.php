<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Linea_investigacion.php');
require_once realpath('../dao/interfaz/ILinea_investigacionDao.php');
require_once realpath('../dto/Disciplina.php');

class Linea_investigacionFacade {

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
   * Crea un objeto Linea_investigacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param lider
   * @param disciplina_id
   */
  public static function insert(  $descripcion,  $lider,  $disciplina_id){
      $linea_investigacion = new Linea_investigacion();
//      $linea_investigacion->setId($id); 
      $linea_investigacion->setDescripcion($descripcion); 
      $linea_investigacion->setLider($lider); 
      $linea_investigacion->setDisciplina_id($disciplina_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $linea_investigacionDao =$FactoryDao->getlinea_investigacionDao(self::getDataBaseDefault());
     $rtn = $linea_investigacionDao->insert($linea_investigacion);
     $linea_investigacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Linea_investigacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $linea_investigacion = new Linea_investigacion();
      $linea_investigacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $linea_investigacionDao =$FactoryDao->getlinea_investigacionDao(self::getDataBaseDefault());
     $result = $linea_investigacionDao->select($linea_investigacion);
     $linea_investigacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Linea_investigacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param lider
   * @param disciplina_id
   */
  public static function update($id, $descripcion, $lider, $disciplina_id){
      $linea_investigacion = self::select($id);
      $linea_investigacion->setDescripcion($descripcion); 
      $linea_investigacion->setLider($lider); 
      $linea_investigacion->setDisciplina_id($disciplina_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $linea_investigacionDao =$FactoryDao->getlinea_investigacionDao(self::getDataBaseDefault());
     $linea_investigacionDao->update($linea_investigacion);
     $linea_investigacionDao->close();
  }

  /**
   * Elimina un objeto Linea_investigacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $linea_investigacion = new Linea_investigacion();
      $linea_investigacion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $linea_investigacionDao =$FactoryDao->getlinea_investigacionDao(self::getDataBaseDefault());
     $linea_investigacionDao->delete($linea_investigacion);
     $linea_investigacionDao->close();
  }

  /**
   * Lista todos los objetos Linea_investigacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Linea_investigacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $linea_investigacionDao =$FactoryDao->getlinea_investigacionDao(self::getDataBaseDefault());
     $result = $linea_investigacionDao->listAll();
     $linea_investigacionDao->close();
     return $result;
  }
  public static function listAll_id($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $linea_investigacionDao =$FactoryDao->getlinea_investigacionDao(self::getDataBaseDefault());
     $result = $linea_investigacionDao->listAll_id($id);
     $linea_investigacionDao->close();
     return $result;
  }
  public static function listAll_id_linea($plan,$linea){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $linea_investigacionDao =$FactoryDao->getlinea_investigacionDao(self::getDataBaseDefault());
     $result = $linea_investigacionDao->listAll_id_linea($plan,$linea);
     $linea_investigacionDao->close();
     return $result;
  }


}
//That`s all folks!