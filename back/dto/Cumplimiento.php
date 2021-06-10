<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No es una cola ni es una pila, es tu proyecto que no compila  \\


class Cumplimiento {

  private $id;
  private $dirigido_id;
  private $descripcion;
  private $porcentaje;
  private $semestre;
  private $ano;
  private $productos;
  private $acepta_uno;
  private $acepta_dos;

    /**
     * Constructor de Usuarios
    */
     public function __construct(){}
     
function getId() {
    return $this->id;
}

function getDirigido_id() {
    return $this->dirigido_id;
}

function getDescripcion() {
    return $this->descripcion;
}

function getPorcentaje() {
    return $this->porcentaje;
}

function getSemestre() {
    return $this->semestre;
}

function getAno() {
    return $this->ano;
}

function getProductos() {
    return $this->productos;
}

function getAcepta_uno() {
    return $this->acepta_uno;
}

function getAcepta_dos() {
    return $this->acepta_dos;
}

function setId($id) {
    $this->id = $id;
}

function setDirigido_id($dirigido_id) {
    $this->dirigido_id = $dirigido_id;
}

function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}

function setPorcentaje($porcentaje) {
    $this->porcentaje = $porcentaje;
}

function setSemestre($semestre) {
    $this->semestre = $semestre;
}

function setAno($ano) {
    $this->ano = $ano;
}

function setProductos($productos) {
    $this->productos = $productos;
}

function setAcepta_uno($acepta_uno) {
    $this->acepta_uno = $acepta_uno;
}

function setAcepta_dos($acepta_dos) {
    $this->acepta_dos = $acepta_dos;
}


}