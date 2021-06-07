<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase de prueba ¿Quieres ver la de verdad? ( ͡~ ͜ʖ ͡°)  \\

include_once realpath('../dao/interfaz/IEstudianteDao.php');
include_once realpath('../dto/Estudiante.php');
include_once realpath('../dto/Persona.php');
include_once realpath('../dto/Tipo_docuemnto.php');

class EstudianteDao implements IEstudianteDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Estudiante en la base de datos.
     * @param estudiante objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
public function insert($estudiante){
    $codigo=$estudiante->getCodigo();
    $semestre=$estudiante->getSemestre();
    $programa_academico=$estudiante->getPrograma_academico();
    $persona_id=$estudiante->getPersona_id()->getId();
    $num_documento=$estudiante->getNum_documento();
    $tipo_docuemnto_id=$estudiante->getTipo_docuemnto_id()->getId();

    try {
        $sql= "INSERT INTO `estudiante`( `codigo`, `semestre`, `programa_academico`, `persona_id`, `num_documento`, `tipo_docuemnto_id`)"
        ."VALUES ('$codigo','$semestre','$programa_academico','$persona_id','$num_documento','$tipo_docuemnto_id')";
        return $this->insertarConsulta($sql);
    } catch (SQLException $e) {
        throw new Exception('Primary key is null');
    }
}

    /**
     * Busca un objeto Estudiante en la base de datos.
     * @param estudiante objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($estudiante){
      $id=$estudiante->getId();

      try {
          $sql= "SELECT `id`, `codigo`, `semestre`, `programa_academico`, `persona_id`, `num_documento`, `tipo_docuemnto_id`"
          ."FROM `estudiante`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $estudiante->setId($data[$i]['id']);
          $estudiante->setCodigo($data[$i]['codigo']);
          $estudiante->setSemestre($data[$i]['semestre']);
          $estudiante->setPrograma_academico($data[$i]['programa_academico']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $estudiante->setPersona_id($persona);
          $estudiante->setNum_documento($data[$i]['num_documento']);
           $tipo_docuemnto = new Tipo_docuemnto();
           $tipo_docuemnto->setId($data[$i]['tipo_docuemnto_id']);
           $estudiante->setTipo_docuemnto_id($tipo_docuemnto);

          }
      return $estudiante;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Estudiante en la base de datos.
     * @param estudiante objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($estudiante){
    $id=$estudiante->getId();
    $codigo=$estudiante->getCodigo();
    $semestre=$estudiante->getSemestre();
    $programa_academico=$estudiante->getPrograma_academico();
    $num_documento=$estudiante->getNum_documento();
    $tipo_docuemnto_id=$estudiante->getTipo_docuemnto_id()->getId();

  
      try {
          $sql= "UPDATE `estudiante` SET `id`='$id' ,`codigo`='$codigo' ,`semestre`='$semestre' ,
          `programa_academico`='$programa_academico' ,
          `num_documento`='$num_documento' ,`tipo_docuemnto_id`='$tipo_docuemnto_id' WHERE `id`='$id' ";
         return $this->updateConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Estudiante en la base de datos.
     * @param estudiante objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($estudiante){
      $id=$estudiante->getId();

      try {
          $sql ="DELETE FROM `estudiante` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Estudiante en la base de datos.
     * @return ArrayList<Estudiante> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `codigo`, `semestre`, `programa_academico`, `persona_id`, `num_documento`, `tipo_docuemnto_id`"
          ."FROM `estudiante`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $estudiante= new Estudiante();
          $estudiante->setId($data[$i]['id']);
          $estudiante->setCodigo($data[$i]['codigo']);
          $estudiante->setSemestre($data[$i]['semestre']);
          $estudiante->setPrograma_academico($data[$i]['programa_academico']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $estudiante->setPersona_id($persona);
          $estudiante->setNum_documento($data[$i]['num_documento']);
           $tipo_docuemnto = new Tipo_docuemnto();
           $tipo_docuemnto->setId($data[$i]['tipo_docuemnto_id']);
           $estudiante->setTipo_docuemnto_id($tipo_docuemnto);

          array_push($lista,$estudiante);
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
//          SELECT `id`, `nombre`, `num_documento`, `programa_academico`, `codigo`, `semestre`, `correo`, `telefono`, `persona_id`, `semillero_id` FROM `estudiante_semi` WHERE `semillero_id` = 1
          $sql ="SELECT `id`, `nombre`, `num_documento`,`programa_academico`,`codigo`, `semestre`,`correo`,`telefono`,  `persona_id`, `tipo_docuemnto_id`"
          ." FROM `estudiante_semi` "
          ." WHERE `semillero_id` = '$id' ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $estudiante = new Estudiante();
                $estudiante->setId($data[$i]['id']);
                $estudiante->setNum_documento($data[$i]['num_documento']);
                $estudiante->setPrograma_academico($data[$i]['programa_academico']);
                $estudiante->setCodigo($data[$i]['codigo']);
                $estudiante->setSemestre($data[$i]['semestre']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $persona->setNombre($data[$i]['nombre']);
                $persona->setCorreo($data[$i]['correo']);
                $persona->setTelefono($data[$i]['telefono']);
                $estudiante->setPersona_id($persona);
                $tipo_docuemnto = new Tipo_docuemnto();
                $tipo_docuemnto->setId($data[$i]['tipo_docuemnto_id']);
                $estudiante->setTipo_docuemnto_id($tipo_docuemnto);
                array_push($lista,$estudiante);
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
        $sentencia = null;
        return true;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!