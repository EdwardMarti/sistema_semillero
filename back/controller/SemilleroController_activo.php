<?php

include_once realpath('../facade/SemilleroFacade.php');


$JSONData = file_get_contents("php://input");
$dataObject = json_decode($JSONData);


//$id = strip_tags($dataObject->id);
$correo='edward22069@gmail.com';
$clave='1234';

 

        $list=SemilleroFacade::select_activo($correo,$clave);
       
        if($list){
            echo 'ok';
        }else{
            echo 'no esta';
        }
        
//        var_dump($list);

//That`s all folks!