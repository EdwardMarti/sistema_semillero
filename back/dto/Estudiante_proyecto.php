<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo a tu edad hacía calculadoras en visualBasic  \\


class Estudiante_proyecto {

  private $id;
  private $codigo;
  private $nombre;
  private $proyecto_id;


    /**
     * Constructor de Estudiante
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
     * Devuelve el valor correspondiente a codigo
     * @return codigo
     */
    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getProyecto_id() {
        return $this->proyecto_id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setProyecto_id($proyecto_id) {
        $this->proyecto_id = $proyecto_id;
    }


}
//That`s all folks!