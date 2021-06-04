$(document).ready(function() {
    iniciarTablaL();
//    obtenerDatosL();

});


/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTablaL() {

    //tabla de alumnos
    $("#listadoTablaLs").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "Sin Ordenes...",
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
                data: "numero_acta",
                className: "text-center",
                orderable: true,
            },
            {
                data: "contador",
                className: "text-center",
                orderable: true,
            },
            {
                data: "nominspector",
                className: "text-center",
                orderable: true,
            },

            {
                data: "nombre",
                className: "text-center",
                orderable: true,
            },
            {
                data: "municipio",
                className: "text-center",
                orderable: true,
            },
            {
                data: "direccion",
                className: "text-center",
                orderable: true,
            },
            {
                data: "estado",
                className: "text-center",
                orderable: true,
            },
            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='personalizado actualizar' title='Gestionar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
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
                DeleteOrder(id_order, index);
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

function obtenerDatosL() {
    Utilitario.agregarMascara();
    fetch("../../back/controller/OrdenesController_list.php", {
            method: "GET",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            listadoLi(data.lineas);
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


function listadoLi(lineas) {

    let tabla = $("#listadoSemilleroTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(semillero_p).order( [ 0, 'asc' ] ).draw();
}

//<editor-fold defaultstate="collapsed" desc="CRUD">

function registrarOrder() {

    let ordenes = {
        nombre: $('#nombre_order').val(),
        medidor: $('#medidor').val(),
        codigo: $('#codigo').val(),
        municipio: $('#municipio').val(),
        barrio: $('#barrio').val(),
        direccion: $('#direccion').val(),
        telefono: $('#phone').val(),
        ruta: $('#ruta').val(),
        estado: "2",
        nominspector: $("#inspectores option:selected").text(),
        inspector: $('#inspectores').val(),
    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/OrdenesController_insert.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
            body: JSON.stringify(ordenes),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {

            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            obtenerDatos();
            ocultarModalOrdenes();
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



function UpdateOrder() {

    let order = {
        id: $('#idOrder').val(),
        nombre: $('#nombre_order').val(),
        codigo: $('#codigo').val(),
        medidor: $('#medidor').val(),
        municipio: $('#municipio').val(),
        barrio: $('#barrio').val(),
        direccion: $('#direccion').val(),
        telefono: $('#phone').val(),
        ruta: $('#ruta').val(),
        estado: "1",
        inspector: $('#inspector').val(),
        //        pensum_id: '1',
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/OrdenesController_update.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
            body: JSON.stringify(order),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {

            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            obtenerDatos();
            ocultarModalOrdenes();
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



function DeleteOrder(id) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Orden',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar la Orden?',
        function() {
            eliminarOrden(id);
        }
    );
}


/**
 * @method AlumnoEliminar
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarRangos(id) {

    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/OrdenesController_delete.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
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

            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);

            ocultarModalOrdenes()();
            obtenerDatos();
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

//<editor-fold defaultstate="collapsed" desc="Select">
function cargarSelectLineas(dpto) {
    let dptos = {
        id: dpto,
      };
    fetch("../../back/controller/Linea_investigacionController_ListId.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                 Plataform: "web",
            },
            body: JSON.stringify(dptos),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            construirSelectlineas(data.li_inv);
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
        });
}

/**
 * @method construirSelectNacionalidad
 * construye y agrega los tipos al contenedor
 */
function construirSelectlineas(li_inv) {
            $("#lineas_investigacion").empty();
    let input = $("#lineas_investigacion");
     let opcion = new Option("SELECCIONE", "-1");
        $(opcion).html("SELECCIONE");
        input.append(opcion);
    
  
    for (let index = 0; index < li_inv.length; index++) {
        let li_invs = li_inv[index],
            opcion = new Option(li_invs.descripcion, li_invs.id);
        $(opcion).html(li_invs.descripcion);
        input.append(opcion);
    }


}

//</editor-fold>
