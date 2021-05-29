<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\


interface IUsuariosDao {

    /**
     * Guarda un objeto Usuarios en la base de datos.
     * @param usuarios objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($usuarios);
    /**
     * Modifica un objeto Usuarios en la base de datos.
     * @param usuarios objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($usuarios);
    /**
     * Elimina un objeto Usuarios en la base de datos.
     * @param usuarios objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($usuarios);
    /**
     * Busca un objeto Usuarios en la base de datos.
     * @param usuarios objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($usuarios);
    /**
     * Lista todos los objetos Usuarios en la base de datos.
     * @return Array<Usuarios> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!