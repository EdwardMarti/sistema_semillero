<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La primera regla del proyecto es no hacer preguntas  \\

include_once realpath('../dao/interfaz/IPares_academicosDao.php');
include_once realpath('../dto/Pares_academicos.php');
include_once realpath('../dto/Persona.php');
include_once realpath('../dto/Tipo_docuemnto.php');

class Pares_academicosDao implements IPares_academicosDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Pares_academicos en la base de datos.
     * @param pares_academicos objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($pares_academicos){
    $inst_empresa=$pares_academicos->getInst_empresa();
    $persona_id=$pares_academicos->getPersona_id()->getId();
    $numero_docuemnto=$pares_academicos->getNumero_docuemnto();
    $tipo_docuemnto_id=$pares_academicos->getTipo_docuemnto_id()->getId();

      try {
          $sql= "INSERT INTO `pares_academicos`( `inst_empresa`, `persona_id`, `numero_docuemnto`, `tipo_docuemnto_id`)"
          ."VALUES ('$inst_empresa','$persona_id','$numero_docuemnto','$tipo_docuemnto_id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Pares_academicos en la base de datos.
     * @param pares_academicos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($pares_academicos){
      $id=$pares_academicos->getId();

      try {
          $sql= "SELECT `id`, `inst_empresa`, `persona_id`, `numero_docuemnto`, `tipo_docuemnto_id`"
          ."FROM `pares_academicos`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $pares_academicos->setId($data[$i]['id']);
          $pares_academicos->setInst_empresa($data[$i]['inst_empresa']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $pares_academicos->setPersona_id($persona);
          $pares_academicos->setNumero_docuemnto($data[$i]['numero_docuemnto']);
           $tipo_docuemnto = new Tipo_docuemnto();
           $tipo_docuemnto->setId($data[$i]['tipo_docuemnto_id']);
           $pares_academicos->setTipo_docuemnto_id($tipo_docuemnto);

          }
      return $pares_academicos;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Pares_academicos en la base de datos.
     * @param pares_academicos objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($pares_academicos){
      $id=$pares_academicos->getId();
$inst_empresa=$pares_academicos->getInst_empresa();
$persona_id=$pares_academicos->getPersona_id()->getId();
$numero_docuemnto=$pares_academicos->getNumero_docuemnto();
$tipo_docuemnto_id=$pares_academicos->getTipo_docuemnto_id()->getId();

      try {
          $sql= "UPDATE `pares_academicos` SET`id`='$id' ,`inst_empresa`='$inst_empresa' ,`persona_id`='$persona_id' ,`numero_docuemnto`='$numero_docuemnto' ,`tipo_docuemnto_id`='$tipo_docuemnto_id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Pares_academicos en la base de datos.
     * @param pares_academicos objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($pares_academicos){
      $id=$pares_academicos->getId();

      try {
          $sql ="DELETE FROM `pares_academicos` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Pares_academicos en la base de datos.
     * @return ArrayList<Pares_academicos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT id, nombre, num_documento, inst_empresa, correo, telefono, persona_id, semillero_id, tipo_docuemnto_id FROM pares_academ WHERE semillero_id = $semillero_id ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $pares_academicos= new Pares_academicos();
          $pares_academicos->setId($data[$i]['id']);
          $pares_academicos->setInst_empresa($data[$i]['inst_empresa']);
           $persona = new Persona();
           $persona->setId($data[$i]['persona_id']);
           $pares_academicos->setPersona_id($persona);
          $pares_academicos->setNumero_docuemnto($data[$i]['numero_docuemnto']);
           $tipo_docuemnto = new Tipo_docuemnto();
           $tipo_docuemnto->setId($data[$i]['tipo_docuemnto_id']);
           $pares_academicos->setTipo_docuemnto_id($tipo_docuemnto);

          array_push($lista,$pares_academicos);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }
    /**
     * Busca un objeto Pares_academicos en la base de datos.
     * @return ArrayList<Pares_academicos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll_id($semillero_id){
      $lista = array();
      try {
          $sql ="SELECT id, nombre, num_documento, inst_empresa, correo, telefono, persona_id, semillero_id, tipo_docuemnto_id FROM pares_academ WHERE semillero_id = $semillero_id ";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
            $pares_academicos= new Pares_academicos();
            $pares_academicos->setId($data[$i]['id']);
            $pares_academicos->setInst_empresa($data[$i]['inst_empresa']);
            $persona = new Persona();
            $persona->setId($data[$i]['persona_id']);
            $persona->setCorreo($data[$i]['correo']);
            $persona->setTelefono($data[$i]['telefono']);
            $pares_academicos->setPersona_id($persona);
            $pares_academicos->setNumero_docuemnto($data[$i]['num_documento']);
            $tipo_docuemnto = new Tipo_docuemnto();
            $tipo_docuemnto->setId($data[$i]['tipo_docuemnto_id']);
            $pares_academicos->setTipo_docuemnto_id($tipo_docuemnto);
            array_push($lista,$pares_academicos);
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