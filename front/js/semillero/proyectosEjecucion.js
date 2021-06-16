$(document).ready(function() {
    $("#btnLnRegC").hide();
    $("#btnLnActC").hide();
    $("#btnLnRegU").hide();
    $("#btnLnActU").hide();
    $("#btnLnRegF").hide();
    $("#btnLnActF").hide();
    //--------Btn off antes insert----------------
    let idP = $('#id_proyecto').val()
    if (idP === "") {
        $('#btn_coinvestigadores').hide()
        $('#btn_usuarios').hide()
        $('#btn_otros').hide()
        $('#btn_objetivos').hide()
        $('#btn_fuentes').hide()
    } else {
        $('#btn_coinvestigadores').show()
        $('#btn_usuarios').show()
        $('#btn_otros').show()
        $('#btn_objetivos').show()
        $('#btn_fuentes').show()
    }

    //--------Tablas----------------
    iniciarTablaUsuario();
    iniciarTablaCooinvestigadores();
    iniciarTablaFuentes();
    //--------Data Tablas----------------
    obtenerDatosUsuario();
    obtenerDatosCooinvestigadores();
    obtenerDatosFuentes();
    //--------Data Select----------------
    obtenerDatosSelectLineas();
});

//----------------------------------TABLA USUARIOS----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTablaUsuario() {

    //tabla de alumnos
    $("#listadoTablaEstudiantes").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "No hay estudiantes para mostrar...",
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
                data: "id",
                className: "text-center",
                orderable: true,
                visible: false,
            },
            {
                data: "codigo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "nombre",
                className: "text-center",
                orderable: true,
            },

            {
                data: "proyecto_id",
                className: "text-center",
                orderable: true,
                visible: false,
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
    });

}

/**
 * @method obtenerDatos
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function obtenerDatosUsuario() {
    let data = {
        id: $('#id_proyecto').val() !== "" ? $('#id_proyecto').val() : "0",
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/Estudiante_proyectoController_List_id.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(function(data) {
            llenarTablaUsuarios(data.EstudianteP);
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

function llenarTablaUsuarios(data) {

    let tabla = $("#listadoTablaEstudiantes").DataTable();
    tabla.data().clear();
    tabla.rows.add(data).draw();
}

//----------------------------------TABLA COOINVESTIGADORES----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTablaCooinvestigadores() {

    //tabla de alumnos
    $("#listadoTablaCooinvestigadores").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "No hay cooinvestigadores para mostrar...",
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
                data: "id",
                className: "text-center",
                orderable: true,
                visible: false,
            },
            {
                data: "codigo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "nombre",
                className: "text-center",
                orderable: true,
            },
            {
                data: "tp_colaborador",
                className: "text-center",
                orderable: true,
                visible: false,
            },
            {
                data: "proyecto_id",
                className: "text-center",
                orderable: true,
                visible: false,
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
    });

}

/**
 * @method obtenerDatos
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function obtenerDatosCooinvestigadores() {
    let data = {
        id: $('#id_proyecto').val() !== "" ? $('#id_proyecto').val() : "0",
        tipo: 1,
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/ColaboradorController_List_id.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(function(data) {
            llenarTablaCooinvestigadores(data.Colaborador);
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

function llenarTablaCooinvestigadores(data) {

    let tabla = $("#listadoTablaCooinvestigadores").DataTable();
    tabla.data().clear();
    tabla.rows.add(data).draw();
}

//----------------------------------TABLA FUENTE----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTablaFuentes() {

    //tabla de alumnos
    $("#listadoTablaFuentes").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "No hay fuentes para mostrar...",
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
                data: "id",
                className: "text-center",
                orderable: true,
                visible: false,
            },
            {
                data: "fuente",
                className: "text-center",
                orderable: true,
            },
            {
                data: "valor",
                className: "text-center",
                orderable: true,
            },
            {
                data: "proyecto_id",
                className: "text-center",
                orderable: true,
                visible: false,
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
    });

}

/**
 * @method obtenerDatos
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function obtenerDatosFuentes() {
    let data = {
        id: $('#id_proyecto').val() !== "" ? $('#id_proyecto').val() : "0",
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/Fuente_financiacionController_List_id.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(function(data) {
            llenarTablaFuentes(data.Fuente);
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

function llenarTablaFuentes(data) {

    let tabla = $("#listadoTablaFuentes").DataTable();
    tabla.data().clear();
    tabla.rows.add(data).draw();
}

/**
 * @method obtenerDatosSelectLineas
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function obtenerDatosSelectLineas() {
    let data = {
        id: Utilitario.getLocal('id_semillero'),
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/Sem_linea_investigacionController_ListId.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(function(data) {
            selectLineas(data.linea_sem);
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

/**
 * @method selectLineas
 * construye y agrega los tipos al contenedor
 */
