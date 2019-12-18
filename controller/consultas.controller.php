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
    public static function reporteFechaController(){

    }

}
?>