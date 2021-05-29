<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\

include_once realpath('../dao/interfaz/IPublicacionesDao.php');
include_once realpath('../dto/Publicaciones.php');
include_once realpath('../dto/Tipo_publicaciones.php');
include_once realpath('../dto/Semillero.php');

class PublicacionesDao implements IPublicacionesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Publicaciones en la base de datos.
     * @param publicaciones objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($publicaciones){
      $id=$publicaciones->getId();
$autor=$publicaciones->getAutor();
$titulo=$publicaciones->getTitulo();
$nombre_medio=$publicaciones->getNombre_medio();
$issn=$publicaciones->getIssn();
$editorial=$publicaciones->getEditorial();
$volumen=$publicaciones->getVolumen();
$cant_pag=$publicaciones->getCant_pag();
$fecha=$publicaciones->getFecha();
$ciudad=$publicaciones->getCiudad();
$tipo_publicaciones_id=$publicaciones->getTipo_publicaciones_id()->getId();
$semillero_id=$publicaciones->getSemillero_id()->getId();

      try {
          $sql= "INSERT INTO `publicaciones`( `id`, `autor`, `titulo`, `nombre_medio`, `issn`, `editorial`, `volumen`, `cant_pag`, `fecha`, `ciudad`, `tipo_publicaciones_id`, `semillero_id`)"
          ."VALUES ('$id','$autor','$titulo','$nombre_medio','$issn','$editorial','$volumen','$cant_pag','$fecha','$ciudad','$tipo_publicaciones_id','$semillero_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Publicaciones en la base de datos.
     * @param publicaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($publicaciones){
      $id=$publicaciones->getId();

      try {
          $sql= "SELECT `id`, `autor`, `titulo`, `nombre_medio`, `issn`, `editorial`, `volumen`, `cant_pag`, `fecha`, `ciudad`, `tipo_publicaciones_id`, `semillero_id`"
          ."FROM `publicaciones`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $publicaciones->setId($data[$i]['id']);
          $publicaciones->setAutor($data[$i]['autor']);
          $publicaciones->setTitulo($data[$i]['titulo']);
          $publicaciones->setNombre_medio($data[$i]['nombre_medio']);
          $publicaciones->setIssn($data[$i]['issn']);
          $publicaciones->setEditorial($data[$i]['editorial']);
          $publicaciones->setVolumen($data[$i]['volumen']);
          $publicaciones->setCant_pag($data[$i]['cant_pag']);
          $publicaciones->setFecha($data[$i]['fecha']);
          $publicaciones->setCiudad($data[$i]['ciudad']);
           $tipo_publicaciones = new Tipo_publicaciones();
           $tipo_publicaciones->setId($data[$i]['tipo_publicaciones_id']);
           $publicaciones->setTipo_publicaciones_id($tipo_publicaciones);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $publicaciones->setSemillero_id($semillero);

          }
      return $publicaciones;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Publicaciones en la base de datos.
     * @param publicaciones objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($publicaciones){
      $id=$publicaciones->getId();
$autor=$publicaciones->getAutor();
$titulo=$publicaciones->getTitulo();
$nombre_medio=$publicaciones->getNombre_medio();
$issn=$publicaciones->getIssn();
$editorial=$publicaciones->getEditorial();
$volumen=$publicaciones->getVolumen();
$cant_pag=$publicaciones->getCant_pag();
$fecha=$publicaciones->getFecha();
$ciudad=$publicaciones->getCiudad();
$tipo_publicaciones_id=$publicaciones->getTipo_publicaciones_id()->getId();
$semillero_id=$publicaciones->getSemillero_id()->getId();

      try {
          $sql= "UPDATE `publicaciones` SET`id`='$id' ,`autor`='$autor' ,`titulo`='$titulo' ,`nombre_medio`='$nombre_medio' ,`issn`='$issn' ,`editorial`='$editorial' ,`volumen`='$volumen' ,`cant_pag`='$cant_pag' ,`fecha`='$fecha' ,`ciudad`='$ciudad' ,`tipo_publicaciones_id`='$tipo_publicaciones_id' ,`semillero_id`='$semillero_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Publicaciones en la base de datos.
     * @param publicaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($publicaciones){
      $id=$publicaciones->getId();

      try {
          $sql ="DELETE FROM `publicaciones` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Publicaciones en la base de datos.
     * @return ArrayList<Publicaciones> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `autor`, `titulo`, `nombre_medio`, `issn`, `editorial`, `volumen`, `cant_pag`, `fecha`, `ciudad`, `tipo_publicaciones_id`, `semillero_id`"
          ."FROM `publicaciones`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $publicaciones= new Publicaciones();
          $publicaciones->setId($data[$i]['id']);
          $publicaciones->setAutor($data[$i]['autor']);
          $publicaciones->setTitulo($data[$i]['titulo']);
          $publicaciones->setNombre_medio($data[$i]['nombre_medio']);
          $publicaciones->setIssn($data[$i]['issn']);
          $publicaciones->setEditorial($data[$i]['editorial']);
          $publicaciones->setVolumen($data[$i]['volumen']);
          $publicaciones->setCant_pag($data[$i]['cant_pag']);
          $publicaciones->setFecha($data[$i]['fecha']);
          $publicaciones->setCiudad($data[$i]['ciudad']);
           $tipo_publicaciones = new Tipo_publicaciones();
           $tipo_publicaciones->setId($data[$i]['tipo_publicaciones_id']);
           $publicaciones->setTipo_publicaciones_id($tipo_publicaciones);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $publicaciones->setSemillero_id($semillero);

          array_push($lista,$publicaciones);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!