function selectLineas(lineas) {
    $("#linea_investigacion").empty();
    let input = $("#linea_investigacion");
    let opcion = new Option("SELECCIONE", "");
    $(opcion).html("SELECCIONE");
    input.append(opcion);
    for (let index = 0; index < lineas.length; index++) {
        let lineaInv = lineas[index],
            opcion = new Option(lineaInv.linea, lineaInv.id);
        $(opcion).html(lineaInv.linea);
        input.append(opcion);
    }
}

//----------------------------------CRUD----------------------------------
/**
 * @method obtenerDatosSelectLineas
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function RegistrarData() {

    let data = {
        titulo: $('#titulo').val(),
        investigador: $('#inv_principal').val(),
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/ProyectosController_Insert.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(function(data) {
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            $('#id_proyecto').val(data.id);
            $('#btn_coinvestigadores').show();
            $('#btn_usuarios').show();
            $('#btn_otros').show();
            $('#btn_objetivos').show();
            $('#btn_fuentes').show();

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

/**
 * @method actualizarParte1
 */

function RegistrarDataOtros() {

    let data = {
        parte: 1,
        id: $('#id_proyecto').val(),
        linea_investigacion: $('#linea_investigacion').val(),
        t_ejecucion: $('#t_ejecucion').val(),
        fecha_ini: $('#fecha_ini').val(),
        fecha_fin: "null",
        resumen: $('#resumen').val(),
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/ProyectosController_Update.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(function(data) {
            Mensaje.mostrarMsjExito("Actualizacion Exitosa", data.mensaje);
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

/**
 * @method actualizarParte2
 */

function RegistrarDataObj() {

    let data = {
        parte: 2,
        id: $('#id_proyecto').val(),
        obj_general: $('#obj_general').val(),
        obj_especifico: $('#obj_especifico').val(),
        resultados: $('#resultados').val(),
        costo: $('#costo').val(),
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/ProyectosController_Update.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(function(data) {
            Mensaje.mostrarMsjExito("Actualizacion Exitosa", data.mensaje);
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


//----------------------------------Insert Coinvestigadores----------------------------------
/**
 * @method registrarCooinvestigadores
 */

function registrarCooinvestigadores() {

    let data = {
        nombre: $('#primer_input').val(),
        codigo: $('#segundo_input').val(),
        tipo: 1,
        id_proyecto: $('#id_proyecto').val(),
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/ColaboradorController_Insert.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(function(data) {
            $('#ModalUsuarios').modal('hide');
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje, obtenerDatosCooinvestigadores());
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

//----------------------------------Insert Estudiantes----------------------------------
/**
 * @method registrarUsuarios
 */

function registrarUsuarios() {

    let data = {
        nombre: $('#primer_input').val(),
        codigo: $('#segundo_input').val(),
        proyecto_id: $('#id_proyecto').val(),
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/Estudiante_proyectoController_Insert.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(function(data) {
            $('#ModalUsuarios').modal('hide');
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje, obtenerDatosUsuario());
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

//----------------------------------Insert Fuentes----------------------------------

/**
 * @method registrarFuentes
 */

function registrarFuentes() {

    let data = {
        fuente: $('#primer_input').val(),
        valor: $('#segundo_input').val(),
        proyecto_id: $('#id_proyecto').val(),
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/Fuente_financiacionController_Insert.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
        .then(function(response) {
            if (!response.ok) {
                throw response;
            }
            return response.json();
        })
        .then(function(data) {
            $('#ModalUsuarios').modal('hide');
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje, obtenerDatosFuentes());
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

function mostrarModalUsuarios(btn, pi, si) {
    $('#ModalUsuarios').modal({ show: true });

    if (btn === 'cooinvestigadores') {
        $("#btnLnRegC").show();
        $("#btnLnRegU").hide();
        $("#btnLnRegF").hide();
        $("#btnLnActC").hide();
        $("#primer_inp").text(pi);
        $("#segundo_inp").text(si);
    } else if (btn === 'estudiantes') {
        $("#btnLnRegU").show();
        $("#btnLnRegC").hide();
        $("#btnLnRegF").hide();
        $("#btnLnActU").hide();
        $("#primer_inp").text(pi);
        $("#segundo_inp").text(si);
    } else {
        $("#btnLnRegF").show();
        $("#btnLnRegC").hide();
        $("#btnLnRegU").hide();
        $("#btnLnActF").hide();
        $("#primer_inp").text(pi);
        $("#segundo_inp").text(si);
    }
}

function cerrarModalUsuarios() {
    $('#ModalUsuarios').modal('hide');
}