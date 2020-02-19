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

        .logocpnb{
            height: 80px;
        }

        span{
            font-weight: bold;
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

                        <u>OFICINA DE GESTIÓN HUMANA</u>

                    </p>

                </td>

                <td style="text-align: right; ">
                    <img src="./views/img/pnb.jpg" alt="LOGO CPNB" class="logocpnb">
                </td>

            </tr>

        </table>

    </page_header>

    <page_footer> <!-- Pie de página -->


        <p ALIGN="justify">
            
            <img src="./views/img/pie.jpg" alt="">

            <br>

            <strong>
                Avenida Fuerzas Armadas con Calle Helicoide, Roca Tarpeya. Parroquia Santa Rosalia. Municipio Libertador. Caracas-Venezuela Codigo postal 1041 Telefono: 0212-5088937
                Rif:G-20009327-7
            </strong>

        </p>

    </page_footer>

    <br><br><br><br><br><br><br>

    <h1 style="text-align:center"> C O N S T A N C I A  </h1>

    <p style="text-align: justify;">
        Quien suscribe, DIRECTOR (A) DE LA OFICINA DE GESTIÓN HUMANA (E) del CUERPO DE POLICÍA NACIONAL BOLIVARIANA, hace constar que el ciudadano (a) <span><?=$datos[1]?></span>, titular de la cédula de identidad N°. V.- <span><?=$datos[0]?></span>, presta sus servicios en este organismo desde el  <span><?= date("d-m-Y", strtotime($datos[2]))?></span>, en calidad de  <span><?=$datos[3]?></span>, con una remuneración mensual discriminada de la siguiente manera:
    </p>

    <br>

    <table style="width: 500px; text-align: center;">
        <tr>

            <th style="text-align: center; width: 300px;">CONCEPTOS</th>
            <th style="text-align: center; width: 300px;">MENSUAL Bs.</th>

        </tr>

        <?php            
            // Cargar foreach con los conceptos pagados al trabajador
            require_once './controllers/conceptos.php';            
        ?>
        
        <tr>

            <td style="text-align: center; width: 300px;"></td>
            <td style="text-align: center; width: 300px;">_________________</td>

        </tr>

        <tr>

            <th style="text-align: center; width: 300px;">TOTAL ASIGNACIÓN</th>
            <th style="text-align: center; width: 300px;"> <?= number_format($total,2,',','.'); ?> </th>

        </tr>

    </table>
    

    <p style="text-align: justify;">
        Percibe por beneficio de alimentación la cantidad de doscientos mil bolivares exactos (Bs.
        200.000,00) mensuales.
    </p>

    <p style="text-align: justify;">
        Constancia que se expide a solicitud de parte interesada, en Caracas a los <?= date('d') . " dias del mes de " .  strtolower(ajaxController::get_mes($mes)) . " de " . date('Y')."."; ?>
    </p>

    <img class="firma" src="./views/img/firma1.png">

    <p ALIGN="justify">
            Esta constancia ha sido emitida electronicamente, los datos reflejados estan sujetos a confirmacion a través de nuestra pagina web http://www.policianacional.gob.ve/,
            mediante el enlace extranet en el modulo verificación de constancia, introduciendo el siguiente codigo: <b> <?=$codigo?> </b>
    </p>

</page>