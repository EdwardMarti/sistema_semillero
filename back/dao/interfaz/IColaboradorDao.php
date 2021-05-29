<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\


interface IColaboradorDao {

    /**
     * Guarda un objeto Colaborador en la base de datos.
     * @param colaborador objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($colaborador);
    /**
     * Modifica un objeto Colaborador en la base de datos.
     * @param colaborador objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($colaborador);
    /**
     * Elimina un objeto Colaborador en la base de datos.
     * @param colaborador objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($colaborador);
    /**
     * Busca un objeto Colaborador en la base de datos.
     * @param colaborador objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($colaborador);
    /**
     * Lista todos los objetos Colaborador en la base de datos.
     * @return Array<Colaborador> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!