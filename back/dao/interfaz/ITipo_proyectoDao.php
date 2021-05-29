<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Oh! (°o° ) ¡es Fredy Arciniegas, el intelectualoide millonario!  \\


interface ITipo_proyectoDao {

    /**
     * Guarda un objeto Tipo_proyecto en la base de datos.
     * @param tipo_proyecto objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_proyecto);
    /**
     * Modifica un objeto Tipo_proyecto en la base de datos.
     * @param tipo_proyecto objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_proyecto);
    /**
     * Elimina un objeto Tipo_proyecto en la base de datos.
     * @param tipo_proyecto objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_proyecto);
    /**
     * Busca un objeto Tipo_proyecto en la base de datos.
     * @param tipo_proyecto objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_proyecto);
    /**
     * Lista todos los objetos Tipo_proyecto en la base de datos.
     * @return Array<Tipo_proyecto> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!