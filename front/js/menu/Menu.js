/**
 * Clase encargada de realizar las interacciones necesarias con la vista de Menu.
 *
 **/
class Menu {

    /**
     * @method cargarMenu
     * MÃ©todo que se encarga de ocultar los modulos a los que el usuario no tenga permisos.
     * AdemÃ¡s, se encarga de obtener el nombre del usuario de localStorage y mostrarlo en pantalla.
     *
     */
    static cargarMenu() {
        const {...usuario} = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
        //Se carga el nombre del usuario.
        //        this.validarSesison();
        this.mostrarNombresUsuario();

        // Oculta los modulos si el usuario no es SuperAdmin
        if (usuario.rol === 1) {
            //
        } else if (usuario.rol === 2) { //Supervisor
            $("#menuUsuarios").remove();
        } else if (usuario.rol === 3) { //Inspector
            $("#menuUsuarios").remove();
        }
    }

    /**
     * @method mostrarNombresUsuario
     * MÃ©todo que se encarga de mostrar el nombre del usuario en el mensaje de bienvenida.
     *
     */
    static mostrarNombresUsuario() {
        const {...usuario} = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
        $("#nombreUsuario").html(usuario.displayName);
    }

    /**
     * @method validarSesison
     * MÃ©todo que se encarga de ver si el user puede acceder al portal
     *
     */
    static validarSesison() {
        /* if (Utilitario.getLocal("userId") === "") {
            window.location.href = "../login.html";
        } */
    }

    /**
     * @method listadoUsuarios
     * Metodo que se encarga de mostrar los usuarios registrados
     */
    static listadoUsuarios() {
        const {...usuario} = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
        Utilitario.agregarMascara();
        fetch("listadoUsuarios.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                (usuario.rol === 3 || usuario.rol === 2) ?
                    window.location.href = "principal.html" : $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method listadoOrdenes
     * Metodo que se encarga de mostrar las ordenes registradas
     */
    static listadoOrdenes() {
        console.log('ordenes');
        const {...usuario} = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
        Utilitario.agregarMascara();
        fetch("listadoOrdenes.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
                /*(usuario.rol == = 1 || usuario.rol === 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method listadoFacultades
     * Metodo que se encarga de mostrar las ordenes registradas
     */
    static listadoFacultades() {
        const {...usuario} = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
        Utilitario.agregarMascara();
        fetch("listadoFacultades.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
                /*(usuario.rol == = 1 || usuario.rol === 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static listadoProyectos_t() {

        Utilitario.agregarMascara();
        fetch("listadoProyectos_t.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static listadoProyectos_e() {

        Utilitario.agregarMascara();
        fetch("listadoProyectos_e.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static listadoCapacitaciones() {

        Utilitario.agregarMascara();
        fetch("listadoCapacitaciones.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static editar_Plan(id_order, id_sem) {


        Utilitario.agregarMascara();
        fetch("editar_PlanAccion.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

                obtenerDatosLineas_has_proyectos2(id_order);
//                   document.getElementById("id_planReg").value = id_order;
//                 document.getElementById("id_Semillero").value = id_sem;
            })
            .finally(function () {


                Utilitario.quitarMascara();
            });
    }

    static listadoPonencias() {

        Utilitario.agregarMascara();
        fetch("listadoPonencias.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static listadoActividades() {

        Utilitario.agregarMascara();
        fetch("listadoActividades.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static listadoInformes() {

        Utilitario.agregarMascara();
        fetch("añadirPlanGestion.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }


    static formatoInformes() {

        Utilitario.agregarMascara();
        fetch("formato_informe.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static listadoPublicaciones() {

        Utilitario.agregarMascara();
        fetch("listadoPublicaciones.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static listadoAlumnos() {

        Utilitario.agregarMascara();
        fetch("listadoEstudiantes.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static listadoPares() {

        Utilitario.agregarMascara();
        fetch("listadoPares.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static MonstrarRegistrarSemillero() {

        Utilitario.agregarMascara();
        fetch("registroSemillero.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static MonstrarEstadoSemillero() {

        Utilitario.agregarMascara();
        fetch("estadoSemillero.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static MonstrarPerfilSemillero() {

        Utilitario.agregarMascara();
        fetch("perfilSemillero.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static listadoSemilleros_p() {

        Utilitario.agregarMascara();
        fetch("listadoSemillero_p.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);

            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    //<editor-fold defaultstate="collapsed" desc="Actas">
    /**
     *
     * @return {undefined}
     */
    static mostrarRangos() {

        Utilitario.agregarMascara();
        fetch("listadoRangos.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    //</editor-fold>

    //<editor-fold defaultstate="collapsed" desc="Actas Danadas">
    static mostrarDanadas() {

        Utilitario.agregarMascara();
        fetch("listadoDanadas.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    //</editor-fold>


    static añadirPlan() {

        Utilitario.agregarMascara();
        fetch("añadirPlanAccion.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    /**
     * carga en la vista principal el formulario para registrar las horas
     * de investigacion para directores de semillero
     */
    static loadFormSolicitudHorasAdmin() {
        Utilitario.agregarMascara();
        fetch("formRegistroHorasInvestigacion.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static loadFormSolicitudHorasDocente() {

        Utilitario.agregarMascara();
        fetch("formRegistroHorasInvestigacionDocente.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static proyectosTerminados() {

        Utilitario.agregarMascara();
        fetch("proyectosTerminados.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static proyectosEjecucion() {

        Utilitario.agregarMascara();
        fetch("proyectosEjecucion.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    /**
     * carga en la vista principal el formulario para registrar las horas
     * de investigacion para directores de semillero
     */
    static loadFormCumplimientoProductos() {
        Utilitario.agregarMascara();
        fetch("formRegistroCumplimientoProductos.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static registroHorasDocente() {
        Utilitario.agregarMascara();
        fetch("registroHorasDocente.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

    static editarHorasDocente(data) {
        console.log(data)
        Utilitario.agregarMascara();
        fetch("registroHorasDocente.html", {
            method: "GET",
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (vista) {
                $("#mostrarcontenido").html(vista);
                $(".registrar").hide();
                $(".actualizar").show();
                document.getElementById("semestre").value = data.semestre;
                document.getElementById("idSolicitud").value = data.id;
                document.getElementById("anio").value = data.anio;
            })
            .finally(function () {
                Utilitario.quitarMascara();
            });
    }

     static async solicitudesAutorizadas() {
        Utilitario.agregarMascara();
        await cargarVista("solicitudesAutorizadas.html");
        Utilitario.quitarMascara();
    }
    static async solicitudesRechazadas() {
        Utilitario.agregarMascara();
        await cargarVista("solicitudesRechazadas.html");
        Utilitario.quitarMascara();
    }
}