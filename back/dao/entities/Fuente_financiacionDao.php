<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    A vote for Bart is a vote for Anarchy!  \\

include_once realpath('../dao/interfaz/IFuente_financiacionDao.php');
include_once realpath('../dto/Fuente_financiacion.php');
include_once realpath('../dto/Proyectos.php');

class Fuente_financiacionDao implements IFuente_financiacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Fuente_financiacion en la base de datos.
     * @param fuente_financiacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($fuente_financiacion){
      $id=$fuente_financiacion->getId();
$fuente=$fuente_financiacion->getFuente();
$valor=$fuente_financiacion->getValor();
$proyectos_terminados_id=$fuente_financiacion->getProyectos_terminados_id()->getId();

      try {
          $sql= "INSERT INTO `fuente_financiacion`( `id`, `fuente`, `valor`, `proyectos_terminados_id`)"
          ."VALUES ('$id','$fuente','$valor','$proyectos_terminados_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fuente_financiacion en la base de datos.
     * @param fuente_financiacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($fuente_financiacion){
      $id=$fuente_financiacion->getId();

      try {
          $sql= "SELECT `id`, `fuente`, `valor`, `proyectos_terminados_id`"
          ."FROM `fuente_financiacion`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $fuente_financiacion->setId($data[$i]['id']);
          $fuente_financiacion->setFuente($data[$i]['fuente']);
          $fuente_financiacion->setValor($data[$i]['valor']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_terminados_id']);
           $fuente_financiacion->setProyectos_terminados_id($proyectos);

          }
      return $fuente_financiacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Fuente_financiacion en la base de datos.
     * @param fuente_financiacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($fuente_financiacion){
      $id=$fuente_financiacion->getId();
$fuente=$fuente_financiacion->getFuente();
$valor=$fuente_financiacion->getValor();
$proyectos_terminados_id=$fuente_financiacion->getProyectos_terminados_id()->getId();

      try {
          $sql= "UPDATE `fuente_financiacion` SET`id`='$id' ,`fuente`='$fuente' ,`valor`='$valor' ,`proyectos_terminados_id`='$proyectos_terminados_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Fuente_financiacion en la base de datos.
     * @param fuente_financiacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($fuente_financiacion){
      $id=$fuente_financiacion->getId();

      try {
          $sql ="DELETE FROM `fuente_financiacion` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Fuente_financiacion en la base de datos.
     * @return ArrayList<Fuente_financiacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `fuente`, `valor`, `proyectos_terminados_id`"
          ."FROM `fuente_financiacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $fuente_financiacion= new Fuente_financiacion();
          $fuente_financiacion->setId($data[$i]['id']);
          $fuente_financiacion->setFuente($data[$i]['fuente']);
          $fuente_financiacion->setValor($data[$i]['valor']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_terminados_id']);
           $fuente_financiacion->setProyectos_terminados_id($proyectos);

          array_push($lista,$fuente_financiacion);
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