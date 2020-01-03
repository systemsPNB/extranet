<?php

require_once '../core/mainModel.php';

class searchModel extends mainModel{

    protected function search_model($civ){

        $conexion = parent::conexion2();

        $sql = "SELECT id_trabajador, descripcion_cargo AS jquia, p.cedula, primer_nombre||' '||segundo_nombre||' '||primer_apellido||' '||segundo_apellido AS nombres FROM personal p
        INNER JOIN trabajador t ON (p.id_personal = t.id_personal)
        INNER JOIN cargo c ON (t.id_cargo = c.id_cargo)
        WHERE p.cedula = :civ AND estatus = 'A'";

        $result = $conexion->prepare($sql);

        $result->bindValue(":civ", $civ, PDO::PARAM_STR);

        $result->execute();

        if ($result->rowCount()>0){

            $datos = $result->fetch();
            unset($result);
            unset($conexion);
            return $datos;

        }else{

            return $result->errorInfo();

        }
        
    }

}