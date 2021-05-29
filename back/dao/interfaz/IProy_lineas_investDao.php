<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\


interface IProy_lineas_investDao {

    /**
     * Guarda un objeto Proy_lineas_invest en la base de datos.
     * @param proy_lineas_invest objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($proy_lineas_invest);
    /**
     * Modifica un objeto Proy_lineas_invest en la base de datos.
     * @param proy_lineas_invest objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($proy_lineas_invest);
    /**
     * Elimina un objeto Proy_lineas_invest en la base de datos.
     * @param proy_lineas_invest objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($proy_lineas_invest);
    /**
     * Busca un objeto Proy_lineas_invest en la base de datos.
     * @param proy_lineas_invest objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($proy_lineas_invest);
    /**
     * Lista todos los objetos Proy_lineas_invest en la base de datos.
     * @return Array<Proy_lineas_invest> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!