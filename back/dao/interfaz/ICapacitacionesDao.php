<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\


interface ICapacitacionesDao {

    /**
     * Guarda un objeto Capacitaciones en la base de datos.
     * @param capacitaciones objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($capacitaciones);
    /**
     * Modifica un objeto Capacitaciones en la base de datos.
     * @param capacitaciones objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($capacitaciones);
    /**
     * Elimina un objeto Capacitaciones en la base de datos.
     * @param capacitaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($capacitaciones);
    /**
     * Busca un objeto Capacitaciones en la base de datos.
     * @param capacitaciones objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($capacitaciones);
    /**
     * Lista todos los objetos Capacitaciones en la base de datos.
     * @return Array<Capacitaciones> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!