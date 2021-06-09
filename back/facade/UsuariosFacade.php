<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Usuarios.php');
require_once realpath('../dao/interfaz/IUsuariosDao.php');
require_once realpath('../dto/Persona.php');

class UsuariosFacade
{

    /**
     * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
     * @return idGestor Devuelve el identificador del gestor de conexión
     */
    private static function getGestorDefault()
    {
        return DEFAULT_GESTOR;
    }
    /**
     * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
     * @return dbName Devuelve el nombre de la base de datos a emplear
     */
    private static function getDataBaseDefault()
    {
        return DEFAULT_DBNAME;
    }
    /**
     * Crea un objeto Usuarios a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param persona_id
     * @param password
     */
    public static function insert($id,  $persona_id,  $password)
    {
        $usuarios = new Usuarios();
        $usuarios->setId($id);
        $usuarios->setPersona_id($persona_id);
        $usuarios->setPassword($password);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $usuariosDao = $FactoryDao->getusuariosDao(self::getDataBaseDefault());
        $rtn = $usuariosDao->insert($usuarios);
        $usuariosDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Usuarios de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id)
    {
        $usuarios = new Usuarios();
        $usuarios->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $usuariosDao = $FactoryDao->getusuariosDao(self::getDataBaseDefault());
        $result = $usuariosDao->select($usuarios);
        $usuariosDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Usuarios  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param persona_id
     * @param password
     */
    public static function update($id, $persona_id, $password)
    {
        $usuarios = self::select($id);
        $usuarios->setPersona_id($persona_id);
        $usuarios->setPassword($password);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $usuariosDao = $FactoryDao->getusuariosDao(self::getDataBaseDefault());
        $usuariosDao->update($usuarios);
        $usuariosDao->close();
    }

    /**
     * Elimina un objeto Usuarios de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id)
    {
        $usuarios = new Usuarios();
        $usuarios->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $usuariosDao = $FactoryDao->getusuariosDao(self::getDataBaseDefault());
        $usuariosDao->delete($usuarios);
        $usuariosDao->close();
    }

    /**
     * Lista todos los objetos Usuarios de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Usuarios en base de datos o Null
     */
    public static function listAll()
    {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $usuariosDao = $FactoryDao->getusuariosDao(self::getDataBaseDefault());
        $result = $usuariosDao->listAll();
        $usuariosDao->close();
        return $result;
    }

    /**
     * Metodo para validar si el correo existe para recuperar contraseña de un Usuario
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Usuario en base de datos o Null
     */
    public static function validarEmail($correo)
    {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $usuarioDao = $FactoryDao->getusuariosDao(self::getDataBaseDefault());
        $result = $usuarioDao->validarEmail($correo);
        $usuarioDao->close();
        return $result;
    }

    /**
     * Login de un Usuario de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Usuario en base de datos o Null
     */
    public static function login($user, $pass)
    {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $usuarioDao = $FactoryDao->getusuariosDao(self::getDataBaseDefault());
        $result = $usuarioDao->login($user, $pass);
        $usuarioDao->close();
        return $result;
    }

    /**
     * Metodo para insertar el token en cualquiera de los campos que requiera un Usuario
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Usuario en base de datos o Null
     */
    public static function inserToken($token, $id, $campo)
    {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $usuarioDao = $FactoryDao->getusuariosDao(self::getDataBaseDefault());
        $result = $usuarioDao->inserToken($token, $id, $campo);
        $usuarioDao->close();
        return $result;
    }

    /**
     * Metodo para cambiar contraseña de un Usuario
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Usuario en base de datos o Null
     */
    public static function newPass($clave, $token)
    {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $usuarioDao = $FactoryDao->getusuariosDao(self::getDataBaseDefault());
        $result = $usuarioDao->newPass($clave, $token);
        $usuarioDao->close();
        return $result;
    }
}
//That`s all folks!