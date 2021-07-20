$(document).ready(() => {
    iniciarTabla();
    cargarSolicitudes();
});

function cargarSolicitudes() {
    fetch(`../../back/controller/Solicitud_horasControllerAdmin.php?estadoSolicitud=${'En Tramite'}`, GET())
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

function loadTabla({solicitudes}) {
    console.log(solicitudes)
    let tabla = $("#listadoHorasTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(solicitudes).draw();
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
            info: "_START_ de _MAX_ registros",
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
                data: "nombreDocente",
                className: "text-center",
                orderable: true,
            },
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
                data: "horasCantidad",
                className: "text-center",
                orderable: true,
            },
            {
                data: "siglaSemillero",
                className: "text-center",
                orderable: true,
            },
            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='text-secondary _revisar' title='Revisar'><i class='fa fa-eye'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "</div>",
                ].join(""),
            },

        ], rowCallback: function (row, data, index) {
            $("._revisar", row).click(function () {
                revisarSolicitud(data);
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
                        .addClass("compact");
                },
            },
        ],
    });

}

$(document).ready(function () {
    $(".yearpicker").yearpicker({
        year: 2017,
        startYear: 2012,
        endYear: 2030
    });
});

closeModalRevision = () => {
    $("#ModalRevisar").hide();
}

revisarSolicitud = (data) => {
    console.log("data", data)
    $("#ModalRevisar").show();
    document.getElementById("anio").value = data.anio;
    document.getElementById("idSolicitud").value = data.idSolicitud;
    document.getElementById("semestre").innerHTML = `<option>${data.semestre == 1 ? 'Primero' : 'Segundo'}</option>`;
    document.getElementById("semillero").value = data.nombreSemillero;
    document.getElementById("docente").value = data.nombreDocente;
    document.getElementById("sigla").value = data.siglaSemillero;
    document.getElementById("horas_solicitadas").value = data.horasCantidad;
    document.getElementById("tipo_docente").textContent = `Solicitud docente de ${capitalize(data.horasDescripcion)}`;
}

rechazar = () => {
    updateSolicitud("Rechazada");
}
autorizar = () => {
    updateSolicitud("Autorizada");
}

updateSolicitud = (estado) => {
    let data = {
        idSolicitud: VAL("idSolicitud"),
        estado: estado
    }
    fetch("../../back/controller/Solicitud_horasControllerAdmin.php", POST(data))
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function (data) {
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            cargarSolicitudes();
            closeModalRevision();
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