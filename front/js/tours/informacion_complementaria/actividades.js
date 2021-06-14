$(document).ready(function () {
    let msg_culminacion_tour = 'Tour de gestion de actividades completado';
    // Instance the tour
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#step_1_tour",
                title: "Actividades",
                content: "En esta seccion podras ver las actividades ademas de poder <strong>agregar</strong> o <strong>eliminar</strong> actividades.",
                placement: "top",
                backdrop: true,
                onShow:()=>{
                    document.getElementById("_menuActividadesTour").click();
                }
            }
        ],
        onEnd:() => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.listadoActividades();
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