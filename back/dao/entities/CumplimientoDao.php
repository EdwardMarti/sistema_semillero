<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...con el mayor de los disgustos, el benévolo señor Arciniegas.  \\

include_once realpath('../dao/interfaz/ICumplimientoDao.php');
include_once realpath('../dto/Cumplimiento.php');


class CumplimientoDao implements ICumplimientoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Cumplimiento en la base de datos.
     * @param ponencias objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($cumplimiento){
//      $id=$cumplimiento->getId();
$dirigido_id=$cumplimiento->getDirigido_id();
$descripcion=$cumplimiento->getDescripcion();
$ano=$cumplimiento->getAno();
$productos=$cumplimiento->getProductos();
$semestre=$cumplimiento->getSemestre();
$acepta_uno=$cumplimiento->getAcepta_uno();
$acepta_dos=$cumplimiento->getAcepta_dos();
$porcentaje=$cumplimiento->getPorcentaje();

      try {
          $sql= "INSERT INTO `cumplimiento`( `dirigido_id`, `descripcion`, `ano`, `productos`, `semestre`, `acepta_uno`, `acepta_dos`, `porcentaje`)"
          ."VALUES ( '$dirigido_id','$descripcion','$ano','$productos','$semestre','$acepta_uno','$acepta_dos','$porcentaje')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  
  public function insert2($dirigido_id, $descripcion, $ano, $productos, $semestre, $acepta_uno, $Tipo_ponencias_id, $Semillero_id){


      try {
          $sql= "INSERT INTO `ponencias`( `dirigido_id`, `descripcion`, `ano`, `productos`, `semestre`, `acepta_uno`, `acepta_dos`, `porcentaje`)"
          ."VALUES ( '$dirigido_id','$descripcion','$ano','$productos','$semestre','$acepta_uno','$Tipo_ponencias_id','$Semillero_id')";

          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cumplimiento en la base de datos.
     * @param ponencias objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($cumplimiento){
      $id=$cumplimiento->getId();

      try {
          $sql= "SELECT `id`, `dirigido_id`, `descripcion`, `ano`, `productos`, `semestre`, `acepta_uno`, `acepta_dos`, `porcentaje`"
          ."FROM `ponencias`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $cumplimiento->setId($data[$i]['id']);
          $cumplimiento->setDirigido_id($data[$i]['dirigido_id']);
          $cumplimiento->setDescripcion($data[$i]['descripcion']);
          $cumplimiento->setAno($data[$i]['ano']);
          $cumplimiento->setProductos($data[$i]['productos']);
          $cumplimiento->setSemestre($data[$i]['semestre']);
          $cumplimiento->setAcepta_uno($data[$i]['acepta_uno']);
       
           $cumplimiento->setAcepta_dos($data[$i]['acepta_dos']);
           
           
           $cumplimiento->setPorcentaje($data[$i]['porcentaje']);
           

          }
      return $cumplimiento;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Cumplimiento en la base de datos.
     * @param ponencias objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($cumplimiento){
      $id=$cumplimiento->getId();
$dirigido_id=$cumplimiento->getDirigido_id();
$descripcion=$cumplimiento->getDescripcion();
$ano=$cumplimiento->getAno();
$productos=$cumplimiento->getProductos();
$semestre=$cumplimiento->getSemestre();
$acepta_uno=$cumplimiento->getAcepta_uno();
$acepta_dos=$cumplimiento->getAcepta_dos();
$porcentaje=$cumplimiento->getPorcentaje();

      try {
          $sql= "UPDATE `ponencias` SET`id`='$id' ,`dirigido_id`='$dirigido_id' ,`descripcion`='$descripcion' ,`ano`='$ano' ,`productos`='$productos' ,`semestre`='$semestre' ,`acepta_uno`='$acepta_uno' ,`acepta_dos`='$acepta_dos' ,`porcentaje`='$porcentaje' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  
  public function update2($id, $dirigido_id, $descripcion, $ano, $productos, $semestre, $acepta_uno, $acepta_dos, $porcentaje){
     
      try {
          $sql= "UPDATE `ponencias` SET `dirigido_id`='$dirigido_id' ,`descripcion`='$descripcion' ,`ano`='$ano' ,`productos`='$productos' ,`semestre`='$semestre' ,`acepta_uno`='$acepta_uno' ,`acepta_dos`='$acepta_dos' ,`porcentaje`='$porcentaje' WHERE `id`='$id' ";
         return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Cumplimiento en la base de datos.
     * @param ponencias objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($cumplimiento){
      $id=$cumplimiento->getId();

      try {
          $sql ="DELETE FROM `cumplimiento` WHERE `id`='$id'";
          return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Cumplimiento en la base de datos.
     * @return ArrayList<Cumplimiento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `dirigido_id`, `descripcion`, `ano`, `productos`, `semestre`, `acepta_uno`, `acepta_dos`, `porcentaje`"
          ."FROM `cumplimiento`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cumplimiento= new Cumplimiento();
          $cumplimiento->setId($data[$i]['id']);
          $cumplimiento->setDirigido_id($data[$i]['dirigido_id']);
          $cumplimiento->setDescripcion($data[$i]['descripcion']);
          $cumplimiento->setAno($data[$i]['ano']);
          $cumplimiento->setProductos($data[$i]['productos']);
          $cumplimiento->setSemestre($data[$i]['semestre']);
          $cumplimiento->setAcepta_uno($data[$i]['acepta_uno']);
       
           $cumplimiento->setAcepta_dos($data[$i]['acepta_dos']);
           
           
           $cumplimiento->setPorcentaje($data[$i]['porcentaje']);
           

          array_push($lista,$cumplimiento);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_Sem($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `dirigido_id`, `descripcion`, `ano`, `productos`, `semestre`, `acepta_uno`, `acepta_dos`, `porcentaje`"
          ."FROM `ponencias`"
          ."WHERE porcentaje = '$id' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cumplimiento= new Cumplimiento();
          $cumplimiento->setId($data[$i]['id']);
          $cumplimiento->setDirigido_id($data[$i]['dirigido_id']);
          $cumplimiento->setDescripcion($data[$i]['descripcion']);
          $cumplimiento->setAno($data[$i]['ano']);
          $cumplimiento->setProductos($data[$i]['productos']);
          $cumplimiento->setSemestre($data[$i]['semestre']);
          $cumplimiento->setAcepta_uno($data[$i]['acepta_uno']);
       
           $cumplimiento->setAcepta_dos($data[$i]['acepta_dos']);
           
           
           $cumplimiento->setPorcentaje($data[$i]['porcentaje']);
           

          array_push($lista,$cumplimiento);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_SemId($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `dirigido_id`, `descripcion`, `ano`, `productos`, `semestre`, `acepta_uno`, `acepta_dos`, `porcentaje`"
          ."FROM `ponencias`"
          ."WHERE `id` = '$id' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $cumplimiento= new Cumplimiento();
          $cumplimiento->setId($data[$i]['id']);
          $cumplimiento->setDirigido_id($data[$i]['dirigido_id']);
          $cumplimiento->setDescripcion($data[$i]['descripcion']);
          $cumplimiento->setAno($data[$i]['ano']);
          $cumplimiento->setProductos($data[$i]['productos']);
          $cumplimiento->setSemestre($data[$i]['semestre']);
          $cumplimiento->setAcepta_uno($data[$i]['acepta_uno']);
       
           $cumplimiento->setAcepta_dos($data[$i]['acepta_dos']);
           
           
           $cumplimiento->setPorcentaje($data[$i]['porcentaje']);
           

          array_push($lista,$cumplimiento);
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