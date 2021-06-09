$(document).ready(function() {
    iniciarTablaEstudiantes();
    iniciarTablaPares();
    iniciarTablaProjectos();
    obtenerDatosEstudiantes();
    //    cargarSelectInspector();
    //    ocultarModalOrdenes();
    /*     $("#btnOrderAct").hide();
        $("#btnOrderReg").hide(); */
});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTablaEstudiantes
 * Metodo para instanciar la DataTable
 */
function iniciarTablaEstudiantes() {

    //tabla de alumnos
    $("#listadoEstudiantesTabla").DataTable({
        responsive: true,
        ordering: false,
        paging: false,
        searching: false,
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
                data: "id",
                className: "text-center",
                visible: false,
            },
            {
                data: "nombre",
                className: "text-center",
                orderable: true,
            },
            {
                data: "persona_id_id",
                className: "text-center",
                visible: false,
            },

            {
                data: "num_documento",
                className: "text-center",
                orderable: true,
            },
            {
                data: "programa_academico",
                className: "text-center",
                orderable: true,
            },
            {
                data: "codigo",
                className: "text-center",
                visible: false,
            },
            {
                data: "semestre",
                className: "text-center",
                orderable: true,
            },
            {
                data: "correo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "telefono",
                className: "text-center",
                orderable: true,
            },
            {
                data: "tipo_docuemnto_id_id",
                className: "text-center",
                visible: false,

            },
            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='personalizado actualizarestu' title='Gestionar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='personalizado eliminarestu' title='eliminar'><i class='fa fa-trash'></i></a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function(row, data, index) {
            var id_order = data.id
            var persona_id_id = data.persona_id_id


            $(".actualizarestu", row).click(function() {
                gestionarEstu(id_order, data, index);
            });
            $(".eliminarestu", row).click(function() {
                DeleteEstu(id_order, index, persona_id_id);
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


/**
 * @method iniciarTablaEstudiantes
 * Metodo para instanciar la DataTable
 */
function iniciarTablaPares() {

    //tabla de alumnos
    $("#listadoParesTabla").DataTable({
        responsive: true,
        ordering: false,
        paging: false,
        searching: false,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "Sin Pares...",
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
                data: "nombre",
                className: "text-center",
                orderable: true,
            },
            {
                data: "numero_docuemnto",
                className: "text-center",
                orderable: true,
            },

            {
                data: "inst_empresa",
                className: "text-center",
                orderable: true,
            },
            {
                data: "correo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "telefono",
                className: "text-center",
                orderable: true,
            },
            {
                data: "persona_id_id",
                className: "text-center",
                visible: false,

            },
            {
                data: "tipo_docuemnto_id_id",
                className: "text-center",
                visible: false,

            },
            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='personalizado actualizarpares' title='Gestionar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='personalizado eliminarpares' title='eliminar'><i class='fa fa-trash'></i></a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function(row, data, index) {
            var id_order = data.id
            var persona_id_id = data.persona_id_id

            $(".actualizarpares", row).click(function() {
                gestionarPares(id_order, data, index);
            });
            $(".eliminarpares", row).click(function() {
                DeletePares(id_order, index, persona_id_id);
            });
        },
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
                extend: "copy",
                className: "btn btn-primary glyphicon glyphicon-duplicate"
            },
            {
                extend: "csv",
                title: "listadoPares",
                className: "btn btn-primary glyphicon glyphicon-save-file"
            },
            {
                extend: "excel",
                title: "listadoPares",
                className: "btn btn-primary glyphicon glyphicon-list-alt"
            },
            {
                extend: "pdf",
                title: "listadoPares",
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

function obtenerDatosEstudiantes() {
    let semi = {
        /*  id: $('#semi_id').val(), */
        docente_id: 2,
    };
    /*   Utilitario.agregarMascara(); */
    console.log(semi);
    fetch("../../back/controller/EstudianteController_list_Semillero.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                /*   Authorization: JSON.parse(Utilitario.getLocal("user")).token, */
                Plataform: "web",
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

            $("#semi_id").val(data.semillero.id);
            $("#semi_nombre").val(data.semillero.nombre);
            $("#semi_grupo").val(data.semillero.grupo_investigacion_id_id);
            $("#semi_sigla").val(data.semillero.sigla);
            $("#semi_inv").val(1);
            if (data.estudiante.length > 0)
                listadoEspecialEstudiantes(data.estudiante);
            if (data.pares.length > 0)
                listadoEspecialPares(data.pares);
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
 * @method listadoEspecialEstudiantes
 * Método que se encarga de listar los alumnos a la tabla.
 *
 * @param {Object} estudiantes Arreglo con los datos de los estudiantes.
 */


function listadoEspecialEstudiantes(estudiantes) {

    let tabla = $("#listadoEstudiantesTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(estudiantes).draw();
}
/**
 * @method listadoEspecialPares
 * Método que se encarga de listar los alumnos a la tabla.
 *
 * @param {Object} orders Arreglo con los datos de las ordenes.
 */


function listadoEspecialPares(pares) {

    let tabla = $("#listadoParesTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(pares).draw();
}

/**
 * @method listadoEspecialProjectos
 * Método que se encarga de listar los alumnos a la tabla.
 *
 * @param {Object} Projectos Arreglo con los datos de los Projectos.
 */


function listadoEspecialProjectos(Projectos) {

    let tabla = $("#listadoProjectosTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(Projectos).draw();
}


/**
 * @method selectInspectores
 * Método que se encarga de listar los alumnos a la tabla.
 *
 * @param {Object} orders Arreglo con los datos de las ordenes.
 */
function selectInspectores(orders) {
    let options = '<option value="-1">SELECCIONE UN ROL</option>';
    orders.forEach(function(ins) {
        options += '<option value="' + ins.id + '">' + ins.nombres + '</option>'
    });
    $('#inspector').html(options);
}

/**
 * @method gestionarItem
 * Método que se encarga de abrir el modal con la info de la fila seleccinada
 *
 * @param {Object} btn id de la fila que se desea visualizar.
 */

async function gestionarPares(id, data, index) {
    let data_tipo_doc = await getDataTipoDoc();
    if (data_tipo_doc.tipo_doc) {
        construirSelect('pares_tipo_docuemnto_id', data_tipo_doc.tipo_doc)
    }
    $('#pares_id').val(id);
    $('#pares_index').val(index);
    $('#pares_persona_id_id').val(data.persona_id_id);
    $('#pares_nombre').val(data.nombre);
    $('#pares_tipo_docuemnto_id').val(data.tipo_docuemnto_id_id);
    $('#pares_num_documento').val(data.numero_docuemnto);
    $('#pares_empresa').val(data.inst_empresa);
    $('#pares_telefono').val(data.telefono);
    $('#pares_correo').val(data.correo);

    Utilitario.validForm(['pares_nombre', 'pares_telefono', 'pares_tipo_docuemnto_id',
        'pares_num_documento', 'pares_empresa', 'pares_correo'
    ]);
    $("#btnParesAct").show();
    $("#btnParesReg").hide();
    $('#myModalPares').modal({ show: true });
}
/**
 * @method gestionarItem
 * Método que se encarga de abrir el modal con la info de la fila seleccinada
 *
 * @param {Object} btn id de la fila que se desea visualizar.
 */

async function gestionarEstu(id, data, index) {
    let data_plan = await getDataPlan();
    if (data_plan.plan) {
        construirSelect('estu_programa_academico', data_plan.plan)
        $("#estu_programa_academico option:contains(" + data.programa_academico + ")").attr('selected', 'selected');
    }
    let data_tipo_doc = await getDataTipoDoc();
    if (data_tipo_doc.tipo_doc) {
        construirSelect('estu_tipo_docuemnto_id', data_tipo_doc.tipo_doc)
        $('#estu_tipo_docuemnto_id').val(data.tipo_docuemnto_id_id);
    }

    $('#estu_id').val(id);
    $('#estu_index').val(index);
    $('#estu_persona_id_id').val(data.persona_id_id);
    $('#estu_nombre').val(data.nombre);

    $('#estu_num_documento').val(data.num_documento);
    $('#estu_codigo').val(data.codigo);
    $('#estu_semestre').val(data.semestre);

    $('#estu_telefono').val(data.telefono);
    $('#estu_correo').val(data.correo);

    Utilitario.validForm(['estu_correo', 'estu_telefono', 'estu_nombre',
        'estu_codigo', 'estu_semestre', 'estu_programa_academico',
        'estu_tipo_docuemnto_id', 'estu_num_documento'
    ]);

    $("#btnEstuAct").show();
    $("#btnEstuReg").hide();
    $('#myModalEstudiantes').modal({ show: true });
}

/**
 * @method mostrarModalOrdenes
 * Método que se encarga de abrir el modal para registro o actualizacion
 */
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

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function ocultarModalOrdenes() {
    $('#myModal_puesto').modal({ show: true });
}

/**
 * @method limpiarcampos
 * Método que se encarga de limpiar los campos del modal para registro o actualizacion
 */
function limpiarcampos() {
    $('#idOrder').val('');
    $('#nombre_order').val('');
    $('#medidor').val('');
    $('#acta').val('');
    $('#municipio').val('');
    $('#barrio').val('');
    $('#direccion').val('');
    $('#phone').val('');
    $('#inspectores').val('');
}

//-------------------------------HELPERS INPUTS-------------------------------

function validar_order() {
    if (($('#nombre_order').val() == '' || $('#nombre_order').val().length < 6) ||
        ($('#medidor').val() == '' || $('#medidor').val().length < 1) ||
        ($('#municipio').val() == '' || $('#municipio').val().length < 3) ||
        ($('#barrio').val() == '' || $('#barrio').val().length <= 3) ||
        ($('#direccion').val() == '' || $('#direccion').val().length < 3) ||
        ($('#phone').val() == '' || $('#phone').val().length < 1) ||
        ($('#inspector').val() == "1" || $('#inspector').val() == null)) {
        $("#btnOrderAct").prop("disabled", true);
        $("#btnOrderReg").prop("disabled", true);
    } else {
        $("#btnOrderAct").prop("disabled", false);
        $("#btnOrderReg").prop("disabled", false);
    }
}

/**
 * @method validarNombre
 * Método que se encarga de validar el campo de nombre.
 */
function validar_order_fields(idinput, size) {
    let input = $("#" + idinput);
    if (input.val() == "" || input.val().length < size) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
    }
    validar_order();
}
/**
 * @method validar_medidor_order
 * Método que se encarga de validar el campo de nombre.
 */
function validar_medidor_order() {
    let input = $("#medidor");

    if (input.val() === "" || input.val().length < 1) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
    }
    validar_order()
}
/**
 * @method validar_acta_order
 * Método que se encarga de validar el campo de nombre.
 */
function validar_acta_order() {
    let input = $("#nombre_order");

    if (input.val() === "" || input.val().length < 1) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
        $("#btnOrderAct").prop("disabled", true);
        $("#btnOrderReg").prop("disabled", true);
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        $("#btnOrderAct").prop("disabled", false);
        $("#btnOrderReg").prop("disabled", false);
    }
}
/**
 * @method validar_municipio_order
 * Método que se encarga de validar el campo de nombre.
 */
function validar_municipio_order() {
    let input = $("#municipio");

    if (input.val() === "" || input.val().length <= 3) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
        $("#btnOrderAct").prop("disabled", true);
        $("#btnOrderReg").prop("disabled", true);
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        $("#btnOrderAct").prop("disabled", false);
        $("#btnOrderReg").prop("disabled", false);
    }
}
/**
 * @method validar_barrio_order
 * Método que se encarga de validar el campo de nombre.
 */
function validar_barrio_order() {
    let input = $("#barrio");

    if (input.val() === "" || input.val().length <= 3) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
        $("#btnOrderAct").prop("disabled", true);
        $("#btnOrderReg").prop("disabled", true);
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        $("#btnOrderAct").prop("disabled", false);
        $("#btnOrderReg").prop("disabled", false);
    }
}
/**
 * @method validar_direccion_order
 * Método que se encarga de validar el campo de nombre.
 */
function validar_direccion_order() {
    let input = $("#direccion");

    if (input.val() === "" || input.val().length <= 3) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
        $("#btnOrderAct").prop("disabled", true);
        $("#btnOrderReg").prop("disabled", true);
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        $("#btnOrderAct").prop("disabled", false);
        $("#btnOrderReg").prop("disabled", false);
    }
}
/**
 * @method validar_phone_order
 * Método que se encarga de validar el campo de nombre.
 */
function validar_phone_order() {
    let input = $("#phone");

    if (input.val() === "" || input.val().length < 1) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
        $("#btnOrderAct").prop("disabled", true);
        $("#btnOrderReg").prop("disabled", true);
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        $("#btnOrderAct").prop("disabled", false);
        $("#btnOrderReg").prop("disabled", false);
    }
}
/**
 * @method validar_inspectores_order
 * Método que se encarga de validar el campo de nombre.
 */
function validar_inspectores_order() {
    let input = $("#inspector");

    if (input.val() === "-1" || $('#inspector').val() == null) {
        input.removeClass("is-valid");
        input.addClass("is-invalid");
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
    }
    validar_order()
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



function DeleteEstu(id, index, persona_id_id) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Estudiante',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar el Estudiante?',
        function() {
            eliminarEstu(id, index, persona_id_id);
        }
    );
}

function DeletePares(id, index, persona_id_id) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Par Academico',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar el Par Academico?',
        function() {
            eliminarPares(id, index, persona_id_id);
        }
    );
}

