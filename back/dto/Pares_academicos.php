<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo a tu edad hacía calculadoras en visualBasic  \\


class Pares_academicos {

  private $id;
  private $inst_empresa;
  private $persona_id;
  private $numero_docuemnto;
  private $tipo_docuemnto_id;

    /**
     * Constructor de Pares_academicos
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
     * Devuelve el valor correspondiente a inst_empresa
     * @return inst_empresa
     */
  public function getInst_empresa(){
      return $this->inst_empresa;
  }

    /**
     * Modifica el valor correspondiente a inst_empresa
     * @param inst_empresa
     */
  public function setInst_empresa($inst_empresa){
      $this->inst_empresa = $inst_empresa;
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
     * Devuelve el valor correspondiente a numero_docuemnto
     * @return numero_docuemnto
     */
  public function getNumero_docuemnto(){
      return $this->numero_docuemnto;
  }

    /**
     * Modifica el valor correspondiente a numero_docuemnto
     * @param numero_docuemnto
     */
  public function setNumero_docuemnto($numero_docuemnto){
      $this->numero_docuemnto = $numero_docuemnto;
  }
    /**
     * Devuelve el valor correspondiente a tipo_docuemnto_id
     * @return tipo_docuemnto_id
     */
  public function getTipo_docuemnto_id(){
      return $this->tipo_docuemnto_id;
  }

    /**
     * Modifica el valor correspondiente a tipo_docuemnto_id
     * @param tipo_docuemnto_id
     */
  public function setTipo_docuemnto_id($tipo_docuemnto_id){
      $this->tipo_docuemnto_id = $tipo_docuemnto_id;
  }


}
//That`s all folks!