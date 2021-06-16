<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    They call me Mr. Espagueti  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Datos_adicionalesS.php');
require_once realpath('../dao/interfaz/IDatos_adicionalesSDao.php');

class Datos_adicionalesSSFacade {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el producto de base de datos predilecto para esta entidad
   * @return dbName Devuelve el producto de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Datos_adicionalesS a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param producto
   * @param sigla
   * @param unidad_academica
   * @param fecha_creacion
   * @param fecha_gruplac
   * @param codigo_gruplac
   * @param clas_colciencias
   * @param cate_colciencias
   */
  public static function insert( $producto,  $descripcion, $responsable,  $fecha,  $calificacion,  $id_plan,  $id_semillero){
      $datos_adicionalesS = new Datos_adicionalesS();
      $datos_adicionalesS->setProducto($producto); 
      $datos_adicionalesS->setDescripcion($descripcion); 
      $datos_adicionalesS->setFecha($fecha); 
      $datos_adicionalesS->setResponsable($responsable); 
      $datos_adicionalesS->setCalificacion($calificacion); 
      $datos_adicionalesS->setId_plan($id_plan); 
      $datos_adicionalesS->setId_semillero($id_semillero); 
      
      

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_adicionalesSDao =$FactoryDao->getdatos_adicionalesDaoDao(self::getDataBaseDefault());
     $rtn = $datos_adicionalesSDao->insert($datos_adicionalesS);
     $datos_adicionalesSDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Datos_adicionalesS de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $datos_adicionalesS = new Datos_adicionalesS();
      $datos_adicionalesS->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_adicionalesSDao =$FactoryDao->getdatos_adicionalesDaoDao(self::getDataBaseDefault());
     $result = $datos_adicionalesSDao->select($datos_adicionalesS);
     $datos_adicionalesSDao->close();
     return $result;
  }
  public static function list_adicionales($id){
        $datos_adicionalesS = new Datos_adicionalesS();
        $FactoryDao=new FactoryDao(self::getGestorDefault());
        $datos_adicionalesSDao =$FactoryDao->getdatos_adicionalesDaoDao(self::getDataBaseDefault());
        $result = $datos_adicionalesSDao->list_adicionales($id);
        $datos_adicionalesSDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Datos_adicionalesS  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param producto
   * @param sigla
   * @param unidad_academica
   * @param fecha_creacion
   * @param fecha_gruplac
   * @param codigo_gruplac
   * @param clas_colciencias
   * @param cate_colciencias
   */
  public static function update($id, $producto, $descripcion, $fecha, $responsable, $calificacion, $id_plan, $id_semillero){
      $datos_adicionalesS = self::select($id);
      $datos_adicionalesS->setProducto($producto); 
      $datos_adicionalesS->setDescripcion($descripcion); 
      $datos_adicionalesS->setFecha($fecha); 
       $datos_adicionalesS->setResponsable($responsable); 
      $datos_adicionalesS->setCalificacion($calificacion); 
      $datos_adicionalesS->setId_plan($id_plan); 
      $datos_adicionalesS->setId_semillero($id_semillero); 
      
      

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_adicionalesSDao =$FactoryDao->getdatos_adicionalesDaoDao(self::getDataBaseDefault());
     $datos_adicionalesSDao->update($datos_adicionalesS);
     $datos_adicionalesSDao->close();
  }

  /**
   * Elimina un objeto Datos_adicionalesS de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $datos_adicionalesS = new Datos_adicionalesS();
      $datos_adicionalesS->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_adicionalesSDao =$FactoryDao->getdatos_adicionalesDaoDao(self::getDataBaseDefault());
     $datos_adicionalesSDao->delete($datos_adicionalesS);
     $datos_adicionalesSDao->close();
  }

  /**
   * Lista todos los objetos Datos_adicionalesS de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Datos_adicionalesS en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $datos_adicionalesSDao =$FactoryDao->getdatos_adicionalesDaoDao(self::getDataBaseDefault());
     $result = $datos_adicionalesSDao->listAll();
     $datos_adicionalesSDao->close();
     return $result;
  }


}
//That`s all folks!