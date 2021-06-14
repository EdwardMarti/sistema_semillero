$(document).ready(function () {
    let msg_culminacion_tour = 'Tour de registro de solicitud de horas completado';
    // Instance the tour
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#step_1_tour",
                title: "Terminados",
                content: "Muestra los proyectos que fueron finalizados.",
                placement: "top",
                backdrop: true,
                onShow:()=>{
                    document.getElementById("_menuActividadesTour").click();
                }
            }
        ],
        onEnd:() => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.listadoProyectos_t();
                document.getElementById("_menuActividadesTour").click();
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