<page pageset="new" backtop="10mm" backbottom="10mm" backleft="20mm" backright="20mm" footer="page">

    <style type="text/css">
        td img {
            width: 70px;

        }

        .firma{
            width: 300px;
            height: 300px;
            position: relative;
            left: 135px;
        }
    </style>

    <page_header> <!-- Cabecera -->
        
        <br><br><br>

        <table style="width: 760px; position: relative; left: 28px; text-align: center;">

            <tr>

                <td style="text-align: left;">
                    <img src="./views/img/mini.jpg" alt="">
                </td>

                <td style="text-align: center; width: 75%">
                
                    <p style="font-weight: bold;">

                        REPÚBLICA BOLIVARIANA DE VENEZUELA

                        <br>

                        MINISTERIO DEL PODER POPULAR PARA RELACIONES INTERIORES, JUSTICIA Y PAZ<br>
                        CUERPO DE POLICÍA NACIONAL BOLIVARIANA

                        <br>

                        <u>OFICINA DE RECURSOS HUMANOS</u>

                    </p>

                </td>

                <td style="text-align: right; ">
                    <img src="./views/img/pnb.jpg" alt="">
                </td>

            </tr>

        </table>

    </page_header>


    <page_footer>


        <p ALIGN="justify">
            Esta constancia ha sido emitida electronicamente, los datos reflejados estan sujetos a confirmacion a través de nuestra pagina web http://cpnb.gob.ve,
            mediante el enlace extranet en el modulo verificación de constancia, introduciendo el siguiente codigo:YSP7RSC7P0SI2S.
            
            <img src="./views/img/pie.jpg" alt="">

            <br>

            <strong>
                Avenida Fuerzas Armadas con Calle Helicoide, Roca Tarpeya. Parroquia Santa Rosalia. Municipio Libertador. Caracas-Venezuela Codigo postal 1041 Telefono: 0212-5088937
                Rif:G-20009327-7
            </strong>

        </p>

    </page_footer>

    <br><br><br><br><br><br><br>



    <br><br>

    <h1 style="text-align:center"> C O N S T A N C I A </h1>

    <br>

    <?php
    switch ($datos[4]){

        case 'M':
            $sexo = "que el ciudadano";
            break;

        case 'F':
            $sexo = "que la ciudadana";
            break;

        case '':
            $sexo = "que el(la) ciudadano(a)";
            break;
        

    }
    ?>

    <p style="text-indent: 30; text-align: justify;">
        Quien suscribe, DIRECTOR DE LA OFICINA DE RECURSOS HUMANOS (E) del CUERPO DE
        POLICÍA NACIONAL BOLIVARIANA, hace constar <?=$sexo;?> <strong><?=$datos[1];?></strong>, titular de la cédula de identidad
        N°. <strong><?=$datos[0];?></strong>, desempeñando en la actualidad el cargo de <strong><?=$datos[3];?></strong>, presta sus servicios en este organismo desde el <strong><?=$datos[2];?></strong>, con una asignacion mensual discriminada de la siguiente manera:
    </p>

    <br><br>

    <table style="width: 500px; text-align: center;">
        <tr>

            <th style="text-align: center; width: 300px;">CONCEPTOS</th>
            <th style="text-align: center; width: 300px;">MENSUAL Bs.</th>

        </tr>


        <?php $total = 0; foreach ($pay as $value){ ?>

            <tr>

                <td style="text-align: left; width: 300px;"> <?=$value[0];?> </td>
                <td style="text-align: center; width: 300px;"> <?= number_format($value[1],2);?> </td>
                
            </tr>

        <?php $total += $value[1]; } ?>
        
        <tr>

            <td style="text-align: center; width: 300px;"></td>
            <td style="text-align: center; width: 300px;">_________________</td>

        </tr>

        <tr>

            <th style="text-align: center; width: 300px;">TOTAL ASIGNACIÓN</th>
            <th style="text-align: center; width: 300px;"> <?= number_format($total,2); ?> </th>

        </tr>


    </table>
    
    <br>

    <p style="text-align: justify;">
        Percibe por beneficio de alimentación la cantidad de novecientos quince mil bolivares exactos (Bs.
        915.000,00) mensuales.
    </p>


    <p style="text-align: justify;">
        Constancia que se expide a solicitud de parte interesada, en Caracas a los <?= date('d') . " dias del mes de " . ajaxController::get_mes($mes) . " de " . date('Y')."."; ?>
    </p>


    <img class="firma" src="./views/img/firma1.png">

</page>