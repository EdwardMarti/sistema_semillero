<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Quédate con quien te quiera por tu back-end, no por tu front-end  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Facultad.php');
require_once realpath('../dao/interfaz/IFacultadDao.php');

class FacultadFacade {

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
   * Crea un objeto Facultad a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function insert($descripcion){
      $facultad = new Facultad();
      $facultad->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facultadDao =$FactoryDao->getfacultadDao(self::getDataBaseDefault());
     $rtn = $facultadDao->insert($facultad);
     $facultadDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Facultad de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $facultad = new Facultad();
      $facultad->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facultadDao =$FactoryDao->getfacultadDao(self::getDataBaseDefault());
     $result = $facultadDao->select($facultad);
     $facultadDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Facultad  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param descripcion
   */
  public static function update($id, $descripcion){
      $facultad = self::select($id);
      $facultad->setDescripcion($descripcion); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facultadDao =$FactoryDao->getfacultadDao(self::getDataBaseDefault());
     $facultadDao->update($facultad);
     $facultadDao->close();
  }

  /**
   * Elimina un objeto Facultad de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      try {
        $facultad = new Facultad();
        $facultad->setId($id); 
    
        $FactoryDao=new FactoryDao(self::getGestorDefault());
        $facultadDao =$FactoryDao->getfacultadDao(self::getDataBaseDefault());
        $facultadDao->delete($facultad);
        $facultadDao->close();
        return true;
      } catch (Exception $e) {
          return false;
      }
     
  }

  /**
   * Lista todos los objetos Facultad de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Facultad en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $facultadDao =$FactoryDao->getfacultadDao(self::getDataBaseDefault());
     $result = $facultadDao->listAll();
     $facultadDao->close();
     return $result;
  }


}
//That`s all folks!