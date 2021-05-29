<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\

include_once realpath('../dao/interfaz/IGrupo_has_participanteDao.php');
include_once realpath('../dto/Grupo_has_participante.php');
include_once realpath('../dto/Grupo_investigacion.php');

class Grupo_has_participanteDao implements IGrupo_has_participanteDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Grupo_has_participante en la base de datos.
     * @param grupo_has_participante objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($grupo_has_participante){
      $id=$grupo_has_participante->getId();
$participantes_id=$grupo_has_participante->getParticipantes_id();
$grupo_investigacion_id=$grupo_has_participante->getGrupo_investigacion_id()->getId();

      try {
          $sql= "INSERT INTO `grupo_has_participante`( `id`, `participantes_id`, `grupo_investigacion_id`)"
          ."VALUES ('$id','$participantes_id','$grupo_investigacion_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_has_participante en la base de datos.
     * @param grupo_has_participante objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($grupo_has_participante){
      $id=$grupo_has_participante->getId();

      try {
          $sql= "SELECT `id`, `participantes_id`, `grupo_investigacion_id`"
          ."FROM `grupo_has_participante`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $grupo_has_participante->setId($data[$i]['id']);
          $grupo_has_participante->setParticipantes_id($data[$i]['participantes_id']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $grupo_has_participante->setGrupo_investigacion_id($grupo_investigacion);

          }
      return $grupo_has_participante;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Grupo_has_participante en la base de datos.
     * @param grupo_has_participante objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($grupo_has_participante){
      $id=$grupo_has_participante->getId();
$participantes_id=$grupo_has_participante->getParticipantes_id();
$grupo_investigacion_id=$grupo_has_participante->getGrupo_investigacion_id()->getId();

      try {
          $sql= "UPDATE `grupo_has_participante` SET`id`='$id' ,`participantes_id`='$participantes_id' ,`grupo_investigacion_id`='$grupo_investigacion_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Grupo_has_participante en la base de datos.
     * @param grupo_has_participante objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($grupo_has_participante){
      $id=$grupo_has_participante->getId();

      try {
          $sql ="DELETE FROM `grupo_has_participante` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_has_participante en la base de datos.
     * @return ArrayList<Grupo_has_participante> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `participantes_id`, `grupo_investigacion_id`"
          ."FROM `grupo_has_participante`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $grupo_has_participante= new Grupo_has_participante();
          $grupo_has_participante->setId($data[$i]['id']);
          $grupo_has_participante->setParticipantes_id($data[$i]['participantes_id']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $grupo_has_participante->setGrupo_investigacion_id($grupo_investigacion);

          array_push($lista,$grupo_has_participante);
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