$(document).ready(function() {
    semille = Utilitario.getLocal('id_semillero');
    flag=true;
    acti = "";
    var_regPlan = $('#id_planReg').val();
    Utilitario
    iniciarlistadoTablaPlanesS();
    obtenerDatosPrincipales();
    cont=0;

    iniciarTabla();
    iniciarTablaCapacitaciones(); // capacitaciones
    iniciarTablaOtrasCapacitaciones(); // otras capacitaciones
    iniciarTablalineas_proyectos_plan();

   
iniciarTodo();

});

function iniciarTodo() {
        cargarSelectLineas(semille);


//   $("#SeccionTablaListaPlan").hide();/**Tabla Principal */
$("#Titulo").hide();/**Tabla Principal */
    $("#SeccionIniciar").hide(); /** Carga la fecha */
//    $("#inicio_del_plan").hide(); /** Carga la fecha */
    $("#SeccionRegistrar").hide(); /** Carga la fecha */
//    $("#mostrarModalRegistro").hide(); /** Carga la fecha */

    $("#SeccionRegistrarLineas").hide(); /** Carga la fecha */
   $("#ocultarTablaLineasAct").hide(); /** seccion de  act lineas */

   $("#SeccionTablaListaPlan").show();/**Tabla Principal */
   $("#Titulo").show();/**Tabla Principal */
   
      $("#seccionLineasInvestigacion").hide(); /** seccion de  act lineas */
      $("#seccionOtrasActividades").hide(); /** seccion de  act lineas */
      $("#btnContinuarActividades").hide(); /** seccion de  act lineas */
      $("#TituloPlanAccion").hide(); /** seccion de  act lineas */
      $("#btneditarLinea").hide(); /** seccion de  act lineas */
      $("#btneTerminarineas").hide(); /** seccion de  act lineas */

}
//----------------------------------TABLA----------------------------------


//<editor-fold defaultstate="collapsed" desc="Metodos de Listado de Plan de Accion">

