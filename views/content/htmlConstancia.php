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
        Quien suscribe, DIRECTOR (A) DE LA OFICINA DE GESTIÓN HUMANA (E) del CUERPO DE
        POLICÍA NACIONAL BOLIVARIANA, hace constar que el ciudadano (a) <strong><?=$datos[1];?></strong>, titular de la cédula de identidad
        N°. V.-<strong><?=$datos[0];?></strong>, presta sus servicios en este organismo desde el <strong><?= date("d-m-Y", strtotime($datos[2]));?></strong>, en calidad de <strong><?=$datos[3];?></strong>, con una remuneración mensual discriminada de la siguiente manera:
    </p>

    <br>

    <table style="width: 500px; text-align: center;">
        <tr>

            <th style="text-align: center; width: 300px;">CONCEPTOS</th>
            <th style="text-align: center; width: 300px;">MENSUAL Bs.</th>

        </tr>

        <?php            
            function html($concepto,$valor){

                echo "
                    <tr>
                        <td style='text-align: left; width: 300px;'>
                            ".$concepto."
                        </td>
                        
                        <td style='text-align: center; width: 300px;'>
                            ".number_format($valor,2)."
                        </td>
                    </tr>
                ";
            }
            
            $total = 0;
            $sueldoBasico = 0;
            $complemento = 0;
            $primaHijo = 0;
            $primaProf = 0;
            $primaAntig = 0;

            foreach ($pay as $value){
                // ------------------------  Sueldo basico
                if($value->descripcion == 'SUELDO BASICO'){
                    $sueldoBasico = $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'DIFERENCIA SUELDO BASICO'){
                    $sueldoBasico += $value->sum;
                    $concepto = "SUELDO BASICO ";
                    html($concepto,$sueldoBasico);
                    $total += $value->sum;
                    continue;
                }
                // ------------------------  Sueldo basico

                // ------------------------  Complemento
                if($value->descripcion == 'COMPLEMENTO'){
                    $complemento = $value->sum;
                    $total += $value->sum;
                    continue;
                }
                
                if($value->descripcion == 'DIFERENCIA COMPLEMENTO'){
                    $complemento += $value->sum;
                    $concepto = "COMPLEMENTO ";
                    html($concepto,$complemento);
                    $total += $value->sum;
                    continue;
                }
                // ------------------------  Complemento

                // ------------------------  Prima por hijo
                if($value->descripcion == 'PRIMA POR HIJO'){
                    $primaHijo = $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'DIFERENCIA PRIMA POR HIJO'){
                    $primaHijo += $value->sum;
                    $concepto = "PRIMA POR HIJO ";
                    html($concepto,$primaHijo);
                    $total += $value->sum;
                    continue;
                }
                // ------------------------  Prima por hijo

                // ------------------------  Prima profesionalización
                if($value->descripcion == 'DIFERENCIA  PRIMA PROFESIONALIZACION'){
                    $primaProf = $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA PROFESIONALIZACION 12%'){
                    $primaProf += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA PROFESIONALIZACION 20%'){
                    $primaProf += $value->sum;
                    $valor = $primaProf;
                    $concepto = "PRIMA PROFESIONALIZACION 20% ";
                    html($concepto,$primaProf);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA PROFESIONALIZACION 14%'){
                    $primaProf += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA PROFESIONALIZACION 30%'){
                    $primaProf += $value->sum;
                    $valor = $primaProf;
                    $concepto = "PRIMA PROFESIONALIZACION 30% ";
                    html($concepto,$primaProf);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA PROFESIONALIZACION 16%'){
                    $primaProf += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA PROFESIONALIZACION 40%'){
                    $primaProf += $value->sum;
                    $valor = $primaProf;
                    $concepto = "PRIMA PROFESIONALIZACION 40% ";
                    html($concepto,$primaProf);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA PROFESIONALIZACION 18%'){
                    $primaProf += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA PROFESIONALIZACION 50%'){
                    $primaProf += $value->sum;
                    $valor = $primaProf;
                    $concepto = "PRIMA PROFESIONALIZACION 50% ";
                    html($concepto,$primaProf);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA PROFESIONALIZACION 20%'){
                    $primaProf += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA PROFESIONALIZACION 60%'){
                    $primaProf += $value->sum;
                    $valor = $primaProf;
                    $concepto = "PRIMA PROFESIONALIZACION 60% ";
                    html($concepto,$primaProf);
                    $total += $value->sum;
                    continue;
                }
                // ------------------------  Prima profesionalización

                // ------------------------  Prima por antiguedad
                if($value->descripcion == 'DIFERENCIA PRIMA POR ANTIGUEDAD'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 1 AÑO (1%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 1 AÑO (2%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 1 AÑO (2%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 2 AÑOS (2%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 2 AÑOS (4%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 2 AÑOS (4%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 3 AÑOS (3%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 3 AÑOS (6%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 3 AÑOS (6%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 4 AÑOS (4%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 4 AÑOS (8%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 4 AÑOS (8%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 5 AÑOS (10%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 5 AÑOS (5%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 5 AÑOS (10%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 6 AÑOS (12%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 6 AÑOS (6,2%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 6 AÑOS (12%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 7 AÑOS (15%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 7 AÑOS (7,4%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 7 AÑOS (15%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 8 AÑOS (17%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 8 AÑOS (8,6%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 8 AÑOS (17%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 9 AÑOS (20%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 9 AÑOS (9,8%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 9 AÑOS (20%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 10 AÑOS (11%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 10 AÑOS (22%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 10 AÑOS (22%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 11 AÑOS (12,4%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 11 AÑOS (25%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 11 AÑOS (25%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 12 AÑOS (13,8%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 12 AÑOS (28%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 12 AÑOS (28%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 13 AÑOS (15,2%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 13 AÑOS (30%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 13 AÑOS (30%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 14 AÑOS (16,6%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 14 AÑOS (33%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 14 AÑOS (33%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 15 AÑOS (18%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 15 AÑOS (36%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 15 AÑOS (36%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 16 AÑOS (19,6%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 16 AÑOS (39%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 16 AÑOS (39%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 17 AÑOS (21,2%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 17 AÑOS (42%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 17 AÑOS (42%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 18 AÑOS (22,8%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 18 AÑOS (46%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 18 AÑOS (46%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 19 AÑOS (24,4%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 19 AÑOS (49%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 19 AÑOS (49%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 20 AÑOS (26%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 20 AÑOS (52%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 20 AÑOS (52%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 21 AÑOS (27,8%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 21 AÑOS (56%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 21 AÑOS (56%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 22 AÑOS (29,6%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 22 AÑOS (59%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA DE ANTIGÜEDAD 22 AÑOS (59%) ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }

                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 23 AÑOS EN ADELANTE (60%)'){
                    $primaAntig += $value->sum;
                    $total += $value->sum;
                    continue;
                }
                
                if($value->descripcion == 'PRIMA DE ANTIGÜEDAD 23 AÑOS O + (30%)'){
                    $primaAntig += $value->sum;
                    $concepto = "PRIMA ANTIGÜEDAD 23 AÑOS O + ";
                    html($concepto,$primaAntig);
                    $total += $value->sum;
                    continue;
                }
                // ------------------------  Prima por antiguedad

                html($value->descripcion,$value->sum);

                $total += $value->sum;
                
            }
            
        ?>
        
        <tr>

            <td style="text-align: center; width: 300px;"></td>
            <td style="text-align: center; width: 300px;">_________________</td>

        </tr>

        <tr>

            <th style="text-align: center; width: 300px;">TOTAL ASIGNACIÓN</th>
            <th style="text-align: center; width: 300px;"> <?= number_format($total,2); ?> </th>

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