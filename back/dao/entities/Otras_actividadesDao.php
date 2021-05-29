<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Soy la sonrisa burlona y vengativa de Jack  \\

include_once realpath('../dao/interfaz/IOtras_actividadesDao.php');
include_once realpath('../dto/Otras_actividades.php');
include_once realpath('../dto/Semillero.php');

class Otras_actividadesDao implements IOtras_actividadesDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Otras_actividades en la base de datos.
     * @param otras_actividades objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($otras_actividades){
      $id=$otras_actividades->getId();
$nombre_proyecto=$otras_actividades->getNombre_proyecto();
$nombre_actividad=$otras_actividades->getNombre_actividad();
$modalidad_participacion=$otras_actividades->getModalidad_participacion();
$responsable=$otras_actividades->getResponsable();
$fecha_realizacion=$otras_actividades->getFecha_realizacion();
$producto=$otras_actividades->getProducto();
$semillero_id=$otras_actividades->getSemillero_id()->getId();

      try {
          $sql= "INSERT INTO `otras_actividades`( `id`, `nombre_proyecto`, `nombre_actividad`, `modalidad_participacion`, `responsable`, `fecha_realizacion`, `producto`, `semillero_id`)"
          ."VALUES ('$id','$nombre_proyecto','$nombre_actividad','$modalidad_participacion','$responsable','$fecha_realizacion','$producto','$semillero_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Otras_actividades en la base de datos.
     * @param otras_actividades objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($otras_actividades){
      $id=$otras_actividades->getId();

      try {
          $sql= "SELECT `id`, `nombre_proyecto`, `nombre_actividad`, `modalidad_participacion`, `responsable`, `fecha_realizacion`, `producto`, `semillero_id`"
          ."FROM `otras_actividades`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $otras_actividades->setId($data[$i]['id']);
          $otras_actividades->setNombre_proyecto($data[$i]['nombre_proyecto']);
          $otras_actividades->setNombre_actividad($data[$i]['nombre_actividad']);
          $otras_actividades->setModalidad_participacion($data[$i]['modalidad_participacion']);
          $otras_actividades->setResponsable($data[$i]['responsable']);
          $otras_actividades->setFecha_realizacion($data[$i]['fecha_realizacion']);
          $otras_actividades->setProducto($data[$i]['producto']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $otras_actividades->setSemillero_id($semillero);

          }
      return $otras_actividades;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Otras_actividades en la base de datos.
     * @param otras_actividades objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($otras_actividades){
      $id=$otras_actividades->getId();
$nombre_proyecto=$otras_actividades->getNombre_proyecto();
$nombre_actividad=$otras_actividades->getNombre_actividad();
$modalidad_participacion=$otras_actividades->getModalidad_participacion();
$responsable=$otras_actividades->getResponsable();
$fecha_realizacion=$otras_actividades->getFecha_realizacion();
$producto=$otras_actividades->getProducto();
$semillero_id=$otras_actividades->getSemillero_id()->getId();

      try {
          $sql= "UPDATE `otras_actividades` SET`id`='$id' ,`nombre_proyecto`='$nombre_proyecto' ,`nombre_actividad`='$nombre_actividad' ,`modalidad_participacion`='$modalidad_participacion' ,`responsable`='$responsable' ,`fecha_realizacion`='$fecha_realizacion' ,`producto`='$producto' ,`semillero_id`='$semillero_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Otras_actividades en la base de datos.
     * @param otras_actividades objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($otras_actividades){
      $id=$otras_actividades->getId();

      try {
          $sql ="DELETE FROM `otras_actividades` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Otras_actividades en la base de datos.
     * @return ArrayList<Otras_actividades> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre_proyecto`, `nombre_actividad`, `modalidad_participacion`, `responsable`, `fecha_realizacion`, `producto`, `semillero_id`"
          ."FROM `otras_actividades`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $otras_actividades= new Otras_actividades();
          $otras_actividades->setId($data[$i]['id']);
          $otras_actividades->setNombre_proyecto($data[$i]['nombre_proyecto']);
          $otras_actividades->setNombre_actividad($data[$i]['nombre_actividad']);
          $otras_actividades->setModalidad_participacion($data[$i]['modalidad_participacion']);
          $otras_actividades->setResponsable($data[$i]['responsable']);
          $otras_actividades->setFecha_realizacion($data[$i]['fecha_realizacion']);
          $otras_actividades->setProducto($data[$i]['producto']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $otras_actividades->setSemillero_id($semillero);

          array_push($lista,$otras_actividades);
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