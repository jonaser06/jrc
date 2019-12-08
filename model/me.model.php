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

}
?>