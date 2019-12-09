<?php

require_once '../models/searchModel.php';

class searchController extends searchModel{

    public function search_controlador($civ){

        $datos = parent::search_model($civ);

        return json_encode($datos);

    }

}


if(isset($_GET['civ'])){

    $buscar = new searchController();
    echo $buscar->search_controlador($_GET['civ']);

}
