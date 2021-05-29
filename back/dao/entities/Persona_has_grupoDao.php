<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El código es tuyo, modifícalo como quieras  \\

include_once realpath('../dao/interfaz/IPersona_has_grupoDao.php');
include_once realpath('../dto/Persona_has_grupo.php');
include_once realpath('../dto/Grupo_investigacion.php');
include_once realpath('../dto/Persona.php');

class Persona_has_grupoDao implements IPersona_has_grupoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Persona_has_grupo en la base de datos.
     * @param persona_has_grupo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($persona_has_grupo){
      $id=$persona_has_grupo->getId();
$grupo_investigacion_id=$persona_has_grupo->getGrupo_investigacion_id()->getId();
$persona_id=$persona_has_grupo->getPersona_id()->getId();

      try {
          $sql= "INSERT INTO `persona_has_grupo`( `id`, `grupo_investigacion_id`, `persona_id`)"
          ."VALUES ('$id','$grupo_investigacion_id','$persona_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona_has_grupo en la base de datos.
     * @param persona_has_grupo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($persona_has_grupo){
      $id=$persona_has_grupo->getId();

      try {
          $sql= "SELECT `id`, `grupo_investigacion_id`, `persona_id`"
          ."FROM `persona_has_grupo`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $persona_has_grupo->setId($data[$i]['id']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $persona_has_grupo->setGrupo_investigacion_id($grupo_investigacion);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona_has_grupo->setPersona_id($persona);

          }
      return $persona_has_grupo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Persona_has_grupo en la base de datos.
     * @param persona_has_grupo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($persona_has_grupo){
      $id=$persona_has_grupo->getId();
$grupo_investigacion_id=$persona_has_grupo->getGrupo_investigacion_id()->getId();
$persona_id=$persona_has_grupo->getPersona_id()->getId();

      try {
          $sql= "UPDATE `persona_has_grupo` SET`id`='$id' ,`grupo_investigacion_id`='$grupo_investigacion_id' ,`persona_id`='$persona_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Persona_has_grupo en la base de datos.
     * @param persona_has_grupo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($persona_has_grupo){
      $id=$persona_has_grupo->getId();

      try {
          $sql ="DELETE FROM `persona_has_grupo` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona_has_grupo en la base de datos.
     * @return ArrayList<Persona_has_grupo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `grupo_investigacion_id`, `persona_id`"
          ."FROM `persona_has_grupo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $persona_has_grupo= new Persona_has_grupo();
          $persona_has_grupo->setId($data[$i]['id']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $persona_has_grupo->setGrupo_investigacion_id($grupo_investigacion);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona_has_grupo->setPersona_id($persona);

          array_push($lista,$persona_has_grupo);
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