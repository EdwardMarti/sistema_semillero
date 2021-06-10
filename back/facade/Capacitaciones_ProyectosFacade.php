<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Capacitaciones_Proyectos.php');
require_once realpath('../dao/interfaz/ICapacitaciones_ProyectosDao.php');






class Capacitaciones_ProyectosFacade {

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
   * Crea un objeto Capacitaciones_Proyectos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param tema
   * @param docente
   * @param fecha
   * @param cant_capacitados
   * @param semillero_id
   * @param objetivo
   */
  public static function insert(   $tema,  $docente,  $fecha,  $cant_capacitados,  $proyecto_id,  $objetivo,$responsable){
      $capacitaciones_Proyectos = new Capacitaciones_Proyectos();
//      $capacitaciones_Proyectos->setId($id); 
      $capacitaciones_Proyectos->setTema($tema); 
      $capacitaciones_Proyectos->setDocente($docente); 
      $capacitaciones_Proyectos->setFecha($fecha); 
      $capacitaciones_Proyectos->setCant_capacitados($cant_capacitados); 
      $capacitaciones_Proyectos->setProyecto_id($proyecto_id); 
      $capacitaciones_Proyectos->setObjetivo($objetivo); 
      $capacitaciones_Proyectos->setResponsable($responsable); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitaciones_ProyectosDao =$FactoryDao->getcapacitaciones_ProyectosDao(self::getDataBaseDefault());
     $rtn = $capacitaciones_ProyectosDao->insert($capacitaciones_Proyectos);
     $capacitaciones_ProyectosDao->close();
     return $rtn;
  }
  
  


  /**
   * Selecciona un objeto Capacitaciones_Proyectos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $capacitaciones_Proyectos = new Capacitaciones_Proyectos();
      $capacitaciones_Proyectos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitaciones_ProyectosDao =$FactoryDao->getcapacitaciones_ProyectosDao(self::getDataBaseDefault());
     $result = $capacitaciones_ProyectosDao->select($capacitaciones_Proyectos);
     $capacitaciones_ProyectosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Capacitaciones_Proyectos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param tema
   * @param docente
   * @param fecha
   * @param cant_capacitados
   * @param semillero_id
   * @param objetivo
   */
  public static function update($id, $tema, $docente, $fecha, $cant_capacitados, $proyecto_id, $objetivo,$responsable){
      $capacitaciones_Proyectos = self::select($id);
      $capacitaciones_Proyectos->setTema($tema); 
      $capacitaciones_Proyectos->setDocente($docente); 
      $capacitaciones_Proyectos->setFecha($fecha); 
      $capacitaciones_Proyectos->setCant_capacitados($cant_capacitados); 
      $capacitaciones_Proyectos->setProyecto_id($proyecto_id); 
      $capacitaciones_Proyectos->setObjetivo($objetivo); 
      $capacitaciones_Proyectos->setResponsable($responsable); 
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitaciones_ProyectosDao =$FactoryDao->getcapacitaciones_ProyectosDao(self::getDataBaseDefault());
     $capacitaciones_ProyectosDao->update($capacitaciones_Proyectos);
     $capacitaciones_ProyectosDao->close();
  }


  /**
   * Elimina un objeto Capacitaciones_Proyectos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $capacitaciones_Proyectos = new Capacitaciones_Proyectos();
      $capacitaciones_Proyectos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitaciones_ProyectosDao =$FactoryDao->getcapacitaciones_ProyectosDao(self::getDataBaseDefault());
    $result = $capacitaciones_ProyectosDao->delete($capacitaciones_Proyectos);
     $capacitaciones_ProyectosDao->close();
     return $result ;
  }

  /**
   * Lista todos los objetos Capacitaciones_Proyectos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Capacitaciones_Proyectos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitaciones_ProyectosDao =$FactoryDao->getcapacitaciones_ProyectosDao(self::getDataBaseDefault());
     $result = $capacitaciones_ProyectosDao->listAll();
     $capacitaciones_ProyectosDao->close();
     return $result;
  }
 
  public static function listAll_idProy($id){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $capacitaciones_ProyectosDao =$FactoryDao->getcapacitaciones_ProyectosDao(self::getDataBaseDefault());
     $result = $capacitaciones_ProyectosDao->listAll_idProy($id);
     $capacitaciones_ProyectosDao->close();
     return $result;
  }
 


}
//That`s all folks!