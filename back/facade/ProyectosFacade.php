<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Proyectos.php');
require_once realpath('../dao/interfaz/IProyectosDao.php');
require_once realpath('../dto/Estado_proyecto.php');
require_once realpath('../dto/Semillero.php');

class ProyectosFacade
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
     * Crea un objeto Proyectos a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param titulo
     * @param investigador
     * @param tipo_proyecto_id
     * @param tiempo_ejecucion
     * @param fecha_ini
     * @param resumen
     * @param obj_general
     * @param obj_especifico
     * @param resultados
     * @param costo_valor
     * @param producto
     * @param semillero_id
     */
    public static function insert($id,  $titulo,  $investigador,  $tipo_proyecto_id,  $tiempo_ejecucion,  $fecha_ini,  $resumen,  $obj_general,  $obj_especifico,  $resultados,  $costo_valor,  $producto,  $semillero_id)
    {
        $proyectos = new Proyectos();
        $proyectos->setId($id);
        $proyectos->setTitulo($titulo);
        $proyectos->setInvestigador($investigador);
        $proyectos->setTipo_proyecto_id($tipo_proyecto_id);
        $proyectos->setTiempo_ejecucion($tiempo_ejecucion);
        $proyectos->setFecha_ini($fecha_ini);
        $proyectos->setResumen($resumen);
        $proyectos->setObj_general($obj_general);
        $proyectos->setobj_especifico($obj_especifico);
        $proyectos->setResultados($resultados);
        $proyectos->setCosto_valor($costo_valor);
        $proyectos->setProducto($producto);
        $proyectos->setSemillero_id($semillero_id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $rtn = $proyectosDao->insert($proyectos);
        $proyectosDao->close();
        return $rtn;
    }

    /**
     * Crea un objeto Proyectos a partir de sus parámetros y lo guarda en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param titulo
     * @param investigador
     */
    public static function insertBasico($titulo, $investigador, $id_semillero)
    {
        $proyectos = new Proyectos();
        $proyectos->setTitulo($titulo);
        $proyectos->setInvestigador($investigador);
        $proyectos->setSemillero_id($id_semillero);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $rtn = $proyectosDao->insertBasico($proyectos);
        $proyectosDao->close();
        return $rtn;
    }

    /**
     * Selecciona un objeto Proyectos de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @return El objeto en base de datos o Null
     */
    public static function select($id)
    {
        $proyectos = new Proyectos();
        $proyectos->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $result = $proyectosDao->select($proyectos);
        $proyectosDao->close();
        return $result;
    }

    /**
     * Modifica los atributos de un objeto Proyectos  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     * @param titulo
     * @param investigador
     * @param tipo_proyecto_id
     * @param tiempo_ejecucion
     * @param fecha_ini
     * @param resumen
     * @param obj_general
     * @param obj_especifico
     * @param resultados
     * @param costo_valor
     * @param producto
     * @param semillero_id
     */
    public static function update($id, $titulo, $investigador, $tipo_proyecto_id, $tiempo_ejecucion, $fecha_ini, $resumen, $obj_general, $obj_especifico, $resultados, $costo_valor, $producto, $semillero_id)
    {
        $proyectos = self::select($id);
        $proyectos->setTitulo($titulo);
        $proyectos->setInvestigador($investigador);
        $proyectos->setTipo_proyecto_id($tipo_proyecto_id);
        $proyectos->setTiempo_ejecucion($tiempo_ejecucion);
        $proyectos->setFecha_ini($fecha_ini);
        $proyectos->setResumen($resumen);
        $proyectos->setObj_general($obj_general);
        $proyectos->setobj_especifico($obj_especifico);
        $proyectos->setResultados($resultados);
        $proyectos->setCosto_valor($costo_valor);
        $proyectos->setProducto($producto);
        $proyectos->setSemillero_id($semillero_id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $proyectosDao->update($proyectos);
        $proyectosDao->close();
    }

    /**
     * Modifica los atributos de un objeto Proyectos  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     */
    public static function updateParte1($id, $tiempo_ejecucion, $fecha_ini, $resumen, $linea_investigacion, $fecha_fin)
    {
        $proyectos = self::select($id);
        $proyectos->setTiempo_ejecucion($tiempo_ejecucion);
        $proyectos->setFecha_ini($fecha_ini);
        $proyectos->setResumen($resumen);
        $proyectos->setObj_general($linea_investigacion);
        $proyectos->setobj_especifico($fecha_fin);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $rpta = $proyectosDao->updateParte1($proyectos);
        $proyectosDao->close();
        return $rpta;
    }
    public static function updateDelete($id)
    {
      

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $rpta = $proyectosDao->updateDelete($id);
        $proyectosDao->close();
        return $rpta;
    }

    /**
     * Modifica los atributos de un objeto Proyectos  ya existente en base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     */
    public static function updateParte2($id, $tiempo_ejecucion, $fecha_ini, $resumen, $linea_investigacion)
    {
        $proyectos = self::select($id);
        $proyectos->setTiempo_ejecucion($tiempo_ejecucion);
        $proyectos->setFecha_ini($fecha_ini);
        $proyectos->setResumen($resumen);
        $proyectos->setObj_general($linea_investigacion);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $rpta = $proyectosDao->updateParte2($proyectos);
        $proyectosDao->close();
        return $rpta;
    }

    /**
     * Elimina un objeto Proyectos de la base de datos a partir de su(s) llave(s) primaria(s).
     * Puede recibir NullPointerException desde los métodos del Dao
     * @param id
     */
    public static function delete($id)
    {
        $proyectos = new Proyectos();
        $proyectos->setId($id);

        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $proyectosDao->delete($proyectos);
        $proyectosDao->close();
    }

    /**
     * Lista todos los objetos Proyectos de la base de datos.
     * Puede recibir NullPointerException desde los métodos del Dao
     * @return $result Array con los objetos Proyectos en base de datos o Null
     */
    public static function listAll()
    {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $result = $proyectosDao->listAll();
        $proyectosDao->close();
        return $result;
    }
    public static function listAll_id($id)
    {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $result = $proyectosDao->listAll_id($id);
        $proyectosDao->close();
        return $result;
    }
    
    public static function listAll_id_Ejecucion($id)
    {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $result = $proyectosDao->listAll_id_Ejecucion($id);
        $proyectosDao->close();
        return $result;
    }
   
    public static function listAll_Project_id($id)
    {
        $FactoryDao = new FactoryDao(self::getGestorDefault());
        $proyectosDao = $FactoryDao->getproyectosDao(self::getDataBaseDefault());
        $result = $proyectosDao->listAll_Project_id($id);
        $proyectosDao->close();
        return $result;
    }
}
//That`s all folks!