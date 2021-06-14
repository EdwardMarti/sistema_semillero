$(document).ready(function () {
    let msg_culminacion_tour = "Tour de uso de la seccion publicaciones de un semillero completado";
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#step_1_tour",
                title: "Publicaciones",
                content: "En esta seccion podras ver las publicaciones ademas de poder <strong>agregar</strong> o <strong>eliminar</strong> alguna publicacion.",
                placement: "top",
                backdrop: true,
                onShow: () => {
                    document.getElementById("_menuSemilleroTour").click();
                },
            }
        ],
        onEnd: () => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.listadoPublicaciones();
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
