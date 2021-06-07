<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ella existió sólo en un sueño. Él es un poema que el poeta nunca escribió.  \\

include_once realpath('../dao/interfaz/ISemilleroDao.php');
include_once realpath('../dto/Semillero.php');
include_once realpath('../dto/Grupo_investigacion.php');

class SemilleroDao implements ISemilleroDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Semillero en la base de datos.
     * @param semillero objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($semillero){
      $id=$semillero->getId();
$nombre=$semillero->getNombre();
$sigla=$semillero->getSigla();
$fecha_creacion=$semillero->getFecha_creacion();
$aval_dic_grupo=$semillero->getAval_dic_grupo();
$aval_dic_sem=$semillero->getAval_dic_sem();
$aval_dic_unidad=$semillero->getAval_dic_unidad();
$grupo_investigacion_id=$semillero->getGrupo_investigacion_id()->getId();
$unidad_academica=$semillero->getUnidad_academica();

      try {
          $sql= "INSERT INTO `semillero`( `id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `unidad_academica`)"
          ."VALUES ('$id','$nombre','$sigla','$fecha_creacion','$aval_dic_grupo','$aval_dic_sem','$aval_dic_unidad','$grupo_investigacion_id','$unidad_academica')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  

  public function insert_S($semillero){
   
$nombre=$semillero->getNombre();
$sigla=$semillero->getSigla();
$fecha_creacion=$semillero->getFecha_creacion();
$facultad=$semillero->getAval_dic_grupo();
$plan_estudios=$semillero->getAval_dic_sem();
$grupo_investigacion_id=$semillero->getGrupo_investigacion_id()->getId();
$departamento=$semillero->getUnidad_academica();

      try {
          $sql= "INSERT INTO `semillero`(  `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `departamento`, `facultad`, `plan_estudios`)"
          ."VALUES ('$nombre','$sigla','$fecha_creacion','0','0','0','$grupo_investigacion_id','$departamento','$facultad','$plan_estudios')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Semillero en la base de datos.
     * @param semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($semillero){
      $id=$semillero->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `unidad_academica`"
          ."FROM `semillero`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $semillero->setId($data[$i]['id']);
          $semillero->setNombre($data[$i]['nombre']);
          $semillero->setSigla($data[$i]['sigla']);
          $semillero->setFecha_creacion($data[$i]['fecha_creacion']);
          $semillero->setAval_dic_grupo($data[$i]['aval_dic_grupo']);
          $semillero->setAval_dic_sem($data[$i]['aval_dic_sem']);
          $semillero->setAval_dic_unidad($data[$i]['aval_dic_unidad']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $semillero->setGrupo_investigacion_id($grupo_investigacion);
          $semillero->setUnidad_academica($data[$i]['unidad_academica']);

          }
      return $semillero;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function select_activo($correo,$clave){
  $existe=false;

      
      try {
          $sql= "SELECT `id` FROM `semillero_doc` WHERE `correo`='$correo' and `password` = '$clave' and  `stado`='0' ";
          
        
          $data = $this->ejecutarConsulta($sql);
         
              if(!empty($data)){
                $existe=true;
              }
       
       
      return $existe;     
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Semillero en la base de datos.
     * @param semillero objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($semillero){
      $id=$semillero->getId();
$nombre=$semillero->getNombre();
$sigla=$semillero->getSigla();
$fecha_creacion=$semillero->getFecha_creacion();
$aval_dic_grupo=$semillero->getAval_dic_grupo();
$aval_dic_sem=$semillero->getAval_dic_sem();
$aval_dic_unidad=$semillero->getAval_dic_unidad();
$grupo_investigacion_id=$semillero->getGrupo_investigacion_id()->getId();
$unidad_academica=$semillero->getUnidad_academica();

      try {
          $sql= "UPDATE `semillero` SET`id`='$id' ,`nombre`='$nombre' ,`sigla`='$sigla' ,`fecha_creacion`='$fecha_creacion' ,`aval_dic_grupo`='$aval_dic_grupo' ,`aval_dic_sem`='$aval_dic_sem' ,`aval_dic_unidad`='$aval_dic_unidad' ,`grupo_investigacion_id`='$grupo_investigacion_id' ,`unidad_academica`='$unidad_academica' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  public function update_Data($id, $nombre, $sigla, $fecha_creacion, $Grupo_investigacion_id, $departamento, $facultad, $plan_estudios){


      try {
          $sql= "UPDATE `semillero` SET `nombre`='$nombre' ,`sigla`='$sigla' ,`fecha_creacion`='$fecha_creacion' ,`grupo_investigacion_id`='$Grupo_investigacion_id' , `departamento`='$departamento' , `facultad`='$facultad' , `plan_estudios`='$plan_estudios'  WHERE `id`='$id' ";
         return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }
  public function update_Activar($id, $activar,$valor){
    

      try {
          $sql= "UPDATE `semillero` SET `$activar`='$valor'  WHERE `id`='$id' ";
          return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Semillero en la base de datos.
     * @param semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($semillero){
      $id=$semillero->getId();

      try {
          $sql ="DELETE FROM `semillero` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Semillero en la base de datos.
     * @return ArrayList<Semillero> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `unidad_academica`"
          ."FROM `semillero`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $semillero= new Semillero();
          $semillero->setId($data[$i]['id']);
          $semillero->setNombre($data[$i]['nombre']);
          $semillero->setSigla($data[$i]['sigla']);
          $semillero->setFecha_creacion($data[$i]['fecha_creacion']);
          $semillero->setAval_dic_grupo($data[$i]['aval_dic_grupo']);
          $semillero->setAval_dic_sem($data[$i]['aval_dic_sem']);
          $semillero->setAval_dic_unidad($data[$i]['aval_dic_unidad']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $semillero->setGrupo_investigacion_id($grupo_investigacion);
          $semillero->setUnidad_academica($data[$i]['unidad_academica']);

          array_push($lista,$semillero);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listStado($id){
      $lista = array();
      $dic_grupo="Pendiente";
      $dic_sem="Pendiente";
      $dic_unidad="Pendiente";
      try {
          $sql ="SELECT `id`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad` FROM `semillero` WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $semillero= new Semillero();
          $semillero->setId($data[$i]['id']);
          if($data[$i]['aval_dic_grupo']==1){
              $dic_grupo="Aprobado";
          }
          if($data[$i]['aval_dic_grupo']==2){
              $dic_grupo="Rechazado";
          }
          if($data[$i]['aval_dic_sem']==1){
              $dic_sem="Aprobado";
          }
          if($data[$i]['aval_dic_sem']==2){
              $dic_sem="Rechazado";
          }
          if($data[$i]['aval_dic_unidad']==1){
              $dic_unidad="Aprobado";
          }
          if($data[$i]['aval_dic_unidad']==2){
              $dic_unidad="Rechazado";
          }
          $semillero->setFecha_creacion($data[$i]['fecha_creacion']);
          $semillero->setAval_dic_grupo($dic_grupo);
          $semillero->setAval_dic_sem($dic_sem);
          $semillero->setAval_dic_unidad($dic_unidad);
       

          array_push($lista,$semillero);
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
          $sql ="select `id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `departamento`, `facultad`, `plan_estudios` FROM `semillero` WHERE `id` = '$id'";
//          var_dump($sql);
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $semillero= new Semillero();
          $semillero->setId($data[$i]['id']);
          $semillero->setNombre($data[$i]['nombre']);
          $semillero->setSigla($data[$i]['sigla']);
          $semillero->setFecha_creacion($data[$i]['fecha_creacion']);
          $semillero->setAval_dic_grupo($data[$i]['aval_dic_grupo']);
          $semillero->setAval_dic_sem($data[$i]['aval_dic_sem']);
          $semillero->setAval_dic_unidad($data[$i]['aval_dic_unidad']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $semillero->setGrupo_investigacion_id($grupo_investigacion);
           $semillero->setUnidad_academica($data[$i]['departamento']);
          $semillero->setFacultad($data[$i]['facultad']);
          $semillero->setPlan_estudio($data[$i]['plan_estudios']);

          array_push($lista,$semillero);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
   public function listAll_id_descrip($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `gi_nombre`, `departamento`, `dpto_d`, `facultad`, `fdescrip`, `plan_estudios`, `pe_descrip`, `nombreD`, `telefono`, `correo`, `tipo_vinculacion_id`, `descripcion` FROM `data_seme` WHERE `id` = '$id'";
//          var_dump($sql);
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $semillero= new Semillero();
          $semillero->setId($data[$i]['id']);
          $semillero->setNombre($data[$i]['nombre']);
          $semillero->setSigla($data[$i]['sigla']);
          $semillero->setFecha_creacion($data[$i]['fecha_creacion']);
          $semillero->setAval_dic_grupo($data[$i]['aval_dic_grupo']);
          $semillero->setAval_dic_sem($data[$i]['aval_dic_sem']);
          $semillero->setAval_dic_unidad($data[$i]['aval_dic_unidad']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['gi_nombre']);
           $semillero->setGrupo_investigacion_id($grupo_investigacion);
           $semillero->setUnidad_academica($data[$i]['dpto_d']);
          $semillero->setFacultad($data[$i]['fdescrip']);
          $semillero->setPlan_estudio($data[$i]['pe_descrip']);

          array_push($lista,$semillero);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_Pendiente(){
      $lista = array();
      try {
          $sql ="SELECT s.`id`, s.`nombre`, s.`sigla`, s.`fecha_creacion`, s.`aval_dic_grupo`, s.`aval_dic_sem`, s.`aval_dic_unidad`,gi.nombre as `grupo_investigacion_id`, s.`departamento`, s.`facultad`, s.`plan_estudios` FROM `semillero` s INNER JOIN grupo_investigacion gi ON s.grupo_investigacion_id=gi.id";
//          var_dump($sql);
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $semillero= new Semillero();
          $semillero->setId($data[$i]['id']);
          $semillero->setNombre($data[$i]['nombre']);
          $semillero->setSigla($data[$i]['sigla']);
          $semillero->setFecha_creacion($data[$i]['fecha_creacion']);
          $semillero->setAval_dic_grupo($data[$i]['aval_dic_grupo']);
          $semillero->setAval_dic_sem($data[$i]['aval_dic_sem']);
          $semillero->setAval_dic_unidad($data[$i]['aval_dic_unidad']);
           $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $semillero->setGrupo_investigacion_id($grupo_investigacion);
          $semillero->setUnidad_academica($data[$i]['departamento']);

          array_push($lista,$semillero);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_docente($docente){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `sigla`, `fecha_creacion`, `grupo_investigacion_id`, `departamento`, `facultad`, `plan_estudios` FROM `semillero_doc` WHERE `tutor`  = '$docente' limit 1 ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $semillero= new Semillero();
          $semillero->setId($data[$i]['id']);
          $semillero->setNombre($data[$i]['nombre']);
          $semillero->setSigla($data[$i]['sigla']);
          $semillero->setFecha_creacion($data[$i]['fecha_creacion']);
         $grupo_investigacion = new Grupo_investigacion();
           $grupo_investigacion->setId($data[$i]['grupo_investigacion_id']);
           $semillero->setGrupo_investigacion_id($grupo_investigacion);
          $semillero->setUnidad_academica($data[$i]['departamento']);
          $semillero->setFacultad($data[$i]['facultad']);
          $semillero->setPlan_estudio($data[$i]['plan_estudios']);

          array_push($lista,$semillero);
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