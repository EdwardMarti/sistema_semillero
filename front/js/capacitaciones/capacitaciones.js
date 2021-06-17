$(document).ready(function() {
    id_Semil = Utilitario.getLocal('id_semillero');
    iniciarTablaC();
    obtenerDatosC(id_Semil);

    //  
    //    $("#btnOrderAct").hide();
    //    $("#btnOrderReg").hide();
});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTablaC() {

    //tabla de alumnos
    $("#listadoCapacitacionesTabla").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "No hay capacitaciones para mostrar...",
            search: "Buscar:",
            info: "_START_ de _MAX_ registros", //_END_ muestra donde acaba _TOTAL_ muestra el total
            infoEmpty: "Ningun registro 0 de 0",
            infoFiltered: "(filtro de _MAX_ registros en total)",
            paginate: {
                first: "Primero",
                previous: "Anterior",
                next: "Siguiente",
                last: "Ultimo"
            }
        },
        columns: [{
                data: "tema",
                className: "text-center",
                orderable: true,
            },
            {
                data: "docente",
                className: "text-center",
                orderable: true,
            },


            {
                data: "fecha",
                className: "text-center",
                orderable: true,
            },
            {
                data: "cant_capacitados",
                className: "text-center",
                orderable: true,
            },

            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='personalizado eliminar' title='eliminar'><i class='fa fa-trash'></i></a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function(row, data, index) {
            var id_order = data.id

            $(".actualizar", row).click(function() {
                gestionarItem(id_order, data, index);
            });
            $(".eliminar", row).click(function() {
                DeleteCap(id_order, index);
            });
        },
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
                extend: "copy",
                className: "btn btn-primary glyphicon glyphicon-duplicate"
            },
            {
                extend: "csv",
                title: "listadoAlumnos",
                className: "btn btn-primary glyphicon glyphicon-save-file"
            },
            {
                extend: "excel",
                title: "listadoAlumnos",
                className: "btn btn-primary glyphicon glyphicon-list-alt"
            },
            {
                extend: "pdf",
                title: "listadoAlumnos",
                className: "btn btn-primary glyphicon glyphicon-file"
            },
            {
                extend: "print",
                className: "btn btn-primary glyphicon glyphicon-print",
                customize: function(win) {
                    $(win.document.body).addClass("white-bg");
                    $(win.document.body).css("font-size", "10px");
                    $(win.document.body)
                        .find("table")
                        .addClass("compact")
                        .css("font-size", "inherit");
                },
            },
        ],
    });

}

//----------------------------------CRUD----------------------------------
/**
 * @method obtenerDatos
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function obtenerDatosC(id) {

    let semillero = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/CapacitacionesController_List_Semillero.php", {
            method: "post",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                //                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
            body: JSON.stringify(semillero),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {

            listadoTCap(data.capacitaciones);
        })
        .catch(function(promise) {
            if (promise.json) {
                promise.json().then(function(response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function() {
                            Utilitario.cerrarSesion();
                        });
                    } else if (mensaje) {
                        Mensaje.mostrarMsjError("Error", mensaje);
                    }
                });
            } else {
                Mensaje.mostrarMsjError(
                    "Error",
                    "Ocurrió un error inesperado. Intentelo nuevamente por favor."
                );
            }
        })
        .finally(function() {
            Utilitario.quitarMascara();
        });
};

//----------------------------------HELPERS----------------------------------

/**
 * @method listadoEspecialOrdenes
 * Método que se encarga de listar los alumnos a la tabla.
 *
 * @param {Object} orders Arreglo con los datos de las ordenes.
 */


function listadoTCap(capacitaciones) {

    let tabla = $("#listadoCapacitacionesTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(capacitaciones).draw();
}

//<editor-fold defaultstate="collapsed" desc="Modal Capacitaciones">

function mostrarModalCapacitaciones() {
    LimpiarCapacitaciones();
    $('#myModalCapacitaciones').modal({ show: true });
    $("#btnOrderReg").show();
    $("#btnOrderAct").hide();
}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function cerrarModalCapacitaciones() {
    $('#myModalCapacitaciones').modal('hide');
}

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="CRUD">


function registrarCapacitacion() {

    let capacitacion = {
        objetivo: "No Aplica",
        semillero_id : Utilitario.getLocal('id_semillero'),
        linea_id  : "0",
        proy_id   : "0",
        plan_accion_id    : "0",
        tema: $('#tema').val(),
        docente: $('#docente').val(),
        fecha: $('#fecha').val(),
        cant_capacitados: $('#cant_capacitados').val(),

    };

    if (Utilitario.validForm(['tema', 'docente', 'fecha', 'cant_capacitados'])) {
        Mensaje.mostrarMsjError("Error", 'parametros incompletos');
        return false;
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/CapacitacionesController_Insert.php", {

            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                //                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
            body: JSON.stringify(capacitacion),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {

            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            obtenerDatosC(id_Semil);
            LimpiarCapacitaciones();
            cerrarModalCapacitaciones();
        })
        .catch(function(promise) {
            if (promise.json) {
                promise.json().then(function(response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function() {
                            Utilitario.cerrarSesion();
                        });
                    } else if (mensaje) {
                        Mensaje.mostrarMsjError("Error", mensaje);
                    }
                });
            } else {
                Mensaje.mostrarMsjError(
                    "Error",
                    "Ocurrió un error inesperado. Intentelo nuevamente por favor."
                );
            }
        })
        .finally(function() {
            Utilitario.quitarMascara();
        });
}


