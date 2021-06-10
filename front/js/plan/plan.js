$(document).ready(function() {
    semille='2';
    acti="";
    iniciarTabla();
    iniciarTablaCapacitaciones();
    iniciarTablaOtrasCapacitaciones();
    

cargarSelectLineas(semille);


});

//----------------------------------TABLA----------------------------------


function iniciarTabla() {

    //tabla de alumnos
    $("#listadoTablaAct").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "Sin Actividades...",
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
                data: "descripcion",
                className: "text-center",
                orderable: true,
            },
          
            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                  
                    "<a class='personalizado eliminar' title='eliminar'><i class='fa fa-trash'></i></a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function(row, data, index) {
            var id_order = data.id
            var proy_id = data.proyectos_id

            $(".actualizar", row).click(function() {
                gestionarItem(id_order, data, index);
            });
            $(".eliminar", row).click(function() {
                DeleteActividades(id_order, proy_id);
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






//<editor-fold defaultstate="collapsed" desc="Registro de Actividades ">

function registrarActividades() {
  
    acti=$('#proyecto_linea2').val();
    
      
    let ordenes = {
        descripcionAct: $('#descripcionA').val(),
        proyectos_id: acti
      
      
    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/ActividadesController_Inser.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
          
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
                MostrarDatosActividades(acti);
                cerrarModalActividades();
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


function MostrarDatosActividades(semille) {
      let order = {
        id:semille,
 
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/ActividadesController_ListId.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
               
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
            listadoActividades(data.actividades);
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


function listadoActividades(actividades) {

    let tabla = $("#listadoTablaAct").DataTable();
    tabla.data().clear();
    tabla.rows.add(actividades).draw();
}


function mostrarModalActividades() {
//    limpiarcampos();
   $('#ModalActividades').modal({show: true});
 
}

function cerrarModalActividades() {
     $('#ModalActividades').modal('hide');
}


//</editor-fold>

//<editor-fold defaultstate="collapsed" desc=" Registro de Capacitaciones">

function iniciarTablaCapacitaciones() {

    //tabla de alumnos
    $("#listadoTablaCap").DataTable({
        responsive: false,
        ordering: false,
        paging: false,
        searching: false,
        info: false,
        lengthChange: false,
        language: {
            emptyTable: "Sin Capacitaciones...",
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
                data: "tema",
                className: "text-center",
                orderable: false,
            },
            {
                data: "docente",
                className: "text-center",
                orderable: false,
            },
            {
                data: "objetivo",
                className: "text-center",
                orderable: false,
            },
              {
                data: "fecha",
                className: "text-center",
                orderable: false,
            },
            {
                data: "cant_capacitados",
                className: "text-center",
                orderable: false,
            },
         
               {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",

                    "<a class='personalizado eliminar' title='eliminar'><i class='fa fa-trash'></i></a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function(row, data, index) {
            var id_order = data.id
            var id_proCap = data.proyecto_id

            $(".actualizar", row).click(function() {
                gestionarItem(id_order, data, index);
            });
            $(".eliminar", row).click(function() {
                DeleteCapacitaciones(id_order, id_proCap);
            });
        },

    });

}

function mostrarModalCapacitaciones() {
//    limpiarcampos();
   $('#ModalCapacitaciones').modal({show: true});
    $("#btnCapacitacionesReg").show();
    $("#btnCapacitacionesAct").hide();
}

function cerrarModalCapacitaciones() {
     $('#ModalCapacitaciones').modal('hide');
}

function obtenerDatosCapacitaciones(idProy) {
    
    
    let order = {
        id:idProy,
 
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Capacitaciones_ProyectosController_List.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
               
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
            listadoCapacitaciones(data.capacitaciones);
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


function listadoCapacitaciones(capacitaciones) {

    let tabla = $("#listadoTablaCap").DataTable();
    tabla.data().clear();
    tabla.rows.add(capacitaciones).draw();
}


function registrarCapacitaciones() {
  
    cap=$('#proyecto_linea2').val();
    
      
    let ordenes = {
        temaCap: $('#temaCap').val(),
        docenteCap: $('#docenteCap').val(),
        fechaCap: $('#fechaCap').val(),
        cant_capacitadosCap: $('#cant_capacitadosCap').val(),
        proyecto_idCap: cap,
        objetivoCap: $('#objetivoCap').val(),
    
      
    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/Capacitaciones_ProyectosController_Insert.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
          
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
                obtenerDatosCapacitaciones(cap);
                cerrarModalCapacitaciones();
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


function DeleteCapacitaciones(id_order, id_proCap) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registros',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar este Registro?',
        function() {
            eliminarActividad(id_order, id_proCap);
        }
    );
}


/**
 * @method AlumnoEliminar
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarCapacitaciones(id,proy_id) {

//    alert();
   
    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/ActividadesController_Delete.php", {
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


                MostrarDatosActividades(proy_id);
                cerrarModalActividades();
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

//<editor-fold defaultstate="collapsed" desc="Registro de Otras  Actividades">

function iniciarTablaOtrasCapacitaciones() {

    //tabla de alumnos
    $("#listadoTablaOtrasCap").DataTable({
        responsive: false,
        ordering: false,
        paging: false,
        searching: false,
        info: false,
        lengthChange: false,
        language: {
            emptyTable: "Sin Capacitaciones...",
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
                data: "tema",
                className: "text-center",
                orderable: false,
            },
            {
                data: "docente",
                className: "text-center",
                orderable: false,
            },
            {
                data: "objetivo",
                className: "text-center",
                orderable: false,
            },
              {
                data: "fecha",
                className: "text-center",
                orderable: false,
            },
            {
                data: "cant_capacitados",
                className: "text-center",
                orderable: false,
            },
         
               {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",

                    "<a class='personalizado eliminar' title='eliminar'><i class='fa fa-trash'></i></a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function(row, data, index) {
            var id_order = data.id
            var id_proCap = data.proyecto_id

            $(".actualizar", row).click(function() {
                gestionarItem(id_order, data, index);
            });
            $(".eliminar", row).click(function() {
                DeleteCapacitaciones(id_order, id_proCap);
            });
        },

    });

}

//</editor-fold>


function UpdateOrder() {

    let order = {
        id: $('#idOrder').val(),
       
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


function listadoActividades(actividades) {

    let tabla = $("#listadoTablaAct").DataTable();
    tabla.data().clear();
    tabla.rows.add(actividades).draw();
}


function DeleteActividades(id,proy_id) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registros',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar este Registro?',
        function() {
            eliminarActividad(id,proy_id);
        }
    );
}


/**
 * @method AlumnoEliminar
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarActividad(id, id_proCap) {

//    alert();
   
    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Capacitaciones_ProyectosController_Delete.php", {
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


                obtenerDatosCapacitaciones(id_proCap);
                cerrarModalCapacitaciones();
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



//<editor-fold defaultstate="collapsed" desc="Select Disciplina">
function cargarSelectProyectos(area) {
 
    let disciplina = {
        id: area,
  
    };
    fetch("../../back/controller/Proy_lineas_investController_List.php", {
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
           
            construirSelecProy_linea(data.proy_linea);
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

function cargarSelectProyectos2(area) {
 
 MostrarDatosActividades(area);
 
    obtenerDatosCapacitaciones(area);
 
    let disciplina = {
        id: area,
  
    };
    fetch("../../back/controller/Proy_lineas_investController_List2.php", {
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
            gestionarItem(data.proy_linea);
          
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
function construirSelecProy_linea(proy_linea) {
        $("#proyecto_linea2").empty();
    let input = $("#proyecto_linea2");
     let opcion = new Option("SELECCIONE", "-1");
        $(opcion).html("SELECCIONE");
        input.append(opcion);

    for (let index = 0; index < proy_linea.length; index++) {
        let disciplinas = proy_linea[index],
            opcion = new Option(disciplinas.titulo, disciplinas.proyectos_id);
        $(opcion).html(disciplinas.titulo);
        input.append(opcion);
    }


}

function gestionarItem(proy_linea) {
   
    $('#investigador').val(proy_linea[0].investigador);
    $('#objetivoG').val(proy_linea[0].objetivoG);
    $('#fecha_ini').val(proy_linea[0].fecha_ini);
    $('#fecha_fin').val(proy_linea[0].fecha_fin);
    $('#producto').val(proy_linea[0].producto);
    
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
            opcion = new Option(li_invs.linea, li_invs.descripcion);
        $(opcion).html(li_invs.linea);
        input.append(opcion);
    }


}

//</editor-fold>


//</editor-fold>
