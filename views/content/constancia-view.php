<?php

require_once './vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

session_start(['name' => 'NSW']);

if ($_SESSION['id_user']) {

    require_once './controllers/ajaxController.php';
    $class = new ajaxController;
    $mes = date('m');

    $url = explode("/", $_GET['views']);

    // Detectar rol del usuario
    if($_SESSION['nivel']==1){
        /* Si es administrador, el parametro del id_trabajador no viene cifrado */
        $idwork = $url[1];
        
    } else {
        /* Si el rol es normal el parametro del id_trabajador esta cifrado y debe desencriptarse con esta función */
        $idwork = $class->desencriptar_idwork($url[1]);
    }
    
    // Datos personales del trabajador
    $datos = $class->get_data_workers($idwork);

    // Datos de pago del trabajador
    $pay = $class->get_data_pay_workers($idwork);

    // var_dump($pay); die();
    // Obtener total pagado sin efectuar el bucle
    $pago = array_sum(array_column($pay,'sum'));

    // Registrar constancia y obtener el codigo de la misma
    $codigo = $class->registrar_constancia($pago,$idwork);

    ob_start();
        require_once './views/content/htmlConstancia.php';
    $html = ob_get_clean();

        //Pasamos esa vista a PDF

        //Le indicamos el tipo de hoja y la codificación de caracteres
        $pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');

        //Escribimos el contenido en el PDF
        $pdf->writeHTML($html);

        //Generamos el PDF
        if($_SESSION['nivel']==1){
            $pdf->Output($datos[0]."-constancia.pdf",'D'); // Descargar sin abrir
        }else{
            $pdf->Output($datos[0]."-constancia.pdf",'I'); // Mostrar en el navegador
        }

}else{
    
    header('Location: '.SERVERURL.'controllers/cerrarSesion.php');
    
}