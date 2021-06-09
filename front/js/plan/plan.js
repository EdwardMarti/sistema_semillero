$(document).ready(function() {
    semille='2';
//    iniciarTabla();
//    obtenerDatos();

cargarSelectLineas(semille);
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
function mostrarModalPublicaciones() {
//    limpiarcampos();
   $('#myModalPublicaciones').modal({show: true});
    $("#btnOrderReg").show();
    $("#btnOrderAct").hide();
}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function cerrarModalPublicaciones() {
     $('#myModalPublicaciones').modal('hide');
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
//                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
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

function registrarLineaP() {

    let ordenes = {
        lineas_investigacion2: $('#lineas_investigacion2').val(),
        responsable: $('#responsable').val(),
      
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
//            obtenerDatos();
//            ocultarModalOrdenes();
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
function cargarSelectPlan() {

    fetch("../../back/controller/Plan_estudiosController_List.php", {
            method: "GET",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
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
            construirSelectDepartamentos(data.plan);
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
function construirSelectPlan(planes) {
    $("#departamentos").empty();
    let input = $("#departamentos");
    for (let index = 0; index < planes.length; index++) {
        let plan = planes[index],
            opcion = new Option(plan.descripcion, plan.id);
        $(opcion).html(plan.descripcion);
        input.append(opcion);
    }


}

//</editor-fold>


//<editor-fold defaultstate="collapsed" desc="Modales">


function mostrarModalLineas() {
    
   $('#ModalLineas').modal({show: true});
    $("#btnLnReg").show();
    $("#btnLnAct").hide();
}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function cerrarModalLineas() {
     $('#ModalLineas').modal('hide');
}


//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Select">

//<editor-fold defaultstate="collapsed" desc="Select Areas">
function cargarSelectArea() {
  
    fetch("../../back/controller/AreaController_List.php", {
                 method: "GET",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
//                Authorization: JSON.parse(Utilitario2.getLocal("user")).token,
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
            construirSelectArea(data.areaS);
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
function construirSelectArea(area) {
       $("#area").empty();
    let input = $("#area");
     let opcion = new Option("SELECCIONE", "-1");
        $(opcion).html("SELECCIONE");
        input.append(opcion);
  
    for (let index = 0; index < area.length; index++) {
        let areas = area[index],
            opcion = new Option(areas.descripcion, areas.id);
        $(opcion).html(areas.descripcion);
        input.append(opcion);
    }


}

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Select Disciplina">
function cargarSelectDisciplina(area) {
 
    let disciplina = {
        id: area,
  
    };
    fetch("../../back/controller/DisciplinaController_ListId.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                 Plataform: "web",
            },
            body: JSON.stringify(disciplina),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
//            console.log(data.disciplina);
    
            construirSelectDisciplina(data.disciplina);
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
function construirSelectDisciplina(disciplina) {
        $("#disciplina").empty();
    let input = $("#disciplina");
     let opcion = new Option("SELECCIONE", "-1");
        $(opcion).html("SELECCIONE");
        input.append(opcion);

    for (let index = 0; index < disciplina.length; index++) {
        let disciplinas = disciplina[index],
            opcion = new Option(disciplinas.descripcion, disciplinas.id);
        $(opcion).html(disciplinas.descripcion);
        input.append(opcion);
    }


}

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Select Lineas de Investigacion">
function cargarSelectLineas(dpto) {
   
    let dptos = {
        id: dpto,
      };
    fetch("../../back/controller/Sem_linea_investigacionController_ListId.php", {
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
            console.log(data.linea_sem);
            construirSelectlineas(data.linea_sem);
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
        });
}

/**
 * @method construirSelectNacionalidad
 * construye y agrega los tipos al contenedor
 */
function construirSelectlineas(linea_sem) {
            $("#lineas_investigacion2").empty();
    let input = $("#lineas_investigacion2");
     let opcion = new Option("SELECCIONE", " ");
        $(opcion).html("SELECCIONE");
        input.append(opcion);
    
  
    for (let index = 0; index < linea_sem.length; index++) {
        let li_invs = linea_sem[index],
            opcion = new Option(li_invs.linea, li_invs.id);
        $(opcion).html(li_invs.linea);
        input.append(opcion);
    }


}

//</editor-fold>


//</editor-fold>
