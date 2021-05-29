<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Me han encontrado! ¡No sé cómo pero me han encontrado!  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Estado_proyecto.php');
require_once realpath('../dao/interfaz/IEstado_proyectoDao.php');

class Estado_proyectoFacade {

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
   * Crea un objeto Estado_proyecto a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function insert( $id,  $descripcion){
      $estado_proyecto = new Estado_proyecto();
      $estado_proyecto->setId($id); 
      $estado_proyecto->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estado_proyectoDao =$FactoryDao->getestado_proyectoDao(self::getDataBaseDefault());
     $rtn = $estado_proyectoDao->insert($estado_proyecto);
     $estado_proyectoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Estado_proyecto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $estado_proyecto = new Estado_proyecto();
      $estado_proyecto->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estado_proyectoDao =$FactoryDao->getestado_proyectoDao(self::getDataBaseDefault());
     $result = $estado_proyectoDao->select($estado_proyecto);
     $estado_proyectoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Estado_proyecto  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function update($id, $descripcion){
      $estado_proyecto = self::select($id);
      $estado_proyecto->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estado_proyectoDao =$FactoryDao->getestado_proyectoDao(self::getDataBaseDefault());
     $estado_proyectoDao->update($estado_proyecto);
     $estado_proyectoDao->close();
  }

  /**
   * Elimina un objeto Estado_proyecto de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $estado_proyecto = new Estado_proyecto();
      $estado_proyecto->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estado_proyectoDao =$FactoryDao->getestado_proyectoDao(self::getDataBaseDefault());
     $estado_proyectoDao->delete($estado_proyecto);
     $estado_proyectoDao->close();
  }

  /**
   * Lista todos los objetos Estado_proyecto de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Estado_proyecto en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estado_proyectoDao =$FactoryDao->getestado_proyectoDao(self::getDataBaseDefault());
     $result = $estado_proyectoDao->listAll();
     $estado_proyectoDao->close();
     return $result;
  }


}
//That`s all folks!