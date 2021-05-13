/**
 * Clase encargada de realizar las interacciones necesarias con la vista de Menu.
 *
 **/
class Menu {
    /**
     * @method validarSesion
     * MÃ©todo que se encarga de validar si existe una sesiÃ³n abierta.
     * Si no existe una sesiÃ³n redirige a la vista de Login.
     *
     */
//    static validarMenu() {
//        if (Utilitario.getLocal("sesionId") === "") {
//            window.location.href = "../login/login.html";
//        }
//    }

    /**
     * @method cargarMenu
     * MÃ©todo que se encarga de ocultar los modulos a los que el usuario no tenga permisos.
     * AdemÃ¡s, se encarga de obtener el nombre del usuario de localStorage y mostrarlo en pantalla.
     *
     */
    static cargarMenu() {
        //Se carga el nombre del usuario.
//        this.validarSesison();
//        this.mostrarNombresUsuario();

        // Oculta los modulos si el usuario no es SuperAdmin
        if (Utilitario.getLocal("rol") == "1") {
            $("#MenuNotasDocente").remove();
            $("#materiasCargarDocumentos").remove();
            $("#materialApoyo").remove();
            $("#MenuConstancias").remove();
            $("#MenuNotasEstudiante").remove();
        } else if (Utilitario.getLocal("rol") == "2") { //docente
            $("#MenuCiclos").remove();
            $("#MenuDocentes").remove();
            $("#MenuCierreNotas").remove();
            $("#MenuConstancias").remove();
            $("#MenuNotasEstudiante").remove();
            $("#materialApoyo").remove();
            $("#habilitarNotas").remove();
            $("#ListadoAlumnos").remove();
            $("#ListadoDocentes").remove();
        } else if (Utilitario.getLocal("rol") == "3") { //estudiante
            $("#MenuCiclos").remove();
            $("#MenuAlumnos").remove();
            $("#MenuDocentes").remove();
            $("#MenuReportes").remove();
            $("#materiasMicrocurriculos").remove();
            $("#MenuNotasDocente").remove();
            $("#MenuCierreNotas").remove();
            $("#materiasCargarDocumentos").remove();
            $("#habilitarNotas").remove();
            $("#ListadoAlumnos").remove();
            $("#ListadoDocentes").remove();
        }

        $("#SubMenuMostratCiclos").remove();
        $("#SubMenuMostrarPensum").remove();
    }


