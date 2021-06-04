<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿No es más sencillo hacer todo en el Main?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Departamento.php');
require_once realpath('../dao/interfaz/IDepartamentoDao.php');
require_once realpath('../dto/Facultad.php');

class DepartamentoFacade {

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
   * Crea un objeto Departamento a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param facultad_id
   */
  public static function insert(  $descripcion,  $facultad_id){
      $departamento = new Departamento();
  
      $departamento->setDescripcion($descripcion); 
      $departamento->setFacultad_id($facultad_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $rtn = $departamentoDao->insert($departamento);
     $departamentoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Departamento de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $departamento = new Departamento();
      $departamento->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $result = $departamentoDao->select($departamento);
     $departamentoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Departamento  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param facultad_id
   */
  public static function update($id, $descripcion, $facultad_id){
      $departamento = self::select($id);
      $departamento->setDescripcion($descripcion); 
      $departamento->setFacultad_id($facultad_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $departamentoDao->update($departamento);
     $departamentoDao->close();
  }

  /**
   * Elimina un objeto Departamento de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $departamento = new Departamento();
      $departamento->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $departamentoDao->delete($departamento);
     $departamentoDao->close();
  }

  /**
   * Lista todos los objetos Departamento de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Departamento en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $result = $departamentoDao->listAll();
     $departamentoDao->close();
     return $result;
  }
  /**
   * Lista todos los objetos Departamento de la base de datos por Id.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Departamento en base de datos o Null
   */
  public static function listAll_id($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $result = $departamentoDao->listAll_id($id);
     $departamentoDao->close();
     return $result;
  }
 public static function listAll_idRpta($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $departamentoDao =$FactoryDao->getdepartamentoDao(self::getDataBaseDefault());
     $result = $departamentoDao->listAll_idRpta($id);
     $departamentoDao->close();
     return $result;
  }

}
//That`s all folks!