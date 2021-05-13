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
        const { ...usuario } = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
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
        const { ...usuario } = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
        $("#nombreUsuario").html(usuario.displayName);
    }

    /**
     * @method validarSesison
     * MÃ©todo que se encarga de ver si el user puede acceder al portal
     *
     */
    static validarSesison() {
        if (Utilitario.getLocal("userId") === "") {
            window.location.href = "../login.html";
        }
    }
        
    /**
     * @method listadoUsuarios
     * Metodo que se encarga de mostrar los usuarios registrados
     */
    static listadoUsuarios() {
        const { ...usuario } = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
        Utilitario.agregarMascara();
        fetch("listadoUsuarios.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                (usuario.rol === 3 || usuario.rol === 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista);
            })
            .finally(function() {
                Utilitario.quitarMascara();
            });
    }
    /**
     * @method listadoOrdenes
     * Metodo que se encarga de mostrar las ordenes registradas
     */
    static listadoOrdenes() {
        console.log('ordenes');
        const { ...usuario } = Utilitario.getLocal("user") ? JSON.parse(Utilitario.getLocal("user")) : {};
        Utilitario.agregarMascara();
        fetch("listadoOrdenes.html", {
                method: "GET",
            })
            .then(function(response) {
                return response.text();
            })
            .then(function(vista) {
                $("#mostrarcontenido").html(vista);
                /*(usuario.rol == = 1 || usuario.rol === 2) ?
                window.location.href = "principal.html": $("#mostrarcontenido").html(vista); */
            })
            .finally(function() {
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
    //</editor-fold>

    //<editor-fold defaultstate="collapsed" desc="Actas Danadas">
            static mostrarDanadas() {
            
        Utilitario.agregarMascara();
        fetch("listadoDanadas.html", {
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
    //</editor-fold>


}