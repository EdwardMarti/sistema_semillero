<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nuestra empresa cuenta con una división sólo para las frases. Disfrútalas  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Persona.php');
require_once realpath('../dao/interfaz/IPersonaDao.php');
require_once realpath('../dto/Perfiles.php');

class PersonaFacade {

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
   * Crea un objeto Persona a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param telefono
   * @param correo
   * @param perfiles_id
   */
  public static function insert(   $nombre,  $telefono,  $correo,  $perfiles_id){
      $persona = new Persona();
      $persona->setNombre($nombre); 
      $persona->setTelefono($telefono); 
      $persona->setCorreo($correo); 
      $persona->setPerfiles_id($perfiles_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $rtn = $personaDao->insert($persona);
     $personaDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Persona de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $persona = new Persona();
      $persona->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->select($persona);
     $personaDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Persona  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param telefono
   * @param correo
   * @param perfiles_id
   */
  public static function update($id, $nombre, $telefono, $correo, $perfiles_id){
      $persona = self::select($id);
      $persona->setNombre($nombre); 
      $persona->setTelefono($telefono); 
      $persona->setCorreo($correo); 
      $persona->setPerfiles_id($perfiles_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $personaDao->update($persona);
     $personaDao->close();
  }
  
  public static function update2($id, $nombre, $telefono, $correo){


     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
    $result =  $personaDao->update2($id, $nombre, $telefono, $correo);
     $personaDao->close();
     return $result ;
  }

  /**
   * Elimina un objeto Persona de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $persona = new Persona();
      $persona->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $personaDao->delete($persona);
     $personaDao->close();
  }

  /**
   * Lista todos los objetos Persona de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Persona en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $personaDao =$FactoryDao->getpersonaDao(self::getDataBaseDefault());
     $result = $personaDao->listAll();
     $personaDao->close();
     return $result;
  }


}
//That`s all folks!