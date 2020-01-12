<?php
/* 
** Proyecto : jrc
** Autor : Jonathan Narvaez
*/

require_once 'config.php';

class meClassModel{

    public static function meModel($id){
        try {
            $db         = getDB();
            $sql        = "SELECT 
                            usuarios.id_usuarios,
                            usuarios.nombres,
                            usuarios.dni,
                            usuarios.usuario,
                            usuarios.rol,
                            usuarios.id_maquina,
                            maquinas.nombre AS maquina
                           FROM usuarios
                           INNER JOIN maquinas
                           ON usuarios.id_maquina = maquinas.id_maquina
                           WHERE id_usuarios=:id_usuarios";
            $stmt       =   $db->prepare($sql);
            $stmt->bindParam("id_usuarios", $id,PDO::PARAM_STR);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function maquinaModel($id){
        try {
            $db         = getDB();
            $sql        = "SELECT 
                            *
                           FROM maquinas
                           WHERE id_maquina=:id";
            $stmt       =   $db->prepare($sql);
            $stmt->bindParam("id", $id,PDO::PARAM_STR);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function pmModel(){
        try {
            $db         = getDB();
            $sql        = "SELECT 
                            id_mantenimiento
                           FROM mantenimiento
                           ORDER BY id_mantenimiento DESC LIMIT 1";
            $stmt       =   $db->prepare($sql);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function configModel(){
        try {
            $db         = getDB();
            $sql        = "SELECT * FROM maquinas";
            $stmt       =   $db->prepare($sql);
            $stmt->bindParam("id", $id,PDO::PARAM_STR);
            $stmt->execute();
            $me = $stmt->fetchAll(PDO::FETCH_OBJ);
            return json_encode($me, JSON_UNESCAPED_UNICODE);

        } catch (PDOException $e) {
            echo $e;
        }
    }

    public static function setRequerimientoModel($data){
        try {
            $db         = getDB();
            $sql        = "INSERT INTO requerimientos (mecanico, descripcion, otros, cantidad, fecha, estado)
                            VALUES (:mecanico, :descripcion, :otros, :cantidad, NOW(), 'activo')";
            $stmt       =   $db->prepare($sql);
            $stmt->bindParam("mecanico", $data['nombre'],PDO::PARAM_STR);
            $stmt->bindParam("descripcion", $data['descripcion'],PDO::PARAM_STR);
            $stmt->bindParam("otros", $data['otros'],PDO::PARAM_STR);
            $stmt->bindParam("cantidad", $data['cantidad'],PDO::PARAM_STR);
            $stmt->execute();
            return '{
                "status":"true", 
                "message":"Requerimiento Solicitado",
                "data": []
            }';

        } catch (PDOException $e) {
            echo $e;
        }
    }

}
?>