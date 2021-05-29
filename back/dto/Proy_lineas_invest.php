<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\


class Proy_lineas_invest {

  private $id;
  private $proyectos_id;
  private $linea_investigacion_id;

    /**
     * Constructor de Proy_lineas_invest
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
     * Devuelve el valor correspondiente a linea_investigacion_id
     * @return linea_investigacion_id
     */
  public function getLinea_investigacion_id(){
      return $this->linea_investigacion_id;
  }

    /**
     * Modifica el valor correspondiente a linea_investigacion_id
     * @param linea_investigacion_id
     */
  public function setLinea_investigacion_id($linea_investigacion_id){
      $this->linea_investigacion_id = $linea_investigacion_id;
  }


}
//That`s all folks!