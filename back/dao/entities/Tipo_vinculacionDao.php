<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\

include_once realpath('../dao/interfaz/ITipo_vinculacionDao.php');
include_once realpath('../dto/Tipo_vinculacion.php');

class Tipo_vinculacionDao implements ITipo_vinculacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Tipo_vinculacion en la base de datos.
     * @param tipo_vinculacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_vinculacion){
      $id=$tipo_vinculacion->getId();
$descripcion=$tipo_vinculacion->getDescripcion();

      try {
          $sql= "INSERT INTO `tipo_vinculacion`( `id`, `descripcion`)"
          ."VALUES ('$id','$descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_vinculacion en la base de datos.
     * @param tipo_vinculacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_vinculacion){
      $id=$tipo_vinculacion->getId();

      try {
          $sql= "SELECT `id`, `descripcion`"
          ."FROM `tipo_vinculacion`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $tipo_vinculacion->setId($data[$i]['id']);
          $tipo_vinculacion->setDescripcion($data[$i]['descripcion']);

          }
      return $tipo_vinculacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Tipo_vinculacion en la base de datos.
     * @param tipo_vinculacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_vinculacion){
      $id=$tipo_vinculacion->getId();
$descripcion=$tipo_vinculacion->getDescripcion();

      try {
          $sql= "UPDATE `tipo_vinculacion` SET`id`='$id' ,`descripcion`='$descripcion' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Tipo_vinculacion en la base de datos.
     * @param tipo_vinculacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_vinculacion){
      $id=$tipo_vinculacion->getId();

      try {
          $sql ="DELETE FROM `tipo_vinculacion` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_vinculacion en la base de datos.
     * @return ArrayList<Tipo_vinculacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`"
          ."FROM `tipo_vinculacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $tipo_vinculacion= new Tipo_vinculacion();
          $tipo_vinculacion->setId($data[$i]['id']);
          $tipo_vinculacion->setDescripcion($data[$i]['descripcion']);

          array_push($lista,$tipo_vinculacion);
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