function gestionarItem(id_order) {


    cargarInfoTablaLn(id_order);


}

function cargarInfoTablaLn(id_order) {

    let semillero = {
        id: id_order,

    };
    fetch("../../back/controller/SemilleroController_Perfil_Semillero.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                Plataform: "web",
            },
            body: JSON.stringify(semillero),
        })
        .then(function(response) {
            //            console.log(response.ok);
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            //            console.log(data.semilleroPer,'data  semillero');
            dataItemTablaLn(data.semilleroPer);
        })
        .catch(function(promise) {
            console.log("ptomridsf", promise.json);
            if (promise.json) {
                promise.json().then(function(response) {
                    console.log("respsada", response);
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function() {
                            Utilitario.cerrarSesion();
                        });
                    } else if (mensaje) {
                        Mensaje.mostrarMsjError("Error", mensaje);
                    }
                });
            } else {
                //                Mensaje.mostrarMsjError(
                //                    "Error",
                //                    "Ocurrió un error inesperado. Intentelo nuevamente por favor. aa"
                //                );
            }
        });
}

function dataItemTablaLn(data) {


    $('#id_semillero').val(data[0].id);
    $('#nombre').val(data[0].nombre);
    $('#sigla').val(data[0].sigla);
    $('#grupo_investigacion').val(data[0].grupo_investigacion_id);
    $('#departamentos').val(data[0].departamento);
    $('#facultades').val(data[0].facultad);
    var rptaFa = data[0].departamento;
    cargarSelectDepartamentosRpta(rptaFa);
    $('#p_estudio').val(data[0].p_estudio);
    var pRpta = data[0].p_estudio;
    cargarSelectPlanRpta(pRpta);
    $('#fecha').val(data[0].fecha_creacion);
    $('#nombreD').val(data[0].nombreD);
    $('#correoD').val(data[0].correoD);
    $('#telefonoD').val(data[0].telefonoD);
    $('#tp_vinculacion').val(data[0].tp_vinculacion);
    //    $('#fecha').val(data.inspector).change();

    mostrarModalP();
}




function LimpiarCapacitaciones() {
    
    $('#id_semillero').val("");
    $('#nombre').val("");
    $('#sigla').val("");
    $('#grupo_investigacion').val("");
    $('#departamentos').val("");
    $('#facultades').val("");
  

    $('#p_estudio').val("");
   
    $('#fecha').val("");
    $('#nombreD').val("");
    $('#correoD').val("");
    $('#telefonoD').val("");
    $('#tp_vinculacion').val("");
}
function ActualizarData() {

    let semillero = {
        id: $('#id_semillero').val(),
        nombre: $('#nombre').val(),
        sigla: $('#sigla').val(),
        fecha: $('#fecha').val(),
        grupo_investigacion: $('#grupo_investigacion').val(),
        departamentos: $('#departamentos').val(),
        facultades: $('#facultades').val(),
        p_estudio: $('#p_estudio').val(),


    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/SemilleroController_Update_datos.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",

                Plataform: "web",
            },
            body: JSON.stringify(semillero),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {

            Mensaje.mostrarMsjExito("Datos Actualizados", data.mensaje);
            //            obtenerDatos();
            //            ocultarModalOrdenes();
                 obtenerDatosC(id_Semil);
                LimpiarCapacitaciones();
                cerrarModalCapacitaciones();
        })
        .catch(function(promise) {
            if (promise.json) {
                promise.json().then(function(response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function() {
                            Utilitario.cerrarSesion();
                        });
                    } else if (mensaje) {
                        Mensaje.mostrarMsjError("Error", mensaje);
                    }
                });
            } else {
                Mensaje.mostrarMsjError(
                    "Error",
                    "Ocurrió un error inesperado. Intentelo nuevamente por favor."
                );
            }
        })
        .finally(function() {
            Utilitario.quitarMascara();
        });

}




function DeleteCap(id) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registro',
        'Este proceso es irreversible , ¿esta seguro que desea este Registro?',
        function() {
            eliminarCapacitacion(id);
        }
    );
}


/**
 * @method AlumnoEliminar
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarCapacitacion(id) {

    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/CapacitacionesController_Delete.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                //                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },

            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {

            Mensaje.mostrarMsjExito("Borrado Exitoso", data.mensaje);

            obtenerDatosC(id_Semil);

        })
        .catch(function(promise) {
            if (promise.json) {
                promise.json().then(function(response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function() {
                            Utilitario.cerrarSesion();
                        });
                    } else if (mensaje) {
                        Mensaje.mostrarMsjError("Error", mensaje);
                    }
                });
            } else {
                Mensaje.mostrarMsjError(
                    "Error",
                    "Ocurrió un error inesperado. Intentelo nuevamente por favor."
                );
            }
        })
        .finally(function() {
            Utilitario.quitarMascara();
        });

}



//</editor-fold>