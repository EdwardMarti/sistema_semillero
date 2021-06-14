$(document).ready(function () {
    let msg_culminacion_tour = 'Tour de gestion de facultad completado';
    // Instance the tour
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#step_1_tour",
                title: "Gestion Facultades",
                content: "En esta seccion podras ver las facultades y podras <strong>agregar</strong> o <strong>eliminar</strong> facultades.",
                placement: "top",
                backdrop: true,
                onShow:()=>{
                    document.getElementById("_menuGestionFacultadesTour").click();
                }
            }
        ],
        onEnd:() => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.listadoFacultades();
                document.getElementById("_menuGestionFacultadesTour").click();
            });
        }
    });
    tour._options['template'] = tour._options['template'].replace('Next', 'Siguiente');
    tour._options['template'] = tour._options['template'].replace('Prev', 'Anterior');
    tour._options['template'] = tour._options['template'].replace('End tour', 'Finalizar');

    $('.startTour').click(function () {
        tour.restart();
    })

});