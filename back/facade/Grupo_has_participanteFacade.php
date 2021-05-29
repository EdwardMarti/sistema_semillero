<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    404 Frase no encontrada  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Grupo_has_participante.php');
require_once realpath('../dao/interfaz/IGrupo_has_participanteDao.php');
require_once realpath('../dto/Grupo_investigacion.php');

class Grupo_has_participanteFacade {

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
   * Crea un objeto Grupo_has_participante a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param participantes_id
   * @param grupo_investigacion_id
   */
  public static function insert( $id,  $participantes_id,  $grupo_investigacion_id){
      $grupo_has_participante = new Grupo_has_participante();
      $grupo_has_participante->setId($id); 
      $grupo_has_participante->setParticipantes_id($participantes_id); 
      $grupo_has_participante->setGrupo_investigacion_id($grupo_investigacion_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_has_participanteDao =$FactoryDao->getgrupo_has_participanteDao(self::getDataBaseDefault());
     $rtn = $grupo_has_participanteDao->insert($grupo_has_participante);
     $grupo_has_participanteDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Grupo_has_participante de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $grupo_has_participante = new Grupo_has_participante();
      $grupo_has_participante->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_has_participanteDao =$FactoryDao->getgrupo_has_participanteDao(self::getDataBaseDefault());
     $result = $grupo_has_participanteDao->select($grupo_has_participante);
     $grupo_has_participanteDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Grupo_has_participante  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param participantes_id
   * @param grupo_investigacion_id
   */
  public static function update($id, $participantes_id, $grupo_investigacion_id){
      $grupo_has_participante = self::select($id);
      $grupo_has_participante->setParticipantes_id($participantes_id); 
      $grupo_has_participante->setGrupo_investigacion_id($grupo_investigacion_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_has_participanteDao =$FactoryDao->getgrupo_has_participanteDao(self::getDataBaseDefault());
     $grupo_has_participanteDao->update($grupo_has_participante);
     $grupo_has_participanteDao->close();
  }

  /**
   * Elimina un objeto Grupo_has_participante de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $grupo_has_participante = new Grupo_has_participante();
      $grupo_has_participante->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_has_participanteDao =$FactoryDao->getgrupo_has_participanteDao(self::getDataBaseDefault());
     $grupo_has_participanteDao->delete($grupo_has_participante);
     $grupo_has_participanteDao->close();
  }

  /**
   * Lista todos los objetos Grupo_has_participante de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Grupo_has_participante en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $grupo_has_participanteDao =$FactoryDao->getgrupo_has_participanteDao(self::getDataBaseDefault());
     $result = $grupo_has_participanteDao->listAll();
     $grupo_has_participanteDao->close();
     return $result;
  }


}
//That`s all folks!