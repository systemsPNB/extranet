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

        protected function codigo_aleatorio($length){

            $permitted = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

            $total_caracteres = strlen($permitted);

            $ramdom_str = "";

            for ($i=0; $i <$length ; $i++) { 
                $ramdom_char = $permitted[mt_rand(0,$total_caracteres-1)];
                $ramdom_str .= $ramdom_char;
            }

            return $ramdom_str;

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
                $datos = $result->fetch();
                unset($conexion);
                unset($result);
                return $datos;
            }else{
                $datos = $result->fetchAll();
                unset($conexion);
                unset($result);
                return $datos;
            }
                
        }

        // Obtener Último día del mes
        protected function get_last_month_day() { 
            $month = date('m');
            $year = date('Y');
            $day = date("d", mktime(0,0,0, $month+1, 0, $year));
    
            return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
        }
    
        // Obtener primer día del mes
        protected function get_first_month_day() {
            $month = date('m');
            $year = date('Y');
            return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
        }

            // Registrar bitacora
        protected function reg_bitacora($datos){
            $conexion = self::conectar();
            $sql = "INSERT INTO bitacora (fecha_entrada,ip,id_user) VALUES (:fecha,:ip,:user)";
            $result = $conexion->prepare($sql);
            $result->bindValue(":fecha", $datos[0], PDO::PARAM_STR);
            $result->bindValue(":ip", $datos[1], PDO::PARAM_STR);
            $result->bindValue(":user", $datos[2], PDO::PARAM_INT);
            $result->execute();
            $id = $conexion->lastInsertId();
            unset($result);
            unset($conexion);
            return $id;
        }

        // Actualizar bitacora
        public static function update_bicarora($fecha,$bitacora){
            $sql = "UPDATE bitacora SET fecha_salida = :fecha WHERE id_bitacora = :bitacora";
            $result = self::conectar()->prepare($sql);
            $result->bindValue(":fecha", $fecha, PDO::PARAM_STR);
            $result->bindValue(":bitacora", $bitacora, PDO::PARAM_INT);
            $result->execute();
            unset($result);
            unset($conexion);
        }

    }