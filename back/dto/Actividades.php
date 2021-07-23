<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En un lugar de La Mancha, de cuyo nombre no quiero acordarme...  \\


class Actividades {

  private $id;
  private $descripcion;
  private $proyectos_id;
  private $fecha_ini;
  private $fecha_fin;
  private $cumplimiento;
  private $puntos;

    /**
     * Constructor de Actividades
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
  function getFecha_ini() {
      return $this->fecha_ini;
  }

  function getFecha_fin() {
      return $this->fecha_fin;
  }

  function getCumplimiento() {
      return $this->cumplimiento;
  }

  function setFecha_ini($fecha_ini) {
      $this->fecha_ini = $fecha_ini;
  }

  function setFecha_fin($fecha_fin) {
      $this->fecha_fin = $fecha_fin;
  }

  function setCumplimiento($cumplimiento) {
      $this->cumplimiento = $cumplimiento;
  }
  function getPuntos() {
      return $this->puntos;
  }

  function setPuntos($puntos) {
      $this->puntos = $puntos;
  }

        /**
     * Modifica el valor correspondiente a descripcion
     * @param descripcion
     */
  public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
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


}
//That`s all folks!