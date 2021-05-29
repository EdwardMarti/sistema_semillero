<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tienes que considerar la posibilidad de que a Dios no le caes bien.  \\

include_once realpath('../dao/interfaz/IColaboradorDao.php');
include_once realpath('../dto/Colaborador.php');
include_once realpath('../dto/Proyectos.php');

class ColaboradorDao implements IColaboradorDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Colaborador en la base de datos.
     * @param colaborador objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($colaborador){
      $id=$colaborador->getId();
$nombre=$colaborador->getNombre();
$codigo=$colaborador->getCodigo();
$tp_colaborador=$colaborador->getTp_colaborador();
$proyectos_id=$colaborador->getProyectos_id()->getId();

      try {
          $sql= "INSERT INTO `colaborador`( `id`, `nombre`, `codigo`, `tp_colaborador`, `proyectos_id`)"
          ."VALUES ('$id','$nombre','$codigo','$tp_colaborador','$proyectos_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Colaborador en la base de datos.
     * @param colaborador objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($colaborador){
      $id=$colaborador->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `codigo`, `tp_colaborador`, `proyectos_id`"
          ."FROM `colaborador`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $colaborador->setId($data[$i]['id']);
          $colaborador->setNombre($data[$i]['nombre']);
          $colaborador->setCodigo($data[$i]['codigo']);
          $colaborador->setTp_colaborador($data[$i]['tp_colaborador']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $colaborador->setProyectos_id($proyectos);

          }
      return $colaborador;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Colaborador en la base de datos.
     * @param colaborador objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($colaborador){
      $id=$colaborador->getId();
$nombre=$colaborador->getNombre();
$codigo=$colaborador->getCodigo();
$tp_colaborador=$colaborador->getTp_colaborador();
$proyectos_id=$colaborador->getProyectos_id()->getId();

      try {
          $sql= "UPDATE `colaborador` SET`id`='$id' ,`nombre`='$nombre' ,`codigo`='$codigo' ,`tp_colaborador`='$tp_colaborador' ,`proyectos_id`='$proyectos_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Colaborador en la base de datos.
     * @param colaborador objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($colaborador){
      $id=$colaborador->getId();

      try {
          $sql ="DELETE FROM `colaborador` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Colaborador en la base de datos.
     * @return ArrayList<Colaborador> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `codigo`, `tp_colaborador`, `proyectos_id`"
          ."FROM `colaborador`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $colaborador= new Colaborador();
          $colaborador->setId($data[$i]['id']);
          $colaborador->setNombre($data[$i]['nombre']);
          $colaborador->setCodigo($data[$i]['codigo']);
          $colaborador->setTp_colaborador($data[$i]['tp_colaborador']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $colaborador->setProyectos_id($proyectos);

          array_push($lista,$colaborador);
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