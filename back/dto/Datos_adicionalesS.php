<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya están los patrones implementados, ahora sí viene lo chido...  \\


class Datos_adicionalesS {

  private $id;
  private $producto;
  private $descripcion;
  private $fecha;
  private $calificacion;
  private $id_plan;
  private $id_semillero;


    /**
     * Constructor de Grupo_investigacion
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a id
     * @return id
     */
    function getId() {
        return $this->id;
    }

    function getProducto() {
        return $this->producto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getCalificacion() {
        return $this->calificacion;
    }

    function getId_plan() {
        return $this->id_plan;
    }

    function getId_semillero() {
        return $this->id_semillero;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProducto($producto) {
        $this->producto = $producto;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setCalificacion($calificacion) {
        $this->calificacion = $calificacion;
    }

    function setId_plan($id_plan) {
        $this->id_plan = $id_plan;
    }

    function setId_semillero($id_semillero) {
        $this->id_semillero = $id_semillero;
    }


}
//That`s all folks!