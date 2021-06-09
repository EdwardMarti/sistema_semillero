$(document).ready(function() {
     id_Semil='2';
    iniciarTablaPu();
    obtenerDatosPu(id_Semil);
//    cargarSelectInspector();
    $("#btnOrderReg").show();
    $("#btnOrderAct").hide();

});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTablaPu
 * Metodo para instanciar la DataTable
 */
function iniciarTablaPu() {

    //tabla de alumnos
    $("#listadoPublicacionesTabla").DataTable({
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
                data: "autor",
                className: "text-center",
                orderable: true,
            },
            {
                data: "titulo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "nombre_medio",
                className: "text-center",
                orderable: true,
            },

            {
                data: "cant_pag",
                className: "text-center",
                orderable: true,
            },
            {
                data: "fecha",
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
                DeleteOrder(id_order, data);
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
 * @method obtenerDatosPu
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */

function obtenerDatosPu(id) {
 
      let semillero = {
        id: id,
  
    };
    
    Utilitario.agregarMascara();
    fetch("../../back/controller/PublicacionesController_List_Id.php", {
            method: "POST",
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
            listadoPublicaciones(data.publicaciones);
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
 * @method listadoPublicaciones
 * Método que se encarga de listar los alumnos a la tabla.
 *
 * @param {Object} orders Arreglo con los datos de las ordenes.
 */


function listadoPublicaciones(publicaciones) {

    let tabla = $("#listadoPublicacionesTabla").DataTable();
    tabla.data().clear();
    tabla.rows.add(publicaciones).draw();
}

/**
 * @method gestionarItem
 * Método que se encarga de abrir el modal con la info de la fila seleccinada
 *
 * @param {Object} btn id de la fila que se desea visualizar.
 */

function gestionarItem(id_order, data, index) {
 
            
    $('#id').val(data.id);
    $('#autor').val(data.autor);
    $('#titulo').val(data.titulo);
    $('#nombre_medio').val(data.nombre_medio);
    $('#issn').val(data.issn);
    $('#editorial').val(data.editorial);
    $('#volumen').val(data.volumen);
    $('#cant_pag').val(data.cant_pag);
    $('#fecha').val(data.fecha);
    $('#ciudad').val(data.ciudad);
    $('#tipo_publicaciones_id').val(data.tipo_publicaciones_id).change();




    $("#btnOrderAct").show();
    $("#btnOrderReg").hide();

   
    mostrarModalPublicaciones();
}

/**
 * @method mostrarModalOrdenes
 * Método que se encarga de abrir el modal para registro o actualizacion
 */
function mostrarModalPublicaciones() {
//    limpiarcampos();
   $('#myModalPublicaciones').modal({show: true});
  
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


//<editor-fold defaultstate="collapsed" desc="CRUD">


function UpdatePublicacion() {

    let order = {
        id: $('#id').val(),
         autor: $('#autor').val(),
        titulo: $('#titulo').val(),
        nombre_medio: $('#nombre_medio').val(),
        issn: $('#issn').val(),
        editorial: $('#editorial').val(),
        volumen: $('#volumen').val(),
        cant_pag: $('#cant_pag').val(),
        fecha: $('#fecha').val(),
        ciudad: $("#ciudad").val(),
        tipo_publicaciones_id: $('#tipo_publicaciones_id').val(),
        semillero_id: id_Semil,
        //        pensum_id: '1',
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/PublicacionesController_Update.php", {
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
            obtenerDatosPu(id_Semil);
                cerrarModalPublicaciones();
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

function registrarPublicacion() {
   $("#btnOrderReg").show();
    $("#btnOrderAct").hide();
    
    let ordenes = {
        autor: $('#autor').val(),
        titulo: $('#titulo').val(),
        nombre_medio: $('#nombre_medio').val(),
        issn: $('#issn').val(),
        editorial: $('#editorial').val(),
        volumen: $('#volumen').val(),
        cant_pag: $('#cant_pag').val(),
        fecha: $('#fecha').val(),
        ciudad: $("#ciudad").val(),
        tipo_publicaciones_id: $('#tipo_publicaciones_id').val(),
        semillero_id: id_Semil,
      
    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/PublicacionesController_Insert.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
//                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
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
           obtenerDatosPu(id_Semil);
                cerrarModalPublicaciones();
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



function DeleteOrder(id,data) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registro',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar El Registro?',
        function() {
                eliminarPublicaciones(id,data);
        }
    );
}


/**
 * @method AlumnoEliminar
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarPublicaciones(id) {

    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/PublicacionesController_Delete.php", {
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

            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);

           obtenerDatosPu(id_Semil);
                cerrarModalPublicaciones();
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

