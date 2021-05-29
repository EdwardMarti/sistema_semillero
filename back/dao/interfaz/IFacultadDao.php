<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un tequila, antes de que empiecen los trancazos  \\


interface IFacultadDao {

    /**
     * Guarda un objeto Facultad en la base de datos.
     * @param facultad objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($facultad);
    /**
     * Modifica un objeto Facultad en la base de datos.
     * @param facultad objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($facultad);
    /**
     * Elimina un objeto Facultad en la base de datos.
     * @param facultad objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($facultad);
    /**
     * Busca un objeto Facultad en la base de datos.
     * @param facultad objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($facultad);
    /**
     * Lista todos los objetos Facultad en la base de datos.
     * @return Array<Facultad> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!