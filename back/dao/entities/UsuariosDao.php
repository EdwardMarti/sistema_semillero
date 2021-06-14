<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\

include_once realpath('../dao/interfaz/IUsuariosDao.php');
include_once realpath('../dto/Usuarios.php');
include_once realpath('../dto/Persona.php');

class UsuariosDao implements IUsuariosDao
{

    private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion)
    {
        $this->cn = $conexion;
    }

    /**
     * Guarda un objeto Usuarios en la base de datos.
     * @param usuarios objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($usuarios)
    {
        $id = $usuarios->getId();
        $persona_id = $usuarios->getPersona_id()->getId();
        $password = $usuarios->getPassword();

        try {
            $sql = "INSERT INTO `usuarios`( `id`, `persona_id`, `password`)"
                . "VALUES ('$id','$persona_id','$password')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Usuarios en la base de datos.
     * @param usuarios objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($usuarios)
    {
        $id = $usuarios->getId();

        try {
            $sql = "SELECT `id`, `persona_id`, `password`"
                . "FROM `usuarios`"
                . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $usuarios->setId($data[$i]['id']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $usuarios->setPersona_id($persona);
                $usuarios->setPassword($data[$i]['password']);
            }
            return $usuarios;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Usuarios en la base de datos.
     * @param usuarios objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($usuarios)
    {
        $id = $usuarios->getId();
        $persona_id = $usuarios->getPersona_id()->getId();
        $password = $usuarios->getPassword();

        try {
            $sql = "UPDATE `usuarios` SET`id`='$id' ,`persona_id`='$persona_id' ,`password`='$password' WHERE `id`='$id' ";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Usuarios en la base de datos.
     * @param usuarios objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($usuarios)
    {
        $id = $usuarios->getId();

        try {
            $sql = "DELETE FROM `usuarios` WHERE `id`='$id'";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Usuarios en la base de datos.
     * @return ArrayList<Usuarios> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll()
    {
        $lista = array();
        try {
            $sql = "SELECT `id`, `persona_id`, `password`"
                . "FROM `usuarios`"
                . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $usuarios = new Usuarios();
                $usuarios->setId($data[$i]['id']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $usuarios->setPersona_id($persona);
                $usuarios->setPassword($data[$i]['password']);

                array_push($lista, $usuarios);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Metodo para validar si el correo existe para recuperar contraseña de un Usuario
     * @return Usuario Contiene el objeto consultado o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function validarEmail($correo)
    {
        $usuarios = null;
        try {
            $sql = "SELECT * "
                . "FROM `data_seme`"
                . "WHERE correo='$correo'";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $usuarios = new Usuarios();
                $usuarios->setId($data[$i]['token']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $persona->setCorreo($data[$i]['correo']);
                $usuarios->setPersona_id($persona);
                $usuarios->setPassword($data[$i]['rol']);

            }
            if (isset($usuarios)) {
                return $usuarios;
            }
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Login de un Usuario de la base de datos.
     * @return ArrayList<Usuario> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function login($user, $pass)
    {
        $usuarios = null;
        try {
            $sql = "SELECT * FROM `data_seme` WHERE `correo`='$user' and `password`='$pass' ";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $usuarios = new Usuarios();
                $usuarios->setId($data[$i]['nombreD']);
                $persona = new Persona();
                $persona->setId($data[$i]['persona_id']);
                $persona->setCorreo($data[$i]['correo']);
                $persona->setPerfiles_id($data[$i]['rol']);
                $persona->setId_aux($data[$i]['id']);
                $usuarios->setPersona_id($persona);
                $usuarios->setPassword($data[$i]['nombre']);
            }
            if (isset($usuarios)) {
                return $usuarios;
            }
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Usuario en la base de datos para añadir el token para restaurar clave.
     * @param usuario objeto con la información a modificar
     * @return  Valor de la llave primaria
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function inserToken($token, $id, $campo)
    {
        try {
            $sql = "UPDATE usuarios SET `$campo`='$token' WHERE `persona_id`='$id'";
            return $this->updateConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Modifica un objeto Usuario en la base de datos para añadir el token para restaurar clave.
     * @param usuario objeto con la información a modificar
     * @return  Valor de la llave primaria
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function newPass($clave, $token)
    {
        try {
            $sql = "UPDATE usuarios SET `password`='$clave', token_clave='' WHERE token_clave='$token' ";
            return $this->updateConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function insertarConsulta($sql)
    {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $sentencia = null;
        return $this->cn->lastInsertId();
    }
    public function ejecutarConsulta($sql)
    {
        $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sentencia = $this->cn->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetchAll();
        $sentencia = null;
        return $data;
    }

    public function updateConsulta($sql)
    {
        try {
            $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sentencia = $this->cn->prepare($sql);
            $sentencia->execute();
            $rta = 1;
            $sentencia = null;
            return $rta;
        } catch (Exception $e) {
            return 0;
        }
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
    public function close()
    {
        $cn = null;
    }
}
//That`s all folks!