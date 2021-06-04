<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No dejes el código del futuro en manos humanas  \\

include_once realpath('../dao/interfaz/IDisciplinaDao.php');
include_once realpath('../dto/Disciplina.php');
include_once realpath('../dto/Area.php');

class DisciplinaDao implements IDisciplinaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Disciplina en la base de datos.
     * @param disciplina objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($disciplina){
      $id=$disciplina->getId();
$descripcion=$disciplina->getDescripcion();
$area_id=$disciplina->getArea_id()->getId();

      try {
          $sql= "INSERT INTO `disciplina`( `id`, `descripcion`, `area_id`)"
          ."VALUES ('$id','$descripcion','$area_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Disciplina en la base de datos.
     * @param disciplina objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($disciplina){
      $id=$disciplina->getId();

      try {
          $sql= "SELECT `id`, `descripcion`, `area_id`"
          ."FROM `disciplina`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $disciplina->setId($data[$i]['id']);
          $disciplina->setDescripcion($data[$i]['descripcion']);
           $area = new Area();
           $area->setId($data[$i]['area_id']);
           $disciplina->setArea_id($area);

          }
      return $disciplina;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Disciplina en la base de datos.
     * @param disciplina objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($disciplina){
      $id=$disciplina->getId();
$descripcion=$disciplina->getDescripcion();
$area_id=$disciplina->getArea_id()->getId();

      try {
          $sql= "UPDATE `disciplina` SET`id`='$id' ,`descripcion`='$descripcion' ,`area_id`='$area_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Disciplina en la base de datos.
     * @param disciplina objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($disciplina){
      $id=$disciplina->getId();

      try {
          $sql ="DELETE FROM `disciplina` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Disciplina en la base de datos.
     * @return ArrayList<Disciplina> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`, `area_id`"
          ."FROM `disciplina`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $disciplina= new Disciplina();
          $disciplina->setId($data[$i]['id']);
          $disciplina->setDescripcion($data[$i]['descripcion']);
           $area = new Area();
           $area->setId($data[$i]['area_id']);
           $disciplina->setArea_id($area);

          array_push($lista,$disciplina);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_id($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`, `area_id`"
          ."FROM `disciplina`"
          ."WHERE `area_id` = '$id' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $disciplina= new Disciplina();
          $disciplina->setId($data[$i]['id']);
          $disciplina->setDescripcion($data[$i]['descripcion']);
           $area = new Area();
           $area->setId($data[$i]['area_id']);
           $disciplina->setArea_id($area);

          array_push($lista,$disciplina);
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