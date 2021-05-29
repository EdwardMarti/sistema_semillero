<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\

include_once realpath('../dao/interfaz/IActividadesDao.php');
include_once realpath('../dto/Actividades.php');
include_once realpath('../dto/Proyectos.php');

class ActividadesDao implements IActividadesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Actividades en la base de datos.
     * @param actividades objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($actividades){
      $id=$actividades->getId();
$descripcion=$actividades->getDescripcion();
$proyectos_id=$actividades->getProyectos_id()->getId();

      try {
          $sql= "INSERT INTO `actividades`( `id`, `descripcion`, `proyectos_id`)"
          ."VALUES ('$id','$descripcion','$proyectos_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Actividades en la base de datos.
     * @param actividades objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($actividades){
      $id=$actividades->getId();

      try {
          $sql= "SELECT `id`, `descripcion`, `proyectos_id`"
          ."FROM `actividades`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $actividades->setId($data[$i]['id']);
          $actividades->setDescripcion($data[$i]['descripcion']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $actividades->setProyectos_id($proyectos);

          }
      return $actividades;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Actividades en la base de datos.
     * @param actividades objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($actividades){
      $id=$actividades->getId();
$descripcion=$actividades->getDescripcion();
$proyectos_id=$actividades->getProyectos_id()->getId();

      try {
          $sql= "UPDATE `actividades` SET`id`='$id' ,`descripcion`='$descripcion' ,`proyectos_id`='$proyectos_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Actividades en la base de datos.
     * @param actividades objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($actividades){
      $id=$actividades->getId();

      try {
          $sql ="DELETE FROM `actividades` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Actividades en la base de datos.
     * @return ArrayList<Actividades> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `descripcion`, `proyectos_id`"
          ."FROM `actividades`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $actividades= new Actividades();
          $actividades->setId($data[$i]['id']);
          $actividades->setDescripcion($data[$i]['descripcion']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $actividades->setProyectos_id($proyectos);

          array_push($lista,$actividades);
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