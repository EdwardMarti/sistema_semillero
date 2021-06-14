$(document).ready(function() {
    id_Semil = '2';
    iniciarTablaPo();
    obtenerDatosPo(id_Semil);

    //  
    //    $("#btnOrderAct").hide();
    //    $("#btnOrderReg").hide();
});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTablaPo() {

    //tabla de alumnos
    $("#listadoPonenciasTabla").DataTable({
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
                data: "nombre_po",
                className: "text-center",
                orderable: true,
            },
            {
                data: "fecha",
                className: "text-center",
                orderable: true,
            },


            {
                data: "nombre_eve",
                className: "text-center",
                orderable: true,
            },
            {
                data: "institucion",
                className: "text-center",
                orderable: true,
            },
            {
                data: "ciudad",
                className: "text-center",
                orderable: true,
            },
            {
                data: "lugar",
                className: "text-center",
                orderable: true,
            },
            {
                data: "tipo_ponencias_id",
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
                gestionarItemPo(id_order, data, index);
            });
            $(".eliminar", row).click(function() {
                DeletePo(id_order, index);
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

function obtenerDatosPo(id) {

    let semillero = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/PonenciasController_list.php", {
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

            listadoTPo(data.ponencias);
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


function listadoTPo(ponencias) {

    let tabla = $("#listadoPonenciasTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(ponencias).draw();
}

//<editor-fold defaultstate="collapsed" desc="Modal Capacitaciones">

function mostrarModalPonencias() {
    //    limpiarcampos();
    $('#myModalPonencias').modal({ show: true });
    $("#btnPonenciaReg").show();
    $("#btnPonenciaAct").hide();
}

function mostrarModalPonenciasU() {
    //    limpiarcampos();
    $('#myModalPonencias').modal({ show: true });
    $("#btnPonenciaReg").hide();
    $("#btnPonenciaAct").show();
}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function cerrarModalPonencias() {
    $('#myModalPonencias').modal('hide');
}

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="CRUD">


function registrarPonencias() {



    let ponencia = {
        nombre_po: $('#nombre_po').val(),
        fecha: $('#fecha').val(),
        nombre_eve: $('#nombre_eve').val(),
        institucion: $('#institucion').val(),
        ciudad: $('#ciudad').val(),
        lugar: $('#lugar').val(),
        tipo_ponencias_id: $('#tipo_ponencias').val(),
        semillero_id: id_Semil,
    };

    if (Utilitario.validForm(['nombre_po', 'fecha', 'nombre_eve', 'institucion', 'ciudad', 'tipo_ponencias'])) {
        Mensaje.mostrarMsjError("Error", 'parametros incompletos');
        return false;
    }

    Utilitario.agregarMascara();
    fetch("../../back/controller/PonenciasController_Insert.php", {

            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                //                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
            body: JSON.stringify(ponencia),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {

            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            obtenerDatosPo(id_Semil);
            cerrarModalPonencias()();
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
                //                Mensaje.mostrarMsjError(
                //                    "Error",
                //                    "Ocurrió un error inesperado. Intentelo nuevamente por favor."
                //                );
            }
        })
        .finally(function() {
            Utilitario.quitarMascara();
        });
}


function gestionarItemPo(id_order) {


    cargarInfoTablaPo(id_order);


}

function cargarInfoTablaPo(id_order) {

    let semillero = {
        id: id_order,

    };
    fetch("../../back/controller/PonenciasController_list_id.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                Plataform: "web",
            },
            body: JSON.stringify(semillero),
        })
        .then(function(response) {
            //          
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            //         
            dataItemTablaPon(data.ponencias2);
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
                //                Mensaje.mostrarMsjError(
                //                    "Error",
                //                    "Ocurrió un error inesperado. Intentelo nuevamente por favor. aa"
                //                );
            }
        });
}

function dataItemTablaPon(data) {

    $('#id').val(data[0].id);
    $('#nombre_po').val(data[0].nombre_po);
    $('#fecha').val(data[0].fecha);
    $('#nombre_eve').val(data[0].nombre_eve);
    $('#institucion').val(data[0].institucion);
    $('#ciudad').val(data[0].ciudad);
    $('#lugar').val(data[0].lugar);
    $('#tipo_ponencias').val(data[0].tipo_ponencias_id);


    mostrarModalPonenciasU();
}


function ActualizarDataPo() {

    let ponencia = {
        id: $('#id').val(),
        nombre_po: $('#nombre_po').val(),
        fecha: $('#fecha').val(),
        nombre_eve: $('#nombre_eve').val(),
        institucion: $('#institucion').val(),
        ciudad: $('#ciudad').val(),
        lugar: $('#lugar').val(),
        tipo_ponencias_id: $('#tipo_ponencias').val(),
        semillero_id: id_Semil,

    };
    if (Utilitario.validForm(['tipo_ponencias', 'nombre_po', 'nombre_eve', 'institucion', 'ciudad', 'lugar'])) {
        Mensaje.mostrarMsjError("Error", 'parametros incompletos');
        return false;
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/PonenciasController_Update.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",

                Plataform: "web",
            },
            body: JSON.stringify(ponencia),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {

            Mensaje.mostrarMsjExito("Datos Actualizados", data.mensaje);
            obtenerDatosPo(id_Semil);
            cerrarModalPonencias();
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



function DeletePo(id) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registro',
        'Este proceso es irreversible , ¿esta seguro que desea este Registro?',
        function() {
            eliminarPonencia(id);
        }
    );
}


/**
 * @method AlumnoEliminar
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarPonencia(id) {

    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/PonenciasController_Delete.php", {
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

            obtenerDatosPo(id_Semil);

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