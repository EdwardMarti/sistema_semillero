<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ojos de perro azul  \\


class Colaborador {

  private $id;
  private $nombre;
  private $codigo;
  private $tp_colaborador;
  private $proyectos_id;

    /**
     * Constructor de Colaborador
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
     * Devuelve el valor correspondiente a codigo
     * @return codigo
     */
  public function getCodigo(){
      return $this->codigo;
  }

    /**
     * Modifica el valor correspondiente a codigo
     * @param codigo
     */
  public function setCodigo($codigo){
      $this->codigo = $codigo;
  }
    /**
     * Devuelve el valor correspondiente a tp_colaborador
     * @return tp_colaborador
     */
  public function getTp_colaborador(){
      return $this->tp_colaborador;
  }

    /**
     * Modifica el valor correspondiente a tp_colaborador
     * @param tp_colaborador
     */
  public function setTp_colaborador($tp_colaborador){
      $this->tp_colaborador = $tp_colaborador;
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