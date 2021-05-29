<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\


interface ILinea_investigacionDao {

    /**
     * Guarda un objeto Linea_investigacion en la base de datos.
     * @param linea_investigacion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($linea_investigacion);
    /**
     * Modifica un objeto Linea_investigacion en la base de datos.
     * @param linea_investigacion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($linea_investigacion);
    /**
     * Elimina un objeto Linea_investigacion en la base de datos.
     * @param linea_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($linea_investigacion);
    /**
     * Busca un objeto Linea_investigacion en la base de datos.
     * @param linea_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($linea_investigacion);
    /**
     * Lista todos los objetos Linea_investigacion en la base de datos.
     * @return Array<Linea_investigacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!