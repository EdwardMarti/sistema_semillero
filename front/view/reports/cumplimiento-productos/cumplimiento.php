<?php
require_once "../../../../vendor/autoload.php";
require_once('./styles.css');
/**
de Gestión presentado por el (Grupo) de Investigación la vaca loa
de Gestión presentado por el (Semillero__) de Investigación yo quiero asado
 */
$key = $_GET["token"];

session_start();

$data = $_SESSION[$key];

$mpdf = new \Mpdf\Mpdf(['tempDir' => '/tmp','setAutoBottomMargin' => 'stretch','setAutoTopMargin' => 'stretch']);

$htmlHeader = getHeader();
$htmlHeader = str_replace("_codigo", $data['codigo'] , $htmlHeader);
$htmlHeader = str_replace("_version", $data['version'] , $htmlHeader);
$htmlHeader = str_replace("_fecha", $data["fecha"] , $htmlHeader);

$mpdf->SetHTMLHeader($htmlHeader);
$mpdf->SetHTMLFooter(getFooter());

$htmlBody = getBody();
$htmlBody = str_replace("_porcentaje", $data["porcentaje"] , $htmlBody);
$htmlBody = str_replace("_cumple_requisitos", $data["acepta_dos_id"] == 1 ? "si" : "no" , $htmlBody);
$htmlBody = str_replace("_recomendacion_horas", $data["acepta_uno_id"] == 1 ? "si" : "no" , $htmlBody);
$htmlBody = str_replace("_semestre", $data["semestre"] , $htmlBody);
$htmlBody = str_replace("_grupo", $data["descripcion"] , $htmlBody);
$htmlBody = str_replace("_semillero", $data["semillero"] , $htmlBody);
$htmlBody = str_replace("_anio", $data["anio"] , $htmlBody);
$htmlBody = str_replace("_productos", $data["productos"] , $htmlBody);
//$htmlBody = str_replace("_horas_solicitadas", $data["horas_solicitadas"] , $htmlBody);
//$htmlBody = str_replace("_facultad", "INGENIERIAS" , $htmlBody);


$mpdf->WriteHTML(file_get_contents('styles.css'), \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($htmlBody, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output("cumplimiento.pdf", \Mpdf\Output\Destination::INLINE);

function getHeader(){
    return "
<table class='table table-border' cellspacing='0' cellpadding='0'>

    <tr>
        <td class='td-border strong wd-20' rowspan='4'><img src='../../../img/Logo-nuevo-vertical.png' alt='logo universidad' width='100' ></td>
        <td class='td-border strong wd-55' rowspan='2' style='font-size:12px'>INVESTIGACIÓN</td>
        <td class='td-border strong' >CÓDIGO</td>
        <td class='td-border' >_codigo</td>
    </tr>
    <tr>
        <td class='td-border strong' >VERSIÓN</td>
        <td class='td-border' >_version</td>
    </tr>
    <tr>
        <td class='td-border strong bg-red' rowspan='2' style='font-size:12px'>CONCEPTO DE CUMPLIMIENTO DE PRODUCTOS PREVISTOS EN EL PLAN DE ACCIÓN DE GRUPOS O SEMILLEROS DE INVESTIGACIÓN


        </td>
        <td class='td-border strong' >FECHA</td>
        <td class='td-border' >_fecha</td>
    </tr>
    <tr>
        <td class='td-border strong' >PÁGINA</td>
        <td class='td-border' >{PAGENO} de {nbpg}</td>
    </tr>
    
    
</table>
<table class='table table-border' cellspacing='0' cellpadding='0'>
<tr>
        <td class='td-border strong' >ELABORÓ</td>
        <td class='td-border strong' >REVISÓ</td>
        <td class='td-border strong' colspan='2' >APROBÓ</td>
    </tr> 
    <tr>
        <td class='td-border' >Lider de Investigacion</td>
        <td class='td-border' >Equipo Operativo de Calidad</td>
        <td class='td-border' colspan='2' >Líder de Calidad</td>
    </tr>
</table>
";
}

function getBody(){
    return"
<body>
<table>
    <tr>
        <td>
            <p>
                San José de Cúcuta,
            </p>
<br>
<br>
            <p>Señores</p>
            <p class='strong'>
                COMITÉ CENTRAL DE INVESTIGACIÓN Y EXTENSIÓN
            </p>
            <p>
                Universidad Francisco de Paula Santander
            </p>
        </td>
    </tr><br>
    <tr>
        <td><p>Cordial Saludo:</p></td>
    </tr>
    <br>
    <tr>
        <td style='text-align:justify'>
            <p>
            Por medio de la presente me permito informar que he revisado el Informe de Gestión presentado por el semillero <strong>_semillero</strong> del grupo  de Investigación <strong>_grupo</strong>, el cual ha cumplido con el <strong>_porcentaje % </strong> de los productos previstos en el Plan de Acción del <strong>_semestre</strong> Semestre del Año <strong>_anio</strong> , los cuales son (_productos), por lo tanto   <strong>_recomendacion_horas</strong> recomiendo las horas de investigación solicitadas.
<br><br><br>De igual manera informo que el Plan de Acción presentado para el próximo semestre académico <strong>_cumple_requisitos</strong> cumple con los productos mínimos exigidos en el artículo 25 del Acuerdo 056 de 2012.
            </p>       
        </td>
    </tr><br>
</table>
<br>
    <div>
    Atentamente,
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table class='table'>
    <tr>
        <td style='width: 50%;text-align: left; padding-left:30px'><img src='../../../img/firmaTest.png' alt='firma docente' width='100' /></td>
    </tr>
    <tr>
        <td class='strong' style='text-align: left;'>
           <span style='text-decoration:overline'> FIRMA REPRESENTANTE</span><br />
            FACULTAD DE _facultad <br/>
            COMITÉ CENTRAL DE INVESTIGACIÓN Y EXTENSIÓN
        </td>
    </tr>
</table>

</body>
    ";
}

function getFooter(){
    return"
    <table width='100%'>
    <tr>
        <td align='center' width='100%' style='font-size: 10px;'>
        ** Copia No Controlada **
        </td>
    </tr>
</table>
    ";
}