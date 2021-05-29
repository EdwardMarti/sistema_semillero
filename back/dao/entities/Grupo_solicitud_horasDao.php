<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\

include_once realpath('../dao/interfaz/IGrupo_solicitud_horasDao.php');
include_once realpath('../dto/Grupo_solicitud_horas.php');
include_once realpath('../dto/Solicitud_horas.php');
include_once realpath('../dto/Grupo_investigacion.php');

class Grupo_solicitud_horasDao implements IGrupo_solicitud_horasDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Grupo_solicitud_horas en la base de datos.
     * @param grupo_solicitud_horas objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($grupo_solicitud_horas){
      $id=$grupo_solicitud_horas->getId();
$solicitud_horas_id=$grupo_solicitud_horas->getSolicitud_horas_id()->getId();
$grupo_investigacion_id=$grupo_solicitud_horas->getGrupo_investigacion_id()->getId();

      try {
          $sql= "INSERT INTO `grupo_solicitud_horas`( `id`, `solicitud_horas_id`, `grupo_investigacion_id`)"
          ."VALUES ('$id','$solicitud_horas_id','$grupo_investigacion_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_solicitud_horas en la base de datos.
     * @param grupo_solicitud_horas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($grupo_solicitud_horas){
      $id=$grupo_solicitud_horas->getId();

      try {
          $sql= "SELECT `id`, `solicitud_horas_id`, `grupo_investigacion_id`"
          ."FROM `grupo_solicitud_horas`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $grupo_solicitud_horas->setId($data[$i]['id']);
           $solicitud_horas = new Solicitud_horas();
           $solicitud_horas->setId($data[$i]['solicitud_horas_id']);
           $grupo_solicitud_horas->setSolicitud_horas_id($solicitud_horas);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $grupo_solicitud_horas->setGrupo_investigacion_id($grupo_investigacion);

          }
      return $grupo_solicitud_horas;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Grupo_solicitud_horas en la base de datos.
     * @param grupo_solicitud_horas objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($grupo_solicitud_horas){
      $id=$grupo_solicitud_horas->getId();
$solicitud_horas_id=$grupo_solicitud_horas->getSolicitud_horas_id()->getId();
$grupo_investigacion_id=$grupo_solicitud_horas->getGrupo_investigacion_id()->getId();

      try {
          $sql= "UPDATE `grupo_solicitud_horas` SET`id`='$id' ,`solicitud_horas_id`='$solicitud_horas_id' ,`grupo_investigacion_id`='$grupo_investigacion_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Grupo_solicitud_horas en la base de datos.
     * @param grupo_solicitud_horas objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($grupo_solicitud_horas){
      $id=$grupo_solicitud_horas->getId();

      try {
          $sql ="DELETE FROM `grupo_solicitud_horas` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_solicitud_horas en la base de datos.
     * @return ArrayList<Grupo_solicitud_horas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `solicitud_horas_id`, `grupo_investigacion_id`"
          ."FROM `grupo_solicitud_horas`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $grupo_solicitud_horas= new Grupo_solicitud_horas();
          $grupo_solicitud_horas->setId($data[$i]['id']);
           $solicitud_horas = new Solicitud_horas();
           $solicitud_horas->setId($data[$i]['solicitud_horas_id']);
           $grupo_solicitud_horas->setSolicitud_horas_id($solicitud_horas);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $grupo_solicitud_horas->setGrupo_investigacion_id($grupo_investigacion);

          array_push($lista,$grupo_solicitud_horas);
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