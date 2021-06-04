<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\


class Disciplina {

  private $id;
  private $descripcion;
  private $area_id;

    /**
     * Constructor de Disciplina
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
     * Devuelve el valor correspondiente a area_id
     * @return area_id
     */
  public function getArea_id(){
      return $this->area_id;
  }

    /**
     * Modifica el valor correspondiente a area_id
     * @param area_id
     */
  public function setArea_id($area_id){
      $this->area_id = $area_id;
  }


}
//That`s all folks!