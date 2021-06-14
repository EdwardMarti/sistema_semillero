$(document).ready(function() {
    iniciarTabla();
    obtenerDatos();
//    cargarSelectInspector();
    perfilUser(2);

});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTabla() {

    //tabla de alumnos
    $("#listadoSemilleroTabla").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "No hay semilleros para mostrar...",
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
                data: "id",
                className: "text-center",
                orderable: true,
                visible: false,
            },
            {
                data: "nombre",
                className: "text-center",
                orderable: true,
            },
            {
                data: "sigla",
                className: "text-center",
                orderable: true,
            },
            
            {
                data: "fecha_creacion",
                className: "text-center",
                orderable: true,
            },
             {
                data: "grupo_investigacion_id",
                className: "text-center",
                orderable: true,
            },
             {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='personalizado actualizar' title='Gestionar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='personalizado eliminar' title='Eliminar'><i class='fa fa-trash'></i>&nbsp; &nbsp;  &nbsp;</a>",

                    "</div>",
                ].join(""),
            },
        
        ],rowCallback: function(row, data, index) {
            var id_order = data.id

            $(".actualizar", row).click(function() {
                gestionarItem(id_order);
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

function perfilUser(perfil){

    if(perfil==1){
   
    $("#AvalSemilleroDir").show();
    $("#AvalSemilleroDir1").show();
    $("#AvalSemilleroGrup").hide();
    $("#AvalSemilleroGrup1").hide();
    $("#AvalSemilleroPlan").hide();
    $("#AvalSemilleroPlan1").hide();
    }
    if(perfil==2){
    $("#AvalSemilleroGrup").show();
    $("#AvalSemilleroGrup1").show();
    $("#AvalSemilleroDir").hide();
    $("#AvalSemilleroDir1").hide();
    $("#AvalSemilleroPlan").hide();
    $("#AvalSemilleroPlan1").hide();
    }
    if(perfil==3){
    $("#AvalSemilleroPlan").show();
    $("#AvalSemilleroPlan1").show();
    $("#AvalSemilleroGrup").hide();
    $("#AvalSemilleroGrup1").hide();
    $("#AvalSemilleroDir").hide();
    $("#AvalSemilleroDir1").hide();
    }
    
}

function gestionarItem(id_order) {
    cargarInfoSemillero(id_order);
//    cargasrTutor(id_order);
   
}

function mostrarModalP() {
    
   $('#myModalRegistro').modal({show: true});
    $("#btnOrderReg").show();
    $("#btnOrderAct").hide();
}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function cerrarModalP() {
     $('#myModalRegistro').modal('hide');
}

function cargarInfoSemillero(id_order) {
    
    let semillero = {
        id: id_order,
  
    };
    fetch("../../back/controller/SemilleroController_List_id.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
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
//            console.log(data.semillero,'data  semillero');
            dataItem(data.semillero);
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
function dataItem( data) {
//    alert(data[0].correoD);

    $('#id').val(data[0].id);
    $('#nombre').val(data[0].nombre);
    $('#sigla').val(data[0].sigla);
    $('#grupo_investigacion').val(data[0].grupo_investigacion_id);
    $('#departamentos').val(data[0].departamento);
    $('#facultades').val(data[0].facultad);
    $('#p_estudio').val(data[0].p_estudio);
    $('#fecha').val(data[0].fecha_creacion);
    $('#nombreD').val(data[0].nombreD);
    $('#correoD').val(data[0].correoD);
    $('#telefonoD').val(data[0].telefonoD);
    $('#tp_vinculacion').val(data[0].tp_vinculacion);
//    $('#fecha').val(data.inspector).change();

 mostrarModalP();
}

function cargarInfoTutor(id_order) {
    let semillero = {
        id: id_order,
  
    };
    fetch("../../back/controller/SemilleroController_List_id.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
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
            console.log(data.semillero,'data  semillero');
            dataItem(data.semillero);
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
function dataItemTutor( data) {
//    alert(data[0].id);
    $('#id').val(data[0].id);
    $('#nombre').val(data[0].nombre);
    $('#sigla').val(data[0].sigla);
    $('#grupo_investigacion').val(data[0].grupo_investigacion_id);
    $('#departamentos').val(data[0].departamento);
    $('#facultades').val(data[0].facultad);
    $('#p_estudio').val(data[0].p_estudio);
    $('#fecha').val(data[0].fecha_creacion);
//    $('#fecha').val(data.inspector).change();

 mostrarModalP();
}
//----------------------------------CRUD----------------------------------
/**
 * @method obtenerDatos
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function obtenerDatos() {
    Utilitario.agregarMascara();
    fetch("../../back/controller/SemilleroController_List_p.php", {
            method: "GET",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
//                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
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
            listadosemillero_p(data.semillero_p);
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


function listadosemillero_p(semillero_p) {

    let tabla = $("#listadoSemilleroTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(semillero_p).order( [ 0, 'asc' ] ).draw();
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

function AvalSemillero_Dir(flag) {
    
   
     let aval = {
        idSem: $('#id').val(),
          flag: flag,
       };
    Utilitario.agregarMascara();
    fetch("../../back/controller/SemilleroController_Update.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
//                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
            body: JSON.stringify(aval),
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
                cerrarModalP();
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
function AvalSemilleroGrup(flag) {

    let aval = {
        idSem: $('#id').val(),
          flag: flag,
       };
    Utilitario.agregarMascara();
    fetch("../../back/controller/SemilleroController_Update.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
//                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
            body: JSON.stringify(aval),
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
                cerrarModalP();
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
function AvalSemilleroPlan(flag) {

    let aval = {
        idSem: $('#id').val(),
          flag: flag,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/SemilleroController_Update.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
//                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
            body: JSON.stringify(aval),
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
                cerrarModalP();
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
function cargarSelectDepartamentos() {
    let facultades = {
        facultad: $('#facultad').val(),
  
    };
    fetch("../../back/controller/DepartamentoController_List_id.php", {
            method: "GET",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                 Plataform: "web",
            },
            body: JSON.stringify(facultades),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            construirSelectgrupos_investigacion(data.grupos_investigacion);
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
function construirSelectgrupos_investigacion(grupos_investigacion) {
    $("#departamentos").empty();
    let input = $("#departamentos");
    for (let index = 0; index < grupos_investigacion.length; index++) {
        let grupos = grupos_investigacion[index],
            opcion = new Option(grupos.descripcion, grupos.id);
        $(opcion).html(grupos.descripcion);
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


