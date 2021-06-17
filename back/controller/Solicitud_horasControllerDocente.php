<?php
include_once realpath('../facade/Solicitud_horasFacade.php');

class SolicitudHorasDocente
{
    private $data;

    public function __construct()
    {
        $JSONData = file_get_contents("php://input");
        $this->data = json_decode($JSONData);
    }

    public function insert()
    {
        $dataObject = $this->data;
        $semestre = strip_tags($dataObject->semestre);
        $anio = strip_tags($dataObject->anio);
        $idSemillero = strip_tags($dataObject->idSemillero);
        $idDocente = strip_tags($dataObject->idDocente);

        return Solicitud_horasFacade::insertByDocente($anio, $semestre, $idSemillero, $idDocente);
    }

    public function selectAll()
    {
        $idDocente = $_GET['idDocente'];
        $idSemillero = $_GET['idSemillero'];
        $list = Solicitud_horasFacade::listHorasByDocente($idSemillero, $idDocente);
        $response = array();
        foreach ($list as $obj => $item) {
            $temp = [
                "id" => $item->getId(),
                "semestre" => $item->getSemestre(),
                "anio" => $item->getAnio(),
                "estado" => $item->getEstado()
            ];
            array_push($response, $temp);
        }
        return $response;
    }

    public function select()
    {
    }

    public function delete()
    {
        $dataObject = $this->data;

        $id = strip_tags($dataObject->id);
       return Solicitud_horasFacade::delete($id);
    }

    public function update()
    {
        $dataObject = $this->data;
        $semestre = strip_tags($dataObject->semestre);
        $anio = strip_tags($dataObject->anio);
        $idSemillero = strip_tags($dataObject->idSemillero);
        $idDocente = strip_tags($dataObject->idDocente);
        $idSolicitud = strip_tags($dataObject->idSolicitud);

        return Solicitud_horasFacade::updateByDocente($idSolicitud, $anio, $semestre, $idSemillero, $idDocente);
    }
}

$controller = new SolicitudHorasDocente();

try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $res = $controller->insert();
            if ($res > 0) {
                http_response_code(200);
                echo json_encode(["mensaje" => "Se ha registrado exitosamente"]);
            } else {
                throw new Exception('Error al registrar tu solicitud de horas');
            }
            break;
        case 'GET':
            $res = $controller->selectAll();
            http_response_code(200);
            echo json_encode(["horas" => $res]);
            break;
        case 'DELETE':
            $res = $controller->delete();
            if ($res > 0) {
                http_response_code(200);
                echo json_encode(["mensaje" => "Se ha registrado exitosamente"]);
            } else {
                throw new Exception('Error al eliminar tu solicitud de horas');
            }
            break;
        case 'PUT':
            $res = $controller->update();
            if ($res > 0) {
                http_response_code(200);
                echo json_encode(["mensaje" => "Se ha actualizado exitosamente"]);
            } else {
                throw new Exception('Error al actualizar tu solicitud de horas');
            }
            break;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["mensaje" => $e->getMessage()]);
}