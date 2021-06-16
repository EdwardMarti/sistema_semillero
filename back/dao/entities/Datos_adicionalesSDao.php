<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora con 25% menos groserías  \\

include_once realpath('../dao/interfaz/IDatos_adicionalesSDao.php');
include_once realpath('../dto/Datos_adicionalesS.php');

class Datos_adicionalesSDao implements IDatos_adicionalesSDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto datos_adicionalesS en la base de datos.
     * @param datos_adicionalesS objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($datos_adicionalesS){
    $producto=$datos_adicionalesS->getProducto();
    $descripcion=$datos_adicionalesS->getDescripcion();
    $fecha=$datos_adicionalesS->getFecha();
    $calificacion=$datos_adicionalesS->getCalificacion();
    $id_plan=$datos_adicionalesS->getId_plan();
    $id_semillero=$datos_adicionalesS->getId_semillero();



      try {
          $sql= "INSERT INTO `datos_adicionalesS`( `producto`, `descripcion`, `fecha`, `calificacion`, `id_plan`, `id_semillero`)"
          ."VALUES ('$producto','$descripcion','$fecha','$calificacion','$id_plan','$id_semillero')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto datos_adicionalesS en la base de datos.
     * @param datos_adicionalesS objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($id){

      try {
          $sql= "SELECT `id`, `producto`, `descripcion`, `fecha`, `calificacion`, `id_plan`, `id_semillero`"
          ."FROM `datos`"
          ."WHERE `id_semillero`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $datos_adicionalesS->setId($data[$i]['id']);
          $datos_adicionalesS->setProducto($data[$i]['producto']);
          $datos_adicionalesS->setDescripcion($data[$i]['descripcion']);
          $datos_adicionalesS->setFecha($data[$i]['fecha']);
          $datos_adicionalesS->setCalificacion($data[$i]['calificacion']);
          $datos_adicionalesS->setId_plan($data[$i]['id_plan']);
          $datos_adicionalesS->setId_semillero($data[$i]['id_semillero']);
          
          

          }
      return $datos_adicionalesS;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  public function list_adicionales($id){
      try {
            $sql= "SELECT `id`, `producto`, `descripcion`, `fecha`, `calificacion`, `id_plan`, `id_semillero`"
            ." FROM `datos` "
            ." WHERE `id_semillero`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i=0; $i < count($data) ; $i++) {
                $datos_adicionalesS->setId($data[$i]['id']);
                $datos_adicionalesS->setProducto($data[$i]['producto']);
                $datos_adicionalesS->setDescripcion($data[$i]['descripcion']);
                $datos_adicionalesS->setFecha($data[$i]['fecha']);
                $datos_adicionalesS->setCalificacion($data[$i]['calificacion']);
                $datos_adicionalesS->setId_plan($data[$i]['id_plan']);
                $datos_adicionalesS->setId_semillero($data[$i]['id_semillero']);
            }
            return $datos_adicionalesS;      
    } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto datos_adicionalesS en la base de datos.
     * @param datos_adicionalesS objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($datos_adicionalesS){
      $id=$datos_adicionalesS->getId();
$producto=$datos_adicionalesS->getProducto();
$descripcion=$datos_adicionalesS->getDescripcion();
$fecha=$datos_adicionalesS->getFecha();
$calificacion=$datos_adicionalesS->getCalificacion();
$id_plan=$datos_adicionalesS->getId_plan();
$id_semillero=$datos_adicionalesS->getId_semillero();



      try {
          $sql= "UPDATE `datos_adicionalesS` SET`id`='$id' ,`producto`='$producto' ,`descripcion`='$descripcion' ,`fecha`='$fecha' ,`calificacion`='$calificacion' ,`id_plan`='$id_plan' ,`id_semillero`='$id_semillero' ,``='' ,``='' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto datos_adicionalesS en la base de datos.
     * @param datos_adicionalesS objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($datos_adicionalesS){
      $id=$datos_adicionalesS->getId();

      try {
          $sql ="DELETE FROM `datos_adicionalesS` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto datos_adicionalesS en la base de datos.
     * @return ArrayList<datos_adicionalesS> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `producto`, `descripcion`, `fecha`, `calificacion`, `id_plan`, `id_semillero`"
          ."FROM `datos_adicionalesS`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $datos_adicionalesS= new datos_adicionalesS();
          $datos_adicionalesS->setId($data[$i]['id']);
          $datos_adicionalesS->setProducto($data[$i]['producto']);
          $datos_adicionalesS->setDescripcion($data[$i]['descripcion']);
          $datos_adicionalesS->setFecha($data[$i]['fecha']);
          $datos_adicionalesS->setCalificacion($data[$i]['calificacion']);
          $datos_adicionalesS->setId_plan($data[$i]['id_plan']);
          $datos_adicionalesS->setId_semillero($data[$i]['id_semillero']);
          
          

          array_push($lista,$datos_adicionalesS);
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