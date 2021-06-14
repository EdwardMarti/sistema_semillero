$(document).ready(function() {
    $("#btnLnRegC").hide();
    $("#btnLnActC").hide();
    $("#btnLnRegU").hide();
    $("#btnLnActU").hide();
});

function mostrarModalUsuarios(btn) {
    $('#ModalUsuarios').modal({ show: true });

    if (btn === 'asesores') {
        $("#btnLnRegC").show();
        $("#btnLnRegU").hide();
        $("#btnLnActC").hide();
    } else {
        $("#btnLnRegU").show();
        $("#btnLnRegC").hide();
        $("#btnLnActU").hide();
    }
}

function cerrarModalUsuarios() {
    $('#ModalUsuarios').modal('hide');
}