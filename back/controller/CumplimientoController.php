<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Me han encontrado! ¡No sé cómo pero me han encontrado!  \\
include_once realpath('../facade/CumplimientoFacade.php');

class CumplimientoController
{

    public static function insert()
    {
        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        $dirigido_id = strip_tags($dataObject->dirigido_id);
        $descripcion = strip_tags($dataObject->descripcion);
        $porcentaje = strip_tags($dataObject->porcentaje);
        $semestre = strip_tags($dataObject->semestre);
        $ano = strip_tags($dataObject->anio);
        $productos = strip_tags($dataObject->productos);
        $acepta_uno = strip_tags($dataObject->recomendacion_horas);//Recomienda las horas de investigación solicitadas
        $acepta_dos = strip_tags($dataObject->cumple_requisitos);//Cumple con los productos mínimos exigidos en el artículo 25 del Acuerdo 056 de 2012.
        return CumplimientoFacade::insert($dirigido_id, $descripcion, $ano, $productos, $semestre, $acepta_uno, $acepta_dos, $porcentaje);
    }

    public static function listAll()
    {
        $list = CumplimientoFacade::listAll();
        $response = array();
        foreach ($list as $obj => $Cumplimiento) {
            $temp = [
                "id" => $Cumplimiento->getId(),
                "dirigido_id" => $Cumplimiento->getdirigido_id(),
                "descripcion" => $Cumplimiento->getdescripcion(),
                "porcentaje" => $Cumplimiento->getporcentaje(),
                "semestre" => $Cumplimiento->getsemestre(),
                "ano" => $Cumplimiento->getano(),
                "productos" => $Cumplimiento->getproductos(),
                "acepta_uno_id" => $Cumplimiento->getacepta_uno(),
                "acepta_dos_id" => $Cumplimiento->getacepta_dos(),
                "semillero_id" => $Cumplimiento->getacepta_dos(),
            ];
            array_push($response, $temp);
        }
        return $response;
    }
    public static function delete($id)
    {
        return CumplimientoFacade::delete($id);
    }
}

$cumplimientoController = new CumplimientoController();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $res = $cumplimientoController->listAll();
        http_response_code(200);
        echo(json_encode(["data" => $res]));
        break;
    case 'POST':
        $res = $cumplimientoController->insert();
        try {
            if ($res > 0) {
                http_response_code(200);
                echo(json_encode(["mensaje" => "Se ha registrado exitosamente"]));
            } else {
                http_response_code(400);
                echo(json_encode(["mensaje" => "Error al registrar el ciclo"]));
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo "{\"mensaje\":\"Error al registrar el ciclo\"}";
        }
        break;
    case "DELETE":

        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        $id = strip_tags($dataObject->id);
        $res = $cumplimientoController->delete($id);
        try {
            if ($res > 0) {
                http_response_code(200);
                echo(json_encode(["mensaje" => "Se ha eliminado exitosamente"]));
            } else {
                http_response_code(400);
                echo(json_encode(["mensaje" => "Error al eliminar "]));
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo "{\"mensaje\":\"Error al eliminar\"}";
        }
        break;
    default:
}