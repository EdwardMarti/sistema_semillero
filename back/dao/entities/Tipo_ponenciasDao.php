<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\

include_once realpath('../dao/interfaz/ITipo_ponenciasDao.php');
include_once realpath('../dto/Tipo_ponencias.php');

class Tipo_ponenciasDao implements ITipo_ponenciasDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Tipo_ponencias en la base de datos.
     * @param tipo_ponencias objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_ponencias){
      $id=$tipo_ponencias->getId();
$nombre=$tipo_ponencias->getNombre();

      try {
          $sql= "INSERT INTO `tipo_ponencias`( `id`, `nombre`)"
          ."VALUES ('$id','$nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_ponencias en la base de datos.
     * @param tipo_ponencias objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_ponencias){
      $id=$tipo_ponencias->getId();

      try {
          $sql= "SELECT `id`, `nombre`"
          ."FROM `tipo_ponencias`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $tipo_ponencias->setId($data[$i]['id']);
          $tipo_ponencias->setNombre($data[$i]['nombre']);

          }
      return $tipo_ponencias;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Tipo_ponencias en la base de datos.
     * @param tipo_ponencias objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_ponencias){
      $id=$tipo_ponencias->getId();
$nombre=$tipo_ponencias->getNombre();

      try {
          $sql= "UPDATE `tipo_ponencias` SET`id`='$id' ,`nombre`='$nombre' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Tipo_ponencias en la base de datos.
     * @param tipo_ponencias objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_ponencias){
      $id=$tipo_ponencias->getId();

      try {
          $sql ="DELETE FROM `tipo_ponencias` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_ponencias en la base de datos.
     * @return ArrayList<Tipo_ponencias> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`"
          ."FROM `tipo_ponencias`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $tipo_ponencias= new Tipo_ponencias();
          $tipo_ponencias->setId($data[$i]['id']);
          $tipo_ponencias->setNombre($data[$i]['nombre']);

          array_push($lista,$tipo_ponencias);
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