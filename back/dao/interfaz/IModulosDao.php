<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La vie est composé de combien de fois nous rions avant de mourir  \\


interface IModulosDao {

    /**
     * Guarda un objeto Modulos en la base de datos.
     * @param modulos objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($modulos);
    /**
     * Modifica un objeto Modulos en la base de datos.
     * @param modulos objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($modulos);
    /**
     * Elimina un objeto Modulos en la base de datos.
     * @param modulos objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($modulos);
    /**
     * Busca un objeto Modulos en la base de datos.
     * @param modulos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($modulos);
    /**
     * Lista todos los objetos Modulos en la base de datos.
     * @return Array<Modulos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!