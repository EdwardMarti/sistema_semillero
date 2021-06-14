<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Cumplimiento.php');
require_once realpath('../dao/interfaz/ICumplimientoDao.php');


class CumplimientoFacade {

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
   * Crea un objeto Cumplimiento a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre_po
   * @param fecha
   * @param nombre_eve
   * @param institucion
   * @param ciudad
   * @param lugar
   * @param tipo_ponencias_id
   * @param semillero_id
   */
  public static function insert(   $dirigido_id,  $descripcion,  $ano,  $productos,  $semestre,  $acepta_uno,  $acepta_dos,  $porcentaje){
      $cumplimiento = new Cumplimiento();
      $cumplimiento->setDirigido_id($dirigido_id);
      $cumplimiento->setDescripcion($descripcion); 
      $cumplimiento->setAno($ano); 
      $cumplimiento->setProductos($productos); 
      $cumplimiento->setSemestre($semestre); 
      $cumplimiento->setAcepta_uno($acepta_uno); 
      $cumplimiento->setAcepta_dos($acepta_dos); 
      $cumplimiento->setPorcentaje($porcentaje); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cumplimientoDao =$FactoryDao->getcumplimientoDao(self::getDataBaseDefault());
     $rtn = $cumplimientoDao->insert($cumplimiento);
     $cumplimientoDao->close();
     return $rtn;
  }


  /**
   * Selecciona un objeto Cumplimiento de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $cumplimiento = new Cumplimiento();
      $cumplimiento->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cumplimientoDao =$FactoryDao->getcumplimientoDao(self::getDataBaseDefault());
     $result = $cumplimientoDao->select($cumplimiento);
     $cumplimientoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Cumplimiento  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre_po
   * @param fecha
   * @param nombre_eve
   * @param institucion
   * @param ciudad
   * @param lugar
   * @param tipo_ponencias_id
   * @param semillero_id
   */
  public static function update($id, $dirigido_id, $descripcion, $ano, $productos, $semestre, $acepta_uno, $acepta_dos, $porcentaje){
      $cumplimiento = self::select($id);
      $cumplimiento->setDirigido_id($dirigido_id); 
      $cumplimiento->setDescripcion($descripcion); 
      $cumplimiento->setAno($ano); 
      $cumplimiento->setProductos($productos); 
      $cumplimiento->setSemestre($semestre); 
      $cumplimiento->setAcepta_uno($acepta_uno); 
      $cumplimiento->setAcepta_dos($acepta_dos); 
      $cumplimiento->setPorcentaje($porcentaje); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cumplimientoDao =$FactoryDao->getcumplimientoDao(self::getDataBaseDefault());
     $cumplimientoDao->update($cumplimiento);
     $cumplimientoDao->close();
  }
  


  /**
   * Elimina un objeto Cumplimiento de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $cumplimiento = new Cumplimiento();
      $cumplimiento->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cumplimientoDao =$FactoryDao->getcumplimientoDao(self::getDataBaseDefault());
     $result=$cumplimientoDao->delete($cumplimiento);
     $cumplimientoDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Cumplimiento de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Cumplimiento en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $cumplimientoDao =$FactoryDao->getcumplimientoDao(self::getDataBaseDefault());
     $result = $cumplimientoDao->listAll();
     $cumplimientoDao->close();
     return $result;
  }


}
//That`s all folks!