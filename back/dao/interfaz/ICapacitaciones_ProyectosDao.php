<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\


interface ICapacitaciones_ProyectosDao {

    /**
     * Guarda un objeto CapacitacionesProyectos en la base de datos.
     * @param capacitacionesProyectos objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($capacitacionesProyectos);
    /**
     * Modifica un objeto CapacitacionesProyectos en la base de datos.
     * @param capacitacionesProyectos objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($capacitacionesProyectos);
    /**
     * Elimina un objeto CapacitacionesProyectos en la base de datos.
     * @param capacitacionesProyectos objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($capacitacionesProyectos);
    /**
     * Busca un objeto CapacitacionesProyectos en la base de datos.
     * @param capacitacionesProyectos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($capacitacionesProyectos);
    /**
     * Lista todos los objetos CapacitacionesProyectos en la base de datos.
     * @return Array<CapacitacionesProyectos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!