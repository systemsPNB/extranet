<?php
include 'models/loginModel.php';

class loginController extends loginModel{

    // Iniciar sesión
    public function login_controlador(){

        session_start(['name' => 'NSW']);

        if($_SESSION['captcha_text'] === $_POST['captcha_challenge']){

            $user = mainModel::limpiar_cadena($_POST['user']);
            $pass = mainModel::limpiar_cadena($_POST['pass']);
            $pass = mainModel::encriptar($pass);
            return loginModel::login_modelo($user,$pass);

        }else{

            return "<script> alertify.warning('Error de captcha'); </script>";
            
        }
        
    }

    // Registrar primer usuario
    public function registro_first_user_controller($user,$nombres,$pass){

        $user = mainModel::limpiar_cadena($user);
        $nombres = mainModel::limpiar_cadena($nombres);
        $pass = mainModel::limpiar_cadena($pass);
        $pass = mainModel::encriptar($pass);

        $datos = array('user' => $user, 'nombres' => $nombres, 'pass' => $pass);

        $resultado = loginModel::registro_first_user_model($datos);

        if($resultado){
            
            return "<script>
                alertify.alert('Usuario creado exitosamente!', 'Ahora puedes acceder al sistema usando el usuario y contraseña que acabas de ingresar', function(){
                    location.reload();
                });
            </script>";

        }else{

            return $resultado->error;

        }

    }

    // Consultar si existen usuarios
    public function revisar_users_controller(){

        return loginModel::revisar_users_model();

    }

    // Cerrar sesión
    public function cerrar_session(){

        session_start(['name' => 'NSW']);
        session_unset();
        session_destroy();
        return header('Location: '.SERVERURL.'login/');

    }

}