$(document).ready(function () {
    let msg_culminacion_tour = 'Tour de gestion de proyectos en ejecucion';
    // Instance the tour
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#step_1_tour",
                title: "Ejecucion",
                content: "Muestra los proyectos que se encuentran en ejecucion",
                placement: "top",
                backdrop: true,
                onShow:()=>{
                    document.getElementById("_menuActividadesTour").click();
                }
            }
        ],
        onEnd:() => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.listadoProyectos_e();
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