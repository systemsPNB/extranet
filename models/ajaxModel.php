<?php
if(is_file('../core/mainModel.php')){
    require_once '../core/mainModel.php';
}else{
    require_once './core/mainModel.php';
}

class ajaxModel extends mainModel{

    // Zoom users
    protected function zoom_user_model($id_usuario){

        $sql = "SELECT id_user, civ, nombre, rol, reg_date FROM users u
        INNER JOIN roles r ON (u.id_rol = r.id_rol)
        WHERE id_user = :user";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":user", $id_usuario, PDO::PARAM_INT);

        $result->execute();

        if ($result->rowCount() > 0){

            $datos = $result->fetch();

            unset($result);
            unset($conexion);
        
            return $datos;

        }

    }

    // Delete users
    protected function eliminar_user_model($id_user){

        $sql = "UPDATE users SET id_status = 2 WHERE id_user = :id_user";
        
        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":id_user", $id_user, PDO::PARAM_INT);

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;
        
    }

    // Registrar users
    protected function registrar_usuarios_modelo($datos){

        session_start(['name' => 'NSW']);

        $sql = "INSERT INTO users (civ, nombre, id_status, reg_date, reg_user, id_rol, pass) VALUES (:username, :nombres, :estatus, :fecha, :user, :rol, :pass)";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":username", $datos['user'], PDO::PARAM_STR);
        $result->bindValue(":nombres", $datos['names'], PDO::PARAM_STR);
        $result->bindValue(":estatus", 1, PDO::PARAM_INT);
        $result->bindValue(":fecha", date("Y-m-d"), PDO::PARAM_STR);
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);
        $result->bindValue(":rol", $datos['rol'], PDO::PARAM_INT);
        $result->bindValue(":pass", $datos['pass'], PDO::PARAM_STR);

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;

    }

    // Actualizar contraseña
    protected function actualizar_user_pass_model($old_pass,$new_pass){

        $sql = "UPDATE users SET pass = :new_pass WHERE id_user = :user AND pass = :current_pass";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":new_pass", $new_pass, PDO::PARAM_STR);
        $result->bindValue(":current_pass", $old_pass, PDO::PARAM_STR);
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;

    }

    // Editar usuario en vista users
    protected function update_user_model($datos){

        $sql = "UPDATE users SET nombre = :nombre, id_status = :estatus WHERE civ = :user AND id_status = :estatus";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":user", $datos['user'], PDO::PARAM_STR);
        $result->bindValue(":nombre", $datos['name'], PDO::PARAM_STR);
        $result->bindValue(":estatus", $datos['estatus'], PDO::PARAM_INT);

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;
        
    }

    // Editar nombre en vista myaccount
    protected function updateuseraccountmodel($nombre){

        $sql = "UPDATE users SET nombre = :nombre WHERE id_user = :user";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":nombre", $nombre, PDO::PARAM_STR);
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);

        $result->execute();

        $result_boolean = ($result->rowCount() > 0);

        unset($result);
        unset($conexion);

        return $result_boolean;

    }

    // Editar nombre en vista myaccount
    protected function count_users1_model(){

        $sql = "SELECT COUNT(id_user) FROM users WHERE id_rol = :rol AND id_status = :estatus";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":estatus", 1, PDO::PARAM_INT);
        $result->bindValue(":rol", 1, PDO::PARAM_INT);

        $result->execute();

        if ($result->rowCount() > 0){

            $datos = $result->fetch();

            unset($result);
            unset($conexion);
        
            return $datos;

        }

    }

    // Editar nombre en vista myaccount
    protected function count_users2_model(){

        $sql = "SELECT COUNT(id_user) FROM users WHERE id_rol = :rol AND id_status = :estatus";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":estatus", 1, PDO::PARAM_INT);
        $result->bindValue(":rol", 2, PDO::PARAM_INT);

        $result->execute();

        if ($result->rowCount() > 0){

            $datos = $result->fetch();

            unset($result);
            unset($conexion);
        
            return $datos;

        }

    }

    // Grafica del home
    protected function grafica_model(){
    
        // Linea 1
        $sql1 = "SELECT date_part('month',reg_date) AS fecha, COUNT(reg_date) AS total FROM users WHERE id_rol = 1 GROUP BY fecha ORDER BY fecha";

        $result1 = mainModel::conectar()->prepare($sql1);

        $result1->execute();
        
        $valX1 = array(); // Fecha
        $valY1 = array(); // ID

        foreach ($result1 as $row) {
            switch ($row[0]) {
                case '1':
                    $mes = "Enero";
                    break;
                case '2':
                    $mes = "Febrero";
                    break;
                case '3':
                    $mes = "Marzo";
                    break;
                case '4':
                    $mes = "Abril";
                    break;
                case '5':
                    $mes = "Mayo";
                    break;
                case '6':
                    $mes = "Junio";
                    break;
                case '7':
                    $mes = "Julio";
                    break;
                case '8':
                    $mes = "Agosto";
                    break;
                case '9':
                    $mes = "Septiembre";
                    break;
                case '10':
                    $mes = "Octubre";
                    break;
                case '11':
                    $mes = "Noviembre";
                    break;
                case '12':
                    $mes = "Diciembre";
                    break;
                
            }
            $valX1[] = $mes; //Fecha
            $valY1[] = $row[1]; // Total
        }
    
        $datosX1 = json_encode($valX1);
        $datosY1 = json_encode($valY1);
    
        // Linea 2
        $sql2 = "SELECT date_part('month',reg_date) AS fecha, COUNT(reg_date) FROM users WHERE id_rol = 2 GROUP BY fecha ORDER BY fecha";
    
        $result2 = mainModel::conectar()->prepare($sql2);

        $result2->execute();
    
        $valX2 = array(); // Fecha
        $valY2 = array(); // ID
    
        foreach ($result2 as $row) {
            switch ($row[0]) {
                case '1':
                    $mes = "Enero";
                    break;
                case '2':
                    $mes = "Febrero";
                    break;
                case '3':
                    $mes = "Marzo";
                    break;
                case '4':
                    $mes = "Abril";
                    break;
                case '5':
                    $mes = "Mayo";
                    break;
                case '6':
                    $mes = "Junio";
                    break;
                case '7':
                    $mes = "Julio";
                    break;
                case '8':
                    $mes = "Agosto";
                    break;
                case '9':
                    $mes = "Septiembre";
                    break;
                case '10':
                    $mes = "Octubre";
                    break;
                case '11':
                    $mes = "Noviembre";
                    break;
                case '12':
                    $mes = "Diciembre";
                    break;
                
            }
            $valX2[] = $mes; //Fecha
            $valY2[] = $row[1]; // Total
        }
    
        $datosX2 = json_encode($valX2);
        $datosY2 = json_encode($valY2);

        unset($result1);
        unset($result2);
        unset($conexion);
    
        return array($datosX1, $datosY1, $datosX2, $datosY2);
    
    }

    // Reporte PDF
    protected function reportepdf_model(){

        $sql = "SELECT civ, nombre, id_status, id_rol, reg_date FROM users";

        $result = mainModel::conectar()->prepare($sql);

        $result->execute();

        if ($result->rowCount() > 0){

            $datos = $result->fetchAll();

            unset($result);
            unset($conexion);
        
            return $datos;

        }

    }

    // Reporte PDF del arc
    protected function reporte_arc_model($idwork){

        $anio = date("Y")-1;

        $sql = "SELECT mes, sum(monto_asigna) FROM historicoquincena hq
        INNER JOIN conceptotipopersonal ctp ON (hq.id_concepto_tipo_personal = ctp.id_concepto_tipo_personal)
        INNER JOIN concepto c ON (ctp.id_concepto = c.id_concepto)
        WHERE id_trabajador = :idwork AND anio = :anio AND c.cod_concepto IN ('0001','0410','0411','0412','0413','0414','0522','0523','0524','0525','0526','0527','0528','0529','0530','0531','0532','0533','0534','0535','0536','0537','0538','0539','0540','0541','0542','0543','0544','1500','1600','4000') GROUP BY mes ORDER BY mes";

        $result = parent::conexion2()->prepare($sql);
        $result->bindValue(":idwork", $idwork, PDO::PARAM_INT);
        $result->bindValue(":anio", $anio, PDO::PARAM_INT);

        $result->execute();

        if ($result->rowCount() > 0){

            $datos = $result->fetchAll();

            unset($result);
            unset($conexion);
        
            return $datos;

        }

    }

    // Obtener datos del trabajador para mostrar en el arc
    protected function get_data_workers_model($idwork){

        $sql = "SELECT p.cedula, primer_nombre||' '||segundo_nombre||' '||primer_apellido||' '||segundo_apellido AS nombres, fecha_ingreso, descripcion_cargo, sexo, id_trabajador FROM personal p
        INNER JOIN trabajador t ON (p.id_personal = t.id_personal)
        INNER JOIN cargo c ON (t.id_cargo = c.id_cargo)
        WHERE id_trabajador = :idwork";

        $result = parent::conexion2()->prepare($sql);

        $result->bindValue(":idwork", $idwork, PDO::PARAM_INT);

        $result->execute();

        if ($result->rowCount()>0){

            return $result->fetch();

        }else{

            return $result->errorInfo();

        }
        
    }

    protected function get_data_pay_workers_model($datos){

        $id_trabajador = $datos[0];
        $mes = $datos[1];

        // Determinar cual quincena imprimir deacuerdo al día actual
        if(date('d') <= 10){
            $quincena = 1;
        }else{
            $quincena = 2;
        }

        $anio = date('Y');

        /* Si el mes es enero y el dia es menor o igual a 10 (primera quincena), entonces al año actual se le resta 1, el mes será el último del año pasado y la quincena será la última también */
        if($mes == 01 && date('d') <= 10) {
            $anio = $anio-1;
            $mes = 12;
            $quincena = 2;
        }
        
        $sql = "SELECT descripcion, monto_asigna FROM historicoquincena hq
        INNER JOIN conceptotipopersonal ctp ON (hq.id_concepto_tipo_personal = ctp.id_concepto_tipo_personal)
        INNER JOIN concepto c ON (ctp.id_concepto = c.id_concepto)
        WHERE id_trabajador = :id_trabajador AND anio = :anio AND mes = :mes AND semana_quincena = :quincena AND monto_asigna > 0 ORDER BY descripcion";

        $result = parent::conexion2()->prepare($sql);
        $result->bindValue(":id_trabajador", $id_trabajador, PDO::PARAM_INT);
        $result->bindValue(":anio", $anio, PDO::PARAM_INT);
        $result->bindValue(":mes", $mes, PDO::PARAM_INT);
        $result->bindValue(":quincena", $quincena, PDO::PARAM_INT);
        $result->execute();

        if ($result->rowCount()>0){

            return $result->fetchAll();

        }else{

            return $result->errorInfo();

        }

    }

}