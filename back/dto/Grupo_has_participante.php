<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\


class Grupo_has_participante {

  private $id;
  private $participantes_id;
  private $grupo_investigacion_id;

    /**
     * Constructor de Grupo_has_participante
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
     * Devuelve el valor correspondiente a participantes_id
     * @return participantes_id
     */
  public function getParticipantes_id(){
      return $this->participantes_id;
  }

    /**
     * Modifica el valor correspondiente a participantes_id
     * @param participantes_id
     */
  public function setParticipantes_id($participantes_id){
      $this->participantes_id = $participantes_id;
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


}
//That`s all folks!