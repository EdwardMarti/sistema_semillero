<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿En serio? ¿Tantos buenos frameworks y estás usando Anarchy?  \\

include_once realpath('../dao/interfaz/ICapacitacionesDao.php');
include_once realpath('../dto/Capacitaciones.php');
include_once realpath('../dto/Semillero.php');

class CapacitacionesDao implements ICapacitacionesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Capacitaciones en la base de datos.
     * @param capacitaciones objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($capacitaciones){
      $id=$capacitaciones->getId();
$tema=$capacitaciones->getTema();
$docente=$capacitaciones->getDocente();
$fecha=$capacitaciones->getFecha();
$cant_capacitados=$capacitaciones->getCant_capacitados();
$semillero_id=$capacitaciones->getSemillero_id()->getId();
$objetivo=$capacitaciones->getObjetivo();

      try {
          $sql= "INSERT INTO `capacitaciones`( `id`, `tema`, `docente`, `fecha`, `cant_capacitados`, `semillero_id`, `objetivo`)"
          ."VALUES ('$id','$tema','$docente','$fecha','$cant_capacitados','$semillero_id','$objetivo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Capacitaciones en la base de datos.
     * @param capacitaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($capacitaciones){
      $id=$capacitaciones->getId();

      try {
          $sql= "SELECT `id`, `tema`, `docente`, `fecha`, `cant_capacitados`, `semillero_id`, `objetivo`"
          ."FROM `capacitaciones`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $capacitaciones->setId($data[$i]['id']);
          $capacitaciones->setTema($data[$i]['tema']);
          $capacitaciones->setDocente($data[$i]['docente']);
          $capacitaciones->setFecha($data[$i]['fecha']);
          $capacitaciones->setCant_capacitados($data[$i]['cant_capacitados']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $capacitaciones->setSemillero_id($semillero);
          $capacitaciones->setObjetivo($data[$i]['objetivo']);

          }
      return $capacitaciones;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Capacitaciones en la base de datos.
     * @param capacitaciones objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($capacitaciones){
      $id=$capacitaciones->getId();
$tema=$capacitaciones->getTema();
$docente=$capacitaciones->getDocente();
$fecha=$capacitaciones->getFecha();
$cant_capacitados=$capacitaciones->getCant_capacitados();
$semillero_id=$capacitaciones->getSemillero_id()->getId();
$objetivo=$capacitaciones->getObjetivo();

      try {
          $sql= "UPDATE `capacitaciones` SET`id`='$id' ,`tema`='$tema' ,`docente`='$docente' ,`fecha`='$fecha' ,`cant_capacitados`='$cant_capacitados' ,`semillero_id`='$semillero_id' ,`objetivo`='$objetivo' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Capacitaciones en la base de datos.
     * @param capacitaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($capacitaciones){
      $id=$capacitaciones->getId();

      try {
          $sql ="DELETE FROM `capacitaciones` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Capacitaciones en la base de datos.
     * @return ArrayList<Capacitaciones> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `tema`, `docente`, `fecha`, `cant_capacitados`, `semillero_id`, `objetivo`"
          ."FROM `capacitaciones`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $capacitaciones= new Capacitaciones();
          $capacitaciones->setId($data[$i]['id']);
          $capacitaciones->setTema($data[$i]['tema']);
          $capacitaciones->setDocente($data[$i]['docente']);
          $capacitaciones->setFecha($data[$i]['fecha']);
          $capacitaciones->setCant_capacitados($data[$i]['cant_capacitados']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $capacitaciones->setSemillero_id($semillero);
          $capacitaciones->setObjetivo($data[$i]['objetivo']);

          array_push($lista,$capacitaciones);
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