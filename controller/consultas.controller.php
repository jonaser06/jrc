<?php
class consultasClassController{

    public static function resumenequiposController($ho, $eq){

        $update = consultasClassModel::resumenequiposModel($ho, $eq);

    }

    public static function reporteController(){

        $reporte = consultasClassModel::reporteModel();

        return $reporte;

    }
}
?>