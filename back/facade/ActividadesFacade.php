<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Actividades.php');
require_once realpath('../dao/interfaz/IActividadesDao.php');
require_once realpath('../dto/Proyectos.php');

class ActividadesFacade {

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
   * Crea un objeto Actividades a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param proyectos_id
   */
  public static function insert( $id,  $descripcion,  $proyectos_id){
      $actividades = new Actividades();
      $actividades->setId($id); 
      $actividades->setDescripcion($descripcion); 
      $actividades->setProyectos_id($proyectos_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividadesDao =$FactoryDao->getactividadesDao(self::getDataBaseDefault());
     $rtn = $actividadesDao->insert($actividades);
     $actividadesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Actividades de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $actividades = new Actividades();
      $actividades->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividadesDao =$FactoryDao->getactividadesDao(self::getDataBaseDefault());
     $result = $actividadesDao->select($actividades);
     $actividadesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Actividades  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param proyectos_id
   */
  public static function update($id, $descripcion, $proyectos_id){
      $actividades = self::select($id);
      $actividades->setDescripcion($descripcion); 
      $actividades->setProyectos_id($proyectos_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividadesDao =$FactoryDao->getactividadesDao(self::getDataBaseDefault());
     $actividadesDao->update($actividades);
     $actividadesDao->close();
  }

  /**
   * Elimina un objeto Actividades de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $actividades = new Actividades();
      $actividades->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividadesDao =$FactoryDao->getactividadesDao(self::getDataBaseDefault());
     $actividadesDao->delete($actividades);
     $actividadesDao->close();
  }

  /**
   * Lista todos los objetos Actividades de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Actividades en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $actividadesDao =$FactoryDao->getactividadesDao(self::getDataBaseDefault());
     $result = $actividadesDao->listAll();
     $actividadesDao->close();
     return $result;
  }


}
//That`s all folks!