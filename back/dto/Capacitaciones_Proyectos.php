<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Hecho en sólo 6 días  \\


class Capacitaciones_Proyectos {

  private $id;
  private $tema;
  private $docente;
  private $fecha;
  private $cant_capacitados;
  private $proyecto_id;
  private $objetivo;
  private $responsable;

    /**
     * Constructor de Capacitaciones
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
     * Devuelve el valor correspondiente a tema
     * @return tema
     */
  public function getTema(){
      return $this->tema;
  }

    /**
     * Modifica el valor correspondiente a tema
     * @param tema
     */
  public function setTema($tema){
      $this->tema = $tema;
  }
    /**
     * Devuelve el valor correspondiente a docente
     * @return docente
     */
  public function getDocente(){
      return $this->docente;
  }

    /**
     * Modifica el valor correspondiente a docente
     * @param docente
     */
  public function setDocente($docente){
      $this->docente = $docente;
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
     * Devuelve el valor correspondiente a cant_capacitados
     * @return cant_capacitados
     */
  public function getCant_capacitados(){
      return $this->cant_capacitados;
  }

    /**
     * Modifica el valor correspondiente a cant_capacitados
     * @param cant_capacitados
     */
  public function setCant_capacitados($cant_capacitados){
      $this->cant_capacitados = $cant_capacitados;
  }
    

    /**
     * Devuelve el valor correspondiente a objetivo
     * @return objetivo
     */
  public function getObjetivo(){
      return $this->objetivo;
  }

    /**
     * Modifica el valor correspondiente a objetivo
     * @param objetivo
     */
  public function setObjetivo($objetivo){
      $this->objetivo = $objetivo;
  }
  function getProyecto_id() {
      return $this->proyecto_id;
  }

  function getResponsable() {
      return $this->responsable;
  }

  function setProyecto_id($proyecto_id) {
      $this->proyecto_id = $proyecto_id;
  }

  function setResponsable($responsable) {
      $this->responsable = $responsable;
  }


  

}
//That`s all folks!