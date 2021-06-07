<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Sólo relájate y deja que alguien más lo haga  \\

include_once realpath('../dao/interfaz/IPersona_has_semilleroDao.php');
include_once realpath('../dto/Persona_has_semillero.php');
include_once realpath('../dto/Persona.php');
include_once realpath('../dto/Semillero.php');
include_once realpath('../dto/Grupo_investigacion.php');
include_once realpath('../dto/Docente.php');
include_once realpath('../dto/Tipo_vinculacion.php');


class Persona_has_semilleroDao implements IPersona_has_semilleroDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($persona_has_semillero){
//      $id=$persona_has_semillero->getId();
$persona_id=$persona_has_semillero->getPersona_id()->getId();
$semillero_id=$persona_has_semillero->getSemillero_id()->getId();

      try {
          $sql= "INSERT INTO `persona_has_semillero`(  `persona_id`, `semillero_id`)"
          ."VALUES ('$persona_id','$semillero_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($persona_has_semillero){
      $id=$persona_has_semillero->getId();

      try {
          $sql= "SELECT `id`, `persona_id`, `semillero_id`"
          ."FROM `persona_has_semillero`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $persona_has_semillero->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona_has_semillero->setPersona_id($persona);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $persona_has_semillero->setSemillero_id($semillero);

          }
      return $persona_has_semillero;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($persona_has_semillero){
      $id=$persona_has_semillero->getId();
$persona_id=$persona_has_semillero->getPersona_id()->getId();
$semillero_id=$persona_has_semillero->getSemillero_id()->getId();

      try {
          $sql= "UPDATE `persona_has_semillero` SET`id`='$id' ,`persona_id`='$persona_id' ,`semillero_id`='$semillero_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($persona_has_semillero){
      $id=$persona_has_semillero->getId();

      try {
          $sql ="DELETE FROM `persona_has_semillero` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

      /**
     * Elimina un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function deletecustom($persona_has_semillero){
        $id_persona=$persona_has_semillero->getPersona_id();
        $id_semillero=$persona_has_semillero->getSemillero_id();
  
        try {
            $sql ="DELETE FROM `persona_has_semillero` WHERE `persona_id`='$id_persona' AND `semillero_id`='$id_semillero' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Persona_has_semillero en la base de datos.
     * @return ArrayList<Persona_has_semillero> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `persona_id`, `semillero_id`"
          ."FROM `persona_has_semillero`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $persona_has_semillero= new Persona_has_semillero();
          $persona_has_semillero->setId($data[$i]['id']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona_has_semillero->setPersona_id($persona);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $persona_has_semillero->setSemillero_id($semillero);

          array_push($lista,$persona_has_semillero);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  public function listAll_todo($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `gi_nombre`, `departamento`, `dpto_d`, `facultad`, `fdescrip`, `plan_estudios`, `pe_descrip`, `nombreD`, `telefono`, `correo`, `tipo_vinculacion_id`, `descripcion` FROM `data_seme` WHERE `id` = '$id'";
//          var_dump($sql);
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $persona_has_semillero= new Persona_has_semillero();
           $persona_has_semillero->setId($data[$i]['id']);
          
               $semillero = new Semillero();
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
          $persona_has_semillero->setSemillero_id($semillero);
          
           $persona = new Persona();
           $persona->setNombre($data[$i]['nombreD']);
           $persona->setTelefono($data[$i]['telefono']);
           $persona->setCorreo($data[$i]['correo']);
           $perfiles = new Perfiles();
           $perfiles->setId($data[$i]['descripcion']);
           $persona->setPerfiles_id($perfiles);
           $persona_has_semillero->setPersona_id($persona);


                array_push($lista,$persona_has_semillero);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_Semillero($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `sigla`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, `grupo_investigacion_id`, `gi_nombre`, `departamento`, `dpto_d`, `facultad`, `fdescrip`, `plan_estudios`, `pe_descrip`, `ubicacionSemillero`, `persona_id`, `nombreD`, `telefono`, `correo`, `tipo_vinculacion_id`, `descripcion`, `id_docente`, `ubicacionDocente` FROM `data_seme` WHERE `id` = '$id'";
//          var_dump($sql);
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $persona_has_semillero= new Persona_has_semillero();
           $persona_has_semillero->setId($data[$i]['id']);
          
               $semillero = new Semillero();
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
                $semillero->setUbicacion($data[$i]['ubicacionSemillero']);
          $persona_has_semillero->setSemillero_id($semillero);
          
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $persona->setNombre($data[$i]['nombreD']);
           $persona->setTelefono($data[$i]['telefono']);
           $persona->setCorreo($data[$i]['correo']);
           $persona->setId_aux($data[$i]['id_docente']);
           $perfiles = new Perfiles();
           $perfiles->setId($data[$i]['tipo_vinculacion_id']);
           $perfiles->setDescripcion($data[$i]['ubicacionDocente']);
           $persona->setPerfiles_id($perfiles);
           
           
           $persona_has_semillero->setPersona_id($persona);


                array_push($lista,$persona_has_semillero);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
  
  public function listAll_Stado($id){
      $lista = array();
      try {
          $sql ="SELECT `id`, `fecha_creacion`, `aval_dic_grupo`, `aval_dic_sem`, `aval_dic_unidad`, FROM `semillero` WHERE `id` = '$id'";
//          var_dump($sql);
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $persona_has_semillero= new Persona_has_semillero();
           $persona_has_semillero->setId($data[$i]['id']);
          
               $semillero = new Semillero();
               
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
          $persona_has_semillero->setSemillero_id($semillero);
          
           $persona = new Persona();
           $persona->setNombre($data[$i]['nombreD']);
           $persona->setTelefono($data[$i]['telefono']);
           $persona->setCorreo($data[$i]['correo']);
           $perfiles = new Perfiles();
           $perfiles->setId($data[$i]['descripcion']);
           $persona->setPerfiles_id($perfiles);
           $persona_has_semillero->setPersona_id($persona);


                array_push($lista,$persona_has_semillero);
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