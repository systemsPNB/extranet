<?php
$peticionAjax = true;
session_start(['name' => 'NSW']);

require_once '../controllers/ajaxController.php';
$datos = new ajaxController();
$trabajador = $datos->get_data_workers('24280430');
$registros = $datos->reporte_arc('24280430');

// print_r($trabajador);

$GLOBALS['cedula'] = $trabajador[0];
$GLOBALS['nombres'] = $trabajador[1];


// fecha en español +++++++++++++++++++++++++++++++++++++++++++++++++++++//
// $hoy = date("F j, Y, g:i a");

$arrayMeses = array(
    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
);

$arrayDias = array(
    'Domingo', 'Lunes', 'Martes',
    'Miercoles', 'Jueves', 'Viernes', 'Sabado'
);


/*
Resultado, (fecha actual 21/09/2012):
Viernes, 21 de Septiembre de 2012
*/

// fecha en español +++++++++++++++++++++++++++++++++++++++++++++++++++++//



?>

<page pageset="new" backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm" footer="page">
    <style type="text/css">
        td img {
            width: 70px;

        }
    </style>

    <page_header>
        <!-- <p>Esta es la cabecera</p> -->
        <br><br><br>
        <table style="width: 100%;" align="center">
            <tr>
                <!-- <img src="../vista/assets/img/cuadrante.png" alt=""> -->
                <td style="text-align: left;"><img src="../views/img/mini.jpg" alt=""></td>
                <td style="text-align: center;    width: 75%">
                    <p>
                        <strong>
                            REPÚBLICA BOLIVARIANA DE VENEZUELA <br>
                            MINISTERIO DEL PODER POPULAR PARA RELACIONES INTERIORES, JUSTICIA Y PAZ<br>
                            CUERPO DE POLICÍA NACIONAL BOLIVARIANA<br>

                            <u>OFICINA DE RECURSOS HUMANOS</u>
                        </strong>
                    </p>
                </td>
                <td style="text-align: right; "><img src="../views/img/pnb.jpg" alt=""></td>
            </tr>
        </table>
    </page_header>


    <page_footer>
        <!-- <P style="text-align:center;"></P>
        <P style="text-align:center; "><u>MARLYN GONZÁLEZ GONZÁLEZ</u><br> <strong> DIRECTORA DE LA OFICINA DE GESTION HUMANA </strong></P> -->
        <p style="text-align:center; ">Esta constancia ha sido emitida electronicamente, los datos reflejados estan sujetos a confirmacion a través de nuestra pagina web http://cpnb.gob.ve,
            mediante el enlace extranet en el modulo verificación de constancia, introduciendo el siguiente codigo:YSP7RSC7P0SI2S.
        <img src="../views/img/pie.jpg" alt="">
        <strong>Avenida Fuerzas Armas con Calle Helicoide, Roca Tarpeya. Parroquia Santa Rosalia. Municipio Libertador. Caracas-Venezuela Codigo postal 1041 Telefono: 0212-5088937
                Rif:G-20009327-7</strong></p>
    </page_footer>
    <br><br><br><br><br>
    <br><br><br><br>
    <!-- <p style="text-align: right;"><?php //echo $arrayDias[date('w')] . ", " . date('d') . " de " . $arrayMeses[date('m') - 1] . " de " . date('Y'); 
                                        ?></p><br><br> -->
    <h1 style="text-align:center">


        C O N S T A N C I A

    </h1>
    <br>
    <p style="text-indent: 30">
        Quien suscribe, DIRECTOR DE LA OFICINA DE RECURSOS HUMANOS (E) del CUERPO DE
        POLICÍA NACIONAL BOLIVARIANA, hace constar que el(la) ciudadano(a) <strong> <?php echo $GLOBALS['nombres']; ?> </strong>, titular de la cedula de identidad
        No. <strong> <?php echo $GLOBALS['cedula']; ?> </strong>, codigo <strong> <?php echo $GLOBALS['cedula']; ?> </strong>
        desempeñando en la actualidad el cargo de, presta sus servicios en este organismo desde el <strong> <?php echo $GLOBALS['cedula']; ?> </strong> OFICIAL, con una asignacion mensual d
        iscriminada de la siguiente manera:
    </p>

    <br>
    <br>
    <br>

    <table style="width: 500px;" align=" center">
        <tr>

            <th style="text-align: center; width: 300px;">CONCEPTOS</th>
            <th style="text-align: center; width: 300px;">MENSUAL Bs.</th>

        </tr>
        <tr>
            <td style="text-align: center; width: 300px;">SUELDO BASICO</td>
            <td style="text-align: center; width: 300px;">222222</td>
           
        </tr>
        <tr>
            <td style="text-align: center; width: 300px;">PRIMA DE RIESGO</td>
            <td style="text-align: center; width: 300px;">222222</td>
           
        </tr>

        <tr>
            <td style="text-align: center; width: 300px;">OTRAS RETRIBUCIONES (EXPERIENCIA Y
RESPONSABILIDAD</td>
            <td style="text-align: center; width: 300px;">222222</td>
           
        </tr>

        <tr>
            <td style="text-align: center; width: 300px;">PRIMA PROFESIONALIZACION 12%</td>
            <td style="text-align: center; width: 300px;">222222</td>
           
        </tr>

        <tr>
            <td style="text-align: center; width: 300px;">PRIMA TRANSPORTE</td>
            <td style="text-align: center; width: 300px;">222222</td>
           
        </tr>

        <tr>
            <td style="text-align: center; width: 300px;">PRIMA POR HOGAR</td>
            <td style="text-align: center; width: 300px;">222222</td>
           
        </tr>

        <tr>
            <td style="text-align: center; width: 300px;">PRIMA INCENTIVO MOTIVACIÓN SOCIAL</td>
            <td style="text-align: center; width: 300px;">222222</td>
           
        </tr>
       
        <tr>
            <td style="text-align: center; width: 300px;"></td>
            <td style="text-align: center; width: 300px;">_________________</td>
        </tr>
        <tr>

<th style="text-align: center; width: 300px;">TOTAL ASIGNACION</th>
<th style="text-align: center; width: 300px;">4444444</th>

</tr>


    </table>
    

    <br>
    <p >Percibe por beneficio de alimentación la cantidad de novecientos quince mil bolivares exactos (Bs.
915.000,00) mensuales.</p>

<p>Constancia que se expide a solicitud de parte interesada, en Caracas a los <?php echo  date('d') . " dias del mes de " . $arrayMeses[date('m') - 1] . " de " . date('Y'); 
                                        ?></p>




</page>