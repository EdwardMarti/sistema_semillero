<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Otras_actividades.php');
require_once realpath('../dao/interfaz/IOtras_actividadesDao.php');
require_once realpath('../dto/Semillero.php');

class Otras_actividadesFacade {

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
   * Crea un objeto Otras_actividades a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre_proyecto
   * @param nombre_actividad
   * @param modalidad_participacion
   * @param responsable
   * @param fecha_realizacion
   * @param producto
   * @param semillero_id
   */
  public static function insert( $id,  $nombre_proyecto,  $nombre_actividad,  $modalidad_participacion,  $responsable,  $fecha_realizacion,  $producto,  $semillero_id){
      $otras_actividades = new Otras_actividades();
      $otras_actividades->setId($id); 
      $otras_actividades->setNombre_proyecto($nombre_proyecto); 
      $otras_actividades->setNombre_actividad($nombre_actividad); 
      $otras_actividades->setModalidad_participacion($modalidad_participacion); 
      $otras_actividades->setResponsable($responsable); 
      $otras_actividades->setFecha_realizacion($fecha_realizacion); 
      $otras_actividades->setProducto($producto); 
      $otras_actividades->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $otras_actividadesDao =$FactoryDao->getotras_actividadesDao(self::getDataBaseDefault());
     $rtn = $otras_actividadesDao->insert($otras_actividades);
     $otras_actividadesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Otras_actividades de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $otras_actividades = new Otras_actividades();
      $otras_actividades->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $otras_actividadesDao =$FactoryDao->getotras_actividadesDao(self::getDataBaseDefault());
     $result = $otras_actividadesDao->select($otras_actividades);
     $otras_actividadesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Otras_actividades  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre_proyecto
   * @param nombre_actividad
   * @param modalidad_participacion
   * @param responsable
   * @param fecha_realizacion
   * @param producto
   * @param semillero_id
   */
  public static function update($id, $nombre_proyecto, $nombre_actividad, $modalidad_participacion, $responsable, $fecha_realizacion, $producto, $semillero_id){
      $otras_actividades = self::select($id);
      $otras_actividades->setNombre_proyecto($nombre_proyecto); 
      $otras_actividades->setNombre_actividad($nombre_actividad); 
      $otras_actividades->setModalidad_participacion($modalidad_participacion); 
      $otras_actividades->setResponsable($responsable); 
      $otras_actividades->setFecha_realizacion($fecha_realizacion); 
      $otras_actividades->setProducto($producto); 
      $otras_actividades->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $otras_actividadesDao =$FactoryDao->getotras_actividadesDao(self::getDataBaseDefault());
     $otras_actividadesDao->update($otras_actividades);
     $otras_actividadesDao->close();
  }

  /**
   * Elimina un objeto Otras_actividades de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $otras_actividades = new Otras_actividades();
      $otras_actividades->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $otras_actividadesDao =$FactoryDao->getotras_actividadesDao(self::getDataBaseDefault());
     $otras_actividadesDao->delete($otras_actividades);
     $otras_actividadesDao->close();
  }

  /**
   * Lista todos los objetos Otras_actividades de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Otras_actividades en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $otras_actividadesDao =$FactoryDao->getotras_actividadesDao(self::getDataBaseDefault());
     $result = $otras_actividadesDao->listAll();
     $otras_actividadesDao->close();
     return $result;
  }


}
//That`s all folks!