<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Me han encontrado! ¡No sé cómo pero me han encontrado!  \\


class Ponencias {

  private $id;
  private $nombre_po;
  private $fecha;
  private $nombre_eve;
  private $institucion;
  private $ciudad;
  private $lugar;
  private $tipo_ponencias_id;
  private $semillero_id;

    /**
     * Constructor de Ponencias
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
     * Devuelve el valor correspondiente a nombre_po
     * @return nombre_po
     */
  public function getNombre_po(){
      return $this->nombre_po;
  }

    /**
     * Modifica el valor correspondiente a nombre_po
     * @param nombre_po
     */
  public function setNombre_po($nombre_po){
      $this->nombre_po = $nombre_po;
  }
    /**
     * Devuelve el valor correspondiente a fecha
     * @return fecha
     */
  public function getFecha(){
      return $this->fecha;
  }

    /**
     * Modifica el valor correspondiente a fecha
     * @param fecha
     */
  public function setFecha($fecha){
      $this->fecha = $fecha;
  }
    /**
     * Devuelve el valor correspondiente a nombre_eve
     * @return nombre_eve
     */
  public function getNombre_eve(){
      return $this->nombre_eve;
  }

    /**
     * Modifica el valor correspondiente a nombre_eve
     * @param nombre_eve
     */
  public function setNombre_eve($nombre_eve){
      $this->nombre_eve = $nombre_eve;
  }
    /**
     * Devuelve el valor correspondiente a institucion
     * @return institucion
     */
  public function getInstitucion(){
      return $this->institucion;
  }

    /**
     * Modifica el valor correspondiente a institucion
     * @param institucion
     */
  public function setInstitucion($institucion){
      $this->institucion = $institucion;
  }
    /**
     * Devuelve el valor correspondiente a ciudad
     * @return ciudad
     */
  public function getCiudad(){
      return $this->ciudad;
  }

    /**
     * Modifica el valor correspondiente a ciudad
     * @param ciudad
     */
  public function setCiudad($ciudad){
      $this->ciudad = $ciudad;
  }
    /**
     * Devuelve el valor correspondiente a lugar
     * @return lugar
     */
  public function getLugar(){
      return $this->lugar;
  }

    /**
     * Modifica el valor correspondiente a lugar
     * @param lugar
     */
  public function setLugar($lugar){
      $this->lugar = $lugar;
  }
    /**
     * Devuelve el valor correspondiente a tipo_ponencias_id
     * @return tipo_ponencias_id
     */
  public function getTipo_ponencias_id(){
      return $this->tipo_ponencias_id;
  }

    /**
     * Modifica el valor correspondiente a tipo_ponencias_id
     * @param tipo_ponencias_id
     */
  public function setTipo_ponencias_id($tipo_ponencias_id){
      $this->tipo_ponencias_id = $tipo_ponencias_id;
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