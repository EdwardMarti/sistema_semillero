$(document).ready(function () {
    let msg_culminacion_tour = "Tour de uso de la seccion capacitaciones de un semillero completado";
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#step_1_tour",
                title: "Capacitaciones",
                content: "En esta seccion podras ver los datos relacionados a las capacitaciones ademas de poder <strong>agregar</strong> nuevas capacitaciones.",
                placement: "top",
                backdrop: true,
                onShow: () => {
                    document.getElementById("_menuSemilleroTour").click();
                },
            }
        ],
        onEnd: () => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.listadoCapacitaciones();
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
