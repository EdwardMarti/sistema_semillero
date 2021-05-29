<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo a tu edad hacía calculadoras en visualBasic  \\

include_once realpath('../dao/interfaz/ITipo_docuemntoDao.php');
include_once realpath('../dto/Tipo_docuemnto.php');

class Tipo_docuemntoDao implements ITipo_docuemntoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Tipo_docuemnto en la base de datos.
     * @param tipo_docuemnto objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_docuemnto){
      $id=$tipo_docuemnto->getId();
$descripcion=$tipo_docuemnto->getDescripcion();

      try {
          $sql= "INSERT INTO `tipo_docuemnto`( `id`, `descripcion`)"
          ."VALUES ('$id','$descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_docuemnto en la base de datos.
     * @param tipo_docuemnto objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_docuemnto){
      $id=$tipo_docuemnto->getId();

      try {
          $sql= "SELECT `id`, `descripcion`"
          ."FROM `tipo_docuemnto`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $tipo_docuemnto->setId($data[$i]['id']);
          $tipo_docuemnto->setDescripcion($data[$i]['descripcion']);

          }
      return $tipo_docuemnto;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Tipo_docuemnto en la base de datos.
     * @param tipo_docuemnto objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_docuemnto){
      $id=$tipo_docuemnto->getId();
$descripcion=$tipo_docuemnto->getDescripcion();

      try {
          $sql= "UPDATE `tipo_docuemnto` SET`id`='$id' ,`descripcion`='$descripcion' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Tipo_docuemnto en la base de datos.
     * @param tipo_docuemnto objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_docuemnto){
      $id=$tipo_docuemnto->getId();

      try {
          $sql ="DELETE FROM `tipo_docuemnto` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_docuemnto en la base de datos.
     * @return ArrayList<Tipo_docuemnto> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`"
          ."FROM `tipo_docuemnto`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $tipo_docuemnto= new Tipo_docuemnto();
          $tipo_docuemnto->setId($data[$i]['id']);
          $tipo_docuemnto->setDescripcion($data[$i]['descripcion']);

          array_push($lista,$tipo_docuemnto);
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