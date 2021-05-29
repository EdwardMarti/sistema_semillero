<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\


interface IDepartamentoDao {

    /**
     * Guarda un objeto Departamento en la base de datos.
     * @param departamento objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($departamento);
    /**
     * Modifica un objeto Departamento en la base de datos.
     * @param departamento objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($departamento);
    /**
     * Elimina un objeto Departamento en la base de datos.
     * @param departamento objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($departamento);
    /**
     * Busca un objeto Departamento en la base de datos.
     * @param departamento objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($departamento);
    /**
     * Lista todos los objetos Departamento en la base de datos.
     * @return Array<Departamento> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!