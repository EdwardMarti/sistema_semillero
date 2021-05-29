<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase no referenciada  \\


interface IFuente_financiacionDao {

    /**
     * Guarda un objeto Fuente_financiacion en la base de datos.
     * @param fuente_financiacion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($fuente_financiacion);
    /**
     * Modifica un objeto Fuente_financiacion en la base de datos.
     * @param fuente_financiacion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($fuente_financiacion);
    /**
     * Elimina un objeto Fuente_financiacion en la base de datos.
     * @param fuente_financiacion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($fuente_financiacion);
    /**
     * Busca un objeto Fuente_financiacion en la base de datos.
     * @param fuente_financiacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($fuente_financiacion);
    /**
     * Lista todos los objetos Fuente_financiacion en la base de datos.
     * @return Array<Fuente_financiacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!