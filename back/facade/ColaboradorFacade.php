<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo.   \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Colaborador.php');
require_once realpath('../dao/interfaz/IColaboradorDao.php');
require_once realpath('../dto/Proyectos.php');

class ColaboradorFacade {

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
   * Crea un objeto Colaborador a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param codigo
   * @param tp_colaborador
   * @param proyectos_id
   */
  public static function insert( $id,  $nombre,  $codigo,  $tp_colaborador,  $proyectos_id){
      $colaborador = new Colaborador();
      $colaborador->setId($id); 
      $colaborador->setNombre($nombre); 
      $colaborador->setCodigo($codigo); 
      $colaborador->setTp_colaborador($tp_colaborador); 
      $colaborador->setProyectos_id($proyectos_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $colaboradorDao =$FactoryDao->getcolaboradorDao(self::getDataBaseDefault());
     $rtn = $colaboradorDao->insert($colaborador);
     $colaboradorDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Colaborador de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $colaborador = new Colaborador();
      $colaborador->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $colaboradorDao =$FactoryDao->getcolaboradorDao(self::getDataBaseDefault());
     $result = $colaboradorDao->select($colaborador);
     $colaboradorDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Colaborador  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param codigo
   * @param tp_colaborador
   * @param proyectos_id
   */
  public static function update($id, $nombre, $codigo, $tp_colaborador, $proyectos_id){
      $colaborador = self::select($id);
      $colaborador->setNombre($nombre); 
      $colaborador->setCodigo($codigo); 
      $colaborador->setTp_colaborador($tp_colaborador); 
      $colaborador->setProyectos_id($proyectos_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $colaboradorDao =$FactoryDao->getcolaboradorDao(self::getDataBaseDefault());
     $colaboradorDao->update($colaborador);
     $colaboradorDao->close();
  }

  /**
   * Elimina un objeto Colaborador de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $colaborador = new Colaborador();
      $colaborador->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $colaboradorDao =$FactoryDao->getcolaboradorDao(self::getDataBaseDefault());
     $colaboradorDao->delete($colaborador);
     $colaboradorDao->close();
  }

  /**
   * Lista todos los objetos Colaborador de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Colaborador en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $colaboradorDao =$FactoryDao->getcolaboradorDao(self::getDataBaseDefault());
     $result = $colaboradorDao->listAll();
     $colaboradorDao->close();
     return $result;
  }


}
//That`s all folks!