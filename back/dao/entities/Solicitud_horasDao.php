<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Le he dedicado más tiempo a las frases que al software interno  \\

include_once realpath('../dao/interfaz/ISolicitud_horasDao.php');
include_once realpath('../dto/Solicitud_horas.php');

class Solicitud_horasDao implements ISolicitud_horasDao
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
     * Guarda un objeto Solicitud_horas en la base de datos.
     * @param solicitud_horas objeto a guardar
     * @return  Valor asignado a la llave primaria
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function insert($solicitud_horas)
    {
        $anio = $solicitud_horas->getAnio();
        $semestre = $solicitud_horas->getSemestre();
        $horas_catedra = $solicitud_horas->getHoras_catedra();
        $horas_planta = $solicitud_horas->getHoras_planta();
        $horas_solicitadas = $solicitud_horas->getHoras_solicitadas();
        $idSemillero = $solicitud_horas->getId_semillero();

        try {
            $sql = "INSERT INTO `solicitud_horas`( `anio`, `semestre`, `horas_catedra`, `horas_planta`, `horas_solicitadas`, `id_semillero`)"
                . "VALUES ('$anio','$semestre','$horas_catedra','$horas_planta','$horas_solicitadas', '$idSemillero')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Solicitud_horas en la base de datos.
     * @param solicitud_horas objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function select($solicitud_horas)
    {

        $id = $solicitud_horas->getId();

        try {
            $sql = "SELECT `id`, `anio`, `semestre`, `horas_catedra`, `horas_planta`, `horas_solicitadas`, `id_semillero`"
                . "FROM `solicitud_horas`"
                . "WHERE `id`='$id'";
            $data = $this->ejecutarConsulta($sql);
            //return $data;
            $solicitud_horas = new Solicitud_horas();
            $solicitud_horas->setAnio($data[0]['anio']);
            $solicitud_horas->setSemestre($data[0]['semestre']);
            $solicitud_horas->setHoras_catedra($data[0]['horas_catedra']);
            $solicitud_horas->setHoras_planta($data[0]['horas_planta']);
            $solicitud_horas->setHoras_solicitadas($data[0]['horas_solicitadas']);
            $solicitud_horas->setId_semillero($data[0]["id_semillero"]);


            return $solicitud_horas;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Modifica un objeto Solicitud_horas en la base de datos.
     * @param solicitud_horas objeto con la información a modificar
     * @return  Valor de la llave primaria
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function update($solicitud_horas)
    {
        $id = $solicitud_horas->getId();
        $anio = $solicitud_horas->getAnio();
        $semestre = $solicitud_horas->getSemestre();
        $horas_catedra = $solicitud_horas->getHoras_catedra();
        $horas_planta = $solicitud_horas->getHoras_planta();
        $horas_solicitadas = $solicitud_horas->getHoras_solicitadas();
        $update = $solicitud_horas->getHoras_solicitadas();

        try {
            $sql = "UPDATE `solicitud_horas` SET`id`='$id' ,`anio`='$anio' ,`semestre`='$semestre' ,`horas_catedra`='$horas_catedra' ,`horas_planta`='$horas_planta' ,`horas_solicitadas`='$horas_solicitadas' WHERE `id`='$id' ";
            return $this->updateConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Elimina un objeto Solicitud_horas en la base de datos.
     * @param solicitud_horas objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function delete($solicitud_horas)
    {
        $id = $solicitud_horas->getId();

        try {
            $sql = "DELETE FROM `solicitud_horas` WHERE `id`='$id'";
            return $this->updateConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    /**
     * Busca un objeto Solicitud_horas en la base de datos.
     * @return ArrayList<Solicitud_horas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listAll()
    {
        $lista = array();
        try {
            $sql = "SELECT `id`, `anio`, `semestre`, `horas_catedra`, `horas_planta`, `horas_solicitadas`"
                . "FROM `solicitud_horas`"
                . "WHERE 1";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $solicitud_horas = new Solicitud_horas();
                $solicitud_horas->setId($data[$i]['id']);
                $solicitud_horas->setAnio($data[$i]['anio']);
                $solicitud_horas->setSemestre($data[$i]['semestre']);
                $solicitud_horas->setHoras_catedra($data[$i]['horas_catedra']);
                $solicitud_horas->setHoras_planta($data[$i]['horas_planta']);
                $solicitud_horas->setHoras_solicitadas($data[$i]['horas_solicitadas']);

                array_push($lista, $solicitud_horas);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    /**
     * Busca un objeto Solicitud_horas en la base de datos.
     * @return ArrayList<Solicitud_horas> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
    public function listHorasBySemillero($idSemillero)
    {
        $lista = array();
        try {
            $sql = "SELECT `id`, `anio`, `semestre`, `horas_catedra`, `horas_planta`, `horas_solicitadas`"
                . "FROM `solicitud_horas`"
                . "WHERE id_semillero=$idSemillero";
            $data = $this->ejecutarConsulta($sql);
            for ($i = 0; $i < count($data); $i++) {
                $solicitud_horas = new Solicitud_horas();
                $solicitud_horas->setId($data[$i]['id']);
                $solicitud_horas->setAnio($data[$i]['anio']);
                $solicitud_horas->setSemestre($data[$i]['semestre']);
                $solicitud_horas->setHoras_catedra($data[$i]['horas_catedra']);
                $solicitud_horas->setHoras_planta($data[$i]['horas_planta']);
                $solicitud_horas->setHoras_solicitadas($data[$i]['horas_solicitadas']);

                array_push($lista, $solicitud_horas);
            }
            return $lista;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
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

    public function insertByDocente($solicitud_horas)
    {
        $anio = $solicitud_horas->getAnio();
        $semestre = $solicitud_horas->getSemestre();
        $idDocente = $solicitud_horas->getIdDocente();
        $idSemillero = $solicitud_horas->getId_semillero();

        try {
            $sql = "INSERT INTO `solicitud_horas`( `anio`, `semestre`, `id_docente`, `id_semillero`)"
                . "VALUES ('$anio','$semestre','$idDocente', '$idSemillero')";
            return $this->insertarConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function updateByDocente($solicitud_horas)
    {
        $anio = $solicitud_horas->getAnio();
        $semestre = $solicitud_horas->getSemestre();
        $idDocente = $solicitud_horas->getIdDocente();
        $idSemillero = $solicitud_horas->getId_semillero();
        $id = $solicitud_horas->getId();
        try {
            $sql = "UPDATE solicitud_horas SET id=$id ,anio=$anio ,semestre=$semestre ,id_docente=$idDocente, id_semillero=$idSemillero WHERE id=$id";
            return $this->updateConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }

    public function listHorasByDocente($idSemillero, $idDocente)
    {
        try {
            $sql = "SELECT id, anio, semestre, vb_representante AS estado FROM solicitud_horas WHERE id_semillero =$idSemillero and id_docente=$idDocente";
            $data = $this->ejecutarConsulta($sql);
            $solicitudes = array();
            for ($i = 0; $i < count($data); $i++) {
                $solicitud_horas = new Solicitud_horas();
                $solicitud_horas->setId($data[$i]['id']);
                $solicitud_horas->setAnio($data[$i]['anio']);
                $solicitud_horas->setSemestre($data[$i]['semestre']);
                $solicitud_horas->setEstado($data[$i]['estado']);
                array_push($solicitudes, $solicitud_horas);
            }
            return $solicitudes;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function selectDataForReport($idSolicitud)
    {
        try {
            $sql = "SELECT d.persona_id AS id_docente, horas AS horas_cantidad, descripcion AS horas_descripcion, s.nombre AS nombre_semillero, s.sigla AS sigla_semillero, gi.nombre AS grupo_investigacion_nombre, p.nombre AS nombre_docente FROM docente d INNER JOIN persona p ON p.id = d.persona_id INNER JOIN grupo_investigacion gi INNER JOIN solicitud_horas sh ON sh.id_docente = d.persona_id AND sh.id_semillero INNER JOIN semillero s ON s.id = sh.id_semillero AND s.grupo_investigacion_id = gi.id INNER JOIN persona_has_semillero phs ON phs.semillero_id = sh.id_semillero AND phs.persona_id = sh.id_docente INNER JOIN tipo_vinculacion tv ON tv.id = d.tipo_vinculacion_id WHERE sh.id =$idSolicitud";
            $data = $this->ejecutarConsulta($sql);
            $data = $data[0];

            $temp = [
                "idDocente" => $data["id_docente"],
                "horasCantidad" => $data["horas_cantidad"],
                "nombreDocente" => $data["nombre_docente"],
                "nombreSemillero" => $data["nombre_semillero"],
                "grupoInvestigacionNombre" => $data["grupo_investigacion_nombre"],
                "horasDescripcion" => $data["horas_descripcion"],
                "siglaSemillero" => $data["sigla_semillero"],
            ];
            return $temp;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }

    public function listByEstado($estadoSolicitud)
    {
        try {
            $sql = "SELECT
                        d.persona_id AS id_docente,
                        tv.horas AS horas_cantidad,
                        tv.descripcion AS horas_descripcion,
                        s.nombre AS nombre_semillero,
                        s.sigla AS sigla_semillero,
                        gi.nombre AS grupo_investigacion_nombre,
                        p.nombre AS nombre_docente,
                        sh.semestre,
                        sh.anio,
                        sh.id as id_solicitud
                    FROM
                        docente d
                    INNER JOIN persona p ON
                        p.id = d.persona_id
                    INNER JOIN grupo_investigacion gi INNER JOIN solicitud_horas sh ON
                        sh.id_docente = d.persona_id AND sh.id_semillero
                    INNER JOIN semillero s ON
                        s.id = sh.id_semillero AND s.grupo_investigacion_id = gi.id
                    INNER JOIN tipo_vinculacion tv ON
                        tv.id = d.tipo_vinculacion_id
                    WHERE sh.vb_representante = '$estadoSolicitud'";
            $data = $this->ejecutarConsulta($sql);
            $solicitudes = array();
            for ($i = 0; $i < count($data); $i++) {
                $temp = [
                    "idDocente" => $data[$i]["id_docente"],
                    "horasCantidad" => $data[$i]["horas_cantidad"],
                    "nombreDocente" => $data[$i]["nombre_docente"],
                    "nombreSemillero" => $data[$i]["nombre_semillero"],
                    "grupoInvestigacionNombre" => $data[$i]["grupo_investigacion_nombre"],
                    "horasDescripcion" => $data[$i]["horas_descripcion"],
                    "siglaSemillero" => $data[$i]["sigla_semillero"],
                    "semestre" => $data[$i]["semestre"],
                    "anio" => $data[$i]["anio"],
                    "idSolicitud" => $data[$i]["id_solicitud"],
                ];
                array_push($solicitudes, $temp);
            }
            return $solicitudes;
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
            return null;
        }
    }
    public function autorizarSolicitudByDocente($idSolicitud, $estado)
    {
        try {
            $sql = "UPDATE solicitud_horas SET vb_representante='$estado' WHERE id=$idSolicitud";
            return $this->updateConsulta($sql);
        } catch (SQLException $e) {
            throw new Exception('Primary key is null');
        }
    }
}
//That`s all folks!