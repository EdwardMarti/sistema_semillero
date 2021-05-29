<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Únicamente cuando se pierde todo somos libres para actuar.  \\


class Perfiles_has_modulos {

  private $perfiles_id;
  private $modulos_activos_id;
  private $id;
  private $activo;

    /**
     * Constructor de Perfiles_has_modulos
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a perfiles_id
     * @return perfiles_id
     */
  public function getPerfiles_id(){
      return $this->perfiles_id;
  }

    /**
     * Modifica el valor correspondiente a perfiles_id
     * @param perfiles_id
     */
  public function setPerfiles_id($perfiles_id){
      $this->perfiles_id = $perfiles_id;
  }
    /**
     * Devuelve el valor correspondiente a modulos_activos_id
     * @return modulos_activos_id
     */
  public function getModulos_activos_id(){
      return $this->modulos_activos_id;
  }

    /**
     * Modifica el valor correspondiente a modulos_activos_id
     * @param modulos_activos_id
     */
  public function setModulos_activos_id($modulos_activos_id){
      $this->modulos_activos_id = $modulos_activos_id;
  }
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
     * Devuelve el valor correspondiente a activo
     * @return activo
     */
  public function getActivo(){
      return $this->activo;
  }

    /**
     * Modifica el valor correspondiente a activo
     * @param activo
     */
  public function setActivo($activo){
      $this->activo = $activo;
  }


}
//That`s all folks!