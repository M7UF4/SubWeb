<?php
$nom = $_POST['nom'];
$preu = $_POST['valor'];
require_once '../Public/dompdf/autoload.inc.php';

$data=date('Y,m,d');
$gavi='<html><body><h1>SUBWEß</h1>';

$gavi.=$nom.' '.$preu.'</body></html>';

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
?>
