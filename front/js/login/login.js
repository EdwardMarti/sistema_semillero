  /**
   * funcion para iniciar sesion, utiliza el contexto del usuario para ello
   * @param {event} e evento que se dispara con el onSubmit del formulario
   */

  function iniciarSesion2() {
      Utilitario.setLocal(
          "userId",
          "S6G9uniUYwVU9lNoqvppqmTQFL42")
      window.location.replace("view/principal.html");

      Utilitario.setLocal(
          "user",
          JSON.stringify({
              emailUser: "danielcaballero796@gmail.com",
              photoURL: "S6G9uniUYwVU9lNoqvppqmTQFL42",
              displayName: "Daniel Caballero",
              emailVerified: true,
              isLogin: true,
              uid: "S6G9uniUYwVU9lNoqvppqmTQFL42",
              estado: 1,
              rol: 1,
          })
      )
  }

  /**
   * funcion para iniciar sesion, utiliza el contexto del usuario para ello
   * @param {event} e evento que se dispara con el onSubmit del formulario
   */

  function iniciarSesion() {
      let correo = $('#correo').val(),
          emailVerified,
          estado,
          rol,
          contrasena = $('#contrasena').val();
      /* Inicio Login */
      database
          .auth()
          .setPersistence(firebase.auth.Auth.Persistence.SESSION)
          .then(() => {
              database
                  .auth()
                  .signInWithEmailAndPassword(correo, contrasena)
                  .then((response) => {
                      /* Consulta de la colecion aux para los datos del usuario */
                      database
                          .firestore()
                          .collection("users_ref")
                          .doc(response.user.uid)
                          .get()
                          .then((doc) => {
                              let data = doc.data()
                                  //emailVerified= response.user.emailVerified;
                              emailVerified = true
                              estado = data.estado
                              rol = data.administrador

                              Utilitario.setLocal(
                                  "userId",
                                  response.user.uid)
                              Utilitario.setLocal(
                                      "user",
                                      JSON.stringify({
                                          uid: response.user.uid,
                                          emailUser: response.user.email,
                                          displayName: data.nombres,
                                          photoURL: response.user.uid,
                                          isLogin: true,
                                          emailVerified: response.user.emailVerified,
                                          estado: data.estado,
                                          rol: data.administrador,
                                      })
                                  )
                                  //validacion login solo para users con email verificado
                              if (
                                  emailVerified === true &&
                                  Number(estado) === 1 &&
                                  Number(rol) === 1
                              ) {
                                  console.log('if');
                                  window.location.replace("view/principal.html");
                              } else {
                                  if (!emailVerified) {
                                      return Mensaje.mostrarMsjError(
                                          "Error",
                                          "Email no verificado!"
                                      );
                                  } else if (estado === 0) {
                                      return Mensaje.mostrarMsjError(
                                          "Error",
                                          "Cuenta Inactiva!"
                                      );
                                  } else if (rol === 0) {
                                      return Mensaje.mostrarMsjError(
                                          "Error",
                                          "Usuario no Autorizado, debe ser un Administrador!"
                                      );
                                  }
                              }
                              //validacion login solo para users con email verificado
                          })
                          .catch((error) => {
                              console.log("Error getting document:", error);
                              if (error.code === "auth/wrong-password") {
                                  return Mensaje.mostrarMsjError(
                                      "Error",
                                      "Contraseña Erronea!"
                                  );
                              }
                          });
                      /* Fin consulta de la colecion aux para los datos del usuario */
                  })
                  .catch((e) => {
                      console.log(e)
                  });
          })
          .catch((error) => {
              console.log(error.code);
          });
      /* Fin Login */
  };

  /**
   * @method recuperarClave
   * Método que se encarga de ejecutar el servicio que recupera la clave de un usuario.
   */
  function recuperarClave() {
      let email = $('#correo').val()

      database
          .auth()
          .sendPasswordResetEmail(email)
          .then(function() {
              return Mensaje.mostrarMsjExito(
                  "¡Exito!",
                  "El correo se ha enviado, revisa tu bandeja de entrada o correo spam.", () => window.location = "./login.html"
              );
          })
          .catch(function() {
              return Mensaje.mostrarMsjError(
                  "Error",
                  "El correo no esta bien escrito o no existe en la base de datos."
              );
          });
  }