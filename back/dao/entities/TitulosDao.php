<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando uses Anarchy, Georgie, tú también flotarás  \\

include_once realpath('../dao/interfaz/ITitulosDao.php');
include_once realpath('../dto/Titulos.php');
include_once realpath('../dto/Docente.php');

class TitulosDao implements ITitulosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Titulos en la base de datos.
     * @param titulos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($titulos){
      $id=$titulos->getId();
$descripcion=$titulos->getDescripcion();
$universidad_id=$titulos->getUniversidad_id();
$docente_id=$titulos->getDocente_id()->getId();

      try {
          $sql= "INSERT INTO `titulos`( `id`, `descripcion`, `universidad_id`, `docente_id`)"
          ."VALUES ('$id','$descripcion','$universidad_id','$docente_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Titulos en la base de datos.
     * @param titulos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($titulos){
      $id=$titulos->getId();

      try {
          $sql= "SELECT `id`, `descripcion`, `universidad_id`, `docente_id`"
          ."FROM `titulos`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $titulos->setId($data[$i]['id']);
          $titulos->setDescripcion($data[$i]['descripcion']);
          $titulos->setUniversidad_id($data[$i]['universidad_id']);
           $docente = new Docente();
           $docente->setId($data[$i]['docente_id']);
           $titulos->setDocente_id($docente);

          }
      return $titulos;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Titulos en la base de datos.
     * @param titulos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($titulos){
      $id=$titulos->getId();
$descripcion=$titulos->getDescripcion();
$universidad_id=$titulos->getUniversidad_id();
$docente_id=$titulos->getDocente_id()->getId();

      try {
          $sql= "UPDATE `titulos` SET`id`='$id' ,`descripcion`='$descripcion' ,`universidad_id`='$universidad_id' ,`docente_id`='$docente_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Titulos en la base de datos.
     * @param titulos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($titulos){
      $id=$titulos->getId();

      try {
          $sql ="DELETE FROM `titulos` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Titulos en la base de datos.
     * @return ArrayList<Titulos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`, `universidad_id`, `docente_id`"
          ."FROM `titulos`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $titulos= new Titulos();
          $titulos->setId($data[$i]['id']);
          $titulos->setDescripcion($data[$i]['descripcion']);
          $titulos->setUniversidad_id($data[$i]['universidad_id']);
           $docente = new Docente();
           $docente->setId($data[$i]['docente_id']);
           $titulos->setDocente_id($docente);

          array_push($lista,$titulos);
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