$(document).ready(function () {
    let msg_culminacion_tour = 'Tour de registro de solicitud de horas completado';
    // Instance the tour
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#tablaOrdenes",
                title: "Solicitudes",
                content: "Muestra todas las solicitudes de horas registradas .",
                placement: "top",
                backdrop: true,
                onShow:()=>{
                    document.getElementById("_menuSolicitudesTour").click();
                }
            }
        ],
        onEnd:() => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.loadFormSolicitudHoras();
                document.getElementById("_menuSolicitudesTour").click();
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