<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Podrías agradecernos con unos cuantos billetes _/(n.n)\_  \\


interface IEstudianteDao {

    /**
     * Guarda un objeto Estudiante en la base de datos.
     * @param estudiante objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($estudiante);
    /**
     * Modifica un objeto Estudiante en la base de datos.
     * @param estudiante objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($estudiante);
    /**
     * Elimina un objeto Estudiante en la base de datos.
     * @param estudiante objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($estudiante);
    /**
     * Busca un objeto Estudiante en la base de datos.
     * @param estudiante objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($estudiante);
    /**
     * Lista todos los objetos Estudiante en la base de datos.
     * @return Array<Estudiante> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!