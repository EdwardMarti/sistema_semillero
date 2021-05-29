<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Nuestra empresa cuenta con una división sólo para las frases. Disfrútalas  \\


interface IPersona_has_semilleroDao {

    /**
     * Guarda un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($persona_has_semillero);
    /**
     * Modifica un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($persona_has_semillero);
    /**
     * Elimina un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($persona_has_semillero);
    /**
     * Busca un objeto Persona_has_semillero en la base de datos.
     * @param persona_has_semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($persona_has_semillero);
    /**
     * Lista todos los objetos Persona_has_semillero en la base de datos.
     * @return Array<Persona_has_semillero> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!