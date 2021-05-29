<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\


class Plan_accion {

  private $id;
  private $semestre;
  private $ano;
  private $vbo_dirSemillero;
  private $vbo_dirGinvestigacion;
  private $vbo_facultaInv;
  private $semillero_id;
  private $proyectos_id;
  private $capacitaciones_id;
  private $otras_actividades_id;

    /**
     * Constructor de Plan_accion
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
     * Devuelve el valor correspondiente a semestre
     * @return semestre
     */
  public function getSemestre(){
      return $this->semestre;
  }

    /**
     * Modifica el valor correspondiente a semestre
     * @param semestre
     */
  public function setSemestre($semestre){
      $this->semestre = $semestre;
  }
    /**
     * Devuelve el valor correspondiente a ano
     * @return ano
     */
  public function getAno(){
      return $this->ano;
  }

    /**
     * Modifica el valor correspondiente a ano
     * @param ano
     */
  public function setAno($ano){
      $this->ano = $ano;
  }
    /**
     * Devuelve el valor correspondiente a vbo_dirSemillero
     * @return vbo_dirSemillero
     */
  public function getVbo_dirSemillero(){
      return $this->vbo_dirSemillero;
  }

    /**
     * Modifica el valor correspondiente a vbo_dirSemillero
     * @param vbo_dirSemillero
     */
  public function setVbo_dirSemillero($vbo_dirSemillero){
      $this->vbo_dirSemillero = $vbo_dirSemillero;
  }
    /**
     * Devuelve el valor correspondiente a vbo_dirGinvestigacion
     * @return vbo_dirGinvestigacion
     */
  public function getVbo_dirGinvestigacion(){
      return $this->vbo_dirGinvestigacion;
  }

    /**
     * Modifica el valor correspondiente a vbo_dirGinvestigacion
     * @param vbo_dirGinvestigacion
     */
  public function setVbo_dirGinvestigacion($vbo_dirGinvestigacion){
      $this->vbo_dirGinvestigacion = $vbo_dirGinvestigacion;
  }
    /**
     * Devuelve el valor correspondiente a vbo_facultaInv
     * @return vbo_facultaInv
     */
  public function getVbo_facultaInv(){
      return $this->vbo_facultaInv;
  }

    /**
     * Modifica el valor correspondiente a vbo_facultaInv
     * @param vbo_facultaInv
     */
  public function setVbo_facultaInv($vbo_facultaInv){
      $this->vbo_facultaInv = $vbo_facultaInv;
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
     * Devuelve el valor correspondiente a proyectos_id
     * @return proyectos_id
     */
  public function getProyectos_id(){
      return $this->proyectos_id;
  }

    /**
     * Modifica el valor correspondiente a proyectos_id
     * @param proyectos_id
     */
  public function setProyectos_id($proyectos_id){
      $this->proyectos_id = $proyectos_id;
  }
    /**
     * Devuelve el valor correspondiente a capacitaciones_id
     * @return capacitaciones_id
     */
  public function getCapacitaciones_id(){
      return $this->capacitaciones_id;
  }

    /**
     * Modifica el valor correspondiente a capacitaciones_id
     * @param capacitaciones_id
     */
  public function setCapacitaciones_id($capacitaciones_id){
      $this->capacitaciones_id = $capacitaciones_id;
  }
    /**
     * Devuelve el valor correspondiente a otras_actividades_id
     * @return otras_actividades_id
     */
  public function getOtras_actividades_id(){
      return $this->otras_actividades_id;
  }

    /**
     * Modifica el valor correspondiente a otras_actividades_id
     * @param otras_actividades_id
     */
  public function setOtras_actividades_id($otras_actividades_id){
      $this->otras_actividades_id = $otras_actividades_id;
  }


}
//That`s all folks!