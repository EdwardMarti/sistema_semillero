<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Proyectos.php');
require_once realpath('../dao/interfaz/IProyectosDao.php');
require_once realpath('../dto/Estado_proyecto.php');
require_once realpath('../dto/Semillero.php');

class ProyectosFacade {

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
   * Crea un objeto Proyectos a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param titulo
   * @param investigador
   * @param tipo_proyecto_id
   * @param tiempo_ejecucion
   * @param fecha_ini
   * @param resumen
   * @param obj_general
   * @param obj_esÃÂ©cifico
   * @param resultados
   * @param costo_valor
   * @param producto
   * @param semillero_id
   */
  public static function insert( $id,  $titulo,  $investigador,  $tipo_proyecto_id,  $tiempo_ejecucion,  $fecha_ini,  $resumen,  $obj_general,  $obj_esÃÂ©cifico,  $resultados,  $costo_valor,  $producto,  $semillero_id){
      $proyectos = new Proyectos();
      $proyectos->setId($id); 
      $proyectos->setTitulo($titulo); 
      $proyectos->setInvestigador($investigador); 
      $proyectos->setTipo_proyecto_id($tipo_proyecto_id); 
      $proyectos->setTiempo_ejecucion($tiempo_ejecucion); 
      $proyectos->setFecha_ini($fecha_ini); 
      $proyectos->setResumen($resumen); 
      $proyectos->setObj_general($obj_general); 
      $proyectos->setObj_esÃÂ©cifico($obj_esÃÂ©cifico); 
      $proyectos->setResultados($resultados); 
      $proyectos->setCosto_valor($costo_valor); 
      $proyectos->setProducto($producto); 
      $proyectos->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proyectosDao =$FactoryDao->getproyectosDao(self::getDataBaseDefault());
     $rtn = $proyectosDao->insert($proyectos);
     $proyectosDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Proyectos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $proyectos = new Proyectos();
      $proyectos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proyectosDao =$FactoryDao->getproyectosDao(self::getDataBaseDefault());
     $result = $proyectosDao->select($proyectos);
     $proyectosDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Proyectos  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param titulo
   * @param investigador
   * @param tipo_proyecto_id
   * @param tiempo_ejecucion
   * @param fecha_ini
   * @param resumen
   * @param obj_general
   * @param obj_esÃÂ©cifico
   * @param resultados
   * @param costo_valor
   * @param producto
   * @param semillero_id
   */
  public static function update($id, $titulo, $investigador, $tipo_proyecto_id, $tiempo_ejecucion, $fecha_ini, $resumen, $obj_general, $obj_esÃÂ©cifico, $resultados, $costo_valor, $producto, $semillero_id){
      $proyectos = self::select($id);
      $proyectos->setTitulo($titulo); 
      $proyectos->setInvestigador($investigador); 
      $proyectos->setTipo_proyecto_id($tipo_proyecto_id); 
      $proyectos->setTiempo_ejecucion($tiempo_ejecucion); 
      $proyectos->setFecha_ini($fecha_ini); 
      $proyectos->setResumen($resumen); 
      $proyectos->setObj_general($obj_general); 
      $proyectos->setObj_esÃÂ©cifico($obj_esÃÂ©cifico); 
      $proyectos->setResultados($resultados); 
      $proyectos->setCosto_valor($costo_valor); 
      $proyectos->setProducto($producto); 
      $proyectos->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proyectosDao =$FactoryDao->getproyectosDao(self::getDataBaseDefault());
     $proyectosDao->update($proyectos);
     $proyectosDao->close();
  }

  /**
   * Elimina un objeto Proyectos de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $proyectos = new Proyectos();
      $proyectos->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proyectosDao =$FactoryDao->getproyectosDao(self::getDataBaseDefault());
     $proyectosDao->delete($proyectos);
     $proyectosDao->close();
  }

  /**
   * Lista todos los objetos Proyectos de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Proyectos en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $proyectosDao =$FactoryDao->getproyectosDao(self::getDataBaseDefault());
     $result = $proyectosDao->listAll();
     $proyectosDao->close();
     return $result;
  }


}
//That`s all folks!