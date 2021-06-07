<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No es una cola ni es una pila, es tu proyecto que no compila  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Docente.php');
require_once realpath('../dao/interfaz/IDocenteDao.php');
require_once realpath('../dto/Persona.php');
require_once realpath('../dto/Tipo_vinculacion.php');

class DocenteFacade {

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
   * Crea un objeto Docente a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param persona_id
   * @param password
   * @param tipo_vinculacion_id
   * @param ubicacion
   */
  public static function insert(  $persona_id,  $password,  $tipo_vinculacion_id,  $ubicacion){
      $docente = new Docente();
//      $docente->setId($id); 
      $docente->setPersona_id($persona_id); 
      $docente->setPassword($password); 
      $docente->setTipo_vinculacion_id($tipo_vinculacion_id); 
      $docente->setUbicacion($ubicacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $docenteDao =$FactoryDao->getdocenteDao(self::getDataBaseDefault());
     $rtn = $docenteDao->insert($docente);
     $docenteDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Docente de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $docente = new Docente();
      $docente->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $docenteDao =$FactoryDao->getdocenteDao(self::getDataBaseDefault());
     $result = $docenteDao->select($docente);
     $docenteDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Docente  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param persona_id
   * @param password
   * @param tipo_vinculacion_id
   * @param ubicacion
   */
  public static function update($id, $persona_id, $password, $tipo_vinculacion_id, $ubicacion){
      $docente = self::select($id);
      $docente->setPersona_id($persona_id); 
      $docente->setPassword($password); 
      $docente->setTipo_vinculacion_id($tipo_vinculacion_id); 
      $docente->setUbicacion($ubicacion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $docenteDao =$FactoryDao->getdocenteDao(self::getDataBaseDefault());
     $docenteDao->update($docente);
     $docenteDao->close();
  }
  public static function update2( $persona_id,  $tipo_vinculacion_id, $ubicacion){
   
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $docenteDao =$FactoryDao->getdocenteDao(self::getDataBaseDefault());
    $result =  $docenteDao->update2($persona_id,  $tipo_vinculacion_id, $ubicacion);
     $docenteDao->close();
     return $result ;
  }

  /**
   * Elimina un objeto Docente de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $docente = new Docente();
      $docente->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $docenteDao =$FactoryDao->getdocenteDao(self::getDataBaseDefault());
     $docenteDao->delete($docente);
     $docenteDao->close();
  }

  /**
   * Lista todos los objetos Docente de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Docente en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $docenteDao =$FactoryDao->getdocenteDao(self::getDataBaseDefault());
     $result = $docenteDao->listAll();
     $docenteDao->close();
     return $result;
  }


}
//That`s all folks!