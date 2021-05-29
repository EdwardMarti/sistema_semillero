<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\


interface IPares_academicosDao {

    /**
     * Guarda un objeto Pares_academicos en la base de datos.
     * @param pares_academicos objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($pares_academicos);
    /**
     * Modifica un objeto Pares_academicos en la base de datos.
     * @param pares_academicos objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($pares_academicos);
    /**
     * Elimina un objeto Pares_academicos en la base de datos.
     * @param pares_academicos objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($pares_academicos);
    /**
     * Busca un objeto Pares_academicos en la base de datos.
     * @param pares_academicos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($pares_academicos);
    /**
     * Lista todos los objetos Pares_academicos en la base de datos.
     * @return Array<Pares_academicos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!