<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Los animales, asombrados, pasaron su mirada del cerdo al hombre, y del hombre al cerdo; y, nuevamente, del cerdo al hombre; pero ya era imposible distinguir quién era uno y quién era otro.  \\

include_once realpath('../dao/interfaz/IGrupo_has_proyectoDao.php');
include_once realpath('../dto/Grupo_has_proyecto.php');
include_once realpath('../dto/Grupo_investigacion.php');
include_once realpath('../dto/Proyectos.php');

class Grupo_has_proyectoDao implements IGrupo_has_proyectoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Grupo_has_proyecto en la base de datos.
     * @param grupo_has_proyecto objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($grupo_has_proyecto){
      $id=$grupo_has_proyecto->getId();
$grupo_investigacion_id=$grupo_has_proyecto->getGrupo_investigacion_id()->getId();
$proyectos_terminados_id=$grupo_has_proyecto->getProyectos_terminados_id()->getId();

      try {
          $sql= "INSERT INTO `grupo_has_proyecto`( `id`, `grupo_investigacion_id`, `proyectos_terminados_id`)"
          ."VALUES ('$id','$grupo_investigacion_id','$proyectos_terminados_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_has_proyecto en la base de datos.
     * @param grupo_has_proyecto objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($grupo_has_proyecto){
      $id=$grupo_has_proyecto->getId();

      try {
          $sql= "SELECT `id`, `grupo_investigacion_id`, `proyectos_terminados_id`"
          ."FROM `grupo_has_proyecto`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $grupo_has_proyecto->setId($data[$i]['id']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $grupo_has_proyecto->setGrupo_investigacion_id($grupo_investigacion);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_terminados_id']);
           $grupo_has_proyecto->setProyectos_terminados_id($proyectos);

          }
      return $grupo_has_proyecto;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Grupo_has_proyecto en la base de datos.
     * @param grupo_has_proyecto objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($grupo_has_proyecto){
      $id=$grupo_has_proyecto->getId();
$grupo_investigacion_id=$grupo_has_proyecto->getGrupo_investigacion_id()->getId();
$proyectos_terminados_id=$grupo_has_proyecto->getProyectos_terminados_id()->getId();

      try {
          $sql= "UPDATE `grupo_has_proyecto` SET`id`='$id' ,`grupo_investigacion_id`='$grupo_investigacion_id' ,`proyectos_terminados_id`='$proyectos_terminados_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Grupo_has_proyecto en la base de datos.
     * @param grupo_has_proyecto objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($grupo_has_proyecto){
      $id=$grupo_has_proyecto->getId();

      try {
          $sql ="DELETE FROM `grupo_has_proyecto` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_has_proyecto en la base de datos.
     * @return ArrayList<Grupo_has_proyecto> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `grupo_investigacion_id`, `proyectos_terminados_id`"
          ."FROM `grupo_has_proyecto`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $grupo_has_proyecto= new Grupo_has_proyecto();
          $grupo_has_proyecto->setId($data[$i]['id']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $grupo_has_proyecto->setGrupo_investigacion_id($grupo_investigacion);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_terminados_id']);
           $grupo_has_proyecto->setProyectos_terminados_id($proyectos);

          array_push($lista,$grupo_has_proyecto);
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