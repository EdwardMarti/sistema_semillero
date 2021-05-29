<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ͡~ ͜ʖ ͡°)  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Plan_estudios.php');
require_once realpath('../dao/interfaz/IPlan_estudiosDao.php');
require_once realpath('../dto/Departamento.php');

class Plan_estudiosFacade {

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
   * Crea un objeto Plan_estudios a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param departamento_id
   */
  public static function insert(   $descripcion,  $departamento_id){
      $plan_estudios = new Plan_estudios();
      
      $plan_estudios->setDescripcion($descripcion); 
      $plan_estudios->setDepartamento_id($departamento_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_estudiosDao =$FactoryDao->getplan_estudiosDao(self::getDataBaseDefault());
     $rtn = $plan_estudiosDao->insert($plan_estudios);
     $plan_estudiosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Plan_estudios de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $plan_estudios = new Plan_estudios();
      $plan_estudios->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_estudiosDao =$FactoryDao->getplan_estudiosDao(self::getDataBaseDefault());
     $result = $plan_estudiosDao->select($plan_estudios);
     $plan_estudiosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Plan_estudios  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param departamento_id
   */
  public static function update($id, $descripcion, $departamento_id){
      $plan_estudios = self::select($id);
      $plan_estudios->setDescripcion($descripcion); 
      $plan_estudios->setDepartamento_id($departamento_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_estudiosDao =$FactoryDao->getplan_estudiosDao(self::getDataBaseDefault());
     $plan_estudiosDao->update($plan_estudios);
     $plan_estudiosDao->close();
  }

  /**
   * Elimina un objeto Plan_estudios de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $plan_estudios = new Plan_estudios();
      $plan_estudios->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_estudiosDao =$FactoryDao->getplan_estudiosDao(self::getDataBaseDefault());
     $plan_estudiosDao->delete($plan_estudios);
     $plan_estudiosDao->close();
  }

  /**
   * Lista todos los objetos Plan_estudios de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Plan_estudios en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_estudiosDao =$FactoryDao->getplan_estudiosDao(self::getDataBaseDefault());
     $result = $plan_estudiosDao->listAll();
     $plan_estudiosDao->close();
     return $result;
  }
  /**
   * Lista todos los objetos Plan_estudios de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Plan_estudios en base de datos o Null
   */
  public static function listAll_id($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_estudiosDao =$FactoryDao->getplan_estudiosDao(self::getDataBaseDefault());
     $result = $plan_estudiosDao->listAll_id($id);
     $plan_estudiosDao->close();
     return $result;
  }


}
//That`s all folks!