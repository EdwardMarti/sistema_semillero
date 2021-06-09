<?php
require_once "../../../../vendor/autoload.php";
require_once('./styles.css');

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
$htmlBody = str_replace("_horas_catedra", $data["horas_catedra"] , $htmlBody);
$htmlBody = str_replace("_horas_planta", $data["horas_planta"] , $htmlBody);
$htmlBody = str_replace("_semestre", $data["semestre"] , $htmlBody);
$htmlBody = str_replace("_grupo_investigacion", $data["grupo_investigacion"] , $htmlBody);
$htmlBody = str_replace("_semillero", $data["semillero"] , $htmlBody);
$htmlBody = str_replace("_anio", $data["anio"] , $htmlBody);
$htmlBody = str_replace("_docente", $data["docente"] , $htmlBody);
$htmlBody = str_replace("_horas_solicitadas", $data["horas_solicitadas"] , $htmlBody);


$mpdf->WriteHTML(file_get_contents('styles.css'), \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($htmlBody, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output("solicitudHoras.pdf", \Mpdf\Output\Destination::INLINE);

function getHeader(){
    return "
<table class='table table-border' cellspacing='0' cellpadding='0'>

    <tr>
        <td class='td-border strong wd-20' rowspan='4'><img src='../../../img/Logo-nuevo-vertical.png' alt='logo universidad' width='100' ></td>
        <td class='td-border strong wd-55' rowspan='2'>INVESTIGACIÓN</td>
        <td class='td-border strong' >CÓDIGO</td>
        <td class='td-border' >_codigo</td>
    </tr>
    <tr>
        <td class='td-border strong' >VERSIÓN</td>
        <td class='td-border' >_version</td>
    </tr>
    <tr>
        <td class='td-border strong bg-red' rowspan='2'>SOLICITUD DE HORAS DE INVESTIGACIÓN PARA DIRECTORES DE SEMILLEROS</td>
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
            Por medio de la presente me permito solicitar el reconocimiento de horas de investigación por concepto de Dirección del Semillero de Investigación <strong>_grupo_investigacion</strong> adscrito al Grupo de Investigación <strong>_semillero</strong>, 
            al docente <strong>_docente</strong>, teniendo en cuenta que se encuentra al día en la entrega del plan de acción del <strong>_semestre</strong> semestre académico del año <strong>_anio</strong> y el informe de gestión del semestre académico actual.
            </p>       
        </td>
    </tr><br>
</table>
<br>
<br>
<br>
<table class='table'>
    <tr>
        <td style='text-align:left'>
            <table>
                <tr>
                    <td class='strong'>Catedra:</td>
                    <td>_horas_catedra horas</td>
                </tr>
            </table>
        </td>
        <td style='text-align:left'>
            <table>
                <tr>
                    <td class='strong'>Planta:</td>
                    <td>_horas_planta horas</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div style='margin-top:5px; padding-left:5px'>
    Número de Horas Solicitadas: las _horas_solicitadas laborales
</div>
<table style='margin-top:30px'>
    <tr>
        <td>
            <p>
            <strong>Nota:</strong> Seleccionar el número de horas correspondientes, según la modalidad de vinculación docente.
            </p>
        </td>
    </tr>
</table>
<br>
<br>
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
                    <td style='width: 50%'><img src='../../../img/firmaTest.png' alt='firma docente' width='100' ></td>
                    <td style='width: 50%'><img src='../../../img/firmaTest.png' alt='firma docente' width='100' ></td>
                </tr>
                <tr>
                    <td>
                        <hr color='black' size=2 width='50%'>
                    </td>
                    <td>
                        <hr color='black' size=2 width='50%'>
                    </td>
                </tr>
                <tr>
                    <td class='strong'>FIRMA DIRECTOR GRUPO DE<br>INVESIGACION</td>
                    <td class='strong'>Vbo. REPRESENTANTE DE<br>FACULTAD</td>
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