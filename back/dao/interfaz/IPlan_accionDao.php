<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\


interface IPlan_accionDao {

    /**
     * Guarda un objeto Plan_accion en la base de datos.
     * @param plan_accion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($plan_accion);
    /**
     * Modifica un objeto Plan_accion en la base de datos.
     * @param plan_accion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($plan_accion);
    /**
     * Elimina un objeto Plan_accion en la base de datos.
     * @param plan_accion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($plan_accion);
    /**
     * Busca un objeto Plan_accion en la base de datos.
     * @param plan_accion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($plan_accion);
    /**
     * Lista todos los objetos Plan_accion en la base de datos.
     * @return Array<Plan_accion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!