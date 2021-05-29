<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El gran hermano te vigila  \\


interface IProyectosDao {

    /**
     * Guarda un objeto Proyectos en la base de datos.
     * @param proyectos objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($proyectos);
    /**
     * Modifica un objeto Proyectos en la base de datos.
     * @param proyectos objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($proyectos);
    /**
     * Elimina un objeto Proyectos en la base de datos.
     * @param proyectos objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($proyectos);
    /**
     * Busca un objeto Proyectos en la base de datos.
     * @param proyectos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($proyectos);
    /**
     * Lista todos los objetos Proyectos en la base de datos.
     * @return Array<Proyectos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!