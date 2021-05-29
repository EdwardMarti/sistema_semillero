<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\

include_once realpath('../dao/interfaz/IGrupo_linea_investigacionDao.php');
include_once realpath('../dto/Grupo_linea_investigacion.php');
include_once realpath('../dto/Grupo_investigacion.php');
include_once realpath('../dto/Linea_investigacion.php');

class Grupo_linea_investigacionDao implements IGrupo_linea_investigacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Grupo_linea_investigacion en la base de datos.
     * @param grupo_linea_investigacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($grupo_linea_investigacion){
      $id=$grupo_linea_investigacion->getId();
$grupo_investigacion_id=$grupo_linea_investigacion->getGrupo_investigacion_id()->getId();
$linea_investigacion_id=$grupo_linea_investigacion->getLinea_investigacion_id()->getId();

      try {
          $sql= "INSERT INTO `grupo_linea_investigacion`( `id`, `grupo_investigacion_id`, `linea_investigacion_id`)"
          ."VALUES ('$id','$grupo_investigacion_id','$linea_investigacion_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_linea_investigacion en la base de datos.
     * @param grupo_linea_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($grupo_linea_investigacion){
      $id=$grupo_linea_investigacion->getId();

      try {
          $sql= "SELECT `id`, `grupo_investigacion_id`, `linea_investigacion_id`"
          ."FROM `grupo_linea_investigacion`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $grupo_linea_investigacion->setId($data[$i]['id']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $grupo_linea_investigacion->setGrupo_investigacion_id($grupo_investigacion);
           $linea_investigacion = new Linea_investigacion();
           $linea_investigacion->setId($data[$i]['linea_investigacion_id']);
           $grupo_linea_investigacion->setLinea_investigacion_id($linea_investigacion);

          }
      return $grupo_linea_investigacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Grupo_linea_investigacion en la base de datos.
     * @param grupo_linea_investigacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($grupo_linea_investigacion){
      $id=$grupo_linea_investigacion->getId();
$grupo_investigacion_id=$grupo_linea_investigacion->getGrupo_investigacion_id()->getId();
$linea_investigacion_id=$grupo_linea_investigacion->getLinea_investigacion_id()->getId();

      try {
          $sql= "UPDATE `grupo_linea_investigacion` SET`id`='$id' ,`grupo_investigacion_id`='$grupo_investigacion_id' ,`linea_investigacion_id`='$linea_investigacion_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Grupo_linea_investigacion en la base de datos.
     * @param grupo_linea_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($grupo_linea_investigacion){
      $id=$grupo_linea_investigacion->getId();

      try {
          $sql ="DELETE FROM `grupo_linea_investigacion` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_linea_investigacion en la base de datos.
     * @return ArrayList<Grupo_linea_investigacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `grupo_investigacion_id`, `linea_investigacion_id`"
          ."FROM `grupo_linea_investigacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $grupo_linea_investigacion= new Grupo_linea_investigacion();
          $grupo_linea_investigacion->setId($data[$i]['id']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $grupo_linea_investigacion->setGrupo_investigacion_id($grupo_investigacion);
           $linea_investigacion = new Linea_investigacion();
           $linea_investigacion->setId($data[$i]['linea_investigacion_id']);
           $grupo_linea_investigacion->setLinea_investigacion_id($linea_investigacion);

          array_push($lista,$grupo_linea_investigacion);
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