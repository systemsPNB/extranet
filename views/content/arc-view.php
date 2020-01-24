<?php

require_once './controllers/ajaxController.php';

$datos = new ajaxController();

session_start(['name' => 'NSW']);

$url = explode("/", $_GET['views']);

// Desencriptar id_trabajador
$idwork = $datos->desencriptar_idwork($url[1]);

// para foreach con los montos mensuales
$registros = $datos->reporte_arc($idwork);

// Para forech con las deducciones anuales
$deducciones = $datos->deducciones_reporte_arc($idwork);

// Para la cabecera del arc
$trabajador = $datos->get_data_workers($idwork);
$GLOBALS['cedula'] = $trabajador[0];
$GLOBALS['nombres'] = $trabajador[1];

if(isset($_SESSION['nivel'])){

    // if($_SESSION['nivel']==1){

        require('views/assets/fpdf/fpdf.php');

        class PDF extends FPDF{
            // Cabecera de página
            function Header(){

                $this->Image('views/img/pnb.jpg',15,8,15);
                // Arial bold 15
                $this->SetFont('Arial', '', 10);
                // $this->Ln();
                $this->SetX(40);
                $this->Cell(85, 4, 'REPÚBLICA BOLIVARIANA DE VENEZUELA', 0, 1, 'L');
                $this->SetX(40);
                $this->Cell(85, 4, 'CUERPO DE POLICÍA NACIONAL BOLIVARIANA', 0, 0, 'L');

                $this->Cell(70, 4, date("d-m-Y"), 0, 1, 'R');

                $this->Ln();
                $this->Ln();
                
                $this->SetX(80);

                $this->Cell(50, 4, 'PLANILLA AR-C', 0, 1, 'C');
                
                $this->SetX(70);

                $this->Cell(70, 4, 'PERÍODO 01/01/2019 AL 31/12/2019', 0, 1, 'C');

                $this->Ln();
                $this->Ln();

                $this->Cell(40, 4, $GLOBALS['cedula'], 0, 0, 'L');
                $this->Cell(90, 4, $GLOBALS['nombres'], 0, 0, 'C');
                $this->Cell(55, 4, 'RIF', 0, 1, 'R');
                $this->Ln();
                
                $this->Line(10,50,195,50);
                // $this->Line('trazo x inicial',50,'trazo y final','');
                
                $this->Ln();
                $this->Ln();
                
                $this->Cell(50, 4, 'ORGANISMO', 0, 0, 'L');
                $this->SetFont('Arial', 'B', 10);
                $this->Cell(90, 4, 'CUERPO DE POLICÍA NACIONAL BOLIVARIANA', 0, 0, 'C');
                $this->Cell(45, 4, 'RIF G-20009327-7', 0, 1, 'R');

                $this->Ln();

                $this->SetFont('Arial', '', 10);
                $this->Cell(50, 4, 'AGENTE DE RETENCIÓN', 0, 0, 'L');
                $this->SetFont('Arial', 'B', 10);
                $this->Cell(90, 4, 'PARRA RINCON FREDDY RAMON', 0, 0, 'C');
                $this->Cell(45, 4, 'CÉDULA 13242402', 0, 1, 'R');

                $this->Ln();

                $this->SetFont('Arial', '', 10);
                $this->Cell(50, 4, 'DIRECCIÓN', 0, 0, 'L');
                $this->SetFont('Arial', 'B', 10);
                $this->MultiCell(135, 4, 'AVENIDA FUERZAS ARMADAS CON CALLE HELICOIDE, ROCA TARPEYA. PARROQUIA SANTA ROSALÍA MUNICIPIO LIBERTADOR.', 0, 'J');

                $this->Line(10,85,195,85);

                // Cabecera de la tabla
                $this->SetFont('Arial','B',10);
                $this->Ln();
                $this->Ln();

                $this->SetX(27);

                $this->Cell(30,5,'MES',0,0,'L',0);
                $this->Cell(30,5,'DEVENGADO',0,1,'C',0);
                $this->SetX(57);
                $this->Cell(30,5,'MENSUAL',0,0,'C',0);
                $this->SetY(90);
                $this->SetX(87);
                $this->Cell(20,5,'% ISLR',0,0,'C',0);
                $this->Cell(25,5,'RETENCIÓN',0,1,'C',0);
                $this->SetX(107);
                $this->Cell(25,5,'MENSUAL',0,0,'C',0);

                $this->SetY(90);
                $this->SetX(132);

                $this->Cell(25,5,'ACUMULADO',0,1,'C',0);
                $this->SetX(132);
                $this->Cell(25,5,'DEVENGADO',0,0,'C',0);

                $this->SetY(90);
                $this->SetX(157);

                $this->Cell(25,5,'ACUMULADO',0,1,'C',0);
                $this->SetX(157);
                $this->Cell(25,5,'RETENCIÓN',0,1,'C',0);

                $this->Line(10,101,195,101);

            }

            // Pie de página
            function Footer(){

                // Posición:a 1,5 cm del final
                $this->SetY(-20);
                // Arial italic 8
                $this->SetFont('Arial', 'B', 8);

                $this->Line(10,220,195,220);

                // Título footer
                $this->Line(10,275,57,275);
                $this->Cell(50, 5, 'PARRA RINCON FREDDY RAMON', 0, 1, 'L');
                $this->Cell(50, 5, '13242405', 0, 1, 'L');
               
            }

        }

        $fecha = date("d-m-Y");

        // Creación del objeto de la clase heredada
        $pdf = new PDF(); //'L','mm','A4'
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);

        foreach ($registros as $value){

            if($value[0]==1){
                $acumulado = $value[1];
            }else{
                $acumulado += $value[1];
                // number_format(,2);
            }

            $mes = $datos->get_mes($value[0]);

            $pdf->SetX(27);
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(30,10,$mes,0,0,'L',0); // Mes
            $pdf->Cell(30,10,number_format($value[1],2),0,0,'C',0); // Sueldo mensual
            $pdf->Cell(20,10,'0.00',0,0,'C',0);   // %isrl
            $pdf->Cell(25,10,'0.00',0,0,'C',0);   // retención mensual
            $pdf->Cell(25,10,number_format($acumulado,2),0,0,'C',0);   // acumulado devengado
            $pdf->Cell(25,10,'0.00',0,1,'C',0);   // acumulado retención
        }

        $pdf->Ln(3);

        foreach ($deducciones as $deduccion){

            switch ($deduccion[0]) {
                case 'SEGURO PARO FORZOSO':
                    $concepto = "ACUMULADO SPF";
                    break;
                case 'FON. DE AHORRO OBLIG. VIVIENDA':
                    $concepto = "ACUMULADO LPH";
                    break;
                case 'FONDO DE PENSION Y JUBILACION':
                    $concepto = "ACUMULADO FJU ";
                    break;
                case 'SEGURO SOCIAL OBLIG.':
                    $concepto = "ACUMULADO SSO";
                    break;
                
            }

            $pdf->Cell(35, 5, $concepto, 0, 0, 'L');
            $pdf->Cell(45, 5, number_format($deduccion[1],2), 0, 1, 'C');

        }

        $pdf->Line(10,246,195,246);

        $pdf->Output($GLOBALS['cedula']."-arc.pdf",'I');

    // }

}else{

    header('Location: '.SERVERURL.'controllers/cerrarSesion.php');
    
}