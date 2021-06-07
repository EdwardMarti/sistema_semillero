<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En un lugar de La Mancha, de cuyo nombre no quiero acordarme...  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Estudiante.php');
require_once realpath('../dao/interfaz/IEstudianteDao.php');
require_once realpath('../dto/Persona.php');
require_once realpath('../dto/Tipo_docuemnto.php');

class EstudianteFacade {

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
   * Crea un objeto Estudiante a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param codigo
   * @param semestre
   * @param programa_academico
   * @param persona_id
   * @param num_documento
   * @param tipo_docuemnto_id
   */
  public static function insert(  $codigo,  $semestre,  $programa_academico,  $persona_id,  $num_documento,  $tipo_docuemnto_id){
      $estudiante = new Estudiante();
      $estudiante->setCodigo($codigo); 
      $estudiante->setSemestre($semestre); 
      $estudiante->setPrograma_academico($programa_academico); 
      $estudiante->setPersona_id($persona_id); 
      $estudiante->setNum_documento($num_documento); 
      $estudiante->setTipo_docuemnto_id($tipo_docuemnto_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $rtn = $estudianteDao->insert($estudiante);
     $estudianteDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Estudiante de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $estudiante = new Estudiante();
      $estudiante->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $result = $estudianteDao->select($estudiante);
     $estudianteDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Estudiante  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param codigo
   * @param semestre
   * @param programa_academico
   * @param persona_id
   * @param num_documento
   * @param tipo_docuemnto_id
   */
  public static function update($id, $codigo, $semestre, $programa_academico, $persona_id, $num_documento, $tipo_docuemnto_id){
      $estudiante = self::select($id);
      $estudiante->setCodigo($codigo); 
      $estudiante->setSemestre($semestre); 
      $estudiante->setPrograma_academico($programa_academico); 
      $estudiante->setPersona_id($persona_id); 
      $estudiante->setNum_documento($num_documento); 
      $estudiante->setTipo_docuemnto_id($tipo_docuemnto_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $result = $estudianteDao->update($estudiante);
     $estudianteDao->close();
     return $result;
  }

  /**
   * Elimina un objeto Estudiante de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $estudiante = new Estudiante();
      $estudiante->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $estudianteDao->delete($estudiante);
     $estudianteDao->close();
     return true;
  }

  /**
   * Lista todos los objetos Estudiante de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Estudiante en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $result = $estudianteDao->listAll();
     $estudianteDao->close();
     return $result;
  }
  public static function listAll_Semillero($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $result = $estudianteDao->listAll_Semillero($id);
     $estudianteDao->close();
     return $result;
  }


}
//That`s all folks!