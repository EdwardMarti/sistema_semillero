<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mi satisfacción es hacerte un poco más vago  \\


interface IPonenciasDao {

    /**
     * Guarda un objeto Ponencias en la base de datos.
     * @param ponencias objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($ponencias);
    /**
     * Modifica un objeto Ponencias en la base de datos.
     * @param ponencias objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($ponencias);
    /**
     * Elimina un objeto Ponencias en la base de datos.
     * @param ponencias objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($ponencias);
    /**
     * Busca un objeto Ponencias en la base de datos.
     * @param ponencias objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($ponencias);
    /**
     * Lista todos los objetos Ponencias en la base de datos.
     * @return Array<Ponencias> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!