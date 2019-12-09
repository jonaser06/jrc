<?php

class maquinasClassController{

    public static function tableSgController($psg){
        $getdata = maquinasClassModel::tableSgModel($psg);
        return $getdata;
    }

    public static function tableEnController($pen){
        $getdata = maquinasClassModel::tableEnModel($pen);
        return $getdata;
    }

    public static function tableMdController($pmd){
        $getdata = maquinasClassModel::tableMdModel($pmd);
        return $getdata;
    }

    public static function tableSeController($pse){
        $getdata = maquinasClassModel::tableSeModel($pse);
        return $getdata;
    }

    public static function tableSfController($psf){
        $getdata = maquinasClassModel::tableSfModel($psf);
        return $getdata;
    }

    public static function tableChController($pch){
        $getdata = maquinasClassModel::tableChModel($pch);
        return $getdata;
    }

    public static function tableShController($psh){
        $getdata = maquinasClassModel::tableShModel($psh);
        return $getdata;
    }

    public static function tableStController($pst){
        $getdata = maquinasClassModel::tableStModel($pst);
        return $getdata;
    }
}
?>