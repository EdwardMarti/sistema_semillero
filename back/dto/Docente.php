<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ojos de perro azul  \\


class Docente {

  private $id;
  private $persona_id;
  private $password;
  private $tipo_vinculacion_id;
  private $ubicacion;

    /**
     * Constructor de Docente
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a id
     * @return id
     */
  public function getId(){
      return $this->id;
  }

    /**
     * Modifica el valor correspondiente a id
     * @param id
     */
  public function setId($id){
      $this->id = $id;
  }
    /**
     * Devuelve el valor correspondiente a persona_id
     * @return persona_id
     */
  public function getPersona_id(){
      return $this->persona_id;
  }

    /**
     * Modifica el valor correspondiente a persona_id
     * @param persona_id
     */
  public function setPersona_id($persona_id){
      $this->persona_id = $persona_id;
  }
    /**
     * Devuelve el valor correspondiente a password
     * @return password
     */
  public function getPassword(){
      return $this->password;
  }

    /**
     * Modifica el valor correspondiente a password
     * @param password
     */
  public function setPassword($password){
      $this->password = $password;
  }
    /**
     * Devuelve el valor correspondiente a tipo_vinculacion_id
     * @return tipo_vinculacion_id
     */
  public function getTipo_vinculacion_id(){
      return $this->tipo_vinculacion_id;
  }

    /**
     * Modifica el valor correspondiente a tipo_vinculacion_id
     * @param tipo_vinculacion_id
     */
  public function setTipo_vinculacion_id($tipo_vinculacion_id){
      $this->tipo_vinculacion_id = $tipo_vinculacion_id;
  }
    /**
     * Devuelve el valor correspondiente a ubicacion
     * @return ubicacion
     */
  public function getUbicacion(){
      return $this->ubicacion;
  }

    /**
     * Modifica el valor correspondiente a ubicacion
     * @param ubicacion
     */
  public function setUbicacion($ubicacion){
      $this->ubicacion = $ubicacion;
  }


}
//That`s all folks!