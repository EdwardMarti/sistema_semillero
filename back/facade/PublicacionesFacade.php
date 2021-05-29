<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla de Anarchy es no hablar de Anarchy  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Publicaciones.php');
require_once realpath('../dao/interfaz/IPublicacionesDao.php');
require_once realpath('../dto/Tipo_publicaciones.php');
require_once realpath('../dto/Semillero.php');

class PublicacionesFacade {

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
   * Crea un objeto Publicaciones a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param autor
   * @param titulo
   * @param nombre_medio
   * @param issn
   * @param editorial
   * @param volumen
   * @param cant_pag
   * @param fecha
   * @param ciudad
   * @param tipo_publicaciones_id
   * @param semillero_id
   */
  public static function insert( $id,  $autor,  $titulo,  $nombre_medio,  $issn,  $editorial,  $volumen,  $cant_pag,  $fecha,  $ciudad,  $tipo_publicaciones_id,  $semillero_id){
      $publicaciones = new Publicaciones();
      $publicaciones->setId($id); 
      $publicaciones->setAutor($autor); 
      $publicaciones->setTitulo($titulo); 
      $publicaciones->setNombre_medio($nombre_medio); 
      $publicaciones->setIssn($issn); 
      $publicaciones->setEditorial($editorial); 
      $publicaciones->setVolumen($volumen); 
      $publicaciones->setCant_pag($cant_pag); 
      $publicaciones->setFecha($fecha); 
      $publicaciones->setCiudad($ciudad); 
      $publicaciones->setTipo_publicaciones_id($tipo_publicaciones_id); 
      $publicaciones->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $publicacionesDao =$FactoryDao->getpublicacionesDao(self::getDataBaseDefault());
     $rtn = $publicacionesDao->insert($publicaciones);
     $publicacionesDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Publicaciones de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $publicaciones = new Publicaciones();
      $publicaciones->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $publicacionesDao =$FactoryDao->getpublicacionesDao(self::getDataBaseDefault());
     $result = $publicacionesDao->select($publicaciones);
     $publicacionesDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Publicaciones  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param autor
   * @param titulo
   * @param nombre_medio
   * @param issn
   * @param editorial
   * @param volumen
   * @param cant_pag
   * @param fecha
   * @param ciudad
   * @param tipo_publicaciones_id
   * @param semillero_id
   */
  public static function update($id, $autor, $titulo, $nombre_medio, $issn, $editorial, $volumen, $cant_pag, $fecha, $ciudad, $tipo_publicaciones_id, $semillero_id){
      $publicaciones = self::select($id);
      $publicaciones->setAutor($autor); 
      $publicaciones->setTitulo($titulo); 
      $publicaciones->setNombre_medio($nombre_medio); 
      $publicaciones->setIssn($issn); 
      $publicaciones->setEditorial($editorial); 
      $publicaciones->setVolumen($volumen); 
      $publicaciones->setCant_pag($cant_pag); 
      $publicaciones->setFecha($fecha); 
      $publicaciones->setCiudad($ciudad); 
      $publicaciones->setTipo_publicaciones_id($tipo_publicaciones_id); 
      $publicaciones->setSemillero_id($semillero_id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $publicacionesDao =$FactoryDao->getpublicacionesDao(self::getDataBaseDefault());
     $publicacionesDao->update($publicaciones);
     $publicacionesDao->close();
  }

  /**
   * Elimina un objeto Publicaciones de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $publicaciones = new Publicaciones();
      $publicaciones->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $publicacionesDao =$FactoryDao->getpublicacionesDao(self::getDataBaseDefault());
     $publicacionesDao->delete($publicaciones);
     $publicacionesDao->close();
  }

  /**
   * Lista todos los objetos Publicaciones de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Publicaciones en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $publicacionesDao =$FactoryDao->getpublicacionesDao(self::getDataBaseDefault());
     $result = $publicacionesDao->listAll();
     $publicacionesDao->close();
     return $result;
  }


}
//That`s all folks!