// data plan de estudios
async function getDataPlan() {
    let departamento = {
        dptos: "",
    };
    let res = await fetch("../../back/controller/Plan_estudiosController_List.php", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Plataform: "web",
        },
        body: JSON.stringify(departamento),
    })
    return await res.json();
}
// data plan de estudios
async function getDataTipoDoc() {
    let res = await fetch("../../back/controller/Tipo_docuemntoControllerList.php", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
            Plataform: "web",
        },
    })
    return await res.json();
    // $.ajax({
    //     url: '../../back/controller/Tipo_docuemntoControllerList.php',
    //     type: "POST",
    //     dataType: 'application/json; charset=utf-8',
    //     success: function(data) {
    //         return data;
    //     }
    // });
}


//<editor-fold defaultstate="collapsed" desc="Select plan de estudio">
function cargarSelectPlan(dpto) {
    let departamento = {
        dptos: dpto,

    };
    fetch("../../back/controller/Plan_estudiosController_List.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                Plataform: "web",
            },
            body: JSON.stringify(departamento),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            construirSelectPlan(data.plan);
        })
        .catch(function(promise) {
            if (promise.json) {
                promise.json().then(function(response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function() {
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
 * @method construirSelectNacionalidad
 * construye y agrega los tipos al contenedor
 */
function construirSelectPlan(planes) {
    $("#p_estudio").empty();
    let input = $("#p_estudio");
    let opcion = new Option("SELECCIONE", "-1");
    $(opcion).html("SELECCIONE");
    input.append(opcion);
    for (let index = 0; index < planes.length; index++) {
        let plan = planes[index],
            opcion = new Option(plan.descripcion, plan.id);
        $(opcion).html(plan.descripcion);
        input.append(opcion);
    }
}

//</editor-fold>
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
function cargarSelectInspector() {

    fetch("../../back/controller/InspectorController_listAll.php", {
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
            construirSelectInspector(data.inspector);
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
function construirSelectInspector(inspectores) {
    $("#inspector").empty();
    let input = $("#inspector");
    for (let index = 0; index < inspectores.length; index++) {
        let inspector = inspectores[index],
            opcion = new Option(inspector.nombre, inspector.id);
        $(opcion).html(inspector.nombre);
        input.append(opcion);
    }


}

//</editor-fold>


/**
 * @method DeleteOrder
 * Método que se encarga de validar el campo de nombre.
 */
function loadDataxls() {
    //Reference the FileUpload element.
    $('#ModalLoadData').modal('show');
    var fileUpload = $("#fileUpload")[0];

    //Validate whether File is valid Excel file.
    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx)$/;
    if (regex.test(fileUpload.value.toLowerCase())) {
        if (typeof(FileReader) != "undefined") {
            var reader = new FileReader();

            //For Browsers other than IE.
            if (reader.readAsBinaryString) {
                reader.onload = function(e) {
                    ProcessExcel(e.target.result);
                };
                reader.readAsBinaryString(fileUpload.files[0]);
            } else {
                //For IE Browser.
                reader.onload = function(e) {
                    var data = "";
                    var bytes = new Uint8Array(e.target.result);
                    for (var i = 0; i < bytes.byteLength; i++) {
                        data += String.fromCharCode(bytes[i]);
                    }
                    ProcessExcel(data);
                };
                reader.readAsArrayBuffer(fileUpload.files[0]);
            }
        } else {
            alert("This browser does not support HTML5.");
        }
    } else {
        alert("Please upload a valid Excel file.");
    }
}

function ProcessExcel(data) {
    //Read the Excel File data.
    var workbook = XLSX.read(data, {
        type: 'binary'
    });
    //Fetch the name of First Sheet.
    var firstSheet = workbook.SheetNames[0];
    //Read all rows from First Sheet into an JSON array.
    var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
    //Add the data rows from Excel file.
    var db = firebase.firestore();
    var batch = db.batch();
    for (var i = 0; i < excelRows.length; i++) {
        batch.set(db.collection('ordenes').doc(), excelRows[i]);
    }
    batch.commit().then(function() {
        return Mensaje.mostrarMsjExito(
            "¡Exito!",
            "Ordenes Cargadas!"
        );
    });
};

async function showModalRegisEstu() {
    let data_plan = await getDataPlan();
    if (data_plan.plan) {
        construirSelect('estu_programa_academico', data_plan.plan)
    }
    let data_tipo_doc = await getDataTipoDoc();
    if (data_tipo_doc.tipo_doc) {
        construirSelect('estu_tipo_docuemnto_id', data_tipo_doc.tipo_doc)
    }
    $("#btnEstuAct").hide();
    $('#myModalEstudiantes').modal('show');
}

/**
 * @method construirSelect
 * construye y agrega los tipos al contenedor
 */
function construirSelect(id_select, data) {
    $("#" + id_select).empty();
    let input = $("#" + id_select)
    let opcion = new Option("SELECCIONE", "");
    input.append(opcion);
    for (let index = 0; index < data.length; index++) {
        let item = data[index],
            opcion = new Option(item.descripcion, item.id);
        input.append(opcion);
    }
}


function registrarEstu() {
    let ordenes = {
        semi_id: $('#semi_id').val(),
        estu_correo: $('#estu_correo').val(),
        estu_telefono: $('#estu_telefono').val(),
        estu_nombre: $('#estu_nombre').val(),
        estu_codigo: $('#estu_codigo').val(),
        estu_semestre: $('#estu_semestre').val(),
        estu_programa_academico: $("#estu_programa_academico option:selected").html(),
        estu_tipo_docuemnto_id: $('#estu_tipo_docuemnto_id').val(),
        estu_num_documento: $('#estu_num_documento').val()
    };

    if (Utilitario.validForm(['estu_correo', 'estu_telefono', 'estu_nombre', 'estu_codigo', 'estu_semestre', 'estu_programa_academico', 'estu_tipo_docuemnto_id', 'estu_num_documento'])) {
        Mensaje.mostrarMsjError("Error", 'parametros incompletos');
        return false;
    }

    Utilitario.agregarMascara();
    fetch("../../back/controller/SemilleroController_insertEstu.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                // Authorization: JSON.parse(Utilitario.getLocal("user")).token,
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
            obtenerDatosEstudiantes();
            cerrarModalEstu();
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

function registrarPares() {
    let ordenes = {
        semi_id: $('#semi_id').val(),
        pares_codigo: $('#pares_codigo').val(),
        pares_nombre: $('#pares_nombre').val(),
        pares_telefono: $('#pares_telefono').val(),
        pares_tipo_docuemnto_id: $('#pares_tipo_docuemnto_id').val(),
        pares_num_documento: $('#pares_num_documento').val(),
        pares_empresa: $('#pares_empresa').val(),
        pares_correo: $('#pares_correo').val(),
    };

    if (Utilitario.validForm(['pares_nombre', 'pares_telefono', 'pares_tipo_docuemnto_id', 'pares_num_documento', 'pares_empresa', 'pares_correo'])) {
        Mensaje.mostrarMsjError("Error", 'parametros incompletos');
        return false;
    }

    Utilitario.agregarMascara();
    fetch("../../back/controller/SemilleroController_insertPares.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                // Authorization: JSON.parse(Utilitario.getLocal("user")).token,
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
            obtenerDatosEstudiantes();
            cerrarModalPares();
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

async function showModalRegisPares() {
    let data_tipo_doc = await getDataTipoDoc();
    if (data_tipo_doc.tipo_doc) {
        construirSelect('pares_tipo_docuemnto_id', data_tipo_doc.tipo_doc)
    }
    $("#btnParesAct").hide();
    $('#myModalPares').modal('show');
}


// function UpdateEstu() {
//     let estu_index = $('#estu_index').val();
//     let info_estu = {
//         estu_id: $('#estu_id').val(),
//         estu_index: $('#estu_index').val(),
//         persona_id_id: $('#estu_persona_id_id').val(),
//         estu_nombre: $('#estu_nombre').val(),
//         estu_telefono: $('#estu_telefono').val(),
//         estu_correo: $('#estu_correo').val(),
//         estu_codigo: $('#estu_codigo').val(),
//         estu_semestre: $('#estu_semestre').val(),
//         estu_programa_academico: $("#estu_programa_academico option:selected").html(),
//         estu_tipo_docuemnto_id: $('#estu_tipo_docuemnto_id').val(),
//         estu_num_documento: $('#estu_num_documento').val()
//     };

//     let update_estu = {
//         id: $('#estu_id').val(),
//         estu_index: $('#estu_index').val(),
//         persona_id_id: $('#estu_persona_id_id').val(),
//         nombre: $('#estu_nombre').val(),
//         telefono: $('#estu_telefono').val(),
//         correo: $('#estu_correo').val(),
//         codigo: $('#estu_codigo').val(),
//         semestre: $('#estu_semestre').val(),
//         programa_academico: $("#estu_programa_academico option:selected").html(),
//         tipo_docuemnto_id_id: $('#estu_tipo_docuemnto_id').val(),
//         num_documento: $('#estu_num_documento').val()
//     };

//     Utilitario.agregarMascara();
//     fetch("../../back/controller/OrdenesController_update.php", {
//             method: "POST",
//             headers: {
//                 Accept: "application/json",
//                 "Content-Type": "application/json",
//                 Authorization: JSON.parse(Utilitario.getLocal("user")).token,
//                 Plataform: "web",
//             },
//             body: JSON.stringify(info_estu),
//         })
//         .then(function(response) {
//             if (response.ok) {
//                 return response.json();
//             }
//             throw response;
//         })
//         .then(function(data) {
//             $('#listadoEstudiantesTabla').DataTable().row(estu_index).data(update_estu).draw();
//             Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
//             obtenerDatos();
//             ocultarModalOrdenes();
//         })
//         .catch(function(promise) {
//             if (promise.json) {
//                 promise.json().then(function(response) {
//                     let status = promise.status,
//                         mensaje = response ? response.mensaje : "";
//                     if (status === 401 && mensaje) {
//                         Mensaje.mostrarMsjWarning("Advertencia", mensaje, function() {
//                             Utilitario.cerrarSesion();
//                         });
//                     } else if (mensaje) {
//                         Mensaje.mostrarMsjError("Error", mensaje);
//                     }
//                 });
//             } else {
//                 Mensaje.mostrarMsjError(
//                     "Error",
//                     "Ocurrió un error inesperado. Intentelo nuevamente por favor."
//                 );
//             }
//         })
//         .finally(function() {
//             Utilitario.quitarMascara();
//         });

// }

function UpdateEstu() {
    let estu_index = $('#estu_index').val();
    let info_estu = {
        estu_id: $('#estu_id').val(),
        estu_index: $('#estu_index').val(),
        persona_id_id: $('#estu_persona_id_id').val(),
        estu_nombre: $('#estu_nombre').val(),
        estu_telefono: $('#estu_telefono').val(),
        estu_correo: $('#estu_correo').val(),
        estu_codigo: $('#estu_codigo').val(),
        estu_semestre: $('#estu_semestre').val(),
        estu_programa_academico: $("#estu_programa_academico option:selected").html(),
        estu_tipo_docuemnto_id: $('#estu_tipo_docuemnto_id').val(),
        estu_num_documento: $('#estu_num_documento').val()
    };

    let update_estu = {
        id: $('#estu_id').val(),
        estu_index: $('#estu_index').val(),
        persona_id_id: $('#estu_persona_id_id').val(),
        nombre: $('#estu_nombre').val(),
        telefono: $('#estu_telefono').val(),
        correo: $('#estu_correo').val(),
        codigo: $('#estu_codigo').val(),
        semestre: $('#estu_semestre').val(),
        programa_academico: $("#estu_programa_academico option:selected").html(),
        tipo_docuemnto_id_id: $('#estu_tipo_docuemnto_id').val(),
        num_documento: $('#estu_num_documento').val()
    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/SemilleroController_UpdateEstu.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                // Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
            body: JSON.stringify(info_estu),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            $('#listadoEstudiantesTabla').DataTable().row(estu_index).data(update_estu).draw();
            cerrarModalEstu();
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
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

function UpdatePares() {

    let pares_index = $('#pares_index').val();
    let info_estu = {
        pares_id: $('#pares_id').val(),
        pares_index: $('#pares_index').val(),
        pares_persona_id_id: $('#pares_persona_id_id').val(),
        pares_nombre: $('#pares_nombre').val(),
        pares_telefono: $('#pares_telefono').val(),
        pares_tipo_docuemnto_id: $('#pares_tipo_docuemnto_id').val(),
        pares_num_documento: $('#pares_num_documento').val(),
        pares_empresa: $('#pares_empresa').val(),
        pares_correo: $('#pares_correo').val(),
    };

    let update_pares = {
        id: $('#pares_id').val(),
        pares_index: $('#pares_index').val(),
        persona_id_id: $('#pares_persona_id_id').val(),
        nombre: $('#pares_nombre').val(),
        telefono: $('#pares_telefono').val(),
        tipo_docuemnto_id_id: $('#pares_tipo_docuemnto_id').val(),
        numero_docuemnto: $('#pares_num_documento').val(),
        inst_empresa: $('#pares_empresa').val(),
        correo: $('#pares_correo').val(),
    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/SemilleroController_UpdateEstu.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                // Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
            body: JSON.stringify(info_estu),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            $('#listadoParesTabla').DataTable().row(pares_index).data(update_pares).draw();
            cerrarModalPares();
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
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
 * @method eliminarEstu
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarEstu(id, index, persona_id_id) {

    let data = { id: id, persona_id_id: persona_id_id };
    Utilitario.agregarMascara();
    fetch("../../back/controller/EstudianteController_DeleteEstu.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                // Authorization: JSON.parse(Utilitario.getLocal("user")).token,
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
            $("#listadoEstudiantesTabla").DataTable().row(index).remove().draw();
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);

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
 * @method eliminarPares
 * Método que se encarga de eliminar el par academico de todas la bd
 */
function eliminarPares(id, index, persona_id_id) {

    let data = { id: id, persona_id_id: persona_id_id };
    Utilitario.agregarMascara();
    fetch("../../back/controller/EstudianteController_Pares_delete.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                // Authorization: JSON.parse(Utilitario.getLocal("user")).token,
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
            $("#listadoParesTabla").DataTable().row(index).remove().draw();
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);

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

function cerrarModalEstu() {
    $('#myModalEstudiantes').modal('hide');
}

function cerrarModalPares() {
    $('#myModalPares').modal('hide');
}


//----------------------------------CRUD----------------------------------
/**
 * @method obtenerDatosProjectos
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function obtenerDatosProjectos() {
    let semi = {
        docente_id: 2,
    };
    fetch("../../back/controller/ProyectosControllerList.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                /*   Authorization: JSON.parse(Utilitario.getLocal("user")).token, */
                Plataform: "web",
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
                listadoEspecialProjectos(data.projectos);
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
                    "Error al traer projectos",
                    "Ocurrió un error inesperado. Intentelo nuevamente por favor."
                );
            }
        })
        .finally(function() {
            Utilitario.quitarMascara();
        });
}

/**
 * @method iniciarTablaProjectos
 * Metodo para instanciar la DataTable
 */
function iniciarTablaProjectos() {

    //tabla de alumnos
    $("#listadoProjectosTabla").DataTable({
        responsive: true,
        ordering: false,
        paging: false,
        searching: false,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "Sin Projectos...",
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
                    "<a class='personalizado actualizarestu' title='Gestionar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='personalizado eliminarestu' title='eliminar'><i class='fa fa-trash'></i></a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function(row, data, index) {
            var id_order = data.id
            var persona_id_id = data.persona_id_id


            $(".actualizarestu", row).click(function() {
                gestionarEstu(id_order, data, index);
            });
            $(".eliminarestu", row).click(function() {
                DeleteEstu(id_order, index, persona_id_id);
            });
        },
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [{
                extend: "copy",
                className: "btn btn-primary glyphicon glyphicon-duplicate"
            },
            {
                extend: "csv",
                title: "listadoProjectos",
                className: "btn btn-primary glyphicon glyphicon-save-file"
            },
            {
                extend: "excel",
                title: "listadoProjectos",
                className: "btn btn-primary glyphicon glyphicon-list-alt"
            },
            {
                extend: "pdf",
                title: "listadoProjectos",
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