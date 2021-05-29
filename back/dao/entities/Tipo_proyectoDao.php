<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\

include_once realpath('../dao/interfaz/ITipo_proyectoDao.php');
include_once realpath('../dto/Tipo_proyecto.php');
include_once realpath('../dto/Proyectos.php');

class Tipo_proyectoDao implements ITipo_proyectoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Tipo_proyecto en la base de datos.
     * @param tipo_proyecto objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_proyecto){
      $id=$tipo_proyecto->getId();
$descripcion=$tipo_proyecto->getDescripcion();
$proyectos_id=$tipo_proyecto->getProyectos_id()->getId();

      try {
          $sql= "INSERT INTO `tipo_proyecto`( `id`, `descripcion`, `proyectos_id`)"
          ."VALUES ('$id','$descripcion','$proyectos_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_proyecto en la base de datos.
     * @param tipo_proyecto objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_proyecto){
      $id=$tipo_proyecto->getId();

      try {
          $sql= "SELECT `id`, `descripcion`, `proyectos_id`"
          ."FROM `tipo_proyecto`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $tipo_proyecto->setId($data[$i]['id']);
          $tipo_proyecto->setDescripcion($data[$i]['descripcion']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $tipo_proyecto->setProyectos_id($proyectos);

          }
      return $tipo_proyecto;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Tipo_proyecto en la base de datos.
     * @param tipo_proyecto objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_proyecto){
      $id=$tipo_proyecto->getId();
$descripcion=$tipo_proyecto->getDescripcion();
$proyectos_id=$tipo_proyecto->getProyectos_id()->getId();

      try {
          $sql= "UPDATE `tipo_proyecto` SET`id`='$id' ,`descripcion`='$descripcion' ,`proyectos_id`='$proyectos_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Tipo_proyecto en la base de datos.
     * @param tipo_proyecto objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_proyecto){
      $id=$tipo_proyecto->getId();

      try {
          $sql ="DELETE FROM `tipo_proyecto` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_proyecto en la base de datos.
     * @return ArrayList<Tipo_proyecto> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`, `proyectos_id`"
          ."FROM `tipo_proyecto`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $tipo_proyecto= new Tipo_proyecto();
          $tipo_proyecto->setId($data[$i]['id']);
          $tipo_proyecto->setDescripcion($data[$i]['descripcion']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $tipo_proyecto->setProyectos_id($proyectos);

          array_push($lista,$tipo_proyecto);
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