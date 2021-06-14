$(document).ready(function () {
    iniciarTabla();
    cargarCumplimientoProductos();
});

document.getElementById("porcentaje").addEventListener("change", () => {
    let porcentaje = document.getElementById("porcentaje").value;
    document.getElementById("_porcentaje").textContent = `${porcentaje} %`;
});
document.getElementById("inlineRadioSemestre1").addEventListener("click", () => {
    let semestre = document.getElementById("inlineRadioSemestre1").value;
    document.getElementById("_descripcion_semestre").textContent = semestre;
});
document.getElementById("inlineRadioSemestre2").addEventListener("click", () => {
    let semestre = document.getElementById("inlineRadioSemestre2").value;
    document.getElementById("_descripcion_semestre").textContent = semestre;
});
document.getElementById("anio").addEventListener("change", () => {
    let anio = document.getElementById("anio").value;
    document.getElementById("_anio_descripcion_semestre").textContent = anio;
});
document.getElementById("addProduct").addEventListener("click", () => {
    let product = document.getElementById("newProduct").value;

    if (product != "" && product != undefined) {
        document.getElementById("newProduct").value = "";
        let productos = JSON.parse(localStorage.getItem('pdts'));
        if (productos != undefined){
            productos[product]=product;
            localStorage.setItem('pdts', JSON.stringify(productos));
        }else{
            let data = {}
            data[product]=product;
            localStorage.setItem('pdts', JSON.stringify(data));
        }
        let str = "";
        for(let i in productos){
            str += `<span class="text-black ml-2" name="product_item">${productos[i]}</span><br>`;
        }
        document.getElementById("productos").innerHTML = str;
    }
});
document.getElementById("grupo_investigacion").addEventListener("change", () => {
    loadSelectSemilleros();
});

findSemilleros = (idGrupoInvestigacion) => (
    fetch("../../back/controller/SemilleroController_Perfil_Semillero.php", POST({id: idGrupoInvestigacion}))
        .then((response) => (response.ok ? response.json() : null))
        .then((data) => (data.semilleroPer))
);

findGruposInvestigacion = () => (
    fetch("../../back/controller/Grupo_investigacionController_List.php", GET({}))
        .then((response) => (response.ok ? response.json() : null))
        .then((data) => (data.gp_i))
);

loadSelectSemilleros = () => {
    findSemilleros(document.getElementById("grupo_investigacion").value)
        .then((semilleros) => {
            let data = semilleros.map((item) => ({id: item.id, name: item.nombre}));
            buildSelect("semillero", data);
        })
}


