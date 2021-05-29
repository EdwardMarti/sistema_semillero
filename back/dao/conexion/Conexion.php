<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo tengo un sueño. El sueño de que mis hijos vivan en un mundo con un único lenguaje de programación.  \\
include_once realpath('../dao/interfaz/IConexion.php');

class Conexion implements IConexion{
   private $cnx;
   private $gestor;

     function __construct($gestor) {
           $this->cnx = null ;
           switch ($gestor) {
             case "FactoryDao::MYSQL_FACTORY":
               $this->gestor="mysql";
               break;
             case "FactoryDao::POSTGRESQL_FACTORY":
               $this->gestor="pgsql";
               break;
             case "FactoryDao::ORACLE_FACTORY":
               $this->gestor="oci";
               break;
             case "FactoryDao::DERBY_FACTORY":
               $this->gestor="odbc";
               break;
             default:
               $this->gestor="NULL_GESTOR";
               break;
           }           
    }
    /**     
     * Crea una conexiÃ³n si no se ha establecido antes; en caso contrario, devuelve la ya existente
     * Toma los parÃ¡metros de conexiÃ³n de la clase Properties y usa el driver mysql.jdbc para establecer una conexiÃ³n. 
     * @return ConexiÃ³n a base de datos mySql
     * @param dbName Nombre de la base de datos que se desea conectar
     */
   public function obtener($dbName){
      if ($this->cnx == null) {
         try {
             $ini_array = parse_ini_file(realpath('../dao/properties/Properties.ini'),true);
             $host = $ini_array[$dbName]['host'];
             $username = $ini_array[$dbName]['username'];
             $password = $ini_array[$dbName]['password'];
             $this->cnx = new PDO($this->gestor.":host=$host;dbname=$dbName;charset=utf8",$username,$password);
         }catch(Exception $e){
            die('Error : '.$e->getMessage());
        }
      }
      return $this->cnx;
   }

     /**
     * Cierra la conexiÃ³n a la base de datos
     * @throws SQLException
     */
   public function cerrar(){
      if ($this->cnx != null) {
         $this->cnx=null;
      }
   }

}
//That`s all folks!