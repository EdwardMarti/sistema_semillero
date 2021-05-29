<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Persona_has_grupo.php');
require_once realpath('../dao/interfaz/IPersona_has_grupoDao.php');
require_once realpath('../dto/Grupo_investigacion.php');
require_once realpath('../dto/Persona.php');

class Persona_has_grupoFacade {

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
   * Crea un objeto Persona_has_grupo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param grupo_investigacion_id
   * @param persona_id
   */
  public static function insert( $id,  $grupo_investigacion_id,  $persona_id){
      $persona_has_grupo = new Persona_has_grupo();
      $persona_has_grupo->setId($id); 
      $persona_has_grupo->setGrupo_investigacion_id($grupo_investigacion_id); 
      $persona_has_grupo->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_grupoDao =$FactoryDao->getpersona_has_grupoDao(self::getDataBaseDefault());
     $rtn = $persona_has_grupoDao->insert($persona_has_grupo);
     $persona_has_grupoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Persona_has_grupo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $persona_has_grupo = new Persona_has_grupo();
      $persona_has_grupo->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_grupoDao =$FactoryDao->getpersona_has_grupoDao(self::getDataBaseDefault());
     $result = $persona_has_grupoDao->select($persona_has_grupo);
     $persona_has_grupoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Persona_has_grupo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param grupo_investigacion_id
   * @param persona_id
   */
  public static function update($id, $grupo_investigacion_id, $persona_id){
      $persona_has_grupo = self::select($id);
      $persona_has_grupo->setGrupo_investigacion_id($grupo_investigacion_id); 
      $persona_has_grupo->setPersona_id($persona_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_grupoDao =$FactoryDao->getpersona_has_grupoDao(self::getDataBaseDefault());
     $persona_has_grupoDao->update($persona_has_grupo);
     $persona_has_grupoDao->close();
  }

  /**
   * Elimina un objeto Persona_has_grupo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $persona_has_grupo = new Persona_has_grupo();
      $persona_has_grupo->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_grupoDao =$FactoryDao->getpersona_has_grupoDao(self::getDataBaseDefault());
     $persona_has_grupoDao->delete($persona_has_grupo);
     $persona_has_grupoDao->close();
  }

  /**
   * Lista todos los objetos Persona_has_grupo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Persona_has_grupo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $persona_has_grupoDao =$FactoryDao->getpersona_has_grupoDao(self::getDataBaseDefault());
     $result = $persona_has_grupoDao->listAll();
     $persona_has_grupoDao->close();
     return $result;
  }


}
//That`s all folks!