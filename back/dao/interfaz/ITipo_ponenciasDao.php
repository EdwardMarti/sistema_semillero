<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tu alma nos pertenece... Salve Mr. Arciniegas  \\


interface ITipo_ponenciasDao {

    /**
     * Guarda un objeto Tipo_ponencias en la base de datos.
     * @param tipo_ponencias objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_ponencias);
    /**
     * Modifica un objeto Tipo_ponencias en la base de datos.
     * @param tipo_ponencias objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_ponencias);
    /**
     * Elimina un objeto Tipo_ponencias en la base de datos.
     * @param tipo_ponencias objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_ponencias);
    /**
     * Busca un objeto Tipo_ponencias en la base de datos.
     * @param tipo_ponencias objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_ponencias);
    /**
     * Lista todos los objetos Tipo_ponencias en la base de datos.
     * @return Array<Tipo_ponencias> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!