<?php
/* 
** Proyecto : jrc
** Autor : Jonathan Narvaez
*/

require_once 'config.php';

class authClassModel{

    public static function authModel($getbody){
        $nombre     = $getbody->nombre;
        $dni        = $getbody->dni;
        $usuario    = $getbody->usuario;
        $password   = $getbody->password;
        $rol        = $getbody->rol;
        try {
            $usuario_check     =   preg_match('~^[A-Za-z0-9_]{3,20}$~i', $usuario);
            $password_check     =   preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
            if(strlen(trim($usuario))>0 && strlen(trim($password))>0 && $usuario_check>0 && $password_check>0){
                $db         = getDB();
                $sql        = "SELECT id_usuarios FROM usuarios WHERE usuario=:usuario or dni=:dni";
                $stmt       =   $db->prepare($sql);
                $stmt->bindParam("usuario", $usuario,PDO::PARAM_STR);
                $stmt->bindParam("dni", $dni,PDO::PARAM_STR);
                $stmt->execute();
                $mainCount=$stmt->rowCount();
                
                if($mainCount != 0 ){
                    return '{"status": false ,"message":"ya existe alguien con ese dni y/o dni registrado, vuelva a intentarlo ","data": [] }';
                }

                if($mainCount == 0 ){
                    $sql1       =  "INSERT INTO usuarios (nombres, dni, usuario, password, rol)
                                    VALUES (:nombres, :dni, :usuario, :password, :rol )";
                    $stmt1      =   $db->prepare($sql1);
                    $stmt1->bindParam("nombres", $nombre,PDO::PARAM_STR);
                    $stmt1->bindParam("dni", $dni,PDO::PARAM_STR);
                    $stmt1->bindParam("usuario", $usuario,PDO::PARAM_STR);
                    $password   =   hash('sha256',$password);
                    $stmt1->bindParam("password", $password,PDO::PARAM_STR);
                    $stmt1->bindParam("rol", $rol,PDO::PARAM_STR);
                    $stmt1->execute();
                }
                $db = null;
                return '{"status": true ,"message":"Cuenta Creada!","data": [{"nombre":"'.$nombre.'","dni":"'.$dni.'", "usuario":"'.$usuario.'"}]}';
                
            }
            
        } catch (PDOException $e) {
            return '{"status": false, "data":'. $e->getMessage() .'}';
        }
    }

    public static function signinModel($getbody){
        $usuario    = $getbody->usuario;
        $password   = $getbody->password;
        try {
            $db        =   getDB();
            $sql       =   "SELECT id_usuarios, nombres, dni, usuario, roles.nombre_rol AS rol
                            FROM usuarios
                            INNER JOIN roles
                            ON usuarios.rol = roles.id_rol
                            WHERE usuario=:usuario and password=:password ";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("usuario", $usuario, PDO::PARAM_STR);
            $password  =   hash('sha256',$password);
            $stmt->bindParam("password", $password, PDO::PARAM_STR);
            $stmt->execute();
            $mainCount =    $stmt->rowCount();
            $userData  =    $stmt->fetch(PDO::FETCH_OBJ);
            if($mainCount == 0 ){
                return '{"status": false ,"message":"Usuario o contraseña incorrecta, vuelta a internarlo","data": [] }';
            }
            if($mainCount == 1){
                return '{"status": true,"message":"Bienvenido","data": ['.json_encode($userData).'] }';
            }
        } catch (PDOException $e) {
            return '{"status": false ,"data":'. $e->getMessage() .'}';
        }
    }

    public static function loginModel($data){
        $usuario    = $data['usuario'];
        $password   = $data['password'];
        try {
            $db        =   getDB();
            $sql       =   "SELECT id_usuarios, nombres, dni, usuario, roles.nombre_rol AS rol
                            FROM usuarios
                            INNER JOIN roles
                            ON usuarios.rol = roles.id_rol
                            WHERE usuario=:usuario and password=:password ";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("usuario", $usuario, PDO::PARAM_STR);
            $password  =   hash('sha256',$password);
            $stmt->bindParam("password", $password, PDO::PARAM_STR);
            $stmt->execute();
            $mainCount =    $stmt->rowCount();
            $userData  =    $stmt->fetch(PDO::FETCH_OBJ);
            if($mainCount == 0 ){
                return '{"status": false ,"message":"Usuario o contraseña incorrecta, vuelta a internarlo","data": [] }';
            }
            if($mainCount == 1){
                return '{"status": true,"message":"Bienvenido","data": ['.json_encode($userData).'] }';
            }
        } catch (PDOException $e) {
            return '{"status": false ,"data":'. $e->getMessage() .'}';
        }
    }

}

?>