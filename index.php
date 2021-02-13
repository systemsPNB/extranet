<?php
    //error_reporting(E_ALL);
    //ini_set('display_errors',1);
    
    require_once './core/configGeneral.php';
    require_once './controllers/vistasControlador.php';

    $plantilla = new vistasControlador();
    $plantilla->obtener_plantilla_controlador();