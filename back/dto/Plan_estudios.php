<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando uses Anarchy, Georgie, tú también flotarás  \\


class Plan_estudios {

  private $id;
  private $descripcion;
  private $departamento_id;

    /**
     * Constructor de Plan_estudios
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
     * Devuelve el valor correspondiente a departamento_id
     * @return departamento_id
     */
  public function getDepartamento_id(){
      return $this->departamento_id;
  }

    /**
     * Modifica el valor correspondiente a departamento_id
     * @param departamento_id
     */
  public function setDepartamento_id($departamento_id){
      $this->departamento_id = $departamento_id;
  }


}
//That`s all folks!