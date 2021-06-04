$(document).ready(function() {

var  sem_id='2';
  cargarSelectgrupos_investigacion();
  cargarSelectFacultades();
    
sleep(1000);

    cargarSelectTp_vin();
    
    
    
    cargarInfoSemillero(sem_id);
    
    cargarSelectArea();
    
    iniciarTablaS();
    
    obtenerDatosS(sem_id);
});

 function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}
//----------------------------------TABLA----------------------------------






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

function cargarInfoSemillero(id_order) {

    let semillero = {
        id: id_order,
  
    };
    fetch("../../back/controller/SemilleroController_Perfil_Semillero.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                 Plataform: "web",
            },
            body: JSON.stringify(semillero),
        })
        .then(function(response) {
//            console.log(response.ok);
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
//            console.log(data.semilleroPer,'data  semillero');
            dataItem(data.semilleroPer);
        })
        .catch(function(promise) {
            console.log("ptomridsf" ,promise.json);
            if (promise.json) {
                promise.json().then(function(response) {
                      console.log("respsada" ,response);
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
//                    "Ocurrió un error inesperado. Intentelo nuevamente por favor. aa"
//                );
            }
        });
}
function dataItem( data) {


    $('#id_semillero').val(data[0].id);
    $('#nombre').val(data[0].nombre);
    $('#sigla').val(data[0].sigla);
    $('#grupo_investigacion').val(data[0].grupo_investigacion_id);
    $('#departamentos').val(data[0].departamento);
    $('#facultades').val(data[0].facultad);
    var rptaFa=data[0].departamento;
    cargarSelectDepartamentosRpta(rptaFa);
    $('#p_estudio').val(data[0].p_estudio);
   var pRpta=data[0].p_estudio;
    cargarSelectPlanRpta(pRpta);
    $('#fecha').val(data[0].fecha_creacion);
    $('#nombreD').val(data[0].nombreD);
    $('#correoD').val(data[0].correoD);
    $('#telefonoD').val(data[0].telefonoD);
    $('#tp_vinculacion').val(data[0].tp_vinculacion);
//    $('#fecha').val(data.inspector).change();

 mostrarModalP();
}





//</editor-fold>


//<editor-fold defaultstate="collapsed" desc="Select Grupos de Investigacion">
function cargarSelectgrupos_investigacion() {

    fetch("../../back/controller/Grupo_investigacionController_List.php", {
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
           construirSelectgrupo_investigacion(data.gp_i);
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
function construirSelectgrupo_investigacion(gp_i) {
    $("#grupo_investigacion").empty();
    let input = $("#grupo_investigacion");
       let opcion = new Option("SELECCIONE", "-1");
        $(opcion).html("SELECCIONE");
        input.append(opcion);
    for (let index = 0; index < gp_i.length; index++) {
        let gpI = gp_i[index],
            opcion = new Option(gpI.nombre, gpI.id);
        $(opcion).html(gpI.nombre);
        input.append(opcion);
    }


}

//</editor-fold>


//<editor-fold defaultstate="collapsed" desc="Select Facultades">
function cargarSelectFacultades() {

    fetch("../../back/controller/FacultadControllerList.php", {
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
            construirSelectfalcultades(data.falcultades);
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
function construirSelectfalcultades(falcultades) {
    $("#facultades").empty();
    let input = $("#facultades");
     let opcion = new Option("SELECCIONE", "-1");
        $(opcion).html("SELECCIONE");
        input.append(opcion);
    for (let index = 0; index < falcultades.length; index++) {
        let falcultad = falcultades[index],
            opcion = new Option(falcultad.descripcion, falcultad.id);
        $(opcion).html(falcultad.descripcion);
        input.append(opcion);
    }


}

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Select Tipo Vinculacion">
function cargarSelectTp_vin() {
 
    fetch("../../back/controller/Tipo_vinculacionController_List.php", {
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
            construirSelecttp_vinculacion(data.tp_vinculacion);
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
function construirSelecttp_vinculacion(tp_vinculacion) {
    $("#tp_vinculacion").empty();
    let input = $("#tp_vinculacion");
         let opcion = new Option("SELECCIONE", "-1");
        $(opcion).html("SELECCIONE");
        input.append(opcion);
    for (let index = 0; index < tp_vinculacion.length; index++) {
        let tp_v = tp_vinculacion[index],
            opcion = new Option(tp_v.descripcion, tp_v.id);
        $(opcion).html(tp_v.descripcion);
        input.append(opcion);
    }


}

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Select Departaentos">
function cargarSelectDepartamentos(facultad) {
    

    let facultades = {
        facultad: facultad,
  
    };
    fetch("../../back/controller/DepartamentoController_List_id.php", {
            method: "POST",
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
                       
            construirSelectDepartamentos(data.departamento);
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

function cargarSelectDepartamentosRpta(facultad) {
    

    let facultades = {
        facultad: facultad,
  
    };
    fetch("../../back/controller/DepartamentoController_List_id_rpta.php", {
            method: "POST",
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
                       
            construirSelectDepartamentos2(data.departamento);
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
function construirSelectDepartamentos(departamento) {
    $("#departamentos").empty();
    let input = $("#departamentos");
     let opcion = new Option("SELECCIONE", "-1");
        $(opcion).html("SELECCIONE");
        input.append(opcion);
    for (let index = 0; index < departamento.length; index++) {
        let dpto = departamento[index],
            opcion = new Option(dpto.descripcion, dpto.id);
        $(opcion).html(dpto.descripcion);
        input.append(opcion);
    }


}

function construirSelectDepartamentos2(departamento) {
    $("#departamentos").empty();
    let input = $("#departamentos");
//     let opcion = new Option("SELECCIONE", "-1");
//        $(opcion).html("SELECCIONE");
//        input.append(opcion);
    for (let index = 0; index < departamento.length; index++) {
        let dpto = departamento[index],
            opcion = new Option(dpto.descripcion, dpto.id);
        $(opcion).html(dpto.descripcion);
        input.append(opcion);
    }


}

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Select plan de estudio">
function cargarSelectPlan(dpto) {
  let departamento = {
        dptos: dpto,
  
    };
    fetch("../../back/controller/Plan_estudiosController_List_id.php", {
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

function cargarSelectPlanRpta(dpto) {
  let departamento = {
        dptos: dpto,
  
    };
    fetch("../../back/controller/Plan_estudiosController_List_idrpta.php", {
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
            construirSelectPlan2(data.plan);
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

function construirSelectPlan2(planes) {
    $("#p_estudio").empty();
    let input = $("#p_estudio");
//         let opcion = new Option("SELECCIONE", "-1");
//        $(opcion).html("SELECCIONE");
//        input.append(opcion);
    for (let index = 0; index < planes.length; index++) {
        let plan = planes[index],
            opcion = new Option(plan.descripcion, plan.id);
        $(opcion).html(plan.descripcion);
        input.append(opcion);
    }


}

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Select Lineas de Investigacion">
function cargarSelectLinea_inv() {
 
    fetch("../../../back/controller/Linea_investigacionController_List.php", {
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
            construirSelectLinea_inv(data.li_inv);
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
function construirSelectLinea_inv(li_inv) {
    $("#linea_i").empty();
    let input = $("#linea_i");
         let opcion = new Option("SELECCIONE", "-1");
        $(opcion).html("SELECCIONE");
        input.append(opcion);
    for (let index = 0; index < li_inv.length; index++) {
        let plan = li_inv[index],
            opcion = new Option(plan.descripcion, plan.id);
        $(opcion).html(plan.descripcion);
        input.append(opcion);
    }


}

//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Select Areas">
function cargarSelectArea() {

    fetch("../../back/controller/AreaController_List.php", {
            method: "GET",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                 Plataform: "web",
            },
//            body: JSON.stringify(facultades),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            construirSelectArea(data.area);
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
    fetch("../../back/controller/Linea_investigacionController_ListId.php", {
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
            construirSelectlineas(data.li_inv);
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
function construirSelectlineas(li_inv) {
            $("#lineas_investigacion").empty();
    let input = $("#lineas_investigacion");
     let opcion = new Option("SELECCIONE", "-1");
        $(opcion).html("SELECCIONE");
        input.append(opcion);
    
  
    for (let index = 0; index < li_inv.length; index++) {
        let li_invs = li_inv[index],
            opcion = new Option(li_invs.descripcion, li_invs.id);
        $(opcion).html(li_invs.descripcion);
        input.append(opcion);
    }


}

//</editor-fold>

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTablaS() {

    //tabla de alumnos
    $("#listadoTablal").DataTable({
        responsive: false,
        ordering: false,
        paging: false,
        searching: false,
        info: false,
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
        columns: [
            {
                data: "linea",
                className: "text-center",
                orderable: false,
            },
            {
                data: "disciplina",
                className: "text-center",
                orderable: false,
            },

            {
                data: "area",
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

            $(".actualizar", row).click(function() {
                gestionarItem(id_order, data, index);
            });
            $(".eliminar", row).click(function() {
                DeleteOrder(id_order, data);
            });
        },
   
    });

}

//----------------------------------CRUD----------------------------------
/**
 * @method obtenerDatos
 * Método que se encarga de consumir el servicio que devuelve la data para la tabla de alumnos.
 */


function obtenerDatosS(semi) {
    
      let lista_sem = {
        id: semi,
      };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Sem_linea_investigacionController_ListId.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                //                Authorization: JSON.parse(Utilitario.getLocal("user")).token,
                Plataform: "web",
            },
               body: JSON.stringify(lista_sem),
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            console.log(data.linea_sem)
             listadoLi(data.linea_sem);
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

function listadoLi(linea_sem) {

    let tabla = $("#listadoTablal").DataTable();
    tabla.data().clear();
    tabla.rows.add(linea_sem).order( [ 0, 'asc' ] ).draw();
}

//<editor-fold defaultstate="collapsed" desc="CRUD">


function registrarLn() {
let sem_id_aux=$('#id_semillero').val();
    let ordenes = {
        id_semillero: $('#id_semillero').val(),
        ln: $('#lineas_investigacion').val(),
       
    };

    Utilitario.agregarMascara();
    fetch("../../back/controller/Sem_linea_investigacionController_Insert.php", {
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
            obtenerDatosS(sem_id_aux);
            cerrarModalLineas();
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


function gestionarItem(id_order) {
    
   
    cargarInfoTablaLn(id_order);

   
}

function cargarInfoTablaLn(id_order) {

    let semillero = {
        id: id_order,
  
    };
    fetch("../../back/controller/SemilleroController_Perfil_Semillero.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
                 Plataform: "web",
            },
            body: JSON.stringify(semillero),
        })
        .then(function(response) {
//            console.log(response.ok);
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
//            console.log(data.semilleroPer,'data  semillero');
            dataItemTablaLn(data.semilleroPer);
        })
        .catch(function(promise) {
            console.log("ptomridsf" ,promise.json);
            if (promise.json) {
                promise.json().then(function(response) {
                      console.log("respsada" ,response);
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
//                    "Ocurrió un error inesperado. Intentelo nuevamente por favor. aa"
//                );
            }
        });
}
function dataItemTablaLn( data) {


    $('#id_semillero').val(data[0].id);
    $('#nombre').val(data[0].nombre);
    $('#sigla').val(data[0].sigla);
    $('#grupo_investigacion').val(data[0].grupo_investigacion_id);
    $('#departamentos').val(data[0].departamento);
    $('#facultades').val(data[0].facultad);
    var rptaFa=data[0].departamento;
    cargarSelectDepartamentosRpta(rptaFa);
    $('#p_estudio').val(data[0].p_estudio);
   var pRpta=data[0].p_estudio;
    cargarSelectPlanRpta(pRpta);
    $('#fecha').val(data[0].fecha_creacion);
    $('#nombreD').val(data[0].nombreD);
    $('#correoD').val(data[0].correoD);
    $('#telefonoD').val(data[0].telefonoD);
    $('#tp_vinculacion').val(data[0].tp_vinculacion);
//    $('#fecha').val(data.inspector).change();

 mostrarModalP();
}


function ActualizarData() {

     let semillero = {
        id: $('#id_semillero').val(),
        nombre: $('#nombre').val(),
        sigla: $('#sigla').val(),
        fecha: $('#fecha').val(),
        grupo_investigacion: $('#grupo_investigacion').val(),
        departamentos: $('#departamentos').val(),
        facultades: $('#facultades').val(),
        p_estudio: $('#p_estudio').val(),
       
       
    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/SemilleroController_Update_datos.php", {
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



function DeleteOrder(id,data) {

    Mensaje.mostrarMsjConfirmacion(
        'Eliminar Orden',
        'Este proceso es irreversible , ¿esta seguro que desea eliminar la Linea de Investigacion?',
        function() {
            eliminarLn(id,data);
        }
    );
}


/**
 * @method AlumnoEliminar
 * Método que se encarga de eliminar el estudiante de todas la bd
 */
function eliminarLn(id,datos) {
let varSem=datos.semillero_id;
    let data = {
        id: id,

    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Sem_linea_investigacionController_Delete.php", {
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

            Mensaje.mostrarMsjExito("Borrado Exitoso", data.mensaje);

//            ocultarModalOrdenes()();
                obtenerDatosS(varSem);
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