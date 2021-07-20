<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Podrías agradecernos con unos cuantos billetes _/(n.n)\_  \\

include_once realpath('../dao/interfaz/ILinea_investigacionDao.php');
include_once realpath('../dto/Linea_investigacion.php');
include_once realpath('../dto/Disciplina.php');

class Linea_investigacionDao implements ILinea_investigacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Linea_investigacion en la base de datos.
     * @param linea_investigacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($linea_investigacion){
//      $id=$linea_investigacion->getId();
$descripcion=$linea_investigacion->getDescripcion();
$lider=$linea_investigacion->getLider();
$disciplina_id=$linea_investigacion->getDisciplina_id()->getId();

      try {
          $sql= "INSERT INTO `linea_investigacion`(  `descripcion`, `lider`, `disciplina_id`)"
          ."VALUES ('$descripcion','$lider','$disciplina_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Linea_investigacion en la base de datos.
     * @param linea_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($linea_investigacion){
      $id=$linea_investigacion->getId();

      try {
          $sql= "SELECT `id`, `descripcion`, `lider`, `disciplina_id`"
          ."FROM `linea_investigacion`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $linea_investigacion->setId($data[$i]['id']);
          $linea_investigacion->setDescripcion($data[$i]['descripcion']);
          $linea_investigacion->setLider($data[$i]['lider']);
           $disciplina = new Disciplina();
           $disciplina->setId($data[$i]['disciplina_id']);
           $linea_investigacion->setDisciplina_id($disciplina);

          }
      return $linea_investigacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Linea_investigacion en la base de datos.
     * @param linea_investigacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($linea_investigacion){
      $id=$linea_investigacion->getId();
$descripcion=$linea_investigacion->getDescripcion();
$lider=$linea_investigacion->getLider();
$disciplina_id=$linea_investigacion->getDisciplina_id()->getId();

      try {
          $sql= "UPDATE `linea_investigacion` SET`id`='$id' ,`descripcion`='$descripcion' ,`lider`='$lider' ,`disciplina_id`='$disciplina_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Linea_investigacion en la base de datos.
     * @param linea_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($linea_investigacion){
      $id=$linea_investigacion->getId();

      try {
          $sql ="DELETE FROM `linea_proyecto_plan` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Linea_investigacion en la base de datos.
     * @return ArrayList<Linea_investigacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`, `lider`, `disciplina_id`"
          ."FROM `linea_investigacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $linea_investigacion= new Linea_investigacion();
          $linea_investigacion->setId($data[$i]['id']);
          $linea_investigacion->setDescripcion($data[$i]['descripcion']);
          $linea_investigacion->setLider($data[$i]['lider']);
           $disciplina = new Disciplina();
           $disciplina->setId($data[$i]['disciplina_id']);
           $linea_investigacion->setDisciplina_id($disciplina);

          array_push($lista,$linea_investigacion);
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
          $sql ="SELECT `id`, `descripcion`, `lider`, `disciplina_id`"
          ."FROM `linea_investigacion`"
          ."WHERE `disciplina_id` = '$id' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $linea_investigacion= new Linea_investigacion();
          $linea_investigacion->setId($data[$i]['id']);
          $linea_investigacion->setDescripcion($data[$i]['descripcion']);
          $linea_investigacion->setLider($data[$i]['lider']);
           $disciplina = new Disciplina();
           $disciplina->setId($data[$i]['disciplina_id']);
           $linea_investigacion->setDisciplina_id($disciplina);

          array_push($lista,$linea_investigacion);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  
  
  public function listAll_id_linea($plan){
      $lista = array();
      try {
          $sql ="SELECT lpp.`id`, lpp.`linea_id`,linea_investigacion.descripcion, lpp.`plan_id` , lpp.`proy_id`, proyectos.titulo FROM `linea_proyecto_plan` lpp INNER JOIN linea_investigacion ON linea_investigacion.id=`lpp`.`linea_id`  INNER JOIN proyectos ON lpp.proy_id=proyectos.id WHERE  `plan_id` = '$plan' ";
//          var_dump($sql);
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $linea_investigacion= new Linea_investigacion();
          $linea_investigacion->setId($data[$i]['id']);
          $linea_investigacion->setDescripcion($data[$i]['descripcion']);  
           $linea_investigacion->setLider($data[$i]['plan_id']);
           $disciplina = new Disciplina();
           $disciplina->setId($data[$i]['titulo']);
           $disciplina->setArea_id($data[$i]['proy_id']);
           $disciplina->setDescripcion($data[$i]['linea_id']);
           $linea_investigacion->setDisciplina_id($disciplina);

           
           
         
          array_push($lista,$linea_investigacion);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_id_linea_act($plan){
      $lista = array();
      try {
          $sql ="SELECT lpp.`id`, lpp.`linea_id`,linea_investigacion.descripcion, lpp.`plan_id` , lpp.`proy_id`, proyectos.titulo FROM `linea_proyecto_plan` lpp INNER JOIN linea_investigacion ON linea_investigacion.id=`lpp`.`linea_id`  INNER JOIN proyectos ON lpp.proy_id=proyectos.id WHERE  `plan_id` = '$plan' ";
//          var_dump($sql);
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $linea_investigacion= new Linea_investigacion();
          $linea_investigacion->setId($data[$i]['id']);
          $linea_investigacion->setDescripcion($data[$i]['descripcion']);  
           $linea_investigacion->setLider($data[$i]['plan_id']);
           $disciplina = new Disciplina();
           $disciplina->setId($data[$i]['titulo']);
           $disciplina->setArea_id($data[$i]['proy_id']);
           $disciplina->setDescripcion($data[$i]['linea_id']);
           $linea_investigacion->setDisciplina_id($disciplina);

           
           
         
          array_push($lista,$linea_investigacion);
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