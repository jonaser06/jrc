<?php

require_once 'config.php';

class scoopsClassModel{

    public static function mantenimientoClassModel($data){

        try {

            $db         = getDB();
            #insertar
            $sql1       =  "INSERT INTO mantenimiento (id_usuarios, id_maquina, id_SG, id_MD, id_SH, id_SF, id_SE, id_ST, id_CH, id_EN, turno, fecha, mant, electricistas, checklist, trabajos_R, pendientes_M)
                            VALUES (:id_usuarios, :id_maquina, :id_SG, :id_MD, :id_SH, :id_SF, :id_SE, :id_ST, :id_CH, :id_EN, :turno, :fecha, :mant, :electricistas, :checklist, :trabajos_R, :pendientes_M)";
            $stmt1      =   $db->prepare($sql1);
            $stmt1->bindParam("id_usuarios", $data['id_usuarios'],PDO::PARAM_STR);
            $stmt1->bindParam("id_maquina", $data['id_maquina'],PDO::PARAM_STR);
            $stmt1->bindParam("id_SG", $data['id_SG'],PDO::PARAM_STR);
            $stmt1->bindParam("id_MD", $data['id_MD'],PDO::PARAM_STR);
            $stmt1->bindParam("id_SH", $data['id_SH'],PDO::PARAM_STR);
            $stmt1->bindParam("id_SF", $data['id_SF'],PDO::PARAM_STR);
            $stmt1->bindParam("id_SE", $data['id_SE'],PDO::PARAM_STR);
            $stmt1->bindParam("id_ST", $data['id_ST'],PDO::PARAM_STR);
            $stmt1->bindParam("id_CH", $data['id_CH'],PDO::PARAM_STR);
            $stmt1->bindParam("id_EN", $data['id_EN'],PDO::PARAM_STR);
            $stmt1->bindParam("turno", $data['turno'],PDO::PARAM_STR);
            $stmt1->bindParam("fecha", $data['fecha'],PDO::PARAM_STR);
            $stmt1->bindParam("mant", $data['mant'],PDO::PARAM_STR);
            $stmt1->bindParam("electricistas", $data['electricistas'],PDO::PARAM_STR);
            $stmt1->bindParam("checklist", $data['checklist'],PDO::PARAM_STR);
            $stmt1->bindParam("trabajos_R", $data['trabajos_R'],PDO::PARAM_STR);
            $stmt1->bindParam("pendientes_M", $data['pendientes_M'],PDO::PARAM_STR);
            $stmt1->execute();
            $db = null;
            
            return 'Mantenimiento realizado';

        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>