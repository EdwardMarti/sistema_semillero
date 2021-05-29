<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...con el mayor de los disgustos, el benévolo señor Arciniegas.  \\

include_once realpath('../dao/interfaz/IPonenciasDao.php');
include_once realpath('../dto/Ponencias.php');
include_once realpath('../dto/Tipo_ponencias.php');
include_once realpath('../dto/Semillero.php');

class PonenciasDao implements IPonenciasDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Ponencias en la base de datos.
     * @param ponencias objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($ponencias){
      $id=$ponencias->getId();
$nombre_po=$ponencias->getNombre_po();
$fecha=$ponencias->getFecha();
$nombre_eve=$ponencias->getNombre_eve();
$institucion=$ponencias->getInstitucion();
$ciudad=$ponencias->getCiudad();
$lugar=$ponencias->getLugar();
$tipo_ponencias_id=$ponencias->getTipo_ponencias_id()->getId();
$semillero_id=$ponencias->getSemillero_id()->getId();

      try {
          $sql= "INSERT INTO `ponencias`( `id`, `nombre_po`, `fecha`, `nombre_eve`, `institucion`, `ciudad`, `lugar`, `tipo_ponencias_id`, `semillero_id`)"
          ."VALUES ('$id','$nombre_po','$fecha','$nombre_eve','$institucion','$ciudad','$lugar','$tipo_ponencias_id','$semillero_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Ponencias en la base de datos.
     * @param ponencias objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($ponencias){
      $id=$ponencias->getId();

      try {
          $sql= "SELECT `id`, `nombre_po`, `fecha`, `nombre_eve`, `institucion`, `ciudad`, `lugar`, `tipo_ponencias_id`, `semillero_id`"
          ."FROM `ponencias`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $ponencias->setId($data[$i]['id']);
          $ponencias->setNombre_po($data[$i]['nombre_po']);
          $ponencias->setFecha($data[$i]['fecha']);
          $ponencias->setNombre_eve($data[$i]['nombre_eve']);
          $ponencias->setInstitucion($data[$i]['institucion']);
          $ponencias->setCiudad($data[$i]['ciudad']);
          $ponencias->setLugar($data[$i]['lugar']);
           $tipo_ponencias = new Tipo_ponencias();
           $tipo_ponencias->setId($data[$i]['tipo_ponencias_id']);
           $ponencias->setTipo_ponencias_id($tipo_ponencias);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $ponencias->setSemillero_id($semillero);

          }
      return $ponencias;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Ponencias en la base de datos.
     * @param ponencias objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($ponencias){
      $id=$ponencias->getId();
$nombre_po=$ponencias->getNombre_po();
$fecha=$ponencias->getFecha();
$nombre_eve=$ponencias->getNombre_eve();
$institucion=$ponencias->getInstitucion();
$ciudad=$ponencias->getCiudad();
$lugar=$ponencias->getLugar();
$tipo_ponencias_id=$ponencias->getTipo_ponencias_id()->getId();
$semillero_id=$ponencias->getSemillero_id()->getId();

      try {
          $sql= "UPDATE `ponencias` SET`id`='$id' ,`nombre_po`='$nombre_po' ,`fecha`='$fecha' ,`nombre_eve`='$nombre_eve' ,`institucion`='$institucion' ,`ciudad`='$ciudad' ,`lugar`='$lugar' ,`tipo_ponencias_id`='$tipo_ponencias_id' ,`semillero_id`='$semillero_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Ponencias en la base de datos.
     * @param ponencias objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($ponencias){
      $id=$ponencias->getId();

      try {
          $sql ="DELETE FROM `ponencias` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Ponencias en la base de datos.
     * @return ArrayList<Ponencias> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre_po`, `fecha`, `nombre_eve`, `institucion`, `ciudad`, `lugar`, `tipo_ponencias_id`, `semillero_id`"
          ."FROM `ponencias`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $ponencias= new Ponencias();
          $ponencias->setId($data[$i]['id']);
          $ponencias->setNombre_po($data[$i]['nombre_po']);
          $ponencias->setFecha($data[$i]['fecha']);
          $ponencias->setNombre_eve($data[$i]['nombre_eve']);
          $ponencias->setInstitucion($data[$i]['institucion']);
          $ponencias->setCiudad($data[$i]['ciudad']);
          $ponencias->setLugar($data[$i]['lugar']);
           $tipo_ponencias = new Tipo_ponencias();
           $tipo_ponencias->setId($data[$i]['tipo_ponencias_id']);
           $ponencias->setTipo_ponencias_id($tipo_ponencias);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $ponencias->setSemillero_id($semillero);

          array_push($lista,$ponencias);
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