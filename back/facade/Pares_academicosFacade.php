<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla del proyecto es no hacer preguntas  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Pares_academicos.php');
require_once realpath('../dao/interfaz/IPares_academicosDao.php');
require_once realpath('../dto/Persona.php');
require_once realpath('../dto/Tipo_docuemnto.php');

class Pares_academicosFacade {

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
   * Crea un objeto Pares_academicos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param inst_empresa
   * @param persona_id
   * @param numero_docuemnto
   * @param tipo_docuemnto_id
   */
  public static function insert( $id,  $inst_empresa,  $persona_id,  $numero_docuemnto,  $tipo_docuemnto_id){
      $pares_academicos = new Pares_academicos();
      $pares_academicos->setId($id); 
      $pares_academicos->setInst_empresa($inst_empresa); 
      $pares_academicos->setPersona_id($persona_id); 
      $pares_academicos->setNumero_docuemnto($numero_docuemnto); 
      $pares_academicos->setTipo_docuemnto_id($tipo_docuemnto_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $pares_academicosDao =$FactoryDao->getpares_academicosDao(self::getDataBaseDefault());
     $rtn = $pares_academicosDao->insert($pares_academicos);
     $pares_academicosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Pares_academicos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $pares_academicos = new Pares_academicos();
      $pares_academicos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $pares_academicosDao =$FactoryDao->getpares_academicosDao(self::getDataBaseDefault());
     $result = $pares_academicosDao->select($pares_academicos);
     $pares_academicosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Pares_academicos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param inst_empresa
   * @param persona_id
   * @param numero_docuemnto
   * @param tipo_docuemnto_id
   */
  public static function update($id, $inst_empresa, $persona_id, $numero_docuemnto, $tipo_docuemnto_id){
      $pares_academicos = self::select($id);
      $pares_academicos->setInst_empresa($inst_empresa); 
      $pares_academicos->setPersona_id($persona_id); 
      $pares_academicos->setNumero_docuemnto($numero_docuemnto); 
      $pares_academicos->setTipo_docuemnto_id($tipo_docuemnto_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $pares_academicosDao =$FactoryDao->getpares_academicosDao(self::getDataBaseDefault());
     $pares_academicosDao->update($pares_academicos);
     $pares_academicosDao->close();
  }

  /**
   * Elimina un objeto Pares_academicos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $pares_academicos = new Pares_academicos();
      $pares_academicos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $pares_academicosDao =$FactoryDao->getpares_academicosDao(self::getDataBaseDefault());
     $pares_academicosDao->delete($pares_academicos);
     $pares_academicosDao->close();
  }

  /**
   * Lista todos los objetos Pares_academicos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Pares_academicos en base de datos o Null
   */
  public static function listAll($semillero_id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $pares_academicosDao =$FactoryDao->getpares_academicosDao(self::getDataBaseDefault());
     $result = $pares_academicosDao->listAll_id($semillero_id);
     $pares_academicosDao->close();
     return $result;
  }


}
//That`s all folks!