<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me ayudas con la tesis?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Area.php');
require_once realpath('../dao/interfaz/IAreaDao.php');

class AreaFacade {

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
   * Crea un objeto Area a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function insert( $id,  $descripcion){
      $area = new Area();
      $area->setId($id); 
      $area->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $areaDao =$FactoryDao->getareaDao(self::getDataBaseDefault());
     $rtn = $areaDao->insert($area);
     $areaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Area de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $area = new Area();
      $area->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $areaDao =$FactoryDao->getareaDao(self::getDataBaseDefault());
     $result = $areaDao->select($area);
     $areaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Area  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function update($id, $descripcion){
      $area = self::select($id);
      $area->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $areaDao =$FactoryDao->getareaDao(self::getDataBaseDefault());
     $areaDao->update($area);
     $areaDao->close();
  }

  /**
   * Elimina un objeto Area de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $area = new Area();
      $area->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $areaDao =$FactoryDao->getareaDao(self::getDataBaseDefault());
     $areaDao->delete($area);
     $areaDao->close();
  }

  /**
   * Lista todos los objetos Area de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Area en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $areaDao =$FactoryDao->getareaDao(self::getDataBaseDefault());
     $result = $areaDao->listAll();
     $areaDao->close();
     return $result;
  }


}
//That`s all folks!