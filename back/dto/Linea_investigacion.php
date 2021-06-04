<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Se buscan memeros profesionales. Contacto: El benévolo señor Arciniegas  \\


class Linea_investigacion {

  private $id;
  private $descripcion;
  private $lider;
  private $disciplina_id;

    /**
     * Constructor de Linea_investigacion
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
     * Devuelve el valor correspondiente a descripcion
     * @return descripcion
     */
  public function getDescripcion(){
      return $this->descripcion;
  }

    /**
     * Modifica el valor correspondiente a descripcion
     * @param descripcion
     */
  public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
  }
    /**
     * Devuelve el valor correspondiente a lider
     * @return lider
     */
  public function getLider(){
      return $this->lider;
  }

    /**
     * Modifica el valor correspondiente a lider
     * @param lider
     */
  public function setLider($lider){
      $this->lider = $lider;
  }
    /**
     * Devuelve el valor correspondiente a disciplina_id
     * @return disciplina_id
     */
  public function getDisciplina_id(){
      return $this->disciplina_id;
  }

    /**
     * Modifica el valor correspondiente a disciplina_id
     * @param disciplina_id
     */
  public function setDisciplina_id($disciplina_id){
      $this->disciplina_id = $disciplina_id;
  }


}
//That`s all folks!