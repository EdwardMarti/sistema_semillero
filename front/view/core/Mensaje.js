/**
 * Clase encargada de mostrar mensajes.
 *
 **/
class Mensaje {
    /**
     * @method mostrarMsjExito
     * Método que se encarga mostrar un panel de exito en pantalla.
     *
     * @param {String} titulo    Título del panel.
     * @param {String} msg      Mensaje mostrado en el panel.
     */
    static mostrarMsjExito(titulo, msg, funcion) {
        swal({
                title: titulo,
                text: msg,
                type: "success",
                confirmButtonColor: "#dd4b39",
                confirmButtonText: "Aceptar",
                closeOnCancel: false,
            },
            function() {
                if (funcion) {
                    funcion();
                }
            }
        );
    }

    /**
     * @method mostrarMsjError
     * Método que se encarga mostrar un panel de error en pantalla.
     *
     * @param {String} titulo    Título del panel.
     * @param {String} msg      Mensaje mostrado en el panel.
     */
    static mostrarMsjError(titulo, msg) {
        swal({
            title: titulo,
            text: msg,
            type: "error",
            confirmButtonColor: "#dd4b39",
            confirmButtonText: "Aceptar",
            closeOnCancel: false,
        });
    }

    /**
     * @method mostrarMsjWarning
     * Método que se encarga mostrar un panel de advertencia en pantalla.
     *
     * @param {String}      titulo       Título del panel.
     * @param {String}      msg         Mensaje mostrado en el panel.
     * @param {Function}    funcion     Función a ejecutar luego de aceptar la advertencia.
     */
    static mostrarMsjWarning(titulo, msg, funcion) {
        swal({
                title: titulo,
                text: msg,
                type: "warning",
                confirmButtonColor: "#dd4b39",
                confirmButtonText: "Aceptar",
                closeOnCancel: false,
            },
            function() {
                if (funcion) {
                    funcion();
                }
            }
        );
    }

    /**
     * @method mostrarMsjConfirmacion
     * Método que se encarga de mostrar un mensaje de confirmación.
     * 
     * @param {String}    titulo    Titulo del panel.
     * @param {String}    msg       Mensaje del panel.
     * @param {Function}  funcion   Función a ejecutar si se confirma el panel.
     */
    static mostrarMsjConfirmacion(titulo, msg, funcion) {
        swal({
                title: titulo,
                text: msg,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dd4b39",
                cancelButtonColor: "#dd4b39",
                confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar",
            },
            function() {
                funcion();
            });
    }
}