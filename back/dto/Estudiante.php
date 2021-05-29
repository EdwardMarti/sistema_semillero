<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo a tu edad hacía calculadoras en visualBasic  \\


class Estudiante {

  private $id;
  private $codigo;
  private $semestre;
  private $programa_academico;
  private $persona_id;
  private $num_documento;
  private $tipo_docuemnto_id;

    /**
     * Constructor de Estudiante
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
     * Devuelve el valor correspondiente a codigo
     * @return codigo
     */
  public function getCodigo(){
      return $this->codigo;
  }

    /**
     * Modifica el valor correspondiente a codigo
     * @param codigo
     */
  public function setCodigo($codigo){
      $this->codigo = $codigo;
  }
    /**
     * Devuelve el valor correspondiente a semestre
     * @return semestre
     */
  public function getSemestre(){
      return $this->semestre;
  }

    /**
     * Modifica el valor correspondiente a semestre
     * @param semestre
     */
  public function setSemestre($semestre){
      $this->semestre = $semestre;
  }
    /**
     * Devuelve el valor correspondiente a programa_academico
     * @return programa_academico
     */
  public function getPrograma_academico(){
      return $this->programa_academico;
  }

    /**
     * Modifica el valor correspondiente a programa_academico
     * @param programa_academico
     */
  public function setPrograma_academico($programa_academico){
      $this->programa_academico = $programa_academico;
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
     * Devuelve el valor correspondiente a num_documento
     * @return num_documento
     */
  public function getNum_documento(){
      return $this->num_documento;
  }

    /**
     * Modifica el valor correspondiente a num_documento
     * @param num_documento
     */
  public function setNum_documento($num_documento){
      $this->num_documento = $num_documento;
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