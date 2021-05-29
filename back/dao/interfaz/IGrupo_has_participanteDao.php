<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Era más fácil crear un framework que aprender a usar uno existente  \\


interface IGrupo_has_participanteDao {

    /**
     * Guarda un objeto Grupo_has_participante en la base de datos.
     * @param grupo_has_participante objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($grupo_has_participante);
    /**
     * Modifica un objeto Grupo_has_participante en la base de datos.
     * @param grupo_has_participante objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($grupo_has_participante);
    /**
     * Elimina un objeto Grupo_has_participante en la base de datos.
     * @param grupo_has_participante objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($grupo_has_participante);
    /**
     * Busca un objeto Grupo_has_participante en la base de datos.
     * @param grupo_has_participante objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($grupo_has_participante);
    /**
     * Lista todos los objetos Grupo_has_participante en la base de datos.
     * @return Array<Grupo_has_participante> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!