<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\

include_once realpath('../dao/interfaz/IProyectosDao.php');
include_once realpath('../dto/Proyectos.php');
include_once realpath('../dto/Estado_proyecto.php');
include_once realpath('../dto/Semillero.php');

class ProyectosDao implements IProyectosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Proyectos en la base de datos.
     * @param proyectos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($proyectos){
      $id=$proyectos->getId();
$titulo=$proyectos->getTitulo();
$investigador=$proyectos->getInvestigador();
$tipo_proyecto_id=$proyectos->getTipo_proyecto_id()->getId();
$tiempo_ejecucion=$proyectos->getTiempo_ejecucion();
$fecha_ini=$proyectos->getFecha_ini();
$resumen=$proyectos->getResumen();
$obj_general=$proyectos->getObj_general();
$obj_especifico=$proyectos->getobj_especifico();
$resultados=$proyectos->getResultados();
$costo_valor=$proyectos->getCosto_valor();
$producto=$proyectos->getProducto();
$semillero_id=$proyectos->getSemillero_id()->getId();

      try {
          $sql= "INSERT INTO `proyectos`( `id`, `titulo`, `investigador`, `tipo_proyecto_id`, `tiempo_ejecucion`, `fecha_ini`, `resumen`, `obj_general`, `obj_especifico`, `resultados`, `costo_valor`, `producto`, `semillero_id`)"
          ."VALUES ('$id','$titulo','$investigador','$tipo_proyecto_id','$tiempo_ejecucion','$fecha_ini','$resumen','$obj_general','$obj_especifico','$resultados','$costo_valor','$producto','$semillero_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Proyectos en la base de datos.
     * @param proyectos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($proyectos){
      $id=$proyectos->getId();

      try {
          $sql= "SELECT `id`, `titulo`, `investigador`, `tipo_proyecto_id`, `tiempo_ejecucion`, `fecha_ini`, `resumen`, `obj_general`, `obj_especifico`, `resultados`, `costo_valor`, `producto`, `semillero_id`"
          ."FROM `proyectos`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $proyectos->setId($data[$i]['id']);
          $proyectos->setTitulo($data[$i]['titulo']);
          $proyectos->setInvestigador($data[$i]['investigador']);
           $estado_proyecto = new Estado_proyecto();
           $estado_proyecto->setId($data[$i]['tipo_proyecto_id']);
           $proyectos->setTipo_proyecto_id($estado_proyecto);
          $proyectos->setTiempo_ejecucion($data[$i]['tiempo_ejecucion']);
          $proyectos->setFecha_ini($data[$i]['fecha_ini']);
          $proyectos->setResumen($data[$i]['resumen']);
          $proyectos->setObj_general($data[$i]['obj_general']);
          $proyectos->setobj_especifico($data[$i]['obj_especifico']);
          $proyectos->setResultados($data[$i]['resultados']);
          $proyectos->setCosto_valor($data[$i]['costo_valor']);
          $proyectos->setProducto($data[$i]['producto']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $proyectos->setSemillero_id($semillero);

          }
      return $proyectos;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Proyectos en la base de datos.
     * @param proyectos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($proyectos){
      $id=$proyectos->getId();
$titulo=$proyectos->getTitulo();
$investigador=$proyectos->getInvestigador();
$tipo_proyecto_id=$proyectos->getTipo_proyecto_id()->getId();
$tiempo_ejecucion=$proyectos->getTiempo_ejecucion();
$fecha_ini=$proyectos->getFecha_ini();
$resumen=$proyectos->getResumen();
$obj_general=$proyectos->getObj_general();
$obj_especifico=$proyectos->getobj_especifico();
$resultados=$proyectos->getResultados();
$costo_valor=$proyectos->getCosto_valor();
$producto=$proyectos->getProducto();
$semillero_id=$proyectos->getSemillero_id()->getId();

      try {
          $sql= "UPDATE `proyectos` SET`id`='$id' ,`titulo`='$titulo' ,`investigador`='$investigador' ,`tipo_proyecto_id`='$tipo_proyecto_id' ,`tiempo_ejecucion`='$tiempo_ejecucion' ,`fecha_ini`='$fecha_ini' ,`resumen`='$resumen' ,`obj_general`='$obj_general' ,`obj_especifico`='$obj_especifico' ,`resultados`='$resultados' ,`costo_valor`='$costo_valor' ,`producto`='$producto' ,`semillero_id`='$semillero_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Proyectos en la base de datos.
     * @param proyectos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($proyectos){
      $id=$proyectos->getId();

      try {
          $sql ="DELETE FROM `proyectos` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Proyectos en la base de datos.
     * @return ArrayList<Proyectos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `titulo`, `investigador`, `tipo_proyecto_id`, `tiempo_ejecucion`, `fecha_ini`, `resumen`, `obj_general`, `obj_especifico`, `resultados`, `costo_valor`, `producto`, `semillero_id`"
          ."FROM `proyectos`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $proyectos= new Proyectos();
          $proyectos->setId($data[$i]['id']);
          $proyectos->setTitulo($data[$i]['titulo']);
          $proyectos->setInvestigador($data[$i]['investigador']);
           $estado_proyecto = new Estado_proyecto();
           $estado_proyecto->setId($data[$i]['tipo_proyecto_id']);
           $proyectos->setTipo_proyecto_id($estado_proyecto);
          $proyectos->setTiempo_ejecucion($data[$i]['tiempo_ejecucion']);
          $proyectos->setFecha_ini($data[$i]['fecha_ini']);
          $proyectos->setResumen($data[$i]['resumen']);
          $proyectos->setObj_general($data[$i]['obj_general']);
          $proyectos->setobj_especifico($data[$i]['obj_especifico']);
          $proyectos->setResultados($data[$i]['resultados']);
          $proyectos->setCosto_valor($data[$i]['costo_valor']);
          $proyectos->setProducto($data[$i]['producto']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $proyectos->setSemillero_id($semillero);

          array_push($lista,$proyectos);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_id($id){
      $lista = array();
      try {
          $sql =" SELECT `id`, `titulo`, `investigador`, `tipo_proyecto_id`, `tiempo_ejecucion`, `fecha_ini`, `resumen`, `obj_general`, `obj_especifico`, `resultados`, `costo_valor`, `producto`, `semillero_id` FROM `proyectos` "
          ."WHERE  `semillero_id` = '$id' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
            $proyectos= new Proyectos();
            $proyectos->setId($data[$i]['id']);
            $proyectos->setTitulo($data[$i]['titulo']);
            $proyectos->setInvestigador($data[$i]['investigador']);
            $estado_proyecto = new Estado_proyecto();
            $estado_proyecto->setId($data[$i]['tipo_proyecto_id']);
            $proyectos->setTipo_proyecto_id($estado_proyecto);
            $proyectos->setTiempo_ejecucion($data[$i]['tiempo_ejecucion']);
            $proyectos->setFecha_ini($data[$i]['fecha_ini']);
            $proyectos->setResumen($data[$i]['resumen']);
            $proyectos->setObj_general($data[$i]['obj_general']);
            $proyectos->setobj_especifico($data[$i]['obj_especifico']);
            $proyectos->setResultados($data[$i]['resultados']);
            $proyectos->setCosto_valor($data[$i]['costo_valor']);
            $proyectos->setProducto($data[$i]['producto']);
            $semillero = new Semillero();
            $semillero->setId($data[$i]['semillero_id']);
            $proyectos->setSemillero_id($semillero);
            array_push($lista,$proyectos);
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