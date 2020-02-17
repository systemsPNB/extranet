<?php

require_once '../models/searchModel.php';

class searchController extends searchModel{

    public static function search_controlador($civ){

        $civ = parent::limpiar_cadena($civ);

        $datos = parent::search_model($civ);

        if ($datos == false) {
            return false;
        }else{
            $datos['id_trabajador'] = parent::encriptar($datos[0]);
            return json_encode($datos);
        }

    }

}


if(isset($_POST['civ'])){

    echo searchController::search_controlador($_POST['civ']);

}
