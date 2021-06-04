<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Me pagan USD 10,000 por cada frase que invento. 20,000 por las más tontas  \\


interface IDisciplinaDao {

    /**
     * Guarda un objeto Disciplina en la base de datos.
     * @param disciplina objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($disciplina);
    /**
     * Modifica un objeto Disciplina en la base de datos.
     * @param disciplina objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($disciplina);
    /**
     * Elimina un objeto Disciplina en la base de datos.
     * @param disciplina objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($disciplina);
    /**
     * Busca un objeto Disciplina en la base de datos.
     * @param disciplina objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($disciplina);
    /**
     * Lista todos los objetos Disciplina en la base de datos.
     * @return Array<Disciplina> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!