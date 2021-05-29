<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La noche está estrellada, y tiritan, azules, los astros, a lo lejos  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Plan_accion.php');
require_once realpath('../dao/interfaz/IPlan_accionDao.php');
require_once realpath('../dto/Semillero.php');
require_once realpath('../dto/Proyectos.php');
require_once realpath('../dto/Capacitaciones.php');
require_once realpath('../dto/Otras_actividades.php');

class Plan_accionFacade {

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
   * Crea un objeto Plan_accion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param semestre
   * @param ano
   * @param vbo_dirSemillero
   * @param vbo_dirGinvestigacion
   * @param vbo_facultaInv
   * @param semillero_id
   * @param proyectos_id
   * @param capacitaciones_id
   * @param otras_actividades_id
   */
  public static function insert( $id,  $semestre,  $ano,  $vbo_dirSemillero,  $vbo_dirGinvestigacion,  $vbo_facultaInv,  $semillero_id,  $proyectos_id,  $capacitaciones_id,  $otras_actividades_id){
      $plan_accion = new Plan_accion();
      $plan_accion->setId($id); 
      $plan_accion->setSemestre($semestre); 
      $plan_accion->setAno($ano); 
      $plan_accion->setVbo_dirSemillero($vbo_dirSemillero); 
      $plan_accion->setVbo_dirGinvestigacion($vbo_dirGinvestigacion); 
      $plan_accion->setVbo_facultaInv($vbo_facultaInv); 
      $plan_accion->setSemillero_id($semillero_id); 
      $plan_accion->setProyectos_id($proyectos_id); 
      $plan_accion->setCapacitaciones_id($capacitaciones_id); 
      $plan_accion->setOtras_actividades_id($otras_actividades_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_accionDao =$FactoryDao->getplan_accionDao(self::getDataBaseDefault());
     $rtn = $plan_accionDao->insert($plan_accion);
     $plan_accionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Plan_accion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $plan_accion = new Plan_accion();
      $plan_accion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_accionDao =$FactoryDao->getplan_accionDao(self::getDataBaseDefault());
     $result = $plan_accionDao->select($plan_accion);
     $plan_accionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Plan_accion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param semestre
   * @param ano
   * @param vbo_dirSemillero
   * @param vbo_dirGinvestigacion
   * @param vbo_facultaInv
   * @param semillero_id
   * @param proyectos_id
   * @param capacitaciones_id
   * @param otras_actividades_id
   */
  public static function update($id, $semestre, $ano, $vbo_dirSemillero, $vbo_dirGinvestigacion, $vbo_facultaInv, $semillero_id, $proyectos_id, $capacitaciones_id, $otras_actividades_id){
      $plan_accion = self::select($id);
      $plan_accion->setSemestre($semestre); 
      $plan_accion->setAno($ano); 
      $plan_accion->setVbo_dirSemillero($vbo_dirSemillero); 
      $plan_accion->setVbo_dirGinvestigacion($vbo_dirGinvestigacion); 
      $plan_accion->setVbo_facultaInv($vbo_facultaInv); 
      $plan_accion->setSemillero_id($semillero_id); 
      $plan_accion->setProyectos_id($proyectos_id); 
      $plan_accion->setCapacitaciones_id($capacitaciones_id); 
      $plan_accion->setOtras_actividades_id($otras_actividades_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_accionDao =$FactoryDao->getplan_accionDao(self::getDataBaseDefault());
     $plan_accionDao->update($plan_accion);
     $plan_accionDao->close();
  }

  /**
   * Elimina un objeto Plan_accion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $plan_accion = new Plan_accion();
      $plan_accion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_accionDao =$FactoryDao->getplan_accionDao(self::getDataBaseDefault());
     $plan_accionDao->delete($plan_accion);
     $plan_accionDao->close();
  }

  /**
   * Lista todos los objetos Plan_accion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Plan_accion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $plan_accionDao =$FactoryDao->getplan_accionDao(self::getDataBaseDefault());
     $result = $plan_accionDao->listAll();
     $plan_accionDao->close();
     return $result;
  }


}
//That`s all folks!