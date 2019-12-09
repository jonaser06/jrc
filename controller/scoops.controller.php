<?php
class scoopsClassController{

    public static function mantenimientoController($data){
        $getdata = scoopsClassModel::mantenimientoClassModel($data);
        return $getdata;

    }

}
?>