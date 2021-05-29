<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Bastará decir que soy Juan Pablo Castel, el pintor que mató a María Iribarne...  \\


interface IPublicacionesDao {

    /**
     * Guarda un objeto Publicaciones en la base de datos.
     * @param publicaciones objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($publicaciones);
    /**
     * Modifica un objeto Publicaciones en la base de datos.
     * @param publicaciones objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($publicaciones);
    /**
     * Elimina un objeto Publicaciones en la base de datos.
     * @param publicaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($publicaciones);
    /**
     * Busca un objeto Publicaciones en la base de datos.
     * @param publicaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($publicaciones);
    /**
     * Lista todos los objetos Publicaciones en la base de datos.
     * @return Array<Publicaciones> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!