$(document).ready(function() {


});

function mostrarModalProyectoInvestigacion() {
    
   $('#ModalLineas').modal({show: true});
    $("#btnLnReg").show();
    $("#btnLnAct").hide();
}

/**
 * @method ocultarModalOrdenes
 * Método que se encarga de cerrar el modal para registro o actualizacion
 */
function cerrarModalProyectoInvestigacion() {
     $('#ModalLineas').modal('hide');
}