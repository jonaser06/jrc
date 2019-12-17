<?php
class consultasClassController{

    public static function resumenequiposController($ho, $eq){

        $update = consultasClassModel::resumenequiposModel($ho, $eq);

    }

    public static function getreporteController(){

        $get = consultasClassModel::getreporteModel();

        return $get;

    }
    public static function setreporteController($data){
        
        $set = consultasClassModel::setreporteModel($data);

        return $set;

    }
}
?>