function cargarCumplimientoProductos() {
    fetch("../../back/controller/CumplimientoController.php", GET({id:2}))
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        }).then((data)=>{
        console.log(data)
        loadTabla(data.data);
    })
        .catch(function (promise) {
            if (promise.json) {
                promise.json().then(function (response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
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

function loadTabla(data) {
    let tabla = $("#listadoCumplimiento").DataTable();
    tabla.data().clear();
    tabla.rows.add(data).draw();
}

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTabla() {
    $("#listadoCumplimiento").DataTable({
        responsive: true,
        ordering: true,
        paging: true,
        searching: true,
        info: true,
        lengthChange: false,
        language: {
            emptyTable: "Sin Solicitudes...",
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
                data: "dirigido_id",
                className: "text-center",
                orderable: true,
            },
            {
                data: "descripcion",
                className: "text-center",
                orderable: true,
            },

            {
                data: "porcentaje",
                className: "text-center",
                orderable: true,
            },
            {
                data: "semestre",
                className: "text-center",
                orderable: true,
            },
            {
                data: "ano",
                className: "text-center",
                orderable: true,
            },
            // {
            //     data: "productos",
            //     className: "text-center",
            //     orderable: true,
            // },
            {
                data: "acepta_uno_id",
                className: "text-center",
                orderable: true,
            },
            {
                data: "acepta_dos_id",
                className: "text-center",
                orderable: true,
            },
            {
                orderable: false,
                defaultContent: [
                    "<div class='text-center'>",
                    "<a class='text-secondary actualizar' title='Modificar'><i class='fa fa-edit'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='text-secondary make-pdf' title='Ver en formato PDF'><i class='fa fa-file-o'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "<a class='text-danger eliminar' title='Eliminar'><i class='fa fa-trash-o'></i>&nbsp; &nbsp;  &nbsp;</a>",
                    "</div>",
                ].join(""),
            },

        ], rowCallback: function (row, data, index) {
            $(".actualizar", row).click(function () {
                editarCumplimiento(data);
            });
            $(".make-pdf", row).click(function () {
                makeCumplimientoPdf(data);
            });
            $(".eliminar", row).click(function () {
                Mensaje.mostrarMsjConfirmacion(
                    'Eliminar Solicitud',
                    'Este proceso es irreversible , ¿esta seguro que lo deseas eliminar?',
                    function () {
                        deleteCumplimiento(data.id);
                    }
                );
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

function registrarCumplimiento() {
    // Utilitario.validForm(['grupo_investigacion', 'anio', 'semillero',
    //     'porcentaje', 'horas_solicitadas'
    // ]);

    let grupo = SELECTED_ITEM("grupo_investigacion");
    let cumplimiento = {
        grupo_investigacion: VAL("grupo_investigacion"),
        anio: VAL("anio"),
        semillero_id: VAL("semillero"),
        porcentaje: VAL("porcentaje"),
        semestre: IS_CHECKED("inlineRadioSemestre1") ? 1 : 2,
        recomendacion_horas: IS_CHECKED("horas_investigacion"),
        cumple_requisitos: IS_CHECKED("cumple_productos_exigidos"),
        productos: localStorage.getItem('pdts'),
        dirigido_id: VAL("semillero"),
        descripcion: grupo.text
    }
    localStorage.removeItem('pdts');
    fetch("../../back/controller/CumplimientoController.php", POST(cumplimiento))
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function (data) {
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            cargarCumplimientoProductos();
            closeModalCumplimiento();
        })
        .catch(function (promise) {

            if (promise.json) {
                promise.json().then(function (response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
                            Utilitario2.cerrarSesion();
                        });
                    } else if (mensaje) {
                        Mensaje.mostrarMsjError("Error", mensaje);
                    }
                });
            } else {
                // Mensaje.mostrarMsjError(
                //     "Error",
                //     "Ocurrió un error inesperado. Intentelo nuevamente por favor."
                // );
            }
        });
}

function actualizarCumplimiento() {
    // Utilitario.validForm(['anio', 'semestre', 'horas_catedra',
    //     'horas_planta', 'horas_solicitadas', 'id'
    // ]);
    let solicitudHora = {
        id: document.getElementById("id").value,
        anio: document.getElementById("anio").value,
        semestre: document.getElementById("semestre").value,
        horas_catedra: document.getElementById("horas_catedra").value,
        horas_planta: document.getElementById("horas_planta").value,
        horas_solicitadas: document.getElementById("horas_solicitadas").value,
    }
    console.log(solicitudHora);
    fetch("../../back/controller/Solicitud_horasControllerUpdate.php", PUT({}))
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function (data) {
            Mensaje.mostrarMsjExito("Registro Exitoso", data.mensaje);
            cargarHorasBySemillero();
            closeModalRegistroHoras();
        })
        .catch(function (promise) {

            if (promise.json) {
                promise.json().then(function (response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
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
eliminarProducto = (id) =>{
    console.log(id);
}
function editarCumplimiento({id, ano, porcentaje, productos, acepta_uno_id, acepta_dos_id}) {
    document.getElementById("btnActualizar").style.display = "inline";
    document.getElementById("btnRegCumpliento").style.display = "none";
    document.getElementById("id").value = id;
    document.getElementById("anio").value = ano;
    document.getElementById("porcentaje").value = porcentaje;
    document.getElementById("_porcentaje").textContent = `${porcentaje} %`;

////acepta_uno_id
    document.getElementById("horas_investigacion").checked=(acepta_uno_id=="1");
    document.getElementById("cumple_productos_exigidos").checked=(acepta_dos_id=="1");
    productos = JSON.parse(productos);

    let str = "";
    for(let i in productos){
        str += `<span class="text-black ml-2" name="product_item">${productos[i]}</span><a class=' ml-2 onclick="javascript:eliminarProducto(23)"' text-danger eliminar' title='Eliminar'><i class='fa fa-trash-o'></i>&nbsp; &nbsp;  &nbsp;</a><br>`;
    }
    localStorage.setItem('pdts', JSON.stringify(productos));
    document.getElementById("productos").innerHTML = str;
    // document.getElementById("horas_catedra").value = horas_catedra;
    // document.getElementById("horas_planta").value = horas_planta;
    // document.getElementById("horas_solicitadas").value = horas_solicitadas;
    openModalRegistroHoras();
}

function deleteCumplimiento(id) {
    fetch("../../back/controller/CumplimientoController.php", DELETE({id}))
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function (data) {
            Mensaje.mostrarMsjExito("Removido Correctamente", data.mensaje);
            cargarCumplimientoProductos();
        })
        .catch(function (promise) {

            if (promise.json) {
                promise.json().then(function (response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
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

function openModalRegistroHoras() {
    $('#modalCumplimiento').modal({show: true});
    findGruposInvestigacion().then((grupos) => {
        let data = grupos.map((item) => ({id: item.id, name: item.nombre}));
        buildSelect("grupo_investigacion", data);
        loadSelectSemilleros();
    });
}

function closeModalCumplimiento() {
    $('#modalCumplimiento').modal("hide");
    document.getElementById("btnActualizar").style.display = "none";
    document.getElementById("btnOrderReg").style.display = "inline";
}

function makeCumplimientoPdf(data) {
    let productos = JSON.parse(data.productos);
    let str = "";
    for(let i in productos){
        str += `${productos[i]}, `;
    }
    data.productos = str;
    fetch("../../back/controller/CumplimientoControllerReporte.php", POST(data))
        .then(function (response) {
            if (response.ok) {
                return response.json();
            }

            throw response;
        })
        .then(function ({key}) {
            window.open(`reports/cumplimiento-productos/cumplimiento.php?token=${key}`, '_blank');
        })
        .catch(function (promise) {
            if (promise.json) {
                promise.json().then(function (response) {
                    let status = promise.status,
                        mensaje = response ? response.mensaje : "";
                    if (status === 401 && mensaje) {
                        Mensaje.mostrarMsjWarning("Advertencia", mensaje, function () {
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