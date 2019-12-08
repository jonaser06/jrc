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

}
?>