<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuenta la leyenda que si gritas 'Soy programador' las nenas caerán a tus pies  \\

include_once realpath('../dao/interfaz/ISem_linea_investigacionDao.php');
include_once realpath('../dto/Sem_linea_investigacion.php');
include_once realpath('../dto/Semillero.php');
include_once realpath('../dto/Linea_investigacion.php');

class Sem_linea_investigacionDao implements ISem_linea_investigacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Sem_linea_investigacion en la base de datos.
     * @param sem_linea_investigacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($sem_linea_investigacion){
      $id=$sem_linea_investigacion->getId();
$semillero_id=$sem_linea_investigacion->getSemillero_id()->getId();
$linea_investigacion_id=$sem_linea_investigacion->getLinea_investigacion_id()->getId();

      try {
          $sql= "INSERT INTO `sem_linea_investigacion`( `id`, `semillero_id`, `linea_investigacion_id`)"
          ."VALUES ('$id','$semillero_id','$linea_investigacion_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Sem_linea_investigacion en la base de datos.
     * @param sem_linea_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($sem_linea_investigacion){
      $id=$sem_linea_investigacion->getId();

      try {
          $sql= "SELECT `id`, `semillero_id`, `linea_investigacion_id`"
          ."FROM `sem_linea_investigacion`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $sem_linea_investigacion->setId($data[$i]['id']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $sem_linea_investigacion->setSemillero_id($semillero);
           $linea_investigacion = new Linea_investigacion();
           $linea_investigacion->setId($data[$i]['linea_investigacion_id']);
           $sem_linea_investigacion->setLinea_investigacion_id($linea_investigacion);

          }
      return $sem_linea_investigacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Sem_linea_investigacion en la base de datos.
     * @param sem_linea_investigacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($sem_linea_investigacion){
      $id=$sem_linea_investigacion->getId();
$semillero_id=$sem_linea_investigacion->getSemillero_id()->getId();
$linea_investigacion_id=$sem_linea_investigacion->getLinea_investigacion_id()->getId();

      try {
          $sql= "UPDATE `sem_linea_investigacion` SET`id`='$id' ,`semillero_id`='$semillero_id' ,`linea_investigacion_id`='$linea_investigacion_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Sem_linea_investigacion en la base de datos.
     * @param sem_linea_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($sem_linea_investigacion){
      $id=$sem_linea_investigacion->getId();

      try {
          $sql ="DELETE FROM `sem_linea_investigacion` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Sem_linea_investigacion en la base de datos.
     * @return ArrayList<Sem_linea_investigacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `semillero_id`, `linea_investigacion_id`"
          ."FROM `sem_linea_investigacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $sem_linea_investigacion= new Sem_linea_investigacion();
          $sem_linea_investigacion->setId($data[$i]['id']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $sem_linea_investigacion->setSemillero_id($semillero);
           $linea_investigacion = new Linea_investigacion();
           $linea_investigacion->setId($data[$i]['linea_investigacion_id']);
           $sem_linea_investigacion->setLinea_investigacion_id($linea_investigacion);

          array_push($lista,$sem_linea_investigacion);
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