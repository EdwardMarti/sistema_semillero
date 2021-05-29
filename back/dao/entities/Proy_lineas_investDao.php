<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si he visto más lejos es porque estoy sentado sobre los hombros de gigantes.  \\

include_once realpath('../dao/interfaz/IProy_lineas_investDao.php');
include_once realpath('../dto/Proy_lineas_invest.php');
include_once realpath('../dto/Proyectos.php');
include_once realpath('../dto/Linea_investigacion.php');

class Proy_lineas_investDao implements IProy_lineas_investDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Proy_lineas_invest en la base de datos.
     * @param proy_lineas_invest objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($proy_lineas_invest){
      $id=$proy_lineas_invest->getId();
$proyectos_id=$proy_lineas_invest->getProyectos_id()->getId();
$linea_investigacion_id=$proy_lineas_invest->getLinea_investigacion_id()->getId();

      try {
          $sql= "INSERT INTO `proy_lineas_invest`( `id`, `proyectos_id`, `linea_investigacion_id`)"
          ."VALUES ('$id','$proyectos_id','$linea_investigacion_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Proy_lineas_invest en la base de datos.
     * @param proy_lineas_invest objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($proy_lineas_invest){
      $id=$proy_lineas_invest->getId();

      try {
          $sql= "SELECT `id`, `proyectos_id`, `linea_investigacion_id`"
          ."FROM `proy_lineas_invest`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $proy_lineas_invest->setId($data[$i]['id']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $proy_lineas_invest->setProyectos_id($proyectos);
           $linea_investigacion = new Linea_investigacion();
           $linea_investigacion->setId($data[$i]['linea_investigacion_id']);
           $proy_lineas_invest->setLinea_investigacion_id($linea_investigacion);

          }
      return $proy_lineas_invest;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Proy_lineas_invest en la base de datos.
     * @param proy_lineas_invest objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($proy_lineas_invest){
      $id=$proy_lineas_invest->getId();
$proyectos_id=$proy_lineas_invest->getProyectos_id()->getId();
$linea_investigacion_id=$proy_lineas_invest->getLinea_investigacion_id()->getId();

      try {
          $sql= "UPDATE `proy_lineas_invest` SET`id`='$id' ,`proyectos_id`='$proyectos_id' ,`linea_investigacion_id`='$linea_investigacion_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Proy_lineas_invest en la base de datos.
     * @param proy_lineas_invest objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($proy_lineas_invest){
      $id=$proy_lineas_invest->getId();

      try {
          $sql ="DELETE FROM `proy_lineas_invest` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Proy_lineas_invest en la base de datos.
     * @return ArrayList<Proy_lineas_invest> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `proyectos_id`, `linea_investigacion_id`"
          ."FROM `proy_lineas_invest`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $proy_lineas_invest= new Proy_lineas_invest();
          $proy_lineas_invest->setId($data[$i]['id']);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $proy_lineas_invest->setProyectos_id($proyectos);
           $linea_investigacion = new Linea_investigacion();
           $linea_investigacion->setId($data[$i]['linea_investigacion_id']);
           $proy_lineas_invest->setLinea_investigacion_id($linea_investigacion);

          array_push($lista,$proy_lineas_invest);
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