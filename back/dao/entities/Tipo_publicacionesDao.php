<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tienes que considerar la posibilidad de que a Dios no le caes bien.  \\

include_once realpath('../dao/interfaz/ITipo_publicacionesDao.php');
include_once realpath('../dto/Tipo_publicaciones.php');

class Tipo_publicacionesDao implements ITipo_publicacionesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Tipo_publicaciones en la base de datos.
     * @param tipo_publicaciones objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_publicaciones){
//      $id=$tipo_publicaciones->getId();
$descripcion=$tipo_publicaciones->getDescripcion();

      try {
          $sql= "INSERT INTO `tipo_publicaciones`(  `descripcion`)"
          ."VALUES ('$descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_publicaciones en la base de datos.
     * @param tipo_publicaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_publicaciones){
      $id=$tipo_publicaciones->getId();

      try {
          $sql= "SELECT `id`, `descripcion`"
          ."FROM `tipo_publicaciones`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $tipo_publicaciones->setId($data[$i]['id']);
          $tipo_publicaciones->setDescripcion($data[$i]['descripcion']);

          }
      return $tipo_publicaciones;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Tipo_publicaciones en la base de datos.
     * @param tipo_publicaciones objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_publicaciones){
      $id=$tipo_publicaciones->getId();
$descripcion=$tipo_publicaciones->getDescripcion();

      try {
          $sql= "UPDATE `tipo_publicaciones` SET`id`='$id' ,`descripcion`='$descripcion' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Tipo_publicaciones en la base de datos.
     * @param tipo_publicaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_publicaciones){
      $id=$tipo_publicaciones->getId();

      try {
          $sql ="DELETE FROM `tipo_publicaciones` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Tipo_publicaciones en la base de datos.
     * @return ArrayList<Tipo_publicaciones> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`"
          ."FROM `tipo_publicaciones`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $tipo_publicaciones= new Tipo_publicaciones();
          $tipo_publicaciones->setId($data[$i]['id']);
          $tipo_publicaciones->setDescripcion($data[$i]['descripcion']);

          array_push($lista,$tipo_publicaciones);
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