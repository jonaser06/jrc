<?php
class consultasClassController{

    public static function resumenequiposController($ho, $eq){

        $update = consultasClassModel::resumenequiposModel($ho, $eq);

    }
}
?>