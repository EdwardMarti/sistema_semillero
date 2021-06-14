/**
 * Clase encargada de realizar las interacciones necesarias con la vista de Login.
 *
 **/
class LoginView {
    /**
     * @method validarLogin
     * Método que se encarga de validar si existe una sesión abierta.
     * Si existe una sesión redirige a la vista de Menu.
     *
     */
    static validarLogin() {
        var sesionId = Utilitario.getLocal("sesionId");

        if (sesionId !== "") {
            window.location.href = "principal.html";
        }
    }

    /**
     * @method getUsuario
     * Método que se encarga de obtener los datos del usuario a registrar.
     *
     * @return {Object} Datos del usuario.
     */
    static getUsuario() {
        return {
            nombres: $("#nombres").val(),
            apellidos: $("#apellidos").val(),
            correo: $("#correonuevo").val().toLowerCase(),
            clave: $("#clavenueva").val(),
        };
    }

    /**
     * @method abrirPanelRegistro
     * Método que se encarga de mostrar el panel para registrar un usuario.
     *
     */
    static abrirPanelRegistro() {
        var inputNombres = $("#nombres"),
            inputApellidos = $("#apellidos"),
            inputCorreo = $("#correonuevo"),
            inputClave = $("#clavenueva"),
            inputClaveConf = $("#clavecon"),
            modal = $("#modalusuario");

        inputNombres.val("");
        inputNombres.removeClass("is-valid");
        inputNombres.removeClass("is-invalid");
        inputApellidos.val("");
        inputApellidos.removeClass("is-valid");
        inputApellidos.removeClass("is-invalid");
        inputCorreo.val("");
        inputCorreo.removeClass("is-valid");
        inputCorreo.removeClass("is-invalid");
        inputClave.val("");
        inputClave.removeClass("is-valid");
        inputClave.removeClass("is-invalid");
        inputClaveConf.val("");
        inputClaveConf.removeClass("is-valid");
        inputClaveConf.removeClass("is-invalid");
        inputClaveConf.prop("disabled", true);
        modal.addClass(' data-backdrop="static" data-keyboard="false"');
        modal.modal({
            show: true,
        });
    }

    /**
     * @method validarNombres
     * Método que se encarga de validar el campo de nombres para registrar un usuario.
     *
     * @param {String} valor    Nombres diligenciados.
     */
    static validarNombres(valor) {
        var input = $("#nombres");
        if (valor === "" || valor.length < 4) {
            input.removeClass("is-valid");
            input.addClass("is-invalid");
            $("#btnregistrar").prop("disabled", true);
        } else {
            input.removeClass("is-invalid");
            input.addClass("is-valid");
            this.validarBtnRegistro();
        }
    }

    /**
     * @method validarApellidos
     * Método que se encarga de validar el campo de apellidos para registrar un usuario.
     *
     * @param {String} valor    Apellidos diligenciados.
     */
    static validarApellidos(valor) {
        var input = $("#apellidos");
        if (valor === "" || valor.length < 4) {
            input.removeClass("is-valid");
            input.addClass("is-invalid");
            $("#btnregistrar").prop("disabled", true);
        } else {
            input.removeClass("is-invalid");
            input.addClass("is-valid");
            this.validarBtnRegistro();
        }
    }

    /**
     * @method validarCorreo
     * Método que se encarga de validar el campo de correo para registrar un usuario.
     *
     * @param {String} valor    Correo diligenciado.
     */
    static validarCorreo(valor) {
        valor = valor.toLowerCase();
        var input = $("#correonuevo");
        if (
            valor === "" ||
            !valor.endsWith("@ufps.edu.co") ||
            valor === "@ufps.edu.co"
        ) {
            input.removeClass("is-valid");
            input.addClass("is-invalid");
            $("#btnregistrar").prop("disabled", true);
        } else {
            input.removeClass("is-invalid");
            input.addClass("is-valid");
            this.validarBtnRegistro();
        }
    }

