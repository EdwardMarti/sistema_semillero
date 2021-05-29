<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\


interface ISemilleroDao {

    /**
     * Guarda un objeto Semillero en la base de datos.
     * @param semillero objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($semillero);
    /**
     * Modifica un objeto Semillero en la base de datos.
     * @param semillero objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($semillero);
    /**
     * Elimina un objeto Semillero en la base de datos.
     * @param semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($semillero);
    /**
     * Busca un objeto Semillero en la base de datos.
     * @param semillero objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($semillero);
    /**
     * Lista todos los objetos Semillero en la base de datos.
     * @return Array<Semillero> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!