<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\


class Proyectos {

  private $id;
  private $titulo;
  private $investigador;
  private $tipo_proyecto_id;
  private $tiempo_ejecucion;
  private $fecha_ini;
  private $fecha_fin;
  private $resumen;
  private $obj_general;
  private $obj_especifico;
  private $resultados;
  private $costo_valor;
  private $producto;
  private $semillero_id;

    /**
     * Constructor de Proyectos
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
     * Devuelve el valor correspondiente a titulo
     * @return titulo
     */
  public function getTitulo(){
      return $this->titulo;
  }

    /**
     * Modifica el valor correspondiente a titulo
     * @param titulo
     */
  public function setTitulo($titulo){
      $this->titulo = $titulo;
  }
    /**
     * Devuelve el valor correspondiente a investigador
     * @return investigador
     */
  public function getInvestigador(){
      return $this->investigador;
  }

    /**
     * Modifica el valor correspondiente a investigador
     * @param investigador
     */
  public function setInvestigador($investigador){
      $this->investigador = $investigador;
  }
    /**
     * Devuelve el valor correspondiente a tipo_proyecto_id
     * @return tipo_proyecto_id
     */
  public function getTipo_proyecto_id(){
      return $this->tipo_proyecto_id;
  }

    /**
     * Modifica el valor correspondiente a tipo_proyecto_id
     * @param tipo_proyecto_id
     */
  public function setTipo_proyecto_id($tipo_proyecto_id){
      $this->tipo_proyecto_id = $tipo_proyecto_id;
  }
    /**
     * Devuelve el valor correspondiente a tiempo_ejecucion
     * @return tiempo_ejecucion
     */
  public function getTiempo_ejecucion(){
      return $this->tiempo_ejecucion;
  }

    /**
     * Modifica el valor correspondiente a tiempo_ejecucion
     * @param tiempo_ejecucion
     */
  public function setTiempo_ejecucion($tiempo_ejecucion){
      $this->tiempo_ejecucion = $tiempo_ejecucion;
  }
    /**
     * Devuelve el valor correspondiente a fecha_ini
     * @return fecha_ini
     */
  public function getFecha_ini(){
      return $this->fecha_ini;
  }

    /**
     * Modifica el valor correspondiente a fecha_ini
     * @param fecha_ini
     */
  public function setFecha_ini($fecha_ini){
      $this->fecha_ini = $fecha_ini;
  }
      /**
     * Modifica el valor correspondiente a fecha_ini
     * @param fecha_ini
     */
  function getFecha_fin() {
      return $this->fecha_fin;
  }
    /**
     * Modifica el valor correspondiente a fecha_ini
     * @param fecha_ini
     */
  function setFecha_fin($fecha_fin) {
      $this->fecha_fin = $fecha_fin;
  }

      /**
     * Devuelve el valor correspondiente a resumen
     * @return resumen
     */
  public function getResumen(){
      return $this->resumen;
  }

    /**
     * Modifica el valor correspondiente a resumen
     * @param resumen
     */
  public function setResumen($resumen){
      $this->resumen = $resumen;
  }
    /**
     * Devuelve el valor correspondiente a obj_general
     * @return obj_general
     */
  public function getObj_general(){
      return $this->obj_general;
  }

    /**
     * Modifica el valor correspondiente a obj_general
     * @param obj_general
     */
  public function setObj_general($obj_general){
      $this->obj_general = $obj_general;
  }
    /**
     * Devuelve el valor correspondiente a obj_especifico
     * @return obj_especifico
     */
  public function getobj_especifico(){
      return $this->obj_especifico;
  }

    /**
     * Modifica el valor correspondiente a obj_especifico
     * @param obj_especifico
     */
  public function setobj_especifico($obj_especifico){
      $this->obj_especifico = $obj_especifico;
  }
    /**
     * Devuelve el valor correspondiente a resultados
     * @return resultados
     */
  public function getResultados(){
      return $this->resultados;
  }

    /**
     * Modifica el valor correspondiente a resultados
     * @param resultados
     */
  public function setResultados($resultados){
      $this->resultados = $resultados;
  }
    /**
     * Devuelve el valor correspondiente a costo_valor
     * @return costo_valor
     */
  public function getCosto_valor(){
      return $this->costo_valor;
  }

    /**
     * Modifica el valor correspondiente a costo_valor
     * @param costo_valor
     */
  public function setCosto_valor($costo_valor){
      $this->costo_valor = $costo_valor;
  }
    /**
     * Devuelve el valor correspondiente a producto
     * @return producto
     */
  public function getProducto(){
      return $this->producto;
  }

    /**
     * Modifica el valor correspondiente a producto
     * @param producto
     */
  public function setProducto($producto){
      $this->producto = $producto;
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