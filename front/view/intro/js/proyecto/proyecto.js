function listarProyectosFeria(idFeria, nFeria) {
    Utilitario.agregarMascara();
    fetch("../../../back/controller/ProyectoController_ListAllPortal.php?idFeria=" + idFeria, {
            method: "GET",
        })
        .then(function(response) {
            if (response.ok) {
                return response.json();
            }
            throw response;
        })
        .then(function(data) {
            listarProyectos(data, nFeria);
        })
        .catch(function(promise) {
            if (promise.json) {
                promise.json().then(function(response) {
                    var mensaje = response ? response.mensaje : "";
                    if (mensaje) {
                        //console.log(mensaje);
                    }
                });
            } else {
                console.log("Ocurrió un error inesperado. Intentelo nuevamente por favor.");
            }
        })
        .finally(function() {
            Utilitario.quitarMascara();
        });
}

function listarProyectos(data, nFeria) {
    var proyectos = "";
    var proyec = data.proyectos;
    var tamaño = proyec.length;

    banner = "<div class='container-fluid'>" +
        "<div class='row'>" +
        "<div class='col-md-5'>" +
        "<img class='programa'	src='../../resources/img/logo_programa_h.png' />" +
        "</div>" +

        "<div class='col-md-5 d-flex justify-content-end align-items-center text-center'>" +
        "<h1>" + data.nombre + "</h1>" +
        "</div>" +

        "<div class='col-md-2 d-flex justify-content-center align-items-center'>" +
        "<img class='ufps' src='../../resources/img/logo_ufps.png' />" +
        "</div>" +
        "</div>" +
        "</div>";

    for (let d = 0; d < tamaño; d++) {

        var integrantes = proyec[d].integrantes.length;
        var campos = proyec[d].campos.length;
        //integrantes
        if (integrantes != 0) {
            var txtintegrantes = "<b><label class='personalizado'>Integrantes:</label></b>";
            for (let c = 0; c < integrantes; c++) {
                txtintegrantes += "<p style='text-align:justify;'>" +
                    proyec[d].integrantes[c].nombres + " " +
                    proyec[d].integrantes[c].apellidos +
                    "</p>";
            }
        }

        //campos
        if (campos != 0) {
            var txtcampos = "";
            for (let a = 0; a < campos; a++) {

                if (proyec[d].campos[a].idTipoCampo == 3) {
                    txtcampos += "<b class='row mx-0 mt-2'><div class='px-0 col-md-12'><label class='personalizado'>" + proyec[d].campos[a].etiqueta + ":</label></div></b>" +
                        "<p style='text-align:justify;'>" +
                        proyec[d].campos[a].opcion +
                        "</p>";
                } else {
                    if (proyec[d].campos[a].valor.substr(0, 15) === '../../resources' && proyec[d].campos[a].valor.substr(0, 5) !== 'https') {
                        txtcampos += "<b><label class='personalizado'>" + proyec[d].campos[a].etiqueta + ":</label></b>" +
                            "<br><a class='personalizado' href='" + proyec[d].campos[a].valor + "' download='" + proyec[d].campos[a].etiqueta + "'>" + proyec[d].campos[a].etiqueta + " <i class='fa fa-download' aria-hidden='true'></i> </a><br><br>";
                    } else if (proyec[d].campos[a].valor.substr(0, 4) !== 'http') {
                        txtcampos += "<b><label class='personalizado'>" + proyec[d].campos[a].etiqueta + ":</label></b>" +
                            "<p style='text-align:justify;'>" +
                            proyec[d].campos[a].valor +
                            "</p>";
                    } else {

                        txtcampos += "<b><label class='personalizado'>" + proyec[d].campos[a].etiqueta + ":</label></b>" +
                            "<br><a class='personalizado' href='" + proyec[d].campos[a].valor + "'>" + proyec[d].campos[a].valor + "</a><br><br>";
                    }
                }
            }
        }
        //cuerpo

        txtintegrantes = (integrantes > 0) ? txtintegrantes : "";
        txtcampos = (campos > 0) ? txtcampos : "";

        tituloProyecto = (proyec[d].titulo.length < 130) ? proyec[d].titulo : (proyec[d].titulo).substr(0, 130) + "...";
        proyectos += "<div class='col-md-6'>" +
            "<div class='card' style='border-radius: 15px;'>" +
            "<div class='panel panel-heading' id='panel-heading' style='background:#a94442;'>" +
            "<h2 class='text-justify' style='color:white;padding-left: 10px;padding-right: 10px;' data-toggle='tooltip' data-placement='top' title='" + proyec[d].titulo + "'>" + tituloProyecto + "</h2><br>" +
            "</div>" +
            "<div class='panel panel-body scrollable-panel' style='padding-left: 10px;padding-right: 10px;'>" +
            "<br>" +
            "<p style='text-align:justify;'>" + proyec[d].resumen + "</p>" +
            "<b><label class='personalizado'>Linea de Investigación:</label></b>" +
            "<p style='text-align:justify;'>" + proyec[d].idLineaInvestigacion + "</p>" +
            "<b><label class='personalizado'>Materia:</label></b>" +
            "<p style='text-align:justify;'>" + proyec[d].idMateria + "</p>" +
            "<hr>" +
            txtintegrantes +
            txtcampos +
            "</div>" +
            "</div>" +
            "</div>";

        /*banner = "<div class='carousel-item active'>" +
            "<img class='d-block w-100' src='" + proyec[d].banner + "' alt='First slide' height='350px'>" +
            "</div>";*/

    }



    $(".TituloFeria").text(nFeria);
    $(".programa").text("Programa Ingenieria de Sistemas");
    $("#mostrarProyectos").html(tamaño > 0 ? proyectos : "<div class='col-md-12 text-left'><h1>No existen proyectos aprobados en la feria.</h1></div>");
    $("#bannerFerias").html(banner);
    $("#descripcionFeria").html(data.descripcion);
}