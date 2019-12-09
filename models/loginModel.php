<?php
require_once 'core/mainModel.php';

class loginModel extends mainModel{
    
    // Iniciar sesión
    protected function login_modelo($user,$pass){
        
        $sql = "SELECT * FROM users WHERE civ = :user AND pass = :pass AND id_status = 1";
        
        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":user", $user, PDO::PARAM_STR);
        $result->bindValue(":pass", $pass, PDO::PARAM_STR);
        
        $result->execute();

        if ($result->rowCount()>0){

            $row = $result->fetch();
            session_start(['name' => 'NSW']);
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['user'] = $row['nombre'];
            $_SESSION['nivel'] = $row['id_rol'];

            unset($result);
            unset($conexion);

            return header('Location: '.SERVERURL.'home/');

        } else {
            
            return "<script> alertify.error('Error de usuario o contraseña'); </script>";

        }

    }

    // Registrar primer usuario
    protected function registro_first_user_model($datos){

        $sql = "INSERT INTO users (civ, nombre, id_rol, id_status, reg_date, reg_user, pass) VALUES (:user, :nombres, :rol, :estatus, :fecha, :usuario, :pass)";

        $result = mainModel::conectar()->prepare($sql);

        $result->bindValue(":user", $datos['user'], PDO::PARAM_STR);
        $result->bindValue(":nombres", $datos['nombres'], PDO::PARAM_STR);
        $result->bindValue(":rol", 1, PDO::PARAM_INT);
        $result->bindValue(":estatus", 1, PDO::PARAM_INT);
        $result->bindValue(":fecha", date("Y-m-d"), PDO::PARAM_STR);
        $result->bindValue(":usuario", 1, PDO::PARAM_INT);
        $result->bindValue(":pass", $datos['pass'], PDO::PARAM_STR);

        $result->execute();

        if($result->rowCount() > 0){

            unset($result);
            unset($conexion);

            return true;

        }else{

            $error = $result->errorInfo();
            unset($result);
            unset($conexion);
            return $error;

        }

    }

    // Consultar si existen usuarios
    protected function revisar_users_model(){

        $sql = "SELECT * FROM users";

        $result = mainModel::conectar()->prepare($sql);

        $result->execute();

        if($result->rowCount() == 0){

            return true;

        }
        
    }

}