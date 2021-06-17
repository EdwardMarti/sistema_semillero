$(document).ready(function () {
    iniciarTabla();
    cargarHorasByDocente();
});

function cargarHorasByDocente() {
    let idSemillero = Utilitario.getLocal("id_semillero");
    let idDocente = Utilitario.getLocal("id");
    fetch(`../../back/controller/Solicitud_horasControllerDocente.php?idSemillero=${idSemillero}&idDocente=${idDocente}`, GET())
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function (data) {
            loadTabla(data);
        })
        .catch(function (promise) {
            if (promise.json) {
                promise.json().then(function (response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
                            Utilitario2.cerrarSesion();
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
        });
}

function loadTabla({horas}) {
    let tabla = $("#listadoHorasTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(horas).draw();
}

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTabla() {
    $("#listadoHorasTabla").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "No hay solicitudes de horas para mostrar...",
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
        columns: [
            {
                data: "anio",
                className: "text-center",
                orderable: true,
            },
            {
                data: "semestre",
                className: "text-center",
                orderable: true,
            },{
                data: "estado",
                className: "text-center",
                orderable: true,
            },
            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='text-secondary actualizar' title='Modificar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='text-secondary make-pdf' title='Ver en formato PDF'><i class='fa fa-file-o'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='text-danger eliminar' title='Eliminar'><i class='fa fa-trash-o'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "</div>",
                ].join(""),
            },

        ], rowCallback: function (row, data, index) {
            $(".actualizar", row).click(function () {
                Menu.editarHorasDocente(data);
            });
            $(".make-pdf", row).click(function () {
                makeSolicitudHorasPdf(data.id);
            });
            $(".eliminar", row).click(function () {
                Mensaje.mostrarMsjConfirmacion(
                    'Eliminar Solicitud',
                    'Este proceso es irreversible , ¿esta seguro que desea eliminar la solicitud de horas?',
                    function () {
                        eliminarItem(data.id);
                    }
                );
            });
        },

        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
            extend: "copy",
            className: "btn btn-primary glyphicon glyphicon-duplicate"
        },
            {
                extend: "csv",
                title: "semillero",
                className: "btn btn-primary glyphicon glyphicon-save-file"
            },
            {
                extend: "excel",
                title: "semillero",
                className: "btn btn-primary glyphicon glyphicon-list-alt"
            },
            {
                extend: "pdf",
                title: "semillero",
                className: "btn btn-primary glyphicon glyphicon-file"
            },
            {
                extend: "print",
                className: "btn btn-primary glyphicon glyphicon-print",
                customize: function (win) {
                    $(win.document.body).addClass("white-bg");
                    $(win.document.body).css("font-size", "10px");
                    $(win.document.body)
                        .find("table")
                        .addClass("compact")
                    //.addClass("table-responsive")
                    //   .css("font-size", "inherit")
                    // .css("background-color", "yellow");
                },
            },
        ],
    });

}

function actualizarSolicitudHoras() {

    let data = {
        idSolicitud:VAL("idSolicitud"),
        idSemillero: Utilitario.getLocal('id_semillero'),
        idDocente: Utilitario.getLocal('id'),
        anio: VAL("anio"),
        semestre: SELECTED_ITEM("semestre").value
    }
    fetch("../../back/controller/Solicitud_horasControllerDocente.php", PUT(data))
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function (data) {
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            cargarHorasByDocente();
            Menu.loadFormSolicitudHorasDocente();
        })
        .catch(function (promise) {

            if (promise.json) {
                promise.json().then(function (response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
                            Utilitario2.cerrarSesion();
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
        });
}

function eliminarItem(id) {
    fetch("../../back/controller/Solicitud_horasControllerDocente.php", DELETE({id}))
        .then((response) => {
            if (response.ok) {
                return response.json();
            }
            throw response
        }).then((response) => {
        Mensaje.mostrarMsjExito("Removido Correctamente", response.mensaje);
        cargarHorasByDocente();
    })
        .catch(function (promise) {

            if (promise.json) {
                promise.json().then(function (response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
                            Utilitario2.cerrarSesion();
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
        });

}

function makeSolicitudHorasPdf(id) {

    let data ={
        idSolicitud:id,
        idSemillero: Utilitario.getLocal('id_semillero'),
        idDocente: Utilitario.getLocal('id'),
    }
    console.log("id -> ", data)
    fetch("../../back/controller/Solicitud_horasControllerReporte.php", POST(data))
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function ({key}) {
            console.log(12);
            window.open(`reports/solicitud-de-horas/solicitud.php?token=${key}`, '_blank');
        })
        .catch(function (promise) {
            if (promise.json) {
                promise.json().then(function (response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
                            Utilitario2.cerrarSesion();
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
        });
}

/**
 * selector de año
 */
$(document).ready(function () {
    $(".yearpicker").yearpicker({
        year: 2017,
        startYear: 2012,
        endYear: 2030
    });
});

/*
* nuevo formulario
* */

function registrarSolicitudHorasV2() {

    let data = {
        idSemillero: Utilitario.getLocal('id_semillero'),
        idDocente: Utilitario.getLocal('id'),
        anio: VAL("anio"),
        semestre: SELECTED_ITEM("semestre").value
    }
    console.log(data);
    fetch("../../back/controller/Solicitud_horasControllerDocente.php", POST(data))
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function (data) {
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            cargarHorasByDocente();
            Menu.loadFormSolicitudHorasDocente();
        })
        .catch(function (promise) {
            console.log("qqq", promise)
            if (promise.json) {
                promise.json().then(function (response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
                            Utilitario2.cerrarSesion();
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
        });
}
