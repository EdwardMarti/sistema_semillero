<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\


interface ITipo_docuemntoDao {

    /**
     * Guarda un objeto Tipo_docuemnto en la base de datos.
     * @param tipo_docuemnto objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($tipo_docuemnto);
    /**
     * Modifica un objeto Tipo_docuemnto en la base de datos.
     * @param tipo_docuemnto objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($tipo_docuemnto);
    /**
     * Elimina un objeto Tipo_docuemnto en la base de datos.
     * @param tipo_docuemnto objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($tipo_docuemnto);
    /**
     * Busca un objeto Tipo_docuemnto en la base de datos.
     * @param tipo_docuemnto objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($tipo_docuemnto);
    /**
     * Lista todos los objetos Tipo_docuemnto en la base de datos.
     * @return Array<Tipo_docuemnto> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!