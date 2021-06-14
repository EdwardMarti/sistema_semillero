$(document).ready(function () {
    let msg_culminacion_tour = "Tour de plan de accion completado";
    var tour = new Tour({
        framework: "bootstrap4",
        steps: [
            {
                element: "#step_1_tour",
                title: "Plan de estudios",
                content: "En esta seccion podras ver el listado del plan de estudios ademas de poder <strong>agregar</strong> o <strong>eliminar</strong> cuando asi lo requieras.",
                placement: "top",
                backdrop: true,
                onShow: () => {
                    document.getElementById("_menuPlanDeAccionTour").click();
                },
            },{
                element: "#step_2_tour",
                title: "Plan de accion",
                content: "En esta seccion podras gestionar los datos relacionados a el plan de accion de los semilleros de investigacon.",
                placement: "top",
                backdrop: true,
                onHide:()=>{
                    $("#collapseOne").toggle();
                }
            },
            {
                element: "#collapseOne",
                title: "Actividades",
                content: "En esta seccion podras registrar las actividades del semillero.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseOne").toggle();
                    $("#collapseTwo").toggle();
                },
            },
            {
                element: "#collapseTwo",
                title: "Capacitaciones",
                content: "En esta seccion podras registrar las capacitaciones del semillero.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseTwo").toggle();
                    $("#collapseThree").toggle();
                    $("#collapseFour").toggle();
                },
            },{
                element: "#step_3_tour",
                title: "Lineas de investigacion",
                content: "En esta seccion podras ver y registrar lineas de investigacion.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseThree").toggle();
                    $("#collapseFour").toggle();
                },
            },
            {
                element: "#collapseFour",
                title: "Actividades",
                content: "En esta seccion podras ver actividades de investigacion ademas de poder <strong>agregar</strong> o <strong>eliminar</strong> alguna actividad <de></de> investigacion.",
                placement: "top",
                backdrop: true,
                onHide: () => {
                    $("#collapseFour").toggle();
                },
            },
        ],
        onEnd: () => {
            Mensaje.mostrarMsjExito(msg_culminacion_tour, "Felicitaciones", () => {
                Menu.añadirPlan();
                document.getElementById("_menuPlanDeAccionTour").click();
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
