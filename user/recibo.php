<?php
$nom = $_POST['nom'];
$usernom = $_POST['usernom'];
$preu = $_POST['valor'];
$email = $_POST['email'];
require_once '../Public/dompdf/autoload.inc.php';

$gavi='<html><body>'
        . '<div id="logo">'
        . '<ul class="logo2">'
        . '<li class="s">S</li>'
        .'<li class="u">U</li>'
        .'<li class="b">ß</li>'
        .'<li class="w">W</li>'
        .'<li class="e">E</li>'
        .'<li class="b2">B</li><br>'
        . '<li class="add">C/Madrid 35, Amposta<li>'
        . '</ul>'
        . '</div>';
$gavi.='<table class="user-data"><tr>'
        . '<td width=200px;><b>'.ucfirst($usernom).'</b><br>'.$email.'</td>'
        . '</tr></table>';

$gavi.='<br><br><br><br><br><hr><table class="datapaid" style="margin:0%; margin:auto;"><tr class="menutr">'
        . '<td width="350px">Nom</td>'
        . '<td width="100px">Valor</td>'
        . '<td width="100px">Situació</td></tr><tr>'
        . '<td width="350px">'.$nom.'</td>'
        . '<td width="10px">'.$preu.'</td>'
        . '<td width="100px">Pagat</td>'
        . '</tr></table>';
//$gavi=$nom.' '.$preu.'</body></html>';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($gavi);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("recibo", array("Attachment" => false));

//SUBWEß
?>
