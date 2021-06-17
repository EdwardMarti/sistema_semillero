$(document).ready(function() {
    semille = Utilitario.getLocal('id_semillero');

    $("#btnLnRegC2").hide();
    $("#btnLnActC2").hide();
    $("#btnLnRegU2").hide();
    $("#btnLnActU2").hide();
    $("#btnLnRegF2").hide();
    $("#btnLnActF2").hide();
    //--------Btn off antes insert----------------
    iniciarValidacionTablas2();

    $("#modalRegistro2").hide();
    $("#ModalTablas2").show();

    iniciarTablaProyectos2();
    obtenerDatosProyectos2();
    iniciarTablaUsuario2();
    iniciarTablaCooinvestigadores2();
    iniciarTablaFuentes2();
    //--------Tablas----------------

});

function iniciarValidacionTablas2() {
    let idP = $('#id_proyecto2').val()
    if (idP === "") {
        $('#btn_coinvestigadores2').hide()
        $('#btn_usuarios2').hide()
        $('#btn_otros2').hide()
        $('#btn_objetivos2').hide()
        $('#btn_fuentes2').hide()
    } else {
        $('#btn_coinvestigadores2').show()
        $('#btn_usuarios2').show()
        $('#btn_otros2').show()
        $('#btn_objetivos2').show()
        $('#btn_fuentes2').show()
    }
}

function iniciarRegistro2() {
    $("#modalRegistro2").show();
    $("#ModalTablas2").hide();
}

