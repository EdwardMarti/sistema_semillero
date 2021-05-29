<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\


class Grupo_investigacion {

  private $id;
  private $nombre;
  private $sigla;
  private $unidad_academica;
  private $fecha_creacion;
  private $fecha_gruplac;
  private $codigo_gruplac;
  private $clas_colciencias;
  private $cate_colciencias;

    /**
     * Constructor de Grupo_investigacion
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
     * Devuelve el valor correspondiente a fecha_gruplac
     * @return fecha_gruplac
     */
  public function getFecha_gruplac(){
      return $this->fecha_gruplac;
  }

    /**
     * Modifica el valor correspondiente a fecha_gruplac
     * @param fecha_gruplac
     */
  public function setFecha_gruplac($fecha_gruplac){
      $this->fecha_gruplac = $fecha_gruplac;
  }
    /**
     * Devuelve el valor correspondiente a codigo_gruplac
     * @return codigo_gruplac
     */
  public function getCodigo_gruplac(){
      return $this->codigo_gruplac;
  }

    /**
     * Modifica el valor correspondiente a codigo_gruplac
     * @param codigo_gruplac
     */
  public function setCodigo_gruplac($codigo_gruplac){
      $this->codigo_gruplac = $codigo_gruplac;
  }
    /**
     * Devuelve el valor correspondiente a clas_colciencias
     * @return clas_colciencias
     */
  public function getClas_colciencias(){
      return $this->clas_colciencias;
  }

    /**
     * Modifica el valor correspondiente a clas_colciencias
     * @param clas_colciencias
     */
  public function setClas_colciencias($clas_colciencias){
      $this->clas_colciencias = $clas_colciencias;
  }
    /**
     * Devuelve el valor correspondiente a cate_colciencias
     * @return cate_colciencias
     */
  public function getCate_colciencias(){
      return $this->cate_colciencias;
  }

    /**
     * Modifica el valor correspondiente a cate_colciencias
     * @param cate_colciencias
     */
  public function setCate_colciencias($cate_colciencias){
      $this->cate_colciencias = $cate_colciencias;
  }


}
//That`s all folks!