<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Y si mejor estudias comunicación?  \\


class Semillero {

  private $id;
  private $nombre;
  private $sigla;
  private $fecha_creacion;
  private $aval_dic_grupo;
  private $aval_dic_sem;
  private $aval_dic_unidad;
  private $grupo_investigacion_id;
  private $unidad_academica;
  private $facultad;
  private $plan_estudio;
  private $ubicacion;

    /**
     * Constructor de Semillero
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
     * Devuelve el valor correspondiente a nombre
     * @return nombre
     */
  public function getNombre(){
      return $this->nombre;
  }

    /**
     * Modifica el valor correspondiente a nombre
     * @param nombre
     */
  public function setNombre($nombre){
      $this->nombre = $nombre;
  }
  
  function getFacultad() {
      return $this->facultad;
  }

  function getUbicacion() {
      return $this->ubicacion;
  }

  function setUbicacion($ubicacion) {
      $this->ubicacion = $ubicacion;
  }

    function getPlan_estudio() {
      return $this->plan_estudio;
  }

  function setFacultad($facultad) {
      $this->facultad = $facultad;
  }

  function setPlan_estudio($plan_estudio) {
      $this->plan_estudio = $plan_estudio;
  }

      /**
     * Devuelve el valor correspondiente a sigla
     * @return sigla
     */
  public function getSigla(){
      return $this->sigla;
  }

    /**
     * Modifica el valor correspondiente a sigla
     * @param sigla
     */
  public function setSigla($sigla){
      $this->sigla = $sigla;
  }
    /**
     * Devuelve el valor correspondiente a fecha_creacion
     * @return fecha_creacion
     */
  public function getFecha_creacion(){
      return $this->fecha_creacion;
  }

    /**
     * Modifica el valor correspondiente a fecha_creacion
     * @param fecha_creacion
     */
  public function setFecha_creacion($fecha_creacion){
      $this->fecha_creacion = $fecha_creacion;
  }
    /**
     * Devuelve el valor correspondiente a aval_dic_grupo
     * @return aval_dic_grupo
     */
  public function getAval_dic_grupo(){
      return $this->aval_dic_grupo;
  }

    /**
     * Modifica el valor correspondiente a aval_dic_grupo
     * @param aval_dic_grupo
     */
  public function setAval_dic_grupo($aval_dic_grupo){
      $this->aval_dic_grupo = $aval_dic_grupo;
  }
    /**
     * Devuelve el valor correspondiente a aval_dic_sem
     * @return aval_dic_sem
     */
  public function getAval_dic_sem(){
      return $this->aval_dic_sem;
  }

    /**
     * Modifica el valor correspondiente a aval_dic_sem
     * @param aval_dic_sem
     */
  public function setAval_dic_sem($aval_dic_sem){
      $this->aval_dic_sem = $aval_dic_sem;
  }
    /**
     * Devuelve el valor correspondiente a aval_dic_unidad
     * @return aval_dic_unidad
     */
  public function getAval_dic_unidad(){
      return $this->aval_dic_unidad;
  }

    /**
     * Modifica el valor correspondiente a aval_dic_unidad
     * @param aval_dic_unidad
     */
  public function setAval_dic_unidad($aval_dic_unidad){
      $this->aval_dic_unidad = $aval_dic_unidad;
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
     * Devuelve el valor correspondiente a unidad_academica
     * @return unidad_academica
     */
  public function getUnidad_academica(){
      return $this->unidad_academica;
  }

    /**
     * Modifica el valor correspondiente a unidad_academica
     * @param unidad_academica
     */
  public function setUnidad_academica($unidad_academica){
      $this->unidad_academica = $unidad_academica;
  }


}
//That`s all folks!