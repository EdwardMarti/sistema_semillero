<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Únicamente cuando se pierde todo somos libres para actuar.  \\


class Sem_linea_investigacion {

  private $id;
  private $semillero_id;
  private $linea_investigacion_id;

    /**
     * Constructor de Sem_linea_investigacion
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
    /**
     * Devuelve el valor correspondiente a linea_investigacion_id
     * @return linea_investigacion_id
     */
  public function getLinea_investigacion_id(){
      return $this->linea_investigacion_id;
  }

    /**
     * Modifica el valor correspondiente a linea_investigacion_id
     * @param linea_investigacion_id
     */
  public function setLinea_investigacion_id($linea_investigacion_id){
      $this->linea_investigacion_id = $linea_investigacion_id;
  }


}
//That`s all folks!