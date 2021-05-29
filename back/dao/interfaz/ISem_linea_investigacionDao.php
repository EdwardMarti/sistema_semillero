<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si crees que las mujeres son difíciles, no conoces Anarchy  \\


interface ISem_linea_investigacionDao {

    /**
     * Guarda un objeto Sem_linea_investigacion en la base de datos.
     * @param sem_linea_investigacion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($sem_linea_investigacion);
    /**
     * Modifica un objeto Sem_linea_investigacion en la base de datos.
     * @param sem_linea_investigacion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($sem_linea_investigacion);
    /**
     * Elimina un objeto Sem_linea_investigacion en la base de datos.
     * @param sem_linea_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($sem_linea_investigacion);
    /**
     * Busca un objeto Sem_linea_investigacion en la base de datos.
     * @param sem_linea_investigacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($sem_linea_investigacion);
    /**
     * Lista todos los objetos Sem_linea_investigacion en la base de datos.
     * @return Array<Sem_linea_investigacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!