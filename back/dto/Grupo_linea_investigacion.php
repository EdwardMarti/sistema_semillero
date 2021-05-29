<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Era más fácil crear un framework que aprender a usar uno existente  \\


class Grupo_linea_investigacion {

  private $id;
  private $grupo_investigacion_id;
  private $linea_investigacion_id;

    /**
     * Constructor de Grupo_linea_investigacion
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
     * Devuelve el valor correspondiente a grupo_investigacion_id
     * @return grupo_investigacion_id
     */
  public function getGrupo_investigacion_id(){
      return $this->grupo_investigacion_id;
  }

    /**
     * Modifica el valor correspondiente a grupo_investigacion_id
     * @param grupo_investigacion_id
     */
  public function setGrupo_investigacion_id($grupo_investigacion_id){
      $this->grupo_investigacion_id = $grupo_investigacion_id;
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