<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No dejes el código del futuro en manos humanas  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Disciplina.php');
require_once realpath('../dao/interfaz/IDisciplinaDao.php');
require_once realpath('../dto/Area.php');

class DisciplinaFacade {

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
   * Crea un objeto Disciplina a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param area_id
   */
  public static function insert( $id,  $descripcion,  $area_id){
      $disciplina = new Disciplina();
      $disciplina->setId($id); 
      $disciplina->setDescripcion($descripcion); 
      $disciplina->setArea_id($area_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $disciplinaDao =$FactoryDao->getdisciplinaDao(self::getDataBaseDefault());
     $rtn = $disciplinaDao->insert($disciplina);
     $disciplinaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Disciplina de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $disciplina = new Disciplina();
      $disciplina->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $disciplinaDao =$FactoryDao->getdisciplinaDao(self::getDataBaseDefault());
     $result = $disciplinaDao->select($disciplina);
     $disciplinaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Disciplina  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   * @param area_id
   */
  public static function update($id, $descripcion, $area_id){
      $disciplina = self::select($id);
      $disciplina->setDescripcion($descripcion); 
      $disciplina->setArea_id($area_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $disciplinaDao =$FactoryDao->getdisciplinaDao(self::getDataBaseDefault());
     $disciplinaDao->update($disciplina);
     $disciplinaDao->close();
  }

  /**
   * Elimina un objeto Disciplina de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $disciplina = new Disciplina();
      $disciplina->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $disciplinaDao =$FactoryDao->getdisciplinaDao(self::getDataBaseDefault());
     $disciplinaDao->delete($disciplina);
     $disciplinaDao->close();
  }

  /**
   * Lista todos los objetos Disciplina de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Disciplina en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $disciplinaDao =$FactoryDao->getdisciplinaDao(self::getDataBaseDefault());
     $result = $disciplinaDao->listAll();
     $disciplinaDao->close();
     return $result;
  }
  public static function listAll_id($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $disciplinaDao =$FactoryDao->getdisciplinaDao(self::getDataBaseDefault());
     $result = $disciplinaDao->listAll_id($id);
     $disciplinaDao->close();
     return $result;
  }


}
//That`s all folks!