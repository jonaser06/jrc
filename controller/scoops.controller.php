<?php
class scoopsClassController{

    public static function scoopsController(){
        $getdata = scoopsClassModel::scoopsClassModel();
        return $getdata;

    }

}
?>