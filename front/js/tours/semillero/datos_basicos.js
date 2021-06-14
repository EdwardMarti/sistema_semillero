$(document).ready(function () {
    let msg_culminacion_tour = "Tour de uso de la seccion datos basicos de un semillero completado";
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#accordionExample",
                title: "Gestion de datos basicos",
                content: "Cada item de este menu le permitira modificar los datos relacionados a un semillero.",
                placement: "top",
                backdrop: true,
                onShow: () => {
                    document.getElementById("_menuSemilleroTour").click();
                    $("#collapseOne").toggle();
                },
                onHide: () => {
                    $("#collapseOne").toggle();
                },
            },
            {
                element: "#collapseOne",
                title: "Datos Generales",
                content: "Agrege o modifique cualquiera de estos datos cuando lo crea conveniente y guarde los cambios dando click en el boton <strong>Actualizar</strong>.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseOne").toggle();
                    $("#collapseTwo").toggle();
                },
            },
            {
                element: "#collapseTwo",
                title: "Lineas de Investigacion",
                content: "En esta seccion podras ver las lineas de investigacion ademas de poder <strong>agregar</strong> o <strong>eliminar</strong> alguna linea de investigacion.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseTwo").toggle();
                    $("#collapseThree").toggle();
                },
            },
            {
                element: "#collapseThree",
                title: "Informacion acerca del tutor de semillero",
                content: "Agrege o modifique cualquiera de estos datos cuando lo crea conveniente y guarde los cambios dando click en el boton <strong>Actualizar</strong>.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseThree").toggle();
                    $("#collapseFour").toggle();
                },
            },
            {
                element: "#collapseFour",
                title: "Titulos obtenidos",
                content: "En esta seccion podras ver los titulos obtenidos ademas de poder <strong>agregar</strong> o <strong>eliminar</strong> titulos cuando lo requieras.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseFour").toggle();
                },
            }
        ],
        onEnd: () => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.MonstrarPerfilSemillero();
                document.getElementById("_menuSemilleroTour").click();
            });
        },
    });
    tour._options["template"] = tour._options["template"].replace("Next", "Siguiente");
    tour._options["template"] = tour._options["template"].replace("Prev", "Anterior");
    tour._options["template"] = tour._options["template"].replace("End tour", "Finalizar");

    $(".startTour").click(function () {
        tour.restart();
    });
});
