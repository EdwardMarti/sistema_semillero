<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\


interface IDatos_adicionalesSDao {

    /**
     * Guarda un objeto Grupo_investigacion en la base de datos.
     * @param grupo_investigacion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($datos_adicionalesS);
    /**
     * Modifica un objeto Grupo_investigacion en la base de datos.
     * @param grupo_investigacion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($datos_adicionalesS);
    /**
     * Elimina un objeto Grupo_investigacion en la base de datos.
     * @param grupo_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($datos_adicionalesS);
    /**
     * Busca un objeto Grupo_investigacion en la base de datos.
     * @param grupo_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($datos_adicionalesS);
    /**
     * Lista todos los objetos Grupo_investigacion en la base de datos.
     * @return Array<Grupo_investigacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!