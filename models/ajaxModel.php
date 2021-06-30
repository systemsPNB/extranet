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
        session_start(['name' => 'AppExtranet']);
        $sql = "INSERT INTO users (civ, nombre, id_status, reg_date, reg_user, id_rol, pass) VALUES (:username, :nombres, :estatus, :fecha, :user, :rol, :pass)";
        $result = mainModel::conectar()->prepare($sql);
        $result->bindValue(":username", $datos['user'], PDO::PARAM_STR);
        $result->bindValue(":nombres", $datos['names'], PDO::PARAM_STR);
        $result->bindValue(":estatus", 1, PDO::PARAM_INT);
        $result->bindValue(":fecha", date("Y-m-d"), PDO::PARAM_STR);
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);
        $result->bindValue(":rol", $datos['rol'], PDO::PARAM_INT);
        $result->bindValue(":pass", $datos['pass'], PDO::PARAM_STR);
        if($result->execute()){
            return true;
        } else {
            return $result->errorInfo();
        }
    }

    // Actualizar contraseña
    protected function actualizar_user_pass_model($old_pass,$new_pass){

        $sql = "UPDATE users SET pass = :new_pass WHERE id_user = :user AND pass = :current_pass";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":new_pass", $new_pass, PDO::PARAM_STR);
        $result->bindValue(":current_pass", $old_pass, PDO::PARAM_STR);
        $result->bindValue(":user", $_SESSION['id_user'], PDO::PARAM_INT);

        if($result->execute()){
            return true;
        }else{
            return $result->errorInfo();
        }
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
        WHERE id_trabajador = :idwork AND anio = :anio AND c.cod_concepto IN 
        ('0001','0028','0161','0401','0410','0411','1500','0412','0413','0420','0421','0422','0423','0424','0501','0523','0524','0525','0526','0527','0528','0529','0530','0531','0532','0533','0534','0535','0536','0537','0538','0539','0540','0541','0542','0543','0544','0545','0546','0547','0548','0549','0550','0551','0552','0553','0554','0555','4013','0556','0557','0558','0559','0560','0561','0562','0563','0564','0565','0566','0567','1600','3001','3002','3120','4000','4300','3400','3500','3600') GROUP BY mes ORDER BY mes";

        /*$sql = "SELECT mes, sum(monto_asigna) FROM historicoquincena hq
        INNER JOIN conceptotipopersonal ctp ON (hq.id_concepto_tipo_personal = ctp.id_concepto_tipo_personal)
        INNER JOIN concepto c ON (ctp.id_concepto = c.id_concepto)
        WHERE id_trabajador = :idwork AND anio = :anio AND c.cod_concepto IN 
        ('0001','0028','0141','0401','0410','0411','0412','0413','0420','0421','0422','0423','0424','0501','0523','0524','0525','0526','0527','0528','0529','0530','0531','0532','0533','0534','0535','0536','0537','0538','0539','0540','0541','0542','0543','0544','0545','0546','0547','0548','0549','0550','0551','0552','0553','0554','0555','4013','0556','0557','0558','0559','0560','0561','0562','0563','0564','0565','0566','0567','1600','3001','3002','3120','4000','4300','3400','3500','3600') GROUP BY mes ORDER BY mes";*/

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

        $sql = "SELECT p.cedula, COALESCE(primer_nombre,'')||' '||COALESCE(segundo_nombre,'')||' '||COALESCE(primer_apellido,'')||' '||COALESCE(segundo_apellido,'') AS nombres, fecha_ingreso, descripcion_cargo, sexo, id_trabajador, t.id_tipo_personal FROM personal p
        INNER JOIN trabajador t ON (p.id_personal = t.id_personal)
        INNER JOIN cargo c ON (t.id_cargo = c.id_cargo)
        INNER JOIN tipopersonal tp ON (t.id_tipo_personal = tp.id_tipo_personal)
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

    // Obtener total de conceptos pagados al trabajador en la constancia de trabajo
    protected function get_data_pay_workers_model($datos){

        $id_trabajador = $datos[0];
        $dia = date('d');
        $mes = $datos[1];
        $anio = date('Y');

        if($mes == 1 && $dia <=24){
            /* Si el mes actual es enero, y el día actual es menor o igual a 24 
            en la constancia se mostraran los datos de diciembre del año anterior */
            $mes = 12;
            $anio = $anio-1;
        }elseif($dia <=24){
            /* Si el día actual es menor o igual a 24, se tomarán los datos de pago del mes anterior */
            $anio = date('Y');
            $mes = $mes-1;
        }

        $sql = "SELECT DISTINCT c.cod_concepto, descripcion, SUM(monto_asigna) FROM historicoquincena hq
        INNER JOIN conceptotipopersonal ctp ON (hq.id_concepto_tipo_personal = ctp.id_concepto_tipo_personal)
        INNER JOIN concepto c ON (ctp.id_concepto = c.id_concepto)
        INNER JOIN trabajador t ON (t.id_trabajador = hq.id_trabajador)
        WHERE estatus = 'A' AND hq.id_trabajador = :id_trabajador AND anio = :anio AND mes = :mes AND monto_asigna > 0 AND c.cod_concepto IN ('0001', '0010', '0011', '0147', '0149', '0420', '0421', '0422', '0423', '0424', '0545', '0546', '0547', '0548', '0549', '0550', '0551', '0552', '0553', '0554', '0555', '0556', '0557', '0558', '0559', '0560', '0561', '0562', '0563', '0564', '0565', '0566', '0567', '4000', '0061', '0028', '0401', '0501', '4013', '0063') GROUP BY c.cod_concepto, descripcion ORDER BY cod_concepto";
        $result = parent::conexion2()->prepare($sql);
        $result->bindValue(":id_trabajador", $id_trabajador, PDO::PARAM_INT);
        $result->bindValue(":anio", $anio, PDO::PARAM_INT);
        $result->bindValue(":mes", $mes, PDO::PARAM_INT);
        //$result->bindValue(":mes", 5, PDO::PARAM_INT);

        if($result->execute()){
            return $result->fetchAll();
        }else{
            return $result->errorInfo();
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
    
        // Obtener trabajadores desde el sigefirrhh e insertarlos en la tabla usuarios de extranet
    protected function get_workers_for_users_model(){
        // Descomentar cuando se tenga listo el sql
        //$sql = "SELECT DISTINCT p.cedula, COALESCE(primer_nombre,'')||' '||COALESCE(segundo_nombre,'')||' '||COALESCE(primer_apellido,'')||' '||COALESCE(segundo_apellido,'') AS nombres, id_trabajador FROM personal p INNER JOIN trabajador t ON (p.id_personal = t.id_personal) WHERE t.estatus = 'A' and p.cedula in (21364204, 30031190, 29799650, 28726928, 26798005, 10581443, 27508612, 27829262, 26819328, 29508285, 26715679, 29561242, 29701122, 26435436, 27103537)";
        
        $resultSelect = parent::conexion2()->prepare($sql);
        $resultSelect->execute();
        $datos = $resultSelect->fetchAll();
        //return $datos;
        echo "Listo array sigefirrhh";
        foreach ($datos as $value) {
            $civ = $value[0];
            $nombres = $value[1];
            $pass = parent::encriptar($civ);
            $fecha = date("Y-m-d");
            $id_trabajador = $value[2];
            
            $insert = "INSERT INTO users (civ, nombre, id_status, reg_date, reg_user, id_rol, pass, id_trabajador) VALUES ('".$civ."','".$nombres."',1,'$fecha',1,3,'$pass',$id_trabajador)";
            $resultInsert = parent::conectar()->prepare($insert);
            $resultInsert->execute();
            if(!$resultInsert->execute()){
                var_dump( $resultInsert->errorInfo() );
            }
        }
        return "<br>Listo inserción en extranet";
    }

}
