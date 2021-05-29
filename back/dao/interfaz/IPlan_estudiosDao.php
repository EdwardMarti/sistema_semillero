<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\


interface IPlan_estudiosDao {

    /**
     * Guarda un objeto Plan_estudios en la base de datos.
     * @param plan_estudios objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($plan_estudios);
    /**
     * Modifica un objeto Plan_estudios en la base de datos.
     * @param plan_estudios objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($plan_estudios);
    /**
     * Elimina un objeto Plan_estudios en la base de datos.
     * @param plan_estudios objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($plan_estudios);
    /**
     * Busca un objeto Plan_estudios en la base de datos.
     * @param plan_estudios objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($plan_estudios);
    /**
     * Lista todos los objetos Plan_estudios en la base de datos.
     * @return Array<Plan_estudios> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!