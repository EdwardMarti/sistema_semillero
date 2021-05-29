<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Eres capaz de hackear mi Facebook?  \\


class Fuente_financiacion {

  private $id;
  private $fuente;
  private $valor;
  private $proyectos_terminados_id;

    /**
     * Constructor de Fuente_financiacion
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
     * Devuelve el valor correspondiente a fuente
     * @return fuente
     */
  public function getFuente(){
      return $this->fuente;
  }

    /**
     * Modifica el valor correspondiente a fuente
     * @param fuente
     */
  public function setFuente($fuente){
      $this->fuente = $fuente;
  }
    /**
     * Devuelve el valor correspondiente a valor
     * @return valor
     */
  public function getValor(){
      return $this->valor;
  }

    /**
     * Modifica el valor correspondiente a valor
     * @param valor
     */
  public function setValor($valor){
      $this->valor = $valor;
  }
    /**
     * Devuelve el valor correspondiente a proyectos_terminados_id
     * @return proyectos_terminados_id
     */
  public function getProyectos_terminados_id(){
      return $this->proyectos_terminados_id;
  }

    /**
     * Modifica el valor correspondiente a proyectos_terminados_id
     * @param proyectos_terminados_id
     */
  public function setProyectos_terminados_id($proyectos_terminados_id){
      $this->proyectos_terminados_id = $proyectos_terminados_id;
  }


}
//That`s all folks!