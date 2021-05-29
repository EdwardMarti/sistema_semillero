<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\

include_once realpath('../dao/interfaz/IPlan_accionDao.php');
include_once realpath('../dto/Plan_accion.php');
include_once realpath('../dto/Semillero.php');
include_once realpath('../dto/Proyectos.php');
include_once realpath('../dto/Capacitaciones.php');
include_once realpath('../dto/Otras_actividades.php');

class Plan_accionDao implements IPlan_accionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Plan_accion en la base de datos.
     * @param plan_accion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($plan_accion){
      $id=$plan_accion->getId();
$semestre=$plan_accion->getSemestre();
$ano=$plan_accion->getAno();
$vbo_dirSemillero=$plan_accion->getVbo_dirSemillero();
$vbo_dirGinvestigacion=$plan_accion->getVbo_dirGinvestigacion();
$vbo_facultaInv=$plan_accion->getVbo_facultaInv();
$semillero_id=$plan_accion->getSemillero_id()->getId();
$proyectos_id=$plan_accion->getProyectos_id()->getId();
$capacitaciones_id=$plan_accion->getCapacitaciones_id()->getId();
$otras_actividades_id=$plan_accion->getOtras_actividades_id()->getId();

      try {
          $sql= "INSERT INTO `plan_accion`( `id`, `semestre`, `ano`, `vbo_dirSemillero`, `vbo_dirGinvestigacion`, `vbo_facultaInv`, `semillero_id`, `proyectos_id`, `capacitaciones_id`, `otras_actividades_id`)"
          ."VALUES ('$id','$semestre','$ano','$vbo_dirSemillero','$vbo_dirGinvestigacion','$vbo_facultaInv','$semillero_id','$proyectos_id','$capacitaciones_id','$otras_actividades_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Plan_accion en la base de datos.
     * @param plan_accion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($plan_accion){
      $id=$plan_accion->getId();

      try {
          $sql= "SELECT `id`, `semestre`, `ano`, `vbo_dirSemillero`, `vbo_dirGinvestigacion`, `vbo_facultaInv`, `semillero_id`, `proyectos_id`, `capacitaciones_id`, `otras_actividades_id`"
          ."FROM `plan_accion`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $plan_accion->setId($data[$i]['id']);
          $plan_accion->setSemestre($data[$i]['semestre']);
          $plan_accion->setAno($data[$i]['ano']);
          $plan_accion->setVbo_dirSemillero($data[$i]['vbo_dirSemillero']);
          $plan_accion->setVbo_dirGinvestigacion($data[$i]['vbo_dirGinvestigacion']);
          $plan_accion->setVbo_facultaInv($data[$i]['vbo_facultaInv']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $plan_accion->setSemillero_id($semillero);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $plan_accion->setProyectos_id($proyectos);
           $capacitaciones = new Capacitaciones();
           $capacitaciones->setId($data[$i]['capacitaciones_id']);
           $plan_accion->setCapacitaciones_id($capacitaciones);
           $otras_actividades = new Otras_actividades();
           $otras_actividades->setId($data[$i]['otras_actividades_id']);
           $plan_accion->setOtras_actividades_id($otras_actividades);

          }
      return $plan_accion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Plan_accion en la base de datos.
     * @param plan_accion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($plan_accion){
      $id=$plan_accion->getId();
$semestre=$plan_accion->getSemestre();
$ano=$plan_accion->getAno();
$vbo_dirSemillero=$plan_accion->getVbo_dirSemillero();
$vbo_dirGinvestigacion=$plan_accion->getVbo_dirGinvestigacion();
$vbo_facultaInv=$plan_accion->getVbo_facultaInv();
$semillero_id=$plan_accion->getSemillero_id()->getId();
$proyectos_id=$plan_accion->getProyectos_id()->getId();
$capacitaciones_id=$plan_accion->getCapacitaciones_id()->getId();
$otras_actividades_id=$plan_accion->getOtras_actividades_id()->getId();

      try {
          $sql= "UPDATE `plan_accion` SET`id`='$id' ,`semestre`='$semestre' ,`ano`='$ano' ,`vbo_dirSemillero`='$vbo_dirSemillero' ,`vbo_dirGinvestigacion`='$vbo_dirGinvestigacion' ,`vbo_facultaInv`='$vbo_facultaInv' ,`semillero_id`='$semillero_id' ,`proyectos_id`='$proyectos_id' ,`capacitaciones_id`='$capacitaciones_id' ,`otras_actividades_id`='$otras_actividades_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Plan_accion en la base de datos.
     * @param plan_accion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($plan_accion){
      $id=$plan_accion->getId();

      try {
          $sql ="DELETE FROM `plan_accion` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Plan_accion en la base de datos.
     * @return ArrayList<Plan_accion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `semestre`, `ano`, `vbo_dirSemillero`, `vbo_dirGinvestigacion`, `vbo_facultaInv`, `semillero_id`, `proyectos_id`, `capacitaciones_id`, `otras_actividades_id`"
          ."FROM `plan_accion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $plan_accion= new Plan_accion();
          $plan_accion->setId($data[$i]['id']);
          $plan_accion->setSemestre($data[$i]['semestre']);
          $plan_accion->setAno($data[$i]['ano']);
          $plan_accion->setVbo_dirSemillero($data[$i]['vbo_dirSemillero']);
          $plan_accion->setVbo_dirGinvestigacion($data[$i]['vbo_dirGinvestigacion']);
          $plan_accion->setVbo_facultaInv($data[$i]['vbo_facultaInv']);
           $semillero = new Semillero();
           $semillero->setId($data[$i]['semillero_id']);
           $plan_accion->setSemillero_id($semillero);
           $proyectos = new Proyectos();
           $proyectos->setId($data[$i]['proyectos_id']);
           $plan_accion->setProyectos_id($proyectos);
           $capacitaciones = new Capacitaciones();
           $capacitaciones->setId($data[$i]['capacitaciones_id']);
           $plan_accion->setCapacitaciones_id($capacitaciones);
           $otras_actividades = new Otras_actividades();
           $otras_actividades->setId($data[$i]['otras_actividades_id']);
           $plan_accion->setOtras_actividades_id($otras_actividades);

          array_push($lista,$plan_accion);
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