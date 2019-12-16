<?php

require_once 'config.php';

class consultasClassModel{

    public static function resumenequiposModel($ho, $eq){
        try {
            $db        =   getDB();
            $sql       =   "UPDATE maquinas
                            SET horas_acumuladas = :hora
                            WHERE nombre= :nombre ";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("hora", $ho, PDO::PARAM_STR);
            $stmt->bindParam("nombre", $eq, PDO::PARAM_STR);
            $stmt->execute();
            
        } catch (PDOException $e) {
            //throw $th;
        }
    }
}
?>