    /**
     * @method mostrarUsuarios
     * Metodo que se encarga de mostrar la ventana gestion de materias
     */
    static mostrarUsuarios() {
        Utilitario.agregarMascara();
        fetch("../usuarios/usuarios.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }


    /**
     * @method mostrarNombresUsuario
     * MÃ©todo que se encarga de mostrar el nombre del usuario en el mensaje de bienvenida.
     *
     */
    static mostrarNombresUsuario() {
        $("#nombreUsuario").html(Utilitario.getLocal("nombre_completo"));
    }

    /**
     * @method validarSesison
     * MÃ©todo que se encarga de ver si el user puede acceder al portal
     *
     */
//    static validarSesison() {
//        if (Utilitario.getLocal("id") === "") {
//            window.location.href = "../login.html";
//        }
//    }

    /**
     * @method mostrarGrupos
     * Metodo que se encarga de mostrar la ventana gestion de grupos
     */
    static mostrarGrupos() {
        Utilitario.agregarMascara();
        fetch("grupos.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarMaterias
     * Metodo que se encarga de mostrar la ventana gestion de materias
     */
    static mostrarMaterias() {
        Utilitario.agregarMascara();
        fetch("materia.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarCargarDocumentos
     * Metodo que se encarga de mostrar la ventana de carga de documentos para el docente
     */
    static mostrarCargarDocumentos() {
        Utilitario.agregarMascara();
        fetch("materialDeApoyo.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarMaterialApoyo
     * Metodo que se encarga de mostrar la ventana documentos para el alumno
     */
    static mostrarMaterialApoyo() {
        Utilitario.agregarMascara();
        fetch("materialDeApoyoEst.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 2 || Utilitario.getLocal('rol') == 1) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarMaterias
     * Metodo que se encarga de mostrar la ventana gestion de materias
     */
    static mostrarJornadas() {
        Utilitario.agregarMascara();
        fetch("jornada.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarCiclos
     * Metodo que se encarga de mostrar la ventana gestion de ciclos
     */
    static mostrarCiclos() {
        Utilitario.agregarMascara();
        fetch("ciclos.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarCrearCiclos
     * Metodo que se encarga de mostrar la ventana gestion de ciclos con grupos
     */
    static mostrarCrearCiclos() {
        Utilitario.agregarMascara();
        fetch("crearCiclos.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarAsignarDocentes
     * Metodo que se encarga de mostrar la ventana gestion de ciclos con grupos
     */
    static mostrarAsignarDocentes() {
        Utilitario.agregarMascara();
        fetch("docenteAsignar.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method registrarAlumno
     * Metodo que se encarga de mostrar la ventana para registrar a un alumno
     */

    static registrarAlumno() {
        Utilitario.agregarMascara();
        fetch("formularioAlumno.html", {
                method: 'GET',
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method eliminarAlumno
     * Metodo que se encarga de mostrar la ventana para eliminar a un alumno
     */

    static eliminarAlumno() {
        Utilitario.agregarMascara();
        fetch("formularioAlumnoEliminar.html", {
                method: 'GET',
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }


    /**
     * @method registrarAlumno
     * Metodo que se encarga de mostrar la ventana para registrar a un alumno
     */

    static registrarAlumnoC() {
        Utilitario.agregarMascara();
        fetch("formularioAlumnoC.html", {
                method: 'GET',
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    static registrarAlumnov2() {
            Utilitario.agregarMascara();
            fetch("./alumnos/listar.html", {
                    method: 'GET',
                })
                .then(function(response) {
                    return response.text();
                })
                .then(function(vista) {
                    (Utilitario.getLocal('rol') == 3) ?
                    window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
                })
                .finally(function() {
                    Utilitario.quitarMascara();
                });
        }
        /**
         * 
         * @return {undefined}
         */
    static constanciasAlumno() {
        Utilitario.agregarMascara();
        fetch("formularioSolicitudes.html", {
                method: 'GET',
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 2 || Utilitario.getLocal('rol') == 1) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * 
     * @return {undefined}
     */
    static notasAlumno() {
        Utilitario.agregarMascara();
        fetch("formularioNotasEstudiante.html", {
                method: 'GET',
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 2 || Utilitario.getLocal('rol') == 1) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }


    /*
     * @method mostrarPensum
     * Metodo que se encarga de mostrar la ventana gestion de pensum
     */
    static mostrarPensum() {
        Utilitario.agregarMascara();
        fetch("pensum.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /*
     * @method mostrarPensum
     * Metodo que se encarga de mostrar la ventana gestion del microcurriculo
     */
    static mostrarMicrocurriculo() {
        Utilitario.agregarMascara();
        fetch("materiaMicrocurriculo.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }


    static mostrarDocenteInactivo() {

        Utilitario.agregarMascara();
        fetch("formularioDocente_inactivo.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    static mostrarDocenteActivo() {


        Utilitario.agregarMascara();
        fetch("formularioDocente.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }


    static abrirPanelPerfil() {
        Utilitario.agregarMascara();
        fetch("perfil.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /*
     *   Muestra el formulario de alumnos para que un profesor los pueda registrar
     */
    static registrarAlumnoByDocente() {
        Utilitario.agregarMascara();
        fetch("formularioAlumnoByDocente.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /*
     *   Muestra el formulario de alumnos para que un profesor los pueda registrar
     */
    static registrarAlumnoByDocentes2() {
        Utilitario.agregarMascara();
        fetch("formularioMatricula.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    static mostrarFormularioNotas() {
        Utilitario.agregarMascara();
        fetch("materia_CargarNotas.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    static reportesAlumnosv2() {
        Utilitario.agregarMascara();
        fetch("./alumnos/reportes.html", {
                method: 'GET',
            }).then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    static mostrarConstanciaCiclo() {
        Utilitario.agregarMascara();
        fetch("constanciaCiclo.html", {
                method: 'GET',
            }).then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarMaterias
     * Metodo que se encarga de mostrar la ventana gestion de materias
     */
    static mostrarFormularioCierreCiclo() {
        Utilitario.agregarMascara();
        fetch("cerrarCiclos.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarMaterias
     * Metodo que se encarga de mostrar la ventana habilitar ciclos automaticos
     */
    static mostrarHabilitarCiclos() {
        Utilitario.agregarMascara();
        fetch("habilitarCiclos.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    static mostrarHabilitarNotas() {
        Utilitario.agregarMascara();
        fetch("habilitarFechasNotas.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarListadoAlumnos
     * Metodo que se encarga de mostrar la ventana del listado especial de alumnos
     */
    static mostrarListadoAlumnos() {
        Utilitario.agregarMascara();
        fetch("listadoAlumnos.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

    /**
     * @method mostrarListadoDocentes
     * Metodo que se encarga de mostrar la ventana del listado especial de docentes
     */
    static mostrarListadoDocentes() {
        Utilitario.agregarMascara();
        fetch("listadoDocentes.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (Utilitario.getLocal('rol') == 3 || Utilitario.getLocal('rol') == 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }

}