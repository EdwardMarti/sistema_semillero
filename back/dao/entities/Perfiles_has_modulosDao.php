<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ahora con 25% menos groserías  \\

include_once realpath('../dao/interfaz/IPerfiles_has_modulosDao.php');
include_once realpath('../dto/Perfiles_has_modulos.php');
include_once realpath('../dto/Perfiles.php');
include_once realpath('../dto/Modulos.php');

class Perfiles_has_modulosDao implements IPerfiles_has_modulosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Perfiles_has_modulos en la base de datos.
     * @param perfiles_has_modulos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($perfiles_has_modulos){
      $perfiles_id=$perfiles_has_modulos->getPerfiles_id()->getId();
$modulos_activos_id=$perfiles_has_modulos->getModulos_activos_id()->getId();
$id=$perfiles_has_modulos->getId();
$activo=$perfiles_has_modulos->getActivo();

      try {
          $sql= "INSERT INTO `perfiles_has_modulos`( `perfiles_id`, `modulos_activos_id`, `id`, `activo`)"
          ."VALUES ('$perfiles_id','$modulos_activos_id','$id','$activo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Perfiles_has_modulos en la base de datos.
     * @param perfiles_has_modulos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($perfiles_has_modulos){
      $id=$perfiles_has_modulos->getId();

      try {
          $sql= "SELECT `perfiles_id`, `modulos_activos_id`, `id`, `activo`"
          ."FROM `perfiles_has_modulos`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $perfiles = new Perfiles();
           $perfiles->setId($data[$i]['perfiles_id']);
           $perfiles_has_modulos->setPerfiles_id($perfiles);
           $modulos = new Modulos();
           $modulos->setId($data[$i]['modulos_activos_id']);
           $perfiles_has_modulos->setModulos_activos_id($modulos);
          $perfiles_has_modulos->setId($data[$i]['id']);
          $perfiles_has_modulos->setActivo($data[$i]['activo']);

          }
      return $perfiles_has_modulos;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Perfiles_has_modulos en la base de datos.
     * @param perfiles_has_modulos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($perfiles_has_modulos){
      $perfiles_id=$perfiles_has_modulos->getPerfiles_id()->getId();
$modulos_activos_id=$perfiles_has_modulos->getModulos_activos_id()->getId();
$id=$perfiles_has_modulos->getId();
$activo=$perfiles_has_modulos->getActivo();

      try {
          $sql= "UPDATE `perfiles_has_modulos` SET`perfiles_id`='$perfiles_id' ,`modulos_activos_id`='$modulos_activos_id' ,`id`='$id' ,`activo`='$activo' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Perfiles_has_modulos en la base de datos.
     * @param perfiles_has_modulos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($perfiles_has_modulos){
      $id=$perfiles_has_modulos->getId();

      try {
          $sql ="DELETE FROM `perfiles_has_modulos` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Perfiles_has_modulos en la base de datos.
     * @return ArrayList<Perfiles_has_modulos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `perfiles_id`, `modulos_activos_id`, `id`, `activo`"
          ."FROM `perfiles_has_modulos`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $perfiles_has_modulos= new Perfiles_has_modulos();
           $perfiles = new Perfiles();
           $perfiles->setId($data[$i]['perfiles_id']);
           $perfiles_has_modulos->setPerfiles_id($perfiles);
           $modulos = new Modulos();
           $modulos->setId($data[$i]['modulos_activos_id']);
           $perfiles_has_modulos->setModulos_activos_id($modulos);
          $perfiles_has_modulos->setId($data[$i]['id']);
          $perfiles_has_modulos->setActivo($data[$i]['activo']);

          array_push($lista,$perfiles_has_modulos);
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