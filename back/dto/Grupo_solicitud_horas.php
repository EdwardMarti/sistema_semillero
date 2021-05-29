<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tenemos trabajos que odiamos para comprar cosas que no necesitamos.  \\


class Grupo_solicitud_horas {

  private $id;
  private $solicitud_horas_id;
  private $grupo_investigacion_id;

    /**
     * Constructor de Grupo_solicitud_horas
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
     * Devuelve el valor correspondiente a solicitud_horas_id
     * @return solicitud_horas_id
     */
  public function getSolicitud_horas_id(){
      return $this->solicitud_horas_id;
  }

    /**
     * Modifica el valor correspondiente a solicitud_horas_id
     * @param solicitud_horas_id
     */
  public function setSolicitud_horas_id($solicitud_horas_id){
      $this->solicitud_horas_id = $solicitud_horas_id;
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