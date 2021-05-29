<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Dispongo de doce horas de adelanto, puedo de decárselas a ella  \\


interface IPerfiles_has_modulosDao {

    /**
     * Guarda un objeto Perfiles_has_modulos en la base de datos.
     * @param perfiles_has_modulos objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($perfiles_has_modulos);
    /**
     * Modifica un objeto Perfiles_has_modulos en la base de datos.
     * @param perfiles_has_modulos objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($perfiles_has_modulos);
    /**
     * Elimina un objeto Perfiles_has_modulos en la base de datos.
     * @param perfiles_has_modulos objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($perfiles_has_modulos);
    /**
     * Busca un objeto Perfiles_has_modulos en la base de datos.
     * @param perfiles_has_modulos objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($perfiles_has_modulos);
    /**
     * Lista todos los objetos Perfiles_has_modulos en la base de datos.
     * @return Array<Perfiles_has_modulos> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!