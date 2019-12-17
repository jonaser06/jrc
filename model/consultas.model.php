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

    public static function getreporteModel(){
        try {
            $db        =   getDB();
            $sql       =   "SELECT * FROM mantenimiento";
            $stmt      =    $db->prepare($sql);
            $stmt->execute();
            $mainCount =    $stmt->rowCount();
            $userData  =    $stmt->fetchAll(PDO::FETCH_OBJ);
            return json_encode($userData);
            
        } catch (PDOException $e) {
            //throw $th;
        }
    }

    public static function setreporteModel($data){        
        $iniciojornada = $data['iniciojornada'];
        $finjornada = $data['finjornada'];
        $horaacumulada = $data['horaacumulada'];
        $hora = $data['hora'];
        $equipotrabajo = $data['equipotrabajo'];
        $descripcion = $data['descripcion'];
        $nrofallas = $data['nrofallas'];
        $paradatotal = $data['paradatotal'];
        try {
            $db        =   getDB();
            $sql       =   "INSERT INTO reporte (inicio_jornada, fin_jornada, hora_acumulada, hora, equipo_trabajo, descripcion, fallas_equipo, tiempo_parada)
                            VALUES (:inicio_jornada, :fin_jornada, :hora_acumulada, :hora, :equipo_trabajo, :descripcion, :fallas_equipo, :tiempo_parada)";
            $stmt      =    $db->prepare($sql);
            $stmt->bindParam("inicio_jornada", $iniciojornada,PDO::PARAM_STR);
            $stmt->bindParam("fin_jornada", $finjornada,PDO::PARAM_STR);
            $stmt->bindParam("hora_acumulada", $horaacumulada,PDO::PARAM_STR);
            $stmt->bindParam("hora", $hora,PDO::PARAM_STR);
            $stmt->bindParam("equipo_trabajo", $equipotrabajo,PDO::PARAM_STR);
            $stmt->bindParam("descripcion", $descripcion,PDO::PARAM_STR);
            $stmt->bindParam("fallas_equipo", $nrofallas,PDO::PARAM_STR);
            $stmt->bindParam("tiempo_parada", $paradatotal,PDO::PARAM_STR);
            $stmt->execute();
            $db = null;
            return true;
            
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>