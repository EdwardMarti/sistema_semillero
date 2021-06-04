$(document).ready(function() {
    iniciarTabla();
    obtenerDatos(2);


});

//----------------------------------TABLA----------------------------------

/**
 * @method iniciarTabla
 * Metodo para instanciar la DataTable
 */
function iniciarTabla() {

    $("#listadoSemilleroStado").DataTable({
        responsive: true,
        ordering: false,
        paging: false,
        searching: false,
        info: false,
        lengthChange: false,
        language: {
            emptyTable: "Sin Semilleros...",
            search: "Buscar:",
            info: "_START_ de _MAX_ registros", //_END_ muestra donde acaba _TOTAL_ muestra el total
            infoEmpty: "Ningun registro 0 de 0",
            infoFiltered: "(filtro de _MAX_ registros en total)",
         
        },
        columns: [
           {
                data: "id",
                className: "text-center",
                orderable: true,
                visible: false,
            },
            {
                data: "fecha_creacion",
                className: "text-center",
                orderable: true,
            },
            {
                data: "aval_dic_grupo",
                className: "text-center",
                orderable: true,
            },
            {
                data: "aval_dic_sem",
                className: "text-center",
                orderable: true,
            },
            {
                data: "aval_dic_unidad",
                className: "text-center",
                orderable: true,
            },
    
            
                  
        ],
   
        
    });

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

function obtenerDatos(id) {
    let semillero = {
        id: id,
  
    };
    fetch("../../back/controller/SemilleroController_List_stado.php", {
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
            console.log(data.semilleroS,'data  semillero');
            listadosemillero_p(data.semilleroS);
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


//----------------------------------HELPERS----------------------------------


function listadosemillero_p(semillero_p) {

    let tabla = $("#listadoSemilleroStado").DataTable();
    tabla.data().clear();
    tabla.rows.add(semillero_p).order( [ 0, 'asc' ] ).draw();
}

function selectInspectores(orders) {
    let options = '<option value="-1">SELECCIONE UN ROL</option>';
    orders.forEach(function(ins) {
        options += '<option value="' + ins.id + '">' + ins.nombres + '</option>'
    });
    $('#inspector').html(options);
}





