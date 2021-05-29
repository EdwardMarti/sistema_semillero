<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla del proyecto es no hacer preguntas  \\

include_once realpath('../dao/interfaz/IDepartamentoDao.php');
include_once realpath('../dto/Departamento.php');
include_once realpath('../dto/Facultad.php');

class DepartamentoDao implements IDepartamentoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Departamento en la base de datos.
     * @param departamento objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($departamento){
//      $id=$departamento->getId();
$descripcion=$departamento->getDescripcion();
$facultad_id=$departamento->getFacultad_id()->getId();

      try {
          $sql= "INSERT INTO `departamento`(  `descripcion`, `facultad_id`)"
          ."VALUES ('$descripcion','$facultad_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Departamento en la base de datos.
     * @param departamento objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($departamento){
      $id=$departamento->getId();

      try {
          $sql= "SELECT `id`, `descripcion`, `facultad_id`"
          ."FROM `departamento`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $departamento->setId($data[$i]['id']);
          $departamento->setDescripcion($data[$i]['descripcion']);
           $facultad = new Facultad();
           $facultad->setId($data[$i]['facultad_id']);
           $departamento->setFacultad_id($facultad);

          }
      return $departamento;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Departamento en la base de datos.
     * @param departamento objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($departamento){
      $id=$departamento->getId();
$descripcion=$departamento->getDescripcion();
$facultad_id=$departamento->getFacultad_id()->getId();

      try {
          $sql= "UPDATE `departamento` SET`id`='$id' ,`descripcion`='$descripcion' ,`facultad_id`='$facultad_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Departamento en la base de datos.
     * @param departamento objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($departamento){
      $id=$departamento->getId();

      try {
          $sql ="DELETE FROM `departamento` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Departamento en la base de datos.
     * @return ArrayList<Departamento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`, `facultad_id`"
          ."FROM `departamento`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $departamento= new Departamento();
          $departamento->setId($data[$i]['id']);
          $departamento->setDescripcion($data[$i]['descripcion']);
           $facultad = new Facultad();
           $facultad->setId($data[$i]['facultad_id']);
           $departamento->setFacultad_id($facultad);

          array_push($lista,$departamento);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
    /**
     * Busca un objeto Departamento en la base de datos.
     * @return ArrayList<Departamento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll_id($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`, `facultad_id`"
          ."FROM `departamento`"
          ."WHERE `facultad_id` = '$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $departamento= new Departamento();
          $departamento->setId($data[$i]['id']);
          $departamento->setDescripcion($data[$i]['descripcion']);
           $facultad = new Facultad();
           $facultad->setId($data[$i]['facultad_id']);
           $departamento->setFacultad_id($facultad);

          array_push($lista,$departamento);
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