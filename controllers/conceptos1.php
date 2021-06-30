<?php

foreach ($pay as $value){
    if($value['cod_concepto'] == '0001'){ //'SUELDO BASICO'
        $sueldo_basico_nombre = $value['descripcion'];
        $sueldo_basico_total = $value['sum'];
    }

    if($value['cod_concepto'] == '0010'){ // JUBILACIÓN
        $jubilacion_nombre = $value['descripcion'];
        $jubilacion_total = $value['sum'];
    }

    if($value['cod_concepto'] == '0011'){ // PENSIÓN
        $pension_nombre = $value['descripcion'];
        $pension_total = $value['sum'];
    }

    if($value['cod_concepto'] == '0061'){ // COMPLEMENTO
        $complemento_nombre = $value['descripcion'];
        $complemento_total = $value['sum'];
    }

    if($value['cod_concepto'] == '4000'){ // Prima por hijo
        $prima_hijo_nombre = $value['descripcion'];
        $prima_hijo_total = $value['sum'];
    }

    if($value['cod_concepto'] == '0401'){ // Diferencia de prima por profesionalización
        $prima_prof_total = $value['sum'];
    }

    if($value['cod_concepto'] == '0501'){ // Diferencia de prima de antiguedad
        $prima_antig_total = $value['sum'];
    }

    switch($value['cod_concepto']){

        case '0028': //DIFERENCIA SUELDO BASICO
            $sueldo_basico_total += $value['sum'];
            html($sueldo_basico_nombre,$sueldo_basico_total);
            break;

        case '0063': // DIFERENCIA COMPLEMENTO
            $complemento_total += $value['sum'];
            html($complemento_nombre,$complemento_total);
            break;

        case '0147': // DIFERENCIA POR JUBILACIÓN
            $jubilacion_total += $value['sum'];
            html($jubilacion_nombre,$jubilacion_total);
            break;

        case '0149': // DIFERENCIA POR PENSIÓN
            $pension_total += $value['sum'];
            html($pension_nombre,$pension_total);
            break;

        case '4013': // Diferencia de prima por hijo
            $prima_hijo_total += $value['sum'];
            html($prima_hijo_nombre,$prima_hijo_total);
            break;

        case '0420': // 'PRIMA PROFESIONALIZACION 20%'
            $prima_prof_total += $value['sum'];
            html($value['descripcion'],$prima_prof_total);
            break;

        case '0421': // 'PRIMA PROFESIONALIZACION 30%'
            $prima_prof_total += $value['sum'];
            html($value['descripcion'],$prima_prof_total);
            break;

        case '0422': // 'PRIMA PROFESIONALIZACION 40%'
            $prima_prof_total += $value['sum'];
            html($value['descripcion'],$prima_prof_total);
            break;

        case '0423': // 'PRIMA PROFESIONALIZACION 50%'
            $prima_prof_total += $value['sum'];
            html($value['descripcion'],$prima_prof_total);
            break;

        case '0424': // 'PRIMA PROFESIONALIZACION 60%'
            $prima_prof_total += $value['sum'];
            html($value['descripcion'],$prima_prof_total);
            break;

        case '0545': // PRIMA DE ANTIGÜEDAD 1 AÑO (2%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0546': // PRIMA DE ANTIGÜEDAD 2 AÑOS (4%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0547': // PRIMA DE ANTIGÜEDAD 3 AÑOS (6%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;
            
        case '0548': // PRIMA DE ANTIGÜEDAD 4 AÑOS (8%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0549': // PRIMA DE ANTIGÜEDAD 5 AÑOS (10%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0550': // PRIMA DE ANTIGÜEDAD 6 AÑOS (12%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0551': // PRIMA DE ANTIGÜEDAD 7 AÑOS (15%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0552': // PRIMA DE ANTIGÜEDAD 8 AÑOS (17%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0553': // PRIMA DE ANTIGÜEDAD 9 AÑOS (20%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0554': // PRIMA DE ANTIGÜEDAD 10 AÑOS (22%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0555': // PRIMA DE ANTIGÜEDAD 11 AÑOS (25%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0556': // PRIMA DE ANTIGÜEDAD 12 AÑOS (28%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0557': // PRIMA DE ANTIGÜEDAD 13 AÑOS (30%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0558': // PRIMA DE ANTIGÜEDAD 14 AÑOS (33%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0559': // PRIMA DE ANTIGÜEDAD 15 AÑOS (36%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0560': // PRIMA DE ANTIGÜEDAD 16 AÑOS (39%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0561': // PRIMA DE ANTIGÜEDAD 17 AÑOS (42%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0562': // PRIMA DE ANTIGÜEDAD 18 AÑOS (46%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0563': // PRIMA DE ANTIGÜEDAD 19 AÑOS (49%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0564': // PRIMA DE ANTIGÜEDAD 20 AÑOS (52%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0565': // PRIMA DE ANTIGÜEDAD 21 AÑOS (56%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0566': // PRIMA DE ANTIGÜEDAD 22 AÑOS (59%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

        case '0567': // PRIMA DE ANTIGÜEDAD 23 AÑOS EN ADELANTE (60%)
            $prima_antig_total += $value['sum'];
            html($value['descripcion'],$prima_antig_total);
            break;

    }
    
}