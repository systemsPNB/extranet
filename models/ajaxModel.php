<?php
// ini_set('max_execution_time', '300');
// set_time_limit(300);
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
        WHERE id_trabajador = :idwork AND anio = :anio AND c.cod_concepto IN ('0001','0410','0411','0412','0413','0414','0522','0523','0524','0525','0526','0527','0528','0529','0530','0531','0532','0533','0534','0535','0536','0537','0538','0539','0540','0541','0542','0543','0544','1500','1600','4000','0500') GROUP BY mes ORDER BY mes";

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

    // Calculo del acumulado deducciones para ARC
    protected function report_deducciones_arc_model($idwork){

        $anio = date("Y")-1;

        $sql = "SELECT descripcion, sum(monto_deduce) FROM historicoquincena hq
        INNER JOIN conceptotipopersonal ctp ON (hq.id_concepto_tipo_personal = ctp.id_concepto_tipo_personal)
        INNER JOIN concepto c ON (ctp.id_concepto = c.id_concepto)
        WHERE id_trabajador = :idwork AND anio = :anio AND c.cod_concepto IN ('5001','5002','5003','5004') GROUP BY descripcion";

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

    // Obtener datos del trabajador para mostrar en el arc y constancia
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

    // Determinar última quincena
    protected function get_last_quincena(){
        $sql = "SELECT MAX(semana_quincena) FROM historicoquincena WHERE anio = :anio AND mes = :mes LIMIT 1";
        $result = parent::conexion2()->prepare($sql);
        $result->bindValue(":anio",date('Y'),PDO::PARAM_INT);
        $result->bindValue(":mes",date('m'),PDO::PARAM_INT);
        $result->execute();
        if($result->rowCount()>0){
            $quincena = $result->fetchColumn(0);
            unset($conexion);
            unset($result);
            return $quincena;
        }else{
            $result->errorInfo();
        }
        
    }

    // Obtener total de conceptos pagados al trabajador en la constancia de trabajo
    protected function get_data_pay_workers_model($datos){

        $id_trabajador = $datos[0];
        $quincena = self::get_last_quincena();
        $dia = date('d');
        $mes = $datos[1];
        $anio = date('Y');

        if($mes == 1 && $quincena ==1){
            /* Si el mes actual es enero, y la última quincena del mes actual es 1 
            en la constancia se mostraran los datos de diciembre del año anterior */
            $mes = 12;
            $anio = $anio-1;
            
        }elseif($dia <=24){
            /* Si la última quincena es 1, se tomarán los datos de pago del mes anterior */
            $anio = date('Y');
            $mes = $mes-1;
            
        }

        $sql = "SELECT DISTINCT c.cod_concepto, descripcion, SUM(monto_asigna) FROM historicoquincena hq
        INNER JOIN conceptotipopersonal ctp ON (hq.id_concepto_tipo_personal = ctp.id_concepto_tipo_personal)
        INNER JOIN concepto c ON (ctp.id_concepto = c.id_concepto)
        WHERE id_trabajador = :id_trabajador AND anio = :anio AND mes = :mes AND monto_asigna > 0 AND c.cod_concepto IN ('4013','4000','0567','0566','0565','0564','0563','0562','0561','0560','0559','0558','0557','0556','0555','0554','0553','0552','0551','0550','0549','0548','0547','0546','0545','0544','0543','0542','0541','0540','0539','0538','0537','0536','0535','0534','0533','0532','0531','0530','0529','0528','0527','0526','0525','0524','0523','0522','0512','0501','0429','0428','0427','0426','0425','0424','0423','0422','0421','0420','0414','0413','0412','0411','0410','0401','0063','0061','0028','0014','0011','0010','0001') GROUP BY c.cod_concepto, descripcion ORDER BY cod_concepto";

        /*
        0001    SUELDO BASICO
        0061    COMPLEMENTO
        4000    PRIMA POR HIJO
        0501	DIFERENCIA PRIMA DE ANTIGÜEDAD
        5030	PRIMA DE ANTIGÜEDAD 9 AÑOS (9,8%)
        0553	PRIMA DE ANTIGÜEDAD 9 AÑOS (20%)
        0529	PRIMA DE ANTIGÜEDAD 8 AÑOS (8,6%)
        0552	PRIMA DE ANTIGÜEDAD 8 AÑOS (17%)
        0528	PRIMA DE ANTIGÜEDAD 7 AÑOS (7,4%)
        0551	PRIMA DE ANTIGÜEDAD 7 AÑOS (15%)
        0527	PRIMA DE ANTIGÜEDAD 6 AÑOS (6,2%)
        0550	PRIMA DE ANTIGÜEDAD 6 AÑOS (12%)
        0526	PRIMA DE ANTIGÜEDAD 5 AÑOS (5%)
        0549	PRIMA DE ANTIGÜEDAD 5 AÑOS (10%)
        0548	PRIMA DE ANTIGÜEDAD 4 AÑOS (8%)
        0525	PRIMA DE ANTIGÜEDAD 4 AÑOS (4%)
        0547	PRIMA DE ANTIGÜEDAD 3 AÑOS (6%)
        0524	PRIMA DE ANTIGÜEDAD 3 AÑOS (3%)
        0546	PRIMA DE ANTIGÜEDAD 2 AÑOS (4%)
        0523	PRIMA DE ANTIGÜEDAD 2 AÑOS (2%)
        0544	PRIMA DE ANTIGÜEDAD 23 AÑOS O + (30%)
        0567	PRIMA DE ANTIGÜEDAD 23 AÑOS EN ADELANTE (60%)
        0566	PRIMA DE ANTIGÜEDAD 22 AÑOS (59%)
        0543	PRIMA DE ANTIGÜEDAD 22 AÑOS (29,6%)
        0565	PRIMA DE ANTIGÜEDAD 21 AÑOS (56%)
        0542	PRIMA DE ANTIGÜEDAD 21 AÑOS (27,8%)
        0564	PRIMA DE ANTIGÜEDAD 20 AÑOS (52%)
        0541	PRIMA DE ANTIGÜEDAD 20 AÑOS (26%)
        0545	PRIMA DE ANTIGÜEDAD 1 AÑO (2%)
        0522	PRIMA DE ANTIGÜEDAD 1 AÑO (1%)
        0563	PRIMA DE ANTIGÜEDAD 19 AÑOS (49%)
        0540	PRIMA DE ANTIGÜEDAD 19 AÑOS (24,4%)
        0562	PRIMA DE ANTIGÜEDAD 18 AÑOS (46%)
        0539	PRIMA DE ANTIGÜEDAD 18 AÑOS (22,8%)
        0561	PRIMA DE ANTIGÜEDAD 17 AÑOS (42%)
        0538	PRIMA DE ANTIGÜEDAD 17 AÑOS (21,2%)
        0560	PRIMA DE ANTIGÜEDAD 16 AÑOS (39%)
        0537	PRIMA DE ANTIGÜEDAD 16 AÑOS (19,6%)
        0559	PRIMA DE ANTIGÜEDAD 15 AÑOS (36%)
        0536	PRIMA DE ANTIGÜEDAD 15 AÑOS (18%)
        0558	PRIMA DE ANTIGÜEDAD 14 AÑOS (33%)
        0535	PRIMA DE ANTIGÜEDAD 14 AÑOS (16,6%)
        0557	PRIMA DE ANTIGÜEDAD 13 AÑOS (30%)
        0534	PRIMA DE ANTIGÜEDAD 13 AÑOS (15,2%)
        0556	PRIMA DE ANTIGÜEDAD 12 AÑOS (28%)
        0533	PRIMA DE ANTIGÜEDAD 12 AÑOS (13,8%)
        0555	PRIMA DE ANTIGÜEDAD 11 AÑOS (25%)
        0532	PRIMA DE ANTIGÜEDAD 11 AÑOS (12,4%)
        0554	PRIMA DE ANTIGÜEDAD 10 AÑOS (22%)
        0531	PRIMA DE ANTIGÜEDAD 10 AÑOS (11%)
        0424	PRIMA PROFESIONALIZACION 60%
        0423	PRIMA PROFESIONALIZACION 50%
        0422	PRIMA PROFESIONALIZACION 40%
        0421	PRIMA PROFESIONALIZACION 30%
        0414	PRIMA PROFESIONALIZACION 20%
        0420	PRIMA PROFESIONALIZACION 20%
        0413	PRIMA PROFESIONALIZACION 18%
        0412	PRIMA PROFESIONALIZACION 16%
        0411	PRIMA PROFESIONALIZACION 14%
        0410	PRIMA PROFESIONALIZACION 12%
        */

        $result = parent::conexion2()->prepare($sql);
        $result->bindValue(":id_trabajador", $id_trabajador, PDO::PARAM_INT);
        $result->bindValue(":anio", $anio, PDO::PARAM_INT);
        $result->bindValue(":mes", $mes, PDO::PARAM_INT);
        $result->execute();

        if($result->rowCount()>0){
            $datos = $result->fetchAll(PDO::FETCH_OBJ);
            unset($conexion);
            unset($result);
            return $datos;
        }else{
            return false;
        }

    }

    // Registrar constancia
    protected function registrar_constancia_model($datos){

        $sql = "INSERT INTO constancias (id_user,id_trabajador,fecha,monto,codigo) VALUES (:user,:idwork,:fecha,:monto,:codigo)";

        if($_SESSION['idwork']==""){
            $idwork = $datos[2];
        }else {
            $idwork = $_SESSION['idwork'];
        }

        $result = parent::conectar()->prepare($sql);
        $result->bindValue(":user",$_SESSION['id_user'], PDO::PARAM_INT);
        $result->bindValue(":idwork",$idwork, PDO::PARAM_INT);
        $result->bindValue(":fecha",date("Y-m-d h:i:s a"), PDO::PARAM_STR);
        $result->bindValue(":monto",$datos[0], PDO::PARAM_INT);
        $result->bindValue(":codigo",$datos[1], PDO::PARAM_STR);
        $result->execute();

        if($result->rowCount()>0){
            unset($result);
            unset($conexion);
        }else{
            return $result->errorInfo();
        }

    }

    /* // Obtener trabajadores desde el sigefirrhh e insertarlos en la tabla usuarios de extranet
    protected function get_workers_for_users_model(){

        $select = "SELECT DISTINCT p.cedula, primer_nombre||' '||segundo_nombre||' '||primer_apellido||' '||segundo_apellido AS nombres, id_trabajador FROM personal p
        INNER JOIN trabajador t ON (p.id_personal = t.id_personal)
        WHERE t.estatus = 'A'";

        $resultSelect = parent::conexion2()->prepare($select);
        $resultSelect->execute();
        $datos = $resultSelect->fetchAll();
        echo "Listo array sigefirrhh";
        // unset($resultSelect);
        // unset($conexion);

        // return $datos;
        // print_r($datos);

        $nro = 0;
        foreach ($datos as $value) {

            $civ = $value[0];
            $nombres = $value[1];
            $pass = parent::encriptar($civ);
            $fecha = date("Y-m-d");
            $id_trabajador = $value[2];
            
            $insert = "INSERT INTO users
            (civ, nombre, id_status, reg_date, reg_user, id_rol, pass, id_trabajador) VALUES 
            ('".$civ."','".$nombres."',1,'$fecha',1,3,'$pass',$id_trabajador)";
            $resultInsert = parent::conectar()->prepare($insert);
            $resultInsert->execute();
            
            $nro++;

            if($resultInsert->rowCount()>0){

                echo $nro."<br>";

            }else{

                echo $resultInsert->errorInfo();

            }
            
    
        }
        return "<br>Listo inserción en extranet";
        // return $nro;

    } */

}
