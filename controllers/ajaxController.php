<?php
if(is_file('../models/ajaxModel.php')){
    require_once '../models/ajaxModel.php';
}else{
    require_once './models/ajaxModel.php';
}

class ajaxController extends ajaxModel{

    // Zoom users
    public function zoom_user_controlador($id_usuario){

        $id_usuario = mainModel::limpiar_cadena($id_usuario);

        return ajaxModel::zoom_user_model($id_usuario);
        
    }

    // Delete users
    public function eliminar_user_controller($id_user){

        return ajaxModel::eliminar_user_model($id_user);

    }

    // Registrar users
    public function registrar_usuarios_controlador($user,$pass,$name,$rol){

        $user = mainModel::limpiar_cadena($user);
        $pass = mainModel::limpiar_cadena($pass);
        $pass = mainModel::encriptar($pass);
        $name = mainModel::limpiar_cadena($name);
        $rol  = mainModel::limpiar_cadena($rol);

        $datos = array("user" => $user, "pass" => $pass, "names" => $name, "rol" => $rol);

        return ajaxModel::registrar_usuarios_modelo($datos);

    }

    // Actualizar contraseña
    public function actualizar_user_pass_controller($old_pass,$new_pass){

        $old_pass = mainModel::limpiar_cadena($old_pass);
        $old_pass = mainModel::encriptar($old_pass);
        $new_pass = mainModel::limpiar_cadena($new_pass);
        $new_pass = mainModel::encriptar($new_pass);

        return ajaxModel::actualizar_user_pass_model($old_pass,$new_pass);

    }

    // Editar usuario en vista users
    public function update_user_controller($usuario,$nombre,$estatus){

        $user = mainModel::limpiar_cadena($usuario);
        $name = mainModel::limpiar_cadena($nombre);
        $status = mainModel::limpiar_cadena($estatus);

        $datos = array("user" => $user, "name" => $name, "estatus" => $status);

        return ajaxModel::update_user_model($datos);
        
    }

    // Editar nombre en vista myaccount
    public function updateuseraccountcontroller($nombre){

        $nombre = mainModel::limpiar_cadena($nombre);

        return ajaxModel::updateuseraccountmodel($nombre);

    }

    // Contar usuarios
    public function count_users1_controller(){

        return ajaxModel::count_users1_model();

    }

    // Contar usuarios
    public function count_users2_controller(){

        return ajaxModel::count_users2_model();

    }

    // Grafica del home
    public function grafica_controller(){

        return ajaxModel::grafica_model();

    }

    // Reporte PDF
    public function reportepdf_controller(){

        return ajaxModel::reportepdf_model();
        
    }

    // Reporte PDF del ARC
    public function reporte_arc($idwork){

        return parent::reporte_arc_model($idwork);
        
    }

    // Calculo del acumulado deducciones para ARC
    public function deducciones_reporte_arc($idwork){

        return parent::report_deducciones_arc_model($idwork);
        
    }

    // Mostrar mes
    public static function get_mes($mes){

        switch($mes){
            case '1':
                $mes = "ENERO";
                break;
            case '2':
                $mes = "FEBRERO";
                break;
            case '3':
                $mes = "MARZO";
                break;
            case '4':
                $mes = "ABRIL";
                break;
            case '5':
                $mes = "MAYO";
                break;
            case '6':
                $mes = "JUNIO";
                break;
            case '7':
                $mes = "JULIO";
                break;
            case '8':
                $mes = "AGOSTO";
                break;
            case '9':
                $mes = "SEPTIEMBRE";
                break;
            case '10':
                $mes = "OCTUBRE";
                break;
            case '11':
                $mes = "NOVIEMBRE";
                break;
            case '12':
                $mes = "DICIEMBRE";
                break;                
        }

        return $mes;

    }

    // Obtener datos del trabajador para mostrar en el arc y constancia de trabajo
    public function get_data_workers($idwork){

        return parent::get_data_workers_model($idwork);

    }

    // Obtener datos del trabajador para mostrar en el arc y constancia de trabajo
    public function get_data_pay_workers($id_trabajador){

        switch (date('m')) {
            case '01':
                $mes = 1;
                break;
            case '02':
                $mes = 2;
                break;
            case '03':
                $mes = 3;
                break;
            case '04':
                $mes = 4;
                break;
            case '05':
                $mes = 5;
                break;
            case '06':
                $mes = 6;
                break;
            case '07':
                $mes = 7;
                break;
            case '08':
                $mes = 8;
                break;
            case '09':
                $mes = 9;
                break;
        }

        if (date('m') <= 9){
            $mes;
        }else{
            $mes = date('m');
        }

        return parent::get_data_pay_workers_model(array($id_trabajador,$mes));

    }

    /* // Obtener trabajadores desde el sigefirrhh e insertarlos en la tabla usuarios de extranet
    public static function get_workers_for_users(){

        return parent::get_workers_for_users_model();

    } */

    // Encriptar idwork en vista home
    public static function encriptar_idwork($idwork){

        return ajaxModel::encriptar($idwork);
        
    }

    // Desencriptar idwork en vista home
    public function desencriptar_idwork($idwork){

        return ajaxModel::desencriptar($idwork);
        // return parent::desencriptar($idwork);
        
    }

    // Código aleatorio para las constancias
    public function codigo($leng){

        return parent::codigo_aleatorio($leng);

    }

    // Registrar constancia
    public function registrar_constancia($total){

        $codigo = self::codigo(25);

        return parent::registrar_constancia_model(array($total,$codigo));

    }

}

// ajaxController::get_workers_for_users();

// Zoom users
if (isset($_GET['zoom_user'])){
    echo json_encode(ajaxController::zoom_user_controlador($_GET['zoom_user']));
}

// Delete users
if (isset($_GET['d_user'])){
    echo ajaxController::eliminar_user_controller($_GET['d_user']);
}

// Create users
if (isset($_POST['frm_user']) && isset($_POST['frm_pass']) && isset($_POST['frm_name']) && isset($_POST['frm_rol'])){

    if (empty($_POST['frm_user']) || empty($_POST['frm_pass']) || empty($_POST['frm_name']) || empty($_POST['frm_rol'])){

        echo 2; // Formulario incompleto
        
    }else{
        
        echo ajaxController::registrar_usuarios_controlador($_POST['frm_user'],$_POST['frm_pass'],$_POST['frm_name'],$_POST['frm_rol']);

    }

}

// Actualizar contraseña
if (isset($_POST['current_pass']) && isset($_POST['new_pass'])){

    echo ajaxController::actualizar_user_pass_controller($_POST['current_pass'],$_POST['new_pass']);

}

// Editar usuario en vista users
if (isset($_POST['usuario']) && isset($_POST['name']) && isset($_POST['status'])) {
    
    echo ajaxController::update_user_controller($_POST['usuario'], $_POST['name'], $_POST['status']);
        
}

// Editar nombre en vista myaccount
if (isset($_POST['my_a_name'])){
    
    echo ajaxController::updateuseraccountcontroller($_POST['my_a_name']);
    
}