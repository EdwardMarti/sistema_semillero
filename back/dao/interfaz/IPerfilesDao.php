<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\


interface IPerfilesDao {

    /**
     * Guarda un objeto Perfiles en la base de datos.
     * @param perfiles objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($perfiles);
    /**
     * Modifica un objeto Perfiles en la base de datos.
     * @param perfiles objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($perfiles);
    /**
     * Elimina un objeto Perfiles en la base de datos.
     * @param perfiles objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($perfiles);
    /**
     * Busca un objeto Perfiles en la base de datos.
     * @param perfiles objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($perfiles);
    /**
     * Lista todos los objetos Perfiles en la base de datos.
     * @return Array<Perfiles> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!