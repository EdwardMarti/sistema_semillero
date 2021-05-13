/**
 * Clase con metodos generales usados por todas las vistas.
 *
 **/
class Utilitario {
    /**
     * @method cerrarSesion
     * Método que se encarga de cerrar sesión.
     * Limpia el localStorage y redirige al login.
     *
     */
    static cerrarSesion() {
        localStorage.clear();
        window.location.href = "../login.html";
    }

    /**
     * @method formatearFecha
     * Método que se encarga de formater una fecha para ser desplegada en la interfaz de usuario.
     * @param {String} fecha Fecha que se quiere formatear.
     */
    static formatearFecha(fecha) {
        var date = new Date(fecha + (fecha.endsWith("T05:00:00.000Z") ? "" : "T05:00:00.000Z"));
        return (
            date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear()
        );
    }

    static stringAFecha(fecha) {
        if (fecha) {
            var fechaArray = fecha.split("/");
            return new Date(+fechaArray[2], fechaArray[1] - 1, +fechaArray[0]);
        }
        return "";
    }

    /**
     * @method agregarMascara
     * Método que se encarga de agregar la mascara a la pantalla.
     *
     */
    static agregarMascara() {
        $("body").addClass("sk-loading");
    }

    /**
     * @method quitarMascara
     * Método que se encarga de quitar la mascara a la pantalla.
     *
     */
    static quitarMascara() {
        $("body").removeClass("sk-loading");
    }

    /**
     * @method extensionesImgPermitidas
     * Método que obtiene las extesiones de imagenes permitidas.
     *
     * @return {Array}  Arreglo con las extensiones permitidas.
     */
    static extensionesImgPermitidas() {
        return ["image/png", "image/jpeg", "image/gif", "image/jpg"];
    }

    /**
     * @method tamanioArchivo
     * Método que obtiene el tamaño maximo permitido para un archivo.
     *
     * @return {Number} Tamaño permitido.
     */
    static tamanioArchivo() {
        return 4000000;
    }

    /**
     * @method cadenasIguales
     * Método que se encarga de validar si dos cadenas son iguales sin tener en cuenta mayusculas minusculas o acentos.
     *
     * @param {String} cadenaUno Cadena a comparar
     * @param {String} cadenaDos Cadena a comparar
     *
     * @return {Boolean} True si son iguales, false si no lo son.
     */
    static cadenasIguales(cadenaUno, cadenaDos) {
        var strUno = cadenaUno
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "")
            .toUpperCase(),
            strDos = cadenaDos
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "")
            .toUpperCase();
        return strUno === strDos;
    }

    /**
     * @method setLocal
     * Método que se encarga de guardar en el localStorage un valor.
     *
     * @param {String} llave    Identificador del valor.
     * @param {String} valor    Valor a almacenar.
     */
    static setLocal(llave, valor) {
        localStorage.setItem(
            this.ocultar("85469852155741236", llave),
            this.ocultar("9658741236521458752", valor)
        );
    }

    /**
     * @method getLocal
     * Método que se encarga de obtener un valor del localStorage.
     *
     * @param {String} llave    Identificador del valor a obtener.
     * @return {String} Valor que se desea obtener.
     */
    static getLocal(llave) {
        return this.ocultar(
            "9658741236521458752",
            localStorage.getItem(this.ocultar("85469852155741236", llave))
        );
    }

    /**
     * @method removeLocal
     * Método que se encarga de eliminar un valor del localStorage.
     *
     * @param {String} llave    Identificador del valor a eliminar.
     */
    static removeLocal(llave) {
        localStorage.removeItem(this.ocultar("85469852155741236", llave));
    }

    /**
     * @method ocultar
     * Método que se encarga de modificar los datos de un valor.
     *
     * @param {String} llave    Llave con la que se va modificar el valor.
     * @param {String} valor    Valor a modificar.
     * @return {String} Valor modificado.
     */
    static ocultar(llave, valor) {
        var llaveLength = llave.length,
            resultado = "";

        if (valor === "" || valor === null || valor === undefined) {
            return "";
        }

        valor += "";
        for (var index = 0; index < valor.length; ++index) {
            resultado += String.fromCharCode(
                llave[index % llaveLength] ^ valor.charCodeAt(index)
            );
        }
        return resultado;
    }

    /**
     * @method validarRoles
     * Validacion de Roles
     */
    static sinPermisos() {
        if (Utilitario.getLocal("rol") == 0) {
            //roles de empleado
            window.location.href = "cotizaciones.html";
        }
    }

    /**
     * @method desactivarBotones
     * Validacion de Roles
     */
    static desactivarBotones() {
        //desactiva click derecho
        document.oncontextmenu = function() {
            return false;
        }

        //desactiva ctrl+shift+C | ctrl+shift+I | ctrl+shift+ U
        document.onkeydown = function(e) {
            //ctrl         //shift        //C                 //I                 //U
            if (e.ctrlKey && e.shiftKey && (e.keyCode === 67 || e.keyCode === 73 || e.keyCode === 85 || e.keyCode === 74)) {
                return false;
            } else {
                //desactiva ctrl+u | ctrl+ U
                if (e.ctrlKey && (e.keyCode === 117 || e.keyCode === 85)) {
                    return false;
                } else {
                    return true;
                }
            }
        };
    }

    static parsear_fecha(now) {
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = (day) + "-" + (month) + "-" + now.getFullYear();
        return today;
    }

    /**
     * Ajuste decimal de un número.
     *
     * @param {String}  tipo  El tipo de ajuste.
     * @param {Number}  valor El numero.
     * @param {Integer} exp   El exponente (el logaritmo 10 del ajuste base).
     * @returns {Number} El valor ajustado.
     */
    static decimalAdjust(type, value, exp) {
        // Si el exp no está definido o es cero...
        if (typeof exp === 'undefined' || +exp === 0) {
            return Math[type](value);
        }
        value = +value;
        exp = +exp;
        // Si el valor no es un número o el exp no es un entero...
        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
            return NaN;
        }
        // Shift
        value = value.toString().split('e');
        value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
        // Shift back
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
    }

    /*
     * Se encarga de ubicar el cursor al final del texto de un elemento
     */
    static moveCursorToEnd(id) {
        var el = document.getElementById(id)
        el.focus()
        if (typeof el.selectionStart == "number") {
            el.selectionStart = el.selectionEnd = el.value.length;
        } else if (typeof el.createTextRange != "undefined") {
            var range = el.createTextRange();
            range.collapse(false);
            range.select();
        }
    }

    /*
     * Se encarga generar una notificación de alerta una vez iniciada sesion
     */
    static notificacion() {
        let rol = Utilitario.getLocal('rol');
        if (rol != 3) {
            let mensaje = "<p class='text-justify'>Se han realizado algunas actualizaciones en el sistema por favor realice los pasos del siguiente documento, si ya los realizo ignore esta notificacion.</p> <br> <p class='text-justify'><a href='../../manuales/BorrarCacheNavegador.pdf' style='color:black'><i class='fa fa-arrow-right'></i> Ir al Documento Adjunto</a></p> <br> <b>NOTA:</b> Esta notificación desaparecera en 3 dias"
            Mensaje.mostrarMsjWarningHTML("Advertencia", mensaje);
        }
    }
}

function getFormData($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i) {
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}