<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Santos frameworks Batman!  \\


class Departamento {

  private $id;
  private $descripcion;
  private $facultad_id;

    /**
     * Constructor de Departamento
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
     * Devuelve el valor correspondiente a facultad_id
     * @return facultad_id
     */
  public function getFacultad_id(){
      return $this->facultad_id;
  }

    /**
     * Modifica el valor correspondiente a facultad_id
     * @param facultad_id
     */
  public function setFacultad_id($facultad_id){
      $this->facultad_id = $facultad_id;
  }


}
//That`s all folks!