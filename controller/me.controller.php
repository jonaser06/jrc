<?php
class meClassController{

    public static function meController($id){
        $getdata = meClassModel::meModel($id);
        return $getdata;

    }

    public static function maquinaController($id){
        $getdata = meClassModel::maquinaModel($id);
        return $getdata;
    }

    public static function pmController(){
        $getdata = meClassModel::pmModel();
        return $getdata;
    }

    public static function configController(){
        $getdata = meClassModel::configModel();
        return $getdata;
    }

    public static function setRequerimientosController($data){
        $getdata = meClassModel::setRequerimientoModel($data);
        return $getdata;
    }

}
?>