    /**
     * @method validarClave
     * Método que se encarga de validar el campo de clave para registrar un usuario.
     *
     * @param {String} valor    Clave diligenciada.
     */
    static validarClave(valor) {
        var input = $("#clavenueva"),
            inputConf = $("#clavecon");

        if (valor === "" || valor.length < 6) {
            input.removeClass("is-valid");
            input.addClass("is-invalid");
            inputConf.removeClass("is-valid");
            inputConf.addClass("is-invalid");
            inputConf.prop("disabled", true);
            inputConf.val("");
            $("#btnregistrar").prop("disabled", true);
        } else {
            inputConf.prop("disabled", false);
            input.removeClass("is-invalid");
            input.addClass("is-valid");
            this.validarBtnRegistro();
        }
    }

    /**
     * @method validarClave
     * Método que se encarga de validar el campo de clave para registrar un usuario.
     *
     * @param {String} valor    Clave diligenciada.
     */
    static validarClaveConfirmacion(valor) {
        var input = $("#clavecon"),
            clave = $("#clavenueva").val();

        if (valor === "" || valor.length < 6 || valor != clave) {
            input.removeClass("is-valid");
            input.addClass("is-invalid");
            $("#btnregistrar").prop("disabled", true);
        } else {
            input.removeClass("is-invalid");
            input.addClass("is-valid");
            this.validarBtnRegistro();
        }
    }

    /**
     * @method validarBtnRegistro
     * Método que se encarga de validar los campos para registrar un usuario y habilitar o deshabilitar el botón.
     *
     */
    static validarBtnRegistro() {
        var usuario = this.getUsuario(),
            nombresValidos = usuario.nombres !== "" && usuario.nombres.length > 3,
            apellidosValidos =
            usuario.apellidos !== "" && usuario.apellidos.length > 3,
            correoValido =
            usuario.correo !== "" &&
            usuario.correo.endsWith("@ufps.edu.co") &&
            usuario.correo !== "@ufps.edu.co",
            claveValida =
            usuario.clave !== "" &&
            usuario.clave.length > 5 &&
            usuario.clave === $("#clavecon").val();

        if (nombresValidos && apellidosValidos && correoValido && claveValida) {
            $("#btnregistrar").prop("disabled", false);
        } else {
            $("#btnregistrar").prop("disabled", true);
        }
    }

    /**
     * @method registrarUsuario
     * Método que se encarga de registrar un usuario.
     *
     */
    static registrarUsuario() {
        LoginController.registrarUsuario(this.getUsuario());
    }

    /**
     * @method iniciarSesion
     * Método que se encarga de iniciar sesión.
     *
     */
    static iniciarSesion() {
        LoginController.iniciarSesion($("#correo").val().toLowerCase(), $("#clave").val());
    }


    /**
     * @method irPortal
     * Método que se encarga de iniciar sesión.
     *
     */
    static irPortal() {
        LoginController.irPortal();
    }

    /**
     * @method abrirPanelRecover
     * Método que se encarga de abrir el panel para recuperar la contraseña.
     *
     */
    static abrirPanelRecover() {
        var inputCorreo = $("#correorecover"),
            modal = $("#modalrecover");

        inputCorreo.val("");
        inputCorreo.removeClass("is-valid");
        inputCorreo.removeClass("is-invalid");
        modal.addClass(' data-backdrop="static" data-keyboard="false"');
        modal.modal({
            show: true,
        });
    }

    /**
     * @method validarRecover
     * Método que se encarga de validar el correo diligenciado para recuperar la contraseña.
     *
     * @param {String} valor    Correo diligenciado.
     */
    static validarRecover(valor) {
        valor = valor.toLowerCase();
        var input = $("#correorecover");
        if (
            valor === "" ||
            !valor.endsWith("@ufps.edu.co") ||
            valor === "@ufps.edu.co"
        ) {
            input.removeClass("is-valid");
            input.addClass("is-invalid");
            $("#btnrecover").prop("disabled", true);
        } else {
            input.removeClass("is-invalid");
            input.addClass("is-valid");
            $("#btnrecover").prop("disabled", false);
        }
    }

