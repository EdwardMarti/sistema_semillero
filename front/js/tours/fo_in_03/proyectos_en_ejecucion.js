$(document).ready(function () {
    let msg_culminacion_tour = "Tour de proyectos terminados completado";
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#accordionExample",
                title: "Gestion Proyectos",
                content: "Cada item de este menu le permitira modificar los datos relacionados a un semillero.",
                placement: "top",
                backdrop: true,
                onShow: () => {
                    document.getElementById("_fo_in_03").click();
                    $("#collapseOne").toggle();
                },
                onHide:()=>{
                    $("#collapseOne").toggle();
                }
            },
            {
                element: "#collapseOne",
                title: "Opciones",
                content: "Cada item es una vista con informacion para modificar o visualizar.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseOne").toggle();
                    $("#collapseTwo").toggle();
                },
            },
            {
                element: "#collapseTwo",
                title: "Opciones",
                content: "Cada item es una vista con informacion para modificar o visualizar.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseTwo").toggle();
                    $("#collapseThree").toggle();
                },
            },{
                element: "#collapseThree",
                title: "Opciones as",
                content: "Cada item es una vista con informacion para modificar o visualizar.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseThree").toggle();
                    $("#collapseFour").toggle();
                },
            },
            {
                element: "#collapseFour",
                title: "Opciones",
                content: "Cada item es una vista con informacion para modificar o visualizar.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseFour").toggle();
                    $("#collapseFive").toggle();
                },
            },{
                element: "#collapseFive",
                title: "Opciones",
                content: "Cada item es una vista con informacion para modificar o visualizar.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseSix").toggle();
                    $("#collapseFive").toggle();
                },
            },{
                element: "#collapseSix",
                title: "Opciones",
                content: "Cada item es una vista con informacion para modificar o visualizar.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseSix").toggle();
                },
            }
        ],
        onEnd: () => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.proyectosEjecucion();
                document.getElementById("_fo_in_03").click();
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
