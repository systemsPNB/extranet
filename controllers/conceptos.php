<?php
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