    /**
     * @method recuperarClave
     * Método que se encarga de realizar la solicitud para recuperar la contraseña.
     *
     */
    static recuperarClave() {
        LoginController.recuperarClave($("#correorecover").val().toLowerCase());
    }

    /**
     * @method verClave
     * Método que se encarga de mostrar u ocultar la clave del usuario.
     *
     */
    static verClave() {
        var iconoOjo = $("#icono-ojo"),
            inputClave = $("#clave");

        if (iconoOjo.hasClass("fa-eye")) {
            iconoOjo.removeClass("fa-eye");
            iconoOjo.addClass("fa-eye-slash");
            inputClave.prop("type", "text");
        } else {
            iconoOjo.addClass("fa-eye");
            iconoOjo.removeClass("fa-eye-slash");
            inputClave.prop("type", "password");
        }
    }

    /**
     * @method verClaveAct
     * Método que se encarga de mostrar u ocultar la clave del usuario.
     *
     */
    static verClaveAct() {
        var iconoOjo = $("#icono-ojo-act"),
            inputClave = $("#clavenueva");

        if (iconoOjo.hasClass("fa-eye")) {
            iconoOjo.removeClass("fa-eye");
            iconoOjo.addClass("fa-eye-slash");
            inputClave.prop("type", "text");
        } else {
            iconoOjo.addClass("fa-eye");
            iconoOjo.removeClass("fa-eye-slash");
            inputClave.prop("type", "password");
        }
    }

    /**
     * @method verClaveActConfirmacion
     * Método que se encarga de mostrar u ocultar la clave del usuario.
     *
     */
    static verClaveActConfirmacion() {
        var iconoOjo = $("#icono-ojo-act-2"),
            inputClave = $("#clavecon");

        if (iconoOjo.hasClass("fa-eye")) {
            iconoOjo.removeClass("fa-eye");
            iconoOjo.addClass("fa-eye-slash");
            inputClave.prop("type", "text");
        } else {
            iconoOjo.addClass("fa-eye");
            iconoOjo.removeClass("fa-eye-slash");
            inputClave.prop("type", "password");
        }
    }

    /**
     * @method validarNuevaClave
     * Método que se encarga de validar el campo de clave para realizar el cambio.
     *
     * @param {String} valor    Clave diligenciada.
     */
    static validarNuevaClave(valor) {
        var input = $("#clavenueva"),
            inputConf = $("#clavecon");

        inputConf.removeClass("is-valid");
        inputConf.removeClass("is-invalid");
        inputConf.val("");
        if (valor === "" || valor.length < 6) {
            input.removeClass("is-valid");
            input.addClass("is-invalid");
            inputConf.prop("disabled", true);
        } else {
            inputConf.prop("disabled", false);
            input.removeClass("is-invalid");
            input.addClass("is-valid");
        }
    }

    /**
     * @method validarNuevaClaveConfirmacion
     * Método que se encarga de validar el campo de clave para realizar el cambio.
     *
     * @param {String} valor    Clave diligenciada.
     */
    static validarNuevaClaveConfirmacion(valor) {
        var input = $("#clavecon"),
            clave = $("#clavenueva").val();

        if (valor === "" || valor.length < 6 || valor !== clave) {
            input.removeClass("is-valid");
            input.addClass("is-invalid");
            $("#btncambiar").prop("disabled", true);
        } else {
            input.removeClass("is-invalid");
            input.addClass("is-valid");
            $("#btncambiar").prop("disabled", false);
        }
    }

    /**
     * @method cambiarClave
     * Método que se encarga de cambiar la clave del usuario.
     *
     */
    static cambiarClave() {
        let nuevaclave = $("#clavenueva").val();
        let token = Utilitario.getLocal("tokenChange");
        LoginController.cambiarClave(token, nuevaclave);
    }
}