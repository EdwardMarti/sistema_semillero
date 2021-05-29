<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Me arreglas mi impresora?  \\


class Persona_has_semillero {

  private $id;
  private $persona_id;
  private $semillero_id;

    /**
     * Constructor de Persona_has_semillero
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
     * Devuelve el valor correspondiente a semillero_id
     * @return semillero_id
     */
  public function getSemillero_id(){
      return $this->semillero_id;
  }

    /**
     * Modifica el valor correspondiente a semillero_id
     * @param semillero_id
     */
  public function setSemillero_id($semillero_id){
      $this->semillero_id = $semillero_id;
  }


}
//That`s all folks!