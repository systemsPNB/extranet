<?php

require_once './vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
require_once './controllers/ajaxController.php';
$class = new ajaxController;
$mes = date('m');

$id_trabajador = explode("/", $_GET['views']);

$datos = $class->get_data_workers($id_trabajador[1]);

$pay = $class->get_data_pay_workers($id_trabajador[1]);

ob_start();
    require_once './views/content/htmlConstancia.php';
$html = ob_get_clean();

    //Pasamos esa vista a PDF

    //Le indicamos el tipo de hoja y la codificación de caracteres
    $pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');

    //Escribimos el contenido en el PDF
    $pdf->writeHTML($html);

    //Generamos el PDF
    $pdf->Output('PdfGeneradoPHP.pdf','I');