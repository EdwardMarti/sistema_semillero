<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\


class Publicaciones {

  private $id;
  private $autor;
  private $titulo;
  private $nombre_medio;
  private $issn;
  private $editorial;
  private $volumen;
  private $cant_pag;
  private $fecha;
  private $ciudad;
  private $tipo_publicaciones_id;
  private $semillero_id;

    /**
     * Constructor de Publicaciones
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
     * Devuelve el valor correspondiente a autor
     * @return autor
     */
  public function getAutor(){
      return $this->autor;
  }

    /**
     * Modifica el valor correspondiente a autor
     * @param autor
     */
  public function setAutor($autor){
      $this->autor = $autor;
  }
    /**
     * Devuelve el valor correspondiente a titulo
     * @return titulo
     */
  public function getTitulo(){
      return $this->titulo;
  }

    /**
     * Modifica el valor correspondiente a titulo
     * @param titulo
     */
  public function setTitulo($titulo){
      $this->titulo = $titulo;
  }
    /**
     * Devuelve el valor correspondiente a nombre_medio
     * @return nombre_medio
     */
  public function getNombre_medio(){
      return $this->nombre_medio;
  }

    /**
     * Modifica el valor correspondiente a nombre_medio
     * @param nombre_medio
     */
  public function setNombre_medio($nombre_medio){
      $this->nombre_medio = $nombre_medio;
  }
    /**
     * Devuelve el valor correspondiente a issn
     * @return issn
     */
  public function getIssn(){
      return $this->issn;
  }

    /**
     * Modifica el valor correspondiente a issn
     * @param issn
     */
  public function setIssn($issn){
      $this->issn = $issn;
  }
    /**
     * Devuelve el valor correspondiente a editorial
     * @return editorial
     */
  public function getEditorial(){
      return $this->editorial;
  }

    /**
     * Modifica el valor correspondiente a editorial
     * @param editorial
     */
  public function setEditorial($editorial){
      $this->editorial = $editorial;
  }
    /**
     * Devuelve el valor correspondiente a volumen
     * @return volumen
     */
  public function getVolumen(){
      return $this->volumen;
  }

    /**
     * Modifica el valor correspondiente a volumen
     * @param volumen
     */
  public function setVolumen($volumen){
      $this->volumen = $volumen;
  }
    /**
     * Devuelve el valor correspondiente a cant_pag
     * @return cant_pag
     */
  public function getCant_pag(){
      return $this->cant_pag;
  }

    /**
     * Modifica el valor correspondiente a cant_pag
     * @param cant_pag
     */
  public function setCant_pag($cant_pag){
      $this->cant_pag = $cant_pag;
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
     * Devuelve el valor correspondiente a tipo_publicaciones_id
     * @return tipo_publicaciones_id
     */
  public function getTipo_publicaciones_id(){
      return $this->tipo_publicaciones_id;
  }

    /**
     * Modifica el valor correspondiente a tipo_publicaciones_id
     * @param tipo_publicaciones_id
     */
  public function setTipo_publicaciones_id($tipo_publicaciones_id){
      $this->tipo_publicaciones_id = $tipo_publicaciones_id;
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