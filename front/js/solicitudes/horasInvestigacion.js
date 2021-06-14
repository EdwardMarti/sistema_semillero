$(document).ready(function () {
    iniciarTabla();
    cargarHorasBySemillero();
});

function cargarHorasBySemillero() {
    fetch("../../back/controller/Solicitud_horasControllerList.php", {
        method: "POST",
        body: JSON.stringify({ id: 2 }),
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Plataform: "web",
        },
    })
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
function loadTabla({ horas }) {
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
            emptyTable: "Sin Horas...",
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
            },

            {
                data: "horas_catedra",
                className: "text-center",
                orderable: true,
            },
            {
                data: "horas_planta",
                className: "text-center",
                orderable: true,
            },
            {
                data: "horas_solicitadas",
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
                editarSolicitud(data);
            });
            $(".make-pdf", row).click(function () {
                makeSolicitudHorasPdf(data.id);
            });
            $(".eliminar", row).click(function () {
                Mensaje.mostrarMsjConfirmacion(
                    'Eliminar Solicitud',
                    'Este proceso es irreversible , ¿esta seguro que desea eliminar la solicitud de horas?',
                    function() {
                        deleteSolicitud(data.id);
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
                    .css("font-size", "inherit");
            },
        },
        ],
    });

}

function registrarSolicitudHoras() {
    Utilitario.validForm(['anio', 'semestre', 'horas_catedra',
        'horas_planta', 'horas_solicitadas'
    ]);

    let solicitudHora = {
        anio: document.getElementById("anio").value,
        semestre: document.getElementById("semestre").value,
        horas_catedra: document.getElementById("horas_catedra").value,
        horas_planta: document.getElementById("horas_planta").value,
        horas_solicitadas: document.getElementById("horas_solicitadas").value,
    }
    console.log(solicitudHora);
    fetch("../../back/controller/Solicitud_horasControllerInsert.php", {
        method: "POST",
        body: JSON.stringify(solicitudHora),
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Plataform: "web",
        },
    })
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function (data) {
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            cargarHorasBySemillero();
            closeModalRegistroHoras();
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
function actualizarSolicitudHoras() {
    Utilitario.validForm(['anio', 'semestre', 'horas_catedra',
        'horas_planta', 'horas_solicitadas','id'
    ]);
    let solicitudHora = {
        id:document.getElementById("id").value,
        anio: document.getElementById("anio").value,
        semestre: document.getElementById("semestre").value,
        horas_catedra: document.getElementById("horas_catedra").value,
        horas_planta: document.getElementById("horas_planta").value,
        horas_solicitadas: document.getElementById("horas_solicitadas").value,
    }
    console.log(solicitudHora);
    fetch("../../back/controller/Solicitud_horasControllerUpdate.php", {
        method: "POST",
        body: JSON.stringify(solicitudHora),
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Plataform: "web",
        },
    })
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function (data) {
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            cargarHorasBySemillero();
            closeModalRegistroHoras();
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
function editarSolicitud({ id, anio, semestre, horas_catedra, horas_planta, horas_solicitadas }) {
    document.getElementById("btnActualizar").style.display="inline";
    document.getElementById("btnOrderReg").style.display="none";
    document.getElementById("id").value = id;
    document.getElementById("anio").value = anio;
    document.getElementById("semestre").value = semestre;
    document.getElementById("horas_catedra").value = horas_catedra;
    document.getElementById("horas_planta").value = horas_planta;
    document.getElementById("horas_solicitadas").value=horas_solicitadas;
    openModalRegistroHoras();
}
function deleteSolicitud(id) {
    fetch("../../back/controller/Solicitud_horasControllerDelete.php", {
        method: "POST",
        body: JSON.stringify({id}),
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Plataform: "web",
        },
    })
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function (data) {
            Mensaje.mostrarMsjExito("Removido Correctamente", data.mensaje);
            cargarHorasBySemillero();
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

function openModalRegistroHoras() {
    $('#modalRegistroHoras').modal({ show: true });
}

function closeModalRegistroHoras() {
    $('#modalRegistroHoras').modal("hide");
    document.getElementById("btnActualizar").style.display="none";
    document.getElementById("btnOrderReg").style.display="inline";
}

function makeSolicitudHorasPdf(id) {
    fetch("../../back/controller/Solicitud_horasControllerReporte.php", {
        method: "POST",
        body: JSON.stringify({"id":id}),
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Plataform: "web",
        },
    })
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }

            throw response;
        })
        .then(function ({key}) {console.log(12);
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