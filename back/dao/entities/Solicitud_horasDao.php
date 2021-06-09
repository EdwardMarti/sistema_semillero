<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Le he dedicado más tiempo a las frases que al software interno  \\

include_once realpath('../dao/interfaz/ISolicitud_horasDao.php');
include_once realpath('../dto/Solicitud_horas.php');

class Solicitud_horasDao implements ISolicitud_horasDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Solicitud_horas en la base de datos.
     * @param solicitud_horas objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($solicitud_horas){
$anio=$solicitud_horas->getAnio();
$semestre=$solicitud_horas->getSemestre();
$horas_catedra=$solicitud_horas->getHoras_catedra();
$horas_planta=$solicitud_horas->getHoras_planta();
$horas_solicitadas=$solicitud_horas->getHoras_solicitadas();
$idSemillero = $solicitud_horas->getId_semillero();

      try {
          $sql= "INSERT INTO `solicitud_horas`( `anio`, `semestre`, `horas_catedra`, `horas_planta`, `horas_solicitadas`, `id_semillero`)"
          ."VALUES ('$anio','$semestre','$horas_catedra','$horas_planta','$horas_solicitadas', '$idSemillero')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Solicitud_horas en la base de datos.
     * @param solicitud_horas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($solicitud_horas){
      $id=$solicitud_horas->getId();

      try {
          $sql= "SELECT `id`, `anio`, `semestre`, `horas_catedra`, `horas_planta`, `horas_solicitadas`, `id_semillero`"
          ."FROM `solicitud_horas`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          //$solicitud_horas->setId($data[$i]['id']);
          $solicitud_horas->setAnio($data[$i]['anio']);
          $solicitud_horas->setSemestre($data[$i]['semestre']);
          $solicitud_horas->setHoras_catedra($data[$i]['horas_catedra']);
          $solicitud_horas->setHoras_planta($data[$i]['horas_planta']);
          $solicitud_horas->setHoras_solicitadas($data[$i]['horas_solicitadas']);
          $solicitud_horas->setId_semillero($data[$i]["id_semillero"]);
          }
      return $solicitud_horas;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Solicitud_horas en la base de datos.
     * @param solicitud_horas objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($solicitud_horas){
      $id=$solicitud_horas->getId();
$anio=$solicitud_horas->getAnio();
$semestre=$solicitud_horas->getSemestre();
$horas_catedra=$solicitud_horas->getHoras_catedra();
$horas_planta=$solicitud_horas->getHoras_planta();
$horas_solicitadas=$solicitud_horas->getHoras_solicitadas();
$update=$solicitud_horas->getHoras_solicitadas();

      try {
          $sql= "UPDATE `solicitud_horas` SET`id`='$id' ,`anio`='$anio' ,`semestre`='$semestre' ,`horas_catedra`='$horas_catedra' ,`horas_planta`='$horas_planta' ,`horas_solicitadas`='$horas_solicitadas' WHERE `id`='$id' ";
         return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Solicitud_horas en la base de datos.
     * @param solicitud_horas objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($solicitud_horas){
      $id=$solicitud_horas->getId();

      try {
          $sql ="DELETE FROM `solicitud_horas` WHERE `id`='$id'";
          return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Solicitud_horas en la base de datos.
     * @return ArrayList<Solicitud_horas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `anio`, `semestre`, `horas_catedra`, `horas_planta`, `horas_solicitadas`"
          ."FROM `solicitud_horas`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $solicitud_horas= new Solicitud_horas();
          $solicitud_horas->setId($data[$i]['id']);
          $solicitud_horas->setAnio($data[$i]['anio']);
          $solicitud_horas->setSemestre($data[$i]['semestre']);
          $solicitud_horas->setHoras_catedra($data[$i]['horas_catedra']);
          $solicitud_horas->setHoras_planta($data[$i]['horas_planta']);
          $solicitud_horas->setHoras_solicitadas($data[$i]['horas_solicitadas']);

          array_push($lista,$solicitud_horas);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

/**
     * Busca un objeto Solicitud_horas en la base de datos.
     * @return ArrayList<Solicitud_horas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listHorasBySemillero($idSemillero){
        $lista = array();
        try {
            $sql ="SELECT `id`, `anio`, `semestre`, `horas_catedra`, `horas_planta`, `horas_solicitadas`"
            ."FROM `solicitud_horas`"
            ."WHERE id_semillero=$idSemillero";
            $data = $this->ejecutarConsulta($sql);
            for ($i=0; $i < count($data) ; $i++) {
                $solicitud_horas= new Solicitud_horas();
            $solicitud_horas->setId($data[$i]['id']);
            $solicitud_horas->setAnio($data[$i]['anio']);
            $solicitud_horas->setSemestre($data[$i]['semestre']);
            $solicitud_horas->setHoras_catedra($data[$i]['horas_catedra']);
            $solicitud_horas->setHoras_planta($data[$i]['horas_planta']);
            $solicitud_horas->setHoras_solicitadas($data[$i]['horas_solicitadas']);
  
            array_push($lista,$solicitud_horas);
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
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $rta = $sentencia->rowCount();
        $sentencia = null;
        return $rta;
    }

    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!