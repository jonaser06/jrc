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
        var_dump($data);
        exit;
        #enviar mail
        $user = $data['nombre']; 
        $descripcion = $data['descripcion'];
        $otros = $data['otros'];
        $cantidad = $data['cantidad'];
        
        $para = ['jonaser06@gmail.com', 'james.alarcon@tecsup.edu.pe', 'rodrigo.paravicino@tecsup.edu.pe'];
        $titulo = 'Nuevo Problema reportado!';
        ob_start();
        include "requerimiento.php";
        $mensaje = ob_get_contents();
        ob_end_clean();

        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";   
        $cabeceras .= 'From: JRC <support@blackapp.xyz>' . "\r\n";

        $mail = mail($para, $titulo, $mensaje, $cabeceras);
        $getdata = meClassModel::setRequerimientoModel($data);
        return $getdata;
    }

}
?>