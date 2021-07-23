<?php  
require("class.phpmailer.php"); //Importamos la función PHP class.phpmailer  
  
$mail = new PHPMailer();  
  
//Luego tenemos que iniciar la validación por SMTP:  
$mail->IsSMTP();  
$mail->SMTPAuth = true; // True para que verifique autentificación de la cuenta  
$mail->Username = "brialx.40@gmail.com"; // Cuenta de e-mail  
$mail->Password = "globalk_40"; // Password  
  
  
$mail->Host = "smtp.gmail.com";  
$mail->From = "brialx.40@gmail.com";  
$mail->FromName = "Brial la loca";  
$mail->Subject = "Ya Trabaja";  
$mail->AddAddress("destinatario@dominio.com","Nombre a mostrar del Destinatario");  
  
$mail->WordWrap = 50;  
  
$body  = "Hola, este es un…";  
$body .= "<font color='red'> mensaje de prueba</font>";  
  
$mail->Body = $body;  
  
$mail->Send();  
  
  
// Notificamos al usuario del estado del mensaje  
  
if(!$mail->Send()){  
   echo "No se pudo enviar el Mensaje.";  
}else{  
   echo "Mensaje enviado";  
}  
  
?>