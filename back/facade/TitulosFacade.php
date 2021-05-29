<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Titulos.php');
require_once realpath('../dao/interfaz/ITitulosDao.php');
require_once realpath('../dto/Docente.php');

class TitulosFacade {

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
   * Crea un objeto Titulos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param universidad_id
   * @param docente_id
   */
  public static function insert( $id,  $descripcion,  $universidad_id,  $docente_id){
      $titulos = new Titulos();
      $titulos->setId($id); 
      $titulos->setDescripcion($descripcion); 
      $titulos->setUniversidad_id($universidad_id); 
      $titulos->setDocente_id($docente_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $titulosDao =$FactoryDao->gettitulosDao(self::getDataBaseDefault());
     $rtn = $titulosDao->insert($titulos);
     $titulosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Titulos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $titulos = new Titulos();
      $titulos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $titulosDao =$FactoryDao->gettitulosDao(self::getDataBaseDefault());
     $result = $titulosDao->select($titulos);
     $titulosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Titulos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param universidad_id
   * @param docente_id
   */
  public static function update($id, $descripcion, $universidad_id, $docente_id){
      $titulos = self::select($id);
      $titulos->setDescripcion($descripcion); 
      $titulos->setUniversidad_id($universidad_id); 
      $titulos->setDocente_id($docente_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $titulosDao =$FactoryDao->gettitulosDao(self::getDataBaseDefault());
     $titulosDao->update($titulos);
     $titulosDao->close();
  }

  /**
   * Elimina un objeto Titulos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $titulos = new Titulos();
      $titulos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $titulosDao =$FactoryDao->gettitulosDao(self::getDataBaseDefault());
     $titulosDao->delete($titulos);
     $titulosDao->close();
  }

  /**
   * Lista todos los objetos Titulos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Titulos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $titulosDao =$FactoryDao->gettitulosDao(self::getDataBaseDefault());
     $result = $titulosDao->listAll();
     $titulosDao->close();
     return $result;
  }


}
//That`s all folks!