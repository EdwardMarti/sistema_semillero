<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Ya no la quiero, es cierto, pero tal vez la quiero. Es tan corto el amor, y es tan largo el olvido.  \\


interface IActividadesDao {

    /**
     * Guarda un objeto Actividades en la base de datos.
     * @param actividades objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($actividades);
    /**
     * Modifica un objeto Actividades en la base de datos.
     * @param actividades objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($actividades);
    /**
     * Elimina un objeto Actividades en la base de datos.
     * @param actividades objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($actividades);
    /**
     * Busca un objeto Actividades en la base de datos.
     * @param actividades objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($actividades);
    /**
     * Lista todos los objetos Actividades en la base de datos.
     * @return Array<Actividades> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!