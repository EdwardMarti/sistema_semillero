$(document).ready(function() {
    semille = Utilitario.getLocal('id_semillero');
    acti = "";
    var_regPlan = "";

        semillero_id: $('#id_Semillero').val();
        plan: $('#id_planReg').val();
    
    
    iniciarTablaOtrasCapacitaciones();
    iniciarTablalineas_proyectos_plan();


//     iniciarTabla();
//    iniciarTablaCapacitaciones();

//    cargarSelectLineas2(semille);

//    $("#ModalDatosPlan").hide();
//    $("#ModalTablaplan2").hide();
//    $("#collapseFour").hide();
//    $("#ModalTablaRegistroPlan").hide();
//    $("#mostrarModalRegistro").show();
//    $("#inicio_del_plan").hide();
//    $("#tabladeAcordeon").hide(); /** acordeones*/




});

$(window).on('load', function() {
    console.log('All assets are loaded');
      obtenerDatosLineas_has_proyectos2();
});

function MostrarDatosOtrasCap2() {

    let order = {
        semillero_id: $('#id_Semillero').val(),
        plan: $('#id_planReg').val(),
       

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


function iniciarTablalineas_proyectos_plan2() {

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



function obtenerDatosLineas_has_proyectos2(plan) {

    
 
    alert(plan);

     let  order = {
        plan: plan,
//        linea: id_LineaR,
//        proyecto: id_Proyect,


    };
    Utilitario.agregarMascara();
    fetch("../../back/controller/Lineas_Poryectos_PlanController_ListId_1_Act.php", {
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

function listadoLineas_proyectos2(li_inv3) {

    let tabla = $("#listadoTablalinea_pro").DataTable();
    tabla.data().clear();
    tabla.rows.add(li_inv3).draw();
}

