$(document).ready(function () {
    let msg_culminacion_tour = 'Tour de administracion semileros completado';
    // Instance the tour
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#step_1_tour",
                title: "Pendientes",
                content: "En esta seccion podras ver los semilleros que estan en estado pendiente ademas podras <strong>agregar</strong> o <strong>eliminar</strong> semilleros.",
                placement: "top",
                backdrop: true,
                onShow:()=>{
                    document.getElementById("_menuAdmSemilleroTour").click();
                }
            }
        ],
        onEnd:() => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.listadoSemilleros_p();
                document.getElementById("_menuAdmSemilleroTour").click();
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