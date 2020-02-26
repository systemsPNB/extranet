<?php
$total = 0;

foreach ($pay as $value){

    html($value->descripcion,$value->sum);
    $total += $value->sum;

}