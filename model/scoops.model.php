<?php

require_once 'config.php';

class scoopsClassModel{

    public static function scoopsModel($id){
        try {
            $db         = getDB();
            $sql        = "SELECT 
                            *
                           FROM maquinas
                           WHERE id_maquina = :id";
            $stmt       =   $db->prepare($sql);
            $stmt->bindParam("id", $id,PDO::PARAM_STR);
            $stmt->execute();
            $me = $stmt->fetch(PDO::FETCH_OBJ);
            
            return $me;

        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>