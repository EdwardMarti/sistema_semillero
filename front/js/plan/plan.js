$(document).ready(function() {
    semille= Utilitario.getLocal('id_semillero');
    acti="";
    var_regPlan="";
    Utilitario
    iniciarlistadoTablaPlanesS();
    obtenerDatosPrincipales();
    
    
    iniciarTabla();
    iniciarTablaCapacitaciones();
    iniciarTablaOtrasCapacitaciones();
    iniciarTablalineas_proyectos_plan();
   
cargarSelectLineas(semille);
    
    $("#ModalDatosPlan").hide();
    $("#ModalTablaplan2").hide();
    $("#collapseFour").hide();
    $("#ModalTablaRegistroPlan").show();
    $("#mostrarModalRegistro").hide();
        



});

//----------------------------------TABLA----------------------------------


//<editor-fold defaultstate="collapsed" desc="Datos  Tabla Principal">

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
        columns: [   {
                data: "id_plan_Ac",
                className: "text-center",
                orderable: false,
            },  {
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
                visible:false,
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
                DeleteCapacitacionesP(id_order, id_proCap);
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
            customize: function (win) {
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
    
  
    Utilitario.agregarMascara();
    fetch("../../back/controller/Plan_accionController_List.php", {
            method: "POST",
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

function listadoPlanes(PlanGeneral) {

    let tabla = $("#listadoTablaPlanesS").DataTable();
    tabla.data().clear();
    tabla.rows.add(PlanGeneral).draw();
}

//</editor-fold>




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


//<editor-fold defaultstate="collapsed" desc="Plan_intro">

function AgregarPlan() {
  
    
    semillero_id=Utilitario.getLocal('id_semillero');
    anio= $("#anio").val();
    semestre=$("#semestre").val();
    linea_investigacion_id= $("#lineas_investigacion2").val();
    proyectos_id=$("#proyecto_linea2").val();
    
      
    let ordenes = {
        semillero_id: semillero_id,
        anio: anio,
        semestre: semestre,
        linea_investigacion_id: linea_investigacion_id,
        proyectos_id: proyectos_id,
      
      
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
          
                SiguienteActividades(data.id,proyectos_id)
                 $("#collapseFour").show();
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


function gestionarItemPlan() {
   
      
//    $("#mostrarModalRegistro").hide();
    $("#ModalTablaplan2").hide();
   
    $("#ModalTablaRegistroPlan").hide();
    $("#ModalDatosPlan").hide();
    $("#mostrarModalRegistro").show();
    
      
    }
    
function gestionarItemPlanLineas(plan_id) {
   
  
   
    $("#mostrarModalRegistro").hide();
    $("#ModalTablaplan2").show();
//    $("#ModalTablaplan2").show();
    
    
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

   function añadirPlan() {

        Utilitario.agregarMascara();
        fetch("añadirPlanAccion.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
            
           
    }
    
    
//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Registro de Actividades ">

function registrarActividades() {
  
 var   proyec=$('#proyecto_linea2').val();
 var   planss=$('#id_planReg').val();
 
   
      
    let ordenes = {
        descripcionAct: $('#descripcionA').val(),
        proyectos_id: proyec,
        id_planReg:  $('#id_planReg').val(),
      
      
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
    /***********************plan y protecto**/
                MostrarDatosActividadesP(planss,proyec);
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



function MostrarDatosActividadesP(plans,proyecto) {
    
  
    var proyec= proyecto;
    var plan2=plans;
      let order = {
        id:proyec,
        plan:plan2,
 
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

   $('#ModalActividades').modal({show: true});
     $("#btnRegAct").hide();
    $("#btnRegReg").show();
  
 
}
function cerrarModalActividades2() {
    
     $('#ModalActividades').modal('hide');
}
function SiguienteActividades(mensaje,proyectos_id) {
    
  
    $('#id_planReg').val(mensaje);
   
 $('#btnAgregarActividades').prop('disabled', false);
 $('#acor1').prop('disabled', false);
 $('#uno').prop('disabled', false);
 $('#dos').prop('disabled', false);
 $('#tres').prop('disabled', false);
 $('#cuatro').prop('disabled', false);

    MostrarDatosActividadesP(mensaje,proyectos_id);
    
}
function SiguienteCapacitaciones() {
//    limpiarcampos();
 $('#btnAgregarCapacitaciones').prop('disabled', false);

 obtenerDatosCapacitaciones();
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
                DeleteCapacitacionesP(id_order, id_proCap);
            });
        },

    });

}

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
                DeleteCapacitacionesP(id_order, id_proCap);
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
function cerrarModalActividades() {
   
   
  $('#ModalCapacitaciones').modal('hide');
  $('#ModalCapacitaciones').modal('hide');
 
}

function obtenerDatosCapacitaciones() {
    

    id_Sem1=Utilitario.getLocal('id_semillero');
    id_Proyect=$('#proyecto_linea2').val();
    id_PlanR=$('#id_planReg').val();
    id_LineaR=$('#lineas_investigacion2').val();
 
    let order = {
        plan:id_PlanR,
        linea:id_LineaR,
        proyecto:id_Proyect,
        semillero:id_Sem1,
 
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


function listadoCapacitaciones(capacitaciones2) {

    let tabla = $("#listadoTablaCap").DataTable();
    tabla.data().clear();
    tabla.rows.add(capacitaciones2).draw();
}



function registrarCapacitaciones() {
  
   
    id_Sem1=Utilitario.getLocal('id_semillero');
    id_Proyect=$('#proyecto_linea2').val();
    id_PlanR=$('#id_planReg').val();
    id_LineaR=$('#lineas_investigacion2').val();
      
    let ordenes = {
        tema: $('#temaCap').val(),
        docente: $('#docenteCap').val(),
        objetivo: $('#objetivoCap').val(),
        fecha: $('#fechaCap').val(),
        cant_capacitados: $('#cant_capacitadosCap').val(),
        semillero_id: id_Sem1,
        linea_id: id_LineaR,
        plan_accion_id: id_PlanR,
        proy_id: id_Proyect,
      
    
      
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

            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
                obtenerDatosCapacitaciones();
                cerrarItemPlanLineas;
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


function obtenerDatosLineas_has_proyectos() {
    

 
    let order = {
        plan:id_PlanR,
        linea:id_LineaR,
        proyecto:id_Proyect,
   
 
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

function listadoLineas_proyectos(li_inv3) {

    let tabla = $("#listadoTablalinea_pro").DataTable();
    tabla.data().clear();
    tabla.rows.add(li_inv3).draw();
}

function DeleteCapacitacionesP(id_order, id_proCap) {
    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Registros ',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar este Registro?',
        function() {
            eliminarCapacitacionesP(id_order, id_proCap);
        }
    );
}


/**
 * 
 * @param {type} id
 * @param {type} proy_id
 * @return {undefined}
 */

function registrarLineas_semilleros() {
  
   
    id_Sem1=Utilitario.getLocal('id_semillero');
//    id_Proyect=$('#proyecto_linea2').val();
//    id_PlanR=$('#id_planReg').val();
//    id_LineaR=$('#lineas_investigacion2').val();
//    id_LineaR=$('#anio').val();
//    id_LineaR=$('#lineas_investigacion2').val();
      
    let ordenes = {
       
        anio: $('#anio').val(),
        semestre: $('#semestre').val(),
        semillero_id: id_Sem1,
        linea_id:$('#lineas_investigacion2').val(),
        plan_accion_id: $('#id_planReg').val(),
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
              
                cerrarModalActividades()();
                console.log("exitoso");
                
                  obtenerDatosLineas_has_proyectos();
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
   $('#myModalActividades').modal({show: true});
    $("#btnOrderReg").show();
    $("#btnOrderAct").hide();
}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function cerrarModalActividades () {
       $("#mostrarModalRegistro").hide();
    $("#ModalTablaplan2").hide();
   
    $("#ModalTablaRegistroPlan").hide();
    $("#ModalDatosPlan").hide();
   
    $("#mostrarModalRegistro").show();
     $("#OtrasACtividades").show();
    
      
       
     


}



/**
 * @method AlumnoEliminar
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarCapacitacionesP(id,proy_id) {


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


                MostrarDatosActividadesP(proy_id);
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

function iniciarTablaOtrasCapacitaciones() {  /** tabla de otras actividades*/

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





function  MostrarDatosOtrasCap($semillero_id,$id_planReg) {
    
      let order = {
        semillero_id:$semillero_id,
        plan:$id_planReg,
 
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Otras_actividadesController_List.php", {
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


function AgregarOtrasCapcitaciones() {
  

    $semillero_id = Utilitario.getLocal('id_semillero');
    $id_planReg = $('#id_planReg').val();
//    
//    nombre_actividadO = $("#nombre_actividadO").val();
//    modalidad_participacionO = $("#modalidad_participacionO").val();
//    fecha_realizacionO = $("#fecha_realizacionO").val();
//    productoO = $("#productoO").val();
//    responsableO = $("#responsableO").val();
//
//    semillero_id = Utilitario.getLocal('id_semillero');
//    anio = $("#anio").val();
//    semestre = $("#semestre").val();
//    linea_investigacion_id = $("#lineas_investigacion2").val();
//    proyectos_id = $("#proyecto_linea2").val();
//    plan_accion_id: $('#id_planReg').val(),
//
//      
    let ordenes = {
    nombre_proyectoO : $("#nombre_proyectoO").val(),
    nombre_actividadO : $("#nombre_actividadO").val(),
    modalidad_participacionO : $("#modalidad_participacionO").val(),
    fecha_realizacionO :$("#fecha_realizacionO").val(),
    productoO : $("#productoO").val(),
    responsableO :$("#responsableO").val(),

    semillero_id : Utilitario.getLocal('id_semillero'),
    anio : $("#anio").val(),
    semestre : $("#semestre").val(),
    linea_investigacion_id : $("#lineas_investigacion2").val(),
    proyectos_id :$("#proyecto_linea2").val(),
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
                MostrarDatosOtrasCap($semillero_id,$id_planReg);
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

  
 var   proyec=$('#proyecto_linea2').val();
 var   planss=$('#id_planReg').val();
   
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


               MostrarDatosActividadesP(planss,proyec);
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


function ModalOtrasCapacitaciones() {
    
   $('#ModalOtrasCapacitaciones').modal({show: true});
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
     
    
   
    
   $('#btnContinuarActividades').prop('disabled', false);
   
    cargarDatosProyectosLineasI2(area);
}
function cargarDatosProyectosLineasI2(area) {
  
 
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
   $('#myModalPublicaciones').modal({show: true});
    $("#btnOrderReg").show();
    $("#btnOrderAct").hide();
}