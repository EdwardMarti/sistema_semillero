<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Antes que me hubiera apasionado por mujer alguna, jugué mi corazón al azar y me lo ganó la Violencia.  \\


class Grupo_has_proyecto {

  private $id;
  private $grupo_investigacion_id;
  private $proyectos_terminados_id;

    /**
     * Constructor de Grupo_has_proyecto
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
     * Devuelve el valor correspondiente a proyectos_terminados_id
     * @return proyectos_terminados_id
     */
  public function getProyectos_terminados_id(){
      return $this->proyectos_terminados_id;
  }

    /**
     * Modifica el valor correspondiente a proyectos_terminados_id
     * @param proyectos_terminados_id
     */
  public function setProyectos_terminados_id($proyectos_terminados_id){
      $this->proyectos_terminados_id = $proyectos_terminados_id;
  }


}
//That`s all folks!