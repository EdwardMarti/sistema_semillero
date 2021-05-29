<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\


class Titulos {

  private $id;
  private $descripcion;
  private $universidad_id;
  private $docente_id;

    /**
     * Constructor de Titulos
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
     * Devuelve el valor correspondiente a universidad_id
     * @return universidad_id
     */
  public function getUniversidad_id(){
      return $this->universidad_id;
  }

    /**
     * Modifica el valor correspondiente a universidad_id
     * @param universidad_id
     */
  public function setUniversidad_id($universidad_id){
      $this->universidad_id = $universidad_id;
  }
    /**
     * Devuelve el valor correspondiente a docente_id
     * @return docente_id
     */
  public function getDocente_id(){
      return $this->docente_id;
  }

    /**
     * Modifica el valor correspondiente a docente_id
     * @param docente_id
     */
  public function setDocente_id($docente_id){
      $this->docente_id = $docente_id;
  }


}
//That`s all folks!