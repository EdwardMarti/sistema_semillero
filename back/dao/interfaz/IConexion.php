<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Santos frameworks Batman!  \\

interface IConexion {

    /**     
     * Crea una conexiÃ³n si no se ha establecido antes; en caso contrario, devuelve la ya existente
     * @param dbName Nombre de la base de datos que se desea conectar.
     * @return ConexiÃ³n a base de datos dependiente del gestor en uso
     */
     public function obtener($dbName);
     /**
     * Cierra la conexiÃ³n a la base de datos
     */
     public function cerrar();

}
//That`s all folks!