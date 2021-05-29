<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Recuerda, cuando enciendas la molotov, debes arrojarla  \\


interface IOtras_actividadesDao {

    /**
     * Guarda un objeto Otras_actividades en la base de datos.
     * @param otras_actividades objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($otras_actividades);
    /**
     * Modifica un objeto Otras_actividades en la base de datos.
     * @param otras_actividades objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($otras_actividades);
    /**
     * Elimina un objeto Otras_actividades en la base de datos.
     * @param otras_actividades objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($otras_actividades);
    /**
     * Busca un objeto Otras_actividades en la base de datos.
     * @param otras_actividades objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($otras_actividades);
    /**
     * Lista todos los objetos Otras_actividades en la base de datos.
     * @return Array<Otras_actividades> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!