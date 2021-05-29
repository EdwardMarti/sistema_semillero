<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bueno ¿y ahora qué?  \\

include_once realpath('../dao/interfaz/IPlan_estudiosDao.php');
include_once realpath('../dto/Plan_estudios.php');
include_once realpath('../dto/Departamento.php');

class Plan_estudiosDao implements IPlan_estudiosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Plan_estudios en la base de datos.
     * @param plan_estudios objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($plan_estudios){
//      $id=$plan_estudios->getId();
$descripcion=$plan_estudios->getDescripcion();
$departamento_id=$plan_estudios->getDepartamento_id()->getId();

      try {
          $sql= "INSERT INTO `plan_estudios`(  `descripcion`, `departamento_id`)"
          ."VALUES ('$descripcion','$departamento_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Plan_estudios en la base de datos.
     * @param plan_estudios objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($plan_estudios){
      $id=$plan_estudios->getId();

      try {
          $sql= "SELECT `id`, `descripcion`, `departamento_id`"
          ."FROM `plan_estudios`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $plan_estudios->setId($data[$i]['id']);
          $plan_estudios->setDescripcion($data[$i]['descripcion']);
           $departamento = new Departamento();
           $departamento->setId($data[$i]['departamento_id']);
           $plan_estudios->setDepartamento_id($departamento);

          }
      return $plan_estudios;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Plan_estudios en la base de datos.
     * @param plan_estudios objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($plan_estudios){
      $id=$plan_estudios->getId();
$descripcion=$plan_estudios->getDescripcion();
$departamento_id=$plan_estudios->getDepartamento_id()->getId();

      try {
          $sql= "UPDATE `plan_estudios` SET`id`='$id' ,`descripcion`='$descripcion' ,`departamento_id`='$departamento_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Plan_estudios en la base de datos.
     * @param plan_estudios objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($plan_estudios){
      $id=$plan_estudios->getId();

      try {
          $sql ="DELETE FROM `plan_estudios` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Plan_estudios en la base de datos.
     * @return ArrayList<Plan_estudios> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`, `departamento_id`"
          ."FROM `plan_estudios`";
      
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $plan_estudios= new Plan_estudios();
          $plan_estudios->setId($data[$i]['id']);
          $plan_estudios->setDescripcion($data[$i]['descripcion']);
           $departamento = new Departamento();
           $departamento->setId($data[$i]['departamento_id']);
           $plan_estudios->setDepartamento_id($departamento);

          array_push($lista,$plan_estudios);
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
          $sql ="SELECT `id`, `descripcion`, `departamento_id`"
          ."FROM `plan_estudios`"
          ."WHERE `departamento_id` = '$id' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $plan_estudios= new Plan_estudios();
          $plan_estudios->setId($data[$i]['id']);
          $plan_estudios->setDescripcion($data[$i]['descripcion']);
           $departamento = new Departamento();
           $departamento->setId($data[$i]['departamento_id']);
           $plan_estudios->setDepartamento_id($departamento);

          array_push($lista,$plan_estudios);
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