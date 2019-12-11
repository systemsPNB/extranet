<?php

session_start(['name' => 'NSW']);

if(isset($_SESSION['nivel'])){

    if($_SESSION['nivel']==1){

        require('views/assets/fpdf/fpdf.php');

        class PDF extends FPDF{
            // Cabecera de página
            function Header(){
                $this->Image('views/img/pnb.jpg',15,8,15);
                // Arial bold 15
                $this->SetFont('Arial', 'I', 10);
                // $this->Ln();
                $this->SetX(40);
                $this->Cell(85, 4, 'REPÚBLICA BOLIVARIANA DE VENEZUELA', 0, 1, 'L');
                $this->SetX(40);
                $this->Cell(85, 4, 'CUERPO DE POLICÍA NACIONAL BOLIVARIANA', 0, 0, 'L');

                $this->Cell(70, 4, 'Fecha', 0, 1, 'R');

                $this->Ln();
                $this->Ln();
                
                $this->SetX(80);

                $this->Cell(50, 4, 'PLANILLA AR-C', 0, 1, 'C');
                
                $this->SetX(70);

                $this->Cell(70, 4, 'PERÍODO 01/01/2019 AL 31/12/2019', 0, 1, 'C');

                $this->Ln();
                $this->Ln();

                $this->Cell(40, 4, 'CÉDULA', 0, 0, 'L');
                $this->Cell(90, 4, 'NOMBRE', 0, 0, 'C');
                $this->Cell(55, 4, 'RIF', 0, 1, 'R');
                $this->Ln();
                
                $this->Line(10,50,195,50);
                // $this->Line('trazo x inicial',50,'trazo y final','');
                
                $this->Ln();
                $this->Ln();
                
                $this->Cell(50, 4, 'ORGANISMO', 0, 0, 'L');
                $this->Cell(90, 4, 'CUERPO DE POLICÍA NACIONAL BOLIVARIANA', 0, 0, 'C');
                $this->Cell(45, 4, 'RIF G-20009327-7', 0, 1, 'R');

                $this->Ln();

                $this->Cell(50, 4, 'AGENTE DE RETENCIÓN', 0, 0, 'L');
                $this->Cell(90, 4, 'PARRA RINCON FREDDY RAMON', 0, 0, 'C');
                $this->Cell(45, 4, 'CÉDULA 13242402', 0, 1, 'R');

                $this->Ln();

                $this->Cell(50, 4, 'DIRECCIÓN', 0, 0, 'L');
                $this->MultiCell(135, 4, 'AVENIDA FUERZAS ARMADAS CON CALLE HELICOIDE, ROCA TARPEYA. PARROQUIA SANTA ROSALÍA MUNICIPIO LIBERTADOR.', 0, 'J');

                $this->Line(10,85,195,85);

                // Cabecera de la tabla
                $this->SetFont('Arial','B',10);
                $this->Ln();
                $this->Ln();

                $this->SetX(20);


                $this->Cell(30,20,'MES',1,0,'C',0);
                $this->Cell(30,10,'DEVENGADO',1,1,'C',0);
                $this->SetX(50);
                $this->Cell(30,10,'MENSUAL',1,0,'C',0);
                $this->SetY(90);
                $this->SetX(80);
                $this->Cell(20,20,'% ISLR',1,0,'C',0);
                $this->Cell(25,10,'RETENCIÓN',1,1,'C',0);
                $this->SetX(100);
                $this->Cell(25,10,'MENSUAL',1,0,'C',0);

                $this->SetY(90);
                $this->SetX(125);

                $this->Cell(25,10,'ACUMULADO',1,1,'C',0);
                $this->SetX(125);
                $this->Cell(25,10,'DEVENGADO',1,0,'C',0);

                $this->SetY(90);
                $this->SetX(150);

                $this->Cell(25,10,'ACUMULADO',1,1,'C',0);
                $this->SetX(150);
                $this->Cell(25,10,'RETENCIÓN',1,0,'C',0);

 
            }

            // Pie de página
            function Footer(){
                // Posición:a 1,5 cm del final
                $this->SetY(-20);
                // Arial italic 8
                $this->SetFont('Arial', 'B', 8);

                $this->Line(10,230,195,230);

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

        require_once './controllers/ajaxController.php';
        $datos = new ajaxController();
        $registros = $datos->reportepdf_controller();

        $nro = 0;

        // foreach ($registros as $value) { $nro++;
        //     $pdf->Cell(15, 10, $nro, 1, 0, 'C', 0);
        //     $pdf->Cell(25,10,$value['civ'],1,0,'C',0);
        //     $pdf->Cell(70,10,$value[1],1,0,'C',0);
        //     $pdf->Cell(20,10,$value[2],1,0,'C',0);
        //     $pdf->Cell(20,10,$value[3],1,0,'C',0);
        //     $pdf->Cell(35,10,str_replace('-', '/', date('d-m-Y', strtotime($value[4]))),1,1,'C',0);
        // }

        $pdf->Output();

    }

}else{

    header('Location: 404');
    
}