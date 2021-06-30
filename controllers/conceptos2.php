<?php

foreach ($pay as $value){
    if($value['cod_concepto'] == '0001'){ //'SUELDO BASICO'
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0010'){ // JUBILACIÓN
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0011'){ // PENSIÓN
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0061'){ // COMPLEMENTO
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '4000'){ // Prima por hijo
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0420'){ // PRIMA PROFESIONALIZACION 20%
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0421'){ // PRIMA PROFESIONALIZACION 30%
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0422'){ // PRIMA PROFESIONALIZACION 40%
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0423'){ // PRIMA PROFESIONALIZACION 50%
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0424'){ // PRIMA PROFESIONALIZACION 60%
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0545'){ // PPRIMA DE ANTIGÜEDAD 1 AÑO (2%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0546'){ // PRIMA DE ANTIGÜEDAD 2 AÑOS (4%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0547'){ // PRIMA DE ANTIGÜEDAD 3 AÑOS (6%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0548'){ // PRIMA DE ANTIGÜEDAD 4 AÑOS (8%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0549'){ // PRIMA DE ANTIGÜEDAD 5 AÑOS (10%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0550'){ // PRIMA DE ANTIGÜEDAD 6 AÑOS (12%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0551'){ // PRIMA DE ANTIGÜEDAD 7 AÑOS (15%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0552'){ // PRIMA DE ANTIGÜEDAD 8 AÑOS (17%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0553'){ // PRIMA DE ANTIGÜEDAD 9 AÑOS (20%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0554'){ // PRIMA DE ANTIGÜEDAD 10 AÑOS (22%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0555'){ // PRIMA DE ANTIGÜEDAD 11 AÑOS (25%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0556'){ // PRIMA DE ANTIGÜEDAD 12 AÑOS (28%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0557'){ // PRIMA DE ANTIGÜEDAD 13 AÑOS (30%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0558'){ // PRIMA DE ANTIGÜEDAD 14 AÑOS (33%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0559'){ // PRIMA DE ANTIGÜEDAD 15 AÑOS (36%)
        html($value['descripcion'],$value['sum']);
    }
    
    if($value['cod_concepto'] == '0560'){ // PRIMA DE ANTIGÜEDAD 16 AÑOS (39%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0561'){ // PRIMA DE ANTIGÜEDAD 17 AÑOS (42%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0562'){ // PRIMA DE ANTIGÜEDAD 18 AÑOS (46%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0563'){ // PRIMA DE ANTIGÜEDAD 19 AÑOS (49%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0564'){ // PRIMA DE ANTIGÜEDAD 20 AÑOS (52%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0565'){ // PRIMA DE ANTIGÜEDAD 21 AÑOS (56%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0566'){ // PRIMA DE ANTIGÜEDAD 22 AÑOS (59%)
        html($value['descripcion'],$value['sum']);
    }

    if($value['cod_concepto'] == '0567'){ // PRIMA DE ANTIGÜEDAD 23 AÑOS EN ADELANTE (60%)
        html($value['descripcion'],$value['sum']);
    }
}