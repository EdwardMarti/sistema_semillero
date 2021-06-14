<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿En serio? ¿Tantos buenos frameworks y estás usando Anarchy?  \\

include_once realpath('../dao/interfaz/ICapacitaciones_ProyectosDao.php');
include_once realpath('../dto/Capacitaciones_Proyectos.php');
include_once realpath('../dto/Semillero.php');

class Capacitaciones_ProyectosDao implements ICapacitaciones_ProyectosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Capacitaciones_Proyectos en la base de datos.
     * @param capacitaciones_Proyectos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($capacitaciones_Proyectos){
//      $id=$capacitaciones_Proyectos->getId();
$tema=$capacitaciones_Proyectos->getTema();
$docente=$capacitaciones_Proyectos->getDocente();
$fecha=$capacitaciones_Proyectos->getFecha();
$cant_capacitados=$capacitaciones_Proyectos->getCant_capacitados();
$proyecto_id=$capacitaciones_Proyectos->getProyecto_id();
$objetivo=$capacitaciones_Proyectos->getObjetivo();
$responsable=$capacitaciones_Proyectos->getResponsable();

      try {
          $sql= "INSERT INTO `capacitaciones_Proyectos`(  `tema`, `docente`, `fecha`, `cant_capacitados`, `proyecto_id`, `objetivo`,  `responsable` )"
          ."VALUES ('$tema','$docente','$fecha','$cant_capacitados','$proyecto_id','$objetivo' ,'$responsable')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }


    /**
     * Busca un objeto Capacitaciones_Proyectos en la base de datos.
     * @param capacitaciones_Proyectos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($capacitaciones_Proyectos){
      $id=$capacitaciones_Proyectos->getId();

      try {
          $sql= "SELECT `id`, `tema`, `docente`, `fecha`, `cant_capacitados`, `proyecto_id`, `objetivo`,  `responsable`"
          ."FROM `capacitaciones_Proyectos`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $capacitaciones_Proyectos->setId($data[$i]['id']);
          $capacitaciones_Proyectos->setTema($data[$i]['tema']);
          $capacitaciones_Proyectos->setDocente($data[$i]['docente']);
          $capacitaciones_Proyectos->setFecha($data[$i]['fecha']);
          $capacitaciones_Proyectos->setCant_capacitados($data[$i]['cant_capacitados']);
          
           $capacitaciones_Proyectos->setProyecto_id($data[$i]['proyecto_id']);
         
          $capacitaciones_Proyectos->setObjetivo($data[$i]['objetivo']);
          $capacitaciones_Proyectos->setResponsable($data[$i]['responsable']);

          }
      return $capacitaciones_Proyectos;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Capacitaciones_Proyectos en la base de datos.
     * @param capacitaciones_Proyectos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($capacitaciones_Proyectos){
      $id=$capacitaciones_Proyectos->getId();
$tema=$capacitaciones_Proyectos->getTema();
$docente=$capacitaciones_Proyectos->getDocente();
$fecha=$capacitaciones_Proyectos->getFecha();
$cant_capacitados=$capacitaciones_Proyectos->getCant_capacitados();
$proyecto_id=$capacitaciones_Proyectos->getProyecto_id();
$objetivo=$capacitaciones_Proyectos->getObjetivo();
$responsable=$capacitaciones_Proyectos->getResponsable();

      try {
          $sql= "UPDATE `capacitaciones_Proyectos` SET`id`='$id' ,`tema`='$tema' ,`docente`='$docente' ,`fecha`='$fecha' ,`cant_capacitados`='$cant_capacitados' ,`proyecto_id`='$proyecto_id' ,`objetivo`='$objetivo', `responsable`= '$responsable' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  


    /**
     * Elimina un objeto Capacitaciones_Proyectos en la base de datos.
     * @param capacitaciones_Proyectos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($capacitaciones_Proyectos){
      $id=$capacitaciones_Proyectos->getId();

      try {
          $sql ="DELETE FROM `capacitaciones_Proyectos` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Capacitaciones_Proyectos en la base de datos.
     * @return ArrayList<Capacitaciones_Proyectos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `tema`, `docente`, `fecha`, `cant_capacitados`, `proyecto_id`, `objetivo`, `responsable` "
          ."FROM `capacitaciones_Proyectos`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $capacitaciones_Proyectos= new Capacitaciones_Proyectos();
          $capacitaciones_Proyectos->setId($data[$i]['id']);
          $capacitaciones_Proyectos->setTema($data[$i]['tema']);
          $capacitaciones_Proyectos->setDocente($data[$i]['docente']);
          $capacitaciones_Proyectos->setFecha($data[$i]['fecha']);
          $capacitaciones_Proyectos->setCant_capacitados($data[$i]['cant_capacitados']);
          $capacitaciones_Proyectos->setProyecto_id($data[$i]['proyecto_id']);
          $capacitaciones_Proyectos->setObjetivo($data[$i]['objetivo']);
          $capacitaciones_Proyectos->setResponsable($data[$i]['responsable']);

          array_push($lista,$capacitaciones_Proyectos);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_idProy($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `tema`, `docente`, `fecha`, `cant_capacitados`, `proyecto_id`, `objetivo`, `responsable` FROM `capacitaciones_Proyectos` WHERE `proyecto_id` = '$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $capacitaciones_Proyectos= new Capacitaciones_Proyectos();
          $capacitaciones_Proyectos->setId($data[$i]['id']);
          $capacitaciones_Proyectos->setTema($data[$i]['tema']);
          $capacitaciones_Proyectos->setDocente($data[$i]['docente']);
          $capacitaciones_Proyectos->setFecha($data[$i]['fecha']);
          $capacitaciones_Proyectos->setCant_capacitados($data[$i]['cant_capacitados']);
          $capacitaciones_Proyectos->setProyecto_id($data[$i]['proyecto_id']);
          $capacitaciones_Proyectos->setObjetivo($data[$i]['objetivo']);
          $capacitaciones_Proyectos->setResponsable($data[$i]['responsable']);

          array_push($lista,$capacitaciones_Proyectos);
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