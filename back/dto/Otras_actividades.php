<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\


class Otras_actividades {

  private $id;
  private $nombre_proyecto;
  private $nombre_actividad;
  private $modalidad_participacion;
  private $responsable;
  private $fecha_realizacion;
  private $producto;
  private $semillero_id;

    /**
     * Constructor de Otras_actividades
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
     * Devuelve el valor correspondiente a nombre_proyecto
     * @return nombre_proyecto
     */
  public function getNombre_proyecto(){
      return $this->nombre_proyecto;
  }

    /**
     * Modifica el valor correspondiente a nombre_proyecto
     * @param nombre_proyecto
     */
  public function setNombre_proyecto($nombre_proyecto){
      $this->nombre_proyecto = $nombre_proyecto;
  }
    /**
     * Devuelve el valor correspondiente a nombre_actividad
     * @return nombre_actividad
     */
  public function getNombre_actividad(){
      return $this->nombre_actividad;
  }

    /**
     * Modifica el valor correspondiente a nombre_actividad
     * @param nombre_actividad
     */
  public function setNombre_actividad($nombre_actividad){
      $this->nombre_actividad = $nombre_actividad;
  }
    /**
     * Devuelve el valor correspondiente a modalidad_participacion
     * @return modalidad_participacion
     */
  public function getModalidad_participacion(){
      return $this->modalidad_participacion;
  }

    /**
     * Modifica el valor correspondiente a modalidad_participacion
     * @param modalidad_participacion
     */
  public function setModalidad_participacion($modalidad_participacion){
      $this->modalidad_participacion = $modalidad_participacion;
  }
    /**
     * Devuelve el valor correspondiente a responsable
     * @return responsable
     */
  public function getResponsable(){
      return $this->responsable;
  }

    /**
     * Modifica el valor correspondiente a responsable
     * @param responsable
     */
  public function setResponsable($responsable){
      $this->responsable = $responsable;
  }
    /**
     * Devuelve el valor correspondiente a fecha_realizacion
     * @return fecha_realizacion
     */
  public function getFecha_realizacion(){
      return $this->fecha_realizacion;
  }

    /**
     * Modifica el valor correspondiente a fecha_realizacion
     * @param fecha_realizacion
     */
  public function setFecha_realizacion($fecha_realizacion){
      $this->fecha_realizacion = $fecha_realizacion;
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