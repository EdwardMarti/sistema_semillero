<?php

//require "lib/class.phpmailer.php";
//require "lib/class.smtp.php";
include("class.phpmailer.php");
include("class.smtp.php");

/**
 * 
 */
class enviarMensajeProveedor {

    private $mail1;


    function __construct() {
        $this->mail1 = new PHPMailer;

        //indico a la clase que use SMTP
        $this->mail1->IsSMTP();

        //permite modo debug para ver mensajes de las cosas que van ocurriendo
        //$this->mail->SMTPDebug = 2;
        //Debo de hacer autenticaci�n SMTP
        $this->mail1->SMTPAuth = true;
        $this->mail1->SMTPSecure = "ssl";

        //indico el servidor de Gmail para SMTP
        $this->mail1->Host = "smtp.gmail.com";

        //indico el puerto que usa Gmail
        $this->mail1->Port = 465;

        //Cargamos datos del correo emisor y receptor
        $this->cargarDatosC();
        $this->cargarDatos();
    }

    public function cargarDatosC($correo) {
      $this->mail1->addAddress($correo);
 }
    private function cargarDatos() {

  
        $this->mail1->Username = "nocontestar.solicitudservicio@gmail.com";

        $this->mail1->Password = "soporte201";
       //  $this->mail->Username = "brialx.40@gmail.com";

     //   $this->mail->Password = "globalk_40";

        $this->mail1->From = "compras@pescadero.com.co";

        $this->mail1->FromName = "Gestion de Proveedores Tejar de Pescadero SAS";

        $this->mail1->Subject = "Actualizacion de datos Proveedor";

       
    }

//    function enviarMensaje($orden,$observacion) {
//        $this->mail->MsgHTML("La empresa ".$observacion." con el Nit ".$orden." se ha registrado como Proveedor  " );
//               
//
//        $this->mail->Send();
//    }
//    
//      function enviarMensajeA($orden,$observacion) {
//        $this->mail->MsgHTML("La empresa ".$observacion." con el Nit ".$orden." se ha Actualizado como Proveedor Correctamente " );
//               
//
//        $this->mail->Send();
//    }

    
      public function enviarMensajeProveedor($orden,$observacion) {
           $this->mail1->addAddress("$orden");
        $this->mail1->MsgHTML("Se Actualizo la Informacion como Proveedor de Tejar de Pescadero \n Su Usuario es : ".$orden." y la Contraseña  ".$observacion."\n Recuerde que usted es responsable de su Usuario y Contraseña. " );
               

        $this->mail1->Send();
    }
}

?>


