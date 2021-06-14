<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me ayudas con la tesis?  \\

include_once realpath('../dao/interfaz/IDocenteDao.php');
include_once realpath('../dto/Docente.php');
include_once realpath('../dto/Persona.php');
include_once realpath('../dto/Tipo_vinculacion.php');

class DocenteDao implements IDocenteDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Docente en la base de datos.
     * @param docente objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($docente){
//      $id=$docente->getId();
$persona_id=$docente->getPersona_id()->getId();
$password=$docente->getPassword();
$tipo_vinculacion_id=$docente->getTipo_vinculacion_id()->getId();
$ubicacion=$docente->getUbicacion();

      try {
          $sql= "INSERT INTO `docente`(  `persona_id`, `password`, `tipo_vinculacion_id`, `ubicacion`)"
          ."VALUES ('$persona_id','$password','$tipo_vinculacion_id','$ubicacion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Docente en la base de datos.
     * @param docente objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($docente){
      $id=$docente->getId();

      try {
          $sql= "SELECT `id`, `persona_id`, `password`, `tipo_vinculacion_id`, `ubicacion`"
          ."FROM `docente`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $docente->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $docente->setPersona_id($persona);
          $docente->setPassword($data[$i]['password']);
           $tipo_vinculacion = new Tipo_vinculacion();
           $tipo_vinculacion->setId($data[$i]['tipo_vinculacion_id']);
           $docente->setTipo_vinculacion_id($tipo_vinculacion);
          $docente->setUbicacion($data[$i]['ubicacion']);

          }
      return $docente;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Docente en la base de datos.
     * @param docente objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($docente){
      $id=$docente->getId();
$persona_id=$docente->getPersona_id()->getId();
$password=$docente->getPassword();
$tipo_vinculacion_id=$docente->getTipo_vinculacion_id()->getId();
$ubicacion=$docente->getUbicacion();

      try {
          $sql= "UPDATE `docente` SET`id`='$id' ,`persona_id`='$persona_id' ,`password`='$password' ,`tipo_vinculacion_id`='$tipo_vinculacion_id' ,`ubicacion`='$ubicacion' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  
  public function update2($persona_id,  $tipo_vinculacion_id, $ubicacion){


      try {
          $sql= "UPDATE `docente` SET  `tipo_vinculacion_id`='$tipo_vinculacion_id' ,`ubicacion`='$ubicacion' WHERE `persona_id`='$persona_id' ";
           return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Docente en la base de datos.
     * @param docente objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($docente){
      $id=$docente->getId();

      try {
          $sql ="DELETE FROM `docente` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Docente en la base de datos.
     * @return ArrayList<Docente> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `persona_id`, `password`, `tipo_vinculacion_id`, `ubicacion`"
          ."FROM `docente`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $docente= new Docente();
          $docente->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $docente->setPersona_id($persona);
          $docente->setPassword($data[$i]['password']);
           $tipo_vinculacion = new Tipo_vinculacion();
           $tipo_vinculacion->setId($data[$i]['tipo_vinculacion_id']);
           $docente->setTipo_vinculacion_id($tipo_vinculacion);
          $docente->setUbicacion($data[$i]['ubicacion']);

          array_push($lista,$docente);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  public function listAll_id(){
      $lista = array();
      try {
          $sql ="SELECT  persona.nombre, persona.correo,  persona.telefono, tp.descripcion   , s.`semillero_id`
                FROM `persona_has_semillero` s
                INNER JOIN persona
                ON persona.id=s.persona_id
                INNER JOIN docente 
                on persona.id=docente.persona_id
                INNER JOIN tipo_vinculacion as tp
                on docente.tipo_vinculacion_id=tp.id WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $docente= new Docente();
          $docente->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $docente->setPersona_id($persona);
          $docente->setPassword($data[$i]['password']);
           $tipo_vinculacion = new Tipo_vinculacion();
           $tipo_vinculacion->setId($data[$i]['tipo_vinculacion_id']);
           $docente->setTipo_vinculacion_id($tipo_vinculacion);
          $docente->setUbicacion($data[$i]['ubicacion']);

          array_push($lista,$docente);
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
    
    public function updateConsulta($sql)
    {
        try {
            $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sentencia = $this->cn->prepare($sql);
            $sentencia->execute();
            $rta = 1;
            $sentencia = null;
            return $rta;
        } catch (Exception $e) {
            return 0;
        }
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!