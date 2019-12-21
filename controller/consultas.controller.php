<?php
class consultasClassController{

    public static function reporteDiarioController($ho, $eq){

        $update = consultasClassModel::reportediarioModel($ho, $eq);

    }

    public static function getreporteController(){

        $get = consultasClassModel::getreporteModel();

        return $get;

    }
    public static function setreporteController($data){
        
        $set = consultasClassModel::setreporteModel($data);

        return $set;

    }
    public static function reporteController(){

        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::reporteModel();
        # respuesta
        echo $response;
        exit;

    }
    public static function reporteFechaController($de, $hasta){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::reporteFechaModel($de, $hasta);
        # respuesta
        echo $response;
        exit;
    }

    public static function reporteScoopsController($equipo){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::reporteScoopsModel($equipo);
        # respuesta
        echo $response;
        exit;
    }
    public static function reporteFechaScoops($de, $hasta, $equipo){
        # definiendo el modo de respuesta
        header('Content-Type: application/json');
        $response = consultasClassModel::reporteScoopsFechaModel($de, $hasta, $equipo);
        # respuesta
        echo $response;
        exit;
    }

}
?>