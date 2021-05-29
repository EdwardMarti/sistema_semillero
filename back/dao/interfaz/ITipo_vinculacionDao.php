<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo.   \\


interface ITipo_vinculacionDao {

    /**
     * Guarda un objeto Tipo_vinculacion en la base de datos.
     * @param tipo_vinculacion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_vinculacion);
    /**
     * Modifica un objeto Tipo_vinculacion en la base de datos.
     * @param tipo_vinculacion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_vinculacion);
    /**
     * Elimina un objeto Tipo_vinculacion en la base de datos.
     * @param tipo_vinculacion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_vinculacion);
    /**
     * Busca un objeto Tipo_vinculacion en la base de datos.
     * @param tipo_vinculacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_vinculacion);
    /**
     * Lista todos los objetos Tipo_vinculacion en la base de datos.
     * @return Array<Tipo_vinculacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!