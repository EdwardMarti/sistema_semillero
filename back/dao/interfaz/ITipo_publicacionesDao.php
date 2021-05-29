<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No hay de qué so no más de papa  \\


interface ITipo_publicacionesDao {

    /**
     * Guarda un objeto Tipo_publicaciones en la base de datos.
     * @param tipo_publicaciones objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_publicaciones);
    /**
     * Modifica un objeto Tipo_publicaciones en la base de datos.
     * @param tipo_publicaciones objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_publicaciones);
    /**
     * Elimina un objeto Tipo_publicaciones en la base de datos.
     * @param tipo_publicaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_publicaciones);
    /**
     * Busca un objeto Tipo_publicaciones en la base de datos.
     * @param tipo_publicaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_publicaciones);
    /**
     * Lista todos los objetos Tipo_publicaciones en la base de datos.
     * @return Array<Tipo_publicaciones> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!