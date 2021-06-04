<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Y pensar que Anarchy está hecho en código espagueti...  \\

include_once realpath('../dao/interfaz/IPersonaDao.php');
include_once realpath('../dto/Persona.php');
include_once realpath('../dto/Perfiles.php');

class PersonaDao implements IPersonaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Persona en la base de datos.
     * @param persona objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($persona){
    //      $id=$persona->getId();
    $nombre=$persona->getNombre();
    $telefono=$persona->getTelefono();
    $correo=$persona->getCorreo();
    $perfiles_id=$persona->getPerfiles_id()->getId();

      try {
          $sql= "INSERT INTO `persona`(  `nombre`, `telefono`, `correo`, `perfiles_id`)"
          ."VALUES ( '$nombre','$telefono','$correo','$perfiles_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona en la base de datos.
     * @param persona objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($persona){
      $id=$persona->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `telefono`, `correo`, `perfiles_id`"
          ."FROM `persona`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $persona->setId($data[$i]['id']);
          $persona->setNombre($data[$i]['nombre']);
          $persona->setTelefono($data[$i]['telefono']);
          $persona->setCorreo($data[$i]['correo']);
           $perfiles = new Perfiles();
           $perfiles->setId($data[$i]['perfiles_id']);
           $persona->setPerfiles_id($perfiles);

          }
      return $persona;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Persona en la base de datos.
     * @param persona objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($persona){
      $id=$persona->getId();
$nombre=$persona->getNombre();
$telefono=$persona->getTelefono();
$correo=$persona->getCorreo();
$perfiles_id=$persona->getPerfiles_id()->getId();

      try {
          $sql= "UPDATE `persona` SET`id`='$id' ,`nombre`='$nombre' ,`telefono`='$telefono' ,`correo`='$correo' ,`perfiles_id`='$perfiles_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Persona en la base de datos.
     * @param persona objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($persona){
      $id=$persona->getId();

      try {
          $sql ="DELETE FROM `persona` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona en la base de datos.
     * @return ArrayList<Persona> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `telefono`, `correo`, `perfiles_id`"
          ."FROM `persona`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $persona= new Persona();
          $persona->setId($data[$i]['id']);
          $persona->setNombre($data[$i]['nombre']);
          $persona->setTelefono($data[$i]['telefono']);
          $persona->setCorreo($data[$i]['correo']);
           $perfiles = new Perfiles();
           $perfiles->setId($data[$i]['perfiles_id']);
           $persona->setPerfiles_id($perfiles);

          array_push($lista,$persona);
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