<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Todo lo que alguna vez amaste te rechazará o morirá.  \\


interface IGrupo_solicitud_horasDao {

    /**
     * Guarda un objeto Grupo_solicitud_horas en la base de datos.
     * @param grupo_solicitud_horas objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($grupo_solicitud_horas);
    /**
     * Modifica un objeto Grupo_solicitud_horas en la base de datos.
     * @param grupo_solicitud_horas objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($grupo_solicitud_horas);
    /**
     * Elimina un objeto Grupo_solicitud_horas en la base de datos.
     * @param grupo_solicitud_horas objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($grupo_solicitud_horas);
    /**
     * Busca un objeto Grupo_solicitud_horas en la base de datos.
     * @param grupo_solicitud_horas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($grupo_solicitud_horas);
    /**
     * Lista todos los objetos Grupo_solicitud_horas en la base de datos.
     * @return Array<Grupo_solicitud_horas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!