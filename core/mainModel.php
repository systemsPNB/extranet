<?php
    require_once 'configAPP.php';

    class mainModel{

        // Conexión 1
        protected function conectar(){

            try {
                
                $conexion = new PDO(SGBD,DBUSER,DBPASS);
                return $conexion;
                // echo "Conectado";
            } catch (PDOException $e) {
                
                die($e->getMessage());
                
            }finally{
                
                $conexion = NULL;
                
            }

        }

        protected function conexion2(){

            try {
                
                $conexion = new PDO(SGBD2,DBUSER2,DBPASS2);
                return $conexion;
                // echo "Conectado";
            } catch (PDOException $e) {
                
                die($e->getMessage());
                
            }finally{
                
                $conexion = NULL;
                
            }

        }

        protected function encriptar($string){

            $output = false;
            $key = hash('sha256', SECRET_KEY);
            $iv = substr(hash('sha256', SECRET_IV), 0, 16);
            $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
            $output = base64_encode($output);
            return $output;

        }

        protected function desencriptar($string){

            $key = hash('sha256', SECRET_KEY);
            $iv = substr(hash('sha256', SECRET_IV), 0, 16);
            $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
            return $output;
            
        }

        protected function limpiar_cadena($string){

            $string = trim($string);
            $string = stripslashes($string);
            $string = str_ireplace('<script>', '', $string);
            $string = str_ireplace('</script>', '', $string);
            $string = str_ireplace('<script src', '', $string);
            $string = str_ireplace('<script type=', '', $string);
            $string = str_ireplace('SELECT * FROM', '', $string);
            $string = str_ireplace('INSERT INTO', '', $string);
            $string = str_ireplace('DELETE FROM', '', $string);
            $string = str_ireplace('--', '', $string);
            $string = str_ireplace('^', '', $string);
            $string = str_ireplace('[', '', $string);
            $string = str_ireplace(']', '', $string);
            $string = str_ireplace('==', '', $string);
            $string = str_ireplace(';', '', $string);

            return $string;

        }

        // parametro
        // 1 conexion de base de datos a utilizar
        // 2 consulta sql
        // 3 tipo de respuesta q esperar => 1 entrega fetch y 2 fetchAll
        protected function consulta_simple($conn,$sql,$type){

            if($conn == 1){

                $conexion = self::conectar();

            }else {

                $conexion = self::conexion2();

            }

            $result = $conexion->prepare($sql);
            $result->execute();

            if ($type==1){

                return $result->fetch();

            }else{

                return $result->fetchAll();

            }
                
        }

    }