<?php
// Uncomment next line if you're not using a dependency loader (such as Composer)
require_once 'sendgrid-php/sendgrid-php.php';
use SendGrid\Mail\Mail;

class enviarMail
{
    private $mail;

    public function __construct()
    {
        $this->mail = new Mail();
    }

    private function cargarDatos($asunto)
    {
        $this->mail->setFrom("no.reply.gestionsemilero@gmail.com", "Sistema de gestion de semilleros");
        $this->mail->setSubject($asunto);
    }

    public function enviarMensajePlantilla($correo, $usuario, $observacion)
    {
        $this->cargarDatos("Recuperar Clave");
        //email,nombreUser
        $this->mail->addTo($correo, $usuario);
        //MensajeHTML
        $this->mail->addContent(
            "text/html", "<html xmlns='http://www.w3.org/1999/xhtml'>
            <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
                   <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>

            </head>
            <body bgcolor='#8d8e90' style='background:url('https://i.ibb.co/8cXHmv1/grid.png');'>
            <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#8d8e90' style='padding: 50px 0;background: url('');'>
            <tr>
            <td>
            <table width='650' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' align='center' style='-webkit-box-shadow: 0px 14px 21px 0px rgba(50, 50, 50, 0.41); -moz-box-shadow: 0px 14px 21px 0px rgba(50, 50, 50, 0.41); box-shadow: 0px 14px 21px 0px rgba(50, 50, 50, 0.41);'>
                    <tr>
                            <td>
                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                    <tr>
                           <td width='30'>&nbsp;</td>
                                            <td width='215'><br><a href= '#' target='_blank'><img style='padding-left: 10px;' src='http://divisist2.ufps.edu.co/assets/email/images/ufps_logo_205.jpg' width='250' height='60' border='0' alt=''/></a></td>
                                            <td width='383'></td>
                                     </tr>
                        <tr>
                                <td colspan='3'><hr width='95%'></td>
                        </tr>
                                    </table>
                            </td>
                    </tr>
            <tr>
            <td>
            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
            <td width='5%'>&nbsp;</td>
            <td width='90%' align='justify' valign='top' style='font-family: Verdana, Geneva, sans-serif; color:#68696a; font-size:12px; line-height:20px;'>
           <p>Cordial Saludo $usuario<br><br>
           Para restablecer su contraseña de click en el siguiente enlace, <br> $observacion <br>
           <br><br>
            <p style='margin-bottom: 0px;'>Cordialmente,</p>
            <p style='margin-bottom: 0px;'><a href='https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=no.reply.gestionsemilero@gmail.com'><b>Sistema de gestion de semilleros</b></a><br></p>
            </td>
            <td width='5%'>&nbsp;</td>
            </tr>
            </table>
            </td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td><img src='https://i.ibb.co/dLYVgNM/linea-Footer.jpg' width='630' height='7' style='display:block' border='0' alt=''></td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tr>
                     <td width='50%' align='right'>
                     <font style='font-family:Myriad Pro, Helvetica, Arial, sans-serif; color:#231f20; font-size:10px'>
                     <strong>Avenida Gran Colombia No. 12E-96 Barrio Colsag, San Jos&eacute; de C&uacute;cuta - Colombia.<br> Tel&eacute;fono (057)(7) 5776655</strong></font>
                     </td>
                     <td width='4%' align='right'><a href='https://www.facebook.com/UFPS-C=C3=BAcuta-553833261409690/' target='_blank'><img src='http://divisist2.ufps.edu.co/assets/email/images/fb.png' alt='facebook' width='30' height='30' border='0' /></a></td>
                     <td width='5%' align='center'><a href='https://twitter.com/UFPSCUCUTA' target='_blank'><img src='http://divisist2.ufps.edu.co/assets/email/images/tw.png' alt='twitter' width='30' height='30' border='0' /></a></td>
                     <td width='4%' align='left'><a href='http://www.youtube.com/user/UFPSCUCUTA/' target='_blank'><img src='http://divisist2.ufps.edu.co/assets/email/images/yt.png' alt='linkedin' width='30' height='30' border='0' /></a></td>
                     <td width='5%'>&nbsp;</td>
                     </tr>
            </table></td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
            </table></td>
            </tr>
            </table>
                   <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>

            </body>
           </html>"
        );
        //key del API generada por SendGrid
        $sendgrid = new \SendGrid('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');
        try {
            $response = $sendgrid->send($this->mail);
            //print $response->statusCode(); //codigo de respuesta del servicio
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }
}
