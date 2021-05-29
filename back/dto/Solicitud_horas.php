<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\


class Solicitud_horas {

  private $id;
  private $anio;
  private $semestre;
  private $horas_catedra;
  private $horas_planta;
  private $horas_solicitadas;

    /**
     * Constructor de Solicitud_horas
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
     * Devuelve el valor correspondiente a anio
     * @return anio
     */
  public function getAnio(){
      return $this->anio;
  }

    /**
     * Modifica el valor correspondiente a anio
     * @param anio
     */
  public function setAnio($anio){
      $this->anio = $anio;
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
     * Devuelve el valor correspondiente a horas_catedra
     * @return horas_catedra
     */
  public function getHoras_catedra(){
      return $this->horas_catedra;
  }

    /**
     * Modifica el valor correspondiente a horas_catedra
     * @param horas_catedra
     */
  public function setHoras_catedra($horas_catedra){
      $this->horas_catedra = $horas_catedra;
  }
    /**
     * Devuelve el valor correspondiente a horas_planta
     * @return horas_planta
     */
  public function getHoras_planta(){
      return $this->horas_planta;
  }

    /**
     * Modifica el valor correspondiente a horas_planta
     * @param horas_planta
     */
  public function setHoras_planta($horas_planta){
      $this->horas_planta = $horas_planta;
  }
    /**
     * Devuelve el valor correspondiente a horas_solicitadas
     * @return horas_solicitadas
     */
  public function getHoras_solicitadas(){
      return $this->horas_solicitadas;
  }

    /**
     * Modifica el valor correspondiente a horas_solicitadas
     * @param horas_solicitadas
     */
  public function setHoras_solicitadas($horas_solicitadas){
      $this->horas_solicitadas = $horas_solicitadas;
  }


}
//That`s all folks!