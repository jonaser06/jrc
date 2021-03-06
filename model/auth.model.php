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
                    $sql1       =  "INSERT INTO usuarios (nombres, dni, usuario, password, rol, id_maquina)
                                    VALUES (:nombres, :dni, :usuario, :password, :rol, '1' )";
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

    public static function registroModel($data){
        $usuario    = $data['users'];
        $password   = $data['pass'];
        $dni    = $data['dni'];
        $nombre = $data['name'];
        $rol    = $data['rol'];
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
                    return '{"status": false ,"message":"ya existe alguien con ese dni y/o usuario registrado, vuelva a intentarlo ","data": [] }';
                }

                if($mainCount == 0 ){
                    $sql1       =  "INSERT INTO usuarios (nombres, dni, usuario, password, rol, id_maquina)
                                    VALUES (:nombres, :dni, :usuario, :password, :rol, '1' )";
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

    public static function listUserModel($page){
        try {
            $rol = 3;
            $db        = getDB();
            $sql       = "SELECT * FROM usuarios WHERE rol !=:rol";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("rol", $rol,PDO::PARAM_STR);
            $stmt->execute();
            $total     =   $stmt->rowCount();
            $forPage   = 10;
            $pagination =   ceil($total/$forPage);
            $current   = ((int)$page-1)*$forPage;
            if($page <= $pagination){
                $db        = getDB();
                $sql       = "SELECT usuarios.id_usuarios, usuarios.nombres, usuarios.dni, usuarios.usuario, usuarios.rol, maquinas.nombre AS maquina FROM usuarios INNER JOIN maquinas ON usuarios.id_maquina = maquinas.id_maquina  WHERE rol !=:rol ";//LIMIT :currentpage,:forpage
                $stmt      =    $db->prepare($sql);
                $stmt->bindParam("rol", $rol,PDO::PARAM_STR);
                /* $stmt->bindParam("currentpage", $current, PDO::PARAM_INT);
                $stmt->bindParam("forpage", $forPage, PDO::PARAM_INT); */
                $stmt->execute();
                $mainCount =    $stmt->rowCount();
                $userData  =    $stmt->fetchAll(PDO::FETCH_OBJ);
                #controls
                $next_page    = ( (int)$page + 1 ) <= ( $pagination ) ? ( (int)$page + 1 ) : 'false';
                $previus_page = ( (int)$page - 1 ) <= 0 ? 'false' : ( (int)$page - 1 ) ;

                return '{
                            "status":"true", 
                            "message":"Find One",
                            "current_page":"'.$page.'", 
                            "next_page":"'.$next_page.'" ,
                            "previus_page":"'.$previus_page.'" ,
                            "pagination":"'.$pagination.'" ,
                            "data": '.json_encode($userData).'
                        }';
            }else{
                return '{"status":false, "message":"No found","data":[]}';
            }
        } catch (PDOException $e) {
            return '{"status": false, "data":'. $e->getMessage() .'}';
        }
    }

    public static function updateUserModel($data){
        try {
            $db        = getDB();
            $sql       = "UPDATE usuarios
                          SET nombres = :nombres, dni = :dni, usuario = :usuario
                          WHERE id_usuarios = :id_usuarios";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("nombres", $data['name'],PDO::PARAM_STR);
            $stmt->bindParam("usuario", $data['username'],PDO::PARAM_STR);
            $stmt->bindParam("dni", $data['dni'],PDO::PARAM_STR);
            $stmt->bindParam("id_usuarios", $data['id'],PDO::PARAM_STR);
            $stmt->execute();
            return '{
                "status":"true", 
                "message":"Usuario Actualizado",
                "data": []
            }';

        } catch (PDOException $e) {
            return '{"status": false, "data":'. $e->getMessage() .'}';
        }
    }

    public static function removeUserModel($id){
        try {
            $db        = getDB();
            $sql       = "DELETE FROM usuarios WHERE id_usuarios=:id_usuarios";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("id_usuarios", $id,PDO::PARAM_STR);
            $stmt->execute();
            return '{
                "status":"true", 
                "message":"Usuario Eliminado",
                "data": []
            }';

        } catch (PDOException $e) {
            return '{"status": false, "data":'. $e->getMessage() .'}';
        }
    }

    public static function changePasswordModel($password, $id){
        try {
            $db        = getDB();
            $sql       = "UPDATE usuarios
                          SET password = :pass
                          WHERE id_usuarios = :id_usuarios";
            $stmt      =    $db->prepare($sql);
            $password   =   hash('sha256',$password);
            $stmt->bindParam("pass", $password,PDO::PARAM_STR);
            $stmt->bindParam("id_usuarios", $id,PDO::PARAM_STR);
            $stmt->execute();
            return '{
                "status":"true", 
                "message":"Contraseña actualizada!",
                "data": []
            }';

        } catch (PDOException $e) {
            return '{"status": false, "data":'. $e->getMessage() .'}';
        }
    }

    public static function getUserModel(){
        try {
            $rol = 3;
            $db        = getDB();
            $sql       = "SELECT usuarios.id_usuarios, usuarios.nombres, usuarios.dni, usuarios.usuario, usuarios.rol, maquinas.nombre AS maquina FROM usuarios INNER JOIN maquinas ON usuarios.id_maquina = maquinas.id_maquina  WHERE rol !=:rol";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("rol", $rol,PDO::PARAM_STR);
            $stmt->execute();
            $mainCount =    $stmt->rowCount();
            $userData  =    $stmt->fetchAll(PDO::FETCH_OBJ);
            return '{
                "status":"true", 
                "message":"Find One",
                "data": '.json_encode($userData).'
            }';

        } catch (PDOException $e) {
            return '{"status": false, "data":'. $e->getMessage() .'}';
        }
    }

    public static function asignarMaquinaModel($data){
        try {
            $db        = getDB();
            $sql       = "UPDATE usuarios
                          SET id_maquina = :id_maquina, desde = :desde, hasta = :hasta
                          WHERE id_usuarios = :id_usuarios";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("id_maquina", $data['maquina'],PDO::PARAM_STR);
            $stmt->bindParam("desde", $data['desde'],PDO::PARAM_STR);
            $stmt->bindParam("hasta", $data['hasta'],PDO::PARAM_STR);
            $stmt->bindParam("id_usuarios", $data['id'],PDO::PARAM_STR);
            $stmt->execute();
            return '{
                "status":"true", 
                "message":"Maquina asignada",
                "data": []
            }';

        } catch (PDOException $e) {
            return '{"status": false, "data":'. $e->getMessage() .'}';
        }
    }
}

?>