function iniciarTablaRegitrarTodo2() {

    $("#modalRegistro2").hide();
    $("#ModalTablas2").show();

    obtenerDatosProyectos2();
}
//----------------------------------TABLA USUARIOS----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTablaUsuario2() {

    //tabla de alumnos
    $("#listadoTablaEstudiantes2").DataTable({
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

function obtenerDatosUsuario2() {
    let data = {
        id: $('#id_proyecto2').val() !== "" ? $('#id_proyecto2').val() : "0",
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
            llenarTablaUsuarios2(data.EstudianteP);
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

function llenarTablaUsuarios2(data) {

    let tabla = $("#listadoTablaEstudiantes2").DataTable();
    tabla.data().clear();
    tabla.rows.add(data).draw();
}

//----------------------------------TABLA COOINVESTIGADORES----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTablaCooinvestigadores2() {

    //tabla de alumnos
    $("#listadoTablaCooinvestigadores2").DataTable({
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

function obtenerDatosCooinvestigadores2() {
    let data = {
        id: $('#id_proyecto2').val() !== "" ? $('#id_proyecto2').val() : "0",
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
            llenarTablaCooinvestigadores2(data.Colaborador);
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

function llenarTablaCooinvestigadores2(data) {

    let tabla = $("#listadoTablaCooinvestigadores2").DataTable();
    tabla.data().clear();
    tabla.rows.add(data).draw();
}

//----------------------------------TABLA FUENTE----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTablaFuentes2() {

    //tabla de alumnos
    $("#listadoTablaFuentes2").DataTable({
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

function obtenerDatosFuentes2() {
    let data = {
        id: $('#id_proyecto2').val() !== "" ? $('#id_proyecto2').val() : "0",
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
            llenarTablaFuentes2(data.Fuente);
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

function llenarTablaFuentes2(data) {

    let tabla = $("#listadoTablaFuentes2").DataTable();
    tabla.data().clear();
    tabla.rows.add(data).draw();
}

/**
 * @method obtenerDatosSelectLineas2
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function obtenerDatosSelectLineas2() {
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
            selectLineas2(data.linea_sem);
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
 * @method selectLineas2
 * construye y agrega los tipos al contenedor
 */
function selectLineas2(lineas) {
    $("#linea_investigacion2").empty();
    let input = $("#linea_investigacion2");
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
 * @method obtenerDatosSelectLineas2
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function RegistrarData2() {

    let data = {
        titulo: $('#titulo2').val(),
        investigador: $('#inv_principal2').val(),
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
            $('#id_proyecto2').val(data.id);
            $('#btn_coinvestigadores2').show();
            $('#btn_usuarios2').show();
            $('#btn_otros2').show();
            $('#btn_objetivos2').show();
            $('#btn_fuentes2').show();

//            iniciarTablaRegitrarTodo2();
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

function RegistrarDataOtros2() {

    let data = {
        parte: 1,
        id: $('#id_proyecto2').val(),
        linea_investigacion: $('#linea_investigacion2').val(),
        t_ejecucion: $('#t_ejecucion2').val(),
        fecha_ini: $('#fecha_ini2').val(),
        fecha_fin: "-1",
        resumen: $('#resumen2').val(),
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

function RegistrarDataObj2() {

    let data = {
        parte: 2,
        id: $('#id_proyecto2').val(),
        obj_general: $('#btn_fuentes2').val(),
        obj_especifico: $('#obj_especifico2').val(),
        resultados: $('#resultados2').val(),
        costo: $('#costo2').val(),
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
 * @method registrarCooinvestigadores2
 */

function registrarCooinvestigadores2() {

    let data = {
        nombre: $('#primer_input2').val(),
        codigo: $('#segundo_input2').val(),
        tipo: 1,
        id_proyecto: $('#id_proyecto2').val(),
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
            $('#ModalUsuarios2').modal('hide');
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje, obtenerDatosCooinvestigadores2());
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
 * @method registrarUsuarios2
 */

function registrarUsuarios2() {

    let data = {
        nombre: $('#primer_input2').val(),
        codigo: $('#segundo_input2').val(),
        proyecto_id: $('#id_proyecto2').val(),
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
            $('#ModalUsuarios2').modal('hide');
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje, obtenerDatosUsuario2());
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
 * @method registrarFuentes2
 */

function registrarFuentes2() {

    let data = {
        fuente: $('#primer_input2').val(),
        valor: $('#segundo_input2').val(),
        proyecto_id: $('#id_proyecto2').val(),
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
            $('#ModalUsuarios2').modal('hide');
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje, obtenerDatosFuentes2());
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

function mostrarModalUsuarios2(btn, pi, si) {
    $('#ModalUsuarios2').modal({ show: true });

    if (btn === 'cooinvestigadores') {
        $("#btnLnRegC2").show();
        $("#btnLnRegU2").hide();
        $("#btnLnRegF2").hide();
        $("#btnLnActC2").hide();
        $("#primer_inp2").text(pi);
        $("#segundo_inp2").text(si);
    } else if (btn === 'estudiantes') {
        $("#btnLnRegU2").show();
        $("#btnLnRegC2").hide();
        $("#btnLnRegF2").hide();
        $("#btnLnActU2").hide();
        $("#primer_inp2").text(pi);
        $("#segundo_inp2").text(si);
    } else {
        $("#btnLnRegF2").show();
        $("#btnLnRegC2").hide();
        $("#btnLnRegU2").hide();
        $("#btnLnActF2").hide();
        $("#primer_inp2").text(pi);
        $("#segundo_inp2").text(si);
    }
}

function cerrarModalUsuarios2() {
    $('#ModalUsuarios2').modal('hide');
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

function obtenerDatosProyectos2() {
    let semi = {
        id: Utilitario.getLocal('id_semillero'),
    };
    fetch("../../back/controller/ProyectosController_List_id_Ejecucion.php", {
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
            console.log(data.projectos.length);
            if (data.projectos.length > 0)
                listadoEspecialProyectos2(data.projectos);
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

function listadoEspecialProyectos2(Proyectos) {

    let tabla = $("#listadoProyectosTabla2").DataTable();
    tabla.data().clear();
    tabla.rows.add(Proyectos).draw();
}

function iniciarTablaProyectos2() {

    //tabla de alumnos
    $("#listadoProyectosTabla2").DataTable({
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
                gestionarPro2(data);
            });
            $(".eliminarpro", row).click(function() {
                DeleteProE(id_order, index, persona_id_id);
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


function DeleteProE(id_order, id_proCap) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registros ',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar este Registro?',
        function() {
            eliminarProyecE(id_order, id_proCap);
        }
    );
}


function eliminarProyecE(id) {


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

             obtenerDatosProyectos2();
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



function gestionarPro2(data) {
    $('#id_proyecto2').val(data.id);
    $("#modalRegistro2").show();
    $("#ModalTablas2").hide();

    iniciarValidacionTablas2();
    //--------Data Tablas----------------
    obtenerDatosUsuario2();
    obtenerDatosCooinvestigadores2();
    obtenerDatosFuentes2();
    //--------Data Select----------------
    obtenerDatosSelectLineas2();

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
            llenarFormWithData2(data.projectos);
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

function llenarFormWithData2(data) {
    $('#titulo2').val(data[0].titulo);
    $('#inv_principal2').val(data[0].investigador);
    /* Otros Datos */
    $('#linea_investigacion2').val(data[0].linea_investigacion);
    $('#t_ejecucion2').val(data[0].tiempo_ejecucion);
    $('#fecha_ini2').val(data[0].fecha_ini);
    $('#fecha_fin').val(data[0].fecha_fin);
    $('#resumen2').val(data[0].resumen);
    /* Objetivos */
    $('#btn_fuentes2').val(data[0].obj_general);
    $('#obj_especifico2').val(data[0].obj_especifico);
    $('#resultados2').val(data[0].resultados);
    $('#costo2').val(data[0].costo_valor);
}