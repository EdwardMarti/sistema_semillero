$(document).ready(function() {
    let msg_culminacion_tour = "Tour de proyectos terminados completado";
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [{
                element: "#accordionExample",
                title: "Proyectos En Ejecucion",
                content: "Cada item de este menu le permitira modificar los datos relacionados a un proyecto.",
                placement: "top",
                backdrop: true,
                onShow: () => {
                    document.getElementById("_fo_in_03").click();
                    $("#collapseOne").toggle();
                },
                onHide: () => {
                    $("#collapseOne").toggle();
                }
            },
            {
                element: "#collapseOne",
                title: "Datos Generales",
                content: "Digite los datos que son requeridos y da click en <strong>Registrar</strong> para guardarlos <cambios></cambios>.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseOne").toggle();
                    $("#collapseTwo").toggle();
                },
            },
            {
                element: "#collapseTwo",
                title: "Asesores",
                content: "En esta seccion podras ver los asesores relacionados al proyecto ademas de poder <strong>agregar</strong> o <strong>eliminar</strong> cuando lo requieras.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseTwo").toggle();
                    $("#collapseThree").toggle();
                },
            }, {
                element: "#collapseThree",
                title: "Estudiantes",
                content: "En esta seccion podras ver los estudiantes relacionados al proyecto ademas de poder <strong>agregar</strong> o <strong>eliminar</strong> cuando lo requieras.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseThree").toggle();
                    $("#collapseFour").toggle();
                },
            },
            {
                element: "#collapseFour",
                title: "General",
                content: "Agrege los datos requeridos y guarde los cambios dando click en el boton <strong>Actualizar</strong>.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseFour").toggle();
                    $("#collapseFive").toggle();
                },
            }, {
                element: "#collapseFive",
                title: "Objetivos",
                content: "Agrege los datos requeridos y guarde los cambios dando click en el boton <strong>Actualizar</strong>.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseSix").toggle();
                    $("#collapseFive").toggle();
                },
            }, {
                element: "#collapseSix",
                title: "Fuentes",
                content: "En esta seccion podras ver las fuentes relacionados al proyecto ademas de poder <strong>agregar</strong> o <strong>eliminar</strong> cuando lo requieras.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseSix").toggle();
                },
            }
        ],
        onEnd: () => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.proyectosTerminados();
                document.getElementById("_fo_in_03").click();
            });
        },
    });
    tour._options["template"] = tour._options["template"].replace("Next", "Siguiente");
    tour._options["template"] = tour._options["template"].replace("Prev", "Anterior");
    tour._options["template"] = tour._options["template"].replace("End tour", "Finalizar");

    $(".startTour").click(function() {
        tour.restart();
    });
});