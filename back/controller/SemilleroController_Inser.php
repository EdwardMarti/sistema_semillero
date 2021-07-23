<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    La segunda regla de Anarchy es no hablar de Anarchy  \\
include_once realpath('../facade/SemilleroFacade.php');
include_once realpath('../facade/PersonaFacade.php');
include_once realpath('../facade/DocenteFacade.php');
include_once realpath('../facade/Persona_has_semilleroFacade.php');
include_once realpath('../facade/UsuariosFacade.php');
include_once realpath('../correoPhp/enviarMail.php');

$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);

$email = new enviarMail();


      
        $nombre = strip_tags($dataObject->nombre);
        $sigla = strip_tags($dataObject->sigla);
        $fecha_creacion = strip_tags($dataObject->fecha);
        $Grupo_investigacion_id = strip_tags($dataObject->grupo_investigacion);
        $grupo_investigacion= new Grupo_investigacion();
        $grupo_investigacion->setId($Grupo_investigacion_id);
        $departamento = strip_tags($dataObject->departamentos);
        $facultad = strip_tags($dataObject->facultades);
        $plan_estudios = strip_tags($dataObject->p_estudio);
       $rptaS= SemilleroFacade::insert_S( $nombre, $sigla, $fecha_creacion, $facultad, $plan_estudios, $grupo_investigacion, $departamento);

  


        if ($rptaS>0 ) {
            
      /**registro persona */
        $nombre = strip_tags($dataObject->nombreD);
        $telefono = strip_tags($dataObject->telefonoD);
        $correo = strip_tags($dataObject->correoD);
        $Perfiles_id = "4";
//        $Perfiles_id = strip_tags($dataObject->perfiles_id);
         $password= randomPassword();
        $perfiles= new Perfiles();
        $perfiles->setId($Perfiles_id);
        $rptaP=PersonaFacade::insert( $nombre, $telefono, $correo, $perfiles,$password);
       
       /*registrar docente*/
        $Persona_id = $rptaP;
        $persona= new Persona();
        $persona->setId($Persona_id);
//        $password = strip_tags($dataObject->password);
       $clave = md5($password);
        $Tipo_vinculacion_id = strip_tags($dataObject->tp_vinculacion);
        $tipo_vinculacion= new Tipo_vinculacion();
        $tipo_vinculacion->setId($Tipo_vinculacion_id);
//        $ubicacion = strip_tags($dataObject->ubicacion);
        $ubicacion = "NO APLICA";
        $rpta99=DocenteFacade::insert($persona, $clave, $tipo_vinculacion, $ubicacion);
//   
//        
        $rptaUsuario=UsuariosFacade::insert2( $Persona_id, $clave);
//        
        $Persona_id =  $Persona_id;
        $persona= new Persona();
        $persona->setId($Persona_id);
        $Semillero_id = $rptaS;
        $semillero= new Semillero();
        $semillero->setId($Semillero_id);
        $rpta=Persona_has_semilleroFacade::insert( $persona, $semillero);    
//            
             try {
                        if ($rptaUsuario > 0) {
//                            enviarCorreoD($correo,$nombre,$password);
                            http_response_code(200);
                            echo "{\"mensaje\":\"Se ha registrado $rpta exitosamente\"}";
                            
                        }
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo "{\"mensaje\":\"$rptaP\"}";
                    }    
            
           
        }




function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function  enviarCorreoD($correo,$nombre,$password){
    $base_url = "http://localhost/unik/cvs_web/front/";  //change this baseurl value as per your file path
    $base_url_sistema = "http://nortcoding-demos.tk/semillero/front/view/intro/";  //change this baseurl value as per your file path
      //$base_url = "http://localhost/tutorial/email-address-verification-script-using-php/";  //change this baseurl value as per your file path
      $mail_body_user = "
      <p>Hola ".$nombre.",</p>
      <p>Usted ha sido registrado en el sistema . Su contraseña Temporal es :".$password.", Esta contraseña funcionará solo después de la verificación del correo electrónico, reaalizada por el administrador.</p>
                            <p>El link del sistema es el siguiente ".$base_url_sistema.",</p>
                                
      <p>Saludos cordiales ,<br />Sistema de Gestion de Semilleros</p>";  
                        
      
      
      $email->enviarMensajePeticionUsuario($correo, $mail_body_user);
}