$(document).ready(function() {
    semille = Utilitario.getLocal('id_semillero');

    $("#btnLnRegC").hide();
    $("#btnLnActC").hide();
    $("#btnLnRegU").hide();
    $("#btnLnActU").hide();
    $("#btnLnRegF").hide();
    $("#btnLnActF").hide();
    //--------Btn off antes insert----------------
    iniciarValidacionTablas();

    $("#modalRegistro").hide();
    $("#ModalTablas").show();

    iniciarTablaProyectos();
    obtenerDatosProyectos();
    iniciarTablaUsuario();
    iniciarTablaCooinvestigadores();
    iniciarTablaFuentes();
    //--------Tablas----------------

});

function iniciarValidacionTablas() {
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
}

function iniciarRegistro() {
    $("#modalRegistro").show();
    $("#ModalTablas").hide();
}

function iniciarTablaRegitrarTodo() {

    $("#modalRegistro").hide();
    $("#ModalTablas").show();

    obtenerDatosProyectos();
}
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
                DeleteProT(id_order, index);
            });
        },
    });

}



function DeleteProT(id_order, id_proCap) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registros ',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar este Registro?',
        function() {
            eliminarProyecT(id_order, id_proCap);
        }
    );
}


function eliminarProyecT(id) {


    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/ProyectosController_Delete.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",

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

            obtenerDatosProyectos();
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


/**
 * @method obtenerDatos
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function obtenerDatosCooinvestigadores() {
    let data = {
        id: $('#id_proyecto').val() !== "" ? $('#id_proyecto').val() : "0",
        tipo: 2,
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
            opcion = new Option(lineaInv.linea, lineaInv.descripcion);
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
        id_semillero: Utilitario.getLocal('id_semillero'),
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

//            iniciarTablaRegitrarTodo();
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
        fecha_fin: $('#fecha_fin').val(),
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
        tipo: 2,
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


function mostrarModalProyectos_t() {
    //    limpiarcampos();
    $('#myModalProyectos_t').modal({ show: true });
    $("#btnOrderReg").show();
    $("#btnOrderAct").hide();


}

function cerrarModalProyectos() {

    $('#myModalProyectos').modal('hide');
    //    $('#myModalProyectos').modal({show: true});
    //    $("#btnOrderReg").show();
    //    $("#btnOrderAct").hide();


}

function obtenerDatosProyectos() {
    let semi = {
        id: Utilitario.getLocal('id_semillero'),
    };
    fetch("../../back/controller/ProyectosController_List_id.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            body: JSON.stringify(semi),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            if (data.projectos.length > 0)
                listadoEspecialProyectos(data.projectos);
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
                //                    "Error al traer projectos",
                //                    "Ocurrió un error inesperado. Intentelo nuevamente por favor."
                //                );
            }
        })
        .finally(function() {
            Utilitario.quitarMascara();
        });
}

function listadoEspecialProyectos(Proyectos) {

    let tabla = $("#listadoProyectosTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(Proyectos).draw();
}

function iniciarTablaProyectos() {

    //tabla de alumnos
    $("#listadoProyectosTabla").DataTable({
        responsive: true,
        ordering: false,
        paging: false,
        searching: false,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "Sin Proyectos...",
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
                visible: false,
            },
            {
                data: "titulo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "investigador",
                className: "text-center",
                orderable: true,
            },
            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='personalizado actualizarpro' title='Gestionar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='personalizado eliminarpro' title='eliminar'><i class='fa fa-trash'></i></a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function(row, data, index) {
            var id_order = data.id
            var persona_id_id = data.persona_id_id

            $(".actualizarpro", row).click(function() {
                gestionarPro(data);
            });
            $(".eliminarpro", row).click(function() {
                DeletePro(id_order, index, persona_id_id);
            });
        },
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
                extend: "copy",
                className: "btn btn-primary glyphicon glyphicon-duplicate"
            },
            {
                extend: "csv",
                title: "listadoProyectos",
                className: "btn btn-primary glyphicon glyphicon-save-file"
            },
            {
                extend: "excel",
                title: "listadoProyectos",
                className: "btn btn-primary glyphicon glyphicon-list-alt"
            },
            {
                extend: "pdf",
                title: "listadoProyectos",
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

function gestionarPro(data) {
    $('#id_proyecto').val(data.id);
    $("#modalRegistro").show();
    $("#ModalTablas").hide();

    iniciarValidacionTablas();
    //--------Data Tablas----------------
    obtenerDatosUsuario();
    obtenerDatosCooinvestigadores();
    obtenerDatosFuentes();
    //--------Data Select----------------
    obtenerDatosSelectLineas();

    infoDataProyectoById(data.id);
}

function infoDataProyectoById(id) {
    let data = {
        id: id,
    }
    Utilitario.agregarMascara();
    fetch("../../back/controller/ProyectosController_List_Project_id.php", {
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
            llenarFormWithData(data.projectos);
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

function llenarFormWithData(data) {
    $('#titulo').val(data[0].titulo);
    $('#inv_principal').val(data[0].investigador);
    /* Otros Datos */
    $('#linea_investigacion').val(data[0].linea_investigacion);
    $('#t_ejecucion').val(data[0].tiempo_ejecucion);
    $('#fecha_ini').val(data[0].fecha_ini);
    $('#fecha_fin').val(data[0].fecha_fin);
    $('#resumen').val(data[0].resumen);
    /* Objetivos */
    $('#obj_general').val(data[0].obj_general);
    $('#obj_especifico').val(data[0].obj_especifico);
    $('#resultados').val(data[0].resultados);
    $('#costo').val(data[0].costo_valor);
}