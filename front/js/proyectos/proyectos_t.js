$(document).ready(function() {
    iniciarTabla();
//    obtenerDatos();
//    cargarSelectInspector();
//    ocultarModalOrdenes();
    $("#btnOrderAct").hide();
    $("#btnOrderReg").hide();
});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTabla() {

    //tabla de alumnos
    $("#listadoOrdenesTabla").DataTable({
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

function obtenerDatos() {
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
            listadoEspecialOrdenes(data.ordenes);
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


function listadoEspecialOrdenes(ordenes) {

    let tabla = $("#listadoOrdenesTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(ordenes).draw();
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

function gestionarItem(id_order, data, index) {
    $('#idOrder').val(id_order);
    $('#index_order').val(index);
    $('#nombre_order').val(data.nombre);
    $('#medidor').val(data.contador);
    $('#codigo').val(data.codigo);
    $('#municipio').val(data.municipio);
    $('#barrio').val(data.barrio);
    $('#direccion').val(data.direccion);
    $('#phone').val(data.telefono);
    $('#ruta').val(data.ruta);
    $('#inspector').val(data.inspector).change();




    $("#btnOrderAct").show();
    $("#btnOrderReg").hide();
    $("#modalOrdernes").show();
    $("#tablaOrdenes").hide();
    validar_order_fields('nombre_order', 6);
    validar_order_fields('medidor', 1);

    validar_order_fields('municipio', 3);
    validar_order_fields('barrio', 3);
    validar_order_fields('direccion', 3);
    validar_order_fields('phone', 1);
    validar_inspectores_order();
    validar_order();
}

/**
 * @method mostrarModalOrdenes
 * Método que se encarga de abrir el modal para registro o actualizacion
 */
function mostrarModalProyectos_t() {
//    limpiarcampos();
    $('#myModalProyectos_t').modal({show: true});
    $("#btnOrderReg").show();
    $("#btnOrderAct").hide();
    

}
function cerrarModalProyectos_t() {
    
    $('#myModalProyectos_t').modal('hide');

}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function ocultarModalOrdenes() {
   $('#myModal_puesto').modal({show: true});
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