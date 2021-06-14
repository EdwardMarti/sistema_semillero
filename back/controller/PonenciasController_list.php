  <?php

include_once realpath('../facade/PonenciasFacade.php');

     $JSONData = file_get_contents("php://input");
     $dataObject = json_decode($JSONData);


//$id = '2';
$id = strip_tags($dataObject->id);



        $list=PonenciasFacade::listAll_Sem($id);
        $rta="";
        foreach ($list as $obj => $Ponencias) {	
	       $rta.="{
	    \"id\":\"{$Ponencias->getid()}\",
	    \"nombre_po\":\"{$Ponencias->getnombre_po()}\",
	    \"fecha\":\"{$Ponencias->getfecha()}\",
	    \"nombre_eve\":\"{$Ponencias->getnombre_eve()}\",
	    \"institucion\":\"{$Ponencias->getinstitucion()}\",
	    \"ciudad\":\"{$Ponencias->getciudad()}\",
	    \"lugar\":\"{$Ponencias->getlugar()}\",
	    \"tipo_ponencias_id\":\"{$Ponencias->gettipo_ponencias_id()->getid()}\",
	    \"semillero_id_id\":\"{$Ponencias->getsemillero_id()->getid()}\"
	       },";
        }

 if ($rta != "") {
        $rta = substr($rta, 0, -1);
        http_response_code(200);
        echo "{\"ponencias\":[{$rta}]}";
      } else {
        echo "{\"ponencias\":[]}";
      }
 