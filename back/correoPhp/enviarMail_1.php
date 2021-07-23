<?php

//require "lib/class.phpmailer.php";
//require "lib/class.smtp.php";
include("class.phpmailer.php");
include("class.smtp.php");

/**
 * 
 */
class enviarMail_1 {

    private $mail;
    public $direc;
            
    function __construct() {
        $this->mail = new PHPMailer;

        //indico a la clase que use SMTP
        $this->mail->IsSMTP();

        //permite modo debug para ver mensajes de las cosas que van ocurriendo
        //$this->mail->SMTPDebug = 2;
        //Debo de hacer autenticaci�n SMTP
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = "ssl";

        //indico el servidor de Gmail para SMTP
        $this->mail->Host = "smtp.gmail.com";

        //indico el puerto que usa Gmail
        $this->mail->Port = 465;

        //Cargamos datos del correo emisor y receptor
       
    }

    private function cargarDatos() {

  
        $this->mail->Username = "nocontestar.solicitudservicio@gmail.com";

        $this->mail->Password = "soporte201";
      
        $this->mail->FromName = "Gestion de Proveedores";

        $this->mail->Subject = "Nueva Actualizacion de Proveedor";

        $this->mail->AddAddress($this->direc);
    }


    
      function enviarMensajeA($orden, $observacion) {
          

        $this->direc = "compras@pescadero.com.co";

         //Cargamos datos del correo emisor y receptor
        $this->cargarDatos();
          
        $this->mail->MsgHTML("La empresa " . $observacion . " con el Nit " . $orden . "  ha Actualizado la informacion como Proveedor Correctamente ");


        $this->mail->Send();
    }
    
    

     function enviarMensajeProveedor( $orden, $observacion) {
         
        $this->mail->ClearAddresses();

        $this->direc = $orden;
          //Cargamos datos del correo emisor y receptor
        $this->cargarDatos();
        
        $this->mail->MsgHTML("Se Actualizo la Informacion como Proveedor de Tejar de Pescadero \n Su Usuario es : ".$orden." y la Clave : ".$observacion."\n .Recuerde que usted es responsable de su Usuario y Clave. En caso de Problemas comunicarse al Correo: compras@pescadero.com.co" );


        $this->mail->Send();
    }

}

?>


