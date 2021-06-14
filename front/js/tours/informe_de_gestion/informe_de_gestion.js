$(document).ready(function () {
    let msg_culminacion_tour = "Tour de informe de gestion completado";
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#step_1_tour",
                title: "Actividades",
                content: "En esta seccion podras ver las actividades relacionadas a una linea de investigacion ademas de poder <strong>agregar</strong> o <strong>eliminar</strong> actividades.",
                placement: "top",
                backdrop: true,
                onShow: () => {
                    document.getElementById("_menuInformeDeGestionTour").click();
                },
            }
        ],
        onEnd: () => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.listadoInformes();
                document.getElementById("_menuInformeDeGestionTour").click();
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
