$(document).ready(function () {
    let msg_culminacion_tour = 'Tour de funcionamiento de la seccion jornadas completado';
    // Instance the tour
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#btnAgregarJornada",
                title: "Agregar Jornada",
                content: "Da click el boton <strong>Agregar</strong> para registrar una nueva jornada academica.",
                placement: "top",
                backdrop: true,
                onHide: function (tour) { mostrarModalJornada(); },
            },
            {
                element: "#nombre",
                title: "Asignale un Nombre",
                content: "Escribe en este campo el nombre que le asignaras a la nueva jornada academica.",
                placement: "top",
                backdrop: true,
            },
            {
                element: "#btnJornadaReg",
                title: "Guardar",
                content: "Da click el boton <strong>Registrar</strong> para guardar la nueva jornada academica.",
                placement: "bottom",
                backdrop: true,
                onHide: function (tour) { ocultarModalJornada(); },
            },
            {
                element: "#modalJornada",
                title: "Jornadas",
                content: "Aqui veras el listado de todas las jornadas academicas existentes.",
                placement: "bottom",
                backdrop: true,

            },
            {
                element: "#btnEditarJornada",
                title: "Editar",
                content: "Da click el icono <strong>Gestionar</strong> si deseas hacerle cambios a la jornada academica.",
                placement: "bottom",
                backdrop: true,
                onHide: function (tour) { mostrarModalJornada(); },/*revisar*/
            },
            {
                element: "#nombre",
                title: "Modificar",
                content: "Escribe en este campo el nuevo nombre que deseas asignara a la jornada academica.",
                placement: "top",
                backdrop: true,
            },
            {
                element: "#btnJornadaReg",
                title: "Guardar Cambios",
                content: "Da click el boton <strong>Registrar</strong> si le cambiaste el nombre a la jornada academica para guardar los cambios realizados.",
                placement: "bottom",
                backdrop: true,
            }
        ],
        onEnd: function (tour) {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => { Menu.mostrarJornadas(); });

        }
    });
    tour._options['template'] = tour._options['template'].replace('Next', 'Siguiente');
    tour._options['template'] = tour._options['template'].replace('Prev', 'Anterior');
    tour._options['template'] = tour._options['template'].replace('End tour', 'Finalizar');

    $('.startTour').click(function () {
        tour.restart();

    })

});