<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ͡~ ͜ʖ ͡°)  \\

include_once realpath('../dao/interfaz/IEstudiante_proyectoDao.php');
include_once realpath('../dto/Estudiante_proyecto.php');


class Estudiante_proyectoDao implements IEstudiante_proyectoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Estudiante_proyecto en la base de datos.
     * @param estudiante objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
public function insert($estudiante_proyecto){
    $codigo=$estudiante_proyecto->getCodigo();
    $nombre=$estudiante_proyecto->getNombre();
    $proyectos_id=$estudiante_proyecto->getProyecto_id();
   

    try {
        $sql= "INSERT INTO  `estudiante_proyecto`( `codigo`, `nombre`, `proyectos_id`)"
        ."VALUES ('$codigo','$nombre','$proyectos_id')";
        return $this->insertarConsulta($sql);
    } catch (SQLException $e) {
        throw new Exception('Primary key is null');
    }
}

    /**
     * Busca un objeto Estudiante_proyecto en la base de datos.
     * @param estudiante objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($estudiante_proyecto){
      $id=$estudiante_proyecto->getId();

      try {
          $sql= "SELECT `id`, `codigo`, `nombre`, `proyectos_id`"
          ."FROM  `estudiante_proyecto`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $estudiante_proyecto->setId($data[$i]['id']);
          $estudiante_proyecto->setCodigo($data[$i]['codigo']);
          $estudiante_proyecto->setNombre($data[$i]['nombre']);
          $estudiante_proyecto->setProyecto_id($data[$i]['proyectos_id']);
         

          }
      return $estudiante_proyecto;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Estudiante_proyecto en la base de datos.
     * @param estudiante objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($estudiante_proyecto){
    $id=$estudiante_proyecto->getId();
    $codigo=$estudiante_proyecto->getCodigo();
    $nombre=$estudiante_proyecto->getNombre();
    $proyectos_id=$estudiante_proyecto->getProyecto_id();
 

  
      try {
          $sql= "UPDATE  `estudiante_proyecto` SET  `codigo`='$codigo' ,`nombre`='$nombre' ,
          `proyectos_id`='$proyectos_id'  WHERE `id`='$id' ";
         return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Estudiante_proyecto en la base de datos.
     * @param estudiante objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($estudiante_proyecto){
      $id=$estudiante_proyecto->getId();

      try {
          $sql ="DELETE FROM  `estudiante_proyecto` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Estudiante_proyecto en la base de datos.
     * @return ArrayList<Estudiante_proyecto> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `codigo`, `nombre`, `proyectos_id`"
          ."FROM  `estudiante_proyecto`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $estudiante_proyecto= new Estudiante_proyecto();
          $estudiante_proyecto->setId($data[$i]['id']);
          $estudiante_proyecto->setCodigo($data[$i]['codigo']);
          $estudiante_proyecto->setNombre($data[$i]['nombre']);
          $estudiante_proyecto->setProyecto_id($data[$i]['proyectos_id']);
         
          array_push($lista,$estudiante_proyecto);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_Semillero($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `codigo`, `nombre`, `proyectos_id`"
          ."FROM  `estudiante_proyecto`"
          ."WHERE `proyectos_id` = '$id' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $estudiante_proyecto= new Estudiante_proyecto();
          $estudiante_proyecto->setId($data[$i]['id']);
          $estudiante_proyecto->setCodigo($data[$i]['codigo']);
          $estudiante_proyecto->setNombre($data[$i]['nombre']);
          $estudiante_proyecto->setProyecto_id($data[$i]['proyectos_id']);
         
          array_push($lista,$estudiante_proyecto);
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