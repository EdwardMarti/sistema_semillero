$(document).ready(function() {

   cargarSelectgrupos_investigacion();
    cargarSelectFacultades();
//    cargarSelectLinea_inv();
    cargarSelectTp_vin();


});

/**
 * @method mostrarModalOrdenes
 * Método que se encarga de abrir el modal para registro o actualizacion
 */
//function mostrarModalRegistro() {
////    limpiarcampos();
//    cargarSelectgrupos_investigacion();
//    cargarSelectFacultades();
//    cargarSelectLinea_inv();
//    cargarSelectTp_vin();
//   $('#myModalRegistro').modal({show: true});
////    $("#btnOrderReg").show();
////    $("#btnOrderAct").hide();
//}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function cerrarModalRegistro() {
     $('#myModalRegistro').modal('hide');
}


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
//
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
//
//<editor-fold defaultstate="collapsed" desc="Select Tipo Vinculacion">
function cargarSelectTp_vin() {
 
    fetch("../../../back/controller/Tipo_vinculacionController_List.php", {
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

//<editor-fold defaultstate="collapsed" desc="Registrar Semillero">
function registrarSemillero() {

    let semillero = {
        nombre: $('#nombre').val(),
        sigla: $('#sigla').val(),
        fecha: $('#fecha').val(),
        grupo_investigacion: $('#grupo_investigacion').val(),
        departamentos: $('#departamentos').val(),
        facultades: $('#facultades').val(),
        p_estudio: $('#p_estudio').val(),
        nombreD: $('#nombreD').val(),
        telefonoD: $('#telefonoD').val(),
        correoD: $('#correoD').val(),
        tp_vinculacion: $('#tp_vinculacion').val(),
       
    };

    Utilitario2.agregarMascara();
    fetch("../../../back/controller/SemilleroController_Inser.php", {
            method: "POST",
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
//                Authorization: JSON.parse(Utilitario2.getLocal("user")).token,
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
//            obtenerDatos();
            cerrarModalRegistro();
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
        })
        .finally(function() {
            Utilitario2.quitarMascara();
        });

}


//</editor-fold>
