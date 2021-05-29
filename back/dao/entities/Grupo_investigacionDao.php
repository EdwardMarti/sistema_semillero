<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora con 25% menos groserías  \\

include_once realpath('../dao/interfaz/IGrupo_investigacionDao.php');
include_once realpath('../dto/Grupo_investigacion.php');

class Grupo_investigacionDao implements IGrupo_investigacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Grupo_investigacion en la base de datos.
     * @param grupo_investigacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($grupo_investigacion){
      $id=$grupo_investigacion->getId();
$nombre=$grupo_investigacion->getNombre();
$sigla=$grupo_investigacion->getSigla();
$unidad_academica=$grupo_investigacion->getUnidad_academica();
$fecha_creacion=$grupo_investigacion->getFecha_creacion();
$fecha_gruplac=$grupo_investigacion->getFecha_gruplac();
$codigo_gruplac=$grupo_investigacion->getCodigo_gruplac();
$clas_colciencias=$grupo_investigacion->getClas_colciencias();
$cate_colciencias=$grupo_investigacion->getCate_colciencias();

      try {
          $sql= "INSERT INTO `grupo_investigacion`( `id`, `nombre`, `sigla`, `unidad_academica`, `fecha_creacion`, `fecha_gruplac`, `codigo_gruplac`, `clas_colciencias`, `cate_colciencias`)"
          ."VALUES ('$id','$nombre','$sigla','$unidad_academica','$fecha_creacion','$fecha_gruplac','$codigo_gruplac','$clas_colciencias','$cate_colciencias')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_investigacion en la base de datos.
     * @param grupo_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($grupo_investigacion){
      $id=$grupo_investigacion->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `sigla`, `unidad_academica`, `fecha_creacion`, `fecha_gruplac`, `codigo_gruplac`, `clas_colciencias`, `cate_colciencias`"
          ."FROM `grupo_investigacion`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $grupo_investigacion->setId($data[$i]['id']);
          $grupo_investigacion->setNombre($data[$i]['nombre']);
          $grupo_investigacion->setSigla($data[$i]['sigla']);
          $grupo_investigacion->setUnidad_academica($data[$i]['unidad_academica']);
          $grupo_investigacion->setFecha_creacion($data[$i]['fecha_creacion']);
          $grupo_investigacion->setFecha_gruplac($data[$i]['fecha_gruplac']);
          $grupo_investigacion->setCodigo_gruplac($data[$i]['codigo_gruplac']);
          $grupo_investigacion->setClas_colciencias($data[$i]['clas_colciencias']);
          $grupo_investigacion->setCate_colciencias($data[$i]['cate_colciencias']);

          }
      return $grupo_investigacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Grupo_investigacion en la base de datos.
     * @param grupo_investigacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($grupo_investigacion){
      $id=$grupo_investigacion->getId();
$nombre=$grupo_investigacion->getNombre();
$sigla=$grupo_investigacion->getSigla();
$unidad_academica=$grupo_investigacion->getUnidad_academica();
$fecha_creacion=$grupo_investigacion->getFecha_creacion();
$fecha_gruplac=$grupo_investigacion->getFecha_gruplac();
$codigo_gruplac=$grupo_investigacion->getCodigo_gruplac();
$clas_colciencias=$grupo_investigacion->getClas_colciencias();
$cate_colciencias=$grupo_investigacion->getCate_colciencias();

      try {
          $sql= "UPDATE `grupo_investigacion` SET`id`='$id' ,`nombre`='$nombre' ,`sigla`='$sigla' ,`unidad_academica`='$unidad_academica' ,`fecha_creacion`='$fecha_creacion' ,`fecha_gruplac`='$fecha_gruplac' ,`codigo_gruplac`='$codigo_gruplac' ,`clas_colciencias`='$clas_colciencias' ,`cate_colciencias`='$cate_colciencias' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Grupo_investigacion en la base de datos.
     * @param grupo_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($grupo_investigacion){
      $id=$grupo_investigacion->getId();

      try {
          $sql ="DELETE FROM `grupo_investigacion` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Grupo_investigacion en la base de datos.
     * @return ArrayList<Grupo_investigacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `sigla`, `unidad_academica`, `fecha_creacion`, `fecha_gruplac`, `codigo_gruplac`, `clas_colciencias`, `cate_colciencias`"
          ."FROM `grupo_investigacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $grupo_investigacion= new Grupo_investigacion();
          $grupo_investigacion->setId($data[$i]['id']);
          $grupo_investigacion->setNombre($data[$i]['nombre']);
          $grupo_investigacion->setSigla($data[$i]['sigla']);
          $grupo_investigacion->setUnidad_academica($data[$i]['unidad_academica']);
          $grupo_investigacion->setFecha_creacion($data[$i]['fecha_creacion']);
          $grupo_investigacion->setFecha_gruplac($data[$i]['fecha_gruplac']);
          $grupo_investigacion->setCodigo_gruplac($data[$i]['codigo_gruplac']);
          $grupo_investigacion->setClas_colciencias($data[$i]['clas_colciencias']);
          $grupo_investigacion->setCate_colciencias($data[$i]['cate_colciencias']);

          array_push($lista,$grupo_investigacion);
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