function iniciarlistadoTablaPlanesS() {

    //tabla de alumnos
    $("#listadoTablaPlanesS").DataTable({
        //        responsive: false,
        //        ordering: false,
        //        paging: false,
        //        searching: false,
        //        info: false,
        //        lengthChange: false,
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "Sin  Planes de Gestion...",
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
                data: "id_plan_Ac",
                className: "text-center",
                orderable: false,
            }, {
                data: "semestre",
                className: "text-center",
                orderable: false,
            },
            {
                data: "ano",
                className: "text-center",
                orderable: false,
            },

            {
                data: "titulo",
                className: "text-center",
                orderable: false,
            },
            {
                data: "descripcion",
                className: "text-center",
                orderable: false,
            },
            {
                data: "nombre",
                className: "text-center",
                orderable: false,

            },

            {
                data: "estado",
                className: "text-center",
                orderable: false,
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
        rowCallback: function(row, data) {
         let    id_order = data.id_plan_Ac
         let     id_proCap = data.proyecto_id
         let     id_sem =  Utilitario.getLocal('id_semillero')

            $(".actualizar", row).click(function() {
                 
                gestionarItemEditar(id_order, data);

            });
            $(".eliminar", row).click(function() {
                DeletePlan(id_order, id_proCap);
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



function obtenerDatosPrincipales() {
    semille = Utilitario.getLocal('id_semillero');
    let order = {
        id: semille,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Plan_accionController_List_Semillero.php", {
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
            listadoPlanes(data.PlanGeneral);
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
 * 
 * @param {type} PlanGeneral
 * Agrega listado planes  a la tabla 
 * @return {undefined}
 */
function listadoPlanes(PlanGeneral) {

    let tabla = $("#listadoTablaPlanesS").DataTable();
    tabla.data().clear();
    tabla.rows.add(PlanGeneral).draw();
}


/**
 * Muestra la vista de Crear un nuevo plan
 * @return {undefined}
 */
function gestionarItemPlan() {
//    $("#mostrarModalRegistro").hide();
    $("#SeccionTablaListaPlan").hide();
    $("#SeccionIniciar").show();


}

/**
 * Agregar Plan Inserta el Registro del plan  con semestre y año del plan
 * @return {undefined}
 */
function AgregarPlan() {

   $('#cuatro').prop('disabled', false);

    semillero_id = Utilitario.getLocal('id_semillero');
    anio = $("#anio").val();
    semestre = $("#semestre").val();
//    linea_investigacion_id = $("#lineas_investigacion2").val();
//    proyectos_id = $("#proyecto_linea2").val();


    let ordenes = {
        semillero_id: semillero_id,
        anio: anio,
        semestre: semestre,
//        linea_investigacion_id: linea_investigacion_id,
//        proyectos_id: proyectos_id,


    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/Plan_accionController_Insert.php", {
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

            Mensaje.mostrarMsjExito("Registro Exitoso", "Se ha Iniciado Un Plan de Accion");

            SiguienteActividades(data.id)
          
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
 * 
 * @param {type} mensaje
 * muestra la vista de lineas de investigacion  y otras actividades
 * @return {undefined}
 */
function SiguienteActividades(mensaje) {


  $("#seccionOtrasActividades").show();
  $("#seccionLineasInvestigacion").show();
  $("#SeccionIniciar").hide();
  $('#btnIniciar').prop('disabled', true);
  $('#btnDos').prop('disabled', false);
  $('#btnTres').prop('disabled', false);
  flag=false;
  $('#id_planReg').val(mensaje);
  $('#numeroPlan').text(mensaje);

}

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Metodos Otras Lineas de Investigacio">

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
            emptyTable: "Sin  Otras Actividades...",
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
                data: "nombre_proyecto",
                className: "text-center",
                orderable: false,
            },
            {
                data: "nombre_actividad",
                className: "text-center",
                orderable: false,
            },
            {
                data: "modalidad_participacion",
                className: "text-center",
                orderable: false,
            },
            {
                data: "responsable",
                className: "text-center",
                orderable: false,
            },
            {
                data: "fecha",
                className: "text-center",
                orderable: false,
            },
            {
                data: "producto",
                className: "text-center",
                orderable: false,
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
            var id_proCap = data.proyecto_id

            $(".actualizar", row).click(function() {
                MostrarDatosOtrasCapUpdate(id_order, data, index);
            });
            $(".eliminar", row).click(function() {
                DeleteOtrasActividades(id_order, id_proCap);
            });
        },

    });

}



function AgregarOtrasCapcitaciones() {

     
    let ordenes = {
        nombre_proyectoO: $("#nombre_proyectoO").val(),
        nombre_actividadO: $("#nombre_actividadO").val(),
        modalidad_participacionO: $("#modalidad_participacionO").val(),
        fecha_realizacionO: $("#fecha_realizacionO").val(),
        productoO: $("#productoO").val(),
        responsableO: $("#responsableO").val(),

        semillero_id: Utilitario.getLocal('id_semillero'),
        anio: $("#anio").val(),
        semestre: $("#semestre").val(),
        linea_investigacion_id: $("#lineas_investigacion2").val(),
        proyectos_id: $("#proyecto_linea2").val(),
         plan_accion_id: $('#id_planReg').val(),

    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/Otras_actividadesController_Insert.php", {
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
              $('#ModalOtrasCapacitaciones').modal('hide');
            MostrarDatosOtrasCap();
            //                SiguienteActividades(data.id,proyectos_id)

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

function MostrarDatosOtrasCap( ) {

   
    let order = {
        semillero_id: Utilitario.getLocal('id_semillero'),
        plan: $('#id_planReg').val(),

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Otras_actividadesController_List_Plan.php", {
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
            listadoOtrasCap(data.OtrasCap);
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

function listadoOtrasCap(OtrasCap) {

    let tabla = $("#listadoTablaOtrasCap").DataTable();
    tabla.data().clear();
    tabla.rows.add(OtrasCap).draw();
}


function Update_OtrasCapcitaciones() {

      
    let ordenes = {
        semillero_id: Utilitario.getLocal('id_semillero'),
        idO: $("#idO").val(),
        nombre_proyectoO: $("#nombre_proyectoO").val(),
        nombre_actividadO: $("#nombre_actividadO").val(),
        modalidad_participacionO: $("#modalidad_participacionO").val(),
        fecha_realizacionO: $("#fecha_realizacionO").val(),
        productoO: $("#productoO").val(),
        responsableO: $("#responsableO").val(),

      

    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/Otras_actividadesController_update.php", {
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
              $('#ModalOtrasCapacitaciones').modal('hide');
            MostrarDatosOtrasCap();
            //                SiguienteActividades(data.id,proyectos_id)

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

function DeleteOtrasActividades(id, proy_id) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registros',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar este Registro?',
        function() {
            eliminarOtrasActividad(id, proy_id);
        }
    );
}


function eliminarOtrasActividad(id, id_proCap) {


    var proyec = $('#proyecto_linea2').val();
    var planss = $('#id_planReg').val();

    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Otras_actividadesController_Delete.php", {
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


           MostrarDatosOtrasCap( );
//            cerrarModalCapacitaciones();
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


function ModalOtrasCapacitaciones() {

    $('#ModalOtrasCapacitaciones').modal({ show: true });
    $("#btnCapacitacionesReg2").show();
    $("#btnCapacitacionesAct2").hide();
}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function CerrarOtrasCapacitaciones() {
    $('#ModalOtrasCapacitaciones').modal('hide');
}





//</editor-fold>

//<editor-fold defaultstate="collapsed" desc=" Metodos de Capacitaciones">

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
                     "<a class='personalizado actualizar' title='Gestionar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='personalizado eliminar' title='eliminar'><i class='fa fa-trash'></i></a>",
                    "</div>",
                ].join(""),
            },
        ],
        rowCallback: function(row, data, index) {
            var id_order = data.id
            var id_proCap = data.proyecto_id

            $(".actualizar", row).click(function() {
                obtenerDatosCapacitacionesAct_Id(id_order);
            });
            $(".eliminar", row).click(function() {
                DeleteCapacitacionesP(id_order, data);
            });
        },

    });

}

function mostrarModalCapacitacionesP() {
    //    limpiarcampos();
    $('#ModalCapacitaciones').modal({ show: true });
    $("#btnCapacitacionesReg").show();
    $("#btnCapacitacionesAct").hide();
}

function cerrarModalCapacitaciones() {

    $('#ModalCapacitaciones').modal('hide');
   

}

function listadoCapacitaciones(capacitaciones2) {

    let tabla = $("#listadoTablaCap").DataTable();
    tabla.data().clear();
    tabla.rows.add(capacitaciones2).draw();
}

function registrarCapacitaciones() {

   var proyec = $('#proyecto_linea2').val();
   var lineaAux = $('#lineas_investigacion2').val();
   
    if(proyec ==''){
        proyec = $('#proyecto_linea_aux').val();
        lineaAux = $('#id_LineaR_aux').val();
    }
    var planss = $('#id_planReg').val();
    var semestre = $('#semestre').val();
    if(semestre==""){
        semestre=0;
    }




    id_Sem1 = Utilitario.getLocal('id_semillero');
    proy_id = proyec;
    plan_id = $('#id_planReg').val();
    linea_id = lineaAux;

    let ordenes = {
        tema: $('#temaCap').val(),
        docente: $('#docenteCap').val(),
        objetivo: $('#objetivoCap').val(),
        fecha: $('#fechaCap').val(),
        cant_capacitados: $('#cant_capacitadosCap').val(),
        semillero_id: id_Sem1,
        linea_id: linea_id,
        plan_accion_id: plan_id,
        proy_id: proy_id,
        semestre: semestre,



    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/CapacitacionesController_Insert.php", {
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
            $('#btnContinuarActividades').prop('disabled', false);
           $('#botonTerminar').prop('disabled', false);
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
//            obtenerDatosCapacitaciones(plan_id,linea_id,proy_id)
            obtenerDatosCapacitaciones(plan_id,linea_id,proy_id);
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

function obtenerDatosCapacitaciones(plan_id,linea_id,proy_id) {


    //id_Sem1 = Utilitario.getLocal('id_semillero');
    id_Proyect = proy_id;
    id_PlanR = plan_id;
    id_LineaR = linea_id;

    let order = {
        plan: id_PlanR,
        linea: id_LineaR,
        proyect: id_Proyect,
       

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/CapacitacionesController_List_Plan.php", {
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
            listadoCapacitaciones(data.capacitaciones2);
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
};


function obtenerDatosCapacitacionesAct_Id(id) {



    let order = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/CapacitacionesController_List_Plan_Id.php", {
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
            cargarModalInfoCapacitaciones(data.capacitacionesAux);
//            cerrarModalCapacitaciones();
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
};


function UpdateCapacitacionesAct() {
    
       var proy_id = $('#proyecto_linea2').val();
   var linea_id = $('#lineas_investigacion2').val();
   
    if(proy_id ==''){
        proy_id = $('#proyecto_linea_aux').val();
        linea_id = $('#id_LineaR_aux').val();
    }
    var plan_id = $('#id_planReg').val();



   

    let ordenes = {
        idU: $('#idCap').val(),
        tema: $('#temaCap').val(),
        docente: $('#docenteCap').val(),
        objetivo: $('#objetivoCap').val(),
        fecha: $('#fechaCap').val(),
        cant_capacitados: $('#cant_capacitadosCap').val(),
   
   



    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/CapacitacionesController_Update.php", {
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
            $('#btnContinuarActividades').prop('disabled', false);
           $('#botonTerminar').prop('disabled', false);
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
             obtenerDatosCapacitaciones(plan_id,linea_id,proy_id);
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

function DeleteCapacitacionesP(id, datos) {
    

    
 var plan_id=datos.plan_id;
 var proy_id=datos.proyecto_id;
 var linea_id=datos.linea_id;


    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/CapacitacionesController_Delete.php", {
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

               
             obtenerDatosCapacitaciones(plan_id,linea_id,proy_id);
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


function DeleteLineas_proyectos(id, datos) {
    

    
 var plan_id=datos.plan_id;



    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Lineas_Poryectos_PlanController_Delete.php", {
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

               
             obtenerDatosLineas_has_proyectos(plan_id);
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




//</editor-fold>



function iniciarTabla() {


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
    $('#myModalPublicaciones').modal({ show: true });
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


//<editor-fold defaultstate="collapsed" desc="Metodos de las Lineas de Investigacion">



function gestionarItemPlanLineas() {
   
  //    $("#ocultarTablaLineas").hide();
if(!flag){ /** es nuevea */
        
    $("#seccionLineasInvestigacion").show();
    $("#SeccionRegistrarLineas").show();
    $("#seccionOtrasActividades").show();
      $("#headingOne").show();
    $("#collapseOne").show();
    
       $("#btnterminar").show();
        $("#btneditarLinea").hide(); /** seccion de  act lineas */
      $("#btneTerminarineas").hide(); /** seccion de  act lineas */

    $('#acor1').prop('disabled', false);
    $('#btnCuatro').prop('disabled', false);
    $('#uno').prop('disabled', false);
    
 obtenerDatosCapacitaciones(-1,-1,-1);
        
 MostrarDatosActividadesP(-1,-1);
        MostrarDatosOtrasCap();
    $("#btnContinuarActividades").show();
}else{
       
   $("#seccionLineasInvestigacion").show();
    $("#SeccionRegistrarLineas").show();
    $("#seccionOtrasActividades").show();
      $("#headingOne").show();
    $("#collapseOne").show();
    
       $("#btnterminar").show();
       $("#btneditarLineas2").hide();
       $("#btneditarLinea").hide();
       $("#btnContinuarActividades").show();
       $("#botonTerminar").hide();

    $('#acor1').prop('disabled', false);
    $('#btnCuatro').prop('disabled', false);
    $('#uno').prop('disabled', false);
    
       
}
//AgregarLineaNueva();
  
    

  
    
}

function cerrarItemPlanLineas(plan_id) {



    $("#ModalDatosPlan").hide();
    //    $("#ModalTablaRegistroPlan").show();


}

function RegustrarItemPlanLineas(plan_id) {

    //    $("#ModalTablaRegistroPlan").show();
    $("#ModalDatosPlan").hide()();
    //    $("#ModalTablaplan2").show();

    $('#id_planReg').val(plan_id[0].id);
}



//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Registro de Actividades ">

function registrarActividades() {
    
    var proyec = $('#proyecto_linea2').val();
    var semestre = $('#proyecto_linea2').val();
   
    if(proyec==''){
        proyec = $('#proyecto_linea_aux').val();
        semestre = $('#semestre_aux').val();
    }
    var planss = $('#id_planReg').val();



    let ordenes = {
        descripcionAct: $('#descripcionA').val(),
        proyectos_id: proyec,
        id_planReg: $('#id_planReg').val(),
        semestre: semestre,


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
               $('#btnContinuarActividades').prop('disabled', false);
               $('#botonTerminar').prop('disabled', false);
//            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            /***********************plan y protecto**/
            MostrarDatosActividadesP(planss, proyec);
            cerrarModalActividades2();
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



function MostrarDatosActividadesP(plans, proyecto) {


    var proyec = proyecto;
    var plan2 = plans;
    let order = {
        id: proyec,
        plan: plan2,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/ActividadesController_ListId_Plan.php", {
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


function mostrarModalActividades2() {
    //    limpiarcampos();

    $('#ModalActividades').modal({ show: true });
    $("#btnRegAct").hide();
    $("#btnRegReg").show();


}

function cerrarModalActividades2() {

    $('#ModalActividades').modal('hide');
    
}



function SiguienteCapacitaciones() {
    //    limpiarcampos();
    if(cont=>4){
        $('#botonTerminar').prop('disabled', false);
//      Mensaje.mostrarMsjExito(" Exitos"," Puedes Terminar el Proceso... ");   
    }
  
    $('#tres').prop('disabled', false);
    $('#btnAgregarCapacitaciones').prop('disabled', false);
    $('#botonTerminar').prop('disabled', false);
cont++;

}
function SiguienteCapacitaciones1() {
    //    limpiarcampos();
   
     $('#dos').prop('disabled', false);
     $('#btnCinco').prop('disabled', false);
     $('#btnAgregarActividades').prop('disabled', false);

}




//</editor-fold>

//<editor-fold defaultstate="collapsed" desc=" Registro de Capacitaciones">



function iniciarTablalineas_proyectos_plan() {

    //tabla de alumnos
    $("#listadoTablalinea_pro").DataTable({
        responsive: false,
        ordering: false,
        paging: false,
        searching: false,
        info: false,
        lengthChange: false,
        language: {
            emptyTable: "Sin Registros ...",
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
                orderable: false,
            },
            {
                data: "titulo",
                className: "text-center",
                orderable: false,
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
                 gestionarLineasInv(data);
            });
            $(".eliminar", row).click(function() {
                DeleteLineas_proyectos(id_order, data);
            });
        },

    });

}



function obtenerDatosCapacitacionesAct(id_LineaR,plan,proy_id) {

    
 
//    id_LineaR = $('#lineas_investigacion2').val();

    let order = {
        plan: plan,
        linea: id_LineaR,
        proyect: proy_id,
      

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/CapacitacionesController_List_Plan.php", {
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
            listadoCapacitaciones(data.capacitaciones2);
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
};



function obtenerDatosLineas_has_proyectos(id_PlanR) {

    

    let order = {
        plan: id_PlanR,
   
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Lineas_Poryectos_PlanController_ListId_1.php", {
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
            listadoLineas_proyectos(data.li_inv3);
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
};

function obtenerDatosLineas_has_proyectosAct(plan) {
   

  
    let order = {
        plan: plan,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Lineas_Poryectos_PlanController_ListId_1_act.php", {
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
            listadoLineas_proyectosAct(data.li_inv3);
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
};

function listadoLineas_proyectos(li_inv3) {

    let tabla = $("#listadoTablalinea_pro").DataTable();
    tabla.data().clear();
    tabla.rows.add(li_inv3).draw();
}
function listadoLineas_proyectosAct(li_inv3) {

    let tabla = $("#listadoTablalinea_proAct").DataTable();
    tabla.data().clear();
    tabla.rows.add(li_inv3).draw();
}

function DeletePlan(id_order, id_proCap) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registros ',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar este Registro?',
        function() {
            eliminarPlan(id_order, id_proCap);
        }
    );
}


function eliminarPlan(id) {


    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Plan_accionController_Delete.php", {
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

            obtenerDatosPrincipales();
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
 * 
 * @param {type} id
 * @param {type} proy_id
 * @return {undefined}
 */

function registrarLineas_semilleros() {



    id_Sem1 = Utilitario.getLocal('id_semillero');
    id_PlanR=$('#id_planReg').val();
       
     let ordenes = {

        anio: $('#anio').val(),
        semestre: $('#semestre').val(),
        semillero_id: id_Sem1,
        linea_id: $('#lineas_investigacion2').val(),
        plan_accion_id:id_PlanR,
        proy_id: $('#proyecto_linea2').val(),



    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/Lineas_Poryectos_PlanController_Insert.php", {
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
            
                    cerrarModalTerminarLinea();
         
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

function mostrarModalOtrasCapacitaciones() {
    //    limpiarcampos();
    $('#myModalActividades').modal({ show: true });
    $("#btnOrderReg").show();
    $("#btnOrderAct").hide();
}

function Actualizar_Lineas_semilleros() {
  
    
      Mensaje.mostrarMsjExito("Actualizacion Exitosa", "Datos Actualizados Correctamente");
            
     var planss = $('#id_planReg').val();
     obtenerDatosLineas_has_proyectos(planss);
     $('#btnCuatro').prop('disabled', true);
     $('#btnContinuarActividades').prop('disabled', true);
     
    $('#uno').prop('disabled', false);
    $('#dos').prop('disabled', true);
    $('#btnCinco').prop('disabled', true);
    $('#btnAgregarActividades').prop('true', false);
    $('#tres').prop('disabled', true);
    $('#btnAgregarCapacitaciones').prop('disabled', true);
  
      
    $("#seccionLineasInvestigacion").show();
    $("#SeccionRegistrarLineas").hide();
    $("#TituloPlanAccion").hide();
    
 

}
function cerrar_Lineas_semilleros() {
  
 
    
      Mensaje.mostrarMsjExito("Actualizacion Exitosa", "Datos Actualizados Correctamente");
            
   iniciarTodo();
 

}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function cerrarModalTerminarLinea() {
      $("#TituloPlanAccion").hide();
     var planss = $('#id_planReg').val();
  obtenerDatosLineas_has_proyectos(planss);
     $('#btnCuatro').prop('disabled', true);
     $('#btnContinuarActividades').prop('disabled', true);
     
    $('#uno').prop('disabled', false);
    $('#dos').prop('disabled', true);
    $('#btnCinco').prop('disabled', true);
    $('#btnAgregarActividades').prop('true', false);
    $('#tres').prop('disabled', true);
    $('#btnAgregarCapacitaciones').prop('disabled', true);
  
      
    $("#seccionLineasInvestigacion").show();
    $("#SeccionRegistrarLineas").hide();
 

}




function cerrarTerminar() {
    
  


    $("#SeccionIniciar").hide();
    $("#SeccionRegistrar").hide();
    $("#SeccionRegistrarLineas").hide();
    $("#btnterminar").hide();
    $("#btnContinuarActividades").hide();
    $("#ModalTablaRegistroPlan").show();


    $('#btnCuatro').prop('disabled', true);
    $('#uno').prop('disabled', false);
    $('#dos').prop('disabled', true);
    $('#btnCinco').prop('disabled', true);
    $('#btnAgregarActividades').prop('true', false);
    $('#tres').prop('disabled', true);
    $('#btnAgregarCapacitaciones').prop('disabled', true);

Menu.añadirPlan();
 obtenerDatosPrincipales();
}





//</editor-fold>



function UpdateOrder() {

    let order = {
        id: $('#idOrder').val(),

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



function DeleteActividades(id, proy_id) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registros',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar este Registro?',
        function() {
            eliminarActividad(id, proy_id);
        }
    );
}


/**
 * @method AlumnoEliminar
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarActividad(id, proy_id) {


    var proyec = proy_id;
    var planss = $('#id_planReg').val();

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


            MostrarDatosActividadesP(planss, proyec);
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


function MostrarDatosOtrasCapUpdate(id_order) {

   
    let order = {
        id: id_order,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Otras_actividadesController_List_Plan_traerDatos.php", {
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
            cargarModalInfoOtrasCapacitaciones(id_order,data.OtrasCap);
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


function cargarModalInfoOtrasCapacitaciones(id_order,OtrasCap){
    
    

    $("#idO").val(id_order);
    $("#nombre_proyectoO").val(OtrasCap[0].nombre_proyecto);
    $("#nombre_actividadO").val(OtrasCap[0].nombre_actividad);
    $("#modalidad_participacionO").val(OtrasCap[0].modalidad_participacion);
    $("#fecha_realizacionO").val(OtrasCap[0].fecha);
    $("#productoO").val(OtrasCap[0].producto);
    $("#responsableO").val(OtrasCap[0].responsable);
    
    $('#ModalOtrasCapacitaciones').modal({ show: true });
    $("#btnCapacitacionesReg2").hide();
    $("#btnCapacitacionesAct2").show();
}

function cargarModalInfoCapacitaciones(capacitacionesAux){

//    alert('datos2');
    $("#idCap").val(capacitacionesAux[0].id);

    $("#temaCap").val(capacitacionesAux[0].tema);
    $("#docenteCap").val(capacitacionesAux[0].docente);
    $("#objetivoCap").val(capacitacionesAux[0].objetivo);
    $("#fechaCap").val(capacitacionesAux[0].fecha);
    $("#cant_capacitadosCap").val(capacitacionesAux[0].cant_capacitados);
  
    $('#ModalCapacitaciones').modal({ show: true });
    $("#btnCapacitacionesReg").hide();
    $("#btnCapacitacionesAct").show();
    
   
}

//<editor-fold defaultstate="collapsed" desc="Select">



//<editor-fold defaultstate="collapsed" desc="Select Lineas y proyectos">
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


    //    MostrarDatosOtrasCap(area);
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


function mostrarModalRegistro() {
    //    limpiarcampos();
    $('#myModalPublicaciones').modal({ show: true });
    $("#btnOrderReg").show();
    $("#btnOrderAct").hide();
}


//<editor-fold defaultstate="collapsed" desc="Data a Actualizar">


function gestionarItemEditar(id_order, data) {
 $('#numeroPlan').val(id_order);
      $("#TituloPlanAccion").show(); /** seccion de  act lineas */
     $("#seccionOtrasActividades").show();
    $("#btnterminar").show();
    $("#btneTerminarineas").show();
     $("#botonTerminar").hide();
     $("#btneditarLinea").hide();
     
     $("#SeccionTablaListaPlan").hide();
     
     $("#ocultarTablaLineas").hide();
     $("#seccionLineasInvestigacion").show();
     
  $("#SeccionIniciar").hide();
  $('#btnIniciar').prop('disabled', true);
  $('#btnDos').prop('disabled', false);
  $('#btnTres').prop('disabled', false);
  
   $('#id_planReg').val(id_order);
   
   flag=true;
    
   
   $('#semestre_aux').val(data.id_semestre);


MostrarDatosOtrasCap();

obtenerDatosLineas_has_proyectos(id_order);

$('#numeroPlan').val(id_order);
}

function gestionarLineasInv( data) {

    $("#btnterminar").show();
    $("#btneTerminarineas").show();
//    $("#SeccionTablaListaPlan").hide();

    $("#SeccionRegistrarLineas").show();
    $("#headingOne").hide();
    $("#collapseOne").hide();
    $("#botonTerminar").hide();
    $("#btnContinuarActividades").hide();
//    $("#btneditarLinea").show();

    $('#acor1').prop('disabled', false);
    $('#btnCuatro').prop('disabled', false);
    $('#uno').prop('disabled', false);

     $('#dos').prop('disabled', false);
     $('#btnCinco').prop('disabled', false);
     $('#btnAgregarActividades').prop('disabled', false);


 var id_order2=$('#id_planReg').val();
 $("#numeroPlan").text(id_order2);
 var proyc=data.proy_id;
 var linea_act=data.linea_id;

    MostrarDatosActividadesP(id_order2,proyc)

//    alert(linea_act);
 
    $('#proyecto_linea_aux').val(proyc);
    $('#id_LineaR_aux').val(linea_act);
    
    $('#tres').prop('disabled', false);
    $('#btnAgregarCapacitaciones').prop('disabled', false);
    $('#botonTerminar').prop('disabled', false);
    
    
    obtenerDatosCapacitacionesAct(linea_act,id_order2,proyc) ;

}

/**
 * Comment
 */
function AgregarLineaNueva() {
    
    $("#btnterminar").show();


    $("#CamposRegistrarLineas").show();
    $("#SeccionRegistrarLineas").show();
    

   
    $('#acor1').prop('disabled', false);
    $('#btnCuatro').prop('disabled', false);
    $('#uno').prop('disabled', false);
    
}

function AgregarLineaActualizar() {
    
    $("#btnterminar").show();

    $("#seccionLineasInvestigacion").hide();
    $("#CamposRegistrarLineas").show();
    $("#SeccionRegistrarLineas").show();
    

   
    $('#acor1').prop('disabled', false);
    $('#btnCuatro').prop('disabled', false);
    $('#uno').prop('disabled', false);
    
}


//</editor-fold>
